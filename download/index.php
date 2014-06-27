<?php
/*$file = '../update/Indosat.apk';

if (file_exists($file)) {
    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename="Indosat.apk"');
    header('Content-Transfer-Encoding: binary');
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . filesize($file));
    ob_clean();
    flush();
    readfile($file);
    exit;
}*/
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>apk Download</title>
<link rel="stylesheet" type="text/css" href="../imeiview/peformance-graph/style.css">
</head>

<body>
<div class="header">
	<div id="header-content" style="height:50px;">
		<div id="logo"><img src="../static/i/logo.png" alt="indosat" title="" width="103" height="30" /></div>
<div style="font-size:18px; margin-left:60%;">Indosat Geotagging APK Download</div>
    </div>
</div>
<center>
<a href="Indosat.apk"><button class="button" style="width:350px; height:100px; font-size:24px;">Click to Download</button></a><br /><br />
<font size="3">note : disarankan untuk melakukan <br />uninstall pada aplikasi yang lama</font>
</center>
</body>
</html>