plugin.tx_browser_pi1 {
  views {
    list {
      501 {
        tx_org_headquarters {
            // placeholder: radialsearch HTML class depending on radius
          crdate < plugin.tx_radialsearch.masterTemplates.htmlClass
            // placeholder: radialsearch linear distance
          deleted < plugin.tx_radialsearch.masterTemplates.linearDistanceString
            // image, bookmarks; name, bodytext || vita
          title = COA
          title {
              // image
            10 = COA
            10 {
                // image
              10 = COA
              10 {
                10 < plugin.tx_browser_pi1.displayList.master_templates.tableFields.image.0
                wrap = <div>|</div>
              }
              wrap = <div class="show-for-large-up columns small-12 medium-12 large-4">|</div>
            }
              // bookmarks, title, subline
            20 = COA
            20 {
                // socialmedia_bookmarks
              10 = TEXT
              10 {
                value = ###SOCIALMEDIA_BOOKMARKS###
                wrap = <div style="float:right;">|</div>
              }
                // tx_org_headquarters.title
              20 < plugin.tx_browser_pi1.displayList.master_templates.tableFields.header.0
                // tx_org_headquarterscat.title
              30 = COA
              30 {
                if {
                  isTrue {
                    field = tx_org_headquarterscat.title
                  }
                }
                wrap = <div class="tx_org_headquarterscat">|</div>
                  // label
                10 = TEXT
                10 {
                  data = LLL:EXT:org/locallang_db.xml:filter_phrase.headquarterscat
                  noTrimWrap = ||: |
                }
                20 = TEXT
                20 {
                  field = tx_org_headquarterscat.title
                }
              }
                // mail_postcode, mail_city
              40 = COA
              40 {
                wrap = <div class="subline">|</div>
                  // mail_postcode
                10 = TEXT
                10 {
                  if {
                    isTrue {
                      field = tx_org_headquarters.mail_postcode
                    }
                  }
                  field = tx_org_headquarters.mail_postcode
                  noTrimWrap = || |
                }
                  // mail_city
                20 = TEXT
                20 {
                  if {
                    isTrue {
                      field = tx_org_headquarters.mail_city
                    }
                  }
                  field = tx_org_headquarters.mail_city
                  noTrimWrap = || |
                }
                  // link to the single view (record), internal page, external URL or no link (empty value)
                30 < plugin.tx_browser_pi1.displayList.master_templates.tableFields.details.0
              }
              wrap = <div class="columns small-12 medium-12 large-8">|</div>
            }
            wrap = <div class="row">|</div>
          }
        }
      }
    }
  }
}