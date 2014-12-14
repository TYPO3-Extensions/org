plugin.tx_browser_pi1 {
  views {
    list {
      101 {
        htmlSnippets =
        htmlSnippets {
          marker {
            filter = TEXT
            filter {
              value (
              <div class="filter">
                ###TX_ORG_STAFFGROUP.TITLE###
              </div>
)
            }
          }
          subparts {
            searchform = TEXT
            searchform {
              value (
                <div class="row">
                  <div class="columns searchbox searchbox-list-###MODE###">
                    <form action="###ACTION###" method="post" >
                      <fieldset>
                        <legend>
                          ###MY_SEARCH_LEGEND###
                        </legend>
                        ###HIDDEN###
                        <input type="hidden" name="no_cache" value="1" />
                        <input type="hidden" name="tx_browser_pi1[plugin]" value="###PLUGIN###" />
                        <div class="row">
                          <div class="columns small-10 medium-7">
                            <input type="text" name="tx_browser_pi1[sword]" placeholder="###SWORD_DEFAULT###" value="###SWORD###" />
                          </div><!-- /columns -->
                        </div><!-- /row -->
                        <!-- FILTER marker will replaced by plugin.tx_browser_pi1.views.list.###MODE###.htmlSnippets.marker.filter while runtime ... -->
                        ###FILTER###
                        <div class="row">
                          <div class="columns small-10 medium-3">
                            <button class="tiny expand secondary reset" role="button" type="reset" onclick="location = '###MY_URL###'">
                              ###MY_RESET###
                            </button>
                          </div><!-- /columns -->
                          <div class="columns small-10 medium-4">
                            <!-- ###BUTTON_CSV-EXPORT### begin -->
                            <button class="tiny expand hidesubmit" role="button">
                              ###MY_CSV_EXPORT###
                            </button>
                            <!-- ###BUTTON_CSV-EXPORT### end -->
                          </div><!-- /columns -->
                          <div class="columns small-10 medium-3">
                            <button class="tiny expand hidesubmit" role="button">
                              ###MY_SEARCH###
                            </button>
                          </div><!-- /columns -->
                        </div><!-- /row -->
                      </fieldset>
                    </form>
                  </div><!-- /columns -->
                </div><!-- /row -->
)
            }
            XXXlistview = TEXT
            XXXlistview {
              value (
            <div id="c###TT_CONTENT.UID###-listview-###MODE###" class="columns listview listview-content listview-###MODE### listview-content-###MODE###">
              <!-- ###LISTBODY### begin --><!-- ###LISTBODYITEM### begin -->
              <div class="tx_org_staff tx_org_staff-record record">
                ###TX_ORG_STAFF.TITLE###
              </div>
              <div class="cleaner">&nbsp;</div><!-- ###LISTBODYITEM### end --><!-- ###LISTBODY### end -->
              </div> <!-- /listview -->
)
            }
          }
        }
      }
    }
  }
}