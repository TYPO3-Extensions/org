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
    'title' => 'LLL:EXT:org/Resources/Private/Language/tx_org_downloads.xml:tx_org_downloadscat',
    'label' => 'title',
    'tstamp' => 'tstamp',
    'crdate' => 'crdate',
    // #i0071, 150822, dwildt, 1-
    //'sortby' => 'sorting',
    'delete' => 'deleted',
    'enablecolumns' => array(
      'disabled' => 'hidden',
    ),
    'hideAtCopy' => false,
    'dividers2tabs' => true,
    'thumbnail' => 'image',
    'iconfile' => t3lib_extMgm::extRelPath( $_EXTKEY ) . 'Resources/Public/Images/Icons/ExtIcon/downloadcat.gif',
    'type' => 'type',
    'typeicon_column' => 'type',
    'typeicons' => array(
      'cat_text' => '../typo3conf/ext/org/Resources/Public/Images/Icons/ExtIcon/cat_text.gif',
      'cat_color' => '../typo3conf/ext/org/Resources/Public/Images/Icons/ExtIcon/cat_color.gif',
      'cat_image' => '../typo3conf/ext/org/Resources/Public/Images/Icons/ExtIcon/cat_image.gif',
    ),
    'searchFields' => ''
    . 'type,'
    . 'title,title_lang_ol,text,text_lang_ol,' .
    'color,' .
    'image,imageseo,imageseo_lang_ol,image_width,image_height,image_compression,image_effects,' .
    'hidden',
  ),
  'interface' => array(
    'showRecordFieldList' => ''
    . 'type,'
    . 'title,title_lang_ol,text,text_lang_ol,' .
    'color,' .
    'image,imageseo,imageseo_lang_ol,image_width,image_height,image_compression,image_effects,' .
    'hidden',
  ),
  'columns' => array(
    'type' => array(
      'exclude' => $bool_exclude_default,
      'l10n_mode' => 'exclude',
      'label' => 'LLL:EXT:org/Resources/Private/Language/tx_org_downloads.xml:tx_org_downloadscat.type',
      'config' => array(
        'type' => 'select',
        'items' => array(
          'cat_text' => array(
            '0' => 'LLL:EXT:org/Resources/Private/Language/tx_org_downloads.xml:tx_org_downloadscat.type.cat_text',
            '1' => 'cat_text',
            '2' => 'EXT:org/Resources/Public/Images/Icons/ExtIcon/cat_text.gif',
          ),
          'cat_color' => array(
            '0' => 'LLL:EXT:org/Resources/Private/Language/tx_org_downloads.xml:tx_org_downloadscat.type.cat_color',
            '1' => 'cat_color',
            '2' => 'EXT:org/Resources/Public/Images/Icons/ExtIcon/cat_color.gif',
          ),
          'cat_image' => array(
            '0' => 'LLL:EXT:org/Resources/Private/Language/tx_org_downloads.xml:tx_org_downloadscat.type.cat_image',
            '1' => 'cat_image',
            '2' => 'EXT:org/Resources/Public/Images/Icons/ExtIcon/cat_image.gif',
          ),
        ),
        'default' => 'cat_text',
      ),
    ),
    'title' => array(
      'exclude' => 0,
      'label' => 'LLL:EXT:org/Resources/Private/Language/tx_org_downloads.xml:tx_org_downloadscat.title',
      'config' => $conf_input_30_trimRequired,
    ),
    'title_lang_ol' => array(
      'exclude' => 0,
      'label' => 'LLL:EXT:org/Resources/Private/Language/tx_org_downloads.xml:tx_org_downloadscat.title_lang_ol',
      'config' => $conf_input_30_trim,
    ),
    'text' => array(
      'exclude' => $bool_exclude_default,
      'label' => 'LLL:EXT:org/Resources/Private/Language/tx_org_downloads.xml:tx_org_downloadscat.text',
      'config' => $conf_text_30_05,
    ),
    'text_lang_ol' => array(
      'exclude' => $bool_exclude_default,
      'label' => 'LLL:EXT:org/Resources/Private/Language/tx_org_downloads.xml:tx_org_downloadscat.text_lang_ol',
      'config' => $conf_text_30_05,
    ),
    'color' => array(
      'l10n_mode' => 'exclude',
      'exclude' => $bool_exclude_default,
      'label' => 'LLL:EXT:org/Resources/Private/Language/locallang_db.xml:tca_phrase.color',
      'config' => array(
        'type' => 'input',
        'size' => 10,
        'eval' => 'trim',
        'wizards' => array(
          'colorChoice' => array(
            'type' => 'colorbox',
            'title' => 'LLL:EXT:examples/locallang_db.xml:tx_examples_haiku.colorPick',
            'script' => 'wizard_colorpicker.php',
            'dim' => '20x20',
            'tableStyle' => 'border: solid 1px black; margin-left: 20px;',
            'JSopenParams' => 'height=300,width=380,status=0,menubar=0,scrollbars=0',
          )
        )
      )
    ),
    'image' => array(
      'l10n_mode' => 'exclude',
      'exclude' => $bool_exclude_default,
      'label' => 'LLL:EXT:org/Resources/Private/Language/locallang_db.xml:tca_phrase.image.cat',
      'config' => $conf_file_icon,
    ),
    'imageseo' => array(
      'exclude' => $bool_exclude_default,
      'label' => 'LLL:EXT:org/Resources/Private/Language/locallang_db.xml:tca_phrase.imageseo.oneline',
      'config' => $conf_input_30,
    ),
    'imageseo_lang_ol' => array(
      'exclude' => $bool_exclude_default,
      'label' => 'LLL:EXT:org/Resources/Private/Language/locallang_db.xml:tca_phrase.imageseo_lang_ol.oneline',
      'config' => $conf_input_30,
    ),
    'imagewidth' => array(
      'exclude' => $bool_exclude_default,
      'l10n_mode' => 'exclude',
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
      'l10n_mode' => 'exclude',
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
    'image_effects' => array(
      'exclude' => $bool_exclude_default,
      'l10n_mode' => 'exclude',
      'label' => 'LLL:EXT:cms/locallang_ttc.xml:image_effects',
      'config' => array(
        'type' => 'select',
        'items' => array(
          array( 'LLL:EXT:cms/locallang_ttc.xml:image_effects.I.0', 0 ),
          array( 'LLL:EXT:cms/locallang_ttc.xml:image_effects.I.1', 1 ),
          array( 'LLL:EXT:cms/locallang_ttc.xml:image_effects.I.2', 2 ),
          array( 'LLL:EXT:cms/locallang_ttc.xml:image_effects.I.3', 3 ),
          array( 'LLL:EXT:cms/locallang_ttc.xml:image_effects.I.4', 10 ),
          array( 'LLL:EXT:cms/locallang_ttc.xml:image_effects.I.5', 11 ),
          array( 'LLL:EXT:cms/locallang_ttc.xml:image_effects.I.6', 20 ),
          array( 'LLL:EXT:cms/locallang_ttc.xml:image_effects.I.7', 23 ),
          array( 'LLL:EXT:cms/locallang_ttc.xml:image_effects.I.8', 25 ),
          array( 'LLL:EXT:cms/locallang_ttc.xml:image_effects.I.9', 26 ),
        ),
      ),
    ),
    'image_compression' => array(
      'exclude' => $bool_exclude_none,
      'l10n_mode' => 'exclude',
      'label' => 'LLL:EXT:cms/locallang_ttc.xml:image_compression',
      'config' => array(
        'type' => 'select',
        'items' => array(
          array( 'LLL:EXT:lang/locallang_general.php:LGL.default_value', 0 ),
          array( 'LLL:EXT:cms/locallang_ttc.xml:image_compression.I.1', 1 ),
          array( 'GIF/256', 10 ),
          array( 'GIF/128', 11 ),
          array( 'GIF/64', 12 ),
          array( 'GIF/32', 13 ),
          array( 'GIF/16', 14 ),
          array( 'GIF/8', 15 ),
          array( 'PNG', 39 ),
          array( 'PNG/256', 30 ),
          array( 'PNG/128', 31 ),
          array( 'PNG/64', 32 ),
          array( 'PNG/32', 33 ),
          array( 'PNG/16', 34 ),
          array( 'PNG/8', 35 ),
          array( 'LLL:EXT:cms/locallang_ttc.xml:image_compression.I.15', 21 ),
          array( 'LLL:EXT:cms/locallang_ttc.xml:image_compression.I.16', 22 ),
          array( 'LLL:EXT:cms/locallang_ttc.xml:image_compression.I.17', 24 ),
          array( 'LLL:EXT:cms/locallang_ttc.xml:image_compression.I.18', 26 ),
          array( 'LLL:EXT:cms/locallang_ttc.xml:image_compression.I.19', 28 ),
        ),
      ),
    ),
    'hidden' => $conf_hidden,
  ),
  'types' => array(
    'cat_text' => array( 'showitem' => ''
      . '--div--;LLL:EXT:org/Resources/Private/Language/tx_org_downloads.xml:tx_org_downloadscat.div_cat,'
      . '  type,title;;1;;1-1-1,text;;2;;2-2-2,'
      . '--div--;LLL:EXT:org/Resources/Private/Language/tx_org_downloads.xml:tx_org_downloadscat.div_control, '
      . '  hidden'
    )
    ,
    'cat_color' => array( 'showitem' => ''
      . '--div--;LLL:EXT:org/Resources/Private/Language/tx_org_downloads.xml:tx_org_downloadscat.div_cat,'
      . '  type,title;;1;;1-1-1,text;;2;;2-2-2,'
      . '--div--;LLL:EXT:org/Resources/Private/Language/tx_org_downloads.xml:tx_org_downloadscat.div_color,'
      . '  color,'
      . '--div--;LLL:EXT:org/Resources/Private/Language/tx_org_downloads.xml:tx_org_downloadscat.div_seo, '
      . '  imageseo,imageseo_lang_ol,'
      . '--div--;LLL:EXT:org/Resources/Private/Language/tx_org_downloads.xml:tx_org_downloadscat.div_control,'
      . '  hidden'
    )
    ,
    'cat_image' => array( 'showitem' => ''
      . '--div--;LLL:EXT:org/Resources/Private/Language/tx_org_downloads.xml:tx_org_downloadscat.div_cat,'
      . '  type,title;;1;;1-1-1,text;;2;;2-2-2,'
      . '--div--;LLL:EXT:org/Resources/Private/Language/tx_org_downloads.xml:tx_org_downloadscat.div_media,'
      . '  --palette--;LLL:EXT:org/Resources/Private/Language/locallang_db.xml:tca_phrase.image.cat;imagefiles,'
      . '  --palette--;LLL:EXT:org/Resources/Private/Language/locallang_db.xml:tca_phrase.image_settings.cat;image_settings,'
      . '--div--;LLL:EXT:org/Resources/Private/Language/tx_org_downloads.xml:tx_org_downloadscat.div_seo, '
      . '  imageseo,'
      . '--div--;LLL:EXT:org/Resources/Private/Language/tx_org_downloads.xml:tx_org_downloadscat.div_control, '
      . '  hidden'
    )
  ,
  ),
  'palettes' => array(
    '1' => array( 'showitem' => 'title_lang_ol' ),
    '2' => array( 'showitem' => 'text_lang_ol' ),
    '3' => array( 'showitem' => 'imageseo_lang_ol' ),
    'imagefiles' => array(
      'showitem' => ''
      . 'image;LLL:EXT:org/Resources/Private/Language/locallang_db.xml:tca_phrase.image.cat,'
      ,
      'canNotCollapse' => 1,
    ),
    'image_settings' => array(
      'showitem' => ''
      . 'imagewidth;LLL:EXT:cms/locallang_ttc.xml:imagewidth_formlabel,'
      . 'imageheight;LLL:EXT:cms/locallang_ttc.xml:imageheight_formlabel,'
      . '--linebreak--,'
      . 'image_compression;LLL:EXT:cms/locallang_ttc.xml:image_compression_formlabel,'
      . 'image_effects;LLL:EXT:cms/locallang_ttc.xml:image_effects_formlabel'
      ,
      'canNotCollapse' => 1,
    ),
  ),
);
