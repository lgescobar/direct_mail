<?php

/***************************************************************
 * Extension Manager/Repository config file for ext "direct_mail".
 *
 * Auto generated 29-07-2013 16:04
 *
 * Manual updates:
 * Only the data in the array - everything else is removed by next
 * writing. "version" and "dependencies" must not be touched!
 ***************************************************************/

$EM_CONF[$_EXTKEY] = array(
    'title' => 'Direct Mail',
    'description' => 'Advanced Direct Mail/Newsletter mailer system with sophisticated options for personalization of emails including response statistics.',
    'category' => 'module',
    'shy' => 0,
    'version' => '6.1.1',
    'dependencies' => 'cms,tt_address',
    'conflicts' => 'sr_direct_mail_ext,it_dmail_fix,plugin_mgm,direct_mail_123',
    'priority' => '',
    'loadOrder' => '',
    'module' => 'mod1,mod2,mod3,mod4,mod5,mod6',
    'state' => 'stable',
    'uploadfolder' => 1,
    'createDirs' => '',
    'modify_tables' => 'tt_content,tt_address,fe_users',
    'clearcacheonload' => 0,
    'lockType' => '',
    'author' => 'Ivan Kartolo',
    'author_email' => 'ivan.kartolo@dkd.de',
    'author_company' => 'd.k.d Internet Service GmbH',
    'CGLcompliance' => '',
    'CGLcompliance_note' => '',
    'constraints' => array(
        'depends' => array(
            'cms' => '',
            'tt_address' => '',
            'php' => '5.5.0',
            'typo3' => '8.7.0-8.99.99',
            'jumpurl' => '7.7.0-7.7.99',
        ),
        'conflicts' => array(
            'sr_direct_mail_ext' => '',
            'it_dmail_fix' => '',
            'plugin_mgm' => '',
            'direct_mail_123' => '',
        ),
        'suggests' => array(
        ),
    ),
    'suggests' => array(
    ),
    'autoload' => array(
        'psr-4' => array(
            'DirectMailTeam\\DirectMail\\' => 'Classes/',
            'Fetch\\' => 'Resources/Private/Php/Fetch/src/Fetch/'
        )
    ),
);
