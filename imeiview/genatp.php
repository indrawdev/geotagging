<?php
	$i=1; require_once('koneksi_db.php');
	
	$execute = mysql_query("SELECT b.name, title, brand, DATE(FROM_UNIXTIME(timelog))
	FROM it_atp a
	JOIN it_site b
	ON (a.site_id=b.site_id)", $link);	
	
	header ('Content-Type: application/vnd.ms-excel');
	header("Content-Disposition: attachment; filename=ATP-all.xls");
	header("Pragma: no-cache");
	header("Expires: 0");
	
	print "<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Strict//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd\"><table border=1 style=\"border-collapse:collapse\"><tr height=35 align='center'><th style='background-color:#92D050; color:#FFFFFF;'>No</td><th style='background-color:#92D050; color:#FFFFFF;'>Site Name</th><th style='background-color:#92D050; color:#FFFFFF;'>Task Title</th><th style='background-color:#92D050; color:#FFFFFF;'>Doc</th><th style='background-color:#92D050; color:#FFFFFF;'>Time Entry</th></tr>\n";
	while($data = mysql_fetch_array($execute)){
			print "<tr align='center'><td>$i</td><td align='left' style='margin-left:10px'>$data[0]</td><td align='left' style='margin-left:10px'>$data[1]</td><td align='left' style='margin-left:10px'>$data[2]</td><td>$data[3]</td></tr>";
	$i++;
	}
?>