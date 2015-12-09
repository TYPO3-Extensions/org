  // plugin.tx_org_downloads.templates.form
  // plugin.tx_org_downloads.templates.tax



  //////////////////////////////////////
  //
  // plugin.tx_org_downloads.templates.form

plugin.tx_org_downloads.templates.form = COA
plugin.tx_org_downloads.templates.form {
    // if: even in stock
  10 = COA
  10 {
      // if: even in stock
    if =
    if {
      isTrue {
        field = tx_org_downloads.stockmanagement
      }
      negate = 1
    }
      // order form
    10 < plugin.tx_caddy_pi1.templates.html.form.order.foundation.5x.woSelect
    10 {
      20 {
        10 >
        //30.90.10.wrap = <button class=" button tiny btn btn-primary" role="button ">|</button>
        wrap >
      }
    }
  }
    // if: not even in stock
  20 = COA
  20 {
      // if: even in stock is false
    if =
    if {
      isTrue {
        field = tx_org_downloads.stockmanagement
      }
    }
      // if: amount in stock is >= 1
    10 = COA
    10 {
        // if: amount in stock is >= 1
      if =
      if {
        value = 0
        isGreaterThan {
          field = tx_org_downloads.stockquantity
        }
      }
        // order form
      10 < plugin.tx_caddy_pi1.templates.html.form.order.foundation.5x.woSelect
    }
      // if: amount in stock is < 1
    20 = COA
    20 {
        // if: amount in stock is < 1
      if =
      if {
        value = 1
        isLessThan {
          field = tx_org_downloads.stockquantity
        }
      }
        // prompt: not available
      10 = TEXT
      10 {
        data = LLL:EXT:org/Resources/Private/Language/locallang_db.xml:phrase_notInStock
        wrap = <div class="notInStock">|</div>
      }
    }
  }
}
  // plugin.tx_org_downloads.templates.form

plugin.tx_org_downloads.templates.formWiSelect < plugin.tx_org_downloads.templates.form
plugin.tx_org_downloads.templates.formWiSelect {
  10 {
    10 < plugin.tx_caddy_pi1.templates.html.form.order.foundation.5x.wiSelect
  }
  20 {
    10 {
      10 < plugin.tx_caddy_pi1.templates.html.form.order.foundation.5x.wiSelect
    }
  }
}

  //////////////////////////////////////
  //
  // plugin.tx_org_downloads.templates.tax

plugin.tx_org_downloads.templates.tax = CASE
plugin.tx_org_downloads.templates.tax {
  key {
    field = tx_org_downloads.tax
  }
    // reduced tax
  1 = TEXT
  1 {
    value = 7% VAT included
    lang {
      de = inkl. 7% MwSt.
      en = 7% VAT included
    }
  }
    // normal tax
  2 = TEXT
  2 {
    value = 19% VAT included
    lang {
      de = inkl. 19% MwSt.
      en = 19% VAT included
    }
  }
}
  // plugin.tx_org_downloads.templates.tax