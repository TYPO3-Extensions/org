<?php

if (!defined ('TYPO3_MODE'))
{
  die ('Access denied.');
}

  // Should tx_org_cal included?
$includeIt = $confArr['linkhandler.']['tx_org_cal'];

  // RETURN : tx_org_cal should not include
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
  // RETURN : tx_org_cal should not include


  // Init tsConfig
$tsConfig = '

mod.dwildt.test = 1
mod.tx_linkhandler {
  tx_org_cal {
    label       = Org: Kalender
    listTables  = tx_org_cal
    %onlyPids%
  }
}

RTE.default.tx_linkhandler.tx_org_cal < mod.tx_linkhandler.tx_org_cal
';

$onlyPids = $confArr['linkhandler.']['tx_org_cal.']['onlyPids'];

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
