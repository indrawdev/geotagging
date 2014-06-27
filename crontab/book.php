<?php
mysql_connect('localhost', 'isat-geotagging', 'V4Z5j53ec46Yppby') or die("Sorry, could not connect to server");
mysql_select_db('storages_indosat') or die("Sorry, could not select database");

function check_time($value){
	$time_difference = time() - $value;
	$result = round($time_difference / 60);
	return $result;
}

$Qlist = mysql_query("SELECT `table`, `idx`, `timelog` FROM `it_book` WHERE `fl_active`='0'") or die("failed, Sorry, could not execute query");
if(mysql_num_rows($Qlist)){
	while($list = mysql_fetch_object($Qlist)){
		if(check_time($list->timelog) > 59)
		mysql_query("DELETE FROM `it_book` WHERE `table`='$list->table' AND `idx`='$list->idx' AND `fl_active`='0'") or die("failed, Sorry, could not execute Delete query");
	}
}

mysql_close();