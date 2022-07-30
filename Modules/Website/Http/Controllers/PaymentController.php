<?php

namespace Modules\Website\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\OrganiztionRequest;
use App\Models\Admin\Organization;
use App\User;
use Modules\Website\Models\Payment;

class PaymentController extends Controller
{


    public function createInfoPayments()
    {
        return view('website::pages.payment');
    }

    public function storeInfoPayments(OrganiztionRequest $request)
    {
        try{
            $owner = User::create([
                "email" => $request->email,"name" => $request->name,"phone" => $request->phone,
                "password"  => bcrypt($request->password),"bio" => $request->bio,
            ]);

            $organization = Organization::create([
                'name' => $request->organization_name,'description'=> $request->description,'country' => $request->country,
                'city'=> $request->city,'street'=> $request->street,'postal_code' => $request->postal_code,
                'owner_id' => $owner->id, 'status'=> $request->has('organization_status') ? 1 : 0,
            ]);

            Organization::saveUpload($organization->id,'create','image','en','logo');
            Organization::AssignOwnerToOrganizationWithRoles($request,$owner,$organization);

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

        // After Step 2
        $payer = new \PayPal\Api\Payer();
        $payer->setPaymentMethod('paypal');

        $amount = new \PayPal\Api\Amount();
        $amount->setTotal('1.00');
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
            // 'user_id' => request()-> ,
            'payment_id' => request()->paymentId ,
            'payer_id' => request()->PayerID ,
            // 'amount' => request()-> ,
            // 'currency' => request()-> ,
            // 'payment_status' => request()-> ,
        ]);
        return request();
    }

    public function cancelPayment ()
    {
        return request();
    }

}// end class
