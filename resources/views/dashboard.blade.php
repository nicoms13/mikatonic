@extends('layouts.app')

@section('content')

<section class="dashboard-section">
    <h2>Welcome, {{ Auth::user()->username }}</h2>

    <form method="GET" action="/updateUser">
        @csrf
        <div class="col-25-admin">
            <label for="name">First Name</label>
        </div>
        <div class="col-75-admin">
            <input type="text" id="firstName" name="firstName" value="{{ Auth::user()->firstName }}" required>
        </div>

        <div class="col-25-admin">
            <label for="name">Last Name</label>
        </div>
        <div class="col-75-admin">
            <input type="text" id="lastName" name="lastName" value="{{ Auth::user()->lastName }}" required>
        </div></br></br></br>

        <button class="admin-button">Update account</button>

    </form>

    <p style="margin-top: 25px;">{{ __('messages.credit_card_info') }}<strong>XXXX-XXXX-XXXX-X{{ $cardNumber }}</strong></p>
    <p style="margin-top: 5px; margin-bottom: 15px; font-size: 15px">{{ __('messages.next_pay') }}<strong>{{ $date }}</strong></p>
    <button style="margin-bottom: 25px;" class="admin-button" onclick="location.href='/confirmPassword'">Change payment details</button>

    <form method="POST" action="/deleteUser">
    @csrf
        <button type="submit" class="admin-button delete-btn">Delete account <i class="fa-solid fa-triangle-exclamation"></i></button>
    </form>

</section>

@endsection
