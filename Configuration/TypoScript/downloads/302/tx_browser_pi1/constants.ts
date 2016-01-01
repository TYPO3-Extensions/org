plugin.tx_browser_pi1 {
  navigation {
    showUid = downloadsUid
  }

  templates {
    listview {
      header {
        1 {
          #crop  = 24|...|1
          field = tx_org_downloadscat.title
          title = tx_org_downloadscat.imageseo // tx_org_downloadscat.title
        }
      }
      image {
        1 {
          default   = EXT:org/Resources/Public/Images/Icons/Default/tx_org_downloads_300x200.png
          file      = tx_org_downloadscat.image
          height    = 137c
          #listNum   =
          path      = uploads/tx_org/
          seo       = tx_org_downloadscat.imageseo // tx_org_downloadscat.title
          width     = 137
        }
      }
      url {
        1 {
          key       =
          page      =
          record    =
          showUid   = downloadsUid
          #singlePid =
          url       =
        }
      }
    }
  }
}