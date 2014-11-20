plugin.tx_browser_pi1 {
  views {
    list {
      701 {
        select (
          tx_org_location.title,
          tx_org_location.crdate,
          tx_org_location.deleted,
          tx_org_location.bodytext,
          tx_org_location.image,
          tx_org_location.imageseo,
          tx_org_location.mail_address,
          tx_org_location.mail_city,
          tx_org_location.mail_lat,
          tx_org_location.mail_lon,
          tx_org_location.mail_postcode,
          tx_org_location.page,
          tx_org_location.teaser_short,
          tx_org_location.type,
          tx_org_location.url,
          tx_org_locationcat.title,
          tx_org_locationcat.icons,
          tx_org_locationcat.icon_offset_x,
          tx_org_locationcat.icon_offset_y
        )
        orderBy (
          tx_org_location.title, tx_org_locationcat.title
        )
        // Workaround: Without it i.e. the filename in tx_org_locationcat.title would get a typolink!
        csvLinkToSingleView = dummy
      }
    }
  }
}