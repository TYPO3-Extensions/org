<?php

if (!defined ('TYPO3_MODE'))
{
  die ('Access denied.');
}

  // Should tx_org_news included?
$includeIt = $confArr['linkhandler.']['tx_org_news'];

  // RETURN : tx_org_news should not include
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
  // RETURN : tx_org_news should not include


  // Init tsConfig
$tsConfig = '

mod.tx_linkhandler {
  tx_org_news {
    label       = News (org)
    listTables  = tx_org_news
    %onlyPids%
  }
}

RTE.default.tx_linkhandler.tx_org_news < mod.tx_linkhandler.tx_org_news
';

$onlyPids = $confArr['linkhandler.']['tx_org_news.']['onlyPids'];

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
