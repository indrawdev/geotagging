<?php
mysql_connect('localhost', 'isat-geotagging', 'V4Z5j53ec46Yppby') or die("Sorry, could not connect to server");
mysql_select_db('storages_indosat') or die("Sorry, could not select database");

date_default_timezone_set('Asia/Jakarta');
$Qlist = mysql_query("SELECT `atm_id`, `timelog` FROM `it_atm` WHERE `fl_status`=0");
if(mysql_num_rows($Qlist)){
	$current = time();
	while($list = mysql_fetch_object($Qlist)){
		$diff = $current - $list->timelog;
		if($diff >= 7776000) mysql_query("DELETE FROM `it_atm` WHERE `atm_id`='$list->atm_id'");
	}
}

mysql_close();