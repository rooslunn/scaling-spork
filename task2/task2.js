(function($) {

    function get_data_url(url) {
        $.get(url).then(
            function done (data) {
                set_status(JSON.stringify(data));
            },
            function fail (error) {
                var error_text = error.status + ' ' + error.statusText;
                set_status(error_text);
            },
            function progress (info) {
                set_status(info);
            }
        );
    };

    function set_status(status) {
        $('#id-p-status').text(status);
    }

    $('#id-btn-get-data').bind('click', function () {
        var url = $('#id-input-url').val();
        set_status('Getting data from ' + url + ' ...');
        $('#id-modal-status').modal('show');
        get_data_url(url);
    });

})(jQuery);