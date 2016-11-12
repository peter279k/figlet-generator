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
        e.preventDefault = false;
        $(e.target).hide();
        $('#about-figlet-txts').hide();
        $('div[name="figlet-forms"]').show('slow');
    });

    $('#message-area').val('New Text');
    $('#message-area').trigger('autoresize');

    $('#message-area').on('input propertychange', function(e) {
        requestData();
    });

    $('select[name="figlet-attr"]').on('change', function(e) {
        requestData();
    });

    $('#download-img-button').on('click', function(e) {
        e.preventDefault = false;

        html2canvas($('#result-figlet-txt'), {
            onrendered: function (canvas) {
                $("#download-img-link").attr('href', canvas.toDataURL("image/png"));
                $("#download-img-link").attr('download','figlet.png');
                document.getElementById('download-img-link').click();
            }
        });
    });

    $('#about-figlet').on('click', function(e) {
        e.preventDefault = false;
        $('#start-button').show();
        $('#result-figlet-txt').html('');

        $.get('figlet/about', function(response) {
             $('#download-img-button').hide();
             $('div[name="figlet-forms"]').hide();
             var result = JSON.parse(response);
             var description = result['description'];
             var refUrl = result['reference-url'];
             for (index in refUrl) {
                 description += refUrl[index];
             }
             $('#about-figlet-txts').html(description);
             $('#about-figlet-txts').show('slow');
        });
    });

});

function requestData() {
    var postData = {
        'message-txt': $('#message-area').val(),
        'figlet-type': $('#figlet-type').val()
    };

    $.post('figlet/generate', postData, function(response) {
        $('#download-img-button').show();
        var textColor = $('#figlet-text-color').val();
        var bgColor =$('#figlet-background-color').val();
        var textType = $('#figlet-text-type').val();

        if (textColor == '') {
            $('#figlet-text-color option')[1].selected = true;
            textColor = $('#figlet-text-color').val();
        }

        if (bgColor == '') {
            $('#figlet-background-color option')[1].selected = true;
            bgColor =$('#figlet-background-color').val();
        }

        if (textType == '') {
            $('#figlet-text-type option')[1].selected = true;
            textType = $('#figlet-text-type').val();
        }

        var msgTxt = $('#message-area').val().split('\n');

        if (msgTxt.length >= 2) {
            $('#figlet-area').attr('class', 'input-field col s6');
        } else {
            $('#figlet-area').attr('class', 'input-field col s12');
        }

        $('#result-figlet-txt').attr('class', '');
        $('#result-figlet-txt').addClass(bgColor);
        $('#result-figlet-txt').css('color', textColor);
        $('#result-figlet-txt').css('font-weight', textType);

        $('#result-figlet-txt').html(response);
    });
}
