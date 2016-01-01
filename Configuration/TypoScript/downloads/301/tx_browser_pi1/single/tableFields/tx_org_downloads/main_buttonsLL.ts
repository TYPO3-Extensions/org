plugin.tx_browser_pi1 {
  views {
    single {
      301 {
        tx_org_downloads {
          title {
            30 {
              30 >
                // 140706: empty statement: for proper comments only
              30 {
              }
                // buttonsLL: buttons for other localised documents: flag, download, shipping
                // form: download, caddy
              30 = COA
              30 {
                  // if.isTrue $plugin.org.icon.flags.enabled
                if =
                if {
                  isTrue = {$plugin.org.icon.flags.enabled}
                }
                20 = CONTENT
                20 {
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
                          // AND sys_language_uid != tx_org_downloads.sys_language_uid
                        20 = TEXT
                        20 {
                          field = tx_org_downloads.sys_language_uid
                          noTrimWrap = | AND sys_language_uid != ||
                        }
                        wrap = (|)
                      }
                    }
                    orderBy = tx_org_downloads.sys_language_uid
                  }
                  renderObj = COA
                  renderObj {
                      // default, downloads only, shipping only
                    10 = CASE
                    10 {
                      key {
                        field = tx_org_downloads.type
                      }
                        // flag, download, shipping
                      default = COA
                      default {
                          // flag
                        10 < temp.tx_org_downloads.flag
                          // download
                        20 = TEXT
                        20 {
                          value = Download
                          typolink < temp.tx_org_downloads.typolinkbutton
                        }
                          // shipping
                        30 < plugin.tx_caddy_pi1.templates.html.form.order
                      }
                        // download only
                      download < .default
                      download {
                        30 >
                      }
                        // shipping only
                      shipping < .default
                      shipping {
                        20 >
                      }
                    }
                    wrap = <div class="buttons text-right">|</div>
                  }
                }
                wrap = <div class="buttons buttonsLL text-right">|</div>
              }
            }
          }
        }
      }
    }
  }
}