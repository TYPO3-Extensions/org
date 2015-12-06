plugin.tx_browser_pi1 {
  views {
    single {
      201 {
        htmlSnippets =
        htmlSnippets {
          subparts {
            singleview = TEXT
            singleview {
              value (
                <!-- ###SINGLEVIEW### begin --><!-- ###SINGLEBODY### begin --><!-- ###SINGLEBODYROW### begin -->
                <!-- ###AREA_FOR_AJAX_LIST_01### begin -->
                <div class="margin ###CSSGRID######CSSGRIDSMALL###12 ###CSSGRIDMEDIUM###12 ###CSSGRIDLARGE###4">
                  ###MAP###
                  <div class="row">
                    <div class="###CSSGRID######CSSGRIDSMALL###12 ###CSSGRIDMEDIUM###12 ###CSSGRIDLARGE###4">
                      ###TX_ORG_CAL.DATETIME###<!-- datesheet -->
                    </div>
                    <div class="###CSSGRID######CSSGRIDSMALL###12 ###CSSGRIDMEDIUM###12 ###CSSGRIDLARGE###8">
                      ###TX_ORG_CAL.DELETED###<!-- tx_org_location -->
                      ###TX_ORG_CAL.TX_ORG_HEADQUARTERS###<!-- tx_org_headquarters -->
                      ###TX_ORG_CAL.TX_ORG_STAFF###<!-- tx_org_staff -->
                    </div>
                    <div class="###CSSGRID######CSSGRIDSMALL###12 ###CSSGRIDMEDIUM###12 ###CSSGRIDLARGE###12">
                      ###TX_ORG_CAL.CRDATE###<!-- form for tickets -->
                    </div>
                  </div>
                </div>
                <div class="main ###CSSGRID######CSSGRIDSMALL###12 ###CSSGRIDMEDIUM###12 ###CSSGRIDLARGE###8">
                  ###RECORD_BROWSER###
                  ###TX_ORG_CAL.TITLE###
                  <!-- ###AREA_FOR_AJAX_LIST_01### end -->
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