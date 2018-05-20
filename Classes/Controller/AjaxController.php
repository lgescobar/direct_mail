<?php
declare(strict_types=1);

namespace DirectMailTeam\DirectMail\Controller;

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

use DirectMailTeam\DirectMail\Utility\StatisticsUtility;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Fluid\View\StandaloneView;

/**
 * AjaxController to bring AJAX-based pagination to the backend modules of EXT:direct_mail.
 */
class AjaxController
{
    const DEFAULT_TEMPLATE_ROOT_PATH = 'EXT:direct_mail/Resources/Private/Templates';
    const DEFAULT_LAYOUT_ROOT_PATH = 'EXT:direct_mail/Resources/Private/Layouts';
    const AJAX_LAYOUT_ROOT_PATH = 'EXT:direct_mail/Resources/Private/Layouts/Ajax';
    const DEFAULT_PARTIAL_ROOT_PATH = 'EXT:direct_mail/Resources/Private/Partials';

    /**
     * @var \DirectMailTeam\DirectMail\Utility\StatisticsUtility
     */
    protected $statisticsUtility;

    /**
     * @var \TYPO3\CMS\Fluid\View\StandaloneView
     */
    protected $view;

    public function __construct()
    {
        $this->statisticsUtility = GeneralUtility::makeInstance(StatisticsUtility::class);
        $this->view = GeneralUtility::makeInstance(StandaloneView::class);
        $this->view->setTemplateRootPaths([self::DEFAULT_TEMPLATE_ROOT_PATH]);
        $this->view->setLayoutRootPaths([
            0 => self::DEFAULT_LAYOUT_ROOT_PATH,
            10 => self::AJAX_LAYOUT_ROOT_PATH,
        ]);
        $this->view->setPartialRootPaths([self::DEFAULT_PARTIAL_ROOT_PATH]);
    }

    /**
     * Gets all sys_dmail records for the selected page (folder) according to the given pagination parameters to
     * avoid displaying too many records or overloading the server. This PSR-7 compatible controller enables loading
     * further paginated statistics on the client side (JavaScript).
     *
     * @param \Psr\Http\Message\ServerRequestInterface $request
     * @param \Psr\Http\Message\ResponseInterface $response
     * @return \Psr\Http\Message\ResponseInterface $response
     */
    public function getPaginatedNewsletterStatistics(
        ServerRequestInterface $request,
        ResponseInterface $response
    ): ResponseInterface {
        $pageId = (int)$request->getQueryParams()['pageId'] ?? 0;
        $page = (int)$request->getQueryParams()['page'] ?? 0;
        $pageSize = $request->getQueryParams()['limit'] ?? StatisticsUtility::DEFAULT_STATISTIC_ENTRIES_PER_PAGE;
        $pageSize = (int)$pageSize;

        $this->view->setTemplate('Statistics/List');
        $this->view->assign('statistics', $this->statisticsUtility->getPaginatedStatistics($pageId, $page, $pageSize));
        $this->view->assign('linkNext', $this->statisticsUtility->getLinkForNextPage($pageId, $page, $pageSize));
        $this->view->assign(
            'dateFormat',
            $GLOBALS['TYPO3_CONF_VARS']['SYS']['ddmmyy'] . ' ' . $GLOBALS['TYPO3_CONF_VARS']['SYS']['hhmm']
        );

        $content = $this->view->render();

        $response = $response
            ->withHeader('Content-Type', 'text/html; charset=utf-8')
            ->withHeader('X-JSON', 'false')
            ->withoutHeader('X-JSON');

        $response->getBody()->write($content);

        return $response;
    }
}
