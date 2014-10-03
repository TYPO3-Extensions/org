<?php

if (!defined('TYPO3_MODE'))
{
  die('Access denied.');
}

// Set TYPO3 version
require_once( PATH_typo3conf . 'ext/org/Configuration/ExtTables/t3version.php' );
// Configuration by the extension manager
require_once( PATH_typo3conf . 'ext/org/Configuration/ExtTables/extensionManager/basic.php' );
require_once( PATH_typo3conf . 'ext/org/Configuration/ExtTables/extensionManager/disableTables.php' );
require_once( PATH_typo3conf . 'ext/org/Configuration/ExtTables/extensionManager/downgrade.php' );
require_once( PATH_typo3conf . 'ext/org/Configuration/ExtTables/extensionManager/geocoding.php' );
require_once( PATH_typo3conf . 'ext/org/Configuration/ExtTables/extensionManager/simplifyer.php' );
// Enables the Include Static Templates
require_once( PATH_typo3conf . 'ext/org/Configuration/ExtTables/includeStaticTemplates.php' );
// Add pagetree icons
require_once( PATH_typo3conf . 'ext/org/Configuration/ExtTables/pageTreeIcons.php' );
// Add default page and user TSconfig
require_once( PATH_typo3conf . 'ext/org/Configuration/ExtTables/tsConfig.php' );
// Methods for backend workflows
require_once( PATH_typo3conf . 'ext/org/Configuration/ExtTables/backendWorkflows.php' );
// TCA tables
require_once( PATH_typo3conf . 'ext/org/Configuration/ExtTables/tca.php' );
?>