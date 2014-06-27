<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!--Developed by irvanfauzie@gmail.com-->
<head>
<title>Indosat</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta http-equiv="imagetoolbar" content="no" />
<meta http-equiv="X-UA-Compatible" content="IE=9" />
<meta name="robots" content="noindex, nofollow" />
<style type="text/css">
body{
	font:12px Tahoma, Geneva, sans-serif;
}
h1{
	font:16px Tahoma, Geneva, sans-serif;
	font-weight:bold;
	border-bottom:2px solid #999
}
table{
	font:12px Tahoma, Geneva, sans-serif;
	border:0;
	margin:0;
	padding:0
}
form{
	margin:10px 0 30px 0
}
form input, form textarea{
	border:1px solid #666;
	font:12px Tahoma, Geneva, sans-serif;
	padding:5px;
	width:200px
}
form input[type=radio]{
	width:auto
}
form select{
	border:1px solid #666;
	font:12px Tahoma, Geneva, sans-serif;
	padding:5px;
	width:212px
}
.button{
	background:#EEE;
	font-weight:bold;
	cursor:pointer;
	width:100px
}
.hidden{
	background:#FFC;
	font:11px Tahoma, Geneva, sans-serif;
	border:1px solid #030
}
.warning{
	background:#FFEBE8;
	text-align:center;
	padding:10px;
	border:1px solid #C00
}
.info{
	background:#ECEFF6;
	text-align:center;
	padding:10px;
	border:1px solid #0F67A1
}
.note{
	background:#F8F8F8;
	margin:0 0 30px 0;
	padding:10px
}
</style>
</head>
<body>

<h1>ADD IMEI</h1>
<?php

//mysql_connect('localhost', 'root', '') or die("Sorry, could not connect to server");
mysql_connect('localhost', 'root', '') or die("Sorry, could not connect to server");
mysql_select_db('geotagging') or die("Sorry, could not select database");

if($_POST):
if(md5($_POST['ifpsd'].'x_9') == 'dab4e62130ea8fc01df5774c38d71c62'){
	
	for($i=0; $i < 9; $i++){
		if($_POST['imei'][$i]) mysql_query("INSERT INTO `it_imei` (`imei_id`, `time_entry`) VALUES ('".preg_replace('#[^A-Za-z0-9]#i', '', $_POST['imei'][$i])."', CURRENT_TIMESTAMP())");//mysql_query("INSERT INTO `it_imei` (`imei_id`, `time_entry`) VALUES ('".$_POST['imei'][$i]."', CURRENT_TIMESTAMP())");
	}
	
	echo '<div class="info" style="width:280px">';
	echo 'Submit imei successful..';
	echo '<ol style="text-align:left">';
	for($i=0; $i < 5; $i++){
		if($_POST['imei'][$i]) echo '<li>'.preg_replace('#[^A-Za-z0-9]#i', '', $_POST['imei'][$i]).'</li>';
	}
	echo '</ol>';
	echo '</div>';
}
else echo '<div class="warning" style="width:280px">Invalid password :P</div>';
endif;
?>
<form method="post" action=""><table>
<tr><td width="65" valign="top">Imei:</td><td><?php for($i=1; $i < 6; $i++) echo $i.' <input type="text" name="imei[]" /><br />' ?></td></tr>
<tr><td>Password:</td><td align="right"><input type="password" name="ifpsd" class="hidden" /></td></tr>
<tr><td></td><td align="center"><input type="submit" class="button" value="Submit" /></td></tr>
</table>
</form>

</body>
</html>