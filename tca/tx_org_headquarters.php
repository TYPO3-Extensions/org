<?php

if (!defined('TYPO3_MODE'))
{
  die('Access denied.');
}



/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//
// INDEX
// -----
//   tx_org_headquarters
//   tx_org_headquarterscat
//
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//
// tx_org_headquarters

$TCA['tx_org_headquarters'] = array(
  'ctrl' => $TCA['tx_org_headquarters']['ctrl'],
  'interface' => array(
    'showRecordFieldList' => ''
//    . 'sys_language_uid,l10n_parent,l10n_diffsource,'
    . 'title,uid_parent,tx_org_headquarterscat,'
    . 'mail_address,mail_street,mail_postcode,mail_city,mail_country,mail_lat,mail_lon,mail_url,mail_embeddedcode,'
    . 'postbox_postbox,postbox_postcode,postbox_city,'
    . 'telephone,fax,email,url,'
    . 'tx_org_staff,'
    . 'tx_org_service,'
    . 'tx_org_job,'
    . 'tx_org_event,'
    . 'tx_org_location,'
    . 'pubtrans_stop,pubtrans_url,pubtrans_embeddedcode,'
    . 'documents_from_path,documents,documentscaption,documentslayout,documentssize,'
    . 'image,imagecaption,imageseo,imagewidth,imageheight,imageorient,imagecaption,imagecols,imageborder,imagecaption_position,image_link,image_zoom,image_noRows,image_effects,image_compression,'
    . 'embeddedcode,'
    . 'tx_org_department,'
    . 'hidden,pages,fe_group,'
    . 'keywords,description'
  ,
  ),
  'feInterface' => $TCA['tx_org_headquarters']['feInterface'],
  'columns' => array(
//    'sys_language_uid' => array(
//      'exclude' => 1,
//      'label' => 'LLL:EXT:lang/locallang_general.php:LGL.language',
//      'config' => array(
//        'type' => 'select',
//        'foreign_table' => 'sys_language',
//        'foreign_table_where' => 'ORDER BY sys_language.title',
//        'items' => array(
//          array('LLL:EXT:lang/locallang_general.php:LGL.allLanguages', -1),
//          array('LLL:EXT:lang/locallang_general.php:LGL.default_value', 0),
//        ),
//      ),
//    ),
//    'l10n_parent' => array(
//      'displayCond' => 'FIELD:sys_language_uid:>:0',
//      'exclude' => 1,
//      'label' => 'LLL:EXT:lang/locallang_general.php:LGL.l18n_parent',
//      'config' => array(
//        'type' => 'select',
//        'items' => array(
//          array('', 0),
//        ),
//        'foreign_table' => 'tx_org_headquarters',
//        'foreign_table_where' => 'AND tx_org_headquarters.uid=###REC_FIELD_l10n_parent### AND tx_org_headquarters.deleted = 0 AND tx_org_headquarters.hidden = 0 AND tx_org_headquarters.sys_language_uid IN (-1,0)',
//      ),
//    ),
//    'l10n_diffsource' => array(
//      'config' => array(
//        'type' => 'passthrough'
//      ),
//    ),
    'title' => array(
      'exclude' => 0,
      'l10n_mode' => 'prefixLangTitle',
      'label' => 'LLL:EXT:org/tca/locallang/tx_org_headquarters.xml:tx_org_headquarters.title',
      'config' => $conf_input_30_trimRequired,
    ),
    'uid_parent' => array(
      'exclude' => 0,
      'label' => 'LLL:EXT:org/tca/locallang/tx_org_headquarters.xml:tx_org_headquarters.uid_parent',
      'config' => array(
        'type' => 'select',
        'form_type' => 'user',
        'userFunc' => 'tx_cpstcatree->getTree',
        'foreign_table' => 'tx_org_headquarters',
        // 140615, dwildt, 1-
        // Zeigt in 4.6 keine Datensaetze an
        //'foreign_table_where' => 'AND tx_org_headquarters.' . $str_store_record_conf . ' AND tx_org_headquarters.deleted = 0 AND tx_org_headquarters.hidden = 0 AND tx_org_headquarters.sys_language_uid=###REC_FIELD_sys_language_uid### ORDER BY tx_org_headquarters.title',
        // 140615, dwildt, 1+
        // Zeigt in 4.6 Datensaetze an
        'foreign_table_where' => 'AND tx_org_headquarters.deleted = 0 AND tx_org_headquarters.hidden = 0 AND tx_org_headquarters.sys_language_uid=###REC_FIELD_sys_language_uid### ORDER BY tx_org_headquarters.title',
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
    'tx_org_headquarterscat' => array(
      'exclude' => $bool_exclude_default,
      'l10n_mode' => 'exclude',
      'label' => 'LLL:EXT:org/tca/locallang/tx_org_headquarters.xml:tx_org_headquarters.tx_org_headquarterscat',
      'config' => array(
        'type' => 'select',
        'size' => 10,
        'minitems' => 0,
        'maxitems' => 99,
        'MM' => 'tx_org_headquarters_mm_tx_org_headquarterscat',
        'foreign_table' => 'tx_org_headquarterscat',
        // #58885, 140516, dwildt, 6+
        'form_type' => 'user',
        'userFunc' => 'tx_cpstcatree->getTree',
        'treeView' => 1,
        'expandable' => 1,
        'expandFirst' => 0,
        'expandAll' => 0,
        'foreign_table_where' => 'AND tx_org_headquarterscat.' . $str_store_record_conf . ' AND tx_org_headquarterscat.deleted = 0 AND tx_org_headquarterscat.hidden = 0 ORDER BY tx_org_headquarterscat.sorting',
        'wizards' => array(
          '_PADDING' => 2,
          '_VERTICAL' => 0,
          'add' => array(
            'type' => 'script',
            'title' => 'LLL:EXT:org/tca/locallang/tx_org_headquarters.xml:wizard.tx_org_headquarterscat.add',
            'icon' => 'add.gif',
            'params' => array(
              'table' => 'tx_org_headquarterscat',
              'pid' => $str_marker_pid,
              'setValue' => 'prepend'
            ),
            'script' => 'wizard_add.php',
          ),
          'list' => array(
            'type' => 'script',
            'title' => 'LLL:EXT:org/tca/locallang/tx_org_headquarters.xml:wizard.tx_org_headquarterscat.list',
            'icon' => 'list.gif',
            'params' => array(
              'table' => 'tx_org_headquarterscat',
              'pid' => $str_marker_pid,
            ),
            'script' => 'wizard_list.php',
          ),
          'edit' => array(
            'type' => 'popup',
            'title' => 'LLL:EXT:org/tca/locallang/tx_org_headquarters.xml:wizard.tx_org_headquarterscat.edit',
            'script' => 'wizard_edit.php',
            'popup_onlyOpenIfSelected' => 1,
            'icon' => 'edit2.gif',
            'JSopenParams' => $JSopenParams,
          ),
        ),
      ),
    ),
    'mail_address' => array(
      'exclude' => $bool_exclude_default,
//      'l10n_mode' => 'exclude',
      'label' => 'LLL:EXT:org/tca/locallang/tx_org_headquarters.xml:tx_org_headquarters.mail_address',
      'config' => $conf_text_30_05,
    ),
    'mail_street' => array(
      'exclude' => $bool_exclude_default,
//      'l10n_mode' => 'exclude',
      'label' => 'LLL:EXT:org/tca/locallang/tx_org_headquarters.xml:tx_org_headquarters.mail_street',
      'config' => array(
        'type' => 'input',
        'size' => '60',
        'eval' => 'trim'
      ),
    ),
    'mail_postcode' => array(
      'exclude' => $bool_exclude_default,
//      'l10n_mode' => 'exclude',
      'label' => 'LLL:EXT:org/tca/locallang/tx_org_headquarters.xml:tx_org_headquarters.mail_postcode',
      'config' => $conf_input_30_trim,
    ),
    'mail_city' => array(
      'exclude' => $bool_exclude_default,
//      'l10n_mode' => 'exclude',
      'label' => 'LLL:EXT:org/tca/locallang/tx_org_headquarters.xml:tx_org_headquarters.mail_city',
      'config' => $conf_input_30_trim,
    ),
    'mail_country' => array(
      'exclude' => $bool_exclude_default,
//      'l10n_mode' => 'exclude',
      'label' => 'LLL:EXT:org/tca/locallang/tx_org_headquarters.xml:tx_org_headquarters.mail_country',
      'config' => $conf_input_30,
    ),
    'mail_lat' => array(
      'exclude' => $bool_exclude_default,
      'l10n_mode' => 'exclude',
      'label' => 'LLL:EXT:org/tca/locallang/tx_org_headquarters.xml:tx_org_headquarters.mail_lat',
      'config' => $conf_input_30,
    ),
    'mail_lon' => array(
      'exclude' => $bool_exclude_default,
      'l10n_mode' => 'exclude',
      'label' => 'LLL:EXT:org/tca/locallang/tx_org_headquarters.xml:tx_org_headquarters.mail_lon',
      'config' => $conf_input_30,
    ),
    'mail_url' => array(
      'exclude' => $bool_exclude_default,
//      'l10n_mode' => 'exclude',
      'label' => 'LLL:EXT:org/tca/locallang/tx_org_headquarters.xml:tx_org_headquarters.mail_url',
      'config' => $arr_wizard_url,
    ),
    'mail_embeddedcode' => array(
      'exclude' => $bool_exclude_default,
//      'l10n_mode' => 'exclude',
      'label' => 'LLL:EXT:org/tca/locallang/tx_org_headquarters.xml:tx_org_headquarters.mail_embeddedcode',
      'config' => $conf_text_50_10,
    ),
    'geoupdateprompt' => array(
      'exclude' => 0,
      'label' => 'LLL:EXT:org/tca/locallang/tx_org_headquarters.xml:tx_org_headquarters.geoupdateprompt',
      'config' => $conf_text_50_10,
    ),
    'geoupdateforbidden' => array(
      'exclude' => 0,
      'label' => 'LLL:EXT:org/tca/locallang/tx_org_headquarters.xml:tx_org_headquarters.geoupdateforbidden',
      'config' => array(
        'type' => 'check',
        'default' => '0'
      )
    ),
    'postbox_postbox' => array(
      'exclude' => $bool_exclude_default,
//      'l10n_mode' => 'exclude',
      'label' => 'LLL:EXT:org/tca/locallang/tx_org_headquarters.xml:tx_org_headquarters.postbox_postbox',
      'config' => $conf_text_30_05,
    ),
    'postbox_postcode' => array(
      'exclude' => $bool_exclude_default,
//      'l10n_mode' => 'exclude',
      'label' => 'LLL:EXT:org/tca/locallang/tx_org_headquarters.xml:tx_org_headquarters.postbox_postcode',
      'config' => $conf_input_30_trim,
    ),
    'postbox_city' => array(
      'exclude' => $bool_exclude_default,
//      'l10n_mode' => 'exclude',
      'label' => 'LLL:EXT:org/tca/locallang/tx_org_headquarters.xml:tx_org_headquarters.postbox_city',
      'config' => $conf_input_30_trim,
    ),
    'telephone' => array(
      'label' => 'LLL:EXT:org/tca/locallang/tx_org_headquarters.xml:tx_org_headquarters.telephone',
      'exclude' => $bool_exclude_default,
      'config' => $conf_input_30_trim,
    ),
    'fax' => array(
      'label' => 'LLL:EXT:org/tca/locallang/tx_org_headquarters.xml:tx_org_headquarters.fax',
      'exclude' => $bool_exclude_default,
      'config' => $conf_input_30_trim,
    ),
    'email' => array(
      'label' => 'LLL:EXT:org/tca/locallang/tx_org_headquarters.xml:tx_org_headquarters.email',
      'exclude' => $bool_exclude_default,
      'config' => $conf_input_30_trim,
    ),
    'url' => array (
      'label' => 'LLL:EXT:org/tca/locallang/tx_org_headquarters.xml:tx_org_headquarters.url',
//      'l10n_mode' => 'exclude',
      'exclude'   => $bool_exclude_default,
      'config'    => $arr_wizard_url,
    ),
    'tx_org_service' => array(
      'l10n_mode' => 'exclude',
      'exclude' => 0,
      'l10n_mode' => 'exclude',
      'label' => 'LLL:EXT:org/tca/locallang/tx_org_headquarters.xml:tx_org_headquarters.tx_org_service',
      'config' => array(
        'type' => 'select',
        'size' => $size_headquarters,
        'minitems' => 0,
        'maxitems' => 999,
        'MM' => 'tx_org_mm_all',
        "MM_match_fields" => array(
          'table_local' => 'tx_org_headquarters',
          'table_foreign' => 'tx_org_service'
        ),
        "MM_insert_fields" => array(
          'table_local' => 'tx_org_headquarters',
          'table_foreign' => 'tx_org_service'
        ),
        'foreign_table' => 'tx_org_service',
        'foreign_table_where' => 'AND tx_org_service.' . $str_store_record_conf . ' AND tx_org_service.deleted = 0 AND tx_org_service.hidden = 0 AND tx_org_service.sys_language_uid=###REC_FIELD_sys_language_uid### ORDER BY tx_org_service.title',
        'selectedListStyle' => $listStyleWidth,
        'itemListStyle' => $listStyleWidth,
      )
    ),
    'tx_org_staff' => array(
      'l10n_mode' => 'exclude',
      'exclude' => 0,
      'l10n_mode' => 'exclude',
      'label' => 'LLL:EXT:org/tca/locallang/tx_org_headquarters.xml:tx_org_headquarters.tx_org_staff',
      'config' => array(
        'type' => 'select',
        'size' => $size_headquarters,
        'minitems' => 0,
        'maxitems' => 999,
        'MM' => 'tx_org_mm_all',
        "MM_match_fields" => array(
          'table_local' => 'tx_org_headquarters',
          'table_foreign' => 'tx_org_staff'
        ),
        "MM_insert_fields" => array(
          'table_local' => 'tx_org_headquarters',
          'table_foreign' => 'tx_org_staff'
        ),
        'foreign_table' => 'tx_org_staff',
        'foreign_table_where' => 'AND tx_org_staff.' . $str_store_record_conf . ' AND tx_org_staff.deleted = 0 AND tx_org_staff.hidden = 0 AND tx_org_staff.sys_language_uid=###REC_FIELD_sys_language_uid### ORDER BY tx_org_staff.title',
        'selectedListStyle' => $listStyleWidth,
        'itemListStyle' => $listStyleWidth,
      )
    ),
    'tx_org_job' => array(
      'l10n_mode' => 'exclude',
      'exclude' => 0,
      'l10n_mode' => 'exclude',
      'label' => 'LLL:EXT:org/tca/locallang/tx_org_headquarters.xml:tx_org_headquarters.tx_org_job',
      'config' => array(
        'type' => 'select',
        'size' => $size_headquarters,
        'minitems' => 0,
        'maxitems' => 999,
        'MM' => 'tx_org_mm_all',
        "MM_match_fields" => array(
          'table_local' => 'tx_org_headquarters',
          'table_foreign' => 'tx_org_job'
        ),
        "MM_insert_fields" => array(
          'table_local' => 'tx_org_headquarters',
          'table_foreign' => 'tx_org_job'
        ),
        'foreign_table' => 'tx_org_job',
        'foreign_table_where' => 'AND tx_org_job.' . $str_store_record_conf . ' AND tx_org_job.deleted = 0 AND tx_org_job.hidden = 0 AND tx_org_job.sys_language_uid=###REC_FIELD_sys_language_uid### ORDER BY tx_org_job.title',
        'selectedListStyle' => $listStyleWidth,
        'itemListStyle' => $listStyleWidth,
      )
    ),
    'tx_org_event' => array(
      'l10n_mode' => 'exclude',
      'exclude' => 0,
      'l10n_mode' => 'exclude',
      'label' => 'LLL:EXT:org/tca/locallang/tx_org_headquarters.xml:tx_org_headquarters.tx_org_event',
      'config' => array(
        'type' => 'select',
        'size' => $size_headquarters,
        'minitems' => 0,
        'maxitems' => 999,
        'MM' => 'tx_org_mm_all',
        "MM_match_fields" => array(
          'table_local' => 'tx_org_headquarters',
          'table_foreign' => 'tx_org_event'
        ),
        "MM_insert_fields" => array(
          'table_local' => 'tx_org_headquarters',
          'table_foreign' => 'tx_org_event'
        ),
        'foreign_table' => 'tx_org_event',
        'foreign_table_where' => 'AND tx_org_event.' . $str_store_record_conf . ' AND tx_org_event.deleted = 0 AND tx_org_event.hidden = 0 AND tx_org_event.sys_language_uid=###REC_FIELD_sys_language_uid### ORDER BY tx_org_event.title',
        'selectedListStyle' => $listStyleWidth,
        'itemListStyle' => $listStyleWidth,
      )
    ),
    'tx_org_location' => array(
      'l10n_mode' => 'exclude',
      'exclude' => 0,
      'l10n_mode' => 'exclude',
      'label' => 'LLL:EXT:org/tca/locallang/tx_org_headquarters.xml:tx_org_headquarters.tx_org_location',
      'config' => array(
        'type' => 'select',
        'size' => $size_headquarters,
        'minitems' => 0,
        'maxitems' => 999,
        'MM' => 'tx_org_mm_all',
        "MM_match_fields" => array(
          'table_local' => 'tx_org_headquarters',
          'table_foreign' => 'tx_org_location'
        ),
        "MM_insert_fields" => array(
          'table_local' => 'tx_org_headquarters',
          'table_foreign' => 'tx_org_location'
        ),
        'foreign_table' => 'tx_org_location',
        'foreign_table_where' => 'AND tx_org_location.' . $str_store_record_conf . ' AND tx_org_location.deleted = 0 AND tx_org_location.hidden = 0 AND tx_org_location.sys_language_uid=###REC_FIELD_sys_language_uid### ORDER BY tx_org_location.title',
        'selectedListStyle' => $listStyleWidth,
        'itemListStyle' => $listStyleWidth,
      )
    ),
    'pubtrans_stop' => array(
      'exclude' => $bool_exclude_default,
//      'l10n_mode' => 'exclude',
      'label' => 'LLL:EXT:org/tca/locallang/tx_org_headquarters.xml:tx_org_headquarters.pubtrans_stop',
      'config' => $conf_text_rte,
    ),
    'pubtrans_url' => array(
      'label' => 'LLL:EXT:org/tca/locallang/tx_org_headquarters.xml:tx_org_headquarters.pubtrans_url',
      'exclude' => $bool_exclude_default,
      'config' => $arr_wizard_url,
    ),
    'pubtrans_embeddedcode' => array(
      'label' => 'LLL:EXT:org/tca/locallang/tx_org_headquarters.xml:tx_org_headquarters.pubtrans_embeddedcode',
      'exclude' => $bool_exclude_default,
      'config' => $conf_text_50_10,
    ),
    'tx_org_department' => array(
      'exclude' => $bool_exclude_tx_org_department,
      'label' => 'LLL:EXT:org/tca/locallang/tx_org_headquarters.xml:tx_org_headquarters.tx_org_department',
      'config' => array(
        'type' => 'select',
        'size' => $size_department,
        'minitems' => 0,
        'maxitems' => 999,
        'MM' => 'tx_org_headquarters_mm_tx_org_department',
        'foreign_table' => 'tx_org_department',
        'foreign_table_where' => 'AND tx_org_department.' . $str_store_record_conf . ' AND tx_org_department.deleted = 0 AND tx_org_department.hidden = 0 AND tx_org_department.sys_language_uid=###REC_FIELD_sys_language_uid### ORDER BY tx_org_department.sorting',
        'wizards' => array(
          '_PADDING' => 2,
          '_VERTICAL' => 0,
          'add' => array(
            'type' => 'script',
            'title' => 'LLL:EXT:org/tca/locallang/tx_org_headquarters.xml:wizard.tx_org_department.add',
            'icon' => 'add.gif',
            'params' => array(
              'table' => 'tx_org_department',
              'pid' => $str_marker_pid,
              'setValue' => 'prepend'
            ),
            'script' => 'wizard_add.php',
          ),
          'list' => array(
            'type' => 'script',
            'title' => 'LLL:EXT:org/tca/locallang/tx_org_headquarters.xml:wizard.tx_org_department.list',
            'icon' => 'list.gif',
            'params' => array(
              'table' => 'tx_org_department',
              'pid' => $str_marker_pid,
            ),
            'script' => 'wizard_list.php',
          ),
          'edit' => array(
            'type' => 'popup',
            'title' => 'LLL:EXT:org/tca/locallang/tx_org_headquarters.xml:wizard.tx_org_department.edit',
            'script' => 'wizard_edit.php',
            'popup_onlyOpenIfSelected' => 1,
            'icon' => 'edit2.gif',
            'JSopenParams' => $JSopenParams,
          ),
        ),
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
          array('', ''),
          array('LLL:EXT:cms/locallang_ttc.xml:imagecaption_position.I.1', 'center'),
          array('LLL:EXT:cms/locallang_ttc.xml:imagecaption_position.I.2', 'right'),
          array('LLL:EXT:cms/locallang_ttc.xml:imagecaption_position.I.3', 'left'),
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
          array('LLL:EXT:cms/locallang_ttc.xml:imageorient.I.0', 0, 'selicons/above_center.gif'),
          array('LLL:EXT:cms/locallang_ttc.xml:imageorient.I.1', 1, 'selicons/above_right.gif'),
          array('LLL:EXT:cms/locallang_ttc.xml:imageorient.I.2', 2, 'selicons/above_left.gif'),
          array('LLL:EXT:cms/locallang_ttc.xml:imageorient.I.3', 8, 'selicons/below_center.gif'),
          array('LLL:EXT:cms/locallang_ttc.xml:imageorient.I.4', 9, 'selicons/below_right.gif'),
          array('LLL:EXT:cms/locallang_ttc.xml:imageorient.I.5', 10, 'selicons/below_left.gif'),
          array('LLL:EXT:cms/locallang_ttc.xml:imageorient.I.6', 17, 'selicons/intext_right.gif'),
          array('LLL:EXT:cms/locallang_ttc.xml:imageorient.I.7', 18, 'selicons/intext_left.gif'),
          array('LLL:EXT:cms/locallang_ttc.xml:imageorient.I.8', '--div--'),
          array('LLL:EXT:cms/locallang_ttc.xml:imageorient.I.9', 25, 'selicons/intext_right_nowrap.gif'),
          array('LLL:EXT:cms/locallang_ttc.xml:imageorient.I.10', 26, 'selicons/intext_left_nowrap.gif'),
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
          array('LLL:EXT:cms/locallang_ttc.xml:image_effects.I.0', 0),
          array('LLL:EXT:cms/locallang_ttc.xml:image_effects.I.1', 1),
          array('LLL:EXT:cms/locallang_ttc.xml:image_effects.I.2', 2),
          array('LLL:EXT:cms/locallang_ttc.xml:image_effects.I.3', 3),
          array('LLL:EXT:cms/locallang_ttc.xml:image_effects.I.4', 10),
          array('LLL:EXT:cms/locallang_ttc.xml:image_effects.I.5', 11),
          array('LLL:EXT:cms/locallang_ttc.xml:image_effects.I.6', 20),
          array('LLL:EXT:cms/locallang_ttc.xml:image_effects.I.7', 23),
          array('LLL:EXT:cms/locallang_ttc.xml:image_effects.I.8', 25),
          array('LLL:EXT:cms/locallang_ttc.xml:image_effects.I.9', 26),
        ),
      ),
    ),
    'image_frames' => array(
      'exclude' => $bool_exclude_none,
      'label' => 'LLL:EXT:cms/locallang_ttc.xml:image_frames',
      'config' => array(
        'type' => 'select',
        'items' => array(
          array('LLL:EXT:cms/locallang_ttc.xml:image_frames.I.0', 0),
          array('LLL:EXT:cms/locallang_ttc.xml:image_frames.I.1', 1),
          array('LLL:EXT:cms/locallang_ttc.xml:image_frames.I.2', 2),
          array('LLL:EXT:cms/locallang_ttc.xml:image_frames.I.3', 3),
          array('LLL:EXT:cms/locallang_ttc.xml:image_frames.I.4', 4),
          array('LLL:EXT:cms/locallang_ttc.xml:image_frames.I.5', 5),
          array('LLL:EXT:cms/locallang_ttc.xml:image_frames.I.6', 6),
          array('LLL:EXT:cms/locallang_ttc.xml:image_frames.I.7', 7),
          array('LLL:EXT:cms/locallang_ttc.xml:image_frames.I.8', 8),
        ),
      ),
    ),
    'image_compression' => array(
      'exclude' => $bool_exclude_none,
      'label' => 'LLL:EXT:cms/locallang_ttc.xml:image_compression',
      'config' => array(
        'type' => 'select',
        'items' => array(
          array('LLL:EXT:lang/locallang_general.php:LGL.default_value', 0),
          array('LLL:EXT:cms/locallang_ttc.xml:image_compression.I.1', 1),
          array('GIF/256', 10),
          array('GIF/128', 11),
          array('GIF/64', 12),
          array('GIF/32', 13),
          array('GIF/16', 14),
          array('GIF/8', 15),
          array('PNG', 39),
          array('PNG/256', 30),
          array('PNG/128', 31),
          array('PNG/64', 32),
          array('PNG/32', 33),
          array('PNG/16', 34),
          array('PNG/8', 35),
          array('LLL:EXT:cms/locallang_ttc.xml:image_compression.I.15', 21),
          array('LLL:EXT:cms/locallang_ttc.xml:image_compression.I.16', 22),
          array('LLL:EXT:cms/locallang_ttc.xml:image_compression.I.17', 24),
          array('LLL:EXT:cms/locallang_ttc.xml:image_compression.I.18', 26),
          array('LLL:EXT:cms/locallang_ttc.xml:image_compression.I.19', 28),
        ),
      ),
    ),
    'imagecols' => array(
      'exclude' => $bool_exclude_default,
      'label' => 'LLL:EXT:cms/locallang_ttc.xml:imagecols',
      'config' => array(
        'type' => 'select',
        'items' => array(
          array('1', 1),
          array('2', 2),
          array('3', 3),
          array('4', 4),
          array('5', 5),
          array('6', 6),
          array('7', 7),
          array('8', 8),
        ),
        'default' => 1
      ),
    ),
    'embeddedcode' => array(
      'exclude' => $bool_exclude_none,
      'label' => 'LLL:EXT:org/locallang_db.xml:tca_phrase.embeddedcode',
      'config' => $conf_text_50_10,
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
      'label' => 'LLL:EXT:org/locallang_db.xml:tca_phrase.documents',
      'config' => $conf_file_document,
    ),
    'documentscaption' => array(
      'exclude' => $bool_exclude_default,
      'label' => 'LLL:EXT:org/locallang_db.xml:tca_phrase.documentscaption',
      'config' => $conf_text_30_05,
    ),
    'documentslayout' => array(
      'exclude' => $bool_exclude_default,
      'label' => 'LLL:EXT:org/locallang_db.xml:tca_phrase.documentslayout',
      'config' => array(
        'type' => 'select',
        'size' => 1,
        'maxitems' => 1,
        'items' => array(
          array('LLL:EXT:org/locallang_db.xml:tca_phrase.documentslayout.0', 0),
          array('LLL:EXT:org/locallang_db.xml:tca_phrase.documentslayout.1', 1),
          array('LLL:EXT:org/locallang_db.xml:tca_phrase.documentslayout.2', 2),
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
    'hidden' => $conf_hidden,
    'pages' => $conf_pages,
    'fe_group' => $conf_fegroup,
    'keywords' => array(
      'exclude' => $bool_exclude_default,
      'l10n_mode' => 'prefixLangTitle',
      'label' => 'LLL:EXT:org/locallang_db.xml:tca_phrase.keywords',
      'config' => $conf_input_80_trim,
    ),
    'description' => array(
      'exclude' => $bool_exclude_default,
      'l10n_mode' => 'prefixLangTitle',
      'label' => 'LLL:EXT:org/locallang_db.xml:tca_phrase.description',
      'config' => $conf_text_50_10,
    ),
  ),
  'types' => array(
    '0' => array('showitem' => ''
      . '--div--;LLL:EXT:org/tca/locallang/tx_org_headquarters.xml:tx_org_headquarters.div_headquarters, '
      . '  title,uid_parent,tx_org_headquarterscat,'
      . '--div--;LLL:EXT:org/tca/locallang/tx_org_headquarters.xml:tx_org_headquarters.div_mail, '
      . '  --palette--;LLL:EXT:org/tca/locallang/tx_org_headquarters.xml:tx_org_headquarters.palette_mailaddress;mailaddress, '
      . '  --palette--;LLL:EXT:org/tca/locallang/tx_org_headquarters.xml:tx_org_headquarters.palette_maillatlon;maillatlon, '
      . '  mail_url,mail_embeddedcode,'
      . '  postbox_postbox;;;;3-3-3,postbox_postcode,postbox_city,'
      . '--div--;LLL:EXT:org/tca/locallang/tx_org_headquarters.xml:tx_org_headquarters.div_contact,'
      . '  telephone,fax,email,url,'
      . '--div--;LLL:EXT:org/tca/locallang/tx_org_headquarters.xml:tx_org_headquarters.div_staff,'
      . '  tx_org_staff,'
      . '--div--;LLL:EXT:org/tca/locallang/tx_org_headquarters.xml:tx_org_headquarters.div_service,'
      . '  tx_org_service,'
      . '--div--;LLL:EXT:org/tca/locallang/tx_org_headquarters.xml:tx_org_headquarters.div_job,'
      . '  tx_org_job,'
      . '--div--;LLL:EXT:org/tca/locallang/tx_org_headquarters.xml:tx_org_headquarters.div_event,'
      . '  tx_org_event,'
      . '--div--;LLL:EXT:org/tca/locallang/tx_org_headquarters.xml:tx_org_headquarters.div_location,'
      . '  tx_org_location,'
      . '--div--;LLL:EXT:org/tca/locallang/tx_org_headquarters.xml:tx_org_headquarters.div_department,'
      . '  tx_org_department,'
      . '--div--;LLL:EXT:org/tca/locallang/tx_org_headquarters.xml:tx_org_headquarters.div_pubtrans,'
      . '  pubtrans_stop;;;richtext[]:rte_transform[mode=ts],pubtrans_url,pubtrans_embeddedcode,'
      . '--div--;LLL:EXT:cms/locallang_ttc.xml:tabs.images,'
      . '  --palette--;LLL:EXT:cms/locallang_ttc.xml:palette.imagefiles;imagefiles,'
      . '  --palette--;LLL:EXT:org/locallang_db.xml:palette.image_accessibility;image_accessibility,'
      . '  --palette--;LLL:EXT:cms/locallang_ttc.xml:palette.imageblock;imageblock,'
      . '  --palette--;LLL:EXT:cms/locallang_ttc.xml:palette.imagelinks;imagelinks,'
      . '  --palette--;LLL:EXT:cms/locallang_ttc.xml:palette.image_settings;image_settings,'
      . '--div--;LLL:EXT:cms/locallang_ttc.xml:tabs.media,'
      . '  --palette--;LLL:EXT:cms/locallang_ttc.xml:media;documents_upload,'
      . '  --palette--;LLL:EXT:org/locallang_db.xml:palette.appearance;documents_appearance,'
      . '--div--;LLL:EXT:org/tca/locallang/tx_org_headquarters.xml:tx_org_headquarters.div_embedded,'
      . '  embeddedcode,'
      . '--div--;LLL:EXT:org/tca/locallang/tx_org_headquarters.xml:tx_org_headquarters.div_control,'
      . '  hidden,pages,fe_group,'
      . '--div--;LLL:EXT:org/tca/locallang/tx_org_headquarters.xml:tx_org_headquarters.div_seo,'
      . '  keywords, description,'
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
      . 'mail_address;LLL:EXT:org/tca/locallang/tx_org_headquarters.xml:tx_org_headquarters.mail_address,--linebreak--,'
      . 'mail_street;LLL:EXT:org/tca/locallang/tx_org_headquarters.xml:tx_org_headquarters.mail_street,--linebreak--,'
      . 'mail_postcode;LLL:EXT:org/tca/locallang/tx_org_headquarters.xml:tx_org_headquarters.mail_postcode,'
      . 'mail_city;LLL:EXT:org/tca/locallang/tx_org_headquarters.xml:tx_org_headquarters.mail_city,--linebreak--,'
      . 'mail_country;LLL:EXT:org/tca/locallang/tx_org_headquarters.xml:tx_org_headquarters.mail_country,',
      'canNotCollapse' => 1,
    ),
    'maillatlon' => array(
      'showitem' => ''
      . 'geoupdateprompt;LLL:EXT:org/tca/locallang/tx_org_headquarters.xml:tx_org_headquarters.geoupdateprompt,--linebreak--,'
      . 'geoupdateforbidden;LLL:EXT:org/tca/locallang/tx_org_headquarters.xml:tx_org_headquarters.geoupdateforbidden,--linebreak--,'
      . 'mail_lat;LLL:EXT:org/tca/locallang/tx_org_headquarters.xml:tx_org_headquarters.mail_lat,'
      . 'mail_lon;LLL:EXT:org/tca/locallang/tx_org_headquarters.xml:tx_org_headquarters.mail_lon,',
      'canNotCollapse' => 1,
    ),
  ),
);
if (!$bool_exclude_tx_org_company)
{
  $TCA['tx_org_headquarters']['columns']['title']['label'] = 'LLL:EXT:org/tca/locallang/tx_org_headquarters.xml:tx_org_company.title';
  $showitem = $TCA['tx_org_headquarters']['types']['0']['showitem'];
  $showitem = str_replace
          (
          'LLL:EXT:org/tca/locallang/tx_org_headquarters.xml:tx_org_headquarters.div_headquarters', 'LLL:EXT:org/tca/locallang/tx_org_headquarters.xml:tx_org_headquarters.div_company', $showitem
  );
  $TCA['tx_org_headquarters']['types']['0']['showitem'] = $showitem;
}
if (!$bool_full_wizardSupport_allTables)
{
  unset($TCA['tx_org_headquarters']['columns']['tx_org_department']['config']['wizards']['add']);
  unset($TCA['tx_org_headquarters']['columns']['tx_org_department']['config']['wizards']['list']);
}

// tx_org_headquarters
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//
// tx_org_headquarterscat

$TCA['tx_org_headquarterscat'] = array(
  'ctrl' => $TCA['tx_org_headquarterscat']['ctrl'],
  'interface' => array(
    'showRecordFieldList' => 'title,title_lang_ol,uid_parent,icons,icon_offset_x,icon_offset_y,' .
    'hidden,' .
    'image,imagecaption,imageseo',
  ),
  'columns' => array(
    'title' => array(
      'exclude' => 0,
      'label' => 'LLL:EXT:org/tca/locallang/tx_org_headquarters.xml:tx_org_headquarterscat.title',
      'config' => $conf_input_30_trimRequired,
    ),
    'title_lang_ol' => array(
      'exclude' => 0,
      'label' => 'LLL:EXT:org/tca/locallang/tx_org_headquarters.xml:tx_org_headquarterscat.title_lang_ol',
      'config' => $conf_input_30_trim,
    ),
    'uid_parent' => array(
      'exclude' => 0,
      'label' => 'LLL:EXT:org/tca/locallang/tx_org_headquarters.xml:tx_org_headquarterscat.uid_parent',
      'config' => array(
        'type' => 'select',
        'form_type' => 'user',
        'userFunc' => 'tx_cpstcatree->getTree',
        'foreign_table' => 'tx_org_headquarterscat',
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
      'label' => 'LLL:EXT:org/tca/locallang/tx_org_headquarters.xml:tx_org_headquarterscat.icons',
      'config' => $conf_file_image,
    ),
    'icon_offset_x' => array(
      'exclude' => 0,
      'label' => 'LLL:EXT:org/tca/locallang/tx_org_headquarters.xml:tx_org_headquarterscat.icon_offset_x',
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
      'label' => 'LLL:EXT:org/tca/locallang/tx_org_headquarters.xml:tx_org_headquarterscat.icon_offset_y',
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
    '0' => array('showitem' =>
      '--div--;LLL:EXT:org/tca/locallang/tx_org_headquarters.xml:tx_org_headquarterscat.div_cat,' .
      'title;;1;;1-1-1,uid_parent,icons,icon_offset_x,icon_offset_y,' .
      '--div--;LLL:EXT:org/tca/locallang/tx_org_headquarters.xml:tx_org_headquarterscat.div_control,' .
      'hidden'
    ),
  ),
  'palettes' => array(
    '1' => array('showitem' => 'title_lang_ol,'),
  ),
);
// tx_org_headquarterscat
?>