plugin.tx_browser_pi1 {
  views {
    list {
      501 {
        filter {
          radialsearch < plugin.tx_browser_pi1.displayList.master_templates.radialsearch
          tx_org_headquarters {
              // #43641, dwildt, 1-, 1+
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
                    data = LLL:EXT:org/locallang_db.xml:filter_phrase.headquarters
                  }
                }
              }
                // #43641, dwildt, 1-, 1+
              //wrap = <span class="selectbox">|</span>
              wrap = <div class="category_menu category_menu_treeview">|</div>
            }
            mail_lat < plugin.tx_browser_pi1.displayList.master_templates.selectbox
          }
          tx_org_headquarterscat {
              // #43641, dwildt, 1-, 1+
            //title < plugin.tx_browser_pi1.displayList.master_templates.selectbox
            title < plugin.tx_browser_pi1.displayList.master_templates.treeview
            title {
              count_hits = 0
              treeview {
                enabled {
                  value = 1
                }
                html_id {
                  value = {$plugin.tx_browser_pi1.jQuery.plugin.jstree.selector_02}
                }
              }
              first_item {
                cObject {
                  20 {
                    data = LLL:EXT:org/locallang_db.xml:filter_phrase.headquarterscat
                  }
                }
              }
                // #43641, dwildt, 1-, 1+
              //wrap = <span class="selectbox">|</span>
              wrap = <div class="category_menu category_menu_treeview">|</div>
            }
            title >
            title < plugin.tx_browser_pi1.displayList.master_templates.selectbox
          }
        }
      }
    }
  }
}