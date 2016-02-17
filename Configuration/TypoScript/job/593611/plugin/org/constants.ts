plugin.org {

  filter {
    tx_org_job {
      # cat=Organiser - Filter: Jobs/enable/101;      type=boolean; label=Activity:Enable the activity filter in the frontend.
      tx_org_jobcat       = 1
      # cat=Organiser - Filter: Jobs/enable/102;      type=boolean; label=Companies:Enable the company filter in the frontend.
      tx_org_headquarters = 1
      # cat=Organiser - Filter: Jobs/enable/103;      type=boolean; label=Sectors:Enable the sectors filter in the frontend.
      tx_org_jobsector    = 1
      # cat=Organiser - Filter: Jobs/enable/999;      type=user[EXT:org/lib/userfunc/class.tx_org_userfunc.php:tx_org_userfunc->promptSponsors]; label=Subsidise the TYPO3-Organiser!
      externalSponsors    = Click me!
    }
  }

  frontendediting {
    tx_org_job {
      # cat=Organiser - Frontend Editing: Jobs/enable/101;      type=string; label=type=string; label= allowed:List of fields, which are allowed for editing
      allowed   = applicationaddress, applicationurl, dateofentry, description, documents, documents_from_path, documentscaption, documentslayout, documentssize, image, image_compression, image_effects, image_frames, image_link, image_noRows, image_zoom, imageborder, imagecaption, imagecaption_position, imagecols, imageheight, imageorient, imageseo, imagewidth, lengthoftime, mail_address, mail_city, mail_country, mail_lat, mail_lon, mail_street, mail_zip, marginal_short, marginal_title, newsletter, onlineapplication, quantity, reference_number, seo_description, seo_keywords, specification, teaser_short, teaser_title, title, tx_org_headquarters, tx_org_jobcat, tx_org_jobsector, tx_org_jobworkinghours, tx_org_staff, type, url
      # cat=Organiser - Frontend Editing: Jobs/enable/999;      type=user[EXT:org/lib/userfunc/class.tx_org_userfunc.php:tx_org_userfunc->promptSponsors]; label=Subsidise the TYPO3-Organiser!
      externalSponsors    = Click me!
    }
  }

  # cat=Organiser - jobs/200/100; type=string; label= Blackout e-mail:contractor e-mail. In case of a missing e-mail for the current job, this e-mail is used.
  tx_org_jobs.contractoremail =
}
  // plugin.org