plugin.tx_browser_pi1 {
  views {
    list {
      412 {
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
                crop = 80|...|1
              }
            }
            20 >
            30 < plugin.tx_browser_pi1.displayList.master_templates.tableFields.text.3
            30 {
              default {
                10 >
                20 {
                  value >
                  field < plugin.tx_browser_pi1.displayList.master_templates.tableFields.text.3.default.10.field
                }
              }
              notype {
                10 >
                20 {
                  value >
                  field < plugin.tx_browser_pi1.displayList.master_templates.tableFields.text.3.default.10.field
                }
              }
              page {
                10 >
                20 {
                  value >
                  field < plugin.tx_browser_pi1.displayList.master_templates.tableFields.text.3.default.10.field
                }
              }
              url {
                10 >
                20 {
                  value >
                  field < plugin.tx_browser_pi1.displayList.master_templates.tableFields.text.3.default.10.field
                }
              }
            }
            wrap = <div class="record">|</div>
          }
        }
      }
    }
  }
}
