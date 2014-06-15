<?php

if (!defined('TYPO3_MODE'))
{
  die('Access denied.');
}

// Configuration by the extension manager
require_once( PATH_typo3conf . 'ext/org/tca/extensionManager/simplifyer.php' );
// Default values and wizards
require_once( PATH_typo3conf . 'ext/org/tca/defaultValues.php' );
// TCA for tables
require_once( PATH_typo3conf . 'ext/org/tca/tx_org_cal.php' );
require_once( PATH_typo3conf . 'ext/org/tca/tx_org_department.php' );
require_once( PATH_typo3conf . 'ext/org/tca/tx_org_downloads.php' );
require_once( PATH_typo3conf . 'ext/org/tca/tx_org_event.php' );
require_once( PATH_typo3conf . 'ext/org/tca/tx_org_headquarters.php' );
require_once( PATH_typo3conf . 'ext/org/tca/tx_org_job.php' );
require_once( PATH_typo3conf . 'ext/org/tca/tx_org_location.php' );
require_once( PATH_typo3conf . 'ext/org/tca/tx_org_news.php' );
require_once( PATH_typo3conf . 'ext/org/tca/tx_org_service.php' );
require_once( PATH_typo3conf . 'ext/org/tca/tx_org_staff.php' );
require_once( PATH_typo3conf . 'ext/org/tca/tx_org_tax.php' );
// Consolidate
require_once( PATH_typo3conf . 'ext/org/tca/consolidate/downgrade.php' );
require_once( PATH_typo3conf . 'ext/org/tca/consolidate/hideTables.php' );

?>