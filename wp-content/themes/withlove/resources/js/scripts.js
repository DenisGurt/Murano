(function ($, undefined) {
    $(document).ready(function() {

        // Slider

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

        $(".home__slider").on("beforeChange", function(e, a, n, i) {
            $(".nav-home__link").removeClass("nav-home__link--active");
            $(".nav-home__link.nav__link--slider[data-item=" + i + "]").addClass("nav-home__link--active");
        });
        $(".nav-home__link.nav__link--slider").click(function() {
            var e = $(this).attr("data-item");
            $(".home__slider").slick("slickGoTo", e)
        });


        // Select

        if ($('#filter-cat').length > 0)
            styleSelect('#filter-cat');

        // Sticky filter

        $('.filtering').stick_in_parent();

    });
})(jQuery);