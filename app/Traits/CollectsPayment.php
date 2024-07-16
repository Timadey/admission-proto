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
     * Makes payment using paystack
     */
    public function makePaystackPayment($data, $price, $redirect_url)
    {
        $payload = [
            'reference' => $data['reference'],
            'email'=> $data['email'],
            'amount' => $price,
            'currency' => "NGN",
            'callback_url' => $redirect_url,
            "metadata" => json_encode([
                'customer' => [
                    'email' => $data['email'],
                    'name' => $data['name'],
                ],
                "custom_fields" => [
                    [
                        'display_name' => 'Customer Name',
                        'variable_name' => 'Institution Name',
                        'value' => $data['name'],
                    ]
                ]
            ]),
                  
            
        ];
        // Initiate payment
        $SECRET_KEY = env('PAYSTACK_SECRET_KEY');
        $response = Http::withToken($SECRET_KEY)
        ->post("https://api.paystack.co/transaction/initialize", $payload);

        $flw = $response->object();


        return $flw;

        
    }

    /**
     * Obtain Paystack payment information
     * @return void
     */
    public function confirmPaystackPayment(Request $request,  Closure $giveValueFunc)
    {
        $query = (object) $request->query();
        $trxref = $query->trxref ?? null;
        $reference = $query->reference  ?? null;

        if ($trxref == $reference){
            $SECRET_KEY = env('PAYSTACK_SECRET_KEY');
            $response = Http::withToken($SECRET_KEY)
            ->get("https://api.paystack.co/transaction/verify/$trxref");
            
            $flw = $response->object();

            if ($flw->status === true){
                $user = $flw->data->metadata->customer;
                return $giveValueFunc($user, $request);
            }
        }
        return redirect(route('application.index'));
    }

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
                $user = $flw_data->customer;
                return $giveValueFunc($user);
            }
        }
        return redirect(route('application.index'));
        
    }
}
