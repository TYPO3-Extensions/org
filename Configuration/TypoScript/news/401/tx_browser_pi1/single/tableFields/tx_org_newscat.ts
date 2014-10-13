plugin.tx_browser_pi1 {
  views {
    single {
      401 {
        tx_org_news {
          deleted {
          }
            // tx_org_news.crdate: placeholder for tx_org_news
          deleted = COA
          deleted {
              // if is true tx_org_newscat.uid
            if =
            if {
              isTrue {
                field = tx_org_newscat.uid
              }
            }
              // div box
            wrap = <ul class="vcard tx_org_newscat">|</ul><!-- vcard -->
              // Marginal news box: header, items
            10 = COA
            10 {
                // header
              10 = TEXT
              10 {
                value = News categories
                lang {
                  de = Nachrichten Kategorien
                  en = News categories
                }
                wrap = <li class="header">|</li>
              }
                // items: tx_org_headquarters.title croped and linked
              20 = CONTENT
              20 {
                table = tx_org_newscat
                select {
                  pidInList = {$plugin.org.sysfolder.news}
                  //selectFields = tx_org_newscat.title
                  join = tx_org_mm_all ON tx_org_mm_all.uid_foreign = tx_org_newscat.uid
                  where {
                    field = tx_org_news.uid
                    noTrimWrap = |tx_org_mm_all.uid_local = | AND tx_org_mm_all.table_local = 'tx_org_news' AND tx_org_mm_all.table_foreign = 'tx_org_newscat'|
                  }
                  orderBy = tx_org_newscat.title
                }
                  // tx_org_news.title croped and linked
                renderObj = TEXT
                renderObj {
                  field = title
                  crop = 25 | ... | 1
                  noTrimWrap = |<li class="url circle">|</li>|
                }
              }
            }
          }
        }
      }
    }
  }
}