<?php session_start(); if(empty($_SESSION['isat']['log'])) exit('<script>alert("Session expired, please re-login!");self.close();</script>'); if ( ! defined('BASEPATH')) exit('No direct script access allowed'); $Qtit = $this->db->query("SELECT `title` FROM `it_atp` WHERE `atp_id`='$dx'"); $tit = $Qtit->result_object(); $title = $tit[0]->title; ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xml:lang="en" xmlns="http://www.w3.org/1999/xhtml" lang="en">
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
<title>Preload ATP Ericsson 2G (Page 11) - <?php echo $title ?></title>
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
	width:90%;
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
<h1>Page 11</h1>
<br /><br />

<form name="preload2G" method="post" action="">

<?php $Qsubchapter = $this->db->query("SELECT `content` FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `chapter`='19' AND `no_chapter`='19.11' ORDER BY `subno_chapter_order` ASC"); foreach($Qsubchapter->result_object() as $subchapter) $arr_subchapter_19_11[]=$subchapter; 

$dt_subchapter_19_11a = explode('|', $arr_subchapter_19_11[0]->content);

$Qsubchapter = $this->db->query("SELECT `subno_chapter`, `content` FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `chapter`='19' AND `no_chapter`='19.12' ORDER BY `subno_chapter_order` ASC"); foreach($Qsubchapter->result_object() as $subchapter) $arr_subchapter_19_12[$subchapter->subno_chapter -1]=$subchapter ?>

<p><b>SECTOR C: MCC = <input type="text" name="no_chapter_19_11_1a" value="<?php echo $this->ifunction->ifnulls($dt_subchapter_19_11a[3]) ?>" style="width:50px;" />, MNC = <input type="text" name="no_chapter_19_11_1b" value="<?php echo $this->ifunction->ifnulls($dt_subchapter_19_11a[4]) ?>" style="width:50px;" />, LAC = <input type="text" name="no_chapter_19_11_1c" value="<?php echo $this->ifunction->ifnulls($dt_subchapter_19_11a[5]) ?>" style="width:50px;" />, CELL ID = <input type="text" name="no_chapter_19_11_1d" value="<?php echo $this->ifunction->ifnulls($dt_subchapter_19_11a[6]) ?>" style="width:50px;" />, ARFCN/BCCH = <input type="text" name="no_chapter_19_11_1e" value="<?php echo $this->ifunction->ifnulls($dt_subchapter_19_11a[7]) ?>" style="width:50px;" /></b></p>

<table class="border" cellpadding="0" cellspacing="0">
<tr class="header">
    <td width="80" rowspan="2">Item Test </td>
    <td width="90" rowspan="2">Host Address </td>
    <td colspan="2">Downlink </td>
    <td colspan="2">Uplink </td>
    <td rowspan="2">Throughput<br />/ Delay</td>
    <td colspan="3">Test Call Result</td>
    <td width="50" rowspan="2">Remark</td>
</tr>
<tr class="header">
    <td>TS </td>
    <td>MCS </td>
    <td>TS </td>
    <td>MCS</td>
    <td width="30">OK</td>
    <td width="40">Not OK</td>
    <td width="35">N/A</td>
</tr>
<?php
$arr_dt_1912 = array('PING', 'WAP', 'HTTP', 'FTP Downlink', 'FTP Uplink', 'Video Streaming');
for($i=0; $i <= 5; $i++){
	$dt_subchapter_19_12 = explode('|', $arr_subchapter_19_12[$i]->content);
	echo '<tr><td>'.$arr_dt_1912[$i].'</td>';
	echo '<td><input type="text" name="no_chapter_19_12_'.($i+1).'a" value="'.$this->ifunction->ifnulls($dt_subchapter_19_12[4]).'" /></td>';
	echo '<td><input type="text" name="no_chapter_19_12_'.($i+1).'b" value="'.$this->ifunction->ifnulls($dt_subchapter_19_12[5]).'" /></td>';
	echo '<td><input type="text" name="no_chapter_19_12_'.($i+1).'c" value="'.$this->ifunction->ifnulls($dt_subchapter_19_12[6]).'" /></td>';
	echo '<td><input type="text" name="no_chapter_19_12_'.($i+1).'d" value="'.$this->ifunction->ifnulls($dt_subchapter_19_12[7]).'" /></td>';
	echo '<td><input type="text" name="no_chapter_19_12_'.($i+1).'e" value="'.$this->ifunction->ifnulls($dt_subchapter_19_12[8]).'" /></td>';
	echo '<td><input type="text" name="no_chapter_19_12_'.($i+1).'f" value="'.$this->ifunction->ifnulls($dt_subchapter_19_12[9]).'" /></td>';
	echo '<td align="center"><input type="radio" name="no_chapter_19_12_'.($i+1).'g" value="OK" ';  if($dt_subchapter_19_12[3]=='OK') echo 'checked="checked"'; echo ' /></td>';
	echo '<td align="center"><input type="radio" name="no_chapter_19_12_'.($i+1).'g" value="Not OK" ';  if($dt_subchapter_19_12[3]=='Not OK') echo 'checked="checked"'; echo ' /></td>';
	echo '<td align="center"><input type="radio" name="no_chapter_19_12_'.($i+1).'g" value="N/A" ';  if($dt_subchapter_19_12[3]=='N/A') echo 'checked="checked"'; echo ' /></td>';
	echo '<td><input type="text" name="no_chapter_19_12_'.($i+1).'h" value="'.$this->ifunction->ifnulls($dt_subchapter_19_12[10]).'" /></td></tr>';
}
?>
</table><br />

<?php $Qchapter = $this->db->query("SELECT `no_chapter`, `content` FROM `it_atp_chapter` WHERE `atp_id`='$dx' AND `chapter`='21' ORDER BY `atp_chapter_id` ASC"); foreach($Qchapter->result_object() as $chapter) $arr_chapter_21[str_replace('21.', '', $chapter->no_chapter) -1]=$chapter ?>

<table class="border" cellpadding="0" cellspacing="0">
<tr class="header"><td width="40">Chapter</td><td>Title work performed</td><td width="30">OK</td><td width="40">Not OK</td><td width="35">N/A</td><td width="90">Remark</td></tr>
<tr><td valign="top"><b>21</b><br />21<br />21.1<br />21.2</td><td valign="top"><b>Antenna system measurement</b><br />Antenna Diversity Test<br />GSM 900 Antenna Diversity Test<br />DCS 1800 Antenna Diversity Test</td>
<td valign="top" align="center">
<?php echo '<br />';
for($i=0; $i <= 2; $i++){
    echo '<input type="radio" name="no_chapter_21_'.($i+1).'" value="OK"'; if($arr_chapter_21[$i]->content=='OK') echo 'checked="checked"'; echo ' /><br />';
}
?>
</td><td valign="top" align="center">
<?php echo '<br />';
for($i=0; $i <= 2; $i++){
    echo '<input type="radio" name="no_chapter_21_'.($i+1).'" value="Not OK"'; if($arr_chapter_21[$i]->content=='Not OK') echo 'checked="checked"'; echo ' /><br />';
}
?>
</td><td valign="top" align="center">
<?php echo '<br />';
for($i=0; $i <= 2; $i++){
    echo '<input type="radio" name="no_chapter_21_'.($i+1).'" value="N/A"'; if($arr_chapter_21[$i]->content=='N/A') echo 'checked="checked"'; echo ' /><br />';
}
?>
</td><td valign="top" align="center"><br /><br />Major<br />Major</td></tr>
</table>

<?php $Qsubchapter = $this->db->query("SELECT `subno_chapter`, `content` FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `chapter`='21' AND `no_chapter`='21.1' ORDER BY `subno_chapter_order` ASC"); foreach($Qsubchapter->result_object() as $subchapter) $arr_subchapter_21_1[$subchapter->subno_chapter -1]=$subchapter ?>

<h3>Table 11: GSM 900 Antenna Diversity Test</h3>
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
for($i=0; $i <= 15; $i++){
	$dt_subchapter_21_1 = explode('|', $arr_subchapter_21_1[$i]->content);
	echo '<tr><td>21.1.'.($i +1).'</td><td align="center">TRX - '.($i +1).'</td>';
	echo '<td><input type="text" name="no_chapter_21_1_'.($i+1).'a" value="'.$this->ifunction->ifnulls($dt_subchapter_21_1[4]).'" /></td>';
	echo '<td><input type="radio" name="no_chapter_21_1_'.($i+1).'b" value="OK" ';  if($dt_subchapter_21_1[3]=='OK') echo 'checked="checked"'; echo ' /></td>';
	echo '<td><input type="radio" name="no_chapter_21_1_'.($i+1).'b" value="Not OK" ';  if($dt_subchapter_21_1[3]=='Not OK') echo 'checked="checked"'; echo ' /></td>';
	echo '<td><input type="radio" name="no_chapter_21_1_'.($i+1).'b" value="N/A" ';  if($dt_subchapter_21_1[3]=='N/A') echo 'checked="checked"'; echo ' /></td>';
	echo '<td><input type="text" name="no_chapter_21_1_'.($i+1).'c" value="'.$this->ifunction->ifnulls($dt_subchapter_21_1[5]).'" /></td></tr>';
}
?>
</table>
<p style="font-size:11px"><i>Note: SSI = Signal Strength Imbalance</i></p>

<hr />

<center>
	<input type="button" class="button"  name="prev" value="Prev" onclick="validasi(10,'<?php echo $dx; ?>');" />
    <!--<input type="submit" class="button" name="prev" value="Prev" />-->
    &emsp;
    <input type="reset" class="reset" value="Reset to Default"/>
    &emsp;
    <input type="button" class="button" name="next" value="Next" onclick="validasi(12,'<?php echo $dx; ?>');" />
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
		
		$col_a = 'no_chapter_19_11_1a';
		$col_b = 'no_chapter_19_11_1b';
		$col_c = 'no_chapter_19_11_1c';
		$col_d = 'no_chapter_19_11_1d';
		$col_e = 'no_chapter_19_11_1e';
		
		$$col_a = kosong($$col_a);
		$$col_b = kosong($$col_b);
		$$col_c = kosong($$col_c);
		$$col_d = kosong($$col_d);
		$$col_e = kosong($$col_e);
		
		if(str_replace('null', '', $$col_a.$$col_b.$$col_c.$$col_d.$$col_e)){
			$quest[] = '19@19.11|No|1|'.$$col_a.'|'.$$col_b.'|'.$$col_c.'|'.$$col_d.'|'.$$col_e;
		}
		else
		{
			$user_id = $hasil[0]->user_id;
			$this->db->query("DELETE FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `user_id`='$user_id' AND `chapter`='19' AND `no_chapter`='19.11' AND `subno_chapter`='1'");
		}
		//----------------------------------------------------
		for($i=1; $i<=6; $i++)
		{
			$col_a = 'no_chapter_19_12_'.$i.'a';
			$col_b = 'no_chapter_19_12_'.$i.'b';
			$col_c = 'no_chapter_19_12_'.$i.'c';
			$col_d = 'no_chapter_19_12_'.$i.'d';
			$col_e = 'no_chapter_19_12_'.$i.'e';
			$col_f = 'no_chapter_19_12_'.$i.'f';
			$col_g = 'no_chapter_19_12_'.$i.'g';
			$col_h = 'no_chapter_19_12_'.$i.'h';
			
			$$col_a = kosong($$col_a);
			$$col_b = kosong($$col_b);
			$$col_c = kosong($$col_c);
			$$col_d = kosong($$col_d);
			$$col_e = kosong($$col_e);
			$$col_f = kosong($$col_f);
			$$col_g = kosong($$col_g);
			$$col_h = kosong($$col_h);
			
			if(str_replace('null' , '', $$col_a.$$col_b.$$col_c.$$col_d.$$col_e.$$col_f.$$col_g.$$col_h))
			{
				$quest[] = '19@19.12|No|'.$i.'|'.$$col_g.'|'.$$col_a.'|'.$$col_b.'|'.$$col_c.'|'.$$col_d.'|'.$$col_e.'|'.$$col_f.'|'.$$col_h;
			}
		}		
		//----------------------------------------------------
		
		for($i=1; $i<=3; $i++)
		{
			$chp = 'no_chapter_21_'.$i;
			if(isset($$chp)) $quest[] = '21|No|21.'.$i.'|'.$$chp;
		}
		//----------------------------------------------------
		for($i=1; $i<=16; $i++)
		{
			$col_a = 'no_chapter_21_1_'.$i.'a';
			$col_b = 'no_chapter_21_1_'.$i.'b';
			$col_c = 'no_chapter_21_1_'.$i.'c';
			
			$$col_a = kosong($$col_a);
			$$col_b = kosong($$col_b);
			$$col_c = kosong($$col_c);
			
			if(str_replace('null' , '', $$col_a.$$col_b.$$col_c))
			{
				$quest[] = '21@21.1|No|'.$i.'|'.$$col_b.'|'.$$col_a.'|'.$$col_c;
			}
		}
	}
	include 'paging.php'; 
?>
</body>
</html>