<?php
if (!defined ('TYPO3_MODE'))
{
  die ('Access denied.');
}

$path = PATH_typo3conf . 'ext/org//tsConfig/page/tx_linkhandler/en/';

  // ./. tt_news
require_once( $path . 'tt_news.php' );
  // Calendar
require_once( $path . 'tx_org_cal.php' );
  // Documents
require_once( $path . 'tx_org_downloads.php' );
  // Events
require_once( $path . 'tx_org_event.php' );
  // Headquarters & Departments
require_once( $path . 'tx_org_headquarters.php' );
  // Locations
require_once( $path . 'tx_org_location.php' );
  // News
require_once( $path . 'tx_org_news.php' );
  // Staff
require_once( $path . 'fe_users.php' );

?>