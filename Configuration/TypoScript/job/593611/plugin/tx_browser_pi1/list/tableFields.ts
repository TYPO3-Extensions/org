plugin.tx_browser_pi1 {
  views {
    list {
      593611 {
        tx_org_job {
            // placeholder: radialsearch HTML class depending on radius
          crdate < plugin.tx_radialsearch.masterTemplates.htmlClass
            // placeholder: radialsearch linear distance
          //deleted < plugin.tx_radialsearch.masterTemplates.linearDistanceString
            // image, distance, header, different categories, text
          mail_city = COA
          mail_city {
            10 = TEXT
            10 {
              value = &nbsp;
              override {
                cObject = TEXT
                cObject {
                  field = tx_org_job.mail_city
                }
              }
            }
            20 < plugin.tx_radialsearch.masterTemplates.linearDistanceString
            20 {
              wrap = <br /><span class="distance"></span>
            }
          }
          title = COA
          title {
              // image
            10 = COA
            10 {
              10 < plugin.tx_browser_pi1.displayList.master_templates.tableFields.image.0
              wrap = <div style="float:left;padding-right:1em;>|</div>
            }
            20 < plugin.tx_browser_pi1.displayList.master_templates.tableFields.header.0
            20.default.wrap = |
            30 = TEXT
            30 {
              field = tx_org_jobcat.title
              required = 1
              wrap = <br />|
            }
            40 = TEXT
            40 {
              field = tx_org_jobsector.title
              required = 1
              wrap = <br />|
            }
          }
        }
      }
    }
  }
}