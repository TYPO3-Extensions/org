<?php

if (!defined ('TYPO3_MODE'))
{
  die ('Access denied.');
}



  /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
  // 
  // INDEX
  // -----
  // Configuration by the extension manager
  //    Store record configuration
  // General Configuration
  // Wizard fe_users
  // Other wizards and config drafts
  // TCA
  //   tx_org_cal
  //   tx_org_calentrance
  //   tx_org_caltype
  //   tx_org_department
  //   tx_org_departmentcat
  //   tx_org_doc
  //   tx_org_doccat
  //   tx_org_events
  //   tx_org_headquarters
  //   tx_org_location
  //   tx_org_news
  //   tx_org_newscat
  //   tx_org_tax



  /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
  // 
  // Configuration by the extension manager

$confArr = unserialize($GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf']['org']);

  // Simplify the Organiser
$bool_exclude_none    = true;
$bool_exclude_default = true;
switch ($confArr['TCA_simplify_organiser'])
{
  case('None excluded: Editor has access to all'):
    $bool_exclude_none    = false;
    $bool_exclude_default = false;
    break;
  case('All excluded: Administrator configures it'):
      // All will be left true.
    break;
  case('Default (recommended)'):
    $bool_exclude_default = false;
  default:
}
  // Simplify the Organiser


  // Simplify backend forms
$bool_fegroup_control = true;
if (strtolower(substr($confArr['TCA_simplify_fegroup_control'], 0, strlen('no'))) == 'no')
{
  $bool_fegroup_control = false;
}
$bool_time_control = true;
if (strtolower(substr($confArr['TCA_simplify_time_control'], 0, strlen('no'))) == 'no')
{
  $bool_time_control = false;
}
  // Simplify backend forms
  
  // Relation fe_users to company
switch ($confArr['TCA_fe_user_company'])
{
  case('Big'):
    $bool_exclude_fe_user_company             = true;
    $bool_exclude_fe_user_tx_org_company      = true;
    $bool_exclude_fe_user_tx_org_department   = false;
    $bool_exclude_tx_org_company              = false;
    $bool_exclude_tx_org_company_fe_users     = true;
    $bool_exclude_tx_org_department           = false;
    $bool_exclude_tx_org_department_fe_users  = false;
    break;
  case('Small (recommended)'):
  default :
    $bool_exclude_fe_user_company             = true;
    $bool_exclude_fe_user_tx_org_company      = false;
    $bool_exclude_fe_user_tx_org_department   = true;
    $bool_exclude_tx_org_company              = false;
    $bool_exclude_tx_org_company_fe_users     = false;
    $bool_exclude_tx_org_department           = true;
    $bool_exclude_tx_org_department_fe_users  = true;
  default:
}
  // Relation fe_users to company

  // Full wizard support
$bool_full_wizardSupport_catTables = true;
if (strtolower(substr($confArr['full_wizardSupport'], 0, strlen('no'))) == 'no')
{
  $bool_full_wizardSupport_catTables = false;
}
  // Full wizard support

  // Store record configuration
$bool_full_wizardSupport_allTables = true;
switch($confArr['store_records']) 
{
  case('Multi grouped: record groups in different directories'):
    $str_store_record_conf              = 'pid IN (###PAGE_TSCONFIG_IDLIST###)';
    $bool_full_wizardSupport_allTables  = false;
    break;
  case('Clear presented: each record group in one directory at most'):
    $str_store_record_conf              = 'pid IN (###PAGE_TSCONFIG_ID###)';
  ##$bool_full_wizardSupport_allTables  = false;
    break;
  case('Easy 2: same as 1 but with storage pid'):
    $str_marker_pid         = '###STORAGE_PID###';
    $str_store_record_conf  = 'pid=###STORAGE_PID###';
  case('Easy 1: all in the same directory'):
  default:
    $str_marker_pid         = '###CURRENT_PID###';
    $str_store_record_conf  = 'pid=###CURRENT_PID###';
}
  // Store record configuration
  // Configuration by the extension manager



  /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
  // 
  // General Configuration
  
  // JSopenParams for all wizards
  $JSopenParams     = 'height=680,width=800,status=0,menubar=0,scrollbars=1';
  // Rows of calendar select box
  $size_calendar    = 10;
  // Rows of document select box
  $size_doc        = 30;
  // Rows of event select box
  $size_event       = 30;
  // Rows of fe_group select box
  $size_fegroup     = 10;
  // Rows of fe_user select box
  $size_feuser      = 30;
  // Rows of location select box
  $size_location    = 1;
  // Rows of department select box
  $size_department  = 10;
  // Rows of news select box
  $size_news        = 30;

  // General Configuration



  /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
  // 
  // Wizard fe_users

  // Wizard for fe_users
  $arr_config_feuser = array (
    'type'                => 'select', 
    'size'                => $size_feuser, 
    'minitems'            => 0,
    'maxitems'            => 999,
    'foreign_table'       => 'fe_users',
    'foreign_table_where' => 'AND fe_users.' . $str_store_record_conf . ' ORDER BY fe_users.last_name',
    'wizards' => array (
      '_PADDING'  => 2,
      '_VERTICAL' => 0,
      'add' => array (
        'type'   => 'script',
        'title'  => 'LLL:EXT:org/locallang_db.xml:wizard.fe_user.add',
        'icon'   => 'add.gif',
        'params' => array (
          'table'    => 'fe_users',
          'pid'      => $str_marker_pid,
          'setValue' => 'prepend'
        ),
        'script' => 'wizard_add.php',
      ),
      'list' => array (
        'type'   => 'script',
        'title'  => 'LLL:EXT:org/locallang_db.xml:wizard.fe_user.list',
        'icon'   => 'list.gif',
        'params' => array (
          'table' => 'fe_users',
          'pid'   => $str_marker_pid,
        ),
        'script' => 'wizard_list.php',
      ),
      'edit' => array (
        'type'                      => 'popup',
        'title'                     => 'LLL:EXT:org/locallang_db.xml:wizard.fe_user.edit',
        'script'                    => 'wizard_edit.php',
        'popup_onlyOpenIfSelected'  => 1,
        'icon'                      => 'edit2.gif',
        'JSopenParams'              => $JSopenParams,
      ),
    ),
  );
  if(!$bool_full_wizardSupport_allTables)
  {
    unset($arr_config_feuser['wizards']['add']);
    unset($arr_config_feuser['wizards']['list']);
  }
  // Wizard for fe_users

  // Wizard fe_users



  /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
  // 
  // Other wizards and config drafts

  $arr_wizard_url = array (
    'type'      => 'input',
    'size'      => '80',
    'max'       => '256',
    'checkbox'  => '',
    'eval'      => 'trim',
    'wizards'   => array (
      '_PADDING'  => '2',
      'link'      => array (
        'type'         => 'popup',
        'title'        => 'Link',
        'icon'         => 'link_popup.gif',
        'script'       => 'browse_links.php?mode=wizard',
        'JSopenParams' => $JSopenParams,
      ),
    ),
    'softref' => 'typolink',
  );

  $conf_datetime = array (
    'type'    => 'input',
    'size'    => '10',
    'max'     => '20',
    'eval'    => 'datetime',
    'default' => mktime(date('H'),date('i'),0,date('m'),date('d'),date('Y')),
  );
  
  $conf_datetimeend = $conf_datetime;
  unset($conf_datetimeend['default']);

  $conf_file_document = array (
    'type'          => 'group',
    'internal_type' => 'file',
    'allowed'       => '',
    'disallowed'    => 'php,php3', 
    'max_size'      => $GLOBALS['TYPO3_CONF_VARS']['BE']['maxFileSize'], 
    'uploadfolder'  => 'uploads/tx_org',
    'size'          => 10,
    'minitems'      => 0,
    'maxitems'      => 99,
  );

  $conf_file_image = array (
    'type'          => 'group',
    'internal_type' => 'file',
    'allowed'       => $GLOBALS['TYPO3_CONF_VARS']['GFX']['imagefile_ext'],
    'max_size'      => $GLOBALS['TYPO3_CONF_VARS']['BE']['maxFileSize'],
    'uploadfolder'  => 'uploads/tx_org',
    'show_thumbs'   => 1,
    'size'          => 3,
    'minitems'      => 0,
    'maxitems'      => 20,
  );

  $conf_file_icon = array (
    'type'          => 'group',
    'internal_type' => 'file',
    'allowed'       => $GLOBALS['TYPO3_CONF_VARS']['GFX']['imagefile_ext'],
    'max_size'      => $GLOBALS['TYPO3_CONF_VARS']['BE']['maxFileSize'],
    'uploadfolder'  => 'uploads/tx_org',
    'show_thumbs'   => 1,
    'size'          => 1,
    'minitems'      => 0,
    'maxitems'      => 1,
  );

  $conf_input_30_trim = array (
    'type' => 'input',
    'size' => '30',
    'eval' => 'trim'
  );

  $conf_input_30 = array (
    'type' => 'input',
    'size' => '30',
  );

  $conf_input_30_trimRequired = array (
    'type' => 'input',
    'size' => '30',
    'eval' => 'trim,required'
  );
  
  $conf_input_80_trim = array (
    'type' => 'input',
    'size' => '80',
    'eval' => 'trim'
  );
  $conf_text_30_05 = array (
    'type' => 'text',
    'cols' => '30', 
    'rows' => '5',
  );
  $conf_text_30_05_trimRequired = array (
    'type' => 'text',
    'cols' => '30', 
    'rows' => '5',
    'eval' => 'trim,required'
  );
  
  $conf_text_50_10 = array (
    'type' => 'text',
    'cols' => '50', 
    'rows' => '10',
  );
  
  $conf_text_rte = array (
    'type' => 'text',
    'cols' => '30',
    'rows' => '5',
    'wizards' => array (
      '_PADDING' => 2,
      'RTE' => array (
        'notNewRecords' => 1,
        'RTEonly'       => 1,
        'type'          => 'script',
        'title'         => 'Full screen Rich Text Editing|Formatteret redigering i hele vinduet',
        'icon'          => 'wizard_rte2.gif',
        'script'        => 'wizard_rte.php',
      ),
    ),
  );

  $conf_hidden = array (
    'exclude'   => $bool_exclude_default,
    'l10n_mode' => 'exclude',
    'label'     => 'LLL:EXT:lang/locallang_general.xml:LGL.hidden',
    'config'    => array (
      'type'    => 'check',
      'default' => '0'
    ),
  );
  $conf_starttime = array (
    'exclude'   => $bool_time_control,
    'l10n_mode' => 'exclude',
    'label'     => 'LLL:EXT:lang/locallang_general.xml:LGL.starttime',
    'config'    => array (
      'type'     => 'input',
      'size'     => '8',
      'max'      => '20',
      'eval'     => 'date',
      'default'  => '0',
      'checkbox' => '0'
    ),
  );
  $conf_endtime = array (
    'exclude'   => $bool_time_control,
    'l10n_mode' => 'exclude',
    'label'     => 'LLL:EXT:lang/locallang_general.xml:LGL.endtime',
    'config'    => array (
      'type'     => 'input',
      'size'     => '8',
      'max'      => '20',
      'eval'     => 'date',
      'checkbox' => '0',
      'default'  => '0',
      'range'    => array (
        'upper' => mktime(0, 0, 0, date('m'), date('d'), date('Y')+30),
        'lower' => mktime(0, 0, 0, date('m')-1, date('d'), date('Y')),
      ),
    ),
  );
  $conf_fegroup = array (
    'exclude'     => $bool_fegroup_control,
    //'l10n_mode'   => 'mergeIfNotBlank',
    'label'       => 'LLL:EXT:lang/locallang_general.php:LGL.fe_group',
    'config'      => array (
      'type'      => 'select',
      'size'      => $size_fegroup,
      'maxitems'  => 20,
      'items' => array (
        array ('LLL:EXT:lang/locallang_general.php:LGL.hide_at_login', -1),
        array ('LLL:EXT:lang/locallang_general.php:LGL.any_login', -2),
        array ('LLL:EXT:lang/locallang_general.php:LGL.usergroups', '--div--'),
      ),
      'exclusiveKeys' => '-1,-2',
      'foreign_table' => 'fe_groups'
    ),
  );
  $conf_pages = array (
    'exclude'   => $bool_exclude_default,
    'l10n_mode' => 'exclude',
    'label'     => 'LLL:EXT:org/locallang_db.xml:tca_phrase.pages',
    'config'    => array (
      'type'          => 'group',
      'internal_type' => 'db',
      'allowed'       => 'pages',
      'size'          => '10',
      'maxitems'      => '99',
      'minitems'      => '0',
      'show_thumbs'   => '1'
    ),
  );
  // Other wizards and config drafts



  /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
  //
  // tx_org_cal

$TCA['tx_org_cal'] = array (
  'ctrl' => $TCA['tx_org_cal']['ctrl'],
  'interface' => array (
    'showRecordFieldList' =>  'sys_language_uid,l10n_parent,l10n_diffsource,type,title,subtitle,datetime,datetimeend,tx_org_caltype,bodytext,tx_org_event,'.
                              'teaser_title,teaser_subtitle,teaser_short,'.
                              'tx_org_location,tx_org_calentrance,'.
                              'tx_org_headquarters'.
                              'tx_org_department'.
                              'image,imagecaption,imageseo,imagewidth,imageheight,imageorient,imagecaption,imagecols,imageborder,imagecaption_position,image_link,image_zoom,image_noRows,image_effects,image_compression,' .
                              'embeddedcode,print,printcaption,printseo,'.
                              'hidden,starttime,endtime,pages,fe_group,'.
                              'keywords,description'
  ),
  'feInterface' => $TCA['tx_org_cal']['feInterface'],
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
      'exclude' => 1,
      'label' => 'LLL:EXT:lang/locallang_general.php:LGL.l10n_parent',
      'config' => array (
        'type' => 'select',
        'items' => array (
          array ('', 0),
        ),
        'foreign_table' => 'tx_org_cal',
        'foreign_table_where' => 'AND tx_org_cal.uid=###REC_FIELD_l10n_parent### AND tx_org_cal.sys_language_uid IN (-1,0)',
      ),
    ),
    'l10n_diffsource' => array (
      'config' => array (
        'type' => 'passthrough'
      ),
    ),
    'type' => array (
      'exclude'   => $bool_exclude_default,
      'l10n_mode' => 'exclude',
      'label'     => 'LLL:EXT:org/locallang_db.xml:tx_org_cal.type',
      'config'    => array (
        'type'    => 'select', 
        'items'   => array (
          '0' => array (
            '0' => 'LLL:EXT:org/locallang_db.xml:tx_org_cal.type.direct',
            '1' => '0',
            '2' => 'EXT:org/ext_icon/cal.gif',
          ),
          'calpage' => array (
            '0' => 'LLL:EXT:org/locallang_db.xml:tx_org_cal.type.calpage',
            '1' => 'calpage',
            '2' => 'EXT:org/ext_icon/calpage.gif',
          ),
          'calurl' => array (
            '0' => 'LLL:EXT:org/locallang_db.xml:tx_org_cal.type.calurl',
            '1' => 'calurl',
            '2' => 'EXT:org/ext_icon/calurl.gif',
          ),
          'tx_org_event' => array (
            '0' => 'LLL:EXT:org/locallang_db.xml:tx_org_cal.type.tx_org_event',
            '1' => 'tx_org_event',
            '2' => 'EXT:org/ext_icon/event.gif',
          ),
        ),
        'default' => '0',
      ),
    ),
    'calpage' => array (
      'label'     => 'LLL:EXT:org/locallang_db.xml:tx_org_cal.calpage',
//      'l10n_mode' => 'mergeIfNotBlank',
      'exclude'   => $bool_exclude_default,
      'config'    => array (
        'type'          => 'group',
        'internal_type' => 'db',
        'allowed'       => 'pages',
        'size'          => '1',
        'maxitems'      => '1',
        'minitems'      => '1',
        'show_thumbs'   => '1'
      ),
    ),
    'calurl' => array (
      'label'     => 'LLL:EXT:org/locallang_db.xml:tx_org_cal.calurl',
//      'l10n_mode' => 'mergeIfNotBlank',
      'exclude'   => $bool_exclude_default,
      'config'    => array (
        'type'      => 'input',
        'size'      => '80',
        'max'       => '256',
        'checkbox'  => '',
        'eval'      => 'trim,required',
        'wizards'   => array (
          '_PADDING'  => '2',
          'link'      => array (
            'type'         => 'popup',
            'title'        => 'Link',
            'icon'         => 'link_popup.gif',
            'script'       => 'browse_links.php?mode=wizard',
            'JSopenParams' => $JSopenParams,
          ),
        ),
        'softref' => 'typolink',
      ),
    ),
    'title' => array (
      'exclude'   => 0,
      'l10n_mode' => 'prefixLangTitle',
      'label'     => 'LLL:EXT:org/locallang_db.xml:tx_org_cal.title',
      'config'    => $conf_input_30_trimRequired,
    ),
    'subtitle' => array (
      'exclude'   => $bool_exclude_default,
      'l10n_mode' => 'prefixLangTitle',
      'label'     => 'LLL:EXT:org/locallang_db.xml:tx_org_cal.subtitle',
      'config'    => $conf_input_30_trim,
    ),
    'datetime' => array (
      'exclude'   => $bool_exclude_default,
      'l10n_mode' => 'exclude',
      'label'     => 'LLL:EXT:org/locallang_db.xml:tx_org_cal.datetime',
      'config'    => $conf_datetime,
    ),
    'datetimeend' => array (
      'exclude' => $bool_exclude_default,
      'label'   => 'LLL:EXT:org/locallang_db.xml:tx_org_cal.datetimeend',
      'config'  => $conf_datetimeend,
    ),
    'tx_org_caltype' => array (
      'exclude'   => $bool_exclude_default,
      'l10n_mode' => 'exclude',
      'label'     => 'LLL:EXT:org/locallang_db.xml:tx_org_cal.tx_org_caltype',
      'config' => array (
        'type' => 'select', 
        'size' => 1, 
        'minitems' => 0,
        'maxitems' => 1,
        'items' => array (
          '0' => array (
            '0' => '',
            '1' => ''
          ),
        ),
        'suppress_icons' => 1,
        'MM'                  => 'tx_org_cal_mm_tx_org_caltype',
        'foreign_table'       => 'tx_org_caltype',
        'foreign_table_where' => 'AND tx_org_caltype.' . $str_store_record_conf . ' ORDER BY tx_org_caltype.title',
        'wizards' => array (
          '_PADDING'  => 2,
          '_VERTICAL' => 0,
          'add' => array (
            'type'   => 'script',
            'title'  => 'LLL:EXT:org/locallang_db.xml:wizard.tx_org_caltype.add',
            'icon'   => 'add.gif',
            'params' => array (
              'table'    => 'tx_org_caltype',
              'pid'      => $str_marker_pid,
              'setValue' => 'prepend'
            ),
            'script' => 'wizard_add.php',
          ),
          'list' => array (
            'type'   => 'script',
            'title'  => 'LLL:EXT:org/locallang_db.xml:wizard.tx_org_caltype.list',
            'icon'   => 'list.gif',
            'params' => array (
              'table' => 'tx_org_caltype',
              'pid'   => $str_marker_pid,
            ),
            'script' => 'wizard_list.php',
          ),
          'edit' => array (
            'type'                      => 'popup',
            'title'                     => 'LLL:EXT:org/locallang_db.xml:wizard.tx_org_caltype.edit',
            'script'                    => 'wizard_edit.php',
            'popup_onlyOpenIfSelected'  => 1,
            'icon'                      => 'edit2.gif',
            'JSopenParams'              => $JSopenParams,
          ),
        ),
      ),
    ),
    'bodytext' => array (
      'exclude'   => $bool_exclude_default,
      'l10n_mode' => 'prefixLangTitle',
      'label'     => 'LLL:EXT:org/locallang_db.xml:tx_org_cal.bodytext',
      'config'    => $conf_text_rte,
    ),
    'tx_org_event' => array (
      'exclude'   => $bool_exclude_default,
      'l10n_mode' => 'exclude',
      'label'     => 'LLL:EXT:org/locallang_db.xml:tx_org_cal.tx_org_event',
      'config'    => array (
        'type'                => 'select', 
        'size'                => $size_event,
        'minitems'            => 0,
        'maxitems'            => 1,
        'MM'                  => 'tx_org_event_mm_tx_org_cal',
        'MM_opposite_field'   => 'tx_org_cal',
        'foreign_table'       => 'tx_org_event',
        'foreign_table_where' => 'AND tx_org_event.' . $str_store_record_conf . ' AND tx_org_event.sys_language_uid=###REC_FIELD_sys_language_uid### ORDER BY tx_org_event.title',
        'items' => array (
          '0' => array (
            '0' => '',
            '1' => '',
          ),
        ),
        'wizards' => array (
          '_PADDING'  => 2,
          '_VERTICAL' => 0,
          'add' => array (
            'type'   => 'script',
            'title'  => 'LLL:EXT:org/locallang_db.xml:wizard.tx_org_event.add',
            'icon'   => 'add.gif',
            'params' => array (
              'table'    => 'tx_org_event',
              'pid'      => $str_marker_pid,
              'setValue' => 'prepend'
            ),
            'script' => 'wizard_add.php',
          ),
          'list' => array (
            'type'   => 'script',
            'title'  => 'LLL:EXT:org/locallang_db.xml:wizard.tx_org_event.list',
            'icon'   => 'list.gif',
            'params' => array (
              'table' => 'tx_org_event',
              'pid'   => $str_marker_pid,
            ),
            'script' => 'wizard_list.php',
          ),
          'edit' => array (
            'type'                      => 'popup',
            'title'                     => 'LLL:EXT:org/locallang_db.xml:wizard.tx_org_event.edit',
            'script'                    => 'wizard_edit.php',
            'popup_onlyOpenIfSelected'  => 1,
            'icon'                      => 'edit2.gif',
            'JSopenParams'              => $JSopenParams,
          ),
        ),
      ),
    ),
    'teaser_title' => array (
      'exclude'   => $bool_exclude_default,
      'l10n_mode' => 'prefixLangTitle',
      'label'     => 'LLL:EXT:org/locallang_db.xml:tx_org_cal.teaser_title',
      'config'    => $conf_input_30_trim,
    ),
    'teaser_subtitle' => array (
      'exclude'   => $bool_exclude_default,
      'l10n_mode' => 'prefixLangTitle',
      'label'     => 'LLL:EXT:org/locallang_db.xml:tx_org_cal.teaser_subtitle',
      'config'    => $conf_input_30_trim,
    ),
    'teaser_short' => array (
      'exclude'   => $bool_exclude_default,
      'l10n_mode' => 'prefixLangTitle',
      'label'     => 'LLL:EXT:org/locallang_db.xml:tx_org_cal.teaser_short',
      'config'    => $conf_text_50_10,
    ),
    'tx_org_location' => array (
      'exclude'   => $bool_exclude_default,
      'l10n_mode' => 'exclude',
      'label'     => 'LLL:EXT:org/locallang_db.xml:tx_org_cal.tx_org_location',
      'config'    => array (
        'type'                => 'select', 
        'size'                => $size_location,
        'minitems'            => 0,
        'maxitems'            => 1,
        'MM'                  => 'tx_org_cal_mm_tx_org_location',
        'foreign_table'       => 'tx_org_location',
        'foreign_table_where' => 'AND tx_org_location.' . $str_store_record_conf . ' AND tx_org_location.sys_language_uid=###REC_FIELD_sys_language_uid### ORDER BY tx_org_location.title',
        'items' => array (
          '0' => array (
            '0' => '',
            '1' => '',
          ),
        ),
        'suppress_icons' => 1,
        'wizards' => array (
          '_PADDING'  => 2,
          '_VERTICAL' => 0,
          'add' => array (
            'type'   => 'script',
            'title'  => 'LLL:EXT:org/locallang_db.xml:wizard.tx_org_location.add',
            'icon'   => 'add.gif',
            'params' => array (
              'table'    => 'tx_org_location',
              'pid'      => $str_marker_pid,
              'setValue' => 'prepend'
            ),
            'script' => 'wizard_add.php',
          ),
          'list' => array (
            'type'   => 'script',
            'title'  => 'LLL:EXT:org/locallang_db.xml:wizard.tx_org_location.list',
            'icon'   => 'list.gif',
            'params' => array (
              'table' => 'tx_org_location',
              'pid'   => $str_marker_pid,
            ),
            'script' => 'wizard_list.php',
          ),
          'edit' => array (
            'type'                      => 'popup',
            'title'                     => 'LLL:EXT:org/locallang_db.xml:wizard.tx_org_location.edit',
            'script'                    => 'wizard_edit.php',
            'popup_onlyOpenIfSelected'  => 1,
            'icon'                      => 'edit2.gif',
            'JSopenParams'              => $JSopenParams,
          ),
        ),
      ),
    ),
    'tx_org_calentrance' => array (
      'exclude'   => $bool_exclude_default,
      'l10n_mode' => 'exclude',
      'label'     => 'LLL:EXT:org/locallang_db.xml:tx_org_cal.tx_org_calentrance',
      'config'    => array (
        'type' => 'select', 
        'size' => 10, 
        'minitems' => 0,
        'maxitems' => 999,
        'MM'                  => 'tx_org_cal_mm_tx_org_calentrance',
        'foreign_table'       => 'tx_org_calentrance',
        'foreign_table_where' => 'AND tx_org_calentrance.' . $str_store_record_conf . ' ORDER BY tx_org_calentrance.title',
        'wizards' => array (
          '_PADDING'  => 2,
          '_VERTICAL' => 0,
          'add' => array (
            'type'   => 'script',
            'title'  => 'LLL:EXT:org/locallang_db.xml:wizard.tx_org_calentrance.add',
            'icon'   => 'add.gif',
            'params' => array (
              'table'    => 'tx_org_calentrance',
              'pid'      => $str_marker_pid,
              'setValue' => 'prepend'
            ),
            'script' => 'wizard_add.php',
          ),
          'list' => array (
            'type'   => 'script',
            'title'  => 'LLL:EXT:org/locallang_db.xml:wizard.tx_org_calentrance.list',
            'icon'   => 'list.gif',
            'params' => array (
              'table' => 'tx_org_calentrance',
              'pid'   => $str_marker_pid,
            ),
            'script' => 'wizard_list.php',
          ),
          'edit' => array (
            'type'                      => 'popup',
            'title'                     => 'LLL:EXT:org/locallang_db.xml:wizard.tx_org_calentrance.edit',
            'script'                    => 'wizard_edit.php',
            'popup_onlyOpenIfSelected'  => 1,
            'icon'                      => 'edit2.gif',
            'JSopenParams'              => $JSopenParams,
          ),
        ),
      ),
    ),
    'tx_org_headquarters' => array (
      'exclude'   => $bool_exclude_tx_org_company,
      'l10n_mode' => 'exclude',
      'label'     => 'LLL:EXT:org/locallang_db.xml:tx_org_cal.tx_org_headquarters',
      'config'    => array (
        'type'                => 'select', 
        'size'                => $size_headquarters,
        'minitems'            => 0,
        'maxitems'            => 999,
        'MM'                  => 'tx_org_headquarters_mm_tx_org_cal',
        'MM_opposite_field'   => 'tx_org_cal',
        'foreign_table'       => 'tx_org_headquarters',
        'foreign_table_where' => 'AND tx_org_headquarters.' . $str_store_record_conf . ' AND tx_org_headquarters.sys_language_uid=###REC_FIELD_sys_language_uid### ORDER BY tx_org_headquarters.title',
        'selectedListStyle'   => 'width:360px;',
        'itemListStyle'       => 'width:360px;',
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
    'tx_org_department' => array (
      'exclude'   => $bool_exclude_tx_org_department,
      'l10n_mode' => 'exclude',
      'label'     => 'LLL:EXT:org/locallang_db.xml:tx_org_cal.tx_org_department',
      'config'    => array (
        'type'                => 'select', 
        'size'                => $size_department,
        'minitems'            => 0,
        'maxitems'            => 999,
        'MM'                  => 'tx_org_department_mm_tx_org_cal',
        'MM_opposite_field'   => 'tx_org_cal',
        'foreign_table'       => 'tx_org_department',
        'foreign_table_where' => 'AND tx_org_department.' . $str_store_record_conf . ' AND tx_org_department.sys_language_uid=###REC_FIELD_sys_language_uid### ORDER BY tx_org_department.title',
        'selectedListStyle'   => 'width:360px;',
        'itemListStyle'       => 'width:360px;',
        'wizards' => array (
          '_PADDING'  => 2,
          '_VERTICAL' => 0,
          'add' => array (
            'type'   => 'script',
            'title'  => 'LLL:EXT:org/locallang_db.xml:wizard.tx_org_department.add',
            'icon'   => 'add.gif',
            'params' => array (
              'table'    => 'tx_org_department',
              'pid'      => $str_marker_pid,
              'setValue' => 'prepend'
            ),
            'script' => 'wizard_add.php',
          ),
          'list' => array (
            'type'   => 'script',
            'title'  => 'LLL:EXT:org/locallang_db.xml:wizard.tx_org_department.list',
            'icon'   => 'list.gif',
            'params' => array (
              'table' => 'tx_org_department',
              'pid'   => $str_marker_pid,
            ),
            'script' => 'wizard_list.php',
          ),
          'edit' => array (
            'type'                      => 'popup',
            'title'                     => 'LLL:EXT:org/locallang_db.xml:wizard.tx_org_department.edit',
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
//      'l10n_mode' => 'exclude',
      'label'     => 'LLL:EXT:org/locallang_db.xml:tca_phrase.image',
      'config'    => $conf_file_image,
    ),
    'imagecaption' => array (
      'exclude'   => $bool_exclude_default,
      'l10n_mode' => 'prefixLangTitle',
      'label'     => 'LLL:EXT:org/locallang_db.xml:tca_phrase.imagecaption',
      'config'    => $conf_text_30_05,
    ),
    'imagecaption_position' => array (
      'exclude'   => $bool_exclude_none,
//      'l10n_mode' => 'exclude',
      'label'     => 'LLL:EXT:cms/locallang_ttc.xml:imagecaption_position',
      'config'    => array (
        'type' => 'select',
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
        'selicon_cols'      => 6,
        'default'           => '0',
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
      'config'    => array (
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
        'type'  => 'select',
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
      'exclude'   => $bool_exclude_none,
//      'l10n_mode' => 'exclude',
      'label'     => 'LLL:EXT:org/locallang_db.xml:tca_phrase.embeddedcode',
      'config'    => $conf_text_50_10,
    ),
    'print' => array (
      'exclude'   => $bool_exclude_none,
      'l10n_mode' => 'exclude',
      'label'     => 'LLL:EXT:org/locallang_db.xml:tca_phrase.print',
      'config'    => $conf_file_image,
    ),
    'printcaption' => array (
      'exclude'   => $bool_exclude_none,
      'l10n_mode' => 'prefixLangTitle',
      'label'     => 'LLL:EXT:org/locallang_db.xml:tca_phrase.imagecaption',
      'config'    => $conf_text_30_05,
    ),
    'printseo' => array (
      'exclude'   => $bool_exclude_none,
      'l10n_mode' => 'prefixLangTitle',
      'label'     => 'LLL:EXT:org/locallang_db.xml:tca_phrase.imageseo',
      'config'    => $conf_text_30_05,
    ),
    'hidden'    => $conf_hidden,
    'starttime' => $conf_starttime,
    'endtime'   => $conf_endtime,
    'pages'     => $conf_pages,
    'fe_group'  => $conf_fegroup,
    'keywords'  => array (
      'exclude'   => $bool_exclude_default,
      'label'     => 'LLL:EXT:org/locallang_db.xml:tca_phrase.keywords',
      'l10n_mode' => 'prefixLangTitle',
      'config'    => $conf_input_80_trim,
    ),
    'description' => array (
      'exclude'   => $bool_exclude_default,
      'label'     => 'LLL:EXT:org/locallang_db.xml:tca_phrase.description',
      'l10n_mode' => 'prefixLangTitle',
      'config'    => $conf_text_50_10,
    ),
  ),
  'types' => array (
    '0' => array ('showitem' =>
      '--div--;LLL:EXT:org/locallang_db.xml:tx_org_cal.div_calendar,    type,title,subtitle,datetime,tx_org_caltype,bodytext;;;richtext[]:rte_transform[mode=ts];,'.
      '--div--;LLL:EXT:org/locallang_db.xml:tx_org_cal.div_teaser,      teaser_title,teaser_subtitle,teaser_short,'.
      '--div--;LLL:EXT:org/locallang_db.xml:tx_org_cal.div_event,       tx_org_location,tx_org_calentrance,'.
      '--div--;LLL:EXT:org/locallang_db.xml:tx_org_cal.div_company,     tx_org_headquarters,'.
      '--div--;LLL:EXT:org/locallang_db.xml:tx_org_cal.div_department,  tx_org_department,'.
      '--div--;LLL:EXT:cms/locallang_ttc.xml:tabs.images,' .
        '--palette--;LLL:EXT:cms/locallang_ttc.xml:palette.imagefiles;imagefiles,' .
        '--palette--;LLL:EXT:org/locallang_db.xml:palette.image_accessibility;image_accessibility,' .
        '--palette--;LLL:EXT:cms/locallang_ttc.xml:palette.imageblock;imageblock,' .
        '--palette--;LLL:EXT:cms/locallang_ttc.xml:palette.imagelinks;imagelinks,' .
        '--palette--;LLL:EXT:cms/locallang_ttc.xml:palette.image_settings;image_settings,' .
      '--div--;LLL:EXT:cms/locallang_ttc.xml:tabs.media,' .
        '--palette--;LLL:EXT:cms/locallang_ttc.xml:media;documents_upload,' .
        '--palette--;LLL:EXT:org/locallang_db.xml:palette.appearance;documents_appearance,' .
      '--div--;LLL:EXT:org/locallang_db.xml:tx_org_cal.div_embedded,    embeddedcode,print,printcaption,printseo,'.
      '--div--;LLL:EXT:org/locallang_db.xml:tx_org_cal.div_control,     hidden;;1;;,pages,fe_group,'.
      '--div--;LLL:EXT:org/locallang_db.xml:tx_org_cal.div_seo,         keywords,description'.
      ''),
    'calpage' => array ('showitem' =>
      '--div--;LLL:EXT:org/locallang_db.xml:tx_org_cal.div_calendar,    type,title,subtitle,datetime,tx_org_caltype,bodytext;;;richtext[]:rte_transform[mode=ts];,'.
      '--div--;LLL:EXT:org/locallang_db.xml:tx_org_cal.div_calpage,     calpage,'.
      '--div--;LLL:EXT:org/locallang_db.xml:tx_org_cal.div_teaser,      teaser_title,teaser_subtitle,teaser_short,'.
      '--div--;LLL:EXT:cms/locallang_ttc.xml:tabs.images,' .
        '--palette--;LLL:EXT:cms/locallang_ttc.xml:palette.imagefiles;imagefiles,' .
        '--palette--;LLL:EXT:org/locallang_db.xml:palette.image_accessibility;image_accessibility,' .
        '--palette--;LLL:EXT:cms/locallang_ttc.xml:palette.imageblock;imageblock,' .
        '--palette--;LLL:EXT:cms/locallang_ttc.xml:palette.imagelinks;imagelinks,' .
        '--palette--;LLL:EXT:cms/locallang_ttc.xml:palette.image_settings;image_settings,' .
      '--div--;LLL:EXT:org/locallang_db.xml:tx_org_cal.div_control,     hidden;;1;;,pages,fe_group,'.
      ''),
    'calurl' => array ('showitem' =>
      '--div--;LLL:EXT:org/locallang_db.xml:tx_org_cal.div_calendar,    type,title,subtitle,datetime,tx_org_caltype,bodytext;;;richtext[]:rte_transform[mode=ts];,'.
      '--div--;LLL:EXT:org/locallang_db.xml:tx_org_cal.div_calurl,     calurl,'.
      '--div--;LLL:EXT:org/locallang_db.xml:tx_org_cal.div_teaser,      teaser_title,teaser_subtitle,teaser_short,'.
      '--div--;LLL:EXT:cms/locallang_ttc.xml:tabs.images,' .
        '--palette--;LLL:EXT:cms/locallang_ttc.xml:palette.imagefiles;imagefiles,' .
        '--palette--;LLL:EXT:org/locallang_db.xml:palette.image_accessibility;image_accessibility,' .
        '--palette--;LLL:EXT:cms/locallang_ttc.xml:palette.imageblock;imageblock,' .
        '--palette--;LLL:EXT:cms/locallang_ttc.xml:palette.imagelinks;imagelinks,' .
        '--palette--;LLL:EXT:cms/locallang_ttc.xml:palette.image_settings;image_settings,' .
      '--div--;LLL:EXT:org/locallang_db.xml:tx_org_cal.div_control,     hidden;;1;;,pages,fe_group,'.
      ''),
    'tx_org_event' => array ('showitem' =>
      '--div--;LLL:EXT:org/locallang_db.xml:tx_org_cal.div_calendar,    type,title,datetime,tx_org_caltype,tx_org_event,'.
      '--div--;LLL:EXT:org/locallang_db.xml:tx_org_cal.div_event,       tx_org_location,tx_org_calentrance,'.
      '--div--;LLL:EXT:org/locallang_db.xml:tx_org_cal.div_department,  tx_org_department,'.
      '--div--;LLL:EXT:org/locallang_db.xml:tx_org_cal.div_control,     hidden;;1;;,fe_group'.
      ''),
  ),
  'palettes' => array (
    '1' => array ('showitem' => 'starttime,endtime,'),
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
    // currently used only by org_workshops:
    'datetime_datetimeend' => array(
      'showitem' => 'datetime, datetimeend',
      'canNotCollapse' => 1,
    ),
  ),
);

if(!$bool_full_wizardSupport_catTables)
{
  unset($TCA['tx_org_cal']['columns']['tx_org_calentrance']['config']['wizards']['add']);
  unset($TCA['tx_org_cal']['columns']['tx_org_calentrance']['config']['wizards']['list']);
  unset($TCA['tx_org_cal']['columns']['tx_org_caltype']['config']['wizards']['add']);
  unset($TCA['tx_org_cal']['columns']['tx_org_caltype']['config']['wizards']['list']);
}
if(!$bool_full_wizardSupport_allTables)
{
  unset($TCA['tx_org_cal']['columns']['tx_org_department']['config']['wizards']['add']);
  unset($TCA['tx_org_cal']['columns']['tx_org_department']['config']['wizards']['list'] );
  unset($TCA['tx_org_cal']['columns']['tx_org_event']['config']['wizards']['add']);
  unset($TCA['tx_org_cal']['columns']['tx_org_event']['config']['wizards']['list'] );
  unset($TCA['tx_org_cal']['columns']['tx_org_location']['config']['wizards']['add']);
  unset($TCA['tx_org_cal']['columns']['tx_org_location']['config']['wizards']['list'] );
}
  // tx_org_cal



  /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
  //
  // tx_org_calentrance

$TCA['tx_org_calentrance'] = array (
  'ctrl' => $TCA['tx_org_calentrance']['ctrl'],
  'interface' => array (
    'showRecordFieldList' =>  'title,title_lang_ol,value,tx_org_tax,'.
                              'hidden,starttime,endtime,fe_group'
  ),
  'feInterface' => $TCA['tx_org_calentrance']['feInterface'],
  'columns' => array (
    'title' => array (
      'exclude' => 0,
      'label'   => 'LLL:EXT:org/locallang_db.xml:tx_org_calentrance.title',
      'config'  => $conf_input_30_trimRequired,
    ),
    'title_lang_ol' => array (
      'exclude' => 0,
      'label'   => 'LLL:EXT:org/locallang_db.xml:tx_org_calentrance.title_lang_ol',
      'config'  => $conf_input_30_trim,
    ),
    'value' => array (
      'exclude' => 0,
      'label'   => 'LLL:EXT:org/locallang_db.xml:tx_org_calentrance.value',
      'config' => array (
        'type' => 'input',  
        'size' => '7',
        'max'  => '7',
        'eval' => 'required,double2',
      ),
    ),
    'tx_org_tax' => array (
      'exclude'   => $bool_exclude_default,
      'l10n_mode' => 'exclude',
      'label'   => 'LLL:EXT:org/locallang_db.xml:tx_org_calentrance.tx_org_tax',
      'config'    => array (
        'type'      => 'select',
        'size'      => 3,
        'maxitems'  => 1,
        'eval'      => 'required',
        'foreign_table' => 'tx_org_tax'
      ),
    ),
    'hidden'    => $conf_hidden,
    'starttime' => $conf_starttime,
    'endtime'   => $conf_endtime,
    'fe_group'  => $conf_fegroup,
  ),

  'types' => array (
    '0' => array ('showitem' =>  '--div--;LLL:EXT:org/locallang_db.xml:tx_org_calentrance.div_calentrance, title;;1;;,value,tx_org_tax,'.
                                '--div--;LLL:EXT:org/locallang_db.xml:tx_org_calentrance.div_control,     hidden;;2;;,fe_group'.
                                ''),
  ),
  'palettes' => array (
    '1' => array ('showitem' => 'title_lang_ol,'),
    '2' => array ('showitem' => 'starttime,endtime,'),
  ),
);
  // tx_org_calentrance



  /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
  //
  // tx_org_caltype

$TCA['tx_org_caltype'] = array (
  'ctrl' => $TCA['tx_org_caltype']['ctrl'],
  'interface' => array (
    'showRecordFieldList' =>  'title,title_lang_ol,'.
                              'tx_org_cal,'.
                              'hidden'
  ),
  'feInterface' => $TCA['tx_org_caltype']['feInterface'],
  'columns' => array (
    'title' => array (
      'exclude' => 0,
      'label' => 'LLL:EXT:org/locallang_db.xml:tx_org_caltype.title',
      'config'  => $conf_input_30_trimRequired,
    ),
    'title_lang_ol' => array (
      'exclude' => 0,
      'label'   => 'LLL:EXT:org/locallang_db.xml:tx_org_caltype.title_lang_ol',
      'config'  => $conf_input_30_trim,
    ),
    'tx_org_cal' => array (
      'exclude' => $bool_exclude_default,
      'label'   => 'LLL:EXT:org/locallang_db.xml:tx_org_caltype.tx_org_cal',
      'config'  => array (
        'type'                => 'select', 
        'size'                => $size_calendar, 
        'minitems'            => 0,
        'maxitems'            => 999,
        'MM'                  => 'tx_org_cal_mm_tx_org_caltype',
        'MM_opposite_field'   => 'tx_org_caltype',
        'foreign_table'       => 'tx_org_cal',
        'foreign_table_where' => 'AND tx_org_cal.' . $str_store_record_conf . ' AND tx_org_cal.sys_language_uid=###REC_FIELD_sys_language_uid### ORDER BY tx_org_cal.datetime DESC, title',
        'wizards' => array (
          '_PADDING'  => 2,
          '_VERTICAL' => 0,
          'add' => array (
            'type'   => 'script',
            'title'  => 'LLL:EXT:org/locallang_db.xml:wizard.tx_org_caltype.add',
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
            'title'  => 'LLL:EXT:org/locallang_db.xml:wizard.tx_org_caltype.list',
            'icon'   => 'list.gif',
            'params' => array (
              'table' => 'tx_org_cal',
              'pid'   => $str_marker_pid,
            ),
            'script' => 'wizard_list.php',
          ),
          'edit' => array (
            'type'                      => 'popup',
            'title'                     => 'LLL:EXT:org/locallang_db.xml:wizard.tx_org_caltype.edit',
            'script'                    => 'wizard_edit.php',
            'popup_onlyOpenIfSelected'  => 1,
            'icon'                      => 'edit2.gif',
            'JSopenParams'              => $JSopenParams,
          ),
        ),
      ),
    ),
    'hidden'    => $conf_hidden,
  ),
  'types' => array (
    '0' => array ('showitem' =>  '--div--;LLL:EXT:org/locallang_db.xml:tx_org_caltype.div_caltype,    title;;1;;,'.
                                '--div--;LLL:EXT:org/locallang_db.xml:tx_org_caltype.div_calendar,    tx_org_cal,'.
                                '--div--;LLL:EXT:org/locallang_db.xml:tx_org_caltype.div_control,     hidden'.
                                ''),
  ),
  'palettes' => array (
    '1' => array ('showitem' => 'title_lang_ol,'),
  ),
);
if(!$bool_full_wizardSupport_catTables)
{
  unset($TCA['tx_org_caltype']['columns']['tx_org_cal']['config']['wizards']['add']);
  unset($TCA['tx_org_caltype']['columns']['tx_org_cal']['config']['wizards']['list'] );
}
  // tx_org_caltype



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
      'label'       => 'LLL:EXT:lang/locallang_general.php:LGL.l10n_parent',
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
      'label'   => 'LLL:EXT:org/locallang_db.xml:tx_org_department.title',
      'config'  => $conf_input_30_trimRequired,
    ),
    'shortcut' => array (
      'exclude' => $bool_exclude_default,
      'label'   => 'LLL:EXT:org/locallang_db.xml:tx_org_department.shortcut',
      'config'  => $conf_input_30_trim,
    ),
    'tx_org_departmentcat' => array (
      'exclude'   => $bool_exclude_default,
      'l10n_mode' => 'exclude',
      'label'     => 'LLL:EXT:org/locallang_db.xml:tx_org_department.tx_org_departmentcat',
      'config'    => array (
        'type' => 'select', 
        'size' => 10, 
        'minitems' => 0,
        'maxitems' => 1,
        'MM'                  => 'tx_org_department_mm_tx_org_departmentcat',
        'foreign_table'       => 'tx_org_departmentcat',
        'foreign_table_where' => 'AND tx_org_departmentcat.' . $str_store_record_conf . ' ORDER BY tx_org_departmentcat.sorting',
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
      'label'     => 'LLL:EXT:org/locallang_db.xml:tx_org_department.tx_org_headquarters',
      'config'    => array (
        'type'                => 'select', 
        'size'                => $size_department,
        'minitems'            => 0,
        'maxitems'            => 1,
        'MM'                  => 'tx_org_headquarters_mm_tx_org_department',
        'MM_opposite_field'   => 'tx_org_department',
        'foreign_table'       => 'tx_org_headquarters',
        'foreign_table_where' => 'AND tx_org_headquarters.' . $str_store_record_conf . ' AND tx_org_headquarters.sys_language_uid=###REC_FIELD_sys_language_uid### ORDER BY tx_org_headquarters.sorting',
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
      'label'     => 'LLL:EXT:org/locallang_db.xml:tx_org_department.manager',
      'config'    => $arr_config_feuser,
    ),
    'fe_users' => array (
      'exclude'   => $bool_exclude_default,
      'l10n_mode' => 'exclude',
      'label'     => 'LLL:EXT:org/locallang_db.xml:tx_org_department.fe_users',
      'config'    => array (
        'type'                => 'select', 
        'size'                => $size_feuser,
        'minitems'            => 0,
        'maxitems'            => 999,
        'MM'                  => 'tx_org_department_mm_fe_users',
        'foreign_table'       => 'fe_users',
        'foreign_table_where' => 'AND fe_users.' . $str_store_record_conf . ' ORDER BY fe_users.last_name',
        'wizards'             => $arr_config_feuser['wizards'],
      ),
    ),
    'tx_org_cal' => array (
      'exclude'   => $bool_exclude_default,
      'l10n_mode' => 'exclude',
      'label'     => 'LLL:EXT:org/locallang_db.xml:tx_org_department.tx_org_cal',
      'config'    => array (
        'type'                => 'select', 
        'size'                => $size_calendar,
        'minitems'            => 0,
        'maxitems'            => 999,
        'MM'                  => 'tx_org_department_mm_tx_org_cal',
        'foreign_table'       => 'tx_org_cal',
        'foreign_table_where' => 'AND tx_org_cal.' . $str_store_record_conf . ' AND tx_org_cal.sys_language_uid=###REC_FIELD_sys_language_uid### ORDER BY tx_org_cal.datetime DESC, title',
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
      'label'     => 'LLL:EXT:org/locallang_db.xml:tx_org_department.telephone',
      'l10n_mode' => 'exclude',
      'exclude'   => $bool_exclude_default,
      'config'    => $conf_input_30_trim,
    ),
    'fax' => array (
      'label'     => 'LLL:EXT:org/locallang_db.xml:tx_org_department.fax',
      'l10n_mode' => 'exclude',
      'exclude'   => $bool_exclude_default,
      'config'    => $conf_input_30_trim,
    ),
    'email' => array (
      'label'     => 'LLL:EXT:org/locallang_db.xml:tx_org_department.email',
      'l10n_mode' => 'exclude',
      'exclude'   => $bool_exclude_default,
      'config'    => $conf_input_30_trim,
    ),
    'url' => array (
      'label'     => 'LLL:EXT:org/locallang_db.xml:tx_org_department.url',
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
        'foreign_table_where' => 'AND tx_org_news.' . $str_store_record_conf . ' AND tx_org_news.sys_language_uid=###REC_FIELD_sys_language_uid### ORDER BY tx_org_news.datetime DESC, title',
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
      '--div--;LLL:EXT:org/locallang_db.xml:tx_org_department.div_department, title;;1;;1-1-1,tx_org_departmentcat,tx_org_headquarters,'.
      '--div--;LLL:EXT:org/locallang_db.xml:tx_org_department.div_contact,    manager,telephone,fax,email,url,'.
      '--div--;LLL:EXT:org/locallang_db.xml:tx_org_department.div_staff,      fe_users;;;;3-3-3,'.
      '--div--;LLL:EXT:org/locallang_db.xml:tx_org_department.div_calendar,   tx_org_cal;;;;5-5-5,'.
      '--div--;LLL:EXT:cms/locallang_ttc.xml:tabs.images,' .
        '--palette--;LLL:EXT:cms/locallang_ttc.xml:palette.imagefiles;imagefiles,' .
        '--palette--;LLL:EXT:org/locallang_db.xml:palette.image_accessibility;image_accessibility,' .
        '--palette--;LLL:EXT:cms/locallang_ttc.xml:palette.imageblock;imageblock,' .
        '--palette--;LLL:EXT:cms/locallang_ttc.xml:palette.imagelinks;imagelinks,' .
        '--palette--;LLL:EXT:cms/locallang_ttc.xml:palette.image_settings;image_settings,' .
      '--div--;LLL:EXT:cms/locallang_ttc.xml:tabs.media,' .
        '--palette--;LLL:EXT:cms/locallang_ttc.xml:media;documents_upload,' .
        '--palette--;LLL:EXT:org/locallang_db.xml:palette.appearance;documents_appearance,' .
      '--div--;LLL:EXT:org/locallang_db.xml:tx_org_department.div_news,       tx_org_news,'.
      '--div--;LLL:EXT:org/locallang_db.xml:tx_org_department.div_embedded,   embeddedcode,'.
      '--div--;LLL:EXT:org/locallang_db.xml:tx_org_department.div_control,    hidden,pages,fe_group,'.
      '--div--;LLL:EXT:org/locallang_db.xml:tx_org_department.div_seo,        keywords, description,'.
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
      'label'   => 'LLL:EXT:org/locallang_db.xml:tx_org_departmentcat.title',
      'config'  => $conf_input_30_trimRequired,
    ),
    'title_lang_ol' => array (
      'exclude' => 0,
      'label'   => 'LLL:EXT:org/locallang_db.xml:tx_org_departmentcat.title_lang_ol',
      'config'  => $conf_input_30_trim,
    ),
    'hidden'    => $conf_hidden,
  ),
  'types' => array (
    '0' => array ('showitem' =>  '--div--;LLL:EXT:org/locallang_db.xml:tx_org_departmentcat.div_cat,     title;;1;;1-1-1,'.
                                '--div--;LLL:EXT:org/locallang_db.xml:tx_org_departmentcat.div_control, hidden'),
  ),
  'palettes' => array (
    '1' => array ('showitem' => 'title_lang_ol,'),
  ),
);
  // tx_org_departmentcat



  /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
  //
  // tx_org_doc

$TCA['tx_org_doc'] = array (
  'ctrl' => $TCA['tx_org_doc']['ctrl'],
  'interface' => array (
    'showRecordFieldList' =>  'sys_language_uid,l10n_parent,l10n_diffsource,' .
                              'type,title,subtitle,datetime,tx_org_doccat,bodytext,' .
                              'fe_user,' .
                              'documents_from_path,documents,documentscaption,documentslayout,documentssize,' .
                              'image,imagecaption,imageseo,imagewidth,imageheight,imageorient,imagecaption,imagecols,imageborder,imagecaption_position,image_link,image_zoom,image_noRows,image_effects,image_compression,' .
                              'hidden,pages,starttime,endtime,fe_group,' .
                              'keywords,description,' .
                              'teaser_title,teaser_subtitle,teaser_short',
  ),
  'feInterface' => $TCA['tx_org_doc']['feInterface'],
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
      'exclude' => 1,
      'label' => 'LLL:EXT:lang/locallang_general.php:LGL.l10n_parent',
      'config' => array (
        'type' => 'select',
        'items' => array (
          array ('', 0),
        ),
        'foreign_table' => 'tx_org_doc',
        'foreign_table_where' => 'AND tx_org_doc.uid=###REC_FIELD_l10n_parent### AND tx_org_doc.sys_language_uid IN (-1,0)',
      ),
    ),
    'l10n_diffsource' => array (
      'config' => array (
        'type' => 'passthrough'
      ),
    ),
    'type' => array (
      'exclude'   => $bool_exclude_default,
      'l10n_mode' => 'exclude',
      'label'     => 'LLL:EXT:org/locallang_db.xml:tx_org_doc.type',
      'config'    => array (
        'type'    => 'select',
        'items'   => array (
          'doc_download' => array (
            '0' => 'LLL:EXT:org/locallang_db.xml:tx_org_doc.type.doc_download',
            '1' => 'doc_download',
            '2' => 'EXT:org/ext_icon/doc_download.gif',
          ),
          'doc_download_shipping' => array (
            '0' => 'LLL:EXT:org/locallang_db.xml:tx_org_doc.type.doc_download_shipping',
            '1' => 'doc_download_shipping',
            '2' => 'EXT:org/ext_icon/doc_download_shipping.gif',
          ),
          'doc_shipping' => array (
            '0' => 'LLL:EXT:org/locallang_db.xml:tx_org_doc.type.doc_shipping',
            '1' => 'doc_shipping',
            '2' => 'EXT:org/ext_icon/doc_shipping.gif',
          ),
        ),
        'default' => 'doc_download',
      ),
    ),
    'title' => array (
      'exclude'   => 0,
      'l10n_mode' => 'prefixLangTitle',
      'label'     => 'LLL:EXT:org/locallang_db.xml:tx_org_doc.title',
      'config'    => $conf_input_30_trimRequired,
    ),
    'subtitle' => array (
      'exclude'   => $bool_exclude_default,
      'l10n_mode' => 'prefixLangTitle',
      'label'     => 'LLL:EXT:org/locallang_db.xml:tx_org_doc.subtitle',
      'config'    => $conf_input_30_trim,
    ),
    'datetime' => array (
      'exclude'   => 0,
      'l10n_mode' => 'exclude',
      'label'     => 'LLL:EXT:org/locallang_db.xml:tx_org_doc.datetime',
      'config'    => $conf_datetime,
    ),
    'tx_org_doccat' => array (
      'exclude'   => $bool_exclude_default,
      'l10n_mode' => 'exclude',
      'label'     => 'LLL:EXT:org/locallang_db.xml:tx_org_doc.tx_org_doccat',
      'config'    => array (
        'type'                => 'select',
        'size'                => 10,
        'minitems'            => 0,
        'maxitems'            => 99,
        'MM'                  => 'tx_org_doc_mm_tx_org_doccat',
        'foreign_table'       => 'tx_org_doccat',
        'foreign_table_where' => 'AND tx_org_doccat.' . $str_store_record_conf . ' ORDER BY tx_org_doccat.title',
        'wizards' => array (
          '_PADDING'  => 2,
          '_VERTICAL' => 0,
          'add' => array (
            'type'   => 'script',
            'title'  => 'LLL:EXT:org/locallang_db.xml:wizard.tx_org_doccat.add',
            'icon'   => 'add.gif',
            'params' => array (
              'table'    => 'tx_org_doccat',
              'pid'      => $str_marker_pid,
              'setValue' => 'prepend'
            ),
            'script' => 'wizard_add.php',
          ),
          'list' => array (
            'type'   => 'script',
            'title'  => 'LLL:EXT:org/locallang_db.xml:wizard.tx_org_doccat.list',
            'icon'   => 'list.gif',
            'params' => array (
              'table' => 'tx_org_doccat',
              'pid'   => $str_marker_pid,
            ),
            'script' => 'wizard_list.php',
          ),
          'edit' => array (
            'type'                      => 'popup',
            'title'                     => 'LLL:EXT:org/locallang_db.xml:wizard.tx_org_doccat.edit',
            'script'                    => 'wizard_edit.php',
            'popup_onlyOpenIfSelected'  => 1,
            'icon'                      => 'edit2.gif',
            'JSopenParams'              => $JSopenParams,
          ),
        ),
      ),
    ),
    'bodytext' => array (
      'exclude'     => $bool_exclude_default,
      'l10n_mode' => 'prefixLangTitle',
      'label'     => 'LLL:EXT:org/locallang_db.xml:tx_org_doc.bodytext',
      'config'    => $conf_text_rte,
    ),
    'fe_user' => array (
      'exclude'     => $bool_exclude_default,
//      'l10n_mode'   => 'exclude',
      'label'       => 'LLL:EXT:org/locallang_db.xml:tx_org_doc.fe_user',
      'config'      => array (
        'type'      => 'select',
        'size'      => $size_doc,
        'minitems'  => 0,
        'maxitems'  => 1,
        'items' => array (
          '0' => array (
            '0' => '',
            '1' => '',
          ),
        ),
        'MM'                  => 'fe_users_mm_tx_org_doc',
        'MM_opposite_field'   => 'tx_org_doc',
        'foreign_table'       => 'fe_users',
        'foreign_table_where' => 'AND fe_users.' . $str_store_record_conf . ' ORDER BY fe_users.last_name',
        'wizards' => $arr_config_feuser['wizards'],
      ),
    ),
    'hidden'    => $conf_hidden,
    'starttime' => $conf_starttime,
    'endtime'   => $conf_endtime,
    'fe_group'  => $conf_fegroup,
    'image' => array (
      'exclude'   => $bool_exclude_default,
      'l10n_mode' => 'exclude',
      'label'     => 'LLL:EXT:org/locallang_db.xml:tca_phrase.image',
      'config'    => $conf_file_image,
    ),
    'imagecaption' => array (
      'exclude'   => $bool_exclude_default,
      'l10n_mode' => 'prefixLangTitle',
      'label'     => 'LLL:EXT:org/locallang_db.xml:tca_phrase.imagecaption',
      'config'    => $conf_text_30_05,
    ),
    'imagecaption_position' => array (
      'exclude'   => $bool_exclude_none,
      'l10n_mode' => 'exclude',
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
      'l10n_mode' => 'exclude',
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
      'l10n_mode' => 'exclude',
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
      'l10n_mode' => 'exclude',
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
      'l10n_mode' => 'exclude',
      'label'     => 'LLL:EXT:cms/locallang_ttc.xml:imageborder',
      'config'    => array (
        'type' => 'check'
      ),
    ),
    'image_noRows' => array (
      'exclude'   => $bool_exclude_none,
      'l10n_mode' => 'exclude',
      'label'     => 'LLL:EXT:cms/locallang_ttc.xml:image_noRows',
      'config'    => array (
        'type' => 'check'
      ),
    ),
    'image_link' => array (
      'exclude'   => $bool_exclude_default,
      'l10n_mode' => 'exclude',
      'label'     => 'LLL:EXT:cms/locallang_ttc.xml:image_link',
      'config'    => array (
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
      'l10n_mode' => 'exclude',
      'label'     => 'LLL:EXT:cms/locallang_ttc.xml:image_zoom',
      'config'    => array (
        'type' => 'check'
      ),
    ),
    'image_effects' => array (
      'exclude'   => $bool_exclude_default,
      'l10n_mode' => 'exclude',
      'label'     => 'LLL:EXT:cms/locallang_ttc.xml:image_effects',
      'config'    => array (
        'type'  => 'select',
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
      'l10n_mode' => 'exclude',
      'label'     => 'LLL:EXT:cms/locallang_ttc.xml:image_frames',
      'config'    => array (
        'type'  => 'select',
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
      'l10n_mode' => 'exclude',
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
      'l10n_mode' => 'exclude',
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
    'documents_from_path' => array (
      'exclude' => $bool_exclude_default,
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
      'label'   => 'LLL:EXT:org/locallang_db.xml:tca_phrase.documents',
      'config'  => $conf_file_document,
    ),
    'documentscaption' => array (
      'exclude' => $bool_exclude_default,
      'label'   => 'LLL:EXT:org/locallang_db.xml:tca_phrase.documentscaption',
      'config'  => $conf_text_30_05,
    ),
    'documentslayout' => array (
      'exclude' => $bool_exclude_default,
      'label'   => 'LLL:EXT:org/locallang_db.xml:tca_phrase.documentslayout',
      'config'  => array (
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
      'exclude' => $bool_exclude_default,
      'label' => 'LLL:EXT:cms/locallang_ttc.xml:filelink_size',
      'config' => array (
        'type' => 'check',
        'items' => array (
          '1'     => array (
            '0' => 'LLL:EXT:lang/locallang_core.xml:labels.enabled',
          ),
        ),
      ),
    ),
    'keywords' => array (
      'exclude'   => $bool_exclude_default,
      'label'     => 'LLL:EXT:org/locallang_db.xml:tca_phrase.keywords',
      'l10n_mode' => 'prefixLangTitle',
      'config'    => $conf_input_80_trim,
    ),
    'description' => array (
      'exclude'   => $bool_exclude_default,
      'label'     => 'LLL:EXT:org/locallang_db.xml:tca_phrase.description',
      'l10n_mode' => 'prefixLangTitle',
      'config'    => $conf_text_50_10,
    ),
    'teaser_title' => array (
      'exclude'   => $bool_exclude_default,
      'l10n_mode' => 'prefixLangTitle',
      'label'     => 'LLL:EXT:org/locallang_db.xml:tx_org_doc.teaser_title',
      'config'    => $conf_input_30_trim,
    ),
    'teaser_subtitle' => array (
      'exclude'   => $bool_exclude_default,
      'l10n_mode' => 'prefixLangTitle',
      'label'     => 'LLL:EXT:org/locallang_db.xml:tx_org_doc.teaser_subtitle',
      'config'    => $conf_input_30_trim,
    ),
    'teaser_short' => array (
      'exclude'   => $bool_exclude_default,
      'l10n_mode' => 'prefixLangTitle',
      'label'     => 'LLL:EXT:org/locallang_db.xml:tx_org_doc.teaser_short',
      'config'    => $conf_text_50_10,
    ),
  ),
  'types' => array (
    'doc_download' => array ('showitem' =>
      '--div--;LLL:EXT:org/locallang_db.xml:tx_org_doc.div_doc,        type,title;;;;1-1-1,subtitle,datetime,tx_org_doccat,bodytext;;;richtext[]:rte_transform[mode=ts];3-3-3,'.
      '--div--;LLL:EXT:org/locallang_db.xml:tx_org_doc.div_teaser,     teaser_title;;;;6-6-6, teaser_subtitle, teaser_short,'.
      '--div--;LLL:EXT:cms/locallang_ttc.xml:tabs.media,' .
        '--palette--;LLL:EXT:cms/locallang_ttc.xml:media;documents_upload,' .
        '--palette--;LLL:EXT:org/locallang_db.xml:palette.appearance;documents_appearance,' .
      '--div--;LLL:EXT:org/locallang_db.xml:tx_org_doc.div_feuser,     fe_user,'.
      '--div--;LLL:EXT:org/locallang_db.xml:tx_org_doc.div_control,    sys_language_uid;;;;8-8-8, l10n_parent, l10n_diffsource, hidden;;3;;,fe_group,'.
      '--div--;LLL:EXT:org/locallang_db.xml:tx_org_doc.div_seo,        keywords;;;;7-7-7, description,'.
      ''),
    'doc_download_shipping' => array ('showitem' =>
      '--div--;LLL:EXT:org/locallang_db.xml:tx_org_doc.div_doc,        type,title;;;;1-1-1,subtitle,datetime,tx_org_doccat,'.
      '--div--;LLL:EXT:org/locallang_db.xml:tx_org_doc.div_teaser,     teaser_title;;;;6-6-6, teaser_subtitle, teaser_short,'.
      '--div--;LLL:EXT:cms/locallang_ttc.xml:tabs.media,' .
        '--palette--;LLL:EXT:cms/locallang_ttc.xml:media;documents_upload,' .
        '--palette--;LLL:EXT:org/locallang_db.xml:palette.appearance;documents_appearance,' .
      '--div--;LLL:EXT:org/locallang_db.xml:tx_org_doc.div_feuser,     fe_user,'.
      '--div--;LLL:EXT:org/locallang_db.xml:tx_org_doc.div_control,    sys_language_uid;;;;8-8-8, l10n_parent, l10n_diffsource, hidden;;3;;,fe_group,'.
      '--div--;LLL:EXT:org/locallang_db.xml:tx_org_doc.div_seo,        keywords;;;;7-7-7, description,'.
      ''),
    'doc_shipping' => array ('showitem' =>
      '--div--;LLL:EXT:org/locallang_db.xml:tx_org_doc.div_doc,        type,title;;;;1-1-1,subtitle,datetime,tx_org_doccat,'.
      '--div--;LLL:EXT:org/locallang_db.xml:tx_org_doc.div_teaser,     teaser_title;;;;6-6-6, teaser_subtitle, teaser_short,'.
      '--div--;LLL:EXT:cms/locallang_ttc.xml:tabs.images,' .
        '--palette--;LLL:EXT:cms/locallang_ttc.xml:palette.imagefiles;imagefiles,' .
        '--palette--;LLL:EXT:org/locallang_db.xml:palette.image_accessibility;image_accessibility,' .
        '--palette--;LLL:EXT:cms/locallang_ttc.xml:palette.imageblock;imageblock,' .
        '--palette--;LLL:EXT:cms/locallang_ttc.xml:palette.imagelinks;imagelinks,' .
        '--palette--;LLL:EXT:cms/locallang_ttc.xml:palette.image_settings;image_settings,' .
      '--div--;LLL:EXT:org/locallang_db.xml:tx_org_doc.div_feuser,     fe_user,'.
      '--div--;LLL:EXT:org/locallang_db.xml:tx_org_doc.div_control,    sys_language_uid;;;;8-8-8, l10n_parent, l10n_diffsource, hidden;;3;;,fe_group,'.
      '--div--;LLL:EXT:org/locallang_db.xml:tx_org_doc.div_seo,        keywords;;;;7-7-7, description,'.
      ''),
  ),
  'palettes' => array (
    '3' => array ('showitem' => 'starttime, endtime'),
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
if(!$bool_full_wizardSupport_catTables)
{
  unset($TCA['tx_org_doc']['columns']['tx_org_doccat']['config']['wizards']['add']);
  unset($TCA['tx_org_doc']['columns']['tx_org_doccat']['config']['wizards']['list']);
}
if(!$bool_full_wizardSupport_allTables)
{
  unset($TCA['tx_org_doc']['columns']['tx_org_department']['config']['wizards']['add']);
  unset($TCA['tx_org_doc']['columns']['tx_org_department']['config']['wizards']['list'] );
}
  // tx_org_doc



  /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
  //
  // tx_org_doccat

$TCA['tx_org_doccat'] = array (
  'ctrl' => $TCA['tx_org_doccat']['ctrl'],
  'interface' => array (
    'showRecordFieldList' =>  'type,title,title_lang_ol,' .
                              'color,' .
                              'image,imageseo,' .
                              'hidden' ,
  ),
  'columns' => array (
    'type' => array (
      'exclude'   => $bool_exclude_default,
      'l10n_mode' => 'exclude',
      'label'     => 'LLL:EXT:org/locallang_db.xml:tx_org_doccat.type',
      'config'    => array (
        'type'    => 'select',
        'items'   => array (
          'cat_text' => array (
            '0' => 'LLL:EXT:org/locallang_db.xml:tx_org_doccat.type.cat_text',
            '1' => 'cat_text',
            '2' => 'EXT:org/ext_icon/cat_text.gif',
          ),
          'cat_color' => array (
            '0' => 'LLL:EXT:org/locallang_db.xml:tx_org_doccat.type.cat_color',
            '1' => 'cat_color',
            '2' => 'EXT:org/ext_icon/cat_color.gif',
          ),
          'cat_image' => array (
            '0' => 'LLL:EXT:org/locallang_db.xml:tx_org_doccat.type.cat_image',
            '1' => 'cat_image',
            '2' => 'EXT:org/ext_icon/cat_image.gif',
          ),
        ),
        'default' => 'cat_text',
      ),
    ),
    'title' => array (
      'exclude' => 0,
      'label'   => 'LLL:EXT:org/locallang_db.xml:tx_org_doccat.title',
      'config'  => $conf_input_30_trimRequired,
    ),
    'title_lang_ol' => array (
      'exclude' => 0,
      'label'   => 'LLL:EXT:org/locallang_db.xml:tx_org_doccat.title_lang_ol',
      'config'  => $conf_input_30_trim,
    ),
    'color' => array (
      'l10n_mode' => 'exclude',
      'exclude'   => $bool_exclude_default,
      'label'     => 'LLL:EXT:org/locallang_db.xml:tca_phrase.color',
      'config'  => array (
        'type'    => 'input',
        'size'    => 10,
        'eval'    => 'trim',
        'wizards' => array (
          'colorChoice' => array (
            'type'          => 'colorbox',
            'title'         => 'LLL:EXT:examples/locallang_db.xml:tx_examples_haiku.colorPick',
            'script'        => 'wizard_colorpicker.php',
            'dim'           => '20x20',
            'tableStyle'    => 'border: solid 1px black; margin-left: 20px;',
            'JSopenParams'  => 'height=300,width=380,status=0,menubar=0,scrollbars=0',
          )
        )
      )
    ),
    'image' => array (
      'l10n_mode' => 'exclude',
      'exclude'   => $bool_exclude_default,
      'label'     => 'LLL:EXT:org/locallang_db.xml:tca_phrase.image.cat',
      'config'    => $conf_file_icon,
    ),
    'imageseo' => array (
      'exclude' => $bool_exclude_default,
      'label'   => 'LLL:EXT:org/locallang_db.xml:tca_phrase.imageseo',
      'config'  => $conf_text_30_05,
    ),
    'hidden'    => $conf_hidden,
  ),
  'types' => array (
    'cat_text'  => array ('showitem' => '--div--;LLL:EXT:org/locallang_db.xml:tx_org_doccat.div_cat,     type,title;;1;;1-1-1,' .
                                        '--div--;LLL:EXT:org/locallang_db.xml:tx_org_doccat.div_control, hidden'),
    'cat_color' => array ('showitem' => '--div--;LLL:EXT:org/locallang_db.xml:tx_org_doccat.div_cat,     type,title;;1;;1-1-1,' .
                                        '--div--;LLL:EXT:org/locallang_db.xml:tx_org_doccat.div_color,   color,' .
                                        '--div--;LLL:EXT:org/locallang_db.xml:tx_org_doccat.div_control, hidden' ),
    'cat_image' => array ('showitem' => '--div--;LLL:EXT:org/locallang_db.xml:tx_org_doccat.div_cat,     type,title;;1;;1-1-1,' .
                                        '--div--;LLL:EXT:org/locallang_db.xml:tx_org_doccat.div_media,   image;;3;;,' .
                                        '--div--;LLL:EXT:org/locallang_db.xml:tx_org_doccat.div_control, hidden' ),
  ),
  'palettes' => array (
    '1' => array ('showitem' => 'title_lang_ol'),
    '3' => array ('showitem' => 'imageseo'),
  ),
);
  // tx_org_doccat



  /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
  //
  // tx_org_event

  // Don't display relations to feuser by default 
$bool_exclude_feuser = true;

$TCA['tx_org_event'] = array (
  'ctrl' => $TCA['tx_org_event']['ctrl'],
  'interface' => array (
    'showRecordFieldList' =>  'sys_language_uid,l10n_parent,l10n_diffsource,title,subtitle,producer,length,bodytext,'.
                              'teaser_title,teaser_subtitle,teaser_short,'.
                              'tx_org_cal,'.
                              'documents_from_path,documents,documentscaption,documentslayout,documentssize,' .
                              'tx_org_news,'.
                              'image,imagecaption,imageseo,imagewidth,imageheight,imageorient,imagecaption,imagecols,imageborder,imagecaption_position,image_link,image_zoom,image_noRows,image_effects,image_compression,' .
                              'embeddedcode,print,printcaption,printseo,'.
                              'hidden,pages,fe_group,'.
                              'keywords,description'
  ),
  'feInterface' => $TCA['tx_org_event']['feInterface'],
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
      'exclude' => 1,
      'label' => 'LLL:EXT:lang/locallang_general.php:LGL.l10n_parent',
      'config' => array (
        'type' => 'select',
        'items' => array (
          array ('', 0),
        ),
        'foreign_table' => 'tx_org_event',
        'foreign_table_where' => 'AND tx_org_event.uid=###REC_FIELD_l10n_parent### AND tx_org_event.sys_language_uid IN (-1,0)',
      ),
    ),
    'l10n_diffsource' => array (
      'config' => array (
        'type' => 'passthrough'
      ),
    ),
    'title' => array (
      'exclude'   => 0,
      'l10n_mode' => 'prefixLangTitle',
      'label'     => 'LLL:EXT:org/locallang_db.xml:tx_org_event.title',
      'config'    => $conf_input_30_trimRequired,
    ),
    'subtitle' => array (
      'exclude'   => $bool_exclude_default,
      'l10n_mode' => 'prefixLangTitle',
      'label'     => 'LLL:EXT:org/locallang_db.xml:tx_org_event.subtitle',
      'config'    => $conf_input_30_trim,
    ),
    'length' => array (
      'exclude'   => $bool_exclude_default,
      'l10n_mode' => 'exclude',
      'label'     => 'LLL:EXT:org/locallang_db.xml:tx_org_event.length',
      'config'    => $conf_input_30_trim,
    ),
    'bodytext' => array (
      'exclude'   => $bool_exclude_default,
      'l10n_mode' => 'prefixLangTitle',
      'label'     => 'LLL:EXT:org/locallang_db.xml:tx_org_event.bodytext',
      'config'    => $conf_text_rte,
    ),
    'teaser_title' => array (
      'exclude'   => $bool_exclude_default,
      'l10n_mode' => 'prefixLangTitle',
      'label'     => 'LLL:EXT:org/locallang_db.xml:tx_org_event.teaser_title',
      'config'    => $conf_input_30_trim,
    ),
    'teaser_subtitle' => array (
      'exclude'   => $bool_exclude_default,
      'l10n_mode' => 'prefixLangTitle',
      'label'     => 'LLL:EXT:org/locallang_db.xml:tx_org_event.teaser_subtitle',
      'config'    => $conf_input_30_trim,
    ),
    'teaser_short' => array (
      'exclude'   => $bool_exclude_default,
      'l10n_mode' => 'prefixLangTitle',
      'label'     => 'LLL:EXT:org/locallang_db.xml:tx_org_event.teaser_short',
      'config'    => $conf_text_50_10,
    ),
    'tx_org_cal' => array (
      'exclude'   => $bool_exclude_default,
      'l10n_mode' => 'exclude',
      'label'     => 'LLL:EXT:org/locallang_db.xml:tx_org_event.tx_org_cal',
      'config'    => array (
        'type'                => 'select', 
        'size'                => $size_calendar,
        'minitems'            => 0,
        'maxitems'            => 999,
        'MM'                  => 'tx_org_event_mm_tx_org_cal',
        'foreign_table'       => 'tx_org_cal',
        'foreign_table_where' => 'AND tx_org_cal.' . $str_store_record_conf . ' AND tx_org_cal.sys_language_uid=###REC_FIELD_sys_language_uid### ORDER BY tx_org_cal.datetime DESC, title',
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
    'documents_from_path' => array (
      'exclude' => $bool_exclude_default,
//      'l10n_mode' => 'exclude',
      'label'   => 'LLL:EXT:lang/locallang_general.xml:LGL.code',
      'config'  => array (
        'type'  => 'input',
        'size'  => '50',
        'max'   =>  '80',
        'eval'  => 'trim',
      ),
    ),
    'documents' => array (
      'exclude' => $bool_exclude_default,
//      'l10n_mode' => 'exclude',
      'label'   => 'LLL:EXT:org/locallang_db.xml:tca_phrase.documents',
      'config'  => $conf_file_document,
    ),
    'documentscaption' => array (
      'exclude'   => $bool_exclude_default,
      'l10n_mode' => 'prefixLangTitle',
      'label'     => 'LLL:EXT:org/locallang_db.xml:tca_phrase.documentscaption',
      'config'    => $conf_text_30_05,
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
          '1'     => array (
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
        'MM'                  => 'tx_org_event_mm_tx_org_news',
        'foreign_table'       => 'tx_org_news',
        'foreign_table_where' => 'AND tx_org_news.' . $str_store_record_conf . ' AND tx_org_news.sys_language_uid=###REC_FIELD_sys_language_uid### ORDER BY tx_org_news.datetime DESC, title',
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
      'exclude'   => $bool_exclude_default,
      'l10n_mode' => 'prefixLangTitle',
      'label'     => 'LLL:EXT:org/locallang_db.xml:tca_phrase.imagecaption',
      'config'    => $conf_text_30_05,
    ),
    'imagecaption_position' => array (
      'exclude'   => $bool_exclude_none,
      'l10n_mode' => 'exclude',
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
    'imageseo'  => array (
      'exclude'   => $bool_exclude_default,
      'l10n_mode' => 'prefixLangTitle',
      'label'     => 'LLL:EXT:org/locallang_db.xml:tca_phrase.imageseo',
      'config'    => $conf_text_30_05,
    ),
    'imagewidth' => array (
      'exclude'   => $bool_exclude_default,
      'l10n_mode' => 'exclude',
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
      'l10n_mode' => 'exclude',
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
      'l10n_mode' => 'exclude',
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
      'l10n_mode' => 'exclude',
      'label'     => 'LLL:EXT:cms/locallang_ttc.xml:imageborder',
      'config'    => array (
        'type' => 'check'
      ),
    ),
    'image_noRows' => array (
      'exclude'   => $bool_exclude_none,
      'l10n_mode' => 'exclude',
      'label'     => 'LLL:EXT:cms/locallang_ttc.xml:image_noRows',
      'config'    => array (
        'type' => 'check'
      ),
    ),
    'image_link' => array (
      'exclude'   => $bool_exclude_default,
//      'l10n_mode' => 'exclude',
      'label'     => 'LLL:EXT:cms/locallang_ttc.xml:image_link',
      'config'    => array (
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
      'l10n_mode' => 'exclude',
      'label'     => 'LLL:EXT:cms/locallang_ttc.xml:image_zoom',
      'config'    => array (
        'type' => 'check'
      ),
    ),
    'image_effects' => array (
      'exclude'   => $bool_exclude_default,
      'l10n_mode' => 'exclude',
      'label'     => 'LLL:EXT:cms/locallang_ttc.xml:image_effects',
      'config'    => array (
        'type'  => 'select',
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
      'l10n_mode' => 'exclude',
      'label'     => 'LLL:EXT:cms/locallang_ttc.xml:image_frames',
      'config'    => array (
        'type'  => 'select',
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
      'l10n_mode' => 'exclude',
      'label'     => 'LLL:EXT:cms/locallang_ttc.xml:image_compression',
      'config'    => array (
        'type' => 'select',
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
      'l10n_mode' => 'exclude',
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
      'exclude'   => $bool_exclude_none,
//      'l10n_mode' => 'exclude',
      'label'     => 'LLL:EXT:org/locallang_db.xml:tca_phrase.embeddedcode',
      'config'    => $conf_text_50_10,
    ),
    'print' => array (
      'exclude'   => $bool_exclude_none,
      'l10n_mode' => 'prefixLangTitle',
      'label'     => 'LLL:EXT:org/locallang_db.xml:tca_phrase.print',
      'config'    => $conf_file_image,
    ),
    'printcaption' => array (
      'exclude'   => $bool_exclude_none,
      'l10n_mode' => 'prefixLangTitle',
      'label'     => 'LLL:EXT:org/locallang_db.xml:tca_phrase.imagecaption',
      'config'    => $conf_text_30_05,
    ),
    'printseo' => array (
      'exclude'   => $bool_exclude_none,
      'l10n_mode' => 'prefixLangTitle',
      'label'     => 'LLL:EXT:org/locallang_db.xml:tca_phrase.imageseo',
      'config'    => $conf_text_30_05,
    ),
    'hidden'    => $conf_hidden,
    'pages'     => $conf_pages,
    'fe_group'  => $conf_fegroup,
    'keywords'  => array (
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
      '--div--;LLL:EXT:org/locallang_db.xml:tx_org_event.div_event,     title;;;;1-1-1,subtitle,producer,length,bodytext;;;richtext[]:rte_transform[mode=ts];,'.
      '--div--;LLL:EXT:org/locallang_db.xml:tx_org_event.div_teaser,    teaser_title,teaser_subtitle,teaser_short,'.
      '--div--;LLL:EXT:org/locallang_db.xml:tx_org_event.div_calendar,  tx_org_cal,'.
      '--div--;LLL:EXT:cms/locallang_ttc.xml:tabs.images,' .
        '--palette--;LLL:EXT:cms/locallang_ttc.xml:palette.imagefiles;imagefiles,' .
        '--palette--;LLL:EXT:org/locallang_db.xml:palette.image_accessibility;image_accessibility,' .
        '--palette--;LLL:EXT:cms/locallang_ttc.xml:palette.imageblock;imageblock,' .
        '--palette--;LLL:EXT:cms/locallang_ttc.xml:palette.imagelinks;imagelinks,' .
        '--palette--;LLL:EXT:cms/locallang_ttc.xml:palette.image_settings;image_settings,' .
      '--div--;LLL:EXT:cms/locallang_ttc.xml:tabs.media,' .
        '--palette--;LLL:EXT:cms/locallang_ttc.xml:media;documents_upload,' .
        '--palette--;LLL:EXT:org/locallang_db.xml:palette.appearance;documents_appearance,' .
      '--div--;LLL:EXT:org/locallang_db.xml:tx_org_event.div_embedded,  embeddedcode,print,printcaption,printseo,'.
      '--div--;LLL:EXT:org/locallang_db.xml:tx_org_event.div_control,   hidden,pages,fe_group,'.
      '--div--;LLL:EXT:org/locallang_db.xml:tx_org_event.div_seo,       keywords,description'.
      ''),
  ),
  'palettes' => array (
    '1' => array ('showitem' => 'starttime,endtime,'),
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
if(!$bool_full_wizardSupport_allTables)
{
  unset($TCA['tx_org_event']['columns']['tx_org_cal']['config']['wizards']['add']);
  unset($TCA['tx_org_event']['columns']['tx_org_cal']['config']['wizards']['list'] );
  unset($TCA['tx_org_event']['columns']['tx_org_news']['config']['wizards']['add']);
  unset($TCA['tx_org_event']['columns']['tx_org_news']['config']['wizards']['list'] );
}
  // tx_org_event



  /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
  // 
  // tx_org_headquarters
  
  // tx_org_headquarters
$TCA['tx_org_headquarters'] = array (
  'ctrl' => $TCA['tx_org_headquarters']['ctrl'],
  'interface' => array (
  
    'showRecordFieldList' =>  'sys_language_uid,l10n_parent,l10n_diffsource,title,mail_address,mail_postcode,mail_city,mail_country,mail_url,mail_embeddedcode,postbox_postbox,postbox_postcode,postbox_city,'.
                              'telephone,fax,email,'.
                              'pubtrans_stop,pubtrans_url,pubtrans_embeddedcode,'.
                              'documents_from_path,documents,documentscaption,documentslayout,documentssize,' .
                              'image,imagecaption,imageseo,imagewidth,imageheight,imageorient,imagecaption,imagecols,imageborder,imagecaption_position,image_link,image_zoom,image_noRows,image_effects,image_compression,' .
                              'embeddedcode,'.
                              'tx_org_department,'.
                              'hidden,pages,fe_group,'.
                              'keywords,description',
  ),
  'feInterface' => $TCA['tx_org_headquarters']['feInterface'],
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
      'exclude' => 1,
      'label' => 'LLL:EXT:lang/locallang_general.php:LGL.l10n_parent',
      'config' => array (
        'type' => 'select',
        'items' => array (
          array ('', 0),
        ),
        'foreign_table' => 'tx_org_headquarters',
        'foreign_table_where' => 'AND tx_org_headquarters.uid=###REC_FIELD_l10n_parent### AND tx_org_headquarters.sys_language_uid IN (-1,0)',
      ),
    ),
    'l10n_diffsource' => array (
      'config' => array (
        'type' => 'passthrough'
      ),
    ),
    'title' => array (
      'exclude'   => 0,
      'l10n_mode' => 'prefixLangTitle',
      'label'     => 'LLL:EXT:org/locallang_db.xml:tx_org_headquarters.title',
      'config'    => $conf_input_30_trimRequired,
    ),
    'mail_address' => array (
      'exclude'   => $bool_exclude_default,
//      'l10n_mode' => 'exclude',
      'label'     => 'LLL:EXT:org/locallang_db.xml:tx_org_headquarters.mail_address',
      'config'    => $conf_text_30_05_trimRequired,
    ),
    'mail_postcode' => array (
      'exclude'   => $bool_exclude_default,
//      'l10n_mode' => 'exclude',
      'label'     => 'LLL:EXT:org/locallang_db.xml:tx_org_headquarters.mail_postcode',
      'config'    => $conf_input_30_trimRequired,
    ),
    'mail_city' => array (
      'exclude'   => $bool_exclude_default,
//      'l10n_mode' => 'exclude',
      'label'     => 'LLL:EXT:org/locallang_db.xml:tx_org_headquarters.mail_city',
      'config'    => $conf_input_30_trimRequired,
    ),
    'mail_country' => array (
      'exclude'   => $bool_exclude_default,
//      'l10n_mode' => 'exclude',
      'label'     => 'LLL:EXT:org/locallang_db.xml:tx_org_headquarters.mail_country',
      'config'    => $conf_input_30,
    ),
    'mail_url' => array (
      'exclude'   => $bool_exclude_default,
//      'l10n_mode' => 'exclude',
      'label'     => 'LLL:EXT:org/locallang_db.xml:tx_org_headquarters.mail_url',
      'config'    => $arr_wizard_url,
    ),
    'mail_embeddedcode' => array (
      'exclude'   => $bool_exclude_default,
//      'l10n_mode' => 'exclude',
      'label'     => 'LLL:EXT:org/locallang_db.xml:tx_org_headquarters.mail_embeddedcode',
      'config'    => $conf_text_50_10,
    ),
    'postbox_postbox' => array (
      'exclude'   =>  $bool_exclude_default,
//      'l10n_mode' => 'exclude',
      'label'     => 'LLL:EXT:org/locallang_db.xml:tx_org_headquarters.postbox_postbox',
      'config'    => $conf_text_30_05,
    ),
    'postbox_postcode' => array (
      'exclude'   => $bool_exclude_default,
//      'l10n_mode' => 'exclude',
      'label'     => 'LLL:EXT:org/locallang_db.xml:tx_org_headquarters.postbox_postcode',
      'config'    => $conf_input_30_trim,
    ),
    'postbox_city' => array (
      'exclude'   => $bool_exclude_default,
//      'l10n_mode' => 'exclude',
      'label'     => 'LLL:EXT:org/locallang_db.xml:tx_org_headquarters.postbox_city',
      'config'    => $conf_input_30_trim,
    ),
    'telephone' => array (
      'label'   => 'LLL:EXT:org/locallang_db.xml:tx_org_headquarters.telephone',
      'exclude' => $bool_exclude_default,
      'config'  => $conf_input_30_trim,
    ),
    'fax' => array (
      'label'   => 'LLL:EXT:org/locallang_db.xml:tx_org_headquarters.fax',
      'exclude' => $bool_exclude_default,
      'config'  => $conf_input_30_trim,
    ),
    'email' => array (
      'label'   => 'LLL:EXT:org/locallang_db.xml:tx_org_headquarters.email',
      'exclude' => $bool_exclude_default,
      'config'  => $conf_input_30_trim,
    ),
    'pubtrans_stop' => array (
      'exclude'   => $bool_exclude_default,
//      'l10n_mode' => 'exclude',
      'label'     => 'LLL:EXT:org/locallang_db.xml:tx_org_headquarters.pubtrans_stop',
      'config'    => $conf_text_rte,
    ),
    'pubtrans_url' => array (
      'label'   => 'LLL:EXT:org/locallang_db.xml:tx_org_headquarters.pubtrans_url',
      'exclude' => $bool_exclude_default,
      'config'  => $arr_wizard_url,
    ),
    'pubtrans_embeddedcode' => array (
      'label'   => 'LLL:EXT:org/locallang_db.xml:tx_org_headquarters.pubtrans_embeddedcode',
      'exclude' => $bool_exclude_default,
      'config'  => $conf_text_50_10,
    ),
    'tx_org_department' => array (
      'exclude' => $bool_exclude_tx_org_department,
      'label'   => 'LLL:EXT:org/locallang_db.xml:tx_org_headquarters.tx_org_department',
      'config'  => array (
        'type'                => 'select', 
        'size'                => $size_department,
        'minitems'            => 0,
        'maxitems'            => 999,
        'MM'                  => 'tx_org_headquarters_mm_tx_org_department',
        'foreign_table'       => 'tx_org_department',
        'foreign_table_where' => 'AND tx_org_department.' . $str_store_record_conf . ' AND tx_org_department.sys_language_uid=###REC_FIELD_sys_language_uid### ORDER BY tx_org_department.sorting',
        'wizards' => array (
          '_PADDING'  => 2,
          '_VERTICAL' => 0,
          'add' => array (
            'type'   => 'script',
            'title'  => 'LLL:EXT:org/locallang_db.xml:wizard.tx_org_department.add',
            'icon'   => 'add.gif',
            'params' => array (
              'table'    => 'tx_org_department',
              'pid'      => $str_marker_pid,
              'setValue' => 'prepend'
            ),
            'script' => 'wizard_add.php',
          ),
          'list' => array (
            'type'   => 'script',
            'title'  => 'LLL:EXT:org/locallang_db.xml:wizard.tx_org_department.list',
            'icon'   => 'list.gif',
            'params' => array (
              'table' => 'tx_org_department',
              'pid'   => $str_marker_pid,
            ),
            'script' => 'wizard_list.php',
          ),
          'edit' => array (
            'type'                      => 'popup',
            'title'                     => 'LLL:EXT:org/locallang_db.xml:wizard.tx_org_department.edit',
            'script'                    => 'wizard_edit.php',
            'popup_onlyOpenIfSelected'  => 1,
            'icon'                      => 'edit2.gif',
            'JSopenParams'              => $JSopenParams,
          ),
        ),
      ),
    ),
    'image' => array (
      'exclude' => $bool_exclude_default,
      'label'   => 'LLL:EXT:org/locallang_db.xml:tca_phrase.image',
      'config'  => $conf_file_image,
    ),
    'imagecaption' => array (
      'exclude'   => $bool_exclude_default,
      'l10n_mode' => 'prefixLangTitle',
      'label'     => 'LLL:EXT:org/locallang_db.xml:tca_phrase.imagecaption',
      'config'    => $conf_text_30_05,
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
      'exclude' => $bool_exclude_default,
      'label' => 'LLL:EXT:cms/locallang_ttc.xml:imageorient',
      'config' => array (
        'type' => 'select',
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
      'exclude' => $bool_exclude_none,
      'label' => 'LLL:EXT:cms/locallang_ttc.xml:imageborder',
      'config' => array (
        'type' => 'check'
      ),
    ),
    'image_noRows' => array (
      'exclude' => $bool_exclude_none,
      'label' => 'LLL:EXT:cms/locallang_ttc.xml:image_noRows',
      'config' => array (
        'type' => 'check'
      ),
    ),
    'image_link' => array (
      'exclude' => $bool_exclude_default,
      'label' => 'LLL:EXT:cms/locallang_ttc.xml:image_link',
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
      'exclude' => $bool_exclude_default,
      'label' => 'LLL:EXT:cms/locallang_ttc.xml:image_zoom',
      'config' => array (
        'type' => 'check'
      ),
    ),
    'image_effects' => array (
      'exclude' => $bool_exclude_default,
      'label' => 'LLL:EXT:cms/locallang_ttc.xml:image_effects',
      'config' => array (
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
      'exclude' => $bool_exclude_none,
      'label' => 'LLL:EXT:cms/locallang_ttc.xml:image_frames',
      'config' => array (
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
      'exclude' => $bool_exclude_none,
      'label' => 'LLL:EXT:cms/locallang_ttc.xml:image_compression',
      'config' => array (
        'type' => 'select',
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
      'exclude' => $bool_exclude_default,
      'label' => 'LLL:EXT:cms/locallang_ttc.xml:imagecols',
      'config' => array (
        'type' => 'select',
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
      'label'   => 'LLL:EXT:org/locallang_db.xml:tca_phrase.embeddedcode',
      'config'  => $conf_text_50_10,
    ),
    'documents_from_path' => array (
      'exclude' => $bool_exclude_default,
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
      'label'   => 'LLL:EXT:org/locallang_db.xml:tca_phrase.documents',
      'config'  => $conf_file_document,
    ),
    'documentscaption' => array (
      'exclude' => $bool_exclude_default,
      'label'   => 'LLL:EXT:org/locallang_db.xml:tca_phrase.documentscaption',
      'config'  => $conf_text_30_05,
    ),
    'documentslayout' => array (
      'exclude' => $bool_exclude_default,
      'label'   => 'LLL:EXT:org/locallang_db.xml:tca_phrase.documentslayout',
      'config'  => array (
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
      'exclude' => $bool_exclude_default,
      'label' => 'LLL:EXT:cms/locallang_ttc.xml:filelink_size',
      'config' => array (
        'type' => 'check',
        'items' => array (
          '1'     => array (
            '0' => 'LLL:EXT:lang/locallang_core.xml:labels.enabled',
          ),
        ),
      ),
    ),
    'hidden'    => $conf_hidden,
    'pages'     => $conf_pages,
    'fe_group'  => $conf_fegroup,
    'keywords' => array (
      'exclude'   => $bool_exclude_default,
      'l10n_mode' => 'prefixLangTitle',
      'label'     => 'LLL:EXT:org/locallang_db.xml:tca_phrase.keywords',
      'config'    => $conf_input_80_trim,
    ),
    'description' => array (
      'exclude'   => $bool_exclude_default,
      'l10n_mode' => 'prefixLangTitle',
      'label'     => 'LLL:EXT:org/locallang_db.xml:tca_phrase.description',
      'config'    => $conf_text_50_10,
    ),
  ),
  'types' => array (
    '0' => array ('showitem' =>  
      '--div--;LLL:EXT:org/locallang_db.xml:tx_org_headquarters.div_headquarters, title,mail_address,mail_postcode,mail_city,mail_country,mail_url,mail_embeddedcode,postbox_postbox;;;;3-3-3,postbox_postcode,postbox_city,'.
      '--div--;LLL:EXT:org/locallang_db.xml:tx_org_headquarters.div_contact,      telephone,fax,email,'.
      '--div--;LLL:EXT:org/locallang_db.xml:tx_org_headquarters.div_department,   tx_org_department,'.
      '--div--;LLL:EXT:org/locallang_db.xml:tx_org_headquarters.div_pubtrans,     pubtrans_stop;;;richtext[]:rte_transform[mode=ts];4-4-4,pubtrans_url,pubtrans_embeddedcode,'.
      '--div--;LLL:EXT:cms/locallang_ttc.xml:tabs.images,' .
        '--palette--;LLL:EXT:cms/locallang_ttc.xml:palette.imagefiles;imagefiles,' .
        '--palette--;LLL:EXT:org/locallang_db.xml:palette.image_accessibility;image_accessibility,' .
        '--palette--;LLL:EXT:cms/locallang_ttc.xml:palette.imageblock;imageblock,' .
        '--palette--;LLL:EXT:cms/locallang_ttc.xml:palette.imagelinks;imagelinks,' .
        '--palette--;LLL:EXT:cms/locallang_ttc.xml:palette.image_settings;image_settings,' .
      '--div--;LLL:EXT:cms/locallang_ttc.xml:tabs.media,' .
        '--palette--;LLL:EXT:cms/locallang_ttc.xml:media;documents_upload,' .
        '--palette--;LLL:EXT:org/locallang_db.xml:palette.appearance;documents_appearance,' .
      '--div--;LLL:EXT:org/locallang_db.xml:tx_org_headquarters.div_embedded,     embeddedcode,'.
      '--div--;LLL:EXT:org/locallang_db.xml:tx_org_headquarters.div_control,      hidden,pages,fe_group,'.
      '--div--;LLL:EXT:org/locallang_db.xml:tx_org_headquarters.div_seo,          keywords, description,'.
      ''),
  ),
  'palettes' => array (
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
if( ! $bool_exclude_tx_org_company )
{
  $TCA['tx_org_headquarters']['columns']['title']['label'] = 'LLL:EXT:org/locallang_db.xml:tx_org_company.title';
  $showitem = $TCA['tx_org_headquarters']['types']['0']['showitem'];
  $showitem = str_replace
              (
                'LLL:EXT:org/locallang_db.xml:tx_org_headquarters.div_headquarters',
                'LLL:EXT:org/locallang_db.xml:tx_org_headquarters.div_company',
                $showitem
              );
  $TCA['tx_org_headquarters']['types']['0']['showitem'] = $showitem;
}
if(!$bool_full_wizardSupport_allTables)
{
  unset($TCA['tx_org_headquarters']['columns']['tx_org_department']['config']['wizards']['add']);
  unset($TCA['tx_org_headquarters']['columns']['tx_org_department']['config']['wizards']['list'] );
}
  // tx_org_headquarters



  /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
  // 
  // tx_org_location
  
  // tx_org_location
$TCA['tx_org_location'] = array (
  'ctrl' => $TCA['tx_org_location']['ctrl'],
  'interface' => array (
  
    'showRecordFieldList' =>  'sys_language_uid,l10n_parent,l10n_diffsource,title,url,mail_address,mail_postcode,mail_city,mail_country,mail_url,mail_embeddedcode,'.
                              'telephone,ticket_telephone,ticket_url,fax,email,'.
                              'tx_org_cal,'.
                              'pubtrans_stop,pubtrans_url,pubtrans_embeddedcode,citymap_url,citymap_embeddedcode,'.
                              'documents_from_path,documents,documentscaption,documentslayout,documentssize,' .
                              'image,imagecaption,imageseo,imagewidth,imageheight,imageorient,imagecaption,imagecols,imageborder,imagecaption_position,image_link,image_zoom,image_noRows,image_effects,image_compression,' .
                              'embeddedcode,'.
                              'hidden,pages,fe_group,'.
                              'keywords,description',
  ),
  'feInterface' => $TCA['tx_org_location']['feInterface'],
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
      'exclude' => 1,
      'label' => 'LLL:EXT:lang/locallang_general.php:LGL.l10n_parent',
      'config' => array (
        'type' => 'select',
        'items' => array (
          array ('', 0),
        ),
        'foreign_table' => 'tx_org_location',
        'foreign_table_where' => 'AND tx_org_location.uid=###REC_FIELD_l10n_parent### AND tx_org_location.sys_language_uid IN (-1,0)',
      ),
    ),
    'l10n_diffsource' => array (
      'config' => array (
        'type' => 'passthrough'
      ),
    ),
    'title' => array (
      'exclude'   => 0,
      'l10n_mode' => 'prefixLangTitle',
      'label'     => 'LLL:EXT:org/locallang_db.xml:tx_org_location.title',
      'config'    => $conf_input_30_trimRequired,
    ),
    'url' => array (
      'label' => 'LLL:EXT:org/locallang_db.xml:tx_org_location.url',
      'exclude' => $bool_exclude_default,
      'config' => $arr_wizard_url,
    ),
    'mail_address' => array (
      'exclude'   => $bool_exclude_default,
      'l10n_mode' => 'exclude',
      'label'     => 'LLL:EXT:org/locallang_db.xml:tx_org_location.mail_address',
      'config'    => $conf_text_30_05,
    ),
    'mail_postcode' => array (
      'exclude'   => $bool_exclude_default,
      'l10n_mode' => 'exclude',
      'label'     => 'LLL:EXT:org/locallang_db.xml:tx_org_location.mail_postcode',
      'config'    => $conf_input_30_trim,
    ),
    'mail_city' => array (
      'exclude'   => $bool_exclude_default,
      'l10n_mode' => 'exclude',
      'label'     => 'LLL:EXT:org/locallang_db.xml:tx_org_location.mail_city',
      'config'    => $conf_input_30_trim,
    ),
    'mail_country' => array (
      'exclude'   => $bool_exclude_default,
      'l10n_mode' => 'exclude',
      'label'     => 'LLL:EXT:org/locallang_db.xml:tx_org_location.mail_country',
      'config'    => $conf_input_30,
    ),
    'mail_url' => array (
      'exclude'   => $bool_exclude_default,
      'l10n_mode' => 'exclude',
      'label'     => 'LLL:EXT:org/locallang_db.xml:tx_org_location.mail_url',
      'config'    => $arr_wizard_url,
    ),
    'mail_embeddedcode' => array (
      'exclude'   => $bool_exclude_default,
      'l10n_mode' => 'exclude',
      'label'     => 'LLL:EXT:org/locallang_db.xml:tx_org_location.mail_embeddedcode',
      'config'    => $conf_text_50_10,
    ),
    'telephone' => array (
      'exclude'   => $bool_exclude_default,
      'l10n_mode' => 'exclude',
      'label'     => 'LLL:EXT:org/locallang_db.xml:tx_org_location.telephone',
      'config'    => $conf_input_30_trim,
    ),
    'ticket_telephone' => array (
      'exclude'   => $bool_exclude_default,
      'l10n_mode' => 'exclude',
      'label'     => 'LLL:EXT:org/locallang_db.xml:tx_org_location.ticket_telephone',
      'config'    => $conf_input_30_trim,
    ),
    'ticket_url' => array (
      'exclude'   => $bool_exclude_default,
      'l10n_mode' => 'exclude',
      'label'     => 'LLL:EXT:org/locallang_db.xml:tx_org_location.ticket_url',
      'config'    => $arr_wizard_url,
    ),
    'fax' => array (
      'exclude'   => $bool_exclude_default,
      'l10n_mode' => 'exclude',
      'label'     => 'LLL:EXT:org/locallang_db.xml:tx_org_location.fax',
      'config'    => $conf_input_30_trim,
    ),
    'email' => array (
      'exclude'   => $bool_exclude_default,
      'l10n_mode' => 'exclude',
      'label'     => 'LLL:EXT:org/locallang_db.xml:tx_org_location.email',
      'config'    => $conf_input_30_trim,
    ),
    'tx_org_cal' => array (
      'exclude'     => $bool_exclude_default,
       'l10n_mode'  => 'exclude',
      'label'       => 'LLL:EXT:org/locallang_db.xml:tx_org_location.tx_org_cal',
      'config'      => array (
        'type'                => 'select', 
        'size'                => $size_calendar,
        'minitems'            => 0,
        'maxitems'            => 999,
        'MM'                  => 'tx_org_cal_mm_tx_org_location',
        'MM_opposite_field'   => 'tx_org_location',
        'foreign_table'       => 'tx_org_cal',
        'foreign_table_where' => 'AND tx_org_cal.' . $str_store_record_conf . ' AND tx_org_cal.sys_language_uid=###REC_FIELD_sys_language_uid### ORDER BY tx_org_cal.datetime DESC, title',
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
    'pubtrans_stop' => array (
      'exclude' => $bool_exclude_default,
       'l10n_mode'  => 'exclude',
      'label' => 'LLL:EXT:org/locallang_db.xml:tx_org_location.pubtrans_stop',
      'config'  => $conf_text_rte,
    ),
    'pubtrans_url' => array (
      'exclude'   => $bool_exclude_default,
      'l10n_mode' => 'exclude',
      'label'     => 'LLL:EXT:org/locallang_db.xml:tx_org_location.pubtrans_url',
      'config'    => $arr_wizard_url,
    ),
    'pubtrans_embeddedcode' => array (
      'exclude'   => $bool_exclude_default,
      'l10n_mode' => 'exclude',
      'label'     => 'LLL:EXT:org/locallang_db.xml:tx_org_location.pubtrans_embeddedcode',
      'config'    => $conf_text_50_10,
    ),
    'citymap_url' => array (
      'exclude'   => $bool_exclude_default,
      'l10n_mode' => 'exclude',
      'label'     => 'LLL:EXT:org/locallang_db.xml:tx_org_location.citymap_url',
      'config'    => $arr_wizard_url,
    ),
    'citymap_embeddedcode' => array (
      'exclude'   => $bool_exclude_default,
      'l10n_mode' => 'exclude',
      'label'     => 'LLL:EXT:org/locallang_db.xml:tx_org_location.citymap_embeddedcode',
      'config'    => $conf_text_30_05,
    ),
    'image' => array (
      'exclude'   => $bool_exclude_default,
      'l10n_mode' => 'exclude',
      'label'     => 'LLL:EXT:org/locallang_db.xml:tca_phrase.image',
      'config'    => $conf_file_image,
    ),
    'imagecaption' => array (
      'exclude'   => $bool_exclude_default,
      'l10n_mode' => 'prefixLangTitle',
      'label'     => 'LLL:EXT:org/locallang_db.xml:tca_phrase.imagecaption',
      'config'    => $conf_text_30_05,
    ),
    'imagecaption_position' => array (
      'exclude'   => $bool_exclude_none,
      'l10n_mode' => 'exclude',
      'label'     => 'LLL:EXT:cms/locallang_ttc.xml:imagecaption_position',
      'config'    => array (
        'type' => 'select',
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
      'l10n_mode' => 'exclude',
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
      'l10n_mode' => 'exclude',
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
      'l10n_mode' => 'exclude',
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
      'l10n_mode' => 'exclude',
      'label'     => 'LLL:EXT:cms/locallang_ttc.xml:imageborder',
      'config'    => array (
        'type' => 'check'
      ),
    ),
    'image_noRows' => array (
      'exclude'   => $bool_exclude_none,
      'l10n_mode' => 'exclude',
      'label'     => 'LLL:EXT:cms/locallang_ttc.xml:image_noRows',
      'config'    => array (
        'type' => 'check'
      ),
    ),
    'image_link' => array (
      'exclude'   => $bool_exclude_default,
      'l10n_mode' => 'exclude',
      'label'     => 'LLL:EXT:cms/locallang_ttc.xml:image_link',
      'config'    => array (
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
      'l10n_mode' => 'exclude',
      'label'     => 'LLL:EXT:cms/locallang_ttc.xml:image_zoom',
      'config'    => array (
        'type' => 'check'
      ),
    ),
    'image_effects' => array (
      'exclude'   => $bool_exclude_default,
      'l10n_mode' => 'exclude',
      'label'     => 'LLL:EXT:cms/locallang_ttc.xml:image_effects',
      'config'    => array (
        'type'  => 'select',
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
      'l10n_mode' => 'exclude',
      'label'     => 'LLL:EXT:cms/locallang_ttc.xml:image_frames',
      'config'    => array (
        'type'  => 'select',
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
      'l10n_mode' => 'exclude',
      'label'     => 'LLL:EXT:cms/locallang_ttc.xml:image_compression',
      'config'    => array (
        'type' => 'select',
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
      'l10n_mode' => 'exclude',
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
      'exclude' => $bool_exclude_default,
//      'l10n_mode' => 'exclude',
      'label'   => 'LLL:EXT:org/locallang_db.xml:tca_phrase.documentslayout',
      'config'  => array (
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
      'exclude' => $bool_exclude_default,
//      'l10n_mode' => 'exclude',
      'label' => 'LLL:EXT:cms/locallang_ttc.xml:filelink_size',
      'config' => array (
        'type' => 'check',
        'items' => array (
          '1'     => array (
            '0' => 'LLL:EXT:lang/locallang_core.xml:labels.enabled',
          ),
        ),
      ),
    ),
    'hidden'    => $conf_hidden,
    'pages'     => $conf_pages,
    'fe_group'  => $conf_fegroup,
    'keywords'  => array (
      'exclude'   => $bool_exclude_default,
      'l10n_mode' => 'prefixLangTitle',
      'label'     => 'LLL:EXT:org/locallang_db.xml:tca_phrase.keywords',
      'config'    => $conf_input_80_trim,
    ),
    'description' => array (
      'exclude'   => $bool_exclude_default,
      'l10n_mode' => 'prefixLangTitle',
      'label'     => 'LLL:EXT:org/locallang_db.xml:tca_phrase.description',
      'config'    => $conf_text_50_10,
    ),
  ),
  'types' => array (
    '0' => array ('showitem' =>  
      '--div--;LLL:EXT:org/locallang_db.xml:tx_org_location.div_location,     title,url,mail_address;;;;2-2-2,mail_postcode,mail_city,mail_country,mail_url,mail_embeddedcode,'.
      '--div--;LLL:EXT:org/locallang_db.xml:tx_org_location.div_contact,      telephone,ticket_telephone,ticket_url,fax,email,'.
      '--div--;LLL:EXT:org/locallang_db.xml:tx_org_location.div_calendar,     tx_org_cal,'.
      '--div--;LLL:EXT:org/locallang_db.xml:tx_org_location.div_pubtrans,     pubtrans_stop;;;richtext[]:rte_transform[mode=ts];4-4-4,pubtrans_url,pubtrans_embeddedcode,citymap_url;;;;5-5-5,citymap_embeddedcode,'.
      '--div--;LLL:EXT:cms/locallang_ttc.xml:tabs.images,' .
        '--palette--;LLL:EXT:cms/locallang_ttc.xml:palette.imagefiles;imagefiles,' .
        '--palette--;LLL:EXT:org/locallang_db.xml:palette.image_accessibility;image_accessibility,' .
        '--palette--;LLL:EXT:cms/locallang_ttc.xml:palette.imageblock;imageblock,' .
        '--palette--;LLL:EXT:cms/locallang_ttc.xml:palette.imagelinks;imagelinks,' .
        '--palette--;LLL:EXT:cms/locallang_ttc.xml:palette.image_settings;image_settings,' .
      '--div--;LLL:EXT:cms/locallang_ttc.xml:tabs.media,' .
        '--palette--;LLL:EXT:cms/locallang_ttc.xml:media;documents_upload,' .
        '--palette--;LLL:EXT:org/locallang_db.xml:palette.appearance;documents_appearance,' .
      '--div--;LLL:EXT:org/locallang_db.xml:tx_org_location.div_embedded,     embeddedcode,'.
      '--div--;LLL:EXT:org/locallang_db.xml:tx_org_location.div_control,      hidden,pages,fe_group,'.
      '--div--;LLL:EXT:org/locallang_db.xml:tx_org_location.div_seo,          keywords, description,'.
      ''),
  ),
  'palettes' => array (
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
if(!$bool_full_wizardSupport_allTables)
{
  unset($TCA['tx_org_location']['columns']['tx_org_cal']['config']['wizards']['add']);
  unset($TCA['tx_org_location']['columns']['tx_org_cal']['config']['wizards']['list'] );
}
  // tx_org_location



  /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
  // 
  // tx_org_news
  
$TCA['tx_org_news'] = array (
  'ctrl' => $TCA['tx_org_news']['ctrl'],
  'interface' => array (
    'showRecordFieldList' =>  'sys_language_uid,l10n_parent,l10n_diffsource,type,title,subtitle,datetime,tx_org_newscat,bodytext,'.
                              'newspage,newsurl'.
                              'fe_user,'.
                              'tx_org_headquarters,'.
                              'tx_org_department,'.
                              'documents_from_path,documents,documentscaption,documentslayout,documentssize,' .
                              'image,imagecaption,imageseo,imagewidth,imageheight,imageorient,imagecaption,imagecols,imageborder,imagecaption_position,image_link,image_zoom,image_noRows,image_effects,image_compression,' .
                              'embeddedcode,'.
                              'hidden,topnews,pages,starttime,endtime,fe_group,'.
                              'keywords,description,'.
                              'teaser_title,teaser_subtitle,teaser_short',
  ),
  'feInterface' => $TCA['tx_org_news']['feInterface'],
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
      'exclude' => 1,
      'label' => 'LLL:EXT:lang/locallang_general.php:LGL.l10n_parent',
      'config' => array (
        'type' => 'select',
        'items' => array (
          array ('', 0),
        ),
        'foreign_table' => 'tx_org_news',
        'foreign_table_where' => 'AND tx_org_news.uid=###REC_FIELD_l10n_parent### AND tx_org_news.sys_language_uid IN (-1,0)',
      ),
    ),
    'l10n_diffsource' => array (
      'config' => array (
        'type' => 'passthrough'
      ),
    ),
    'type' => array (
      'exclude'   => $bool_exclude_default,
      'l10n_mode' => 'exclude',
      'label'     => 'LLL:EXT:org/locallang_db.xml:tx_org_news.type',
      'config'    => array (
        'type'    => 'select', 
        'items'   => array (
          'news' => array (
            '0' => 'LLL:EXT:org/locallang_db.xml:tx_org_news.type.news',
            '1' => 'news',
            '2' => 'EXT:org/ext_icon/news.gif',
          ),
          'newspage' => array (
            '0' => 'LLL:EXT:org/locallang_db.xml:tx_org_news.type.newspage',
            '1' => 'newspage',
            '2' => 'EXT:org/ext_icon/newspage.gif',
          ),
          'newsurl' => array (
            '0' => 'LLL:EXT:org/locallang_db.xml:tx_org_news.type.newsurl',
            '1' => 'newsurl',
            '2' => 'EXT:org/ext_icon/newsurl.gif',
          ),
        ),
        'default' => 'news',
      ),
    ),
    'title' => array (
      'exclude'   => 0,
      'l10n_mode' => 'prefixLangTitle',
      'label'     => 'LLL:EXT:org/locallang_db.xml:tx_org_news.title',
      'config'    => $conf_input_30_trimRequired,
    ),
    'subtitle' => array (
      'exclude'   => $bool_exclude_default,
      'l10n_mode' => 'prefixLangTitle',
      'label'     => 'LLL:EXT:org/locallang_db.xml:tx_org_news.subtitle',
      'config'    => $conf_input_30_trim,
    ),
    'datetime' => array (
      'exclude'   => 0,
      'l10n_mode' => 'exclude',
      'label'     => 'LLL:EXT:org/locallang_db.xml:tx_org_news.datetime',
      'config'    => $conf_datetime,
    ),
    'tx_org_newscat' => array (
      'exclude'   => $bool_exclude_default,
      'l10n_mode' => 'exclude',
      'label'     => 'LLL:EXT:org/locallang_db.xml:tx_org_news.tx_org_newscat',
      'config'    => array (
        'type'                => 'select', 
        'size'                => 10, 
        'minitems'            => 0,
        'maxitems'            => 99,
        'MM'                  => 'tx_org_news_mm_tx_org_newscat',
        'foreign_table'       => 'tx_org_newscat',
        'foreign_table_where' => 'AND tx_org_newscat.' . $str_store_record_conf . ' ORDER BY tx_org_newscat.title',
        'wizards' => array (
          '_PADDING'  => 2,
          '_VERTICAL' => 0,
          'add' => array (
            'type'   => 'script',
            'title'  => 'LLL:EXT:org/locallang_db.xml:wizard.tx_org_newscat.add',
            'icon'   => 'add.gif',
            'params' => array (
              'table'    => 'tx_org_newscat',
              'pid'      => $str_marker_pid,
              'setValue' => 'prepend'
            ),
            'script' => 'wizard_add.php',
          ),
          'list' => array (
            'type'   => 'script',
            'title'  => 'LLL:EXT:org/locallang_db.xml:wizard.tx_org_newscat.list',
            'icon'   => 'list.gif',
            'params' => array (
              'table' => 'tx_org_newscat',
              'pid'   => $str_marker_pid,
            ),
            'script' => 'wizard_list.php',
          ),
          'edit' => array (
            'type'                      => 'popup',
            'title'                     => 'LLL:EXT:org/locallang_db.xml:wizard.tx_org_newscat.edit',
            'script'                    => 'wizard_edit.php',
            'popup_onlyOpenIfSelected'  => 1,
            'icon'                      => 'edit2.gif',
            'JSopenParams'              => $JSopenParams,
          ),
        ),
      ),
    ),
    'bodytext' => array (
      'exclude'     => $bool_exclude_default,
      'l10n_mode' => 'prefixLangTitle',
      'label'     => 'LLL:EXT:org/locallang_db.xml:tx_org_news.bodytext',
      'config'    => $conf_text_rte,
    ),
    'newspage' => array (
      'exclude'   => $bool_exclude_default,
//      'l10n_mode' => 'exclude',
      'label'     => 'LLL:EXT:org/locallang_db.xml:tx_org_news.newspage',
      'config'    => array (
        'type'          => 'group',
        'internal_type' => 'db',
        'allowed'       => 'pages',
        'size'          => '1',
        'maxitems'      => '1',
        'minitems'      => '1',
        'show_thumbs'   => '1'
      ),
    ),
    'newsurl' => array (
      'exclude'   => $bool_exclude_default,
//      'l10n_mode' => 'exclude',
      'label'     => 'LLL:EXT:org/locallang_db.xml:tx_org_news.newsurl',
      'config'    => array (
        'type'      => 'input',
        'size'      => '80',
        'max'       => '256',
        'checkbox'  => '',
        'eval'      => 'trim,required',
        'wizards'   => array (
          '_PADDING'  => '2',
          'link'      => array (
            'type'         => 'popup',
            'title'        => 'Link',
            'icon'         => 'link_popup.gif',
            'script'       => 'browse_links.php?mode=wizard',
            'JSopenParams' => $JSopenParams,
          ),
        ),
        'softref' => 'typolink',
      ),
    ),
    'fe_user' => array (
      'exclude'     => $bool_exclude_default,
//      'l10n_mode'   => 'exclude',
      'label'       => 'LLL:EXT:org/locallang_db.xml:tx_org_news.fe_user',
      'config'      => array (
        'type'      => 'select', 
        'size'      => $size_news,
        'minitems'  => 0,
        'maxitems'  => 1,
        'items' => array (
          '0' => array (
            '0' => '',
            '1' => '',
          ),
        ),
        'MM'                  => 'fe_users_mm_tx_org_news',
        'MM_opposite_field'   => 'tx_org_news',
        'foreign_table'       => 'fe_users',
        'foreign_table_where' => 'AND fe_users.' . $str_store_record_conf . ' ORDER BY fe_users.last_name',
        'wizards' => $arr_config_feuser['wizards'],
      ),
    ),
    'tx_org_headquarters' => array (
      'exclude'   => $bool_exclude_tx_org_company,
      'l10n_mode' => 'exclude',
      'label'     => 'LLL:EXT:org/locallang_db.xml:tx_org_cal.tx_org_company',
      'config'    => array (
        'type'                => 'select', 
        'size'                => $size_headquarters,
        'minitems'            => 0,
        'maxitems'            => 999,
        'MM'                  => 'tx_org_headquarters_mm_tx_org_news',
        'MM_opposite_field'   => 'tx_org_news',
        'foreign_table'       => 'tx_org_headquarters',
        'foreign_table_where' => 'AND tx_org_headquarters.' . $str_store_record_conf . ' AND tx_org_headquarters.sys_language_uid=###REC_FIELD_sys_language_uid### ORDER BY tx_org_headquarters.title',
        'selectedListStyle'   => 'width:360px;',
        'itemListStyle'       => 'width:360px;',
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
    'tx_org_department' => array (
      'exclude'   => $bool_exclude_tx_org_department,
      'l10n_mode' => 'exclude',
      'label'     => 'LLL:EXT:org/locallang_db.xml:tx_org_news.tx_org_department',
      'config'    => array (
        'type'                => 'select', 
        'size'                => $size_department,
        'minitems'            => 0,
        'maxitems'            => 999,
        'MM'                  => 'tx_org_department_mm_tx_org_news',
        'MM_opposite_field'   => 'tx_org_news',
        'foreign_table'       => 'tx_org_department',
        'foreign_table_where' => 'AND tx_org_department.' . $str_store_record_conf . ' AND tx_org_department.sys_language_uid=###REC_FIELD_sys_language_uid### ORDER BY tx_org_department.title',
        'wizards' => array (
          '_PADDING'  => 2,
          '_VERTICAL' => 0,
          'add' => array (
            'type'   => 'script',
            'title'  => 'LLL:EXT:org/locallang_db.xml:wizard.tx_org_department.add',
            'icon'   => 'add.gif',
            'params' => array (
              'table'    => 'tx_org_department',
              'pid'      => $str_marker_pid,
              'setValue' => 'prepend'
            ),
            'script' => 'wizard_add.php',
          ),
          'list' => array (
            'type'   => 'script',
            'title'  => 'LLL:EXT:org/locallang_db.xml:wizard.tx_org_department.list',
            'icon'   => 'list.gif',
            'params' => array (
              'table' => 'tx_org_department',
              'pid'   => $str_marker_pid,
            ),
            'script' => 'wizard_list.php',
          ),
          'edit' => array (
            'type'                      => 'popup',
            'title'                     => 'LLL:EXT:org/locallang_db.xml:wizard.tx_org_department.edit',
            'script'                    => 'wizard_edit.php',
            'popup_onlyOpenIfSelected'  => 1,
            'icon'                      => 'edit2.gif',
            'JSopenParams'              => $JSopenParams,
          ),
        ),
      ),
    ),
    'hidden'    => $conf_hidden,
    'topnews' => array (
      'exclude' => $bool_exclude_none,
//      'l10n_mode'   => 'exclude',
      'label'   => 'LLL:EXT:org/locallang_db.xml:tx_org_news.topnews',
      'config'  => array (
        'type'    => 'check',
        'default' => '0'
      ),
    ),
    'pages' => $conf_pages,
    'starttime' => $conf_starttime,
    'endtime'   => $conf_endtime,
    'fe_group'  => $conf_fegroup,
    'image' => array (
      'exclude'   => $bool_exclude_default,
      'l10n_mode' => 'exclude',
      'label'     => 'LLL:EXT:org/locallang_db.xml:tca_phrase.image',
      'config'    => $conf_file_image,
    ),
    'imagecaption' => array (
      'exclude'   => $bool_exclude_default,
      'l10n_mode' => 'prefixLangTitle',
      'label'     => 'LLL:EXT:org/locallang_db.xml:tca_phrase.imagecaption',
      'config'    => $conf_text_30_05,
    ),
    'imagecaption_position' => array (
      'exclude'   => $bool_exclude_none,
      'l10n_mode' => 'exclude',
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
      'l10n_mode' => 'exclude',
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
      'l10n_mode' => 'exclude',
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
      'l10n_mode' => 'exclude',
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
      'l10n_mode' => 'exclude',
      'label'     => 'LLL:EXT:cms/locallang_ttc.xml:imageborder',
      'config'    => array (
        'type' => 'check'
      ),
    ),
    'image_noRows' => array (
      'exclude'   => $bool_exclude_none,
      'l10n_mode' => 'exclude',
      'label'     => 'LLL:EXT:cms/locallang_ttc.xml:image_noRows',
      'config'    => array (
        'type' => 'check'
      ),
    ),
    'image_link' => array (
      'exclude'   => $bool_exclude_default,
      'l10n_mode' => 'exclude',
      'label'     => 'LLL:EXT:cms/locallang_ttc.xml:image_link',
      'config'    => array (
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
      'l10n_mode' => 'exclude',
      'label'     => 'LLL:EXT:cms/locallang_ttc.xml:image_zoom',
      'config'    => array (
        'type' => 'check'
      ),
    ),
    'image_effects' => array (
      'exclude'   => $bool_exclude_default,
      'l10n_mode' => 'exclude',
      'label'     => 'LLL:EXT:cms/locallang_ttc.xml:image_effects',
      'config'    => array (
        'type'  => 'select',
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
      'l10n_mode' => 'exclude',
      'label'     => 'LLL:EXT:cms/locallang_ttc.xml:image_frames',
      'config'    => array (
        'type'  => 'select',
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
      'l10n_mode' => 'exclude',
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
      'l10n_mode' => 'exclude',
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
      'label'     => 'LLL:EXT:org/locallang_db.xml:tca_phrase.embeddedcode',
      'config'    => $conf_text_50_10,
    ),
    'documents_from_path' => array (
      'exclude' => $bool_exclude_default,
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
      'label'   => 'LLL:EXT:org/locallang_db.xml:tca_phrase.documents',
      'config'  => $conf_file_document,
    ),
    'documentscaption' => array (
      'exclude' => $bool_exclude_default,
      'label'   => 'LLL:EXT:org/locallang_db.xml:tca_phrase.documentscaption',
      'config'  => $conf_text_30_05,
    ),
    'documentslayout' => array (
      'exclude' => $bool_exclude_default,
      'label'   => 'LLL:EXT:org/locallang_db.xml:tca_phrase.documentslayout',
      'config'  => array (
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
      'exclude' => $bool_exclude_default,
      'label' => 'LLL:EXT:cms/locallang_ttc.xml:filelink_size',
      'config' => array (
        'type' => 'check',
        'items' => array (
          '1'     => array (
            '0' => 'LLL:EXT:lang/locallang_core.xml:labels.enabled',
          ),
        ),
      ),
    ),
    'keywords' => array (
      'exclude'   => $bool_exclude_default,
      'label'     => 'LLL:EXT:org/locallang_db.xml:tca_phrase.keywords',
      'l10n_mode' => 'prefixLangTitle',
      'config'    => $conf_input_80_trim,
    ),
    'description' => array (
      'exclude'   => $bool_exclude_default,
      'label'     => 'LLL:EXT:org/locallang_db.xml:tca_phrase.description',
      'l10n_mode' => 'prefixLangTitle',
      'config'    => $conf_text_50_10,
    ),
    'teaser_title' => array (
      'exclude'   => $bool_exclude_default,
      'l10n_mode' => 'prefixLangTitle',
      'label'     => 'LLL:EXT:org/locallang_db.xml:tx_org_news.teaser_title',
      'config'    => $conf_input_30_trim,
    ),
    'teaser_subtitle' => array (
      'exclude'   => $bool_exclude_default,
      'l10n_mode' => 'prefixLangTitle',
      'label'     => 'LLL:EXT:org/locallang_db.xml:tx_org_news.teaser_subtitle',
      'config'    => $conf_input_30_trim,
    ),
    'teaser_short' => array (
      'exclude'   => $bool_exclude_default,
      'l10n_mode' => 'prefixLangTitle',
      'label'     => 'LLL:EXT:org/locallang_db.xml:tx_org_news.teaser_short',
      'config'    => $conf_text_50_10,
    ),
  ),
  'types' => array (
    'news' => array ('showitem' =>
      '--div--;LLL:EXT:org/locallang_db.xml:tx_org_news.div_news,       type,title;;;;1-1-1,subtitle,datetime,tx_org_newscat,bodytext;;;richtext[]:rte_transform[mode=ts];3-3-3,'.
      '--div--;LLL:EXT:org/locallang_db.xml:tx_org_news.div_teaser,     teaser_title;;;;6-6-6, teaser_subtitle, teaser_short,'.
      '--div--;LLL:EXT:cms/locallang_ttc.xml:tabs.images,' .
        '--palette--;LLL:EXT:cms/locallang_ttc.xml:palette.imagefiles;imagefiles,' .
        '--palette--;LLL:EXT:org/locallang_db.xml:palette.image_accessibility;image_accessibility,' .
        '--palette--;LLL:EXT:cms/locallang_ttc.xml:palette.imageblock;imageblock,' .
        '--palette--;LLL:EXT:cms/locallang_ttc.xml:palette.imagelinks;imagelinks,' .
        '--palette--;LLL:EXT:cms/locallang_ttc.xml:palette.image_settings;image_settings,' .
      '--div--;LLL:EXT:cms/locallang_ttc.xml:tabs.media,' .
        '--palette--;LLL:EXT:cms/locallang_ttc.xml:media;documents_upload,' .
        '--palette--;LLL:EXT:org/locallang_db.xml:palette.appearance;documents_appearance,' .
      '--div--;LLL:EXT:org/locallang_db.xml:tx_org_news.div_embedded,   embeddedcode,'.
      '--div--;LLL:EXT:org/locallang_db.xml:tx_org_news.div_feuser,     fe_user,'.
      '--div--;LLL:EXT:org/locallang_db.xml:tx_org_news.div_company,    tx_org_headquarters,'.
      '--div--;LLL:EXT:org/locallang_db.xml:tx_org_news.div_department, tx_org_department,'.
      '--div--;LLL:EXT:org/locallang_db.xml:tx_org_news.div_control,    sys_language_uid;;;;8-8-8, l10n_parent, l10n_diffsource, hidden;;3;;,topnews,pages, fe_group,'.
      '--div--;LLL:EXT:org/locallang_db.xml:tx_org_news.div_seo,        keywords;;;;7-7-7, description,'.
      ''),
    'newspage' => array ('showitem' =>
      '--div--;LLL:EXT:org/locallang_db.xml:tx_org_news.div_news,       type,title;;;;1-1-1,subtitle,datetime,tx_org_newscat,'.
      '--div--;LLL:EXT:org/locallang_db.xml:tx_org_news.div_newspage,   newspage,'.
      '--div--;LLL:EXT:org/locallang_db.xml:tx_org_news.div_teaser,     teaser_title;;;;6-6-6, teaser_subtitle, teaser_short,'.
      '--div--;LLL:EXT:cms/locallang_ttc.xml:tabs.images,' .
        '--palette--;LLL:EXT:cms/locallang_ttc.xml:palette.imagefiles;imagefiles,' .
        '--palette--;LLL:EXT:org/locallang_db.xml:palette.image_accessibility;image_accessibility,' .
        '--palette--;LLL:EXT:cms/locallang_ttc.xml:palette.imageblock;imageblock,' .
        '--palette--;LLL:EXT:cms/locallang_ttc.xml:palette.imagelinks;imagelinks,' .
        '--palette--;LLL:EXT:cms/locallang_ttc.xml:palette.image_settings;image_settings,' .
      '--div--;LLL:EXT:org/locallang_db.xml:tx_org_news.div_company,    tx_org_headquarters,'.
      '--div--;LLL:EXT:org/locallang_db.xml:tx_org_news.div_department, tx_org_department,'.
      '--div--;LLL:EXT:org/locallang_db.xml:tx_org_news.div_control,    sys_language_uid;;;;8-8-8, l10n_parent, l10n_diffsource, hidden;;3;;,topnews,pages, fe_group,'.
      ''),
    'newsurl' => array ('showitem' =>
      '--div--;LLL:EXT:org/locallang_db.xml:tx_org_news.div_news,       type,title;;;;1-1-1,subtitle,datetime,tx_org_newscat,'.
      '--div--;LLL:EXT:org/locallang_db.xml:tx_org_news.div_newsurl,    newsurl,'.
      '--div--;LLL:EXT:org/locallang_db.xml:tx_org_news.div_teaser,     teaser_title;;;;6-6-6, teaser_subtitle, teaser_short,'.
      '--div--;LLL:EXT:cms/locallang_ttc.xml:tabs.images,' .
        '--palette--;LLL:EXT:cms/locallang_ttc.xml:palette.imagefiles;imagefiles,' .
        '--palette--;LLL:EXT:org/locallang_db.xml:palette.image_accessibility;image_accessibility,' .
        '--palette--;LLL:EXT:cms/locallang_ttc.xml:palette.imageblock;imageblock,' .
        '--palette--;LLL:EXT:cms/locallang_ttc.xml:palette.imagelinks;imagelinks,' .
        '--palette--;LLL:EXT:cms/locallang_ttc.xml:palette.image_settings;image_settings,' .
      '--div--;LLL:EXT:org/locallang_db.xml:tx_org_news.div_company,    tx_org_headquarters,'.
      '--div--;LLL:EXT:org/locallang_db.xml:tx_org_news.div_department, tx_org_department,'.
      '--div--;LLL:EXT:org/locallang_db.xml:tx_org_news.div_control,    sys_language_uid;;;;8-8-8, l10n_parent, l10n_diffsource, hidden;;3;;,topnews,pages, fe_group,'.
      ''),
  ),
  'palettes' => array (
    '3' => array ('showitem' => 'starttime, endtime'),
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
if( ! $bool_exclude_tx_org_company )
{
  $TCA['tx_org_headquarters']['columns']['title']['label'] = 'LLL:EXT:org/locallang_db.xml:tx_org_company.title';
  $showitem = $TCA['tx_org_headquarters']['types']['0']['showitem'];
  $showitem = str_replace
              (
                'LLL:EXT:org/locallang_db.xml:tx_org_headquarters.div_headquarters',
                'LLL:EXT:org/locallang_db.xml:tx_org_headquarters.div_company',
                $showitem
              );
  $TCA['tx_org_headquarters']['types']['0']['showitem'] = $showitem;
}
if(!$bool_full_wizardSupport_catTables)
{
  unset($TCA['tx_org_news']['columns']['tx_org_newscat']['config']['wizards']['add']);
  unset($TCA['tx_org_news']['columns']['tx_org_newscat']['config']['wizards']['list']);
}
if(!$bool_full_wizardSupport_allTables)
{
  unset($TCA['tx_org_news']['columns']['tx_org_department']['config']['wizards']['add']);
  unset($TCA['tx_org_news']['columns']['tx_org_department']['config']['wizards']['list'] );
}
  // tx_org_news



  /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
  // 
  // tx_org_newscat
  
$TCA['tx_org_newscat'] = array (
  'ctrl' => $TCA['tx_org_newscat']['ctrl'],
  'interface' => array (
    'showRecordFieldList' =>  'title,title_lang_ol,'.
                              'hidden,'.
                              'image,imagecaption,imageseo',
  ),
  'columns' => array (
    'title' => array (
      'exclude' => 0,
      'label'   => 'LLL:EXT:org/locallang_db.xml:tx_org_newscat.title',
      'config'  => $conf_input_30_trimRequired,
    ),
    'title_lang_ol' => array (
      'exclude' => 0,
      'label'   => 'LLL:EXT:org/locallang_db.xml:tx_org_newscat.title_lang_ol',
      'config'  => $conf_input_30_trim,
    ),
    'image' => array (
      'l10n_mode' => 'exclude',
      'exclude'   => $bool_exclude_default,
      'label'     => 'LLL:EXT:org/locallang_db.xml:tca_phrase.image',
      'config'    => $conf_file_image,
    ),
    'imagecaption' => array (
      'exclude' => $bool_exclude_default,
      'label'   => 'LLL:EXT:org/locallang_db.xml:tca_phrase.imagecaption',
      'config'  => $conf_text_30_05,
    ),
    'imageseo' => array (
      'exclude' => $bool_exclude_default,
      'label'   => 'LLL:EXT:org/locallang_db.xml:tca_phrase.imageseo',
      'config'  => $conf_text_30_05,
    ),
    'hidden'    => $conf_hidden,
  ),
  'types' => array (
    '0' => array ('showitem' =>  '--div--;LLL:EXT:org/locallang_db.xml:tx_org_newscat.div_cat,     title;;1;;1-1-1,'.
                                '--div--;LLL:EXT:org/locallang_db.xml:tx_org_newscat.div_control, hidden,'.
                                '--div--;LLL:EXT:org/locallang_db.xml:tx_org_newscat.div_media,   image, imagecaption;;3;;'),
  ),
  'palettes' => array (
    '1' => array ('showitem' => 'title_lang_ol'),
    '3' => array ('showitem' => 'imageseo'),
  ),
);
  // tx_org_newscat



  /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
  //
  // tx_org_tax

$TCA['tx_org_tax'] = array (
  'ctrl' => $TCA['tx_org_tax']['ctrl'],
  'interface' => array (
    'showRecordFieldList' =>  'title,title_lang_ol,value,'.
                              'hidden,starttime,endtime'
  ),
  'feInterface' => $TCA['tx_org_tax']['feInterface'],
  'columns' => array (
    'title' => array (
      'exclude' => 0,
      'label'   => 'LLL:EXT:org/locallang_db.xml:tx_org_tax.title',
      'config'  => $conf_input_30_trimRequired,
    ),
    'title_lang_ol' => array (
      'exclude' => 0,
      'label'   => 'LLL:EXT:org/locallang_db.xml:tx_org_tax.title_lang_ol',
      'config'  => $conf_input_30_trim,
    ),
    'value' => array (
      'exclude' => 0,
      'label'   => 'LLL:EXT:org/locallang_db.xml:tx_org_tax.value',
      'config' => array (
        'type' => 'input',  
        'size' => '5',
        'max'  => '5',
        'eval' => 'required,double2',
      ),
    ),
    'hidden'    => $conf_hidden,
    'starttime' => $conf_starttime,
    'endtime'   => $conf_endtime,
  ),

  'types' => array (
    '0' => array ('showitem' =>  '--div--;LLL:EXT:org/locallang_db.xml:tx_org_tax.div_tax,     title;;1;;,value,'.
                                '--div--;LLL:EXT:org/locallang_db.xml:tx_org_tax.div_control, hidden;;2;;'.
                                ''),
  ),
  'palettes' => array (
    '1' => array ('showitem' => 'title_lang_ol,'),
    '2' => array ('showitem' => 'starttime,endtime,'),
  ),
);
  // tx_org_tax

?>