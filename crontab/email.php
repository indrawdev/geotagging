<?php
mysql_connect('localhost', 'isat-geotagging', 'V4Z5j53ec46Yppby') or die("Sorry, could not connect to server");
mysql_select_db('storages_indosat') or die("Sorry, could not select database");

require_once 'class.phpmailer.php';

$Qlist = mysql_query("SELECT `log_id`, `subject`, `message`, `to_email`, `to_name` FROM `logs_email` WHERE `fl_status`=0 ORDER BY `log_id` ASC LIMIT 1") or 
die("failed, Sorry, could not execute query");
if(mysql_num_rows($Qlist)){
	while($list = mysql_fetch_object($Qlist)){
		$mail = new PHPMailer();
		$mail->IsSMTP();
		$mail->Host = 'mail.google.com';
		$mail->SMTPAuth = true;
		$mail->SMTPSecure = 'ssl';
		$mail->Host = 'smtp.gmail.com';
		$mail->Port = 465;
		
		$mail->Username = "indosat.geotaging@gmail.com";
		$mail->Password = "metricIsat++";
		
		$mail->SetFrom("indosat.geotaging@gmail.com", "Indosat Geotaging System");
		$mail->Subject = $list->subject;
		$mail->MsgHTML($list->message);
		
		$mail->AddAddress($list->to_email, $list->to_name);
		$mail->Send();
		
		mysql_query("UPDATE `logs_email` SET `fl_status`=1 WHERE `log_id`='$list->log_id'");
	}
}

mysql_close();
