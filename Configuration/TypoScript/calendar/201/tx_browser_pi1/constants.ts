
// plugin.tx_browser_pi1
// [globalVar = GP:tx_browser_pi1|calendarUid > 0]
//   plugin.tx_browser_pi1.map.design


plugin.tx_browser_pi1 {
  jQuery {
    plugin {
      jstree {
        tablefield_01 = tx_org_caltype.title
      }
    }
  }
  map {
    aliases {
      showUid {
        marker = calendarUid
      }
    }
    controlling {
      enabled = Map
    }
    design {
      height  = 210
      height {
        single = 200
      }
      path {
        categoryIcon  = uploads/tx_org/
      }
    }
    html {
      jss {
        toggle = 1
      }
    }
    leafletcontrolling {
      overlays = 0
    }
    marker {
      field {
        linktoSingle      = tx_org_cal.uid
        latitude          = tx_org_location.mail_lat
        longitude         = tx_org_location.mail_lon
        description       = tx_org_cal.title
        category          = tx_org_caltype.title
        categoryIcon      = tx_org_caltype.icons
        categoryOffsetX   = tx_org_caltype.icon_offset_x
        categoryOffsetY   = tx_org_caltype.icon_offset_y
      }
    }
  }
  navigation {
    showUid = calendarUid
  }
  radialsearch {
    lat = tx_org_location.mail_lat
    lon = tx_org_location.mail_lonf
  }
  templates {
    listview {
      header {
        0 {
          field   = tx_org_cal.teaser_title // tx_org_cal.title
        }
        6 {
          field   = tx_org_cal.teaser_title // tx_org_cal.title
          tag     = h2
        }
      }
      image {
        0 {
          default   = EXT:org/Resources/Public/Images/Icons/Default/tx_org_cal_300x200.png
          file      = tx_org_cal.image // tx_org_event.image
          height    = 95c
          path      = uploads/tx_org/
          seo       = tx_org_cal.imageseo // tx_org_event.imageseo
          width     = 95
        }
        6 {
          file      = tx_org_cal.image // tx_org_event.image
          height    = 95c
          path      = uploads/tx_org/
          seo       = tx_org_cal.imageseo // tx_org_event.imageseo
          width     = 95
        }
      }
      text {
        0 {
          crop    = 200|...|1
          field   = tx_org_event.teaser_short // tx_org_event.bodytext // tx_org_cal.teaser_short // tx_org_cal.bodytext
        }
        6 {
          crop    = 200|...|1
          field   = tx_org_event.teaser_short // tx_org_event.bodytext // tx_org_cal.teaser_short // tx_org_cal.bodytext
        }
      }
      url {
        0 {
          key       = tx_org_cal.type
          page      = tx_org_cal.page
          record    = tx_org_cal.uid
          showUid   = calendarUid
          #singlePid =
          url       = tx_org_cal.url
        }
        6 {
          record    = tx_org_cal.uid
          showUid   = calendarUid
          #singlePid =
        }
      }
    }
    singleview {
      image {
        0 {
          caption     = tx_org_event.imagecaption // tx_org_cal.imagecaption
          file        = tx_org_event.image // tx_org_cal.image
          height      = tx_org_event.imageheight // tx_org_cal.imageheight
          imagecols   = tx_org_event.imagecols // tx_org_cal.imagecols
          imageorient = tx_org_event.imageorient // tx_org_cal.imageorient
          path        = uploads/tx_org/
          seo         = tx_org_event.imageseo // tx_org_cal.imageseo
          width       = tx_org_event.imagewidth // tx_org_cal.imagewidth
        }
      }
    }
  }
}

[globalVar = GP:tx_browser_pi1|calendarUid > 0]
  plugin.tx_browser_pi1 {
    map {
      zoomLevel {
        mode  = fixed
        start = 10
      }
    }
  }
[global]