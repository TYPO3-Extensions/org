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
    t3lib_extMgm::addStaticFile($_EXTKEY,'static/base/',                  'Org: Basis (immer einbinden!)');
    t3lib_extMgm::addStaticFile($_EXTKEY,'static/department/601/',        '+Org: Abteilung');
    t3lib_extMgm::addStaticFile($_EXTKEY,'static/department/611/',        '+Org: Abteilung - Rand');
    t3lib_extMgm::addStaticFile($_EXTKEY,'static/downloads/301/',         '+Org: Downloads');
    t3lib_extMgm::addStaticFile($_EXTKEY,'static/downloads/301/flipit/',  '+Org: +Downloads Flip it!');
    t3lib_extMgm::addStaticFile($_EXTKEY,'static/downloads/301/flipit/typo3/4.6/',  '+Org: +Downloads Flip it! +TYPO3 < 4.7');
    t3lib_extMgm::addStaticFile($_EXTKEY,'static/downloads/301/flipit/typo3/6.x/',  '+Org: +Downloads Flip it! +TYPO3 >= 6.x');
    t3lib_extMgm::addStaticFile($_EXTKEY,'static/downloads/301/caddy/',   '+Org: +Downloads +Caddy');
      // #i0004, 130914, dwildt, 1+
    t3lib_extMgm::addStaticFile($_EXTKEY,'static/downloads/301/caddy/wiFlag/',   '+Org: +Downloads +Caddy +Flaggen');
    t3lib_extMgm::addStaticFile($_EXTKEY,'static/downloads/311/',         '+Org: Downloads - TOP 5');
    t3lib_extMgm::addStaticFile($_EXTKEY,'static/downloads/302/',         '+Org: Downloads Kategorien');
    t3lib_extMgm::addStaticFile($_EXTKEY,'static/calendar/201/',          '+Org: Kalender');
    t3lib_extMgm::addStaticFile($_EXTKEY,'static/calendar/201/caddy/',    '+Org: +Kalender +Caddy');
    t3lib_extMgm::addStaticFile($_EXTKEY,'static/calendar/201/expired/',  '+Org: +Kalender Archiv');
    t3lib_extMgm::addStaticFile($_EXTKEY,'static/calendar/211/',          '+Org: Kalender - Rand');
    t3lib_extMgm::addStaticFile($_EXTKEY,'static/news/401/',              '+Org: Nachrichten');
    t3lib_extMgm::addStaticFile($_EXTKEY,'static/news/411/',              '+Org: Nachrichten - Rand');
    t3lib_extMgm::addStaticFile($_EXTKEY,'static/news/402/',              '+Org: Nachrichten - Slider');
    t3lib_extMgm::addStaticFile($_EXTKEY,'static/news/499/',              '+Org: Nachrichten (RSS)');
    t3lib_extMgm::addStaticFile($_EXTKEY,'static/staff/101/',             '+Org: Personal');
    t3lib_extMgm::addStaticFile($_EXTKEY,'static/staff/111/',             '+Org: Personal - Rand (nicht cachen!)');
    t3lib_extMgm::addStaticFile($_EXTKEY,'static/headquarters/501/',      '+Org: Standorte');
    t3lib_extMgm::addStaticFile($_EXTKEY,'static/headquarters/511/',      '+Org: Standorte - Rand');
    t3lib_extMgm::addStaticFile($_EXTKEY,'static/location/701/',          '+Org: Veranstaltungsorte');
    t3lib_extMgm::addStaticFile($_EXTKEY,'static/location/711/',          '+Org: Veranstaltorte - Rand');
    switch( true )
    {
      case( $typo3Version < 4007000 ):
        t3lib_extMgm::addStaticFile($_EXTKEY,'static/base/typo3/4.6/',     '+Org: Basis fuer TYPO3 < 4.7 (einbinden!)');
        t3lib_extMgm::addStaticFile($_EXTKEY,'static/downloads/301/flipit/typo3/4.6/',  '+Org: +Downloads Flip it! TYPO3 < 4.7 (einbinden!');
        break;
      default:
        t3lib_extMgm::addStaticFile($_EXTKEY,'static/base/typo3/4.6/',     '+Org: Basis fuer TYPO3 < 4.7 (NICHT einbinden!)');
        t3lib_extMgm::addStaticFile($_EXTKEY,'static/downloads/301/flipit/typo3/4.6/',  '+Org: +Downloads Flip it! TYPO3 < 4.7 (NICHT einbinden!');
        break;
    }
    break;
  default:
      // English
    t3lib_extMgm::addStaticFile($_EXTKEY,'static/base/',                  'Org: Basis (obligate!)');
    t3lib_extMgm::addStaticFile($_EXTKEY,'static/calendar/201/',          '+Org: Calendar');
    t3lib_extMgm::addStaticFile($_EXTKEY,'static/calendar/201/caddy/',    '+Org: +Calendar +Caddy');
    t3lib_extMgm::addStaticFile($_EXTKEY,'static/calendar/201/expired/',  '+Org: +Calendar expired');
    t3lib_extMgm::addStaticFile($_EXTKEY,'static/calendar/211/',          '+Org: Calendar - margin');
    t3lib_extMgm::addStaticFile($_EXTKEY,'static/department/601/',        '+Org: Department');
    t3lib_extMgm::addStaticFile($_EXTKEY,'static/department/611/',        '+Org: Department - margin');
    t3lib_extMgm::addStaticFile($_EXTKEY,'static/downloads/301/',         '+Org: Downloads');
    t3lib_extMgm::addStaticFile($_EXTKEY,'static/downloads/301/caddy/',   '+Org: +Downloads +Caddy');
      // #i0004, 130914, dwildt, 1+
    t3lib_extMgm::addStaticFile($_EXTKEY,'static/downloads/301/caddy/wiFlag',   '+Org: +Downloads +Caddy +Flags');
    t3lib_extMgm::addStaticFile($_EXTKEY,'static/downloads/301/flipit/',  '+Org: +Downloads Flip it!');
    t3lib_extMgm::addStaticFile($_EXTKEY,'static/downloads/301/flipit/typo3/4.6/',  '+Org: +Downloads Flip it! +TYPO3 < 4.7');
    t3lib_extMgm::addStaticFile($_EXTKEY,'static/downloads/301/flipit/typo3/6.x/',  '+Org: +Downloads Flip it! +TYPO3 >= 6.x');
    t3lib_extMgm::addStaticFile($_EXTKEY,'static/downloads/311/',         '+Org: Downloads - TOP 5');
    t3lib_extMgm::addStaticFile($_EXTKEY,'static/downloads/302/',         '+Org: Downloads categories');
    t3lib_extMgm::addStaticFile($_EXTKEY,'static/headquarters/501/',      '+Org: Headquarters');
    t3lib_extMgm::addStaticFile($_EXTKEY,'static/headquarters/511/',      '+Org: Headquarters - margin');
    t3lib_extMgm::addStaticFile($_EXTKEY,'static/location/701/',          '+Org: Locations');
    t3lib_extMgm::addStaticFile($_EXTKEY,'static/location/711/',          '+Org: Locations - margin');
    t3lib_extMgm::addStaticFile($_EXTKEY,'static/news/401/',              '+Org: News');
    t3lib_extMgm::addStaticFile($_EXTKEY,'static/news/411/',              '+Org: News - margin');
    t3lib_extMgm::addStaticFile($_EXTKEY,'static/news/402/',              '+Org: News - slider');
    t3lib_extMgm::addStaticFile($_EXTKEY,'static/news/499/',              '+Org: News (RSS)');
    t3lib_extMgm::addStaticFile($_EXTKEY,'static/staff/101/',             '+Org: Staff');
    t3lib_extMgm::addStaticFile($_EXTKEY,'static/staff/111/',             '+Org: Staff - margin (don\'t cache!)');
    switch( true )
    {
      case( $typo3Version < 4007000 ):
        t3lib_extMgm::addStaticFile($_EXTKEY,'static/base/typo3/4.6/',     '+Org: Basis for TYPO3 < 4.7 (obligate!)');
        t3lib_extMgm::addStaticFile($_EXTKEY,'static/downloads/301/flipit/typo3/4.6/',  '+Org: +Downloads Flip it! TYPO3 < 4.7 (obligate!');
        break;
      default:
        t3lib_extMgm::addStaticFile($_EXTKEY,'static/base/typo3/4.6/',     '+Org: Basis for TYPO3 < 4.7 (don\'t use it!)');
        t3lib_extMgm::addStaticFile($_EXTKEY,'static/downloads/301/flipit/typo3/4.6/',  '+Org: +Downloads Flip it! TYPO3 < 4.7 (don\'t use it!');
        break;
    }
    break;
}
?>