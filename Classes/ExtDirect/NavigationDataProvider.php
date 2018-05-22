<?php
namespace DirectMailTeam\DirectMail\ExtDirect;

use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Frontend\Page\PageRepository;

/**
 * ExtDirect component to serve the calls coming from the DirectMail navigation menu.
 */
class NavigationDataProvider
{
    /**
     * Returns the folders containing newsletters.
     *
     * @return array
     */
    public function getNewsletterFolders()
    {
        /** @var \TYPO3\CMS\Frontend\Page\PageRepository $pageRepository */
        $pageRepository = GeneralUtility::makeInstance(PageRepository::class);

        $folders = $pageRepository->getRecordsByField(
            'pages',
            'doktype',
            (string)PageRepository::DOKTYPE_SYSFOLDER,
            'module = \'dmail\'',
            '',
            'title'
        );

        if (is_null($folders)) {
            $folders = [];
        }

        return $folders;
    }
}
