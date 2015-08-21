plugin.tx_browser_pi1 {
  templates {
    listview {
      header {
        6 {
          crop  = 24|...|1
          field = tx_org_news.marginal_title // tx_org_news.teaser_title // tx_org_news.title
          tag   = div
        }
      }
      image {
        6 {
          default   = EXT:org/Resources/Public/Images/Icons/Default/tx_org_news_300x200.png
          file      = tx_org_news.image
          height    = 160c
          #listNum   =
          path      = uploads/tx_org/
          seo       = tx_org_news.imageseo
          width     = 160
        }
      }
      text {
        6 {
          crop  = 100|...|1
          field = tx_org_news.marginal_subtitle // tx_org_news.teaser_subtitle // tx_org_news.subtitle // tx_org_news.marginal_short // tx_org_news.teaser_short // tx_org_news.bodytext
          tag   = p
        }
      }
    }
  }
}