<?php session_start(); if(empty($_SESSION['isat']['log'])) exit('<script>alert("Session expired, please re-login!");self.close();</script>');if ( ! defined('BASEPATH')) exit('No direct script access allowed'); $Qtit = $this->db->query("SELECT `title` FROM `it_atp` WHERE `atp_id`='$dx'"); $tit = $Qtit->result_object(); $title = $tit[0]->title; ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xml:lang="en" xmlns="http://www.w3.org/1999/xhtml" lang="en">
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
<title>Preload ATP Ericsson 3G (Page 23) - <?php echo $title ?></title>
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
<h1>Page 23</h1><br /><br />

<form name="preload3G" method="post" action="">

<?php $Qsubchapter = $this->db->query("SELECT `subno_chapter`, `content` FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `chapter`='18' AND `no_chapter`='18.13' ORDER BY `subno_chapter_order` ASC"); foreach($Qsubchapter->result_object() as $subchapter) $arr_subchapter_18_13[$subchapter->subno_chapter -1]=$subchapter ?>

<h3>Chapter 18.13: OAM Link ATM & IP Connectivity to OSS Test</h3>
<table class="border" cellpadding="0" cellspacing="0" style="font-size:11px">
<tr class="header"><td rowspan="3" width="100">Item Test</td><td colspan="9">OAM Link ATM & IP Connectivity to OSS Test</td><td rowspan="3" width="50">Remark</td></tr>
<tr class="header"><td colspan="3">Dual Stack (2E1)</td><td colspan="3">Dual Stack (1E1)</td><td colspan="3">Native IP</td></tr>
<tr class="header"><td>IP<br />address</td><td colspan="2" width="65">Status</td><td>IP<br />address</td><td colspan="2" width="65">Status</td><td>IP<br />address</td><td colspan="2" width="65">Status</td></tr>

<?php
$arr_dt_1813a = array('Ping to OSS (10.145.140.40)', 'Trace Route to OSS (10.145.140.40)');
$arr_dt_1813b = array('OSS IP addr', 'NextHop Addr Mub-A');
$arr_dt_1813c = array('OSS IP addr', 'NextHop Addr Mub-B');
$arr_dt_1813d = array('OSS IP addr', 'NextHop Addr Mub-C');
for($i=0; $i <= 1; $i++){
	$dt_subchapter_18_13 = explode('|', $arr_subchapter_18_13[$i]->content);
	echo '<tr><td width="100">'.$arr_dt_1813a[$i].'</td>';
	echo '<td><i>'.$arr_dt_1813b[$i].'</i></td><td width="30" align="center"><input type="radio" name="no_chapter_18_13_'.($i+1).'a" value="OK" '; if($dt_subchapter_18_13[3]=='OK') echo 'checked="checked"'; echo ' /> OK</td><td width="30" align="center"><input type="radio" name="no_chapter_18_13_'.($i+1).'a" value="Not OK" '; if($dt_subchapter_18_13[3]=='Not OK') echo 'checked="checked"'; echo ' /> NOK</td>';
	echo '<td><i>'.$arr_dt_1813c[$i].'</i></td><td width="30" align="center"><input type="radio" name="no_chapter_18_13_'.($i+1).'b" value="OK" '; if($dt_subchapter_18_13[4]=='OK') echo 'checked="checked"'; echo ' /> OK</td><td width="30" align="center"><input type="radio" name="no_chapter_18_13_'.($i+1).'b" value="Not OK" '; if($dt_subchapter_18_13[4]=='Not OK') echo 'checked="checked"'; echo ' /> NOK</td>';
	echo '<td><i>'.$arr_dt_1813d[$i].'</i></td><td width="30" align="center"><input type="radio" name="no_chapter_18_13_'.($i+1).'c" value="OK" '; if($dt_subchapter_18_13[5]=='OK') echo 'checked="checked"'; echo ' /> OK</td><td width="30" align="center"><input type="radio" name="no_chapter_18_13_'.($i+1).'c" value="Not OK" '; if($dt_subchapter_18_13[5]=='Not OK') echo 'checked="checked"'; echo ' /> NOK</td>';
	echo '<td width="50"><input type="text" name="no_chapter_18_13_'.($i+1).'d" value="'.$this->ifunction->ifnulls($dt_subchapter_18_13[6]).'" /></td></tr>';
}
?>
</table>

<?php $Qsubchapter = $this->db->query("SELECT `subno_chapter`, `content` FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `chapter`='18' AND `no_chapter`='18.14' ORDER BY `subno_chapter_order` ASC"); foreach($Qsubchapter->result_object() as $subchapter) $arr_subchapter_18_14[$subchapter->subno_chapter -1]=$subchapter;
$dt_subchapter_18_14a = explode('|', $arr_subchapter_18_14[0]->content);
$dt_subchapter_18_14b = explode('|', $arr_subchapter_18_14[1]->content);
$dt_subchapter_18_14c = explode('|', $arr_subchapter_18_14[2]->content);
$dt_subchapter_18_14d = explode('|', $arr_subchapter_18_14[3]->content);
$dt_subchapter_18_14e = explode('|', $arr_subchapter_18_14[4]->content);
$dt_subchapter_18_14f = explode('|', $arr_subchapter_18_14[5]->content);
$dt_subchapter_18_14g = explode('|', $arr_subchapter_18_14[6]->content);
$dt_subchapter_18_14h = explode('|', $arr_subchapter_18_14[7]->content);?>

<h3>Chapter 18.14: IMA Bandwidth Adaptation Functionality Test</h3>
<table class="border" cellpadding="0" cellspacing="0">
<tr class="header"><td rowspan="2">No</td><td colspan="8">Link Connect State Test</td><td colspan="4">Call Connect State Check</td><td colspan="3">IMA Group State</td></tr>
<tr class="header"><td >E1</td><td >E2</td><td >E3</td><td >E4</td><td >E5</td><td >E6</td><td >E7</td><td >E8</td><td >On Going CS- Call (Voice)</td><td >On Going PS- Call (HSDPA)</td><td >New CS- Call (Voice)</td><td >New PS- Call (HSDPA)</td><td >OK</td><td >NOK</td><td>N/A</td></tr>

<tr><td rowspan="2">1</td>
<td rowspan="2" bgcolor="#666666">on</td><td rowspan="2" bgcolor="#666666">on</td><td rowspan="2">off</td><td rowspan="2">off</td><td rowspan="2">off</td><td rowspan="2">off</td><td rowspan="2">off</td><td rowspan="2">off</td>
<td><i>Connected</i></td><td><i>Connected</i></td><td><i>Successful</i></td><td><i>Successful</i></td>
<td rowspan="2" align="center"><input type="radio" name="no_chapter_18_14_1" value="OK" <?php if($dt_subchapter_18_14a[3]=='OK') echo 'checked="checked"'; ?> /></td><td rowspan="2" align="center"><input type="radio" name="no_chapter_18_14_1" value="Not OK" <?php if($dt_subchapter_18_14a[3]=='Not OK') echo 'checked="checked"'; ?> /></td><td rowspan="2" align="center"><input type="radio" name="no_chapter_18_14_1" value="N/A" <?php if($dt_subchapter_18_14a[3]=='N/A') echo 'checked="checked"'; ?> /></td>
</tr><tr><td><i>disconnect</i></td><td><i>disconnect</i></td><td><i>Failed</i></td><td><i>Failed</i></td></tr>

<tr><td rowspan="2">2</td>
<td rowspan="2">off</td><td rowspan="2" bgcolor="#666666">on</td><td rowspan="2" bgcolor="#666666">on</td><td rowspan="2">off</td><td rowspan="2">off</td><td rowspan="2">off</td><td rowspan="2">off</td><td rowspan="2">off</td>
<td><i>Connected</i></td><td><i>Connected</i></td><td><i>Successful</i></td><td><i>Successful</i></td>
<td rowspan="2" align="center"><input type="radio" name="no_chapter_18_14_2" value="OK" <?php if($dt_subchapter_18_14b[3]=='OK') echo 'checked="checked"'; ?> /></td><td rowspan="2" align="center"><input type="radio" name="no_chapter_18_14_2" value="Not OK" <?php if($dt_subchapter_18_14b[3]=='Not OK') echo 'checked="checked"'; ?> /></td><td rowspan="2" align="center"><input type="radio" name="no_chapter_18_14_2" value="N/A" <?php if($dt_subchapter_18_14b[3]=='N/A') echo 'checked="checked"'; ?> /></td>
</tr><tr><td><i>disconnect</i></td><td><i>disconnect</i></td><td><i>Failed</i></td><td><i>Failed</i></td></tr>

<tr><td rowspan="2">3</td>
<td rowspan="2">off</td><td rowspan="2">off</td><td rowspan="2" bgcolor="#666666">on</td><td rowspan="2" bgcolor="#666666">on</td><td rowspan="2">off</td><td rowspan="2">off</td><td rowspan="2">off</td><td rowspan="2">off</td>
<td><i>Connected</i></td><td><i>Connected</i></td><td><i>Successful</i></td><td><i>Successful</i></td>
<td rowspan="2" align="center"><input type="radio" name="no_chapter_18_14_3" value="OK" <?php if($dt_subchapter_18_14c[3]=='OK') echo 'checked="checked"'; ?> /></td><td rowspan="2" align="center"><input type="radio" name="no_chapter_18_14_3" value="Not OK" <?php if($dt_subchapter_18_14c[3]=='Not OK') echo 'checked="checked"'; ?> /></td><td rowspan="2" align="center"><input type="radio" name="no_chapter_18_14_3" value="N/A" <?php if($dt_subchapter_18_14c[3]=='N/A') echo 'checked="checked"'; ?> /></td>
</tr><tr><td><i>disconnect</i></td><td><i>disconnect</i></td><td><i>Failed</i></td><td><i>Failed</i></td></tr>

<tr><td rowspan="2">4</td>
<td rowspan="2">off</td><td rowspan="2">off</td><td rowspan="2">off</td><td rowspan="2" bgcolor="#666666">on</td><td rowspan="2" bgcolor="#666666">on</td><td rowspan="2">off</td><td rowspan="2">off</td><td rowspan="2">off</td>
<td><i>Connected</i></td><td><i>Connected</i></td><td><i>Successful</i></td><td><i>Successful</i></td>
<td rowspan="2" align="center"><input type="radio" name="no_chapter_18_14_4" value="OK" <?php if($dt_subchapter_18_14d[3]=='OK') echo 'checked="checked"'; ?> /></td><td rowspan="2" align="center"><input type="radio" name="no_chapter_18_14_4" value="Not OK" <?php if($dt_subchapter_18_14d[3]=='Not OK') echo 'checked="checked"'; ?> /></td><td rowspan="2" align="center"><input type="radio" name="no_chapter_18_14_4" value="N/A" <?php if($dt_subchapter_18_14d[3]=='N/A') echo 'checked="checked"'; ?> /></td>
</tr><tr><td><i>disconnect</i></td><td><i>disconnect</i></td><td><i>Failed</i></td><td><i>Failed</i></td></tr>

<tr><td rowspan="2">5</td>
<td rowspan="2">off</td><td rowspan="2">off</td><td rowspan="2">off</td><td rowspan="2">off</td><td rowspan="2" bgcolor="#666666">on</td><td rowspan="2" bgcolor="#666666">on</td><td rowspan="2">off</td><td rowspan="2">off</td>
<td><i>Connected</i></td><td><i>Connected</i></td><td><i>Successful</i></td><td><i>Successful</i></td>
<td rowspan="2" align="center"><input type="radio" name="no_chapter_18_14_5" value="OK" <?php if($dt_subchapter_18_14e[3]=='OK') echo 'checked="checked"'; ?> /></td><td rowspan="2" align="center"><input type="radio" name="no_chapter_18_14_5" value="Not OK" <?php if($dt_subchapter_18_14e[3]=='Not OK') echo 'checked="checked"'; ?> /></td><td rowspan="2" align="center"><input type="radio" name="no_chapter_18_14_5" value="N/A" <?php if($dt_subchapter_18_14e[3]=='N/A') echo 'checked="checked"'; ?> /></td>
</tr><tr><td><i>disconnect</i></td><td><i>disconnect</i></td><td><i>Failed</i></td><td><i>Failed</i></td></tr>

<tr><td rowspan="2">6</td>
<td rowspan="2">off</td><td rowspan="2">off</td><td rowspan="2">off</td><td rowspan="2">off</td><td rowspan="2">off</td><td rowspan="2" bgcolor="#666666">on</td><td rowspan="2" bgcolor="#666666">on</td><td rowspan="2">off</td>
<td><i>Connected</i></td><td><i>Connected</i></td><td><i>Successful</i></td><td><i>Successful</i></td>
<td rowspan="2" align="center"><input type="radio" name="no_chapter_18_14_6" value="OK" <?php if($dt_subchapter_18_14f[3]=='OK') echo 'checked="checked"'; ?> /></td><td rowspan="2" align="center"><input type="radio" name="no_chapter_18_14_6" value="Not OK" <?php if($dt_subchapter_18_14f[3]=='Not OK') echo 'checked="checked"'; ?> /></td><td rowspan="2" align="center"><input type="radio" name="no_chapter_18_14_6" value="N/A" <?php if($dt_subchapter_18_14f[3]=='N/A') echo 'checked="checked"'; ?> /></td>
</tr><tr><td><i>disconnect</i></td><td><i>disconnect</i></td><td><i>Failed</i></td><td><i>Failed</i></td></tr>

<tr><td rowspan="2">7</td>
<td rowspan="2">off</td><td rowspan="2">off</td><td rowspan="2">off</td><td rowspan="2">off</td><td rowspan="2">off</td><td rowspan="2">off</td><td rowspan="2" bgcolor="#666666">on</td><td rowspan="2" bgcolor="#666666">on</td>
<td><i>Connected</i></td><td><i>Connected</i></td><td><i>Successful</i></td><td><i>Successful</i></td>
<td rowspan="2" align="center"><input type="radio" name="no_chapter_18_14_7" value="OK" <?php if($dt_subchapter_18_14g[3]=='OK') echo 'checked="checked"'; ?> /></td><td rowspan="2" align="center"><input type="radio" name="no_chapter_18_14_7" value="Not OK" <?php if($dt_subchapter_18_14g[3]=='Not OK') echo 'checked="checked"'; ?> /></td><td rowspan="2" align="center"><input type="radio" name="no_chapter_18_14_7" value="N/A" <?php if($dt_subchapter_18_14g[3]=='N/A') echo 'checked="checked"'; ?> /></td>
</tr><tr><td><i>disconnect</i></td><td><i>disconnect</i></td><td><i>Failed</i></td><td><i>Failed</i></td></tr>

<tr><td rowspan="2">8</td>
<td rowspan="2" bgcolor="#666666">on</td><td rowspan="2" bgcolor="#666666">on</td><td rowspan="2" bgcolor="#666666">on</td><td rowspan="2" bgcolor="#666666">on</td><td rowspan="2" bgcolor="#666666">on</td><td rowspan="2" bgcolor="#666666">on</td><td rowspan="2" bgcolor="#666666">on</td><td rowspan="2" bgcolor="#666666">on</td>
<td><i>Connected</i></td><td><i>Connected</i></td><td><i>Successful</i></td><td><i>Successful</i></td>
<td rowspan="2" align="center"><input type="radio" name="no_chapter_18_14_8" value="OK" <?php if($dt_subchapter_18_14h[3]=='OK') echo 'checked="checked"'; ?> /></td><td rowspan="2" align="center"><input type="radio" name="no_chapter_18_14_8" value="Not OK" <?php if($dt_subchapter_18_14h[3]=='Not OK') echo 'checked="checked"'; ?> /></td><td rowspan="2" align="center"><input type="radio" name="no_chapter_18_14_8" value="N/A" <?php if($dt_subchapter_18_14h[3]=='N/A') echo 'checked="checked"'; ?> /></td>
</tr><tr><td><i>disconnect</i></td><td><i>disconnect</i></td><td><i>Failed</i></td><td><i>Failed</i></td></tr></table>

<hr />

<center>
    <input type="button" class="button" name="prev" value="Prev" onclick="validasi(22, <?php echo $dx ?>)" />
    &emsp; <input type="reset" class="reset" value="Reset to Default"/> &emsp;
    <input type="button" class="button" name="next" value="Next" onclick="validasi(24, <?php echo $dx ?>)" />
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
		$col_a = 'no_chapter_18_13_'.$i.'a';
		$col_b = 'no_chapter_18_13_'.$i.'b';
		$col_c = 'no_chapter_18_13_'.$i.'c';
		$col_d = 'no_chapter_18_13_'.$i.'d';
		
		$$col_a = kosong($$col_a);
		$$col_b = kosong($$col_b);
		$$col_c = kosong($$col_c);
		$$col_d = kosong($$col_d);
		
		if(str_replace('null', 'null', $$col_a.$$col_b.$$col_c.$$col_d)){
			$quest[] = '18@18.13|No|'.$i.'|'.$$col_a.'|'.$$col_b.'|'.$$col_c.'|'.$$col_d;
		}
	}
	//----------------------------------------------------
	for($i=1; $i<=8; $i++)
	{
		$chp = 'no_chapter_18_14_'.$i;
		if(isset($$chp)) $quest[] = '18@18.14|No|'.$i.'|'.$$chp; else { $$chp = "null";  $quest[] = '18@18.14|No|'.$i.'|'.$$chp; }
	}
}

include 'paging.php';
?>

</body>
</html>