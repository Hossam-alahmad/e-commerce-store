function check(){
        var header_search = document.getElementById("header-search");
            if(header_search.value != ""){
                $.ajax({
                    type:'GET',
                    url:'Includes/Components/search-keywords.php',
                    data:{
                        search:header_search.value
                    },
                    success:function(response){
                        if(response.search("Not found") > -1){
                            alert("Not Found Any Result");
                        }
                        else{
                            var search_res = response.slice(0,response.length-1);
                            window.open("result.php?res="+search_res,"_self");
                        }
                    }
                });
            }
        return false;
    }