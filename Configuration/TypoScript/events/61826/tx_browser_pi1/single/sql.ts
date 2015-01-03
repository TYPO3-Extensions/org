plugin.tx_browser_pi1 {
  views {
    single {
      61826 {
        select (
          tx_org_event.title,
          tx_org_event.crdate,
          tx_org_event.uid,
          tx_org_event.bodytext,

          tx_org_event.image,
          tx_org_event.imagecaption,
          tx_org_event.imageseo,
          tx_org_event.imagewidth,
          tx_org_event.imageheight,
          tx_org_event.imageorient,
          tx_org_event.imagecols,
          tx_org_event.imageborder,
          tx_org_event.image_frames,
          tx_org_event.image_link,
          tx_org_event.image_zoom,
          tx_org_event.image_noRows,
          tx_org_event.image_effects,
          tx_org_event.image_compression,

          tx_org_event.seo_description,
          tx_org_event.seo_keywords,
          tx_org_event.teaser_subtitle,
          tx_org_event.teaser_title,
          tx_org_event.teaser_short,
          tx_org_event.tx_org_cal,

          tx_org_eventcat.title
        )
        orderBy (
          tx_org_event.title
        )
      }
    }
  }
}