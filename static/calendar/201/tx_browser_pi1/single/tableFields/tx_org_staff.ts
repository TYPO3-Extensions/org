plugin.tx_browser_pi1 {
  views {
    single {
      201 {
        tx_org_headquarters {
          crdate {
          }
            // tx_org_headquarters.crdate: placeholder for tx_org_staff
          crdate = COA
          crdate {
              // if is true tx_org_staff.uid
            if =
            if {
              isTrue {
                field = tx_org_staff.uid
              }
            }
              // div box
            wrap = <ul class="vcard tx_org_staff">|</ul><!-- vcard -->
              // Marginal staff box: header, items
            X10 = TEXT
            X10 {
              data = LLL:EXT:org/locallang_db.xml:filter_phrase.staff
              wrap = <li class="header">|</li>
            }
            10 = COA_INT
            10 {
                // header
              10 = TEXT
              10 {
                data = LLL:EXT:org/locallang_db.xml:filter_phrase.staff
                wrap = <li class="header">|</li>
              }
                // items: tx_org_staff.title croped and linked
              20 = CONTENT
              20 {
                table = tx_org_staff
                select {
                  pidInList = {$plugin.org.sysfolder.staff}
                  //selectFields = tx_org_staff.title
                  join = tx_org_mm_all ON tx_org_mm_all.uid_foreign = tx_org_staff.uid
                  where {
                    field = tx_org_headquarters.uid
                    noTrimWrap = |tx_org_mm_all.uid_local = | AND tx_org_mm_all.table_local = 'tx_org_headquarters' AND tx_org_mm_all.table_foreign = 'tx_org_staff'|
                  }
                  orderBy = RAND()
                  max = 3
                }
                  // tx_org_staff.title croped and linked
                renderObj = CASE
                renderObj {
                  key {
                    field = {$plugin.tx_browser_pi1.templates.listview.url.2.key}
                  }
                    // link to detail view
                  default = TEXT
                  default {
                    field = title
                    crop = 25 | ... &raquo; | 1
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
                    crop    = 25 | ... | 1
                    stdWrap >
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
            }
          }
        }
      }
    }
  }
}