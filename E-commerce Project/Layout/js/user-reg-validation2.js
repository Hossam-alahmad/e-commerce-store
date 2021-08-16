// this function for force submit to not refresh page and
// validate all data inputs register
function checkRegister() {
    var user_name = document.getElementById('username'),
        first_name = document.getElementById('firstname'),
        last_name = document.getElementById('lastname'),
        email = document.getElementById('email'),
        birthday = document.getElementById('birth'),
        gender = document.getElementsByName('gender'),
        country = document.getElementById('country'),
        city = document.getElementById('city'),
        password = document.getElementById('password'),
        re_password = document.getElementById('repassword'),
        arr_content = [
            "Enter your username please",
            "Enter your first name please",
            "Enter your last name please",
            "Enter your email name please",
            "Enter your birthday name please",
            "Enter your country name please",
            "Enter your city name please",
            "Enter your password name please",
            "Rewrite your password please",
        ],
        arr_input = [user_name, first_name, last_name, email, birthday, country, city, password, re_password],
        check = document.querySelectorAll('.fa-check-square'),
        notify = document.querySelectorAll('div.notification'),
        gender_value;
    for (var i = 0; i < 2; i++) {
        if (gender[i].checked)
            gender_value = gender[i].value;
    }
    if (user_name.value.length != 0 && first_name.value.length != 0 && last_name.value.length != 0 && email.value.length != 0 && birthday.value.length != 0 && country.value.length != 0 && city.value.length != 0 && password.value.length != 0 && re_password.value.length != 0) {
        if (check[6].classList.contains("checked") == true) {
            if (password.value === re_password.value) {
                $.ajax({
                    type: 'POST',
                    url: 'reg-check.php',
                    data: {
                        username: user_name.value,
                        firstname: first_name.value,
                        lastname: last_name.value,
                        email: email.value,
                        birthday: birthday.value,
                        gender: gender_value,
                        country: country.value,
                        city: city.value,
                        password: password.value
                    },
                    success: function (response) {
                        if(response.search("Success") > -1){
                            var reg_success = document.getElementById("notify-success");
                            reg_success.classList.add("success");
                            reg_success.focus();
                            setTimeout(function() {
                                reg_success.classList.remove("success");
                                window.open("index.php","_self");
                            },2000);
                        }
                        else if(response.search("Username") > -1){
                            user_name.focus();
                            notify[0].classList.add("invalid");
                            notify[0].textContent = "Username has already taken, try another one";
                            check[0].classList.remove("checked");
                            setTimeout(function() {
                                notify[0].classList.remove("invalid");
                            },2000);
                        }
                        else{
                            email.focus();
                            notify[3].classList.add("invalid");
                            notify[3].textContent = "Email has already exist";
                            check[3].classList.remove("checked");
                            setTimeout(function() {
                                notify[3].classList.remove("invalid");
                            },2000);
                        }
                    }
                });
            }
        }
        else {
            notify[7].classList.add("invalid");
            notify[7].textContent = "Your password is wick,it must be big than 6 number'";
            setTimeout(function () {
                notify[7].classList.remove("invalid");
            }, 2000);
        }

    }
    else {
        for (var i = 0; i < arr_input.length; i++) {
            if (arr_input[i].value.length == 0) {
                notify[i].classList.add("invalid");
                notify[i].textContent = arr_content[i];

            }
        }
        setTimeout(function () {
            for (var i = 0; i < arr_input.length; i++) {
                notify[i].classList.remove("invalid");
            }
        }, 2000);
    }
    return false;
}
