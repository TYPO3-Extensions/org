  // flag
temp.tx_org_downloads.download = COA
temp.tx_org_downloads.download {
    // if is true: config.language
  if =
  if {
    isTrue < config.language
  }
    // record is default language
  10 = TEXT
  10 {
      // if tx_org_downloads.sys_language_uid is 0
    if =
    if {
      value = 0
      isGreaterThan {
        field = tx_org_downloads.sys_language_uid // sys_language_uid
      }
      negate = 1
    }
    value = Download
    XXXlang {
      de = Herunterladen
      en = Download
    }
    typolink < temp.tx_org_downloads.typolinkbutton
  }
    // record is a translation
  20 = CONTENT
  20 {
      // if tx_org_downloads.sys_language_uid isn't 0
    if =
    if {
      value = 0
      isGreaterThan {
        field = tx_org_downloads.sys_language_uid // sys_language_uid
      }
      negate = 0
    }
    table = tx_org_downloads
    select {
      selectFields = *, TRUE AS 'IgnoreGetRecordOverlay'
      pidInList = {$plugin.org.sysfolder.downloads}
        // WHERE ((uid = tx_org_downloads.uid OR l10n_parent = tx_org_downloads.uid) AND sys_language_uid = tx_org_downloads.sys_language_uid)
      where =
      where {
          // ((uid = tx_org_downloads.uid OR l10n_parent = tx_org_downloads.uid) AND sys_language_uid = tx_org_downloads.sys_language_uid)
        cObject = COA
        cObject {
            // (uid = tx_org_downloads.uid OR l10n_parent = tx_org_downloads.uid)
          10 = COA
          10 {
              // uid = tx_org_downloads.uid
            10 = TEXT
            10 {
              field = tx_org_downloads.uid
              noTrimWrap = | uid = ||
            }
              // OR l10n_parent = tx_org_downloads.uid
            20 = TEXT
            20 {
              field = tx_org_downloads.uid
              noTrimWrap = | OR l10n_parent = ||
            }
            wrap = (|)
          }
            // AND sys_language_uid = tx_org_downloads.sys_language_uid
          20 = TEXT
          20 {
            field = tx_org_downloads.sys_language_uid
            noTrimWrap = | AND sys_language_uid = ||
          }
          wrap = (|)
        }
      }
      orderBy = tx_org_downloads.sys_language_uid
    }
      // Download button
    renderObj = TEXT
    renderObj {
      value = Download
      XXXlang {
        de = Herunterladen
        en = Download
      }
      typolink < temp.tx_org_downloads.typolinkbutton
    }
  }
}