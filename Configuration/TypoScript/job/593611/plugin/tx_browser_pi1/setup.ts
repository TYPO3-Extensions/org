<INCLUDE_TYPOSCRIPT: source="FILE:EXT:org/Configuration/TypoScript/job/593611/plugin/tx_browser_pi1/settings/_setup.ts">

plugin.tx_browser_pi1 {

  XXXadvanced {
    sql {
      devider {
        tx_org_jobcat {
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
      display = 0
    }
    templateMarker {
      cssClass {
        wrap = 0
      }
    }
  }

  marker {
    my_tx_org_job__mail_city = TEXT
    my_tx_org_job__mail_city {
      data = LLL:EXT:org/Resources/Private/Language/tx_org_job.xml:tx_org_job.mail_city
    }
    my_tx_org_job__title = TEXT
    my_tx_org_job__title {
      data = LLL:EXT:org/Resources/Private/Language/tx_org_job.xml:tx_org_job.title
    }
  }

  views {
    list {
      593611 = +Org: Jobs
      593611 {
        name    = +Org: Jobs
        showUid = jobUid
      }
    }
    single {
      593611 = +Org: Jobs
    }
  }
}

<INCLUDE_TYPOSCRIPT: source="FILE:EXT:org/Configuration/TypoScript/job/593611/plugin/tx_browser_pi1/list/_setup.ts">
<INCLUDE_TYPOSCRIPT: source="FILE:EXT:org/Configuration/TypoScript/job/593611/plugin/tx_browser_pi1/single/_setup.ts">