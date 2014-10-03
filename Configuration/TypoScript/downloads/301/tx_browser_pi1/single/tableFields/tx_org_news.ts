plugin.tx_browser_pi1 {
  views {
    single {
      301 {
          // 140706: empty statement: for proper comments only
        tx_org_news {
        }
          // title, mail_city
        tx_org_news =
        tx_org_news {
            // image, header, text, cat
          title = COA
          title {
              // header
            20 = TEXT
            20 {
              field = tx_org_news.title
              wrap = <h1>|</h1>
            }
              // subtitle
            21 = TEXT
            21 {
              field = tx_org_news.subtitle // tx_org_news.teaser_subtitle
              wrap  = <h2>|</h2>
              required = 1
            }
              // socialbookmarks
            28 = TEXT
            28 {
              value = ###SOCIALMEDIA_BOOKMARKS###
              wrap = <div class="show-for-medium-up socialbookmarks">|</div>
            }
              // image
            29 = COA
            29 {
              if {
                isTrue {
                  field = tx_org_news.image // tx_org_headquarters.image
                }
              }
              wrap = <div class="show-for-medium-up" style="float:left;padding: 0 1rem 1rem 0;">|</div>
              10 = IMAGE
              10 {
                file {
                  import = uploads/tx_org/
                  import {
                    field   = tx_org_news.image // tx_org_headquarters.image
                    listNum = 0
                  }
                  height  = 200c
                  width   = 200c
                }
                altText = TEXT
                altText {
                  field   = tx_org_news.title // tx_org_news.teaser_title
                  stdWrap {
                    stripHtml = 1
                    htmlSpecialChars = 1
                  }
                }
                titleText < .altText
              }
            }
            30 = COA
            30 {
              10 = TEXT
              10 {
                value = By
                lang {
                  de = Von
                  en = By
                }
                noTrimWrap = || |
              }
                // title, if title (name)
              20 = TEXT
              20 {
                if {
                  isTrue {
                    field = tx_org_staff.title
                  }
                }
                field = tx_org_staff.title
              }
                // name_first name_last, if no title (name)
              30 = COA
              30 {
                if {
                  isFalse {
                    field = tx_org_staff.title
                  }
                }
                10 = TEXT
                10 {
                  field = tx_org_staff.name_first
                  noTrimWrap = || |
                  required = 1
                }
                20 = TEXT
                20 {
                  field = tx_org_staff.name_last
                }
              }
              wrap = <p class="hide-for-large-up author">|</p>
            }
            31 = COA
            31 {
              10 = TEXT
              10 {
                prepend = TEXT
                prepend {
                  field = tx_org_news.datetime
                  strftime = %d. %b. %Y
                  noTrimWrap = |<span class="date">|</span> &ndash; |
                  required = 1
                }
                field = tx_org_news.bodytext // tx_org_news.teaser_short
              }
              stdWrap {
                parseFunc < lib.parseFunc_RTE
              }
            }
          }
        }
      }
    }
  }
}