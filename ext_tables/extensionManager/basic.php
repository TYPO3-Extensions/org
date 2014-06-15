<?php

if (!defined('TYPO3_MODE'))
{
  die('Access denied.');
}

// INDEX
// * Localization support
// * Store record configuration

$confArr = unserialize($GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf']['org']);

// Language for labels of static templates and page tsConfig
$llStatic = $confArr['basic.']['LLstatic'];
switch ($llStatic)
{
  case( 'German' ):
    $llStatic = 'de';
    break;
  default:
    $llStatic = 'default';
}

?>