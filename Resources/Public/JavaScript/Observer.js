'use strict';

/**
 * Module: TYPO3/CMS/DirectMail/Observer
 * AJAX controller to load further paginated statistics directly from the browser.
 */
define([], function() {
    /**
     * Main object of the pagination controller.
     *
     * @type {{defaultDelay: int}}
     * @exports TYPO3/CMS/DirectMail/Observer
     */
    var Observer = {
        defaultDelay: 500
    };

    Observer.waitUntil = function (condition, callback, delay, timeout) {
        var timeoutPointer,
            intervalPointer;

        // if the check returns true, execute onComplete immediately
        if (condition()) {
            callback();
            return;
        }

        intervalPointer = setInterval(function () {
            if (!condition()) {
                // if check didn't return true, means we need another check in the next interval
                return;
            }

            // if the check returned true, means we're done here. clear the interval and the timeout and execute onComplete
            clearInterval(intervalPointer);

            if (timeoutPointer) {
                clearTimeout(timeoutPointer);
            }

            callback();
        }, delay || Observer.defaultDelay);

        // if after "timeout" milliseconds function doesn't return true, stop waiting for condition
        if (timeout) {
            timeoutPointer = setTimeout(function () {
                clearInterval(intervalPointer);
            }, timeout);
        }
    };

    return Observer;
});
