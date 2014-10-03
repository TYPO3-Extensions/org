plugin.tx_browser_pi1 {
  views {
    single {
      301 {
        tx_org_news {
          crdate {
          }
            // tx_org_news.crdate: placeholder for tx_org_news
          crdate = COA
          crdate {
              // if is true tx_org_headquarters.uid
            if =
            if {
              isTrue {
                field = tx_org_headquarters.uid
              }
            }
              // div box
            wrap = <ul class="vcard tx_org_headquarters">|</ul><!-- vcard -->
              // Marginal news box: header, items
            10 = COA_INT
            10 {
                // header
              10 = TEXT
              10 {
                value = Companies
                lang {
                  de = Firmen
                  en = Companies
                }
                wrap = <li class="header">|</li>
              }
                // items: tx_org_headquarters.title croped and linked
              20 = CONTENT
              20 {
                table = tx_org_headquarters
                select {
                  pidInList = {$plugin.org.sysfolder.headquarter}
                  //selectFields = tx_org_headquarters.title
                  join = tx_org_mm_all ON tx_org_mm_all.uid_foreign = tx_org_headquarters.uid
                  where {
                    field = tx_org_news.uid
                    noTrimWrap = |tx_org_mm_all.uid_local = | AND tx_org_mm_all.table_local = 'tx_org_news' AND tx_org_mm_all.table_foreign = 'tx_org_headquarters'|
                  }
                  orderBy = RAND()
                  max = 3
                }
                  // tx_org_news.title croped and linked
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