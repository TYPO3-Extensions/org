plugin.tx_browser_pi1 {
  views {
    list {
      499 {
        marker < plugin.tx_browser_pi1.marker
        marker {
          rss_description = TEXT
          rss_description {
            value   = Organiser – TYPO3 for the Lobbies and the Organisers: News.
            lang {
              de = Organiser – TYPO3 für Lobbies und Veranstalter: Nachrichten.
              en = Organiser – TYPO3 for the Lobbies and the Organisers: News.
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
            value   = TYPO3 Organiser News
            lang {
              de = TYPO3 Organiser Nachrichten
              en = TYPO3 Organiser News
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