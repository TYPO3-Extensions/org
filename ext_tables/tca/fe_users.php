<?php

if (!defined('TYPO3_MODE'))
{
  die('Access denied.');
}

if (!$extManagerDowngradeEnable_fe_users)
{
  return;
}

////////////////////////////////////////////////////////////////////////////
//
// INDEX
//
// fe_users
//
// fe_users
t3lib_div::loadTCA('fe_users');
$TCA['fe_users']['ctrl']['title'] = 'LLL:EXT:org/tca/locallang/fe_users.xml:fe_users';
$TCA['fe_users']['ctrl']['label'] = 'last_name';
$TCA['fe_users']['ctrl']['label_alt'] = 'first_name, username';
$TCA['fe_users']['ctrl']['label_alt_force'] = true;
$TCA['fe_users']['ctrl']['default_sortby'] = 'ORDER BY last_name';
$TCA['fe_users']['ctrl']['thumbnail'] = 'image';

// Don't exclude any field by default'
if (!$bool_excludeFeuser)
{
  foreach ((array) $TCA['fe_users']['columns'] as $key => $arr_column)
  {
    if (isset($TCA['fe_users']['columns'][$key]['exclude']))
    {
      $TCA['fe_users']['columns'][$key]['exclude'] = 0;
    }
  }
}
$TCA['fe_users']['columns']['first_name']['config']['eval'] = 'trim,required';
$TCA['fe_users']['columns']['last_name']['config']['eval'] = 'trim,required';
$TCA['fe_users']['columns']['company']['exclude'] = $bool_exclude_fe_user_company;
$TCA['fe_users']['columns']['starttime']['exclude'] = $bool_time_control;
$TCA['fe_users']['columns']['endtime']['exclude'] = $bool_time_control;
$TCA['fe_users']['columns']['TSconfig']['exclude'] = 1;
$TCA['fe_users']['columns']['lockToDomain']['exclude'] = 1;
// Don't exclude any field by default'
// Add fields tx_org_news, tx_org_headquarters, tx_org_department, tx_org_imagecaption, tx_org_imageseo, tx_org_vita, tx_org_downloads
$showRecordFieldList = $TCA['fe_users']['interface']['showRecordFieldList'];
$showRecordFieldList = $showRecordFieldList . ',tx_org_news,tx_org_headquarters,tx_org_department,tx_org_imagecaption,tx_org_imageseo,tx_org_vita,tx_org_downloads';
$TCA['fe_users']['interface']['showRecordFieldList'] = $showRecordFieldList;
// Add fields tx_org_news, tx_org_headquarters, tx_org_department, tx_org_imagecaption, tx_org_imageseo, tx_org_vita, tx_org_downloads

$TCA['fe_users']['columns']['www']['config'] = array(
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
      'JSopenParams' => 'height=300,width=500,status=0,menubar=0,scrollbars=1',
    ),
  ),
  'softref' => 'typolink',
);
// Add fields tx_org_news, tx_org_headquarters, tx_org_department, tx_org_imagecaption, tx_org_imageseo, tx_org_vita, tx_org_downloads
$TCA['fe_users']['columns']['tx_org_news'] = array(
  'exclude' => 0,
  'label' => 'LLL:EXT:org/locallang_db.xml:tca_phrase.news',
  'config' => array(
    'type' => 'select',
    'size' => 10,
    'minitems' => 0,
    'maxitems' => 999,
    'MM' => 'fe_users_mm_tx_org_news',
    'foreign_table' => 'tx_org_news',
    'foreign_table_where' => 'AND tx_org_news.' . $str_store_record_conf . ' ' .
    'AND tx_org_news.deleted = 0 AND tx_org_news.hidden = 0 ' .
    'AND tx_org_news.sys_language_uid=###REC_FIELD_sys_language_uid### ' .
    'ORDER BY tx_org_news.datetime DESC, tx_org_news.title',
    'wizards' => array(
      '_PADDING' => 2,
      '_VERTICAL' => 0,
      'add' => array(
        'type' => 'script',
        'title' => 'LLL:EXT:org/locallang_db.xml:wizard.news.add',
        'icon' => 'add.gif',
        'params' => array(
          'table' => 'tx_org_news',
          'pid' => '###CURRENT_PID###',
          'setValue' => 'prepend'
        ),
        'script' => 'wizard_add.php',
      ),
      'list' => array(
        'type' => 'script',
        'title' => 'LLL:EXT:org/locallang_db.xml:wizard.news.list',
        'icon' => 'list.gif',
        'params' => array(
          'table' => 'tx_org_news',
          'pid' => '###CURRENT_PID###',
        ),
        'script' => 'wizard_list.php',
      ),
      'edit' => array(
        'type' => 'popup',
        'title' => 'LLL:EXT:org/locallang_db.xml:wizard.news.edit',
        'script' => 'wizard_edit.php',
        'popup_onlyOpenIfSelected' => 1,
        'icon' => 'edit2.gif',
        'JSopenParams' => 'height=350,width=580,status=0,menubar=0,scrollbars=1',
      ),
    ),
  ),
);

$TCA['fe_users']['columns']['tx_org_headquarters'] = array(
  'exclude' => $bool_exclude_fe_user_tx_org_company,
  'label' => 'LLL:EXT:org/tca/locallang/fe_users.xml:fe_users.tx_org_headquarters',
  'config' => array(
    'type' => 'select',
    'size' => 20,
    'minitems' => 0,
    'maxitems' => 999,
    'MM' => 'tx_org_headquarters_mm_fe_users',
    'MM_opposite_field' => 'fe_users',
    'foreign_table' => 'tx_org_headquarters',
    'foreign_table_where' => 'AND tx_org_headquarters.' . $str_store_record_conf . ' ' .
    'AND tx_org_headquarters.deleted = 0 AND tx_org_headquarters.hidden = 0 ' .
    'AND tx_org_headquarters.sys_language_uid=###REC_FIELD_sys_language_uid### ' .
    'ORDER BY tx_org_headquarters.title',
    'wizards' => array(
      '_PADDING' => 2,
      '_VERTICAL' => 0,
      'add' => array(
        'type' => 'script',
        'title' => 'LLL:EXT:org/locallang_db.xml:wizard.org.add',
        'icon' => 'add.gif',
        'params' => array(
          'table' => 'tx_org_headquarters',
          'pid' => '###CURRENT_PID###',
          'setValue' => 'prepend'
        ),
        'script' => 'wizard_add.php',
      ),
      'list' => array(
        'type' => 'script',
        'title' => 'LLL:EXT:org/locallang_db.xml:wizard.org.list',
        'icon' => 'list.gif',
        'params' => array(
          'table' => 'tx_org_headquarters',
          'pid' => '###CURRENT_PID###',
        ),
        'script' => 'wizard_list.php',
      ),
      'edit' => array(
        'type' => 'popup',
        'title' => 'LLL:EXT:org/locallang_db.xml:wizard.org.edit',
        'script' => 'wizard_edit.php',
        'popup_onlyOpenIfSelected' => 1,
        'icon' => 'edit2.gif',
        'JSopenParams' => 'height=350,width=580,status=0,menubar=0,scrollbars=1',
      ),
    ),
  ),
);

$TCA['fe_users']['columns']['tx_org_department'] = array(
  'exclude' => $bool_exclude_fe_user_tx_org_department,
  'label' => 'LLL:EXT:org/tca/locallang/fe_users.xml:fe_users.tx_org_department',
  'config' => array(
    'type' => 'select',
    'size' => 20,
    'minitems' => 0,
    'maxitems' => 999,
    'MM' => 'tx_org_department_mm_fe_users',
    'MM_opposite_field' => 'fe_users',
    'foreign_table' => 'tx_org_department',
    'foreign_table_where' => 'AND tx_org_department.' . $str_store_record_conf . ' ' .
    'AND tx_org_department.deleted = 0 AND tx_org_department.hidden = 0 ' .
    'AND tx_org_department.sys_language_uid=###REC_FIELD_sys_language_uid### ' .
    'ORDER BY tx_org_department.sorting',
    'wizards' => array(
      '_PADDING' => 2,
      '_VERTICAL' => 0,
      'add' => array(
        'type' => 'script',
        'title' => 'LLL:EXT:org/locallang_db.xml:wizard.org.add',
        'icon' => 'add.gif',
        'params' => array(
          'table' => 'tx_org_department',
          'pid' => '###CURRENT_PID###',
          'setValue' => 'prepend'
        ),
        'script' => 'wizard_add.php',
      ),
      'list' => array(
        'type' => 'script',
        'title' => 'LLL:EXT:org/locallang_db.xml:wizard.org.list',
        'icon' => 'list.gif',
        'params' => array(
          'table' => 'tx_org_department',
          'pid' => '###CURRENT_PID###',
        ),
        'script' => 'wizard_list.php',
      ),
      'edit' => array(
        'type' => 'popup',
        'title' => 'LLL:EXT:org/locallang_db.xml:wizard.org.edit',
        'script' => 'wizard_edit.php',
        'popup_onlyOpenIfSelected' => 1,
        'icon' => 'edit2.gif',
        'JSopenParams' => 'height=350,width=580,status=0,menubar=0,scrollbars=1',
      ),
    ),
  ),
);

$TCA['fe_users']['columns']['tx_org_imagecaption'] = array(
//$columns['tx_org_imagecaption'] = array (
  'exclude' => 0,
  'label' => 'LLL:EXT:org/locallang_db.xml:tca_phrase.imagecaption',
  'config' => array(
    'type' => 'text',
    'cols' => '30',
    'rows' => '5',
  ),
);

$TCA['fe_users']['columns']['tx_org_imageseo'] = array(
//$columns['tx_org_imageseo'] = array (
  'exclude' => 0,
  'label' => 'LLL:EXT:org/locallang_db.xml:tca_phrase.imageseo',
  'config' => array(
    'type' => 'text',
    'cols' => '30',
    'rows' => '5',
  ),
);

$TCA['fe_users']['columns']['tx_org_vita'] = array(
  'label' => 'LLL:EXT:org/tca/locallang/fe_users.xml:fe_users.tx_org_vita',
  'exclude' => 0,
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
        'title' => 'Full screen Rich Text Editing|Formatteret redigering i hele vinduet',
        'icon' => 'wizard_rte2.gif',
        'script' => 'wizard_rte.php',
      ),
    ),
  ),
);
$TCA['fe_users']['columns']['tx_org_downloads'] = array(
  'exclude' => 0,
  'label' => 'LLL:EXT:org/locallang_db.xml:tca_phrase.downloads',
  'config' => array(
    'type' => 'select',
    'size' => 10,
    'minitems' => 0,
    'maxitems' => 999,
    'MM' => 'fe_users_mm_tx_org_downloads',
    'foreign_table' => 'tx_org_downloads',
    'foreign_table_where' => 'AND tx_org_downloads.' . $str_store_record_conf . ' ' .
    'AND tx_org_downloads.deleted = 0 AND tx_org_downloads.hidden = 0 ' .
    'AND tx_org_downloads.sys_language_uid=###REC_FIELD_sys_language_uid### ' .
    'ORDER BY tx_org_downloads.datetime DESC, tx_org_downloads.title',
    'wizards' => array(
      '_PADDING' => 2,
      '_VERTICAL' => 0,
      'add' => array(
        'type' => 'script',
        'title' => 'LLL:EXT:org/locallang_db.xml:wizard.doc.add',
        'icon' => 'add.gif',
        'params' => array(
          'table' => 'tx_org_downloads',
          'pid' => '###CURRENT_PID###',
          'setValue' => 'prepend'
        ),
        'script' => 'wizard_add.php',
      ),
      'list' => array(
        'type' => 'script',
        'title' => 'LLL:EXT:org/locallang_db.xml:wizard.doc.list',
        'icon' => 'list.gif',
        'params' => array(
          'table' => 'tx_org_downloads',
          'pid' => '###CURRENT_PID###',
        ),
        'script' => 'wizard_list.php',
      ),
      'edit' => array(
        'type' => 'popup',
        'title' => 'LLL:EXT:org/locallang_db.xml:wizard.doc.edit',
        'script' => 'wizard_edit.php',
        'popup_onlyOpenIfSelected' => 1,
        'icon' => 'edit2.gif',
        'JSopenParams' => 'height=350,width=580,status=0,menubar=0,scrollbars=1',
      ),
    ),
  ),
);
// Add fields tx_org_news, tx_org_headquarters, tx_org_department, tx_org_imagecaption, tx_org_imageseo, tx_org_vita, tx_org_downloads
// Insert div [org] at position $int_div_position
$str_showitem = $TCA['fe_users']['types']['0']['showitem'];
$arr_showitem = explode('--div--;', $str_showitem);
$int_div_position = 2;
foreach ($arr_showitem as $key => $value)
{
  switch (true)
  {
    case($key == 1):
      $arr_new_showitem[$key] = $value . 'tx_org_imagecaption, tx_org_imageseo, tx_org_vita;;;richtext[]:rte_transform[mode=ts];4-4-4,';
      break;
    case($key < $int_div_position):
      $arr_new_showitem[$key] = $value;
      break;
    case($key == $int_div_position):
      $arr_new_showitem[$key] = 'LLL:EXT:org/tca/locallang/fe_users.xml:fe_users.div_tx_org_company, tx_org_headquarters,';
      $arr_new_showitem[$key + 1] = 'LLL:EXT:org/tca/locallang/fe_users.xml:fe_users.div_tx_org_department, tx_org_department,';
      $arr_new_showitem[$key + 2] = 'LLL:EXT:org/tca/locallang/fe_users.xml:fe_users.div_tx_org_news, tx_org_news,';
      $arr_new_showitem[$key + 3] = 'LLL:EXT:org/tca/locallang/fe_users.xml:fe_users.div_tx_org_downloads, tx_org_downloads,';
      $arr_new_showitem[$key + 4] = $value;
      break;
    case($key > $int_div_position):
      $arr_new_showitem[$key + 4] = $value;
      break;
  }
}
$str_showitem = implode('--div--;', $arr_new_showitem);
$TCA['fe_users']['types']['0']['showitem'] = $str_showitem;

if ($bool_wizards_wo_add_and_list)
{
  unset($TCA['fe_users']['columns']['tx_org_headquarters']['config']['wizards']['add']);
  unset($TCA['fe_users']['columns']['tx_org_headquarters']['config']['wizards']['list']);
  unset($TCA['fe_users']['columns']['tx_org_department']['config']['wizards']['add']);
  unset($TCA['fe_users']['columns']['tx_org_department']['config']['wizards']['list']);
  unset($TCA['fe_users']['columns']['tx_org_downloads']['config']['wizards']['add']);
  unset($TCA['fe_users']['columns']['tx_org_downloads']['config']['wizards']['list']);
  unset($TCA['fe_users']['columns']['tx_org_news']['config']['wizards']['add']);
  unset($TCA['fe_users']['columns']['tx_org_news']['config']['wizards']['list']);
}
// Relation to fe_groups
if ($andWhere_feuser_fegroups)
{
  // Default
  // $TCA['fe_users']['columns']['usergroup']['config']['foreign_table_where'] = 'ORDER BY fe_groups.title';
  $andWhere_default = $TCA['fe_users']['columns']['usergroup']['config']['foreign_table_where'];
  $andWhere = $andWhere_feuser_fegroups . $andWhere_default;
  $TCA['fe_users']['columns']['usergroup']['config']['foreign_table_where'] = $andWhere;
}
// Relation to fe_groups

$TCA['fe_users']['ctrl']['filter'] = 'filter_for_all_fields';
$TCA['fe_users']['columns']['tx_org_headquarters']['config_filter'] = $TCA['fe_users']['columns']['tx_org_headquarters']['config'];
$TCA['fe_users']['columns']['tx_org_headquarters']['config_filter']['maxitems'] = 1;
$TCA['fe_users']['columns']['tx_org_headquarters']['config_filter']['size'] = 1;
$items = array('-99' => array('0' => '', '1' => ''));
// #32440, 120203, dwildt-
// uherrmann, 111211: #32440
//if (!empty ($TCA['fe_users']['columns']['tx_org_headquarters']['config']['items'])
//    AND is_array ($TCA['fe_users']['columns']['tx_org_headquarters']['config']['items'])) {
//	  // /#32440
//  foreach( ( array ) $TCA['fe_users']['columns']['tx_org_headquarters']['config']['items'] as $key => $arrValue)
//  {
//    $items[$key] = $arrValue;
//  }
//}
// #32440, 120203, dwildt-
// #32440, #43507, #35218, 120203, dwildt+
foreach ((array) $TCA['fe_users']['columns']['tx_org_headquarters']['config']['items'] as $key => $arrValue)
{
  $items[$key] = $arrValue;
}
// #32440, 120203, dwildt+
$TCA['fe_users']['columns']['tx_org_headquarters']['config_filter']['items'] = $items;

// fe_users
?>