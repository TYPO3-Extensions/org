plugin.tx_browser_pi1 {
  views {
    list {
      401 {
        htmlSnippets =
        htmlSnippets {
          marker {
            filter = TEXT
            filter {
              value (
                <div class="filter">
                  ###TX_ORG_NEWSCAT.TITLE###
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
                    <!-- ###LISTBODY### begin --><!-- ###LISTBODYITEM### begin -->
                    <div class="tx_org_news tx_org_news-record record">
                      ###TX_ORG_NEWS.TITLE###
                    </div><!-- ###LISTBODYITEM### end --><!-- ###LISTBODY### end -->
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