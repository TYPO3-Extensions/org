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
    'title' => 'LLL:EXT:org/Resources/Private/Language/tx_org_news.xml:tx_org_newsgroup',
    'label' => 'title',
    'tstamp' => 'tstamp',
    'crdate' => 'crdate',
    'default_sortby' => 'ORDER BY title',
    'delete' => 'deleted',
    'enablecolumns' => array(
      'disabled' => 'hidden',
    ),
    'hideAtCopy' => false,
    'dividers2tabs' => true,
    'thumbnail' => 'image',
    'iconfile' => t3lib_extMgm::extRelPath( $_EXTKEY ) . 'Resources/Public/Images/Icons/ExtIcon/newscat.gif',
    // #32223 Category tree, 111130, dwildt+
    'treeParentField' => 'uid_parent',
    'searchFields' => 'title,title_lang_ol,uid_parent,' .
    'hidden,' .
    'image,imagecaption,imageseo',
  ),
  'interface' => array(
    'showRecordFieldList' => 'title,title_lang_ol,uid_parent,' .
    'hidden,' .
    'image,imagecaption,imageseo',
  ),
  'columns' => array(
    'title' => array(
      'exclude' => 0,
      'label' => 'LLL:EXT:org/Resources/Private/Language/tx_org_news.xml:tx_org_newsgroup.title',
      'config' => $conf_input_30_trimRequired,
    ),
    'title_lang_ol' => array(
      'exclude' => 0,
      'label' => 'LLL:EXT:org/Resources/Private/Language/tx_org_news.xml:tx_org_newsgroup.title_lang_ol',
      'config' => $conf_input_30_trim,
    ),
    'uid_parent' => array(
      'exclude' => 0,
      'label' => 'LLL:EXT:org/Resources/Private/Language/tx_org_news.xml:tx_org_newsgroup.uid_parent',
      'config' => array(
        'type' => 'select',
        'form_type' => 'user',
        'userFunc' => 'tx_cpstcatree->getTree',
        'foreign_table' => 'tx_org_newsgroup',
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
    'image' => array(
      'l10n_mode' => 'exclude',
      'exclude' => $bool_exclude_default,
      'label' => 'LLL:EXT:org/Resources/Private/Language/locallang_db.xml:tca_phrase.image',
      'config' => $conf_file_image,
    ),
    'imagecaption' => array(
      'exclude' => $bool_exclude_default,
      'label' => 'LLL:EXT:org/Resources/Private/Language/locallang_db.xml:tca_phrase.imagecaption',
      'config' => $conf_text_30_05,
    ),
    'imageseo' => array(
      'exclude' => $bool_exclude_default,
      'label' => 'LLL:EXT:org/Resources/Private/Language/locallang_db.xml:tca_phrase.imageseo',
      'config' => $conf_text_30_05,
    ),
    'hidden' => $conf_hidden,
  ),
  'types' => array(
    '0' => array( 'showitem' => '--div--;LLL:EXT:org/Resources/Private/Language/tx_org_news.xml:tx_org_newsgroup.div_cat,     title;;1;;1-1-1,uid_parent,' .
      '--div--;LLL:EXT:org/Resources/Private/Language/tx_org_news.xml:tx_org_newsgroup.div_control, hidden,' .
      '--div--;LLL:EXT:org/Resources/Private/Language/tx_org_news.xml:tx_org_newsgroup.div_media,   image, imagecaption;;3;;' ),
  ),
  'palettes' => array(
    '1' => array( 'showitem' => 'title_lang_ol' ),
    '3' => array( 'showitem' => 'imageseo' ),
  ),
);
// tx_org_newsgroup
