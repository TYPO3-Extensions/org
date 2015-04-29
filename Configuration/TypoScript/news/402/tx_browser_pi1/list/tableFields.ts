plugin.tx_browser_pi1 {
  views {
    list {
      402 {
        tx_org_news {
            // text, bookmarks; image
          title = COA
          title {
              // text: teaser_title, teaser_subtitle, teaser_short, bookmarks
            10 = COA
            10 {
                // image
              10 = COA
              10 {
                  // image
                10 < plugin.tx_browser_pi1.displayList.master_templates.tableFields.image.0
                wrap = <div class="columns small-4">|</div>
              }
                // text
              20 = COA
              20 {
                  // title
                10 < plugin.tx_browser_pi1.displayList.master_templates.tableFields.header.0
                  // teaser_subtitle
                20 = TEXT
                20 {
                  field = tx_org_news.marginal_subtitle // tx_org_news.teaser_subtitle // tx_org_news.subtitle
                  wrap  = <p>|</p>
                  crop  = {$plugin.tx_browser_pi1.templates.listview.text.0.crop}
                  required = 1
                }
                20 >
                  // subtitle // short
                30 < plugin.tx_browser_pi1.displayList.master_templates.tableFields.text.0
                30 {
                  default {
                    10 >
                    20 {
                      value >
                      field < plugin.tx_browser_pi1.displayList.master_templates.tableFields.text.0.default.10.field
                    }
                  }
                  notype {
                    10 >
                    20 {
                      value >
                      field < plugin.tx_browser_pi1.displayList.master_templates.tableFields.text.0.default.10.field
                    }
                  }
                  page {
                    10 >
                    20 {
                      value >
                      field < plugin.tx_browser_pi1.displayList.master_templates.tableFields.text.0.default.10.field
                    }
                  }
                  url {
                    10 >
                    20 {
                      value >
                      field < plugin.tx_browser_pi1.displayList.master_templates.tableFields.text.0.default.10.field
                    }
                  }
                }
                wrap = <div class="columns small-8">|</div>
              }
            }
            wrap = <div class="row">|</div>
          }
        }
      }
    }
  }
}