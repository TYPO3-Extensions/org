<?php

if (!defined('TYPO3_MODE'))
{
  die('Access denied.');
}

// Set TYPO3 version
require_once( PATH_typo3conf . 'ext/org/ext_tables/t3version.php' );
// Configuration by the extension manager
require_once( PATH_typo3conf . 'ext/org/ext_tables/extensionManager/basic.php' );
require_once( PATH_typo3conf . 'ext/org/ext_tables/extensionManager/disableTables.php' );
require_once( PATH_typo3conf . 'ext/org/ext_tables/extensionManager/downgrade.php' );
require_once( PATH_typo3conf . 'ext/org/ext_tables/extensionManager/geocoding.php' );
require_once( PATH_typo3conf . 'ext/org/ext_tables/extensionManager/simplifyer.php' );
// Enables the Include Static Templates
require_once( PATH_typo3conf . 'ext/org/ext_tables/includeStaticTemplates.php' );
// Add pagetree icons
require_once( PATH_typo3conf . 'ext/org/ext_tables/pageTreeIcons.php' );
// Add default page and user TSconfig
require_once( PATH_typo3conf . 'ext/org/ext_tables/tsConfig.php' );
// Methods for backend workflows
require_once( PATH_typo3conf . 'ext/org/ext_tables/backendWorkflows.php' );
// TCA tables
require_once( PATH_typo3conf . 'ext/org/ext_tables/tca.php' );
?>