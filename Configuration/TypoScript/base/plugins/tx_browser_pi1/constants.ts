plugin.tx_browser_pi1 {
  templates {
    listview {
      header {
        1 {
          field   = tx_org_staff.name_last
          tag     = h4
        }
        2 {
          field   = tx_org_headquarters.marginal_title // tx_org_headquarters.teaser_title // tx_org_headquarters.title
          tag     = h4
        }
        3 {
          field   = tx_org_news.marginal_title // tx_org_news.teaser_title // tx_org_news.title
          tag     = h4
        }
        4 {
          field   = tx_org_location.teaser_title // tx_org_location.title
          tag     = h4
        }
        5 {
          field   = tx_org_cal.marginal_title // tx_org_cal.teaser_title // tx_org_cal.title
          tag     = h4
        }
        6 {
          field   = tx_org_event.teaser_title // tx_org_event.title
          tag     = h4
        }
      }
      image {
        1 {
          default   = EXT:org/Resources/Public/Images/Icons/Default/tx_org_staff_300x200.png
          file      = tx_org_staff.image
          height    = 56c
          path      = uploads/tx_org/
          seo       = tx_org_staff.imageseo
          width     = 56
        }
        2 {
          default   = EXT:org/Resources/Public/Images/Icons/Default/tx_org_headquarters_300x200.png
          file      = tx_org_headquarters.image
          height    = 90c
          path      = uploads/tx_org/
          seo       = tx_org_headquarters.imageseo
          width     = 220
        }
        3 {
          default   = EXT:org/Resources/Public/Images/Icons/Default/tx_org_news_300x200.png
          file      = tx_org_news.image
          height    = 90c
          path      = uploads/tx_org/
          seo       = tx_org_news.imageseo
          width     = 220
        }
        4 {
          default   = EXT:org/Resources/Public/Images/Icons/Default/tx_org_location_300x200.png
          file      = tx_org_location.image
          height    = 90c
          path      = uploads/tx_org/
          seo       = tx_org_location.imageseo
          width     = 220
        }
        5 {
          default   = EXT:org/Resources/Public/Images/Icons/Default/tx_org_cal_300x200.png
          file      = tx_org_cal.image
          height    = 90c
          path      = uploads/tx_org/
          seo       = tx_org_cal.imageseo
          width     = 220
        }
        6 {
          default   = EXT:org/Resources/Public/Images/Icons/Default/tx_org_event_300x200.png
          file      = tx_org_event.image
          height    = 90c
          path      = uploads/tx_org/
          seo       = tx_org_event.imageseo
          width     = 220
        }
      }
      text {
        1 {
          field   = tx_org_staff.bodytext // tx_org_staff.vita
        }
        2 {
          field   = tx_org_headquarters.teaser_short // tx_org_headquarters.bodytext
        }
        3 {
          //field   = tx_org_news.marginal_short // tx_org_news.teaser_short // tx_org_news.bodytext
          field   = tx_org_news.marginal_subtitle // tx_org_news.teaser_subtitle // tx_org_news.subtitle
        }
        4 {
          field   = tx_org_cal.teaser_short // tx_org_location.bodytext
        }
        5 {
          field   = tx_org_cal.teaser_short // tx_org_cal.bodytext
        }
        6 {
          field   = tx_org_event.teaser_short // tx_org_event.bodytext
        }
      }
      url {
        1 {
          key       = tx_org_staff.type // type
          page      = tx_org_staff.page // page
          record    = tx_org_staff.uid // uid
          showUid   = staffUid
          #singlePid =
          url       = tx_org_staff.url // url
        }
        2 {
          key       = tx_org_headquarters.type // type
          page      = tx_org_headquarters.page // page
          record    = tx_org_headquarters.uid // uid
          showUid   = headquartersUid
          #singlePid =
          url       = tx_org_headquarters.url // url
        }
        3 {
          key       = tx_org_news.type // type
          page      = tx_org_news.page // page
          record    = tx_org_news.uid // uid
          showUid   = newsUid
          #singlePid =
          url       = tx_org_news.url // url
        }
        4 {
          key       = tx_org_location.type // type
          page      = tx_org_location.page // page
          record    = tx_org_location.uid // uid
          showUid   = locationUid
          #singlePid =
          url       = tx_org_location.url // url
        }
        5 {
          key       = tx_org_cal.type // type
          page      = tx_org_cal.page // page
          record    = tx_org_cal.uid // uid
          showUid   = calendarUid
          #singlePid =
          url       = tx_org_cal.url // url
        }
        6 {
          key       = tx_org_event.type // type
          page      = tx_org_event.page // page
          record    = tx_org_event.uid // uid
          showUid   = eventUid
          #singlePid =
          url       = tx_org_event.url // url
        }
      }
    }
  }
}