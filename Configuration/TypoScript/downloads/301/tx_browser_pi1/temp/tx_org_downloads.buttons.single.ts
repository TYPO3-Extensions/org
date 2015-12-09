temp.tx_org_downloads.buttons.single = COA
temp.tx_org_downloads.buttons.single {
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
          10 >
          10 < plugin.tx_caddy_pi1.templates.html.form.order.foundation.5x.wiSelect
          XXX10 {
            20 {
              10 >
              30.90.10.wrap = <button class=" button tiny btn btn-primary" role="button ">|</button>
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
  wrap = <div class="buttons text-right">|</div>
}