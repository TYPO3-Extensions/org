<?php

if ( !defined( 'TYPO3_MODE' ) )
{
  die( 'Access denied.' );
}

// Configuration by the extension manager
require_once( PATH_typo3conf . 'ext/org/Configuration/ExtensionManager/geocoding.php' );
require_once( PATH_typo3conf . 'ext/org/Configuration/ExtensionManager/simplifyer.php' );
// Default values and wizards
require_once( PATH_typo3conf . 'ext/org/Configuration/TCA/Defaults/defaultValues.php' );

return array(
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
    'iconfile' => t3lib_extMgm::extRelPath($_EXTKEY) . 'Resources/Public/Images/Icons/ExtIcon/service.gif',
    'thumbnail'         => 'image',
    'type'              => 'type',
    'typeicon_column'   => 'type',
    'typeicons'         => array(
      'record'  => '../typo3conf/ext/org/Resources/Public/Images/Icons/ExtIcon/service.gif',
      'page'    => '../typo3conf/ext/org/Resources/Public/Images/Icons/ExtIcon/page.gif',
      'url'     => '../typo3conf/ext/org/Resources/Public/Images/Icons/ExtIcon/url.gif',
      'notype'  => '../typo3conf/ext/org/Resources/Public/Images/Icons/ExtIcon/notype.gif',
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
  'interface' => array(
    'showRecordFieldList' => ''
    . 'type,page,url,'
    . 'title,reference_number,description,'
    . 'mail_address,mail_street,mail_zip,mail_city,mail_country,geoupdateprompt,geoupdateforbidden,mail_lat,mail_lon,'
    . 'teaser_title,teaser_short,'
    . 'marginal_title,marginal_short,'
    . 'tx_org_headquarters,'
    . 'tx_org_staff,'
    . 'tx_org_servicecat,tx_org_servicesector,tx_org_servicetargetgroup,'
    . 'image,imagecaption,imageseo,imagewidth,imageheight,imageorient,imagecaption,imagecols,imageborder,imagecaption_position,image_link,image_zoom,image_noRows,image_effects,image_compression,'
    . 'documents_from_path,documents,documentscaption,documentslayout,documentssize,'
    . 'hidden,starttime,endtime,'
  ,
  ),
  'columns' => array(
    'sys_language_uid' => array(
      'exclude' => 1,
      'label' => 'LLL:EXT:lang/locallang_general.php:LGL.language',
      'config' => array(
        'type' => 'select',
        'foreign_table' => 'sys_language',
        'foreign_table_where' => 'AND sys_language.hidden = 0 ORDER BY sys_language.title',
        'items' => array(
          array( 'LLL:EXT:lang/locallang_general.php:LGL.allLanguages', -1 ),
          array( 'LLL:EXT:lang/locallang_general.php:LGL.default_value', 0 ),
        ),
      ),
    ),
    'l10n_parent' => array(
      'displayCond' => 'FIELD:sys_language_uid:>:0',
      'exclude' => 1,
      'label' => 'LLL:EXT:lang/locallang_general.php:LGL.l18n_parent',
      'config' => array(
        'type' => 'select',
        'items' => array(
          array( '', 0 ),
        ),
        'foreign_table' => 'tx_org_cal',
        'foreign_table_where' => 'AND tx_org_cal.uid=###REC_FIELD_l10n_parent### AND tx_org_cal.sys_language_uid IN (-1,0)',
      ),
    ),
    'l10n_diffsource' => array(
      'config' => array(
        'type' => 'passthrough'
      ),
    ),
    'type' => array(
      'exclude' => $bool_exclude_default,
      'l10n_mode' => 'exclude',
      'label' => 'LLL:EXT:org/Resources/Private/Language/locallang_db.xml:type',
      'config' => array(
        'type' => 'select',
        'items' => array(
          'record' => array(
            '0' => 'LLL:EXT:org/Resources/Private/Language/locallang_db.xml:type_record',
            '1' => 'record',
            '2' => 'EXT:org/Resources/Public/Images/Icons/ExtIcon/service.gif',
          ),
          'page' => array(
            '0' => 'LLL:EXT:org/Resources/Private/Language/locallang_db.xml:type_page',
            '1' => 'page',
            '2' => 'EXT:org/Resources/Public/Images/Icons/ExtIcon/page.gif',
          ),
          'url' => array(
            '0' => 'LLL:EXT:org/Resources/Private/Language/locallang_db.xml:type_url',
            '1' => 'url',
            '2' => 'EXT:org/Resources/Public/Images/Icons/ExtIcon/url.gif',
          ),
          'notype' => array(
            '0' => 'LLL:EXT:org/Resources/Private/Language/locallang_db.xml:type_notype',
            '1' => 'notype',
            '2' => 'EXT:org/Resources/Public/Images/Icons/ExtIcon/notype.gif',
          ),
        ),
        'default' => 'record',
      ),
      // #69255, 150821, dwildt, 1+
      'config_filter' => array(
        'type' => 'select',
        'items' => array(
          'empty' => array(
            '0' => '',
            '1' => '',
          ),
          'record' => array(
            '0' => 'LLL:EXT:org/Resources/Private/Language/locallang_db.xml:type_record',
            '1' => 'record',
          ),
          'page' => array(
            '0' => 'LLL:EXT:org/Resources/Private/Language/locallang_db.xml:type_page',
            '1' => 'page',
          ),
          'url' => array(
            '0' => 'LLL:EXT:org/Resources/Private/Language/locallang_db.xml:type_url',
            '1' => 'url',
          ),
          'notype' => array(
            '0' => 'LLL:EXT:org/Resources/Private/Language/locallang_db.xml:type_notype',
            '1' => 'notype',
          ),
        ),
      ),
    ),
    'page' => array(
      'exclude' => $bool_exclude_default,
//      'l10n_mode' => 'exclude',
      'label' => 'LLL:EXT:org/Resources/Private/Language/locallang_db.xml:page',
      'config' => array(
        'type' => 'group',
        'internal_type' => 'db',
        'allowed' => 'pages',
        'size' => '1',
        'maxitems' => '1',
        'minitems' => '1',
        'show_thumbs' => '1'
      ),
    ),
    'url' => array(
      'exclude' => $bool_exclude_default,
//      'l10n_mode' => 'exclude',
      'label' => 'LLL:EXT:org/Resources/Private/Language/locallang_db.xml:url',
      'config' => array(
        'type' => 'input',
        'size' => '80',
        'max' => '256',
        'checkbox' => '',
        'eval' => 'trim,required',
        'wizards' => array(
          '_PADDING' => '2',
          'link' => array(
            'type' => 'popup',
            'title' => 'Link',
            'icon' => 'link_popup.gif',
            'script' => 'browse_links.php?mode=wizard',
            'JSopenParams' => $JSopenParams,
          ),
        ),
        'softref' => 'typolink',
      ),
    ),
    'title' => array(
      'exclude' => 0,
      'label' => 'LLL:EXT:org/Resources/Private/Language/tx_org_service.xml:tx_org_service.title',
      'l10n_mode' => 'prefixLangTitle',
      'config' => array(
        'type' => 'input',
        'size' => '30',
        'eval' => 'required',
      )
    ),
    'reference_number' => array(
      'l10n_mode' => 'exclude',
      'exclude' => 0,
      'label' => 'LLL:EXT:org/Resources/Private/Language/tx_org_service.xml:tx_org_service.reference_number',
      'config' => array(
        'type' => 'input',
        'size' => '30',
      )
    ),
    'description' => array(
      'exclude' => 0,
      'label' => 'LLL:EXT:org/Resources/Private/Language/tx_org_service.xml:tx_org_service.description',
      'config' => array(
        'type' => 'text',
        'cols' => '30',
        'rows' => '5',
        'wizards' => array(
          '_PADDING' => 2,
          'RTE' => array(
            'notNewRecords' => 1,
            'RTEonly' => 1,
            'type' => 'script',
            'title' => 'LLL:EXT:org/Resources/Private/Language/locallang_db.xml:wizard.rte.fullscreen',
            'icon' => 'wizard_rte2.gif',
            'script' => 'wizard_rte.php',
          ),
        ),
      ),
    ),
    'mail_address' => array(
      'exclude' => $bool_exclude_default,
      'l10n_mode' => 'exclude',
      'label' => 'LLL:EXT:org/Resources/Private/Language/tx_org_service.xml:tx_org_service.mail_address',
      'config' => $conf_text_30_05,
    ),
    'mail_street' => array(
      'exclude' => $bool_exclude_default,
//      'l10n_mode' => 'exclude',
      'label' => 'LLL:EXT:org/Resources/Private/Language/tx_org_service.xml:tx_org_service.mail_street',
      'config' => array(
        'type' => 'input',
        'size' => '60',
        'eval' => 'trim'
      ),
    ),
    'mail_zip' => array(
      'exclude' => $bool_exclude_default,
//      'l10n_mode' => 'exclude',
      'label' => 'LLL:EXT:org/Resources/Private/Language/tx_org_service.xml:tx_org_service.mail_zip',
      'config' => array(
        'type' => 'input',
        'size' => '20',
        'eval' => 'trim'
      ),
    ),
    'mail_city' => array(
      'exclude' => $bool_exclude_default,
//      'l10n_mode' => 'exclude',
      'label' => 'LLL:EXT:org/Resources/Private/Language/tx_org_service.xml:tx_org_service.mail_city',
      'config' => array(
        'type' => 'input',
        'size' => '40',
        'eval' => 'trim'
      ),
    ),
    'mail_country' => array(
      'exclude' => $bool_exclude_default,
//      'l10n_mode' => 'exclude',
      'label' => 'LLL:EXT:org/Resources/Private/Language/tx_org_service.xml:tx_org_service.mail_country',
      'config' => array(
        'type' => 'input',
        'size' => '30',
        'eval' => 'trim'
      ),
    ),
    'mail_lat' => array(
      'exclude' => $bool_exclude_default,
      'l10n_mode' => 'exclude',
      'label' => 'LLL:EXT:org/Resources/Private/Language/tx_org_service.xml:tx_org_service.mail_lat',
      'config' => array(
        'type' => 'input',
        'size' => '30',
        'eval' => 'trim'
      ),
    ),
    'mail_lon' => array(
      'exclude' => $bool_exclude_default,
      'l10n_mode' => 'exclude',
      'label' => 'LLL:EXT:org/Resources/Private/Language/tx_org_service.xml:tx_org_service.mail_lon',
      'config' => array(
        'type' => 'input',
        'size' => '30',
        'eval' => 'trim'
      ),
    ),
    'geoupdateprompt' => array(
      'exclude' => 0,
      'label' => 'LLL:EXT:org/Resources/Private/Language/tx_org_service.xml:tx_org_service.geoupdateprompt',
      'config' => $conf_text_50_10,
    ),
    'geoupdateforbidden' => array(
      'exclude' => 0,
      'label' => 'LLL:EXT:org/Resources/Private/Language/tx_org_service.xml:tx_org_service.geoupdateforbidden',
      'config' => array(
        'type' => 'check',
        'default' => '0'
      )
    ),
    'teaser_title' => array(
      'exclude' => $bool_exclude_default,
      'l10n_mode' => 'prefixLangTitle',
      'label' => 'LLL:EXT:org/Resources/Private/Language/tx_org_service.xml:tx_org_service.teaser_title',
      'config' => $conf_input_30_trim,
    ),
    'teaser_short' => array(
      'exclude' => $bool_exclude_default,
      'l10n_mode' => 'prefixLangTitle',
      'label' => 'LLL:EXT:org/Resources/Private/Language/tx_org_service.xml:tx_org_service.teaser_short',
      'config' => $conf_text_50_10,
    ),
    'marginal_title' => array(
      'exclude' => $bool_exclude_default,
      'l10n_mode' => 'prefixLangTitle',
      'label' => 'LLL:EXT:org/Resources/Private/Language/tx_org_service.xml:tx_org_service.marginal_title',
      'config' => $conf_input_30_trim,
    ),
    'marginal_short' => array(
      'exclude' => $bool_exclude_default,
      'l10n_mode' => 'prefixLangTitle',
      'label' => 'LLL:EXT:org/Resources/Private/Language/tx_org_service.xml:tx_org_service.marginal_short',
      'config' => $conf_text_50_10,
    ),
    'tx_org_servicecat' => array(
      'exclude' => 0,
      'l10n_mode' => 'mergeIfNotBlank',
      'label' => 'LLL:EXT:org/Resources/Private/Language/tx_org_service.xml:tx_org_service.tx_org_servicecat',
      'config' => array(
        'type' => 'select',
        'size' => 10,
        'minitems' => 0,
        'maxitems' => 99,
        'MM' => 'tx_org_mm_all',
        "MM_match_fields" => array(
          'table_local' => 'tx_org_service',
          'table_foreign' => 'tx_org_servicecat'
        ),
        "MM_insert_fields" => array(
          'table_local' => 'tx_org_service',
          'table_foreign' => 'tx_org_servicecat'
        ),
        'foreign_table' => 'tx_org_servicecat',
        'foreign_table_where' => 'AND tx_org_servicecat.' . $str_store_record_conf . ' AND tx_org_servicecat.deleted = 0 AND tx_org_servicecat.hidden = 0 ORDER BY tx_org_servicecat.title',
        'form_type' => 'user',
        'userFunc' => 'tx_cpstcatree->getTree',
        'treeView' => 1,
        'expandable' => 1,
        'expandFirst' => 0,
        'expandAll' => 0,
        'items' => array(
          '0' => array(
            '0' => '---',
            '1' => '',
          ),
        ),
        'wizards' => array(
          '_PADDING' => 2,
          '_VERTICAL' => 0,
          'add' => array(
            'type' => 'script',
            'title' => 'LLL:EXT:org/Resources/Private/Language/tx_org_service.xml:wizard.tx_org_servicecat.add',
            'icon' => 'add.gif',
            'params' => array(
              'table' => 'tx_org_servicecat',
              'pid' => $str_marker_pid,
              'setValue' => 'prepend'
            ),
            'script' => 'wizard_add.php',
          ),
          'list' => array(
            'type' => 'script',
            'title' => 'LLL:EXT:org/Resources/Private/Language/tx_org_service.xml:wizard.tx_org_servicecat.list',
            'icon' => 'list.gif',
            'params' => array(
              'table' => 'tx_org_servicecat',
              'pid' => $str_marker_pid,
            ),
            'script' => 'wizard_list.php',
          ),
          'edit' => array(
            'type' => 'popup',
            'title' => 'LLL:EXT:org/Resources/Private/Language/tx_org_service.xml:wizard.tx_org_servicecat.edit',
            'script' => 'wizard_edit.php',
            'popup_onlyOpenIfSelected' => 1,
            'icon' => 'edit2.gif',
            'JSopenParams' => 'height=350,width=580,status=0,menubar=0,scrollbars=1',
          ),
        ),
      ),
      // #69255, 150821, dwildt, +
      'config_filter' => array(
        'type' => 'select',
        'size' => 1,
        'MM' => 'tx_org_mm_all',
        "MM_match_fields" => array(
          'table_local' => 'tx_org_service',
          'table_foreign' => 'tx_org_servicecat'
        ),
        "MM_insert_fields" => array(
          'table_local' => 'tx_org_service',
          'table_foreign' => 'tx_org_servicecat'
        ),
        'foreign_table' => 'tx_org_servicecat',
        'foreign_table_where' => 'AND tx_org_servicecat.' . $str_store_record_conf . ' AND tx_org_servicecat.deleted = 0 AND tx_org_servicecat.hidden = 0 ORDER BY tx_org_servicecat.title',
        'items' => array(
          'empty' => array(
            '0' => '',
            '1' => '',
          ),
        ),
      ),
    ),
    'tx_org_servicesector' => array(
      'exclude' => 0,
      'l10n_mode' => 'mergeIfNotBlank',
      'label' => 'LLL:EXT:org/Resources/Private/Language/tx_org_service.xml:tx_org_service.tx_org_servicesector',
      'config' => array(
        'type' => 'select',
        'size' => 10,
        'minitems' => 0,
        'maxitems' => 99,
        'MM' => 'tx_org_mm_all',
        "MM_match_fields" => array(
          'table_local' => 'tx_org_service',
          'table_foreign' => 'tx_org_servicesector'
        ),
        "MM_insert_fields" => array(
          'table_local' => 'tx_org_service',
          'table_foreign' => 'tx_org_servicesector'
        ),
        'foreign_table' => 'tx_org_servicesector',
        'foreign_table_where' => 'AND tx_org_servicesector.' . $str_store_record_conf . '  AND tx_org_servicesector.deleted = 0 AND tx_org_servicesector.hidden = 0 ORDER BY tx_org_servicesector.title',
        'form_type' => 'user',
        'userFunc' => 'tx_cpstcatree->getTree',
        'treeView' => 1,
        'expandable' => 1,
        'expandFirst' => 0,
        'expandAll' => 0,
        'items' => array(
          '0' => array(
            '0' => '---',
            '1' => '',
          ),
        ),
        'wizards' => array(
          '_PADDING' => 2,
          '_VERTICAL' => 0,
          'add' => array(
            'type' => 'script',
            'title' => 'LLL:EXT:org/Resources/Private/Language/tx_org_service.xml:wizard.tx_org_servicesector.add',
            'icon' => 'add.gif',
            'params' => array(
              'table' => 'tx_org_servicesector',
              'pid' => $str_marker_pid,
              'setValue' => 'prepend'
            ),
            'script' => 'wizard_add.php',
          ),
          'list' => array(
            'type' => 'script',
            'title' => 'LLL:EXT:org/Resources/Private/Language/tx_org_service.xml:wizard.tx_org_servicesector.list',
            'icon' => 'list.gif',
            'params' => array(
              'table' => 'tx_org_servicesector',
              'pid' => $str_marker_pid,
            ),
            'script' => 'wizard_list.php',
          ),
          'edit' => array(
            'type' => 'popup',
            'title' => 'LLL:EXT:org/Resources/Private/Language/tx_org_service.xml:wizard.tx_org_servicesector.edit',
            'script' => 'wizard_edit.php',
            'popup_onlyOpenIfSelected' => 1,
            'icon' => 'edit2.gif',
            'JSopenParams' => 'height=350,width=580,status=0,menubar=0,scrollbars=1',
          ),
        ),
      ),
      // #69255, 150821, dwildt, +
      'config_filter' => array(
        'type' => 'select',
        'size' => 1,
        'MM' => 'tx_org_mm_all',
        "MM_match_fields" => array(
          'table_local' => 'tx_org_service',
          'table_foreign' => 'tx_org_servicesector'
        ),
        "MM_insert_fields" => array(
          'table_local' => 'tx_org_service',
          'table_foreign' => 'tx_org_servicesector'
        ),
        'foreign_table' => 'tx_org_servicesector',
        'foreign_table_where' => 'AND tx_org_servicesector.' . $str_store_record_conf . '  AND tx_org_servicesector.deleted = 0 AND tx_org_servicesector.hidden = 0 ORDER BY tx_org_servicesector.title',
        'items' => array(
          'empty' => array(
            '0' => '',
            '1' => '',
          ),
        ),
      ),
    ),
    'tx_org_servicetargetgroup' => array(
      'exclude' => 0,
      'l10n_mode' => 'mergeIfNotBlank',
      'label' => 'LLL:EXT:org/Resources/Private/Language/tx_org_service.xml:tx_org_service.tx_org_servicetargetgroup',
      'config' => array(
        'type' => 'select',
        'size' => 10,
        'minitems' => 0,
        'maxitems' => 99,
        'MM' => 'tx_org_mm_all',
        "MM_match_fields" => array(
          'table_local' => 'tx_org_service',
          'table_foreign' => 'tx_org_servicetargetgroup'
        ),
        "MM_insert_fields" => array(
          'table_local' => 'tx_org_service',
          'table_foreign' => 'tx_org_servicetargetgroup'
        ),
        'foreign_table' => 'tx_org_servicetargetgroup',
        'foreign_table_where' => 'AND tx_org_servicetargetgroup.' . $str_store_record_conf . '  AND tx_org_servicetargetgroup.deleted = 0 AND tx_org_servicetargetgroup.hidden = 0 ORDER BY tx_org_servicetargetgroup.title',
        'form_type' => 'user',
        'userFunc' => 'tx_cpstcatree->getTree',
        'treeView' => 1,
        'expandable' => 1,
        'expandFirst' => 0,
        'expandAll' => 0,
        'items' => array(
          '0' => array(
            '0' => '---',
            '1' => '',
          ),
        ),
        'wizards' => array(
          '_PADDING' => 2,
          '_VERTICAL' => 0,
          'add' => array(
            'type' => 'script',
            'title' => 'LLL:EXT:org/Resources/Private/Language/tx_org_service.xml:wizard.tx_org_servicetargetgroup.add',
            'icon' => 'add.gif',
            'params' => array(
              'table' => 'tx_org_servicetargetgroup',
              'pid' => $str_marker_pid,
              'setValue' => 'prepend'
            ),
            'script' => 'wizard_add.php',
          ),
          'list' => array(
            'type' => 'script',
            'title' => 'LLL:EXT:org/Resources/Private/Language/tx_org_service.xml:wizard.tx_org_servicetargetgroup.list',
            'icon' => 'list.gif',
            'params' => array(
              'table' => 'tx_org_servicetargetgroup',
              'pid' => $str_marker_pid,
            ),
            'script' => 'wizard_list.php',
          ),
          'edit' => array(
            'type' => 'popup',
            'title' => 'LLL:EXT:org/Resources/Private/Language/tx_org_service.xml:wizard.tx_org_servicetargetgroup.edit',
            'script' => 'wizard_edit.php',
            'popup_onlyOpenIfSelected' => 1,
            'icon' => 'edit2.gif',
            'JSopenParams' => 'height=350,width=580,status=0,menubar=0,scrollbars=1',
          ),
        ),
      ),
      // #69255, 150821, dwildt, +
      'config_filter' => array(
        'type' => 'select',
        'size' => 1,
        'MM' => 'tx_org_mm_all',
        "MM_match_fields" => array(
          'table_local' => 'tx_org_service',
          'table_foreign' => 'tx_org_servicetargetgroup'
        ),
        "MM_insert_fields" => array(
          'table_local' => 'tx_org_service',
          'table_foreign' => 'tx_org_servicetargetgroup'
        ),
        'foreign_table' => 'tx_org_servicetargetgroup',
        'foreign_table_where' => 'AND tx_org_servicetargetgroup.' . $str_store_record_conf . '  AND tx_org_servicetargetgroup.deleted = 0 AND tx_org_servicetargetgroup.hidden = 0 ORDER BY tx_org_servicetargetgroup.title',
        'items' => array(
          'empty' => array(
            '0' => '',
            '1' => '',
          ),
        ),
      ),
    ),
    'tx_org_headquarters' => array(
      'exclude' => 0,
      'l10n_mode' => 'mergeIfNotBlank',
      'label' => 'LLL:EXT:org/Resources/Private/Language/tx_org_service.xml:tx_org_service.tx_org_headquarters',
      'config' => array(
        'type' => 'select',
        'form_type' => 'user',
        'userFunc' => 'tx_cpstcatree->getTree',
        'treeView' => 1,
        'expandable' => 1,
        'expandFirst' => 0,
        'expandAll' => 0,
        'size' => 20,
        'minitems' => 0,
        'maxitems' => 99,
        'items' => array(
          '0' => array(
            '0' => '',
            '1' => '',
          ),
        ),
        'MM' => 'tx_org_mm_all',
        'MM_opposite_field' => 'tx_org_service',
        "MM_match_fields" => array(
          'table_local' => 'tx_org_headquarters',
          'table_foreign' => 'tx_org_service'
        ),
        "MM_insert_fields" => array(
          'table_local' => 'tx_org_headquarters',
          'table_foreign' => 'tx_org_service'
        ),
        'foreign_table' => 'tx_org_headquarters',
        'foreign_table_where' => 'AND tx_org_headquarters.' . $str_store_record_conf . ' AND tx_org_headquarters.deleted = 0 AND tx_org_headquarters.hidden = 0 AND tx_org_headquarters.sys_language_uid=###REC_FIELD_sys_language_uid### ORDER BY tx_org_headquarters.title',
        'selectedListStyle' => $listStyleWidth,
        'itemListStyle' => $listStyleWidth,
      ),
      // #69255, 150821, dwildt, +
      'config_filter' => array(
        'type' => 'select',
        'size' => 1,
        'MM' => 'tx_org_mm_all',
        'MM_opposite_field' => 'tx_org_service',
        "MM_match_fields" => array(
          'table_local' => 'tx_org_headquarters',
          'table_foreign' => 'tx_org_service'
        ),
        "MM_insert_fields" => array(
          'table_local' => 'tx_org_headquarters',
          'table_foreign' => 'tx_org_service'
        ),
        'foreign_table' => 'tx_org_headquarters',
        'foreign_table_where' => 'AND tx_org_headquarters.' . $str_store_record_conf . ' AND tx_org_headquarters.deleted = 0 AND tx_org_headquarters.hidden = 0 AND tx_org_headquarters.sys_language_uid=###REC_FIELD_sys_language_uid### ORDER BY tx_org_headquarters.title',
        'items' => array(
          'empty' => array(
            '0' => '',
            '1' => '',
          ),
        ),
      ),
    ),
    'tx_org_staff' => array(
      'exclude' => 0,
      'l10n_mode' => 'mergeIfNotBlank',
      'label' => 'LLL:EXT:org/Resources/Private/Language/tx_org_service.xml:tx_org_service.tx_org_staff',
      'config' => array(
        'type' => 'select',
        'size' => 20,
        'minitems' => 0,
        'maxitems' => 99,
        'items' => array(
          '0' => array(
            '0' => '',
            '1' => '',
          ),
        ),
        'MM' => 'tx_org_mm_all',
        "MM_match_fields" => array(
          'table_local' => 'tx_org_service',
          'table_foreign' => 'tx_org_staff'
        ),
        "MM_insert_fields" => array(
          'table_local' => 'tx_org_service',
          'table_foreign' => 'tx_org_staff'
        ),
        'foreign_table' => 'tx_org_staff',
        'foreign_table_where' => 'AND tx_org_staff.' . $str_store_record_conf . ' AND tx_org_staff.deleted = 0 AND tx_org_staff.hidden = 0 AND tx_org_staff.sys_language_uid=###REC_FIELD_sys_language_uid### ORDER BY tx_org_staff.title',
        'selectedListStyle' => $listStyleWidth,
        'itemListStyle' => $listStyleWidth,
      ),
      // #69255, 150821, dwildt, +
      'config_filter' => array(
        'type' => 'select',
        'size' => 1,
        'MM' => 'tx_org_mm_all',
        "MM_match_fields" => array(
          'table_local' => 'tx_org_service',
          'table_foreign' => 'tx_org_staff'
        ),
        "MM_insert_fields" => array(
          'table_local' => 'tx_org_service',
          'table_foreign' => 'tx_org_staff'
        ),
        'foreign_table' => 'tx_org_staff',
        'foreign_table_where' => 'AND tx_org_staff.' . $str_store_record_conf . ' AND tx_org_staff.deleted = 0 AND tx_org_staff.hidden = 0 AND tx_org_staff.sys_language_uid=###REC_FIELD_sys_language_uid### ORDER BY tx_org_staff.title',
        'items' => array(
          'empty' => array(
            '0' => '',
            '1' => '',
          ),
        ),
      ),
    ),
    'image' => array(
      'exclude' => $bool_exclude_default,
      'label' => 'LLL:EXT:org/Resources/Private/Language/locallang_db.xml:tca_phrase.image',
      'config' => $conf_file_image,
    ),
    'imagecaption' => array(
      'exclude' => $bool_exclude_default,
      'l10n_mode' => 'prefixLangTitle',
      'label' => 'LLL:EXT:org/Resources/Private/Language/locallang_db.xml:tca_phrase.imagecaption',
      'config' => $conf_text_30_05,
    ),
    'imagecaption_position' => array(
      'exclude' => $bool_exclude_none,
//      'l10n_mode' => 'exclude',
      'label' => 'LLL:EXT:cms/locallang_ttc.xml:imagecaption_position',
      'config' => array(
        'type' => 'select',
        'items' => array(
          array( '', '' ),
          array( 'LLL:EXT:cms/locallang_ttc.xml:imagecaption_position.I.1', 'center' ),
          array( 'LLL:EXT:cms/locallang_ttc.xml:imagecaption_position.I.2', 'right' ),
          array( 'LLL:EXT:cms/locallang_ttc.xml:imagecaption_position.I.3', 'left' ),
        ),
        'default' => ''
      ),
    ),
    'imageseo' => array(
      'exclude' => $bool_exclude_default,
      'l10n_mode' => 'prefixLangTitle',
      'label' => 'LLL:EXT:org/Resources/Private/Language/locallang_db.xml:tca_phrase.imageseo',
      'config' => $conf_text_30_05,
    ),
    'imagewidth' => array(
      'exclude' => $bool_exclude_default,
//      'l10n_mode' => 'exclude',
      'label' => 'LLL:EXT:cms/locallang_ttc.xml:imagewidth',
      'config' => array(
        'type' => 'input',
        'size' => '10',
        'max' => '10',
        'eval' => 'trim',
        'checkbox' => '0',
        'default' => ''
      ),
    ),
    'imageheight' => array(
      'exclude' => $bool_exclude_default,
//      'l10n_mode' => 'exclude',
      'label' => 'LLL:EXT:cms/locallang_ttc.xml:imageheight',
      'config' => array(
        'type' => 'input',
        'size' => '10',
        'max' => '10',
        'eval' => 'trim',
        'checkbox' => '0',
        'default' => ''
      ),
    ),
    'imageorient' => array(
      'exclude' => $bool_exclude_default,
      'label' => 'LLL:EXT:cms/locallang_ttc.xml:imageorient',
      'config' => array(
        'type' => 'select',
        'items' => array(
          array( 'LLL:EXT:cms/locallang_ttc.xml:imageorient.I.0', 0, 'selicons/above_center.gif' ),
          array( 'LLL:EXT:cms/locallang_ttc.xml:imageorient.I.1', 1, 'selicons/above_right.gif' ),
          array( 'LLL:EXT:cms/locallang_ttc.xml:imageorient.I.2', 2, 'selicons/above_left.gif' ),
          array( 'LLL:EXT:cms/locallang_ttc.xml:imageorient.I.3', 8, 'selicons/below_center.gif' ),
          array( 'LLL:EXT:cms/locallang_ttc.xml:imageorient.I.4', 9, 'selicons/below_right.gif' ),
          array( 'LLL:EXT:cms/locallang_ttc.xml:imageorient.I.5', 10, 'selicons/below_left.gif' ),
          array( 'LLL:EXT:cms/locallang_ttc.xml:imageorient.I.6', 17, 'selicons/intext_right.gif' ),
          array( 'LLL:EXT:cms/locallang_ttc.xml:imageorient.I.7', 18, 'selicons/intext_left.gif' ),
          array( 'LLL:EXT:cms/locallang_ttc.xml:imageorient.I.8', '--div--' ),
          array( 'LLL:EXT:cms/locallang_ttc.xml:imageorient.I.9', 25, 'selicons/intext_right_nowrap.gif' ),
          array( 'LLL:EXT:cms/locallang_ttc.xml:imageorient.I.10', 26, 'selicons/intext_left_nowrap.gif' ),
        ),
        'selicon_cols' => 6,
        'default' => '0',
        'iconsInOptionTags' => 1,
      ),
    ),
    'imageborder' => array(
      'exclude' => $bool_exclude_none,
      'label' => 'LLL:EXT:cms/locallang_ttc.xml:imageborder',
      'config' => array(
        'type' => 'check'
      ),
    ),
    'image_noRows' => array(
      'exclude' => $bool_exclude_none,
      'label' => 'LLL:EXT:cms/locallang_ttc.xml:image_noRows',
      'config' => array(
        'type' => 'check'
      ),
    ),
    'image_link' => array(
      'exclude' => $bool_exclude_default,
      'label' => 'LLL:EXT:cms/locallang_ttc.xml:image_link',
      'config' => array(
        'type' => 'text',
        'cols' => '30',
        'rows' => '3',
        'wizards' => array(
          '_PADDING' => 2,
          'link' => array(
            'type' => 'popup',
            'title' => 'Link',
            'icon' => 'link_popup.gif',
            'script' => 'browse_links.php?mode=wizard',
            'JSopenParams' => 'height=300,width=500,status=0,menubar=0,scrollbars=1'
          ),
        ),
        'softref' => 'typolink[linkList]'
      ),
    ),
    'image_zoom' => array(
      'exclude' => $bool_exclude_default,
      'label' => 'LLL:EXT:cms/locallang_ttc.xml:image_zoom',
      'config' => array(
        'type' => 'check'
      ),
    ),
    'image_effects' => array(
      'exclude' => $bool_exclude_default,
      'label' => 'LLL:EXT:cms/locallang_ttc.xml:image_effects',
      'config' => array(
        'type' => 'select',
        'items' => array(
          array( 'LLL:EXT:cms/locallang_ttc.xml:image_effects.I.0', 0 ),
          array( 'LLL:EXT:cms/locallang_ttc.xml:image_effects.I.1', 1 ),
          array( 'LLL:EXT:cms/locallang_ttc.xml:image_effects.I.2', 2 ),
          array( 'LLL:EXT:cms/locallang_ttc.xml:image_effects.I.3', 3 ),
          array( 'LLL:EXT:cms/locallang_ttc.xml:image_effects.I.4', 10 ),
          array( 'LLL:EXT:cms/locallang_ttc.xml:image_effects.I.5', 11 ),
          array( 'LLL:EXT:cms/locallang_ttc.xml:image_effects.I.6', 20 ),
          array( 'LLL:EXT:cms/locallang_ttc.xml:image_effects.I.7', 23 ),
          array( 'LLL:EXT:cms/locallang_ttc.xml:image_effects.I.8', 25 ),
          array( 'LLL:EXT:cms/locallang_ttc.xml:image_effects.I.9', 26 ),
        ),
      ),
    ),
    'image_frames' => array(
      'exclude' => $bool_exclude_none,
      'label' => 'LLL:EXT:cms/locallang_ttc.xml:image_frames',
      'config' => array(
        'type' => 'select',
        'items' => array(
          array( 'LLL:EXT:cms/locallang_ttc.xml:image_frames.I.0', 0 ),
          array( 'LLL:EXT:cms/locallang_ttc.xml:image_frames.I.1', 1 ),
          array( 'LLL:EXT:cms/locallang_ttc.xml:image_frames.I.2', 2 ),
          array( 'LLL:EXT:cms/locallang_ttc.xml:image_frames.I.3', 3 ),
          array( 'LLL:EXT:cms/locallang_ttc.xml:image_frames.I.4', 4 ),
          array( 'LLL:EXT:cms/locallang_ttc.xml:image_frames.I.5', 5 ),
          array( 'LLL:EXT:cms/locallang_ttc.xml:image_frames.I.6', 6 ),
          array( 'LLL:EXT:cms/locallang_ttc.xml:image_frames.I.7', 7 ),
          array( 'LLL:EXT:cms/locallang_ttc.xml:image_frames.I.8', 8 ),
        ),
      ),
    ),
    'image_compression' => array(
      'exclude' => $bool_exclude_none,
      'label' => 'LLL:EXT:cms/locallang_ttc.xml:image_compression',
      'config' => array(
        'type' => 'select',
        'items' => array(
          array( 'LLL:EXT:lang/locallang_general.php:LGL.default_value', 0 ),
          array( 'LLL:EXT:cms/locallang_ttc.xml:image_compression.I.1', 1 ),
          array( 'GIF/256', 10 ),
          array( 'GIF/128', 11 ),
          array( 'GIF/64', 12 ),
          array( 'GIF/32', 13 ),
          array( 'GIF/16', 14 ),
          array( 'GIF/8', 15 ),
          array( 'PNG', 39 ),
          array( 'PNG/256', 30 ),
          array( 'PNG/128', 31 ),
          array( 'PNG/64', 32 ),
          array( 'PNG/32', 33 ),
          array( 'PNG/16', 34 ),
          array( 'PNG/8', 35 ),
          array( 'LLL:EXT:cms/locallang_ttc.xml:image_compression.I.15', 21 ),
          array( 'LLL:EXT:cms/locallang_ttc.xml:image_compression.I.16', 22 ),
          array( 'LLL:EXT:cms/locallang_ttc.xml:image_compression.I.17', 24 ),
          array( 'LLL:EXT:cms/locallang_ttc.xml:image_compression.I.18', 26 ),
          array( 'LLL:EXT:cms/locallang_ttc.xml:image_compression.I.19', 28 ),
        ),
      ),
    ),
    'imagecols' => array(
      'exclude' => $bool_exclude_default,
      'label' => 'LLL:EXT:cms/locallang_ttc.xml:imagecols',
      'config' => array(
        'type' => 'select',
        'items' => array(
          array( '1', 1 ),
          array( '2', 2 ),
          array( '3', 3 ),
          array( '4', 4 ),
          array( '5', 5 ),
          array( '6', 6 ),
          array( '7', 7 ),
          array( '8', 8 ),
        ),
        'default' => 1
      ),
    ),
    'documents_from_path' => array(
      'exclude' => $bool_exclude_default,
      'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.code',
      'config' => array(
        'type' => 'input',
        'size' => '50',
        'max' => '80',
        'eval' => 'trim',
      ),
    ),
    'documents' => array(
      'exclude' => $bool_exclude_default,
      'label' => 'LLL:EXT:org/Resources/Private/Language/locallang_db.xml:tca_phrase.documents',
      'config' => $conf_file_document,
    ),
    'documentscaption' => array(
      'exclude' => $bool_exclude_default,
      'label' => 'LLL:EXT:org/Resources/Private/Language/locallang_db.xml:tca_phrase.documentscaption',
      'config' => $conf_text_30_05,
    ),
    'documentslayout' => array(
      'exclude' => $bool_exclude_default,
      'label' => 'LLL:EXT:org/Resources/Private/Language/locallang_db.xml:tca_phrase.documentslayout',
      'config' => array(
        'type' => 'select',
        'size' => 1,
        'maxitems' => 1,
        'items' => array(
          array( 'LLL:EXT:org/Resources/Private/Language/locallang_db.xml:tca_phrase.documentslayout.0', 0 ),
          array( 'LLL:EXT:org/Resources/Private/Language/locallang_db.xml:tca_phrase.documentslayout.1', 1 ),
          array( 'LLL:EXT:org/Resources/Private/Language/locallang_db.xml:tca_phrase.documentslayout.2', 2 ),
        ),
      ),
    ),
    'documentssize' => array(
      'exclude' => $bool_exclude_default,
      'label' => 'LLL:EXT:cms/locallang_ttc.xml:filelink_size',
      'config' => array(
        'type' => 'check',
        'items' => array(
          '1' => array(
            '0' => 'LLL:EXT:lang/locallang_core.xml:labels.enabled',
          ),
        ),
      ),
    ),
    'hidden' => array(
      'exclude' => 1,
      'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.hidden',
      'config' => array(
        'type' => 'check',
        'default' => '0'
      )
    ),
    'starttime' => array(
      'exclude' => 1,
      'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.starttime',
      'config' => array(
        'type' => 'input',
        'size' => '8',
        'max' => '20',
        'eval' => 'date',
        'default' => '0',
        'checkbox' => '0'
      )
    ),
    'endtime' => array(
      'exclude' => 1,
      'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.endtime',
      'config' => array(
        'type' => 'input',
        'size' => '8',
        'max' => '20',
        'eval' => 'date',
        'checkbox' => '0',
        'default' => '0',
        'range' => array(
          'upper' => mktime( 3, 14, 7, 1, 19, 2038 ),
          'lower' => mktime( 0, 0, 0, date( 'm' ) - 1, date( 'd' ), date( 'Y' ) )
        )
      )
    ),
    'fe_group' => $conf_fegroup,
    'seo_keywords' => array(
      'exclude' => $bool_exclude_default,
      'l10n_mode' => 'prefixLangTitle',
      'label' => 'LLL:EXT:org/Resources/Private/Language/locallang_db.xml:tca_phrase.seo_keywords',
      'config' => $conf_input_80_trim,
    ),
    'seo_description' => array(
      'exclude' => $bool_exclude_default,
      'l10n_mode' => 'prefixLangTitle',
      'label' => 'LLL:EXT:org/Resources/Private/Language/locallang_db.xml:tca_phrase.seo_description',
      'config' => $conf_text_50_10,
    ),
  ),
  'types' => array(
    'noitem' => array(
      'showitem' => 'This is a copy of the type record. See allocation below this array configuration.'
    ),
    // Copy of record
    'notype' => array(
      'showitem' => ''
      . '--div--;LLL:EXT:org/Resources/Private/Language/tx_org_service.xml:tx_org_service.div_service, '
      . '  type,'
      . '  --palette--;LLL:EXT:org/Resources/Private/Language/tx_org_service.xml:tx_org_service.palette_title;title, '
      . '  description;;;richtext[]:rte_transform[mode=ts],'
      . '--div--;LLL:EXT:org/Resources/Private/Language/tx_org_service.xml:tx_org_service.div_categories,'
      . '  tx_org_servicecat,tx_org_servicesector,tx_org_servicetargetgroup,'
      . '--div--;LLL:EXT:org/Resources/Private/Language/tx_org_service.xml:tx_org_service.div_teaser,'
      . '  teaser_title,teaser_short,'
      . '--div--;LLL:EXT:org/Resources/Private/Language/tx_org_service.xml:tx_org_service.div_marginal,'
      . '  marginal_title,marginal_short,'
      . '--div--;LLL:EXT:org/Resources/Private/Language/tx_org_service.xml:tx_org_service.div_mail, '
      . '  --palette--;LLL:EXT:org/Resources/Private/Language/tx_org_service.xml:tx_org_service.palette_mailaddress;mailaddress, '
      . '  --palette--;LLL:EXT:org/Resources/Private/Language/tx_org_service.xml:tx_org_service.palette_maillatlon;maillatlon, '
      . '--div--;LLL:EXT:org/Resources/Private/Language/tx_org_service.xml:tx_org_service.div_company,'
      . '  tx_org_headquarters,'
      . '--div--;LLL:EXT:org/Resources/Private/Language/tx_org_service.xml:tx_org_service.div_staff,'
      . '  tx_org_staff,'
      . '--div--;LLL:EXT:cms/locallang_ttc.xml:tabs.images,'
      . '  --palette--;LLL:EXT:cms/locallang_ttc.xml:palette.imagefiles;imagefiles,'
      . '  --palette--;LLL:EXT:org/Resources/Private/Language/locallang_db.xml:palette.image_accessibility;image_accessibility,'
      . '  --palette--;LLL:EXT:cms/locallang_ttc.xml:palette.imageblock;imageblock,'
      . '  --palette--;LLL:EXT:cms/locallang_ttc.xml:palette.imagelinks;imagelinks,'
      . '  --palette--;LLL:EXT:cms/locallang_ttc.xml:palette.image_settings;image_settings,'
      . '--div--;LLL:EXT:cms/locallang_ttc.xml:tabs.media,'
      . '  --palette--;LLL:EXT:cms/locallang_ttc.xml:media;documents_upload,'
      . '  --palette--;LLL:EXT:org/Resources/Private/Language/locallang_db.xml:palette.appearance;documents_appearance,'
      . '--div--;LLL:EXT:org/Resources/Private/Language/tx_org_service.xml:tx_org_service.div_control,'
      . '  hidden;;control;;,fe_group,'
      . '--div--;LLL:EXT:org/Resources/Private/Language/tx_org_service.xml:tx_org_service.div_seo,'
      . '  seo_keywords, seo_description,'
    ,
    ),
    'record' => array(
      'showitem' => ''
      . '--div--;LLL:EXT:org/Resources/Private/Language/tx_org_service.xml:tx_org_service.div_service, '
      . '  type,'
      . '  --palette--;LLL:EXT:org/Resources/Private/Language/tx_org_service.xml:tx_org_service.palette_title;title, '
      . '  description;;;richtext[]:rte_transform[mode=ts],'
      . '--div--;LLL:EXT:org/Resources/Private/Language/tx_org_service.xml:tx_org_service.div_categories,'
      . '  tx_org_servicecat,tx_org_servicesector,tx_org_servicetargetgroup,'
      . '--div--;LLL:EXT:org/Resources/Private/Language/tx_org_service.xml:tx_org_service.div_teaser,'
      . '  teaser_title,teaser_short,'
      . '--div--;LLL:EXT:org/Resources/Private/Language/tx_org_service.xml:tx_org_service.div_marginal,'
      . '  marginal_title,marginal_short,'
      . '--div--;LLL:EXT:org/Resources/Private/Language/tx_org_service.xml:tx_org_service.div_mail, '
      . '  --palette--;LLL:EXT:org/Resources/Private/Language/tx_org_service.xml:tx_org_service.palette_mailaddress;mailaddress, '
      . '  --palette--;LLL:EXT:org/Resources/Private/Language/tx_org_service.xml:tx_org_service.palette_maillatlon;maillatlon, '
      . '--div--;LLL:EXT:org/Resources/Private/Language/tx_org_service.xml:tx_org_service.div_company,'
      . '  tx_org_headquarters,'
      . '--div--;LLL:EXT:org/Resources/Private/Language/tx_org_service.xml:tx_org_service.div_staff,'
      . '  tx_org_staff,'
      . '--div--;LLL:EXT:cms/locallang_ttc.xml:tabs.images,'
      . '  --palette--;LLL:EXT:cms/locallang_ttc.xml:palette.imagefiles;imagefiles,'
      . '  --palette--;LLL:EXT:org/Resources/Private/Language/locallang_db.xml:palette.image_accessibility;image_accessibility,'
      . '  --palette--;LLL:EXT:cms/locallang_ttc.xml:palette.imageblock;imageblock,'
      . '  --palette--;LLL:EXT:cms/locallang_ttc.xml:palette.imagelinks;imagelinks,'
      . '  --palette--;LLL:EXT:cms/locallang_ttc.xml:palette.image_settings;image_settings,'
      . '--div--;LLL:EXT:cms/locallang_ttc.xml:tabs.media,'
      . '  --palette--;LLL:EXT:cms/locallang_ttc.xml:media;documents_upload,'
      . '  --palette--;LLL:EXT:org/Resources/Private/Language/locallang_db.xml:palette.appearance;documents_appearance,'
      . '--div--;LLL:EXT:org/Resources/Private/Language/tx_org_service.xml:tx_org_service.div_control,'
      . '  hidden;;control;;,fe_group,'
      . '--div--;LLL:EXT:org/Resources/Private/Language/tx_org_service.xml:tx_org_service.div_seo,'
      . '  seo_keywords, seo_description,'
    ,
    ),
    'page' => array(
      'showitem' => ''
      . '--div--;LLL:EXT:org/Resources/Private/Language/tx_org_service.xml:tx_org_service.div_service, '
      . '  --palette--;LLL:EXT:org/Resources/Private/Language/locallang_db.xml:palette_typepage;typepage,'
      . '  --palette--;LLL:EXT:org/Resources/Private/Language/tx_org_service.xml:tx_org_service.palette_title;title, '
      . '  description;;;richtext[]:rte_transform[mode=ts],'
      . '--div--;LLL:EXT:org/Resources/Private/Language/tx_org_service.xml:tx_org_service.div_teaser,'
      . '  teaser_title,teaser_short,'
      . '--div--;LLL:EXT:org/Resources/Private/Language/tx_org_service.xml:tx_org_service.div_mail, '
      . '  --palette--;LLL:EXT:org/Resources/Private/Language/tx_org_service.xml:tx_org_service.palette_mailaddress;mailaddress, '
      . '  --palette--;LLL:EXT:org/Resources/Private/Language/tx_org_service.xml:tx_org_service.palette_maillatlon;maillatlon, '
      . '--div--;LLL:EXT:org/Resources/Private/Language/tx_org_service.xml:tx_org_service.div_categories,'
      . '  tx_org_servicecat,tx_org_servicesector,tx_org_servicetargetgroup,'
      . '--div--;LLL:EXT:org/Resources/Private/Language/tx_org_service.xml:tx_org_service.div_company,'
      . '  tx_org_headquarters,'
      . '--div--;LLL:EXT:org/Resources/Private/Language/tx_org_service.xml:tx_org_service.div_staff,'
      . '  tx_org_staff,'
      . '--div--;LLL:EXT:cms/locallang_ttc.xml:tabs.images,'
      . '  --palette--;LLL:EXT:cms/locallang_ttc.xml:palette.imagefiles;imagefiles,'
      . '  --palette--;LLL:EXT:org/Resources/Private/Language/locallang_db.xml:palette.image_accessibility;image_accessibility,'
      . '  --palette--;LLL:EXT:cms/locallang_ttc.xml:palette.imageblock;imageblock,'
      . '  --palette--;LLL:EXT:cms/locallang_ttc.xml:palette.imagelinks;imagelinks,'
      . '  --palette--;LLL:EXT:cms/locallang_ttc.xml:palette.image_settings;image_settings,'
      . '--div--;LLL:EXT:org/Resources/Private/Language/tx_org_service.xml:tx_org_service.div_control,'
      . '  hidden;;control;;,fe_group,'
    ,
    ),
    'url' => array(
      'showitem' => ''
      . '--div--;LLL:EXT:org/Resources/Private/Language/tx_org_service.xml:tx_org_service.div_service, '
      . '  --palette--;LLL:EXT:org/Resources/Private/Language/locallang_db.xml:palette_typeurl;typeurl,'
      . '  --palette--;LLL:EXT:org/Resources/Private/Language/tx_org_service.xml:tx_org_service.palette_title;title, '
      . '  description;;;richtext[]:rte_transform[mode=ts],'
      . '--div--;LLL:EXT:org/Resources/Private/Language/tx_org_service.xml:tx_org_service.div_teaser,'
      . '  teaser_title,teaser_short,'
      . '--div--;LLL:EXT:org/Resources/Private/Language/tx_org_service.xml:tx_org_service.div_mail, '
      . '  --palette--;LLL:EXT:org/Resources/Private/Language/tx_org_service.xml:tx_org_service.palette_mailaddress;mailaddress, '
      . '  --palette--;LLL:EXT:org/Resources/Private/Language/tx_org_service.xml:tx_org_service.palette_maillatlon;maillatlon, '
      . '--div--;LLL:EXT:org/Resources/Private/Language/tx_org_service.xml:tx_org_service.div_categories,'
      . '  tx_org_servicecat,tx_org_servicesector,tx_org_servicetargetgroup,'
      . '--div--;LLL:EXT:org/Resources/Private/Language/tx_org_service.xml:tx_org_service.div_company,'
      . '  tx_org_headquarters,'
      . '--div--;LLL:EXT:org/Resources/Private/Language/tx_org_service.xml:tx_org_service.div_staff,'
      . '  tx_org_staff,'
      . '--div--;LLL:EXT:cms/locallang_ttc.xml:tabs.images,'
      . '  --palette--;LLL:EXT:cms/locallang_ttc.xml:palette.imagefiles;imagefiles,'
      . '  --palette--;LLL:EXT:org/Resources/Private/Language/locallang_db.xml:palette.image_accessibility;image_accessibility,'
      . '  --palette--;LLL:EXT:cms/locallang_ttc.xml:palette.imageblock;imageblock,'
      . '  --palette--;LLL:EXT:cms/locallang_ttc.xml:palette.imagelinks;imagelinks,'
      . '  --palette--;LLL:EXT:cms/locallang_ttc.xml:palette.image_settings;image_settings,'
      . '--div--;LLL:EXT:org/Resources/Private/Language/tx_org_service.xml:tx_org_service.div_control,'
      . '  hidden;;control;;,fe_group,'
    ,
    ),
  ),
  'palettes' => array(
    'control' => array(
      'showitem' => 'starttime, endtime'
    ),
    'documents_appearance' => array(
      'showitem' => 'documentslayout;LLL:EXT:org/Resources/Private/Language/locallang_db.xml:tca_phrase.documentslayout,documentssize;LLL:EXT:cms/locallang_ttc.xml:filelink_size_formlabel',
      'canNotCollapse' => 1,
    ),
    'documents_upload' => array(
      'showitem' => 'documents_from_path;LLL:EXT:org/Resources/Private/Language/locallang_db.xml:tca_phrase.documents_from_path, --linebreak--,' .
      'documents;LLL:EXT:cms/locallang_ttc.xml:media.ALT.uploads_formlabel, documentscaption;LLL:EXT:cms/locallang_ttc.xml:imagecaption.ALT.uploads_formlabel;;nowrap, --linebreak--,',
      'canNotCollapse' => 1,
    ),
    'image_accessibility' => array(
      'showitem' => 'imageseo;LLL:EXT:org/Resources/Private/Language/locallang_db.xml:tca_phrase.imageseo,',
      'canNotCollapse' => 1,
    ),
    'imageblock' => array(
      'showitem' => 'imageorient;LLL:EXT:cms/locallang_ttc.xml:imageorient_formlabel, imagecols;LLL:EXT:cms/locallang_ttc.xml:imagecols_formlabel, --linebreak--,' .
      'image_noRows;LLL:EXT:cms/locallang_ttc.xml:image_noRows_formlabel, imagecaption_position;LLL:EXT:cms/locallang_ttc.xml:imagecaption_position_formlabel',
      'canNotCollapse' => 1,
    ),
    'imagefiles' => array(
      'showitem' => 'image;LLL:EXT:cms/locallang_ttc.xml:image_formlabel, imagecaption;LLL:EXT:cms/locallang_ttc.xml:imagecaption_formlabel,',
      'canNotCollapse' => 1,
    ),
    'imagelinks' => array(
      'showitem' => 'image_zoom;LLL:EXT:cms/locallang_ttc.xml:image_zoom_formlabel, image_link;LLL:EXT:cms/locallang_ttc.xml:image_link_formlabel',
      'canNotCollapse' => 1,
    ),
    'image_settings' => array(
      'showitem' => 'imagewidth;LLL:EXT:cms/locallang_ttc.xml:imagewidth_formlabel, imageheight;LLL:EXT:cms/locallang_ttc.xml:imageheight_formlabel, imageborder;LLL:EXT:cms/locallang_ttc.xml:imageborder_formlabel, --linebreak--,' .
      'image_compression;LLL:EXT:cms/locallang_ttc.xml:image_compression_formlabel, image_effects;LLL:EXT:cms/locallang_ttc.xml:image_effects_formlabel, image_frames;LLL:EXT:cms/locallang_ttc.xml:image_frames_formlabel',
      'canNotCollapse' => 1,
    ),
    'mailaddress' => array(
      'showitem' => ''
      . 'mail_address;LLL:EXT:org/Resources/Private/Language/tx_org_service.xml:tx_org_service.mail_address,--linebreak--,'
      . 'mail_street;LLL:EXT:org/Resources/Private/Language/tx_org_service.xml:tx_org_service.mail_street,--linebreak--,'
      . 'mail_zip;LLL:EXT:org/Resources/Private/Language/tx_org_service.xml:tx_org_service.mail_zip,'
      . 'mail_city;LLL:EXT:org/Resources/Private/Language/tx_org_service.xml:tx_org_service.mail_city,--linebreak--,'
      . 'mail_country;LLL:EXT:org/Resources/Private/Language/tx_org_service.xml:tx_org_service.mail_country,',
      'canNotCollapse' => 1,
    ),
    'maillatlon' => array(
      'showitem' => ''
      . 'geoupdateprompt;LLL:EXT:org/Resources/Private/Language/tx_org_service.xml:tx_org_service.geoupdateprompt,--linebreak--,'
      . 'geoupdateforbidden;LLL:EXT:org/Resources/Private/Language/tx_org_service.xml:tx_org_service.geoupdateforbidden,--linebreak--,'
      . 'mail_lat;LLL:EXT:org/Resources/Private/Language/tx_org_service.xml:tx_org_service.mail_lat,'
      . 'mail_lon;LLL:EXT:org/Resources/Private/Language/tx_org_service.xml:tx_org_service.mail_lon,',
      'canNotCollapse' => 1,
    ),
    'title' => array(
      'showitem' => ''
      . 'title;LLL:EXT:org/Resources/Private/Language/tx_org_service.xml:tx_org_service.title,'
      . 'reference_number;LLL:EXT:org/Resources/Private/Language/tx_org_service.xml:tx_org_service.reference_number'
      ,
      'canNotCollapse' => 1,
    ),
    'typepage' => array(
      'showitem' => ''
      . 'type;LLL:EXT:org/Resources/Private/Language/locallang_db.xml:type,'
      . 'page;LLL:EXT:org/Resources/Private/Language/locallang_db.xml:page'
      ,
      'canNotCollapse' => 1,
    ),
    'typeurl' => array(
      'showitem' => ''
      . 'type;LLL:EXT:org/Resources/Private/Language/locallang_db.xml:type,'
      . 'url;LLL:EXT:org/Resources/Private/Language/locallang_db.xml:url'
      ,
      'canNotCollapse' => 1,
    ),
  )
);