  // flag
temp.tx_org_downloads.flag = COA
temp.tx_org_downloads.flag {
    // if is true: config.language
  if =
  if {
    isTrue < config.language
  }
  10 = COA
  10 {
      // if.isTrue {$plugin.org.icon.flags.enabled} ($plugin.org.icon.flags.enabled)
    if =
    if {
      isTrue = {$plugin.org.icon.flags.enabled}
    }
      // record is default language
    10 = IMAGE
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
        // path, file
      file =
      file {
          // path, file
        import = {$plugin.org.icon.flags.path}
        import {
            // file
          cObject = COA
          cObject {
              // name
            10 = CASE
            10 {
              key = {$plugin.org.icon.flags.default}
              default = TEXT
              default {
                value = {$plugin.org.icon.flags.default}
              }
              en = TEXT
              en {
                value = gb
              }
            }
              // extension
            20 = TEXT
            20 {
              value = {$plugin.org.icon.flags.extension}
              wrap = .|
            }
          }
        }
      }
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
        // I.e: SELECT * FROM sys_language WHERE sys_language.uid=0 AND 0 OR sys_language.uid = 1 AND sys_language.hidden=0
      table = sys_language
      select {
        pidInList = 0
        where {
          field = tx_org_downloads.sys_language_uid // sys_language_uid
          noTrimWrap = | 0 OR sys_language.uid = ||
        }
      }
        // tx_org_cal.title croped and linked
      renderObj = IMAGE
      renderObj {
          // path, file
        file =
        file {
            // path, file
          import = {$plugin.org.icon.flags.path}
          import {
              // file
            cObject = COA
            cObject {
                // name
              10 = TEXT
              10 {
                field = flag
              }
                // extension
              20 = TEXT
              20 {
                value = {$plugin.org.icon.flags.extension}
                wrap = .|
              }
            }
          }
        }
      }
    }
    wrap = <span class="languageflag">|</span>
  }
}