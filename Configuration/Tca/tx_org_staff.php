<?php

if ( !defined( 'TYPO3_MODE' ) )
{
  die( 'Access denied.' );
}


$TCA[ 'tx_org_staff' ] = array(
  'ctrl' => $TCA[ 'tx_org_staff' ][ 'ctrl' ],
  'interface' => array(
    'showRecordFieldList' => ''
    . 'type,page,url,'
    . 'title,'
    . 'prefix,name_first,name_last,birthday,gender,'
    . 'bodytext,cols,vita,'
    . 'tx_org_staffgroup,'
    . 'contact_email,contact_fax,contact_phone,contact_skype,contact_url,'
    . 'image,imagecaption,imageseo,imagewidth,imageheight,imageorient,imagecaption,imagecols,imageborder,imagecaption_position,image_link,image_zoom,image_noRows,image_effects,image_compression,'
    . 'tx_org_downloads,'
    . 'tx_org_headquarters'
    . 'tx_org_job,'
    . 'tx_org_service,'
    . 'tx_org_news,'
    . 'tx_org_event,'
    . 'tx_org_location,'
    . 'hidden,starttime,endtime,'
  ),
  'feInterface' => $TCA[ 'tx_org_staff' ][ 'feInterface' ],
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
            '2' => 'EXT:org/Configuration/ExtIcon/staff.gif',
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
      // #69256, 150821, dwildt, 1+
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
        ),
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
      'label' => 'LLL:EXT:org/Configuration/Tca/Locallang/tx_org_staff.xml:tx_org_staff.title',
      'l10n_mode' => 'prefixLangTitle',
      'config' => array(
        'type' => 'input',
        'size' => '30',
        'eval' => 'trim',
      )
    ),
    'prefix' => array(
      'exclude' => 0,
      'label' => 'LLL:EXT:org/Configuration/Tca/Locallang/tx_org_staff.xml:tx_org_staff.prefix',
      'l10n_mode' => 'prefixLangTitle',
      'config' => array(
        'type' => 'input',
        'size' => '30',
        'eval' => 'required,trim',
      )
    ),
    'name_first' => array(
      'exclude' => 0,
      'label' => 'LLL:EXT:org/Configuration/Tca/Locallang/tx_org_staff.xml:tx_org_staff.name_first',
      'l10n_mode' => 'prefixLangTitle',
      'config' => array(
        'type' => 'input',
        'size' => '30',
        'eval' => 'required,trim',
      )
    ),
    'name_last' => array(
      'exclude' => 0,
      'label' => 'LLL:EXT:org/Configuration/Tca/Locallang/tx_org_staff.xml:tx_org_staff.name_last',
      'l10n_mode' => 'prefixLangTitle',
      'config' => array(
        'type' => 'input',
        'size' => '30',
        'eval' => 'required,trim',
      )
    ),
    'birthday' => array(
      'exclude' => 1,
      'label' => 'LLL:EXT:org/Configuration/Tca/Locallang/tx_org_staff.xml:tx_org_staff.birthday',
      'config' => array(
        'type' => 'input',
        'size' => '8',
        'max' => '20',
        'eval' => 'date',
        'checkbox' => '0',
        'default' => '0',
//        'range' => array(
//          'upper' => mktime(3, 14, 7, 1, 19, 2038),
//          'lower' => mktime(0, 0, 0, date('m') - 1, date('d'), date('Y'))
//        )
      )
    ),
    'gender' => array(
      'exclude' => $bool_exclude_default,
      'l10n_mode' => 'exclude',
      'label' => 'LLL:EXT:org/Configuration/Tca/Locallang/tx_org_staff.xml:tx_org_staff.gender',
      'config' => array(
        'type' => 'select',
        'items' => array(
          'unknown' => array(
            '0' => 'LLL:EXT:org/Configuration/Tca/Locallang/tx_org_staff.xml:tx_org_staff.gender_unknown',
            '1' => '',
          ),
          'male' => array(
            '0' => 'LLL:EXT:org/Configuration/Tca/Locallang/tx_org_staff.xml:tx_org_staff.gender_male',
            '1' => 'male',
          ),
          'female' => array(
            '0' => 'LLL:EXT:org/Configuration/Tca/Locallang/tx_org_staff.xml:tx_org_staff.gender_female',
            '1' => 'female',
          ),
        ),
        'default' => '',
      ),
    ),
    'bodytext' => array(
      'exclude' => 0,
      'label' => 'LLL:EXT:org/Configuration/Tca/Locallang/tx_org_staff.xml:tx_org_staff.bodytext',
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
            'title' => 'LLL:EXT:org/Configuration/Tca/Locallang/tx_org_staff.xml:wizard.rte.fullscreen',
            'icon' => 'wizard_rte2.gif',
            'script' => 'wizard_rte.php',
          ),
        ),
      )
    ),
    'vita' => array(
      'exclude' => 0,
      'label' => 'LLL:EXT:org/Configuration/Tca/Locallang/tx_org_staff.xml:tx_org_staff.vita',
      'config' => array(
        'type' => 'text',
        'cols' => '30',
        'rows' => '5',
        'wizards' => array(
          '_PADDING' => 2,
          'table' => $TCA['tt_content']['columns']['bodytext']['config']['wizards']['table'],
        ),
      )
    ),
    'tx_org_staffgroup' => array(
      'l10n_mode' => 'exclude',
      'exclude' => 0,
      'label' => 'LLL:EXT:org/Configuration/Tca/Locallang/tx_org_staff.xml:tx_org_staff.tx_org_staffgroup',
      'config' => array(
        'type' => 'select',
        'size' => 10,
        'minitems' => 0,
        'maxitems' => 99,
        'MM' => 'tx_org_mm_all',
        "MM_match_fields" => array(
          'table_local' => 'tx_org_staff',
          'table_foreign' => 'tx_org_staffgroup'
        ),
        "MM_insert_fields" => array(
          'table_local' => 'tx_org_staff',
          'table_foreign' => 'tx_org_staffgroup'
        ),
        'foreign_table' => 'tx_org_staffgroup',
        'foreign_table_where' => 'AND tx_org_staffgroup.' . $str_store_record_conf . ' AND tx_org_staffgroup.deleted = 0 AND tx_org_staffgroup.hidden = 0 ORDER BY tx_org_staffgroup.title',
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
            'title' => 'LLL:EXT:org/Configuration/Tca/Locallang/tx_org_staff.xml:wizard.tx_org_staffgroup.add',
            'icon' => 'add.gif',
            'params' => array(
              'table' => 'tx_org_staffgroup',
              'pid' => $str_marker_pid,
              'setValue' => 'prepend'
            ),
            'script' => 'wizard_add.php',
          ),
          'list' => array(
            'type' => 'script',
            'title' => 'LLL:EXT:org/Configuration/Tca/Locallang/tx_org_staff.xml:wizard.tx_org_staffgroup.list',
            'icon' => 'list.gif',
            'params' => array(
              'table' => 'tx_org_staffgroup',
              'pid' => $str_marker_pid,
            ),
            'script' => 'wizard_list.php',
          ),
          'edit' => array(
            'type' => 'popup',
            'title' => 'LLL:EXT:org/Configuration/Tca/Locallang/tx_org_staff.xml:wizard.tx_org_staffgroup.edit',
            'script' => 'wizard_edit.php',
            'popup_onlyOpenIfSelected' => 1,
            'icon' => 'edit2.gif',
            'JSopenParams' => 'height=350,width=580,status=0,menubar=0,scrollbars=1',
          ),
        ),
      ),
      // #69256, 150821, dwildt, +
      'config_filter' => array(
        'type' => 'select',
        'size' => 1,
        'MM' => 'tx_org_mm_all',
        "MM_match_fields" => array(
          'table_local' => 'tx_org_staff',
          'table_foreign' => 'tx_org_staffgroup'
        ),
        "MM_insert_fields" => array(
          'table_local' => 'tx_org_staff',
          'table_foreign' => 'tx_org_staffgroup'
        ),
        'foreign_table' => 'tx_org_staffgroup',
        'foreign_table_where' => 'AND tx_org_staffgroup.' . $str_store_record_conf . ' AND tx_org_staffgroup.deleted = 0 AND tx_org_staffgroup.hidden = 0 ORDER BY tx_org_staffgroup.title',
        'items' => array(
          'empty' => array(
            '0' => '',
            '1' => '',
          ),
        ),
      ),
    ),
    'contact_email' => array(
      'label' => 'LLL:EXT:org/Configuration/Tca/Locallang/tx_org_staff.xml:tx_org_staff.contact_email',
      'exclude' => $bool_exclude_default,
      'config' => $conf_input_30_trim,
    ),
    'contact_fax' => array(
      'label' => 'LLL:EXT:org/Configuration/Tca/Locallang/tx_org_staff.xml:tx_org_staff.contact_fax',
      'exclude' => $bool_exclude_default,
      'config' => $conf_input_30_trim,
    ),
    'contact_phone' => array(
      'label' => 'LLL:EXT:org/Configuration/Tca/Locallang/tx_org_staff.xml:tx_org_staff.contact_phone',
      'exclude' => $bool_exclude_default,
      'config' => $conf_input_30_trim,
    ),
    'contact_skype' => array(
      'label' => 'LLL:EXT:org/Configuration/Tca/Locallang/tx_org_staff.xml:tx_org_staff.contact_skype',
      'exclude' => $bool_exclude_default,
      'config' => $conf_input_30_trim,
    ),
    'contact_url' => array(
      'exclude' => $bool_exclude_default,
//      'l10n_mode' => 'exclude',
      'label' => 'LLL:EXT:org/locallang_db.xml:url',
      'config' => array(
        'type' => 'input',
        'size' => '80',
        'max' => '256',
        'checkbox' => '',
        'eval' => 'trim',
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
    'image' => array(
      'exclude' => $bool_exclude_default,
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
    'tx_org_downloads' => array(
      'l10n_mode' => 'exclude',
      'exclude' => 0,
      'l10n_mode' => 'exclude',
      'label' => 'LLL:EXT:org/Configuration/Tca/Locallang/tx_org_staff.xml:tx_org_staff.tx_org_downloads',
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
        'MM_opposite_field' => 'tx_org_staff',
        "MM_match_fields" => array(
          'table_local' => 'tx_org_downloads',
          'table_foreign' => 'tx_org_staff'
        ),
        "MM_insert_fields" => array(
          'table_local' => 'tx_org_downloads',
          'table_foreign' => 'tx_org_staff'
        ),
        'foreign_table' => 'tx_org_downloads',
        'foreign_table_where' => 'AND tx_org_downloads.' . $str_store_record_conf . ' AND tx_org_downloads.deleted = 0 AND tx_org_downloads.hidden = 0 AND tx_org_downloads.sys_language_uid=###REC_FIELD_sys_language_uid### ORDER BY tx_org_downloads.title',
        'selectedListStyle' => $listStyleWidth,
        'itemListStyle' => $listStyleWidth,
      ),
      // #69256, 150821, dwildt, +
      'config_filter' => array(
        'type' => 'select',
        'size' => 1,
        'MM' => 'tx_org_mm_all',
        'MM_opposite_field' => 'tx_org_staff',
        "MM_match_fields" => array(
          'table_local' => 'tx_org_downloads',
          'table_foreign' => 'tx_org_staff'
        ),
        "MM_insert_fields" => array(
          'table_local' => 'tx_org_downloads',
          'table_foreign' => 'tx_org_staff'
        ),
        'foreign_table' => 'tx_org_downloads',
        'foreign_table_where' => 'AND tx_org_downloads.' . $str_store_record_conf . ' AND tx_org_downloads.deleted = 0 AND tx_org_downloads.hidden = 0 AND tx_org_downloads.sys_language_uid=###REC_FIELD_sys_language_uid### ORDER BY tx_org_downloads.title',
        'items' => array(
          'empty' => array(
            '0' => '',
            '1' => '',
          ),
        ),
      ),
    ),
    'tx_org_headquarters' => array(
      'l10n_mode' => 'exclude',
      'exclude' => 0,
      'l10n_mode' => 'exclude',
      'label' => 'LLL:EXT:org/Configuration/Tca/Locallang/tx_org_staff.xml:tx_org_staff.tx_org_headquarters',
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
        'MM_opposite_field' => 'tx_org_staff',
        "MM_match_fields" => array(
          'table_local' => 'tx_org_headquarters',
          'table_foreign' => 'tx_org_staff'
        ),
        "MM_insert_fields" => array(
          'table_local' => 'tx_org_headquarters',
          'table_foreign' => 'tx_org_staff'
        ),
        'foreign_table' => 'tx_org_headquarters',
        'foreign_table_where' => 'AND tx_org_headquarters.' . $str_store_record_conf . ' AND tx_org_headquarters.deleted = 0 AND tx_org_headquarters.hidden = 0 AND tx_org_headquarters.sys_language_uid=###REC_FIELD_sys_language_uid### ORDER BY tx_org_headquarters.title',
        'selectedListStyle' => $listStyleWidth,
        'itemListStyle' => $listStyleWidth,
      ),
      // #69256, 150821, dwildt, +
      'config_filter' => array(
        'type' => 'select',
        'size' => 1,
        'MM' => 'tx_org_mm_all',
        'MM_opposite_field' => 'tx_org_staff',
        "MM_match_fields" => array(
          'table_local' => 'tx_org_headquarters',
          'table_foreign' => 'tx_org_staff'
        ),
        "MM_insert_fields" => array(
          'table_local' => 'tx_org_headquarters',
          'table_foreign' => 'tx_org_staff'
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
    'tx_org_job' => array(
      'l10n_mode' => 'exclude',
      'exclude' => 0,
      'l10n_mode' => 'exclude',
      'label' => 'LLL:EXT:org/Configuration/Tca/Locallang/tx_org_staff.xml:tx_org_staff.tx_org_job',
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
        'MM_opposite_field' => 'tx_org_staff',
        "MM_match_fields" => array(
          'table_local' => 'tx_org_job',
          'table_foreign' => 'tx_org_staff'
        ),
        "MM_insert_fields" => array(
          'table_local' => 'tx_org_job',
          'table_foreign' => 'tx_org_staff'
        ),
        'foreign_table' => 'tx_org_job',
        'foreign_table_where' => 'AND tx_org_job.' . $str_store_record_conf . ' AND tx_org_job.deleted = 0 AND tx_org_job.hidden = 0 AND tx_org_job.sys_language_uid=###REC_FIELD_sys_language_uid### ORDER BY tx_org_job.title',
        'selectedListStyle' => $listStyleWidth,
        'itemListStyle' => $listStyleWidth,
      ),
      // #69256, 150821, dwildt, +
      'config_filter' => array(
        'type' => 'select',
        'size' => 1,
        'MM' => 'tx_org_mm_all',
        'MM_opposite_field' => 'tx_org_staff',
        "MM_match_fields" => array(
          'table_local' => 'tx_org_job',
          'table_foreign' => 'tx_org_staff'
        ),
        "MM_insert_fields" => array(
          'table_local' => 'tx_org_job',
          'table_foreign' => 'tx_org_staff'
        ),
        'foreign_table' => 'tx_org_job',
        'foreign_table_where' => 'AND tx_org_job.' . $str_store_record_conf . ' AND tx_org_job.deleted = 0 AND tx_org_job.hidden = 0 AND tx_org_job.sys_language_uid=###REC_FIELD_sys_language_uid### ORDER BY tx_org_job.title',
        'items' => array(
          'empty' => array(
            '0' => '',
            '1' => '',
          ),
        ),
      ),
    ),
    'tx_org_service' => array(
      'l10n_mode' => 'exclude',
      'exclude' => 0,
      'l10n_mode' => 'exclude',
      'label' => 'LLL:EXT:org/Configuration/Tca/Locallang/tx_org_staff.xml:tx_org_staff.tx_org_service',
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
        'MM_opposite_field' => 'tx_org_staff',
        "MM_match_fields" => array(
          'table_local' => 'tx_org_service',
          'table_foreign' => 'tx_org_staff'
        ),
        "MM_insert_fields" => array(
          'table_local' => 'tx_org_service',
          'table_foreign' => 'tx_org_staff'
        ),
        'foreign_table' => 'tx_org_service',
        'foreign_table_where' => 'AND tx_org_service.' . $str_store_record_conf . ' AND tx_org_service.deleted = 0 AND tx_org_service.hidden = 0 AND tx_org_service.sys_language_uid=###REC_FIELD_sys_language_uid### ORDER BY tx_org_service.title',
        'selectedListStyle' => $listStyleWidth,
        'itemListStyle' => $listStyleWidth,
      ),
      // #69256, 150821, dwildt, +
      'config_filter' => array(
        'type' => 'select',
        'size' => 1,
        'MM' => 'tx_org_mm_all',
        'MM_opposite_field' => 'tx_org_staff',
        "MM_match_fields" => array(
          'table_local' => 'tx_org_service',
          'table_foreign' => 'tx_org_staff'
        ),
        "MM_insert_fields" => array(
          'table_local' => 'tx_org_service',
          'table_foreign' => 'tx_org_staff'
        ),
        'foreign_table' => 'tx_org_service',
        'foreign_table_where' => 'AND tx_org_service.' . $str_store_record_conf . ' AND tx_org_service.deleted = 0 AND tx_org_service.hidden = 0 AND tx_org_service.sys_language_uid=###REC_FIELD_sys_language_uid### ORDER BY tx_org_service.title',
        'items' => array(
          'empty' => array(
            '0' => '',
            '1' => '',
          ),
        ),
      ),
    ),
    'tx_org_news' => array(
      'l10n_mode' => 'exclude',
      'exclude' => 0,
      'l10n_mode' => 'exclude',
      'label' => 'LLL:EXT:org/Configuration/Tca/Locallang/tx_org_staff.xml:tx_org_staff.tx_org_news',
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
        'MM_opposite_field' => 'tx_org_staff',
        "MM_match_fields" => array(
          'table_local' => 'tx_org_news',
          'table_foreign' => 'tx_org_staff'
        ),
        "MM_insert_fields" => array(
          'table_local' => 'tx_org_news',
          'table_foreign' => 'tx_org_staff'
        ),
        'foreign_table' => 'tx_org_news',
        'foreign_table_where' => 'AND tx_org_news.' . $str_store_record_conf . ' AND tx_org_news.deleted = 0 AND tx_org_news.hidden = 0 AND tx_org_news.sys_language_uid=###REC_FIELD_sys_language_uid### ORDER BY datetime DESC, title',
        'selectedListStyle' => $listStyleWidth,
        'itemListStyle' => $listStyleWidth,
      ),
      // #69256, 150821, dwildt, +
      'config_filter' => array(
        'type' => 'select',
        'size' => 1,
        'MM' => 'tx_org_mm_all',
        'MM_opposite_field' => 'tx_org_staff',
        "MM_match_fields" => array(
          'table_local' => 'tx_org_news',
          'table_foreign' => 'tx_org_staff'
        ),
        "MM_insert_fields" => array(
          'table_local' => 'tx_org_news',
          'table_foreign' => 'tx_org_staff'
        ),
        'foreign_table' => 'tx_org_news',
        'foreign_table_where' => 'AND tx_org_news.' . $str_store_record_conf . ' AND tx_org_news.deleted = 0 AND tx_org_news.hidden = 0 AND tx_org_news.sys_language_uid=###REC_FIELD_sys_language_uid### ORDER BY datetime DESC, title',
        'items' => array(
          'empty' => array(
            '0' => '',
            '1' => '',
          ),
        ),
      ),
    ),
    'tx_org_event' => array(
      'l10n_mode' => 'exclude',
      'exclude' => 0,
      'l10n_mode' => 'exclude',
      'label' => 'LLL:EXT:org/Configuration/Tca/Locallang/tx_org_staff.xml:tx_org_staff.tx_org_event',
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
        'MM_opposite_field' => 'tx_org_staff',
        "MM_match_fields" => array(
          'table_local' => 'tx_org_event',
          'table_foreign' => 'tx_org_staff'
        ),
        "MM_insert_fields" => array(
          'table_local' => 'tx_org_event',
          'table_foreign' => 'tx_org_staff'
        ),
        'foreign_table' => 'tx_org_event',
        'foreign_table_where' => 'AND tx_org_event.' . $str_store_record_conf . ' AND tx_org_event.deleted = 0 AND tx_org_event.hidden = 0 AND tx_org_event.sys_language_uid=###REC_FIELD_sys_language_uid### ORDER BY tx_org_event.title',
        'selectedListStyle' => $listStyleWidth,
        'itemListStyle' => $listStyleWidth,
      ),
      // #69256, 150821, dwildt, +
      'config_filter' => array(
        'type' => 'select',
        'size' => 1,
        'MM' => 'tx_org_mm_all',
        'MM_opposite_field' => 'tx_org_staff',
        "MM_match_fields" => array(
          'table_local' => 'tx_org_event',
          'table_foreign' => 'tx_org_staff'
        ),
        "MM_insert_fields" => array(
          'table_local' => 'tx_org_event',
          'table_foreign' => 'tx_org_staff'
        ),
        'foreign_table' => 'tx_org_event',
        'foreign_table_where' => 'AND tx_org_event.' . $str_store_record_conf . ' AND tx_org_event.deleted = 0 AND tx_org_event.hidden = 0 AND tx_org_event.sys_language_uid=###REC_FIELD_sys_language_uid### ORDER BY tx_org_event.title',
        'items' => array(
          'empty' => array(
            '0' => '',
            '1' => '',
          ),
        ),
      ),
    ),
    'tx_org_location' => array(
      'l10n_mode' => 'exclude',
      'exclude' => 0,
      'l10n_mode' => 'exclude',
      'label' => 'LLL:EXT:org/Configuration/Tca/Locallang/tx_org_staff.xml:tx_org_staff.tx_org_location',
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
        'MM_opposite_field' => 'tx_org_staff',
        "MM_match_fields" => array(
          'table_local' => 'tx_org_location',
          'table_foreign' => 'tx_org_staff'
        ),
        "MM_insert_fields" => array(
          'table_local' => 'tx_org_location',
          'table_foreign' => 'tx_org_staff'
        ),
        'foreign_table' => 'tx_org_location',
        'foreign_table_where' => 'AND tx_org_location.' . $str_store_record_conf . ' AND tx_org_location.deleted = 0 AND tx_org_location.hidden = 0 AND tx_org_location.sys_language_uid=###REC_FIELD_sys_language_uid### ORDER BY tx_org_location.title',
        'selectedListStyle' => $listStyleWidth,
        'itemListStyle' => $listStyleWidth,
      ),
      // #69256, 150821, dwildt, +
      'config_filter' => array(
        'type' => 'select',
        'size' => 1,
        'MM' => 'tx_org_mm_all',
        'MM_opposite_field' => 'tx_org_staff',
        "MM_match_fields" => array(
          'table_local' => 'tx_org_location',
          'table_foreign' => 'tx_org_staff'
        ),
        "MM_insert_fields" => array(
          'table_local' => 'tx_org_location',
          'table_foreign' => 'tx_org_staff'
        ),
        'foreign_table' => 'tx_org_location',
        'foreign_table_where' => 'AND tx_org_location.' . $str_store_record_conf . ' AND tx_org_location.deleted = 0 AND tx_org_location.hidden = 0 AND tx_org_location.sys_language_uid=###REC_FIELD_sys_language_uid### ORDER BY tx_org_location.title',
        'items' => array(
          'empty' => array(
            '0' => '',
            '1' => '',
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
    'record' => array(
      'showitem' => ''
      . '--div--;LLL:EXT:org/Configuration/Tca/Locallang/tx_org_staff.xml:tx_org_staff.div_particulars, '
      . '  type,'
      . '  --palette--;LLL:EXT:org/Configuration/Tca/Locallang/tx_org_staff.xml:tx_org_staff.palette_name;name,'
      . '  --palette--;LLL:EXT:org/Configuration/Tca/Locallang/tx_org_staff.xml:tx_org_staff.palette_birthday;birthday,'
      . '  bodytext;;;richtext[]:rte_transform[mode=ts],vita;;9;nowrap:wizards[table],'
      . '--div--;LLL:EXT:org/Configuration/Tca/Locallang/tx_org_staff.xml:tx_org_staff.div_group, '
      . '  tx_org_staffgroup,'
      . '--div--;LLL:EXT:org/Configuration/Tca/Locallang/tx_org_staff.xml:tx_org_staff.div_contact, '
      . '  contact_email,contact_fax,contact_phone,contact_skype,contact_url,'
      . '--div--;LLL:EXT:cms/locallang_ttc.xml:tabs.images,'
      . '  --palette--;LLL:EXT:cms/locallang_ttc.xml:palette.imagefiles;imagefiles,'
      . '  --palette--;LLL:EXT:org/locallang_db.xml:palette.image_accessibility;image_accessibility,'
      . '  --palette--;LLL:EXT:cms/locallang_ttc.xml:palette.imageblock;imageblock,'
      . '  --palette--;LLL:EXT:cms/locallang_ttc.xml:palette.imagelinks;imagelinks,'
      . '  --palette--;LLL:EXT:cms/locallang_ttc.xml:palette.image_settings;image_settings,'
      . '--div--;LLL:EXT:cms/locallang_ttc.xml:tabs.media,'
      . '  tx_org_downloads,'
      . '--div--;LLL:EXT:org/Configuration/Tca/Locallang/tx_org_staff.xml:tx_org_staff.div_company, '
      . '  tx_org_headquarters,'
      . '--div--;LLL:EXT:org/Configuration/Tca/Locallang/tx_org_staff.xml:tx_org_staff.div_job, '
      . '  tx_org_job,'
      . '--div--;LLL:EXT:org/Configuration/Tca/Locallang/tx_org_staff.xml:tx_org_staff.div_service, '
      . '  tx_org_service,'
      . '--div--;LLL:EXT:org/Configuration/Tca/Locallang/tx_org_staff.xml:tx_org_staff.div_news, '
      . '  tx_org_news,'
      . '--div--;LLL:EXT:org/Configuration/Tca/Locallang/tx_org_staff.xml:tx_org_staff.div_event, '
      . '  tx_org_event,'
      . '--div--;LLL:EXT:org/Configuration/Tca/Locallang/tx_org_staff.xml:tx_org_staff.div_location, '
      . '  tx_org_location,'
      . '--div--;LLL:EXT:org/Configuration/Tca/Locallang/tx_org_staff.xml:tx_org_staff.div_control,'
      . '  hidden;;control;;,fe_group,'
      . '--div--;LLL:EXT:org/Configuration/Tca/Locallang/tx_org_staff.xml:tx_org_staff.div_seo,'
      . '  seo_keywords, seo_description,'
    ,
    ),
    'page' => array(
      'showitem' => ''
      . '--div--;LLL:EXT:org/Configuration/Tca/Locallang/tx_org_staff.xml:tx_org_staff.div_particulars, '
      . '  --palette--;LLL:EXT:org/locallang_db.xml:palette_typepage;typepage,'
      . '  --palette--;LLL:EXT:org/Configuration/Tca/Locallang/tx_org_staff.xml:tx_org_staff.palette_name;name,'
      . '  --palette--;LLL:EXT:org/Configuration/Tca/Locallang/tx_org_staff.xml:tx_org_staff.palette_birthday;birthday,'
      . '--div--;LLL:EXT:org/Configuration/Tca/Locallang/tx_org_staff.xml:tx_org_staff.div_group, '
      . '  tx_org_staffgroup,'
      . '--div--;LLL:EXT:org/Configuration/Tca/Locallang/tx_org_staff.xml:tx_org_staff.div_contact, '
      . '  contact_email,contact_fax,contact_phone,contact_skype,contact_url,'
      . '--div--;LLL:EXT:cms/locallang_ttc.xml:tabs.images,'
      . '  --palette--;LLL:EXT:cms/locallang_ttc.xml:palette.imagefiles;imagefiles,'
      . '  --palette--;LLL:EXT:org/locallang_db.xml:palette.image_accessibility;image_accessibility,'
      . '  --palette--;LLL:EXT:cms/locallang_ttc.xml:palette.imageblock;imageblock,'
      . '  --palette--;LLL:EXT:cms/locallang_ttc.xml:palette.imagelinks;imagelinks,'
      . '  --palette--;LLL:EXT:cms/locallang_ttc.xml:palette.image_settings;image_settings,'
      . '--div--;LLL:EXT:org/Configuration/Tca/Locallang/tx_org_staff.xml:tx_org_staff.div_company, '
      . '  tx_org_headquarters,'
      . '--div--;LLL:EXT:org/Configuration/Tca/Locallang/tx_org_staff.xml:tx_org_staff.div_control,'
      . '  hidden;;control;;,fe_group,'
    ,
    ),
    'url' => array(
      'showitem' => ''
      . '--div--;LLL:EXT:org/Configuration/Tca/Locallang/tx_org_staff.xml:tx_org_staff.div_particulars, '
      . '  --palette--;LLL:EXT:org/locallang_db.xml:palette_typeurl;typeurl,'
      . '  --palette--;LLL:EXT:org/Configuration/Tca/Locallang/tx_org_staff.xml:tx_org_staff.palette_name;name,'
      . '  --palette--;LLL:EXT:org/Configuration/Tca/Locallang/tx_org_staff.xml:tx_org_staff.palette_birthday;birthday,'
      . '--div--;LLL:EXT:org/Configuration/Tca/Locallang/tx_org_staff.xml:tx_org_staff.div_group, '
      . '  tx_org_staffgroup,'
      . '--div--;LLL:EXT:org/Configuration/Tca/Locallang/tx_org_staff.xml:tx_org_staff.div_contact, '
      . '  contact_email,contact_fax,contact_phone,contact_skype,contact_url,'
      . '--div--;LLL:EXT:cms/locallang_ttc.xml:tabs.images,'
      . '  --palette--;LLL:EXT:cms/locallang_ttc.xml:palette.imagefiles;imagefiles,'
      . '  --palette--;LLL:EXT:org/locallang_db.xml:palette.image_accessibility;image_accessibility,'
      . '  --palette--;LLL:EXT:cms/locallang_ttc.xml:palette.imageblock;imageblock,'
      . '  --palette--;LLL:EXT:cms/locallang_ttc.xml:palette.imagelinks;imagelinks,'
      . '  --palette--;LLL:EXT:cms/locallang_ttc.xml:palette.image_settings;image_settings,'
      . '--div--;LLL:EXT:org/Configuration/Tca/Locallang/tx_org_staff.xml:tx_org_staff.div_company, '
      . '  tx_org_headquarters,'
      . '--div--;LLL:EXT:org/Configuration/Tca/Locallang/tx_org_staff.xml:tx_org_staff.div_control,'
      . '  hidden;;control;;,fe_group,'
    ,
    ),
  ),
  'palettes' => array(
    'birthday' => array(
      'showitem' => ''
      . 'birthday;LLL:EXT:org/Configuration/Tca/Locallang/tx_org_staff.xml:tx_org_staff.birthday,'
      . 'gender;LLL:EXT:org/Configuration/Tca/Locallang/tx_org_staff.xml:tx_org_staff.gender'
      ,
      'canNotCollapse' => 1,
    ),
    'control' => array(
      'showitem' => 'starttime, endtime'
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
    'name' => array(
      'showitem' => ''
      . 'title;LLL:EXT:org/Configuration/Tca/Locallang/tx_org_staff.xml:tx_org_staff.title, --linebreak--,'
      . 'prefix;LLL:EXT:org/Configuration/Tca/Locallang/tx_org_staff.xml:tx_org_staff.prefix,'
      . 'name_first;LLL:EXT:org/Configuration/Tca/Locallang/tx_org_staff.xml:tx_org_staff.name_first,'
      . 'name_last;LLL:EXT:org/Configuration/Tca/Locallang/tx_org_staff.xml:tx_org_staff.name_last'
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
  )
);

$TCA['tx_org_staff']['columns']['cols'] = $TCA['tt_content']['columns']['cols'];
$TCA['tx_org_staff']['columns']['pi_flexform'] = $TCA['tt_content']['columns']['pi_flexform'];
unset($TCA['tx_org_staff']['columns']['pi_flexform']['config']['ds']);
unset($TCA['tx_org_staff']['columns']['pi_flexform']['config']['ds_pointerField']);
unset($TCA['tx_org_staff']['columns']['pi_flexform']['config']['search']);
$TCA['tx_org_staff']['columns']['pi_flexform']['config']['ds']['default'] = 'FILE:EXT:css_styled_content/flexform_ds.xml';
$TCA['tx_org_staff']['columns']['pi_flexform']['config']['ds_pointerField'] = 'title';
$TCA[ 'tx_org_staff' ][ 'types' ][ 'notype' ] = $TCA[ 'tx_org_staff' ][ 'types' ][ 'record' ];

$TCA[ 'tx_org_staffgroup' ] = array(
  'ctrl' => $TCA[ 'tx_org_staffgroup' ][ 'ctrl' ],
  'interface' => array(
    'showRecordFieldList' => 'hidden,title,title_lang_ol,uid_parent,'
  ),
  'feInterface' => $TCA[ 'tx_org_staffgroup' ][ 'feInterface' ],
  'columns' => array(
    'hidden' => array(
      'exclude' => 1,
      'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.hidden',
      'config' => array(
        'type' => 'check',
        'default' => '0'
      )
    ),
    'title' => array(
      'exclude' => 0,
      'label' => 'LLL:EXT:org/Configuration/Tca/Locallang/tx_org_staff.xml:tx_org_staffgroup.title',
      'config' => array(
        'type' => 'input',
        'size' => '30',
        'eval' => 'required,trim',
      )
    ),
    'title_lang_ol' => array(
      'exclude' => 0,
      'label' => 'LLL:EXT:org/Configuration/Tca/Locallang/tx_org_cal.xml:tx_org_calentrance.title_lang_ol',
      'config' => array(
        'type' => 'input',
        'size' => '30',
        'eval' => 'trim',
      )
    ),
    'uid_parent' => array(
      'exclude' => 0,
      'label' => 'LLL:EXT:org/Configuration/Tca/Locallang/tx_org_staff.xml:tx_org_staffgroup.uid_parent',
      'config' => array(
        'type' => 'select',
        'form_type' => 'user',
        'userFunc' => 'tx_cpstcatree->getTree',
        'foreign_table' => 'tx_org_staffgroup',
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
  ),
  'types' => array(
    '0' => array(
      'showitem' =>
      '--div--;LLL:EXT:org/Configuration/Tca/Locallang/tx_org_staff.xml:tx_org_staffgroup.div_category, title;;1;;,uid_parent,'
      . '--div--;LLL:EXT:org/Configuration/Tca/Locallang/tx_org_staff.xml:tx_org_staffgroup.div_control, hidden'
      . ''
    ),
  ),
  'palettes' => array(
    '1' => array( 'showitem' => 'title_lang_ol,' ),
  )
);
?>