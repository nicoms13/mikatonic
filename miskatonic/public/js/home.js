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