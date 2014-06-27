<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed') ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xml:lang="en" xmlns="http://www.w3.org/1999/xhtml" lang="en">
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
<title>ATP - Ericsson 2G</title>
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

<p id="logo"><img src="<?php echo base_url() ?>static/i/indosat.jpg" /></p>

<h1>ATP BTS 2G<br />RBS 6000 FAMILY<br />(Indoor / Outdoor)</h1><br /><br />
<h2>Acceptance Manual version 1.4<br />2011</h2>

<table class="footer" cellpadding="0" cellspacing="0" style="margin-top:100px">
<tr><td width="110">Project Name</td><td align="center" width="10">:</td><td></td></tr>
<tr><td>Project Description</td><td align="center">:</td><td></td></tr>
<tr><td>PO. Number</td><td align="center">:</td><td></td></tr>
<tr><td>Area</td><td align="center">:</td><td></td></tr>
</table>

<hr />
<?php } if($cover == 1) die('</body></html>') ?>

<?php $Qatp = $this->db->query("
					SELECT b.`id`, b.`name`, b.`address`
					FROM `it_atp` a
					LEFT JOIN `it_site` b ON b.`site_id`=a.`site_id`
					WHERE a.`atp_id`='$dx'");
					$atp = $Qatp->result_object() ?>
                    
<h3>Identification</h3>
<table class="border" cellpadding="0" cellspacing="0">
<tr>
	<td valign="top"><font color="#666">Site ID:</font> <?php echo $atp[0]->id ?><p style="margin-bottom:0"><font color="#666">Site Name:</font> <?php echo $atp[0]->name ?></p></td>
    <td valign="top"><font color="#666">Site Address:</font> <?php echo $atp[0]->address ?></td>
</tr>
</table>

<?php
$Qei1 = $this->db->query("SELECT `subno_chapter`, `content` FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `chapter`='-1' AND `no_chapter`='-1.1' ORDER BY `subno_chapter_order` ASC");
$ei1 = $Qei1->result_object(); $dt_ei1 = explode('|', $ei1[0]->content);

$Qei2 = $this->db->query("SELECT `subno_chapter`, `content` FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `chapter`='-2' AND `no_chapter`='-2.1' ORDER BY `subno_chapter_order` ASC");
foreach($Qei2->result_object() as $ei2) $arr_ei2[]=$ei2;

$dt_ei2a = explode('|', $arr_ei2[0]->content);
$dt_ei2b = explode('|', $arr_ei2[1]->content);

$Qei3 = $this->db->query("SELECT `subno_chapter`, `content` FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `chapter`='-3' AND `no_chapter`='-3.1' ORDER BY `subno_chapter_order` ASC");
$ei3 = $Qei3->result_object(); $dt_ei3 = explode('|', $ei3[0]->content);

$Qei4 = $this->db->query("SELECT `subno_chapter`, `content` FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `chapter`='-4' AND `no_chapter`='-4.1' ORDER BY `subno_chapter_order` ASC");
foreach($Qei4->result_object() as $ei4) $arr_ei4[]=$ei4;

$Qei5 = $this->db->query("SELECT `subno_chapter`, `content` FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `chapter`='-5' AND `no_chapter`='-5.1' ORDER BY `subno_chapter_order` ASC");
foreach($Qei5->result_object() as $ei5) $arr_ei5[]=$ei5;

$dt_ei5a = explode('|', $arr_ei5[0]->content);
$dt_ei5b = explode('|', $arr_ei5[1]->content);

$Qei6 = $this->db->query("SELECT `subno_chapter`, `content` FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `chapter`='-6' AND `no_chapter`='-6.1' ORDER BY `subno_chapter_order` ASC");
$ei6 = $Qei6->result_object(); $dt_ei6 = explode('|', $ei6[0]->content);
?>
<h3>Equipment Identification</h3>
<table cellpadding="0" cellspacing="0">
<tr valign="top">
	<td width="80">Type</td><td align="center" width="10">:</td>
    <td>
    <img src="<?php echo base_url() ?>static/i/checkbox<?php if($dt_ei1[3]=='true') echo '_checked' ?>.jpg"> RBS 6201
    <span style="padding:0 15px">&nbsp;</span>
    <img src="<?php echo base_url() ?>static/i/checkbox<?php if($dt_ei1[4]=='true') echo '_checked' ?>.jpg"> RBS 6102
    </td>
</tr>
<tr valign="top">
	<td><br />RBS Configuration</td><td align="center"><br />:</td>
    <td>
    	<br />
        <table class="border" cellpadding="0" cellspacing="0">
        <tr class="header">
        	<td>BAND</td><td>Installed TRX</td><td>Activated TRX</td><td>Factory Serial Number RBS</td>
		</tr>
        <tr>
            <td>GSM 900</td>
            <td><?php echo $this->ifunction->ifnull($dt_ei2a[3]) ?></td>
            <td><?php echo $this->ifunction->ifnull($dt_ei2a[4]) ?></td>
            <td><?php echo $this->ifunction->ifnull($dt_ei2a[5]) ?></td>
        </tr>
        <tr>
            <td>DCS 1800</td>
            <td><?php echo $this->ifunction->ifnull($dt_ei2b[3]) ?></td>
            <td><?php echo $this->ifunction->ifnull($dt_ei2b[4]) ?></td>
            <td><?php echo $this->ifunction->ifnull($dt_ei2b[5]) ?></td>
		</tr>
        </table>
        <br />
    </td>
</tr>
<tr valign="top">
	<td>Sites Profile</td><td align="center">:</td>
    <td>
    <img src="<?php echo base_url() ?>static/i/checkbox<?php if($dt_ei3[3]=='true') echo '_checked' ?>.jpg"> Predefined / New Site
    <span style="padding:0 15px">&nbsp;</span>
    <img src="<?php echo base_url() ?>static/i/checkbox<?php if($dt_ei3[4]=='true') echo '_checked' ?>.jpg"> Ex. IM3 Site
    <span style="padding:0 15px">&nbsp;</span>
    <img src="<?php echo base_url() ?>static/i/checkbox<?php if($dt_ei3[5]=='true') echo '_checked' ?>.jpg"> Ex. SAT-C Site
    </td>
</tr>
</table>

<h3>Documents reference</h3>
<table class="footer" cellpadding="0" cellspacing="0">
<tr><td>Document</td><td width="10" style="border:none"></td><td>Document</td></tr>
<tr><td>1/006 51-LZA 701 6002 Uen, Fault List RBS 6000</td><td style="border:none"></td><td>MOP Implementation Multi Carrier Power Amplifier (MCPA) RBS G11B ISAT Project 2011</td></tr>
<tr><td>EID-11:003826 Uen,  MoP Configuring RBS 6000 GSM with RUS</td><td style="border:none"></td><td>EID-11:007012 Uen.Method of Procedure Swap RBS2000 to RBS6000 (include Re-deploy)</td></tr>
<tr><td>EID-09:016940 RevB, Petunjuk Instalasi RBS 6000 Ericsson Indonesia</td><td style="border:none"></td><td>EID/Z/I-O5: 124 Uen: MOP ATP</td></tr>
<tr><td>1/1531-LZA7016001 Uen A2: RBS 6201 Installation Instruction</td><td style="border:none"></td><td>EN/LZT 735 0 018 Uen R1A Grounding Guideline</td></tr>
<tr><td>EN/LZN 720 1001 R4A, GSM RBS 6201 V2, G10A to G11A</td><td style="border:none"></td><td>Guidelines Installation, PBC 6200</td></tr>
</table>

<h3>Remark For Outstanding Items</h3>
<table class="footer" cellpadding="0" cellspacing="0">
<tr class="header"><td width="10">No.</td><td>Subject</td><td>Solved by</td><td>Date</td><td>Sign</td></tr>
<?php
for($i=0; $i <= 3; $i++){
	$dt_ei4 = explode('|', $arr_ei4[$i]->content);
	echo '<tr><td align="center">'.($i+1).'</td><td>'.$this->ifunction->ifnull($dt_ei4[3]).'</td><td>'.$this->ifunction->ifnull($dt_ei4[4]).'</td><td>'.$this->ifunction->ifnull($dt_ei4[5]).'</td><td>'.$this->ifunction->ifnull($dt_ei4[6]).'</td></tr>';
}
?>  
</table>

<h3>Signature of concerned people</h3>
<table class="footer" cellpadding="0" cellspacing="0" style="margin:5px 0 0 0">
<tr valign="top">
	<td>INDOSAT<br />Name:<br />1. <?php echo $this->ifunction->ifnull($dt_ei5a[3]) ?><br />2. <?php echo $this->ifunction->ifnull($dt_ei5b[3]) ?></td>
    <td><br />Signature</td>
    <td>ERICSSON<br />Name:<br />1. <?php echo $this->ifunction->ifnull($dt_ei5a[4]) ?><br />2. <?php echo $this->ifunction->ifnull($dt_ei5b[4]) ?></td>
    <td><br />Signature</td>
</tr>
</table>

<table class="footer" cellpadding="0" cellspacing="0"><tr><td>Start date: <?php echo $this->ifunction->ifnull($dt_ei6[3]) ?></td><td>End date: <?php echo $this->ifunction->ifnull($dt_ei6[4]) ?></td><td>Time spent on site: <?php echo $this->ifunction->ifnull($dt_ei6[5]) ?></td></tr></table>

<table class="footer" cellpadding="0" cellspacing="0" style="margin:5px 0">
<tr><td width="80"><b>OK</b></td><td>put a cross if task performed</td></tr>
<tr><td><b>Not OK</b></td><td>put a cross if task performed is not OK</td></tr>
<tr><td><b>N/A</b></td><td>not applicable</td></tr>
<tr><td><b>Remark Major</b></td><td>Passing this test is mandatory</td></tr>
<tr><td><b>Remark Minor</b></td><td>Not service affecting but rectification is mandatory</td></tr>
</table>

<hr />

<?php
$Qchapter = $this->db->query("SELECT `no_chapter`, `content` FROM `it_atp_chapter` WHERE `atp_id`='$dx' AND `chapter`='1' ORDER BY `atp_chapter_id` ASC");
foreach($Qchapter->result_object() as $chapter){
	
	$in = str_replace('1.', '', $chapter->no_chapter);
	
	$arr_chapter_1[$in -1]=$chapter;
	/*if(in_array($in, array('6.1', '6.2', '6.3', '6.4'), true)){
		$arr_chapter_1[str_replace('6.', '', $in) +4]=$chapter;
	}
	elseif($in == 7){
		$arr_chapter_1[9]=$chapter;
	}
	else $arr_chapter_1[$in -1]=$chapter;*/
}
?>

<h3>A. Preliminary checks</h3>
<table class="border" cellpadding="0" cellspacing="0">
<tr class="header"><td width="40">Chapter</td><td>Title work performed</td><td width="30">OK</td><td width="40">Not OK</td><td width="35">N/A</td><td width="90">Remark</td></tr>
<tr><td valign="top"><b>1</b><br />1.1<br /><br />1.2<br />1.3<br />1.4<br />1.5<br />1.6<br />1.6.1<br />1.6.2<br /><br />1.6.3<br />1.6.4<br />1.7</td>
<td valign="top"><b>Preliminary site checks</b><br />CME Site Acceptance has been approved (the document must be attached)<br />Site documentation must be available<br />Commissioning check list should be attached<br />NIB (Network implementation binder) / Installation Binder<br />Link (E1) Preparation already done<br />Before starting (on arrival at the site)<br />&bull; Check engineer's certificate of competency level<br />&bull; Check tools and equipment (completeness and calibrated with valid certificate). All equipment must be provided by vendor<br />&bull; For swap out cases, dummy load must be available<br />&bull; Document MOP and ATP must be available<br />BOQ fill with feature information activation (such as MCPA_IPM, MCCCH, Edge, Abis optimizer, RUS Configuration)</td>
<td valign="top" align="center">
<?php echo '<br />';
for($i=0; $i <= 9; $i++){
    echo '<img src="'.base_url().'static/i/radio'; if($arr_chapter_1[$i]->content=='OK') echo '_checked'; echo '.jpg"><br />';
    if(($i==0)||($i==4)||($i==6)) echo '<br />';
}
?>
</td>
<td valign="top" align="center">
<?php echo '<br />';
for($i=0; $i <= 9; $i++){
    echo '<img src="'.base_url().'static/i/radio'; if($arr_chapter_1[$i]->content=='Not OK') echo '_checked'; echo '.jpg"><br />';
    if(($i==0)||($i==4)||($i==6)) echo '<br />';
}
?></td>
<td valign="top" align="center">
<?php echo '<br />';
for($i=0; $i <= 9; $i++){
    echo '<img src="'.base_url().'static/i/radio'; if($arr_chapter_1[$i]->content=='N/A') echo '_checked'; echo '.jpg"><br />';
    if(($i==0)||($i==4)||($i==6)) echo '<br />';
}
?></td>
<td valign="top" align="center">
<?php echo '<br />';
for($i=0; $i <= 9; $i++){
    echo 'Major<br />';
    if(($i==0)||($i==4)||($i==6)) echo '<br />';
}
?>
</td></tr>
</table>

<?php $Qchapter = $this->db->query("SELECT `no_chapter`, `content` FROM `it_atp_chapter` WHERE `atp_id`='$dx' AND `chapter`='2' ORDER BY `atp_chapter_id` ASC"); foreach($Qchapter->result_object() as $chapter) $arr_chapter_2[str_replace('2.', '', $chapter->no_chapter) -1]=$chapter ?>

<table class="border" cellpadding="0" cellspacing="0">
<tr>
    <td valign="top" width="40"><b>2</b></td>
    <td valign="top"><b>Checking HW configuration visually</b><br />(Compare with equipment order list attachment which is based on Site Documentation, NIB or Planning recommendation)</td>
    <td valign="top" width="30" align="center"><br /><img src="<?php echo base_url() ?>static/i/radio<?php if($arr_chapter_2[0]->content=='OK') echo '_checked' ?>.jpg"></td>
    <td valign="top" width="40" align="center"><br /><img src="<?php echo base_url() ?>static/i/radio<?php if($arr_chapter_2[0]->content=='Not OK') echo '_checked' ?>.jpg"></td>
    <td valign="top" width="35" align="center"><br /><img src="<?php echo base_url() ?>static/i/radio<?php if($arr_chapter_2[0]->content=='N/A') echo '_checked' ?>.jpg"></td>
    <td valign="top" width="90" align="center"><br />Major</td>
</tr>
</table>

<?php $Qchapter = $this->db->query("SELECT `no_chapter`, `content` FROM `it_atp_chapter` WHERE `atp_id`='$dx' AND `chapter`='3' ORDER BY `atp_chapter_id` ASC"); foreach($Qchapter->result_object() as $chapter) $arr_chapter_3[str_replace('3.', '', $chapter->no_chapter) -1]=$chapter ?>

<table class="border" cellpadding="0" cellspacing="0">
<tr><td width="40" valign="top"><b>3</b><br />3.1<br />3.2<br />3.3<br />3.4<br />3.5<br />3.6</td>
<td valign="top"><b>Checking on labelling</b><br />Check label module (serial number, technical status)<br />Check RBS rack label<br />Check DDF label (end to end site)<br />Check power supply label<br />Check feeder cable label (for antenna sector)<br />Check Antenna label</td>
<td valign="top" width="30" align="center">
<?php echo '<br />';
for($i=0; $i <= 5; $i++){
    echo '<img src="'.base_url().'static/i/radio'; if($arr_chapter_3[$i]->content=='OK') echo '_checked'; echo '.jpg"><br />';
}
?></td>
<td valign="top" width="40" align="center">
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
</td><td width="90" valign="top" align="center"><?php echo '<br />'; for($i=0; $i <= 5; $i++) echo 'Major<br />' ?></td></tr>
</table>

<?php $Qchapter = $this->db->query("SELECT `no_chapter`, `content` FROM `it_atp_chapter` WHERE `atp_id`='$dx' AND `chapter`='4' ORDER BY `atp_chapter_id` ASC"); foreach($Qchapter->result_object() as $chapter) $arr_chapter_4[str_replace('4.', '', $chapter->no_chapter) -1]=$chapter ?>

<table class="border" cellpadding="0" cellspacing="0">
<tr>
    <td valign="top" width="40"><b>4</b></td>
    <td valign="top"><b>Checking grounding integration (visual checking)</b><br />Grounding RBS (proper connection and integration)</td>
    <td valign="top" width="30" align="center"><br /><img src="<?php echo base_url() ?>static/i/radio<?php if($arr_chapter_4[0]->content=='OK') echo '_checked' ?>.jpg"></td>
    <td valign="top" width="40" align="center"><br /><img src="<?php echo base_url() ?>static/i/radio<?php if($arr_chapter_4[0]->content=='Not OK') echo '_checked' ?>.jpg"></td>
    <td valign="top" width="35" align="center"><br /><img src="<?php echo base_url() ?>static/i/radio<?php if($arr_chapter_4[0]->content=='N/A') echo '_checked' ?>.jpg"></td>
    <td valign="top" width="90" align="center"><br />Major</td>
</tr>
</table>

<?php $Qchapter = $this->db->query("SELECT `no_chapter`, `content` FROM `it_atp_chapter` WHERE `atp_id`='$dx' AND `chapter`='5' ORDER BY `atp_chapter_id` ASC"); foreach($Qchapter->result_object() as $chapter) $arr_chapter_5[str_replace('5.', '', $chapter->no_chapter) -1]=$chapter ?>

<table class="border" cellpadding="0" cellspacing="0">
<tr><td width="40" valign="top"><b>5</b><br />5.1<br />5.2<br />5.3<br />5.4</td>
<td valign="top"><b>Powers Measurement</b><br />Measurement AC Power Line (L1/L2/L3)<br />Measurement RBS Input Power / Cabinet Voltage<br />Measurement AC Power Input PSU RBS<br />Measurement DC Power Output PSU RBS</td>
<td valign="top" width="30" align="center">
<?php echo '<br />';
for($i=0; $i <= 3; $i++){
    echo '<img src="'.base_url().'static/i/radio'; if($arr_chapter_5[$i]->content=='OK') echo '_checked'; echo '.jpg"><br />';
}
?>
</td><td valign="top" width="40" align="center">
<?php echo '<br />';
for($i=0; $i <= 3; $i++){
    echo '<img src="'.base_url().'static/i/radio'; if($arr_chapter_5[$i]->content=='Not OK') echo '_checked'; echo '.jpg"><br />';
}
?>
</td><td valign="top" width="35" align="center">
<?php echo '<br />';
for($i=0; $i <= 3; $i++){
    echo '<img src="'.base_url().'static/i/radio'; if($arr_chapter_5[$i]->content=='N/A') echo '_checked'; echo '.jpg"><br />';
}
?>
</td><td width="90" valign="top" align="center"><?php echo '<br />'; for($i=0; $i <= 3; $i++) echo 'Major<br />' ?></td></tr>
</tr>
</table>

<hr />

<h3>TABLE 1: Voltage RBS Specifications</h3>
<table class="border" cellpadding="0" cellspacing="0">
<tr class="header"><td>Point of Voltage Measurement</td><td>Nominal Voltages</td><td>Specification</td></tr>
<tr><td>AC POWER LINE</td><td align="center">220 Vac</td><td align="center">180 Vac - 250 Vac</td></tr>
<tr><td>DC V Input RBS</td><td align="center"> -54.5 Vdc</td><td align="center">(-)42 Vdc - (-)58.5 Vdc</td></tr>
<tr><td>AC V Input PSU RBS</td><td align="center">220 Vac</td><td align="center">120 Vac - 250 Vac</td></tr>
<tr><td>DC V input PSU RBS</td><td align="center"> 27.2 Vdc</td><td align="center">19.5 Vdc - 30 Vdc</td></tr>
<tr><td>DC V Output PSU RBS</td><td align="center">-54.5 Vdc</td><td align="center">(-)53.0Vdc - (-)56 Vdc</td></tr>
</table>
<p style="font-size:11px">Note: All Voltage measurement must refer to Table 1 (Voltage RBS Specification)</p>

<?php $Qsubchapter = $this->db->query("SELECT `subno_chapter`, `content` FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `chapter`='5' AND `no_chapter`='5.1' ORDER BY `subno_chapter_order` ASC"); foreach($Qsubchapter->result_object() as $subchapter) $arr_subchapter_5_1[$subchapter->subno_chapter -1]=$subchapter;
$dt_subchapter_5_1 = explode('|', $arr_subchapter_5_1[0]->content) ?>

<h3>Chapter: 5.1 Measurement AC Power Line (L1/L2/L3)</h3>
<table class="border" cellpadding="0" cellspacing="0">
<tr class="header"><td width="90">Test Item</td><td>Phase L1<br />to Neutral</td><td>Phase L2<br />to Neutral</td><td>Phase L3<br />to Neutral</td><td>Neutral to Ground (&lt; 3 Vdc)</td><td width="90">Remark</td></tr>
<tr>
    <td  valign="top">AC POWER LINE</td>
    <td><?php echo $this->ifunction->ifnull($dt_subchapter_5_1[3]) ?></td>
    <td><?php echo $this->ifunction->ifnull($dt_subchapter_5_1[4]) ?></td>
    <td><?php echo $this->ifunction->ifnull($dt_subchapter_5_1[5]) ?></td>
    <td><?php echo $this->ifunction->ifnull($dt_subchapter_5_1[6]) ?></td>
    <td><?php echo $this->ifunction->ifnull($dt_subchapter_5_1[7]) ?></td>
</tr>
</table>

<?php $Qsubchapter = $this->db->query("SELECT `subno_chapter`, `content` FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `chapter`='5' AND `no_chapter`='5.2' ORDER BY `subno_chapter_order` ASC"); foreach($Qsubchapter->result_object() as $subchapter) $arr_subchapter_5_2[$subchapter->subno_chapter -1]=$subchapter ?>

<h3>Chapter: 5.2 Measurement RBS Input Power/Cabinet Voltage</h3>
<table class="border" cellpadding="0" cellspacing="0">
<tr class="header">
<td rowspan="2" width="90">DC V Input RBS (Input DC power RBS from Rectifier / BBS to RBS test Point)</td>
<td rowspan="2">Vdc (Volt)</td>
<td>Chassis to Ground</td>
<td rowspan="2" width="30">OK</td>
<td rowspan="2" width="40">Not<br />OK</td>
<td rowspan="2" width="35">N/A</td>
<td rowspan="2" width="90">Remark</td>
</tr><tr class="header"><td>(&lt; 1 VDC)</td></tr>
<?php
$arr_dt_52 = array('Cabinet 1', 'Cabinet 2', 'Cabinet 3');
for($i=0; $i <= 2; $i++){
	$dt_subchapter_5_2 = explode('|', $arr_subchapter_5_2[$i]->content);
	echo '<tr><td align="center">'.$arr_dt_52[$i].'</td>';
	echo '<td>'.$this->ifunction->ifnull($dt_subchapter_5_2[4]).'</td><td>'.$this->ifunction->ifnull($dt_subchapter_5_2[5]).'</td><td align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_5_2[3]=='OK') echo '_checked'; echo '.jpg"></td><td align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_5_2[3]=='Not OK') echo '_checked'; echo '.jpg"></td><td align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_5_2[3]=='N/A') echo '_checked'; echo '.jpg"></td><td>'.$this->ifunction->ifnull($dt_subchapter_5_2[6]).'</td></tr>';
}
?>
</table><br />

<?php $Qchapter = $this->db->query("SELECT `no_chapter`, `content` FROM `it_atp_chapter` WHERE `atp_id`='$dx' AND `chapter`='6' ORDER BY `atp_chapter_id` ASC"); foreach($Qchapter->result_object() as $chapter) $arr_chapter_6[str_replace('6.', '', $chapter->no_chapter) -1]=$chapter ?>

<table class="border" cellpadding="0" cellspacing="0">
<tr class="header"><td width="40">Chapter</td><td>Title work performed</td><td width="30">OK</td><td width="40">Not OK</td><td width="35">N/A</td><td width="90">Remark</td></tr>
<tr><td valign="top"><b>6</b><br />6.1<br />6.2<br />6.3</td><td valign="top"><b>Checking RBS Rack Circuit Breaker (switch ON/OFF )</b><br />- Sub rack 1 /RBS 1<br />- Sub rack 2/ RBS 2<br />- Sub rack 3/ RBS 3</td>
<td valign="top" align="center">
<?php echo '<br />';
for($i=0; $i <= 2; $i++){
    echo '<img src="'.base_url().'static/i/radio'; if($arr_chapter_6[$i]->content=='OK') echo '_checked'; echo '.jpg"><br />';
}
?>
</td><td valign="top" align="center">
<?php echo '<br />';
for($i=0; $i <= 2; $i++){
    echo '<img src="'.base_url().'static/i/radio'; if($arr_chapter_6[$i]->content=='Not OK') echo '_checked'; echo '.jpg"><br />';
}
?>
</td><td valign="top" align="center">
<?php echo '<br />';
for($i=0; $i <= 2; $i++){
    echo '<img src="'.base_url().'static/i/radio'; if($arr_chapter_6[$i]->content=='N/A') echo '_checked'; echo '.jpg"><br />';
}
?>
</td><td valign="top" align="center"><?php echo '<br />'; for($i=0; $i <= 2; $i++) echo 'Major<br />' ?></td></tr>
</table><br />

<?php $Qchapter = $this->db->query("SELECT `no_chapter`, `content` FROM `it_atp_chapter` WHERE `atp_id`='$dx' AND `chapter`='7' ORDER BY `atp_chapter_id` ASC"); foreach($Qchapter->result_object() as $chapter) $arr_chapter_7[str_replace('7.', '', $chapter->no_chapter) -1]=$chapter ?>

<table class="border" cellpadding="0" cellspacing="0">
<tr class="header"><td width="40">Chapter</td><td>Title work performed</td><td width="30">OK</td><td width="40">Not OK</td><td width="35">N/A</td><td width="90">Remark</td></tr>
<tr><td valign="top"><b>7</b><br />7.1<br />7.2<br />7.3<br />7.4</td><td valign="top"><b>Checking Climate System Installation</b><br />Check Climate system Model (Should be Extended)*<br />Check Functionality of each Fan<br />Check cabinet temperature<br />Check completeness climate system installation</td>
<td valign="top" align="center">
<?php echo '<br />';
for($i=0; $i <= 3; $i++){
    echo '<img src="'.base_url().'static/i/radio'; if($arr_chapter_7[$i]->content=='OK') echo '_checked'; echo '.jpg"><br />';
}
?>
</td><td valign="top" align="center">
<?php echo '<br />';
for($i=0; $i <= 3; $i++){
    echo '<img src="'.base_url().'static/i/radio'; if($arr_chapter_7[$i]->content=='Not OK') echo '_checked'; echo '.jpg"><br />';
}
?>
</td><td valign="top" align="center">
<?php echo '<br />';
for($i=0; $i <= 3; $i++){
    echo '<img src="'.base_url().'static/i/radio'; if($arr_chapter_7[$i]->content=='N/A') echo '_checked'; echo '.jpg"><br />';
}
?>
</td><td valign="top" align="center"><?php echo '<br />'; for($i=0; $i <= 3; $i++) echo 'Major<br />' ?></td></tr>
</table>
<p style="font-size:11px">Note: Extended: Internal Fan 4 units, External Fan 6 units</p>

<hr />

<h3>B. Preparing RBS for Acceptance /Stand alone test</h3>

<?php $Qchapter = $this->db->query("SELECT `no_chapter`, `content` FROM `it_atp_chapter` WHERE `atp_id`='$dx' AND `chapter`='8' ORDER BY `atp_chapter_id` ASC"); foreach($Qchapter->result_object() as $chapter) $arr_chapter_8[str_replace('8.', '', $chapter->no_chapter) -1]=$chapter ?>

<table class="border" cellpadding="0" cellspacing="0">
<tr class="header"><td width="40">Chapter</td><td>Title work performed</td><td width="30">OK</td><td width="40">Not OK</td><td width="35">N/A</td><td width="90">Remark</td></tr>
<tr><td valign="top"><b>8</b><br />8.1<br />8.2</td><td valign="top"><b>Software and database Used</b><br />BTS Software<br />OMT Software version</td>
<td valign="top" align="center">
<?php echo '<br />';
for($i=0; $i <= 1; $i++){
    echo '<img src="'.base_url().'static/i/radio'; if($arr_chapter_8[$i]->content=='OK') echo '_checked'; echo '.jpg"><br />';
}
?>
</td><td valign="top" align="center">
<?php echo '<br />';
for($i=0; $i <= 1; $i++){
    echo '<img src="'.base_url().'static/i/radio'; if($arr_chapter_8[$i]->content=='Not OK') echo '_checked'; echo '.jpg"><br />';
}
?>
</td><td valign="top" align="center">
<?php echo '<br />';
for($i=0; $i <= 1; $i++){
    echo '<img src="'.base_url().'static/i/radio'; if($arr_chapter_8[$i]->content=='N/A') echo '_checked'; echo '.jpg"><br />';
}
?>
</td><td valign="top" align="center"><br />Major<br />Major</td></tr>
</table><br />

<?php $Qchapter = $this->db->query("SELECT `no_chapter`, `content` FROM `it_atp_chapter` WHERE `atp_id`='$dx' AND `chapter`='9' ORDER BY `atp_chapter_id` ASC"); foreach($Qchapter->result_object() as $chapter) $arr_chapter_9[str_replace('9.', '', $chapter->no_chapter) -1]=$chapter ?>

<table class="border" cellpadding="0" cellspacing="0">
<tr class="header"><td width="40">Chapter</td><td>Title work performed</td><td width="30">OK</td><td width="40">Not OK</td><td width="35">N/A</td><td width="90">Remark</td></tr>
<tr><td valign="top"><b>9</b><br />9.1<br /><br />9.2</td><td valign="top"><b>RBS Restart</b><br />Check all Hardware Technical Status before RBS restart (All alarm must be clear)<br />Check all Hardware Technical Status after RBS restart (All Alarm must be cleared)</td>
<td valign="top" align="center">
<?php echo '<br />';
for($i=0; $i <= 1; $i++){
    echo '<img src="'.base_url().'static/i/radio'; if($arr_chapter_9[$i]->content=='OK') echo '_checked'; echo '.jpg"><br />';
    if($i==0) echo '<br />';
}
?>
</td><td valign="top" align="center">
<?php echo '<br />';
for($i=0; $i <= 1; $i++){
    echo '<img src="'.base_url().'static/i/radio'; if($arr_chapter_9[$i]->content=='Not OK') echo '_checked'; echo '.jpg"><br />';
    if($i==0) echo '<br />';
}
?>
</td><td valign="top" align="center">
<?php echo '<br />';
for($i=0; $i <= 1; $i++){
    echo '<img src="'.base_url().'static/i/radio'; if($arr_chapter_9[$i]->content=='N/A') echo '_checked'; echo '.jpg"><br />';
    if($i==0) echo '<br />';
}
?>
</td><td valign="top" align="center"><br />Major<br /><br />Major</td></tr>
</table>

<h3>C. Test should be done when RBS is integrated</h3>

<?php $Qchapter = $this->db->query("SELECT `no_chapter`, `content` FROM `it_atp_chapter` WHERE `atp_id`='$dx' AND `chapter`='10' ORDER BY `atp_chapter_id` ASC"); foreach($Qchapter->result_object() as $chapter) $arr_chapter_10[str_replace('10.', '', $chapter->no_chapter) -1]=$chapter ?>

<table class="border" cellpadding="0" cellspacing="0">
<tr class="header"><td width="40">Chapter</td><td>Title work performed</td><td width="30">OK</td><td width="40">Not OK</td><td width="35">N/A</td><td width="90">Remark</td></tr>
<tr><td valign="top"><b>10</b><br />10.1</td><td valign="top"><b>Checking Downloading software status</b><br />Downloading Software Status<br />OMCR -> RXMOP: MO=RXOCF-XX; command printout from the BSC.<br />(The value of NEGSTATUS parameter should be Successful)</td>
<td valign="top" align="center"><br /><br /><img src="<?php echo base_url() ?>static/i/radio<?php if($arr_chapter_10[0]->content=='OK') echo '_checked' ?>.jpg">
<td valign="top" align="center"><br /><br /><img src="<?php echo base_url() ?>static/i/radio<?php if($arr_chapter_10[0]->content=='Not OK') echo '_checked' ?>.jpg">
<td valign="top" align="center"><br /><br /><img src="<?php echo base_url() ?>static/i/radio<?php if($arr_chapter_10[0]->content=='N/A') echo '_checked' ?>.jpg">
<td valign="top" align="center"><br /><br />Minor</td>
</tr></table><br />

<?php $Qchapter = $this->db->query("SELECT `no_chapter`, `content` FROM `it_atp_chapter` WHERE `atp_id`='$dx' AND `chapter`='11' ORDER BY `atp_chapter_id` ASC"); foreach($Qchapter->result_object() as $chapter) $arr_chapter_11[str_replace('11.', '', $chapter->no_chapter) -1]=$chapter ?>

<table class="border" cellpadding="0" cellspacing="0">
<tr class="header"><td width="40">Chapter</td><td>Title work performed</td><td width="30">OK</td><td width="40">Not OK</td><td width="35">N/A</td><td width="90">Remark</td></tr>
<tr><td valign="top"><b>11</b><br /><br /><br />11.1</td><td valign="top"><b>Checking Hardware Technical Status and Configuration, by comparing site configuration from the OMC-R</b><br />Against actual site configuration.<br />Hardware Technical Status & Configuration<br />OMCR -> RXCDP command printout from the BSC<br />(Actual Data from site and OMC-R must be the same)</td>
<td valign="top" align="center"><br /><br /><br /><img src="<?php echo base_url() ?>static/i/radio<?php if($arr_chapter_11[0]->content=='OK') echo '_checked' ?>.jpg">
<td valign="top" align="center"><br /><br /><br /><img src="<?php echo base_url() ?>static/i/radio<?php if($arr_chapter_11[0]->content=='Not OK') echo '_checked' ?>.jpg">
<td valign="top" align="center"><br /><br /><br /><img src="<?php echo base_url() ?>static/i/radio<?php if($arr_chapter_11[0]->content=='N/A') echo '_checked' ?>.jpg">
<td valign="top" align="center"><br /><br /><br />Minor</td>
</tr></table>

<hr />

<?php $Qchapter = $this->db->query("SELECT `no_chapter`, `content` FROM `it_atp_chapter` WHERE `atp_id`='$dx' AND `chapter`='12' ORDER BY `atp_chapter_id` ASC"); foreach($Qchapter->result_object() as $chapter) $arr_chapter_12[str_replace('12.', '', $chapter->no_chapter) -1]=$chapter ?>

<table class="border" cellpadding="0" cellspacing="0">
<tr class="header"><td width="40">Chapter</td><td>Title work performed</td><td width="30">OK</td><td width="40">Not OK</td><td width="35">N/A</td><td width="90">Remark</td></tr>
<tr><td width="70" valign="top"><b>12</b><br /><br />12.1</td><td valign="top"><b>Checking Cell Identification & Radio Channel Configuration</b><br />Cell Identification & Radio Channel Configuration<br />OMCR -> RLDEP & RLCFP command printout from the BSC. (Actual Data from site and OMC-R must be the same)</td>
<td valign="top" align="center"><br /><br /><img src="<?php echo base_url() ?>static/i/radio<?php if($arr_chapter_12[0]->content=='OK') echo '_checked' ?>.jpg">
<td valign="top" align="center"><br /><br /><img src="<?php echo base_url() ?>static/i/radio<?php if($arr_chapter_12[0]->content=='Not OK') echo '_checked' ?>.jpg">
<td valign="top" align="center"><br /><br /><img src="<?php echo base_url() ?>static/i/radio<?php if($arr_chapter_12[0]->content=='N/A') echo '_checked' ?>.jpg">
<td valign="top" align="center"><br /><br />Major</td>
</tr></table>

<?php $Qsubchapter = $this->db->query("SELECT `subno_chapter`, `content` FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `chapter`='12' AND `no_chapter`='12.1' ORDER BY `subno_chapter_order` ASC"); foreach($Qsubchapter->result_object() as $subchapter) $arr_subchapter_12_1[$subchapter->subno_chapter -1]=$subchapter ?>

<h3>Table 2: Cell Identification & Radio Channel Configuration (GSM 900)</h3>
<table class="border" cellpadding="0" cellspacing="0">
<tr class="header">
    <td width="80" rowspan="2">Sector</td>
    <td colspan="2">LAC</td>
    <td colspan="2">CI</td>
    <td colspan="2">Radio Channel Configuration</td>
</tr>
<tr class="header">
    <td>Actual<br />Data</td>
    <td>OMC-R<br />Data</td>
    <td>Actual<br />Data</td>
    <td>OMC-R<br />Data</td>
    <td>Actual<br />Data</td>
    <td>OMC-R<br />Data</td>
</tr>
<?php
$arr_dt_121 = array('12.1.1 Sector 1', '12.1.2 Sector 2', '12.1.3 Sector 3');
for($i=0; $i <= 2; $i++){
	$dt_subchapter_12_1 = explode('|', $arr_subchapter_12_1[$i]->content);
	echo '<tr><td>'.$arr_dt_121[$i].'</td>';
	echo '<td>'.$this->ifunction->ifnull($dt_subchapter_12_1[3]).'</td><td>'.$this->ifunction->ifnull($dt_subchapter_12_1[4]).'</td><td>'.$this->ifunction->ifnull($dt_subchapter_12_1[5]).'</td><td>'.$this->ifunction->ifnull($dt_subchapter_12_1[6]).'</td><td>'.$this->ifunction->ifnull($dt_subchapter_12_1[7]).'</td><td>'.$this->ifunction->ifnull($dt_subchapter_12_1[8]).'</td></tr>';
}
?>
</table>

<h3>Table 3: Cell Identification & Radio Channel Configuration (DCS 1800)</h3>
<table class="border" cellpadding="0" cellspacing="0">
<tr class="header">
    <td width="80" rowspan="2">Sector</td>
    <td colspan="2">LAC</td>
    <td colspan="2">CI</td>
    <td colspan="2">Radio Channel Configuration</td>
</tr>
<tr class="header">
    <td>Actual<br />Data</td>
    <td>OMC-R<br />Data</td>
    <td>Actual<br />Data</td>
    <td>OMC-R<br />Data</td>
    <td>Actual<br />Data</td>
    <td>OMC-R<br />Data</td>
</tr>
<?php
$arr_dt_121 = array(3 => '12.1.4 Sector 1', '12.1.5 Sector 2', '12.1.6 Sector 3');
for($i=3; $i <= 5; $i++){
	$dt_subchapter_12_1 = explode('|', $arr_subchapter_12_1[$i]->content);
	echo '<tr><td>'.$arr_dt_121[$i].'</td>';
	echo '<td>'.$this->ifunction->ifnull($dt_subchapter_12_1[3]).'</td><td>'.$this->ifunction->ifnull($dt_subchapter_12_1[4]).'</td><td>'.$this->ifunction->ifnull($dt_subchapter_12_1[5]).'</td><td>'.$this->ifunction->ifnull($dt_subchapter_12_1[6]).'</td><td>'.$this->ifunction->ifnull($dt_subchapter_12_1[7]).'</td><td>'.$this->ifunction->ifnull($dt_subchapter_12_1[8]).'</td></tr>';
}
?>
</table><br />

<?php $Qchapter = $this->db->query("SELECT `no_chapter`, `content` FROM `it_atp_chapter` WHERE `atp_id`='$dx' AND `chapter`='13' ORDER BY `atp_chapter_id` ASC"); foreach($Qchapter->result_object() as $chapter) $arr_chapter_13[str_replace('13.', '', $chapter->no_chapter) -1]=$chapter ?>

<table class="border" cellpadding="0" cellspacing="0">
<tr class="header"><td width="40">Chapter</td><td>Title work performed</td><td width="30">OK</td><td width="40">Not OK</td><td width="35">N/A</td><td width="90">Remark</td></tr>
<tr><td valign="top"><b>13</b><br /><br />13.1<br /><br />13.2</td><td valign="top"><b>Checking RBS Internal alarm status & functionality of RBS External alarm</b><br />Checking status & Functionality of RBS Internal Alarm by doing simulation test on RBS<br />Checking status & functionality External alarms by doing simulation test on transducer/sensor</td>
<td valign="top" align="center">
<?php echo '<br /><br />';
for($i=0; $i <= 1; $i++){
    echo '<img src="'.base_url().'static/i/radio'; if($arr_chapter_13[$i]->content=='OK') echo '_checked'; echo '.jpg"><br />';
    if($i==0) echo '<br />';
}
?>
</td><td valign="top" align="center">
<?php echo '<br /><br />';
for($i=0; $i <= 1; $i++){
    echo '<img src="'.base_url().'static/i/radio'; if($arr_chapter_13[$i]->content=='Not OK') echo '_checked'; echo '.jpg"><br />';
    if($i==0) echo '<br />';
}
?>
</td><td valign="top" align="center">
<?php echo '<br /><br />';
for($i=0; $i <= 1; $i++){
    echo '<img src="'.base_url().'static/i/radio'; if($arr_chapter_13[$i]->content=='N/A') echo '_checked'; echo '.jpg"><br />';
    if($i==0) echo '<br />';
}
?>
</td><td valign="top" align="center"><br /><br />Major<br /><br />Major</td></tr>
</table>

<hr />

<?php $Qchapter = $this->db->query("SELECT `no_chapter`, `content` FROM `it_atp_chapter` WHERE `atp_id`='$dx' AND `chapter`='14' ORDER BY `atp_chapter_id` ASC"); foreach($Qchapter->result_object() as $chapter) $arr_chapter_14[str_replace('14.', '', $chapter->no_chapter) -1]=$chapter ?>

<table class="border" cellpadding="0" cellspacing="0">
<tr class="header"><td width="40">Chapter</td><td>Title work performed</td><td width="30">OK</td><td width="60">Not OK</td><td width="35">N/A</td><td width="90">Remark</td></tr>
<tr><td width="70" valign="top"><b>14</b></td><td valign="top"><b>RBS Internal Alarm</b><br />Checking status & Functionality of RBS Internal</td>
<td valign="top" align="center"><br /><img src="<?php echo base_url() ?>static/i/radio<?php if($arr_chapter_14[0]->content=='OK') echo '_checked' ?>.jpg"></td>
<td valign="top" align="center"><br /><img src="<?php echo base_url() ?>static/i/radio<?php if($arr_chapter_14[0]->content=='Not OK') echo '_checked' ?>.jpg"></td>
<td valign="top" align="center"><br /><img src="<?php echo base_url() ?>static/i/radio<?php if($arr_chapter_14[0]->content=='N/A') echo '_checked' ?>.jpg"></td>
<td valign="top" align="center"><br />Major</td>
</tr>
</table>

<?php $Qsubchapter = $this->db->query("SELECT `subno_chapter`, `content` FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `chapter`='14' AND `no_chapter`='14.1' ORDER BY `subno_chapter_order` ASC"); foreach($Qsubchapter->result_object() as $subchapter) $arr_subchapter_14_1[$subchapter->subno_chapter -1]=$subchapter ?>

<h3>Table 4: RBS Internal Alarm</h3>
<table class="border" cellpadding="0" cellspacing="0">
<tr class="header">
    <td width="40" rowspan="2">Test no</td>
    <td rowspan="2">Alarm Test</td>
    <td colspan="3">Status RBS1 / RBS2</td>
    <td width="90" rowspan="2">Remark</td>
</tr>
<tr class="header">
    <td width="30">OK</td>
    <td width="40">Not OK</td>
    <td width="35">N/A</td>
</tr>
<?php
$arr_dt_141 = array('Power com loop', 'Internal power capacity reduced', 'Battery backup cap reduced', 'Climate capacity reduced', 'Climate sensor fault');
for($i=0; $i <= 4; $i++){
	$dt_subchapter_14_1 = explode('|', $arr_subchapter_14_1[$i]->content);
	echo '<tr><td>14.1.'.($i +1).'</td><td>'.$arr_dt_141[$i].'</td>';
	echo '<td align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_14_1[3]=='OK') echo '_checked'; echo '.jpg"></td>';
	echo '<td align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_14_1[3]=='Not OK') echo '_checked'; echo '.jpg"></td>';
	echo '<td align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_14_1[3]=='N/A') echo '_checked'; echo '.jpg"></td>';
	echo '<td align="center">Major</td></tr>';
}
?>
</table>

<?php $Qsubchapter = $this->db->query("SELECT `subno_chapter`, `content` FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `chapter`='14' AND `no_chapter`='14.2' ORDER BY `subno_chapter_order` ASC"); foreach($Qsubchapter->result_object() as $subchapter) $arr_subchapter_14_2[$subchapter->subno_chapter -1]=$subchapter ?>

<h3>Table 5: RBS External Alarm (Alarm Text = 6 first character of Cell ID + Alarm type)</h3>
<table class="border" cellpadding="0" cellspacing="0">
<tr class="header">
    <td width="40" rowspan="2">Test no</td>
    <td width="40" rowspan="2">Port no</td>
    <td rowspan="2">Alarm Test</td>
    <td colspan="3">Status RBS1 / RBS2</td>
    <td width="90" rowspan="2">Remark</td>
</tr>
<tr class="header">
    <td width="30">OK</td>
    <td width="40">Not OK</td>
    <td width="35">N/A</td>
</tr>
<?php
$arr_dt_142 = array('Door Open', 'AC Power L1 fails', 'AC Power L2 fails', 'AC Power L3 fails', 'Fire (Smoke Detector)', 'Fire (Heat Detector)', 'Indoor Temp. High', 'Arrester PDB Alarm', '*Genset - Accu Low<br />**Rectifier - Mains Fails', '*Genset - Solar Low<br />** Rectifier - Battery Fuse', '*Genset - Working<br />**Rectifier - Load Fuse', '*Genset - Warming up<br />**Rectifier - Low Voltage', '** Rectifier - Module Alarm<br />*** Rectifier - Mains Fails', '*** Rectifier - Battery Fuse', '*** Rectifier - Module Alarm', 'Arrester (OVP) Alarm<br />(for sites equipped with OVP only)');
for($i=0; $i <= 15; $i++){
	$dt_subchapter_14_2 = explode('|', $arr_subchapter_14_2[$i]->content);
	echo '<tr><td>14.2.'.($i +1).'</td><td align="center"> '.($i +1).'</td><td>'.$arr_dt_142[$i].'</td>';
	echo '<td align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_14_2[3]=='OK') echo '_checked'; echo '.jpg"></td>';
	echo '<td align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_14_2[3]=='Not OK') echo '_checked'; echo '.jpg"></td>';
	echo '<td align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_14_2[3]=='N/A') echo '_checked'; echo '.jpg"></td>';
	echo '<td align="center">Major</td></tr>';
}
?>
</table>
<p style="font-size:11px"><i>Note: <br />Test no 13.2.1 - 13.2.8 mandatory for BTS: End Site & Hub Site<br />Test no 13.2.9 - 13.2.15 mandatory for BTS: Hub Site<br />Test no 13.2.16 mandatory for BTS: equipped with OVP.<br />Testing should be conducted directly to external alarm sensor.</i></p>

<hr />

<?php $Qchapter = $this->db->query("SELECT `no_chapter`, `content` FROM `it_atp_chapter` WHERE `atp_id`='$dx' AND `chapter`='15' ORDER BY `atp_chapter_id` ASC"); foreach($Qchapter->result_object() as $chapter) $arr_chapter_15[str_replace('15.', '', $chapter->no_chapter) -1]=$chapter ?>

<table class="border" cellpadding="0" cellspacing="0">
<tr class="header"><td width="40">Chapter</td><td>Title work performed</td><td width="30">OK</td><td width="40">Not OK</td><td width="35">N/A</td><td width="90">Remark</td></tr>
<tr><td valign="top"><b>15</b><br />15.1<br />15.2<br />15.3<br />15.4</td><td valign="top"><b>Abis Path / PCM Port Connection status using OMT</b><br />RBS1 / RBS2 PCM-A Port Connection<br />RBS1 / RBS2 PCM-B Port Connection<br />RBS1 / RBS2 PCM-C Port Connection<br />RBS1 / RBS2 PCM-D Port Connection</td>
<td valign="top" align="center">
<?php echo '<br />';
for($i=0; $i <= 3; $i++){
    echo '<img src="'.base_url().'static/i/radio'; if($arr_chapter_15[$i]->content=='OK') echo '_checked'; echo '.jpg"><br />';
}
?>
</td><td valign="top" align="center">
<?php echo '<br />';
for($i=0; $i <= 3; $i++){
    echo '<img src="'.base_url().'static/i/radio'; if($arr_chapter_15[$i]->content=='Not OK') echo '_checked'; echo '.jpg"><br />';
}
?>
</td><td valign="top" align="center">
<?php echo '<br />';
for($i=0; $i <= 3; $i++){
    echo '<img src="'.base_url().'static/i/radio'; if($arr_chapter_15[$i]->content=='N/A') echo '_checked'; echo '.jpg"><br />';
}
?>
</td><td valign="top" align="center"><br />Major<br />Major<br />Major<br />Major</td></tr>
</table><br />

<?php $Qchapter = $this->db->query("SELECT `no_chapter`, `content` FROM `it_atp_chapter` WHERE `atp_id`='$dx' AND `chapter`='16' ORDER BY `atp_chapter_id` ASC"); foreach($Qchapter->result_object() as $chapter) $arr_chapter_16[str_replace('16.', '', $chapter->no_chapter) -1]=$chapter ?>

<table class="border" cellpadding="0" cellspacing="0">
<tr class="header"><td width="40">Chapter</td><td>Title work performed</td><td width="30">OK</td><td width="40">Not OK</td><td width="35">N/A</td><td width="90">Remark</td></tr>
<tr><td valign="top"><b>16</b><br />16.1<br />16.2<br />16.3<br />16.4</td><td valign="top"><b>Checking the transmission parameter of RBS1 /RBS2</b><br />RBLT allocation On BSC<br />Type of LAPD (Link Access Protocol on D channel)<br />Network Topology<br />Synchronize source<br />Receiver sensitivity</td>
<td valign="top" align="center">
<?php echo '<br />';
for($i=0; $i <= 3; $i++){
    echo '<img src="'.base_url().'static/i/radio'; if($arr_chapter_16[$i]->content=='OK') echo '_checked'; echo '.jpg"><br />';
}
?>
</td><td valign="top" align="center">
<?php echo '<br />';
for($i=0; $i <= 3; $i++){
    echo '<img src="'.base_url().'static/i/radio'; if($arr_chapter_16[$i]->content=='Not OK') echo '_checked'; echo '.jpg"><br />';
}
?>
</td><td valign="top" align="center">
<?php echo '<br />';
for($i=0; $i <= 3; $i++){
    echo '<img src="'.base_url().'static/i/radio'; if($arr_chapter_16[$i]->content=='N/A') echo '_checked'; echo '.jpg"><br />';
}
?>
</td><td valign="top" align="center"><?php echo '<br />'; for($i=0; $i <= 3; $i++) echo 'Major<br />' ?></td></tr>
</table><br />

<?php $Qchapter = $this->db->query("SELECT `no_chapter`, `content` FROM `it_atp_chapter` WHERE `atp_id`='$dx' AND `chapter`='17' ORDER BY `atp_chapter_id` ASC"); foreach($Qchapter->result_object() as $chapter) $arr_chapter_17[str_replace('17.', '', $chapter->no_chapter) -1]=$chapter ?>

<table class="border" cellpadding="0" cellspacing="0">
<tr class="header"><td width="40">Chapter</td><td>Title work performed</td><td width="30">OK</td><td width="40">Not OK</td><td width="35">N/A</td><td width="90">Remark</td></tr>
<tr><td valign="top"><b>17</b><br />17.1<br />17.2</td><td valign="top"><b>Checking time slot occupation</b><br />Time Slot Occupation GSM 900<br />Time Slot Occupation DCS 1800</td>
<td valign="top" align="center">
<?php echo '<br />';
for($i=0; $i <= 1; $i++){
    echo '<img src="'.base_url().'static/i/radio'; if($arr_chapter_17[$i]->content=='OK') echo '_checked'; echo '.jpg"><br />';
}
?>
</td><td valign="top" align="center">
<?php echo '<br />';
for($i=0; $i <= 1; $i++){
    echo '<img src="'.base_url().'static/i/radio'; if($arr_chapter_17[$i]->content=='Not OK') echo '_checked'; echo '.jpg"><br />';
}
?>
</td><td valign="top" align="center">
<?php echo '<br />';
for($i=0; $i <= 1; $i++){
    echo '<img src="'.base_url().'static/i/radio'; if($arr_chapter_17[$i]->content=='N/A') echo '_checked'; echo '.jpg"><br />';
}
?>
</td><td valign="top" align="center"><?php echo '<br />'; for($i=0; $i <= 1; $i++) echo 'Major<br />' ?></td></tr>
</table>
<p style="font-size:11px"><i>RX Q: Rx quality (0 - 7)<br />RX Lev: RX level --Tolerance -63 dBm ± 8 dB <br />(Rx Lev reference values refer to EN/LZT 1232683)</i></p>

<?php $Qsubchapter = $this->db->query("SELECT `subno_chapter`, `content` FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `chapter`='17' AND `no_chapter`='17.1' ORDER BY `subno_chapter_order` ASC"); foreach($Qsubchapter->result_object() as $subchapter) $arr_subchapter_17_1[$subchapter->subno_chapter -1]=$subchapter ?>

<h3>Table 6: Time Slot Occupation GSM 900</h3>
<table class="border" cellpadding="0" cellspacing="0">
<tr class="header">
    <td width="20" rowspan="3">TRX</td>
    <td width="40" rowspan="3">ARFCN</td>
    <td colspan="16">Time Slot</td>
</tr>
<tr class="header">
	<td colspan="2">0</td><td colspan="2">1</td><td colspan="2">2</td><td colspan="2">3</td><td colspan="2">4</td><td colspan="2">5</td><td colspan="2">6</td><td colspan="2">7</td>
</tr>
<tr class="header">
    <td>RX Q</td><td>RX Lev</td><td>RX Q</td><td>RX Lev</td><td>RX Q</td><td>RX Lev</td><td>RX Q</td><td>RX Lev</td><td>RX Q</td><td>RX Lev</td><td>RX Q</td><td>RX Lev</td><td>RX Q</td><td>RX Lev</td><td>RX Q</td><td>RX Lev</td>
</tr>
<?php
for($i=0; $i <= 10; $i++){
	$dt_subchapter_17_1 = explode('|', $arr_subchapter_17_1[$i]->content);
	echo '<tr><td align="center">'.($i+1).'</td><td>'.$this->ifunction->ifnull($dt_subchapter_17_1[3]).'</td><td>'.$this->ifunction->ifnull($dt_subchapter_17_1[4]).'</td><td>'.$this->ifunction->ifnull($dt_subchapter_17_1[5]).'</td><td>'.$this->ifunction->ifnull($dt_subchapter_17_1[6]).'</td><td>'.$this->ifunction->ifnull($dt_subchapter_17_1[7]).'</td><td>'.$this->ifunction->ifnull($dt_subchapter_17_1[8]).'</td><td>'.$this->ifunction->ifnull($dt_subchapter_17_1[9]).'</td><td>'.$this->ifunction->ifnull($dt_subchapter_17_1[10]).'</td><td>'.$this->ifunction->ifnull($dt_subchapter_17_1[11]).'</td><td>'.$this->ifunction->ifnull($dt_subchapter_17_1[12]).'</td><td>'.$this->ifunction->ifnull($dt_subchapter_17_1[13]).'</td><td>'.$this->ifunction->ifnull($dt_subchapter_17_1[14]).'</td><td>'.$this->ifunction->ifnull($dt_subchapter_17_1[15]).'</td><td>'.$this->ifunction->ifnull($dt_subchapter_17_1[16]).'</td><td>'.$this->ifunction->ifnull($dt_subchapter_17_1[17]).'</td><td>'.$this->ifunction->ifnull($dt_subchapter_17_1[18]).'</td><td>'.$this->ifunction->ifnull($dt_subchapter_17_1[19]).'</td></tr>';
}
?>
</table>

<hr />

<?php $Qsubchapter = $this->db->query("SELECT `subno_chapter`, `content` FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `chapter`='17' AND `no_chapter`='17.2' ORDER BY `subno_chapter_order` ASC"); foreach($Qsubchapter->result_object() as $subchapter) $arr_subchapter_17_2[$subchapter->subno_chapter -1]=$subchapter ?>

<h3>Table 7: Time Slot Occupation DCS 1800</h3>
<table class="border" cellpadding="0" cellspacing="0">
<tr class="header">
    <td width="20" rowspan="3">TRX</td>
    <td width="40" rowspan="3">ARFCN</td>
    <td colspan="16">Time Slot</td>
</tr>
<tr class="header">
	<td colspan="2">0</td><td colspan="2">1</td><td colspan="2">2</td><td colspan="2">3</td><td colspan="2">4</td><td colspan="2">5</td><td colspan="2">6</td><td colspan="2">7</td>
</tr>
<tr class="header">
	<td>RX Q</td><td>RX Lev</td><td>RX Q</td><td>RX Lev</td><td>RX Q</td><td>RX Lev</td><td>RX Q</td><td>RX Lev</td><td>RX Q</td><td>RX Lev</td><td>RX Q</td><td>RX Lev</td><td>RX Q</td><td>RX Lev</td><td>RX Q</td><td>RX Lev</td>
</tr>
<?php
for($i=0; $i <= 22; $i++){
	$dt_subchapter_17_2 = explode('|', $arr_subchapter_17_2[$i]->content);
	echo '<tr><td align="center">'.($i+1).'</td><td>'.$this->ifunction->ifnull($dt_subchapter_17_2[3]).'</td><td>'.$this->ifunction->ifnull($dt_subchapter_17_2[4]).'</td><td>'.$this->ifunction->ifnull($dt_subchapter_17_2[5]).'</td><td>'.$this->ifunction->ifnull($dt_subchapter_17_2[6]).'</td><td>'.$this->ifunction->ifnull($dt_subchapter_17_2[7]).'</td><td>'.$this->ifunction->ifnull($dt_subchapter_17_2[8]).'</td><td>'.$this->ifunction->ifnull($dt_subchapter_17_2[9]).'</td><td>'.$this->ifunction->ifnull($dt_subchapter_17_2[10]).'</td><td>'.$this->ifunction->ifnull($dt_subchapter_17_2[11]).'</td><td>'.$this->ifunction->ifnull($dt_subchapter_17_2[12]).'</td><td>'.$this->ifunction->ifnull($dt_subchapter_17_2[13]).'</td><td>'.$this->ifunction->ifnull($dt_subchapter_17_2[14]).'</td><td>'.$this->ifunction->ifnull($dt_subchapter_17_2[15]).'</td><td>'.$this->ifunction->ifnull($dt_subchapter_17_2[16]).'</td><td>'.$this->ifunction->ifnull($dt_subchapter_17_2[17]).'</td><td>'.$this->ifunction->ifnull($dt_subchapter_17_2[18]).'</td><td>'.$this->ifunction->ifnull($dt_subchapter_17_2[19]).'</td></tr>';
}
?>
</table>

<hr />

<?php $Qchapter = $this->db->query("SELECT `no_chapter`, `content` FROM `it_atp_chapter` WHERE `atp_id`='$dx' AND `chapter`='18' ORDER BY `atp_chapter_id` ASC"); foreach($Qchapter->result_object() as $chapter) $arr_chapter_18[str_replace('18.', '', $chapter->no_chapter) -1]=$chapter ?>

<table class="border" cellpadding="0" cellspacing="0">
<tr class="header"><td width="40">Chapter</td><td>Title work performed</td><td width="30">OK</td><td width="40">Not OK</td><td width="35">N/A</td><td width="90">Remark</td></tr>
<tr><td valign="top"><b>18</b><br />18.1</td><td valign="top"><b>Checking sector mapping in Remote Inventory</b><br />Sector Mapping RBS1 / RBS2<br />(Print out this item from OMT Radio Configuration and visually compare with the antenna configuration).</td>
<td valign="top" align="center"><br /><br /><img src="<?php echo base_url() ?>static/i/radio<?php if($arr_chapter_18[0]->content=='OK') echo '_checked' ?>.jpg"></td>
<td valign="top" align="center"><br /><br /><img src="<?php echo base_url() ?>static/i/radio<?php if($arr_chapter_18[0]->content=='Not OK') echo '_checked' ?>.jpg"></td>
<td valign="top" align="center"><br /><br /><img src="<?php echo base_url() ?>static/i/radio<?php if($arr_chapter_18[0]->content=='N/A') echo '_checked' ?>.jpg"></td>
<td valign="top" align="center"><br /><br />Major</td>
</tr></table><br />

<?php $Qchapter = $this->db->query("SELECT `no_chapter`, `content` FROM `it_atp_chapter` WHERE `atp_id`='$dx' AND `chapter`='19' ORDER BY `atp_chapter_id` ASC"); foreach($Qchapter->result_object() as $chapter) $arr_chapter_19[str_replace('19.', '', $chapter->no_chapter) -1]=$chapter ?>

<table class="border" cellpadding="0" cellspacing="0">
<tr class="header"><td width="40">Chapter</td><td>Title work performed</td><td width="30">OK</td><td width="40">Not OK</td><td width="35">N/A</td><td width="90">Remark</td></tr>
<tr><td width="70" valign="top"><b>19</b><br /><br />19.1<br />19.2</td><td valign="top"><b>Setting VSWR  Limit Alarm using OMT (min OMT software release 40)</b><br />VSWR Limit Alarm Monitoring GSM 900 (fill in the table 8)<br />VSWR Limit Alarm Monitoring DCS 1800 (fill in the table 9)</td>
<td valign="top" align="center">
<?php echo '<br /><br />';
for($i=0; $i <= 1; $i++){
    echo '<img src="'.base_url().'static/i/radio'; if($arr_chapter_19[$i]->content=='OK') echo '_checked'; echo '.jpg"><br />';
}
?>
</td><td valign="top" align="center">
<?php echo '<br /><br />';
for($i=0; $i <= 1; $i++){
    echo '<img src="'.base_url().'static/i/radio'; if($arr_chapter_19[$i]->content=='Not OK') echo '_checked'; echo '.jpg"><br />';
}
?>
</td><td valign="top" align="center">
<?php echo '<br /><br />';
for($i=0; $i <= 1; $i++){
    echo '<img src="'.base_url().'static/i/radio'; if($arr_chapter_19[$i]->content=='N/A') echo '_checked'; echo '.jpg"><br />';
}
?>
</td><td valign="top" align="center"><br /><br />Major<br />Major</td></tr>
</table>

<?php $Qsubchapter = $this->db->query("SELECT `subno_chapter`, `content` FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `chapter`='19' AND `no_chapter`='19.1' ORDER BY `subno_chapter_order` ASC"); foreach($Qsubchapter->result_object() as $subchapter) $arr_subchapter_19_1[$subchapter->subno_chapter -1]=$subchapter ?>

<h3>Table 8: VSWR Limit Alarm Monitoring GSM 900</h3>
<table class="border" cellpadding="0" cellspacing="0">
<tr class="header">
    <td width="35" rowspan="2">Test No</td>
    <td rowspan="2">Antenna sector</td>
    <td colspan="2" >VSWR</td>
    <td width="30" rowspan="2">OK</td>
    <td width="40" rowspan="2">Not OK</td>
    <td width="35" rowspan="2">N/A</td>
    <td rowspan="2">Remark</td>
</tr>
<tr class="header"><td width="35">Class 1</td><td width="35">Class 2</td></tr>
<?php
for($i=0; $i <= 5; $i++){
	$dt_subchapter_19_1 = explode('|', $arr_subchapter_19_1[$i]->content);
	echo '<tr><td>19.1.'.($i+1).'</td><td>Antenna '.$i.'</td><td align="center">1.8</td><td align="center">1.5</td><td align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_19_1[3]=='OK') echo '_checked'; echo '.jpg"></td><td align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_19_1[3]=='Not OK') echo '_checked'; echo '.jpg"></td><td align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_19_1[3]=='N/A') echo '_checked'; echo '.jpg"></td><td>'.$this->ifunction->ifnull($dt_subchapter_19_1[4]).'</td></tr>';
}
?>
</table>

<?php $Qsubchapter = $this->db->query("SELECT `subno_chapter`, `content` FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `chapter`='19' AND `no_chapter`='19.2' ORDER BY `subno_chapter_order` ASC"); foreach($Qsubchapter->result_object() as $subchapter) $arr_subchapter_19_2[$subchapter->subno_chapter -1]=$subchapter ?>

<h3>Table 9: VSWR Limit Alarm Monitoring DCS 1800</h3>
<table class="border" cellpadding="0" cellspacing="0">
<tr class="header">
    <td width="35" rowspan="2">Test No</td>
    <td rowspan="2">Antenna sector</td>
    <td colspan="2" >VSWR</td>
    <td width="30" rowspan="2">OK</td>
    <td width="40" rowspan="2">Not OK</td>
    <td width="35" rowspan="2">N/A</td>
    <td rowspan="2">Remark</td>
</tr>
<tr class="header"><td width="35">Class 1</td><td width="35">Class 2</td></tr>
<?php
for($i=0; $i <= 8; $i++){
	$dt_subchapter_19_2 = explode('|', $arr_subchapter_19_2[$i]->content);
	echo '<tr><td>19.2.'.($i+1).'</td><td>Antenna '.$i.'</td><td align="center">1.8</td><td align="center">1.5</td><td align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_19_2[3]=='OK') echo '_checked'; echo '.jpg"></td><td align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_19_2[3]=='Not OK') echo '_checked'; echo '.jpg"></td><td align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_19_2[3]=='N/A') echo '_checked'; echo '.jpg"></td><td>'.$this->ifunction->ifnull($dt_subchapter_19_2[4]).'</td></tr>';
}
?> 
</table>

<hr />

<?php $Qchapter = $this->db->query("SELECT `no_chapter`, `content` FROM `it_atp_chapter` WHERE `atp_id`='$dx' AND `chapter`='20' ORDER BY `atp_chapter_id` ASC"); foreach($Qchapter->result_object() as $chapter) $arr_chapter_20[str_replace('20.', '', $chapter->no_chapter) -1]=$chapter ?>

<table class="border" cellpadding="0" cellspacing="0">
<tr class="header"><td width="40">Chapter</td><td>Title work performed</td><td width="30">OK</td><td width="40">Not OK</td><td width="35">N/A</td><td width="90">Remark</td></tr>
<tr><td valign="top"><b>20</b><br />20.1<br />20.2<br />20.3<br /><br />20.4<br /><br />20.5<br />20.6</td><td valign="top"><b>Test Call (successful)</b><br />From MS to MS GSM900 / DCS1800<br />From MS to PSTN GSM900 / DCS1800<br />Call to Specific/Emergency Numbers (108, 112) GSM900 / DCS1800<br />HO test (500 m or after HO) >> will be done<br />When we leave the site. GSM900 / DCS1800<br />GPRS functionality test (access to Web) GSM900 / DCS1800<br />EDGE / EGPRS Functionality Test Call</td>
<td valign="top" align="center">
<?php echo '<br />';
for($i=0; $i <= 5; $i++){
    echo '<img src="'.base_url().'static/i/radio'; if($arr_chapter_20[$i]->content=='OK') echo '_checked'; echo '.jpg"><br />';
	if(($i==2)||($i==3)) echo '<br />';
}
?>
</td><td valign="top" align="center">
<?php echo '<br />';
for($i=0; $i <= 5; $i++){
    echo '<img src="'.base_url().'static/i/radio'; if($arr_chapter_20[$i]->content=='Not OK') echo '_checked'; echo '.jpg"><br />';
	if(($i==2)||($i==3)) echo '<br />';
}
?>
</td><td valign="top" align="center">
<?php echo '<br />';
for($i=0; $i <= 5; $i++){
    echo '<img src="'.base_url().'static/i/radio'; if($arr_chapter_20[$i]->content=='N/A') echo '_checked'; echo '.jpg"><br />';
	if(($i==2)||($i==3)) echo '<br />';
}
?>
</td><td valign="top" align="center">
<?php echo '<br />';
for($i=0; $i <= 5; $i++){
    echo 'Major<br />';
	if(($i==2)||($i==3)) echo '<br />';
}
?> 
</td></tr>
</table>
<p style="font-size:11px">- For testing purposed ARFCN must be locked.</p>

<?php $Qsubchapter = $this->db->query("SELECT `subno_chapter`, `content` FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `chapter`='19' AND `no_chapter`='19.6' ORDER BY `subno_chapter_order` ASC"); foreach($Qsubchapter->result_object() as $subchapter) $arr_subchapter_19_6[$subchapter->subno_chapter -1]=$subchapter; 

$dt_subchapter_19_6a = explode('|', $arr_subchapter_19_6[0]->content);
$dt_subchapter_19_6b = explode('|', $arr_subchapter_19_6[1]->content);
$dt_subchapter_19_6c = explode('|', $arr_subchapter_19_6[2]->content) ?>

<p>Chapter 19.6: EDGE / EGPRS Functionality Test Call<br />Number of Time Slot = <?php echo $this->ifunction->ifnull($dt_subchapter_19_6a[3]) ?> ts<br />Throughput Value<br />Downlink = <?php echo $this->ifunction->ifnull($dt_subchapter_19_6b[3]) ?> kbps<br />Uplink = <?php echo $this->ifunction->ifnull($dt_subchapter_19_6c[3]) ?> kbps</p>

<h3>Table 10: Test call function GSM 900/DCS 1800</h3>

<?php $Qsubchapter = $this->db->query("SELECT `subno_chapter`, `content` FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `chapter`='19' AND `no_chapter`='19.8' ORDER BY `subno_chapter_order` ASC"); foreach($Qsubchapter->result_object() as $subchapter) $arr_subchapter_19_8[$subchapter->subno_chapter -1]=$subchapter;

$Qsubchapter = $this->db->query("SELECT `subno_chapter`, `content` FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `chapter`='19' AND `no_chapter`='19.7' ORDER BY `subno_chapter_order` ASC"); foreach($Qsubchapter->result_object() as $subchapter) $arr_subchapter_19_7[$subchapter->subno_chapter -1]=$subchapter; 

$dt_subchapter_19_7a = explode('|', $arr_subchapter_19_7[0]->content) ?>

<p><b>SECTOR A: MCC = <?php echo $this->ifunction->ifnull($dt_subchapter_19_7a[3]) ?>, MNC = <?php echo $this->ifunction->ifnull($dt_subchapter_19_7a[4]) ?>, LAC = <?php echo $this->ifunction->ifnull($dt_subchapter_19_7a[5]) ?>, CELL ID = <?php echo $this->ifunction->ifnull($dt_subchapter_19_7a[6]) ?>, ARFCN/BCCH = <?php echo $this->ifunction->ifnull($dt_subchapter_19_7a[7]) ?></b></p>

<table class="border" cellpadding="0" cellspacing="0">
<tr class="header">
    <td width="80" rowspan="2">Item Test </td>
    <td width="90" rowspan="2">Host Address </td>
    <td colspan="2">Downlink </td>
    <td colspan="2">Uplink </td>
    <td rowspan="2">Throughput<br />/ Delay</td>
    <td colspan="3">Test Call Result</td>
    <td width="50" rowspan="2">Remark</td>
</tr>
<tr class="header">
    <td>TS </td><td>MCS </td><td>TS </td><td>MCS</td><td width="30">OK</td><td width="40">NOK</td><td width="35">N/A</td>
</tr>
<?php
$arr_dt_198 = array('PING', 'WAP', 'HTTP', 'FTP Downlink', 'FTP Uplink', 'Video Streaming');
for($i=0; $i <= 5; $i++){
	$dt_subchapter_19_8 = explode('|', $arr_subchapter_19_8[$i]->content);
	echo '<tr><td>'.$arr_dt_198[$i].'</td>';
	echo '<td>'.$this->ifunction->ifnull($dt_subchapter_19_8[4]).'</td>';
	echo '<td>'.$this->ifunction->ifnull($dt_subchapter_19_8[5]).'</td>';
	echo '<td>'.$this->ifunction->ifnull($dt_subchapter_19_8[6]).'</td>';
	echo '<td>'.$this->ifunction->ifnull($dt_subchapter_19_8[7]).'</td>';
	echo '<td>'.$this->ifunction->ifnull($dt_subchapter_19_8[8]).'</td>';
	echo '<td>'.$this->ifunction->ifnull($dt_subchapter_19_8[9]).'</td>';
	echo '<td align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_19_8[3]=='OK') echo '_checked'; echo '.jpg" /></td>';
	echo '<td align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_19_8[3]=='Not OK') echo '_checked'; echo '.jpg" /></td>';
	echo '<td align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_19_8[3]=='N/A') echo '_checked'; echo '.jpg" /></td>';
	echo '<td>'.$this->ifunction->ifnull($dt_subchapter_19_8[10]).'</td></tr>';
}
?>
</table><br />

<?php $Qsubchapter = $this->db->query("SELECT `subno_chapter`, `content` FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `chapter`='19' AND `no_chapter`='19.10' ORDER BY `subno_chapter_order` ASC"); foreach($Qsubchapter->result_object() as $subchapter) $arr_subchapter_19_10[$subchapter->subno_chapter -1]=$subchapter;

$Qsubchapter = $this->db->query("SELECT `subno_chapter`, `content` FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `chapter`='19' AND `no_chapter`='19.9' ORDER BY `subno_chapter_order` ASC"); foreach($Qsubchapter->result_object() as $subchapter) $arr_subchapter_19_9[$subchapter->subno_chapter -1]=$subchapter; 

$dt_subchapter_19_9a = explode('|', $arr_subchapter_19_9[0]->content) ?>

<p><b>SECTOR B: MCC = <?php echo $this->ifunction->ifnull($dt_subchapter_19_9a[3]) ?>, MNC = <?php echo $this->ifunction->ifnull($dt_subchapter_19_9a[4]) ?>, LAC = <?php echo $this->ifunction->ifnull($dt_subchapter_19_9a[5]) ?>, CELL ID = <?php echo $this->ifunction->ifnull($dt_subchapter_19_9a[6]) ?>, ARFCN/BCCH = <?php echo $this->ifunction->ifnull($dt_subchapter_19_9a[7]) ?></b></p>

<table class="border" cellpadding="0" cellspacing="0">
<tr class="header">
    <td width="80" rowspan="2">Item Test </td>
    <td width="90" rowspan="2">Host Address </td>
    <td colspan="2">Downlink </td>
    <td colspan="2">Uplink </td>
    <td rowspan="2">Throughput<br />/ Delay</td>
    <td colspan="3">Test Call Result</td>
    <td width="50" rowspan="2">Remark</td>
</tr>
<tr class="header">
    <td>TS </td><td>MCS </td><td>TS </td><td>MCS</td><td width="30">OK</td><td width="40">NOK</td><td width="35">N/A</td>
</tr>
  <?php
$arr_dt_1910 = array('PING', 'WAP', 'HTTP', 'FTP Downlink', 'FTP Uplink', 'Video Streaming');
for($i=0; $i <= 5; $i++){
	$dt_subchapter_19_10 = explode('|', $arr_subchapter_19_10[$i]->content);
	echo '<tr><td>'.$arr_dt_1910[$i].'</td>';
	echo '<td>'.$this->ifunction->ifnull($dt_subchapter_19_10[4]).'</td>';
	echo '<td>'.$this->ifunction->ifnull($dt_subchapter_19_10[5]).'</td>';
	echo '<td>'.$this->ifunction->ifnull($dt_subchapter_19_10[6]).'</td>';
	echo '<td>'.$this->ifunction->ifnull($dt_subchapter_19_10[7]).'</td>';
	echo '<td>'.$this->ifunction->ifnull($dt_subchapter_19_10[8]).'</td>';
	echo '<td>'.$this->ifunction->ifnull($dt_subchapter_19_10[9]).'</td>';
	echo '<td align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_19_10[3]=='OK') echo '_checked'; echo '.jpg" /></td>';
	echo '<td align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_19_10[3]=='Not OK') echo '_checked'; echo '.jpg" /></td>';
	echo '<td align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_19_10[3]=='N/A') echo '_checked'; echo '.jpg" /></td>';
	echo '<td>'.$this->ifunction->ifnull($dt_subchapter_19_10[10]).'</td></tr>';
}
?>
</table>

<hr />

<?php $Qsubchapter = $this->db->query("SELECT `subno_chapter`, `content` FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `chapter`='19' AND `no_chapter`='19.11' ORDER BY `subno_chapter_order` ASC"); foreach($Qsubchapter->result_object() as $subchapter) $arr_subchapter_19_11[$subchapter->subno_chapter -1]=$subchapter; 

$dt_subchapter_19_11a = explode('|', $arr_subchapter_19_11[0]->content);

$Qsubchapter = $this->db->query("SELECT `subno_chapter`, `content` FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `chapter`='19' AND `no_chapter`='19.12' ORDER BY `subno_chapter_order` ASC"); foreach($Qsubchapter->result_object() as $subchapter) $arr_subchapter_19_12[$subchapter->subno_chapter -1]=$subchapter ?>

<p><b>SECTOR C: MCC = <?php echo $this->ifunction->ifnull($dt_subchapter_19_11a[3]) ?>, MNC = <?php echo $this->ifunction->ifnull($dt_subchapter_19_11a[4]) ?>, LAC = <?php echo $this->ifunction->ifnull($dt_subchapter_19_11a[5]) ?>, CELL ID = <?php echo $this->ifunction->ifnull($dt_subchapter_19_11a[6]) ?>, ARFCN/BCCH = <?php echo $this->ifunction->ifnull($dt_subchapter_19_11a[7]) ?></b></p>

<table class="border" cellpadding="0" cellspacing="0">
<tr class="header">
    <td width="80" rowspan="2">Item Test </td>
    <td width="90" rowspan="2">Host Address </td>
    <td colspan="2">Downlink </td>
    <td colspan="2">Uplink </td>
    <td rowspan="2">Throughput<br />/ Delay</td>
    <td colspan="3">Test Call Result</td>
    <td width="50" rowspan="2">Remark</td>
</tr>
<tr class="header">
    <td>TS </td>
    <td>MCS </td>
    <td>TS </td>
    <td>MCS</td>
    <td width="30">OK</td>
    <td width="40">Not OK</td>
    <td width="35">N/A</td>
</tr>
<?php
$arr_dt_1912 = array('PING', 'WAP', 'HTTP', 'FTP Downlink', 'FTP Uplink', 'Video Streaming');
for($i=0; $i <= 5; $i++){
	$dt_subchapter_19_12 = explode('|', $arr_subchapter_19_12[$i]->content);
	echo '<tr><td>'.$arr_dt_1912[$i].'</td>';
	echo '<td>'.$this->ifunction->ifnull($dt_subchapter_19_12[4]).'</td>';
	echo '<td>'.$this->ifunction->ifnull($dt_subchapter_19_12[5]).'</td>';
	echo '<td>'.$this->ifunction->ifnull($dt_subchapter_19_12[6]).'</td>';
	echo '<td>'.$this->ifunction->ifnull($dt_subchapter_19_12[7]).'</td>';
	echo '<td>'.$this->ifunction->ifnull($dt_subchapter_19_12[8]).'</td>';
	echo '<td>'.$this->ifunction->ifnull($dt_subchapter_19_12[9]).'</td>';
	echo '<td align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_19_12[3]=='OK') echo '_checked'; echo '.jpg" /></td>';
	echo '<td align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_19_12[3]=='Not OK') echo '_checked'; echo '.jpg" /></td>';
	echo '<td align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_19_12[3]=='N/A') echo '_checked'; echo '.jpg" /></td>';
	echo '<td>'.$this->ifunction->ifnull($dt_subchapter_19_12[10]).'</td></tr>';
}
?>
</table><br />

<?php $Qchapter = $this->db->query("SELECT `no_chapter`, `content` FROM `it_atp_chapter` WHERE `atp_id`='$dx' AND `chapter`='21' ORDER BY `atp_chapter_id` ASC"); foreach($Qchapter->result_object() as $chapter) $arr_chapter_21[str_replace('21.', '', $chapter->no_chapter) -1]=$chapter ?>

<table class="border" cellpadding="0" cellspacing="0">
<tr class="header"><td width="40">Chapter</td><td>Title work performed</td><td width="30">OK</td><td width="40">Not OK</td><td width="35">N/A</td><td width="90">Remark</td></tr>
<tr><td valign="top"><b>21</b><br />21<br />21.1<br />21.2</td><td valign="top"><b>Antenna system measurement</b><br />Antenna Diversity Test<br />GSM 900 Antenna Diversity Test<br />DCS 1800 Antenna Diversity Test</td>
<td valign="top" align="center">
<?php echo '<br />';
for($i=0; $i <= 2; $i++){
    echo '<img src="'.base_url().'static/i/radio'; if($arr_chapter_21[$i]->content=='OK') echo '_checked'; echo '.jpg"><br />';
}
?>
</td><td valign="top" align="center">
<?php echo '<br />';
for($i=0; $i <= 2; $i++){
    echo '<img src="'.base_url().'static/i/radio'; if($arr_chapter_21[$i]->content=='Not OK') echo '_checked'; echo '.jpg"><br />';
}
?>
</td><td valign="top" align="center">
<?php echo '<br />';
for($i=0; $i <= 2; $i++){
    echo '<img src="'.base_url().'static/i/radio'; if($arr_chapter_21[$i]->content=='N/A') echo '_checked'; echo '.jpg"><br />';
}
?>
</td><td valign="top" align="center"><br /><br />Major<br />Major</td></tr>
</table>

<?php $Qsubchapter = $this->db->query("SELECT `subno_chapter`, `content` FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `chapter`='21' AND `no_chapter`='21.1' ORDER BY `subno_chapter_order` ASC"); foreach($Qsubchapter->result_object() as $subchapter) $arr_subchapter_21_1[$subchapter->subno_chapter -1]=$subchapter ?>

<h3>Table 11: GSM 900 Antenna Diversity Test</h3>
<table class="border" cellpadding="0" cellspacing="0">
<tr class="header">
    <td width="40" rowspan="2">Test No </td>
    <td width="45" rowspan="2">RUG/RUS </td>
    <td rowspan="2">RX Diversity Parameter (0 +/- 3 dB) SSI RXA - SSI RXB</td>
    <td colspan="3">Status</td>
    <td rowspan="2">Remark</td>
</tr>
<tr class="header">
    <td width="30">OK</td>
    <td width="40">Not OK</td>
    <td width="35">N/A</td>
</tr>
<?php
for($i=0; $i <= 15; $i++){
	$dt_subchapter_21_1 = explode('|', $arr_subchapter_21_1[$i]->content);
	echo '<tr><td>21.1.'.($i +1).'</td><td align="center">TRX - '.($i +1).'</td>';
	echo '<td>'.$this->ifunction->ifnull($dt_subchapter_21_1[4]).'</td>';
	echo '<td><img src="'.base_url().'static/i/radio'; if($dt_subchapter_21_1[3]=='OK') echo '_checked'; echo '.jpg"></td>';
	echo '<td><img src="'.base_url().'static/i/radio'; if($dt_subchapter_21_1[3]=='Not OK') echo '_checked'; echo '.jpg"></td>';
	echo '<td><img src="'.base_url().'static/i/radio'; if($dt_subchapter_21_1[3]=='N/A') echo '_checked'; echo '.jpg"></td>';
	echo '<td>'.$this->ifunction->ifnull($dt_subchapter_21_1[5]).'</td></tr>';
}
?>
</table>
<p style="font-size:11px"><i>Note: SSI = Signal Strength Imbalance</i></p>

<hr />

<?php $Qsubchapter = $this->db->query("SELECT `subno_chapter`, `content` FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `chapter`='21' AND `no_chapter`='21.2' ORDER BY `subno_chapter_order` ASC"); foreach($Qsubchapter->result_object() as $subchapter) $arr_subchapter_21_2[$subchapter->subno_chapter -1]=$subchapter ?>

<h3>Table 12: DCS 1800 Antenna Diversity Test</h3>
<table class="border" cellpadding="0" cellspacing="0">
<tr class="header">
    <td width="40" rowspan="2">Test No </td>
    <td width="45" rowspan="2">RUG/RUS </td>
    <td rowspan="2">RX Diversity Parameter (0 +/- 3 dB) SSI RXA - SSI RXB</td>
    <td colspan="3">Status</td>
    <td rowspan="2">Remark</td>
</tr>
<tr class="header">
    <td width="30">OK</td>
    <td width="40">Not OK</td>
    <td width="35">N/A</td>
</tr>
<?php
for($i=0; $i <= 23; $i++){
	$dt_subchapter_21_2 = explode('|', $arr_subchapter_21_2[$i]->content);
	echo '<tr><td>21.2.'.($i +1).'</td><td align="center">TRX - '.($i +1).'</td>';
	echo '<td>'.$this->ifunction->ifnull($dt_subchapter_21_2[4]).'</td>';
	echo '<td align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_21_2[3]=='OK') echo '_checked'; echo '.jpg"></td>';
	echo '<td align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_21_2[3]=='Not OK') echo '_checked'; echo '.jpg"></td>';
	echo '<td align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_21_2[3]=='N/A') echo '_checked'; echo '.jpg"></td>';
	echo '<td>'.$this->ifunction->ifnull($dt_subchapter_21_2[5]).'</td></tr>';
}
?>
</table>
<p style="font-size:11px"><i>Note: SSI = Signal Strength Imbalance</i></p>

<?php $Qchapter = $this->db->query("SELECT `no_chapter`, `content` FROM `it_atp_chapter` WHERE `atp_id`='$dx' AND `chapter`='22' ORDER BY `atp_chapter_id` ASC"); foreach($Qchapter->result_object() as $chapter) $arr_chapter_22[str_replace('22.', '', $chapter->no_chapter) -1]=$chapter ?>

<table class="border" cellpadding="0" cellspacing="0">
<tr class="header"><td width="40">Chapter</td><td>Title work performed</td><td width="30">OK</td><td width="40">Not OK</td><td width="35">N/A</td><td width="90">Remark</td></tr>
<tr><td valign="top"><b>22</b><br /><br />22.1<br /><br />22.2</td><td valign="top"><b>RUG / RUS Output power & VSWR (direct connection to antenna)</b><br />DRU / RUG /RUS Output power & VSWR Test use OMT - GSM 900<br />DRU / RUG / RUS Output power & VSWR Test use OMT - DCS 1800</td>
<td valign="top" align="center">
<?php echo '<br /><br />';
for($i=0; $i <= 1; $i++){
    echo '<img src="'.base_url().'static/i/radio'; if($arr_chapter_22[$i]->content=='OK') echo '_checked'; echo '.jpg"><br />';
    if($i==0) echo '<br />';
}
?>
</td><td valign="top" align="center">
<?php echo '<br /><br />';
for($i=0; $i <= 1; $i++){
    echo '<img src="'.base_url().'static/i/radio'; if($arr_chapter_22[$i]->content=='Not OK') echo '_checked'; echo '.jpg"><br />';
    if($i==0) echo '<br />';
}
?>
</td><td valign="top" align="center">
<?php echo '<br /><br />';
for($i=0; $i <= 1; $i++){
    echo '<img src="'.base_url().'static/i/radio'; if($arr_chapter_22[$i]->content=='N/A') echo '_checked'; echo '.jpg"><br />';
    if($i==0) echo '<br />';
}
?>
</td><td valign="top" align="center"><br /><br />Major<br /><br />Major</td></tr>
</table>

<hr />

<?php $Qsubchapter = $this->db->query("SELECT `subno_chapter`, `content` FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `chapter`='22' AND `no_chapter`='22.1' ORDER BY `subno_chapter_order` ASC"); foreach($Qsubchapter->result_object() as $subchapter) $arr_subchapter_22_1[$subchapter->subno_chapter -1]=$subchapter ?>

<h3>Table 13: RUG/RUS Output power test - GSM 900</h3>
<table class="border" cellpadding="0" cellspacing="0">
<tr class="header">
    <td>Test No</td>
    <td>TRX</td>
    <td>CAB #</td>
    <td>Power Set from Integrator</td>
    <td>Power Set in BTS (OMT_MCTR)</td>
    <td>Power measured using OMT</td>
    <td width="30">OK</td>
    <td width="40">Not<br />OK </td>
    <td width="35">N/A</td>
    <td>Remark</td>
</tr>
<?php
for($i=0; $i <= 11; $i++){
	$dt_subchapter_22_1 = explode('|', $arr_subchapter_22_1[$i]->content);
	echo '<tr><td>22.1.'.($i +1).'</td><td align="center"> '.$i.'</td>';
	echo '<td>'.$this->ifunction->ifnull($dt_subchapter_22_1[4]).'</td>';
	echo '<td>'.$this->ifunction->ifnull($dt_subchapter_22_1[5]).'</td>';
	echo '<td>'.$this->ifunction->ifnull($dt_subchapter_22_1[6]).'</td>';
	echo '<td>'.$this->ifunction->ifnull($dt_subchapter_22_1[7]).'</td>';
	echo '<td align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_22_1[3]=='OK') echo '_checked'; echo '.jpg"></td>';
	echo '<td align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_22_1[3]=='Not OK') echo '_checked'; echo '.jpg"></td>';
	echo '<td align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_22_1[3]=='N/A') echo '_checked'; echo '.jpg"></td>';
	echo '<td>'.$this->ifunction->ifnull($dt_subchapter_22_1[8]).'</td></tr>';
}
?>
</table>

<hr  />

<?php $Qsubchapter = $this->db->query("SELECT `subno_chapter`, `content` FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `chapter`='22' AND `no_chapter`='22.2' ORDER BY `subno_chapter_order` ASC"); foreach($Qsubchapter->result_object() as $subchapter) $arr_subchapter_22_2[$subchapter->subno_chapter -1]=$subchapter ?>

<h3>Table 14: RUG/RUS Output power test - DCS 1800</h3>
<table class="border" cellpadding="0" cellspacing="0">
<tr class="header">
    <td>Test No</td>
    <td>TRX</td>
    <td>CAB #</td>
    <td>Power Set from Integrator</td>
    <td>Power Set in BTS (OMT_MCTR)</td>
    <td>Power measured using OMT</td>
    <td width="30">OK</td>
    <td width="40">Not<br />OK </td>
    <td width="35">N/A</td>
    <td>Remark</td>
</tr>
<?php
for($i=0; $i <= 11; $i++){
	$dt_subchapter_22_2 = explode('|', $arr_subchapter_22_2[$i]->content);
	echo '<tr><td>22.2.'.($i +1).'</td><td align="center"> '.$i.'</td>';
	echo '<td>'.$this->ifunction->ifnull($dt_subchapter_22_2[4]).'</td>';
	echo '<td>'.$this->ifunction->ifnull($dt_subchapter_22_2[5]).'</td>';
	echo '<td>'.$this->ifunction->ifnull($dt_subchapter_22_2[6]).'</td>';
	echo '<td>'.$this->ifunction->ifnull($dt_subchapter_22_2[7]).'</td>';
	echo '<td align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_22_2[3]=='OK') echo '_checked'; echo '.jpg"></td>';
	echo '<td align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_22_2[3]=='Not OK') echo '_checked'; echo '.jpg"></td>';
	echo '<td align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_22_2[3]=='N/A') echo '_checked'; echo '.jpg"></td>';
	echo '<td>'.$this->ifunction->ifnull($dt_subchapter_22_2[8]).'</td></tr>';
}
?>
</table><br />

<?php $Qchapter = $this->db->query("SELECT `no_chapter`, `content` FROM `it_atp_chapter` WHERE `atp_id`='$dx' AND `chapter`='23' ORDER BY `atp_chapter_id` ASC"); foreach($Qchapter->result_object() as $chapter) $arr_chapter_23[str_replace('23.', '', $chapter->no_chapter) -1]=$chapter ?>

<table class="border" cellpadding="0" cellspacing="0">
<tr class="header"><td width="40">Chapter</td><td>Title work performed</td><td width="30">OK</td><td width="40">Not OK</td><td width="35">N/A</td><td width="90">Remark</td></tr>
<tr><td valign="top"><b>23</b><br />23.1<br /><br />23.2</td><td valign="top"><b>Checking License of MCPA/IPM feature in RUS</b><br />Checking MCPA/IPM license activation (status rxomctr PAO and IPM status must be on , refer to BOQ)<br />Checking MCPA/IPM license capacity(For License capacity refer to License capacity in BSC)</td>
<td valign="top" align="center">
<?php echo '<br />';
for($i=0; $i <= 1; $i++){
    echo '<img src="'.base_url().'static/i/radio'; if($arr_chapter_23[$i]->content=='OK') echo '_checked'; echo '.jpg"><br />';
    if($i==0) echo '<br />';
}
?>
</td><td valign="top" align="center">
<?php echo '<br />';
for($i=0; $i <= 1; $i++){
    echo '<img src="'.base_url().'static/i/radio'; if($arr_chapter_23[$i]->content=='Not OK') echo '_checked'; echo '.jpg"><br />';
    if($i==0) echo '<br />';
}
?>
</td><td valign="top" align="center">
<?php echo '<br />';
for($i=0; $i <= 1; $i++){
    echo '<img src="'.base_url().'static/i/radio'; if($arr_chapter_23[$i]->content=='N/A') echo '_checked'; echo '.jpg"><br />';
    if($i==0) echo '<br />';
}
?>
</td><td valign="top" align="center"><br />Major<br /><br />Major</td></tr>
</table>

<?php $Qsubchapter = $this->db->query("SELECT `subno_chapter`, `content` FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `chapter`='23' AND `no_chapter`='23.1' ORDER BY `subno_chapter_order` ASC"); foreach($Qsubchapter->result_object() as $subchapter) $arr_subchapter_23_1[$subchapter->subno_chapter -1]=$subchapter ?>

<h3>Table 15. MCPA license Activation</h3>
<table class="border" cellpadding="0" cellspacing="0">
<tr class="header">
	<td width="20">No</td><td>RUS</td><td>Manage Object</td><td>Status PAO<br />(ON/OFF)</td><td>Status IPM (ON/OFF)</td><td>Remark</td>
</tr>
<?php
for($i=0; $i <= 5; $i++){
	$dt_subchapter_23_1 = explode('|', $arr_subchapter_23_1[$i]->content);
	echo '<tr><td align="center"> '.($i +1).'</td>';
	echo '<td>'.$this->ifunction->ifnull($dt_subchapter_23_1[3]).'</td>';
	echo '<td>'.$this->ifunction->ifnull($dt_subchapter_23_1[4]).'</td>';
	echo '<td>'.$this->ifunction->ifnull($dt_subchapter_23_1[5]).'</td>';
	echo '<td>'.$this->ifunction->ifnull($dt_subchapter_23_1[6]).'</td>';
	echo '<td>'.$this->ifunction->ifnull($dt_subchapter_23_1[7]).'</td></tr>';
}
?>
</table>

<hr />

<?php $Qchapter = $this->db->query("SELECT `no_chapter`, `content` FROM `it_atp_chapter` WHERE `atp_id`='$dx' AND `chapter`='24' ORDER BY `atp_chapter_id` ASC"); foreach($Qchapter->result_object() as $chapter) $arr_chapter_24[str_replace('24.', '', $chapter->no_chapter) -1]=$chapter ?>

<table class="border" cellpadding="0" cellspacing="0">
<tr class="header"><td width="40">Chapter</td><td>Title work performed</td><td width="30">OK</td><td width="40">Not OK</td><td width="35">N/A</td><td width="90">Remark</td></tr>
<tr><td valign="top"><b>24</b><br />24.1<br />24.2<br />24.2.1<br />24.2.2</td><td valign="top"><b>Antenna system measurement</b><br />Distance to fault use dummy load<br />VSWR Measurement<br />VSWR Measurement UL & DL GSM 900<br />VSWR Measurement UL & DL DCS 1800</td>
<td valign="top" align="center">
<?php echo '<br />';
for($i=0; $i <= 3; $i++){
    echo '<img src="'.base_url().'static/i/radio'; if($arr_chapter_24[$i]->content=='OK') echo '_checked'; echo '.jpg"><br />';
}
?>
</td><td valign="top" align="center">
<?php echo '<br />';
for($i=0; $i <= 3; $i++){
    echo '<img src="'.base_url().'static/i/radio'; if($arr_chapter_24[$i]->content=='Not OK') echo '_checked'; echo '.jpg"><br />';
}
?>
</td><td valign="top" align="center">
<?php echo '<br />';
for($i=0; $i <= 3; $i++){
    echo '<img src="'.base_url().'static/i/radio'; if($arr_chapter_24[$i]->content=='N/A') echo '_checked'; echo '.jpg"><br />';
}
?>
</td><td valign="top" align="center"><br />Major</td></tr>
</table>

<h3>24.1. Distances to Fault Measurement with Dummy Load</h3>
<p style="font-size:11px">Standard Measurement: DTF VSWR connector maximum 1.03 and feeder cable 1.01<br />(For existing/Re-use antenna system, refer to actual measurement)</p>

<?php $Qsubchapter = $this->db->query("SELECT `subno_chapter`, `content` FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `chapter`='24' AND `no_chapter`='24.1' ORDER BY `subno_chapter_order` ASC"); foreach($Qsubchapter->result_object() as $subchapter) $arr_subchapter_24_1[$subchapter->subno_chapter -1]=$subchapter ?>

<h3>Table 16. DTF GSM 900</h3>
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
    <td rowspan="2">Remark</td>
</tr>
<tr class="header"><td>S</td><td>D</td><td>S</td><td>D</td><td>S</td><td>D</td><td>S</td><td>D</td><td>S</td><td>D</td></tr>
<?php
$arr_dt_241 = array('Cell A DX1', 'Cell A DX2', 'Cell A DX3', 'Cell A DX4', 'Cell B DX1', 'Cell B DX2', 'Cell B DX3', 'Cell B DX4', 'Cell C DX1', 'Cell C DX2', 'Cell C DX3', 'Cell C DX4');
for($i=0; $i <= 11; $i++){
	$dt_subchapter_24_1 = explode('|', $arr_subchapter_24_1[$i]->content);
	echo '<tr><td>'.$arr_dt_241[$i].'</td>';
	echo '<td>'.$this->ifunction->ifnull($dt_subchapter_24_1[4]).'</td>';
	echo '<td>'.$this->ifunction->ifnull($dt_subchapter_24_1[5]).'</td>';
	echo '<td>'.$this->ifunction->ifnull($dt_subchapter_24_1[6]).'</td>';
	echo '<td>'.$this->ifunction->ifnull($dt_subchapter_24_1[7]).'</td>';
	echo '<td>'.$this->ifunction->ifnull($dt_subchapter_24_1[8]).'</td>';
	echo '<td>'.$this->ifunction->ifnull($dt_subchapter_24_1[9]).'</td>';
	echo '<td>'.$this->ifunction->ifnull($dt_subchapter_24_1[10]).'</td>';
	echo '<td>'.$this->ifunction->ifnull($dt_subchapter_24_1[11]).'</td>';
	echo '<td>'.$this->ifunction->ifnull($dt_subchapter_24_1[12]).'</td>';
	echo '<td>'.$this->ifunction->ifnull($dt_subchapter_24_1[13]).'</td>';
	echo '<td align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_24_1[3]=='OK') echo '_checked'; echo '.jpg"></td>';
	echo '<td align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_24_1[3]=='Not OK') echo '_checked'; echo '.jpg"></td>';
	echo '<td align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_24_1[3]=='N/A') echo '_checked'; echo '.jpg"></td>';
	echo '<td>'.$this->ifunction->ifnull($dt_subchapter_24_1[14]).'</td></tr>';
}
?>
</table>

<hr />

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
	echo '<td>'.$this->ifunction->ifnull($dt_subchapter_24_3[4]).'</td>';
	echo '<td>'.$this->ifunction->ifnull($dt_subchapter_24_3[5]).'</td>';
	echo '<td>'.$this->ifunction->ifnull($dt_subchapter_24_3[6]).'</td>';
	echo '<td>'.$this->ifunction->ifnull($dt_subchapter_24_3[7]).'</td>';
	echo '<td>'.$this->ifunction->ifnull($dt_subchapter_24_3[8]).'</td>';
	echo '<td>'.$this->ifunction->ifnull($dt_subchapter_24_3[9]).'</td>';
	echo '<td>'.$this->ifunction->ifnull($dt_subchapter_24_3[10]).'</td>';
	echo '<td>'.$this->ifunction->ifnull($dt_subchapter_24_3[11]).'</td>';
	echo '<td>'.$this->ifunction->ifnull($dt_subchapter_24_3[12]).'</td>';
	echo '<td>'.$this->ifunction->ifnull($dt_subchapter_24_3[13]).'</td>';
	echo '<td align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_24_3[3]=='OK') echo '_checked'; echo '.jpg"></td>';
	echo '<td align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_24_3[3]=='Not OK') echo '_checked'; echo '.jpg"></td>';
	echo '<td align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_24_3[3]=='N/A') echo '_checked'; echo '.jpg"></td>';
	echo '<td>'.$this->ifunction->ifnull($dt_subchapter_24_3[14]).'</td></tr>';
}
?>
</table>

<?php $Qsubchapter = $this->db->query("SELECT `subno_chapter`, `content` FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `chapter`='24' AND `no_chapter`='24.2' ORDER BY `subno_chapter_order` ASC"); foreach($Qsubchapter->result_object() as $subchapter) $arr_subchapter_24_2[$subchapter->subno_chapter -1]=$subchapter ?>

<h3>24.2. VSWR measurement UL & DL GSM 900 & DCS 1800</h3>
<p style="font-size:11px">Standard VSWR Vs Frequency Response: &le; 1.30</p>

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
	echo '<td>'.$this->ifunction->ifnull($dt_subchapter_24_2[4]).'</td>';
	echo '<td>'.$this->ifunction->ifnull($dt_subchapter_24_2[5]).'</td>';
	echo '<td>'.$this->ifunction->ifnull($dt_subchapter_24_2[6]).'</td>';
	echo '<td>'.$this->ifunction->ifnull($dt_subchapter_24_2[7]).'</td>';
	echo '<td>'.$this->ifunction->ifnull($dt_subchapter_24_2[8]).'</td>';
	echo '<td>'.$this->ifunction->ifnull($dt_subchapter_24_2[9]).'</td>';
	echo '<td align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_24_2[3]=='OK') echo '_checked'; echo '.jpg"></td>';
	echo '<td align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_24_2[3]=='Not OK') echo '_checked'; echo '.jpg"></td>';
	echo '<td align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_24_2[3]=='N/A') echo '_checked'; echo '.jpg"></td>';
	echo '<td>'.$this->ifunction->ifnull($dt_subchapter_24_2[10]).'</td></tr>';
}
?>
</table>

<hr />

<?php $Qsubchapter = $this->db->query("SELECT `subno_chapter`, `content` FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `chapter`='25' AND `no_chapter`='25.1' ORDER BY `subno_chapter_order` ASC"); foreach($Qsubchapter->result_object() as $subchapter) $arr_subchapter_25_1[$subchapter->subno_chapter -1]=$subchapter ?>

<h3>Chapter 25 : Battery Backup System (BBS) Test<br />Chapter 25.1: BBS Type Identification</h3>

<table class="border" cellpadding="0" cellspacing="0">
<tr class="header">
    <td width="40">Test No</td>
    <td>BBS Type</td>
    <td width="30">OK</td>
    <td width="40">Not OK </td>
    <td width="35">N/A</td>
    <td>Remark</td>
</tr>
<?php
$arr_dt_251 = array('BBS 6201 for RBS 6201', 'BBS for RBS 6102', 'BBS for 6601', 'Temperature sensor', 'Internal BBS alarm functionality');
for($i=0; $i <= 4; $i++){
	$dt_subchapter_25_1 = explode('|', $arr_subchapter_25_1[$i]->content);
	echo '<tr><td>25.1.'.($i +1).'</td><td>'.$arr_dt_251[$i].'</td>';
	echo '<td align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_25_1[3]=='OK') echo '_checked'; echo '.jpg"></td>';
	echo '<td align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_25_1[3]=='Not OK') echo '_checked'; echo '.jpg"></td>';
	echo '<td align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_25_1[3]=='N/A') echo '_checked'; echo '.jpg"></td>';
	echo '<td>'.$this->ifunction->ifnull($dt_subchapter_25_1[4]).'</td></tr>';
}
?>
</table>

<?php $Qsubchapter = $this->db->query("SELECT `subno_chapter`, `content` FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `chapter`='25' AND `no_chapter`='25.2' ORDER BY `subno_chapter_order` ASC"); foreach($Qsubchapter->result_object() as $subchapter) $arr_subchapter_25_2[$subchapter->subno_chapter -1]=$subchapter ?>

<h3>Chapter 25.2: BBS Material and Installation check List</h3>
<table class="border" cellpadding="0" cellspacing="0">
<tr class="header">
    <td width="40">Test No</td>
    <td>Material Type</td>
    <td width="30">OK</td>
    <td width="40">Not OK</td>
    <td width="35">N/A</td>
    <td>Quantity</td>
    <td>Remark</td>
</tr>
<?php
$arr_dt_252 = array('Power Bar', 'Battery cable connection', 'Battery 12 V', 'Fan unit /Cooling Fan *', 'Switch use for Fan *', 'FUSE Battery');
for($i=0; $i <= 5; $i++){
	$dt_subchapter_25_2 = explode('|', $arr_subchapter_25_2[$i]->content);
	echo '<tr><td>25.2.'.($i +1).'</td><td>'.$arr_dt_252[$i].'</td>';
	echo '<td align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_25_2[3]=='OK') echo '_checked'; echo '.jpg"></td>';
	echo '<td align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_25_2[3]=='Not OK') echo '_checked'; echo '.jpg"></td>';
	echo '<td align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_25_2[3]=='N/A') echo '_checked'; echo '.jpg"></td>';
	echo '<td>'.$this->ifunction->ifnull($dt_subchapter_25_2[4]).'</td>';
	echo '<td>'.$this->ifunction->ifnull($dt_subchapter_25_2[5]).'</td></tr>';
}
?>
</table>

<?php $Qsubchapter = $this->db->query("SELECT `subno_chapter`, `content` FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `chapter`='25' AND `no_chapter`='25.3' ORDER BY `subno_chapter_order` ASC"); foreach($Qsubchapter->result_object() as $subchapter) $arr_subchapter_25_3[$subchapter->subno_chapter -1]=$subchapter ?>

<h3>Chapter 25.3: BBS Testing<br />Table 19. BBS test</h3>
<table class="border" cellpadding="0" cellspacing="0">
<tr>
    <td colspan="8" valign="top"><b>Back Up Time: <img src="<?php echo base_url() ?>static/i/radio.jpg"> 2 hours <span style="padding:0 10px">&nbsp;</span> <img src="<?php echo base_url() ?>static/i/radio.jpg"> 4 hours <span style="padding:0 10px">&nbsp;</span> <img src="<?php echo base_url() ?>static/i/radio.jpg"> 6 hours <span style="padding:0 10px">&nbsp;</span> <img src="<?php echo base_url() ?>static/i/radio.jpg"> 8 hours <span style="padding:0 10px">&nbsp;</span> <img src="<?php echo base_url() ?>static/i/radio.jpg"> ...hours</b><p>For 12 V Battery, minimum battery voltage must not reach below 10,9 Vdc after discharge period</p></td>
</tr>
<tr class="header">
    <td width="40" rowspan="2">Test No</td>
    <td width="50" rowspan="2">Battery</td>
    <td colspan="2">Voltage tested (VDC)</td>
    <td width="30" rowspan="2">OK</td>
    <td width="40" rowspan="2">Not OK</td>
    <td width="35" rowspan="2">N/A</td>
    <td rowspan="2">Remark</td>
</tr>
<tr class="header">
    <td>Before</td><td>After</td>
</tr>
<?php
for($i=0; $i <= 15; $i++){
	$dt_subchapter_25_3 = explode('|', $arr_subchapter_25_3[$i]->content);
	echo '<tr><td>25.3.'.($i +1).'</td><td>Battery '.($i +1).'</td>';
	echo '<td>'.$this->ifunction->ifnull($dt_subchapter_25_3[4]).'</td>';
	echo '<td>'.$this->ifunction->ifnull($dt_subchapter_25_3[5]).'</td>';
	echo '<td align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_25_3[3]=='OK') echo '_checked'; echo '.jpg"></td>';
	echo '<td align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_25_3[3]=='Not OK') echo '_checked'; echo '.jpg"></td>';
	echo '<td align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_25_3[3]=='N/A') echo '_checked'; echo '.jpg"></td>';
	echo '<td>'.$this->ifunction->ifnull($dt_subchapter_25_3[6]).'</td></tr>';
}
?>
</table>

<hr />

<?php $Qchapter = $this->db->query("SELECT `no_chapter`, `content` FROM `it_atp_chapter` WHERE `atp_id`='$dx' AND `chapter`='26' ORDER BY `atp_chapter_id` ASC"); foreach($Qchapter->result_object() as $chapter) $arr_chapter_26[str_replace('26.', '', $chapter->no_chapter) -1]=$chapter ?>

<table class="border" cellpadding="0" cellspacing="0">
<tr class="header"><td width="40">Chapter</td><td>Title work performed</td><td width="30">OK</td><td width="40">Not OK</td><td width="35">N/A</td><td width="90">Remark</td></tr>
<tr><td valign="top"><b>26</b><br /><br />26.1<br />26.2<br />26.3</td><td valign="top"><b>Checking Site Condition (Cleanliness Check)</b><br />Before leaving the site:<br />Site condition must be clean<br />No damage at site environment<br />All Infrastructures inside the RBS must have the same condition as previous</td>
<td valign="top" align="center">
<?php echo '<br /><br />';
for($i=0; $i <= 2; $i++){
    echo '<img src="'.base_url().'static/i/radio'; if($arr_chapter_26[$i]->content=='OK') echo '_checked'; echo '.jpg"><br />';
}
?>
</td><td valign="top" align="center">
<?php echo '<br /><br />';
for($i=0; $i <= 2; $i++){
    echo '<img src="'.base_url().'static/i/radio'; if($arr_chapter_26[$i]->content=='Not OK') echo '_checked'; echo '.jpg"><br />';
}
?>
</td><td valign="top" align="center">
<?php echo '<br /><br />';
for($i=0; $i <= 2; $i++){
    echo '<img src="'.base_url().'static/i/radio'; if($arr_chapter_26[$i]->content=='N/A') echo '_checked'; echo '.jpg"><br />';
}
?>
</td><td valign="top" align="center"><br /><br />Major<br />Major<br />Major</td></tr>
</table>

<hr />

<p align="center"><b>Table 2<br />Note - Comments - Fault</b></p>
<table class="border" cellpadding="0" cellspacing="0">
<tr class="header"><td width="20" align="center">No</td><td align="center">Problems</td><td align="center">Cleared</td></tr>
<?php for($i=1; $i <= 4; $i++) echo '<tr valign="top"><td align="center" height="50">'.$i.'</td><td>Chapter:<br />Description:</td><td>Name:<br />Date:</td></tr>' ?>
</table><br />

<div style="border:1px solid #000;padding:10px">
<img src="<?php echo base_url() ?>static/i/radio<?php if($atp_fl_approve == 6) echo '_checked' ?>.jpg" /> OK<br /><img src="<?php echo base_url() ?>static/i/radio.jpg" /> Not OK
<p style="font-size:11px">Note: This RBS can be integrated only if there is no major remark<br />This ATP can be accepted only if there is no major remark</p>
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