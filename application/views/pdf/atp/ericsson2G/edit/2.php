<?php session_start(); if(empty($_SESSION['isat']['log'])) exit('<script>alert("Session expired, please re-login!");self.close();</script>'); if ( ! defined('BASEPATH')) exit('No direct script access allowed'); $Qtit = $this->db->query("SELECT `title` FROM `it_atp` WHERE `atp_id`='$dx'"); $tit = $Qtit->result_object(); $title = $tit[0]->title; ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xml:lang="en" xmlns="http://www.w3.org/1999/xhtml" lang="en">
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
<title>Preload ATP Ericsson 2G (Page 2) - <?php echo $title ?></title>
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
<h1>Page 2</h1>
<br /><br />

<form name="preload2G" method="post" action="">


<?php
$Qchapter = $this->db->query("SELECT `no_chapter`, `content` FROM `it_atp_chapter` WHERE `atp_id`='$dx' AND `chapter`='1' ORDER BY `atp_chapter_id` ASC");
foreach($Qchapter->result_object() as $chapter){
	
	$in = str_replace('1.', '', $chapter->no_chapter);
	
	$arr_chapter_1[$in -1]=$chapter;
	/*if(in_array($in, array('6.1', '6.2', '6.3', '6.4'), true)){
		$arr_chapter_1[str_replace('6.', '', $in) +4]=$chapter;
	}
	elseif($in == 7){
		$arr_chapter_1[9]=$chapter;
	}
	else $arr_chapter_1[$in -1]=$chapter;*/
}
?>

<h3>A. Preliminary checks</h3>
<table class="border" cellpadding="0" cellspacing="0">
<tr class="header"><td width="40">Chapter</td><td>Title work performed</td><td width="30">OK</td><td width="40">Not OK</td><td width="35">N/A</td><td width="90">Remark</td></tr>
<tr><td valign="top"><b>1</b><br />1.1<br /><br />1.2<br />1.3<br />1.4<br />1.5<br />1.6<br />1.6.1<br />1.6.2<br /><br />1.6.3<br />1.6.4<br />1.7</td>
<td valign="top"><b>Preliminary site checks</b><br />CME Site Acceptance has been approved (the document must be attached)<br />Site documentation must be available<br />Commissioning check list should be attached<br />NIB (Network implementation binder) / Installation Binder<br />Link (E1) Preparation already done<br />Before starting (on arrival at the site)<br />&bull; Check engineer's certificate of competency level<br />&bull; Check tools and equipment (completeness and calibrated with valid certificate). All equipment must be provided by vendor<br />&bull; For swap out cases, dummy load must be available<br />&bull; Document MOP and ATP must be available<br />BOQ fill with feature information activation (such as MCPA_IPM, MCCCH, Edge, Abis optimizer, RUS Configuration)</td>
<td valign="top" align="center">
<?php echo '<br />';
for($i=0; $i <= 9; $i++){
    echo '<input type="radio" name="no_chapter_1.'.($i+1).'" value="OK"'; if($arr_chapter_1[$i]->content=='OK') echo 'checked="checked"'; echo ' /><br />';
    if(($i==0)||($i==4)||($i==6)) echo '<br />';
}
?>
</td>
<td valign="top" align="center">
<?php echo '<br />';
for($i=0; $i <= 9; $i++){
    echo '<input type="radio" name="no_chapter_1.'.($i+1).'" value="Not OK"'; if($arr_chapter_1[$i]->content=='Not OK') echo 'checked="checked"'; echo ' /><br />';
    if(($i==0)||($i==4)||($i==6)) echo '<br />';
}
?></td>
<td valign="top" align="center">
<?php echo '<br />';
for($i=0; $i <= 9; $i++){
    echo '<input type="radio" name="no_chapter_1.'.($i+1).'" value="N/A"'; if($arr_chapter_1[$i]->content=='N/A') echo 'checked="checked"'; echo ' /><br />';
    if(($i==0)||($i==4)||($i==6)) echo '<br />';
}
?></td>
<td valign="top" align="center">
<?php echo '<br />';
for($i=0; $i <= 9; $i++){
    echo 'Major<br />';
    if(($i==0)||($i==4)||($i==6)) echo '<br />';
}
?>
</td></tr>
</table>

<?php $Qchapter = $this->db->query("SELECT `no_chapter`, `content` FROM `it_atp_chapter` WHERE `atp_id`='$dx' AND `chapter`='2' ORDER BY `atp_chapter_id` ASC"); foreach($Qchapter->result_object() as $chapter) $arr_chapter_2[str_replace('2.', '', $chapter->no_chapter) -1]=$chapter ?>

<table class="border" cellpadding="0" cellspacing="0">
<tr>
    <td valign="top" width="40"><b>2</b></td>
    <td valign="top"><b>Checking HW configuration visually</b><br />(Compare with equipment order list attachment which is based on Site Documentation, NIB or Planning recommendation)</td>
    <td valign="top" width="30" align="center"><br /><input type="radio" name="no_chapter_2.1" value="OK" <?php if($arr_chapter_2[0]->content=='OK') echo 'checked="checked"' ?> /></td>
    <td valign="top" width="40" align="center"><br /><input type="radio" name="no_chapter_2.1" value="Not OK" <?php if($arr_chapter_2[0]->content=='Not OK') echo 'checked="checked"' ?> /></td>
    <td valign="top" width="35" align="center"><br /><input type="radio" name="no_chapter_2.1" value="N/A" <?php if($arr_chapter_2[0]->content=='N/A') echo 'checked="checked"' ?> /></td>
    <td valign="top" width="90" align="center"><br />Major</td>
</tr>
</table>

<?php $Qchapter = $this->db->query("SELECT `no_chapter`, `content` FROM `it_atp_chapter` WHERE `atp_id`='$dx' AND `chapter`='3' ORDER BY `atp_chapter_id` ASC"); foreach($Qchapter->result_object() as $chapter) $arr_chapter_3[str_replace('3.', '', $chapter->no_chapter) -1]=$chapter ?>

<table class="border" cellpadding="0" cellspacing="0">
<tr><td width="40" valign="top"><b>3</b><br />3.1<br />3.2<br />3.3<br />3.4<br />3.5<br />3.6</td>
<td valign="top"><b>Checking on labelling</b><br />Check label module (serial number, technical status)<br />Check RBS rack label<br />Check DDF label (end to end site)<br />Check power supply label<br />Check feeder cable label (for antenna sector)<br />Check Antenna label</td>
<td valign="top" width="30" align="center">
<?php echo '<br />';
for($i=0; $i <= 5; $i++){
    echo '<input type="radio" name="no_chapter_3.'.($i+1).'" value="OK"'; if($arr_chapter_3[$i]->content=='OK') echo 'checked="checked"'; echo ' /><br />';
}
?></td>
<td valign="top" width="40" align="center">
<?php echo '<br />';
for($i=0; $i <= 5; $i++){
    echo '<input type="radio" name="no_chapter_3.'.($i+1).'" value="Not OK"'; if($arr_chapter_3[$i]->content=='Not OK') echo 'checked="checked"'; echo ' /><br />';
}
?>
</td><td valign="top" width="35" align="center">
<?php echo '<br />';
for($i=0; $i <= 5; $i++){
    echo '<input type="radio" name="no_chapter_3.'.($i+1).'" value="N/A"'; if($arr_chapter_3[$i]->content=='N/A') echo 'checked="checked"'; echo ' /><br />';
}
?>
</td><td width="90" valign="top" align="center"><?php echo '<br />'; for($i=0; $i <= 5; $i++) echo 'Major<br />' ?></td></tr>
</table>

<?php $Qchapter = $this->db->query("SELECT `no_chapter`, `content` FROM `it_atp_chapter` WHERE `atp_id`='$dx' AND `chapter`='4' ORDER BY `atp_chapter_id` ASC"); foreach($Qchapter->result_object() as $chapter) $arr_chapter_4[str_replace('4.', '', $chapter->no_chapter) -1]=$chapter ?>

<table class="border" cellpadding="0" cellspacing="0">
<tr>
    <td valign="top" width="40"><b>4</b></td>
    <td valign="top"><b>Checking grounding integration (visual checking)</b><br />Grounding RBS (proper connection and integration)</td>
    <td valign="top" width="30" align="center"><br /><input type="radio" name="no_chapter_4.1" value="OK" <?php if($arr_chapter_4[0]->content=='OK') echo 'checked="checked"' ?> /></td>
    <td valign="top" width="40" align="center"><br /><input type="radio" name="no_chapter_4.1" value="Not OK" <?php if($arr_chapter_4[0]->content=='Not OK') echo 'checked="checked"' ?> /></td>
    <td valign="top" width="35" align="center"><br /><input type="radio" name="no_chapter_4.1" value="N/A" <?php if($arr_chapter_4[0]->content=='N/A') echo 'checked="checked"' ?> /></td>
    <td valign="top" width="90" align="center"><br />Major</td>
</tr>
</table>

<center>
	<input type="button" class="button"  name="prev" value="Prev" onclick="validasi(1, '<?php echo $dx; ?>');" />
    <!--<input type="submit" class="button" name="prev" value="Prev" />-->
    &emsp;
    <input type="reset" class="reset" value="Reset to Default"/>
    &emsp;
    <input type="button" class="button" name="next" value="Next" onclick="validasi(3, '<?php echo $dx; ?>');" />
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
	
	for($i=1; $i<=5; $i++)
	{
		$chp = 'no_chapter_1_'.$i;
		if(isset($$chp)) $quest[] = '1|No|1.'.$i.'|'.$$chp;
	}
	
	for($i=1; $i<=4; $i++)
	{
		$chp = 'no_chapter_1_'.($i+5);
		if(isset($$chp)) $quest[] = '1|No|1.6.'.$i.'|'.$$chp;
	}
	
	if(isset($no_chapter_1_10)) $quest[] = '1|No|1.7|'.$no_chapter_1_10;
	if(isset($no_chapter_2_1)) $quest[] = '2|No|2.1|'.$no_chapter_2_1;
	
	for($i=1; $i<=6; $i++)
	{
		$chp = 'no_chapter_3_'.$i;
		if(isset($$chp)) $quest[] = '3|No|3.'.$i.'|'.$$chp;
	}
		
	if(isset($no_chapter_4_1)) $quest[] = "4|No|4.1|".$no_chapter_4_1;
}
include 'paging.php'; 
?>
</body>
</html>