plugin.org {

  filter {
    tx_org_cal {
      # cat=Organiser - Filter: Calendar/enable/101;      type=boolean; label=Datetime:Enable the datetime filter in the frontend.
      datetime        = 1
      # cat=Organiser - Filter: Calendar/enable/102;      type=boolean; label=Location:Enable the location filter in the frontend.
      tx_org_location = 1
      # cat=Organiser - Filter: Calendar/enable/103;      type=boolean; label=Staff:Enable the staff filter in the frontend.
      tx_org_staff    = 1
      # cat=Organiser - Filter: Calendar/enable/104;      type=boolean; label=Type:Enable the type filter in the frontend.
      tx_org_caltype  = 1
      # cat=Organiser - Filter: Calendar/enable/999;      type=user[EXT:org/lib/userfunc/class.tx_org_userfunc.php:tx_org_userfunc->promptSponsors]; label=Subsidise the TYPO3-Organiser!
      externalSponsors    = Click me!
    }
  }

}
  // plugin.org