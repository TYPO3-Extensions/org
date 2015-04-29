# From tt_news_cat to tx_org_newscat
  # Remove all records from tx_org_newscat
TRUNCATE TABLE tx_org_newscat;
  # page id of your folder with the organiser news (here: 3606)
SET @pid = '3606';
  # Migrate tt_newscat records to tx_org_newscat
INSERT INTO tx_org_newscat (uid, pid, uid_parent, tstamp, crdate, hidden, deleted, title, title_lang_ol, image)
SELECT uid, @pid, parent_category, tstamp, crdate, hidden, deleted, title, title_lang_ol, image FROM tt_news_cat;


# From tt_news_cat_mm to tx_org_mm_all
  # Remove all records from tx_org_mm_all, if there local table is tx_org_news and the foreign table is tx_org_newscat
DELETE FROM tx_org_mm_all WHERE table_local LIKE 'tx_org_news' AND table_foreign LIKE 'tx_org_newscat';
  # Migrate tt_news_cat_mm records to tx_org_mm_all
INSERT INTO tx_org_mm_all (uid_local, uid_foreign, sorting, table_local, table_foreign)
SELECT uid_local, uid_foreign, sorting, 'tx_org_news', 'tx_org_newscat' FROM tt_news_cat_mm;


# From tt_news to tx_org_news
  # Remove all records from tx_org_newscat
TRUNCATE TABLE tx_org_news;
  # page id of your folder with the organiser news (here: 3606)
SET @pid = '3606';
  # Migrate tt_news_cat_mm records to tx_org_mm_all
INSERT INTO tx_org_news (archivedate, bodytext, crdate, cruser_id, datetime, deleted, documents,  endtime, fe_group, hidden, image, imagecaption, imageseo,       l10n_diffsource, l10n_parent, page, pid,  seo_keywords, starttime, subtitle, sys_language_uid, title, tstamp, tx_org_newscat, type, uid, url)
SELECT                   archivedate, bodytext, crdate, cruser_id, datetime, deleted, news_files, endtime, fe_group, hidden, image, imagecaption, imagetitletext, l18n_diffsource, l18n_parent, page, @pid, keywords,     starttime, short,    sys_language_uid, title, tstamp, category,       type, uid, ext_url FROM tt_news;
  # Update the type
UPDATE tx_org_news SET type = 'record' WHERE type = 0;
UPDATE tx_org_news SET type = 'page'   WHERE type = 1;
UPDATE tx_org_news SET type = 'url'    WHERE type = 2;

  # Migrate data from third party extension (here: newscomfort)
UPDATE tx_org_news, tt_news
SET    tx_org_news.teaser_title    = tt_news.tx_newscomfort_title,
       tx_org_news.teaser_subtitle = tt_news.tx_newscomfort_subheader,
       tx_org_news.teaser_short    = tt_news.tx_newscomfort_short
WHERE  tx_org_news.uid = tt_news.uid;


# Get list of images and files for CSV export
SELECT image FROM tt_news_cat WHERE image != '';
SELECT image FROM tt_news WHERE image != '';
SELECT news_files FROM tt_news WHERE image != '';