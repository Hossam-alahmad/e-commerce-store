function check(){
    var level = document.getElementById('admin_level'),
        admin_name = document.getElementById('admin_name');
    $.ajax({
        type:'POST',
        url:'Includes/Components/edit-level-check.php',
        data:{
            admin_level:level.value,
            admin_name:admin_name.value
        },
        success:function(response){
            if(response.search("Success") > -1){
                var reg_success = document.getElementById("notify-success");
                    reg_success.classList.add("success");
                    setTimeout(function() {
                        reg_success.classList.remove("success");
                        window.open("index.php?admins_level","_self");
                    },2000);
            }
            else{
                alert(response);
            }
        }
    });
    return false;
}