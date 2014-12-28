plugin.tx_browser_pi1 {
  views {
    list {
      201 = +Org: Calendar (one column)
      201 {
        name    = +Org: Calendar (one column)
      }
    }
    single {
      201 = +Org: Calendar (one column)
        htmlSnippets {
          subparts {
            singleview >
            singleview = TEXT
            singleview {
              value (
                <!-- ###SINGLEVIEW### begin --><!-- ###SINGLEBODY### begin --><!-- ###SINGLEBODYROW### begin -->
                <!-- ###AREA_FOR_AJAX_LIST_01### begin -->
                <div class="columns">
                  ###MAP###
                  <div class="row">
                    <div class="columns small-12 medium-12 large-4">
                      ###TX_ORG_CAL.DATETIME###<!-- datesheet -->
                    </div>
                    <div class="columns small-12 medium-12 large-8">
                      ###TX_ORG_CAL.DELETED###<!-- tx_org_location -->
                    </div>
                  </div>
                  <div class="row">
                    <div class="columns">
                      ###TX_ORG_CAL.CRDATE###<!-- form for tickets -->
                    </div>
                  </div>
                  <div class="row">
                    <div class="columns">
                      ###RECORD_BROWSER###
                      ###TX_ORG_CAL.TITLE###
                      <!-- ###AREA_FOR_AJAX_LIST_01### end -->
                      <!-- ###BACKBUTTON### begin -->
                      <p class="backbutton">
                        ###MY_SINGLEVIEWBACKBUTTON###
                      </p>
                      <!-- ###BACKBUTTON### end -->
                      <!-- ###AREA_FOR_AJAX_LIST_02### begin -->
                    </div>
                  </div>
                </div><1-- columns -->
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