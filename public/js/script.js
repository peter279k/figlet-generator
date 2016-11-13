page.open('http://localhost:8000/', function () {
    var qunit = page.evaluate(function () {
        var qunitRes = document.getElementById("qunit-testresult");
        return qunitRes;
    });

    console.log(qunitRes);
    phantom.exit();
});
