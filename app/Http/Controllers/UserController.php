<?php

namespace App\Http\Controllers;

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

class UserController extends Controller
{
    public function userDelete() {

        $user = Auth::user();

        $user->delete();

        return redirect('/');
    }

    public function userUpdate(Request $request) {

        $user = Auth::user();

        $request->validate([
            'firstName' => ['required', 'string'],
            'lastName' => ['required', 'string']
        ]);

        $user->firstName = $request['firstName'];
        $user->lastName = $request['lastName'];

        $user->save();

        return redirect('/dashboard');
    }

    public function payment() {

        return view('auth.payment-details');
    }

    public function newPayment(Request $request) {

        $user = Auth::user();

        $request->validate([
            'cardNumber' => ['required', new CardNumber],
            'cardExpirity' => ['required'],
            'cvc' => ['required', new CardCvc($request->get('cardNumber'))],
            'paymentType' => ['required' ]
        ]);

        $user->paymentType = $request['paymentType'];
        $user->cardNumber = $request['cardNumber'];
        $user->cardExpirity = $request['cardExpirity'];
        $user->cvc = $request['cvc'];

        $user->save();

        return redirect('/dashboard');
    }
}
