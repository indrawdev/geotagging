<?php session_start(); if(empty($_SESSION['isat']['log'])) exit('<script>alert("Session expired, please re-login!");self.close();</script>'); if ( ! defined('BASEPATH')) exit('No direct script access allowed'); $Qtit = $this->db->query("SELECT `title` FROM `it_atp` WHERE `atp_id`='$dx'"); $tit = $Qtit->result_object(); $title = $tit[0]->title; ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xml:lang="en" xmlns="http://www.w3.org/1999/xhtml" lang="en">
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
<title>Preload ATP Ericsson 2G (Page 4) - <?php echo $title ?></title>
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
</style>
</head>

<body>

<h2>Preload ATP Ericsson 2G</h2>
<h1>Page 4</h1>
<br /><br />

<form name="preload2G" method="post" action="">

<?php $Qchapter = $this->db->query("SELECT `no_chapter`, `content` FROM `it_atp_chapter` WHERE `atp_id`='$dx' AND `chapter`='7' ORDER BY `atp_chapter_id` ASC"); foreach($Qchapter->result_object() as $chapter) $arr_chapter_7[str_replace('7.', '', $chapter->no_chapter) -1]=$chapter ?>

<table class="border" cellpadding="0" cellspacing="0">
<tr class="header"><td width="40">Chapter</td><td>Title work performed</td><td width="30">OK</td><td width="40">Not OK</td><td width="35">N/A</td><td width="90">Remark</td></tr>
<tr><td valign="top"><b>7</b><br />7.1<br />7.2<br />7.3<br />7.4</td><td valign="top"><b>Checking Climate System Installation</b><br />Check Climate system Model (Should be Extended)*<br />Check Functionality of each Fan<br />Check cabinet temperature<br />Check completeness climate system installation</td>
<td valign="top" align="center">
<?php echo '<br />';
for($i=0; $i <= 3; $i++){
    echo '<input type="radio" name="no_chapter_7.'.($i+1).'" value="OK"'; if($arr_chapter_7[$i]->content=='OK') echo 'checked="checked"'; echo ' /><br />';
}
?>
</td><td valign="top" align="center">
<?php echo '<br />';
for($i=0; $i <= 3; $i++){
    echo '<input type="radio" name="no_chapter_7.'.($i+1).'" value="Not OK"'; if($arr_chapter_7[$i]->content=='Not OK') echo 'checked="checked"'; echo ' /><br />';
}
?>
</td><td valign="top" align="center">
<?php echo '<br />';
for($i=0; $i <= 3; $i++){
    echo '<input type="radio" name="no_chapter_7.'.($i+1).'" value="N/A"'; if($arr_chapter_7[$i]->content=='N/A') echo 'checked="checked"'; echo ' /><br />';
}
?>
</td><td valign="top" align="center"><?php echo '<br />'; for($i=0; $i <= 3; $i++) echo 'Major<br />' ?></td></tr>
</table>
<p style="font-size:11px">Note: Extended: Internal Fan 4 units, External Fan 6 units</p>

<hr />

<h3>B. Preparing RBS for Acceptance /Stand alone test</h3>

<?php $Qchapter = $this->db->query("SELECT `no_chapter`, `content` FROM `it_atp_chapter` WHERE `atp_id`='$dx' AND `chapter`='8' ORDER BY `atp_chapter_id` ASC"); foreach($Qchapter->result_object() as $chapter) $arr_chapter_8[str_replace('8.', '', $chapter->no_chapter) -1]=$chapter ?>

<table class="border" cellpadding="0" cellspacing="0">
<tr class="header"><td width="40">Chapter</td><td>Title work performed</td><td width="30">OK</td><td width="40">Not OK</td><td width="35">N/A</td><td width="90">Remark</td></tr>
<tr><td valign="top"><b>8</b><br />8.1<br />8.2</td><td valign="top"><b>Software and database Used</b><br />BTS Software<br />OMT Software version</td>
<td valign="top" align="center">
<?php echo '<br />';
for($i=0; $i <= 1; $i++){
    echo '<input type="radio" name="no_chapter_8.'.($i+1).'" value="OK"'; if($arr_chapter_8[$i]->content=='OK') echo 'checked="checked"'; echo ' /><br />';
}
?>
</td><td valign="top" align="center">
<?php echo '<br />';
for($i=0; $i <= 1; $i++){
    echo '<input type="radio" name="no_chapter_8.'.($i+1).'" value="Not OK"'; if($arr_chapter_8[$i]->content=='Not OK') echo 'checked="checked"'; echo ' /><br />';
}
?>
</td><td valign="top" align="center">
<?php echo '<br />';
for($i=0; $i <= 1; $i++){
    echo '<input type="radio" name="no_chapter_8.'.($i+1).'" value="N/A"'; if($arr_chapter_8[$i]->content=='N/A') echo 'checked="checked"'; echo ' /><br />';
}
?>
</td><td valign="top" align="center"><br />Major<br />Major</td></tr>
</table><br />

<?php $Qchapter = $this->db->query("SELECT `no_chapter`, `content` FROM `it_atp_chapter` WHERE `atp_id`='$dx' AND `chapter`='9' ORDER BY `atp_chapter_id` ASC"); foreach($Qchapter->result_object() as $chapter) $arr_chapter_9[str_replace('9.', '', $chapter->no_chapter) -1]=$chapter ?>

<table class="border" cellpadding="0" cellspacing="0">
<tr class="header"><td width="40">Chapter</td><td>Title work performed</td><td width="30">OK</td><td width="40">Not OK</td><td width="35">N/A</td><td width="90">Remark</td></tr>
<tr><td valign="top"><b>9</b><br />9.1<br /><br />9.2</td><td valign="top"><b>RBS Restart</b><br />Check all Hardware Technical Status before RBS restart (All alarm must be clear)<br />Check all Hardware Technical Status after RBS restart (All Alarm must be cleared)</td>
<td valign="top" align="center">
<?php echo '<br />';
for($i=0; $i <= 1; $i++){
    echo '<input type="radio" name="no_chapter_9.'.($i+1).'" value="OK"'; if($arr_chapter_9[$i]->content=='OK') echo 'checked="checked"'; echo ' /><br />';
    if($i==0) echo '<br />';
}
?>
</td><td valign="top" align="center">
<?php echo '<br />';
for($i=0; $i <= 1; $i++){
    echo '<input type="radio" name="no_chapter_9.'.($i+1).'" value="Not OK"'; if($arr_chapter_9[$i]->content=='Not OK') echo 'checked="checked"'; echo ' /><br />';
    if($i==0) echo '<br />';
}
?>
</td><td valign="top" align="center">
<?php echo '<br />';
for($i=0; $i <= 1; $i++){
    echo '<input type="radio" name="no_chapter_9.'.($i+1).'" value="N/A"'; if($arr_chapter_9[$i]->content=='N/A') echo 'checked="checked"'; echo ' /><br />';
    if($i==0) echo '<br />';
}
?>
</td><td valign="top" align="center"><br />Major<br /><br />Major</td></tr>
</table>

<h3>C. Test should be done when RBS is integrated</h3>

<?php $Qchapter = $this->db->query("SELECT `no_chapter`, `content` FROM `it_atp_chapter` WHERE `atp_id`='$dx' AND `chapter`='10' ORDER BY `atp_chapter_id` ASC"); foreach($Qchapter->result_object() as $chapter) $arr_chapter_10[str_replace('10.', '', $chapter->no_chapter) -1]=$chapter ?>

<table class="border" cellpadding="0" cellspacing="0">
<tr class="header"><td width="40">Chapter</td><td>Title work performed</td><td width="30">OK</td><td width="40">Not OK</td><td width="35">N/A</td><td width="90">Remark</td></tr>
<tr><td valign="top"><b>10</b><br />10.1</td><td valign="top"><b>Checking Downloading software status</b><br />Downloading Software Status<br />OMCR -> RXMOP: MO=RXOCF-XX; command printout from the BSC.<br />(The value of NEGSTATUS parameter should be Successful)</td>
<td valign="top" align="center"><br /><br /><input type="radio" name="no_chapter_10.1" value="OK" <?php if($arr_chapter_10[0]->content=='OK') echo 'checked="checked"' ?> /></td>
<td valign="top" align="center"><br /><br /><input type="radio" name="no_chapter_10.1" value="Not OK" <?php if($arr_chapter_10[0]->content=='Not OK') echo 'checked="checked"' ?> /></td>
<td valign="top" align="center"><br /><br /><input type="radio" name="no_chapter_10.1" value="N/A" <?php if($arr_chapter_10[0]->content=='N/A') echo 'checked="checked"' ?> /></td>
<td valign="top" align="center"><br /><br />Minor</td>
</tr></table><br />

<?php $Qchapter = $this->db->query("SELECT `no_chapter`, `content` FROM `it_atp_chapter` WHERE `atp_id`='$dx' AND `chapter`='11' ORDER BY `atp_chapter_id` ASC"); foreach($Qchapter->result_object() as $chapter) $arr_chapter_11[str_replace('11.', '', $chapter->no_chapter) -1]=$chapter ?>

<table class="border" cellpadding="0" cellspacing="0">
<tr class="header"><td width="40">Chapter</td><td>Title work performed</td><td width="30">OK</td><td width="40">Not OK</td><td width="35">N/A</td><td width="90">Remark</td></tr>
<tr><td valign="top"><b>11</b><br /><br /><br />11.1</td><td valign="top"><b>Checking Hardware Technical Status and Configuration, by comparing site configuration from the OMC-R</b><br />Against actual site configuration.<br />Hardware Technical Status & Configuration<br />OMCR -> RXCDP command printout from the BSC<br />(Actual Data from site and OMC-R must be the same)</td>
<td valign="top" align="center"><br /><br /><br /><input type="radio" name="no_chapter_11_1" value="OK" <?php if($arr_chapter_11[0]->content=='OK') echo 'checked="checked"' ?> /></td>
<td valign="top" align="center"><br /><br /><br /><input type="radio" name="no_chapter_11_1" value="Not OK" <?php if($arr_chapter_11[0]->content=='Not OK') echo 'checked="checked"' ?> /></td>
<td valign="top" align="center"><br /><br /><br /><input type="radio" name="no_chapter_11_1" value="N/A" <?php if($arr_chapter_11[0]->content=='N/A') echo 'checked="checked"' ?> /></td>
<td valign="top" align="center"><br /><br /><br />Minor</td>
</tr></table>

<hr />

<center>
	<input type="button" class="button"  name="prev" value="Prev" onclick="validasi(3,'<?php echo $dx; ?>');" />
    <!--<input type="submit" class="button" name="prev" value="Prev" />-->
    &emsp;
    <input type="reset" class="reset" value="Reset to Default"/>
    &emsp;
    <input type="button" class="button" name="next" value="Next" onclick="validasi(5,'<?php echo $dx; ?>');" />
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
		$chp = 'no_chapter_7_'.$i;
		if(isset($$chp)) $quest[] = '7|No|7.'.$i.'|'.$$chp;
	}
	//----------------------------------------------------
	for($i=1; $i<=2; $i++)
	{
		$chp = 'no_chapter_8_'.$i;
		if(isset($$chp)) $quest[] = '8|No|8.'.$i.'|'.$$chp;
	}
	//----------------------------------------------------
	for($i=1; $i<=2; $i++)
	{
		$chp = 'no_chapter_9_'.$i;
		if(isset($$chp)) $quest[] = '9|No|9.'.$i.'|'.$$chp;
	}
	//----------------------------------------------------
	if(isset($no_chapter_10_1)) $quest[] = "10|No|10.1|".$no_chapter_10_1;		
	if(isset($no_chapter_11_1)) $quest[] = "11|No|11.1|".$no_chapter_11_1;
}
include 'paging.php'; 
?>
</body>
</html>