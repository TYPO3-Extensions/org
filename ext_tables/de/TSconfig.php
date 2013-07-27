<?php
if (!defined ('TYPO3_MODE'))
{
  die ('Access denied.');
}

$path = PATH_typo3conf . 'ext/org//tsConfig/page/tx_linkhandler/de/';

  // ./. tt_news
require_once( $path . 'tt_news.php' );
  // Dokumente
require_once( $path . 'tx_org_downloads.php' );
  // Kalender
require_once( $path . 'tx_org_cal.php' );
  // Nachrichten
require_once( $path . 'tx_org_news.php' );
  // Personal
require_once( $path . 'fe_users.php' );
  // Standorte und Abteilungen
require_once( $path . 'tx_org_headquarters.php' );
  // Veranstaltungen
require_once( $path . 'tx_org_event.php' );
  // Veranstaltungsorte
require_once( $path . 'tx_org_location.php' );

?>