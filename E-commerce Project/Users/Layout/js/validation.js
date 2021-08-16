var old_password = document.getElementById("old_pass"),
    new_password = document.getElementById("new_pass"),
    confirm_pass = document.getElementById("confirm_pass"),
    old_pass_notify = document.getElementById("oldpass-notify"),
    new_pass_notify = document.getElementById("newpass-notify"),
    confirm_pass_notify = document.getElementById("confirmpass-notify"),
    test_pass_box = document.getElementById("test-pass"),
    test_pass = document.querySelectorAll(".test-pass span.test"),
    check = document.querySelectorAll("i.check"),
    update_btn = document.getElementById("update");
    
old_password.onblur = function(){
    if(old_password.value.length === 0){
        old_pass_notify.classList.add("invalid");
        old_pass_notify.textContent = "Please enter your password";
    }
}
old_password.onkeyup = function(){
    if(old_password.value.length === 0){
        old_pass_notify.classList.add("invalid");
        old_pass_notify.textContent = "Please enter your password";
    }
    else{
        old_pass_notify.classList.remove("invalid");
    }
}
new_password.onblur = function(){
    if(new_password.value.length === 0){
        new_pass_notify.classList.add("invalid");
        new_pass_notify.textContent = "Please enter your password";
    }
}
new_password.onkeyup = function(){
    test_pass_box.classList.add("show-box");
    if(new_password.value.length == 0){
        test_pass_box.classList.remove("show-box");
        test_pass[0].style.opacity = "0"; 
        test_pass[1].style.opacity = "0"; 
        test_pass[2].style.opacity = "0"; 
        new_pass_notify.classList.remove("invalid");
    }
    else if(new_password.value.length <= 4 && new_password.value.length > 0){
            test_pass[0].style.opacity = "1"; 
            test_pass[1].style.opacity = "0"; 
            test_pass[2].style.opacity = "0"; 
            new_pass_notify.classList.add("invalid");
            new_pass_notify.textContent = "Your password is very week";
            check[0].classList.remove("checked");
    }
    else if(new_password.value.length > 4 && new_password.value.length <= 8){
        new_pass_notify.classList.remove("invalid");
        test_pass[1].style.opacity = "1"; 
        test_pass[2].style.opacity = "0"; 
        if(new_password.value.search("[A-Z]") > -1 && new_password.value.search("[a-z]") > -1 && new_password.value.search("[0-9]") > -1){
            new_pass_notify.classList.remove("invalid");
            check[0].classList.add("checked");
        }
        else{
            new_pass_notify.classList.add("invalid");
            new_pass_notify.textContent = "Your password is must contain 'small char,big shar,numbers'";
            check[0].classList.remove("checked");
        }
    }
    else{
        test_pass[2].style.opacity = "1"; 
        new_pass_notify.classList.remove("invalid");
        if(new_password.value.search("[A-Z]") > -1 && new_password.value.search("[a-z]") > -1 && new_password.value.search("[0-9]") > -1){
            new_pass_notify.classList.remove("invalid");
            check[0].classList.add("checked");
        }
        else{
            new_pass_notify.classList.add("invalid");
            new_pass_notify.textContent = "Your password is must contain 'small char,big shar,numbers'";
            check[0].classList.remove("checked");
        }
    }
    
    
}
confirm_pass.onblur = function(){
    if(confirm_pass.value.length == 0){
        confirm_pass_notify.classList.add("invalid");
        confirm_pass_notify.textContent = "Please enter your password again";
        check[1].classList.remove("checked");
    }
    else if(new_password.value == confirm_pass.value){
        confirm_pass_notify.classList.remove("invalid");
        check[1].classList.add("checked");
    }
    else{
        confirm_pass_notify.classList.add("invalid");
        confirm_pass_notify.textContent = "Password does not match!! please try again";
        check[1].classList.remove("checked");
    }
}
update_btn.onclick = function(){

    var count = 0;
    for(var i = 0 ;i<check.length;i++){
        if(check[i].classList.contains("checked")){
            count++;
        }
    }
    if(count == 2 && old_password.value.length != 0){
        return true;
    }
    else{
        if(old_password.value.length == 0 && count == 0){
            old_pass_notify.classList.add("invalid");
            old_pass_notify.textContent = "Please enter your password";
            new_pass_notify.classList.add("invalid");
            new_pass_notify.textContent = "Please enter your password";
            confirm_pass_notify.classList.add("invalid");
            confirm_pass_notify.textContent = "Please enter your password again";
        }
        else if(old_password.value.length == 0 && (new_password.value.length > 4 && count == 1)){
            old_pass_notify.classList.add("invalid");
            old_pass_notify.textContent = "Please enter your password";
            new_pass_notify.classList.add("invalid");
            new_pass_notify.textContent = "Please enter your password";
        }
        else if(old_password.value.length == 0 && (confirm_pass.value.length > 4 && count == 1)){
            old_pass_notify.classList.add("invalid");
            old_pass_notify.textContent = "Please enter your password";
            confirm_pass_notify.classList.add("invalid");
            confirm_pass_notify.textContent = "Please enter your password";
        }
    }
    
    return false;
}
