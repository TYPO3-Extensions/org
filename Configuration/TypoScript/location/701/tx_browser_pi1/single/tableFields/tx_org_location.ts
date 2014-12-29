plugin.tx_browser_pi1 {
  views {
    single {
      701 {
          // 140706: empty statement: for proper comments only
        tx_org_location {
        }
          // title: image, header, bodytext, vita, groups
        tx_org_location =
        tx_org_location {
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
                    field = tx_org_location.title
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
                                field = tx_org_location.mail_address
                              }
                              20 = TEXT
                              20 {
                                field = tx_org_location.mail_city
                              }
                              30 = TEXT
                              30 {
                                field = tx_org_location.mail_country
                              }
                              40 = TEXT
                              40 {
                                field = tx_org_location.mail_postcode
                              }
                              50 = TEXT
                              50 {
                                field = tx_org_location.mail_street
                              }
                            }
                          }
                        }
                      }
                      wrap = <ul class="vcard tx_org_location address">|</ul><!-- vcard -->
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
                            field = tx_org_location.mail_address
                          }
                        }
                        field = tx_org_location.mail_address
                        wrap = <li class="address">|</li>
                      }
                        // mail_street
                      30 = TEXT
                      30 {
                        if {
                          isTrue {
                            field = tx_org_location.mail_street
                          }
                        }
                        field = tx_org_location.mail_street
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
                              field = tx_org_location.mail_postcode
                            }
                          }
                          field = tx_org_location.mail_postcode
                          noTrimWrap = |<span class="postcode">|</span> |
                        }
                          // mail_city
                        20 = TEXT
                        20 {
                          if {
                            isTrue {
                              field = tx_org_location.mail_city
                            }
                          }
                          field = tx_org_location.mail_city
                          noTrimWrap = |<span class="city">|</span> |
                        }
                        wrap = <li class="postcode_city">|</li>
                      }
                        // mail_country
                      50 = TEXT
                      50 {
                        if {
                          isTrue {
                            field = tx_org_location.mail_country
                          }
                        }
                        field = tx_org_location.mail_country
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
                                field = tx_org_location.email
                              }
                              20 = TEXT
                              20 {
                                field = tx_org_location.fax
                              }
                              30 = TEXT
                              30 {
                                field = tx_org_location.telephone
                              }
                              40 = TEXT
                              40 {
                                field = tx_org_location.ticket_telephone
                              }
                              50 = TEXT
                              50 {
                                field = tx_org_location.ticket_url
                              }
                              60 = TEXT
                              60 {
                                field = tx_org_location.tx_org_staff
                              }
                            }
                          }
                        }
                      }
                      wrap = <ul class="vcard tx_org_location contact">|</ul><!-- vcard -->
                        // header
                      10 = TEXT
                      10 {
                        data = LLL:EXT:org/locallang_db.xml:filter_phrase.contact
                        wrap = <li class="header">|</li>
                      }
                        // staff
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
                              field = tx_org_location.uid
                              noTrimWrap = |tx_org_mm_all.uid_local = | AND tx_org_mm_all.table_local = 'tx_org_location' AND tx_org_mm_all.table_foreign = 'tx_org_staff'|
                            }
                            orderBy = tx_org_mm_all.sorting
                          }
                            // tx_org_staff.title croped and linked
                          renderObj = CASE
                          renderObj {
                            key {
                              field = {$plugin.tx_browser_pi1.templates.listview.url.1.key}
                            }
                              // link to detail view
                            default = TEXT
                            default {
                              field = title
                              wrap = |###POINT###
                              typolink < plugin.tx_browser_pi1.displayList.master_templates.tableFields.typolinks.1.default
                            }
                              // no link
                            notype = TEXT
                            notype {
                              field   = title
                            }
                              // link to internal page
                            page < .default
                            page {
                              typolink < plugin.tx_browser_pi1.displayList.master_templates.tableFields.typolinks.1.page
                            }
                              // link to external url
                            url < .page
                            url {
                              typolink < plugin.tx_browser_pi1.displayList.master_templates.tableFields.typolinks.1.url
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
                        wrap = <li class="tx_org_staff">|</li>
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
                          field = tx_org_location.telephone
                        }
                        if {
                          isTrue {
                            field = tx_org_location.telephone
                          }
                        }
                        wrap = <li class="telephone">|</li>
                      }
                        // phone
                      40 = COA
                      40 {
                        10 = TEXT
                        10 {
                          value = ticket phone:
                          lang {
                            de = Karten-Tel.:
                            en = ticket phone:
                          }
                          noTrimWrap = || |
                        }
                        20 = TEXT
                        20 {
                          field = tx_org_location.ticket_telephone
                        }
                        if {
                          isTrue {
                            field = tx_org_location.ticket_telephone
                          }
                        }
                        wrap = <li class="ticket_telephone">|</li>
                      }
                        // ticket_url
                      50 = COA
                      50 {
                        10 = TEXT
                        10 {
                          value = tickets online:
                          lang {
                            de = Karten online:
                            en = tickets online:
                          }
                          noTrimWrap = || |
                        }
                        20 = TEXT
                        20 {
                          field = tx_org_location.ticket_url
                          typolink {
                            parameter {
                              field = tx_org_location.ticket_url
                            }
                          }
                        }
                        if {
                          isTrue {
                            field = tx_org_location.ticket_url
                          }
                        }
                        wrap = <li class="ticket_url">|</li>
                      }
                        // fax
                      60 = TEXT
                      60 {
                        field = tx_org_location.fax
                        wrap = <li class="fax">|</li>
                        required = 1
                      }
                        // email
                      70 = COA
                      70 {
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
                          field = tx_org_location.email
                          typolink {
                            parameter {
                              field = tx_org_location.email
                            }
                          }
                        }
                        if {
                          isTrue {
                            field = tx_org_location.email
                          }
                        }
                        wrap = <li class="email">|</li>
                      }
                    }
                  }
                    // bodytext
                  40 = TEXT
                  40 {
                    field = tx_org_location.bodytext
                    stdWrap {
                      parseFunc < lib.parseFunc_RTE
                    }
                  }
                    // tx_org_locationcat.title
                  90 = COA
                  90 {
                      // Marginal news box: header, items
                    10 = COA
                    10 {
                        // header
                      10 = TEXT
                      10 {
                        value = Business segments
                        lang {
                          de = Geschäftsfelder
                          en = Business segments
                        }
                        noTrimWrap = |<span class="header">|:</span> |
                      }
                        // items: tx_org_locationcat.title croped and linked
                      20 = CONTENT
                      20 {
                        table = tx_org_locationcat
                        select {
                          pidInList = {$plugin.org.sysfolder.location}
                          //selectFields = tx_org_locationcat.title
                          join = tx_org_mm_all ON tx_org_mm_all.uid_foreign = tx_org_locationcat.uid
                          where {
                            field = tx_org_location.uid
                            noTrimWrap = |tx_org_mm_all.uid_local = | AND tx_org_mm_all.table_local = 'tx_org_location' AND tx_org_mm_all.table_foreign = 'tx_org_locationcat'|
                          }
                          orderBy = tx_org_locationcat.title
                          //max = 3
                        }
                          // tx_org_locationcat.title
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
                      // if is true tx_org_locationcat.uid
                    if =
                    if {
                      isTrue {
                        field = tx_org_locationcat.uid
                      }
                    }
                      // div box
                    wrap = <div class="show-for-large-up tx_org_locationcat">|</div>
                  }
                }
              }
              1 {
                10 >
                10 < plugin.tx_browser_pi1.views.single.701.tx_org_location.title.20.0.10
              }
              2 {
                10 >
                10 < plugin.tx_browser_pi1.views.single.701.tx_org_location.title.20.0.10
              }
              8 {
                10 >
                10 < plugin.tx_browser_pi1.views.single.701.tx_org_location.title.20.0.10
              }
              9 {
                10 >
                10 < plugin.tx_browser_pi1.views.single.701.tx_org_location.title.20.0.10
              }
              10 {
                10 >
                10 < plugin.tx_browser_pi1.views.single.701.tx_org_location.title.20.0.10
              }
              17 {
                10 >
                10 < plugin.tx_browser_pi1.views.single.701.tx_org_location.title.20.0.10
              }
              18 {
                10 >
                10 < plugin.tx_browser_pi1.views.single.701.tx_org_location.title.20.0.10
              }
              25 {
                10 >
                10 < plugin.tx_browser_pi1.views.single.701.tx_org_location.title.20.0.10
              }
              26 {
                10 >
                10 < plugin.tx_browser_pi1.views.single.701.tx_org_location.title.20.0.10
              }
            }
          }
            // location marginal box: header, content
          contact_email = COA
          contact_email {
            if {
              isTrue {
                field = tx_org_location.uid
              }
            }
              // vcard: header, name, contact_email, contact_phone, contact_fax, contact_skype, contact_url,
            10 = COA
            10 {
                // column: image, header, title, steet, zip city, url
              10 = COA
              10 {
                wrap = <ul class="vcard tx_org_location">|</ul><!-- vcard -->
                  // image, header
                10 = COA
                10 {
                  wrap = <li class="header">|</li>
                    // title, if title (name)
                  10 = TEXT
                  10 {
                    value = Contact data
                    lang {
                      de = Kontakt
                      en = Contact data
                    }
                  }
                }
                10 >
                  // name (linked)
                20 = CASE
                20 {
                  key {
                    field = {$plugin.tx_browser_pi1.templates.listview.url.2.key}
                  }
                  default = TEXT
                  default {
                    field = tx_org_location.title
                    noTrimWrap = |<li class="fn"> | &raquo;</li>|
                    required = 1
                    typolink < plugin.tx_browser_pi1.displayList.master_templates.tableFields.typolinks.2.default
                  }
                  notype = TEXT
                  notype {
                    noTrimWrap = |<li class="fn"> | </li>|
                  }
                  page < .default
                  page {
                    typolink < plugin.tx_browser_pi1.displayList.master_templates.tableFields.typolinks.2.page
                  }
                  url < .page
                  url {
                    typolink < plugin.tx_browser_pi1.displayList.master_templates.tableFields.typolinks.2.url
                  }
                }
                20 >
                  // contact_email
                30 = TEXT
                30 {
                  if {
                    isTrue {
                      field = tx_org_location.contact_email
                    }
                  }
                  typolink {
                    parameter {
                      field = tx_org_location.contact_email
                    }
                  }
                  wrap = <li class="contact_email">|</li>
                }
                  // contact_phone
                40 = COA
                40 {
                  if {
                    isTrue {
                      field = tx_org_location.contact_phone
                    }
                  }
                  wrap = <li class="contact_phone">|</li>
                  10 = TEXT
                  10 {
                    value = phone
                    lang {
                      de = Tel.
                      en = phone
                    }
                    noTrimWrap = ||: |
                  }
                  20 = TEXT
                  20 {
                    field = tx_org_location.contact_phone
                    required = 1
                  }
                }
                  // contact_fax
                50 = COA
                50 {
                  if {
                    isTrue {
                      field = tx_org_location.contact_fax
                    }
                  }
                  wrap = <li class="contact_fax">|</li>
                  10 = TEXT
                  10 {
                    value = fax
                    lang {
                      de = Fax
                      en = fax
                    }
                    noTrimWrap = ||: |
                  }
                  20 = TEXT
                  20 {
                    field = tx_org_location.contact_fax
                    required = 1
                  }
                }
                  // contact_skype
                60 = COA
                60 {
                  if {
                    isTrue {
                      field = tx_org_location.contact_skype
                    }
                  }
                  wrap = <li class="contact_skype">|</li>
                  10 = TEXT
                  10 {
                    value = Skype
                    lang {
                      de = Skype
                      en = Skype
                    }
                    noTrimWrap = ||: |
                  }
                  20 = TEXT
                  20 {
                    field = tx_org_location.contact_skype
                    required = 1
                  }
                }
                  // contact_url
                70 = COA
                70 {
                  if {
                    isTrue {
                      field = tx_org_location.contact_url
                    }
                  }
                  wrap = <li class="contact_url">|</li>
                  10 = TEXT
                  10 {
                    value = Homepage
                    lang {
                      de = Homepage
                      en = Homepage
                    }
                    noTrimWrap = || &raquo;|
                    required = 1
                    typolink {
                      parameter{
                        field = tx_org_location.contact_url
                      }
                    }
                  }
                }
              }
            }
          }
        }
      }
    }
  }
}