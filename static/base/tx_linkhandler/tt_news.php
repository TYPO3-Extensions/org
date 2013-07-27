<?php

if (!defined ('TYPO3_MODE'))
{
  die ('Access denied.');
}

  // Should tt_news included?
$includeIt = $confArr['linkhandler.']['tt_news'];

  // RETURN : tt_news should not include
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
  // RETURN : tt_news should not include


  // Init tsConfig
$typoscript = '
plugin.tx_linkhandler {
  tt_news >
}
';
t3lib_extMgm::addTypoScriptSetup( $typoscript ); 

return;

?>
