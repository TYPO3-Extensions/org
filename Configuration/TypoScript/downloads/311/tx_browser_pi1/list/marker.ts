plugin.tx_browser_pi1 {
  views {
    list {
      311 {
        marker < plugin.tx_browser_pi1.marker
        marker {
          my_listview_title {
            wrap = <h3><span>|</span></h3>
            value = Downloads - TOP 5
            lang {
              de = Downloads - TOP 5
              en = Downloads - TOP 5
            }
            typolink {
              parameter = {$plugin.org.pages.downloads}
              title {
                value = All Downloads
                lang {
                  de = Alle Downloads
                  en = All Downloads
                }
              }
            }
          }
          my_listview_page = TEXT
          my_listview_page {
            value   = All Downloads &raquo;
            lang {
              de = Alle Downloads &raquo;
              en = All Downloads &raquo;
            }
            wrap    = <p>|</p>
            typolink {
              parameter = {$plugin.org.pages.downloads}
              title {
                value = All Downloads
                lang {
                  de = Alle Downloads
                  en = All Downloads
                }
              }
            }
          }
        }
      }
    }
  }
}