plugin.tx_browser_pi1 {
  views {
    list {
      61826 {
          // title
        tx_org_event =
        tx_org_event {
            // content, margin
          title = COA
          title {
              // content: bookmarks, title, tx_org_eventcat.title, teaser_short, location
            10 = COA
            10 {
                // image
              10 = COA
              10 {
                  // image
                10 < plugin.tx_browser_pi1.displayList.master_templates.tableFields.image.0
                wrap = <div class="###CSSGRID######CSSGRIDMEDIUM###2 ###CSSGRIDLARGE###2">|</div>
              }
                // text
              20 = COA
              20 {
                  // socialmedia_bookmarks
                10 = TEXT
                10 {
                  value = ###SOCIALMEDIA_BOOKMARKS###
                  wrap = <div style="float:right;">|</div>
                }
                  // title: default, notype, page, url, tx_org_event
                20 < plugin.tx_browser_pi1.displayList.master_templates.tableFields.header.0
                  // tx_org_event.subtitle
                21 = TEXT
                21 {
                  field = tx_org_event.teaser_subtitle // tx_org_event.subtitle
                  wrap = <h3>|</h3>
                  required = 1
                }
                  // tx_org_eventcat.title
                30 = COA
                30 {
                  if {
                    isTrue {
                      field = tx_org_eventcat.title
                    }
                  }
                  wrap = <p class="tx_org_eventcat">|</p>
                    // label
                  10 = TEXT
                  10 {
                    data = LLL:EXT:org/locallang_db.xml:filter_phrase.eventcat
                    noTrimWrap = ||: |
                  }
                  20 = TEXT
                  20 {
                    field = tx_org_eventcat.title
                  }
                }
                  // teaser_short: default, notype, page, url, tx_org_event
                40 < plugin.tx_browser_pi1.displayList.master_templates.tableFields.text.0
                wrap = <div class="###CSSGRID######CSSGRIDMEDIUM###10 ###CSSGRIDLARGE###10">|</div>
              }
            }
          }
        }
      }
    }
  }
}