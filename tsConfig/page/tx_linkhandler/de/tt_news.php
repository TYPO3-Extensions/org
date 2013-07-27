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
  case( 'Yes' ):
    // follow the workflow
    break;
  case( 'No (recommended)' ):
  default:
    return;
    break;
}
  // RETURN : tx_org_cal should not include


  // Init tsConfig
$tsConfig = '

mod.tx_linkhandler {
     // remove tt_news
  tt_news >
}

RTE.default.tx_linkhandler.tt_news >
';

t3lib_extMgm::addPageTSConfig( $tsConfig );

return;

?>
