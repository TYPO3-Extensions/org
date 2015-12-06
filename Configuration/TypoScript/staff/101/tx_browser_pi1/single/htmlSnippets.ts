plugin.tx_browser_pi1 {
  views {
    single {
      101 {
        htmlSnippets =
        htmlSnippets {
          subparts {
            singleview = TEXT
            singleview {
              value (
                <!-- ###SINGLEVIEW### begin --><!-- ###SINGLEBODY### begin --><!-- ###SINGLEBODYROW### begin -->
                <!-- ###AREA_FOR_AJAX_LIST_01### begin -->
                <div class="main ###CSSGRID######CSSGRIDSMALL######FDTMPLTABLESINGLECOLLEFTSMALL### ###CSSGRIDMEDIUM######FDTMPLTABLESINGLECOLLEFTMEDIUM### ###CSSGRIDLARGE######FDTMPLTABLESINGLECOLLEFTLARGE###">
                  ###RECORD_BROWSER###
                  ###TX_ORG_STAFF.TITLE###
                  <!-- ###AREA_FOR_AJAX_LIST_01### end -->
                  <!-- ###BACKBUTTON### begin -->
                  <p class="backbutton">
                    ###MY_SINGLEVIEWBACKBUTTON###
                  </p>
                  <!-- ###BACKBUTTON### end -->
                  <!-- ###AREA_FOR_AJAX_LIST_02### begin -->
                </div>
                <div class="margin ###CSSGRID######CSSGRIDSMALL######FDTMPLTABLESINGLECOLRIGHTSMALL### ###CSSGRIDMEDIUM######FDTMPLTABLESINGLECOLRIGHTMEDIUM### ###CSSGRIDLARGE######FDTMPLTABLESINGLECOLRIGHTLARGE###">
                  ###TX_ORG_STAFF.CONTACT_EMAIL###
                  ###TX_ORG_HEADQUARTERS.UID###
                  ###TX_ORG_STAFF.DELETED###<!-- tx_org_staffgroup -->
                  ###TX_ORG_STAFF.CRDATE###<!-- tx_org_news -->
                  ###TX_ORG_STAFF.TX_ORG_CAL###<!-- tx_org_cal -->
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
