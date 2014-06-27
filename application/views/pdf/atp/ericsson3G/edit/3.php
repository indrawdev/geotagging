<?php session_start(); if(empty($_SESSION['isat']['log'])) exit('<script>alert("Session expired, please re-login!");self.close();</script>');if ( ! defined('BASEPATH')) exit('No direct script access allowed'); $Qtit = $this->db->query("SELECT `title` FROM `it_atp` WHERE `atp_id`='$dx'"); $tit = $Qtit->result_object(); $title = $tit[0]->title; ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xml:lang="en" xmlns="http://www.w3.org/1999/xhtml" lang="en">
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
<title>Preload ATP Ericsson 3G (Page 3) - <?php echo $title ?></title>
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
<h1>Page 3</h1><br /><br />

<form name="preload3G" method="post" action="">

<?php $Qsubchapter = $this->db->query("SELECT `subno_chapter`, `content` FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `chapter`='5' AND `no_chapter`='5.1' ORDER BY `subno_chapter_order` ASC"); foreach($Qsubchapter->result_object() as $subchapter) $arr_subchapter_5_1[$subchapter->subno_chapter -1]=$subchapter;
$dt_subchapter_5_1 = explode('|', $arr_subchapter_5_1[0]->content) ?>

<h3>Chapter: 5.1: Measurement AC Power Line (L1/L2/L3)</h3>
<table class="border" cellpadding="0" cellspacing="0">
<tr class="header"><td>Test Item</td><td>Phase L1 to Neutral</td><td>Phase L2 to Neutral</td><td>Phase L3 to Neutral</td><td>Neutral to Ground < 3 VAC)</td><td>Remark</td></tr>
<tr><td align="center">AC POWER LINE</td><td><input type="text" name="no_chapter_5_1_1a" value="<?php echo $this->ifunction->ifnulls($dt_subchapter_5_1[3]) ?>" /></td><td><input type="text" name="no_chapter_5_1_1b" value="<?php echo $this->ifunction->ifnulls($dt_subchapter_5_1[4]) ?>" /></td><td><input type="text" name="no_chapter_5_1_1c" value="<?php echo $this->ifunction->ifnulls($dt_subchapter_5_1[5]) ?>" /></td><td><input type="text" name="no_chapter_5_1_1d" value="<?php echo $this->ifunction->ifnulls($dt_subchapter_5_1[6]) ?>" /></td><td><input type="text" name="no_chapter_5_1_1e" value="<?php echo $this->ifunction->ifnulls($dt_subchapter_5_1[7]) ?>" /></td></tr>
</table>

<?php $Qsubchapter = $this->db->query("SELECT `subno_chapter`, `content` FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `chapter`='5' AND `no_chapter`='5.2' ORDER BY `subno_chapter_order` ASC"); foreach($Qsubchapter->result_object() as $subchapter) $arr_subchapter_5_2[$subchapter->subno_chapter -1]=$subchapter;
$dt_subchapter_5_2 = explode('|', $arr_subchapter_5_2[0]->content) ?>

<h3>Chapter: 5.2: Measurement RBS Input Power/ Cabinet Voltage</h3>
<table class="border" cellpadding="0" cellspacing="0">
<tr class="header"><td>DC V Input RBS  (Input DC power RBS from Rectifier/ BBS  to RBS test Point)</td><td width="90">Vdc (Volt)</td><td>Chassis to Ground<br />( &lt; 1 VDC)</td><td width="30">OK</td><td width="40">Not OK</td><td width="35">N/A</td><td>Remark</td></tr>
<tr><td>Cabinet 1</td><td><input type="text" name="no_chapter_5_2_1a" value="<?php echo $this->ifunction->ifnulls($dt_subchapter_5_2[3]) ?>" /></td><td><input type="text" name="no_chapter_5_2_1b" value="<?php echo $this->ifunction->ifnulls($dt_subchapter_5_2[4]) ?>" /></td><td align="center"><input type="radio" name="no_chapter_5_2_1c" value="OK" <?php if($dt_subchapter_5_2[5]=='OK') echo 'checked="checked"'; ?> /></td><td align="center"><input type="radio" name="no_chapter_5_2_1c" value="Not OK" <?php if($dt_subchapter_5_2[5]=='Not OK') echo 'checked="checked"'; ?> /></td><td align="center"><input type="radio" name="no_chapter_5_2_1c" value="N/A" <?php if($dt_subchapter_5_2[5]=='N/A') echo 'checked="checked"'; ?> /></td><td><input type="text" name="no_chapter_5_2_1d" value="<?php echo $this->ifunction->ifnulls($dt_subchapter_5_2[6]) ?>" /></td></tr>
</table>

<?php $Qsubchapter = $this->db->query("SELECT `subno_chapter`, `content` FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `chapter`='5' AND `no_chapter`='5.3' ORDER BY `subno_chapter_order` ASC"); foreach($Qsubchapter->result_object() as $subchapter) $arr_subchapter_5_3[$subchapter->subno_chapter -1]=$subchapter ?>

<h3>Chapter: 5.3: Measurement AC Power Input PSU RBS</h3>
<table class="border" cellpadding="0" cellspacing="0">
<tr class="header"><td>AC V input PSU RBS / (Cabinet 1)</td><td width="90">Vdc (Volt)</td><td width="30">OK</td><td width="40">Not OK</td><td width="35">N/A</td><td>Remark</td></tr>
<?php
for($i=0; $i <= 3; $i++){
	$dt_subchapter_5_3 = explode('|', $arr_subchapter_5_3[$i]->content);
	echo '<tr><td>Input Voltage PSU '.($i +1);
	echo '</td><td><input type="text" name="no_chapter_5_3_'.($i+1).'a" value="'.$this->ifunction->ifnulls($dt_subchapter_5_3[3]).'" /></td>';
	echo '<td align="center"><input type="radio" name="no_chapter_5_3_'.($i+1).'b" value="OK" '; if($dt_subchapter_5_3[4]=='OK') echo 'checked="checked"'; echo ' /></td>';
	echo '<td align="center"><input type="radio" name="no_chapter_5_3_'.($i+1).'b" value="Not OK" '; if($dt_subchapter_5_3[4]=='Not OK') echo 'checked="checked"'; echo ' /></td>';
	echo '<td align="center"><input type="radio" name="no_chapter_5_3_'.($i+1).'b" value="N/A" '; if($dt_subchapter_5_3[4]=='N/A') echo 'checked="checked"'; echo ' /></td>';
	echo '<td><input type="text" name="no_chapter_5_3_'.($i+1).'c" value="'.$this->ifunction->ifnulls($dt_subchapter_5_3[5]).'" /></td></tr>';
}
?>
</table>

<?php $Qsubchapter = $this->db->query("SELECT `subno_chapter`, `content` FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `chapter`='5' AND `no_chapter`='5.4' ORDER BY `subno_chapter_order` ASC"); foreach($Qsubchapter->result_object() as $subchapter) $arr_subchapter_5_4[$subchapter->subno_chapter -1]=$subchapter ?>

<h3>Chapter: 5.4: Measurement DC Power Output PSU RBS</h3>
<table class="border" cellpadding="0" cellspacing="0">
<tr class="header"><td>DC Power Output PSU RBS</td><td width="90">Vdc (Volt)</td><td width="30">OK</td><td width="40">Not OK</td><td width="35">N/A</td><td>Remark</td></tr>
<?php
for($i=0; $i <= 3; $i++){
	$dt_subchapter_5_4 = explode('|', $arr_subchapter_5_4[$i]->content);
	echo '<tr><td>Output Voltage PSU '.($i +1);
	echo '</td><td><input type="text" name="no_chapter_5_4_'.($i+1).'a" value="'.$this->ifunction->ifnulls($dt_subchapter_5_4[3]).'" /></td>';
	echo '<td align="center"><input type="radio" name="no_chapter_5_4_'.($i+1).'b" value="OK" '; if($dt_subchapter_5_4[4]=='OK') echo 'checked="checked"'; echo ' /></td>';
	echo '<td align="center"><input type="radio" name="no_chapter_5_4_'.($i+1).'b" value="Not OK" '; if($dt_subchapter_5_4[4]=='Not OK') echo 'checked="checked"'; echo ' /></td>';
	echo '<td align="center"><input type="radio" name="no_chapter_5_4_'.($i+1).'b" value="N/A" '; if($dt_subchapter_5_4[4]=='N/A') echo 'checked="checked"'; echo ' /></td>';
	echo '<td><input type="text" name="no_chapter_5_4_'.($i+1).'c" value="'.$this->ifunction->ifnulls($dt_subchapter_5_4[5]).'" /></td></tr>';
}
?>
</table>

<hr />

<?php $Qsubchapter = $this->db->query("SELECT `subno_chapter`, `content` FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `chapter`='5' AND `no_chapter`='5.5' ORDER BY `subno_chapter_order` ASC"); foreach($Qsubchapter->result_object() as $subchapter) $arr_subchapter_5_5[$subchapter->subno_chapter -1]=$subchapter ?>

<h3>Chapter: 5.5: Checking RBS Panel Circuit Breaker (AC & DC)</h3>
<table class="border" cellpadding="0" cellspacing="0">
<tr class="header"><td>Circuit Breaker Function Test</td><td width="30">OK</td><td width="40">Not OK</td><td width="35">N/A</td><td>Remark</td></tr>
<?php
$arr_dt_55 = array('AC', 'DC', 'Main', 'Battery');
for($i=0; $i <= 3; $i++){
	$dt_subchapter_5_5 = explode('|', $arr_subchapter_5_5[$i]->content);
	echo '<tr><td>'.$arr_dt_55[$i].' Circuit Breaker';
	echo '</td><td align="center"><input type="radio" name="no_chapter_5_5_'.($i+1).'a" value="OK" '; if($dt_subchapter_5_5[3]=='OK') echo 'checked="checked"'; echo ' /></td>';
	echo '<td align="center"><input type="radio" name="no_chapter_5_5_'.($i+1).'a" value="Not OK" '; if($dt_subchapter_5_5[3]=='Not OK') echo 'checked="checked"'; echo ' /></td>';
	echo '<td align="center"><input type="radio" name="no_chapter_5_5_'.($i+1).'a" value="N/A" '; if($dt_subchapter_5_5[3]=='N/A') echo 'checked="checked"'; echo ' /></td>';
	echo '<td><input type="text" name="no_chapter_5_5_'.($i+1).'b" value="'.$this->ifunction->ifnulls($dt_subchapter_5_5[4]).'" /></td></tr>';
}
?>
</table>

<hr />

<center>
    <input type="button" class="button" name="prev" value="Prev" onclick="validasi(2, <?php echo $dx ?>)" />
    &emsp; <input type="reset" class="reset" value="Reset to Default"/> &emsp;
    <input type="button" class="button" name="next" value="Next" onclick="validasi(4, <?php echo $dx ?>)" />
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
	
	$col_a = 'no_chapter_5_1_1a';
	$col_b = 'no_chapter_5_1_1b';
	$col_c = 'no_chapter_5_1_1c';
	$col_d = 'no_chapter_5_1_1d';
	$col_e = 'no_chapter_5_1_1e';
	
	$$col_a = kosong($$col_a);
	$$col_b = kosong($$col_b);
	$$col_c = kosong($$col_c);
	$$col_d = kosong($$col_d);
	$$col_e = kosong($$col_e);
	
	if(str_replace('null', 'null', $$col_a.$$col_b.$$col_c.$$col_d.$$col_e)){
		$quest[] = '5@5.1|No|1|'.$$col_a.'|'.$$col_b.'|'.$$col_c.'|'.$$col_d.'|'.$$col_e;
	}
	else{
		$user_id = $hasil[0]->user_id;
		$this->db->query("DELETE FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `user_id`='$user_id' AND `chapter`='5' AND `no_chapter`='5.1' AND `subno_chapter`='1'");
	}
	//----------------------------------------------------
	$col_a = 'no_chapter_5_2_1a';
	$col_b = 'no_chapter_5_2_1b';
	$col_c = 'no_chapter_5_2_1c';
	$col_d = 'no_chapter_5_2_1d';
	
	$$col_a = kosong($$col_a);
	$$col_b = kosong($$col_b);
	$$col_c = kosong($$col_c);
	$$col_d = kosong($$col_d);
	
	if(str_replace('null', 'null', $$col_a.$$col_b.$$col_c.$$col_d)){
		$quest[] = '5@5.2|No|1|'.$$col_a.'|'.$$col_b.'|'.$$col_c.'|'.$$col_d;
	}
	//----------------------------------------------------
	for($i=1; $i<=4; $i++)
	{
		$col_a = 'no_chapter_5_3_'.$i.'a';
		$col_b = 'no_chapter_5_3_'.$i.'b';
		$col_c = 'no_chapter_5_3_'.$i.'c';
		
		$$col_a = kosong($$col_a);
		$$col_b = kosong($$col_b);
		$$col_c = kosong($$col_c);
		
		if(str_replace('null', 'null', $$col_a.$$col_b.$$col_c)){
			$quest[] = '5@5.3|No|'.$i.'|'.$$col_a.'|'.$$col_b.'|'.$$col_c;
		}
	}
	//----------------------------------------------------
	for($i=1; $i<=4; $i++)
	{
		$col_a = 'no_chapter_5_4_'.$i.'a';
		$col_b = 'no_chapter_5_4_'.$i.'b';
		$col_c = 'no_chapter_5_4_'.$i.'c';
		
		$$col_a = kosong($$col_a);
		$$col_b = kosong($$col_b);
		$$col_c = kosong($$col_c);
		
		if(str_replace('null', 'null', $$col_a.$$col_b.$$col_c)){
			$quest[] = '5@5.4|No|'.$i.'|'.$$col_a.'|'.$$col_b.'|'.$$col_c;
		}
	}
	//----------------------------------------------------
	for($i=1; $i<=4; $i++)
	{
		$col_a = 'no_chapter_5_5_'.$i.'a';
		$col_b = 'no_chapter_5_5_'.$i.'b';
		
		$$col_a = kosong($$col_a);
		$$col_b = kosong($$col_b);
		
		if(str_replace('null', 'null', $$col_a.$$col_b)){
			$quest[] = '5@5.5|No|'.$i.'|'.$$col_a.'|'.$$col_b;
		}
	}
}
include 'paging.php';
?>

</body>
</html>