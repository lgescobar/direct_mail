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

/**
 * Statistics Utility of direct_mail extension. It acts in practice as a repository.
 */
class MailerEngineUtility extends StatisticsUtility
{
    /**
     * Gets all sys_dmail records for the selected page (folder) according to the given pagination parameters to
     * avoid displaying too many records or overloading the server.
     *
     * @param int $pageId The page (folder) containing the sys_dmail records
     * @param int $page The current page based on the given page size
     * @param int $pageSize The page size to be used for the pagination
     * @return array The sys_dmail records for the asked page (pagination is meant)
     */
    public function getPaginatedSentNewsletter(
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
                $queryBuilder->expr()->gt('scheduled', $queryBuilder->expr()->literal(0, Type::INTEGER))
            )
            ->orderBy('scheduled', 'DESC')
            ->setMaxResults($pageSize)
            ->setFirstResult($page * $pageSize)
            ->execute()
            ->fetchAll(\PDO::FETCH_ASSOC);

        return array_map([$this, 'addMissingFields'], $statistics);
    }

    /**
     * Brings an additional field "deleteLink" (when applicable) to delete mails before they get sent.
     *
     * @param array $record The sys_dmail record to be extended and fixed by some fields
     * @return array The entry with additional fields and date-related fixed ones
     *
     * @see \DirectMailTeam\DirectMail\Utility\StatisticsUtility::addMissingFields()
     */
    protected function addMissingFields(array $record): array
    {
        $record = parent::addMissingFields($record);

        if (!$record['scheduled_begin']) {
            // @todo Try to build the link using the second argument of BackendUtility::getModuleUrl()
            $record['deleteLink'] = BackendUtility::getModuleUrl('DirectMailNavFrame_MailerEngine')
                . '&id=' . $record['pid'] . '&cmd=delete&uid=' . $record['uid'];
        }

        return $record;
    }
}
