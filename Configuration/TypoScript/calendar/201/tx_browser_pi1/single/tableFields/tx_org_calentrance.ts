plugin.tx_browser_pi1 {
  views {
    single {
      201 {
          // 140706: empty statement: for proper comments only
        tx_org_cal {
        }
          // crdate: placeholder for tx_org_calentrance
        tx_org_cal =
        tx_org_cal {
          crdate {
          }
            // tx_org_cal.crdate: placeholder for tx_org_calentrance
          crdate = COA
          crdate {
              // if is true tx_org_calentrance.uid
            if =
            if {
              isTrue {
                field = tx_org_calentrance.uid
              }
            }
            10 < plugin.tx_caddy_pi1.templates.html.form.order.foundation.5x.wiSelect
            10 {
                // if date isn't expired
              if =
              if {
                value {
                  data = date : U
                }
                isGreaterThan {
                  field = tx_org_cal.datetime
                }
              }
              20 {
                20 {
                    // tx_org_cal.uid
                  20 = TEXT
                  20 {
                    field = tx_org_cal.uid
                    wrap  = <input type="hidden" name="tx_org_cal[uid]" value="|" />
                  }
                    // tx_org_cal.datetime
                  30 = TEXT
                  30 {
                    field     = tx_org_cal.datetime
                    strftime  = %A, %d. %B %Y, %H:%M Uhr
                    wrap      = <input type="hidden" name="tx_org_cal[datetime]" value="|" />
                  }
                }
                30 {
                  10 {
                    wrap = <div class="small-12 large-2 columns">|</div>
                  }
                    // select: tx_org_calentrance
                  20 = COA
                  20 {
                    wrap = <div class="small-12 large-9 columns">|</div>
                      // select
                    10 = TEXT
                    10 {
                      value = <select name="tx_org_calentrance[uid]" id="tx_browser_pi1_tx_org_calentrance_uid" size="1">
                    }
                      // options
                    20 = CONTENT
                    20 {
                      table = tx_org_calentrance
                      select {
                        pidInList = {$plugin.org.sysfolder.calendar}
                        //selectFields = tx_org_calentrance.title
                        join = tx_org_mm_all ON tx_org_mm_all.uid_foreign = tx_org_calentrance.uid
                        where {
                          field = tx_org_cal.uid
                          noTrimWrap = |tx_org_mm_all.uid_local = | AND tx_org_mm_all.table_local = 'tx_org_cal' AND tx_org_mm_all.table_foreign = 'tx_org_calentrance'|
                        }
                        orderBy = tx_org_calentrance.value
                        max = 3
                      }
                        // options
                      renderObj = COA
                      renderObj {
                        20 = TEXT
                        20 {
                          field = uid
                          wrap  = <option value="|">
                        }
                        21 = TEXT
                        21 {
                          field = title
                          wrap  = |
                        }
                        22 = TEXT
                        22 {
                          field = value
                          noTrimWrap  = | (| EUR)</option>|
                        }
                      }
                    }
                      // /select
                    30 = TEXT
                    30 {
                      value = </select>
                    }
                  }
                  90 {
                    10 {
                      data >
                      value = &raquo;
                      lang {
                        de = &raquo;
                      }
                    }
                    wrap = <div class="small-12 large-1 columns">|</div>
                  }
                }
              }
            }
          }
        }
      }
    }
  }
}