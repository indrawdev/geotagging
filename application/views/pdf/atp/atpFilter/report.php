<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed') ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xml:lang="en" xmlns="http://www.w3.org/1999/xhtml" lang="en">
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
<title>ATP - Filter</title>
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
	$atp_fl_approve = $atp[0]->fl_approve;
	$msg_supervisor = $atp[0]->msg_supervisor;
	$msg_manager = $atp[0]->msg_manager;
	$msg_indosat = $atp[0]->msg_indosat;
	$sign_supervisor = $atp[0]->sign_supervisor;
	$sign_manager = $atp[0]->sign_manager;
	$sign_indosat = $atp[0]->sign_indosat;
}elseif($atp[0]->fl_approve > 3){
	$atp_fl_approve = $atp[0]->fl_approve;
	$msg_supervisor = $atp[0]->msg_supervisor;
	$msg_manager = $atp[0]->msg_manager;
	$msg_indosat = '';
	$sign_supervisor = $atp[0]->sign_supervisor;
	$sign_manager = $atp[0]->sign_manager;
	$sign_indosat = '';
}else{
	$atp_fl_approve = $atp[0]->fl_approve;
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
<tr><td colspan="3">This ATP Manual Version 3.5 has been approved by:</td></tr>
<tr>
    <td width="33%" align="center">INDOSAT BSS NOMC</td>
    <td width="34%" align="center">PM INDOSAT</td>
    <td width="33%" align="center">PM VENDOR</td>
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

<p id="logo"><img src="<?php echo base_url() ?>static/i/indosat.jpg" /></p>

<h1>Acceptance Test Procedure<br />Node B<br /><br />3G RAN WCDMA<br />INDOSAT</h1>
<h3 style="text-align:left; margin:40px 0 40px 150px">
<?php echo '<img src="'.base_url().'static/i/checkbox.jpg">' ?> BASEBAND HARDWARE CAPACITY UPGRADE<br />
<?php echo '<img src="'.base_url().'static/i/checkbox.jpg">' ?> IUB OVER IP MIGRATION<br />
<?php echo '<img src="'.base_url().'static/i/checkbox.jpg">' ?> SECOND CARRIER ACTIVATION<br />
<?php echo '<img src="'.base_url().'static/i/checkbox.jpg">' ?> OTHERS…
</h3>
<h2>RBS 3000/6000 WCDMA<br />ATP Manual version 1.1<br /><span>Revision Date : October, 21<sup>st</sup> 2012</span></h2>

<table class="footer" cellpadding="0" cellspacing="0" style="margin-top:20px">
<tr><td width="130">Project Name</td><td align="center" width="10">:</td><td></td></tr>
<tr><td>Project Description</td><td align="center">:</td><td></td></tr>
<tr><td>PO Number</td><td align="center">:</td><td></td></tr>
<tr><td>Area</td><td align="center">:</td><td></td></tr>
<tr><td>RFS Date</td><td align="center">:</td><td></td></tr>
</table>

<hr />
<?php } if($cover == 1) die('</body></html>') ?>

<?php
$Qatp = $this->db->query("
SELECT b.`id`, b.`name`, b.`address`
FROM `it_atp` a
LEFT JOIN `it_site` b ON b.`site_id`=a.`site_id`
WHERE a.`atp_id`='$dx'");
$atp = $Qatp->result_object();
?>

<h3>Identification</h3>
<span style="font-size:11px"><i>* For Single Site</i></span>
<table class="border" cellpadding="0" cellspacing="0">
<tr>
	<td valign="top"><font color="#666">Site ID:</font> <?php echo $atp[0]->id ?><p style="margin-bottom:0"><font color="#666">Site Name:</font> <?php echo $atp[0]->name ?></p></td>
    <td valign="top"><font color="#666">Site Address:</font> <?php echo $atp[0]->address ?></td>
</tr>
</table>

<?php
$Qei = $this->db->query("SELECT * FROM `it_atp_form` WHERE `atp_id`='$dx'");
$ei = $Qei->result_object();
$rbs_type = explode('|', $ei[0]->identification_conf_rbs);
$configuration_type = explode('|', $ei[0]->identification_conf_type);
$installed_type = explode('|', $ei[0]->identification_conf_installed);
$activated_type = explode('|', $ei[0]->identification_conf_activated);
$serial_type = explode('|', $ei[0]->identification_conf_serial);
$time_spent = explode('|', $ei[0]->time_spent);
?>
<h3>Equipment Identification</h3>
<table cellpadding="0" cellspacing="0">
<tr valign="top">
	<td width="80">Type</td><td align="center" width="10">:</td>
		<td>
        <img src="<?php echo base_url() ?>static/i/checkbox<?php if($ei[0]->identification_type=='RBS 6601') echo '_checked' ?>.jpg"> RBS 6601
        </td>
</tr>
<tr valign="top">
	<td>RBS Configuration</td><td align="center">:</td>
    <td>
        <table class="border" cellpadding="0" cellspacing="0">
        <tr class="header">
        	<td>RBS Type</td><td>Configuration Type</td><td>Installed</td><td>Activated</td><td>Factory Serial Number</td>
		</tr>
        <tr>
            <td><img src="<?php echo base_url() ?>static/i/checkbox<?php if($rbs_type[0]=='Indoor') echo '_checked' ?>.jpg"> Indoor</td>
            <td><img src="<?php echo base_url() ?>static/i/checkbox<?php if($configuration_type[0]=='WCDMA') echo '_checked' ?>.jpg"> WCDMA</td>
            <td><?php echo $this->ifunction->ifnull($installed_type[0]) ?></td>
            <td><?php echo $this->ifunction->ifnull($activated_type[0]) ?></td>
            <td><?php echo $this->ifunction->ifnull($serial_type[0]) ?></td>
        </tr>
        <tr>
            <td><img src="<?php echo base_url() ?>static/i/checkbox<?php if($rbs_type[1]=='Outdoor') echo '_checked' ?>.jpg"> Outdoor</td>
            <td><?php echo $this->ifunction->ifnull($configuration_type[1]) ?></td>
            <td><?php echo $this->ifunction->ifnull($installed_type[1]) ?></td>
            <td><?php echo $this->ifunction->ifnull($activated_type[1]) ?></td>
            <td><?php echo $this->ifunction->ifnull($serial_type[1]) ?></td>
		</tr>
        </table>
    </td>
</tr>
</table><br />

<span style="font-size:11px"><i>* For Multiple Site</i></span>
<table class="border" cellpadding="0" cellspacing="0">
<tr class="header">
	<td>Site ID</td><td>Site Name</td><td>RBS Type</td><td>Configuration</td><td>Scope of Work</td><td>Remark</td>
</tr>
<?php
$Qmultiple_site = $this->db->query("SELECT `note` FROM `it_atp_forms` WHERE `atp_id`='$dx' AND `type`='multiple_site'");
if($Qmultiple_site->num_rows){
	foreach($Qmultiple_site->result_object() as $multiple_site){
		$multiplesite = explode('|', $multiple_site->note);
		echo '<tr valign="top"><td>'.$this->ifunction->ifnull($multiplesite[0]).'</td><td>'.$this->ifunction->ifnull($multiplesite[1]).'</td><td>'.$this->ifunction->ifnull($multiplesite[2]).'</td><td>'.$this->ifunction->ifnull($multiplesite[3]).'</td><td>'.$this->ifunction->ifnull($multiplesite[4]).'</td><td>'.$this->ifunction->ifnull($multiplesite[5]).'&nbsp;</td></tr>';
	}
}
else for($i=1; $i <= 4; $i++) echo '<tr><td>&nbsp;</td><td></td><td></td><td></td><td></td><td></td></tr>';
?>
</table>

<?php $Qdoc_ref = $this->db->query("SELECT `note` FROM `it_atp_forms` WHERE `atp_id`='$dx' AND `type`='doc_ref'"); $doc_ref = $Qdoc_ref->result_object() ?>
<h3>Documents reference</h3>
<table class="footer" cellpadding="0" cellspacing="0">
<tr><td width="50%">6601 Technical Product description 22/1551-LZA 701 6001 Uen AC1</td><td width="10" style="border:none"></td><td width="50%"><?php echo $this->ifunction->ifnull($doc_ref[0]->note) ?></td></tr>
</table>

<h3>OUTSTANDING ITEMS</h3>
<img src="<?php echo base_url() ?>static/i/radio<?php if($ei[0]->outstanding=='Yes') echo '_checked' ?>.jpg"> Yes <span style="padding:30px">&nbsp;</span>
<img src="<?php echo base_url() ?>static/i/radio<?php if($ei[0]->outstanding=='No') echo '_checked' ?>.jpg"> No
<p><i>(Refer details of outstanding item list on the last page)</i></p>

<b>Signature of concerned people</b>
<table class="footer" cellpadding="0" cellspacing="0" style="margin:5px 0 5px 0">
<tr valign="top">
	<td>INDOSAT<br />Name:<br />1.<br />2.</td>
    <td><br />Signature</td>
    <td>ERICSSON<br />Name:<br />1.<br />2.</td>
    <td><br />Signature</td>
</tr>
</table>

<table class="footer" cellpadding="0" cellspacing="0"><tr><td>Start date: <?php echo $this->ifunction->ifnull($time_spent[0]) ?></td><td>End date: <?php echo $this->ifunction->ifnull($time_spent[1]) ?></td><td>Time spent on site: <?php echo $this->ifunction->ifnull($time_spent[2]) ?> minutes</td></tr></table><br />

<table class="footer" cellpadding="0" cellspacing="0">
<tr><td width="80"><b>OK</b></td><td>put a cross if task performed</td></tr>
<tr><td><b>Not OK</b></td><td>put a cross if task performed is not OK</td></tr>
<tr><td><b>N/A</b></td><td>not applicable</td></tr>
<tr><td><b>Remark Major</b></td><td>Passing this test is mandatory</td></tr>
<tr><td><b>Remark Minor</b></td><td>Not service affecting but rectification is mandatory</td></tr>
</table>

<hr />

<?php $Qchapter = $this->db->query("SELECT `no_chapter`, `content` FROM `it_atp_chapter` WHERE `atp_id`='$dx' AND `chapter`='1' ORDER BY `atp_chapter_id` ASC"); foreach($Qchapter->result_object() as $chapter) $arr_chapter_1[str_replace('1.', '', $chapter->no_chapter) -1]=$chapter ?>

<h3>Acceptance Documentation</h3>
<table class="border" cellpadding="0" cellspacing="0">
<tr class="header">
	<td width="40">Chapter</td><td>Title work performed</td><td width="30">OK</td><td width="40">Not OK</td><td width="35">N/A</td><td width="90">Remark</td>
</tr>
<tr>
<td valign="top" align="center">1<br />2<br />3<br />4<br />5<br />6</td>
<td valign="top">Additional equipment/module information<br />Configuration Captured from INOC (RBS Log before & after)<br />RBS Alarm print out (before & after)<br />Inventory list (capture from RBS/moshell)<br />Photograph of new equipment/module installation<br />BoQ</td>
<td valign="top" align="center">
<?php
for($i=0; $i <= 5; $i++){
    echo '<img src="'.base_url().'static/i/radio'; if($arr_chapter_1[$i]->content=='OK') echo '_checked'; echo '.jpg"><br />';
}
?>
</td><td valign="top" align="center">
<?php
for($i=0; $i <= 5; $i++){
    echo '<img src="'.base_url().'static/i/radio'; if($arr_chapter_1[$i]->content=='Not OK') echo '_checked'; echo '.jpg"><br />';
}
?>
</td><td valign="top" align="center">
<?php
for($i=0; $i <= 5; $i++){
    echo '<img src="'.base_url().'static/i/radio'; if($arr_chapter_1[$i]->content=='N/A') echo '_checked'; echo '.jpg"><br />';
}
?>
</td><td valign="top" align="center"><?php for($i=0; $i <= 5; $i++) echo 'Major<br />' ?></td></tr>
</table>

<?php $Qsubchapter = $this->db->query("SELECT `subno_chapter`, `content` FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `chapter`='1' AND `no_chapter`='1.1' ORDER BY `subno_chapter_order` ASC"); foreach($Qsubchapter->result_object() as $subchapter) $arr_subchapter_1_1[$subchapter->subno_chapter -1]=$subchapter ?>

<h3>Chapter 1.1 Additional Module Information</h3>
<table class="border" cellpadding="0" cellspacing="0">
<tr class="header"><td>Product Name</td><td>Product Number</td><td>Serial Number</td><td>Remark</td></tr>
<?php
$arr_dt_11 = array('DUW 20/30', 'RUS/RRUS sec 1', 'RUS/RRUS sec 2', 'RUS/RRUS sec 3');
for($i=0; $i <= 3; $i++){
	$dt_subchapter_1_1 = explode('|', $arr_subchapter_1_1[$i]->content);
	echo '<tr valign="top"><td>'.$arr_dt_11[$i].'</td><td>'.$this->ifunction->ifnull($dt_subchapter_1_1[3]).'</td><td>'.$this->ifunction->ifnull($dt_subchapter_1_1[4]).'</td><td>'.$this->ifunction->ifnull($dt_subchapter_1_1[5]).'</td></tr>';
}
?>
</table><br />

<?php $Qchapter = $this->db->query("SELECT `no_chapter`, `content` FROM `it_atp_chapter` WHERE `atp_id`='$dx' AND `chapter`='2' ORDER BY `atp_chapter_id` ASC"); foreach($Qchapter->result_object() as $chapter) $arr_chapter_2[str_replace('2.', '', $chapter->no_chapter) -1]=$chapter ?>

<table class="border" cellpadding="0" cellspacing="0">
<tr class="header">
	<td width="40">Chapter</td><td>Title work performed</td><td width="30">OK</td><td width="40">Not OK</td><td width="35">N/A</td><td width="90">Remark</td>
</tr>
<tr>
<td valign="top"><b>1.2</b><br />1.2.1<br />1.2.2</td>
<td valign="top"><b>Filter Installation</b><br />Filter Equipment Identification<br />Filter Equipment Installation</td>
<td valign="top" align="center">
<?php echo '<br />';
for($i=0; $i <= 1; $i++){
    echo '<img src="'.base_url().'static/i/radio'; if($arr_chapter_2[$i]->content=='OK') echo '_checked'; echo '.jpg"><br />';
}
?>
</td><td valign="top" align="center">
<?php echo '<br />';
for($i=0; $i <= 1; $i++){
    echo '<img src="'.base_url().'static/i/radio'; if($arr_chapter_2[$i]->content=='Not OK') echo '_checked'; echo '.jpg"><br />';
}
?>
</td><td valign="top" align="center">
<?php echo '<br />';
for($i=0; $i <= 1; $i++){
    echo '<img src="'.base_url().'static/i/radio'; if($arr_chapter_2[$i]->content=='N/A') echo '_checked'; echo '.jpg"><br />';
}
?>
</td><td valign="top" align="center"><?php echo '<br />'; for($i=0; $i <= 1; $i++) echo 'Major<br />' ?></td></tr>
</table>

<?php $Qsubchapter = $this->db->query("SELECT `subno_chapter`, `content` FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `chapter`='2' AND `no_chapter`='2.1' ORDER BY `subno_chapter_order` ASC"); foreach($Qsubchapter->result_object() as $subchapter) $arr_subchapter_2_1[$subchapter->subno_chapter -1]=$subchapter ?>

<h3>Chapter 1.2.1: Filter Equipment Identification</h3>
<table class="border" cellpadding="0" cellspacing="0">
<tr class="header">
	<td width="40">Chapter</td><td width="150">Filter Type</td><td width="100">Installed</td><td>Factory Serial Number</td>
</tr>
<?php
$arr_dt_21 = array('KAELUS DDF0052F1V2-1', 'KAELUS DDF0059F1V1');
for($i=0; $i <= 1; $i++){
	$dt_subchapter_2_1 = explode('|', $arr_subchapter_2_1[$i]->content);
	echo '<tr><td valign="top">1.2.1.'.($i+1).'</td><td>'.$arr_dt_21[$i];
	echo '</td><td align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_2_1[3]=='Yes') echo '_checked'; echo '.jpg"> Yes <span style="padding:7px">&nbsp;</span> <img src="'.base_url().'static/i/radio'; if($dt_subchapter_2_1[3]=='No') echo '_checked'; echo '.jpg"> No</td>';
	echo '<td align="center">'.$this->ifunction->ifnull($dt_subchapter_2_1[4]).'</td></tr>';
}
?>
</table>

<?php $Qsubchapter = $this->db->query("SELECT `subno_chapter`, `content` FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `chapter`='2' AND `no_chapter`='2.2' ORDER BY `subno_chapter_order` ASC"); foreach($Qsubchapter->result_object() as $subchapter) $arr_subchapter_2_2[$subchapter->subno_chapter -1]=$subchapter ?>

<h3>Chapter 1.2.2 Filter Equipment Installation</h3>
<table class="border" cellpadding="0" cellspacing="0">
<tr class="header">
	<td width="40">Chapter</td><td>Title work performed</td><td width="30">OK</td><td width="40">Not OK</td><td width="35">N/A</td><td width="90">Remark</td>
</tr>
<?php
$arr_dt_22 = array('Confirm that filter is installed on each sector', 'Confirm that only approved supplier is used', 'Confirm that RF connections are correctly waterproofedn');
for($i=0; $i <= 2; $i++){
	$dt_subchapter_2_2 = explode('|', $arr_subchapter_2_2[$i]->content);
	echo '<tr><td valign="top">1.2.2.'.($i+1).'</td><td>'.$arr_dt_22[$i];
	echo '</td><td align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_2_2[3]=='OK') echo '_checked'; echo '.jpg"></td>';
	echo '<td align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_2_2[3]=='Not OK') echo '_checked'; echo '.jpg"></td>';
	echo '<td align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_2_2[3]=='N/A') echo '_checked'; echo '.jpg"></td>';
	echo '<td align="center">Major</td></tr>';
}
?>
</table>

<hr />

<p align="center"><b>Table 2<br />Note - Comments - Fault</b></p>
<table class="border" cellpadding="0" cellspacing="0">
<tr class="header"><td width="20" align="center">No</td><td align="center">Problems</td><td align="center">Cleared</td></tr>
<?php
$Qfootnote = $this->db->query("SELECT `note` FROM `it_footnote` WHERE `table`='atp' AND `idx`='$dx'");
if($Qfootnote->num_rows){
	$i = 1;
	foreach($Qfootnote->result_object() as $footnote){
		$foot_note = explode('|', $footnote->note);
		echo '<tr valign="top"><td align="center" height="50">'.$i.'</td><td>Chapter: '.$this->ifunction->ifnull($foot_note[0]).'<br />Description: '.$this->ifunction->ifnull($foot_note[3]).'</td><td>Name: '.$this->ifunction->ifnull($foot_note[1]).'<br />Date: '.$this->ifunction->ifnull($foot_note[2]).'</td></tr>';
		$i++;
	}
}
else for($i=1; $i <= 4; $i++) echo '<tr valign="top"><td align="center" height="50">'.$i.'</td><td>Chapter:<br />Description:</td><td>Name:<br />Date:</td></tr>';
?>
</table><br />

<div style="border:1px solid #000;padding:10px">
<img src="<?php echo base_url() ?>static/i/radio<?php if($atp_fl_approve == 6) echo '_checked' ?>.jpg" /> OK<br /><img src="<?php echo base_url() ?>static/i/radio.jpg" /> Not OK
<p style="font-size:11px">Note:<br />This RBS can be integrated only if there is no major remark<br />This ATP can be accepted only if there is no major remark</p>
<table cellpadding="0" cellspacing="0" style="width:600px;margin:20px auto">
<tr><td colspan="2"></td><td><?php if($msg_indosat) echo date('d F Y H:i', $indosat[0]); else echo '(date)<span style="border-bottom:1px dotted #000;padding:0 75px">&nbsp;</span>' ?></td></tr>
<tr><td>ERICSSON Representative,</td><td width="250"></td><td>Accepted and Ready Integrated by,</td></tr>
<tr><td height="70"
<?php
if($msg_supervisor){
	if($sign_supervisor) echo ' valign="middle"><img class="sign" src="'.base_url().'media/files/'.$sign_supervisor.'">'; else echo ' valign="bottom">(<span style="border-bottom:1px dotted #000;padding:0 75px">&nbsp;</span>)';
}
else echo ' valign="bottom">(<span style="border-bottom:1px dotted #000;padding:0 75px">&nbsp;</span>)' ?>
</td><td></td><td
<?php
if($msg_indosat){
	if($sign_indosat) echo ' valign="middle"><img class="sign" src="'.base_url().'media/files/'.$sign_indosat.'">'; else echo ' valign="bottom">(<span style="border-bottom:1px dotted #000;padding:0 75px">&nbsp;</span>)';
}
else echo ' valign="bottom">(<span style="border-bottom:1px dotted #000;padding:0 75px">&nbsp;</span>)' ?>
</td></tr>
<tr><td colspan="2"></td><td>NIK:<br />PT. INDOSAT</td></tr>
</table>
</div>