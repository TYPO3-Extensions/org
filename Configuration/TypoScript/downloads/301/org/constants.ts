plugin.org {

  filter {
    tx_org_downloads {
      # cat=Organiser - Filter: Downloads/enable/101;     type=boolean; label=Category:Enable the category filter in the frontend.
      tx_org_downloadscat   = 1
      # cat=Organiser - Filter: Downloads/enable/102;     type=boolean; label=Media:Enable the media filter in the frontend.
      tx_org_downloadsmedia = 1
      # cat=Organiser - Filter: Downloads/enable/103;     type=boolean; label=Period:Enable the period filter in the frontend.
      datetime              = 1
      # cat=Organiser - Filter: Downloads/enable/999;      type=user[EXT:org/lib/userfunc/class.tx_org_userfunc.php:tx_org_userfunc->promptSponsors]; label=Subsidise the TYPO3-Organiser!
      externalSponsors    = Click me!
    }
  }

}