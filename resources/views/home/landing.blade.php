<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Miskatonic</title>
	<link rel="stylesheet" href="/css/landing.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.1/font/bootstrap-icons.css">
</head>
<body>

	<section class="home">
		<div class="content">
			<h1>Everything You Love. All in One Place.</h1>
			<p>The biggest blockbusters, the boldest stories and the unforgettable classics that made us who we are. Enjoy it whenever and wherever you want. All on Miskatonic.</p>
			<a href="{{ route('register') }}" class="signup">SIGN UP NOW <i class="fas fa-chevron-right btn-icon"></i></a>
			<a href="{{ route('login') }}" class="signin">I already have an account</a>
		</div>
	</section>
	<div class="custom-shape-divider-top-1639492859">
		    <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
		        <path d="M0,0V46.29c47.79,22.2,103.59,32.17,158,28,70.36-5.37,136.33-33.31,206.8-37.5C438.64,32.43,512.34,53.67,583,72.05c69.27,18,138.3,24.88,209.4,13.08,36.15-6,69.85-17.84,104.45-29.34C989.49,25,1113-14.29,1200,52.47V0Z" opacity=".25" class="shape-fill"></path>
		        <path d="M0,0V15.81C13,36.92,27.64,56.86,47.69,72.05,99.41,111.27,165,111,224.58,91.58c31.15-10.15,60.09-26.07,89.67-39.8,40.92-19,84.73-46,130.83-49.67,36.26-2.85,70.9,9.42,98.6,31.56,31.77,25.39,62.32,62,103.63,73,40.44,10.79,81.35-6.69,119.13-24.28s75.16-39,116.92-43.05c59.73-5.85,113.28,22.88,168.9,38.84,30.2,8.66,59,6.17,87.09-7.5,22.43-10.89,48-26.93,60.65-49.24V0Z" opacity=".5" class="shape-fill"></path>
		        <path d="M0,0V5.63C149.93,59,314.09,71.32,475.83,42.57c43-7.64,84.23-20.12,127.61-26.46,59-8.63,112.48,12.24,165.56,35.4C827.93,77.22,886,95.24,951.2,90c86.53-7,172.46-45.71,248.8-84.81V0Z" class="shape-fill"></path>
		    </svg>
	</div>
	<section class="mainsection">

		<h1 class="spacer-title">Read Now on These Devices</h1>
		<div class="info-menu">
			<div class="info-item">
				<i class="bi bi-tv"></i>
				<h3>TV</h3>
				<hr class="spacer">
				<p>Apple TV</br>
				Android TV</br>
				Chromecast</br>
				Samsung TV
				LG</p>
			</div>
			<div class="info-item">
				<i class="bi bi-phone"></i>
				<h3>Mobile</h3>
				<hr class="spacer">
				<p>iPhone and iPad</br>
				Android Phones and Tablets
				</p>
			</div>
			<div class="info-item">
				<i class="bi bi-tablet-landscape"></i>
				<h3>Ebook</h3>
				<hr class="spacer">
				<p>Amazon Kindle</br>
				Kobo eReader</br>
				PocketBook eReader</p>
			</div>
			<div class="info-item">
				<i class="bi bi-laptop"></i>
				<h3>Computer</h3>
				<hr class="spacer">
				<p>Chrome OS</br>
				MacOS</br>
				Windows PC
				LG</p>
			</div>
		</div>

		<hr class="spacer big-spacer">

		<div class="info-menu-two">
			<div class="info-item-two">
				<i class="bi bi-collection-play"></i>
				<h3>Simultaneous Reading</h3>
				<hr class="spacer">
				<p>Read from 3 different screens at the same time.</p>
			</div>
			<div class="info-item-two">
				<i class="bi bi-person-video3"></i>
				<h3>Personalized Profiles</h3>
				<hr class="spacer">
				<p>Add up to 5 Adult & Kid Profiles with hand-picked content.</p>
			</div>
			<div class="info-item-two">
				<i class="bi bi-wifi-off"></i>
				<h3>Unlimited Downloads</h3>
				<hr class="spacer">
				<p>Read what you want, wherever you want.</p>
			</div>
		</div>
	</section>
	<div class="custom-shape-divider-top-1640187457">
    <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
        <path d="M0,0V7.23C0,65.52,268.63,112.77,600,112.77S1200,65.52,1200,7.23V0Z" class="shape-fill"	fill="#222"></path>
    </svg>
	</div>

	<div class="prices-grid">
		<div class="prices-column">
			<h4>Unlimited streaming. Cancel anytime.</h4>
			<h1><b>€ 8.99</b> / month</h1>
			<a class="signup" href="{{ route('register') }}">SIGN UP NOW</a>
		</div>

		<div class="prices-column">
			<h4>Save 35% with a yearly subscription.*</h4>
			<h1><strike>€107.88</strike> <b>€ 69.99</b> / year</h1>
			<a class="signup" href="{{ route('register') }}">SAVE NOW</a>
			<p>*Saving based on the yearly price paid upfront compared to the monthly price of € 8.99 over 12 months.</p>
		</div>
	</div>

	<div class="faq">
		<h3>The Miskatonic Questions Everyone's Asking</h3>
		<div class="accordion">
			<div class="accordion-item">
				<button class="accordion-link">
					What is Miskatonic?
					<i class="bi bi-plus-lg icon"></i>
				</button>
				<hr class="spacer-faq">
				<div class="answer">
					<p>Miskatonic is a brand-new online reading service bringing you the greatest stories from H.P. Lovecraft, Edgar Allan Poe, Algernon Blackwood and much more horror stories, together for the very first time.</p>
				</div>
			</div>
			<div class="accordion-item">
				<button class="accordion-link">
					How do I get help if I have any issues?
					<i class="bi bi-plus-lg icon"></i>
				</button>
				<hr class="spacer-faq">
				<div class="answer">
					<p>If you have any issues signing up for or accessing Miskatonic, you can find help in our Help Center. You'll be reading by the time your coffee is ready!</p>
				</div>
			</div>
			<div class="accordion-item">
				<button class="accordion-link">
					How much does Miskatonik cost?
					<i class="bi bi-plus-lg icon"></i>
				</button>
				<hr class="spacer-faq">
				<div class="answer">
					<p>Miskatonic has a monthly price of just €8.99. And you can save 35% when you pay the yearly price of €69.99 upfront. That's like getting 4 months free over 12 months!</p>
				</div>
			</div>
			<div class="accordion-item">
				<button class="accordion-link">
					Can I change or cancel my subscription?
					<i class="bi bi-plus-lg icon"></i>
				</button>
				<hr class="spacer-faq">
				<div class="answer">
					<p>Yes! You can switch between the monthly and the yearly subscription. And you can also cancel your subscription at any time.</p>
				</div>
			</div>
			<div class="accordion-item">
				<button class="accordion-link">
					Which devices can I use Miskatonic on?
					<i class="bi bi-plus-lg icon"></i>
				</button>
				<hr class="spacer-faq">
				<div class="answer">
					<p>You can use Miskatonic on iPhone & iPad, Android phones & tablets, Apple TV, Android TV, Chromecast, Samsung TV, LG, Chrome OS, MacOS, Windows PC, PS5, PS4, Xbox Series X|S, and Xbox One, with more devices coming in the future.</p>
				</div>
			</div>
		</div>
	</div>

</body>
<script src="/js/landing.js"></script>
</html>