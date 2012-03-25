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

  // Relation fe_users to company
switch ($confArr['TCA_fe_user_company'])
{
  case('Big') :
    $bool_exclude_fe_user_company             = true;
    $bool_exclude_fe_user_tx_org_company      = true;
    $bool_exclude_fe_user_tx_org_department   = false;
    $bool_exclude_tx_org_company              = false;
    $bool_exclude_tx_org_company_fe_users     = true;
    $bool_exclude_tx_org_department           = false;
    $bool_exclude_tx_org_department_fe_users  = false;
    break;
  case('Small (recommended)') :
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

  // Store record configuration
$bool_wizards_wo_add_and_list = false;
switch($confArr['store_records'])
{
    // IN CASE OF CHANGES: BE AWARE OF THE ORGANISER INSTALLER!
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

  // Store fe_groups configuration
//$bool_wizards_wo_add_and_list = false;
$andWhere_feuser_fegroups   = false;
$andWhere_fegroups_subgroup = false;
switch($confArr['store_fe_groups'])
{
    // IN CASE OF CHANGES: BE AWARE OF THE ORGANISER INSTALLER!
  case('Managed by page TSconfig (list)'):
    $andWhere_feuser_fegroups   = 'AND fe_groups.pid IN (###PAGE_TSCONFIG_IDLIST###) ';
    $andWhere_fegroups_subgroup = 'AND fe_groups.pid IN (###PAGE_TSCONFIG_IDLIST###) ';
    break;
  case('Managed by page TSconfig (ID)'):
    $andWhere_feuser_fegroups   = 'AND fe_groups.pid=###PAGE_TSCONFIG_ID### ';
    $andWhere_fegroups_subgroup = 'AND fe_groups.pid=###PAGE_TSCONFIG_ID### ';
    break;
  case('Managed by general record storage page (not recommended)'):
    $andWhere_feuser_fegroups   = 'AND fe_groups.pid=###STORAGE_PID### ';
    $andWhere_fegroups_subgroup = 'AND fe_groups.pid=###STORAGE_PID### ';
    break;
  case('Store it everywhere (TYPO3 default)'):
  default:
    $andWhere_feuser_fegroups   = false;
    $andWhere_fegroups_subgroup = false;
}
  // Store fe_groups configuration
  // Configuration of the extension manager



  ////////////////////////////////////////////////////////////////////////////
  //
  // Enables the Include Static Templates

  // Case $llStatic
switch(true) {
  case($llStatic == 'de'):
      // German
    t3lib_extMgm::addStaticFile($_EXTKEY,'static/base/',                  'Org: Basis (immer einbinden!)');
    t3lib_extMgm::addStaticFile($_EXTKEY,'static/department/601/',        '+Org: Abteilung');
    t3lib_extMgm::addStaticFile($_EXTKEY,'static/department/611/',        '+Org: Abteilung - Rand');
    t3lib_extMgm::addStaticFile($_EXTKEY,'static/downloads/301/',         '+Org: Downloads');
    t3lib_extMgm::addStaticFile($_EXTKEY,'static/downloads/311/',         '+Org: Downloads - TOP 5');
    t3lib_extMgm::addStaticFile($_EXTKEY,'static/downloads/302/',         '+Org: Downloads Kategorien');
    t3lib_extMgm::addStaticFile($_EXTKEY,'static/calendar/201/',          '+Org: Kalender');
    t3lib_extMgm::addStaticFile($_EXTKEY,'static/calendar/201/expired/',  '+Org: Kalender +Archiv');
    t3lib_extMgm::addStaticFile($_EXTKEY,'static/calendar/211/',          '+Org: Kalender - Rand');
    t3lib_extMgm::addStaticFile($_EXTKEY,'static/news/401/',              '+Org: Nachrichten');
    t3lib_extMgm::addStaticFile($_EXTKEY,'static/news/411/',              '+Org: Nachrichten - Rand');
    t3lib_extMgm::addStaticFile($_EXTKEY,'static/news/499/',              '+Org: Nachrichten (RSS)');
    t3lib_extMgm::addStaticFile($_EXTKEY,'static/staff/101/',             '+Org: Personal');
    t3lib_extMgm::addStaticFile($_EXTKEY,'static/staff/111/',             '+Org: Personal - Rand (nicht cachen!)');
    t3lib_extMgm::addStaticFile($_EXTKEY,'static/headquarters/501/',      '+Org: Standorte');
    t3lib_extMgm::addStaticFile($_EXTKEY,'static/headquarters/511/',      '+Org: Standorte - Rand');
    t3lib_extMgm::addStaticFile($_EXTKEY,'static/location/701/',          '+Org: Veranstaltungsorte');
    t3lib_extMgm::addStaticFile($_EXTKEY,'static/location/711/',          '+Org: Veranstaltorte - Rand');
    t3lib_extMgm::addStaticFile($_EXTKEY,'static/shopping_cart/821/',     '+Org: Warenkorb Downloads');
    t3lib_extMgm::addStaticFile($_EXTKEY,'static/shopping_cart/801/',     '+Org: Warenkorb Tickets');
    t3lib_extMgm::addStaticFile($_EXTKEY,'static/shopping_cart/811/',     '+Org: Warenkorb Tickets - Rand');
    break;
  default:
      // English
    t3lib_extMgm::addStaticFile($_EXTKEY,'static/base/',                  'Org: Basis (obligate!)');
    t3lib_extMgm::addStaticFile($_EXTKEY,'static/calendar/201/',          '+Org: Calendar');
    t3lib_extMgm::addStaticFile($_EXTKEY,'static/calendar/201/expired/',  '+Org: Calendar +expired');
    t3lib_extMgm::addStaticFile($_EXTKEY,'static/calendar/211/',          '+Org: Calendar - margin');
    t3lib_extMgm::addStaticFile($_EXTKEY,'static/department/601/',        '+Org: Department');
    t3lib_extMgm::addStaticFile($_EXTKEY,'static/department/611/',        '+Org: Department - margin');
    t3lib_extMgm::addStaticFile($_EXTKEY,'static/downloads/301/',         '+Org: Downloads');
    t3lib_extMgm::addStaticFile($_EXTKEY,'static/downloads/311/',         '+Org: Downloads - TOP 5');
    t3lib_extMgm::addStaticFile($_EXTKEY,'static/downloads/302/',         '+Org: Downloads categories');
    t3lib_extMgm::addStaticFile($_EXTKEY,'static/headquarters/501/',      '+Org: Headquarters');
    t3lib_extMgm::addStaticFile($_EXTKEY,'static/headquarters/511/',      '+Org: Headquarters - margin');
    t3lib_extMgm::addStaticFile($_EXTKEY,'static/location/701/',          '+Org: Locations');
    t3lib_extMgm::addStaticFile($_EXTKEY,'static/location/711/',          '+Org: Locations - margin');
    t3lib_extMgm::addStaticFile($_EXTKEY,'static/news/401/',              '+Org: News');
    t3lib_extMgm::addStaticFile($_EXTKEY,'static/news/411/',              '+Org: News - margin');
    t3lib_extMgm::addStaticFile($_EXTKEY,'static/news/499/',              '+Org: News (RSS)');
    t3lib_extMgm::addStaticFile($_EXTKEY,'static/shopping_cart/821/',     '+Org: Shopping cart for downloads');
    t3lib_extMgm::addStaticFile($_EXTKEY,'static/shopping_cart/801/',     '+Org: Shopping cart for tickets');
    t3lib_extMgm::addStaticFile($_EXTKEY,'static/shopping_cart/811/',     '+Org: Shopping cart for tickets - margin');
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
       array('Org: Downloads', 'org_dwnlds', t3lib_extMgm::extRelPath($_EXTKEY).'ext_icon/download.gif');
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
       array('Org: Downloads', 'org_dwnlds', t3lib_extMgm::extRelPath($_EXTKEY).'ext_icon/download.gif');
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

  //  #34858, 120320, dwildt
t3lib_SpriteManager::addTcaTypeIcon('pages', 'contains-org', '../typo3conf/ext/org/ext_icon.gif');
t3lib_SpriteManager::addTcaTypeIcon('pages', 'contains-org_cal', '../typo3conf/ext/org/ext_icon/cal.gif');
t3lib_SpriteManager::addTcaTypeIcon('pages', 'contains-org_dwnlds', '../typo3conf/ext/org/ext_icon/download.gif');
t3lib_SpriteManager::addTcaTypeIcon('pages', 'contains-org_event', '../typo3conf/ext/org/ext_icon/event.gif');
t3lib_SpriteManager::addTcaTypeIcon('pages', 'contains-org_headq', '../typo3conf/ext/org/ext_icon/headquarters.gif');
t3lib_SpriteManager::addTcaTypeIcon('pages', 'contains-org_locat', '../typo3conf/ext/org/ext_icon/location.gif');
t3lib_SpriteManager::addTcaTypeIcon('pages', 'contains-org_news', '../typo3conf/ext/org/ext_icon/news.gif');
t3lib_SpriteManager::addTcaTypeIcon('pages', 'contains-org_staff', '../typo3conf/ext/org/ext_icon/staff.gif');

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
  // sys_template

  // fe_users
t3lib_div::loadTCA('fe_users');
$TCA['fe_users']['ctrl']['title']           = 'LLL:EXT:org/locallang_db.xml:fe_users';
$TCA['fe_users']['ctrl']['label']           = 'last_name';
$TCA['fe_users']['ctrl']['label_alt']       = 'first_name, username';
$TCA['fe_users']['ctrl']['label_alt_force'] = true;
$TCA['fe_users']['ctrl']['default_sortby']  = 'ORDER BY last_name';
$TCA['fe_users']['ctrl']['thumbnail']       = 'image';

//  // Localize fe_users
//$TCA['fe_users']['ctrl']['languageField']             = 'sys_language_uid';
//$TCA['fe_users']['ctrl']['transOrigPointerField']     = 'l10n_parent';
//$TCA['fe_users']['ctrl']['transOrigDiffSourceField']  = 'l10n_diffsource';
//$TCA['fe_users']['columns'] = array
//(
//  'sys_language_uid' => array (
//    'exclude' => 1,
//    'label'   => 'LLL:EXT:lang/locallang_general.php:LGL.language',
//    'config'  => array (
//      'type'                => 'select',
//      'foreign_table'       => 'sys_language',
//      'foreign_table_where' => 'ORDER BY sys_language.title',
//      'items' => array (
//        array ('LLL:EXT:lang/locallang_general.php:LGL.allLanguages',-1),
//        array ('LLL:EXT:lang/locallang_general.php:LGL.default_value',0)
//      )
//    )
//  ),
//  'l10n_parent' => array (
//    'displayCond' => 'FIELD:sys_language_uid:>:0',
//    'exclude' => 1,
//    'label' => 'LLL:EXT:lang/locallang_general.php:LGL.l10n_parent',
//    'config' => array (
//      'type' => 'select',
//      'items' => array (
//        array ('', 0),
//      ),
//      'foreign_table' => 'fe_users',
//      'foreign_table_where' => 'AND fe_users.uid=###REC_FIELD_l10n_parent### AND fe_users.sys_language_uid IN (-1,0)',
//    )
//  ),
//  'l10n_diffsource' => array (
//    'config' => array (
//      'type' => 'passthrough'
//    )
//  ),
//);
//  // Localize fe_users

  // Don't exclude any field by default'
if(!$bool_excludeFeuser)
{
  foreach( ( array ) $TCA['fe_users']['columns'] as $key => $arr_column)
  {
    if(isset($TCA['fe_users']['columns'][$key]['exclude']))
    {
      $TCA['fe_users']['columns'][$key]['exclude'] = 0;
    }
  }
}
$TCA['fe_users']['columns']['first_name']['config']['eval'] = 'trim,required';
$TCA['fe_users']['columns']['last_name']['config']['eval']  = 'trim,required';
$TCA['fe_users']['columns']['company']['exclude']       = $bool_exclude_fe_user_company;
$TCA['fe_users']['columns']['starttime']['exclude']     = $bool_time_control;
$TCA['fe_users']['columns']['endtime']['exclude']       = $bool_time_control;
$TCA['fe_users']['columns']['TSconfig']['exclude']      = 1;
$TCA['fe_users']['columns']['lockToDomain']['exclude']  = 1;
  // Don't exclude any field by default'

  // Add fields tx_org_news, tx_org_headquarters, tx_org_department, tx_org_imagecaption, tx_org_imageseo, tx_org_vita, tx_org_downloads
$showRecordFieldList = $TCA['fe_users']['interface']['showRecordFieldList'];
$showRecordFieldList = $showRecordFieldList.',tx_org_news,tx_org_headquarters,tx_org_department,tx_org_imagecaption,tx_org_imageseo,tx_org_vita,tx_org_downloads';
$TCA['fe_users']['interface']['showRecordFieldList'] = $showRecordFieldList;
  // Add fields tx_org_news, tx_org_headquarters, tx_org_department, tx_org_imagecaption, tx_org_imageseo, tx_org_vita, tx_org_downloads

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
  // Add fields tx_org_news, tx_org_headquarters, tx_org_department, tx_org_imagecaption, tx_org_imageseo, tx_org_vita, tx_org_downloads
$TCA['fe_users']['columns']['tx_org_news'] = array (
  'exclude' => 0,
  'label' => 'LLL:EXT:org/locallang_db.xml:tca_phrase.news',
  'config' => array (
    'type' => 'select',
    'size' => 10,
    'minitems' => 0,
    'maxitems' => 999,
    'MM'                  =>  'fe_users_mm_tx_org_news',
    'foreign_table'       =>  'tx_org_news',
    'foreign_table_where' =>  'AND tx_org_news.' . $str_store_record_conf . ' ' .
                              'AND tx_org_news.deleted = 0 AND tx_org_news.hidden = 0 ' .
                              'AND tx_org_news.sys_language_uid=###REC_FIELD_sys_language_uid### ' .
                              'ORDER BY tx_org_news.datetime DESC, tx_org_news.title',
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

$TCA['fe_users']['columns']['tx_org_headquarters'] = array (
  'exclude' => $bool_exclude_fe_user_tx_org_company,
  'label' => 'LLL:EXT:org/locallang_db.xml:fe_users.tx_org_headquarters',
  'config' => array (
    'type' => 'select',
    'size' => 20,
    'minitems' => 0,
    'maxitems' => 999,
    'MM'                  => 'tx_org_headquarters_mm_fe_users',
    'MM_opposite_field'   => 'fe_users',
    'foreign_table'       => 'tx_org_headquarters',
    'foreign_table_where' =>  'AND tx_org_headquarters.' . $str_store_record_conf . ' ' .
                              'AND tx_org_headquarters.deleted = 0 AND tx_org_headquarters.hidden = 0 ' .
                              'AND tx_org_headquarters.sys_language_uid=###REC_FIELD_sys_language_uid### ' .
                              'ORDER BY tx_org_headquarters.title',
    'wizards' => array(
      '_PADDING'  => 2,
      '_VERTICAL' => 0,
      'add' => array(
        'type'   => 'script',
        'title'  => 'LLL:EXT:org/locallang_db.xml:wizard.org.add',
        'icon'   => 'add.gif',
        'params' => array(
          'table'    => 'tx_org_headquarters',
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
          'table' => 'tx_org_headquarters',
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

$TCA['fe_users']['columns']['tx_org_department'] = array (
  'exclude' => $bool_exclude_fe_user_tx_org_department,
  'label' => 'LLL:EXT:org/locallang_db.xml:fe_users.tx_org_department',
  'config' => array (
    'type' => 'select',
    'size' => 20,
    'minitems' => 0,
    'maxitems' => 999,
    'MM'                  => 'tx_org_department_mm_fe_users',
    'MM_opposite_field'   => 'fe_users',
    'foreign_table'       => 'tx_org_department',
    'foreign_table_where' =>  'AND tx_org_department.' . $str_store_record_conf . ' ' .
                              'AND tx_org_department.deleted = 0 AND tx_org_department.hidden = 0 ' .
                              'AND tx_org_department.sys_language_uid=###REC_FIELD_sys_language_uid### ' .
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
$TCA['fe_users']['columns']['tx_org_downloads'] = array (
  'exclude' => 0,
  'label' => 'LLL:EXT:org/locallang_db.xml:tca_phrase.downloads',
  'config' => array (
    'type' => 'select',
    'size' => 10,
    'minitems' => 0,
    'maxitems' => 999,
    'MM'                  =>  'fe_users_mm_tx_org_downloads',
    'foreign_table'       =>  'tx_org_downloads',
    'foreign_table_where' =>  'AND tx_org_downloads.' . $str_store_record_conf . ' ' .
                              'AND tx_org_downloads.deleted = 0 AND tx_org_downloads.hidden = 0 ' .
                              'AND tx_org_downloads.sys_language_uid=###REC_FIELD_sys_language_uid### ' .
                              'ORDER BY tx_org_downloads.datetime DESC, tx_org_downloads.title',
    'wizards' => array(
      '_PADDING'  => 2,
      '_VERTICAL' => 0,
      'add' => array(
        'type'   => 'script',
        'title'  => 'LLL:EXT:org/locallang_db.xml:wizard.doc.add',
        'icon'   => 'add.gif',
        'params' => array(
          'table'    => 'tx_org_downloads',
          'pid'      => '###CURRENT_PID###',
          'setValue' => 'prepend'
        ),
        'script' => 'wizard_add.php',
      ),
      'list' => array(
        'type'   => 'script',
        'title'  => 'LLL:EXT:org/locallang_db.xml:wizard.doc.list',
        'icon'   => 'list.gif',
        'params' => array(
          'table' => 'tx_org_downloads',
          'pid'   => '###CURRENT_PID###',
        ),
        'script' => 'wizard_list.php',
      ),
      'edit' => array(
        'type'                      => 'popup',
        'title'                     => 'LLL:EXT:org/locallang_db.xml:wizard.doc.edit',
        'script'                    => 'wizard_edit.php',
        'popup_onlyOpenIfSelected'  => 1,
        'icon'                      => 'edit2.gif',
        'JSopenParams'              => 'height=350,width=580,status=0,menubar=0,scrollbars=1',
      ),
    ),
  ),
);
  // Add fields tx_org_news, tx_org_headquarters, tx_org_department, tx_org_imagecaption, tx_org_imageseo, tx_org_vita, tx_org_downloads

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
      $arr_new_showitem[$key]     = 'LLL:EXT:org/locallang_db.xml:fe_users.div_tx_org_company, tx_org_headquarters,';
      $arr_new_showitem[$key + 1] = 'LLL:EXT:org/locallang_db.xml:fe_users.div_tx_org_department, tx_org_department,';
      $arr_new_showitem[$key + 2] = 'LLL:EXT:org/locallang_db.xml:fe_users.div_tx_org_news, tx_org_news,';
      $arr_new_showitem[$key + 3] = 'LLL:EXT:org/locallang_db.xml:fe_users.div_tx_org_downloads, tx_org_downloads,';
      $arr_new_showitem[$key + 4] = $value;
      break;
    case($key > $int_div_position):
      $arr_new_showitem[$key + 4] = $value;
      break;
  }
}
$str_showitem = implode('--div--;', $arr_new_showitem);
$TCA['fe_users']['types']['0']['showitem'] = $str_showitem;

if($bool_wizards_wo_add_and_list)
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
if($andWhere_feuser_fegroups)
{
    // Default
    // $TCA['fe_users']['columns']['usergroup']['config']['foreign_table_where'] = 'ORDER BY fe_groups.title';
  $andWhere_default = $TCA['fe_users']['columns']['usergroup']['config']['foreign_table_where'];
  $andWhere = $andWhere_feuser_fegroups . $andWhere_default;
  $TCA['fe_users']['columns']['usergroup']['config']['foreign_table_where'] = $andWhere;
}
  // Relation to fe_groups

$TCA['fe_users']['ctrl']['filter'] = 'filter_for_all_fields';
$TCA['fe_users']['columns']['tx_org_headquarters']['config_filter'] =
  $TCA['fe_users']['columns']['tx_org_headquarters']['config'];
$TCA['fe_users']['columns']['tx_org_headquarters']['config_filter']['maxitems'] = 1;
$TCA['fe_users']['columns']['tx_org_headquarters']['config_filter']['size']     = 1;
$items = array ('-99' => array ( '0' => '', '1' => '' ));
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
  // #32440, 120203, dwildt+
foreach( ( array ) $TCA['fe_users']['columns']['tx_org_headquarters']['config']['items'] as $key => $arrValue )
{
  $items[$key] = $arrValue;
}
  // #32440, 120203, dwildt+
$TCA['fe_users']['columns']['tx_org_headquarters']['config_filter']['items'] = $items;

  // fe_users

  // fe_groups
t3lib_div::loadTCA('fe_groups');
$TCA['fe_groups']['ctrl']['title']          = 'LLL:EXT:org/locallang_db.xml:fe_groups';
$TCA['fe_groups']['ctrl']['default_sortby'] = 'ORDER BY title';
if( $andWhere_fegroups_subgroup )
{

  $andWhere_default = $TCA['fe_groups']['columns']['subgroup']['config']['foreign_table_where'];
  $andWhere = $andWhere_fegroups_subgroup . $andWhere_default;
  $TCA['fe_groups']['columns']['subgroup']['config']['foreign_table_where'] = $andWhere;

}
  // fe_groups

  // sys_template
t3lib_div::loadTCA('sys_template');
$TCA['sys_template']['columns']['include_static_file']['config']['selectedListStyle'] = 'width:360px;';
$TCA['sys_template']['columns']['include_static_file']['config']['itemListStyle']     = 'width:360px;';
$TCA['sys_template']['columns']['include_static_file']['config']['size']              = '40';
  // sys_template

  // Configure third party tables



  ////////////////////////////////////////////////////////////////////////////
  //
  // TCA tables

  // news
  // newscat
  // cal
  // caltype
  // calentrance
  // tax
  // event
  // location
  // headquarters
  // department
  // departmentcat
  // doc
  // doccat
  // docmedia

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
      // #32223 Category tree, 111130, dwildt+
    'treeParentField'   => 'uid_parent',
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

  // event ///////////////////////////////////////////////////////////////////
$TCA['tx_org_event'] = array (
  'ctrl' => array (
    'title'             => 'LLL:EXT:org/locallang_db.xml:tx_org_event',
    'label'             => 'title',
    'tstamp'            => 'tstamp',
    'crdate'            => 'crdate',
    'cruser_id'         => 'cruser_id',
    'languageField'             => 'sys_language_uid',
    'transOrigPointerField'     => 'l10n_parent',
    'transOrigDiffSourceField'  => 'l10n_diffsource',
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
    'languageField'             => 'sys_language_uid',
    'transOrigPointerField'     => 'l10n_parent',
    'transOrigDiffSourceField'  => 'l10n_diffsource',
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
    'languageField'             => 'sys_language_uid',
    'transOrigPointerField'     => 'l10n_parent',
    'transOrigDiffSourceField'  => 'l10n_diffsource',
    'default_sortby'    => 'ORDER BY title',
//    'sortby'    => 'sorting',
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
if( ! $bool_exclude_tx_org_company )
{
  $TCA['tx_org_headquarters']['ctrl']['title'] = 'LLL:EXT:org/locallang_db.xml:tx_org_company';
}
  // headquarters //////////////////////////////////////////////////////////////////

  // org /////////////////////////////////////////////////////////////////////
$TCA['tx_org_department'] = array (
  'ctrl' => array (
    'title'             => 'LLL:EXT:org/locallang_db.xml:tx_org_department',
    'label'             => 'title',
    'tstamp'            => 'tstamp',
    'crdate'            => 'crdate',
    'cruser_id'         => 'cruser_id',
    'languageField'             => 'sys_language_uid',
    'transOrigPointerField'     => 'l10n_parent',
    'transOrigDiffSourceField'  => 'l10n_diffsource',
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

  // doc /////////////////////////////////////////////////////////////////////
$TCA['tx_org_downloads'] = array (
  'ctrl' => array (
    'title'             => 'LLL:EXT:org/locallang_db.xml:tx_org_downloads',
    'label'             => 'title',
    //'label'             => 'datetime',
    //'label_alt'         => 'title',
    //'label_alt_force'   => true,
    'tstamp'            => 'tstamp',
    'crdate'            => 'crdate',
    'cruser_id'         => 'cruser_id',
    'languageField'             => 'sys_language_uid',
    'transOrigPointerField'     => 'l10n_parent',
    'transOrigDiffSourceField'  => 'l10n_diffsource',
    'default_sortby'    => 'ORDER BY title',
    //'default_sortby'    => 'ORDER BY datetime DESC, title',
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
    'iconfile'          => t3lib_extMgm::extRelPath($_EXTKEY).'ext_icon/download.gif',
    'type'              => 'type',
    'typeicon_column'   => 'type',
    'typeicons'         => array(
      'download'           => '../typo3conf/ext/org/ext_icon/download.gif',
      'download_shipping'  => '../typo3conf/ext/org/ext_icon/download_shipping.gif',
      'shipping'           => '../typo3conf/ext/org/ext_icon/shipping.gif',
    ),
  ),
);
  // doc /////////////////////////////////////////////////////////////////////

  // doccat /////////////////////////////////////////////////////////////////////
$TCA['tx_org_downloadscat'] = array (
  'ctrl' => array (
    'title'           => 'LLL:EXT:org/locallang_db.xml:tx_org_downloadscat',
    'label'           => 'title',
    'tstamp'          => 'tstamp',
    'crdate'          => 'crdate',
    'sortby'          => 'sorting',
    'delete'          => 'deleted',
    'enablecolumns'   => array (
      'disabled'  => 'hidden',
    ),
    'hideAtCopy'        => false,
    'dividers2tabs'     => true,
    'dynamicConfigFile' => t3lib_extMgm::extPath($_EXTKEY).'tca.php',
    'thumbnail'         => 'image',
    'iconfile'          => t3lib_extMgm::extRelPath($_EXTKEY).'ext_icon/downloadcat.gif',
    'type'              => 'type',
    'typeicon_column'   => 'type',
    'typeicons'         => array(
      'cat_text'  => '../typo3conf/ext/org/ext_icon/cat_text.gif',
      'cat_color' => '../typo3conf/ext/org/ext_icon/cat_color.gif',
      'cat_image' => '../typo3conf/ext/org/ext_icon/cat_image.gif',
    ),
  )
);
  // doccat /////////////////////////////////////////////////////////////////////

  // docmedia /////////////////////////////////////////////////////////////////////
$TCA['tx_org_downloadsmedia'] = array (
  'ctrl' => array (
    'title'           => 'LLL:EXT:org/locallang_db.xml:tx_org_downloadsmedia',
    'label'           => 'title',
    'tstamp'          => 'tstamp',
    'crdate'          => 'crdate',
    'sortby'          => 'sorting',
    'delete'          => 'deleted',
    'enablecolumns'   => array (
      'disabled'  => 'hidden',
    ),
    'hideAtCopy'        => false,
    'dividers2tabs'     => true,
    'dynamicConfigFile' => t3lib_extMgm::extPath($_EXTKEY).'tca.php',
    'thumbnail'         => 'image',
    'iconfile'          => t3lib_extMgm::extRelPath($_EXTKEY).'ext_icon/downloadmedia.gif',
    'type'              => 'type',
    'typeicon_column'   => 'type',
    'typeicons'         => array(
      'cat_text'  => '../typo3conf/ext/org/ext_icon/cat_text.gif',
      'cat_color' => '../typo3conf/ext/org/ext_icon/cat_color.gif',
      'cat_image' => '../typo3conf/ext/org/ext_icon/cat_image.gif',
    ),
  )
);
  // docmedia /////////////////////////////////////////////////////////////////////

  // TCA tables //////////////////////////////////////////////////////////////

?>