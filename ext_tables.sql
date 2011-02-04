# INDEX
# -----
# fe_users
# fe_users_mm_tx_org_news
# tx_org_cal
# tx_org_calentrance
# tx_org_calspecial
# tx_org_caltype
# tx_org_cal_mm_caltype
# tx_org_cal_mm_calentrance
# tx_org_cal_mm_location
# tx_org_cal_mm_repertoire
# tx_org_headquarters
# tx_org_headquarters_mm_fe_users
# tx_org_headquarters_mm_org
# tx_org_location
# tx_org_news
# tx_org_news_mm_newscat
# tx_org_newscat
# tx_org_department
# tx_org_department_mm_cal
# tx_org_department_mm_departmentcat
# tx_org_department_mm_fe_users
# tx_org_department_mm_news
# tx_org_departmentcat
# tx_org_repertoire
# tx_org_repertoire_mm_news
# tx_org_tax



#
# Table structure for table 'fe_users'
#
CREATE TABLE fe_users (
  tx_org_news tinytext,
  tx_org_headquarters tinytext,
  tx_org_department tinytext,
  tx_org_vita mediumtext NOT NULL,
  tx_org_imagecaption text,
  tx_org_imageseo text
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
  deleted tinyint(4) unsigned DEFAULT '0' NOT NULL,
  title tinytext,
  shortcut tinytext,
  datetime int(11) unsigned DEFAULT '0' NOT NULL,
  caltype tinytext,
  repertoire tinytext,
  location tinytext,
  calentrance tinytext,
  documents text,
  hidden tinyint(4) DEFAULT '0' NOT NULL,
  starttime int(11) DEFAULT '0' NOT NULL,
  endtime int(11) DEFAULT '0' NOT NULL,
  department tinytext NOT NULL,
  fe_group varchar(100) DEFAULT '0' NOT NULL,
  
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
  sorting int(11) unsigned DEFAULT '0' NOT NULL,
  deleted tinyint(4) unsigned DEFAULT '0' NOT NULL,
  title tinytext,
  value tinytext,
  tax tinytext,
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
  sorting int(11) unsigned DEFAULT '0' NOT NULL,
  deleted tinyint(4) unsigned DEFAULT '0' NOT NULL,
  title tinytext,
  calendar tinytext,
  hidden tinyint(4) DEFAULT '0' NOT NULL,
  
  PRIMARY KEY (uid),
  KEY parent (pid)
);



#
# Table structure for table 'tx_org_cal_mm_calentrance'
#
CREATE TABLE tx_org_cal_mm_calentrance (
  uid_local int(11) unsigned DEFAULT '0' NOT NULL,
  uid_foreign int(11) unsigned DEFAULT '0' NOT NULL,
  tablenames varchar(30) DEFAULT '' NOT NULL,
  sorting         int(11) unsigned DEFAULT '0' NOT NULL,
  sorting_foreign int(11) unsigned DEFAULT '0' NOT NULL,
  KEY uid_local (uid_local),
  KEY uid_foreign (uid_foreign)
);



#
# Table structure for table 'tx_org_cal_mm_caltype'
#
CREATE TABLE tx_org_cal_mm_caltype (
  uid_local int(11) unsigned DEFAULT '0' NOT NULL,
  uid_foreign int(11) unsigned DEFAULT '0' NOT NULL,
  tablenames varchar(30) DEFAULT '' NOT NULL,
  sorting         int(11) unsigned DEFAULT '0' NOT NULL,
  sorting_foreign int(11) unsigned DEFAULT '0' NOT NULL,
  KEY uid_local (uid_local),
  KEY uid_foreign (uid_foreign)
);



#
# Table structure for table 'tx_org_cal_mm_location'
#
CREATE TABLE tx_org_cal_mm_location (
  uid_local int(11) unsigned DEFAULT '0' NOT NULL,
  uid_foreign int(11) unsigned DEFAULT '0' NOT NULL,
  tablenames varchar(30) DEFAULT '' NOT NULL,
  sorting         int(11) unsigned DEFAULT '0' NOT NULL,
  sorting_foreign int(11) unsigned DEFAULT '0' NOT NULL,
  KEY uid_local (uid_local),
  KEY uid_foreign (uid_foreign)
);



#
# Table structure for table 'tx_org_cal_mm_repertoire'
#
CREATE TABLE tx_org_cal_mm_repertoire (
  uid_local int(11) unsigned DEFAULT '0' NOT NULL,
  uid_foreign int(11) unsigned DEFAULT '0' NOT NULL,
  tablenames varchar(30) DEFAULT '' NOT NULL,
  sorting         int(11) unsigned DEFAULT '0' NOT NULL,
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
  sorting int(11) unsigned DEFAULT '0' NOT NULL,
  deleted tinyint(4) unsigned DEFAULT '0' NOT NULL,
  title tinytext,
  mail_address text NOT NULL,
  mail_postcode tinytext NOT NULL,
  mail_city tinytext NOT NULL,
  mail_url text NOT NULL,
  mail_embeddedcode text,
  postbox_postbox text NOT NULL,
  postbox_postcode tinytext NOT NULL,
  postbox_city tinytext NOT NULL,
  department tinytext,
  telephone tinytext NOT NULL,
  fax tinytext NOT NULL,
  email tinytext NOT NULL,
  pubtrans_stop mediumtext NOT NULL,
  pubtrans_url tinytext NOT NULL,  
  pubtrans_embeddedcode text,
  image text,
  imagecaption text,
  imageseo text,
  embeddedcode text,
  documents text,
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
  sorting         int(11) unsigned DEFAULT '0' NOT NULL,
  sorting_foreign int(11) unsigned DEFAULT '0' NOT NULL,
  KEY uid_local (uid_local),
  KEY uid_foreign (uid_foreign)
);



#
# Table structure for table 'tx_org_headquarters_mm_org'
#
CREATE TABLE tx_org_headquarters_mm_org (
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
  sorting int(11) unsigned DEFAULT '0' NOT NULL,
  deleted tinyint(4) unsigned DEFAULT '0' NOT NULL,
  title tinytext,
  url text NOT NULL,
  mail_address text NOT NULL,
  mail_postcode tinytext NOT NULL,
  mail_city tinytext NOT NULL,
  mail_url text NOT NULL,
  mail_embeddedcode text,
  telephone tinytext NOT NULL,
  ticket_telephone tinytext NOT NULL,
  ticket_url tinytext NOT NULL,
  fax tinytext NOT NULL,
  email tinytext NOT NULL,
  calendar tinytext NOT NULL,
  pubtrans_stop mediumtext NOT NULL,
  pubtrans_url tinytext NOT NULL,  
  pubtrans_embeddedcode text,
  citymap_url tinytext NOT NULL,
  citymap_embeddedcode text,
  image text,
  imagecaption text,
  imageseo text,
  embeddedcode text,
  documents text,
  hidden tinyint(4) unsigned DEFAULT '0' NOT NULL,
  pages tinytext,
  fe_group int(11) DEFAULT '0' NOT NULL,
  keywords text,
  description text,
  
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
  sorting int(10) unsigned DEFAULT '0' NOT NULL,
  deleted tinyint(4) unsigned DEFAULT '0' NOT NULL,
  title tinytext,
  shortcut tinytext,
  departmentcat tinytext,
  headquarters int(11) unsigned DEFAULT '0' NOT NULL,
  manager int(11) unsigned DEFAULT '0' NOT NULL,
  telephone tinytext NOT NULL,
  fax tinytext NOT NULL,
  email tinytext NOT NULL,
  url tinytext NOT NULL,
  fe_users tinytext,
  calendar text,
  documents text,
  news text,
  image text,
  imagecaption text,
  imageseo text,
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
# Table structure for table 'tx_org_department_mm_cal'
#
CREATE TABLE tx_org_department_mm_cal (
  uid_local int(11) unsigned DEFAULT '0' NOT NULL,
  uid_foreign int(11) unsigned DEFAULT '0' NOT NULL,
  tablenames varchar(30) DEFAULT '' NOT NULL,
  sorting int(11) unsigned DEFAULT '0' NOT NULL,
  sorting_foreign int(11) unsigned DEFAULT '0' NOT NULL,
  KEY uid_local (uid_local),
  KEY uid_foreign (uid_foreign)
);



#
# Table structure for table 'tx_org_department_mm_departmentcat'
#
CREATE TABLE tx_org_department_mm_departmentcat (
  uid_local int(11) unsigned DEFAULT '0' NOT NULL,
  uid_foreign int(11) unsigned DEFAULT '0' NOT NULL,
  tablenames varchar(30) DEFAULT '' NOT NULL,
  sorting int(11) unsigned DEFAULT '0' NOT NULL,
  KEY uid_local (uid_local),
  KEY uid_foreign (uid_foreign)
);



#
# Table structure for table 'tx_org_department_mm_news'
#
CREATE TABLE tx_org_department_mm_news (
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

  PRIMARY KEY (uid),
  KEY parent (pid)

);



#
# Table structure for table 'tx_org_news'
#
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
  title tinytext,
  subtitle tinytext,
  datetime int(11) unsigned DEFAULT '0' NOT NULL,
  bodytext mediumtext NOT NULL,
  teaser_title tinytext,
  teaser_subtitle tinytext,
  teaser_short text,
  fe_user tinytext NOT NULL,
  department tinytext NOT NULL,
  repertoire tinytext NOT NULL,
  hidden tinyint(4) DEFAULT '0' NOT NULL,
  newscat tinytext,
  topnews tinyint(4) DEFAULT '0' NOT NULL,
  pages tinytext,
  starttime int(11) DEFAULT '0' NOT NULL,
  endtime int(11) DEFAULT '0' NOT NULL,
  fe_group varchar(100) DEFAULT '0' NOT NULL,
  image text,
  imagecaption text,
  imageseo text,
  embeddedcode text,
  documents text,
  keywords text,
  description text,
  
  PRIMARY KEY (uid),
  KEY parent (pid)
);



#
# Table structure for table 'tx_org_news_mm_newscat'
#
CREATE TABLE tx_org_news_mm_newscat (
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
CREATE TABLE tx_org_newscat (
  uid int(11) NOT NULL auto_increment,
  pid int(11) DEFAULT '0' NOT NULL,
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
# Table structure for table 'tx_org_repertoire'
#
CREATE TABLE tx_org_repertoire (
  uid int(11) unsigned DEFAULT '0' NOT NULL auto_increment,
  pid int(11) unsigned DEFAULT '0' NOT NULL,
  tstamp int(11) unsigned DEFAULT '0' NOT NULL,
  crdate int(11) unsigned DEFAULT '0' NOT NULL,
  cruser_id int(11) unsigned DEFAULT '0' NOT NULL,
  deleted tinyint(4) unsigned DEFAULT '0' NOT NULL,
  title tinytext,
  subtitle tinytext,
  producer tinytext,
  length tinytext,
  short mediumtext,
  bodytext mediumtext NOT NULL,
  actor tinytext,
  puppeteer tinytext,
  dancer tinytext,
  vocals tinytext,
  musician tinytext,
  video tinytext,
  narrator tinytext,
  director tinytext,
  advisor tinytext,
  assistant tinytext,
  stage_design tinytext,
  tailoring tinytext,
  requisite tinytext,
  garment tinytext,
  makeup tinytext,
  stage_manager tinytext,
  technical_manager tinytext,
  technique tinytext,
  light tinytext,
  sound tinytext,
  otherslabel tinytext,
  others tinytext,
  documents text,
  news text,
  image text,
  imagecaption text,
  imageseo text,
  embeddedcode text,
  print text,
  printcaption text,
  printseo text,
  calendar tinytext,
  hidden tinyint(4) unsigned DEFAULT '0' NOT NULL,
  pages tinytext,
  fe_group int(11) DEFAULT '0' NOT NULL,
  keywords text,
  description text,
  
  PRIMARY KEY (uid),
  KEY parent (pid)
);



#
# Table structure for table 'tx_org_repertoire_mm_news'
#
CREATE TABLE tx_org_repertoire_mm_news (
  uid_local int(11) unsigned DEFAULT '0' NOT NULL,
  uid_foreign int(11) unsigned DEFAULT '0' NOT NULL,
  tablenames varchar(30) DEFAULT '' NOT NULL,
  sorting int(11) unsigned DEFAULT '0' NOT NULL,
  sorting_foreign int(11) unsigned DEFAULT '0' NOT NULL,
  KEY uid_local (uid_local),
  KEY uid_foreign (uid_foreign)
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
  value tinytext,
  hidden tinyint(4) DEFAULT '0' NOT NULL,
  starttime int(11) DEFAULT '0' NOT NULL,
  endtime int(11) DEFAULT '0' NOT NULL,
  
  PRIMARY KEY (uid),
  KEY parent (pid)
);
