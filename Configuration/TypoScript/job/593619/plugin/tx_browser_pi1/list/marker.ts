plugin.tx_browser_pi1 {
  views {
    list {
      593619 {
        marker < plugin.tx_browser_pi1.marker
        marker {
          rss_description = TEXT
          rss_description {
            value   = Organiser – TYPO3 for the Lobbies and the Organisers: Jobs.
            lang {
              de = Organiser – TYPO3 für Lobbies und Veranstalter: Stellenangebote.
              en = Organiser – TYPO3 for the Lobbies and the Organisers: Jobs.
            }
          }
          rss_lang = TEXT
          rss_lang {
            value   = en
            lang {
              de = de
              en = en
            }
          }
          rss_title = TEXT
          rss_title {
            value   = Organiser Jobs
            lang {
              de = Organiser Stellenangebote
              en = Organiser Jobs
            }
          }
          rss_url = TEXT
          rss_url {
            typolink {
              parameter         = {$plugin.tx_browser_pi1.templates.listview.url.0.singlePid}
              forceAbsoluteUrl  = 1
              returnLast        = url
            }
          }
        }
      }
    }
  }
}