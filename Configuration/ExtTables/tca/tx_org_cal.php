<?php

if ( !defined( 'TYPO3_MODE' ) )
{
  die( 'Access denied.' );
}

//if ($extManagerTableDisable_tx_org_cal)
//{
//  return;
//}
////////////////////////////////////////////////////////////////////////////
//
// INDEX
//
// cal
// caltype
// calentrance
// cal /////////////////////////////////////////////////////////////////////
$TCA[ 'tx_org_cal' ] = array(
  'ctrl' => array(
    'title' => 'LLL:EXT:org/Configuration/Tca/Locallang/tx_org_cal.xml:tx_org_cal',
    'label' => 'datetime',
    'label_alt' => 'title,tx_org_location',
    'label_alt_force' => true,
    'tstamp' => 'tstamp',
    'crdate' => 'crdate',
    'cruser_id' => 'cruser_id',
    'languageField' => 'sys_language_uid',
    'transOrigPointerField' => 'l10n_parent',
    'transOrigDiffSourceField' => 'l10n_diffsource',
    'default_sortby' => 'ORDER BY datetime DESC, title',
    'delete' => 'deleted',
    'enablecolumns' => array(
      'disabled' => 'hidden',
      'starttime' => 'starttime',
      'endtime' => 'endtime',
      'fe_group' => 'fe_group',
    ),
    'dividers2tabs' => true,
    'hideAtCopy' => true,
    'dynamicConfigFile' => t3lib_extMgm::extPath( $_EXTKEY ) . 'tca.php',
    'thumbnail' => 'image',
    'iconfile' => t3lib_extMgm::extRelPath( $_EXTKEY ) . 'Configuration/ExtIcon/cal.gif',
    'type' => 'type',
    'typeicon_column' => 'type',
    'typeicons' => array(
      'record' => '../typo3conf/ext/org/Configuration/ExtIcon/caldirect.gif',
      'tx_org_event' => '../typo3conf/ext/org/Configuration/ExtIcon/event.gif',
      'page' => '../typo3conf/ext/org/Configuration/ExtIcon/page.gif',
      'url' => '../typo3conf/ext/org/Configuration/ExtIcon/url.gif',
      'notype' => '../typo3conf/ext/org/Configuration/ExtIcon/notype.gif',
      'calpage' => '../typo3conf/ext/org/Configuration/ExtIcon/page.gif',
      'calurl' => '../typo3conf/ext/org/Configuration/ExtIcon/url.gif',
    ),
    'searchFields' => ''
    . 'sys_language_uid,l10n_parent,l10n_diffsource,type,title,subtitle,datetime,datetimeend,tx_org_caltype,bodytext,tx_org_event,'
    . 'teaser_title,teaser_subtitle,teaser_short,'
    . 'marginal_title,marginal_subtitle,marginal_short,'
    . 'tx_org_location,tx_org_calentrance,'
    . 'tx_org_headquarters'
    . 'image,imagecaption,imageseo,imagewidth,imageheight,imageorient,imagecaption,imagecols,imageborder,imagecaption_position,image_link,image_zoom,image_noRows,image_effects,image_compression,'
    . 'embeddedcode,print,printcaption,printseo,'
    . 'hidden,starttime,endtime,pages,fe_group,'
    . 'seo_keywords,seo_description',
    'useColumnsForDefaultValues' =>  ''
    . 'type,title,subtitle,datetime,datetimeend,bodytext,'
    . 'teaser_title,teaser_subtitle,teaser_short,'
    . 'marginal_title,marginal_subtitle,marginal_short,'
    . 'image,imagecaption,imageseo,imagewidth,imageheight,imageorient,imagecaption,imagecols,imageborder,imagecaption_position,image_link,image_zoom,image_noRows,image_effects,image_compression,'
    . 'embeddedcode,print,printcaption,printseo,'
    . 'hidden,starttime,endtime,pages,'
    . 'seo_keywords,seo_description',
    // #69250, 150821, dwildt, 1+
    'filter' => 'filter_for_all_fields',
  ),
);
// cal /////////////////////////////////////////////////////////////////////
// caltype ///////////////////////////////////////////////////////////////////
$TCA[ 'tx_org_caltype' ] = array(
  'ctrl' => array(
    'title' => 'LLL:EXT:org/Configuration/Tca/Locallang/tx_org_cal.xml:tx_org_caltype',
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
    'dynamicConfigFile' => t3lib_extMgm::extPath( $_EXTKEY ) . 'tca.php',
    'thumbnail' => 'image',
    'iconfile' => t3lib_extMgm::extRelPath( $_EXTKEY ) . 'Configuration/ExtIcon/caltype.gif',
    'treeParentField' => 'uid_parent',
    'searchFields' => ''
    . 'title,title_lang_ol,'
    . 'tx_org_cal,'
    . 'hidden'
  ,
  ),
);
// caltype ///////////////////////////////////////////////////////////////////
// calentrance //////////////////////////////////////////////////////////////////
$TCA[ 'tx_org_calentrance' ] = array(
  'ctrl' => array(
    'title' => 'LLL:EXT:org/Configuration/Tca/Locallang/tx_org_cal.xml:tx_org_calentrance',
    'label' => 'title',
    'label_alt' => 'value',
    'label_alt_force' => true,
    'tstamp' => 'tstamp',
    'crdate' => 'crdate',
    'cruser_id' => 'cruser_id',
    'default_sortby' => 'ORDER BY title',
    'delete' => 'deleted',
    'enablecolumns' => array(
      'disabled' => 'hidden',
      'fe_group' => 'fe_group',
      'starttime' => 'starttime',
      'endtime' => 'endtime',
    ),
    'dividers2tabs' => true,
    'hideAtCopy' => false,
    'dynamicConfigFile' => t3lib_extMgm::extPath( $_EXTKEY ) . 'tca.php',
    'thumbnail' => 'image',
    'iconfile' => t3lib_extMgm::extRelPath( $_EXTKEY ) . 'Configuration/ExtIcon/calentrance.gif',
    'searchFields' => ''
    . 'title,title_lang_ol,value,tx_org_tax,'
    . 'hidden,starttime,endtime,fe_group'
  ,
  ),
);
// calentrance //////////////////////////////////////////////////////////////////
?>