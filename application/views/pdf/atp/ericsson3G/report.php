<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed') ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xml:lang="en" xmlns="http://www.w3.org/1999/xhtml" lang="en">
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
<title>ATP - Ericsson 3G</title>
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

<h1>Acceptance Test Procedure<br />Node B<br /><br />3G RAN WCDMA<br />INDOSAT</h1><br />
<h2>RBS 3000/6000 FAMILY<br />ATP Manual version 4<br /><span>Revision Date : July, 31<sup>th</sup> 2009</span></h2>

<table class="footer" cellpadding="0" cellspacing="0" style="margin-top:100px">
<tr><td width="130">Project Name (PO Reference)</td><td align="center" width="10">:</td><td></td></tr>
<tr><td>Project Description</td><td align="center">:</td><td></td></tr>
<tr><td>Scope of Work</td><td align="center">:</td><td></td></tr>
<tr><td>Delivery Date</td><td align="center">:</td><td></td></tr>
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
    	<table>
        <tr>
		<?php
        $arr_identification_type = array(1=> 'RBS 3101', 'RBS 3206', 'RBS 3107', 'RBS 3303', 'RBS 3202', 'RBS 3116', 'RBS 3412', 'RBS 3418', 'RBS 3518', 'RBS 3216', 'RBS 3106', 'RBS 6101', 'RBS 6201', 'RBS 6102', 'RBS 6601', 'RBS 6301');
        $usr_identification_type = array_merge(explode('|', $ei[0]->identification_type));
        for($i=1; $i <= 16; $i++){
            echo '<td><img src="'.base_url().'static/i/checkbox'; if(in_array($arr_identification_type[$i], $usr_identification_type, true))  echo '_checked'; echo '.jpg"> '.$arr_identification_type[$i].'</td>';
            if(($i==5)||($i==10)||($i==15)) echo '</tr><tr>';
        }
        ?>
        </tr>
        </table>
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
            <td><img src="<?php echo base_url() ?>static/i/checkbox<?php if($configuration_type[0]=='GSM') echo '_checked' ?>.jpg"> GSM</td>
            <td><?php echo $this->ifunction->ifnull($installed_type[1]) ?></td>
            <td><?php echo $this->ifunction->ifnull($activated_type[1]) ?></td>
            <td><?php echo $this->ifunction->ifnull($serial_type[1]) ?></td>
		</tr>
        </table>
    </td>
</tr>
<tr valign="top">
	<td>Number of Cabinet</td><td align="center">:</td><td><?php echo $this->ifunction->ifnull($ei[0]->identification_no_cabinet) ?></td>
</tr>
<tr valign="top">
	<td>IP Address</td><td align="center">:</td><td><?php echo $this->ifunction->ifnull($ei[0]->identification_ip_address) ?></td>
</tr>
<tr valign="top">
	<td>Software Version</td><td align="center">:</td><td><?php echo $this->ifunction->ifnull($ei[0]->identification_soft_version) ?></td>
</tr>
<tr valign="top">
	<td>Sites Profile</td><td align="center">:</td>
    <td>
	<?php
    $arr_identification_site_profile=array(1=> 'New Site', 'Collocated (GSM/CDMA)', 'Cabinet Replacement');
	for($i=1; $i <= 3; $i++){
		echo '<img src="'.base_url().'static/i/checkbox'; if($ei[0]->identification_site_profile==$arr_identification_site_profile[$i])  echo '_checked'; echo '.jpg"> '.$arr_identification_site_profile[$i].' &nbsp; &nbsp; ';
	}
	?>
    </td>
</tr>
<tr valign="top">
	<td>RBS Topology</td><td align="center">:</td>
    <td>
	<?php
    $arr_identification_rbs_topology=array(1=> 'Hub RBS', 'End RBS');
	for($i=1; $i <= 2; $i++){
		echo '<img src="'.base_url().'static/i/radio'; if($ei[0]->identification_rbs_topology==$arr_identification_rbs_topology[$i])  echo '_checked'; echo '.jpg"> '.$arr_identification_rbs_topology[$i].' &nbsp; &nbsp; ';
	}
	?>
    </td>
</tr>
</table>

<h3>Documents reference</h3>
<table class="footer" cellpadding="0" cellspacing="0">
<tr><td>3206 Technical Product description 1/151-COH1092069 Uen-E</td><td width="10" style="border:none"></td><td>3101 Technical Product description 2/1551-COH 109 344 Uen E</td></tr>
<tr><td>3107 Technical Product description 1/1551-COH 109 2073 Uen C</td><td style="border:none"></td><td>3202 Technical Product description 2/1551-COH 109 344 Uen H</td></tr>
<tr><td>3303 Technical Product description 1/1551-COH 109 548 Uen G</td><td style="border:none"></td><td>3116 Technical Product description 1/1551-COH 109 2087 Uen A</td></tr>
<tr><td>3412 Technical Product description 1/1551-COH 109 2079 Uen B</td><td style="border:none"></td><td>3418 Technical Product description 1/1551-COH 109 2082 Uen E</td></tr>
<tr><td>3518 Technical Product description 1/1551-COH 109 2081 Uen G</td><td style="border:none"></td><td>3216 Technical Product description 1/1551-COH 109 2086 Uen B</td></tr>
<tr><td>3106 Technical Product description 1/1551-COH 109 2074 Uen Y</td><td style="border:none"></td><td></td></tr>
</table>

<h3>OUTSTANDING ITEMS</h3>
<img src="<?php echo base_url() ?>static/i/radio<?php if($ei[0]->outstanding=='Yes') echo '_checked' ?>.jpg"> Yes <span style="padding:30px">&nbsp;</span>
<img src="<?php echo base_url() ?>static/i/radio<?php if($ei[0]->outstanding=='No') echo '_checked' ?>.jpg"> No
<p><i>(Refer details of outstanding item list on the last page)</i></p>

<b>Signature of concerned people</b>
<table class="footer" cellpadding="0" cellspacing="0" style="margin:5px 0 0 0">
<tr valign="top">
	<td>INDOSAT<br />Name:<br />1.<br />2.</td>
    <td><br />Signature</td>
    <td>ERICSSON<br />Name:<br />1.<br />2.</td>
    <td><br />Signature</td>
</tr>
</table>

<table class="footer" cellpadding="0" cellspacing="0"><tr><td>Start date: <?php echo $this->ifunction->ifnull($time_spent[0]) ?></td><td>End date: <?php echo $this->ifunction->ifnull($time_spent[1]) ?></td><td>Time spent on site: <?php echo $this->ifunction->ifnull($time_spent[2]) ?> minutes</td></tr></table><br />

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
	
	if(in_array($in, array('6.1', '6.2', '6.3', '6.4'), true)){
		$arr_chapter_1[str_replace('6.', '', $in) +4]=$chapter;
	}
	else $arr_chapter_1[$in -1]=$chapter;
}
?>

<h3>A. Preliminary checks (document)</h3>
<table class="border" cellpadding="0" cellspacing="0">
<tr class="header">
	<td width="40">Chapter</td><td>Title work performed</td><td width="30">OK</td><td width="40">Not OK</td><td width="35">N/A</td><td width="90">Remark</td>
</tr>
<tr>
<td valign="top"><b>1</b><br />1.1<br /><br />1.2<br />1.3<br />1.4<br />1.5<br />1.6<br />1.6.1<br />1.6.2<br /><br />1.6.3<br />1.6.4</td>
<td valign="top"><b>Preliminary site checks</b><br />CME Site Acceptance has been approved (the document must be attached)<br />Site documentation must be available<br />Commissioning check list should be attached<br />NIB (Network implementation binder) / Installation Binder<br />Link Transmission Preparation already done<br />Before starting (on arrival at the site)<br />&bull; Check engineer's certificate of competency level<br />&bull; Check tools and equipment (completeness and calibrated with<br /> &nbsp; valid certificate). All equipment must be provided by vendor<br />&bull; For swap out cases, dummy load must be available<br />&bull; Document MOP and ATP must be available</td>
<td valign="top" align="center">
<?php echo '<br />';
for($i=0; $i <= 8; $i++){
    echo '<img src="'.base_url().'static/i/radio'; if($arr_chapter_1[$i]->content=='OK') echo '_checked'; echo '.jpg"><br />';
    if(($i==0)||($i==4)||($i==6)) echo '<br />';
}
?>
</td><td valign="top" align="center">
<?php echo '<br />';
for($i=0; $i <= 8; $i++){
    echo '<img src="'.base_url().'static/i/radio'; if($arr_chapter_1[$i]->content=='Not OK') echo '_checked'; echo '.jpg"><br />';
    if(($i==0)||($i==4)||($i==6)) echo '<br />';
}
?>
</td><td valign="top" align="center">
<?php echo '<br />';
for($i=0; $i <= 8; $i++){
    echo '<img src="'.base_url().'static/i/radio'; if($arr_chapter_1[$i]->content=='N/A') echo '_checked'; echo '.jpg"><br />';
    if(($i==0)||($i==4)||($i==6)) echo '<br />';
}
?>
</td><td valign="top" align="center">
<?php echo '<br />';
for($i=0; $i <= 8; $i++){
    if($i==1) echo 'Minor<br />'; else echo 'Major<br />';
    if(($i==0)||($i==4)||($i==6)) echo '<br />';
}
?>
</td></tr>
</table>

<?php $Qchapter = $this->db->query("SELECT `no_chapter`, `content` FROM `it_atp_chapter` WHERE `atp_id`='$dx' AND `chapter`='2' ORDER BY `atp_chapter_id` ASC"); foreach($Qchapter->result_object() as $chapter) $arr_chapter_2[str_replace('2.', '', $chapter->no_chapter) -1]=$chapter ?>

<table class="border" cellpadding="0" cellspacing="0">
<tr>
    <td valign="top" width="40"><b>2</b></td>
    <td valign="top"><b>Checking HW configuration visually</b><br />(Compare with equipment order list attachment which is  based on  Site Documentation, NDB/CDD or Planning recommendation)</td>
    <td valign="top" width="30" align="center"><br /><img src="<?php echo base_url() ?>static/i/radio<?php if($arr_chapter_2[0]->content=='OK') echo '_checked' ?>.jpg"></td>
    <td valign="top" width="40" align="center"><br /><img src="<?php echo base_url() ?>static/i/radio<?php if($arr_chapter_2[0]->content=='Not OK') echo '_checked' ?>.jpg"></td>
    <td valign="top" width="35" align="center"><br /><img src="<?php echo base_url() ?>static/i/radio<?php if($arr_chapter_2[0]->content=='N/A') echo '_checked' ?>.jpg"></td>
    <td valign="top" width="90" align="center"><br />Major</td>
</tr>
</table>

<?php $Qchapter = $this->db->query("SELECT `no_chapter`, `content` FROM `it_atp_chapter` WHERE `atp_id`='$dx' AND `chapter`='3' ORDER BY `atp_chapter_id` ASC"); foreach($Qchapter->result_object() as $chapter) $arr_chapter_3[str_replace('3.', '', $chapter->no_chapter) -1]=$chapter ?>

<table class="border" cellpadding="0" cellspacing="0">
<tr><td width="40" valign="top"><b>3</b><br />3.1<br />3.2<br />3.3<br />3.4<br />3.5<br />3.6<br />3.7</td>
<td valign="top"><b>Checking on labelling</b><br />Check label module (serial number, technical status)<br />Check RBS rack label<br />Check DDF Transmission label (end site)<br />Check power supply label<br />Check feeder cable label (for antenna sector)<br />Check Antenna label<br />Check DDF External Alarm Label</td>
<td width="30" valign="top" align="center">
<?php echo '<br />';
for($i=0; $i <= 6; $i++){
	echo '<img src="'.base_url().'static/i/radio'; if($arr_chapter_3[$i]->content=='OK') echo '_checked'; echo '.jpg"><br />';
}
?>
</td><td width="40" valign="top" align="center">
<?php echo '<br />';
for($i=0; $i <= 6; $i++){
	echo '<img src="'.base_url().'static/i/radio'; if($arr_chapter_3[$i]->content=='Not OK') echo '_checked'; echo '.jpg"><br />';
}
?>
</td><td width="35" valign="top" align="center">
<?php echo '<br />';
for($i=0; $i <= 6; $i++){
	echo '<img src="'.base_url().'static/i/radio'; if($arr_chapter_3[$i]->content=='N/A') echo '_checked'; echo '.jpg"><br />';
}
?>
</td><td width="90" valign="top" align="center">
<?php echo '<br />';
for($i=0; $i <= 6; $i++){
	if(($i==0)||($i==1)) echo 'Minor<br />'; else echo 'Major<br />';
}
?>
</td></tr>
</table>

<?php $Qchapter = $this->db->query("SELECT `no_chapter`, `content` FROM `it_atp_chapter` WHERE `atp_id`='$dx' AND `chapter`='4' ORDER BY `atp_chapter_id` ASC"); foreach($Qchapter->result_object() as $chapter) $arr_chapter_4[str_replace('4.', '', $chapter->no_chapter) -1]=$chapter ?>

<table class="border" cellpadding="0" cellspacing="0">
<tr>
    <td valign="top" width="40"><b>4</b></td><td valign="top"><b>Checking grounding integration (visual checking)</b><br />Grounding RBS (proper connection and integration)</td>
    <td valign="top" width="30" align="center"><br /><img src="<?php echo base_url() ?>static/i/radio<?php if($arr_chapter_4[0]->content=='OK') echo '_checked' ?>.jpg"></td>
    <td valign="top" width="40" align="center"><br /><img src="<?php echo base_url() ?>static/i/radio<?php if($arr_chapter_4[0]->content=='Not OK') echo '_checked' ?>.jpg"></td>
    <td valign="top" width="35" align="center"><br /><img src="<?php echo base_url() ?>static/i/radio<?php if($arr_chapter_4[0]->content=='N/A') echo '_checked' ?>.jpg"></td>
    <td valign="top" width="90" align="center"><br />Major</td>
</tr>
</table>

<?php $Qchapter = $this->db->query("SELECT `no_chapter`, `content` FROM `it_atp_chapter` WHERE `atp_id`='$dx' AND `chapter`='5' ORDER BY `atp_chapter_id` ASC"); foreach($Qchapter->result_object() as $chapter) $arr_chapter_5[str_replace('5.', '', $chapter->no_chapter) -1]=$chapter ?>

<table class="border" cellpadding="0" cellspacing="0">
<tr><td width="40" valign="top"><b>5</b><br />5.1<br />5.2<br />5.3<br />5.4<br />5.5</td>
<td valign="top"><b>Powers Measurement (see Table 1 as reference)</b><br />Measurement AC Power Line (L1/L2/L3)<br />Measurement RBS Input Power / Cabinet Voltage<br />Measurement AC Power Input PSU RBS<br />Measurement DC Power Output PSU RBS<br />Checking RBS Panel Circuit Breaker (AC / DC)</td>
<td width="30" valign="top" align="center">
<?php echo '<br />';
for($i=0; $i <= 4; $i++){
	echo '<img src="'.base_url().'static/i/radio'; if($arr_chapter_5[$i]->content=='OK') echo '_checked'; echo '.jpg"><br />';
}
?>
</td><td width="40" valign="top" align="center">
<?php echo '<br />';
for($i=0; $i <= 4; $i++){
	echo '<img src="'.base_url().'static/i/radio'; if($arr_chapter_5[$i]->content=='Not OK') echo '_checked'; echo '.jpg"><br />';
}
?>
</td><td width="35" valign="top" align="center">
<?php echo '<br />';
for($i=0; $i <= 4; $i++){
	echo '<img src="'.base_url().'static/i/radio'; if($arr_chapter_5[$i]->content=='N/A') echo '_checked'; echo '.jpg"><br />';
}
?>
</td><td width="90" valign="top" align="center"><?php echo '<br />'; for($i=0; $i <= 4; $i++) echo 'Major<br />' ?></td></tr>
</table>

<hr />

<h3>TABLE 1: Voltage RBS Specifications</h3>
<table class="border" cellpadding="0" cellspacing="0">
<tr class="header"><td>Point of Voltage Measurement</td><td>Nominal Voltages</td><td>Specification</td></tr>
<tr><td>AC POWER LINE</td><td align="center">220 Vac</td><td align="center">115 Vac - 250 Vac</td></tr>
<tr><td>AC V Input PSU RBS</td><td align="center">220 Vac</td><td align="center">120 Vac - 250 Vac</td></tr>
<tr><td>DC V input PSU RBS</td><td align="center">- 48 Vdc</td><td align="center">(-)40 - (-)57 Vdc</td></tr>
<tr><td>DC V Output PSU RBS</td><td align="center">- 48Vdc</td><td align="center">(-)40 Vdc - (-)60 Vdc</td></tr>
</table>
<p style="font-size:11px">
<i>Note: All Voltage measurement must refer to Table 1 (Voltage RBS Specification)</i><br />
(<sup>2</sup>) refer to Ericsson doc 1/1551-COH 109 2069 Uen C:<br />
(<sup>3</sup>) refer to Ericsson doc 1/1551-COH 109 2073 Uen C
</p>

<?php $Qsubchapter = $this->db->query("SELECT `subno_chapter`, `content` FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `chapter`='5' AND `no_chapter`='5.1' ORDER BY `subno_chapter_order` ASC"); foreach($Qsubchapter->result_object() as $subchapter) $arr_subchapter_5_1[$subchapter->subno_chapter -1]=$subchapter;
$dt_subchapter_5_1 = explode('|', $arr_subchapter_5_1[0]->content) ?>

<h3>Chapter: 5.1: Measurement AC Power Line (L1/L2/L3)</h3>
<table class="border" cellpadding="0" cellspacing="0">
<tr class="header"><td>Test Item</td><td>Phase L1 to Neutral</td><td>Phase L2 to Neutral</td><td>Phase L3 to Neutral</td><td>Neutral to Ground < 3 VAC)</td><td>Remark</td></tr>
<tr><td align="center">AC POWER LINE</td><td><?php echo $this->ifunction->ifnull($dt_subchapter_5_1[3]) ?></td><td><?php echo $this->ifunction->ifnull($dt_subchapter_5_1[4]) ?></td><td><?php echo $this->ifunction->ifnull($dt_subchapter_5_1[5]) ?></td><td><?php echo $this->ifunction->ifnull($dt_subchapter_5_1[6]) ?></td><td><?php echo $this->ifunction->ifnull($dt_subchapter_5_1[7]) ?></td></tr>
</table>

<?php $Qsubchapter = $this->db->query("SELECT `subno_chapter`, `content` FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `chapter`='5' AND `no_chapter`='5.2' ORDER BY `subno_chapter_order` ASC"); foreach($Qsubchapter->result_object() as $subchapter) $arr_subchapter_5_2[$subchapter->subno_chapter -1]=$subchapter;
$dt_subchapter_5_2 = explode('|', $arr_subchapter_5_2[0]->content) ?>

<h3>Chapter: 5.2: Measurement RBS Input Power/ Cabinet Voltage</h3>
<table class="border" cellpadding="0" cellspacing="0">
<tr class="header"><td>DC V Input RBS  (Input DC power RBS from Rectifier/ BBS  to RBS test Point)</td><td width="90">Vdc (Volt)</td><td>Chassis to Ground<br />( &lt; 1 VDC)</td><td width="30">OK</td><td width="40">Not OK</td><td width="35">N/A</td><td>Remark</td></tr>
<tr><td>Cabinet 1</td><td><?php echo $this->ifunction->ifnull($dt_subchapter_5_2[3]) ?></td><td><?php echo $this->ifunction->ifnull($dt_subchapter_5_2[4]) ?></td><td align="center"><img src="<?php echo base_url() ?>static/i/radio<?php if($dt_subchapter_5_2[5]=='OK') echo '_checked' ?>.jpg"></td><td align="center"><img src="<?php echo base_url() ?>static/i/radio<?php if($dt_subchapter_5_2[5]=='Not OK') echo '_checked' ?>.jpg"></td><td align="center"><img src="<?php echo base_url() ?>static/i/radio<?php if($dt_subchapter_5_2[5]=='N/A') echo '_checked' ?>.jpg"></td><td><?php echo $this->ifunction->ifnull($dt_subchapter_5_2[6]) ?></td></tr>
</table>

<?php $Qsubchapter = $this->db->query("SELECT `subno_chapter`, `content` FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `chapter`='5' AND `no_chapter`='5.3' ORDER BY `subno_chapter_order` ASC"); foreach($Qsubchapter->result_object() as $subchapter) $arr_subchapter_5_3[$subchapter->subno_chapter -1]=$subchapter ?>

<h3>Chapter: 5.3: Measurement AC Power Input PSU RBS</h3>
<table class="border" cellpadding="0" cellspacing="0">
<tr class="header"><td>AC V input PSU RBS / (Cabinet 1)</td><td width="90">Vdc (Volt)</td><td width="30">OK</td><td width="40">Not OK</td><td width="35">N/A</td><td>Remark</td></tr>
<?php
for($i=0; $i <= 3; $i++){
	$dt_subchapter_5_3 = explode('|', $arr_subchapter_5_3[$i]->content);
	echo '<tr><td>Input Voltage PSU '.($i +1);
	echo '</td><td>'.$this->ifunction->ifnull($dt_subchapter_5_3[3]).'</td>';
	echo '<td align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_5_3[4]=='OK') echo '_checked'; echo '.jpg"></td>';
	echo '<td align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_5_3[4]=='Not OK') echo '_checked'; echo '.jpg"></td>';
	echo '<td align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_5_3[4]=='N/A') echo '_checked'; echo '.jpg"></td>';
	echo '<td>'.$this->ifunction->ifnull($dt_subchapter_5_3[5]).'</td></tr>';
}
?>
</table>

<?php $Qsubchapter = $this->db->query("SELECT `subno_chapter`, `content` FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `chapter`='5' AND `no_chapter`='5.4' ORDER BY `subno_chapter_order` ASC"); foreach($Qsubchapter->result_object() as $subchapter) $arr_subchapter_5_4[$subchapter->subno_chapter -1]=$subchapter ?>

<h3>Chapter: 5.4: Measurement DC Power Output PSU RBS</h3>
<table class="border" cellpadding="0" cellspacing="0">
<tr class="header"><td>DC Power Output PSU RBS</td><td width="90">Vdc (Volt)</td><td width="30">OK</td><td width="40">Not OK</td><td width="35">N/A</td><td>Remark</td></tr>
<?php
for($i=0; $i <= 3; $i++){
	$dt_subchapter_5_4 = explode('|', $arr_subchapter_5_4[$i]->content);
	echo '<tr><td>Output Voltage PSU '.($i +1);
	echo '</td><td>'.$this->ifunction->ifnull($dt_subchapter_5_4[3]).'</td>';
	echo '<td align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_5_4[4]=='OK') echo '_checked'; echo '.jpg"></td>';
	echo '<td align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_5_4[4]=='Not OK') echo '_checked'; echo '.jpg"></td>';
	echo '<td align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_5_4[4]=='N/A') echo '_checked'; echo '.jpg"></td>';
	echo '<td>'.$this->ifunction->ifnull($dt_subchapter_5_4[5]).'</td></tr>';
}
?>
</table>

<?php $Qsubchapter = $this->db->query("SELECT `subno_chapter`, `content` FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `chapter`='5' AND `no_chapter`='5.5' ORDER BY `subno_chapter_order` ASC"); foreach($Qsubchapter->result_object() as $subchapter) $arr_subchapter_5_5[$subchapter->subno_chapter -1]=$subchapter ?>

<h3>Chapter: 5.5: Checking RBS Panel Circuit Breaker (AC & DC)</h3>
<table class="border" cellpadding="0" cellspacing="0">
<tr class="header"><td>Circuit Breaker Function Test</td><td width="30">OK</td><td width="40">Not OK</td><td width="35">N/A</td><td>Remark</td></tr>
<?php
$arr_dt_55 = array('AC', 'DC', 'Main', 'Battery');
for($i=0; $i <= 3; $i++){
	$dt_subchapter_5_5 = explode('|', $arr_subchapter_5_5[$i]->content);
	echo '<tr><td>'.$arr_dt_55[$i].' Circuit Breaker';
	echo '</td><td align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_5_5[3]=='OK') echo '_checked'; echo '.jpg"></td>';
	echo '<td align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_5_5[3]=='Not OK') echo '_checked'; echo '.jpg"></td>';
	echo '<td align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_5_5[3]=='N/A') echo '_checked'; echo '.jpg"></td>';
	echo '<td>'.$this->ifunction->ifnull($dt_subchapter_5_5[4]).'</td></tr>';
}
?>
</table>

<hr />

<?php $Qchapter = $this->db->query("SELECT `no_chapter`, `content` FROM `it_atp_chapter` WHERE `atp_id`='$dx' AND `chapter`='6' ORDER BY `atp_chapter_id` ASC"); foreach($Qchapter->result_object() as $chapter) $arr_chapter_6[str_replace('6.', '', $chapter->no_chapter) -1]=$chapter ?>

<h3>B. Preparing RBS for Acceptance / Stand alone test</h3>
<table class="border" cellpadding="0" cellspacing="0">
<tr class="header"><td width="40">Chapter</td><td>Title work performed</td><td width="30">OK</td><td width="40">Not OK</td><td width="35">N/A</td><td width="90">Remark</td></tr>
<tr><td valign="top"><b>6</b><br />6.1<br />6.2<br />6.3<br />6.4<br />6.5<br />6.6<br />6.7<br />6.8<br />6.9</td>
<td valign="top"><b>RBS, RNC and RANAG Setting Parameter</b><br />RBS, RNC and RANAG Information Database<br />RBS Cell Parameter<br />VCI Allocation on VPC Terminating in End RBS<br />IP Transport Configuration<br />Mub-c configuration<br />Channel Element Capacity<br />RBS License Feature<br />Qos Configuration Settings<br />Verify RBS IMA Adaptation Parameter</td>
<td valign="top" align="center">
<?php echo '<br />';
for($i=0; $i <= 8; $i++){
	echo '<img src="'.base_url().'static/i/radio'; if($arr_chapter_6[$i]->content=='OK') echo '_checked'; echo '.jpg"><br />';
}
?>
</td><td valign="top" align="center">
<?php echo '<br />';
for($i=0; $i <= 8; $i++){
	echo '<img src="'.base_url().'static/i/radio'; if($arr_chapter_6[$i]->content=='Not OK') echo '_checked'; echo '.jpg"><br />';
}
?>
</td><td valign="top" align="center">
<?php echo '<br />';
for($i=0; $i <= 8; $i++){
	echo '<img src="'.base_url().'static/i/radio'; if($arr_chapter_6[$i]->content=='N/A') echo '_checked'; echo '.jpg"><br />';
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
	echo '<tr><td>'.$arr_dt_61[$i].'</td><td>'.$this->ifunction->ifnull($dt_subchapter_6_1[3]).'</td><td>'.$this->ifunction->ifnull($dt_subchapter_6_1[4]).'</td><td>'.$this->ifunction->ifnull($dt_subchapter_6_1[5]).'</td><td>'.$this->ifunction->ifnull($dt_subchapter_6_1[6]).'</td></tr>';
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
	echo '<tr><td>'.$arr_dt_62[$i].'</td><td>'.$this->ifunction->ifnull($dt_subchapter_6_2[3]).'</td><td>'.$this->ifunction->ifnull($dt_subchapter_6_2[4]).'</td><td>'.$this->ifunction->ifnull($dt_subchapter_6_2[5]).'</td><td>'.$this->ifunction->ifnull($dt_subchapter_6_2[6]).'</td><td>'.$this->ifunction->ifnull($dt_subchapter_6_2[7]).'</td><td>'.$this->ifunction->ifnull($dt_subchapter_6_2[8]).'</td><td>'.$this->ifunction->ifnull($dt_subchapter_6_2[9]).'</td></tr>';
}
?>
</table>

<hr />

<?php $Qsubchapter = $this->db->query("SELECT `subno_chapter`, `content` FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `chapter`='6' AND `no_chapter`='6.3' ORDER BY `subno_chapter_order` ASC"); foreach($Qsubchapter->result_object() as $subchapter) $arr_subchapter_6_3[$subchapter->subno_chapter -1]=$subchapter ?>

<h3>Chapter 6.3: VCI Allocation on VPC Terminating in End RBS (dilihat dari laptop)</h3>
<table class="border" cellpadding="0" cellspacing="0">
<tr class="header"><td rowspan="2">ET Board Port (E1/ STM-1)</td><td rowspan="2">VPC Terminating Nodes</td><td colspan="6">VCI Allocation</td></tr>
<tr class="header"><td>Mub-a/b</td><td>Node Synch</td><td>NBAP-C</td><td>NBAP-D</td><td>Q.2630</td><td>AAL2Path</td></tr>
<?php
$arr_dt_63 = array('Active', 'Standby');
for($i=0; $i <= 1; $i++){
	$dt_subchapter_6_3 = explode('|', $arr_subchapter_6_3[$i]->content);
	echo '<tr><td>'.$arr_dt_63[$i].'</td><td>'.$this->ifunction->ifnull($dt_subchapter_6_3[3]).'</td><td>'.$this->ifunction->ifnull($dt_subchapter_6_3[4]).'</td><td>'.$this->ifunction->ifnull($dt_subchapter_6_3[5]).'</td><td>'.$this->ifunction->ifnull($dt_subchapter_6_3[6]).'</td><td>'.$this->ifunction->ifnull($dt_subchapter_6_3[7]).'</td><td>'.$this->ifunction->ifnull($dt_subchapter_6_3[8]).'</td><td>'.$this->ifunction->ifnull($dt_subchapter_6_3[9]).'</td></tr>';
}
?>
</table>

<?php $Qsubchapter = $this->db->query("SELECT `subno_chapter`, `content` FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `chapter`='6' AND `no_chapter`='6.4' ORDER BY `subno_chapter_order` ASC"); foreach($Qsubchapter->result_object() as $subchapter) $arr_subchapter_6_4[$subchapter->subno_chapter -1]=$subchapter ?>

<h3>Chapter 6.4: IP Transport Configuration</h3>
<table class="border" cellpadding="0" cellspacing="0">
<tr class="header"><td>Items</td><td>IP Address</td><td width="30">OK</td><td width="40">Not OK</td><td width="35">N/A</td><td>Remark</td></tr>
<?php
$arr_dt_64 = array('User Plane', 'Control Plane', 'IP Sync Ref 1', 'IP Sync Ref 2', 'Default Router');
for($i=0; $i <= 4; $i++){
	$dt_subchapter_6_4 = explode('|', $arr_subchapter_6_4[$i]->content);
	echo '<tr><td>'.$arr_dt_64[$i].'</td><td>'.$this->ifunction->ifnull($dt_subchapter_6_4[3]).'</td>';
	echo '<td align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_6_4[4]=='OK') echo '_checked'; echo '.jpg"></td>';
	echo '<td align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_6_4[4]=='Not OK') echo '_checked'; echo '.jpg"></td>';
	echo '<td align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_6_4[4]=='N/A') echo '_checked'; echo '.jpg"></td>';
	echo '<td>'.$this->ifunction->ifnull($dt_subchapter_6_4[5]).'</td></tr>';
}
?>
</table>

<?php $Qsubchapter = $this->db->query("SELECT `subno_chapter`, `content` FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `chapter`='6' AND `no_chapter`='6.5' ORDER BY `subno_chapter_order` ASC"); foreach($Qsubchapter->result_object() as $subchapter) $arr_subchapter_6_5[$subchapter->subno_chapter -1]=$subchapter ?>

<h3>Chapter 6.5: Mub configuration</h3>
<table class="border" cellpadding="0" cellspacing="0">
<tr class="header"><td>Items</td><td>IP Address</td><td>Route Metric</td><td width="30">OK</td><td width="40">Not OK</td><td width="35">N/A</td><td>Remark</td></tr>
<?php
$arr_dt_65 = array('nextHopIpAddr (Mub-a)', 'nextHopIpAddr (Mub-b)', 'nextHopIpAddr (Mub-c)');
for($i=0; $i <= 2; $i++){
	$dt_subchapter_6_5 = explode('|', $arr_subchapter_6_5[$i]->content);
	echo '<tr><td>'.$arr_dt_65[$i].'</td><td>'.$this->ifunction->ifnull($dt_subchapter_6_5[3]).'</td><td>'.$this->ifunction->ifnull($dt_subchapter_6_5[4]).'</td>';
	echo '<td align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_6_5[5]=='OK') echo '_checked'; echo '.jpg"></td>';
	echo '<td align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_6_5[5]=='Not OK') echo '_checked'; echo '.jpg"></td>';
	echo '<td align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_6_5[5]=='N/A') echo '_checked'; echo '.jpg"></td>';
	echo '<td>'.$this->ifunction->ifnull($dt_subchapter_6_5[6]).'</td></tr>';
}
?>
</table>

<?php $Qsubchapter = $this->db->query("SELECT `subno_chapter`, `content` FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `chapter`='6' AND `no_chapter`='6.6' ORDER BY `subno_chapter_order` ASC"); foreach($Qsubchapter->result_object() as $subchapter) $arr_subchapter_6_6[$subchapter->subno_chapter -1]=$subchapter ?>

<h3>Chapter 6.6: Channel Element Capacity</h3>
<table class="border" cellpadding="0" cellspacing="0">
<tr class="header"><td></td><td>HW CE</td><td>License (SW) CE</td><td>Grace Period On Service</td><td>Grace Period ATP</td></tr>
<?php
$arr_dt_66 = array('Downlink', 'Uplink');
for($i=0; $i <= 1; $i++){
	$dt_subchapter_6_6 = explode('|', $arr_subchapter_6_6[$i]->content);
	echo '<tr><td>'.$arr_dt_66[$i].'</td><td>'.$this->ifunction->ifnull($dt_subchapter_6_6[3]).'</td><td>'.$this->ifunction->ifnull($dt_subchapter_6_6[4]).'</td><td>'.$this->ifunction->ifnull($dt_subchapter_6_6[5]).'</td><td>'.$this->ifunction->ifnull($dt_subchapter_6_6[6]).'</td></tr>';
}
?>
</table>

<?php $Qsubchapter = $this->db->query("SELECT `subno_chapter`, `content` FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `chapter`='6' AND `no_chapter`='6.7' ORDER BY `subno_chapter_order` ASC"); foreach($Qsubchapter->result_object() as $subchapter) $arr_subchapter_6_7[$subchapter->subno_chapter -1]=$subchapter ?>

<h3>Chapter 6.7: RBS License Feature</h3>
<table class="border" cellpadding="0" cellspacing="0">
<tr class="header"><td>RBS Feature</td><td width="30">OK</td><td width="40">Not OK</td><td width="35">N/A</td><td>Remark</td></tr>
<?php
$arr_dt_67 = array('HSDPA CODES PER CELL', 'DYNHSPDSCHCODEALLOCATION', 'FLEXIBLESCHEDULER', 'ENHANCEDUPLINK', 'FEATURE DUAL STACK IUB', 'CAPACITY POWER AMPLIFIER', 'CAPACITY NUMBER of CARRIER');
for($i=0; $i <= 6; $i++){
	$dt_subchapter_6_7 = explode('|', $arr_subchapter_6_7[$i]->content);
	echo '<tr><td>'.$arr_dt_67[$i].'</td>';
	echo '<td align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_6_7[3]=='OK') echo '_checked'; echo '.jpg"></td>';
	echo '<td align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_6_7[3]=='Not OK') echo '_checked'; echo '.jpg"></td>';
	echo '<td align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_6_7[3]=='N/A') echo '_checked'; echo '.jpg"></td>';
	echo '<td>'.$this->ifunction->ifnull($dt_subchapter_6_7[4]).'</td></tr>';
}
?>
</table>
<p style="font-size:11px">Note:<br /><span style="font-size:11px"><i>HSDPA CODES PER CELL minimum 5 for 4e1 and 15 for 8e1<br />DYNHSPDSCHCODEALLOCATION, FLEXIBLESCHEDULER,  ENHANCEDUPLINK should be true</i></span></p>

<hr />

<?php $Qsubchapter = $this->db->query("SELECT `subno_chapter`, `content` FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `chapter`='6' AND `no_chapter`='6.8' ORDER BY `subno_chapter_order` ASC"); foreach($Qsubchapter->result_object() as $subchapter) $arr_subchapter_6_8[$subchapter->subno_chapter -1]=$subchapter ?>

<h3>Chapter 6.8: Qos Configuration Settings</h3>
<table class="border" cellpadding="0" cellspacing="0">
<tr class="header"><td colspan="6">QoS Transport Network Configuration</td><td colspan="3">Conf. Settings</td></tr>
<tr class="header"><td width="100">Category</td><td width="40">Traffic Type</td><td>WCDMA Traffic Type</td><td width="40">Traffic Class</td><td  width="35">DSCP</td><td width="35">Pbit</td><td width="30">OK</td><td width="40">Not OK</td><td width="35">N/A</td></tr>
<?php
$arr_dt_68 = array(
	'<td>Synchronisation</td><td align="center">CP</td><td>NTP Synch traffic</td><td align="center">LU</td><td align="center">49</td><td align="center">6</td>',
	'<td>Network Control</td><td align="center">CP</td><td>Routing Protocols</td><td align="center">CS6</td><td align="center">48</td><td align="center">6</td>',
	'<td>Radio Network Control</td><td align="center">CP</td><td>FACH1, 2, RACH, PCH, MBMS*, FACH, SRB</td><td align="center">CS5</td><td align="center">47</td><td align="center">6</td>',
	'<td>Synch in P6</td><td align="center">UP</td><td></td><td align="center"></td><td align="center">46</td><td align="center">6</td>',
	'<td>Conversational</td><td align="center"></td><td>Conversationa Speech Data</td><td align="center">EF</td><td align="center">42</td><td align="center">5</td>',
	'<td>Signaling</td><td align="center">UP</td><td>Interactive,THPin1,SinT(Sip signaling)</td><td align="center"></td><td align="center">40</td><td align="center">5</td>',
	'<td>CS Streaming</td><td align="center">CP</td><td>Streaming (MBR==GBR)</td><td align="center">AF42</td><td align="center">36</td><td align="center">5</td>',
	'<td rowspan="3">PS Streaming</td><td rowspan="3" align="center">UP</td><td>MBMS*</td><td align="center">AF33</td><td align="center">30</td><td align="center">4</td>',
	'<td>HS Streaming</td><td></td><td align="center">28</td><td align="center">4</td>',
	'<td>R99 Streaming</td><td align="center">AF31</td><td align="center">26</td><td align="center">4</td>',
	'<td>Signaling</td><td align="center">CP</td><td>Inter-Node Signaling (NBAP,RNSAP,RANAP)</td><td align="center">CS3</td><td align="center">24</td><td align="center">4</td>',
	'<td>HS Interactive High Priority</td><td align="center">UP</td><td>Inter(DCH), Inter(THP=1,SI=F)</td><td align="center">AF21</td><td align="center">22</td><td align="center">3</td>',
	'<td>R99 Inter High Priority</td><td align="center">UP</td><td>Inter(DCH), Inter(THP=1,SI=F)</td><td align="center"></td><td align="center">20</td><td align="center">3</td>',
	'<td>O&M Interactive</td><td align="center">MP</td><td>O&M Access to Nodes</td><td align="center">CS2</td><td align="center">18</td><td align="center">3</td>',
	'<td>HS Interactive Med Prio</td><td align="center">UP</td><td>Interactive (THP=2)</td><td align="center">AF23</td><td align="center">16</td><td align="center">2</td>',
	'<td>R99 Inter High Priority</td><td align="center">UP</td><td>Interactive (THP=2)</td><td align="center"></td><td align="center">14</td><td align="center">2</td>',
	'<td>HS Interactive Low Prio</td><td align="center">UP</td><td>Interactive (THP=3)</td><td align="center">AF11</td><td align="center">10</td><td align="center">1</td>',
	'<td>R99 Interactive Low Prio</td><td align="center">UP</td><td>Interactive (THP=3)</td><td align="center"></td><td align="center">8</td><td align="center">1</td>',
	'<td>HS Background</td><td align="center">UP</td><td>Background HSD</td><td align="center"></td><td align="center">6</td><td align="center">0</td>',
	'<td>R99 Background</td><td align="center">UP</td><td>Background R99</td><td align="center">AF12</td><td align="center">4</td><td align="center">0</td>');
for($i=0; $i <= 19; $i++){
	$dt_subchapter_6_8 = explode('|', $arr_subchapter_6_8[$i]->content);
	echo '<tr>'.$arr_dt_68[$i];
	echo '<td align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_6_8[3]=='OK') echo '_checked'; echo '.jpg"></td>';
	echo '<td align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_6_8[3]=='Not OK') echo '_checked'; echo '.jpg"></td>';
	echo '<td align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_6_8[3]=='N/A') echo '_checked'; echo '.jpg"></td>';
	echo '</tr>';
}
?>
</table>

<?php $Qsubchapter = $this->db->query("SELECT `subno_chapter`, `content` FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `chapter`='6' AND `no_chapter`='6.9' ORDER BY `subno_chapter_order` ASC"); foreach($Qsubchapter->result_object() as $subchapter) $arr_subchapter_6_9[$subchapter->subno_chapter -1]=$subchapter;
$dt_subchapter_6_9a = explode('|', $arr_subchapter_6_9[2]->content);
$dt_subchapter_6_9b = explode('|', $arr_subchapter_6_9[3]->content);
$dt_subchapter_6_9c = explode('|', $arr_subchapter_6_9[4]->content);
$dt_subchapter_6_9d = explode('|', $arr_subchapter_6_9[5]->content);
$dt_subchapter_6_9e = explode('|', $arr_subchapter_6_9[6]->content) ?>

<h3>Chapter 6.9: Verify RBS IMA Adaptation Parameter</h3>
<table class="border" cellpadding="0" cellspacing="0" style="margin-bottom:10px">
<tr class="header"><td>Status</td><td width="45">E1-1</td><td width="45">E1-2</td><td width="45">E1-3</td><td width="45">E1-4</td><td width="45">E1-5</td><td width="45">E1-6</td><td width="45">E1-7</td><td width="45">E1-8</td></tr>
<?php
$arr_dt_69 = array('E1 Status (Enable/Disable/NA)', 'IMA link Status (Enable/Disable/NA)');
for($i=0; $i <= 1; $i++){
	$dt_subchapter_6_9 = explode('|', $arr_subchapter_6_9[$i]->content);
	echo '<tr><td>'.$arr_dt_69[$i].'</td>';
	echo '<td align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_6_9[3]=='E1-1') echo '_checked'; echo '.jpg"></td>';
	echo '<td align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_6_9[3]=='E1-2') echo '_checked'; echo '.jpg"></td>';
	echo '<td align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_6_9[3]=='E1-3') echo '_checked'; echo '.jpg"></td>';
	echo '<td align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_6_9[3]=='E1-4') echo '_checked'; echo '.jpg"></td>';
	echo '<td align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_6_9[3]=='E1-5') echo '_checked'; echo '.jpg"></td>';
	echo '<td align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_6_9[3]=='E1-6') echo '_checked'; echo '.jpg"></td>';
	echo '<td align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_6_9[3]=='E1-7') echo '_checked'; echo '.jpg"></td>';
	echo '<td align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_6_9[3]=='E1-8') echo '_checked'; echo '.jpg"></td>';
	echo '</tr>';
}
?>
</table>

<table class="border" cellpadding="0" cellspacing="0">
<tr class="header"><td></td><td>RBS Paramete</td><td width="30">OK</td><td width="40">Not OK</td><td width="35">N/A</td><td>Remark</td></tr>
<tr><td valign="top" width="10">1<br />2<br />3<br /><br /><br />4</td>
<td valign="top">Available E1<br />activeLinks<br />atmTrafficDescriptor<br />8 E1 (vp1=U3P35200M8800,Pcr=35200,Mcr=8800)<br />4 E1 (vp1=U3P17600M8800,Pcr=17600,Mcr=8800)<br />requiredNumberOfLink</td>
<td valign="top" align="center"><img src="<?php echo base_url() ?>static/i/radio<?php if($dt_subchapter_6_9a[3]=='OK') echo '_checked' ?>.jpg"><br /><img src="<?php echo base_url() ?>static/i/radio<?php if($dt_subchapter_6_9b[3]=='OK') echo '_checked' ?>.jpg"><br /><br /><img src="<?php echo base_url() ?>static/i/radio<?php if($dt_subchapter_6_9c[3]=='OK') echo '_checked' ?>.jpg"><br /><img src="<?php echo base_url() ?>static/i/radio<?php if($dt_subchapter_6_9d[3]=='OK') echo '_checked' ?>.jpg"><br /><img src="<?php echo base_url() ?>static/i/radio<?php if($dt_subchapter_6_9e[3]=='OK') echo '_checked' ?>.jpg"></td>
<td valign="top" align="center"><img src="<?php echo base_url() ?>static/i/radio<?php if($dt_subchapter_6_9a[3]=='Not OK') echo '_checked' ?>.jpg"><br /><img src="<?php echo base_url() ?>static/i/radio<?php if($dt_subchapter_6_9b[3]=='Not OK') echo '_checked' ?>.jpg"><br /><br /><img src="<?php echo base_url() ?>static/i/radio<?php if($dt_subchapter_6_9c[3]=='Not OK') echo '_checked' ?>.jpg"><br /><img src="<?php echo base_url() ?>static/i/radio<?php if($dt_subchapter_6_9d[3]=='Not OK') echo '_checked' ?>.jpg"><br /><img src="<?php echo base_url() ?>static/i/radio<?php if($dt_subchapter_6_9e[3]=='Not OK') echo '_checked' ?>.jpg"></td>
<td valign="top" align="center"><img src="<?php echo base_url() ?>static/i/radio<?php if($dt_subchapter_6_9a[3]=='N/A') echo '_checked' ?>.jpg"><br /><img src="<?php echo base_url() ?>static/i/radio<?php if($dt_subchapter_6_9b[3]=='N/A') echo '_checked' ?>.jpg"><br /><br /><img src="<?php echo base_url() ?>static/i/radio<?php if($dt_subchapter_6_9c[3]=='N/A') echo '_checked' ?>.jpg"><br /><img src="<?php echo base_url() ?>static/i/radio<?php if($dt_subchapter_6_9d[3]=='N/A') echo '_checked' ?>.jpg"><br /><img src="<?php echo base_url() ?>static/i/radio<?php if($dt_subchapter_6_9e[3]=='N/A') echo '_checked' ?>.jpg"></td>
<td valign="top"><?php echo $this->ifunction->ifnull($dt_subchapter_6_9a[4]) ?><br /><?php echo $this->ifunction->ifnull($dt_subchapter_6_9b[4]) ?><br /><br /><?php echo $this->ifunction->ifnull($dt_subchapter_6_9c[4]) ?><br /><?php echo $this->ifunction->ifnull($dt_subchapter_6_9d[4]) ?><br /><?php echo $this->ifunction->ifnull($dt_subchapter_6_9e[4]) ?></td>
</tr>
</table>
<p style="font-size:11px"><i>Available E1 should be 8 E1 / 4 E1 enable.requiredNumberOfLink parameter value minimum 2</i></p>

<hr />

<?php $Qchapter = $this->db->query("SELECT `no_chapter`, `content` FROM `it_atp_chapter` WHERE `atp_id`='$dx' AND `chapter`='7' ORDER BY `atp_chapter_id` ASC"); foreach($Qchapter->result_object() as $chapter) $arr_chapter_7[str_replace('7.', '', $chapter->no_chapter) -1]=$chapter ?>

<table class="border" cellpadding="0" cellspacing="0">
<tr class="header"><td width="40">Chapter</td><td>Title work performed</td><td width="30">OK</td><td width="40">Not OK</td><td width="35">N/A</td><td width="90">Remark</td></tr>
<tr><td valign="top"><b>7</b><br />7.1<br />7.2<br />7.3<br />7.4<br />7.5<br />7.6<br />7.7</td>
<td valign="top"><b>RBS Local Cell (On line Test)</b><br />Check RBS Local Cell-1<br />Check RBS Local Cell-2<br />Check RBS Local Cell-3<br />Check RBS Local Cell-4<br />Check RBS Local Cell-5<br />Check RBS Local Cell-6<br />Check Carrier for HSDPA and HSUPA<br />(HsDschRecources and EDchRecources)</td>
<td valign="top" align="center">
<?php echo '<br />';
for($i=0; $i <= 6; $i++){
    echo '<img src="'.base_url().'static/i/radio'; if($arr_chapter_7[$i]->content=='OK') echo '_checked'; echo '.jpg"><br />';
}
?>
</td><td valign="top" align="center">
<?php echo '<br />';
for($i=0; $i <= 6; $i++){
    echo '<img src="'.base_url().'static/i/radio'; if($arr_chapter_7[$i]->content=='Not OK') echo '_checked'; echo '.jpg"><br />';
}
?>
</td><td valign="top" align="center">
<?php echo '<br />';
for($i=0; $i <= 6; $i++){
    echo '<img src="'.base_url().'static/i/radio'; if($arr_chapter_7[$i]->content=='N/A') echo '_checked'; echo '.jpg"><br />';
}
?>
</td><td valign="top" align="center"><?php echo '<br />'; for($i=0; $i <= 6; $i++) echo 'Major<br />' ?></td></tr>
</table><br />

<?php $Qchapter = $this->db->query("SELECT `no_chapter`, `content` FROM `it_atp_chapter` WHERE `atp_id`='$dx' AND `chapter`='8' ORDER BY `atp_chapter_id` ASC"); foreach($Qchapter->result_object() as $chapter) $arr_chapter_8[str_replace('8.', '', $chapter->no_chapter) -1]=$chapter ?>

<table class="border" cellpadding="0" cellspacing="0">
<tr class="header"><td width="40">Chapter</td><td>Title work performed</td><td width="30">OK</td><td width="40">Not OK</td><td width="35">N/A</td><td width="90">Remark</td></tr>
<tr><td valign="top"><b>8</b><br />8.1<br />8.2<br />8.3</td>
<td valign="top"><b>Verify IP over ATM</b><br />IP over ATM<br />Verify RBS Restart (Software Version)<br />Verify LED STATUS</td>
<td valign="top" align="center">
<?php echo '<br />';
for($i=0; $i <= 2; $i++){
    echo '<img src="'.base_url().'static/i/radio'; if($arr_chapter_8[$i]->content=='OK') echo '_checked'; echo '.jpg"><br />';
}
?>
</td><td valign="top" width="40" align="center">
<?php echo '<br />';
for($i=0; $i <= 2; $i++){
    echo '<img src="'.base_url().'static/i/radio'; if($arr_chapter_8[$i]->content=='Not OK') echo '_checked'; echo '.jpg"><br />';
}
?>
</td><td valign="top" width="35" align="center">
<?php echo '<br />';
for($i=0; $i <= 2; $i++){
    echo '<img src="'.base_url().'static/i/radio'; if($arr_chapter_8[$i]->content=='N/A') echo '_checked'; echo '.jpg"><br />';
}
?>
</td><td valign="top" align="center" width="90"><?php echo '<br />'; for($i=0; $i <= 2; $i++) echo 'Major<br />' ?></td></tr>
</table>

<?php $Qsubchapter = $this->db->query("SELECT `subno_chapter`, `content` FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `chapter`='8' AND `no_chapter`='8.4' ORDER BY `subno_chapter_order` ASC"); foreach($Qsubchapter->result_object() as $subchapter) $arr_subchapter_8_4[$subchapter->subno_chapter -1]=$subchapter ?>

<h3>Chapter 8.4: Verify LED STATUS (RBS already integrated to the system)</h3>
<table class="border" cellpadding="0" cellspacing="0">				
<tr class="header"><td>Unit</td><td width="65">Green LED</td><td width="65">Red LED</td><td width="65">Yellow LED</td><td width="30">OK</td><td width="40">Not OK</td><td width="35">N/A</td><td width="90">Remark</td></tr>
<?php
$arr_dt_84a = array('SCB', 'ETB/ETMC1/ETMFX', 'TUB', 'HSDPA', 'BBIFB', 'RAX 32/64/128', 'GPB', 'HS-TX 15/45/60', 'RFIFB', 'TRX sec 1', 'TRX sec 2', 'TRX sec 3', 'MCPA sec 1', 'MCPA sec 2');
for($i=0; $i <= 13; $i++){
	$dt_subchapter_8_4a = explode('|', $arr_subchapter_8_4[$i]->content);
	echo '<tr><td>'.$arr_dt_84a[$i];
	echo '</td><td>'.$this->ifunction->ifnull($dt_subchapter_8_4a[3]).'</td><td>'.$this->ifunction->ifnull($dt_subchapter_8_4a[4]).'</td><td>'.$this->ifunction->ifnull($dt_subchapter_8_4a[5]).'</td>';
	echo '<td align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_8_4a[6]=='OK') echo '_checked'; echo '.jpg"></td>';
	echo '<td align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_8_4a[6]=='Not OK') echo '_checked'; echo '.jpg"></td>';
	echo '<td align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_8_4a[6]=='N/A') echo '_checked'; echo '.jpg"></td>';
	echo '<td>'.$this->ifunction->ifnull($dt_subchapter_8_4a[7]).'</td></tr>';
}
?>
</table>

<hr />

<table class="border" cellpadding="0" cellspacing="0">
<?php
$arr_dt_84b = array('MCPA sec 3', 'MCPA Fan', 'Fan Unit 1', 'Fan Unit 2', 'Fan Unit 3', 'PCU', 'BFU34', 'ACCU', 'XALM (EACU)', 'CBU', 'RUIF', 'CLU (climate Unit)', 'BB Sub Rack Fan', 'RF Sub Rack Fan', 'AIU sec 1', 'AIU sec 2', 'AIU sec 3', 'FU (filter unit)1', 'FU (filter unit)2', 'FU (filter unit)3', 'FU (filter unit)4', 'FU (filter unit)5', 'FU (filter unit)6', 'RU21 20/40/60 sec 1', 'RU21 20/40/60 sec 2', 'RU21 20/40/60 sec 3', 'RU21 20/40/60 sec 4 ', 'RU21 20/40/60 sec 5', 'RU21 20/40/60 sec 6', 'PSU 1', 'PSU 2', 'PSU 3', 'PSU 4', 'OBIF', 'RRU 10/20/40 sec 1', 'RRU 10/20/40 sec 2', 'RRU 10/20/40 sec 3', 'RRU 10/20/40 sec 4', 'RRU 10/20/40 sec 5');
$ib = 14;
for($i=0; $i <= 38; $i++){
	$dt_subchapter_8_4b = explode('|', $arr_subchapter_8_4[$ib]->content);
	echo '<tr><td>'.$arr_dt_84b[$i];
	echo '</td><td width="65">'.$this->ifunction->ifnull($dt_subchapter_8_4b[3]).'&nbsp;</td><td width="65">'.$this->ifunction->ifnull($dt_subchapter_8_4b[4]).'&nbsp;</td><td width="65">'.$this->ifunction->ifnull($dt_subchapter_8_4b[5]).'&nbsp;</td>';
	echo '<td width="30" align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_8_4b[6]=='OK') echo '_checked'; echo '.jpg"></td>';
	echo '<td width="40" align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_8_4b[6]=='Not OK') echo '_checked'; echo '.jpg"></td>';
	echo '<td width="35" align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_8_4b[6]=='N/A') echo '_checked'; echo '.jpg"></td>';
	echo '<td width="90">'.$this->ifunction->ifnull($dt_subchapter_8_4b[7]).'&nbsp;</td></tr>';
	$ib++;
}
?>
</table>

<hr />

<table class="border" cellpadding="0" cellspacing="0">
<?php
$arr_dt_84c = array('RRU 10/20/40 sec 6', 'DUW', 'DUG', 'RUW 20/40/60 sec 1', 'RUW 20/40/60 sec 2', 'RUW 20/40/60 sec 3', 'RUW 20/40/60 sec 4', 'RUW 20/40/60 sec 5', 'RUW 20/40/60 sec 6', 'RRUW 10/20/40 sec 1', 'RRUW 10/20/40 sec 2', 'RRUW 10/20/40 sec 3', 'RRUW 10/20/40 sec 4', 'RRUW 10/20/40 sec 5', 'RRUW 10/20/40 sec 6', 'SCU', 'SAU');
$ic = 53;
for($i=0; $i <= 16; $i++){
	$dt_subchapter_8_4c = explode('|', $arr_subchapter_8_4[$ic]->content);
	echo '<tr><td>'.$arr_dt_84c[$i];
	echo '</td><td width="65">'.$this->ifunction->ifnull($dt_subchapter_8_4c[3]).'&nbsp;</td><td width="65">'.$this->ifunction->ifnull($dt_subchapter_8_4c[4]).'&nbsp;</td><td width="65">'.$this->ifunction->ifnull($dt_subchapter_8_4c[5]).'&nbsp;</td>';
	echo '<td width="30" align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_8_4c[6]=='OK') echo '_checked'; echo '.jpg"></td>';
	echo '<td width="40" align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_8_4c[6]=='Not OK') echo '_checked'; echo '.jpg"></td>';
	echo '<td width="35" align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_8_4c[6]=='N/A') echo '_checked'; echo '.jpg"></td>';
	echo '<td width="90">'.$this->ifunction->ifnull($dt_subchapter_8_4c[7]).'&nbsp;</td></tr>';
	$ic++;
}
?>
</table>

<?php $Qchapter = $this->db->query("SELECT `no_chapter`, `content` FROM `it_atp_chapter` WHERE `atp_id`='$dx' AND `chapter`='9' ORDER BY `atp_chapter_id` ASC"); foreach($Qchapter->result_object() as $chapter) $arr_chapter_9[str_replace('9.', '', $chapter->no_chapter) -1]=$chapter ?>

<table class="border" cellpadding="0" cellspacing="0" style="margin-top:5px">
<tr class="header"><td width="40">Chapter</td><td>Title work performed</td><td width="30">OK</td><td width="40">Not OK</td><td width="35">N/A</td><td width="90">Remark</td></tr>
<tr><td valign="top"><b>9</b><br />9.1<br />9.2</td>
<td valign="top"><b>Antenna System Preliminary checks</b><br />Tools/Equipment for Test<br />Documentation check must be available</td>
<td valign="top" align="center">
<?php echo '<br />';
for($i=0; $i <= 1; $i++){
	echo '<img src="'.base_url().'static/i/radio'; if($arr_chapter_9[$i]->content=='OK') echo '_checked'; echo '.jpg"><br />';
}
?>
</td><td valign="top" align="center">
<?php echo '<br />';
for($i=0; $i <= 1; $i++){
	echo '<img src="'.base_url().'static/i/radio'; if($arr_chapter_9[$i]->content=='Not OK') echo '_checked'; echo '.jpg"><br />';
}
?>
</td><td valign="top" align="center">
<?php echo '<br />';
for($i=0; $i <= 1; $i++){
	echo '<img src="'.base_url().'static/i/radio'; if($arr_chapter_9[$i]->content=='N/A') echo '_checked'; echo '.jpg"><br />';
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
	echo '<tr><td>9.1.'.($i +1).'</td><td>'.$arr_dt_91[$i].'</td><td>'.$this->ifunction->ifnull($dt_subchapter_9_1[3]).'</td><td>'.$this->ifunction->ifnull($dt_subchapter_9_1[4]).'</td><td>'.$this->ifunction->ifnull($dt_subchapter_9_1[5]).'</td></tr>';
}
?>
</table>

<hr />

<?php $Qsubchapter = $this->db->query("SELECT `subno_chapter`, `content` FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `chapter`='9' AND `no_chapter`='9.2' ORDER BY `subno_chapter_order` ASC"); foreach($Qsubchapter->result_object() as $subchapter) $arr_subchapter_9_2[$subchapter->subno_chapter -1]=$subchapter ?>

<h3>Chapter 9.2: Documentation Check</h3>
<table class="border" cellpadding="0" cellspacing="0">
<tr class="header"><td width="40">Test No</td><td>Item</td><td width="30">OK</td><td width="40">Not OK</td><td>Remark</td></tr>
<?php
$arr_dt_92 = array('Manufacture/Factory Test Result', 'Specification equipment');
for($i=0; $i <= 1; $i++){
	$dt_subchapter_9_2 = explode('|', $arr_subchapter_9_2[$i]->content);
	echo '<tr><td>9.2.'.($i +1);
	echo '</td><td>'.$arr_dt_92[$i];
	echo '</td><td align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_9_2[3]=='OK') echo '_checked'; echo '.jpg"></td>';
	echo '<td align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_9_2[3]=='Not OK') echo '_checked'; echo '.jpg"></td>';
	echo '<td>'.$this->ifunction->ifnull($dt_subchapter_9_2[4]).'</td></tr>';
}
?>
</table>
<p style="font-size:11px"><i>Note: All document should be attached</i></p>

<?php $Qchapter = $this->db->query("SELECT `no_chapter`, `content` FROM `it_atp_chapter` WHERE `atp_id`='$dx' AND `chapter`='10' ORDER BY `atp_chapter_id` ASC");
foreach($Qchapter->result_object() as $chapter) $arr_chapter_10[str_replace('10.', '', $chapter->no_chapter) -1]=$chapter ?>

<table class="border" cellpadding="0" cellspacing="0">
<tr class="header"><td width="40">Chapter</td><td>Title work performed</td><td width="30">OK</td><td width="40">Not OK</td><td width="35">N/A</td><td width="90">Remark</td></tr>
<tr><td valign="top"><b>10</b><br />10.1<br />10.2<br />10.3<br />10.4<br />10.5<br />10.6<br />10.7<br />10.8<br />10.9<br />10.10</td>
<td valign="top"><b>Antenna System Inventory Check</b><br />Equipment quantity Check<br />Connector Type<br />Antenna Table<br />Antenna System Control (ASC)<br />Remote Electrical Tilt (RET)<br />Feeder Cable<br />Top Jumper (from feeder to ASC)<br />Top Jumper (from ASC/RRU to Antenna)<br />Bottom Jumper<br />Optical Cable</td>
<td valign="top" align="center">
<?php echo '<br />';
for($i=0; $i <= 9; $i++){
	echo '<img src="'.base_url().'static/i/radio'; if($arr_chapter_10[$i]->content=='OK') echo '_checked'; echo '.jpg"><br />';
}
?>
</td><td valign="top" align="center">
<?php echo '<br />';
for($i=0; $i <= 9; $i++){
	echo '<img src="'.base_url().'static/i/radio'; if($arr_chapter_10[$i]->content=='Not OK') echo '_checked'; echo '.jpg"><br />';
}
?>
</td><td valign="top" align="center">
<?php echo '<br />';
for($i=0; $i <= 9; $i++){
	echo '<img src="'.base_url().'static/i/radio'; if($arr_chapter_10[$i]->content=='N/A') echo '_checked'; echo '.jpg"><br />';
}
?>
</td><td valign="top" align="center"><?php echo '<br />'; for($i=0; $i <= 9; $i++) echo 'Minor<br />' ?></td></tr>
</table>

<?php $Qsubchapter = $this->db->query("SELECT `subno_chapter`, `content` FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `chapter`='10' AND `no_chapter`='10.1' ORDER BY `subno_chapter_order` ASC"); foreach($Qsubchapter->result_object() as $subchapter) $arr_subchapter_10_1[$subchapter->subno_chapter -1]=$subchapter;
$dt_subchapter_10_1a = explode('|', $arr_subchapter_10_1[0]->content);
$dt_subchapter_10_1b = explode('|', $arr_subchapter_10_1[1]->content);
$dt_subchapter_10_1c = explode('|', $arr_subchapter_10_1[2]->content);
$dt_subchapter_10_1d = explode('|', $arr_subchapter_10_1[3]->content) ?>

<h3>Chapter 10.1: Equipment Quantity Check</h3>
<table class="border" cellpadding="0" cellspacing="0">		
<tr><td width="40">10.1.1</td><td colspan="2">Antenna Polarization</td><td colspan="2"><img src="<?php echo base_url() ?>static/i/radio<?php if($dt_subchapter_10_1a[3]=='Cross Polarization') echo '_checked' ?>.jpg"> Cross Polarization <span style="padding:0 5px">&nbsp;</span> <img src="<?php echo base_url() ?>static/i/radio<?php if($dt_subchapter_10_1a[3]=='Vertical Polarization') echo '_checked' ?>.jpg"> Vertical Polarization</td></tr>
<tr><td>10.1.2</td><td colspan="2">Band Frequenc</td><td colspan="2"><img src="<?php echo base_url() ?>static/i/radio<?php if($dt_subchapter_10_1b[3]=='3G') echo '_checked' ?>.jpg"> 3G</td></tr>
<tr><td>10.1.3</td><td colspan="2">Number of sectors</td><td colspan="2"><img src="<?php echo base_url() ?>static/i/radio<?php if($dt_subchapter_10_1c[3]=='Omni') echo '_checked' ?>.jpg"> Omni <span style="padding:0 5px">&nbsp;</span> <img src="<?php echo base_url() ?>static/i/radio<?php if($dt_subchapter_10_1c[3]=='One') echo '_checked' ?>.jpg"> One <span style="padding:0 5px">&nbsp;</span> <img src="<?php echo base_url() ?>static/i/radio<?php if($dt_subchapter_10_1c[3]=='Two') echo '_checked' ?>.jpg"> Two <span style="padding:0 5px">&nbsp;</span> <img src="<?php echo base_url() ?>static/i/radio<?php if($dt_subchapter_10_1c[3]=='Three') echo '_checked' ?>.jpg"> Three</td></tr>
<tr><td>10.1.4</td><td colspan="2">Type of Diversity</td><td colspan="2"><img src="<?php echo base_url() ?>static/i/radio<?php if($dt_subchapter_10_1d[3]=='Polarization') echo '_checked' ?>.jpg"> Polarization <span style="padding:0 5px">&nbsp;</span> <img src="<?php echo base_url() ?>static/i/radio<?php if($dt_subchapter_10_1d[3]=='Space') echo '_checked' ?>.jpg"> Space</td></tr>
<tr><td>10.1.5</td><td colspan="4">Status and Number of Installed Antenna</td></tr>
<?php
$i101 = 4;
$arr_dt_101 = array(1=> 'Antenna', 'Filter', 'EMP/Connect Arrester', 'Duplexer', 'Triplexer', 'Splitter Two Way', 'Splitter Three Way', 'Hybrid Coupler', 'TMA/ASC', 'RET', 'MCM');
for($i=1; $i <= 11; $i++){
	$dt_subchapter_10_1 = explode('|', $arr_subchapter_10_1[$i101]->content);
	echo '<tr><td>10.1.5.'.$i.'</td><td width="120">'.$arr_dt_101[$i].'</td>';
	echo '<td width="40"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_10_1[3]=='New') echo '_checked'; echo '.jpg"> New</td><td width="50"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_10_1[3]=='Existing') echo '_checked'; echo '.jpg"> Existing</td><td>Qty: <span style="padding:0 2px">&nbsp;</span> <img src="'.base_url().'static/i/radio'; if($dt_subchapter_10_1[4]=='1') echo '_checked'; echo '.jpg">1 <span style="padding:0 2px">&nbsp;</span><img src="'.base_url().'static/i/radio'; if($dt_subchapter_10_1[4]=='2') echo '_checked'; echo '.jpg"> 2 <span style="padding:0 2px">&nbsp;</span><img src="'.base_url().'static/i/radio'; if($dt_subchapter_10_1[4]=='3') echo '_checked'; echo '.jpg"> 3 <span style="padding:0 2px">&nbsp;</span><img src="'.base_url().'static/i/radio'; if($dt_subchapter_10_1[4]=='4') echo '_checked'; echo '.jpg"> 4 <span style="padding:0 2px">&nbsp;</span><img src="'.base_url().'static/i/radio'; if($dt_subchapter_10_1[4]=='5') echo '_checked'; echo '.jpg"> 5 <span style="padding:0 2px">&nbsp;</span><img src="'.base_url().'static/i/radio'; if($dt_subchapter_10_1[4]=='6') echo '_checked'; echo '.jpg"> 6 <span style="padding:0 2px">&nbsp;</span><img src="'.base_url().'static/i/radio'; if($dt_subchapter_10_1[4]=='N/A') echo '_checked'; echo '.jpg"> N/A</td>';
	echo '</tr>';
	$i101++;
}
?>
</table>
<p style="font-size:11px"><i>Note: If there are many existing filters, please contact The Quality Improvement<br />TSD = Three Sector with Diversity.  TSND = Three Sector with Non Diversity.  EMP = Electro Magnetic Protection.</i> <i>ASC = Antenna System Control.  RET = Remote Electrical Tilt.  MCM = Multi Casting Matrix.</i></p>

<hr />

<?php $Qsubchapter = $this->db->query("SELECT `subno_chapter`, `content` FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `chapter`='10' AND `no_chapter`='10.2' ORDER BY `subno_chapter_order` ASC"); foreach($Qsubchapter->result_object() as $subchapter) $arr_subchapter_10_2[$subchapter->subno_chapter -1]=$subchapter ?>

<h3>Chapter 10.2: Connector</h3>
<table class="border" cellpadding="0" cellspacing="0">		
<tr class="header"><td width="40">Test No</td><td width="80">Connector Type</td><td>Brand</td><td>Quantity</td><td width="35">N/A</td><td>Remark</td></tr>
<?php
$arr_dt_102 = array('&frac12;" N Male', '&frac12;" N Female', '7/16" DIN Male', '7/16" DIN Female', '7/8" Male', '7/8" Female', '1 &frac14;" Male', '1 &frac14;" Female', '1 5/8" Male', '1 5/8" Female');
for($i=0; $i <= 9; $i++){
	$dt_subchapter_10_2 = explode('|', $arr_subchapter_10_2[$i]->content);
	echo '<tr><td>10.2.'.($i +1).'</td><td>'.$arr_dt_102[$i].'</td>';
	echo '<td>'.$this->ifunction->ifnull($dt_subchapter_10_2[3]).'</td><td>'.$this->ifunction->ifnull($dt_subchapter_10_2[4]).'</td><td align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_10_2[5]=='N/A') echo '_checked'; echo '.jpg"></td><td>'.$this->ifunction->ifnull($dt_subchapter_10_2[6]).'</td></tr>';
}
?>
</table>

<?php $Qsubchapter = $this->db->query("SELECT `subno_chapter`, `content` FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `chapter`='10' AND `no_chapter`='10.3' ORDER BY `subno_chapter_order` ASC"); foreach($Qsubchapter->result_object() as $subchapter) $arr_subchapter_10_3[$subchapter->subno_chapter -1]=$subchapter ?>

<h3>Chapter 10.3: Antenna Table </h3>
<table class="border" cellpadding="0" cellspacing="0">
<tr class="header"><td width="40">Test No</td><td width="60">Antenna</td><td>Type</td><td>Brand</td><td>Serial No.</td><td width="35">N/A</td><td>Remark</td></tr>
<?php
$arr_dt_103a = array('10.3.1.A', '10.3.1.B', '10.3.2.A', '10.3.2.B', '10.3.3.A', '10.3.3.B', '10.3.4.A', '10.3.4.B', '10.3.5.A', '10.3.5.B', '10.3.6.A', '10.3.6.B');
$arr_dt_103b = array('Sector 1 A', 'Sector 1 B', 'Sector 2 A', 'Sector 2 B', 'Sector 3 A', 'Sector 3 B', 'Sector 4 A', 'Sector 4 B', 'Sector 5 A', 'Sector 5 B', 'Sector 6 A', 'Sector 6 B');
for($i=0; $i <= 11; $i++){
	$dt_subchapter_10_3 = explode('|', $arr_subchapter_10_3[$i]->content);
	echo '<tr><td>'.$arr_dt_103a[$i].'</td><td>'.$arr_dt_103b[$i].'</td><td>'.$this->ifunction->ifnull($dt_subchapter_10_3[3]).'</td><td>'.$this->ifunction->ifnull($dt_subchapter_10_3[4]).'</td><td>'.$this->ifunction->ifnull($dt_subchapter_10_3[5]).'</td><td align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_10_3[6]=='N/A') echo '_checked'; echo '.jpg"></td><td>'.$this->ifunction->ifnull($dt_subchapter_10_3[7]).'</td></tr>';
}
?>
</table>
<p style="font-size:11px"><i>Note: Existing Equipment must match with BOQ & Site Documentation</i></p>

<?php $Qsubchapter = $this->db->query("SELECT `subno_chapter`, `content` FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `chapter`='10' AND `no_chapter`='10.4' ORDER BY `subno_chapter_order` ASC"); foreach($Qsubchapter->result_object() as $subchapter) $arr_subchapter_10_4[$subchapter->subno_chapter -1]=$subchapter ?>

<h3>Chapter 10.4: Antenna System Controller</h3>
<table class="border" cellpadding="0" cellspacing="0">
<tr class="header"><td width="40">Test No</td><td width="60">Antenna</td><td>Product Number/Revision</td><td>Brand</td><td>Serial No.</td><td width="35">N/A</td><td>Remark</td></tr>
<?php
$i104 = 0;
for($i=1; $i <= 6; $i++){
	$dt_subchapter_10_4 = explode('|', $arr_subchapter_10_4[$i104]->content);
	echo '<tr><td>10.4.'.$i.'</td><td>Sector '.$i.'</td><td>'.$this->ifunction->ifnull($dt_subchapter_10_4[3]).'</td><td>'.$this->ifunction->ifnull($dt_subchapter_10_4[4]).'</td><td>'.$this->ifunction->ifnull($dt_subchapter_10_4[5]).'</td><td align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_10_4[6]=='N/A') echo '_checked'; echo '.jpg"></td><td>'.$this->ifunction->ifnull($dt_subchapter_10_4[7]).'</td></tr>';
	$i104++;
}
?>
</table>

<hr />

<?php $Qsubchapter = $this->db->query("SELECT `subno_chapter`, `content` FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `chapter`='10' AND `no_chapter`='10.5' ORDER BY `subno_chapter_order` ASC"); foreach($Qsubchapter->result_object() as $subchapter) $arr_subchapter_10_5[$subchapter->subno_chapter -1]=$subchapter ?>

<h3>Chapter 10.5: RET (Remote Electrical Tilting)</h3>
<table class="border" cellpadding="0" cellspacing="0">
<tr class="header"><td width="40">Test No</td><td width="60">Antenna</td><td>Product Number/Revision</td><td>Brand</td><td>Serial No.</td><td  width="35">N/A</td><td>Remark</td></tr>
<?php
$i105 = 0;
for($i=1; $i <= 6; $i++){
	$dt_subchapter_10_5 = explode('|', $arr_subchapter_10_5[$i105]->content);
	echo '<tr><td>10.5.'.$i.'</td><td>Sector '.$i.'</td><td>'.$this->ifunction->ifnull($dt_subchapter_10_5[3]).'</td><td>'.$this->ifunction->ifnull($dt_subchapter_10_5[4]).'</td><td>'.$this->ifunction->ifnull($dt_subchapter_10_5[5]).'</td><td align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_10_5[6]=='N/A') echo '_checked'; echo '.jpg"></td><td>'.$this->ifunction->ifnull($dt_subchapter_10_5[7]).'</td></tr>';
	$i105++;
}
?>
</table>

<?php $Qsubchapter = $this->db->query("SELECT `subno_chapter`, `content` FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `chapter`='10' AND `no_chapter`='10.6' ORDER BY `subno_chapter_order` ASC"); foreach($Qsubchapter->result_object() as $subchapter) $arr_subchapter_10_6[$subchapter->subno_chapter -1]=$subchapter ?>

<h3>Chapter 10.6: Feeder cable </h3>
<table class="border" cellpadding="0" cellspacing="0">
<tr class="header"><td width="40">Test No</td><td width="60">Antenna Sector</td><td>Type</td><td>Brand</td><td>Length (M)</td><td width="35">N/A</td><td>Remark</td></tr>
<?php
$arr_dt_106a = array('10.6.1.A', '10.6.1.B', '10.6.2.A', '10.6.2.B', '10.6.3.A', '10.6.3.B', '10.6.4.A', '10.6.4.B', '10.6.5.A', '10.6.5.B', '10.6.6.A', '10.6.6.B');
$arr_dt_106b = array('Sector 1 A', 'Sector 1 B', 'Sector 2 A', 'Sector 2 B', 'Sector 3 A', 'Sector 3 B', 'Sector 4 A', 'Sector 4 B', 'Sector 5 A', 'Sector 5 B', 'Sector 6 A', 'Sector 6 B');
for($i=0; $i <= 11; $i++){
	$dt_subchapter_10_6= explode('|', $arr_subchapter_10_6[$i]->content);
	echo '<tr><td>'.$arr_dt_106a[$i].'</td><td>'.$arr_dt_106a[$i].'</td><td>'.$this->ifunction->ifnull($dt_subchapter_10_6[3]).'</td><td>'.$this->ifunction->ifnull($dt_subchapter_10_6[4]).'</td><td>'.$this->ifunction->ifnull($dt_subchapter_10_6[5]).'</td><td align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_10_6[6]=='N/A') echo '_checked'; echo '.jpg"></td><td>'.$this->ifunction->ifnull($dt_subchapter_10_6[7]).'</td></tr>';
}
?>
</table>
<p style="font-size:11px;padding:0;margin:0"><i>Length of coaxial feeder refer to measurement on distance to fault</i></p>

<?php $Qsubchapter = $this->db->query("SELECT `subno_chapter`, `content` FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `chapter`='10' AND `no_chapter`='10.7' ORDER BY `subno_chapter_order` ASC"); foreach($Qsubchapter->result_object() as $subchapter) $arr_subchapter_10_7[$subchapter->subno_chapter -1]=$subchapter ?>

<h3 style="padding:0;margin:0">Chapter 10.7: Outdoor Jumper Cable (from feeder to ASC)</h3>
<table class="border" cellpadding="0" cellspacing="0">
<tr class="header"><td width="40">Test No</td><td width="60">Antenna Sector</td><td>Type</td><td>Brand</td><td>Length (M)</td><td width="35">N/A</td><td>Remark</td></tr>
<?php
$arr_dt_107a = array('10.7.1.A', '10.7.1.B', '10.7.2.A', '10.7.2.B', '10.7.3.A', '10.7.3.B', '10.7.4.A', '10.7.4.B', '10.7.5.A', '10.7.5.B', '10.7.6.A', '10.7.6.B');
$arr_dt_107b = array('Sector 1 A', 'Sector 1 B', 'Sector 2 A', 'Sector 2 B', 'Sector 3 A', 'Sector 3 B', 'Sector 4 A', 'Sector 4 B', 'Sector 5 A', 'Sector 5 B', 'Sector 6 A', 'Sector 6 B');
for($i=0; $i <= 11; $i++){
	$dt_subchapter_10_7 = explode('|', $arr_subchapter_10_7[$i]->content);
	echo '<tr><td>'.$arr_dt_107a[$i].'</td><td>'.$arr_dt_107b[$i].'</td><td>'.$this->ifunction->ifnull($dt_subchapter_10_7[3]).'</td><td>'.$this->ifunction->ifnull($dt_subchapter_10_7[4]).'</td><td>'.$this->ifunction->ifnull($dt_subchapter_10_7[5]).'</td><td align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_10_7[6]=='N/A') echo '_checked'; echo '.jpg"></td><td>'.$this->ifunction->ifnull($dt_subchapter_10_7[7]).'</td></tr>';
}
?>
</table>
<p style="font-size:11px"><i>Length of coaxial feeder refer to measurement on distance to fault</i></p>

<hr />

<?php $Qsubchapter = $this->db->query("SELECT `subno_chapter`, `content` FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `chapter`='10' AND `no_chapter`='10.8' ORDER BY `subno_chapter_order` ASC"); foreach($Qsubchapter->result_object() as $subchapter) $arr_subchapter_10_8[$subchapter->subno_chapter -1]=$subchapter ?>

<h3>Chapter 10.8: Outdoor Jumper Cable (From ASC to Antenna)</h3>
<table class="border" cellpadding="0" cellspacing="0">
<tr class="header"><td width="40">Test No</td><td width="60">Antenna Sector</td><td>Type</td><td>Brand</td><td>Length (M)</td><td width="35">N/A</td><td>Remark</td></tr>
<?php
$arr_dt_108a = array('10.8.1.A', '10.8.1.B', '10.8.2.A', '10.8.2.B', '10.8.3.A', '10.8.3.B', '10.8.4.A', '10.8.4.B', '10.8.5.A', '10.8.5.B', '10.8.6.A', '10.8.6.B');
$arr_dt_108b = array('Sector 1 A', 'Sector 1 B', 'Sector 2 A', 'Sector 2 B', 'Sector 3 A', 'Sector 3 B', 'Sector 4 A', 'Sector 4 B', 'Sector 5 A', 'Sector 5 B', 'Sector 6 A', 'Sector 6 B');
for($i=0; $i <= 11; $i++){
	$dt_subchapter_10_8 = explode('|', $arr_subchapter_10_8[$i]->content);
	echo '<tr><td>'.$arr_dt_108a[$i].'</td><td>'.$arr_dt_108b[$i].'</td><td>'.$this->ifunction->ifnull($dt_subchapter_10_8[3]).'</td><td>'.$this->ifunction->ifnull($dt_subchapter_10_8[4]).'</td><td>'.$this->ifunction->ifnull($dt_subchapter_10_8[5]).'</td><td align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_10_8[6]=='N/A') echo '_checked'; echo '.jpg"></td><td>'.$this->ifunction->ifnull($dt_subchapter_10_8[7]).'</td></tr>';
}
?>
</table>

<?php $Qsubchapter = $this->db->query("SELECT `subno_chapter`, `content` FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `chapter`='10' AND `no_chapter`='10.9' ORDER BY `subno_chapter_order` ASC"); foreach($Qsubchapter->result_object() as $subchapter) $arr_subchapter_10_9[$subchapter->subno_chapter -1]=$subchapter ?>

<h3>Chapter 10.9: Indoor Jumper Cable (Bottom)</h3>
<table class="border" cellpadding="0" cellspacing="0">
<tr class="header"><td width="40">Test No</td><td width="60">Antenna Sector</td><td>Type</td><td>Brand</td><td>Length (M)</td><td width="35">N/A</td><td>Remark</td></tr>
<?php
$arr_dt_109a = array('10.9.1.A', '10.9.1.B', '10.9.2.A', '10.9.2.B', '10.9.3.A', '10.9.3.B', '10.9.4.A', '10.9.4.B', '10.9.5.A', '10.9.5.B', '10.9.6.A', '10.9.6.B');
$arr_dt_109b = array('Sector 1 A', 'Sector 1 B', 'Sector 2 A', 'Sector 2 B', 'Sector 3 A', 'Sector 3 B', 'Sector 4 A', 'Sector 4 B', 'Sector 5 A', 'Sector 5 B', 'Sector 6 A', 'Sector 6 B');
for($i=0; $i <= 11; $i++){
	$dt_subchapter_10_9 = explode('|', $arr_subchapter_10_9[$i]->content);
	echo '<tr><td>'.$arr_dt_109a[$i].'</td><td>'.$arr_dt_109b[$i].'</td><td>'.$this->ifunction->ifnull($dt_subchapter_10_9[3]).'</td><td>'.$this->ifunction->ifnull($dt_subchapter_10_9[4]).'</td><td>'.$this->ifunction->ifnull($dt_subchapter_10_9[5]).'</td><td align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_10_9[6]=='N/A') echo '_checked'; echo '.jpg"></td><td>'.$this->ifunction->ifnull($dt_subchapter_10_9[7]).'</td></tr>';
}
?>
</table>
<p style="font-size:11px"><i>Note: Length of coaxial feeder refer to measurement on distance to fault</i></p>

<?php $Qchapter = $this->db->query("SELECT `no_chapter`, `content` FROM `it_atp_chapter` WHERE `atp_id`='$dx' AND `chapter`='11' ORDER BY `atp_chapter_id` ASC"); foreach($Qchapter->result_object() as $chapter) $arr_chapter_11[str_replace('11.', '', $chapter->no_chapter) -1]=$chapter ?>

<table class="border" cellpadding="0" cellspacing="0">
<tr class="header"><td width="40">Chapter</td><td>Title work performed</td><td width="30">OK</td><td width="40">Not OK</td><td width="35">N/A</td><td width="90">Remark</td></tr>
<tr><td valign="top"><b>11</b><br />11.1</td><td valign="top"><b>Installation and construction</b><br />Installation antenna system</td>
<td valign="top" align="center"><br /><img src="<?php echo base_url() ?>static/i/radio<?php if($arr_chapter_11[0]->content=='OK') echo '_checked' ?>.jpg">
</td><td valign="top" align="center"><br /><img src="<?php echo base_url() ?>static/i/radio<?php if($arr_chapter_11[0]->content=='Not OK') echo '_checked' ?>.jpg"></td>
<td valign="top" align="center"><br /><img src="<?php echo base_url() ?>static/i/radio<?php if($arr_chapter_11[0]->content=='N/A') echo '_checked' ?>.jpg"></td>
<td valign="top" align="center"><br />Major</td></tr>
</table>

<hr />

<?php $Qsubchapter = $this->db->query("SELECT `subno_chapter`, `content` FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `chapter`='11' AND `no_chapter`='11.1' ORDER BY `subno_chapter_order` ASC"); foreach($Qsubchapter->result_object() as $subchapter) $arr_subchapter_11_1[$subchapter->subno_chapter -1]=$subchapter;
$dt_subchapter_11_1 = explode('|', $arr_subchapter_11_1[0]->content) ?>

<h3>Chapter 11.1: Installation / Execution</h3>
<table class="border" cellpadding="0" cellspacing="0">
<tr class="header"><td width="40">Test No</td><td>Test Item</td><td width="30">OK</td><td width="40">Not OK</td><td width="35">N/A</td><td width="200">Comment</td></tr>
<tr><td>11.1.1</td><td>Maintenance aspect (easy to maintain)</td><td align="center"><img src="<?php echo base_url() ?>static/i/radio<?php if($dt_subchapter_11_1[3]=='OK') echo '_checked' ?>.jpg"></td><td align="center"><img src="<?php echo base_url() ?>static/i/radio<?php if($dt_subchapter_11_1[3]=='Not OK') echo '_checked' ?>.jpg"></td><td align="center"><img src="<?php echo base_url() ?>static/i/radio<?php if($dt_subchapter_11_1[3]=='N/A') echo '_checked' ?>.jpg"></td><td><?php echo $this->ifunction->ifnull($dt_subchapter_11_1[4]) ?></td></tr>
<tr><td></td><td colspan="5"><b>Antenna Support</b></td></tr>
<?php
$i111a = 1;
$arr_dt_111a = array(2=> 'Antenna mounting', 'Arm construction', 'Pylon construction', 'Arm length');
for($i=2; $i <= 5; $i++){
	$dt_subchapter_11_1a = explode('|', $arr_subchapter_11_1[$i111a]->content);
	echo '<tr><td>11.1.'.$i.'</td><td>'.$arr_dt_111a[$i].'</td>';
	echo '<td align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_11_1a[3]=='OK') echo '_checked'; echo '.jpg"></td>';
	echo '<td align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_11_1a[3]=='Not OK') echo '_checked'; echo '.jpg"></td>';
	echo '<td align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_11_1a[3]=='N/A') echo '_checked'; echo '.jpg"></td>';
	echo '<td>'.$this->ifunction->ifnull($dt_subchapter_11_1a[4]).'</td></tr>';
	$i111a++;
}
?>
<tr><td></td><td colspan="5"><b>Feeder Installation</b></td></tr>
<?php
$i111b = 5;
$arr_dt_111b = array(6=> 'Feeder placement<br />(Feeders running and laying on cable ladder not too strained. It\'s properly fixed)', 'Feeder bending if:<br />- For 1 5/8 Inch, r &gt; 510 mm<br />- For 7/8 Inch, r &gt; 250 mm<br />- For 1 &frac14; Inch, r &gt; 380 mm<br />- For &frac12; Inch , r &gt; 125 mm', 'Feeder Connector Installation', 'Feeder Clamp Installation', 'Water Leakage', 'Connection cable feeder correct and tightened', 'Indoor Cable Tray Installation');
for($i=6; $i <= 12; $i++){
	$dt_subchapter_11_1b = explode('|', $arr_subchapter_11_1[$i111b]->content);
	echo '<tr><td valign="top">11.1.'.$i.'</td><td>'.$arr_dt_111b[$i].'</td>';
	echo '<td width="30" align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_11_1b[3]=='OK') echo '_checked'; echo '.jpg"></td>';
	echo '<td width="40" align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_11_1b[3]=='Not OK') echo '_checked'; echo '.jpg"></td>';
	echo '<td width="35" align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_11_1b[3]=='N/A') echo '_checked'; echo '.jpg"></td>';
	echo '<td width="200">'.$this->ifunction->ifnull($dt_subchapter_11_1b[4]).'</td></tr>';
	$i111b++;
}
?>
<tr><td></td><td colspan="5"><b>Grounding System (feeder)</b></td></tr>
<?php
$i111c = 12;
$arr_dt_111c = array(13=> 'Lightning Protection', 'Grounding in every 50 meter', 'Grounding Bar on Bending', 'Feeder Clamp Installation', 'Grounding Bar at entering room feeder', 'Grounding feeder shouldnt be connect to tower');
$arr_dt_111c1 = array(13=> '<i>Ref to Site Acceptance/CME</i>', '', '<i>Ref to Site Acceptance/CME</i>', '', '<i>EID put Inside the shelter</i>', '');
for($i=13; $i <= 18; $i++){
	$dt_subchapter_11_1c = explode('|', $arr_subchapter_11_1[$i111c]->content);
	echo '<tr><td valign="top">11.1.'.$i.'</td><td>'.$arr_dt_111c[$i].'</td>';
	echo '<td width="30" align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_11_1c[3]=='OK') echo '_checked'; echo '.jpg"></td>';
	echo '<td width="40" align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_11_1c[3]=='Not OK') echo '_checked'; echo '.jpg"></td>';
	echo '<td width="35" align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_11_1c[3]=='N/A') echo '_checked'; echo '.jpg"></td>';
	echo '<td width="200">'.$arr_dt_111c1[$i].'</td></tr>';
	$i111c++;
}
?>
<tr><td></td><td colspan="5"><b>Transient Protection Unit (TVSS)</b></td></tr>
<?php
$i111d = 18;
$arr_dt_111d = array(19=> 'TVSS availability', 'TVSS installation & connection');
for($i=19; $i <= 20; $i++){
	$dt_subchapter_11_1d = explode('|', $arr_subchapter_11_1[$i111d]->content);
	echo '<tr><td valign="top">11.1.'.$i.'</td><td>'.$arr_dt_111d[$i].'</td>';
	echo '<td width="30" align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_11_1d[3]=='OK') echo '_checked'; echo '.jpg"></td>';
	echo '<td width="40" align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_11_1d[3]=='Not OK') echo '_checked'; echo '.jpg"></td>';
	echo '<td width="35" align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_11_1d[3]=='N/A') echo '_checked'; echo '.jpg"></td>';
	echo '<td width="200">'.$this->ifunction->ifnull($dt_subchapter_11_1d[4]).'</td></tr>';
	$i111d++;
}
?>
</table><br />

<?php $Qchapter = $this->db->query("SELECT `no_chapter`, `content` FROM `it_atp_chapter` WHERE `atp_id`='$dx' AND `chapter`='12' ORDER BY `atp_chapter_id` ASC"); foreach($Qchapter->result_object() as $chapter) $arr_chapter_12[str_replace('12.', '', $chapter->no_chapter) -1]=$chapter ?>

<table class="border" cellpadding="0" cellspacing="0">
<tr class="header"><td width="40">Chapter</td><td>Title work performed</td><td width="30">OK</td><td width="40">Not OK</td><td width="35">N/A</td><td width="90">Remark</td></tr>
<tr><td valign="top"><b>12</b><br />12.1<br />12.2</td>
<td valign="top"><b>Orientation and Position Antenna</b><br />Orientation outdoor antenna<br />Position outdoor antenna</td>
<td valign="top" align="center">
<?php echo '<br />';
for($i=0; $i <= 1; $i++){
	echo '<img src="'.base_url().'static/i/radio'; if($arr_chapter_12[$i]->content=='OK') echo '_checked'; echo '.jpg"><br />';
}
?>
</td><td valign="top" align="center">
<?php echo '<br />';
for($i=0; $i <= 1; $i++){
	echo '<img src="'.base_url().'static/i/radio'; if($arr_chapter_12[$i]->content=='Not OK') echo '_checked'; echo '.jpg"><br />';
}
?>
</td><td valign="top" align="center">
<?php echo '<br />';
for($i=0; $i <= 1; $i++){
	echo '<img src="'.base_url().'static/i/radio'; if($arr_chapter_12[$i]->content=='N/A') echo '_checked'; echo '.jpg"><br />';
	$j++;
}
?>
</td><td valign="top" align="center"><?php //echo '<br />'; for($i=0; $i <= 1; $i++) echo 'Minor<br />' ?></td></tr>
</table>

<hr />

<?php $Qsubchapter = $this->db->query("SELECT `subno_chapter`, `content` FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `chapter`='12' AND `no_chapter`='12.1' ORDER BY `subno_chapter_order` ASC"); foreach($Qsubchapter->result_object() as $subchapter) $arr_subchapter_12_1[$subchapter->subno_chapter -1]=$subchapter ?> 

<h3 style="margin:0;padding:0">Chapter 12.1: Orientation</h3>
<table class="border" cellpadding="0" cellspacing="0">
<tr class="header"><td width="40" rowspan="2">Test No</td><td width="50" rowspan="2">Antenna Sector</td><td colspan="2">Azimuth (deg)</td><td colspan="2">Mechanical Tilt (deg)</td><td colspan="2">Electrical Tilt</td><td colspan="2">Height (m)</td><td width="35" rowspan="2">N/A</td><td width="70" rowspan="2">Remark</td></tr>
<tr class="header"><td>Actual</td><td>Site Doc.</td><td>Actual</td><td>Site Doc.</td><td>Actual</td><td>Site Doc.</td><td>Actual</td><td>Site Doc.</td></tr>
<?php
$arr_dt_121a1 = array('12.1.1.A', '12.1.1.B', '12.1.2.A', '12.1.2.B', '12.1.3.A', '12.1.3.B', '12.1.4.A', '12.1.4.B', '12.1.5.A', '12.1.5.B', '12.1.6.A', '12.1.6.B');
$arr_dt_121a2 = array('Sector 1 A', 'Sector 1 B', 'Sector 2 A', 'Sector 2 B', 'Sector 3 A', 'Sector 3 B', 'Sector 4 A', 'Sector 4 B', 'Sector 5 A', 'Sector 5 B', 'Sector 6 A', 'Sector 6 B');
for($i=0; $i <= 11; $i++){
	$dt_subchapter_12_1a = explode('|', $arr_subchapter_12_1[$i]->content);
	echo '<tr><td>'.$arr_dt_121a1[$i].'</td><td>'.$arr_dt_121a2[$i].'</td>';
	echo '<td>'.$this->ifunction->ifnull($dt_subchapter_12_1a[3]).'</td>';
	echo '<td>'.$this->ifunction->ifnull($dt_subchapter_12_1a[4]).'</td>';
	echo '<td>'.$this->ifunction->ifnull($dt_subchapter_12_1a[5]).'</td>';
	echo '<td>'.$this->ifunction->ifnull($dt_subchapter_12_1a[6]).'</td>';
	echo '<td>'.$this->ifunction->ifnull($dt_subchapter_12_1a[7]).'</td>';
	echo '<td>'.$this->ifunction->ifnull($dt_subchapter_12_1a[8]).'</td>';
	echo '<td>'.$this->ifunction->ifnull($dt_subchapter_12_1a[9]).'</td>';
	echo '<td>'.$this->ifunction->ifnull($dt_subchapter_12_1a[10]).'</td>';
	echo '<td align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_12_1a[11]=='N/A') echo '_checked'; echo '.jpg"></td>';
	echo '<td>'.$this->ifunction->ifnull($dt_subchapter_12_1a[12]).'</td></tr>';
}
?>
</table>
<p style="font-size:11px"><i>Note: Should be matched with Site Documentation</i></p>

<?php $Qsubchapter = $this->db->query("SELECT `subno_chapter`, `content` FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `chapter`='12' AND `no_chapter`='12.2' ORDER BY `subno_chapter_order` ASC"); foreach($Qsubchapter->result_object() as $subchapter) $arr_subchapter_12_2[$subchapter->subno_chapter -1]=$subchapter ?> 

<h3 style="margin:0;padding:0">Chapter 12.2: Position</h3>
<table class="border" cellpadding="0" cellspacing="0">				
<tr class="header"><td width="40">Test No</td><td width="80">Test Item</td><td width="30">OK</td><td width="40">Not OK</td><td>Comment</td></tr>
<?php
$arr_dt_122 = array('Placement', 'Possibility of blocking', 'Distance from other');
for($i=0; $i <= 2; $i++){
	$dt_subchapter_12_2 = explode('|', $arr_subchapter_12_2[$i]->content);
	echo '<tr><td>12.2.'.($i +1).'</td><td>'.$arr_dt_122[$i].'</td>';
	echo '<td><img src="'.base_url().'static/i/radio'; if($dt_subchapter_12_2[3]=='OK') echo '_checked'; echo '.jpg"></td>';
	echo '<td><img src="'.base_url().'static/i/radio'; if($dt_subchapter_12_2[3]=='Not OK') echo '_checked'; echo '.jpg"></td>';
	echo '<td>'.$this->ifunction->ifnull($dt_subchapter_12_2[4]).'</td></tr>';
}
?>
</table><br />

<?php $Qchapter = $this->db->query("SELECT `no_chapter`, `content` FROM `it_atp_chapter` WHERE `atp_id`='$dx' AND `chapter`='13' ORDER BY `atp_chapter_id` ASC"); foreach($Qchapter->result_object() as $chapter) $arr_chapter_13[str_replace('13.', '', $chapter->no_chapter) -1]=$chapter ?>

<table class="border" cellpadding="0" cellspacing="0">
<tr class="header"><td width="40">Chapter</td><td>Title work performed</td><td width="30">OK</td><td width="40">Not OK</td><td width="35">N/A</td><td width="90">Remark</td></tr>
<tr><td valign="top"><b>13</b></td><td valign="top"><b>Distance to fault use dummy load</b><br /><i>Refer to Guideline Installation</i></td>
<td valign="top" align="center"><img src="<?php echo base_url() ?>static/i/radio<?php if($arr_chapter_13[0]->content=='OK') echo '_checked' ?>.jpg"></td>
<td valign="top" align="center"><img src="<?php echo base_url() ?>static/i/radio<?php if($arr_chapter_13[0]->content=='Not OK') echo '_checked' ?>.jpg"></td>
<td valign="top" align="center"><img src="<?php echo base_url() ?>static/i/radio<?php if($arr_chapter_13[0]->content=='N/A') echo '_checked' ?>.jpg"></td>
<td valign="top" align="center">Major</td></tr></table>

<p align="center"><br /><img src="<?php echo base_url() ?>static/i/pdf_atp_13.1.jpg"></p>

<hr />

<?php $Qsubchapter = $this->db->query("SELECT `subno_chapter`, `content` FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `chapter`='13' AND `no_chapter`='13.1' ORDER BY `subno_chapter_order` ASC"); foreach($Qsubchapter->result_object() as $subchapter) $arr_subchapter_13_1[$subchapter->subno_chapter -1]=$subchapter ?>

<h3>Chapter  13.1: Distances to Fault Measurement with Dummy Load</h3>
<span style="font-size:11px"><i>Standard Measurement: DTF VSWR connector maximum 1.025 and feeder cable 1.01<br />Note: Measurement & Raw data (softcopy) should be attached and by pass the surge arrestor if one are installed</i></span>
<table class="border" cellpadding="0" cellspacing="0">
<tr class="header"><td width="40" rowspan="2">No</td><td width="50" rowspan="2">Feeder</td><td colspan="2">M1</td><td colspan="2">M2</td><td colspan="2">M3</td><td colspan="2">M4</td><td colspan="2">M5</td><td colspan="2">M6</td><td width="30" rowspan="2">OK</td><td width="40" rowspan="2">Not OK</td><td width="35" rowspan="2">N/A</td><td width="90" rowspan="2">Remark</td></tr>
<tr class="header"><td>S</td><td>D</td><td>S</td><td>D</td><td>S</td><td>D</td><td>S</td><td>D</td><td>S</td><td>D</td><td>S</td><td>D</td></tr>
<?php
$arr_dt_131a = array('13.1.1.A', '13.1.1.B', '13.1.2.A', '13.1.2.B', '13.1.3.A', '13.1.3.B', '13.1.4.A', '13.1.4.B', '13.1.5.A', '13.1.5.B', '13.1.6.A', '13.1.6.B');
$arr_dt_131b = array('Sector 1 A', 'Sector 1 B', 'Sector 2 A', 'Sector 2 B', 'Sector 3 A', 'Sector 3 B', 'Sector 4 A', 'Sector 4 B', 'Sector 5 A', 'Sector 5 B', 'Sector 6 A', 'Sector 6 B');
for($i=0; $i <= 11; $i++){
	$dt_subchapter_13_1 = explode('|', $arr_subchapter_13_1[$i]->content);
	echo '<tr><td>'.$arr_dt_131a[$i].'</td><td>'.$arr_dt_131b[$i].'</td>';
	echo '<td>'.$this->ifunction->ifnull($dt_subchapter_13_1[3]).'</td><td>'.$this->ifunction->ifnull($dt_subchapter_13_1[4]).'</td>';
	echo '<td>'.$this->ifunction->ifnull($dt_subchapter_13_1[5]).'</td><td>'.$this->ifunction->ifnull($dt_subchapter_13_1[6]).'</td>';
	echo '<td>'.$this->ifunction->ifnull($dt_subchapter_13_1[7]).'</td><td>'.$this->ifunction->ifnull($dt_subchapter_13_1[8]).'</td>';
	echo '<td>'.$this->ifunction->ifnull($dt_subchapter_13_1[9]).'</td><td>'.$this->ifunction->ifnull($dt_subchapter_13_1[10]).'</td>';
	echo '<td>'.$this->ifunction->ifnull($dt_subchapter_13_1[11]).'</td><td>'.$this->ifunction->ifnull($dt_subchapter_13_1[12]).'</td>';
	echo '<td>'.$this->ifunction->ifnull($dt_subchapter_13_1[13]).'</td><td>'.$this->ifunction->ifnull($dt_subchapter_13_1[14]).'</td>';
	echo '<td align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_13_1[15]=='OK') echo '_checked'; echo '.jpg"></td>';
	echo '<td align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_13_1[15]=='Not OK') echo '_checked'; echo '.jpg"></td>';
	echo '<td align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_13_1[15]=='N/A') echo '_checked'; echo '.jpg"></td>';
	echo '<td>'.$this->ifunction->ifnull($dt_subchapter_13_1[16]).'</td></tr>';
}
?>
</table><br />

<?php $Qchapter = $this->db->query("SELECT `no_chapter`, `content` FROM `it_atp_chapter` WHERE `atp_id`='$dx' AND `chapter`='14' ORDER BY `atp_chapter_id` ASC"); foreach($Qchapter->result_object() as $chapter) $arr_chapter_14[str_replace('14.', '', $chapter->no_chapter) -1]=$chapter ?>

<table class="border" cellpadding="0" cellspacing="0">
<tr class="header"><td width="40">Chapter</td><td>Title work performed</td><td width="30">OK</td><td width="40">Not OK</td><td width="35">N/A</td><td width="90">Remark</td></tr>
<tr><td valign="top"><b>14</b><br />14.1<br />14.2<br />14.3<br />14.4</td>
<td valign="top"><b>Antenna System Measurement & Setting</b><br />VSWR Measurement without ASC / Filter<br />VSWR Measurement with ASC / Filter<br />VSWR Measurement for RBS 3412 / 3418 / 3518<br />Antenna System Supervision Threshold Setting</td>
<td valign="top" align="center">
<?php echo '<br />';
for($i=0; $i <= 3; $i++){
	echo '<img src="'.base_url().'static/i/radio'; if($arr_chapter_14[$i]->content=='OK') echo '_checked'; echo '.jpg"><br />';
}
?>
</td><td valign="top" align="center">
<?php echo '<br />';
for($i=0; $i <= 3; $i++){
	echo '<img src="'.base_url().'static/i/radio'; if($arr_chapter_14[$i]->content=='Not OK') echo '_checked'; echo '.jpg"><br />';
}
?>
</td><td valign="top" align="center">
<?php echo '<br />';
for($i=0; $i <= 3; $i++){
	echo '<img src="'.base_url().'static/i/radio'; if($arr_chapter_14[$i]->content=='N/A') echo '_checked'; echo '.jpg"><br />';
}
?>
</td><td valign="top" align="center">
<?php echo '<br />';
for($i=0; $i <= 3; $i++){
	if(($i==1)||($i==2)) echo 'Minor<br />'; else echo 'Major<br />';
}
?>
</td></tr></table>

<?php $Qsubchapter = $this->db->query("SELECT `subno_chapter`, `content` FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `chapter`='14' AND `no_chapter`='14.1' ORDER BY `subno_chapter_order` ASC"); foreach($Qsubchapter->result_object() as $subchapter) $arr_subchapter_14_1[$subchapter->subno_chapter -1]=$subchapter ?>

<h3>Chapter 14.1: VSWR measurement UL & DL without ASC</h3>
<span style="font-size:11px"><i>Standard VSWR Vs Frequency Response: &lt;_ 1.2 {TX freq (DL): 2140Mhz-2145Mhz&RX Freq (UL): 1950Mhz-1955Mhz}</i></span>
<table class="border" cellpadding="0" cellspacing="0">
<tr class="header"><td width="40" rowspan="2">Test No</td><td width="50" rowspan="2">Test Item</td><td colspan="2">VSWR Max (peak marker)</td><td width="30" rowspan="2">OK</td><td width="40" rowspan="2">Not OK</td><td width="35" rowspan="2">N/A</td><td width="150" rowspan="2">Remark</td></tr>
<tr class="header"><td>UL</td><td>DL</td></tr>
<?php
$arr_dt_141a = array('14.1.1.A', '14.1.1.B', '14.1.2.A', '14.1.2.B', '14.1.3.A', '14.1.3.B', '14.1.4.A', '14.1.4.B', '14.1.5.A', '14.1.5.B', '14.1.6.A', '14.1.6.B');
$arr_dt_141b = array('Sector 1 A', 'Sector 1 B', 'Sector 2 A', 'Sector 2 B', 'Sector 3 A', 'Sector 3 B', 'Sector 4 A', 'Sector 4 B', 'Sector 5 A', 'Sector 5 B', 'Sector 6 A', 'Sector 6 B');
for($i=0; $i <= 11; $i++){
	$dt_subchapter_14_1 = explode('|', $arr_subchapter_14_1[$i]->content);
	echo '<tr><td>'.$arr_dt_141a[$i].'</td><td>'.$arr_dt_141b[$i].'</td>';
	echo '<td>'.$this->ifunction->ifnull($dt_subchapter_14_1[3]).'</td><td>'.$this->ifunction->ifnull($dt_subchapter_14_1[4]).'</td>';
	echo '<td align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_14_1[5]=='OK') echo '_checked'; echo '.jpg"></td>';
	echo '<td align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_14_1[5]=='Not OK') echo '_checked'; echo '.jpg"></td>';
	echo '<td align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_14_1[5]=='N/A') echo '_checked'; echo '.jpg"></td>';
	echo '<td>'.$this->ifunction->ifnull($dt_subchapter_14_1[6]).'</td></tr>';
}
?>
</table>
<p style="font-size:11px"><i>Note: Measurement & Raw data (softcopy) should be attached</i></p>

<hr />

<p align="center"><img src="<?php echo base_url() ?>static/i/pdf_atp_14.2.jpg"></p>

<?php $Qsubchapter = $this->db->query("SELECT `subno_chapter`, `content` FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `chapter`='14' AND `no_chapter`='14.2' ORDER BY `subno_chapter_order` ASC"); foreach($Qsubchapter->result_object() as $subchapter) $arr_subchapter_14_2[$subchapter->subno_chapter -1]=$subchapter ?>

<h3>Chapter 14.2: VSWR measurement UL & DL with ASC</h3>
<p style="font-size:11px"><i>Standard VSWR Vs Frequency Response: &lt;_ 1.38 (TX freq: 2140Mhz-2145Mhz&RX Freq: 1950Mhz-1955Mhz)</i></p>
<table class="border" cellpadding="0" cellspacing="0">
<tr class="header"><td width="40" rowspan="2">Test No</td><td width="50" rowspan="2">Test Item</td><td colspan="2">VSWR Max (peak marker)</td><td width="30" rowspan="2">OK</td><td width="40" rowspan="2">Not OK</td><td width="35" rowspan="2">N/A</td><td width="150" rowspan="2">Remark</td></tr>
<tr class="header"><td>UL</td><td>DL</td></tr>
<?php
$arr_dt_142a = array('14.2.1.A', '14.2.1.B', '14.2.2.A', '14.2.2.B', '14.2.3.A', '14.2.3.B', '14.2.4.A', '14.2.4.B', '14.2.5.A', '14.2.5.B', '14.2.6.A', '14.2.6.B');
$arr_dt_142b = array('Sector 1 A', 'Sector 1 B', 'Sector 2 A', 'Sector 2 B', 'Sector 3 A', 'Sector 3 B', 'Sector 4 A', 'Sector 4 B', 'Sector 5 A', 'Sector 5 B', 'Sector 6 A', 'Sector 6 B');
for($i=0; $i <= 11; $i++){
	$dt_subchapter_14_2 = explode('|', $arr_subchapter_14_2[$i]->content);
	echo '<tr><td>'.$arr_dt_142a[$i].'</td><td>'.$arr_dt_142b[$i].'</td>';
	echo '<td>'.$this->ifunction->ifnull($dt_subchapter_14_2[3]).'</td><td>'.$this->ifunction->ifnull($dt_subchapter_14_2[4]).'</td>';
	echo '<td align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_14_2[5]=='OK') echo '_checked'; echo '.jpg"></td>';
	echo '<td align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_14_2[5]=='Not OK') echo '_checked'; echo '.jpg"></td>';
	echo '<td align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_14_2[5]=='N/A') echo '_checked'; echo '.jpg"></td>';
	echo '<td>'.$this->ifunction->ifnull($dt_subchapter_14_2[6]).'</td></tr>';
}
?>
</table>
<p style="font-size:11px"><i>Note: Measurement & Raw data (softcopy) should be attached</i></p>

<p align="center"><img src="<?php echo base_url() ?>static/i/pdf_atp_14.3.jpg"></p>

<hr />

<?php $Qsubchapter = $this->db->query("SELECT `subno_chapter`, `content` FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `chapter`='14' AND `no_chapter`='14.3' ORDER BY `subno_chapter_order` ASC"); foreach($Qsubchapter->result_object() as $subchapter) $arr_subchapter_14_3[$subchapter->subno_chapter -1]=$subchapter ?>

<h3>Chapter 14.3: VSWR measurement for RBS 3412 / 3418 / 3518</h3>
<span style="font-size:11px"><i>Standard VSWR Vs Frequency Response: &lt;_ 1.2 (TX freq: 2140Mhz-2145Mhz&RX Freq: 1950Mhz-1955Mhz)</i></span>
<table class="border" cellpadding="0" cellspacing="0">
<tr class="header"><td width="40" rowspan="2">Test No</td><td width="50" rowspan="2">Test Item</td><td colspan="2">VSWR Max (peak marker)</td><td width="30" rowspan="2">OK</td><td width="40" rowspan="2">Not OK</td><td width="35" rowspan="2">N/A</td><td width="150" rowspan="2">Remark</td></tr>
<tr class="header"><td>UL</td><td>DL</td></tr>
<?php
$arr_dt_143a = array('14.3.1.A', '14.3.1.B', '14.3.2.A', '14.3.2.B', '14.3.3.A', '14.3.3.B', '14.3.4.A', '14.3.4.B', '14.3.5.A', '14.3.5.B', '14.3.6.A', '14.3.6.B');
$arr_dt_143b = array('Sector 1 A', 'Sector 1 B', 'Sector 2 A', 'Sector 2 B', 'Sector 3 A', 'Sector 3 B', 'Sector 4 A', 'Sector 4 B', 'Sector 5 A', 'Sector 5 B', 'Sector 6 A', 'Sector 6 B');
for($i=0; $i <= 11; $i++){
	$dt_subchapter_14_3 = explode('|', $arr_subchapter_14_3[$i]->content);
	echo '<tr><td>'.$arr_dt_143a[$i].'</td><td>'.$arr_dt_143b[$i].'</td>';
	echo '<td>'.$this->ifunction->ifnull($dt_subchapter_14_3[3]).'</td><td>'.$this->ifunction->ifnull($dt_subchapter_14_3[4]).'</td>';
	echo '<td align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_14_3[5]=='OK') echo '_checked'; echo '.jpg"></td>';
	echo '<td align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_14_3[5]=='Not OK') echo '_checked'; echo '.jpg"></td>';
	echo '<td align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_14_3[5]=='N/A') echo '_checked'; echo '.jpg"></td>';
	echo '<td>'.$this->ifunction->ifnull($dt_subchapter_14_3[6]).'</td></tr>';
}
?>
</table>
<p style="font-size:11px"><i>Note: Measurement & Raw data (softcopy) should be attached, by pass Surge arrestor if one are installed</i></p>

<p align="center"><img src="<?php echo base_url() ?>static/i/pdf_atp_14.4.jpg"></p>

<?php $Qsubchapter = $this->db->query("SELECT `subno_chapter`, `content` FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `chapter`='14' AND `no_chapter`='14.4' ORDER BY `subno_chapter_order` ASC"); foreach($Qsubchapter->result_object() as $subchapter) $arr_subchapter_14_4[$subchapter->subno_chapter -1]=$subchapter ?>

<h3 style="margin:0;padding:0">Chapter 14.4: Antenna System Supervision Threshold Setting</h3>
<table class="border" cellpadding="0" cellspacing="0">
<tr class="header"><td width="40" rowspan="2">Test No</td><td width="60" rowspan="2">Sector/ Branch</td><td colspan="2">Antenna Supervision Type</td><td colspan="2">*Antenna Supervision Threshold (%)</td><td width="30" rowspan="2">OK</td><td width="40" rowspan="2">Not OK</td><td width="35" rowspan="2">N/A</td><td width="100" rowspan="2">Remark</td></tr>
<tr class="header"><td>VSWR<br />(RL)</td><td>DC<br />Resistance</td><td>No<br />Aux</td><td>With<br />Aux</td></tr>
<?php
$arr_dt_144a = array('14.4.1.A', '14.4.1.B', '14.4.2.A', '14.4.2.B', '14.4.3.A', '14.4.3.B', '14.4.4.A', '14.4.4.B', '14.4.5.A', '14.4.5.B', '14.4.6.A', '14.4.6.B');
$arr_dt_144b = array('1 A', '1 B', '2 A', '2 B', '3 A', '3 B', '4 A', '4 B', '5 A', '5 B', '6 A', '6 B');
for($i=0; $i <= 11; $i++){
	$dt_subchapter_14_4 = explode('|', $arr_subchapter_14_4[$i]->content);
	echo '<tr><td>'.$arr_dt_144a[$i].'</td><td align="center">'.$arr_dt_144b[$i].'</td>';
	echo '<td align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_14_4[3]=='VSWR (RL)') echo '_checked'; echo '.jpg"></td>';
	echo '<td align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_14_4[3]=='DC Resistance') echo '_checked'; echo '.jpg"></td>';
	echo '<td align="center">65/80</td><td align="center">80/55</td>';
	echo '<td align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_14_4[4]=='OK') echo '_checked'; echo '.jpg"></td>';
	echo '<td align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_14_4[4]=='Not OK') echo '_checked'; echo '.jpg"></td>';
	echo '<td align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_14_4[4]=='N/A') echo '_checked'; echo '.jpg"></td>';
	echo '<td>'.$this->ifunction->ifnull($dt_subchapter_14_4[5]).'</td></tr>';
}
?>
</table>
<p style="font-size:11px"><i>(Please check the RBS type & Antenna Configuration before setup the value)<br />* VSWR/DC Resistance:  No Aux &raquo; 65 = 17.7 dB / 80 = 3.15 Ohm. With Aux  &raquo; 80 = 12 dB / 55 = 6.9 Ohm.</i></p>

<hr />

<?php $Qchapter = $this->db->query("SELECT `no_chapter`, `content` FROM `it_atp_chapter` WHERE `atp_id`='$dx' AND `chapter`='15' ORDER BY `atp_chapter_id` ASC"); foreach($Qchapter->result_object() as $chapter) $arr_chapter_15[str_replace('15.', '', $chapter->no_chapter) -1]=$chapter ?>

<h3>C. Test should be done when RBS is On Line</h3>
<table class="border" cellpadding="0" cellspacing="0">
<tr class="header"><td width="40">Chapter</td><td>Title work performed</td><td width="30">OK</td><td width="40">Not OK</td><td width="35">N/A</td><td width="65">Remark</td></tr>
<tr><td valign="top"><b>15</b><br />15.1</td>
<td valign="top"><b>Checking Downloading software (script) status</b><br />* Downloading Software (script) Status</td>
<td valign="bottom" align="center"><img src="<?php echo base_url() ?>static/i/radio<?php if($arr_chapter_15[0]->content=='OK') echo '_checked' ?>.jpg"></td>
<td valign="bottom" align="center"><img src="<?php echo base_url() ?>static/i/radio<?php if($arr_chapter_15[0]->content=='Not OK') echo '_checked' ?>.jpg"></td>
<td valign="bottom" align="center"><img src="<?php echo base_url() ?>static/i/radio<?php if($arr_chapter_15[0]->content=='N/A') echo '_checked' ?>.jpg"></td>
<td valign="bottom" align="center">Major</td></tr></table>
<!--p style="font-size:11px"><i>* DT Script should be attached</i></p-->

<?php $Qchapter = $this->db->query("SELECT `no_chapter`, `content` FROM `it_atp_chapter` WHERE `atp_id`='$dx' AND `chapter`='16' ORDER BY `atp_chapter_id` ASC"); foreach($Qchapter->result_object() as $chapter) $arr_chapter_16[str_replace('16.', '', $chapter->no_chapter) -1]=$chapter ?>

<table class="border" cellpadding="0" cellspacing="0">
<tr><td valign="top" width="40"><b>16</b><br /><br /><br />16.1</td>
<td valign="top"><b>Checking Hardware Technical Status and Configuration, by comparing site configuration from the OMC-R against actual site configuration</b><br />Hardware Technical Status & Configuration</td>
<td valign="bottom" width="30" align="center"><img src="<?php echo base_url() ?>static/i/radio<?php if($arr_chapter_16[0]->content=='OK') echo '_checked' ?>.jpg"></td>
<td valign="bottom" width="40" align="center"><img src="<?php echo base_url() ?>static/i/radio<?php if($arr_chapter_16[0]->content=='Not OK') echo '_checked' ?>.jpg"></td>
<td valign="bottom" width="35" align="center"><img src="<?php echo base_url() ?>static/i/radio<?php if($arr_chapter_16[0]->content=='N/A') echo '_checked' ?>.jpg"></td>
<td valign="bottom" align="center" width="65">Major</td></tr></table>

<?php $Qchapter = $this->db->query("SELECT `no_chapter`, `content` FROM `it_atp_chapter` WHERE `atp_id`='$dx' AND `chapter`='17' ORDER BY `atp_chapter_id` ASC"); foreach($Qchapter->result_object() as $chapter) $arr_chapter_17[str_replace('17.', '', $chapter->no_chapter) -1]=$chapter ?>

<table class="border" cellpadding="0" cellspacing="0">
<tr>
<td width="40" valign="top"><b>17</b><br />17.1<br /><br />17.2</td>
<td valign="top"><b>Checking status & functionality of RBS Internal & External Alarm</b><br />Checking status & Functionality of RBS Internal Alarm by doing simulation test on RBS<br />Checking status & functionality External alarms by doing simulation test on transducer/sensor<br />(All active alarms should be cleared)</td>
<td valign="top" width="30" align="center">
<?php echo '<br />';
for($i=0; $i <= 1; $i++){
	echo '<img src="'.base_url().'static/i/radio'; if($arr_chapter_17[$i]->content=='OK') echo '_checked'; echo '.jpg"><br />';
	echo '<br />';
}
?>
</td><td valign="top" width="40" align="center">
<?php echo '<br />';
for($i=0; $i <= 1; $i++){
	echo '<img src="'.base_url().'static/i/radio'; if($arr_chapter_17[$i]->content=='Not OK') echo '_checked'; echo '.jpg"><br />';
	echo '<br />';
}
?>
</td><td valign="top" width="35" align="center">
<?php echo '<br />';
for($i=0; $i <= 1; $i++){
	echo '<img src="'.base_url().'static/i/radio'; if($arr_chapter_17[$i]->content=='N/A') echo '_checked'; echo '.jpg"><br />';
	echo '<br />';
}
?>
</td><td valign="top" align="center" width="65"><?php echo '<br />'; for($i=0; $i <= 1; $i++) echo 'Major<br /><br />' ?></td></tr>
</table>

<?php $Qsubchapter = $this->db->query("SELECT `subno_chapter`, `content` FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `chapter`='17' AND `no_chapter`='17.1' ORDER BY `subno_chapter_order` ASC"); foreach($Qsubchapter->result_object() as $subchapter) $arr_subchapter_17_1[$subchapter->subno_chapter -1]=$subchapter ?>

<h3>Chapter 17.1: RBS Internal Alarm</h3>
<table class="border" cellpadding="0" cellspacing="0">
<tr class="header"><td width="40" rowspan="2">Test No</td><td rowspan="2">Alarm Test</td><td colspan="3">Status RBS1</td><td width="150" rowspan="2">Remark</td></tr>
<tr class="header"><td width="30">OK</td><td width="40">Not OK</td><td width="35">N/A</td></tr>
<?php
$arr_dt_171 = array('Fan Off', 'PSU 1 , 2 , 3 of 4 off (MAINS FAILURE)', 'Bfu_DcDistributionFailure');
for($i=0; $i <= 2; $i++){
	$dt_subchapter_17_1 = explode('|', $arr_subchapter_17_1[$i]->content);
	echo '<tr><td>17.1.'.($i +1).'</td><td>'.$arr_dt_171[$i].'</td>';
	echo '<td align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_17_1[3]=='OK') echo '_checked'; echo '.jpg"></td>';
	echo '<td align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_17_1[3]=='Not OK') echo '_checked'; echo '.jpg"></td>';
	echo '<td align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_17_1[3]=='N/A') echo '_checked'; echo '.jpg"></td>';
	echo '<td>'.$this->ifunction->ifnull($dt_subchapter_17_1[4]).'</td></tr>';
}
?>
</table>

<?php $Qsubchapter = $this->db->query("SELECT `subno_chapter`, `content` FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `chapter`='17' AND `no_chapter`='17.2' ORDER BY `subno_chapter_order` ASC"); foreach($Qsubchapter->result_object() as $subchapter) $arr_subchapter_17_2[$subchapter->subno_chapter -1]=$subchapter ?>

<h3>Chapter 17.2: RBS External Alarm (Alarm Text = 6 first character of Cell ID + Alarm type)</h3>
<table class="border" cellpadding="0" cellspacing="0">
<tr class="header"><td width="40" rowspan="2">Test No</td><td width="60" rowspan="2">Port No</td><td rowspan="2">Alarm Test</td><td colspan="3">Status RBS1</td><td  width="150" rowspan="2">Remark</td></tr>
<tr class="header"><td width="30">OK</td><td width="40">Not OK</td><td width="35">N/A</td></tr>
<?php
$arr_dt_172a = array('Door Open', 'Fire Smoke - Heat Alarm', 'Temperature Alarm', 'AC Power L1 fails', 'AC Power L2 fails', 'AC Power L3 fails');
for($i=0; $i <= 5; $i++){
	$dt_subchapter_17_2a = explode('|', $arr_subchapter_17_2[$i]->content);
	echo '<tr><td>17.2.'.($i +1).'</td><td align="center">'.($i +1).'</td><td>'.$arr_dt_172a[$i].'</td>';
	echo '<td align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_17_2a[3]=='OK') echo '_checked'; echo '.jpg"></td>';
	echo '<td align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_17_2a[3]=='Not OK') echo '_checked'; echo '.jpg"></td>';
	echo '<td align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_17_2a[3]=='N/A') echo '_checked'; echo '.jpg"></td>';
	echo '<td>'.$this->ifunction->ifnull($dt_subchapter_17_2a[4]).'</td></tr>';
}
?>
</table>

<hr />

<table class="border" cellpadding="0" cellspacing="0">
<?php
$i172b = 6;
$arr_dt_172b = array(6=> 'Arrester Fails', 'Rectifier Main fails', 'Rectifier Module Fails', 'Rectifier Battery fails', 'Genset Working', 'Genset fails', 'Genset Routine Test', 'Spare', 'Spare', 'Spare');
for($i=6; $i <= 15; $i++){
	$dt_subchapter_17_2b = explode('|', $arr_subchapter_17_2[$i172b]->content);
	echo '<tr><td width="40">17.2.'.($i +1).'</td><td width="60" align="center">'.($i +1).'</td><td>'.$arr_dt_172b[$i].'</td>';
	echo '<td width="30" align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_17_2b[3]=='OK') echo '_checked'; echo '.jpg"></td>';
	echo '<td width="40" align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_17_2b[3]=='Not OK') echo '_checked'; echo '.jpg"></td>';
	echo '<td width="35" align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_17_2b[3]=='N/A') echo '_checked'; echo '.jpg"></td>';
	echo '<td  width="150">'.$this->ifunction->ifnull($dt_subchapter_17_2b[4]).'&nbsp;</td></tr>';
	$i172b++;
}
?>
</table>
<p style="font-size:11px"><i>Note: Refer to External Alarm Docs (EXAL_STD_GRP_1.pdf)<br />- All alarm type must be defined in RBS even if it is not used (put the loop back)<br />- All External alarm port must be terminated on LSA DDF and stick with labels<br />- Temperature Alarm setting value must be defined according to RBS specification</i></p>

<?php $Qchapter = $this->db->query("SELECT `no_chapter`, `content` FROM `it_atp_chapter` WHERE `atp_id`='$dx' AND `chapter`='18' ORDER BY `atp_chapter_id` ASC"); foreach($Qchapter->result_object() as $chapter) $arr_chapter_18[str_replace('18.', '', $chapter->no_chapter) -1]=$chapter ?>

<table class="border" cellpadding="0" cellspacing="0">
<tr class="header"><td width="40">Chapter</td><td>Title work performed</td><td width="30">OK</td><td width="40">Not OK</td><td width="35">N/A</td><td width="90">Remark</td></tr>
<tr><td valign="top"><b>18</b><br /><br />18.1<br />18.2<br />18.3<br />18.4<br />18.5<br />18.6<br />18.7<br />18.8<br />18.9<br />18.10<br />18.11<br />18.12<br />18.13<br />18.14</td>
<td valign="top"><b>Mobile Originating & Terminating Test Call</b><br />(must be successful)<br />Iub Transport Option<br />Voice Test Call<br />Video Test Call<br />Packet switch Test Call<br />HSPA Test Call<br />Test Actual and PMR Capture Result<br />SMS Test Call<br />MMS Test Call<br />Incoming & Outgoing Hand Over Test<br />Emergency Call (118, 112)<br />IMA Bandwidth Adaptation Test<br />Sync Test for Dual Stack and Native IP configuration<br />OAM Link ATM & IP Connectivity to OSS Test<br />IMA Bandwidth Adaptation Functionality Test</td>
<td valign="top" align="center">
<?php echo '<br />';
echo '<br />';
for($i=0; $i <= 13; $i++){
	echo '<img src="'.base_url().'static/i/radio'; if($arr_chapter_18[$i]->content=='OK') echo '_checked'; echo '.jpg"><br />';
}
?>
</td><td valign="top" align="center">
<?php echo '<br />';
echo '<br />';
for($i=0; $i <= 13; $i++){
	echo '<img src="'.base_url().'static/i/radio'; if($arr_chapter_18[$i]->content=='Not OK') echo '_checked'; echo '.jpg"><br />';
}
?>
</td><td valign="top" align="center">
<?php echo '<br />';
echo '<br />';
for($i=0; $i <= 13; $i++){
	echo '<img src="'.base_url().'static/i/radio'; if($arr_chapter_18[$i]->content=='N/A') echo '_checked'; echo '.jpg"><br />';
}
?>
</td><td valign="top" align="center"><?php echo '<br /><br />'; for($i=0; $i <= 13; $i++) echo 'Major<br />' ?></td></tr>
</table>

<?php $Qsubchapter = $this->db->query("SELECT `subno_chapter`, `content` FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `chapter`='18' AND `no_chapter`='18.1' ORDER BY `subno_chapter_order` ASC"); foreach($Qsubchapter->result_object() as $subchapter) $arr_subchapter_18_1[$subchapter->subno_chapter -1]=$subchapter ?>

<h3>Chapter 18.1: Iub Transport Option</h3>
<table class="border" cellpadding="0" cellspacing="0">
<tr class="header"><td width="60">Items</td><td colspan="2">Transport Option<br />ATM</td><td colspan="2">Transport Option<br />Dual Stack (2E1 or 1E1)</td><td colspan="2">Transport Option<br />Native IP</td><td>Remark</td></tr>
<?php
$arr_dt_181 = array('User Plane', 'Control Plane');
for($i=0; $i <= 1; $i++){
	$dt_subchapter_18_1 = explode('|', $arr_subchapter_18_1[$i]->content);
	echo '<tr><td>'.$arr_dt_181[$i].'</td>';
	echo '<td align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_18_1[3]=='ATM') echo '_checked'; echo '.jpg"> ATM</td>';
	echo '<td align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_18_1[3]=='IpV4') echo '_checked'; echo '.jpg"> IpV4</td>';
	echo '<td align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_18_1[4]=='ATM') echo '_checked'; echo '.jpg"> ATM</td>';
	echo '<td align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_18_1[4]=='IpV4') echo '_checked'; echo '.jpg"> IpV4</td>';
	echo '<td align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_18_1[5]=='ATM') echo '_checked'; echo '.jpg"> ATM</td>';
	echo '<td align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_18_1[5]=='IpV4') echo '_checked'; echo '.jpg"> IpV4</td>';
	echo '<td>'.$this->ifunction->ifnull($dt_subchapter_18_1[6]).'</td></tr>';
}
?>
</table>
<p style="font-size:11px"><i>Note: - For Dual stack with one E1, make sure the active E1 is 2nd E1<br />- For Native IP, please contact OMC team to change the configuration (RBS and RNC)</i></p>

<hr />

<?php $Qsubchapter = $this->db->query("SELECT `subno_chapter`, `content` FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `chapter`='18' AND `no_chapter`='18.2' ORDER BY `subno_chapter_order` ASC"); foreach($Qsubchapter->result_object() as $subchapter) $arr_subchapter_18_2[$subchapter->subno_chapter -1]=$subchapter ?>

<h3>Chapter 18.2: Voice Test Call</h3>
<table class="border" cellpadding="0" cellspacing="0">
<tr class="header"><td width="60" rowspan="2">Item Test</td><td rowspan="2">MO<br />Number</td><td rowspan="2">MT<br />Number</td><td colspan="8">Test Call Result</td><td width="40" rowspan="2">Remark</td></tr>
<tr class="header"><td colspan="2">ATM</td><td colspan="2">Dual Stack (2E1)</td><td colspan="2">Dual Stack (1E1)</td><td colspan="2">Native IP</td></tr>
<?php
$arr_dt_182 = array('Mobile Originating', 'Mobile Terminating');
for($i=0; $i <= 1; $i++){
	$dt_subchapter_18_2 = explode('|', $arr_subchapter_18_2[$i]->content);
	echo '<tr><td>'.$arr_dt_182[$i].'</td>';
	echo '<td>'.$this->ifunction->ifnull($dt_subchapter_18_2[3]).'</td><td>'.$this->ifunction->ifnull($dt_subchapter_18_2[4]).'</td>';
	echo '<td width="35" align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_18_2[5]=='OK') echo '_checked'; echo '.jpg"> OK</td>';
	echo '<td width="35" align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_18_2[5]=='Not OK') echo '_checked'; echo '.jpg"> NOK</td>';
	echo '<td width="35" align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_18_2[6]=='OK') echo '_checked'; echo '.jpg"> OK</td>';
	echo '<td width="35" align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_18_2[6]=='Not OK') echo '_checked'; echo '.jpg"> NOK</td>';
	echo '<td width="35" align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_18_2[7]=='OK') echo '_checked'; echo '.jpg"> OK</td>';
	echo '<td width="35" align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_18_2[7]=='Not OK') echo '_checked'; echo '.jpg"> NOK</td>';
	echo '<td width="35" align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_18_2[8]=='OK') echo '_checked'; echo '.jpg"> OK</td>';
	echo '<td width="35" align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_18_2[8]=='Not OK') echo '_checked'; echo '.jpg"> NOK</td>';
	echo '<td>'.$this->ifunction->ifnull($dt_subchapter_18_2[9]).'&nbsp;</td></tr>';
}
?>
</table>

<?php $Qsubchapter = $this->db->query("SELECT `subno_chapter`, `content` FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `chapter`='18' AND `no_chapter`='18.3' ORDER BY `subno_chapter_order` ASC"); foreach($Qsubchapter->result_object() as $subchapter) $arr_subchapter_18_3[$subchapter->subno_chapter -1]=$subchapter ?>

<h3>Chapter 18.3: Video Test Call</h3>
<table class="border" cellpadding="0" cellspacing="0">
<tr class="header"><td width="60" rowspan="2">Item Test</td><td rowspan="2">MO<br />Number</td><td rowspan="2">MT<br />Number</td><td colspan="8">Test Call Result</td><td width="40" rowspan="2">Remark</td></tr>
<tr class="header"><td colspan="2">ATM</td><td colspan="2">Dual Stack (2E1)</td><td colspan="2">Dual Stack (1E1)</td><td colspan="2">Native IP</td></tr>
<?php
$arr_dt_183 = array('Mobile Originating', 'Mobile Terminating');
for($i=0; $i <= 1; $i++){
	$dt_subchapter_18_3 = explode('|', $arr_subchapter_18_3[$i]->content);
	echo '<tr><td>'.$arr_dt_183[$i].'</td>';
	echo '<td>'.$this->ifunction->ifnull($dt_subchapter_18_3[3]).'</td><td>'.$this->ifunction->ifnull($dt_subchapter_18_3[4]).'</td>';
	echo '<td width="35" align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_18_3[5]=='OK') echo '_checked'; echo '.jpg"> OK</td>';
	echo '<td width="35" align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_18_3[5]=='Not OK') echo '_checked'; echo '.jpg"> NOK</td>';
	echo '<td width="35" align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_18_3[6]=='OK') echo '_checked'; echo '.jpg"> OK</td>';
	echo '<td width="35" align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_18_3[6]=='Not OK') echo '_checked'; echo '.jpg"> NOK</td>';
	echo '<td width="35" align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_18_3[7]=='OK') echo '_checked'; echo '.jpg"> OK</td>';
	echo '<td width="35" align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_18_3[7]=='Not OK') echo '_checked'; echo '.jpg"> NOK</td>';
	echo '<td width="35" align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_18_3[8]=='OK') echo '_checked'; echo '.jpg"> OK</td>';
	echo '<td width="35" align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_18_3[8]=='Not OK') echo '_checked'; echo '.jpg"> NOK</td>';
	echo '<td>'.$this->ifunction->ifnull($dt_subchapter_18_3[9]).'&nbsp;</td></tr>';
}
?>
</table>

<?php $Qsubchapter = $this->db->query("SELECT `subno_chapter`, `content` FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `chapter`='18' AND `no_chapter`='18.4' ORDER BY `subno_chapter_order` ASC"); foreach($Qsubchapter->result_object() as $subchapter) $arr_subchapter_18_4[$subchapter->subno_chapter -1]=$subchapter ?>

<h3>Chapter 18.4: Packet Switch Test Call (R99)</h3>
<table class="border" cellpadding="0" cellspacing="0">
<tr class="header"><td width="60" rowspan="2">Item Test</td><td rowspan="2">MO<br />Number</td><td rowspan="2">Host<br />Address</td><td colspan="8">Test Call Result</td><td width="40" rowspan="2">Remark</td></tr>
<tr class="header"><td colspan="2">ATM</td><td colspan="2">Dual Stack (2E1)</td><td colspan="2">Dual Stack (1E1)</td><td colspan="2">Native IP</td></tr>
<?php
$arr_dt_184a = array('PING', 'WAP', 'HTTP', 'FTP DL', 'FTP UL', 'Streaming');
$arr_dt_184b = array('Delay', 'Throughput', 'Throughput', 'Throughput', 'Throughput', 'Throughput');

for($i=0; $i <= 5; $i++){
	$dt_subchapter_18_4 = explode('|', $arr_subchapter_18_4[$i]->content);
	echo '<tr><td>'.$arr_dt_184a[$i].'</td>';
	echo '<td>'.$this->ifunction->ifnull($dt_subchapter_18_4[3]).'</td><td>'.$this->ifunction->ifnull($dt_subchapter_18_4[4]).'</td>';
	echo '<td width="35" align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_18_4[5]=='OK') echo '_checked'; echo '.jpg"> OK</td>';
	echo '<td width="35" align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_18_4[5]=='Not OK') echo '_checked'; echo '.jpg"> NOK</td>';
	echo '<td width="35" align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_18_4[6]=='OK') echo '_checked'; echo '.jpg"> OK</td>';
	echo '<td width="35" align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_18_4[6]=='Not OK') echo '_checked'; echo '.jpg"> NOK</td>';
	echo '<td width="35" align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_18_4[7]=='OK') echo '_checked'; echo '.jpg"> OK</td>';
	echo '<td width="35" align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_18_4[7]=='Not OK') echo '_checked'; echo '.jpg"> NOK</td>';
	echo '<td width="35" align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_18_4[8]=='OK') echo '_checked'; echo '.jpg"> OK</td>';
	echo '<td width="35" align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_18_4[8]=='Not OK') echo '_checked'; echo '.jpg"> NOK</td>';
	echo '<td>'.$this->ifunction->ifnull($dt_subchapter_18_4[9]).'&nbsp;</td></tr>';
	
	echo '<tr><td colspan="3" align="right">'.$arr_dt_184b[$i].'</td><td colspan="2"></td><td colspan="2"></td><td colspan="2"></td><td colspan="2"></td><td></td></tr>';
}
/*$arr_dt_184 = array('PING', 'Delay', 'WAP', 'Throughput', 'HTTP', 'Throughput', 'FTP DL', 'Throughput', 'FTP UL', 'Throughput', 'Streaming', 'Throughput');
for($i=0; $i <= 11; $i++){
	$dt_subchapter_18_4 = explode('|', $arr_subchapter_18_4[$i]->content);
	if(($i==0)||($i==2)||($i==4)||($i==6)||($i==8)||($i==10)):
	echo '<tr><td>'.$arr_dt_184[$i].'</td>';
	echo '<td>'.$this->ifunction->ifnull($dt_subchapter_18_4[3]).'</td><td>'.$this->ifunction->ifnull($dt_subchapter_18_4[4]).'</td>';
	echo '<td width="35" align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_18_4[5]=='OK') echo '_checked'; echo '.jpg"> OK</td>';
	echo '<td width="35" align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_18_4[5]=='Not OK') echo '_checked'; echo '.jpg"> NOK</td>';
	echo '<td width="35" align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_18_4[6]=='OK') echo '_checked'; echo '.jpg"> OK</td>';
	echo '<td width="35" align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_18_4[6]=='Not OK') echo '_checked'; echo '.jpg"> NOK</td>';
	echo '<td width="35" align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_18_4[7]=='OK') echo '_checked'; echo '.jpg"> OK</td>';
	echo '<td width="35" align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_18_4[7]=='Not OK') echo '_checked'; echo '.jpg"> NOK</td>';
	echo '<td width="35" align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_18_4[8]=='OK') echo '_checked'; echo '.jpg"> OK</td>';
	echo '<td width="35" align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_18_4[8]=='Not OK') echo '_checked'; echo '.jpg"> NOK</td>';
	echo '<td>'.$this->ifunction->ifnull($dt_subchapter_18_4[9]).'&nbsp;</td></tr>';
	else:
	echo '<tr><td colspan="3" align="right">'.$arr_dt_184[$i].'</td>';
	echo '<td colspan="2">'.$this->ifunction->ifnull($dt_subchapter_18_4[3]).'</td>';
	echo '<td colspan="2">'.$this->ifunction->ifnull($dt_subchapter_18_4[4]).'</td>';
	echo '<td colspan="2">'.$this->ifunction->ifnull($dt_subchapter_18_4[5]).'</td>';
	echo '<td colspan="2">'.$this->ifunction->ifnull($dt_subchapter_18_4[6]).'</td>';
	echo '<td>'.$this->ifunction->ifnull($dt_subchapter_18_4[7]).'</td></tr>';
	endif;
}*/
?>
</table>

<?php $Qsubchapter = $this->db->query("SELECT `subno_chapter`, `content` FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `chapter`='18' AND `no_chapter`='18.5' ORDER BY `subno_chapter_order` ASC"); foreach($Qsubchapter->result_object() as $subchapter) $arr_subchapter_18_5[$subchapter->subno_chapter -1]=$subchapter;
$dt_subchapter_18_5 = explode('|', $arr_subchapter_18_5[0]->content);
$dt_subchapter_18_5c = explode('|', $arr_subchapter_18_5[13]->content) ?>

<h3 style="margin:0;padding:0">Chapter 18.5: HSPA Test Call</h3>
<table class="border" cellpadding="0" cellspacing="0">
<tr><td>Test scenario</td>
<td align="center"><img src="<?php echo base_url() ?>static/i/radio<?php if($dt_subchapter_18_5[3]=='3.6 Mbps') echo '_checked' ?>.jpg"> 3.6 Mbps</td>
<td align="center"><img src="<?php echo base_url() ?>static/i/radio<?php if($dt_subchapter_18_5[3]=='7.2 Mbps') echo '_checked' ?>.jpg"> 7.2 Mbps</td>
<td align="center"><img src="<?php echo base_url() ?>static/i/radio<?php if($dt_subchapter_18_5[3]=='14.4 Mbps') echo '_checked' ?>.jpg"> 14.4 Mbps</td></tr></table>
<p style="font-size:11px"><i>Note: Please tick the appropriate test scenario</i></p>

<table class="border" cellpadding="0" cellspacing="0">
<tr class="header"><td width="60" rowspan="2">Item Test</td><td rowspan="2">MO<br />Number</td><td rowspan="2">Host<br />Address</td><td colspan="8">Test Call Result</td><td width="40" rowspan="2">Remark</td></tr>
<tr class="header"><td colspan="2">ATM</td><td colspan="2">Dual Stack (2E1)</td><td colspan="2">Dual Stack (1E1)</td><td colspan="2">Native IP</td></tr>
<?php
$arr_dt_185a1 = array(1=> 'PING', 'WAP', 'HTTP');
$arr_dt_185a2 = array(1=> 'Delay', 'Throughput', 'Throughput');

for($i=1; $i <= 3; $i++){
	$dt_subchapter_18_5a = explode('|', $arr_subchapter_18_5[$i]->content);
	echo '<tr><td>'.$arr_dt_185a1[$i].'</td>';
	echo '<td>'.$this->ifunction->ifnull($dt_subchapter_18_5a[3]).'</td><td>'.$this->ifunction->ifnull($dt_subchapter_18_5a[4]).'</td>';
	echo '<td width="35" align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_18_5a[5]=='OK') echo '_checked'; echo '.jpg"> OK</td>';
	echo '<td width="35" align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_18_5a[5]=='Not OK') echo '_checked'; echo '.jpg"> NOK</td>';
	echo '<td width="35" align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_18_5a[6]=='OK') echo '_checked'; echo '.jpg"> OK</td>';
	echo '<td width="35" align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_18_5a[6]=='Not OK') echo '_checked'; echo '.jpg"> NOK</td>';
	echo '<td width="35" align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_18_5a[7]=='OK') echo '_checked'; echo '.jpg"> OK</td>';
	echo '<td width="35" align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_18_5a[7]=='Not OK') echo '_checked'; echo '.jpg"> NOK</td>';
	echo '<td width="35" align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_18_5a[8]=='OK') echo '_checked'; echo '.jpg"> OK</td>';
	echo '<td width="35" align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_18_5a[8]=='Not OK') echo '_checked'; echo '.jpg"> NOK</td>';
	echo '<td>'.$this->ifunction->ifnull($dt_subchapter_18_5a[9]).'&nbsp;</td></tr>';
	
	echo '<tr><td colspan="3" align="right">'.$arr_dt_185a2[$i].'</td><td colspan="2"></td><td colspan="2"></td><td colspan="2"></td><td colspan="2"></td><td></td></tr>';
}
/*$arr_dt_185a = array(1=> 'PING', 'Delay', 'WAP', 'Throughput', 'HTTP', 'Throughput');
for($i=1; $i <= 6; $i++){
	$dt_subchapter_18_5a = explode('|', $arr_subchapter_18_5[$i]->content);
	if(($i==1)||($i==3)||($i==5)):
	echo '<tr><td>'.$arr_dt_185a[$i].'</td>';
	echo '<td>'.$this->ifunction->ifnull($dt_subchapter_18_5a[3]).'</td><td>'.$this->ifunction->ifnull($dt_subchapter_18_5a[4]).'</td>';
	echo '<td width="35" align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_18_5a[5]=='OK') echo '_checked'; echo '.jpg"> OK</td>';
	echo '<td width="35" align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_18_5a[5]=='Not OK') echo '_checked'; echo '.jpg"> NOK</td>';
	echo '<td width="35" align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_18_5a[6]=='OK') echo '_checked'; echo '.jpg"> OK</td>';
	echo '<td width="35" align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_18_5a[6]=='Not OK') echo '_checked'; echo '.jpg"> NOK</td>';
	echo '<td width="35" align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_18_5a[7]=='OK') echo '_checked'; echo '.jpg"> OK</td>';
	echo '<td width="35" align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_18_5a[7]=='Not OK') echo '_checked'; echo '.jpg"> NOK</td>';
	echo '<td width="35" align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_18_5a[8]=='OK') echo '_checked'; echo '.jpg"> OK</td>';
	echo '<td width="35" align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_18_5a[8]=='Not OK') echo '_checked'; echo '.jpg"> NOK</td>';
	echo '<td>'.$this->ifunction->ifnull($dt_subchapter_18_5a[9]).'&nbsp;</td></tr>';
	else:
	echo '<tr><td colspan="3" align="right">'.$arr_dt_185a[$i].'</td>';
	echo '<td colspan="2">'.$this->ifunction->ifnull($dt_subchapter_18_5a[3]).'</td>';
	echo '<td colspan="2">'.$this->ifunction->ifnull($dt_subchapter_18_5a[4]).'</td>';
	echo '<td colspan="2">'.$this->ifunction->ifnull($dt_subchapter_18_5a[5]).'</td>';
	echo '<td colspan="2">'.$this->ifunction->ifnull($dt_subchapter_18_5a[6]).'</td>';
	echo '<td>'.$this->ifunction->ifnull($dt_subchapter_18_5a[7]).'</td></tr>';
	endif;
}*/
?>
</table>

<hr />

<table class="border" cellpadding="0" cellspacing="0">
<?php

$arr_dt_185b1 = array(4=> 'FTP DL', 'FTP UL', 'Streaming');
$arr_dt_185b2 = array(4=> 'Throughput', 'Throughput', 'Throughput');

for($i=4; $i <= 6; $i++){
	$dt_subchapter_18_5b = explode('|', $arr_subchapter_18_5[$i]->content);
	echo '<tr><td width="60">'.$arr_dt_185b1[$i].'</td>';
	echo '<td>'.$this->ifunction->ifnull($dt_subchapter_18_5b[3]).'</td><td>'.$this->ifunction->ifnull($dt_subchapter_18_5b[4]).'</td>';
	echo '<td width="35" align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_18_5b[5]=='OK') echo '_checked'; echo '.jpg"> OK</td>';
	echo '<td width="35" align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_18_5b[5]=='Not OK') echo '_checked'; echo '.jpg"> NOK</td>';
	echo '<td width="35" align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_18_5b[6]=='OK') echo '_checked'; echo '.jpg"> OK</td>';
	echo '<td width="35" align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_18_5b[6]=='Not OK') echo '_checked'; echo '.jpg"> NOK</td>';
	echo '<td width="35" align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_18_5b[7]=='OK') echo '_checked'; echo '.jpg"> OK</td>';
	echo '<td width="35" align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_18_5b[7]=='Not OK') echo '_checked'; echo '.jpg"> NOK</td>';
	echo '<td width="35" align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_18_5b[8]=='OK') echo '_checked'; echo '.jpg"> OK</td>';
	echo '<td width="35" align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_18_5b[8]=='Not OK') echo '_checked'; echo '.jpg"> NOK</td>';
	echo '<td width="40">'.$this->ifunction->ifnull($dt_subchapter_18_5b[9]).'&nbsp;</td></tr>';
	
	echo '<tr><td colspan="3" align="right">'.$arr_dt_185b2[$i].'</td><td colspan="2"></td><td colspan="2"></td><td colspan="2"></td><td colspan="2"></td><td></td></tr>';
}
/*$arr_dt_185b = array(7=> 'FTP DL', 'Throughput', 'FTP UL', 'Throughput', 'Streaming', 'Throughput');
for($i=7; $i <= 12; $i++){
	$dt_subchapter_18_5b = explode('|', $arr_subchapter_18_5[$i]->content);
	if(($i==7)||($i==9)||($i==11)):
	echo '<tr><td width="60">'.$arr_dt_185b[$i].'</td>';
	echo '<td>'.$this->ifunction->ifnull($dt_subchapter_18_5b[3]).'</td><td>'.$this->ifunction->ifnull($dt_subchapter_18_5b[4]).'</td>';
	echo '<td width="35" align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_18_5b[5]=='OK') echo '_checked'; echo '.jpg"> OK</td>';
	echo '<td width="35" align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_18_5b[5]=='Not OK') echo '_checked'; echo '.jpg"> NOK</td>';
	echo '<td width="35" align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_18_5b[6]=='OK') echo '_checked'; echo '.jpg"> OK</td>';
	echo '<td width="35" align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_18_5b[6]=='Not OK') echo '_checked'; echo '.jpg"> NOK</td>';
	echo '<td width="35" align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_18_5b[7]=='OK') echo '_checked'; echo '.jpg"> OK</td>';
	echo '<td width="35" align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_18_5b[7]=='Not OK') echo '_checked'; echo '.jpg"> NOK</td>';
	echo '<td width="35" align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_18_5b[8]=='OK') echo '_checked'; echo '.jpg"> OK</td>';
	echo '<td width="35" align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_18_5b[8]=='Not OK') echo '_checked'; echo '.jpg"> NOK</td>';
	echo '<td width="40">'.$this->ifunction->ifnull($dt_subchapter_18_5b[9]).'&nbsp;</td></tr>';
	else:
	echo '<tr><td colspan="3" align="right">'.$arr_dt_185b[$i].'</td>';
	echo '<td colspan="2">'.$this->ifunction->ifnull($dt_subchapter_18_5b[3]).'</td>';
	echo '<td colspan="2">'.$this->ifunction->ifnull($dt_subchapter_18_5b[4]).'</td>';
	echo '<td colspan="2">'.$this->ifunction->ifnull($dt_subchapter_18_5b[5]).'</td>';
	echo '<td colspan="2">'.$this->ifunction->ifnull($dt_subchapter_18_5b[6]).'</td>';
	echo '<td>'.$this->ifunction->ifnull($dt_subchapter_18_5b[7]).'</td></tr>';
	endif;
}*/
?>
</table>

<h3>Throughput result will close to this value.</h3>
<table class="border" cellpadding="0" cellspacing="0">
<tr><td>Downlink</td><td>Up to 3.6 Mbps</td><td>Up to 7.2 Mbps </td><td>Up to 14.4 Mbps</td></tr>
<tr><td>Uplink</td><td>Up to 384 Kbps</td><td>Up to 1.4 Mbps </td><td></td><?php echo $dt_subchapter_18_5c[3] ?></tr></table>
<p style="font-size:11px"><i>Note: The throughput value can't be guaranteed since the network is commercial already.</i></p>

<?php $Qsubchapter = $this->db->query("SELECT `subno_chapter`, `content` FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `chapter`='18' AND `no_chapter`='18.6' ORDER BY `subno_chapter_order` ASC"); foreach($Qsubchapter->result_object() as $subchapter) $arr_subchapter_18_6[$subchapter->subno_chapter -1]=$subchapter;
$dt_subchapter_18_6 = explode('|', $arr_subchapter_18_6[0]->content) ?>

<h3 style="margin:0;padding:0">Chapter 18.6 : Test Actual and PMR Capture Result</h3>
<table class="border" cellpadding="0" cellspacing="0">
<tr class="header"><td>Item Test</td><td>Throughput</td><td>Log Throughput (kbps)</td><td>UE code</td></tr>
<tr><td>HSDPA Throughput</td><td><?php echo $this->ifunction->ifnull($dt_subchapter_18_6[3]) ?></td><td><?php echo $this->ifunction->ifnull($dt_subchapter_18_6[4]) ?></td><td><?php echo $this->ifunction->ifnull($dt_subchapter_18_6[5]) ?></td></tr></table>
<p style="font-size:11px"><i>Note: The value collect from test actual and PMR after download during ATP and reach HSDPA throughput. Capture data must be attach.</i></p>

<?php $Qsubchapter = $this->db->query("SELECT `subno_chapter`, `content` FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `chapter`='18' AND `no_chapter`='18.7' ORDER BY `subno_chapter_order` ASC"); foreach($Qsubchapter->result_object() as $subchapter) $arr_subchapter_18_7[$subchapter->subno_chapter -1]=$subchapter ?>

<h3 style="margin:0;padding:0">Chapter 18.7: SMS Test Call</h3>
<table class="border" cellpadding="0" cellspacing="0">
<tr class="header"><td width="60" rowspan="2">Item Test</td><td rowspan="2">MO<br />Number</td><td rowspan="2">MT<br />Number</td><td colspan="8">Test Call Result</td><td width="40" rowspan="2">Remark</td></tr>
<tr class="header"><td colspan="2">ATM</td><td colspan="2">Dual Stack (2E1)</td><td colspan="2">Dual Stack (1E1)</td><td colspan="2">Native IP</td></tr>
<?php
$arr_dt_187 = array('Mobile Originating', 'Mobile Terminating');
for($i=0; $i <= 1; $i++){
	$dt_subchapter_18_7 = explode('|', $arr_subchapter_18_7[$i]->content);
	echo '<tr><td>'.$arr_dt_187[$i].'</td>';
	echo '<td>'.$this->ifunction->ifnull($dt_subchapter_18_7[3]).'</td><td>'.$this->ifunction->ifnull($dt_subchapter_18_7[4]).'</td>';
	echo '<td width="35" align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_18_7[5]=='OK') echo '_checked'; echo '.jpg"> OK</td>';
	echo '<td width="35" align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_18_7[5]=='Not OK') echo '_checked'; echo '.jpg"> NOK</td>';
	echo '<td width="35" align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_18_7[6]=='OK') echo '_checked'; echo '.jpg"> OK</td>';
	echo '<td width="35" align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_18_7[6]=='Not OK') echo '_checked'; echo '.jpg"> NOK</td>';
	echo '<td width="35" align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_18_7[7]=='OK') echo '_checked'; echo '.jpg"> OK</td>';
	echo '<td width="35" align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_18_7[7]=='Not OK') echo '_checked'; echo '.jpg"> NOK</td>';
	echo '<td width="35" align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_18_7[8]=='OK') echo '_checked'; echo '.jpg"> OK</td>';
	echo '<td width="35" align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_18_7[8]=='Not OK') echo '_checked'; echo '.jpg"> NOK</td>';
	echo '<td>'.$this->ifunction->ifnull($dt_subchapter_18_7[9]).'&nbsp;</td></tr>';
}
?>
</table>

<?php $Qsubchapter = $this->db->query("SELECT `subno_chapter`, `content` FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `chapter`='18' AND `no_chapter`='18.8' ORDER BY `subno_chapter_order` ASC"); foreach($Qsubchapter->result_object() as $subchapter) $arr_subchapter_18_8[$subchapter->subno_chapter -1]=$subchapter ?>

<h3>Chapter 18.8: MMS Test Call</h3>
<table class="border" cellpadding="0" cellspacing="0">
<tr class="header"><td width="60" rowspan="2">Item Test</td><td rowspan="2">MO<br />Number</td><td rowspan="2">MT<br />Number</td><td colspan="8">Test Call Result</td><td width="40" rowspan="2">Remark</td></tr>
<tr class="header"><td colspan="2">ATM</td><td colspan="2">Dual Stack (2E1)</td><td colspan="2">Dual Stack (1E1)</td><td colspan="2">Native IP</td></tr>
<?php
$arr_dt_188 = array('Mobile Originating', 'Mobile Terminating');
for($i=0; $i <= 1; $i++){
	$dt_subchapter_18_8 = explode('|', $arr_subchapter_18_8[$i]->content);
	echo '<tr><td>'.$arr_dt_188[$i].'</td>';
	echo '<td>'.$this->ifunction->ifnull($dt_subchapter_18_8[3]).'</td><td>'.$this->ifunction->ifnull($dt_subchapter_18_8[4]).'</td>';
	echo '<td width="35" align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_18_8[5]=='OK') echo '_checked'; echo '.jpg"> OK</td>';
	echo '<td width="35" align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_18_8[5]=='Not OK') echo '_checked'; echo '.jpg"> NOK</td>';
	echo '<td width="35" align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_18_8[6]=='OK') echo '_checked'; echo '.jpg"> OK</td>';
	echo '<td width="35" align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_18_8[6]=='Not OK') echo '_checked'; echo '.jpg"> NOK</td>';
	echo '<td width="35" align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_18_8[7]=='OK') echo '_checked'; echo '.jpg"> OK</td>';
	echo '<td width="35" align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_18_8[7]=='Not OK') echo '_checked'; echo '.jpg"> NOK</td>';
	echo '<td width="35" align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_18_8[8]=='OK') echo '_checked'; echo '.jpg"> OK</td>';
	echo '<td width="35" align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_18_8[8]=='Not OK') echo '_checked'; echo '.jpg"> NOK</td>';
	echo '<td>'.$this->ifunction->ifnull($dt_subchapter_18_8[9]).'&nbsp;</td></tr>';
}
?>
</table>

<?php $Qsubchapter = $this->db->query("SELECT `subno_chapter`, `content` FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `chapter`='18' AND `no_chapter`='18.9' ORDER BY `subno_chapter_order` ASC"); foreach($Qsubchapter->result_object() as $subchapter) $arr_subchapter_18_9[$subchapter->subno_chapter -1]=$subchapter ?>

<h3>Chapter 18.9: Incoming & Outgoing Handover Test (SOFTER / SOFT HANDOVER)</h3>
<table class="border" cellpadding="0" cellspacing="0">
<tr class="header" style="font-size:10px"><td width="50" rowspan="2">Item Test</td><td colspan="2">Ori</td><td colspan="2">Dest</td><td colspan="8">Test Call Result</td><td width="40" rowspan="2">Remark</td></tr>
<tr class="header" style="font-size:10px"><td style="font-size:9px" width="15">RNC<br />Id</td><td style="font-size:9px" width="15">Cell<br />Id</td><td style="font-size:9px" width="15">RNC<br />Id</td><td style="font-size:9px" width="15">Cell<br />Id</td><td colspan="2" width="60">ATM</td><td colspan="2" width="60">Dual Stack<br />(2E1)</td><td colspan="2" width="60">Dual Stack<br />(1E1)</td><td colspan="2" width="60">Native IP</td></tr>
</table>
<table class="border" cellpadding="0" cellspacing="0">
<?php
$arr_dt_189a = array('In HO', 'Out HO', 'In HO', 'Out HO');
for($i=0; $i <= 3; $i++){
	$dt_subchapter_18_9a = explode('|', $arr_subchapter_18_9[$i]->content);
	
	if($i==0) echo '<tr><td colspan="14"><b>SECTOR 1</b></td></tr>'; elseif ($i==2) echo '<tr><td colspan="14"><b>SECTOR 2</b></td></tr>';
	
	echo '<tr><td width="50">'.$arr_dt_189a[$i].'</td>';
	echo '<td width="15">'.$this->ifunction->ifnull($dt_subchapter_18_9a[3]).'&nbsp;</td><td width="15">'.$this->ifunction->ifnull($dt_subchapter_18_9a[4]).'&nbsp;</td>';
	echo '<td width="15">'.$this->ifunction->ifnull($dt_subchapter_18_9a[5]).'&nbsp;</td><td width="15">'.$this->ifunction->ifnull($dt_subchapter_18_9a[6]).'&nbsp;</td>';
	echo '<td width="30" align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_18_9a[7]=='OK') echo '_checked'; echo '.jpg"> OK</td>';
	echo '<td width="30" align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_18_9a[7]=='Not OK') echo '_checked'; echo '.jpg"> NOK</td>';
	echo '<td width="30" align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_18_9a[8]=='OK') echo '_checked'; echo '.jpg"> OK</td>';
	echo '<td width="30" align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_18_9a[8]=='Not OK') echo '_checked'; echo '.jpg"> NOK</td>';
	echo '<td width="30" align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_18_9a[9]=='OK') echo '_checked'; echo '.jpg"> OK</td>';
	echo '<td width="30" align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_18_9a[9]=='Not OK') echo '_checked'; echo '.jpg"> NOK</td>';
	echo '<td width="30" align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_18_9a[10]=='OK') echo '_checked'; echo '.jpg"> OK</td>';
	echo '<td width="30" align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_18_9a[10]=='Not OK') echo '_checked'; echo '.jpg"> NOK</td>';
	echo '<td width="40">'.$this->ifunction->ifnull($dt_subchapter_18_9a[11]).'&nbsp;</td></tr>';
}
?>
</table>

<hr />

<table class="border" cellpadding="0" cellspacing="0">
<?php
$arr_dt_189b = array(4=> 'In HO', 'Out HO', 'In HO', 'Out HO', 'In HO', 'Out HO', 'In HO', 'Out HO');
for($i=4; $i <= 11; $i++){
	$dt_subchapter_18_9b = explode('|', $arr_subchapter_18_9[$i]->content);
	
	if($i==4) echo '<tr><td colspan="14"><b>SECTOR 3</b></td></tr>'; elseif ($i==6) echo '<tr><td colspan="14"><b>SECTOR 4</b></td></tr>';  elseif ($i==8) echo '<tr><td colspan="14"><b>SECTOR 5</b></td></tr>';  elseif ($i==10) echo '<tr><td colspan="14"><b>SECTOR 6</b></td></tr>';
	
	echo '<tr><td width="50">'.$arr_dt_189b[$i].'</td>';
	echo '<td width="15">'.$this->ifunction->ifnull($dt_subchapter_18_9b[3]).'&nbsp;</td><td width="15">'.$this->ifunction->ifnull($dt_subchapter_18_9b[4]).'&nbsp;</td>';
	echo '<td width="15">'.$this->ifunction->ifnull($dt_subchapter_18_9b[5]).'&nbsp;</td><td width="15">'.$this->ifunction->ifnull($dt_subchapter_18_9b[6]).'&nbsp;</td>';
	echo '<td width="30" align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_18_9b[7]=='OK') echo '_checked'; echo '.jpg"> OK</td>';
	echo '<td width="30" align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_18_9b[7]=='Not OK') echo '_checked'; echo '.jpg"> NOK</td>';
	echo '<td width="30" align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_18_9b[8]=='OK') echo '_checked'; echo '.jpg"> OK</td>';
	echo '<td width="30" align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_18_9b[8]=='Not OK') echo '_checked'; echo '.jpg"> NOK</td>';
	echo '<td width="30" align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_18_9b[9]=='OK') echo '_checked'; echo '.jpg"> OK</td>';
	echo '<td width="30" align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_18_9b[9]=='Not OK') echo '_checked'; echo '.jpg"> NOK</td>';
	echo '<td width="30" align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_18_9b[10]=='OK') echo '_checked'; echo '.jpg"> OK</td>';
	echo '<td width="30" align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_18_9b[10]=='Not OK') echo '_checked'; echo '.jpg"> NOK</td>';
	echo '<td width="40">'.$this->ifunction->ifnull($dt_subchapter_18_9b[11]).'&nbsp;</td></tr>';
}
?>
</table>

<?php $Qsubchapter = $this->db->query("SELECT `subno_chapter`, `content` FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `chapter`='18' AND `no_chapter`='18.10' ORDER BY `subno_chapter_order` ASC"); foreach($Qsubchapter->result_object() as $subchapter) $arr_subchapter_18_10[$subchapter->subno_chapter -1]=$subchapter ?>

<h3>Chapter 18.10: Emergency Test Call</h3>
<table class="border" cellpadding="0" cellspacing="0">
<tr class="header"><td width="50" rowspan="2">Item Test</td><td rowspan="2">MO<br />Number</td><td rowspan="2">MT<br />Number</td><td colspan="8">Test Call Result</td><td width="60" rowspan="2">Remark</td></tr>
<tr class="header"><td colspan="2">ATM</td><td colspan="2">Dual Stack (2E1)</td><td colspan="2">Dual Stack (1E1)</td><td colspan="2">Native IP</td></tr>
<?php
$arr_dt_1810 = array('112', '118');
for($i=0; $i <= 1; $i++){
	$dt_subchapter_18_10 = explode('|', $arr_subchapter_18_10[$i]->content);
	echo '<tr><td align="center">'.$arr_dt_1810[$i].'</td>';
	echo '<td>'.$this->ifunction->ifnull($dt_subchapter_18_10[3]).'</td><td>'.$this->ifunction->ifnull($dt_subchapter_18_10[4]).'</td>';
	echo '<td width="35" align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_18_10[5]=='OK') echo '_checked'; echo '.jpg"> OK</td>';
	echo '<td width="35" align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_18_10[5]=='Not OK') echo '_checked'; echo '.jpg"> NOK</td>';
	echo '<td width="35" align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_18_10[6]=='OK') echo '_checked'; echo '.jpg"> OK</td>';
	echo '<td width="35" align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_18_10[6]=='Not OK') echo '_checked'; echo '.jpg"> NOK</td>';
	echo '<td width="35" align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_18_10[7]=='OK') echo '_checked'; echo '.jpg"> OK</td>';
	echo '<td width="35" align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_18_10[7]=='Not OK') echo '_checked'; echo '.jpg"> NOK</td>';
	echo '<td width="35" align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_18_10[8]=='OK') echo '_checked'; echo '.jpg"> OK</td>';
	echo '<td width="35" align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_18_10[8]=='Not OK') echo '_checked'; echo '.jpg"> NOK</td>';
	echo '<td width="40">'.$this->ifunction->ifnull($dt_subchapter_18_10[9]).'&nbsp;</td></tr>';
}
?>
</table>

<?php $Qsubchapter = $this->db->query("SELECT `subno_chapter`, `content` FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `chapter`='18' AND `no_chapter`='18.11' ORDER BY `subno_chapter_order` ASC"); foreach($Qsubchapter->result_object() as $subchapter) $arr_subchapter_18_11[$subchapter->subno_chapter -1]=$subchapter;
$dt_subchapter_18_11a = explode('|', $arr_subchapter_18_11[3]->content);
$dt_subchapter_18_11b = explode('|', $arr_subchapter_18_11[4]->content);?>

<h3>Chapter 18.11: IMA Bandwidth Adaptation Test</h3>
<table class="border" cellpadding="0" cellspacing="0">
<tr class="header"><!--td colspan="10"--><td colspan="9">NODE B Network Synchronization Connection Check</td></tr>
<tr class="header"><!--td>No</td--><td>Item Check</td><td>E1</td><td>E2</td><td>E3</td><td>E4</td><td>E5</td><td>E6</td><td>E7</td><td>E8</td></tr>
<?php
$arr_dt_1811 = array('Synchronization State (Enable/Disable/NA)', 'Synchronization Priority (1-8)', 'Result Check (OK/NOK/NA)');
for($i=0; $i <= 2; $i++){
	$dt_subchapter_18_11 = explode('|', $arr_subchapter_18_11[$i]->content);
	//<td width="30" align="center">'.($i +1).'</td>
	echo '<tr><td width="290">'.$arr_dt_1811[$i].'</td>';
	echo '<td>'.$this->ifunction->ifnull($dt_subchapter_18_11[3]).'</td><td>'.$this->ifunction->ifnull($dt_subchapter_18_11[4]).'</td><td>'.$this->ifunction->ifnull($dt_subchapter_18_11[5]).'</td><td>'.$this->ifunction->ifnull($dt_subchapter_18_11[6]).'</td><td>'.$this->ifunction->ifnull($dt_subchapter_18_11[7]).'</td><td>'.$this->ifunction->ifnull($dt_subchapter_18_11[8]).'</td><td>'.$this->ifunction->ifnull($dt_subchapter_18_11[9]).'</td><td>'.$this->ifunction->ifnull($dt_subchapter_18_11[10]).'</td></tr>';
}
?>
<tr><!--td rowspan="3" align="center">4</td--><td align="center"><b>NTP  Server Check</b></td><td colspan="5" align="center"><b>Time Stamp</b></td><td colspan="3" align="center"><b>Status</b></td></tr>
<tr><td>Server 0 : 10.145.140.36</td><td colspan="5" align="center"><?php echo $this->ifunction->ifnull($dt_subchapter_18_11a[3]) ?></td><td colspan="3"><img src="<?php echo base_url() ?>static/i/radio<?php if($dt_subchapter_18_11a[4]=='OK') echo '_checked' ?>.jpg"> OK <span style="padding:0 5px">&nbsp;</span> <img src="<?php echo base_url() ?>static/i/radio<?php if($dt_subchapter_18_11a[4]=='Not OK') echo '_checked' ?>.jpg"> NOK</td></tr>
<tr><td>Server 0 : 10.145.140.38</td><td colspan="5" align="center"><?php echo $this->ifunction->ifnull($dt_subchapter_18_11b[3]) ?></td><td colspan="3"><img src="<?php echo base_url() ?>static/i/radio<?php if($dt_subchapter_18_11b[4]=='OK') echo '_checked' ?>.jpg"> OK <span style="padding:0 5px">&nbsp;</span> <img src="<?php echo base_url() ?>static/i/radio<?php if($dt_subchapter_18_11b[4]=='Not OK') echo '_checked' ?>.jpg"> NOK</td></tr>
</table>
<p style="font-size:11px"><i>Note: All Connected or Available E1 links should be used for Network Synchronization</i></p>

<?php $Qsubchapter = $this->db->query("SELECT `subno_chapter`, `content` FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `chapter`='18' AND `no_chapter`='18.12' ORDER BY `subno_chapter_order` ASC"); foreach($Qsubchapter->result_object() as $subchapter) $arr_subchapter_18_12[$subchapter->subno_chapter -1]=$subchapter ?>

<h3>Chapter 18.12: Synchronization Test for Dual Stack and Native IP configuration</h3>
<table class="border" cellpadding="0" cellspacing="0" style="font-size:11px">
<tr class="header"><td rowspan="3" width="100">Item Test</td><td colspan="9">Network Syncronization</td><td rowspan="3" width="50">Remark</td></tr>
<tr class="header"><td colspan="3">Dual Stack (2E1)</td><td colspan="3">Dual Stack (1E1)</td><td colspan="3">Native IP</td></tr>
<tr class="header"><td>Sync<br />priority</td><td colspan="2" width="65">Sync State</td><td>Sync<br />priority</td><td colspan="2" width="65">Sync State</td><td>Sync<br />priority</td><td colspan="2" width="65">Sync State</td></tr>
</table>
<table class="border" cellpadding="0" cellspacing="0" style="font-size:11px">
<?php
$arr_dt_1812 = array('E1 - 1', 'E1 - 2', 'IpSyncRef:1', 'IpSyncRef:2');
for($i=0; $i <= 3; $i++){
	$dt_subchapter_18_12 = explode('|', $arr_subchapter_18_12[$i]->content);
	echo '<tr><td width="100">'.$arr_dt_1812[$i].'</td>';
	echo '<td>'.$this->ifunction->ifnull($dt_subchapter_18_12[3]).'</td><td width="30" align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_18_12[4]=='OK') echo '_checked'; echo '.jpg"> OK</td><td width="30" align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_18_12[4]=='Not OK') echo '_checked'; echo '.jpg"> NOK</td>';
	echo '<td>'.$this->ifunction->ifnull($dt_subchapter_18_12[5]).'</td><td width="30" align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_18_12[6]=='OK') echo '_checked'; echo '.jpg"> OK</td><td width="30" align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_18_12[6]=='Not OK') echo '_checked'; echo '.jpg"> NOK</td>';
	echo '<td>'.$this->ifunction->ifnull($dt_subchapter_18_12[7]).'</td><td width="30" align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_18_12[8]=='OK') echo '_checked'; echo '.jpg"> OK</td><td width="30" align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_18_12[8]=='Not OK') echo '_checked'; echo '.jpg"> NOK</td>';
	echo '<td width="50">'.$this->ifunction->ifnull($dt_subchapter_18_12[9]).'&nbsp;</td></tr>';
}
?>
</table>

<hr />

<table class="border" cellpadding="0" cellspacing="0" style="font-size:11px">
<tr><td align="center"><b>NTP Server Check</b></td><td align="center"><b>Time Stamp</b></td><td colspan="2" align="center"><b>Status</b></td><td align="center"><b>Time Stamp</b></td><td colspan="2" align="center"><b>Status</b></td><td align="center"><b>Time Stamp</b></td><td colspan="2" align="center"><b>Status</b></td><td></td></tr>
<?php
$arr_dt_1812a = array(4=> 'Server 0 : 10.145.140.36', 'Server 0 : 10.145.140.38');
for($i=4; $i <= 5; $i++){
	$dt_subchapter_18_12a = explode('|', $arr_subchapter_18_12[$i]->content);
	echo '<tr><td width="100">'.$arr_dt_1812a[$i].'</td>';
	echo '<td>'.$this->ifunction->ifnull($dt_subchapter_18_12a[3]).'</td><td width="30" align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_18_12a[4]=='OK') echo '_checked'; echo '.jpg"> OK</td><td width="30" align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_18_12a[4]=='Not OK') echo '_checked'; echo '.jpg"> NOK</td>';
	echo '<td>'.$this->ifunction->ifnull($dt_subchapter_18_12a[5]).'</td><td width="30" align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_18_12a[6]=='OK') echo '_checked'; echo '.jpg"> OK</td><td width="30" align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_18_12a[6]=='Not OK') echo '_checked'; echo '.jpg"> NOK</td>';
	echo '<td>'.$this->ifunction->ifnull($dt_subchapter_18_12a[7]).'</td><td width="30" align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_18_12a[8]=='OK') echo '_checked'; echo '.jpg"> OK</td><td width="30" align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_18_12a[8]=='Not OK') echo '_checked'; echo '.jpg"> NOK</td>';
	echo '<td width="50">'.$this->ifunction->ifnull($dt_subchapter_18_12a[9]).'&nbsp;</td></tr>';
}
?>
</table>

<?php $Qsubchapter = $this->db->query("SELECT `subno_chapter`, `content` FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `chapter`='18' AND `no_chapter`='18.13' ORDER BY `subno_chapter_order` ASC"); foreach($Qsubchapter->result_object() as $subchapter) $arr_subchapter_18_13[$subchapter->subno_chapter -1]=$subchapter ?>

<h3>Chapter 18.13: OAM Link ATM & IP Connectivity to OSS Test</h3>
<table class="border" cellpadding="0" cellspacing="0" style="font-size:11px">
<tr class="header"><td rowspan="3" width="100">Item Test</td><td colspan="9">OAM Link ATM & IP Connectivity to OSS Test</td><td rowspan="3" width="50">Remark</td></tr>
<tr class="header"><td colspan="3">Dual Stack (2E1)</td><td colspan="3">Dual Stack (1E1)</td><td colspan="3">Native IP</td></tr>
<tr class="header"><td>IP<br />address</td><td colspan="2" width="65">Status</td><td>IP<br />address</td><td colspan="2" width="65">Status</td><td>IP<br />address</td><td colspan="2" width="65">Status</td></tr>
</table>
<table class="border" cellpadding="0" cellspacing="0" style="font-size:11px">
<?php
$arr_dt_1813a = array('Ping to OSS (10.145.140.40)', 'Trace Route to OSS (10.145.140.40)');
$arr_dt_1813b = array('OSS IP addr', 'NextHop Addr Mub-A');
$arr_dt_1813c = array('OSS IP addr', 'NextHop Addr Mub-B');
$arr_dt_1813d = array('OSS IP addr', 'NextHop Addr Mub-C');
for($i=0; $i <= 1; $i++){
	$dt_subchapter_18_13 = explode('|', $arr_subchapter_18_13[$i]->content);
	echo '<tr><td width="100">'.$arr_dt_1813a[$i].'</td>';
	echo '<td><i>'.$arr_dt_1813b[$i].'</i></td><td width="30" align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_18_13[3]=='OK') echo '_checked'; echo '.jpg"> OK</td><td width="30" align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_18_13[3]=='Not OK') echo '_checked'; echo '.jpg"> NOK</td>';
	echo '<td><i>'.$arr_dt_1813c[$i].'</i></td><td width="30" align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_18_13[4]=='OK') echo '_checked'; echo '.jpg"> OK</td><td width="30" align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_18_13[4]=='Not OK') echo '_checked'; echo '.jpg"> NOK</td>';
	echo '<td><i>'.$arr_dt_1813d[$i].'</i></td><td width="30" align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_18_13[5]=='OK') echo '_checked'; echo '.jpg"> OK</td><td width="30" align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_18_13[5]=='Not OK') echo '_checked'; echo '.jpg"> NOK</td>';
	echo '<td width="50">'.$this->ifunction->ifnull($dt_subchapter_18_13[6]).'&nbsp;</td></tr>';
}
?>
</table>

<?php $Qsubchapter = $this->db->query("SELECT `subno_chapter`, `content` FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `chapter`='18' AND `no_chapter`='18.14' ORDER BY `subno_chapter_order` ASC"); foreach($Qsubchapter->result_object() as $subchapter) $arr_subchapter_18_14[$subchapter->subno_chapter -1]=$subchapter;
$dt_subchapter_18_14a = explode('|', $arr_subchapter_18_14[0]->content);
$dt_subchapter_18_14b = explode('|', $arr_subchapter_18_14[1]->content);
$dt_subchapter_18_14c = explode('|', $arr_subchapter_18_14[2]->content);
$dt_subchapter_18_14d = explode('|', $arr_subchapter_18_14[3]->content);
$dt_subchapter_18_14e = explode('|', $arr_subchapter_18_14[4]->content);
$dt_subchapter_18_14f = explode('|', $arr_subchapter_18_14[5]->content);
$dt_subchapter_18_14g = explode('|', $arr_subchapter_18_14[6]->content);
$dt_subchapter_18_14h = explode('|', $arr_subchapter_18_14[7]->content);?>

<h3>Chapter 18.14: IMA Bandwidth Adaptation Functionality Test</h3>
<table class="border" cellpadding="0" cellspacing="0">
<tr class="header"><td rowspan="2">No</td><td colspan="8">Link Connect State Test</td><td colspan="4">Call Connect State Check</td><td colspan="3">IMA Group State</td></tr>
<tr class="header"><td >E1</td><td >E2</td><td >E3</td><td >E4</td><td >E5</td><td >E6</td><td >E7</td><td >E8</td><td >On Going CS- Call (Voice)</td><td >On Going PS- Call (HSDPA)</td><td >New CS- Call (Voice)</td><td >New PS- Call (HSDPA)</td><td >OK</td><td >NOK</td><td>N/A</td></tr>

<tr><td rowspan="2">1</td>
<td rowspan="2" bgcolor="#666666">on</td><td rowspan="2" bgcolor="#666666">on</td><td rowspan="2">off</td><td rowspan="2">off</td><td rowspan="2">off</td><td rowspan="2">off</td><td rowspan="2">off</td><td rowspan="2">off</td>
<td><i>Connected</i></td><td><i>Connected</i></td><td><i>Successful</i></td><td><i>Successful</i></td>
<td rowspan="2" align="center"><img src="<?php echo base_url() ?>static/i/radio<?php if($dt_subchapter_18_14a[3]=='OK') echo '_checked' ?>.jpg"></td><td rowspan="2" align="center"><img src="<?php echo base_url() ?>static/i/radio<?php if($dt_subchapter_18_14a[3]=='Not OK') echo '_checked' ?>.jpg"></td><td rowspan="2" align="center"><img src="<?php echo base_url() ?>static/i/radio<?php if($dt_subchapter_18_14a[3]=='N/A') echo '_checked' ?>.jpg"></td>
</tr><tr><td><i>disconnect</i></td><td><i>disconnect</i></td><td><i>Failed</i></td><td><i>Failed</i></td></tr>

<tr><td rowspan="2">2</td>
<td rowspan="2">off</td><td rowspan="2" bgcolor="#666666">on</td><td rowspan="2" bgcolor="#666666">on</td><td rowspan="2">off</td><td rowspan="2">off</td><td rowspan="2">off</td><td rowspan="2">off</td><td rowspan="2">off</td>
<td><i>Connected</i></td><td><i>Connected</i></td><td><i>Successful</i></td><td><i>Successful</i></td>
<td rowspan="2" align="center"><img src="<?php echo base_url() ?>static/i/radio<?php if($dt_subchapter_18_14b[3]=='OK') echo '_checked' ?>.jpg"></td><td rowspan="2" align="center"><img src="<?php echo base_url() ?>static/i/radio<?php if($dt_subchapter_18_14b[3]=='Not OK') echo '_checked' ?>.jpg"></td><td rowspan="2" align="center"><img src="<?php echo base_url() ?>static/i/radio<?php if($dt_subchapter_18_14b[3]=='N/A') echo '_checked' ?>.jpg"></td>
</tr><tr><td><i>disconnect</i></td><td><i>disconnect</i></td><td><i>Failed</i></td><td><i>Failed</i></td></tr>

<tr><td rowspan="2">3</td>
<td rowspan="2">off</td><td rowspan="2">off</td><td rowspan="2" bgcolor="#666666">on</td><td rowspan="2" bgcolor="#666666">on</td><td rowspan="2">off</td><td rowspan="2">off</td><td rowspan="2">off</td><td rowspan="2">off</td>
<td><i>Connected</i></td><td><i>Connected</i></td><td><i>Successful</i></td><td><i>Successful</i></td>
<td rowspan="2" align="center"><img src="<?php echo base_url() ?>static/i/radio<?php if($dt_subchapter_18_14c[3]=='OK') echo '_checked' ?>.jpg"></td><td rowspan="2" align="center"><img src="<?php echo base_url() ?>static/i/radio<?php if($dt_subchapter_18_14c[3]=='Not OK') echo '_checked' ?>.jpg"></td><td rowspan="2" align="center"><img src="<?php echo base_url() ?>static/i/radio<?php if($dt_subchapter_18_14c[3]=='N/A') echo '_checked' ?>.jpg"></td>
</tr><tr><td><i>disconnect</i></td><td><i>disconnect</i></td><td><i>Failed</i></td><td><i>Failed</i></td></tr>

<tr><td rowspan="2">4</td>
<td rowspan="2">off</td><td rowspan="2">off</td><td rowspan="2">off</td><td rowspan="2" bgcolor="#666666">on</td><td rowspan="2" bgcolor="#666666">on</td><td rowspan="2">off</td><td rowspan="2">off</td><td rowspan="2">off</td>
<td><i>Connected</i></td><td><i>Connected</i></td><td><i>Successful</i></td><td><i>Successful</i></td>
<td rowspan="2" align="center"><img src="<?php echo base_url() ?>static/i/radio<?php if($dt_subchapter_18_14d[3]=='OK') echo '_checked' ?>.jpg"></td><td rowspan="2" align="center"><img src="<?php echo base_url() ?>static/i/radio<?php if($dt_subchapter_18_14d[3]=='Not OK') echo '_checked' ?>.jpg"></td><td rowspan="2" align="center"><img src="<?php echo base_url() ?>static/i/radio<?php if($dt_subchapter_18_14d[3]=='N/A') echo '_checked' ?>.jpg"></td>
</tr><tr><td><i>disconnect</i></td><td><i>disconnect</i></td><td><i>Failed</i></td><td><i>Failed</i></td></tr>

<tr><td rowspan="2">5</td>
<td rowspan="2">off</td><td rowspan="2">off</td><td rowspan="2">off</td><td rowspan="2">off</td><td rowspan="2" bgcolor="#666666">on</td><td rowspan="2" bgcolor="#666666">on</td><td rowspan="2">off</td><td rowspan="2">off</td>
<td><i>Connected</i></td><td><i>Connected</i></td><td><i>Successful</i></td><td><i>Successful</i></td>
<td rowspan="2" align="center"><img src="<?php echo base_url() ?>static/i/radio<?php if($dt_subchapter_18_14e[3]=='OK') echo '_checked' ?>.jpg"></td><td rowspan="2" align="center"><img src="<?php echo base_url() ?>static/i/radio<?php if($dt_subchapter_18_14e[3]=='Not OK') echo '_checked' ?>.jpg"></td><td rowspan="2" align="center"><img src="<?php echo base_url() ?>static/i/radio<?php if($dt_subchapter_18_14e[3]=='N/A') echo '_checked' ?>.jpg"></td>
</tr><tr><td><i>disconnect</i></td><td><i>disconnect</i></td><td><i>Failed</i></td><td><i>Failed</i></td></tr>

<tr><td rowspan="2">6</td>
<td rowspan="2">off</td><td rowspan="2">off</td><td rowspan="2">off</td><td rowspan="2">off</td><td rowspan="2">off</td><td rowspan="2" bgcolor="#666666">on</td><td rowspan="2" bgcolor="#666666">on</td><td rowspan="2">off</td>
<td><i>Connected</i></td><td><i>Connected</i></td><td><i>Successful</i></td><td><i>Successful</i></td>
<td rowspan="2" align="center"><img src="<?php echo base_url() ?>static/i/radio<?php if($dt_subchapter_18_14f[3]=='OK') echo '_checked' ?>.jpg"></td><td rowspan="2" align="center"><img src="<?php echo base_url() ?>static/i/radio<?php if($dt_subchapter_18_14f[3]=='Not OK') echo '_checked' ?>.jpg"></td><td rowspan="2" align="center"><img src="<?php echo base_url() ?>static/i/radio<?php if($dt_subchapter_18_14f[3]=='N/A') echo '_checked' ?>.jpg"></td>
</tr><tr><td><i>disconnect</i></td><td><i>disconnect</i></td><td><i>Failed</i></td><td><i>Failed</i></td></tr>

<tr><td rowspan="2">7</td>
<td rowspan="2">off</td><td rowspan="2">off</td><td rowspan="2">off</td><td rowspan="2">off</td><td rowspan="2">off</td><td rowspan="2">off</td><td rowspan="2" bgcolor="#666666">on</td><td rowspan="2" bgcolor="#666666">on</td>
<td><i>Connected</i></td><td><i>Connected</i></td><td><i>Successful</i></td><td><i>Successful</i></td>
<td rowspan="2" align="center"><img src="<?php echo base_url() ?>static/i/radio<?php if($dt_subchapter_18_14g[3]=='OK') echo '_checked' ?>.jpg"></td><td rowspan="2" align="center"><img src="<?php echo base_url() ?>static/i/radio<?php if($dt_subchapter_18_14g[3]=='Not OK') echo '_checked' ?>.jpg"></td><td rowspan="2" align="center"><img src="<?php echo base_url() ?>static/i/radio<?php if($dt_subchapter_18_14g[3]=='N/A') echo '_checked' ?>.jpg"></td>
</tr><tr><td><i>disconnect</i></td><td><i>disconnect</i></td><td><i>Failed</i></td><td><i>Failed</i></td></tr>

<tr><td rowspan="2">8</td>
<td rowspan="2" bgcolor="#666666">on</td><td rowspan="2" bgcolor="#666666">on</td><td rowspan="2" bgcolor="#666666">on</td><td rowspan="2" bgcolor="#666666">on</td><td rowspan="2" bgcolor="#666666">on</td><td rowspan="2" bgcolor="#666666">on</td><td rowspan="2" bgcolor="#666666">on</td><td rowspan="2" bgcolor="#666666">on</td>
<td><i>Connected</i></td><td><i>Connected</i></td><td><i>Successful</i></td><td><i>Successful</i></td>
<td rowspan="2" align="center"><img src="<?php echo base_url() ?>static/i/radio<?php if($dt_subchapter_18_14h[3]=='OK') echo '_checked' ?>.jpg"></td><td rowspan="2" align="center"><img src="<?php echo base_url() ?>static/i/radio<?php if($dt_subchapter_18_14h[3]=='Not OK') echo '_checked' ?>.jpg"></td><td rowspan="2" align="center"><img src="<?php echo base_url() ?>static/i/radio<?php if($dt_subchapter_18_14h[3]=='N/A') echo '_checked' ?>.jpg"></td>
</tr><tr><td><i>disconnect</i></td><td><i>disconnect</i></td><td><i>Failed</i></td><td><i>Failed</i></td></tr></table>

<p style="font-size:11px"><i>Note: - After ATP completed, make sure all E1 in enable state (active).<br />-	on &raquo; E1 link is in use and connected to Node B/RXI/RNC.<br />- off &raquo; E1 link is in use and disconnected from Node B/RXI/RNC.<br />The Expected Value for Call Connection State & Result Test  for all test item are:<br />On Going CS-Call &raquo; Connected.  On Going PS-Call &raquo; Connected.  New CS-Call &raquo; Successful.  New PS-Call &raquo; Successful</i></p>

<hr />

<?php $Qchapter = $this->db->query("SELECT `no_chapter`, `content` FROM `it_atp_chapter` WHERE `atp_id`='$dx' AND `chapter`='19' ORDER BY `atp_chapter_id` ASC"); foreach($Qchapter->result_object() as $chapter) $arr_chapter_19[str_replace('19.', '', $chapter->no_chapter) -1]=$chapter ?>

<table class="border" cellpadding="0" cellspacing="0">
<tr class="header"><td width="40">Chapter</td><td >Title work performed</td><td width="30">OK</td><td width="40">Not OK</td><td width="35">N/A</td><td width="90">Remark</td></tr>
<tr><td valign="top"><b>19</b><br />19.1<br />19.2<br />19.3<br />19.4</td><td valign="top"><b>Battery Backup System (BBS) Test</b><br />BBS Type identification<br />BBS Material and Installation check List<br />BBS Testing<br />BBS Labelling</td>
<td valign="top" align="center">
<?php echo '<br />';
for($i=0; $i <= 3; $i++){
	echo '<img src="'.base_url().'static/i/radio'; if($arr_chapter_19[$i]->content=='OK') echo '_checked'; echo '.jpg"><br />';
}
?>
</td><td valign="top" align="center">
<?php echo '<br />';
for($i=0; $i <= 3; $i++){
	echo '<img src="'.base_url().'static/i/radio'; if($arr_chapter_19[$i]->content=='Not OK') echo '_checked'; echo '.jpg"><br />';
}
?>
</td><td valign="top" align="center">
<?php echo '<br />';
for($i=0; $i <= 3; $i++){
	echo '<img src="'.base_url().'static/i/radio'; if($arr_chapter_19[$i]->content=='N/A') echo '_checked'; echo '.jpg"><br />';
}
?>
</td><td valign="top" align="center"><?php echo '<br />'; for($i=0; $i <= 3; $i++) echo 'Major<br />' ?></td></tr>
</table>

<?php $Qsubchapter = $this->db->query("SELECT `subno_chapter`, `content` FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `chapter`='19' AND `no_chapter`='19.1' ORDER BY `subno_chapter_order` ASC"); foreach($Qsubchapter->result_object() as $subchapter) $arr_subchapter_19_1[$subchapter->subno_chapter -1]=$subchapter ?>

<h3>Chapter 19.1: BBS Type Identification</h3>
<table class="border" cellpadding="0" cellspacing="0">
<tr class="header"><td width="40">Test No</td><td >BBS Type</td><td width="30">OK</td><td width="40">Not OK</td><td width="35">N/A</td><td width="90">Remark</td></tr>
<?php
$arr_dt_191 = array('BBS 9500 for RBS 3101', 'BBS for RBS 3206', 'BBS 8500 for RBS 3107', 'PBC 04 for RBS 3412', 'RBS 6201 for RBS 6201');
for($i=0; $i <= 4; $i++){
	$dt_subchapter_19_1 = explode('|', $arr_subchapter_19_1[$i]->content);
	echo '<tr><td>19.1.'.($i +1).'</td><td>'.$arr_dt_191[$i].'</td>';
	echo '<td align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_19_1[3]=='OK') echo '_checked'; echo '.jpg"></td>';
	echo '<td align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_19_1[3]=='Not OK') echo '_checked'; echo '.jpg"></td>';
	echo '<td align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_19_1[3]=='N/A') echo '_checked'; echo '.jpg"></td>';
	echo '<td>'.$this->ifunction->ifnull($dt_subchapter_19_1[4]).'</td></tr>';
}
?>
</table>

<?php $Qsubchapter = $this->db->query("SELECT `subno_chapter`, `content` FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `chapter`='19' AND `no_chapter`='19.2' ORDER BY `subno_chapter_order` ASC"); foreach($Qsubchapter->result_object() as $subchapter) $arr_subchapter_19_2[$subchapter->subno_chapter -1]=$subchapter ?>

<h3>Chapter 19.2: BBS Material and Installation check List</h3>
<table class="border" cellpadding="0" cellspacing="0">
<tr class="header"><td width="40">Test No</td><td>Material Type</td><td width="30">OK</td><td width="40">Not OK</td><td width="35">N/A</td><td width="100">Quantity</td><td width="90">Remark</td></tr>
<?php
$arr_dt_192 = array('Power Bar', 'Battery cable connection', 'Battery 12 V', 'Fan unit /Cooling Fan *', 'Switch use for Fan *');
for($i=0; $i <= 4; $i++){
	$dt_subchapter_19_2 = explode('|', $arr_subchapter_19_2[$i]->content);
	echo '<tr><td>19.2.'.($i +1).'</td><td>'.$arr_dt_192[$i].'</td>';
	echo '<td align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_19_2[3]=='OK') echo '_checked'; echo '.jpg"></td>';
	echo '<td align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_19_2[3]=='Not OK') echo '_checked'; echo '.jpg"></td>';
	echo '<td align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_19_2[3]=='N/A') echo '_checked'; echo '.jpg"></td>';
	echo '<td>'.$this->ifunction->ifnull($dt_subchapter_19_2[4]).'</td><td>'.$this->ifunction->ifnull($dt_subchapter_19_2[5]).'</td></tr>';
}
?>
</table><br />

<?php $Qsubchapter = $this->db->query("SELECT `subno_chapter`, `content` FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `chapter`='19' AND `no_chapter`='19.3' ORDER BY `subno_chapter_order` ASC"); foreach($Qsubchapter->result_object() as $subchapter) $arr_subchapter_19_3[$subchapter->subno_chapter -1]=$subchapter;
$dt_subchapter_19_3 = explode('|', $arr_subchapter_19_3[0]->content) ?>

<h3>Chapter 19.3: BBS Testing</h3>
<table class="border" cellpadding="0" cellspacing="0">
<tr><td>Back Up Time: <span style="padding:3px 0">&nbsp;</span> <img src="<?php echo base_url() ?>static/i/radio<?php if($dt_subchapter_19_3[3]=='2 hours') echo '_checked' ?>.jpg"> 2 hours <span style="padding:5px 0">&nbsp;</span> <img src="<?php echo base_url() ?>static/i/radio<?php if($dt_subchapter_19_3[3]=='4 hours') echo '_checked' ?>.jpg"> 4 hours <span style="padding:5px 0">&nbsp;</span> <img src="<?php echo base_url() ?>static/i/radio<?php if($dt_subchapter_19_3[3]=='6 hours') echo '_checked' ?>.jpg"> 6 hours <span style="padding:5px 0">&nbsp;</span> <img src="<?php echo base_url() ?>static/i/radio<?php if($dt_subchapter_19_3[3]=='8 hours') echo '_checked' ?>.jpg"> 8 hours <span style="padding:5px 0">&nbsp;</span> <img src="<?php echo base_url() ?>static/i/radio<?php if($dt_subchapter_19_3[3]=='... hours') echo '_checked' ?>.jpg"> ...hours <p style="font-size:11px"><i>Back Up Time as state in Contract. For 12 V Battery, minimum  battery voltage must not reach below 10,9 Vdc after discharge period</i></p></td></tr></table><br />

<h3>Chapter 19.3: BBS Material and Installation check List</h3>
<table class="border" cellpadding="0" cellspacing="0">
<tr class="header"><td width="40">Test No</td><td width="60">Battery</td><td>Voltage after back up tested (VDC)</td><td width="30">OK</td><td width="40">Not OK</td><td width="35">N/A</td><td width="110">Remark</td></tr>
<?php
$i193a = 1;
for($i=0; $i <= 4; $i++){
	$dt_subchapter_19_3a = explode('|', $arr_subchapter_19_3[$i193a]->content);
	echo '<tr><td>19.3.'.$i193a.'</td><td>Battery '.$i193a.'</td><td>'.$this->ifunction->ifnull($dt_subchapter_19_3a[3]).'</td>';
	echo '<td align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_19_3a[4]=='OK') echo '_checked'; echo '.jpg"></td>';
	echo '<td align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_19_3a[4]=='Not OK') echo '_checked'; echo '.jpg"></td>';
	echo '<td align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_19_3a[4]=='N/A') echo '_checked'; echo '.jpg"></td>';
	echo '<td>'.$this->ifunction->ifnull($dt_subchapter_19_3a[5]).'</td></tr>';
	$i193a++;
}
?>
</table>

<hr />

<table class="border" cellpadding="0" cellspacing="0">
<?php
$i193b = 6;
for($i=5; $i <= 15; $i++){
	$dt_subchapter_19_3b = explode('|', $arr_subchapter_19_3[$i193b]->content);
	echo '<tr><td width="40">19.3.'.$i193b.'</td><td width="60">Battery '.$i193b.'</td><td>'.$this->ifunction->ifnull($dt_subchapter_19_3b[3]).'</td>';
	echo '<td width="30" align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_19_3b[4]=='OK') echo '_checked'; echo '.jpg"></td>';
	echo '<td width="40" align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_19_3b[4]=='Not OK') echo '_checked'; echo '.jpg"></td>';
	echo '<td width="35" align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_19_3b[4]=='N/A') echo '_checked'; echo '.jpg"></td>';
	echo '<td width="110">'.$this->ifunction->ifnull($dt_subchapter_19_3b[5]).'&nbsp;</td></tr>';
	$i193b++;
}
?>
</table><br />

<?php $Qchapter = $this->db->query("SELECT `no_chapter`, `content` FROM `it_atp_chapter` WHERE `atp_id`='$dx' AND `chapter`='20' ORDER BY `atp_chapter_id` ASC");
foreach($Qchapter->result_object() as $chapter) $arr_chapter_20[str_replace('20.', '', $chapter->no_chapter) -1]=$chapter ?>

<table class="border" cellpadding="0" cellspacing="0">
<tr class="header"><td width="40">Chapter</td><td>Title work performed</td><td width="30">OK</td><td width="40">Not OK</td><td width="35">N/A</td><td width="90">Remark</td></tr><tr><td valign="top"><b>20</b><br />20.1<br />20.2<br />20.3</td><td valign="top"><b>Before leaving the site:</b><br />Site condition must be clean<br />No damage at site environment<br />All Infrastructures inside the RBS must have the same condition as previous</td>
<td valign="top" align="center">
<?php echo '<br />';
for($i=0; $i <= 2; $i++){
	echo '<img src="'.base_url().'static/i/radio'; if($arr_chapter_20[$i]->content=='OK') echo '_checked'; echo '.jpg"><br />';
}
?>
</td><td valign="top" align="center">
<?php echo '<br />';
for($i=0; $i <= 2; $i++){
	echo '<img src="'.base_url().'static/i/radio'; if($arr_chapter_20[$i]->content=='Not OK') echo '_checked'; echo '.jpg"><br />';
}
?>
</td><td valign="top" align="center">
<?php echo '<br />';
for($i=0; $i <= 2; $i++){
	echo '<img src="'.base_url().'static/i/radio'; if($arr_chapter_20[$i]->content=='N/A') echo '_checked'; echo '.jpg"><br />';
}
?>
</td><td valign="top" align="center"><?php echo '<br />'; for($i=0; $i <= 2; $i++) echo 'Major<br />' ?></td></tr>
</table>

<hr />

<p align="center"><b>Table 2<br />Note - Comments - Fault</b></p>
<table class="border" cellpadding="0" cellspacing="0">
<tr class="header"><td width="20" align="center">No</td><td align="center">Problems</td><td align="center">Cleared</td></tr>
<?php for($i=1; $i <= 4; $i++) echo '<tr valign="top"><td align="center" height="50">'.$i.'</td><td>Chapter:<br />Description:</td><td>Name:<br />Date:</td></tr>' ?>
</table>

<p style="font-size:11px"><i>Note:<br />- For critical and major pending item, should be closed within 24 hours<br />- For minor pending item, should be closed within 30 days</i></p>

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