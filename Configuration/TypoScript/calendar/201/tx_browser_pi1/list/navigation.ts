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
                      tx_org_event < .default
                      tx_org_event {
                        imageLinkWrap {
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
                      // header
                    30 {
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
                                  value = %m/%d/%y
                                  lang {
                                    de = %a. %d.%b.%y
                                    en = %m/%d/%y
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
                                  value = %m/%d/%y
                                  lang {
                                    de = %a. %d.%b.%y
                                    en = %m/%d/%y
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
                                  value = %m/%d/%y
                                  lang {
                                    de = %a. %d.%b.%y
                                    en = %m/%d/%y
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
                                  value = %m/%d/%y
                                  lang {
                                    de = %a. %d.%b.%y
                                    en = %m/%d/%y
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
                      tx_org_event < .default
                      tx_org_event {
                          // details link
                        20 {
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
                  url {
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