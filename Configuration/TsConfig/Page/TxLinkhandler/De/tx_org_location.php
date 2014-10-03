<?php

if (!defined ('TYPO3_MODE'))
{
  die ('Access denied.');
}

  // Should tx_org_location included?
$includeIt = $confArr['linkhandler.']['tx_org_location'];

  // RETURN : tx_org_location should not include
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
  // RETURN : tx_org_location should not include


  // Init tsConfig
$tsConfig = '

mod.tx_linkhandler {
  tx_org_location {
    label       = Veranstaltungsort (org)
    listTables  = tx_org_location
    %onlyPids%
  }
}

RTE.default.tx_linkhandler.tx_org_location < mod.tx_linkhandler.tx_org_location
';

$onlyPids = $confArr['linkhandler.']['tx_org_location.']['onlyPids'];

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
