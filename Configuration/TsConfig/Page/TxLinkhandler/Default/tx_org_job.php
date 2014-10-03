<?php

if (!defined ('TYPO3_MODE'))
{
  die ('Access denied.');
}

  // Should tx_org_job included?
$includeIt = $confArr['linkhandler.']['tx_org_job'];

  // RETURN : tx_org_job should not include
switch( $includeIt )
{
  case( 'No' ):
    return;
    break;
  case( 'Yes (recommended)' ):
  default:
    // follow the workflow
    break;
}
  // RETURN : tx_org_job should not include


  // Init tsConfig
$tsConfig = '

mod.tx_linkhandler {
  tx_org_job {
    label       = Jobs (org)
    listTables  = tx_org_job
    %onlyPids%
  }
}

RTE.default.tx_linkhandler.tx_org_job < mod.tx_linkhandler.tx_org_job
';

$onlyPids = $confArr['linkhandler.']['tx_org_job.']['onlyPids'];

switch( true )
{
  case( ! empty ( $onlyPids ) ):
    $onlyPids = 'onlyPids    = ' . $onlyPids;
    break;
  case( empty ( $onlyPids ) ):
  default;
    $onlyPids = null;
    break;
}

$tsConfig = str_replace( '%onlyPids%', $onlyPids, $tsConfig );
t3lib_extMgm::addPageTSConfig( $tsConfig );

return;

?>
