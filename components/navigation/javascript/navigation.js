"use strict";

Ext.namespace('TYPO3.DirectMail.Navigation');

TYPO3.DirectMail.Navigation = Ext.extend(Ext.Panel, {
    id: 'directmail-navigation',
    toolbars: {},
    tpl: [
        '<h1>vaya caca, {pedo}</h1>',
        '<ol><tpl for=".">',
            '<li>[{uid}] {title}</li>',
        '</tpl></ol>',
        '<h2>vaya por diox ({pedo})</h2>'
    ],
    data: [],

    /**
     * Initializes the component
     *
     * @return {void}
     */
    initComponent: function() {
        // this.currentlyShownPanel = new Ext.Panel({
        //     id: this.id + '-defaultPanel',
        //     cls: this.id + '-item typo3-pagetree-toppanel-item',
        //     border: false
        // });
        // this.items = [this.currentlyShownPanel];

        // console.log(TYPO3.settings.ajaxUrls['direct_mail_newsletter_folders']);
        // var self = this;

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
