temp.tx_org_downloads.buttons.list = COA
temp.tx_org_downloads.buttons.list {
    // default, downloads only, shipping only
  10 = CASE
  10 {
    key {
      field = tx_org_downloads.type
    }
    default = COA
    default {
      10 = TEXT
      10 {
        value = Download
        typolink < temp.tx_org_downloads.typolink
        typolink.parameter.cObject.30.value = button tiny btn btn-primary
      }
        // shipping
      20 < plugin.tx_org_downloads.templates.form
      20 {
        10 {
          10 {
            20 {
              10 >
              //30.90.10.wrap = <button class=" button tiny btn btn-primary" role="button ">|</button>
              wrap >
            }
          }
        }
      }
    }
      // download only
    download < .default
    download {
      20 >
    }
      // shipping only
    shipping < .default
    shipping {
      10 >
    }
  }
    // details
  20 < plugin.tx_browser_pi1.displayList.master_templates.tableFields.details.0.default
  20 {
    typolink.parameter.cObject.30.value = btn btn-primary button 
  }
  wrap = <div class="###CSSGRID######CSSGRIDMEDIUM###12 ###CSSGRIDLARGE###12 text-right"><div class="buttons">|</div></div>
}