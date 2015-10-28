<?php

if (!defined('TYPO3_MODE'))
{
  die('Access denied.');
}

$arrOrgTables = array(
  'tx_org_cal',
  'tx_org_downloads',
  'tx_org_event',
  'tx_org_headquarters',
  'tx_org_job',
  'tx_org_location',
  'tx_org_news',
  'tx_org_staff',
  'tx_org_tax'
);

$confArr = unserialize($GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf']['org']);

/* Remove all fields in context with embedded code  */

function remove_fields_embeddedcode($confArr, $showitem)
{
  if ($confArr['downgrade.']['enable.']['embeddedcode'])
  {
    return $showitem;
  }
  $showitem = str_replace('_embeddedcode,', '_tmp1234,', $showitem);
  $showitem = str_replace('embeddedcode,', null, $showitem);
  $showitem = str_replace('_tmp1234,', '_embeddedcode,', $showitem);
  //$showitem = str_replace('_ ', '_embeddedcode, ', null, $showitem);
  return $showitem;
}

/* Remove all fields in context with images for printing  */

function remove_fields_print($confArr, $showitem)
{
  if ($confArr['downgrade.']['enable.']['print'])
  {
    return $showitem;
  }
  $showitem = str_replace('print,', null, $showitem);
  $showitem = str_replace('printcaption,', null, $showitem);
  $showitem = str_replace('printseo,', null, $showitem);
  return $showitem;
}

/* Remove all fields in context with public transport  */

function remove_fields_pubtrans($confArr, $showitem)
{
  if ($confArr['downgrade.']['enable.']['pubtrans'])
  {
    return $showitem;
  }
  $showitem = str_replace('pubtrans_embeddedcode,', null, $showitem);
  $showitem = str_replace('pubtrans_stop;;;richtext[]:rte_transform[mode=ts],', null, $showitem);
  $showitem = str_replace('pubtrans_url,', null, $showitem);
  $showitem = str_replace('citymap_url,', null, $showitem);
  $showitem = str_replace('citymap_embeddedcode,', null, $showitem);
  return $showitem;
}
// #62019, 141003, dwildt, -
///* Replace tx_org_staff with fe_users */
//
//function replace_table_tx_org_staff($confArr, $showitem, $orgTable)
//{
//  $arrOrgTablesWiFeUsers = array(
//    'tx_org_downloads',
//    'tx_org_news'
//  );
//
//  if( ! in_array($orgTable, $arrOrgTablesWiFeUsers ) )
//  {
//    return $showitem;
//  }
//  if (!$confArr['downgrade.']['enable.']['fe_users'])
//  {
//    return $showitem;
//  }
//  $showitem = str_replace('div_staff', 'div_feuser', $showitem);
//  $showitem = str_replace('tx_org_staff', 'fe_user', $showitem);
//  return $showitem;
//}

/* LOOP all Organiser tables */
foreach ($arrOrgTables as $orgTable)
{
  // LOOP all palettes of the current table
  $palettes = array_keys($TCA[$orgTable]['palettes']);
  foreach ($palettes as $palette)
  {
    $showitem = $TCA[$orgTable]['palettes'][$palette]['showitem'];
    $showitem = remove_fields_embeddedcode($confArr, $showitem);
    $showitem = remove_fields_print($confArr, $showitem);
    $showitem = remove_fields_pubtrans($confArr, $showitem);
    // #62019, 141003, dwildt, 1-
    //$showitem = replace_table_tx_org_staff($confArr, $showitem, $orgTable);
    $TCA[$orgTable]['palettes'][$palette]['showitem'] = $showitem;
  } // LOOP all palettes of the current table
  // LOOP all types of the current table
  $types = array_keys($TCA[$orgTable]['types']);
  foreach ($types as $type)
  {
    $showitem = $TCA[$orgTable]['types'][$type]['showitem'];
    $showitem = remove_fields_embeddedcode($confArr, $showitem);
    $showitem = remove_fields_print($confArr, $showitem);
    $showitem = remove_fields_pubtrans($confArr, $showitem);
    // #62019, 141003, dwildt, 1-
    //$showitem = replace_table_tx_org_staff($confArr, $showitem, $orgTable);
    $TCA[$orgTable]['types'][$type]['showitem'] = $showitem;
  } // LOOP all types of the current table
} //LOOP all Organiser tables