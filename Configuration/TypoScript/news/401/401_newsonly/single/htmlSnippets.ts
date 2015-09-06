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
                <div class="main columns">
                  ###RECORD_BROWSER###
                  ###TX_ORG_NEWS.TITLE###
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

#i0077
[globalVar = GP:type = {$plugin.pdfcontroller.pages.print.typeNum}]
  plugin.tx_browser_pi1 {
    views {
      single {
        401 {
          comment = news solo
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