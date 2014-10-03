plugin.tx_browser_pi1 {
  views {
    list {
      593611 {
        tx_org_job {
            // placeholder: radialsearch HTML class depending on radius
          crdate < plugin.tx_radialsearch.masterTemplates.htmlClass
            // image, distance, header, different categories, text
          title = COA
          title {
            20 < plugin.tx_browser_pi1.displayList.master_templates.tableFields.header.0
            20.default.wrap = |
          }
        }
      }
    }
  }
}