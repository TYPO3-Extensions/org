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
  'tx_org_service',
  'tx_org_staff',
  'tx_org_tax'
);

$confArr = unserialize($GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf']['org']);

/* Remove tx_org_cal */

function remove_tx_org_cal($confArr, $showitem)
{
  if (!$confArr['hide.']['tables.']['tx_org_cal'])
  {
    return $showitem;
  }
  $showitem = str_replace('tx_org_cal,', null, $showitem);
  return $showitem;
}

/* Remove tx_org_downloads */

function remove_tx_org_downloads($confArr, $showitem)
{
  if (!$confArr['hide.']['tables.']['tx_org_downloads'])
  {
    return $showitem;
  }
  $showitem = str_replace('tx_org_downloads,', null, $showitem);
  return $showitem;
}

/* Remove tx_org_event */

function remove_tx_org_event($confArr, $showitem)
{
  if (!$confArr['hide.']['tables.']['tx_org_event'])
  {
    return $showitem;
  }
  $showitem = str_replace('tx_org_event,', null, $showitem);
  return $showitem;
}

/* Remove tx_org_headquarters */

function remove_tx_org_headquarters($confArr, $showitem)
{
  if (!$confArr['hide.']['tables.']['tx_org_headquarters'])
  {
    return $showitem;
  }
  $showitem = str_replace('tx_org_headquarters,', null, $showitem);
  return $showitem;
}

/* Remove tx_org_job */

function remove_tx_org_job($confArr, $showitem)
{
  if (!$confArr['hide.']['tables.']['tx_org_job'])
  {
    return $showitem;
  }
  $showitem = str_replace('tx_org_job,', null, $showitem);
  return $showitem;
}

/* Remove tx_org_location */

function remove_tx_org_location($confArr, $showitem)
{
  if (!$confArr['hide.']['tables.']['tx_org_location'])
  {
    return $showitem;
  }
  $showitem = str_replace('tx_org_location,', null, $showitem);
  return $showitem;
}

/* Remove tx_org_news */

function remove_tx_org_news($confArr, $showitem)
{
  if (!$confArr['hide.']['tables.']['tx_org_news'])
  {
    return $showitem;
  }
  $showitem = str_replace('tx_org_news,', null, $showitem);
  return $showitem;
}

/* Remove tx_org_service */

function remove_tx_org_service($confArr, $showitem)
{
  if (!$confArr['hide.']['tables.']['tx_org_service'])
  {
    return $showitem;
  }
  $showitem = str_replace('tx_org_service,', null, $showitem);
  return $showitem;
}

/* Remove tx_org_staff */

function remove_tx_org_staff($confArr, $showitem)
{
  if (!$confArr['hide.']['tables.']['tx_org_staff'])
  {
    return $showitem;
  }
  $showitem = str_replace('tx_org_staff,', null, $showitem);
  return $showitem;
}

/* Remove tx_org_tax */

function remove_tx_org_tax($confArr, $showitem)
{
  if (!$confArr['hide.']['tables.']['tx_org_tax'])
  {
    return $showitem;
  }
  $showitem = str_replace('tx_org_tax,', null, $showitem);
  return $showitem;
}

/* LOOP all Organiser tables */
foreach ($arrOrgTables as $orgTable)
{
  // LOOP all palettes of the current table
  $palettes = array_keys($TCA[$orgTable]['palettes']);
  foreach ($palettes as $palette)
  {
    $showitem = $TCA[$orgTable]['palettes'][$palette]['showitem'];
    $showitem = remove_tx_org_cal($confArr, $showitem);
    $showitem = remove_tx_org_downloads($confArr, $showitem);
    $showitem = remove_tx_org_event($confArr, $showitem);
    $showitem = remove_tx_org_headquarters($confArr, $showitem);
    $showitem = remove_tx_org_job($confArr, $showitem);
    $showitem = remove_tx_org_location($confArr, $showitem);
    $showitem = remove_tx_org_news($confArr, $showitem);
    $showitem = remove_tx_org_service($confArr, $showitem);
    $showitem = remove_tx_org_staff($confArr, $showitem);
    $showitem = remove_tx_org_tax($confArr, $showitem);
    $TCA[$orgTable]['palettes'][$palette]['showitem'] = $showitem;
  } // LOOP all palettes of the current table
  // LOOP all types of the current table
  $types = array_keys($TCA[$orgTable]['types']);
  foreach ($types as $type)
  {
    $showitem = $TCA[$orgTable]['types'][$type]['showitem'];
    $showitem = remove_tx_org_cal($confArr, $showitem);
    $showitem = remove_tx_org_downloads($confArr, $showitem);
    $showitem = remove_tx_org_event($confArr, $showitem);
    $showitem = remove_tx_org_headquarters($confArr, $showitem);
    $showitem = remove_tx_org_job($confArr, $showitem);
    $showitem = remove_tx_org_location($confArr, $showitem);
    $showitem = remove_tx_org_news($confArr, $showitem);
    $showitem = remove_tx_org_service($confArr, $showitem);
    $showitem = remove_tx_org_staff($confArr, $showitem);
    $showitem = remove_tx_org_tax($confArr, $showitem);
    $TCA[$orgTable]['types'][$type]['showitem'] = $showitem;
  } // LOOP all types of the current table
} //LOOP all Organiser tables