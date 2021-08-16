var menu_bar = document.getElementById("menu-bar"),
    navbar   = document.getElementById("navbar-exl-collapse");


menu_bar.onclick = function(){
    navbar.classList.toggle("navbar-show");
}