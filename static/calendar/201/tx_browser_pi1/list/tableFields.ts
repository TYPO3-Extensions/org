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
                tx_org_event {
                  typolink {
                    parameter {
                      cObject {
                        10 {
                          10 {
                            if {
                              isTrue = {$plugin.org.pages.event}
                            }
                            value = {$plugin.org.pages.event}
                          }
                          20 {
                            if {
                              isFalse = {$plugin.org.pages.event}
                            }
                            value = {$plugin.org.pages.event}
                          }
                        }
                      }
                    }
                    additionalParams {
                      field = tx_org_event.uid
                      wrap  = &tx_browser_pi1[eventUid]=|
                    }
                  }
                }
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
                  data = LLL:EXT:org/locallang_db.xml:filter_phrase.caltype.title
                  noTrimWrap = ||: |
                }
                20 = TEXT
                20 {
                  field = tx_org_caltype.title
                }
              }
              40 = TEXT
              40 {
                field = tx_org_location.mail_lat
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
                    // name of weekday
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
                    tx_org_event < .default
                    tx_org_event {
                      typolink {
                        parameter {
                          cObject {
                            10 {
                              10 {
                                if {
                                  isTrue = {$plugin.org.pages.event}
                                }
                                value = {$plugin.org.pages.event}
                              }
                              20 {
                                if {
                                  isFalse = {$plugin.org.pages.event}
                                }
                                value = {$plugin.org.pages.event}
                              }
                            }
                          }
                        }
                        additionalParams {
                          field = tx_org_event.uid
                          wrap  = &tx_browser_pi1[eventUid]=|
                        }
                      }
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
                    tx_org_event {
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
                    tx_org_event {
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

