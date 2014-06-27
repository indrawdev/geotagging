<?php
mysql_connect('localhost', 'isat-geotagging', 'V4Z5j53ec46Yppby') or die("Sorry, could not connect to server");
mysql_select_db('storages_indosat') or die("Sorry, could not select database");

mysql_query("UPDATE `it_site_part` SET `barcode`=NULL WHERE `barcode`='.'");

//RETR - 15 -> SITE ID|NETWORK ELEMENT ID|INDOSAT BARCODE NO|MANUFACTURER SERIAL NUMBER|EQUIPMENT DESCRIPTION|STATUS

$Qretr = mysql_query("
			SELECT a.`atm_id`, a.`from_neid`, b.`id`, c.`barcode`, c.`serial_no`, c.`name`
			FROM `it_atm` a
			JOIN `it_site` b ON b.`site_id`=a.`from_site`
			JOIN `it_site_part` c ON c.`atm_id`=a.`atm_id`
			WHERE a.`task_type`='RETR' AND a.`fl_approve` > 5 AND a.`fl_export`= 0
			ORDER BY a.`from_site` ASC");
if(mysql_num_rows($Qretr)){
	
	chdir('/var/www/html');
	$f_data = fopen('ftp/ftpindosat/IFEP1/OUTBOUND/SAP/MPA015/mpa015_2_'.date('Ymd_His').'.txt', 'w');
	fwrite($f_data, "SITE ID|NETWORK ELEMENT ID|INDOSAT BARCODE NO|MANUFACTURER SERIAL NUMBER|EQUIPMENT DESCRIPTION|STATUS\r\n");
	while($retr = mysql_fetch_object($Qretr)){
		fwrite($f_data, "$retr->id|$retr->from_neid|$retr->barcode|$retr->serial_no|$retr->name|RETR\r\n");
		mysql_query("UPDATE `it_atm` SET `fl_export`=1 WHERE `atm_id`='$retr->atm_id'");
	}
	fclose($f_data);
	
}

//TRNF / ACTV / REPR - 13 -> SITE ID|NETWORK ELEMENT ID|INDOSAT BARCODE NO|MANUFACTURER SERIAL NUMBER|EQUIPMENT DESCRIPTION|STATUS

//TRNF
$Qtrnf = mysql_query("
			SELECT a.`atm_id`, a.`from_neid`, b.`id`, c.`barcode`, c.`serial_no`, c.`name`
			FROM `it_atm` a
			JOIN `it_site` b ON b.`site_id`=a.`to_site`
			JOIN `it_site_part` c ON c.`atm_id`=a.`atm_id` AND c.detail <> 'repair'
			WHERE a.`task_type`='TRNF' AND a.`type`='dismantle' AND a.`fl_approve` > 5 AND a.`fl_export`= 0
			ORDER BY a.`to_site` ASC");

//ACTV
$Qactv = mysql_query("
			SELECT a.`atm_id`, a.`to_neid`, b.`id`, c.`barcode`, c.`serial_no`, c.`name`
			FROM `it_atm` a
			JOIN `it_site` b ON b.`site_id`=a.`to_site`
			JOIN `it_site_part` c ON c.`atm_id`=a.`atm_id` AND c.detail <> 'repair'
			WHERE a.`task_type`='TRNF' AND a.`type`='redeploy' AND a.`fl_approve` > 5 AND a.`fl_export`= 0
			ORDER BY a.`to_site` ASC");

//REPR
$Qrepr = mysql_query("
			SELECT a.`atm_id`, a.`from_neid`, b.`id`, c.`barcode`, c.`serial_no`, c.`name`
			FROM `it_atm` a
			JOIN `it_site` b ON b.`site_id`=a.`to_site`
			JOIN `it_site_part` c ON c.`atm_id`=a.`atm_id` AND c.detail='repair'
			WHERE a.`task_type`='TRNF' AND a.`fl_approve` > 5 AND a.`fl_export`= 0
			ORDER BY a.`to_site` ASC");

if(mysql_num_rows($Qtrnf) || mysql_num_rows($Qactv) || mysql_num_rows($Qrepr)){
	chdir('/var/www/html');
	$f_data = fopen('ftp/ftpindosat/IFEP1/OUTBOUND/SAP/MPA013/mpa013_2_'.date('Ymd_His').'.txt', 'w');
	fwrite($f_data, "SITE ID|NETWORK ELEMENT ID|INDOSAT BARCODE NO|MANUFACTURER SERIAL NUMBER|EQUIPMENT DESCRIPTION|STATUS\r\n");
	
	while($trnf = mysql_fetch_object($Qtrnf)){
		fwrite($f_data, "$trnf->id|$trnf->from_neid|$trnf->barcode|$trnf->serial_no|$trnf->name|TRNF\r\n");
		mysql_query("UPDATE `it_atm` SET `fl_export`=1 WHERE `atm_id`='$trnf->atm_id'");
	}
	
	while($actv = mysql_fetch_object($Qactv)){
		fwrite($f_data, "$actv->id|$actv->to_neid|$actv->barcode|$actv->serial_no|$actv->name|ACTV\r\n");
		mysql_query("UPDATE `it_atm` SET `fl_export`=1 WHERE `atm_id`='$actv->atm_id'");
	}
	
	while($repr = mysql_fetch_object($Qrepr)){
		fwrite($f_data, "$repr->id|$repr->from_neid|$repr->barcode|$repr->serial_no|$repr->name|REPR\r\n");
		mysql_query("UPDATE `it_atm` SET `fl_export`=1 WHERE `atm_id`='$repr->atm_id'");
	}
	
	fclose($f_data);
}

//REPL - 14 -> Log record no|Barcode number old|Barcode number new|Manuf SN old|Manuf SN new|Equipment number|System message

$Qrepl = mysql_query("
			SELECT a.`atm_id`, a.`from_neid`, b.`id`, c.`barcode`, c.`serial_no`, c.`name`
			FROM `it_atm` a
			JOIN `it_site` b ON b.`site_id`=a.`from_site`
			JOIN `it_site_part` c ON c.`atm_id`=a.`atm_id` AND c.`detail`='old'
			WHERE a.`task_type`='REPL' AND a.`fl_approve` > 5 AND a.`fl_export`= 0
			ORDER BY c.`name` ASC");
if(mysql_num_rows($Qrepl)){
	
	chdir('/var/www/html');
	$f_data = fopen('ftp/ftpindosat/IFEP1/OUTBOUND/SAP/MPA014/mpa014_2_'.date('Ymd_His').'.txt', 'w');
	fwrite($f_data, "SITE ID|NETWORK ELEMENT ID|OLD INDOSAT BARCODE NO|NEW INDOSAT BARCODE NO|OLD MANUFACTURER SERIAL NUMBER|NEW MANUFACTURER SERIAL NUMBER|EQUIPMENT DESCRIPTION|STATUS\r\n");
	while($repl = mysql_fetch_object($Qrepl)){
		
		$Qrepll = mysql_query("
			SELECT b.`barcode`, b.`serial_no`
			FROM `it_atm` a
			JOIN `it_site_part` b ON b.`atm_id`=a.`atm_id` AND b.`detail`='new' AND b.`name`='$repl->name'
			WHERE a.`atm_id`='$repl->atm_id'");
		if(mysql_num_rows($Qrepll)){
			$repll = mysql_fetch_object($Qrepll);
			fwrite($f_data, "$repl->id|$repl->from_neid|$repl->barcode|$repll->barcode|$repl->serial_no|$repll->serial_no|$repl->name|REPL\r\n");
		}
		
		mysql_query("UPDATE `it_atm` SET `fl_export`=1 WHERE `atm_id`='$repl->atm_id'");
	}
	fclose($f_data);
	
}

mysql_close();