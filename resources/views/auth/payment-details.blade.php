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
         <header>New payment</header>
         <div class="form-outer">
         	@if ($errors->any())
	          <div class="alert alert-danger">
	            <h3>Woops! Something went wrong</h3>
	              <ul>
	                  @foreach (array_slice($errors->all(), 0, 5) as $error)
	                      <li>{{ $error }}</li>
	                  @endforeach
	              </ul>
	          </div>
    		@endif
    		
            <form method="POST" action="/newPayment">
            @csrf
               <div class="page">
               	  <div class="field">
                     <div class="label">
                        Plan
                     </div>
                     <select id="paymentType" name="paymentType">
                      <option value="month">Month -- €8.99 / month</option>
                      <option value="year">Year -- €69.99 / year</option>
                     </select>
                  </div>
                  <div class="field">
                     <div class="label">
                        Credit Card
                     </div>
                     <input id="cardNumber" type="text" class="form-control @error('cardNumber') is-invalid @enderror" name="cardNumber" placeholder="XXXX XXXX XXXX">
                  </div>
                  <div class="field">
                     <input style="margin-right: 10px;" id="cardExpirity" type="text" class="form-control @error('cardExpirity') is-invalid @enderror" name="cardExpirity" placeholder="** / **">
                     <input style="margin-left: 10px;" id="cvc" type="text" class="form-control @error('cvc') is-invalid @enderror" name="cvc" placeholder="CVC">
                  </div>

                  <div class="field btns">
                     <button class="prev-2 prev">Update</button>
                  </div>
               </div>
            </form>
         </div>
      </div>
    <script src="/js/login.js"></script>
</body>