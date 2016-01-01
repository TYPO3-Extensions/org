plugin.tx_browser_pi1 {
  views {
    single {
      301 {
        tx_org_downloads {
          title {
            30 {
              20 >
                // 140706: empty statement: for proper comments only
              20 {
              }
                // buttons: flag, download, shipping
              20 = COA
              20 {
                  // default, downloads only, shipping only
                10 = CASE
                10 {
                  key {
                    field = tx_org_downloads.type
                  }
                    // flag, download, shipping
                  default = COA
                  default {
                      // flag
                    10 < temp.tx_org_downloads.flag
                      // download
                    20 < temp.tx_org_downloads.download
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
                wrap = <div class="buttons text-right">|</div>
              }
            }
          }
        }
      }
    }
  }
}