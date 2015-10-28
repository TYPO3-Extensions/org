<?php

if ( !defined( 'TYPO3_MODE' ) )
{
  die( 'Access denied.' );
}

// Configuration by the extension manager
require_once( PATH_typo3conf . 'ext/org/Configuration/ExtensionManager/simplifyer.php' );
// Default values and wizards
require_once( PATH_typo3conf . 'ext/org/Configuration/TCA/Defaults/defaultValues.php' );

return array(
  'ctrl' => array(
    'title' => 'LLL:EXT:org/Resources/Private/Language/tx_org_cal.xml:tx_org_cal',
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
    'iconfile' => t3lib_extMgm::extRelPath( $_EXTKEY ) . 'Resources/Public/Images/Icons/ExtIcon/cal.gif',
    'type' => 'type',
    'typeicon_column' => 'type',
    'typeicons' => array(
      'record' => '../typo3conf/ext/org/Resources/Public/Images/Icons/ExtIcon/caldirect.gif',
      'tx_org_event' => '../typo3conf/ext/org/Resources/Public/Images/Icons/ExtIcon/event.gif',
      'page' => '../typo3conf/ext/org/Resources/Public/Images/Icons/ExtIcon/page.gif',
      'url' => '../typo3conf/ext/org/Resources/Public/Images/Icons/ExtIcon/url.gif',
      'notype' => '../typo3conf/ext/org/Resources/Public/Images/Icons/ExtIcon/notype.gif',
      'calpage' => '../typo3conf/ext/org/Resources/Public/Images/Icons/ExtIcon/page.gif',
      'calurl' => '../typo3conf/ext/org/Resources/Public/Images/Icons/ExtIcon/url.gif',
    ),
    'searchFields' => ''
    . 'sys_language_uid,l10n_parent,l10n_diffsource,type,title,subtitle,datetime,datetimeend,tx_org_caltype,bodytext,tx_org_event,'
    . 'teaser_title,teaser_subtitle,teaser_short,'
    . 'marginal_title,marginal_subtitle,marginal_short,'
    . 'tx_org_location,tx_org_calentrance,'
    . 'tx_org_headquarters'
    . 'image,imagecaption,imageseo,imagewidth,imageheight,imageorient,imagecaption,imagecols,imageborder,imagecaption_position,image_link,image_zoom,image_noRows,image_effects,image_compression,'
//    . 'embeddedcode,print,printcaption,printseo,'
    . 'hidden,starttime,endtime,pages,fe_group,'
    . 'seo_keywords,seo_description',
    'useColumnsForDefaultValues' =>  ''
    . 'type,title,subtitle,datetime,datetimeend,bodytext,'
    . 'teaser_title,teaser_subtitle,teaser_short,'
    . 'marginal_title,marginal_subtitle,marginal_short,'
    . 'image,imagecaption,imageseo,imagewidth,imageheight,imageorient,imagecaption,imagecols,imageborder,imagecaption_position,image_link,image_zoom,image_noRows,image_effects,image_compression,'
//    . 'embeddedcode,print,printcaption,printseo,'
    . 'hidden,starttime,endtime,pages,'
    . 'seo_keywords,seo_description',
    // #69250, 150821, dwildt, 1+
    'filter' => 'filter_for_all_fields',
  ),
  'interface' => array(
    'showRecordFieldList' => ''
    . 'sys_language_uid,l10n_parent,l10n_diffsource,'
    . 'type,page,url,'
    . 'title,subtitle,datetime,datetimeend,tx_org_caltype,bodytext,tx_org_event,'
    . 'teaser_title,teaser_subtitle,teaser_short,'
    . 'marginal_title,marginal_subtitle,marginal_short,'
    . 'tx_org_location,'
    . 'tx_org_headquarters,'
    . 'tx_org_calentrance,' .
    'tx_org_caltype' .
    'image,imagecaption,imageseo,imagewidth,imageheight,imageorient,imagecaption,imagecols,imageborder,imagecaption_position,image_link,image_zoom,image_noRows,image_effects,image_compression,' .
//    'embeddedcode,print,printcaption,printseo,' .
    'hidden,starttime,endtime,pages,fe_group,' .
    'seo_keywords,seo_description'
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
      'label' => 'LLL:EXT:org/locallang_db.xml:type',
      'config' => array(
        'type' => 'select',
        'items' => array(
          'record' => array(
            '0' => 'LLL:EXT:org/locallang_db.xml:type_record',
            '1' => 'record',
            '2' => 'EXT:org/Resources/Public/Images/Icons/ExtIcon/cal.gif',
          ),
          'page' => array(
            '0' => 'LLL:EXT:org/locallang_db.xml:type_page',
            '1' => 'page',
            '2' => 'EXT:org/Resources/Public/Images/Icons/ExtIcon/page.gif',
          ),
          'url' => array(
            '0' => 'LLL:EXT:org/locallang_db.xml:type_url',
            '1' => 'url',
            '2' => 'EXT:org/Resources/Public/Images/Icons/ExtIcon/url.gif',
          ),
          'notype' => array(
            '0' => 'LLL:EXT:org/locallang_db.xml:type_notype',
            '1' => 'notype',
            '2' => 'EXT:org/Resources/Public/Images/Icons/ExtIcon/notype.gif',
          ),
          'tx_org_event' => array(
            '0' => 'LLL:EXT:org/Resources/Private/Language/tx_org_cal.xml:tx_org_cal.type.tx_org_event',
            '1' => 'tx_org_event',
            '2' => 'EXT:org/Resources/Public/Images/Icons/ExtIcon/event.gif',
          ),
//          'calpage' => array(
//            '0' => 'LLL:EXT:org/locallang_db.xml:type_pagedeprecated',
//            '1' => 'calpage',
//            '2' => 'EXT:org/Resources/Public/Images/Icons/ExtIcon/page.gif',
//          ),
//          'calurl' => array(
//            '0' => 'LLL:EXT:org/locallang_db.xml:type_urldeprecated',
//            '1' => 'calurl',
//            '2' => 'EXT:org/Resources/Public/Images/Icons/ExtIcon/url.gif',
//          ),
        ),
        'default' => 'record',
      ),
      // #69250, 150821, dwildt, 1+
      'config_filter' => array(
        'type' => 'select',
        'items' => array(
          'empty' => array(
            '0' => '',
            '1' => '',
          ),
          'record' => array(
            '0' => 'LLL:EXT:org/locallang_db.xml:type_record',
            '1' => 'record',
          ),
          'page' => array(
            '0' => 'LLL:EXT:org/locallang_db.xml:type_page',
            '1' => 'page',
          ),
          'url' => array(
            '0' => 'LLL:EXT:org/locallang_db.xml:type_url',
            '1' => 'url',
          ),
          'notype' => array(
            '0' => 'LLL:EXT:org/locallang_db.xml:type_notype',
            '1' => 'notype',
          ),
          'tx_org_event' => array(
            '0' => 'LLL:EXT:org/Resources/Private/Language/tx_org_cal.xml:tx_org_cal.type.tx_org_event',
            '1' => 'tx_org_event',
          ),
          'calpage' => array(
            '0' => 'LLL:EXT:org/locallang_db.xml:type_pagedeprecated',
            '1' => 'calpage',
          ),
          'calurl' => array(
            '0' => 'LLL:EXT:org/locallang_db.xml:type_urldeprecated',
            '1' => 'calurl',
          ),
        ),
      ),
    ),
    'page' => array(
      'label' => 'LLL:EXT:org/Resources/Private/Language/tx_org_cal.xml:tx_org_cal.page',
//      'l10n_mode' => 'mergeIfNotBlank',
      'exclude' => $bool_exclude_default,
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
      'label' => 'LLL:EXT:org/Resources/Private/Language/tx_org_cal.xml:tx_org_cal.url',
//      'l10n_mode' => 'mergeIfNotBlank',
      'exclude' => $bool_exclude_default,
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
      'l10n_mode' => 'prefixLangTitle',
      'label' => 'LLL:EXT:org/Resources/Private/Language/tx_org_cal.xml:tx_org_cal.title',
      'config' => $conf_input_30_trimRequired,
    ),
    'subtitle' => array(
      'exclude' => $bool_exclude_default,
      'l10n_mode' => 'prefixLangTitle',
      'label' => 'LLL:EXT:org/Resources/Private/Language/tx_org_cal.xml:tx_org_cal.subtitle',
      'config' => $conf_input_30_trim,
    ),
    'datetime' => array(
      'exclude' => $bool_exclude_default,
      'l10n_mode' => 'exclude',
      'label' => 'LLL:EXT:org/Resources/Private/Language/tx_org_cal.xml:tx_org_cal.datetime',
      'config' => $conf_datetime,
      'config_filter' => array(
        'type' => 'input',
        'size' => '8',
        'max' => '20',
        'eval' => 'date',
        'fromto' => true,
        'fromto_labels' => array(
          'from' => 'LLL:EXT:org/Resources/Private/Language/tx_org_cal.xml:tx_org_cal.datetime.from',
          'to' => 'LLL:EXT:org/Resources/Private/Language/tx_org_cal.xml:tx_org_cal.datetime.to',
        ),
      ),
    ),
    'datetimeend' => array(
      'exclude' => $bool_exclude_default,
      'l10n_mode' => 'exclude',
      'label' => 'LLL:EXT:org/Resources/Private/Language/tx_org_cal.xml:tx_org_cal.datetimeend',
      'config' => $conf_datetimeend,
    ),
    'tx_org_caltype' => array(
      'exclude' => $bool_exclude_default,
      'l10n_mode' => 'exclude',
      'label' => 'LLL:EXT:org/Resources/Private/Language/tx_org_cal.xml:tx_org_cal.tx_org_caltype',
      'config' => array(
        'type' => 'select',
        'size' => 10,
        'minitems' => 0,
        'maxitems' => 99,
        'items' => array(
          '0' => array(
            '0' => '',
            '1' => ''
          ),
        ),
        'suppress_icons' => 1,
        'MM' => 'tx_org_cal_mm_tx_org_caltype',
        'foreign_table' => 'tx_org_caltype',
        'foreign_table_where' => 'AND tx_org_caltype.' . $str_store_record_conf . ' '
        . 'AND tx_org_caltype.deleted = 0 '
        . 'AND tx_org_caltype.hidden = 0 ORDER BY tx_org_caltype.title'
        ,
        'form_type' => 'user',
        'userFunc' => 'tx_cpstcatree->getTree',
        'treeView' => 1,
        'expandable' => 1,
        'expandFirst' => 0,
        'expandAll' => 0,
        'wizards' => array(
          '_PADDING' => 2,
          '_VERTICAL' => 0,
          'add' => array(
            'type' => 'script',
            'title' => 'LLL:EXT:org/Resources/Private/Language/tx_org_cal.xml:wizard.tx_org_caltype.add',
            'icon' => 'add.gif',
            'params' => array(
              'table' => 'tx_org_caltype',
              'pid' => $str_marker_pid,
              'setValue' => 'prepend'
            ),
            'script' => 'wizard_add.php',
          ),
          'list' => array(
            'type' => 'script',
            'title' => 'LLL:EXT:org/Resources/Private/Language/tx_org_cal.xml:wizard.tx_org_caltype.list',
            'icon' => 'list.gif',
            'params' => array(
              'table' => 'tx_org_caltype',
              'pid' => $str_marker_pid,
            ),
            'script' => 'wizard_list.php',
          ),
          'edit' => array(
            'type' => 'popup',
            'title' => 'LLL:EXT:org/Resources/Private/Language/tx_org_cal.xml:wizard.tx_org_caltype.edit',
            'script' => 'wizard_edit.php',
            'popup_onlyOpenIfSelected' => 1,
            'icon' => 'edit2.gif',
            'JSopenParams' => $JSopenParams,
          ),
        ),
      ),
      // #69250, 150821, dwildt, +
      'config_filter' => array(
        'type' => 'select',
        'size' => 1,
        'MM' => 'tx_org_cal_mm_tx_org_caltype',
        'foreign_table' => 'tx_org_caltype',
        'foreign_table_where' => 'AND tx_org_caltype.' . $str_store_record_conf . ' '
        . 'AND tx_org_caltype.deleted = 0 '
        . 'AND tx_org_caltype.hidden = 0 ORDER BY tx_org_caltype.title'
        ,
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
      'label' => 'LLL:EXT:org/Resources/Private/Language/tx_org_cal.xml:tx_org_cal.bodytext',
      'config' => $conf_text_rte,
    ),
    'tx_org_event' => array(
      'exclude' => $bool_exclude_default,
      'l10n_mode' => 'exclude',
      'label' => 'LLL:EXT:org/Resources/Private/Language/tx_org_cal.xml:tx_org_cal.tx_org_event',
      'config' => array(
        'type' => 'select',
        //'size' => $size_event,
        'minitems' => 0,
        'maxitems' => 1,
        'MM' => 'tx_org_mm_all',
        "MM_match_fields" => array(
          'table_local' => 'tx_org_cal',
          'table_foreign' => 'tx_org_event'
        ),
        "MM_insert_fields" => array(
          'table_local' => 'tx_org_cal',
          'table_foreign' => 'tx_org_event'
        ),
        'foreign_table' => 'tx_org_event',
        'foreign_table_where' => 'AND tx_org_event.' . $str_store_record_conf
        . ' AND tx_org_event.deleted = 0 AND tx_org_event.hidden = 0'
        . ' AND tx_org_event.sys_language_uid=###REC_FIELD_sys_language_uid### '
        . 'ORDER BY tx_org_event.title'
        ,
        'items' => array(
          '0' => array(
            '0' => '',
            '1' => '',
          ),
        ),
        'selectedListStyle' => $listStyleWidth,
        'itemListStyle' => $listStyleWidth,
      ),
      // #69250, 150821, dwildt, +
      'config_filter' => array(
        'type' => 'select',
        'size' => 1,
        'MM' => 'tx_org_mm_all',
        "MM_match_fields" => array(
          'table_local' => 'tx_org_cal',
          'table_foreign' => 'tx_org_event'
        ),
        "MM_insert_fields" => array(
          'table_local' => 'tx_org_cal',
          'table_foreign' => 'tx_org_event'
        ),
        'foreign_table' => 'tx_org_event',
        'foreign_table_where' => 'AND tx_org_event.' . $str_store_record_conf
        . ' AND tx_org_event.deleted = 0 AND tx_org_event.hidden = 0'
        . ' AND tx_org_event.sys_language_uid=###REC_FIELD_sys_language_uid### '
        . 'ORDER BY tx_org_event.title'
        ,
        'items' => array(
          'empty' => array(
            '0' => '',
            '1' => '',
          ),
        ),
      ),
    ),
    'teaser_title' => array(
      'exclude' => $bool_exclude_default,
      'l10n_mode' => 'prefixLangTitle',
      'label' => 'LLL:EXT:org/Resources/Private/Language/tx_org_cal.xml:tx_org_cal.teaser_title',
      'config' => $conf_input_30_trim,
    ),
    'teaser_subtitle' => array(
      'exclude' => $bool_exclude_default,
      'l10n_mode' => 'prefixLangTitle',
      'label' => 'LLL:EXT:org/Resources/Private/Language/tx_org_cal.xml:tx_org_cal.teaser_subtitle',
      'config' => $conf_input_30_trim,
    ),
    'teaser_short' => array(
      'exclude' => $bool_exclude_default,
      'l10n_mode' => 'prefixLangTitle',
      'label' => 'LLL:EXT:org/Resources/Private/Language/tx_org_cal.xml:tx_org_cal.teaser_short',
      'config' => $conf_text_50_10,
    ),
    'marginal_title' => array(
      'exclude' => $bool_exclude_default,
      'l10n_mode' => 'prefixLangTitle',
      'label' => 'LLL:EXT:org/Resources/Private/Language/tx_org_cal.xml:tx_org_cal.marginal_title',
      'config' => $conf_input_30_trim,
    ),
    'marginal_subtitle' => array(
      'exclude' => $bool_exclude_default,
      'l10n_mode' => 'prefixLangTitle',
      'label' => 'LLL:EXT:org/Resources/Private/Language/tx_org_cal.xml:tx_org_cal.marginal_subtitle',
      'config' => $conf_input_30_trim,
    ),
    'marginal_short' => array(
      'exclude' => $bool_exclude_default,
      'l10n_mode' => 'prefixLangTitle',
      'label' => 'LLL:EXT:org/Resources/Private/Language/tx_org_cal.xml:tx_org_cal.marginal_short',
      'config' => $conf_text_50_10,
    ),
    'tx_org_location' => array(
      'exclude' => $bool_exclude_default,
      'l10n_mode' => 'exclude',
      'label' => 'LLL:EXT:org/Resources/Private/Language/tx_org_cal.xml:tx_org_cal.tx_org_location',
      'config' => array(
        'type' => 'select',
        'size' => $size_location,
        'minitems' => 0,
        'maxitems' => 1,
//        'MM' => 'tx_org_cal_mm_tx_org_location',
        'MM' => 'tx_org_mm_all',
        "MM_match_fields" => array(
          'table_local' => 'tx_org_cal',
          'table_foreign' => 'tx_org_location'
        ),
        "MM_insert_fields" => array(
          'table_local' => 'tx_org_cal',
          'table_foreign' => 'tx_org_location'
        ),
        'foreign_table' => 'tx_org_location',
        'foreign_table_where' => 'AND tx_org_location.' . $str_store_record_conf . ' AND tx_org_location.deleted = 0 AND tx_org_location.hidden = 0 AND tx_org_location.sys_language_uid=###REC_FIELD_sys_language_uid### ORDER BY tx_org_location.mail_city, tx_org_location.title',
        'items' => array(
          '0' => array(
            '0' => '',
            '1' => '',
          ),
        ),
        'suppress_icons' => 1,
      ),
      // #69250, 150821, dwildt, +
      'config_filter' => array(
        'type' => 'select',
        'size' => 1,
        'MM' => 'tx_org_mm_all',
        "MM_match_fields" => array(
          'table_local' => 'tx_org_cal',
          'table_foreign' => 'tx_org_location'
        ),
        "MM_insert_fields" => array(
          'table_local' => 'tx_org_cal',
          'table_foreign' => 'tx_org_location'
        ),
        'foreign_table' => 'tx_org_location',
        'foreign_table_where' => 'AND tx_org_location.' . $str_store_record_conf . ' AND tx_org_location.deleted = 0 AND tx_org_location.hidden = 0 AND tx_org_location.sys_language_uid=###REC_FIELD_sys_language_uid### ORDER BY tx_org_location.mail_city, tx_org_location.title',
        'items' => array(
          'empty' => array(
            '0' => '',
            '1' => '',
          ),
        ),
      ),
    ),
    'tx_org_headquarters' => array(
      'exclude' => $bool_exclude_default,
      'l10n_mode' => 'exclude',
      'label' => 'LLL:EXT:org/Resources/Private/Language/tx_org_cal.xml:tx_org_cal.tx_org_headquarters',
      'config' => array(
        'type' => 'select',
        'size' => $size_location,
        'minitems' => 0,
        'maxitems' => 1,
        'MM' => 'tx_org_mm_all',
        'MM_opposite_field' => 'tx_org_cal',
        "MM_match_fields" => array(
          'table_local' => 'tx_org_headquarters',
          'table_foreign' => 'tx_org_cal'
        ),
        "MM_insert_fields" => array(
          'table_local' => 'tx_org_headquarters',
          'table_foreign' => 'tx_org_cal'
        ),
        'foreign_table' => 'tx_org_headquarters',
        'foreign_table_where' => 'AND tx_org_headquarters.' . $str_store_record_conf . ' AND tx_org_headquarters.deleted = 0 AND tx_org_headquarters.hidden = 0 AND tx_org_headquarters.sys_language_uid=###REC_FIELD_sys_language_uid### ORDER BY tx_org_headquarters.title',
        'items' => array(
          '0' => array(
            '0' => '',
            '1' => '',
          ),
        ),
        'suppress_icons' => 1,
      ),
      // #69250, 150821, dwildt, +
      'config_filter' => array(
        'type' => 'select',
        'size' => 1,
        'MM' => 'tx_org_mm_all',
        'MM_opposite_field' => 'tx_org_cal',
        "MM_match_fields" => array(
          'table_local' => 'tx_org_headquarters',
          'table_foreign' => 'tx_org_cal'
        ),
        "MM_insert_fields" => array(
          'table_local' => 'tx_org_headquarters',
          'table_foreign' => 'tx_org_cal'
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
    'tx_org_calentrance' => array(
      'exclude' => $bool_exclude_default,
      'l10n_mode' => 'exclude',
      'label' => 'LLL:EXT:org/Resources/Private/Language/tx_org_cal.xml:tx_org_cal.tx_org_calentrance',
      'config' => array(
        'type' => 'select',
        'size' => 10,
        'minitems' => 0,
        'maxitems' => 999,
//        'MM' => 'tx_org_cal_mm_tx_org_calentrance',
        'MM' => 'tx_org_mm_all',
        "MM_match_fields" => array(
          'table_local' => 'tx_org_cal',
          'table_foreign' => 'tx_org_calentrance'
        ),
        "MM_insert_fields" => array(
          'table_local' => 'tx_org_cal',
          'table_foreign' => 'tx_org_calentrance'
        ),
        'foreign_table' => 'tx_org_calentrance',
        'foreign_table_where' => 'AND tx_org_calentrance.' . $str_store_record_conf . ' AND tx_org_calentrance.deleted = 0 AND tx_org_calentrance.hidden = 0 ORDER BY tx_org_calentrance.title',
        'wizards' => array(
          '_PADDING' => 2,
          '_VERTICAL' => 0,
          'add' => array(
            'type' => 'script',
            'title' => 'LLL:EXT:org/Resources/Private/Language/tx_org_cal.xml:wizard.tx_org_calentrance.add',
            'icon' => 'add.gif',
            'params' => array(
              'table' => 'tx_org_calentrance',
              'pid' => $str_marker_pid,
              'setValue' => 'prepend'
            ),
            'script' => 'wizard_add.php',
          ),
          'list' => array(
            'type' => 'script',
            'title' => 'LLL:EXT:org/Resources/Private/Language/tx_org_cal.xml:wizard.tx_org_calentrance.list',
            'icon' => 'list.gif',
            'params' => array(
              'table' => 'tx_org_calentrance',
              'pid' => $str_marker_pid,
            ),
            'script' => 'wizard_list.php',
          ),
          'edit' => array(
            'type' => 'popup',
            'title' => 'LLL:EXT:org/Resources/Private/Language/tx_org_cal.xml:wizard.tx_org_calentrance.edit',
            'script' => 'wizard_edit.php',
            'popup_onlyOpenIfSelected' => 1,
            'icon' => 'edit2.gif',
            'JSopenParams' => $JSopenParams,
          ),
        ),
      ),
    ),
    'tx_org_caltype' => array(
      'exclude' => 0,
      'l10n_mode' => 'exclude',
      'label' => 'LLL:EXT:org/Resources/Private/Language/tx_org_cal.xml:tx_org_cal.tx_org_caltype',
      'config' => array(
        'type' => 'select',
        'size' => 10,
        'minitems' => 0,
        'maxitems' => 999,
//        'MM' => 'tx_org_caltype_mm_tx_org_cal',
//        'MM_opposite_field' => 'tx_org_cal',
//        'foreign_table' => 'tx_org_caltype',
//        'foreign_table_where' => 'AND tx_org_caltype.' . $str_store_record_conf . ' AND tx_org_caltype.deleted = 0 AND tx_org_caltype.hidden = 0 AND tx_org_caltype.sys_language_uid=###REC_FIELD_sys_language_uid### ORDER BY tx_org_caltype.title',
        'MM' => 'tx_org_mm_all',
        "MM_match_fields" => array(
          'table_local' => 'tx_org_cal',
          'table_foreign' => 'tx_org_caltype'
        ),
        "MM_insert_fields" => array(
          'table_local' => 'tx_org_cal',
          'table_foreign' => 'tx_org_caltype'
        ),
        'foreign_table' => 'tx_org_caltype',
        'foreign_table_where' => 'AND tx_org_caltype.' . $str_store_record_conf
        . ' AND tx_org_caltype.deleted = 0 AND tx_org_caltype.hidden = 0'
        . ' ORDER BY tx_org_caltype.title'
        ,
        'selectedListStyle' => $listStyleWidth,
        'itemListStyle' => $listStyleWidth,
        'wizards' => array(
          '_PADDING' => 2,
          '_VERTICAL' => 0,
          'add' => array(
            'type' => 'script',
            'title' => 'LLL:EXT:org/Resources/Private/Language/tx_org_cal.xml:wizard.tx_org_caltype.add',
            'icon' => 'add.gif',
            'params' => array(
              'table' => 'tx_org_caltype',
              'pid' => $str_marker_pid,
              'setValue' => 'prepend'
            ),
            'script' => 'wizard_add.php',
          ),
          'list' => array(
            'type' => 'script',
            'title' => 'LLL:EXT:org/Resources/Private/Language/tx_org_cal.xml:wizard.tx_org_caltype.list',
            'icon' => 'list.gif',
            'params' => array(
              'table' => 'tx_org_caltype',
              'pid' => $str_marker_pid,
            ),
            'script' => 'wizard_list.php',
          ),
          'edit' => array(
            'type' => 'popup',
            'title' => 'LLL:EXT:org/Resources/Private/Language/tx_org_cal.xml:wizard.tx_org_caltype.edit',
            'script' => 'wizard_edit.php',
            'popup_onlyOpenIfSelected' => 1,
            'icon' => 'edit2.gif',
            'JSopenParams' => $JSopenParams,
          ),
        ),
      ),
      // #69250, 150821, dwildt, +
      'config_filter' => array(
        'type' => 'select',
        'size' => 1,
        'MM' => 'tx_org_mm_all',
        "MM_match_fields" => array(
          'table_local' => 'tx_org_cal',
          'table_foreign' => 'tx_org_caltype'
        ),
        "MM_insert_fields" => array(
          'table_local' => 'tx_org_cal',
          'table_foreign' => 'tx_org_caltype'
        ),
        'foreign_table' => 'tx_org_caltype',
        'foreign_table_where' => 'AND tx_org_caltype.' . $str_store_record_conf
        . ' AND tx_org_caltype.deleted = 0 AND tx_org_caltype.hidden = 0'
        . ' ORDER BY tx_org_caltype.title'
        ,
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
//      'l10n_mode' => 'exclude',
      'label' => 'LLL:EXT:org/locallang_db.xml:tca_phrase.image',
      'config' => $conf_file_image,
    ),
    'imagecaption' => array(
      'exclude' => $bool_exclude_default,
      'l10n_mode' => 'prefixLangTitle',
      'label' => 'LLL:EXT:org/locallang_db.xml:tca_phrase.imagecaption',
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
      'label' => 'LLL:EXT:org/locallang_db.xml:tca_phrase.imageseo',
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
//      'l10n_mode' => 'exclude',
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
//      'l10n_mode' => 'exclude',
      'label' => 'LLL:EXT:cms/locallang_ttc.xml:imageborder',
      'config' => array(
        'type' => 'check'
      ),
    ),
    'image_noRows' => array(
      'exclude' => $bool_exclude_none,
//      'l10n_mode' => 'exclude',
      'label' => 'LLL:EXT:cms/locallang_ttc.xml:image_noRows',
      'config' => array(
        'type' => 'check'
      ),
    ),
    'image_link' => array(
      'exclude' => $bool_exclude_default,
//      'l10n_mode' => 'exclude',
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
//      'l10n_mode' => 'exclude',
      'label' => 'LLL:EXT:cms/locallang_ttc.xml:image_zoom',
      'config' => array(
        'type' => 'check'
      ),
    ),
    'image_effects' => array(
      'exclude' => $bool_exclude_default,
//      'l10n_mode' => 'exclude',
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
//      'l10n_mode' => 'exclude',
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
//      'l10n_mode' => 'exclude',
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
//      'l10n_mode' => 'exclude',
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
//    'embeddedcode' => array(
//      'exclude' => $bool_exclude_none,
////      'l10n_mode' => 'exclude',
//      'label' => 'LLL:EXT:org/locallang_db.xml:tca_phrase.embeddedcode',
//      'config' => $conf_text_50_10,
//    ),
//    'print' => array(
//      'exclude' => $bool_exclude_none,
//      'l10n_mode' => 'exclude',
//      'label' => 'LLL:EXT:org/locallang_db.xml:tca_phrase.print',
//      'config' => $conf_file_image,
//    ),
//    'printcaption' => array(
//      'exclude' => $bool_exclude_none,
//      'l10n_mode' => 'prefixLangTitle',
//      'label' => 'LLL:EXT:org/locallang_db.xml:tca_phrase.imagecaption',
//      'config' => $conf_text_30_05,
//    ),
//    'printseo' => array(
//      'exclude' => $bool_exclude_none,
//      'l10n_mode' => 'prefixLangTitle',
//      'label' => 'LLL:EXT:org/locallang_db.xml:tca_phrase.imageseo',
//      'config' => $conf_text_30_05,
//    ),
    'hidden' => $conf_hidden,
    'starttime' => $conf_starttime,
    'endtime' => $conf_endtime,
    'pages' => $conf_pages,
    'fe_group' => $conf_fegroup,
    'seo_keywords' => array(
      'exclude' => $bool_exclude_default,
      'label' => 'LLL:EXT:org/locallang_db.xml:tca_phrase.seo_keywords',
      'l10n_mode' => 'prefixLangTitle',
      'config' => $conf_input_80_trim,
    ),
    'seo_description' => array(
      'exclude' => $bool_exclude_default,
      'label' => 'LLL:EXT:org/locallang_db.xml:tca_phrase.seo_description',
      'l10n_mode' => 'prefixLangTitle',
      'config' => $conf_text_50_10,
    ),
  ),
  'types' => array(
    'record' => array( 'showitem' => ''
      . '--div--;LLL:EXT:org/Resources/Private/Language/tx_org_cal.xml:tx_org_cal.div_calendar,'
      . '  type,'
      . '  title,subtitle,'
      . '  --palette--;LLL:EXT:org/Resources/Private/Language/tx_org_cal.xml:palette.datetime_datetimeend;datetime_datetimeend,'
      . '  tx_org_caltype,bodytext;;;richtext[]:rte_transform[mode=ts];,'
      . '--div--;LLL:EXT:org/Resources/Private/Language/tx_org_cal.xml:tx_org_cal.div_teaser,'
      . '  teaser_title,teaser_subtitle,teaser_short,'
      . '--div--;LLL:EXT:org/Resources/Private/Language/tx_org_cal.xml:tx_org_cal.div_marginal,'
      . '  marginal_title,marginal_subtitle,marginal_short,'
      . '--div--;LLL:EXT:org/Resources/Private/Language/tx_org_cal.xml:tx_org_cal.div_event,'
      . '  tx_org_location,tx_org_headquarters,tx_org_calentrance,' .
      '--div--;LLL:EXT:cms/locallang_ttc.xml:tabs.images,' .
      '--palette--;LLL:EXT:cms/locallang_ttc.xml:palette.imagefiles;imagefiles,' .
      '--palette--;LLL:EXT:org/Resources/Private/Language/tx_org_cal.xml:palette.image_accessibility;image_accessibility,' .
      '--palette--;LLL:EXT:cms/locallang_ttc.xml:palette.imageblock;imageblock,' .
      '--palette--;LLL:EXT:cms/locallang_ttc.xml:palette.imagelinks;imagelinks,' .
      '--palette--;LLL:EXT:cms/locallang_ttc.xml:palette.image_settings;image_settings,' .
      '--div--;LLL:EXT:cms/locallang_ttc.xml:tabs.media,' .
      '--palette--;LLL:EXT:cms/locallang_ttc.xml:media;documents_upload,' .
      '--palette--;LLL:EXT:org/Resources/Private/Language/tx_org_cal.xml:palette.appearance;documents_appearance,' .
//      '--div--;LLL:EXT:org/Resources/Private/Language/tx_org_cal.xml:tx_org_cal.div_embedded,    embeddedcode,print,printcaption,printseo,' .
      '--div--;LLL:EXT:org/Resources/Private/Language/tx_org_cal.xml:tx_org_cal.div_control,     hidden;;1;;,pages,fe_group,' .
      '--div--;LLL:EXT:org/Resources/Private/Language/tx_org_cal.xml:tx_org_cal.div_seo,         seo_keywords,seo_description' .
      '' ),
    // Copy of record
    'notype' => array( 'showitem' => ''
      . '--div--;LLL:EXT:org/Resources/Private/Language/tx_org_cal.xml:tx_org_cal.div_calendar,'
      . '  type,'
      . '  title,subtitle,'
      . '  --palette--;LLL:EXT:org/Resources/Private/Language/tx_org_cal.xml:palette.datetime_datetimeend;datetime_datetimeend,'
      . '  tx_org_caltype,bodytext;;;richtext[]:rte_transform[mode=ts];,'
      . '--div--;LLL:EXT:org/Resources/Private/Language/tx_org_cal.xml:tx_org_cal.div_teaser,'
      . '  teaser_title,teaser_subtitle,teaser_short,'
      . '--div--;LLL:EXT:org/Resources/Private/Language/tx_org_cal.xml:tx_org_cal.div_marginal,'
      . '  marginal_title,marginal_subtitle,marginal_short,'
      . '--div--;LLL:EXT:org/Resources/Private/Language/tx_org_cal.xml:tx_org_cal.div_event,'
      . '  tx_org_location,tx_org_headquarters,tx_org_calentrance,' .
      '--div--;LLL:EXT:cms/locallang_ttc.xml:tabs.images,' .
      '--palette--;LLL:EXT:cms/locallang_ttc.xml:palette.imagefiles;imagefiles,' .
      '--palette--;LLL:EXT:org/Resources/Private/Language/tx_org_cal.xml:palette.image_accessibility;image_accessibility,' .
      '--palette--;LLL:EXT:cms/locallang_ttc.xml:palette.imageblock;imageblock,' .
      '--palette--;LLL:EXT:cms/locallang_ttc.xml:palette.imagelinks;imagelinks,' .
      '--palette--;LLL:EXT:cms/locallang_ttc.xml:palette.image_settings;image_settings,' .
      '--div--;LLL:EXT:cms/locallang_ttc.xml:tabs.media,' .
      '--palette--;LLL:EXT:cms/locallang_ttc.xml:media;documents_upload,' .
      '--palette--;LLL:EXT:org/Resources/Private/Language/tx_org_cal.xml:palette.appearance;documents_appearance,' .
//      '--div--;LLL:EXT:org/Resources/Private/Language/tx_org_cal.xml:tx_org_cal.div_embedded,    embeddedcode,print,printcaption,printseo,' .
      '--div--;LLL:EXT:org/Resources/Private/Language/tx_org_cal.xml:tx_org_cal.div_control,     hidden;;1;;,pages,fe_group,' .
      '--div--;LLL:EXT:org/Resources/Private/Language/tx_org_cal.xml:tx_org_cal.div_seo,         seo_keywords,seo_description' .
      '' ),
    'noitem' => array(
      'showitem' => 'This is a copy of the type record. See allocation below this array configuration.'
    ),
    'page' => array( 'showitem' => ''
      . '--div--;LLL:EXT:org/Resources/Private/Language/tx_org_cal.xml:tx_org_cal.div_calendar,'
      . '  --palette--;LLL:EXT:org/Resources/Private/Language/tx_org_cal.xml:tx_org_cal.palette_typepage;typepage,'
      . '  title,subtitle,datetime,tx_org_caltype,bodytext;;;richtext[]:rte_transform[mode=ts];,'
      . '--div--;LLL:EXT:org/Resources/Private/Language/tx_org_cal.xml:tx_org_cal.div_teaser,'
      . '  teaser_title,teaser_subtitle,teaser_short,'
      . '--div--;LLL:EXT:org/Resources/Private/Language/tx_org_cal.xml:tx_org_cal.div_marginal,'
      . '  marginal_title,marginal_subtitle,marginal_short,'
      . '--div--;LLL:EXT:org/Resources/Private/Language/tx_org_cal.xml:tx_org_cal.div_event,'
      . '  tx_org_location,tx_org_headquarters,tx_org_calentrance,'
      . '--div--;LLL:EXT:cms/locallang_ttc.xml:tabs.images,' .
      '--palette--;LLL:EXT:cms/locallang_ttc.xml:palette.imagefiles;imagefiles,' .
      '--palette--;LLL:EXT:org/Resources/Private/Language/tx_org_cal.xml:palette.image_accessibility;image_accessibility,' .
      '--palette--;LLL:EXT:cms/locallang_ttc.xml:palette.imageblock;imageblock,' .
      '--palette--;LLL:EXT:cms/locallang_ttc.xml:palette.imagelinks;imagelinks,' .
      '--palette--;LLL:EXT:cms/locallang_ttc.xml:palette.image_settings;image_settings,' .
      '--div--;LLL:EXT:org/Resources/Private/Language/tx_org_cal.xml:tx_org_cal.div_control,     hidden;;1;;,pages,fe_group,' .
      '' ),
    'url' => array( 'showitem' => ''
      . '--div--;LLL:EXT:org/Resources/Private/Language/tx_org_cal.xml:tx_org_cal.div_calendar,'
      . '  --palette--;LLL:EXT:org/Resources/Private/Language/tx_org_cal.xml:tx_org_cal.palette_typeurl;typeurl,'
      . '  title,subtitle,datetime,tx_org_caltype,bodytext;;;richtext[]:rte_transform[mode=ts];,'
      . '--div--;LLL:EXT:org/Resources/Private/Language/tx_org_cal.xml:tx_org_cal.div_teaser,'
      . '  teaser_title,teaser_subtitle,teaser_short,'
      . '--div--;LLL:EXT:org/Resources/Private/Language/tx_org_cal.xml:tx_org_cal.div_marginal,'
      . '  marginal_title,marginal_subtitle,marginal_short,'
      . '--div--;LLL:EXT:org/Resources/Private/Language/tx_org_cal.xml:tx_org_cal.div_event,'
      . '  tx_org_location,tx_org_headquarters,tx_org_calentrance,'
      . '--div--;LLL:EXT:cms/locallang_ttc.xml:tabs.images,' .
      '--palette--;LLL:EXT:cms/locallang_ttc.xml:palette.imagefiles;imagefiles,' .
      '--palette--;LLL:EXT:org/Resources/Private/Language/tx_org_cal.xml:palette.image_accessibility;image_accessibility,' .
      '--palette--;LLL:EXT:cms/locallang_ttc.xml:palette.imageblock;imageblock,' .
      '--palette--;LLL:EXT:cms/locallang_ttc.xml:palette.imagelinks;imagelinks,' .
      '--palette--;LLL:EXT:cms/locallang_ttc.xml:palette.image_settings;image_settings,' .
      '--div--;LLL:EXT:org/Resources/Private/Language/tx_org_cal.xml:tx_org_cal.div_control,     hidden;;1;;,pages,fe_group,' .
      '' ),
    'tx_org_event' => array( 'showitem' => ''
      . '--div--;LLL:EXT:org/Resources/Private/Language/tx_org_cal.xml:tx_org_cal.div_calendar,'
      . '    type,'
      . 'title,datetime,tx_org_caltype,tx_org_event,'
      . '--div--;LLL:EXT:org/Resources/Private/Language/tx_org_cal.xml:tx_org_cal.div_event,'
      . '  tx_org_location,tx_org_headquarters,tx_org_calentrance,' .
      '--div--;LLL:EXT:org/Resources/Private/Language/tx_org_cal.xml:tx_org_cal.div_control,     hidden;;1;;,fe_group' .
      '' ),
  ),
  'palettes' => array(
    '1' => array( 'showitem' => 'starttime,endtime,' ),
    'documents_appearance' => array(
      'showitem' => 'documentslayout;LLL:EXT:org/locallang_db.xml:tca_phrase.documentslayout,documentssize;LLL:EXT:cms/locallang_ttc.xml:filelink_size_formlabel',
      'canNotCollapse' => 1,
    ),
    'datetime_datetimeend' => array(
      'showitem' => 'datetime, datetimeend',
      'canNotCollapse' => 1,
    ),
    'documents_upload' => array(
      'showitem' => 'documents_from_path;LLL:EXT:org/locallang_db.xml:tca_phrase.documents_from_path, --linebreak--,' .
      'documents;LLL:EXT:cms/locallang_ttc.xml:media.ALT.uploads_formlabel, documentscaption;LLL:EXT:cms/locallang_ttc.xml:imagecaption.ALT.uploads_formlabel;;nowrap, --linebreak--,',
      'canNotCollapse' => 1,
    ),
    'image_accessibility' => array(
      'showitem' => 'imageseo;LLL:EXT:org/locallang_db.xml:tca_phrase.imageseo,',
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
    'typepage' => array(
      'showitem' => ''
      . 'type;LLL:EXT:org/Resources/Private/Language/tx_org_cal.xml:tx_org_cal.type,'
      . 'page;LLL:EXT:org/Resources/Private/Language/tx_org_cal.xml:tx_org_cal.page'
      ,
      'canNotCollapse' => 1,
    ),
    'typeurl' => array(
      'showitem' => ''
      . 'type;LLL:EXT:org/Resources/Private/Language/tx_org_cal.xml:tx_org_cal.type,'
      . 'url;LLL:EXT:org/Resources/Private/Language/tx_org_cal.xml:tx_org_cal.url'
      ,
      'canNotCollapse' => 1,
    ),
  ),
);

//if ( !$bool_full_wizardSupport_catTables )
//{
//  unset( $TCA[ 'tx_org_cal' ][ 'columns' ][ 'tx_org_calentrance' ][ 'config' ][ 'wizards' ][ 'add' ] );
//  unset( $TCA[ 'tx_org_cal' ][ 'columns' ][ 'tx_org_calentrance' ][ 'config' ][ 'wizards' ][ 'list' ] );
//  unset( $TCA[ 'tx_org_cal' ][ 'columns' ][ 'tx_org_caltype' ][ 'config' ][ 'wizards' ][ 'add' ] );
//  unset( $TCA[ 'tx_org_cal' ][ 'columns' ][ 'tx_org_caltype' ][ 'config' ][ 'wizards' ][ 'list' ] );
//}
//if ( !$bool_full_wizardSupport_allTables )
//{
//  unset( $TCA[ 'tx_org_cal' ][ 'columns' ][ 'tx_org_event' ][ 'config' ][ 'wizards' ][ 'add' ] );
//  unset( $TCA[ 'tx_org_cal' ][ 'columns' ][ 'tx_org_event' ][ 'config' ][ 'wizards' ][ 'list' ] );
//  unset( $TCA[ 'tx_org_cal' ][ 'columns' ][ 'tx_org_location' ][ 'config' ][ 'wizards' ][ 'add' ] );
//  unset( $TCA[ 'tx_org_cal' ][ 'columns' ][ 'tx_org_location' ][ 'config' ][ 'wizards' ][ 'list' ] );
//}
//
// tx_org_cal