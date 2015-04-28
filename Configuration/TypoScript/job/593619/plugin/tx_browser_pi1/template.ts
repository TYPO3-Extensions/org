plugin.tx_browser_pi1 {
  template {
    extensions >
    extensions {
      tx_org_job {
        rss {
            // [String] Name of the template. It will displayed in the flexform of the plugin.
          name      = Organiser Jobs: RSS
            // [String] Path to your RSS/XML template
          file      = EXT:org/Resources/Private/Templates/RSS/job.xml
            // [String] Path to a icon. It will displayed in the flexform of the plugin.
          image     = EXT:browser/Resources/Public/Images/BackendLayouts/browser-rss.gif
            // [csv] Comma seperated list with the numbers of the correspondening views
          csvViews  = 593619
        }
      }
    }
  }
}