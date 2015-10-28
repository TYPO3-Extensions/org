<?php

if (!defined('TYPO3_MODE'))
{
  die('Access denied.');
}

// INDEX
// * de
// * default

switch (true)
{
  case($llStatic == 'de'):
    // German
    $TCA['pages']['columns']['module']['config']['items'][] = array('Org', 'org', t3lib_extMgm::extRelPath($_EXTKEY) . 'ext_icon.gif');
    $TCA['pages']['columns']['module']['config']['items'][] = array('Org: Dienstleistungen', 'org_srvce', t3lib_extMgm::extRelPath($_EXTKEY) . 'Resources/Public/Images/Icons/ExtIcon/service.gif');
    $TCA['pages']['columns']['module']['config']['items'][] = array('Org: Downloads', 'org_dwnlds', t3lib_extMgm::extRelPath($_EXTKEY) . 'Resources/Public/Images/Icons/ExtIcon/download.gif');
    $TCA['pages']['columns']['module']['config']['items'][] = array('Org: Kalender', 'org_cal', t3lib_extMgm::extRelPath($_EXTKEY) . 'Resources/Public/Images/Icons/ExtIcon/cal.gif');
    $TCA['pages']['columns']['module']['config']['items'][] = array('Org: Nachrichten', 'org_news', t3lib_extMgm::extRelPath($_EXTKEY) . 'Resources/Public/Images/Icons/ExtIcon/news.gif');
    $TCA['pages']['columns']['module']['config']['items'][] = array('Org: Personen', 'org_staff', t3lib_extMgm::extRelPath($_EXTKEY) . 'Resources/Public/Images/Icons/ExtIcon/staff.gif');
    $TCA['pages']['columns']['module']['config']['items'][] = array('Org: Standorte', 'org_headq', t3lib_extMgm::extRelPath($_EXTKEY) . 'Resources/Public/Images/Icons/ExtIcon/headquarters.gif');
    $TCA['pages']['columns']['module']['config']['items'][] = array('Org: Stellenangebote', 'org_job', t3lib_extMgm::extRelPath($_EXTKEY) . 'Resources/Public/Images/Icons/ExtIcon/job.gif');
    $TCA['pages']['columns']['module']['config']['items'][] = array('Org: Veranstaltungen', 'org_event', t3lib_extMgm::extRelPath($_EXTKEY) . 'Resources/Public/Images/Icons/ExtIcon/event.gif');
    $TCA['pages']['columns']['module']['config']['items'][] = array('Org: Veranstaltungsorte', 'org_locat', t3lib_extMgm::extRelPath($_EXTKEY) . 'Resources/Public/Images/Icons/ExtIcon/location.gif');
    break;
  default:
    // English
    $TCA['pages']['columns']['module']['config']['items'][] = array('Org', 'org', t3lib_extMgm::extRelPath($_EXTKEY) . 'ext_icon.gif');
    $TCA['pages']['columns']['module']['config']['items'][] = array('Org: Calendar', 'org_cal', t3lib_extMgm::extRelPath($_EXTKEY) . 'Resources/Public/Images/Icons/ExtIcon/cal.gif');
    $TCA['pages']['columns']['module']['config']['items'][] = array('Org: Downloads', 'org_dwnlds', t3lib_extMgm::extRelPath($_EXTKEY) . 'Resources/Public/Images/Icons/ExtIcon/download.gif');
    $TCA['pages']['columns']['module']['config']['items'][] = array('Org: Event', 'org_event', t3lib_extMgm::extRelPath($_EXTKEY) . 'Resources/Public/Images/Icons/ExtIcon/event.gif');
    $TCA['pages']['columns']['module']['config']['items'][] = array('Org: Headquarters', 'org_headq', t3lib_extMgm::extRelPath($_EXTKEY) . 'Resources/Public/Images/Icons/ExtIcon/headquarters.gif');
    $TCA['pages']['columns']['module']['config']['items'][] = array('Org: Jobs', 'org_job', t3lib_extMgm::extRelPath($_EXTKEY) . 'Resources/Public/Images/Icons/ExtIcon/job.gif');
    $TCA['pages']['columns']['module']['config']['items'][] = array('Org: Location', 'org_locat', t3lib_extMgm::extRelPath($_EXTKEY) . 'Resources/Public/Images/Icons/ExtIcon/location.gif');
    $TCA['pages']['columns']['module']['config']['items'][] = array('Org: News', 'org_news', t3lib_extMgm::extRelPath($_EXTKEY) . 'Resources/Public/Images/Icons/ExtIcon/news.gif');
    $TCA['pages']['columns']['module']['config']['items'][] = array('Org: Services', 'org_srvce', t3lib_extMgm::extRelPath($_EXTKEY) . 'Resources/Public/Images/Icons/ExtIcon/service.gif');
    $TCA['pages']['columns']['module']['config']['items'][] = array('Org: People', 'org_staff', t3lib_extMgm::extRelPath($_EXTKEY) . 'Resources/Public/Images/Icons/ExtIcon/staff.gif');
}
// Case $llStatic
//  #34858, 120320, dwildt
t3lib_SpriteManager::addTcaTypeIcon('pages', 'contains-org', '../typo3conf/ext/org/ext_icon.gif');
t3lib_SpriteManager::addTcaTypeIcon('pages', 'contains-org_cal', '../typo3conf/ext/org/Resources/Public/Images/Icons/ExtIcon/cal.gif');
t3lib_SpriteManager::addTcaTypeIcon('pages', 'contains-org_dwnlds', '../typo3conf/ext/org/Resources/Public/Images/Icons/ExtIcon/download.gif');
t3lib_SpriteManager::addTcaTypeIcon('pages', 'contains-org_event', '../typo3conf/ext/org/Resources/Public/Images/Icons/ExtIcon/event.gif');
t3lib_SpriteManager::addTcaTypeIcon('pages', 'contains-org_headq', '../typo3conf/ext/org/Resources/Public/Images/Icons/ExtIcon/headquarters.gif');
t3lib_SpriteManager::addTcaTypeIcon('pages', 'contains-org_job', '../typo3conf/ext/org/Resources/Public/Images/Icons/ExtIcon/job.gif');
t3lib_SpriteManager::addTcaTypeIcon('pages', 'contains-org_locat', '../typo3conf/ext/org/Resources/Public/Images/Icons/ExtIcon/location.gif');
t3lib_SpriteManager::addTcaTypeIcon('pages', 'contains-org_news', '../typo3conf/ext/org/Resources/Public/Images/Icons/ExtIcon/news.gif');
t3lib_SpriteManager::addTcaTypeIcon('pages', 'contains-org_srvce', '../typo3conf/ext/org/Resources/Public/Images/Icons/ExtIcon/service.gif');
t3lib_SpriteManager::addTcaTypeIcon('pages', 'contains-org_staff', '../typo3conf/ext/org/Resources/Public/Images/Icons/ExtIcon/staff.gif');

?>