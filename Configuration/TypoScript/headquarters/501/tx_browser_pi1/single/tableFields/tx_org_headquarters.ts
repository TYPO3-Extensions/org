plugin.tx_browser_pi1 {
  views {
    single {
      501 {
          // 140706: empty statement: for proper comments only
        tx_org_headquarters {
        }
          // title: image, header, bodytext, vita, groups
        tx_org_headquarters =
        tx_org_headquarters {
            // image, header, bodytext, vita, groups
            // title
          title < plugin.tx_browser_pi1.displaySingle.master_templates.tableFields.imageText.0
          title {
            20 {
              0 {
                10 >
                  // header, text, cat
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
                    field = tx_org_headquarters.title
                    wrap = <h1>|</h1>
                  }
                    // address, contact
                  30 = COA
                  30 {
                      // address
                    10 = COA
                    10 {
                      wrap = <div class="address">|</div>
                        // mail_postcode
                      10 = TEXT
                      10 {
                        if {
                          isTrue {
                            field = tx_org_headquarters.mail_postcode
                          }
                        }
                        field = tx_org_headquarters.mail_postcode
                        noTrimWrap = || |
                      }
                        // mail_city
                      20 = TEXT
                      20 {
                        if {
                          isTrue {
                            field = tx_org_headquarters.mail_city
                          }
                        }
                        field = tx_org_headquarters.mail_city
                        noTrimWrap = || |
                      }
                    }
                      // contact
                    20 = COA
                    20 {
                      wrap = <div class="contact">|</div>
                        // phone
                      10 = TEXT
                      10 {
                        if {
                          isTrue {
                            field = tx_org_headquarters.phone
                          }
                        }
                        field = tx_org_headquarters.phone
                        noTrimWrap = || |
                      }
                        // fax
                      20 = TEXT
                      20 {
                        if {
                          isTrue {
                            field = tx_org_headquarters.fax
                          }
                        }
                        field = tx_org_headquarters.fax
                        noTrimWrap = || |
                      }
                        // email
                      30 = TEXT
                      30 {
                        if {
                          isTrue {
                            field = tx_org_headquarters.email
                          }
                        }
                        field = tx_org_headquarters.email
                        noTrimWrap = || |
                      }
                    }
                  }
                    // bodytext
                  40 = TEXT
                  40 {
                    field = tx_org_headquarters.bodytext
                    stdWrap {
                      parseFunc < lib.parseFunc_RTE
                    }
                    required = 1
                  }
                    // tx_org_headquarterscat.title
                  90 = COA
                  90 {
                      // Marginal news box: header, items
                    10 = COA
                    10 {
                        // header
                      10 = TEXT
                      10 {
                        value = Groups
                        lang {
                          de = Gruppen
                          en = Groups
                        }
                        noTrimWrap = |<span class="header">|:</span> |
                      }
                        // items: tx_org_headquarterscat.title croped and linked
                      20 = CONTENT
                      20 {
                        table = tx_org_headquarterscat
                        select {
                          pidInList = {$plugin.org.sysfolder.headquarters}
                          //selectFields = tx_org_headquarterscat.title
                          join = tx_org_mm_all ON tx_org_mm_all.uid_foreign = tx_org_headquarterscat.uid
                          where {
                            field = tx_org_headquarters.uid
                            noTrimWrap = |tx_org_mm_all.uid_local = | AND tx_org_mm_all.table_local = 'tx_org_headquarters' AND tx_org_mm_all.table_foreign = 'tx_org_headquarterscat'|
                          }
                          orderBy = tx_org_headquarterscat.title
                          //max = 3
                        }
                          // tx_org_headquarterscat.title
                        renderObj = TEXT
                        renderObj {
                          field = title
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
                      // if is true tx_org_headquarterscat.uid
                    if =
                    if {
                      isTrue {
                        field = tx_org_headquarterscat.uid
                      }
                    }
                      // div box
                    wrap = <div class="show-for-large-up tx_org_headquarterscat">|</div>
                  }
                }
              }
              1 {
                10 >
                10 < plugin.tx_browser_pi1.views.single.501.tx_org_headquarters.title.20.0.10
              }
              2 {
                10 >
                10 < plugin.tx_browser_pi1.views.single.501.tx_org_headquarters.title.20.0.10
              }
              8 {
                10 >
                10 < plugin.tx_browser_pi1.views.single.501.tx_org_headquarters.title.20.0.10
              }
              9 {
                10 >
                10 < plugin.tx_browser_pi1.views.single.501.tx_org_headquarters.title.20.0.10
              }
              10 {
                10 >
                10 < plugin.tx_browser_pi1.views.single.501.tx_org_headquarters.title.20.0.10
              }
              17 {
                10 >
                10 < plugin.tx_browser_pi1.views.single.501.tx_org_headquarters.title.20.0.10
              }
              18 {
                10 >
                10 < plugin.tx_browser_pi1.views.single.501.tx_org_headquarters.title.20.0.10
              }
              25 {
                10 >
                10 < plugin.tx_browser_pi1.views.single.501.tx_org_headquarters.title.20.0.10
              }
              26 {
                10 >
                10 < plugin.tx_browser_pi1.views.single.501.tx_org_headquarters.title.20.0.10
              }
            }
          }
        }
      }
    }
  }
}