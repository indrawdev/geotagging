<?php session_start(); if(empty($_SESSION['isat']['log'])) exit('<script>alert("Session expired, please re-login!");self.close();</script>'); if ( ! defined('BASEPATH')) exit('No direct script access allowed'); $Qtit = $this->db->query("SELECT `title` FROM `it_atp` WHERE `atp_id`='$dx'"); $tit = $Qtit->result_object(); $title = $tit[0]->title; ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xml:lang="en" xmlns="http://www.w3.org/1999/xhtml" lang="en">
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
<title>Preload ATP Ericsson 2G (Page 16) - <?php echo $title ?></title>
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
<h1>Page 16</h1>
<br /><br />

<form name="preload2G" method="post" action="">

<?php $Qsubchapter = $this->db->query("SELECT `subno_chapter`, `content` FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `chapter`='24' AND `no_chapter`='24.3' ORDER BY `subno_chapter_order` ASC"); foreach($Qsubchapter->result_object() as $subchapter) $arr_subchapter_24_3[$subchapter->subno_chapter -1]=$subchapter ?>

<h3>Table 17. DTF DCS 1800</h3>
<table class="border" cellpadding="0" cellspacing="0">
<tr class="header">
    <td width="50" rowspan="2">Feeder</td>
    <td colspan="2">M1</td>
    <td colspan="2">M2</td>
    <td colspan="2">M3</td>
    <td colspan="2">M4</td>
    <td colspan="2">M5</td>
    <td width="30" rowspan="2">OK</td>
    <td width="40" rowspan="2">Not OK</td>
    <td width="35" rowspan="2">N/A</td>
    <td width="90" rowspan="2">Remark</td>
</tr>
<tr class="header"><td>S</td><td>D</td><td>S</td><td>D</td><td>S</td><td>D</td><td>S</td><td>D</td><td>S</td><td>D</td></tr>
<?php
$arr_dt_243 = array('Cell A DX1', 'Cell A DX2', 'Cell A DX3', 'Cell A DX4', 'Cell B DX1', 'Cell B DX2', 'Cell B DX3', 'Cell B DX4', 'Cell C DX1', 'Cell C DX2', 'Cell C DX3', 'Cell C DX4');
for($i=0; $i <= 11; $i++){
	$dt_subchapter_24_3 = explode('|', $arr_subchapter_24_3[$i]->content);
	echo '<tr><td>'.$arr_dt_243[$i].'</td>';
	echo '<td><input type="text" name="no_chapter_24_3_'.($i+1).'a" value="'.$this->ifunction->ifnulls($dt_subchapter_24_3[4]).'" /></td>';
	echo '<td><input type="text" name="no_chapter_24_3_'.($i+1).'b" value="'.$this->ifunction->ifnulls($dt_subchapter_24_3[5]).'" /></td>';
	echo '<td><input type="text" name="no_chapter_24_3_'.($i+1).'c" value="'.$this->ifunction->ifnulls($dt_subchapter_24_3[6]).'" /></td>';
	echo '<td><input type="text" name="no_chapter_24_3_'.($i+1).'d" value="'.$this->ifunction->ifnulls($dt_subchapter_24_3[7]).'" /></td>';
	echo '<td><input type="text" name="no_chapter_24_3_'.($i+1).'e" value="'.$this->ifunction->ifnulls($dt_subchapter_24_3[8]).'" /></td>';
	echo '<td><input type="text" name="no_chapter_24_3_'.($i+1).'f" value="'.$this->ifunction->ifnulls($dt_subchapter_24_3[9]).'" /></td>';
	echo '<td><input type="text" name="no_chapter_24_3_'.($i+1).'g" value="'.$this->ifunction->ifnulls($dt_subchapter_24_3[10]).'" /></td>';
	echo '<td><input type="text" name="no_chapter_24_3_'.($i+1).'h" value="'.$this->ifunction->ifnulls($dt_subchapter_24_3[11]).'" /></td>';
	echo '<td><input type="text" name="no_chapter_24_3_'.($i+1).'i" value="'.$this->ifunction->ifnulls($dt_subchapter_24_3[12]).'" /></td>';
	echo '<td><input type="text" name="no_chapter_24_3_'.($i+1).'j" value="'.$this->ifunction->ifnulls($dt_subchapter_24_3[13]).'" /></td>';
	echo '<td align="center"><input type="radio" name="no_chapter_24_3_'.($i+1).'k" value="OK" ';  if($dt_subchapter_24_3[3]=='OK') echo 'checked="checked"'; echo ' /></td>';
	echo '<td align="center"><input type="radio" name="no_chapter_24_3_'.($i+1).'k" value="Not OK" ';  if($dt_subchapter_24_3[3]=='Not OK') echo 'checked="checked"'; echo ' /></td>';
	echo '<td align="center"><input type="radio" name="no_chapter_24_3_'.($i+1).'k" value="N/A" ';  if($dt_subchapter_24_3[3]=='N/A') echo 'checked="checked"'; echo ' /></td>';
	echo '<td><input type="text" name="no_chapter_24_3_'.($i+1).'l" value="'.$this->ifunction->ifnulls($dt_subchapter_24_3[14]).'" /></td></tr>';
}
?>
</table>

<?php $Qsubchapter = $this->db->query("SELECT `subno_chapter`, `content` FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `chapter`='24' AND `no_chapter`='24.2' ORDER BY `subno_chapter_order` ASC"); foreach($Qsubchapter->result_object() as $subchapter) $arr_subchapter_24_2[$subchapter->subno_chapter -1]=$subchapter ?>

<h3>24.2. VSWR measurement UL & DL GSM 900 & DCS 1800</h3>

<h3>Table 18. DTF GSM 900 and DCS 1800</h3>
<table class="border" cellpadding="0" cellspacing="0">
<tr class="header">
    <td width="60" rowspan="2">Test Item</td>
    <td colspan="2">VSWR Max 900</td>
    <td colspan="4">VSWR Max 1800</td>
    <td width="30" rowspan="2">OK</td>
    <td width="35" rowspan="2">NOK</td>
    <td width="35" rowspan="2">N/A</td>
    <td width="90" rowspan="2">Remark</td>
</tr>
<tr class="header">
    <td>890 - 900</td>
    <td>935 - 945</td>
    <td>1717 - 1722</td>
    <td>1750 - 1765</td>
    <td>1812 - 1817</td>
    <td>1845 - 1860</td>
</tr>
<?php
$arr_dt_242 = array('Cell A DX1', 'Cell A DX2', 'Cell A DX3', 'Cell A DX4', 'Cell B DX1', 'Cell B DX2', 'Cell B DX3', 'Cell B DX4', 'Cell C DX1', 'Cell C DX2', 'Cell C DX3', 'Cell C DX4');
for($i=0; $i <= 11; $i++){
	$dt_subchapter_24_2 = explode('|', $arr_subchapter_24_2[$i]->content);
	echo '<tr><td>'.$arr_dt_242[$i].'</td>';
	echo '<td><input type="text" name="no_chapter_24_2_'.($i+1).'a" value="'.$this->ifunction->ifnulls($dt_subchapter_24_2[4]).'" /></td>';
	echo '<td><input type="text" name="no_chapter_24_2_'.($i+1).'b" value="'.$this->ifunction->ifnulls($dt_subchapter_24_2[5]).'" /></td>';
	echo '<td><input type="text" name="no_chapter_24_2_'.($i+1).'c" value="'.$this->ifunction->ifnulls($dt_subchapter_24_2[6]).'" /></td>';
	echo '<td><input type="text" name="no_chapter_24_2_'.($i+1).'d" value="'.$this->ifunction->ifnulls($dt_subchapter_24_2[7]).'" /></td>';
	echo '<td><input type="text" name="no_chapter_24_2_'.($i+1).'e" value="'.$this->ifunction->ifnulls($dt_subchapter_24_2[8]).'" /></td>';
	echo '<td><input type="text" name="no_chapter_24_2_'.($i+1).'f" value="'.$this->ifunction->ifnulls($dt_subchapter_24_2[9]).'" /></td>';
	echo '<td align="center"><input type="radio" name="no_chapter_24_2_'.($i+1).'g" value="OK" ';  if($dt_subchapter_24_2[3]=='OK') echo 'checked="checked"'; echo ' /></td>';
	echo '<td align="center"><input type="radio" name="no_chapter_24_2_'.($i+1).'g" value="Not OK" ';  if($dt_subchapter_24_2[3]=='Not OK') echo 'checked="checked"'; echo ' /></td>';
	echo '<td align="center"><input type="radio" name="no_chapter_24_2_'.($i+1).'g" value="N/A" ';  if($dt_subchapter_24_2[3]=='N/A') echo 'checked="checked"'; echo ' /></td>';
	echo '<td><input type="text" name="no_chapter_24_2_'.($i+1).'h" value="'.$this->ifunction->ifnulls($dt_subchapter_24_2[10]).'" /></td></tr>';
}
?>
</table>

<hr />

<center>
	<input type="button" class="button"  name="prev" value="Prev" onclick="validasi(15,'<?php echo $dx; ?>');" />
    <!--<input type="submit" class="button" name="prev" value="Prev" />-->
    &emsp;
    <input type="reset" class="reset" value="Reset to Default"/>
    &emsp;
    <input type="button" class="button" name="next" value="Next" onclick="validasi(17,'<?php echo $dx; ?>');" />
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
		
		for($i=1; $i<=12; $i++)
		{
			$col_a = 'no_chapter_24_3_'.$i.'a';
			$col_b = 'no_chapter_24_3_'.$i.'b';
			$col_c = 'no_chapter_24_3_'.$i.'c';
			$col_d = 'no_chapter_24_3_'.$i.'d';
			$col_e = 'no_chapter_24_3_'.$i.'e';
			$col_f = 'no_chapter_24_3_'.$i.'f';
			$col_g = 'no_chapter_24_3_'.$i.'g';
			$col_h = 'no_chapter_24_3_'.$i.'h';
			$col_i = 'no_chapter_24_3_'.$i.'i';
			$col_j = 'no_chapter_24_3_'.$i.'j';
			$col_k = 'no_chapter_24_3_'.$i.'k';
			$col_l = 'no_chapter_24_3_'.$i.'l';
			
			$$col_a = kosong($$col_a);
			$$col_b = kosong($$col_b);
			$$col_c = kosong($$col_c);
			$$col_d = kosong($$col_d);
			$$col_e = kosong($$col_e);
			$$col_f = kosong($$col_f);
			$$col_g = kosong($$col_g);
			$$col_h = kosong($$col_h);
			$$col_i = kosong($$col_i);
			$$col_j = kosong($$col_j);
			$$col_k = kosong($$col_k);
			$$col_l = kosong($$col_l);
			
			if(str_replace('null', '', $$col_a.$$col_b.$$col_c.$$col_d.$$col_e.$$col_f.$$col_g.$$col_h.$$col_i.$$col_j.$$col_k.$$col_l)){
				$quest[] = '24@24.3|No|'.$i.'|'.$$col_k.'|'.$$col_a.'|'.$$col_b.'|'.$$col_c.'|'.$$col_d.'|'.$$col_e.'|'.$$col_f.'|'.$$col_g.'|'.$$col_h.'|'.$$col_i.'|'.$$col_j.'|'.$$col_l;
			}
		}
		//----------------------------------------------------
		for($i=1; $i<=12; $i++)
		{
			$col_a = 'no_chapter_24_2_'.$i.'a';
			$col_b = 'no_chapter_24_2_'.$i.'b';
			$col_c = 'no_chapter_24_2_'.$i.'c';
			$col_d = 'no_chapter_24_2_'.$i.'d';
			$col_e = 'no_chapter_24_2_'.$i.'e';
			$col_f = 'no_chapter_24_2_'.$i.'f';
			$col_g = 'no_chapter_24_2_'.$i.'g';
			$col_h = 'no_chapter_24_2_'.$i.'h';
			
			$$col_a = kosong($$col_a);
			$$col_b = kosong($$col_b);
			$$col_c = kosong($$col_c);
			$$col_d = kosong($$col_d);
			$$col_e = kosong($$col_e);
			$$col_f = kosong($$col_f);
			$$col_g = kosong($$col_g);
			$$col_h = kosong($$col_h);
			
			if(str_replace('null', '', $$col_a.$$col_b.$$col_c.$$col_d.$$col_e.$$col_f.$$col_g.$$col_h)){
				$quest[] = '24@24.2|No|'.$i.'|'.$$col_g.'|'.$$col_a.'|'.$$col_b.'|'.$$col_c.'|'.$$col_d.'|'.$$col_e.'|'.$$col_f.'|'.$$col_h;
			}
		}
	}
	include 'paging.php'; 
?>
</body>
</html>