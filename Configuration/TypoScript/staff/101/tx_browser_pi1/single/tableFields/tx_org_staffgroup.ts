plugin.tx_browser_pi1 {
  views {
    single {
      101 {
          // 140706: empty statement: for proper comments only
        tx_org_staff {
        }
          // tx_org_staff.deleted is used for tx_org_staffgroup.title
        tx_org_staff =
        tx_org_staff {
            // people marginal box: tx_org_staffgroup
          deleted = COA
          deleted {
              // if is true tx_org_staffgroup.uid
            if =
            if {
              isTrue {
                field = tx_org_staffgroup.uid
              }
            }
              // div box
            wrap = <ul class="vcard tx_org_staffgroup">|</ul><!-- vcard -->
              // Marginal news box: header, items
            10 = COA
            10 {
                // header
              10 = TEXT
              10 {
                data = LLL:EXT:org/locallang_db.xml:filter_phrase.staffgroup
                wrap = <li class="header">|</li>
              }
                // items: tx_org_staffgroup.title croped and linked
              20 = CONTENT
              20 {
                table = tx_org_staffgroup
                select {
                  pidInList = {$plugin.org.sysfolder.staff}
                  //selectFields = tx_org_staffgroup.title
                  join = tx_org_mm_all ON tx_org_mm_all.uid_foreign = tx_org_staffgroup.uid
                  where {
                    field = tx_org_staff.uid
                    noTrimWrap = |tx_org_mm_all.uid_local = | AND tx_org_mm_all.table_foreign = 'tx_org_staffgroup' AND tx_org_mm_all.table_local = 'tx_org_staff'|
                  }
                  orderBy = tx_org_staffgroup.title
                  max = 10
                }
                  // tx_org_staffgroup.title
                renderObj = TEXT
                renderObj {
                  field = title
                  wrap  = <li class="url circle">|</li>
                }
              }
            }
          }
        }
      }
    }
  }
}