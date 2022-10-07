var countdownNumberEl = document.getElementById('countdown-number');
var countdown = 30;

var responsiveSlider = function() {

    var slider = document.getElementById("slider");
    var sliderWidth = slider.offsetWidth;
    var slideList = document.getElementById("slideWrap");
    var count = 1;
    var items = slideList.querySelectorAll("li").length;
    var prev = document.getElementById("prev");
    var next = document.getElementById("next");
    var circle = document.getElementsByTagName("circle");

countdownNumberEl.textContent = countdown;

setInterval(function() {
    countdown = --countdown <= 0 ? 30 : countdown;

    countdownNumberEl.textContent = countdown;
}, 1000);




    window.addEventListener('resize', function() {
        sliderWidth = slider.offsetWidth;
    });

    var prevSlide = function() {
        if(count > 1) {
            count = count - 2;
            slideList.style.left = "-" + count * sliderWidth + "px";
            count++;
        }
        else if(count = 1) {
            count = items - 1;
            slideList.style.left = "-" + count * sliderWidth + "px";
            count++;
        }
    };

    var nextSlide = function() {
        if(count < items) {
            slideList.style.left = "-" + count * sliderWidth + "px";
            count++;
        }
        else if(count = items) {
            slideList.style.left = "0px";
            count = 1;
        }
    };

    next.addEventListener("click", function() {
        event.preventDefault()
        nextSlide();
        countdown = 31;
        circle.style =`
      @keyframes countdown {
         from {
        stroke-dashoffset: 0px;
    }
    to {
        stroke-dashoffset: 113px;
    }
    `
    });

    prev.addEventListener("click", function() {
        event.preventDefault()
        prevSlide();
        countdown = 31;
    });

    setInterval(function() {
        nextSlide()
    }, 31000);
    countdown = 31;

};

window.onload = function() {
    responsiveSlider();
}
