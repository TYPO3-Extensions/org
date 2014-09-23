plugin.tx_browser_pi1 {
  views {
    list {
      201 {
        tx_org_cal {
            // placeholder: radialsearch HTML class depending on radius
          crdate < plugin.tx_radialsearch.masterTemplates.htmlClass
            // placeholder: radialsearch linear distance
          deleted < plugin.tx_radialsearch.masterTemplates.linearDistanceString
            // datesheet, bookmarks; name, bodytext || vita
          title = COA
          title {
              // content: bookmarks, title, subline
            10 = COA
            10 {
                // socialmedia_bookmarks
              10 = TEXT
              10 {
                value = ###SOCIALMEDIA_BOOKMARKS###
                wrap = <div style="float:right;">|</div>
              }
                // tx_org_cal.title
              20 < plugin.tx_browser_pi1.displayList.master_templates.tableFields.header.0
              20 {
                tx_org_event < .default
              }
                // tx_org_caltype.title
              30 = COA
              30 {
                if {
                  isTrue {
                    field = tx_org_caltype.title
                  }
                }
                wrap = <div class="tx_org_caltype">|</div>
                  // label
                10 = TEXT
                10 {
                  data = LLL:EXT:org/locallang_db.xml:filter_phrase.headquarterscat
                  noTrimWrap = ||: |
                }
                20 = TEXT
                20 {
                  field = tx_org_caltype.title
                }
              }
                // mail_postcode, mail_city
              40 = COA
              40 {
                wrap = <div class="subline">|</div>
                  // mail_postcode
                10 = TEXT
                10 {
                  if {
                    isTrue {
                      field = tx_org_cal.mail_postcode
                    }
                  }
                  field = tx_org_cal.mail_postcode
                  noTrimWrap = || |
                }
                  // mail_city
                20 = TEXT
                20 {
                  if {
                    isTrue {
                      field = tx_org_cal.mail_city
                    }
                  }
                  field = tx_org_cal.mail_city
                  noTrimWrap = || |
                }
                  // link to the single view (record), internal page, external URL or no link (empty value)
                30 < plugin.tx_browser_pi1.displayList.master_templates.tableFields.details.0
              }
              wrap = <div class="columns small-12 medium-12 large-10">|</div>
            }
              // margin: datesheet
            20 = COA
            20 {
              wrap = <div class="show-for-large-up columns small-12 medium-12 large-2">|</div>
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
                  //wrap = <div class="my_datesheet">|</div>
                    // name of weekday
                  10 = TEXT
                  10 {
                    field = tx_org_cal.datetime
                    strftime  = %a
                    //wrap      = <div class="weekday">|</div>
                    wrap = <li class="weekday">|</li>
                    typolink {
                      parameter         = {$plugin.org.pages.calendar} - "linktosingle invert"
                      //additionalParams  = &tx_browser_pi1[{$plugin.tx_browser_pi1.navigation.showUid}]=###TX_ORG_CAL.UID###
                      additionalParams {
                        cObject = TEXT
                        cObject {
                          field = tx_org_cal.uid
                          wrap  = &tx_browser_pi1[{$plugin.tx_browser_pi1.navigation.showUid}]=|
                        }
                      }
                      useCacheHash = 1
                    }
                  }
                  10 >
                  10 < plugin.tx_browser_pi1.displayList.master_templates.tableFields.details.0
                  10 {
                    default {
                      value >
                      lang >
                      field = tx_org_cal.datetime
                      strftime  = %a
                      wrap = <li class="weekday">|</li>
                    }
                    notype {
                      value >
                      lang >
                      field = tx_org_cal.datetime
                      strftime  = %a
                      wrap = <li class="weekday">|</li>
                    }
                    page {
                      value >
                      lang >
                      field = tx_org_cal.datetime
                      strftime  = %a
                      wrap = <li class="weekday">|</li>
                    }
                    url {
                      value >
                      lang >
                      field = tx_org_cal.datetime
                      strftime  = %a
                      wrap = <li class="weekday">|</li>
                    }
                  }
                    // day of month as number
                  20 < .10
                  20 {
                    default {
                      strftime  = %d
                      wrap      = <li class="day_of_month">|</li>
                    }
                    notype {
                      strftime  = %d
                      wrap      = <li class="day_of_month">|</li>
                    }
                    page {
                      strftime  = %d
                      wrap      = <li class="day_of_month">|</li>
                    }
                    url {
                      strftime  = %d
                      wrap      = <li class="day_of_month">|</li>
                    }
                  }
                    // month year
                  30 < .10
                  30 {
                    default {
                      strftime  = %b %y
                      wrap      = <li class="month">|</li>
                    }
                    notype {
                      strftime  = %b %y
                      wrap      = <li class="month">|</li>
                    }
                    page {
                      strftime  = %b %y
                      wrap      = <li class="month">|</li>
                    }
                    url {
                      strftime  = %b %y
                      wrap      = <li class="month">|</li>
                    }
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
            wrap = <div class="row">|</div>
          }
        }
      }
    }
  }
}