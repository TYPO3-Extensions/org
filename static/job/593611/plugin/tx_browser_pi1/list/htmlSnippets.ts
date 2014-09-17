plugin.tx_browser_pi1 {
  views {
    list {
      593611 {
        htmlSnippets =
        htmlSnippets {
          marker {
            filter = TEXT
            filter {
              value (
              <div class="filter">
                ###RADIALSEARCH###
                ###TX_ORG_JOBSECTOR.TITLE###
                ###TX_ORG_JOBCAT.TITLE###
                ###TX_ORG_HEADQUARTERS.TITLE###
              </div>
)
            }
          }
          subparts {
            // For table_01.html
            searchform < plugin.tx_browser_pi1.displayList.master_templates.subparts.listview.searchform.simple
            // For table_02.html
            //searchform < plugin.tx_browser_pi1.displayList.master_templates.subparts.listview.searchform.simpleMapFilter
          }
        }
      }
    }
  }
}