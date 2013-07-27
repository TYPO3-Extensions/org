<?php
if (!defined ('TYPO3_MODE'))
{
  die ('Access denied.');
}

$path = PATH_typo3conf . 'ext/org/static/base/tx_linkhandler/';

require_once( $path . 'fe_users.php' );
require_once( $path . 'tt_news' );
require_once( $path . 'tx_org_cal.php' );
require_once( $path . 'tx_org_department.php' );
require_once( $path . 'tx_org_downloads.php' );
require_once( $path . 'tx_org_event.php' );
require_once( $path . 'tx_org_headquarters.php' );
require_once( $path . 'tx_org_location.php' );
require_once( $path . 'tx_org_news.php' );

?>