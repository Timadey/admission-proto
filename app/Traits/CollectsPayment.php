<?php

namespace App\Traits;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Inertia\Inertia;
use Ramsey\Uuid\Uuid;

trait CollectsPayment
{
    /**
     * Make a payment
     * 
     * @future move this to a service
     */
    public function makePayment($data, $price, $redirect_url){
        $payload = [
            'tx_ref' => Uuid::uuid4(),
            'amount' => $price,
            'currency' => "NGN",
            'redirect_url' => $redirect_url,
            'payment_options' => "card, account, googlepay, applepay",
            'customer' => [
                'email' => $data['email'],
                'name' => $data['name'],
            ],
            'customizations' => [
                'title' => config('app.name'),
                'logo' => asset('logo.svg')
            ],
        ];
        // Initiate payment
        $SECRET_KEY = env('FLUTTERWAVE_SECRET_KEY');
        $response = Http::withToken($SECRET_KEY)
        ->post("https://api.flutterwave.com/v3/payments", $payload);

        $flw = $response->object();

        return $flw;

        // return Inertia::location($flw->data->link);
        // return redirect($flw->data->link);
    }

    /**
     * Confirm Payment and make booking
     */
    public function confirmPayment(Request $request,  Closure $giveValueFunc){

        $query = (object) $request->query();
        $transaction_id = $query->transaction_id ?? null;
        $status = $query->status  ?? null;
        $tx_ref = $query->tx_ref  ?? null;

        if ($transaction_id && $status && $tx_ref && $status=='successful'){
            $SECRET_KEY = env('FLUTTERWAVE_SECRET_KEY');
            $response = Http::withToken($SECRET_KEY)
            ->get("https://api.flutterwave.com/v3/transactions/$transaction_id/verify");
            
            $flw = $response->object();

            if ($flw->status === "success"){
                $flw_data = $flw->data;
                return $giveValueFunc($flw_data);
            }
        }
        return redirect(route('application.index'));
        
    }
}
