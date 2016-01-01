plugin.tx_browser_pi1 {
  views {
    list {
      311 {
          // marker and subparts will replaced in the HTML template before data handling
          // #43627, 121205, dwildt
        htmlSnippets =
        htmlSnippets {
          subparts {
            listview = TEXT
            listview {
              value (
          <div id="c###TT_CONTENT.UID###-listview-###MODE###" class="listview listview-downloads listview-downloads-top-5">
            <ol class="listview listview-downloads listview-downloads-top-5"><!-- ###LISTBODY### begin -->
              <!-- ###LISTBODYITEM### begin -->###TX_ORG_DOWNLOADS.TITLE###
              <!-- ###LISTBODYITEM### end -->
            <!-- ###LISTBODY### end -->
            </ol>
            ###MY_LISTVIEW_PAGE###
          </div> <!-- /c###TT_CONTENT.UID###-listview-###MODE### -->
)
            }
          }
        }
      }
    }
  }
}