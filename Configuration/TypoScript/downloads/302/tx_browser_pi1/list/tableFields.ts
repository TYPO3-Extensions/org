plugin.tx_browser_pi1 {
  views {
    list {
      302 {
        tx_org_downloadscat {
            // default, cat_color, cat_image, cat_text
          title = CASE
          title {
            key {
              field = tx_org_downloadscat.type
            }
              // default (cat_text): &nbsp;, title, text, socialmedia_bookmarks
            default = COA
            default {
                // &nbsp;
              10 = TEXT
              10 {
                value = &nbsp;
                wrap  = <div class="###CSSVISLARGETO######CSSGRID######CSSGRIDSMALL###12 ###CSSGRIDMEDIUM###12 ###CSSGRIDLARGE###2">|</div>
              }
                // title, text
              20 = COA
              20 {
                  // socialmedia_bookmarks
                10 = TEXT
                10 {
                  value = ###SOCIALMEDIA_BOOKMARKS###
                  wrap = <div class="###CSSVISLARGETO###sbmFloatRight">|</div>
                }
                  // title: from plugin.tx_browser_pi1.templates.listview.header.1.default
                20 < plugin.tx_browser_pi1.displayList.master_templates.tableFields.header.1.default
                20 {
                  typolink {
                    additionalParams >
                    additionalParams {
                      wrap  = &tx_browser_pi1[tx_org_downloadscat.title][]=|
                      field = tx_org_downloadscat.uid
                    }
                  }
                }
                  // text: from plugin.tx_browser_pi1.displayList.master_templates.tableFields.text.1.default
                30 < plugin.tx_browser_pi1.displayList.master_templates.tableFields.text.1.default
                30 {
                  20 {
                    typolink {
                      additionalParams >
                      additionalParams {
                        wrap  = &tx_browser_pi1[tx_org_downloadscat.title][]=|
                        field = tx_org_downloadscat.uid
                      }
                    }
                  }
                }
                wrap = <div class="###CSSGRID######CSSGRIDSMALL###12 ###CSSGRIDMEDIUM###12 ###CSSGRIDLARGE###10">|</div>
              }
              wrap = <div class="row">|</div>
            }
              // cat_color: color, title, text, socialmedia_bookmarks
            cat_color = COA
            cat_color {
                // color
              10 = COA
              10 {
                10 = COA
                10 {
                  10 = COA
                  10 {
                    10 = TEXT
                    10 {
                      field = tx_org_downloadscat.color
                      wrap  = background:|;
                    }
                    20 = TEXT
                    20 {
                      value = block
                      wrap  = display:|;
                    }
                    30 = TEXT
                    30 {
                      value = 137px
                      wrap  = height:|;
                    }
                    40 = TEXT
                    40 {
                      value = 137px
                      wrap  = width:|;
                    }
                    wrap = <span style="|">&nbsp;</span>
                  }
                  stdWrap {
                    typolink < plugin.tx_browser_pi1.displayList.master_templates.tableFields.typolinks.1.default
                    typolink {
                      additionalParams >
                      additionalParams {
                        wrap  = &tx_browser_pi1[tx_org_downloadscat.title][]=|
                        field = tx_org_downloadscat.uid
                      }
                    }
                  }
                }
                wrap = <div class="###CSSVISLARGETO######CSSGRID######CSSGRIDSMALL###12 ###CSSGRIDMEDIUM###12 ###CSSGRIDLARGE###2">|</div>
              }
                // text: from plugin.tx_browser_pi1.displayList.master_templates.tableFields.text.1.default
              20 < plugin.tx_browser_pi1.views.list.302.tx_org_downloadscat.title.default.20
              20 {
                wrap = <div class="###CSSGRID######CSSGRIDSMALL###12 ###CSSGRIDMEDIUM###12 ###CSSGRIDLARGE###10">|</div>
              }
              wrap = <div class="row">|</div>
            }
              // cat_image: image, title, text, socialmedia_bookmarks
            cat_image = COA
            cat_image {
                // image
              10 = COA
              10 {
                  // image
                10 < plugin.tx_browser_pi1.displayList.master_templates.tableFields.image.1.default
                10 {
                  imageLinkWrap {
                    typolink {
                      additionalParams >
                      additionalParams {
                        wrap  = &tx_browser_pi1[tx_org_downloadscat.title][]=|
                        field = tx_org_downloadscat.uid
                      }
                    }
                  }
                }
                wrap = <div class="###CSSVISLARGETO######CSSGRID######CSSGRIDSMALL###12 ###CSSGRIDMEDIUM###12 ###CSSGRIDLARGE###2">|</div>
              }
                // text: from plugin.tx_browser_pi1.displayList.master_templates.tableFields.text.1.default
              20 < plugin.tx_browser_pi1.views.list.302.tx_org_downloadscat.title.default.20
              20 {
                wrap = <div class="###CSSGRID######CSSGRIDSMALL###12 ###CSSGRIDMEDIUM###12 ###CSSGRIDLARGE###10">|</div>
              }
              wrap = <div class="row">|</div>
            }
              // cat_text: &nbsp;, title, text, socialmedia_bookmarks
            cat_text < .default
          }
        }
      }
    }
  }
}