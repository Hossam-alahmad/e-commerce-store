/* 
    Slider Home Page
*/
var myImageSlide = document.querySelectorAll(".slider-home-page .slider-content img"),
    prevBtn = document.getElementById("prev"),
    nextBtn = document.getElementById("next"),
    collapse = document.getElementById("collapse-box");


    collapse.appendChild(document.createElement("ul"));
    for(var j = 1;j <= myImageSlide.length;j++){

        var li = document.createElement("li"),
            i = document.createElement("i");

            collapse.firstElementChild.appendChild(li);

            li.setAttribute("data-value",j+"");

            li.appendChild(i);

            i.classList.add("fa","fa-circle");
    }

    collapse.firstElementChild.children[0].classList.add("active");
    
    var li = document.querySelectorAll(".collapse-box ul li"),
        count = 0;


    setInterval(nextClickBtn,8000);
        function nextClickBtn(){
            if(count < myImageSlide.length - 1 ){
                li[count].classList.remove("active");
                myImageSlide[count].classList.remove("active");
                count++;
                li[count].classList.add("active");
                myImageSlide[count].classList.add("active");
            }
            else if(count == myImageSlide.length - 1)
            {
                li[count].classList.remove("active");
                myImageSlide[count].classList.remove("active");
                count = 0;
                li[count].classList.add("active");
                myImageSlide[count].classList.add("active");
            }
        }
        function prevClickBtn(){
            if(count > 0){
                li[count].classList.remove("active");
                myImageSlide[count].classList.remove("active");
                count--;
                li[count].classList.add("active");
                myImageSlide[count].classList.add("active");
            }
            else if(count == 0){
                li[count].classList.remove("active");
                myImageSlide[count].classList.remove("active");
                count = myImageSlide.length - 1;
                li[count].classList.add("active");
                myImageSlide[count].classList.add("active");
            }
        }