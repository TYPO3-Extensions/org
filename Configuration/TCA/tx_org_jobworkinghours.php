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
    'title' => 'LLL:EXT:org/Resources/Private/Language/tx_org_job.xml:tx_org_jobworkinghours',
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
    'dynamicConfigFile' => t3lib_extMgm::extPath($_EXTKEY) . 'tca.php',
    'iconfile' => t3lib_extMgm::extRelPath($_EXTKEY) . 'Resources/Public/Images/Icons/ExtIcon/job.gif',
    'thumbnail' => 'icons',
    'treeParentField' => 'uid_parent',
    'searchFields' => ''
    . 'title,title_lang_ol'
    ,
  ),
  'interface' => array(
    'showRecordFieldList' => ''
    . 'title,title_lang_ol,uid_parent,'
    . 'icons,icon_offset_x,icon_offset_y,'
    . 'hidden,'
  ,
  ),
  'feInterface' => $TCA[ 'tx_org_jobworkinghours' ][ 'feInterface' ],
  'columns' => array(
    'title' => array(
      'exclude' => 0,
      'label' => 'LLL:EXT:org/Resources/Private/Language/tx_org_job.xml:tx_org_jobworkinghours.title',
      'config' => array(
        'type' => 'input',
        'size' => '30',
        'eval' => 'required,trim',
      )
    ),
    'title_lang_ol' => array(
      'exclude' => 0,
      'label' => 'LLL:EXT:org/Resources/Private/Language/tx_org_job.xml:tx_org_jobworkinghours.title_lang_ol',
      'config' => array(
        'type' => 'input',
        'size' => '30',
        'eval' => 'trim',
      )
    ),
    'uid_parent' => array(
      'exclude' => 0,
      'label' => 'LLL:EXT:org/Resources/Private/Language/tx_org_job.xml:tx_org_jobworkinghours.uid_parent',
      'config' => array(
        'type' => 'select',
        'form_type' => 'user',
        'userFunc' => 'tx_cpstcatree->getTree',
        'foreign_table' => 'tx_org_jobworkinghours',
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
    'icons' => array(
      'exclude' => $bool_exclude_default,
//      'l10n_mode' => 'exclude',
      'label' => 'LLL:EXT:org/Resources/Private/Language/tx_org_job.xml:tx_org_jobworkinghours.icons',
      'config' => $conf_file_image,
    ),
    'icon_offset_x' => array(
      'exclude' => 0,
      'label' => 'LLL:EXT:org/Resources/Private/Language/tx_org_job.xml:tx_org_jobworkinghours.icon_offset_x',
      'config' => array(
        'type' => 'input',
        'size' => '3',
        'max' => '3',
        'eval' => 'int',
        'default' => '0',
      ),
    ),
    'icon_offset_y' => array(
      'exclude' => 0,
      'label' => 'LLL:EXT:org/Resources/Private/Language/tx_org_job.xml:tx_org_jobworkinghours.icon_offset_y',
      'config' => array(
        'type' => 'input',
        'size' => '3',
        'max' => '3',
        'eval' => 'int',
        'default' => '0',
      ),
    ),
    'hidden' => array(
      'exclude' => 1,
      'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.hidden',
      'config' => array(
        'type' => 'check',
        'default' => '0'
      )
    ),
  ),
  'types' => array(
    '0' => array(
      'showitem' => ''
      . '--div--;LLL:EXT:org/Resources/Private/Language/tx_org_job.xml:tx_org_jobworkinghours.div_category,'
      . '  title;;1;;,uid_parent,'
      . '--div--;LLL:EXT:org/Resources/Private/Language/tx_org_job.xml:tx_org_jobworkinghours.div_icons,'
      . '  icons,icon_offset_x,icon_offset_y,'
      . '--div--;LLL:EXT:org/Resources/Private/Language/tx_org_job.xml:tx_org_jobworkinghours.div_control,'
      . '  hidden'
    ,
    ),
  ),
  'palettes' => array(
    '1' => array( 'showitem' => 'title_lang_ol,' ),
  )
);