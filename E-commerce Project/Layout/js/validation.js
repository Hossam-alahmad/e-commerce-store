var user_name   = document.getElementById("username"),
    user_first  = document.getElementById("firstname"),
    user_last   = document.getElementById("lastname"),
    user_email  = document.getElementById("email"),
    user_birth  = document.getElementById("birth"),
    user_gender =  document.getElementsByName("gender"),
    user_country = document.getElementById("country"),
    user_city   =document.getElementById("city"),
    user_password = document.getElementById("password"),
    user_repassword = document.getElementById("repassword"),
    user_register = document.getElementById("register"),
    username_notify = document.getElementById("username-notify"),
    firstname_notify = document.getElementById("firstname-notify"),
    lastname_notify = document.getElementById("lastname-notify"),
    email_notify = document.getElementById("email-notify"),
    country_notify = document.getElementById("country-notify"),
    city_notify = document.getElementById("city-notify"),
    pass_notify = document.getElementById("pass-notify"),
    repass_notify = document.getElementById("repass-notify"),
    test_pass_box = document.getElementById("test-pass"),
    test_pass = document.querySelectorAll(".test-pass span.test"),
    check = document.querySelectorAll(".check");
    console.log(check[0].classList.length);

user_name.focus();
user_name.onblur = function(){
    if(user_name.value.length === 0){
        username_notify.textContent = "Please enter your username";
        username_notify.classList.add("invalid");
        check[0].classList.remove("checked");
    }
}
user_name.onkeyup = function(){
    if(user_name.value.search(/\S\D[a-zA-Z]+\s\w/) == 0 && user_name.value.length >= 6){
        username_notify.classList.remove("invalid");
        check[0].classList.add("checked");
    }
    else if(user_name.value.search(/\S\D[a-zA-Z]+\s\w/) == -1 && user_name.value.length == 1){
        username_notify.textContent = "Username must not be as first char '0-9,\,%,^,_,&,etc... and less than 6 char'";
        username_notify.classList.add("invalid");
        check[0].classList.remove("checked");
    }
}
user_first.onblur = function(){
    if(user_first.value.length === 0){
        firstname_notify.textContent = "Please enter your name";
        firstname_notify.classList.add("invalid");
        check[1].classList.remove("checked");
    }
}
user_first.onkeyup = function(){
    if(user_first.value.search(/\S\D[a-zA-Z]+\w/) == 0 && user_first.value.length >= 3){
        firstname_notify.classList.remove("invalid");
        check[1].classList.add("checked");
    }
    else if(user_first.value.search(/\S\D[a-zA-Z]+\w/) == -1 && user_first.value.length == 1){
        firstname_notify.textContent = "Please enter your real name";
        firstname_notify.classList.add("invalid");
        check[1].classList.remove("checked");
    }
}
user_last.onblur = function(){
    if(user_last.value.length === 0){
        lastname_notify.textContent = "Please enter your last name";
        lastname_notify.classList.add("invalid");
        check[2].classList.remove("checked");
    }
}
user_last.onkeyup = function(){
    if(user_last.value.search(/\S\D[a-zA-Z]+\w/) > -1 && user_last.value.length >= 3){
        lastname_notify.classList.remove("invalid");
        check[2].classList.add("checked");
    }
    else if(user_last.value.search(/\S\D[a-zA-Z]+\w/) < 0 && user_last.value.length == 1){
        lastname_notify.textContent = "Please enter your real last name";
        lastname_notify.classList.add("invalid");
        check[2].classList.remove("checked");
    }
}
user_email.onblur = function(){
    if(user_email.value.length === 0){
        email_notify.textContent = "Please enter your email";
        email_notify.classList.add("invalid");
        check[3].classList.remove("checked");
    }
    else if(user_email.value.search(/^\S+@\S+/) < 0){
        email_notify.textContent = "Please enter correct email example@domain.com";
        email_notify.classList.add("invalid");
        check[3].classList.remove("checked");
    }
    else{
        email_notify.classList.remove("invalid");
        check[3].classList.add("checked");
    }
}
user_birth.onblur = function(){
    if(user_birth.value.length === 0){
        birth_notify.classList.add("invalid");
    }
    else{
        birth_notify.classList.remove("invalid");
    }
}
user_country.onblur = function(){
    if(user_country.value.length === 0){
        country_notify.textContent = "Please enter your country";
        country_notify.classList.add("invalid");
        check[4].classList.remove("checked");
    }
}
user_country.onkeyup = function(){
    if(user_country.value.search(/\S\D[a-zA-Z]+\D/) == 0 && user_country.value.length > 3){
        country_notify.classList.remove("invalid");
        check[4].classList.add("checked");
    }
    else if(user_country.value.search(/\S\D[a-zA-Z]+\w/) == -1 && user_country.value.length < 3){
        country_notify.textContent = "Please enter your country";
        country_notify.classList.add("invalid");
        check[4].classList.remove("checked");
    }
}
user_city.onblur = function(){
    if(user_city.value.length === 0){
        city_notify.textContent = "Please enter your city";
        city_notify.classList.add("invalid");
        check[5].classList.remove("checked");
    }
}
user_city.onkeyup = function(){
    if(user_city.value.search(/\S\D[a-zA-Z]+\D/) == 0 && user_city.value.length > 3){
        city_notify.classList.remove("invalid");
        check[5].classList.add("checked");
    }
    else if(user_city.value.search(/\S\D[a-zA-Z]+\w/) == -1 && user_city.value.length < 3){
        city_notify.textContent = "Please enter your city";
        city_notify.classList.add("invalid");
        check[5].classList.remove("checked");
    }
}
user_password.onblur = function(){
    if(user_password.value.length === 0){
        pass_notify.classList.add("invalid");
        pass_notify.textContent = "Please enter your password";
        check[6].classList.remove("checked");
    }
}
user_password.onkeyup = function(){
    test_pass_box.classList.add("show-box");
    if(user_password.value.length == 0){
        test_pass_box.classList.remove("show-box");
        test_pass[0].style.opacity = "0"; 
        test_pass[1].style.opacity = "0"; 
        test_pass[2].style.opacity = "0"; 
        pass_notify.classList.remove("invalid");
    }
    else if(user_password.value.length <= 4 && user_password.value.length > 0){
            test_pass[0].style.opacity = "1"; 
            test_pass[1].style.opacity = "0"; 
            test_pass[2].style.opacity = "0"; 
            pass_notify.classList.add("invalid");
            pass_notify.textContent = "Your password is very week";
            check[6].classList.remove("checked");
    }
    else if(user_password.value.length > 4 && user_password.value.length <= 8){
        pass_notify.classList.remove("invalid");
        test_pass[1].style.opacity = "1"; 
        test_pass[2].style.opacity = "0"; 
        if(user_password.value.search("[A-Z]") > -1 && user_password.value.search("[a-z]") > -1 && user_password.value.search("[0-9]") > -1){
            pass_notify.classList.remove("invalid");
            check[6].classList.add("checked");
        }
        else{
            pass_notify.classList.add("invalid");
            pass_notify.textContent = "Your password is must contain 'small char,big shar,numbers'";
            check[6].classList.remove("checked");
        }
    }
    else{
        test_pass[2].style.opacity = "1"; 
        pass_notify.classList.remove("invalid");
        if(user_password.value.search("[A-Z]") > -1 && user_password.value.search("[a-z]") > -1 && user_password.value.search("[0-9]") > -1){
            pass_notify.classList.remove("invalid");
            check[6].classList.add("checked");
        }
        else{
            pass_notify.classList.add("invalid");
            pass_notify.textContent = "Your password is must contain 'small char,big shar,numbers'";
            check[6].classList.remove("checked");
        }
    }
    
    
}
user_repassword.onblur = function(){
    if(user_repassword.value.length == 0){
        repass_notify.classList.add("invalid");
        pass_notify.textContent = "Please enter your password again";
        check[7].classList.remove("checked");
    }
    else if(user_password.value == user_repassword.value){
        repass_notify.classList.remove("invalid");
        check[7].classList.add("checked");
    }
    else{
        repass_notify.classList.add("invalid");
        repass_notify.textContent = "Password does not match!! please try again";
        check[7].classList.remove("checked");
    }
}
user_register.onclick = function(){

    var count = 0;
    for(var i = 0 ;i<check.length;i++){
        if(check[i].classList.contains("checked")){
            count++;
        }
    }
    if(count == 8 && user_birth.value.length > 0){
        return true;
    }
    return false;
}
/*

else{
        test_pass[2].style.opacity = "1"; 
        pass_notify.classList.remove("invalid");
        if(user_password.value.search(/\S\w+[a-z][0-9][A-Z]/) == 0){
            pass_notify.classList.remove("invalid");
        }
        else if(user_password.value.search(/\S\w+[a-z][0-9][A-Z]/) == -1){
            pass_notify.classList.add("invalid");
            pass_notify.textContent = "Your password is must contain 'small char,big shar,numbers'";
        }
    }
user_birth.onblur = function(){
    if(user_birth.value.length === 0){
        notification.textContent = "Please select your birthday";
        notification.classList.add("invalid");
    }
    else{
        notification.classList.remove("invalid");
    }
}
user_country.onblur = function(){
    if(user_country.value.length === 0){
        notification.textContent = "Please enter your Country";
        notification.classList.add("invalid");
    }
    else{
        notification.classList.remove("invalid");
    }
}
user_city.onblur = function(){
    if(user_city.value.length === 0){
        notification.textContent = "Please enter your Country";
        notification.classList.add("invalid");
    }
    else{
        notification.classList.remove("invalid");
    }
}
user_password.onblur = function(){
    if(user_password.value.length === 0){
        notification.textContent = "Please enter your Country";
        notification.classList.add("invalid");
    }
    else{
        notification.classList.remove("invalid");
    }
}
*/