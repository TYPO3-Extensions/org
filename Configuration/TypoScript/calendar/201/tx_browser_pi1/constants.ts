
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
      provider = GoogleMaps
    }
    design {
      height  = 210
      imgPath = typo3conf/ext/browser/res/js/map/themes/red/
      path {
        categoryIcon  = uploads/tx_org/
      }
      width   = 720
    }
    icon {
      listNum {
        categoryIconMap       = 0
        categoryIconMapSingle = 0
      }
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
    lon = tx_org_location.mail_lon
  }
  templates {
    listview {
      header {
        0 {
          field   = tx_org_cal.subtitle // tx_org_cal.title
        }
      }
      image {
        0 {
          default   = EXT:org/res/icons/defaults/tx_org_cal_300x200.gif
          file      = tx_org_cal.image
          height    = 90c
          path      = uploads/tx_org/
          seo       = tx_org_cal.imageseo
          width     = 220c
        }
        1 {
          default   = EXT:org/res/icons/defaults/tx_org_news_300x200.gif
          file      = tx_org_news.image
          #height    =
          #listNum   =
          path      = uploads/tx_org/
          seo       = tx_org_news.imageseo
          #width     =
        }
        2 {
          default   = EXT:org/res/icons/defaults/tx_org_cal_300x200.gif
          file      = tx_org_cal.image
          #height    =
          #listNum   =
          path      = uploads/tx_org/
          seo       = tx_org_cal.imageseo
          #width     =
        }
      }
      text {
        0 {
          crop    = 200|...|1
          field   = tx_org_cal.teaser_short // tx_org_cal.bodytext
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
        1 {
          key       = type
          page      = page
          record    = uid
          showUid   = newsUid
          #singlePid =
          url       = url
        }
        2 {
          key       = type
          page      = page
          record    = uid
          showUid   = locationUid
          #singlePid =
          url       = url
        }
      }
    }
    singleview {
      image {
        0 {
          default   = EXT:org/res/icons/defaults/tx_org_cal_300x200.gif
          file      = tx_org_cal.image
          #height    =
          #layoutKey = picture
          #listNum   =
          path      = uploads/tx_org/
          seo       = tx_org_cal.imageseo // tx_org_cal.imagecaption
          #width     =
        }
      }
    }
  }
}

[globalVar = GP:tx_browser_pi1|calendarUid > 0]
  plugin.tx_browser_pi1 {
    map {
      design {
        height  = 200
        width   = 303
      }
      zoomLevel {
        mode  = fixed
        start = 4
      }
    }
  }
[global]