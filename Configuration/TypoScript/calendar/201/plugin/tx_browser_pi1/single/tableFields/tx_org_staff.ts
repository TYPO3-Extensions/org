plugin.tx_browser_pi1 {
  views {
    single {
      201 {
        tx_org_cal {
          tx_org_staff {
          }
            // tx_org_cal.tx_org_staff: placeholder for tx_org_staff
          tx_org_staff = COA
          tx_org_staff {
            if {
              isTrue {
                field = tx_org_cal.tx_org_staff
              }
            }
            wrap = <ul class="vcard tx_org_cal tx_org_staff">|</ul><!-- vcard -->
              // header
            10 = TEXT
            10 {
              data = LLL:EXT:org/Resources/Private/Language/tx_org_staff.xml:tx_org_staff
              wrap = <li class="header">|</li>
            }
              // tx_org_staff
            20 = COA
            20 {
              10 = CONTENT
              10 {
                table = tx_org_staff
                select {
                  pidInList = {$plugin.org.sysfolder.staff}
                  join = tx_org_mm_all ON tx_org_mm_all.uid_foreign = tx_org_staff.uid
                  where {
                    field = tx_org_cal.uid
                    noTrimWrap = |tx_org_mm_all.uid_local = | AND tx_org_mm_all.table_local = 'tx_org_cal' AND tx_org_mm_all.table_foreign = 'tx_org_staff'|
                  }
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
                    wrap = <li class="url circle">|</li>
                    stdWrap {
                      noTrimWrap = || &raquo;|
                    }
                    typolink < plugin.tx_browser_pi1.displayList.master_templates.tableFields.typolinks.1.default
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
                    typolink < plugin.tx_browser_pi1.displayList.master_templates.tableFields.typolinks.1.page
                  }
                    // link to external url
                  url < .page
                  url {
                    typolink < plugin.tx_browser_pi1.displayList.master_templates.tableFields.typolinks.1.url
                  }
                }
              }
              wrap = <li class="tx_org_staff">|</li>
            }
          }
        }
      }
    }
  }
}