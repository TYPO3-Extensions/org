<?php

if (!defined ('TYPO3_MODE'))
{
  die ('Access denied.');
}

  // Should tx_org_service included?
$includeIt = $confArr['linkhandler.']['tx_org_service'];

  // RETURN : tx_org_service should not include
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
  // RETURN : tx_org_service should not include


  // Init tsConfig
$typoscript = '
plugin.tx_linkhandler {
  tx_org_service {
    forceLink        = 0
    useCacheHash     = 1
    parameter        = {$plugin.org.pages.service}
    additionalParams = &tx_browser_pi1[serviceUid]={field:uid}
    additionalParams {
      insertData = 1
    }
  }
}
';
t3lib_extMgm::addTypoScriptSetup( $typoscript );

return;

?>
