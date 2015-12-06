plugin.tx_browser_pi1 {
  views {
    list {
      101 {
        htmlSnippets =
        htmlSnippets {
          marker {
            filter = TEXT
            filter {
              value (
              <div class="filter">
                ###TX_ORG_STAFFGROUP.TITLE###
              </div>
)
            }
          }
          subparts {
            listview = TEXT
            listview {
              value (
                <div class="row">
                  <div id="c###TT_CONTENT.UID###-listview-###MODE###" class="###CSSGRID###listview listview-content listview-###MODE### listview-content-###MODE###">
                    <!-- ###LISTBODY### begin --><!-- ###LISTBODYITEM### begin -->
                    <div class="row">
                      <div class="tx_org_staff tx_org_staff-record record">
                        ###TX_ORG_STAFF.TITLE###
                      </div>
                    </div><!-- /row --><!-- ###LISTBODYITEM### end --><!-- ###LISTBODY### end -->
                  </div><!-- /columns --><!-- /listview -->
                </div><!-- /row -->
)
            }
          }
        }
      }
    }
  }
}