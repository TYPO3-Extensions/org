plugin.tx_browser_pi1 {
  views {
    single {
      501 {
        select (
          tx_org_headquarters.title,
          tx_org_headquarters.crdate,
          tx_org_headquarters.uid,
          tx_org_headquarters.bodytext,
          tx_org_headquarters.mail_postcode,
          tx_org_headquarters.mail_city,
          tx_org_headquarters.mail_address,
          tx_org_headquarters.mail_url,
          tx_org_headquarters.mail_lat,
          tx_org_headquarters.mail_lon,
          tx_org_headquarters.postbox_postbox,
          tx_org_headquarters.postbox_postcode,
          tx_org_headquarters.postbox_city,
          tx_org_headquarters.telephone,
          tx_org_headquarters.fax,
          tx_org_headquarters.email,

          tx_org_headquarters.image,
          tx_org_headquarters.imagecaption,
          tx_org_headquarters.imageseo,
          tx_org_headquarters.imagewidth,
          tx_org_headquarters.imageheight,
          tx_org_headquarters.imageorient,
          tx_org_headquarters.imagecols,
          tx_org_headquarters.imageborder,
          tx_org_headquarters.image_frames,
          tx_org_headquarters.image_link,
          tx_org_headquarters.image_zoom,
          tx_org_headquarters.image_noRows,
          tx_org_headquarters.image_effects,
          tx_org_headquarters.image_compression,

          tx_org_headquarters.seo_description,
          tx_org_headquarters.seo_keywords,

          tx_org_headquarterscat.title,
          tx_org_headquarterscat.icons,

          tx_org_headquarters.page,
          tx_org_headquarters.type,
          tx_org_headquarters.url,
          tx_org_news.uid,
          tx_org_staff.uid
        )
        orderBy (
          tx_org_headquarters.title, tx_org_headquarterscat.title
        )
        functions.clean_up.csvTableFields (
          tx_org_headquarters.page,
          tx_org_headquarters.type,
          tx_org_headquarters.url,
          tx_org_headquarterscat.icons
)
      }
    }
  }
}