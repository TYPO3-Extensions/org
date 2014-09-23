<?php

if (!defined('TYPO3_MODE'))
{
  die('Access denied.');
}



/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//
// INDEX
//    Store record configuration
//
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//

$confArr = unserialize($GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf']['org']);

// Simplify the Organiser
$bool_exclude_none = true;
$bool_exclude_default = true;
switch ($confArr['simplifyer.']['organiser'])
{
  case('None excluded: Editor has access to all'):
    $bool_exclude_none = false;
    $bool_exclude_default = false;
    break;
  case('All excluded: Administrator configures it'):
    // All will be left true.
    break;
  case('Default (recommended)'):
    $bool_exclude_default = false;
  default:
}
// Simplify the Organiser
// Simplify backend forms
$bool_fegroup_control = true;
if (strtolower(substr($confArr['simplifyer.']['fegroup_control'], 0, strlen('no'))) == 'no')
{
  $bool_fegroup_control = false;
}
$bool_time_control = true;
if (strtolower(substr($confArr['simplifyer.']['time_control'], 0, strlen('no'))) == 'no')
{
  $bool_time_control = false;
}
$bool_topnews_sorting = false;
if (strtolower(substr($confArr['simplifyer.']['topnews_sorting'], 0, strlen('no'))) == 'no')
{
  $bool_topnews_sorting = true;
}
// Simplify backend forms
// Relation fe_users to company
switch ($confArr['simplifyer.']['fe_user_company'])
{
  case('Big'):
    $bool_exclude_fe_user_company = true;
    $bool_exclude_fe_user_tx_org_company = true;
    $bool_exclude_tx_org_company = false;
    $bool_exclude_tx_org_company_fe_users = true;
    break;
  case('Small (recommended)'):
  default :
    $bool_exclude_fe_user_company = true;
    $bool_exclude_fe_user_tx_org_company = false;
    $bool_exclude_tx_org_company = false;
    $bool_exclude_tx_org_company_fe_users = false;
  default:
}
// Relation fe_users to company
// Full wizard support
$bool_full_wizardSupport_catTables = true;
if (strtolower(substr($confArr['simplifyer.']['full_wizardSupport'], 0, strlen('no'))) == 'no')
{
  $bool_full_wizardSupport_catTables = false;
}
// Full wizard support
// Store record configuration
switch ($confArr['simplifyer.']['store_records'])
{
  case('Easy 1: all in the same directory'):                            // organiser < v3.x
  case('Current folder'):
    $str_store_record_conf = 'pid=###CURRENT_PID###';
    $str_marker_pid = '###CURRENT_PID###';
    $bool_full_wizardSupport_allTables = true;
    break;
  case('Easy 2: same as 1 but with storage pid'):                       // organiser < v3.x
  case('Folder with a storage pid'):
    $str_store_record_conf = 'pid=###STORAGE_PID###';
    $str_marker_pid = '###STORAGE_PID###';
    $bool_full_wizardSupport_allTables = true;
  case('Clear presented: each record group in one directory at most'):  // organiser < v3.x
  case('Folder group'):
    $str_store_record_conf = 'pid IN (###PAGE_TSCONFIG_ID###)';
    $bool_full_wizardSupport_allTables = true;
    break;
  case('Multi grouped: record groups in different directories'):        // organiser < v3.x
  case('Folder multigroup'):
    $str_store_record_conf = 'pid IN (###PAGE_TSCONFIG_IDLIST###)';
    $bool_full_wizardSupport_allTables = false;
    break;
  case('Everywhere (recommended)'):
  default:
    // #50445, 130725, dwildt, +
    // dummy for a proper sql query
    $str_store_record_conf = 'uid > 0';
    $str_marker_pid = null;
    $bool_full_wizardSupport_allTables = true;
}
// Store record configuration

?>