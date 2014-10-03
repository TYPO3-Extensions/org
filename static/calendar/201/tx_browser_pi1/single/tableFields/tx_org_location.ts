plugin.tx_browser_pi1 {
  views {
    single {
      201 {
          // 140706: empty statement: for proper comments only
        tx_org_cal {
        }
          // deleted (placeholder for tx_org_location
        tx_org_cal =
        tx_org_cal {
            // location marginal box: header, content
          deleted = COA
          deleted {
            if {
              isTrue {
                field = tx_org_location.uid
              }
            }
              // vcard: header, name, contact_email, contact_phone, contact_fax, contact_skype, mail_url,
            10 = COA
            10 {
                // column: image, header, title, steet, zip city, url
              10 = COA
              10 {
                wrap = <ul class="vcard tx_org_location">|</ul><!-- vcard -->
                  // header
                10 = COA
                10 {
                  wrap = <li class="header">|</li>
                    // title, if title (name)
                  10 = TEXT
                  10 {
                    value = Location
                    lang {
                      de = Veranstaltungsort
                      en = Location
                    }
                  }
                }
                  // title (linked)
                20 = CASE
                20 {
                  key {
                    field = {$plugin.tx_browser_pi1.templates.listview.url.2.key}
                  }
                  default = TEXT
                  default {
                    field = tx_org_location.title
                    wrap = <li class="fn">|</li>|
                    stdWrap {
                      noTrimWrap = || &raquo;|
                    }
                    required = 1
                    typolink < plugin.tx_browser_pi1.displayList.master_templates.tableFields.typolinks.2.default
                  }
                  notype = TEXT
                  notype {
                    stdWrap >
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
                  // street
                40 = TEXT
                40 {
                  if {
                    isTrue {
                      field = tx_org_location.mail_street
                    }
                  }
                  field = tx_org_location.mail_street
                  wrap = <li class="street">|</li>
                }
                40 >
                  // city
                41 = COA
                41 {
                  if {
                    isTrue {
                      cObject = COA
                      cObject {
                          // mail_postcode
                        10 = TEXT
                        10 {
                          field = tx_org_location.mail_postcode
                        }
                          // mail_city
                        20 = TEXT
                        20 {
                          field = tx_org_location.mail_city
                        }
                      }
                    }
                  }
                    // mail_postcode
                  10 = TEXT
                  10 {
                    if {
                      isTrue {
                        field = tx_org_location.mail_postcode
                      }
                    }
                    field = tx_org_location.mail_postcode
                    noTrimWrap = || |
                  }
                  10 >
                    // mail_city
                  20 = TEXT
                  20 {
                    if {
                      isTrue {
                        field = tx_org_location.mail_city
                      }
                    }
                    field = tx_org_location.mail_city
                    noTrimWrap = || |
                  }
                  wrap = <li class="city">|</li>
                }
              }
            }
          }
        }
      }
    }
  }
}