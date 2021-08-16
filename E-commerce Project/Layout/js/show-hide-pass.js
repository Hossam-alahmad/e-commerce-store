
var eye = document.getElementById("eye");

eye.onclick = function(){
    if(eye.classList.contains("fa-eye")){
        eye.classList.remove("fa-eye");
        eye.classList.add("fa-eye-slash");
        document.getElementById("pass").type = "text";
    }
    else{
        eye.classList.add("fa-eye");
        eye.classList.remove("fa-eye-slash");
        document.getElementById("pass").type = "password";
    }
}