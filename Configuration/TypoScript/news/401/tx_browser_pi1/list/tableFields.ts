plugin.tx_browser_pi1 {
  views {
    list {
      401 {
        tx_org_news {
            // text, bookmarks; image
          title = COA
          title {
              // text: teaser_title, teaser_subtitle, teaser_short, bookmarks
            10 = COA
            10 {
                // teaser_title
              10 < plugin.tx_browser_pi1.displayList.master_templates.tableFields.header.0
                // teaser_subtitle
              20 = TEXT
              20 {
                field = {$plugin.tx_browser_pi1.templates.listview.subtitle.0.field}
                wrap  = {$plugin.tx_browser_pi1.templates.listview.subtitle.0.wrap}
                crop  = {$plugin.tx_browser_pi1.templates.listview.subtitle.0.crop}
                required = 1
              }
                // teaser_short
              30 < plugin.tx_browser_pi1.displayList.master_templates.tableFields.text.0
              30 {
                default {
                  10 {
                    prepend = TEXT
                    prepend {
                      field = tx_org_news.datetime
                      strftime = %d. %b. %Y
                      noTrimWrap = |<span class="date">|</span> &ndash; |
                      required = 1
                    }
                  }
                }
                notype {
                  10 {
                    prepend < plugin.tx_browser_pi1.views.list.401.tx_org_news.title.10.30.default.10.prepend
                  }
                }
                page {
                  10 {
                    prepend < plugin.tx_browser_pi1.views.list.401.tx_org_news.title.10.30.default.10.prepend
                  }
                }
                url {
                  10 {
                    prepend < plugin.tx_browser_pi1.views.list.401.tx_org_news.title.10.30.default.10.prepend
                  }
                }
              }
                // socialmedia_bookmarks
              40 = TEXT
              40 {
                value = ###SOCIALMEDIA_BOOKMARKS###
                //wrap = <div class="row"><div class="columns">|</div></div>
                wrap = <div class="show-for-large-up">|</div>
              }
              wrap = <div class="columns small-12 medium-12 large-9">|</div>
            }
              // image
            20 = COA
            20 {
                // image
              10 < plugin.tx_browser_pi1.displayList.master_templates.tableFields.image.0
              wrap = <div class="show-for-large-up columns small-12 medium-12 large-3">|</div>
            }
            wrap = <div class="row">|</div>
          }
        }
      }
    }
  }
}

[globalVar = GP:type = {$plugin.pdfcontroller.pages.print.typeNum}]
  plugin.tx_browser_pi1 {
    views {
      list {
        401 {
          tx_org_news {
            title {
              10 {
                40 >
                wrap = <td class="text" style="width:75%;">|</td>
              }
              20 {
                wrap = <td class="image" style="width:25%;">|</td>
              }
              wrap = <tr class="row">|</tr>
            }
          }
        }
      }
    }
  }
[global]