plugin.tx_browser_pi1 {

  displayList {
    selectBox_orderBy {
      display = 0
    }
  }

  views {
    list {
      302 = +Org: Downloads Categories
      302 {
        name    = +Org: Downloads Categories
        showUid = {$plugin.tx_browser_pi1.navigation.showUid}
      }
    }
    single {
      302 = +Org: Downloads Categories
      302 {
        comment = This plugin should not used in the single view!
        template {
          file = EXT:org/res/html/downloads/302/default.tmpl
        }
        select = tx_org_downloads.title
      }
    }
  }

}

<INCLUDE_TYPOSCRIPT: source="FILE:EXT:org/Configuration/TypoScript/downloads/302/tx_browser_pi1/list/_setup.ts">