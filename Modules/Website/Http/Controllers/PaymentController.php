<?php

namespace Modules\Website\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\OrganiztionRequest;
use App\Models\Admin\Offer;
use App\Models\Admin\OfferFeatures;
use App\Models\Admin\Organization;
use App\User;
use Illuminate\Support\Facades\Auth;
use Modules\Website\Models\OrganizationFeature;
use Modules\Website\Models\Payment;

class PaymentController extends Controller
{


    public function createInfoPayments()
    {
        session()->put('offer_id',request()->offer_id);
        return view('website::pages.payment');
    }

    public function storeInfoPayments(OrganiztionRequest $request)
    {
        try{
            $owner = User::create([
                "email" => $request->email,
                "name" => $request->name,
                "phone" => $request->phone,
                "password"  => bcrypt($request->password),"bio" => $request->bio,
            ]);
            session()->put('user_id',$owner->id);


            $organization = Organization::create([
                'name' => $request->organization_name,'description'=> $request->description,'country' => $request->country,
                'city'=> $request->city,'street'=> $request->street,'postal_code' => $request->postal_code,
                'owner_id' => $owner->id, 'status'=> $request->has('organization_status') ? 1 : 0,
            ]);

            Organization::saveUpload($organization->id,'create','image','en','logo');
            Organization::AssignOwnerToOrganizationWithRoles($request,$owner,$organization);

            // session()->put('organization_id',$organization->id);

            return redirect(route('payment'))->with(['alert' => true,'status' => 'success', 'message' => 'Created successfully']);
        }catch (\Exception $e){
            return redirect(route('createInfoPayments'))->with(['alert' => true,'status' => 'error', 'message' => 'Something is wrong']);
        }
    }

    public function payment()
    {

        // After Step 1
        $apiContext = new \PayPal\Rest\ApiContext(
            new \PayPal\Auth\OAuthTokenCredential(
                env('PAYPAL_CLIENT_ID'),
                env('PAYPAL_SECRET')
            )
        );

//        return  OfferFeatures::where('offer_id',session()->get('offer_id'))->with(['features'])->get()->sum();

        $sum = OfferFeatures::where('offer_id',session()->get('offer_id'))->with(['features'])->get()->sum(function ($item) {
//            dump($item->features);
             return $item->features->sum('value');
        });

        session()->put('total_features',$sum);

        // After Step 2
        $payer = new \PayPal\Api\Payer();
        $payer->setPaymentMethod('paypal');

        $amount = new \PayPal\Api\Amount();
        $amount->setTotal($sum);
        $amount->setCurrency('USD');

        $transaction = new \PayPal\Api\Transaction();
        $transaction->setAmount($amount);

        $redirectUrls = new \PayPal\Api\RedirectUrls();
        $redirectUrls->setReturnUrl(route('success-payment'))
            ->setCancelUrl(route('cancel-payment'));

        $payment = new \PayPal\Api\Payment();
        $payment->setIntent('sale')
            ->setPayer($payer)
            ->setTransactions(array($transaction))
            ->setRedirectUrls($redirectUrls);


        // After Step 3
        try {
            $payment->create($apiContext);

            return redirect( $payment->getApprovalLink());
        }
        catch (\PayPal\Exception\PayPalConnectionException $ex) {
            // This will print the detailed information on the exception.
            //REALLY HELPFUL FOR DEBUGGING
            echo $ex->getData();
        }
    }

    public function successPayment ()
    {
        $payment = Payment::create([
            'user_id' => session()->get('user_id') ,
            'payment_id' => request()->paymentId ,
            'payer_id' => request()->PayerID ,
            'amount' => session()->get('total_features') ,
            'currency' => env('PAYPAL_CLIENT_CURRENCY') ,
            'payment_status' => 'complete' ,
        ]);
        Auth::loginUsingId(session()->get('user_id'));

        $offerFeatures = OfferFeatures::where('offer_id',session()->get('offer_id'))->with(['feature'])->get();
        foreach($offerFeatures as $offer_feature){
            OrganizationFeature::create([
                'organization_id' => session()->get('organization_id'),
                'key' => $offer_feature->feature->key,
                'value' => $offer_feature->feature->value,
            ]);
        }
        return redirect()->route('login');
    }

    public function cancelPayment ()
    {
        return request();
    }

}// end class
