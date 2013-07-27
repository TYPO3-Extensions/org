<?php
if (!defined ('TYPO3_MODE'))
{
  die ('Access denied.');
}

  /////////////////////////////////////////////////
  //
  // Add default page and user TSconfig

$prefix           = '<INCLUDE_TYPOSCRIPT: source="FILE:EXT:';
$appenddixPath    = '/tsConfig/page/tx_linkhandler/';
$addPageTSConfig  = $prefix . $_EXTKEY . $appenddixPath . $llStatic;

//t3lib_extMgm::addPageTSConfig( $addPageTSConfig . '/page.txt">');


t3lib_extMgm::addPageTSConfig( 'mod.dwildt.test = 1' );
$table = $confArr['linkhandler.']['tt_news'];
switch( $table ) {
  case( 'Yes' ):
    t3lib_extMgm::addPageTSConfig( $addPageTSConfig . '/tt_news.txt">');
    break;
  case( 'No (recommended)' ):
  default:
      // Don't include tsConfig for linkhandler and tt_news
    break;
}

$table = $confArr['linkhandler.']['tx_org_cal'];
switch( $table ) {
  case( 'No' ):
      // Don't include tsConfig for linkhandler and tx_org_cal
    break;
  case( 'Yes (recommended)' ):
  default:
    t3lib_extMgm::addPageTSConfig( $addPageTSConfig . '/tx_org_cal.txt">');
    break;
}

$table = $confArr['linkhandler.']['tx_org_downloads'];
switch( $table ) {
  case( 'No' ):
      // Don't include tsConfig for linkhandler and tx_org_downloads
    break;
  case( 'Yes (recommended)' ):
  default:
    t3lib_extMgm::addPageTSConfig( $addPageTSConfig . '/tx_org_downloads.txt">');
    break;
}

$table = $confArr['linkhandler.']['tx_org_event'];
switch( $table ) {
  case( 'No' ):
      // Don't include tsConfig for linkhandler and tx_org_event
    break;
  case( 'Yes (recommended)' ):
  default:
    t3lib_extMgm::addPageTSConfig( $addPageTSConfig . '/tx_org_event.txt">');
    break;
}

$table = $confArr['linkhandler.']['tx_org_headquarters'];
switch( $table ) {
  case( 'No' ):
      // Don't include tsConfig for linkhandler and tx_org_headquarters
    break;
  case( 'Yes (recommended)' ):
  default:
    t3lib_extMgm::addPageTSConfig( $addPageTSConfig . '/tx_org_headquarters.txt">');
    break;
}

$table = $confArr['linkhandler.']['tx_org_location'];
switch( $table ) {
  case( 'No' ):
      // Don't include tsConfig for linkhandler and tx_org_location
    break;
  case( 'Yes (recommended)' ):
  default:
    t3lib_extMgm::addPageTSConfig( $addPageTSConfig . '/tx_org_location.txt">');
    break;
}

$table = $confArr['linkhandler.']['tx_org_news'];
switch( $table ) {
  case( 'No' ):
      // Don't include tsConfig for linkhandler and tx_org_news
    break;
  case( 'Yes (recommended)' ):
  default:
    t3lib_extMgm::addPageTSConfig( $addPageTSConfig . '/tx_org_news.txt">');
    break;
}

$table = $confArr['linkhandler.']['fe_users'];
switch( $table ) {
  case( 'No' ):
      // Don't include tsConfig for linkhandler and fe_users
    break;
  case( 'Yes (recommended)' ):
  default:
    t3lib_extMgm::addPageTSConfig( $addPageTSConfig . '/fe_users.txt">');
    break;
}
  // Add default page and user TSconfig



?>