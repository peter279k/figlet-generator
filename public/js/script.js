page.open('http://net.tutsplus.com', function () {
    var qunit = page.evaluate(function () {
        var qunitRes = document.getElementById("qunit-testresult");
        return qunitRes;
    });

    console.log(qunitRes);
    phantom.exit();
});
