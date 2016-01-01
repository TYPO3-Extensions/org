<?php

if (!defined('TYPO3_MODE'))
{
  die('Access denied.');
}

  // Init tsConfig
$tsConfig = '
tx_powermail {
  flexForm {
    type {
      addFieldOptions {
        #tx_org_jobsector = Organiser: Job Sector
        tx_org_jobsector = LLL:EXT:org/Resources/Private/Language/tx_org_job.xml:tsconf.tx_powermail.tx_org_jobsector
        tx_org_jobsector {
          // 0:string, 1:array, 2:date, 3:file
          dataType = 1
        }
      }
    }
  }
}
';

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig( $tsConfig );

return;
