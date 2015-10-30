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
    'title' => 'LLL:EXT:org/Resources/Private/Language/tx_org_headquarters.xml:tx_org_headquarterscat',
    'label' => 'title',
    'tstamp' => 'tstamp',
    'crdate' => 'crdate',
    'default_sortby' => 'ORDER BY title',
    //'sortby' => 'sorting',
    'delete' => 'deleted',
    'enablecolumns' => array(
      'disabled' => 'hidden',
    ),
    'hideAtCopy' => false,
    'dividers2tabs' => true,
    'thumbnail' => 'icons',
    'iconfile' => t3lib_extMgm::extRelPath($_EXTKEY) . 'Resources/Public/Images/Icons/ExtIcon/headquarterscat.gif',
    // #58885, 140516, dwildt, 1+
    'treeParentField' => 'uid_parent',
    'searchFields' => 'title,title_lang_ol,uid_parent,icons,icon_offset_x,icon_offset_y,' .
    'hidden,' .
    'image,imagecaption,imageseo',
  ),
  'interface' => array(
    'showRecordFieldList' => ''
    . 'title,title_lang_ol,uid_parent,'
    . 'icons,icon_offset_x,icon_offset_y,'
    . 'hidden,'
    . 'image,imagecaption,imageseo'
  ,
  ),
  'columns' => array(
    'title' => array(
      'exclude' => 0,
      'label' => 'LLL:EXT:org/Resources/Private/Language/tx_org_headquarters.xml:tx_org_headquarterscat.title',
      'config' => $conf_input_30_trimRequired,
    ),
    'title_lang_ol' => array(
      'exclude' => 1,
      'label' => 'LLL:EXT:org/Resources/Private/Language/tx_org_headquarters.xml:tx_org_headquarterscat.title_lang_ol',
      'config' => $conf_input_30_trim,
    ),
    'uid_parent' => array(
      'exclude' => 1,
      'label' => 'LLL:EXT:org/Resources/Private/Language/tx_org_headquarters.xml:tx_org_headquarterscat.uid_parent',
      'config' => array(
        'type' => 'select',
        'form_type' => 'user',
        'userFunc' => 'tx_cpstcatree->getTree',
        'foreign_table' => 'tx_org_headquarterscat',
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
      'exclude' => 1,
//      'l10n_mode' => 'exclude',
      'label' => 'LLL:EXT:org/Resources/Private/Language/tx_org_headquarters.xml:tx_org_headquarterscat.icons',
      'config' => $conf_file_image,
    ),
    'icon_offset_x' => array(
      'exclude' => 1,
      'label' => 'LLL:EXT:org/Resources/Private/Language/tx_org_headquarters.xml:tx_org_headquarterscat.icon_offset_x',
      'config' => array(
        'type' => 'input',
        'size' => '3',
        'max' => '3',
        'eval' => 'int',
        'default' => '0',
      ),
    ),
    'icon_offset_y' => array(
      'exclude' => 1,
      'label' => 'LLL:EXT:org/Resources/Private/Language/tx_org_headquarters.xml:tx_org_headquarterscat.icon_offset_y',
      'config' => array(
        'type' => 'input',
        'size' => '3',
        'max' => '3',
        'eval' => 'int',
        'default' => '0',
      ),
    ),
    'hidden' => $conf_hidden,
  ),
  'types' => array(
    '0' => array( 'showitem' => ''
      . '--div--;LLL:EXT:org/Resources/Private/Language/tx_org_headquarters.xml:tx_org_headquarterscat.div_cat,'
      . '  title;;1;;1-1-1,uid_parent,'
      . '--div--;LLL:EXT:org/Resources/Private/Language/tx_org_headquarters.xml:tx_org_headquarterscat.div_icons,'
      . '  icons,icon_offset_x,icon_offset_y,'
      . '--div--;LLL:EXT:org/Resources/Private/Language/tx_org_headquarters.xml:tx_org_headquarterscat.div_control,'
      . 'hidden'
    ),
  ),
  'palettes' => array(
    '1' => array( 'showitem' => 'title_lang_ol,' ),
  ),
);