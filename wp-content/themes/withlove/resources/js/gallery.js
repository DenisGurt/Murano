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