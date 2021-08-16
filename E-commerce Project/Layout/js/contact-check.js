function check(){
    var name = document.getElementById("name"),
        email  = document.getElementById("email"),
        subject = document.getElementById("subject"),
        message  = document.getElementById("message"),
        name_notify = document.getElementById("name-notify"),
        email_notify  = document.getElementById("email-notify"),
        subject_notify = document.getElementById("subject-notify"),
        message_notify  = document.getElementById("message-notify");
        arr_input = [name,email,subject,message];
        arr_notify = [name_notify,email_notify,subject_notify,message_notify];
        arr_content = [
            "Enter your name please",
            "Enter your email please",
            "Enter your subjecy please",
            "Enter your message please",
        ];
        if(name.value.length != 0 && email.value.length != 0 && subject.value.length != 0 && message.value.length != 0 ){
            $.ajax({
                type:'POST',
                url:'sent-mail.php',
                data:{
                    name:name.value,
                    email:email.value,
                    subject:subject.value,
                    message:message.value,
                },
                success:function(response){
                    if(response.search("Successfully") > -1){
                        var sent_success = document.getElementById('log-success');
                            sent_success.classList.add("success");
                        for(var i=0;i<4;i++){
                            arr_input[i].value = "";
                            arr_notify[i].classList.remove("invalid");
                        }
                        setTimeout(function() {
                            sent_success.classList.remove("success");
                        }, 2000);
                    }
                    else if(response.search("Error!") > -1){
                        arr_notify[1].classList.add("invalid");
                        arr_notify[1].textContent = "Your email not valid please try another one";
                        setTimeout(function() {
                            arr_notify.classList.remove("success");
                        }, 2000);
                    }
                }
            });
        }
        else{
            for(var i=0;i<4;i++){
                if(arr_input[i].value.length == 0){
                    arr_notify[i].classList.add("invalid");
                    arr_notify[i].textContent = arr_content[i];
                }
            }
            setTimeout(function() {
                arr_notify[0].classList.remove("invalid");
                arr_notify[1].classList.remove("invalid");
                arr_notify[2].classList.remove("invalid");
                arr_notify[3].classList.remove("invalid");
            }, 2000);
        }
        
    return false;
}