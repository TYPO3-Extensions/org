plugin.tx_browser_pi1 {
  views {
    single {
      201 {
        tx_org_cal {
          tx_org_headquarters {
          }
            // tx_org_cal.tx_org_headquarters: placeholder for tx_org_headquarters
          tx_org_headquarters = COA
          tx_org_headquarters {
            if {
              isTrue {
                field = tx_org_cal.tx_org_headquarters
              }
            }
            wrap = <ul class="vcard tx_org_cal tx_org_headquarters">|</ul><!-- vcard -->
              // header
            10 = TEXT
            10 {
              value = Organiser
              lang {
                de = Veranstalter
                en = Organiser
              }
              wrap = <li class="header">|</li>
            }
              // tx_org_headquarters
            20 = COA
            20 {
              10 = CONTENT
              10 {
                table = tx_org_headquarters
                select {
                  pidInList = {$plugin.org.sysfolder.headquarters}
                  join = tx_org_mm_all ON tx_org_mm_all.uid_local = tx_org_headquarters.uid
                  where {
                    field = tx_org_cal.uid
                    noTrimWrap = |tx_org_mm_all.uid_foreign = | AND tx_org_mm_all.table_local = 'tx_org_headquarters' AND tx_org_mm_all.table_foreign = 'tx_org_cal'|
                  }
                }
                  // tx_org_cal.title croped and linked
                renderObj = CASE
                renderObj {
                  key {
                    field = {$plugin.tx_browser_pi1.templates.listview.url.2.key}
                  }
                    // link to detail view
                  default = TEXT
                  default {
                    field = title
                    wrap = <li class="url circle">|</li>
                    stdWrap {
                      noTrimWrap = || &raquo;|
                    }
                    typolink < plugin.tx_browser_pi1.displayList.master_templates.tableFields.typolinks.2.default
                  }
                    // no link
                  notype = TEXT
                  notype {
                    field   = title
                    wrap = <li class="url circle">|</li>
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
              wrap = <li class="tx_org_headquarters">|</li>
            }
          }
        }
      }
    }
  }
}