plugin.tx_browser_pi1 {
  views {
    single {
      401 {
        htmlSnippets =
        htmlSnippets {
          subparts {
            singleview = TEXT
            singleview {
              value (
                <!-- ###SINGLEVIEW### begin --><!-- ###SINGLEBODY### begin --><!-- ###SINGLEBODYROW### begin -->
                <!-- ###AREA_FOR_AJAX_LIST_01### begin -->
                <div class="main columns small-12 medium-12 large-8">
                  ###RECORD_BROWSER###
                  ###TX_ORG_NEWS.TITLE###
                </div>
                <div class="margin columns show-for-large-up small-12 medium-12 large-4">
                  ###TX_ORG_STAFF.UID###
                  ###TX_ORG_NEWS.CRDATE###
                  ###TX_ORG_NEWS.DELETED###
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

#i0077
[globalVar = GP:type = {$plugin.pdfcontroller.pages.print.typeNum}]
  plugin.tx_browser_pi1 {
    views {
      single {
        401 {
          dummy = 1
          htmlSnippets {
            subparts {
              singleview {
                value (
                  <!-- ###SINGLEVIEW### begin --><!-- ###SINGLEBODY### begin --><!-- ###SINGLEBODYROW### begin -->
                  <!-- ###AREA_FOR_AJAX_LIST_01### begin -->
                  <table class="main">
                    <tbody>
                      <tr>
                        ###TX_ORG_NEWS.TITLE###
                      </tr>
                    </tbody>
                  </table>
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
[global]