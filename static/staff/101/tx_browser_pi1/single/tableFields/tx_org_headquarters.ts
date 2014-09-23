plugin.tx_browser_pi1 {
  views {
    single {
      101 {
          // 140706: empty statement: for proper comments only
        tx_org_headquarters {
        }
          // uid: object for headquarters marginal box
        tx_org_headquarters =
        tx_org_headquarters {
            // headquarters marginal box: header, content
          uid = COA
          uid {
            if {
              isTrue {
                field = tx_org_headquarters.uid
              }
            }
              // column: vcard
            10 = COA
            10 {
                // column: image, header, title, steet, zip city, url
              10 = COA
              10 {
                wrap = <ul class="vcard tx_org_headquarters">|</ul><!-- vcard -->
                  // image
                10 = COA
                10 {
                    // image
                  10 < plugin.tx_browser_pi1.displayList.master_templates.tableFields.image.2
                  wrap = <li class="show-for-large-up image">|</li>
                }
                  // image, header
                11 = COA
                11 {
                  wrap = <li class="header">|</li>
                    // image
                  10 = COA
                  10 {
                      // image
                    10 < plugin.tx_browser_pi1.displayList.master_templates.tableFields.image.2
                    wrap = <div class="show-for-large-up image" style="float:right;">|</div>
                  }
                  10 >
                    // title, if title (name)
                  20 = TEXT
                  20 {
                    value = Company
                    lang {
                      de = Firma
                      en = Company
                    }
                  }
                }
                  // title
                20 = TEXT
                20 {
                  field = tx_org_headquarters.title
                  wrap = <li class="fn">|</li>
                  required = 1
                }
                20 >
                20 = CASE
                20 {
                  key {
                    field = {$plugin.tx_browser_pi1.templates.listview.url.2.key}
                  }
                  default = TEXT
                  default {
                    field = tx_org_headquarters.title
                    wrap  = <li class="fn">|</li>
                    required = 1
                    stdWrap {
                      noTrimWrap = || &raquo;|
                    }
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
                30 = TEXT
                30 {
                  field = tx_org_headquarters.mail_street
                  wrap = <li class="street-address">|</li>
                  required = 1
                }
                  // zip city
                31 = COA
                31 {
                  if {
                    isTrue {
                      field = tx_org_headquarters.mail_city
                    }
                  }
                  wrap = <li class="locality">|</li>
                  10 = TEXT
                  10 {
                    field = tx_org_headquarters.mail_postcode
                    noTrimWrap = |<span class="zip">|</span> |
                    required = 1
                  }
                  20 = TEXT
                  20 {
                    field = tx_org_headquarters.mail_city
                    wrap = <span class="locality">|</span>
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
}