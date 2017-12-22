<?php

namespace Shop\Support\Payment\PayPal\Traits;

use Cashier\Requests\CashierRequest;
use Illuminate\Http\Request;
use Order\Models\Order;
use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\PaymentExecution;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;

trait PayPalPayment
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Cashier\Requests\CashierRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function paypal(CashierRequest $request)
    {
        $payer = new Payer();
        $payer->setPaymentMethod('paypal');

        $items = [];
        foreach ($request->input('items') as $k => $item) {
            $items[$k] = new Item();
            $items[$k]->setName($item['name'])
                      ->setCurrency($request->input('currency'))
                      ->setQuantity($item['quantity'])
                      ->setPrice($item['amount']);
        }

        $itemList = new ItemList();
        $itemList->setItems($items);

        // $details = new Details();
        // $details->setShipping(0)
        //         ->setSubtotal($request->input('total'));

        $amount = new Amount();
        $amount->setCurrency($request->input('currency'))
               ->setTotal($request->input('total'));

        $transaction = new Transaction();
        $transaction->setAmount($amount)
                    ->setItemList($itemList)
                    ->setDescription('Pay from paypal. ' . env('APP_NAME'));

        $redirectUrls = new RedirectUrls();
        $redirectUrls->setReturnUrl(route('payment.status'))
                     ->setCancelUrl(route('payment.status'));

        $payment = new Payment();
        $payment->setIntent('sale')
                ->setPayer($payer)
                ->setRedirectUrls($redirectUrls)
                ->setTransactions([$transaction]);

        try {
            $payment->create($this->apiContext);
        } catch (\PayPal\Exception\PayPalConnectionException $e) {
            // dd($e->getData());
            return redirect()->route('payment.paypal.failed');
        } catch (\Exception $e) {
            // dd('asd', $e->getMessage());
            return view("Theme::errors.{$e->getCode()}");
        }

        $approvalUrl = $payment->getApprovalLink();

        session()->put('paypal_payment_id', $payment->getId());
        session()->put('experience_id', $request->input('experience_id'));
        session()->put('order_id', $request->input('order_id'));
        session()->put('session_request', $request->all());

        if (isset($approvalUrl)) {
            return redirect()->away($approvalUrl);
        }

        return redirect()->route('payment.paypal.failed');
    }

    /**
     * Get status page.
     *
     * @param  Illuminate\Http\Request $request
     * @return Illuminate\Http\Response
     */
    public function status(Request $request)
    {
        $paymentId = session()->get('paypal_payment_id');
        $sessionRequest = session()->get('session_request');
        // echo "<pre>";
        //     var_dump( $request->get('PayerID') ); die();
        // echo "</pre>";

        if (empty($request->get('PayerID')) || empty($request->get('token'))) {
            return redirect()->route('shop.cart');
        }

        $payment = Payment::get($paymentId, $this->getApiContext());
        /** PaymentExecution object includes information necessary **/
        /** to execute a PayPal account payment. **/
        /** The payer_id is added to the request query parameters **/
        /** when the user is redirected from paypal back to your site **/
        $execution = new PaymentExecution();
        $execution->setPayerId($request->get('PayerID'));

        /** Execute the payment **/
        sleep(3);
        $result = null;
        try {
            $result = $payment->execute($execution, $this->apiContext);
        } catch (\PayPal\Exception\PayPalConnectionException $e) {
            echo "<pre>";
                var_dump( $e->getMessage() ); die();
            echo "</pre>";
        }


        /** dd($result);exit; /** DEBUG RESULT, remove it later **/
        if ($result && $result->getState() == 'approved') {
            /** it's all right **/
            /** Here Write your database logic like that insert record or value in database if you want **/

            $order = new \Order\Models\Order();
            $order->customer_id = $sessionRequest['customer_id'];
            $order->experience_id = $sessionRequest['experience_id'];
            $order->total = $sessionRequest['total'];
            $order->price = $sessionRequest['price'];
            $order->quantity = $sessionRequest['quantity'];
            $order->purchased_at = date('Y-m-d H:i:s');
            $order->metadata = $sessionRequest['metadata'];

            $order->payment_id = $payment->id;
            $order->payer_id = $request->get('PayerID');
            $order->token = $request->get('token');
            $order->status = $result->getState();

            $order->save();

            return redirect()->route('payment.paypal.success', ['order_id' => $order->id, 'payment_id' => $payment->id, 'payer_id' => $request->get('PayerID')]);

            // return redirect()->route('payment.paypal.success', ['payment_id' => $payment->id, 'payer_id' => $request->get('PayerID')]);
        }

        return redirect()->route('payment.paypal.failed');
    }
}
