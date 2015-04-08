plugin.tx_browser_pi1 {
  views {
    list {
      499 {
        tx_org_news {
          teaser_short = COA
          teaser_short {
            10 = TEXT
            10 {
              field     = tx_org_news.teaser_short
              required  = 1
            }
            20 = TEXT
            20 {
              if {
                isFalse {
                  field = tx_org_news.teaser_short
                }
              }
              field     = tx_org_news.bodytext
              crop        = 300 | ... | 1
            }
            stdWrap {
              stripHtml = 1
            }
          }
          title = TEXT
          title {
            field = tx_org_news.title
            crop  = 60 | ... | 1
            stdWrap {
              stripHtml = 1
            }
          }
          uid = CASE
          uid {
            key {
              field = {$plugin.tx_browser_pi1.templates.listview.url.0.key}
            }
              // tx_org_news type: News
            default = TEXT
            default {
              typolink < plugin.tx_browser_pi1.displayList.master_templates.tableFields.typolinks.0.default
            }
              // tx_org_news type: no link
            notype = TEXT
            notype {
              value =
            }
              // tx_org_news type: Link internal Page
            page = TEXT
            page {
              typolink < plugin.tx_browser_pi1.displayList.master_templates.tableFields.typolinks.0.page
            }
              // tx_org_news type: Link external URL
            url = TEXT
            url {
              typolink < plugin.tx_browser_pi1.displayList.master_templates.tableFields.typolinks.0.url
            }
          }
        }
      }
    }
  }
}