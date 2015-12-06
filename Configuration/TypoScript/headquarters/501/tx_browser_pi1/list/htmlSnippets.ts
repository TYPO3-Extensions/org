plugin.tx_browser_pi1 {
  views {
    list {
      501 {
        htmlSnippets =
        htmlSnippets {
          marker {
            filter = TEXT
            filter {
              value (
              <div class="filter">
                ###RADIALSEARCH###
                ###TX_ORG_HEADQUARTERS.TITLE###
                ###TX_ORG_HEADQUARTERSCAT.TITLE###
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
                      <div class="record###TX_ORG_HEADQUARTERS.CRDATE###">
                        ###TX_ORG_HEADQUARTERS.DELETED###
                        ###TX_ORG_HEADQUARTERS.TITLE###
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