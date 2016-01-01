<INCLUDE_TYPOSCRIPT: source="FILE:EXT:org/Configuration/TypoScript/base/plugins/tx_caddy_pi1/temp.tx_org_downloads.flag_file.ts">

plugin.tx_caddy_pi1 {
  templates {
    html {
      form {
        order {
          foundation {
            10 {
              wiSelect {
                20 {
                  20 {
                      // #i0116, dwildt, +
                    116 = COA
                    116 {
                        // if.isTrue {$plugin.org.icon.flags.enabled} ($plugin.org.icon.flags.enabled)
                      if =
                      if {
                        isTrue = {$plugin.org.icon.flags.enabled}
                      }
                        // flag
                      10 < temp.tx_org_downloads.flag_file
                      10 {
                        wrap = <input type="hidden" name="flag" value="|" />
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