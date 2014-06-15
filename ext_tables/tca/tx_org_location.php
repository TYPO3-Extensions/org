<?php

if (!defined('TYPO3_MODE'))
{
  die('Access denied.');
}

$TCA['tx_org_location'] = array(
  'ctrl' => array(
    'title' => 'LLL:EXT:org/tca/locallang/tx_org_location.xml:tx_org_location',
    'label' => 'title',
    'label_alt' => 'mail_city',
    'label_alt_force' => true,
    'tstamp' => 'tstamp',
    'crdate' => 'crdate',
    'cruser_id' => 'cruser_id',
    'sortby' => 'sorting',
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
    'dynamicConfigFile' => t3lib_extMgm::extPath($_EXTKEY) . 'tca.php',
    'thumbnail' => 'image',
    'iconfile' => t3lib_extMgm::extRelPath($_EXTKEY) . 'ext_icon/location.gif',
    'searchFields' => ''
    . 'sys_language_uid,l10n_parent,l10n_diffsource,title,url,'
    . 'mail_address,mail_street,mail_postcode,mail_city,mail_country,geoupdateprompt,geoupdateforbidden,mail_lat,mail_lon,mail_url,mail_embeddedcode,' .
    'telephone,ticket_telephone,ticket_url,fax,email,' .
    'tx_org_cal,' .
    'pubtrans_stop,pubtrans_url,pubtrans_embeddedcode,citymap_url,citymap_embeddedcode,' .
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
?>