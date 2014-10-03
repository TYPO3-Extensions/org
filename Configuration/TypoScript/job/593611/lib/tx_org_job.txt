lib {
  tx_org_job {
  }
    // powermail
  tx_org_job =
  tx_org_job {
      // contractoremail, job
    powermail =
    powermail {
        // e-mail
      contractoremail = TEXT
      contractoremail {
        value       = {$plugin.org.tx_org_jobs.contractoremail}
        override {
          cObject = RECORDS
          cObject {
            source {
              data = GP:tx_browser_pi1|tx_org_job.uid
            }
            tables = tx_org_job
            conf {
              tx_org_job = TEXT
              tx_org_job {
                field = applicationaddress
              }
            }
          }
        }
      }
        // e-mail wrapped with <div>|</div>
      contractoremailwrapped < .contractoremail
      contractoremailwrapped {
        noTrimWrap  = |<div class="test">TypoScript Test - dies ist die Anbieter-E-Mail: |</div>|
        override {
          override {
            cObject = TEXT
            cObject {
              //value = Dirk Wildt
            }
          }
        }
      }
        // title of the job, linked absolute to the detail view
      job = RECORDS
      job {
        source {
          data = GP:tx_browser_pi1|tx_org_job.uid
        }
        tables = tx_org_job
        conf {
          tx_org_job = TEXT
          tx_org_job {
            field = title
            wrap = <div class="header">|</div>
            typolink {
              parameter {
                cObject = COA
                cObject {
                    // url
                  10 = TEXT
                  10 {
                    value = {$plugin.org.pages.job}
                  }
                    // target
                  20 = TEXT
                  20 {
                    value       = _blank
                    noTrimWrap  = | "|"|
                  }
                    // class
                  30 = TEXT
                  30 {
                    value       = internal-link
                    noTrimWrap  = | "|"|
                  }
                    // title
                  40 = TEXT
                  40 {
                    value = Job offer
                    lang {
                      de = Stellenangebot
                      en = Job offer
                    }
                    noTrimWrap  = | "|"|
                  }
                }
              }
              additionalParams {
                wrap  = &tx_browser_pi1[{$plugin.tx_browser_pi1.navigation.showUid}]=|
                data  = GP:tx_browser_pi1|tx_org_job.uid
              }
              forceAbsoluteUrl = 1
              forceAbsoluteUrl {
                scheme = http
              }
              useCacheHash = 1
            }
            wrap = <div class="url">|</div>
          }
        }
      }
    }
  }
}