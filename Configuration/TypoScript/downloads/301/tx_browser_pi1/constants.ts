plugin.tx_browser_pi1 {
  navigation {
    showUid = downloadsUid
  }

  templates {
    listview {
      header {
        0 {
          #crop  = 24|...|1
          field = tx_org_downloads.teaser_title // tx_org_downloads.title
          title = tx_org_downloads.seo_description // tx_org_downloads.title
        }
      }
      image {
        0 {
          default   = EXT:org/Resources/Public/Images/Icons/Default/tx_org_downloads_300x200.png
          file      = tx_org_downloads.thumbnail // tx_org_downloads.documents
          height    = 137c
          #listNum   =
          path      = uploads/tx_org/
          seo       = tx_org_downloads.documentscaption // tx_org_downloads.teaser_title // tx_org_downloads.title
          width     = 137
        }
      }
      text {
        0 {
          crop  = 200|...|1
          field = tx_org_downloads.teaser_short // tx_org_downloads.bodytext
          tag   = p
        }
      }
      url {
        0 {
          #key       =
          #page      =
          record    = tx_org_downloads.uid
          showUid   = downloadsUid
          #singlePid =
          #url       =
        }
      }
    }
    singleview {
      image {
        0 {
          caption           = tx_org_downloads.documentscaption
          firstForListOnly  =
          file              = tx_org_downloads.thumbnail // tx_org_downloads.documents
          height            = tx_org_downloads.thumbnail_height // tx_org_downloads.linkicon_height
          heightDefault     = 200c
          imagecols         =
          imageorient       =
          path              = uploads/tx_org/
          seo               = tx_org_downloads.seo_description // tx_org_downloads.teaser_short // tx_org_downloads.title
          width             = tx_org_downloads.thumbnail_width // tx_org_downloads.linkicon_width
          widthDefault      = 200c
          zoom              =
        }
      }
      text {
        0 {
          bodytext  = tx_org_downloads.bodytext
          header    = tx_org_downloads.title
        }
      }
    }
  }
}