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
$typoscript = '
plugin.tx_linkhandler {
  fe_users {
    forceLink        = 0
    useCacheHash     = 1
    parameter        = {$plugin.org.pages.staff}
    additionalParams = &tx_browser_pi1[staffUid]={field:uid}
    additionalParams {
      insertData = 1
    } 
  }
}
';
t3lib_extMgm::addTypoScriptSetup( $typoscript ); 

return;

?>
