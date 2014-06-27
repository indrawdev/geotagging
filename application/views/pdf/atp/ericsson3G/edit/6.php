<?php session_start(); if(empty($_SESSION['isat']['log'])) exit('<script>alert("Session expired, please re-login!");self.close();</script>');if ( ! defined('BASEPATH')) exit('No direct script access allowed'); $Qtit = $this->db->query("SELECT `title` FROM `it_atp` WHERE `atp_id`='$dx'"); $tit = $Qtit->result_object(); $title = $tit[0]->title; ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xml:lang="en" xmlns="http://www.w3.org/1999/xhtml" lang="en">
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
<title>Preload ATP Ericsson 3G (Page 6) - <?php echo $title ?></title>
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
<h1>Page 6</h1><br /><br />

<form name="preload3G" method="post" action="">

<?php $Qsubchapter = $this->db->query("SELECT `subno_chapter`, `content` FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `chapter`='6' AND `no_chapter`='6.8' ORDER BY `subno_chapter_order` ASC"); foreach($Qsubchapter->result_object() as $subchapter) $arr_subchapter_6_8[$subchapter->subno_chapter -1]=$subchapter ?>

<h3>Chapter 6.8: Qos Configuration Settings</h3>
<table class="border" cellpadding="0" cellspacing="0">
<tr class="header"><td colspan="6">QoS Transport Network Configuration</td><td colspan="3">Conf. Settings</td></tr>
<tr class="header"><td width="100">Category</td><td width="40">Traffic Type</td><td>WCDMA Traffic Type</td><td width="40">Traffic Class</td><td  width="35">DSCP</td><td width="35">Pbit</td><td width="30">OK</td><td width="40">Not OK</td><td width="35">N/A</td></tr>
<?php
$arr_dt_68 = array(
	'<td>Synchronisation</td><td align="center">CP</td><td>NTP Synch traffic</td><td align="center">LU</td><td align="center">49</td><td align="center">6</td>',
	'<td>Network Control</td><td align="center">CP</td><td>Routing Protocols</td><td align="center">CS6</td><td align="center">48</td><td align="center">6</td>',
	'<td>Radio Network Control</td><td align="center">CP</td><td>FACH1, 2, RACH, PCH, MBMS*, FACH, SRB</td><td align="center">CS5</td><td align="center">47</td><td align="center">6</td>',
	'<td>Synch in P6</td><td align="center">UP</td><td></td><td align="center"></td><td align="center">46</td><td align="center">6</td>',
	'<td>Conversational</td><td align="center"></td><td>Conversationa Speech Data</td><td align="center">EF</td><td align="center">42</td><td align="center">5</td>',
	'<td>Signaling</td><td align="center">UP</td><td>Interactive,THPin1,SinT(Sip signaling)</td><td align="center"></td><td align="center">40</td><td align="center">5</td>',
	'<td>CS Streaming</td><td align="center">CP</td><td>Streaming (MBR==GBR)</td><td align="center">AF42</td><td align="center">36</td><td align="center">5</td>',
	'<td rowspan="3">PS Streaming</td><td rowspan="3" align="center">UP</td><td>MBMS*</td><td align="center">AF33</td><td align="center">30</td><td align="center">4</td>',
	'<td>HS Streaming</td><td></td><td align="center">28</td><td align="center">4</td>',
	'<td>R99 Streaming</td><td align="center">AF31</td><td align="center">26</td><td align="center">4</td>',
	'<td>Signaling</td><td align="center">CP</td><td>Inter-Node Signaling (NBAP,RNSAP,RANAP)</td><td align="center">CS3</td><td align="center">24</td><td align="center">4</td>',
	'<td>HS Interactive High Priority</td><td align="center">UP</td><td>Inter(DCH), Inter(THP=1,SI=F)</td><td align="center">AF21</td><td align="center">22</td><td align="center">3</td>',
	'<td>R99 Inter High Priority</td><td align="center">UP</td><td>Inter(DCH), Inter(THP=1,SI=F)</td><td align="center"></td><td align="center">20</td><td align="center">3</td>',
	'<td>O&M Interactive</td><td align="center">MP</td><td>O&M Access to Nodes</td><td align="center">CS2</td><td align="center">18</td><td align="center">3</td>',
	'<td>HS Interactive Med Prio</td><td align="center">UP</td><td>Interactive (THP=2)</td><td align="center">AF23</td><td align="center">16</td><td align="center">2</td>',
	'<td>R99 Inter High Priority</td><td align="center">UP</td><td>Interactive (THP=2)</td><td align="center"></td><td align="center">14</td><td align="center">2</td>',
	'<td>HS Interactive Low Prio</td><td align="center">UP</td><td>Interactive (THP=3)</td><td align="center">AF11</td><td align="center">10</td><td align="center">1</td>',
	'<td>R99 Interactive Low Prio</td><td align="center">UP</td><td>Interactive (THP=3)</td><td align="center"></td><td align="center">8</td><td align="center">1</td>',
	'<td>HS Background</td><td align="center">UP</td><td>Background HSD</td><td align="center"></td><td align="center">6</td><td align="center">0</td>',
	'<td>R99 Background</td><td align="center">UP</td><td>Background R99</td><td align="center">AF12</td><td align="center">4</td><td align="center">0</td>');
for($i=0; $i <= 19; $i++){
	$dt_subchapter_6_8 = explode('|', $arr_subchapter_6_8[$i]->content);
	echo '<tr>'.$arr_dt_68[$i];
	echo '<td align="center"><input type="radio" name="no_chapter_6_8_'.($i+1).'" value="OK" '; if($dt_subchapter_6_8[3]=='OK') echo 'checked="checked"'; echo ' /></td>';
	echo '<td align="center"><input type="radio" name="no_chapter_6_8_'.($i+1).'" value="Not OK" '; if($dt_subchapter_6_8[3]=='Not OK') echo 'checked="checked"'; echo ' /></td>';
	echo '<td align="center"><input type="radio" name="no_chapter_6_8_'.($i+1).'" value="N/A" '; if($dt_subchapter_6_8[3]=='N/A') echo 'checked="checked"'; echo ' /></td>';
	echo '</tr>';
}
?>
</table>

<?php $Qsubchapter = $this->db->query("SELECT `subno_chapter`, `content` FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `chapter`='6' AND `no_chapter`='6.9' ORDER BY `subno_chapter_order` ASC"); foreach($Qsubchapter->result_object() as $subchapter) $arr_subchapter_6_9[$subchapter->subno_chapter -1]=$subchapter;
$dt_subchapter_6_9a = explode('|', $arr_subchapter_6_9[2]->content);
$dt_subchapter_6_9b = explode('|', $arr_subchapter_6_9[3]->content);
$dt_subchapter_6_9c = explode('|', $arr_subchapter_6_9[4]->content);
$dt_subchapter_6_9d = explode('|', $arr_subchapter_6_9[5]->content);
$dt_subchapter_6_9e = explode('|', $arr_subchapter_6_9[6]->content) ?>

<h3>Chapter 6.9: Verify RBS IMA Adaptation Parameter</h3>
<table class="border" cellpadding="0" cellspacing="0" style="margin-bottom:10px">
<tr class="header"><td>Status</td><td width="45">E1-1</td><td width="45">E1-2</td><td width="45">E1-3</td><td width="45">E1-4</td><td width="45">E1-5</td><td width="45">E1-6</td><td width="45">E1-7</td><td width="45">E1-8</td></tr>
<?php
$arr_dt_69 = array('E1 Status (Enable/Disable/NA)', 'IMA link Status (Enable/Disable/NA)');
for($i=0; $i <= 1; $i++){
	$dt_subchapter_6_9 = explode('|', $arr_subchapter_6_9[$i]->content);
	echo '<tr><td>'.$arr_dt_69[$i].'</td>';
	echo '<td align="center"><input type="radio" name="no_chapter_6_9_'.($i+1).'" value="E1-1" '; if($dt_subchapter_6_9[3]=='E1-1') echo 'checked="checked"'; echo ' /></td>';
	echo '<td align="center"><input type="radio" name="no_chapter_6_9_'.($i+1).'" value="E1-2" '; if($dt_subchapter_6_9[3]=='E1-2') echo 'checked="checked"'; echo ' /></td>';
	echo '<td align="center"><input type="radio" name="no_chapter_6_9_'.($i+1).'" value="E1-3" '; if($dt_subchapter_6_9[3]=='E1-3') echo 'checked="checked"'; echo ' /></td>';
	echo '<td align="center"><input type="radio" name="no_chapter_6_9_'.($i+1).'" value="E1-4" '; if($dt_subchapter_6_9[3]=='E1-4') echo 'checked="checked"'; echo ' /></td>';
	echo '<td align="center"><input type="radio" name="no_chapter_6_9_'.($i+1).'" value="E1-5" '; if($dt_subchapter_6_9[3]=='E1-5') echo 'checked="checked"'; echo ' /></td>';
	echo '<td align="center"><input type="radio" name="no_chapter_6_9_'.($i+1).'" value="E1-6" '; if($dt_subchapter_6_9[3]=='E1-6') echo 'checked="checked"'; echo ' /></td>';
	echo '<td align="center"><input type="radio" name="no_chapter_6_9_'.($i+1).'" value="E1-7" '; if($dt_subchapter_6_9[3]=='E1-7') echo 'checked="checked"'; echo ' /></td>';
	echo '<td align="center"><input type="radio" name="no_chapter_6_9_'.($i+1).'" value="E1-8" '; if($dt_subchapter_6_9[3]=='E1-8') echo 'checked="checked"'; echo ' /></td>';
	echo '</tr>';
}
?>
</table>

<table class="border" cellpadding="0" cellspacing="0">
<tr class="header"><td>&nbsp;</td><td>RBS Paramete</td><td width="30">OK</td><td width="40">Not OK</td><td width="35">N/A</td><td>Remark</td></tr>
<tr><td valign="top" width="10">1<br />2<br />3<br /><br /><br />4</td>
<td valign="top">Available E1<br />activeLinks<br />atmTrafficDescriptor<br />8 E1 (vp1=U3P35200M8800,Pcr=35200,Mcr=8800)<br />4 E1 (vp1=U3P17600M8800,Pcr=17600,Mcr=8800)<br />requiredNumberOfLink</td>
<td valign="top" align="center"><input type="radio" name="no_chapter_6_9_3a" value="OK" <?php if($dt_subchapter_6_9a[3]=='OK') echo 'checked="checked"'; ?> /><br /><input type="radio" name="no_chapter_6_9_4a" value="OK" <?php if($dt_subchapter_6_9b[3]=='OK') echo 'checked="checked"'; ?> /><br /><br /><input type="radio" name="no_chapter_6_9_5a" value="OK" <?php if($dt_subchapter_6_9c[3]=='OK') echo 'checked="checked"'; ?> /><br /><input type="radio" name="no_chapter_6_9_6a" value="OK" <?php if($dt_subchapter_6_9d[3]=='OK') echo 'checked="checked"'; ?> /><br /><input type="radio" name="no_chapter_6_9_7a" value="OK" <?php if($dt_subchapter_6_9e[3]=='OK') echo 'checked="checked"'; ?> /></td>
<td valign="top" align="center"><input type="radio" name="no_chapter_6_9_3a" value="Not OK" <?php if($dt_subchapter_6_9a[3]=='Not OK') echo 'checked="checked"'; ?> /><br /><input type="radio" name="no_chapter_6_9_4a" value="Not OK" <?php if($dt_subchapter_6_9b[3]=='Not OK') echo 'checked="checked"'; ?> /><br /><br /><input type="radio" name="no_chapter_6_9_5a" value="Not OK" <?php if($dt_subchapter_6_9c[3]=='Not OK') echo 'checked="checked"'; ?> /><br /><input type="radio" name="no_chapter_6_9_6a" value="Not OK" <?php if($dt_subchapter_6_9d[3]=='Not OK') echo 'checked="checked"'; ?> /><br /><input type="radio" name="no_chapter_6_9_7a" value="Not OK" <?php if($dt_subchapter_6_9e[3]=='Not OK') echo 'checked="checked"'; ?> /></td>
<td valign="top" align="center"><input type="radio" name="no_chapter_6_9_3a" value="N/A" <?php if($dt_subchapter_6_9a[3]=='N/A') echo 'checked="checked"'; ?> /><br /><input type="radio" name="no_chapter_6_9_4a" value="N/A" <?php if($dt_subchapter_6_9b[3]=='N/A') echo 'checked="checked"'; ?> /><br /><br /><input type="radio" name="no_chapter_6_9_5a" value="N/A" <?php if($dt_subchapter_6_9c[3]=='N/A') echo 'checked="checked"'; ?> /><br /><input type="radio" name="no_chapter_6_9_6a" value="N/A" <?php if($dt_subchapter_6_9d[3]=='N/A') echo 'checked="checked"'; ?> /><br /><input type="radio" name="no_chapter_6_9_7a" value="N/A" <?php if($dt_subchapter_6_9e[3]=='N/A') echo 'checked="checked"'; ?> /></td>
<td valign="top"><input type="text" name="no_chapter_6_9_3b" value="<?php echo $this->ifunction->ifnulls($dt_subchapter_6_9a[4]) ?>" /><br /><input type="text" name="no_chapter_6_9_4b" value="<?php echo $this->ifunction->ifnulls($dt_subchapter_6_9b[4]) ?>" /><br /><br /><input type="text" name="no_chapter_6_9_5b" value="<?php echo $this->ifunction->ifnulls($dt_subchapter_6_9c[4]) ?>" /><br /><input type="text" name="no_chapter_6_9_6b" value="<?php echo $this->ifunction->ifnulls($dt_subchapter_6_9d[4]) ?>" /><br /><input type="text" name="no_chapter_6_9_7b" value="<?php echo $this->ifunction->ifnulls($dt_subchapter_6_9e[4]) ?>" /></td>
</tr>
</table>

<hr />

<center>
    <input type="button" class="button" name="prev" value="Prev" onclick="validasi(5, <?php echo $dx ?>)" />
    &emsp; <input type="reset" class="reset" value="Reset to Default"/> &emsp;
    <input type="button" class="button" name="next" value="Next" onclick="validasi(7, <?php echo $dx ?>)" />
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
	
	for($i=1; $i<=20; $i++)
	{
		$chp = 'no_chapter_6_8_'.$i;
		if(isset($$chp)) $quest[] = '6@6.8|No|'.$i.'|'.$$chp; else { $$chp = "null"; $quest[] = '6@6.8|No|'.$i.'|'.$$chp; }
	}
	//--------------------------------------------------
	for($i=1; $i<=2; $i++)
	{
		$chp = 'no_chapter_6_9_'.$i;
		if(isset($$chp)) $quest[] = '6@6.9|No|'.$i.'|'.$$chp; else { $$chp = "null"; $quest[] = '6@6.9|No|'.$i.'|'.$$chp; }
	}
	//--------------------------------------------------
	for($i=3; $i<=7; $i++)
	{
		$col_a = 'no_chapter_6_9_'.$i.'a';
		$col_b = 'no_chapter_6_9_'.$i.'b';
		
		$$col_a = kosong($$col_a);
		$$col_b = kosong($$col_b);
		
		if(str_replace('null', 'null', $$col_a.$$col_b)){
			$quest[] = '6@6.9|No|'.$i.'|'.$$col_a.'|'.$$col_b;
		}
	}
}

include 'paging.php';
?>

</body>
</html>