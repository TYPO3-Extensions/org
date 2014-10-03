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
            // bookmarks; header; image, bodytext
          title = COA
          title {
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
              // image, bodytext
            30 = COA
            30 {
                // image
              10 = COA
              10 {
                if {
                  isTrue {
                    field = tx_org_cal.image
                  }
                }
                wrap = <div style="float:right;padding:0 0 1em 1em;">|</div>
                10 < plugin.tx_browser_pi1.displaySingle.master_templates.tableFields.image.0.notype
                10 {
                  wrap = <div class="image">|</div>
                }
                20 = TEXT
                20 {
                  field = tx_org_cal.imagecaption
                  wrap = <div class="caption">|</div>
                }
              }
                // caption
              20 = TEXT
              20 {
                field = tx_org_cal.bodytext
                stdWrap {
                  parseFunc < lib.parseFunc_RTE
                }
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