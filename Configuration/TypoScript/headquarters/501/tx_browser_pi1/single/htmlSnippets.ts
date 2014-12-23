plugin.tx_browser_pi1 {
  views {
    single {
      501 {
        htmlSnippets =
        htmlSnippets {
          subparts {
            singleview = TEXT
            singleview {
              value (
                <!-- ###SINGLEVIEW### begin --><!-- ###SINGLEBODY### begin --><!-- ###SINGLEBODYROW### begin -->
                <!-- ###AREA_FOR_AJAX_LIST_01### begin -->
                <div class="margin columns small-12 medium-12 large-3">
                  ###TX_ORG_HEADQUARTERS.UID###<!-- tx_org_news -->
                  ###TX_ORG_HEADQUARTERS.CRDATE###<!-- tx_org_staff -->
                </div>
                <div class="main columns small-12 medium-12 large-9">
                  ###MAP###
                  ###RECORD_BROWSER###
                  ###TX_ORG_HEADQUARTERS.TITLE###
                  <!-- ###AREA_FOR_AJAX_LIST_01### end -->
                  <!-- ###BACKBUTTON### begin -->
                  <p class="backbutton">
                    ###MY_SINGLEVIEWBACKBUTTON###
                  </p>
                  <!-- ###BACKBUTTON### end -->
                  <!-- ###AREA_FOR_AJAX_LIST_02### begin -->
                </div>
                <!-- ###AREA_FOR_AJAX_LIST_02### end -->
                <!-- ###SINGLEBODYROW### end --><!-- ###SINGLEBODY### end --><!-- ###SINGLEVIEW### end -->
)
            }
          }
        }
      }
    }
  }
}