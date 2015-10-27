<?php

if (!defined('TYPO3_MODE'))
{
  die('Access denied.');
}

// Set TYPO3 version
require_once( PATH_typo3conf . 'ext/org/Configuration/ExtTables/t3version.php' );
// Configuration by the extension manager
require_once( PATH_typo3conf . 'ext/org/Configuration/ExtensionManager/basic.php' );
require_once( PATH_typo3conf . 'ext/org/Configuration/ExtensionManager/disableTables.php' );
require_once( PATH_typo3conf . 'ext/org/Configuration/ExtensionManager/downgrade.php' );
require_once( PATH_typo3conf . 'ext/org/Configuration/ExtensionManager/geocoding.php' );
require_once( PATH_typo3conf . 'ext/org/Configuration/ExtensionManager/simplifyer.php' );
// Enables the Include Static Templates
require_once( PATH_typo3conf . 'ext/org/Configuration/ExtTables/includeStaticTemplates.php' );
// Add pagetree icons
require_once( PATH_typo3conf . 'ext/org/Configuration/ExtTables/pageTreeIcons.php' );
// Add default page and user TSconfig
require_once( PATH_typo3conf . 'ext/org/Configuration/ExtTables/tsConfig.php' );
// Methods for backend workflows
require_once( PATH_typo3conf . 'ext/org/Configuration/ExtTables/backendWorkflows.php' );