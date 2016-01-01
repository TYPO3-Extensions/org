plugin.org {

  filter {
    tx_org_job {
      # cat=Organiser - Filter: Jobs/enable/101;     type=boolean; label=Activity:Enable the activity filter in the frontend.
      tx_org_jobcat       = 1
      # cat=Organiser - Filter: Jobs/enable/102;     type=boolean; label=Companies:Enable the company filter in the frontend.
      tx_org_headquarters = 1
      # cat=Organiser - Filter: Jobs/enable/103;     type=boolean; label=Sectors:Enable the sectors filter in the frontend.
      tx_org_jobsector    = 1
      # cat=Organiser - Filter: Jobs/enable/999;      type=user[EXT:org/lib/userfunc/class.tx_org_userfunc.php:tx_org_userfunc->promptSponsors]; label=Subsidise the TYPO3-Organiser!
      externalSponsors    = Click me!
    }
  }

  # cat=Organiser - jobs/200/100; type=string; label= Blackout e-mail:contractor e-mail. In case of a missing e-mail for the current job, this e-mail is used.
  tx_org_jobs.contractoremail =
}
  // plugin.org