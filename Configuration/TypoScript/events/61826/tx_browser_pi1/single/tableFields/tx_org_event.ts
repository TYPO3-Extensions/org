plugin.tx_browser_pi1 {
  views {
    single {
      61826 {
          // 140706: empty statement: for proper comments only
        tx_org_event {
        }
          // title: image, header, bodytext, vita, groups
        tx_org_event =
        tx_org_event {
            // image, header, bodytext, vita, groups
          title = COA
          title {
              // socialmedia_bookmarks
            10 = TEXT
            10 {
              value = ###SOCIALMEDIA_BOOKMARKS###
              wrap = <div class="show-for-large-up socialbookmarks">|</div>
            }
              // image
            11 = COA
            11 {
              if {
                isTrue {
                  field = tx_org_event.image
                }
              }
              wrap = <div style="float:left;padding:0 1em 1em 0;">|</div>
              10 < plugin.tx_browser_pi1.displaySingle.master_templates.tableFields.image.0.notype
            }
              // header
            20 = TEXT
            20 {
              field = tx_org_event.title
              wrap = <h1>|</h1>
            }
              // bodytext
            30 = TEXT
            30 {
              field = tx_org_event.bodytext
              stdWrap {
                parseFunc < lib.parseFunc_RTE
              }
            }
              // tx_org_eventcat.title
            90 = COA
            90 {
                // Marginal news box: header, items
              10 = COA
              10 {
                  // header
                10 = TEXT
                10 {
                  value = Groups
                  lang {
                    de = Gruppen
                    en = Groups
                  }
                  noTrimWrap = |<span class="header">|:</span> |
                }
                  // items: tx_org_eventcat.title croped and linked
                20 = CONTENT
                20 {
                  table = tx_org_eventcat
                  select {
                    pidInList = {$plugin.org.sysfolder.headquarters}
                    //selectFields = tx_org_eventcat.title
                    join = tx_org_mm_all ON tx_org_mm_all.uid_foreign = tx_org_eventcat.uid
                    where {
                      field = tx_org_event.uid
                      noTrimWrap = |tx_org_mm_all.uid_local = | AND tx_org_mm_all.table_local = 'tx_org_event' AND tx_org_mm_all.table_foreign = 'tx_org_eventcat'|
                    }
                    orderBy = tx_org_eventcat.title
                    max = 3
                  }
                    // tx_org_eventcat.title
                  renderObj = TEXT
                  renderObj {
                    field = title
                    wrap = |###POINT###
                  }
                  stdWrap {
                    split {
                      token = ###POINT###
                      cObjNum = 1 |*| 1 |*| 2 || 2
                      1.current = 1
                      1.noTrimWrap = ||, |
                      2.current = 1
                      2.noTrimWrap = |||
                    }
                  }
                }
              }
                // if is true tx_org_eventcat.uid
              if =
              if {
                isTrue {
                  field = tx_org_eventcat.uid
                }
              }
                // div box
              wrap = <div class="show-for-large-up tx_org_eventcat">|</div>
            }
          }
        }
      }
    }
  }
}