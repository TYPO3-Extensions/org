plugin.tx_browser_pi1 {
  views {
    single {
      101 {
        tx_org_staff {
          tx_org_cal {
          }
            // placeholder for tx_org_cal
          tx_org_cal = COA
          tx_org_cal {
              // if is true tx_org_staff.uid
            if =
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
                        //selectFields = tx_org_staff.title
                        join = tx_org_mm_all ON tx_org_mm_all.uid_local = tx_org_cal.uid
                        where {
                          field = tx_org_staff.uid
                          noTrimWrap = |tx_org_mm_all.uid_foreign = | AND tx_org_mm_all.table_foreign = 'tx_org_staff' AND tx_org_mm_all.table_local = 'tx_org_cal' AND tx_org_cal.datetime > UNIX_TIMESTAMP()|
                        }
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
              // div box
            wrap = <ul class="vcard tx_org_cal">|</ul><!-- vcard -->
              // Marginal news box: header, items
              // header
            10 = TEXT
            10 {
              data = LLL:EXT:org/Resources/Private/Language/tx_org_cal.xml:tx_org_cal
              wrap = <li class="header">|</li>
            }
              // items: tx_org_staff.title croped and linked
            20 = CONTENT
            20 {
              table = tx_org_cal
              select {
                pidInList = {$plugin.org.sysfolder.calendar}
                //selectFields = tx_org_staff.title
                join = tx_org_mm_all ON tx_org_mm_all.uid_local = tx_org_cal.uid
                where {
                  field = tx_org_staff.uid
                  noTrimWrap = |tx_org_mm_all.uid_foreign = | AND tx_org_mm_all.table_foreign = 'tx_org_staff' AND tx_org_mm_all.table_local = 'tx_org_cal' AND tx_org_cal.datetime > UNIX_TIMESTAMP()|
                }
                orderBy = tx_org_cal.datetime ASC
                max = 3
              }
                // tx_org_staff.title croped and linked
              renderObj = CASE
              renderObj {
                key {
                  field = {$plugin.tx_browser_pi1.templates.listview.url.5.key}
                }
                  // link to detail view
                default = COA
                default {
                  10 = TEXT
                  10 {
                    field       = datetime
                    noTrimWrap  = ||: |
                    required    = 1
                    strftime    = %d. %b
                  }
                  20 = TEXT
                  20 {
                    field = marginal_title // teaser_title // title
                    crop = 24 | ... &raquo; | 1
                    stdWrap {
                      noTrimWrap = || &raquo;|
                    }
                  }
                  wrap = <li class="url circle">|</li>
                  stdWrap {
                    typolink < plugin.tx_browser_pi1.displayList.master_templates.tableFields.typolinks.5.default
                  }
                }
                  // no link
                notype < .default
                notype {
                  stdWrap {
                    typolink >
                  }
                }
                  // link to internal page
                page < .default
                page {
                  stdWrap {
                    typolink < plugin.tx_browser_pi1.displayList.master_templates.tableFields.typolinks.5.page
                  }
                }
                  // link to external url
                url < .page
                url {
                  stdWrap {
                    typolink < plugin.tx_browser_pi1.displayList.master_templates.tableFields.typolinks.5.url
                  }
                }
              }
            }
            30 < .20
            30 {
              select {
                begin = 3
                max >
              }
              renderObj {
                default {
                  wrap = <li class="url circle toggle" style="display:none;">|</li>
                }
                notype {
                  wrap = <li class="url circle toggle" style="display:none;">|</li>
                }
                page {
                  wrap = <li class="url circle toggle" style="display:none;">|</li>
                }
                url {
                  wrap = <li class="url circle toggle" style="display:none;">|</li>
                }
              }
            }
            40 = TEXT
            40 {
              value = <span class="tx_org_cal_toggle label" style="display:none;">More &raquo;</span>
              wrap  = <li class="url">|</li>
            }
          }
        }
      }
    }
  }
}