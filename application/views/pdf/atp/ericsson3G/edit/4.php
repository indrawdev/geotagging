<?php session_start(); if(empty($_SESSION['isat']['log'])) exit('<script>alert("Session expired, please re-login!");self.close();</script>');if ( ! defined('BASEPATH')) exit('No direct script access allowed'); $Qtit = $this->db->query("SELECT `title` FROM `it_atp` WHERE `atp_id`='$dx'"); $tit = $Qtit->result_object(); $title = $tit[0]->title; ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xml:lang="en" xmlns="http://www.w3.org/1999/xhtml" lang="en">
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
<title>Preload ATP Ericsson 3G (Page 4) - <?php echo $title ?></title>
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
<h1>Page 4</h1><br /><br />

<form name="preload3G" method="post" action="">

<?php $Qchapter = $this->db->query("SELECT `no_chapter`, `content` FROM `it_atp_chapter` WHERE `atp_id`='$dx' AND `chapter`='6' ORDER BY `atp_chapter_id` ASC"); foreach($Qchapter->result_object() as $chapter) $arr_chapter_6[str_replace('6.', '', $chapter->no_chapter) -1]=$chapter ?>

<h3>B. Preparing RBS for Acceptance / Stand alone test</h3>
<table class="border" cellpadding="0" cellspacing="0">
<tr class="header"><td width="40">Chapter</td><td>Title work performed</td><td width="30">OK</td><td width="40">Not OK</td><td width="35">N/A</td><td width="90">Remark</td></tr>
<tr><td valign="top"><b>6</b><br />6.1<br />6.2<br />6.3<br />6.4<br />6.5<br />6.6<br />6.7<br />6.8<br />6.9</td>
<td valign="top"><b>RBS, RNC and RANAG Setting Parameter</b><br />RBS, RNC and RANAG Information Database<br />RBS Cell Parameter<br />VCI Allocation on VPC Terminating in End RBS<br />IP Transport Configuration<br />Mub-c configuration<br />Channel Element Capacity<br />RBS License Feature<br />Qos Configuration Settings<br />Verify RBS IMA Adaptation Parameter</td>
<td valign="top" align="center">
<?php echo '<br />';
for($i=0; $i <= 8; $i++){
	echo '<input type="radio" name="no_chapter_6_'.($i+1).'" value="OK" '; if($arr_chapter_6[$i]->content=='OK') echo 'checked="checked"'; echo '><br />';
}
?>
</td><td valign="top" align="center">
<?php echo '<br />';
for($i=0; $i <= 8; $i++){
	echo '<input type="radio" name="no_chapter_6_'.($i+1).'" value="Not OK" '; if($arr_chapter_6[$i]->content=='Not OK') echo 'checked="checked"'; echo '><br />';
}
?>
</td><td valign="top" align="center">
<?php echo '<br />';
for($i=0; $i <= 8; $i++){
	echo '<input type="radio" name="no_chapter_6_'.($i+1).'" value="N/A" '; if($arr_chapter_6[$i]->content=='N/A') echo 'checked="checked"'; echo '><br />';
}
?>
</td>
<td valign="top" align="center"><?php echo '<br />'; for($i=0; $i <= 8; $i++) echo 'Major<br />' ?></td></tr>
</table>

<?php $Qsubchapter = $this->db->query("SELECT `subno_chapter`, `content` FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `chapter`='6' AND `no_chapter`='6.1' ORDER BY `subno_chapter_order` ASC"); foreach($Qsubchapter->result_object() as $subchapter) $arr_subchapter_6_1[$subchapter->subno_chapter -1]=$subchapter ?>

<h3>Chapter 6.1: RBS, RNC and RANAG Information Database (dilihat dari laptop/phisycal check)</h3>
<table class="border" cellpadding="0" cellspacing="0">
<tr class="header"><td rowspan="2">Parameter</td><td rowspan="2">RNC</td><td colspan="2">*RANAG (RXI 820)</td><td rowspan="2">RBS</td></tr>
<tr class="header"><td>RXI to RNC</td><td>RXI to RBS</td></tr>
<?php
$arr_dt_61 = array('Node Name', 'Aal2Sp', 'PLMN ID', 'Routing Area Code', 'Location Area Code', 'Service Area Code', 'O&M Link (IP Address)', 'ET-Board Port', 'VPI / VCI', 'Transmission Capacity');
for($i=0; $i <= 9; $i++){
	$dt_subchapter_6_1 = explode('|', $arr_subchapter_6_1[$i]->content);
	echo '<tr><td>'.$arr_dt_61[$i].'</td><td><input type="text" name="no_chapter_6_1_'.($i+1).'a" value="'.$this->ifunction->ifnulls($dt_subchapter_6_1[3]).'" /></td><td><input type="text" name="no_chapter_6_1_'.($i+1).'b" value="'.$this->ifunction->ifnulls($dt_subchapter_6_1[4]).'" /></td><td><input type="text" name="no_chapter_6_1_'.($i+1).'c" value="'.$this->ifunction->ifnulls($dt_subchapter_6_1[5]).'" /></td><td><input type="text" name="no_chapter_6_1_'.($i+1).'d" value="'.$this->ifunction->ifnulls($dt_subchapter_6_1[6]).'" /></td></tr>';
}
?>
</table>
<p style="font-size:11px"><i>* Input / Output</i></p>

<?php $Qsubchapter = $this->db->query("SELECT `subno_chapter`, `content` FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `chapter`='6' AND `no_chapter`='6.2' ORDER BY `subno_chapter_order` ASC"); foreach($Qsubchapter->result_object() as $subchapter) $arr_subchapter_6_2[$subchapter->subno_chapter -1]=$subchapter ?>

<h3>Chapter 6.2: RBS Cell Parameter</h3>
<table class="border" cellpadding="0" cellspacing="0">
<tr class="header"><td>Parameter</td><td>Sector 1</td><td>Sector 2</td><td>Sector 3</td><td>Sector 4</td><td>Sector 5</td><td>Sector 6</td><td>Remark</td></tr>
<?php
$arr_dt_62 = array('Service area code (SAC)', 'CELL ID', 'Primary Scrambling Code (PSC)', 'Adjacent Cell PSC');
for($i=0; $i <= 3; $i++){
	$dt_subchapter_6_2 = explode('|', $arr_subchapter_6_2[$i]->content);
	echo '<tr><td>'.$arr_dt_62[$i].'</td><td><input type="text" name="no_chapter_6_2_'.($i+1).'a" value="'.$this->ifunction->ifnulls($dt_subchapter_6_2[3]).'" /></td><td><input type="text" name="no_chapter_6_2_'.($i+1).'b" value="'.$this->ifunction->ifnulls($dt_subchapter_6_2[4]).'" /></td><td><input type="text" name="no_chapter_6_2_'.($i+1).'c" value="'.$this->ifunction->ifnulls($dt_subchapter_6_2[5]).'" /></td><td><input type="text" name="no_chapter_6_2_'.($i+1).'d" value="'.$this->ifunction->ifnulls($dt_subchapter_6_2[6]).'" /></td><td><input type="text" name="no_chapter_6_2_'.($i+1).'e" value="'.$this->ifunction->ifnulls($dt_subchapter_6_2[7]).'" /></td><td><input type="text" name="no_chapter_6_2_'.($i+1).'f" value="'.$this->ifunction->ifnulls($dt_subchapter_6_2[8]).'" /></td><td><input type="text" name="no_chapter_6_2_'.($i+1).'g" value="'.$this->ifunction->ifnulls($dt_subchapter_6_2[9]).'" /></td></tr>';
}
?>
</table>

<hr />

<center>
    <input type="button" class="button" name="prev" value="Prev" onclick="validasi(3, <?php echo $dx ?>)" />
    &emsp; <input type="reset" class="reset" value="Reset to Default"/> &emsp;
    <input type="button" class="button" name="next" value="Next" onclick="validasi(5, <?php echo $dx ?>)" />
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
	
	for($i=1; $i<=9; $i++)
	{
		$chp = 'no_chapter_6_'.$i;
		if(isset($$chp)) $quest[] = '6|No|6.'.$i.'|'.$$chp; else { $$chp = "null"; $quest[] = '6|No|6.'.$i.'|'.$$chp; }
	}
	//----------------------------------------------------
	for($i=1; $i<=10; $i++)
	{
		$col_a = 'no_chapter_6_1_'.$i.'a';
		$col_b = 'no_chapter_6_1_'.$i.'b';
		$col_c = 'no_chapter_6_1_'.$i.'c';
		$col_d = 'no_chapter_6_1_'.$i.'d';
		
		$$col_a = kosong($$col_a);
		$$col_b = kosong($$col_b);
		$$col_c = kosong($$col_c);
		$$col_d = kosong($$col_d);
		
		if(str_replace('null', 'null', $$col_a.$$col_b.$$col_c.$$col_d)){
			$quest[] = '6@6.1|No|'.$i.'|'.$$col_a.'|'.$$col_b.'|'.$$col_c.'|'.$$col_d;
		}
		else{
			$user_id = $hasil[0]->user_id;
			$this->db->query("DELETE FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `user_id`='$user_id' AND `chapter`='6' AND `no_chapter`='6.1' AND `subno_chapter`='$i'");
		}
	}
	//----------------------------------------------------
	for($i=1; $i<=4; $i++)
	{
		$col_a = 'no_chapter_6_2_'.$i.'a';
		$col_b = 'no_chapter_6_2_'.$i.'b';
		$col_c = 'no_chapter_6_2_'.$i.'c';
		$col_d = 'no_chapter_6_2_'.$i.'d';
		$col_e = 'no_chapter_6_2_'.$i.'e';
		$col_f = 'no_chapter_6_2_'.$i.'f';
		$col_g = 'no_chapter_6_2_'.$i.'g';
		
		$$col_a = kosong($$col_a);
		$$col_b = kosong($$col_b);
		$$col_c = kosong($$col_c);
		$$col_d = kosong($$col_d);
		$$col_e = kosong($$col_e);
		$$col_f = kosong($$col_f);
		$$col_g = kosong($$col_g);
		
		if(str_replace('null', 'null', $$col_a.$$col_b.$$col_c.$$col_d.$$col_e.$$col_f.$$col_g)){
			$quest[] = '6@6.2|No|'.$i.'|'.$$col_a.'|'.$$col_b.'|'.$$col_c.'|'.$$col_d.'|'.$$col_e.'|'.$$col_f.'|'.$$col_g;
		}
		else{
			$user_id = $hasil[0]->user_id;
			$this->db->query("DELETE FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `user_id`='$user_id' AND `chapter`='6' AND `no_chapter`='6.2' AND `subno_chapter`='$i'");
		}
	}
}
include 'paging.php';
?>

</body>
</html>