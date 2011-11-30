# INDEX
# -----
# fe_users
# fe_users_mm_tx_org_downloads
# fe_users_mm_tx_org_news
# fe_groups
# tx_org_cal
# tx_org_calentrance
# tx_org_calspecial
# tx_org_caltype
# tx_org_cal_mm_tx_org_caltype
# tx_org_cal_mm_tx_org_calentrance
# tx_org_cal_mm_tx_org_location
# tx_org_department
# tx_org_department_mm_tx_org_cal
# tx_org_department_mm_tx_org_departmentcat
# tx_org_department_mm_tx_org_news
# tx_org_department_mm_fe_users
# tx_org_departmentcat
# tx_org_downloads
# tx_org_downloads_mm_tx_org_downloadscat
# tx_org_downloads_mm_tx_org_downloadsmedia
# tx_org_downloadscat
# tx_org_downloadsmedia
# tx_org_event
# tx_org_event_mm_tx_org_cal
# tx_org_event_mm_tx_org_news
# tx_org_headquarters
# tx_org_headquarters_mm_fe_users
# tx_org_headquarters_mm_tx_org_cal
# tx_org_headquarters_mm_tx_org_department
# tx_org_headquarters_mm_tx_org_news
# tx_org_location
# tx_org_news
# tx_org_news_mm_tx_org_newscat
# tx_org_newscat
# tx_org_tax



#
# Table structure for table 'fe_users'
#
CREATE TABLE fe_users (
  tx_org_downloads tinytext,
  tx_org_news tinytext,
  tx_org_headquarters tinytext,
  tx_org_department tinytext,
  tx_org_vita mediumtext NOT NULL,
  tx_org_imagecaption text,
  tx_org_imageseo text
);



#
# Table structure for table 'fe_users_mm_tx_org_downloads'
#
CREATE TABLE fe_users_mm_tx_org_downloads (
  uid_local int(11) unsigned DEFAULT '0' NOT NULL,
  uid_foreign int(11) unsigned DEFAULT '0' NOT NULL,
  tablenames varchar(30) DEFAULT '' NOT NULL,
  sorting int(11) unsigned DEFAULT '0' NOT NULL,
  sorting_foreign int(11) unsigned DEFAULT '0' NOT NULL,
  KEY uid_local (uid_local),
  KEY uid_foreign (uid_foreign)
);



#
# Table structure for table 'fe_users_mm_tx_org_news'
#
CREATE TABLE fe_users_mm_tx_org_news (
  uid_local int(11) unsigned DEFAULT '0' NOT NULL,
  uid_foreign int(11) unsigned DEFAULT '0' NOT NULL,
  tablenames varchar(30) DEFAULT '' NOT NULL,
  sorting int(11) unsigned DEFAULT '0' NOT NULL,
  sorting_foreign int(11) unsigned DEFAULT '0' NOT NULL,
  KEY uid_local (uid_local),
  KEY uid_foreign (uid_foreign)
);



#
# Table structure for table 'tx_org_cal'
#
CREATE TABLE tx_org_cal (
  uid int(11) unsigned DEFAULT '0' NOT NULL auto_increment,
  pid int(11) unsigned DEFAULT '0' NOT NULL,
  tstamp int(11) unsigned DEFAULT '0' NOT NULL,
  crdate int(11) unsigned DEFAULT '0' NOT NULL,
  cruser_id int(11) unsigned DEFAULT '0' NOT NULL,
  sys_language_uid int(11) DEFAULT '0' NOT NULL,
  l10n_parent int(11) DEFAULT '0' NOT NULL,
  l10n_diffsource mediumtext,
  deleted tinyint(4) unsigned DEFAULT '0' NOT NULL,
  type tinytext,
  tx_org_event tinytext,
  title tinytext,
  subtitle tinytext,
  datetime int(11) unsigned DEFAULT '0' NOT NULL,
  datetimeend int(11) unsigned DEFAULT '0' NOT NULL,
  tx_org_caltype tinytext,
  bodytext mediumtext NOT NULL,
  teaser_title tinytext,
  teaser_subtitle tinytext,
  teaser_short mediumtext,
  calpage tinytext,
  calurl tinytext,
  tx_org_location tinytext,
  tx_org_calentrance tinytext,
  tx_org_headquarters tinytext,
  tx_org_department tinytext NOT NULL,
  image text,
  imagecaption text,
  imageseo text,
  imageheight tinytext,
  imagewidth tinytext,
  imageorient tinyint(4) unsigned NOT NULL default '0',
  imagecaption text,
  imagecols tinyint(4) unsigned NOT NULL default '0',
  imageborder tinyint(4) unsigned NOT NULL default '0',
  imagecaption_position varchar(12) default '',
  image_link text,
  image_zoom tinyint(3) unsigned NOT NULL default '0',
  image_noRows tinyint(3) unsigned NOT NULL default '0',
  image_effects tinyint(3) unsigned NOT NULL default '0',
  image_compression tinyint(3) unsigned NOT NULL default '0',
  image_frames tinyint(3) unsigned NOT NULL default '0',
  embeddedcode text,
  print text,
  printcaption text,
  printseo text,
  hidden tinyint(4) unsigned DEFAULT '0' NOT NULL,
  starttime int(11) DEFAULT '0' NOT NULL,
  endtime int(11) DEFAULT '0' NOT NULL,
  pages tinytext,
  fe_group int(11) DEFAULT '0' NOT NULL,
  keywords text,
  description text,
  
  PRIMARY KEY (uid),
  KEY parent (pid)
);



#
# Table structure for table 'tx_org_calentrance'
#
CREATE TABLE tx_org_calentrance (
  uid int(11) unsigned DEFAULT '0' NOT NULL auto_increment,
  pid int(11) unsigned DEFAULT '0' NOT NULL,
  tstamp int(11) unsigned DEFAULT '0' NOT NULL,
  crdate int(11) unsigned DEFAULT '0' NOT NULL,
  cruser_id int(11) unsigned DEFAULT '0' NOT NULL,
  deleted tinyint(4) unsigned DEFAULT '0' NOT NULL,
  title tinytext,
  title_lang_ol tinytext,
  value tinytext,
  tx_org_tax tinytext,
  hidden tinyint(4) DEFAULT '0' NOT NULL,
  starttime int(11) DEFAULT '0' NOT NULL,
  endtime int(11) DEFAULT '0' NOT NULL,
  fe_group varchar(100) DEFAULT '0' NOT NULL,
  
  PRIMARY KEY (uid),
  KEY parent (pid)
);



#
# Table structure for table 'tx_org_caltype'
#
CREATE TABLE tx_org_caltype (
  uid int(11) unsigned DEFAULT '0' NOT NULL auto_increment,
  pid int(11) unsigned DEFAULT '0' NOT NULL,
  tstamp int(11) unsigned DEFAULT '0' NOT NULL,
  crdate int(11) unsigned DEFAULT '0' NOT NULL,
  cruser_id int(11) unsigned DEFAULT '0' NOT NULL,
  deleted tinyint(4) unsigned DEFAULT '0' NOT NULL,
  title tinytext,
  title_lang_ol tinytext,
  tx_org_cal tinytext,
  hidden tinyint(4) DEFAULT '0' NOT NULL,
  
  PRIMARY KEY (uid),
  KEY parent (pid)
);



#
# Table structure for table 'tx_org_cal_mm_tx_org_calentrance'
#
CREATE TABLE tx_org_cal_mm_tx_org_calentrance (
  uid_local int(11) unsigned DEFAULT '0' NOT NULL,
  uid_foreign int(11) unsigned DEFAULT '0' NOT NULL,
  tablenames varchar(30) DEFAULT '' NOT NULL,
  sorting         int(11) unsigned DEFAULT '0' NOT NULL,
  sorting_foreign int(11) unsigned DEFAULT '0' NOT NULL,
  KEY uid_local (uid_local),
  KEY uid_foreign (uid_foreign)
);



#
# Table structure for table 'tx_org_cal_mm_tx_org_caltype'
#
CREATE TABLE tx_org_cal_mm_tx_org_caltype (
  uid_local int(11) unsigned DEFAULT '0' NOT NULL,
  uid_foreign int(11) unsigned DEFAULT '0' NOT NULL,
  tablenames varchar(30) DEFAULT '' NOT NULL,
  sorting         int(11) unsigned DEFAULT '0' NOT NULL,
  sorting_foreign int(11) unsigned DEFAULT '0' NOT NULL,
  KEY uid_local (uid_local),
  KEY uid_foreign (uid_foreign)
);



#
# Table structure for table 'tx_org_cal_mm_tx_org_location'
#
CREATE TABLE tx_org_cal_mm_tx_org_location (
  uid_local int(11) unsigned DEFAULT '0' NOT NULL,
  uid_foreign int(11) unsigned DEFAULT '0' NOT NULL,
  tablenames varchar(30) DEFAULT '' NOT NULL,
  sorting         int(11) unsigned DEFAULT '0' NOT NULL,
  sorting_foreign int(11) unsigned DEFAULT '0' NOT NULL,
  KEY uid_local (uid_local),
  KEY uid_foreign (uid_foreign)
);



#
# Table structure for table 'tx_org_downloads'
#
CREATE TABLE tx_org_downloads (
  uid int(11) NOT NULL auto_increment,
  pid int(11) DEFAULT '0' NOT NULL,
  tstamp int(11) DEFAULT '0' NOT NULL,
  crdate int(11) DEFAULT '0' NOT NULL,
  cruser_id int(11) DEFAULT '0' NOT NULL,
  sys_language_uid int(11) DEFAULT '0' NOT NULL,
  l10n_parent int(11) DEFAULT '0' NOT NULL,
  l10n_diffsource mediumtext,
  deleted tinyint(4) DEFAULT '0' NOT NULL,
  type tinytext,
  title tinytext,
  subtitle tinytext,
  datetime int(11) unsigned DEFAULT '0' NOT NULL,
  bodytext mediumtext NOT NULL,
  teaser_title tinytext,
  teaser_subtitle tinytext,
  teaser_short text,
  tx_org_downloadscat tinytext,
  tx_org_downloadsmedia tinytext,
  pages tinytext,
  documents text,
  documents_from_path tinytext,
  documentscaption tinytext,
  documentslayout tinyint(4) unsigned DEFAULT '0' NOT NULL,
  documentssize tinyint(4) unsigned DEFAULT '0' NOT NULL,
  documents_display_label tinyint(4) unsigned DEFAULT '0' NOT NULL,
  documents_display_caption tinyint(4) unsigned DEFAULT '0' NOT NULL,
  linkicon_height tinytext,
  linkicon_width tinytext,
  thumbnail text,
  thumbnail_height tinytext,
  thumbnail_width tinytext,
  fe_user tinytext NOT NULL,
  hidden tinyint(4) DEFAULT '0' NOT NULL,
  starttime int(11) DEFAULT '0' NOT NULL,
  endtime int(11) DEFAULT '0' NOT NULL,
  fe_group varchar(100) DEFAULT '0' NOT NULL,
  keywords text,
  description text,
  statistics_hits int(11) DEFAULT '0' NOT NULL,
  statistics_visits int(11) DEFAULT '0' NOT NULL,
  statistics_downloads int(11) DEFAULT '0' NOT NULL,
  statistics_downloads_by_visits int(11) DEFAULT '0' NOT NULL,

  PRIMARY KEY (uid),
  KEY parent (pid)
);



#
# Table structure for table 'tx_org_downloads_mm_tx_org_downloadscat'
#
CREATE TABLE tx_org_downloads_mm_tx_org_downloadscat (
  uid_local int(11) unsigned DEFAULT '0' NOT NULL,
  uid_foreign int(11) unsigned DEFAULT '0' NOT NULL,
  tablenames varchar(30) DEFAULT '' NOT NULL,
  sorting int(11) unsigned DEFAULT '0' NOT NULL,
  KEY uid_local (uid_local),
  KEY uid_foreign (uid_foreign)
);



#
# Table structure for table 'tx_org_downloads_mm_tx_org_downloadsmedia'
#
CREATE TABLE tx_org_downloads_mm_tx_org_downloadsmedia (
  uid_local int(11) unsigned DEFAULT '0' NOT NULL,
  uid_foreign int(11) unsigned DEFAULT '0' NOT NULL,
  tablenames varchar(30) DEFAULT '' NOT NULL,
  sorting int(11) unsigned DEFAULT '0' NOT NULL,
  KEY uid_local (uid_local),
  KEY uid_foreign (uid_foreign)
);



#
# Table structure for table 'tx_org_downloadscat'
#
CREATE TABLE tx_org_downloadscat (
  uid int(11) NOT NULL auto_increment,
  pid int(11) DEFAULT '0' NOT NULL,
  tstamp int(11) DEFAULT '0' NOT NULL,
  crdate int(11) DEFAULT '0' NOT NULL,
  cruser_id int(11) DEFAULT '0' NOT NULL,
  sorting int(10) unsigned DEFAULT '0' NOT NULL,
  deleted tinyint(4) DEFAULT '0' NOT NULL,
  hidden tinyint(4) DEFAULT '0' NOT NULL,
  type tinytext NOT NULL,
  title tinytext NOT NULL,
  title_lang_ol tinytext NOT NULL,
  text text,
  text_lang_ol text,
  color tinytext NOT NULL,
  image text,
  imageseo text,
  imageseo_lang_ol text,
  imageheight tinytext,
  imagewidth tinytext,
  image_effects tinyint(3) unsigned NOT NULL default '0',
  image_compression tinyint(3) unsigned NOT NULL default '0',

  PRIMARY KEY (uid),
  KEY parent (pid)

);



#
# Table structure for table 'tx_org_downloadsmedia'
#
CREATE TABLE tx_org_downloadsmedia (
  uid int(11) NOT NULL auto_increment,
  pid int(11) DEFAULT '0' NOT NULL,
  tstamp int(11) DEFAULT '0' NOT NULL,
  crdate int(11) DEFAULT '0' NOT NULL,
  cruser_id int(11) DEFAULT '0' NOT NULL,
  sorting int(10) unsigned DEFAULT '0' NOT NULL,
  deleted tinyint(4) DEFAULT '0' NOT NULL,
  hidden tinyint(4) DEFAULT '0' NOT NULL,
  type tinytext NOT NULL,
  title tinytext NOT NULL,
  title_lang_ol tinytext NOT NULL,
  text text,
  text_lang_ol text,
  color tinytext NOT NULL,
  image text,
  imageseo text,
  imageseo_lang_ol text,
  imageheight tinytext,
  imagewidth tinytext,
  image_effects tinyint(3) unsigned NOT NULL default '0',
  image_compression tinyint(3) unsigned NOT NULL default '0',

  PRIMARY KEY (uid),
  KEY parent (pid)

);



#
# Table structure for table 'tx_org_department'
#
CREATE TABLE tx_org_department (
  uid int(11) unsigned DEFAULT '0' NOT NULL auto_increment,
  pid int(11) unsigned DEFAULT '0' NOT NULL,
  tstamp int(11) unsigned DEFAULT '0' NOT NULL,
  crdate int(11) unsigned DEFAULT '0' NOT NULL,
  cruser_id int(11) unsigned DEFAULT '0' NOT NULL,
  sys_language_uid int(11) DEFAULT '0' NOT NULL,
  l10n_parent int(11) DEFAULT '0' NOT NULL,
  l10n_diffsource mediumtext,
  sorting int(10) unsigned DEFAULT '0' NOT NULL,
  deleted tinyint(4) unsigned DEFAULT '0' NOT NULL,
  title tinytext,
  shortcut tinytext,
  tx_org_departmentcat tinytext,
  tx_org_headquarters int(11) unsigned DEFAULT '0' NOT NULL,
  manager int(11) unsigned DEFAULT '0' NOT NULL,
  telephone tinytext NOT NULL,
  fax tinytext NOT NULL,
  email tinytext NOT NULL,
  url tinytext NOT NULL,
  fe_users tinytext,
  tx_org_cal text,
  documents_from_path tinytext,
  documents text,
  documentscaption tinytext,
  documentslayout tinyint(4) unsigned DEFAULT '0' NOT NULL,
  documentssize tinyint(4) unsigned DEFAULT '0' NOT NULL,
  tx_org_news text,
  image text,
  imagecaption text,
  imageseo text,
  imageheight tinytext,
  imagewidth tinytext,
  imageorient tinyint(4) unsigned NOT NULL default '0',
  imagecaption text,
  imagecols tinyint(4) unsigned NOT NULL default '0',
  imageborder tinyint(4) unsigned NOT NULL default '0',
  imagecaption_position varchar(12) default '',
  image_link text,
  image_zoom tinyint(3) unsigned NOT NULL default '0',
  image_noRows tinyint(3) unsigned NOT NULL default '0',
  image_effects tinyint(3) unsigned NOT NULL default '0',
  image_compression tinyint(3) unsigned NOT NULL default '0',
  image_frames tinyint(3) unsigned NOT NULL default '0',
  embeddedcode text,
  hidden tinyint(4) unsigned DEFAULT '0' NOT NULL,
  pages tinytext,
  fe_group int(11) DEFAULT '0' NOT NULL,
  keywords text,
  description text,
  
  PRIMARY KEY (uid),
  KEY parent (pid)
);



#
# Table structure for table 'tx_org_department_mm_tx_org_cal'
#
CREATE TABLE tx_org_department_mm_tx_org_cal (
  uid_local int(11) unsigned DEFAULT '0' NOT NULL,
  uid_foreign int(11) unsigned DEFAULT '0' NOT NULL,
  tablenames varchar(30) DEFAULT '' NOT NULL,
  sorting int(11) unsigned DEFAULT '0' NOT NULL,
  sorting_foreign int(11) unsigned DEFAULT '0' NOT NULL,
  KEY uid_local (uid_local),
  KEY uid_foreign (uid_foreign)
);



#
# Table structure for table 'tx_org_department_mm_tx_org_departmentcat'
#
CREATE TABLE tx_org_department_mm_tx_org_departmentcat (
  uid_local int(11) unsigned DEFAULT '0' NOT NULL,
  uid_foreign int(11) unsigned DEFAULT '0' NOT NULL,
  tablenames varchar(30) DEFAULT '' NOT NULL,
  sorting int(11) unsigned DEFAULT '0' NOT NULL,
  KEY uid_local (uid_local),
  KEY uid_foreign (uid_foreign)
);



#
# Table structure for table 'tx_org_department_mm_tx_org_news'
#
CREATE TABLE tx_org_department_mm_tx_org_news (
  uid_local int(11) unsigned DEFAULT '0' NOT NULL,
  uid_foreign int(11) unsigned DEFAULT '0' NOT NULL,
  tablenames varchar(30) DEFAULT '' NOT NULL,
  sorting int(11) unsigned DEFAULT '0' NOT NULL,
  sorting_foreign int(11) unsigned DEFAULT '0' NOT NULL,
  KEY uid_local (uid_local),
  KEY uid_foreign (uid_foreign)
);



#
# Table structure for table 'tx_org_department_mm_fe_users'
#
CREATE TABLE tx_org_department_mm_fe_users (
  uid_local int(11) unsigned DEFAULT '0' NOT NULL,
  uid_foreign int(11) unsigned DEFAULT '0' NOT NULL,
  tablenames varchar(30) DEFAULT '' NOT NULL,
  sorting int(11) unsigned DEFAULT '0' NOT NULL,
  sorting_foreign int(11) unsigned DEFAULT '0' NOT NULL,
  KEY uid_local (uid_local),
  KEY uid_foreign (uid_foreign)
);



#
# Table structure for table 'tx_org_departmentcat'
#
CREATE TABLE tx_org_departmentcat (
  uid int(11) NOT NULL auto_increment,
  pid int(11) DEFAULT '0' NOT NULL,
  tstamp int(11) DEFAULT '0' NOT NULL,
  crdate int(11) DEFAULT '0' NOT NULL,
  cruser_id int(11) DEFAULT '0' NOT NULL,
  sorting int(10) DEFAULT '0' NOT NULL,
  deleted tinyint(4) DEFAULT '0' NOT NULL,
  hidden tinyint(4) DEFAULT '0' NOT NULL,
  title tinytext NOT NULL,
  title_lang_ol tinytext,

  PRIMARY KEY (uid),
  KEY parent (pid)

);



#
# Table structure for table 'tx_org_event'
#
CREATE TABLE tx_org_event (
  uid int(11) unsigned DEFAULT '0' NOT NULL auto_increment,
  pid int(11) unsigned DEFAULT '0' NOT NULL,
  tstamp int(11) unsigned DEFAULT '0' NOT NULL,
  crdate int(11) unsigned DEFAULT '0' NOT NULL,
  cruser_id int(11) unsigned DEFAULT '0' NOT NULL,
  sys_language_uid int(11) DEFAULT '0' NOT NULL,
  l10n_parent int(11) DEFAULT '0' NOT NULL,
  l10n_diffsource mediumtext,
  deleted tinyint(4) unsigned DEFAULT '0' NOT NULL,
  title tinytext,
  subtitle tinytext,
  teaser_title tinytext,
  teaser_subtitle tinytext,
  teaser_short mediumtext,
  bodytext mediumtext NOT NULL,
  length tinytext,
  tx_org_cal tinytext,
  documents_from_path tinytext,
  documents text,
  documentscaption tinytext,
  documentslayout tinyint(4) unsigned DEFAULT '0' NOT NULL,
  documentssize tinyint(4) unsigned DEFAULT '0' NOT NULL,
  tx_org_news text,
  image text,
  imagecaption text,
  imageseo text,
  imageheight tinytext,
  imagewidth tinytext,
  imageorient tinyint(4) unsigned NOT NULL default '0',
  imagecaption text,
  imagecols tinyint(4) unsigned NOT NULL default '0',
  imageborder tinyint(4) unsigned NOT NULL default '0',
  imagecaption_position varchar(12) default '',
  image_link text,
  image_zoom tinyint(3) unsigned NOT NULL default '0',
  image_noRows tinyint(3) unsigned NOT NULL default '0',
  image_effects tinyint(3) unsigned NOT NULL default '0',
  image_compression tinyint(3) unsigned NOT NULL default '0',
  image_frames tinyint(3) unsigned NOT NULL default '0',
  embeddedcode text,
  print text,
  printcaption text,
  printseo text,
  hidden tinyint(4) unsigned DEFAULT '0' NOT NULL,
  pages tinytext,
  fe_group int(11) DEFAULT '0' NOT NULL,
  keywords text,
  description text,
  
  PRIMARY KEY (uid),
  KEY parent (pid)
);



#
# Table structure for table 'tx_org_event_mm_tx_org_cal'
#
CREATE TABLE tx_org_event_mm_tx_org_cal (
  uid_local int(11) unsigned DEFAULT '0' NOT NULL,
  uid_foreign int(11) unsigned DEFAULT '0' NOT NULL,
  tablenames varchar(30) DEFAULT '' NOT NULL,
  sorting         int(11) unsigned DEFAULT '0' NOT NULL,
  sorting_foreign int(11) unsigned DEFAULT '0' NOT NULL,
  KEY uid_local (uid_local),
  KEY uid_foreign (uid_foreign)
);



#
# Table structure for table 'tx_org_event_mm_tx_org_news'
#
CREATE TABLE tx_org_event_mm_tx_org_news (
  uid_local int(11) unsigned DEFAULT '0' NOT NULL,
  uid_foreign int(11) unsigned DEFAULT '0' NOT NULL,
  tablenames varchar(30) DEFAULT '' NOT NULL,
  sorting int(11) unsigned DEFAULT '0' NOT NULL,
  sorting_foreign int(11) unsigned DEFAULT '0' NOT NULL,
  KEY uid_local (uid_local),
  KEY uid_foreign (uid_foreign)
);



#
# Table structure for table 'tx_org_headquarters'
#
CREATE TABLE tx_org_headquarters (
  uid int(11) unsigned DEFAULT '0' NOT NULL auto_increment,
  pid int(11) unsigned DEFAULT '0' NOT NULL,
  tstamp int(11) unsigned DEFAULT '0' NOT NULL,
  crdate int(11) unsigned DEFAULT '0' NOT NULL,
  cruser_id int(11) unsigned DEFAULT '0' NOT NULL,
  sys_language_uid int(11) DEFAULT '0' NOT NULL,
  l10n_parent int(11) DEFAULT '0' NOT NULL,
  l10n_diffsource mediumtext,
  sorting int(11) unsigned DEFAULT '0' NOT NULL,
  deleted tinyint(4) unsigned DEFAULT '0' NOT NULL,
  title tinytext,
  mail_address text NOT NULL,
  mail_postcode tinytext NOT NULL,
  mail_city tinytext NOT NULL,
  mail_country tinytext NOT NULL,
  mail_url text NOT NULL,
  mail_embeddedcode text,
  postbox_postbox text NOT NULL,
  postbox_postcode tinytext NOT NULL,
  postbox_city tinytext NOT NULL,
  fe_users tinytext,
  tx_org_department tinytext,
  telephone tinytext NOT NULL,
  fax tinytext NOT NULL,
  email tinytext NOT NULL,
  pubtrans_stop mediumtext NOT NULL,
  pubtrans_url tinytext NOT NULL,  
  pubtrans_embeddedcode text,
  image text,
  imagecaption text,
  imageseo text,
  imageheight tinytext,
  imagewidth tinytext,
  imageorient tinyint(4) unsigned NOT NULL default '0',
  imagecaption text,
  imagecols tinyint(4) unsigned NOT NULL default '0',
  imageborder tinyint(4) unsigned NOT NULL default '0',
  imagecaption_position varchar(12) default '',
  image_link text,
  image_zoom tinyint(3) unsigned NOT NULL default '0',
  image_noRows tinyint(3) unsigned NOT NULL default '0',
  image_effects tinyint(3) unsigned NOT NULL default '0',
  image_compression tinyint(3) unsigned NOT NULL default '0',
  image_frames tinyint(3) unsigned NOT NULL default '0',
  embeddedcode text,
  documents_from_path tinytext,
  documents text,
  documentscaption tinytext,
  documentslayout tinyint(4) unsigned DEFAULT '0' NOT NULL,
  documentssize tinyint(4) unsigned DEFAULT '0' NOT NULL,
  hidden tinyint(4) unsigned DEFAULT '0' NOT NULL,
  pages tinytext,
  fe_group int(11) DEFAULT '0' NOT NULL,
  keywords text,
  description text,
  
  PRIMARY KEY (uid),
  KEY parent (pid)
);



#
# Table structure for table 'tx_org_headquarters_mm_fe_users'
#
CREATE TABLE tx_org_headquarters_mm_fe_users (
  uid_local int(11) unsigned DEFAULT '0' NOT NULL,
  uid_foreign int(11) unsigned DEFAULT '0' NOT NULL,
  tablenames varchar(30) DEFAULT '' NOT NULL,
  sorting int(11) unsigned DEFAULT '0' NOT NULL,
  sorting_foreign int(11) unsigned DEFAULT '0' NOT NULL,
  KEY uid_local (uid_local),
  KEY uid_foreign (uid_foreign)
);



#
# Table structure for table 'tx_org_headquarters_mm_tx_org_cal'
#
CREATE TABLE tx_org_headquarters_mm_tx_org_cal (
  uid_local int(11) unsigned DEFAULT '0' NOT NULL,
  uid_foreign int(11) unsigned DEFAULT '0' NOT NULL,
  tablenames varchar(30) DEFAULT '' NOT NULL,
  sorting         int(11) unsigned DEFAULT '0' NOT NULL,
  sorting_foreign int(11) unsigned DEFAULT '0' NOT NULL,
  KEY uid_local (uid_local),
  KEY uid_foreign (uid_foreign)
);



#
# Table structure for table 'tx_org_headquarters_mm_tx_org_department'
#
CREATE TABLE tx_org_headquarters_mm_tx_org_department (
  uid_local int(11) unsigned DEFAULT '0' NOT NULL,
  uid_foreign int(11) unsigned DEFAULT '0' NOT NULL,
  tablenames varchar(30) DEFAULT '' NOT NULL,
  sorting         int(11) unsigned DEFAULT '0' NOT NULL,
  sorting_foreign int(11) unsigned DEFAULT '0' NOT NULL,
  KEY uid_local (uid_local),
  KEY uid_foreign (uid_foreign)
);



#
# Table structure for table 'tx_org_headquarters_mm_tx_org_news'
#
CREATE TABLE tx_org_headquarters_mm_tx_org_news (
  uid_local int(11) unsigned DEFAULT '0' NOT NULL,
  uid_foreign int(11) unsigned DEFAULT '0' NOT NULL,
  tablenames varchar(30) DEFAULT '' NOT NULL,
  sorting         int(11) unsigned DEFAULT '0' NOT NULL,
  sorting_foreign int(11) unsigned DEFAULT '0' NOT NULL,
  KEY uid_local (uid_local),
  KEY uid_foreign (uid_foreign)
);



#
# Table structure for table 'tx_org_location'
#
CREATE TABLE tx_org_location (
  uid int(11) unsigned DEFAULT '0' NOT NULL auto_increment,
  pid int(11) unsigned DEFAULT '0' NOT NULL,
  tstamp int(11) unsigned DEFAULT '0' NOT NULL,
  crdate int(11) unsigned DEFAULT '0' NOT NULL,
  cruser_id int(11) unsigned DEFAULT '0' NOT NULL,
  sys_language_uid int(11) DEFAULT '0' NOT NULL,
  l10n_parent int(11) DEFAULT '0' NOT NULL,
  l10n_diffsource mediumtext,
  sorting int(11) unsigned DEFAULT '0' NOT NULL,
  deleted tinyint(4) unsigned DEFAULT '0' NOT NULL,
  title tinytext,
  url text NOT NULL,
  mail_address text NOT NULL,
  mail_postcode tinytext NOT NULL,
  mail_city tinytext NOT NULL,
  mail_country tinytext NOT NULL,
  mail_url text NOT NULL,
  mail_embeddedcode text,
  telephone tinytext NOT NULL,
  ticket_telephone tinytext NOT NULL,
  ticket_url tinytext NOT NULL,
  fax tinytext NOT NULL,
  email tinytext NOT NULL,
  tx_org_cal tinytext NOT NULL,
  pubtrans_stop mediumtext NOT NULL,
  pubtrans_url tinytext NOT NULL,  
  pubtrans_embeddedcode text,
  citymap_url tinytext NOT NULL,
  citymap_embeddedcode text,
  image text,
  imagecaption text,
  imageseo text,
  imageheight tinytext,
  imagewidth tinytext,
  imageorient tinyint(4) unsigned NOT NULL default '0',
  imagecaption text,
  imagecols tinyint(4) unsigned NOT NULL default '0',
  imageborder tinyint(4) unsigned NOT NULL default '0',
  imagecaption_position varchar(12) default '',
  image_link text,
  image_zoom tinyint(3) unsigned NOT NULL default '0',
  image_noRows tinyint(3) unsigned NOT NULL default '0',
  image_effects tinyint(3) unsigned NOT NULL default '0',
  image_compression tinyint(3) unsigned NOT NULL default '0',
  image_frames tinyint(3) unsigned NOT NULL default '0',
  embeddedcode text,
  documents_from_path tinytext,
  documents text,
  documentscaption tinytext,
  documentslayout tinyint(4) unsigned DEFAULT '0' NOT NULL,
  documentssize tinyint(4) unsigned DEFAULT '0' NOT NULL,
  hidden tinyint(4) unsigned DEFAULT '0' NOT NULL,
  pages tinytext,
  fe_group int(11) DEFAULT '0' NOT NULL,
  keywords text,
  description text,
  
  PRIMARY KEY (uid),
  KEY parent (pid)
);



#
# Table structure for table 'tx_org_news'
#
# #32223 Category tree, 111130, dwildt+, tx_org_newscat_pidtree
CREATE TABLE tx_org_news (
  uid int(11) NOT NULL auto_increment,
  pid int(11) DEFAULT '0' NOT NULL,
  tstamp int(11) DEFAULT '0' NOT NULL,
  crdate int(11) DEFAULT '0' NOT NULL,
  cruser_id int(11) DEFAULT '0' NOT NULL,
  sys_language_uid int(11) DEFAULT '0' NOT NULL,
  l10n_parent int(11) DEFAULT '0' NOT NULL,
  l10n_diffsource mediumtext,
  deleted tinyint(4) DEFAULT '0' NOT NULL,
  type tinytext,
  title tinytext,
  subtitle tinytext,
  datetime int(11) unsigned DEFAULT '0' NOT NULL,
  bodytext mediumtext NOT NULL,
  teaser_title tinytext,
  teaser_subtitle tinytext,
  teaser_short text,
  newspage tinytext,
  newsurl tinytext,
  fe_user tinytext NOT NULL,
  tx_org_headquarters tinytext,
  tx_org_department tinytext NOT NULL,
  tx_org_event tinytext NOT NULL,
  hidden tinyint(4) DEFAULT '0' NOT NULL,
  tx_org_newscat tinytext,
  tx_org_newscat_pidtree int(11) DEFAULT '0' NOT NULL,
  topnews tinyint(4) DEFAULT '0' NOT NULL,
  pages tinytext,
  starttime int(11) DEFAULT '0' NOT NULL,
  endtime int(11) DEFAULT '0' NOT NULL,
  fe_group varchar(100) DEFAULT '0' NOT NULL,
  image text,
  imagecaption text,
  imageseo text,
  imageheight tinytext,
  imagewidth tinytext,
  imageorient tinyint(4) unsigned NOT NULL default '0',
  imagecaption text,
  imagecols tinyint(4) unsigned NOT NULL default '0',
  imageborder tinyint(4) unsigned NOT NULL default '0',
  imagecaption_position varchar(12) default '',
  image_link text,
  image_zoom tinyint(3) unsigned NOT NULL default '0',
  image_noRows tinyint(3) unsigned NOT NULL default '0',
  image_effects tinyint(3) unsigned NOT NULL default '0',
  image_compression tinyint(3) unsigned NOT NULL default '0',
  image_frames tinyint(3) unsigned NOT NULL default '0',
  embeddedcode text,
  documents_from_path tinytext,
  documents text,
  documentscaption tinytext,
  documentslayout tinyint(4) unsigned DEFAULT '0' NOT NULL,
  documentssize tinyint(4) unsigned DEFAULT '0' NOT NULL,
  keywords text,
  description text,
  
  PRIMARY KEY (uid),
  KEY parent (pid)
);



#
# Table structure for table 'tx_org_news_mm_tx_org_newscat'
#
CREATE TABLE tx_org_news_mm_tx_org_newscat (
  uid_local int(11) unsigned DEFAULT '0' NOT NULL,
  uid_foreign int(11) unsigned DEFAULT '0' NOT NULL,
  tablenames varchar(30) DEFAULT '' NOT NULL,
  sorting int(11) unsigned DEFAULT '0' NOT NULL,
  KEY uid_local (uid_local),
  KEY uid_foreign (uid_foreign)
);



#
# Table structure for table 'tx_org_newscat'
#
# #32223 Category tree, 111130, dwildt+, pidtree
CREATE TABLE tx_org_newscat (
  uid int(11) NOT NULL auto_increment,
  pid int(11) DEFAULT '0' NOT NULL,
  pidtree int(11) DEFAULT '0' NOT NULL,
  tstamp int(11) DEFAULT '0' NOT NULL,
  crdate int(11) DEFAULT '0' NOT NULL,
  cruser_id int(11) DEFAULT '0' NOT NULL,
  deleted tinyint(4) DEFAULT '0' NOT NULL,
  hidden tinyint(4) DEFAULT '0' NOT NULL,
  title tinytext NOT NULL,
  title_lang_ol tinytext NOT NULL,
  image text,
  imagecaption text,
  imageseo text,

  PRIMARY KEY (uid),
  KEY parent (pid)

);



#
# Table structure for table 'tx_org_tax'
#
CREATE TABLE tx_org_tax (
  uid int(11) unsigned DEFAULT '0' NOT NULL auto_increment,
  pid int(11) unsigned DEFAULT '0' NOT NULL,
  tstamp int(11) unsigned DEFAULT '0' NOT NULL,
  crdate int(11) unsigned DEFAULT '0' NOT NULL,
  cruser_id int(11) unsigned DEFAULT '0' NOT NULL,
  deleted tinyint(4) unsigned DEFAULT '0' NOT NULL,
  title tinytext,
  title_lang_ol tinytext,
  value tinytext,
  hidden tinyint(4) DEFAULT '0' NOT NULL,
  starttime int(11) DEFAULT '0' NOT NULL,
  endtime int(11) DEFAULT '0' NOT NULL,
  
  PRIMARY KEY (uid),
  KEY parent (pid)
);