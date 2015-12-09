temp.tx_org_downloads.statistic = COA
temp.tx_org_downloads.statistic {
    // in case of downloads
  if =
  if {
    value = shipping
    equals {
      field = tx_org_downloads.type
    }
    negate = 1
  }
    // if 1 download exactly
  10 = TEXT
  10 {
    if {
      value  = 1
      equals {
        field = tx_org_downloads.statistics_downloads_by_visits
      }
    }
    field = tx_org_downloads.statistics_downloads_by_visits
    stdWrap {
      append = TEXT
      append {
        value = Download
        lang {
          de = Download
          en = Download
        }
        noTrimWrap = | ||
      }
    }
  }
    // if 0 or 2 downloads at least
  20 = TEXT
  20 {
    if {
      value  = 1
      equals {
        field = tx_org_downloads.statistics_downloads_by_visits
      }
      negate = 1
    }
    field = tx_org_downloads.statistics_downloads_by_visits
    stdWrap {
      append = TEXT
      append {
        value = Downloads
        lang {
          de = Downloads
          en = Downloads
        }
        noTrimWrap = | ||
      }
    }
  }
  stdWrap {
    noTrimWrap = |<span class="more" style="float:right;">|</span>|
  }
}