plugin.tx_browser_pi1 {
  navigation {
    map {
      marker {
        variables {
          system {
            description {
              20 {
                default {
                  wrap = <div style="">|</div>
                }
                page {
                  wrap = <div style="">|</div>
                }
                url {
                  wrap = <div style="">|</div>
                }
              }
              40 {
                default {
                  10 {
                    field = tx_org_job.mail_city // tx_org_job.description
                  }
                }
                page {
                  10 {
                    field = tx_org_job.mail_city // tx_org_job.description
                  }
                }
                url {
                  10 {
                    field = tx_org_job.mail_city // tx_org_job.description
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