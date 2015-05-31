plugin.tx_browser_pi1 {
  views {
    single {
      120 {
        select (
          tx_org_staff.title,
          tx_org_staff.contact_email,
          tx_org_staff.contact_fax,
          tx_org_staff.contact_phone,
          tx_org_staff.contact_skype,
          tx_org_staff.contact_url,
          tx_org_staff.department,
          tx_org_staff.name_first,
          tx_org_staff.name_last,
          tx_org_staff.uid,
          tx_org_headquarters.title,
          tx_org_headquarters.mail_address,
          tx_org_headquarters.mail_city,
          tx_org_headquarters.mail_country,
          tx_org_headquarters.mail_lat,
          tx_org_headquarters.mail_lon,
          tx_org_headquarters.mail_street,
          tx_org_headquarters.mail_postcode,
          tx_org_headquarters.postbox_city,
          tx_org_headquarters.postbox_postbox,
          tx_org_headquarters.postbox_postcode,
          tx_org_headquarters.uid
        )
        orderBy (
          tx_org_staff.title DESC
        )
      }
    }
  }
}