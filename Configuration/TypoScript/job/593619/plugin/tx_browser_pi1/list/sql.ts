plugin.tx_browser_pi1 {
  views {
    list {
      593619 {
        // [String] Select clause (don't confuse it with the SQL select)
        select (
          tx_org_job.description,
          tx_org_job.mail_city,
          tx_org_job.mail_zip,
          tx_org_job.page,
          tx_org_job.teaser_short,
          tx_org_job.title,
          tx_org_job.type,
          tx_org_job.uid,
          tx_org_job.url
        )
        // [String] Order By clause (don't confuse it with the SQL Order By)
        orderBy (
          tx_org_job.mail_zip,
          tx_org_job.mail_city,
          tx_org_job.dateofentry DESC
        )
      }
    }
  }
}