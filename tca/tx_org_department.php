<?php

if (!defined ('TYPO3_MODE'))
{
  die ('Access denied.');
}



  /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
  //
  // INDEX
  // -----
  //   tx_org_department
  //   tx_org_departmentcat
  /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
  //
  // tx_org_department

$TCA['tx_org_department'] = array (
  'ctrl' => $TCA['tx_org_department']['ctrl'],
  'interface' => array (
    'showRecordFieldList' =>  'sys_language_uid,l10n_parent,l10n_diffsource,title,shortcut,tx_org_departmentcat,tx_org_headquarters,'.
                              'manager,telephone,fax,email,url,'.
                              'fe_users,'.
                              'tx_org_cal,'.
                              'documents_from_path,documents,documentscaption,documentslayout,documentssize,' .
                              'tx_org_news,'.
                              'image,imagecaption,imageseo,imagewidth,imageheight,imageorient,imagecaption,imagecols,imageborder,imagecaption_position,image_link,image_zoom,image_noRows,image_effects,image_compression,' .
                              'embeddedcode,'.
                              'hidden,pages,fe_group,'.
                              'keywords,description',
  ),
  'feInterface' => $TCA['tx_org_department']['feInterface'],
  'columns' => array (
    'sys_language_uid' => array (
      'exclude' => 1,
      'label'   => 'LLL:EXT:lang/locallang_general.php:LGL.language',
      'config'  => array (
        'type'                => 'select',
        'foreign_table'       => 'sys_language',
        'foreign_table_where' => 'ORDER BY sys_language.title',
        'items' => array (
          array ('LLL:EXT:lang/locallang_general.php:LGL.allLanguages',-1),
          array ('LLL:EXT:lang/locallang_general.php:LGL.default_value',0),
        ),
      ),
    ),
    'l10n_parent' => array (
      'displayCond' => 'FIELD:sys_language_uid:>:0',
      'exclude'     => 1,
      'label'       => 'LLL:EXT:lang/locallang_general.php:LGL.l18n_parent',
      'config'      => array (
        'type'  => 'select',
        'items' => array (
          array ('', 0),
        ),
        'foreign_table'       => 'tx_org_department',
        'foreign_table_where' => 'AND tx_org_department.uid=###REC_FIELD_l10n_parent### AND tx_org_department.sys_language_uid IN (-1,0)',
      ),
    ),
    'l10n_diffsource' => array (
      'config'  => array (
        'type'  =>'passthrough'
      ),
    ),
    'title' => array (
      'exclude' => 0,
      'label'   => 'LLL:EXT:org/tca/locallang/tx_org_department.xml:tx_org_department.title',
      'config'  => $conf_input_30_trimRequired,
    ),
    'shortcut' => array (
      'exclude' => $bool_exclude_default,
      'label'   => 'LLL:EXT:org/tca/locallang/tx_org_department.xml:tx_org_department.shortcut',
      'config'  => $conf_input_30_trim,
    ),
    'tx_org_departmentcat' => array (
      'exclude'   => $bool_exclude_default,
      'l10n_mode' => 'exclude',
      'label'     => 'LLL:EXT:org/tca/locallang/tx_org_department.xml:tx_org_department.tx_org_departmentcat',
      'config'    => array (
        'type' => 'select',
        'size' => 10,
        'minitems' => 0,
        'maxitems' => 1,
        'MM'                  => 'tx_org_department_mm_tx_org_departmentcat',
        'foreign_table'       => 'tx_org_departmentcat',
        'foreign_table_where' => 'AND tx_org_departmentcat.' . $str_store_record_conf . ' AND tx_org_departmentcat.deleted = 0 AND tx_org_departmentcat.hidden = 0 ORDER BY tx_org_departmentcat.sorting',
        'wizards' => array (
          '_PADDING'  => 2,
          '_VERTICAL' => 0,
          'add' => array (
            'type'   => 'script',
            'title'  => 'LLL:EXT:org/locallang_db.xml:wizard.tx_org_departmentcat.add',
            'icon'   => 'add.gif',
            'params' => array (
              'table'    => 'tx_org_departmentcat',
              'pid'      => $str_marker_pid,
              'setValue' => 'prepend'
            ),
            'script' => 'wizard_add.php',
          ),
          'list' => array (
            'type'   => 'script',
            'title'  => 'LLL:EXT:org/locallang_db.xml:wizard.tx_org_departmentcat.list',
            'icon'   => 'list.gif',
            'params' => array (
              'table' => 'tx_org_departmentcat',
              'pid'   => $str_marker_pid,
            ),
            'script' => 'wizard_list.php',
          ),
          'edit' => array (
            'type'                      => 'popup',
            'title'                     => 'LLL:EXT:org/locallang_db.xml:wizard.tx_org_departmentcat.edit',
            'script'                    => 'wizard_edit.php',
            'popup_onlyOpenIfSelected'  => 1,
            'icon'                      => 'edit2.gif',
            'JSopenParams'              => $JSopenParams,
          ),
        ),
      ),
    ),
    'tx_org_headquarters' => array (
      'exclude'   => $bool_exclude_default,
      'l10n_mode' => 'exclude',
      'label'     => 'LLL:EXT:org/tca/locallang/tx_org_department.xml:tx_org_department.tx_org_headquarters',
      'config'    => array (
        'type'                => 'select',
        'size'                => $size_department,
        'minitems'            => 0,
        'maxitems'            => 1,
        'MM'                  => 'tx_org_headquarters_mm_tx_org_department',
        'MM_opposite_field'   => 'tx_org_department',
        'foreign_table'       => 'tx_org_headquarters',
        'foreign_table_where' => 'AND tx_org_headquarters.' . $str_store_record_conf . ' AND tx_org_headquarters.deleted = 0 AND tx_org_headquarters.hidden = 0 AND tx_org_headquarters.sys_language_uid=###REC_FIELD_sys_language_uid### ORDER BY tx_org_headquarters.sorting',
        'wizards' => array (
          '_PADDING'  => 2,
          '_VERTICAL' => 0,
          'add' => array (
            'type'   => 'script',
            'title'  => 'LLL:EXT:org/locallang_db.xml:wizard.tx_org_headquarters.add',
            'icon'   => 'add.gif',
            'params' => array (
              'table'    => 'tx_org_headquarters',
              'pid'      => $str_marker_pid,
              'setValue' => 'prepend'
            ),
            'script' => 'wizard_add.php',
          ),
          'list' => array (
            'type'   => 'script',
            'title'  => 'LLL:EXT:org/locallang_db.xml:wizard.tx_org_headquarters.list',
            'icon'   => 'list.gif',
            'params' => array (
              'table' => 'tx_org_headquarters',
              'pid'   => $str_marker_pid,
            ),
            'script' => 'wizard_list.php',
          ),
          'edit' => array (
            'type'                      => 'popup',
            'title'                     => 'LLL:EXT:org/locallang_db.xml:wizard.tx_org_headquarters.edit',
            'script'                    => 'wizard_edit.php',
            'popup_onlyOpenIfSelected'  => 1,
            'icon'                      => 'edit2.gif',
            'JSopenParams'              => $JSopenParams,
          ),
        ),
      ),
    ),
    'manager' => array (
      'exclude'   => $bool_exclude_default,
      'l10n_mode' => 'exclude',
      'label'     => 'LLL:EXT:org/tca/locallang/tx_org_department.xml:tx_org_department.manager',
      'config'    => $arr_config_feuser,
    ),
    'fe_users' => array (
      'exclude'   => $bool_exclude_default,
      'l10n_mode' => 'exclude',
      'label'     => 'LLL:EXT:org/tca/locallang/tx_org_department.xml:tx_org_department.fe_users',
      'config'    => array (
        'type'                => 'select',
        'size'                => $size_feuser,
        'minitems'            => 0,
        'maxitems'            => 999,
        'MM'                  => 'tx_org_department_mm_fe_users',
        'foreign_table'       => 'fe_users',
        'foreign_table_where' => 'AND fe_users.' . $str_store_record_conf . ' AND fe_users.deleted = 0 AND fe_users.disable = 0 ORDER BY fe_users.last_name',
        'wizards'             => $arr_config_feuser['wizards'],
      ),
    ),
    'tx_org_cal' => array (
      'exclude'   => $bool_exclude_default,
      'l10n_mode' => 'exclude',
      'label'     => 'LLL:EXT:org/tca/locallang/tx_org_department.xml:tx_org_department.tx_org_cal',
      'config'    => array (
        'type'                => 'select',
        'size'                => $size_calendar,
        'minitems'            => 0,
        'maxitems'            => 999,
        'MM'                  => 'tx_org_department_mm_tx_org_cal',
        'foreign_table'       => 'tx_org_cal',
        'foreign_table_where' => 'AND tx_org_cal.' . $str_store_record_conf . ' AND tx_org_cal.deleted = 0 AND tx_org_cal.hidden = 0 AND tx_org_cal.sys_language_uid=###REC_FIELD_sys_language_uid### ORDER BY tx_org_cal.datetime DESC, title',
        'wizards' => array (
          '_PADDING'  => 2,
          '_VERTICAL' => 0,
          'add' => array (
            'type'   => 'script',
            'title'  => 'LLL:EXT:org/locallang_db.xml:wizard.tx_org_cal.add',
            'icon'   => 'add.gif',
            'params' => array (
              'table'    => 'tx_org_cal',
              'pid'      => $str_marker_pid,
              'setValue' => 'prepend'
            ),
            'script' => 'wizard_add.php',
          ),
          'list' => array (
            'type'   => 'script',
            'title'  => 'LLL:EXT:org/locallang_db.xml:wizard.tx_org_cal.list',
            'icon'   => 'list.gif',
            'params' => array (
              'table' => 'tx_org_cal',
              'pid'   => $str_marker_pid,
            ),
            'script' => 'wizard_list.php',
          ),
          'edit' => array (
            'type'                      => 'popup',
            'title'                     => 'LLL:EXT:org/locallang_db.xml:wizard.tx_org_cal.edit',
            'script'                    => 'wizard_edit.php',
            'popup_onlyOpenIfSelected'  => 1,
            'icon'                      => 'edit2.gif',
            'JSopenParams'              => $JSopenParams,
          ),
        ),
      ),
    ),
    'telephone' => array (
      'label'     => 'LLL:EXT:org/tca/locallang/tx_org_department.xml:tx_org_department.telephone',
      'l10n_mode' => 'exclude',
      'exclude'   => $bool_exclude_default,
      'config'    => $conf_input_30_trim,
    ),
    'fax' => array (
      'label'     => 'LLL:EXT:org/tca/locallang/tx_org_department.xml:tx_org_department.fax',
      'l10n_mode' => 'exclude',
      'exclude'   => $bool_exclude_default,
      'config'    => $conf_input_30_trim,
    ),
    'email' => array (
      'label'     => 'LLL:EXT:org/tca/locallang/tx_org_department.xml:tx_org_department.email',
      'l10n_mode' => 'exclude',
      'exclude'   => $bool_exclude_default,
      'config'    => $conf_input_30_trim,
    ),
    'url' => array (
      'label'     => 'LLL:EXT:org/tca/locallang/tx_org_department.xml:tx_org_department.url',
//      'l10n_mode' => 'exclude',
      'exclude'   => $bool_exclude_default,
      'config'    => $arr_wizard_url,
    ),
    'documents_from_path' => array (
      'exclude' => $bool_exclude_default,
//      'l10n_mode' => 'exclude',
      'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.code',
      'config' => array (
        'type' => 'input',
        'size' => '50',
        'max' =>  '80',
        'eval' => 'trim',
      ),
    ),
    'documents' => array (
      'exclude' => $bool_exclude_default,
//      'l10n_mode' => 'exclude',
      'label'   => 'LLL:EXT:org/locallang_db.xml:tca_phrase.documents',
      'config'  => $conf_file_document,
    ),
    'documentscaption' => array (
      'exclude' => $bool_exclude_default,
//      'l10n_mode' => 'exclude',
      'label'   => 'LLL:EXT:org/locallang_db.xml:tca_phrase.documentscaption',
      'config'  => $conf_text_30_05,
    ),
    'documentslayout' => array (
      'exclude'   => $bool_exclude_default,
      'l10n_mode' => 'exclude',
      'label'     => 'LLL:EXT:org/locallang_db.xml:tca_phrase.documentslayout',
      'config'    => array (
        'type'      => 'select',
        'size'      => 1,
        'maxitems'  => 1,
        'items' => array (
          array ('LLL:EXT:org/locallang_db.xml:tca_phrase.documentslayout.0', 0),
          array ('LLL:EXT:org/locallang_db.xml:tca_phrase.documentslayout.1', 1),
          array ('LLL:EXT:org/locallang_db.xml:tca_phrase.documentslayout.2', 2),
        ),
      ),
    ),
    'documentssize' => array (
      'exclude'   => $bool_exclude_default,
      'l10n_mode' => 'exclude',
      'label'     => 'LLL:EXT:cms/locallang_ttc.xml:filelink_size',
      'config'    => array (
        'type'  => 'check',
        'items' => array (
          '1' => array (
            '0' => 'LLL:EXT:lang/locallang_core.xml:labels.enabled',
          ),
        ),
      ),
    ),
    'tx_org_news' => array (
      'exclude'   => $bool_exclude_default,
      'l10n_mode' => 'exclude',
      'label'     => 'LLL:EXT:org/locallang_db.xml:tca_phrase.news',
      'config'    => array (
        'type'                => 'select',
        'size'                => $size_news,
        'minitems'            => 0,
        'maxitems'            => 999,
        'MM'                  => 'tx_org_department_mm_tx_org_news',
        'foreign_table'       => 'tx_org_news',
        'foreign_table_where' => 'AND tx_org_news.' . $str_store_record_conf . ' AND tx_org_news.deleted = 0 AND tx_org_news.hidden = 0 AND tx_org_news.sys_language_uid=###REC_FIELD_sys_language_uid### ORDER BY tx_org_news.datetime DESC, title',
        'wizards' => array (
          '_PADDING'  => 2,
          '_VERTICAL' => 0,
          'add' => array (
            'type'   => 'script',
            'title'  => 'LLL:EXT:org/locallang_db.xml:wizard.tx_org_news.add',
            'icon'   => 'add.gif',
            'params' => array (
              'table'    => 'tx_org_news',
              'pid'      => $str_marker_pid,
              'setValue' => 'prepend'
            ),
            'script' => 'wizard_add.php',
          ),
          'list' => array (
            'type'   => 'script',
            'title'  => 'LLL:EXT:org/locallang_db.xml:wizard.tx_org_news.list',
            'icon'   => 'list.gif',
            'params' => array (
              'table' => 'tx_org_news',
              'pid'   => $str_marker_pid,
            ),
            'script' => 'wizard_list.php',
          ),
          'edit' => array (
            'type'                      => 'popup',
            'title'                     => 'LLL:EXT:org/locallang_db.xml:wizard.tx_org_news.edit',
            'script'                    => 'wizard_edit.php',
            'popup_onlyOpenIfSelected'  => 1,
            'icon'                      => 'edit2.gif',
            'JSopenParams'              => $JSopenParams,
          ),
        ),
      ),
    ),
    'image' => array (
      'exclude'   => $bool_exclude_default,
      'l10n_mode' => 'exclude',
      'label'     => 'LLL:EXT:org/locallang_db.xml:tca_phrase.image',
      'config'    => $conf_file_image,
    ),
    'imagecaption' => array (
      'exclude' => $bool_exclude_default,
//      'l10n_mode' => 'exclude',
      'label'   => 'LLL:EXT:org/locallang_db.xml:tca_phrase.imagecaption',
      'config'  => $conf_text_30_05,
    ),
    'imagecaption_position' => array (
      'exclude'   => $bool_exclude_none,
//      'l10n_mode' => 'exclude',
      'label'     => 'LLL:EXT:cms/locallang_ttc.xml:imagecaption_position',
      'config'    => array (
        'type'  => 'select',
        'items' => array (
          array ('', ''),
          array ('LLL:EXT:cms/locallang_ttc.xml:imagecaption_position.I.1', 'center'),
          array ('LLL:EXT:cms/locallang_ttc.xml:imagecaption_position.I.2', 'right'),
          array ('LLL:EXT:cms/locallang_ttc.xml:imagecaption_position.I.3', 'left'),
        ),
        'default' => ''
      ),
    ),
    'imageseo' => array (
      'exclude'   => $bool_exclude_default,
      'l10n_mode' => 'prefixLangTitle',
      'label'     => 'LLL:EXT:org/locallang_db.xml:tca_phrase.imageseo',
      'config'    => $conf_text_30_05,
    ),
    'imagewidth' => array (
      'exclude'   => $bool_exclude_default,
//      'l10n_mode' => 'exclude',
      'label'     => 'LLL:EXT:cms/locallang_ttc.xml:imagewidth',
      'config'    => array (
        'type'      => 'input',
        'size'      => '10',
        'max'       => '10',
        'eval'      => 'trim',
        'checkbox'  => '0',
        'default'   => ''
      ),
    ),
    'imageheight' => array (
      'exclude'   => $bool_exclude_default,
//      'l10n_mode' => 'exclude',
      'label'     => 'LLL:EXT:cms/locallang_ttc.xml:imageheight',
      'config'    => array (
        'type'      => 'input',
        'size'      => '10',
        'max'       => '10',
        'eval'      => 'trim',
        'checkbox'  => '0',
        'default'   => ''
      ),
    ),
    'imageorient' => array (
      'exclude'   => $bool_exclude_default,
//      'l10n_mode' => 'exclude',
      'label'     => 'LLL:EXT:cms/locallang_ttc.xml:imageorient',
      'config'    => array (
        'type'  => 'select',
        'items' => array (
          array ('LLL:EXT:cms/locallang_ttc.xml:imageorient.I.0', 0, 'selicons/above_center.gif'),
          array ('LLL:EXT:cms/locallang_ttc.xml:imageorient.I.1', 1, 'selicons/above_right.gif'),
          array ('LLL:EXT:cms/locallang_ttc.xml:imageorient.I.2', 2, 'selicons/above_left.gif'),
          array ('LLL:EXT:cms/locallang_ttc.xml:imageorient.I.3', 8, 'selicons/below_center.gif'),
          array ('LLL:EXT:cms/locallang_ttc.xml:imageorient.I.4', 9, 'selicons/below_right.gif'),
          array ('LLL:EXT:cms/locallang_ttc.xml:imageorient.I.5', 10, 'selicons/below_left.gif'),
          array ('LLL:EXT:cms/locallang_ttc.xml:imageorient.I.6', 17, 'selicons/intext_right.gif'),
          array ('LLL:EXT:cms/locallang_ttc.xml:imageorient.I.7', 18, 'selicons/intext_left.gif'),
          array ('LLL:EXT:cms/locallang_ttc.xml:imageorient.I.8', '--div--'),
          array ('LLL:EXT:cms/locallang_ttc.xml:imageorient.I.9', 25, 'selicons/intext_right_nowrap.gif'),
          array ('LLL:EXT:cms/locallang_ttc.xml:imageorient.I.10', 26, 'selicons/intext_left_nowrap.gif'),
        ),
        'selicon_cols' => 6,
        'default' => '0',
        'iconsInOptionTags' => 1,
      ),
    ),
    'imageborder' => array (
      'exclude'   => $bool_exclude_none,
//      'l10n_mode' => 'exclude',
      'label'     => 'LLL:EXT:cms/locallang_ttc.xml:imageborder',
      'config' => array (
        'type' => 'check'
      ),
    ),
    'image_noRows' => array (
      'exclude'   => $bool_exclude_none,
//      'l10n_mode' => 'exclude',
      'label'     => 'LLL:EXT:cms/locallang_ttc.xml:image_noRows',
      'config'    => array (
        'type' => 'check'
      ),
    ),
    'image_link' => array (
      'exclude'   => $bool_exclude_default,
//      'l10n_mode' => 'exclude',
      'label'     => 'LLL:EXT:cms/locallang_ttc.xml:image_link',
      'config' => array (
        'type' => 'text',
        'cols' => '30',
        'rows' => '3',
        'wizards' => array (
          '_PADDING' => 2,
          'link' => array (
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
    'image_zoom' => array (
      'exclude'   => $bool_exclude_default,
//      'l10n_mode' => 'exclude',
      'label'     => 'LLL:EXT:cms/locallang_ttc.xml:image_zoom',
      'config'    => array (
        'type' => 'check'
      ),
    ),
    'image_effects' => array (
      'exclude'   => $bool_exclude_default,
//      'l10n_mode' => 'exclude',
      'label'     => 'LLL:EXT:cms/locallang_ttc.xml:image_effects',
      'config'    => array (
        'type' => 'select',
        'items' => array (
          array ('LLL:EXT:cms/locallang_ttc.xml:image_effects.I.0', 0),
          array ('LLL:EXT:cms/locallang_ttc.xml:image_effects.I.1', 1),
          array ('LLL:EXT:cms/locallang_ttc.xml:image_effects.I.2', 2),
          array ('LLL:EXT:cms/locallang_ttc.xml:image_effects.I.3', 3),
          array ('LLL:EXT:cms/locallang_ttc.xml:image_effects.I.4', 10),
          array ('LLL:EXT:cms/locallang_ttc.xml:image_effects.I.5', 11),
          array ('LLL:EXT:cms/locallang_ttc.xml:image_effects.I.6', 20),
          array ('LLL:EXT:cms/locallang_ttc.xml:image_effects.I.7', 23),
          array ('LLL:EXT:cms/locallang_ttc.xml:image_effects.I.8', 25),
          array ('LLL:EXT:cms/locallang_ttc.xml:image_effects.I.9', 26),
        ),
      ),
    ),
    'image_frames' => array (
      'exclude'   => $bool_exclude_none,
//      'l10n_mode' => 'exclude',
      'label'     => 'LLL:EXT:cms/locallang_ttc.xml:image_frames',
      'config'    => array (
        'type' => 'select',
        'items' => array (
          array ('LLL:EXT:cms/locallang_ttc.xml:image_frames.I.0', 0),
          array ('LLL:EXT:cms/locallang_ttc.xml:image_frames.I.1', 1),
          array ('LLL:EXT:cms/locallang_ttc.xml:image_frames.I.2', 2),
          array ('LLL:EXT:cms/locallang_ttc.xml:image_frames.I.3', 3),
          array ('LLL:EXT:cms/locallang_ttc.xml:image_frames.I.4', 4),
          array ('LLL:EXT:cms/locallang_ttc.xml:image_frames.I.5', 5),
          array ('LLL:EXT:cms/locallang_ttc.xml:image_frames.I.6', 6),
          array ('LLL:EXT:cms/locallang_ttc.xml:image_frames.I.7', 7),
          array ('LLL:EXT:cms/locallang_ttc.xml:image_frames.I.8', 8),
        ),
      ),
    ),
    'image_compression' => array (
      'exclude'   => $bool_exclude_none,
//      'l10n_mode' => 'exclude',
      'label'     => 'LLL:EXT:cms/locallang_ttc.xml:image_compression',
      'config'    => array (
        'type'  => 'select',
        'items' => array (
          array ('LLL:EXT:lang/locallang_general.php:LGL.default_value', 0),
          array ('LLL:EXT:cms/locallang_ttc.xml:image_compression.I.1', 1),
          array ('GIF/256', 10),
          array ('GIF/128', 11),
          array ('GIF/64', 12),
          array ('GIF/32', 13),
          array ('GIF/16', 14),
          array ('GIF/8', 15),
          array ('PNG', 39),
          array ('PNG/256', 30),
          array ('PNG/128', 31),
          array ('PNG/64', 32),
          array ('PNG/32', 33),
          array ('PNG/16', 34),
          array ('PNG/8', 35),
          array ('LLL:EXT:cms/locallang_ttc.xml:image_compression.I.15', 21),
          array ('LLL:EXT:cms/locallang_ttc.xml:image_compression.I.16', 22),
          array ('LLL:EXT:cms/locallang_ttc.xml:image_compression.I.17', 24),
          array ('LLL:EXT:cms/locallang_ttc.xml:image_compression.I.18', 26),
          array ('LLL:EXT:cms/locallang_ttc.xml:image_compression.I.19', 28),
        ),
      ),
    ),
    'imagecols' => array (
      'exclude'   => $bool_exclude_default,
//      'l10n_mode' => 'exclude',
      'label'     => 'LLL:EXT:cms/locallang_ttc.xml:imagecols',
      'config'    => array (
        'type'  => 'select',
        'items' => array (
          array ('1', 1),
          array ('2', 2),
          array ('3', 3),
          array ('4', 4),
          array ('5', 5),
          array ('6', 6),
          array ('7', 7),
          array ('8', 8),
        ),
        'default' => 1
      ),
    ),
    'embeddedcode' => array (
      'exclude' => $bool_exclude_none,
//      'l10n_mode' => 'exclude',
      'label'   => 'LLL:EXT:org/locallang_db.xml:tca_phrase.embeddedcode',
      'config'  => $conf_text_50_10,
    ),
    'hidden'    => $conf_hidden,
    'pages'     => $conf_pages,
    'fe_group'  => $conf_fegroup,
    'keywords' => array (
      'label'     => 'LLL:EXT:org/locallang_db.xml:tca_phrase.keywords',
      'l10n_mode' => 'prefixLangTitle',
      'exclude'   => $bool_exclude_default,
      'config'    => $conf_input_80_trim,
    ),
    'description' => array (
      'label'     => 'LLL:EXT:org/locallang_db.xml:tca_phrase.description',
      'l10n_mode' => 'prefixLangTitle',
      'exclude'   => $bool_exclude_default,
      'config'    => $conf_text_50_10,
    ),
  ),
  'types' => array (
    '0' => array ('showitem' =>
      '--div--;LLL:EXT:org/tca/locallang/tx_org_department.xml:tx_org_department.div_department, title;;1;;1-1-1,tx_org_departmentcat,tx_org_headquarters,'.
      '--div--;LLL:EXT:org/tca/locallang/tx_org_department.xml:tx_org_department.div_contact,    manager,telephone,fax,email,url,'.
      '--div--;LLL:EXT:org/tca/locallang/tx_org_department.xml:tx_org_department.div_staff,      fe_users;;;;3-3-3,'.
      '--div--;LLL:EXT:org/tca/locallang/tx_org_department.xml:tx_org_department.div_calendar,   tx_org_cal;;;;5-5-5,'.
      '--div--;LLL:EXT:cms/locallang_ttc.xml:tabs.images,' .
        '--palette--;LLL:EXT:cms/locallang_ttc.xml:palette.imagefiles;imagefiles,' .
        '--palette--;LLL:EXT:org/locallang_db.xml:palette.image_accessibility;image_accessibility,' .
        '--palette--;LLL:EXT:cms/locallang_ttc.xml:palette.imageblock;imageblock,' .
        '--palette--;LLL:EXT:cms/locallang_ttc.xml:palette.imagelinks;imagelinks,' .
        '--palette--;LLL:EXT:cms/locallang_ttc.xml:palette.image_settings;image_settings,' .
      '--div--;LLL:EXT:cms/locallang_ttc.xml:tabs.media,' .
        '--palette--;LLL:EXT:cms/locallang_ttc.xml:media;documents_upload,' .
        '--palette--;LLL:EXT:org/locallang_db.xml:palette.appearance;documents_appearance,' .
      '--div--;LLL:EXT:org/tca/locallang/tx_org_department.xml:tx_org_department.div_news,       tx_org_news,'.
      '--div--;LLL:EXT:org/tca/locallang/tx_org_department.xml:tx_org_department.div_embedded,   embeddedcode,'.
      '--div--;LLL:EXT:org/tca/locallang/tx_org_department.xml:tx_org_department.div_control,    hidden,pages,fe_group,'.
      '--div--;LLL:EXT:org/tca/locallang/tx_org_department.xml:tx_org_department.div_seo,        keywords, description,'.
      ''),
  ),
  'palettes' => array (
    '1' => array ('showitem' => 'shortcut'),
    'documents_appearance' => array (
      'showitem' => 'documentslayout;LLL:EXT:org/locallang_db.xml:tca_phrase.documentslayout,documentssize;LLL:EXT:cms/locallang_ttc.xml:filelink_size_formlabel',
      'canNotCollapse' => 1,
    ),
    'documents_upload' => array (
      'showitem' => 'documents_from_path;LLL:EXT:org/locallang_db.xml:tca_phrase.documents_from_path, --linebreak--,' .
                    'documents;LLL:EXT:cms/locallang_ttc.xml:media.ALT.uploads_formlabel, documentscaption;LLL:EXT:cms/locallang_ttc.xml:imagecaption.ALT.uploads_formlabel;;nowrap, --linebreak--,',
      'canNotCollapse' => 1,
    ),
    'image_accessibility' => array (
      'showitem' => 'imageseo;LLL:EXT:org/locallang_db.xml:tca_phrase.imageseo,',
      'canNotCollapse' => 1,
    ),
    'imageblock' => array (
      'showitem' => 'imageorient;LLL:EXT:cms/locallang_ttc.xml:imageorient_formlabel, imagecols;LLL:EXT:cms/locallang_ttc.xml:imagecols_formlabel, --linebreak--,' .
                    'image_noRows;LLL:EXT:cms/locallang_ttc.xml:image_noRows_formlabel, imagecaption_position;LLL:EXT:cms/locallang_ttc.xml:imagecaption_position_formlabel',
      'canNotCollapse' => 1,
    ),
    'imagefiles' => array (
      'showitem' => 'image;LLL:EXT:cms/locallang_ttc.xml:image_formlabel, imagecaption;LLL:EXT:cms/locallang_ttc.xml:imagecaption_formlabel,',
      'canNotCollapse' => 1,
    ),
    'imagelinks' => array (
      'showitem' => 'image_zoom;LLL:EXT:cms/locallang_ttc.xml:image_zoom_formlabel, image_link;LLL:EXT:cms/locallang_ttc.xml:image_link_formlabel',
      'canNotCollapse' => 1,
    ),
    'image_settings' => array (
      'showitem' => 'imagewidth;LLL:EXT:cms/locallang_ttc.xml:imagewidth_formlabel, imageheight;LLL:EXT:cms/locallang_ttc.xml:imageheight_formlabel, imageborder;LLL:EXT:cms/locallang_ttc.xml:imageborder_formlabel, --linebreak--,' .
                    'image_compression;LLL:EXT:cms/locallang_ttc.xml:image_compression_formlabel, image_effects;LLL:EXT:cms/locallang_ttc.xml:image_effects_formlabel, image_frames;LLL:EXT:cms/locallang_ttc.xml:image_frames_formlabel',
      'canNotCollapse' => 1,
    ),
  ),
);
$TCA['tx_org_department']['columns']['manager']['config']['size']      = 10;
$TCA['tx_org_department']['columns']['manager']['config']['maxitems']  = 99;

if(!$bool_full_wizardSupport_catTables)
{
  unset($TCA['tx_org_department']['columns']['tx_org_departmentcat']['config']['wizards']['add']);
  unset($TCA['tx_org_department']['columns']['tx_org_departmentcat']['config']['wizards']['list']);
}
if(!$bool_full_wizardSupport_allTables)
{
  unset($TCA['tx_org_department']['columns']['tx_org_cal']['config']['wizards']['add']);
  unset($TCA['tx_org_department']['columns']['tx_org_cal']['config']['wizards']['list'] );
  unset($TCA['tx_org_department']['columns']['tx_org_department']['config']['wizards']['add']);
  unset($TCA['tx_org_department']['columns']['tx_org_department']['config']['wizards']['list'] );
  unset($TCA['tx_org_department']['columns']['tx_org_news']['config']['wizards']['add']);
  unset($TCA['tx_org_department']['columns']['tx_org_news']['config']['wizards']['list'] );
}
  // tx_org_department



  /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
  //
  // tx_org_departmentcat

$TCA['tx_org_departmentcat'] = array (
  'ctrl' => $TCA['tx_org_departmentcat']['ctrl'],
  'interface' => array (
    'showRecordFieldList' =>  'title,title_lang_ol,'.
                              'hidden,'.
                              'image,imagecaption,imageseo',
  ),
  'columns' => array (
    'title' => array (
      'exclude' => 0,
      'label'   => 'LLL:EXT:org/tca/locallang/tx_org_department.xml:tx_org_departmentcat.title',
      'config'  => $conf_input_30_trimRequired,
    ),
    'title_lang_ol' => array (
      'exclude' => 0,
      'label'   => 'LLL:EXT:org/tca/locallang/tx_org_department.xml:tx_org_departmentcat.title_lang_ol',
      'config'  => $conf_input_30_trim,
    ),
    'hidden'    => $conf_hidden,
  ),
  'types' => array (
    '0' => array ('showitem' =>  '--div--;LLL:EXT:org/tca/locallang/tx_org_department.xml:tx_org_departmentcat.div_cat,     title;;1;;1-1-1,'.
                                '--div--;LLL:EXT:org/tca/locallang/tx_org_department.xml:tx_org_departmentcat.div_control, hidden'),
  ),
  'palettes' => array (
    '1' => array ('showitem' => 'title_lang_ol,'),
  ),
);
  // tx_org_departmentcat
?>