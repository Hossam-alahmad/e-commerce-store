function check(){
    var name = document.getElementById("name"),
        email = document.getElementById("email"),
        country = document.getElementById("country"),
        city = document.getElementById("city"),
        name_notify = document.getElementById("name-notify"),
        email_notify = document.getElementById("email-notify"),
        country_notify = document.getElementById("country-notify"),
        city_notify = document.getElementById("city-notify"),
        arr_input = [name,email,country,city],
        arr_notify = [name_notify,email_notify,country_notify,city_notify];
    if(name.value.length != 0 && email.value.length != 0 && country.value.length != 0 && city.value.length != 0){
        if(email.value.search(/^\S+@\S+/) > -1 && name.value.search("^[a-zA-Z]") > -1){
            $.ajax({
                type:'POST',
                url:'Includes/Components/check-edit-account.php',
                data:{
                    user_name:name.value,
                    user_email:email.value,
                    user_country:country.value,
                    user_city:city.value
                    },
                success:function(response){
                    if(response.search("Successfully") > -1){
                        var notify_success = document.getElementById("notify-success");
                            notify_success.classList.add("success");
                        setTimeout(function(){
                            notify_success.classList.remove("success");
                            window.open("my-account.php?edit_account","_self");
                        },2000);
                    }
                    else{
                        arr_notify[1].textContent = "This email has already exist try another one";
                        arr_notify[1].classList.add("invalid");
                        setTimeout(function(){
                            arr_notify[1].classList.remove("invalid");
                            arr_notify[1].textContent = "Enter your email";
                        }, 2000);
                    }
                }
            });
        }
        else{
            arr_notify[1].textContent = "invalid email please try again";
            arr_notify[1].classList.add("invalid");
            setTimeout(function(){
                arr_notify[1].classList.remove("invalid");
                arr_notify[1].textContent = "Enter your email";
            }, 2000);
        }
    }
    else{
        for(var i=0;i<4;i++){
            if(arr_input[i].value.length == 0){
                arr_notify[i].classList.add("invalid");
            }
            else{
                arr_notify[i].classList.remove("invalid");
            }
        }
        setTimeout(function(){
            for(var i=0;i<4;i++){
                arr_notify[i].classList.remove("invalid");
            }
        }, 2000);
    }
    
    return false;
}




document.getElementById("name").onkeyup = function(){
    if(document.getElementById("name").value.search("^[a-zA-Z]") > -1){
        document.getElementById("name-notify").classList.remove("invalid");
    }  
    else{
        document.getElementById("name-notify").classList.add("invalid");
        document.getElementById("name-notify").textContent = "Username connot be start number";
        setTimeout(function() {
            document.getElementById("name-notify").classList.remove("invalid");
            document.getElementById("name-notify").textContent = "Enter your username please";
        },2000);
    }
}