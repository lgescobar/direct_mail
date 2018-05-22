'use strict';

/* *************************************************************
 *  Copyright notice
 *
 *  (c) 2018 KO-Web | Kai Ole Hartwig <mail@ko-web.net>
 *
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 2 of the License, or
 *  (at your option) any later version.
 *
 *  The GNU General Public License can be found at
 *  http://www.gnu.org/copyleft/gpl.html.
 *
 *  This script is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 ***************************************************************/

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

        // if after timeout milliseconds function doesn't return true, abort
        if (timeout) {
            timeoutPointer = setTimeout(function () {
                clearInterval(intervalPointer);
            }, timeout);
        }
    };

    return Observer;
});
