plugin.tx_browser_pi1 {
  views {
    list {
      101 {
        tx_org_staff {
            // image, bookmarks; name, bodytext || vita
          title = COA
          title {
              // image, bookmarks
            10 = COA
            10 {
                // image
              10 = COA
              10 {
                10 < plugin.tx_browser_pi1.displayList.master_templates.tableFields.image.0
                wrap = <div>|</div>
              }
                // socialmedia_bookmarks
              20 = TEXT
              20 {
                value = ###SOCIALMEDIA_BOOKMARKS###
                wrap = <div>|</div>
              }
              wrap = <div class="show-for-large-up columns small-12 medium-12 large-2">|</div>
            }
              // name, bodytext || vita
            20 = COA
            20 {
                // name
              //10 < plugin.tx_browser_pi1.displayList.master_templates.tableFields.header.0
              10 = COA
              10 {
                wrap = <div class="tx_org_staff_name">|</div>
                  // name_first, name_last
                  // title (linked)
                10 = CASE
                10 {
                  key {
                    field = {$plugin.tx_browser_pi1.templates.listview.url.0.key}
                  }
                  default = COA
                  default {
                    10 = TEXT
                    10 {
                      field = tx_org_staff.name_first
                      noTrimWrap = || |
                    }
                    20 = TEXT
                    20 {
                      field = tx_org_staff.name_last
                    }
                    stdWrap {
                      typolink < plugin.tx_browser_pi1.displayList.master_templates.tableFields.typolinks.0.default
                    }
                  }
                  notype = TEXT
                  notype {
                    stdWrap >
                  }
                  page < .default
                  page {
                    stdWrap {
                      typolink < plugin.tx_browser_pi1.displayList.master_templates.tableFields.typolinks.0.page
                    }
                  }
                  url < .page
                  url {
                    stdWrap {
                      typolink < plugin.tx_browser_pi1.displayList.master_templates.tableFields.typolinks.0.url
                    }
                  }
                }
              }

                // bodytext || vita
              20 < plugin.tx_browser_pi1.displayList.master_templates.tableFields.text.0
              wrap = <div class="columns small-12 medium-12 large-10">|</div>
            }
            wrap = <div class="row">|</div>
          }
        }
      }
    }
  }
}