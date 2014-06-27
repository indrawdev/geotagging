<?php include '.conf';
//mysql_connect(DB_HOST, DB_USER, DB_PASS) or die("Sorry, could not connect to server");
//mysql_select_db(DB_NAME) or die("Sorry, could not select database");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!--Developed by irvanfauzie@gmail.com-->
<head>
<title>Graph Console</title>
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
	margin:0 0 50px 0
}
form input{
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
	width:200px
}
label{
	cursor:pointer
}
.button{
	background:#EEE;
	font-weight:bold;
	cursor:pointer;
	width:75px
}
.hidden{
	background:#FFC;
	font:11px Tahoma, Geneva, sans-serif;
	border:1px solid #030
}
</style>
</head>
<body>

<h1>LOGIN</h1>
<form method="post" action="<?php echo GRAPH ?>user/login.if">
<table>
<tr><td width="80">username:</td><td><input type="text" name="username" /></td></tr>
<tr><td>password:</td><td><input type="password" name="password" /></td></tr>
<tr><td></td><td><input type="submit" class="button" value="Login" /></td></tr>
<tr><td>imei:</td><td><input type="text" name="imei" class="hidden" /></td></tr>
</table>
</form>

<h1>LOGIN SITE</h1>
<form method="post" action="<?php echo GRAPH ?>user/login-indosat.if">
<table>
<tr><td width="80">username:</td><td><input type="text" name="username" /></td></tr>
<tr><td>password:</td><td><input type="password" name="password" /></td></tr>
<tr><td></td><td><input type="submit" class="button" value="Login" /></td></tr>
</table>
</form>

<h1>PRELOAD QUEST FORM ATP</h1>
<form method="get" action="<?php echo GRAPH ?>atp/quest-preload.if">
<table>
<tr><td></td><td><input type="submit" class="button" value="GET" /></td></tr>
<tr><td width="80">atp_id:</td><td><input type="text" name="atp_id" class="hidden" /></td></tr>
<tr><td>type:</td><td>
<label><input type="radio" name="type" value="chapter" /> chapter</label>
<span style="padding:0 10px">&nbsp;</span>
<label><input type="radio" name="type" value="subchapter" /> subchapter</label>
</td></tr>
<tr><td>user_id:</td><td><input type="text" name="user_id" class="hidden" /></td></tr>
<tr><td>password:</td><td><input type="text" name="token" class="hidden" /></td></tr>
</table>
</form>

<h1>SUBMIT FOTO LOGIN SITE</h1>
<form method="post" action="<?php echo GRAPH ?>atp/login-indosat-foto.if" enctype="multipart/form-data">
<table>
<tr><td>image_upload:</td><td><input type="file" name="image_upload" /></td></tr>
<tr><td></td><td><input type="submit" class="button" value="Upload" /><br /><br /></td></tr>
<tr><td>atp_id:</td><td><input type="text" name="atp_id" class="hidden" /></td></tr>
<tr><td>user_id:</td><td><input type="text" name="user_id" class="hidden" /></td></tr>
</table>
</form>

<h1>SUBMIT SITE BARCODE</h1>
<form method="post" action="<?php echo GRAPH ?>global/site-barcode.if" enctype="multipart/form-data">
<table>
<tr><td width="80">name[]:</td><td><input type="text" name="name[]" /></td></tr>
<tr><td>barcode[]:</td><td><input type="text" name="barcode[]" /></td></tr>
<tr><td>serial_no[]:</td><td><input type="text" name="serial_no[]" /></td></tr>
<tr><td>image_upload[]:</td><td><input type="file" name="image_upload[]" /></td></tr>
<tr><td colspan="2"><hr /></td></tr>
<tr><td>name[]:</td><td><input type="text" name="name[]" /></td></tr>
<tr><td>barcode[]:</td><td><input type="text" name="barcode[]" /></td></tr>
<tr><td>serial_no[]:</td><td><input type="text" name="serial_no[]" /></td></tr>
<tr><td>image_upload[]:</td><td><input type="file" name="image_upload[]" /></td></tr>
<tr><td colspan="2"><hr /></td></tr>
<tr><td>name[]:</td><td><input type="text" name="name[]" /></td></tr>
<tr><td>barcode[]:</td><td><input type="text" name="barcode[]" /></td></tr>
<tr><td>serial_no[]:</td><td><input type="text" name="serial_no[]" /></td></tr>
<tr><td>image_upload[]:</td><td><input type="file" name="image_upload[]" /></td></tr>
<tr><td></td><td><input type="submit" class="button" value="Submit" /><br /><br /></td></tr>
<tr><td>site_id:</td><td><input type="text" name="site_id" class="hidden" /></td></tr>
<tr><td>user_id:</td><td><input type="text" name="user_id" class="hidden" /></td></tr>
<tr><td>token:</td><td><input type="text" name="token" class="hidden" /></td></tr>
</table>
</form>

<h1>SUBMIT SITE SCAN BARCODE</h1>
<form method="post" action="<?php echo GRAPH ?>global/site-scan-barcode.if" enctype="multipart/form-data">
<table>
<tr><td width="80">site_part_id[]:</td><td><input type="text" name="site_part_id[]" /></td></tr>
<tr><td>barcode[]:</td><td><input type="text" name="barcode[]" /></td></tr>
<tr><td>serial_no[]:</td><td><input type="text" name="serial_no[]" /></td></tr>
<tr><td>image_upload[]:</td><td><input type="file" name="image_upload[]" /></td></tr>
<tr><td colspan="2"><hr /></td></tr>
<tr><td>site_part_id[]:</td><td><input type="text" name="site_part_id[]" /></td></tr>
<tr><td>barcode[]:</td><td><input type="text" name="barcode[]" /></td></tr>
<tr><td>serial_no[]:</td><td><input type="text" name="serial_no[]" /></td></tr>
<tr><td>image_upload[]:</td><td><input type="file" name="image_upload[]" /></td></tr>
<tr><td colspan="2"><hr /></td></tr>
<tr><td>site_part_id[]:</td><td><input type="text" name="site_part_id[]" /></td></tr>
<tr><td>barcode[]:</td><td><input type="text" name="barcode[]" /></td></tr>
<tr><td>serial_no[]:</td><td><input type="text" name="serial_no[]" /></td></tr>
<tr><td>image_upload[]:</td><td><input type="file" name="image_upload[]" /></td></tr>
<tr><td></td><td><input type="submit" class="button" value="Submit" /><br /><br /></td></tr>
<tr><td>site_id:</td><td><input type="text" name="site_id" class="hidden" /></td></tr>
<tr><td>user_id:</td><td><input type="text" name="user_id" class="hidden" /></td></tr>
<tr><td>token:</td><td><input type="text" name="token" class="hidden" /></td></tr>
</table>
</form>

<h1>BOOK ATP</h1>
<form method="post" action="<?php echo GRAPH ?>atp/book.if">
<table>
<tr><td width="80"></td><td><input type="submit" class="button" value="Book!" /><br /><br /></td></tr>
<tr><td>atp_id:</td><td><input type="text" name="atp_id" class="hidden" /></td></tr>
<tr><td>user_id:</td><td><input type="text" name="user_id" class="hidden" /></td></tr>
<tr><td>token:</td><td><input type="text" name="token" class="hidden" /></td></tr>
</table>
</form>

<h1>CANCEL BOOK ATP</h1>
<form method="post" action="<?php echo GRAPH ?>atp/cancel-book.if">
<table>
<tr><td width="80"></td><td><input type="submit" class="button" value="Cancel" /><br /><br /></td></tr>
<tr><td>atp_id:</td><td><input type="text" name="atp_id" class="hidden" /></td></tr>
<tr><td>user_id:</td><td><input type="text" name="user_id" class="hidden" /></td></tr>
<tr><td>token:</td><td><input type="text" name="token" class="hidden" /></td></tr>
</table>
</form>

<h1>CHECKIN ATP</h1>
<form method="post" action="<?php echo GRAPH ?>atp/checkin.if">
<table>
<tr><td width="80"></td><td><input type="submit" class="button" value="Check In" /><br /><br /></td></tr>
<tr><td>atp_id:</td><td><input type="text" name="atp_id" class="hidden" /></td></tr>
<tr><td>user_id:</td><td><input type="text" name="user_id" class="hidden" /></td></tr>
<tr><td>latitude:</td><td><input type="text" name="latitude" class="hidden" /></td></tr>
<tr><td>longitude:</td><td><input type="text" name="longitude" class="hidden" /></td></tr>
<tr><td>token:</td><td><input type="text" name="token" class="hidden" /></td></tr>
</table>
</form>

<h1>SUBMIT FREE PHOTO ATP</h1>
<form method="post" action="<?php echo GRAPH ?>atp/free-photo.if" enctype="multipart/form-data">
<table>
<tr><td width="80">image_desc[]:</td><td><input type="text" name="image_desc[]" /></td></tr>
<tr><td>comment[]:</td><td><input type="text" name="comment[]" /></td></tr>
<tr><td>image_upload[]:</td><td><input type="file" name="image_upload[]" /></td></tr>
<tr><td colspan="2"><hr /></td></tr>
<tr><td>image_desc[]:</td><td><input type="text" name="image_desc[]" /></td></tr>
<tr><td>comment[]:</td><td><input type="text" name="comment[]" /></td></tr>
<tr><td>image_upload[]:</td><td><input type="file" name="image_upload[]" /></td></tr>
<tr><td colspan="2"><hr /></td></tr>
<tr><td>image_desc[]:</td><td><input type="text" name="image_desc[]" /></td></tr>
<tr><td>comment[]:</td><td><input type="text" name="comment[]" /></td></tr>
<tr><td>image_upload[]:</td><td><input type="file" name="image_upload[]" /></td></tr>
<tr><td></td><td><input type="submit" class="button" value="Submit" /><br /><br /></td></tr>
<tr><td>atp_id:</td><td><input type="text" name="atp_id" class="hidden" /></td></tr>
<tr><td>user_id:</td><td><input type="text" name="user_id" class="hidden" /></td></tr>
<tr><td>token:</td><td><input type="text" name="token" class="hidden" /></td></tr>
</table>
</form>

<h1>SUBMIT EQUIPMENT IDENTIFICATION FORM ATP</h1>
<form method="post" action="<?php echo GRAPH ?>atp/equipment-identification.if">
<table>
<tr><td width="80">type:</td><td><input type="text" name="type" /></td></tr>
<tr><td>conf_rbs:</td><td><input type="text" name="conf_rbs" /></td></tr>
<tr><td>conf_type:</td><td><input type="text" name="conf_type" /></td></tr>
<tr><td>conf_installed:</td><td><input type="text" name="conf_installed" /></td></tr>
<tr><td>conf_activated:</td><td><input type="text" name="conf_activated" /></td></tr>
<tr><td>conf_serial:</td><td><input type="text" name="conf_serial" /></td></tr>
<tr><td>no_cabinet:</td><td><input type="text" name="no_cabinet" /></td></tr>
<tr><td>ip_address:</td><td><input type="text" name="ip_address" /></td></tr>
<tr><td>soft_version:</td><td><input type="text" name="soft_version" /></td></tr>
<tr><td>site_profile:</td><td><input type="text" name="site_profile" /></td></tr>
<tr><td>rbs_topology:</td><td><input type="text" name="rbs_topology" /></td></tr>
<tr><td></td><td><input type="submit" class="button" value="Submit" /><br /><br /></td></tr>
<tr><td>atp_id:</td><td><input type="text" name="atp_id" class="hidden" /></td></tr>
<tr><td>user_id:</td><td><input type="text" name="user_id" class="hidden" /></td></tr>
<tr><td>token:</td><td><input type="text" name="token" class="hidden" /></td></tr>
<tr><td>cell_id:</td><td><input type="text" name="cell_id" class="hidden" /></td></tr>
<tr><td>lac:</td><td><input type="text" name="lac" class="hidden" /></td></tr>
</table>
</form>

<h1>SUBMIT QUEST FORM ATP</h1>
<form method="post" action="<?php echo GRAPH ?>atp/quest-form.if" enctype="multipart/form-data">
<table>
<tr><td width="80">quest[]:</td><td><input type="text" name="quest[]" /></td></tr>
<tr><td>image_upload[]:</td><td><input type="file" name="image_upload[]" /></td></tr>
<tr><td colspan="2"><hr /></td></tr>
<tr><td>quest[]:</td><td><input type="text" name="quest[]" /></td></tr>
<tr><td>image_upload[]:</td><td><input type="file" name="image_upload[]" /></td></tr>
<tr><td colspan="2"><hr /></td></tr>
<tr><td>quest[]:</td><td><input type="text" name="quest[]" /></td></tr>
<tr><td>image_upload[]:</td><td><input type="file" name="image_upload[]" /></td></tr>
<tr><td colspan="2"><hr /></td></tr>
<tr><td>quest[]:</td><td><input type="text" name="quest[]" /></td></tr>
<tr><td>image_upload[]:</td><td><input type="file" name="image_upload[]" /></td></tr>
<tr><td colspan="2"><hr /></td></tr>
<tr><td>quest[]:</td><td><input type="text" name="quest[]" /></td></tr>
<tr><td>image_upload[]:</td><td><input type="file" name="image_upload[]" /></td></tr>
<tr><td></td><td><input type="submit" class="button" value="Submit" /><br /><br /></td></tr>
<tr><td>atp_id:</td><td><input type="text" name="atp_id" class="hidden" /></td></tr>
<tr><td>user_id:</td><td><input type="text" name="user_id" class="hidden" /></td></tr>
<tr><td>token:</td><td><input type="text" name="token" class="hidden" /></td></tr>
</table>
</form>

<h1>CHAPTER QUEST FORM ATP</h1>
<form method="post" action="<?php echo GRAPH ?>atp/form-chapter.if" enctype="multipart/form-data">
<table>
<tr><td width="80">quest[]:</td><td><input type="text" name="quest[]" /></td></tr>
<tr><td>quest[]:</td><td><input type="text" name="quest[]" /></td></tr>
<tr><td>quest[]:</td><td><input type="text" name="quest[]" /></td></tr>
<tr><td>quest[]:</td><td><input type="text" name="quest[]" /></td></tr>
<tr><td>quest[]:</td><td><input type="text" name="quest[]" /></td></tr>
<tr><td>quest[]:</td><td><input type="text" name="quest[]" /></td></tr>
<tr><td>quest[]:</td><td><input type="text" name="quest[]" /></td></tr>
<tr><td>quest[]:</td><td><input type="text" name="quest[]" /></td></tr>
<tr><td>quest[]:</td><td><input type="text" name="quest[]" /></td></tr>
<tr><td>quest[]:</td><td><input type="text" name="quest[]" /> and more..</td></tr>
<tr><td>image_upload:</td><td><input type="file" name="image_upload" /></td></tr>
<tr><td></td><td><input type="submit" class="button" value="Submit" /><br /><br /></td></tr>
<tr><td>atp_id:</td><td><input type="text" name="atp_id" class="hidden" /></td></tr>
<tr><td>user_id:</td><td><input type="text" name="user_id" class="hidden" /></td></tr>
<tr><td>chapter:</td><td><input type="text" name="chapter" class="hidden" /></td></tr>
<tr><td>token:</td><td><input type="text" name="token" class="hidden" /></td></tr>
</table>
</form>

<h1>CHAPTER SUB QUEST FORM ATP</h1>
<form method="post" action="<?php echo GRAPH ?>atp/form-subchapter.if" enctype="multipart/form-data">
<table>
<tr><td width="80">quest[]:</td><td><input type="text" name="quest[]" /></td></tr>
<tr><td>quest[]:</td><td><input type="text" name="quest[]" /></td></tr>
<tr><td>quest[]:</td><td><input type="text" name="quest[]" /></td></tr>
<tr><td>quest[]:</td><td><input type="text" name="quest[]" /></td></tr>
<tr><td>quest[]:</td><td><input type="text" name="quest[]" /></td></tr>
<tr><td>quest[]:</td><td><input type="text" name="quest[]" /> and more..</td></tr>
<tr><td></td><td><input type="submit" class="button" value="Submit" /><br /><br /></td></tr>
<tr><td>atp_id:</td><td><input type="text" name="atp_id" class="hidden" /></td></tr>
<tr><td>user_id:</td><td><input type="text" name="user_id" class="hidden" /></td></tr>
<tr><td>chapter:</td><td><input type="text" name="chapter" class="hidden" /></td></tr>
<tr><td>sub_chapter:</td><td><input type="text" name="sub_chapter" class="hidden" /></td></tr>
<tr><td>token:</td><td><input type="text" name="token" class="hidden" /></td></tr>
</table>
</form>

<h1>QUEST ATP</h1>
<form method="post" action="<?php echo GRAPH ?>atp/quest.if" enctype="multipart/form-data">
<table>
<tr><td width="80">quest[]:</td><td><input type="text" name="quest[]" /></td></tr>
<tr><td>quest[]:</td><td><input type="text" name="quest[]" /></td></tr>
<tr><td>quest[]:</td><td><input type="text" name="quest[]" /></td></tr>
<tr><td>quest[]:</td><td><input type="text" name="quest[]" /></td></tr>
<tr><td>quest[]:</td><td><input type="text" name="quest[]" /> and more..</td></tr>
<tr><td>image_upload:</td><td><input type="file" name="image_upload" /></td></tr>
<tr><td></td><td><input type="submit" class="button" value="Submit" /><br /><br /></td></tr>
<tr><td>atp_id:</td><td><input type="text" name="atp_id" class="hidden" /></td></tr>
<tr><td>user_id:</td><td><input type="text" name="user_id" class="hidden" /></td></tr>
<tr><td>token:</td><td><input type="text" name="token" class="hidden" /></td></tr>
</table>
</form>

<h1>BOOK ATM</h1>
<form method="post" action="<?php echo GRAPH ?>atm/book.if">
<table>
<tr><td width="80"></td><td><input type="submit" class="button" value="Book!" /><br /><br /></td></tr>
<tr><td>atm_id:</td><td><input type="text" name="atm_id" class="hidden" /></td></tr>
<tr><td>user_id:</td><td><input type="text" name="user_id" class="hidden" /></td></tr>
<tr><td>token:</td><td><input type="text" name="token" class="hidden" /></td></tr>
</table>
</form>

<h1>CANCEL BOOK ATM</h1>
<form method="post" action="<?php echo GRAPH ?>atm/cancel-book.if">
<table>
<tr><td width="80"></td><td><input type="submit" class="button" value="Cancel" /><br /><br /></td></tr>
<tr><td>atm_id:</td><td><input type="text" name="atm_id" class="hidden" /></td></tr>
<tr><td>user_id:</td><td><input type="text" name="user_id" class="hidden" /></td></tr>
<tr><td>token:</td><td><input type="text" name="token" class="hidden" /></td></tr>
</table>
</form>

<h1>SUBMIT FIRST CHECKIN ATM</h1>
<form method="post" action="<?php echo GRAPH ?>atm/checkin-st.if" enctype="multipart/form-data">
<table>
<tr><td width="80">image_upload:</td><td><input type="file" name="image_upload" /></td></tr>
<tr><td></td><td><input type="submit" class="button" value="Check In" /><br /><br /></td></tr>
<tr><td>atm_id:</td><td><input type="text" name="atm_id" class="hidden" /></td></tr>
<tr><td>user_id:</td><td><input type="text" name="user_id" class="hidden" /></td></tr>
<tr><td>latitude:</td><td><input type="text" name="latitude" class="hidden" /></td></tr>
<tr><td>longitude:</td><td><input type="text" name="longitude" class="hidden" /></td></tr>
<tr><td>token:</td><td><input type="text" name="token" class="hidden" /></td></tr>
</table>
</form>

<h1>SUBMIT BARCODE ATM</h1>
<form method="post" action="<?php echo GRAPH ?>atm/barcode.if" enctype="multipart/form-data">
<table>
<tr><td width="80">barcode[]:</td><td><input type="text" name="barcode[]" /></td></tr>
<tr><td>serial_no[]:</td><td><input type="text" name="serial_no[]" /></td></tr>
<tr><td>qty[]:</td><td><input type="text" name="qty[]" /></td></tr>
<tr><td>uom[]:</td><td><input type="text" name="uom[]" /></td></tr>
<tr><td>name[]:</td><td><input type="text" name="name[]" /></td></tr>
<tr><td>detail[]:</td><td><input type="text" name="detail[]" /></td></tr>
<tr><td>note[]:</td><td><input type="text" name="note[]" /></td></tr>
<tr><td>image_upload[]:</td><td><input type="file" name="image_upload[]" /></td></tr>
<tr><td colspan="2"><hr /></td></tr>
<tr><td>barcode[]:</td><td><input type="text" name="barcode[]" /></td></tr>
<tr><td>serial_no[]:</td><td><input type="text" name="serial_no[]" /></td></tr>
<tr><td>qty[]:</td><td><input type="text" name="qty[]" /></td></tr>
<tr><td>uom[]:</td><td><input type="text" name="uom[]" /></td></tr>
<tr><td>name[]:</td><td><input type="text" name="name[]" /></td></tr>
<tr><td>detail[]:</td><td><input type="text" name="detail[]" /></td></tr>
<tr><td>note[]:</td><td><input type="text" name="note[]" /></td></tr>
<tr><td>image_upload[]:</td><td><input type="file" name="image_upload[]" /></td></tr>
<tr><td></td><td><input type="submit" class="button" value="Submit" /><br /><br /></td></tr>
<tr><td>atm_id:</td><td><input type="text" name="atm_id" class="hidden" /></td></tr>
<tr><td>user_id:</td><td><input type="text" name="user_id" class="hidden" /></td></tr>
<tr><td>token:</td><td><input type="text" name="token" class="hidden" /></td></tr>
</table>
</form>

<h1>SUBMIT SECOND CHECKIN ATM</h1>
<form method="post" action="<?php echo GRAPH ?>atm/checkin-nd.if">
<table>
<tr><td width="80">image_upload:</td><td><input type="file" name="image_upload" /></td></tr>
<tr><td></td><td><input type="submit" class="button" value="Check In" /><br /><br /></td></tr>
<tr><td>atm_id:</td><td><input type="text" name="atm_id" class="hidden" /></td></tr>
<tr><td>latitude:</td><td><input type="text" name="latitude" class="hidden" /></td></tr>
<tr><td>longitude:</td><td><input type="text" name="longitude" class="hidden" /></td></tr>
<tr><td>cell_id:</td><td><input type="text" name="cell_id" class="hidden" /></td></tr>
<tr><td>lac:</td><td><input type="text" name="lac" class="hidden" /></td></tr>
<tr><td>user_id:</td><td><input type="text" name="user_id" class="hidden" /></td></tr>
<tr><td>token:</td><td><input type="text" name="token" class="hidden" /></td></tr>
</table>
</form>

<h1>SUBMIT QUEST FORM SS</h1>
<form method="post" action="<?php echo GRAPH ?>ss/quest-form.if">
<table>
<tr><td width="80">ss_id:</td><td><input type="text" name="ss_id" class="hidden" /></td></tr>
<tr><td>user_id:</td><td><input type="text" name="user_id" class="hidden" /></td></tr>
<tr><td>token:</td><td><input type="text" name="token" class="hidden" /></td></tr>
<tr><td>item_id[] :</td><td><input type="text" name="item_id[]"/></td></tr>
<tr><td>planned[] :</td><td><input type="text" name="planned[]" /></td></tr>
<tr><td>actual[] :</td><td><input type="text" name="actual[]" /></td></tr>
<tr><td>result[] :</td><td><input type="text" name="result[]" /></td></tr>
<tr><td></td><td><input type="submit" class="button" value="Submit" /><br /><br /></td></tr>
</table>
</form>

</body>
</html>