<?php

namespace App\Http\Controllers;

use Omnipay\Omnipay;
use App\Models\Invoice;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    private $gateway;

    public function _construct()
    {
        $this->gateway = Omnipay::create('PayPal_Rest');
        $this->gateway->setClientId(env('PAYPAL_CLIENT_ID'));
        $this->gateway->setSecret(env('PAYPAL_CLIENT_SECRET'));
        $this->gateway->setTestMode(true); //set it to 'false' when go live
    }

    public function index()
    {
        return view('shop.index');
    }

    public function charge(Request $request)
    {
        if($request->input('submit'))
        {
            try {
                $response = $this->gateway->purchase(array(
                    'amount' => $request->input('amount'),
                    'currency' => env('PAYPAL_CURRENCY'),
                    'returnUrl' => route('success'),
                    'cancelUrl' => route('error'),
                ))->send();

                if($response->isRedirect()){
                    $response->redirect();
                } else {
                    return $response->getMessage();
                }
            } catch(Exception $e) {
                return $e->getMessage();
            }
        }
    }

    public function success(Request $request)
    {
        if($request->input('paymentId') && $request->input('PayerID'))
        {
            $transaction = $this->gateway->completePurchase(array(
                'payer_id' => $request->input('PayerID'),
                'transactionReference' => $request->input('paymentId')
            ));

            $response = $transaction->send();

            if($response->isSuccessful()){
                $arr_body = $response->getData();

                $payment = new Invoice;
                $payment->payment_id = $arr_body['id'];
                $payment->payer_id = $arr_body['payer']['payer_info']['payer_id'];
                $payment->payer_email = $arr_body['payer']['payer_info']['payer_email'];
                $payment->amount = $arr_body['transactions'][0]['amount']['total'];
                $payment->currency = env('PAYPAL_CURRENCY');
                $payment->payment_status = $arr_body['state'];
                $payment->save();

                return "Payment is successful. Your transaction id is: ". $arr_body['id'];
            }else{
                return $response->getMessage();
            }
        }else{
            return 'Transaction is declined';
        }
    }

    public function errors()
    {
        return 'User cancelled the payment';
    }
}
