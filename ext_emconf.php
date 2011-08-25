<?php

########################################################################
# Extension Manager/Repository config file for ext "org".
#
# Auto generated 02-04-2011 02:13
#
# Manual updates:
# Only the data in the array - everything else is removed by next
# writing. "version" and "dependencies" must not be touched!
########################################################################

$EM_CONF[$_EXTKEY] = array(
	'title' => 'Organiser',
	'description' => 'Org is a powerfull database for organisations, companies and organisers: You can publish all data in real terms. You can design an organisation with headquarters, locations, staff, events,  news and documents. Org displays data in list, single and calendar views.Org hasn\'t any PHP code. It is  based on the TYPO3-Fronend-Engine Browser. You can control and develop org by plugins and TypoScript.',
	'category' => 'plugin',
	'shy' => 0,
	'version' => '2.0.2',
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
			'browser' => '3.7.0-',
			'css_styled_content' => '1.0.0-',
			'linkhandler' => '0.3.1-',
		),
		'conflicts' => array(
		),
		'suggests' => array(
			'powermail' => '1.6.3-',
			'wt_cart' => '1.3.0-',
		),
	),
	'suggests' => array(
		'powermail' => '1.6.3-',
		'wt_cart' => '1.3.0-',
	),
	'_md5_values_when_last_written' => 'a:93:{s:9:"ChangeLog";s:4:"d32a";s:21:"ext_conf_template.txt";s:4:"47ae";s:12:"ext_icon.gif";s:4:"ec42";s:14:"ext_tables.php";s:4:"509c";s:14:"ext_tables.sql";s:4:"d0d0";s:16:"locallang_db.xml";s:4:"aaf7";s:7:"tca.php";s:4:"f589";s:14:"doc/manual.pdf";s:4:"ea71";s:14:"doc/manual.sxw";s:4:"694e";s:16:"ext_icon/cal.gif";s:4:"aa44";s:24:"ext_icon/calentrance.gif";s:4:"bf10";s:20:"ext_icon/calpage.gif";s:4:"12db";s:23:"ext_icon/calspecial.gif";s:4:"aa44";s:20:"ext_icon/caltype.gif";s:4:"aa44";s:19:"ext_icon/calurl.gif";s:4:"ca5d";s:23:"ext_icon/department.gif";s:4:"78e9";s:26:"ext_icon/departmentcat.gif";s:4:"78e9";s:16:"ext_icon/doc.gif";s:4:"e66d";s:19:"ext_icon/doccat.gif";s:4:"e66d";s:18:"ext_icon/event.gif";s:4:"ec42";s:25:"ext_icon/headquarters.gif";s:4:"13a5";s:21:"ext_icon/location.gif";s:4:"314b";s:17:"ext_icon/news.gif";s:4:"bfa6";s:20:"ext_icon/newscat.gif";s:4:"bfa6";s:21:"ext_icon/newspage.gif";s:4:"12db";s:20:"ext_icon/newsurl.gif";s:4:"ca5d";s:18:"ext_icon/staff.gif";s:4:"6705";s:16:"ext_icon/tax.gif";s:4:"bf10";s:31:"lib/class.tx_org_extmanager.php";s:4:"0a18";s:17:"lib/locallang.xml";s:4:"c99e";s:37:"lib/icons/die-netzmacher.de_200px.gif";s:4:"48b3";s:31:"lib/icons/your-logo_de-blue.gif";s:4:"19f7";s:31:"lib/icons/your-logo_de-grey.gif";s:4:"1fbc";s:36:"lib/icons/your-logo_default-blue.gif";s:4:"710c";s:36:"lib/icons/your-logo_default-grey.gif";s:4:"6fdc";s:15:"res/favicon.ico";s:4:"5d26";s:20:"res/org_rss-feed.gif";s:4:"c5f9";s:20:"res/realurl_conf.php";s:4:"5203";s:14:"res/ticket.gif";s:4:"4859";s:21:"res/ticket_booked.gif";s:4:"9e2c";s:16:"res/html/org.css";s:4:"7168";s:34:"res/html/calendar/201/default.tmpl";s:4:"bb8e";s:34:"res/html/calendar/211/default.tmpl";s:4:"2d4a";s:36:"res/html/department/601/default.tmpl";s:4:"e87c";s:36:"res/html/department/611/default.tmpl";s:4:"3971";s:38:"res/html/headquarters/501/default.tmpl";s:4:"5d67";s:38:"res/html/headquarters/511/default.tmpl";s:4:"8a56";s:34:"res/html/location/701/default.tmpl";s:4:"8c36";s:34:"res/html/location/711/default.tmpl";s:4:"daa1";s:30:"res/html/news/401/default.tmpl";s:4:"e052";s:30:"res/html/news/411/default.tmpl";s:4:"1816";s:26:"res/html/news/499/rss.tmpl";s:4:"af6b";s:38:"res/html/shopping_cart/801/default.css";s:4:"9d27";s:39:"res/html/shopping_cart/801/default.tmpl";s:4:"fed8";s:39:"res/html/shopping_cart/811/default.tmpl";s:4:"8532";s:31:"res/html/staff/101/default.tmpl";s:4:"5537";s:31:"res/html/staff/111/default.tmpl";s:4:"9ab7";s:25:"static/base/constants.txt";s:4:"6c79";s:21:"static/base/setup.txt";s:4:"1fb6";s:33:"static/calendar/201/constants.txt";s:4:"d41d";s:29:"static/calendar/201/setup.txt";s:4:"c6da";s:41:"static/calendar/201/expired/constants.txt";s:4:"d41d";s:37:"static/calendar/201/expired/setup.txt";s:4:"ee66";s:33:"static/calendar/211/constants.txt";s:4:"d41d";s:29:"static/calendar/211/setup.txt";s:4:"8470";s:35:"static/department/601/constants.txt";s:4:"d41d";s:31:"static/department/601/setup.txt";s:4:"6da9";s:35:"static/department/611/constants.txt";s:4:"d41d";s:31:"static/department/611/setup.txt";s:4:"9030";s:37:"static/headquarters/501/constants.txt";s:4:"d41d";s:33:"static/headquarters/501/setup.txt";s:4:"7c34";s:37:"static/headquarters/511/constants.txt";s:4:"d41d";s:33:"static/headquarters/511/setup.txt";s:4:"69a6";s:33:"static/location/701/constants.txt";s:4:"d41d";s:29:"static/location/701/setup.txt";s:4:"b937";s:33:"static/location/711/constants.txt";s:4:"d41d";s:29:"static/location/711/setup.txt";s:4:"c291";s:29:"static/news/401/constants.txt";s:4:"d41d";s:25:"static/news/401/setup.txt";s:4:"9b04";s:29:"static/news/411/constants.txt";s:4:"d41d";s:25:"static/news/411/setup.txt";s:4:"d7fc";s:29:"static/news/499/constants.txt";s:4:"1151";s:25:"static/news/499/setup.txt";s:4:"9315";s:38:"static/shopping_cart/801/constants.txt";s:4:"d41d";s:34:"static/shopping_cart/801/setup.txt";s:4:"7811";s:38:"static/shopping_cart/811/constants.txt";s:4:"fa13";s:34:"static/shopping_cart/811/setup.txt";s:4:"9320";s:30:"static/staff/101/constants.txt";s:4:"d41d";s:26:"static/staff/101/setup.txt";s:4:"4ff6";s:30:"static/staff/111/constants.txt";s:4:"d41d";s:26:"static/staff/111/setup.txt";s:4:"effe";s:20:"tsConfig/de/page.txt";s:4:"757f";s:25:"tsConfig/default/page.txt";s:4:"5aae";}',
);

?>