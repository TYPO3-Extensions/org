<?php

if ( !defined( 'TYPO3_MODE' ) )
{
  die( 'Access denied.' );
}

// Configuration by the extension manager
require_once( PATH_typo3conf . 'ext/org/Configuration/ExtensionManager/simplifyer.php' );
// Default values and wizards
require_once( PATH_typo3conf . 'ext/org/Configuration/TCA/Defaults/defaultValues.php' );

$aTca = array(
  'ctrl' => array(
    'title' => 'LLL:EXT:org/Resources/Private/Language/tx_org_downloads.xml:tx_org_downloads',
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
    'thumbnail' => 'image',
    'iconfile' => t3lib_extMgm::extRelPath( $_EXTKEY ) . 'Resources/Public/Images/Icons/ExtIcon/download.gif',
    'type' => 'type',
    'typeicon_column' => 'type',
    'typeicons' => array(
      'download' => '../typo3conf/ext/org/Resources/Public/Images/Icons/ExtIcon/download.gif',
      'download_shipping' => '../typo3conf/ext/org/Resources/Public/Images/Icons/ExtIcon/download_shipping.gif',
      'shipping' => '../typo3conf/ext/org/Resources/Public/Images/Icons/ExtIcon/shipping.gif',
    ),
    'searchFields' => ''
    . 'sys_language_uid,l10n_parent,l10n_diffsource,'
    . 'type,title,subtitle,datetime,tx_org_downloadscat,tx_org_downloadsmedia,bodytext,'
    . 'documents_from_path,documents,documentscaption,documentslayout,documents_display_label,documents_display_caption,documentssize,'
    . 'thumbnail,thumbnail_width,thumbnail_height,'
    . 'linkicon_width,linkicon_height,'
    . 'tx_flipit_layout,tx_flipit_quality,tx_flipit_pagelist,tx_flipit_updateswfxml,tx_flipit_swf_files,tx_flipit_xml_file,tx_flipit_fancybox,tx_flipit_evaluate,'
    . 'teaser_title,teaser_subtitle,teaser_short'
    . 'pages,'
    . 'hidden,pages,starttime,endtime,fe_group,'
    . 'seo_keywords,seo_description,'
    . 'statistics_hits,statistics_visits,statistics_downloads,statistics_downloads_by_visits,',
    // #69257, 150821, dwildt, 1+
    'filter' => 'filter_for_all_fields',
  ),
  'interface' => array(
    'showRecordFieldList' => ''
    . 'sys_language_uid,l10n_parent,l10n_diffsource,'
    . 'filterPrompt,'
    . 'type,title,subtitle,datetime,tx_org_downloadscat,tx_org_downloadsmedia,bodytext,'
    . 'documents_from_path,documents,documentscaption,documentslayout,documents_display_label,documents_display_caption,documentssize,'
    . 'thumbnail,thumbnail_width,thumbnail_height,'
    . 'linkicon_width,linkicon_height,'
    . 'tx_flipit_layout,tx_flipit_quality,tx_flipit_pagelist,tx_flipit_updateswfxml,tx_flipit_swf_files,tx_flipit_xml_file,tx_flipit_fancybox,tx_flipit_evaluate,'
    . 'tx_org_staff,'
    . 'teaser_title,teaser_subtitle,teaser_short'
    . 'pages,'
    . 'fe_user,'
    . 'hidden,pages,starttime,endtime,fe_group,'
    . 'seo_keywords,seo_description,'
    . 'statistics_hits,statistics_visits,statistics_downloads,statistics_downloads_by_visits,'
  ,
  ),
  'columns' => array(
    'sys_language_uid' => array(
      'exclude' => 1,
      'label' => 'LLL:EXT:lang/locallang_general.php:LGL.language',
      'config' => array(
        'type' => 'select',
        'suppress_icons' => 1,
        'foreign_table' => 'sys_language',
        'foreign_table_where' => 'ORDER BY sys_language.title',
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
        'suppress_icons' => 1,
        'items' => array(
          array( '', 0 ),
        ),
        'foreign_table' => 'tx_org_downloads',
        'foreign_table_where' => 'AND tx_org_downloads.uid=###REC_FIELD_l10n_parent### AND tx_org_downloads.sys_language_uid IN (-1,0)',
      ),
    ),
    'l10n_diffsource' => array(
      'config' => array(
        'type' => 'passthrough'
      ),
    ),
    'documents' => array(
      'exclude' => $bool_exclude_default,
      'l10n_mode' => 'mergeIfNotBlank',
      'label' => 'LLL:EXT:org/Resources/Private/Language/tx_org_downloads.xml:tx_org_downloads.file',
      'config' => $conf_file_one_document,
    ),
    'documentscaption' => array(
      'exclude' => $bool_exclude_default,
      'label' => 'LLL:EXT:org/Resources/Private/Language/tx_org_downloads.xml:tx_org_downloads.documentscaption',
      'config' => $conf_input_80_trim,
    ),
    'documentslayout' => array(
      'exclude' => $bool_exclude_default,
      'l10n_mode' => 'exclude',
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
      //'l10n_mode' => 'exclude',
      'label' => 'LLL:EXT:cms/locallang_ttc.xml:filelink_size',
      'config' => array(
        'type' => 'check',
        'items' => array(
          '1' => array(
            '0' => 'LLL:EXT:lang/locallang_core.xml:labels.enabled',
          ),
        ),
        'default' => '1'
      ),
    ),
    'documents_from_path' => array(
      'exclude' => $bool_exclude_default,
      //'l10n_mode' => 'exclude',
      'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.code',
      'config' => array(
        'type' => 'input',
        'size' => '50',
        'max' => '80',
        'eval' => 'trim',
      ),
    ),
    'documents_display_label' => array(
      'exclude' => $bool_exclude_default,
      //'l10n_mode' => 'exclude',
      'label' => 'LLL:EXT:org/Resources/Private/Language/locallang_db.xml:tca_phrase.documents_display_label',
      'config' => array(
        'type' => 'check',
        'items' => array(
          '1' => array(
            '0' => 'LLL:EXT:lang/locallang_core.xml:labels.enabled',
          ),
        ),
        'default' => '1'
      ),
    ),
    'documents_display_caption' => array(
      'exclude' => $bool_exclude_default,
      //'l10n_mode' => 'exclude',
      'label' => 'LLL:EXT:org/Resources/Private/Language/locallang_db.xml:tca_phrase.documents_display_caption',
      'config' => array(
        'type' => 'check',
        'items' => array(
          '1' => array(
            '0' => 'LLL:EXT:lang/locallang_core.xml:labels.enabled',
          ),
        ),
        'default' => '0'
      ),
    ),
    'filterPrompt' => array(
      'l10n_mode' => 'exclude',
      'exclude' => 1,
      'label' => 'LLL:EXT:org/Resources/Private/Language/Userfunc/TcaFilterPrompt/locallang.xlf:default.label',
      'config' => array(
        'type' => 'user',
        'userFunc' => '\Netzmacher\Org\Utility\UserFunc\TcaFilterPrompt->tx_org_downloads',
      ),
    ),
    'type' => array(
      'exclude' => $bool_exclude_default,
      'label' => 'LLL:EXT:org/Resources/Private/Language/tx_org_downloads.xml:tx_org_downloads.type',
      'config' => array(
        'type' => 'select',
        'items' => array(
          'download' => array(
            '0' => 'LLL:EXT:org/Resources/Private/Language/tx_org_downloads.xml:tx_org_downloads.type.download',
            '1' => 'download',
            '2' => 'EXT:org/Resources/Public/Images/Icons/ExtIcon/download.gif',
          ),
          'download_shipping' => array(
            '0' => 'LLL:EXT:org/Resources/Private/Language/tx_org_downloads.xml:tx_org_downloads.type.download_shipping',
            '1' => 'download_shipping',
            '2' => 'EXT:org/Resources/Public/Images/Icons/ExtIcon/download_shipping.gif',
          ),
          'shipping' => array(
            '0' => 'LLL:EXT:org/Resources/Private/Language/tx_org_downloads.xml:tx_org_downloads.type.shipping',
            '1' => 'shipping',
            '2' => 'EXT:org/Resources/Public/Images/Icons/ExtIcon/shipping.gif',
          ),
        ),
        'default' => 'download',
      ),
      // #69257, 150821, dwildt, 1+
      'config_filter' => array(
        'type' => 'select',
        'items' => array(
          'empty' => array(
            '0' => '',
            '1' => '',
          ),
          'download' => array(
            '0' => 'LLL:EXT:org/Resources/Private/Language/tx_org_downloads.xml:tx_org_downloads.type.download',
            '1' => 'download',
          ),
          'download_shipping' => array(
            '0' => 'LLL:EXT:org/Resources/Private/Language/tx_org_downloads.xml:tx_org_downloads.type.download_shipping',
            '1' => 'download_shipping',
          ),
          'shipping' => array(
            '0' => 'LLL:EXT:org/Resources/Private/Language/tx_org_downloads.xml:tx_org_downloads.type.shipping',
            '1' => 'shipping',
          ),
        ),
      ),
    ),
    'title' => array(
      'exclude' => 0,
      'l10n_mode' => 'prefixLangTitle',
      'label' => 'LLL:EXT:org/Resources/Private/Language/tx_org_downloads.xml:tx_org_downloads.title',
      'config' => $conf_input_30_trimRequired,
    ),
    'subtitle' => array(
      'exclude' => $bool_exclude_default,
      'l10n_mode' => 'prefixLangTitle',
      'label' => 'LLL:EXT:org/Resources/Private/Language/tx_org_downloads.xml:tx_org_downloads.subtitle',
      'config' => $conf_input_30_trim,
    ),
    'datetime' => array(
      'exclude' => 0,
      'l10n_mode' => 'exclude',
      'label' => 'LLL:EXT:org/Resources/Private/Language/tx_org_downloads.xml:tx_org_downloads.datetime',
      'config' => $conf_datetime,
      'config_filter' => array(
        'type' => 'input',
        'size' => '8',
        'max' => '20',
        'eval' => 'date',
        'fromto' => true,
        'fromto_labels' => array(
          'from' => 'LLL:EXT:org/Resources/Private/Language/tx_org_downloads.xml:tx_org_downloads.datetime.from',
          'to' => 'LLL:EXT:org/Resources/Private/Language/tx_org_downloads.xml:tx_org_downloads.datetime.to',
        ),
      ),
    ),
    'tx_org_downloadscat' => array(
      'exclude' => $bool_exclude_default,
      'l10n_mode' => 'mergeIfNotBlank',
      'label' => 'LLL:EXT:org/Resources/Private/Language/tx_org_downloads.xml:tx_org_downloads.tx_org_downloadscat',
      'config' => array(
        'type' => 'select',
        'size' => 10,
        'minitems' => 0,
        'maxitems' => 99,
        'MM' => 'tx_org_mm_all',
        "MM_match_fields" => array(
          'table_local' => 'tx_org_downloads',
          'table_foreign' => 'tx_org_downloadscat'
        ),
        "MM_insert_fields" => array(
          'table_local' => 'tx_org_downloads',
          'table_foreign' => 'tx_org_downloadscat'
        ),
        'foreign_table' => 'tx_org_downloadscat',
        'foreign_table_where' => 'AND tx_org_downloadscat.' . $str_store_record_conf . ' AND tx_org_downloadscat.deleted = 0 AND tx_org_downloadscat.hidden = 0 ORDER BY tx_org_downloadscat.title',
        'wizards' => array(
          '_PADDING' => 2,
          '_VERTICAL' => 0,
          'add' => array(
            'type' => 'script',
            'title' => 'LLL:EXT:org/Resources/Private/Language/locallang_db.xml:wizard.tx_org_downloadscat.add',
            'icon' => 'add.gif',
            'params' => array(
              'table' => 'tx_org_downloadscat',
              'pid' => $str_marker_pid,
              'setValue' => 'prepend'
            ),
            'script' => 'wizard_add.php',
          ),
          'list' => array(
            'type' => 'script',
            'title' => 'LLL:EXT:org/Resources/Private/Language/locallang_db.xml:wizard.tx_org_downloadscat.list',
            'icon' => 'list.gif',
            'params' => array(
              'table' => 'tx_org_downloadscat',
              'pid' => $str_marker_pid,
            ),
            'script' => 'wizard_list.php',
          ),
          'edit' => array(
            'type' => 'popup',
            'title' => 'LLL:EXT:org/Resources/Private/Language/locallang_db.xml:wizard.tx_org_downloadscat.edit',
            'script' => 'wizard_edit.php',
            'popup_onlyOpenIfSelected' => 1,
            'icon' => 'edit2.gif',
            'JSopenParams' => $JSopenParams,
          ),
        ),
      ),
      // #69257, 150821, dwildt, +
      'config_filter' => array(
        'type' => 'select',
        'size' => 1,
        'MM' => 'tx_org_mm_all',
        "MM_match_fields" => array(
          'table_local' => 'tx_org_downloads',
          'table_foreign' => 'tx_org_downloadscat'
        ),
        "MM_insert_fields" => array(
          'table_local' => 'tx_org_downloads',
          'table_foreign' => 'tx_org_downloadscat'
        ),
        'foreign_table' => 'tx_org_downloadscat',
        'foreign_table_where' => 'AND tx_org_downloadscat.' . $str_store_record_conf . ' AND tx_org_downloadscat.deleted = 0 AND tx_org_downloadscat.hidden = 0 ORDER BY tx_org_downloadscat.title',
        'items' => array(
          'empty' => array(
            '0' => '',
            '1' => '',
          ),
        ),
      ),
    ),
    'tx_org_downloadsmedia' => array(
      'exclude' => $bool_exclude_default,
      'l10n_mode' => 'mergeIfNotBlank',
      'label' => 'LLL:EXT:org/Resources/Private/Language/tx_org_downloads.xml:tx_org_downloads.tx_org_downloadsmedia',
      'config' => array(
        'type' => 'select',
        'size' => 10,
        'minitems' => 0,
        'maxitems' => 99,
        'MM' => 'tx_org_mm_all',
        "MM_match_fields" => array(
          'table_local' => 'tx_org_downloads',
          'table_foreign' => 'tx_org_downloadsmedia'
        ),
        "MM_insert_fields" => array(
          'table_local' => 'tx_org_downloads',
          'table_foreign' => 'tx_org_downloadsmedia'
        ),
        'foreign_table' => 'tx_org_downloadsmedia',
        'foreign_table_where' => 'AND tx_org_downloadsmedia.' . $str_store_record_conf . ' AND tx_org_downloadsmedia.deleted = 0 AND tx_org_downloadsmedia.hidden = 0 ORDER BY tx_org_downloadsmedia.title',
        'wizards' => array(
          '_PADDING' => 2,
          '_VERTICAL' => 0,
          'add' => array(
            'type' => 'script',
            'title' => 'LLL:EXT:org/Resources/Private/Language/locallang_db.xml:wizard.tx_org_downloadsmedia.add',
            'icon' => 'add.gif',
            'params' => array(
              'table' => 'tx_org_downloadsmedia',
              'pid' => $str_marker_pid,
              'setValue' => 'prepend'
            ),
            'script' => 'wizard_add.php',
          ),
          'list' => array(
            'type' => 'script',
            'title' => 'LLL:EXT:org/Resources/Private/Language/locallang_db.xml:wizard.tx_org_downloadsmedia.list',
            'icon' => 'list.gif',
            'params' => array(
              'table' => 'tx_org_downloadsmedia',
              'pid' => $str_marker_pid,
            ),
            'script' => 'wizard_list.php',
          ),
          'edit' => array(
            'type' => 'popup',
            'title' => 'LLL:EXT:org/Resources/Private/Language/locallang_db.xml:wizard.tx_org_downloadsmedia.edit',
            'script' => 'wizard_edit.php',
            'popup_onlyOpenIfSelected' => 1,
            'icon' => 'edit2.gif',
            'JSopenParams' => $JSopenParams,
          ),
        ),
      ),
      // #69257, 150821, dwildt, +
      'config_filter' => array(
        'type' => 'select',
        'size' => 1,
        'MM' => 'tx_org_mm_all',
        "MM_match_fields" => array(
          'table_local' => 'tx_org_downloads',
          'table_foreign' => 'tx_org_downloadsmedia'
        ),
        "MM_insert_fields" => array(
          'table_local' => 'tx_org_downloads',
          'table_foreign' => 'tx_org_downloadsmedia'
        ),
        'foreign_table' => 'tx_org_downloadsmedia',
        'foreign_table_where' => 'AND tx_org_downloadsmedia.' . $str_store_record_conf . ' AND tx_org_downloadsmedia.deleted = 0 AND tx_org_downloadsmedia.hidden = 0 ORDER BY tx_org_downloadsmedia.title',
        'items' => array(
          'empty' => array(
            '0' => '',
            '1' => '',
          ),
        ),
      ),
    ),
    'bodytext' => array(
      'exclude' => $bool_exclude_default,
      'l10n_mode' => 'prefixLangTitle',
      'label' => 'LLL:EXT:org/Resources/Private/Language/tx_org_downloads.xml:tx_org_downloads.bodytext',
      'config' => $conf_text_rte,
    ),
    'teaser_title' => array(
      'exclude' => $bool_exclude_default,
      'l10n_mode' => 'prefixLangTitle',
      'label' => 'LLL:EXT:org/Resources/Private/Language/tx_org_downloads.xml:tx_org_downloads.teaser_title',
      'config' => $conf_input_30_trim,
    ),
    'teaser_subtitle' => array(
      'exclude' => $bool_exclude_default,
      'l10n_mode' => 'prefixLangTitle',
      'label' => 'LLL:EXT:org/Resources/Private/Language/tx_org_downloads.xml:tx_org_downloads.teaser_subtitle',
      'config' => $conf_input_30_trim,
    ),
    'teaser_short' => array(
      'exclude' => $bool_exclude_default,
      'l10n_mode' => 'prefixLangTitle',
      'label' => 'LLL:EXT:org/Resources/Private/Language/tx_org_downloads.xml:tx_org_downloads.teaser_short',
      'config' => $conf_text_50_10,
    ),
    'thumbnail' => array(
      'exclude' => $bool_exclude_default,
      'l10n_mode' => 'mergeIfNotBlank',
      'label' => 'LLL:EXT:org/Resources/Private/Language/tx_org_downloads.xml:tx_org_downloads.thumbnail',
      'config' => $conf_file_one_image,
    ),
    'thumbnail_width' => array(
      'exclude' => $bool_exclude_default,
      'label' => 'LLL:EXT:org/Resources/Private/Language/tx_org_downloads.xml:tx_org_downloads.thumbnail_width',
      'config' => array(
        'type' => 'input',
        'size' => '10',
        'max' => '10',
        'eval' => 'trim',
        'checkbox' => '0',
        'default' => ''
      ),
    ),
    'thumbnail_height' => array(
      'exclude' => $bool_exclude_default,
      'label' => 'LLL:EXT:org/Resources/Private/Language/tx_org_downloads.xml:tx_org_downloads.thumbnail_height',
      'config' => array(
        'type' => 'input',
        'size' => '10',
        'max' => '10',
        'eval' => 'trim',
        'checkbox' => '0',
        'default' => ''
      ),
    ),
    'linkicon_width' => array(
      'exclude' => $bool_exclude_default,
      'label' => 'LLL:EXT:org/Resources/Private/Language/tx_org_downloads.xml:tx_org_downloads.linkicon_width',
      'config' => array(
        'type' => 'input',
        'size' => '10',
        'max' => '10',
        'eval' => 'trim',
        'checkbox' => '0',
        'default' => ''
      ),
    ),
    'linkicon_height' => array(
      'exclude' => $bool_exclude_default,
      'label' => 'LLL:EXT:org/Resources/Private/Language/tx_org_downloads.xml:tx_org_downloads.linkicon_height',
      'config' => array(
        'type' => 'input',
        'size' => '10',
        'max' => '10',
        'eval' => 'trim',
        'checkbox' => '0',
        'default' => ''
      ),
    ),
    'tx_flipit_layout' => array(
      'exclude' => 0,
      'label' => 'LLL:EXT:org/Resources/Private/Language/tx_org_downloads.xml:tx_org_downloads.tx_flipit_layout',
      'config' => array(
        'type' => 'select',
        'items' => array(
          array(
            'LLL:EXT:org/Resources/Private/Language/tx_org_downloads.xml:tx_org_downloads.tx_flipit_layout_item_00',
            'layout_00',
          ),
          array(
            'LLL:EXT:org/Resources/Private/Language/tx_org_downloads.xml:tx_org_downloads.tx_flipit_layout_item_01',
            'layout_01',
          ),
          array(
            'LLL:EXT:org/Resources/Private/Language/tx_org_downloads.xml:tx_org_downloads.tx_flipit_layout_item_02',
            'layout_02',
          ),
          array(
            'LLL:EXT:org/Resources/Private/Language/tx_org_downloads.xml:tx_org_downloads.tx_flipit_layout_item_03',
            'layout_03',
          ),
          array(
            'LLL:EXT:org/Resources/Private/Language/tx_org_downloads.xml:tx_org_downloads.tx_flipit_layout_item_ts',
            'ts',
          ),
        ),
        'default' => 'ts',
      ),
    ),
    'tx_flipit_quality' => array(
      'exclude' => 0,
      'label' => 'LLL:EXT:org/Resources/Private/Language/tx_org_downloads.xml:tx_org_downloads.tx_flipit_quality',
      'config' => array(
        'type' => 'select',
        'items' => array(
          array(
            'LLL:EXT:org/Resources/Private/Language/tx_org_downloads.xml:tx_org_downloads.tx_flipit_quality_item_high',
            'high',
          ),
          array(
            'LLL:EXT:org/Resources/Private/Language/tx_org_downloads.xml:tx_org_downloads.tx_flipit_quality_item_low',
            'low',
          ),
          array(
            'LLL:EXT:org/Resources/Private/Language/tx_org_downloads.xml:tx_org_downloads.tx_flipit_quality_item_ts',
            'ts',
          ),
        ),
        'default' => 'ts',
      ),
    ),
    'tx_flipit_pagelist' => array(
      'exclude' => 0,
      'label' => 'LLL:EXT:org/Resources/Private/Language/tx_org_downloads.xml:tx_org_downloads.tx_flipit_pagelist',
      'config' => array(
        'type' => 'input',
        'size' => '40',
        'max' => '256',
        'checkbox' => '',
        'eval' => 'trim',
      ),
    ),
    'tx_flipit_updateswfxml' => array(
      'exclude' => 0,
      'label' => 'LLL:EXT:org/Resources/Private/Language/tx_org_downloads.xml:tx_org_downloads.tx_flipit_updateswfxml',
      'config' => array(
        'type' => 'select',
        'items' => array(
          array(
            'LLL:EXT:org/Resources/Private/Language/tx_org_downloads.xml:tx_org_downloads.tx_flipit_updateswfxml_item_disabled',
            'disabled',
          ),
          array(
            'LLL:EXT:org/Resources/Private/Language/tx_org_downloads.xml:tx_org_downloads.tx_flipit_updateswfxml_item_enabled',
            'enabled',
          ),
          array(
            'LLL:EXT:org/Resources/Private/Language/tx_org_downloads.xml:tx_org_downloads.tx_flipit_updateswfxml_item_ts',
            'ts',
          ),
        ),
        'default' => 'ts',
      ),
    ),
    'tx_flipit_swf_files' => array(
      'exclude' => 0,
      'label' => 'LLL:EXT:org/Resources/Private/Language/tx_org_downloads.xml:tx_org_downloads.tx_flipit_swf_files',
      'config' => array(
        'type' => 'group',
        'internal_type' => 'file',
        'allowed' => 'swf',
        'max_size' => $GLOBALS[ 'TYPO3_CONF_VARS' ][ 'BE' ][ 'maxFileSize' ],
        'uploadfolder' => 'uploads/tx_flipit',
        'show_thumbs' => '1',
        'size' => '10',
        'maxitems' => '999',
        'minitems' => '0',
      ),
    ),
    'tx_flipit_xml_file' => array(
      'exclude' => 0,
      'label' => 'LLL:EXT:org/Resources/Private/Language/tx_org_downloads.xml:tx_org_downloads.tx_flipit_xml_file',
      'config' => array(
        'type' => 'group',
        'internal_type' => 'file',
        'allowed' => 'xml',
        'max_size' => $GLOBALS[ 'TYPO3_CONF_VARS' ][ 'BE' ][ 'maxFileSize' ],
        'uploadfolder' => 'uploads/tx_flipit',
        'show_thumbs' => '1',
        'size' => '1',
        'maxitems' => '1',
        'minitems' => '0',
      ),
    ),
    'tx_flipit_fancybox' => array(
      'exclude' => 0,
      'label' => 'LLL:EXT:org/Resources/Private/Language/tx_org_downloads.xml:tx_org_downloads.tx_flipit_fancybox',
      'config' => array(
        'type' => 'select',
        'items' => array(
          array(
            'LLL:EXT:org/Resources/Private/Language/tx_org_downloads.xml:tx_org_downloads.tx_flipit_fancybox_item_disabled',
            'disabled',
          ),
          array(
            'LLL:EXT:org/Resources/Private/Language/tx_org_downloads.xml:tx_org_downloads.tx_flipit_fancybox_item_enabled',
            'enabled',
          ),
          array(
            'LLL:EXT:org/Resources/Private/Language/tx_org_downloads.xml:tx_org_downloads.tx_flipit_fancybox_item_ts',
            'ts',
          ),
        ),
        'default' => 'ts',
      ),
    ),
    'tx_flipit_evaluate' => array(
      'exclude' => 0,
      'label' => 'LLL:EXT:org/Resources/Private/Language/tx_org_downloads.xml:tx_org_downloads.tx_flipit_evaluate',
      'config' => array(
        'type' => 'user',
        'userFunc' => 'tx_org_flexform->evaluate',
      ),
    ),
//    'fe_user' => array(
//      'exclude' => $bool_exclude_default,
////      'l10n_mode'   => 'exclude',
//      'label' => 'LLL:EXT:org/Resources/Private/Language/tx_org_downloads.xml:tx_org_downloads.fe_user',
//      'config' => array(
//        'type' => 'select',
//        'size' => $size_doc,
//        'suppress_icons' => 1,
//        'minitems' => 0,
//        'maxitems' => 1,
//        'items' => array(
//          '0' => array(
//            '0' => '',
//            '1' => '',
//          ),
//        ),
//        'MM' => 'fe_users_mm_tx_org_downloads',
//        'MM_opposite_field' => 'tx_org_downloads',
//        'foreign_table' => 'fe_users',
//        'foreign_table_where' => 'AND fe_users.' . $str_store_record_conf . ' AND fe_users.deleted = 0 AND fe_users.disable = 0 ORDER BY fe_users.last_name',
//        'wizards' => $arr_config_feuser[ 'wizards' ],
//      ),
//    ),
    'tx_org_staff' => array(
      'exclude' => 0,
      'l10n_mode' => 'mergeIfNotBlank',
      'label' => 'LLL:EXT:org/Resources/Private/Language/tx_org_downloads.xml:tx_org_downloads.tx_org_staff',
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
          'table_local' => 'tx_org_downloads',
          'table_foreign' => 'tx_org_staff'
        ),
        "MM_insert_fields" => array(
          'table_local' => 'tx_org_downloads',
          'table_foreign' => 'tx_org_staff'
        ),
        'foreign_table' => 'tx_org_staff',
        'foreign_table_where' => 'AND tx_org_staff.' . $str_store_record_conf . ' AND tx_org_staff.deleted = 0 AND tx_org_staff.hidden = 0 AND tx_org_staff.sys_language_uid=###REC_FIELD_sys_language_uid### ORDER BY tx_org_staff.title',
        'selectedListStyle' => $listStyleWidth,
        'itemListStyle' => $listStyleWidth,
      ),
      // #69257, 150821, dwildt, +
      'config_filter' => array(
        'type' => 'select',
        'size' => 1,
        'MM' => 'tx_org_mm_all',
        "MM_match_fields" => array(
          'table_local' => 'tx_org_downloads',
          'table_foreign' => 'tx_org_staff'
        ),
        "MM_insert_fields" => array(
          'table_local' => 'tx_org_downloads',
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
    'pages' => $conf_pages,
    'hidden' => $conf_hidden,
    'starttime' => $conf_starttime,
    'endtime' => $conf_endtime,
    'fe_group' => $conf_fegroup,
    'seo_keywords' => array(
      'exclude' => $bool_exclude_default,
      'label' => 'LLL:EXT:org/Resources/Private/Language/locallang_db.xml:tca_phrase.seo_keywords',
      'l10n_mode' => 'prefixLangTitle',
      'config' => $conf_input_80_trim,
    ),
    'seo_description' => array(
      'exclude' => $bool_exclude_default,
      'label' => 'LLL:EXT:org/Resources/Private/Language/locallang_db.xml:tca_phrase.seo_description',
      'l10n_mode' => 'prefixLangTitle',
      'config' => $conf_text_50_10,
    ),
    'statistics_hits' => array(
      'exclude' => $bool_exclude_default,
      'label' => 'LLL:EXT:org/Resources/Private/Language/locallang_db.xml:tca_phrase.statistics_hits',
      'config' => array(
        'type' => 'none',
        'size' => '10',
      ),
    ),
    'statistics_visits' => array(
      'exclude' => $bool_exclude_default,
      'label' => 'LLL:EXT:org/Resources/Private/Language/locallang_db.xml:tca_phrase.statistics_visits',
      'config' => array(
        'type' => 'none',
        'size' => '10',
      ),
    ),
    'statistics_downloads' => array(
      'exclude' => $bool_exclude_default,
      'label' => 'LLL:EXT:org/Resources/Private/Language/locallang_db.xml:tca_phrase.statistics_downloads',
      'config' => array(
        'type' => 'none',
        'size' => '10',
      ),
    ),
    'statistics_downloads_by_visits' => array(
      'exclude' => $bool_exclude_default,
      'label' => 'LLL:EXT:org/Resources/Private/Language/locallang_db.xml:tca_phrase.statistics_downloads_by_visits',
      'config' => array(
        'type' => 'none',
        'size' => '10',
      ),
    ),
  ),
  'types' => array(
    'download' => array( 'showitem' =>
      ''
      . '--div--;LLL:EXT:org/Resources/Private/Language/tx_org_downloads.xml:tx_org_downloads.div_doc,'
      . '  type,title;;;;1-1-1,subtitle,datetime,filterPrompt,tx_org_downloadscat,tx_org_downloadsmedia,bodytext;;;richtext[]:rte_transform[mode=ts];3-3-3,'
      . '--div--;LLL:EXT:org/Resources/Private/Language/tx_org_downloads.xml:tx_org_downloads.div_teaser,'
      . '  teaser_title;;;;6-6-6, teaser_subtitle, teaser_short,'
      . '--div--;LLL:EXT:org/Resources/Private/Language/tx_org_downloads.xml:tx_org_downloads.div_file,'
      . '  --palette--;LLL:EXT:org/Resources/Private/Language/locallang_db.xml:palette.type_documents_download;type_documents_download,'
      . '  --palette--;LLL:EXT:org/Resources/Private/Language/locallang_db.xml:palette.documentscaption;documentscaption,'
      . '  --palette--;LLL:EXT:org/Resources/Private/Language/locallang_db.xml:palette.thumbnail_size;thumbnail_size,'
      . '--div--;LLL:EXT:org/Resources/Private/Language/tx_org_downloads.xml:tx_org_downloads.div_link,        . '
      . '  --palette--;LLL:EXT:org/Resources/Private/Language/locallang_db.xml:palette.link;link,    . '
      . '  --palette--;LLL:EXT:org/Resources/Private/Language/locallang_db.xml:palette.linkicon_size;linkicon_size,'
      . '--div--;LLL:EXT:org/Resources/Private/Language/tx_org_downloads.xml:tx_org_downloads.div_flipit,'
      . '  tx_flipit_layout,'
      . '  --palette--;LLL:EXT:org/Resources/Private/Language/locallang_db.xml:palette.tx_flipit_files;tx_flipit_quality,'
      . '  --palette--;LLL:EXT:org/Resources/Private/Language/locallang_db.xml:palette.tx_flipit_files;tx_flipit_files,'
      . '  --palette--;LLL:EXT:org/Resources/Private/Language/locallang_db.xml:palette.tx_flipit_fancybox;tx_flipit_fancybox,'
      . '  tx_flipit_evaluate,'
//      . '--div--;LLL:EXT:org/Resources/Private/Language/tx_org_downloads.xml:tx_org_downloads.div_feuser,      fe_user,'
      . '--div--;LLL:EXT:org/Resources/Private/Language/tx_org_downloads.xml:tx_org_downloads.div_staff,'
      . '  tx_org_staff,'
      . '--div--;LLL:EXT:org/Resources/Private/Language/tx_org_downloads.xml:tx_org_downloads.div_control,'
      . '  sys_language_uid;;;;8-8-8, l10n_parent, l10n_diffsource, hidden;;3;;,fe_group,'
      . '--div--;LLL:EXT:org/Resources/Private/Language/tx_org_downloads.xml:tx_org_downloads.div_seo,'
      . '  seo_keywords,seo_description;;;;7-7-7, description,'
      . '--div--;LLL:EXT:org/Resources/Private/Language/tx_org_downloads.xml:tx_org_downloads.div_statistics,  '
      . '  --palette--;LLL:EXT:org/Resources/Private/Language/locallang_db.xml:palette.statistics;statistics,'
      . '' ),
    'download_shipping' => array( 'showitem' =>
      '--div--;LLL:EXT:org/Resources/Private/Language/tx_org_downloads.xml:tx_org_downloads.div_doc,'
      . '  type,title;;;;1-1-1,subtitle,datetime,filterPrompt,tx_org_downloadscat,tx_org_downloadsmedia,bodytext;;;richtext[]:rte_transform[mode=ts];3-3-3,'
      . '--div--;LLL:EXT:org/Resources/Private/Language/tx_org_downloads.xml:tx_org_downloads.div_teaser,'
      . '  teaser_title;;;;6-6-6, teaser_subtitle, teaser_short,'
      . '--div--;LLL:EXT:org/Resources/Private/Language/tx_org_downloads.xml:tx_org_downloads.div_file,'
      . '  --palette--;LLL:EXT:org/Resources/Private/Language/locallang_db.xml:palette.type_documents_download;type_documents_download,'
      . '  --palette--;LLL:EXT:org/Resources/Private/Language/locallang_db.xml:palette.documentscaption;documentscaption,'
      . '  --palette--;LLL:EXT:org/Resources/Private/Language/locallang_db.xml:palette.thumbnail_size;thumbnail_size,'
      . '--div--;LLL:EXT:org/Resources/Private/Language/tx_org_downloads.xml:tx_org_downloads.div_link,        . '
      . '  --palette--;LLL:EXT:org/Resources/Private/Language/locallang_db.xml:palette.link;link,    . '
      . '  --palette--;LLL:EXT:org/Resources/Private/Language/locallang_db.xml:palette.linkicon_size;linkicon_size,'
      . '--div--;LLL:EXT:org/Resources/Private/Language/tx_org_downloads.xml:tx_org_downloads.div_flipit,'
      . '  tx_flipit_layout,'
      . '  --palette--;LLL:EXT:org/Resources/Private/Language/locallang_db.xml:palette.tx_flipit_files;tx_flipit_quality,'
      . '  --palette--;LLL:EXT:org/Resources/Private/Language/locallang_db.xml:palette.tx_flipit_files;tx_flipit_files,'
      . '  --palette--;LLL:EXT:org/Resources/Private/Language/locallang_db.xml:palette.tx_flipit_fancybox;tx_flipit_fancybox,'
      . '  tx_flipit_evaluate,'
//      . '--div--;LLL:EXT:org/Resources/Private/Language/tx_org_downloads.xml:tx_org_downloads.div_feuser,      fe_user,'
      . '--div--;LLL:EXT:org/Resources/Private/Language/tx_org_downloads.xml:tx_org_downloads.div_staff,'
      . '  tx_org_staff,'
      . '--div--;LLL:EXT:org/Resources/Private/Language/tx_org_downloads.xml:tx_org_downloads.div_control,'
      . '  sys_language_uid;;;;8-8-8, l10n_parent, l10n_diffsource, hidden;;3;;,fe_group,'
      . '--div--;LLL:EXT:org/Resources/Private/Language/tx_org_downloads.xml:tx_org_downloads.div_seo,'
      . '  seo_keywords,seo_description;;;;7-7-7, description,'
      . '--div--;LLL:EXT:org/Resources/Private/Language/tx_org_downloads.xml:tx_org_downloads.div_statistics,  '
      . '  --palette--;LLL:EXT:org/Resources/Private/Language/locallang_db.xml:palette.statistics;statistics,'
      . '' ),
    'shipping' => array( 'showitem' =>
      '--div--;LLL:EXT:org/Resources/Private/Language/tx_org_downloads.xml:tx_org_downloads.div_doc,'
      . '  type,title;;;;1-1-1,subtitle,datetime,filterPrompt,tx_org_downloadscat,tx_org_downloadsmedia,bodytext;;;richtext[]:rte_transform[mode=ts];3-3-3,'
      . '--div--;LLL:EXT:org/Resources/Private/Language/tx_org_downloads.xml:tx_org_downloads.div_teaser,'
      . '  teaser_title;;;;6-6-6, teaser_subtitle, teaser_short,'
      . '--div--;LLL:EXT:org/Resources/Private/Language/tx_org_downloads.xml:tx_org_downloads.div_file,'
      . '  --palette--;LLL:EXT:org/Resources/Private/Language/locallang_db.xml:palette.type_documents_shipping;type_documents_shipping,'
      . '  --palette--;LLL:EXT:org/Resources/Private/Language/locallang_db.xml:palette.documentscaption;documentscaption,'
      . '  --palette--;LLL:EXT:org/Resources/Private/Language/locallang_db.xml:palette.thumbnail_size;thumbnail_size,'
      . '--div--;LLL:EXT:org/Resources/Private/Language/tx_org_downloads.xml:tx_org_downloads.div_link,        . '
      . '  --palette--;LLL:EXT:org/Resources/Private/Language/locallang_db.xml:palette.link_shipping;link_shipping,    . '
      . '  --palette--;LLL:EXT:org/Resources/Private/Language/locallang_db.xml:palette.linkicon_size;linkicon_size,'
      . '--div--;LLL:EXT:org/Resources/Private/Language/tx_org_downloads.xml:tx_org_downloads.div_flipit,'
      . '  tx_flipit_layout,'
      . '  --palette--;LLL:EXT:org/Resources/Private/Language/locallang_db.xml:palette.tx_flipit_files;tx_flipit_quality,'
      . '  --palette--;LLL:EXT:org/Resources/Private/Language/locallang_db.xml:palette.tx_flipit_files;tx_flipit_files,'
      . '  --palette--;LLL:EXT:org/Resources/Private/Language/locallang_db.xml:palette.tx_flipit_fancybox;tx_flipit_fancybox,'
      . '  tx_flipit_evaluate,'
//      . '--div--;LLL:EXT:org/Resources/Private/Language/tx_org_downloads.xml:tx_org_downloads.div_feuser,      fe_user,'
      . '--div--;LLL:EXT:org/Resources/Private/Language/tx_org_downloads.xml:tx_org_downloads.div_staff,'
      . '  tx_org_staff,'
      . '--div--;LLL:EXT:org/Resources/Private/Language/tx_org_downloads.xml:tx_org_downloads.div_control,'
      . '  sys_language_uid;;;;8-8-8, l10n_parent, l10n_diffsource, hidden;;3;;,fe_group,'
      . '--div--;LLL:EXT:org/Resources/Private/Language/tx_org_downloads.xml:tx_org_downloads.div_seo,'
      . '  seo_keywords,seo_description;;;;7-7-7, description,'
      . '--div--;LLL:EXT:org/Resources/Private/Language/tx_org_downloads.xml:tx_org_downloads.div_statistics,  '
      . '--palette--;LLL:EXT:org/Resources/Private/Language/locallang_db.xml:palette.statistics_shipping;statistics_shipping,'
      . '' ),
  ),
  'palettes' => array(
    '3' => array( 'showitem' => 'starttime, endtime' ),
    'documentscaption' => array(
      'showitem' => 'documentscaption;LLL:EXT:org/Resources/Private/Language/locallang_db.xml:tca_phrase.documentscaption',
      'canNotCollapse' => 1,
    ),
    'image_accessibility' => array(
      'showitem' => 'imageseo;LLL:EXT:org/Resources/Private/Language/locallang_db.xml:tca_phrase.imageseo',
      'canNotCollapse' => 1,
    ),
    'imageblock' => array(
      'showitem' => 'imageorient;LLL:EXT:cms/locallang_ttc.xml:imageorient_formlabel, imagecols;LLL:EXT:cms/locallang_ttc.xml:imagecols_formlabel, --linebreak--,'
      . 'image_noRows;LLL:EXT:cms/locallang_ttc.xml:image_noRows_formlabel, imagecaption_position;LLL:EXT:cms/locallang_ttc.xml:imagecaption_position_formlabel',
      'canNotCollapse' => 1,
    ),
    'imageblock_dirk' => array(
      'showitem' => 'imageorient;LLL:EXT:cms/locallang_ttc.xml:imageorient_formlabel',
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
      'showitem' => 'imagewidth;LLL:EXT:cms/locallang_ttc.xml:imagewidth_formlabel, imageheight;LLL:EXT:cms/locallang_ttc.xml:imageheight_formlabel, imageborder;LLL:EXT:cms/locallang_ttc.xml:imageborder_formlabel, --linebreak--,'
      . 'image_compression;LLL:EXT:cms/locallang_ttc.xml:image_compression_formlabel, image_effects;LLL:EXT:cms/locallang_ttc.xml:image_effects_formlabel, image_frames;LLL:EXT:cms/locallang_ttc.xml:image_frames_formlabel',
      'canNotCollapse' => 1,
    ),
    'link' => array(
      'showitem' => 'documentslayout;LLL:EXT:org/Resources/Private/Language/locallang_db.xml:tca_phrase.documentslayout,documents_display_label,documents_display_caption,documentssize;LLL:EXT:cms/locallang_ttc.xml:filelink_size_formlabel',
      'canNotCollapse' => 1,
    ),
    'linkicon_size' => array(
      'showitem' => 'linkicon_width;LLL:EXT:org/Resources/Private/Language/tx_org_downloads.xml:tx_org_downloads.linkicon_width, linkicon_height;LLL:EXT:org/Resources/Private/Language/tx_org_downloads.xml:tx_org_downloads.linkicon_height',
      'canNotCollapse' => 1,
    ),
    'link_shipping' => array(
      'showitem' => 'documentslayout;LLL:EXT:org/Resources/Private/Language/locallang_db.xml:tca_phrase.documentslayout,documents_display_label,documents_display_caption',
      'canNotCollapse' => 1,
    ),
    'statistics' => array(
      'showitem' => 'statistics_hits;LLL:EXT:org/Resources/Private/Language/locallang_db.xml:tca_phrase.statistics_hits,statistics_visits;LLL:EXT:org/Resources/Private/Language/locallang_db.xml:tca_phrase.statistics_visits,statistics_downloads;LLL:EXT:org/Resources/Private/Language/locallang_db.xml:tca_phrase.statistics_downloads,statistics_downloads_by_visits;LLL:EXT:org/Resources/Private/Language/locallang_db.xml:tca_phrase.statistics_downloads_by_visits',
      'canNotCollapse' => 1,
    ),
    'statistics_shipping' => array(
      'showitem' => 'statistics_hits;LLL:EXT:org/Resources/Private/Language/locallang_db.xml:tca_phrase.statistics_hits,statistics_visits;LLL:EXT:org/Resources/Private/Language/locallang_db.xml:tca_phrase.statistics_visits',
      'canNotCollapse' => 1,
    ),
    'thumbnail_size' => array(
      'showitem' => 'thumbnail_width;LLL:EXT:org/Resources/Private/Language/tx_org_downloads.xml:tx_org_downloads.thumbnail_width, thumbnail_height;LLL:EXT:org/Resources/Private/Language/tx_org_downloads.xml:tx_org_downloads.thumbnail_height',
      'canNotCollapse' => 1,
    ),
    'tx_flipit_fancybox' => array(
      'showitem' => 'tx_flipit_fancybox;LLL:EXT:org/Resources/Private/Language/tx_org_downloads.xml:tx_org_downloads.tx_flipit_fancybox',
      'canNotCollapse' => 1,
    ),
    'tx_flipit_files' => array(
      'showitem' => 'tx_flipit_updateswfxml;LLL:EXT:org/Resources/Private/Language/tx_org_downloads.xml:tx_org_downloads.tx_flipit_updateswfxml, --linebreak--,'
      . 'tx_flipit_xml_file;LLL:EXT:org/Resources/Private/Language/tx_org_downloads.xml:tx_org_downloads.tx_flipit_xml_file, --linebreak--,'
      . 'tx_flipit_swf_files;LLL:EXT:org/Resources/Private/Language/tx_org_downloads.xml:tx_org_downloads.tx_flipit_swf_files',
      'canNotCollapse' => 1,
    ),
    'tx_flipit_quality' => array(
      'showitem' => 'tx_flipit_quality;LLL:EXT:org/Resources/Private/Language/tx_org_downloads.xml:tx_org_downloads.tx_flipit_quality,'
      . 'tx_flipit_pagelist;LLL:EXT:org/Resources/Private/Language/tx_org_downloads.xml:tx_org_downloads.tx_flipit_pagelist',
      'canNotCollapse' => 1,
    ),
    'type_documents_download' => array(
      'showitem' => 'documents;LLL:EXT:org/Resources/Private/Language/tx_org_downloads.xml:tx_org_downloads.file,thumbnail;LLL:EXT:org/Resources/Private/Language/tx_org_downloads.xml:tx_org_downloads.thumbnail_type_documents_download',
      'canNotCollapse' => 1,
    ),
    'type_documents_shipping' => array(
      'showitem' => 'thumbnail;LLL:EXT:org/Resources/Private/Language/tx_org_downloads.xml:tx_org_downloads.thumbnail_type_documents_shipping',
      'canNotCollapse' => 1,
    ),
  ),
);
//if (!$bool_full_wizardSupport_catTables)
//{
//  unset($TCA['tx_org_downloads']['columns']['tx_org_downloadscat']['config']['wizards']['add']);
//  unset($TCA['tx_org_downloads']['columns']['tx_org_downloadscat']['config']['wizards']['list']);
//  unset($TCA['tx_org_downloads']['columns']['tx_org_downloadsmedia']['config']['wizards']['add']);
//  unset($TCA['tx_org_downloads']['columns']['tx_org_downloadsmedia']['config']['wizards']['list']);
//}

if ( !\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::isLoaded( 'flipit' ) )
{
  foreach ( $aTca[ 'types' ] as $key => $value )
  {
    $sSearch = '--div--;LLL:EXT:org/Resources/Private/Language/tx_org_downloads.xml:tx_org_downloads.div_flipit,'
            . 'tx_flipit_layout,';
    //var_dump( __METHOD__, __LINE__, $aTca[ 'types' ][ $key ] );
    $aTca[ 'types' ][ $key ] = str_replace( $sSearch, null, $aTca[ 'types' ][ $key ] );
  }
  //exit;
}

return $aTca;
