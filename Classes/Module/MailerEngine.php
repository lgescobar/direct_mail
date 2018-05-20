<?php
namespace DirectMailTeam\DirectMail\Module;

/*
 * This file is part of the TYPO3 CMS project.
 *
 * It is free software; you can redistribute it and/or modify it under
 * the terms of the GNU General Public License, either version 2
 * of the License, or any later version.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * The TYPO3 project - inspiring people to share!
 */

use DirectMailTeam\DirectMail\DirectMailUtility;
use DirectMailTeam\DirectMail\Utility\MailerEngineUtility;
use TYPO3\CMS\Core\Imaging\Icon;
use TYPO3\CMS\Core\Imaging\IconFactory;
use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;
use TYPO3\CMS\Backend\Utility\BackendUtility;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Core\Messaging\FlashMessage;
use TYPO3\CMS\Core\Messaging\FlashMessageService;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use TYPO3\CMS\Fluid\View\StandaloneView;

/**
 * Module Mailer-Engine for tx_directmail extension
 *
 * @author		Kasper Sk�rh�j <kasper@typo3.com>
 * @author  	Jan-Erik Revsbech <jer@moccompany.com>
 * @author  	Stanislas Rolland <stanislas.rolland(arobas)fructifor.ca>
 * @author		Ivan-Dharma Kartolo	<ivan.kartolo@dkd.de>
 *
 * @package 	TYPO3
 * @subpackage 	tx_directmail

 */
class MailerEngine extends \TYPO3\CMS\Backend\Module\BaseScriptClass
{
    public $extKey = 'direct_mail';
    public $TSconfPrefix = 'mod.web_modules.dmail.';
    // Internal
    public $params=array();
    public $perms_clause='';
    public $pageinfo='';
    public $sys_dmail_uid;
    public $pages_uid;
    public $id;
    public $implodedParams=array();
    // If set a valid user table is around
    public $userTable;
    public $sys_language_uid = 0;
    public $allowedTables = array('tt_address','fe_users');
    public $MCONF;
    public $cshTable;
    public $formname = 'dmailform';

    /**
     * IconFactory for skinning
     * @var \TYPO3\CMS\Core\Imaging\IconFactory
     */
    protected $iconFactory;

    /** @var FlashMessageService $flashMessageService */
    protected $flashMessageService;
    protected $defaultFlashMessageQueue;

    /**
     * The name of the module
     *
     * @var string
     */
    protected $moduleName = 'DirectMailNavFrame_MailerEngine';

    /**
     * @var \TYPO3\CMS\Fluid\View\StandaloneView
     */
    protected $view;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->MCONF = array(
                'name' => $this->moduleName
        );
    }

    /**
     * Initializing global variables
     *
     * @return	void
     */
    public function init()
    {
        parent::init();

        // initialize IconFactory
        $this->iconFactory = GeneralUtility::makeInstance(IconFactory::class);

        // initialize FlashMessageService
        $this->flashMessageService = GeneralUtility::makeInstance(FlashMessageService::class);
        $this->defaultFlashMessageQueue = $this->flashMessageService->getMessageQueueByIdentifier();

        $temp = BackendUtility::getModTSconfig($this->id, 'mod.web_modules.dmail');
        if (!is_array($temp['properties'])) {
            $temp['properties'] = array();
        }
        $this->params = $temp['properties'];
        $this->implodedParams = DirectMailUtility::implodeTSParams($this->params);
        if ($this->params['userTable'] && is_array($GLOBALS["TCA"][$this->params['userTable']])) {
            $this->userTable = $this->params['userTable'];
            $this->allowedTables[] = $this->userTable;
        }
        $this->MOD_MENU['dmail_mode'] = BackendUtility::unsetMenuItems($this->params, $this->MOD_MENU['dmail_mode'], 'menu.dmail_mode');

            // initialize backend user language
        if ($this->getLanguageService()->lang && ExtensionManagementUtility::isLoaded('static_info_tables')) {
            $res = $GLOBALS["TYPO3_DB"]->exec_SELECTquery(
                'sys_language.uid',
                'sys_language LEFT JOIN static_languages ON sys_language.static_lang_isocode=static_languages.uid',
                'static_languages.lg_typo3=' . $GLOBALS["TYPO3_DB"]->fullQuoteStr($this->getLanguageService()->lang, 'static_languages') .
                    BackendUtility::BEenableFields('sys_language') .
                    BackendUtility::deleteClause('sys_language') .
                    BackendUtility::deleteClause('static_languages')
                );
            while (($row = $GLOBALS["TYPO3_DB"]->sql_fetch_assoc($res))) {
                $this->sys_language_uid = $row['uid'];
            }
            $GLOBALS["TYPO3_DB"]->sql_free_result($res);
        }
            // load contextual help
        $this->cshTable = '_MOD_' . $this->MCONF['name'];
        if ($GLOBALS["BE_USER"]->uc['edit_showFieldHelp']) {
            $this->getLanguageService()->loadSingleTableDescription($this->cshTable);
        }

        $this->view = GeneralUtility::makeInstance(StandaloneView::class);
        $this->view->setTemplateRootPaths([Statistics::DEFAULT_TEMPLATE_ROOT_PATH]);
        $this->view->setLayoutRootPaths([Statistics::DEFAULT_LAYOUT_ROOT_PATH]);
        $this->view->setPartialRootPaths([Statistics::DEFAULT_PARTIAL_ROOT_PATH]);
    }

    /**
     * Entrance from the backend module. This replace the _dispatch
     *
     * @param ServerRequestInterface $request The request object from the backend
     * @param ResponseInterface $response The reponse object sent to the backend
     *
     * @return ResponseInterface Return the response object
     */
    public function mainAction(ServerRequestInterface $request, ResponseInterface $response)
    {
        $this->getLanguageService()->includeLLFile('EXT:direct_mail/Resources/Private/Language/locallang_mod2-6.xlf');
        $this->getLanguageService()->includeLLFile('EXT:direct_mail/Resources/Private/Language/locallang_csh_sysdmail.xlf');

        $this->init();

        $this->main();
        $this->printContent();

        $response->getBody()->write($this->content);
        return $response;
    }

    /**
     * The main function.
     *
     * @return	void
     */
    public function main()
    {
        $this->CMD = GeneralUtility::_GP('CMD');
        $this->pages_uid = intval(GeneralUtility::_GP('pages_uid'));
        $this->sys_dmail_uid = intval(GeneralUtility::_GP('sys_dmail_uid'));
        $this->pageinfo = BackendUtility::readPageAccess($this->id, $this->perms_clause);
        $access = is_array($this->pageinfo) ? 1 : 0;

        if (($this->id && $access) || ($GLOBALS["BE_USER"]->user['admin'] && !$this->id)) {
            // Draw the header.
            $this->doc = GeneralUtility::makeInstance('TYPO3\\CMS\\Backend\\Template\\DocumentTemplate');
            $this->doc->backPath = $GLOBALS["BACK_PATH"];
            $this->doc->setModuleTemplate('EXT:direct_mail/Resources/Private/Templates/Module.html');
            $this->doc->form='<form action="" method="post" name="' . $this->formname . '" enctype="multipart/form-data">';

            // JavaScript
            $this->doc->JScode = '
				<script language="javascript" type="text/javascript">
					script_ended = 0;
					function jumpToUrl(URL)	{ //
						window.location.href = URL;
					}
					function jumpToUrlD(URL) { //
						window.location.href = URL+"&sys_dmail_uid=' . $this->sys_dmail_uid . '";
					}
				</script>
			';

            $this->doc->postCode='
				<script language="javascript" type="text/javascript">
					script_ended = 1;
					if (top.fsMod) top.fsMod.recentIds[\'web\'] = ' . intval($this->id) . ';
				</script>
			';

            $markers = array(
                'FLASHMESSAGES' => '',
                'CONTENT' => '',
            );

            $docHeaderButtons = array(
                'PAGEPATH' => $this->getLanguageService()->sL('LLL:EXT:lang/locallang_core.php:labels.path') . ': ' . GeneralUtility::fixed_lgd_cs($this->pageinfo['_thePath'], 50),
                'SHORTCUT' => '',
                'CSH' => BackendUtility::cshItem($this->cshTable, '', $GLOBALS["BACK_PATH"])
            );
                // shortcut icon
            if ($GLOBALS["BE_USER"]->mayMakeShortcut()) {
                $docHeaderButtons['SHORTCUT'] = $this->doc->makeShortcutIcon('id', implode(',', array_keys($this->MOD_MENU)), $this->MCONF['name']);
            }

            $module = $this->pageinfo['module'];
            if (!$module) {
                $pidrec=BackendUtility::getRecord('pages', intval($this->pageinfo['pid']));
                $module=$pidrec['module'];
            }
                    // Render content:
            if ($module == 'dmail') {
                if (GeneralUtility::_GP('cmd') == 'delete') {
                    $this->deleteDMail(GeneralUtility::_GP('uid'));
                }

                    // Direct mail module
                if ($this->pageinfo['doktype'] == 254 && $this->pageinfo['module'] == 'dmail') {
                    $markers['CONTENT'] = '<h1>' . $this->getLanguageService()->getLL('header_mailer') . '</h1>' .
                    $this->cmd_cronMonitor() . $this->cmd_mailerengine();
                } elseif ($this->id != 0) {
                    /* @var $flashMessage FlashMessage */
                    $flashMessage = GeneralUtility::makeInstance('TYPO3\\CMS\\Core\\Messaging\\FlashMessage',
                        $this->getLanguageService()->getLL('dmail_noRegular'),
                        $this->getLanguageService()->getLL('dmail_newsletters'),
                        FlashMessage::WARNING
                    );
                    $this->defaultFlashMessageQueue->enqueue($flashMessage);
                    $markers['FLASHMESSAGES'] = $this->defaultFlashMessageQueue->renderFlashMessages();
                }
            } else {
                $flashMessage = GeneralUtility::makeInstance('TYPO3\\CMS\\Core\\Messaging\\FlashMessage',
                    $this->getLanguageService()->getLL('select_folder'),
                    $this->getLanguageService()->getLL('header_mailer'),
                    FlashMessage::WARNING
                );
                $this->defaultFlashMessageQueue->enqueue($flashMessage);
                $markers['FLASHMESSAGES'] = $this->defaultFlashMessageQueue->renderFlashMessages();
            }

            $this->content = $this->doc->startPage($this->getLanguageService()->getLL('title'));
            $this->content.= $this->doc->moduleBody($this->pageinfo, $docHeaderButtons, $markers, array());
        } else {
            // If no access or if ID == zero

            $this->doc = GeneralUtility::makeInstance('TYPO3\\CMS\\Backend\\Template\\DocumentTemplate');
            $this->doc->backPath = $GLOBALS["BACK_PATH"];

            $this->content .= $this->doc->startPage($this->getLanguageService()->getLL('title'));
            $this->content .= $this->doc->header($this->getLanguageService()->getLL('title'));
            $this->content .= '<div style="padding-top: 15px;"></div>';
        }
    }

    /**
     * Prints out the module HTML
     *
     * @return	void
     */
    public function printContent()
    {
        $this->content.=$this->doc->endPage();
    }

    /**
     * Delete existing dmail record
     *
     * @param int $uid Record uid to be deleted
     *
     * @return void
     */
    public function deleteDMail($uid)
    {
        $table = 'sys_dmail';
        if ($GLOBALS["TCA"][$table]['ctrl']['delete']) {
            $res = $GLOBALS["TYPO3_DB"]->exec_UPDATEquery(
                $table,
                'uid = ' . $uid,
                array($GLOBALS["TCA"][$table]['ctrl']['delete'] => 1)
            );
            $GLOBALS["TYPO3_DB"]->sql_free_result($res);
        }
    }

    /**
     * Monitor the cronjob.
     *
     * @return	string		status of the cronjob in HTML Tableformat
     */
    public function cmd_cronMonitor()
    {
        $content = '';
        $mailerStatus = 0;
        $lastExecutionTime = 0;
        $logContent = "";


            // seconds
        $cronInterval = $GLOBALS["TYPO3_CONF_VARS"]['EXTCONF']['direct_mail']['cronInt'] * 60;
        $lastCronjobShouldBeNewThan = (time() - $cronInterval);

        $filename = PATH_site . 'typo3temp/tx_directmail_dmailer_log.txt';
        if (file_exists($filename)) {
            $logContent = file_get_contents($filename);
            $lastExecutionTime = substr($logContent, 0, 10);
        }

        /*
         * status:
         * 	1 = ok
         * 	0 = check
         * 	-1 = cron stopped
         */

            // cron running or error (die function in dmailer_log)
        if (file_exists(PATH_site . 'typo3temp/tx_directmail_cron.lock')) {
            $res = $GLOBALS['TYPO3_DB']->exec_SELECTquery('*', 'sys_dmail_maillog', 'response_type = 0', 'tstamp DESC');
            $lastSend = $GLOBALS['TYPO3_DB']->sql_fetch_assoc($res);
            $GLOBALS["TYPO3_DB"]->sql_free_result($res);

            if (($lastSend['tstamp'] < time()) && ($lastSend['tstamp'] > $lastCronjobShouldBeNewThan)) {
                // cron is sending
                $mailerStatus = 1;
            } else {
                // there's lock file but cron is not sending
                $mailerStatus = -1;
            }
            // cron is idle or no cron
        } elseif (strpos($logContent, 'error')) {
            // error in log file
            $mailerStatus = -1;
            $error = substr($logContent, strpos($logContent, 'error') + 7);
        } elseif (!strlen($logContent) || ($lastExecutionTime < $lastCronjobShouldBeNewThan)) {
            // cron is not set or not running
            $mailerStatus = 0;
        } else {
            // last run of cron is in the interval
            $mailerStatus = 1;
        }


        $currentDate = ' / ' . $this->getLanguageService()->getLL('dmail_mailerengine_current_time') . ' ' . BackendUtility::datetime(time()) . '. ';
        $lastRun = ' ' . $this->getLanguageService()->getLL('dmail_mailerengine_cron_lastrun') . ($lastExecutionTime ? BackendUtility::datetime($lastExecutionTime) : '-') . $currentDate;
        switch ($mailerStatus) {
            case -1:
                $flashMessage = GeneralUtility::makeInstance('TYPO3\\CMS\\Core\\Messaging\\FlashMessage',
                    $this->getLanguageService()->getLL('dmail_mailerengine_cron_warning') . ': ' . ($error ? $error : $this->getLanguageService()->getLL('dmail_mailerengine_cron_warning_msg')) . $lastRun,
                    $this->getLanguageService()->getLL('dmail_mailerengine_cron_status'),
                    FlashMessage::ERROR
                );
                break;
            case 0:
                $flashMessage = GeneralUtility::makeInstance('TYPO3\\CMS\\Core\\Messaging\\FlashMessage',
                    $this->getLanguageService()->getLL('dmail_mailerengine_cron_caution') . ': ' . $this->getLanguageService()->getLL('dmail_mailerengine_cron_caution_msg') . $lastRun,
                    $this->getLanguageService()->getLL('dmail_mailerengine_cron_status'),
                    FlashMessage::WARNING
                );
                break;
            case 1:
                $flashMessage = GeneralUtility::makeInstance('TYPO3\\CMS\\Core\\Messaging\\FlashMessage',
                    $this->getLanguageService()->getLL('dmail_mailerengine_cron_ok') . ': ' . $this->getLanguageService()->getLL('dmail_mailerengine_cron_ok_msg') . $lastRun,
                    $this->getLanguageService()->getLL('dmail_mailerengine_cron_status'),
                    FlashMessage::OK
                );
                break;
            default:
        }
        $this->defaultFlashMessageQueue->enqueue($flashMessage);
        return $this->defaultFlashMessageQueue->renderFlashMessages();
    }

    /**
     * Shows the status of the mailer engine.
     * TODO: Should really only show some entries, or provide a browsing interface.
     *
     * @return	string		List of the mailing status
     */
    public function cmd_mailerengine()
    {
        $invokeMessage = "";

            // enable manual invocation of mailer engine; enabled by default
        $enableTrigger = ! (isset($this->params['menu.']['dmail_mode.']['mailengine.']['disable_trigger']) && $this->params['menu.']['dmail_mode.']['mailengine.']['disable_trigger']);
        if ($enableTrigger && GeneralUtility::_GP('invokeMailerEngine')) {
            /* @var $flashMessage FlashMessage */
            $flashMessage = GeneralUtility::makeInstance('TYPO3\\CMS\\Core\\Messaging\\FlashMessage',
                '<strong>' . $this->getLanguageService()->getLL('dmail_mailerengine_log') . '</strong><br />' . nl2br($this->invokeMEngine()),
                $this->getLanguageService()->getLL('dmail_mailerengine_invoked'),
                FlashMessage::INFO
            );
            $this->defaultFlashMessageQueue->enqueue($flashMessage);
            $invokeMessage = $this->defaultFlashMessageQueue->renderFlashMessages();
        }

        // Invoke engine
        if ($enableTrigger) {
            $out = '<p>' . $this->getLanguageService()->getLL('dmail_mailerengine_manual_explain') . '<br /><br /><a class="t3-link" href="' . BackendUtility::getModuleUrl('DirectMailNavFrame_MailerEngine') . '&id=' . $this->id . '&invokeMailerEngine=1"><strong>' . $this->getLanguageService()->getLL('dmail_mailerengine_invoke_now') . '</strong></a></p>';
            $invokeMessage .= '<div style="padding-top: 20px;"></div>';
            $invokeMessage .= $this->doc->section(BackendUtility::cshItem($this->cshTable, 'mailerengine_invoke', $GLOBALS["BACK_PATH"]) . $this->getLanguageService()->getLL('dmail_mailerengine_manual_invoke'), $out, 1, 1, 0, true);
            $invokeMessage .= '<div style="padding-top: 20px;"></div>';
        }

        /** @var \DirectMailTeam\DirectMail\Utility\MailerEngineUtility $statisticsUtility */
        $mailerEngineUtility = GeneralUtility::makeInstance(MailerEngineUtility::class);
        $pageSize = MailerEngineUtility::DEFAULT_STATISTIC_ENTRIES_PER_PAGE;

        $this->view->setTemplate('MailerEngine/List');
        $this->view->assign('sentMails', $mailerEngineUtility->getPaginatedStatistics($this->id, 0, $pageSize));
        $this->view->assign(
            'dateFormat',
            $GLOBALS['TYPO3_CONF_VARS']['SYS']['ddmmyy'] . ' ' . $GLOBALS['TYPO3_CONF_VARS']['SYS']['hhmm']
        );

        $out = $this->view->render();

        // Display mailer engine status
        $out = $invokeMessage . $out;
        return $this->doc->section(BackendUtility::cshItem($this->cshTable, 'mailerengine_status', $GLOBALS["BACK_PATH"])
            . $this->getLanguageService()->getLL('dmail_mailerengine_status'), $out, 1, 1, 0, true);
    }

    /**
     * Create delete link with trash icon
     *
     * @param int $uid Uid of the record
     *
     * @return string Link with the trash icon
     */
    public function deleteLink($uid)
    {
        $icon = $this->iconFactory->getIcon('actions-edit-delete', Icon::SIZE_SMALL);
        $dmail = BackendUtility::getRecord('sys_dmail', $uid);
        if (!$dmail['scheduled_begin']) {
            return '<a href="' . BackendUtility::getModuleUrl('DirectMailNavFrame_MailerEngine') . '&id=' . $this->id . '&cmd=delete&uid=' . $uid . '">' . $icon . '</a>';
        }
        return "";
    }

    /**
     * Wrapping a string with a link
     *
     * @param string $str String to be wrapped
     * @param int $uid Uid of the record
     *
     * @return string wrapped string as a link
     */
    public function linkDMail_record($str, $uid)
    {
        return $str;
        //TODO: Link to detail page for the new queue
        #return '<a href="index.php?id='.$this->id.'&sys_dmail_uid='.$uid.'&SET[dmail_mode]=direct">'.$str.'</a>';
    }

    /**
     * Invoking the mail engine
     *
     * @return	string Log from the mailer class
     * @see		Dmailer::start
     * @see		Dmailer::runcron
     */
    public function invokeMEngine()
    {
        // TODO: remove htmlmail
        /* @var $htmlmail \DirectMailTeam\DirectMail\Dmailer */
        $htmlmail = GeneralUtility::makeInstance('DirectMailTeam\\DirectMail\\Dmailer');
        $htmlmail->nonCron = 1;
        $htmlmail->start();
        $htmlmail->runcron();
        return implode(LF, $htmlmail->logArray);
    }

    /**
     * Returns LanguageService
     *
     * @return \TYPO3\CMS\Lang\LanguageService
     */
    protected function getLanguageService()
    {
        return $GLOBALS['LANG'];
    }
}
