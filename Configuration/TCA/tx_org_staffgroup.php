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
    'title' => 'LLL:EXT:org/Configuration/Tca/Locallang/tx_org_staff.xml:tx_org_staffgroup',
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
    'iconfile' => '../typo3conf/ext/org/Resources/Public/Images/Icons/ExtIcon/staff.gif',
    'treeParentField' => 'uid_parent',
    'searchFields' => ''
    . 'title,title_lang_ol'
  ,
  ),
  'columns' => array(
    'hidden' => array(
      'exclude' => 1,
      'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.hidden',
      'config' => array(
        'type' => 'check',
        'default' => '0'
      )
    ),
    'title' => array(
      'exclude' => 0,
      'label' => 'LLL:EXT:org/Configuration/Tca/Locallang/tx_org_staff.xml:tx_org_staffgroup.title',
      'config' => array(
        'type' => 'input',
        'size' => '30',
        'eval' => 'required,trim',
      )
    ),
    'title_lang_ol' => array(
      'exclude' => 0,
      'label' => 'LLL:EXT:org/Configuration/Tca/Locallang/tx_org_cal.xml:tx_org_calentrance.title_lang_ol',
      'config' => array(
        'type' => 'input',
        'size' => '30',
        'eval' => 'trim',
      )
    ),
    'uid_parent' => array(
      'exclude' => 0,
      'label' => 'LLL:EXT:org/Configuration/Tca/Locallang/tx_org_staff.xml:tx_org_staffgroup.uid_parent',
      'config' => array(
        'type' => 'select',
        'form_type' => 'user',
        'userFunc' => 'tx_cpstcatree->getTree',
        'foreign_table' => 'tx_org_staffgroup',
        'treeView' => 1,
        'expandable' => 1,
        'expandFirst' => 0,
        'expandAll' => 0,
        'size' => 1,
        'minitems' => 0,
        'maxitems' => 2,
        'trueMaxItems' => 1,
      ),
    ),
  ),
  'types' => array(
    '0' => array(
      'showitem' =>
      '--div--;LLL:EXT:org/Configuration/Tca/Locallang/tx_org_staff.xml:tx_org_staffgroup.div_category, title;;1;;,uid_parent,'
      . '--div--;LLL:EXT:org/Configuration/Tca/Locallang/tx_org_staff.xml:tx_org_staffgroup.div_control, hidden'
      . ''
    ),
  ),
  'palettes' => array(
    '1' => array( 'showitem' => 'title_lang_ol,' ),
  )
);
