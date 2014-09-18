plugin.tx_browser_pi1 {
  views {
    list {
      401 {
        tx_org_news {
            // image, header, text
          title = COA
          title {
              // image
            10 = COA
            10 {
              10 < plugin.tx_browser_pi1.displayList.master_templates.tableFields.image.0
              wrap = <div style="float:left;padding:0 1em 1em 0;">|</div>
            }
              // header
            20 < plugin.tx_browser_pi1.displayList.master_templates.tableFields.header.0
              // text
            30 < plugin.tx_browser_pi1.displayList.master_templates.tableFields.text
          }
        }
      }
    }
  }
}