<?php

if ( !defined( 'TYPO3_MODE' ) )
{
  die( 'Access denied.' );
}

// Configuration by the extension manager
require_once( PATH_typo3conf . 'ext/org/Configuration/ExtensionManager/simplifyer.php' );
// Default values and wizards
require_once( PATH_typo3conf . 'ext/org/Configuration/TCA/Defaults/defaultValues.php' );

return array(
  'ctrl' => array(
    'title' => 'LLL:EXT:org/Resources/Private/Language/tx_org_cal.xml:tx_org_caltype',
    'label' => 'title',
    'tstamp' => 'tstamp',
    'crdate' => 'crdate',
    'cruser_id' => 'cruser_id',
    'default_sortby' => 'ORDER BY title',
    'delete' => 'deleted',
    'enablecolumns' => array(
      'disabled' => 'hidden',
    ),
    'dividers2tabs' => true,
    'hideAtCopy' => false,
    'thumbnail' => 'image',
    'iconfile' => t3lib_extMgm::extRelPath( $_EXTKEY ) . 'Resources/Public/Images/Icons/ExtIcon/caltype.gif',
    'treeParentField' => 'uid_parent',
    'searchFields' => ''
    . 'title,title_lang_ol,'
    . 'tx_org_cal,'
    . 'hidden'
  ),
  'interface' => array(
    'showRecordFieldList' => ''
    . 'title,title_lang_ol,uid_parent,'
    . 'icons,icon_offset_x,icon_offset_y,'
    . 'tx_org_cal,'
    . 'hidden'
  ),
  'columns' => array(
    'icons' => array(
      'exclude' => $bool_exclude_default,
//      'l10n_mode' => 'exclude',
      'label' => 'LLL:EXT:org/Resources/Private/Language/tx_org_cal.xml:tx_org_caltype.icons',
      'config' => $conf_file_image,
    ),
    'icon_offset_x' => array(
      'exclude' => 0,
      'label' => 'LLL:EXT:org/Resources/Private/Language/tx_org_cal.xml:tx_org_caltype.icon_offset_x',
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
      'label' => 'LLL:EXT:org/Resources/Private/Language/tx_org_cal.xml:tx_org_caltype.icon_offset_y',
      'config' => array(
        'type' => 'input',
        'size' => '3',
        'max' => '3',
        'eval' => 'int',
        'default' => '0',
      ),
    ),
    'title' => array(
      'exclude' => 0,
      'label' => 'LLL:EXT:org/Resources/Private/Language/tx_org_cal.xml:tx_org_caltype.title',
      'config' => $conf_input_30_trimRequired,
    ),
    'title_lang_ol' => array(
      'exclude' => 0,
      'label' => 'LLL:EXT:org/Resources/Private/Language/tx_org_cal.xml:tx_org_caltype.title_lang_ol',
      'config' => $conf_input_30_trim,
    ),
    'uid_parent' => array(
      'exclude' => 0,
      'label' => 'LLL:EXT:org/Resources/Private/Language/tx_org_event.xml:tx_org_caltype.uid_parent',
      'config' => array(
        'type' => 'select',
        'form_type' => 'user',
        'userFunc' => 'tx_cpstcatree->getTree',
        'foreign_table' => 'tx_org_caltype',
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
    'tx_org_cal' => array(
      'exclude' => $bool_exclude_default,
      'label' => 'LLL:EXT:org/Resources/Private/Language/tx_org_cal.xml:tx_org_caltype.tx_org_cal',
      'config' => array(
        'type' => 'select',
        'size' => $size_calendar,
        'minitems' => 0,
        'maxitems' => 999,
//        'MM' => 'tx_org_cal_mm_tx_org_caltype',
//        'MM_opposite_field' => 'tx_org_caltype',
//        'foreign_table' => 'tx_org_cal',
//        'foreign_table_where' => 'AND tx_org_cal.' . $str_store_record_conf . ' AND tx_org_cal.deleted = 0 AND tx_org_cal.hidden = 0 AND tx_org_cal.sys_language_uid=###REC_FIELD_sys_language_uid### ORDER BY tx_org_cal.datetime DESC, title',
        'MM' => 'tx_org_mm_all',
        "MM_match_fields" => array(
          'table_local' => 'tx_org_cal',
          'table_foreign' => 'tx_org_caltype'
        ),
        "MM_insert_fields" => array(
          'table_local' => 'tx_org_cal',
          'table_foreign' => 'tx_org_caltype'
        ),
        'MM_opposite_field' => 'tx_org_caltype',
        'foreign_table' => 'tx_org_caltype',
        'foreign_table_where' => 'AND tx_org_caltype.' . $str_store_record_conf
        . ' AND tx_org_caltype.deleted = 0 AND tx_org_caltype.hidden = 0'
        . ' ORDER BY tx_org_caltype.title'
        ,
        'wizards' => array(
          '_PADDING' => 2,
          '_VERTICAL' => 0,
          'add' => array(
            'type' => 'script',
            'title' => 'LLL:EXT:org/Resources/Private/Language/tx_org_cal.xml:wizard.tx_org_caltype.add',
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
            'title' => 'LLL:EXT:org/Resources/Private/Language/tx_org_cal.xml:wizard.tx_org_caltype.list',
            'icon' => 'list.gif',
            'params' => array(
              'table' => 'tx_org_cal',
              'pid' => $str_marker_pid,
            ),
            'script' => 'wizard_list.php',
          ),
          'edit' => array(
            'type' => 'popup',
            'title' => 'LLL:EXT:org/Resources/Private/Language/tx_org_cal.xml:wizard.tx_org_caltype.edit',
            'script' => 'wizard_edit.php',
            'popup_onlyOpenIfSelected' => 1,
            'icon' => 'edit2.gif',
            'JSopenParams' => $JSopenParams,
          ),
        ),
      ),
    ),
    'hidden' => $conf_hidden,
  ),
  'types' => array(
    '0' => array( 'showitem' => '--div--;LLL:EXT:org/Resources/Private/Language/tx_org_cal.xml:tx_org_caltype.div_caltype,    title;;1;;,uid_parent,'
      . '--div--;LLL:EXT:org/Resources/Private/Language/tx_org_cal.xml:tx_org_caltype.div_icons,'
      . '  icons,icon_offset_x,icon_offset_y,'
      . '--div--;LLL:EXT:org/Resources/Private/Language/tx_org_cal.xml:tx_org_caltype.div_calendar,    tx_org_cal,'
      . '--div--;LLL:EXT:org/Resources/Private/Language/tx_org_cal.xml:tx_org_caltype.div_control,     hidden'
      . '' ),
  ),
  'palettes' => array(
    '1' => array( 'showitem' => 'title_lang_ol,' ),
  ),
);
//if ( !$bool_full_wizardSupport_catTables )
//{
//  unset( $TCA[ 'tx_org_caltype' ][ 'columns' ][ 'tx_org_cal' ][ 'config' ][ 'wizards' ][ 'add' ] );
//  unset( $TCA[ 'tx_org_caltype' ][ 'columns' ][ 'tx_org_cal' ][ 'config' ][ 'wizards' ][ 'list' ] );
//}