plugin.tx_browser_pi1 {
  views {
    list {
      593611 {
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
                  value = {$plugin.tx_browser_pi1.jQuery.plugin.jstree.selector_04}
                }
              }
              first_item {
                cObject {
                  20 {
                    data = LLL:EXT:org/Resources/Private/Language/tx_org_headquarters.xml:tx_org_headquarters.title
                  }
                }
              }
                // #43641, dwildt, 1-, 1+
              //wrap = <span class="selectbox">|</span>
              wrap = <div class="category_menu category_menu_treeview">|</div>
            }
          }
          tx_org_jobcat {
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
                    data = LLL:EXT:org/Resources/Private/Language/tx_org_job.xml:tx_org_jobcat.title
                  }
                }
              }
                // #43641, dwildt, 1-, 1+
              //wrap = <span class="selectbox">|</span>
              wrap = <div class="category_menu category_menu_treeview">|</div>
            }
          }
          tx_org_jobsector {
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
                    data = LLL:EXT:org/Resources/Private/Language/tx_org_job.xml:tx_org_jobsector.title
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