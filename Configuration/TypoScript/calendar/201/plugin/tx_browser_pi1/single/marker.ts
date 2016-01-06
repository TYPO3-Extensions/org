plugin.tx_browser_pi1 {
  marker {
    my_singleviewbackbutton {
      30 {
        data = LLL:EXT:org/Resources/Private/Language/tx_org_cal.xml:tx_org_cal
        XXXvalue = Calendar
        XXXlang {
          de = Kalender
          en = Calendar
        }
        typolink {
          parameter = {$plugin.org.pages.calendar}
        }
      }
    }
  }
}