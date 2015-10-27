<?php

if (!defined('TYPO3_MODE'))
{
  die('Access denied.');
}

$TCA['tx_org_tax'] = array(
  'ctrl' => $TCA['tx_org_tax']['ctrl'],
  'interface' => array(
    'showRecordFieldList' => 'title,title_lang_ol,value,' .
    'hidden,starttime,endtime'
  ),
  'feInterface' => $TCA['tx_org_tax']['feInterface'],
  'columns' => array(
    'title' => array(
      'exclude' => 0,
      'label' => 'LLL:EXT:org/Resources/Private/Language/tx_org_tax.xml:tx_org_tax.title',
      'config' => $conf_input_30_trimRequired,
    ),
    'title_lang_ol' => array(
      'exclude' => 0,
      'label' => 'LLL:EXT:org/Resources/Private/Language/tx_org_tax.xml:tx_org_tax.title_lang_ol',
      'config' => $conf_input_30_trim,
    ),
    'value' => array(
      'exclude' => 0,
      'label' => 'LLL:EXT:org/Resources/Private/Language/tx_org_tax.xml:tx_org_tax.value',
      'config' => array(
        'type' => 'input',
        'size' => '5',
        'max' => '5',
        'eval' => 'required,double2',
      ),
    ),
    'hidden' => $conf_hidden,
    'starttime' => $conf_starttime,
    'endtime' => $conf_endtime,
  ),
  'types' => array(
    '0' => array('showitem' => '--div--;LLL:EXT:org/Resources/Private/Language/tx_org_tax.xml:tx_org_tax.div_tax,     title;;1;;,value,' .
      '--div--;LLL:EXT:org/Resources/Private/Language/tx_org_tax.xml:tx_org_tax.div_control, hidden;;2;;' .
      ''),
  ),
  'palettes' => array(
    '1' => array('showitem' => 'title_lang_ol,'),
    '2' => array('showitem' => 'starttime,endtime,'),
  ),
);
?>