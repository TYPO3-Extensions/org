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
                <div class="main columns">
                  ###MAP###
                  ###RECORD_BROWSER###
                  <div class="row">
                    ###TX_ORG_HEADQUARTERS.TITLE###
                  </div>
                  ###TX_ORG_HEADQUARTERS.TX_ORG_CAL###<!-- tx_org_cal -->
                  ###TX_ORG_HEADQUARTERS.UID###<!-- tx_org_news -->
                  ###TX_ORG_HEADQUARTERS.CRDATE###<!-- tx_org_staff -->
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