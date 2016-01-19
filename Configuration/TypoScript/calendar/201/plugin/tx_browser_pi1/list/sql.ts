plugin.tx_browser_pi1 {
  views {
    list {
      201 {
        select (
          tx_org_cal.title,
          tx_org_cal.bodytext,
          tx_org_cal.crdate,
          tx_org_cal.datetime,
          tx_org_cal.deleted,
          tx_org_cal.image,
          tx_org_cal.imageseo,
          tx_org_cal.subtitle,
          tx_org_cal.teaser_title,
          tx_org_cal.teaser_subtitle,
          tx_org_cal.teaser_short,
          tx_org_cal.marginal_title,
          tx_org_cal.marginal_subtitle,
          tx_org_cal.marginal_short,
          tx_org_cal.page,
          tx_org_cal.type,
          tx_org_cal.url,

          tx_org_caltype.title,
          tx_org_caltype.icons,
          tx_org_caltype.icon_offset_x,
          tx_org_caltype.icon_offset_y,

          tx_org_event.title,
          tx_org_event.bodytext,
          tx_org_event.image,
          tx_org_event.imageseo,
          tx_org_event.subtitle,
          tx_org_event.teaser_title,
          tx_org_event.teaser_subtitle,
          tx_org_event.teaser_short,
          tx_org_event.page,
          tx_org_event.type,
          tx_org_event.url,

          tx_org_location.title,
          tx_org_location.mail_city,
          tx_org_location.mail_lat,
          tx_org_location.mail_lon,
          tx_org_location.mail_postcode,

          tx_org_staff.title
        )
        orderBy (
          tx_org_cal.datetime
        )
        // Workaround: Without it i.e. the filename in tx_org_caltype.title would get a typolink!
        csvLinkToSingleView = dummy
      }
    }
  }
}