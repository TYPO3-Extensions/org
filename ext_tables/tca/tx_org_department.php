<?php

if (!defined('TYPO3_MODE'))
{
  die('Access denied.');
}



////////////////////////////////////////////////////////////////////////////
//
// INDEX
//
// department
// departmentcat
//
$TCA['tx_org_department'] = array(
  'ctrl' => array(
    'title' => 'LLL:EXT:org/tca/locallang/tx_org_department.xml:tx_org_department',
    'label' => 'title',
    'tstamp' => 'tstamp',
    'crdate' => 'crdate',
    'cruser_id' => 'cruser_id',
    'languageField' => 'sys_language_uid',
    'transOrigPointerField' => 'l10n_parent',
    'transOrigDiffSourceField' => 'l10n_diffsource',
    'sortby' => 'sorting',
    'delete' => 'deleted',
    'enablecolumns' => array(
      'disabled' => 'hidden',
      'fe_group' => 'fe_group',
    ),
    'dividers2tabs' => true,
    'hideAtCopy' => true,
    'dynamicConfigFile' => t3lib_extMgm::extPath($_EXTKEY) . 'tca.php',
    'thumbnail' => 'image',
    'iconfile' => t3lib_extMgm::extRelPath($_EXTKEY) . 'ext_icon/department.gif',
  ),
);
// org /////////////////////////////////////////////////////////////////////
// departmentcat ////////////////////////////////////////////////////////////////////
$TCA['tx_org_departmentcat'] = array(
  'ctrl' => array(
    'title' => 'LLL:EXT:org/tca/locallang/tx_org_department.xml:tx_org_departmentcat',
    'label' => 'title',
    'tstamp' => 'tstamp',
    'crdate' => 'crdate',
    'sortby' => 'sorting',
    'delete' => 'deleted',
    'enablecolumns' => array(
      'disabled' => 'hidden',
    ),
    'hideAtCopy' => false,
    'dividers2tabs' => true,
    'dynamicConfigFile' => t3lib_extMgm::extPath($_EXTKEY) . 'tca.php',
    'thumbnail' => 'image',
    'iconfile' => t3lib_extMgm::extRelPath($_EXTKEY) . 'ext_icon/departmentcat.gif',
  )
);
// departmentcat ////////////////////////////////////////////////////////////////////
?>