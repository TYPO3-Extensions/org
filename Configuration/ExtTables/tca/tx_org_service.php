<?php

if (!defined('TYPO3_MODE'))
{
  die('Access denied.');
}

////////////////////////////////////////////////////////////////////////////
//
// INDEX
//
// tx_org_service
// tx_org_servicecat
// tx_org_servicesector
// tx_org_servicetargetgroup

$TCA['tx_org_service'] = array(
  'ctrl' => array(
    'title' => 'LLL:EXT:org/Resources/Private/Language/tx_org_service.xml:tx_org_service',
    'label' => 'title',
    'label_alt'         => 'tx_org_headquarters',
    'label_alt_force'   => true,
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
      'starttime' => 'starttime',
      'endtime' => 'endtime',
    ),
    'dividers2tabs' => TRUE,
    'dynamicConfigFile' => t3lib_extMgm::extPath($_EXTKEY) . 'tca.php',
    'iconfile' => t3lib_extMgm::extRelPath($_EXTKEY) . 'Configuration/ExtIcon/service.gif',
    'thumbnail'         => 'image',
    'type'              => 'type',
    'typeicon_column'   => 'type',
    'typeicons'         => array(
      'record'  => '../typo3conf/ext/org/Configuration/ExtIcon/service.gif',
      'page'    => '../typo3conf/ext/org/Configuration/ExtIcon/page.gif',
      'url'     => '../typo3conf/ext/org/Configuration/ExtIcon/url.gif',
      'notype'  => '../typo3conf/ext/org/Configuration/ExtIcon/notype.gif',
    ),
    'searchFields' => ''
    . 'title,reference_number,,short,description,specification,'
    . 'mail_street,mail_zip,mail_city,mail_country,geoupdateprompt,geoupdateforbidden,mail_lat,mail_lon,'
    . 'teaser_title,teaser_short,'
    . 'marginal_title,marginal_short,'
    . 'tx_org_headquarters,'
    . 'tx_org_servicecat,tx_org_servicesector,'
    . 'image,imagecaption,imageseo,imagewidth,imageheight,imageorient,imagecaption,imagecols,imageborder,imagecaption_position,image_link,image_zoom,image_noRows,image_effects,image_compression,'
    . 'documents_from_path,documents,documentscaption,documentslayout,documentssize,'
    . 'note,'
    . 'hidden,starttime,endtime,'
    ,
    // #69255, 150821, dwildt, 1+
    'filter' => 'filter_for_all_fields',
    'tx_browser' => array(
      'geoupdate' => array(
        'address' => array(
          'country' => 'mail_country',
          'areaLevel1' => '',
          'areaLevel2' => '',
          'location' => array(
            'zip' => 'mail_zip',
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

$TCA['tx_org_servicecat'] = array(
  'ctrl' => array(
    'title' => 'LLL:EXT:org/Resources/Private/Language/tx_org_service.xml:tx_org_servicecat',
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
    'iconfile' => t3lib_extMgm::extRelPath($_EXTKEY) . 'Configuration/ExtIcon/service.gif',
    'thumbnail' => 'icons',
    'treeParentField' => 'uid_parent',
    'searchFields' => ''
    . 'title,title_lang_ol'
    ,
  ),
);

$TCA['tx_org_servicesector'] = array(
  'ctrl' => array(
    'title' => 'LLL:EXT:org/Resources/Private/Language/tx_org_service.xml:tx_org_servicesector',
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
    'iconfile' => t3lib_extMgm::extRelPath($_EXTKEY) . 'Configuration/ExtIcon/service.gif',
    'thumbnail' => 'icons',
    'treeParentField' => 'uid_parent',
    'searchFields' => ''
    . 'title,title_lang_ol'
    ,
  ),
);

$TCA['tx_org_servicetargetgroup'] = array(
  'ctrl' => array(
    'title' => 'LLL:EXT:org/Resources/Private/Language/tx_org_service.xml:tx_org_servicetargetgroup',
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
    'iconfile' => t3lib_extMgm::extRelPath($_EXTKEY) . 'Configuration/ExtIcon/service.gif',
    'thumbnail' => 'icons',
    'treeParentField' => 'uid_parent',
    'searchFields' => ''
    . 'title,title_lang_ol'
    ,
  ),
);
?>