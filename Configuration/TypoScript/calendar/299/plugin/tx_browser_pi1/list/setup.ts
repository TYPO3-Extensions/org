plugin.tx_browser_pi1 {
  views {
    list {
      299 = Organiser Calender: RSS
      299 {
        // [String] Name of the view. It will displayed in the plugin/flexform
        name    = Organiser Calender: RSS
        // [String] Alias for showUid. It is optional. If you don't need it, remove the whole line.
        showUid = newsUid
      }
    }
  }
}

<INCLUDE_TYPOSCRIPT: source="FILE:EXT:org/Configuration/TypoScript/calendar/299/plugin/tx_browser_pi1/list/marker.ts">
<INCLUDE_TYPOSCRIPT: source="FILE:EXT:org/Configuration/TypoScript/calendar/299/plugin/tx_browser_pi1/list/sql.ts">
<INCLUDE_TYPOSCRIPT: source="FILE:EXT:org/Configuration/TypoScript/calendar/299/plugin/tx_browser_pi1/list/tableFields.ts">