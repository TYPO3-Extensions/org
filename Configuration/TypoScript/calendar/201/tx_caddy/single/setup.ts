plugin.tx_caddy_pi1 {
  db {
    sql >
    sql = COA
    sql {
        // SELECT
      10 = COA
      10 {
        wrap = SELECT |
          // puid: GP:tx_org_cal|uid
        10 = TEXT
        10 {
          stdWrap {
            data = GP:tx_org_cal|uid
            prioriCalc = intval
          }
          noTrimWrap = | '|' AS puid, |
        }
          // title: CONCAT ...
        20 = COA
        20 {
          wrap = CONCAT(|) AS title,
            // tx_org_cal.title
          10 = TEXT
          10 {
            value = tx_org_cal.title
            noTrimWrap = |'<strong>', |, '</strong><br />', |
          }
            // GP:tx_org_cal|datetime
          20 = TEXT
          20 {
            //value = Friday, 25. September " 2015, '01:38 Uhr
            stdWrap {
              data = GP:tx_org_cal|datetime
              split {
                  // ASCII 39: quote
                token.char = 39
                  // ASCII 32: space
                //token.char = 32
                cObjNum = 1
                1.current = 1
                1.wrap = |
              }
              htmlSpecialChars = 1
            }
            noTrimWrap = |'|<br />', |
          }
            // Label for 'ticket'
          30 = TEXT
          30 {
            value = ticket
            lang {
              de = Karte
              en = ticket
            }
            noTrimWrap = |'| ', |
          }
            // ... as title
          40 = TEXT
          40 {
            value = tx_org_calentrance.title, ' ', tx_org_calentrance.value, ' &euro;'
          }
        }
          // gross: tx_org_calentrance.value
        30 = TEXT
        30 {
          value = tx_org_calentrance.value
          noTrimWrap = | | AS gross, |
        }
          // tax: tx_org_calentrance.value
        40 = TEXT
        40 {
          value = tx_org_tax.value
          noTrimWrap = | | AS tax, |
        }
          // sku: GP:tx_org_cal|uid
        50 = TEXT
        50 {
          stdWrap {
            data = GP:tx_org_cal|uid
            htmlSpecialChars = 1
          }
          noTrimWrap = | | AS sku |
          prioriCalc = intval
        }
      }
        // FROM tx_org_cal
      20 = TEXT
      20 {
        value = tx_org_cal
        noTrimWrap = | FROM | |
      }
        // JOIN
      30 = COA
      30 {
          // LEFT JOIN tx_org_mm_all
        10 = TEXT
        10 {
          value (
            LEFT JOIN tx_org_mm_all
            ON (
                  tx_org_mm_all.uid_local       = tx_org_cal.uid
              AND tx_org_mm_all.table_local     = 'tx_org_cal')
)
          noTrimWrap = | | |
        }
          // LEFT JOIN tx_org_calentrance
        20 = COA
        20 {
          wrap = LEFT JOIN tx_org_calentrance ON (|)
            // constants
          10 = TEXT
          10 {
            value = tx_org_mm_all.uid_foreign = tx_org_calentrance.uid AND tx_org_mm_all.table_foreign = 'tx_org_calentrance'
            noTrimWrap = | | |
          }
            // GP:tx_org_calentrance|uid
          20 = TEXT
          20 {
            stdWrap {
              data = GP:tx_org_calentrance|uid
              htmlSpecialChars = 1
            }
            prioriCalc = intval
            noTrimWrap = | AND tx_org_calentrance.uid = | |
          }
            // ###ENABLE_FIELDS:TX_ORG_CALENTRANCE###
          30 = TEXT
          30 {
            value = ###ENABLE_FIELDS:TX_ORG_CALENTRANCE###
            noTrimWrap = | | |
          }
        }
          // LEFT JOIN tx_org_tax
        30 = TEXT
        30 {
          value (
            LEFT JOIN tx_org_tax
            ON (
                  tx_org_calentrance.tx_org_tax = tx_org_tax.uid
              ###ENABLE_FIELDS:TX_ORG_TAX###)
)
          noTrimWrap = | | |
        }
          // WHERE
        40 = TEXT
        40 {
          stdWrap {
            data = GP:tx_org_cal|uid
          }
          prioriCalc = intval
          noTrimWrap = | WHERE tx_org_cal.uid = | ###ENABLE_FIELDS:TX_ORG_CAL### |
        }
      }
    }
  }
  settings {
    variant {
      10 = tx_org_calentrance.uid
    }
  }
}