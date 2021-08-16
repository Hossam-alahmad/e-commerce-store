var desc = document.getElementById("description"),
            admin_desc = document.getElementById("admin-desc");
        desc.onclick = function(){
            admin_desc.textContent = desc.textContent;
            desc.textContent = "";
            admin_desc.style.display = "block";
            desc.style.display = "none";
            admin_desc.focus();
        }   
        admin_desc.onblur = function(){
            desc.textContent = admin_desc.value;
            admin_desc.textContent = "";
            admin_desc.style.display = "none";
            desc.style.display = "block";
            //admin_desc = document.getElementById("admin-desc").style.display = "none";
            if(admin_desc.value != ""){
                $.ajax({
                    type:'POST',
                    url:'Includes/Components/edit-profile.php',
                    data:{admin_desc:admin_desc.value},
                    success:function(response){
                        if(response.search("Success") < 0){
                            alert("Edit Failed");
                        }
                    }
                });
            }
        }