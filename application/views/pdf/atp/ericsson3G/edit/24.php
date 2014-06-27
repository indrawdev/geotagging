<?php session_start(); if(empty($_SESSION['isat']['log'])) exit('<script>alert("Session expired, please re-login!");self.close();</script>');if ( ! defined('BASEPATH')) exit('No direct script access allowed'); $Qtit = $this->db->query("SELECT `title` FROM `it_atp` WHERE `atp_id`='$dx'"); $tit = $Qtit->result_object(); $title = $tit[0]->title; ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xml:lang="en" xmlns="http://www.w3.org/1999/xhtml" lang="en">
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
<title>Preload ATP Ericsson 3G (Page 24) - <?php echo $title ?></title>
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
<h1>Page 24</h1><br /><br />

<form name="preload3G" method="post" action="">

<?php $Qchapter = $this->db->query("SELECT `no_chapter`, `content` FROM `it_atp_chapter` WHERE `atp_id`='$dx' AND `chapter`='19' ORDER BY `atp_chapter_id` ASC"); foreach($Qchapter->result_object() as $chapter) $arr_chapter_19[str_replace('19.', '', $chapter->no_chapter) -1]=$chapter ?>

<table class="border" cellpadding="0" cellspacing="0">
<tr class="header"><td width="40">Chapter</td><td >Title work performed</td><td width="30">OK</td><td width="40">Not OK</td><td width="35">N/A</td><td width="90">Remark</td></tr>
<tr><td valign="top"><b>19</b><br />19.1<br />19.2<br />19.3<br />19.4</td><td valign="top"><b>Battery Backup System (BBS) Test</b><br />BBS Type identification<br />BBS Material and Installation check List<br />BBS Testing<br />BBS Labelling</td>
<td valign="top" align="center">
<?php echo '<br />';
for($i=0; $i <= 3; $i++){
	echo '<input type="radio" name="no_chapter_19_'.($i+1).'" value="OK" '; if($arr_chapter_19[$i]->content=='OK') echo 'checked="checked"'; echo '><br />';
}
?>
</td><td valign="top" align="center">
<?php echo '<br />';
for($i=0; $i <= 3; $i++){
	echo '<input type="radio" name="no_chapter_19_'.($i+1).'" value="Not OK" '; if($arr_chapter_19[$i]->content=='Not OK') echo 'checked="checked"'; echo '><br />';
}
?>
</td><td valign="top" align="center">
<?php echo '<br />';
for($i=0; $i <= 3; $i++){
	echo '<input type="radio" name="no_chapter_19_'.($i+1).'" value="N/A" '; if($arr_chapter_19[$i]->content=='N/A') echo 'checked="checked"'; echo '><br />';
}
?>
</td><td valign="top" align="center"><?php echo '<br />'; for($i=0; $i <= 3; $i++) echo 'Major<br />' ?></td></tr>
</table>

<?php $Qsubchapter = $this->db->query("SELECT `subno_chapter`, `content` FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `chapter`='19' AND `no_chapter`='19.1' ORDER BY `subno_chapter_order` ASC"); foreach($Qsubchapter->result_object() as $subchapter) $arr_subchapter_19_1[$subchapter->subno_chapter -1]=$subchapter ?>

<h3>Chapter 19.1: BBS Type Identification</h3>
<table class="border" cellpadding="0" cellspacing="0">
<tr class="header"><td width="40">Test No</td><td >BBS Type</td><td width="30">OK</td><td width="40">Not OK</td><td width="35">N/A</td><td width="90">Remark</td></tr>
<?php
$arr_dt_191 = array('BBS 9500 for RBS 3101', 'BBS for RBS 3206', 'BBS 8500 for RBS 3107', 'PBC 04 for RBS 3412', 'RBS 6201 for RBS 6201');
for($i=0; $i <= 4; $i++){
	$dt_subchapter_19_1 = explode('|', $arr_subchapter_19_1[$i]->content);
	echo '<tr><td>19.1.'.($i +1).'</td><td>'.$arr_dt_191[$i].'</td>';
	echo '<td align="center"><input type="radio" name="no_chapter_19_1_'.($i+1).'a" value="OK" '; if($dt_subchapter_19_1[3]=='OK') echo 'checked="checked"'; echo ' /></td>';
	echo '<td align="center"><input type="radio" name="no_chapter_19_1_'.($i+1).'a" value="Not OK" '; if($dt_subchapter_19_1[3]=='Not OK') echo 'checked="checked"'; echo ' /></td>';
	echo '<td align="center"><input type="radio" name="no_chapter_19_1_'.($i+1).'a" value="N/A" '; if($dt_subchapter_19_1[3]=='N/A') echo 'checked="checked"'; echo ' /></td>';
	echo '<td><input type="text" name="no_chapter_19_1_'.($i+1).'b" value="'.$this->ifunction->ifnulls($dt_subchapter_19_1[4]).'" /></td></tr>';
}
?>
</table>

<?php $Qsubchapter = $this->db->query("SELECT `subno_chapter`, `content` FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `chapter`='19' AND `no_chapter`='19.2' ORDER BY `subno_chapter_order` ASC"); foreach($Qsubchapter->result_object() as $subchapter) $arr_subchapter_19_2[$subchapter->subno_chapter -1]=$subchapter ?>

<h3>Chapter 19.2: BBS Material and Installation check List</h3>
<table class="border" cellpadding="0" cellspacing="0">
<tr class="header"><td width="40">Test No</td><td>Material Type</td><td width="30">OK</td><td width="40">Not OK</td><td width="35">N/A</td><td width="100">Quantity</td><td width="90">Remark</td></tr>
<?php
$arr_dt_192 = array('Power Bar', 'Battery cable connection', 'Battery 12 V', 'Fan unit /Cooling Fan *', 'Switch use for Fan *');
for($i=0; $i <= 4; $i++){
	$dt_subchapter_19_2 = explode('|', $arr_subchapter_19_2[$i]->content);
	echo '<tr><td>19.2.'.($i +1).'</td><td>'.$arr_dt_192[$i].'</td>';
	echo '<td align="center"><input type="radio" name="no_chapter_19_2_'.($i+1).'a" value="OK" '; if($dt_subchapter_19_2[3]=='OK') echo 'checked="checked"'; echo ' /></td>';
	echo '<td align="center"><input type="radio" name="no_chapter_19_2_'.($i+1).'a" value="Not OK" '; if($dt_subchapter_19_2[3]=='Not OK') echo 'checked="checked"'; echo ' /></td>';
	echo '<td align="center"><input type="radio" name="no_chapter_19_2_'.($i+1).'a" value="N/A" '; if($dt_subchapter_19_2[3]=='N/A') echo 'checked="checked"'; echo ' /></td>';
	echo '<td><input type="text" name="no_chapter_19_2_'.($i+1).'b" value="'.$this->ifunction->ifnulls($dt_subchapter_19_2[4]).'" /></td><td><input type="text" name="no_chapter_19_2_'.($i+1).'c" value="'.$this->ifunction->ifnulls($dt_subchapter_19_2[5]).'" /></td></tr>';
}
?>
</table><br />

<?php $Qsubchapter = $this->db->query("SELECT `subno_chapter`, `content` FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `chapter`='19' AND `no_chapter`='19.3' ORDER BY `subno_chapter_order` ASC"); foreach($Qsubchapter->result_object() as $subchapter) $arr_subchapter_19_3[$subchapter->subno_chapter -1]=$subchapter;
$dt_subchapter_19_3 = explode('|', $arr_subchapter_19_3[0]->content) ?>

<h3>Chapter 19.3: BBS Testing</h3>
<table class="border" cellpadding="0" cellspacing="0">
<tr><td>Back Up Time: <span style="padding:3px 0">&nbsp;</span> <input type="radio" name="no_chapter_19_3_1" value="2 hours" <?php if($dt_subchapter_19_3[3]=='2 hours') echo 'checked="checked"'; ?> /> 2 hours <span style="padding:5px 0">&nbsp;</span> <input type="radio" name="no_chapter_19_3_1" value="4 hours" <?php if($dt_subchapter_19_3[3]=='4 hours') echo 'checked="checked"'; ?> /> 4 hours <span style="padding:5px 0">&nbsp;</span> <input type="radio" name="no_chapter_19_3_1" value="6 hours" <?php if($dt_subchapter_19_3[3]=='6 hours') echo 'checked="checked"'; ?> /> 6 hours <span style="padding:5px 0">&nbsp;</span> <input type="radio" name="no_chapter_19_3_1" value="8 hours" <?php if($dt_subchapter_19_3[3]=='8 hours') echo 'checked="checked"'; ?> /> 8 hours <span style="padding:5px 0">&nbsp;</span> <input type="radio" name="no_chapter_19_3_1" value="... hours" <?php if($dt_subchapter_19_3[3]=='... hours') echo 'checked="checked"'; ?> /> ...hours </td></tr></table><br />

<h3>Chapter 19.3: BBS Material and Installation check List</h3>
<table class="border" cellpadding="0" cellspacing="0">
<tr class="header"><td width="40">Test No</td><td width="60">Battery</td><td>Voltage after back up tested (VDC)</td><td width="30">OK</td><td width="40">Not OK</td><td width="35">N/A</td><td width="110">Remark</td></tr>
<?php
$i193a = 1;
for($i=0; $i <= 4; $i++){
	$dt_subchapter_19_3a = explode('|', $arr_subchapter_19_3[$i193a]->content);
	echo '<tr><td>19.3.'.$i193a.'</td><td>Battery '.$i193a.'</td><td><input type="text" name="no_chapter_19_3_'.($i193a+1).'a" value="'.$this->ifunction->ifnulls($dt_subchapter_19_3a[3]).'" /></td>';
	echo '<td align="center"><input type="radio" name="no_chapter_19_3_'.($i193a+1).'b" value="OK" '; if($dt_subchapter_19_3a[4]=='OK') echo 'checked="checked"'; echo ' /></td>';
	echo '<td align="center"><input type="radio" name="no_chapter_19_3_'.($i193a+1).'b" value="Not OK" '; if($dt_subchapter_19_3a[4]=='Not OK') echo 'checked="checked"'; echo ' /></td>';
	echo '<td align="center"><input type="radio" name="no_chapter_19_3_'.($i193a+1).'b" value="N/A" '; if($dt_subchapter_19_3a[4]=='N/A') echo 'checked="checked"'; echo ' /></td>';
	echo '<td><input type="text" name="no_chapter_19_3_'.($i193a+1).'c" value="'.$this->ifunction->ifnulls($dt_subchapter_19_3a[5]).'" /></td></tr>';
	$i193a++;
}
?>
</table>

<hr />

<table class="border" cellpadding="0" cellspacing="0">
<?php
$i193b = 6;
for($i=5; $i <= 15; $i++){
	$dt_subchapter_19_3b = explode('|', $arr_subchapter_19_3[$i193b]->content);
	echo '<tr><td width="40">19.3.'.$i193b.'</td><td width="60">Battery '.$i193b.'</td><td><input type="text" name="no_chapter_19_3_'.($i193b+1).'a" value="'.$this->ifunction->ifnulls($dt_subchapter_19_3b[3]).'" /></td>';
	echo '<td width="30" align="center"><input type="radio" name="no_chapter_19_3_'.($i193b+1).'b" value="OK" '; if($dt_subchapter_19_3b[4]=='OK') echo 'checked="checked"'; echo ' /></td>';
	echo '<td width="40" align="center"><input type="radio" name="no_chapter_19_3_'.($i193b+1).'b" value="Not OK" '; if($dt_subchapter_19_3b[4]=='Not OK') echo 'checked="checked"'; echo ' /></td>';
	echo '<td width="35" align="center"><input type="radio" name="no_chapter_19_3_'.($i193b+1).'b" value="N/A" '; if($dt_subchapter_19_3b[4]=='N/A') echo 'checked="checked"'; echo ' /></td>';
	echo '<td width="110"><input type="text" name="no_chapter_19_3_'.($i193b+1).'c" value="'.$this->ifunction->ifnulls($dt_subchapter_19_3b[5]).'" /></td></tr>';
	$i193b++;
}
?>
</table>

<hr />

<center>
    <input type="button" class="button" name="prev" value="Prev" onclick="validasi(23, <?php echo $dx ?>)" />
    &emsp; <input type="reset" class="reset" value="Reset to Default"/> &emsp;
    <input type="button" class="button" name="next" value="Next" onclick="validasi(25, <?php echo $dx ?>)" />
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
	
	for($i=1; $i<=4; $i++)
	{
		$chp = 'no_chapter_19_'.$i;
		if(isset($$chp)) $quest[] = '19|No|19.'.$i.'|'.$$chp; else { $$chp = "null"; $quest[] = '19|No|19.'.$i.'|'.$$chp; }
	}
	//----------------------------------------------------
	for($i=1; $i<=5; $i++)
	{
		$col_a = 'no_chapter_19_1_'.$i.'a';
		$col_b = 'no_chapter_19_1_'.$i.'b';
		
		$$col_a = kosong($$col_a);
		$$col_b = kosong($$col_b);
		
		if(str_replace('null', 'null', $$col_a.$$col_b)){
			$quest[] = '19@19.1|No|'.$i.'|'.$$col_a.'|'.$$col_b;
		}
	}
	//----------------------------------------------------
	for($i=1; $i<=5; $i++)
	{
		$col_a = 'no_chapter_19_2_'.$i.'a';
		$col_b = 'no_chapter_19_2_'.$i.'b';
		$col_c = 'no_chapter_19_2_'.$i.'c';
		
		$$col_a = kosong($$col_a);
		$$col_b = kosong($$col_b);
		$$col_c = kosong($$col_c);
		
		if(str_replace('null', 'null', $$col_a.$$col_b.$$col_c)){
			$quest[] = '19@19.2|No|'.$i.'|'.$$col_a.'|'.$$col_b.'|'.$$col_c;
		}
	}
	//----------------------------------------------------
	if(isset($no_chapter_19_3_1)) $quest[] = '19@19.3|No|1|'.$no_chapter_19_3_1; else { $quest[] = '19@19.3|No|1|null'; }
	//----------------------------------------------------
	for($i=2; $i<=17; $i++)
	{
		$col_a = 'no_chapter_19_3_'.$i.'a';
		$col_b = 'no_chapter_19_3_'.$i.'b';
		$col_c = 'no_chapter_19_3_'.$i.'c';
		
		$$col_a = kosong($$col_a);
		$$col_b = kosong($$col_b);
		$$col_c = kosong($$col_c);
		
		if(str_replace('null', 'null', $$col_a.$$col_b.$$col_c)){
			$quest[] = '19@19.3|No|'.$i.'|'.$$col_a.'|'.$$col_b.'|'.$$col_c;
		}
	}
}

include 'paging.php';
?>

</body>
</html>