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
 * Module: TYPO3/CMS/DirectMail/StatisticsModule
 * AJAX controller to load further paginated statistics directly from the browser.
 */
define(['jquery'], function($) {
    /**
     * Main object of the pagination controller.
     *
     * @type {{loading: boolean, defaultPageSize: int}}
     * @exports TYPO3/CMS/DirectMail/StatisticsModule
     */
    var StatisticsModule = {
        loading: false,
        defaultPageSize: 25
    };

    /**
     * Event handler to process the AJAX request and use the response to populate the statistics list. It also removes
     * the link to the next page if the response doesn't have such link.
     *
     * @param {string} response The server response to be used to populate the statistics list
     */
    StatisticsModule.processAjaxResponse = function (response) {
        var $clickedLink = $(this);
        var $response = $(response);
        var $tableBody = $clickedLink.parent().find('table tbody');
        var $tableNext = $response.is('#stats-table') ?
            $response.filter('#stats-table') :
            $response.find('#stats-table');
        var $linkNext = $response.is('#next-link') ?
            $response.filter('#next-link') :
            $response.find('#next-link');

        if ($linkNext.length === 1) {
            $clickedLink.data({
                pageId: $linkNext.data('pageId'),
                page: $linkNext.data('page'),
                pageSize: $linkNext.data('pageSize')
            });
        } else {
            $clickedLink.remove();
        }

        $tableBody.append($tableNext.find('tbody').children());
    };

    /**
     * Event handler to load further paginated statistics when requested by the user. It fires an AJAX request based on
     * the parameters of the link to the next page.
     *
     * @param {event} e MouseEvent
     */
    StatisticsModule.loadMoreStatistics = function (e) {
        e.preventDefault();
        var $clickedLink = $(this);

        if (StatisticsModule.loading) {
            return false;
        } else {
            StatisticsModule.loading = true;
            $clickedLink.addClass('disabled');
        }

        $.ajax({
            url: TYPO3.settings.ajaxUrls['direct_mail_statistics'],
            data: {
                pageId: $clickedLink.data('pageId'),
                page: $clickedLink.data('page') || 0,
                pageSize: $clickedLink.data('pageSize') || StatisticsModule.defaultPageSize
            },
            dataType: 'html',
            success: StatisticsModule.processAjaxResponse,
            context: this
        }).always(function () {
            StatisticsModule.loading = false;
            $clickedLink.removeClass('disabled');
        });
    };

    /*
     * initialize date fields to add a datepicker to each field
     * note: this function can be called multiple times (e.g. after AJAX requests) because it only
     * applies to fields which haven't been used yet.
     *
     * @see DateTimePicker.js -> DateTimePicker.initialize()
     */
    /**
     * Initialize markup with data attributes
     *
     * @param {object} theDocument
     */
    StatisticsModule.initializeMarkupTrigger = function (theDocument) {
        $(theDocument).on('click', '#next-link', StatisticsModule.loadMoreStatistics);
    };

    StatisticsModule.initializeMarkupTrigger(document);


    return StatisticsModule;
});
