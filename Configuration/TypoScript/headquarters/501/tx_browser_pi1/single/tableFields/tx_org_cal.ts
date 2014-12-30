plugin.tx_browser_pi1 {
  views {
    single {
      501 {
        tx_org_headquarters {
          tx_org_cal {
          }
            // tx_org_headquarters.tx_org_cal: placeholder for tx_org_cal
          tx_org_cal = COA
          tx_org_cal {
            if {
              isTrue {
                stdWrap {
                  cObject = COA
                  cObject {
                    10 = CONTENT
                    10 {
                      table = tx_org_cal
                      select {
                        pidInList = {$plugin.org.sysfolder.calendar}
                        join = tx_org_mm_all ON tx_org_mm_all.uid_foreign = tx_org_cal.uid
                        where {
                          field = tx_org_headquarters.uid
                          noTrimWrap = |tx_org_mm_all.uid_local = | AND tx_org_mm_all.table_local = 'tx_org_headquarters' AND tx_org_mm_all.table_foreign = 'tx_org_cal'|
                        }
                        andWhere = tx_org_cal.datetime > UNIX_TIMESTAMP()
                        orderBy = tx_org_cal.datetime ASC
                        max = 1
                      }
                        // tx_org_cal.title croped and linked
                      renderObj = TEXT
                      renderObj {
                        field = title
                      }
                    }
                  }
                }
              }
            }
            wrap = <ul class="vcard tx_org_headquarters tx_org_cal">|</ul><!-- vcard -->
              // header
            10 = TEXT
            10 {
              value = Events
              lang {
                de = Veranstaltungen
                en = Events
              }
              wrap = <li class="header">|</li>
            }
              // tx_org_headquarters.uid
            XXX19 = TEXT
            XXX19 {
              field = tx_org_headquarters.uid
              wrap = <li class="tx_org_cal">|</li>
            }
            20 = COA
            20 {
              10 = CONTENT
              10 {
                table = tx_org_cal
                select {
                  pidInList = {$plugin.org.sysfolder.calendar}
                  join = tx_org_mm_all ON tx_org_mm_all.uid_foreign = tx_org_cal.uid
                  where {
                    field = tx_org_headquarters.uid
                    noTrimWrap = |tx_org_mm_all.uid_local = | AND tx_org_mm_all.table_local = 'tx_org_headquarters' AND tx_org_mm_all.table_foreign = 'tx_org_cal'|
                  }
                  andWhere = tx_org_cal.datetime > UNIX_TIMESTAMP()
                  orderBy = tx_org_cal.datetime ASC
                  max = 3
                }
                  // tx_org_cal.title croped and linked
                renderObj = CASE
                renderObj {
                  key {
                    field = {$plugin.tx_browser_pi1.templates.listview.url.5.key}
                  }
                    // link to detail view
                  default = TEXT
                  default {
                    field = title
                    wrap = <li class="url circle">|</li>
                    stdWrap {
                      noTrimWrap = || &raquo;|
                    }
                    typolink < plugin.tx_browser_pi1.displayList.master_templates.tableFields.typolinks.5.default
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
                    typolink < plugin.tx_browser_pi1.displayList.master_templates.tableFields.typolinks.5.page
                  }
                    // link to external url
                  url < .page
                  url {
                    typolink < plugin.tx_browser_pi1.displayList.master_templates.tableFields.typolinks.5.url
                  }
                }
              }
              wrap = <li class="tx_org_cal">|</li>
            }
          }
        }
      }
    }
  }
}