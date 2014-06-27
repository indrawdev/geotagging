<?php session_start(); if(empty($_SESSION['isat']['log'])) exit('<script>alert("Session expired, please re-login!");self.close();</script>');if ( ! defined('BASEPATH')) exit('No direct script access allowed'); $Qtit = $this->db->query("SELECT `title` FROM `it_atp` WHERE `atp_id`='$dx'"); $tit = $Qtit->result_object(); $title = $tit[0]->title; ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xml:lang="en" xmlns="http://www.w3.org/1999/xhtml" lang="en">
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
<title>Preload ATP Ericsson 3G (Page 21) - <?php echo $title ?></title>
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
<h1>Page 21</h1><br /><br />

<form name="preload3G" method="post" action="">


<?php $Qsubchapter = $this->db->query("SELECT `subno_chapter`, `content` FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `chapter`='18' AND `no_chapter`='18.6' ORDER BY `subno_chapter_order` ASC"); foreach($Qsubchapter->result_object() as $subchapter) $arr_subchapter_18_6[$subchapter->subno_chapter -1]=$subchapter;
$dt_subchapter_18_6 = explode('|', $arr_subchapter_18_6[0]->content) ?>

<h3 style="margin:0;padding:0">Chapter 18.6 : Test Actual and PMR Capture Result</h3>
<table class="border" cellpadding="0" cellspacing="0">
<tr class="header"><td>Item Test</td><td>Throughput</td><td>Log Throughput (kbps)</td><td>UE code</td></tr>
<tr><td>HSDPA Throughput</td><td><input type="text" name="no_chapter_18_6_1a" value="<?php echo $this->ifunction->ifnulls($dt_subchapter_18_6[3]) ?>" /></td><td><input type="text" name="no_chapter_18_6_1b" value="<?php echo $this->ifunction->ifnulls($dt_subchapter_18_6[4]) ?>" /></td><td><input type="text" name="no_chapter_18_6_1c" value="<?php echo $this->ifunction->ifnulls($dt_subchapter_18_6[5]) ?>" /></td></tr></table>
<p style="font-size:11px"><i>Note: The value collect from test actual and PMR after download during ATP and reach HSDPA throughput. Capture data must be attach.</i></p>

<?php $Qsubchapter = $this->db->query("SELECT `subno_chapter`, `content` FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `chapter`='18' AND `no_chapter`='18.7' ORDER BY `subno_chapter_order` ASC"); foreach($Qsubchapter->result_object() as $subchapter) $arr_subchapter_18_7[$subchapter->subno_chapter -1]=$subchapter ?>

<h3 style="margin:0;padding:0">Chapter 18.7: SMS Test Call</h3>
<table class="border" cellpadding="0" cellspacing="0">
<tr class="header"><td width="60" rowspan="2">Item Test</td><td rowspan="2">MO<br />Number</td><td rowspan="2">MT<br />Number</td><td colspan="8">Test Call Result</td><td width="40" rowspan="2">Remark</td></tr>
<tr class="header"><td colspan="2">ATM</td><td colspan="2">Dual Stack (2E1)</td><td colspan="2">Dual Stack (1E1)</td><td colspan="2">Native IP</td></tr>
<?php
$arr_dt_187 = array('Mobile Originating', 'Mobile Terminating');
for($i=0; $i <= 1; $i++){
	$dt_subchapter_18_7 = explode('|', $arr_subchapter_18_7[$i]->content);
	echo '<tr><td>'.$arr_dt_187[$i].'</td>';
	echo '<td><input type="text" name="no_chapter_18_7_'.($i+1).'a" value="'.$this->ifunction->ifnulls($dt_subchapter_18_7[3]).'" /></td><td><input type="text" name="no_chapter_18_7_'.($i+1).'b" value="'.$this->ifunction->ifnulls($dt_subchapter_18_7[4]).'" /></td>';
	echo '<td width="35" align="center"><input type="radio" name="no_chapter_18_7_'.($i+1).'c" value="OK" '; if($dt_subchapter_18_7[5]=='OK') echo 'checked="checked"'; echo ' /> OK</td>';
	echo '<td width="35" align="center"><input type="radio" name="no_chapter_18_7_'.($i+1).'c" value="Not OK" '; if($dt_subchapter_18_7[5]=='Not OK') echo 'checked="checked"'; echo ' /> NOK</td>';
	echo '<td width="35" align="center"><input type="radio" name="no_chapter_18_7_'.($i+1).'d" value="OK" '; if($dt_subchapter_18_7[6]=='OK') echo 'checked="checked"'; echo ' /> OK</td>';
	echo '<td width="35" align="center"><input type="radio" name="no_chapter_18_7_'.($i+1).'d" value="Not OK" '; if($dt_subchapter_18_7[6]=='Not OK') echo 'checked="checked"'; echo ' /> NOK</td>';
	echo '<td width="35" align="center"><input type="radio" name="no_chapter_18_7_'.($i+1).'e" value="OK" '; if($dt_subchapter_18_7[7]=='OK') echo 'checked="checked"'; echo ' /> OK</td>';
	echo '<td width="35" align="center"><input type="radio" name="no_chapter_18_7_'.($i+1).'e" value="Not OK" '; if($dt_subchapter_18_7[7]=='Not OK') echo 'checked="checked"'; echo ' /> NOK</td>';
	echo '<td width="35" align="center"><input type="radio" name="no_chapter_18_7_'.($i+1).'f" value="OK" '; if($dt_subchapter_18_7[8]=='OK') echo 'checked="checked"'; echo ' /> OK</td>';
	echo '<td width="35" align="center"><input type="radio" name="no_chapter_18_7_'.($i+1).'f" value="Not OK" '; if($dt_subchapter_18_7[8]=='Not OK') echo 'checked="checked"'; echo ' /> NOK</td>';
	echo '<td><input type="text" name="no_chapter_18_7_'.($i+1).'g" value="'.$this->ifunction->ifnulls($dt_subchapter_18_7[9]).'" /></td></tr>';
}
?>
</table>

<hr />

<?php $Qsubchapter = $this->db->query("SELECT `subno_chapter`, `content` FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `chapter`='18' AND `no_chapter`='18.8' ORDER BY `subno_chapter_order` ASC"); foreach($Qsubchapter->result_object() as $subchapter) $arr_subchapter_18_8[$subchapter->subno_chapter -1]=$subchapter ?>

<h3>Chapter 18.8: MMS Test Call</h3>
<table class="border" cellpadding="0" cellspacing="0">
<tr class="header"><td width="60" rowspan="2">Item Test</td><td rowspan="2">MO<br />Number</td><td rowspan="2">MT<br />Number</td><td colspan="8">Test Call Result</td><td width="40" rowspan="2">Remark</td></tr>
<tr class="header"><td colspan="2">ATM</td><td colspan="2">Dual Stack (2E1)</td><td colspan="2">Dual Stack (1E1)</td><td colspan="2">Native IP</td></tr>
<?php
$arr_dt_188 = array('Mobile Originating', 'Mobile Terminating');
for($i=0; $i <= 1; $i++){
	$dt_subchapter_18_8 = explode('|', $arr_subchapter_18_8[$i]->content);
	echo '<tr><td>'.$arr_dt_188[$i].'</td>';
	echo '<td><input type="text" name="no_chapter_18_8_'.($i+1).'a" value="'.$this->ifunction->ifnulls($dt_subchapter_18_8[3]).'" /></td><td><input type="text" name="no_chapter_18_8_'.($i+1).'b" value="'.$this->ifunction->ifnulls($dt_subchapter_18_8[4]).'" /></td>';
	echo '<td width="35" align="center"><input type="radio" name="no_chapter_18_8_'.($i+1).'c" value="OK" '; if($dt_subchapter_18_8[5]=='OK') echo 'checked="checked"'; echo ' /> OK</td>';
	echo '<td width="35" align="center"><input type="radio" name="no_chapter_18_8_'.($i+1).'c" value="Not OK" '; if($dt_subchapter_18_8[5]=='Not OK') echo 'checked="checked"'; echo ' /> NOK</td>';
	echo '<td width="35" align="center"><input type="radio" name="no_chapter_18_8_'.($i+1).'d" value="OK" '; if($dt_subchapter_18_8[6]=='OK') echo 'checked="checked"'; echo ' /> OK</td>';
	echo '<td width="35" align="center"><input type="radio" name="no_chapter_18_8_'.($i+1).'d" value="Not OK" '; if($dt_subchapter_18_8[6]=='Not OK') echo 'checked="checked"'; echo ' /> NOK</td>';
	echo '<td width="35" align="center"><input type="radio" name="no_chapter_18_8_'.($i+1).'e" value="OK" '; if($dt_subchapter_18_8[7]=='OK') echo 'checked="checked"'; echo ' /> OK</td>';
	echo '<td width="35" align="center"><input type="radio" name="no_chapter_18_8_'.($i+1).'e" value="Not OK" '; if($dt_subchapter_18_8[7]=='Not OK') echo 'checked="checked"'; echo ' /> NOK</td>';
	echo '<td width="35" align="center"><input type="radio" name="no_chapter_18_8_'.($i+1).'f" value="OK" '; if($dt_subchapter_18_8[8]=='OK') echo 'checked="checked"'; echo ' /> OK</td>';
	echo '<td width="35" align="center"><input type="radio" name="no_chapter_18_8_'.($i+1).'f" value="Not OK" '; if($dt_subchapter_18_8[8]=='Not OK') echo 'checked="checked"'; echo ' /> NOK</td>';
	echo '<td><input type="text" name="no_chapter_18_8_'.($i+1).'g" value="'.$this->ifunction->ifnulls($dt_subchapter_18_8[9]).'" /></td></tr>';
}
?>
</table>

<?php $Qsubchapter = $this->db->query("SELECT `subno_chapter`, `content` FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `chapter`='18' AND `no_chapter`='18.9' ORDER BY `subno_chapter_order` ASC"); foreach($Qsubchapter->result_object() as $subchapter) $arr_subchapter_18_9[$subchapter->subno_chapter -1]=$subchapter ?>

<h3>Chapter 18.9: Incoming & Outgoing Handover Test (SOFTER / SOFT HANDOVER)</h3>
<table class="border" cellpadding="0" cellspacing="0">
<tr class="header" style="font-size:10px"><td width="50" rowspan="2">Item Test</td><td colspan="2">Ori</td><td colspan="2">Dest</td><td colspan="8">Test Call Result</td><td width="40" rowspan="2">Remark</td></tr>
<tr class="header" style="font-size:10px"><td style="font-size:9px" width="15">RNC<br />Id</td><td style="font-size:9px" width="15">Cell<br />Id</td><td style="font-size:9px" width="15">RNC<br />Id</td><td style="font-size:9px" width="15">Cell<br />Id</td><td colspan="2" width="60">ATM</td><td colspan="2" width="60">Dual Stack<br />(2E1)</td><td colspan="2" width="60">Dual Stack<br />(1E1)</td><td colspan="2" width="60">Native IP</td></tr>

<?php
$arr_dt_189a = array('In HO', 'Out HO', 'In HO', 'Out HO');
for($i=0; $i <= 3; $i++){
	$dt_subchapter_18_9a = explode('|', $arr_subchapter_18_9[$i]->content);
	
	if($i==0) echo '<tr><td colspan="14"><b>SECTOR 1</b></td></tr>'; elseif ($i==2) echo '<tr><td colspan="14"><b>SECTOR 2</b></td></tr>';
	
	echo '<tr><td width="50">'.$arr_dt_189a[$i].'</td>';
	echo '<td width="15"><input type="text" name="no_chapter_18_9_'.($i+1).'a" value="'.$this->ifunction->ifnulls($dt_subchapter_18_9a[3]).'" /></td><td width="15"><input type="text" name="no_chapter_18_9_'.($i+1).'b" value="'.$this->ifunction->ifnulls($dt_subchapter_18_9a[4]).'" /></td>';
	echo '<td width="15"><input type="text" name="no_chapter_18_9_'.($i+1).'c" value="'.$this->ifunction->ifnulls($dt_subchapter_18_9a[5]).'" /></td><td width="15"><input type="text" name="no_chapter_18_9_'.($i+1).'d" value="'.$this->ifunction->ifnulls($dt_subchapter_18_9a[6]).'" /></td>';
	echo '<td width="30" align="center"><input type="radio" name="no_chapter_18_9_'.($i+1).'e" value="OK" '; if($dt_subchapter_18_9a[7]=='OK') echo 'checked="checked"'; echo ' /> OK</td>';
	echo '<td width="30" align="center"><input type="radio" name="no_chapter_18_9_'.($i+1).'e" value="Not OK" '; if($dt_subchapter_18_9a[7]=='Not OK') echo 'checked="checked"'; echo ' /> NOK</td>';
	echo '<td width="30" align="center"><input type="radio" name="no_chapter_18_9_'.($i+1).'f" value="OK" '; if($dt_subchapter_18_9a[8]=='OK') echo 'checked="checked"'; echo ' /> OK</td>';
	echo '<td width="30" align="center"><input type="radio" name="no_chapter_18_9_'.($i+1).'f" value="Not OK" '; if($dt_subchapter_18_9a[8]=='Not OK') echo 'checked="checked"'; echo ' /> NOK</td>';
	echo '<td width="30" align="center"><input type="radio" name="no_chapter_18_9_'.($i+1).'g" value="OK" '; if($dt_subchapter_18_9a[9]=='OK') echo 'checked="checked"'; echo ' /> OK</td>';
	echo '<td width="30" align="center"><input type="radio" name="no_chapter_18_9_'.($i+1).'g" value="Not OK" '; if($dt_subchapter_18_9a[9]=='Not OK') echo 'checked="checked"'; echo ' /> NOK</td>';
	echo '<td width="30" align="center"><input type="radio" name="no_chapter_18_9_'.($i+1).'h" value="OK" '; if($dt_subchapter_18_9a[10]=='OK') echo 'checked="checked"'; echo ' /> OK</td>';
	echo '<td width="30" align="center"><input type="radio" name="no_chapter_18_9_'.($i+1).'h" value="Not OK" '; if($dt_subchapter_18_9a[10]=='Not OK') echo 'checked="checked"'; echo ' /> NOK</td>';
	echo '<td width="40"><input type="text" name="no_chapter_18_9_'.($i+1).'i" value="'.$this->ifunction->ifnulls($dt_subchapter_18_9a[11]).'" /></td></tr>';
}
?>
</table>

<hr />

<table class="border" cellpadding="0" cellspacing="0">
<?php
$arr_dt_189b = array(4=> 'In HO', 'Out HO', 'In HO', 'Out HO', 'In HO', 'Out HO', 'In HO', 'Out HO');
for($i=4; $i <= 11; $i++){
	$dt_subchapter_18_9b = explode('|', $arr_subchapter_18_9[$i]->content);
	
	if($i==4) echo '<tr><td colspan="14"><b>SECTOR 3</b></td></tr>'; elseif ($i==6) echo '<tr><td colspan="14"><b>SECTOR 4</b></td></tr>';  elseif ($i==8) echo '<tr><td colspan="14"><b>SECTOR 5</b></td></tr>';  elseif ($i==10) echo '<tr><td colspan="14"><b>SECTOR 6</b></td></tr>';
	
	echo '<tr><td width="50">'.$arr_dt_189b[$i].'</td>';
	echo '<td width="15"><input type="text" name="no_chapter_18_9_'.($i+1).'a" value="'.$this->ifunction->ifnulls($dt_subchapter_18_9b[3]).'" /></td><td width="15"><input type="text" name="no_chapter_18_9_'.($i+1).'b" value="'.$this->ifunction->ifnulls($dt_subchapter_18_9b[4]).'" /></td>';
	echo '<td width="15"><input type="text" name="no_chapter_18_9_'.($i+1).'c" value="'.$this->ifunction->ifnulls($dt_subchapter_18_9b[5]).'" /></td><td width="15"><input type="text" name="no_chapter_18_9_'.($i+1).'d" value="'.$this->ifunction->ifnulls($dt_subchapter_18_9b[6]).'" /></td>';
	echo '<td width="30" align="center"><input type="radio" name="no_chapter_18_9_'.($i+1).'e" value="OK" '; if($dt_subchapter_18_9b[7]=='OK') echo 'checked="checked"'; echo ' /> OK</td>';
	echo '<td width="30" align="center"><input type="radio" name="no_chapter_18_9_'.($i+1).'e" value="Not OK" '; if($dt_subchapter_18_9b[7]=='Not OK') echo 'checked="checked"'; echo ' /> NOK</td>';
	echo '<td width="30" align="center"><input type="radio" name="no_chapter_18_9_'.($i+1).'f" value="OK" '; if($dt_subchapter_18_9b[8]=='OK') echo 'checked="checked"'; echo ' /> OK</td>';
	echo '<td width="30" align="center"><input type="radio" name="no_chapter_18_9_'.($i+1).'f" value="Not OK" '; if($dt_subchapter_18_9b[8]=='Not OK') echo 'checked="checked"'; echo ' /> NOK</td>';
	echo '<td width="30" align="center"><input type="radio" name="no_chapter_18_9_'.($i+1).'g" value="OK" '; if($dt_subchapter_18_9b[9]=='OK') echo 'checked="checked"'; echo ' /> OK</td>';
	echo '<td width="30" align="center"><input type="radio" name="no_chapter_18_9_'.($i+1).'g" value="Not OK" '; if($dt_subchapter_18_9b[9]=='Not OK') echo 'checked="checked"'; echo ' /> NOK</td>';
	echo '<td width="30" align="center"><input type="radio" name="no_chapter_18_9_'.($i+1).'h" value="OK" '; if($dt_subchapter_18_9b[10]=='OK') echo 'checked="checked"'; echo ' /> OK</td>';
	echo '<td width="30" align="center"><input type="radio" name="no_chapter_18_9_'.($i+1).'h" value="Not OK" '; if($dt_subchapter_18_9b[10]=='Not OK') echo 'checked="checked"'; echo ' /> NOK</td>';
	echo '<td width="40"><input type="text" name="no_chapter_18_9_'.($i+1).'i" value="'.$this->ifunction->ifnulls($dt_subchapter_18_9b[11]).'" /></td></tr>';
}
?>
</table>

<hr />

<center>
    <input type="button" class="button" name="prev" value="Prev" onclick="validasi(20, <?php echo $dx ?>)" />
    &emsp; <input type="reset" class="reset" value="Reset to Default"/> &emsp;
    <input type="button" class="button" name="next" value="Next" onclick="validasi(22, <?php echo $dx ?>)" />
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
	
	$no_chapter_18_6_1a = kosong($no_chapter_18_6_1a);
	$no_chapter_18_6_1b = kosong($no_chapter_18_6_1b);
	$no_chapter_18_6_1c = kosong($no_chapter_18_6_1c);
	
	if(str_replace('null', 'null', $no_chapter_18_6_1a.$no_chapter_18_6_1b.$no_chapter_18_6_1c)){
		$quest[] = '18@18.6|No|1|'.$no_chapter_18_6_1b.'|'.$no_chapter_18_6_1b.'|'.$no_chapter_18_6_1a;
	}
	else{
		$user_id = $hasil[0]->user_id;
		$this->db->query("DELETE FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `user_id`='$user_id' AND `chapter`='18' AND `no_chapter`='18.6' AND `subno_chapter`='1'");
	}
	//----------------------------------------------------
	for($i=1; $i<=2; $i++)
	{
		$col_a = 'no_chapter_18_7_'.$i.'a';
		$col_b = 'no_chapter_18_7_'.$i.'b';
		$col_c = 'no_chapter_18_7_'.$i.'c';
		$col_d = 'no_chapter_18_7_'.$i.'d';
		$col_e = 'no_chapter_18_7_'.$i.'e';
		$col_f = 'no_chapter_18_7_'.$i.'f';
		$col_g = 'no_chapter_18_7_'.$i.'g';
		
		$$col_a = kosong($$col_a);
		$$col_b = kosong($$col_b);
		$$col_c = kosong($$col_c);
		$$col_d = kosong($$col_d);
		$$col_e = kosong($$col_e);
		$$col_f = kosong($$col_f);
		$$col_g = kosong($$col_g);
		
		if(str_replace('null', 'null', $$col_a.$$col_b.$$col_c.$$col_d.$$col_e.$$col_f.$$col_g)){
			$quest[] = '18@18.7|No|'.$i.'|'.$$col_a.'|'.$$col_b.'|'.$$col_c.'|'.$$col_d.'|'.$$col_e.'|'.$$col_f.'|'.$$col_g;
		}
	}
	//----------------------------------------------------
	for($i=1; $i<=2; $i++)
	{
		$col_a = 'no_chapter_18_8_'.$i.'a';
		$col_b = 'no_chapter_18_8_'.$i.'b';
		$col_c = 'no_chapter_18_8_'.$i.'c';
		$col_d = 'no_chapter_18_8_'.$i.'d';
		$col_e = 'no_chapter_18_8_'.$i.'e';
		$col_f = 'no_chapter_18_8_'.$i.'f';
		$col_g = 'no_chapter_18_8_'.$i.'g';
		
		$$col_a = kosong($$col_a);
		$$col_b = kosong($$col_b);
		$$col_c = kosong($$col_c);
		$$col_d = kosong($$col_d);
		$$col_e = kosong($$col_e);
		$$col_f = kosong($$col_f);
		$$col_g = kosong($$col_g);
		
		if(str_replace('null', 'null', $$col_a.$$col_b.$$col_c.$$col_d.$$col_e.$$col_f.$$col_g)){
			$quest[] = '18@18.8|No|'.$i.'|'.$$col_a.'|'.$$col_b.'|'.$$col_c.'|'.$$col_d.'|'.$$col_e.'|'.$$col_f.'|'.$$col_g;
		}
	}
	//----------------------------------------------------
	for($i=1; $i<=12; $i++)
	{
		$col_a = 'no_chapter_18_9_'.$i.'a';
		$col_b = 'no_chapter_18_9_'.$i.'b';
		$col_c = 'no_chapter_18_9_'.$i.'c';
		$col_d = 'no_chapter_18_9_'.$i.'d';
		$col_e = 'no_chapter_18_9_'.$i.'e';
		$col_f = 'no_chapter_18_9_'.$i.'f';
		$col_g = 'no_chapter_18_9_'.$i.'g';
		$col_h = 'no_chapter_18_9_'.$i.'h';
		$col_i = 'no_chapter_18_9_'.$i.'i';
		
		$$col_a = kosong($$col_a);
		$$col_b = kosong($$col_b);
		$$col_c = kosong($$col_c);
		$$col_d = kosong($$col_d);
		$$col_e = kosong($$col_e);
		$$col_f = kosong($$col_f);
		$$col_g = kosong($$col_g);
		$$col_h = kosong($$col_h);
		$$col_i = kosong($$col_i);
		
		if(str_replace('null', 'null', $$col_a.$$col_b.$$col_c.$$col_d.$$col_e.$$col_f.$$col_g.$$col_h.$$col_i)){
			$quest[] = '18@18.9|No|'.$i.'|'.$$col_a.'|'.$$col_b.'|'.$$col_c.'|'.$$col_d.'|'.$$col_e.'|'.$$col_f.'|'.$$col_g.'|'.$$col_h.'|'.$$col_i;
		}
	}
}

include 'paging.php';
?>

</body>
</html>