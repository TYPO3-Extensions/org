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
        var labelTxOrgStaffMore  = "More &raquo;";
        var labelTxOrgStaffLess  = "Less &laquo;";
        var lnDeTxOrgStaffMore   = "Mehr &raquo;";
        var lnDeTxOrgStaffLess   = "Weniger &laquo;";

        var htmlLang = $( "html" ).attr( "lang" ).substr( 0, 2 );

        if( htmlLang === "de" ) {
          labelTxOrgStaffMore  = lnDeTxOrgStaffMore;
          labelTxOrgStaffLess  = lnDeTxOrgStaffLess;
        }

        $( document ).ready( function( )
        {
          if( $( "ul.tx_org_cal li.toggle" ).length > 0 )
          {
            $( ".tx_org_cal_toggle" ).show( );
            $( ".tx_org_cal_toggle" ).html( labelTxOrgStaffMore );
          }

          $( ".tx_org_cal_toggle" ).click( function() {
            $( "ul.tx_org_cal li.toggle" ).toggle( "slow", function() {
              if( $( "ul.tx_org_cal li.toggle" ).css( "display" ) === "none" )
              {
                $( ".tx_org_cal_toggle" ).html( labelTxOrgStaffMore ).blur();
              }
              else
              {
                $( ".tx_org_cal_toggle" ).html( labelTxOrgStaffLess ).blur();
              }
            });
          });
        });
)
    }
  }
}