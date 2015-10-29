page {
  config {
    headerComment (
        TYPO3-Programmierung: die-netzmacher.de
)
  }
  jsFooterInline {
      // Included by org/Configuration/TypoScript/staff/101/page/setup.ts
    71116 = TEXT
    71116 {
      value (

        /* EXT:org/Configuration/TypoScript/staff/101/page/setup.ts */
        var labelTxOrgCalSlidedown  = "More &raquo;";
        var labelTxOrgCalSlideup    = "Less &laquo;";
        var lnDeTxOrgCalSlidedown   = "Mehr &raquo;";
        var lnDeTxOrgCalSlideup     = "Weniger &laquo;";

        var htmlLang = $( "html" ).attr( "lang" ).substr( 0, 2 );

        if( htmlLang === "de" ) {
          labelTxOrgCalSlidedown  = lnDeTxOrgCalSlidedown;
          labelTxOrgCalSlideup    = lnDeTxOrgCalSlideup;
        }

        $( document ).ready( function( )
        {
          if( $( "ul.tx_org_cal li.toggle" ).length > 0 )
          {
            $( ".tx_org_cal_toggle" ).show( );
            $( ".tx_org_cal_toggle" ).html( labelTxOrgCalSlidedown );
          }

          $( ".tx_org_cal_toggle" ).click(function() {
            $( "ul.tx_org_cal li.toggle" ).toggle( "slow", function() {
              if( $( "ul.tx_org_cal li.toggle" ).css( "display" ) == "none" )
              {
                $( ".tx_org_cal_toggle" ).html( labelTxOrgCalSlidedown ).blur();
              }
              else
              {
                $( ".tx_org_cal_toggle" ).html( labelTxOrgCalSlideup ).blur();
              }
            });
          });
        });
)
    }
  }
}

