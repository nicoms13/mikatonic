<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

use App\Http\Requests\CardVerificationRequest;
use LVR\CreditCard\CardCvc;
use LVR\CreditCard\CardNumber;
use LVR\CreditCard\CardExpirationDate;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', Rules\Password::defaults()],
            'firstName' => ['required', 'string', 'min:3', 'max:255'],
            'lastName' => ['required', 'string', 'min:3', 'max:255'],
            'cardNumber' => ['required', new CardNumber],
            'cardExpirity' => ['required'],
            'cvc' => ['required', new CardCvc($request->get('cardNumber'))],
            'paymentType' => ['required']
        ]);

        $user = User::create([
            'email' => $request->email,
            'username' => $request->username,
            'firstName' => $request->firstName,
            'lastName' => $request->lastName,
            'cardNumber' => $request->cardNumber,
            'cardExpirity' => $request->cardExpirity,
            'cvc' => $request->cvc,
            'paymentType' => $request->paymentType,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect('/home');
    }
}
