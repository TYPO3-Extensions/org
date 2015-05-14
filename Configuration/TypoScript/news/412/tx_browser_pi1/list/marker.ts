plugin.tx_browser_pi1 {
  views {
    list {
      412 {
        marker < plugin.tx_browser_pi1.marker
        marker {
          my_listview_title {
            wrap    = <h3 class="columns tx_browser_pi1-title-margin">|</h3>
            value   = News
            lang {
              de = Nachrichten
              en = News
            }
            typolink {
              parameter = {$plugin.org.pages.news}
              title {
                value = All News
                lang {
                  de = Nachrichten
                  en = All News
                }
              }
            }
          }
          my_listview_page = TEXT
          my_listview_page {
            value   = All units &raquo;
            lang {
              de = Alle Nachrichten &raquo;
              en = All units &raquo;
            }
            wrap    = <div class="linkToList">|</div>
            typolink {
              parameter = {$plugin.org.pages.news}
              title {
                value = All units
                lang {
                  de = Alle Nachrichten
                  en = All Units
                }
              }
            }
          }
        }
      }
    }
  }
}