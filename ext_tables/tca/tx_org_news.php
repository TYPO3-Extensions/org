<?php
if (!defined ('TYPO3_MODE'))
{
  die ('Access denied.');
}



  ////////////////////////////////////////////////////////////////////////////
  //
  // TCA tables
  //
  // news
  // newscat

  // news ////////////////////////////////////////////////////////////////////
$TCA['tx_org_news'] = array (
  'ctrl' => array (
    'title'             => 'LLL:EXT:org/tca/locallang/tx_org_news.xml:tx_org_news',
    'label'             => 'datetime',
    'label_alt'         => 'title',
    'label_alt_force'   => true,
    'tstamp'            => 'tstamp',
    'crdate'            => 'crdate',
    'cruser_id'         => 'cruser_id',
    'languageField'             => 'sys_language_uid',
    'transOrigPointerField'     => 'l10n_parent',
    'transOrigDiffSourceField'  => 'l10n_diffsource',
    'default_sortby'    => 'ORDER BY datetime DESC, title',
    'delete'            => 'deleted',
    'enablecolumns'     => array (
      'disabled'  => 'hidden',
      'starttime' => 'starttime',
      'endtime'   => 'endtime',
      'fe_group'  => 'fe_group',
    ),
    'dividers2tabs'     => true,
    'hideAtCopy'        => true,
    'dynamicConfigFile' => t3lib_extMgm::extPath($_EXTKEY).'tca.php',
    'thumbnail'         => 'image',
    'iconfile'          => t3lib_extMgm::extRelPath($_EXTKEY).'ext_icon/news.gif',
    'type'              => 'type',
    'typeicon_column'   => 'type',
    'typeicons'         => array(
      'record'    => '../typo3conf/ext/org/ext_icon/news.gif',
      'page'      => '../typo3conf/ext/org/ext_icon/page.gif',
      'url'       => '../typo3conf/ext/org/ext_icon/url.gif',
      'notype'    => '../typo3conf/ext/org/ext_icon/notype.gif',
      'news'      => '../typo3conf/ext/org/ext_icon/news.gif',
      'page'  => '../typo3conf/ext/org/ext_icon/page.gif',
      'url'   => '../typo3conf/ext/org/ext_icon/url.gif',
    ),
    'searchFields' => 'sys_language_uid,l10n_parent,l10n_diffsource,type,title,subtitle,datetime,tx_org_newscat,tx_org_newscat_uid_parent,bodytext,' .
    'teaser_title,teaser_subtitle,teaser_short' .
    'marginal_title,marginal_subtitle,marginal_short' .
    'page,url' .
    'fe_user,' .
    'tx_org_headquarters,' .
    'documents_from_path,documents,documentscaption,documentslayout,documentssize,' .
    'image,imagecaption,imageseo,imagewidth,imageheight,imageorient,imagecaption,imagecols,imageborder,imagecaption_position,image_link,image_zoom,image_noRows,image_effects,image_compression,' .
    'embeddedcode,' .
    'hidden,topnews,topnews_sorting,pages,starttime,endtime,fe_group,' .
    'keywords,description,'
  ,
  ),
);
  // news ////////////////////////////////////////////////////////////////////

  // newscat ////////////////////////////////////////////////////////////////////
$TCA['tx_org_newscat'] = array (
  'ctrl' => array (
    'title'           => 'LLL:EXT:org/tca/locallang/tx_org_news.xml:tx_org_newscat',
    'label'           => 'title',
    'tstamp'          => 'tstamp',
    'crdate'          => 'crdate',
    'default_sortby'  => 'ORDER BY title',
    'delete'          => 'deleted',
    'enablecolumns'   => array (
      'disabled'  => 'hidden',
    ),
    'hideAtCopy'        => false,
    'dividers2tabs'     => true,
    'dynamicConfigFile' => t3lib_extMgm::extPath($_EXTKEY).'tca.php',
    'thumbnail'         => 'image',
    'iconfile'          => t3lib_extMgm::extRelPath($_EXTKEY).'ext_icon/newscat.gif',
      // #32223 Category tree, 111130, dwildt+
    'treeParentField'   => 'uid_parent',
    'searchFields' => 'title,title_lang_ol,uid_parent,' .
    'hidden,' .
    'image,imagecaption,imageseo',
  )
);
  // newscat ////////////////////////////////////////////////////////////////////

?>