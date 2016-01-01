plugin.tx_browser_pi1 {
  views {
    list {
      301 {
        htmlSnippets =
        htmlSnippets {
          marker {
            filter = TEXT
            filter {
              value (
                <div class="row filter">
                  ###TX_ORG_DOWNLOADSCAT.TITLE###
                  ###TX_ORG_DOWNLOADSMEDIA.TITLE###
                  ###TX_ORG_DOWNLOADS.DATETIME###
                </div>
)
            }
          }
          subparts {
              // For foundation main_02.html
            //searchform < plugin.tx_browser_pi1.displayList.master_templates.subparts.listview.searchform.simpleMapOrderFilter
              // For foundation main_01.html
            //searchform < plugin.tx_browser_pi1.displayList.master_templates.subparts.listview.searchform.simple
            listview = TEXT
            listview {
              value (
            <div id="c###TT_CONTENT.UID###-listview-###MODE###" class="row listview listview-content listview-###MODE### listview-content-###MODE###">
              <div class="columns col-lg-12">
                <!-- ###LISTBODY### begin --><!-- ###LISTBODYITEM### begin -->
                <div class="row tx_org_downloads tx_org_downloads-record record">
                  ###TX_ORG_DOWNLOADS.TITLE###
                </div>
                <!-- ###LISTBODYITEM### end --><!-- ###LISTBODY### end -->
              </div><!-- /columns -->
            </div><!-- /listview -->
)
            }
          }
        }
      }
    }
  }
}