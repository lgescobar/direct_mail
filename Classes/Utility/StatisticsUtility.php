<?php
declare(strict_types=1);

namespace DirectMailTeam\DirectMail\Utility;

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

use Doctrine\DBAL\Types\Type;
use TYPO3\CMS\Backend\Utility\BackendUtility;
use TYPO3\CMS\Core\Database\ConnectionPool;
use TYPO3\CMS\Core\SingletonInterface;
use TYPO3\CMS\Core\Utility\GeneralUtility;

/**
 * Statistics Utility of direct_mail extension. It acts in practice as a repository.
 */
class StatisticsUtility implements SingletonInterface
{
    const DEFAULT_STATISTIC_ENTRIES_PER_PAGE = 25;
    const LL_PREFIX = 'LLL:EXT:direct_mail/Resources/Private/Language/locallang_mod2-6.xlf:';

    /**
     * @var \TYPO3\CMS\Core\Database\Connection $dmailConnection
     */
    protected $dmailConnection;

    /**
     * @var \TYPO3\CMS\Core\Database\Connection $mailLogConnection
     */
    protected $mailLogConnection;

    public function __construct()
    {
        /** @var \TYPO3\CMS\Core\Database\ConnectionPool $connectionPool */
        $connectionPool = GeneralUtility::makeInstance(ConnectionPool::class);
        $this->dmailConnection = $connectionPool->getConnectionForTable('sys_dmail');
        $this->mailLogConnection = $connectionPool->getConnectionForTable('sys_dmail_maillog');
    }

    /**
     * Gets all sys_dmail records for the selected page (folder) according to the given pagination parameters to
     * avoid displaying too many records or overloading the server.
     *
     * @param int $pageId The page (folder) containing the sys_dmail records
     * @param int $page The current page based on the given page size
     * @param int $pageSize The page size to be used for the pagination
     * @return array The sys_dmail records for the asked page (pagination is meant)
     */
    public function getPaginatedStatistics(
        int $pageId,
        int $page = 0,
        int $pageSize = self::DEFAULT_STATISTIC_ENTRIES_PER_PAGE
    ): array {
        /** @var \TYPO3\CMS\Core\Database\Query\QueryBuilder $queryBuilder */
        $queryBuilder = $this->dmailConnection->createQueryBuilder();

        $statistics = $queryBuilder
            ->select('uid', 'pid', 'scheduled', 'scheduled_begin', 'scheduled_end', 'subject')
            ->from('sys_dmail')
            ->andWhere(
                $queryBuilder->expr()->eq('pid', $queryBuilder->createNamedParameter($pageId, \PDO::PARAM_INT)),
                $queryBuilder->expr()->eq('issent', $queryBuilder->expr()->literal(1, Type::INTEGER)),
                $queryBuilder->expr()->in('type', [0, 1])
            )
            ->orderBy('scheduled', 'DESC')
            ->addOrderBy('scheduled_begin', 'DESC')
            ->setMaxResults($pageSize)
            ->setFirstResult($page * $pageSize)
            ->execute()
            ->fetchAll(\PDO::FETCH_ASSOC);

        return array_map([$this, 'addMissingFields'], $statistics);
    }

    /**
     * Counts all sys_dmail records on the current page (folder) and calculates the parameters of the link to the next
     * page attending to the current page, page size and the need of a link. In case there are no more pages needed
     * returns an empty array.
     *
     * @param int $pageId The current page (folder) containing the sys_dmail records
     * @param int $page The current page based on the given page size
     * @param int $pageSize The page size to be used for the pagination
     * @return array The parameters for the link to the next page
     */
    public function getLinkForNextPage(
        int $pageId,
        int $page = 0,
        int $pageSize = self::DEFAULT_STATISTIC_ENTRIES_PER_PAGE
    ): array {
        $linkProperties = [];
        /** @var \TYPO3\CMS\Core\Database\Query\QueryBuilder $queryBuilder */
        $queryBuilder = $this->dmailConnection->createQueryBuilder();

        $rowCount = $queryBuilder
            ->count('*')
            ->from('sys_dmail')
            ->andWhere(
                $queryBuilder->expr()->eq('pid', $queryBuilder->createNamedParameter($pageId, \PDO::PARAM_INT)),
                $queryBuilder->expr()->eq('issent', $queryBuilder->expr()->literal(1, Type::INTEGER)),
                $queryBuilder->expr()->in('type', [0, 1])
            )
            ->execute()
            ->fetchColumn(0);

        $nextPage = $page + 1;

        if ($rowCount > $nextPage * $pageSize) {
            $linkProperties = [
                'pageId' => $pageId,
                'nextPage' => $nextPage,
                'pageSize' => $pageSize,
            ];
        }

        return $linkProperties;
    }

    /**
     * Extend a sys_dmail record by the fields "sentStatus", "sentMessageCount" and "detailLink" for a proper display
     * in the statistics list. This method also sets date-related fields "scheduled_begin" and "scheduled_end" to null
     * in order to achieve an empty output at the template.
     *
     * @param array $record The sys_dmail record to be extended and fixed by some fields
     * @return array The entry with additional fields and date-related fixed ones
     */
    protected function addMissingFields(array $record): array
    {
        if (empty($record['scheduled_begin'])) {
            $sentStatus = 'queuing';
        } elseif (empty($record['scheduled_end'])) {
            $sentStatus = 'sending';
        } else {
            $sentStatus = 'sent';
        }

        $record['scheduled_begin'] = $record['scheduled_begin'] ?: null;
        $record['scheduled_end'] = $record['scheduled_end'] ?: null;

        $record['sentStatus'] = $sentStatus;

        /** @var \TYPO3\CMS\Core\Database\Query\QueryBuilder $queryBuilder */
        $queryBuilder = $this->mailLogConnection->createQueryBuilder();

        $record['sentMessageCount'] = $queryBuilder
            ->count('*')
            ->from('sys_dmail_maillog')
            ->andWhere(
                $queryBuilder->expr()->eq('mid', $queryBuilder->createNamedParameter($record['uid'], \PDO::PARAM_INT)),
                $queryBuilder->expr()->eq('response_type', $queryBuilder->expr()->literal(0, Type::INTEGER)),
                $queryBuilder->expr()->gt('html_sent', $queryBuilder->expr()->literal(0, Type::INTEGER))
            )
            ->execute()
            ->fetchColumn(0);

        // @todo Try to build the link using the second argument of BackendUtility::getModuleUrl()
        $record['detailLink'] = BackendUtility::getModuleUrl('DirectMailNavFrame_Statistics')
                . '&id=' . $record['pid'] . '&sys_dmail_uid=' . $record['uid'] . '&SET[dmail_mode]=direct&CMD=stats';

        return $record;
    }
}
