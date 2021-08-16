function check(){
    var search_inp = document.getElementById("search-inp");
        if(search_inp.value != ""){
            $.ajax({
                type:'GET',
                url:'Includes/Components/search-slide.php',
                data:{
                    search:search_inp.value
                },
                success:function(response){
                    if(response.search("Slide Found") > -1){
                        window.open("index.php?view_slides&slide_search=" + search_inp.value,'_self');
                    }
                    else{
                        alert("Not Found");
                    }
                }
            });
        }
    return false;
}
