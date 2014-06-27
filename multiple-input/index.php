<?php $auth_realm = 'Indosat Geotagging Multiple Input User & IMEI'; require_once 'auth.php'; require_once('../imeiview/koneksi_db.php');
//$text = "1234"; $result=crypt(md5($text.'99*&^%$#@!QQ+'), 'Developed by irvanfauzie@gmail.com');
function uid(){
		$mt=microtime();
		$string = array('.',' ');
		$result = str_replace($string, '', $mt);
		$results = rand(100, 999).$result.rand(21, 99);
		return $results;
}
 ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Multiple Input</title>
<style>
@font-face{
	font-family: UniversLTStdB;
	src:url(UniversLTStd-BoldCn.otf);
}
@font-face{
	font-family: UniversLTStd;
	src:url(UniversLTStd-Cn.otf);
}
a{ color:#496D97; }
</style>
</head>

<body style="background:url(bodybg.png) repeat-x;">
<div id="wrapper" style="width:800px; margin-left:auto; margin-right:auto;">

<div id="head">
	<table border="0" width="100%" style="font-family:UniversLTStdB;"><tr>
    <td><img src="logo_new.png" border=0 alt="" /></td>
    <td align="right">Insert data user & IMEI with bulk method</td>
    </tr></table>
</div>

<div id="content" style="font-family:UniversLTStd; margin-top:50px">
<form name="form1" method="post" enctype="multipart/form-data">
<table class="table" align="center"><tr><td>
Masukkan file excel yang berisi data user :
<br /><input type="file" name="user" size="90px" /><input type="submit" name="btnsubmituser" value="submit" />
<br />bingung dengan formatnya? klik <a href="user_example.xls">disini</a>
</td></tr></table>
</form>

<br />
<form name="form2" method="post" enctype="multipart/form-data">
<table class="table" align="center"><tr><td>
Masukkan file excel yang berisi IMEI :
<br /><input type="file" name="imei" size="90px" /><input type="submit" name="btnsubmitimei" value="submit" />
<br />bingung dengan formatnya? klik <a href="imei_example.xls">disini</a>
</td></tr></table>
</form>
<?php
function amankan($var){
	$var = str_replace(array("'", '"'), array("\'", "\""), $var); return $var;
}
if(isset($_POST['btnsubmituser'])){
	require_once('excel_reader.php');
	$s = new Spreadsheet_Excel_Reader($_FILES['user']['tmp_name']);
	$start_r = 2;
	$test_r = $s->rowcount($sheet_index=0);
	$r = 0;
	
	for($i=$start_r;$i<=$test_r;$i++){
		$testval1 = amankan($s->val($i, 1)); $testval2 = amankan($s->val($i, 4));
		if(($testval1 != '') && ($testval2 != '')) $r++;
	}
	
	$suc = 0; $fail = 0;
	for($i=$start_r;$i<$start_r+$r;$i++){
		$uid = uid(); $name = amankan($s->val($i, 1)); $email = amankan($s->val($i, 2)); $phone = amankan($s->val($i, 3)); $un = amankan($s->val($i, 4)); $pa = amankan($s->val($i, 5)); $pa =crypt(md5($pa.'99*&^%$#@!QQ+'), 'Developed by irvanfauzie@gmail.com'); $vendor = amankan($s->val($i, 6)); $role = amankan($s->val($i, 7)); $imei = amankan($s->val($i, 8));

		$query = mysql_query("INSERT INTO `storages_indosat`.`it_user` (`user_id`, `uname`, `pswd`, `name`, `email`, `vendor_id`, `role_id`, `time_entry`, `login_time`, `login_last`, `fl_active`, `imei`, `phone`) VALUES ('$uid', '$un', '$pa', '$name', '$email', '$vendor', '$role', CURRENT_TIMESTAMP, '0000-00-00 00:00:00', '0000-00-00 00:00:00', b'1', '$imei', '$phone')", $link);
		if($query) $suc++; else $fail++;
	}
	echo "Banyak data : ".($r)."<br />Berhasil di upload : ".$suc."<br />Gagal di upload : ".$fail;
}
if(isset($_POST['btnsubmitimei'])){
	require_once('excel_reader.php');
	$s = new Spreadsheet_Excel_Reader($_FILES['imei']['tmp_name']);
	$r = $s->rowcount($sheet_index=0);
	$suc = 0; $fail = 0;
	for($i=2;$i<=$r;$i++){
		$imei = amankan($s->val($i,1)); $date = date("Y-m-d H:i:s");
		$query = mysql_query("INSERT INTO `it_imei` VALUES ('$imei', '', '0000-00-00 00:00:00', '$date')", $link);
		if($query) $suc++; else $fail++;
	}
	echo "Banyak data : ".($r-1)."<br />Berhasil di upload : ".$suc."<br />Gagal di upload : ".$fail;
}
?>
</div>

<div id="footer" style="margin-top:20px;">
<table border="0" align="center"><tr>
<td><div style="float:right; font-family:century gothic;">Powered by Ridwan Effendi &reg;</div></td>
</tr></table>
</div>

</div>

</body>
</html>