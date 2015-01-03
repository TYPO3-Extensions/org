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
          title {
            20 {
              0 {
                  // subtitle
                21 = TEXT
                21 {
                  field = tx_org_event.subtitle // tx_org_event.teaser_subtitle
                  wrap = <h2>|</h2>
                  required = 1
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
              1 {
                21 < plugin.tx_browser_pi1.views.single.61826.tx_org_cal.title.20.0.21
                31 < plugin.tx_browser_pi1.views.single.61826.tx_org_cal.title.20.0.31
              }
              2 {
                21 < plugin.tx_browser_pi1.views.single.61826.tx_org_cal.title.20.0.21
                31 < plugin.tx_browser_pi1.views.single.61826.tx_org_cal.title.20.0.31
              }
              8 {
                21 < plugin.tx_browser_pi1.views.single.61826.tx_org_cal.title.20.0.21
                31 < plugin.tx_browser_pi1.views.single.61826.tx_org_cal.title.20.0.31
              }
              9 {
                21 < plugin.tx_browser_pi1.views.single.61826.tx_org_cal.title.20.0.21
                31 < plugin.tx_browser_pi1.views.single.61826.tx_org_cal.title.20.0.31
              }
              10 {
                21 < plugin.tx_browser_pi1.views.single.61826.tx_org_cal.title.20.0.21
                31 < plugin.tx_browser_pi1.views.single.61826.tx_org_cal.title.20.0.31
              }
              17 {
                21 < plugin.tx_browser_pi1.views.single.61826.tx_org_cal.title.20.0.21
                31 < plugin.tx_browser_pi1.views.single.61826.tx_org_cal.title.20.0.31
              }
              18 {
                21 < plugin.tx_browser_pi1.views.single.61826.tx_org_cal.title.20.0.21
                31 < plugin.tx_browser_pi1.views.single.61826.tx_org_cal.title.20.0.31
              }
              25 {
                21 < plugin.tx_browser_pi1.views.single.61826.tx_org_cal.title.20.0.21
                31 < plugin.tx_browser_pi1.views.single.61826.tx_org_cal.title.20.0.31
              }
              26 {
                21 < plugin.tx_browser_pi1.views.single.61826.tx_org_cal.title.20.0.21
                31 < plugin.tx_browser_pi1.views.single.61826.tx_org_cal.title.20.0.31
              }
            }
            wrap = <div class="row">|</div>
          }
        }
      }
    }
  }
}