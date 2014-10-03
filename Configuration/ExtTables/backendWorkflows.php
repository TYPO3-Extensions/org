<?php

if (!defined('TYPO3_MODE'))
{
  die('Access denied.');
}

// Methods for backend workflows
// #i0004, 130130, dwildt, 1+
require_once(t3lib_extMgm::extPath($_EXTKEY) . 'lib/flexform/class.tx_org_flexform.php');
?>