plugin.tx_seodynamictag {
  canonical {
    single {
        // Only this parameter are allowed:
      additionalParams = &tx_browser_pi1[eventUid]={GP:tx_browser_pi1|eventUid}
    }
  }
  condition {
    single {
        // Please replace xxx with the uid of the page with the event plugin for the single view
        // Please use the Constant Editor
      begin = globalVar = GP:tx_browser_pi1|eventUid > 0] && [globalVar = TSFE:id = xxx
    }
  }
  database {
    table = tx_org_event
    var.1 = tx_browser_pi1[eventUid]
    field {
      //author        =
      description   = seo_description
      keywords      = seo_keywords
      title         = title
      short         = bodytext
    }
  }
  default {
    description = Description is empty! Please maintain the current record of the TYPO3 Organiser Events. See tab [Search Engine] field [Description]
  }
  keywords {
    default         = Keywords are empty! Please maintain the current record of the TYPO3 Organiser Events. See tab [Search Engine] field [Keywords]
    moveToKeywords  = 0
  }
}