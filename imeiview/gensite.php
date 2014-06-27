<?php
	$i=1; require_once('koneksi_db.php');
	
	$execute = mysql_query("SELECT id, name, address, city, province, latitude, longitude FROM it_site", $link);	
	
	header ('Content-Type: application/vnd.ms-excel');
	header("Content-Disposition: attachment; filename=ATP-all.xls");
	header("Pragma: no-cache");
	header("Expires: 0");
	
	print "<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Strict//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd\"><table border=1 style=\"border-collapse:collapse\"><tr height=35 align='center'><th style='background-color:#92D050; color:#FFFFFF;'>No</td><th style='background-color:#92D050; color:#FFFFFF;'>Site ID</th><th style='background-color:#92D050; color:#FFFFFF;'>Site Name</th><th style='background-color:#92D050; color:#FFFFFF;'>Address</th><th style='background-color:#92D050; color:#FFFFFF;'>City</th><th style='background-color:#92D050; color:#FFFFFF;'>Province</th><th style='background-color:#92D050; color:#FFFFFF;'>Latitude</th><th style='background-color:#92D050; color:#FFFFFF;'>longitude</th></tr>\n";
	while($data = mysql_fetch_array($execute)){
			print "<tr align='center'><td>$i</td><td align='left' style='margin-left:10px'>$data[0]</td><td align='left' style='margin-left:10px'>$data[1]</td><td align='left' style='margin-left:10px'>$data[2]</td><td>$data[3]</td><td>$data[4]</td><td>$data[5]</td><td>$data[6]</td></tr>";
	$i++;
	}
?>