plugin.tx_browser_pi1 {
  views {
    list {
      499 = Organiser News: RSS
      499 {
        // [String] Name of the view. It will displayed in the plugin/flexform
        name    = Organiser News: RSS
        // [String] Alias for showUid. It is optional. If you don't need it, remove the whole line.
        showUid = newsUid
      }
    }
  }
}

<INCLUDE_TYPOSCRIPT: source="FILE:EXT:org/Configuration/TypoScript/news/499/plugin/tx_browser_pi1/list/marker.ts">
<INCLUDE_TYPOSCRIPT: source="FILE:EXT:org/Configuration/TypoScript/news/499/plugin/tx_browser_pi1/list/sql.ts">
<INCLUDE_TYPOSCRIPT: source="FILE:EXT:org/Configuration/TypoScript/news/499/plugin/tx_browser_pi1/list/tableFields.ts">