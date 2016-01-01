<?php

if (!defined('TYPO3_MODE'))
{
  die('Access denied.');
}

/**
 * page and user TSconfig
 *
 */
require_once( PATH_typo3conf . 'ext/org/Configuration/TsConfig/Page/TxLinkhandler/' . $llStatic . '.php' );
require_once( PATH_typo3conf . 'ext/org/Configuration/TsConfig/Page/TxPowermail/default.php' );