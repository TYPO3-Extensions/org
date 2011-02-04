<?php

########################################################################
# Extension Manager/Repository config file for ext "org".
#
# Auto generated 01-02-2011 01:18
#
# Manual updates:
# Only the data in the array - everything else is removed by next
# writing. "version" and "dependencies" must not be touched!
########################################################################

$EM_CONF[$_EXTKEY] = array(
	'title' => 'Org: news, events, staff, locations, calendar, ...',
	'description' => 'Org is a powerfull database for organisations, companies and organisers: You can publish all data in real terms. You can design an organisation with headquarters, locations, staff, events,  news and documents. Org displays data in list, single and calendar views.Org hasn\'t any PHP code. It is  based on the TYPO3-Fronend-Engine Browser. You can control and develop org by plugins and TypoScript.',
	'category' => 'plugin',
	'shy' => 0,
	'version' => '0.3.3',
	'dependencies' => 'browser,css_styled_content,linkhandler',
	'conflicts' => '',
	'priority' => '',
	'loadOrder' => '',
	'module' => '',
	'state' => 'beta',
	'uploadfolder' => 1,
	'createDirs' => '',
	'modify_tables' => '',
	'clearcacheonload' => 1,
	'lockType' => '',
	'author' => 'Dirk Wildt (Die Netzmacher)',
	'author_email' => 'http://wildt.at.die-netzmacher.de',
	'author_company' => '',
	'CGLcompliance' => '',
	'CGLcompliance_note' => '',
	'constraints' => array(
		'depends' => array(
			'browser' => '3.6.1-',
			'css_styled_content' => '1.0.0-',
			'linkhandler' => '0.3.1-',
		),
		'conflicts' => array(
		),
		'suggests' => array(
			'powermail' => '1.5.7-',
			'wt_cart' => '1.2.2-',
		),
	),
	'suggests' => array(
		'powermail' => '1.5.7-',
		'wt_cart' => '1.2.2-',
	),
	'_md5_values_when_last_written' => 'a:111:{s:9:"ChangeLog";s:4:"7487";s:21:"ext_conf_template.txt";s:4:"47ae";s:12:"ext_icon.gif";s:4:"ec42";s:14:"ext_tables.php";s:4:"2afd";s:14:"ext_tables.sql";s:4:"e76e";s:16:"locallang_db.xml";s:4:"f75d";s:7:"tca.php";s:4:"bc5f";s:16:"ext_icon/cal.gif";s:4:"ec42";s:24:"ext_icon/calentrance.gif";s:4:"ec42";s:23:"ext_icon/calspecial.gif";s:4:"ec42";s:20:"ext_icon/caltype.gif";s:4:"ec42";s:23:"ext_icon/department.gif";s:4:"78e9";s:26:"ext_icon/departmentcat.gif";s:4:"78e9";s:16:"ext_icon/doc.gif";s:4:"e66d";s:19:"ext_icon/doccat.gif";s:4:"e66d";s:25:"ext_icon/headquarters.gif";s:4:"13a5";s:21:"ext_icon/location.gif";s:4:"314b";s:17:"ext_icon/news.gif";s:4:"1ad5";s:20:"ext_icon/newscat.gif";s:4:"1ad5";s:23:"ext_icon/repertoire.gif";s:4:"1dc3";s:18:"ext_icon/staff.gif";s:4:"6705";s:16:"ext_icon/tax.gif";s:4:"bf10";s:31:"lib/class.tx_org_extmanager.php";s:4:"0a18";s:17:"lib/locallang.xml";s:4:"328f";s:37:"lib/icons/die-netzmacher.de_200px.gif";s:4:"48b3";s:31:"lib/icons/your-logo_de-blue.gif";s:4:"19f7";s:31:"lib/icons/your-logo_de-grey.gif";s:4:"1fbc";s:36:"lib/icons/your-logo_default-blue.gif";s:4:"710c";s:36:"lib/icons/your-logo_default-grey.gif";s:4:"6fdc";s:15:"res/favicon.ico";s:4:"5d26";s:20:"res/org_rss-feed.gif";s:4:"c5f9";s:20:"res/realurl_conf.php";s:4:"5203";s:14:"res/ticket.gif";s:4:"4859";s:21:"res/ticket_booked.gif";s:4:"9e2c";s:42:"res/html/calendar/201/datepicker_test.tmpl";s:4:"0ca0";s:34:"res/html/calendar/201/default.tmpl";s:4:"1b32";s:34:"res/html/calendar/202/default.tmpl";s:4:"6019";s:42:"res/html/calendar/202/default_wo_form.tmpl";s:4:"e282";s:34:"res/html/calendar/210/default.tmpl";s:4:"c118";s:34:"res/html/calendar/211/default.tmpl";s:4:"4b5a";s:36:"res/html/department/601/default.tmpl";s:4:"f023";s:36:"res/html/department/602/default.tmpl";s:4:"2d2c";s:36:"res/html/department/610/default.tmpl";s:4:"6a6c";s:36:"res/html/department/611/default.tmpl";s:4:"a2ad";s:38:"res/html/headquarters/501/default.tmpl";s:4:"7a66";s:38:"res/html/headquarters/502/default.tmpl";s:4:"2711";s:38:"res/html/headquarters/510/default.tmpl";s:4:"65bf";s:34:"res/html/location/701/default.tmpl";s:4:"9f05";s:34:"res/html/location/710/default.tmpl";s:4:"49cc";s:30:"res/html/news/401/default.tmpl";s:4:"49a0";s:40:"res/html/news/401/default_wo_filter.tmpl";s:4:"6eee";s:30:"res/html/news/410/default.tmpl";s:4:"b839";s:26:"res/html/news/499/rss.tmpl";s:4:"af6b";s:36:"res/html/repertoire/301/default.tmpl";s:4:"abfb";s:36:"res/html/repertoire/302/default.tmpl";s:4:"72c9";s:36:"res/html/repertoire/310/default.tmpl";s:4:"6e9f";s:38:"res/html/shopping_cart/801/default.css";s:4:"9d27";s:39:"res/html/shopping_cart/801/default.tmpl";s:4:"fed8";s:39:"res/html/shopping_cart/810/default.tmpl";s:4:"8532";s:31:"res/html/staff/101/default.tmpl";s:4:"f01b";s:31:"res/html/staff/110/default.tmpl";s:4:"e772";s:25:"static/base/constants.txt";s:4:"f494";s:21:"static/base/setup.txt";s:4:"1ae5";s:33:"static/calendar/201/constants.txt";s:4:"d41d";s:29:"static/calendar/201/setup.txt";s:4:"8b9f";s:33:"static/calendar/202/constants.txt";s:4:"d41d";s:29:"static/calendar/202/setup.txt";s:4:"4553";s:33:"static/calendar/210/constants.txt";s:4:"d41d";s:29:"static/calendar/210/setup.txt";s:4:"6ad1";s:33:"static/calendar/211/constants.txt";s:4:"d41d";s:29:"static/calendar/211/setup.txt";s:4:"ee37";s:35:"static/department/601/constants.txt";s:4:"d41d";s:31:"static/department/601/setup.txt";s:4:"3223";s:35:"static/department/602/constants.txt";s:4:"d41d";s:31:"static/department/602/setup.txt";s:4:"f7c6";s:35:"static/department/610/constants.txt";s:4:"d41d";s:31:"static/department/610/setup.txt";s:4:"63ae";s:35:"static/department/611/constants.txt";s:4:"d41d";s:31:"static/department/611/setup.txt";s:4:"aaf5";s:37:"static/headquarters/501/constants.txt";s:4:"d41d";s:33:"static/headquarters/501/setup.txt";s:4:"d607";s:37:"static/headquarters/502/constants.txt";s:4:"d41d";s:33:"static/headquarters/502/setup.txt";s:4:"4821";s:37:"static/headquarters/510/constants.txt";s:4:"d41d";s:33:"static/headquarters/510/setup.txt";s:4:"4604";s:33:"static/location/701/constants.txt";s:4:"d41d";s:29:"static/location/701/setup.txt";s:4:"204c";s:33:"static/location/710/constants.txt";s:4:"d41d";s:29:"static/location/710/setup.txt";s:4:"c020";s:29:"static/news/401/constants.txt";s:4:"d41d";s:25:"static/news/401/setup.txt";s:4:"58a6";s:29:"static/news/410/constants.txt";s:4:"d41d";s:25:"static/news/410/setup.txt";s:4:"0e35";s:29:"static/news/499/constants.txt";s:4:"1151";s:25:"static/news/499/setup.txt";s:4:"9315";s:35:"static/repertoire/301/constants.txt";s:4:"d41d";s:31:"static/repertoire/301/setup.txt";s:4:"7ad9";s:35:"static/repertoire/302/constants.txt";s:4:"d41d";s:31:"static/repertoire/302/setup.txt";s:4:"bd26";s:35:"static/repertoire/310/constants.txt";s:4:"d41d";s:31:"static/repertoire/310/setup.txt";s:4:"4e62";s:38:"static/shopping_cart/801/constants.txt";s:4:"d41d";s:34:"static/shopping_cart/801/setup.txt";s:4:"2da0";s:38:"static/shopping_cart/810/constants.txt";s:4:"fa13";s:34:"static/shopping_cart/810/setup.txt";s:4:"c30e";s:30:"static/staff/101/constants.txt";s:4:"d41d";s:26:"static/staff/101/setup.txt";s:4:"fff0";s:30:"static/staff/110/constants.txt";s:4:"d41d";s:26:"static/staff/110/setup.txt";s:4:"88e5";s:20:"tsConfig/de/page.txt";s:4:"2898";s:25:"tsConfig/default/page.txt";s:4:"f383";}',
);

?>
