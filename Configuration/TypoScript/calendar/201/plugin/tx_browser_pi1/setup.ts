plugin.tx_browser_pi1 {

  XXXadvanced {
    sql {
      devider {
        tx_org_caltype {
          title {
            display = TEXT
            display {
              value =
              wrap = |
            }
          }
        }
      }
    }
  }

  displayList {
    selectBox_orderBy {
      display = 1
    }
  }

  views {
    list {
      201 = +Org: Calendar
      201 {
        name    = +Org: Calendar
        showUid = {$plugin.tx_browser_pi1.navigation.showUid}
      }
    }
    single {
      201 = +Org: Calendar
    }
  }
}

<INCLUDE_TYPOSCRIPT: source="FILE:EXT:org/Configuration/TypoScript/calendar/201/plugin/tx_browser_pi1/list/_setup.ts">
<INCLUDE_TYPOSCRIPT: source="FILE:EXT:org/Configuration/TypoScript/calendar/201/plugin/tx_browser_pi1/single/_setup.ts">