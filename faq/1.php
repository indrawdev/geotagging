<?php require_once('koneksi.php'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>F.A.Q.</title>
<script>
function del(qid){
	if(confirm("Are you sure?")){
		var xmlhttp1;
		if (window.XMLHttpRequest){  
		  xmlhttp1 = new XMLHttpRequest();
		}
		else{
		  xmlhttp1 = new ActiveXObject("Microsoft.XMLHTTP");
		}
		
		xmlhttp1.open("GET", "del.php?qid="+qid, true);
		xmlhttp1.onreadystatechange=function(){
			if (xmlhttp1.readyState==4 && xmlhttp1.status==200){
				window.location.reload();
			}
		}
		xmlhttp1.send();
	}
}
</script>
</head>

<body>
<center><h1>F.A.Q.</h1>
Raw Edition
</center>
<div style="width:800px; margin-left:auto; margin-right:auto;">
<table width="100%"><tr><td><button onclick="window.location='2.php'" style="margin-bottom:5px;">Add</button></td><td align="right"><a href="logout.php">Logout</a></td></tr></table>
<table border="1">
<tr align="center">
	<td>NO</td>
    <td>QUESTION</td>
    <td>ANSWER</td>
    <td>by</td>
    <td>edit</td>
    <td>delete</td>
</tr>
<?php
$q = mysql_query("SELECT a.id, a.q, a.a, b.name FROM `faq_content` a JOIN `faq_admin` b ON (a.`by`=b.`username`) ORDER BY a.time DESC", $link);
$i = 1;
while($data = mysql_fetch_array($q)){
	echo "<tr>
	<td align='center'>$i</td>
	<td style='padding-left:10px; padding-right:10px;'>$data[1]</td>
	<td style='padding-left:10px; padding-right:10px;'><font color='#939'>$data[2]</font></td>
	<td style='padding-left:10px; padding-right:10px;'>$data[3]</td>
	<td align='ceneter'><a href='2.php?qid=$data[0]'><img src='edit-icon.png' border=0 alt='edit' title='edit' /></a></td>
	<td align='center'><a href='javascript:del($data[0]);'><img src='delete-icon.png' border=0 alt='delete' title='delete' /></a></td>
	</tr>";
	$i++;
}
?>
</table>
</div>
</body>
</html>