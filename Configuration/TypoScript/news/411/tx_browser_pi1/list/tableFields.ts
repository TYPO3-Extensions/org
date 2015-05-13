plugin.tx_browser_pi1 {
  views {
    list {
      411 {
        tx_org_news {
          title = COA
          title {
            10 < plugin.tx_browser_pi1.displayList.master_templates.tableFields.header.3
            20 = TEXT
            20 {
              field = tx_org_news.marginal_subtitle // tx_org_news.teaser_subtitle // tx_org_news.subtitle
              required = 1
              noTrimWrap = |<p>|</p> |
              stdWrap {
                crop = 30|...|1
              }
            }
            wrap = <div class="record">|</div>
          }
        }
      }
    }
  }
}
  // plugin.tx_browser_pi1
