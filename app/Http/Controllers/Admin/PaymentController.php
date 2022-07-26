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
        $data = [];
        $data['items'] = [
            [
                'name' => 'apple',
                'price' => 100,
                'description' => 'test desc',
                'quantity' => 1,
            ]
        ];
        $data['invoice_id'] = 1;
        $data['invoice_description'] = 'invoice desc';
        $data['return_url'] = route('success-payment');
        $data['cancel_url'] = route('cancel-payment');
        $data['total'] = 100;

    }

}// end class
