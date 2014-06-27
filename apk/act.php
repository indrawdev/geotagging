<?php require_once('../imeiview/koneksi_db.php'); $v = $_GET['v']; $act = $_GET['action'];
if($act == "set_active"){
	mysql_query("UPDATE `apps` SET `active`=NULL");
	mysql_query("UPDATE `apps` SET `active`=1, `timestamp`='".date('Y-m-d H:i:s')."' WHERE `version`=$v"); 
}
else if($act = "del"){
	$file = $_GET['file'];
	mysql_query("DELETE FROM `apps` WHERE `version`=$v");
	unlink("../media/apps/".$file);
}

?>