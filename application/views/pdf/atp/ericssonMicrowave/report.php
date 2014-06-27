<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed') ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xml:lang="en" xmlns="http://www.w3.org/1999/xhtml" lang="en">
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
<title>ATP - Ericsson Microwave</title>
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

<?php
$Qatp = $this->db->query("SELECT `id`, `destination`, `address` FROM `it_atp` WHERE `atp_id`='$dx'"); $atp = $Qatp->result_object();
$Qei = $this->db->query("SELECT * FROM `it_atp_form` WHERE `atp_id`='$dx'"); $ei = $Qei->result_object();
if($cover <> 2){
?>

<center><img src="<?php echo base_url() ?>static/i/pdf_atp_microwave.jpg" /></center><br /><br />

<h2 align="center">ACCEPTANCE TEST RESULT - Version 1.2<br />MICROWAVE EQUIPMENTS<br />MINI-LINK E / TRAFFIC NODE</h2><br /><br />
<table width="100%">
<tr>
	<td width="80">Vendor</td><td width="10">:</td>
	<td><?php echo $this->ifunction->ifnull($ei[0]->microwave_vendor) ?></td>
    <td width="95">Model</td><td width="10">:</td>
    <td><?php echo $this->ifunction->ifnull($ei[0]->microwave_model) ?></td>
</tr>
<tr>
	<td>Configuration</td><td>:</td>
	<td><?php echo $this->ifunction->ifnull($ei[0]->microwave_configuration) ?></td>
    <td>SW Version</td><td>:</td>
    <td><?php echo $this->ifunction->ifnull($ei[0]->microwave_version) ?></td>
</tr>
<tr>
	<td>Station</td><td>:</td>
	<td><?php echo $this->ifunction->ifnull($ei[0]->microwave_station) ?></td>
    <td>Frequency</td><td>:</td>
    <td><?php echo $this->ifunction->ifnull($ei[0]->microwave_frequency) ?></td>
</tr>
<tr>
	<td>Link</td><td>:</td>
	<td><?php echo $this->ifunction->ifnull($ei[0]->microwave_link) ?></td>
    <td>Capacity</td><td>:</td>
    <td><?php echo $this->ifunction->ifnull($ei[0]->microwave_capacity) ?> Mbps</td>
</tr>
<tr>
	<td>Date</td><td>:</td>
	<td><?php echo $this->ifunction->ifnull($ei[0]->microwave_date) ?></td>
    <td>Site ID (Radio ID)</td><td>:</td>
    <td><?php echo $this->ifunction->ifnull($ei[0]->microwave_site_id) ?></td>
</tr>
<tr>
	<td colspan="6">MLTN IP Address / Sub Net Mask : <?php echo $this->ifunction->ifnull($ei[0]->microwave_ip_address) ?></td>
</tr>
</table>

<br /><br />

<table width="100%">
<tr>
	<td colspan="3">For PT INDOSAT</td><td colspan="3">For Contractor</td>
</tr>
<tr>
	<td width="80">Print Name</td><td width="10">:</td>
	<td><?php echo $this->ifunction->ifnull($ei[0]->microwave_indosat_name) ?></td>
    <td width="80">Print Name</td><td width="10">:</td>
    <td><?php echo $this->ifunction->ifnull($ei[0]->microwave_contractor_name) ?></td>
</tr>
<tr height="80">
	<td valign="top">NIK</td><td valign="top">:</td>
	<td valign="top"><?php echo $this->ifunction->ifnull($ei[0]->microwave_indosat_nik) ?></td>
    <td valign="top">ID</td><td valign="top">:</td>
    <td valign="top"><?php echo $this->ifunction->ifnull($ei[0]->microwave_contractor_nik) ?></td>
</tr>
<tr>
	<td>Signature</td><td>:</td>
	<td>__________________</td>
    <td>Signature</td><td>:</td>
    <td>__________________</td>
</tr>
</table>

<br /><br />

<table width="100%">
<tr>
	<td valign="top" width="80">REMARKS</td><td valign="top" width="10">:</td>
	<td><br /><?php echo $this->ifunction->ifnull($ei[0]->microwave_remark) ?></td>
</tr>
</table>

<hr />
<?php } if($cover == 1) die('</body></html>') ?>

<?php $Qchapter = $this->db->query("SELECT `no_chapter`, `content` FROM `it_atp_chapter` WHERE `atp_id`='$dx' AND `chapter`='1' ORDER BY `atp_chapter_id` ASC"); foreach($Qchapter->result_object() as $chapter) $arr_chapter_1[str_replace('1.', '', $chapter->no_chapter) -1]=$chapter ?>

<h3>1. Preliminary checks</h3>
<table class="border" cellpadding="0" cellspacing="0">
<tr class="header">
    <td>Title work performed</td>
    <td width="30">OK</td>
    <td width="40">NOK</td>
    <td width="35">N/A</td>
</tr>
<tr>
    <td>Preliminary site checks<br />&bull; Site Installation Document (SID) / Binder</td>
    <td align="center"><br /><?php echo '<img src="'.base_url().'static/i/radio'; if($arr_chapter_1[0]->content=='OK') echo '_checked'; echo '.jpg">' ?></td>
    <td align="center"><br /><?php echo '<img src="'.base_url().'static/i/radio'; if($arr_chapter_1[0]->content=='Not OK') echo '_checked'; echo '.jpg">' ?></td>
    <td align="center"><br /><?php echo '<img src="'.base_url().'static/i/radio'; if($arr_chapter_1[0]->content=='N/A') echo '_checked'; echo '.jpg">' ?></td>
</tr>
</table>
<br />

<?php $Qchapter = $this->db->query("SELECT `no_chapter`, `content` FROM `it_atp_chapter` WHERE `atp_id`='$dx' AND `chapter`='2' ORDER BY `atp_chapter_id` ASC");
foreach($Qchapter->result_object() as $chapter) $arr_chapter_2[str_replace('2.', '', $chapter->no_chapter) -1]=$chapter ?>

<h3>2. Installation check</h3>
<table class="border" cellpadding="0" cellspacing="0">
  <tr>
    <td width="30%" bgcolor="#CCCCCC">Installation    Checking Result</td>
    <td align="center"><?php echo '<img src="'.base_url().'static/i/radio'; if($arr_chapter_2[0]->content=='OK') echo '_checked'; echo '.jpg">' ?>OK <?php echo '<img src="'.base_url().'static/i/radio'; if($arr_chapter_2[0]->content=='Not OK') echo '_checked'; echo '.jpg">' ?>NOK</td>
    <td width="30%">Installation check result to be attached</td>
  </tr>
</table>
<br />

<?php $Qsubchapter = $this->db->query("SELECT `subno_chapter`, `content` FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `chapter`='3' AND `no_chapter`='3.1' ORDER BY `subno_chapter_order` ASC"); foreach($Qsubchapter->result_object() as $subchapter) $arr_subchapter_3_1[$subchapter->subno_chapter -1]=$subchapter;

$dt_subchapter_3_1a = explode('|', $arr_subchapter_3_1[0]->content);
$dt_subchapter_3_1b = explode('|', $arr_subchapter_3_1[1]->content);
?>

<h3>3. VDC input MW Specification</h3>
<table class="border" cellpadding="0" cellspacing="0">
  <tr class="header">
    <td align="center">Test Item</td>
    <td align="center" width="100">Vdc supply<br />
      (- 24Vdc / -48Vdc)</td>
    <td align="center">Remark</td>
  </tr>
  <tr>
    <td>Input DC power </td>
    <td><?php echo $this->ifunction->ifnull($dt_subchapter_3_1a[3]) ?></td>
    <td><?php echo $this->ifunction->ifnull($dt_subchapter_3_1a[4]) ?></td>
  </tr>
  <tr>
    <td>Power redundancy test (if applicable)</td>
    <td align="center"><?php echo '<img src="'.base_url().'static/i/radio'; if($dt_subchapter_3_1b[3]=='OK') echo '_checked'; echo '.jpg">' ?> OK 
      <?php echo '<img src="'.base_url().'static/i/radio'; if($dt_subchapter_3_1b[3]=='Not OK') echo '_checked'; echo '.jpg">' ?> NOK </td>
    <td>By switch off the DC breaker at DBPDB or Rectifier. Label must be attached.</td>
  </tr>
</table>
<br />

<?php $Qsubchapter = $this->db->query("SELECT `subno_chapter`, `content` FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `chapter`='4' AND `no_chapter`='4.1' ORDER BY `subno_chapter_order` ASC"); foreach($Qsubchapter->result_object() as $subchapter) $arr_subchapter_4_1[$subchapter->subno_chapter -1]=$subchapter; 

$dt_subchapter_4_1a = explode('|', $arr_subchapter_4_1[0]->content);
$dt_subchapter_4_1b = explode('|', $arr_subchapter_4_1[1]->content);
?>

<h3>4. Terminal inventory</h3>
<table class="border" cellpadding="0" cellspacing="0">
  <tr class="header">
    <td rowspan="2">EQUIPMENTS CHECKING</td>
    <td align="center" width="100">IDU</td>
    <td align="center" width="150">ODU</td>
    <td align="center">Note</td>
  </tr>
  <tr>
    <td align="center">
      <?php echo '<img src="'.base_url().'static/i/radio'; if($dt_subchapter_4_1a[3]=='OK') echo '_checked'; echo '.jpg">' ?>
      OK  / 
      <?php echo '<img src="'.base_url().'static/i/radio'; if($dt_subchapter_4_1a[3]=='Not OK') echo '_checked'; echo '.jpg">' ?>
      NOK</td>
    <td align="center"><?php echo '<img src="'.base_url().'static/i/radio'; if($dt_subchapter_4_1a[4]=='OK') echo '_checked'; echo '.jpg">' ?>
      OK /
      <?php echo '<img src="'.base_url().'static/i/radio'; if($dt_subchapter_4_1a[4]=='Not OK') echo '_checked'; echo '.jpg">' ?>
      NOK /
      <?php echo '<img src="'.base_url().'static/i/radio'; if($dt_subchapter_4_1a[4]=='N/A') echo '_checked'; echo '.jpg">' ?>
      NA</td>
    <td>Attach the print out of Inventory only</td>
  </tr>
</table>
<br />
<table class="border" cellpadding="0" cellspacing="0">
  <tr class="header">
    <td rowspan="2">ANTENNA CHECKING</td>
    <td align="center">Type</td>
    <td align="center">Diameter</td>
    <td align="center">Serial Number</td>
    <td align="center">Polarization</td>
    <td align="center">Remark</td>
  </tr>
  <tr>
    <td><?php echo $this->ifunction->ifnull($dt_subchapter_4_1b[3]) ?></td>
    <td><?php echo $this->ifunction->ifnull($dt_subchapter_4_1b[4]) ?></td>
    <td><?php echo $this->ifunction->ifnull($dt_subchapter_4_1b[5]) ?></td>
    <td><?php echo $this->ifunction->ifnull($dt_subchapter_4_1b[6]) ?></td>
    <td align="center">OK / NOK / NA</td>
  </tr>
</table>
<br />

<?php $Qchapter = $this->db->query("SELECT `no_chapter`, `content` FROM `it_atp_chapter` WHERE `atp_id`='$dx' AND `chapter`='5' ORDER BY `atp_chapter_id` ASC");
foreach($Qchapter->result_object() as $chapter) $arr_chapter_5[str_replace('5.', '', $chapter->no_chapter) -1]=$chapter; 

$dt_chapter_5a = $arr_chapter_5[0]->content;
$dt_chapter_5b = $arr_chapter_5[1]->content;
?>

<h3>5. NE to NMS Integration</h3>
<table class="border" cellpadding="0" cellspacing="0">
  <tr>
    <td class="header">Network Element Integration to NMS Server</td>
    <td align="center" width="100"><?php echo '<img src="'.base_url().'static/i/radio'; if($dt_chapter_5a =='OK') echo '_checked'; echo '.jpg">' ?> OK <?php echo '<img src="'.base_url().'static/i/radio'; if($dt_chapter_5a =='Not OK') echo '_checked'; echo '.jpg">' ?> NOK</td>
    <td><p align="center">NE must be connected at NMS Server based on ping to server and call 0816100537 (NMC TRM)</td>
  </tr>
  <tr>
    <td class="header">Name of Network Element</td>
    <td align="center"><?php echo $this->ifunction->ifnull($dt_chapter_5b) ?></td>
    <td align="center">NE's name must be shown at NMS based on ping to server </td>
  </tr>
</table>
<br />

<?php $Qchapter = $this->db->query("SELECT `no_chapter`, `content` FROM `it_atp_chapter` WHERE `atp_id`='$dx' AND `chapter`='6' ORDER BY `atp_chapter_id` ASC");
foreach($Qchapter->result_object() as $chapter) $arr_chapter_6[str_replace('6.', '', $chapter->no_chapter) -1]=$chapter ?>
<h3>6. Configuration check</h3>
<table class="border" cellpadding="0" cellspacing="0">
  <tr>
    <td class="header">Configuration</td>
    <td align="center">
      <?php echo '<img src="'.base_url().'static/i/radio'; if($arr_chapter_6[0]->content=='OK') echo '_checked'; echo '.jpg">' ?>
      OK 
      <?php echo '<img src="'.base_url().'static/i/radio'; if($arr_chapter_6[0]->content=='Not OK') echo '_checked'; echo '.jpg">' ?>
      NOK</td>
    <td>Must be submit by softcopy</td>
  </tr>
</table>
<br />

<hr />

<?php $Qsubchapter = $this->db->query("SELECT `subno_chapter`, `content` FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `chapter`='7' AND `no_chapter`='7.1' ORDER BY `subno_chapter_order` ASC"); foreach($Qsubchapter->result_object() as $subchapter) $arr_subchapter_7_1[$subchapter->subno_chapter -1]=$subchapter;

$dt_subchapter_7_1a = explode('|', $arr_subchapter_7_1[5]->content);
$dt_subchapter_7_1b = explode('|', $arr_subchapter_7_1[6]->content);
$dt_subchapter_7_1c = explode('|', $arr_subchapter_7_1[7]->content);
?>
<h3>7. Local Test Performance</h3>
<table class="border" cellpadding="0" cellspacing="0">
<tr class="header">
    <td rowspan="2">ITEM TEST</td>
    <td rowspan="2">SPECIFICATION</td>
    <td colspan="2">MEASUREMENT</td>
    <td rowspan="2" width="100">REMARK</td>
</tr>
<tr class="header">
    <td width="100">MAIN</td>
    <td width="100">STBY</td>
</tr>
<?php
$arr_dt_71 = array('<td>Transmit Power (dBm)</td><td>Depend on type / target</td>', '<td>Receive Power (dBm)</td><td>&plusmn;3 dBm from link budget</td>', '<td>Transmit Frequency (kHz)</td><td>Depend on ET</td>', '<td>Receive Frequency (kHz)</td><td>Depend on ET</td>', '<td>PRx Interference (dBm) /<br />Far-end Tx-Off</td><td></td>');
for($i = 0; $i < 5; $i++){
	$dt_subchapter_7_1 = explode('|', $arr_subchapter_7_1[$i]->content);
	echo '<tr>'.$arr_dt_71[$i];
	echo '<td align="center">'.$this->ifunction->ifnull($dt_subchapter_7_1[3]).'</td>';
	echo '<td align="center">'.$this->ifunction->ifnull($dt_subchapter_7_1[4]).'</td>';
	echo '<td align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_7_1[5]=='OK') echo '_checked'; echo '.jpg"> OK <img src="'.base_url().'static/i/radio'; if($dt_subchapter_7_1[5]=='Not OK') echo '_checked'; echo '.jpg"> NOK <img src="'.base_url().'static/i/radio'; if($dt_subchapter_7_1[5]=='N/A') echo '_checked'; echo '.jpg">NA</td>';
	echo '</tr>';
}
?>
<tr>
    <td>Switching 1+1*</td><td>Working Normally</td>
    <td align="center"><?php echo '<img src="'.base_url().'static/i/radio'; if($dt_subchapter_7_1a[3]=='OK') echo '_checked'; echo '.jpg">' ?> OK <?php echo '<img src="'.base_url().'static/i/radio'; if($dt_subchapter_7_1a[3]=='Not OK') echo '_checked'; echo '.jpg">' ?> NOK <?php echo '<img src="'.base_url().'static/i/radio'; if($dt_subchapter_7_1a[3]=='N/A') echo '_checked'; echo '.jpg">' ?>NA<br />
    <?php echo '<img src="'.base_url().'static/i/radio'; if($dt_subchapter_7_1a[3]=='OK') echo '_checked'; echo '.jpg">' ?> OK <?php echo '<img src="'.base_url().'static/i/radio'; if($dt_subchapter_7_1a[3]=='Not OK') echo '_checked'; echo '.jpg">' ?> NOK <?php echo '<img src="'.base_url().'static/i/radio'; if($dt_subchapter_7_1a[3]=='N/A') echo '_checked'; echo '.jpg">' ?>NA</td>
    <td align="center"><?php echo '<img src="'.base_url().'static/i/radio'; if($dt_subchapter_7_1a[4]=='OK') echo '_checked'; echo '.jpg">' ?> OK <?php echo '<img src="'.base_url().'static/i/radio'; if($dt_subchapter_7_1a[4]=='Not OK') echo '_checked'; echo '.jpg">' ?> NOK <?php echo '<img src="'.base_url().'static/i/radio'; if($dt_subchapter_7_1a[4]=='N/A') echo '_checked'; echo '.jpg">' ?>NA<br />
    <?php echo '<img src="'.base_url().'static/i/radio'; if($dt_subchapter_7_1a[4]=='OK') echo '_checked'; echo '.jpg">' ?> OK <?php echo '<img src="'.base_url().'static/i/radio'; if($dt_subchapter_7_1a[4]=='Not OK') echo '_checked'; echo '.jpg">' ?> NOK <?php echo '<img src="'.base_url().'static/i/radio'; if($dt_subchapter_7_1a[4]=='N/A') echo '_checked'; echo '.jpg">' ?>NA</td>
    <td>Hardware<br />Software</td>
</tr>
<tr>
    <td>Fan (FAU) Alarm Test</td><td>Working Normally</td>
    <td colspan="2" align="center"><?php echo '<img src="'.base_url().'static/i/radio'; if($dt_subchapter_7_1b[3]=='OK') echo '_checked'; echo '.jpg">' ?> OK <?php echo '<img src="'.base_url().'static/i/radio'; if($dt_subchapter_7_1b[3]=='Not OK') echo '_checked'; echo '.jpg">' ?> NOK <?php echo '<img src="'.base_url().'static/i/radio'; if($dt_subchapter_7_1b[3]=='N/A') echo '_checked'; echo '.jpg">' ?>NA</td>
    <td>Hardware</td>
</tr>
<tr>
    <td>Threshold (dBm)</td><td>- 70 dBm</td>
    <td colspan="2" align="center"><?php echo '<img src="'.base_url().'static/i/radio'; if($dt_subchapter_7_1c[3]=='OK') echo '_checked'; echo '.jpg">' ?> OK <?php echo '<img src="'.base_url().'static/i/radio'; if($dt_subchapter_7_1c[3]=='Not OK') echo '_checked'; echo '.jpg">' ?> NOK <?php echo '<img src="'.base_url().'static/i/radio'; if($dt_subchapter_7_1c[3]=='N/A') echo '_checked'; echo '.jpg">' ?>NA</td>
    <td>Software</td>
</tr>
</table>
<br />

<p align="left"><i>Working normally: can switch successfully, a few down time will be accepted.<br />Threshold: match ZTE equipment standard. </i></p>

<?php $Qsubchapter = $this->db->query("SELECT `subno_chapter`, `content` FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `chapter`='8' AND `no_chapter`='8.1' ORDER BY `subno_chapter_order` ASC"); foreach($Qsubchapter->result_object() as $subchapter) $arr_subchapter_8_1[$subchapter->subno_chapter -1]=$subchapter ?>

<h3>8. Ethernet Performance</h3>
Measurement will be check to meet transport 20 Mbps or 31 Mbps<br /><br />
<table class="border" cellpadding="0" cellspacing="0">
<tr class="header">
    <td>ITEM TO BE CHECKED</td>
    <td>MEASUREMENT</td>
    <td colspan="3">STATUS</td>
    <td>Remark</td>
</tr>
<?php
$arr_dt_81a = array('Troughput<br />(Capacity: _______ Mbps)', 'Delay', 'Jitter');
$arr_dt_81b = array('', 'Max at Real-Time traffic: 30 ms', 'Max at Real-Time traffic: 10 ms');
for($i = 0; $i < 3; $i++){
	$dt_subchapter_8_1 = explode('|', $arr_subchapter_8_1[$i]->content);
	echo '<tr><td>'.$arr_dt_81a[$i].'</td>';
	echo '<td>'.$this->ifunction->ifnull($dt_subchapter_8_1[4]).'</td>';
	echo '<td><img src="'.base_url().'static/i/radio'; if($dt_subchapter_8_1[3]=='OK') echo '_checked'; echo '.jpg"> OK</td>';
	echo '<td><img src="'.base_url().'static/i/radio'; if($dt_subchapter_8_1[3]=='Not OK') echo '_checked'; echo '.jpg"> NOK</td>';
	echo '<td><img src="'.base_url().'static/i/radio'; if($dt_subchapter_8_1[3]=='N/A') echo '_checked'; echo '.jpg"> NA</td>';
	if($i) echo '<td>'.$arr_dt_81b[$i].'</td>'; else echo '<td>'.$this->ifunction->ifnull($dt_subchapter_8_1[5]).'</td>';
	echo '</tr>';
}
?>
</table>
<br />

<hr />

<?php
$Qsubchapter = $this->db->query("SELECT `subno_chapter`, `content` FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `chapter`='8' AND `no_chapter`='8.3.1' ORDER BY `subno_chapter_order` ASC"); foreach($Qsubchapter->result_object() as $subchapter) $arr_subchapter_8_31[]=$subchapter;

$Qsubchapter = $this->db->query("SELECT `subno_chapter`, `content` FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `chapter`='8' AND `no_chapter`='8.3.2' ORDER BY `subno_chapter_order` ASC"); foreach($Qsubchapter->result_object() as $subchapter) $arr_subchapter_8_32[]=$subchapter;

$Qsubchapter = $this->db->query("SELECT `subno_chapter`, `content` FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `chapter`='8' AND `no_chapter`='8.3.3' ORDER BY `subno_chapter_order` ASC"); foreach($Qsubchapter->result_object() as $subchapter) $arr_subchapter_8_33[]=$subchapter;

$Qsubchapter = $this->db->query("SELECT `subno_chapter`, `content` FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `chapter`='8' AND `no_chapter`='8.3.4' ORDER BY `subno_chapter_order` ASC"); foreach($Qsubchapter->result_object() as $subchapter) $arr_subchapter_8_34[]=$subchapter;

$Qsubchapter = $this->db->query("SELECT `subno_chapter`, `content` FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `chapter`='8' AND `no_chapter`='8.3.5' ORDER BY `subno_chapter_order` ASC"); foreach($Qsubchapter->result_object() as $subchapter) $arr_subchapter_8_35[]=$subchapter;

$Qsubchapter = $this->db->query("SELECT `subno_chapter`, `content` FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `chapter`='8' AND `no_chapter`='8.3.6' ORDER BY `subno_chapter_order` ASC"); foreach($Qsubchapter->result_object() as $subchapter) $arr_subchapter_8_36[]=$subchapter;

$Qsubchapter = $this->db->query("SELECT `subno_chapter`, `content` FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `chapter`='8' AND `no_chapter`='8.3.7' ORDER BY `subno_chapter_order` ASC"); foreach($Qsubchapter->result_object() as $subchapter) $arr_subchapter_8_37[]=$subchapter;

$Qsubchapter = $this->db->query("SELECT `subno_chapter`, `content` FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `chapter`='8' AND `no_chapter`='8.3' ORDER BY `subno_chapter_order` ASC"); foreach($Qsubchapter->result_object() as $parChapter) $arr_subchapter_8_3[] = $parChapter;

$par_chapter_1 = explode('|', $arr_subchapter_8_3[0]->content);
$par_chapter_2 = explode('|', $arr_subchapter_8_3[1]->content);
$par_chapter_3 = explode('|', $arr_subchapter_8_3[2]->content);
$par_chapter_4 = explode('|', $arr_subchapter_8_3[3]->content);
$par_chapter_5 = explode('|', $arr_subchapter_8_3[4]->content);
$par_chapter_6 = explode('|', $arr_subchapter_8_3[5]->content);
$par_chapter_7 = explode('|', $arr_subchapter_8_3[6]->content);
 ?>

<b>QOS test</b><br /><br />

<table class="border" cellpadding="0" cellspacing="0">
  <tr class="header">
    <td width="40" align="center">No. </td>
    <td align="center">Description</td>
    <td align="center">Throughput (Mbps)</td>
    <td align="center">Expected Test Result<br />(Packet Loss %)</td>
    <td align="center" width="30">OK</td>
    <td align="center" width="40">NOK</td>
  </tr>
  <tr>
    <td width="40" align="center">1</td>
    <td>Perform test with the following load
    <?php
	for($i = 0; $i < 7; $i++){
		$dt_subchapter_8_31 = explode('|', $arr_subchapter_8_31[$i]->content);
		echo '<br />PBit '.$i.': '.$this->ifunction->ifnull($dt_subchapter_8_31[3]).' Mbps (14,28% of BW)';
	}
	?>
    </td>
    <td>
    <br />
    <?php
	for($i = 0; $i < 7; $i++){
		$dt_subchapter_8_31 = explode('|', $arr_subchapter_8_31[$i]->content);
		echo '<br />PBit '.$i.': '.$this->ifunction->ifnull($dt_subchapter_8_31[4]).' Mbps';
	}
	?>
    <td><br /><?php for($i = 0; $i < 7; $i++) echo '<br />PBit '.$i.': 0 %' ?></td>
    <td align="center"><?php echo '<img src="'.base_url().'static/i/radio'; if($par_chapter_1[3]=='OK') echo '_checked'; echo '.jpg">' ?></td>
    <td align="center"><?php echo '<img src="'.base_url().'static/i/radio'; if($par_chapter_1[3]=='Not OK') echo '_checked'; echo '.jpg">' ?></td>
  </tr>
  <tr>
    <td width="40" align="center">2</td>
    <td>Perform test with the following load
    <?php
	$arr_dt_832 = array('10', '14,28', '14,28', '14,28', '14,28', '14,28', '25');
	for($i = 0; $i < 7; $i++){
		$dt_subchapter_8_32 = explode('|', $arr_subchapter_8_32[$i]->content);
		echo '<br />PBit '.$i.': '.$this->ifunction->ifnull($dt_subchapter_8_32[3]).' Mbps ('.$arr_dt_832[$i].'% of BW)';
	}
	?>
    </td>
    <td>
    <br />
    <?php
	for($i = 0; $i < 7; $i++){
		$dt_subchapter_8_32 = explode('|', $arr_subchapter_8_32[$i]->content);
		echo '<br />PBit '.$i.': '.$this->ifunction->ifnull($dt_subchapter_8_32[4]).' Mbps';
	}
	?>
    </td>
    <td>
    <br />
	<?php
    for($i = 0; $i < 7; $i++){
		if($i) echo '<br />PBit '.$i.': 0 %'; else echo '<br />PBit '.$i.': Max 100 %';
	}
	?>
    </td>
    <td align="center"><?php echo '<img src="'.base_url().'static/i/radio'; if($par_chapter_2[3]=='OK') echo '_checked'; echo '.jpg">' ?></td>
    <td align="center"><?php echo '<img src="'.base_url().'static/i/radio'; if($par_chapter_2[3]=='Not OK') echo '_checked'; echo '.jpg">' ?></td>
  </tr>
  <tr>
    <td width="40" align="center">3</td>
    <td>Perform test with the following load
    <?php
	$arr_dt_833 = array('10', '10', '14,28', '14,28', '14,28', '25', '25');
	for($i = 0; $i < 7; $i++){
		$dt_subchapter_8_33 = explode('|', $arr_subchapter_8_33[$i]->content);
		echo '<br />PBit '.$i.': '.$this->ifunction->ifnull($dt_subchapter_8_33[3]).' Mbps ('.$arr_dt_833[$i].'% of BW)';
	}
	?>
    </td>
    <td>
    <br />
    <?php
	for($i = 0; $i < 7; $i++){
		$dt_subchapter_8_33 = explode('|', $arr_subchapter_8_33[$i]->content);
		echo '<br />PBit '.$i.': '.$this->ifunction->ifnull($dt_subchapter_8_33[4]).' Mbps';
	}
	?>
    </td>
    <td>
    <br />
	<?php
    for($i = 0; $i < 7; $i++){
		if($i < 2) echo '<br />PBit '.$i.': Max 100 %'; else echo '<br />PBit '.$i.': 0 %';
	}
	?>
    </td>
    <td align="center"><?php echo '<img src="'.base_url().'static/i/radio'; if($par_chapter_3[3]=='OK') echo '_checked'; echo '.jpg">' ?></td>
    <td align="center"><?php echo '<img src="'.base_url().'static/i/radio'; if($par_chapter_3[3]=='Not OK') echo '_checked'; echo '.jpg">' ?></td>
  </tr>
  <tr>
    <td width="40" align="center">4</td>
    <td>Perform test with the following load
    <?php
	$arr_dt_834 = array('10', '10', '10', '14,28', '25', '25', '25');
	for($i = 0; $i < 7; $i++){
		$dt_subchapter_8_34 = explode('|', $arr_subchapter_8_34[$i]->content);
		echo '<br />PBit '.$i.': '.$this->ifunction->ifnull($dt_subchapter_8_34[3]).' Mbps ('.$arr_dt_834[$i].'% of BW)';
	}
	?>
    </td>
    <td>
    <br />
    <?php
	for($i = 0; $i < 7; $i++){
		$dt_subchapter_8_34 = explode('|', $arr_subchapter_8_34[$i]->content);
		echo '<br />PBit '.$i.': '.$this->ifunction->ifnull($dt_subchapter_8_34[4]).' Mbps';
	}
	?>
    </td>
    <td>
    <br />
	<?php
    for($i = 0; $i < 7; $i++){
		if($i < 3) echo '<br />PBit '.$i.': Max 100 %'; else echo '<br />PBit '.$i.': 0 %';
	}
	?>
    </td>
    <td align="center"><?php echo '<img src="'.base_url().'static/i/radio'; if($par_chapter_4[3]=='OK') echo '_checked'; echo '.jpg">' ?></td>
    <td align="center"><?php echo '<img src="'.base_url().'static/i/radio'; if($par_chapter_4[3]=='Not OK') echo '_checked'; echo '.jpg">' ?></td>
  </tr>
  </table>
  
<hr />

<table class="border" cellpadding="0" cellspacing="0">
  <tr>
    <td width="40" align="center">5</td>
    <td>Perform test with the following load
    <?php
	$arr_dt_835 = array('10', '10', '10', '10', '25', '25', '50');
	for($i = 0; $i < 7; $i++){
		$dt_subchapter_8_35 = explode('|', $arr_subchapter_8_35[$i]->content);
		echo '<br />PBit '.$i.': '.$this->ifunction->ifnull($dt_subchapter_8_35[3]).' Mbps ('.$arr_dt_835[$i].'% of BW)';
	}
	?>
    </td>
    <td>
    <br />
    <?php
	for($i = 0; $i < 7; $i++){
		$dt_subchapter_8_35 = explode('|', $arr_subchapter_8_35[$i]->content);
		echo '<br />PBit '.$i.': '.$this->ifunction->ifnull($dt_subchapter_8_35[4]).' Mbps';
	}
	?>
    </td>
    <td width="126">
    <br />
	<?php
    for($i = 0; $i < 7; $i++){
		if($i < 4) echo '<br />PBit '.$i.': Max 100 %'; else echo '<br />PBit '.$i.': 0 %';
	}
	?>
    </td>
    <td align="center" width="30"><?php echo '<img src="'.base_url().'static/i/radio'; if($par_chapter_5[3]=='OK') echo '_checked'; echo '.jpg">' ?></td>
    <td align="center" width="40"><?php echo '<img src="'.base_url().'static/i/radio'; if($par_chapter_5[3]=='Not OK') echo '_checked'; echo '.jpg">' ?></td>
  </tr>
  <tr>
    <td width="40" align="center">6</td>
    <td>Perform test with the following load
    <?php
	$arr_dt_836 = array('10', '10', '10', '10', '10', '50', '50');
	for($i = 0; $i < 7; $i++){
		$dt_subchapter_8_36 = explode('|', $arr_subchapter_8_36[$i]->content);
		echo '<br />PBit '.$i.': '.$this->ifunction->ifnull($dt_subchapter_8_36[3]).' Mbps ('.$arr_dt_836[$i].'% of BW)';
	}
	?>
    </td>
    <td>
    <br />
    <?php
	for($i = 0; $i < 7; $i++){
		$dt_subchapter_8_36 = explode('|', $arr_subchapter_8_36[$i]->content);
		echo '<br />PBit '.$i.': '.$this->ifunction->ifnull($dt_subchapter_8_36[4]).' Mbps';
	}
	?>
    </td>
    <td width="126">
    <br />
	<?php
    for($i = 0; $i < 7; $i++){
		if($i < 5) echo '<br />PBit '.$i.': Max 100 %'; else echo '<br />PBit '.$i.': 0 %';
	}
	?>
    </td>
    <td align="center"><?php echo '<img src="'.base_url().'static/i/radio'; if($par_chapter_6[3]=='OK') echo '_checked'; echo '.jpg">' ?></td>
    <td align="center"><?php echo '<img src="'.base_url().'static/i/radio'; if($par_chapter_6[3]=='Not OK') echo '_checked'; echo '.jpg">' ?></td>
  </tr>
  <tr>
    <td width="40" align="center">7</td>
    <td>Perform test with the following load
    <?php
	$arr_dt_837 = array('10', '10', '10', '10', '10', '10', '100');
	for($i = 0; $i < 7; $i++){
		$dt_subchapter_8_37 = explode('|', $arr_subchapter_8_37[$i]->content);
		echo '<br />PBit '.$i.': '.$this->ifunction->ifnull($dt_subchapter_8_37[3]).' Mbps ('.$arr_dt_837[$i].'% of BW)';
	}
	?>
    </td>
    <td>
    <br />
    <?php
	for($i = 0; $i < 7; $i++){
		$dt_subchapter_8_37 = explode('|', $arr_subchapter_8_37[$i]->content);
		echo '<br />PBit '.$i.': '.$this->ifunction->ifnull($dt_subchapter_8_37[4]).' Mbps';
	}
	?>
    </td>
    <td width="126">
    <br />
	<?php
    for($i = 0; $i < 7; $i++){
		if($i == 6) echo '<br />PBit '.$i.': 0 %'; else echo '<br />PBit '.$i.': Max 100 %';
	}
	?>
    </td>
    <td align="center"><?php echo '<img src="'.base_url().'static/i/radio'; if($par_chapter_7[3]=='OK') echo '_checked'; echo '.jpg">' ?></td>
    <td align="center"><?php echo '<img src="'.base_url().'static/i/radio'; if($par_chapter_7[3]=='Not OK') echo '_checked'; echo '.jpg">' ?></td>
  </tr>
</table>
<br />


<?php $Qchapter = $this->db->query("SELECT `subno_chapter`, `content` FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `chapter`='9' AND `no_chapter`='9.1' ORDER BY `subno_chapter_order` ASC");
foreach($Qchapter->result_object() as $chapter) $arr_chapter_9_[str_replace('xXx.', '', $chapter->no_chapter) -1]=$chapter;
$arr_chapter_9 = explode('|', $arr_chapter_9_[0]->content);
?>

<h3>9. Alarm Check</h3>
<table class="border" cellpadding="0" cellspacing="0">
  <tr>
    <td class="header">Clear Alarm</td>
    <td width="197" align="center"><?php echo '<img src="'.base_url().'static/i/radio'; if($arr_chapter_9[3]=='OK') echo '_checked'; echo '.jpg">' ?><font color="#FFF">.</font>OK <?php echo '<img src="'.base_url().'static/i/radio'; if($arr_chapter_9[3]=='Not OK') echo '_checked'; echo '.jpg">' ?><font color="#FFF">.</font>NOK </td>
    <td><?php echo $this->ifunction->ifnull($arr_chapter_9[4]) ?></td>
  </tr>
</table>
<br />


<?php $Qchapter = $this->db->query("SELECT `no_chapter`, `content` FROM `it_atp_chapter` WHERE `atp_id`='$dx' AND `chapter`='10' ORDER BY `atp_chapter_id` ASC");
foreach($Qchapter->result_object() as $chapter) $arr_chapter_10[str_replace('10.', '', $chapter->no_chapter) -1]=$chapter ?>

<h3>10. Quality Test</h3>
<table class="border" cellpadding="0" cellspacing="0">
  <tr class="header">
    <td align="center">ITEM TEST</td>
    <td align="center">SPECIFICATION</td>
    <td align="center">MEASUREMENT</td>
    <td align="center" width="100">RESULT</td>
  </tr>
  <tr>
    <td>BER *)</td>
    <td>No Error for 24 hours (Cascade)</td>
    <td align="center">Please attach the print out</td>
    <td align="center"><?php echo '<img src="'.base_url().'static/i/radio'; if($arr_chapter_10[0]->content=='OK') echo '_checked'; echo '.jpg">' ?>OK <?php echo '<img src="'.base_url().'static/i/radio'; if($arr_chapter_10[0]->content=='Not OK') echo '_checked'; echo '.jpg">' ?>NOK <?php echo '<img src="'.base_url().'static/i/radio'; if($arr_chapter_10[0]->content=='N/A') echo '_checked'; echo '.jpg">' ?>N/A</td>
  </tr>
</table>
<br />

<hr />

<?php $Qchapter = $this->db->query("SELECT `subno_chapter`, `content` FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `chapter`='11' AND `no_chapter`='11.1' ORDER BY `subno_chapter_order` ASC");
foreach($Qchapter->result_object() as $chapter) $arr_chapter_11[str_replace('xXx.', '', $chapter->no_chapter) -1]=$chapter; 
$dt_chapter_11a = explode('|', $arr_chapter_11[0]->content);
?>

<h3>11. Environment Check</h3>
<table class="border" cellpadding="0" cellspacing="0">
  <tr>
    <td class="header">Clean Up Shelter Environment Check (Ex Material)</td>
    <td><?php echo '<img src="'.base_url().'static/i/radio'; if($dt_chapter_11a[3]=='CLEAN') echo '_checked'; echo '.jpg">' ?>CLEAN <?php echo '<img src="'.base_url().'static/i/radio'; if($dt_chapter_11a[3]=='DIRTY') echo '_checked'; echo '.jpg">' ?>DIRTY</td>
    <td width="192"><?php echo $this->ifunction->ifnull($dt_chapter_11a[4]) ?></td>
  </tr>
</table>
<br />

<?php $Qsubchapter = $this->db->query("SELECT `subno_chapter`, `content` FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `chapter`='12' AND `no_chapter`='12.0' ORDER BY `subno_chapter_order` ASC");
foreach($Qsubchapter->result_object() as $subchapter) $arr_subchapter_12_0[]=$subchapter;
$dt_subchapter_12_0a = explode('|', $arr_subchapter_12_0[0]->content);
$dt_subchapter_12_0b = explode('|', $arr_subchapter_12_0[1]->content);
$dt_subchapter_12_0c = explode('|', $arr_subchapter_12_0[2]->content);
$dt_subchapter_12_0d = explode('|', $arr_subchapter_12_0[3]->content);
$dt_subchapter_12_0e = explode('|', $arr_subchapter_12_0[4]->content);
$dt_subchapter_12_0f = explode('|', $arr_subchapter_12_0[5]->content);
$dt_subchapter_12_0g = explode('|', $arr_subchapter_12_0[6]->content);
$dt_subchapter_12_0h = explode('|', $arr_subchapter_12_0[7]->content) ?>

<h3>12. Traffic Class Value</h3>
<table class="border" cellpadding="0" cellspacing="0">
  <tr class="header">
    <td>ITEM TEST</td>
    <td align="center">Min (Kbit/s)</td>
    <td align="center">Max (Kbit/s)</td>
    <td align="center">Avg (Kbit/s)</td>
  </tr>
  <tr>
    <td>Traffic Class 0</td>   
    <td><?php echo $this->ifunction->ifnull($dt_subchapter_12_0a[3]) ?></td>
    <td><?php echo $this->ifunction->ifnull($dt_subchapter_12_0a[4]) ?></td>
    <td><?php echo $this->ifunction->ifnull($dt_subchapter_12_0a[5]) ?></td>
  </tr>
  <tr>
    <td>Traffic Class 1</td>
    <td><?php echo $this->ifunction->ifnull($dt_subchapter_12_0b[3]) ?></td>
    <td><?php echo $this->ifunction->ifnull($dt_subchapter_12_0b[4]) ?></td>
    <td><?php echo $this->ifunction->ifnull($dt_subchapter_12_0b[5]) ?></td>
  </tr>
  <tr>
    <td>Traffic Class 2</td>
    <td><?php echo $this->ifunction->ifnull($dt_subchapter_12_0c[3]) ?></td>
    <td><?php echo $this->ifunction->ifnull($dt_subchapter_12_0c[4]) ?></td>
    <td><?php echo $this->ifunction->ifnull($dt_subchapter_12_0c[5]) ?></td>
  </tr>
  <tr>
    <td>Traffic Class 3</td>
    <td><?php echo $this->ifunction->ifnull($dt_subchapter_12_0d[3]) ?></td>
    <td><?php echo $this->ifunction->ifnull($dt_subchapter_12_0d[4]) ?></td>
    <td><?php echo $this->ifunction->ifnull($dt_subchapter_12_0d[5]) ?></td>
  </tr>
  <tr>
    <td>Traffic Class 4</td>
    <td><?php echo $this->ifunction->ifnull($dt_subchapter_12_0e[3]) ?></td>
    <td><?php echo $this->ifunction->ifnull($dt_subchapter_12_0e[4]) ?></td>
    <td><?php echo $this->ifunction->ifnull($dt_subchapter_12_0e[5]) ?></td>
  </tr>
  <tr>
    <td>Traffic Class 5</td>
    <td><?php echo $this->ifunction->ifnull($dt_subchapter_12_0f[3]) ?></td>
    <td><?php echo $this->ifunction->ifnull($dt_subchapter_12_0f[4]) ?></td>
    <td><?php echo $this->ifunction->ifnull($dt_subchapter_12_0f[5]) ?></td>
  </tr>
  <tr>
    <td>Traffic Class 6</td>
    <td><?php echo $this->ifunction->ifnull($dt_subchapter_12_0g[3]) ?></td>
    <td><?php echo $this->ifunction->ifnull($dt_subchapter_12_0g[4]) ?></td>
    <td><?php echo $this->ifunction->ifnull($dt_subchapter_12_0g[5]) ?></td>
  </tr>
  <tr>
    <td>Traffic Class 7</td>
    <td><?php echo $this->ifunction->ifnull($dt_subchapter_12_0h[3]) ?></td>
    <td><?php echo $this->ifunction->ifnull($dt_subchapter_12_0h[4]) ?></td>
    <td><?php echo $this->ifunction->ifnull($dt_subchapter_12_0h[5]) ?></td>
  </tr>
</table>
<br />


<?php $Qsubchapter = $this->db->query("SELECT `subno_chapter`, `content` FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `chapter`='12' AND `no_chapter`='12.1' ORDER BY `subno_chapter_order` ASC");
foreach($Qsubchapter->result_object() as $subchapter) $arr_subchapter_12_1[]=$subchapter;
$dt_subchapter_12_1a = explode('|', $arr_subchapter_12_1[0]->content);
$dt_subchapter_12_1b = explode('|', $arr_subchapter_12_1[1]->content);
$dt_subchapter_12_1c = explode('|', $arr_subchapter_12_1[2]->content);
$dt_subchapter_12_1d = explode('|', $arr_subchapter_12_1[3]->content);
$dt_subchapter_12_1e = explode('|', $arr_subchapter_12_1[4]->content);
$dt_subchapter_12_1f = explode('|', $arr_subchapter_12_1[5]->content);
$dt_subchapter_12_1g = explode('|', $arr_subchapter_12_1[6]->content);
$dt_subchapter_12_1h = explode('|', $arr_subchapter_12_1[7]->content) ?>

<h3>12. Attachment Checking</h3>
<table class="border" cellpadding="0" cellspacing="0">
  <tr class="header">
    <td>ITEM TO BE ATTACHED</td>
    <td colspan="3" align="center">STATUS</td>
    <td align="center">Page Number</td>
    <td align="center">Total Pages</td>
  </tr>
  <tr>
    <td>Bill Of Quantity (BOQ) as Equipment Inv.</td>
    <td><?php echo '<img src="'.base_url().'static/i/radio'; if($dt_subchapter_12_1a[3]=='OK') echo '_checked'; echo '.jpg">' ?>OK</td>
    <td><?php echo '<img src="'.base_url().'static/i/radio'; if($dt_subchapter_12_1a[3]=='Not OK') echo '_checked'; echo '.jpg">' ?>NOK</td>
    <td><?php echo '<img src="'.base_url().'static/i/radio'; if($dt_subchapter_12_1a[3]=='N/A') echo '_checked'; echo '.jpg">' ?>NA</td>
    <td><?php echo $this->ifunction->ifnull($dt_subchapter_12_1a[4]) ?></td>
    <td><?php echo $this->ifunction->ifnull($dt_subchapter_12_1a[5]) ?></td>
  </tr>
  <tr>
    <td>Save Report and configuration </td>
    <td><?php echo '<img src="'.base_url().'static/i/radio'; if($dt_subchapter_12_1b[3]=='OK') echo '_checked'; echo '.jpg">' ?>OK</td>
    <td><?php echo '<img src="'.base_url().'static/i/radio'; if($dt_subchapter_12_1b[3]=='Not OK') echo '_checked'; echo '.jpg">' ?>NOK</td>
    <td><?php echo '<img src="'.base_url().'static/i/radio'; if($dt_subchapter_12_1b[3]=='N/A') echo '_checked'; echo '.jpg">' ?>NA</td>
    <td width="217" colspan="2" align="center">Attachment in Softcopy</td>
  </tr>
  <tr>
    <td>Module Inventory capture **)</td>
    <td><?php echo '<img src="'.base_url().'static/i/radio'; if($dt_subchapter_12_1c[3]=='OK') echo '_checked'; echo '.jpg">' ?>OK</td>
    <td><?php echo '<img src="'.base_url().'static/i/radio'; if($dt_subchapter_12_1c[3]=='Not OK') echo '_checked'; echo '.jpg">' ?>NOK</td>
    <td><?php echo '<img src="'.base_url().'static/i/radio'; if($dt_subchapter_12_1c[3]=='N/A') echo '_checked'; echo '.jpg">' ?>NA</td>
    <td width="217" colspan="2"><?php echo $this->ifunction->ifnull($dt_subchapter_12_1c[4]) ?></td>
  </tr>
  <tr>
    <td>Link Calculation (Link Budget) </td>
    <td><?php echo '<img src="'.base_url().'static/i/radio'; if($dt_subchapter_12_1d[3]=='OK') echo '_checked'; echo '.jpg">' ?>OK</td>
    <td><?php echo '<img src="'.base_url().'static/i/radio'; if($dt_subchapter_12_1d[3]=='Not OK') echo '_checked'; echo '.jpg">' ?>NOK</td>
    <td><?php echo '<img src="'.base_url().'static/i/radio'; if($dt_subchapter_12_1d[3]=='N/A') echo '_checked'; echo '.jpg">' ?>NA</td>
    <td><?php echo $this->ifunction->ifnull($dt_subchapter_12_1d[4]) ?></td>
    <td><?php echo $this->ifunction->ifnull($dt_subchapter_12_1d[5]) ?></td>
  </tr>
  <tr>
    <td>BER Test Result *) </td>
    <td><?php echo '<img src="'.base_url().'static/i/radio'; if($dt_subchapter_12_1e[3]=='OK') echo '_checked'; echo '.jpg">' ?>OK</td>
    <td><?php echo '<img src="'.base_url().'static/i/radio'; if($dt_subchapter_12_1e[3]=='Not OK') echo '_checked'; echo '.jpg">' ?>NOK</td>
    <td><?php echo '<img src="'.base_url().'static/i/radio'; if($dt_subchapter_12_1e[3]=='N/A') echo '_checked'; echo '.jpg">' ?>NA</td>
    <td width="217" colspan="2"><?php echo $this->ifunction->ifnull($dt_subchapter_12_1e[4]) ?></td>
  </tr>
  <tr>
    <td>Engineering Table</td>
    <td><?php echo '<img src="'.base_url().'static/i/radio'; if($dt_subchapter_12_1f[3]=='OK') echo '_checked'; echo '.jpg">' ?>OK</td>
    <td><?php echo '<img src="'.base_url().'static/i/radio'; if($dt_subchapter_12_1f[3]=='Not OK') echo '_checked'; echo '.jpg">' ?>NOK</td>
    <td><?php echo '<img src="'.base_url().'static/i/radio'; if($dt_subchapter_12_1f[3]=='N/A') echo '_checked'; echo '.jpg">' ?>NA</td>
    <td><?php echo $this->ifunction->ifnull($dt_subchapter_12_1f[4]) ?></td>
    <td><?php echo $this->ifunction->ifnull($dt_subchapter_12_1f[5]) ?></td>
  </tr>
  <tr>
    <td>Installation Check</td>
    <td><?php echo '<img src="'.base_url().'static/i/radio'; if($dt_subchapter_12_1g[3]=='OK') echo '_checked'; echo '.jpg">' ?>OK</td>
    <td><?php echo '<img src="'.base_url().'static/i/radio'; if($dt_subchapter_12_1g[3]=='Not OK') echo '_checked'; echo '.jpg">' ?>NOK</td>
    <td><?php echo '<img src="'.base_url().'static/i/radio'; if($dt_subchapter_12_1g[3]=='N/A') echo '_checked'; echo '.jpg">' ?>NA</td>
    <td><?php echo $this->ifunction->ifnull($dt_subchapter_12_1g[4]) ?></td>
    <td><?php echo $this->ifunction->ifnull($dt_subchapter_12_1g[5]) ?></td>
  </tr>
  <tr>
    <td>Scan Frequency***)</td>
    <td><?php echo '<img src="'.base_url().'static/i/radio'; if($dt_subchapter_12_1h[3]=='OK') echo '_checked'; echo '.jpg">' ?>OK</td>
    <td><?php echo '<img src="'.base_url().'static/i/radio'; if($dt_subchapter_12_1h[3]=='Not OK') echo '_checked'; echo '.jpg">' ?>NOK</td>
    <td><?php echo '<img src="'.base_url().'static/i/radio'; if($dt_subchapter_12_1h[3]=='N/A') echo '_checked'; echo '.jpg">' ?>NA</td>
    <td width="217" colspan="2"><?php echo $this->ifunction->ifnull($dt_subchapter_12_1h[4]) ?></td>
  </tr>
</table>
<br />

<p align="left"><i>
*) BER Test Result to be printed, measurement at available End to End E1  <br />
**) Capture Module Inventory only. To be print-out <br />
***) Print out of scan frequency result per 1MHz of the bandwidth: <br />
         i.e for Capacity 75E1 / 154Mbps 128 QAM  ->  &plusmn;14 MHz;  35xE1 / 72 Mbps 128 QAM -> &plusmn;7 MHz <br />

<br /><br /><br />

Note :  <br />
ATP will accept if no pending item
</i></p>