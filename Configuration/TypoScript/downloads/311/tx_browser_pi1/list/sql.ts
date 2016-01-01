plugin.tx_browser_pi1 {
  views {
    list {
      311 {
        select (
          tx_org_downloads.title,
          tx_org_downloads.statistics_downloads_by_visits,
          tx_org_downloads.teaser_title
        )
        orderBy = tx_org_downloads.statistics_downloads_by_visits DESC, tx_org_downloads.title
      }
    }
  }
}