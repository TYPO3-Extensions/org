plugin.tx_browser_pi1 {
  marker {
    my_singleviewbackbutton {
      30 {
        data = LLL:EXT:org/Resources/Private/Language/locallang_db.xml:url_phrase.staffall
        XXXvalue = All people
        XXXlang {
          de = Alle Personen
          en = All people
        }
        typolink {
          parameter = {$plugin.org.pages.staff}
        }
      }
    }
  }
}