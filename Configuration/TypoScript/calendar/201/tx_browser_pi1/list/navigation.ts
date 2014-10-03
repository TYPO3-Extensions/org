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