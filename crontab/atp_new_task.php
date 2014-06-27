<?php

mysql_connect('localhost', 'isat-geotagging', 'V4Z5j53ec46Yppby') or die("Sorry, could not connect to server");
mysql_select_db('storages_indosat') or die("Sorry, could not select database");

require_once 'class.phpmailer.php';

/*$Qlist = mysql_query("
	SELECT b.`user_id`, b.`name`, b.`email`
	FROM `it_atp` a
	JOIN `it_user` b ON b.`user_id`=a.`user_indosat` AND b.`fl_active`=1
	WHERE a.`fl_status`=0
	GROUP BY a.`user_indosat`
") or die("failed, Sorry, could not execute query");*/
$Qtask = mysql_query("SELECT `title`, `brand` FROM `it_atp` WHERE `fl_status`=0") or die("failed, Sorry, could not execute query");
if(mysql_num_rows($Qtask)){
	
	$i = 0;
	$lists = '';
	//$Qtask = mysql_query("SELECT `title`, `brand` FROM `it_atp` WHERE `user_indosat`='$list->user_id' AND `fl_status`=0") or die("failed, Sorry, could not execute query");
	while($task = mysql_fetch_object($Qtask)){
		if($i < 25){
			$lists = '<li>'.$task->title.' ('.$task->brand.')</li>'.$lists;
			$i++;
		}
		
		if($i == 25){
			$lists .= '<li><b>&hellip;</b></li>';
			$i++;
		}
	}
	
	$Qlist = mysql_query("SELECT `user_id`, `name`, `email` FROM `it_user` WHERE `role_id`=4 AND `fl_active`=1") or die("failed, Sorry, could not execute query");
	while($list = mysql_fetch_object($Qlist)){
		if($list->email):
		
		$body = 'Notified that you have <b>'.mysql_num_rows($Qtask).'</b> pending approval for New Acceptance Test Procedure (ATP) task:<br />';
		$body .= '<ul>'.$lists.'</ul>';
		$body .= 'Please login to Indosat Geotagging System (<a href="https://indosat-geotaging.com/index.php/main/atp_app" style="color:#0079C0;text-decoration:none">Management ATP (Approval)</a>).';
		
		$to_name = $list->name;
		$messages = '<div style="color:#555;line-height:1.5;width:500px;margin:30px auto;border:1px solid #DDD"><h1 style="background:#EEE;font-weight:normal;font-size:15px;margin:0;padding:10px;border-bottom:1px solid #DDD">Indosat Geotagging System</h1><div style="background:#FFF;font-size:12px;padding:10px"><h2 style="font-weight:bold;font-size:12px;text-align:center;margin:0 0 10px 0;padding:0 0 10px 0;border-bottom:1px dotted #DDD">Reminder Approval - ATP</h2><p style="margin:7px 0;padding:0">Dear '.$to_name.',</p><p style="margin:7px 0;padding:0">'.$body.'</p><p style="margin:7px 0;padding:0">Thanks</p><h4 style="font-weight:normal;font-size:11px;font-style:italic;text-align:center;margin:10px 0 0 0;padding:10px 0 0 0;border-top:1px dotted #DDD">Please don\'t reply, this email automatically sent by the <a href="https://indosat-geotaging.com/" style="color:#0079C0;text-decoration:none">Indosat Geotagging System</a>.</h4></div></div>';
		
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
		$mail->Subject = 'Reminder Approval - New ATP Task';
		$mail->MsgHTML($messages);
		
		$mail->AddAddress($list->email, $to_name);
		$mail->Send();
		endif;
	}
}

mysql_close();