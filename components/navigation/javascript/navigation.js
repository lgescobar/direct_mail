"use strict";

Ext.namespace('TYPO3.DirectMail.Navigation');

TYPO3.DirectMail.Navigation = Ext.extend(Ext.Panel, {
    id: 'directmail-navigation',
    toolbars: {},
    tpl: [
        '<h1>DirectMail folders</h1>',
        '<ol><tpl for=".">',
            '<li>[{uid}] {title}</li>',
        '</tpl></ol>',
        '<h2>Explanation</h2>'
    ],
    data: [],

    /**
     * Initializes the component
     *
     * @return {void}
     */
    initComponent: function() {
        TYPO3.DirectMail.Navigation.DataProvider.getNewsletterFolders(this.update, this);

        // Ext.Ajax.request({
        //     url: TYPO3.settings.ajaxUrls['direct_mail_newsletter_folders'],
        //     success: function(response, opts) {
        //         var obj = Ext.decode(response.responseText);
        //         console.dir(obj);
        //     },
        //
        //     failure: function(response, opts) {
        //         console.log('server-side failure with status code ' + response.status);
        //     }
        // });

        // TYPO3.Components.PageTree.TopPanel.superclass.initComponent.apply(this, arguments);
        //
        // this.addDragDropNodeInsertionFeature();
        //
        // if (!TYPO3.Components.PageTree.Configuration.hideFilter
        //     || TYPO3.Components.PageTree.Configuration.hideFilter === '0'
        // ) {
        //     this.addFilterFeature();
        // }
        //
        // this.getTopToolbar().addItem({xtype: 'tbfill'});
        // this.addRefreshTreeFeature();
    }
});

// XTYPE Registration
Ext.reg('TYPO3.DirectMail.Navigation', TYPO3.DirectMail.Navigation);
