plugin.tx_browser_pi1 {
  views {
    list {
      301 {
        tx_org_downloads {
            // text, bookmarks; image
          title = COA
          title {
              // image
            10 = COA
            10 {
                // image
              10 < plugin.tx_browser_pi1.displayList.master_templates.tableFields.image.0
              wrap = <div class="show-for-large-up columns small-12 medium-12 large-2">|</div>
            }
              // text: teaser_title, teaser_subtitle, teaser_short, bookmarks
            20 = COA
            20 {
                // socialmedia_bookmarks
              10 = TEXT
              10 {
                value = ###SOCIALMEDIA_BOOKMARKS###
                //wrap = <div class="row"><div class="columns">|</div></div>
                wrap = <div class="show-for-large-up" style="float:right;">|</div>
              }
                // teaser_title
              20 < plugin.tx_browser_pi1.displayList.master_templates.tableFields.header.0.default
                // teaser_subtitle
              30 = TEXT
              30 {
                field = tx_org_downloads.teaser_subtitle // tx_org_downloads.subtitle
                wrap  = <h3>|</h3>
                crop  = 40|...|1
                required = 1
              }
                // teaser_short
              40 = COA
              40 {
                wrap = <p>|</p>
                  // teaser_short
                10 < plugin.tx_browser_pi1.displayList.master_templates.tableFields.text.0.default.10
                10 {
                  prepend = TEXT
                  prepend {
                    field = tx_org_downloads.datetime
                    strftime = %Y
                    noTrimWrap = |<span class="date">|</span> &ndash; |
                    required = 1
                  }
                }
                  // link to detail view
                20 = CASE
                20 {
                  key {
                    field = tx_org_downloads.type
                  }
                  default = COA
                  default {
                      // download: label, icon
                    10 = COA
                    10 {
                        // label: amount of downloads
                      10 = COA
                      10 {
                          // if value = 1
                        10 = TEXT
                        10 {
                          if {
                            value  = 1
                            equals {
                              field = tx_org_downloads.statistics_downloads_by_visits
                            }
                          }
                          field = tx_org_downloads.statistics_downloads_by_visits
                          stdWrap {
                            append = TEXT
                            append {
                              value = Download
                              lang {
                                de = Download
                                en = Download
                              }
                              noTrimWrap = | ||
                            }
                          }
                        }
                          // if value != 1
                        20 = TEXT
                        20 {
                          if {
                            value  = 1
                            equals {
                              field = tx_org_downloads.statistics_downloads_by_visits
                            }
                            negate = 1
                          }
                          field = tx_org_downloads.statistics_downloads_by_visits
                          stdWrap {
                            append = TEXT
                            append {
                              value = Downloads
                              lang {
                                de = Downloads
                                en = Downloads
                              }
                              noTrimWrap = | ||
                            }
                          }
                        }
                        noTrimWrap = || |
                      }
                        // icon
                      20 = IMAGE
                      20 {
                        file = {$plugin.org.icon.download}
                        altText {
                          stdWrap {
                            value = Download
                            lang {
                              de = Herunterladen
                              en = Download
                            }
                          }
                        }
                        titleText < .altText
                        imageLinkWrap = 1
                        imageLinkWrap {
                          enable = 1
                          typolink < plugin.tx_browser_pi1.displayList.master_templates.tableFields.typolinks.0.default
                        }
                        stdWrap {
                          noTrimWrap = || |
                        }
                      }
                    }
                      // shipping
                    20 = IMAGE
                    20 {
                      file = {$plugin.org.icon.shipping}
                      altText {
                        stdWrap {
                          value = Order
                          lang {
                            de = Bestellen
                            en = Order
                          }
                        }
                      }
                      titleText < .altText
                      imageLinkWrap = 1
                      imageLinkWrap {
                        enable = 1
                        typolink < plugin.tx_browser_pi1.displayList.master_templates.tableFields.typolinks.0.default
                      }
                      stdWrap {
                        noTrimWrap = || |
                      }
                    }
                      // details link
                    30 < plugin.tx_browser_pi1.displayList.master_templates.tableFields.details.0.default
                  }
                  download < .default
                  download {
                    20 >
                  }
                  shipping < .default
                  shipping {
                    10 >
                  }
                  stdWrap {
                    noTrimWrap = |<span class="more" style="float:right;">|</span>|
                  }
                }
              }
              wrap = <div class="columns">|</div>
            }
            //wrap = <div class="row">|</div>
          }
        }
      }
    }
  }
}