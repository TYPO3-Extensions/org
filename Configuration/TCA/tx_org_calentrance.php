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
  'ctrl' => array(
    'title' => 'LLL:EXT:org/Resources/Private/Language/tx_org_cal.xml:tx_org_calentrance',
    'label' => 'title',
    'tstamp' => 'tstamp',
    'crdate' => 'crdate',
    'cruser_id' => 'cruser_id',
    'default_sortby' => 'ORDER BY title',
    'delete' => 'deleted',
    'enablecolumns' => array(
      'disabled' => 'hidden',
    ),
    'dividers2tabs' => true,
    'hideAtCopy' => false,
    'thumbnail' => 'image',
    'iconfile' => t3lib_extMgm::extRelPath( $_EXTKEY ) . 'Resources/Public/Images/Icons/ExtIcon/calentrance.gif',
    'treeParentField' => 'uid_parent',
    'searchFields' => ''
    . 'title,title_lang_ol,'
    . 'tx_org_cal,'
    . 'hidden'
  ),
  'interface' => array(
    'showRecordFieldList' => ''
    . 'title,title_lang_ol,value,tx_org_tax,'
    . 'hidden,starttime,endtime,fe_group'
  ),
  'columns' => array(
    'title' => array(
      'exclude' => 0,
      'label' => 'LLL:EXT:org/Resources/Private/Language/tx_org_cal.xml:tx_org_calentrance.title',
      'config' => $conf_input_30_trimRequired,
    ),
    'title_lang_ol' => array(
      'exclude' => 0,
      'label' => 'LLL:EXT:org/Resources/Private/Language/tx_org_cal.xml:tx_org_calentrance.title_lang_ol',
      'config' => $conf_input_30_trim,
    ),
    'value' => array(
      'exclude' => 0,
      'label' => 'LLL:EXT:org/Resources/Private/Language/tx_org_cal.xml:tx_org_calentrance.value',
      'config' => array(
        'type' => 'input',
        'size' => '7',
        'max' => '7',
        'eval' => 'required,double2',
      ),
    ),
    'tx_org_tax' => array(
      'exclude' => $bool_exclude_default,
      'l10n_mode' => 'exclude',
      'label' => 'LLL:EXT:org/Resources/Private/Language/tx_org_cal.xml:tx_org_calentrance.tx_org_tax',
      'config' => array(
        'type' => 'select',
        'size' => 3,
        'maxitems' => 1,
        'eval' => 'required',
        'foreign_table' => 'tx_org_tax'
      ),
    ),
    'hidden' => $conf_hidden,
    'starttime' => $conf_starttime,
    'endtime' => $conf_endtime,
    'fe_group' => $conf_fegroup,
  ),
  'types' => array(
    '0' => array(
      'showitem' =>
      '--div--;LLL:EXT:org/Resources/Private/Language/tx_org_cal.xml:tx_org_calentrance.div_calentrance, title;;1;;,value,tx_org_tax,'
      . '--div--;LLL:EXT:org/Resources/Private/Language/tx_org_cal.xml:tx_org_calentrance.div_control,     hidden;;2;;,fe_group'
      . ''
    ),
  ),
  'palettes' => array(
    '1' => array( 'showitem' => 'title_lang_ol,' ),
    '2' => array( 'showitem' => 'starttime,endtime,' ),
  ),
);