plugin.tx_browser_pi1 {

  displayList {
    selectBox_orderBy {
      display = 0
    }
  }

  views {
    list {
      311 = +Org: Downloads - Top 5
      311 {
        name    = +Org: Downloads - Top 5
        showUid = {$plugin.tx_browser_pi1.navigation.showUid}
      }
    }
    single {
      311 = +Org: Downloads - Top 5
      311 {
        comment = This plugin should not used in the single view!
        template {
          file = EXT:org/res/html/downloads/311/default.tmpl
        }
        select = tx_org_downloads.title
      }
    }
  }

}

<INCLUDE_TYPOSCRIPT: source="FILE:EXT:org/Configuration/TypoScript/downloads/311/tx_browser_pi1/list/_setup.ts">