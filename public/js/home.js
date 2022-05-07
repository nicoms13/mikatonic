var toggles = document.getElementsByClassName('accordion-link');
var contentDiv = document.getElementsByClassName('answer');
var icons = document.getElementsByClassName('icon');

for(let i=0; i<toggles.length; i++){
    toggles[i].addEventListener('click', ()=>{
        if( parseInt(contentDiv[i].style.height) != contentDiv[i].scrollHeight){
            contentDiv[i].style.height = contentDiv[i].scrollHeight + "px";
            icons[i].classList.remove('bi-plus-lg');
            icons[i].classList.add('bi-dash');
        }
        else{
            contentDiv[i].style.height = "0px";
            icons[i].classList.remove('bi-dash');
            icons[i].classList.add('bi-plus-lg');
        }

        for(let j=0; j<contentDiv.length; j++){
            if(j!==i){
                contentDiv[j].style.height = "0px";
                icons[j].classList.remove('bi-dash');
                icons[j].classList.add('bi-plus-lg');
            }
        }
    });
}

const carousel = document.querySelector('.carousel-items');
const carousel2 = document.querySelector('.carousel-items-two');

var intervale = null;
var maxScrollLeft = carousel.scrollWidth - carousel.clientWidth;
var maxScrollLeft2 = carousel2.scrollWidth - carousel2.clientWidth;
var step = 1;
var step2 = 1;

    const start = () => {
        intervalo = setInterval(function () {
            carousel.scrollLeft = carousel.scrollLeft + step;
            if (carousel.scrollLeft == maxScrollLeft) {
                step = -1;
            } else if (carousel.scrollLeft == 0) {
                step = 1;
            }
        }, 30);
    };

    const start2 = () => {
        intervalo = setInterval(function () {
            carousel2.scrollLeft = carousel2.scrollLeft + step2;
            if (carousel2.scrollLeft == maxScrollLeft2) {
                step2 = -1;
            } else if (carousel2.scrollLeft == 0) {
                step2 = 1;
            }
        }, 50);
    };

    start();
    start2();