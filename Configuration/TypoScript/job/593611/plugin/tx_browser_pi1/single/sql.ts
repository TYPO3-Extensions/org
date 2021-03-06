plugin.tx_browser_pi1 {
  views {
    single {
      593611 {
        select (
          tx_org_job.title,
          tx_org_job.crdate,
          tx_org_job.dateofentry,
          tx_org_job.description,

          tx_org_job.image,
          tx_org_job.imagecaption,
          tx_org_job.imageseo,
          tx_org_job.imagewidth,
          tx_org_job.imageheight,
          tx_org_job.imageorient,
          tx_org_job.imagecols,
          tx_org_job.imageborder,
          tx_org_job.image_frames,
          tx_org_job.image_link,
          tx_org_job.image_zoom,
          tx_org_job.image_noRows,
          tx_org_job.image_effects,
          tx_org_job.image_compression,

          tx_org_job.lengthoftime,
          tx_org_job.mail_city,
          tx_org_job.mail_zip,
          tx_org_job.mail_lat,
          tx_org_job.mail_lon,
          tx_org_job.onlineapplication,
          tx_org_job.page,
          tx_org_job.seo_description,
          tx_org_job.seo_keywords,
          tx_org_job.specification,
          tx_org_job.type,
          tx_org_job.url,
          tx_org_jobcat.title,
          tx_org_jobcat.icons,
          tx_org_jobcat.icon_offset_x,
          tx_org_jobcat.icon_offset_y,
          tx_org_jobsector.title,
          tx_org_jobworkinghours.title,
          tx_org_headquarters.title,
          tx_org_headquarters.mail_city,
          tx_org_headquarters.mail_street,
          tx_org_headquarters.mail_postcode,
          tx_org_headquarters.email,
          tx_org_headquarters.fax,
          tx_org_headquarters.telephone,
          tx_org_headquarters.image,
          tx_org_headquarters.imageseo,
          tx_org_headquarters.page,
          tx_org_headquarters.type,
          tx_org_headquarters.uid,
          tx_org_headquarters.url,
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
          tx_org_job.title, tx_org_jobcat.title, tx_org_jobsector.title, tx_org_jobworkinghours.title, tx_org_headquarters.title
        )
        functions.clean_up.csvTableFields (
          tx_org_job.mail_lat,
          tx_org_job.mail_lon,
          tx_org_job.page,
          tx_org_job.type,
          tx_org_job.url,
          tx_org_jobcat.icons,
          tx_org_jobcat.icon_offset_x,
          tx_org_jobcat.icon_offset_y,
)
      }
    }
  }
}