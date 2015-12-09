plugin.tx_browser_pi1 {
  views {
    list {
      61826 {
        filter {
          tx_org_eventcat {
            //title < plugin.tx_browser_pi1.displayList.master_templates.selectbox
            title < plugin.tx_browser_pi1.displayList.master_templates.treeview
            title {
              count_hits = 0
              treeview {
                enabled {
                  value = 1
                }
                html_id {
                  value = {$plugin.tx_browser_pi1.jQuery.plugin.jstree.selector_01}
                }
              }
              first_item {
                cObject {
                  20 {
                    data = LLL:EXT:org/Resources/Private/Language/locallang_db.xml:filter_phrase.eventcat
                  }
                }
              }
                // #43641, dwildt, 1-, 1+
              //wrap = <span class="selectbox">|</span>
              wrap = <div class="category_menu category_menu_treeview">|</div>
            }
          }
        }
      }
    }
  }
}