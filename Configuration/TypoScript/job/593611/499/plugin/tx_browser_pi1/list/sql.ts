plugin.tx_browser_pi1 {
  views {
    list {
      499 {
        // [String] Select clause (don't confuse it with the SQL select)
        select (
          tx_org_news.bodytext,
          tx_org_news.page,
          tx_org_news.teaser_short,
          tx_org_news.title,
          tx_org_news.type,
          tx_org_news.uid,
          tx_org_news.url
        )
        // [String] Order By clause (don't confuse it with the SQL Order By)
        orderBy (
          tx_org_news.datetime DESC
        )
      }
    }
  }
}