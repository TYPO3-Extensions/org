plugin.tx_browser_pi1 {
  views {
    list {
      102 {
        filter {
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
                    data = LLL:EXT:org/Resources/Private/Language/locallang_db.xml:filter_phrase.headquarters
                  }
                }
              }
                // #43641, dwildt, 1-, 1+
              //wrap = <span class="selectbox">|</span>
              wrap = <div class="category_menu category_menu_treeview">|</div>
            }
          }
          tx_org_staffgroup {
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
                    data = LLL:EXT:org/Resources/Private/Language/locallang_db.xml:filter_phrase.staffgroup
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