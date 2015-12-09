plugin.tx_browser_pi1 {
  views {
    single {
      301 {
        tx_org_downloads {
          title {
            20 >
              // 140706: empty statement: for proper comments only
            20 {
            }
              // image intext-left
            20 = COA
            20 {
              10 < plugin.tx_browser_pi1.displaySingle.master_templates.tableFields.image.0
              10 {
                10 {
                  split {
                    1.10.20.10.imageLinkWrap >
                    1.10.20.10.imageLinkWrap = 1
                    1.10.20.10.imageLinkWrap {
                      enable = 1
                      typolink < temp.tx_org_downloads.typolink
                    }
                  }
                }
              }
              wrap = <div class="columns large-4 col-lg-4 intext-left">|</div>
            }
          }
        }
      }
    }
  }
}