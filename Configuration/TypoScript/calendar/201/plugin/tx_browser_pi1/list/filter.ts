plugin.tx_browser_pi1 {
  views {
    list {
      201 {
        filter {
          radialsearch < plugin.tx_browser_pi1.displayList.master_templates.radialsearch
          tx_org_cal {
            datetime < plugin.tx_browser_pi1.displayList.master_templates.category_menu
            datetime {
              condition >
              condition = TEXT
              condition {
                value = {$plugin.org.filter.tx_org_cal.datetime}
              }
              first_item {
                cObject {
                  20 {
                    data = LLL:EXT:org/Resources/Private/Language/locallang_db.xml:filter_phrase.calendar
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
              condition >
              condition = TEXT
              condition {
                value = {$plugin.org.filter.tx_org_cal.datetime}
              }
              first_item {
                cObject {
                  20 {
                    data = LLL:EXT:org/Resources/Private/Language/locallang_db.xml:filter_phrase.calendar
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
          tx_org_caltype >
          tx_org_caltype {
            // #43641, dwildt, 1-, 1+
            //title < plugin.tx_browser_pi1.displayList.master_templates.selectbox
            title < plugin.tx_browser_pi1.displayList.master_templates.treeview
            title {
              condition >
              condition = TEXT
              condition {
                value = {$plugin.org.filter.tx_org_cal.tx_org_caltype}
              }
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
                    data = LLL:EXT:org/Resources/Private/Language/locallang_db.xml:filter_phrase.caltype.title
                  }
                }
              }
                // #43641, dwildt, 1-, 1+
              wrap = <span class="selectbox">|</span>
              //wrap = <div class="category_menu category_menu_treeview">|</div>
            }
          }
          tx_org_location {
            title < plugin.tx_browser_pi1.displayList.master_templates.selectbox
            title {
              condition >
              condition = TEXT
              condition {
                value = {$plugin.org.filter.tx_org_cal.tx_org_location}
              }
              first_item {
                cObject {
                  20 {
                    data = LLL:EXT:org/Resources/Private/Language/locallang_db.xml:filter_phrase.location
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
          tx_org_staff {
            title < plugin.tx_browser_pi1.displayList.master_templates.selectbox
            title {
              condition >
              condition = TEXT
              condition {
                value = {$plugin.org.filter.tx_org_cal.tx_org_staff}
              }
              first_item {
                cObject {
                  20 {
                    data = LLL:EXT:org/Resources/Private/Language/locallang_db.xml:filter_phrase.staff
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