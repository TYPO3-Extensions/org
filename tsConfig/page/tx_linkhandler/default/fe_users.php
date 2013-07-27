<?php

if (!defined ('TYPO3_MODE'))
{
  die ('Access denied.');
}

  // Should fe_users included?
$includeIt = $confArr['linkhandler.']['fe_users'];

  // RETURN : fe_users should not include
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
  // RETURN : fe_users should not include


  // Init tsConfig
$tsConfig = '

mod.tx_linkhandler {
  fe_users {
    label       = Staff (org)
    listTables  = fe_users
    %onlyPids%
  }
}

RTE.default.tx_linkhandler.fe_users < mod.tx_linkhandler.fe_users
';

$onlyPids = $confArr['linkhandler.']['fe_users.']['onlyPids'];

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
