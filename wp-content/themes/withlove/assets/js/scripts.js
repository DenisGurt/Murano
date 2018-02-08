(function($, undefined) {
    var catList = $('#category-list');

    $('#filter-cat').change(function() {
        var filter = $('#filter');

        $.ajax({
            url: wl_ajax.ajaxurl,
            data: filter.serialize(), // form data
            type: filter.attr('method'), // POST
            beforeSend:function(xhr){
                // filter.find('button').text('Processing...'); // changing the button label
            },
            success:function(data) {
                catList.html(data); // insert data
            },
            error: function(data) {
                console.log(data, "error");
            }
        });
        return false;
    });
})(jQuery);
(function($) {
    $(document).ready(function() {

        $(".gallery").lightGallery({
            download: false,
            thumbnail: true,
            exThumbImage: 'data-exthumbimage',
            counter: false
        });

    });
})(jQuery);
(function ($, undefined) {
    $(document).ready(function() {

        // Slider

        // var offset = 0,
        //     svg = "<svg id='loading' width='171px' height='171px' viewBox='-2 -2 184 184'><circle id='loader-oval-bg' stroke='#909090' stroke-width='2' fill='none' cx='89' cy='89' r='89'></circle><circle id='menu-loader-oval' stroke='#26A6E5' stroke-width='5' fill='none' cx='89' cy='89' r='89'></circle></svg>",
        //     perfData = window.performance.timing,
        //     EstimatedTime = -(perfData.loadEventEnd - perfData.navigationStart),
        //     time = 50 * parseInt(EstimatedTime / 1e3 % 60);

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

        $(".home__slider").on("beforeChange", function(e, a, n, i) {
            $(".nav-home__link").removeClass("nav-home__link--active");
            // $(".nav-home__link.nav__link--slider svg#loading").remove(),
            // $(".nav-home__link.nav__link--slider[data-item=" + i + "] img").before(svg),
            $(".nav-home__link.nav__link--slider[data-item=" + i + "]").addClass("nav-home__link--active");
            // $("#menu-loader-oval").animate({
            //     strokeDashoffset: offset
            // }, 8e3)
        });
        $(".nav-home__link.nav__link--slider").click(function() {
            var e = $(this).attr("data-item");
            $(".home__slider").slick("slickGoTo", e)
        });

    });
})(jQuery);