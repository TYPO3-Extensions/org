plugin.tx_browser_pi1 {
  views {
    list {
      201 {
          // map
        navigation =
        navigation {
            // configuration
          map =
          map < plugin.tx_browser_pi1.navigation.map
          map {
            marker {
              variables {
                system {
                  description {
                      // image
                    20 {
                        // link to tx_org_event
                      tx_org_event < plugin.tx_browser_pi1.displayList.master_templates.tableFields.image.6
                      tx_org_event {
                        default {
                          file {
                            import {
                              listNum = {$plugin.tx_browser_pi1.map.popup.image.listNum}
                            }
                            height = {$plugin.tx_browser_pi1.map.popup.image.height}
                            width = {$plugin.tx_browser_pi1.map.popup.image.width}
                          }
                          wrap = <div style="float:left;padding:0 1em 1em 0;">|</div>
                        }
                          // without any link (record is available only in list views)
                        notype < .default
                        notype {
                          imageLinkWrap >
                        }
                        page < .default
                        page {
                          imageLinkWrap {
                            typolink < plugin.tx_browser_pi1.displayList.master_templates.tableFields.typolinks.6.page
                          }
                        }
                          // link to an external website
                        url < .page
                        url {
                          imageLinkWrap {
                            typolink < plugin.tx_browser_pi1.displayList.master_templates.tableFields.typolinks.6.url
                          }
                        }
                      }
                    }
                      // header
                    30 {
                        // link to tx_org_event
                      tx_org_event < plugin.tx_browser_pi1.displayList.master_templates.tableFields.header.6
                      tx_org_event {
                        default {
                          wrap = <div class="mapPopupHeader mapPopupHeaderDefault">|</div>
                        }
                        notype {
                          wrap = <div class="mapPopupHeader mapPopupHeaderDefault">|</div>
                        }
                        page {
                          wrap = <div class="mapPopupHeader mapPopupHeaderPage">|</div>
                        }
                        url {
                          wrap = <div class="mapPopupHeader mapPopupHeaderUrl">|</div>
                        }
                      }
                    }
                      // text
                    40 {
                      default {
                        10 >
                          // datetime, location
                        10 = COA
                        10 {
                            // datetime
                          10 = TEXT
                          10 {
                            field = tx_org_cal.datetime
                            required  = 1
                            strftime {
                              stdWrap {
                                cObject = TEXT
                                cObject {
                                  value = %m/%d/%y %H:%M
                                  lang {
                                    de = %a. %d.%b.%y %H:%M
                                    en = %m/%d/%y %H:%M
                                  }
                                }
                              }
                            }
                            stdWrap {
                              stripHtml         = 1
                              htmlSpecialChars  = 0
                            }
                            noTrimWrap = ||<br />|
                            typolink < plugin.tx_browser_pi1.displayList.master_templates.tableFields.typolinks.0.default
                          }
                            // location
                          20 = TEXT
                          20 {
                            field = tx_org_location.mail_city
                            required  = 1
                            stdWrap {
                              stripHtml         = 1
                              htmlSpecialChars  = 0
                            }
                            noTrimWrap = |||
                            typolink < plugin.tx_browser_pi1.displayList.master_templates.tableFields.typolinks.0.default
                          }
                        }
                      }
                      notype {
                        10 >
                          // datetime, location
                        10 = COA
                        10 {
                            // datetime
                          10 = TEXT
                          10 {
                            field = tx_org_cal.datetime
                            required  = 1
                            strftime {
                              stdWrap {
                                cObject = TEXT
                                cObject {
                                  value = %m/%d/%y %H:%M
                                  lang {
                                    de = %a. %d.%b.%y %H:%M
                                    en = %m/%d/%y %H:%M
                                  }
                                }
                              }
                            }
                            stdWrap {
                              stripHtml         = 1
                              htmlSpecialChars  = 0
                            }
                            noTrimWrap = ||<br />|
                          }
                            // location
                          20 = TEXT
                          20 {
                            field = tx_org_location.mail_city
                            required  = 1
                            stdWrap {
                              stripHtml         = 1
                              htmlSpecialChars  = 0
                            }
                            noTrimWrap = |||
                          }
                        }
                      }
                      page {
                        10 >
                          // datetime, location
                        10 = COA
                        10 {
                            // datetime
                          10 = TEXT
                          10 {
                            field = tx_org_cal.datetime
                            required  = 1
                            strftime {
                              stdWrap {
                                cObject = TEXT
                                cObject {
                                  value = %m/%d/%y %H:%M
                                  lang {
                                    de = %a. %d.%b.%y %H:%M
                                    en = %m/%d/%y %H:%M
                                  }
                                }
                              }
                            }
                            stdWrap {
                              stripHtml         = 1
                              htmlSpecialChars  = 0
                            }
                            noTrimWrap = ||<br />|
                            typolink < plugin.tx_browser_pi1.displayList.master_templates.tableFields.typolinks.0.page
                          }
                            // location
                          20 = TEXT
                          20 {
                            field = tx_org_location.mail_city
                            required  = 1
                            stdWrap {
                              stripHtml         = 1
                              htmlSpecialChars  = 0
                            }
                            noTrimWrap = |||
                            typolink < plugin.tx_browser_pi1.displayList.master_templates.tableFields.typolinks.0.page
                          }
                        }
                      }
                      url {
                        10 >
                          // datetime, location
                        10 = COA
                        10 {
                            // datetime
                          10 = TEXT
                          10 {
                            field = tx_org_cal.datetime
                            required  = 1
                            strftime {
                              stdWrap {
                                cObject = TEXT
                                cObject {
                                  value = %m/%d/%y %H:%M
                                  lang {
                                    de = %a. %d.%b.%y %H:%M
                                    en = %m/%d/%y %H:%M
                                  }
                                }
                              }
                            }
                            stdWrap {
                              stripHtml         = 1
                              htmlSpecialChars  = 0
                            }
                            noTrimWrap = ||<br />|
                            typolink < plugin.tx_browser_pi1.displayList.master_templates.tableFields.typolinks.0.url
                          }
                            // location
                          20 = TEXT
                          20 {
                            field = tx_org_location.mail_city
                            required  = 1
                            stdWrap {
                              stripHtml         = 1
                              htmlSpecialChars  = 0
                            }
                            noTrimWrap = |||
                            typolink < plugin.tx_browser_pi1.displayList.master_templates.tableFields.typolinks.0.url
                          }
                        }
                      }
                        // link to tx_org_event
                      tx_org_event < plugin.tx_browser_pi1.displayList.master_templates.tableFields.text.6
                      tx_org_event {
                        default {
                          10 >
                            // datetime, location
                          10 = COA
                          10 {
                              // datetime
                            10 = TEXT
                            10 {
                              field = tx_org_cal.datetime
                              required  = 1
                              strftime {
                                stdWrap {
                                  cObject = TEXT
                                  cObject {
                                    value = %m/%d/%y %H:%M
                                    lang {
                                      de = %a. %d.%b.%y %H:%M
                                      en = %m/%d/%y %H:%M
                                    }
                                  }
                                }
                              }
                              stdWrap {
                                stripHtml         = 1
                                htmlSpecialChars  = 0
                              }
                              noTrimWrap = ||<br />|
                              typolink < plugin.tx_browser_pi1.displayList.master_templates.tableFields.typolinks.6.default
                            }
                              // location
                            20 = TEXT
                            20 {
                              field = tx_org_location.mail_city
                              required  = 1
                              stdWrap {
                                stripHtml         = 1
                                htmlSpecialChars  = 0
                              }
                              noTrimWrap = |||
                              typolink < plugin.tx_browser_pi1.displayList.master_templates.tableFields.typolinks.6.default
                            }
                          }
                          20 {
                            if {
                              value   = '{$plugin.tx_browser_pi1.map.openlayers.popup.behaviour}'
                              equals  = 'click'
                            }
                          }
                          wrap = <div class="mapPopupText mapPopupTextDefault">|</div>
                        }
                        notype {
                          10 >
                            // datetime, location
                          10 = COA
                          10 {
                              // datetime
                            10 = TEXT
                            10 {
                              field = tx_org_cal.datetime
                              required  = 1
                              strftime {
                                stdWrap {
                                  cObject = TEXT
                                  cObject {
                                    value = %m/%d/%y %H:%M
                                    lang {
                                      de = %a. %d.%b.%y %H:%M
                                      en = %m/%d/%y %H:%M
                                    }
                                  }
                                }
                              }
                              stdWrap {
                                stripHtml         = 1
                                htmlSpecialChars  = 0
                              }
                              noTrimWrap = ||<br />|
                            }
                              // location
                            20 = TEXT
                            20 {
                              field = tx_org_location.mail_city
                              required  = 1
                              stdWrap {
                                stripHtml         = 1
                                htmlSpecialChars  = 0
                              }
                              noTrimWrap = |||
                            }
                          }
                          20 {
                            if {
                              value   = '{$plugin.tx_browser_pi1.map.openlayers.popup.behaviour}'
                              equals  = 'click'
                            }
                          }
                          wrap = <div class="mapPopupText mapPopupTextDefault">|</div>
                        }
                        page {
                          10 >
                          20 >
                            // datetime, location
                          10 = COA
                          10 {
                              // datetime
                            10 = TEXT
                            10 {
                              field = tx_org_cal.datetime
                              required  = 1
                              strftime {
                                stdWrap {
                                  cObject = TEXT
                                  cObject {
                                    value = %m/%d/%y %H:%M
                                    lang {
                                      de = %a. %d.%b.%y %H:%M
                                      en = %m/%d/%y %H:%M
                                    }
                                  }
                                }
                              }
                              stdWrap {
                                stripHtml         = 1
                                htmlSpecialChars  = 0
                              }
                              noTrimWrap = ||<br />|
                              typolink < plugin.tx_browser_pi1.displayList.master_templates.tableFields.typolinks.6.page
                            }
                              // location
                            20 = TEXT
                            20 {
                              field = tx_org_location.mail_city
                              required  = 1
                              stdWrap {
                                stripHtml         = 1
                                htmlSpecialChars  = 0
                              }
                              noTrimWrap = |||
                              typolink < plugin.tx_browser_pi1.displayList.master_templates.tableFields.typolinks.6.page
                            }
                          }
                          20 {
                            if {
                              value   = '{$plugin.tx_browser_pi1.map.openlayers.popup.behaviour}'
                              equals  = 'click'
                            }
                          }
                          wrap = <div class="mapPopupText mapPopupTextDefault">|</div>
                        }
                        url {
                          10 >
                            // datetime, location
                          10 = COA
                          10 {
                              // datetime
                            10 = TEXT
                            10 {
                              field = tx_org_cal.datetime
                              required  = 1
                              strftime {
                                stdWrap {
                                  cObject = TEXT
                                  cObject {
                                    value = %m/%d/%y %H:%M
                                    lang {
                                      de = %a. %d.%b.%y %H:%M
                                      en = %m/%d/%y %H:%M
                                    }
                                  }
                                }
                              }
                              stdWrap {
                                stripHtml         = 1
                                htmlSpecialChars  = 0
                              }
                              noTrimWrap = ||<br />|
                              XXXtypolink < plugin.tx_browser_pi1.displayList.master_templates.tableFields.typolinks.6.url
                            }
                              // location
                            20 = TEXT
                            20 {
                              field = tx_org_location.mail_city
                              required  = 1
                              stdWrap {
                                stripHtml         = 1
                                htmlSpecialChars  = 0
                              }
                              noTrimWrap = |||
                              XXXtypolink < plugin.tx_browser_pi1.displayList.master_templates.tableFields.typolinks.6.url
                            }
                          }
                          20 {
                            if {
                              value   = '{$plugin.tx_browser_pi1.map.openlayers.popup.behaviour}'
                              equals  = 'click'
                            }
                          }
                          wrap = <div class="mapPopupText mapPopupTextDefault">|</div>
                        }
                      }
                    }
                    XXXurl {
                        // link to tx_org_event
                      tx_org_event < .default
                      tx_org_event {
                        typolink {
                          parameter {
                            cObject {
                              10 {
                                10 {
                                  if {
                                    isTrue = {$plugin.org.pages.event}
                                  }
                                  value = {$plugin.org.pages.event}
                                }
                                20 {
                                  if {
                                    isFalse = {$plugin.org.pages.event}
                                  }
                                  value = {$plugin.org.pages.event}
                                }
                              }
                            }
                          }
                          additionalParams {
                            field = tx_org_event.uid
                            wrap  = &tx_browser_pi1[eventUid]=|
                          }
                        }
                      }
                    }
                  }
                  XXXurl {
                      // link to tx_org_event
                    tx_org_event < .default
                    tx_org_event {
                      typolink {
                        parameter {
                          cObject {
                            10 {
                              10 {
                                if {
                                  isTrue = {$plugin.org.pages.event}
                                }
                                value = {$plugin.org.pages.event}
                              }
                              20 {
                                if {
                                  isFalse = {$plugin.org.pages.event}
                                }
                                value = {$plugin.org.pages.event}
                              }
                            }
                          }
                        }
                        additionalParams {
                          field = tx_org_event.uid
                          wrap  = &tx_browser_pi1[eventUid]=|
                        }
                      }
                    }
                  }
                }
              }
            }
          }
        }
      }
    }
  }
}