(function ($, undefined) {
    $(document).ready(function() {

        // Slider

        // var home_slider = $('.home__slider');
        // home_slider.slick({
        //     dots: true,
        //     infinite: true,
        //     speed: 500,
        //     // autoplay: true,
        //     arrows: false,
        //     appendDots: $('.nav-home'),
        //     fade: true,
        //     cssEase: 'linear'
        // });

        var svg = "<svg id='loading' width='171px' height='171px' viewBox='-2 -2 184 184'><circle id='loader-oval-bg' stroke='#909090' stroke-width='2' fill='none' cx='89' cy='89' r='89'></circle><circle id='menu-loader-oval' stroke='#26A6E5' stroke-width='5' fill='none' cx='89' cy='89' r='89'></circle></svg>",
            offset = 0,
            perfData = window.performance.timing,
            EstimatedTime = -(perfData.loadEventEnd - perfData.navigationStart),
            time = 50 * parseInt(EstimatedTime / 1e3 % 60);

        // $("#loader-oval").animate({
        //     strokeDashoffset: offset
        // }, 1.5 * time);

        // setTimeout(function() {
            // $(".preloader-wrap").fadeOut(500)
            // $("nav.nav-home ul.nav-home__menu li.nav-home__link--active img").before(svg);
            // $("#menu-loader-oval").animate({
            //     strokeDashoffset: offset
            // }, 8e3);
            $(".home__slider").slick({
                arrows: false,
                autoplay: true,
                autoplaySpeed: 5000,
                speed: 1000,
                pauseOnHover: false,
                pauseOnFocus: false,
                fade: true,
                dots: false,
                responsive: [{
                    breakpoint: 768,
                    settings: {
                        fade: false,
                        dots: true
                    }
                }]
            });
        // }, time);

        // $(".home__slider").on("beforeChange", function(e, a, n, i) {
        //     $("nav.nav-home ul.nav-home__menu li.nav-home__link").removeClass("nav__link--active"),
        //     $("nav.nav-home ul.nav-home__menu li.nav-home__link.nav__link--slider svg#loading").remove(),
        //     $("nav.nav-home ul.nav-home__menu li.nav-home__link.nav__link--slider[data-item=" + i + "] img").before(svg),
        //     $("nav.nav-home ul.nav-home__menu li.nav-home__link.nav__link--slider[data-item=" + i + "]").addClass("nav__link--active"),
        //     $("#menu-loader-oval").animate({
        //         strokeDashoffset: offset
        //     }, 8e3)
        // });
        $("ul.nav-home__menu li.nav-home__link.nav__link--slider").click(function() {
            var e = $(this).attr("data-item");
            $(".home__slider").slick("slickGoTo", e)
        });

    });
})(jQuery);