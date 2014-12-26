plugin.tx_browser_pi1 {
  views {
    single {
      102 {
          // 140706: empty statement: for proper comments only
        tx_org_staff {
        }
          // title: image, header, bodytext, vita
        tx_org_staff =
        tx_org_staff {
            // title
          title < plugin.tx_browser_pi1.displaySingle.master_templates.tableFields.imageText.0
          title {
            20 {
              0 {
                10 >
                  // header, bodytext, vita
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
                    field = tx_org_staff.title
                    wrap = <h1>|</h1>
                  }
                    // contact: header, name, contact_email, contact_phone, contact_fax, contact_skype, contact_url,
                  30 = COA
                  30 {
                      // column: image, header, title, steet, zip city, url
                    10 = COA
                    10 {
                      wrap = <ul class="vcard tx_org_staff">|</ul><!-- vcard -->
                        // header
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
                        // contact_email
                      30 = COA
                      30 {
                        if {
                          isTrue {
                            field = tx_org_staff.contact_email
                          }
                        }
                        10 = TEXT
                        10 {
                          value = e-mail
                          lang {
                            de = E-Mail
                            en = e-mail
                          }
                          noTrimWrap = ||: |
                        }
                        20 = TEXT
                        20 {
                          typolink {
                            parameter {
                              field = tx_org_staff.contact_email
                            }
                          }
                        }
                        wrap = <li class="contact_email">|</li>
                      }
                        // contact_phone
                      40 = COA
                      40 {
                        if {
                          isTrue {
                            field = tx_org_staff.contact_phone
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
                          field = tx_org_staff.contact_phone
                          required = 1
                        }
                      }
                        // contact_fax
                      50 = COA
                      50 {
                        if {
                          isTrue {
                            field = tx_org_staff.contact_fax
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
                          field = tx_org_staff.contact_fax
                          required = 1
                        }
                      }
                        // contact_skype
                      60 = COA
                      60 {
                        if {
                          isTrue {
                            field = tx_org_staff.contact_skype
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
                          field = tx_org_staff.contact_skype
                          required = 1
                        }
                      }
                        // contact_url
                      70 = COA
                      70 {
                        if {
                          isTrue {
                            field = tx_org_staff.contact_url
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
                              field = tx_org_staff.contact_url
                            }
                          }
                        }
                      }
                    }
                  }
                    // bodytext
                  40 = TEXT
                  40 {
                    field = tx_org_staff.bodytext
                    stdWrap {
                      parseFunc < lib.parseFunc_RTE
                    }
                  }
                    // vita
                  50 < tt_content.table.20
                  50 {
                    userFunc = tx_browser_cssstyledcontent->render_table
                    userFunc {
                        // add the value of a field to another field in cObj->data
                      cObjDataFieldWrapper =
                      cObjDataFieldWrapper {
                        cols            = tx_org_staff.cols
                        pi_flexform     = tx_org_staff.pi_flexform
                        uid             = tx_org_staff.uid
                      }
                    }
                    field = tx_org_staff.vita
                    stdWrap {
                        // With a prefix comment there won't be any output!
                      prefixComment >
                    }
                  }
                }
              }
              1 {
                10 >
                10 < plugin.tx_browser_pi1.views.single.102.tx_org_staff.title.20.0.10
              }
              2 {
                10 >
                10 < plugin.tx_browser_pi1.views.single.102.tx_org_staff.title.20.0.10
              }
              8 {
                10 >
                10 < plugin.tx_browser_pi1.views.single.102.tx_org_staff.title.20.0.10
              }
              9 {
                10 >
                10 < plugin.tx_browser_pi1.views.single.102.tx_org_staff.title.20.0.10
              }
              10 {
                10 >
                10 < plugin.tx_browser_pi1.views.single.102.tx_org_staff.title.20.0.10
              }
              17 {
                10 >
                10 < plugin.tx_browser_pi1.views.single.102.tx_org_staff.title.20.0.10
              }
              18 {
                10 >
                10 < plugin.tx_browser_pi1.views.single.102.tx_org_staff.title.20.0.10
              }
              25 {
                10 >
                10 < plugin.tx_browser_pi1.views.single.102.tx_org_staff.title.20.0.10
              }
              26 {
                10 >
                10 < plugin.tx_browser_pi1.views.single.102.tx_org_staff.title.20.0.10
              }
            }
          }
        }
      }
    }
  }
}