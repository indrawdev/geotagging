<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed') ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xml:lang="en" xmlns="http://www.w3.org/1999/xhtml" lang="en">
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
<title>ATP - ZTE 3G</title>
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

<!--table class="footer" cellpadding="0" cellspacing="0" style="margin-top:5px">
<tr><td colspan="5">Signature of Person Concerned:</td></tr>
<tr>
    <td height="40"><p>&nbsp;</p></td><td></td><td></td><td></td><td></td>
</tr>
</table-->
<table class="footer" cellpadding="0" cellspacing="0" style="margin-top:5px">
<tr><td colspan="3">Signature of Person Concerned:</td></tr>
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

<p id="logo"><img src="<?php echo base_url() ?>static/i/indosat_zte.jpg" /></p>

<h1>Acceptance Test Form<br />NODE-B 3G ZTE</h1><br /><br />
<h2>Manual version 1.0</h2>

<?php
$Qatp = $this->db->query("
					SELECT b.`id`, b.`name`, b.`address`
					FROM `it_atp` a
					LEFT JOIN `it_site` b ON b.`site_id`=a.`site_id`
					WHERE a.`atp_id`='$dx'");
					$atp = $Qatp->result_object() ?>
                    
<h3 style="margin-top:100px">Site Identification</h3>
<table class="footer" cellpadding="0" cellspacing="0"><tr>
<td valign="top" width="50%">Project Name:<p>Project Phase:</p>Region Name:</td><td valign="top">Site ID: <?php echo $atp[0]->id ?><p>Site Name: <?php echo $atp[0]->name ?></p>Site Type:</td>
</tr></table>

<hr />
<?php } if($cover == 1) die('</body></html>') ?>

<?php
$Qei1 = $this->db->query("SELECT `content` FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `chapter`='-1' AND `no_chapter`='-1.1' ORDER BY `subno_chapter_order` ASC");
$ei1 = $Qei1->result_object(); $dt_ei1 = explode('|', $ei1[0]->content);

$Qei2 = $this->db->query("SELECT `content` FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `chapter`='-2' AND `no_chapter`='-2.1' ORDER BY `subno_chapter_order` ASC");
$ei2 = $Qei2->result_object(); $dt_ei2 = explode('|', $ei2[0]->content);

$Qei3 = $this->db->query("SELECT `content` FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `chapter`='-3' AND `no_chapter`='-3.1' ORDER BY `subno_chapter_order` ASC");
foreach($Qei3->result_object() as $ei3) $arr_ei3[]=$ei3;

$dt_ei3a = explode('|', $arr_ei3[0]->content);
$dt_ei3b = explode('|', $arr_ei3[1]->content);

$Qei4 = $this->db->query("SELECT `content` FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `chapter`='-4' AND `no_chapter`='-4.1' ORDER BY `subno_chapter_order` ASC");
$ei4 = $Qei4->result_object(); $dt_ei4 = explode('|', $ei4[0]->content);

$Qei5 = $this->db->query("SELECT `content` FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `chapter`='-5' AND `no_chapter`='-5.1' ORDER BY `subno_chapter_order` ASC");
$ei5 = $Qei5->result_object(); $dt_ei5 = explode('|', $ei5[0]->content);

$Qei6 = $this->db->query("SELECT `content` FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `chapter`='-6' AND `no_chapter`='-6.1' ORDER BY `subno_chapter_order` ASC");
$ei6 = $Qei6->result_object(); $dt_ei6 = explode('|', $ei6[0]->content);

$Qei7 = $this->db->query("SELECT `content` FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `chapter`='-7' AND `no_chapter`='-7.1' ORDER BY `subno_chapter_order` ASC");
foreach($Qei7->result_object() as $ei7) $arr_ei7[]=$ei7;

$dt_ei7a = explode('|', $arr_ei7[0]->content);
$dt_ei7b = explode('|', $arr_ei7[1]->content);
$dt_ei7c = explode('|', $arr_ei7[2]->content);

$Qei8 = $this->db->query("SELECT `content` FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `chapter`='-8' AND `no_chapter`='-8.1' ORDER BY `subno_chapter_order` ASC");
$ei8 = $Qei8->result_object(); $dt_ei8 = explode('|', $ei8[0]->content);

$Qei9 = $this->db->query("SELECT `content` FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `chapter`='-9' AND `no_chapter`='-9.1' ORDER BY `subno_chapter_order` ASC");
foreach($Qei9->result_object() as $ei9) $arr_ei9[]=$ei9;

$dt_ei9a = explode('|', $arr_ei9[0]->content);
$dt_ei9b = explode('|', $arr_ei9[1]->content);

$Qei10 = $this->db->query("SELECT `content` FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `chapter`='-10' AND `no_chapter`='-10.1' ORDER BY `subno_chapter_order` ASC");
$ei10 = $Qei10->result_object(); $dt_ei10 = explode('|', $ei10[0]->content);

?>
<h3>Equipment Identification</h3>
<table cellpadding="0" cellspacing="0">
<tr valign="top">
	<td width="100">Node-B Type</td><td align="center" width="10">:</td>
    <td>
    <img src="<?php echo base_url() ?>static/i/checkbox<?php if($dt_ei1[3]=='true') echo '_checked' ?>.jpg">
    <span style="padding:0 15px">&nbsp;</span>
    <img src="<?php echo base_url() ?>static/i/checkbox<?php if($dt_ei1[4]=='true') echo '_checked' ?>.jpg">
    <span style="padding:0 15px">&nbsp;</span>
    <img src="<?php echo base_url() ?>static/i/checkbox<?php if($dt_ei2[3]=='true') echo '_checked' ?>.jpg">
    </td>
</tr>
<tr valign="top">
	<td><br />Node-B Configuration</td><td align="center"><br />:</td>
    <td>
    	<br />
        <table class="border" cellpadding="0" cellspacing="0">
        <tr class="header">
        	<td>Installed</td><td>Activated</td><td>Factory Serial Number</td>
		</tr>
        <tr>
            <td><?php echo $this->ifunction->ifnull($dt_ei3a[3]) ?></td>
            <td><?php echo $this->ifunction->ifnull($dt_ei3a[4]) ?></td>
            <td><?php echo $this->ifunction->ifnull($dt_ei3a[5]) ?>&nbsp;</td>
        </tr>
        <tr>
            <td><?php echo $this->ifunction->ifnull($dt_ei3b[3]) ?></td>
            <td><?php echo $this->ifunction->ifnull($dt_ei3b[4]) ?></td>
            <td><?php echo $this->ifunction->ifnull($dt_ei3b[5]) ?>&nbsp;</td>
        </tr>
        </table>
        <br />
    </td>
</tr>
<tr valign="top">
	<td>Number of Cabinet</td><td align="center">:</td><td><?php //echo $this->ifunction->ifnull($ei[0]->identification_no_cabinet) ?></td>
</tr>
<tr valign="top">
	<td>IP Address</td><td align="center">:</td><td><?php echo $this->ifunction->ifnull($dt_ei4[3]) ?></td>
</tr>
<tr valign="top">
	<td>Sites Profile</td><td align="center">:</td>
    <td>
    <img src="<?php echo base_url() ?>static/i/checkbox<?php if($dt_ei5[3]=='true') echo '_checked' ?>.jpg"> New Site
    <span style="padding:0 15px">&nbsp;</span>
    <img src="<?php echo base_url() ?>static/i/checkbox<?php if($dt_ei5[4]=='true') echo '_checked' ?>.jpg"> Collocated (GSM & CDMA)
    <span style="padding:0 15px">&nbsp;</span>
    <img src="<?php echo base_url() ?>static/i/checkbox<?php if($dt_ei5[5]=='true') echo '_checked' ?>.jpg"> Collocated (GSM & DCS)
    </td>
</tr>
<tr valign="top">
	<td>Node-B Topology</td><td align="center">:</td>
    <td>
    <img src="<?php echo base_url() ?>static/i/checkbox<?php if($dt_ei6[3]=='true') echo '_checked' ?>.jpg"> Hub Node-B
    <span style="padding:0 15px">&nbsp;</span>
    <img src="<?php echo base_url() ?>static/i/checkbox<?php if($dt_ei6[4]=='true') echo '_checked' ?>.jpg"> End Node-B
    </td>
</tr>
</table>

<h3>Documents reference</h3>
<table class="footer" cellpadding="0" cellspacing="0">
<tr><td>Document</td><td width="10" style="border:none"></td><td>Document</td></tr>
<tr><td><?php echo $this->ifunction->ifnull($dt_ei7a[3]) ?></td><td style="border:none"></td><td><?php echo $this->ifunction->ifnull($dt_ei7a[4]) ?>&nbsp;</td></tr>
<tr><td><?php echo $this->ifunction->ifnull($dt_ei7b[3]) ?></td><td style="border:none"></td><td><?php echo $this->ifunction->ifnull($dt_ei7b[4]) ?>&nbsp;</td></tr>
<tr><td><?php echo $this->ifunction->ifnull($dt_ei7c[3]) ?></td><td style="border:none"></td><td><?php echo $this->ifunction->ifnull($dt_ei7c[4]) ?>&nbsp;</td></tr>
</table>

<h3>OUTSTANDING ITEMS</h3>
<img src="<?php echo base_url() ?>static/i/radio<?php if($dt_ei8[3]=='true') echo '_checked' ?>.jpg"> Yes <span style="padding:30px">&nbsp;</span>
<img src="<?php echo base_url() ?>static/i/radio<?php if($dt_ei8[4]=='true') echo '_checked' ?>.jpg"> No
<p><i>(Refer details of outstanding item list on the last page)</i></p>

<h3>Signature of concerned people</h3>
<table class="footer" cellpadding="0" cellspacing="0" style="margin:5px 0 0 0">
<tr valign="top">
	<td>INDOSAT<br />Name:<br />1. <?php echo $this->ifunction->ifnull($dt_ei9a[3]) ?><br />2. <?php echo $this->ifunction->ifnull($dt_ei9b[3]) ?></td>
    <td><br />Signature</td>
    <td>ERICSSON<br />Name:<br />1. <?php echo $this->ifunction->ifnull($dt_ei9a[5]) ?><br />2. <?php echo $this->ifunction->ifnull($dt_ei9b[5]) ?></td>
    <td><br />Signature</td>
</tr>
</table>

<table class="footer" cellpadding="0" cellspacing="0" style="margin:10px 0"><tr><td>Start date: <?php echo $this->ifunction->ifnull($dt_ei10[3]) ?></td><td>End date: <?php echo $this->ifunction->ifnull($dt_ei10[4]) ?></td><td>Time spent on site: <?php echo $this->ifunction->ifnull($dt_ei10[5]) ?></td></tr></table>

<table class="footer" cellpadding="0" cellspacing="0">
<tr><td width="80"><b>OK</b></td><td>put a cross if task performed</td></tr>
<tr><td><b>Not OK</b></td><td>put a cross if task performed is not OK</td></tr>
<tr><td><b>N/A</b></td><td>not applicable</td></tr>
<tr><td><b>Remark Major</b></td><td>Passing this test is mandatory</td></tr>
<tr><td><b>Remark Minor</b></td><td>Not service affecting but rectification is mandatory</td></tr>
</table>

<hr />

<?php $Qchapter = $this->db->query("SELECT `content` FROM `it_atp_chapter` WHERE `atp_id`='$dx' AND `chapter`='1' ORDER BY `atp_chapter_id` ASC"); foreach($Qchapter->result_object() as $chapter) $arr_chapter_1[]=$chapter ?>

<h3>A. Preliminary checks</h3>
<table class="border" cellpadding="0" cellspacing="0">
<tr class="header"><td width="40">Chapter</td><td>Title work performed</td><td width="30">OK</td><td width="40">Not OK</td><td width="35">N/A</td><td width="90">Remark</td></tr>
<tr><td valign="top"><b>1</b><br />1.1<br /><br />1.2<br />1.3<br />1.4</td><td valign="top"><b>Preliminary site checks</b><br />&bull; CME Site Acceptance has been approved<br />&nbsp; (the document must be attached)<br />&bull; Site documentation must be available<br />&bull; Commissioning check list should be attached<br />&bull; Link Transmission Preparation already done</td>
<td valign="top" align="center">
<?php echo '<br />';
for($i=0; $i <= 3; $i++){
    echo '<img src="'.base_url().'static/i/radio'; if($arr_chapter_1[$i]->content=='OK') echo '_checked'; echo '.jpg"><br />';
    if(($i==0)||($i==4)||($i==6)) echo '<br />';
}
?>
</td><td valign="top" align="center">
<?php echo '<br />';
for($i=0; $i <= 3; $i++){
    echo '<img src="'.base_url().'static/i/radio'; if($arr_chapter_1[$i]->content=='Not OK') echo '_checked'; echo '.jpg"><br />';
    if(($i==0)||($i==4)||($i==6)) echo '<br />';
}
?>
</td><td valign="top" align="center">
<?php echo '<br />';
for($i=0; $i <= 3; $i++){
    echo '<img src="'.base_url().'static/i/radio'; if($arr_chapter_1[$i]->content=='N/A') echo '_checked'; echo '.jpg"><br />';
    if(($i==0)||($i==4)||($i==6)) echo '<br />';
}
?>
</td><td valign="top" align="center">
<?php echo '<br />';
for($i=0; $i <= 3; $i++){
    if($i==1) echo 'Minor<br />'; else echo 'Major<br />';
    if(($i==0)||($i==4)||($i==6)) echo '<br />';
}
?>
</td></tr>
</table>

<?php $Qchapter = $this->db->query("SELECT `content` FROM `it_atp_chapter` WHERE `atp_id`='$dx' AND `chapter`='2' ORDER BY `atp_chapter_id` ASC"); foreach($Qchapter->result_object() as $chapter) $arr_chapter_2[]=$chapter ?>

<table class="border" cellpadding="0" cellspacing="0">
<tr><td valign="top" width="40"><b>2</b></td><td valign="top"><b>Checking HW configuration visually</b><br />(Compare with equipment order list attachment which is  based on  Site Documentation, NDB/CDD or Planning recommendation)</td>
<td valign="top" width="30" align="center"><br /><img src="<?php echo base_url() ?>static/i/radio<?php if($arr_chapter_2[0]->content=='OK') echo '_checked' ?>.jpg"></td>
<td valign="top" width="40" align="center"><br /><img src="<?php echo base_url() ?>static/i/radio<?php if($arr_chapter_2[0]->content=='Not OK') echo '_checked' ?>.jpg"></td>
<td valign="top" width="35" align="center"><br /><img src="<?php echo base_url() ?>static/i/radio<?php if($arr_chapter_2[0]->content=='N/A') echo '_checked' ?>.jpg"></td>
<td valign="top" width="90" align="center"><br />Major</td></tr></table>

<?php $Qchapter = $this->db->query("SELECT `content` FROM `it_atp_chapter` WHERE `atp_id`='$dx' AND `chapter`='3' ORDER BY `atp_chapter_id` ASC"); foreach($Qchapter->result_object() as $chapter) $arr_chapter_3[]=$chapter ?>

<table class="border" cellpadding="0" cellspacing="0">
<tr><td width="40" valign="top"><b>3</b><br />3.1<br />3.2<br />3.3<br />3.4<br />3.5<br />3.6</td><td valign="top"><b>Checking on labelling</b><br />&bull; Check label module (serial number, technical status)<br />&bull; Check NODE B rack label<br />&bull; Check DDF label (end to end site)<br />&bull; Check power supply label<br />&bull; Check feeder cable label (for antenna sector)<br />&bull; Check Antenna label</td>
<td valign="top" width="30" align="center">
<?php echo '<br />';
for($i=0; $i <= 5; $i++){
	echo '<img src="'.base_url().'static/i/radio'; if($arr_chapter_3[$i]->content=='OK') echo '_checked'; echo '.jpg"><br />';
}
?>
</td><td valign="top" width="40" align="center">
<?php echo '<br />';
for($i=0; $i <= 5; $i++){
	echo '<img src="'.base_url().'static/i/radio'; if($arr_chapter_3[$i]->content=='Not OK') echo '_checked'; echo '.jpg"><br />';
}
?>
</td><td valign="top" width="35" align="center">
<?php echo '<br />';
for($i=0; $i <= 5; $i++){
	echo '<img src="'.base_url().'static/i/radio'; if($arr_chapter_3[$i]->content=='N/A') echo '_checked'; echo '.jpg"><br />';
}
?>
</td><td valign="top" width="90" align="center">
<?php echo '<br />';
for($i=0; $i <= 5; $i++){
	if(($i==0)||($i==1)||($i==3)) echo 'Minor<br />'; else echo 'Major<br />';
}
?>
</td></tr>
</table>

<?php $Qchapter = $this->db->query("SELECT `content` FROM `it_atp_chapter` WHERE `atp_id`='$dx' AND `chapter`='4' ORDER BY `atp_chapter_id` ASC"); foreach($Qchapter->result_object() as $chapter) $arr_chapter_4[]=$chapter ?>

<table class="border" cellpadding="0" cellspacing="0">
<tr><td valign="top" width="40"><b>4</b></td><td valign="top"><b>Checking grounding integration (visual checking)</b><br />Grounding NODE B (proper connection and integration)</td>
<td valign="top" width="30" align="center"><br /><img src="<?php echo base_url() ?>static/i/radio<?php if($arr_chapter_4[0]->content=='OK') echo '_checked' ?>.jpg"></td>
<td valign="top" width="40" align="center"><br /><img src="<?php echo base_url() ?>static/i/radio<?php if($arr_chapter_4[0]->content=='Not OK') echo '_checked' ?>.jpg"></td>
<td valign="top" width="35" align="center"><br /><img src="<?php echo base_url() ?>static/i/radio<?php if($arr_chapter_4[0]->content=='N/A') echo '_checked' ?>.jpg"></td>
<td valign="top" width="90" align="center"><br />Major</td></tr></table>

<?php $Qchapter = $this->db->query("SELECT `content` FROM `it_atp_chapter` WHERE `atp_id`='$dx' AND `chapter`='5' ORDER BY `atp_chapter_id` ASC"); foreach($Qchapter->result_object() as $chapter) $arr_chapter_5[]=$chapter ?>

<table class="border" cellpadding="0" cellspacing="0">
<tr><td width="40" valign="top"><b>5</b><br />5.1<br />5.2<br />5.3<br />5.4<br />5.5</td><td valign="top"><b>Powers Supply Measurement</b><br />Measurement AC Power Line (L1/L2/L3)<br />Measurement NODE B Input Power / Cabinet Voltage<br />Measurement AC/DC Power Input PDU NODE B<br />Measurement DC Power Output PDU NODE B<br />Checking NODE B Panel Circuit Breaker (AC / DC)</td>
<td valign="top" width="30" align="center">
<?php echo '<br />';
for($i=0; $i <= 4; $i++){
	echo '<img src="'.base_url().'static/i/radio'; if($arr_chapter_5[$i]->content=='OK') echo '_checked'; echo '.jpg"><br />';
}
?>
</td><td valign="top" width="40" align="center">
<?php echo '<br />';
for($i=0; $i <= 4; $i++){
	echo '<img src="'.base_url().'static/i/radio'; if($arr_chapter_5[$i]->content=='Not OK') echo '_checked'; echo '.jpg"><br />';
}
?>
</td><td valign="top" width="35" align="center">
<?php echo '<br />';
for($i=0; $i <= 4; $i++){
	echo '<img src="'.base_url().'static/i/radio'; if($arr_chapter_5[$i]->content=='N/A') echo '_checked'; echo '.jpg"><br />';
}
?>
</td><td valign="top" width="90" align="center"><?php echo '<br />'; for($i=0; $i <= 4; $i++) echo 'Major<br />' ?></td></tr>
</table>

<h3>TABLE 1: Voltage NODE B Specifications</h3>
<table class="border" cellpadding="0" cellspacing="0">
<tr class="header">
    <td>Point of Voltage Measurement</td>
    <td>Nominal Voltages</td>
    <td>Specification</td>
</tr>
<tr>
    <td>AC POWER LINE</td>
    <td align="center">220 Vac</td>
    <td align="center">115 Vac - 250 Vac (<sup>2</sup>)</td>
</tr>
<tr>
    <td>AC V Input PSU NODE B</td>
    <td align="center">220 Vac</td>
    <td></td>
</tr>
<tr>
    <td>DC V input PDF NODE B</td>
    <td align="center">- 48 Vdc</td>
    <td align="center">(-40 Vdc) - (-48 Vdc)</td>
</tr>
<tr>
    <td>DC V Output PDF NODE B</td>
    <td align="center">- 48Vdc</td>
    <td align="center">(-40 Vdc) - (-48 Vdc)</td>
</tr>
</table>
<p style="font-size:11px"><i>Note: All Voltage measurement must refer to Table 1 (Voltage NODE B Specification)</i></p>

<hr />

<?php $Qsubchapter = $this->db->query("SELECT `content` FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `chapter`='5' AND `no_chapter`='5.1' ORDER BY `subno_chapter_order` ASC"); foreach($Qsubchapter->result_object() as $subchapter) $arr_subchapter_5_1[]=$subchapter;
$dt_subchapter_5_1 = explode('|', $arr_subchapter_5_1[0]->content) ?>

<h3>Chapter: 5.1: Measurement AC Power Line (L1/L2/L3)</h3>
<table class="border" cellpadding="0" cellspacing="0">
<tr class="header"><td>Test Item</td><td>Phase L1 to Neutral</td><td>Phase L2 to Neutral</td><td>Phase L3 to Neutral</td><td>Neutral to Ground < 3 VAC)</td><td>Remark</td></tr>
<tr><td>AC POWER LINE</td><td><?php echo $this->ifunction->ifnull($dt_subchapter_5_1[3]) ?></td><td><?php echo $this->ifunction->ifnull($dt_subchapter_5_1[4]) ?></td><td><?php echo $this->ifunction->ifnull($dt_subchapter_5_1[5]) ?></td><td><?php echo $this->ifunction->ifnull($dt_subchapter_5_1[6]) ?></td><td><?php echo $this->ifunction->ifnull($dt_subchapter_5_1[7]) ?></td></tr></table>

<?php $Qsubchapter = $this->db->query("SELECT `content` FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `chapter`='5' AND `no_chapter`='5.2' ORDER BY `subno_chapter_order` ASC"); foreach($Qsubchapter->result_object() as $subchapter) $arr_subchapter_5_2[]=$subchapter;
$dt_subchapter_5_2 = explode('|', $arr_subchapter_5_2[0]->content) ?>

<h3>Chapter: 5.2: Measurement NODE B Input Power/ Cabinet Voltage</h3>
<table class="border" cellpadding="0" cellspacing="0">
<tr class="header"><td>DC V Input NODE B  (Input DC power NODE B from Rectifier/ PDU to NODE B test Point)</td><td>Vdc (Volt)</td><td>Chassis to Ground<br />( &lt; 1 VDC)</td><td width="30">OK</td><td width="40">Not OK</td><td width="35">N/A</td><td>Remark</td></tr>
<tr><td>Cabinet 1</td><td><?php echo $this->ifunction->ifnull($dt_subchapter_5_2[5]) ?></td><td><?php echo $this->ifunction->ifnull($dt_subchapter_5_2[4]) ?></td><td align="center"><img src="<?php echo base_url() ?>static/i/radio<?php if($dt_subchapter_5_2[3]=='OK') echo '_checked' ?>.jpg"></td><td align="center"><img src="<?php echo base_url() ?>static/i/radio<?php if($dt_subchapter_5_2[3]=='Not OK') echo '_checked' ?>.jpg"></td><td align="center"><img src="<?php echo base_url() ?>static/i/radio<?php if($dt_subchapter_5_2[3]=='N/A') echo '_checked' ?>.jpg"></td><td><?php echo $this->ifunction->ifnull($dt_subchapter_5_2[6]) ?></td></tr>
</table>

<?php $Qsubchapter = $this->db->query("SELECT `content` FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `chapter`='5' AND `no_chapter`='5.3' ORDER BY `subno_chapter_order` ASC"); foreach($Qsubchapter->result_object() as $subchapter) $arr_subchapter_5_3[]=$subchapter;
$dt_subchapter_5_3 = explode('|', $arr_subchapter_5_3[0]->content) ?>

<h3>Chapter: 5.3 Measurement DC Power Input PDU NODE B</h3>
<table class="border" cellpadding="0" cellspacing="0">
<tr class="header"><td>DC V Input PDU NODE B / (Cabinet 1)</td><td>Vdc (Volt)</td><td>Vac (Volt)</td><td width="30">OK</td><td width="40">Not OK</td><td width="35">N/A</td><td>Remark</td></tr>
<tr><td>Input Voltage PDU</td><td><?php echo $this->ifunction->ifnull($dt_subchapter_5_3[5]) ?></td><td><?php echo $this->ifunction->ifnull($dt_subchapter_5_3[4]) ?></td><td align="center"><img src="<?php echo base_url() ?>static/i/radio<?php if($dt_subchapter_5_3[3]=='OK') echo '_checked' ?>.jpg"></td><td align="center"><img src="<?php echo base_url() ?>static/i/radio<?php if($dt_subchapter_5_3[3]=='Not OK') echo '_checked' ?>.jpg"></td><td align="center"><img src="<?php echo base_url() ?>static/i/radio<?php if($dt_subchapter_5_3[3]=='N/A') echo '_checked' ?>.jpg"></td><td><?php echo $this->ifunction->ifnull($dt_subchapter_5_3[6]) ?></td></tr>
</table>

<?php $Qsubchapter = $this->db->query("SELECT `content` FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `chapter`='5' AND `no_chapter`='5.4' ORDER BY `subno_chapter_order` ASC"); foreach($Qsubchapter->result_object() as $subchapter) $arr_subchapter_5_4[]=$subchapter;
$dt_subchapter_5_4 = explode('|', $arr_subchapter_5_4[0]->content) ?>

<h3>Chapter: 5.4: Measurement DC Power Output PSU NODE B</h3>
<table class="border" cellpadding="0" cellspacing="0">
<tr class="header"><td>DC Power Output PSU NODE B</td><td>Vdc (Volt)</td><td>Vac (Volt)</td><td width="30">OK</td><td width="40">Not OK</td><td width="35">N/A</td><td>Remark</td></tr>
<tr><td>Input Voltage PSU</td><td><?php echo $this->ifunction->ifnull($dt_subchapter_5_4[5]) ?></td><td><?php $this->ifunction->ifnull($dt_subchapter_5_4[4]) ?></td><td align="center"><img src="<?php echo base_url() ?>static/i/radio<?php if($dt_subchapter_5_4[3]=='OK') echo '_checked' ?>.jpg"></td><td align="center"><img src="<?php echo base_url() ?>static/i/radio<?php if($dt_subchapter_5_4[3]=='Not OK') echo '_checked' ?>.jpg"></td><td align="center"><img src="<?php echo base_url() ?>static/i/radio<?php if($dt_subchapter_5_4[3]=='N/A') echo '_checked' ?>.jpg"></td><td><?php echo $this->ifunction->ifnull($dt_subchapter_5_4[6]) ?></td></tr>
</table>

<?php $Qsubchapter = $this->db->query("SELECT `content` FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `chapter`='5' AND `no_chapter`='5.5' ORDER BY `subno_chapter_order` ASC"); foreach($Qsubchapter->result_object() as $subchapter) $arr_subchapter_5_5[]=$subchapter ?>

<h3>Chapter: 5.5: Checking NODE B Panel Circuit Breaker (AC & DC)</h3>
<table class="border" cellpadding="0" cellspacing="0">
<tr class="header"><td>Function Test</td><td width="30">OK</td><td width="40">Not OK</td><td width="35">N/A</td><td>Remark</td></tr>
<?php
$arr_dt_55 = array('AC', 'DC', 'Main', 'Battery');
for($i=0; $i <= 3; $i++){
	$dt_subchapter_5_5 = explode('|', $arr_subchapter_5_5[$i]->content);
	echo '<tr><td>'.$arr_dt_55[$i].' Circuit Breaker</td>';
	echo '<td align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_5_5[3]=='OK') echo '_checked'; echo '.jpg"></td>';
	echo '<td align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_5_5[3]=='Not OK') echo '_checked'; echo '.jpg"></td>';
	echo '<td align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_5_5[3]=='N/A') echo '_checked'; echo '.jpg"></td>';
	echo '<td>'.$this->ifunction->ifnull($dt_subchapter_5_5[4]).'</td></tr>';
}
?>
</table>

<hr />

<?php $Qchapter = $this->db->query("SELECT `content` FROM `it_atp_chapter` WHERE `atp_id`='$dx' AND `chapter`='6' ORDER BY `atp_chapter_id` ASC"); foreach($Qchapter->result_object() as $chapter) $arr_chapter_6[]=$chapter ?>

<h3>B. Preparing NODE B for Standalone test</h3>
<table class="border" cellpadding="0" cellspacing="0">
<tr class="header"><td width="40">Chapter</td><td>Title work performed</td><td width="30">OK</td><td width="40">Not OK</td><td width="35">N/A</td><td width="90">Remark</td></tr>
<tr><td valign="top"><b>6</b><br />6.1<br />6.2</td><td valign="top"><b>NODE B, RNC and Setting Parameter</b><br />NODE B and RNC Information Database<br />NODE B Cell Parameter</td>
<td valign="top" align="center">
<?php echo '<br />';
for($i=0; $i <= 1; $i++){
	echo '<img src="'.base_url().'static/i/radio'; if($arr_chapter_6[$i]->content=='OK') echo '_checked'; echo '.jpg"><br />';
}
?>
</td><td valign="top" align="center">
<?php echo '<br />';
for($i=0; $i <= 1; $i++){
	echo '<img src="'.base_url().'static/i/radio'; if($arr_chapter_6[$i]->content=='Not OK') echo '_checked'; echo '.jpg"><br />';
}
?>
</td><td valign="top" align="center">
<?php echo '<br />';
for($i=0; $i <= 1; $i++){
	echo '<img src="'.base_url().'static/i/radio'; if($arr_chapter_6[$i]->content=='N/A') echo '_checked'; echo '.jpg"><br />';
}
?>
</td><td valign="top" align="center"><?php echo '<br />'; for($i=0; $i <= 1; $i++) echo 'Major<br />' ?></td></tr>
</table>

<?php $Qsubchapter = $this->db->query("SELECT `content` FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `chapter`='6' AND `no_chapter`='6.1' ORDER BY `subno_chapter_order` ASC"); foreach($Qsubchapter->result_object() as $subchapter) $arr_subchapter_6_1a[]=$subchapter ?>

<h3>Chapter 6.1: NODE B, RNC Information Database</h3>
<table class="border" cellpadding="0" cellspacing="0">
<tr class="header"><td>Parameter</td><td>RNC</td><td>NODE B</td></tr>
<?php
$arr_dt_61 = array('Node Name', 'Routing Area Code', 'Location Area Code', 'Service Area Code', 'O&M Link (IP Address)', 'E1-Board Port/SA board', 'Transmission Capacity');
for($i=0; $i <= 6; $i++){
	$arr_subchapter_6_1 = explode('|', $arr_subchapter_6_1a[$i]->content);
	echo '<tr><td>'.$arr_dt_61[$i].'</td>';
	echo '<td>'.$this->ifunction->ifnull($arr_subchapter_6_1[3]).'</td>';
	echo '<td>'.$this->ifunction->ifnull($arr_subchapter_6_1[4]).'</td></tr>';
}
?>
</table>
<p style="font-size:11px">* Input / Output</p>

<?php $Qsubchapter = $this->db->query("SELECT `content` FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `chapter`='6' AND `no_chapter`='6.2' ORDER BY `subno_chapter_order` ASC"); foreach($Qsubchapter->result_object() as $subchapter) $arr_subchapter_6_2a[]=$subchapter ?>

<h3>Chapter 6.2: NODE B Cell Parameter</h3>
<table class="border" cellpadding="0" cellspacing="0">
<tr class="header">
    <td>Parameter</td>
    <td>Sector 1</td>
    <td>Sector 2</td>
    <td>Sector 3</td>
    <td>Remark</td>
</tr>
<?php
$arr_dt_62 = array('SAC', 'CELL ID', 'Primary Scrambling Code (PSC)', 'Adjacent Cell PSC');
for($i=0; $i <= 3; $i++){
    $arr_subchapter_6_2 = explode('|', $arr_subchapter_6_2a[$i]->content);
    echo '<tr><td>'.$arr_dt_62[$i].'</td>';
    echo '<td>'.$this->ifunction->ifnull($arr_subchapter_6_2[3]).'</td>';
    echo '<td>'.$this->ifunction->ifnull($arr_subchapter_6_2[4]).'</td>';
    echo '<td>'.$this->ifunction->ifnull($arr_subchapter_6_2[5]).'</td>';
    echo '<td>'.$this->ifunction->ifnull($arr_subchapter_6_2[6]).'</td></tr>';
}
?>
</table>
<p style="font-size:11px"><i>Note: PSC probably change after Radio Network Optimization</i></p>

<?php $Qchapter = $this->db->query("SELECT `content` FROM `it_atp_chapter` WHERE `atp_id`='$dx' AND `chapter`='7' ORDER BY `atp_chapter_id` ASC"); foreach($Qchapter->result_object() as $chapter) $arr_chapter_7[]=$chapter ?>

<table class="border" cellpadding="0" cellspacing="0">
<tr class="header"><td width="40">Chapter</td><td>Title work performed</td><td width="30">OK</td><td width="40">Not OK</td><td width="35">N/A</td><td width="90">Remark</td></tr>
<tr><td valign="top"><b>7</b><br /><br />7.1<br />7.2<br />7.3<br />7.4<br />7.5<br />7.6 </td><td valign="top"><b>Verify NODE B Local Cell</b><br />(On line Test, check if the local cell active)<br />Check NODE B Local Cell-1<br />Check NODE B Local Cell-2<br />Check NODE B Local Cell-3<br />Check NODE B Local Cell-4<br />Check NODE B Local Cell-5<br />Check NODE B Local Cell-6</td>
<td valign="top" align="center">
<?php echo '<br /><br />';
for($i=0; $i <= 5; $i++){
    echo '<img src="'.base_url().'static/i/radio'; if($arr_chapter_7[$i]->content=='OK') echo '_checked'; echo '.jpg"><br />';
}
?>
</td><td valign="top" align="center">
<?php echo '<br /><br />';
for($i=0; $i <= 5; $i++){
    echo '<img src="'.base_url().'static/i/radio'; if($arr_chapter_7[$i]->content=='Not OK') echo '_checked'; echo '.jpg"><br />';
}
?>
</td><td valign="top" align="center">
<?php echo '<br /><br />';
for($i=0; $i <= 5; $i++){
    echo '<img src="'.base_url().'static/i/radio'; if($arr_chapter_7[$i]->content=='N/A') echo '_checked'; echo '.jpg"><br />';
}
?>
</td><td valign="top" align="center"><?php echo '<br /><br />'; for($i=0; $i <= 5; $i++) echo 'Major<br />' ?></td></tr>
</table>
<p style="font-size:11px"><i>Note: Capture data must be attached</i></p>

<hr />

<?php $Qchapter = $this->db->query("SELECT `content` FROM `it_atp_chapter` WHERE `atp_id`='$dx' AND `chapter`='8' ORDER BY `atp_chapter_id` ASC"); foreach($Qchapter->result_object() as $chapter) $arr_chapter_8[]=$chapter ?>

<table class="border" cellpadding="0" cellspacing="0">
<tr class="header"><td width="40">Chapter</td><td>Title work performed</td><td width="30">OK</td><td width="40">Not OK</td><td width="35">N/A</td><td width="90">Remark</td></tr>
<tr><td valign="top"><b>8</b><br />8.1<br />8.2<br /><br />8.3<br />8.4</td><td valign="top"><b>Verify IP Node B Status</b><br />IP over ATM (AAL1 and AAL2)<br />Verify NODE B Restart (the Version before and after should be same)<br />Operation Mode (Software Version of backup NMPT if available)<br />Verify LED STATUS</td>
<td valign="top" align="center">
<?php echo '<br />';
for($i=0; $i <= 3; $i++){
    echo '<img src="'.base_url().'static/i/radio'; if($arr_chapter_8[$i]->content=='OK') echo '_checked'; echo '.jpg"><br />';
    if($i==1) echo '<br />';
}
?>
</td><td valign="top" align="center">
<?php echo '<br />';
for($i=0; $i <= 3; $i++){
    echo '<img src="'.base_url().'static/i/radio'; if($arr_chapter_8[$i]->content=='Not OK') echo '_checked'; echo '.jpg"><br />';
    if($i==1) echo '<br />';
}
?>
</td><td valign="top" align="center">
<?php echo '<br />';
for($i=0; $i <= 3; $i++){
    echo '<img src="'.base_url().'static/i/radio'; if($arr_chapter_8[$i]->content=='N/A') echo '_checked'; echo '.jpg"><br />';
    if($i==1) echo '<br />';
}
?>
</td><td valign="top" align="center">
<?php echo '<br />';
for($i=0; $i <= 3; $i++){
    echo 'Major<br />';
    if($i==1) echo '<br />';
}
?>
</td></tr>
</table>

<?php $Qsubchapter = $this->db->query("SELECT `content` FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `chapter`='8' AND `no_chapter`='8.4' ORDER BY `subno_chapter_order` ASC"); foreach($Qsubchapter->result_object() as $subchapter) $arr_subchapter_8_4a[]=$subchapter ?>

<h3>Chapter 8.4: Verify LED STATUS (Connected to RNC)</h3>
<table class="border" cellpadding="0" cellspacing="0">
<tr class="header">
    <td width="40">Unit</td>
    <td>Green LED</td>
    <td>Red LED</td>
    <td>Yellow LED</td>
    <td width="30">OK</td>
    <td width="40">Not OK</td>
    <td width="35">N/A</td>
    <td width="90">Remark</td>
</tr>
<?php
$arr_dt_84 = array('CC', 'BPC', 'SA', 'FS', 'RSU', 'PW');
for($i=0; $i <= 4; $i++){
    $arr_subchapter_8_4 = explode('|', $arr_subchapter_8_4a[$i]->content);
    echo '<tr><td valign="top" align="center">'.$arr_dt_84[$i].'</td>';
    echo '<td>'.$this->ifunction->ifnull($arr_subchapter_8_4[4]).'</td>';
    echo '<td>'.$this->ifunction->ifnull($arr_subchapter_8_4[5]).'</td>';
    echo '<td>'.$this->ifunction->ifnull($arr_subchapter_8_4[6]).'</td>';
    echo '<td align="center"><img src="'.base_url().'static/i/radio'; if($arr_subchapter_8_4[3]=='OK') echo '_checked'; echo '.jpg"></td>';
    echo '<td align="center"><img src="'.base_url().'static/i/radio'; if($arr_subchapter_8_4[3]=='Not OK') echo '_checked'; echo '.jpg"></td>';
    echo '<td align="center"><img src="'.base_url().'static/i/radio'; if($arr_subchapter_8_4[3]=='N/A') echo '_checked'; echo '.jpg"></td>';
    echo '<td>'.$this->ifunction->ifnull($arr_subchapter_8_4[7]).'</td></tr>';
}
?>
</table><br />

<?php $Qchapter = $this->db->query("SELECT `content` FROM `it_atp_chapter` WHERE `atp_id`='$dx' AND `chapter`='9' ORDER BY `atp_chapter_id` ASC"); foreach($Qchapter->result_object() as $chapter) $arr_chapter_9[]=$chapter ?>

<table class="border" cellpadding="0" cellspacing="0">
<tr class="header"><td width="40">Chapter</td><td>Title work performed</td><td width="30">OK</td><td width="40">Not OK</td><td width="35">N/A</td><td width="90">Remark</td></tr>
<tr><td valign="top"><b>9</b><br />9.1<br />9.2<br />9.3<br />9.4<br />9.5<br />9.6<br />9.7</td><td valign="top"><b>Antenna System Inventory Check</b><br />Equipment quantity Check (see table 5)<br />Antenna Table (see table 6)<br />Connector Type (see table 7)<br />Remote Electrical Tilt (RET) <br />Feeder Cable (see table 8)<br />Top Jumper (see table 9)<br />Bottom Jumper (see table 10)</td>
<td valign="top" align="center">
<?php echo '<br />';
for($i=0; $i <= 6; $i++){
    echo '<img src="'.base_url().'static/i/radio'; if($arr_chapter_9[$i]->content=='OK') echo '_checked'; echo '.jpg"><br />';
}
?>
</td><td valign="top" align="center">
<?php echo '<br />';
for($i=0; $i <= 6; $i++){
    echo '<img src="'.base_url().'static/i/radio'; if($arr_chapter_9[$i]->content=='Not OK') echo '_checked'; echo '.jpg"><br />';
}
?>
</td><td valign="top" align="center">
<?php echo '<br />';
for($i=0; $i <= 6; $i++){
    echo '<img src="'.base_url().'static/i/radio'; if($arr_chapter_9[$i]->content=='N/A') echo '_checked'; echo '.jpg"><br />';
}
?>
</td><td valign="top" align="center"><?php echo '<br />'; for($i=0; $i <= 6; $i++) echo 'Minor<br />' ?></td></tr>
</table>

<?php $Qsubchapter = $this->db->query("SELECT `content` FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `chapter`='9' AND `no_chapter`='9.1' ORDER BY `subno_chapter_order` ASC"); foreach($Qsubchapter->result_object() as $subchapter) $arr_subchapter_9_1[]=$subchapter; 
$dt_subchapter_9_1a = explode('|', $arr_subchapter_9_1[0]->content);
$dt_subchapter_9_1b = explode('|', $arr_subchapter_9_1[1]->content);
$dt_subchapter_9_1c = explode('|', $arr_subchapter_9_1[2]->content);
$dt_subchapter_9_1d = explode('|', $arr_subchapter_9_1[3]->content);
$dt_subchapter_9_1e = explode('|', $arr_subchapter_9_1[4]->content);
$dt_subchapter_9_1f = explode('|', $arr_subchapter_9_1[5]->content);
$dt_subchapter_9_1g = explode('|', $arr_subchapter_9_1[6]->content);
$dt_subchapter_9_1h = explode('|', $arr_subchapter_9_1[7]->content);
$dt_subchapter_9_1i = explode('|', $arr_subchapter_9_1[8]->content);
?>

<h3>Table 5: Equipment Quantity Check</h3>
<table class="border" cellpadding="0" cellspacing="0">
<tr>
    <td width="40">9.1.1</td>
    <td width="130">Antenna Polarization</td>
    <td><img src="<?php echo base_url() ?>static/i/radio<?php if($dt_subchapter_9_1a[3]=='1') echo '_checked' ?>.jpg"> Cross Polarization  <span style="padding:0 10px">&nbsp;</span> <img src="<?php echo base_url() ?>static/i/radio<?php if($dt_subchapter_9_1a[3]=='2') echo '_checked' ?>.jpg"> Vertical Polarization</td>
</tr>
<tr>
    <td>9.1.2</td>
    <td>Band Frequency</td>
    <td><img src="<?php echo base_url() ?>static/i/radio<?php if($dt_subchapter_9_1b[3]=='1') echo '_checked' ?>.jpg"> 3G</td>
</tr>
<tr>
    <td>9.1.3</td>
    <td>Number of sectors</td>
    <td><img src="<?php echo base_url() ?>static/i/radio<?php if($dt_subchapter_9_1c[3]=='1') echo '_checked' ?>.jpg"> Omni  <span style="padding:0 10px">&nbsp;</span> <img src="<?php echo base_url() ?>static/i/radio<?php if($dt_subchapter_9_1c[3]=='2') echo '_checked' ?>.jpg"> One <span style="padding:0 10px">&nbsp;</span> <img src="<?php echo base_url() ?>static/i/radio<?php if($dt_subchapter_9_1c[3]=='3') echo '_checked' ?>.jpg"> Two <span style="padding:0 10px">&nbsp;</span> <img src="<?php echo base_url() ?>static/i/radio<?php if($dt_subchapter_9_1c[3]=='4') echo '_checked' ?>.jpg"> Three</td>
</tr>
<tr>
    <td>9.1.4</td>
    <td>Type of Diversity</td>
    <td><img src="<?php echo base_url() ?>static/i/radio<?php if($dt_subchapter_9_1d[3]=='1') echo '_checked' ?>.jpg"> Polarization <span style="padding:0 10px">&nbsp;</span> <img src="<?php echo base_url() ?>static/i/radio<?php if($dt_subchapter_9_1d[3]=='2') echo '_checked' ?>.jpg"> Space</td>
</tr>
<tr>
    <td>9.1.5</td>
    <td colspan="2">Number of Installed Antenna</td>
</tr>
<tr>
<td>9.1.5.1</td>
    <td>New Antenna</td>
    <td>
    <img src="<?php echo base_url() ?>static/i/radio<?php if($dt_subchapter_9_1e[3]=='1') echo '_checked' ?>.jpg"> 2 <span style="padding:0 10px">&nbsp;</span>
    <img src="<?php echo base_url() ?>static/i/radio<?php if($dt_subchapter_9_1e[3]=='2') echo '_checked' ?>.jpg"> 3 <span style="padding:0 10px">&nbsp;</span>
    <img src="<?php echo base_url() ?>static/i/radio<?php if($dt_subchapter_9_1e[3]=='3') echo '_checked' ?>.jpg"> 4 <span style="padding:0 10px">&nbsp;</span>
    <img src="<?php echo base_url() ?>static/i/radio<?php if($dt_subchapter_9_1e[3]=='4') echo '_checked' ?>.jpg"> 5 <span style="padding:0 10px">&nbsp;</span>
    <img src="<?php echo base_url() ?>static/i/radio<?php if($dt_subchapter_9_1e[3]=='5') echo '_checked' ?>.jpg"> 6 <span style="padding:0 10px">&nbsp;</span>
    <img src="<?php echo base_url() ?>static/i/radio<?php if($dt_subchapter_9_1f[3]=='6') echo '_checked' ?>.jpg"> N/A
    </td>
</tr>
<tr>
    <td>9.1.6</td>
    <td colspan="2">Number of RET</td>
</tr>
<tr>
<td>9.1.6.1</td>
    <td>Old RET</td>
    <td>
    <img src="<?php echo base_url() ?>static/i/radio<?php if($dt_subchapter_9_1f[3]=='1') echo '_checked' ?>.jpg"> 2 <span style="padding:0 10px">&nbsp;</span>
    <img src="<?php echo base_url() ?>static/i/radio<?php if($dt_subchapter_9_1f[3]=='2') echo '_checked' ?>.jpg"> 3 <span style="padding:0 10px">&nbsp;</span>
    <img src="<?php echo base_url() ?>static/i/radio<?php if($dt_subchapter_9_1f[3]=='3') echo '_checked' ?>.jpg"> 4 <span style="padding:0 10px">&nbsp;</span>
    <img src="<?php echo base_url() ?>static/i/radio<?php if($dt_subchapter_9_1f[3]=='4') echo '_checked' ?>.jpg"> 5 <span style="padding:0 10px">&nbsp;</span>
    <img src="<?php echo base_url() ?>static/i/radio<?php if($dt_subchapter_9_1f[3]=='5') echo '_checked' ?>.jpg"> 6 <span style="padding:0 10px">&nbsp;</span>
    <img src="<?php echo base_url() ?>static/i/radio<?php if($dt_subchapter_9_1f[3]=='6') echo '_checked' ?>.jpg"> N/A
    </td>
</tr>
<tr>
<td>9.1.6.2</td>
    <td>New RET</td>
    <td>
    <img src="<?php echo base_url() ?>static/i/radio<?php if($dt_subchapter_9_1g[3]=='1') echo '_checked' ?>.jpg"> 2 <span style="padding:0 10px">&nbsp;</span>
    <img src="<?php echo base_url() ?>static/i/radio<?php if($dt_subchapter_9_1g[3]=='2') echo '_checked' ?>.jpg"> 3 <span style="padding:0 10px">&nbsp;</span>
    <img src="<?php echo base_url() ?>static/i/radio<?php if($dt_subchapter_9_1g[3]=='3') echo '_checked' ?>.jpg"> 4 <span style="padding:0 10px">&nbsp;</span>
    <img src="<?php echo base_url() ?>static/i/radio<?php if($dt_subchapter_9_1g[3]=='4') echo '_checked' ?>.jpg"> 5 <span style="padding:0 10px">&nbsp;</span>
    <img src="<?php echo base_url() ?>static/i/radio<?php if($dt_subchapter_9_1g[3]=='5') echo '_checked' ?>.jpg"> 6 <span style="padding:0 10px">&nbsp;</span>
    <img src="<?php echo base_url() ?>static/i/radio<?php if($dt_subchapter_9_1g[3]=='6') echo '_checked' ?>.jpg"> N/A
    </td>
</tr>
<tr>
<td>9.1.7</td>
    <td colspan="2">Number of Combiner</td>
</tr>
<tr>
<td>9.1.7.1</td>
    <td>Old Combiner</td>
    <td>
    <img src="<?php echo base_url() ?>static/i/radio<?php if($dt_subchapter_9_1h[3]=='1') echo '_checked' ?>.jpg"> 2 <span style="padding:0 10px">&nbsp;</span>
    <img src="<?php echo base_url() ?>static/i/radio<?php if($dt_subchapter_9_1h[3]=='2') echo '_checked' ?>.jpg"> 3 <span style="padding:0 10px">&nbsp;</span>
    <img src="<?php echo base_url() ?>static/i/radio<?php if($dt_subchapter_9_1h[3]=='3') echo '_checked' ?>.jpg"> 4 <span style="padding:0 10px">&nbsp;</span>
    <img src="<?php echo base_url() ?>static/i/radio<?php if($dt_subchapter_9_1h[3]=='4') echo '_checked' ?>.jpg"> 5 <span style="padding:0 10px">&nbsp;</span>
    <img src="<?php echo base_url() ?>static/i/radio<?php if($dt_subchapter_9_1h[3]=='5') echo '_checked' ?>.jpg"> 6 <span style="padding:0 10px">&nbsp;</span>
    <img src="<?php echo base_url() ?>static/i/radio<?php if($dt_subchapter_9_1h[3]=='6') echo '_checked' ?>.jpg"> N/A
    </td>
</tr>
<tr>
    <td>9.1.7.1 </td>
    <td>New Combiner</td>
    <td>
    <img src="<?php echo base_url() ?>static/i/radio<?php if($dt_subchapter_9_1i[3]=='1') echo '_checked' ?>.jpg"> 2 <span style="padding:0 10px">&nbsp;</span>
    <img src="<?php echo base_url() ?>static/i/radio<?php if($dt_subchapter_9_1i[3]=='2') echo '_checked' ?>.jpg"> 3 <span style="padding:0 10px">&nbsp;</span>
    <img src="<?php echo base_url() ?>static/i/radio<?php if($dt_subchapter_9_1i[3]=='3') echo '_checked' ?>.jpg"> 4 <span style="padding:0 10px">&nbsp;</span>
    <img src="<?php echo base_url() ?>static/i/radio<?php if($dt_subchapter_9_1i[3]=='4') echo '_checked' ?>.jpg"> 5 <span style="padding:0 10px">&nbsp;</span>
    <img src="<?php echo base_url() ?>static/i/radio<?php if($dt_subchapter_9_1i[3]=='5') echo '_checked' ?>.jpg"> 6 <span style="padding:0 10px">&nbsp;</span>
    <img src="<?php echo base_url() ?>static/i/radio<?php if($dt_subchapter_9_1i[3]=='6') echo '_checked' ?>.jpg"> N/A
    </td>
</tr>
</table>
<p style="font-size:11px"><b>Note:</b> If there are many existing filters, please contact The Quality Improvement:
<ol>
	<li>TSD = Three Sector with Diversity</li>
	<li>TSND = Three Sector with Non Diversity</li>
	<li>EMP = Electro Magnetic Protection</li>
	<li>RET = Remote Electrical Tilt</li>
	<li>TMA = Tower Mounted Amplifier</li>
</ol>
</p>

<hr />

<p align="center"><img src="<?php echo base_url() ?>static/i/pdf_zte3g_1.jpg" /></p>

<?php $Qsubchapter = $this->db->query("SELECT `content` FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `chapter`='9' AND `no_chapter`='9.2' ORDER BY `subno_chapter_order` ASC"); foreach($Qsubchapter->result_object() as $subchapter) $arr_subchapter_9_2a[]=$subchapter ?>

<h3>Table 6: Antenna Table</h3>
<table class="border" cellpadding="0" cellspacing="0">
<tr class="header">
    <td width="40">Test No</td>
    <td>Antenna</td>
    <td>Type</td>
    <td>Brand</td>
    <td>Serial No</td>
    <td width="35">N/A</td>
    <td>Remark</td>
</tr>
<?php
$arr_dt_921 = array('9.2.1.A', '9.2.1.B', '9.2.1.A', '9.2.1.B', '9.2.2.A', '9.2.2.B');
$arr_dt_922 = array('Sector 1 A', 'Sector 1 B', 'Sector 2 A', 'Sector 2 B', 'Sector 3 A', 'Sector 3 B');
for($i=0; $i <= 5; $i++){
	$arr_subchapter_9_2 = explode('|', $arr_subchapter_9_2a[$i]->content);
	echo '<tr><td>'.$arr_dt_921[$i].'</td><td>'.$arr_dt_922[$i].'</td>';
	echo '<td>'.$this->ifunction->ifnull($arr_subchapter_9_2[4]).'</td>';
	echo '<td>'.$this->ifunction->ifnull($arr_subchapter_9_2[5]).'</td>';
	echo '<td>'.$this->ifunction->ifnull($arr_subchapter_9_2[6]).'</td>';
	echo '<td align="center"><img src="'.base_url().'static/i/radio'; if($arr_subchapter_9_2[3]=='true') echo '_checked'; echo '.jpg"></td>';
	echo '<td>'.$this->ifunction->ifnull($arr_subchapter_9_2[7]).'</td></tr>';
}
?>
</table>
<p style="font-size:11px"><i>Note: Existing Equipment must match with BOQ & Site Documentation </i></p>

<?php $Qsubchapter = $this->db->query("SELECT `content` FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `chapter`='9' AND `no_chapter`='9.3' ORDER BY `subno_chapter_order` ASC"); foreach($Qsubchapter->result_object() as $subchapter) $arr_subchapter_9_3a[]=$subchapter ?>

<h3>Table 7: Connector</h3>
<table class="border" cellpadding="0" cellspacing="0">
<tr class="header">
    <td width="40">Test No</td>
    <td>Connector Type </td>
    <td">Brand</td>
    <td>Quantity</td>
    <td width="35">N/A</td>
    <td>Remark</td>
</tr>
<?php
$arr_dt_931 = array('1/2 &quot; N Male', '1/2 &quot; N Female', '7/16 &quot; DIN Male', '7/16 &quot; DIN Female', '7/8 &quot; Male', '7/8 &quot; Female', '1 1/4 &quot; Male', '1 1/4 &quot; Female', '1 5/8 &quot; Male', '1 5/8 &quot; Female');
for($i=0; $i <= 9; $i++){
	$arr_subchapter_9_3 = explode('|', $arr_subchapter_9_3a[$i]->content);
	echo '<tr><td>9.3.'.($i +1).'</td><td>'.$arr_dt_931[$i].'</td>';
	echo '<td>'.$this->ifunction->ifnull($arr_subchapter_9_3[4]).'</td>';
	echo '<td>'.$this->ifunction->ifnull($arr_subchapter_9_3[5]).'</td>';
	echo '<td align="center"><img src="'.base_url().'static/i/radio'; if($arr_subchapter_9_3[3]=='true') echo '_checked'; echo '.jpg"></td>';
	echo '<td>'.$this->ifunction->ifnull($arr_subchapter_9_3[6]).'</td></tr>';
}
?>
</table>

<hr />

<?php $Qsubchapter = $this->db->query("SELECT `content` FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `chapter`='9' AND `no_chapter`='9.4' ORDER BY `subno_chapter_order` ASC"); foreach($Qsubchapter->result_object() as $subchapter) $arr_subchapter_9_4a[]=$subchapter ?>

<h3>Table 8: Coaxial Feeder</h3>
<table class="border" cellpadding="0" cellspacing="0">
<tr class="header">
    <td width="40">Test No</td>
    <td>Antenna Sector</td>
    <td>Type</td>
    <td>Brand</td>
    <td>Length (M)</td>
    <td width="35">N/A</td>
    <td>Remark</td>
</tr>
<?php
$arr_dt_941 = array('9.4.1.A', '9.4.1.B', '9.4.2.A', '9.4.2.B', '9.4.3.A', '9.4.3.B');
$arr_dt_942 = array('Sector 1 A', 'Sector 1 B', 'Sector 2 A', 'Sector 2 B', 'Sector 3 A', 'Sector 3 B');
for($i=0; $i <= 5; $i++){
	$arr_subchapter_9_4 = explode('|', $arr_subchapter_9_4a[$i]->content);
	echo '<tr><td>'.$arr_dt_941[$i].'</td><td>'.$arr_dt_942[$i].'</td>';
	echo '<td>'.$this->ifunction->ifnull($arr_subchapter_9_4[4]).'</td>';
	echo '<td>'.$this->ifunction->ifnull($arr_subchapter_9_4[5]).'</td>';
	echo '<td>'.$this->ifunction->ifnull($arr_subchapter_9_4[6]).'</td>';
	echo '<td align="center"><img src="'.base_url().'static/i/radio'; if($arr_subchapter_9_4[3]=='true') echo '_checked'; echo '.jpg"></td>';
	echo '<td>'.$this->ifunction->ifnull($arr_subchapter_9_4[7]).'</td></tr>';
}
?>
</table>
<p style="font-size:11px"><i>Length of coaxial feeder refer to measurement on distance to fault </i></p>

<?php $Qsubchapter = $this->db->query("SELECT `content` FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `chapter`='9' AND `no_chapter`='9.5' ORDER BY `subno_chapter_order` ASC"); foreach($Qsubchapter->result_object() as $subchapter) $arr_subchapter_9_5a[]=$subchapter ?>

<h3>Table 9: Outdoor Jumper Cable (Top)</h3>
<table class="border" cellpadding="0" cellspacing="0">
<tr class="header">
    <td width="40">Test No</td>
    <td>Antenna Sector</td>
    <td>Type</td>
    <td>Brand</td>
    <td>Length (M)</td>
    <td width="35">N/A</td>
    <td>Remark</td>
</tr>
<?php
$arr_dt_951 = array('9.5.1.A', '9.5.1.B', '9.5.2.A', '9.5.2.B', '9.5.3.A', '9.5.3.B');
$arr_dt_952 = array('Sector 1 A', 'Sector 1 B', 'Sector 2 A', 'Sector 2 B', 'Sector 3 A', 'Sector 3 B');
for($i=0; $i <= 5; $i++){
	$arr_subchapter_9_5 = explode('|', $arr_subchapter_9_5a[$i]->content);
	echo '<tr><td>'.$arr_dt_951[$i].'</td><td>'.$arr_dt_952[$i].'</td>';
	echo '<td>'.$this->ifunction->ifnull($arr_subchapter_9_5[4]).'</td>';
	echo '<td>'.$this->ifunction->ifnull($arr_subchapter_9_5[5]).'</td>';
	echo '<td>'.$this->ifunction->ifnull($arr_subchapter_9_5[6]).'</td>';
	echo '<td align="center"><img src="'.base_url().'static/i/radio'; if($arr_subchapter_9_5[3]=='true') echo '_checked'; echo '.jpg"></td>';
	echo '<td>'.$this->ifunction->ifnull($arr_subchapter_9_5[7]).'</td></tr>';
}
?>
</table>
<p style="font-size:11px"><i>Length of coaxial feeder refer to measurement on distance to fault</i></p>

<?php $Qsubchapter = $this->db->query("SELECT `content` FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `chapter`='9' AND `no_chapter`='9.6' ORDER BY `subno_chapter_order` ASC"); foreach($Qsubchapter->result_object() as $subchapter) $arr_subchapter_9_6a[]=$subchapter ?>

<h3>Table 10: Indoor Jumper Cable (Bottom)</h3>
<table class="border" cellpadding="0" cellspacing="0">
<tr class="header">
    <td width="40">Test No</td>
    <td>Antenna Sector</td>
    <td>Type</td>
    <td>Brand</td>
    <td>Length (M)</td>
    <td width="35">N/A</td>
    <td>Remark</td>
</tr>
<?php
$arr_dt_961 = array('9.6.1.A', '9.6.1.B', '9.6.2.A', '9.6.2.B', '9.6.3.A', '9.6.3.B');
$arr_dt_962 = array('Sector 1 A', 'Sector 1 B', 'Sector 2 A', 'Sector 2 B', 'Sector 3 A', 'Sector 3 B');
for($i=0; $i <= 5; $i++){
	$arr_subchapter_9_6 = explode('|', $arr_subchapter_9_6a[$i]->content);
	echo '<tr><td>'.$arr_dt_961[$i].'</td><td>'.$arr_dt_962[$i].'</td>';
	echo '<td>'.$this->ifunction->ifnull($arr_subchapter_9_6[4]).'</td>';
	echo '<td>'.$this->ifunction->ifnull($arr_subchapter_9_6[5]).'</td>';
	echo '<td>'.$this->ifunction->ifnull($arr_subchapter_9_6[6]).'</td>';
	echo '<td align="center"><img src="'.base_url().'static/i/radio'; if($arr_subchapter_9_6[3]=='true') echo '_checked'; echo '.jpg"></td>';
	echo '<td>'.$this->ifunction->ifnull($arr_subchapter_9_6[7]).'</td></tr>';
}
?>
</table>
<p style="font-size:11px"><i>Length of coaxial feeder refer to measurement on distance to fault </i></p>

<?php $Qchapter = $this->db->query("SELECT `content` FROM `it_atp_chapter` WHERE `atp_id`='$dx' AND `chapter`='10' ORDER BY `atp_chapter_id` ASC"); foreach($Qchapter->result_object() as $chapter) $arr_chapter_10[]=$chapter ?>

<table class="border" cellpadding="0" cellspacing="0">
<tr class="header"><td width="40">Chapter</td><td>Title work performed</td><td width="30">OK</td><td width="40">Not OK</td><td width="35">N/A</td><td width="90">Remark</td></tr>
<tr><td valign="top"><b>10</b><br />10.1</td><td valign="top"><b>Installation and construction</b><br />Installation antenna system </td>
<td valign="top" align="center"><br /><img src="<?php echo base_url() ?>static/i/radio<?php if($arr_chapter_10[0]->content=='OK') echo '_checked' ?>.jpg">
<td valign="top" align="center"><br /><img src="<?php echo base_url() ?>static/i/radio<?php if($arr_chapter_10[0]->content=='Not OK') echo '_checked' ?>.jpg">
<td valign="top" align="center"><br /><img src="<?php echo base_url() ?>static/i/radio<?php if($arr_chapter_10[0]->content=='N/A') echo '_checked' ?>.jpg">
<td valign="top" align="center"><br />Major</td>
</tr></table>

<hr />

<?php $Qsubchapter = $this->db->query("SELECT `content` FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `chapter`='10' AND `no_chapter`='10.1' ORDER BY `subno_chapter_order` ASC"); foreach($Qsubchapter->result_object() as $subchapter) $arr_subchapter_10_1a[]=$subchapter ?>

<h3>Table 10: Installation / Execution</h3>
<table class="border" cellpadding="0" cellspacing="0">
<tr class="header">
    <td width="40" valign="top">Test No</td>
    <td valign="top">Test Item</td>
    <td width="30" valign="top">OK</td>
    <td width="40" valign="top">Not OK</td>
    <td width="35" valign="top">N/A</td>
    <td valign="top">Comment</td>
</tr>
<?php
$arr_dt_101 = array('Maintenance aspect (easy to maintain)','Antenna mounting','Arm construction','Pylon construction(antenna support)','Feeder placement<br />(Feeders running and laying on cable ladder not too strained. Its properly fixed)','Feeder bending if<br />- For 1 5/8 Inch, r > 510mm<br />- For
7/8 Inch, r > 250mm<br />- For 1 1/4 Inch, r > 380 mm<br />- For 1/2 Inch , r > 125mm','Feeder Connector Installation','Feeder Clamp Installation','Water Leakage','Connection cable feeder correct and tightened','Indoor Cable Tray Installation','Lightning Protection','Grounding in every 50 meter','Grounding Bar on Bending','Grounding Bar at entering room feeder','Grounding feeder should not be connected to tower','TVSS availability','TVSS installation & connection');
for($i=0; $i <= 17; $i++){
	$arr_subchapter_10_1 = explode('|', $arr_subchapter_10_1a[$i]->content);	
	echo '<tr><td valign="top">10.1.'.($i +1).'</td><td>'.$arr_dt_101[$i].'</td>';
	echo '<td align="center"><img src="'.base_url().'static/i/radio'; if($arr_subchapter_10_1[3]=='OK') echo '_checked'; echo '.jpg"></td>';	
	echo '<td align="center"><img src="'.base_url().'static/i/radio'; if($arr_subchapter_10_1[3]=='Not OK') echo '_checked'; echo '.jpg"></td>';
	echo '<td align="center"><img src="'.base_url().'static/i/radio'; if($arr_subchapter_10_1[3]=='N/A') echo '_checked'; echo '.jpg"></td>';
	echo '<td>'.$this->ifunction->ifnull($arr_subchapter_10_1[4]).'</td></tr>';
	if($i==0) echo '<tr><td></td><td>Antenna Support</td><td></td><td></td><td></td><td></td></tr>';
	if($i==3) echo '<tr><td></td><td>Feeder Installation</td><td></td><td></td><td></td><td></td></tr>';
	if($i==10) echo '<tr><td></td><td>Grounding System (feeder)</td><td></td><td></td><td></td><td></td></tr>';
}
?>
</table><br />

<?php $Qchapter = $this->db->query("SELECT `content` FROM `it_atp_chapter` WHERE `atp_id`='$dx' AND `chapter`='11' ORDER BY `atp_chapter_id` ASC"); foreach($Qchapter->result_object() as $chapter) $arr_chapter_11[]=$chapter ?>

<table class="border" cellpadding="0" cellspacing="0">
<tr class="header"><td width="40">Chapter</td><td>Title work performed</td><td width="30">OK</td><td width="40">Not OK</td><td width="35">N/A</td><td width="90">Remark</td></tr>
<tr><td valign="top"><b>11</b><br />11.1<br />11.2</td><td valign="top"><b>Orientation and Position Antenna</b><br />Orientation outdoor antenna<br />Position outdoor antenna</td>
<td valign="top" align="center">
<?php echo '<br />';
for($i=0; $i <= 1; $i++){
    echo '<img src="'.base_url().'static/i/radio'; if($arr_chapter_11[$i]->content=='OK') echo '_checked'; echo '.jpg"><br />';
}
?>
</td><td valign="top" align="center">
<?php echo '<br />';
for($i=0; $i <= 1; $i++){
    echo '<img src="'.base_url().'static/i/radio'; if($arr_chapter_11[$i]->content=='Not OK') echo '_checked'; echo '.jpg"><br />';
}
?>
</td><td valign="top" align="center">
<?php echo '<br />';
for($i=0; $i <= 1; $i++){
    echo '<img src="'.base_url().'static/i/radio'; if($arr_chapter_11[$i]->content=='N/A') echo '_checked'; echo '.jpg"><br />';
}
?></td><td valign="top"></td></tr>
</table>

<hr />

<?php $Qsubchapter = $this->db->query("SELECT `content` FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `chapter`='11' AND `no_chapter`='11.1' ORDER BY `subno_chapter_order` ASC"); foreach($Qsubchapter->result_object() as $subchapter) $arr_subchapter_11_1a[]=$subchapter ?>

<h3>Table 11: Orientation</h3>
<table class="border" cellpadding="0" cellspacing="0">
<tr class="header">
    <td width="40" rowspan="2">Test No</td>
    <td rowspan="2">Antenna Sector</td>
    <td colspan="2">Azimuth (deg)</td>
    <td colspan="2">Mechanical Tilt (deg )</td>
    <td colspan="2">Electrical Tilt</td>
    <td colspan="2">Height (m)</td>
    <td rowspan="2">N/A</td>
    <td rowspan="2">Remark</td>
</tr>
<tr class="header">
    <td>Actual</td>
    <td>Site<br />Doc.</td>
    <td>Actual</td>
    <td>Site<br />Doc.</td>
    <td>Actual</td>
    <td>Site<br />Doc.</td>
    <td>Actual</td>
    <td>Site<br />Doc.</td>
</tr>
<?php
$arr_dt_1111 = array('11.1.1.A', '11.1.1.B', '11.1.2.A', '11.1.2.B', '11.1.3.A', '11.1.3.B');
$arr_dt_1112 = array('Sector 1 A', 'Sector 1 B', 'Sector 2 A', 'Sector 2 B', 'Sector 3 A', 'Sector 3 B');
for($i=0; $i <= 5; $i++){
	$arr_subchapter_11_1 = explode('|', $arr_subchapter_11_1a[$i]->content);
	echo '<tr><td>'.$arr_dt_1111[$i].'</td><td>'.$arr_dt_1112[$i].'</td>';
	echo '<td>'.$this->ifunction->ifnull($arr_subchapter_11_1[4]).'</td>';
	echo '<td>'.$this->ifunction->ifnull($arr_subchapter_11_1[5]).'</td>';
	echo '<td>'.$this->ifunction->ifnull($arr_subchapter_11_1[6]).'</td>';
	echo '<td>'.$this->ifunction->ifnull($arr_subchapter_11_1[7]).'</td>';
	echo '<td>'.$this->ifunction->ifnull($arr_subchapter_11_1[8]).'</td>';
	echo '<td>'.$this->ifunction->ifnull($arr_subchapter_11_1[9]).'</td>';
	echo '<td>'.$this->ifunction->ifnull($arr_subchapter_11_1[10]).'</td>';
	echo '<td>'.$this->ifunction->ifnull($arr_subchapter_11_1[11]).'</td>';
	echo '<td align="center"><img src="'.base_url().'static/i/radio'; if($arr_subchapter_11_1[3]=='true') echo '_checked'; echo '.jpg"></td>';
	echo '<td>'.$this->ifunction->ifnull($arr_subchapter_11_1[12]).'</td></tr>';
}
?>
</table>

<?php $Qsubchapter = $this->db->query("SELECT `content` FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `chapter`='11' AND `no_chapter`='11.2' ORDER BY `subno_chapter_order` ASC"); foreach($Qsubchapter->result_object() as $subchapter) $arr_subchapter_11_2a[]=$subchapter ?>

<h3>Table 13: Position</h3>
<table class="border" cellpadding="0" cellspacing="0">
<tr class="header">
    <td width="40">Test No</td>
    <td>Test Item</td>
    <td width="30">OK</td>
    <td width="40">Not OK</td>
    <td>Comment</td>
</tr>
<?php
$arr_dt_112 = array('Placement', 'Possibility of blocking', 'Distance from other');
for($i=0; $i <= 2; $i++){
	$arr_subchapter_11_2 = explode('|', $arr_subchapter_11_2a[$i]->content);
	echo '<tr><td>11.1.'.($i +1).'</td><td>'.$arr_dt_112[$i].'</td>';
	echo '<td align="center"><img src="'.base_url().'static/i/radio'; if($arr_subchapter_11_2[3]=='OK') echo '_checked'; echo '.jpg"></td>';
	echo '<td align="center"><img src="'.base_url().'static/i/radio'; if($arr_subchapter_11_2[3]=='Not OK') echo '_checked'; echo '.jpg"></td>';
	echo '<td>'.$this->ifunction->ifnull($arr_subchapter_11_2[4]).'</td></tr>';
}
?>
</table>
<p style="font-size:11px"><i>Note: Should be matched with Site Documentation</i></p>

<?php $Qchapter = $this->db->query("SELECT `content` FROM `it_atp_chapter` WHERE `atp_id`='$dx' AND `chapter`='12' ORDER BY `atp_chapter_id` ASC"); foreach($Qchapter->result_object() as $chapter) $arr_chapter_12[]=$chapter ?>

<table class="border" cellpadding="0" cellspacing="0">
<tr class="header"><td width="40">Chapter</td><td>Title work performed</td><td width="30">OK</td><td width="40">Not OK</td><td width="35">N/A</td><td width="90">Remark</td></tr>
<tr><td valign="top"><b>12</b></td><td valign="top"><b>Distance to Fault (DTF) use dummy load</b><br />Refer to Guideline Installation</td>
<td valign="top" align="center"><br /><img src="<?php echo base_url() ?>static/i/radio<?php if($arr_chapter_12[0]->content=='OK') echo '_checked' ?>.jpg">
<td valign="top" align="center"><br /><img src="<?php echo base_url() ?>static/i/radio<?php if($arr_chapter_12[0]->content=='Not OK') echo '_checked' ?>.jpg">
<td valign="top" align="center"><br /><img src="<?php echo base_url() ?>static/i/radio<?php if($arr_chapter_12[0]->content=='N/A') echo '_checked' ?>.jpg">
<td valign="top" align="center"><br />Major</td>
</tr></table><br />

<p align="center"><img src="<?php echo base_url() ?>static/i/pdf_zte3g_2.jpg" /></p>

<hr />

<?php $Qsubchapter = $this->db->query("SELECT `content` FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `chapter`='12' AND `no_chapter`='12.1' ORDER BY `subno_chapter_order` ASC"); foreach($Qsubchapter->result_object() as $subchapter) $arr_subchapter_12_1a[]=$subchapter ?>

<h3>Table 13: Distances to Fault Measurement with Dummy Load</h3>
<p style="font-size:11px"><i>Standard Measurement: DTF VSWR connector maximum 1.02 and feeder cable 1.01</i></p>
<table class="border" cellpadding="0" cellspacing="0">
<tr class="header">
    <td width="40" rowspan="2">Test No</td>
    <td rowspan="2">Feeder</td>
    <td colspan="2">M1</td>
    <td colspan="2">M2</td>
    <td colspan="2">M3</td>
    <td colspan="2">M4</td>
    <td colspan="2">M5</td>
    <td width="30" rowspan="2">OK</td>
    <td width="40" rowspan="2">Not OK</td>
    <td width="35" rowspan="2">N/A</td>
    <td rowspan="2">Remark</td>
</tr>
<tr class="header"><td>S</td><td>D</td><td>S</td><td>D</td><td>S</td><td>D</td><td>S</td><td>D</td><td>S</td><td>D</td></tr>
<?php
$arr_dt_1211 = array('12.1.1.A', '12.1.1.B', '12.1.2.A', '12.1.2.B', '12.1.3.A', '12.1.3.B');
$arr_dt_1212 = array('Sector 1 A', 'Sector 1 B', 'Sector 2 A', 'Sector 2 B', 'Sector 3 A', 'Sector 3 B');
for($i=0; $i <= 5; $i++){
    $arr_subchapter_12_1 = explode('|', $arr_subchapter_12_1a[$i]->content);
    echo '<tr><td>'.$arr_dt_1211[$i].'</td><td>'.$arr_dt_1212[$i].'</td>';
    echo '<td>'.$this->ifunction->ifnull($arr_subchapter_12_1[4]).'</td>';
    echo '<td>'.$this->ifunction->ifnull($arr_subchapter_12_1[5]).'</td>';
    echo '<td>'.$this->ifunction->ifnull($arr_subchapter_12_1[6]).'</td>';
    echo '<td>'.$this->ifunction->ifnull($arr_subchapter_12_1[7]).'</td>';
    echo '<td>'.$this->ifunction->ifnull($arr_subchapter_12_1[8]).'</td>';
    echo '<td>'.$this->ifunction->ifnull($arr_subchapter_12_1[9]).'</td>';
    echo '<td>'.$this->ifunction->ifnull($arr_subchapter_12_1[10]).'</td>';
    echo '<td>'.$this->ifunction->ifnull($arr_subchapter_12_1[11]).'</td>';
    echo '<td>'.$this->ifunction->ifnull($arr_subchapter_12_1[12]).'</td>';
    echo '<td>'.$this->ifunction->ifnull($arr_subchapter_12_1[13]).'</td>';
    echo '<td align="center"><img src="'.base_url().'static/i/radio'; if($arr_subchapter_12_1[3]=='OK') echo '_checked'; echo '.jpg"></td>';
    echo '<td align="center"><img src="'.base_url().'static/i/radio'; if($arr_subchapter_12_1[3]=='Not OK') echo '_checked'; echo '.jpg"></td>';
    echo '<td align="center"><img src="'.base_url().'static/i/radio'; if($arr_subchapter_12_1[3]=='N/A') echo '_checked'; echo '.jpg"></td>';
    echo '<td>'.$this->ifunction->ifnull($arr_subchapter_12_1[14]).'</td></tr>';
}
?>
</table>
<p style="font-size:11px"><i>Note: Measurement & Raw data (softcopy) should be attached</i></p>

<?php $Qchapter = $this->db->query("SELECT `content` FROM `it_atp_chapter` WHERE `atp_id`='$dx' AND `chapter`='13' ORDER BY `atp_chapter_id` ASC"); foreach($Qchapter->result_object() as $chapter) $arr_chapter_13[]=$chapter ?>

<table class="border" cellpadding="0" cellspacing="0">
<tr class="header"><td width="40">Chapter</td><td>Title work performed</td><td width="30">OK</td><td width="40">Not OK</td><td width="35">N/A</td><td width="90">Remark</td></tr>
<tr><td valign="top"><b>13</b><br />13.1<br />13.2</td><td valign="top"><b>Antenna system measurement</b><br />VSWR Measurement without TMA (See table 15a)<br />VSWR Measurement with TMA (See table 15b)</td>
<td valign="top" align="center">
<?php echo '<br />';
for($i=0; $i <= 1; $i++){
    echo '<img src="'.base_url().'static/i/radio'; if($arr_chapter_13[$i]->content=='OK') echo '_checked'; echo '.jpg"><br />';
}
?>
</td><td valign="top" align="center">
<?php echo '<br />';
for($i=0; $i <= 1; $i++){
    echo '<img src="'.base_url().'static/i/radio'; if($arr_chapter_13[$i]->content=='Not OK') echo '_checked'; echo '.jpg"><br />';
}
?>
</td><td valign="top" align="center">
<?php echo '<br />';
for($i=0; $i <= 1; $i++){
    echo '<img src="'.base_url().'static/i/radio'; if($arr_chapter_13[$i]->content=='N/A') echo '_checked'; echo '.jpg"><br />';
}
?>
</td><td valign="top" align="center" width="90"><br />Major<br />Minor</td></tr>
</table>

<?php $Qsubchapter = $this->db->query("SELECT `content` FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `chapter`='13' AND `no_chapter`='13.1' ORDER BY `subno_chapter_order` ASC"); foreach($Qsubchapter->result_object() as $subchapter) $arr_subchapter_13_1a[]=$subchapter ?>

<h3>Table 13a: VSWR measurement UL & DL without TMA</h3>
<p style="font-size:11px">Standard VSWR Vs Frequency Response: &le; 1.2 (TX freq: 2130Mhz-2135Mhz&RX Freq: 1950Mhz-1955Mhz)</p>
<table class="border" cellpadding="0" cellspacing="0">
<tr class="header">
    <td width="40" rowspan="2">Test No</td>
    <td rowspan="2">Test Item</td>
    <td colspan="2">VSWR Max (peak marker)</td>
    <td width="30" rowspan="2">OK</td>
    <td width="40" rowspan="2">Not OK</td>
    <td width="35" rowspan="2">N/A</td>
    <td rowspan="2">Remark</td>
</tr>
<tr class="header"><td>1950Mhz-1955Mhz</td><td>2130Mhz-2145Mhz</td></tr>
<?php
$arr_dt_1311 = array('13.1.1.A', '13.1.1.B', '13.1.2.A', '13.1.2.B', '13.1.3.A', '13.1.3.B');
$arr_dt_1312 = array('Sector 1 A', 'Sector 1 B', 'Sector 2 A', 'Sector 2 B', 'Sector 3 A', 'Sector 3 B');
for($i=0; $i <= 5; $i++){
	$arr_subchapter_13_1 = explode('|', $arr_subchapter_13_1a[$i]->content);
	echo '<tr><td>'.$arr_dt_1311[$i].'</td><td>'.$arr_dt_1312[$i].'</td>';
	echo '<td>'.$this->ifunction->ifnull($arr_subchapter_13_1[4]).'</td>';
	echo '<td>'.$this->ifunction->ifnull($arr_subchapter_13_1[5]).'</td>';
	echo '<td align="center"><img src="'.base_url().'static/i/radio'; if($arr_subchapter_13_1[3]=='OK') echo '_checked'; echo '.jpg"></td>';
	echo '<td align="center"><img src="'.base_url().'static/i/radio'; if($arr_subchapter_13_1[3]=='Not OK') echo '_checked'; echo '.jpg"></td>';
	echo '<td align="center"><img src="'.base_url().'static/i/radio'; if($arr_subchapter_13_1[3]=='N/A') echo '_checked'; echo '.jpg"></td>';
	echo '<td>'.$this->ifunction->ifnull($arr_subchapter_13_1[6]).'</td></tr>';
}
?>
</table>
<p style="font-size:11px"><i>Note : Measurement & Raw data (softcopy) should be attached</i></p>

<?php $Qsubchapter = $this->db->query("SELECT `content` FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `chapter`='13' AND `no_chapter`='13.2' ORDER BY `subno_chapter_order` ASC"); foreach($Qsubchapter->result_object() as $subchapter) $arr_subchapter_13_2a[]=$subchapter ?>

<h3>Table 13b: VSWR measurement UL & DL with TMA</h3>
<p style="font-size:11px"><i>Standard VSWR Vs Frequency Response: &le; 1.3 (TX freq: 2140Mhz-2145Mhz&RX Freq: 1950Mhz-1955Mhz)</i></p>

<table class="border" cellpadding="0" cellspacing="0">
<tr class="header">
    <td width="40" rowspan="2">Test No</td>
    <td rowspan="2">Test Item</td>
    <td colspan="2">VSWR Max (peak marker)</td>
    <td width="30" rowspan="2">OK</td>
    <td width="40" rowspan="2">Not OK</td>
    <td width="35" rowspan="2">N/A</td>
    <td rowspan="2">Remark</td>
</tr>
<tr class="header"><td>1950Mhz-1955Mhz</td><td>2140Mhz-2145Mhz</td></tr>
<?php
$arr_dt_1321 = array('13.1.1.A', '13.1.1.B', '13.1.2.A', '13.1.2.B', '13.1.3.A', '13.1.3.B');
$arr_dt_1322 = array('Sector 1 A', 'Sector 1 B', 'Sector 2 A', 'Sector 2 B', 'Sector 3 A', 'Sector 3 B');
for($i=0; $i <= 5; $i++){
	$arr_subchapter_13_2 = explode('|', $arr_subchapter_13_2a[$i]->content);
	echo '<tr><td>'.$arr_dt_1321[$i].'</td><td>'.$arr_dt_1322[$i].'</td>';
	echo '<td>'.$this->ifunction->ifnull($arr_subchapter_13_2[4]).'</td>';
	echo '<td>'.$this->ifunction->ifnull($arr_subchapter_13_2[5]).'</td>';
	echo '<td align="center"><img src="'.base_url().'static/i/radio'; if($arr_subchapter_13_2[3]=='OK') echo '_checked'; echo '.jpg"></td>';
	echo '<td align="center"><img src="'.base_url().'static/i/radio'; if($arr_subchapter_13_2[3]=='Not OK') echo '_checked'; echo '.jpg"></td>';
	echo '<td align="center"><img src="'.base_url().'static/i/radio'; if($arr_subchapter_13_2[3]=='N/A') echo '_checked'; echo '.jpg"></td>';
	echo '<td>'.$this->ifunction->ifnull($arr_subchapter_13_2[6]).'</td></tr>';
}
?>
</table>
<p style="font-size:11px"><i>Note: Measurement & Raw data (softcopy) should be attached</i></p>

<hr />

<?php $Qchapter = $this->db->query("SELECT `content` FROM `it_atp_chapter` WHERE `atp_id`='$dx' AND `chapter`='14' ORDER BY `atp_chapter_id` ASC"); foreach($Qchapter->result_object() as $chapter) $arr_chapter_14[]=$chapter ?>

<h3>C. Test should be done when NODE B is On Line</h3>
<table class="border" cellpadding="0" cellspacing="0">
<tr class="header"><td width="40">Chapter</td><td>Title work performed</td><td width="30">OK</td><td width="40">Not OK</td><td width="35">N/A</td><td width="90">Remark</td></tr>
<tr><td valign="top"><b>14</b><br />14.1</td><td valign="top"><b>Checking Downloaded software status</b><br />Downloaded Software Status</td>
<td valign="top" align="center"><br /><img src="<?php echo base_url() ?>static/i/radio<?php if($arr_chapter_14[0]->content=='OK') echo '_checked' ?>.jpg">
<td valign="top" align="center"><br /><img src="<?php echo base_url() ?>static/i/radio<?php if($arr_chapter_14[0]->content=='Not OK') echo '_checked' ?>.jpg">
<td valign="top" align="center"><br /><img src="<?php echo base_url() ?>static/i/radio<?php if($arr_chapter_14[0]->content=='N/A') echo '_checked' ?>.jpg">
<td valign="top" align="center"><br />Major</td>
</tr></table><br />

<?php $Qchapter = $this->db->query("SELECT `content` FROM `it_atp_chapter` WHERE `atp_id`='$dx' AND `chapter`='15' ORDER BY `atp_chapter_id` ASC"); foreach($Qchapter->result_object() as $chapter) $arr_chapter_15[]=$chapter ?>

<table class="border" cellpadding="0" cellspacing="0">
<tr class="header"><td width="40">Chapter</td><td>Title work performed</td><td width="30">OK</td><td width="40">Not OK</td><td width="35">N/A</td><td width="90">Remark</td></tr>
<tr><td valign="top"><b>15</b><br /><br /><br /><br />15.1</td><td valign="top"><b>Checking Hardware Technical Status and Configuration, by comparing site configuration from the OMC-R or Design data against to the actual site configuration.</b><br />Hardware Technical Status & Configuration<br />(Actual Data from site and OMC-R or design must be the same)</td>
<td valign="top" align="center"><br /><br /><br /><br /><img src="<?php echo base_url() ?>static/i/radio<?php if($arr_chapter_15[0]->content=='OK') echo '_checked' ?>.jpg">
<td valign="top" align="center"><br /><br /><br /><br /><img src="<?php echo base_url() ?>static/i/radio<?php if($arr_chapter_15[0]->content=='Not OK') echo '_checked' ?>.jpg">
<td valign="top" align="center"><br /><br /><br /><br /><img src="<?php echo base_url() ?>static/i/radio<?php if($arr_chapter_15[0]->content=='N/A') echo '_checked' ?>.jpg">
<td valign="top" align="center"><br /><br /><br /><br />Major</td>
</tr></table><br />

<?php $Qchapter = $this->db->query("SELECT `content` FROM `it_atp_chapter` WHERE `atp_id`='$dx' AND `chapter`='16' ORDER BY `atp_chapter_id` ASC"); foreach($Qchapter->result_object() as $chapter) $arr_chapter_16[]=$chapter ?>

<table class="border" cellpadding="0" cellspacing="0">
<tr class="header"><td width="40">Chapter</td><td>Title work performed</td><td width="30">OK</td><td width="40">Not OK</td><td width="35">N/A</td><td width="90">Remark</td></tr>
<tr><td valign="top"><b>16</b><br /><br />16.1<br /><br />16.2</td><td valign="top"><b>Checking status & functionality of NODE B Internal & External Alarm</b><br />Checking status & Functionality of NODE B Internal Alarm by doing simulation test on NODE B<br />Checking status & functionality External alarms by doing simulation test on transducer/sensor<br />(All active alarms should be cleared)</td>
<td valign="top" align="center">
<?php echo '<br /><br />';
for($i=0; $i <= 1; $i++){
    echo '<img src="'.base_url().'static/i/radio'; if($arr_chapter_16[$i]->content=='OK') echo '_checked'; echo '.jpg"><br />';
	if($i==0) echo '<br />';
}
?>
</td><td valign="top" align="center">
<?php echo '<br /><br />';
for($i=0; $i <= 1; $i++){
    echo '<img src="'.base_url().'static/i/radio'; if($arr_chapter_16[$i]->content=='Not OK') echo '_checked'; echo '.jpg"><br />';
    if($i==0) echo '<br />';
}
?>
</td><td valign="top" align="center">
<?php echo '<br /><br />';
for($i=0; $i <= 1; $i++){
    echo '<img src="'.base_url().'static/i/radio'; if($arr_chapter_16[$i]->content=='N/A') echo '_checked'; echo '.jpg"><br />';
    if($i==0) echo '<br />';
}
?>
</td><td valign="top" align="center"><br /><br />Major<br /><br />Major</td></tr>
</table>

<?php $Qsubchapter = $this->db->query("SELECT `content` FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `chapter`='16' AND `no_chapter`='16.1' ORDER BY `subno_chapter_order` ASC"); foreach($Qsubchapter->result_object() as $subchapter) $arr_subchapter_16_1a[]=$subchapter ?>

<h3>Table 16: NODE B Internal Alarm</h3>
<table class="border" cellpadding="0" cellspacing="0">
<tr class="header">
    <td width="40" rowspan="2">Test no</td>
    <td rowspan="2">Alarm Test</td>
    <td colspan="3">Status NODE B</td>
    <td rowspan="2">Remark</td>
</tr>
<tr class="header"><td width="30">OK</td><td width="40">Not OK</td><td width="35">N/A</td></tr>
<?php
$arr_dt_161 = array('Loss Of Signal At Ir Interface', 'E1/t1 Link Loss Of Frame Alarm', 'Board Communication Link Is Interrupted.', 'Application Software Monitoring Alarm.');
for($i=0; $i <= 3; $i++){
	$arr_subchapter_16_1 = explode('|', $arr_subchapter_16_1a[$i]->content);
	echo '<tr><td>16.1.'.($i +1).'</td><td>'.$arr_dt_161[$i].'</td>';
	echo '<td align="center"><img src="'.base_url().'static/i/radio'; if($arr_subchapter_16_1[3]=='OK') echo '_checked'; echo '.jpg"></td>';
	echo '<td align="center"><img src="'.base_url().'static/i/radio'; if($arr_subchapter_16_1[3]=='Not OK') echo '_checked'; echo '.jpg"></td>';
	echo '<td align="center"><img src="'.base_url().'static/i/radio'; if($arr_subchapter_16_1[3]=='N/A') echo '_checked'; echo '.jpg"></td>';
	echo '<td>'.$this->ifunction->ifnull($arr_subchapter_16_1[4]).'</td></tr>';
}
?>
</table>

<hr />

<?php $Qsubchapter = $this->db->query("SELECT `content` FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `chapter`='16' AND `no_chapter`='16.2' ORDER BY `subno_chapter_order` ASC"); foreach($Qsubchapter->result_object() as $subchapter) $arr_subchapter_16_2a[]=$subchapter ?>

<h3>Table 16: NODE B External Alarm (Alarm Text = 6 first character of Cell ID + Alarm type)</h3>
<table class="border" cellpadding="0" cellspacing="0">
<tr class="header">
    <td width="40" rowspan="2">Test no</td>
    <td width="40" rowspan="2">Port No</td>
    <td rowspan="2">Alarm Type</td>
    <td colspan="3">Status NODE B1<br />/ NODE B2</td>
    <td width="90" rowspan="2">Remark</td>
</tr>
<tr class="header"><td width="30">OK</td><td width="40">Not OK</td><td width="35">N/A</td></tr>
<?php
for($i=0; $i <= 15; $i++){
	$arr_subchapter_16_2 = explode('|', $arr_subchapter_16_2a[$i]->content);
	echo '<tr><td>16.2.'.($i +1).'</td><td align="center"> '.($i +1).'</td>';
	echo '<td>'.$this->ifunction->ifnull($arr_subchapter_16_2[4]).'</td>';
	echo '<td align="center"><img src="'.base_url().'static/i/radio'; if($arr_subchapter_16_2[3]=='OK') echo '_checked'; echo '.jpg"></td>';
	echo '<td align="center"><img src="'.base_url().'static/i/radio'; if($arr_subchapter_16_2[3]=='Not OK') echo '_checked'; echo '.jpg"></td>';
	echo '<td align="center"><img src="'.base_url().'static/i/radio'; if($arr_subchapter_16_2[3]=='N/A') echo '_checked'; echo '.jpg"></td>';
	echo '<td>'.$this->ifunction->ifnull($arr_subchapter_16_2[5]).'</td></tr>';
}
?>
</table>
<p style="font-size:11px"><b>Note:</b><br />- All alarm type must be defined in NODE B even if it is not used (put the loop back)<br />- All External alarm port must be terminated on LSA  DDF and stick with labels <br />- Temperature Alarm setting value must be defined according to NODE B specification<br />Only new site 3G cabinet  need connect to the existing external alarm box</i></p>


<?php $Qchapter = $this->db->query("SELECT `content` FROM `it_atp_chapter` WHERE `atp_id`='$dx' AND `chapter`='17' ORDER BY `atp_chapter_id` ASC"); foreach($Qchapter->result_object() as $chapter) $arr_chapter_17[]=$chapter ?>

<table class="border" cellpadding="0" cellspacing="0">
<tr class="header"><td width="40">Chapter</td><td>Title work performed</td><td width="30">OK</td><td width="40">Not OK</td><td width="35">N/A</td><td width="90">Remark</td></tr>
<tr><td valign="top"><b>17</b><br />17.1<br />17.2<br />17.3<br />17.4<br />17.5<br />17.6<br />17.7<br />17.8<br />17.9</td><td valign="top"><b>Mobile Originating & Terminating Test Call (must be successful)</b><br />Voice Test Call<br />Video Test Call<br />Packet Switch Test Call<br />HSDPA Test Call (if the transmission capacity available)<br />SMS Test Call<br />MMS Test Call<br />Incoming & Outgoing softer Hand Over Test<br />Handover Test between 2G and 3G network<br />Emergency Call (118, 112)</td>
<td valign="top" align="center">
<?php echo '<br />';
for($i=0; $i <= 8; $i++){
    echo '<img src="'.base_url().'static/i/radio'; if($arr_chapter_17[$i]->content=='OK') echo '_checked'; echo '.jpg"><br />';
}
?>
</td><td valign="top" align="center">
<?php echo '<br />';
for($i=0; $i <= 8; $i++){
    echo '<img src="'.base_url().'static/i/radio'; if($arr_chapter_17[$i]->content=='Not OK') echo '_checked'; echo '.jpg"><br />';
}
?>
</td><td valign="top" align="center">
<?php echo '<br />';
for($i=0; $i <= 8; $i++){
    echo '<img src="'.base_url().'static/i/radio'; if($arr_chapter_17[$i]->content=='N/A') echo '_checked'; echo '.jpg"><br />';
}
?>
</td><td valign="top" align="center"><?php echo '<br />'; for($i=0; $i <= 8; $i++) echo 'Major<br />' ?></td></tr>
</table>
<p style="font-size:11px"><i>Note: 18.9 Emergency call number should be configure in MSC</i></p>

<hr />

<?php $Qsubchapter = $this->db->query("SELECT `content` FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `chapter`='17' AND `no_chapter`='17.1' ORDER BY `subno_chapter_order` ASC"); foreach($Qsubchapter->result_object() as $subchapter) $arr_subchapter_17_1a[]=$subchapter ?>

<h3>Chapter 17.1: Voice Test Call</h3>
<table class="border" cellpadding="0" cellspacing="0">
<tr class="header">
    <td rowspan="2">Item Test</td>
    <td rowspan="2">MO Number</td>
    <td rowspan="2">MT Number</td>
    <td colspan="3">Test Call Result</td>
    <td width="90" rowspan="2">Remark</td>
</tr>
<tr class="header"><td width="30">OK</td><td width="35">NOK</td><td width="35">N/A</td></tr>
<?php
$arr_dt_171 = array('Mobile Originating', 'Mobile Terminating');
for($i=0; $i <= 1; $i++){
	$arr_subchapter_17_1 = explode('|', $arr_subchapter_17_1a[$i]->content);
	echo '<tr><td>'.$arr_dt_171[$i].'</td>';
	echo '<td>'.$this->ifunction->ifnull($arr_subchapter_17_1[4]).'</td>';
	echo '<td>'.$this->ifunction->ifnull($arr_subchapter_17_1[5]).'</td>';
	echo '<td align="center"><img src="'.base_url().'static/i/radio'; if($arr_subchapter_17_1[3]=='OK') echo '_checked'; echo '.jpg"></td>';
	echo '<td align="center"><img src="'.base_url().'static/i/radio'; if($arr_subchapter_17_1[3]=='Not OK') echo '_checked'; echo '.jpg"></td>';
	echo '<td align="center"><img src="'.base_url().'static/i/radio'; if($arr_subchapter_17_1[3]=='N/A') echo '_checked'; echo '.jpg"></td>';
	echo '<td>'.$this->ifunction->ifnull($arr_subchapter_17_1[6]).'</td></tr>';
}
?>
</table>

<?php $Qsubchapter = $this->db->query("SELECT `content` FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `chapter`='17' AND `no_chapter`='17.2' ORDER BY `subno_chapter_order` ASC"); foreach($Qsubchapter->result_object() as $subchapter) $arr_subchapter_17_2a[]=$subchapter ?>

<h3>Chapter 17.2: Video Test Call</h3>
<table class="border" cellpadding="0" cellspacing="0">
<tr class="header">
    <td rowspan="2">Item Test</td>
    <td rowspan="2">MO Number</td>
    <td rowspan="2">MT Number</td>
    <td colspan="3">Test Call Result</td>
    <td width="90" rowspan="2">Remark</td>
</tr>
<tr class="header"><td width="30">OK</td><td width="35">NOK</td><td width="35">N/A</td></tr>
<?php
$arr_dt_172 = array('Mobile Originating', 'Mobile Terminating');
for($i=0; $i <= 1; $i++){
	$arr_subchapter_17_2 = explode('|', $arr_subchapter_17_2a[$i]->content);
	echo '<tr><td>'.$arr_dt_172[$i].'</td>';
	echo '<td>'.$this->ifunction->ifnull($arr_subchapter_17_2[4]).'</td>';
	echo '<td>'.$this->ifunction->ifnull($arr_subchapter_17_2[5]).'</td>';
	echo '<td align="center"><img src="'.base_url().'static/i/radio'; if($arr_subchapter_17_2[3]=='OK') echo '_checked'; echo '.jpg"></td>';
	echo '<td align="center"><img src="'.base_url().'static/i/radio'; if($arr_subchapter_17_2[3]=='Not OK') echo '_checked'; echo '.jpg"></td>';
	echo '<td align="center"><img src="'.base_url().'static/i/radio'; if($arr_subchapter_17_2[3]=='N/A') echo '_checked'; echo '.jpg"></td>';
	echo '<td>'.$this->ifunction->ifnull($arr_subchapter_17_2[6]).'</td></tr>';
}
?>
</table>

<?php $Qsubchapter = $this->db->query("SELECT `content` FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `chapter`='17' AND `no_chapter`='17.3' ORDER BY `subno_chapter_order` ASC"); foreach($Qsubchapter->result_object() as $subchapter) $arr_subchapter_17_3a[]=$subchapter ?>

<h3>Chapter 17.3: Packet Switch Test Call</h3>
<table class="border" cellpadding="0" cellspacing="0">
<tr class="header">
    <td rowspan="2">Item Test</td>
    <td rowspan="2">MO Number</td>
    <td rowspan="2">Host Address</td>
    <td colspan="3">Test Call Result</td>
    <td width="90" rowspan="2">Remark</td>
</tr>
<tr class="header"><td width="30">OK</td><td width="35">NOK</td><td width="35">N/A</td></tr>
<?php
$arr_dt_173 = array('PING', 'WAP', 'HTTP', 'FTP Downlink', 'FTP Uplink', 'Video Streaming');
for($i=0; $i <= 5; $i++){
	$arr_subchapter_17_3 = explode('|', $arr_subchapter_17_3a[$i]->content);
	echo '<tr><td>'.$arr_dt_173[$i].'</td>';
	echo '<td>'.$this->ifunction->ifnull($arr_subchapter_17_3[4]).'</td>';
	echo '<td>'.$this->ifunction->ifnull($arr_subchapter_17_3[5]).'</td>';
	echo '<td align="center"><img src="'.base_url().'static/i/radio'; if($arr_subchapter_17_3[3]=='OK') echo '_checked'; echo '.jpg"></td>';
	echo '<td align="center"><img src="'.base_url().'static/i/radio'; if($arr_subchapter_17_3[3]=='Not OK') echo '_checked'; echo '.jpg"></td>';
	echo '<td align="center"><img src="'.base_url().'static/i/radio'; if($arr_subchapter_17_3[3]=='N/A') echo '_checked'; echo '.jpg"></td>';
	echo '<td>'.$this->ifunction->ifnull($arr_subchapter_17_3[6]).'</td></tr>';
}
?>
</table>
<p style="font-size:11px"><i>Notes: This test is only test the function, not measure the quality for KPI</i></p>

<?php $Qsubchapter = $this->db->query("SELECT `content` FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `chapter`='17' AND `no_chapter`='17.4' ORDER BY `subno_chapter_order` ASC"); foreach($Qsubchapter->result_object() as $subchapter) $arr_subchapter_17_4a[]=$subchapter ?>

<h3>Chapter 17.4: HSDPA Test Call</h3>
<table class="border" cellpadding="0" cellspacing="0">
<tr class="header">
    <td rowspan="2">Item Test</td>
    <td rowspan="2">MO Number</td>
    <td rowspan="2">Host Address</td>
    <td colspan="3">Test Call Result</td>
    <td width="90" rowspan="2">Remark</td>
</tr>
<tr class="header"><td width="30">OK</td><td width="35">NOK</td><td width="35">N/A</td></tr>
<?php
$arr_dt_174 = array('PING', 'WAP', 'HTTP', 'FTP Downlink', 'FTP Uplink', 'Video Streaming');
for($i=0; $i <= 5; $i++){
	$arr_subchapter_17_4 = explode('|', $arr_subchapter_17_4a[$i]->content);
	echo '<tr><td>'.$arr_dt_174[$i].'</td>';
	echo '<td>'.$this->ifunction->ifnull($arr_subchapter_17_4[4]).'</td>';
	echo '<td>'.$this->ifunction->ifnull($arr_subchapter_17_4[5]).'</td>';
	echo '<td align="center"><img src="'.base_url().'static/i/radio'; if($arr_subchapter_17_4[3]=='OK') echo '_checked'; echo '.jpg"></td>';
	echo '<td align="center"><img src="'.base_url().'static/i/radio'; if($arr_subchapter_17_4[3]=='Not OK') echo '_checked'; echo '.jpg"></td>';
	echo '<td align="center"><img src="'.base_url().'static/i/radio'; if($arr_subchapter_17_4[3]=='N/A') echo '_checked'; echo '.jpg"></td>';
	echo '<td>'.$this->ifunction->ifnull($arr_subchapter_17_4[6]).'</td></tr>';
}
?>
</table>
<p style="font-size:11px"><i>Notes: This test is only test the function, not measure  the quality for KPI</i></p>

<?php $Qsubchapter = $this->db->query("SELECT `content` FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `chapter`='17' AND `no_chapter`='17.5' ORDER BY `subno_chapter_order` ASC"); foreach($Qsubchapter->result_object() as $subchapter) $arr_subchapter_17_5a[]=$subchapter ?>

<h3>Chapter 17.5: SMS Test Call</h3>
<table class="border" cellpadding="0" cellspacing="0">
<tr class="header">
    <td rowspan="2">Item Test</td>
    <td rowspan="2">MO Number</td>
    <td rowspan="2">MT Number</td>
    <td colspan="3">Test Call Result</td>
    <td width="90" rowspan="2">Remark</td>
</tr>
<tr class="header"><td width="30">OK</td><td width="40">NOK</td><td width="35">N/A</td></tr>
<?php
$arr_dt_175 = array('Mobile Originating', 'Mobile Terminating');
for($i=0; $i <= 1; $i++){
	$arr_subchapter_17_5 = explode('|', $arr_subchapter_17_5a[$i]->content);
	echo '<tr><td>'.$arr_dt_175[$i].'</td>';
	echo '<td>'.$this->ifunction->ifnull($arr_subchapter_17_5[4]).'</td>';
	echo '<td>'.$this->ifunction->ifnull($arr_subchapter_17_5[5]).'</td>';
	echo '<td align="center"><img src="'.base_url().'static/i/radio'; if($arr_subchapter_17_5[3]=='OK') echo '_checked'; echo '.jpg"></td>';
	echo '<td align="center"><img src="'.base_url().'static/i/radio'; if($arr_subchapter_17_5[3]=='Not OK') echo '_checked'; echo '.jpg"></td>';
	echo '<td align="center"><img src="'.base_url().'static/i/radio'; if($arr_subchapter_17_5[3]=='N/A') echo '_checked'; echo '.jpg"></td>';
	echo '<td>'.$this->ifunction->ifnull($arr_subchapter_17_5[6]).'</td></tr>';
}
?>
</table>
<p style="font-size:11px"><i>Notes: SMS function needs CN support</i></p>

<hr />

<?php $Qsubchapter = $this->db->query("SELECT `content` FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `chapter`='17' AND `no_chapter`='17.6' ORDER BY `subno_chapter_order` ASC"); foreach($Qsubchapter->result_object() as $subchapter) $arr_subchapter_17_6a[]=$subchapter ?>

<h3>Chapter 17.6 MMS Test Call</h3>
<table class="border" cellpadding="0" cellspacing="0">
<tr class="header">
    <td rowspan="2">Item Test</td>
    <td rowspan="2">MO Number</td>
    <td rowspan="2">MT Number</td>
    <td colspan="3">Test Call Result</td>
    <td width="90" rowspan="2">Remark</td>
</tr>
<tr class="header"><td width="30">OK</td><td width="35">NOK</td><td width="35">N/A</td></tr>
<?php
$arr_dt_176 = array('Mobile Originating', 'Mobile Terminating');
for($i=0; $i <= 1; $i++){
	$arr_subchapter_17_6 = explode('|', $arr_subchapter_17_6a[$i]->content);
	echo '<tr><td>'.$arr_dt_176[$i].'</td>';
	echo '<td>'.$this->ifunction->ifnull($arr_subchapter_17_6[4]).'</td>';
	echo '<td>'.$this->ifunction->ifnull($arr_subchapter_17_6[5]).'</td>';
	echo '<td align="center"><img src="'.base_url().'static/i/radio'; if($arr_subchapter_17_6[3]=='OK') echo '_checked'; echo '.jpg"></td>';
	echo '<td align="center"><img src="'.base_url().'static/i/radio'; if($arr_subchapter_17_6[3]=='Not OK') echo '_checked'; echo '.jpg"></td>';
	echo '<td align="center"><img src="'.base_url().'static/i/radio'; if($arr_subchapter_17_6[3]=='N/A') echo '_checked'; echo '.jpg"></td>';
	echo '<td>'.$this->ifunction->ifnull($arr_subchapter_17_6[6]).'</td></tr>';
}
?>
</table>
<p style="font-size:11px"><i>Notes: MMS function needs Core Network support</i></p>

<?php $Qsubchapter = $this->db->query("SELECT `content` FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `chapter`='17' AND `no_chapter`='17.7' ORDER BY `subno_chapter_order` ASC"); foreach($Qsubchapter->result_object() as $subchapter) $arr_subchapter_17_7a[]=$subchapter ?>

<h3>Chapter 17.7: Incoming & Outgoing softer Handover Test</h3>
<table class="border" cellpadding="0" cellspacing="0">
<tr class="header">
    <td rowspan="2">Item Test</td>
    <td rowspan="2">Originating Cell Id</td>
    <td rowspan="2">Destination Cell Id</td>
    <td colspan="3">Test Call Result</td>
    <td width="90" rowspan="2">Remark</td>
</tr>
<tr class="header"><td width="30">OK</td><td width="35">NOK</td><td width="35">N/A</td></tr>
<?php
$arr_dt_177 = array('Incoming Handover', 'Outgoing Handover', 'Incoming Handover', 'Outgoing Handover', 'Incoming Handover', 'Outgoing Handover');
echo '<tr><td>SECTOR 1</td><td></td><td></td><td></td><td></td><td></td><td></td></tr>';
for($i=0; $i <= 5; $i++){
	$arr_subchapter_17_7 = explode('|', $arr_subchapter_17_7a[$i]->content);	
	echo '<tr><td>'.$arr_dt_177[$i].'</td>';
	echo '<td>'.$this->ifunction->ifnull($arr_subchapter_17_7[4]).'</td>';
	echo '<td>'.$this->ifunction->ifnull($arr_subchapter_17_7[5]).'</td>';
	echo '<td align="center"><img src="'.base_url().'static/i/radio'; if($arr_subchapter_17_7[3]=='OK') echo '_checked'; echo '.jpg"></td>';	
	echo '<td align="center"><img src="'.base_url().'static/i/radio'; if($arr_subchapter_17_7[3]=='Not OK') echo '_checked'; echo '.jpg"></td>';
	echo '<td align="center"><img src="'.base_url().'static/i/radio'; if($arr_subchapter_17_7[3]=='N/A') echo '_checked'; echo '.jpg"></td>';
	echo '<td>'.$this->ifunction->ifnull($arr_subchapter_17_7[6]).'</td></tr>';
	if($i==1) echo '<tr><td>SECTOR 2</td><td></td><td></td><td></td><td></td><td></td><td></td></tr>';
	if($i==3) echo '<tr><td>SECTOR 3</td><td></td><td></td><td></td><td></td><td></td><td></td></tr>';
}
?>
</table>

<?php $Qsubchapter = $this->db->query("SELECT `content` FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `chapter`='17' AND `no_chapter`='17.8' ORDER BY `subno_chapter_order` ASC"); foreach($Qsubchapter->result_object() as $subchapter) $arr_subchapter_17_8a[]=$subchapter ?>

<h3>Chapter 17.8: Handover between 2G and 3G network</h3>
<table class="border" cellpadding="0" cellspacing="0">
<tr class="header">
    <td rowspan="2">State</td>
    <td rowspan="2">Scenario</td>
    <td colspan="3">Test Result</td>
    <td width="90" rowspan="2">Remark</td>
</tr>
<tr class="header"><td width="30">OK</td><td width="35">NOK</td><td width="35">N/A</td></tr>
<?php
$arr_dt_1781 = array('Idle State', ' ', 'On Call State');
$arr_dt_1782 = array('Handover from 2G to 3G network', 'Handover from 3G to 2G network', 'Handover from 2G to 3G network', 'Handover from 3G to 2G network');
for($i=0; $i <= 3; $i++){
	$arr_subchapter_17_8 = explode('|', $arr_subchapter_17_8a[$i]->content);
	echo '<tr><td>'.$arr_dt_1781[$i].'</td><td>'.$arr_dt_1782[$i].'</td>';
	echo '<td align="center"><img src="'.base_url().'static/i/radio'; if($arr_subchapter_17_8[3]=='OK') echo '_checked'; echo '.jpg"></td>';
	echo '<td align="center"><img src="'.base_url().'static/i/radio'; if($arr_subchapter_17_8[3]=='Not OK') echo '_checked'; echo '.jpg"></td>';
	echo '<td align="center"><img src="'.base_url().'static/i/radio'; if($arr_subchapter_17_8[3]=='N/A') echo '_checked'; echo '.jpg"></td>';
	echo '<td>'.$this->ifunction->ifnull($arr_subchapter_17_8[4]).'</td></tr>';
}
?>
</table>

<?php $Qsubchapter = $this->db->query("SELECT `content` FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `chapter`='17' AND `no_chapter`='17.9' ORDER BY `subno_chapter_order` ASC"); foreach($Qsubchapter->result_object() as $subchapter) $arr_subchapter_17_9a[]=$subchapter ?>

<h3>Chapter 17.9: Emergency Test Call</h3>
<table class="border" cellpadding="0" cellspacing="0">
<tr class="header">
    <td width="40" rowspan="2">Item Test</td>
    <td rowspan="2">MO Number</td>
    <td width="50" rowspan="2">MT Number</td>
    <td colspan="3">Test Call Result</td>
    <td width="90" rowspan="2">Remark</td>
</tr>
<tr class="header"><td width="30">OK</td><td width="35">NOK</td><td width="35">N/A</td></tr>
<?php
$arr_dt_179 = array('112', '118');
for($i=0; $i <= 1; $i++){
	$arr_subchapter_17_9 = explode('|', $arr_subchapter_17_9a[$i]->content);
	echo '<tr><td align="center">'.$arr_dt_179[$i].'</td>';
	echo '<td>'.$this->ifunction->ifnull($arr_subchapter_17_9[4]).'</td>';
	echo '<td align="center">'.$arr_dt_179[$i].'</td>';
	echo '<td align="center"><img src="'.base_url().'static/i/radio'; if($arr_subchapter_17_9[3]=='OK') echo '_checked'; echo '.jpg"></td>';
	echo '<td align="center"><img src="'.base_url().'static/i/radio'; if($arr_subchapter_17_9[3]=='Not OK') echo '_checked'; echo '.jpg"></td>';
	echo '<td align="center"><img src="'.base_url().'static/i/radio'; if($arr_subchapter_17_9[3]=='N/A') echo '_checked'; echo '.jpg"></td>';
	echo '<td>'.$this->ifunction->ifnull($arr_subchapter_17_9[5]).'</td></tr>';
}
?>
</table><br />

<?php $Qchapter = $this->db->query("SELECT `content` FROM `it_atp_chapter` WHERE `atp_id`='$dx' AND `chapter`='18' ORDER BY `atp_chapter_id` ASC"); foreach($Qchapter->result_object() as $chapter) $arr_chapter_18[]=$chapter ?>

<table class="border" cellpadding="0" cellspacing="0">
<tr class="header"><td width="40">Chapter</td><td>Title work performed</td><td width="30">OK</td><td width="40">Not OK</td><td width="35">N/A</td><td width="90">Remark</td></tr>
<tr><td valign="top"><b>18</b><br /><br />18.1<br />18.2<br />18.3</td><td valign="top"><b>Checking Site Condition (Cleanliness Check)</b><br />Before leaving the site:<br />Site condition must be clean<br />No damage at site environment<br />All Infrastructures inside the NODE B must have the same condition as previous</td>
<td valign="top" align="center">
<?php echo '<br /><br />';
for($i=0; $i <= 2; $i++){
    echo '<img src="'.base_url().'static/i/radio'; if($arr_chapter_18[$i]->content=='OK') echo '_checked'; echo '.jpg"><br />';
}
?>
</td><td valign="top" align="center">
<?php echo '<br /><br />';
for($i=0; $i <= 2; $i++){
    echo '<img src="'.base_url().'static/i/radio'; if($arr_chapter_18[$i]->content=='Not OK') echo '_checked'; echo '.jpg"><br />';
}
?>
</td><td valign="top" align="center">
<?php echo '<br /><br />';
for($i=0; $i <= 2; $i++){
    echo '<img src="'.base_url().'static/i/radio'; if($arr_chapter_18[$i]->content=='N/A') echo '_checked'; echo '.jpg"><br />';
}
?>
</td><td valign="top" align="center"><?php echo '<br /><br />'; for($i=0; $i <= 2; $i++) echo 'Major<br />' ?></td></tr>
</table>

<hr />

<p align="center"><b>Table 2<br />Note - Comments - Fault</b></p>
<table class="border" cellpadding="0" cellspacing="0">
<tr class="header"><td width="20" align="center">No</td><td align="center">Problems</td><td align="center">Cleared</td></tr>
<?php for($i=1; $i <= 5; $i++) echo '<tr valign="top"><td align="center" height="50">'.$i.'</td><td>Chapter:<br />Description:</td><td>Name:<br />Date:</td></tr>' ?>
</table><br />

<div style="border:1px solid #000;padding:10px">
<img src="<?php echo base_url() ?>static/i/radio.jpg" /> OK<br /><img src="<?php echo base_url() ?>static/i/radio.jpg" /> Not OK
<p style="font-size:11px">Note: If there is no major remark, this document can be signed by Indosat technical representative as Node-B Functionality Test Result of  ZTE 3G Network Trial</p>
<table cellpadding="0" cellspacing="0" style="width:600px;margin:20px auto">
<tr><td colspan="2"></td><td>(date)<span style="border-bottom:1px dotted #000;padding:0 75px">&nbsp;</span></td></tr>
<tr><td>VENDOR Representative,</td><td width="250"></td><td>Indosat Technical Representative,</td></tr>
<tr valign="bottom"><td height="70">(<span style="border-bottom:1px dotted #000;padding:0 75px">&nbsp;</span>)</td><td></td><td>(<span style="border-bottom:1px dotted #000;padding:0 75px">&nbsp;</span>)</td></tr>
<tr><td colspan="2"></td><td>NIK:<br />PT. INDOSAT</td></tr>
</table>
</div>