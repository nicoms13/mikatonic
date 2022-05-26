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
         <header>{{ __('messages.sign_in') }}</header>
         @if ($errors->any())
          <div class="alert alert-danger">
            <h3>{{ __('messages.error_message') }}</h3>
              <ul>
                  @foreach ($errors->all()->slice(1, 5) as $error)
                      <li>{{ $error }}</li>
                  @endforeach
              </ul>
          </div>
         @endif
         <div class="form-outer">
            <form method="POST" action="{{ route('login') }}">
            @csrf
               <div class="page slide-page">
                  <div class="field">
                     <div class="label">
                        Email
                     </div>
                     <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email">
                  </div>
                  <div class="field">
                     <div class="label">
                        Password
                     </div>
                     <input type="password" id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="current-password">
                  </div>
                  <div class="field btns">
                     <button class="back"><a href="/">Back</a></button>
                     <button class="submit">Sign in</button>
                  </div>
            </form>
         </div>
         <div class="credit"><a href="{{ route('register') }}">Don't have an account?</a></div>
      </div>
    <script src="/js/login.js"></script>
</body>
