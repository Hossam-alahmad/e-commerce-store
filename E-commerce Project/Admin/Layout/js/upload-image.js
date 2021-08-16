
var admin_image = document.getElementById("admin_image");

admin_image.onclick = function(){
    setTimeout(function(){
        if(admin_image.value != ""){
            check();
        }
    }, 5000);
}
function check(){
    var fd = new FormData();
    var files = $("#admin_image")[0].files[0];
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
                alert("file not uploaded")
            }
        }
    });
    
}