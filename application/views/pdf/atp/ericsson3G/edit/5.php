<?php session_start(); if(empty($_SESSION['isat']['log'])) exit('<script>alert("Session expired, please re-login!");self.close();</script>');if ( ! defined('BASEPATH')) exit('No direct script access allowed'); $Qtit = $this->db->query("SELECT `title` FROM `it_atp` WHERE `atp_id`='$dx'"); $tit = $Qtit->result_object(); $title = $tit[0]->title; ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xml:lang="en" xmlns="http://www.w3.org/1999/xhtml" lang="en">
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
<title>Preload ATP Ericsson 3G (Page 5) - <?php echo $title ?></title>
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
<h1>Page 5</h1><br /><br />

<form name="preload3G" method="post" action="">

<?php $Qsubchapter = $this->db->query("SELECT `subno_chapter`, `content` FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `chapter`='6' AND `no_chapter`='6.3' ORDER BY `subno_chapter_order` ASC"); foreach($Qsubchapter->result_object() as $subchapter) $arr_subchapter_6_3[$subchapter->subno_chapter -1]=$subchapter ?>

<h3>Chapter 6.3: VCI Allocation on VPC Terminating in End RBS (dilihat dari laptop)</h3>
<table class="border" cellpadding="0" cellspacing="0">
<tr class="header"><td rowspan="2">ET Board Port (E1/ STM-1)</td><td rowspan="2">VPC Terminating Nodes</td><td colspan="6">VCI Allocation</td></tr>
<tr class="header"><td>Mub-a/b</td><td>Node Synch</td><td>NBAP-C</td><td>NBAP-D</td><td>Q.2630</td><td>AAL2Path</td></tr>
<?php
$arr_dt_63 = array('Active', 'Standby');
for($i=0; $i <= 1; $i++){
	$dt_subchapter_6_3 = explode('|', $arr_subchapter_6_3[$i]->content);
	echo '<tr><td>'.$arr_dt_63[$i].'</td><td><input type="text" name="no_chapter_6_3_'.($i+1).'a" value="'.$this->ifunction->ifnulls($dt_subchapter_6_3[3]).'" /></td><td><input type="text" name="no_chapter_6_3_'.($i+1).'b" value="'.$this->ifunction->ifnulls($dt_subchapter_6_3[4]).'" /></td><td><input type="text" name="no_chapter_6_3_'.($i+1).'c" value="'.$this->ifunction->ifnulls($dt_subchapter_6_3[5]).'" /></td><td><input type="text" name="no_chapter_6_3_'.($i+1).'d" value="'.$this->ifunction->ifnulls($dt_subchapter_6_3[6]).'" /></td><td><input type="text" name="no_chapter_6_3_'.($i+1).'e" value="'.$this->ifunction->ifnulls($dt_subchapter_6_3[7]).'" /></td><td><input type="text" name="no_chapter_6_3_'.($i+1).'f" value="'.$this->ifunction->ifnulls($dt_subchapter_6_3[8]).'" /></td><td><input type="text" name="no_chapter_6_3_'.($i+1).'g" value="'.$this->ifunction->ifnulls($dt_subchapter_6_3[9]).'" /></td></tr>';
}
?>
</table>

<?php $Qsubchapter = $this->db->query("SELECT `subno_chapter`, `content` FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `chapter`='6' AND `no_chapter`='6.4' ORDER BY `subno_chapter_order` ASC"); foreach($Qsubchapter->result_object() as $subchapter) $arr_subchapter_6_4[$subchapter->subno_chapter -1]=$subchapter ?>

<h3>Chapter 6.4: IP Transport Configuration</h3>
<table class="border" cellpadding="0" cellspacing="0">
<tr class="header"><td>Items</td><td>IP Address</td><td width="30">OK</td><td width="40">Not OK</td><td width="35">N/A</td><td>Remark</td></tr>
<?php
$arr_dt_64 = array('User Plane', 'Control Plane', 'IP Sync Ref 1', 'IP Sync Ref 2', 'Default Router');
for($i=0; $i <= 4; $i++){
	$dt_subchapter_6_4 = explode('|', $arr_subchapter_6_4[$i]->content);
	echo '<tr><td>'.$arr_dt_64[$i].'</td><td><input type="text" name="no_chapter_6_4_'.($i+1).'a" value="'.$this->ifunction->ifnulls($dt_subchapter_6_4[3]).'" /></td>';
	echo '<td align="center"><input type="radio" name="no_chapter_6_4_'.($i+1).'b" value="OK" '; if($dt_subchapter_6_4[4]=='OK') echo 'checked="checked"'; echo ' /></td>';
	echo '<td align="center"><input type="radio" name="no_chapter_6_4_'.($i+1).'b" value="Not OK" '; if($dt_subchapter_6_4[4]=='Not OK') echo 'checked="checked"'; echo ' /></td>';
	echo '<td align="center"><input type="radio" name="no_chapter_6_4_'.($i+1).'b" value="N/A" '; if($dt_subchapter_6_4[4]=='N/A') echo 'checked="checked"'; echo ' /></td>';
	echo '<td><input type="text" name="no_chapter_6_4_'.($i+1).'c" value="'.$this->ifunction->ifnulls($dt_subchapter_6_4[5]).'" /></td></tr>';
}
?>
</table>

<?php $Qsubchapter = $this->db->query("SELECT `subno_chapter`, `content` FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `chapter`='6' AND `no_chapter`='6.5' ORDER BY `subno_chapter_order` ASC"); foreach($Qsubchapter->result_object() as $subchapter) $arr_subchapter_6_5[$subchapter->subno_chapter -1]=$subchapter ?>

<h3>Chapter 6.5: Mub configuration</h3>
<table class="border" cellpadding="0" cellspacing="0">
<tr class="header"><td>Items</td><td>IP Address</td><td>Route Metric</td><td width="30">OK</td><td width="40">Not OK</td><td width="35">N/A</td><td>Remark</td></tr>
<?php
$arr_dt_65 = array('nextHopIpAddr (Mub-a)', 'nextHopIpAddr (Mub-b)', 'nextHopIpAddr (Mub-c)');
for($i=0; $i <= 2; $i++){
	$dt_subchapter_6_5 = explode('|', $arr_subchapter_6_5[$i]->content);
	echo '<tr><td>'.$arr_dt_65[$i].'</td><td><input type="text" name="no_chapter_6_5_'.($i+1).'a" value="'.$this->ifunction->ifnulls($dt_subchapter_6_5[3]).'" /></td><td><input type="text" name="no_chapter_6_5_'.($i+1).'b" value="'.$this->ifunction->ifnulls($dt_subchapter_6_5[4]).'" /></td>';
	echo '<td align="center"><input type="radio" name="no_chapter_6_5_'.($i+1).'c" value="OK" '; if($dt_subchapter_6_5[5]=='OK') echo 'checked="checked"'; echo ' /></td>';
	echo '<td align="center"><input type="radio" name="no_chapter_6_5_'.($i+1).'c" value="Not OK" '; if($dt_subchapter_6_5[5]=='Not OK') echo 'checked="checked"'; echo ' /></td>';
	echo '<td align="center"><input type="radio" name="no_chapter_6_5_'.($i+1).'" value="N/A" '; if($dt_subchapter_6_5[5]=='N/A') echo 'checked="checked"'; echo ' /></td>';
	echo '<td><input type="text" name="no_chapter_6_5_'.($i+1).'d" value="'.$this->ifunction->ifnulls($dt_subchapter_6_5[6]).'" /></td></tr>';
}
?>
</table>

<?php $Qsubchapter = $this->db->query("SELECT `subno_chapter`, `content` FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `chapter`='6' AND `no_chapter`='6.6' ORDER BY `subno_chapter_order` ASC"); foreach($Qsubchapter->result_object() as $subchapter) $arr_subchapter_6_6[$subchapter->subno_chapter -1]=$subchapter ?>

<h3>Chapter 6.6: Channel Element Capacity</h3>
<table class="border" cellpadding="0" cellspacing="0">
<tr class="header"><td></td><td>HW CE</td><td>License (SW) CE</td><td>Grace Period On Service</td><td>Grace Period ATP</td></tr>
<?php
$arr_dt_66 = array('Downlink', 'Uplink');
for($i=0; $i <= 1; $i++){
	$dt_subchapter_6_6 = explode('|', $arr_subchapter_6_6[$i]->content);
	echo '<tr><td>'.$arr_dt_66[$i].'</td><td><input type="text" name="no_chapter_6_6_'.($i+1).'a" value="'.$this->ifunction->ifnulls($dt_subchapter_6_6[3]).'" /></td><td><input type="text" name="no_chapter_6_6_'.($i+1).'b" value="'.$this->ifunction->ifnulls($dt_subchapter_6_6[4]).'" /></td><td><input type="text" name="no_chapter_6_6_'.($i+1).'c" value="'.$this->ifunction->ifnulls($dt_subchapter_6_6[5]).'" /></td><td><input type="text" name="no_chapter_6_6_'.($i+1).'d" value="'.$this->ifunction->ifnulls($dt_subchapter_6_6[6]).'" /></td></tr>';
}
?>
</table>

<?php $Qsubchapter = $this->db->query("SELECT `subno_chapter`, `content` FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `chapter`='6' AND `no_chapter`='6.7' ORDER BY `subno_chapter_order` ASC"); foreach($Qsubchapter->result_object() as $subchapter) $arr_subchapter_6_7[$subchapter->subno_chapter -1]=$subchapter ?>

<h3>Chapter 6.7: RBS License Feature</h3>
<table class="border" cellpadding="0" cellspacing="0">
<tr class="header"><td>RBS Feature</td><td width="30">OK</td><td width="40">Not OK</td><td width="35">N/A</td><td>Remark</td></tr>
<?php
$arr_dt_67 = array('HSDPA CODES PER CELL', 'DYNHSPDSCHCODEALLOCATION', 'FLEXIBLESCHEDULER', 'ENHANCEDUPLINK', 'FEATURE DUAL STACK IUB', 'CAPACITY POWER AMPLIFIER', 'CAPACITY NUMBER of CARRIER');
for($i=0; $i <= 6; $i++){
	$dt_subchapter_6_7 = explode('|', $arr_subchapter_6_7[$i]->content);
	echo '<tr><td>'.$arr_dt_67[$i].'</td>';
	echo '<td align="center"><input type="radio" name="no_chapter_6_7_'.($i+1).'a" value="OK" '; if($dt_subchapter_6_7[3]=='OK') echo 'checked="checked"'; echo ' /></td>';
	echo '<td align="center"><input type="radio" name="no_chapter_6_7_'.($i+1).'a" value="Not OK" '; if($dt_subchapter_6_7[3]=='Not OK') echo 'checked="checked"'; echo ' /></td>';
	echo '<td align="center"><input type="radio" name="no_chapter_6_7_'.($i+1).'a" value="N/A" '; if($dt_subchapter_6_7[3]=='N/A') echo 'checked="checked"'; echo ' /></td>';
	echo '<td><input type="text" name="no_chapter_6_7_'.($i+1).'b" value="'.$this->ifunction->ifnulls($dt_subchapter_6_7[4]).'" /></td></tr>';
}
?>
</table>

<hr />

<center>
    <input type="button" class="button" name="prev" value="Prev" onclick="validasi(4, <?php echo $dx ?>)" />
    &emsp; <input type="reset" class="reset" value="Reset to Default"/> &emsp;
    <input type="button" class="button" name="next" value="Next" onclick="validasi(6, <?php echo $dx ?>)" />
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
		$col_a = 'no_chapter_6_3_'.$i.'a';
		$col_b = 'no_chapter_6_3_'.$i.'b';
		$col_c = 'no_chapter_6_3_'.$i.'c';
		$col_d = 'no_chapter_6_3_'.$i.'d';
		$col_e = 'no_chapter_6_3_'.$i.'e';
		$col_f = 'no_chapter_6_3_'.$i.'f';
		$col_g = 'no_chapter_6_3_'.$i.'g';
		
		$$col_a = kosong($$col_a);
		$$col_b = kosong($$col_b);
		$$col_c = kosong($$col_c);
		$$col_d = kosong($$col_d);
		$$col_e = kosong($$col_e);
		$$col_f = kosong($$col_f);
		$$col_g = kosong($$col_g);
		
		if(str_replace('null', 'null', $$col_a.$$col_b.$$col_c.$$col_d.$$col_e.$$col_f.$$col_g)){
			$quest[] = '6@6.3|No|'.$i.'|'.$$col_a.'|'.$$col_b.'|'.$$col_c.'|'.$$col_d.'|'.$$col_e.'|'.$$col_f.'|'.$$col_g;
		}
		else{
			$user_id = $hasil[0]->user_id;
			$this->db->query("DELETE FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `user_id`='$user_id' AND `chapter`='6' AND `no_chapter`='6.3' AND `subno_chapter`='$i'");
		}
	}
	//----------------------------------------------------
	for($i=1; $i<=5; $i++)
	{
		$col_a = 'no_chapter_6_4_'.$i.'a';
		$col_b = 'no_chapter_6_4_'.$i.'b';
		$col_c = 'no_chapter_6_4_'.$i.'c';
		
		$$col_a = kosong($$col_a);
		$$col_b = kosong($$col_b);
		$$col_c = kosong($$col_c);
		
		if(str_replace('null', 'null', $$col_a.$$col_b.$$col_c)){
			$quest[] = '6@6.4|No|'.$i.'|'.$$col_a.'|'.$$col_b.'|'.$$col_c;
		}
	}
	//--------------------------------------------------
	for($i=1; $i<=3; $i++)
	{
		$col_a = 'no_chapter_6_5_'.$i.'a';
		$col_b = 'no_chapter_6_5_'.$i.'b';
		$col_c = 'no_chapter_6_5_'.$i.'c';
		$col_d = 'no_chapter_6_5_'.$i.'d';
		
		$$col_a = kosong($$col_a);
		$$col_b = kosong($$col_b);
		$$col_c = kosong($$col_c);
		$$col_d = kosong($$col_d);
		
		if(str_replace('null', 'null', $$col_a.$$col_b.$$col_c.$$col_d)){
			$quest[] = '6@6.5|No|'.$i.'|'.$$col_a.'|'.$$col_b.'|'.$$col_c.'|'.$$col_d;
		}
	}
	//--------------------------------------------------
	for($i=1; $i<=2; $i++)
	{
		$col_a = 'no_chapter_6_6_'.$i.'a';
		$col_b = 'no_chapter_6_6_'.$i.'b';
		$col_c = 'no_chapter_6_6_'.$i.'c';
		$col_d = 'no_chapter_6_6_'.$i.'d';
		
		$$col_a = kosong($$col_a);
		$$col_b = kosong($$col_b);
		$$col_c = kosong($$col_c);
		$$col_d = kosong($$col_d);
		
		if(str_replace('null', 'null', $$col_a.$$col_b.$$col_c.$$col_d)){
			$quest[] = '6@6.6|No|'.$i.'|'.$$col_a.'|'.$$col_b.'|'.$$col_c.'|'.$$col_d;
		}
		else{
			$user_id = $hasil[0]->user_id;
			$this->db->query("DELETE FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `user_id`='$user_id' AND `chapter`='6' AND `no_chapter`='6.6' AND `subno_chapter`='$i'");
		}
	}
	//--------------------------------------------------
	for($i=1; $i<=7; $i++)
	{
		$col_a = 'no_chapter_6_7_'.$i.'a';
		$col_b = 'no_chapter_6_7_'.$i.'b';
		
		$$col_a = kosong($$col_a);
		$$col_b = kosong($$col_b);
		
		if(str_replace('null', 'null', $$col_a.$$col_b)){
			$quest[] = '6@6.7|No|'.$i.'|'.$$col_a.'|'.$$col_b;
		}
	}
}

include 'paging.php';
?>

</body>
</html>