plugin.tx_browser_pi1 {
  views {
    single {
      401 {
        select (
          tx_org_news.title,
          tx_org_news.crdate,
          tx_org_news.deleted,
          tx_org_news.bodytext,
          tx_org_news.datetime,

          tx_org_news.image,
          tx_org_news.imagecaption,
          tx_org_news.imageseo,
          tx_org_news.imagewidth,
          tx_org_news.imageheight,
          tx_org_news.imageorient,
          tx_org_news.imagecols,
          tx_org_news.imageborder,
          tx_org_news.image_frames,
          tx_org_news.image_link,
          tx_org_news.image_zoom,
          tx_org_news.image_noRows,
          tx_org_news.image_effects,
          tx_org_news.image_compression,

          tx_org_news.page,
          tx_org_news.seo_description,
          tx_org_news.seo_keywords,
          tx_org_news.subtitle,
          tx_org_news.teaser_title,
          tx_org_news.teaser_short,
          tx_org_news.teaser_subtitle,
          tx_org_news.type,
          tx_org_news.uid,
          tx_org_news.url,
          tx_org_newscat.title,
          tx_org_headquarters.uid,
          tx_org_staff.title,
          tx_org_staff.contact_email,
          tx_org_staff.contact_fax,
          tx_org_staff.contact_phone,
          tx_org_staff.department,
          tx_org_staff.image,
          tx_org_staff.imageseo,
          tx_org_staff.name_first,
          tx_org_staff.name_last,
          tx_org_staff.page,
          tx_org_staff.type,
          tx_org_staff.uid,
          tx_org_staff.url
        )
        orderBy (
          tx_org_news.title, tx_org_newscat.title, tx_org_staff.title
        )
        XXXfunctions.clean_up.csvTableFields (
          tx_org_news.page,
          tx_org_news.type,
          tx_org_news.url,
          tx_org_newscat.icons
)
      }
    }
  }
}