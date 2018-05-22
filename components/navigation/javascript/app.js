"use strict";

(function () {
    function navigationComponentRegistrationIsReady() {
        return (
            typeof TYPO3 !== 'undefined'
            && typeof TYPO3.ModuleMenu !== 'undefined'
            && typeof TYPO3.ModuleMenu.App.registerNavigationComponent !== 'undefined'
            && typeof TYPO3.ModuleMenu.App.registerNavigationComponent !== 'undefined'
        );
    }

    function registerDirectMailNavigation() {
        TYPO3.ModuleMenu.App.registerNavigationComponent('directmail-navigation', function () {
            return new TYPO3.DirectMail.Navigation();
        });
    }

    require(['TYPO3/CMS/DirectMail/Observer'], function (Observer) {
        Observer.waitUntil(
            navigationComponentRegistrationIsReady,
            registerDirectMailNavigation
        );
    });
})();
