<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <! -- Styles sheets -->
    <link href="/css/login.css" rel="stylesheet">
    <! -- FontAwesome -->
    <script src="https://kit.fontawesome.com/91a731da61.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.1/font/bootstrap-icons.css">
    <title>Miskatonic</title>
</head>
<body>
      <div class="container">
         <header>{{ __('messages.create_account') }}</header>
         @if ($errors->any())
          <div class="alert alert-danger">
            <h3>{{ __('messages.error_message') }}</h3>
              <ul>
                  @foreach (array_slice($errors->all(), 0, 1) as $error)
                      <li>{{ $error }}</li>
                  @endforeach
              </ul>
          </div>
         @endif
         <div class="progress-bar">
            <div class="step">
               <p>
                  Name
               </p>
               <div class="bullet">
                  <span>1</span>
               </div>
               <div class="check fas fa-check"></div>
            </div>
            <div class="step">
               <p>
                  Account
               </p>
               <div class="bullet">
                  <span>2</span>
               </div>
               <div class="check fas fa-check"></div>
            </div>
            <div class="step">
               <p>
                  Pay
               </p>
               <div class="bullet">
                  <span>3</span>
               </div>
               <div class="check fas fa-check"></div>
            </div>
            <div class="step">
               <p>
                  Submit
               </p>
               <div class="bullet">
                  <span>4</span>
               </div>
               <div class="check fas fa-check"></div>
            </div>
         </div>
         <div class="form-outer">
            <form method="POST" action="{{ route('register') }}">
            @csrf
               <div class="page slide-page">
                  <div class="field">
                     <div class="label">
                        First Name
                     </div>
                     <input id="firstName" type="text" class="form-control @error('firstName') is-invalid @enderror" name="firstName" value="{{ old('firstName') }}">
                  </div>
                  <div class="field">
                     <div class="label">
                        Last Name
                     </div>
                     <input id="lastName" type="text" class="form-control @error('lastName') is-invalid @enderror" name="lastName" value="{{ old('lastName') }}">
                  </div>
                  <div class="field">
                     <button class="firstNext next">Next</button>
                  </div>
               </div>
               <div class="page">
                  <div class="field">
                     <div class="label">
                        Email
                     </div>
                     <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email">
                  </div>
                  <div class="field">
                     <div class="label">
                        Plan
                     </div>
                     <select id="paymentType" name="paymentType">
                      <option value="month">Month -- €8.99 / month</option>
                      <option value="year">Year -- €69.99 / year</option>
                     </select>
                  </div>
                  <div class="field btns">
                     <button class="prev-1 prev">Previous</button>
                     <button class="next-1 next">Next</button>
                  </div>
               </div>
               <div class="page">
                  <div class="field">
                     <div class="label">
                        Credit Card
                     </div>
                     <input id="cardNumber" type="text" class="form-control @error('cardNumber') is-invalid @enderror" name="cardNumber" value="{{ old('cardNumber') }}" placeholder="XXXX XXXX XXXX">
                  </div>
                  <div class="field">
                     <input style="margin-right: 10px;" id="cardExpirity" type="text" class="form-control @error('cardExpirity') is-invalid @enderror" name="cardExpirity" value="{{ old('cardExpirity') }}"  placeholder="** / **">
                     <input style="margin-left: 10px;" id="cvc" type="text" class="form-control @error('cvc') is-invalid @enderror" name="cvc" placeholder="CVC">
                  </div>

                  <div class="field btns">
                     <button class="prev-2 prev">Previous</button>
                     <button class="next-2 next">Next</button>
                  </div>
               </div>
               <div class="page">
                  <div class="field">
                     <div class="label">
                        Username
                     </div>
                     <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}">
                  </div>
                  <div class="field">
                     <div class="label">
                        Password
                     </div>
                     <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password">
                  </div>
                  <div class="field btns">
                     <button class="prev-3 prev">Previous</button>
                     <button class="submit">Submit</button>
                  </div>
               </div>
            </form>
         </div>
         <div class="credit"><a href="{{ route('login') }}">I already have an account</a></div>
      </div>
    <script src="/js/login.js"></script>
</body>
