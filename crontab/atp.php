<?php
mysql_connect('localhost', 'isat-geotagging', 'V4Z5j53ec46Yppby') or die("Sorry, could not connect to server");
mysql_select_db('storages_indosat') or die("Sorry, could not select database");

$Qlist = mysql_query("
			SELECT a.`atp_id`, a.`neid`, b.`id`, c.`barcode`, c.`serial_no`, c.`note`
			FROM `it_atp` a
			JOIN `it_site` b ON b.`site_id`=a.`site_id`
			JOIN `it_site_part` c ON c.`atp_id`=a.`atp_id`
			WHERE a.`fl_approve` > 5 AND a.`fl_export`= 0
			ORDER BY a.`site_id` ASC");
if(mysql_num_rows($Qlist)){
	
	chdir('/var/www/html');
	$f_data = fopen('ftp/ftpindosat/IFEP1/OUTBOUND/SAP/MPA012/mpa012_2_'.date('Ymd_His').'.txt', 'w');
	fwrite($f_data, "SITE ID|NETWORK ELEMENT ID|INDOSAT BARCODE NO|MANUFACTURER SERIAL NUMBER|EQUIPMENT DESCRIPTION|STATUS\r\n");
	while($list = mysql_fetch_object($Qlist)){
		fwrite($f_data, "$list->id|$list->network_id|$list->barcode|$list->serial_no|$list->note|CRTD\r\n");
		//mysql_query("UPDATE `it_atp` SET `fl_export`=1 WHERE `atp_id`='$list->atp_id'");
	}
	fclose($f_data);
	
}