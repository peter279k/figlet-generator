$(function() {

    $('select').material_select();

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('select[name="figlet-forms"]').hide();
    $('div[name="figlet-forms"]').hide();
    $('#download-img-button').hide();

    $('#start-button').click(function(e) {
        e.preventDefault = true;
        $(e.target).hide('slow');
        $('div[name="figlet-forms"]').show('slow');
    });

    $('#message-area').val('New Text');
    $('#message-area').trigger('autoresize');

    $('#message-area').on('input propertychange', function(e) {
        $.post('figlet/generate', {'message-txt': $('#message-area').val()}, function(response) {
            $('#download-img-button').show();
            $('#result-figlet-txt').html(response);
        });
    });

});
