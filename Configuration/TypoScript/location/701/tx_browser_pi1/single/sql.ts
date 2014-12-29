plugin.tx_browser_pi1 {
  views {
    single {
      701 {
        select (
          tx_org_location.title,
          tx_org_location.crdate,
          tx_org_location.uid,
          tx_org_location.bodytext,
          tx_org_location.email,
          tx_org_location.fax,
          tx_org_location.image,
          tx_org_location.imagecaption,
          tx_org_location.imageseo,
          tx_org_location.imagewidth,
          tx_org_location.imageheight,
          tx_org_location.imageorient,
          tx_org_location.imagecols,
          tx_org_location.imageborder,
          tx_org_location.image_frames,
          tx_org_location.image_link,
          tx_org_location.image_zoom,
          tx_org_location.image_noRows,
          tx_org_location.image_effects,
          tx_org_location.image_compression,
          tx_org_location.mail_address,
          tx_org_location.mail_city,
          tx_org_location.mail_lat,
          tx_org_location.mail_lon,
          tx_org_location.mail_postcode,
          tx_org_location.mail_street,
          tx_org_location.mail_url,
          tx_org_location.page,
          tx_org_location.seo_description,
          tx_org_location.seo_keywords,
          tx_org_location.telephone,
          tx_org_location.type,
          tx_org_location.url,

          tx_org_locationcat.title,
          tx_org_locationcat.icons
        )
        orderBy (
          tx_org_location.title
        )
        functions.clean_up.csvTableFields (
          tx_org_location.page,
          tx_org_location.type,
          tx_org_location.url,
          tx_org_locationcat.icons
)
      }
    }
  }
}