const swiper = new Swiper('.swiper', {
		  
	pagination: {
		el: '.swiper-pagination',
	},

		  
	navigation: {
		nextEl: '.swiper-button-next',
		prevEl: '.swiper-button-prev',
	},
 
	scrollbar: {
		el: '.swiper-scrollbar',
	},
	autoplay: {
    	delay: 10000,
  	},
  	loop: true,
});

var swiperPopular = new Swiper('.popular-swiper', {
	slidesPerView: 1,
	spaceBetween: 10,
		  
		  navigation: {
		    nextEl: '.swiper-button-next',
		    prevEl: '.swiper-button-prev',
		  },

		  
		  scrollbar: {
		    el: '.swiper-scrollbar',
		  },
		  breakpoints: {
		  	280:{
		  		slidesPerView: 1,
		  		spaceBetween: 10,
		  	},
		  	320:{
		  		slidesPerView: 2,
		  		spaceBetween: 10,
		  	},
		  	510:{
		  		slidesPerView: 2,
		  		spaceBetween: 10,
		  	},
		  	758:{
		  		slidesPerView: 3,
		  		spaceBetween: 15,
		  	},
		  	900:{
		  		slidesPerView: 4,
		  		spaceBetween: 20,
		  	},
		  },
});

var swiperMythos = new Swiper('.mythos-swiper', {
	slidesPerView: 1,
	spaceBetween: 10,
		  
		  navigation: {
		    nextEl: '.swiper-button-next-mythos',
		    prevEl: '.swiper-button-prev-mythos',
		  },

		  
		  scrollbar: {
		    el: '.swiper-scrollbar',
		  },
		  breakpoints: {
		  	280:{
		  		slidesPerView: 1,
		  		spaceBetween: 10,
		  	},
		  	320:{
		  		slidesPerView: 2,
		  		spaceBetween: 10,
		  	},
		  	510:{
		  		slidesPerView: 2,
		  		spaceBetween: 10,
		  	},
		  	758:{
		  		slidesPerView: 3,
		  		spaceBetween: 15,
		  	},
		  	900:{
		  		slidesPerView: 4,
		  		spaceBetween: 20,
		  	},
		  },
});

var swiperDream = new Swiper('.dream-swiper', {
	slidesPerView: 1,
	spaceBetween: 10,
		  
		  navigation: {
		    nextEl: '.swiper-button-next-dream',
		    prevEl: '.swiper-button-prev-dream',
		  },

		  
		  scrollbar: {
		    el: '.swiper-scrollbar',
		  },
		  breakpoints: {
		  	280:{
		  		slidesPerView: 1,
		  		spaceBetween: 10,
		  	},
		  	320:{
		  		slidesPerView: 2,
		  		spaceBetween: 10,
		  	},
		  	510:{
		  		slidesPerView: 2,
		  		spaceBetween: 10,
		  	},
		  	758:{
		  		slidesPerView: 3,
		  		spaceBetween: 15,
		  	},
		  	900:{
		  		slidesPerView: 4,
		  		spaceBetween: 20,
		  	},
		  },
});

var swiperWeird = new Swiper('.weird-swiper', {
		  slidesPerView: 1,
		  spaceBetween: 10,
		  
		  navigation: {
		    nextEl: '.swiper-button-next-weird',
		    prevEl: '.swiper-button-prev-weird',
		  },

		  
		  scrollbar: {
		    el: '.swiper-scrollbar',
		  },
		  breakpoints: {
		  	280:{
		  		slidesPerView: 1,
		  		spaceBetween: 10,
		  	},
		  	320:{
		  		slidesPerView: 2,
		  		spaceBetween: 10,
		  	},
		  	510:{
		  		slidesPerView: 2,
		  		spaceBetween: 10,
		  	},
		  	758:{
		  		slidesPerView: 3,
		  		spaceBetween: 15,
		  	},
		  	900:{
		  		slidesPerView: 4,
		  		spaceBetween: 20,
		  	},
		  },
});