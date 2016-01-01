plugin.tx_browser_pi1 {

  displayList {
    selectBox_orderBy {
      display = 1
    }
  }

  views {
    list {
      301 = +Org: Downloads
      301 {
        name    = +Org: Downloads
        showUid = {$plugin.tx_browser_pi1.navigation.showUid}
      }
    }
    single {
      301 = +Org: Downloads
    }
  }
}

<INCLUDE_TYPOSCRIPT: source="FILE:EXT:org/Configuration/TypoScript/downloads/301/tx_browser_pi1/temp/_setup.ts">
<INCLUDE_TYPOSCRIPT: source="FILE:EXT:org/Configuration/TypoScript/downloads/301/tx_browser_pi1/list/_setup.ts">
<INCLUDE_TYPOSCRIPT: source="FILE:EXT:org/Configuration/TypoScript/downloads/301/tx_browser_pi1/single/_setup.ts">