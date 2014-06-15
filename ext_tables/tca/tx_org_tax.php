<?php
if (!defined ('TYPO3_MODE'))
{
  die ('Access denied.');
}

$TCA['tx_org_tax'] = array (
  'ctrl' => array (
    'title'             => 'LLL:EXT:org/tca/locallang/tx_org_tax.xml:tx_org_tax',
    'label'             => 'value',
    'label_alt'         => 'title',
    'label_alt_force'   => true,
    'tstamp'            => 'tstamp',
    'crdate'            => 'crdate',
    'cruser_id'         => 'cruser_id',
    'default_sortby'    => 'ORDER BY value ASC',
    'delete'            => 'deleted',
    'enablecolumns'     => array (
      'disabled'  => 'hidden',
      'starttime' => 'starttime',
      'endtime'   => 'endtime',
    ),
    'dividers2tabs'     => true,
    'hideAtCopy'        => true,
    'dynamicConfigFile' => t3lib_extMgm::extPath($_EXTKEY).'tca.php',
    'thumbnail'         => 'image',
    'iconfile'          => t3lib_extMgm::extRelPath($_EXTKEY).'ext_icon/tax.gif',
    'searchFields' => 'title,title_lang_ol,value,' .
    'hidden,starttime,endtime'
  ),
);
?>