<?php session_start(); if(empty($_SESSION['isat']['log'])) exit('<script>alert("Session expired, please re-login!");self.close();</script>'); if ( ! defined('BASEPATH')) exit('No direct script access allowed'); $Qtit = $this->db->query("SELECT `title` FROM `it_atp` WHERE `atp_id`='$dx'"); $tit = $Qtit->result_object(); $title = $tit[0]->title; ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xml:lang="en" xmlns="http://www.w3.org/1999/xhtml" lang="en">
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
<title>Preload ATP Ericsson 2G (Page 6) - <?php echo $title ?></title>
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
</head>

<body>

<h2>Preload ATP Ericsson 2G</h2>
<h1>Page 6</h1>
<br /><br />

<form name="preload2G" method="post" action="">

<?php $Qchapter = $this->db->query("SELECT `no_chapter`, `content` FROM `it_atp_chapter` WHERE `atp_id`='$dx' AND `chapter`='14' ORDER BY `atp_chapter_id` ASC"); foreach($Qchapter->result_object() as $chapter) $arr_chapter_14[str_replace('14.', '', $chapter->no_chapter) -1]=$chapter ?>

<table class="border" cellpadding="0" cellspacing="0">
<tr class="header"><td width="40">Chapter</td><td>Title work performed</td><td width="30">OK</td><td width="60">Not OK</td><td width="35">N/A</td><td width="90">Remark</td></tr>
<tr><td width="70" valign="top"><b>14</b></td><td valign="top"><b>RBS Internal Alarm</b><br />Checking status & Functionality of RBS Internal</td>
<td valign="top" align="center"><br /><input type="radio" name="no_chapter_14_1" value="OK" <?php if($arr_chapter_14[0]->content=='OK') echo 'checked="checked"' ?> /></td>
<td valign="top" align="center"><br /><input type="radio" name="no_chapter_14_1" value="Not OK" <?php if($arr_chapter_14[0]->content=='Not OK') echo 'checked="checked"' ?> /></td>
<td valign="top" align="center"><br /><input type="radio" name="no_chapter_14_1" value="N/A" <?php if($arr_chapter_14[0]->content=='N/A') echo 'checked="checked"' ?> /></td>
<td valign="top" align="center"><br />Major</td>
</tr>
</table>

<?php $Qsubchapter = $this->db->query("SELECT `subno_chapter`, `content` FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `chapter`='14' AND `no_chapter`='14.1' ORDER BY `subno_chapter_order` ASC"); foreach($Qsubchapter->result_object() as $subchapter) $arr_subchapter_14_1[$subchapter->subno_chapter -1]=$subchapter ?>

<h3>Table 4: RBS Internal Alarm</h3>
<table class="border" cellpadding="0" cellspacing="0">
<tr class="header">
    <td width="40" rowspan="2">Test no</td>
    <td rowspan="2">Alarm Test</td>
    <td colspan="3">Status RBS1 / RBS2</td>
    <td width="90" rowspan="2">Remark</td>
</tr>
<tr class="header">
    <td width="30">OK</td>
    <td width="40">Not OK</td>
    <td width="35">N/A</td>
</tr>
<?php
$arr_dt_141 = array('Power com loop', 'Internal power capacity reduced', 'Battery backup cap reduced', 'Climate capacity reduced', 'Climate sensor fault');
for($i=0; $i <= 4; $i++){
	$dt_subchapter_14_1 = explode('|', $arr_subchapter_14_1[$i]->content);
	echo '<tr><td>14.1.'.($i +1).'</td><td>'.$arr_dt_141[$i].'</td>';
	echo '<td align="center"><input type="radio" name="no_chapter_14_1_'.($i+1).'" value="OK" ';  if($dt_subchapter_14_1[3]=='OK') echo 'checked="checked"'; echo ' /></td>';
	echo '<td align="center"><input type="radio" name="no_chapter_14_1_'.($i+1).'" value="Not OK" ';  if($dt_subchapter_14_1[3]=='Not OK') echo 'checked="checked"'; echo ' /></td>';
	echo '<td align="center"><input type="radio" name="no_chapter_14_1_'.($i+1).'" value="N/A" ';  if($dt_subchapter_14_1[3]=='N/A') echo 'checked="checked"'; echo ' /></td>';
	echo '<td align="center">Major</td></tr>';
}
?>
</table>

<?php $Qsubchapter = $this->db->query("SELECT `subno_chapter`, `content` FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `chapter`='14' AND `no_chapter`='14.2' ORDER BY `subno_chapter_order` ASC"); foreach($Qsubchapter->result_object() as $subchapter) $arr_subchapter_14_2[$subchapter->subno_chapter -1]=$subchapter ?>

<h3>Table 5: RBS External Alarm (Alarm Text = 6 first character of Cell ID + Alarm type)</h3>
<table class="border" cellpadding="0" cellspacing="0">
<tr class="header">
    <td width="40" rowspan="2">Test no</td>
    <td width="40" rowspan="2">Port no</td>
    <td rowspan="2">Alarm Test</td>
    <td colspan="3">Status RBS1 / RBS2</td>
    <td width="90" rowspan="2">Remark</td>
</tr>
<tr class="header">
    <td width="30">OK</td>
    <td width="40">Not OK</td>
    <td width="35">N/A</td>
</tr>
<?php
$arr_dt_142 = array('Door Open', 'AC Power L1 fails', 'AC Power L2 fails', 'AC Power L3 fails', 'Fire (Smoke Detector)', 'Fire (Heat Detector)', 'Indoor Temp. High', 'Arrester PDB Alarm', '*Genset - Accu Low<br />**Rectifier - Mains Fails', '*Genset - Solar Low<br />** Rectifier - Battery Fuse', '*Genset - Working<br />**Rectifier - Load Fuse', '*Genset - Warming up<br />**Rectifier - Low Voltage', '** Rectifier - Module Alarm<br />*** Rectifier - Mains Fails', '*** Rectifier - Battery Fuse', '*** Rectifier - Module Alarm', 'Arrester (OVP) Alarm<br />(for sites equipped with OVP only)');
for($i=0; $i <= 15; $i++){
	$dt_subchapter_14_2 = explode('|', $arr_subchapter_14_2[$i]->content);
	echo '<tr><td>14.2.'.($i +1).'</td><td align="center"> '.($i +1).'</td><td>'.$arr_dt_142[$i].'</td>';
	echo '<td align="center"><input type="radio" name="no_chapter_14_2_'.($i+1).'" value="OK" ';  if($dt_subchapter_14_2[3]=='OK') echo 'checked="checked"'; echo ' /></td>';
	echo '<td align="center"><input type="radio" name="no_chapter_14_2_'.($i+1).'" value="Not OK" ';  if($dt_subchapter_14_2[3]=='Not OK') echo 'checked="checked"'; echo ' /></td>';
	echo '<td align="center"><input type="radio" name="no_chapter_14_2_'.($i+1).'" value="N/A" ';  if($dt_subchapter_14_2[3]=='N/A') echo 'checked="checked"'; echo ' /></td>';
	echo '<td align="center">Major</td></tr>';
}
?>
</table>


<center>
	<input type="button" class="button"  name="prev" value="Prev" onclick="validasi(5,'<?php echo $dx; ?>');" />
    <!--<input type="submit" class="button" name="prev" value="Prev" />-->
    &emsp;
    <input type="reset" class="reset" value="Reset to Default"/>
    &emsp;
    <input type="button" class="button" name="next" value="Next" onclick="validasi(7,'<?php echo $dx; ?>');" />
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
	
	if(isset($no_chapter_14_1)) $quest[] = '14|No|14.1|'.$no_chapter_14_1;		
	//----------------------------------------------------		
	for($i=1; $i<=5; $i++)
	{
		$chp = 'no_chapter_14_1_'.$i;
		if(isset($$chp)) $quest[] = '14@14.1|No|'.$i.'|'.$$chp;
	}		
	//----------------------------------------------------		
	for($i=1; $i<=16; $i++)
	{
		$chp = 'no_chapter_14_2_'.$i;
		if(isset($$chp)) $quest[] = '14@14.2|No|'.$i.'|'.$$chp;
	}	
}	
include 'paging.php'; 
?>
</body>
</html>