var loved = document.getElementById("loved"),
    total_loved = document.getElementById("total-loved");
loved.onclick = function(){
    if(!loved.classList.contains("active")){
        loved.classList.add("active");
        check(true,total_loved.getAttribute('data-text'),total_loved.getAttribute('data-value'));
    }
    else{
        loved.classList.remove("active");
        check(false,total_loved.getAttribute('data-text'),total_loved.getAttribute('data-value'));
    }
}

function check(checked,product_id,total_click){
    var val = 0;
    if(checked === true){
        val = 1;
    }
    else{
        val = 0;
    }
    $.ajax({
        type:'POST',
        url:'Includes/Components/product-loved.php',
        data:{
            value:val,
            product_id:product_id,
            total_click:total_click
        },
        success:function(response){
            window.open(document.URL,'_self');
        }
    });
}