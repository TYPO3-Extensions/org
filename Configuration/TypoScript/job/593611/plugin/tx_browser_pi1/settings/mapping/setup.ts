plugin.tx_browser_pi6 {
  settings {
      // empty statement for proper comments only
    mapping {
    }
      // tx_org_job
    mapping =
    mapping {
        // empty statement for proper comments only
      tx_org_job {
      }
        // allowedFields, defaults
      tx_org_job =
      tx_org_job {
        allowedFields = {$plugin.org.frontendediting.tx_org_job.allowed}
          // empty statement for proper comments only
        defaults {
        }
          // pid
        defaults =
        defaults {
            // value: {$plugin.org.sysfolder.job}
          pid = TEXT
          pid {
            value = {$plugin.org.sysfolder.job}
          }
        }
      }
    }
  }
}