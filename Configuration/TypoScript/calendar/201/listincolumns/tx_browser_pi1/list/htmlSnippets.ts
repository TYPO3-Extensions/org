plugin.tx_browser_pi1 {
  views {
    list {
      201 {
        htmlSnippets =
        htmlSnippets {
          XXXmarker {
            filter = TEXT
            filter {
              value (
              <div class="filter">
                ###RADIALSEARCH###
                ###TX_ORG_CAL.DATETIME###
                ###TX_ORG_CALTYPE.TITLE###
                ###TX_ORG_LOCATION.TITLE###
                ###TX_ORG_STAFF.TITLE###
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
                    <div class="row" data-equalizer>
                      <!-- ###LISTBODY### begin --><!-- ###LISTBODYITEM### begin -->
                      <div class="record###TX_ORG_CAL.CRDATE###">
                        ###TX_ORG_CAL.TITLE###
                      </div>
                      <!-- ###LISTBODYITEM### end --><!-- ###LISTBODY### end -->
                    </div><!-- /row -->
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