plugin.tx_browser_pi1 {
  views {
    list {
      311 {
        tx_org_downloads {
            // teaser_title or title
          title = COA
          title {
              // teaser_title
            10 < plugin.tx_browser_pi1.displayList.master_templates.tableFields.header.0.default
              // statistic downloads by visits
            20 = TEXT
            20 {
              field = tx_org_downloads.statistics_downloads_by_visits
              noTrimWrap = | (|)|
            }
            wrap = <li>|</li>
          }
        }
      }
    }
  }
}