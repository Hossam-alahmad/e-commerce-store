function func(){
    var user_name       = document.getElementById('username'),
        first_name      = document.getElementById('firstname'),
        last_name       = document.getElementById('lastname'),
        email           = document.getElementById('email'),
        birthday        = document.getElementById('birth'),
        gender          = document.getElementsByName('gender'),
        country         = document.getElementById('country'),
        city            = document.getElementById('city'),
        password        = document.getElementById('password'),
        re_password     = document.getElementById('repassword'),
        arr_input       = [user_name,first_name,last_name,email,birthday,country,city,password,re_password],
        check           = document.querySelectorAll('.fa-check-square'),
        notify          = document.querySelectorAll('div.notification'),
        pass_strong  = document.getElementById('test-pass');

    user_name.onkeyup = function(){
        if(user_name.value.search("^[a-zA-Z]") > -1){
            check[0].classList.add("checked");
            notify[0].classList.remove("invalid");
        }  
        else{
            notify[0].classList.add("invalid");
            notify[0].textContent = "username connot be start number";
            check[0].classList.remove("checked");
            setTimeout(function() {
                notify[0].classList.remove("invalid");
            },2000);
        }

    }
    first_name.onkeyup = function(){
        if(first_name.value.search("^[a-zA-Z]") > -1){
            check[1].classList.add("checked");
            notify[1].classList.remove("invalid");
        }  
        else{
            notify[1].classList.add("invalid");
            notify[1].textContent = "First name connot be start number";
            check[1].classList.remove("checked");
            setTimeout(function() {
                notify[1].classList.remove("invalid");
            },2000);
        }
    }
    last_name.onkeyup = function(){
        if(last_name.value.search("^[a-zA-Z]") > -1){
            check[2].classList.add("checked");
            notify[2].classList.remove("invalid");
        }  
        else{
            notify[2].classList.add("invalid");
            notify[2].textContent = "Last name connot be start number";
            check[2].classList.remove("checked");
            setTimeout(function() {
                notify[2].classList.remove("invalid");
            },2000);
        }
    }
    email.onblur = function(){
        if(email.value.search(/\S+@\S+\.\S+/) > -1){
            check[3].classList.add("checked");
            notify[3].classList.remove("invalid");
        }
        else{
            notify[3].classList.add("invalid");
            notify[3].textContent = "Invalid email please try another one 'example@domain.com'";
            check[3].classList.remove("checked");
            setTimeout(function() {
                notify[3].classList.remove("invalid");
            },2000);
        }
    }
    country.onkeyup = function(){
        if(country.value.search("^[a-zA-Z]") > -1){
            check[4].classList.add("checked");
            notify[5].classList.remove("invalid");
        }  
        else{
            notify[5].classList.add("invalid");
            notify[5].textContent = "Country connot be start number";
            check[4].classList.remove("checked");
            setTimeout(function() {
                notify[5].classList.remove("invalid");
            },2000);
        }

    }
    city.onkeyup = function(){
        if(city.value.search("^[a-zA-Z]") > -1){
            check[5].classList.add("checked");
            notify[6].classList.remove("invalid");
        }  
        else{
            notify[5].classList.add("invalid");
            notify[6].textContent = "City connot be start number";
            check[6].classList.remove("checked");
            setTimeout(function() {
                notify[6].classList.remove("invalid");
            },2000);
        }

    }
    password.onkeyup = function(){
            if(password.value.length == 0){
                pass_strong.classList.remove("show-box");
                pass_strong.children[0].style.opacity = 0;
                pass_strong.children[1].style.opacity = 0;
                pass_strong.children[2].style.opacity = 0;
                check[7].classList.remove("checked");
            }
            else if(password.value.length > 0 && password.value.length <=6){
                pass_strong.classList.add("show-box");
                pass_strong.children[0].style.opacity = 1;
                pass_strong.children[1].style.opacity = 0;
                pass_strong.children[2].style.opacity = 0;
                check[7].classList.remove("checked");
                
            }
            else if(password.value.length > 6 && password.value.length <=8){
                pass_strong.classList.add("show-box");
                pass_strong.children[0].style.opacity = 1;
                pass_strong.children[1].style.opacity = 1;
                pass_strong.children[2].style.opacity = 0;
                
            }
            else{
                pass_strong.classList.add("show-box");
                pass_strong.children[0].style.opacity = 1;
                pass_strong.children[1].style.opacity = 1;
                pass_strong.children[2].style.opacity = 1;
                
            }
        
        
    }
    password.onblur = function(){
        var checked = 0;
        if(password.value.length > 6){
            if(password.value.search("[a-z]") > -1){
                checked++;
            }
            if(password.value.search("[A-Z]") > -1){
                checked++;
            }
            if(password.value.search("[0-9]" > -1)){
                checked++;
            }
            if(checked === 3){
                notify[7].classList.remove("invalid");
                check[6].classList.add("checked");
            }
            else{
                notify[7].classList.add("invalid");
                notify[7].textContent = "Password must contain 'lower chars,upper chars,numbers'";
                check[6].classList.remove("checked");
                setTimeout(function() {
                    notify[7].classList.remove("invalid");
                },2000);
            }
        }
    }
    re_password.onkeyup = function(){
        if(password.value == re_password.value){
            check[7].classList.add("checked");
            notify[8].classList.remove("invalid");
        }
        else{
            notify[8].classList.add("invalid");
            notify[8].textContent = "Password not match please check your password";
            check[7].classList.remove("checked");
        }
    }
}
func();