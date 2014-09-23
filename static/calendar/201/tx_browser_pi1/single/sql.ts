plugin.tx_browser_pi1 {
  views {
    single {
      201 {
        select (
          tx_org_cal.title,
          tx_org_cal.crdate,
          tx_org_cal.uid,
          tx_org_cal.bodytext,
          tx_org_cal.mail_postcode,
          tx_org_cal.mail_city,
          tx_org_cal.mail_address,
          tx_org_cal.mail_url,
          tx_org_cal.mail_lat,
          tx_org_cal.mail_lon,
          tx_org_cal.postbox_postbox,
          tx_org_cal.postbox_postcode,
          tx_org_cal.postbox_city,
          tx_org_cal.telephone,
          tx_org_cal.fax,
          tx_org_cal.email,

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

          tx_org_caltype.title,
          tx_org_caltype.icons,

          tx_org_cal.page,
          tx_org_cal.type,
          tx_org_cal.url,
          tx_org_news.uid,
          tx_org_staff.uid
        )
        orderBy (
          tx_org_cal.title, tx_org_caltype.title, tx_org_news.date DESC,
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