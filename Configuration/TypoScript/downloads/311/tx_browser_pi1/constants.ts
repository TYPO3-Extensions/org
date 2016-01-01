plugin.tx_browser_pi1 {
  navigation {
    showUid = downloadsUid
  }

  templates {
    listview {
      header {
        0 {
          #crop  = 24|...|1
          field = tx_org_downloads.teaser_title // tx_org_downloads.title
        }
      }
      url {
        0 {
          key       = tx_org_downloads.type
          page      = tx_org_downloads.page
          record    = tx_org_downloads.uid
          showUid   = downloadsUid
          #singlePid =
          url       = tx_org_downloads.url
        }
      }
    }
  }
}