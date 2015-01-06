<?php

if ( !defined( 'TYPO3_MODE' ) )
{
  die( 'Access denied.' );
}

$TCA[ 'tx_org_location' ] = array(
  'ctrl' => $TCA[ 'tx_org_location' ][ 'ctrl' ],
  'interface' => array(
    'showRecordFieldList' => ''
    . 'sys_language_uid,l10n_parent,l10n_diffsource,'
    . 'type,page,url,'
    . 'title,tx_org_locationcat,bodytext,'
    . 'mail_address,mail_street,mail_postcode,mail_city,mail_country,geoupdateprompt,geoupdateforbidden,mail_lat,mail_lon,mail_url,mail_embeddedcode,'
    . 'telephone,ticket_telephone,ticket_url,fax,email,'
    . 'tx_org_cal,'
    . 'tx_org_headquarters,'
    . 'tx_org_staff,'
    . 'pubtrans_stop,pubtrans_url,pubtrans_embeddedcode,citymap_url,citymap_embeddedcode,'
    . 'documents_from_path,documents,documentscaption,documentslayout,documentssize,'
    . 'image,imagecaption,imageseo,imagewidth,imageheight,imageorient,imagecaption,imagecols,imageborder,imagecaption_position,image_link,image_zoom,image_noRows,image_effects,image_compression,'
    . 'embeddedcode,'
    . 'hidden,pages,fe_group,'
    . 'seo_keywords,seo_description'
  ,
  ),
  'feInterface' => $TCA[ 'tx_org_location' ][ 'feInterface' ],
  'columns' => array(
    'sys_language_uid' => array(
      'exclude' => 1,
      'label' => 'LLL:EXT:lang/locallang_general.php:LGL.language',
      'config' => array(
        'type' => 'select',
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
        'items' => array(
          array( '', 0 ),
        ),
        'foreign_table' => 'tx_org_location',
        'foreign_table_where' => 'AND tx_org_location.uid=###REC_FIELD_l10n_parent### AND tx_org_location.sys_language_uid IN (-1,0)',
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
            '2' => 'EXT:org/Configuration/ExtIcon/location.gif',
          ),
          'page' => array(
            '0' => 'LLL:EXT:org/locallang_db.xml:type_page',
            '1' => 'page',
            '2' => 'EXT:org/Configuration/ExtIcon/page.gif',
          ),
          'url' => array(
            '0' => 'LLL:EXT:org/locallang_db.xml:type_url',
            '1' => 'url',
            '2' => 'EXT:org/Configuration/ExtIcon/url.gif',
          ),
          'notype' => array(
            '0' => 'LLL:EXT:org/locallang_db.xml:type_notype',
            '1' => 'notype',
            '2' => 'EXT:org/Configuration/ExtIcon/notype.gif',
          ),
        ),
        'default' => 'record',
      ),
    ),
    'page' => array(
      'exclude' => $bool_exclude_default,
//      'l10n_mode' => 'exclude',
      'label' => 'LLL:EXT:org/locallang_db.xml:page',
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
      'label' => 'LLL:EXT:org/locallang_db.xml:url',
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
      'label' => 'LLL:EXT:org/Configuration/Tca/Locallang/tx_org_location.xml:tx_org_location.title',
      'config' => $conf_input_30_trimRequired,
    ),
    'tx_org_locationcat' => array(
      'exclude' => $bool_exclude_default,
      'l10n_mode' => 'exclude',
      'label' => 'LLL:EXT:org/Configuration/Tca/Locallang/tx_org_location.xml:tx_org_location.tx_org_locationcat',
      'config' => array(
        'type' => 'select',
        'size' => 10,
        'minitems' => 0,
        'maxitems' => 99,
        'MM' => 'tx_org_mm_all',
        "MM_match_fields" => array(
          'table_local' => 'tx_org_location',
          'table_foreign' => 'tx_org_locationcat'
        ),
        "MM_insert_fields" => array(
          'table_local' => 'tx_org_location',
          'table_foreign' => 'tx_org_locationcat'
        ),
        'foreign_table' => 'tx_org_locationcat',
        // #58885, 140516, dwildt, 6+
        'form_type' => 'user',
        'userFunc' => 'tx_cpstcatree->getTree',
        'treeView' => 1,
        'expandable' => 1,
        'expandFirst' => 0,
        'expandAll' => 0,
        'foreign_table_where' => 'AND tx_org_locationcat.' . $str_store_record_conf . ' AND tx_org_locationcat.deleted = 0 AND tx_org_locationcat.hidden = 0 ORDER BY tx_org_locationcat.title',
      ),
    ),
    'bodytext' => array(
      'exclude' => 0,
      'label' => 'LLL:EXT:org/Configuration/Tca/Locallang/tx_org_location.xml:tx_org_location.bodytext',
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
            'title' => 'LLL:EXT:org/locallang_db.xml:wizard.rte.fullscreen',
            'icon' => 'wizard_rte2.gif',
            'script' => 'wizard_rte.php',
          ),
        ),
      ),
    ),
    'url' => array(
      'label' => 'LLL:EXT:org/Configuration/Tca/Locallang/tx_org_location.xml:tx_org_location.url',
      'exclude' => $bool_exclude_default,
      'config' => $arr_wizard_url,
    ),
    'mail_address' => array(
      'exclude' => $bool_exclude_default,
      'l10n_mode' => 'exclude',
      'label' => 'LLL:EXT:org/Configuration/Tca/Locallang/tx_org_location.xml:tx_org_location.mail_address',
      'config' => $conf_text_30_05,
    ),
    'mail_street' => array(
      'exclude' => $bool_exclude_default,
//      'l10n_mode' => 'exclude',
      'label' => 'LLL:EXT:org/Configuration/Tca/Locallang/tx_org_location.xml:tx_org_location.mail_street',
      'config' => array(
        'type' => 'input',
        'size' => '60',
        'eval' => 'trim'
      ),
    ),
    'mail_postcode' => array(
      'exclude' => $bool_exclude_default,
      'l10n_mode' => 'exclude',
      'label' => 'LLL:EXT:org/Configuration/Tca/Locallang/tx_org_location.xml:tx_org_location.mail_postcode',
      'config' => $conf_input_30_trim,
    ),
    'mail_city' => array(
      'exclude' => $bool_exclude_default,
      'l10n_mode' => 'exclude',
      'label' => 'LLL:EXT:org/Configuration/Tca/Locallang/tx_org_location.xml:tx_org_location.mail_city',
      'config' => $conf_input_30,
    ),
    'mail_country' => array(
      'exclude' => $bool_exclude_default,
      'l10n_mode' => 'exclude',
      'label' => 'LLL:EXT:org/Configuration/Tca/Locallang/tx_org_location.xml:tx_org_location.mail_country',
      'config' => $conf_input_30,
    ),
    'mail_lat' => array(
      'exclude' => $bool_exclude_default,
      'l10n_mode' => 'exclude',
      'label' => 'LLL:EXT:org/Configuration/Tca/Locallang/tx_org_location.xml:tx_org_location.mail_lat',
      'config' => $conf_input_30,
    ),
    'mail_lon' => array(
      'exclude' => $bool_exclude_default,
      'l10n_mode' => 'exclude',
      'label' => 'LLL:EXT:org/Configuration/Tca/Locallang/tx_org_location.xml:tx_org_location.mail_lon',
      'config' => $conf_input_30,
    ),
    'mail_url' => array(
      'exclude' => $bool_exclude_default,
      'l10n_mode' => 'exclude',
      'label' => 'LLL:EXT:org/Configuration/Tca/Locallang/tx_org_location.xml:tx_org_location.mail_url',
      'config' => $arr_wizard_url,
    ),
    'mail_embeddedcode' => array(
      'exclude' => $bool_exclude_default,
      'l10n_mode' => 'exclude',
      'label' => 'LLL:EXT:org/Configuration/Tca/Locallang/tx_org_location.xml:tx_org_location.mail_embeddedcode',
      'config' => $conf_text_50_10,
    ),
    'geoupdateprompt' => array(
      'exclude' => 0,
      'label' => 'LLL:EXT:org/Configuration/Tca/Locallang/tx_org_location.xml:tx_org_location.geoupdateprompt',
      'config' => $conf_text_50_10,
    ),
    'geoupdateforbidden' => array(
      'exclude' => 0,
      'label' => 'LLL:EXT:org/Configuration/Tca/Locallang/tx_org_location.xml:tx_org_location.geoupdateforbidden',
      'config' => array(
        'type' => 'check',
        'default' => '0'
      )
    ),
    'telephone' => array(
      'exclude' => $bool_exclude_default,
      'l10n_mode' => 'exclude',
      'label' => 'LLL:EXT:org/Configuration/Tca/Locallang/tx_org_location.xml:tx_org_location.telephone',
      'config' => $conf_input_30_trim,
    ),
    'ticket_telephone' => array(
      'exclude' => $bool_exclude_default,
      'l10n_mode' => 'exclude',
      'label' => 'LLL:EXT:org/Configuration/Tca/Locallang/tx_org_location.xml:tx_org_location.ticket_telephone',
      'config' => $conf_input_30_trim,
    ),
    'ticket_url' => array(
      'exclude' => $bool_exclude_default,
      'l10n_mode' => 'exclude',
      'label' => 'LLL:EXT:org/Configuration/Tca/Locallang/tx_org_location.xml:tx_org_location.ticket_url',
      'config' => $arr_wizard_url,
    ),
    'fax' => array(
      'exclude' => $bool_exclude_default,
      'l10n_mode' => 'exclude',
      'label' => 'LLL:EXT:org/Configuration/Tca/Locallang/tx_org_location.xml:tx_org_location.fax',
      'config' => $conf_input_30_trim,
    ),
    'email' => array(
      'exclude' => $bool_exclude_default,
      'l10n_mode' => 'exclude',
      'label' => 'LLL:EXT:org/Configuration/Tca/Locallang/tx_org_location.xml:tx_org_location.email',
      'config' => $conf_input_30_trim,
    ),
    'tx_org_cal' => array(
      'exclude' => $bool_exclude_default,
      'l10n_mode' => 'exclude',
      'label' => 'LLL:EXT:org/Configuration/Tca/Locallang/tx_org_location.xml:tx_org_location.tx_org_cal',
      'config' => array(
        'type' => 'select',
        'size' => $size_calendar,
        'minitems' => 0,
        'maxitems' => 999,
//        'MM' => 'tx_org_cal_mm_tx_org_location',
        'MM_opposite_field' => 'tx_org_location',
        'MM' => 'tx_org_mm_all',
        "MM_match_fields" => array(
          'table_local' => 'tx_org_cal',
          'table_foreign' => 'tx_org_location'
        ),
        "MM_insert_fields" => array(
          'table_local' => 'tx_org_cal',
          'table_foreign' => 'tx_org_location'
        ),
        'foreign_table' => 'tx_org_cal',
        'foreign_table_where' => 'AND tx_org_cal.' . $str_store_record_conf . ' AND tx_org_cal.deleted = 0 AND tx_org_cal.hidden = 0 AND tx_org_cal.sys_language_uid=###REC_FIELD_sys_language_uid### ORDER BY tx_org_cal.datetime DESC, title',
        'wizards' => array(
          '_PADDING' => 2,
          '_VERTICAL' => 0,
          'add' => array(
            'type' => 'script',
            'title' => 'LLL:EXT:org/locallang_db.xml:wizard.tx_org_cal.add',
            'icon' => 'add.gif',
            'params' => array(
              'table' => 'tx_org_cal',
              'pid' => $str_marker_pid,
              'setValue' => 'prepend'
            ),
            'script' => 'wizard_add.php',
          ),
          'list' => array(
            'type' => 'script',
            'title' => 'LLL:EXT:org/locallang_db.xml:wizard.tx_org_cal.list',
            'icon' => 'list.gif',
            'params' => array(
              'table' => 'tx_org_cal',
              'pid' => $str_marker_pid,
            ),
            'script' => 'wizard_list.php',
          ),
          'edit' => array(
            'type' => 'popup',
            'title' => 'LLL:EXT:org/locallang_db.xml:wizard.tx_org_cal.edit',
            'script' => 'wizard_edit.php',
            'popup_onlyOpenIfSelected' => 1,
            'icon' => 'edit2.gif',
            'JSopenParams' => $JSopenParams,
          ),
        ),
      ),
    ),
    'tx_org_headquarters' => array(
      'l10n_mode' => 'exclude',
      'exclude' => 0,
      'l10n_mode' => 'exclude',
      'label' => 'LLL:EXT:org/Configuration/Tca/Locallang/tx_org_location.xml:tx_org_location.tx_org_headquarters',
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
        'MM_opposite_field' => 'tx_org_location',
        "MM_match_fields" => array(
          'table_local' => 'tx_org_headquarters',
          'table_foreign' => 'tx_org_location'
        ),
        "MM_insert_fields" => array(
          'table_local' => 'tx_org_headquarters',
          'table_foreign' => 'tx_org_location'
        ),
        'foreign_table' => 'tx_org_headquarters',
        'foreign_table_where' => 'AND tx_org_headquarters.' . $str_store_record_conf . ' AND tx_org_headquarters.deleted = 0 AND tx_org_headquarters.hidden = 0 AND tx_org_headquarters.sys_language_uid=###REC_FIELD_sys_language_uid### ORDER BY tx_org_headquarters.title',
        'selectedListStyle' => $listStyleWidth,
        'itemListStyle' => $listStyleWidth,
      )
    ),
    'tx_org_staff' => array(
      'l10n_mode' => 'exclude',
      'exclude' => 0,
      'l10n_mode' => 'exclude',
      'label' => 'LLL:EXT:org/Configuration/Tca/Locallang/tx_org_location.xml:tx_org_location.tx_org_staff',
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
          'table_local' => 'tx_org_location',
          'table_foreign' => 'tx_org_staff'
        ),
        "MM_insert_fields" => array(
          'table_local' => 'tx_org_location',
          'table_foreign' => 'tx_org_staff'
        ),
        'foreign_table' => 'tx_org_staff',
        'foreign_table_where' => 'AND tx_org_staff.' . $str_store_record_conf . ' AND tx_org_staff.deleted = 0 AND tx_org_staff.hidden = 0 AND tx_org_staff.sys_language_uid=###REC_FIELD_sys_language_uid### ORDER BY tx_org_staff.title',
        'selectedListStyle' => $listStyleWidth,
        'itemListStyle' => $listStyleWidth,
      )
    ),
    'pubtrans_stop' => array(
      'exclude' => $bool_exclude_default,
      'l10n_mode' => 'exclude',
      'label' => 'LLL:EXT:org/Configuration/Tca/Locallang/tx_org_location.xml:tx_org_location.pubtrans_stop',
      'config' => $conf_text_rte,
    ),
    'pubtrans_url' => array(
      'exclude' => $bool_exclude_default,
      'l10n_mode' => 'exclude',
      'label' => 'LLL:EXT:org/Configuration/Tca/Locallang/tx_org_location.xml:tx_org_location.pubtrans_url',
      'config' => $arr_wizard_url,
    ),
    'pubtrans_embeddedcode' => array(
      'exclude' => $bool_exclude_default,
      'l10n_mode' => 'exclude',
      'label' => 'LLL:EXT:org/Configuration/Tca/Locallang/tx_org_location.xml:tx_org_location.pubtrans_embeddedcode',
      'config' => $conf_text_50_10,
    ),
    'citymap_url' => array(
      'exclude' => $bool_exclude_default,
      'l10n_mode' => 'exclude',
      'label' => 'LLL:EXT:org/Configuration/Tca/Locallang/tx_org_location.xml:tx_org_location.citymap_url',
      'config' => $arr_wizard_url,
    ),
    'citymap_embeddedcode' => array(
      'exclude' => $bool_exclude_default,
      'l10n_mode' => 'exclude',
      'label' => 'LLL:EXT:org/Configuration/Tca/Locallang/tx_org_location.xml:tx_org_location.citymap_embeddedcode',
      'config' => $conf_text_30_05,
    ),
    'image' => array(
      'exclude' => $bool_exclude_default,
      'l10n_mode' => 'exclude',
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
      'l10n_mode' => 'exclude',
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
      'l10n_mode' => 'exclude',
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
      'l10n_mode' => 'exclude',
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
      'l10n_mode' => 'exclude',
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
      'l10n_mode' => 'exclude',
      'label' => 'LLL:EXT:cms/locallang_ttc.xml:imageborder',
      'config' => array(
        'type' => 'check'
      ),
    ),
    'image_noRows' => array(
      'exclude' => $bool_exclude_none,
      'l10n_mode' => 'exclude',
      'label' => 'LLL:EXT:cms/locallang_ttc.xml:image_noRows',
      'config' => array(
        'type' => 'check'
      ),
    ),
    'image_link' => array(
      'exclude' => $bool_exclude_default,
      'l10n_mode' => 'exclude',
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
      'l10n_mode' => 'exclude',
      'label' => 'LLL:EXT:cms/locallang_ttc.xml:image_zoom',
      'config' => array(
        'type' => 'check'
      ),
    ),
    'image_effects' => array(
      'exclude' => $bool_exclude_default,
      'l10n_mode' => 'exclude',
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
      'l10n_mode' => 'exclude',
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
      'l10n_mode' => 'exclude',
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
      'l10n_mode' => 'exclude',
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
    'embeddedcode' => array(
      'exclude' => $bool_exclude_none,
//      'l10n_mode' => 'exclude',
      'label' => 'LLL:EXT:org/locallang_db.xml:tca_phrase.embeddedcode',
      'config' => $conf_text_50_10,
    ),
    'documents_from_path' => array(
      'exclude' => $bool_exclude_default,
//      'l10n_mode' => 'exclude',
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
//      'l10n_mode' => 'exclude',
      'label' => 'LLL:EXT:org/locallang_db.xml:tca_phrase.documents',
      'config' => $conf_file_document,
    ),
    'documentscaption' => array(
      'exclude' => $bool_exclude_default,
//      'l10n_mode' => 'exclude',
      'label' => 'LLL:EXT:org/locallang_db.xml:tca_phrase.documentscaption',
      'config' => $conf_text_30_05,
    ),
    'documentslayout' => array(
      'exclude' => $bool_exclude_default,
//      'l10n_mode' => 'exclude',
      'label' => 'LLL:EXT:org/locallang_db.xml:tca_phrase.documentslayout',
      'config' => array(
        'type' => 'select',
        'size' => 1,
        'maxitems' => 1,
        'items' => array(
          array( 'LLL:EXT:org/locallang_db.xml:tca_phrase.documentslayout.0', 0 ),
          array( 'LLL:EXT:org/locallang_db.xml:tca_phrase.documentslayout.1', 1 ),
          array( 'LLL:EXT:org/locallang_db.xml:tca_phrase.documentslayout.2', 2 ),
        ),
      ),
    ),
    'documentssize' => array(
      'exclude' => $bool_exclude_default,
//      'l10n_mode' => 'exclude',
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
    'hidden' => $conf_hidden,
    'pages' => $conf_pages,
    'fe_group' => $conf_fegroup,
    'seo_keywords' => array(
      'exclude' => $bool_exclude_default,
      'l10n_mode' => 'prefixLangTitle',
      'label' => 'LLL:EXT:org/locallang_db.xml:tca_phrase.seo_keywords',
      'config' => $conf_input_80_trim,
    ),
    'seo_description' => array(
      'exclude' => $bool_exclude_default,
      'l10n_mode' => 'prefixLangTitle',
      'label' => 'LLL:EXT:org/locallang_db.xml:tca_phrase.seo_description',
      'config' => $conf_text_50_10,
    ),
  ),
  'types' => array(
    'noitem' => array(
      'showitem' => 'This is a copy of the type record. See allocation below this array configuration.'
    ),
    'record' => array( 'showitem' => ''
      . '--div--;LLL:EXT:org/Configuration/Tca/Locallang/tx_org_location.xml:tx_org_location.div_location, '
      . '  --palette--;LLL:EXT:org/locallang_db.xml:palette_typerecord;typerecord,'
      . '  title,tx_org_locationcat,'
      . '  bodytext;;;richtext[]:rte_transform[mode=ts],'
      . '--div--;LLL:EXT:org/Configuration/Tca/Locallang/tx_org_location.xml:tx_org_location.div_mail, '
      . '  --palette--;LLL:EXT:org/Configuration/Tca/Locallang/tx_org_location.xml:tx_org_location.palette_mailaddress;mailaddress, '
      . '  --palette--;LLL:EXT:org/Configuration/Tca/Locallang/tx_org_location.xml:tx_org_location.palette_maillatlon;maillatlon, '
      . '  mail_url,mail_embeddedcode,'
      . '--div--;LLL:EXT:org/Configuration/Tca/Locallang/tx_org_location.xml:tx_org_location.div_contact,'
      . '  telephone,ticket_telephone,ticket_url,fax,email,'
      . '--div--;LLL:EXT:org/Configuration/Tca/Locallang/tx_org_location.xml:tx_org_location.div_calendar,'
      . '  tx_org_cal,'
      . '--div--;LLL:EXT:org/Configuration/Tca/Locallang/tx_org_location.xml:tx_org_location.div_headquarters,'
      . '  tx_org_headquarters,'
      . '--div--;LLL:EXT:org/Configuration/Tca/Locallang/tx_org_location.xml:tx_org_location.div_staff,'
      . '  tx_org_staff,'
      . '--div--;LLL:EXT:org/Configuration/Tca/Locallang/tx_org_location.xml:tx_org_location.div_pubtrans,'
      . '  pubtrans_stop;;;richtext[]:rte_transform[mode=ts],pubtrans_url,pubtrans_embeddedcode,citymap_url,citymap_embeddedcode,'
      . '--div--;LLL:EXT:cms/locallang_ttc.xml:tabs.images,'
      . '  --palette--;LLL:EXT:cms/locallang_ttc.xml:palette.imagefiles;imagefiles,'
      . '  --palette--;LLL:EXT:org/locallang_db.xml:palette.image_accessibility;image_accessibility,'
      . '  --palette--;LLL:EXT:cms/locallang_ttc.xml:palette.imageblock;imageblock,'
      . '  --palette--;LLL:EXT:cms/locallang_ttc.xml:palette.imagelinks;imagelinks,'
      . '  --palette--;LLL:EXT:cms/locallang_ttc.xml:palette.image_settings;image_settings,'
      . '--div--;LLL:EXT:cms/locallang_ttc.xml:tabs.media,'
      . '  --palette--;LLL:EXT:cms/locallang_ttc.xml:media;documents_upload,'
      . '  --palette--;LLL:EXT:org/locallang_db.xml:palette.appearance;documents_appearance,'
      . '--div--;LLL:EXT:org/Configuration/Tca/Locallang/tx_org_location.xml:tx_org_location.div_embedded,'
      . '  embeddedcode,'
      . '--div--;LLL:EXT:org/Configuration/Tca/Locallang/tx_org_location.xml:tx_org_location.div_control,'
      . '  hidden,pages,fe_group,'
      . '--div--;LLL:EXT:org/Configuration/Tca/Locallang/tx_org_location.xml:tx_org_location.div_seo,'
      . '  seo_keywords,seo_description, description,'
    ,
    ),
    'page' => array( 'showitem' => ''
      . '--div--;LLL:EXT:org/Configuration/Tca/Locallang/tx_org_location.xml:tx_org_location.div_location, '
      . '  --palette--;LLL:EXT:org/locallang_db.xml:palette_typepage;typepage,'
      . '  title,tx_org_locationcat,'
      . '--div--;LLL:EXT:org/Configuration/Tca/Locallang/tx_org_location.xml:tx_org_location.div_mail, '
      . '  --palette--;LLL:EXT:org/Configuration/Tca/Locallang/tx_org_location.xml:tx_org_location.palette_mailaddress;mailaddress, '
      . '  --palette--;LLL:EXT:org/Configuration/Tca/Locallang/tx_org_location.xml:tx_org_location.palette_maillatlon;maillatlon, '
      . '  mail_url,mail_embeddedcode,'
      . '--div--;LLL:EXT:org/Configuration/Tca/Locallang/tx_org_location.xml:tx_org_location.div_calendar,'
      . '  tx_org_cal,'
      . '--div--;LLL:EXT:org/Configuration/Tca/Locallang/tx_org_location.xml:tx_org_location.div_headquarters,'
      . '  tx_org_headquarters,'
      . '--div--;LLL:EXT:org/Configuration/Tca/Locallang/tx_org_location.xml:tx_org_location.div_staff,'
      . '  tx_org_staff,'
      . '--div--;LLL:EXT:cms/locallang_ttc.xml:tabs.images,'
      . '  --palette--;LLL:EXT:cms/locallang_ttc.xml:palette.imagefiles;imagefiles,'
      . '  --palette--;LLL:EXT:org/locallang_db.xml:palette.image_accessibility;image_accessibility,'
      . '  --palette--;LLL:EXT:cms/locallang_ttc.xml:palette.imageblock;imageblock,'
      . '  --palette--;LLL:EXT:cms/locallang_ttc.xml:palette.imagelinks;imagelinks,'
      . '  --palette--;LLL:EXT:cms/locallang_ttc.xml:palette.image_settings;image_settings,'
      . '--div--;LLL:EXT:org/Configuration/Tca/Locallang/tx_org_location.xml:tx_org_location.div_control,'
      . '  hidden,pages,fe_group,'
    ,
    ),
    'url' => array( 'showitem' => ''
      . '--div--;LLL:EXT:org/Configuration/Tca/Locallang/tx_org_location.xml:tx_org_location.div_location, '
      . '  --palette--;LLL:EXT:org/locallang_db.xml:palette_typeurl;typeurl,'
      . '  title,tx_org_locationcat,'
      . '--div--;LLL:EXT:org/Configuration/Tca/Locallang/tx_org_location.xml:tx_org_location.div_mail, '
      . '  --palette--;LLL:EXT:org/Configuration/Tca/Locallang/tx_org_location.xml:tx_org_location.palette_mailaddress;mailaddress, '
      . '  --palette--;LLL:EXT:org/Configuration/Tca/Locallang/tx_org_location.xml:tx_org_location.palette_maillatlon;maillatlon, '
      . '  mail_url,mail_embeddedcode,'
      . '--div--;LLL:EXT:org/Configuration/Tca/Locallang/tx_org_location.xml:tx_org_location.div_calendar,'
      . '  tx_org_cal,'
      . '--div--;LLL:EXT:org/Configuration/Tca/Locallang/tx_org_location.xml:tx_org_location.div_headquarters,'
      . '  tx_org_headquarters,'
      . '--div--;LLL:EXT:org/Configuration/Tca/Locallang/tx_org_location.xml:tx_org_location.div_staff,'
      . '  tx_org_staff,'
      . '--div--;LLL:EXT:cms/locallang_ttc.xml:tabs.images,'
      . '  --palette--;LLL:EXT:cms/locallang_ttc.xml:palette.imagefiles;imagefiles,'
      . '  --palette--;LLL:EXT:org/locallang_db.xml:palette.image_accessibility;image_accessibility,'
      . '  --palette--;LLL:EXT:cms/locallang_ttc.xml:palette.imageblock;imageblock,'
      . '  --palette--;LLL:EXT:cms/locallang_ttc.xml:palette.imagelinks;imagelinks,'
      . '  --palette--;LLL:EXT:cms/locallang_ttc.xml:palette.image_settings;image_settings,'
      . '--div--;LLL:EXT:org/Configuration/Tca/Locallang/tx_org_location.xml:tx_org_location.div_control,'
      . '  hidden,pages,fe_group,'
    ,
    ),
  ),
  'palettes' => array(
    'documents_appearance' => array(
      'showitem' => 'documentslayout;LLL:EXT:org/locallang_db.xml:tca_phrase.documentslayout,documentssize;LLL:EXT:cms/locallang_ttc.xml:filelink_size_formlabel',
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
    'mailaddress' => array(
      'showitem' => ''
      . 'mail_address;LLL:EXT:org/Configuration/Tca/Locallang/tx_org_location.xml:tx_org_location.mail_address,--linebreak--,'
      . 'mail_street;LLL:EXT:org/Configuration/Tca/Locallang/tx_org_location.xml:tx_org_location.mail_street,--linebreak--,'
      . 'mail_postcode;LLL:EXT:org/Configuration/Tca/Locallang/tx_org_location.xml:tx_org_location.mail_postcode,'
      . 'mail_city;LLL:EXT:org/Configuration/Tca/Locallang/tx_org_location.xml:tx_org_location.mail_city,--linebreak--,'
      . 'mail_country;LLL:EXT:org/Configuration/Tca/Locallang/tx_org_location.xml:tx_org_location.mail_country,',
      'canNotCollapse' => 1,
    ),
    'maillatlon' => array(
      'showitem' => ''
      . 'geoupdateprompt;LLL:EXT:org/Configuration/Tca/Locallang/tx_org_location.xml:tx_org_location.geoupdateprompt,--linebreak--,'
      . 'geoupdateforbidden;LLL:EXT:org/Configuration/Tca/Locallang/tx_org_location.xml:tx_org_location.geoupdateforbidden,--linebreak--,'
      . 'mail_lat;LLL:EXT:org/Configuration/Tca/Locallang/tx_org_location.xml:tx_org_location.mail_lat,'
      . 'mail_lon;LLL:EXT:org/Configuration/Tca/Locallang/tx_org_location.xml:tx_org_location.mail_lon,',
      'canNotCollapse' => 1,
    ),
    'typerecord' => array(
      'showitem' => ''
      . 'type;LLL:EXT:org/locallang_db.xml:type,'
      . 'url;LLL:EXT:org/locallang_db.xml:url'
      ,
      'canNotCollapse' => 1,
    ),
    'typepage' => array(
      'showitem' => ''
      . 'type;LLL:EXT:org/locallang_db.xml:type,'
      . 'page;LLL:EXT:org/locallang_db.xml:page'
      ,
      'canNotCollapse' => 1,
    ),
    'typeurl' => array(
      'showitem' => ''
      . 'type;LLL:EXT:org/locallang_db.xml:type,'
      . 'url;LLL:EXT:org/locallang_db.xml:url'
      ,
      'canNotCollapse' => 1,
    ),
  ),
);

$TCA[ 'tx_org_location' ][ 'types' ][ 'notype' ] = $TCA[ 'tx_org_location' ][ 'types' ][ 'record' ];

if ( !$bool_full_wizardSupport_allTables )
{
  unset( $TCA[ 'tx_org_location' ][ 'columns' ][ 'tx_org_cal' ][ 'config' ][ 'wizards' ][ 'add' ] );
  unset( $TCA[ 'tx_org_location' ][ 'columns' ][ 'tx_org_cal' ][ 'config' ][ 'wizards' ][ 'list' ] );
}

$TCA[ 'tx_org_locationcat' ] = array(
  'ctrl' => $TCA[ 'tx_org_locationcat' ][ 'ctrl' ],
  'interface' => array(
    'showRecordFieldList' => ''
    . 'title,title_lang_ol,uid_parent,'
    . 'icons,icon_offset_x,icon_offset_y,'
    . 'hidden,'
    . 'image,imagecaption,imageseo'
  ,
  ),
  'columns' => array(
    'title' => array(
      'exclude' => 0,
      'label' => 'LLL:EXT:org/Configuration/Tca/Locallang/tx_org_location.xml:tx_org_locationcat.title',
      'config' => $conf_input_30_trimRequired,
    ),
    'title_lang_ol' => array(
      'exclude' => 0,
      'label' => 'LLL:EXT:org/Configuration/Tca/Locallang/tx_org_location.xml:tx_org_locationcat.title_lang_ol',
      'config' => $conf_input_30_trim,
    ),
    'uid_parent' => array(
      'exclude' => 0,
      'label' => 'LLL:EXT:org/Configuration/Tca/Locallang/tx_org_location.xml:tx_org_locationcat.uid_parent',
      'config' => array(
        'type' => 'select',
        'form_type' => 'user',
        'userFunc' => 'tx_cpstcatree->getTree',
        'foreign_table' => 'tx_org_locationcat',
        'treeView' => 1,
        'expandable' => 1,
        'expandFirst' => 0,
        'expandAll' => 0,
        'size' => 1,
        'minitems' => 0,
        'maxitems' => 2,
        'trueMaxItems' => 1,
      ),
    ),
    'icons' => array(
      'exclude' => $bool_exclude_default,
//      'l10n_mode' => 'exclude',
      'label' => 'LLL:EXT:org/Configuration/Tca/Locallang/tx_org_location.xml:tx_org_locationcat.icons',
      'config' => $conf_file_image,
    ),
    'icon_offset_x' => array(
      'exclude' => 0,
      'label' => 'LLL:EXT:org/Configuration/Tca/Locallang/tx_org_location.xml:tx_org_locationcat.icon_offset_x',
      'config' => array(
        'type' => 'input',
        'size' => '3',
        'max' => '3',
        'eval' => 'int',
        'default' => '0',
      ),
    ),
    'icon_offset_y' => array(
      'exclude' => 0,
      'label' => 'LLL:EXT:org/Configuration/Tca/Locallang/tx_org_location.xml:tx_org_locationcat.icon_offset_y',
      'config' => array(
        'type' => 'input',
        'size' => '3',
        'max' => '3',
        'eval' => 'int',
        'default' => '0',
      ),
    ),
    'hidden' => $conf_hidden,
  ),
  'types' => array(
    '0' => array( 'showitem' => ''
      . '--div--;LLL:EXT:org/Configuration/Tca/Locallang/tx_org_location.xml:tx_org_locationcat.div_cat,'
      . '  title;;1;;1-1-1,uid_parent,'
      . '--div--;LLL:EXT:org/Configuration/Tca/Locallang/tx_org_location.xml:tx_org_locationcat.div_icons,'
      . '  icons,icon_offset_x,icon_offset_y,'
      . '--div--;LLL:EXT:org/Configuration/Tca/Locallang/tx_org_location.xml:tx_org_locationcat.div_control,'
      . 'hidden'
    ),
  ),
  'palettes' => array(
    '1' => array( 'showitem' => 'title_lang_ol,' ),
  ),
);
?>