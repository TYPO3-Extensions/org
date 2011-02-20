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
  //    Localization support
  //    Store record configuration
  // General Configuration
  // Wizard fe_users
  // Other wizards and config drafts
  // TCA
  //   tx_org_cal
  //   tx_org_calentrance
  //   tx_org_caltype
  //   tx_org_headquarters
  //   tx_org_location
  //   tx_org_department
  //   tx_org_departmentcat
  //   tx_org_news
  //   tx_org_newscat
  //   tx_org_org
  //   tx_org_repertoire
  //   tx_org_tax



  /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
  // 
  // Configuration by the extension manager

$bool_LL = false;
$confArr = unserialize($GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf']['org']);

  // Localization support
if (strtolower(substr($confArr['LLsupport'], 0, strlen('yes'))) == 'yes')
{
  $bool_LL = true;
}
  // Localization support

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
    $bool_full_wizardSupport_allTables  = false;
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
  // Rows of repertoire select box
  $size_repertoire  = 1;

  // General Configuration



  /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
  // 
  // Wizard fe_users

  // Wizard for fe_users
  $arr_config_feuser = array(
    'type'                => 'select', 
    'size'                => $size_feuser, 
    'minitems'            => 0,
    'maxitems'            => 999,
    'foreign_table'       => 'fe_users',
    'foreign_table_where' => 'AND fe_users.' . $str_store_record_conf . ' ORDER BY fe_users.last_name',
    'wizards' => array(
      '_PADDING'  => 2,
      '_VERTICAL' => 0,
      'add' => array(
        'type'   => 'script',
        'title'  => 'LLL:EXT:org/locallang_db.xml:wizard.fe_user.add',
        'icon'   => 'add.gif',
        'params' => array(
          'table'    => 'fe_users',
          'pid'      => $str_marker_pid,
          'setValue' => 'prepend'
        ),
        'script' => 'wizard_add.php',
      ),
      'list' => array(
        'type'   => 'script',
        'title'  => 'LLL:EXT:org/locallang_db.xml:wizard.fe_user.list',
        'icon'   => 'list.gif',
        'params' => array(
          'table' => 'fe_users',
          'pid'   => $str_marker_pid,
        ),
        'script' => 'wizard_list.php',
      ),
      'edit' => array(
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
    'default' => mktime(date('H'),date('i'),0,date('m'),date('d'),date('Y'))
  );
  
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
  
  $conf_input_30_trim = array (
    'type' => 'input',
    'size' => '30',
    'eval' => 'trim'
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
    'wizards' => array(
      '_PADDING' => 2,
      'RTE' => array(
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
    'exclude' => $bool_exclude_default,
    'label'   => 'LLL:EXT:lang/locallang_general.xml:LGL.hidden',
    'config'  => array (
      'type'    => 'check',
      'default' => '0'
    )
  );
  $conf_starttime = array (
    'exclude' => $bool_time_control,
    'label'   => 'LLL:EXT:lang/locallang_general.xml:LGL.starttime',
    'config'  => array (
      'type'     => 'input',
      'size'     => '8',
      'max'      => '20',
      'eval'     => 'date',
      'default'  => '0',
      'checkbox' => '0'
    )
  );
  $conf_endtime = array (
    'exclude' => $bool_time_control,
    'label'   => 'LLL:EXT:lang/locallang_general.xml:LGL.endtime',
    'config'  => array (
      'type'     => 'input',
      'size'     => '8',
      'max'      => '20',
      'eval'     => 'date',
      'checkbox' => '0',
      'default'  => '0',
      'range'    => array (
        'upper' => mktime(0, 0, 0, date('m'), date('d'), date('Y')+30),
        'lower' => mktime(0, 0, 0, date('m')-1, date('d'), date('Y'))
      )
    )
  );
  $conf_fegroup = array (
    'exclude'     => $bool_fegroup_control,
    'l10n_mode'   => 'mergeIfNotBlank',
    'label'       => 'LLL:EXT:lang/locallang_general.php:LGL.fe_group',
    'config'      => array (
      'type'      => 'select',
      'size'      => $size_fegroup,
      'maxitems'  => 20,
      'items' => array (
        array('LLL:EXT:lang/locallang_general.php:LGL.hide_at_login', -1),
        array('LLL:EXT:lang/locallang_general.php:LGL.any_login', -2),
        array('LLL:EXT:lang/locallang_general.php:LGL.usergroups', '--div--')
      ),
      'exclusiveKeys' => '-1,-2',
      'foreign_table' => 'fe_groups'
    )
  );
  $conf_pages = array (
    'label'   => 'LLL:EXT:org/locallang_db.xml:tca_phrase.pages',
    'exclude' => $bool_exclude_none,
    'config'  => array (
      'type'          => 'group',
      'internal_type' => 'db',
      'allowed'       => 'pages',
      'size'          => '10',
      'maxitems'      => '99',
      'minitems'      => '0',
      'show_thumbs'   => '1'
    )
  );
  // Other wizards and config drafts



  /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
  //
  // tx_org_cal - without any localisation support

$TCA['tx_org_cal'] = array (
  'ctrl' => $TCA['tx_org_cal']['ctrl'],
  'interface' => array (
    'showRecordFieldList' =>  'repertoire,title,shortcut,datetime,caltype,'.
                              'location,calentrance,'.
                              'department'.
                              'documents'.
                              'hidden,starttime,endtime,fe_group'
  ),
  'feInterface' => $TCA['tx_org_cal']['feInterface'],
  'columns' => array (
    'repertoire' => array (
      'exclude' => $bool_exclude_default,
      'label'   => 'LLL:EXT:org/locallang_db.xml:tx_org_cal.repertoire',
      'config'  => array (
        'type'                => 'select', 
        'size'                => $size_repertoire,
        'minitems'            => 0,
        'maxitems'            => 1,
        'MM'                  => 'tx_org_cal_mm_repertoire',
        'foreign_table'       => 'tx_org_repertoire',
        'foreign_table_where' => 'AND tx_org_repertoire.' . $str_store_record_conf . ' ORDER BY tx_org_repertoire.title',
        'items' => array(
          '0' => array(
            '0' => '',
            '1' => '',
          ),
        ),
        'wizards' => array(
          '_PADDING'  => 2,
          '_VERTICAL' => 0,
          'add' => array(
            'type'   => 'script',
            'title'  => 'LLL:EXT:org/locallang_db.xml:wizard.repertoire.add',
            'icon'   => 'add.gif',
            'params' => array(
              'table'    => 'tx_org_repertoire',
              'pid'      => $str_marker_pid,
              'setValue' => 'prepend'
            ),
            'script' => 'wizard_add.php',
          ),
          'list' => array(
            'type'   => 'script',
            'title'  => 'LLL:EXT:org/locallang_db.xml:wizard.repertoire.list',
            'icon'   => 'list.gif',
            'params' => array(
              'table' => 'tx_org_repertoire',
              'pid'   => $str_marker_pid,
            ),
            'script' => 'wizard_list.php',
          ),
          'edit' => array(
            'type'                      => 'popup',
            'title'                     => 'LLL:EXT:org/locallang_db.xml:wizard.repertoire.edit',
            'script'                    => 'wizard_edit.php',
            'popup_onlyOpenIfSelected'  => 1,
            'icon'                      => 'edit2.gif',
            'JSopenParams'              => $JSopenParams,
          ),
        ),
      ),
    ),
    'title' => array (
      'exclude' => 0,
      'label'   => 'LLL:EXT:org/locallang_db.xml:tx_org_cal.title',
      'config'  => $conf_input_30_trimRequired,
    ),
    'shortcut' => array (
      'exclude' => $bool_exclude_default,
      'label'   => 'LLL:EXT:org/locallang_db.xml:tx_org_cal.shortcut',
      'config'  => $conf_input_30_trim,
    ),
    'datetime' => array (
      'exclude' => $bool_exclude_default,
      'label'   => 'LLL:EXT:org/locallang_db.xml:tx_org_cal.datetime',
      'config'  => $conf_datetime,
    ),
    'caltype' => array (
      'exclude' => $bool_exclude_default,
      'label' => 'LLL:EXT:org/locallang_db.xml:tx_org_cal.caltype',
      'config' => array (
        'type' => 'select', 
        'size' => 10, 
        'minitems' => 0,
        'maxitems' => 1,
        'items' => array(
          '0' => array(
            '0' => '',
            '1' => '',
          ),
        ),
        'MM'                  => 'tx_org_cal_mm_caltype',
        'foreign_table'       => 'tx_org_caltype',
        'foreign_table_where' => 'AND tx_org_caltype.' . $str_store_record_conf . ' ORDER BY tx_org_caltype.title',
        'wizards' => array(
          '_PADDING'  => 2,
          '_VERTICAL' => 0,
          'add' => array(
            'type'   => 'script',
            'title'  => 'LLL:EXT:org/locallang_db.xml:wizard.caltype.add',
            'icon'   => 'add.gif',
            'params' => array(
              'table'    => 'tx_org_caltype',
              'pid'      => $str_marker_pid,
              'setValue' => 'prepend'
            ),
            'script' => 'wizard_add.php',
          ),
          'list' => array(
            'type'   => 'script',
            'title'  => 'LLL:EXT:org/locallang_db.xml:wizard.caltype.list',
            'icon'   => 'list.gif',
            'params' => array(
              'table' => 'tx_org_caltype',
              'pid'   => $str_marker_pid,
            ),
            'script' => 'wizard_list.php',
          ),
          'edit' => array(
            'type'                      => 'popup',
            'title'                     => 'LLL:EXT:org/locallang_db.xml:wizard.caltype.edit',
            'script'                    => 'wizard_edit.php',
            'popup_onlyOpenIfSelected'  => 1,
            'icon'                      => 'edit2.gif',
            'JSopenParams'              => $JSopenParams,
          ),
        ),
      ),
    ),
    'location' => array (
      'exclude' => $bool_exclude_default,
      'label'   => 'LLL:EXT:org/locallang_db.xml:tx_org_cal.location',
      'config'  => array (
        'type'                => 'select', 
        'size'                => $size_location,
        'minitems'            => 0,
        'maxitems'            => 1,
        'MM'                  => 'tx_org_cal_mm_location',
        'foreign_table'       => 'tx_org_location',
        'foreign_table_where' => 'AND tx_org_location.' . $str_store_record_conf . ' ORDER BY tx_org_location.title',
        'items' => array(
          '0' => array(
            '0' => '',
            '1' => '',
          ),
        ),
        'wizards' => array(
          '_PADDING'  => 2,
          '_VERTICAL' => 0,
          'add' => array(
            'type'   => 'script',
            'title'  => 'LLL:EXT:org/locallang_db.xml:wizard.location.add',
            'icon'   => 'add.gif',
            'params' => array(
              'table'    => 'tx_org_location',
              'pid'      => $str_marker_pid,
              'setValue' => 'prepend'
            ),
            'script' => 'wizard_add.php',
          ),
          'list' => array(
            'type'   => 'script',
            'title'  => 'LLL:EXT:org/locallang_db.xml:wizard.location.list',
            'icon'   => 'list.gif',
            'params' => array(
              'table' => 'tx_org_location',
              'pid'   => $str_marker_pid,
            ),
            'script' => 'wizard_list.php',
          ),
          'edit' => array(
            'type'                      => 'popup',
            'title'                     => 'LLL:EXT:org/locallang_db.xml:wizard.location.edit',
            'script'                    => 'wizard_edit.php',
            'popup_onlyOpenIfSelected'  => 1,
            'icon'                      => 'edit2.gif',
            'JSopenParams'              => $JSopenParams,
          ),
        ),
      ),
    ),
    'calentrance' => array (
      'exclude' => $bool_exclude_default,
      'label' => 'LLL:EXT:org/locallang_db.xml:tx_org_cal.calentrance',
      'config' => array (
        'type' => 'select', 
        'size' => 10, 
        'minitems' => 0,
        'maxitems' => 999,
        'MM'                  => 'tx_org_cal_mm_calentrance',
        'foreign_table'       => 'tx_org_calentrance',
        'foreign_table_where' => 'AND tx_org_calentrance.' . $str_store_record_conf . ' ORDER BY tx_org_calentrance.title',
        'wizards' => array(
          '_PADDING'  => 2,
          '_VERTICAL' => 0,
          'add' => array(
            'type'   => 'script',
            'title'  => 'LLL:EXT:org/locallang_db.xml:wizard.calentrance.add',
            'icon'   => 'add.gif',
            'params' => array(
              'table'    => 'tx_org_calentrance',
              'pid'      => $str_marker_pid,
              'setValue' => 'prepend'
            ),
            'script' => 'wizard_add.php',
          ),
          'list' => array(
            'type'   => 'script',
            'title'  => 'LLL:EXT:org/locallang_db.xml:wizard.calentrance.list',
            'icon'   => 'list.gif',
            'params' => array(
              'table' => 'tx_org_calentrance',
              'pid'   => $str_marker_pid,
            ),
            'script' => 'wizard_list.php',
          ),
          'edit' => array(
            'type'                      => 'popup',
            'title'                     => 'LLL:EXT:org/locallang_db.xml:wizard.calentrance.edit',
            'script'                    => 'wizard_edit.php',
            'popup_onlyOpenIfSelected'  => 1,
            'icon'                      => 'edit2.gif',
            'JSopenParams'              => $JSopenParams,
          ),
        ),
      ),
    ),
    'department' => array (
      'exclude' => $bool_exclude_default,
      'label'   => 'LLL:EXT:org/locallang_db.xml:tx_org_cal.department',
      'config'  => array (
        'type'                => 'select', 
        'size'                => $size_department,
        'minitems'            => 0,
        'maxitems'            => 999,
        'MM'                  => 'tx_org_department_mm_cal',
        'MM_opposite_field'   => 'calendar',
        'foreign_table'       => 'tx_org_department',
        'foreign_table_where' => 'AND tx_org_department.' . $str_store_record_conf . ' ORDER BY tx_org_department.title',
        'wizards' => array(
          '_PADDING'  => 2,
          '_VERTICAL' => 0,
          'add' => array(
            'type'   => 'script',
            'title'  => 'LLL:EXT:org/locallang_db.xml:wizard.department.add',
            'icon'   => 'add.gif',
            'params' => array(
              'table'    => 'tx_org_department',
              'pid'      => $str_marker_pid,
              'setValue' => 'prepend'
            ),
            'script' => 'wizard_add.php',
          ),
          'list' => array(
            'type'   => 'script',
            'title'  => 'LLL:EXT:org/locallang_db.xml:wizard.department.list',
            'icon'   => 'list.gif',
            'params' => array(
              'table' => 'tx_org_department',
              'pid'   => $str_marker_pid,
            ),
            'script' => 'wizard_list.php',
          ),
          'edit' => array(
            'type'                      => 'popup',
            'title'                     => 'LLL:EXT:org/locallang_db.xml:wizard.department.edit',
            'script'                    => 'wizard_edit.php',
            'popup_onlyOpenIfSelected'  => 1,
            'icon'                      => 'edit2.gif',
            'JSopenParams'              => $JSopenParams,
          ),
        ),
      ),
    ),
    'documents' => array (
      'exclude' => $bool_exclude_none,
      'label' => 'LLL:EXT:org/locallang_db.xml:tx_org_cal.documents',
      'config' => $conf_file_document,
    ),
    'hidden'    => $conf_hidden,
    'starttime' => $conf_starttime,
    'endtime'   => $conf_endtime,
    'fe_group'  => $conf_fegroup,
  ),

  'types' => array (
    '0' => array('showitem' =>  '--div--;LLL:EXT:org/locallang_db.xml:tx_org_cal.div_calendar,    repertoire,title,shortcut,datetime,caltype,'.
                                '--div--;LLL:EXT:org/locallang_db.xml:tx_org_cal.div_event,       location,calentrance,'.
                                '--div--;LLL:EXT:org/locallang_db.xml:tx_org_cal.div_department,  department,'.
                                '--div--;LLL:EXT:org/locallang_db.xml:tx_org_cal.div_media,       documents,'.
                                '--div--;LLL:EXT:org/locallang_db.xml:tx_org_cal.div_control,     hidden;;1;;,fe_group'.
                                ''),
  ),
  'palettes' => array (
    '1' => array('showitem' => 'starttime,endtime,'),
  )
);

if(!$bool_full_wizardSupport_catTables)
{
  unset($TCA['tx_org_cal']['columns']['calentrance']['config']['wizards']['add']);
  unset($TCA['tx_org_cal']['columns']['calentrance']['config']['wizards']['list']);
  unset($TCA['tx_org_cal']['columns']['caltype']['config']['wizards']['add']);
  unset($TCA['tx_org_cal']['columns']['caltype']['config']['wizards']['list']);
}
if(!$bool_full_wizardSupport_allTables)
{
  unset($TCA['tx_org_cal']['columns']['location']['config']['wizards']['add']);
  unset($TCA['tx_org_cal']['columns']['location']['config']['wizards']['list'] );
  unset($TCA['tx_org_cal']['columns']['department']['config']['wizards']['add']);
  unset($TCA['tx_org_cal']['columns']['department']['config']['wizards']['list'] );
  unset($TCA['tx_org_cal']['columns']['repertoire']['config']['wizards']['add']);
  unset($TCA['tx_org_cal']['columns']['repertoire']['config']['wizards']['list'] );
}
  // tx_org_cal - without any localisation support



  /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
  //
  // tx_org_calentrance - without any localisation support

$TCA['tx_org_calentrance'] = array (
  'ctrl' => $TCA['tx_org_calentrance']['ctrl'],
  'interface' => array (
    'showRecordFieldList' =>  'title,value,tax,'.
                              'hidden,starttime,endtime,fe_group'
  ),
  'feInterface' => $TCA['tx_org_calentrance']['feInterface'],
  'columns' => array (
    'title' => array (
      'exclude' => 0,
      'label'   => 'LLL:EXT:org/locallang_db.xml:tx_org_calentrance.title',
      'config'  => $conf_input_30_trimRequired,
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
    'tax' => array (
      'exclude'   => $bool_exclude_default,
      'l10n_mode' => 'mergeIfNotBlank',
      'label'   => 'LLL:EXT:org/locallang_db.xml:tx_org_calentrance.tax',
      'config'    => array (
        'type'      => 'select',
        'size'      => 3,
        'maxitems'  => 1,
        'eval'      => 'required',
        'foreign_table' => 'tx_org_tax'
      )
    ),
    'hidden'    => $conf_hidden,
    'starttime' => $conf_starttime,
    'endtime'   => $conf_endtime,
    'fe_group'  => $conf_fegroup,
  ),

  'types' => array (
    '0' => array('showitem' =>  '--div--;LLL:EXT:org/locallang_db.xml:tx_org_calentrance.div_calentrance, title,value,tax,'.
                                '--div--;LLL:EXT:org/locallang_db.xml:tx_org_calentrance.div_control,     hidden;;1;;,fe_group'.
                                ''),
  ),
  'palettes' => array (
    '1' => array('showitem' => 'starttime,endtime,'),
  )
);
  // tx_org_calentrance - without any localisation support



  /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
  //
  // tx_org_caltype - without any localisation support

$TCA['tx_org_caltype'] = array (
  'ctrl' => $TCA['tx_org_caltype']['ctrl'],
  'interface' => array (
    'showRecordFieldList' =>  'title,'.
                              'calendar,'.
                              'hidden'
  ),
  'feInterface' => $TCA['tx_org_caltype']['feInterface'],
  'columns' => array (
    'title' => array (
      'exclude' => 0,
      'label' => 'LLL:EXT:org/locallang_db.xml:tx_org_caltype.title',
      'config'  => $conf_input_30_trimRequired,
    ),
    'calendar' => array (
      'exclude' => $bool_exclude_default,
      'label'   => 'LLL:EXT:org/locallang_db.xml:tx_org_caltype.calendar',
      'config'  => array (
        'type'                => 'select', 
        'size'                => $size_calendar, 
        'minitems'            => 0,
        'maxitems'            => 999,
        'MM'                  => 'tx_org_cal_mm_caltype',
        'MM_opposite_field'   => 'caltype',
        'foreign_table'       => 'tx_org_cal',
        'foreign_table_where' => 'AND tx_org_cal.' . $str_store_record_conf . ' ORDER BY tx_org_cal.datetime DESC, title',
        'wizards' => array(
          '_PADDING'  => 2,
          '_VERTICAL' => 0,
          'add' => array(
            'type'   => 'script',
            'title'  => 'LLL:EXT:org/locallang_db.xml:wizard.caltype.add',
            'icon'   => 'add.gif',
            'params' => array(
              'table'    => 'tx_org_cal',
              'pid'      => $str_marker_pid,
              'setValue' => 'prepend'
            ),
            'script' => 'wizard_add.php',
          ),
          'list' => array(
            'type'   => 'script',
            'title'  => 'LLL:EXT:org/locallang_db.xml:wizard.caltype.list',
            'icon'   => 'list.gif',
            'params' => array(
              'table' => 'tx_org_cal',
              'pid'   => $str_marker_pid,
            ),
            'script' => 'wizard_list.php',
          ),
          'edit' => array(
            'type'                      => 'popup',
            'title'                     => 'LLL:EXT:org/locallang_db.xml:wizard.caltype.edit',
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
    '0' => array('showitem' =>  '--div--;LLL:EXT:org/locallang_db.xml:tx_org_caltype.div_caltype,    title,'.
                                '--div--;LLL:EXT:org/locallang_db.xml:tx_org_caltype.div_calendar,    calendar,'.
                                '--div--;LLL:EXT:org/locallang_db.xml:tx_org_caltype.div_control,     hidden'.
                                ''),
  ),
);
if(!$bool_full_wizardSupport_catTables)
{
  unset($TCA['tx_org_caltype']['columns']['calendar']['config']['wizards']['add']);
  unset($TCA['tx_org_caltype']['columns']['calendar']['config']['wizards']['list'] );
}
  // tx_org_caltype - without any localisation support



  /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
  // 
  // tx_org_headquarters
  
  // tx_org_headquarters - without any localisation support
$TCA['tx_org_headquarters'] = array (
  'ctrl' => $TCA['tx_org_headquarters']['ctrl'],
  'interface' => array (
  
    'showRecordFieldList' =>  'title,mail_address,mail_postcode,mail_city,mail_url,mail_embeddedcode,postbox_postbox,postbox_postcode,postbox_city,'.
                              'telephone,fax,email,'.
                              'pubtrans_stop,pubtrans_url,pubtrans_embeddedcode,'.
                              'image,imagecaption,imageseo,embeddedcode,documents,'.
                              'department,'.
                              'hidden,pages,fe_group,'.
                              'keywords,description',
  ),
  'feInterface' => $TCA['tx_org_headquarters']['feInterface'],
  'columns' => array (
    'title' => array (
      'exclude' => 0,
      'label'   => 'LLL:EXT:org/locallang_db.xml:tx_org_headquarters.title',
      'config'  => $conf_input_30_trimRequired,
    ),
    'mail_address' => array (
      'label'   => 'LLL:EXT:org/locallang_db.xml:tx_org_headquarters.mail_address',
      'exclude' => $bool_exclude_default,
      'config'  => $conf_text_30_05_trimRequired,
    ),
    'mail_postcode' => array (
      'label'   => 'LLL:EXT:org/locallang_db.xml:tx_org_headquarters.mail_postcode',
      'exclude' => $bool_exclude_default,
      'config'  => $conf_input_30_trimRequired,
    ),
    'mail_city' => array (
      'label'   => 'LLL:EXT:org/locallang_db.xml:tx_org_headquarters.mail_city',
      'exclude' => $bool_exclude_default,
      'config'  => $conf_input_30_trimRequired,
    ),
    'mail_url' => array (
      'label'   => 'LLL:EXT:org/locallang_db.xml:tx_org_headquarters.mail_url',
      'exclude' => $bool_exclude_default,
      'config'  => $arr_wizard_url,
    ),
    'mail_embeddedcode' => array (
      'label'   => 'LLL:EXT:org/locallang_db.xml:tx_org_headquarters.mail_embeddedcode',
      'exclude' => $bool_exclude_default,
      'config'  => $conf_text_50_10,
    ),
    'postbox_postbox' => array (
      'label'   => 'LLL:EXT:org/locallang_db.xml:tx_org_headquarters.postbox_postbox',
      'exclude' =>  $bool_exclude_default,
      'config'  => $conf_text_30_05,
    ),
    'postbox_postcode' => array (
      'label'   => 'LLL:EXT:org/locallang_db.xml:tx_org_headquarters.postbox_postcode',
      'exclude' => $bool_exclude_default,
      'config'  => $conf_input_30_trim,
    ),
    'postbox_city' => array (
      'label'   => 'LLL:EXT:org/locallang_db.xml:tx_org_headquarters.postbox_city',
      'exclude' => $bool_exclude_default,
      'config'  => $conf_input_30_trim,
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
      'label'   => 'LLL:EXT:org/locallang_db.xml:tx_org_headquarters.pubtrans_stop',
      'exclude' => $bool_exclude_default,
      'config'  => $conf_text_rte,
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
    'department' => array (
      'exclude' => $bool_exclude_default,
      'label'   => 'LLL:EXT:org/locallang_db.xml:tx_org_headquarters.department',
      'config'  => array (
        'type'                => 'select', 
        'size'                => $size_department,
        'minitems'            => 0,
        'maxitems'            => 999,
        'MM'                  => 'tx_org_headquarters_mm_org',
        'foreign_table'       => 'tx_org_department',
        'foreign_table_where' => 'AND tx_org_department.' . $str_store_record_conf . ' ORDER BY tx_org_department.sorting',
        'wizards' => array(
          '_PADDING'  => 2,
          '_VERTICAL' => 0,
          'add' => array(
            'type'   => 'script',
            'title'  => 'LLL:EXT:org/locallang_db.xml:wizard.department.add',
            'icon'   => 'add.gif',
            'params' => array(
              'table'    => 'tx_org_department',
              'pid'      => $str_marker_pid,
              'setValue' => 'prepend'
            ),
            'script' => 'wizard_add.php',
          ),
          'list' => array(
            'type'   => 'script',
            'title'  => 'LLL:EXT:org/locallang_db.xml:wizard.department.list',
            'icon'   => 'list.gif',
            'params' => array(
              'table' => 'tx_org_department',
              'pid'   => $str_marker_pid,
            ),
            'script' => 'wizard_list.php',
          ),
          'edit' => array(
            'type'                      => 'popup',
            'title'                     => 'LLL:EXT:org/locallang_db.xml:wizard.department.edit',
            'script'                    => 'wizard_edit.php',
            'popup_onlyOpenIfSelected'  => 1,
            'icon'                      => 'edit2.gif',
            'JSopenParams'              => $JSopenParams,
          ),
        ),
      )
    ),
    'image' => array (
      'exclude' => $bool_exclude_default,
      'label'   => 'LLL:EXT:org/locallang_db.xml:tca_phrase.image',
      'config'  => $conf_file_image,
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
    'embeddedcode' => array (
      'label'   => 'LLL:EXT:org/locallang_db.xml:tca_phrase.embeddedcode',
      'exclude' => $bool_exclude_default,
      'config'  => $conf_text_50_10,
    ),
    'documents' => array (
      'exclude' => $bool_exclude_default,
      'label'   => 'LLL:EXT:org/locallang_db.xml:tca_phrase.documents',
      'config'  => $conf_file_document,
    ),
    'hidden'    => $conf_hidden,
    'pages'     => $conf_pages,
    'fe_group'  => $conf_fegroup,
    'keywords' => array (
      'label'   => 'LLL:EXT:org/locallang_db.xml:tca_phrase.keywords',
      'exclude' => $bool_exclude_default,
      'config'  => $conf_input_80_trim,
    ),
    'description' => array (
      'label'   => 'LLL:EXT:org/locallang_db.xml:tca_phrase.description',
      'exclude' => $bool_exclude_default,
      'config'  => $conf_text_50_10,
    ),
  ),
  'types' => array (
    '0' => array('showitem' =>  '--div--;LLL:EXT:org/locallang_db.xml:tx_org_headquarters.div_headquarters, title,mail_address,mail_postcode,mail_city,mail_url,mail_embeddedcode,postbox_postbox;;;;3-3-3,postbox_postcode,postbox_city,'.
                                '--div--;LLL:EXT:org/locallang_db.xml:tx_org_headquarters.div_contact,      telephone,fax,email,'.
                                '--div--;LLL:EXT:org/locallang_db.xml:tx_org_headquarters.div_department,   department,'.
                                '--div--;LLL:EXT:org/locallang_db.xml:tx_org_headquarters.div_pubtrans,     pubtrans_stop;;;richtext[]:rte_transform[mode=ts];4-4-4,pubtrans_url,pubtrans_embeddedcode,'.
                                '--div--;LLL:EXT:org/locallang_db.xml:tx_org_headquarters.div_media,        image;;;;6-6-6, imagecaption;;3;;, embeddedcode, documents,'.
                                '--div--;LLL:EXT:org/locallang_db.xml:tx_org_headquarters.div_control,      hidden,pages,fe_group,'.
                                '--div--;LLL:EXT:org/locallang_db.xml:tx_org_headquarters.div_seo,          keywords, description,'.
                                ''),
  ),
  'palettes' => array (
    '3' => array('showitem' => 'imageseo'),
  )
);
if(!$bool_full_wizardSupport_allTables)
{
  unset($TCA['tx_org_headquarters']['columns']['department']['config']['wizards']['add']);
  unset($TCA['tx_org_headquarters']['columns']['department']['config']['wizards']['list'] );
}
  // tx_org_headquarters - without any localisation support



  /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
  // 
  // tx_org_location
  
  // tx_org_location - without any localisation support
$TCA['tx_org_location'] = array (
  'ctrl' => $TCA['tx_org_location']['ctrl'],
  'interface' => array (
  
    'showRecordFieldList' =>  'title,url,mail_address,mail_postcode,mail_city,mail_url,mail_embeddedcode,'.
                              'telephone,ticket_telephone,ticket_url,fax,email,'.
                              'calendar,'.
                              'pubtrans_stop,pubtrans_url,pubtrans_embeddedcode,citymap_url,citymap_embeddedcode,'.
                              'image,imagecaption,imageseo,embeddedcode,documents,'.
                              'hidden,pages,fe_group,'.
                              'keywords,description',
  ),
  'feInterface' => $TCA['tx_org_location']['feInterface'],
  'columns' => array (
    'title' => array (
      'exclude' => 0,
      'label'   => 'LLL:EXT:org/locallang_db.xml:tx_org_location.title',
      'config'  => $conf_input_30_trimRequired,
    ),
    'url' => array (
      'label' => 'LLL:EXT:org/locallang_db.xml:tx_org_location.url',
      'exclude' => $bool_exclude_default,
      'config' => $arr_wizard_url,
    ),
    'mail_address' => array (
      'label'   => 'LLL:EXT:org/locallang_db.xml:tx_org_location.mail_address',
      'exclude' => $bool_exclude_default,
      'config'  => $conf_text_30_05,
    ),
    'mail_postcode' => array (
      'label'   => 'LLL:EXT:org/locallang_db.xml:tx_org_location.mail_postcode',
      'exclude' => $bool_exclude_default,
      'config'  => $conf_input_30_trim,
    ),
    'mail_city' => array (
      'label' => 'LLL:EXT:org/locallang_db.xml:tx_org_location.mail_city',
      'exclude' => $bool_exclude_default,
      'config'  => $conf_input_30_trim,
    ),
    'mail_url' => array (
      'label' => 'LLL:EXT:org/locallang_db.xml:tx_org_location.mail_url',
      'exclude' => $bool_exclude_default,
      'config' => $arr_wizard_url,
    ),
    'mail_embeddedcode' => array (
      'label'   => 'LLL:EXT:org/locallang_db.xml:tx_org_location.mail_embeddedcode',
      'exclude' => $bool_exclude_default,
      'config'  => $conf_text_50_10,
    ),
    'telephone' => array (
      'label'   => 'LLL:EXT:org/locallang_db.xml:tx_org_location.telephone',
      'exclude' => $bool_exclude_default,
      'config'  => $conf_input_30_trim,
    ),
    'ticket_telephone' => array (
      'label'   => 'LLL:EXT:org/locallang_db.xml:tx_org_location.ticket_telephone',
      'exclude' => $bool_exclude_default,
      'config'  => $conf_input_30_trim,
    ),
    'ticket_url' => array (
      'label'   => 'LLL:EXT:org/locallang_db.xml:tx_org_location.ticket_url',
      'exclude' => $bool_exclude_default,
      'config'  => $arr_wizard_url,
    ),
    'fax' => array (
      'label' => 'LLL:EXT:org/locallang_db.xml:tx_org_location.fax',
      'exclude' => $bool_exclude_default,
      'config'  => $conf_input_30_trim,
    ),
    'email' => array (
      'label' => 'LLL:EXT:org/locallang_db.xml:tx_org_location.email',
      'exclude' => $bool_exclude_default,
      'config'  => $conf_input_30_trim,
    ),
    'calendar' => array (
      'exclude' => $bool_exclude_default,
      'label' => 'LLL:EXT:org/locallang_db.xml:tx_org_location.calendar',
      'config' => array (
        'type'                => 'select', 
        'size'                => $size_calendar,
        'minitems'            => 0,
        'maxitems'            => 999,
        'MM'                  => 'tx_org_cal_mm_location',
        'MM_opposite_field'   => 'location',
        'foreign_table'       => 'tx_org_cal',
        'foreign_table_where' => 'AND tx_org_cal.' . $str_store_record_conf . ' ORDER BY tx_org_cal.datetime DESC, title',
        'wizards' => array(
          '_PADDING'  => 2,
          '_VERTICAL' => 0,
          'add' => array(
            'type'   => 'script',
            'title'  => 'LLL:EXT:org/locallang_db.xml:wizard.calendar.add',
            'icon'   => 'add.gif',
            'params' => array(
              'table'    => 'tx_org_cal',
              'pid'      => $str_marker_pid,
              'setValue' => 'prepend'
            ),
            'script' => 'wizard_add.php',
          ),
          'list' => array(
            'type'   => 'script',
            'title'  => 'LLL:EXT:org/locallang_db.xml:wizard.calendar.list',
            'icon'   => 'list.gif',
            'params' => array(
              'table' => 'tx_org_cal',
              'pid'   => $str_marker_pid,
            ),
            'script' => 'wizard_list.php',
          ),
          'edit' => array(
            'type'                      => 'popup',
            'title'                     => 'LLL:EXT:org/locallang_db.xml:wizard.calendar.edit',
            'script'                    => 'wizard_edit.php',
            'popup_onlyOpenIfSelected'  => 1,
            'icon'                      => 'edit2.gif',
            'JSopenParams'              => $JSopenParams,
          ),
        ),
      ),
    ),
    'pubtrans_stop' => array (
      'label' => 'LLL:EXT:org/locallang_db.xml:tx_org_location.pubtrans_stop',
      'exclude' => $bool_exclude_default,
      'config'  => $conf_text_rte,
    ),
    'pubtrans_url' => array (
      'label'   => 'LLL:EXT:org/locallang_db.xml:tx_org_location.pubtrans_url',
      'exclude' => $bool_exclude_default,
      'config'  => $arr_wizard_url,
    ),
    'pubtrans_embeddedcode' => array (
      'label'   => 'LLL:EXT:org/locallang_db.xml:tx_org_location.pubtrans_embeddedcode',
      'exclude' => $bool_exclude_default,
      'config'  => $conf_text_50_10,
    ),
    'citymap_url' => array (
      'label'   => 'LLL:EXT:org/locallang_db.xml:tx_org_location.citymap_url',
      'exclude' => $bool_exclude_default,
      'config'  => $arr_wizard_url,
    ),
    'citymap_embeddedcode' => array (
      'label'   => 'LLL:EXT:org/locallang_db.xml:tx_org_location.citymap_embeddedcode',
      'exclude' => $bool_exclude_default,
      'config'  => $conf_text_30_05,
    ),
    'image' => array (
      'exclude' => $bool_exclude_default,
      'label' => 'LLL:EXT:org/locallang_db.xml:tca_phrase.image',
      'config' => $conf_file_image,
    ),
    'imagecaption' => array (
      'exclude' => $bool_exclude_default,
      'label' => 'LLL:EXT:org/locallang_db.xml:tca_phrase.imagecaption',
      'config' => $conf_text_30_05,
    ),
    'imageseo' => array (
      'exclude' => $bool_exclude_default,
      'label'   => 'LLL:EXT:org/locallang_db.xml:tca_phrase.imageseo',
      'config'  => $conf_text_30_05,
    ),
    'embeddedcode' => array (
      'label'   => 'LLL:EXT:org/locallang_db.xml:tca_phrase.embeddedcode',
      'exclude' => $bool_exclude_default,
      'config'  => $conf_text_50_10,
    ),
    'documents' => array (
      'exclude' => $bool_exclude_default,
      'label'   => 'LLL:EXT:org/locallang_db.xml:tca_phrase.documents',
      'config'  => $conf_file_document,
    ),
    'hidden'    => $conf_hidden,
    'pages'     => $conf_pages,
    'fe_group'  => $conf_fegroup,
    'keywords'  => array (
      'label'   => 'LLL:EXT:org/locallang_db.xml:tca_phrase.keywords',
      'exclude' => $bool_exclude_default,
      'config'  => $conf_input_80_trim,
    ),
    'description' => array (
      'label'   => 'LLL:EXT:org/locallang_db.xml:tca_phrase.description',
      'exclude' => $bool_exclude_default,
      'config'  => $conf_text_50_10,
    ),
  ),
  'types' => array (
    '0' => array('showitem' =>  '--div--;LLL:EXT:org/locallang_db.xml:tx_org_location.div_location,     title,url,mail_address;;;;2-2-2,mail_postcode,mail_city,mail_url,mail_embeddedcode,'.
                                '--div--;LLL:EXT:org/locallang_db.xml:tx_org_location.div_contact,      telephone,ticket_telephone,ticket_url,fax,email,'.
                                '--div--;LLL:EXT:org/locallang_db.xml:tx_org_location.div_calendar,     calendar,'.
                                '--div--;LLL:EXT:org/locallang_db.xml:tx_org_location.div_pubtrans,     pubtrans_stop;;;richtext[]:rte_transform[mode=ts];4-4-4,pubtrans_url,pubtrans_embeddedcode,citymap_url;;;;5-5-5,citymap_embeddedcode,'.
                                '--div--;LLL:EXT:org/locallang_db.xml:tx_org_location.div_media,        image;;;;6-6-6, imagecaption;;3;;, embeddedcode, documents,'.
                                '--div--;LLL:EXT:org/locallang_db.xml:tx_org_location.div_control,      hidden,pages,fe_group,'.
                                '--div--;LLL:EXT:org/locallang_db.xml:tx_org_location.div_seo,          keywords, description,'.
                                ''),
  ),
  'palettes' => array (
    '3' => array('showitem' => 'imageseo'),
  )
);
if(!$bool_full_wizardSupport_allTables)
{
  unset($TCA['tx_org_location']['columns']['calendar']['config']['wizards']['add']);
  unset($TCA['tx_org_location']['columns']['calendar']['config']['wizards']['list'] );
}
  // tx_org_location - without any localisation support



  /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
  //
  // tx_org_department - without any localisation support

$TCA['tx_org_department'] = array (
  'ctrl' => $TCA['tx_org_department']['ctrl'],
  'interface' => array (
    'showRecordFieldList' =>  'title,shortcut,departmentcat,headquarters,'.
                              'manager,telephone,fax,email,url,'.
                              'fe_users,'.
                              'calendar,'.
                              'documents,news,'.
                              'image,imagecaption,imageseo,embeddedcode,'.
                              'hidden,pages,fe_group,'.
                              'keywords,description',
  ),
  'feInterface' => $TCA['tx_org_department']['feInterface'],
  'columns' => array (
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
    'departmentcat' => array (
      'exclude' => $bool_exclude_default,
      'label' => 'LLL:EXT:org/locallang_db.xml:tx_org_department.departmentcat',
      'config' => array (
        'type' => 'select', 
        'size' => 10, 
        'minitems' => 0,
        'maxitems' => 1,
        'MM'                  => 'tx_org_department_mm_departmentcat',
        'foreign_table'       => 'tx_org_departmentcat',
        'foreign_table_where' => 'AND tx_org_departmentcat.' . $str_store_record_conf . ' ORDER BY tx_org_departmentcat.sorting',
        'wizards' => array(
          '_PADDING'  => 2,
          '_VERTICAL' => 0,
          'add' => array(
            'type'   => 'script',
            'title'  => 'LLL:EXT:org/locallang_db.xml:wizard.departmentcat.add',
            'icon'   => 'add.gif',
            'params' => array(
              'table'    => 'tx_org_departmentcat',
              'pid'      => $str_marker_pid,
              'setValue' => 'prepend'
            ),
            'script' => 'wizard_add.php',
          ),
          'list' => array(
            'type'   => 'script',
            'title'  => 'LLL:EXT:org/locallang_db.xml:wizard.departmentcat.list',
            'icon'   => 'list.gif',
            'params' => array(
              'table' => 'tx_org_departmentcat',
              'pid'   => $str_marker_pid,
            ),
            'script' => 'wizard_list.php',
          ),
          'edit' => array(
            'type'                      => 'popup',
            'title'                     => 'LLL:EXT:org/locallang_db.xml:wizard.departmentcat.edit',
            'script'                    => 'wizard_edit.php',
            'popup_onlyOpenIfSelected'  => 1,
            'icon'                      => 'edit2.gif',
            'JSopenParams'              => $JSopenParams,
          ),
        ),
      ),
    ),
    'headquarters' => array (
      'exclude' => $bool_exclude_default,
      'label' => 'LLL:EXT:org/locallang_db.xml:tx_org_department.headquarters',
      'config'                => array (
        'type'                => 'select', 
        'size'                => $size_department,
        'minitems'            => 0,
        'maxitems'            => 1,
        'MM'                  => 'tx_org_headquarters_mm_org',
        'MM_opposite_field'   => 'department',
        'foreign_table'       => 'tx_org_headquarters',
        'foreign_table_where' => 'AND tx_org_headquarters.' . $str_store_record_conf . ' ORDER BY tx_org_headquarters.sorting',
        'wizards' => array(
          '_PADDING'  => 2,
          '_VERTICAL' => 0,
          'add' => array(
            'type'   => 'script',
            'title'  => 'LLL:EXT:org/locallang_db.xml:wizard.headquarters.add',
            'icon'   => 'add.gif',
            'params' => array(
              'table'    => 'tx_org_headquarters',
              'pid'      => $str_marker_pid,
              'setValue' => 'prepend'
            ),
            'script' => 'wizard_add.php',
          ),
          'list' => array(
            'type'   => 'script',
            'title'  => 'LLL:EXT:org/locallang_db.xml:wizard.headquarters.list',
            'icon'   => 'list.gif',
            'params' => array(
              'table' => 'tx_org_headquarters',
              'pid'   => $str_marker_pid,
            ),
            'script' => 'wizard_list.php',
          ),
          'edit' => array(
            'type'                      => 'popup',
            'title'                     => 'LLL:EXT:org/locallang_db.xml:wizard.headquarters.edit',
            'script'                    => 'wizard_edit.php',
            'popup_onlyOpenIfSelected'  => 1,
            'icon'                      => 'edit2.gif',
            'JSopenParams'              => $JSopenParams,
          ),
        ),
      ),
    ),
    'manager' => array (
      'exclude' => $bool_exclude_default,
      'label' => 'LLL:EXT:org/locallang_db.xml:tx_org_department.manager',
      'config' => $arr_config_feuser,
    ),
    'fe_users' => array (
      'exclude' => $bool_exclude_default,
      'label'   => 'LLL:EXT:org/locallang_db.xml:tx_org_department.fe_users',
      'config'  => array (
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
    'calendar' => array (
      'exclude' => $bool_exclude_default,
      'label'   => 'LLL:EXT:org/locallang_db.xml:tx_org_department.calendar',
      'config'  => array (
        'type'                => 'select', 
        'size'                => $size_calendar,
        'minitems'            => 0,
        'maxitems'            => 999,
        'MM'                  => 'tx_org_department_mm_cal',
        'foreign_table'       => 'tx_org_cal',
        'foreign_table_where' => 'AND tx_org_cal.' . $str_store_record_conf . ' ORDER BY tx_org_cal.datetime DESC, title',
        'wizards' => array(
          '_PADDING'  => 2,
          '_VERTICAL' => 0,
          'add' => array(
            'type'   => 'script',
            'title'  => 'LLL:EXT:org/locallang_db.xml:wizard.calendar.add',
            'icon'   => 'add.gif',
            'params' => array(
              'table'    => 'tx_org_cal',
              'pid'      => $str_marker_pid,
              'setValue' => 'prepend'
            ),
            'script' => 'wizard_add.php',
          ),
          'list' => array(
            'type'   => 'script',
            'title'  => 'LLL:EXT:org/locallang_db.xml:wizard.calendar.list',
            'icon'   => 'list.gif',
            'params' => array(
              'table' => 'tx_org_cal',
              'pid'   => $str_marker_pid,
            ),
            'script' => 'wizard_list.php',
          ),
          'edit' => array(
            'type'                      => 'popup',
            'title'                     => 'LLL:EXT:org/locallang_db.xml:wizard.calendar.edit',
            'script'                    => 'wizard_edit.php',
            'popup_onlyOpenIfSelected'  => 1,
            'icon'                      => 'edit2.gif',
            'JSopenParams'              => $JSopenParams,
          ),
        ),
      ),
    ),
    'telephone' => array (
      'label' => 'LLL:EXT:org/locallang_db.xml:tx_org_department.telephone',
      'exclude' => $bool_exclude_default,
      'config'  => $conf_input_30_trim,
    ),
    'fax' => array (
      'label' => 'LLL:EXT:org/locallang_db.xml:tx_org_department.fax',
      'exclude' => $bool_exclude_default,
      'config'  => $conf_input_30_trim,
    ),
    'email' => array (
      'label' => 'LLL:EXT:org/locallang_db.xml:tx_org_department.email',
      'exclude' => $bool_exclude_default,
      'config'  => $conf_input_30_trim,
    ),
    'url' => array (
      'label'   => 'LLL:EXT:org/locallang_db.xml:tx_org_department.url',
      'exclude' => $bool_exclude_default,
      'config'  => $arr_wizard_url,
    ),
    'documents' => array (
      'exclude' => $bool_exclude_default,
      'label'   => 'LLL:EXT:org/locallang_db.xml:tca_phrase.documents',
      'config'  => $conf_file_document,
    ),
    'news' => array (
      'exclude' => $bool_exclude_default,
      'label'   => 'LLL:EXT:org/locallang_db.xml:tca_phrase.news',
      'config'  => array (
        'type'                => 'select', 
        'size'                => $size_news,
        'minitems'            => 0,
        'maxitems'            => 999,
        'MM'                  => 'tx_org_department_mm_news',
        'foreign_table'       => 'tx_org_news',
        'foreign_table_where' => 'AND tx_org_news.' . $str_store_record_conf . ' ORDER BY tx_org_news.datetime DESC, title',
        'wizards' => array(
          '_PADDING'  => 2,
          '_VERTICAL' => 0,
          'add' => array(
            'type'   => 'script',
            'title'  => 'LLL:EXT:org/locallang_db.xml:wizard.news.add',
            'icon'   => 'add.gif',
            'params' => array(
              'table'    => 'tx_org_news',
              'pid'      => $str_marker_pid,
              'setValue' => 'prepend'
            ),
            'script' => 'wizard_add.php',
          ),
          'list' => array(
            'type'   => 'script',
            'title'  => 'LLL:EXT:org/locallang_db.xml:wizard.news.list',
            'icon'   => 'list.gif',
            'params' => array(
              'table' => 'tx_org_news',
              'pid'   => $str_marker_pid,
            ),
            'script' => 'wizard_list.php',
          ),
          'edit' => array(
            'type'                      => 'popup',
            'title'                     => 'LLL:EXT:org/locallang_db.xml:wizard.news.edit',
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
      'exclude' => $bool_exclude_default,
      'label'   => 'LLL:EXT:org/locallang_db.xml:tca_phrase.imagecaption',
      'config'  => $conf_text_30_05,
    ),
    'imageseo' => array (
      'exclude' => $bool_exclude_default,
      'label'   => 'LLL:EXT:org/locallang_db.xml:tca_phrase.imageseo',
      'config'  => $conf_text_30_05,
    ),
    'embeddedcode' => array (
      'label'   => 'LLL:EXT:org/locallang_db.xml:tca_phrase.embeddedcode',
      'exclude' => $bool_exclude_default,
      'config'  => $conf_text_50_10,
    ),
    'hidden'    => $conf_hidden,
    'pages'     => $conf_pages,
    'fe_group'  => $conf_fegroup,
    'keywords' => array (
      'label'   => 'LLL:EXT:org/locallang_db.xml:tca_phrase.keywords',
      'exclude' => $bool_exclude_default,
      'config'  => $conf_input_80_trim,
    ),
    'description' => array (
      'label'   => 'LLL:EXT:org/locallang_db.xml:tca_phrase.description',
      'exclude' => $bool_exclude_default,
      'config'  => $conf_text_50_10,
    ),
  ),
  'types' => array (
    '0' => array('showitem' =>  '--div--;LLL:EXT:org/locallang_db.xml:tx_org_department.div_department, title;;1;;1-1-1,departmentcat,headquarters,'.
                                '--div--;LLL:EXT:org/locallang_db.xml:tx_org_department.div_contact,    manager,telephone,fax,email,url,'.
                                '--div--;LLL:EXT:org/locallang_db.xml:tx_org_department.div_staff,      fe_users;;;;3-3-3,'.
                                '--div--;LLL:EXT:org/locallang_db.xml:tx_org_department.div_calendar,   calendar;;;;5-5-5,'.
                                '--div--;LLL:EXT:org/locallang_db.xml:tx_org_department.div_doc,        documents,news,'.
                                '--div--;LLL:EXT:org/locallang_db.xml:tx_org_department.div_media,      image;;;;4-4-4, imagecaption;;3;;, embeddedcode,'.
                                '--div--;LLL:EXT:org/locallang_db.xml:tx_org_department.div_control,    hidden,pages,fe_group,'.
                                '--div--;LLL:EXT:org/locallang_db.xml:tx_org_department.div_seo,        keywords, description,'.
                                ''),
  ),
  'palettes' => array (
    '1' => array('showitem' => 'shortcut'),
    '3' => array('showitem' => 'imageseo'),
  )
);
$TCA['tx_org_department']['columns']['manager']['config']['size']      = 1;
$TCA['tx_org_department']['columns']['manager']['config']['maxitems']  = 1;

if(!$bool_full_wizardSupport_catTables)
{
  unset($TCA['tx_org_department']['columns']['departmentcat']['config']['wizards']['add']);
  unset($TCA['tx_org_department']['columns']['departmentcat']['config']['wizards']['list']);
}
if(!$bool_full_wizardSupport_allTables)
{
  unset($TCA['tx_org_department']['columns']['calendar']['config']['wizards']['add']);
  unset($TCA['tx_org_department']['columns']['calendar']['config']['wizards']['list'] );
  unset($TCA['tx_org_department']['columns']['department']['config']['wizards']['add']);
  unset($TCA['tx_org_department']['columns']['department']['config']['wizards']['list'] );
  unset($TCA['tx_org_department']['columns']['news']['config']['wizards']['add']);
  unset($TCA['tx_org_department']['columns']['news']['config']['wizards']['list'] );
}
  // tx_org_department - without any localisation support



  /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
  // 
  // tx_org_departmentcat
  
  // Non localized
$TCA['tx_org_departmentcat'] = array (
  'ctrl' => $TCA['tx_org_departmentcat']['ctrl'],
  'interface' => array (
    'showRecordFieldList' =>  'title,'.
                              'hidden,'.
                              'image,imagecaption,imageseo',
  ),
  'columns' => array (
    'title' => array (
      'exclude' => 0,
      'label'   => 'LLL:EXT:org/locallang_db.xml:tx_org_departmentcat.title',
      'config'  => $conf_input_30_trimRequired,
    ),
    'hidden'    => $conf_hidden,
  ),
  'types' => array (
    '0' => array('showitem' =>  '--div--;LLL:EXT:org/locallang_db.xml:tx_org_departmentcat.div_cat,     title;;;;1-1-1,'.
                                '--div--;LLL:EXT:org/locallang_db.xml:tx_org_departmentcat.div_control, hidden')
  ),
  'palettes' => array (
  )
);
  // Non localized



  /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
  // 
  // tx_org_news
  
  // Non localized
$TCA['tx_org_news'] = array (
  'ctrl' => $TCA['tx_org_news']['ctrl'],
  'interface' => array (
    'showRecordFieldList' =>  'title,subtitle,datetime,newscat,bodytext,'.
                              'fe_user,'.
                              'department,'.
                              'repertoire,'.
                              'image,imagecaption,imageseo,embeddedcode,'.
                              'hidden,topnews,pages,starttime,endtime,fe_group,'.
                              'keywords,description,'.
                              'teaser_title,teaser_subtitle,teaser_short',
  ),
  'feInterface' => $TCA['tx_org_news']['feInterface'],
  'columns' => array (
    'title' => array (
      'exclude'   => 0,
      'label'     => 'LLL:EXT:org/locallang_db.xml:tx_org_news.title',
      'l10n_mode' => 'prefixLangTitle',
      'config'    => $conf_input_30_trimRequired,
    ),
    'subtitle' => array (
      'exclude'   => $bool_exclude_default,
      'label'     => 'LLL:EXT:org/locallang_db.xml:tx_org_news.subtitle',
      'l10n_mode' => 'prefixLangTitle',
      'config'    => $conf_input_30_trim,
    ),
    'datetime' => array (
      'l10n_mode' => 'mergeIfNotBlank',
      'exclude'   => 0,
      'label'     => 'LLL:EXT:org/locallang_db.xml:tx_org_news.datetime',
      'config'    => $conf_datetime,
    ),
    'newscat' => array (
      'l10n_mode' => 'exclude',
      'exclude'   => $bool_exclude_default,
      'label'     => 'LLL:EXT:org/locallang_db.xml:tx_org_news.newscat',
      'config'    => array (
        'type'                => 'select', 
        'size'                => 10, 
        'minitems'            => 0,
        'maxitems'            => 99,
        'MM'                  => 'tx_org_news_mm_newscat',
        'foreign_table'       => 'tx_org_newscat',
        'foreign_table_where' => 'AND tx_org_newscat.' . $str_store_record_conf . ' ORDER BY tx_org_newscat.title',
        'wizards' => array(
          '_PADDING'  => 2,
          '_VERTICAL' => 0,
          'add' => array(
            'type'   => 'script',
            'title'  => 'LLL:EXT:org/locallang_db.xml:wizard.newscat.add',
            'icon'   => 'add.gif',
            'params' => array(
              'table'    => 'tx_org_newscat',
              'pid'      => $str_marker_pid,
              'setValue' => 'prepend'
            ),
            'script' => 'wizard_add.php',
          ),
          'list' => array(
            'type'   => 'script',
            'title'  => 'LLL:EXT:org/locallang_db.xml:wizard.newscat.list',
            'icon'   => 'list.gif',
            'params' => array(
              'table' => 'tx_org_newscat',
              'pid'   => $str_marker_pid,
            ),
            'script' => 'wizard_list.php',
          ),
          'edit' => array(
            'type'                      => 'popup',
            'title'                     => 'LLL:EXT:org/locallang_db.xml:wizard.newscat.edit',
            'script'                    => 'wizard_edit.php',
            'popup_onlyOpenIfSelected'  => 1,
            'icon'                      => 'edit2.gif',
            'JSopenParams'              => $JSopenParams,
          ),
        ),
      )
    ),
    'bodytext' => array (
      'exclude'     => $bool_exclude_default,
      'label'     => 'LLL:EXT:org/locallang_db.xml:tx_org_news.bodytext',
      'l10n_mode' => 'prefixLangTitle',
      'config'    => $conf_text_rte,
    ),
    'fe_user' => array (
      'exclude'     => $bool_exclude_default,
      'label'       => 'LLL:EXT:org/locallang_db.xml:tx_org_news.fe_user',
      'l10n_mode'   => 'mergeIfNotBlank',
      'config'      => array (
        'type'      => 'select', 
        'size'      => $size_news,
        'minitems'  => 0,
        'maxitems'  => 1,
        'items' => array(
          '0' => array(
            '0' => '',
            '1' => '',
          ),
        ),
        'MM'                  => 'fe_users_mm_news',
        'MM_opposite_field'   => 'news',
        'foreign_table'       => 'fe_users',
        'foreign_table_where' => 'AND fe_users.' . $str_store_record_conf . ' ORDER BY fe_users.last_name',
        'wizards' => $arr_config_feuser['wizards'],
      ),
    ),
    'department' => array (
      'exclude' => $bool_exclude_default,
      'label'   => 'LLL:EXT:org/locallang_db.xml:tx_org_news.department',
      'config'  => array (
        'type'                => 'select', 
        'size'                => $size_department,
        'minitems'            => 0,
        'maxitems'            => 999,
        'MM'                  => 'tx_org_department_mm_news',
        'MM_opposite_field'   => 'news',
        'foreign_table'       => 'tx_org_department',
        'foreign_table_where' => 'AND tx_org_department.' . $str_store_record_conf . ' ORDER BY tx_org_department.title',
        'wizards' => array(
          '_PADDING'  => 2,
          '_VERTICAL' => 0,
          'add' => array(
            'type'   => 'script',
            'title'  => 'LLL:EXT:org/locallang_db.xml:wizard.department.add',
            'icon'   => 'add.gif',
            'params' => array(
              'table'    => 'tx_org_department',
              'pid'      => $str_marker_pid,
              'setValue' => 'prepend'
            ),
            'script' => 'wizard_add.php',
          ),
          'list' => array(
            'type'   => 'script',
            'title'  => 'LLL:EXT:org/locallang_db.xml:wizard.department.list',
            'icon'   => 'list.gif',
            'params' => array(
              'table' => 'tx_org_department',
              'pid'   => $str_marker_pid,
            ),
            'script' => 'wizard_list.php',
          ),
          'edit' => array(
            'type'                      => 'popup',
            'title'                     => 'LLL:EXT:org/locallang_db.xml:wizard.department.edit',
            'script'                    => 'wizard_edit.php',
            'popup_onlyOpenIfSelected'  => 1,
            'icon'                      => 'edit2.gif',
            'JSopenParams'              => $JSopenParams,
          ),
        ),
      ),
    ),
    'repertoire' => array (
      'exclude' => $bool_exclude_default,
      'label'   => 'LLL:EXT:org/locallang_db.xml:tx_org_news.repertoire',
      'config'  => array (
        'type'                => 'select', 
        'size'                => $size_news,
        'minitems'            => 0,
        'maxitems'            => 999,
        'MM'                  => 'tx_org_repertoire_mm_news',
        'MM_opposite_field'   => 'news',
        'foreign_table'       => 'tx_org_repertoire',
        'foreign_table_where' => 'AND tx_org_repertoire.' . $str_store_record_conf . ' ORDER BY tx_org_repertoire.title',
        'wizards' => array(
          '_PADDING'  => 2,
          '_VERTICAL' => 0,
          'add' => array(
            'type'   => 'script',
            'title'  => 'LLL:EXT:org/locallang_db.xml:wizard.repertoire.add',
            'icon'   => 'add.gif',
            'params' => array(
              'table'    => 'tx_org_repertoire',
              'pid'      => $str_marker_pid,
              'setValue' => 'prepend'
            ),
            'script' => 'wizard_add.php',
          ),
          'list' => array(
            'type'   => 'script',
            'title'  => 'LLL:EXT:org/locallang_db.xml:wizard.repertoire.list',
            'icon'   => 'list.gif',
            'params' => array(
              'table' => 'tx_org_repertoire',
              'pid'   => $str_marker_pid,
            ),
            'script' => 'wizard_list.php',
          ),
          'edit' => array(
            'type'                      => 'popup',
            'title'                     => 'LLL:EXT:org/locallang_db.xml:wizard.repertoire.edit',
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
      'label'   => 'LLL:EXT:org/locallang_db.xml:tx_org_news.topnews',
      'config'  => array (
        'type'    => 'check',
        'default' => '0'
      )
    ),
    'pages' => $conf_pages,
    'starttime' => $conf_starttime,
    'endtime'   => $conf_endtime,
    'fe_group'  => $conf_fegroup,
    'image'     => array (
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
    'embeddedcode' => array (
      'label'     => 'LLL:EXT:org/locallang_db.xml:tca_phrase.embeddedcode',
      'l10n_mode' => 'exclude',
      'exclude'   => $bool_exclude_default,
      'config'    => $conf_text_50_10,
    ),
    'documents' => array (
      'exclude' => $bool_exclude_default,
      'label'   => 'LLL:EXT:org/locallang_db.xml:tca_phrase.documents',
      'config'  => $conf_file_document,
    ),
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
    'teaser_title' => array (
      'label'     => 'LLL:EXT:org/locallang_db.xml:tx_org_news.teaser_title',
      'l10n_mode' => 'prefixLangTitle',
      'exclude'   => $bool_exclude_default,
      'config'    => $conf_input_30_trim,
    ),
    'teaser_subtitle' => array (
      'label'     => 'LLL:EXT:org/locallang_db.xml:tx_org_news.teaser_subtitle',
      'l10n_mode' => 'prefixLangTitle',
      'exclude'   => $bool_exclude_default,
      'config'    => $conf_input_30_trim,
    ),
    'teaser_short' => array (
      'label'     => 'LLL:EXT:org/locallang_db.xml:tx_org_news.teaser_short',
      'l10n_mode' => 'prefixLangTitle',
      'exclude'   => $bool_exclude_default,
      'config'    => $conf_text_50_10,
    ),
  ),
  'types' => array (
    '0' => array('showitem' =>  '--div--;LLL:EXT:org/locallang_db.xml:tx_org_news.div_news,       title;;;;1-1-1,subtitle,datetime,newscat,bodytext;;;richtext[]:rte_transform[mode=ts];3-3-3,'.
                                '--div--;LLL:EXT:org/locallang_db.xml:tx_org_news.div_teaser,     teaser_title;;;;6-6-6, teaser_subtitle, teaser_short,'.
                                '--div--;LLL:EXT:org/locallang_db.xml:tx_org_news.div_feuser,     fe_user,'.
                                '--div--;LLL:EXT:org/locallang_db.xml:tx_org_news.div_department, department,'.
                                '--div--;LLL:EXT:org/locallang_db.xml:tx_org_news.div_repertoire, repertoire,'.
                                '--div--;LLL:EXT:org/locallang_db.xml:tx_org_news.div_control,    sys_language_uid;;;;8-8-8, l10n_parent, l10n_diffsource, hidden;;3;;,topnews,pages, fe_group,'.
                                '--div--;LLL:EXT:org/locallang_db.xml:tx_org_news.div_media,      image;;;;4-4-4, imagecaption;;2;;, embeddedcode, documents;;;;5-5-5,'.
                                '--div--;LLL:EXT:org/locallang_db.xml:tx_org_news.div_seo,        keywords;;;;7-7-7, description,'.
                                ''),
  ),
  'palettes' => array (
    '2' => array('showitem' => 'imageseo'),
    '3' => array('showitem' => 'starttime, endtime'),
  )
);
if(!$bool_full_wizardSupport_catTables)
{
  unset($TCA['tx_org_news']['columns']['newscat']['config']['wizards']['add']);
  unset($TCA['tx_org_news']['columns']['newscat']['config']['wizards']['list']);
}
if(!$bool_full_wizardSupport_allTables)
{
  unset($TCA['tx_org_news']['columns']['department']['config']['wizards']['add']);
  unset($TCA['tx_org_news']['columns']['department']['config']['wizards']['list'] );
  unset($TCA['tx_org_news']['columns']['repertoire']['config']['wizards']['add']);
  unset($TCA['tx_org_news']['columns']['repertoire']['config']['wizards']['list'] );
}
  // Non localized

  // Localization support
if($bool_LL)
{
  // Add language overlay fields to showRecordFieldList
  $showRecordFieldList = $TCA['tx_org_news']['interface']['showRecordFieldList'];
  $TCA['tx_org_sectorgroup']['interface']['tx_org_news'] = $showRecordFieldList.',sys_language_uid,l10n_parent,l10n_diffsource';
  // Add language overlay fields to showRecordFieldList

  // Add localization fields to columns array
  $TCA['tx_org_news']['columns']['sys_language_uid'] = array
  (
    'l10n_mode' => 'exclude',
    'exclude' => 0,
    'label'  => 'LLL:EXT:lang/locallang_general.xml:LGL.language',
    'config' => array (
      'type'                => 'select',
      'foreign_table'       => 'sys_language',
      'foreign_table_where' => 'ORDER BY sys_language.title',
      'items' => array(
        array('LLL:EXT:lang/locallang_general.xml:LGL.allLanguages', -1),
        array('LLL:EXT:lang/locallang_general.xml:LGL.default_value', 0)
      )
    )
  );
  $TCA['tx_org_news']['columns']['l10n_parent'] = array
  (
    'l10n_mode' => 'exclude',
    'displayCond' => 'FIELD:sys_language_uid:>:0',
    'exclude'     => 0,
    'label'       => 'LLL:EXT:lang/locallang_general.xml:LGL.l18n_parent',
    'config'      => array (
      'type'  => 'select',
      'items' => array (
        array('', 0),
      ),
      'foreign_table'       => 'tx_org_news',
      'foreign_table_where' => 'AND tx_org_news.' . $str_store_record_conf . ' AND tx_org_news.sys_language_uid IN (-1,0)',
    )
  );
  $TCA['tx_org_news']['columns']['l10n_diffsource'] = array
  (
    'config' => array (
      'type' => 'passthrough'
    )
  );
  // Add localization fields to columns array
}
  // Localization support
  // tx_org_news



  /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
  // 
  // tx_org_newscat
  
  // Non localized
$TCA['tx_org_newscat'] = array (
  'ctrl' => $TCA['tx_org_newscat']['ctrl'],
  'interface' => array (
    'showRecordFieldList' =>  'title,'.
                              'hidden,'.
                              'image,imagecaption,imageseo',
  ),
  'columns' => array (
    'title' => array (
      'exclude' => 0,
      'label'   => 'LLL:EXT:org/locallang_db.xml:tx_org_newscat.title',
      'config'  => $conf_input_30_trimRequired,
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
    '0' => array('showitem' =>  '--div--;LLL:EXT:org/locallang_db.xml:tx_org_newscat.div_cat,     title;;%1%;;1-1-1,'.
                                '--div--;LLL:EXT:org/locallang_db.xml:tx_org_newscat.div_control, hidden,'.
                                '--div--;LLL:EXT:org/locallang_db.xml:tx_org_newscat.div_media,   image, imagecaption;;3;;')
  ),
  'palettes' => array (
    '1' => array('showitem' => '%title_lang_ol%'),
    '3' => array('showitem' => 'imageseo'),
  )
);
  // Non localized

  // Localization support
if($bool_LL)
{
  // Add language overlay fields to showRecordFieldList
  $showRecordFieldList = $TCA['tx_org_newscat']['interface']['showRecordFieldList'];
  $TCA['tx_org_newscat']['interface']['showRecordFieldList'] = $showRecordFieldList.',title_lang_ol';
  // Add language overlay fields to showRecordFieldList
  // Add language overlay fields to type
  $showitem = $TCA['tx_org_newscat']['types']['0']['showitem'];
  $showitem = str_replace('%1%', '1', $showitem);
  $TCA['tx_org_newscat']['types']['0']['showitem'] = $showitem;
  // Add language overlay fields to type
  // Add language overlay fields to palettes
  $showitem = $TCA['tx_org_newscat']['palettes']['1']['showitem'];
  $TCA['tx_org_newscat']['palettes']['1']['showitem'] = str_replace('%title_lang_ol%', 'title_lang_ol', $showitem);
  // Add language overlay fields to palettes
  // Add language overlay fields to columns array
  $TCA['tx_org_newscat']['columns']['title_lang_ol'] = array
  (
    'exclude' => 0,
    'label' => 'LLL:EXT:org/locallang_db.xml:tx_org_newscat.title_lang_ol',
    'config' => array (
      'type' => 'input',
      'size' => '30',
    )
  );
  // Add language overlay fields to columns array
}


if(!$bool_LL)
{
  // Remove language overlay fields from type
  $showitem = $TCA['tx_org_newscat']['types']['0']['showitem'];
  $showitem = str_replace('%1%', '', $showitem);
  $TCA['tx_org_newscat']['types']['0']['showitem'] = $showitem;
  // Remove language overlay fields from type
  // Remove language overlay fields from palettes
  $showitem = $TCA['tx_org_newscat']['palettes']['1']['showitem'];
  $TCA['tx_org_newscat']['palettes']['1']['showitem'] = str_replace('%title_lang_ol%', '', $showitem);
  // Remove language overlay fields from palettes
}
  // Localization support
  // tx_org_newscat



  /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
  //
  // tx_org_repertoire - without any localisation support

  // Don't display relations to feuser by default 
$bool_exclude_feuser = true;

$TCA['tx_org_repertoire'] = array (
  'ctrl' => $TCA['tx_org_repertoire']['ctrl'],
  'interface' => array (
    'showRecordFieldList' =>  'title,subtitle,producer,length,short,bodytext,'.
                              'actor,puppeteer,dancer,vocals,musician,video,narrator,'.
                              'director,advisor,assistant,'.
                              'stage_design,tailoring,requisite,garment,makeup,'.
                              'stage_manager,technical_manager,technique,light,sound,'.
                              'otherslabel,others,'.
                              'documents,news,'.
                              'image,imagecaption,imageseo,embeddedcode,print,printcaption,printseo,'.
                              'calendar,'.
                              'hidden,pages,fe_group,'.
                              'keywords,description'
  ),
  'feInterface' => $TCA['tx_org_repertoire']['feInterface'],
  'columns' => array (
    'title' => array (
      'exclude' => 0,
      'label'   => 'LLL:EXT:org/locallang_db.xml:tx_org_repertoire.title',
      'config'  => $conf_input_30_trimRequired,
    ),
    'subtitle' => array (
      'exclude' => $bool_exclude_default,
      'label'   => 'LLL:EXT:org/locallang_db.xml:tx_org_repertoire.subtitle',
      'config'  => $conf_input_30_trim,
    ),
    'producer' => array (
      'exclude' => $bool_exclude_default,
      'label'   => 'LLL:EXT:org/locallang_db.xml:tx_org_repertoire.producer',
      'config'  => $conf_input_30_trim,
    ),
    'length' => array (
      'exclude' => $bool_exclude_default,
      'label'   => 'LLL:EXT:org/locallang_db.xml:tx_org_repertoire.length',
      'config'  => $conf_input_30_trim,
    ),
    'short' => array (
      'exclude' => $bool_exclude_default,
      'label'   => 'LLL:EXT:org/locallang_db.xml:tx_org_repertoire.short',
      'config'    => $conf_text_50_10,
    ),
    'bodytext' => array (
      'exclude'   => $bool_exclude_default,
      'label'     => 'LLL:EXT:org/locallang_db.xml:tx_org_repertoire.bodytext',
      'l10n_mode' => 'prefixLangTitle',
      'config'    => $conf_text_rte,
    ),
    'actor' => array (
      'exclude' => $bool_exclude_none,
      'label'   => 'LLL:EXT:org/locallang_db.xml:tx_org_repertoire.actor',
      'config'  => $arr_config_feuser,
    ),
    'puppeteer' => array (
      'exclude' => $bool_exclude_none,
      'label'   => 'LLL:EXT:org/locallang_db.xml:tx_org_repertoire.puppeteer',
      'config'  => $arr_config_feuser,
    ),
    'dancer' => array (
      'exclude' => $bool_exclude_none,
      'label'   => 'LLL:EXT:org/locallang_db.xml:tx_org_repertoire.dancer',
      'config'  => $arr_config_feuser,
    ),
    'vocals' => array (
      'exclude' => $bool_exclude_none,
      'label'   => 'LLL:EXT:org/locallang_db.xml:tx_org_repertoire.vocals',
      'config'  => $arr_config_feuser,
    ),
    'musician' => array (
      'exclude' => $bool_exclude_none,
      'label'   => 'LLL:EXT:org/locallang_db.xml:tx_org_repertoire.musician',
      'config'  => $arr_config_feuser,
    ),
    'video' => array (
      'exclude' => $bool_exclude_none,
      'label'   => 'LLL:EXT:org/locallang_db.xml:tx_org_repertoire.video',
      'config'  => $arr_config_feuser,
    ),
    'narrator' => array (
      'exclude' => $bool_exclude_none,
      'label'   => 'LLL:EXT:org/locallang_db.xml:tx_org_repertoire.narrator',
      'config'  => $arr_config_feuser,
    ),
    'director' => array (
      'exclude' => $bool_exclude_none,
      'label'   => 'LLL:EXT:org/locallang_db.xml:tx_org_repertoire.director',
      'config'  => $arr_config_feuser,
    ),
    'advisor' => array (
      'exclude' => $bool_exclude_none,
      'label'   => 'LLL:EXT:org/locallang_db.xml:tx_org_repertoire.advisor',
      'config'  => $arr_config_feuser,
    ),
    'assistant' => array (
      'exclude' => $bool_exclude_none,
      'label'   => 'LLL:EXT:org/locallang_db.xml:tx_org_repertoire.assistant',
      'config'  => $arr_config_feuser,
    ),
    'stage_design' => array (
      'exclude' => $bool_exclude_none,
      'label'   => 'LLL:EXT:org/locallang_db.xml:tx_org_repertoire.stage_design',
      'config'  => $arr_config_feuser,
    ),
    'tailoring' => array (
      'exclude' => $bool_exclude_none,
      'label'   => 'LLL:EXT:org/locallang_db.xml:tx_org_repertoire.tailoring',
      'config'  => $arr_config_feuser,
    ),
    'requisite' => array (
      'exclude' => $bool_exclude_none,
      'label'   => 'LLL:EXT:org/locallang_db.xml:tx_org_repertoire.requisite',
      'config'  => $arr_config_feuser,
    ),
    'garment' => array (
      'exclude' => $bool_exclude_none,
      'label'   => 'LLL:EXT:org/locallang_db.xml:tx_org_repertoire.garment',
      'config'  => $arr_config_feuser,
    ),
    'makeup' => array (
      'exclude' => $bool_exclude_none,
      'label'   => 'LLL:EXT:org/locallang_db.xml:tx_org_repertoire.makeup',
      'config'  => $arr_config_feuser,
    ),
    'stage_manager' => array (
      'exclude' => $bool_exclude_none,
      'label'   => 'LLL:EXT:org/locallang_db.xml:tx_org_repertoire.stage_manager',
      'config'  => $arr_config_feuser,
    ),
    'technical_manager' => array (
      'exclude' => $bool_exclude_none,
      'label'   => 'LLL:EXT:org/locallang_db.xml:tx_org_repertoire.technical_manager',
      'config'  => $arr_config_feuser,
    ),
    'technique' => array (
      'exclude' => $bool_exclude_none,
      'label'   => 'LLL:EXT:org/locallang_db.xml:tx_org_repertoire.technique',
      'config'  => $arr_config_feuser,
    ),
    'light' => array (
      'exclude' => $bool_exclude_none,
      'label'   => 'LLL:EXT:org/locallang_db.xml:tx_org_repertoire.light',
      'config'  => $arr_config_feuser,
    ),
    'sound' => array (
      'exclude' => $bool_exclude_none,
      'label'   => 'LLL:EXT:org/locallang_db.xml:tx_org_repertoire.sound',
      'config'  => $arr_config_feuser,
    ),
    'otherslabel' => array (
      'exclude' => $bool_exclude_none,
      'label'   => 'LLL:EXT:org/locallang_db.xml:tx_org_repertoire.otherslabel',
      'config'  => $conf_input_30_trim,
    ),
    'others' => array (
      'exclude' => $bool_exclude_none,
      'label'   => 'LLL:EXT:org/locallang_db.xml:tx_org_repertoire.others',
      'config'  => $arr_config_feuser,
    ),
    'documents' => array (
      'exclude' => $bool_exclude_default,
      'label'   => 'LLL:EXT:org/locallang_db.xml:tca_phrase.documents',
      'config'  => $conf_file_document,
    ),
    'news' => array (
      'exclude' => $bool_exclude_default,
      'label'   => 'LLL:EXT:org/locallang_db.xml:tca_phrase.news',
      'config'  => array (
        'type'                => 'select', 
        'size'                => $size_news,
        'minitems'            => 0,
        'maxitems'            => 999,
        'MM'                  => 'tx_org_repertoire_mm_news',
        'foreign_table'       => 'tx_org_news',
        'foreign_table_where' => 'AND tx_org_news.' . $str_store_record_conf . ' ORDER BY tx_org_news.datetime DESC, title',
        'wizards' => array(
          '_PADDING'  => 2,
          '_VERTICAL' => 0,
          'add' => array(
            'type'   => 'script',
            'title'  => 'LLL:EXT:org/locallang_db.xml:wizard.news.add',
            'icon'   => 'add.gif',
            'params' => array(
              'table'    => 'tx_org_news',
              'pid'      => $str_marker_pid,
              'setValue' => 'prepend'
            ),
            'script' => 'wizard_add.php',
          ),
          'list' => array(
            'type'   => 'script',
            'title'  => 'LLL:EXT:org/locallang_db.xml:wizard.news.list',
            'icon'   => 'list.gif',
            'params' => array(
              'table' => 'tx_org_news',
              'pid'   => $str_marker_pid,
            ),
            'script' => 'wizard_list.php',
          ),
          'edit' => array(
            'type'                      => 'popup',
            'title'                     => 'LLL:EXT:org/locallang_db.xml:wizard.news.edit',
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
      'exclude' => $bool_exclude_default,
      'label'   => 'LLL:EXT:org/locallang_db.xml:tca_phrase.imagecaption',
      'config'  => $conf_text_30_05,
    ),
    'imageseo' => array (
      'exclude' => $bool_exclude_default,
      'label'   => 'LLL:EXT:org/locallang_db.xml:tca_phrase.imageseo',
      'config'  => $conf_text_30_05,
    ),
    'embeddedcode' => array (
      'label'   => 'LLL:EXT:org/locallang_db.xml:tca_phrase.embeddedcode',
      'exclude' => $bool_exclude_none,
      'config'  => $conf_text_50_10,
    ),
    'print' => array (
      'exclude' => $bool_exclude_none,
      'label'   => 'LLL:EXT:org/locallang_db.xml:tca_phrase.print',
      'config'  => $conf_file_image,
    ),
    'printcaption' => array (
      'exclude' => $bool_exclude_none,
      'label'   => 'LLL:EXT:org/locallang_db.xml:tca_phrase.imagecaption',
      'config'  => $conf_text_30_05,
    ),
    'printseo' => array (
      'exclude' => $bool_exclude_none,
      'label'   => 'LLL:EXT:org/locallang_db.xml:tca_phrase.imageseo',
      'config'  => $conf_text_30_05,
    ),
    'calendar' => array (
      'exclude' => $bool_exclude_default,
      'label'   => 'LLL:EXT:org/locallang_db.xml:tx_org_repertoire.calendar',
      'config'  => array (
        'type'                => 'select', 
        'size'                => $size_calendar,
        'minitems'            => 0,
        'maxitems'            => 999,
        'MM'                  => 'tx_org_cal_mm_repertoire',
        'MM_opposite_field'   => 'repertoire',
        'foreign_table'       => 'tx_org_cal',
        'foreign_table_where' => 'AND tx_org_cal.' . $str_store_record_conf . ' ORDER BY tx_org_cal.datetime DESC, title',
        'wizards' => array(
          '_PADDING'  => 2,
          '_VERTICAL' => 0,
          'add' => array(
            'type'   => 'script',
            'title'  => 'LLL:EXT:org/locallang_db.xml:wizard.calendar.add',
            'icon'   => 'add.gif',
            'params' => array(
              'table'    => 'tx_org_cal',
              'pid'      => $str_marker_pid,
              'setValue' => 'prepend'
            ),
            'script' => 'wizard_add.php',
          ),
          'list' => array(
            'type'   => 'script',
            'title'  => 'LLL:EXT:org/locallang_db.xml:wizard.calendar.list',
            'icon'   => 'list.gif',
            'params' => array(
              'table' => 'tx_org_cal',
              'pid'   => $str_marker_pid,
            ),
            'script' => 'wizard_list.php',
          ),
          'edit' => array(
            'type'                      => 'popup',
            'title'                     => 'LLL:EXT:org/locallang_db.xml:wizard.calendar.edit',
            'script'                    => 'wizard_edit.php',
            'popup_onlyOpenIfSelected'  => 1,
            'icon'                      => 'edit2.gif',
            'JSopenParams'              => $JSopenParams,
          ),
        ),
      ),
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
    '0' => array('showitem' =>  '--div--;LLL:EXT:org/locallang_db.xml:tx_org_repertoire.div_repertoire,   title;;;;1-1-1,subtitle,producer,length,short,bodytext;;;richtext[]:rte_transform[mode=ts];,'.
                                '--div--;LLL:EXT:org/locallang_db.xml:tx_org_repertoire.div_actors,       actor,puppeteer,dancer,vocals,musician,video,narrator,'.
                                '--div--;LLL:EXT:org/locallang_db.xml:tx_org_repertoire.div_direction,    director,advisor,assistant,'.
                                '--div--;LLL:EXT:org/locallang_db.xml:tx_org_repertoire.div_requirements, stage_design,tailoring,requisite,garment,makeup,'.
                                '--div--;LLL:EXT:org/locallang_db.xml:tx_org_repertoire.div_technique,    stage_manager,technical_manager,technique,light,sound,'.
                                '--div--;LLL:EXT:org/locallang_db.xml:tx_org_repertoire.div_others,       otherslabel,others,'.
                                '--div--;LLL:EXT:org/locallang_db.xml:tx_org_repertoire.div_doc,          documents,news,'.
                                '--div--;LLL:EXT:org/locallang_db.xml:tx_org_repertoire.div_media,        image,imagecaption,imageseo,embeddedcode,print,printcaption,printseo,'.
                                '--div--;LLL:EXT:org/locallang_db.xml:tx_org_repertoire.div_calendar,     calendar,'.
                                '--div--;LLL:EXT:org/locallang_db.xml:tx_org_repertoire.div_control,      hidden,pages,fe_group,'.
                                '--div--;LLL:EXT:org/locallang_db.xml:tx_org_repertoire.div_seo,          keywords,description'.
                                ''),
  ),
  'palettes' => array (
    '1' => array('showitem' => 'starttime,endtime,'),
  )
);
if(!$bool_full_wizardSupport_allTables)
{
  unset($TCA['tx_org_repertoire']['columns']['calendar']['config']['wizards']['add']);
  unset($TCA['tx_org_repertoire']['columns']['calendar']['config']['wizards']['list'] );
  unset($TCA['tx_org_repertoire']['columns']['news']['config']['wizards']['add']);
  unset($TCA['tx_org_repertoire']['columns']['news']['config']['wizards']['list'] );
}
  // tx_org_repertoire - without any localisation support



  /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
  //
  // tx_org_tax - without any localisation support

$TCA['tx_org_tax'] = array (
  'ctrl' => $TCA['tx_org_tax']['ctrl'],
  'interface' => array (
    'showRecordFieldList' =>  'title,value,'.
                              'hidden,starttime,endtime'
  ),
  'feInterface' => $TCA['tx_org_tax']['feInterface'],
  'columns' => array (
    'title' => array (
      'exclude' => 0,
      'label'   => 'LLL:EXT:org/locallang_db.xml:tx_org_tax.title',
      'config'  => $conf_input_30_trimRequired,
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
    '0' => array('showitem' =>  '--div--;LLL:EXT:org/locallang_db.xml:tx_org_tax.div_tax,     title,value,'.
                                '--div--;LLL:EXT:org/locallang_db.xml:tx_org_tax.div_control, hidden;;1;;'.
                                ''),
  ),
  'palettes' => array (
    '1' => array('showitem' => 'starttime,endtime,'),
  )
);
  // tx_org_tax - without any localisation support

?>