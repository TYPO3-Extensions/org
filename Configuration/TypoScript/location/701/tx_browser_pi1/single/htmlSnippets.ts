plugin.tx_browser_pi1 {
  views {
    single {
      701 {
        htmlSnippets =
        htmlSnippets {
          subparts {
            singleview = TEXT
            singleview {
              value (
                <!-- ###SINGLEVIEW### begin --><!-- ###SINGLEBODY### begin --><!-- ###SINGLEBODYROW### begin -->
                <!-- ###AREA_FOR_AJAX_LIST_01### begin -->
                <div class="margin columns medium-3 large-3">
                  ###TX_ORG_LOCATION.CONTACT_EMAIL###
                  ###TX_ORG_LOCATION.UID###<!-- tx_org_news -->
                  ###TX_ORG_LOCATION.CRDATE###<!-- tx_org_staff -->
                </div>
                <div class="main columns medium-9 large-9">
                  ###MAP###
                  ###RECORD_BROWSER###
                  ###TX_ORG_LOCATION.TITLE###
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