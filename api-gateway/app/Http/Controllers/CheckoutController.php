<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CheckoutController extends Controller
{
    public function checkout(Request $req)
    {
        if ($req->payment_method === 'momo') {

            $response = Http::post("http://localhost:8004/payment/momo", [
                'amount' => $req->amount
            ]);

            return $response->json();
        }

        return ['message' => 'COD not implemented'];
    }
}
