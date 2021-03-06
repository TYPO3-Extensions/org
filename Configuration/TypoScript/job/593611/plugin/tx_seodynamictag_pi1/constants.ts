plugin.tx_seodynamictag {
  canonical {
    single {
        // Only this parameter are allowed:
      additionalParams = &tx_browser_pi1[jobUid]={GP:tx_browser_pi1|jobUid}
    }
  }
  condition {
    single {
        // Please replace xxx with the uid of the page with the job plugin for the single view
        // Please use the Constant Editor
      begin = globalVar = GP:tx_browser_pi1|jobUid > 0] && [globalVar = TSFE:id = xxx
    }
  }
  database {
    table = tx_org_job
    var.1 = tx_browser_pi1[jobUid]
    field {
      //author        =
      description   = seo_description
      keywords      = seo_keywords
      title         = title
      short         = teaser_short
    }
  }
  default {
    description = Description is empty! Please maintain the current record of the TYPO3 Organiser News. See tab [Search Engine] field [Description]
  }
  keywords {
    default         = Keywords are empty! Please maintain the current record of the TYPO3 Organiser News. See tab [Search Engine] field [Keywords]
    moveToKeywords  = 0
  }
}