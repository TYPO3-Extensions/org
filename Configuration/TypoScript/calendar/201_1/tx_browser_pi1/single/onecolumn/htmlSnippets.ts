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
      201 {
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
                    <div class="###CSSGRID######CSSGRIDMEDIUM###3 ###CSSGRIDLARGE###3">
                      ###TX_ORG_CAL.DATETIME###<!-- datesheet -->
                    </div>
                    <div class="###CSSGRID######CSSGRIDMEDIUM###9 ###CSSGRIDLARGE###9">
                      ###TX_ORG_CAL.DELETED###<!-- tx_org_location -->
                    </div>
                  </div><!-- /row -->
                  <div class="row">
                    <div class="columns">
                      ###TX_ORG_CAL.CRDATE###<!-- form for tickets -->
                    </div>
                  </div><!-- /row -->
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
                  </div><!-- /row -->
                </div><!-- /columns -->
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