<?php

if (!defined('TYPO3_MODE'))
{
  die('Access denied.');
}



////////////////////////////////////////////////////////////////////////////
//
// INDEX
//
// doc
// doccat
// docmedia
//
// doc /////////////////////////////////////////////////////////////////////
$TCA['tx_org_downloads'] = array(
  'ctrl' => array(
    'title' => 'LLL:EXT:org/tca/locallang/tx_org_downloads.xml:tx_org_downloads',
    'label' => 'title',
    //'label'             => 'datetime',
    //'label_alt'         => 'title',
    //'label_alt_force'   => true,
    'tstamp' => 'tstamp',
    'crdate' => 'crdate',
    'cruser_id' => 'cruser_id',
    'languageField' => 'sys_language_uid',
    'transOrigPointerField' => 'l10n_parent',
    'transOrigDiffSourceField' => 'l10n_diffsource',
    'default_sortby' => 'ORDER BY title',
    //'default_sortby'    => 'ORDER BY datetime DESC, title',
    'delete' => 'deleted',
    'enablecolumns' => array(
      'disabled' => 'hidden',
      'starttime' => 'starttime',
      'endtime' => 'endtime',
      'fe_group' => 'fe_group',
    ),
    'dividers2tabs' => true,
    'hideAtCopy' => true,
    'dynamicConfigFile' => t3lib_extMgm::extPath($_EXTKEY) . 'tca.php',
    'thumbnail' => 'image',
    'iconfile' => t3lib_extMgm::extRelPath($_EXTKEY) . 'ext_icon/download.gif',
    'type' => 'type',
    'typeicon_column' => 'type',
    'typeicons' => array(
      'download' => '../typo3conf/ext/org/ext_icon/download.gif',
      'download_shipping' => '../typo3conf/ext/org/ext_icon/download_shipping.gif',
      'shipping' => '../typo3conf/ext/org/ext_icon/shipping.gif',
    ),
    'searchFields' => ''
    . 'sys_language_uid,l10n_parent,l10n_diffsource,' .
    'type,title,subtitle,datetime,tx_org_downloadscat,tx_org_downloadsmedia,bodytext,' .
    'documents_from_path,documents,documentscaption,documentslayout,documents_display_label,documents_display_caption,documentssize,' .
    'thumbnail,thumbnail_width,thumbnail_height,' .
    'linkicon_width,linkicon_height,' .
    'tx_flipit_layout,tx_flipit_quality,tx_flipit_pagelist,tx_flipit_updateswfxml,tx_flipit_swf_files,tx_flipit_xml_file,tx_flipit_fancybox,tx_flipit_evaluate,' .
    'teaser_title,teaser_subtitle,teaser_short' .
    'pages,' .
    'hidden,pages,starttime,endtime,fe_group,' .
    'seo_keywords,seo_description,' .
    'statistics_hits,statistics_visits,statistics_downloads,statistics_downloads_by_visits,',
  ),
);
// doc /////////////////////////////////////////////////////////////////////
// doccat /////////////////////////////////////////////////////////////////////
$TCA['tx_org_downloadscat'] = array(
  'ctrl' => array(
    'title' => 'LLL:EXT:org/tca/locallang/tx_org_downloads.xml:tx_org_downloadscat',
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
    'iconfile' => t3lib_extMgm::extRelPath($_EXTKEY) . 'ext_icon/downloadcat.gif',
    'type' => 'type',
    'typeicon_column' => 'type',
    'typeicons' => array(
      'cat_text' => '../typo3conf/ext/org/ext_icon/cat_text.gif',
      'cat_color' => '../typo3conf/ext/org/ext_icon/cat_color.gif',
      'cat_image' => '../typo3conf/ext/org/ext_icon/cat_image.gif',
    ),
    'searchFields' => ''
    . 'type,'
    . 'title,title_lang_ol,text,text_lang_ol,' .
    'color,' .
    'image,imageseo,imageseo_lang_ol,image_width,image_height,image_compression,image_effects,' .
    'hidden',
  )
);
// doccat /////////////////////////////////////////////////////////////////////
// docmedia /////////////////////////////////////////////////////////////////////
$TCA['tx_org_downloadsmedia'] = array(
  'ctrl' => array(
    'title' => 'LLL:EXT:org/tca/locallang/tx_org_downloads.xml:tx_org_downloadsmedia',
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
    'iconfile' => t3lib_extMgm::extRelPath($_EXTKEY) . 'ext_icon/download.gif',
    'type' => 'type',
    'typeicon_column' => 'type',
    'typeicons' => array(
      'cat_text' => '../typo3conf/ext/org/ext_icon/cat_text.gif',
      'cat_color' => '../typo3conf/ext/org/ext_icon/cat_color.gif',
      'cat_image' => '../typo3conf/ext/org/ext_icon/cat_image.gif',
    ),
    'searchFields' => ''
    . 'type,title,title_lang_ol,text,text_lang_ol,' .
    'color,' .
    'image,imageseo,imageseo_lang_ol,image_width,image_height,image_compression,image_effects,' .
    'hidden',
  )
);
// docmedia /////////////////////////////////////////////////////////////////////
?>