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
  case( 'No' ):
    return;
  case( 'Yes (recommended)' ):
  default:
    // follow the workflow
    break;
}
  // RETURN : tx_org_cal should not include


  // Init tsConfig
$typoscript = '
plugin.tx_linkhandler {
  tx_org_cal {
    forceLink        = 0
    useCacheHash     = 1
    parameter        = {$plugin.org.pages.calendar}
    additionalParams = &tx_browser_pi1[calendarUid]={field:uid}
    additionalParams {
      insertData = 1
    }
  }
}
';
t3lib_extMgm::addTypoScriptSetup( $typoscript );

return;
