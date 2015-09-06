plugin.tx_browser_pi1 {
  views {
    single {
      401 {
          // 140706: empty statement: for proper comments only
        tx_org_news {
        }
          // title, mail_city
        tx_org_news =
        tx_org_news {
            // title
          title < plugin.tx_browser_pi1.displaySingle.master_templates.tableFields.imageText.0
          title {
            20 {
              0 {
                10 >
                  // header, text, cat
                10 = COA
                10 {
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
                    // staff
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
                    // bodytext
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
                    // backbutton
                  50 = TEXT
                  50 {
                    value (
                      <!-- ###AREA_FOR_AJAX_LIST_01### end -->
                      <!-- ###BACKBUTTON### begin -->
                      <p class="backbutton">
                        ###MY_SINGLEVIEWBACKBUTTON###
                      </p>
                      <!-- ###BACKBUTTON### end -->
                      <!-- ###AREA_FOR_AJAX_LIST_02### begin -->
)
                  }
                }
              }
              1 {
                10 >
                10 < plugin.tx_browser_pi1.views.single.401.tx_org_news.title.20.0.10
              }
              2 {
                10 >
                10 < plugin.tx_browser_pi1.views.single.401.tx_org_news.title.20.0.10
              }
              8 {
                10 >
                10 < plugin.tx_browser_pi1.views.single.401.tx_org_news.title.20.0.10
              }
              9 {
                10 >
                10 < plugin.tx_browser_pi1.views.single.401.tx_org_news.title.20.0.10
              }
              10 {
                10 >
                10 < plugin.tx_browser_pi1.views.single.401.tx_org_news.title.20.0.10
              }
              17 {
                10 >
                10 < plugin.tx_browser_pi1.views.single.401.tx_org_news.title.20.0.10
              }
              18 {
                10 >
                10 < plugin.tx_browser_pi1.views.single.401.tx_org_news.title.20.0.10
              }
              25 {
                10 >
                10 < plugin.tx_browser_pi1.views.single.401.tx_org_news.title.20.0.10
                20 {
                  10 {
                    split {
                      2 < .1
                    }
                  }
                }
              }
              26 {
                10 >
                10 < plugin.tx_browser_pi1.views.single.401.tx_org_news.title.20.0.10
              }
            }
          }
        }
      }
    }
  }
}

#i0077
[globalVar = GP:type = {$plugin.pdfcontroller.pages.print.typeNum}]
  plugin.tx_browser_pi1 {
    views {
      single {
        401 {
          tx_org_news {
            title {
              10 {
                key = 26
                key {
                  field >
                }
                26 {
                  10 {
                    value = <td class="image" style="width:20%;">
                  }
                  20 {
                    10 {
                      split {
                        1 {
                          10.20.10.file.width = 100
                          10.20.10.file.width.override >
                          10.20.10.layoutKey = default
                          10.20.10.layout.default.element = <img src="###SRC###" width="###WIDTH###" height="###HEIGHT###" ###PARAMS### ###ALTPARAMS### ###BORDER### ###SELFCLOSINGTAGSLASH###>
                          10.20.10.wrap = <tr><td class="image">|</td></tr>
                          10.20.20.wrap = <tr><td class="caption" style="font-size: 0.7em;">|<br /><br /></td></tr>
                          10.20.wrap = |
                        }
                        2 < .1
                        2 {
                          10 {
                            if >
                          }
                        }
                      }
                    }
                  }
                  20 {
                    wrap = <table>|</table>
                    wrap {
                      stdWrap >
                    }
                  }
                  30 {
                    value = </td>
                  }
                }
              }
              20 {
                key = 26
                key {
                  stdWrap >
                }
                26 {
                  10 {
                    28 >
                    30 >
                  }
                  wrap = <td class="content" style="width:80%;">|</td>
                }
              }
              30 {
                key = 26
                key {
                  field >
                }
              }
            }
          }
        }
      }
    }
  }
[global]
