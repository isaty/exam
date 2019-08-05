const allClass = "active-move-up inactive-move-up active-move-down inactive-move-down";
var divCount = $('.screen').length;
var scrollCounter = divCount;
var rebindTime = isMobileDevice() ? 100 : 1200;
var viewportWidth = Math.max(document.documentElement.clientWidth, window.innerWidth || 0);
var scrollingAnimationTime = 1000;

function isMobileDevice() {
    if (/Android|webOS|iPhone|iPad|iPod|BlackBerry/i.test(navigator.userAgent) ||
        (/Android|webOS|iPhone|iPad|iPod|BlackBerry/i.test(navigator.platform))) {
        return true;
    }
    return false;
}

function bindEvents(timeout) {
    setTimeout(function () {
        $(window).on('mousewheel', function (e) {
            // if(viewportWidth > 992){
                if (e.originalEvent.wheelDelta / 120 > 0){
                    // alert("Up");
                    scrollUpCase();
                }
                else{
                    // alert("Down");
                    scrollDownCase();
             }
        });

        $(window).on('touchstart', function (e) {

            var swipe = e.originalEvent.touches,
                start = swipe[0].pageY;

            $(this).on('touchmove', function (e) {

                var contact = e.originalEvent.touches,
                    end = contact[0].pageY,
                    distance = end - start;

                if (distance < -30)
                    scrollDownCase();
                if (distance > 30)
                    scrollUpCase();
            })
                .one('touchend', function () {

                    $(this).off('touchmove touchend');
                });
        });

        $(window).keyup(function (e) {
            if(e.keyCode === 38 ){
                scrollUpCase();
            }
            if(e.keyCode === 40 ){
                scrollDownCase();
            }
        });

    }, timeout);

}

function scrollUpCase() {
    if (scrollCounter < divCount) {
        scrollCounter++;
        $(window).unbind();
        $('.screen.active').addClass('active-move-down').prev(".screen").addClass("inactive-move-down");
        setTimeout(function () {
            $('.screen.active').removeClass('active').prev(".screen").addClass("active");
            $(".screen").removeClass(allClass);
            bindEvents(rebindTime);
        }, scrollingAnimationTime);
    }
}

function scrollDownCase() {
    if (scrollCounter > 1) {
        scrollCounter--;
        $(window).unbind();
        $('.screen.active').addClass('active-move-up').next(".screen").addClass("inactive-move-up");
        setTimeout(function () {
            $('.screen.active').removeClass('active').next(".screen").addClass("active");
            $(".screen").removeClass(allClass);
            bindEvents(rebindTime);
        }, scrollingAnimationTime);
    }
}

$(document).ready(function () {
    // if(viewportWidth > 992) {
        bindEvents(10);
    // }
    var $barTop = "<div class='bar top'></div>" ;
    var $barBottom = "<div class='bar bottom'></div>" ;
    $(".section-heading").each(function () {
        $(this).append($barTop, $barBottom);
    });
    var $bubbles = '' +
        '<div class="bubble bubble-1"></div>' +
        '<div class="bubble bubble-2"></div>' +
        '<div class="bubble bubble-3"></div>';
    $(".content-empty-div").each(function () {
        $(this).append($bubbles);
    });
    $(".carousel-next-custom").on("click", function () {
        $('.carousel').carousel('next')
    });
    $(".carousel-prev-custom").on("click", function () {
        $('.carousel').carousel('prev')
    });
});



$(window).resize(function () {
    viewportWidth = Math.max(document.documentElement.clientWidth, window.innerWidth || 0);
});