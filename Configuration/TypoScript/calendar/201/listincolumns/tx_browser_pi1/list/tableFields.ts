plugin.tx_browser_pi1 {
  views {
    list {
      201 {
          // crdate, deleted, title
        tx_org_cal =
        tx_org_cal {
          crdate >
            // placeholder: radialsearch HTML class depending on radius
          crdate < plugin.tx_radialsearch.masterTemplates.htmlClass
          deleted >
            // placeholder: radialsearch linear distance
          deleted < plugin.tx_radialsearch.masterTemplates.linearDistanceString
          title >
            // title
          title = COA
          title {
            wrap = <div class="columns medium-3">|</div>
              // image
            10 = COA
            10 {
              wrap = <div class="row" style="padding-bottom:1em;">|</div>
              10 < plugin.tx_browser_pi1.displayList.master_templates.tableFields.image.0.default
              10 {
                imageLinkWrap {
                  typolink {
                    parameter {
                      cObject {
                        30 {
                          value = linktosingle circle
                        }
                      }
                    }
                  }
                }
                wrap = <div class="columns small-6">|</div>
              }
                // tx_org_cal.datetime
              20 = COA
              20 {
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
                      // name of weekday
                    10 < plugin.tx_browser_pi1.displayList.master_templates.tableFields.details.0
                    10 {
                      default {
                        value >
                        lang >
                        field = tx_org_cal.datetime
                        strftime  = %a<br />%d %b %y<br />%H:%M
                        typolink.parameter.cObject.30.value = linktosingle button expand
                      }
                      notype {
                        value >
                        lang >
                        field = tx_org_cal.datetime
                        strftime  = %a<br />%d %b %y<br />%H:%M
                        typolink.parameter.cObject.30.value = linktosingle button expand
                      }
                      page {
                        value >
                        lang >
                        field = tx_org_cal.datetime
                        strftime  = %a<br />%d %b %y<br />%H:%M
                        typolink.parameter.cObject.30.value = linktosingle button expand
                      }
                      tx_org_event < plugin.tx_browser_pi1.displayList.master_templates.tableFields.details.6
                      tx_org_event {
                        default {
                          value >
                          lang >
                          field = tx_org_cal.datetime
                          strftime  = %a<br />%d %b %y<br />%H:%M
                          typolink.parameter.cObject.30.value = linktosingle button expand
                        }
                        notype {
                          value >
                          lang >
                          field = tx_org_cal.datetime
                          strftime  = %a<br />%d %b %y<br />%H:%M
                          typolink.parameter.cObject.30.value = linktosingle button expand
                        }
                        page {
                          value >
                          lang >
                          field = tx_org_cal.datetime
                          strftime  = %a<br />%d %b %y<br />%H:%M
                          typolink.parameter.cObject.30.value = linktosingle button expand
                        }
                        url {
                          value >
                          lang >
                          field = tx_org_cal.datetime
                          strftime  = %a<br />%d %b %y<br />%H:%M
                          typolink.parameter.cObject.30.value = linktosingle button expand
                        }
                      }
                      url {
                        value >
                        lang >
                        field = tx_org_cal.datetime
                        strftime  = %a<br />%d %b %y<br />%H:%M
                        typolink.parameter.cObject.30.value = linktosingle button expand
                      }
                    }
                    wrap = <div class="tx_org_cal_datetime">|</div>
                  }
                    // 20: date is expired
                  20 < .10
                  20 {
                    if {
                      negate = 1
                    }
                    wrap = <div class="tx_org_cal_datetime expired">|</div>
                  }
                  wrap = <div class="columns small-6">|</div>
                }
              }
            }
            20 = COA
            20 {
              stdWrap {
                wrap = <ul class="pricing-table" data-equalizer-watch>|</ul>
              }
                // teaser_title
              //12 < plugin.tx_browser_pi1.displayList.master_templates.tableFields.header.0.default
              12 < plugin.tx_browser_pi1.displayList.master_templates.tableFields.header.0
              12 {
                default {
                  wrap = <li class="bullet-item">|</li>
                }
                notype {
                  wrap = <li class="bullet-item">|</li>
                }
                page {
                  wrap = <li class="bullet-item">|</li>
                }
                url {
                  wrap = <li class="bullet-item">|</li>
                }
              }
                // tx_org_cal.datetime
              11 = COA
              11 {
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
                    wrap = <li class="bullet-item">|</li>
                    wrap  = <li class="title">|</li>
                      // name of weekday
                    10 < plugin.tx_browser_pi1.displayList.master_templates.tableFields.details.0
                    10 {
                      default {
                        value >
                        lang >
                        field = tx_org_cal.datetime
                        strftime  = %a, %d.%b %y
                        typolink.parameter.cObject.30.value = linktosingle button expand
                      }
                      notype {
                        value >
                        lang >
                        field = tx_org_cal.datetime
                        strftime  = %a, %d.%b %y
                        typolink.parameter.cObject.30.value = linktosingle button expand
                      }
                      page {
                        value >
                        lang >
                        field = tx_org_cal.datetime
                        strftime  = %a, %d.%b %y
                        typolink.parameter.cObject.30.value = linktosingle button expand
                      }
                      tx_org_event < plugin.tx_browser_pi1.displayList.master_templates.tableFields.details.6
                      tx_org_event {
                        default {
                          value >
                          lang >
                          field = tx_org_cal.datetime
                          strftime  = %a, %d.%b %y
                          typolink.parameter.cObject.30.value = linktosingle button expand
                        }
                        notype {
                          value >
                          lang >
                          field = tx_org_cal.datetime
                          strftime  = %a, %d.%b %y
                          typolink.parameter.cObject.30.value = linktosingle button expand
                        }
                        page {
                          value >
                          lang >
                          field = tx_org_cal.datetime
                          strftime  = %a, %d.%b %y
                          typolink.parameter.cObject.30.value = linktosingle button expand
                        }
                        url {
                          value >
                          lang >
                          field = tx_org_cal.datetime
                          strftime  = %a, %d.%b %y
                          typolink.parameter.cObject.30.value = linktosingle button expand
                        }
                      }
                      url {
                        value >
                        lang >
                        field = tx_org_cal.datetime
                        strftime  = %a, %d.%b %y
                        typolink.parameter.cObject.30.value = linktosingle button expand
                      }
                    }
                  }
                    // 20: date is expired
                  20 < .10
                  20 {
                    if {
                      negate = 1
                    }
                    wrap = <li class="bullet-item expired">|</li>
                    wrap = <li class="title expired">|</li>
                  }
                }
              }
                // category
              20 = TEXT
              20 {
                value = &nbsp;
                wrap  = <li class="bullet-item">|</li>
                override {
                  stdWrap {
                    if =
                    if {
                      isTrue {
                        field = tx_org_caltype.uid
                      }
                    }
                      // tx_org_caltype
                    cObject = CONTENT
                    cObject {
                      table = tx_org_caltype
                      select {
                        pidInList = {$plugin.org.sysfolder.calendar}
                        //selectFields = tx_org_caltype.title
                        join = tx_org_mm_all ON tx_org_mm_all.uid_foreign = tx_org_caltype.uid
                        where {
                          field = tx_org_cal.uid
                          noTrimWrap = |tx_org_mm_all.uid_local = | AND tx_org_mm_all.table_local = 'tx_org_cal' AND tx_org_mm_all.table_foreign = 'tx_org_caltype'|
                        }
                        orderBy = tx_org_caltype.title
                      }
                        // tx_org_cal.title
                      renderObj = TEXT
                      renderObj {
                        field = title
                        //noTrimWrap = |<span class="item">|</span>|
                        wrap = |###POINT###
                      }
                      stdWrap {
                        split {
                          token = ###POINT###
                          cObjNum = 1 |*| 1 |*| 2 || 2
                          1.current = 1
                          1.noTrimWrap = ||, |
                          2.current = 1
                          2.noTrimWrap = |||
                        }
                      }
                    }
                  }
                }
              }
              30 = TEXT
              30 {
                field     = tx_org_cal.marginal_subtitle
                required  = 1
                wrap      = <li class="bullet-item">|</li>
              }
                // teaser_short
              40 < plugin.tx_browser_pi1.displayList.master_templates.tableFields.text.0
              40 {
                default {
                  wrap = <li class="description">|</li>
                }
                notype {
                  wrap = <li class="description">|</li>
                }
                page {
                  wrap = <li class="description">|</li>
                }
                url {
                  wrap = <li class="description">|</li>
                }
              }
                // location
              50 = TEXT
              50 {
                crop      = 25 | ... | 1
                override {
                  stdWrap {
                    cObject = TEXT
                    cObject {
                      field = tx_org_location.mail_city
                    }
                  }
                }
                value     = &nbsp;
                wrap      = <li class="bullet-item">|</li>
              }
            }
          }
        }
      }
    }
  }
}