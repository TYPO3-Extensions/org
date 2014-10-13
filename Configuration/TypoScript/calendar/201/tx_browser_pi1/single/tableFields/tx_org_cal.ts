plugin.tx_browser_pi1 {
  views {
    single {
      201 {
          // 140706: empty statement: for proper comments only
        tx_org_cal {
        }
          // title: image, header, bodytext
        tx_org_cal =
        tx_org_cal {
          title < plugin.tx_browser_pi1.displaySingle.master_templates.tableFields.imageText.0
          title {
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
                    field = tx_org_cal.title
                    wrap = <h1>|</h1>
                  }
                    // bodytext
                  30 = TEXT
                  30 {
                    field = tx_org_cal.bodytext
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
            // margin: datesheet
          datetime = COA
          datetime {
            wrap = |
            10 = COA
            10 {
              if {
                isTrue {
                  field = tx_org_cal.datetime
                }
              }
                // 10: date isn't expired
              10 = COA
              10 {
                if {
                  value {
                    data = date : U
                  }
                  isGreaterThan {
                    field = tx_org_cal.datetime
                  }
                }
                wrap = <ul class="vcard datesheet">|</ul><!-- vcard -->
                  // name of weekday
                10 = TEXT
                10 {
                  field = tx_org_cal.datetime
                  strftime  = %a
                  wrap = <li class="weekday">|</li>
                }
                  // day of month as number
                20 < .10
                20 {
                  strftime  = %d
                  wrap      = <li class="day_of_month">|</li>
                }
                  // month year
                30 < .10
                30 {
                  strftime  = %b %y
                  wrap      = <li class="month">|</li>
                }
              }
                // 20: date is expired
              20 < .10
              20 {
                if {
                  negate = 1
                }
                wrap = <ul class="vcard datesheet datesheet_expired">|</ul><!-- vcard -->
              }
            }
          }
        }
      }
    }
  }
}