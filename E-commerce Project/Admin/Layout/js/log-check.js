function check(){
    var email = document.getElementById('email'),
        pass  = document.getElementById('pass'),
        email_notify = document.getElementById("email-notify"),
        pass_notify  = document.getElementById("pass-notify");
        if(email.value.length != 0 && pass.value.length != 0 ){
            $.ajax({
                type:'POST',
                url:'Includes/Components/login-check.php',
                data:{
                    email:email.value,
                    password:pass.value
                },
                success:function(response){
                    if(response.search("Welcome") > -1){
                        var log_success = document.getElementById('notify-success');
                        email_notify.classList.remove("invalid");
                        pass_notify.classList.remove("invalid");
                        log_success.classList.add("success");
                        setTimeout(function() {
                            log_success.classList.remove("success");
                            window.open("index.php?dashboard","_self");
                        },2000);
                    }
                    else if(response.search("Admin Not Found") > -1){
                        email_notify.textContent = "Connot find this email try another one";
                        email_notify.classList.add("invalid");
                        email.value = "";
                        pass.value = "";
                        pass_notify.classList.remove("invalid");
                        setTimeout(function() {
                            email_notify.classList.remove("invalid");
                            //pass_notify.classList.remove("invalid");
                        }, 2000);
                    }
                    else{
                        email_notify.classList.remove("invalid");
                        pass_notify.textContent = "Wrong password please try again";
                        pass_notify.classList.add("invalid");
                        pass.value = "";
                        setTimeout(function() {
                            //email_notify.classList.remove("invalid");
                            pass_notify.classList.remove("invalid");
                        }, 2000);
                    }
                }
            });
        }
        else if(email.value.length == 0 && pass.value.length == 0){
            email_notify.textContent = "Please enter your email";
            email_notify.classList.add("invalid");
            pass_notify.classList.add("invalid");
            setTimeout(function() {
                email_notify.classList.remove("invalid");
                pass_notify.classList.remove("invalid");
            }, 2000);
        }
        else if(email.value.length == 0){
            email_notify.textContent = "Please enter your email";
            email_notify.classList.add("invalid");
            setTimeout(function() {
                email_notify.classList.remove("invalid");
                //pass_notify.classList.remove("invalid");
            }, 2000);
        }
        else if(pass.value.length == 0){
            pass_notify.textContent = "Please enter your password";
            pass_notify.classList.add("invalid");
            setTimeout(function() {
                //email_notify.classList.remove("invalid");
                pass_notify.classList.remove("invalid");
            }, 2000);
        }
        return false;
}
