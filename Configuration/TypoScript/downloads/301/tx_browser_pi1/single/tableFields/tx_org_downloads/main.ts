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
            wrap = <div class="row">|</div>
              // subtitle, title
            10 = COA
            10 {
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
              wrap = <div class="columns col-lg-12">|</div>
            }
              // thumbnail
            20 = COA
            20 {
                // thumbnail
              10 = TEXT
              10 {
                value       = Configuration/TypoScript/downloads/301/tx_browser_pi1/single/tableFields/tx_org_downloads/main_thumbnail.ts
                noTrimWrap  = |<p style="color:red;font-weight:bold;">Please include: |</p>|
              }
              wrap        = <div class="columns small-12 large-4 col-xs-12 col-lg-4 intext-left">|</div>
            }
              // text, form
            30 = COA
            30 {
              10 = TEXT
              10 {
                value = Configuration/TypoScript/downloads/301/tx_browser_pi1/single/tableFields/tx_org_downloads/main_text.ts
                noTrimWrap  = |<p style="color:red;font-weight:bold;">Please include: |</p>|
              }
              20 = TEXT
              20 {
                value = Configuration/TypoScript/downloads/301/tx_browser_pi1/single/tableFields/tx_org_downloads/main_form.ts
                noTrimWrap  = |<p style="color:red;font-weight:bold;">Please include: |</p>|
              }
              wrap = <div class="columns small-12 large-8 col-xs-12 col-lg-8 intext-left">|</div>
            }
          }
        }
      }
    }
  }
}