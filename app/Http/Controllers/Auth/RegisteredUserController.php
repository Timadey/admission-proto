<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Traits\CollectsPayment;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    use CollectsPayment;

    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function createUser($transaction): RedirectResponse
    {
        $user = $transaction->customer;
        $applicationPIN = random_int(100000, 999999);
        $applicationCode = time();
        $user = User::create([
            'name' => $user->name,
            'email' => $user->email,
            'password' => Hash::make($applicationPIN),
        ]);

        $user->application()->create([
            'application_code' => $applicationCode,
        ]);

        $user['applicationPIN'] = $applicationPIN;

        event(new Registered($user));

        // Auth::login($user);

        return redirect(route('login', absolute: false))
        ->with('success', "Your payment was successfull please view your email for your application PIN");
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email:rfc,dns,strict', 'max:255', 'unique:' . User::class],
            // 'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);
        // Check if there is payment involved
        $price = "25000";
        if ( (int) $price > 0){
            $data = [
                'email' => $validated['email'],
                'name' => $validated['name'],
            ];
            $flw = $this->makePayment($data, $price, route('confirm-app-payment'));
            return redirect($flw->data->link);

        }
    }

    /**
     * Confirm Payment and make booking
     */
    public function confirmAppPayment(Request $request)
    {

        return $this->confirmPayment($request, function ($data) {
            return $this->createUser($data);
        } );
    }

}
