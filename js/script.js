$(document).ready(function () {

 // Booking Popup Close
    $(".close_msg").on("click", function () {
        $(".php_message2").addClass("close"); 
        $(".close_msg").addClass("close"); 
    });

    //Animation
    AOS.init();

    //navbar-toggler
    $('.navbar-toggler').click(function () {
        $('.navbar-toggler').toggleClass('change')
    })


    //navbar scroll
    $(window).scroll(function () {
        let position = $(this).scrollTop();
        if (position >= 910) {
            $('.navbar').addClass('navbar-background');

            $('.navbar').addClass('fixed-top');

        } else {
            $('.navbar').removeClass('navbar-background');

            $('.navbar').removeClass('fixed-top');
        }
    })


    //
    $('.nav-item a, .header-link, #back-to-top').click(function (link) {
        //link.preventDefault();

        //let target = $(this).attr('href');
        $('html, body').stop().animate({
            scrollTop: $(target).offset().top - 25
        }, 3000);
    })



    $(window).scroll(function () {
        let position = $(this).scrollTop();
        if (position >= 718) {
            $('#back-to-top').addClass('scrollTop');
        } else {
            $('#back-to-top').removeClass('scrollTop');

        }
    })


    $("#header, .info").ripples({
        dropRadius: 15,
        perturbance: 0.05,

    });
 
 
});
