<?php

namespace App\Listeners;

use App\Events\OrderCreated;
use App\Facades\Cart;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class DeductProductQuantity
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        try {
            $order = $event->order;
            foreach ($order->products as $product) {
                Product::where('id', $product->id)->decrement('quantity', $product->pivot->quantity);
            }
        } catch (\Exception $e) {
            // Handle the exception here
            // For example:
            // Log the error
            // Return a response
            // Rollback any database transactions if needed
        }

        //or
        // foreach(Cart::get() as $item) {
        //     Product::where('id','=',$item->product_id)->decrement('quantity', $item->quantity);
        // }

        //or
        // foreach(Cart::get() as $item) {
        //     Product::where('id','=',$item->product_id)
        //     ->update([
        //         'quantity' => DB::raw("quantity - {$item->quantity}")
        //     ]);
        // }
    }
}
