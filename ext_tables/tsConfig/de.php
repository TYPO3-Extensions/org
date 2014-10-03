<?php
if (!defined ('TYPO3_MODE'))
{
  die ('Access denied.');
}

$path = PATH_typo3conf . 'ext/org/tsConfig/page/tx_linkhandler/de/';

  // Dienstleistungen
require_once( $path . 'tx_org_service.php' );
  // Dokumente
require_once( $path . 'tx_org_downloads.php' );
  // Firmen
require_once( $path . 'tx_org_headquarters.php' );
  // Kalender
require_once( $path . 'tx_org_cal.php' );
  // Nachrichten
require_once( $path . 'tx_org_news.php' );
  // Personen
require_once( $path . 'tx_org_staff.php' );
  // Stellenangebote
require_once( $path . 'tx_org_job.php' );
  // Veranstaltungen
require_once( $path . 'tx_org_event.php' );
  // Veranstaltungsorte
require_once( $path . 'tx_org_location.php' );

?>