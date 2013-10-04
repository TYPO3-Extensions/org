
  ////////////////////////////////////////
  //
  // INDEX

  // plugin.caddy
  // myConst.org


  ////////////////////////////////////////
  //
  // plugin.caddy

plugin.caddy {
  db {
    table = tx_org_cal
    min   = 
    max   = 
  }
  getpost {
    uid = tx_org_cal|uid
    qty = quantity
  }
  main {
    dueDateFormat = %d. %b. %Y
  }
}
  // plugin.caddy



  ////////////////////////////////////////
  //
  // myConst.org

myConst.org {
  phrases {
    calLinkToSingle {
      de = Details und Tickets &raquo;
      en = details and tickets &raquo;
    }
  }
}
  // myConst.org