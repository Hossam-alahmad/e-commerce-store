function check(){
    var search_btn = document.getElementById("search-btn"),
        search_inp = document.getElementById("search-inp");
        if(search_inp.value != ""){
            $.ajax({
                type:'GET',
                url:'Includes/Components/search-product.php',
                data:{
                    search:search_inp.value
                },
                success:function(response){
                    if(response.search("Product Found") > -1){
                        window.open("index.php?view_products&product_search=" + search_inp.value,'_self');
                    }
                    else{
                        alert("Not Found");
                    }
                }
            });
        }
    return false;
}
