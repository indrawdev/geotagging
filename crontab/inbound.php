<?php
mysql_connect('localhost', 'isat-geotagging', 'V4Z5j53ec46Yppby') or die("Sorry, could not connect to server");
mysql_select_db('storages_indosat') or die("Sorry, could not select database");

function amankan($var){
	$var = str_replace(array("'", '"'), array("\'", "\""), $var);
	return $var;
}

chdir('/apps/html');
$dirPath = 'ftp/ftpindosat/IFEP1/INBOUND/SAP/MPA011';
if($handle = opendir($dirPath))
while(false !== ($file = readdir($handle))){
	if($file != '.' && $file != '..'){
		if(is_file("$dirPath/$file")){
			
			$fgc = file_get_contents('ftp/ftpindosat/IFEP1/INBOUND/SAP/MPA011/'.$file);
			$line = explode("\n", $fgc);
			
			for($i=1; $i < count($line); $i++){
				$dt = explode("|", amankan($line[$i]));
				$dt[2] = str_replace(array("\r", " "), "", $dt[2]);
				
				if($dt[1]){
					$Qcheck = mysql_query("SELECT `site_id` FROM `it_site` WHERE `id`='$dt[0]'");
					if(!mysql_num_rows($Qcheck)){
						if($dt[2]) mysql_query("INSERT INTO `it_site` (`id`, `name`) VALUES ('$dt[0]', '$dt[1]')"); else mysql_query("INSERT INTO `it_site` (`id`, `name`, `type`) VALUES ('$dt[0]', '$dt[1]', 'wh')");
					}
					/*if(mysql_num_rows($Qcheck)){
						$check = mysql_fetch_object($Qcheck);
					}else{
						mysql_query("INSERT INTO `it_site` (`id`, `name`) VALUES ('$dt[0]', '$dt[1]')");
						$Qcheck = mysql_query("SELECT LAST_INSERT_ID() AS `site_id`");
						$check = mysql_fetch_object($Qcheck);
					}*/
					
					if($dt[2]){
						$Qnetwork = mysql_query("SELECT 1 FROM `it_network` WHERE `neid`='$dt[2]' AND `id`='$dt[0]'");
						if(!mysql_num_rows($Qnetwork)) mysql_query("INSERT INTO `it_network` (`neid`, `id`) VALUES ('$dt[2]', '$dt[0]')");
					}
					
					//mysql_query("INSERT INTO `it_inbound` (`id`, `name`, `network_id`, `time_entry`) VALUES ('$dt[0]', '$dt[1]', '$dt[2]', CURRENT_TIMESTAMP())");
				}
				
				copy('/apps/html/ftp/ftpindosat/IFEP1/INBOUND/SAP/MPA011/'.$file, '/apps/html/ftp/ftpindosat/IFEP1/INBOUND/SAP/MPA011/PROCESSED/'.$file);
				unlink('/apps/html/ftp/ftpindosat/IFEP1/INBOUND/SAP/MPA011/'.$file);
				
				$done = 1;
			}
			
		}
	}
}
closedir($handle);
mysql_close();