plugin.tx_org_downloads {

  # cat=Organiser Downloads - Currency/dims/200; type=string; label= Currency symbol (e.g. &euro; or $)
  base.currencySymbol = &euro;
  # cat=Organiser Downloads - Currency/dims/210; type=string; label= Decimal symbol: e.g. , (comma) or . (dot): 1.99 $, 1,99 EUR.
  base.dec_point = ,
  # cat=Organiser Downloads - Currency/dims/220; type=string; label= Thousands separator: e.g. , (comma) or . (dot). 1,000 US-$ or 1.000 EUR
  base.thousands_sep = .
  # cat=Organiser Downloads - Currency/others/998;    type=user[EXT:org/lib/userfunc/class.tx_org_userfunc.php:tx_org_userfunc->promptExternalLinks]; label=Powered by:die-netzmacher.de
  base.externalLinks = Click me!
  # cat=Organiser Downloads - Currency/others/999;    type=user[EXT:org/lib/userfunc/class.tx_org_userfunc.php:tx_org_userfunc->promptSponsors]; label=Subsidise the TYPO3-Organiser!
  base.externalSponsors = Click me!

  # cat=Organiser Downloads - Filter/enable/101;     type=boolean; label=Datetime:Enable the datetime filter in the frontend.
  filter.datetime               = 1
  # cat=Organiser Downloads - Filter/enable/102;     type=boolean; label=Category:Enable the filter for categories in the frontend.
  filter.tx_org_downloadscat    = 1
  # cat=Organiser Downloads - Filter/enable/103;     type=boolean; label=Media:Enable the filter for media in the frontend.
  filter.tx_org_downloadsmedia  = 1
  # cat=Organiser Downloads - Filter/others/998;     type=user[EXT:org/lib/userfunc/class.tx_org_userfunc.php:tx_org_userfunc->promptExternalLinks]; label=Powered by:die-netzmacher.de
  filter.externalLinks          = Click me!
  # cat=Organiser Downloads - Filter/others/999;     type=user[EXT:org/lib/userfunc/class.tx_org_userfunc.php:tx_org_userfunc->promptSponsors]; label=Subsidise the TYPO3-Organiser!
  filter.externalSponsors       = Click me!

  # cat=Organiser Downloads - Images/dims/101; type=string; label= List view max height:Max height of the image in the list view
  images.list.maxH = 140m
  # cat=Organiser Downloads - Images/dims/102; type=string; label= List view max width:Max width of the image in the list view
  images.list.maxW = 140
  # cat=Organiser Downloads - Images/others/998;    type=user[EXT:org/lib/userfunc/class.tx_org_userfunc.php:tx_org_userfunc->promptExternalLinks]; label=Powered by:die-netzmacher.de
  images.externalLinks = Click me!
  # cat=Organiser Downloads - Images/others/999;    type=user[EXT:org/lib/userfunc/class.tx_org_userfunc.php:tx_org_userfunc->promptSponsors]; label=Subsidise the TYPO3-Organiser!
  images.externalSponsors = Click me!

  # cat=Organiser Downloads - Layout/enable/101;     type=options[in text right,at the bottom]; label= Caddy position:Position of the caddy in single views
  layout.caddy.position = at the bottom
  # cat=Organiser Downloads - Layout/enable/102;     type=boolean; label= Link to shipping costs:Recommended: Link to shipping costs in list and single views. Disable it, if you sell your items without any shipping costs.
  layout.caddy.shippingnote = 1
  # cat=Organiser Downloads - Layout/others/998;     type=user[EXT:org/lib/userfunc/class.tx_org_userfunc.php:tx_org_userfunc->promptExternalLinks]; label=Powered by:die-netzmacher.de
  layout.externalLinks = Click me!
  # cat=Organiser Downloads - Layout/others/999;     type=user[EXT:org/lib/userfunc/class.tx_org_userfunc.php:tx_org_userfunc->promptSponsors]; label=Subsidise the TYPO3-Organiser!
  layout.externalSponsors = Click me!

  # cat=Organiser Downloads - Pages/pages/301; type=integer; label= Shop / root page:Uid of the page which contains the browser plugin for the quick shop.
  pages.shop =
  # cat=Organiser Downloads - Pages/pages/302; type=integer; label= Caddy:Uid of the page with the caddy - your shopping cart
  pages.caddy =
  # cat=Organiser Downloads - Pages/pages/304; type=integer; label= Shipping:Uid of the page with the shipping terms
  pages.shipping =
  # cat=Organiser Downloads - Pages/pages/305; type=integer; label= Items:Uid of the folder which contains the quick shop items. Usually the root page.
  pages.items =
  # cat=Organiser Downloads - Pages/others/998;    type=user[EXT:org/lib/userfunc/class.tx_org_userfunc.php:tx_org_userfunc->promptExternalLinks]; label=Powered by:die-netzmacher.de
  pages.externalLinks = Click me!
  # cat=Organiser Downloads - Pages/others/999;    type=user[EXT:org/lib/userfunc/class.tx_org_userfunc.php:tx_org_userfunc->promptSponsors]; label=Subsidise the TYPO3-Organiser!
  pages.externalSponsors = Click me!
}
  // plugin.tx_org