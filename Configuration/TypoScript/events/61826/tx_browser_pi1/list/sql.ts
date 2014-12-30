plugin.tx_browser_pi1 {
  views {
    list {
      61826 {
        select (
          tx_org_event.title,
          tx_org_event.crdate,
          tx_org_event.deleted,
          tx_org_event.image,
          tx_org_event.imageseo,
          tx_org_event.page,
          tx_org_event.subtitle,
          tx_org_event.teaser_title,
          tx_org_event.teaser_subtitle,
          tx_org_event.type,
          tx_org_event.url,
          tx_org_eventcat.title,
          tx_org_eventcat.icons,
          tx_org_eventcat.icon_offset_x,
          tx_org_eventcat.icon_offset_y
        )
        orderBy (
          tx_org_event.title, tx_org_eventcat.title
        )
        // Workaround: Without it i.e. the filename in tx_org_eventcat.title would get a typolink!
        csvLinkToSingleView = dummy
      }
    }
  }
}