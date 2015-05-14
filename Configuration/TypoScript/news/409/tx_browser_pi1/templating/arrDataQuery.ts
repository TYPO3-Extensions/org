plugin.tx_browser_pi1 {
  plugin {
    templating {
      arrDataQuery {
        items {
          409 {
            name = Top News
            arrQuery {
              andWhere = tx_org_news.top = 1
            }
          }
        }
      }
    }
  }
}