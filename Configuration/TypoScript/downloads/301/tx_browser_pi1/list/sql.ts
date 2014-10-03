plugin.tx_browser_pi1 {
  views {
    list {
      301 {
        select (
          tx_org_news.title,
          tx_org_news.crdate,
          tx_org_news.bodytext,
          tx_org_news.datetime,
          tx_org_news.image,
          tx_org_news.imageseo,
          tx_org_news.page,
          tx_org_news.seo_description,
          tx_org_news.seo_keywords,
          tx_org_news.subtitle,
          tx_org_news.teaser_title,
          tx_org_news.teaser_short,
          tx_org_news.teaser_subtitle,
          tx_org_news.type,
          tx_org_news.url,
          tx_org_newscat.title
        )
        orderBy (
          tx_org_news.datetime DESC, tx_org_newscat.title
        )
        // Workaround: Without it i.e. the filename in tx_org_headquarters.image would get a typolink!
        csvLinkToSingleView = tx_org_job.title
      }
    }
  }
}