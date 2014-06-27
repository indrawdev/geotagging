<?php $auth_realm = 'Indosat Geotagging APK Management System'; require_once 'auth.php'; require_once('../imeiview/koneksi_db.php');
if(isset($_POST['btnsubmit'])){
	if(isset($_FILES['apk']['name'])){
		$file = $_FILES['apk']['name']; $ext = substr($file, -4);
		if($ext == ".apk"){
			$data = mysql_fetch_array(mysql_query("SELECT COALESCE(MAX(`version`)+1, 1) FROM `apps`", $link)); $ver = $data[0];
			$namafile = "Indosat_v".$ver.$ext;
			mysql_query("INSERT INTO `apps` (`version`, `file`) VALUES ('$ver', '$namafile');", $link);
			move_uploaded_file($_FILES['apk']['tmp_name'], "../media/apps/".$namafile);
			echo '<script>alert("Upload Sukses")</script>';
		}
		else{
			echo '<script>alert("Harus file APK masbro...")</script>';
		}
	}
	else{
		echo '<script>alert("Sorry, Could not execute query...")</script>';
	}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Indosat Geotagging APK Management System</title>
<script>
function act(v, a, act, file){
	if(a==0){
		if(confirm("Anda yakin ?")){
			var xmlhttp1;
			if (window.XMLHttpRequest){  
			  xmlhttp1 = new XMLHttpRequest();
			}
			else{
			  xmlhttp1 = new ActiveXObject("Microsoft.XMLHTTP");
			}
			
			xmlhttp1.open("GET", "act.php?v="+v+"&action="+act+"&file="+file, true);
			xmlhttp1.onreadystatechange=function(){
				if (xmlhttp1.readyState==4 && xmlhttp1.status==200){
					window.location.href = window.location.href;
				}
			}
			xmlhttp1.send();
		}
	}
}
</script>
</head>

<body>
<center>
<h1>Indosat Geotagging APK Management System</h1><hr>
<strong>(raw edition)</strong>
<table border="0" align="center"><tr>
<td><div style="float:right; font-family:century gothic;">Powered by Ridwan Effendi &reg;</div></td>
</tr></table>
</center>
<form method="post" enctype="multipart/form-data">
Nambah APK baru  : <input type="file" name="apk" /><input type="submit" name="btnsubmit" value="Submit" />
</form><br />
<table border="1">
<thead>
	<tr>
    	<th>No</th>
        <th>Version</th>
        <th>File</th>
        <th>Active</th>
        <th>Last Modified</th>
        <th>delete</th>
    </tr>
</thead>
<tbody>
<?php $q = mysql_query("SELECT * FROM `apps` ORDER BY version DESC"); if(mysql_num_rows($q)){
$i = 1;
while($d = mysql_fetch_array($q)){
	echo "<tr>
	<td>$i</td>
	<td>$d[version]</td>
	<td><a href='../media/apps/$d[file]'>$d[file]</a></td>
	<td align='center' style='cursor:pointer' onclick='act(".$d['version'].", "; if($d['active']){ echo 1; }else{ echo 0; }; echo ", \"set_active\", \"\")'><img src='../static/i/checkbox"; if($d['active']){ echo "_checked"; } echo ".jpg'></td>
	<td>$d[timestamp]</td>
	<td align='center' style='cursor:pointer' onclick='act(".$d['version'].", 0, \"del\", \"$d[file]\")'><img src='danger.jpg'></td>
	</tr>"; $i++;
}
}else{ echo "<tr bgcolor='#CCCCCC'><td colspan=6 align=center>No Data</td><?tr>"; }
?>
</tbody>
</table>
</body>
</html>