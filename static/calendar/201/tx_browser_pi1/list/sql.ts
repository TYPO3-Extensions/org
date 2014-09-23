plugin.tx_browser_pi1 {
  views {
    list {
      201 {
        select (
          tx_org_cal.title,
          tx_org_cal.subtitle,
          tx_org_cal.bodytext,
          tx_org_cal.teaser_title,
          tx_org_cal.teaser_subtitle,
          tx_org_cal.teaser_short,
          tx_org_cal.datetime,
          tx_org_cal.page,
          tx_org_cal.type,
          tx_org_cal.url,
          tx_org_caltype.title,
          tx_org_event.title,
          tx_org_event.subtitle,
          tx_org_event.teaser_short,
          tx_org_event.bodytext
        )
        orderBy (
          tx_org_cal.title, tx_org_caltype.title
        )
        // Workaround: Without it i.e. the filename in tx_org_caltype.title would get a typolink!
        csvLinkToSingleView = dummy
      }
    }
  }
}