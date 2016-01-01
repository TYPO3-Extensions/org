plugin.tx_browser_pi1 {
  views {
    list {
      302 {
        select (
          tx_org_downloadscat.title,
          tx_org_downloadscat.title_lang_ol,

          tx_org_downloadscat.color,

          tx_org_downloadscat.image,
          tx_org_downloadscat.imageheight,
          tx_org_downloadscat.imageseo,
          tx_org_downloadscat.imageseo_lang_ol,
          tx_org_downloadscat.imagewidth,
          tx_org_downloadscat.image_effects,
          tx_org_downloadscat.image_compression,

          tx_org_downloadscat.uid,
          tx_org_downloadscat.text,
          tx_org_downloadscat.text_lang_ol,
          tx_org_downloadscat.type
        )
        orderBy (
          tx_org_downloadscat.sorting
        )
      }
    }
  }
}