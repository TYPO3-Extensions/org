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
                  <div id="c###TT_CONTENT.UID###-listview-###MODE###" class="columns listview listview-content listview-###MODE### listview-content-###MODE###">
                    <div class="row" data-equalizer>
                      <!-- ###LISTBODY### begin --><!-- ###LISTBODYITEM### begin -->
                      ###TX_ORG_STAFF.TITLE###
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