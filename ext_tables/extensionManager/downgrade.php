<?php

if (!defined('TYPO3_MODE'))
{
  die('Access denied.');
}

$confArr = unserialize($GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf']['org']);

$extManagerDowngradeEnable_fe_users = $confArr['downgrade.']['enable.']['fe_users'];

?>