<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed') ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xml:lang="en" xmlns="http://www.w3.org/1999/xhtml" lang="en">
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
<title>ATP - ZTE Microwave</title>
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

<center><img src="<?php echo base_url() ?>static/i/pdf_zte_microwave.jpg" /></center><br /><br />

<h2 align="center">ACCEPTANCE TEST RESULT<br />MICROWAVE EQUIPMENTS</h2></p><br /><br />

<table width="100%">
<tr>
	<td width="100">Vendor</td><td width="10">:</td>
	<td><?php echo $this->ifunction->ifnull($ei[0]->microwave_vendor) ?></td>
    <td width="100">Model</td><td width="10">:</td>
    <td><?php echo $this->ifunction->ifnull($ei[0]->microwave_model) ?></td>
</tr>
<tr>
	<td>Configuration</td><td width="10">:</td>
	<td><?php echo $this->ifunction->ifnull($ei[0]->microwave_configuration) ?></td>
    <td>SW Version</td><td width="10">:</td>
    <td><?php echo $this->ifunction->ifnull($ei[0]->microwave_version) ?></td>
</tr>
<tr>
	<td>Station</td><td width="10">:</td>
	<td><?php echo $this->ifunction->ifnull($ei[0]->microwave_station) ?></td>
    <td>Frequency</td><td width="10">:</td>
    <td><?php echo $this->ifunction->ifnull($ei[0]->microwave_frequency) ?></td>
</tr>
<tr>
	<td>Link</td><td width="10">:</td>
	<td><?php echo $this->ifunction->ifnull($ei[0]->microwave_link) ?></td>
    <td>Capacity</td><td width="10">:</td>
    <td><?php echo $this->ifunction->ifnull($ei[0]->microwave_capacity) ?> Mbps</td>
</tr>
<tr>
	<td>Date</td><td width="10">:</td>
	<td><?php echo $this->ifunction->ifnull($ei[0]->microwave_date) ?></td>
    <td>Site ID (Radio ID)</td><td width="10">:</td>
    <td><?php echo $this->ifunction->ifnull($ei[0]->microwave_site_id) ?></td>
</tr>
<tr>
	<td colspan="6">NE IP Address / Sub Net Mask : <?php echo $this->ifunction->ifnull($ei[0]->microwave_ip_address) ?></td>
</tr>
</table><br />
<br />
<table width="100%">
<tr>
	<td colspan="3">For PT INDOSAT</td>
    <td colspan="3">For Contractor</td>
</tr>
<tr>
	<td width="100">Print Name</td><td width="10">:</td>
	<td><?php echo $this->ifunction->ifnull($ei[0]->microwave_indosat_name) ?></td>
    <td width="100">Print Name</td><td width="10">:</td>
    <td><?php echo $this->ifunction->ifnull($ei[0]->microwave_contractor_name) ?></td>
</tr>
<tr>
	<td>NIK</td><td width="10">:</td>
	<td><?php echo $this->ifunction->ifnull($ei[0]->microwave_indosat_nik) ?></td>
    <td>ID</td><td width="10">:</td>
    <td><?php echo $this->ifunction->ifnull($ei[0]->microwave_contractor_nik) ?></td>
</tr>
<tr>
	<td colspan="6"></td>
</tr>
<tr>
	<td colspan="6"></td>
</tr>
<tr>
	<td colspan="6"></td>
</tr>
<tr>
	<td>Signature</td><td width="10">:</td>
	<td>__________________</td>
    <td>Signature</td><td width="10">:</td>
    <td>__________________</td>
</tr>
</table>

<br /><br />

<table width="100%">
<tr>
	<td width="100">REMARKS</td><td width="10">:</td>
	<td></td>
</tr>
<tr>
	<td colspan="3"><?php echo $this->ifunction->ifnull($ei[0]->microwave_remark) ?></td>
</tr>
</table>

<hr />
<?php } if($cover == 1) die('</body></html>') ?>

<?php $Qchapter = $this->db->query("SELECT `no_chapter`, `content` FROM `it_atp_chapter` WHERE `atp_id`='$dx' AND `chapter`='1' ORDER BY `atp_chapter_id` ASC");
foreach($Qchapter->result_object() as $chapter) $arr_chapter_1[str_replace('1.', '', $chapter->no_chapter) -1]=$chapter ?>

<h3>1. Preliminary checks</h3>
<table class="border" cellpadding="0" cellspacing="0">
  <tr class="header">
    <td>Title work performed</td>
    <td width="30" align="center">OK</td>
    <td width="40" align="center">NOK</td>
    <td width="35" align="center">N/A</td>
  </tr>
  <tr>
    <td valign="top">Preliminary site checks<br />&bull; Site Installation Document (SID) / Binder</td>
    <td valign="top" align="center"><br /><?php echo '<img src="'.base_url().'static/i/radio'; if($arr_chapter_1[0]->content=='OK') echo '_checked'; echo '.jpg">' ?></td>
    <td valign="top" align="center"><br /><?php echo '<img src="'.base_url().'static/i/radio'; if($arr_chapter_1[0]->content=='Not OK') echo '_checked'; echo '.jpg">' ?></td>
    <td valign="top" align="center"><br /><?php echo '<img src="'.base_url().'static/i/radio'; if($arr_chapter_1[0]->content=='N/A') echo '_checked'; echo '.jpg">' ?></td>
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


<?php $Qchapter = $this->db->query("SELECT `subno_chapter`, `content` FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `chapter`='3' ORDER BY `subno_chapter_order` ASC");
foreach($Qchapter->result_object() as $chapter) $arr_chapter_3[str_replace('3.', '', $chapter->no_chapter) -1]=$chapter; 

$dt_chapter_3a = explode('|', $arr_chapter_3[0]->content);
$dt_chapter_3b = explode('|', $arr_chapter_3[1]->content);
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
    <td><?php echo $this->ifunction->ifnull($dt_chapter_3a[3]) ?></td>
    <td><?php echo $this->ifunction->ifnull($dt_chapter_3a[4]) ?></td>
  </tr>
  <tr>
    <td>Power redundancy test (if applicable)</td>
    <td align="center"><?php echo '<img src="'.base_url().'static/i/radio'; if($dt_chapter_3b[3]=='OK') echo '_checked'; echo '.jpg">' ?> OK 
      <?php echo '<img src="'.base_url().'static/i/radio'; if($dt_chapter_3b[3]=='Not OK') echo '_checked'; echo '.jpg">' ?> NOK </td>
    <td>By switch off the DC breaker at DBPDB or Rectifier. Label must be attached.</td>
  </tr>
</table>
<br />


<?php $Qchapter = $this->db->query("SELECT `subno_chapter`, `content` FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `chapter`='4' ORDER BY `subno_chapter_order` ASC");
foreach($Qchapter->result_object() as $chapter) $arr_chapter_4[str_replace('4.', '', $chapter->no_chapter) -1]=$chapter; 

$dt_chapter_4a = explode('|', $arr_chapter_4[0]->content);
$dt_chapter_4b = explode('|', $arr_chapter_4[1]->content);
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
      <?php echo '<img src="'.base_url().'static/i/radio'; if($dt_chapter_4a[3]=='OK') echo '_checked'; echo '.jpg">' ?>
      OK  / 
      <?php echo '<img src="'.base_url().'static/i/radio'; if($dt_chapter_4a[3]=='Not OK') echo '_checked'; echo '.jpg">' ?>
      NOK</td>
    <td align="center"><?php echo '<img src="'.base_url().'static/i/radio'; if($dt_chapter_4a[4]=='OK') echo '_checked'; echo '.jpg">' ?>
      OK /
      <?php echo '<img src="'.base_url().'static/i/radio'; if($dt_chapter_4a[4]=='Not OK') echo '_checked'; echo '.jpg">' ?>
      NOK /
      <?php echo '<img src="'.base_url().'static/i/radio'; if($dt_chapter_4a[4]=='N/A') echo '_checked'; echo '.jpg">' ?>
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
    <td><?php echo $this->ifunction->ifnull($dt_chapter_4b[3]) ?></td>
    <td><?php echo $this->ifunction->ifnull($dt_chapter_4b[4]) ?></td>
    <td><?php echo $this->ifunction->ifnull($dt_chapter_4b[5]) ?></td>
    <td><?php echo $this->ifunction->ifnull($dt_chapter_4b[6]) ?></td>
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
    <td bgcolor="#CCCCCC">Network Element Integration to NMS Server</td>
    <td align="center" width="100"><?php echo '<img src="'.base_url().'static/i/radio'; if($dt_chapter_5a =='OK') echo '_checked'; echo '.jpg">' ?> OK <?php echo '<img src="'.base_url().'static/i/radio'; if($dt_chapter_5a =='Not OK') echo '_checked'; echo '.jpg">' ?> NOK</td>
    <td><p align="center">NE must be connected at NMS Server based on ping to server and call 0816100537 (NMC TRM)</td>
  </tr>
  <tr>
    <td bgcolor="#CCCCCC">Name of Network Element</td>
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
    <td bgcolor="#CCCCCC">Configuration</td>
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

<?php $Qchapter = $this->db->query("SELECT `subno_chapter`, `content` FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `chapter`='7' ORDER BY `subno_chapter_order` ASC");
foreach($Qchapter->result_object() as $chapter) $arr_chapter_7[str_replace('7.', '', $chapter->no_chapter) -1]=$chapter; 

$dt_chapter_7a = explode('|', $arr_chapter_7[0]->content);
$dt_chapter_7b = explode('|', $arr_chapter_7[1]->content);
$dt_chapter_7c = explode('|', $arr_chapter_7[2]->content);
$dt_chapter_7d = explode('|', $arr_chapter_7[3]->content);
$dt_chapter_7e = explode('|', $arr_chapter_7[4]->content);
$dt_chapter_7f = explode('|', $arr_chapter_7[5]->content);
$dt_chapter_7g = explode('|', $arr_chapter_7[6]->content);
$dt_chapter_7h = explode('|', $arr_chapter_7[7]->content);
?>
<h3>7. Local Test Performance</h3>
<table class="border" cellpadding="0" cellspacing="0">
  <tr class="header">
    <td rowspan="2" align="center">ITEM TEST</td>
    <td rowspan="2" align="center">SPECIFICATION</td>
    <td colspan="2" align="center">MEASUREMENT</td>
    <td rowspan="2" align="center" width="100">REMARK</td>
  </tr>
  <tr class="header">
    <td align="center" width="100">MAIN</td>
    <td align="center" width="100">STBY</td>
  </tr>
  <tr>
    <td>Transmit Power (dBm)</td>
    <td>Depend on type / target</td>
    <td align="center"><?php echo $this->ifunction->ifnull($dt_chapter_7a[3]) ?></td>
    <td align="center"><?php echo $this->ifunction->ifnull($dt_chapter_7a[4]) ?></td>
    <td align="center"><?php echo '<img src="'.base_url().'static/i/radio'; if($dt_chapter_7a[5]=='OK') echo '_checked'; echo '.jpg">' ?> OK <?php echo '<img src="'.base_url().'static/i/radio'; if($dt_chapter_7a[5]=='Not OK') echo '_checked'; echo '.jpg">' ?> NOK <?php echo '<img src="'.base_url().'static/i/radio'; if($dt_chapter_7a[5]=='N/A') echo '_checked'; echo '.jpg">' ?>NA</td>
  </tr>

  <tr>
    <td>Receive Power (dBm)</td>
    <td>&plusmn;3 dBm from link budget</td>
    <td align="center"><?php echo $this->ifunction->ifnull($dt_chapter_7b[3]) ?></td>
    <td align="center"><?php echo $this->ifunction->ifnull($dt_chapter_7b[4]) ?></td>
    <td align="center"><?php echo '<img src="'.base_url().'static/i/radio'; if($dt_chapter_7b[5]=='OK') echo '_checked'; echo '.jpg">' ?> OK <?php echo '<img src="'.base_url().'static/i/radio'; if($dt_chapter_7b[5]=='Not OK') echo '_checked'; echo '.jpg">' ?> NOK <?php echo '<img src="'.base_url().'static/i/radio'; if($dt_chapter_7b[5]=='N/A') echo '_checked'; echo '.jpg">' ?>NA</td>
  </tr>
  <tr>
    <td>Transmit Frequency (kHz)</td>
    <td>Depend on ET</td>
    <td align="center"><?php echo $this->ifunction->ifnull($dt_chapter_7c[3]) ?></td>
    <td align="center"><?php echo $this->ifunction->ifnull($dt_chapter_7c[4]) ?></td>
    <td align="center"><?php echo '<img src="'.base_url().'static/i/radio'; if($dt_chapter_7c[5]=='OK') echo '_checked'; echo '.jpg">' ?> OK <?php echo '<img src="'.base_url().'static/i/radio'; if($dt_chapter_7c[5]=='Not OK') echo '_checked'; echo '.jpg">' ?> NOK <?php echo '<img src="'.base_url().'static/i/radio'; if($dt_chapter_7c[5]=='N/A') echo '_checked'; echo '.jpg">' ?>NA</td>
  </tr>
  <tr>
    <td>Receive Frequency (kHz)</td>
    <td>Depend on ET</td>
    <td align="center"><?php echo $this->ifunction->ifnull($dt_chapter_7d[3]) ?></td>
    <td align="center"><?php echo $this->ifunction->ifnull($dt_chapter_7d[4]) ?></td>
    <td align="center"><?php echo '<img src="'.base_url().'static/i/radio'; if($dt_chapter_7d[5]=='OK') echo '_checked'; echo '.jpg">' ?> OK <?php echo '<img src="'.base_url().'static/i/radio'; if($dt_chapter_7d[5]=='Not OK') echo '_checked'; echo '.jpg">' ?> NOK <?php echo '<img src="'.base_url().'static/i/radio'; if($dt_chapter_7d[5]=='N/A') echo '_checked'; echo '.jpg">' ?>NA</td>
  </tr>
  <tr>
    <td>PRx Interference (dBm)<br />
      / Far-end Tx-Off</td>
    <td></td>
    <td align="center"><?php echo $this->ifunction->ifnull($dt_chapter_7e[3]) ?></td>
    <td align="center"><?php echo $this->ifunction->ifnull($dt_chapter_7e[4]) ?></td>
    <td align="center"><?php echo '<img src="'.base_url().'static/i/radio'; if($dt_chapter_7e[5]=='OK') echo '_checked'; echo '.jpg">' ?> OK <?php echo '<img src="'.base_url().'static/i/radio'; if($dt_chapter_7e[5]=='Not OK') echo '_checked'; echo '.jpg">' ?> NOK <?php echo '<img src="'.base_url().'static/i/radio'; if($dt_chapter_7e[5]=='N/A') echo '_checked'; echo '.jpg">' ?>NA</td>
  </tr>
  <tr>
    <td>Switching 1+1*</td>
    <td>Working Normally</td>
    <td align="center"><?php echo '<img src="'.base_url().'static/i/radio'; if($dt_chapter_7f[3]=='OK') echo '_checked'; echo '.jpg">' ?> OK <?php echo '<img src="'.base_url().'static/i/radio'; if($dt_chapter_7f[3]=='Not OK') echo '_checked'; echo '.jpg">' ?> NOK <?php echo '<img src="'.base_url().'static/i/radio'; if($dt_chapter_7f[3]=='N/A') echo '_checked'; echo '.jpg">' ?>NA<br />
    <?php echo '<img src="'.base_url().'static/i/radio'; if($dt_chapter_7f[3]=='OK') echo '_checked'; echo '.jpg">' ?> OK <?php echo '<img src="'.base_url().'static/i/radio'; if($dt_chapter_7f[3]=='Not OK') echo '_checked'; echo '.jpg">' ?> NOK <?php echo '<img src="'.base_url().'static/i/radio'; if($dt_chapter_7f[3]=='N/A') echo '_checked'; echo '.jpg">' ?>NA</td>
    <td align="center"><?php echo '<img src="'.base_url().'static/i/radio'; if($dt_chapter_7f[4]=='OK') echo '_checked'; echo '.jpg">' ?> OK <?php echo '<img src="'.base_url().'static/i/radio'; if($dt_chapter_7f[4]=='Not OK') echo '_checked'; echo '.jpg">' ?> NOK <?php echo '<img src="'.base_url().'static/i/radio'; if($dt_chapter_7f[4]=='N/A') echo '_checked'; echo '.jpg">' ?>NA<br />
    <?php echo '<img src="'.base_url().'static/i/radio'; if($dt_chapter_7f[4]=='OK') echo '_checked'; echo '.jpg">' ?> OK <?php echo '<img src="'.base_url().'static/i/radio'; if($dt_chapter_7f[4]=='Not OK') echo '_checked'; echo '.jpg">' ?> NOK <?php echo '<img src="'.base_url().'static/i/radio'; if($dt_chapter_7f[4]=='N/A') echo '_checked'; echo '.jpg">' ?>NA</td>
    <td>Hardware<br />Software</td>
  </tr>
  <tr>
    <td>Fan (FAU) Alarm Test</td>
    <td>Working Normally</td>
    <td colspan="2" align="center"><?php echo '<img src="'.base_url().'static/i/radio'; if($dt_chapter_7g[3]=='OK') echo '_checked'; echo '.jpg">' ?> OK <?php echo '<img src="'.base_url().'static/i/radio'; if($dt_chapter_7g[3]=='Not OK') echo '_checked'; echo '.jpg">' ?> NOK <?php echo '<img src="'.base_url().'static/i/radio'; if($dt_chapter_7g[3]=='N/A') echo '_checked'; echo '.jpg">' ?>NA</td>
    <td>Hardware</td>
  </tr>
  <tr>
    <td>Threshold (dBm)</td>
    <td>- 70 dBm</td>
    <td colspan="2" align="center"><?php echo '<img src="'.base_url().'static/i/radio'; if($dt_chapter_7h[3]=='OK') echo '_checked'; echo '.jpg">' ?> OK <?php echo '<img src="'.base_url().'static/i/radio'; if($dt_chapter_7h[3]=='Not OK') echo '_checked'; echo '.jpg">' ?> NOK <?php echo '<img src="'.base_url().'static/i/radio'; if($dt_chapter_7h[3]=='N/A') echo '_checked'; echo '.jpg">' ?>NA</td>
    <td>Software</td>
  </tr>
</table>



<br />
<p align="left"><i>Working normally: can switch successfully, a few down time will be accepted. <br />
  Threshold: match ZTE equipment standard. </i></p>

<h3>8. Ethernet Performance</h3>

<?php $Qsubchapter = $this->db->query("SELECT `subno_chapter`, `content` FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `chapter`='8' AND `no_chapter`='8.1' ORDER BY `subno_chapter_order` ASC");
foreach($Qsubchapter->result_object() as $subchapter) $arr_subchapter_8_1[$subchapter->subno_chapter -1]=$subchapter;
$dt_subchapter_8_1a = explode('|', $arr_subchapter_8_1[0]->content);
$dt_subchapter_8_1b = explode('|', $arr_subchapter_8_1[1]->content);
$dt_subchapter_8_1c = explode('|', $arr_subchapter_8_1[2]->content);
 ?>

Measurement will be check for appropriate frame size

<table class="border" cellpadding="0" cellspacing="0">
  <tr class="header">
    <td>ITEM TO BE CHECKED</td>
    <td colspan="2" align="center">STATUS</td>
    <td align="center">Throughput (MBps)</td>
    <td align="center">Packect (Pct/s)</td>
  </tr>
  <tr>
    <td>Frame Size 64</td>
    <td width="30"><?php echo '<img src="'.base_url().'static/i/radio'; if($dt_subchapter_8_1a[3]=='OK') echo '_checked'; echo '.jpg">' ?>OK </td>
    <td width="40"><?php echo '<img src="'.base_url().'static/i/radio'; if($dt_subchapter_8_1a[3]=='Not OK') echo '_checked'; echo '.jpg">' ?>NOK </td>
    <td><?php echo $this->ifunction->ifnull($dt_subchapter_8_1a[4]) ?></td>
    <td><?php echo $this->ifunction->ifnull($dt_subchapter_8_1a[5]) ?></td>
  </tr>
  <tr>
    <td>Frame Size 512</td>
    <td><?php echo '<img src="'.base_url().'static/i/radio'; if($dt_subchapter_8_1b[3]=='OK') echo '_checked'; echo '.jpg">' ?>OK </td>
    <td><?php echo '<img src="'.base_url().'static/i/radio'; if($dt_subchapter_8_1b[3]=='Not OK') echo '_checked'; echo '.jpg">' ?>NOK </td>
    <td><?php echo $this->ifunction->ifnull($dt_subchapter_8_1b[4]) ?></td>
    <td><?php echo $this->ifunction->ifnull($dt_subchapter_8_1b[5]) ?></td>
  </tr>
  <tr>
    <td>Frame Size 1518</td>
    <td><?php echo '<img src="'.base_url().'static/i/radio'; if($dt_subchapter_8_1c[3]=='OK') echo '_checked'; echo '.jpg">' ?>OK </td>
    <td><?php echo '<img src="'.base_url().'static/i/radio'; if($dt_subchapter_8_1c[3]=='Not OK') echo '_checked'; echo '.jpg">' ?>NOK </td>
    <td><?php echo $this->ifunction->ifnull($dt_subchapter_8_1c[4]) ?></td>
    <td><?php echo $this->ifunction->ifnull($dt_subchapter_8_1c[5]) ?></td>
  </tr>
</table>
<br />


<?php $Qsubchapter = $this->db->query("SELECT `subno_chapter`, `content` FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `chapter`='8' AND `no_chapter`='8.2' ORDER BY `subno_chapter_order` ASC");
foreach($Qsubchapter->result_object() as $subchapter) $arr_subchapter_8_2[$subchapter->subno_chapter -1]=$subchapter;
$dt_subchapter_8_2a = explode('|', $arr_subchapter_8_2[0]->content);
$dt_subchapter_8_2b = explode('|', $arr_subchapter_8_2[1]->content);
$dt_subchapter_8_2c = explode('|', $arr_subchapter_8_2[2]->content) ?>

<table class="border" cellpadding="0" cellspacing="0">
  <tr class="header">
    <td>ITEM TO BE CHECKED</td>
    <td align="center">Expected</td>
    <td align="center">Latency Test</td>
    <td colspan="2" align="center">Frame Loss<br />(Expected: No Frame Loss for 1H)</td>
  </tr>
  <tr>
    <td>Frame Size 64</td>
    <td align="center">&lt; 1000 us</td>
    <td ><?php echo $this->ifunction->ifnull($dt_subchapter_8_2a[3]) ?></td>
    <td><?php echo '<img src="'.base_url().'static/i/radio'; if($dt_subchapter_8_2a[4]=='OK') echo '_checked'; echo '.jpg">' ?>OK </td>
    <td><?php echo '<img src="'.base_url().'static/i/radio'; if($dt_subchapter_8_2a[4]=='Not OK') echo '_checked'; echo '.jpg">' ?>NOK </td>
  </tr>
  <tr>
    <td>Frame Size 512</td>
    <td align="center">&lt; 1500 us</td>
    <td ><?php echo $this->ifunction->ifnull($dt_subchapter_8_2b[3]) ?></td>
    <td><?php echo '<img src="'.base_url().'static/i/radio'; if($dt_subchapter_8_2b[4]=='OK') echo '_checked'; echo '.jpg">' ?>OK </td>
    <td><?php echo '<img src="'.base_url().'static/i/radio'; if($dt_subchapter_8_2b[4]=='Not OK') echo '_checked'; echo '.jpg">' ?>NOK </td>
  </tr>
  <tr>
    <td>Frame Size 1518</td>
    <td align="center">&lt; 2000 us</td>
    <td ><?php echo $this->ifunction->ifnull($dt_subchapter_8_2c[3]) ?></td>
    <td><?php echo '<img src="'.base_url().'static/i/radio'; if($dt_subchapter_8_2c[4]=='OK') echo '_checked'; echo '.jpg">' ?>OK </td>
    <td><?php echo '<img src="'.base_url().'static/i/radio'; if($dt_subchapter_8_2c[4]=='Not OK') echo '_checked'; echo '.jpg">' ?>NOK </td>
  </tr>
</table>
<p align="left"><i>For test: ZTE can choose Bandwidth 28M or 56M, and only in 128QAM.Test expected in the form is for one way.</i></p>

<hr />

<?php $Qsubchapter = $this->db->query("SELECT `subno_chapter`, `content` FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `chapter`='8' AND `no_chapter`='8.3.1' ORDER BY `subno_chapter_order` ASC");
foreach($Qsubchapter->result_object() as $subchapter) $arr_subchapter_8_3[$subchapter->subno_chapter -1]=$subchapter;
$dt_subchapter_8_3a = explode('|', $arr_subchapter_8_3[0]->content);
$dt_subchapter_8_3b = explode('|', $arr_subchapter_8_3[1]->content);
$dt_subchapter_8_3c = explode('|', $arr_subchapter_8_3[2]->content);
$dt_subchapter_8_3d = explode('|', $arr_subchapter_8_3[3]->content);
$dt_subchapter_8_3e = explode('|', $arr_subchapter_8_3[4]->content);
$dt_subchapter_8_3f = explode('|', $arr_subchapter_8_3[5]->content);
$dt_subchapter_8_3g = explode('|', $arr_subchapter_8_3[6]->content);

$Qsubchapter = $this->db->query("SELECT `subno_chapter`, `content` FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `chapter`='8' AND `no_chapter`='8.3.2' ORDER BY `subno_chapter_order` ASC");
foreach($Qsubchapter->result_object() as $subchapter) $arr_subchapter_8_4[$subchapter->subno_chapter -1]=$subchapter;
$dt_subchapter_8_4a = explode('|', $arr_subchapter_8_4[0]->content);
$dt_subchapter_8_4b = explode('|', $arr_subchapter_8_4[1]->content);
$dt_subchapter_8_4c = explode('|', $arr_subchapter_8_4[2]->content);
$dt_subchapter_8_4d = explode('|', $arr_subchapter_8_4[3]->content);
$dt_subchapter_8_4e = explode('|', $arr_subchapter_8_4[4]->content);
$dt_subchapter_8_4f = explode('|', $arr_subchapter_8_4[5]->content);
$dt_subchapter_8_4g = explode('|', $arr_subchapter_8_4[6]->content);

$Qsubchapter = $this->db->query("SELECT `subno_chapter`, `content` FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `chapter`='8' AND `no_chapter`='8.3.3' ORDER BY `subno_chapter_order` ASC");
foreach($Qsubchapter->result_object() as $subchapter) $arr_subchapter_8_5[$subchapter->subno_chapter -1]=$subchapter;
$dt_subchapter_8_5a = explode('|', $arr_subchapter_8_5[0]->content);
$dt_subchapter_8_5b = explode('|', $arr_subchapter_8_5[1]->content);
$dt_subchapter_8_5c = explode('|', $arr_subchapter_8_5[2]->content);
$dt_subchapter_8_5d = explode('|', $arr_subchapter_8_5[3]->content);
$dt_subchapter_8_5e = explode('|', $arr_subchapter_8_5[4]->content);
$dt_subchapter_8_5f = explode('|', $arr_subchapter_8_5[5]->content);
$dt_subchapter_8_3g = explode('|', $arr_subchapter_8_3[6]->content);

$Qsubchapter = $this->db->query("SELECT `subno_chapter`, `content` FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `chapter`='8' AND `no_chapter`='8.3.4' ORDER BY `subno_chapter_order` ASC");
foreach($Qsubchapter->result_object() as $subchapter) $arr_subchapter_8_6[$subchapter->subno_chapter -1]=$subchapter;
$dt_subchapter_8_6a = explode('|', $arr_subchapter_8_6[0]->content);
$dt_subchapter_8_6b = explode('|', $arr_subchapter_8_6[1]->content);
$dt_subchapter_8_6c = explode('|', $arr_subchapter_8_6[2]->content);
$dt_subchapter_8_6d = explode('|', $arr_subchapter_8_6[3]->content);
$dt_subchapter_8_6e = explode('|', $arr_subchapter_8_6[4]->content);
$dt_subchapter_8_6f = explode('|', $arr_subchapter_8_6[5]->content);
$dt_subchapter_8_3g = explode('|', $arr_subchapter_8_3[6]->content);

$Qsubchapter = $this->db->query("SELECT `subno_chapter`, `content` FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `chapter`='8' AND `no_chapter`='8.3.5' ORDER BY `subno_chapter_order` ASC");
foreach($Qsubchapter->result_object() as $subchapter) $arr_subchapter_8_7[$subchapter->subno_chapter -1]=$subchapter;
$dt_subchapter_8_7a = explode('|', $arr_subchapter_8_7[0]->content);
$dt_subchapter_8_7b = explode('|', $arr_subchapter_8_7[1]->content);
$dt_subchapter_8_7c = explode('|', $arr_subchapter_8_7[2]->content);
$dt_subchapter_8_7d = explode('|', $arr_subchapter_8_7[3]->content);
$dt_subchapter_8_7e = explode('|', $arr_subchapter_8_7[4]->content);
$dt_subchapter_8_7f = explode('|', $arr_subchapter_8_7[5]->content);
$dt_subchapter_8_3g = explode('|', $arr_subchapter_8_3[6]->content);

$Qsubchapter = $this->db->query("SELECT `subno_chapter`, `content` FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `chapter`='8' AND `no_chapter`='8.3.6' ORDER BY `subno_chapter_order` ASC");
foreach($Qsubchapter->result_object() as $subchapter) $arr_subchapter_8_8[$subchapter->subno_chapter -1]=$subchapter;
$dt_subchapter_8_8a = explode('|', $arr_subchapter_8_8[0]->content);
$dt_subchapter_8_8b = explode('|', $arr_subchapter_8_8[1]->content);
$dt_subchapter_8_8c = explode('|', $arr_subchapter_8_8[2]->content);
$dt_subchapter_8_8d = explode('|', $arr_subchapter_8_8[3]->content);
$dt_subchapter_8_8e = explode('|', $arr_subchapter_8_8[4]->content);
$dt_subchapter_8_8f = explode('|', $arr_subchapter_8_8[5]->content);
$dt_subchapter_8_8g = explode('|', $arr_subchapter_8_8[6]->content);

$Qsubchapter = $this->db->query("SELECT `subno_chapter`, `content` FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `chapter`='8' AND `no_chapter`='8.3.7' ORDER BY `subno_chapter_order` ASC");
foreach($Qsubchapter->result_object() as $subchapter) $arr_subchapter_8_9[$subchapter->subno_chapter -1]=$subchapter;
$dt_subchapter_8_9a = explode('|', $arr_subchapter_8_9[0]->content);
$dt_subchapter_8_9b = explode('|', $arr_subchapter_8_9[1]->content);
$dt_subchapter_8_9c = explode('|', $arr_subchapter_8_9[2]->content);
$dt_subchapter_8_9d = explode('|', $arr_subchapter_8_9[3]->content);
$dt_subchapter_8_9e = explode('|', $arr_subchapter_8_9[4]->content);
$dt_subchapter_8_9f = explode('|', $arr_subchapter_8_9[5]->content);
$dt_subchapter_8_9g = explode('|', $arr_subchapter_8_9[6]->content);


$Qsubchapter = $this->db->query("SELECT `subno_chapter`, `content` FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `chapter`='8' AND `no_chapter`='8.3' ORDER BY `subno_chapter_order` ASC");

foreach($Qsubchapter->result_object() as $parChapter) $par_chapter[] = $parChapter;

$par_chapter_1 = explode('|', $par_chapter[0]->content);
$par_chapter_2 = explode('|', $par_chapter[1]->content);
$par_chapter_3 = explode('|', $par_chapter[2]->content);
$par_chapter_4 = explode('|', $par_chapter[3]->content);
$par_chapter_5 = explode('|', $par_chapter[4]->content);
$par_chapter_6 = explode('|', $par_chapter[5]->content);
$par_chapter_7 = explode('|', $par_chapter[6]->content);

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
    <td>Perform test with the following load<br />
      PBit 0 : <?php echo $this->ifunction->ifnull($dt_subchapter_8_3a[3]) ?> Mbps (14,28% of BW)<br />
      PBit 1 : <?php echo $this->ifunction->ifnull($dt_subchapter_8_3b[3]) ?> Mbps (14,28% of BW)<br />
      PBit 2 : <?php echo $this->ifunction->ifnull($dt_subchapter_8_3c[3]) ?> Mbps (14,28% of BW)<br />
      PBit 3 : <?php echo $this->ifunction->ifnull($dt_subchapter_8_3d[3]) ?> Mbps (14,28% of BW)<br />
      PBit 4 : <?php echo $this->ifunction->ifnull($dt_subchapter_8_3e[3]) ?> Mbps (14,28% of BW)<br />
      PBit 5 : <?php echo $this->ifunction->ifnull($dt_subchapter_8_3f[3]) ?> Mbps (14,28% of BW)<br />
      PBit 6 : <?php echo $this->ifunction->ifnull($dt_subchapter_8_3g[3]) ?> Mbps (14,28% of BW)</td>
    <td>
    <br />
      PBit 0 : <?php echo $this->ifunction->ifnull($dt_subchapter_8_3a[4]) ?> Mbps<br />
      PBit 1 : <?php echo $this->ifunction->ifnull($dt_subchapter_8_3b[4]) ?> Mbps<br />
      PBit 2 : <?php echo $this->ifunction->ifnull($dt_subchapter_8_3c[4]) ?> Mbps<br />
      PBit 3 : <?php echo $this->ifunction->ifnull($dt_subchapter_8_3d[4]) ?> Mbps<br />
      PBit 4 : <?php echo $this->ifunction->ifnull($dt_subchapter_8_3e[4]) ?> Mbps<br />
      PBit 5 : <?php echo $this->ifunction->ifnull($dt_subchapter_8_3f[4]) ?> Mbps<br />
      PBit 6 : <?php echo $this->ifunction->ifnull($dt_subchapter_8_3g[4]) ?> Mbps</td>
    <td>
      PBit 0 : 0 %<br />
        PBit 1 : 0 %<br />
        PBit 2 : 0 %<br />
        PBit 3 : 0 %<br />
        PBit 4 : 0 %<br />
        PBit 5 : 0 %<br />
        PBit 6 : 0 %</td>
    <td align="center"><?php echo '<img src="'.base_url().'static/i/radio'; if($par_chapter_1[3]=='OK') echo '_checked'; echo '.jpg">' ?></td>
    <td align="center"><?php echo '<img src="'.base_url().'static/i/radio'; if($par_chapter_1[3]=='Not OK') echo '_checked'; echo '.jpg">' ?></td>
  </tr>
  <tr>
    <td width="40" align="center">2</td>
    <td>Perform    test with the following load<br />
      PBit 0 : <?php echo $this->ifunction->ifnull($dt_subchapter_8_4a[3]) ?> Mbps (10% of BW)<br />
      PBit 1 : <?php echo $this->ifunction->ifnull($dt_subchapter_8_4b[3]) ?> Mbps (14,28% of BW)<br />
      PBit 2 : <?php echo $this->ifunction->ifnull($dt_subchapter_8_4c[3]) ?> Mbps (14,28% of BW)<br />
      PBit 3 : <?php echo $this->ifunction->ifnull($dt_subchapter_8_4d[3]) ?> Mbps (14,28% of BW)<br />
      PBit 4 : <?php echo $this->ifunction->ifnull($dt_subchapter_8_4e[3]) ?> Mbps (14,28% of BW)<br />
      PBit 5 : <?php echo $this->ifunction->ifnull($dt_subchapter_8_4f[3]) ?> Mbps (14,28% of BW)<br />
      PBit 6 : <?php echo $this->ifunction->ifnull($dt_subchapter_8_4g[3]) ?> Mbps (25% of BW)</td>
    <td>
    <br />
      PBit 0 : <?php echo $this->ifunction->ifnull($dt_subchapter_8_4a[4]) ?> Mbps<br />
      PBit 1 : <?php echo $this->ifunction->ifnull($dt_subchapter_8_4b[4]) ?> Mbps<br />
      PBit 2 : <?php echo $this->ifunction->ifnull($dt_subchapter_8_4c[4]) ?> Mbps<br />
      PBit 3 : <?php echo $this->ifunction->ifnull($dt_subchapter_8_4d[4]) ?> Mbps<br />
      PBit 4 : <?php echo $this->ifunction->ifnull($dt_subchapter_8_4e[4]) ?> Mbps<br />
      PBit 5 : <?php echo $this->ifunction->ifnull($dt_subchapter_8_4f[4]) ?> Mbps<br />
      PBit 6 : <?php echo $this->ifunction->ifnull($dt_subchapter_8_4g[4]) ?> Mbps</td>
    <td>
      PBit 0 : Max 100 %<br />
        PBit 1 : 0 %<br />
        PBit 2 : 0 %<br />
        PBit 3 : 0 %<br />
        PBit 4 : 0 %<br />
        PBit 5 : 0 %<br />
        PBit 6 : 0 %</td>
    <td align="center"><?php echo '<img src="'.base_url().'static/i/radio'; if($par_chapter_2[3]=='OK') echo '_checked'; echo '.jpg">' ?></td>
    <td align="center"><?php echo '<img src="'.base_url().'static/i/radio'; if($par_chapter_2[3]=='Not OK') echo '_checked'; echo '.jpg">' ?></td>
  </tr>
  <tr>
    <td width="40" align="center">3</td>
    <td>Perform test with the following load <br />
      PBit 0 : <?php echo $this->ifunction->ifnull($dt_subchapter_8_5a[3]) ?> Mbps (10% of BW)<br />
      PBit 1 : <?php echo $this->ifunction->ifnull($dt_subchapter_8_5b[3]) ?> Mbps (10% of BW)<br />
      PBit 2 : <?php echo $this->ifunction->ifnull($dt_subchapter_8_5c[3]) ?> Mbps (14,28% of BW)<br />
      PBit 3 : <?php echo $this->ifunction->ifnull($dt_subchapter_8_5d[3]) ?> Mbps (14,28% of BW)<br />
      PBit 4 : <?php echo $this->ifunction->ifnull($dt_subchapter_8_5e[3]) ?> Mbps (14,28% of BW)<br />
      PBit 5 : <?php echo $this->ifunction->ifnull($dt_subchapter_8_5f[3]) ?> Mbps (25% of BW)<br />
      PBit 6 : <?php echo $this->ifunction->ifnull($dt_subchapter_8_5g[3]) ?> Mbps (25% of BW)</td>
    <td>
    <br />
      PBit 0 : <?php echo $this->ifunction->ifnull($dt_subchapter_8_5a[4]) ?> Mbps<br />
      PBit 1 : <?php echo $this->ifunction->ifnull($dt_subchapter_8_5b[4]) ?> Mbps<br />
      PBit 2 : <?php echo $this->ifunction->ifnull($dt_subchapter_8_5c[4]) ?> Mbps<br />
      PBit 3 : <?php echo $this->ifunction->ifnull($dt_subchapter_8_5d[4]) ?> Mbps<br />
      PBit 4 : <?php echo $this->ifunction->ifnull($dt_subchapter_8_5e[4]) ?> Mbps<br />
      PBit 5 : <?php echo $this->ifunction->ifnull($dt_subchapter_8_5f[4]) ?> Mbps<br />
      PBit 6 : <?php echo $this->ifunction->ifnull($dt_subchapter_8_5g[4]) ?> Mbps</td>
    <td>
      PBit 0 : Max 100 %<br />
        PBit 1 : Max 100 %<br />
        PBit 2 : 0 %<br />
        PBit 3 : 0 %<br />
        PBit 4 : 0 %<br />
        PBit 5 : 0 %<br />
        PBit 6 : 0 % </td>
    <td align="center"><?php echo '<img src="'.base_url().'static/i/radio'; if($par_chapter_3[3]=='OK') echo '_checked'; echo '.jpg">' ?></td>
    <td align="center"><?php echo '<img src="'.base_url().'static/i/radio'; if($par_chapter_3[3]=='Not OK') echo '_checked'; echo '.jpg">' ?></td>
  </tr>
  <tr>
    <td width="40" align="center">4</td>
    <td>Perform test with the following load <br />
      PBit 0 : <?php echo $this->ifunction->ifnull($dt_subchapter_8_6a[3]) ?> Mbps (10% of BW)<br />
      PBit 1 : <?php echo $this->ifunction->ifnull($dt_subchapter_8_6b[3]) ?> Mbps (10% of BW)<br />
      PBit 2 : <?php echo $this->ifunction->ifnull($dt_subchapter_8_6c[3]) ?> Mbps (10% of BW)<br />
      PBit 3 : <?php echo $this->ifunction->ifnull($dt_subchapter_8_6d[3]) ?> Mbps (14,28% of BW)<br />
      PBit 4 : <?php echo $this->ifunction->ifnull($dt_subchapter_8_6e[3]) ?> Mbps (25% of BW)<br />
      PBit 5 : <?php echo $this->ifunction->ifnull($dt_subchapter_8_6f[3]) ?> Mbps (25% of BW)<br />
      PBit 6 : <?php echo $this->ifunction->ifnull($dt_subchapter_8_6g[3]) ?> Mbps (25% of BW)</td>
    <td>
    <br />
      PBit 0 : <?php echo $this->ifunction->ifnull($dt_subchapter_8_6a[4]) ?> Mbps<br />
      PBit 1 : <?php echo $this->ifunction->ifnull($dt_subchapter_8_6b[4]) ?> Mbps<br />
      PBit 2 : <?php echo $this->ifunction->ifnull($dt_subchapter_8_6c[4]) ?> Mbps<br />
      PBit 3 : <?php echo $this->ifunction->ifnull($dt_subchapter_8_6d[4]) ?> Mbps<br />
      PBit 4 : <?php echo $this->ifunction->ifnull($dt_subchapter_8_6e[4]) ?> Mbps<br />
      PBit 5 : <?php echo $this->ifunction->ifnull($dt_subchapter_8_6f[4]) ?> Mbps<br />
      PBit 6 : <?php echo $this->ifunction->ifnull($dt_subchapter_8_6g[4]) ?> Mbps</td>
    <td>
      PBit 0 : Max 100 %<br />
        PBit 1 : Max 100 %<br />
        PBit 2 : Max 100 %<br />
        PBit 3 : 0 %<br />
        PBit 4 : 0 %<br />
        PBit 5 : 0 %<br />
        PBit 6 : 0 %</td>
    <td align="center"><?php echo '<img src="'.base_url().'static/i/radio'; if($par_chapter_4[3]=='OK') echo '_checked'; echo '.jpg">' ?></td>
    <td align="center"><?php echo '<img src="'.base_url().'static/i/radio'; if($par_chapter_4[3]=='Not OK') echo '_checked'; echo '.jpg">' ?></td>
  </tr>
  </table>
  
<hr />

<table class="border" cellpadding="0" cellspacing="0">
  <tr>
    <td width="40" align="center">5</td>
    <td>Perform test with the following load <br />
      PBit 0 : <?php echo $this->ifunction->ifnull($dt_subchapter_8_7a[3]) ?> Mbps (10% of BW)<br />
      PBit 1 : <?php echo $this->ifunction->ifnull($dt_subchapter_8_7b[3]) ?> Mbps (10% of BW)<br />
      PBit 2 : <?php echo $this->ifunction->ifnull($dt_subchapter_8_7c[3]) ?> Mbps (10% of BW)<br />
      PBit 3 : <?php echo $this->ifunction->ifnull($dt_subchapter_8_7d[3]) ?> Mbps (10% of BW)<br />
      PBit 4 : <?php echo $this->ifunction->ifnull($dt_subchapter_8_7e[3]) ?> Mbps (25% of BW)<br />
      PBit 5 : <?php echo $this->ifunction->ifnull($dt_subchapter_8_7f[3]) ?> Mbps (25% of BW)<br />
      PBit 6 : <?php echo $this->ifunction->ifnull($dt_subchapter_8_7g[3]) ?> Mbps (50% of BW)</td>
    <td>
    <br />
      PBit 0 : <?php echo $this->ifunction->ifnull($dt_subchapter_8_7a[4]) ?> Mbps<br />
      PBit 1 : <?php echo $this->ifunction->ifnull($dt_subchapter_8_7b[4]) ?> Mbps<br />
      PBit 2 : <?php echo $this->ifunction->ifnull($dt_subchapter_8_7c[4]) ?> Mbps<br />
      PBit 3 : <?php echo $this->ifunction->ifnull($dt_subchapter_8_7d[4]) ?> Mbps<br />
      PBit 4 : <?php echo $this->ifunction->ifnull($dt_subchapter_8_7e[4]) ?> Mbps<br />
      PBit 5 : <?php echo $this->ifunction->ifnull($dt_subchapter_8_7f[4]) ?> Mbps<br />
      PBit 6 : <?php echo $this->ifunction->ifnull($dt_subchapter_8_7g[4]) ?> Mbps</td>
    <td>
      PBit 0 : Max 100 %<br />
        PBit 1 : Max 100 %<br />
        PBit 2 : Max 100 %<br />
        PBit 3 : Max 100 %<br />
        PBit 4 : 0 %<br />
        PBit 5 : 0 %<br />
        PBit 6 : 0 %</td>
    <td align="center" width="30"><?php echo '<img src="'.base_url().'static/i/radio'; if($par_chapter_5[3]=='OK') echo '_checked'; echo '.jpg">' ?></td>
    <td align="center" width="40"><?php echo '<img src="'.base_url().'static/i/radio'; if($par_chapter_5[3]=='Not OK') echo '_checked'; echo '.jpg">' ?></td>
  </tr>
  <tr>
    <td width="40" align="center">6</td>
    <td>Perform test with the following load <br />
      PBit 0 : <?php echo $this->ifunction->ifnull($dt_subchapter_8_8a[3]) ?> Mbps (10% of BW)<br />
      PBit 1 : <?php echo $this->ifunction->ifnull($dt_subchapter_8_8b[3]) ?> Mbps (10% of BW)<br />
      PBit 2 : <?php echo $this->ifunction->ifnull($dt_subchapter_8_8c[3]) ?> Mbps (10% of BW)<br />
      PBit 3 : <?php echo $this->ifunction->ifnull($dt_subchapter_8_8d[3]) ?> Mbps (10% of BW)<br />
      PBit 4 : <?php echo $this->ifunction->ifnull($dt_subchapter_8_8e[3]) ?> Mbps (10% of BW)<br />
      PBit 5 : <?php echo $this->ifunction->ifnull($dt_subchapter_8_8f[3]) ?> Mbps (50% of BW)<br />
      PBit 6 : <?php echo $this->ifunction->ifnull($dt_subchapter_8_8g[3]) ?> Mbps (50% of BW)</td>
    <td>
    <br />
      PBit 0 : <?php echo $this->ifunction->ifnull($dt_subchapter_8_8a[4]) ?> Mbps<br />
      PBit 1 : <?php echo $this->ifunction->ifnull($dt_subchapter_8_8b[4]) ?> Mbps<br />
      PBit 2 : <?php echo $this->ifunction->ifnull($dt_subchapter_8_8c[4]) ?> Mbps<br />
      PBit 3 : <?php echo $this->ifunction->ifnull($dt_subchapter_8_8d[4]) ?> Mbps<br />
      PBit 4 : <?php echo $this->ifunction->ifnull($dt_subchapter_8_8e[4]) ?> Mbps<br />
      PBit 5 : <?php echo $this->ifunction->ifnull($dt_subchapter_8_8f[4]) ?> Mbps<br />
      PBit 6 : <?php echo $this->ifunction->ifnull($dt_subchapter_8_8g[4]) ?> Mbps</td>
    <td>
      PBit 0 :    Max 100 %<br />
        PBit 1 :    Max 100 %<br />
        PBit 2 :    Max 100 %<br />
        PBit 3 :    Max 100 %<br />
        PBit 4 :    Max 100 %<br />
        PBit 5 :    0 %<br />
        PBit 6 :    0 %</td>
    <td align="center"><?php echo '<img src="'.base_url().'static/i/radio'; if($par_chapter_6[3]=='OK') echo '_checked'; echo '.jpg">' ?></td>
    <td align="center"><?php echo '<img src="'.base_url().'static/i/radio'; if($par_chapter_6[3]=='Not OK') echo '_checked'; echo '.jpg">' ?></td>
  </tr>
  <tr>
    <td width="40" align="center">7</td>
    <td>Perform    test with the following load <br />
      PBit 0 : <?php echo $this->ifunction->ifnull($dt_subchapter_8_9a[3]) ?> Mbps (10% of BW)<br />
      PBit 1 : <?php echo $this->ifunction->ifnull($dt_subchapter_8_9b[3]) ?> Mbps (10% of BW)<br />
      PBit 2 : <?php echo $this->ifunction->ifnull($dt_subchapter_8_9c[3]) ?> Mbps (10% of BW)<br />
      PBit 3 : <?php echo $this->ifunction->ifnull($dt_subchapter_8_9d[3]) ?> Mbps (10% of BW)<br />
      PBit 4 : <?php echo $this->ifunction->ifnull($dt_subchapter_8_9e[3]) ?> Mbps (10% of BW)<br />
      PBit 5 : <?php echo $this->ifunction->ifnull($dt_subchapter_8_9f[3]) ?> Mbps (10% of BW)<br />
      PBit 6 : <?php echo $this->ifunction->ifnull($dt_subchapter_8_9g[3]) ?> Mbps (100% of BW)</td>
    <td>
    <br />
      PBit 0 : <?php echo $this->ifunction->ifnull($dt_subchapter_8_9a[4]) ?> Mbps<br />
      PBit 1 : <?php echo $this->ifunction->ifnull($dt_subchapter_8_9b[4]) ?> Mbps<br />
      PBit 2 : <?php echo $this->ifunction->ifnull($dt_subchapter_8_9c[4]) ?> Mbps<br />
      PBit 3 : <?php echo $this->ifunction->ifnull($dt_subchapter_8_9d[4]) ?> Mbps<br />
      PBit 4 : <?php echo $this->ifunction->ifnull($dt_subchapter_8_9e[4]) ?> Mbps<br />
      PBit 5 : <?php echo $this->ifunction->ifnull($dt_subchapter_8_9f[4]) ?> Mbps<br />
      PBit 6 : <?php echo $this->ifunction->ifnull($dt_subchapter_8_9g[4]) ?> Mbps</td>
    <td>
      PBit 0 :    Max 100 %<br />
        PBit 1 :    Max 100 %<br />
        PBit 2 :    Max 100 %<br />
        PBit 3 :    Max 100 %<br />
        PBit 4 :    Max 100 %<br />
        PBit 5 :    Max 100 %<br />
        PBit 6 :    0 %</td>
    <td align="center"><?php echo '<img src="'.base_url().'static/i/radio'; if($par_chapter_7[3]=='OK') echo '_checked'; echo '.jpg">' ?></td>
    <td align="center"><?php echo '<img src="'.base_url().'static/i/radio'; if($par_chapter_7[3]=='Not OK') echo '_checked'; echo '.jpg">' ?></td>
  </tr>
</table>
<br />


<?php $Qchapter = $this->db->query("SELECT `subno_chapter`, `content` FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `chapter`='9' AND `no_chapter`='9.1' ORDER BY `subno_chapter_order` ASC");
foreach($Qchapter->result_object() as $chapter) $arr_chapter_9_[str_replace('9.', '', $chapter->no_chapter) -1]=$chapter;
$arr_chapter_9 = explode('|', $arr_chapter_9_[0]->content);
?>

<h3>9. Alarm Check</h3>
<table class="border" cellpadding="0" cellspacing="0">
  <tr>
    <td bgcolor="#CCCCCC">Clear Alarm</td>
    <td width="197" align="center"><?php echo '<img src="'.base_url().'static/i/radio'; if($arr_chapter_9[3]=='OK') echo '_checked'; echo '.jpg">' ?>OK <?php echo '<img src="'.base_url().'static/i/radio'; if($arr_chapter_9[3]=='Not OK') echo '_checked'; echo '.jpg">' ?>NOK </td>
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
foreach($Qchapter->result_object() as $chapter) $arr_chapter_11[str_replace('11.', '', $chapter->no_chapter) -1]=$chapter; 
$dt_chapter_11a = explode('|', $arr_chapter_11[0]->content);
?>

<h3>11. Environment Check</h3>
<table class="border" cellpadding="0" cellspacing="0">
  <tr>
    <td bgcolor="#CCCCCC">Clean Up Shelter Environment Check (Ex Material)</td>
    <td align="center"><?php echo '<img src="'.base_url().'static/i/radio'; if($dt_chapter_11a[3]=='CLEAN') echo '_checked'; echo '.jpg">' ?>CLEAN <?php echo '<img src="'.base_url().'static/i/radio'; if($dt_chapter_11a[3]=='DIRTY') echo '_checked'; echo '.jpg">' ?>DIRTY</td>
    <td width="192"><?php echo $this->ifunction->ifnull($dt_chapter_11a[4]) ?></td>
  </tr>
</table>
<br />

<?php $Qsubchapter = $this->db->query("SELECT `subno_chapter`, `content` FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `chapter`='12' AND `no_chapter`='12.1' ORDER BY `subno_chapter_order` ASC"); foreach($Qsubchapter->result_object() as $subchapter) $arr_subchapter_12_1[$subchapter->subno_chapter -1]=$subchapter ?>

<h3>12. Attachment Checking</h3>
<table class="border" cellpadding="0" cellspacing="0">
    <tr class="header">
    <td>ITEM TO BE ATTACHED</td>
    <td colspan="3" align="center">STATUS</td>
    <td align="center">Page Number</td>
    <td align="center">Total Pages</td>
</tr>
<?php
$arr_dt_121 = array('Bill Of Quantity (BOQ) as Equipment Inv.', 'Save Report and configuration', 'Module Inventory capture **)', 'Link Calculation (Link Budget)', 'BER Test Result *)', 'Engineering Table', 'Installation Check', 'Scan Frequency***)');
for($i=0; $i <= 7; $i++){
	$dt_subchapter_12_1 = explode('|', $arr_subchapter_12_1[$i]->content);
	echo '<tr><td align="center">'.$arr_dt_121[$i].'</td>';
	echo '<td align="center" width="30"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_12_1[3]=='OK') echo '_checked'; echo '.jpg"></td><td align="center" width="40"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_12_1[3]=='Not OK') echo '_checked'; echo '.jpg"></td><td align="center" width="35"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_12_1[3]=='N/A') echo '_checked'; echo '.jpg"></td>';
	
	if($i == 1){
		echo '<td colspan="2" align="center">Attachment in Softcopy</td>';
	}elseif(($i == 2) || ($i == 4) || ($i == 7)){
		echo '<td colspan="2" align="center">'.$this->ifunction->ifnull($dt_subchapter_12_1[4]).'</td>';
	}else{
		echo '<td>'.$this->ifunction->ifnull($dt_subchapter_12_1[4]).'</td>';
		echo '<td>'.$this->ifunction->ifnull($dt_subchapter_12_1[5]).'</td>';
	}
	
	echo '</tr>';
}
?>
</table>

<p>*) BER Test  Result are to be printed if available E2E E1<br />**) Capture  Module Inventory only. To be print out and attach in Jakarta<br />***) Print  out of scan frequency to be capture per 1MHz bandwidth  ±  14 MHz, Only for  using new frequency links</p>
<p>Note: <br /><strong>ATP will accept if no pending item</strong></p>
<p>Before swap, the existing MW NMS maynot  work, it will be accepted by Indosat.</p>