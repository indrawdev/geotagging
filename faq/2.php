<?php 
require_once('koneksi.php');
function amankan($var){
	$var = str_replace(array("'", '"'), array("\'", "\""), $var); return $var;
}
if(isset($_GET['qid'])){
	$qid = amankan($_GET['qid']);
	$data = mysql_fetch_array(mysql_query("SELECT q, a FROM faq_content WHERE id=$qid", $link));
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>F.A.Q.</title>
<link rel="stylesheet" href="style.css" type="text/css">
</head>

<body>
<div style="width:500px; margin-left:auto; margin-right:auto;">

<table style="border-collapse:collapse; border:1px solid" align="center" cellpadding="10"><tr><td>
<form method="post">
<table>
<tr>
	<th colspan="3" align="center">F.A.Q.</th>
</tr>
<tr>
	<td>Question</td>
    <td>:</td>
    <td><textarea name="q"><?php if(isset($qid)){ echo $data[0]; } ?></textarea></td>
</tr>
<tr>
	<td>Answer</td>
    <td>:</td>
    <td><textarea name="a"><?php if(isset($qid)){ echo $data[1]; } ?></textarea></td>
</tr>
<tr>
	<td colspan="3"><input type="submit" name="btnsubmit" value="Submit" /><input type="button" name="btnback" value="Back" onclick="window.location='index.php'" /></td>
</tr>
</table>
</form>
</td></tr></table>

</div>
<?php
if(isset($_POST['btnsubmit'])){
	$q = amankan($_POST['q']); $a = amankan($_POST['a']);
	if(isset($qid)){
		//echo "UPDATE faq SET q='$q', a='$a', by='$_SESSION[uname]' WHERE id='$qid'";
		$now = date("Y-m-d H:i:s");
		mysql_query("UPDATE `faq_content` SET `q`='$q', `a`='$a', `by`='$_SESSION[uname]', `time`='$now' WHERE `id`='$qid'", $link);
		header("Location: index.php");
	}
	else{
		//echo "INSERT INTO `faq_content` (`q`, `a`, `by`) VALUES ('$q', '$a', '$_SESSION[uname]')";
		mysql_query("INSERT INTO `faq_content` (`q`, `a`, `by`) VALUES ('$q', '$a', '$_SESSION[uname]')", $link);
		header("Location: index.php");
	}	
}
?>
</body>
</html>
<?php

?>