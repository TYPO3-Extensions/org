plugin.tx_browser_pi1 {
  views {
    single {
      101 {
        select (
          tx_org_staff.title,
          tx_org_staff.crdate,
          tx_org_staff.deleted,
          tx_org_staff.bodytext,
          tx_org_staff.contact_email,
          tx_org_staff.contact_fax,
          tx_org_staff.contact_phone,
          tx_org_staff.contact_skype,
          tx_org_staff.contact_url,
          tx_org_staff.department,
          tx_org_staff.image,
          tx_org_staff.imageborder,
          tx_org_staff.imagecaption,
          tx_org_staff.imagecaption_position,
          tx_org_staff.imagecols,
          tx_org_staff.imageheight,
          tx_org_staff.imageorient,
          tx_org_staff.imageseo,
          tx_org_staff.imagewidth,
          tx_org_staff.image_compression,
          tx_org_staff.image_effects,
          tx_org_staff.image_frames,
          tx_org_staff.image_link,
          tx_org_staff.image_noRows,
          tx_org_staff.image_zoom,
          tx_org_staff.name_first,
          tx_org_staff.name_last,
          tx_org_staff.page,
          tx_org_staff.prefix,
          tx_org_staff.type,
          tx_org_staff.tx_org_cal,
          tx_org_staff.uid,
          tx_org_staff.url,
          tx_org_staff.vita,
          tx_org_staffgroup.title,
          tx_org_staffgroup.uid,
          tx_org_cal.uid,
          tx_org_headquarters.title,
          tx_org_headquarters.mail_city,
          tx_org_headquarters.mail_street,
          tx_org_headquarters.mail_postcode,
          tx_org_headquarters.image,
          tx_org_headquarters.imageseo,
          tx_org_headquarters.page,
          tx_org_headquarters.type,
          tx_org_headquarters.uid,
          tx_org_headquarters.url,
          tx_org_news.uid
        )
        orderBy (
          tx_org_staff.title DESC
        )
        functions.clean_up.csvTableFields (
          tx_org_staff.page,
          tx_org_staff.type,
          tx_org_staff.url,
          tx_org_staffgroup.icons
)
      }
    }
  }
}