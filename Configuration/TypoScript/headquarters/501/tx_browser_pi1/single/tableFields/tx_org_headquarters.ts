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
                      if {
                        isTrue {
                          stdWrap {
                            cObject = COA
                            cObject {
                              10 = TEXT
                              10 {
                                field = tx_org_headquarters.mail_address
                              }
                              20 = TEXT
                              20 {
                                field = tx_org_headquarters.mail_city
                              }
                              30 = TEXT
                              30 {
                                field = tx_org_headquarters.mail_country
                              }
                              40 = TEXT
                              40 {
                                field = tx_org_headquarters.mail_postcode
                              }
                              50 = TEXT
                              50 {
                                field = tx_org_headquarters.mail_street
                              }
                            }
                          }
                        }
                      }
                      wrap = <ul class="vcard tx_org_headquarters address">|</ul><!-- vcard -->
                        // header
                      10 = TEXT
                      10 {
                        data = LLL:EXT:org/locallang_db.xml:filter_phrase.address
                        wrap = <li class="header">|</li>
                      }
                        // mail_address
                      20 = TEXT
                      20 {
                        if {
                          isTrue {
                            field = tx_org_headquarters.mail_address
                          }
                        }
                        field = tx_org_headquarters.mail_address
                        wrap = <li class="address">|</li>
                      }
                        // mail_street
                      30 = TEXT
                      30 {
                        if {
                          isTrue {
                            field = tx_org_headquarters.mail_street
                          }
                        }
                        field = tx_org_headquarters.mail_street
                        wrap = <li class="street">|</li>
                      }
                        // postcode, city
                      40 = COA
                      40 {
                          // mail_postcode
                        10 = TEXT
                        10 {
                          if {
                            isTrue {
                              field = tx_org_headquarters.mail_postcode
                            }
                          }
                          field = tx_org_headquarters.mail_postcode
                          noTrimWrap = |<span class="postcode">|</span> |
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
                          noTrimWrap = |<span class="city">|</span> |
                        }
                        wrap = <li class="postcode_city">|</li>
                      }
                        // mail_country
                      50 = TEXT
                      50 {
                        if {
                          isTrue {
                            field = tx_org_headquarters.mail_country
                          }
                        }
                        field = tx_org_headquarters.mail_country
                        wrap = <li class="country">|</li>
                      }
                    }
                      // contact
                    20 = COA
                    20 {
                      if {
                        isTrue {
                          stdWrap {
                            cObject = COA
                            cObject {
                              10 = TEXT
                              10 {
                                field = tx_org_headquarters.email
                              }
                              20 = TEXT
                              20 {
                                field = tx_org_headquarters.fax
                              }
                              30 = TEXT
                              30 {
                                field = tx_org_headquarters.manager
                              }
                              40 = TEXT
                              40 {
                                field = tx_org_headquarters.telephone
                              }
                            }
                          }
                        }
                      }
                      wrap = <ul class="vcard tx_org_headquarters contact">|</ul><!-- vcard -->
                        // header
                      10 = TEXT
                      10 {
                        data = LLL:EXT:org/locallang_db.xml:filter_phrase.contact
                        wrap = <li class="header">|</li>
                      }
                        // manager
                        // items: tx_org_headquarterscat.title croped and linked
                      20 = COA
                      20 {
                          // items: tx_org_staff.title croped and linked
                        10 = CONTENT
                        10 {
                          table = tx_org_staff
                          select {
                            pidInList = {$plugin.org.sysfolder.staff}
                            join = tx_org_mm_all ON tx_org_mm_all.uid_foreign = tx_org_staff.uid
                            where {
                              field = tx_org_headquarters.uid
                              noTrimWrap = |tx_org_mm_all.uid_local = | AND tx_org_mm_all.table_local = 'tx_org_headquarters.manager' AND tx_org_mm_all.table_foreign = 'tx_org_staff'|
                            }
                            orderBy = tx_org_mm_all.sorting
                          }
                            // tx_org_staff.title croped and linked
                          renderObj = CASE
                          renderObj {
                            key {
                              field = {$plugin.tx_browser_pi1.templates.listview.url.2.key}
                            }
                              // link to detail view
                            default = TEXT
                            default {
                              field = title
                              wrap = |###POINT###
                              typolink < plugin.tx_browser_pi1.displayList.master_templates.tableFields.typolinks.2.default
                            }
                              // no link
                            notype = TEXT
                            notype {
                              field   = title
                            }
                              // link to internal page
                            page < .default
                            page {
                              typolink < plugin.tx_browser_pi1.displayList.master_templates.tableFields.typolinks.2.page
                            }
                              // link to external url
                            url < .page
                            url {
                              typolink < plugin.tx_browser_pi1.displayList.master_templates.tableFields.typolinks.2.url
                            }
                          }
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
                        wrap = <li class="manager">|</li>
                      }
                        // phone
                      30 = COA
                      30 {
                        10 = TEXT
                        10 {
                          value = phone:
                          lang {
                            de = Tel.:
                            en = phone:
                          }
                          noTrimWrap = || |
                        }
                        20 = TEXT
                        20 {
                          field = tx_org_headquarters.telephone
                        }
                        if {
                          isTrue {
                            field = tx_org_headquarters.telephone
                          }
                        }
                        wrap = <li class="telephone">|</li>
                      }
                        // fax
                      40 = TEXT
                      40 {
                        field = tx_org_headquarters.fax
                        wrap = <li class="fax">|</li>
                        required = 1
                      }
                        // email
                      50 = COA
                      50 {
                        10 = TEXT
                        10 {
                          value = e-mail:
                          lang {
                            de = E-Mail:
                            en = e-mail:
                          }
                          noTrimWrap = || |
                        }
                        20 = TEXT
                        20 {
                          field = tx_org_headquarters.email
                          typolink {
                            parameter {
                              field = tx_org_headquarters.email
                            }
                          }
                        }
                        if {
                          isTrue {
                            field = tx_org_headquarters.email
                          }
                        }
                        wrap = <li class="email">|</li>
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