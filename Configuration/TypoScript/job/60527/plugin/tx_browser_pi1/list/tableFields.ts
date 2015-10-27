plugin.tx_browser_pi1 {
  views {
    list {
      60527 {
        tx_org_job {
            // header, data,  categories, text
          title = COA
          title {
              // header
            10 < plugin.tx_browser_pi1.displayList.master_templates.tableFields.header.0
            //10.default.wrap = |
              // city, headquarter, date of entry
            20 = COA
            20 {
              wrap = <div class="data">|</div>
                // city
              10 = COA
              10 {
                if {
                  isTrue {
                    field = tx_org_job.mail_city
                  }
                }
                wrap = <span class="city">|</span>
                  // label
                10 = TEXT
                10 {
                  data = LLL:EXT:org/Resources/Private/Language/tx_org_job.xml:tx_org_job.mail_city
                  noTrimWrap = |<span class="label">|</span> |
                }
                  // value
                20 = TEXT
                20 {
                  field = tx_org_job.mail_city
                  noTrimWrap = |<span class="value">|</span> |
                }
              }
                // headquarter
              20 = COA
              20 {
                if {
                  isTrue {
                    field = tx_org_headquarters.title
                  }
                }
                wrap = <span class="dateofentry">|</span>
                  // label
                10 = TEXT
                10 {
                  data = LLL:EXT:org/Resources/Private/Language/tx_org_job.xml:tx_org_job.tx_org_headquarters
                  noTrimWrap = | <span class="label">|</span> |
                }
                  // value
                20 = TEXT
                20 {
                  field = tx_org_headquarters.title
                  noTrimWrap = |<span class="value">|</span> |
                }
              }
                // date of entry
              30 = COA
              30 {
                if {
                  isTrue {
                    field = tx_org_job.dateofentry
                  }
                }
                wrap = <span class="dateofentry">|</span>
                  // label
                10 = TEXT
                10 {
                  data = LLL:EXT:org/Resources/Private/Language/tx_org_job.xml:tx_org_job.dateofentry
                  noTrimWrap = | <span class="label">|</span> |
                }
                  // value
                20 = TEXT
                20 {
                  field = tx_org_job.dateofentry
                    // PHP strftime: i.e  %a, %d. %b: Mi, 24. Mär (it is localised)
                  strftime = %d. %B %Y
                  noTrimWrap = |<span class="value">|</span> |
                }
              }
            }
              // text
            30 < plugin.tx_browser_pi1.displayList.master_templates.tableFields.text.0
          }
        }
      }
    }
  }
}