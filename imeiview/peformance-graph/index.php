<?php require_once('FusionCharts/FusionCharts_Gen.php'); require_once('../koneksi_db.php'); ?>
<html>
<head>  
    <title>IMEI Login Activity</title>  
    <script type="text/javascript" src="FusionCharts/FusionCharts.js"></script>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
  
<body>
<div class="header">
	<div id="header-content">
		<div id="logo"><img src="../../static/i/logo.png" alt="indosat" title="" width="103" height="30" /></div> 
<form name="form1" method="post">
Please select the time below : &emsp;<select name="m" size="1"><option value=1>January</option><option value=2>February</option><option value=3>March</option><option value=4>April</option><option value=5>May</option><option value=6>June</option><option value=7>July</option><option value=8>August</option><option value=9>September</option><option value=10>October</option><option value=11>November</option><option value=12>December</option>  
</select>&emsp;
<select name="y" size="1">
<?php
for($i=2012; $i<=date('Y'); $i++){
	echo "<option value='$i'>$i</option>";
}
?>
</select>&emsp;
<input type="submit" name="btnsubmit" value="Show" class="button"><input type="submit" name="btncurrent" value="Show Current" class="button">
</form>
	</div>
</div>
<?php
	$year = date('Y'); $month = date('m'); 
	if($_POST['btnsubmit']){
		$year = $_POST['y']; $month = $_POST['m'];
	}
	else if($_POST['btncurrent']){
		$year = date('Y'); $month = date('m');
	}
	$data = mysql_fetch_array(mysql_query("SELECT MONTHNAME('$year-$month-01')", $link)); $monthname = $data[0];
	echo "<div class='content'><h1>Login Graph ($monthname - $year)</h1>";
	 
	$FC = new FusionCharts("Column3D","1024","400"); 
	$FC->setSWFPath("Charts/");
	
	$strParam="caption=Login Activity ; subcaption=Per Month; xAxisName=Date ; yAxisName=IMEI; numberPrefix=; decimalPrecision=0";
	
	$FC->setChartParams($strParam);
	
	$last_day = cal_days_in_month(CAL_GREGORIAN, $month, $year);
	for($i=1; $i<=$last_day; $i++){
	 $qr=mysql_query("SELECT IF(COUNT(`imei_id`)=0, NULL, COUNT(`imei_id`)) FROM it_imei WHERE DATE(login_last)='$year-$month-$i'"); 
	 $data=mysql_fetch_array($qr);
	 $FC->addChartData("$data[0]","name=$i");
	}
	
	$FC->renderChart();
?>
</div>
  </body> 
</html> 