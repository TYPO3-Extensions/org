<?php

if (!defined ('TYPO3_MODE'))
{
  die ('Access denied.');
}

  // Should tx_org_department included?
$includeIt = $confArr['linkhandler.']['tx_org_headquarters'];

  // RETURN : tx_org_department should not include
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
  // RETURN : tx_org_department should not include


  // Init tsConfig
$typoscript = '
plugin.tx_linkhandler {
  tx_org_department {
    forceLink        = 0
    useCacheHash     = 1
    parameter        = {$plugin.org.pages.department}
    additionalParams = &tx_browser_pi1[departmentUid]={field:uid}
    additionalParams {
      insertData = 1
    } 
  }
}
';
t3lib_extMgm::addTypoScriptSetup( $typoscript ); 

return;

?>
