<?php session_start(); if(empty($_SESSION['isat']['log'])) exit('<script>alert("Session expired, please re-login!");self.close();</script>'); if ( ! defined('BASEPATH')) exit('No direct script access allowed'); $Qtit = $this->db->query("SELECT `title` FROM `it_atp` WHERE `atp_id`='$dx'"); $tit = $Qtit->result_object(); $title = $tit[0]->title; ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xml:lang="en" xmlns="http://www.w3.org/1999/xhtml" lang="en">
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
<title>Preload ATP Ericsson 2G (Page 3) - <?php echo $title ?></title>
<style type="text/css">
@page{
  margin: 0;
}
body{
	font-family: sans-serif;
	font-size:12px
}
a{
	background:#FFF;
	padding:5px;
	border:1px solid #000;
	color:#000
}
a:hover{
	background:#000;
	cursor:pointer;
	color:#FFF
}
label{
	cursor:pointer
}
input[type='text']{
	width:95%;
}
hr{
	page-break-after:always;
	border:0
}
img{
	vertical-align:middle;
}
h1{
	font-size:28px;
	text-align:center
}
h2{
	font-size:20px;
	text-align:center
}
h2 span{
	font-size:12px;
	font-weight:normal
}
h3{
	font-size:14px;
	margin:0;
	padding:10px 0 5px 0
}
table{
	font-size:12px;
	width:100%;
	margin:0;
	padding:0;
	border:0
}
table td{
	padding:3px;
}
table .header td{
	background:#CCC;
	text-align:center;
}
table.border td{
	border:1px solid #000;
}
table.footer{
	color:#666;
	font-size:11px
}
table.footer td{
	border:1px solid #666;
}
div#footer{
	position:fixed;
	background:#FFF;
	overflow:hidden;
	padding:0.1cm;
	bottom:0cm;
	left:0cm;
	width:100%;
	height:4cm
}
div#footer span{
	color:#FFF;
	padding:0 5px
}
div#footer-cover{
	position:absolute;
	background:#FFF;
	bottom:2.4cm;
	height:70px;
	width:100%
}
#logo{
	text-align:center;
	margin:150px 0 100px 0
}
.attach{
	border-bottom:1px solid #000;
	text-align:center;
	padding:5px 0
}
.sign{
	height:40px
}
.button{
	padding: 2px 8px;
	margin-bottom:10px;
	width:80px;
	height:35px;
}

.button:hover{
	cursor:pointer;
}
.reset{
	padding: 2px 8px;
	margin-bottom:10px;
	width:150px;
	height:35px;
}
.reset:hover{
	cursor:pointer;
}
</style>
</style>
</head>

<body>

<h2>Preload ATP Ericsson 2G</h2>
<h1>Page 3</h1>
<br /><br />

<form name="preload2G" method="post" action="">

<?php $Qchapter = $this->db->query("SELECT `no_chapter`, `content` FROM `it_atp_chapter` WHERE `atp_id`='$dx' AND `chapter`='5' ORDER BY `atp_chapter_id` ASC"); foreach($Qchapter->result_object() as $chapter) $arr_chapter_5[str_replace('5.', '', $chapter->no_chapter) -1]=$chapter ?>

<table class="border" cellpadding="0" cellspacing="0">
<tr><td width="40" valign="top"><b>5</b><br />5.1<br />5.2<br />5.3<br />5.4</td>
<td valign="top"><b>Powers Measurement</b><br />Measurement AC Power Line (L1/L2/L3)<br />Measurement RBS Input Power / Cabinet Voltage<br />Measurement AC Power Input PSU RBS<br />Measurement DC Power Output PSU RBS</td>
<td valign="top" width="30" align="center">
<?php echo '<br />';
for($i=0; $i <= 3; $i++){
    echo '<input type="radio" name="no_chapter_5_'.($i+1).'" value="OK"'; if($arr_chapter_5[$i]->content=='OK') echo 'checked="checked"'; echo ' /><br />';
}
?>
</td><td valign="top" width="40" align="center">
<?php echo '<br />';
for($i=0; $i <= 3; $i++){
    echo '<input type="radio" name="no_chapter_5_'.($i+1).'" value="Not OK"'; if($arr_chapter_5[$i]->content=='Not OK') echo 'checked="checked"'; echo ' /><br />';
}
?>
</td><td valign="top" width="35" align="center">
<?php echo '<br />';
for($i=0; $i <= 3; $i++){
    echo '<input type="radio" name="no_chapter_5_'.($i+1).'" value="N/A"'; if($arr_chapter_5[$i]->content=='N/A') echo 'checked="checked"'; echo ' /><br />';
}
?>
</td><td width="90" valign="top" align="center"><?php echo '<br />'; for($i=0; $i <= 3; $i++) echo 'Major<br />' ?></td>
</tr>
</table>

<hr />

<h3>TABLE 1: Voltage RBS Specifications</h3>
<table class="border" cellpadding="0" cellspacing="0">
<tr class="header"><td>Point of Voltage Measurement</td><td>Nominal Voltages</td><td>Specification</td></tr>
<tr><td>AC POWER LINE</td><td align="center">220 Vac</td><td align="center">180 Vac - 250 Vac</td></tr>
<tr><td>DC V Input RBS</td><td align="center"> -54.5 Vdc</td><td align="center">(-)42 Vdc - (-)58.5 Vdc</td></tr>
<tr><td>AC V Input PSU RBS</td><td align="center">220 Vac</td><td align="center">120 Vac - 250 Vac</td></tr>
<tr><td>DC V input PSU RBS</td><td align="center"> 27.2 Vdc</td><td align="center">19.5 Vdc - 30 Vdc</td></tr>
<tr><td>DC V Output PSU RBS</td><td align="center">-54.5 Vdc</td><td align="center">(-)53.0Vdc - (-)56 Vdc</td></tr>
</table>
<p style="font-size:11px">Note: All Voltage measurement must refer to Table 1 (Voltage RBS Specification)</p>

<?php $Qsubchapter = $this->db->query("SELECT `content` FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `chapter`='5' AND `no_chapter`='5.1' ORDER BY `subno_chapter_order` ASC"); foreach($Qsubchapter->result_object() as $subchapter) $arr_subchapter_5_1[]=$subchapter;
$dt_subchapter_5_1 = explode('|', $arr_subchapter_5_1[0]->content) ?>

<h3>Chapter: 5.1 Measurement AC Power Line (L1/L2/L3)</h3>
<table class="border" cellpadding="0" cellspacing="0">
<tr class="header"><td width="90">Test Item</td><td>Phase L1<br />to Neutral</td><td>Phase L2<br />to Neutral</td><td>Phase L3<br />to Neutral</td><td>Neutral to Ground (&lt; 3 Vdc)</td><td width="90">Remark</td></tr>
<tr>
    <td  valign="top">AC POWER LINE</td>
    <td><input type="text" name="no_chapter_5_1_1a" value="<?php echo $this->ifunction->ifnulls($dt_subchapter_5_1[3]) ?>" /></td>
    <td><input type="text" name="no_chapter_5_1_1b" value="<?php echo $this->ifunction->ifnulls($dt_subchapter_5_1[4]) ?>" /></td>
    <td><input type="text" name="no_chapter_5_1_1c" value="<?php echo $this->ifunction->ifnulls($dt_subchapter_5_1[5]) ?>" /></td>
    <td><input type="text" name="no_chapter_5_1_1d" value="<?php echo $this->ifunction->ifnulls($dt_subchapter_5_1[6]) ?>" /></td>
    <td><input type="text" name="no_chapter_5_1_1e" value="<?php echo $this->ifunction->ifnulls($dt_subchapter_5_1[7]) ?>" /></td>
</tr>
</table>

<?php $Qsubchapter = $this->db->query("SELECT `subno_chapter`, `content` FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `chapter`='5' AND `no_chapter`='5.2' ORDER BY `subno_chapter_order` ASC"); foreach($Qsubchapter->result_object() as $subchapter) $arr_subchapter_5_2[$subchapter->subno_chapter -1]=$subchapter ?>

<h3>Chapter: 5.2 Measurement RBS Input Power/Cabinet Voltage</h3>
<table class="border" cellpadding="0" cellspacing="0">
<tr class="header">
<td rowspan="2" width="90">DC V Input RBS (Input DC power RBS from Rectifier / BBS to RBS test Point)</td>
<td rowspan="2">Vdc (Volt)</td>
<td>Chassis to Ground</td>
<td rowspan="2" width="30">OK</td>
<td rowspan="2" width="40">Not<br />OK</td>
<td rowspan="2" width="35">N/A</td>
<td rowspan="2" width="90">Remark</td>
</tr><tr class="header"><td>(&lt; 1 VDC)</td></tr>
<?php
$arr_dt_52 = array('Cabinet 1', 'Cabinet 2', 'Cabinet 3');
for($i=0; $i <= 2; $i++){
	$dt_subchapter_5_2 = explode('|', $arr_subchapter_5_2[$i]->content);
	echo '<tr><td align="center">'.$arr_dt_52[$i].'</td>';
	echo '<td><input type="text" name="no_chapter_5_2_'.($i+1).'a" value="'.$this->ifunction->ifnulls($dt_subchapter_5_2[4]).'" /></td><td><input type="text" name="no_chapter_5_2_'.($i+1).'b" value="'.$this->ifunction->ifnulls($dt_subchapter_5_2[5]).'" /></td><td align="center"><input type="radio" name="no_chapter_5_2_'.($i+1).'c" value="OK" ';  if($dt_subchapter_5_2[3]=='OK') echo 'checked="checked"'; echo ' /></td><td align="center"><input type="radio" name="no_chapter_5_2_'.($i+1).'c" value="Not OK" ';  if($dt_subchapter_5_2[3]=='Not OK') echo 'checked="checked"'; echo ' /></td><td align="center"><input type="radio" name="no_chapter_5_2_'.($i+1).'c" value="N/A" ';  if($dt_subchapter_5_2[3]=='N/A') echo 'checked="checked"'; echo ' /></td><td><input type="text" name="no_chapter_5_2_'.($i+1).'d" value="'.$this->ifunction->ifnulls($dt_subchapter_5_2[6]).'" /></td></tr>';
}
?>
</table><br />

<?php $Qchapter = $this->db->query("SELECT `no_chapter`, `content` FROM `it_atp_chapter` WHERE `atp_id`='$dx' AND `chapter`='6' ORDER BY `atp_chapter_id` ASC"); foreach($Qchapter->result_object() as $chapter) $arr_chapter_6[str_replace('6.', '', $chapter->no_chapter) -1]=$chapter ?>

<table class="border" cellpadding="0" cellspacing="0">
<tr class="header"><td width="40">Chapter</td><td>Title work performed</td><td width="30">OK</td><td width="40">Not OK</td><td width="35">N/A</td><td width="90">Remark</td></tr>
<tr><td valign="top"><b>6</b><br />6.1<br />6.2<br />6.3</td><td valign="top"><b>Checking RBS Rack Circuit Breaker (switch ON/OFF )</b><br />- Sub rack 1 /RBS 1<br />- Sub rack 2/ RBS 2<br />- Sub rack 3/ RBS 3</td>
<td valign="top" align="center">
<?php echo '<br />';
for($i=0; $i <= 2; $i++){
    echo '<input type="radio" name="no_chapter_6_'.($i+1).'" value="OK"'; if($arr_chapter_6[$i]->content=='OK') echo 'checked="checked"'; echo ' /><br />';
}
?>
</td><td valign="top" align="center">
<?php echo '<br />';
for($i=0; $i <= 2; $i++){
    echo '<input type="radio" name="no_chapter_6_'.($i+1).'" value="Not OK"'; if($arr_chapter_6[$i]->content=='Not OK') echo 'checked="checked"'; echo ' /><br />';
}
?>
</td><td valign="top" align="center">
<?php echo '<br />';
for($i=0; $i <= 2; $i++){
    echo '<input type="radio" name="no_chapter_6_'.($i+1).'" value="N/A"'; if($arr_chapter_6[$i]->content=='N/A') echo 'checked="checked"'; echo ' /><br />';
}
?>
</td><td valign="top" align="center"><?php echo '<br />'; for($i=0; $i <= 2; $i++) echo 'Major<br />' ?></td></tr>
</table><br />


<center>
	<input type="button" class="button"  name="prev" value="Prev" onclick="validasi(2,'<?php echo $dx; ?>');" />
    <!--<input type="submit" class="button" name="prev" value="Prev" />-->
    &emsp;
	<input type="reset" class="reset" value="Reset to Default"/>
    &emsp;
    <input type="button" class="button" name="next" value="Next" onclick="validasi(4,'<?php echo $dx; ?>');" />
    <!--<input type="submit" class="button" name="next" value="Next" />-->
    <input type="hidden" name="kirim" value="" />
    <input type="hidden" name="page" value="" />
    <input type="hidden" name="atp_id" value="" />
</center>
</form>

<script>
	function validasi(page, atp_id)
	{
		document.preload2G.page.value=page;
		document.preload2G.atp_id.value=atp_id;
		document.preload2G.submit();
	}
</script>

<?php
if(isset($_POST['kirim']))
{
	
	$Qlist = $this->db->query("SELECT user_id FROM it_atp WHERE atp_id='$dx' AND `fl_quest`='0'");
	$hasil = $Qlist->result_object();
		
	if(!$Qlist->num_rows || ($hasil[0]->user_id == 0)) die(':P');

	//echo '<pre>'; print_r($_POST); echo '</pre>'; die('debugging');
	
	extract($_POST);
	
	require_once('function_kosong.php');
	//----------------------------------------------------
	for($i=1; $i<=4; $i++)
	{
		$var = 'no_chapter_5_'.$i;		
		if(isset($$var)) $quest[] = '5|No|5.'.$i.'|'.$$var;

	}
	//----------------------------------------------------
	$no_chapter_5_1_1a = kosong($no_chapter_5_1_1a);
	$no_chapter_5_1_1b = kosong($no_chapter_5_1_1b);
	$no_chapter_5_1_1c = kosong($no_chapter_5_1_1c);
	$no_chapter_5_1_1d = kosong($no_chapter_5_1_1d);
	$no_chapter_5_1_1e = kosong($no_chapter_5_1_1e);
	
	if(str_replace('null', '', $no_chapter_5_1_1a.$no_chapter_5_1_1b.$no_chapter_5_1_1c.$no_chapter_5_1_1d.$no_chapter_5_1_1e)){
		$quest[] = '5@5.1|No|1|'.$no_chapter_5_1_1a.'|'.$no_chapter_5_1_1b.'|'.$no_chapter_5_1_1c.'|'.$no_chapter_5_1_1d.'|'.$no_chapter_5_1_1e;
	}
	else
	{
		$user_id = $hasil[0]->user_id;
		$this->db->query("DELETE FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `user_id`='$user_id' AND `chapter`=5 AND `no_chapter`='5.1' AND `subno_chapter`='1'");
	}
	//----------------------------------------------------
	for($i=1; $i <= 3; $i++){
		
		$var_a = 'no_chapter_5_2_'.$i.'a';
		$var_b = 'no_chapter_5_2_'.$i.'b';
		$var_c = 'no_chapter_5_2_'.$i.'c';
		$var_d = 'no_chapter_5_2_'.$i.'d';
		
		$$var_a = kosong($$var_a);
		$$var_b = kosong($$var_b);
		$$var_c = kosong($$var_c);
		$$var_d = kosong($$var_d);
		
		if(str_replace('null', '', $$var_a.$$var_b.$$var_c.$$var_d))
		$quest[] = '5@5.2|No|'.$i.'|'.$$var_c.'|'.$$var_a.'|'.$$var_b.'|'.$$var_d;
	}
	//----------------------------------------------------
	for($i=1; $i<=3; $i++)
	{
		$var = 'no_chapter_6_'.$i;
		if(isset($$var)) $quest[] = '6|No|6.'.$i.'|'.$$var;
	}
}
include 'paging.php'; 
?>
</body>
</html>