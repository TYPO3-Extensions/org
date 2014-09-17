plugin.tx_browser_pi1 {
  views {
    list {
      401 {
        select (
          tx_org_news.title,
          tx_org_news.crdate,
          tx_org_news.description,
          tx_org_news.image,
          tx_org_news.imageseo,
          tx_org_news.description,
          tx_org_news.keywords,
          tx_org_news.teaser_title,
          tx_org_news.teaser_short,
          tx_org_news.type,
          tx_org_news.newspage,
          tx_org_news.newsurl,
          tx_org_newscat.title
        )
        orderBy (
          tx_org_news.title, tx_org_newscat.title
        )
        // Workaround: Without it i.e. the filename in tx_org_headquarters.image would get a typolink!
        csvLinkToSingleView = tx_org_job.title
      }
    }
  }
}