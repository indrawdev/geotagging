<?php session_start(); if(empty($_SESSION['isat']['log'])) exit('<script>alert("Session expired, please re-login!");self.close();</script>');if ( ! defined('BASEPATH')) exit('No direct script access allowed'); $Qtit = $this->db->query("SELECT `title` FROM `it_atp` WHERE `atp_id`='$dx'"); $tit = $Qtit->result_object(); $title = $tit[0]->title; ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xml:lang="en" xmlns="http://www.w3.org/1999/xhtml" lang="en">
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
<title>Preload ATP Ericsson 3G (Page 20) - <?php echo $title ?></title>
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
<h1>Page 20</h1><br /><br />

<form name="preload3G" method="post" action="">

<?php $Qsubchapter = $this->db->query("SELECT `subno_chapter`, `content` FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `chapter`='18' AND `no_chapter`='18.2' ORDER BY `subno_chapter_order` ASC"); foreach($Qsubchapter->result_object() as $subchapter) $arr_subchapter_18_2[$subchapter->subno_chapter -1]=$subchapter ?>

<h3>Chapter 18.2: Voice Test Call</h3>
<table class="border" cellpadding="0" cellspacing="0">
<tr class="header"><td width="60" rowspan="2">Item Test</td><td rowspan="2">MO<br />Number</td><td rowspan="2">MT<br />Number</td><td colspan="8">Test Call Result</td><td width="40" rowspan="2">Remark</td></tr>
<tr class="header"><td colspan="2">ATM</td><td colspan="2">Dual Stack (2E1)</td><td colspan="2">Dual Stack (1E1)</td><td colspan="2">Native IP</td></tr>
<?php
$arr_dt_182 = array('Mobile Originating', 'Mobile Terminating');
for($i=0; $i <= 1; $i++){
	$dt_subchapter_18_2 = explode('|', $arr_subchapter_18_2[$i]->content);
	echo '<tr><td>'.$arr_dt_182[$i].'</td>';
	echo '<td><input type="text" name="no_chapter_18_2_'.($i+1).'a" value="'.$this->ifunction->ifnulls($dt_subchapter_18_2[3]).'" /></td><td><input type="text" name="no_chapter_18_2_'.($i+1).'b" value="'.$this->ifunction->ifnulls($dt_subchapter_18_2[4]).'" /></td>';
	echo '<td width="35" align="center"><input type="radio" name="no_chapter_18_2_'.($i+1).'c" value="OK" '; if($dt_subchapter_18_2[5]=='OK') echo 'checked="checked"'; echo ' /> OK</td>';
	echo '<td width="35" align="center"><input type="radio" name="no_chapter_18_2_'.($i+1).'c" value="Not OK" '; if($dt_subchapter_18_2[5]=='Not OK') echo 'checked="checked"'; echo ' /> NOK</td>';
	echo '<td width="35" align="center"><input type="radio" name="no_chapter_18_2_'.($i+1).'d" value="OK" '; if($dt_subchapter_18_2[6]=='OK') echo 'checked="checked"'; echo ' /> OK</td>';
	echo '<td width="35" align="center"><input type="radio" name="no_chapter_18_2_'.($i+1).'d" value="Not OK" '; if($dt_subchapter_18_2[6]=='Not OK') echo 'checked="checked"'; echo ' /> NOK</td>';
	echo '<td width="35" align="center"><input type="radio" name="no_chapter_18_2_'.($i+1).'e" value="OK" '; if($dt_subchapter_18_2[7]=='OK') echo 'checked="checked"'; echo ' /> OK</td>';
	echo '<td width="35" align="center"><input type="radio" name="no_chapter_18_2_'.($i+1).'e" value="Not OK" '; if($dt_subchapter_18_2[7]=='Not OK') echo 'checked="checked"'; echo ' /> NOK</td>';
	echo '<td width="35" align="center"><input type="radio" name="no_chapter_18_2_'.($i+1).'f" value="OK" '; if($dt_subchapter_18_2[8]=='OK') echo 'checked="checked"'; echo ' /> OK</td>';
	echo '<td width="35" align="center"><input type="radio" name="no_chapter_18_2_'.($i+1).'f" value="Not OK" '; if($dt_subchapter_18_2[8]=='Not OK') echo 'checked="checked"'; echo ' /> NOK</td>';
	echo '<td><input type="text" name="no_chapter_18_2_'.($i+1).'g" value="'.$this->ifunction->ifnulls($dt_subchapter_18_2[9]).'" /></td></tr>';
}
?>
</table>

<?php $Qsubchapter = $this->db->query("SELECT `subno_chapter`, `content` FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `chapter`='18' AND `no_chapter`='18.3' ORDER BY `subno_chapter_order` ASC"); foreach($Qsubchapter->result_object() as $subchapter) $arr_subchapter_18_3[$subchapter->subno_chapter -1]=$subchapter ?>

<h3>Chapter 18.3: Video Test Call</h3>
<table class="border" cellpadding="0" cellspacing="0">
<tr class="header"><td width="60" rowspan="2">Item Test</td><td rowspan="2">MO<br />Number</td><td rowspan="2">MT<br />Number</td><td colspan="8">Test Call Result</td><td width="40" rowspan="2">Remark</td></tr>
<tr class="header"><td colspan="2">ATM</td><td colspan="2">Dual Stack (2E1)</td><td colspan="2">Dual Stack (1E1)</td><td colspan="2">Native IP</td></tr>
<?php
$arr_dt_183 = array('Mobile Originating', 'Mobile Terminating');
for($i=0; $i <= 1; $i++){
	$dt_subchapter_18_3 = explode('|', $arr_subchapter_18_3[$i]->content);
	echo '<tr><td>'.$arr_dt_183[$i].'</td>';
	echo '<td><input type="text" name="no_chapter_18_3_'.($i+1).'a" value="'.$this->ifunction->ifnulls($dt_subchapter_18_3[3]).'" /></td><td><input type="text" name="no_chapter_18_3_'.($i+1).'b" value="'.$this->ifunction->ifnulls($dt_subchapter_18_3[4]).'" /></td>';
	echo '<td width="35" align="center"><input type="radio" name="no_chapter_18_3_'.($i+1).'c" value="OK" '; if($dt_subchapter_18_3[5]=='OK') echo 'checked="checked"'; echo ' /> OK</td>';
	echo '<td width="35" align="center"><input type="radio" name="no_chapter_18_3_'.($i+1).'c" value="Not OK" '; if($dt_subchapter_18_3[5]=='Not OK') echo 'checked="checked"'; echo ' /> NOK</td>';
	echo '<td width="35" align="center"><input type="radio" name="no_chapter_18_3_'.($i+1).'d" value="OK" '; if($dt_subchapter_18_3[6]=='OK') echo 'checked="checked"'; echo ' /> OK</td>';
	echo '<td width="35" align="center"><input type="radio" name="no_chapter_18_3_'.($i+1).'d" value="Not OK" '; if($dt_subchapter_18_3[6]=='Not OK') echo 'checked="checked"'; echo ' /> NOK</td>';
	echo '<td width="35" align="center"><input type="radio" name="no_chapter_18_3_'.($i+1).'e" value="OK" '; if($dt_subchapter_18_3[7]=='OK') echo 'checked="checked"'; echo ' /> OK</td>';
	echo '<td width="35" align="center"><input type="radio" name="no_chapter_18_3_'.($i+1).'e" value="Not OK" '; if($dt_subchapter_18_3[7]=='Not OK') echo 'checked="checked"'; echo ' /> NOK</td>';
	echo '<td width="35" align="center"><input type="radio" name="no_chapter_18_3_'.($i+1).'f" value="OK" '; if($dt_subchapter_18_3[8]=='OK') echo 'checked="checked"'; echo ' /> OK</td>';
	echo '<td width="35" align="center"><input type="radio" name="no_chapter_18_3_'.($i+1).'f" value="Not OK" '; if($dt_subchapter_18_3[8]=='Not OK') echo 'checked="checked"'; echo ' /> NOK</td>';
	echo '<td><input type="text" name="no_chapter_18_3_'.($i+1).'g" value="'.$this->ifunction->ifnulls($dt_subchapter_18_3[9]).'" /></td></tr>';
}
?>
</table>

<?php $Qsubchapter = $this->db->query("SELECT `subno_chapter`, `content` FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `chapter`='18' AND `no_chapter`='18.4' ORDER BY `subno_chapter_order` ASC"); foreach($Qsubchapter->result_object() as $subchapter) $arr_subchapter_18_4[$subchapter->subno_chapter -1]=$subchapter ?>

<h3>Chapter 18.4: Packet Switch Test Call (R99)</h3>
<table class="border" cellpadding="0" cellspacing="0">
<tr class="header"><td width="60" rowspan="2">Item Test</td><td rowspan="2">MO<br />Number</td><td rowspan="2">Host<br />Address</td><td colspan="8">Test Call Result</td><td width="40" rowspan="2">Remark</td></tr>
<tr class="header"><td colspan="2">ATM</td><td colspan="2">Dual Stack (2E1)</td><td colspan="2">Dual Stack (1E1)</td><td colspan="2">Native IP</td></tr>
<?php
$arr_dt_184a = array('PING', 'WAP', 'HTTP', 'FTP DL', 'FTP UL', 'Streaming');
$arr_dt_184b = array('Delay', 'Throughput', 'Throughput', 'Throughput', 'Throughput', 'Throughput');

for($i=0; $i <= 5; $i++){
	$dt_subchapter_18_4 = explode('|', $arr_subchapter_18_4[$i]->content);
	echo '<tr><td>'.$arr_dt_184a[$i].'</td>';
	echo '<td><input type="text" name="no_chapter_18_4_'.($i+1).'a" value="'.$this->ifunction->ifnulls($dt_subchapter_18_4[3]).'" /></td><td><input type="text" name="no_chapter_18_4_'.($i+1).'b" value="'.$this->ifunction->ifnulls($dt_subchapter_18_4[4]).'" /></td>';
	echo '<td width="35" align="center"><input type="radio" name="no_chapter_18_4_'.($i+1).'c" value="OK" '; if($dt_subchapter_18_4[5]=='OK') echo 'checked="checked"'; echo ' /> OK</td>';
	echo '<td width="35" align="center"><input type="radio" name="no_chapter_18_4_'.($i+1).'c" value="Not OK" '; if($dt_subchapter_18_4[5]=='Not OK') echo 'checked="checked"'; echo ' /> NOK</td>';
	echo '<td width="35" align="center"><input type="radio" name="no_chapter_18_4_'.($i+1).'d" value="OK" '; if($dt_subchapter_18_4[6]=='OK') echo 'checked="checked"'; echo ' /> OK</td>';
	echo '<td width="35" align="center"><input type="radio" name="no_chapter_18_4_'.($i+1).'d" value="Not OK" '; if($dt_subchapter_18_4[6]=='Not OK') echo 'checked="checked"'; echo ' /> NOK</td>';
	echo '<td width="35" align="center"><input type="radio" name="no_chapter_18_4_'.($i+1).'e" value="OK" '; if($dt_subchapter_18_4[7]=='OK') echo 'checked="checked"'; echo ' /> OK</td>';
	echo '<td width="35" align="center"><input type="radio" name="no_chapter_18_4_'.($i+1).'e" value="Not OK" '; if($dt_subchapter_18_4[7]=='Not OK') echo 'checked="checked"'; echo ' /> NOK</td>';
	echo '<td width="35" align="center"><input type="radio" name="no_chapter_18_4_'.($i+1).'f" value="OK" '; if($dt_subchapter_18_4[8]=='OK') echo 'checked="checked"'; echo ' /> OK</td>';
	echo '<td width="35" align="center"><input type="radio" name="no_chapter_18_4_'.($i+1).'f" value="Not OK" '; if($dt_subchapter_18_4[8]=='Not OK') echo 'checked="checked"'; echo ' /> NOK</td>';
	echo '<td><input type="text" name="no_chapter_18_4_'.($i+1).'g" value="'.$this->ifunction->ifnulls($dt_subchapter_18_4[9]).'" /></td></tr>';
	
	echo '<tr><td colspan="3" align="right">'.$arr_dt_184b[$i].'</td><td colspan="2"></td><td colspan="2"></td><td colspan="2"></td><td colspan="2"></td><td></td></tr>';
}
?>
</table>

<?php $Qsubchapter = $this->db->query("SELECT `subno_chapter`, `content` FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `chapter`='18' AND `no_chapter`='18.5' ORDER BY `subno_chapter_order` ASC"); foreach($Qsubchapter->result_object() as $subchapter) $arr_subchapter_18_5[$subchapter->subno_chapter -1]=$subchapter;
$dt_subchapter_18_5 = explode('|', $arr_subchapter_18_5[0]->content);
$dt_subchapter_18_5c = explode('|', $arr_subchapter_18_5[13]->content) ?>

<h3 style="margin:0;padding:0">Chapter 18.5: HSPA Test Call</h3>
<table class="border" cellpadding="0" cellspacing="0">
<tr><td>Test scenario</td>
<td align="center"><input type="radio" name="no_chapter_18_5_1" value="3.6 Mbps" <?php if($dt_subchapter_18_5[3]=='3.6 Mbps') echo 'checked="checked"'; ?> /> 3.6 Mbps</td>
<td align="center"><input type="radio" name="no_chapter_18_5_1" value="7.2 Mbps" <?php if($dt_subchapter_18_5[3]=='7.2 Mbps') echo 'checked="checked"'; ?> /> 7.2 Mbps</td>
<td align="center"><input type="radio" name="no_chapter_18_5_1" value="14.4 Mbps" <?php if($dt_subchapter_18_5[3]=='14.4 Mbps') echo 'checked="checked"'; ?> /> 14.4 Mbps</td></tr></table>
<p style="font-size:11px"><i>Note: Please tick the appropriate test scenario</i></p>

<table class="border" cellpadding="0" cellspacing="0">
<tr class="header"><td width="60" rowspan="2">Item Test</td><td rowspan="2">MO<br />Number</td><td rowspan="2">Host<br />Address</td><td colspan="8">Test Call Result</td><td width="40" rowspan="2">Remark</td></tr>
<tr class="header"><td colspan="2">ATM</td><td colspan="2">Dual Stack (2E1)</td><td colspan="2">Dual Stack (1E1)</td><td colspan="2">Native IP</td></tr>
<?php
$arr_dt_185a1 = array(1=> 'PING', 'WAP', 'HTTP');
$arr_dt_185a2 = array(1=> 'Delay', 'Throughput', 'Throughput');

for($i=1; $i <= 3; $i++){
	$dt_subchapter_18_5a = explode('|', $arr_subchapter_18_5[$i]->content);
	echo '<tr><td>'.$arr_dt_185a1[$i].'</td>';
	echo '<td><input type="text" name="no_chapter_18_5_'.($i+1).'a" value="'.$this->ifunction->ifnulls($dt_subchapter_18_5a[3]).'" /></td><td><input type="text" name="no_chapter_18_5_'.($i+1).'b" value="'.$this->ifunction->ifnulls($dt_subchapter_18_5a[4]).'" /></td>';
	echo '<td width="35" align="center"><input type="radio" name="no_chapter_18_5_'.($i+1).'c" value="OK" '; if($dt_subchapter_18_5a[5]=='OK') echo 'checked="checked"'; echo ' /> OK</td>';
	echo '<td width="35" align="center"><input type="radio" name="no_chapter_18_5_'.($i+1).'c" value="Not OK" '; if($dt_subchapter_18_5a[5]=='Not OK') echo 'checked="checked"'; echo ' /> NOK</td>';
	echo '<td width="35" align="center"><input type="radio" name="no_chapter_18_5_'.($i+1).'d" value="OK" '; if($dt_subchapter_18_5a[6]=='OK') echo 'checked="checked"'; echo ' /> OK</td>';
	echo '<td width="35" align="center"><input type="radio" name="no_chapter_18_5_'.($i+1).'d" value="Not OK" '; if($dt_subchapter_18_5a[6]=='Not OK') echo 'checked="checked"'; echo ' /> NOK</td>';
	echo '<td width="35" align="center"><input type="radio" name="no_chapter_18_5_'.($i+1).'e" value="OK" '; if($dt_subchapter_18_5a[7]=='OK') echo 'checked="checked"'; echo ' /> OK</td>';
	echo '<td width="35" align="center"><input type="radio" name="no_chapter_18_5_'.($i+1).'e" value="Not OK" '; if($dt_subchapter_18_5a[7]=='Not OK') echo 'checked="checked"'; echo ' /> NOK</td>';
	echo '<td width="35" align="center"><input type="radio" name="no_chapter_18_5_'.($i+1).'f" value="OK" '; if($dt_subchapter_18_5a[8]=='OK') echo 'checked="checked"'; echo ' /> OK</td>';
	echo '<td width="35" align="center"><input type="radio" name="no_chapter_18_5_'.($i+1).'f" value="Not OK" '; if($dt_subchapter_18_5a[8]=='Not OK') echo 'checked="checked"'; echo ' /> NOK</td>';
	echo '<td><input type="text" name="no_chapter_18_5_'.($i+1).'g" value="'.$this->ifunction->ifnulls($dt_subchapter_18_5a[9]).'" /></td></tr>';
	
	echo '<tr><td colspan="3" align="right">'.$arr_dt_185a2[$i].'</td><td colspan="2"></td><td colspan="2"></td><td colspan="2"></td><td colspan="2"></td><td></td></tr>';
}
?>
</table>

<hr />

<table class="border" cellpadding="0" cellspacing="0">
<?php

$arr_dt_185b1 = array(4=> 'FTP DL', 'FTP UL', 'Streaming');
$arr_dt_185b2 = array(4=> 'Throughput', 'Throughput', 'Throughput');

for($i=4; $i <= 6; $i++){
	$dt_subchapter_18_5b = explode('|', $arr_subchapter_18_5[$i]->content);
	echo '<tr><td width="60">'.$arr_dt_185b1[$i].'</td>';
	echo '<td><input type="text" name="no_chapter_18_5_'.($i+1).'a" value="'.$this->ifunction->ifnulls($dt_subchapter_18_5b[3]).'" /></td><td><input type="text" name="no_chapter_18_5_'.($i+1).'b" value="'.$this->ifunction->ifnulls($dt_subchapter_18_5b[4]).'" /></td>';
	echo '<td width="35" align="center"><input type="radio" name="no_chapter_18_5_'.($i+1).'c" value="OK" '; if($dt_subchapter_18_5b[5]=='OK') echo 'checked="checked"'; echo ' /> OK</td>';
	echo '<td width="35" align="center"><input type="radio" name="no_chapter_18_5_'.($i+1).'c" value="Not OK" '; if($dt_subchapter_18_5b[5]=='Not OK') echo 'checked="checked"'; echo ' /> NOK</td>';
	echo '<td width="35" align="center"><input type="radio" name="no_chapter_18_5_'.($i+1).'d" value="OK" '; if($dt_subchapter_18_5b[6]=='OK') echo 'checked="checked"'; echo ' /> OK</td>';
	echo '<td width="35" align="center"><input type="radio" name="no_chapter_18_5_'.($i+1).'d" value="Not OK" '; if($dt_subchapter_18_5b[6]=='Not OK') echo 'checked="checked"'; echo ' /> NOK</td>';
	echo '<td width="35" align="center"><input type="radio" name="no_chapter_18_5_'.($i+1).'e" value="OK" '; if($dt_subchapter_18_5b[7]=='OK') echo 'checked="checked"'; echo ' /> OK</td>';
	echo '<td width="35" align="center"><input type="radio" name="no_chapter_18_5_'.($i+1).'e" value="Not OK" '; if($dt_subchapter_18_5b[7]=='Not OK') echo 'checked="checked"'; echo ' /> NOK</td>';
	echo '<td width="35" align="center"><input type="radio" name="no_chapter_18_5_'.($i+1).'f" value="OK" '; if($dt_subchapter_18_5b[8]=='OK') echo 'checked="checked"'; echo ' /> OK</td>';
	echo '<td width="35" align="center"><input type="radio" name="no_chapter_18_5_'.($i+1).'f" value="Not OK" '; if($dt_subchapter_18_5b[8]=='Not OK') echo 'checked="checked"'; echo ' /> NOK</td>';
	echo '<td width="40"><input type="text" name="no_chapter_18_5_'.($i+1).'g" value="'.$this->ifunction->ifnulls($dt_subchapter_18_5b[9]).'" /></td></tr>';
	
	echo '<tr><td colspan="3" align="right">'.$arr_dt_185b2[$i].'</td><td colspan="2"></td><td colspan="2"></td><td colspan="2"></td><td colspan="2"></td><td></td></tr>';
}
?>
</table>

<hr />

<center>
    <input type="button" class="button" name="prev" value="Prev" onclick="validasi(19, <?php echo $dx ?>)" />
    &emsp; <input type="reset" class="reset" value="Reset to Default"/> &emsp;
    <input type="button" class="button" name="next" value="Next" onclick="validasi(21, <?php echo $dx ?>)" />
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
	
	for($i=1; $i<=2; $i++)
	{
		$col_a = 'no_chapter_18_2_'.$i.'a';
		$col_b = 'no_chapter_18_2_'.$i.'b';
		$col_c = 'no_chapter_18_2_'.$i.'c';
		$col_d = 'no_chapter_18_2_'.$i.'d';
		$col_e = 'no_chapter_18_2_'.$i.'e';
		$col_f = 'no_chapter_18_2_'.$i.'f';
		$col_g = 'no_chapter_18_2_'.$i.'g';
		
		$$col_a = kosong($$col_a);
		$$col_b = kosong($$col_b);
		$$col_c = kosong($$col_c);
		$$col_d = kosong($$col_d);
		$$col_e = kosong($$col_e);
		$$col_f = kosong($$col_f);
		$$col_g = kosong($$col_g);
		
		if(str_replace('null', 'null', $$col_a.$$col_b.$$col_c.$$col_d.$$col_e.$$col_f.$$col_g)){
			$quest[] = '18@18.2|No|'.$i.'|'.$$col_a.'|'.$$col_b.'|'.$$col_c.'|'.$$col_d.'|'.$$col_e.'|'.$$col_f.'|'.$$col_g;
		}
	}
	//----------------------------------------------------
	for($i=1; $i<=2; $i++)
	{
		$col_a = 'no_chapter_18_3_'.$i.'a';
		$col_b = 'no_chapter_18_3_'.$i.'b';
		$col_c = 'no_chapter_18_3_'.$i.'c';
		$col_d = 'no_chapter_18_3_'.$i.'d';
		$col_e = 'no_chapter_18_3_'.$i.'e';
		$col_f = 'no_chapter_18_3_'.$i.'f';
		$col_g = 'no_chapter_18_3_'.$i.'g';
		
		$$col_a = kosong($$col_a);
		$$col_b = kosong($$col_b);
		$$col_c = kosong($$col_c);
		$$col_d = kosong($$col_d);
		$$col_e = kosong($$col_e);
		$$col_f = kosong($$col_f);
		$$col_g = kosong($$col_g);
		
		if(str_replace('null', 'null', $$col_a.$$col_b.$$col_c.$$col_d.$$col_e.$$col_f.$$col_g)){
			$quest[] = '18@18.3|No|'.$i.'|'.$$col_a.'|'.$$col_b.'|'.$$col_c.'|'.$$col_d.'|'.$$col_e.'|'.$$col_f.'|'.$$col_g;
		}
	}
	//----------------------------------------------------
	for($i=1; $i<=6; $i++)
	{
		$col_a = 'no_chapter_18_4_'.$i.'a';
		$col_b = 'no_chapter_18_4_'.$i.'b';
		$col_c = 'no_chapter_18_4_'.$i.'c';
		$col_d = 'no_chapter_18_4_'.$i.'d';
		$col_e = 'no_chapter_18_4_'.$i.'e';
		$col_f = 'no_chapter_18_4_'.$i.'f';
		$col_g = 'no_chapter_18_4_'.$i.'g';
		
		$$col_a = kosong($$col_a);
		$$col_b = kosong($$col_b);
		$$col_c = kosong($$col_c);
		$$col_d = kosong($$col_d);
		$$col_e = kosong($$col_e);
		$$col_f = kosong($$col_f);
		$$col_g = kosong($$col_g);
		
		if(str_replace('null', 'null', $$col_a.$$col_b.$$col_c.$$col_d.$$col_e.$$col_f.$$col_g)){
			$quest[] = '18@18.4|No|'.$i.'|'.$$col_a.'|'.$$col_b.'|'.$$col_c.'|'.$$col_d.'|'.$$col_e.'|'.$$col_f.'|'.$$col_g;
		}
	}
	//----------------------------------------------------
	if(isset($no_chapter_18_5_1)) $quest[] = '18@18.5|No|1|'.$no_chapter_18_5_1; else{ $quest[] = '18@18.5|No|1|null'; }
	//----------------------------------------------------
	for($i=2; $i<=7; $i++)
	{
		$col_a = 'no_chapter_18_5_'.$i.'a';
		$col_b = 'no_chapter_18_5_'.$i.'b';
		$col_c = 'no_chapter_18_5_'.$i.'c';
		$col_d = 'no_chapter_18_5_'.$i.'d';
		$col_e = 'no_chapter_18_5_'.$i.'e';
		$col_f = 'no_chapter_18_5_'.$i.'f';
		$col_g = 'no_chapter_18_5_'.$i.'g';
		
		$$col_a = kosong($$col_a);
		$$col_b = kosong($$col_b);
		$$col_c = kosong($$col_c);
		$$col_d = kosong($$col_d);
		$$col_e = kosong($$col_e);
		$$col_f = kosong($$col_f);
		$$col_g = kosong($$col_g);
		
		if(str_replace('null', 'null', $$col_a.$$col_b.$$col_c.$$col_d.$$col_e.$$col_f.$$col_g)){
			$quest[] = '18@18.5|No|'.$i.'|'.$$col_a.'|'.$$col_b.'|'.$$col_c.'|'.$$col_d.'|'.$$col_e.'|'.$$col_f.'|'.$$col_g;
		}
	}
}

include 'paging.php';
?>

</body>
</html>