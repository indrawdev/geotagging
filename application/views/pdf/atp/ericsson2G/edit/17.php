<?php session_start(); if(empty($_SESSION['isat']['log'])) exit('<script>alert("Session expired, please re-login!");self.close();</script>'); if ( ! defined('BASEPATH')) exit('No direct script access allowed'); $Qtit = $this->db->query("SELECT `title` FROM `it_atp` WHERE `atp_id`='$dx'"); $tit = $Qtit->result_object(); $title = $tit[0]->title; ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xml:lang="en" xmlns="http://www.w3.org/1999/xhtml" lang="en">
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
<title>Preload ATP Ericsson 2G (Page 17) - <?php echo $title ?></title>
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
<h1>Page 17</h1>
<br /><br />

<form name="preload2G" method="post" action="">

<?php $Qsubchapter = $this->db->query("SELECT `subno_chapter`, `content` FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `chapter`='25' AND `no_chapter`='25.1' ORDER BY `subno_chapter_order` ASC"); foreach($Qsubchapter->result_object() as $subchapter) $arr_subchapter_25_1[$subchapter->subno_chapter -1]=$subchapter ?>

<h3>Chapter 25 : Battery Backup System (BBS) Test<br />Chapter 25.1: BBS Type Identification</h3>

<table class="border" cellpadding="0" cellspacing="0">
<tr class="header">
    <td width="40">Test No</td>
    <td>BBS Type</td>
    <td width="30">OK</td>
    <td width="40">Not OK </td>
    <td width="35">N/A</td>
    <td>Remark</td>
</tr>
<?php
$arr_dt_251 = array('BBS 6201 for RBS 6201', 'BBS for RBS 6102', 'BBS for 6601', 'Temperature sensor', 'Internal BBS alarm functionality');
for($i=0; $i <= 4; $i++){
	$dt_subchapter_25_1 = explode('|', $arr_subchapter_25_1[$i]->content);
	echo '<tr><td>25.1.'.($i +1).'</td><td>'.$arr_dt_251[$i].'</td>';
	echo '<td align="center"><input type="radio" name="no_chapter_25_1_'.($i+1).'a" value="OK" ';  if($dt_subchapter_25_1[3]=='OK') echo 'checked="checked"'; echo ' /></td>';
	echo '<td align="center"><input type="radio" name="no_chapter_25_1_'.($i+1).'a" value="Not OK" ';  if($dt_subchapter_25_1[3]=='Not OK') echo 'checked="checked"'; echo ' /></td>';
	echo '<td align="center"><input type="radio" name="no_chapter_25_1_'.($i+1).'a" value="N/A" ';  if($dt_subchapter_25_1[3]=='N/A') echo 'checked="checked"'; echo ' /></td>';
	echo '<td><input type="text" name="no_chapter_25_1_'.($i+1).'b" value="'.$this->ifunction->ifnulls($dt_subchapter_25_1[4]).'" /></td></tr>';
}
?>
</table>

<?php $Qsubchapter = $this->db->query("SELECT `subno_chapter`, `content` FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `chapter`='25' AND `no_chapter`='25.2' ORDER BY `subno_chapter_order` ASC"); foreach($Qsubchapter->result_object() as $subchapter) $arr_subchapter_25_2[$subchapter->subno_chapter -1]=$subchapter ?>

<h3>Chapter 25.2: BBS Material and Installation check List</h3>
<table class="border" cellpadding="0" cellspacing="0">
<tr class="header">
    <td width="40">Test No</td>
    <td>Material Type</td>
    <td width="30">OK</td>
    <td width="40">Not OK</td>
    <td width="35">N/A</td>
    <td>Quantity</td>
    <td>Remark</td>
</tr>
<?php
$arr_dt_252 = array('Power Bar', 'Battery cable connection', 'Battery 12 V', 'Fan unit /Cooling Fan *', 'Switch use for Fan *', 'FUSE Battery');
for($i=0; $i <= 5; $i++){
	$dt_subchapter_25_2 = explode('|', $arr_subchapter_25_2[$i]->content);
	echo '<tr><td>25.2.'.($i +1).'</td><td>'.$arr_dt_252[$i].'</td>';
	echo '<td align="center"><input type="radio" name="no_chapter_25_2_'.($i+1).'a" value="OK" ';  if($dt_subchapter_25_2[3]=='OK') echo 'checked="checked"'; echo ' /></td>';
	echo '<td align="center"><input type="radio" name="no_chapter_25_2_'.($i+1).'a" value="Not OK" ';  if($dt_subchapter_25_2[3]=='Not OK') echo 'checked="checked"'; echo ' /></td>';
	echo '<td align="center"><input type="radio" name="no_chapter_25_2_'.($i+1).'a" value="N/A" ';  if($dt_subchapter_25_2[3]=='N/A') echo 'checked="checked"'; echo ' /></td>';
	echo '<td><input type="text" name="no_chapter_25_2_'.($i+1).'b" value="'.$this->ifunction->ifnulls($dt_subchapter_25_2[4]).'" /></td>';
	echo '<td><input type="text" name="no_chapter_25_2_'.($i+1).'c" value="'.$this->ifunction->ifnulls($dt_subchapter_25_2[5]).'" /></td></tr>';
}
?>
</table>

<?php $Qsubchapter = $this->db->query("SELECT `subno_chapter`, `content` FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `chapter`='25' AND `no_chapter`='25.3' ORDER BY `subno_chapter_order` ASC"); foreach($Qsubchapter->result_object() as $subchapter) $arr_subchapter_25_3[$subchapter->subno_chapter -1]=$subchapter;
$dt_subchapter_25_3 = explode('|', $arr_subchapter_25_3[0]->content); ?>

<h3>Chapter 25.3: BBS Testing<br />Table 19. BBS test</h3>
<table class="border" cellpadding="0" cellspacing="0">
<tr>
    <td colspan="8" valign="top"><b>Back Up Time: <input type="radio" name="no_chapter_25_3_1" value="2 hours" <?php if($dt_subchapter_25_3[3]=='2 hours') echo 'checked="checked"' ?> /> 2 hours <span style="padding:0 10px">&nbsp;</span> <input type="radio" name="no_chapter_25_3_1" value="4 hours" <?php if($dt_subchapter_25_3[3]=='4 hours') echo 'checked="checked"' ?> /> 4 hours <span style="padding:0 10px">&nbsp;</span> <input type="radio" name="no_chapter_25_3_1" value="6 hours" <?php if($dt_subchapter_25_3[3]=='6 hours') echo 'checked="checked"' ?> /> 6 hours <span style="padding:0 10px">&nbsp;</span> <input type="radio" name="no_chapter_25_3_1" value="8 hours" <?php if($dt_subchapter_25_3[3]=='8 hours') echo 'checked="checked"' ?> /> 8 hours <span style="padding:0 10px">&nbsp;</span> <input type="radio" name="no_chapter_25_3_1" value="...hours" <?php if($dt_subchapter_25_3[3]=='...hours') echo 'checked="checked"' ?> /> ...hours</b><p>For 12 V Battery, minimum battery voltage must not reach below 10,9 Vdc after discharge period</p></td>
</tr>
<tr class="header">
    <td width="40" rowspan="2">Test No</td>
    <td width="50" rowspan="2">Battery</td>
    <td colspan="2">Voltage tested (VDC)</td>
    <td width="30" rowspan="2">OK</td>
    <td width="40" rowspan="2">Not OK</td>
    <td width="35" rowspan="2">N/A</td>
    <td rowspan="2">Remark</td>
</tr>
<tr class="header">
    <td>Before</td><td>After</td>
</tr>
<?php
for($i=1; $i <= 16; $i++){
	$dt_subchapter_25_3 = explode('|', $arr_subchapter_25_3[$i]->content);
	echo '<tr><td>25.3.'.($i +1).'</td><td>Battery '.($i +1).'</td>';
	echo '<td><input type="text" name="no_chapter_25_3_'.($i+1).'a" value="'.$this->ifunction->ifnulls($dt_subchapter_25_3[4]).'" /></td>';
	echo '<td><input type="text" name="no_chapter_25_3_'.($i+1).'b" value="'.$this->ifunction->ifnulls($dt_subchapter_25_3[5]).'" /></td>';
	echo '<td align="center"><input type="radio" name="no_chapter_25_3_'.($i+1).'c" value="OK" ';  if($dt_subchapter_25_3[3]=='OK') echo 'checked="checked"'; echo ' /></td>';
	echo '<td align="center"><input type="radio" name="no_chapter_25_3_'.($i+1).'c" value="Not OK" ';  if($dt_subchapter_25_3[3]=='Not OK') echo 'checked="checked"'; echo ' /></td>';
	echo '<td align="center"><input type="radio" name="no_chapter_25_3_'.($i+1).'c" value="N/A" ';  if($dt_subchapter_25_3[3]=='N/A') echo 'checked="checked"'; echo ' /></td>';
	echo '<td><input type="text" name="no_chapter_25_3_'.($i+1).'d" value="'.$this->ifunction->ifnulls($dt_subchapter_25_3[6]).'" /></td></tr>';
}
?>
</table>

<hr />

<center>
	<input type="button" class="button"  name="prev" value="Prev" onclick="validasi(16,'<?php echo $dx; ?>');" />
    <!--<input type="submit" class="button" name="prev" value="Prev" />-->
    &emsp;
    <input type="reset" class="reset" value="Reset to Default"/>
    &emsp;
    <input type="button" class="button" name="next" value="Next" onclick="validasi(18,'<?php echo $dx; ?>');" />
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
		
		for($i=1; $i<=5; $i++)
		{
			$col_a = 'no_chapter_25_1_'.$i.'a';
			$col_b = 'no_chapter_25_1_'.$i.'b';
			
			$$col_a = kosong($$col_a);
			$$col_b = kosong($$col_b);
			
			if(str_replace('null', '', $$col_a.$$col_b)){
				$quest[] = '25@25.1|No|'.$i.'|'.$$col_a.'|'.$$col_b;
			}
		}
		//----------------------------------------------------
		for($i=1; $i<=6; $i++)
		{
			$col_a = 'no_chapter_25_2_'.$i.'a';
			$col_b = 'no_chapter_25_2_'.$i.'b';
			$col_c = 'no_chapter_25_2_'.$i.'c';
			
			$$col_a = kosong($$col_a);
			$$col_b = kosong($$col_b);
			$$col_c = kosong($$col_c);
			
			if(str_replace('null', '', $$col_a.$$col_b.$$col_c)){
				$quest[] = '25@25.2|No|'.$i.'|'.$$col_a.'|'.$$col_b.'|'.$$col_c;
			}
		}
		//----------------------------------------------------
		if(isset($no_chapter_25_3_1)) $quest[] = '25@25.3|No|1|'.$no_chapter_25_3_1;
		//----------------------------------------------------
		for($i=2; $i<=17; $i++)
		{
			$col_a = 'no_chapter_25_3_'.$i.'a';
			$col_b = 'no_chapter_25_3_'.$i.'b';
			$col_c = 'no_chapter_25_3_'.$i.'c';
			$col_d = 'no_chapter_25_3_'.$i.'d';
			
			$$col_a = kosong($$col_a);
			$$col_b = kosong($$col_b);
			$$col_c = kosong($$col_c);
			$$col_d = kosong($$col_d);
			
			if(str_replace('null', '', $$col_a.$$col_b.$$col_c.$$col_d)){
				$quest[] = '25@25.3|No|'.$i.'|'.$$col_c.'|'.$$col_a.'|'.$$col_b.'|'.$$col_d;
			}
		}
	}
	include 'paging.php'; 
?>
</body>
</html>