
var user_image = document.getElementById("user_image");

user_image.onclick = function(){
    setTimeout(function(){
        if(user_image.value != ""){
            check();
        }
    }, 5000);
}
function check(){
    var fd = new FormData();
    var files = $("#user_image")[0].files[0];
    fd.append('image_file',files);

    $.ajax({
        url:'Includes/Components/upload-image.php',
        type:'post', 
        data:fd,
        contentType:false,
        processData:false,
        success:function(response){
            if(response.search("Success") > -1){
                window.open(document.URL,"_self");
            }
            else{
                alert(response);
            }
        }
    });
    
}