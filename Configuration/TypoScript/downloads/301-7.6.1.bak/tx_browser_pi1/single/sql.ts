plugin.tx_browser_pi1 {
  views {
    single {
      301 {
        select (
          tx_org_downloads.title,
          tx_org_downloads.bodytext,
          tx_org_downloads.datetime,
          tx_org_downloads.documents,
          tx_org_downloads.documentscaption,
          tx_org_downloads.documents_from_path,
          tx_org_downloads.documents_display_label,
          tx_org_downloads.documents_display_caption,
          tx_org_downloads.documentslayout,
          tx_org_downloads.documentssize,
          tx_org_downloads.linkicon_width,
          tx_org_downloads.linkicon_height,
          tx_org_downloads.seo_description,
          tx_org_downloads.seo_keywords,
          tx_org_downloads.statistics_downloads_by_visits,
          tx_org_downloads.subtitle,
          tx_org_downloads.teaser_short,
          tx_org_downloads.thumbnail,
          tx_org_downloads.thumbnail_width,
          tx_org_downloads.thumbnail_height,
          tx_org_downloads.tstamp,
          tx_org_downloads.tx_flipit_fancybox,
          tx_org_downloads.tx_flipit_layout,
          tx_org_downloads.tx_flipit_pagelist,
          tx_org_downloads.tx_flipit_quality,
          tx_org_downloads.tx_flipit_swf_files,
          tx_org_downloads.tx_flipit_updateswfxml,
          tx_org_downloads.tx_flipit_xml_file,
          tx_org_downloads.type,
          tx_org_downloadscat.title,
          tx_org_downloadsmedia.title
)
      }
    }
  }
}