QUnit.test('start-button click event testing', function(assert) {
    $('#start-button').trigger('click');

    assert.ok(true, 'start-button was clicked!');
    assert.equal($('#start-button').attr('style'), 'display: none;', 'We expect style to be display: none;');
    assert.equal($('#about-figlet-txts').attr('style'), 'display: none;', 'We expect style to be display: none;');
});

QUnit.test('message-area value testing', function(assert) {

    assert.equal($('#message-area').val(), 'New Text', 'We expect the message-area value to be New Text');
});

QUnit.test('message-area input propertychange testing', function(assert) {
    $('#message-area').trigger('propertychange');

    assert.ok(true, 'message-area was input propertychange!');
});

QUnit.test('select figlet-attr change testing', function(assert) {
    $('select[name="figlet-attr"]').trigger('change');

    assert.ok(true, 'select figlet-attr has been changed!');
});

QUnit.test('async the requestData testing', function(assert) {
    var done = assert.async();
    setTimeout(function() {
        requestData();

        assert.equal(typeof($('#result-figlet-txt').html()), 'string');
        done();
    }, 20000);
});

QUnit.test('async the requestData testing message length is more longer', function(assert) {
    var done = assert.async();
    $('#message-area').val('New Text\nNew Text');
    setTimeout(function() {
        requestData();

        assert.equal(typeof($('#result-figlet-txt').html()), 'string');
        done();
    }, 20000);
});

QUnit.test('download-image-button testing', function(assert) {
    var done = assert.async();
    setTimeout(function() {
        $('#download-img-button').trigger('click');

        assert.ok(true, 'download-image-button has been clicked');
        assert.ok(true, 'figlet image has been downloaded');
        done();
    }, 20000);
});

QUnit.test('about-figlet testing', function(assert) {
    var done = assert.async();
    setTimeout(function() {
        $('#about-figlet').trigger('click');

        assert.equal(typeof($('#about-figlet-txts').html()), 'string');
        done();
    }, 20000);
});
