plugin.tx_browser_pi1 {
  views {
    list {
      301 {
          // GP:tx_browser_pi1|tx_org_downloadscat.title|0
        andWhere = TEXT
        andWhere {
          if {
            isTrue {
              data = GP:tx_browser_pi1|tx_org_downloadscat.title|0
            }
          }
          data        = GP:tx_browser_pi1|tx_org_downloadscat.title|0
          noTrimWrap  = |tx_org_downloadscat.uid = ||
          insertData  = 1
        }
      }
    }
  }
}