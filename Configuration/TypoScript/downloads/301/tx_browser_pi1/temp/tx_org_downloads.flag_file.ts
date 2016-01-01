temp.tx_org_downloads.flag_file = COA
temp.tx_org_downloads.flag_file {
    // path
  10 = TEXT
  10 {
    value = {$plugin.org.icon.flags.path}
  }
    // file
  20 = COA
  20 {
    10 = COA
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
    }
    20 = CONTENT
    20 {
        // if tx_org_downloads.sys_language_uid is 0
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
      renderObj = TEXT
      renderObj {
        field = flag
      }
    }
  }
    // extension
  30 = TEXT
  30 {
    value = {$plugin.org.icon.flags.extension}
    wrap = .|
  }
}