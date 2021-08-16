function check(){
    var old_password = document.getElementById("old_pass"),
        new_password = document.getElementById("new_pass"),
        confirm_pass = document.getElementById("confirm_pass"),
        old_pass_notify = document.getElementById("oldpass-notify"),
        new_pass_notify = document.getElementById("newpass-notify"),
        confirm_pass_notify = document.getElementById("confirmpass-notify");
    if(old_password.value.length != 0 && new_password.value.length != 0){
        if(new_password.value.length > 6){
            if(new_password.value.search("[A-Z]") > -1 && new_password.value.search("[a-z]") > -1 && new_password.value.search("[0-9]") > -1){
                if(new_password.value == confirm_pass.value){
                    $.ajax({
                        type:'POST',
                        url:'Includes/Components/check-change-pass.php',
                        data:{
                            old_pass:old_password.value,
                            new_pass:new_password.value
                        },
                        success:function(response){
                            if(response.search("Changed") > -1){
                                var change_success = document.getElementById('notify-success');
                                old_pass_notify.classList.remove("invalid");
                                new_pass_notify.classList.remove("invalid");
                                confirm_pass_notify.classList.remove("invalid");
                                change_success.classList.add("success");
                                old_password.value = "";
                                new_password.value = "";
                                confirm_pass.value = "";     
                                setTimeout(function() {
                                    change_success.classList.remove("success");
                                },2000);
                            }
                            else{
                                old_pass_notify.textContent = "Your password not correct";
                                old_pass_notify.classList.add("invalid");
                                old_password.value = "";
                                setTimeout(function() {
                                    old_pass_notify.classList.remove("success");
                                },2000);
                            }
                        }
                    });
                }
                else{
                    confirm_pass_notify.textContent = "Password does not match!! please try again";
                    confirm_pass_notify.classList.add('invalid');
                    confirm_pass.value = "";
                    setTimeout(function(){
                        confirm_pass_notify.classList.remove("invalid");
                    }, 2000);
                }
            }
            else{
                new_pass_notify.textContent = "Your password is must contain 'lower char,upper char and numbers'";
                new_pass_notify.classList.add("invalid");
                confirm_pass_notify.textContent = "Password does not match!! please try again";
                confirm_pass_notify.classList.add('invalid');
                new_password.value = "";
                confirm_pass.value = "";
                setTimeout(function(){
                    new_pass_notify.classList.remove("invalid");
                    confirm_pass_notify.classList.remove("invalid");
                }, 2000);
            }
        }
        else{
            new_pass_notify.textContent = "Your password must be big than 6 char";
            new_pass_notify.classList.add("invalid");
            confirm_pass_notify.textContent = "Password does not match!! please try again";
            confirm_pass_notify.classList.add('invalid');
            new_password.value = "";
            confirm_pass.value = "";
            setTimeout(function(){
                new_pass_notify.classList.remove("invalid");
                confirm_pass_notify.classList.remove("invalid");
            }, 2000);
        }
    }
    else if(old_password.value.length == 0 && new_password.value.length == 0 && confirm_pass.value.length == 0){
        old_pass_notify.textContent = "Enter your password please";
        old_pass_notify.classList.add("invalid");
        new_pass_notify.textContent = "Enter your new password please";
        new_pass_notify.classList.add("invalid");
        confirm_pass_notify.textContent = "Confirm your password please";
        confirm_pass_notify.classList.add('invalid');
        setTimeout(function(){
            old_pass_notify.classList.remove("invalid");
            new_pass_notify.classList.remove("invalid");
            confirm_pass_notify.classList.remove("invalid");
        }, 2000);
        
    }
    else if(old_password.value.length == 0){
        old_pass_notify.textContent = "Enter your password please";
        old_pass_notify.classList.add("invalid");
        setTimeout(function(){
            old_pass_notify.classList.remove("invalid");
        }, 2000);
    }
    else if(new_password.value.length == 0){
        new_pass_notify.textContent = "Enter your new password please";
        new_pass_notify.classList.add("invalid");
        setTimeout(function(){
            new_pass_notify.classList.remove("invalid");
        }, 2000);
    }

    return false;
}
