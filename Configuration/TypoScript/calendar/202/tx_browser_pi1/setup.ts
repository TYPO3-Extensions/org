plugin.tx_browser_pi1 {

  displayList {
    selectBox_orderBy {
      display = 1
    }
  }

  navigation.map.template.file = EXT:browser/Resources/Private/Templates/HTML/Map/map_filter_1.3.tmpl

  views {
    list {
      202 = +Org: Calendar (one column)
      202 {
        name    = +Org: Calendar (one column)
        showUid = {$plugin.tx_browser_pi1.navigation.showUid}
      }
    }
    single {
      202 = +Org: Calendar (one column)
    }
  }
}

<INCLUDE_TYPOSCRIPT: source="FILE:EXT:org/Configuration/TypoScript/calendar/201/tx_browser_pi1/list/_setup.ts">
<INCLUDE_TYPOSCRIPT: source="FILE:EXT:org/Configuration/TypoScript/calendar/202/tx_browser_pi1/single/_setup.ts">