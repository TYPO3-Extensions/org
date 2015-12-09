plugin.tx_browser_pi1 {
  views {
    single {
      301 {
        tx_org_downloads {
          title {
            30 {
              10 >
                // 140706: empty statement: for proper comments only
              10 {
              }
                // text: datetime, bodytext
              10 = COA
              10 {
                stdWrap.parseFunc < lib.parseFunc_RTE
                  // datetime
                10 = TEXT
                10 {
                  field       = tx_org_downloads.datetime
                  strftime    = %d. %b. %Y
                  noTrimWrap  = |<span class="datetime">| &ndash;</span> |
                }
                  // bodytext
                20 = TEXT
                20 {
                  field = tx_org_downloads.bodytext // tx_org_downloads.teaser_short
                }
                  // Download statistics (if tx_org_downloads.type isn't shipping)
                30 < temp.tx_org_downloads.statistic
              }
            }
          }
        }
      }
    }
  }
}