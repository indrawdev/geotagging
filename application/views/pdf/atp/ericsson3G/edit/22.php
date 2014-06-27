<?php session_start(); if(empty($_SESSION['isat']['log'])) exit('<script>alert("Session expired, please re-login!");self.close();</script>');if ( ! defined('BASEPATH')) exit('No direct script access allowed'); $Qtit = $this->db->query("SELECT `title` FROM `it_atp` WHERE `atp_id`='$dx'"); $tit = $Qtit->result_object(); $title = $tit[0]->title; ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xml:lang="en" xmlns="http://www.w3.org/1999/xhtml" lang="en">
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
<title>Preload ATP Ericsson 3G (Page 22) - <?php echo $title ?></title>
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
<h2>Preload ATP Ericsson 3G</h2>
<h1>Page 22</h1><br /><br />

<form name="preload3G" method="post" action="">


<?php $Qsubchapter = $this->db->query("SELECT `subno_chapter`, `content` FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `chapter`='18' AND `no_chapter`='18.10' ORDER BY `subno_chapter_order` ASC"); foreach($Qsubchapter->result_object() as $subchapter) $arr_subchapter_18_10[$subchapter->subno_chapter -1]=$subchapter ?>

<h3>Chapter 18.10: Emergency Test Call</h3>
<table class="border" cellpadding="0" cellspacing="0">
<tr class="header"><td width="50" rowspan="2">Item Test</td><td rowspan="2">MO<br />Number</td><td rowspan="2">MT<br />Number</td><td colspan="8">Test Call Result</td><td width="60" rowspan="2">Remark</td></tr>
<tr class="header"><td colspan="2">ATM</td><td colspan="2">Dual Stack (2E1)</td><td colspan="2">Dual Stack (1E1)</td><td colspan="2">Native IP</td></tr>
<?php
$arr_dt_1810 = array('112', '118');
for($i=0; $i <= 1; $i++){
	$dt_subchapter_18_10 = explode('|', $arr_subchapter_18_10[$i]->content);
	echo '<tr><td align="center">'.$arr_dt_1810[$i].'</td>';
	echo '<td><input type="text" name="no_chapter_18_10_'.($i+1).'a" value="'.$this->ifunction->ifnulls($dt_subchapter_18_10[3]).'" /></td><td><input type="text" name="no_chapter_18_10_'.($i+1).'b" value="'.$this->ifunction->ifnulls($dt_subchapter_18_10[4]).'" /></td>';
	echo '<td width="35" align="center"><input type="radio" name="no_chapter_18_10_'.($i+1).'c" value="OK" '; if($dt_subchapter_18_10[5]=='OK') echo 'checked="checked"'; echo ' /> OK</td>';
	echo '<td width="35" align="center"><input type="radio" name="no_chapter_18_10_'.($i+1).'c" value="Not OK" '; if($dt_subchapter_18_10[5]=='Not OK') echo 'checked="checked"'; echo ' /> NOK</td>';
	echo '<td width="35" align="center"><input type="radio" name="no_chapter_18_10_'.($i+1).'d" value="OK" '; if($dt_subchapter_18_10[6]=='OK') echo 'checked="checked"'; echo ' /> OK</td>';
	echo '<td width="35" align="center"><input type="radio" name="no_chapter_18_10_'.($i+1).'d" value="Not OK" '; if($dt_subchapter_18_10[6]=='Not OK') echo 'checked="checked"'; echo ' /> NOK</td>';
	echo '<td width="35" align="center"><input type="radio" name="no_chapter_18_10_'.($i+1).'e" value="OK" '; if($dt_subchapter_18_10[7]=='OK') echo 'checked="checked"'; echo ' /> OK</td>';
	echo '<td width="35" align="center"><input type="radio" name="no_chapter_18_10_'.($i+1).'e" value="Not OK" '; if($dt_subchapter_18_10[7]=='Not OK') echo 'checked="checked"'; echo ' /> NOK</td>';
	echo '<td width="35" align="center"><input type="radio" name="no_chapter_18_10_'.($i+1).'f" value="OK" '; if($dt_subchapter_18_10[8]=='OK') echo 'checked="checked"'; echo ' /> OK</td>';
	echo '<td width="35" align="center"><input type="radio" name="no_chapter_18_10_'.($i+1).'f" value="Not OK" '; if($dt_subchapter_18_10[8]=='Not OK') echo 'checked="checked"'; echo ' /> NOK</td>';
	echo '<td width="40"><input type="text" name="no_chapter_18_10_'.($i+1).'g" value="'.$this->ifunction->ifnulls($dt_subchapter_18_10[9]).'" /></td></tr>';
}
?>
</table>

<?php $Qsubchapter = $this->db->query("SELECT `subno_chapter`, `content` FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `chapter`='18' AND `no_chapter`='18.11' ORDER BY `subno_chapter_order` ASC"); foreach($Qsubchapter->result_object() as $subchapter) $arr_subchapter_18_11[$subchapter->subno_chapter -1]=$subchapter;
$dt_subchapter_18_11a = explode('|', $arr_subchapter_18_11[3]->content);
$dt_subchapter_18_11b = explode('|', $arr_subchapter_18_11[4]->content);?>

<h3>Chapter 18.11: IMA Bandwidth Adaptation Test</h3>
<table class="border" cellpadding="0" cellspacing="0">
<tr class="header"><!--td colspan="10"--><td colspan="9">NODE B Network Synchronization Connection Check</td></tr>
<tr class="header"><!--td>No</td--><td>Item Check</td><td>E1</td><td>E2</td><td>E3</td><td>E4</td><td>E5</td><td>E6</td><td>E7</td><td>E8</td></tr>
<?php
$arr_dt_1811 = array('Synchronization State (Enable/Disable/NA)', 'Synchronization Priority (1-8)', 'Result Check (OK/NOK/NA)');
for($i=0; $i <= 2; $i++){
	$dt_subchapter_18_11 = explode('|', $arr_subchapter_18_11[$i]->content);
	//<td width="30" align="center">'.($i +1).'</td>
	echo '<tr><td width="290">'.$arr_dt_1811[$i].'</td>';
	echo '<td><input type="text" name="no_chapter_18_11_'.($i+1).'a" value="'.$this->ifunction->ifnulls($dt_subchapter_18_11[3]).'" /></td><td><input type="text" name="no_chapter_18_11_'.($i+1).'b" value="'.$this->ifunction->ifnulls($dt_subchapter_18_11[4]).'" /></td><td><input type="text" name="no_chapter_18_11_'.($i+1).'c" value="'.$this->ifunction->ifnulls($dt_subchapter_18_11[5]).'" /></td><td><input type="text" name="no_chapter_18_11_'.($i+1).'d" value="'.$this->ifunction->ifnulls($dt_subchapter_18_11[6]).'" /></td><td><input type="text" name="no_chapter_18_11_'.($i+1).'e" value="'.$this->ifunction->ifnulls($dt_subchapter_18_11[7]).'" /></td><td><input type="text" name="no_chapter_18_11_'.($i+1).'f" value="'.$this->ifunction->ifnulls($dt_subchapter_18_11[8]).'" /></td><td><input type="text" name="no_chapter_18_11_'.($i+1).'g" value="'.$this->ifunction->ifnulls($dt_subchapter_18_11[9]).'" /></td><td><input type="text" name="no_chapter_18_11_'.($i+1).'h" value="'.$this->ifunction->ifnulls($dt_subchapter_18_11[10]).'" /></td></tr>';
}
?>
<tr><!--td rowspan="3" align="center">4</td--><td align="center"><b>NTP  Server Check</b></td><td colspan="5" align="center"><b>Time Stamp</b></td><td colspan="3" align="center"><b>Status</b></td></tr>
<tr><td>Server 0 : 10.145.140.36</td><td colspan="5" align="center"><input type="text" name="no_chapter_18_11_4a" value="<?php echo $this->ifunction->ifnulls($dt_subchapter_18_11a[3]) ?>" /></td><td colspan="3"><input type="radio" name="no_chapter_18_11_4b" value="OK" <?php if($dt_subchapter_18_11a[4]=='OK') echo 'checked="checked"'; ?> /> OK <span style="padding:0 5px">&nbsp;</span> <input type="radio" name="no_chapter_18_11_4b" value="Not OK" <?php if($dt_subchapter_18_11a[4]=='Not OK') echo 'checked="checked"'; ?> /> NOK</td></tr>
<tr><td>Server 0 : 10.145.140.38</td><td colspan="5" align="center"><input type="text" name="no_chapter_18_11_5a" value="<?php echo $this->ifunction->ifnulls($dt_subchapter_18_11b[3]) ?>" /></td><td colspan="3"><input type="radio" name="no_chapter_18_11_5b" value="OK" <?php if($dt_subchapter_18_11b[4]=='OK') echo 'checked="checked"'; ?> /> OK <span style="padding:0 5px">&nbsp;</span> <input type="radio" name="no_chapter_18_11_5b" value="Not OK" <?php if($dt_subchapter_18_11b[4]=='Not OK') echo 'checked="checked"'; ?> /> NOK</td></tr>
</table>

<hr />

<?php $Qsubchapter = $this->db->query("SELECT `subno_chapter`, `content` FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `chapter`='18' AND `no_chapter`='18.12' ORDER BY `subno_chapter_order` ASC"); foreach($Qsubchapter->result_object() as $subchapter) $arr_subchapter_18_12[$subchapter->subno_chapter -1]=$subchapter ?>

<h3>Chapter 18.12: Synchronization Test for Dual Stack and Native IP configuration</h3>
<table class="border" cellpadding="0" cellspacing="0" style="font-size:11px">
<tr class="header"><td rowspan="3" width="100">Item Test</td><td colspan="9">Network Syncronization</td><td rowspan="3" width="50">Remark</td></tr>
<tr class="header"><td colspan="3">Dual Stack (2E1)</td><td colspan="3">Dual Stack (1E1)</td><td colspan="3">Native IP</td></tr>
<tr class="header"><td>Sync<br />priority</td><td colspan="2" width="65">Sync State</td><td>Sync<br />priority</td><td colspan="2" width="65">Sync State</td><td>Sync<br />priority</td><td colspan="2" width="65">Sync State</td></tr>

<?php
$arr_dt_1812 = array('E1 - 1', 'E1 - 2', 'IpSyncRef:1', 'IpSyncRef:2');
for($i=0; $i <= 3; $i++){
	$dt_subchapter_18_12 = explode('|', $arr_subchapter_18_12[$i]->content);
	echo '<tr><td width="100">'.$arr_dt_1812[$i].'</td>';
	echo '<td><input type="text" name="no_chapter_18_12_'.($i+1).'a" value="'.$this->ifunction->ifnulls($dt_subchapter_18_12[3]).'" /></td><td width="30" align="center"><input type="radio" name="no_chapter_18_12_'.($i+1).'b" value="OK" '; if($dt_subchapter_18_12[4]=='OK') echo 'checked="checked"'; echo ' /> OK</td><td width="30" align="center"><input type="radio" name="no_chapter_18_12_'.($i+1).'b" value="Not OK" '; if($dt_subchapter_18_12[4]=='Not OK') echo 'checked="checked"'; echo ' /> NOK</td>';
	echo '<td><input type="text" name="no_chapter_18_12_'.($i+1).'c" value="'.$this->ifunction->ifnulls($dt_subchapter_18_12[5]).'" /></td><td width="30" align="center"><input type="radio" name="no_chapter_18_12'.($i+1).'d" value="OK" '; if($dt_subchapter_18_12[6]=='OK') echo 'checked="checked"'; echo ' /> OK</td><td width="30" align="center"><input type="radio" name="no_chapter_18_12_'.($i+1).'d" value="Not OK" '; if($dt_subchapter_18_12[6]=='Not OK') echo 'checked="checked"'; echo ' /> NOK</td>';
	echo '<td><input type="text" name="no_chapter_18_12_'.($i+1).'e" value="'.$this->ifunction->ifnulls($dt_subchapter_18_12[7]).'" /></td><td width="30" align="center"><input type="radio" name="no_chapter_18_12_'.($i+1).'f" value="OK" '; if($dt_subchapter_18_12[8]=='OK') echo 'checked="checked"'; echo ' /> OK</td><td width="30" align="center"><input type="radio" name="no_chapter_18_12_'.($i+1).'f" value="Not OK" '; if($dt_subchapter_18_12[8]=='Not OK') echo 'checked="checked"'; echo ' /> NOK</td>';
	echo '<td width="50"><input type="text" name="no_chapter_18_12_'.($i+1).'g" value="'.$this->ifunction->ifnulls($dt_subchapter_18_12[9]).'" /></td></tr>';
}
?>
</table>

<hr />

<table class="border" cellpadding="0" cellspacing="0" style="font-size:11px">
<tr><td align="center"><b>NTP Server Check</b></td><td align="center"><b>Time Stamp</b></td><td colspan="2" align="center"><b>Status</b></td><td align="center"><b>Time Stamp</b></td><td colspan="2" align="center"><b>Status</b></td><td align="center"><b>Time Stamp</b></td><td colspan="2" align="center"><b>Status</b></td><td></td></tr>
<?php
$arr_dt_1812a = array(4=> 'Server 0 : 10.145.140.36', 'Server 0 : 10.145.140.38');
for($i=4; $i <= 5; $i++){
	$dt_subchapter_18_12a = explode('|', $arr_subchapter_18_12[$i]->content);
	echo '<tr><td width="100">'.$arr_dt_1812a[$i].'</td>';
	
	echo '
	<td><input type="text" name="no_chapter_18_12_'.($i+1).'a" value="'.$this->ifunction->ifnulls($dt_subchapter_18_12a[3]).'" /></td>
	
	<td width="30" align="center"><input type="radio" name="no_chapter_18_12_'.($i+1).'b" value="OK" '; if($dt_subchapter_18_12a[4]=='OK') echo 'checked="checked"'; echo ' /> OK</td><td width="30" align="center"><input type="radio" name="no_chapter_18_12_'.($i+1).'b" value="Not OK" '; if($dt_subchapter_18_12a[4]=='Not OK') echo 'checked="checked"'; echo ' /> NOK</td>';
	
	echo '<td><input type="text" name="no_chapter_18_12_'.($i+1).'c" value="'.$this->ifunction->ifnulls($dt_subchapter_18_12a[5]).'" /></td><td width="30" align="center"><input type="radio" name="no_chapter_18_12_'.($i+1).'d" value="OK" '; if($dt_subchapter_18_12a[6]=='OK') echo 'checked="checked"'; echo ' /> OK</td><td width="30" align="center"><input type="radio" name="no_chapter_18_12_'.($i+1).'d" value="Not OK" '; if($dt_subchapter_18_12a[6]=='Not OK') echo 'checked="checked"'; echo ' /> NOK</td>';
	
	echo '<td><input type="text" name="no_chapter_18_12_'.($i+1).'e" value="'.$this->ifunction->ifnulls($dt_subchapter_18_12a[7]).'" /></td><td width="30" align="center"><input type="radio" name="no_chapter_18_12_'.($i+1).'f" value="OK" '; if($dt_subchapter_18_12a[8]=='OK') echo 'checked="checked"'; echo ' /> OK</td><td width="30" align="center"><input type="radio" name="no_chapter_18_12_'.($i+1).'f" value="Not OK" '; if($dt_subchapter_18_12a[8]=='Not OK') echo 'checked="checked"'; echo ' /> NOK</td>';
	
	echo '<td width="50"><input type="text" name="no_chapter_18_12_'.($i+1).'g" value="'.$this->ifunction->ifnulls($dt_subchapter_18_12a[9]).'" /></td></tr>';
}
?>
</table>

<hr />

<center>
    <input type="button" class="button" name="prev" value="Prev" onclick="validasi(21, <?php echo $dx ?>)" />
    &emsp; <input type="reset" class="reset" value="Reset to Default"/> &emsp;
    <input type="button" class="button" name="next" value="Next" onclick="validasi(23, <?php echo $dx ?>)" />
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
		$col_a = 'no_chapter_18_10_'.$i.'a';
		$col_b = 'no_chapter_18_10_'.$i.'b';
		$col_c = 'no_chapter_18_10_'.$i.'c';
		$col_d = 'no_chapter_18_10_'.$i.'d';
		$col_e = 'no_chapter_18_10_'.$i.'e';
		$col_f = 'no_chapter_18_10_'.$i.'f';
		$col_g = 'no_chapter_18_10_'.$i.'g';
		
		$$col_a = kosong($$col_a);
		$$col_b = kosong($$col_b);
		$$col_c = kosong($$col_c);
		$$col_d = kosong($$col_d);
		$$col_e = kosong($$col_e);
		$$col_f = kosong($$col_f);
		$$col_g = kosong($$col_g);
		
		if(str_replace('null', 'null', $$col_a.$$col_b.$$col_c.$$col_d.$$col_e.$$col_f.$$col_g)){
			$quest[] = '18@18.10|No|'.$i.'|'.$$col_a.'|'.$$col_b.'|'.$$col_c.'|'.$$col_d.'|'.$$col_e.'|'.$$col_f.'|'.$$col_g;
		}
	}
	//----------------------------------------------------
	for($i=1; $i<=3; $i++)
	{
		$col_a = 'no_chapter_18_11_'.$i.'a';
		$col_b = 'no_chapter_18_11_'.$i.'b';
		$col_c = 'no_chapter_18_11_'.$i.'c';
		$col_d = 'no_chapter_18_11_'.$i.'d';
		$col_e = 'no_chapter_18_11_'.$i.'e';
		$col_f = 'no_chapter_18_11_'.$i.'f';
		$col_g = 'no_chapter_18_11_'.$i.'g';
		$col_h = 'no_chapter_18_11_'.$i.'h';
		
		$$col_a = kosong($$col_a);
		$$col_b = kosong($$col_b);
		$$col_c = kosong($$col_c);
		$$col_d = kosong($$col_d);
		$$col_e = kosong($$col_e);
		$$col_f = kosong($$col_f);
		$$col_g = kosong($$col_g);
		$$col_h = kosong($$col_h);
		
		if(str_replace('null', 'null', $$col_a.$$col_b.$$col_c.$$col_d.$$col_e.$$col_f.$$col_g.$$col_h)){
			$quest[] = '18@18.11|No|'.$i.'|'.$$col_a.'|'.$$col_b.'|'.$$col_c.'|'.$$col_d.'|'.$$col_e.'|'.$$col_f.'|'.$$col_g.'|'.$$col_h;
		}
	}
	//----------------------------------------------------
	for($i=4; $i<=5; $i++)
	{
		$col_a = 'no_chapter_18_11_'.$i.'a';
		$col_b = 'no_chapter_18_11_'.$i.'b';
		
		$$col_a = kosong($$col_a);
		$$col_b = kosong($$col_b);
		
		if(str_replace('null', 'null', $$col_a.$$col_b)){
			$quest[] = '18@18.11|No|'.$i.'|'.$$col_a.'|'.$$col_b;
		}
	}
	//----------------------------------------------------
	for($i=1; $i<=6; $i++)
	{
		$col_a = 'no_chapter_18_12_'.$i.'a';
		$col_b = 'no_chapter_18_12_'.$i.'b';
		$col_c = 'no_chapter_18_12_'.$i.'c';
		$col_d = 'no_chapter_18_12_'.$i.'d';
		$col_e = 'no_chapter_18_12_'.$i.'e';
		$col_f = 'no_chapter_18_12_'.$i.'f';
		$col_g = 'no_chapter_18_12_'.$i.'g';
		
		$$col_a = kosong($$col_a);
		$$col_b = kosong($$col_b);
		$$col_c = kosong($$col_c);
		$$col_d = kosong($$col_d);
		$$col_e = kosong($$col_e);
		$$col_f = kosong($$col_f);
		$$col_g = kosong($$col_g);
		
		if(str_replace('null', 'null', $$col_a.$$col_b.$$col_c.$$col_d.$$col_e.$$col_f.$$col_g)){
			$quest[] = '18@18.12|No|'.$i.'|'.$$col_a.'|'.$$col_b.'|'.$$col_c.'|'.$$col_d.'|'.$$col_e.'|'.$$col_f.'|'.$$col_g;
		}
	}
}
include 'paging.php';
?>

</body>
</html>