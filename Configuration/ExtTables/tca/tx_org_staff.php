<?php

if (!defined('TYPO3_MODE'))
{
  die('Access denied.');
}

////////////////////////////////////////////////////////////////////////////
//
// INDEX
//
// tx_org_staff
// tx_org_staffgroup

$TCA['tx_org_staff'] = array(
  'ctrl' => array(
    'title' => 'LLL:EXT:org/Configuration/Tca/Locallang/tx_org_staff.xml:tx_org_staff',
    'label' => 'name_last',
    'label_alt'         => 'name_first,title,tx_org_headquarters',
    'label_alt_force'   => true,
    'tstamp' => 'tstamp',
    'crdate' => 'crdate',
    'cruser_id' => 'cruser_id',
    'languageField' => 'sys_language_uid',
    'transOrigPointerField' => 'l10n_parent',
    'transOrigDiffSourceField' => 'l10n_diffsource',
    'default_sortby' => 'ORDER BY name_last, name_first, title',
    'delete' => 'deleted',
    'enablecolumns' => array(
      'disabled' => 'hidden',
      'starttime' => 'starttime',
      'endtime' => 'endtime',
    ),
    'dividers2tabs' => TRUE,
    'dynamicConfigFile' => t3lib_extMgm::extPath($_EXTKEY) . 'tca.php',
    'thumbnail'         => 'image',
    'iconfile' => t3lib_extMgm::extRelPath($_EXTKEY) . 'Configuration/ExtIcon/staff.gif',
    'type'              => 'type',
    'typeicon_column'   => 'type',
    'typeicons'         => array(
      'record'  => '../typo3conf/ext/org/Configuration/ExtIcon/staff.gif',
      'page'    => '../typo3conf/ext/org/Configuration/ExtIcon/page.gif',
      'url'     => '../typo3conf/ext/org/Configuration/ExtIcon/url.gif',
      'notype'  => '../typo3conf/ext/org/Configuration/ExtIcon/notype.gif',
    ),
    'searchFields' => ''
    . 'type,page,url,'
    . 'title,'
    . 'name_first,name_last,birthday,gender,'
    . 'bodytext,cols,vita,pi_flexform,'
    . 'tx_org_staffgroup,'
    . 'contact_email,contact_fax,contact_phone,contact_skype,contact_url,'
    . 'image,imagecaption,imageseo,imagewidth,imageheight,imageorient,imagecaption,imagecols,imageborder,imagecaption_position,image_link,image_zoom,image_noRows,image_effects,image_compression,'
    . 'tx_org_downloads,'
    . 'tx_org_headquarters,department'
    . 'tx_org_job,'
    . 'tx_org_service,'
    . 'tx_org_news,'
    . 'tx_org_event,'
    . 'tx_org_location,'
    . 'hidden,starttime,endtime,'
    ,
  ),
);

$TCA['tx_org_staffgroup'] = array(
  'ctrl' => array(
    'title' => 'LLL:EXT:org/Configuration/Tca/Locallang/tx_org_staff.xml:tx_org_staffgroup',
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
    'iconfile' => t3lib_extMgm::extRelPath($_EXTKEY) . 'Configuration/ExtIcon/staff.gif',
    'treeParentField' => 'uid_parent',
    'searchFields' => ''
    . 'title,title_lang_ol'
    ,
  ),
);

?>