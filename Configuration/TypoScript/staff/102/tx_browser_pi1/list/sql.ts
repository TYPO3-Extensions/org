plugin.tx_browser_pi1 {
  views {
    list {
      102 {
        select (
          tx_org_staff.name_last,
          tx_org_staff.title,
          tx_org_staff.bodytext,
          tx_org_staff.image,
          tx_org_staff.imageseo,
          tx_org_staff.name_first,
          tx_org_staff.page,
          tx_org_staff.seo_description,
          tx_org_staff.seo_keywords,
          tx_org_staff.type,
          tx_org_staff.uid,
          tx_org_staff.url,
          tx_org_staff.vita,
          tx_org_staffgroup.uid,
          tx_org_headquarters.uid
        )
        orderBy (
          tx_org_staff.name_last, tx_org_staff.title, tx_org_staffgroup.title
        )
        // Workaround: Without it i.e. the filename in tx_org_headquarters.image would get a typolink!
        csvLinkToSingleView = tx_org_job.title
      }
    }
  }
}