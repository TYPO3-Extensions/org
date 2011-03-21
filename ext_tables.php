<?php
if (!defined ('TYPO3_MODE')) 
{
  die ('Access denied.');
}


  
  ////////////////////////////////////////////////////////////////////////////
  // 
  // INDEX
  
  // Configuration by the extension manager
  //    Localization support
  //    Store record configuration
  // Enables the Include Static Templates
  // Add pagetree icons
  // Configure third party tables
  // TCA tables


  /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
  // 
  // Configuration by the extension manager
  
$confArr  = unserialize($GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf']['org']);

  // Language for labels of static templates and page tsConfig
$llStatic = $confArr['LLstatic'];
switch($llStatic) {
  case($llStatic == 'German'):
    $llStatic = 'de';
    break;
  default:
    $llStatic = 'default';
}
  // Language for labels of static templates and page tsConfig

  // Don't exclude fe_user fields by default 
$bool_excludeFeuser = false;
if (strtolower(substr($confArr['TCA_adapt_fe_user'], 0, strlen('no'))) == 'no')
{
  $bool_excludeFeuser = true;
}
  // Don't exclude fe_user fields by default 

  // Simplify backend forms
$bool_time_control = true;
if (strtolower(substr($confArr['TCA_simplify_time_control'], 0, strlen('no'))) == 'no')
{
  $bool_time_control = false;
}
  // Simplify backend forms

  // Store record configuration
$bool_wizards_wo_add_and_list = false;
switch($confArr['store_records']) 
{
  case('Multi grouped: record groups in different directories'):
    //var_dump('MULTI');
    $str_store_record_conf        = 'pid IN (###PAGE_TSCONFIG_IDLIST###)';
    $bool_wizards_wo_add_and_list = true;
    break;
  case('Clear presented: each record group in one directory at most'):
    //var_dump('CLEAR');
    $str_store_record_conf        = 'pid IN (###PAGE_TSCONFIG_ID###)';
    $bool_wizards_wo_add_and_list = true;
    break;
  case('Easy 2: same as easy 1 but with storage pid'):
    $str_marker_pid         = '###STORAGE_PID###';
    $str_store_record_conf  = 'pid=###STORAGE_PID###';
    break;
  case('Easy 1: all in the same directory'):
  default:
    //var_dump('EASY');
    $str_store_record_conf        = 'pid=###CURRENT_PID###';
}
  // Store record configuration
  // Configuration of the extension manager



  ////////////////////////////////////////////////////////////////////////////
  // 
  // Enables the Include Static Templates

  // Case $llStatic
switch(true) {
  case($llStatic == 'de'):
      // German
    t3lib_extMgm::addStaticFile($_EXTKEY,'static/base/',                'Org: Basis (immer einbinden!)');
    t3lib_extMgm::addStaticFile($_EXTKEY,'static/department/601/',      '+Org: Abteilung');
    t3lib_extMgm::addStaticFile($_EXTKEY,'static/department/611/',      '+Org: Abteilung - Rand');
    t3lib_extMgm::addStaticFile($_EXTKEY,'static/calendar/201/',        '+Org: Kalender');
    t3lib_extMgm::addStaticFile($_EXTKEY,'static/calendar/201/expired', '+Org: +Kalender Archiv');
    t3lib_extMgm::addStaticFile($_EXTKEY,'static/calendar/211/',        '+Org: Kalender - Rand');
    t3lib_extMgm::addStaticFile($_EXTKEY,'static/news/401',             '+Org: Nachrichten');
    t3lib_extMgm::addStaticFile($_EXTKEY,'static/news/411',             '+Org: Nachrichten - Rand');
    t3lib_extMgm::addStaticFile($_EXTKEY,'static/news/499',             '+Org: Nachrichten (RSS)');
    t3lib_extMgm::addStaticFile($_EXTKEY,'static/staff/101/',           '+Org: Personal');
    t3lib_extMgm::addStaticFile($_EXTKEY,'static/staff/111/',           '+Org: Personal - Rand (nicht cachen!)');
    t3lib_extMgm::addStaticFile($_EXTKEY,'static/headquarters/501',     '+Org: Standorte');
    t3lib_extMgm::addStaticFile($_EXTKEY,'static/headquarters/511',     '+Org: Standorte - Rand');
    t3lib_extMgm::addStaticFile($_EXTKEY,'static/event/301',            '+Org: Veranstaltungen');
    t3lib_extMgm::addStaticFile($_EXTKEY,'static/event/311',            '+Org: Veranstaltungen - Rand');
    t3lib_extMgm::addStaticFile($_EXTKEY,'static/location/701',         '+Org: Veranstaltungsorte');
    t3lib_extMgm::addStaticFile($_EXTKEY,'static/location/711',         '+Org: Veranstaltorte - Rand');
    t3lib_extMgm::addStaticFile($_EXTKEY,'static/shopping_cart/801/',   '+Org: Warenkorb');
    t3lib_extMgm::addStaticFile($_EXTKEY,'static/shopping_cart/811/',   '+Org: Warenkorb - Rand');
    break;
  default:
      // English
    t3lib_extMgm::addStaticFile($_EXTKEY,'static/base/',                  'Org: Basis (obligate!)');
    t3lib_extMgm::addStaticFile($_EXTKEY,'static/calendar/201/',          '+Org: Calendar');
    t3lib_extMgm::addStaticFile($_EXTKEY,'static/calendar/201/expired/',  '+Org: + Calendar expired');
    t3lib_extMgm::addStaticFile($_EXTKEY,'static/calendar/211/',          '+Org: Calendar - margin');
    t3lib_extMgm::addStaticFile($_EXTKEY,'static/department/601/',        '+Org: Department');
    t3lib_extMgm::addStaticFile($_EXTKEY,'static/department/611/',        '+Org: Department - margin');
    t3lib_extMgm::addStaticFile($_EXTKEY,'static/event/301',              '+Org: Events');
    t3lib_extMgm::addStaticFile($_EXTKEY,'static/event/311',              '+Org: Events - margin');
    t3lib_extMgm::addStaticFile($_EXTKEY,'static/headquarters/501',       '+Org: Headquarters');
    t3lib_extMgm::addStaticFile($_EXTKEY,'static/headquarters/511',       '+Org: Headquarters - margin');
    t3lib_extMgm::addStaticFile($_EXTKEY,'static/location/701',           '+Org: Locations');
    t3lib_extMgm::addStaticFile($_EXTKEY,'static/location/711',           '+Org: Locations - margin');
    t3lib_extMgm::addStaticFile($_EXTKEY,'static/news/401',               '+Org: News');
    t3lib_extMgm::addStaticFile($_EXTKEY,'static/news/411',               '+Org: News - margin');
    t3lib_extMgm::addStaticFile($_EXTKEY,'static/news/499',               '+Org: News (RSS)');
    t3lib_extMgm::addStaticFile($_EXTKEY,'static/shopping_cart/801/',     '+Org: Shopping cart');
    t3lib_extMgm::addStaticFile($_EXTKEY,'static/shopping_cart/811/',     '+Org: Shopping cart - margin');
    t3lib_extMgm::addStaticFile($_EXTKEY,'static/staff/101/',             '+Org: Staff');
    t3lib_extMgm::addStaticFile($_EXTKEY,'static/staff/111/',             '+Org: Staff - margin (don\'t cache!)');
}
  // Case $llStatic
  // Enables the Include Static Templates



  ////////////////////////////////////////////////////////////////////////////
  // 
  // Add pagetree icons

  // Case $llStatic
switch(true) {
  case($llStatic == 'de'):
      // German
    $TCA['pages']['columns']['module']['config']['items'][] = 
       array('Org', 'org', t3lib_extMgm::extRelPath($_EXTKEY).'ext_icon.gif');
    $TCA['pages']['columns']['module']['config']['items'][] = 
       array('Org: Kalender', 'org_cal', t3lib_extMgm::extRelPath($_EXTKEY).'ext_icon/cal.gif');
    $TCA['pages']['columns']['module']['config']['items'][] = 
       array('Org: Nachrichten', 'org_news', t3lib_extMgm::extRelPath($_EXTKEY).'ext_icon/news.gif');
    $TCA['pages']['columns']['module']['config']['items'][] = 
       array('Org: Personal', 'org_staff', t3lib_extMgm::extRelPath($_EXTKEY).'ext_icon/staff.gif');
    $TCA['pages']['columns']['module']['config']['items'][] = 
       array('Org: Standorte', 'org_headq', t3lib_extMgm::extRelPath($_EXTKEY).'ext_icon/headquarters.gif');
    $TCA['pages']['columns']['module']['config']['items'][] = 
       array('Org: Veranstaltungen', 'org_event', t3lib_extMgm::extRelPath($_EXTKEY).'ext_icon/event.gif');
    $TCA['pages']['columns']['module']['config']['items'][] = 
       array('Org: Veranstaltungsorte', 'org_locat', t3lib_extMgm::extRelPath($_EXTKEY).'ext_icon/location.gif');
    break;
  default:
      // English
    $TCA['pages']['columns']['module']['config']['items'][] = 
       array('Org', 'org', t3lib_extMgm::extRelPath($_EXTKEY).'ext_icon.gif');
    $TCA['pages']['columns']['module']['config']['items'][] = 
       array('Org: Calendar', 'org_cal', t3lib_extMgm::extRelPath($_EXTKEY).'ext_icon/cal.gif');
    $TCA['pages']['columns']['module']['config']['items'][] = 
       array('Org: Event', 'org_event', t3lib_extMgm::extRelPath($_EXTKEY).'ext_icon/event.gif');
    $TCA['pages']['columns']['module']['config']['items'][] = 
       array('Org: Headquarters', 'org_headq', t3lib_extMgm::extRelPath($_EXTKEY).'ext_icon/headquarters.gif');
    $TCA['pages']['columns']['module']['config']['items'][] = 
       array('Org: Location', 'org_locat', t3lib_extMgm::extRelPath($_EXTKEY).'ext_icon/location.gif');
    $TCA['pages']['columns']['module']['config']['items'][] = 
       array('Org: News', 'org_news', t3lib_extMgm::extRelPath($_EXTKEY).'ext_icon/news.gif');
    $TCA['pages']['columns']['module']['config']['items'][] = 
       array('Org: Staff', 'org_staff', t3lib_extMgm::extRelPath($_EXTKEY).'ext_icon/staff.gif');
}
  // Case $llStatic

$ICON_TYPES['org']       = array('icon' => t3lib_extMgm::extRelPath($_EXTKEY).'ext_icon.gif');
$ICON_TYPES['org_cal']   = array('icon' => t3lib_extMgm::extRelPath($_EXTKEY).'ext_icon/cal.gif');
$ICON_TYPES['org_event'] = array('icon' => t3lib_extMgm::extRelPath($_EXTKEY).'ext_icon/event.gif');
$ICON_TYPES['org_headq'] = array('icon' => t3lib_extMgm::extRelPath($_EXTKEY).'ext_icon/headquarters.gif');
$ICON_TYPES['org_locat'] = array('icon' => t3lib_extMgm::extRelPath($_EXTKEY).'ext_icon/location.gif');
$ICON_TYPES['org_news']  = array('icon' => t3lib_extMgm::extRelPath($_EXTKEY).'ext_icon/news.gif');
$ICON_TYPES['org_staff'] = array('icon' => t3lib_extMgm::extRelPath($_EXTKEY).'ext_icon/staff.gif');

  // Add pagetree icons



  /////////////////////////////////////////////////
  //
  // Add default page and user TSconfig

t3lib_extMgm::addPageTSConfig('<INCLUDE_TYPOSCRIPT: source="FILE:EXT:' . $_EXTKEY . '/tsConfig/' . $llStatic . '/page.txt">');
  // Add default page and user TSconfig



  ////////////////////////////////////////////////////////////////////////////
  // 
  // Configure third party tables

  // fe_users
  // fe_groups

  // fe_users
t3lib_div::loadTCA('fe_users');
$TCA['fe_users']['ctrl']['title']           = 'LLL:EXT:org/locallang_db.xml:fe_users';
$TCA['fe_users']['ctrl']['label']           = 'last_name';
$TCA['fe_users']['ctrl']['label_alt']       = 'first_name, username';
$TCA['fe_users']['ctrl']['label_alt_force'] = true;
$TCA['fe_users']['ctrl']['default_sortby']  = 'ORDER BY last_name';
$TCA['fe_users']['ctrl']['thumbnail']       = 'image';


  // Don't exclude any field by default'
if(!$bool_excludeFeuser)
{
  foreach($TCA['fe_users']['columns'] as $key => $arr_column)
  {
    if(isset($TCA['fe_users']['columns'][$key]['exclude']))
    {
      $TCA['fe_users']['columns'][$key]['exclude'] = 0;
    }
  }
}
$TCA['fe_users']['columns']['starttime']['exclude']     = $bool_time_control;
$TCA['fe_users']['columns']['endtime']['exclude']       = $bool_time_control;
$TCA['fe_users']['columns']['TSconfig']['exclude']      = 1;
$TCA['fe_users']['columns']['lockToDomain']['exclude']  = 1;
  // Don't exclude any field by default'

  // Add fields tx_org_news, tx_org_department, tx_org_imagecaption, tx_org_imageseo, tx_org_vita
$showRecordFieldList = $TCA['fe_users']['interface']['showRecordFieldList'];
$showRecordFieldList = $showRecordFieldList.',tx_org_news,tx_org_department,tx_org_imagecaption,tx_org_imageseo,tx_org_vita';
$TCA['fe_users']['interface']['showRecordFieldList'] = $showRecordFieldList;
  // Add fields tx_org_news, tx_org_department, tx_org_imagecaption, tx_org_imageseo, tx_org_vita

$TCA['fe_users']['columns']['www']['config'] = array (
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
      'JSopenParams' => 'height=300,width=500,status=0,menubar=0,scrollbars=1',
    ),
  ),
  'softref' => 'typolink',
);
  // Add fields tx_org_news, tx_org_department, tx_org_vita, tx_org_imagecaption, tx_org_imageseo
$TCA['fe_users']['columns']['tx_org_news'] = array (
  'exclude' => 0,
  'label' => 'LLL:EXT:org/locallang_db.xml:tca_phrase.news',
  'config' => array (
    'type' => 'select', 
    'size' => 10, 
    'minitems' => 0,
    'maxitems' => 999,
    'MM'                  => 'fe_users_mm_tx_org_news',
    'foreign_table'       => 'tx_org_news',
    'foreign_table_where' => 'AND tx_org_news.' . $str_store_record_conf . ' ORDER BY tx_org_news.datetime DESC, tx_org_news.title',
    'wizards' => array(
      '_PADDING'  => 2,
      '_VERTICAL' => 0,
      'add' => array(
        'type'   => 'script',
        'title'  => 'LLL:EXT:org/locallang_db.xml:wizard.news.add',
        'icon'   => 'add.gif',
        'params' => array(
          'table'    => 'tx_org_news',
          'pid'      => '###CURRENT_PID###',
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
          'pid'   => '###CURRENT_PID###',
        ),
        'script' => 'wizard_list.php',
      ),
      'edit' => array(
        'type'                      => 'popup',
        'title'                     => 'LLL:EXT:org/locallang_db.xml:wizard.news.edit',
        'script'                    => 'wizard_edit.php',
        'popup_onlyOpenIfSelected'  => 1,
        'icon'                      => 'edit2.gif',
        'JSopenParams'              => 'height=350,width=580,status=0,menubar=0,scrollbars=1',
      ),
    ),
  ),
);
$TCA['fe_users']['columns']['tx_org_department'] = array (
  'exclude' => 0,
  'label' => 'LLL:EXT:org/locallang_db.xml:fe_users.tx_org_department',
  'config' => array (
    'type' => 'select', 
    'size' => 20, 
    'minitems' => 0,
    'maxitems' => 999,
    'MM'                  => 'tx_org_department_mm_fe_users',
    'MM_opposite_field'   => 'fe_users',
    'foreign_table'       => 'tx_org_department',
    'foreign_table_where' =>  'AND tx_org_department.' . $str_store_record_conf . ' '.
                              'ORDER BY tx_org_department.sorting',
    'wizards' => array(
      '_PADDING'  => 2,
      '_VERTICAL' => 0,
      'add' => array(
        'type'   => 'script',
        'title'  => 'LLL:EXT:org/locallang_db.xml:wizard.org.add',
        'icon'   => 'add.gif',
        'params' => array(
          'table'    => 'tx_org_department',
          'pid'      => '###CURRENT_PID###',
          'setValue' => 'prepend'
        ),
        'script' => 'wizard_add.php',
      ),
      'list' => array(
        'type'   => 'script',
        'title'  => 'LLL:EXT:org/locallang_db.xml:wizard.org.list',
        'icon'   => 'list.gif',
        'params' => array(
          'table' => 'tx_org_department',
          'pid'   => '###CURRENT_PID###',
        ),
        'script' => 'wizard_list.php',
      ),
      'edit' => array(
        'type'                      => 'popup',
        'title'                     => 'LLL:EXT:org/locallang_db.xml:wizard.org.edit',
        'script'                    => 'wizard_edit.php',
        'popup_onlyOpenIfSelected'  => 1,
        'icon'                      => 'edit2.gif',
        'JSopenParams'              => 'height=350,width=580,status=0,menubar=0,scrollbars=1',
      ),
    ),
  ),
);

$TCA['fe_users']['columns']['tx_org_imagecaption'] = array (
//$columns['tx_org_imagecaption'] = array (
  'exclude' => 0,
  'label'   => 'LLL:EXT:org/locallang_db.xml:tca_phrase.imagecaption',
  'config'  => array (
    'type' => 'text',
    'cols' => '30', 
    'rows' => '5',
  ),
);

$TCA['fe_users']['columns']['tx_org_imageseo'] = array (
//$columns['tx_org_imageseo'] = array (
  'exclude' => 0,
  'label'   => 'LLL:EXT:org/locallang_db.xml:tca_phrase.imageseo',
  'config'  => array (
    'type' => 'text',
    'cols' => '30', 
    'rows' => '5',
  ),
);

$TCA['fe_users']['columns']['tx_org_vita'] = array (
  'label'   => 'LLL:EXT:org/locallang_db.xml:fe_users.tx_org_vita',
  'exclude' => 0,
  'config'  => array (
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
  ),
);
  // Add fields tx_org_news, fe_users, tx_org_vita, tx_org_imagecaption, tx_org_imageseo

// Insert div [org] at position $int_div_position
$str_showitem = $TCA['fe_users']['types']['0']['showitem'];
$arr_showitem = explode('--div--;', $str_showitem);
$int_div_position = 2;
foreach($arr_showitem as $key => $value)
{
  switch(true)
  {
    case($key == 1):
      $arr_new_showitem[$key] = $value.'tx_org_imagecaption, tx_org_imageseo, tx_org_vita;;;richtext[]:rte_transform[mode=ts];4-4-4,';
      break;
    case($key < $int_div_position):
      $arr_new_showitem[$key] = $value;
      break;
    case($key == $int_div_position):
//      $arr_new_showitem[$key]     = 'LLL:EXT:org/locallang_db.xml:fe_users.div_org, tx_org_department,';
      $arr_new_showitem[$key]     = 'LLL:EXT:org/locallang_db.xml:fe_users.div_tx_org_department, tx_org_department,';
      $arr_new_showitem[$key + 1] = 'LLL:EXT:org/locallang_db.xml:fe_users.div_tx_org_news, tx_org_news,';
      $arr_new_showitem[$key + 2] = $value;
      break;
    case($key > $int_div_position):
      $arr_new_showitem[$key + 2] = $value;
      break;
  }
}
$str_showitem = implode('--div--;', $arr_new_showitem);
$TCA['fe_users']['types']['0']['showitem'] = $str_showitem;

if($bool_wizards_wo_add_and_list)
{
  unset($TCA['fe_users']['columns']['tx_org_department']['config']['wizards']['add']);
  unset($TCA['fe_users']['columns']['tx_org_department']['config']['wizards']['list']);
  unset($TCA['fe_users']['columns']['tx_org_news']['config']['wizards']['add']);
  unset($TCA['fe_users']['columns']['tx_org_news']['config']['wizards']['list']);
}  
  // fe_users

  // fe_groups
t3lib_div::loadTCA('fe_groups');
$TCA['fe_groups']['ctrl']['title']          = 'LLL:EXT:org/locallang_db.xml:fe_groups';
$TCA['fe_groups']['ctrl']['default_sortby'] = 'ORDER BY title';
  // fe_groups

  // Configure third party tables



  ////////////////////////////////////////////////////////////////////////////
  // 
  // TCA tables

  // news
  // newscat
  // cal
  // calentrance
  // caltype
  // event
  // location
  // headquarters
  // department
  // departmentcat

  // news ////////////////////////////////////////////////////////////////////
$TCA['tx_org_news'] = array (
  'ctrl' => array (
    'title'             => 'LLL:EXT:org/locallang_db.xml:tx_org_news',
    'label'             => 'datetime',
    'label_alt'         => 'title',
    'label_alt_force'   => true,
    'tstamp'            => 'tstamp',
    'crdate'            => 'crdate',
    'cruser_id'         => 'cruser_id',
    'languageField'             => 'sys_language_uid',
    'transOrigPointerField'     => 'l10n_parent',
    'transOrigDiffSourceField'  => 'l10n_diffsource',
    'default_sortby'    => 'ORDER BY datetime DESC, title',
    'delete'            => 'deleted',
    'enablecolumns'     => array (
      'disabled'  => 'hidden',
      'starttime' => 'starttime',
      'endtime'   => 'endtime',
      'fe_group'  => 'fe_group',
    ),
    'dividers2tabs'     => true,
    'hideAtCopy'        => true,
    'dynamicConfigFile' => t3lib_extMgm::extPath($_EXTKEY).'tca.php',
    'thumbnail'         => 'image',
    'iconfile'          => t3lib_extMgm::extRelPath($_EXTKEY).'ext_icon/news.gif',
    'type'              => 'type',
    'typeicon_column'   => 'type',
    'typeicons'         => array(
      'news'      => '../typo3conf/ext/org/ext_icon/news.gif',
      'newspage'  => '../typo3conf/ext/org/ext_icon/newspage.gif',
      'newsurl'   => '../typo3conf/ext/org/ext_icon/newsurl.gif',
    ),
  ),
);
  // news ////////////////////////////////////////////////////////////////////

  // newscat ////////////////////////////////////////////////////////////////////
$TCA['tx_org_newscat'] = array (
  'ctrl' => array (
    'title'           => 'LLL:EXT:org/locallang_db.xml:tx_org_newscat',
    'label'           => 'title',
    'tstamp'          => 'tstamp',
    'crdate'          => 'crdate',
    'default_sortby'  => 'ORDER BY title',
    'delete'          => 'deleted',
    'enablecolumns'   => array (
      'disabled'  => 'hidden',
    ),
    'hideAtCopy'        => false,
    'dividers2tabs'     => true,
    'dynamicConfigFile' => t3lib_extMgm::extPath($_EXTKEY).'tca.php',
    'thumbnail'         => 'image',
    'iconfile'          => t3lib_extMgm::extRelPath($_EXTKEY).'ext_icon/newscat.gif',
  )
);
  // newscat ////////////////////////////////////////////////////////////////////

  // cal /////////////////////////////////////////////////////////////////////
$TCA['tx_org_cal'] = array (
  'ctrl' => array (
    'title'             => 'LLL:EXT:org/locallang_db.xml:tx_org_cal',
    'label'             => 'datetime',
    'label_alt'         => 'title',
    'label_alt_force'   => true,
    'tstamp'            => 'tstamp',
    'crdate'            => 'crdate',
    'cruser_id'         => 'cruser_id',
    'default_sortby'    => 'ORDER BY datetime DESC, title',
    'delete'            => 'deleted',
    'enablecolumns'     => array (
      'disabled'  => 'hidden',
      'starttime' => 'starttime',
      'endtime'   => 'endtime',
      'fe_group'  => 'fe_group',
    ),
    'dividers2tabs'     => true,
    'hideAtCopy'        => true,
    'dynamicConfigFile' => t3lib_extMgm::extPath($_EXTKEY).'tca.php',
    'thumbnail'         => 'image',
    'iconfile'          => t3lib_extMgm::extRelPath($_EXTKEY).'ext_icon/cal.gif',
    'type'              => 'type',
    'typeicon_column'   => 'type',
    'typeicons'         => array(
      '0'             => '../typo3conf/ext/org/ext_icon/cal.gif',
      'calpage'       => '../typo3conf/ext/org/ext_icon/calpage.gif',
      'calurl'        => '../typo3conf/ext/org/ext_icon/calurl.gif',
      'tx_org_event'  => '../typo3conf/ext/org/ext_icon/event.gif',
    ),
  ),
);
  // cal /////////////////////////////////////////////////////////////////////

  // calentrance //////////////////////////////////////////////////////////////////
$TCA['tx_org_calentrance'] = array (
  'ctrl' => array (
    'title'             => 'LLL:EXT:org/locallang_db.xml:tx_org_calentrance',
    'label'             => 'title',
    'label_alt'         => 'value',
    'label_alt_force'   => true,
    'tstamp'            => 'tstamp',
    'crdate'            => 'crdate',
    'cruser_id'         => 'cruser_id',
    'default_sortby'    => 'ORDER BY title',
    'delete'            => 'deleted',
    'enablecolumns'     => array (
      'disabled'  => 'hidden',
      'fe_group'  => 'fe_group',
      'starttime' => 'starttime',
      'endtime'   => 'endtime',
    ),
    'dividers2tabs'     => true,
    'hideAtCopy'        => false,
    'dynamicConfigFile' => t3lib_extMgm::extPath($_EXTKEY).'tca.php',
    'thumbnail'         => 'image',
    'iconfile'          => t3lib_extMgm::extRelPath($_EXTKEY).'ext_icon/calentrance.gif',
  ),
);
  // calentrance //////////////////////////////////////////////////////////////////

  // caltype ///////////////////////////////////////////////////////////////////
$TCA['tx_org_caltype'] = array (
  'ctrl' => array (
    'title'             => 'LLL:EXT:org/locallang_db.xml:tx_org_caltype',
    'label'             => 'title',
    'tstamp'            => 'tstamp',
    'crdate'            => 'crdate',
    'cruser_id'         => 'cruser_id',
    'default_sortby'    => 'ORDER BY title',
    'delete'            => 'deleted',
    'enablecolumns'     => array (
      'disabled'  => 'hidden',
    ),
    'dividers2tabs'     => true,
    'hideAtCopy'        => false,
    'dynamicConfigFile' => t3lib_extMgm::extPath($_EXTKEY).'tca.php',
    'thumbnail'         => 'image',
    'iconfile'          => t3lib_extMgm::extRelPath($_EXTKEY).'ext_icon/caltype.gif',
  ),
);
  // caltype ///////////////////////////////////////////////////////////////////

  // event ///////////////////////////////////////////////////////////////////
$TCA['tx_org_event'] = array (
  'ctrl' => array (
    'title'             => 'LLL:EXT:org/locallang_db.xml:tx_org_event',
    'label'             => 'title',
    'tstamp'            => 'tstamp',
    'crdate'            => 'crdate',
    'cruser_id'         => 'cruser_id',
    'default_sortby'    => 'ORDER BY title',
    'delete'            => 'deleted',
    'enablecolumns'     => array (
      'disabled'  => 'hidden',
      'fe_group'  => 'fe_group',
    ),
    'dividers2tabs'     => true,
    'hideAtCopy'        => false,
    'dynamicConfigFile' => t3lib_extMgm::extPath($_EXTKEY).'tca.php',
    'thumbnail'         => 'image',
    'iconfile'          => t3lib_extMgm::extRelPath($_EXTKEY).'ext_icon/event.gif',
  ),
);
  // event ///////////////////////////////////////////////////////////////////

  // location ////////////////////////////////////////////////////////////////
$TCA['tx_org_location'] = array (
  'ctrl' => array (
    'title'             => 'LLL:EXT:org/locallang_db.xml:tx_org_location',
    'label'             => 'title',
    'label_alt'         => 'mail_city',
    'label_alt_force'   => true,
    'tstamp'            => 'tstamp',
    'crdate'            => 'crdate',
    'cruser_id'         => 'cruser_id',
    'sortby'            => 'sorting',
    'delete'            => 'deleted',
    'enablecolumns'     => array (
      'disabled'  => 'hidden',
      'fe_group'  => 'fe_group',
    ),
    'dividers2tabs'     => true,
    'hideAtCopy'        => true,
    'dynamicConfigFile' => t3lib_extMgm::extPath($_EXTKEY).'tca.php',
    'thumbnail'         => 'image',
    'iconfile'          => t3lib_extMgm::extRelPath($_EXTKEY).'ext_icon/location.gif',
  ),
);
  // location ////////////////////////////////////////////////////////////////

  // headquarters //////////////////////////////////////////////////////////////////
$TCA['tx_org_headquarters'] = array (
  'ctrl' => array (
    'title'     => 'LLL:EXT:org/locallang_db.xml:tx_org_headquarters',
    'label'     => 'title',
    'tstamp'    => 'tstamp',
    'crdate'    => 'crdate',
    'cruser_id' => 'cruser_id',
    'sortby'    => 'sorting',
    'delete'    => 'deleted',
    'enablecolumns' => array (
      'disabled'  => 'hidden',
      'fe_group'  => 'fe_group',
    ),
    'dividers2tabs'     => true,
    'hideAtCopy'        => true,
    'dynamicConfigFile' => t3lib_extMgm::extPath($_EXTKEY).'tca.php',
    'thumbnail'         => 'image',
    'iconfile'          => t3lib_extMgm::extRelPath($_EXTKEY).'ext_icon/headquarters.gif',
  ),
);
  // headquarters //////////////////////////////////////////////////////////////////

  // org /////////////////////////////////////////////////////////////////////
$TCA['tx_org_department'] = array (
  'ctrl' => array (
    'title'             => 'LLL:EXT:org/locallang_db.xml:tx_org_department',
    'label'             => 'title',
    'tstamp'            => 'tstamp',
    'crdate'            => 'crdate',
    'cruser_id'         => 'cruser_id',
    'sortby'            => 'sorting',
    'delete'            => 'deleted',
    'enablecolumns'     => array (
      'disabled'  => 'hidden',
      'fe_group'  => 'fe_group',
    ),
    'dividers2tabs'     => true,
    'hideAtCopy'        => true,
    'dynamicConfigFile' => t3lib_extMgm::extPath($_EXTKEY).'tca.php',
    'thumbnail'         => 'image',
    'iconfile'          => t3lib_extMgm::extRelPath($_EXTKEY).'ext_icon/department.gif',
  ),
);
  // org /////////////////////////////////////////////////////////////////////

  // departmentcat ////////////////////////////////////////////////////////////////////
$TCA['tx_org_departmentcat'] = array (
  'ctrl' => array (
    'title'         => 'LLL:EXT:org/locallang_db.xml:tx_org_departmentcat',
    'label'         => 'title',
    'tstamp'        => 'tstamp',
    'crdate'        => 'crdate',
    'sortby'        => 'sorting',
    'delete'        => 'deleted',
    'enablecolumns' => array (
      'disabled'  => 'hidden',
    ),
    'hideAtCopy'        => false,
    'dividers2tabs'     => true,
    'dynamicConfigFile' => t3lib_extMgm::extPath($_EXTKEY).'tca.php',
    'thumbnail'         => 'image',
    'iconfile'          => t3lib_extMgm::extRelPath($_EXTKEY).'ext_icon/departmentcat.gif',
  )
);
  // departmentcat ////////////////////////////////////////////////////////////////////

  // tax /////////////////////////////////////////////////////////////////////
$TCA['tx_org_tax'] = array (
  'ctrl' => array (
    'title'             => 'LLL:EXT:org/locallang_db.xml:tx_org_tax',
    'label'             => 'value',
    'label_alt'         => 'title',
    'label_alt_force'   => true,
    'tstamp'            => 'tstamp',
    'crdate'            => 'crdate',
    'cruser_id'         => 'cruser_id',
    'default_sortby'    => 'ORDER BY value ASC',
    'delete'            => 'deleted',
    'enablecolumns'     => array (
      'disabled'  => 'hidden',
      'starttime' => 'starttime',
      'endtime'   => 'endtime',
    ),
    'dividers2tabs'     => true,
    'hideAtCopy'        => true,
    'dynamicConfigFile' => t3lib_extMgm::extPath($_EXTKEY).'tca.php',
    'thumbnail'         => 'image',
    'iconfile'          => t3lib_extMgm::extRelPath($_EXTKEY).'ext_icon/tax.gif',
  ),
);
  // tax /////////////////////////////////////////////////////////////////////

  // TCA tables //////////////////////////////////////////////////////////////

?>