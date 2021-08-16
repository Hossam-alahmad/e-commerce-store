window.onload = function() {
    var myNavMenuList = document.querySelectorAll("#navbar .navbar-header .padding-nav .nav li");
    if(document.URL.search(/index/) > -1){
        myNavMenuList[0].classList.add("active");
    }
    else if(document.URL.search(/shop/) > -1){
        myNavMenuList[1].classList.add("active");
    }
    else if(document.URL.search(/cart/) > -1){
        myNavMenuList[3].classList.add("active");
    }
    else if(document.URL.search(/contact/) > -1){
        myNavMenuList[4].classList.add("active");
    }
    
}