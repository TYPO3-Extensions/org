plugin.tx_browser_pi1 {
  views {
    single {
      101 {
          // 140706: empty statement: for proper comments only
        tx_org_staff {
        }
          // title, marginal box: contact
        tx_org_staff =
        tx_org_staff {
            // title: image, header, bodytext, vita
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
                    wrap = <div class="###CSSVISLARGETO###socialbookmarks">|</div>
                  }
                    // header
                  20 = COA
                  20 {
                    10 = COA
                    10 {
                      if {
                        isTrue {
                          field = tx_org_staff.name_first // tx_org_staff.name_last
                        }
                      }
                      10 = TEXT
                      10 {
                        field       = tx_org_staff.prefix
                        required    = 1
                        noTrimWrap  = || |
                      }
                      20 = TEXT
                      20 {
                        field       = tx_org_staff.name_first
                        required    = 1
                        noTrimWrap  = || |
                      }
                      30 = TEXT
                      30 {
                        field       = tx_org_staff.name_last
                      }
                    }
                    20 = COA
                    20 {
                      if {
                        isTrue {
                          field = tx_org_staff.name_first // tx_org_staff.name_last
                        }
                        negate = 1
                      }
                      10 = TEXT
                      10 {
                        field = tx_org_staff.title
                      }
                    }
                    wrap = <h1>|</h1>
                  }
                    // bodytext
                  30 = TEXT
                  30 {
                    field = tx_org_staff.bodytext
                    stdWrap {
                      parseFunc < lib.parseFunc_RTE
                    }
                  }
                    // vita
                  40 < tt_content.table.20
                  40 {
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
                20 >
                30 >
              }
              1 {
                10 >
                10 < plugin.tx_browser_pi1.views.single.101.tx_org_staff.title.20.0.10
                20 >
                30 >
              }
              2 {
                10 >
                10 < plugin.tx_browser_pi1.views.single.101.tx_org_staff.title.20.0.10
                20 >
                30 >
              }
              8 {
                10 >
                10 < plugin.tx_browser_pi1.views.single.101.tx_org_staff.title.20.0.10
                20 >
                30 >
              }
              9 {
                10 >
                10 < plugin.tx_browser_pi1.views.single.101.tx_org_staff.title.20.0.10
                20 >
                30 >
              }
              10 {
                10 >
                10 < plugin.tx_browser_pi1.views.single.101.tx_org_staff.title.20.0.10
                20 >
                30 >
              }
              17 {
                10 >
                10 < plugin.tx_browser_pi1.views.single.101.tx_org_staff.title.20.0.10
                20 >
                30 >
              }
              18 {
                10 >
                10 < plugin.tx_browser_pi1.views.single.101.tx_org_staff.title.20.0.10
                20 >
                30 >
              }
              25 {
                10 >
                10 < plugin.tx_browser_pi1.views.single.101.tx_org_staff.title.20.0.10
                20 >
                30 >
              }
              26 {
                10 >
                10 < plugin.tx_browser_pi1.views.single.101.tx_org_staff.title.20.0.10
                20 >
                30 >
              }
            }
          }
            // people marginal box: contact
          contact_email = COA
          contact_email {
            if {
              isTrue {
                field = tx_org_staff.uid
              }
            }
              // vcard: header, name, contact_email, contact_phone, contact_fax, contact_skype, contact_url, vCard for Download
            10 = COA
            10 {
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
                  // name (linked)
                20 = CASE
                20 {
                  key {
                    field = {$plugin.tx_browser_pi1.templates.listview.url.2.key}
                  }
                  default = TEXT
                  default {
                    field = tx_org_staff.title
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
                      field = tx_org_staff.contact_email
                    }
                  }
                  typolink {
                    XXXparameter {
                      field = tx_org_staff.contact_email
                    }
                    parameter {
                      cObject = COA
                      cObject {
                        // url
                        10 = TEXT
                        10 {
                          field = tx_org_staff.contact_email
                        }
                          // target
                        20 = TEXT
                        20 {
                          value       = -
                          noTrimWrap  = | "|"|
                        }
                          // class
                        30 = TEXT
                        30 {
                          value       = email
                          noTrimWrap  = | "|"|
                        }
                          // title
                        40 = COA
                        40 {
                          10 = TEXT
                          10 {
                            value = e-mail of
                            lang {
                              de = E-Mail f&uuml;r
                              en = e-mail of
                            }
                            noTrimWrap = || |
                          }
                          20 = TEXT
                          20 {
                            field = {$plugin.tx_browser_pi1.templates.listview.header.0.field}
                          }
                          stdWrap {
                            stripHtml         = 1
                            htmlSpecialChars  = 0
                            crop              = {$plugin.tx_browser_pi1.templates.listview.header.0.title.crop}
                            noTrimWrap  = | "|"|
                          }
                        }
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
                  // vCard for Download
                80 = COA
                80 {
                  10 = COA
                  10 {
                    10 = TEXT
                    10 {
                      prepend = TEXT
                      prepend {
                        value       = <i class="fi-address-book"></i>
                        noTrimWrap  = || |
                      }
                      value = vCard
                      lang {
                        de = Visitenkarte
                        en = vCard
                      }
                    }
                    stdWrap {
                      typolink {
                        parameter {
                          cObject = COA
                          cObject {
                            // url
                            10 = TEXT
                            10 {
                              value = {$plugin.org.pages.vCard}
                            }
                              // target
                            20 = TEXT
                            20 {
                              value       = -
                              noTrimWrap  = | "|"|
                            }
                              // class
                            30 = TEXT
                            30 {
                              value       = download
                              noTrimWrap  = | "|"|
                            }
                              // title
                            40 = COA
                            40 {
                              10 = TEXT
                              10 {
                                value = vCard for
                                lang {
                                  de = vCard von
                                  en = vCard for
                                }
                                noTrimWrap = || |
                              }
                              20 = TEXT
                              20 {
                                field = {$plugin.tx_browser_pi1.templates.listview.header.0.field}
                              }
                              stdWrap {
                                stripHtml         = 1
                                htmlSpecialChars  = 1
                                crop              = {$plugin.tx_browser_pi1.templates.listview.header.0.title.crop}
                                noTrimWrap  = | "|"|
                              }
                            }
                          }
                        }
                        additionalParams {
                          wrap  = &tx_browser_pi1[{$plugin.tx_browser_pi1.navigation.showUid}]=|&type={$plugin.tx_browser_pi1.typeNum.vCardPageObj}
                          field = {$plugin.tx_browser_pi1.templates.listview.url.0.record}
                        }
                      }
                    }
                  }
                  wrap = <li class="contact_vCard">|</li>
                }
              }
            }
          }
        }
      }
    }
  }
}