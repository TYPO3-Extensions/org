plugin.tx_browser_pi1 {
  views {
    single {
      593611 {
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
            wrap = <div class="row tx_org_staff">|</div><!-- row tx_org_staff -->
              // column: vcard
            10 = COA
            10 {
              wrap = <div class="###CSSGRID######CSSGRIDLARGE###12">|</div><!--columns-->
                // column: image, header, name, department, phone, fax, e-mail, apply online, url
              10 = COA
              10 {
                wrap = <ul class="vcard">|</ul><!-- vcard -->
                  // image, header
                10 = COA
                10 {
                  wrap = <li class="header">|</li>
                  10 < plugin.tx_browser_pi1.displayList.master_templates.tableFields.image.1
                  10 {
                    wrap = <div class="image" style="float:right;">|</div>
                  }
                    // title, if title (name)
                  20 = TEXT
                  20 {
                    value = Contact data
                    lang {
                      de = Ansprechpartner
                      en = Contact data
                    }
                  }
                }
                  // name
                20 = COA
                20 {
                  wrap = <li class="fn">|</li>
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
                  // department
                30 = COA
                30 {
                  if {
                    isTrue {
                      field = tx_org_staff.department
                    }
                  }
                  wrap = <li class="department">|</li>
                    // label
                  10 = TEXT
                  10 {
                    noTrimWrap = || |
                    value = department
                    lang {
                      en = department
                      de = Abteilung
                    }
                    wrap = <span class="labeling">|</span>
                  }
                  10 >
                    // value
                  20 = TEXT
                  20 {
                    field = tx_org_staff.department
                    required = 1
                    wrap = <span class="value">|</span>
                  }
                }
                  // phone
                40 = COA
                40 {
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
                41 = COA
                41 {
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
                42 = TEXT
                42 {
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
                  // url
                50 = CASE
                50 {
                  key {
                    field = {$plugin.tx_browser_pi1.templates.listview.url.1.key}
                  }
                  default = TEXT
                  default {
                    value = details about the contact &raquo;
                    lang {
                      de = Mehr zum Ansprechpartner &raquo;
                      en = details about the contact &raquo;
                    }
                    noTrimWrap = | ||
                    typolink < plugin.tx_browser_pi1.displayList.master_templates.tableFields.typolinks.1.default
                    wrap = <li class="url">|</li>
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
                    value >
                    field = {$plugin.tx_browser_pi1.templates.listview.url.2.url}
                    typolink < plugin.tx_browser_pi1.displayList.master_templates.tableFields.typolinks.1.url
                  }
                }
                  // apply online
                60 = TEXT
                60 {
                  fieldRequired = tx_org_job.onlineapplication
                  value = Apply online
                  lang {
                    de = Online bewerben
                    en = Apply online
                  }
                  wrap = <li class="apply">|</li>
                  //wrap = <a class="button small expand">|</a>
                  typolink {
                    parameter {
                      cObject = COA
                      cObject {
                          // url
                        10 = TEXT
                        10 {
                          value = {$plugin.org.pages.jobApply}
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
                          value       = button small expand
                          noTrimWrap  = | "|"|
                        }
                          // title
                        40 = TEXT
                        40 {
                          value = Apply online
                          lang {
                            de = Online bewerben
                            en = Apply online
                          }
                          noTrimWrap  = | "|"|
                        }
                      }
                    }
                    additionalParams {
                      wrap  = &tx_browser_pi1[tx_org_job.uid]=|
                      field = tx_org_job.uid
                    }
                    useCacheHash = 1
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