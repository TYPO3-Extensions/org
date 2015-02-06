plugin.tx_browser_pi1 {
  views {
    list {
      593611 {
        select (
          tx_org_job.title,
          tx_org_job.mail_city,
          tx_org_job.mail_zip,
          tx_org_job.mail_lat,
          tx_org_job.mail_lon,
          tx_org_job.page,
          tx_org_job.seo_description,
          tx_org_job.seo_keywords,
          tx_org_job.teaser_title,
          tx_org_job.teaser_short,
          tx_org_job.type,
          tx_org_job.url,
          tx_org_jobcat.title,
          tx_org_jobcat.icons,
          tx_org_jobcat.icon_offset_x,
          tx_org_jobcat.icon_offset_y,
          tx_org_jobsector.title,
          tx_org_headquarters.title,
          tx_org_headquarters.image,
          tx_org_headquarters.imageseo,
        )
        orderBy (
          tx_org_job.title, tx_org_job.mail_city, tx_org_job.mail_zip, tx_org_jobcat.title, tx_org_jobsector.title, tx_org_headquarters.title
        )
        // Workaround: Without it, the filename in tx_org_headquarters.image would get a typolink!
        csvLinkToSingleView = tx_org_job.title
        functions {
          clean_up {
            csvTableFields (
              tx_org_job.mail_zip,
              tx_org_job.mail_lat,
              tx_org_job.mail_lon,
              tx_org_job.page,
              tx_org_job.seo_description,
              tx_org_job.seo_keywords,
              tx_org_job.teaser_title,
              tx_org_job.teaser_short,
              tx_org_job.type,
              tx_org_job.url,
              tx_org_jobcat.icons,
              tx_org_jobcat.icon_offset_x,
              tx_org_jobcat.icon_offset_y,
              tx_org_headquarters.image,
              tx_org_headquarters.imageseo,
              distance
)
          }
        }
      }
    }
  }
}