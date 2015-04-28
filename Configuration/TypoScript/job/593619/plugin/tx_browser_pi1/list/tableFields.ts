plugin.tx_browser_pi1 {
  views {
    list {
      593619 {
        tx_org_job {
          teaser_short = COA
          teaser_short {
            10 = TEXT
            10 {
              field     = tx_org_job.teaser_short
              required  = 1
            }
            20 = TEXT
            20 {
              if {
                isFalse {
                  field = tx_org_job.teaser_short
                }
              }
              field     = tx_org_job.description
              crop        = 300 | ... | 1
            }
            stdWrap {
              stripHtml = 1
            }
          }
          title = COA
          title {
            10 = COA
            10 {
              if {
                isTrue {
                  field = tx_org_job.mail_zip // tx_org_job.mail_city
                }
              }
              10 = TEXT
              10 {
                field       = tx_org_job.mail_zip
                required    = 1
                noTrimWrap  = || |
              }
              20 = TEXT
              20 {
                field       = tx_org_job.mail_city
              }
              stdWrap {
                noTrimWrap  = ||: |
              }
            }
            20 = TEXT
            20 {
              field = tx_org_job.title
              crop  = 60 | ... | 1
              stdWrap {
                stripHtml = 1
              }
            }
          }
          uid = CASE
          uid {
            key {
              field = {$plugin.tx_browser_pi1.templates.listview.url.0.key}
            }
              // tx_org_job type: News
            default = TEXT
            default {
              typolink < plugin.tx_browser_pi1.displayList.master_templates.tableFields.typolinks.0.default
            }
              // tx_org_job type: no link
            notype = TEXT
            notype {
              value =
            }
              // tx_org_job type: Link internal Page
            page = TEXT
            page {
              typolink < plugin.tx_browser_pi1.displayList.master_templates.tableFields.typolinks.0.page
            }
              // tx_org_job type: Link external URL
            url = TEXT
            url {
              typolink < plugin.tx_browser_pi1.displayList.master_templates.tableFields.typolinks.0.url
            }
          }
        }
      }
    }
  }
}