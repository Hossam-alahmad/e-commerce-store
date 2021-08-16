var myCarouselList = document.querySelectorAll("#productMain .carousel-inner div"),
    myThumbsList = document.querySelectorAll("#productMain .details a");

function changeSlideImage(num){
    
    for(var i=0;i<myCarouselList.length;i++){
        if(myCarouselList[i].classList.length > 2){
            myCarouselList[i].classList.add("carousel-item-left");
            myCarouselList[i].classList.remove("active","carousel-item-left");
        }
    }
    myCarouselList[num].classList.add("active","carousel-item-next","carousel-item-left");
    myCarouselList[num].classList.remove("carousel-item-next","carousel-item-left");
}