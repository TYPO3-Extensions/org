plugin.tx_browser_pi1 {
  views {
    list {
      101 {
        tx_org_staff {
            // image, bookmarks; name, bodytext || vita
          title = COA
          title {
              // image, bookmarks
            10 = COA
            10 {
                // image
              10 = COA
              10 {
                10 < plugin.tx_browser_pi1.displayList.master_templates.tableFields.image.0
                wrap = <div>|</div>
              }
                // socialmedia_bookmarks
              20 = TEXT
              20 {
                value = ###SOCIALMEDIA_BOOKMARKS###
                wrap = <div>|</div>
              }
              wrap = <div class="show-for-large-up columns small-12 medium-12 large-2">|</div>
            }
              // name, bodytext || vita
            20 = COA
            20 {
                // name
              //10 < plugin.tx_browser_pi1.displayList.master_templates.tableFields.header.0
              10 = COA
              10 {
                wrap = <div class="tx_org_staff_name">|</div>
                  // name_first, name_last
                  // title (linked)
                10 = CASE
                10 {
                  key {
                    field = {$plugin.tx_browser_pi1.templates.listview.url.0.key}
                  }
                  default = COA
                  default {
                    10 = TEXT
                    10 {
                      field = tx_org_staff.name_last
                      noTrimWrap = ||, |
                      required = 1
                    }
                    20 = TEXT
                    20 {
                      field = tx_org_staff.name_first
                    }
                    stdWrap {
                      typolink < plugin.tx_browser_pi1.displayList.master_templates.tableFields.typolinks.0.default
                    }
                  }
                  notype = TEXT
                  notype {
                    stdWrap >
                  }
                  page < .default
                  page {
                    stdWrap {
                      typolink < plugin.tx_browser_pi1.displayList.master_templates.tableFields.typolinks.0.page
                    }
                  }
                  url < .page
                  url {
                    stdWrap {
                      typolink < plugin.tx_browser_pi1.displayList.master_templates.tableFields.typolinks.0.url
                    }
                  }
                }
              }

                // bodytext || vita
              20 < plugin.tx_browser_pi1.displayList.master_templates.tableFields.text.0
                // for debugging only
              30 = TEXT
              30 {
                field = tx_org_staffgroup.uid
                noTrimWrap = |<div>staffgroup: |</div> |
              }
              30 >
                // tx_org_staffgroup
              31 = COA
              31 {
                  // if is true tx_org_staffgroup.uid
                if =
                if {
                  isTrue {
                    field = tx_org_staffgroup.uid
                  }
                }
                  // div box
                wrap = <div class="tx_org_staffgroup">|</div>
                20 = CONTENT
                20 {
                  table = tx_org_staffgroup
                  select {
                    pidInList = {$plugin.org.sysfolder.staff}
                    //selectFields = tx_org_staffgroup.title
                    join = tx_org_mm_all ON tx_org_mm_all.uid_foreign = tx_org_staffgroup.uid
                    where {
                      field = tx_org_staff.uid
                      noTrimWrap = |tx_org_mm_all.uid_local = | AND tx_org_mm_all.table_local = 'tx_org_staff' AND tx_org_mm_all.table_foreign = 'tx_org_staffgroup'|
                    }
                    orderBy = tx_org_staffgroup.title
                  }
                    // tx_org_staff.title
                  renderObj = TEXT
                  renderObj {
                    field = title
                    //noTrimWrap = |<span class="item">|</span>|
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
              wrap = <div class="columns small-12 medium-12 large-10">|</div>
            }
            wrap = <div class="row">|</div>
          }
        }
      }
    }
  }
}