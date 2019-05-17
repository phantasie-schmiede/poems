<?php
if (!defined('TYPO3_MODE')) {
    die('Access denied.');
}

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
    $_EXTKEY,
    'Poems',
    'PS | Poems'
);

// add typoscript
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile($_EXTKEY, 'Configuration/TypoScript', 'PS | Poems');

// adding table meta information
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_pspoems_domain_model_poem',
    'EXT:ps_poems/Resources/Private/Language/locallang_csh_tx_pspoems_domain_model_poem.xml');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_pspoems_domain_model_poem');

// adding table meta information
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_pspoems_domain_model_author',
    'EXT:ps_poems/Resources/Private/Language/locallang_csh_tx_pspoems_domain_model_author.xml');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_pspoems_domain_model_author');

// adding table meta information
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_pspoems_domain_model_category',
    'EXT:ps_poems/Resources/Private/Language/locallang_csh_tx_pspoems_domain_model_category.xml');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_pspoems_domain_model_category');

// adding table meta information
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_pspoems_domain_model_language',
    'EXT:ps_poems/Resources/Private/Language/locallang_csh_tx_pspoems_domain_model_language.xml');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_pspoems_domain_model_language');