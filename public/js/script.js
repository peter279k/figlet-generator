var page = require('webpage').create();

function waitFor(testFx, onReady, timeOutMillis) {
    var maxtimeOutMillis = timeOutMillis ? timeOutMillis : 50000, //< Default Max Timout is 3s
    start = new Date().getTime(),
    condition = false,
    interval = setInterval(function() {
        if ( (new Date().getTime() - start < maxtimeOutMillis) && !condition ) {
            // If not time-out yet and condition not yet fulfilled
            condition = (typeof(testFx) === "string" ? eval(testFx) : testFx()); //< defensive code
        } else {
            if(!condition) {
                // If condition still not fulfilled (timeout but condition is 'false')
                console.log("'waitFor()' timeout");
                phantom.exit(1);
            } else {
                // Condition fulfilled (timeout and/or condition is 'true')
                console.log("'waitFor()' finished in " + (new Date().getTime() - start) + "ms.");
                typeof(onReady) === "string" ? eval(onReady) : onReady(); //< Do what it's supposed to do once the condition is fulfilled
                clearInterval(interval); //< Stop this interval
            }
        }
    }, 100); //< repeat check every 250ms
};

page.open('http://localhost:8000/', function () {
    if (status !== 'success') {
        console.log('unable to access the Network');

        phantom.exit(1);
    }

    waitFor(function() {
        return page.evaluate(function () {
            var qunitRes = document.getElementById("qunit-testresult");
            if(qunitRes && qunitRes.innerText.match('completed')) {
                return true;
            }

            return false;
        });
    }, function() {
        var failedNum = page.evaluate(function() {
            var qunitRes = document.getElementById('qunit-testresult');

            console.log(qunitRes.innerText);
            try {
                return qunitRes.getElementsByClassName('failed')[0].innerHTML;
            } catch (e) { }

            return 10000;
        });

        phantom.exit((parseInt(failedNum, 10) > 0) ? 1 : 0);
    });
});
