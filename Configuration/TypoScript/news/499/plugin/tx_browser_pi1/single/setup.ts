plugin.tx_browser_pi1 {
  views {
    single {
      499 = Organiser News: RSS
      499 {
        // [Mixed] Internal comment
        comment = This view should not be used. select value is a dummy!
        // [String] Select clause (don't confuse it with the SQL select)
        select  = tx_org_news.title
      }
    }
  }
}