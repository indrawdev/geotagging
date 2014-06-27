<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed') ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xml:lang="en" xmlns="http://www.w3.org/1999/xhtml" lang="en">
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
<title>ATP - Mini MCE</title>
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
	font-size:20px;
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
	bottom:0
}
.page-number{
	text-align:right
}
.page-number:before{
	content:"Page " counter(page)
}
#logo{
	text-align:center;
	margin:50px 0 70px 0
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

<?php
if($print){
$Qatp = $this->db->query("
				SELECT a.`msg_supervisor`, a.`msg_manager`, a.`msg_indosat`, a.`fl_approve`, a.`fl_reject`, b.`sign_path` AS `sign_supervisor`, c.`sign_path` AS `sign_manager`, d.`sign_path` AS `sign_indosat`
				FROM `it_atp` a
				LEFT JOIN `it_user` b ON b.`user_id`=a.`uid_supervisor`
				LEFT JOIN `it_user` c ON c.`user_id`=a.`uid_manager`
				LEFT JOIN `it_user` d ON d.`user_id`=a.`uid_indosat`
				WHERE a.`atp_id`='$dx'");
				$atp = $Qatp->result_object();
				
if($atp[0]->fl_reject):
if($atp[0]->fl_approve > 1) $msg_supervisor = $atp[0]->msg_supervisor; else $msg_supervisor = '';
$msg_manager = '';
$msg_indosat = '';
else:
if($atp[0]->fl_approve > 5){
	$msg_supervisor = $atp[0]->msg_supervisor;
	$msg_manager = $atp[0]->msg_manager;
	$msg_indosat = $atp[0]->msg_indosat;
	$sign_supervisor = $atp[0]->sign_supervisor;
	$sign_manager = $atp[0]->sign_manager;
	$sign_indosat = $atp[0]->sign_indosat;
}elseif($atp[0]->fl_approve > 3){
	$msg_supervisor = $atp[0]->msg_supervisor;
	$msg_manager = $atp[0]->msg_manager;
	$msg_indosat = '';
	$sign_supervisor = $atp[0]->sign_supervisor;
	$sign_manager = $atp[0]->sign_manager;
	$sign_indosat = '';
}else{
	$msg_supervisor = $atp[0]->msg_supervisor;
	$msg_manager = '';
	$msg_indosat = '';
	$sign_supervisor = $atp[0]->sign_supervisor;
	$sign_manager = '';
	$sign_indosat = '';
}
endif;
?>
<div id="paging">
	<div class="page-number"></div>
</div>

<div id="footer">
<table class="footer" cellpadding="0" cellspacing="0">
<tr>
    <td>Comment</td>
    <td width="150">Name / Signature</td>
    <td width="100">Date</td>
</tr>
<tr>
    <td height="25"></td><td></td><td></td>
</tr>
</table>

<table class="footer" cellpadding="0" cellspacing="0" style="margin-top:5px">
<tr><td colspan="3">Diperiksa & diuji oleh:</td></tr>
<tr>
    <td width="33%" align="center">INDOSAT BSS NOMC</td>
    <td width="34%" align="center">PT. Indosat Tbk.</td>
    <td width="33%" align="center">PT. Ericsson Indonesia</td>
</tr>
<tr>
    <td height="30">
    <?php
	if($msg_manager){
		$manager = explode('|', $msg_manager);
		echo 'Date: '.date('d/m/Y', $manager[0]).' <span>.</span>Sign: ';
		if($sign_manager) echo '<img class="sign" src="'.base_url().'media/files/'.$sign_manager.'">';
	}
	else echo 'Date:............ <span>.</span>Sign:............';
	?>
    </td>
    <td>
    <?php
	if($msg_indosat){
		$indosat = explode('|', $msg_indosat);
		echo 'Date: '.date('d/m/Y', $indosat[0]).' <span>.</span>Sign: ';
		if($sign_indosat) echo '<img class="sign" src="'.base_url().'media/files/'.$sign_indosat.'">';
	}
	else echo 'Date:............ <span>.</span>Sign:............';
	?>
    </td>
    <td>
    <?php
	if($msg_supervisor){
		$supervisor = explode('|', $msg_supervisor);
		echo 'Date: '.date('d/m/Y', $supervisor[0]).' <span>.</span>Sign: ';
		if($sign_supervisor) echo '<img class="sign" src="'.base_url().'media/files/'.$sign_supervisor.'">';
	}
	else echo 'Date:............ <span>.</span>Sign:............';
	?>
    </td>
</tr>
</table>
</div>

<div id="footer-cover"></div>

<?php } if($cover <> 2){ ?>

<p id="logo"><img src="<?php echo base_url() ?>static/i/indosat_ericsson.jpg" /></p>

<h1>INDOSAT AOP PHASE 1 2012<br /><br /><u>BERITA ACARA ATP</u></h1>

<?php
$Qatp = $this->db->query("
SELECT b.`id` AS `id_site`, b.`name` AS `nm_site`, c.`timelog`, d.`name` AS `nm_user`, e.`name` AS `nm_vendor`, g.`name` AS `nm_waspang`
FROM `it_atp` a
LEFT JOIN `it_site` b ON b.`site_id`=a.`site_id`
JOIN `it_checkin` c ON c.`idx`=a.`atp_id` AND c.`table`='atp'
JOIN `it_user` d ON d.`user_id`=c.`user_id`
LEFT JOIN `it_vendor` e ON e.`vendor_id`=a.`vendor_id`
LEFT JOIN `it_attachment` f ON f.`idx`=a.`atp_id` AND f.`table`='atp_indosat_foto'
LEFT JOIN `it_user` g ON g.`user_id`=f.`user_id`
WHERE a.`atp_id`='$dx'");
$atp = $Qatp->result_object();

$Qsubchapter = $this->db->query("SELECT `subno_chapter`, `content` FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `chapter`='-3' AND `no_chapter`='-3.1' ORDER BY `subno_chapter_order` ASC");
foreach($Qsubchapter->result_object() as $subchapter) $arr_subchapter_m3_1[$subchapter->subno_chapter -1]=$subchapter;
$dt_subchapter_m3_1 = explode('|', $arr_subchapter_m3_1[0]->content);
$dt_subchapter_m3_2 = explode('|', $arr_subchapter_m3_1[1]->content);
?>
<table cellpadding="0" cellspacing="0" style="margin:60px 0">
<tr><td width="120">Proyek</td><td align="center" width="10">:</td><td><?php echo $this->ifunction->ifnull($dt_subchapter_m3_1[3]) ?></td></tr>
<tr><td>Tanggal Uji Terima</td><td align="center">:</td><td><?php echo date('d F Y - H:i', $atp[0]->timelog) ?></td></tr>
<tr><td>Site ID / Name</td><td align="center">:</td><td><?php echo $atp[0]->id_site ?> / <?php echo $atp[0]->nm_site ?></td></tr>
<tr><td>Type RBS</td><td align="center">:</td><td><?php echo $this->ifunction->ifnull($dt_subchapter_m3_2[3]) ?></td></tr>
</table>

<table class="footer" cellpadding="0" cellspacing="0" style="margin:10px 0 40px 0">
<tr class="header"><td width="15">No</td><td>Nama</td><td>Instansi</td></tr>
<tr><td align="center">1</td><td><?php echo $atp[0]->nm_user ?></td><td align="center"><?php echo $atp[0]->nm_vendor ?></td></tr>
<tr><td align="center">2</td><td><?php echo $atp[0]->nm_waspang ?></td><td align="center">INDOSAT</td></tr>
</table>

<?php /*
<p>Secara bersama-sama telah mengadakan Verifikasi pekerjaan dengan hasil sebagai berikut:</p>
<p><img src="<?php echo base_url() ?>static/i/checkbox.jpg"> &nbsp;<b>Pekerjaan telah selesai 100% dan diterima.</b></p>
<p><img src="<?php echo base_url() ?>static/i/checkbox.jpg"> &nbsp;<b>Pekerjaan telah selesai 100% dan diterima dengan catatan.</b><br /><span style="padding:0 0 0 20px">(harus diselesaikan selama 14 hari Kalender sejak tanggal uji terima)</span></p>
<p><img src="<?php echo base_url() ?>static/i/checkbox.jpg"> &nbsp;<b>Pekerjaan telah selesai 100%, ditolak.</b></p>
*/ ?>

<p>Hasil Pemeriksaan dan Pengujian terlampir.</p>
<p>Berita Acara ini dibuat dalam rangka penerbitan Berita Acara Serah Terima Pertama.</p>

<hr />
<?php } if($cover == 1) die('</body></html>') ?>

<table class="border" cellpadding="0" cellspacing="0">
<tr class="header">
	<td width="20" align="center">No</td><td>Item Pekerjaan</td><td width="210">Hasil pemeriksaan</td><td width="90">Keterangan</td>
</tr>

<?php
$Qsubchapter = $this->db->query("SELECT `content` FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `chapter`='1' AND `no_chapter`='1.1' ORDER BY `subno_chapter_order` ASC");
foreach($Qsubchapter->result_object() as $subchapter) $arr_subchapter_1_1[]=$subchapter;
$dt_subchapter_1_1 = explode('|', $arr_subchapter_1_1[0]->content);
?>
<tr><td align="center"><b>A</b></td><td colspan="3"><b>PONDASI RBS (Tipe RBS <?php echo $this->ifunction->ifnull($dt_subchapter_1_1[3]) ?>)</b></td></tr>

<?php
$Qsubchapter = $this->db->query("SELECT `content` FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `chapter`='2' AND `no_chapter`='2.1' ORDER BY `subno_chapter_order` ASC");
foreach($Qsubchapter->result_object() as $subchapter) $arr_subchapter_2_1[]=$subchapter;
$dt_subchapter_2_1 = explode('|', $arr_subchapter_2_1[0]->content);
?>
<tr><td align="center">1</td><td>Ukuran pondasi sesuai design</td><td align="center"><img src="<?php echo base_url() ?>static/i/radio<?php if($dt_subchapter_2_1[3]=='OK') echo '_checked' ?>.jpg"> OK <span style="padding:0 15px">&nbsp;</span> <img src="<?php echo base_url() ?>static/i/radio<?php if($dt_subchapter_2_1[3]=='Not OK') echo '_checked' ?>.jpg"> Not OK <span style="padding:0 15px">&nbsp;</span> <img src="<?php echo base_url() ?>static/i/radio<?php if($dt_subchapter_2_1[3]=='N/A') echo '_checked' ?>.jpg"> N/A</td><td></td></tr>

<?php
$Qsubchapter = $this->db->query("SELECT `content` FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `chapter`='3' AND `no_chapter`='3.1' ORDER BY `subno_chapter_order` ASC");
foreach($Qsubchapter->result_object() as $subchapter) $arr_subchapter_3_1[]=$subchapter;

$arr_dt_31 = array('L', 'P', 'T');

for($i=0; $i <= 2; $i++){
	$dt_subchapter_3_1 = explode('|', $arr_subchapter_3_1[$i]->content);
	echo '<tr><td></td><td>'.$arr_dt_31[$i].' = '.$this->ifunction->ifnull($dt_subchapter_3_1[3]).' Meter</td><td></td><td></td></tr>';
}
?>

<?php
$Qsubchapter = $this->db->query("SELECT `content` FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `chapter`='4' AND `no_chapter`='4.1' ORDER BY `subno_chapter_order` ASC");
foreach($Qsubchapter->result_object() as $subchapter) $arr_subchapter_4_1[]=$subchapter;
$dt_subchapter_4_1 = explode('|', $arr_subchapter_4_1[0]->content);
?>
<tr><td align="center">2</td><td>Finishing pondasi</td><td align="center"><img src="<?php echo base_url() ?>static/i/radio<?php if($dt_subchapter_4_1[3]=='OK') echo '_checked' ?>.jpg"> OK <span style="padding:0 15px">&nbsp;</span> <img src="<?php echo base_url() ?>static/i/radio<?php if($dt_subchapter_4_1[3]=='Not OK') echo '_checked' ?>.jpg"> Not OK <span style="padding:0 15px">&nbsp;</span> <img src="<?php echo base_url() ?>static/i/radio<?php if($dt_subchapter_4_1[3]=='N/A') echo '_checked' ?>.jpg"> N/A</td><td></td></tr>

<tr><td align="center"><b>B</b></td><td colspan="3"><b>PEMASANGAN CABLE TRAY / LADDER</b></td></tr>
<tr><td align="center"><b>b1</b></td><td colspan="3"><b>Tray/ Ladder Vertikal</b></td></tr>

<?php
$Qsubchapter = $this->db->query("SELECT `content` FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `chapter`='5' AND `no_chapter`='5.1' ORDER BY `subno_chapter_order` ASC");
foreach($Qsubchapter->result_object() as $subchapter) $arr_subchapter_5_1[]=$subchapter;
$dt_subchapter_5_1 = explode('|', $arr_subchapter_5_1[0]->content);
?>
<tr><td align="center">1</td><td>Ukuran dan bentuk sesuai design</td><td align="center"><img src="<?php echo base_url() ?>static/i/radio<?php if($dt_subchapter_5_1[3]=='OK') echo '_checked' ?>.jpg"> OK <span style="padding:0 15px">&nbsp;</span> <img src="<?php echo base_url() ?>static/i/radio<?php if($dt_subchapter_5_1[3]=='Not OK') echo '_checked' ?>.jpg"> Not OK <span style="padding:0 15px">&nbsp;</span> <img src="<?php echo base_url() ?>static/i/radio<?php if($dt_subchapter_5_1[3]=='N/A') echo '_checked' ?>.jpg"> N/A</td><td></td></tr>

<?php
$Qsubchapter = $this->db->query("SELECT `content` FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `chapter`='6' AND `no_chapter`='6.1' ORDER BY `subno_chapter_order` ASC");
foreach($Qsubchapter->result_object() as $subchapter) $arr_subchapter_6_1[]=$subchapter;

$arr_dt_61 = array('L', 'P');

for($i=0; $i <= 1; $i++){
	$dt_subchapter_6_1 = explode('|', $arr_subchapter_6_1[$i]->content);
	echo '<tr><td></td><td>'.$arr_dt_61[$i].' = '.$this->ifunction->ifnull($dt_subchapter_6_1[3]).' Meter</td><td></td><td></td></tr>';
}
?>

<?php
$Qsubchapter = $this->db->query("SELECT `content` FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `chapter`='7' AND `no_chapter`='7.1' ORDER BY `subno_chapter_order` ASC");
foreach($Qsubchapter->result_object() as $subchapter) $arr_subchapter_7_1[]=$subchapter;

$arr_dt_71 = array('Tray/ Ladder terpasang baik dan kuat', 'Tray/ Ladder terpasang baik dan kuat');

for($i=0; $i <= 1; $i++){
	$dt_subchapter_7_1 = explode('|', $arr_subchapter_7_1[$i]->content);
	echo '<tr><td align="center">'.($i +1).'</td><td>'.$arr_dt_71[$i].'</td><td align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_7_1[3]=='OK') echo '_checked'; echo '.jpg"> OK <span style="padding:0 15px">&nbsp;</span> <img src="'.base_url().'static/i/radio'; if($dt_subchapter_7_1[3]=='Not OK') echo '_checked'; echo '.jpg"> Not OK <span style="padding:0 15px">&nbsp;</span> <img src="'.base_url().'static/i/radio'; if($dt_subchapter_7_1[3]=='N/A') echo '_checked'; echo '.jpg"> N/A</td><td></td></tr>';
}
?>

<tr><td align="center"><b>b2</b></td><td colspan="3"><b>Tray/ Ladder Horizontal</b></td></tr>

<?php
$Qsubchapter = $this->db->query("SELECT `content` FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `chapter`='8' AND `no_chapter`='8.1' ORDER BY `subno_chapter_order` ASC");
foreach($Qsubchapter->result_object() as $subchapter) $arr_subchapter_8_1[]=$subchapter;
$dt_subchapter_8_1 = explode('|', $arr_subchapter_8_1[0]->content);
?>
<tr><td align="center">1</td><td>Ukuran dan bentuk sesuai design</td><td align="center"><img src="<?php echo base_url() ?>static/i/radio<?php if($dt_subchapter_8_1[3]=='OK') echo '_checked' ?>.jpg"> OK <span style="padding:0 15px">&nbsp;</span> <img src="<?php echo base_url() ?>static/i/radio<?php if($dt_subchapter_8_1[3]=='Not OK') echo '_checked' ?>.jpg"> Not OK <span style="padding:0 15px">&nbsp;</span> <img src="<?php echo base_url() ?>static/i/radio<?php if($dt_subchapter_8_1[3]=='N/A') echo '_checked' ?>.jpg"> N/A</td><td></td></tr>

<?php
$Qsubchapter = $this->db->query("SELECT `content` FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `chapter`='9' AND `no_chapter`='9.1' ORDER BY `subno_chapter_order` ASC");
foreach($Qsubchapter->result_object() as $subchapter) $arr_subchapter_9_1[]=$subchapter;

$arr_dt_91 = array('L', 'P');

for($i=0; $i <= 1; $i++){
	$dt_subchapter_9_1 = explode('|', $arr_subchapter_9_1[$i]->content);
	echo '<tr><td></td><td>'.$arr_dt_91[$i].' = '.$this->ifunction->ifnull($dt_subchapter_9_1[3]).' Meter</td><td></td><td></td></tr>';
}
?>

<?php
$Qsubchapter = $this->db->query("SELECT `content` FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `chapter`='10' AND `no_chapter`='10.1' ORDER BY `subno_chapter_order` ASC");
foreach($Qsubchapter->result_object() as $subchapter) $arr_subchapter_10_1[]=$subchapter;

$arr_dt_101 = array('Tray/ Ladder terpasang baik dan kuat', 'Tray/ Ladder dicat dengan rapi', 'Tray/ Ladder Support terpasang dengan kuat');

for($i=0; $i <= 2; $i++){
	$dt_subchapter_10_1 = explode('|', $arr_subchapter_10_1[$i]->content);
	echo '<tr><td align="center">'.($i +2).'</td><td>'.$arr_dt_101[$i].'</td><td align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_10_1[3]=='OK') echo '_checked'; echo '.jpg"> OK <span style="padding:0 15px">&nbsp;</span> <img src="'.base_url().'static/i/radio'; if($dt_subchapter_10_1[3]=='Not OK') echo '_checked'; echo '.jpg"> Not OK <span style="padding:0 15px">&nbsp;</span> <img src="'.base_url().'static/i/radio'; if($dt_subchapter_10_1[3]=='N/A') echo '_checked'; echo '.jpg"> N/A</td><td></td></tr>';
}
?>

<tr><td align="center"><b>C</b></td><td colspan="3"><b>PEKERJAAN ELEKTRIKAL</b></td></tr>

<?php
$Qsubchapter = $this->db->query("SELECT `content` FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `chapter`='11' AND `no_chapter`='11.1' ORDER BY `subno_chapter_order` ASC");
foreach($Qsubchapter->result_object() as $subchapter) $arr_subchapter_11_1[]=$subchapter;
$dt_subchapter_11_1 = explode('|', $arr_subchapter_11_1[0]->content);
?>
<tr><td align="center">1</td><td>a. Pemasangan MCB <?php echo $this->ifunction->ifnull($dt_subchapter_11_1[4]) ?> X <?php echo $this->ifunction->ifnull($dt_subchapter_11_1[5]) ?> A</td><td align="center"><img src="<?php echo base_url() ?>static/i/radio<?php if($dt_subchapter_11_1[3]=='OK') echo '_checked' ?>.jpg"> OK <span style="padding:0 15px">&nbsp;</span> <img src="<?php echo base_url() ?>static/i/radio<?php if($dt_subchapter_11_1[3]=='Not OK') echo '_checked' ?>.jpg"> Not OK <span style="padding:0 15px">&nbsp;</span> <img src="<?php echo base_url() ?>static/i/radio<?php if($dt_subchapter_11_1[3]=='N/A') echo '_checked' ?>.jpg"> N/A</td><td></td></tr>

<tr><td align="center">2</td><td colspan="3">Pekerjaan Grounding</td></tr>

<?php
$Qsubchapter = $this->db->query("SELECT `content` FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `chapter`='12' AND `no_chapter`='12.1' ORDER BY `subno_chapter_order` ASC");
foreach($Qsubchapter->result_object() as $subchapter) $arr_subchapter_12_1[]=$subchapter;
$dt_subchapter_12_1 = explode('|', $arr_subchapter_12_1[0]->content);
?>
<tr><td></td><td>a. Dimensi  Bus bar (Al / Cu) <?php echo $this->ifunction->ifnull($dt_subchapter_12_1[4]) ?> x <?php echo $this->ifunction->ifnull($dt_subchapter_12_1[5]) ?> x <?php echo $this->ifunction->ifnull($dt_subchapter_12_1[6]) ?> mm <?php echo $this->ifunction->ifnull($dt_subchapter_12_1[7]) ?> hole <?php echo $this->ifunction->ifnull($dt_subchapter_12_1[8]) ?> bh</td><td align="center"><img src="<?php echo base_url() ?>static/i/radio<?php if($dt_subchapter_12_1[3]=='OK') echo '_checked' ?>.jpg"> OK <span style="padding:0 15px">&nbsp;</span> <img src="<?php echo base_url() ?>static/i/radio<?php if($dt_subchapter_12_1[3]=='Not OK') echo '_checked' ?>.jpg"> Not OK <span style="padding:0 15px">&nbsp;</span> <img src="<?php echo base_url() ?>static/i/radio<?php if($dt_subchapter_12_1[3]=='N/A') echo '_checked' ?>.jpg"> N/A</td><td></td></tr>

<?php
$Qsubchapter = $this->db->query("SELECT `content` FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `chapter`='13' AND `no_chapter`='13.1' ORDER BY `subno_chapter_order` ASC");
foreach($Qsubchapter->result_object() as $subchapter) $arr_subchapter_13_1[]=$subchapter;

$arr_dt_131 = array('b. Instalasi BCC 50 mm', 'd. Bus-Bar yang terpasang sesuai desain');

for($i=0; $i <= 1; $i++){
	$dt_subchapter_13_1 = explode('|', $arr_subchapter_13_1[$i]->content);
	echo '<tr><td></td><td>'.$arr_dt_131[$i].'</td><td align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_13_1[3]=='OK') echo '_checked'; echo '.jpg"> OK <span style="padding:0 15px">&nbsp;</span> <img src="'.base_url().'static/i/radio'; if($dt_subchapter_13_1[3]=='Not OK') echo '_checked'; echo '.jpg"> Not OK <span style="padding:0 15px">&nbsp;</span> <img src="'.base_url().'static/i/radio'; if($dt_subchapter_13_1[3]=='N/A') echo '_checked'; echo '.jpg"> N/A</td><td></td></tr>';
}
?>

<?php
$Qsubchapter = $this->db->query("SELECT `content` FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `chapter`='14' AND `no_chapter`='14.1' ORDER BY `subno_chapter_order` ASC");
foreach($Qsubchapter->result_object() as $subchapter) $arr_subchapter_14_1[]=$subchapter;
$dt_subchapter_14_1 = explode('|', $arr_subchapter_14_1[0]->content);
?>
<tr><td></td><td>e. Upgrade PLN, from <?php echo $this->ifunction->ifnull($dt_subchapter_14_1[4]) ?> KVA, to <?php echo $this->ifunction->ifnull($dt_subchapter_14_1[5]) ?> KVA</td><td align="center"><img src="<?php echo base_url() ?>static/i/radio<?php if($dt_subchapter_14_1[3]=='OK') echo '_checked' ?>.jpg"> OK <span style="padding:0 15px">&nbsp;</span> <img src="<?php echo base_url() ?>static/i/radio<?php if($dt_subchapter_14_1[3]=='Not OK') echo '_checked' ?>.jpg"> Not OK <span style="padding:0 15px">&nbsp;</span> <img src="<?php echo base_url() ?>static/i/radio<?php if($dt_subchapter_14_1[3]=='N/A') echo '_checked' ?>.jpg"> N/A</td><td></td></tr>

<tr><td align="center"><b>D</b></td><td colspan="3"><b>PEKERJAAN LAIN LAIN</b></td></tr>

<?php
$Qsubchapter = $this->db->query("SELECT `content` FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `chapter`='15' AND `no_chapter`='15.1' ORDER BY `subno_chapter_order` ASC");
foreach($Qsubchapter->result_object() as $subchapter) $arr_subchapter_15_1[]=$subchapter;

for($i=0; $i <= 3; $i++){
	$dt_subchapter_15_1 = explode('|', $arr_subchapter_15_1[$i]->content);
	echo '<tr><td align="center"></td><td>'.$this->ifunction->ifnull($dt_subchapter_15_1[4]).'</td><td align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_15_1[3]=='OK') echo '_checked'; echo '.jpg"> OK <span style="padding:0 15px">&nbsp;</span> <img src="'.base_url().'static/i/radio'; if($dt_subchapter_15_1[3]=='Not OK') echo '_checked'; echo '.jpg"> Not OK <span style="padding:0 15px">&nbsp;</span> <img src="'.base_url().'static/i/radio'; if($dt_subchapter_15_1[3]=='N/A') echo '_checked'; echo '.jpg"> N/A</td><td></td></tr>';
}
?>
</table>