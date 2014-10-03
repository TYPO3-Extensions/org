plugin.tx_browser_pi1 {
  views {
    list {
      593621 {
        select (
          tx_org_service.title,
          tx_org_service.crdate,
          tx_org_service.description,
          tx_org_service.image,
          tx_org_service.imageseo,
          tx_org_service.mail_country,
          tx_org_service.mail_city,
          tx_org_service.mail_lat,
          tx_org_service.mail_lon,
          tx_org_service.page,
          tx_org_service.seo_description,
          tx_org_service.seo_keywords,
          tx_org_service.teaser_title,
          tx_org_service.teaser_short,
          tx_org_service.type,
          tx_org_service.url,
          tx_org_servicecat.title,
          tx_org_servicecat.icons,
          tx_org_servicecat.icon_offset_x,
          tx_org_servicecat.icon_offset_y,
          tx_org_servicesector.title,
          tx_org_servicetargetgroup.title
        )
        orderBy (
          tx_org_service.title, tx_org_servicecat.title, tx_org_servicesector.title, tx_org_servicetargetgroup.title
        )
        // Workaround: Without it i.e. the filename in tx_org_headquarters.image would get a typolink!
        csvLinkToSingleView = tx_org_job.title
      }
    }
  }
}