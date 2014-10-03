plugin.tx_browser_pi1 {
  views {
    single {
      401 {
          // 140706: empty statement: for proper comments only
        tx_org_staff {
        }
          // uid: object for the people marginal box
        tx_org_staff =
        tx_org_staff {
            // row: vcard
          uid = COA
          uid {
            if {
              isTrue {
                field = tx_org_staff.uid
              }
            }
              // column: vcard
            10 = COA
            10 {
                // column: image, header, name, department, phone, fax, e-mail, apply online, url
              10 = COA
              10 {
                wrap = <ul class="vcard tx_org_staff">|</ul><!-- vcard -->
                  // image, header
                10 = COA
                10 {
                  10 = COA
                  10 {
                    10 < plugin.tx_browser_pi1.displayList.master_templates.tableFields.image.1
                    wrap = <div class="image" style="float:right;padding-left:1em;">|</div>
                  }
                    // title, if title (name)
                  20 = TEXT
                  20 {
                    value = By
                    lang {
                      de = Von
                      en = By
                    }
                  }
                  wrap = <li class="header">|</li>
                }
                  // name linked
                20 = CASE
                20 {
                  key {
                    field = {$plugin.tx_browser_pi1.templates.listview.url.1.key}
                  }
                  default = TEXT
                  default {
                    stdWrap {
                      cObject = COA
                      cObject {
                          // title, if title (name)
                        20 = TEXT
                        20 {
                          if {
                            isTrue {
                              field = tx_org_staff.title
                            }
                          }
                          field = tx_org_staff.title
                        }
                          // name_first name_last, if no title (name)
                        30 = COA
                        30 {
                          if {
                            isFalse {
                              field = tx_org_staff.title
                            }
                          }
                          10 = TEXT
                          10 {
                            field = tx_org_staff.name_first
                            noTrimWrap = || |
                            required = 1
                          }
                          20 = TEXT
                          20 {
                            field = tx_org_staff.name_last
                          }
                        }
                      }
                    }
                    stdWrap {
                      noTrimWrap = || &raquo;|
                    }
                    typolink < plugin.tx_browser_pi1.displayList.master_templates.tableFields.typolinks.1.default
                    wrap = <li class="fn">|</li>
                  }
                  notype = TEXT
                  notype {
                    value =
                    wrap = |
                  }
                  page < .default
                  page {
                    typolink < plugin.tx_browser_pi1.displayList.master_templates.tableFields.typolinks.1.page
                  }
                  url < .page
                  url {
                    typolink < plugin.tx_browser_pi1.displayList.master_templates.tableFields.typolinks.1.url
                  }
                }
                  // phone
                41 = COA
                41 {
                  if {
                    isTrue {
                      field = tx_org_staff.contact_phone // tx_org_headquarters.telephone
                    }
                  }
                  wrap = <li class="phone">|</li>
                    // label
                  10 = TEXT
                  10 {
                    noTrimWrap = || |
                    value = phone
                    lang {
                      en = phone
                      de = Tel.
                    }
                    wrap = <span class="labeling">|</span>
                  }
                    // value
                  20 = TEXT
                  20 {
                    field = tx_org_staff.contact_phone // tx_org_headquarters.telephone
                    required = 1
                    wrap = <span class="value">|</span>
                  }
                }
                  // fax
                42 = COA
                42 {
                  if {
                    isTrue {
                      field = tx_org_staff.contact_fax // tx_org_headquarters.fax
                    }
                  }
                  wrap = <li class="phone">|</li>
                    // label
                  10 = TEXT
                  10 {
                    noTrimWrap = || |
                    value = fax
                    lang {
                      en = fax
                      de = Fax
                    }
                    wrap = <span class="labeling">|</span>
                  }
                    // fax
                  20 = TEXT
                  20 {
                    field = tx_org_staff.contact_fax // tx_org_headquarters.fax
                    required = 1
                    wrap = <span class="value">|</span>
                  }
                }
                  // e-mail
                43 = TEXT
                43 {
                  field = tx_org_staff.contact_email // tx_org_headquarters.email
                  stdWrap {
                    stripHtml = 1
                    htmlSpecialChars = 1
                  }
                  typolink {
                    parameter {
                      field = tx_org_staff.contact_email // tx_org_headquarters.email
                    }
                  }
                  wrap = <li class="email"><span class="email"></span>|</li>
                  required = 1
                }
              }
            }
          }
        }
      }
    }
  }
}