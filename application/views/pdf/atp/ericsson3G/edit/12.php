<?php session_start(); if(empty($_SESSION['isat']['log'])) exit('<script>alert("Session expired, please re-login!");self.close();</script>');if ( ! defined('BASEPATH')) exit('No direct script access allowed'); $Qtit = $this->db->query("SELECT `title` FROM `it_atp` WHERE `atp_id`='$dx'"); $tit = $Qtit->result_object(); $title = $tit[0]->title; ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xml:lang="en" xmlns="http://www.w3.org/1999/xhtml" lang="en">
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
<title>Preload ATP Ericsson 3G (Page 12) - <?php echo $title ?></title>
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
<h1>Page 12</h1><br /><br />

<form name="preload3G" method="post" action="">

<?php $Qsubchapter = $this->db->query("SELECT `subno_chapter`, `content` FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `chapter`='10' AND `no_chapter`='10.8' ORDER BY `subno_chapter_order` ASC"); foreach($Qsubchapter->result_object() as $subchapter) $arr_subchapter_10_8[$subchapter->subno_chapter -1]=$subchapter ?>

<h3>Chapter 10.8: Outdoor Jumper Cable (From ASC to Antenna)</h3>
<table class="border" cellpadding="0" cellspacing="0">
<tr class="header"><td width="40">Test No</td><td width="60">Antenna Sector</td><td>Type</td><td>Brand</td><td>Length (M)</td><td width="35">N/A</td><td>Remark</td></tr>
<?php
$arr_dt_108a = array('10.8.1.A', '10.8.1.B', '10.8.2.A', '10.8.2.B', '10.8.3.A', '10.8.3.B', '10.8.4.A', '10.8.4.B', '10.8.5.A', '10.8.5.B', '10.8.6.A', '10.8.6.B');
$arr_dt_108b = array('Sector 1 A', 'Sector 1 B', 'Sector 2 A', 'Sector 2 B', 'Sector 3 A', 'Sector 3 B', 'Sector 4 A', 'Sector 4 B', 'Sector 5 A', 'Sector 5 B', 'Sector 6 A', 'Sector 6 B');
for($i=0; $i <= 11; $i++){
	$dt_subchapter_10_8 = explode('|', $arr_subchapter_10_8[$i]->content);
	echo '<tr><td>'.$arr_dt_108a[$i].'</td><td>'.$arr_dt_108b[$i].'</td><td><input type="text" name="no_chapter_10_8_'.($i+1).'a" value="'.$this->ifunction->ifnulls($dt_subchapter_10_8[3]).'" /></td><td><input type="text" name="no_chapter_10_8_'.($i+1).'b" value="'.$this->ifunction->ifnulls($dt_subchapter_10_8[4]).'" /></td><td><input type="text" name="no_chapter_10_8_'.($i+1).'c" value="'.$this->ifunction->ifnulls($dt_subchapter_10_8[5]).'" /></td><td align="center"><input type="radio" name="no_chapter_10_8_'.($i+1).'d" value="N/A" '; if($dt_subchapter_10_8[6]=='N/A') echo 'checked="checked"'; echo ' /></td><td><input type="text" name="no_chapter_10_8_'.($i+1).'e" value="'.$this->ifunction->ifnulls($dt_subchapter_10_8[7]).'" /></td></tr>';
}
?>
</table>

<?php $Qsubchapter = $this->db->query("SELECT `subno_chapter`, `content` FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `chapter`='10' AND `no_chapter`='10.9' ORDER BY `subno_chapter_order` ASC"); foreach($Qsubchapter->result_object() as $subchapter) $arr_subchapter_10_9[$subchapter->subno_chapter -1]=$subchapter ?>

<h3>Chapter 10.9: Indoor Jumper Cable (Bottom)</h3>
<table class="border" cellpadding="0" cellspacing="0">
<tr class="header"><td width="40">Test No</td><td width="60">Antenna Sector</td><td>Type</td><td>Brand</td><td>Length (M)</td><td width="35">N/A</td><td>Remark</td></tr>
<?php
$arr_dt_109a = array('10.9.1.A', '10.9.1.B', '10.9.2.A', '10.9.2.B', '10.9.3.A', '10.9.3.B', '10.9.4.A', '10.9.4.B', '10.9.5.A', '10.9.5.B', '10.9.6.A', '10.9.6.B');
$arr_dt_109b = array('Sector 1 A', 'Sector 1 B', 'Sector 2 A', 'Sector 2 B', 'Sector 3 A', 'Sector 3 B', 'Sector 4 A', 'Sector 4 B', 'Sector 5 A', 'Sector 5 B', 'Sector 6 A', 'Sector 6 B');
for($i=0; $i <= 11; $i++){
	$dt_subchapter_10_9 = explode('|', $arr_subchapter_10_9[$i]->content);
	echo '<tr><td>'.$arr_dt_109a[$i].'</td><td>'.$arr_dt_109b[$i].'</td><td><input type="text" name="no_chapter_10_9_'.($i+1).'a" value="'.$this->ifunction->ifnulls($dt_subchapter_10_9[3]).'" /></td><td><input type="text" name="no_chapter_10_9_'.($i+1).'b" value="'.$this->ifunction->ifnulls($dt_subchapter_10_9[4]).'" /></td><td><input type="text" name="no_chapter_10_9_'.($i+1).'c" value="'.$this->ifunction->ifnulls($dt_subchapter_10_9[5]).'" /></td><td align="center"><input type="radio" name="no_chapter_10_9_'.($i+1).'d" value="N/A" '; if($dt_subchapter_10_9[6]=='N/A') echo 'checked="checked"'; echo ' /></td><td><input type="text" name="no_chapter_10_9_'.($i+1).'e" value="'.$this->ifunction->ifnulls($dt_subchapter_10_9[7]).'" /></td></tr>';
}
?>
</table>
<p style="font-size:11px"><i>Note: Length of coaxial feeder refer to measurement on distance to fault</i></p>

<?php $Qchapter = $this->db->query("SELECT `no_chapter`, `content` FROM `it_atp_chapter` WHERE `atp_id`='$dx' AND `chapter`='11' ORDER BY `atp_chapter_id` ASC"); foreach($Qchapter->result_object() as $chapter) $arr_chapter_11[str_replace('11.', '', $chapter->no_chapter) -1]=$chapter ?>

<table class="border" cellpadding="0" cellspacing="0">
<tr class="header"><td width="40">Chapter</td><td>Title work performed</td><td width="30">OK</td><td width="40">Not OK</td><td width="35">N/A</td><td width="90">Remark</td></tr>
<tr><td valign="top"><b>11</b><br />11.1</td><td valign="top"><b>Installation and construction</b><br />Installation antenna system</td>
<td valign="top" align="center"><br /><input type="radio" name="no_chapter_11_1" value="OK" <?php if($arr_chapter_11[0]->content=='OK') echo 'checked="checked"'; ?> />
</td><td valign="top" align="center"><br /><input type="radio" name="no_chapter_11_1" value="Not OK" <?php if($arr_chapter_11[0]->content=='Not OK') echo 'checked="checked"'; ?> /></td>
<td valign="top" align="center"><br /><input type="radio" name="no_chapter_11_1" value="N/A" <?php if($arr_chapter_11[0]->content=='N/A') echo 'checked="checked"'; ?> /></td>
<td valign="top" align="center"><br />Major</td></tr>
</table>

<hr />

<center>
    <input type="button" class="button" name="prev" value="Prev" onclick="validasi(11, <?php echo $dx ?>)" />
    &emsp; <input type="reset" class="reset" value="Reset to Default"/> &emsp;
    <input type="button" class="button" name="next" value="Next" onclick="validasi(13, <?php echo $dx ?>)" />
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
	
	for($i=1; $i<=12; $i++)
	{
		$col_a = 'no_chapter_10_8_'.$i.'a';
		$col_b = 'no_chapter_10_8_'.$i.'b';
		$col_c = 'no_chapter_10_8_'.$i.'c';
		$col_d = 'no_chapter_10_8_'.$i.'d';
		$col_e = 'no_chapter_10_8_'.$i.'e';
		
		$$col_a = kosong($$col_a);
		$$col_b = kosong($$col_b);
		$$col_c = kosong($$col_c);
		$$col_d = kosong($$col_d);
		$$col_e = kosong($$col_e);
		
		if(str_replace('null', 'null', $$col_a.$$col_b.$$col_c.$$col_d.$$col_e)){
			$quest[] = '10@10.8|No|'.$i.'|'.$$col_a.'|'.$$col_b.'|'.$$col_c.'|'.$$col_d.'|'.$$col_e;
		}
	}
	//----------------------------------------------------
	for($i=1; $i<=12; $i++)
	{
		$col_a = 'no_chapter_10_9_'.$i.'a';
		$col_b = 'no_chapter_10_9_'.$i.'b';
		$col_c = 'no_chapter_10_9_'.$i.'c';
		$col_d = 'no_chapter_10_9_'.$i.'d';
		$col_e = 'no_chapter_10_9_'.$i.'e';
		
		$$col_a = kosong($$col_a);
		$$col_b = kosong($$col_b);
		$$col_c = kosong($$col_c);
		$$col_d = kosong($$col_d);
		$$col_e = kosong($$col_e);
		
		if(str_replace('null', 'null', $$col_a.$$col_b.$$col_c.$$col_d.$$col_e)){
			$quest[] = '10@10.9|No|'.$i.'|'.$$col_a.'|'.$$col_b.'|'.$$col_c.'|'.$$col_d.'|'.$$col_e;
		}
	}
	//----------------------------------------------------
	if(isset($no_chapter_11_1)) $quest[] = '11|No|11.1|'.$no_chapter_11_1; else { $quest[] = '11|No|11.1|null'; }
}

include 'paging.php';
?>

</body>
</html>