plugin.tx_browser_pi1 {
  views {
    single {
      301 {
          // 140706: empty statement: for proper comments only
        tx_org_downloads {
        }
          // title, mail_city
        tx_org_downloads =
        tx_org_downloads {
            // subtitle, title, thumbnail, text
          title = COA
          title {
              // subtitle
            10 = TEXT
            10 {
              required  = 1
              field     = tx_org_downloads.subtitle // tx_org_downloads.teaser_subtitle
              wrap      = <h2>|</h2>
            }
              // title
            20 = TEXT
            20 {
              required  = 1
              field     = tx_org_downloads.title // tx_org_downloads.teaser_title
              wrap      = <h1>|</h1>
            }
              // thumbnail: plugin.tx_browser_pi1.tt_content.uploads.20
            30 < plugin.tx_browser_pi1.tt_content.uploads.20
            30 {
              userFunc = tx_browser_cssstyledcontent->render_uploads
              userFunc {
                  // add the value of a field to another field in cObj->data
                cObjDataFieldWrapper =
                cObjDataFieldWrapper {
                    // Adds the value from tx_org_downloads.documentssize to filelink_size
                  filelink_size = tx_org_downloads.documentssize
                    // Adds the value from tx_org_downloads.documentscaption to imagecaption
                  imagecaption = tx_org_downloads.documentscaption
                    // Adds the value from tx_org_downloads.documentslayout to layout
                  layout = tx_org_downloads.documentslayout
                    // Adds the value from tx_org_downloads.tx_flipit_layout to tx_flipit_layout
                  tx_flipit_layout = tx_org_downloads.tx_flipit_layout
                    // Adds the value from tx_org_downloads.tx_flipit_quality to tx_flipit_quality
                  tx_flipit_quality = tx_org_downloads.tx_flipit_quality
                    // Adds the value from tx_org_downloads.tx_flipit_pagelist to tx_flipit_pagelist
                  tx_flipit_pagelist = tx_org_downloads.tx_flipit_pagelist
                }
              }
              field     = {$plugin.org.table.downloads}.{$plugin.org.table.downloads.field.documents}
              thumbnail = {$plugin.org.table.downloads}.{$plugin.org.table.downloads.field.thumbnail}
                // Don't outerWrap with <table> by default
//              outerWrap = <ul class="csc-uploads csc-uploads-{field:layout}">|</ul>
              itemRendering >
              itemRendering = COA
              itemRendering {
                10 = TEXT
                10 {
                  data = register:linkedIcon
                }
                wrap = <div class="csc-uploads-thumbnail csc-uploads-thumbnail-first">|</div> |*| <div class="csc-uploads-thumbnail csc-uploads-thumbnail-even">|</div> || <div class="csc-uploads-thumbnail">|</div> |*| <div class="csc-uploads-thumbnail csc-uploads-thumbnail-last">|</div>
              }
              linkProc {
                iconCObject {
                  file {
                    width = 240m
                    width {
                      field >
                      override {
                        field = tx_org_downloads.thumbnail_width
                      }
                    }
                    height = 400m
                    height {
                      override {
                        field = tx_org_downloads.thumbnail_height
                      }
                    }
                  }
                }
                  // download, download_shipping, shipping
                tx_browser_pi1 = CASE
                tx_browser_pi1 {
                  key {
                    field = tx_org_downloads.type
                  }
                  default = COA
                  default {
                      // Link with preview or application icon
                    10 = IMAGE
                    10 {
                      file {
                        import {
                          data = register : ICON_REL_PATH
                        }
                        width = 240m
                        width {
                          field >
                          override {
                            field = tx_org_downloads.thumbnail_width
                          }
                        }
                        height = 400m
                        height {
                          override {
                            field = tx_org_downloads.thumbnail_height
                          }
                        }
                      }
                      imageLinkWrap = 1
                      imageLinkWrap {
                        enable = 1
                        typolink {
                          parameter         = {$plugin.org.pages.downloads},{$plugin.tx_browser_pi1.typeNum.downloadPageObj}
                          title = TEXT
                          title {
                            field = tx_org_downloads.title
                            stdWrap {
                              stripHtml = 1
                              htmlSpecialChars = 1
                            }
                          }
                          additionalParams  = &tx_browser_pi1[plugin]={field:tt_content.uid}&tx_browser_pi1[file]=single.301.tx_org_downloads.{field:tx_org_downloads.uid}.documents.{field:key}
                          additionalParams {
                            insertData = 1
                          }
                          useCacheHash      = 1
                        }
                      }
                    }
                      // Link devider
                    20 = TEXT
                    20 {
                      value = //**//
                    }
                      // Link with label
                    30 = TEXT
                    30 {
                      data = register : filename
                      typolink {
                        parameter         = {$plugin.org.pages.downloads},{$plugin.tx_browser_pi1.typeNum.downloadPageObj}
                        title = TEXT
                        title {
                          field = tx_org_downloads.title
                          stdWrap {
                            stripHtml = 1
                            htmlSpecialChars = 1
                          }
                        }
                        additionalParams  = &tx_browser_pi1[plugin]={field:tt_content.uid}&tx_browser_pi1[file]=single.301.tx_org_downloads.{field:tx_org_downloads.uid}.documents.{field:key}
                        additionalParams.insertData = 1
                        useCacheHash      = 1
                      }
                    }
                  }
                  download_shipping < .default
                  download_shipping {
                    10 {
                      imageLinkWrap {
                        typolink {
                          title {
                            field = tx_org_downloads.title
                            stdWrap {
                              stripHtml = 1
                              htmlSpecialChars = 1
                            }
                          }
                        }
                      }
                    }
                    30 {
                      typolink {
                        title {
                          field = tx_org_downloads.title
                          stdWrap {
                            stripHtml = 1
                            htmlSpecialChars = 1
                          }
                        }
                      }
                    }
                  }
                  shipping < .default
                  shipping {
                    10 {
                      imageLinkWrap {
                        bodyTag   = <BODY style="margin:0;padding0;">
                        wrap      = <A href="javascript:close();"> | </A>
                        width     = 800m
                        height    = 600
                        title {
                          field = tx_org_downloads.title
                        }
                        JSwindow = 1
                        JSwindow {
                          newWindow = 1
                        }
                        typolink >
                      }
                    }
                    30 {
                      typolink >
                    }
                  }
                }
              }
              stdWrap {
                if {
                  isTrue {
                    stdWrap {
                      cObject = COA
                      cObject {
                        10 = TEXT
                        10 {
                          field = tx_org_downloads.documents
                        }
                        20 = TEXT
                        20 {
                          field = tx_org_downloads.documents_from_path
                        }
                        30 = TEXT
                        30 {
                          field = tx_org_downloads.thumbnail
                        }
                      }
                    }
                  }
                }
              }
            }
              // datetime, bodytext
            40 = COA
            40 {
              stdWrap.parseFunc < lib.parseFunc_RTE
                // datetime
              10 = TEXT
              10 {
                field       = tx_org_downloads.datetime
                strftime    = %d. %b. %Y
                noTrimWrap  = |<span class="datetime">| &ndash;</span> |
              }
                // bodytext
              20 = TEXT
              20 {
                field = tx_org_downloads.bodytext // tx_org_downloads.teaser_short
              }
                // Download statistics (if tx_org_downloads.type isn't shipping)
              30 = COA
              30 {
                if {
                  value = shipping
                  equals {
                    field = tx_org_downloads.type
                  }
                  negate = 1
                }
                  // <span class="statistics-downloads">...</span>
                wrap = <br /><br /><span class="statistics-downloads">|</span>

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
              }
            }
              // File link and order form: plugin.tx_browser_pi1.tt_content.uploads.20
            50 < plugin.tx_browser_pi1.tt_content.uploads.20
            50 {
              userFunc = tx_browser_cssstyledcontent->render_uploads
              userFunc {
                  // add the value of a field to another field in cObj->data
                cObjDataFieldWrapper =
                cObjDataFieldWrapper {
                    // Adds the value from tx_org_downloads.documentssize to filelink_size
                  filelink_size = tx_org_downloads.documentssize
                    // Adds the value from tx_org_downloads.documentscaption to imagecaption
                  imagecaption = tx_org_downloads.documentscaption
                    // Adds the value from tx_org_downloads.documentslayout to layout
                  layout = tx_org_downloads.documentslayout
                    // Adds the value from tx_org_downloads.tx_flipit_layout to tx_flipit_layout
                  tx_flipit_layout = tx_org_downloads.tx_flipit_layout
                    // Adds the value from tx_org_downloads.tx_flipit_quality to tx_flipit_quality
                  tx_flipit_quality = tx_org_downloads.tx_flipit_quality
                    // Adds the value from tx_org_downloads.tx_flipit_pagelist to tx_flipit_pagelist
                  tx_flipit_pagelist = tx_org_downloads.tx_flipit_pagelist
                }
                  // Should this TypoScript executed for each language record?
                renderCurrentLanguageOnly = TEXT
                renderCurrentLanguageOnly {
                    // [Boolean] 1 (default), 0: render each existing language record
                  value = 1
                }
                  // Current table
                table = TEXT
                table {
                    // [STRING] Current table. I.e: tx_org_downloads
                  value = tx_org_downloads
                }
                  // Fields (fields which needed localised only)
                select = TEXT
                select {
                    // [String] select fields of the local table only! Fields are needed with localisation only
                  value (
                    uid,
                    documents,
                    documentscaption,
                    thumbnail,
                    linkicon_width,
                    linkicon_height
                  )
                }
                  // Current record
                record = TEXT
                record {
                    // [INTEGER] uid of the current record. I.e: ###TX_ORG_DOWNLOADS.UID###
                  value = ###TX_ORG_DOWNLOADS.UID###
                }
                  // conf: Should be a modified copy of the parent configuration
                //conf < plugin.tx_browser_pi1.tt_content.uploads.20
                conf < plugin.tx_browser_pi1.tt_content.uploads.20
                conf =
                conf {
                  userFunc >
                    // 130207, dwildt, 2+
                  field = {$plugin.org.table.downloads}.{$plugin.org.table.downloads.field.documents}
                  thumbnail = {$plugin.org.table.downloads}.{$plugin.org.table.downloads.field.thumbnail}
                    // Don't outerWrap with <table> by default
                  outerWrap = |
                  filePath >
                  itemRendering >
                    // Download link and ordering form
                  itemRendering = COA
                  itemRendering {
                      // Form begin
                    10 = COA
                    10 {
                        // <form name="form_add_to_cart" ... method="post">
                      10 = TEXT
                      10 {
                        wrap (
          <form name="form_add_to_cart" id="form-order" class="tx_org_downloads-order" action="|" method="post">
)
                        typolink {
                          parameter     = {$plugin.org.pages.shopping_cart_downloads}
                          returnLast    = url
                          useCacheHash  = 1
                        }
                      }
                        // <fieldset><legend>X</legend><input ... /><input ... /><input ... />
                      20 = TEXT
                      20 {
                        value = Download or Ordering
                        lang {
                          de = Herunterladen oder Bestellen
                        }
                        wrap (
            <fieldset id="add-to-cart">
              <legend>|</legend>
              <input type="hidden"  name="id"                     value="{$plugin.org.pages.shopping_cart_downloads}" />
              <input type="hidden"  name="tx_org_downloads[uid]"        value="###TABLE.UID###" />
              <input type="hidden"  name="tx_org_downloads[documents]"  value="###TABLE.DOCUMENTS###" />
              <input type="hidden"  name="sys_language[flag]"     value="###SYS_LANGUAGE.FLAG###" />
              <input type="hidden"  name="sys_language[title]"    value="###SYS_LANGUAGE.TITLE###" />
)
                      }
                    }
                      // <table class="csc-uploads">|</table>
                    20 = COA
                    20 {
                      wrap (
              <table class="csc-uploads">|</table>
)
                        // <tr> ... Download link line ... </tr>
                      10 = COA
                      10 {
                        if {
                          // #48871
                          //value   = ###TX_ORG_DOWNLOADS.TYPE###
                          //field   = tx_org_downloads.type
                          //equals  = shipping
                          value         = shipping
                          equals {
                            field  = tx_org_downloads.type
                          }
                          negate  = 1
                        }
                        wrap = <tr class="download">|</tr>
                          // Flag
                        10 = TEXT
                        10 {
                          wrap  = <td class="csc-uploads-flag">|</td>
                          value = <img src="typo3/gfx/flags/###SYS_LANGUAGE.FLAG###.gif" alt="###TABLE.DOCUMENTS### (###SYS_LANGUAGE.TITLE###)" title="###TABLE.DOCUMENTS### (###SYS_LANGUAGE.TITLE###)"/>
                        }
                          // File preview or application icon
                        20 = COA
                        20 {
                          //10 < plugin.tx_browser_pi1.tt_content.uploads.20.itemRendering.10
                          10 < plugin.tx_browser_pi1.tt_content.uploads.20.itemRendering.10
                          10 {
                            if {
                              isPositive.field   = tx_org_downloads.documentslayout
                            }
                          }
                        }
                          // File name
                        30 = COA
                        30 {
                          //10 < plugin.tx_browser_pi1.tt_content.uploads.20.itemRendering.20.1
                          10 < plugin.tx_browser_pi1.tt_content.uploads.20.itemRendering.20.1
                          10 {
                            //if.isTrue = ###TX_ORG_DOWNLOADS.DOCUMENTS_DISPLAY_LABEL###
                            if.isTrue.field   = tx_org_downloads.documents_display_label
                            wrap      = <td class="csc-uploads-file-name">|</td>
                            data = register:filename
                          }
                        }
                          // File description
                        40 = COA
                        40 {
                            // 130207, dwildt, 1-
                          //10 < plugin.tx_browser_pi1.tt_content.uploads.20.itemRendering.20.2
                            // 130207, dwildt, 1+
                          //10 < plugin.tx_browser_pi1.tt_content.uploads.20.itemRendering.20
                          10 < plugin.tx_browser_pi1.tt_content.uploads.20.itemRendering.20
                          10 {
                            //if.isTrue = ###TX_ORG_DOWNLOADS.DOCUMENTS_DISPLAY_CAPTION###
                            if.isTrue.field = tx_org_downloads.documents_display_caption
                            wrap      = <td class="csc-uploads-file-caption">|</td>
                          }
                        }
                          // Filesize
                        50 = COA
                        50 {
                          10 = COA
                          10 {
                            wrap = <td class="csc-uploads-fileSize">|</td>
                            //10 < plugin.tx_browser_pi1.tt_content.uploads.20.itemRendering.30
                            10 < plugin.tx_browser_pi1.tt_content.uploads.20.itemRendering.30
                            10 {
                              if >
                              //if.isTrue = ###TX_ORG_DOWNLOADS.DOCUMENTSSIZE###
                              if.isTrue.field = tx_org_downloads.documentssize
                              wrap >
                              bytes {
                                labels = {$styles.content.uploads.filesizeBytesLabels}
                              }
                            }
                          }
                        }
                          // Download button (download icon)
                        60 = COA
                        60 {
                            // <td class="csc-uploads-button"><div class="iconbutton">...</div></td>
                          wrap = <td class="csc-uploads-button"><div class="iconbutton">|</div></td>
                            // <a href="X" class="ui-button-text" ...
                          10 = TEXT
                          10 {
                            typolink {
                              parameter         = {$plugin.org.pages.downloads},{$plugin.tx_browser_pi1.typeNum.downloadPageObj}
                              additionalParams  = &tx_browser_pi1[plugin]=###TT_CONTENT.UID###&tx_browser_pi1[file]=single.301.tx_org_downloads.###TABLE.UID###.documents.###KEY###
                              useCacheHash      = 1
                              returnLast        = url
                            }
                            wrap    = <a href="|" class="ui-button-text"
                          }
                            // ... title="X">
                          20 = TEXT
                          20 {
                            value = Download ###TABLE.DOCUMENTS### (###SYS_LANGUAGE.TITLE###)
                            lang {
                              de  = ###TABLE.DOCUMENTS### (###SYS_LANGUAGE.TITLE###) herunterladen
                              en  = Download ###TABLE.DOCUMENTS### (###SYS_LANGUAGE.TITLE###)
                            }
                            noTrimWrap  = | title="|">|
                          }
                            // <img ... />
                          30 = IMAGE
                          30 {
                            file    = EXT:org/res/download.gif
                          }
                            // ... label</a>
                          40 = TEXT
                          40 {
                            value = Download
                            lang {
                              de  = Herunterladen
                              en  = Download
                            }
                            noTrimWrap  = | |</a>|
                          }
                        }
                      }
                        // <tr> ... Ordering link line ... </tr>
                      20 = COA
                      20 {
                        if {
                          // #48871
                          //value   = ###TX_ORG_DOWNLOADS.TYPE###
                          //field   = tx_org_downloads.type
                          //equals  = download
                          value         = download
                          equals {
                            field  = tx_org_downloads.type
                          }
                          negate  = 1
                        }
                        wrap = <tr class="ordering">|</tr>
                          // Flag
                        10 = TEXT
                        10 {
                          wrap  = <td class="csc-uploads-flag">|</td>
                          value = <img src="typo3/gfx/flags/###SYS_LANGUAGE.FLAG###.gif" alt="###TABLE.DOCUMENTS### (###SYS_LANGUAGE.TITLE###)" title="###TABLE.DOCUMENTS### (###SYS_LANGUAGE.TITLE###)"/>
                        }
                          // File preview or application icon (empty!)
                        20 = TEXT
                        20 {
                          if {
                            isPositive.field   = tx_org_downloads.documentslayout
                          }
                          value = &nbsp;
                          wrap  = <td class="csc-uploads-icon">|</td>
                        }
                          // File name
                        30 = COA
                        30 {
                          //10 < plugin.tx_browser_pi1.tt_content.uploads.20.itemRendering.20.1
                          10 < plugin.tx_browser_pi1.tt_content.uploads.20.itemRendering.20.1
                          10 {
                            //if.isTrue = ###TX_ORG_DOWNLOADS.DOCUMENTS_DISPLAY_LABEL###
                            if.isTrue.field   = tx_org_downloads.documents_display_label
                            wrap      = <td class="csc-uploads-file-name">|</td>
                            data = register:filename
                          }
                        }
                          // File description
                        40 = COA
                        40 {
                            // 130209, dwildt, 1-
                          //10 < plugin.tx_browser_pi1.tt_content.uploads.20.itemRendering.20.2
                            // 130209, dwildt, 1+
                          //10 < plugin.tx_browser_pi1.tt_content.uploads.20.itemRendering.20.2
                          10 < plugin.tx_browser_pi1.tt_content.uploads.20.itemRendering.20.2
                          10 {
                            if.isTrue   = ###TX_ORG_DOWNLOADS.DOCUMENTS_DISPLAY_CAPTION###
                            wrap        = <td class="csc-uploads-file-caption">|</td>
                          }
                        }
                          // form input quantity
                        50 = TEXT
                        50 {
                          wrap = <td class="csc-uploads-fileSize">|</td>
                          value = <input type="text" name="quantity" value="1" class="quantity" />
                        }
                          // Form submit (cart icon)
                        60 = COA
                        60 {
                            // <td class="csc-uploads-button"><button type="submit" name="submit" value="X">
                          10 = TEXT
                          10 {
                            value = Ordering
                            lang {
                              de  = Bestellen
                              en  = Ordering
                            }
                            wrap    = <td class="csc-uploads-button"><button type="submit" name="submit" value="|">
                          }
                            // <img ... />
                          20 = IMAGE
                          20 {
                            file    = EXT:org/res/shipping.gif
                          }
                            // label</button></td>
                          30 = TEXT
                          30 {
                            value = Ordering
                            lang {
                              de  = Bestellen
                              en  = Ordering
                            }
                            noTrimWrap  = | |</button></td>|
                          }
                        }
                      }
                    }
                      // Form end
                    30 = TEXT
                    30 {
                      wrap (
              </table>
            </fieldset>
          </form>
)
                    }
                  }
                  linkProc {
                    iconCObject {
                      file {
                        width = 240m
                        width {
                          field >
                          override = ###TABLE.LINKICON_WIDTH###
                        }
                        height = 400m
                        height {
                          override = ###TABLE.LINKICON_HEIGHT###
                        }
                      }
                    }
                    tx_browser_pi1 = COA
                    tx_browser_pi1 {
                        // Link with preview or application icon
                      10 = IMAGE
                      10 {
                        file {
                          import {
                            data = register : ICON_REL_PATH_FROM_LINCPROC
                          }
                        }
                        imageLinkWrap = 1
                        imageLinkWrap {
                          enable = 1
                          typolink {
                            parameter         = {$plugin.org.pages.downloads},{$plugin.tx_browser_pi1.typeNum.downloadPageObj}
                            additionalParams  = &tx_browser_pi1[plugin]=###TT_CONTENT.UID###&tx_browser_pi1[file]=single.301.tx_org_downloads.###TABLE.UID###.documents.###KEY###
                            useCacheHash      = 1
                            title             = TEXT
                            title {
                              value = Download ###TABLE.DOCUMENTS### (###SYS_LANGUAGE.TITLE###)
                              lang {
                                de  = ###TABLE.DOCUMENTS### (###SYS_LANGUAGE.TITLE###) herunterladen
                                en  = Download ###TABLE.DOCUMENTS### (###SYS_LANGUAGE.TITLE###)
                              }
                            }
                          }
                        }
                      }
                        // Link devider
                      20 = TEXT
                      20 {
                        value = //**//
                      }
                        // Link with label
                      30 = TEXT
                      30 {
                        data = register : filename
                        typolink {
                          parameter         = {$plugin.org.pages.downloads},{$plugin.tx_browser_pi1.typeNum.downloadPageObj}
                          additionalParams  = &tx_browser_pi1[plugin]=###TT_CONTENT.UID###&tx_browser_pi1[file]=single.301.tx_org_downloads.###TABLE.UID###.documents.###KEY###
                          useCacheHash      = 1
                          title = TEXT
                          title {
                            value = Download ###TABLE.DOCUMENTS### (###SYS_LANGUAGE.TITLE###)
                            lang {
                              de  = ###TABLE.DOCUMENTS### (###SYS_LANGUAGE.TITLE###) herunterladen
                              en  = Download ###TABLE.DOCUMENTS### (###SYS_LANGUAGE.TITLE###)
                            }
                          }
                        }
                      }
                    }

                  }
                  stdWrap {
                    if.isTrue = ###TABLE.THUMBNAIL######TABLE.DOCUMENTS######TX_ORG_DOWNLOADS.DOCUMENTS_FROM_PATH###
                  }
                }
              }
                // 130207, dwildt, 1+
              field     = {$plugin.org.table.downloads}.{$plugin.org.table.downloads.field.documents}
              thumbnail = {$plugin.org.table.downloads}.{$plugin.org.table.downloads.field.thumbnail}
                // Don't outerWrap with <table> by default
              outerWrap = |
              filePath >
              itemRendering >
              itemRendering = COA
              itemRendering {
                  // Form begin
                10 = COA
                10 {
                    // <form name="form_add_to_cart" ... method="post">
                  10 = TEXT
                  10 {
                    wrap (
          <form name="form_add_to_cart" id="form-order" class="tx_org_downloads-order" action="|" method="post">
)
                    typolink {
                      parameter     = {$plugin.org.pages.shopping_cart_downloads}
                      returnLast    = url
                      useCacheHash  = 1
                    }
                  }
                    // <fieldset><legend>X</legend><input ... /><input ... /><input ... />
                  20 = TEXT
                  20 {
                    value = Download or Ordering
                    lang {
                      de = Herunterladen oder Bestellen
                    }
                    wrap (
            <fieldset id="add-to-cart">
              <legend>|</legend>
              <input type="hidden"  name="id"                     value="{$plugin.org.pages.shopping_cart_downloads}" />
              <input type="hidden"  name="tx_org_downloads[uid]"        value="###TX_ORG_DOWNLOADS.UID###" />
              <input type="hidden"  name="tx_org_downloads[documents]"  value="###TX_ORG_DOWNLOADS.DOCUMENTS###" />
              <input type="hidden"  name="sys_language[flag]"     value="###SYS_LANGUAGE.FLAG###" />
              <input type="hidden"  name="sys_language[title]"    value="###SYS_LANGUAGE.TITLE###" />
)
                  }
                }
                  // <table class="csc-uploads">|</table>
                20 = COA
                20 {
                  wrap (
              <table class="csc-uploads">|</table>
)
                    // <tr> ... Download link line ... </tr>
                  10 = COA
                  10 {
                    if {
                      // #48871
                      //value   = ###TX_ORG_DOWNLOADS.TYPE###
                      //field   = tx_org_downloads.type
                      //equals  = shipping
                      value         = shipping
                      equals {
                        field  = tx_org_downloads.type
                      }
                      negate  = 1
                    }
                    wrap = <tr class="download">|</tr>
                      // Flag
                    10 = TEXT
                    10 {
                      wrap  = <td class="csc-uploads-flag">|</td>
                      value = <img src="typo3/gfx/flags/###SYS_LANGUAGE.FLAG###.gif" alt="###TX_ORG_DOWNLOADS.DOCUMENTS### (###SYS_LANGUAGE.TITLE###)" title="###TX_ORG_DOWNLOADS.DOCUMENTS### (###SYS_LANGUAGE.TITLE###)"/>
                    }
                    10 >
                      // File preview or application icon
                    20 = COA
                    20 {
                      //10 < plugin.tx_browser_pi1.tt_content.uploads.20.itemRendering.10
                      10 < plugin.tx_browser_pi1.tt_content.uploads.20.itemRendering.10
                      10 {
                        if {
                          isPositive.field   = tx_org_downloads.documentslayout
                        }
                        wrap = <td class="csc-uploads-icon">|</td>
                      }
                    }
                      // File name
                    30 = COA
                    30 {
                      //10 < plugin.tx_browser_pi1.tt_content.uploads.20.itemRendering.20.1
                      10 < plugin.tx_browser_pi1.tt_content.uploads.20.itemRendering.20.1
                      10 {
                        //if.isTrue = ###TX_ORG_DOWNLOADS.DOCUMENTS_DISPLAY_LABEL###
                        if.isTrue.field   = tx_org_downloads.documents_display_label
                        wrap      = <td class="csc-uploads-file-name">|</td>
                        data = register:filename
                      }
                    }
                      // File description
                    40 = COA
                    40 {
                      //10 < plugin.tx_browser_pi1.tt_content.uploads.20.itemRendering.20.2
                      10 < plugin.tx_browser_pi1.tt_content.uploads.20.itemRendering.20.2
                      10 {
                        //if.isTrue = ###TX_ORG_DOWNLOADS.DOCUMENTS_DISPLAY_CAPTION###
                        if.isTrue.field = tx_org_downloads.documents_display_caption
                        wrap      = <td class="csc-uploads-file-caption">|</td>
                      }
                    }
                      // Filesize
                    50 = COA
                    50 {
                      10 = COA
                      10 {
                        wrap = <td class="csc-uploads-fileSize">|</td>
                        //10 < plugin.tx_browser_pi1.tt_content.uploads.20.itemRendering.30
                        10 < plugin.tx_browser_pi1.tt_content.uploads.20.itemRendering.30
                        10 {
                          if >
                          //if.isTrue = ###TX_ORG_DOWNLOADS.DOCUMENTSSIZE###
                          if.isTrue.field = tx_org_downloads.documentssize
                          wrap >
                          bytes {
                            labels = {$styles.content.uploads.filesizeBytesLabels}
                          }
                        }
                      }
                    }
                      // Download button (download icon)
                    60 = COA
                    60 {
                        // <td class="csc-uploads-button"><div class="iconbutton">...</div></td>
                      wrap = <td class="csc-uploads-button"><div class="iconbutton">|</div></td>
                        // <a href="X" class="ui-button-text" ...
                      10 = TEXT
                      10 {
                        typolink {
                          parameter         = {$plugin.org.pages.downloads},{$plugin.tx_browser_pi1.typeNum.downloadPageObj}
                          additionalParams  = &tx_browser_pi1[plugin]={field:tt_content.uid}&tx_browser_pi1[file]=single.301.tx_org_downloads.{field:tx_org_downloads.uid}.documents.{field:key}
                          additionalParams.insertData = 1
                          useCacheHash      = 1
                          returnLast        = url
                        }
                        wrap    = <a href="|" class="ui-button-text"
                      }
                        // ... title="X">
                      20 = TEXT
                      20 {
                        value = Download ###TX_ORG_DOWNLOADS.DOCUMENTS### (###SYS_LANGUAGE.TITLE###)
                        lang {
                          de  = ###TX_ORG_DOWNLOADS.DOCUMENTS### (###SYS_LANGUAGE.TITLE###) herunterladen
                          en  = Download ###TX_ORG_DOWNLOADS.DOCUMENTS### (###SYS_LANGUAGE.TITLE###)
                        }
                        noTrimWrap  = | title="|">|
                      }
                        // <img ... />
                      30 = IMAGE
                      30 {
                        file    = EXT:org/res/download.gif
                      }
                        // ... label</a>
                      40 = TEXT
                      40 {
                        value       = Download
                        lang {
                          de  = Herunterladen
                          en  = Download
                        }
                        noTrimWrap  = | |</a>|
                      }
                    }
                  }
                    // <tr> ... Ordering link line ... </tr>
                  20 = COA
                  20 {
                    if {
                      // #48871
                      //value   = ###TX_ORG_DOWNLOADS.TYPE###
                      //field   = tx_org_downloads.type
                      //equals  = download
                      value         = download
                      equals {
                        field  = tx_org_downloads.type
                      }
                      negate  = 1
                    }
                    wrap = <tr class="ordering">|</tr>
                      // Flag
                    10 = TEXT
                    10 {
                      wrap  = <td class="csc-uploads-flag">|</td>
                      value = <img src="typo3/gfx/flags/###SYS_LANGUAGE.FLAG###.gif" alt="###TX_ORG_DOWNLOADS.DOCUMENTS### (###SYS_LANGUAGE.TITLE###)" title="###TX_ORG_DOWNLOADS.DOCUMENTS### (###SYS_LANGUAGE.TITLE###)"/>
                    }
                    10 >
                      // File preview or application icon (empty!)
                    20 = TEXT
                    20 {
                      if {
                        isPositive.field   = tx_org_downloads.documentslayout
                      }
                      value = &nbsp;
                      wrap  = <td class="csc-uploads-icon">|</td>
                    }
                      // File name
                    30 = COA
                    30 {
                      //10 < plugin.tx_browser_pi1.tt_content.uploads.20.itemRendering.20.1
                      10 < plugin.tx_browser_pi1.tt_content.uploads.20.itemRendering.20.1
                      10 {
                        //if.isTrue = ###TX_ORG_DOWNLOADS.DOCUMENTS_DISPLAY_LABEL###
                        if.isTrue.field   = tx_org_downloads.documents_display_label
                        wrap      = <td class="csc-uploads-file-name">|</td>
                      }
                    }
                      // File description
                    40 = COA
                    40 {
                      //10 < plugin.tx_browser_pi1.tt_content.uploads.20.itemRendering.20.2
                      10 < plugin.tx_browser_pi1.tt_content.uploads.20.itemRendering.20.2
                      10 {
                        if.isTrue   = ###TX_ORG_DOWNLOADS.DOCUMENTS_DISPLAY_CAPTION###
                        wrap        = <td class="csc-uploads-file-caption">|</td>
                      }
                    }
                      // form input quantity
                    50 = TEXT
                    50 {
                      wrap = <td class="csc-uploads-fileSize">|</td>
                      value = <input type="text" name="quantity" value="1" class="quantity" />
                    }
                      // Form submit (cart icon)
                    60 = COA
                    60 {
                        // <td class="csc-uploads-button"><button type="submit" name="submit" value="X">
                      10 = TEXT
                      10 {
                        value = Ordering
                        lang {
                          de  = Bestellen
                          en  = Ordering
                        }
                        wrap    = <td class="csc-uploads-button"><button type="submit" name="submit" value="|">
                      }
                        // <img ... />
                      20 = IMAGE
                      20 {
                        file    = EXT:org/res/shipping.gif
                      }
                        // label</button></td>
                      30 = TEXT
                      30 {
                        value = Ordering
                        lang {
                          de  = Bestellen
                          en  = Ordering
                        }
                        noTrimWrap  = | |</button></td>|
                      }
                    }
                  }
                }
                  // Form end
                30 = TEXT
                30 {
                  wrap (
              </table>
            </fieldset>
          </form>
)
                }
              }
              linkProc {
                iconCObject {
                  file {
                    width = 240m
                    width {
                      field >
                      override = ###TX_ORG_DOWNLOADS.LINKICON_WIDTH###
                    }
                    height = 400m
                    height {
                      override = ###TX_ORG_DOWNLOADS.LINKICON_HEIGHT###
                    }
                  }
                }
                tx_browser_pi1 = COA
                tx_browser_pi1 {
                    // Link with preview or application icon
                  10 = IMAGE
                  10 {
                    file {
                      import {
                        data = register : ICON_REL_PATH_FROM_LINCPROC
                      }
                    }
                    imageLinkWrap = 1
                    imageLinkWrap {
                      enable = 1
                      typolink {
                        parameter         = {$plugin.org.pages.downloads},{$plugin.tx_browser_pi1.typeNum.downloadPageObj}
                        additionalParams  = &tx_browser_pi1[plugin]={field:tt_content.uid}&tx_browser_pi1[file]=single.301.tx_org_downloads.{field:tx_org_downloads.
                        additionalParams.insertData = 1
                        useCacheHash      = 1
                        title             = TEXT
                        title {
                          value = Download: '###TX_ORG_DOWNLOADS.TITLE###'
                          lang {
                            de  = Herunterladen: '###TX_ORG_DOWNLOADS.TITLE###'
                            en  = Download: '###TX_ORG_DOWNLOADS.TITLE###'
                          }
                          insertData = 1
                        }
                      }
                    }
                  }
                    // Link devider
                  20 = TEXT
                  20 {
                    value = //**//
                  }
                    // Link with label
                  30 = TEXT
                  30 {
                    data = register : filename
                    typolink {
                      parameter         = {$plugin.org.pages.downloads},{$plugin.tx_browser_pi1.typeNum.downloadPageObj}
                      additionalParams  = &tx_browser_pi1[plugin]={field:tt_content.uid}&tx_browser_pi1[file]=single.301.tx_org_downloads.{field:tx_org_downloads.uid}.documents.{field:key}
                      additionalParams.insertData = 1
                      useCacheHash      = 1
                      title             = TEXT
                      title {
                        value = Download: '###TX_ORG_DOWNLOADS.TITLE###'
                        lang {
                          de  = Herunterladen: '###TX_ORG_DOWNLOADS.TITLE###'
                          en  = Download: '###TX_ORG_DOWNLOADS.TITLE###'
                        }
                        insertData = 1
                      }
                    }
                  }
                }
              }
                // 130207, dwildt, -
              //tableField = tx_org_downloads.documents
              stdWrap {
                if.isTrue = ###TX_ORG_DOWNLOADS.THUMBNAIL######TX_ORG_DOWNLOADS.DOCUMENTS######TX_ORG_DOWNLOADS.DOCUMENTS_FROM_PATH###
              }
            }
          }
        }
      }
    }
  }
}