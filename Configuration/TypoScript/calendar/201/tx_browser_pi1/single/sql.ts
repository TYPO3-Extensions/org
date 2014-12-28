plugin.tx_browser_pi1 {
  views {
    single {
      201 {
        select (
          tx_org_cal.title,
          tx_org_cal.crdate,
          tx_org_cal.bodytext,
          tx_org_cal.datetime,
          tx_org_cal.deleted,
          tx_org_cal.image,
          tx_org_cal.imagecaption,
          tx_org_cal.imageseo,
          tx_org_cal.imagewidth,
          tx_org_cal.imageheight,
          tx_org_cal.imageorient,
          tx_org_cal.imagecols,
          tx_org_cal.imageborder,
          tx_org_cal.image_frames,
          tx_org_cal.image_link,
          tx_org_cal.image_zoom,
          tx_org_cal.image_noRows,
          tx_org_cal.image_effects,
          tx_org_cal.image_compression,
          tx_org_cal.seo_description,
          tx_org_cal.seo_keywords,
          tx_org_cal.subtitle,
          tx_org_cal.teaser_short,
          tx_org_cal.type,
          tx_org_cal.uid,

          tx_org_calentrance.uid,

          tx_org_caltype.title,
          tx_org_caltype.icons,
          tx_org_caltype.icon_offset_x,
          tx_org_caltype.icon_offset_y,

          tx_org_event.title,
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
          tx_org_event.subtitle,
          tx_org_event.teaser_title,
          tx_org_event.teaser_subtitle,
          tx_org_event.teaser_short,

          tx_org_location.title,
          tx_org_location.uid,
          tx_org_location.mail_city,
          tx_org_location.mail_lat,
          tx_org_location.mail_lon,
          tx_org_location.mail_postcode,
          tx_org_location.mail_street,
          tx_org_location.mail_url
        )
        orderBy (
          tx_org_cal.title, tx_org_caltype
        )
        functions.clean_up.csvTableFields (
          tx_org_cal.page,
          tx_org_cal.type,
          tx_org_cal.url,
          tx_org_caltype.icons
)
      }
    }
  }
}