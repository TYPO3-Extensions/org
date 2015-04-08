plugin.tx_browser_pi1 {
  views {
    list {
      299 {
        // [String] Select clause (don't confuse it with the SQL select)
        select (
          tx_org_cal.bodytext,
          tx_org_cal.datetime,
          tx_org_cal.page,
          tx_org_cal.teaser_short,
          tx_org_cal.title,
          tx_org_cal.type,
          tx_org_cal.uid,
          tx_org_cal.url
)
        andWhere (
          tx_org_cal.datetime > UNIX_TIMESTAMP()
)
        // [String] Order By clause (don't confuse it with the SQL Order By)
        orderBy (
          tx_org_cal.datetime
)
      }
    }
  }
}