plugin.tx_browser_pi1 {
  views {
    list {
      593611 {
        htmlSnippets =
        htmlSnippets {
          marker {
            filter = TEXT
            filter {
              value (
              <div class="filter">
                ###RADIALSEARCH###
                ###TX_ORG_JOBSECTOR.TITLE###
                ###TX_ORG_JOBCAT.TITLE###
                ###TX_ORG_HEADQUARTERS.TITLE###
              </div>
)
            }
          }
          subparts {
              // Development: with ###ITEM###
            listview = TEXT
            listview {
              value (
                <div class="row">
                  <div class="columns listview listview-content listview-###MODE### listview-content-###MODE###">
                    <table###SUMMARY###>
                      ###CAPTION###
                      <!-- ###LISTHEAD### begin -->
                      <thead>
                        <tr><!-- ###LISTHEADITEM### begin -->
                          <th###CLASS###>###ITEM###</th><!-- ###LISTHEADITEM### end -->
                        </tr>
                      </thead><!-- ###LISTHEAD### end -->
                      <tbody><!-- ###LISTBODY### begin -->
                        <tr class="###CLASS###"><!-- ###LISTBODYITEM### begin -->
                          <td class="###CLASS###">###ITEM### ###SOCIALMEDIA_BOOKMARKS###</td><!-- ###LISTBODYITEM### end -->
                        </tr><!-- ###LISTBODY### end -->
                      </tbody>
                    </table>
                  </div><!-- /columns --><!-- /listview -->
                </div><!-- /row -->
)
            }
              // Production
            listview >
            listview = TEXT
            listview {
              value (
                <div class="row">
                  <div class="columns listview listview-content listview-###MODE### listview-content-###MODE###">
                    <table cellspacing="0">
                      <thead>
                        <tr>
                          <th class="td td-0 first">
                            ###MY_TX_ORG_JOB__TITLE###
                          </th>
                          <th class="td td-1 last">
                            ###MY_TX_ORG_JOB__MAIL_CITY###
                          </th>
                        </tr>
                      </thead>
                      <tbody><!-- ###LISTBODY### begin --><!-- ###LISTBODYITEM### begin -->
                        <tr class="###CLASS######TX_ORG_JOB.CRDATE###">
                          <td class="###CLASS### td-0 first">
                            ###TX_ORG_JOB.TITLE###
                          </td>
                          <td class="###CLASS### td-1 last">
                            ###TX_ORG_JOB.MAIL_CITY###
                          </td>
                        </tr><!-- ###LISTBODYITEM### end --><!-- ###LISTBODY### end -->
                      </tbody>
                    </table>
                  </div><!-- /columns --><!-- /listview -->
                </div><!-- /row -->
)
            }
          }
        }
      }
    }
  }
}