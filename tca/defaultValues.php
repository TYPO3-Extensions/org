<?php

if (!defined('TYPO3_MODE'))
{
  die('Access denied.');
}



/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//
// INDEX
// General Configuration
// Wizard fe_users
// Other wizards and config drafts
//
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//
// General Configuration
// JSopenParams for all wizards
$JSopenParams = 'height=680,width=800,status=0,menubar=0,scrollbars=1';
// Rows of calendar select box
$size_calendar = 10;
// Rows of department select box
$size_department = 10;
// Rows of document select box
$size_doc = 30;
// Rows of event select box
$size_event = 30;
// Rows of fe_group select box
$size_fegroup = 10;
// Rows of fe_user select box
$size_feuser = 30;
// Rows of headquarters select box
$size_headquarters = 10;
// Rows of location select box
$size_location = 1;
// Rows of news select box
$size_news = 30;

$listStyleWidth = 'width:500px;';

// General Configuration
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//
  // Wizard fe_users
// Wizard for fe_users
$arr_config_feuser = array(
  'type' => 'select',
  'size' => $size_feuser,
  'suppress_icons' => 1,
  'minitems' => 0,
  'maxitems' => 999,
  'foreign_table' => 'fe_users',
  'foreign_table_where' => 'AND fe_users.' . $str_store_record_conf . ' AND fe_users.deleted = 0 AND fe_users.disable = 0 ORDER BY fe_users.last_name',
  'wizards' => array(
    '_PADDING' => 2,
    '_VERTICAL' => 0,
    'add' => array(
      'type' => 'script',
      'title' => 'LLL:EXT:org/locallang_db.xml:wizard.fe_user.add',
      'icon' => 'add.gif',
      'params' => array(
        'table' => 'fe_users',
        'pid' => $str_marker_pid,
        'setValue' => 'prepend'
      ),
      'script' => 'wizard_add.php',
    ),
    'list' => array(
      'type' => 'script',
      'title' => 'LLL:EXT:org/locallang_db.xml:wizard.fe_user.list',
      'icon' => 'list.gif',
      'params' => array(
        'table' => 'fe_users',
        'pid' => $str_marker_pid,
      ),
      'script' => 'wizard_list.php',
    ),
    'edit' => array(
      'type' => 'popup',
      'title' => 'LLL:EXT:org/locallang_db.xml:wizard.fe_user.edit',
      'script' => 'wizard_edit.php',
      'popup_onlyOpenIfSelected' => 1,
      'icon' => 'edit2.gif',
      'JSopenParams' => $JSopenParams,
    ),
  ),
);
if (!$bool_full_wizardSupport_allTables)
{
  unset($arr_config_feuser['wizards']['add']);
  unset($arr_config_feuser['wizards']['list']);
}
// Wizard for fe_users
// Wizard fe_users
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//
  // Other wizards and config drafts

$arr_wizard_url = array(
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
);

$conf_datetime = array(
  'type' => 'input',
  'size' => '10',
  'max' => '20',
  'eval' => 'datetime',
  'default' => mktime(date('H'), date('i'), 0, date('m'), date('d'), date('Y')),
);

$conf_datetimeend = $conf_datetime;
unset($conf_datetimeend['default']);

$conf_archivedate = $conf_datetimeend;
$conf_archivedate['eval'] = 'date';

$conf_file_document = array(
  'type' => 'group',
  'internal_type' => 'file',
  'allowed' => '',
  'disallowed' => 'php,php3',
  'max_size' => $GLOBALS['TYPO3_CONF_VARS']['BE']['maxFileSize'],
  'uploadfolder' => 'uploads/tx_org',
  'show_thumbs' => 1,
  'size' => 10,
  'minitems' => 0,
  'maxitems' => 99,
);

$conf_file_one_document = $conf_file_document;
$conf_file_one_document['size'] = 1;
$conf_file_one_document['maxitems'] = 1;

$conf_file_image = array(
  'type' => 'group',
  'internal_type' => 'file',
  'allowed' => $GLOBALS['TYPO3_CONF_VARS']['GFX']['imagefile_ext'],
  'max_size' => $GLOBALS['TYPO3_CONF_VARS']['BE']['maxFileSize'],
  'uploadfolder' => 'uploads/tx_org',
  'show_thumbs' => 1,
  'size' => 3,
  'minitems' => 0,
  'maxitems' => 20,
);

$conf_file_one_image = $conf_file_image;
$conf_file_one_image['size'] = 1;
$conf_file_one_image['maxitems'] = 99;

$conf_file_icon = array(
  'type' => 'group',
  'internal_type' => 'file',
  'allowed' => $GLOBALS['TYPO3_CONF_VARS']['GFX']['imagefile_ext'],
  'max_size' => $GLOBALS['TYPO3_CONF_VARS']['BE']['maxFileSize'],
  'uploadfolder' => 'uploads/tx_org',
  'show_thumbs' => 1,
  'size' => 1,
  'minitems' => 0,
  'maxitems' => 1,
);

$conf_input_30_trim = array(
  'type' => 'input',
  'size' => '30',
  'eval' => 'trim'
);

$conf_input_30 = array(
  'type' => 'input',
  'size' => '30',
);

$conf_input_30_trimRequired = array(
  'type' => 'input',
  'size' => '30',
  'eval' => 'trim,required'
);

$conf_input_80_trim = array(
  'type' => 'input',
  'size' => '80',
  'eval' => 'trim'
);
$conf_text_30_05 = array(
  'type' => 'text',
  'cols' => '30',
  'rows' => '5',
);
$conf_text_30_05_trimRequired = array(
  'type' => 'text',
  'cols' => '30',
  'rows' => '5',
  'eval' => 'trim,required'
);

$conf_text_50_10 = array(
  'type' => 'text',
  'cols' => '50',
  'rows' => '10',
);

$conf_text_rte = array(
  'type' => 'text',
  'cols' => '30',
  'rows' => '5',
  'wizards' => array(
    '_PADDING' => 2,
    'RTE' => array(
      'notNewRecords' => 1,
      'RTEonly' => 1,
      'type' => 'script',
      'title' => 'Full screen Rich Text Editing|Formatteret redigering i hele vinduet',
      'icon' => 'wizard_rte2.gif',
      'script' => 'wizard_rte.php',
    ),
  ),
);

$conf_hidden = array(
  'exclude' => $bool_exclude_default,
  'l10n_mode' => 'exclude',
  'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.hidden',
  'config' => array(
    'type' => 'check',
    'default' => '0'
  ),
);
$conf_starttime = array(
  'exclude' => $bool_time_control,
  'l10n_mode' => 'exclude',
  'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.starttime',
  'config' => array(
    'type' => 'input',
    'size' => '8',
    'max' => '20',
    'eval' => 'date',
    'default' => '0',
    'checkbox' => '0'
  ),
);
$conf_endtime = array(
  'exclude' => $bool_time_control,
  'l10n_mode' => 'exclude',
  'label' => 'LLL:EXT:lang/locallang_general.xml:LGL.endtime',
  'config' => array(
    'type' => 'input',
    'size' => '8',
    'max' => '20',
    'eval' => 'date',
    'checkbox' => '0',
    'default' => '0',
    'range' => array(
      'upper' => mktime(0, 0, 0, date('m'), date('d'), date('Y') + 30),
      'lower' => mktime(0, 0, 0, date('m') - 1, date('d'), date('Y')),
    ),
  ),
);
$conf_fegroup = array(
  'exclude' => $bool_fegroup_control,
  //'l10n_mode'   => 'mergeIfNotBlank',
  'label' => 'LLL:EXT:lang/locallang_general.php:LGL.fe_group',
  'config' => array(
    'type' => 'select',
    'size' => $size_fegroup,
    'maxitems' => 20,
    'items' => array(
      array('LLL:EXT:lang/locallang_general.php:LGL.hide_at_login', -1),
      array('LLL:EXT:lang/locallang_general.php:LGL.any_login', -2),
      array('LLL:EXT:lang/locallang_general.php:LGL.usergroups', '--div--'),
    ),
    'exclusiveKeys' => '-1,-2',
    'foreign_table' => 'fe_groups'
  ),
);
$conf_topnews = array(
  'exclude' => $bool_exclude_none,
//    'l10n_mode'   => 'exclude',
  'label' => 'LLL:EXT:org/tca/locallang/tx_org_news.xml:tx_org_news.topnews',
  'config' => array(
    'type' => 'check',
    'default' => '0',
  ),
);
if ($bool_topnews_sorting === true)
{
  $conf_topnews['config'] = array(
    'type' => 'select',
    'items' => array(
      array('LLL:EXT:org/tca/locallang/tx_org_news.xml:tx_org_news.topnews.3', 3),
      array('LLL:EXT:org/tca/locallang/tx_org_news.xml:tx_org_news.topnews.2', 2),
      array('LLL:EXT:org/tca/locallang/tx_org_news.xml:tx_org_news.topnews.1', 1),
      array('LLL:EXT:org/tca/locallang/tx_org_news.xml:tx_org_news.topnews.0', 0),
    ),
    'size' => 4,
    'maxitems' => 1,
    'suppress_icons' => 1,
    'default' => 0,
  );
}
$conf_pages = array(
  'exclude' => $bool_exclude_default,
  'l10n_mode' => 'exclude',
  'label' => 'LLL:EXT:org/locallang_db.xml:tca_phrase.pages',
  'config' => array(
    'type' => 'group',
    'internal_type' => 'db',
    'allowed' => 'pages',
    'size' => '10',
    'maxitems' => '99',
    'minitems' => '0',
    'show_thumbs' => '1'
  ),
);
// Other wizards and config drafts
?>