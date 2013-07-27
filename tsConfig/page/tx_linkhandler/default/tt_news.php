<?php

if (!defined ('TYPO3_MODE'))
{
  die ('Access denied.');
}

  // Should tt_news included?
$removeIt = $confArr['linkhandler.']['tt_news'];

  // Should tt_news removed
switch( $removeIt ) 
{
  case( 'Yes' ):
    // follow the workflow
    break;
  case( 'No (recommended)' ):
  default:
    return;
    break;
}
  // RETURN : tt_news should not include


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
