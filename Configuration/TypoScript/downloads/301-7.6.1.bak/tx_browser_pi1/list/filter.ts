plugin.tx_browser_pi1 {
  views {
    list {
      301 {
        filter {
          tx_org_downloads {
            datetime < plugin.tx_browser_pi1.displayList.master_templates.selectbox
            datetime {
              first_item {
                cObject {
                  20 {
                    data = LLL:EXT:org/Resources/Private/Language/locallang_db.xml:filter_phrase.tx_org_downloads.datetime
                  }
                }
              }
              // wrap for all filters in one row
              //wrap = <span class="selectbox">|</span>
              wrap = <div class="###CSSGRID######CSSGRIDSMALL###12 ###CSSGRIDMEDIUM###4 selectbox">|</div>
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
                  year {
                    start_period {
                      stdWrap {
                        value = -10 year
                      }
                    }
                    times_stdWrap {
                      value = 10
                    }
                  }
                }
              }
            }
          }
          tx_org_downloadscat {
            title < plugin.tx_browser_pi1.displayList.master_templates.selectbox
            title {
              first_item {
                cObject {
                  20 {
                    data = LLL:EXT:org/Resources/Private/Language/locallang_db.xml:filter_phrase.doccat
                  }
                }
              }
              // wrap for all filters in one row
              //wrap = <span class="selectbox">|</span>
              wrap = <div class="###CSSGRID######CSSGRIDSMALL###12 ###CSSGRIDMEDIUM###4 selectbox">|</div>
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
          tx_org_downloadsmedia {
            title < plugin.tx_browser_pi1.displayList.master_templates.selectbox
            title {
              first_item {
                cObject {
                  20 {
                    data = LLL:EXT:org/Resources/Private/Language/locallang_db.xml:filter_phrase.docmedia
                  }
                }
              }
              // wrap for all filters in one row
              //wrap = <span class="selectbox">|</span>
              wrap = <div class="###CSSGRID######CSSGRIDSMALL###12 ###CSSGRIDMEDIUM###4 selectbox">|</div>
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