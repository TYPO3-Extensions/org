plugin.tx_browser_pi1 {
  views {
    list {
      412 = +Org: News - mini
      412 {
        name    = +Org: News - mini
        showUid = newsUid
        select (
          tx_org_news.title,
          tx_org_news.datetime,
          tx_org_news.marginal_title,
          tx_org_news.marginal_subtitle,
          tx_org_news.page,
          tx_org_news.subtitle,
          tx_org_news.teaser_title,
          tx_org_news.teaser_subtitle,
          tx_org_news.type,
          tx_org_news.url
        )
        orderBy (
          tx_org_news.datetime DESC
        )
      }
    }
  }
}