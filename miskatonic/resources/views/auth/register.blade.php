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
         <header>Create account</header>
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
            <form action="#">
               <div class="page slide-page">
                  <div class="field">
                     <div class="label">
                        First Name
                     </div>
                     <input type="text">
                  </div>
                  <div class="field">
                     <div class="label">
                        Last Name
                     </div>
                     <input type="text">
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
                     <input type="text">
                  </div>
                  <div class="field">
                     <div class="label">
                        Plan
                     </div>
                     <select>
                      <option value="mercedes">Month -- €8.99 / month</option>
                      <option value="audi">Year -- €69.99 / year</option>
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
                     <input type="text" placeholder="XXXX XXXX XXXX">
                  </div>
                  <div class="field">
                     <input style="margin-right: 10px;" placeholder="** / **" type="text">
                     <input style="margin-left: 10px;" placeholder="CVC" type="text">
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
                     <input type="text">
                  </div>
                  <div class="field">
                     <div class="label">
                        Password
                     </div>
                     <input type="password">
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
