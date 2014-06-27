<?php session_start(); if(empty($_SESSION['isat']['log'])) exit('<script>alert("Session expired, please re-login!");self.close();</script>');if ( ! defined('BASEPATH')) exit('No direct script access allowed'); $Qtit = $this->db->query("SELECT `title` FROM `it_atp` WHERE `atp_id`='$dx'"); $tit = $Qtit->result_object(); $title = $tit[0]->title; ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xml:lang="en" xmlns="http://www.w3.org/1999/xhtml" lang="en">
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
<title>Preload ATP Ericsson 3G (Page 9) - <?php echo $title ?></title>
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
<h1>Page 9</h1><br /><br />

<form name="preload3G" method="post" action="">

<?php $Qsubchapter = $this->db->query("SELECT `subno_chapter`, `content` FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `chapter`='9' AND `no_chapter`='9.2' ORDER BY `subno_chapter_order` ASC"); foreach($Qsubchapter->result_object() as $subchapter) $arr_subchapter_9_2[$subchapter->subno_chapter -1]=$subchapter ?>

<h3>Chapter 9.2: Documentation Check</h3>
<table class="border" cellpadding="0" cellspacing="0">
<tr class="header"><td width="40">Test No</td><td>Item</td><td width="30">OK</td><td width="40">Not OK</td><td>Remark</td></tr>
<?php
$arr_dt_92 = array('Manufacture/Factory Test Result', 'Specification equipment');
for($i=0; $i <= 1; $i++){
	$dt_subchapter_9_2 = explode('|', $arr_subchapter_9_2[$i]->content);
	echo '<tr><td>9.2.'.($i +1);
	echo '</td><td>'.$arr_dt_92[$i];
	echo '</td><td align="center"><input type="radio" name="no_chapter_9_2_'.($i+1).'a" value="OK" '; if($dt_subchapter_9_2[3]=='OK') echo 'checked="checked"'; echo ' /></td>';
	echo '<td align="center"><input type="radio" name="no_chapter_9_2_'.($i+1).'a" value="Not OK" '; if($dt_subchapter_9_2[3]=='Not OK') echo 'checked="checked"'; echo ' /></td>';
	echo '<td><input type="text" name="no_chapter_9_2_'.($i+1).'b" value="'.$this->ifunction->ifnulls($dt_subchapter_9_2[4]).'" /></td></tr>';
}
?>
</table>
<p style="font-size:11px"><i>Note: All document should be attached</i></p>

<?php $Qchapter = $this->db->query("SELECT `no_chapter`, `content` FROM `it_atp_chapter` WHERE `atp_id`='$dx' AND `chapter`='10' ORDER BY `atp_chapter_id` ASC");
foreach($Qchapter->result_object() as $chapter) $arr_chapter_10[str_replace('10.', '', $chapter->no_chapter) -1]=$chapter ?>

<table class="border" cellpadding="0" cellspacing="0">
<tr class="header"><td width="40">Chapter</td><td>Title work performed</td><td width="30">OK</td><td width="40">Not OK</td><td width="35">N/A</td><td width="90">Remark</td></tr>
<tr><td valign="top"><b>10</b><br />10.1<br />10.2<br />10.3<br />10.4<br />10.5<br />10.6<br />10.7<br />10.8<br />10.9<br />10.10</td>
<td valign="top"><b>Antenna System Inventory Check</b><br />Equipment quantity Check<br />Connector Type<br />Antenna Table<br />Antenna System Control (ASC)<br />Remote Electrical Tilt (RET)<br />Feeder Cable<br />Top Jumper (from feeder to ASC)<br />Top Jumper (from ASC/RRU to Antenna)<br />Bottom Jumper<br />Optical Cable</td>
<td valign="top" align="center">
<?php echo '<br />';
for($i=0; $i <= 9; $i++){
	echo '<input type="radio" name="no_chapter_10_'.($i+1).'" value="OK" '; if($arr_chapter_10[$i]->content=='OK') echo 'checked="checked"'; echo '><br />';
}
?>
</td><td valign="top" align="center">
<?php echo '<br />';
for($i=0; $i <= 9; $i++){
	echo '<input type="radio" name="no_chapter_10_'.($i+1).'" value="Not OK" '; if($arr_chapter_10[$i]->content=='Not OK') echo 'checked="checked"'; echo '><br />';
}
?>
</td><td valign="top" align="center">
<?php echo '<br />';
for($i=0; $i <= 9; $i++){
	echo '<input type="radio" name="no_chapter_10_'.($i+1).'" value="N/A" '; if($arr_chapter_10[$i]->content=='N/A') echo 'checked="checked"'; echo '><br />';
}
?>
</td><td valign="top" align="center"><?php echo '<br />'; for($i=0; $i <= 9; $i++) echo 'Minor<br />' ?></td></tr>
</table>

<?php $Qsubchapter = $this->db->query("SELECT `subno_chapter`, `content` FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `chapter`='10' AND `no_chapter`='10.1' ORDER BY `subno_chapter_order` ASC"); foreach($Qsubchapter->result_object() as $subchapter) $arr_subchapter_10_1[$subchapter->subno_chapter -1]=$subchapter;
$dt_subchapter_10_1a = explode('|', $arr_subchapter_10_1[0]->content);
$dt_subchapter_10_1b = explode('|', $arr_subchapter_10_1[1]->content);
$dt_subchapter_10_1c = explode('|', $arr_subchapter_10_1[2]->content);
$dt_subchapter_10_1d = explode('|', $arr_subchapter_10_1[3]->content);
?>

<h3>Chapter 10.1: Equipment Quantity Check</h3>
<table class="border" cellpadding="0" cellspacing="0">		
<tr><td width="40">10.1.1</td><td colspan="2">Antenna Polarization</td><td colspan="2"><input type="radio" name="no_chapter_10_1_1" value="Cross Polarization" <?php if($dt_subchapter_10_1a[3]=='Cross Polarization') echo 'checked="checked"'; ?> /> Cross Polarization <span style="padding:0 5px">&nbsp;</span> <input type="radio" name="no_chapter_10_1_1" value="Vertical Polarization" <?php if($dt_subchapter_10_1a[3]=='Vertical Polarization') echo 'checked="checked"'; ?> /> Vertical Polarization</td></tr>
<tr><td>10.1.2</td><td colspan="2">Band Frequenc</td><td colspan="2"><input type="radio" name="no_chapter_10_1_2" value="3G" <?php if($dt_subchapter_10_1b[3]=='3G') echo 'checked="checked"'; ?> /> 3G</td></tr>
<tr><td>10.1.3</td><td colspan="2">Number of sectors</td><td colspan="2"><input type="radio" name="no_chapter_10_1_3" value="Omni" <?php if($dt_subchapter_10_1c[3]=='Omni') echo 'checked="checked"'; ?> /> Omni <span style="padding:0 5px">&nbsp;</span> <input type="radio" name="no_chapter_10_1_3" value="One" <?php if($dt_subchapter_10_1c[3]=='One') echo 'checked="checked"'; ?> /> One <span style="padding:0 5px">&nbsp;</span> <input type="radio" name="no_chapter_10_1_3" value="Two" <?php if($dt_subchapter_10_1c[3]=='Two') echo 'checked="checked"'; ?> /> Two <span style="padding:0 5px">&nbsp;</span> <input type="radio" name="no_chapter_10_1_3" value="Three" <?php if($dt_subchapter_10_1c[3]=='Three') echo 'checked="checked"'; ?> /> Three</td></tr>
<tr><td>10.1.4</td><td colspan="2">Type of Diversity</td><td colspan="2"><input type="radio" name="no_chapter_10_1_4" value="Polarization" <?php if($dt_subchapter_10_1d[3]=='Polarization') echo 'checked="checked"'; ?> /> Polarization <span style="padding:0 5px">&nbsp;</span> <input type="radio" name="no_chapter_10_1_4" value="Space" <?php if($dt_subchapter_10_1d[3]=='Space') echo 'checked="checked"'; ?> /> Space</td></tr>
<tr><td>10.1.5</td><td colspan="4">Status and Number of Installed Antenna</td></tr>
<?php
$i101 = 4;
$arr_dt_101 = array(1=> 'Antenna', 'Filter', 'EMP/Connect Arrester', 'Duplexer', 'Triplexer', 'Splitter Two Way', 'Splitter Three Way', 'Hybrid Coupler', 'TMA/ASC', 'RET', 'MCM');
for($i=1; $i <= 11; $i++){
	$dt_subchapter_10_1 = explode('|', $arr_subchapter_10_1[$i101]->content);
	echo '<tr><td>10.1.5.'.$i.'</td><td width="120">'.$arr_dt_101[$i].'</td>';
	echo '<td width="40"><input type="radio" name="no_chapter_10_1_'.($i101+1).'a" value="New" '; if($dt_subchapter_10_1[3]=='New') echo 'checked="checked"'; echo ' /> New</td><td width="50"><input type="radio" name="no_chapter_10_1_'.($i101+1).'a" value="Existing" '; if($dt_subchapter_10_1[3]=='Existing') echo 'checked="checked"'; echo ' /> Existing</td><td>Qty: <span style="padding:0 2px">&nbsp;</span><input type="radio" name="no_chapter_10_1_'.($i101+1).'b" value="1" '; if($dt_subchapter_10_1[4]=='1') echo 'checked="checked"'; echo ' />1 <span style="padding:0 2px">&nbsp;</span><input type="radio" name="no_chapter_10_1_'.($i101+1).'b" value="2" '; if($dt_subchapter_10_1[4]=='2') echo 'checked="checked"'; echo ' /> 2 <span style="padding:0 2px">&nbsp;</span><input type="radio" name="no_chapter_10_1_'.($i101+1).'b" value="3" '; if($dt_subchapter_10_1[4]=='3') echo 'checked="checked"'; echo ' /> 3 <span style="padding:0 2px">&nbsp;</span><input type="radio" name="no_chapter_10_1_'.($i101+1).'b" value="4" '; if($dt_subchapter_10_1[4]=='4') echo 'checked="checked"'; echo ' /> 4 <span style="padding:0 2px">&nbsp;</span><input type="radio" name="no_chapter_10_1_'.($i101+1).'b" value="5" '; if($dt_subchapter_10_1[4]=='5') echo 'checked="checked"'; echo ' /> 5 <span style="padding:0 2px">&nbsp;</span><input type="radio" name="no_chapter_10_1_'.($i101+1).'b" value="6" '; if($dt_subchapter_10_1[4]=='6') echo 'checked="checked"'; echo ' /> 6 <span style="padding:0 2px">&nbsp;</span><input type="radio" name="no_chapter_10_1_'.($i101+1).'b" value="N/A" '; if($dt_subchapter_10_1[4]=='N/A') echo 'checked="checked"'; echo ' /> N/A</td>';
	echo '</tr>';
	$i101++;
}
?>
</table>

<hr />

<center>
    <input type="button" class="button" name="prev" value="Prev" onclick="validasi(8, <?php echo $dx ?>)" />
    &emsp; <input type="reset" class="reset" value="Reset to Default"/> &emsp;
    <input type="button" class="button" name="next" value="Next" onclick="validasi(10, <?php echo $dx ?>)" />
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
		$col_a = 'no_chapter_9_2_'.$i.'a';
		$col_b = 'no_chapter_9_2_'.$i.'b';
		
		$$col_a = kosong($$col_a);
		$$col_b = kosong($$col_b);
		
		if(str_replace('null', 'null', $$col_a.$$col_b)){
			$quest[] = '9@9.2|No|'.$i.'|'.$$col_a.'|'.$$col_b;
		}
	}
	//----------------------------------------------------
	for($i=1; $i<=10; $i++)
	{
		$chp = 'no_chapter_10_'.$i;
		if(isset($$chp)) $quest[] = '10|No|10.'.$i.'|'.$$chp; else { $$chp = "null"; $quest[] = '10|No|10.'.$i.'|'.$$chp; }
	}
	//----------------------------------------------------
	for($i=1; $i<=4; $i++)
	{
		$chp = 'no_chapter_10_1_'.$i;
		if(isset($$chp)) $quest[] = '10@10.1|No|'.$i.'|'.$$chp; else { $$chp = "null"; $quest[] = '10@10.1|No|'.$i.'|'.$$chp; }
	}
	//----------------------------------------------------
	for($i=5; $i<=15; $i++)
	{
		$col_a = 'no_chapter_10_1_'.$i.'a';
		$col_b = 'no_chapter_10_1_'.$i.'b';
		
		$$col_a = kosong($$col_a);
		$$col_b = kosong($$col_b);
		
		if(str_replace('null', 'null', $$col_a.$$col_b)){
			$quest[] = '10@10.1|No|'.$i.'|'.$$col_a.'|'.$$col_b;
		}
	}
}

include 'paging.php';
?>

</body>
</html>