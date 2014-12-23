plugin.tx_browser_pi1 {
  views {
    list {
      501 {
        select (
          tx_org_headquarters.title,
          tx_org_headquarters.crdate,
          tx_org_headquarters.deleted,
          tx_org_headquarters.bodytext,
          tx_org_headquarters.image,
          tx_org_headquarters.imageseo,
          tx_org_headquarters.mail_address,
          tx_org_headquarters.mail_city,
          tx_org_headquarters.mail_lat,
          tx_org_headquarters.mail_lon,
          tx_org_headquarters.mail_postcode,
          tx_org_headquarters.page,
          tx_org_headquarters.teaser_short,
          tx_org_headquarters.type,
          tx_org_headquarters.uid_parent,
          tx_org_headquarters.url,
          tx_org_headquarterscat.title,
          tx_org_headquarterscat.icons,
          tx_org_headquarterscat.icon_offset_x,
          tx_org_headquarterscat.icon_offset_y
        )
        orderBy (
          tx_org_headquarters.title, tx_org_headquarterscat.title
        )
        // Workaround: Without it i.e. the filename in tx_org_headquarterscat.title would get a typolink!
        csvLinkToSingleView = dummy
      }
    }
  }
}