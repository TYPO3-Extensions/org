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
$typoscript = '
plugin.tx_linkhandler {
  tx_org_news {
    forceLink        = 0
    useCacheHash     = 1
    parameter        = {$plugin.org.pages.news}
    additionalParams = &tx_browser_pi1[newsUid]={field:uid}
    additionalParams {
      insertData = 1
    } 
  }
}
';
t3lib_extMgm::addTypoScriptSetup( $typoscript ); 

return;

?>
