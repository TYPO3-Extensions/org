plugin.tx_browser_pi1 {
  templates {
    listview {
      header {
        0 {
          field = tx_org_news.marginal_title // tx_org_news.teaser_title // tx_org_news.title
        }
      }
      text {
        0 {
          crop = 200|...|1
          field = tx_org_news.marginal_subtitle // tx_org_news.teaser_subtitle // tx_org_news.subtitle // tx_org_news.marginal_short // tx_org_news.teaser_short // tx_org_news.bodytext
        }
      }
    }
  }
}