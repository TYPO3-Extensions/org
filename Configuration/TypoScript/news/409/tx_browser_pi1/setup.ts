plugin.tx_browser_pi1 {

  displayList {
    selectBox_orderBy {
      display = 0
    }
  }

  views {
    list {
      409 = +Org: News for Slick Carousel
      409 {
        name    = +Org: News for Slick Carousel
        showUid = {$plugin.tx_browser_pi1.navigation.showUid}
      }
    }
    single {
      409 = +Org: News for Slick Carousel
    }
  }
}

<INCLUDE_TYPOSCRIPT: source="FILE:EXT:org/Configuration/TypoScript/news/409/tx_browser_pi1/list/_setup.ts">
<INCLUDE_TYPOSCRIPT: source="FILE:EXT:org/Configuration/TypoScript/news/409/tx_browser_pi1/templating/_setup.ts">