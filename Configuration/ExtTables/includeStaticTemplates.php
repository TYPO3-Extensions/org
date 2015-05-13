<?php
if (!defined ('TYPO3_MODE'))
{
  die ('Access denied.');
}

// INDEX
// * de
// * default

switch( true )
{
  case($llStatic == 'de'):
      // German
    t3lib_extMgm::addStaticFile($_EXTKEY,'Configuration/TypoScript/base/',                              'Org [1] Basis');
    switch( true )
    {
      case( $typo3Version < 4007000 ):
        t3lib_extMgm::addStaticFile($_EXTKEY,'Configuration/TypoScript/base/typo3/4.6/',                'Org [1.1] + Basis fuer TYPO3 < 4.7 (einbinden!)');
        break;
      default:
        t3lib_extMgm::addStaticFile($_EXTKEY,'Configuration/TypoScript/base/typo3/4.6/',                'Org [1.1] + Basis fuer TYPO3 < 4.7 (NICHT einbinden!)');
        break;
    }
    t3lib_extMgm::addStaticFile($_EXTKEY,'Configuration/TypoScript/service/593621/',                    'Org [2] Dienstleistungen');
    t3lib_extMgm::addStaticFile($_EXTKEY,'Configuration/TypoScript/downloads/301/',                     'Org [3] Downloads');
    t3lib_extMgm::addStaticFile($_EXTKEY,'Configuration/TypoScript/downloads/301/tx_caddy/',            'Org [3.1] + Downloads Caddy');
    t3lib_extMgm::addStaticFile($_EXTKEY,'Configuration/TypoScript/downloads/301/tx_caddy/wiFlag/',     'Org [3.1.1] + Downloads Caddy Flaggen');
    t3lib_extMgm::addStaticFile($_EXTKEY,'Configuration/TypoScript/downloads/301/tx_flipit/',           'Org [3.2] + Downloads Flip it!');
    switch( true )
    {
      case( $typo3Version < 4007000 ):
        t3lib_extMgm::addStaticFile($_EXTKEY,'Configuration/TypoScript/downloads/301/tx_flipit/typo3/4.6/', 'Org [3.2.1] + Downloads Flip it! TYPO3 < 4.7 (einbinden!');
        break;
      default:
        t3lib_extMgm::addStaticFile($_EXTKEY,'Configuration/TypoScript/downloads/301/tx_flipit/typo3/4.6/', 'Org [3.2.1] + Downloads Flip it! TYPO3 < 4.7 (NICHT einbinden!');
        break;
    }
    t3lib_extMgm::addStaticFile($_EXTKEY,'Configuration/TypoScript/downloads/301/tx_flipit/typo3/6.x/', 'Org [3.2.1] + Downloads Flip it! TYPO3 >= 6.x');
    t3lib_extMgm::addStaticFile($_EXTKEY,'Configuration/TypoScript/downloads/311/',                     'Org [3] Downloads - TOP 5');
    t3lib_extMgm::addStaticFile($_EXTKEY,'Configuration/TypoScript/downloads/302/',                     'Org [3] Downloads Kategorien');
    t3lib_extMgm::addStaticFile($_EXTKEY,'Configuration/TypoScript/calendar/201/',                      'Org [4] Kalender');
    t3lib_extMgm::addStaticFile($_EXTKEY,'Configuration/TypoScript/calendar/201/tx_browser_pi1/single/onecolumn/', 'Org [4.1] + einspaltig');
    t3lib_extMgm::addStaticFile($_EXTKEY,'Configuration/TypoScript/calendar/201/upToDate/',             'Org [4.2.1] + nur aktuelle Einträge');
    t3lib_extMgm::addStaticFile($_EXTKEY,'Configuration/TypoScript/calendar/201/outOfDate/',            'Org [4.2.2] + nur abgelaufene Einträge');
    t3lib_extMgm::addStaticFile($_EXTKEY,'Configuration/TypoScript/calendar/201/caddy/',                'Org [4.3] + Kalender Caddy');
    t3lib_extMgm::addStaticFile($_EXTKEY,'Configuration/TypoScript/calendar/211/',                      'Org [4.4] Kalender - Rand');
    t3lib_extMgm::addStaticFile($_EXTKEY,'Configuration/TypoScript/calendar/299/',                      'Org [4.5] Kalender (RSS)');
    t3lib_extMgm::addStaticFile($_EXTKEY,'Configuration/TypoScript/news/401/',                          'Org [5.1] Nachrichten');
    t3lib_extMgm::addStaticFile($_EXTKEY,'Configuration/TypoScript/news/401/401_newsonly/',             'Org [5.1] + Nachrichten solo');
    t3lib_extMgm::addStaticFile($_EXTKEY,'Configuration/TypoScript/news/402/',                          'Org [5.4] Nachrichten - Simple');
    t3lib_extMgm::addStaticFile($_EXTKEY,'Configuration/TypoScript/news/409/',                          'Org [5.4] Nachrichten - Slick');
    t3lib_extMgm::addStaticFile($_EXTKEY,'Configuration/TypoScript/news/411/',                          'Org [5.5] Nachrichten - Rand');
    t3lib_extMgm::addStaticFile($_EXTKEY,'Configuration/TypoScript/news/499/',                          'Org [5.6] Nachrichten (RSS)');
    t3lib_extMgm::addStaticFile($_EXTKEY,'Configuration/TypoScript/staff/101/',                         'Org [6] Personen');
    t3lib_extMgm::addStaticFile($_EXTKEY,'Configuration/TypoScript/staff/102/',                         'Org [6] Personen (einspaltig)');
    t3lib_extMgm::addStaticFile($_EXTKEY,'Configuration/TypoScript/staff/111/',                         'Org [6] Personen - Rand (nicht cachen!)');
    t3lib_extMgm::addStaticFile($_EXTKEY,'Configuration/TypoScript/headquarters/501/',                  'Org [7] Standorte');
    t3lib_extMgm::addStaticFile($_EXTKEY,'Configuration/TypoScript/headquarters/501/tx_browser_pi1/single/onecolumn/', 'Org [7.1] + einspaltig');
    t3lib_extMgm::addStaticFile($_EXTKEY,'Configuration/TypoScript/headquarters/511/',                  'Org [7] Standorte - Rand');
    t3lib_extMgm::addStaticFile($_EXTKEY,'Configuration/TypoScript/job/593611/',                        'Org [8] Stellenangebote');
    t3lib_extMgm::addStaticFile($_EXTKEY,'Configuration/TypoScript/job/60527/',                         'Org [8] Stellenangebote - Newsletter');
    t3lib_extMgm::addStaticFile($_EXTKEY,'Configuration/TypoScript/job/593619/',                        'Org [8] Stellenangebote (RSS)');
    t3lib_extMgm::addStaticFile($_EXTKEY,'Configuration/TypoScript/events/61826/',                      'Org [9] Veranstaltungen');
    t3lib_extMgm::addStaticFile($_EXTKEY,'Configuration/TypoScript/location/701/',                      'Org [10] Veranstaltungsorte');
    t3lib_extMgm::addStaticFile($_EXTKEY,'Configuration/TypoScript/location/711/',                      'Org [10] Veranstaltorte - Rand');
    break;
  default:
      // English
    t3lib_extMgm::addStaticFile($_EXTKEY,'Configuration/TypoScript/base/',                              'Org [1] Basis');
    switch( true )
    {
      case( $typo3Version < 4007000 ):
        t3lib_extMgm::addStaticFile($_EXTKEY,'Configuration/TypoScript/base/typo3/4.6/',                'Org [1.1] + Basis for TYPO3 < 4.7 (obligate!)');
        break;
      default:
        t3lib_extMgm::addStaticFile($_EXTKEY,'Configuration/TypoScript/base/typo3/4.6/',                'Org [1.1] + Basis for TYPO3 < 4.7 (don\'t use it!)');
        break;
    }
    t3lib_extMgm::addStaticFile($_EXTKEY,'Configuration/TypoScript/calendar/201/',                      'Org [2] Calendar');
    t3lib_extMgm::addStaticFile($_EXTKEY,'Configuration/TypoScript/calendar/201/tx_browser_pi1/single/onecolumn/',  'Org [2.1] + one column');
    t3lib_extMgm::addStaticFile($_EXTKEY,'Configuration/TypoScript/calendar/201/upToDate/',             'Org [2.2.1] + up-to-date only');
    t3lib_extMgm::addStaticFile($_EXTKEY,'Configuration/TypoScript/calendar/201/outOfDate/',            'Org [2.2.2] + out-of-date only');
    t3lib_extMgm::addStaticFile($_EXTKEY,'Configuration/TypoScript/calendar/201/caddy/',                'Org [2.3] + Calendar Caddy');
    t3lib_extMgm::addStaticFile($_EXTKEY,'Configuration/TypoScript/calendar/211/',                      'Org [2.4] Calendar - margin');
    t3lib_extMgm::addStaticFile($_EXTKEY,'Configuration/TypoScript/calendar/299/',                      'Org [2.5] Calendar (RSS)');
    t3lib_extMgm::addStaticFile($_EXTKEY,'Configuration/TypoScript/downloads/301/',                     'Org [3] Downloads');
    t3lib_extMgm::addStaticFile($_EXTKEY,'Configuration/TypoScript/downloads/301/tx_caddy/',            'Org [3.1] + Downloads Caddy');
    t3lib_extMgm::addStaticFile($_EXTKEY,'Configuration/TypoScript/downloads/301/tx_caddy/wiFlag',      'Org [3.1.1] + Downloads Caddy Flags');
    t3lib_extMgm::addStaticFile($_EXTKEY,'Configuration/TypoScript/downloads/301/tx_flipit/',           'Org [3.2] + Downloads Flip it!');
    switch( true )
    {
      case( $typo3Version < 4007000 ):
        t3lib_extMgm::addStaticFile($_EXTKEY,'Configuration/TypoScript/downloads/301/tx_flipit/typo3/4.6/', 'Org [3.2.1] + Downloads Flip it! TYPO3 < 4.7 (obligate!');
        break;
      default:
        t3lib_extMgm::addStaticFile($_EXTKEY,'Configuration/TypoScript/downloads/301/tx_flipit/typo3/4.6/', 'Org [3.2.1] + Downloads Flip it! TYPO3 < 4.7 (don\'t use it!');
        break;
    }
    t3lib_extMgm::addStaticFile($_EXTKEY,'Configuration/TypoScript/downloads/301/tx_flipit/typo3/6.x/', 'Org [3.2.1] + Downloads Flip it! TYPO3 >= 6.x');
    t3lib_extMgm::addStaticFile($_EXTKEY,'Configuration/TypoScript/downloads/311/',                     'Org [3] Downloads - TOP 5');
    t3lib_extMgm::addStaticFile($_EXTKEY,'Configuration/TypoScript/downloads/302/',                     'Org [3] Downloads categories');
    t3lib_extMgm::addStaticFile($_EXTKEY,'Configuration/TypoScript/events/61826/',                      'Org [4] Events');
    t3lib_extMgm::addStaticFile($_EXTKEY,'Configuration/TypoScript/headquarters/501/',                  'Org [5] Headquarters');
    t3lib_extMgm::addStaticFile($_EXTKEY,'Configuration/TypoScript/headquarters/501/tx_browser_pi1/single/onecolumn/', 'Org [5.1] + one column');
    t3lib_extMgm::addStaticFile($_EXTKEY,'Configuration/TypoScript/headquarters/511/',                  'Org [5] Headquarters - margin');
    t3lib_extMgm::addStaticFile($_EXTKEY,'Configuration/TypoScript/job/593611/',                        'Org [6] Jobs');
    t3lib_extMgm::addStaticFile($_EXTKEY,'Configuration/TypoScript/job/60527/',                         'Org [6] Jobs - newsletter');
    t3lib_extMgm::addStaticFile($_EXTKEY,'Configuration/TypoScript/job/593619/',                        'Org [6] Jobs (RSS)');
    t3lib_extMgm::addStaticFile($_EXTKEY,'Configuration/TypoScript/location/701/',                      'Org [7] Locations');
    t3lib_extMgm::addStaticFile($_EXTKEY,'Configuration/TypoScript/location/711/',                      'Org [7] Locations - margin');
    t3lib_extMgm::addStaticFile($_EXTKEY,'Configuration/TypoScript/news/401/',                          'Org [8.1] News');
    t3lib_extMgm::addStaticFile($_EXTKEY,'Configuration/TypoScript/news/401/401_newsonly/',             'Org [8.1] + News solo');
    t3lib_extMgm::addStaticFile($_EXTKEY,'Configuration/TypoScript/news/402/',                          'Org [8.4] News - Simple');
    t3lib_extMgm::addStaticFile($_EXTKEY,'Configuration/TypoScript/news/409/',                          'Org [8.4] News - Slick');
    t3lib_extMgm::addStaticFile($_EXTKEY,'Configuration/TypoScript/news/411/',                          'Org [8.5] News - margin');
    t3lib_extMgm::addStaticFile($_EXTKEY,'Configuration/TypoScript/news/499/',                          'Org [8.6] News (RSS)');
    t3lib_extMgm::addStaticFile($_EXTKEY,'Configuration/TypoScript/staff/101/',                         'Org [9] People');
    t3lib_extMgm::addStaticFile($_EXTKEY,'Configuration/TypoScript/staff/102/',                         'Org [9] People (one column)');
    t3lib_extMgm::addStaticFile($_EXTKEY,'Configuration/TypoScript/staff/111/',                         'Org [9] People - margin (don\'t cache!)');
    t3lib_extMgm::addStaticFile($_EXTKEY,'Configuration/TypoScript/service/593621/',                    'Org [10] Service');
    break;
}
?>