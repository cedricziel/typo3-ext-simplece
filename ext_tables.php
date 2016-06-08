<?php

if (!defined('TYPO3_MODE')) {
    die('Access denied.');
}

// Add TypoScript for extension
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile(
    $_EXTKEY,
    'Configuration/TypoScript',
    'Simple CE TypoScript'
);

// Register PageTS for 'simplece_doubletext' content element
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::registerPageTSConfigFile(
    $_EXTKEY,
    'Configuration/PageTS/ce_doubletext.tsconfig',
    'Simple CE: DoubleText'
);
