plugin.tx_browser_pi1 {
  jQuery {
    plugin {
      jstree {
        tablefield_01 = tx_org_eventcat.title
      }
    }
  }
  navigation {
    showUid = eventUid
  }

  templates {
    listview {
      header {
        0 {
          field   = tx_org_event.teaser_title // tx_org_event.title
        }
      }
      image {
        0 {
          default   = EXT:Resources/Public/Images/Icons/Default/tx_org_event_300x200.png
          file      = tx_org_event.image
          height    = 70c
          path      = uploads/tx_org/
          seo       = tx_org_event.imageseo
          width     = 70
        }
      }
      text {
        0 {
          crop    = 200 | ... | 1
          field   = tx_org_event.teaser_short // tx_org_event.bodytext
        }
      }
      url {
        0 {
          key       = tx_org_event.type // type
          page      = tx_org_event.page // page
          record    = tx_org_event.uid  // uid
          showUid   = eventUid
          #singlePid =
          url       = tx_org_event.url // url
        }
      }
    }
    singleview {
      image {
        0 {
          caption     = tx_org_event.imagecaption
          file        = tx_org_event.image
          height      = tx_org_event.imageheight
          imagecols   = tx_org_event.imagecols
          imageorient = tx_org_event.imageorient
          path        = uploads/tx_org/
          seo         = tx_org_event.imageseo
          width       = tx_org_event.imagewidth
        }
      }
      text {
        0 {
          header    = tx_org_event.title
          bodytext  = tx_org_event.bodytext // tx_org_event.teaser_short
        }
      }
    }
  }
}