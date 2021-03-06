plugin.tx_seodynamictag {

  canonical {
    single {
        // Only this parameter are allowed:
      additionalParams = &tx_browser_pi1[downloadsUid]={GP:tx_browser_pi1|downloadsUid}
    }
  }

  condition {
    single {
        // Please replace xxx with the uid of the page with the downloads plugin for the single view
        // Please use the Constant Editor
      begin = globalVar = GP:tx_browser_pi1|downloadsUid > 0] && [globalVar = TSFE:id = xxx
    }
  }

  database {
    table = tx_org_downloads
    var.1 = tx_browser_pi1[downloadsUid]
    field {
      //author        = "Author is empty: Please use the TypoScript Constant Editor maintain "
      description   = seo_description
      keywords      = seo_keywords
      title         = title
      short         = subtitle
    }
  }

  default {
    description = Description is empty! Please maintain the current record of the TYPO3 Organiser Downloads. See tab [Search Engine] field [Description]
  }

  keywords {
    default         = Keywords are empty! Please maintain the current record of the TYPO3 Organiser Downloads. See tab [Search Engine] field [Keywords]
    moveToKeywords  = 0
  }
}
