plugin.tx_browser_pi1 {
  views {
    single {
      61826 {
          // 140706: empty statement: for proper comments only
        tx_org_event {
        }
          // title: image, header, bodytext
        tx_org_event =
        tx_org_event {
          title < plugin.tx_browser_pi1.displaySingle.master_templates.tableFields.imageText.0
          XXXtitle {
            20 {
              0 {
                10 >
                  // bookmarks, header, bodytext
                10 = COA
                10 {
                    // socialmedia_bookmarks
                  10 = TEXT
                  10 {
                    value = ###SOCIALMEDIA_BOOKMARKS###
                    wrap = <div class="show-for-large-up socialbookmarks">|</div>
                  }
                    // header
                  20 = TEXT
                  20 {
                    field = tx_org_event.title // tx_org_cal.title
                    wrap = <h1>|</h1>
                  }
                    // tx_org_cal.subtitle
                  21 = TEXT
                  21 {
                    field = tx_org_event.subtitle // tx_org_cal.subtitle
                    wrap = <h2>|</h2>
                    required = 1
                  }
                    // bodytext
                  30 = TEXT
                  30 {
                    field = tx_org_event.bodytext // tx_org_cal.bodytext
                    required = 1
                    stdWrap {
                      parseFunc < lib.parseFunc_RTE
                    }
                  }
                    // length
                  31 = TEXT
                  31 {
                    field = tx_org_event.length
                    required = 1
                    stdWrap {
                      parseFunc < lib.parseFunc_RTE
                    }
                  }
                }
              }
              1 {
                10 >
                10 < plugin.tx_browser_pi1.views.single.201.tx_org_cal.title.20.0.10
              }
              2 {
                10 >
                10 < plugin.tx_browser_pi1.views.single.201.tx_org_cal.title.20.0.10
              }
              8 {
                10 >
                10 < plugin.tx_browser_pi1.views.single.201.tx_org_cal.title.20.0.10
              }
              9 {
                10 >
                10 < plugin.tx_browser_pi1.views.single.201.tx_org_cal.title.20.0.10
              }
              10 {
                10 >
                10 < plugin.tx_browser_pi1.views.single.201.tx_org_cal.title.20.0.10
              }
              17 {
                10 >
                10 < plugin.tx_browser_pi1.views.single.201.tx_org_cal.title.20.0.10
              }
              18 {
                10 >
                10 < plugin.tx_browser_pi1.views.single.201.tx_org_cal.title.20.0.10
              }
              25 {
                10 >
                10 < plugin.tx_browser_pi1.views.single.201.tx_org_cal.title.20.0.10
              }
              26 {
                10 >
                10 < plugin.tx_browser_pi1.views.single.201.tx_org_cal.title.20.0.10
              }
            }
          }
        }
      }
    }
  }
}