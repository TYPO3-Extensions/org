plugin.tx_browser_pi1 {
  views {
    list {
      101 {
        tx_org_staff {
          title >
            // title
          title = COA
          title {
            wrap = <div class="###CSSGRID######CSSGRIDMEDIUM###3">|</div>
              // image
            10 < plugin.tx_browser_pi1.displayList.master_templates.tableFields.image.0.default
            10 {
              imageLinkWrap {
                typolink {
                  parameter {
                    cObject {
                      30 {
                        value = linktosingle circle
                      }
                    }
                  }
                }
              }
              wrap = <div style="padding-bottom:1em;">|</div>
            }
            20 = COA
            20 {
              stdWrap {
                wrap = <ul class="pricing-table" data-equalizer-watch>|</ul>
              }
                // teaser_title
              10 < plugin.tx_browser_pi1.displayList.master_templates.tableFields.header.0.default
              10 {
                typolink.parameter.cObject.30.value = linktosingle button expand
                wrap  = <li class="title">|</li>
              }
                // category
              20 = COA
              20 {
                if =
                if {
                  isTrue {
                    field = tx_org_staffgroup.uid
                  }
                }
                  // tx_org_staffgroup
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
                wrap = <li class="bullet-item">|</li>
              }
              30 = TEXT
              30 {
                field     = tx_org_staff.marginal_subtitle
                required  = 1
                wrap      = <li class="bullet-item">|</li>
              }
                // teaser_short
              40 < plugin.tx_browser_pi1.displayList.master_templates.tableFields.text.0.default
              40 {
                wrap  = <li class="description">|</li>
              }
            }
          }
        }
      }
    }
  }
}