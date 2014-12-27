plugin.tx_browser_pi1 {
  views {
    single {
      102 {
          // 140706: empty statement: for proper comments only
        tx_org_headquarters {
        }
          // uid: object for headquarters marginal box
        tx_org_headquarters =
        tx_org_headquarters {
            // column: image, header, title, steet, zip city, url
          uid = COA
          uid {
              // if is true tx_org_headquarters.uid
            if =
            if {
              isTrue {
                field = tx_org_headquarters.uid
              }
            }
              // div box
            wrap = <div class="columns"><ul class="vcard tx_org_headquarters">|</ul></div><!-- vcard -->
              // Marginal headquarters box: header, items
            10 = COA
            10 {
                // header
              10 = TEXT
              10 {
                value = Latest headquarters
                lang {
                  de = Neuste Nachrichten
                  en = Latest headquarters
                }
                wrap = <li class="header">|</li>
              }
                // items: tx_org_headquarters.title croped and linked
              20 = CONTENT
              20 {
                table = tx_org_headquarters
                select {
                  pidInList = {$plugin.org.sysfolder.headquarters}
                  //selectFields = tx_org_headquarters.title
                  join = tx_org_mm_all ON tx_org_mm_all.uid_local = tx_org_headquarters.uid
                  where {
                    field = tx_org_staff.uid
                    noTrimWrap = |tx_org_mm_all.uid_foreign = | AND tx_org_mm_all.table_foreign = 'tx_org_staff' AND tx_org_mm_all.table_local = 'tx_org_headquarters'|
                  }
                  orderBy = tx_org_headquarters.title
                  max = 3
                }
                  // tx_org_headquarters.title croped and linked
                renderObj = CASE
                renderObj {
                  key {
                    field = {$plugin.tx_browser_pi1.templates.listview.url.2.key}
                  }
                    // link to detail view
                  default = TEXT
                  default {
                    field = marginal_title // teaser_title // title
                    //crop = 24 | ... &raquo; | 1
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
                    crop    = 24 | ... | 1
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