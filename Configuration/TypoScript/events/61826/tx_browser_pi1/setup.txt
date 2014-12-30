plugin.tx_browser_pi1 {

  displayList {
    selectBox_orderBy {
      display = 1
    }
  }

  navigation.map.template.file = EXT:browser/Resources/Private/Templates/HTML/Map/map_filter_1.3.tmpl

  views {
    list {
      61826 = +Org: Events
      61826 {
        name    = +Org: Events
        showUid = {$plugin.tx_browser_pi1.navigation.showUid}
        navigation < plugin.tx_browser_pi1.navigation
        navigation {
          map {
            enabled = disabled
          }
        }
      }
    }
    single {
      61826 = +Org: Events
    }
  }
}

<INCLUDE_TYPOSCRIPT: source="FILE:EXT:org/Configuration/TypoScript/events/61826/tx_browser_pi1/list/_setup.ts">
<INCLUDE_TYPOSCRIPT: source="FILE:EXT:org/Configuration/TypoScript/events/61826/tx_browser_pi1/single/_setup.ts">