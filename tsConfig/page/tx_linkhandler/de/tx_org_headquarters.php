<?php

if (!defined ('TYPO3_MODE'))
{
  die ('Access denied.');
}

  // Should tx_org_headquarters included?
$includeIt = $confArr['linkhandler.']['tx_org_headquarters'];

  // RETURN : tx_org_headquarters should not include
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
  // RETURN : tx_org_headquarters should not include


  // Init tsConfig
$tsConfig = '

mod.dwildt.test = 1
mod.tx_linkhandler {
  tx_org_headquarters {
    label       = Standorte & Abteilungen (org)
    listTables  = tx_org_headquarters,tx_org_department
    %onlyPids%
  }
}

RTE.default.tx_linkhandler.tx_org_headquarters < mod.tx_linkhandler.tx_org_headquarters
';

$onlyPids = $confArr['linkhandler.']['tx_org_headquarters.']['onlyPids'];

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
