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
    'title' => 'LLL:EXT:org/tca/locallang/tx_org_staff.xml:tx_org_staff',
    'label' => 'title',
    'label_alt'         => 'tx_org_headquarters',
    'label_alt_force'   => true,
    'tstamp' => 'tstamp',
    'crdate' => 'crdate',
    'cruser_id' => 'cruser_id',
    'languageField' => 'sys_language_uid',
    'transOrigPointerField' => 'l10n_parent',
    'transOrigDiffSourceField' => 'l10n_diffsource',
    'default_sortby' => 'ORDER BY title, name_last, name_first',
    'delete' => 'deleted',
    'enablecolumns' => array(
      'disabled' => 'hidden',
      'starttime' => 'starttime',
      'endtime' => 'endtime',
    ),
    'dividers2tabs' => TRUE,
    'dynamicConfigFile' => t3lib_extMgm::extPath($_EXTKEY) . 'tca.php',
    'iconfile' => t3lib_extMgm::extRelPath($_EXTKEY) . 'ext_icon/staff.gif',
    'type' => 'type',
    'searchFields' => ''
    . 'title,reference_number,,short,description,specification,'
    . 'mail_street,mail_zip,mail_city,mail_country,geoupdateprompt,geoupdateforbidden,mail_lat,mail_lon,'
    . 'teaser_title,teaser_short,'
    . 'marginal_title,marginal_short,'
    . 'tx_org_headquarters,fe_user,'
    . 'tx_org_staffgroup,tx_org_staff_sector,'
    . 'image,imagecaption,imageseo,imagewidth,imageheight,imageorient,imagecaption,imagecols,imageborder,imagecaption_position,image_link,image_zoom,image_noRows,image_effects,image_compression,'
    . 'documents_from_path,documents,documentscaption,documentslayout,documentssize,'
    . 'note,'
    . 'hidden,starttime,endtime,'
    ,
  ),
);

$TCA['tx_org_staffgroup'] = array(
  'ctrl' => array(
    'title' => 'LLL:EXT:org/tca/locallang/tx_org_staff.xml:tx_org_staffgroup',
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
    'iconfile' => t3lib_extMgm::extRelPath($_EXTKEY) . 'ext_icon/staff.gif',
    'treeParentField' => 'uid_parent',
    'searchFields' => ''
    . 'title,title_lang_ol'
    ,
  ),
);

?>