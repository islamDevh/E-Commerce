<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class StripeWebhooksController extends Controller
{
    public function handle(Request $request){
        Log::debug('webhook event received', $request->all()); // To see the event in the log
    }
}
