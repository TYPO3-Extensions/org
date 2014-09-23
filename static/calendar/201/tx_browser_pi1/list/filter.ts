plugin.tx_browser_pi1 {
  views {
    list {
      201 {
        filter {
          //radialsearch < plugin.tx_browser_pi1.displayList.master_templates.radialsearch
          tx_org_caltype {
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
                    data = LLL:EXT:org/locallang_db.xml:filter_phrase.headquarterscat
                  }
                }
              }
                // #43641, dwildt, 1-, 1+
              //wrap = <span class="selectbox">|</span>
              wrap = <div class="category_menu category_menu_treeview">|</div>
            }
          }
          tx_org_cal {
            datetime < plugin.tx_browser_pi1.displayList.master_templates.category_menu
            datetime {
              first_item {
                cObject {
                  20 {
                    data = LLL:EXT:org/locallang_db.xml:filter_phrase.calendar
                  }
                }
              }
              wrap = <span class="category_menu">|</span>
              order.field = uid
              area < plugin.tx_browser_pi1.displayList.master_templates.areas.sample_period
              area {
                interval {
                  case = year
                }
              }
            }
            datetime >
            datetime < plugin.tx_browser_pi1.displayList.master_templates.selectbox
            datetime {
              first_item {
                cObject {
                  20 {
                    data = LLL:EXT:org/locallang_db.xml:filter_phrase.calendar
                  }
                }
              }
              wrap = <span class="selectbox">|</span>
              wrap {
                item {
                  cObject {
                    20 {
                      crop = 30 | ... | 1
                    }
                  }
                }
              }
              order.field = uid
              area < plugin.tx_browser_pi1.displayList.master_templates.areas.sample_period
              area {
                interval {
                  case = year
                }
              }
            }
          }
          tx_org_caltype {
            title < plugin.tx_browser_pi1.displayList.master_templates.selectbox
            title {
              first_item {
                cObject {
                  20 {
                    data = LLL:EXT:org/locallang_db.xml:filter_phrase.caltype.title
                  }
                }
              }
              wrap = <span class="selectbox">|</span>
              wrap {
                item {
                  cObject {
                    20 {
                      crop = 30 | ... | 1
                    }
                  }
                }
              }
            }
          }
        }
      }
    }
  }
}