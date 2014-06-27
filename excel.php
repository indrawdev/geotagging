<?php require '.conf'; mysql_connect(DB_HOST, DB_USER, DB_PASS) or die("Sorry, could not connect to server"); mysql_select_db(DB_NAME) or die("Sorry, could not select database"); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><!--Developed by irvanfauzie@gmail.com-->
<head>
<title>&nbsp;</title>
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
form input, form textarea{
	border:1px solid #666;
	font:12px Tahoma, Geneva, sans-serif;
	padding:5px;
	width:300px
}
form select{
	border:1px solid #666;
	font:12px Tahoma, Geneva, sans-serif;
	padding:5px;
	width:300px
}
form select:disabled{
	background:#F5F5F5;
	border:1px solid #CCC
}
.w450{
	width:450px
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
</style>
</head>
<body>

<h1 id="site">IMPORT SITE</h1>

<?php
if($_POST['method']=='import_site'){
	
	$file_name=$_FILES['file']['name'];
	$file_type=$_FILES['file']['type'];
	$file_loc=$_FILES['file']['tmp_name'];
	
	if(($file_type=='application/x-msexcel') || ($file_type=='application/vnd.ms-excel')){
	
		require 'excel_reader2.php';
		
		$data_exc=new Spreadsheet_Excel_Reader($file_loc);
		$row_exc=$data_exc->rowcount($sheet_index=0);
		for($i=1; $i <= $row_exc; $i++) mysql_query("INSERT INTO `it_site` (`id`, `name`, `address`, `city`, `province`, `latitude`, `longitude`) VALUES ('".$data_exc->val($i, 5)."', '".$data_exc->val($i, 1)."', '".$data_exc->val($i, 8)."', '".$data_exc->val($i, 7)."', '".$data_exc->val($i, 6)."', '".$data_exc->val($i, 3)."', '".$data_exc->val($i, 2)."')");
		
		echo '<p class="info"><b>'.$file_name.'</b> imported.. ('.date('H:i:s').')</p>';
	
	}
	else echo '<p class="warning">Invalid template file!</p>';
}
?>

<form method="post" action="#site" enctype="multipart/form-data">
<input type="hidden" name="method" value="import_site" />
<table width="100%">
<tr><td width="90">file excel:</td><td><input type="file" name="file" /> (.xls)</td></tr>
<tr><td></td><td><input type="submit" class="button" value="Upload" /></td></tr>
</table>
</form>

</body>
</html>