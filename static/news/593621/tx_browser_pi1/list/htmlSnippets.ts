plugin.tx_browser_pi1 {
  views {
    list {
      593621 {
        htmlSnippets =
        htmlSnippets {
          marker {
            filter = TEXT
            filter {
              value (
              <div class="filter">
                ###RADIALSEARCH###
                ###TX_ORG_SERVICECAT.TITLE###
                ###TX_ORG_SERVICESECTOR.TITLE###
                ###TX_ORG_SERVICETARGETGROUP.TITLE###
              </div>
)
            }
          }
          subparts {
              // For foundation main_02.html
            searchform < plugin.tx_browser_pi1.displayList.master_templates.subparts.listview.searchform.simpleMapOrderFilter
              // For foundation main_01.html
            //searchform < plugin.tx_browser_pi1.displayList.master_templates.subparts.listview.searchform.simple
            listview = TEXT
            listview {
              value (
            <div id="c###TT_CONTENT.UID###-listview-###MODE###" class="###VIEW###view ###VIEW###view-content ###VIEW###view-###MODE### ###VIEW###view-content-###MODE###">
              <!-- ###LISTBODY### begin --><!-- ###LISTBODYITEM### begin -->
              <div class="tx_org_service tx_org_service-record record###TX_ORG_SERVICE.CRDATE###">
                <div class="sbmFloatRight">
                  ###SOCIALMEDIA_BOOKMARKS###
                </div>
                ###TX_ORG_SERVICE.TITLE###
              </div>
              <div class="cleaner">&nbsp;</div><!-- ###LISTBODYITEM### end --><!-- ###LISTBODY### end -->
              </div> <!-- /listview -->
)
            }
          }
        }
      }
    }
  }
}