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
            dd($e->getData());
            return back()->with('errors', $e->getMessage());
        } catch (\Exception $e) {
            dd('asd', $e->getMessage());
            return view("Theme::errors.{$e->getCode()}");
        }

        $approvalUrl = $payment->getApprovalLink();

        session()->put('paypal_payment_id', $payment->getId());
        session()->put('experience_id', $request->input('experience_id'));

        if (isset($approvalUrl)) {
            return redirect()->away($approvalUrl);
        }

        return back();
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
        $expId = session()->get('experience_id');
        session()->forget('paypal_payment_id');

        if (empty($request->get('PayerID')) || empty($request->get('token'))) {
            return redirect()->route('shop.cart');
        }

        $payment = Payment::get($paymentId, $this->apiContext);

        /** PaymentExecution object includes information necessary **/
        /** to execute a PayPal account payment. **/
        /** The payer_id is added to the request query parameters **/
        /** when the user is redirected from paypal back to your site **/
        $execution = new PaymentExecution();
        $execution->setPayerId($request->get('PayerID'));

        /**Execute the payment **/
        $result = $payment->execute($execution, $this->apiContext);

        /** dd($result);exit; /** DEBUG RESULT, remove it later **/
        if ($result->getState() == 'approved') {
            /** it's all right **/
            /** Here Write your database logic like that insert record or value in database if you want **/
            $order = new Order();
            // $order->customer_id =
            // $order->price =
            // $order->experience_id = $expId;
            $order->payment_id = $payment->id;
            $order->payer_id = $request->get('PayerID');
            $order->token = $request->get('token');
            $order->save();


            return redirect()->route('payment.paypal.success', ['order' => $payment->id]);
        }

        return redirect()->route('payment.paypal.failed');
    }
}
