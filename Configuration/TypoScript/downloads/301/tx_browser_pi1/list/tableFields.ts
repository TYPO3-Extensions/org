plugin.tx_browser_pi1 {
  views {
    list {
      301 {
        tx_org_downloads {
            // text, bookmarks; image
          title = COA
          title {
              // image
            10 = COA
            10 {
                // image
              10 < plugin.tx_browser_pi1.displayList.master_templates.tableFields.image.0
              wrap = <div class="###CSSVISMEDIUMTO######CSSGRID######CSSGRIDMEDIUM###2 ###CSSGRIDLARGE###2">|</div>
            }
              // text: bookmarks, teaser_title, teaser_subtitle, teaser_short
            20 = COA
            20 {
                // socialmedia_bookmarks
              10 = TEXT
              10 {
                value = ###SOCIALMEDIA_BOOKMARKS###
                //wrap = <div class="row"><div class="columns">|</div></div>
                wrap = <div class="###CSSVISLARGETO###" style="float:right;">|</div>
              }
                // teaser_title
              20 < plugin.tx_browser_pi1.displayList.master_templates.tableFields.header.0.default
                // teaser_subtitle
              30 = TEXT
              30 {
                field = tx_org_downloads.teaser_subtitle // tx_org_downloads.subtitle
                wrap  = <h3>|</h3>
                crop  = 40|...|1
                required = 1
              }
                // teaser_short, download statistic
              40 = COA
              40 {
                wrap = <p>|</p>
                  // teaser_short
                10 < plugin.tx_browser_pi1.displayList.master_templates.tableFields.text.0.default.10
                10 {
                  prepend = TEXT
                  prepend {
                    field = tx_org_downloads.datetime
                    strftime = %Y
                    noTrimWrap = |<span class="date">|</span> &ndash; |
                    required = 1
                  }
                }
                  // download statistic
                20 < temp.tx_org_downloads.statistic
              }
              wrap = <div class="###CSSGRID######CSSGRIDMEDIUM###10 ###CSSGRIDLARGE###10">|</div>
            }
              // buttons: download, shipping, details
            30 = COA
            30 {
                // downloads and shipping, downloads only, shipping only
              10 = CASE
              10 {
                key {
                  field = tx_org_downloads.type
                }
                  // downloads and shipping
                default = COA
                default {
                    // flag
                  10 < temp.tx_org_downloads.flag
                    // download
                  20 = TEXT
                  20 {
                    value = Download
                    typolink < temp.tx_org_downloads.typolinkbutton
                  }
                    // shipping
                  30 < plugin.tx_caddy_pi1.templates.html.form.order
                }
                  // download only
                download < .default
                download {
                  30 >
                }
                  // shipping only
                shipping < .default
                shipping {
                  20 >
                }
              }
                // details
              20 < plugin.tx_browser_pi1.displayList.master_templates.tableFields.details.0.default
              20 {
                typolink.parameter.cObject.30.value = {$plugin.org.css.button.linktorecord}
              }
              wrap = <div class="###CSSGRID######CSSGRIDMEDIUM###12 ###CSSGRIDLARGE###12 text-right"><div class="buttons">|</div></div>
            }
          }
        }
      }
    }
  }
}