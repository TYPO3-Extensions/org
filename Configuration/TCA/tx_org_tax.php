<?php

if ( !defined( 'TYPO3_MODE' ) )
{
  die( 'Access denied.' );
}

// Configuration by the extension manager
require_once( PATH_typo3conf . 'ext/org/Configuration/ExtensionManager/simplifyer.php' );
// Default values and wizards
require_once( PATH_typo3conf . 'ext/org/Configuration/TCA/Defaults/defaultValues.php' );

return array(
  'ctrl' => array (
    'title'             => 'LLL:EXT:org/Resources/Private/Language/tx_org_tax.xml:tx_org_tax',
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
    'iconfile'          => t3lib_extMgm::extRelPath($_EXTKEY).'Resources/Public/Images/Icons/ExtIcon/tax.gif',
    'searchFields' => 'title,title_lang_ol,value,' .
    'hidden,starttime,endtime'
  ),
  'interface' => array(
    'showRecordFieldList' => 'title,title_lang_ol,value,' .
    'hidden,starttime,endtime'
  ),
  'feInterface' => $TCA['tx_org_tax']['feInterface'],
  'columns' => array(
    'title' => array(
      'exclude' => 0,
      'label' => 'LLL:EXT:org/Resources/Private/Language/tx_org_tax.xml:tx_org_tax.title',
      'config' => $conf_input_30_trimRequired,
    ),
    'title_lang_ol' => array(
      'exclude' => 0,
      'label' => 'LLL:EXT:org/Resources/Private/Language/tx_org_tax.xml:tx_org_tax.title_lang_ol',
      'config' => $conf_input_30_trim,
    ),
    'value' => array(
      'exclude' => 0,
      'label' => 'LLL:EXT:org/Resources/Private/Language/tx_org_tax.xml:tx_org_tax.value',
      'config' => array(
        'type' => 'input',
        'size' => '5',
        'max' => '5',
        'eval' => 'required,double2',
      ),
    ),
    'hidden' => $conf_hidden,
    'starttime' => $conf_starttime,
    'endtime' => $conf_endtime,
  ),
  'types' => array(
    '0' => array('showitem' => '--div--;LLL:EXT:org/Resources/Private/Language/tx_org_tax.xml:tx_org_tax.div_tax,     title;;1;;,value,' .
      '--div--;LLL:EXT:org/Resources/Private/Language/tx_org_tax.xml:tx_org_tax.div_control, hidden;;2;;' .
      ''),
  ),
  'palettes' => array(
    '1' => array('showitem' => 'title_lang_ol,'),
    '2' => array('showitem' => 'starttime,endtime,'),
  ),
);
?>