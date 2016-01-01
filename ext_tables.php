<?php

if (!defined('TYPO3_MODE'))
{
  die('Access denied.');
}

// Methods for backend workflows
require_once(t3lib_extMgm::extPath( $_EXTKEY ) . 'lib/userfunc/class.tx_org_userfunc.php' );
// Set TYPO3 version
require_once( PATH_typo3conf . 'ext/org/Configuration/ExtTables/t3version.php' );
// Configuration by the extension manager
require_once( PATH_typo3conf . 'ext/org/Configuration/ExtensionManager/basic.php' );
require_once( PATH_typo3conf . 'ext/org/Configuration/ExtensionManager/disableTables.php' );
require_once( PATH_typo3conf . 'ext/org/Configuration/ExtensionManager/downgrade.php' );
require_once( PATH_typo3conf . 'ext/org/Configuration/ExtensionManager/hideTables.php' );
//require_once( PATH_typo3conf . 'ext/org/Configuration/ExtensionManager/geocoding.php' );
//require_once( PATH_typo3conf . 'ext/org/Configuration/ExtensionManager/simplifyer.php' );
// Enables the Include Static Templates
require_once( PATH_typo3conf . 'ext/org/Configuration/ExtTables/includeStaticTemplates.php' );
// Add pagetree icons
require_once( PATH_typo3conf . 'ext/org/Configuration/ExtTables/pageTreeIcons.php' );

/**
 * page and user TSconfig
 *
 */
require_once( PATH_typo3conf . 'ext/org/Configuration/ExtTables/tsConfig.php' );

/**
 * Methods for backend workflows
 *
 */
require_once( PATH_typo3conf . 'ext/org/Configuration/ExtTables/backendWorkflows.php' );
