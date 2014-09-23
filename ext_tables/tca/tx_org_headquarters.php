<?php

if (!defined('TYPO3_MODE'))
{
  die('Access denied.');
}



////////////////////////////////////////////////////////////////////////////
//
// INDEX
//
// headquarters
// headquarterscat
// headquartersheadquarters
//
// headquarters //////////////////////////////////////////////////////////////////
$TCA['tx_org_headquarters'] = array(
  'ctrl' => array(
    'title' => 'LLL:EXT:org/tca/locallang/tx_org_headquarters.xml:tx_org_headquarters',
    'label' => 'title',
    'tstamp' => 'tstamp',
    'crdate' => 'crdate',
    'cruser_id' => 'cruser_id',
    'languageField' => 'sys_language_uid',
    'transOrigPointerField' => 'l10n_parent',
    'transOrigDiffSourceField' => 'l10n_diffsource',
    'default_sortby' => 'ORDER BY title',
//    'sortby'    => 'sorting',
    'delete' => 'deleted',
    'enablecolumns' => array(
      'disabled' => 'hidden',
      'fe_group' => 'fe_group',
    ),
    'dividers2tabs' => true,
    'hideAtCopy' => true,
    'dynamicConfigFile' => t3lib_extMgm::extPath($_EXTKEY) . 'tca.php',
    'thumbnail' => 'image',
    'iconfile' => t3lib_extMgm::extRelPath($_EXTKEY) . 'ext_icon/headquarters.gif',
    // #58884, 140516, dwildt, 1+
    'treeParentField' => 'uid_parent',
    'type'              => 'type',
    'typeicon_column'   => 'type',
    'typeicons'         => array(
      'record'  => '../typo3conf/ext/org/ext_icon/headquarters.gif',
      'page'    => '../typo3conf/ext/org/ext_icon/page.gif',
      'url'     => '../typo3conf/ext/org/ext_icon/url.gif',
      'notype'  => '../typo3conf/ext/org/ext_icon/notype.gif',
    ),
    'searchFields' => ''
    . 'sys_language_uid,l10n_parent,l10n_diffsource,'
    . 'title,uid_parent,tx_org_headquarterscat,'
    . 'mail_address,mail_street,mail_postcode,mail_city,mail_country,mail_lat,mail_lon,mail_url,mail_embeddedcode,'
    . 'postbox_postbox,postbox_postcode,postbox_city,' .
    'telephone,fax,email,' .
    'pubtrans_stop,pubtrans_url,pubtrans_embeddedcode,' .
    'documents_from_path,documents,documentscaption,documentslayout,documentssize,' .
    'image,imagecaption,imageseo,imagewidth,imageheight,imageorient,imagecaption,imagecols,imageborder,imagecaption_position,image_link,image_zoom,image_noRows,image_effects,image_compression,' .
    'embeddedcode,' .
    'hidden,pages,fe_group,' .
    'keywords,description',
    'tx_browser' => array(
      'geoupdate' => array(
        'address' => array(
          'country' => 'mail_country',
          'areaLevel1' => '',
          'areaLevel2' => '',
          'location' => array(
            'zip' => 'mail_postcode',
            'city' => 'mail_city',
          ),
          'street' => array(
            'name' => 'mail_street',
            'number' => null,
          ),
        ),
        'api' => array(
          'prompt' => 'geoupdateprompt',
          'forbidden' => 'geoupdateforbidden',
        ),
        'geodata' => array(
          'lat' => 'mail_lat',
          'lon' => 'mail_lon',
        ),
        'update' => $extManagerGeocodingEnabled,
      ),
    ),
  ),
);
if (!$bool_exclude_tx_org_company)
{
  $TCA['tx_org_headquarters']['ctrl']['title'] = 'LLL:EXT:org/tca/locallang/tx_org_headquarters.xml:tx_org_company';
}
// headquarters //////////////////////////////////////////////////////////////////
//
// headquarterscat ////////////////////////////////////////////////////////////////////
$TCA['tx_org_headquarterscat'] = array(
  'ctrl' => array(
    'title' => 'LLL:EXT:org/tca/locallang/tx_org_headquarters.xml:tx_org_headquarterscat',
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
    'dynamicConfigFile' => t3lib_extMgm::extPath($_EXTKEY) . 'tca.php',
    'thumbnail' => 'icons',
    'iconfile' => t3lib_extMgm::extRelPath($_EXTKEY) . 'ext_icon/headquarterscat.gif',
    // #58885, 140516, dwildt, 1+
    'treeParentField' => 'uid_parent',
    'searchFields' => 'title,title_lang_ol,uid_parent,icons,icon_offset_x,icon_offset_y,' .
    'hidden,' .
    'image,imagecaption,imageseo',
  )
);
// headquarterscat ////////////////////////////////////////////////////////////////////
?>