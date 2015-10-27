<?php

if (!defined('TYPO3_MODE'))
{
  die('Access denied.');
}

$confArr = unserialize($GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf']['org']);

$extManagerTableDisable_tx_org_cal = $confArr['tables.']['disable.']['tx_org_cal'];