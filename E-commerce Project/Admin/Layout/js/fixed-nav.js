var nav = document.getElementById("nav");

window.onscroll = function(){
    if(document.documentElement.scrollTop > 1){
        nav.classList.add("nav-fixed");
    }
    else if(document.documentElement.scrollTop == 0)
            nav.classList.remove("nav-fixed");
}