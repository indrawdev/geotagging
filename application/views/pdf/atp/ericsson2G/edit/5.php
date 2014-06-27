<?php session_start(); if(empty($_SESSION['isat']['log'])) exit('<script>alert("Session expired, please re-login!");self.close();</script>'); if ( ! defined('BASEPATH')) exit('No direct script access allowed'); $Qtit = $this->db->query("SELECT `title` FROM `it_atp` WHERE `atp_id`='$dx'"); $tit = $Qtit->result_object(); $title = $tit[0]->title; ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xml:lang="en" xmlns="http://www.w3.org/1999/xhtml" lang="en">
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
<title>Preload ATP Ericsson 2G (Page 5) - <?php echo $title ?></title>
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
<h1>Page 5</h1>
<br /><br />

<form name="preload2G" method="post" action="">

<?php $Qchapter = $this->db->query("SELECT `no_chapter`, `content` FROM `it_atp_chapter` WHERE `atp_id`='$dx' AND `chapter`='12' ORDER BY `atp_chapter_id` ASC"); foreach($Qchapter->result_object() as $chapter) $arr_chapter_12[str_replace('12.', '', $chapter->no_chapter) -1]=$chapter ?>

<table class="border" cellpadding="0" cellspacing="0">
<tr class="header"><td width="40">Chapter</td><td>Title work performed</td><td width="30">OK</td><td width="40">Not OK</td><td width="35">N/A</td><td width="90">Remark</td></tr>
<tr><td width="70" valign="top"><b>12</b><br /><br />12.1</td><td valign="top"><b>Checking Cell Identification & Radio Channel Configuration</b><br />Cell Identification & Radio Channel Configuration<br />OMCR -> RLDEP & RLCFP command printout from the BSC. (Actual Data from site and OMC-R must be the same)</td>
<td valign="top" align="center"><br /><br /><input type="radio" name="no_chapter_12_1" value="OK" <?php if($arr_chapter_12[0]->content=='OK') echo 'checked="checked"' ?> /></td>
<td valign="top" align="center"><br /><br /><input type="radio" name="no_chapter_12_1" value="Not OK" <?php if($arr_chapter_12[0]->content=='Not OK') echo 'checked="checked"' ?> /></td>
<td valign="top" align="center"><br /><br /><input type="radio" name="no_chapter_12_1" value="N/A" <?php if($arr_chapter_12[0]->content=='N/A') echo 'checked="checked"' ?> /></td>
<td valign="top" align="center"><br /><br />Major</td>
</tr></table>

<?php $Qsubchapter = $this->db->query("SELECT `subno_chapter`, `content` FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `chapter`='12' AND `no_chapter`='12.1' ORDER BY `subno_chapter_order` ASC"); foreach($Qsubchapter->result_object() as $subchapter) $arr_subchapter_12_1[$subchapter->subno_chapter -1]=$subchapter ?>

<h3>Table 2: Cell Identification & Radio Channel Configuration (GSM 900)</h3>
<table class="border" cellpadding="0" cellspacing="0">
<tr class="header">
    <td width="80" rowspan="2">Sector</td>
    <td colspan="2">LAC</td>
    <td colspan="2">CI</td>
    <td colspan="2">Radio Channel Configuration</td>
</tr>
<tr class="header">
    <td>Actual<br />Data</td>
    <td>OMC-R<br />Data</td>
    <td>Actual<br />Data</td>
    <td>OMC-R<br />Data</td>
    <td>Actual<br />Data</td>
    <td>OMC-R<br />Data</td>
</tr>
<?php
$arr_dt_121 = array('12.1.1 Sector 1', '12.1.2 Sector 2', '12.1.3 Sector 3');
for($i=0; $i <= 2; $i++){
	$dt_subchapter_12_1 = explode('|', $arr_subchapter_12_1[$i]->content);
	echo '<tr><td>'.$arr_dt_121[$i].'</td>';
	echo '<td><input type="text" name="no_chapter_12_1_'.($i+1).'a" value="'.$this->ifunction->ifnulls($dt_subchapter_12_1[3]).'" /></td><td><input type="text" name="no_chapter_12_1_'.($i+1).'b" value="'.$this->ifunction->ifnulls($dt_subchapter_12_1[4]).'" /></td><td><input type="text" name="no_chapter_12_1_'.($i+1).'c" value="'.$this->ifunction->ifnulls($dt_subchapter_12_1[5]).'" /></td><td><input type="text" name="no_chapter_12_1_'.($i+1).'d" value="'.$this->ifunction->ifnulls($dt_subchapter_12_1[6]).'" /></td><td><input type="text" name="no_chapter_12_1_'.($i+1).'e" value="'.$this->ifunction->ifnulls($dt_subchapter_12_1[7]).'" /></td><td><input type="text" name="no_chapter_12_1_'.($i+1).'f" value="'.$this->ifunction->ifnulls($dt_subchapter_12_1[8]).'" /></td></tr>';
}
?>
</table>

<h3>Table 3: Cell Identification & Radio Channel Configuration (DCS 1800)</h3>
<table class="border" cellpadding="0" cellspacing="0">
<tr class="header">
    <td width="80" rowspan="2">Sector</td>
    <td colspan="2">LAC</td>
    <td colspan="2">CI</td>
    <td colspan="2">Radio Channel Configuration</td>
</tr>
<tr class="header">
    <td>Actual<br />Data</td>
    <td>OMC-R<br />Data</td>
    <td>Actual<br />Data</td>
    <td>OMC-R<br />Data</td>
    <td>Actual<br />Data</td>
    <td>OMC-R<br />Data</td>
</tr>
<?php
$arr_dt_121 = array(3 => '12.1.4 Sector 1', '12.1.5 Sector 2', '12.1.6 Sector 3');
for($i=3; $i <= 5; $i++){
	$dt_subchapter_12_1 = explode('|', $arr_subchapter_12_1[$i]->content);
	//if($dt_subchapter_12_1[2] == $i)
	echo '<tr><td>'.$arr_dt_121[$i].'</td>';
	echo '<td><input type="text" name="no_chapter_12_1_'.($i+1).'a" value="'.$this->ifunction->ifnulls($dt_subchapter_12_1[3]).'" /></td><td><input type="text" name="no_chapter_12_1_'.($i+1).'b" value="'.$this->ifunction->ifnulls($dt_subchapter_12_1[4]).'" /></td><td><input type="text" name="no_chapter_12_1_'.($i+1).'c" value="'.$this->ifunction->ifnulls($dt_subchapter_12_1[5]).'" /></td><td><input type="text" name="no_chapter_12_1_'.($i+1).'d" value="'.$this->ifunction->ifnulls($dt_subchapter_12_1[6]).'" /></td><td><input type="text" name="no_chapter_12_1_'.($i+1).'e" value="'.$this->ifunction->ifnulls($dt_subchapter_12_1[7]).'" /></td><td><input type="text" name="no_chapter_12_1_'.($i+1).'f" value="'.$this->ifunction->ifnulls($dt_subchapter_12_1[8]).'" /></td></tr>';
}
?>
</table><br />

<?php $Qchapter = $this->db->query("SELECT `no_chapter`, `content` FROM `it_atp_chapter` WHERE `atp_id`='$dx' AND `chapter`='13' ORDER BY `atp_chapter_id` ASC"); foreach($Qchapter->result_object() as $chapter) $arr_chapter_13[str_replace('13.', '', $chapter->no_chapter) -1]=$chapter ?>

<table class="border" cellpadding="0" cellspacing="0">
<tr class="header"><td width="40">Chapter</td><td>Title work performed</td><td width="30">OK</td><td width="40">Not OK</td><td width="35">N/A</td><td width="90">Remark</td></tr>
<tr><td valign="top"><b>13</b><br /><br />13.1<br /><br />13.2</td><td valign="top"><b>Checking RBS Internal alarm status & functionality of RBS External alarm</b><br />Checking status & Functionality of RBS Internal Alarm by doing simulation test on RBS<br />Checking status & functionality External alarms by doing simulation test on transducer/sensor</td>
<td valign="top" align="center">
<?php echo '<br /><br />';
for($i=0; $i <= 1; $i++){
    echo '<input type="radio" name="no_chapter_13_'.($i+1).'" value="OK"'; if($arr_chapter_13[$i]->content=='OK') echo 'checked="checked"'; echo ' /><br />';
    if($i==0) echo '<br />';
}
?>
</td><td valign="top" align="center">
<?php echo '<br /><br />';
for($i=0; $i <= 1; $i++){
    echo '<input type="radio" name="no_chapter_13_'.($i+1).'" value="Not OK"'; if($arr_chapter_13[$i]->content=='Not OK') echo 'checked="checked"'; echo ' /><br />';
    if($i==0) echo '<br />';
}
?>
</td><td valign="top" align="center">
<?php echo '<br /><br />';
for($i=0; $i <= 1; $i++){
    echo '<input type="radio" name="no_chapter_13_'.($i+1).'" value="N/A"'; if($arr_chapter_13[$i]->content=='N/A') echo 'checked="checked"'; echo ' /><br />';
    if($i==0) echo '<br />';
}
?>
</td><td valign="top" align="center"><br /><br />Major<br /><br />Major</td></tr>
</table>

<hr />

<center>
	<input type="button" class="button"  name="prev" value="Prev" onclick="validasi(4,'<?php echo $dx; ?>');" />
    <!--<input type="submit" class="button" name="prev" value="Prev" />-->
    &emsp;
    <input type="reset" class="reset" value="Reset to Default"/>
    &emsp;
    <input type="button" class="button" name="next" value="Next" onclick="validasi(6,'<?php echo $dx; ?>');" />
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
	
	if(isset($no_chapter_12_1)) $quest[] = $quest[] = "12|No|12.1|".$no_chapter_12_1;
	//----------------------------------------------------		
	for($i=1; $i<=6; $i++)
	{
		$col_a = 'no_chapter_12_1_'.$i.'a';
		$col_b = 'no_chapter_12_1_'.$i.'b';
		$col_c = 'no_chapter_12_1_'.$i.'c';
		$col_d = 'no_chapter_12_1_'.$i.'d';
		$col_e = 'no_chapter_12_1_'.$i.'e';
		$col_f = 'no_chapter_12_1_'.$i.'f';
		
		$$col_a = kosong($$col_a);
		$$col_b = kosong($$col_b);
		$$col_c = kosong($$col_c);
		$$col_d = kosong($$col_d);
		$$col_e = kosong($$col_e);
		$$col_f = kosong($$col_f);
		
		if(str_replace('null', '', $$col_a.$$col_b.$$col_c.$$col_d.$$col_e.$$col_f))
		{
			$quest[] = '12@12.1|No|'.$i.'|'.$$col_a.'|'.$$col_b.'|'.$$col_c.'|'.$$col_d.'|'.$$col_e.'|'.$$col_f;
		}
		else
		{
			$user_id = $hasil[0]->user_id;
			$this->db->query("DELETE FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `user_id`='$user_id' AND `chapter`='12' AND `no_chapter`='12.1' AND `subno_chapter`='$i'");
		}

	}		
	//----------------------------------------------------
	for($i=1; $i<=2; $i++)
	{
		$chp = 'no_chapter_13_'.$i;
		if(isset($$chp)) $quest[] = '13|No|13.'.$i.'|'.$$chp;
	}
}
include 'paging.php'; 
?>
</body>
</html>