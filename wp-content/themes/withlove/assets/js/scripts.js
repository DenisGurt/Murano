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
(function($) {
    $(document).ready(function() {

        $map = $('#map');

        if ($map.length > 0)
            initMap();

    });
})(jQuery);

function initMap() {
    var uluru = {lat: 46.019111, lng: 8.960452};

    map = new google.maps.Map(document.getElementById('map'), {
        zoom: 15,
        center: uluru,
        mapTypeControl: false,
    });

    var styledMapType = new google.maps.StyledMapType(

        [
            {
                "featureType": "administrative",
                "elementType": "labels.text.fill",
                "stylers": [
                    {
                        "color": "#444444"
                    }
                ]
            },
            {
                "featureType": "landscape",
                "elementType": "all",
                "stylers": [
                    {
                        "color": "#d4dde0"
                    }
                ]
            },
            {
                "featureType": "poi",
                "elementType": "all",
                "stylers": [
                    {
                        "visibility": "off"
                    }
                ]
            },
            {
                "featureType": "road",
                "elementType": "all",
                "stylers": [
                    {
                        "saturation": -100
                    },
                    {
                        "lightness": 45
                    }
                ]
            },
            {
                featureType: 'road',
                elementType: 'labels.text.fill',
                stylers: [{color: '#222222'}]
            },
            {
                "featureType": "road.highway",
                "elementType": "all",
                "stylers": [
                    {
                        "visibility": "simplified"
                    }
                ]
            },
            {
                "featureType": "road.arterial",
                "elementType": "labels.icon",
                "stylers": [
                    {
                        "visibility": "off"
                    }
                ]
            },
            {
                "featureType": "transit",
                "elementType": "all",
                "stylers": [
                    {
                        "visibility": "off"
                    }
                ]
            },
            {
                "featureType": "water",
                "elementType": "all",
                "stylers": [
                    {
                        "color": "#116062"
                    },
                    {
                        "visibility": "on"
                    }
                ]
            }
        ]
    );

    map.mapTypes.set('styled_map', styledMapType);
    map.setMapTypeId('styled_map');
    var marker = new google.maps.Marker({
        position: uluru,
        map: map,
        icon: wl_ajax.mapMarker
    });
}
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