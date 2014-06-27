<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>F.A.Q.</title>
</head>

<body>
<div class="login-form">
<form method="post">
<table align="center" border="0">
<tr>
    <th colspan="3">F.A.Q. Authorization</th>
</tr>
<tr>
	<td colspan="3">&nbsp;</td>
</tr>
<tr>
	<td>Username</td>
    <td>:</td>
    <td><input type="text" name="uname" size="30" /></td>
</tr>
<tr>
	<td>Password</td>
    <td>:</td>
    <td><input type="password" name="passw" size="30" /></td>
</tr>
<tr>
	<td colspan="3"><button type="submit" name="btnsubmit">Sign In</button></td>
</tr>
</table>
</form>
</div>
<?php
if(isset($_POST['btnsubmit'])){
	require_once("koneksi.php"); extract($_POST);
	function amankan($var){ $var = str_replace(array("'", '"'), array("\'", "\""), $var); return $var; }
	$uname = amankan($uname); $passw = crypt(md5(amankan($passw)),"Developed_by_wons_only@ridwaneffendi.com");
	$query = mysql_query("SELECT name FROM `faq_admin` WHERE username LIKE '$uname' AND password LIKE password('$passw')", $link);
	if(mysql_num_rows($query)){
		$data = mysql_fetch_object($query);
		$_SESSION['uname'] = $uname; $_SESSION['name'] = $data->name;
		header("Location: index.php");
	}
	else{
		echo "<center><font size='2' color='red'>Wrong Combination</font></center>";
	}
}
?>
</body>
</html>