<?php

if (!defined('TYPO3_MODE'))
{
  die('Access denied.');
}

$TCA['tx_org_event'] = array(
  'ctrl' => array(
    'title' => 'LLL:EXT:org/Configuration/Tca/Locallang/tx_org_event.xml:tx_org_event',
    'label' => 'title',
    //'label_alt'         => 'tx_org_headquarters',
    //'label_alt_force'   => true,
    'tstamp' => 'tstamp',
    'crdate' => 'crdate',
    'cruser_id' => 'cruser_id',
    'languageField' => 'sys_language_uid',
    'transOrigPointerField' => 'l10n_parent',
    'transOrigDiffSourceField' => 'l10n_diffsource',
    'default_sortby' => 'ORDER BY title',
    'delete' => 'deleted',
    'enablecolumns' => array(
      'disabled' => 'hidden',
      'fe_group' => 'fe_group',
    ),
    'dividers2tabs' => true,
    'hideAtCopy' => false,
    'dynamicConfigFile' => t3lib_extMgm::extPath($_EXTKEY) . 'tca.php',
    'thumbnail' => 'image',
    'iconfile' => t3lib_extMgm::extRelPath($_EXTKEY) . 'Configuration/ExtIcon/event.gif',
    'type' => 'type',
    'typeicon_column' => 'type',
    'typeicons' => array(
      'record' => '../typo3conf/ext/org/Configuration/ExtIcon/event.gif',
      'page' => '../typo3conf/ext/org/Configuration/ExtIcon/page.gif',
      'url' => '../typo3conf/ext/org/Configuration/ExtIcon/url.gif',
      'notype' => '../typo3conf/ext/org/Configuration/ExtIcon/notype.gif',
    ),
    'searchFields' => 'sys_language_uid,l10n_parent,l10n_diffsource,title,subtitle,producer,length,bodytext,' .
    'teaser_title,teaser_subtitle,teaser_short,' .
    'tx_org_cal,' .
    'documents_from_path,documents,documentscaption,documentslayout,documentssize,' .
    'tx_org_news,' .
    'image,imagecaption,imageseo,imagewidth,imageheight,imageorient,imagecaption,imagecols,imageborder,imagecaption_position,image_link,image_zoom,image_noRows,image_effects,image_compression,' .
    'embeddedcode,print,printcaption,printseo,' .
    'hidden,pages,fe_group,' .
    'seo_keywords,seo_description'
  ),
);

$TCA['tx_org_eventcat'] = array(
  'ctrl' => array(
    'title' => 'LLL:EXT:org/Configuration/Tca/Locallang/tx_org_event.xml:tx_org_eventcat',
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
    'iconfile' => t3lib_extMgm::extRelPath($_EXTKEY) . 'Configuration/ExtIcon/event.gif',
    'treeParentField' => 'uid_parent',
    'searchFields' => ''
    . 'title,title_lang_ol'
    ,
  ),
);
?>