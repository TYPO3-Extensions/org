plugin.tx_browser_pi1 {
  views {
    list {
      411 = +Org: News - margin
      411 {
        name    = +Org: News - margin
        showUid = newsUid
        select (
          tx_org_news.title,
          tx_org_news.datetime,
          tx_org_news.marginal_title,
          tx_org_news.marginal_subtitle,
          tx_org_news.pages,
          tx_org_news.subtitle,
          tx_org_news.teaser_title,
          tx_org_news.teaser_subtitle,
          tx_org_news.uid
        )
        orderBy (
          tx_org_news.datetime DESC
        )
      }
    }
  }
}