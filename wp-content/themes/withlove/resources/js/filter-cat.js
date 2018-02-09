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