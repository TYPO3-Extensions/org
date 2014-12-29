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
                    // bodytext
                  30 = TEXT
                  30 {
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
                        value = Groups
                        lang {
                          de = Gruppen
                          en = Groups
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