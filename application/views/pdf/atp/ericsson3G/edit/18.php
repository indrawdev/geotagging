<?php session_start(); if(empty($_SESSION['isat']['log'])) exit('<script>alert("Session expired, please re-login!");self.close();</script>');if ( ! defined('BASEPATH')) exit('No direct script access allowed'); $Qtit = $this->db->query("SELECT `title` FROM `it_atp` WHERE `atp_id`='$dx'"); $tit = $Qtit->result_object(); $title = $tit[0]->title; ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xml:lang="en" xmlns="http://www.w3.org/1999/xhtml" lang="en">
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
<title>Preload ATP Ericsson 3G (Page 18) - <?php echo $title ?></title>
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
<h2>Preload ATP Ericsson 3G</h2>
<h1>Page 18</h1><br /><br />

<form name="preload3G" method="post" action="">

<?php $Qchapter = $this->db->query("SELECT `no_chapter`, `content` FROM `it_atp_chapter` WHERE `atp_id`='$dx' AND `chapter`='15' ORDER BY `atp_chapter_id` ASC"); foreach($Qchapter->result_object() as $chapter) $arr_chapter_15[str_replace('15.', '', $chapter->no_chapter) -1]=$chapter ?>

<h3>C. Test should be done when RBS is On Line</h3>
<table class="border" cellpadding="0" cellspacing="0">
<tr class="header"><td width="40">Chapter</td><td>Title work performed</td><td width="30">OK</td><td width="40">Not OK</td><td width="35">N/A</td><td width="65">Remark</td></tr>
<tr><td valign="top"><b>15</b><br />15.1</td>
<td valign="top"><b>Checking Downloading software (script) status</b><br />* Downloading Software (script) Status</td>
<td valign="bottom" align="center"><input type="radio" name="no_chapter_15_1" value="OK" <?php if($arr_chapter_15[0]->content=='OK') echo 'checked="checked"'; ?> /></td>
<td valign="bottom" align="center"><input type="radio" name="no_chapter_15_1" value="Not OK" <?php if($arr_chapter_15[0]->content=='Not OK') echo 'checked="checked"'; ?> /></td>
<td valign="bottom" align="center"><input type="radio" name="no_chapter_15_1" value="N/A" <?php if($arr_chapter_15[0]->content=='N/A') echo 'checked="checked"'; ?> /></td>
<td valign="bottom" align="center">Major</td></tr></table>
<!--p style="font-size:11px"><i>* DT Script should be attached</i></p-->

<?php $Qchapter = $this->db->query("SELECT `no_chapter`, `content` FROM `it_atp_chapter` WHERE `atp_id`='$dx' AND `chapter`='16' ORDER BY `atp_chapter_id` ASC"); foreach($Qchapter->result_object() as $chapter) $arr_chapter_16[str_replace('16.', '', $chapter->no_chapter) -1]=$chapter ?>

<table class="border" cellpadding="0" cellspacing="0">
<tr><td valign="top" width="40"><b>16</b><br /><br /><br />16.1</td>
<td valign="top"><b>Checking Hardware Technical Status and Configuration, by comparing site configuration from the OMC-R against actual site configuration</b><br />Hardware Technical Status & Configuration</td>
<td valign="bottom" width="30" align="center"><input type="radio" name="no_chapter_16_1" value="OK" <?php if($arr_chapter_16[0]->content=='OK') echo 'checked="checked"'; ?> /></td>
<td valign="bottom" width="40" align="center"><input type="radio" name="no_chapter_16_1" value="Not OK" <?php if($arr_chapter_16[0]->content=='Not OK') echo 'checked="checked"'; ?> /></td>
<td valign="bottom" width="35" align="center"><input type="radio" name="no_chapter_16_1" value="N/A" <?php if($arr_chapter_16[0]->content=='N/A') echo 'checked="checked"'; ?> /></td>
<td valign="bottom" align="center" width="65">Major</td></tr></table>

<?php $Qchapter = $this->db->query("SELECT `no_chapter`, `content` FROM `it_atp_chapter` WHERE `atp_id`='$dx' AND `chapter`='17' ORDER BY `atp_chapter_id` ASC"); foreach($Qchapter->result_object() as $chapter) $arr_chapter_17[str_replace('17.', '', $chapter->no_chapter) -1]=$chapter ?>

<table class="border" cellpadding="0" cellspacing="0">
<tr>
<td width="40" valign="top"><b>17</b><br />17.1<br /><br />17.2</td>
<td valign="top"><b>Checking status & functionality of RBS Internal & External Alarm</b><br />Checking status & Functionality of RBS Internal Alarm by doing simulation test on RBS<br />Checking status & functionality External alarms by doing simulation test on transducer/sensor<br />(All active alarms should be cleared)</td>
<td valign="top" width="30" align="center">
<?php echo '<br />';
for($i=0; $i <= 1; $i++){
	echo '<input type="radio" name="no_chapter_17_'.($i+1).'" value="OK" '; if($arr_chapter_17[$i]->content=='OK') echo 'checked="checked"'; echo '><br />';
	echo '<br />';
}
?>
</td><td valign="top" width="40" align="center">
<?php echo '<br />';
for($i=0; $i <= 1; $i++){
	echo '<input type="radio" name="no_chapter_17_'.($i+1).'" value="Not OK" '; if($arr_chapter_17[$i]->content=='Not OK') echo 'checked="checked"'; echo '><br />';
	echo '<br />';
}
?>
</td><td valign="top" width="35" align="center">
<?php echo '<br />';
for($i=0; $i <= 1; $i++){
	echo '<input type="radio" name="no_chapter_17_'.($i+1).'" value="N/A" '; if($arr_chapter_17[$i]->content=='N/A') echo 'checked="checked"'; echo '><br />';
	echo '<br />';
}
?>
</td><td valign="top" align="center" width="65"><?php echo '<br />'; for($i=0; $i <= 1; $i++) echo 'Major<br /><br />' ?></td></tr>
</table>

<?php $Qsubchapter = $this->db->query("SELECT `subno_chapter`, `content` FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `chapter`='17' AND `no_chapter`='17.1' ORDER BY `subno_chapter_order` ASC"); foreach($Qsubchapter->result_object() as $subchapter) $arr_subchapter_17_1[$subchapter->subno_chapter -1]=$subchapter ?>

<h3>Chapter 17.1: RBS Internal Alarm</h3>
<table class="border" cellpadding="0" cellspacing="0">
<tr class="header"><td width="40" rowspan="2">Test No</td><td rowspan="2">Alarm Test</td><td colspan="3">Status RBS1</td><td width="150" rowspan="2">Remark</td></tr>
<tr class="header"><td width="30">OK</td><td width="40">Not OK</td><td width="35">N/A</td></tr>
<?php
$arr_dt_171 = array('Fan Off', 'PSU 1 , 2 , 3 of 4 off (MAINS FAILURE)', 'Bfu_DcDistributionFailure');
for($i=0; $i <= 2; $i++){
	$dt_subchapter_17_1 = explode('|', $arr_subchapter_17_1[$i]->content);
	echo '<tr><td>17.1.'.($i +1).'</td><td>'.$arr_dt_171[$i].'</td>';
	echo '<td align="center"><input type="radio" name="no_chapter_17_1_'.($i+1).'a" value="OK" '; if($dt_subchapter_17_1[3]=='OK') echo 'checked="checked"'; echo ' /></td>';
	echo '<td align="center"><input type="radio" name="no_chapter_17_1_'.($i+1).'a" value="Not OK" '; if($dt_subchapter_17_1[3]=='Not OK') echo 'checked="checked"'; echo ' /></td>';
	echo '<td align="center"><input type="radio" name="no_chapter_17_1_'.($i+1).'a" value="N/A" '; if($dt_subchapter_17_1[3]=='N/A') echo 'checked="checked"'; echo ' /></td>';
	echo '<td><input type="text" name="no_chapter_17_1_'.($i+1).'b" value="'.$this->ifunction->ifnulls($dt_subchapter_17_1[4]).'" /></td></tr>';
}
?>
</table>

<?php $Qsubchapter = $this->db->query("SELECT `subno_chapter`, `content` FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `chapter`='17' AND `no_chapter`='17.2' ORDER BY `subno_chapter_order` ASC"); foreach($Qsubchapter->result_object() as $subchapter) $arr_subchapter_17_2[$subchapter->subno_chapter -1]=$subchapter ?>

<h3>Chapter 17.2: RBS External Alarm (Alarm Text = 6 first character of Cell ID + Alarm type)</h3>
<table class="border" cellpadding="0" cellspacing="0">
<tr class="header"><td width="40" rowspan="2">Test No</td><td width="60" rowspan="2">Port No</td><td rowspan="2">Alarm Test</td><td colspan="3">Status RBS1</td><td  width="150" rowspan="2">Remark</td></tr>
<tr class="header"><td width="30">OK</td><td width="40">Not OK</td><td width="35">N/A</td></tr>
<?php
$arr_dt_172a = array('Door Open', 'Fire Smoke - Heat Alarm', 'Temperature Alarm', 'AC Power L1 fails', 'AC Power L2 fails', 'AC Power L3 fails');
for($i=0; $i <= 5; $i++){
	$dt_subchapter_17_2a = explode('|', $arr_subchapter_17_2[$i]->content);
	echo '<tr><td>17.2.'.($i +1).'</td><td align="center">'.($i +1).'</td><td>'.$arr_dt_172a[$i].'</td>';
	echo '<td align="center"><input type="radio" name="no_chapter_17_2_'.($i+1).'a" value="OK" '; if($dt_subchapter_17_2a[3]=='OK') echo 'checked="checked"'; echo ' /></td>';
	echo '<td align="center"><input type="radio" name="no_chapter_17_2_'.($i+1).'a" value="Not OK" '; if($dt_subchapter_17_2a[3]=='Not OK') echo 'checked="checked"'; echo ' /></td>';
	echo '<td align="center"><input type="radio" name="no_chapter_17_2_'.($i+1).'a" value="N/A" '; if($dt_subchapter_17_2a[3]=='N/A') echo 'checked="checked"'; echo ' /></td>';
	echo '<td><input type="text" name="no_chapter_17_2_'.($i+1).'b" value="'.$this->ifunction->ifnulls($dt_subchapter_17_2a[4]).'" /></td></tr>';
}
?>
</table>

<hr />

<center>
    <input type="button" class="button" name="prev" value="Prev" onclick="validasi(17, <?php echo $dx ?>)" />
    &emsp; <input type="reset" class="reset" value="Reset to Default"/> &emsp;
    <input type="button" class="button" name="next" value="Next" onclick="validasi(19, <?php echo $dx ?>)" />
    <input type="hidden" name="kirim" value="" />
    <input type="hidden" name="page" value="" />
    <input type="hidden" name="atp_id" value="" />
</center>
</form>
<script type="text/javascript">
function validasi(page, atp_id)
{
	document.preload3G.page.value=page;
	document.preload3G.atp_id.value=atp_id;
	document.preload3G.submit();
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
	
	if(isset($no_chapter_15_1)) $quest[] = '15|No|15.1|'.$no_chapter_15_1; else { $quest[] = '15|No|15.1|null'; }
	if(isset($no_chapter_16_1)) $quest[] = '16|No|16.1|'.$no_chapter_16_1; else { $quest[] = '16|No|16.1|null'; }
	if(isset($no_chapter_17_1)) $quest[] = '17|No|17.1|'.$no_chapter_17_1; else { $quest[] = '17|No|17.1|null'; }
	if(isset($no_chapter_17_2)) $quest[] = '17|No|17.2|'.$no_chapter_17_2; else { $quest[] = '17|No|17.2|null'; }
	//----------------------------------------------------
	for($i=1; $i<=3; $i++)
	{
		$col_a = 'no_chapter_17_1_'.$i.'a';
		$col_b = 'no_chapter_17_1_'.$i.'b';
		
		$$col_a = kosong($$col_a);
		$$col_b = kosong($$col_b);
		
		if(str_replace('null', 'null', $$col_a.$$col_b)){
			$quest[] = '17@17.1|No|'.$i.'|'.$$col_a.'|'.$$col_b;
		}
	}
	//----------------------------------------------------
	for($i=1; $i<=6; $i++)
	{
		$col_a = 'no_chapter_17_2_'.$i.'a';
		$col_b = 'no_chapter_17_2_'.$i.'b';
		
		$$col_a = kosong($$col_a);
		$$col_b = kosong($$col_b);
		
		if(str_replace('null', 'null', $$col_a.$$col_b)){
			$quest[] = '17@17.2|No|'.$i.'|'.$$col_a.'|'.$$col_b;
		}
	}
}

include 'paging.php';
?>

</body>
</html>