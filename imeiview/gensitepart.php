<?php
	$i=1; require_once('koneksi_db.php');
	
	$execute = mysql_query("SELECT a.id, a.name, a.city, b.serial_no, b.barcode, b.detail, b.qty, b.uom, b.note, b.atp_id, c.title, b.atm_id, d.title
	FROM it_site a 
	JOIN it_site_part b 
	ON (b.id=a.id)
LEFT JOIN it_atp c
ON (b.atp_id=c.atp_id)
LEFT JOIN it_atm d
ON (b.atm_id=d.atm_id)", $link);	
	
	header ('Content-Type: application/vnd.ms-excel');
	header("Content-Disposition: attachment; filename=Inventory.xls");
	header("Pragma: no-cache");
	header("Expires: 0");
	
	print "<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Strict//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd\"><table border=1 style=\"border-collapse:collapse\"><tr height=35 align='center'><th style='background-color:#00B0F0; '>No</th><th style='background-color:#00B0F0; '>Site ID</th><th style='background-color:#00B0F0; '>Site Name</th><th style='background-color:#00B0F0; '>Area / City</th><th>NE ID</th><th style='background-color:#92D050; '>Serial No. (Factory)</th><th style='background-color:#92D050; '>Barcode No. (Indosat)</th><th style='background-color:#92D050; '>Description</th><th style='background-color:#92D050; '>Original Vendor/Brand </th><th style='background-color:#92D050; '>Quantity</th><th style='background-color:#92D050; '>UoM</th><th style='background-color:#92D050; '>Note</th><th style='background-color:#92D050; '>ATP ID</th><th style='background-color:#92D050; '>ATP Task Name</th><th style='background-color:#92D050; '>ATM ID</th><th style='background-color:#92D050; '>ATM Task Name</th></tr>\n";
	while($data = mysql_fetch_array($execute)){
			print "<tr><td>$i</td><td style='margin-left:10px'>$data[0]</td><td style='margin-left:10px'>$data[1]</td><td style='margin-left:10px'>$data[2]</td><td style='margin-left:10px'>&nbsp;</td><td style='margin-left:10px'>'$data[3]'</td><td style='margin-left:10px'>'$data[4]'</td><td style='margin-left:10px'>$data[5]</td><td style='margin-left:10px'>&nbsp;</td><td style='margin-left:10px'>$data[6]</td><td style='margin-left:10px'>$data[7]</td><td style='margin-left:10px'>$data[8]</td><td style='margin-left:10px'>$data[9]</td><td style='margin-left:10px'>$data[10]</td><td style='margin-left:10px'>$data[11]</td><td style='margin-left:10px'>$data[12]</td></tr>";
	$i++;
	}
?>