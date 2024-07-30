<?php

namespace App\Http\Controllers\Front;

use App\Models\Order;
use Stripe\StripeClient;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PaymentsController extends Controller
{
    public function create(Order $order)
    {
        return view('front.payments.create', ['order' => $order]);
    }


    public function createStripePaymentIntent(Order $order)
    {
        $amount = $order->items->sum(function ($item) {
            return $item->price * $item->quantity;
        });

        $stripe = new StripeClient(config('services.stripe.secret_key'));
        $paymentIntent = $stripe->paymentIntents->create([
            'amount' => $amount * 100, // amount should be in cents
            'currency' => 'usd',
            'automatic_payment_methods' => ['enabled' => true],
        ]);

        return response()->json(['clientSecret' => $paymentIntent->client_secret]);
    }


    public function confirm(Request $request, Order $order){
        $stripe = new StripeClient(config('services.stripe.secret_key'));
        $PaymentIntent = $stripe->paymentIntents->retrieve($request->query('payment_intent'), []);
        
        if($PaymentIntent->status == 'succeeded'){
            //create payment

            $payment = new \App\Models\Payment();
            $payment->forceFill([
                'order_id' => $order->id,
                'amount' => $PaymentIntent->amount,
                'currency' => $PaymentIntent->currency,
                'status' => 'completed',
                'method' => 'stripe',
                'transaction_id' => $PaymentIntent->id,
                'transaction_data' => json_encode($PaymentIntent), //to convert object to string
            ])->save();

            return redirect()->route('front.index',[
                'order' => $order->id,
                'status' => $payment->status,
            ]);
        }



        dd($PaymentIntent);
    }
}
