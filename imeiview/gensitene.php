<?php
	$i=1; require_once('koneksi_db.php');
	
	$execute = mysql_query("SELECT a.`id`, a.`name`, b.`neid`
FROM `it_site` a
JOIN `it_network` b ON (b.`id`=a.`id`) LIMIT 500000", $link);	
	
	header ('Content-Type: application/vnd.ms-excel');
	header("Content-Disposition: attachment; filename=ATP-all.xls");
	header("Pragma: no-cache");
	header("Expires: 0");
	
	print "<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Strict//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd\"><table border=1 style=\"border-collapse:collapse\"><tr height=35 align='center'><th style='background-color:#92D050; color:#FFFFFF;'>No</td><th style='background-color:#92D050; color:#FFFFFF;'>Site ID</th><th style='background-color:#92D050; color:#FFFFFF;'>Site Name</th><th style='background-color:#92D050; color:#FFFFFF;'>NE ID</th></tr>\n";
	while($data = mysql_fetch_array($execute)){
			print "<tr align='center'><td>$i</td><td align='left' style='margin-left:10px'>$data[0]</td><td align='left' style='margin-left:10px'>$data[1]</td><td align='left' style='margin-left:10px'>$data[2]</td></tr>";
	$i++;
	}
?>