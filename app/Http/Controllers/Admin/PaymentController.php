<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Payment;
use Omnipay\Omnipay;
use Srmklive\PayPal\Services\PayPal as PayPalClient;

class PaymentController extends Controller
{

    public function payment()
    {
//        $data = [];
//        $data['items'] = [
//            [
//                'name' => 'apple',
//                'price' => 100,
//                'description' => 'test desc',
//                'quantity' => 1,
//            ]
//        ];
//        $data['invoice_id'] = 1;
//        $data['invoice_description'] = 'invoice desc';
//        $data['return_url'] = route('success-payment');
//        $data['cancel_url'] = route('cancel-payment');
//        $data['total'] = 100;


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


    public function successPayment (){
        return request();
    }

    public function cancelPayment (){
        return request();
    }

}// end class
