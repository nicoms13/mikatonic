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
         <header>Confirm password</header>
         <div class="form-outer">
            <form method="POST" action="/confirmCurrentPassword">
            @csrf
               <div class="page slide-page">

                  <div class="field">
                     <div class="label">
                        Password
                     </div>
                     <input type="password" id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="current-password">
                  </div>
                  <div class="field btns">
                     <button class="back"><a href="/dashboard">Back</a></button>
                     <button class="submit">Send</button>
                  </div>
            </form>
         </div>
      </div>
    <script src="/js/login.js"></script>
</body>

