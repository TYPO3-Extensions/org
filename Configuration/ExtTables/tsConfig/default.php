<?php
if (!defined ('TYPO3_MODE'))
{
  die ('Access denied.');
}

$path = PATH_typo3conf . 'ext/org/Configuration/TsConfig/Page/TxLinkhandler/Default/';

  // Calendar
require_once( $path . 'tx_org_cal.php' );
  // Companies
require_once( $path . 'tx_org_headquarters.php' );
  // Documents
require_once( $path . 'tx_org_downloads.php' );
  // Events
require_once( $path . 'tx_org_event.php' );
  // Jobs
require_once( $path . 'tx_org_job.php' );
  // Locations
require_once( $path . 'tx_org_location.php' );
  // News
require_once( $path . 'tx_org_news.php' );
  // Services
require_once( $path . 'tx_org_service.php' );
  // People
require_once( $path . 'tx_org_staff.php' );

?>