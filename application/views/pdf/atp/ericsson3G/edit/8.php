<?php session_start(); if(empty($_SESSION['isat']['log'])) exit('<script>alert("Session expired, please re-login!");self.close();</script>');if ( ! defined('BASEPATH')) exit('No direct script access allowed'); $Qtit = $this->db->query("SELECT `title` FROM `it_atp` WHERE `atp_id`='$dx'"); $tit = $Qtit->result_object(); $title = $tit[0]->title; ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xml:lang="en" xmlns="http://www.w3.org/1999/xhtml" lang="en">
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
<title>Preload ATP Ericsson 3G (Page 8) - <?php echo $title ?></title>
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
<h1>Page 8</h1><br /><br />

<form name="preload3G" method="post" action="">

<h3>Chapter 8.4: Verify LED STATUS (RBS already integrated to the system)</h3>


<?php $Qchapter = $this->db->query("SELECT `no_chapter`, `content` FROM `it_atp_chapter` WHERE `atp_id`='$dx' AND `chapter`='9' ORDER BY `atp_chapter_id` ASC"); foreach($Qchapter->result_object() as $chapter) $arr_chapter_9[str_replace('9.', '', $chapter->no_chapter) -1]=$chapter ?>

<table class="border" cellpadding="0" cellspacing="0" style="margin-top:5px">
<tr class="header"><td width="40">Chapter</td><td>Title work performed</td><td width="30">OK</td><td width="40">Not OK</td><td width="35">N/A</td><td width="90">Remark</td></tr>
<tr><td valign="top"><b>9</b><br />9.1<br />9.2</td>
<td valign="top"><b>Antenna System Preliminary checks</b><br />Tools/Equipment for Test<br />Documentation check must be available</td>
<td valign="top" align="center">
<?php echo '<br />';
for($i=0; $i <= 1; $i++){
	echo '<input type="radio" name="no_chapter_9_'.($i+1).'" value="OK" '; if($arr_chapter_9[$i]->content=='OK') echo 'checked="checked"'; echo '><br />';
}
?>
</td><td valign="top" align="center">
<?php echo '<br />';
for($i=0; $i <= 1; $i++){
	echo '<input type="radio" name="no_chapter_9_'.($i+1).'" value="Not OK" '; if($arr_chapter_9[$i]->content=='Not OK') echo 'checked="checked"'; echo '><br />';
}
?>
</td><td valign="top" align="center">
<?php echo '<br />';
for($i=0; $i <= 1; $i++){
	echo '<input type="radio" name="no_chapter_9_'.($i+1).'" value="N/A" '; if($arr_chapter_9[$i]->content=='N/A') echo 'checked="checked"'; echo '><br />';
}
?>
</td><td valign="top" align="center"><?php echo '<br />'; for($i=0; $i <= 1; $i++) echo 'Major<br />' ?></td></tr>
</table>

<?php $Qsubchapter = $this->db->query("SELECT `subno_chapter`, `content` FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `chapter`='9' AND `no_chapter`='9.1' ORDER BY `subno_chapter_order` ASC"); foreach($Qsubchapter->result_object() as $subchapter) $arr_subchapter_9_1[$subchapter->subno_chapter -1]=$subchapter ?>

<h3>Chapter 9.1: Tools/Equipment for Test</h3>
<table class="border" cellpadding="0" cellspacing="0">		
<tr class="header"><td width="40">Test No</td><td>Equipment</td><td width="70">Brand / Type</td><td width="70">Serial Number</td><td width="70">Validity of<br />Calibration Date</td></tr>
<?php
$arr_dt_91 = array('FDR Equipment (Site Master, Cell Master, Site Analyzer, etc)', 'Calibration kit', 'Dummy load DC -  4 GHz / 50 Ohm', 'Short connector', 'Flexible Cable', 'Multi Meter', 'TEMS', 'Element Manager  (OMT / Terminal+Software)', 'Terminal + Interface/Modem (HSDPA/Fax/Data)  minimum 2 user', 'HSDPA Measurement Tool');
for($i=0; $i <= 9; $i++){
	$dt_subchapter_9_1 = explode('|', $arr_subchapter_9_1[$i]->content);
	echo '<tr><td>9.1.'.($i +1).'</td><td>'.$arr_dt_91[$i].'</td><td><input type="text" name="no_chapter_9_1_'.($i+1).'a" value="'.$this->ifunction->ifnulls($dt_subchapter_9_1[3]).'" /></td><td><input type="text" name="no_chapter_9_1_'.($i+1).'b" value="'.$this->ifunction->ifnulls($dt_subchapter_9_1[4]).'" /></td><td><input type="text" name="no_chapter_9_1_'.($i+1).'c" value="'.$this->ifunction->ifnulls($dt_subchapter_9_1[5]).'" /></td></tr>';
}
?>
</table>

<hr />

<center>
    <input type="button" class="button" name="prev" value="Prev" onclick="validasi(7, <?php echo $dx ?>)" />
    &emsp; <input type="reset" class="reset" value="Reset to Default"/> &emsp;
    <input type="button" class="button" name="next" value="Next" onclick="validasi(9, <?php echo $dx ?>)" />
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
		$chp = 'no_chapter_9_'.$i;
		if(isset($$chp)) $quest[] = '9|No|9.'.$i.'|'. $$chp; else { $$chp = "null"; $quest[] = '9|No|9.'.$i.'|'.$$chp; }
	}	
	//----------------------------------------------------
	for($i=1; $i<=10; $i++)
	{
		$col_a = 'no_chapter_9_1_'.$i.'a';
		$col_b = 'no_chapter_9_1_'.$i.'b';
		$col_c = 'no_chapter_9_1_'.$i.'c';
		
		$$col_a = kosong($$col_a);
		$$col_b = kosong($$col_b);
		$$col_c = kosong($$col_c);
		
		if(str_replace('null', 'null', $$col_a.$$col_b.$$col_c)){
			$quest[] = '9@9.1|No|'.$i.'|'.$$col_a.'|'.$$col_b.'|'.$$col_c;
		}
		else{
			$user_id = $hasil[0]->user_id;
			$this->db->query("DELETE FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `user_id`='$user_id' AND `chapter`='9' AND `no_chapter`='9.1' AND `subno_chapter`='$i'");
		}
	}
}

include 'paging.php';
?>

</body>
</html>