plugin.tx_browser_pi1 {
  views {
    list {
      201 {
        htmlSnippets =
        htmlSnippets {
          marker {
            filter = TEXT
            filter {
              value (
              <div class="filter">
                ###RADIALSEARCH###
                ###TX_ORG_CAL.DATETIME###
                ###TX_ORG_CALTYPE.TITLE###
                ###TX_ORG_LOCATION.MAIL_CITY###
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
                  <div id="c###TT_CONTENT.UID###-listview-###MODE###" class="columns listview listview-content listview-###MODE### listview-content-###MODE###">
                    <div class="row" data-equalizer>
                      <!-- ###LISTBODY### begin --><!-- ###LISTBODYITEM### begin -->
                      <div class="record###TX_ORG_CAL.CRDATE###">
                        ###TX_ORG_CAL.DELETED###
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