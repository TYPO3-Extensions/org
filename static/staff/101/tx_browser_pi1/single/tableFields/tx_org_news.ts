plugin.tx_browser_pi1 {
  views {
    single {
      101 {
        tx_org_staff {
          crdate {
          }
            // tx_org_staff.crdate: placeholder for tx_org_news
          crdate = COA
          crdate {
              // if is true tx_org_news.uid
            if =
            if {
              isTrue {
                field = tx_org_news.uid
              }
            }
              // div box
            wrap = <ul class="vcard tx_org_news">|</ul><!-- vcard -->
              // Marginal news box: header, items
            10 = COA
            10 {
                // header
              10 = TEXT
              10 {
                value = Latest news
                lang {
                  de = Neuste Nachrichten
                  en = Latest news
                }
                wrap = <li class="header">|</li>
              }
                // items: tx_org_news.title croped and linked
              20 = CONTENT
              20 {
                table = tx_org_news
                select {
                  pidInList = {$plugin.org.sysfolder.news}
                  //selectFields = tx_org_news.title
                  join = tx_org_mm_all ON tx_org_mm_all.uid_local = tx_org_news.uid
                  where {
                    field = tx_org_staff.uid
                    noTrimWrap = |tx_org_mm_all.uid_foreign = | AND tx_org_mm_all.table_foreign = 'tx_org_staff' AND tx_org_mm_all.table_local = 'tx_org_news'|
                  }
                  orderBy = tx_org_news.datetime DESC
                  max = 3
                }
                  // tx_org_news.title croped and linked
                renderObj = CASE
                renderObj {
                  key {
                    field = {$plugin.tx_browser_pi1.templates.listview.url.1.key}
                  }
                    // link to detail view
                  default = TEXT
                  default {
                    field = marginal_title // teaser_title // title
                    crop = 24 | ... &raquo; | 1
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
                    crop    = 24 | ... | 1
                    stdWrap >
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
            }
          }
        }
      }
    }
  }
}