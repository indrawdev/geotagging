<?php
	$i=1; require_once('koneksi_db.php');
	
	$execute = mysql_query("SELECT it_imei.imei_id, it_user.name, it_imei.login_last, it_imei.time_entry FROM it_imei LEFT OUTER JOIN it_user ON (it_imei.user_id=it_user.user_id) ORDER BY it_imei.login_last DESC", $link);	
	
	header ('Content-Type: application/vnd.ms-excel');
	header("Content-Disposition: attachment; filename=IMEI.xls");
	header("Pragma: no-cache");
	header("Expires: 0");
	
	print "<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Strict//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd\"><table border=1 style=\"border-collapse:collapse\"><tr height=40 align='center'><th style='background-color:#538dd5; color:#FFFFFF;'>No</td><th style='background-color:#538dd5; color:#FFFFFF;'>IMEI</th><th style='background-color:#538dd5; color:#FFFFFF;'>Name</th><th style='background-color:#538dd5; color:#FFFFFF;'>Last Login</th><th style='background-color:#538dd5; color:#FFFFFF;'>Time Entry</th></tr>\n";
	while($data = mysql_fetch_array($execute)){
			print "<tr align='center'><td>$i</td><td>'$data[0]'</td><td align='left' style='margin-left:10px'>$data[1]</td><td>$data[2]</td><td>$data[3]</td></tr>";
	$i++;
	}
?>