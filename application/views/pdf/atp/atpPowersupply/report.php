<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed') ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xml:lang="en" xmlns="http://www.w3.org/1999/xhtml" lang="en">
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
<title>ATP - Power Supply</title>
<style type="text/css">
@page{
  margin: 0;
}
body{
	font-family: sans-serif;
	font-size:12px
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
#paging{
	position:fixed;
	color:#AAA;
	font-size:10px;
	left:0;
	right:0;
	bottom:0;
	border-top:1px dotted #AAA;
}
.page-number{
	text-align:right
}
.page-number:before{
	content:"Page " counter(page)
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
</style>
</head>
<body>

<?php if($print){ ?>
<div id="paging">
	<div class="page-number"></div>
</div>
<?php } ?>

<table width="100%">
<tr>
	<td rowspan="3" width="150"><img src="<?php echo base_url() ?>static/i/indosat.jpg" width="150" /></td>
    <td rowspan="3" align="center" width="270"><b>FORMULIR KERJA<br /><font size="+1">POWER SUPPLY</font></b></td>
    <td>No: FK.PS.02</td>
</tr>
<tr><td>Revisi: 00</td></tr>
<tr><td>Tanggal: 01-03-2005</td></tr>
</table>

<br />FORM STARTUP<br />
    
<?php $Qsubchapter = $this->db->query("SELECT `subno_chapter`, `content` FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `chapter`='-1' AND `no_chapter`='-1.1' ORDER BY `subno_chapter_order` ASC"); foreach($Qsubchapter->result_object() as $subchapter) $arr_subchapter_1_a[$subchapter->subno_chapter -1]=$subchapter; 

$dt_subchapter_1_a = explode('|', $arr_subchapter_1_a[0]->content);
$dt_subchapter_1_b = explode('|', $arr_subchapter_1_a[1]->content);
$dt_subchapter_1_c = explode('|', $arr_subchapter_1_a[2]->content);
$dt_subchapter_1_d = explode('|', $arr_subchapter_1_a[3]->content);
$dt_subchapter_1_e = explode('|', $arr_subchapter_1_a[4]->content);
$dt_subchapter_1_f = explode('|', $arr_subchapter_1_a[5]->content);
$dt_subchapter_1_g = explode('|', $arr_subchapter_1_a[6]->content);
?>

<table class="border" cellpadding="0" cellspacing="0">
<tr>
    <td width="50%">Nama Lokasi: <?php echo $this->ifunction->ifnull($dt_subchapter_1_a[3]) ?><br />Area: <?php echo $this->ifunction->ifnull($dt_subchapter_1_b[3]) ?></td>
    <td width="50%">Site ID: <?php echo $this->ifunction->ifnull($dt_subchapter_1_a[4]) ?><br />No. PO: <?php echo $this->ifunction->ifnull($dt_subchapter_1_b[4]) ?></td>
</tr>
<tr>
    <td>Merk Dan Type Unit: <?php echo $this->ifunction->ifnull($dt_subchapter_1_c[3]) ?></td>
    <td>No. Produksi: <?php echo $this->ifunction->ifnull($dt_subchapter_1_c[4]) ?></td>
</tr>
<tr>
    <td>Merk Dan Type Module: <?php echo $this->ifunction->ifnull($dt_subchapter_1_d[3]) ?></td>
    <td>No.Proyek: <?php echo $this->ifunction->ifnull($dt_subchapter_1_d[4]) ?></td>
</tr>
<tr>
    <td>Kapasitas Per Module: <?php echo $this->ifunction->ifnull($dt_subchapter_1_e[3]) ?> Vdc/A</td>
    <td>Jumlah Module: <?php echo $this->ifunction->ifnull($dt_subchapter_1_e[4]) ?> Module</td>
</tr>
<tr>
    <td>Nama Module Kontrol: <?php echo $this->ifunction->ifnull($dt_subchapter_1_f[3]) ?></td>
    <td>No. Seri: <?php echo $this->ifunction->ifnull($dt_subchapter_1_f[4]) ?></td>
</tr>
<tr>
    <td>Tanggal Test: <?php echo $this->ifunction->ifnull($dt_subchapter_1_g[3]) ?></td>
    <td>Supplier: <?php echo $this->ifunction->ifnull($dt_subchapter_1_g[4]) ?></td>
</tr>
</table>
<br />

<p><b>I. DATA MODULE RECTIFIER TERPASANG</b></p>

<?php $Qsubchapter = $this->db->query("SELECT `subno_chapter`, `content` FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `chapter`='1' AND `no_chapter`='1.1' ORDER BY `subno_chapter_order` ASC"); foreach($Qsubchapter->result_object() as $subchapter) $arr_subchapter_1_1[$subchapter->subno_chapter -1]=$subchapter ?>

<table class="border" cellpadding="0" cellspacing="0">
<tr class="header">
    <td width="40">No</td>
    <td width="172">Serial Number Module*</td>
    <td></td>
</tr>
<?php
for($i=0; $i <= 9; $i++){
	$dt_subchapter_1_1 = explode('|', $arr_subchapter_1_1[$i]->content);
	echo '<tr><td align="center">'.($i+1).'</td>';
	echo '<td>'.$this->ifunction->ifnull($dt_subchapter_1_1[3]).'</td><td>'.$this->ifunction->ifnull($dt_subchapter_1_1[4]).'</td></tr>';
}
?>  
</table>

<p><i>*Data module harus sesuai dengan data test commissioning di pabrik.</i></p><br />
<p><b>II. PENGUKURAN TEGANGAN INPUT</b></p>

<?php
$Qsubchapter = $this->db->query("SELECT `subno_chapter`, `content` FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `chapter`='2' AND `no_chapter`='2.1' ORDER BY `subno_chapter_order` ASC"); foreach($Qsubchapter->result_object() as $subchapter) $arr_subchapter_2_1[$subchapter->subno_chapter -1]=$subchapter; 

$dt_subchapter_2_1a = explode('|', $arr_subchapter_2_1[0]->content);
$dt_subchapter_2_1b = explode('|', $arr_subchapter_2_1[1]->content);

$Qsubchapter = $this->db->query("SELECT `subno_chapter`, `content` FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `chapter`='2' AND `no_chapter`='2.2' ORDER BY `subno_chapter_order` ASC"); foreach($Qsubchapter->result_object() as $subchapter) $arr_subchapter_2_2[$subchapter->subno_chapter -1]=$subchapter; 

$dt_subchapter_2_2a = explode('|', $arr_subchapter_2_2[0]->content);
?>

<p>V<sub>R-S</sub>: <?php echo '<u>'.$this->ifunction->ifnull($dt_subchapter_2_1a[3]).'</u>' ?> Volt.<span style="margin-left:50px">V<sub>R-N</sub>: <?php echo '<u>'.$this->ifunction->ifnull($dt_subchapter_2_1a[4]).'</u>' ?> Volt.</span><span style="margin-left:50px">V<sub>N-G</sub>: <?php echo '<u>'.$this->ifunction->ifnull($dt_subchapter_2_1a[5]).'</u>' ?> Volt.</span><br />V<sub>R-T</sub>: <?php echo '<u>'.$this->ifunction->ifnull($dt_subchapter_2_1b[3]).'</u>' ?> Volt.<span style="margin-left:50px">V<sub>S-N</sub>: <?php echo '<u>'.$this->ifunction->ifnull($dt_subchapter_2_1b[4]).'</u>' ?> Volt.</span><span style="margin-left:50px">Frek.: <?php echo '<u>'.$this->ifunction->ifnull($dt_subchapter_2_1b[5]).'</u>' ?> Hertz.</span><br />V<sub>S-T</sub>: <?php echo '<u>'.$this->ifunction->ifnull($dt_subchapter_2_2a[3]).'</u>' ?> Volt.<span style="margin-left:50px">V<sub>T-N</sub>:  <?php echo '<u>'.$this->ifunction->ifnull($dt_subchapter_2_2a[4]).'</u>' ?> Volt.</span><span style="margin-left:50px">Suhu Ruangan: <?php echo '<u>'.$this->ifunction->ifnull($dt_subchapter_2_2a[5]).'</u>' ?> C</span><span style="margin-left:50px">Kelembaban: <?php echo '<u>'.$this->ifunction->ifnull($dt_subchapter_2_2a[6]).'</u>' ?> %</span></p><br />

<p><b>III. PENGUKURAN RECTIFIER</b></p>

<?php $Qsubchapter = $this->db->query("SELECT `subno_chapter`, `content` FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `chapter`='3' AND `no_chapter`='3.1' ORDER BY `subno_chapter_order` ASC"); foreach($Qsubchapter->result_object() as $subchapter) $arr_subchapter_3_1[$subchapter->subno_chapter -1]=$subchapter ?>

<table class="border" cellpadding="0" cellspacing="0">
<tr class="header">
    <td width="40">No</td>
    <td width="256">Pengukuran</td>
    <td>Nilai</td>
</tr>
<?php
$arr_dt_31 = array('Tegangan Output Rectifier', 'Tegangan Grounding ke Positif Rectifier', 'Tegangan Grounding ke Negatif Rectifier');
for($i=0; $i <= 2; $i++){
	$dt_subchapter_3_1 = explode('|', $arr_subchapter_3_1[$i]->content);
	echo '<tr><td align="center">'.($i +1).'</td><td>'.$arr_dt_31[$i].'</td>';
	echo '<td align="center">'.$this->ifunction->ifnull($dt_subchapter_3_1[3]).'</td></tr>';
}
?>  
</table>

<hr />

<p><b>IV. SETTING PARAMETER</b></p>

<?php $Qsubchapter = $this->db->query("SELECT `subno_chapter`, `content` FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `chapter`='4' AND `no_chapter`='4.1' ORDER BY `subno_chapter_order` ASC"); foreach($Qsubchapter->result_object() as $subchapter) $arr_subchapter_4_1[$subchapter->subno_chapter -1]=$subchapter; 

$dt_subchapter_4_1a = explode('|', $arr_subchapter_4_1[0]->content);
$dt_subchapter_4_1b = explode('|', $arr_subchapter_4_1[1]->content);
$dt_subchapter_4_1c = explode('|', $arr_subchapter_4_1[2]->content);

$Qsubchapter = $this->db->query("SELECT `subno_chapter`, `content` FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `chapter`='4' AND `no_chapter`='4.2' ORDER BY `subno_chapter_order` ASC"); foreach($Qsubchapter->result_object() as $subchapter) $arr_subchapter_4_2[$subchapter->subno_chapter -1]=$subchapter; 

$dt_subchapter_4_2a = explode('|', $arr_subchapter_4_2[3]->content);
?>
<table class="border" cellpadding="0" cellspacing="0">
<tr>
    <td width="50%">1. Tegangan Floating: <?php echo $this->ifunction->ifnull($dt_subchapter_4_1a[3]) ?> Vdc.</td>
    <td width="50%">5. Current Limitation Battery: <?php echo $this->ifunction->ifnull($dt_subchapter_4_1a[4]) ?> Ampere</td>
</tr>
<tr>
    <td>2. Tegangan Boost/Equalizing: <?php echo $this->ifunction->ifnull($dt_subchapter_4_1b[3]) ?> Vdc.</td>
    <td>6. Non Load Priority/LVD1: <?php echo $this->ifunction->ifnull($dt_subchapter_4_1b[4]) ?> Vdc.</td>
</tr>
<tr>
    <td>3. Low Voltage Alarm: <?php echo $this->ifunction->ifnull($dt_subchapter_4_1c[3]) ?> Vdc.</td>
    <td>7. Load Priority/LVD2: <?php echo $this->ifunction->ifnull($dt_subchapter_4_1c[4]) ?> Vdc.</td>
</tr>
<tr>
    <td>4. High Voltage Alarm: <?php echo $this->ifunction->ifnull($dt_subchapter_4_2a[4]) ?> Vdc.</td>
    <td>8. External Alarm: <?php echo '<img src="'.base_url().'static/i/radio'; if($dt_subchapter_4_2a[3]=='NO') echo '_checked'; echo '.jpg"> NO &nbsp; &nbsp; <img src="'.base_url().'static/i/radio'; if($dt_subchapter_4_2a[3]=='NC') echo '_checked'; echo '.jpg"> NC' ?></td>
</tr>
</table>
<br />

<p><b>V. TEST FUNGSI</b></p>

<?php $Qsubchapter = $this->db->query("SELECT `subno_chapter`, `content` FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `chapter`='5' AND `no_chapter`='5.1' ORDER BY `subno_chapter_order` ASC"); foreach($Qsubchapter->result_object() as $subchapter) $arr_subchapter_5_1[$subchapter->subno_chapter -1]=$subchapter ?>

<table class="border" cellpadding="0" cellspacing="0">
<tr class="header">
    <td width="40">No</td>
    <td width="250">Test Fungsi</td>
    <td>Hasil</td>
</tr>
<?php
$arr_dt_51 = array('Load Non Priority/LVD1', 'Load Priority/LVD2', 'Test Back Up Battery (Beban Dummy Load/Load BTS)', 'External Alarm :', 'a. Mains Input Off', 'b.', 'c.', 'd.', 'e.');
for($i=0; $i <= 8; $i++){
	$dt_subchapter_5_1 = explode('|', $arr_subchapter_5_1[$i]->content);
	echo '<tr>'; if($i > 3) echo '<td>&nbsp;</td>'; else echo '<td align="center">'.($i +1).'</td>';
	if($i>3){
		echo '<td>'.$this->ifunction->ifnull($dt_subchapter_5_1[4]).'</td><td align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_5_1[3]=='OK') echo '_checked'; echo '.jpg"> OK &nbsp;&nbsp;&nbsp; <img src="'.base_url().'static/i/radio'; if($dt_subchapter_5_1[3]=='Not OK') echo '_checked'; echo '.jpg"> NO</td></tr>';		
	}else{
		echo '<td>'.$arr_dt_51[$i].'</td><td align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_5_1[3]=='OK') echo '_checked'; echo '.jpg"> OK &nbsp;&nbsp;&nbsp; <img src="'.base_url().'static/i/radio'; if($dt_subchapter_5_1[3]=='Not OK') echo '_checked'; echo '.jpg"> NO</td></tr>';
	}
}
?>  
</table>
<br />

<p><b>VI. DATA LOAD/BEBAN</b></p>

<?php $Qsubchapter = $this->db->query("SELECT `subno_chapter`, `content` FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `chapter`='6' AND `no_chapter`='6.1' ORDER BY `subno_chapter_order` ASC"); foreach($Qsubchapter->result_object() as $subchapter) $arr_subchapter_6_1[$subchapter->subno_chapter -1]=$subchapter ?>

<table class="border" cellpadding="0" cellspacing="0">
<tr class="header">
    <td width="40">No</td>
    <td>NAMA BEBAN</td>
    <td>RATING MCB</td>
</tr>
<?php
for($i=0; $i <= 5; $i++){
	$dt_subchapter_6_1 = explode('|', $arr_subchapter_6_1[$i]->content);
	echo '<tr><td align="center">'.($i+1).'</td>';
	echo '<td>'.$this->ifunction->ifnull($dt_subchapter_6_1[3]).'</td><td align="right">'.$this->ifunction->ifnull($dt_subchapter_6_1[4]).' Ampere</td></tr>';
}
?>
</table>
<br />

<p><b>VII. BATERE</b></p>

<?php $Qsubchapter = $this->db->query("SELECT `subno_chapter`, `content` FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `chapter`='7' AND `no_chapter`='7.1' ORDER BY `subno_chapter_order` ASC"); foreach($Qsubchapter->result_object() as $subchapter) $arr_subchapter_7_1[$subchapter->subno_chapter -1]=$subchapter; 

$dt_subchapter_7_1a = explode('|', $arr_subchapter_7_1[0]->content);
$dt_subchapter_7_1b = explode('|', $arr_subchapter_7_1[1]->content);
$dt_subchapter_7_1c = explode('|', $arr_subchapter_7_1[2]->content);

$Qsubchapter = $this->db->query("SELECT `subno_chapter`, `content` FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `chapter`='7' AND `no_chapter`='7.2' ORDER BY `subno_chapter_order` ASC");
foreach($Qsubchapter->result_object() as $subchapter) $arr_subchapter_7_2[$subchapter->subno_chapter -1]=$subchapter;
?>

<p>Data Batere:<br />
a. Merek/Type Batere: <?php echo '<u>'.$this->ifunction->ifnull($dt_subchapter_7_1a[3]).'</u>' ?><br />
b. Jumlah Dan Kapsitas Bank Batere: <?php echo '<u>'.$this->ifunction->ifnull($dt_subchapter_7_1b[3]).'</u>' ?> Bank / <?php echo '<u>'.$this->ifunction->ifnull($dt_subchapter_7_1b[4]).'</u>' ?> Ah/Bank.<br />
c. Tegangan Nominal Batere/Blok: <?php echo '<u>'.$this->ifunction->ifnull($dt_subchapter_7_1c[3]).'</u>' ?> Volt/Blok.</p>

<hr />

<p>Data Pengukuran Batere Dilokasi / Open Circuit :</p>

<table class="border" cellpadding="0" cellspacing="0">
<tr class="header">
    <td width="40">No</td>
    <td>No.Seri Batere</td>
    <td>Tegangan Per Blok</td>
    <td>Keterangan</td>
</tr>
<?php
for($i=0; $i <= 29; $i++){
	$dt_subchapter_7_2 = explode('|', $arr_subchapter_7_2[$i]->content);
	echo '<tr><td align="center">'.($i+1).'</td>';
	echo '<td>'.$this->ifunction->ifnull($dt_subchapter_7_2[3]).'</td><td>'.$this->ifunction->ifnull($dt_subchapter_7_2[4]).'</td><td>'.$this->ifunction->ifnull($dt_subchapter_7_2[5]).'</td></tr>';
}
?>  
</table>
<br />

<hr />

<p><b>VIII. DAFTAR ALAT UKUR YANG DIGUNAKAN.</b></p>

<?php $Qsubchapter = $this->db->query("SELECT `subno_chapter`, `content` FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `chapter`='8' AND `no_chapter`='8.1' ORDER BY `subno_chapter_order` ASC"); foreach($Qsubchapter->result_object() as $subchapter) $arr_subchapter_8_1[$subchapter->subno_chapter -1]=$subchapter ?>

<table class="border" cellpadding="0" cellspacing="0">
<tr class="header">
    <td width="40">No</td>
    <td>Nama Alat Ukur</td>
    <td>Merk/Type</td>
</tr>
<?php
for($i=0; $i <= 3; $i++){
	$dt_subchapter_8_1 = explode('|', $arr_subchapter_8_1[$i]->content);
	echo '<tr><td align="center">'.($i +1).'</td><td>'.$this->ifunction->ifnull($dt_subchapter_8_1[3]).'</td>';
	echo '<td align="center">'.$this->ifunction->ifnull($dt_subchapter_8_1[4]).'</td></tr>';
}
?>  
</table>
<br />

<p><b>IX. CATATAN.</b></p>
<table class="border" cellpadding="0" cellspacing="0"><tr><td valign="top" height="100">&nbsp;</td></tr></table><br />

<table class="border" cellpadding="0" cellspacing="0">
<tr>
    <td valign="top" width="50%"><br /><b><?php $data = mysql_fetch_array(mysql_query("SELECT c.`name` FROM `it_atp` a JOIN `it_user` b ON (a.`user_supervisor`  =b.`user_id`) JOIN `it_vendor` c ON (b.`vendor_id`  = c.`vendor_id`) WHERE `atp_id`=$dx")); echo $data[0]; ?><!--PT. WESTINDO--></b><br />Di test Oleh : <span style="margin-left:30px">__________________</span><br />Tanggal :<span style="margin-left:50px"> __________________</span><br />Tanda Tangan : <font color="#FFF">.</font><br /><font color="#FFF">.</font><br /><p style="margin-left:100px">____________<br /><p style="margin-left:130px">NIK.</td>
    <td width="10" valign="top" style="border:none"></td>
    <td valign="top" width="50%"><br /><b>PT. INDOSAT</b><br />Di Ketahui Oleh : <span style="margin-left:10px">__________________</span><br />Tanggal :<span style="margin-left:50px"> __________________</span><br />Tanda Tangan : <font color="#FFF">.</font><br /><font color="#FFF">.</font><br /><p style="margin-left:100px">____________<br /><p style="margin-left:130px">NIK.</td>
</tr>
</table>

<hr />

<p>FORM ATP</p>  

<?php
$Qsubchapter = $this->db->query("SELECT `subno_chapter`, `content` FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `chapter`='-1' AND `no_chapter`='-1.1' ORDER BY `subno_chapter_order` ASC"); foreach($Qsubchapter->result_object() as $subchapter) $arr_subchapter_1_1[$subchapter->subno_chapter -1]=$subchapter; 

$dt_subchapter_1_1a = explode('|', $arr_subchapter_1_1[0]->content);
$dt_subchapter_1_1b = explode('|', $arr_subchapter_1_1[1]->content);

$Qsubchapter = $this->db->query("SELECT `subno_chapter`, `content` FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `chapter`='-2' AND `no_chapter`='-2.1' ORDER BY `subno_chapter_order` ASC"); foreach($Qsubchapter->result_object() as $subchapter) $arr_subchapter_2_1[$subchapter->subno_chapter -1]=$subchapter;

$dt_subchapter_2_1a = explode('|', $arr_subchapter_2_1[0]->content);
$dt_subchapter_2_1b = explode('|', $arr_subchapter_2_1[1]->content);

$Qsubchapter = $this->db->query("SELECT `subno_chapter`, `content` FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `chapter`='-3' AND `no_chapter`='-3.1' ORDER BY `subno_chapter_order` ASC"); foreach($Qsubchapter->result_object() as $subchapter) $arr_subchapter_3_1[$subchapter->subno_chapter -1]=$subchapter;

$dt_subchapter_3_1a = explode('|', $arr_subchapter_3_1[0]->content);
$dt_subchapter_3_1b = explode('|', $arr_subchapter_3_1[1]->content);

$Qsubchapter = $this->db->query("SELECT `subno_chapter`, `content` FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `chapter`='-4' AND `no_chapter`='-4.1' ORDER BY `subno_chapter_order` ASC"); foreach($Qsubchapter->result_object() as $subchapter) $arr_subchapter_4_1[$subchapter->subno_chapter -1]=$subchapter;

$dt_subchapter_4_1a = explode('|', $arr_subchapter_4_1[0]->content);
?>

<table class="border" cellpadding="0" cellspacing="0">
<tr>
    <td width="50%">Nama Lokasi: <?php echo $this->ifunction->ifnull($dt_subchapter_1_1a[3]) ?><br />Area: <?php echo $this->ifunction->ifnull($dt_subchapter_1_1b[3]) ?></td>
    <td width="50%">Site ID: <?php echo $this->ifunction->ifnull($dt_subchapter_1_1a[4]) ?><br />No. PO: <?php echo $this->ifunction->ifnull($dt_subchapter_1_1b[4]) ?></td>
</tr>
<tr>
    <td>Merk Dan Type Rectifier: <?php echo $this->ifunction->ifnull($dt_subchapter_2_1a[3]) ?></td>
    <td>No. Produksi: <?php echo $this->ifunction->ifnull($dt_subchapter_2_1a[4]) ?></td>
</tr>
<tr>
    <td>Jumlah Module Rectifier: <?php echo $this->ifunction->ifnull($dt_subchapter_2_1b[3]) ?></td>
    <td>No.Proyek: <?php echo $this->ifunction->ifnull($dt_subchapter_2_1b[4]) ?></td>
</tr>
<tr>
    <td>Merk Dan Type Battery: <?php echo $this->ifunction->ifnull($dt_subchapter_3_1a[3]) ?></td>
    <td></td>
</tr>
<tr>
    <td>Jumlah Bank Battery: <?php echo $this->ifunction->ifnull($dt_subchapter_3_1b[3]) ?></td>
    <td></td>
</tr>
<tr>
    <td>Tanggal Instalasi: <?php echo $this->ifunction->ifnull($dt_subchapter_4_1a[3]) ?></td>
    <td>Supplier: <?php echo $this->ifunction->ifnull($dt_subchapter_4_1a[4]) ?></td>
</tr>
</table>
<br />

<p><b>I. RECTIFIER</b></p>

<?php
$Qsubchapter = $this->db->query("SELECT `subno_chapter`, `content` FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `chapter`='9' AND `no_chapter`='9.1' ORDER BY `subno_chapter_order` ASC"); foreach($Qsubchapter->result_object() as $subchapter) $arr_subchapter_9_1[$subchapter->subno_chapter -1]=$subchapter;

$Qsubchapter = $this->db->query("SELECT `subno_chapter`, `content` FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `chapter`='9' AND `no_chapter`='9.2' ORDER BY `subno_chapter_order` ASC"); foreach($Qsubchapter->result_object() as $subchapter) $arr_subchapter_9_2[$subchapter->subno_chapter -1]=$subchapter; 

$Qsubchapter = $this->db->query("SELECT `subno_chapter`, `content` FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `chapter`='9' AND `no_chapter`='9.3' ORDER BY `subno_chapter_order` ASC"); foreach($Qsubchapter->result_object() as $subchapter) $arr_subchapter_9_3[$subchapter->subno_chapter -1]=$subchapter; 

$dt_subchapter_9_3a = explode('|', $arr_subchapter_9_3[0]->content);

$Qsubchapter = $this->db->query("SELECT `subno_chapter`, `content` FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `chapter`='9' AND `no_chapter`='9.4' ORDER BY `subno_chapter_order` ASC"); foreach($Qsubchapter->result_object() as $subchapter) $arr_subchapter_9_4[$subchapter->subno_chapter -1]=$subchapter; 

$Qsubchapter = $this->db->query("SELECT `subno_chapter`, `content` FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `chapter`='9' AND `no_chapter`='9.5' ORDER BY `subno_chapter_order` ASC"); foreach($Qsubchapter->result_object() as $subchapter) $arr_subchapter_9_5[$subchapter->subno_chapter -1]=$subchapter; 

$Qsubchapter = $this->db->query("SELECT `subno_chapter`, `content` FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `chapter`='9' AND `no_chapter`='9.6' ORDER BY `subno_chapter_order` ASC"); foreach($Qsubchapter->result_object() as $subchapter) $arr_subchapter_9_6[$subchapter->subno_chapter -1]=$subchapter;
?>

<table class="border" cellpadding="0" cellspacing="0">
<tr class="header">
    <td width="40">NO</td>
    <td>PENGECEKAN</td>
    <td width="30">OK</td>
    <td width="40">NOK</td>
    <td>KETERANGAN</td>
</tr>
<tr>
    <td align="center"><b>I.1.</b></td>
    <td colspan="4"><b>Visual Check</b></td>
</tr>
<?php
$arr_dt_91 = array('Kabinet rectifier', 'Tata letak kabinet rectifier dan kabinet batere', 'a. Merk / Supplier', 'b. Type', 'c. Tegangan nominal output', 'd. Kapasitas rectifer', 'e. Tanggal instalasi', 'a. MCB/Fuse input AC', 'b. LVBD/LVD', 'c. MCB/Fuse batere', 'd. Kabel input/power', 'e. Kabel grounding', 'f. Arrester', 'g. Batere bank', 'h. Kabel external alarm');

for($i=0; $i <= 1; $i++){
	$dt_subchapter_9_1 = explode('|', $arr_subchapter_9_1[$i]->content);
	echo '<tr><td align="center">'.($i +1).'</td>';
	echo '<td>'.$arr_dt_91[$i].'</td><td align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_9_1[3]=='OK') echo '_checked'; echo '.jpg"></td><td align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_9_1[3]=='Not OK') echo '_checked'; echo '.jpg"></td><td>'.$this->ifunction->ifnull($dt_subchapter_9_1[4]).'</td></tr>';
}

echo '<tr><td align="center">3</td><td colspan="4">Name Plate</td></tr>';

for($i=2; $i <= 6; $i++){
	$dt_subchapter_9_1 = explode('|', $arr_subchapter_9_1[$i]->content);
	echo '<tr><td></td><td>'.$arr_dt_91[$i].'</td><td align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_9_1[3]=='OK') echo '_checked'; echo '.jpg"></td><td align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_9_1[3]=='Not OK') echo '_checked'; echo '.jpg"></td><td>'.$this->ifunction->ifnull($dt_subchapter_9_1[4]).'</td></tr>';
}

echo '<tr><td align="center">4</td><td colspan="4">Labelling:</td></tr>';

for($i=7; $i <= 14; $i++){
	$dt_subchapter_9_1 = explode('|', $arr_subchapter_9_1[$i]->content);
	echo '<tr><td></td><td>'.$arr_dt_91[$i].'</td><td align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_9_1[3]=='OK') echo '_checked'; echo '.jpg"></td><td align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_9_1[3]=='Not OK') echo '_checked'; echo '.jpg"></td><td>'.$this->ifunction->ifnull($dt_subchapter_9_1[4]).'</td></tr>';
}
?>  
<tr>
    <td align="center"><b>I.2.</b></td>
    <td colspan="4"><b>Instalasi</b></td>
</tr>
<?php
$arr_dt_92 = array('Kerapihan instalasi', 'Kekencangan koneksi');
for($i=0; $i <= 1; $i++){
	$dt_subchapter_9_2 = explode('|', $arr_subchapter_9_2[$i]->content);
	echo '<tr><td align="center">'.($i +1).'</td>';
	echo '<td>'.$arr_dt_92[$i].'</td><td align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_9_2[3]=='OK') echo '_checked'; echo '.jpg"></td><td align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_9_2[3]=='Not OK') echo '_checked'; echo '.jpg"></td><td>'.$this->ifunction->ifnull($dt_subchapter_9_2[4]).'</td></tr>';
}
?>  
<tr>
    <td align="center"><b>I.3.</b></td>
    <td colspan="4"><b>Pengukuran</b></td>
</tr>
<?php
$arr_dt_93 = array('Tegangan Input', 'a. Tegangan Output', 'b. Arus Beban', 'c. Arus Batere');
echo '<tr><td align="center">1</td><td>Tegangan Input</td><td align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_9_3a[3]=='OK') echo '_checked'; echo '.jpg"></td><td align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_9_3a[3]=='Not OK') echo '_checked'; echo '.jpg"></td><td>'.$this->ifunction->ifnull($dt_subchapter_9_3a[4]).'</td></tr>';
echo '<tr><td align="center">2</td><td>Perbandingan meter internal dan external</td><td></td><td></td><td></td></tr>';
for($i=1; $i <= 3; $i++){
	$dt_subchapter_9_3 = explode('|', $arr_subchapter_9_3[$i]->content);
	echo '<tr><td></td>';
	echo '<td>'.$arr_dt_93[$i].'</td><td align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_9_3[3]=='OK') echo '_checked'; echo '.jpg"></td><td align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_9_3[3]=='Not OK') echo '_checked'; echo '.jpg"></td><td>'.$this->ifunction->ifnull($dt_subchapter_9_3[4]).'</td></tr>';
}
?>   
<tr>
    <td align="center"><b>I.4.</b></td>
    <td colspan="3"><b>Test Kapasitas Modul Rectifier</b></td>
    <td>Jika dilakukan dipabrik, data hasil pengetesan harus dilampirkan.</td>
</tr>
<?php
$arr_dt_94 = array('a. Kapasitas per module', 'b. Kapasitas total', 'c. Load sharing module');
for($i=0; $i <= 2; $i++){
	$dt_subchapter_9_4 = explode('|', $arr_subchapter_9_4[$i]->content);
	echo '<tr><td></td>';
	echo '<td>'.$arr_dt_94[$i].'</td><td align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_9_4[3]=='OK') echo '_checked'; echo '.jpg"></td><td align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_9_4[3]=='Not OK') echo '_checked'; echo '.jpg"></td><td>'.$this->ifunction->ifnull($dt_subchapter_9_4[4]).'</td></tr>';
}
?>   
<tr>
    <td align="center"><b>I.5.</b></td>
    <td><b>Setting Rectifier</b></td>
    <?php 
    $dt_subchapter_9_5 = explode('|', $arr_subchapter_9_5[0]->content);
    echo '<td align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_9_5[3]=='OK') echo '_checked'; echo '.jpg"></td><td align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_9_5[3]=='Not OK') echo '_checked'; echo '.jpg"></td><td>'.$this->ifunction->ifnull($dt_subchapter_9_5[4]).'</td>';	
    ?>
</tr>
<tr>
    <td align="center"><b>I.6.</b></td>
    <td colspan="4"><b>Test Fungsi</b></td>
</tr>
<?php
$arr_dt_96 = array('a. Back up batere', 'b. LVBD/LVD', 'c. External alarm');
for($i=0; $i <= 2; $i++){
	$dt_subchapter_9_6 = explode('|', $arr_subchapter_9_6[$i]->content);
	echo '<tr><td align="center"></td>';
	echo '<td>'.$arr_dt_96[$i].'</td><td align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_9_6[3]=='OK') echo '_checked'; echo '.jpg"></td><td align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_9_6[3]=='Not OK') echo '_checked'; echo '.jpg"></td><td>'.$this->ifunction->ifnull($dt_subchapter_9_6[4]).'</td></tr>';
}
?>  
</table>

<p><b>II. BATERE</b></p>

<?php 
$Qsubchapter = $this->db->query("SELECT `subno_chapter`, `content` FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `chapter`='10' AND `no_chapter`='10.1' ORDER BY `subno_chapter_order` ASC"); foreach($Qsubchapter->result_object() as $subchapter) $arr_subchapter_10_1[$subchapter->subno_chapter -1]=$subchapter;

$dt_subchapter_10_1a = explode('|', $arr_subchapter_10_1[0]->content);

$Qsubchapter = $this->db->query("SELECT `subno_chapter`, `content` FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `chapter`='10' AND `no_chapter`='10.2' ORDER BY `subno_chapter_order` ASC"); foreach($Qsubchapter->result_object() as $subchapter) $arr_subchapter_10_2[$subchapter->subno_chapter -1]=$subchapter;
?>
<table class="border" cellpadding="0" cellspacing="0">
<tr class="header">
    <td width="40">NO</td>
    <td>PENGECEKAN</td>
    <td width="30">OK</td>
    <td width="40">NOK</td>
    <td>KETERANGAN</td>
</tr>
<tr>
    <td><b>II.1.</b></td>
    <td colspan="4"><b>Visual Check:</b></td>
</tr>
<?php
$arr_dt_101 = array('Kondisi fisik batere', 'Name Plate', 'a. Merk', 'b. Kapasitas batere', 'c. Tanggal instalasi', 'Kebersihan', 'Data test kapasitas batere di Pabrik/warehouse');

echo '<tr><td align="center">1</td><td>Kondisi fisik batere</td><td align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_10_1a[3]=='OK') echo '_checked'; echo '.jpg"> OK</td><td align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_10_1a[3]=='Not OK') echo '_checked'; echo '.jpg"> NOK</td><td>'.$this->ifunction->ifnull($dt_subchapter_10_1a[4]).'</td>
</tr>';

echo '<tr><td align="center">2</td><td colspan="4">Name Plate</td></tr>';

for($i=1; $i <= 5; $i++){
	$dt_subchapter_10_1 = explode('|', $arr_subchapter_10_1[$i]->content);
	echo '<tr>'; if($i > 3) echo '<td align="center">'.($i-1).'</td>'; else echo '<td align="center">&nbsp;</td>';
	echo '<td>'.$arr_dt_101[$i+1].'</td><td align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_10_1[3]=='OK') echo '_checked'; echo '.jpg"> OK</td><td align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_10_1[3]=='Not OK') echo '_checked'; echo '.jpg"> NOK</td><td>'.$this->ifunction->ifnull($dt_subchapter_10_1[4]).'</td></tr>';
}
?>  
<tr>
    <td align="center"><b>II.2.</b></td>
    <td colspan="4"><b>Instalasi</b></td>
</tr>
<?php
$arr_dt_102 = array('Kerapihan', 'Kekencangan koneksi', 'Pelindung terminal batere');
for($i=0; $i <= 2; $i++){
	$dt_subchapter_10_2 = explode('|', $arr_subchapter_10_2[$i]->content);
	echo '<tr><td align="center">'.($i +1).'</td>';
	echo '<td>'.$arr_dt_102[$i].'</td><td align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_10_2[3]=='OK') echo '_checked'; echo '.jpg"> OK</td><td align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_10_2[3]=='Not OK') echo '_checked'; echo '.jpg"> NOK</td><td>'.$this->ifunction->ifnull($dt_subchapter_10_2[4]).'</td></tr>';
}
?>  
</table>
<br />

<p><b>III. LAIN-LAIN</b></p>

<?php $Qsubchapter = $this->db->query("SELECT `subno_chapter`, `content` FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `chapter`='11' AND `no_chapter`='11.1' ORDER BY `subno_chapter_order` ASC"); foreach($Qsubchapter->result_object() as $subchapter) $arr_subchapter_11_1[$subchapter->subno_chapter -1]=$subchapter ?>

<table class="border" cellpadding="0" cellspacing="0">
<tr class="header">
    <td width="40">NO</td>
    <td>PENGECEKAN</td>
    <td width="30">OK</td>
    <td width="40">NOK</td>
    <td>KETERANGAN</td>
</tr>
<?php
$arr_dt_111 = array('Kabel Kontrol PC dengan Modul Kontrol', 'CD/Disket Software', 'Manual Book Rectifier');
for($i=0; $i <= 2; $i++){
	$dt_subchapter_11_1 = explode('|', $arr_subchapter_11_1[$i]->content);
	echo '<tr><td align="center">'.($i +1).'</td>';
	echo '<td>'.$arr_dt_111[$i].'</td><td align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_11_1[3]=='OK') echo '_checked'; echo '.jpg"> OK</td><td align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_11_1[3]=='Not OK') echo '_checked'; echo '.jpg"> NOK</td><td>'.$this->ifunction->ifnull($dt_subchapter_11_1[4]).'</td></tr>';
}
?>  
</table>
<br />

<p><b>CATATAN.</b></p>
<table class="border" cellpadding="0" cellspacing="0"><tr><td valign="top" height="100">&nbsp;</td></tr></table><br />

<table class="border" cellpadding="0" cellspacing="0">
<tr>
    <td valign="top" width="50%"><br /><b><?php $data = mysql_fetch_array(mysql_query("SELECT c.`name` FROM `it_atp` a JOIN `it_user` b ON (a.`user_supervisor`  =b.`user_id`) JOIN `it_vendor` c ON (b.`vendor_id`  = c.`vendor_id`) WHERE `atp_id`=$dx")); echo $data[0]; ?><!--PT. WESTINDO--></b><br />Di test Oleh: <span style="margin-left:30px">__________________</span><br />Tanggal:<span style="margin-left:50px"> __________________</span><br />Tanda Tangan: <font color="#FFF">.</font><br /><font color="#FFF">.</font><br /><p style="margin-left:100px">____________<br /><p style="margin-left:130px">NIK.</td>
    <td width="10" valign="top" style="border:none"></td>
    <td valign="top" width="50%"><br /><b>PT. INDOSAT</b><br />Di Ketahui Oleh: <span style="margin-left:10px">__________________</span><br />Tanggal:<span style="margin-left:50px"> __________________</span><br />Tanda Tangan: <font color="#FFF">.</font><br /><font color="#FFF">.</font><br /><p style="margin-left:100px">____________<br /><p style="margin-left:130px">NIK.</td>
</tr>
</table>

<hr />

<p>FORM TEST COM</p>

<?php $Qsubchapter = $this->db->query("SELECT `subno_chapter`, `content` FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `chapter`='-5' AND `no_chapter`='-5.1' ORDER BY `subno_chapter_order` ASC"); foreach($Qsubchapter->result_object() as $subchapter) $arr_subchapter_5_1[$subchapter->subno_chapter -1]=$subchapter; 

$dt_subchapter_5_1a = explode('|', $arr_subchapter_5_1[0]->content);
$dt_subchapter_5_1b = explode('|', $arr_subchapter_5_1[1]->content);
$dt_subchapter_5_1c = explode('|', $arr_subchapter_5_1[2]->content);
$dt_subchapter_5_1d = explode('|', $arr_subchapter_5_1[3]->content);
$dt_subchapter_5_1e = explode('|', $arr_subchapter_5_1[4]->content);
$dt_subchapter_5_1f = explode('|', $arr_subchapter_5_1[5]->content);
$dt_subchapter_5_1g = explode('|', $arr_subchapter_5_1[6]->content);
?>

<table class="border" cellpadding="0" cellspacing="0">
<tr>
    <td width="50%">Nama Lokasi: <?php echo $this->ifunction->ifnull($dt_subchapter_5_1a[3]) ?><br />Area: <?php echo $this->ifunction->ifnull($dt_subchapter_5_1b[3]) ?></td>
    <td width="50%">Site ID: <?php echo $this->ifunction->ifnull($dt_subchapter_5_1a[4]) ?><br />No. PO: <?php echo $this->ifunction->ifnull($dt_subchapter_5_1b[4]) ?></td>
</tr>
<tr>
    <td>Merk Dan Type Unit: <?php echo $this->ifunction->ifnull($dt_subchapter_5_1c[3]) ?></td>
    <td>No. Produksi: <?php echo $this->ifunction->ifnull($dt_subchapter_5_1c[4]) ?></td>
</tr>
<tr>
    <td>Merk Dan Type Module: <?php echo $this->ifunction->ifnull($dt_subchapter_5_1d[3]) ?></td>
    <td>No.Proyek: <?php echo $this->ifunction->ifnull($dt_subchapter_5_1d[4]) ?></td>
</tr>
<tr>
    <td>Kapasitas Per Module: <?php echo $this->ifunction->ifnull($dt_subchapter_5_1e[3]) ?> Vdc/ A</td>
    <td>Jumlah Module: <?php echo $this->ifunction->ifnull($dt_subchapter_5_1e[4]) ?> Module</td>
</tr>
<tr>
    <td>Nama Module Kontrol: <?php echo $this->ifunction->ifnull($dt_subchapter_5_1f[3]) ?></td>
    <td>No. seri: <?php echo $this->ifunction->ifnull($dt_subchapter_5_1f[4]) ?></td>
</tr>
<tr>
    <td>Tanggal Test: <?php echo $this->ifunction->ifnull($dt_subchapter_5_1g[3]) ?></td>
    <td>Supplier: <?php echo $this->ifunction->ifnull($dt_subchapter_5_1g[4]) ?></td>
</tr>
</table>
<br />

<p><b>I. PENGUKURAN TEGANGAN INPUT</b></p>
<?php $Qsubchapter = $this->db->query("SELECT `subno_chapter`, `content` FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `chapter`='12' AND `no_chapter`='12.1' ORDER BY `subno_chapter_order` ASC"); foreach($Qsubchapter->result_object() as $subchapter) $arr_subchapter_12_1[$subchapter->subno_chapter -1]=$subchapter; 

$dt_subchapter_12_1a = explode('|', $arr_subchapter_12_1[0]->content);
$dt_subchapter_12_1b = explode('|', $arr_subchapter_12_1[1]->content);
$dt_subchapter_12_1c = explode('|', $arr_subchapter_12_1[2]->content);
?>

<p>V<sub>R-S</sub>: <?php echo '<u>'.$this->ifunction->ifnull($dt_subchapter_12_1a[3]).'</u>' ?> Volt.<span style="margin-left:50px">V<sub>R-N</sub>: <?php echo '<u>'.$this->ifunction->ifnull($dt_subchapter_12_1a[4]).'</u>' ?> Volt.</span><span style="margin-left:50px">V<sub>N-G</sub>: <?php echo '<u>'.$this->ifunction->ifnull($dt_subchapter_12_1a[5]).'</u>' ?> Volt.</span><br />
V<sub>R-T</sub>: <?php echo '<u>'.$this->ifunction->ifnull($dt_subchapter_12_1b[3]).'</u>' ?> Volt.<span style="margin-left:50px">V<sub>S-N</sub>: <?php echo '<u>'.$this->ifunction->ifnull($dt_subchapter_12_1b[4]).'</u>' ?> Volt.</span><span style="margin-left:50px">Frek.: <?php echo '<u>'.$this->ifunction->ifnull($dt_subchapter_12_1b[5]).'</u>' ?> Hertz.</span><br />
V<sub>S-T</sub>: <?php echo '<u>'.$this->ifunction->ifnull($dt_subchapter_12_1c[3]).'</u>' ?> Volt.<span style="margin-left:50px">V<sub>T-N</sub>:  <?php echo '<u>'.$this->ifunction->ifnull($dt_subchapter_12_1c[4]).'</u>' ?> Volt.</span></p><br />

<p><b>II. TEST KAPASITAS MODULE</b></p>

<?php $Qsubchapter = $this->db->query("SELECT `subno_chapter`, `content` FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `chapter`='13' AND `no_chapter`='13.1' ORDER BY `subno_chapter_order` ASC"); foreach($Qsubchapter->result_object() as $subchapter) $arr_subchapter_13_1[$subchapter->subno_chapter -1]=$subchapter; 

$dt_subchapter_13_1a = explode('|', $arr_subchapter_13_1[0]->content);
$dt_subchapter_13_1b = explode('|', $arr_subchapter_13_1[1]->content);

$Qsubchapter = $this->db->query("SELECT `subno_chapter`, `content` FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `chapter`='13' AND `no_chapter`='13.2' ORDER BY `subno_chapter_order` ASC"); foreach($Qsubchapter->result_object() as $subchapter) $arr_subchapter_13_2[$subchapter->subno_chapter -1]=$subchapter;
?>

<p>Kapasitas Nominal Per module: <?php echo '<u>'.$this->ifunction->ifnull($dt_subchapter_13_1a[3]).'</u>' ?> Vdc / <?php echo '<u>'.$this->ifunction->ifnull($dt_subchapter_13_1a[4]).'</u>' ?> A.<br />Beban Nominal Pengetesan: <?php echo '<u>'.$this->ifunction->ifnull($dt_subchapter_13_1b[3]).'</u>' ?> Ampere.</p><br />

<table class="border" cellpadding="0" cellspacing="0">
<tr class="header">
    <td width="29">No</td>
    <td>Serial Number Module</td>
    <td>Tegangan Output (Volt)</td>
    <td>Ripple Output VP-P<br />(mVolt)</td>
    <td width="29">No</td>
    <td>Serial Number Module</td>
    <td>Tegangan Output (Volt)</td>
    <td>Ripple <br />Output VP-P<br />(mVolt)</td>
</tr>
<?php  
for($i=0; $i <= 8; $i++){
	$dt_subchapter_13_2 = explode('|', $arr_subchapter_13_2[$i]->content);
	echo '<tr><td align="center">'.($i +1).'</td>';
	echo '<td>'.$this->ifunction->ifnull($dt_subchapter_13_2[3]).'</td><td>'.$this->ifunction->ifnull($dt_subchapter_13_2[4]).'</td><td>'.$this->ifunction->ifnull($dt_subchapter_13_2[5]).'</td><td align="center">'.($i +10).'</td><td>'.$this->ifunction->ifnull($dt_subchapter_13_2[6]).'</td><td>'.$this->ifunction->ifnull($dt_subchapter_13_2[7]).'</td><td>'.$this->ifunction->ifnull($dt_subchapter_13_2[8]).'</td></tr>';
}
?>  
</table>

<hr />

<p><b>III. TEST SHARING MODULE</b></p>

<?php $Qsubchapter = $this->db->query("SELECT `subno_chapter`, `content` FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `chapter`='14' AND `no_chapter`='14.1' ORDER BY `subno_chapter_order` ASC"); foreach($Qsubchapter->result_object() as $subchapter) $arr_subchapter_14_1[$subchapter->subno_chapter -1]=$subchapter ?>

<table class="border" cellpadding="0" cellspacing="0">
<tr class="header">
    <td rowspan="2" width="40">No<br />Module</td>
    <td colspan="3">Nilai Beban</td>
    <td rowspan="2" width="40">No<br />Module</td>
    <td colspan="3">Nilai Beban</td>
</tr>
<tr class="header">
    <td>25%<br />____ Amp.</td>
    <td>50%<br />____ Amp.</td>
    <td>100%<br />____ Amp.</td>
    <td>25%<br />____ Amp.</td>
    <td>50%<br />____ Amp.</td>
    <td>100%<br />____ Amp.</td>
</tr>
<?php  
for($i=0; $i <= 10; $i++){
	$dt_subchapter_14_1 = explode('|', $arr_subchapter_14_1[$i]->content);
	echo '<tr><td align="center">'; if($i==9) echo 'V out (Vdc)'; elseif($i==10) echo 'Ripple (mV)'; else echo ($i +1).''; echo '</td>';
	echo '<td>'.$this->ifunction->ifnull($dt_subchapter_14_1[3]).'</td><td>'.$this->ifunction->ifnull($dt_subchapter_14_1[4]).'</td><td>'.$this->ifunction->ifnull($dt_subchapter_14_1[5]).'</td><td align="center">'; if($i==9) echo 'V out (Vdc)'; elseif($i==10) echo 'Ripple (mV)'; else echo ($i +10).''; echo '</td><td>'.$this->ifunction->ifnull($dt_subchapter_14_1[6]).'</td><td>'.$this->ifunction->ifnull($dt_subchapter_14_1[7]).'</td><td>'.$this->ifunction->ifnull($dt_subchapter_14_1[8]).'</td></tr>';
}
?>  
</table>
<br />

<?php
$Qsubchapter = $this->db->query("SELECT `subno_chapter`, `content` FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `chapter`='15' AND `no_chapter`='15.1' ORDER BY `subno_chapter_order` ASC"); foreach($Qsubchapter->result_object() as $subchapter) $arr_subchapter_15_1[$subchapter->subno_chapter -1]=$subchapter; 

$dt_subchapter_15_1a = explode('|', $arr_subchapter_15_1[0]->content);

$Qsubchapter = $this->db->query("SELECT `subno_chapter`, `content` FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `chapter`='15' AND `no_chapter`='15.2' ORDER BY `subno_chapter_order` ASC"); foreach($Qsubchapter->result_object() as $subchapter) $arr_subchapter_15_2[$subchapter->subno_chapter -1]=$subchapter;
?>

<p><b>IV. PERBANDINGAN ALAT UKUR INTERNAL DAN EXTERNAL.</b><br />Toleransi: <?php echo '<u>'.$this->ifunction->ifnull($dt_subchapter_15_1a[3]).'</u>' ?> %. (Sesuai spesifikasi dari pabrik)</p><br />

<table class="border" cellpadding="0" cellspacing="0">
<tr class="header">
    <td width="40" rowspan="2">No</td>
    <td rowspan="2">Nilai Beban</td>
    <td colspan="2">Pembacaan Arus Beban</td>
    <td colspan="2" valign="top">Pembacaan Tegangan Output</td>
</tr>
<tr class="header">
    <td valign="top">Meter Internal<br />(Ampere)</td>
    <td valign="top">Tang Ampere<br />(Ampere)</td>
    <td valign="top">Meter Internal<br />(Volt)</td>
    <td valign="top">Multimeter (Volt)</td>
</tr>
<?php
$arr_dt_151 = array('0 %', '25 %', '50 %', '100 %');
for($i=0; $i <= 3; $i++){
	$dt_subchapter_15_2 = explode('|', $arr_subchapter_15_2[$i]->content);
	echo '<tr><td align="center">'.($i+1).'</td><td align="center">'.$arr_dt_151[$i].'</td>';
	echo '<td align="center">'.$this->ifunction->ifnull($dt_subchapter_15_2[3]).'</td><td align="center">'.$this->ifunction->ifnull($dt_subchapter_15_2[4]).'</td><td align="center">'.$this->ifunction->ifnull($dt_subchapter_15_2[5]).'</td><td align="center">'.$this->ifunction->ifnull($dt_subchapter_15_2[6]).'</td></tr>';
}
?>  
</table>
<br />

<p><b>V. SETTING PARAMETER</b></p>

<?php $Qsubchapter = $this->db->query("SELECT `subno_chapter`, `content` FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `chapter`='16' AND `no_chapter`='16.1' ORDER BY `subno_chapter_order` ASC"); foreach($Qsubchapter->result_object() as $subchapter) $arr_subchapter_16_1[$subchapter->subno_chapter -1]=$subchapter; 

$dt_subchapter_16_1a = explode('|', $arr_subchapter_16_1[0]->content);
$dt_subchapter_16_1b = explode('|', $arr_subchapter_16_1[1]->content);
$dt_subchapter_16_1c = explode('|', $arr_subchapter_16_1[2]->content);
$dt_subchapter_16_1d = explode('|', $arr_subchapter_16_1[3]->content);
?>

<table class="border" cellpadding="0" cellspacing="0">
<tr>
    <td width="50%">1. Tegangan Floating: <span style="margin-left:30px"><?php echo $this->ifunction->ifnull($dt_subchapter_16_1a[3]) ?> Vdc.</span></td>
    <td width="50%">5. Current Limitation Battery: <span style="margin-left:30px"> <?php echo $this->ifunction->ifnull($dt_subchapter_16_1a[4]) ?> Ampere</span></td>
</tr>
<tr>
    <td>2. Tegangan Boost/Equalizing: <span style="margin-left:30px"><?php echo $this->ifunction->ifnull($dt_subchapter_16_1b[3]) ?> Vdc.</span></td>
    <td>6. Non Load Priority/LVD1: <span style="margin-left:30px"><?php echo $this->ifunction->ifnull($dt_subchapter_16_1b[4]) ?> Vdc</span></td>
</tr>
<tr>
    <td>3. Low Voltage Alarm: <span style="margin-left:30px"><?php echo $this->ifunction->ifnull($dt_subchapter_16_1c[3]) ?> Vdc.</span></td>
    <td>7. Load Priority/LVD2: <span style="margin-left:30px"><?php echo $this->ifunction->ifnull($dt_subchapter_16_1c[4]) ?> Vdc.</span></td>
</tr>
<tr>
    <td>4. High Voltage Alarm: <span style="margin-left:30px"><?php echo $this->ifunction->ifnull($dt_subchapter_16_1d[3]) ?> Vdc.</span></td>
    <td>8. External Alarm: <?php echo '<img src="'.base_url().'static/i/radio'; if($dt_subchapter_16_1d[4]=='NO') echo '_checked'; echo '.jpg"> NO &nbsp; &nbsp; <img src="'.base_url().'static/i/radio'; if($dt_subchapter_16_1d[4]=='NC') echo '_checked'; echo '.jpg"> NC' ?></td>
</tr>
</table>

<hr />

<p><b>VI. TEST FUNGSI</b></p>

<?php $Qsubchapter = $this->db->query("SELECT `subno_chapter`, `content` FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `chapter`='17' AND `no_chapter`='17.1' ORDER BY `subno_chapter_order` ASC"); foreach($Qsubchapter->result_object() as $subchapter) $arr_subchapter_17_1[$subchapter->subno_chapter -1]=$subchapter ?>

<table class="border" cellpadding="0" cellspacing="0">
<tr class="header">
    <td width="40">No</td>
    <td>Test Fungsi</td>
    <td>Hasil</td>
</tr>
<?php
$arr_dt_171 = array('Load Non Priority/LVD1', 'Load Priority/LVD2', 'Test Back Up Battery', 'External Alarm :', 'a. Mains Input Off', 'b.', 'c.', 'd.', 'e.');
for($i=0; $i <= 8; $i++){
	$dt_subchapter_17_1 = explode('|', $arr_subchapter_17_1[$i]->content);
	echo '<tr>'; if($i > 3) echo '<td>&nbsp;</td>'; else echo '<td align="center">'.($i +1).'</td>';
	if($i>3){
		echo '<td>'.$this->ifunction->ifnull($dt_subchapter_17_1[4]).'</td><td align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_17_1[3]=='OK') echo '_checked'; echo '.jpg"> OK &nbsp;&nbsp;&nbsp; <img src="'.base_url().'static/i/radio'; if($dt_subchapter_17_1[3]=='Not OK') echo '_checked'; echo '.jpg"> NO</td></tr>';	
	}else{ 
		echo '<td>'.$arr_dt_171[$i].'</td><td align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_17_1[3]=='OK') echo '_checked'; echo '.jpg"> OK &nbsp;&nbsp;&nbsp; <img src="'.base_url().'static/i/radio'; if($dt_subchapter_17_1[3]=='Not OK') echo '_checked'; echo '.jpg"> NO</td></tr>';
	}
}
?>
</table>
<br />

<p><b>VII. DAFTAR ALAT UKUR YANG DIGUNAKAN.</b></p>

<?php $Qsubchapter = $this->db->query("SELECT `subno_chapter`, `content` FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `chapter`='18' AND `no_chapter`='18.1' ORDER BY `subno_chapter_order` ASC"); foreach($Qsubchapter->result_object() as $subchapter) $arr_subchapter_18_1[$subchapter->subno_chapter -1]=$subchapter ?>

<table class="border" cellpadding="0" cellspacing="0">
<tr class="header">
    <td width="40">No</td>
    <td>Nama Alat Ukur</td>
    <td>Merk/Type</td>
</tr>
<?php
for($i=0; $i <= 3; $i++){
	$dt_subchapter_18_1 = explode('|', $arr_subchapter_18_1[$i]->content);
	echo '<tr><td align="center">'.($i +1).'</td><td>'.$this->ifunction->ifnull($dt_subchapter_18_1[3]).'</td>';
	echo '<td align="center">'.$this->ifunction->ifnull($dt_subchapter_18_1[4]).'</td></tr>';
}
?>
</table>
<br />

<p><b>VIII. CATATAN.</b></p>
<table class="border" cellpadding="0" cellspacing="0"><tr><td valign="top" height="100">&nbsp;</td></tr></table><br />

<table class="border" cellpadding="0" cellspacing="0">
<tr>
    <td valign="top" width="50%"><br /><b><?php $data = mysql_fetch_array(mysql_query("SELECT c.`name` FROM `it_atp` a JOIN `it_user` b ON (a.`user_supervisor`  =b.`user_id`) JOIN `it_vendor` c ON (b.`vendor_id`  = c.`vendor_id`) WHERE `atp_id`=$dx")); echo $data[0]; ?><!--PT. WESTINDO--></b><br />Di test Oleh: <span style="margin-left:30px">__________________</span><br />Tanggal:<span style="margin-left:50px"> __________________</span><br />Tanda Tangan: <font color="#FFF">.</font><br /><font color="#FFF">.</font><br /><p style="margin-left:100px">____________<br /><p style="margin-left:130px">NIK. <br /></td>
    <td width="10" valign="top" style="border:none"></td>
    <td valign="top" width="50%"><br /><b>PT. INDOSAT</b><br />Di Ketahui Oleh: <span style="margin-left:10px">__________________</span><br />Tanggal:<span style="margin-left:50px"> __________________</span><br />Tanda Tangan: <font color="#FFF">.</font><br /><font color="#FFF">.</font><br /><p style="margin-left:100px">____________<br /><p style="margin-left:130px">NIK.</p></td>
</tr>
</table>