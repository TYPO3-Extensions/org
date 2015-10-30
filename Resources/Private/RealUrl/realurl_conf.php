<?php

  //////////////////////////////////
  //
  // TEMPLATE

  // Template file for
  // typo3conf/realurl_conf.php



// http://wiki.typo3.org/RealURL
 $rootPids = array(
     'hfs.typo3-org.de' => 1,
     'hfs-berlin.de' => 1,
     'www.hfs-berlin.de' => 1,
     'bat.typo3-org.de' => 5,
     'bat-berlin.de' => 5,
     'www.bat-berlin.de' => 5,
 );

  //////////////////////////////////
  //
  // Default real URL configuration

$TYPO3_CONF_VARS['EXTCONF']['realurl'] = array
(
  '_DEFAULT' => array
  (
    'init' => array
    (
      'respectSimulateStaticURLs' => 0,
      'enableCHashCache'          => 1,
      'appendMissingSlash'        => 'ifNotFile',
      'enableUrlDecodeCache'      => 1,
      'enableUrlEncodeCache'      => 1,
      'reapplyAbsRefPrefix'       => 1,
    ),
    'pagePath' => array
    (
      'type'              => 'user',
      'userFunc'          => 'EXT:realurl/class.tx_realurl_advanced.php:&tx_realurl_advanced->main',
      'spaceCharacter'    => '-',
      'languageGetVar'    => 'L',
      'expireDays'        => 7,
      'rootpage_id'       => $rootPids[$_SERVER['HTTP_HOST']],
      'firstHitPathCache' => 1,
    ),
    'preVars' => array
    (
      array
      (
        'GETvar'    => 'no_cache',
        'valueMap'  => array
        (
          //'nc' => 1, // removed because of cookies and treeview
        ),
        'noMatch' => 'bypass',
      ),
    ),
    // configure filenames for different pagetypes
    'fileName' => array(
      'index' => array(
        'druck.html' => array(
          'keyValues' => array(
            'type' => 98,
          ),
        ),
        'pdf.html' => array(
          'keyValues' => array(
            'type' => 123,
          ),
        ),
      ),
    ),
  ),
);


  //////////////////////////////////
  //
  // Real URL configuration for all pages

$TYPO3_CONF_VARS['EXTCONF']['realurl']['_DEFAULT']['postVarSets'] = array
(
  '_DEFAULT' => array
  (
    // tx_org_cal
    'termin' => array
    (
      array
      (
        'GETvar' => 'tx_browser_pi1[calendarUid]',
        'lookUpTable' => array
        (
          'table'               => 'tx_org_cal',
          'id_field'            => 'uid',
          'alias_field'         => 'title',
          'addWhereClause'      => ' AND NOT deleted AND NOT hidden',
          'useUniqueCache'      => 1,
          'useUniqueCache_conf' => array
          (
            'strtolower'      => 1,
            'spaceCharacter'  => '-',
          ),
        )
      ),
    ),
    // tx_org_cal: datetime
    'zeitraum' => array
    (
      array
      (
        'GETvar' => 'tx_browser_pi1[tx_org_cal.datetime]',
      ),
    ),
    // tx_org_event
    'veranstaltung' => array
    (
      array
      (
        'GETvar' => 'tx_browser_pi1[eventUid]',
        'lookUpTable' => array
        (
          'table'               => 'tx_org_event',
          'id_field'            => 'uid',
          'alias_field'         => 'title',
          'addWhereClause'      => ' AND NOT deleted AND NOT hidden',
          'useUniqueCache'      => 1,
          'useUniqueCache_conf' => array
          (
            'strtolower'      => 1,
            'spaceCharacter'  => '-',
          ),
        )
      ),
    ),
    // tx_org_headquarters
    'bereich' => array
    (
      array
      (
        'GETvar' => 'tx_browser_pi1[headquartersUid]',
        'lookUpTable' => array
        (
          'table'               => 'tx_org_headquarters',
          'id_field'            => 'uid',
          'alias_field'         => 'title',
          'addWhereClause'      => ' AND NOT deleted AND NOT hidden',
          'useUniqueCache'      => 1,
          'useUniqueCache_conf' => array
          (
            'strtolower'      => 1,
            'spaceCharacter'  => '-',
          ),
        )
      ),
    ),
    // tx_org_job
    'job' => array
    (
      array
      (
        'GETvar' => 'tx_browser_pi1[jobUid]',
        'lookUpTable' => array
        (
          'table'               => 'tx_org_job',
          'id_field'            => 'uid',
          'alias_field'         => 'title',
          'addWhereClause'      => ' AND NOT deleted AND NOT hidden',
          'useUniqueCache'      => 1,
          'useUniqueCache_conf' => array
          (
            'strtolower'      => 1,
            'spaceCharacter'  => '-',
          ),
        )
      ),
    ),
    // tx_org_location
    'veranstaltungsort' => array
    (
      array
      (
        'GETvar' => 'tx_browser_pi1[locationUid]',
        'lookUpTable' => array
        (
          'table'               => 'tx_org_location',
          'id_field'            => 'uid',
          'alias_field'         => 'title',
          'addWhereClause'      => ' AND NOT deleted AND NOT hidden',
          'useUniqueCache'      => 1,
          'useUniqueCache_conf' => array
          (
            'strtolower'      => 1,
            'spaceCharacter'  => '-',
          ),
        )
      ),
    ),
    // news: tx_org_news
    'nachricht' => array
    (
      array
      (
        'GETvar' => 'tx_browser_pi1[newsUid]',
        'lookUpTable' => array
        (
          'table'               => 'tx_org_news',
          'id_field'            => 'uid',
          'alias_field'         => 'title',
          'addWhereClause'      => ' AND NOT deleted AND NOT hidden',
          'useUniqueCache'      => 1,
          'useUniqueCache_conf' => array
          (
            'strtolower'      => 1,
            'spaceCharacter'  => '-',
          ),
        )
      ),
    ),
    // tx_org_repertoire
    'stueck' => array
    (
      array
      (
        'GETvar' => 'tx_browser_pi1[repertoireUid]',
        'lookUpTable' => array
        (
          'table'               => 'tx_org_repertoire',
          'id_field'            => 'uid',
          'alias_field'         => 'title',
          'addWhereClause'      => ' AND NOT deleted AND NOT hidden',
          'useUniqueCache'      => 1,
          'useUniqueCache_conf' => array
          (
            'strtolower'      => 1,
            'spaceCharacter'  => '-',
          ),
        )
      ),
    ),
    // tx_org_service
    'dienstleistung' => array
    (
      array
      (
        'GETvar' => 'tx_browser_pi1[serviceUid]',
        'lookUpTable' => array
        (
          'table'               => 'tx_org_service',
          'id_field'            => 'uid',
          'alias_field'         => 'title',
          'addWhereClause'      => ' AND NOT deleted AND NOT hidden',
          'useUniqueCache'      => 1,
          'useUniqueCache_conf' => array
          (
            'strtolower'      => 1,
            'spaceCharacter'  => '-',
          ),
        )
      ),
    ),
    // staff: tx_org_staff
    'person' => array
    (
      array
      (
        'GETvar' => 'tx_browser_pi1[staffUid]',
        'lookUpTable' => array
        (
          'table'               => 'tx_org_staff',
          'id_field'            => 'uid',
          'alias_field'         => 'title',
          'addWhereClause'      => ' AND NOT deleted AND NOT hidden',
          'useUniqueCache'      => 1,
          'useUniqueCache_conf' => array
          (
            'strtolower'      => 1,
            'spaceCharacter'  => '-',
          ),
        )
      ),
    ),
    // tx_browser_pi1: defaults
    'ansicht' => array
    (
      array
      (
        'GETvar' => 'tx_browser_pi1[mode]',
      ),
    ),
    'az' => array
    (
      array
      (
        'GETvar' => 'tx_browser_pi1[azTab]',
      ),
    ),
    'seite' => array
    (
      array
      (
        'GETvar' => 'tx_browser_pi1[pointer]',
      ),
    ),
    'pl' => array
    (
      array
      (
        'GETvar' => 'tx_browser_pi1[plugin]',
      ),
    ),
    'sort' => array
    (
      array
      (
        'GETvar' => 'tx_browser_pi1[sort]',
      ),
    ),
    'suche' => array
    (
      array
      (
        'GETvar' => 'tx_browser_pi1[sword]',
      ),
    ),
  ),
);

?>
