<?php session_start(); if(empty($_SESSION['isat']['log'])) exit('<script>alert("Session expired, please re-login!");self.close();</script>');if ( ! defined('BASEPATH')) exit('No direct script access allowed'); $Qtit = $this->db->query("SELECT `title` FROM `it_atp` WHERE `atp_id`='$dx'"); $tit = $Qtit->result_object(); $title = $tit[0]->title; ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xml:lang="en" xmlns="http://www.w3.org/1999/xhtml" lang="en">
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
<title>Preload ATP Ericsson 3G (Page 7) - <?php echo $title ?></title>
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
	width:90%;
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
<h1>Page 7</h1><br /><br />

<form name="preload3G" method="post" action="">

<?php $Qchapter = $this->db->query("SELECT `no_chapter`, `content` FROM `it_atp_chapter` WHERE `atp_id`='$dx' AND `chapter`='7' ORDER BY `atp_chapter_id` ASC"); foreach($Qchapter->result_object() as $chapter) $arr_chapter_7[str_replace('7.', '', $chapter->no_chapter) -1]=$chapter ?>

<table class="border" cellpadding="0" cellspacing="0">
<tr class="header"><td width="40">Chapter</td><td>Title work performed</td><td width="30">OK</td><td width="40">Not OK</td><td width="35">N/A</td><td width="90">Remark</td></tr>
<tr><td valign="top"><b>7</b><br />7.1<br />7.2<br />7.3<br />7.4<br />7.5<br />7.6<br />7.7</td>
<td valign="top"><b>RBS Local Cell (On line Test)</b><br />Check RBS Local Cell-1<br />Check RBS Local Cell-2<br />Check RBS Local Cell-3<br />Check RBS Local Cell-4<br />Check RBS Local Cell-5<br />Check RBS Local Cell-6<br />Check Carrier for HSDPA and HSUPA<br />(HsDschRecources and EDchRecources)</td>
<td valign="top" align="center">
<?php echo '<br />';
for($i=0; $i <= 6; $i++){
    echo '<input type="radio" name="no_chapter_7_'.($i+1).'" value="OK" '; if($arr_chapter_7[$i]->content=='OK') echo 'checked="checked"'; echo '><br />';
}
?>
</td><td valign="top" align="center">
<?php echo '<br />';
for($i=0; $i <= 6; $i++){
    echo '<input type="radio" name="no_chapter_7_'.($i+1).'" value="Not OK" '; if($arr_chapter_7[$i]->content=='Not OK') echo 'checked="checked"'; echo '><br />';
}
?>
</td><td valign="top" align="center">
<?php echo '<br />';
for($i=0; $i <= 6; $i++){
    echo '<input type="radio" name="no_chapter_7_'.($i+1).'" value="N/A" '; if($arr_chapter_7[$i]->content=='N/A') echo 'checked="checked"'; echo '><br />';
}
?>
</td><td valign="top" align="center"><?php echo '<br />'; for($i=0; $i <= 6; $i++) echo 'Major<br />' ?></td></tr>
</table><br />

<?php $Qchapter = $this->db->query("SELECT `no_chapter`, `content` FROM `it_atp_chapter` WHERE `atp_id`='$dx' AND `chapter`='8' ORDER BY `atp_chapter_id` ASC"); foreach($Qchapter->result_object() as $chapter) $arr_chapter_8[str_replace('8.', '', $chapter->no_chapter) -1]=$chapter ?>

<table class="border" cellpadding="0" cellspacing="0">
<tr class="header"><td width="40">Chapter</td><td>Title work performed</td><td width="30">OK</td><td width="40">Not OK</td><td width="35">N/A</td><td width="90">Remark</td></tr>
<tr><td valign="top"><b>8</b><br />8.1<br />8.2<br />8.3</td>
<td valign="top"><b>Verify IP over ATM</b><br />IP over ATM<br />Verify RBS Restart (Software Version)<br />Verify LED STATUS</td>
<td valign="top" align="center">
<?php echo '<br />';
for($i=0; $i <= 2; $i++){
    echo '<input type="radio" name="no_chapter_8_'.($i+1).'" value="OK" '; if($arr_chapter_8[$i]->content=='OK') echo 'checked="checked"'; echo '><br />';
}
?>
</td><td valign="top" width="40" align="center">
<?php echo '<br />';
for($i=0; $i <= 2; $i++){
    echo '<input type="radio" name="no_chapter_8_'.($i+1).'" value="Not OK" '; if($arr_chapter_8[$i]->content=='Not OK') echo 'checked="checked"'; echo '><br />';
}
?>
</td><td valign="top" width="35" align="center">
<?php echo '<br />';
for($i=0; $i <= 2; $i++){
    echo '<input type="radio" name="no_chapter_8_'.($i+1).'" value="N/A" '; if($arr_chapter_8[$i]->content=='N/A') echo 'checked="checked"'; echo '><br />';
}
?>
</td><td valign="top" align="center" width="90"><?php echo '<br />'; for($i=0; $i <= 2; $i++) echo 'Major<br />' ?></td></tr>
</table>

<?php $Qsubchapter = $this->db->query("SELECT `subno_chapter`, `content` FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `chapter`='8' AND `no_chapter`='8.4' ORDER BY `subno_chapter_order` ASC"); foreach($Qsubchapter->result_object() as $subchapter) $arr_subchapter_8_4[$subchapter->subno_chapter -1]=$subchapter ?>

<h3>Chapter 8.4: Verify LED STATUS (RBS already integrated to the system)</h3>
<table class="border" cellpadding="0" cellspacing="0">				
<tr class="header"><td>Unit</td><td width="65">Green LED</td><td width="65">Red LED</td><td width="65">Yellow LED</td><td width="30">OK</td><td width="40">Not OK</td><td width="35">N/A</td><td width="90">Remark</td></tr>
<?php
$arr_dt_84a = array('SCB', 'ETB/ETMC1/ETMFX', 'TUB', 'HSDPA', 'BBIFB', 'RAX 32/64/128', 'GPB', 'HS-TX 15/45/60', 'RFIFB', 'TRX sec 1', 'TRX sec 2', 'TRX sec 3', 'MCPA sec 1', 'MCPA sec 2');
for($i=0; $i <= 13; $i++){
	$dt_subchapter_8_4a = explode('|', $arr_subchapter_8_4[$i]->content);
	echo '<tr><td>'.$arr_dt_84a[$i];
	echo '</td><td><input type="text" name="no_chapter_8_4_'.($i+1).'a" value="'.$this->ifunction->ifnulls($dt_subchapter_8_4a[3]).'" /></td><td><input type="text" name="no_chapter_8_4_'.($i+1).'b" value="'.$this->ifunction->ifnulls($dt_subchapter_8_4a[4]).'" /></td><td><input type="text" name="no_chapter_8_4_'.($i+1).'c" value="'.$this->ifunction->ifnulls($dt_subchapter_8_4a[5]).'" /></td>';
	echo '<td align="center"><input type="radio" name="no_chapter_8_4_'.($i+1).'d" value="OK" '; if($dt_subchapter_8_4a[6]=='OK') echo 'checked="checked"'; echo ' /></td>';
	echo '<td align="center"><input type="radio" name="no_chapter_8_4_'.($i+1).'d" value="Not OK" '; if($dt_subchapter_8_4a[6]=='Not OK') echo 'checked="checked"'; echo ' /></td>';
	echo '<td align="center"><input type="radio" name="no_chapter_8_4_'.($i+1).'d" value="N/A" '; if($dt_subchapter_8_4a[6]=='N/A') echo 'checked="checked"'; echo ' /></td>';
	echo '<td><input type="text" name="no_chapter_8_4_'.($i+1).'e" value="'.$this->ifunction->ifnulls($dt_subchapter_8_4a[7]).'" /></td></tr>';
}
?>
</table>

<hr />

<table class="border" cellpadding="0" cellspacing="0">
<?php
$arr_dt_84b = array('MCPA sec 3', 'MCPA Fan', 'Fan Unit 1', 'Fan Unit 2', 'Fan Unit 3', 'PCU', 'BFU34', 'ACCU', 'XALM (EACU)', 'CBU', 'RUIF', 'CLU (climate Unit)', 'BB Sub Rack Fan', 'RF Sub Rack Fan', 'AIU sec 1', 'AIU sec 2', 'AIU sec 3', 'FU (filter unit)1', 'FU (filter unit)2', 'FU (filter unit)3', 'FU (filter unit)4', 'FU (filter unit)5', 'FU (filter unit)6', 'RU21 20/40/60 sec 1', 'RU21 20/40/60 sec 2', 'RU21 20/40/60 sec 3', 'RU21 20/40/60 sec 4 ', 'RU21 20/40/60 sec 5', 'RU21 20/40/60 sec 6', 'PSU 1', 'PSU 2', 'PSU 3', 'PSU 4', 'OBIF', 'RRU 10/20/40 sec 1', 'RRU 10/20/40 sec 2', 'RRU 10/20/40 sec 3', 'RRU 10/20/40 sec 4', 'RRU 10/20/40 sec 5');
$ib = 14;
for($i=0; $i <= 38; $i++){
	$dt_subchapter_8_4b = explode('|', $arr_subchapter_8_4[$ib]->content);
	echo '<tr><td>'.$arr_dt_84b[$i];
	echo '</td><td width="65"><input type="text" name="no_chapter_8_4_'.($ib+1).'a" value="'.$this->ifunction->ifnulls($dt_subchapter_8_4b[3]).'" /></td><td width="65"><input type="text" name="no_chapter_8_4_'.($ib+1).'b" value="'.$this->ifunction->ifnulls($dt_subchapter_8_4b[4]).'" /></td><td width="65"><input type="text" name="no_chapter_8_4_'.($ib+1).'c" value="'.$this->ifunction->ifnulls($dt_subchapter_8_4b[5]).'" /></td>';
	echo '<td width="30" align="center"><input type="radio" name="no_chapter_8_4_'.($ib+1).'d" value="OK" '; if($dt_subchapter_8_4b[6]=='OK') echo 'checked="checked"'; echo ' /></td>';
	echo '<td width="40" align="center"><input type="radio" name="no_chapter_8_4_'.($ib+1).'d" value="Not OK" '; if($dt_subchapter_8_4b[6]=='Not OK') echo 'checked="checked"'; echo ' /></td>';
	echo '<td width="35" align="center"><input type="radio" name="no_chapter_8_4_'.($ib+1).'d" value="N/A" '; if($dt_subchapter_8_4b[6]=='N/A') echo 'checked="checked"'; echo ' /></td>';
	echo '<td width="90"><input type="text" name="no_chapter_8_4_'.($ib+1).'e" value="'.$this->ifunction->ifnulls($dt_subchapter_8_4b[7]).'" /></td></tr>';
	$ib++;
}
?>
</table>

<hr />

<table class="border" cellpadding="0" cellspacing="0">
<?php
$arr_dt_84c = array('RRU 10/20/40 sec 6', 'DUW', 'DUG', 'RUW 20/40/60 sec 1', 'RUW 20/40/60 sec 2', 'RUW 20/40/60 sec 3', 'RUW 20/40/60 sec 4', 'RUW 20/40/60 sec 5', 'RUW 20/40/60 sec 6', 'RRUW 10/20/40 sec 1', 'RRUW 10/20/40 sec 2', 'RRUW 10/20/40 sec 3', 'RRUW 10/20/40 sec 4', 'RRUW 10/20/40 sec 5', 'RRUW 10/20/40 sec 6', 'SCU', 'SAU');
$ic = 53;
for($i=0; $i <= 16; $i++){
	$dt_subchapter_8_4c = explode('|', $arr_subchapter_8_4[$ic]->content);
	echo '<tr><td>'.$arr_dt_84c[$i];
	echo '</td><td width="65"><input type="text" name="no_chapter_8_4_'.($ic+1).'a" value="'.$this->ifunction->ifnulls($dt_subchapter_8_4c[3]).'" /></td><td width="65"><input type="text" name="no_chapter_8_4_'.($ic+1).'b" value="'.$this->ifunction->ifnulls($dt_subchapter_8_4c[4]).'" /></td><td width="65"><input type="text" name="no_chapter_8_4_'.($ic+1).'c" value="'.$this->ifunction->ifnulls($dt_subchapter_8_4c[5]).'" /></td>';
	echo '<td width="30" align="center"><input type="radio" name="no_chapter_8_4_'.($ic+1).'d" value="OK" '; if($dt_subchapter_8_4c[6]=='OK') echo 'checked="checked"'; echo ' /></td>';
	echo '<td width="40" align="center"><input type="radio" name="no_chapter_8_4_'.($ic+1).'d" value="Not OK" '; if($dt_subchapter_8_4c[6]=='Not OK') echo 'checked="checked"'; echo ' /></td>';
	echo '<td width="35" align="center"><input type="radio" name="no_chapter_8_4_'.($ic+1).'d" value="N/A" '; if($dt_subchapter_8_4c[6]=='N/A') echo 'checked="checked"'; echo ' /></td>';
	echo '<td width="90"><input type="text" name="no_chapter_8_4_'.($ic+1).'e" value="'.$this->ifunction->ifnulls($dt_subchapter_8_4c[7]).'" /></td></tr>';
	$ic++;
}
?>
</table>

<hr />

<center>
    <input type="button" class="button" name="prev" value="Prev" onclick="validasi(6, <?php echo $dx ?>)" />
    &emsp; <input type="reset" class="reset" value="Reset to Default"/> &emsp;
    <input type="button" class="button" name="next" value="Next" onclick="validasi(8, <?php echo $dx ?>)" />
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
	
	for($i=1; $i<=7; $i++)
	{
		$chp = 'no_chapter_7_'.$i;
		if(isset($$chp)) $quest[] = '7|No|7.'.$i.'|'.$$chp; else { $$chp = "null"; $quest[] = '7|No|7.'.$i.'|'.$$chp; }
	}
	//--------------------------------------------------
	for($i=1; $i<=3; $i++)
	{
		$chp = 'no_chapter_8_'.$i;
		if(isset($$chp)) $quest[] = '8|No|8.'.$i.'|'.$$chp; else { $$chp = "null"; $quest[] = '8|No|8.'.$i.'|'.$$chp; }
	}
	//--------------------------------------------------
	for($i=1; $i<=70; $i++)
	{	
		$col_a = 'no_chapter_8_4_'.$i.'a';
		$col_b = 'no_chapter_8_4_'.$i.'b';
		$col_c = 'no_chapter_8_4_'.$i.'c';
		$col_d = 'no_chapter_8_4_'.$i.'d';
		$col_e = 'no_chapter_8_4_'.$i.'e';
		
		$$col_a = kosong($$col_a);
		$$col_b = kosong($$col_b);
		$$col_c = kosong($$col_c);
		$$col_d = kosong($$col_d);
		$$col_e = kosong($$col_e);
		
		if(str_replace('null', 'null', $$col_a.$$col_b.$$col_c.$$col_d.$$col_e)){
			$quest[] = '8@8.4|No|'.$i.'|'.$$col_a.'|'.$$col_b.'|'.$$col_c.'|'.$$col_d.'|'.$$col_e;
		}
	}
}
include 'paging.php';
?>

</body>
</html>