plugin.tx_browser_pi1 {
  templates {
    listview {
      url {
        1 {
          key       = tx_org_staff.type // type
          page      = tx_org_staff.page // page
          record    = tx_org_staff.uid // uid
          showUid   = staffUid
          #singlePid =
          url       = tx_org_staff.url // url
        }
        2 {
          key       = tx_org_headquarters.type // type
          page      = tx_org_headquarters.page // page
          record    = tx_org_headquarters.uid // uid
          showUid   = headquartersUid
          #singlePid =
          url       = tx_org_headquarters.url // url
        }
        3 {
          key       = tx_org_news.type // type
          page      = tx_org_news.page // page
          record    = tx_org_news.uid // uid
          showUid   = newsUid
          #singlePid =
          url       = tx_org_news.url // url
        }
      }
    }
  }
}