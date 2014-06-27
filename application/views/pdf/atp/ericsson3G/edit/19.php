<?php session_start(); if(empty($_SESSION['isat']['log'])) exit('<script>alert("Session expired, please re-login!");self.close();</script>');if ( ! defined('BASEPATH')) exit('No direct script access allowed'); $Qtit = $this->db->query("SELECT `title` FROM `it_atp` WHERE `atp_id`='$dx'"); $tit = $Qtit->result_object(); $title = $tit[0]->title; ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xml:lang="en" xmlns="http://www.w3.org/1999/xhtml" lang="en">
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
<title>Preload ATP Ericsson 3G (Page 19) - <?php echo $title ?></title>
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
}s
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
<h1>Page 19</h1><br /><br />

<form name="preload3G" method="post" action="">

<?php $Qsubchapter = $this->db->query("SELECT `subno_chapter`, `content` FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `chapter`='17' AND `no_chapter`='17.2' ORDER BY `subno_chapter_order` ASC"); foreach($Qsubchapter->result_object() as $subchapter) $arr_subchapter_17_2[$subchapter->subno_chapter -1]=$subchapter ?>

<h3>Chapter 17.2: RBS External Alarm (Alarm Text = 6 first character of Cell ID + Alarm type)</h3>
<table class="border" cellpadding="0" cellspacing="0">
<?php
$i172b = 6;
$arr_dt_172b = array(6=> 'Arrester Fails', 'Rectifier Main fails', 'Rectifier Module Fails', 'Rectifier Battery fails', 'Genset Working', 'Genset fails', 'Genset Routine Test', 'Spare', 'Spare', 'Spare');
for($i=6; $i <= 15; $i++){
	$dt_subchapter_17_2b = explode('|', $arr_subchapter_17_2[$i172b]->content);
	echo '<tr><td width="40">17.2.'.($i +1).'</td><td width="60" align="center">'.($i +1).'</td><td>'.$arr_dt_172b[$i].'</td>';
	echo '<td width="30" align="center"><input type="radio" name="no_chapter_17_2_'.($i+1).'a" value="OK" '; if($dt_subchapter_17_2b[3]=='OK') echo 'checked="checked"'; echo ' /></td>';
	echo '<td width="40" align="center"><input type="radio" name="no_chapter_17_2_'.($i+1).'a" value="Not OK" '; if($dt_subchapter_17_2b[3]=='Not OK') echo 'checked="checked"'; echo ' /></td>';
	echo '<td width="35" align="center"><input type="radio" name="no_chapter_17_2_'.($i+1).'a" value="N/A" '; if($dt_subchapter_17_2b[3]=='N/A') echo 'checked="checked"'; echo ' /></td>';
	echo '<td  width="150"><input type="text" name="no_chapter_17_2_'.($i+1).'b" value="'.$this->ifunction->ifnulls($dt_subchapter_17_2b[4]).'" /></td></tr>';
	$i172b++;
}
?>
</table>

<hr />

<?php $Qchapter = $this->db->query("SELECT `no_chapter`, `content` FROM `it_atp_chapter` WHERE `atp_id`='$dx' AND `chapter`='18' ORDER BY `atp_chapter_id` ASC"); foreach($Qchapter->result_object() as $chapter) $arr_chapter_18[str_replace('18.', '', $chapter->no_chapter) -1]=$chapter ?>

<table class="border" cellpadding="0" cellspacing="0">
<tr class="header"><td width="40">Chapter</td><td>Title work performed</td><td width="30">OK</td><td width="40">Not OK</td><td width="35">N/A</td><td width="90">Remark</td></tr>
<tr><td valign="top"><b>18</b><br /><br />18.1<br />18.2<br />18.3<br />18.4<br />18.5<br />18.6<br />18.7<br />18.8<br />18.9<br />18.10<br />18.11<br />18.12<br />18.13<br />18.14</td>
<td valign="top"><b>Mobile Originating & Terminating Test Call</b><br />(must be successful)<br />Iub Transport Option<br />Voice Test Call<br />Video Test Call<br />Packet switch Test Call<br />HSPA Test Call<br />Test Actual and PMR Capture Result<br />SMS Test Call<br />MMS Test Call<br />Incoming & Outgoing Hand Over Test<br />Emergency Call (118, 112)<br />IMA Bandwidth Adaptation Test<br />Sync Test for Dual Stack and Native IP configuration<br />OAM Link ATM & IP Connectivity to OSS Test<br />IMA Bandwidth Adaptation Functionality Test</td>
<td valign="top" align="center">
<?php echo '<br />';
echo '<br />';
for($i=0; $i <= 13; $i++){
	echo '<input type="radio" name="no_chapter_18_'.($i+1).'" value="OK" '; if($arr_chapter_18[$i]->content=='OK') echo 'checked="checked"'; echo '><br />';
}
?>
</td><td valign="top" align="center">
<?php echo '<br />';
echo '<br />';
for($i=0; $i <= 13; $i++){
	echo '<input type="radio" name="no_chapter_18_'.($i+1).'" value="Not OK" '; if($arr_chapter_18[$i]->content=='Not OK') echo 'checked="checked"'; echo '><br />';
}
?>
</td><td valign="top" align="center">
<?php echo '<br />';
echo '<br />';
for($i=0; $i <= 13; $i++){
	echo '<input type="radio" name="no_chapter_18_'.($i+1).'" value="N/A" '; if($arr_chapter_18[$i]->content=='N/A') echo 'checked="checked"'; echo '><br />';
}
?>
</td><td valign="top" align="center"><?php echo '<br /><br />'; for($i=0; $i <= 13; $i++) echo 'Major<br />' ?></td></tr>
</table>

<?php $Qsubchapter = $this->db->query("SELECT `subno_chapter`, `content` FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `chapter`='18' AND `no_chapter`='18.1' ORDER BY `subno_chapter_order` ASC"); foreach($Qsubchapter->result_object() as $subchapter) $arr_subchapter_18_1[$subchapter->subno_chapter -1]=$subchapter ?>

<h3>Chapter 18.1: Iub Transport Option</h3>
<table class="border" cellpadding="0" cellspacing="0">
<tr class="header"><td width="60">Items</td><td colspan="2">Transport Option<br />ATM</td><td colspan="2">Transport Option<br />Dual Stack (2E1 or 1E1)</td><td colspan="2">Transport Option<br />Native IP</td><td>Remark</td></tr>
<?php
$arr_dt_181 = array('User Plane', 'Control Plane');
for($i=0; $i <= 1; $i++){
	$dt_subchapter_18_1 = explode('|', $arr_subchapter_18_1[$i]->content);
	echo '<tr><td>'.$arr_dt_181[$i].'</td>';
	echo '<td align="center"><input type="radio" name="no_chapter_18_1_'.($i+1).'a" value="ATM" '; if($dt_subchapter_18_1[3]=='ATM') echo 'checked="checked"'; echo ' /> ATM</td>';
	echo '<td align="center"><input type="radio" name="no_chapter_18_1_'.($i+1).'a" value="IpV4" '; if($dt_subchapter_18_1[3]=='IpV4') echo 'checked="checked"'; echo ' /> IpV4</td>';
	echo '<td align="center"><input type="radio" name="no_chapter_18_1_'.($i+1).'b" value="ATM" '; if($dt_subchapter_18_1[4]=='ATM') echo 'checked="checked"'; echo ' /> ATM</td>';
	echo '<td align="center"><input type="radio" name="no_chapter_18_1_'.($i+1).'b" value="IpV4" '; if($dt_subchapter_18_1[4]=='IpV4') echo 'checked="checked"'; echo ' /> IpV4</td>';
	echo '<td align="center"><input type="radio" name="no_chapter_18_1_'.($i+1).'c" value="ATM" '; if($dt_subchapter_18_1[5]=='ATM') echo 'checked="checked"'; echo ' /> ATM</td>';
	echo '<td align="center"><input type="radio" name="no_chapter_18_1_'.($i+1).'c" value="IpV4" '; if($dt_subchapter_18_1[5]=='IpV4') echo 'checked="checked"'; echo ' /> IpV4</td>';
	echo '<td><input type="text" name="no_chapter_18_1_'.($i+1).'d" value="'.$this->ifunction->ifnulls($dt_subchapter_18_1[6]).'" /></td></tr>';
}
?>
</table>

<hr />

<center>
    <input type="button" class="button" name="prev" value="Prev" onclick="validasi(18, <?php echo $dx ?>)" />
    &emsp; <input type="reset" class="reset" value="Reset to Default"/> &emsp;
    <input type="button" class="button" name="next" value="Next" onclick="validasi(20, <?php echo $dx ?>)" />
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
	
	for($i=7; $i<=16; $i++)
	{
		$col_a = 'no_chapter_17_2_'.$i.'a';
		$col_b = 'no_chapter_17_2_'.$i.'b';
		
		$$col_a = kosong($$col_a);
		$$col_b = kosong($$col_b);
		
		if(str_replace('null', 'null', $$col_a.$$col_b)){
			$quest[] = '17@17.2|No|'.$i.'|'.$$col_a.'|'.$$col_b;
		}
	}
	//----------------------------------------------------
	for($i=1; $i<=14; $i++)
	{
		$chp = 'no_chapter_18_'.$i;
		if(isset($$chp)) $quest[] = '18|No|18.'.$i.'|'.$$chp; else { $$chp = "null"; $quest[] = '18|No|18.'.$i.'|'.$$chp; }
	}
	//----------------------------------------------------
	for($i=1; $i<=2; $i++)
	{
		$col_a = 'no_chapter_18_1_'.$i.'a';
		$col_b = 'no_chapter_18_1_'.$i.'b';
		$col_c = 'no_chapter_18_1_'.$i.'c';
		$col_d = 'no_chapter_18_1_'.$i.'d';
		
		$$col_a = kosong($$col_a);
		$$col_b = kosong($$col_b);
		$$col_c = kosong($$col_c);
		$$col_d = kosong($$col_d);
		
		if(str_replace('null', 'null', $$col_a.$$col_b.$$col_c.$$col_d)){
			$quest[] = '18@18.1|No|'.$i.'|'.$$col_a.'|'.$$col_b.'|'.$$col_c.'|'.$$col_d;
		}
	}
}

include 'paging.php';
?>

</body>
</html>