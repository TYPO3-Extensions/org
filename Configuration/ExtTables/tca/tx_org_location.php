<?php

if ( !defined( 'TYPO3_MODE' ) )
{
  die( 'Access denied.' );
}

$TCA[ 'tx_org_location' ] = array(
  'ctrl' => array(
    'title' => 'LLL:EXT:org/Configuration/Tca/Locallang/tx_org_location.xml:tx_org_location',
    'label' => 'title',
    'label_alt' => 'mail_city',
    'label_alt_force' => true,
    'tstamp' => 'tstamp',
    'crdate' => 'crdate',
    'cruser_id' => 'cruser_id',
    // #i0071, 150822, dwildt, 1-
    //'sortby' => 'sorting',
    'languageField' => 'sys_language_uid',
    'transOrigPointerField' => 'l10n_parent',
    'transOrigDiffSourceField' => 'l10n_diffsource',
    'delete' => 'deleted',
    'enablecolumns' => array(
      'disabled' => 'hidden',
      'fe_group' => 'fe_group',
    ),
    'dividers2tabs' => true,
    'hideAtCopy' => true,
    'dynamicConfigFile' => t3lib_extMgm::extPath( $_EXTKEY ) . 'tca.php',
    'thumbnail' => 'image',
    'iconfile' => t3lib_extMgm::extRelPath( $_EXTKEY ) . 'Configuration/ExtIcon/location.gif',
    'type' => 'type',
    'typeicon_column' => 'type',
    'typeicons' => array(
      'record' => '../typo3conf/ext/org/Configuration/ExtIcon/location.gif',
      'page' => '../typo3conf/ext/org/Configuration/ExtIcon/page.gif',
      'url' => '../typo3conf/ext/org/Configuration/ExtIcon/url.gif',
      'notype' => '../typo3conf/ext/org/Configuration/ExtIcon/notype.gif',
    ),
    'searchFields' => ''
    . 'sys_language_uid,l10n_parent,l10n_diffsource,title,tx_org_locationcat,url,'
    . 'mail_address,mail_street,mail_postcode,mail_city,mail_country,geoupdateprompt,geoupdateforbidden,mail_lat,mail_lon,mail_url,mail_embeddedcode,'
    . 'telephone,ticket_telephone,ticket_url,fax,email,'
    . 'tx_org_cal,'
    . 'pubtrans_stop,pubtrans_url,pubtrans_embeddedcode,citymap_url,citymap_embeddedcode,'
    . 'documents_from_path,documents,documentscaption,documentslayout,documentssize,'
    . 'image,imagecaption,imageseo,imagewidth,imageheight,imageorient,imagecaption,imagecols,imageborder,imagecaption_position,image_link,image_zoom,image_noRows,image_effects,image_compression,'
    . 'embeddedcode,'
    . 'hidden,pages,fe_group,'
    . 'seo_keywords,seo_description',
    // #69254, 150821, dwildt, 1+
    'filter' => 'filter_for_all_fields',
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

$TCA[ 'tx_org_locationcat' ] = array(
  'ctrl' => array(
    'title' => 'LLL:EXT:org/Configuration/Tca/Locallang/tx_org_location.xml:tx_org_locationcat',
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
    'dynamicConfigFile' => t3lib_extMgm::extPath( $_EXTKEY ) . 'tca.php',
    'thumbnail' => 'icons',
    'iconfile' => t3lib_extMgm::extRelPath( $_EXTKEY ) . 'Configuration/ExtIcon/locationcat.gif',
    'treeParentField' => 'uid_parent',
    'searchFields' => 'title,title_lang_ol,uid_parent,icons,icon_offset_x,icon_offset_y,' .
    'hidden,' .
    'image,imagecaption,imageseo',
  )
);
?>