plugin.tx_browser_pi1 {
  flexform {
    templating {
      arrDataQuery {
        items {
          1 {
            name = Top News
            arrQuery {
              andWhere = tx_org_news.topnews = 1
            }
          }
        }
      }
    }
  }
}