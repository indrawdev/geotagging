<?php session_start(); if(empty($_SESSION['isat']['log'])) exit('<script>alert("Session expired, please re-login!");self.close();</script>'); if ( ! defined('BASEPATH')) exit('No direct script access allowed'); $Qtit = $this->db->query("SELECT `title` FROM `it_atp` WHERE `atp_id`='$dx'"); $tit = $Qtit->result_object(); $title = $tit[0]->title; ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xml:lang="en" xmlns="http://www.w3.org/1999/xhtml" lang="en">
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
<title>Preload ATP Ericsson 2G (Page 7) - <?php echo $title ?></title>
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
<h1>Page 7</h1>
<br /><br />

<form name="preload2G" method="post" action="">

<p style="font-size:11px"><i>Note: <br />Test no 13.2.1 - 13.2.8 mandatory for BTS: End Site & Hub Site<br />Test no 13.2.9 - 13.2.15 mandatory for BTS: Hub Site<br />Test no 13.2.16 mandatory for BTS: equipped with OVP.<br />Testing should be conducted directly to external alarm sensor.</i></p>

<hr />

<?php $Qchapter = $this->db->query("SELECT `no_chapter`, `content` FROM `it_atp_chapter` WHERE `atp_id`='$dx' AND `chapter`='15' ORDER BY `atp_chapter_id` ASC"); foreach($Qchapter->result_object() as $chapter) $arr_chapter_15[str_replace('15.', '', $chapter->no_chapter) -1]=$chapter ?>

<table class="border" cellpadding="0" cellspacing="0">
<tr class="header"><td width="40">Chapter</td><td>Title work performed</td><td width="30">OK</td><td width="40">Not OK</td><td width="35">N/A</td><td width="90">Remark</td></tr>
<tr><td valign="top"><b>15</b><br />15.1<br />15.2<br />15.3<br />15.4</td><td valign="top"><b>Abis Path / PCM Port Connection status using OMT</b><br />RBS1 / RBS2 PCM-A Port Connection<br />RBS1 / RBS2 PCM-B Port Connection<br />RBS1 / RBS2 PCM-C Port Connection<br />RBS1 / RBS2 PCM-D Port Connection</td>
<td valign="top" align="center">
<?php echo '<br />';
for($i=0; $i <= 3; $i++){
    echo '<input type="radio" name="no_chapter_15_'.($i+1).'" value="OK"'; if($arr_chapter_15[$i]->content=='OK') echo 'checked="checked"'; echo ' /><br />';
}
?>
</td><td valign="top" align="center">
<?php echo '<br />';
for($i=0; $i <= 3; $i++){
    echo '<input type="radio" name="no_chapter_15_'.($i+1).'" value="Not OK"'; if($arr_chapter_15[$i]->content=='Not OK') echo 'checked="checked"'; echo ' /><br />';
}
?>
</td><td valign="top" align="center">
<?php echo '<br />';
for($i=0; $i <= 3; $i++){
    echo '<input type="radio" name="no_chapter_15_'.($i+1).'" value="N/A"'; if($arr_chapter_15[$i]->content=='N/A') echo 'checked="checked"'; echo ' /><br />';
}
?>
</td><td valign="top" align="center"><br />Major<br />Major<br />Major<br />Major</td></tr>
</table><br />

<?php $Qchapter = $this->db->query("SELECT `no_chapter`, `content` FROM `it_atp_chapter` WHERE `atp_id`='$dx' AND `chapter`='16' ORDER BY `atp_chapter_id` ASC"); foreach($Qchapter->result_object() as $chapter) $arr_chapter_16[str_replace('16.', '', $chapter->no_chapter) -1]=$chapter ?>

<table class="border" cellpadding="0" cellspacing="0">
<tr class="header"><td width="40">Chapter</td><td>Title work performed</td><td width="30">OK</td><td width="40">Not OK</td><td width="35">N/A</td><td width="90">Remark</td></tr>
<tr><td valign="top"><b>16</b><br />16.1<br />16.2<br />16.3<br />16.4</td><td valign="top"><b>Checking the transmission parameter of RBS1 /RBS2</b><br />RBLT allocation On BSC<br />Type of LAPD (Link Access Protocol on D channel)<br />Network Topology<br />Synchronize source<br />Receiver sensitivity</td>
<td valign="top" align="center">
<?php echo '<br />';
for($i=0; $i <= 3; $i++){
    echo '<input type="radio" name="no_chapter_16_'.($i+1).'" value="OK"'; if($arr_chapter_16[$i]->content=='OK') echo 'checked="checked"'; echo ' /><br />';
}
?>
</td><td valign="top" align="center">
<?php echo '<br />';
for($i=0; $i <= 3; $i++){
    echo '<input type="radio" name="no_chapter_16_'.($i+1).'" value="Not OK"'; if($arr_chapter_16[$i]->content=='Not OK') echo 'checked="checked"'; echo ' /><br />';
}
?>
</td><td valign="top" align="center">
<?php echo '<br />';
for($i=0; $i <= 3; $i++){
    echo '<input type="radio" name="no_chapter_16_'.($i+1).'" value="N/A"'; if($arr_chapter_16[$i]->content=='N/A') echo 'checked="checked"'; echo ' /><br />';
}
?>
</td><td valign="top" align="center"><?php echo '<br />'; for($i=0; $i <= 3; $i++) echo 'Major<br />' ?></td></tr>
</table><br />

<?php $Qchapter = $this->db->query("SELECT `no_chapter`, `content` FROM `it_atp_chapter` WHERE `atp_id`='$dx' AND `chapter`='17' ORDER BY `atp_chapter_id` ASC"); foreach($Qchapter->result_object() as $chapter) $arr_chapter_17[str_replace('17.', '', $chapter->no_chapter) -1]=$chapter ?>

<table class="border" cellpadding="0" cellspacing="0">
<tr class="header"><td width="40">Chapter</td><td>Title work performed</td><td width="30">OK</td><td width="40">Not OK</td><td width="35">N/A</td><td width="90">Remark</td></tr>
<tr><td valign="top"><b>17</b><br />17.1<br />17.2</td><td valign="top"><b>Checking time slot occupation</b><br />Time Slot Occupation GSM 900<br />Time Slot Occupation DCS 1800</td>
<td valign="top" align="center">
<?php echo '<br />';
for($i=0; $i <= 1; $i++){
    echo '<input type="radio" name="no_chapter_17_'.($i+1).'" value="OK"'; if($arr_chapter_17[$i]->content=='OK') echo 'checked="checked"'; echo ' /><br />';
}
?>
</td><td valign="top" align="center">
<?php echo '<br />';
for($i=0; $i <= 1; $i++){
    echo '<input type="radio" name="no_chapter_17_'.($i+1).'" value="Not OK"'; if($arr_chapter_17[$i]->content=='Not OK') echo 'checked="checked"'; echo ' /><br />';
}
?>
</td><td valign="top" align="center">
<?php echo '<br />';
for($i=0; $i <= 1; $i++){
    echo '<input type="radio" name="no_chapter_17_'.($i+1).'" value="N/A"'; if($arr_chapter_17[$i]->content=='N/A') echo 'checked="checked"'; echo ' /><br />';
}
?>
</td><td valign="top" align="center"><?php echo '<br />'; for($i=0; $i <= 1; $i++) echo 'Major<br />' ?></td></tr>
</table>
<p style="font-size:11px"><i>RX Q: Rx quality (0 - 7)<br />RX Lev: RX level --Tolerance -63 dBm ± 8 dB <br />(Rx Lev reference values refer to EN/LZT 1232683)</i></p>

<center>
	<input type="button" class="button"  name="prev" value="Prev" onclick="validasi(6,'<?php echo $dx; ?>');" />
    <!--<input type="submit" class="button" name="prev" value="Prev" />-->
    &emsp;
    <input type="reset" class="reset" value="Reset to Default"/>
    &emsp;
    <input type="button" class="button" name="next" value="Next" onclick="validasi(8,'<?php echo $dx; ?>');" />
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
	
	for($i=1; $i<=4; $i++)
	{
		$chp = 'no_chapter_15_'.$i;
		if(isset($$chp)) $quest[] = '15|No|15.'.$i.'|'.$$chp;
	}		
	//----------------------------------------------------		
	for($i=1; $i<=4; $i++)
	{
		$chp = 'no_chapter_16_'.$i;
		if(isset($$chp)) $quest[] = '16|No|16.'.$i.'|'.$$chp;
	}		
	//----------------------------------------------------
	for($i=1; $i<=2; $i++)
	{
		$chp = 'no_chapter_17_'.$i;
		if(isset($$chp)) $quest[] = '17|No|17.'.$i.'|'.$$chp;
	}	
}	
include 'paging.php'; 
?>
</body>
</html>