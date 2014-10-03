plugin.tx_browser_pi1 {
  views {
    list {
      60527 {
        select (
          tx_org_job.title,
          tx_org_job.dateofentry,
          tx_org_job.description,
          tx_org_job.mail_city,
          tx_org_job.newsletter,
          tx_org_job.page,
          tx_org_job.teaser_title,
          tx_org_job.teaser_short,
          tx_org_job.type,
          tx_org_job.url,
          tx_org_jobcat.title,
          tx_org_jobsector.title,
          tx_org_headquarters.title
        )
        andWhere = tx_org_job.newsletter = 1
        orderBy (
          tx_org_job.title, tx_org_job.mail_city, tx_org_jobcat.title, tx_org_jobsector.title, tx_org_headquarters.title
        )
        // Workaround: Without it, tx_org_headquarters would get a typolink among others
        csvLinkToSingleView = tx_org_job.title
      }
    }
  }
}