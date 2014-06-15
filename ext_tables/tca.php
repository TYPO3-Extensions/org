<?php

if (!defined('TYPO3_MODE'))
{
  die('Access denied.');
}

require_once( PATH_typo3conf . 'ext/org/ext_tables/tca/fe_users.php' );
require_once( PATH_typo3conf . 'ext/org/ext_tables/tca/fe_groups.php' );
// The sorting of the tables in the backend list view depends on the sorting of the lines below.
require_once( PATH_typo3conf . 'ext/org/ext_tables/tca/tx_org_news.php' );
require_once( PATH_typo3conf . 'ext/org/ext_tables/tca/tx_org_cal.php' );
require_once( PATH_typo3conf . 'ext/org/ext_tables/tca/tx_org_tax.php' );
require_once( PATH_typo3conf . 'ext/org/ext_tables/tca/tx_org_event.php' );
require_once( PATH_typo3conf . 'ext/org/ext_tables/tca/tx_org_location.php' );
require_once( PATH_typo3conf . 'ext/org/ext_tables/tca/tx_org_headquarters.php' );
require_once( PATH_typo3conf . 'ext/org/ext_tables/tca/tx_org_staff.php' );
require_once( PATH_typo3conf . 'ext/org/ext_tables/tca/tx_org_service.php' );
require_once( PATH_typo3conf . 'ext/org/ext_tables/tca/tx_org_job.php' );
require_once( PATH_typo3conf . 'ext/org/ext_tables/tca/tx_org_doc.php' );

?>