<?php session_start(); if(empty($_SESSION['isat']['log'])) exit('<script>alert("Session expired, please re-login!");self.close();</script>'); if ( ! defined('BASEPATH')) exit('No direct script access allowed'); $Qtit = $this->db->query("SELECT `title` FROM `it_atp` WHERE `atp_id`='$dx'"); $tit = $Qtit->result_object(); $title = $tit[0]->title; ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xml:lang="en" xmlns="http://www.w3.org/1999/xhtml" lang="en">
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
<title>Preload ATP Ericsson 2G (Page 12) - <?php echo $title ?></title>
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
<h1>Page 12</h1>
<br /><br />

<form name="preload2G" method="post" action="">

<?php $Qsubchapter = $this->db->query("SELECT `subno_chapter`, `content` FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `chapter`='21' AND `no_chapter`='21.2' ORDER BY `subno_chapter_order` ASC"); foreach($Qsubchapter->result_object() as $subchapter) $arr_subchapter_21_2[$subchapter->subno_chapter -1]=$subchapter ?>

<h3>Table 12: DCS 1800 Antenna Diversity Test</h3>
<table class="border" cellpadding="0" cellspacing="0">
<tr class="header">
    <td width="40" rowspan="2">Test No </td>
    <td width="45" rowspan="2">RUG/RUS </td>
    <td rowspan="2">RX Diversity Parameter (0 +/- 3 dB) SSI RXA - SSI RXB</td>
    <td colspan="3">Status</td>
    <td rowspan="2">Remark</td>
</tr>
<tr class="header">
    <td width="30">OK</td>
    <td width="40">Not OK</td>
    <td width="35">N/A</td>
</tr>
<?php
for($i=0; $i <= 23; $i++){
	$dt_subchapter_21_2 = explode('|', $arr_subchapter_21_2[$i]->content);
	echo '<tr><td>21.2.'.($i +1).'</td><td align="center">TRX - '.($i +1).'</td>';
	echo '<td><input type="text" name="no_chapter_21_2_'.($i+1).'a" value="'.$this->ifunction->ifnulls($dt_subchapter_21_2[4]).'" /></td>';
	echo '<td align="center"><input type="radio" name="no_chapter_21_2_'.($i+1).'b" value="OK" ';  if($dt_subchapter_21_2[3]=='OK') echo 'checked="checked"'; echo ' /></td>';
	echo '<td align="center"><input type="radio" name="no_chapter_21_2_'.($i+1).'b" value="Not OK" ';  if($dt_subchapter_21_2[3]=='Not OK') echo 'checked="checked"'; echo ' /></td>';
	echo '<td align="center"><input type="radio" name="no_chapter_21_2_'.($i+1).'b" value="N/A" ';  if($dt_subchapter_21_2[3]=='N/A') echo 'checked="checked"'; echo ' /></td>';
	echo '<td><input type="text" name="no_chapter_21_2_'.($i+1).'c" value="'.$this->ifunction->ifnulls($dt_subchapter_21_2[5]).'" /></td></tr>';
}
?>
</table>
<p style="font-size:11px"><i>Note: SSI = Signal Strength Imbalance</i></p>

<?php $Qchapter = $this->db->query("SELECT `no_chapter`, `content` FROM `it_atp_chapter` WHERE `atp_id`='$dx' AND `chapter`='22' ORDER BY `atp_chapter_id` ASC"); foreach($Qchapter->result_object() as $chapter) $arr_chapter_22[str_replace('22.', '', $chapter->no_chapter) -1]=$chapter ?>

<table class="border" cellpadding="0" cellspacing="0">
<tr class="header"><td width="40">Chapter</td><td>Title work performed</td><td width="30">OK</td><td width="40">Not OK</td><td width="35">N/A</td><td width="90">Remark</td></tr>
<tr><td valign="top"><b>22</b><br /><br />22.1<br /><br />22.2</td><td valign="top"><b>RUG / RUS Output power & VSWR (direct connection to antenna)</b><br />DRU / RUG /RUS Output power & VSWR Test use OMT - GSM 900<br />DRU / RUG / RUS Output power & VSWR Test use OMT - DCS 1800</td>
<td valign="top" align="center">
<?php echo '<br /><br />';
for($i=0; $i <= 1; $i++){
    echo '<input type="radio" name="no_chapter_22_'.($i+1).'" value="OK"'; if($arr_chapter_22[$i]->content=='OK') echo 'checked="checked"'; echo ' /><br />';
    if($i==0) echo '<br />';
}
?>
</td><td valign="top" align="center">
<?php echo '<br /><br />';
for($i=0; $i <= 1; $i++){
    echo '<input type="radio" name="no_chapter_22_'.($i+1).'" value="Not OK"'; if($arr_chapter_22[$i]->content=='Not OK') echo 'checked="checked"'; echo ' /><br />';
    if($i==0) echo '<br />';
}
?>
</td><td valign="top" align="center">
<?php echo '<br /><br />';
for($i=0; $i <= 1; $i++){
    echo '<input type="radio" name="no_chapter_22_'.($i+1).'" value="N/A"'; if($arr_chapter_22[$i]->content=='N/A') echo 'checked="checked"'; echo ' /><br />';
    if($i==0) echo '<br />';
}
?>
</td><td valign="top" align="center"><br /><br />Major<br /><br />Major</td></tr>
</table>

<hr />

<center>
	<input type="button" class="button"  name="prev" value="Prev" onclick="validasi(11,'<?php echo $dx; ?>');" />
    <!--<input type="submit" class="button" name="prev" value="Prev" />-->
    &emsp;
    <input type="reset" class="reset" value="Reset to Default"/>
    &emsp;
    <input type="button" class="button" name="next" value="Next" onclick="validasi(13,'<?php echo $dx; ?>');" />
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
		
		for($i=1; $i<=24; $i++)
		{
			$col_a = 'no_chapter_21_2_'.$i.'a';
			$col_b = 'no_chapter_21_2_'.$i.'b';
			$col_c = 'no_chapter_21_2_'.$i.'c';
			
			$$col_a = kosong($$col_a);
			$$col_b = kosong($$col_b);
			$$col_c = kosong($$col_c);
			
			if(str_replace('null' , '', $$col_a.$$col_b.$$col_c))
			{
				$quest[] = '21@21.2|No|'.$i.'|'.$$col_b.'|'.$$col_a.'|'.$$col_c;
			}
		}
		//----------------------------------------------------		
		for($i=1; $i<=2; $i++)
		{
			$chp = 'no_chapter_22_'.$i;
			if(isset($$chp)) $quest[] = '22|No|22.'.$i.'|'.$$chp;
		}
	}	
	include 'paging.php'; 
?>
</body>
</html>