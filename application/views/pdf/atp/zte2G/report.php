<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed') ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xml:lang="en" xmlns="http://www.w3.org/1999/xhtml" lang="en">
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
<title>ATP - ZTE 2G</title>
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
<tr><td colspan="5">Signature Person who Concerned:</td></tr>
<tr>
    <td height="40"></td><td></td><td></td><td></td><td></td>
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

<p id="logo"><img src="<?php echo base_url() ?>static/i/indosat_zte.jpg" /></p><br /><br /><br />

<h1>BTS<br>BS8800/BS8900<br /><br /><br />ATP BTS<br>Acceptance Manual version 1.0<br>2011</h1><br />

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

<h3>Identification</h3><br>
<table class="border" cellpadding="0" cellspacing="0"><tr><td valign="top"><font color="#666">Site Name:</font> <?php echo $atp[0]->name ?></td><td valign="top"><font color="#666">Site Address:</font> <?php echo $atp[0]->address ?></td></tr></table><br>

<h3>Equipment Identification</h3><br>
<?php $Qsubchapter = $this->db->query("SELECT `content` FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `chapter`='-1' AND `no_chapter`='-1.1' ORDER BY `subno_chapter_order` ASC");
foreach($Qsubchapter->result_object() as $subchapter) $arr_subchapter_1_1[]=$subchapter; 

$dt_subchapter_1_1a = explode('|', $arr_subchapter_1_1[0]->content);

$Qsubchapter = $this->db->query("SELECT `content` FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `chapter`='-2' AND `no_chapter`='-2.1' ORDER BY `subno_chapter_order` ASC");
foreach($Qsubchapter->result_object() as $subchapter) $arr_subchapter_2_1[]=$subchapter;

$dt_subchapter_2_1a = explode('|', $arr_subchapter_2_1[0]->content);

$Qsubchapter = $this->db->query("SELECT `content` FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `chapter`='-3' AND `no_chapter`='-3.1' ORDER BY `subno_chapter_order` ASC");
foreach($Qsubchapter->result_object() as $subchapter) $arr_subchapter_3_1[]=$subchapter;

$dt_subchapter_3_1a = explode('|', $arr_subchapter_3_1[0]->content);

$Qsubchapter = $this->db->query("SELECT `content` FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `chapter`='-4' AND `no_chapter`='-4.1' ORDER BY `subno_chapter_order` ASC");
foreach($Qsubchapter->result_object() as $subchapter) $arr_subchapter_4_1[]=$subchapter;

$Qsubchapter = $this->db->query("SELECT `content` FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `chapter`='-5' AND `no_chapter`='-5.1' ORDER BY `subno_chapter_order` ASC");
foreach($Qsubchapter->result_object() as $subchapter) $arr_subchapter_5_1[]=$subchapter;

$Qsubchapter = $this->db->query("SELECT `content` FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `chapter`='-6' AND `no_chapter`='-6.1' ORDER BY `subno_chapter_order` ASC");
foreach($Qsubchapter->result_object() as $subchapter) $arr_subchapter_6_1[]=$subchapter;

$dt_subchapter_6_1a = explode('|', $arr_subchapter_6_1[0]->content);
$dt_subchapter_6_1b = explode('|', $arr_subchapter_6_1[1]->content);

$Qsubchapter = $this->db->query("SELECT `content` FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `chapter`='-7' AND `no_chapter`='-7.1' ORDER BY `subno_chapter_order` ASC");
foreach($Qsubchapter->result_object() as $subchapter) $arr_subchapter_7_1[]=$subchapter;

$dt_subchapter_7_1a = explode('|', $arr_subchapter_7_1[0]->content);
?>
<table cellpadding="0" cellspacing="0"><tr>
  <td width="100">Type</td><td width="10">:</td><td><?php echo '<img src="'.base_url().'static/i/checkbox'; if($dt_subchapter_1_1a[3]=='true') echo '_checked'; echo '.jpg">' ?> BTS BS8800 <span style="margin-left:50px"> <?php echo '<img src="'.base_url().'static/i/checkbox'; if($dt_subchapter_1_1a[4]=='true') echo '_checked'; echo '.jpg">' ?> BTS BS8900 <span style="margin-left:50px"> <?php echo '<img src="'.base_url().'static/i/checkbox'; if($dt_subchapter_1_1a[5]=='true') echo '_checked'; echo '.jpg">' ?></td></tr>
<tr><td>BTS Rack number</td><td>:</td><td><?php echo $this->ifunction->ifnull($dt_subchapter_2_1a[3]) ?></td></tr>
<tr>
  <td>BTS configuration</td><td>:</td><td><?php echo $this->ifunction->ifnull($dt_subchapter_3_1a[3]) ?><span style="margin-left:110px">BSC Name : <?php echo $this->ifunction->ifnull($dt_subchapter_3_1a[4]) ?></span></td></tr>
</table><br />
<h3>Documents reference</h3>
<table class="border" cellpadding="0" cellspacing="0">
<?php
for($i=0; $i <= 2; $i++){
	$dt_subchapter_4_1 = explode('|', $arr_subchapter_4_1[$i]->content);
	echo '<tr><td valign="top">'.$this->ifunction->ifnull($dt_subchapter_4_1[3]).'&nbsp;</td><td width="10" style="border:none"></td><td>'.$this->ifunction->ifnull($dt_subchapter_4_1[4]).'&nbsp;</td></tr>';
}
?>  
</table>
<br />
<h3>Remarks</h3>
<table class="border" cellpadding="0" cellspacing="0">
  <tr class="header">
    <td width="20">No.</td>
    <td>Subject</td>
    <td>Solved by</td>
    <td>Date</td>
    <td>Sign</td>
  </tr>
  <?php
for($i=0; $i <= 4; $i++){
	$dt_subchapter_5_1 = explode('|', $arr_subchapter_5_1[$i]->content);
	echo '<tr><td align="center">'.($i+1).'</td>';
	echo '<td>'.$this->ifunction->ifnull($dt_subchapter_5_1[3]).'</td><td>'.$this->ifunction->ifnull($dt_subchapter_5_1[4]).'</td><td>'.$this->ifunction->ifnull($dt_subchapter_5_1[5]).'</td><td>'.$this->ifunction->ifnull($dt_subchapter_5_1[6]).'</td></tr>';
}
?>    
</table>
<br />
<h3>Signature of concerned people</h3>
<table class="border" cellpadding="0" cellspacing="0">
  <tr>
    <td valign="top"><b>INDOSAT</b><br />Name :<br />
      1. <?php echo $this->ifunction->ifnull($dt_subchapter_6_1a[3]) ?><br />
    <p>2. <?php echo $this->ifunction->ifnull($dt_subchapter_6_1b[3]) ?></p></td>
    <td valign="top"><br />Signature</td>
    <td valign="top"><b>ZTE</b><br />Name :<br />
      1. <?php echo $this->ifunction->ifnull($dt_subchapter_6_1a[4]) ?><br />
      <p>2. <?php echo $this->ifunction->ifnull($dt_subchapter_6_1b[4]) ?></p></td>
    <td valign="top"><br />Signature</td>
  </tr>
</table>
<p>&nbsp;</p>
<table class="border" cellpadding="0" cellspacing="0">
  <tr>
    <td valign="top">Start:<br /><?php echo $this->ifunction->ifnull($dt_subchapter_7_1a[3]) ?></td>
    <td valign="top">End:<br /><?php echo $this->ifunction->ifnull($dt_subchapter_7_1a[4]) ?></td>
    <td valign="top">Time spent:<br /><?php echo $this->ifunction->ifnull($dt_subchapter_7_1a[5]) ?></td>
  </tr>
</table>
<p>&nbsp;</p>
<table class="border" cellpadding="0" cellspacing="0">
  <tr>
    <td width="126" valign="top"><b>OK</b></td>
    <td valign="top">Put a cross if task performed</td>
  </tr>
  <tr>
    <td width="126" valign="top"><b>Not OK</b></td>
    <td valign="top">Put a cross if task not ok performed</td>
  </tr>
  <tr>
    <td width="126" valign="top"><b>N/A</b></td>
    <td valign="top">Not applicable</td>
  </tr>
  <tr>
    <td width="126" valign="top"><b>Remark Major</b></td>
    <td valign="top">Pass this test is mandatory</td>
  </tr>
  <tr>
    <td width="126" valign="top"><b>Remark Minor</b></td>
    <td valign="top">Should be passed this test</td>
  </tr>
</table>

<hr />

<?php $Qchapter = $this->db->query("SELECT `content` FROM `it_atp_chapter` WHERE `atp_id`='$dx' AND `chapter`='1' ORDER BY `atp_chapter_id` ASC");
foreach($Qchapter->result_object() as $chapter) $arr_chapter_1[]=$chapter ?>

<h3>A. Preliminary checks</h3>
<table class="border" cellpadding="0" cellspacing="0">
  <tr class="header">
    <td width="40">Chapter</td>
    <td>Title work performed</td>
    <td width="30">OK</td>
    <td width="40">Not OK</td>
    <td>N/A</td>
    <td width="90">Remark</td>
    </tr>
  <tr>
    <td valign="top"><b>1</b><br>1.1<br><br>1.2<br>1.3<br>1.4<br>1.5<br>1.6<br>1.6.1<br>1.6.2<br><br>1.6.3</td>
    <td valign="top">
      <b>Preliminary site checks</b>
      <br>
        Site Acceptance has been approved (the document must be attached)<br>
        Site documentation must be available<br>
        Commissioning Test Result should be attached<br>
        NDB documentation (Table Engineering)<br>
        Link Preparation already done<br>
        Before starting (on arrival at the site)<br>
        &bull; Check engineer is certificate of competency level <br> 
        &bull; Check tools and equipment (completeness and calibrated with valid certificate. All equipment must be provided by vendor<br>
        &bull; For swap out cases, dummy load must be available
    </td>
    <td valign="top" align="center">
      	<?php echo '<br>';
		for($i=0; $i <= 7; $i++){
			echo '<img src="'.base_url().'static/i/radio'; if($arr_chapter_1[$i]->content=='OK') echo '_checked'; echo '.jpg"><br>';
			if(($i==0)||($i==4)||($i==6)) echo '<br>';
		}
		?>
    </td>
   <td valign="top" align="center">
      	<?php echo '<br>';
		for($i=0; $i <= 7; $i++){
			echo '<img src="'.base_url().'static/i/radio'; if($arr_chapter_1[$i]->content=='Not OK') echo '_checked'; echo '.jpg"><br>';
			if(($i==0)||($i==4)||($i==6)) echo '<br>';
		}
		?>
    </td>
   <td valign="top" align="center">      
   <?php echo '<br>';
		for($i=0; $i <= 7; $i++){
			echo '<img src="'.base_url().'static/i/radio'; if($arr_chapter_1[$i]->content=='N/A') echo '_checked'; echo '.jpg"><br>';
			if(($i==0)||($i==4)||($i==6)) echo '<br>';
		}
	?>
    </td>
    <td valign="top" align="center">
    <br>
  	Major<br>
    <br>
  	Minor<br>
    <?php 
	for($i=0; $i <= 5; $i++){
		echo ' Major<br>';
		if(($i==2)||($i==4)) echo '<br>';
	}
	?>
    </td>
  </tr>
</table><br>


<?php $Qchapter = $this->db->query("SELECT `content` FROM `it_atp_chapter` WHERE `atp_id`='$dx' AND `chapter`='2' ORDER BY `atp_chapter_id` ASC");
foreach($Qchapter->result_object() as $chapter) $arr_chapter_2[]=$chapter ?>

<table class="border" cellpadding="0" cellspacing="0">
  <tr>
    <td width="40" valign="top"><b>2</b></td>
    <td><b>Checking HW configuration visually (Compare with equipment order list    attachment which is based on NDB, Engineering Table or Planning and Project    recommendation)</b></td>
    <td width="30" align="center"><?php echo '<img src="'.base_url().'static/i/radio'; if($arr_chapter_2[0]->content=='OK') echo '_checked'; echo '.jpg">' ?></td>
    <td width="40" align="center"><?php echo '<img src="'.base_url().'static/i/radio'; if($arr_chapter_2[0]->content=='Not OK') echo '_checked'; echo '.jpg">' ?></td>
    <td align="center"><?php echo '<img src="'.base_url().'static/i/radio'; if($arr_chapter_2[0]->content=='N/A') echo '_checked'; echo '.jpg">' ?></td>
    <td width="90" align="center">Major</td>
  </tr>
</table><br>


<?php $Qchapter = $this->db->query("SELECT `content` FROM `it_atp_chapter` WHERE `atp_id`='$dx' AND `chapter`='3' ORDER BY `atp_chapter_id` ASC");
foreach($Qchapter->result_object() as $chapter) $arr_chapter_3[]=$chapter ?>

<table class="border" cellpadding="0" cellspacing="0">
  <tr>
    <td width="40" valign="top"><b>3</b>&nbsp;<br>
        3.1<br>
        3.2<br>
        3.3<br>
        3.4<br>
    3.5</td>
    <td valign="top"><b>Checking on labelling</b>&nbsp;<br />
        Check label module (serial number, technical status)<br>
        Check BTS rack label<br>
        Check DDF label (end to end site)<br>
        Check power supply label<br> 
        Check feeder cable label (for antenna sector)<br />
    </td>
    <td width="30" valign="top" align="center">
    <?php echo '<br>';
		for($i=0; $i <= 4; $i++){
			echo '<img src="'.base_url().'static/i/radio'; if($arr_chapter_3[$i]->content=='OK') echo '_checked'; echo '.jpg"><br>';
		}
	?>
    </td>
    <td width="40" valign="top" align="center">
    <?php echo '<br>';
		for($i=0; $i <= 4; $i++){
			echo '<img src="'.base_url().'static/i/radio'; if($arr_chapter_3[$i]->content=='Not OK') echo '_checked'; echo '.jpg"><br>';
		}
	?>
    </td>
    <td valign="top" align="center">
    <?php echo '<br>';
		for($i=0; $i <= 4; $i++){
			echo '<img src="'.base_url().'static/i/radio'; if($arr_chapter_3[$i]->content=='N/A') echo '_checked'; echo '.jpg"><br>';
		}
	?>
    </td>
    <td width="90" align="center"  valign="top">
    <br>
        Minor<br>
        Minor<br>
        Major<br>
        Minor<br>
    	Major</td>
  </tr>
</table><br>

<?php $Qchapter = $this->db->query("SELECT `content` FROM `it_atp_chapter` WHERE `atp_id`='$dx' AND `chapter`='4' ORDER BY `atp_chapter_id` ASC");
foreach($Qchapter->result_object() as $chapter) $arr_chapter_4[]=$chapter ?>

<table class="border" cellpadding="0" cellspacing="0">
  <tr>
    <td width="40" valign="top">
      <b>4</b></td>
    <td valign="top">
      <b>Checking grounding integration (visual checking)</b>&nbsp;<br>
    Grounding BTS (proper connection and integration)</td>
    <td width="30" align="center"><?php echo '<img src="'.base_url().'static/i/radio'; if($arr_chapter_4[0]->content=='OK') echo '_checked'; echo '.jpg">' ?></td>
    <td width="40" align="center"><?php echo '<img src="'.base_url().'static/i/radio'; if($arr_chapter_4[0]->content=='Not OK') echo '_checked'; echo '.jpg">' ?></td>
    <td align="center"><?php echo '<img src="'.base_url().'static/i/radio'; if($arr_chapter_4[0]->content=='N/A') echo '_checked'; echo '.jpg">' ?></td>
    <td width="90" align="center">Major</td>
  </tr>
</table><br>

<?php $Qchapter = $this->db->query("SELECT `content` FROM `it_atp_chapter` WHERE `atp_id`='$dx' AND `chapter`='5' ORDER BY `atp_chapter_id` ASC");
foreach($Qchapter->result_object() as $chapter) $arr_chapter_5[]=$chapter ?>

<table class="border" cellpadding="0" cellspacing="0">
  <tr>
    <td width="40" valign="top">
      <b>5</b></td>
    <td valign="top">
      <b>Measurement BTS input power DC</b> <i>(see Table 1 and Table 2)</i><br>
    Base Station is supplied by -48 V DC</td>
    <td width="30" align="center"><?php echo '<img src="'.base_url().'static/i/radio'; if($arr_chapter_5[0]->content=='OK') echo '_checked'; echo '.jpg">' ?></td>
    <td width="40" align="center"><?php echo '<img src="'.base_url().'static/i/radio'; if($arr_chapter_5[0]->content=='Not OK') echo '_checked'; echo '.jpg">' ?></td>
    <td align="center"><?php echo '<img src="'.base_url().'static/i/radio'; if($arr_chapter_5[0]->content=='N/A') echo '_checked'; echo '.jpg">' ?></td>
    <td width="90" align="center">Major</td>
  </tr>
</table>

<hr />

<p align="center"><b>Table 1</b></p>
<table class="border" cellpadding="0" cellspacing="0">
  <tr class="header">
    <td></td>
    <td>Nominal Voltage</td>
    <td>INDOSAT Spec</td>
  </tr>
  <tr>
    <td>Input BTS (VDC)</td>
    <td>-40 VDC to -57VDC</td>
    <td>-43.2 VDC to -56.0 VDC</td>
  </tr>
</table>
<p><i>Reference Documentation: Consumer Manual</i></p>

<p align="center"><b>Table 2</b></p>

<?php $Qsubchapter = $this->db->query("SELECT `content` FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `chapter`='5' AND `no_chapter`='5.1' ORDER BY `subno_chapter_order` ASC");
foreach($Qsubchapter->result_object() as $subchapter) $arr_subchapter_5_1[]=$subchapter; 

$dt_subchapter_5_1a = explode('|', $arr_subchapter_5_1[0]->content);
?>

<table class="border" cellpadding="0" cellspacing="0">
  <tr class="header">
    <td width="100"><b>Test Item</td>
    <td>Neutral to (-48 VDC) Vdc</td>
    <td>Neutral to Ground<br>(&lt; 3 VDC)</td>
    <td>Remark</td>
  </tr>
  <tr>
    <td>Input DC power BTS </td>
    <td><?php echo $this->ifunction->ifnull($dt_subchapter_5_1a[3]) ?></td>
    <td><?php echo $this->ifunction->ifnull($dt_subchapter_5_1a[4]) ?></td>
    <td><?php echo $this->ifunction->ifnull($dt_subchapter_5_1a[5]) ?></td>
  </tr>
</table><br>

<?php $Qsubchapter = $this->db->query("SELECT `content` FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `chapter`='5' AND `no_chapter`='5.2' ORDER BY `subno_chapter_order` ASC");
foreach($Qsubchapter->result_object() as $subchapter) $arr_subchapter_5_2[]=$subchapter ?>

<table class="border" cellpadding="0" cellspacing="0">
  <tr class="header">
    <td width="40">Chapter</td>
    <td>Title work performed</td>
    <td width="30">Ok</td>
    <td width="40">Not Ok</td>
    <td>N.A</td>
    <td width="90">Remark</td>
  </tr>
  <tr>
    <td valign="top">
      <b>5.2</b>&nbsp;<br>
      5.2.1<br>
      5.2.2<br>
      5.2.3<br>
      5.2.4<br>
    5.2.5</p></td>
    <td valign="top"><b>Checking BTS Rack Circuit Breaker (switch ON/OFF )</b><br>&bull; Sub rack 1<br>&bull; Sub rack 2<br>&bull; Sub rack 3<br>&bull; Sub rack 4<br>&bull; Sub rack 5</td>
    <td width="30" valign="top" align="center">   
	<?php echo '<br>';
    for($i=0; $i <= 4; $i++){
		$dt_subchapter_5_2 = explode('|', $arr_subchapter_5_2[$i]->content);
        echo '<img src="'.base_url().'static/i/radio'; if($dt_subchapter_5_2[3]=='OK') echo '_checked'; echo '.jpg"><br>';
    }
	?>
    </td>
    <td valign="top" align="center">
    <?php echo '<br>';
    for($i=0; $i <= 4; $i++){
		$dt_subchapter_5_2 = explode('|', $arr_subchapter_5_2[$i]->content);
        echo '<img src="'.base_url().'static/i/radio'; if($dt_subchapter_5_2[3]=='Not OK') echo '_checked'; echo '.jpg"><br>';
    }
	?>
    </td>
    <td valign="top" align="center">
    <?php echo '<br>';
    for($i=0; $i <= 4; $i++){
		$dt_subchapter_5_2 = explode('|', $arr_subchapter_5_2[$i]->content);
        echo '<img src="'.base_url().'static/i/radio'; if($dt_subchapter_5_2[3]=='N/A') echo '_checked'; echo '.jpg"><br>';
    }
	?>
    </td>
    <td width="90" align="center" valign="top">
    <?php echo '<br>';
    for($i=0; $i <= 4; $i++){
		echo 'Major<br>';
    }
	?>
    </td>
  </tr>
</table><br>

<h3>B. Preparing BTS for Acceptance</h3>
<?php $Qchapter = $this->db->query("SELECT `content` FROM `it_atp_chapter` WHERE `atp_id`='$dx' AND `chapter`='6' ORDER BY `atp_chapter_id` ASC");
foreach($Qchapter->result_object() as $chapter) $arr_chapter_6[]=$chapter ?>
<table class="border" cellpadding="0" cellspacing="0">
  <tr class="header">
    <td width="40">Chapter</td>
    <td>Title work performed</td>
    <td width="30">OK</td>
    <td width="40">Not OK</td>
    <td>N/A</td>
    <td width="90">Remark</td>
  </tr>
  <tr>
    <td valign="top">
      <b>6</b><br>6.1<br><br><br><br>6.2</td>
    <td valign="top">
      <b>Checking Hardware Status</b><br>Checking Hardware Technical Status and physical addresses by plug and unplug all installed TRX, and make coordination with ZTE GSM-OMC until there is no mismatch on TRX Address in site with the ZTE GSM-OMC.<br>Hardware Technical Status checking <i>(see table 3)</i></td>
    <td valign="top" align="center">
      <?php echo '<br>';
		for($i=0; $i <= 1; $i++){
			echo '<img src="'.base_url().'static/i/radio'; if($arr_chapter_6[$i]->content=='OK') echo '_checked'; echo '.jpg">';
			if($i==0) echo '<br><br><br><br>';
		}
		?>
        </td>
      <td valign="top" align="center">
      <?php echo '<br>';
		for($i=0; $i <= 1; $i++){
			echo '<img src="'.base_url().'static/i/radio'; if($arr_chapter_6[$i]->content=='Not OK') echo '_checked'; echo '.jpg">';
			if($i==0) echo '<br><br><br><br>';
		}
		?></td>
      <td valign="top" align="center">
      <?php echo '<br>';
		for($i=0; $i <= 1; $i++){
			echo '<img src="'.base_url().'static/i/radio'; if($arr_chapter_6[$i]->content=='N/A') echo '_checked'; echo '.jpg">';
			if($i==0) echo '<br><br><br><br>';
		}
		?></td>
    <td align="center">Major<br><br><br><br>Major</td>
  </tr>
</table><br>

<?php $Qchapter = $this->db->query("SELECT `content` FROM `it_atp_chapter` WHERE `atp_id`='$dx' AND `chapter`='7' ORDER BY `atp_chapter_id` ASC");
foreach($Qchapter->result_object() as $chapter) $arr_chapter_7[]=$chapter ?>

<table class="border" cellpadding="0" cellspacing="0">
  <tr class="header">
    <td width="40">Chapter</td>
    <td>Title work performed</td>
    <td width="30">Ok</td>
    <td width="40">Not Ok</td>
    <td>N.A</td>
    <td width="90">Remark</td>
  </tr>
  <tr>
    <td valign="top"><b>7</b></td>
    <td  valign="top">
        <b>Checking Radio Channel Configuration<sup>1</sup></b>&nbsp;<br>
        It should be compare with data from TMS <i>(see table4)</i></td>
    <td align="center">
      <?php echo '<img src="'.base_url().'static/i/radio'; if($arr_chapter_7[0]->content=='OK') echo '_checked'; echo '.jpg">' ?></td>
    <td align="center"><?php echo '<img src="'.base_url().'static/i/radio'; if($arr_chapter_7[0]->content=='Not OK') echo '_checked'; echo '.jpg">' ?></td>
   <td align="center"><?php echo '<img src="'.base_url().'static/i/radio'; if($arr_chapter_7[0]->content=='N/A') echo '_checked'; echo '.jpg">' ?></td>
    <td align="center">
      Major</td>
  </tr>
</table>
<p><i>Note: TMS=Test Mobile Station</i></p>
<p><i>1 Test point no.7 coordination with TMS and ZTE GSM-OMC .INDOSAT & ZTE check together use TMS.  The data at TMS must be match with actual data at the field (related with test call point). TMS=Test Mobile Station</i></p>

<hr />

<p align="center"><b>Table 3</b></p>
<?php $Qsubchapter = $this->db->query("SELECT `content` FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `chapter`='6' AND `no_chapter`='6.1' ORDER BY `subno_chapter_order` ASC");
foreach($Qsubchapter->result_object() as $subchapter) $arr_subchapter_6_1[]=$subchapter ?>

<table class="border" cellpadding="0" cellspacing="0">
  <tr class="header">
    <td colspan="7"><b>BS 8800/BS 8900</b></td>
  </tr>
  <tr class="header">
    <td width="125" ><b>Shelf</b></td>
    <td width="125" ><b>Board</b></td>
    <td width="50"><b>Board No</b></td>
    <td width="30"><b>Install</b></td>
    <td width="30"><b>Normal </b></td>
    <td width="30"><b>Alarm</b></td>
    <td width="50" ><b>Remark</b></td>
  </tr>
  <tr>
    <td colspan="2">BS8800 Common Resource Frame    Equipped </td>
    <td bgcolor="#CCCCCC"></td>
    <td bgcolor="#CCCCCC"></td>
    <td bgcolor="#CCCCCC"></td>
    <td bgcolor="#CCCCCC"></td>
    <td></td>
  </tr>
  <?php
$arr_dt_61 = array('FS', 'PM', 'CC', 'SA', 'UBPG/BPC', 'FA', 'RSU60E', 'RSU60E', 'RSU60E', 'RSU40', 'RSU40', 'RSU40');
for($i=0; $i <= 11; $i++){
	$dt_subchapter_6_1 = explode('|', $arr_subchapter_6_1[$i]->content);
	echo '<tr>'; if($i == 0) echo '<td rowspan="6" bgcolor="#CCCCCC">Baseband Layer</td>'; elseif($i == 6) echo '<td rowspan="6" bgcolor="#CCCCCC">RF Layer</td>';
	echo '<td>'.$arr_dt_61[$i].'</td><td align="center">'.$this->ifunction->ifnull($dt_subchapter_6_1[3]).'</td><td align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_6_1[4]=='Install') echo '_checked'; echo '.jpg"></td><td align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_6_1[4]=='Normal') echo '_checked'; echo '.jpg"></td><td align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_6_1[4]=='Alarm') echo '_checked'; echo '.jpg"></td><td align="center">'.$this->ifunction->ifnull($dt_subchapter_6_1[5]).'</td></tr>';
}
?> 
  <tr>
    <td colspan="2">BS8900 Common Resource Frame    Equipped</td>
    <td bgcolor="#CCCCCC"></td>
    <td bgcolor="#CCCCCC"></td>
    <td bgcolor="#CCCCCC"></td>
    <td bgcolor="#CCCCCC"></td>
    <td></td>
  </tr>
  <?php
$arr_dt_61 = array('Fan subrack', 'B121 power supply', 'ZXSDR B8200', 'LPU lightning protection box', 'Storage battery', 'DCPD4E', 'FAN subrack', 'RF unit');
for($i=0; $i <= 7; $i++){
	$dt_subchapter_6_1 = explode('|', $arr_subchapter_6_1[$i]->content);
	echo '<tr>'; if($i == 0) echo '<td rowspan="4" bgcolor="#CCCCCC">BC8910A</td>'; elseif($i == 4) echo '<td bgcolor="#CCCCCC">PC8910A</td>'; elseif($i == 5) echo '<td rowspan="3" bgcolor="#CCCCCC">RC8910A</td>';
	echo '<td>'.$arr_dt_61[$i].'</td><td align="center">'.$this->ifunction->ifnull($dt_subchapter_6_1[3]).'</td><td align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_6_1[4]=='Install') echo '_checked'; echo '.jpg"></td><td align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_6_1[4]=='Normal') echo '_checked'; echo '.jpg"></td><td align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_6_1[4]=='Alarm') echo '_checked'; echo '.jpg"></td><td align="center">'.$this->ifunction->ifnull($dt_subchapter_6_1[5]).'</td></tr>';
}
?>  
</table>

<hr />

<p align="center"><b>Table 4</b></p>
<?php $Qsubchapter = $this->db->query("SELECT `content` FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `chapter`='7' AND `no_chapter`='7.1' ORDER BY `subno_chapter_order` ASC");
foreach($Qsubchapter->result_object() as $subchapter) $arr_subchapter_7_1[]=$subchapter ?>
<table class="border" cellpadding="0" cellspacing="0">
  <tr class="header">
    <td width="40" rowspan="2" align="center"><b>Sector</b></td>
    <td colspan="2" valign="top"><b>LAC</b></td>
    <td colspan="2" valign="top"><b>CI</b></td>
    <td colspan="2" valign="top"><b>Radio Channel Configuration</b></td>
  </tr>
  <tr class="header">
    <td valign="top"><b>Design
      Data</b></td>
    <td valign="top"><b>TMS
      Data</b></td>
    <td valign="top"><b>Design
      Data</b></td>
    <td valign="top"><b>TMS 
      Data</b></td>
    <td valign="top"><b>Design
      Data</b></td>
    <td valign="top"><b>TMS
      Data</b></td>
  </tr >
  <?php
$arr_dt_71 = array('Sector 1', 'Sector 2', 'Sector 3');
for($i=0; $i <= 2; $i++){
	$dt_subchapter_7_1 = explode('|', $arr_subchapter_7_1[$i]->content);
	echo '<tr>
    <td align="center">'.$arr_dt_71[$i].'</td>
    <td valign="top" align="center">'.$this->ifunction->ifnull($dt_subchapter_7_1[3]).'</td>
    <td valign="top" align="center">'.$this->ifunction->ifnull($dt_subchapter_7_1[4]).'</td>
    <td valign="top" align="center">'.$this->ifunction->ifnull($dt_subchapter_7_1[5]).'</td>
    <td valign="top" align="center">'.$this->ifunction->ifnull($dt_subchapter_7_1[6]).'</td>
    <td valign="top" align="center">'.$this->ifunction->ifnull($dt_subchapter_7_1[7]).'</td>
    <td valign="top" align="center">'.$this->ifunction->ifnull($dt_subchapter_7_1[8]).'</td>
  </tr>';
}
?>  
</table><br />

<?php $Qchapter = $this->db->query("SELECT `content` FROM `it_atp_chapter` WHERE `atp_id`='$dx' AND `chapter`='8' ORDER BY `atp_chapter_id` ASC");
foreach($Qchapter->result_object() as $chapter) $arr_chapter_8[]=$chapter ?>

<table class="border" cellpadding="0" cellspacing="0">
  <tr class="header">
    <td width="40">Chapter</td>
    <td>Title work performed</td>
    <td width="30">OK</td>
    <td width="40">Not OK</td>
    <td>N/A</td>
    <td width="90">Remark</td>
  </tr>
  <tr>
    <td ><b>8</b></td>
    <td><b>Checking the alarms</b>&nbsp;<i>(see table 5)</i><br>
      Active alarms should be cleared</td>
      <td align="center">
      <?php echo '<img src="'.base_url().'static/i/radio'; if($arr_chapter_8[0]->content=='OK') echo '_checked'; echo '.jpg">' ?></td>
    <td align="center"><?php echo '<img src="'.base_url().'static/i/radio'; if($arr_chapter_8[0]->content=='Not OK') echo '_checked'; echo '.jpg">' ?></td>
   <td align="center"><?php echo '<img src="'.base_url().'static/i/radio'; if($arr_chapter_8[0]->content=='N/A') echo '_checked'; echo '.jpg">' ?></td>
    <td align="center">
    Major</td>
  </tr>
</table>
<i>Note: Loop test at EAC BOX then compare with the active alarm at ZTE GSM-OMC monitor (should be matched)</i>
<p align="center"><b>Table 5</b></p>
<?php $Qsubchapter = $this->db->query("SELECT `content` FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `chapter`='8' AND `no_chapter`='8.1' ORDER BY `subno_chapter_order` ASC");
foreach($Qsubchapter->result_object() as $subchapter) $arr_subchapter_8_1[]=$subchapter;

$Qsubchapter = $this->db->query("SELECT `content` FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `chapter`='8' AND `no_chapter`='8.2' ORDER BY `subno_chapter_order` ASC");
foreach($Qsubchapter->result_object() as $subchapter) $arr_subchapter_8_2[]=$subchapter;

$Qsubchapter = $this->db->query("SELECT `content` FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `chapter`='8' AND `no_chapter`='8.3' ORDER BY `subno_chapter_order` ASC");
foreach($Qsubchapter->result_object() as $subchapter) $arr_subchapter_8_3[]=$subchapter;

$Qsubchapter = $this->db->query("SELECT `content` FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `chapter`='8' AND `no_chapter`='8.4' ORDER BY `subno_chapter_order` ASC");
foreach($Qsubchapter->result_object() as $subchapter) $arr_subchapter_8_4[]=$subchapter ?>
<table class="border" cellpadding="0" cellspacing="0">
  <tr class="header">
    <td width="40">Port No</td>
    <td>Test Description</td>
    <td width="30">Ok</td>
    <td width="40">Not Ok</td>
    <td>N.A</td>
  </tr>
  <tr>
    <td width="40">&nbsp;</td>
    <td><b>Basic Internal alarm Function test</b></td>
    <td width="30">&nbsp;</td>
    <td width="40">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <?php
$arr_dt_81 = array('SYCK alarm', 'EI/T1 transmission alarm', 'TRX Block alarm');
for($i=0; $i <= 2; $i++){
	$dt_subchapter_8_1 = explode('|', $arr_subchapter_8_1[$i]->content);
	echo '<tr><td align="center">'.($i+1).'</td>';
	echo '<td>'.$arr_dt_81[$i].'</td><td width="30" align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_8_1[3]=='OK') echo '_checked'; echo '.jpg"></td><td width="40" align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_8_1[3]=='Not OK') echo '_checked'; echo '.jpg"></td><td align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_8_1[3]=='N/A') echo '_checked'; echo '.jpg"></td></tr>';
}

for($i=0; $i <= 1; $i++){
	$dt_subchapter_8_2 = explode('|', $arr_subchapter_8_2[$i]->content);
	echo '<tr><td align="center">'.($i+4).'</td>';
	echo '<td>'.$this->ifunction->ifnull($dt_subchapter_8_2[4]).'</td><td width="30" align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_8_2[3]=='OK') echo '_checked'; echo '.jpg"></td><td width="40" align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_8_2[3]=='Not OK') echo '_checked'; echo '.jpg"></td><td align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_8_2[3]=='N/A') echo '_checked'; echo '.jpg"></td></tr>';
}
?>  
  <tr>
    <td width="40">&nbsp;</td>
    <td><b>External Alarm test (Customized)</b></td>
    <td width="30">&nbsp;</td>
    <td width="40">&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <?php
$arr_dt_83 = array('Low batt Alarm', 'High temp Alarm', 'Smog Alarm', 'Failure of air conditioner', 'Flooding Alarm', 'Door open Alarm', 'Power down Alarm');
for($i=0; $i <= 6; $i++){
	$dt_subchapter_8_3 = explode('|', $arr_subchapter_8_3[$i]->content);
	echo '<tr><td align="center">'.($i+1).'</td>';
	echo '<td>'.$arr_dt_83[$i].'</td><td width="30" align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_8_3[3]=='OK') echo '_checked'; echo '.jpg"></td><td width="40" align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_8_3[3]=='Not OK') echo '_checked'; echo '.jpg"></td><td align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_8_3[3]=='N/A') echo '_checked'; echo '.jpg"></td></tr>';
}

for($i=0; $i <= 2; $i++){
	$dt_subchapter_8_4 = explode('|', $arr_subchapter_8_4[$i]->content);
	echo '<tr><td align="center">'.($i+8).'</td>';
	echo '<td>'.$this->ifunction->ifnull($dt_subchapter_8_4[4]).'</td><td width="30" align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_8_4[3]=='OK') echo '_checked'; echo '.jpg"></td><td width="40" align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_8_4[3]=='Not OK') echo '_checked'; echo '.jpg"></td><td align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_8_4[3]=='N/A') echo '_checked'; echo '.jpg"></td></tr>';
}
?>  
</table><br>

<hr />

<?php $Qchapter = $this->db->query("SELECT `content` FROM `it_atp_chapter` WHERE `atp_id`='$dx' AND `chapter`='9' ORDER BY `atp_chapter_id` ASC");
foreach($Qchapter->result_object() as $chapter) $arr_chapter_9[]=$chapter ?>

<table class="border" cellpadding="0" cellspacing="0">
  <tr class="header">
    <td width="40">Chapter</td>
    <td>Title work performed</td>
    <td width="30">OK</td>
    <td width="40">Not OK</td>
    <td>N/A</td>
    <td width="90">Remark</td>
  </tr>
  <tr>
    <td valign="top">
      <b>9</b></td>
    <td  valign="top">
      <b>Downloading software </b>&nbsp;<br />
        Successfully downloaded<br />
        Software version :....................................</td>
    <td align="center">
      <?php echo '<img src="'.base_url().'static/i/radio'; if($arr_chapter_9[0]->content=='OK') echo '_checked'; echo '.jpg">' ?></td>
    <td align="center"><?php echo '<img src="'.base_url().'static/i/radio'; if($arr_chapter_9[0]->content=='Not OK') echo '_checked'; echo '.jpg">' ?></td>
   <td align="center"><?php echo '<img src="'.base_url().'static/i/radio'; if($arr_chapter_9[0]->content=='N/A') echo '_checked'; echo '.jpg">' ?></td>
    <td align="center">
    Major</td>
  </tr>
</table><br>
<?php $Qchapter = $this->db->query("SELECT `content` FROM `it_atp_chapter` WHERE `atp_id`='$dx' AND `chapter`='10' ORDER BY `atp_chapter_id` ASC");
foreach($Qchapter->result_object() as $chapter) $arr_chapter_10[]=$chapter ?>
<table class="border" cellpadding="0" cellspacing="0">
  <tr class="header">
    <td width="40">Chapter</td>
    <td>Title work performed</td>
    <td width="30">OK</td>
    <td width="40">Not OK</td>
    <td>N/A</td>
    <td width="90">Remark</td>
  </tr>
  <tr>
    <td  valign="top">
      <b>10</b>&nbsp;<br><br>
      10.1<br>
      10.2 </td>
    <td valign="top">
      <b>Checking VSWR, TRX output power, BCCH reconfiguration and Power output measurement after CDU </b>&nbsp;<br>
        TRX output power &amp; VSWR measurement and BCCH reconfiguration <i>(see table 6 and Table 7)</i> <br>
        Power output Insertion Loss &amp; VSWR measurement after 
      CDU (See table 8 &amp; 9) </td>
    <td valign="top" align="center">
      <?php echo '<br><br>';
		for($i=0; $i <= 1; $i++){
			echo '<img src="'.base_url().'static/i/radio'; if($arr_chapter_10[$i]->content=='OK') echo '_checked'; echo '.jpg"><br>';
			if(($i==0)||($i==4)||($i==6)) echo '<br>';
		}
		?>
        </td>
      <td valign="top" align="center">
      <?php echo '<br><br>';
		for($i=0; $i <= 1; $i++){
			echo '<img src="'.base_url().'static/i/radio'; if($arr_chapter_10[$i]->content=='Not OK') echo '_checked'; echo '.jpg"><br>';
			if(($i==0)||($i==4)||($i==6)) echo '<br>';
		}
		?></td>
      <td valign="top" align="center">
      <?php echo '<br><br>';
		for($i=0; $i <= 1; $i++){
			echo '<img src="'.base_url().'static/i/radio'; if($arr_chapter_10[$i]->content=='N/A') echo '_checked'; echo '.jpg"><br>';
			if(($i==0)||($i==4)||($i==6)) echo '<br>';
		}
		?></td>
    <td  align="center">
      Major<br><br>
      Major</td>
  </tr>
</table>
<i>Note:<br />
- At the measurement time, BTSPWRMAX setting at<br>     
            ZTE GSM-OMC must be set to 0 (zero) dB.<br>
         - Make sure that we use the right sensor power meter (900 MHz or 1800 MHz).</i>
<p align="center"><b>Table 6: TRX Output Level Specification</b></p>
<?php $Qsubchapter = $this->db->query("SELECT `content` FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `chapter`='10' AND `no_chapter`='10.1' ORDER BY `subno_chapter_order` ASC");
foreach($Qsubchapter->result_object() as $subchapter) $arr_subchapter_10_1[]=$subchapter; 

$dt_subchapter_10_1a = explode('|', $arr_subchapter_10_1[0]->content);
$dt_subchapter_10_1b = explode('|', $arr_subchapter_10_1[1]->content);
$dt_subchapter_10_1c = explode('|', $arr_subchapter_10_1[2]->content);
$dt_subchapter_10_1d = explode('|', $arr_subchapter_10_1[3]->content);
?>
<table class="border" cellpadding="0" cellspacing="0">
  <tr class="header">
    <td width="139"><b>BTS Type</b></td>
    <td width="156"><b>Module TRX</b></td>
    <td width="216"><b>Output level (dBm)</b></td>
  </tr>
  <tr align="center">
    <td width="139" rowspan="4">BS8800</td>
    <td width="156">RSU60 900MHZ</td>
    <td width="216">49 dBm</td>
  </tr>
  <tr align="center">
    <td width="156">RSU60 1800MHZ </td>
    <td width="216">49 dBm</td>
  </tr>
  <tr>
    <td width="156"><?php echo $this->ifunction->ifnull($dt_subchapter_10_1a[3]) ?>&nbsp;</td>
    <td width="216"><?php echo $this->ifunction->ifnull($dt_subchapter_10_1a[4]) ?>&nbsp;</td>
  </tr>
  <tr>
    <td width="156"><?php echo $this->ifunction->ifnull($dt_subchapter_10_1b[3]) ?>&nbsp;</td>
    <td width="216"><?php echo $this->ifunction->ifnull($dt_subchapter_10_1b[4]) ?>&nbsp;</td>
  </tr>
</table><br><br>
<table class="border" cellpadding="0" cellspacing="0">
  <tr class="header">
    <td width="139"><b>BTS Type</b></td>
    <td width="156"><b>Module TRX</b></td>
    <td width="216"><b>Output level (dBm)</b></td>
  </tr>
  <tr align="center">
    <td width="139" rowspan="4">BS8900</td>
    <td width="156">RSU60 900MHZ</td>
    <td width="216">49 dBm</td>
  </tr>
  <tr align="center">
    <td width="156">RSU60 1800MHZ </td>
    <td width="216">49 dBm</td>
  </tr>
  <tr>
    <td width="156"><?php echo $this->ifunction->ifnull($dt_subchapter_10_1c[3]) ?>&nbsp;</td>
    <td width="216"><?php echo $this->ifunction->ifnull($dt_subchapter_10_1c[4]) ?>&nbsp;</td>
  </tr>
  <tr>
    <td width="156"><?php echo $this->ifunction->ifnull($dt_subchapter_10_1d[3]) ?>&nbsp;</td>
    <td width="216"><?php echo $this->ifunction->ifnull($dt_subchapter_10_1d[4]) ?>&nbsp;</td>
  </tr>
</table>

<hr />

<p align="center">
<b>Table 7</b><br>
<i>(Note: Measurement tools with Power Meter and dummy load)</i></p>
<?php $Qsubchapter = $this->db->query("SELECT `content` FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `chapter`='10' AND `no_chapter`='10.2' ORDER BY `subno_chapter_order` ASC");
foreach($Qsubchapter->result_object() as $subchapter) $arr_subchapter_10_2[]=$subchapter ?>
<table class="border" cellpadding="0" cellspacing="0">
  <tr class="header">
    <td width="78" rowspan="2"><b>TRX<br />
      Variant</b></td>
    <td width="96" rowspan="2"><b>Power output<br />
      dBm</b></td>
    <td width="102" rowspan="2"><b>VSWR<br />
      ( &lt;= 1.1 ) </b></td>
    <td width="150" colspan="2"><b>BCCH reconfiguration</b></td>
  </tr>
  <tr class="header">
    <td width="78"><b>Ok</b></td>
    <td width="72"><b>Not Ok</b></td>
  </tr>
  <?php
  for($i=0; $i <= 11; $i++){
	  $dt_subchapter_10_2 = explode('|', $arr_subchapter_10_2[$i]->content);
	  echo '<tr align="center">
    <td width="78" valign="top">TRX '.$i.'</td>
    <td width="96" valign="top">'.$this->ifunction->ifnull($dt_subchapter_10_2[4]).'</td>
    <td width="102" valign="top">'.$this->ifunction->ifnull($dt_subchapter_10_2[5]).'</td>
    <td width="78" valign="top"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_10_2[3]=='OK') echo '_checked'; echo '.jpg"></td>
    <td width="78" valign="top"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_10_2[3]=='Not OK') echo '_checked'; echo '.jpg"></td>
  </tr>';
  }
  ?>  
</table><br><br><br>

<?php $Qchapter = $this->db->query("SELECT `content` FROM `it_atp_chapter` WHERE `atp_id`='$dx' AND `chapter`='11' ORDER BY `atp_chapter_id` ASC");
foreach($Qchapter->result_object() as $chapter) $arr_chapter_11[]=$chapter ?>

<table class="border" cellpadding="0" cellspacing="0">
  <tr class="header">
    <td width="40">Chapter</td>
    <td>Title work performed</td>
    <td width="30">OK</td>
    <td width="40">Not OK</td>
    <td>N/A</td>
    <td width="90">Remark</td>
  </tr>
  <tr>
    <td ><b>11</b></td>
    <td ><b>Checking time slot occupation</b>&nbsp;<i>(see table 10)</i> </td>
    <td align="center">
    <?php echo '<img src="'.base_url().'static/i/radio'; if($arr_chapter_11[0]->content=='OK') echo '_checked'; echo '.jpg">' ?></td>
    <td align="center"><?php echo '<img src="'.base_url().'static/i/radio'; if($arr_chapter_11[0]->content=='Not OK') echo '_checked'; echo '.jpg">' ?></td>
   <td align="center"><?php echo '<img src="'.base_url().'static/i/radio'; if($arr_chapter_11[0]->content=='N/A') echo '_checked'; echo '.jpg">' ?></td>
    <td align="center">Major</td>
  </tr>
</table><br>

<hr />

<?php $Qchapter = $this->db->query("SELECT `content` FROM `it_atp_chapter` WHERE `atp_id`='$dx' AND `chapter`='12' ORDER BY `atp_chapter_id` ASC");
foreach($Qchapter->result_object() as $chapter) $arr_chapter_12[]=$chapter ?>

<table class="border" cellpadding="0" cellspacing="0">
  <tr class="header">
    <td width="40">Chapter</td>
    <td>Title work performed</td>
    <td width="30">OK</td>
    <td width="40">Not OK</td>
    <td>N/A</td>
    <td width="90">Remark</td>
  </tr>
  <tr>
    <td  valign="top">
      <b>12</b>&nbsp;<br />
        12.1<br /><br />
      12.2</td>
    <td valign="top">
      <b>BTS Restart </b>&nbsp;<br />
        Check all Hardware Normal Status <b>before</b>&nbsp;BTS restart (All the board must normal )<br />
        Check all Hardware Normal Status <b>after</b>&nbsp;BTS restart (All the board must normal )</td>
    <td valign="top" align="center">
      <?php echo '<br>';
		for($i=0; $i <= 1; $i++){
			echo '<img src="'.base_url().'static/i/radio'; if($arr_chapter_12[$i]->content=='OK') echo '_checked'; echo '.jpg"><br>';
			if(($i==0)||($i==4)||($i==6)) echo '<br>';
		}
		?>
      </td>
      <td valign="top" align="center">
      <?php echo '<br>';
		for($i=0; $i <= 1; $i++){
			echo '<img src="'.base_url().'static/i/radio'; if($arr_chapter_12[$i]->content=='Not OK') echo '_checked'; echo '.jpg"><br>';
			if(($i==0)||($i==4)||($i==6)) echo '<br>';
		}
		?></td>
    <td valign="top" align="center">
     <?php echo '<br>';
		for($i=0; $i <= 1; $i++){
			echo '<img src="'.base_url().'static/i/radio'; if($arr_chapter_12[$i]->content=='N/A') echo '_checked'; echo '.jpg"><br>';
			if(($i==0)||($i==4)||($i==6)) echo '<br>';
		}
		?></td>
    <td align="center">
      Major<br /><br />
      Major</td>
  </tr>
</table><br>

<p align="center"><b>Table 10: Time slot occupation for each TRX</b></p>
<?php $Qsubchapter = $this->db->query("SELECT `content` FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `chapter`='11' AND `no_chapter`='11.1' ORDER BY `subno_chapter_order` ASC");
foreach($Qsubchapter->result_object() as $subchapter) $arr_subchapter_11_1[]=$subchapter ?>
<table class="border" cellpadding="0" cellspacing="0">
  <tr class="header">
    <td width="40"><b>TRX</b></td>
    <td width="65"><b>ARFCN</b></td>
    <td width="40" align="center"><b>0</b></td>
    <td width="40" align="center"><b>1</b></td>
    <td width="40" align="center"><b>2</b></td>
    <td width="40" align="center"><b>3</b></td>
    <td width="40" align="center"><b>4</b></td>
    <td width="40" align="center"><b>5</b></td>
    <td width="40" align="center"><b>6</b></td>
    <td width="40" align="center"><b>7</b></td>
  </tr>
  <?php
  for($i=0; $i <= 20; $i++){
	  $dt_subchapter_11_1 = explode('|', $arr_subchapter_11_1[$i]->content);
	  echo '<tr align="center">
    <td width="40">'.$i.'</td>
    <td width="65">'.$this->ifunction->ifnull($dt_subchapter_11_1[3]).'</td>
    <td width="40">'.$this->ifunction->ifnull($dt_subchapter_11_1[4]).'</td>
    <td width="40">'.$this->ifunction->ifnull($dt_subchapter_11_1[5]).'</td>
    <td width="40">'.$this->ifunction->ifnull($dt_subchapter_11_1[6]).'</td>
    <td width="40">'.$this->ifunction->ifnull($dt_subchapter_11_1[7]).'</td>
    <td width="40">'.$this->ifunction->ifnull($dt_subchapter_11_1[8]).'</td>
    <td width="40">'.$this->ifunction->ifnull($dt_subchapter_11_1[9]).'</td>
    <td width="40">'.$this->ifunction->ifnull($dt_subchapter_11_1[10]).'</td>
    <td width="40">'.$this->ifunction->ifnull($dt_subchapter_11_1[11]).'</td>
  </tr>';
  }
  ?>  
</table>
<i>Note: If the test result is ok please thick/cross at the appropriate box above for maximum 5 Ts randomly per TRX</i><br>

<hr />

<?php $Qchapter = $this->db->query("SELECT `content` FROM `it_atp_chapter` WHERE `atp_id`='$dx' AND `chapter`='13' ORDER BY `atp_chapter_id` ASC");
foreach($Qchapter->result_object() as $chapter) $arr_chapter_13[]=$chapter ?>

<table class="border" cellpadding="0" cellspacing="0">
  <tr class="header">
    <td width="40">Chapter</td>
    <td>Title work performed</td>
    <td width="30">OK</td>
    <td width="40">Not OK</td>
    <td>N/A</td>
    <td width="90">Remark</td>
  </tr>
  <tr>
    <td width="40" valign="top"> <b>13</b>&nbsp;<br />
      <br />
      <br />
      13.1<br />
      13.2<br />
      13.3<br />
      13.4<br />
      13.5<br />
      13.6</td>
    <td valign="top"> <b>Test Call using permanent CI number (successful) </b>&nbsp;<br />
      <i>A Number    :.............</i><br />
      <i>B Number    :.............</i><br />
      &bull; From MS to MS (Matrix, Mentari &amp; IM3)<br />
      &bull; From MS to PSTN<br />
      &bull; Send sms from MS to MS (Matrix, Mentari &amp; IM3)<br />
      &bull; HO test will be done before we leave the site.<br />
      &bull; GPRS functional test <br />
      &bull; EDGE/EGPRS functionality test <i>(see table below)</i></td>
    <td valign="top" align="center">
		<?php echo '<br><br><br>';
		for($i=0; $i <= 5; $i++){
			echo '<img src="'.base_url().'static/i/radio'; if($arr_chapter_13[$i]->content=='OK') echo '_checked'; echo '.jpg"><br>';
		}
		?></td>
    <td valign="top" align="center">
		<?php echo '<br><br><br>';
		for($i=0; $i <= 5; $i++){
			echo '<img src="'.base_url().'static/i/radio'; if($arr_chapter_13[$i]->content=='Not OK') echo '_checked'; echo '.jpg"><br>';
		}
		?></td>
    <td valign="top" align="center">
		<?php echo '<br><br><br>';
		for($i=0; $i <= 5; $i++){
			echo '<img src="'.base_url().'static/i/radio'; if($arr_chapter_13[$i]->content=='N/A') echo '_checked'; echo '.jpg"><br>';
		}
		?></td>
    <td align="center" valign="top">
		<?php echo '<br><br><br>';
		for($i=0; $i <= 5; $i++){
			echo 'Major<br>';
		}
		?></td>
  </tr>
</table>
<br />
<br />
<?php $Qsubchapter = $this->db->query("SELECT `content` FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `chapter`='13' AND `no_chapter`='13.1' ORDER BY `subno_chapter_order` ASC");
foreach($Qsubchapter->result_object() as $subchapter) $arr_subchapter_13_1[]=$subchapter; 

$dt_subchapter_13_1a = explode('|', $arr_subchapter_13_1[0]->content);
$dt_subchapter_13_1b = explode('|', $arr_subchapter_13_1[1]->content);
$dt_subchapter_13_1c = explode('|', $arr_subchapter_13_1[2]->content);
?>
<p><b>Chapter 13.6: EDGE / EGPRS Functionality Test Call<br />
  <br />
  Number of Time Slot = <?php echo $this->ifunction->ifnull($dt_subchapter_13_1a[3]) ?> ts <br />
  Throughput Value<br />
  Downlink = <?php echo $this->ifunction->ifnull($dt_subchapter_13_1b[3]) ?> kbps <br />
  Uplink = <?php echo $this->ifunction->ifnull($dt_subchapter_13_1c[3]) ?> kbps <br />
  <br />
  <br />
  <?php $Qsubchapter = $this->db->query("SELECT `content` FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `chapter`='13' AND `no_chapter`='13.2' ORDER BY `subno_chapter_order` ASC");
foreach($Qsubchapter->result_object() as $subchapter) $arr_subchapter_13_2[]=$subchapter; 

$dt_subchapter_13_2a = explode('|', $arr_subchapter_13_2[0]->content);
?>
  <br />  
  SECTOR 1 : MCC= <?php echo $this->ifunction->ifnull($dt_subchapter_13_2a[3]) ?>, MNC=<?php echo $this->ifunction->ifnull($dt_subchapter_13_2a[4]) ?>, LAC=<?php echo $this->ifunction->ifnull($dt_subchapter_13_2a[5]) ?>, CELL ID =<?php echo $this->ifunction->ifnull($dt_subchapter_13_2a[6]) ?>, ARFCN/BCCH =<?php echo $this->ifunction->ifnull($dt_subchapter_13_2a[7]) ?> </b></p>
<br />
<?php $Qsubchapter = $this->db->query("SELECT `content` FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `chapter`='13' AND `no_chapter`='13.3' ORDER BY `subno_chapter_order` ASC");
foreach($Qsubchapter->result_object() as $subchapter) $arr_subchapter_13_3[]=$subchapter ?>
<table class="border" cellpadding="0" cellspacing="0">
  <tr class="header">
    <td width="80" rowspan="2"><b>Item Test</b></td>
    <td width="50" rowspan="2"><b>Host Address</b></td>
    <td colspan="2" valign="top"><b>Downlink</b></td>
    <td colspan="2" valign="top"><b>Uplink</b></td>
    <td width="50" rowspan="2"><b>Throughput / Delay</b></td>
    <td width="100" colspan="3" valign="top"><b>Test Call Result</b></td>
    <td rowspan="2"><b>REMARK</b></td>
  </tr>
  <tr class="header">
    <td width="30" valign="top">TS</td>
    <td width="30" valign="top">MCS</td>
    <td width="30" valign="top">TS</td>
    <td width="30" valign="top">MCS</td>
    <td width="30" valign="top">Ok</td>
    <td valign="top">NOk</td>
    <td valign="top">N/A</td>
  </tr>
  <?php
$arr_dt_133 = array('PING', 'WAP', 'HTTP', 'FTP Downlink', 'FTP Uplink', 'Video Streaming');
for($i=0; $i <= 5; $i++){
	$dt_subchapter_13_3 = explode('|', $arr_subchapter_13_3[$i]->content);
	echo '<tr>
	<td><b>'.$arr_dt_133[$i].'</b></td>
	<td>'.$this->ifunction->ifnull($dt_subchapter_13_3[4]).'</td>
    <td>'.$this->ifunction->ifnull($dt_subchapter_13_3[5]).'</td>
    <td>'.$this->ifunction->ifnull($dt_subchapter_13_3[6]).'</td>
    <td>'.$this->ifunction->ifnull($dt_subchapter_13_3[7]).'</td>
    <td>'.$this->ifunction->ifnull($dt_subchapter_13_3[8]).'</td>
    <td>'.$this->ifunction->ifnull($dt_subchapter_13_3[9]).'</td>
    <td align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_13_3[3]=='OK') echo '_checked'; echo '.jpg"></td>
    <td align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_13_3[3]=='Not OK') echo '_checked'; echo '.jpg"></td>
    <td align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_13_3[3]=='N/A') echo '_checked'; echo '.jpg"></td>
    <td>'.$this->ifunction->ifnull($dt_subchapter_13_3[10]).'</td></tr>';
}
?>  
</table>
<br />
<i>TS = Timeslot; MCS = Multi Coding Scheme</i> <br />
<?php $Qsubchapter = $this->db->query("SELECT `content` FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `chapter`='13' AND `no_chapter`='13.4' ORDER BY `subno_chapter_order` ASC");
foreach($Qsubchapter->result_object() as $subchapter) $arr_subchapter_13_4[]=$subchapter; 

$dt_subchapter_13_4a = explode('|', $arr_subchapter_13_4[0]->content);
?>
<br />

<p><b>SECTOR 2 : MCC= <?php echo $this->ifunction->ifnull($dt_subchapter_13_4a[3]) ?>, MNC=<?php echo $this->ifunction->ifnull($dt_subchapter_13_4a[4]) ?>, LAC=<?php echo $this->ifunction->ifnull($dt_subchapter_13_4a[5]) ?>, CELL ID =<?php echo $this->ifunction->ifnull($dt_subchapter_13_4a[6]) ?>, ARFCN/BCCH =<?php echo $this->ifunction->ifnull($dt_subchapter_13_4a[7]) ?></b></p>
<br />

<hr />

<?php $Qsubchapter = $this->db->query("SELECT `content` FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `chapter`='13' AND `no_chapter`='13.5' ORDER BY `subno_chapter_order` ASC");
foreach($Qsubchapter->result_object() as $subchapter) $arr_subchapter_13_5[]=$subchapter ?>
<table class="border" cellpadding="0" cellspacing="0">
  <tr class="header">
    <td width="80" rowspan="2"><b>Item Test</b></td>
    <td width="50" rowspan="2"><b>Host Address</b></td>
    <td colspan="2" valign="top"><b>Downlink</b></td>
    <td colspan="2" valign="top"><b>Uplink</b></td>
    <td width="50" rowspan="2"><b>Throughput / Delay</b></td>
    <td width="100" colspan="3" valign="top"><b>Test Call Result</b></td>
    <td rowspan="2"><b>REMARK</b></td>
  </tr>
  <tr class="header">
    <td width="30" valign="top">TS</td>
    <td width="30" valign="top">MCS</td>
    <td width="30" valign="top">TS</td>
    <td width="30" valign="top">MCS</td>
    <td width="30" valign="top">Ok</td>
    <td valign="top">NOk</td>
    <td valign="top">N/A</td>
  </tr>
  <?php
$arr_dt_135 = array('PING', 'WAP', 'HTTP', 'FTP Downlink', 'FTP Uplink', 'Video Streaming');
for($i=0; $i <= 5; $i++){
	$dt_subchapter_13_5 = explode('|', $arr_subchapter_13_5[$i]->content);
	echo '<tr>
	<td><b>'.$arr_dt_135[$i].'</b></td>
	<td>'.$this->ifunction->ifnull($dt_subchapter_13_5[4]).'</td>
    <td>'.$this->ifunction->ifnull($dt_subchapter_13_5[5]).'</td>
    <td>'.$this->ifunction->ifnull($dt_subchapter_13_5[6]).'</td>
    <td>'.$this->ifunction->ifnull($dt_subchapter_13_5[7]).'</td>
    <td>'.$this->ifunction->ifnull($dt_subchapter_13_5[8]).'</td>
    <td>'.$this->ifunction->ifnull($dt_subchapter_13_5[9]).'</td>
    <td align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_13_5[3]=='OK') echo '_checked'; echo '.jpg"></td>
    <td align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_13_5[3]=='Not OK') echo '_checked'; echo '.jpg"></td>
    <td align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_13_5[3]=='N/A') echo '_checked'; echo '.jpg"></td>
    <td>'.$this->ifunction->ifnull($dt_subchapter_13_5[10]).'</td></tr>';
}
?>  
</table>
<br />
<br />
<?php $Qsubchapter = $this->db->query("SELECT `content` FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `chapter`='13' AND `no_chapter`='13.6' ORDER BY `subno_chapter_order` ASC");
foreach($Qsubchapter->result_object() as $subchapter) $arr_subchapter_13_6[]=$subchapter; 

$dt_subchapter_13_6a = explode('|', $arr_subchapter_13_6[0]->content);
?>
<p><b>SECTOR 3 : MCC=<?php echo $this->ifunction->ifnull($dt_subchapter_13_6a[3]) ?>, MNC=<?php echo $this->ifunction->ifnull($dt_subchapter_13_6a[4]) ?>, LAC=<?php echo $this->ifunction->ifnull($dt_subchapter_13_6a[5]) ?>, CELL ID =<?php echo $this->ifunction->ifnull($dt_subchapter_13_6a[6]) ?>, ARFCN/BCCH =<?php echo $this->ifunction->ifnull($dt_subchapter_13_6a[7]) ?></b></p>
<br />
<?php $Qsubchapter = $this->db->query("SELECT `content` FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `chapter`='13' AND `no_chapter`='13.7' ORDER BY `subno_chapter_order` ASC");
foreach($Qsubchapter->result_object() as $subchapter) $arr_subchapter_13_7[]=$subchapter ?>
<table class="border" cellpadding="0" cellspacing="0">
  <tr class="header">
    <td width="80" rowspan="2"><b>Item Test</b></td>
    <td width="50" rowspan="2"><b>Host Address</b></td>
    <td colspan="2" valign="top"><b>Downlink</b></td>
    <td colspan="2" valign="top"><b>Uplink</b></td>
    <td width="50" rowspan="2"><b>Throughput / Delay</b></td>
    <td width="100" colspan="3" valign="top"><b>Test Call Result</b></td>
    <td rowspan="2"><b>REMARK</b></td>
  </tr>
  <tr class="header">
    <td width="30" valign="top">TS</td>
    <td width="30" valign="top">MCS</td>
    <td width="30" valign="top">TS</td>
    <td width="30" valign="top">MCS</td>
    <td width="30" valign="top">Ok</td>
    <td valign="top">NOk</td>
    <td valign="top">N/A</td>
  </tr>
  <?php
$arr_dt_137 = array('PING', 'WAP', 'HTTP', 'FTP Downlink', 'FTP Uplink', 'Video Streaming');
for($i=0; $i <= 5; $i++){
	$dt_subchapter_13_7 = explode('|', $arr_subchapter_13_7[$i]->content);
	echo '<tr>
	<td><b>'.$arr_dt_137[$i].'</b></td>
	<td>'.$this->ifunction->ifnull($dt_subchapter_13_7[4]).'</td>
    <td>'.$this->ifunction->ifnull($dt_subchapter_13_7[5]).'</td>
    <td>'.$this->ifunction->ifnull($dt_subchapter_13_7[6]).'</td>
    <td>'.$this->ifunction->ifnull($dt_subchapter_13_7[7]).'</td>
    <td>'.$this->ifunction->ifnull($dt_subchapter_13_7[8]).'</td>
    <td>'.$this->ifunction->ifnull($dt_subchapter_13_7[9]).'</td>
    <td align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_13_7[3]=='OK') echo '_checked'; echo '.jpg"></td>
    <td align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_13_7[3]=='Not OK') echo '_checked'; echo '.jpg"></td>
    <td align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_13_7[3]=='N/A') echo '_checked'; echo '.jpg"></td>
    <td>'.$this->ifunction->ifnull($dt_subchapter_13_7[10]).'</td></tr>';
}
?> 
</table>
<br /><br />

<?php $Qchapter = $this->db->query("SELECT `content` FROM `it_atp_chapter` WHERE `atp_id`='$dx' AND `chapter`='14' ORDER BY `atp_chapter_id` ASC");
foreach($Qchapter->result_object() as $chapter) $arr_chapter_14[]=$chapter ?>

<table class="border" cellpadding="0" cellspacing="0">
  <tr class="header">
    <td width="40">Chapter</td>
    <td>Title work performed</td>
    <td width="30">OK</td>
    <td width="40">Not OK</td>
    <td>N/A</td>
    <td width="90">Remark</td>
  </tr>
  <tr>
    <td valign="top"> <b>14</b>&nbsp;<br />
      <br />
      14.1<br />
      14.2<br />
      14.3</td>
    <td  valign="top"> <b>Checking Site Condition</b>&nbsp;<br />
      Before leaving for the site :<br />
      &bull; Site condition must be clean<br />
      &bull; No damage at site environment<br />
      &bull; All Infrastructures inside the BTS should have the same condition as previous </td>
    <td valign="top" align="center">
		<?php echo '<br><br>';
		for($i=0; $i <= 2; $i++){
			echo '<img src="'.base_url().'static/i/radio'; if($arr_chapter_14[$i]->content=='OK') echo '_checked'; echo '.jpg"><br>';
		}
		?></td>
    <td valign="top" align="center">
		<?php echo '<br><br>';
		for($i=0; $i <= 2; $i++){
			echo '<img src="'.base_url().'static/i/radio'; if($arr_chapter_14[$i]->content=='Not OK') echo '_checked'; echo '.jpg"><br>';
		}
		?></td>
    <td valign="top" align="center">
		<?php echo '<br><br>';
		for($i=0; $i <= 2; $i++){
			echo '<img src="'.base_url().'static/i/radio'; if($arr_chapter_14[$i]->content=='N/A') echo '_checked'; echo '.jpg"><br>';
		}
		?></td>
    <td  align="center" valign="top">
	<?php echo '<br><br>';
		for($i=0; $i <= 2; $i++){
			echo 'Minor<br>';
		}
		?></td>
  </tr>
</table>

<hr />

<h3>C. Acceptance Test For Antenna System</h3>
<?php $Qchapter = $this->db->query("SELECT `content` FROM `it_atp_chapter` WHERE `atp_id`='$dx' AND `chapter`='15' ORDER BY `atp_chapter_id` ASC");
foreach($Qchapter->result_object() as $chapter) $arr_chapter_15[]=$chapter ?>
<table class="border" cellpadding="0" cellspacing="0">
  <tr class="header">
    <td width="40">Chapter</td>
    <td>Title work performed</td>
    <td width="30">OK</td>
    <td width="40">Not OK</td>
    <td>N/A</td>
    <td width="90">Remark</td>
  </tr>
  <tr>
    <td  valign="top"><b>15</b>&nbsp;<br />
      15.1<br />
      15.2</td>
    <td valign="top"><b>Antenna System Preliminary Check</b>&nbsp;<br />
      &bull; Tools/Equipment for Test (<i>see    table 11)</i><br />
      &bull; Documentation Check<i>(see table 12)</i></td>
    <td valign="top" align="center"><?php echo '<br>';
		for($i=0; $i <= 1; $i++){
			echo '<img src="'.base_url().'static/i/radio'; if($arr_chapter_15[$i]->content=='OK') echo '_checked'; echo '.jpg"><br>';
		}
		?></td>
    <td valign="top" align="center"><?php echo '<br>';
		for($i=0; $i <= 1; $i++){
			echo '<img src="'.base_url().'static/i/radio'; if($arr_chapter_15[$i]->content=='Not OK') echo '_checked'; echo '.jpg"><br>';
		}
		?></td>
    <td valign="top" align="center"><?php echo '<br>';
		for($i=0; $i <= 1; $i++){
			echo '<img src="'.base_url().'static/i/radio'; if($arr_chapter_15[$i]->content=='N/A') echo '_checked'; echo '.jpg"><br>';
		}
		?></td>
    <td align="center" valign="top"><br>Major<br />
      Major</td>
  </tr>
</table>
<br />
<p align="center"><b>Table 11: Tools/Equipment for Test</b></p>

<?php $Qsubchapter = $this->db->query("SELECT `content` FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `chapter`='15' AND `no_chapter`='15.1' ORDER BY `subno_chapter_order` ASC");
foreach($Qsubchapter->result_object() as $subchapter) $arr_subchapter_15_1[]=$subchapter ?>

<table class="border" cellpadding="0" cellspacing="0">
  <tr class="header">
    <td width="40">Test No</td>
    <td>Equipment</td>
    <td>Type</td>
    <td>Serial Number</td>
    <td>Validity of Calibration    Date</td>
    <td width="30">OK</td>
    <td width="40">NOK</td>
    <td>N.A</td>
  </tr>
  <?php
$arr_dt_151 = array('Network Analyzer', 'Site Master', 'Calibration kit', 'Dummy load (DC-4 GHz)', 'Short connector', 'Flexible Cable');
for($i=0; $i <= 5; $i++){
	$dt_subchapter_15_1 = explode('|', $arr_subchapter_15_1[$i]->content);
	echo '<tr><td>15.1.'.($i +1).'</td><td>'.$arr_dt_151[$i].'</td>';
	echo '<td>'.$this->ifunction->ifnull($dt_subchapter_15_1[4]).'</td><td>'.$this->ifunction->ifnull($dt_subchapter_15_1[5]).'</td><td>'.$this->ifunction->ifnull($dt_subchapter_15_1[6]).'</td><td align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_15_1[3]=='OK') echo '_checked'; echo '.jpg"></td><td align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_15_1[3]=='Not OK') echo '_checked'; echo '.jpg"></td><td align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_15_1[3]=='N/A') echo '_checked'; echo '.jpg"></td></tr>';
}
?>  
</table>
<br />
<p align="center"><b>Table 12: Documentation Check</b></p>

<?php $Qsubchapter = $this->db->query("SELECT `content` FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `chapter`='15' AND `no_chapter`='15.2' ORDER BY `subno_chapter_order` ASC");
foreach($Qsubchapter->result_object() as $subchapter) $arr_subchapter_15_2[]=$subchapter ?>

<table class="border" cellpadding="0" cellspacing="0">
  <tr class="header">
    <td width="40">Chapter</td>
    <td>Item</td>
    <td width="30">OK</td>
    <td width="40">Not OK</td>
    <td>N/A</td>
    <td width="90">Remarks</td>
  </tr>
  
  <?php
$arr_dt_152 = array('Technical room/Site documentation/lay out.', 'Manufacture/Factory Test Result Antenna part from the pack.', 'Specification equipment Antenna, Cable, Connector, Splitter, Coupler, arrester, filter, TMA etc.', 'Inventory list ( ref. BoQ)', 'NDB Document');
for($i=0; $i <= 4; $i++){
	$dt_subchapter_15_2 = explode('|', $arr_subchapter_15_2[$i]->content);
	echo '<tr><td>15.2.'.($i +1);
	echo '</td><td>'.$arr_dt_152[$i];
	echo '</td><td align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_15_2[3]=='OK') echo '_checked'; echo '.jpg"></td>';
	echo '<td align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_15_2[3]=='Not OK') echo '_checked'; echo '.jpg"></td>';
	echo '</td><td align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_15_2[3]=='N/A') echo '_checked'; echo '.jpg"></td>';
	echo '<td>'.$this->ifunction->ifnull($dt_subchapter_15_2[4]).'</td></tr>';
}
?>
</table>
<i>Note: All documents should be attached</i><br />
<br /><br /><br />

<?php $Qchapter = $this->db->query("SELECT `content` FROM `it_atp_chapter` WHERE `atp_id`='$dx' AND `chapter`='16' ORDER BY `atp_chapter_id` ASC");
foreach($Qchapter->result_object() as $chapter) $arr_chapter_16[]=$chapter; 
//1 2 3 4 5
?>

<table class="border" cellpadding="0" cellspacing="0">
  <tr class="header">
    <td width="40">Chapter</td>
    <td>Title work performed</td>
    <td width="30">OK</td>
    <td width="40">Not OK</td>
    <td>N/A</td>
    <td width="90">Remark</td>
  </tr>
  <tr>
    <td  valign="top">
      <b>16</b>&nbsp;<br />
        16.1<br />
        16.2<br />
        16.3<br />
        16.4<br />
        16.5<br />
        16.6</td>
    <td  valign="top">
      <b>Antenna System Inventory Check</b>&nbsp;<br />
        Equipment Quantity check <i>(see table 13)</i><br />
        Connector type <i>(see    table 14)</i><br />
        Antenna Table Connection <i>(see table 15)</i><br />
        Coaxial Feeder <i>(see    table 16)</i><br />
        Top Jumper <i>(see    table 17)</i><br />
        Bottom Jumper <i>(see    table 18)</i></td>
    <td valign="top" align="center"><?php echo '<br>';
		for($i=0; $i <= 5; $i++){
			echo '<img src="'.base_url().'static/i/radio'; if($arr_chapter_16[$i]->content=='OK') echo '_checked'; echo '.jpg"><br>';
		}
		?></td>
     <td valign="top" align="center"><?php echo '<br>';
		for($i=0; $i <= 5; $i++){
			echo '<img src="'.base_url().'static/i/radio'; if($arr_chapter_16[$i]->content=='Not OK') echo '_checked'; echo '.jpg"><br>';
		}
		?></td>
   <td valign="top" align="center"><?php echo '<br>';
		for($i=0; $i <= 5; $i++){
			echo '<img src="'.base_url().'static/i/radio'; if($arr_chapter_16[$i]->content=='N/A') echo '_checked'; echo '.jpg"><br>';
		}
		?></td>
    <td valign="top" align="center"><?php echo '<br>';
		for($i=0; $i <= 2; $i++){
			echo 'Minor<br>';
		}
		for($i=0; $i <= 2; $i++){
			echo 'Major<br>';
		}
		?></td>
  </tr>
</table><br>

<hr />

<p align="center"><b>Table 13: Equipment Quantity Check</b></p><br>

<?php $Qsubchapter = $this->db->query("SELECT `content` FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `chapter`='16' AND `no_chapter`='16.1' ORDER BY `subno_chapter_order` ASC");
foreach($Qsubchapter->result_object() as $subchapter) $arr_subchapter_16_1[]=$subchapter;
$dt_subchapter_16_1a = explode('|', $arr_subchapter_16_1[0]->content);
$dt_subchapter_16_1b = explode('|', $arr_subchapter_16_1[1]->content);
$dt_subchapter_16_1c = explode('|', $arr_subchapter_16_1[2]->content);
$dt_subchapter_16_1d = explode('|', $arr_subchapter_16_1[3]->content) ?>

<table class="border" cellpadding="0" cellspacing="0">
  <tr>
    <td valign="top" width="40">16.1.1</td>
    <td valign="top">Antenna Polarization </td>
    <td colspan="13" valign="top"><?php echo '<img src="'.base_url().'static/i/radio'; if($dt_subchapter_16_1a[3]=='1') echo '_checked'; echo '.jpg">' ?> Single Polarization <font color="#FFF">......</font> <?php echo '<img src="'.base_url().'static/i/radio'; if($dt_subchapter_16_1a[3]=='2') echo '_checked'; echo '.jpg">' ?> Dual Polarization</td>
  </tr>
  <tr>
    <td valign="top">16.1.2</td>
    <td valign="top">Band Frequency</td>
    <td colspan="13" valign="top"><?php echo '<img src="'.base_url().'static/i/radio'; if($dt_subchapter_16_1b[3]=='1') echo '_checked'; echo '.jpg">' ?> GSM 900 <font color="#FFF">......</font><?php echo '<img src="'.base_url().'static/i/radio'; if($dt_subchapter_16_1b[3]=='2') echo '_checked'; echo '.jpg">' ?> GSM 1800 <font color="#FFF">......</font><?php echo '<img src="'.base_url().'static/i/radio'; if($dt_subchapter_16_1b[3]=='3') echo '_checked'; echo '.jpg">' ?> GSM 900 &amp; 1800</td>
  </tr>
  <tr>
    <td valign="top">16.1.3</td>
    <td valign="top">Number of sectors</td>
    <td colspan="13" valign="top"><?php echo '<img src="'.base_url().'static/i/radio'; if($dt_subchapter_16_1c[3]=='1') echo '_checked'; echo '.jpg">' ?> Omni <font color="#FFF">......</font><?php echo '<img src="'.base_url().'static/i/radio'; if($dt_subchapter_16_1c[3]=='2') echo '_checked'; echo '.jpg">' ?> One <font color="#FFF">......</font><?php echo '<img src="'.base_url().'static/i/radio'; if($dt_subchapter_16_1c[3]=='3') echo '_checked'; echo '.jpg">' ?>  Two <font color="#FFF">......</font><?php echo '<img src="'.base_url().'static/i/radio'; if($dt_subchapter_16_1c[3]=='4') echo '_checked'; echo '.jpg">' ?> Three <font color="#FFF">......</font><?php echo '<img src="'.base_url().'static/i/radio'; if($dt_subchapter_16_1c[3]=='5') echo '_checked'; echo '.jpg">' ?> Indoor System</td>
  </tr>
  <tr>
    <td valign="top">16.1.4</td>
    <td valign="top">Type of Diversity</td>
    <td colspan="13" valign="top"><?php echo '<img src="'.base_url().'static/i/radio'; if($dt_subchapter_16_1d[3]=='1') echo '_checked'; echo '.jpg">' ?> Polarization <font color="#FFF">......</font><?php echo '<img src="'.base_url().'static/i/radio'; if($dt_subchapter_16_1d[3]=='2') echo '_checked'; echo '.jpg">' ?> Space <font color="#FFF">......</font><?php echo '<img src="'.base_url().'static/i/radio'; if($dt_subchapter_16_1d[3]=='3') echo '_checked'; echo '.jpg">' ?> No Diversity</td>
  </tr>
  <tr>
    <td valign="top">16.1.5</td>
    <td valign="top">Number of Installed Antenna</td>
    <td colspan="13" valign="top">&nbsp;</td>
  </tr>
  <?php
$i161 = 4;
$arr_dt_161 = array(1=> 'New Antenna', 'Old Antenna');
for($i=1; $i <= 2; $i++){
	$dt_subchapter_16_1 = explode('|', $arr_subchapter_16_1[$i161]->content);
	echo '<tr><td>16.1.5.'.$i.'</td><td width="160">'.$arr_dt_161[$i].'</td>';
	echo '<td valign="top" width="30"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_16_1[3]=='2') echo '_checked'; echo '.jpg"> 2</td><td colspan="2" valign="top" width="30"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_16_1[3]=='3') echo '_checked'; echo '.jpg"> 3</td><td colspan="2" valign="top" width="30"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_16_1[3]=='4') echo '_checked'; echo '.jpg"> 4</td><td colspan="2" valign="top" width="30"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_16_1[3]=='5') echo '_checked'; echo '.jpg"> 5</td><td colspan="3" valign="top" width="30"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_16_1[3]=='6') echo '_checked'; echo '.jpg"> 6</td><td colspan="2" valign="top"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_16_1[3]=='7') echo '_checked'; echo '.jpg"> Other:</td><td valign="top"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_16_1[3]=='8') echo '_checked'; echo '.jpg"> N/A</td>';
	echo '</tr>';
	$i161++;
}
?>  
  <tr>
    <td valign="top">16.1.6</td>
    <td valign="top">Number of Installed Filter</td>
    <td colspan="13" valign="top">&nbsp;</td>
  </tr>
  <?php
$i161 = 6;
$arr_dt_161 = array(1=> 'New Filter', 'Old Filter');
for($i=1; $i <= 2; $i++){
	$dt_subchapter_16_1 = explode('|', $arr_subchapter_16_1[$i161]->content);
	echo '<tr><td>16.1.6.'.$i.'</td><td width="160">'.$arr_dt_161[$i].'</td>';
	echo '<td valign="top" width="30"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_16_1[3]=='2') echo '_checked'; echo '.jpg"> 2</td><td colspan="2" valign="top" width="30"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_16_1[3]=='3') echo '_checked'; echo '.jpg"> 3</td><td colspan="2" valign="top" width="30"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_16_1[3]=='4') echo '_checked'; echo '.jpg"> 4</td><td colspan="2" valign="top" width="30"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_16_1[3]=='5') echo '_checked'; echo '.jpg"> 5</td><td colspan="3" valign="top" width="30"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_16_1[3]=='6') echo '_checked'; echo '.jpg"> 6</td><td colspan="2" valign="top"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_16_1[3]=='7') echo '_checked'; echo '.jpg"> Other:</td><td valign="top"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_16_1[3]=='8') echo '_checked'; echo '.jpg"> N/A</td>';
	echo '</tr>';
	$i161++;
}
?> 
  <tr>
    <td valign="top">16.1.7</td>
    <td valign="top">Number of EMP/Connector arrester</td>
    <td colspan="13" valign="top">&nbsp;</td>
  </tr>
  <?php
$i161 = 8;
$arr_dt_161 = array(1=> 'New EMP/Connecter arrester', 'Old EMP/Connector arrester');
for($i=1; $i <= 2; $i++){
	$dt_subchapter_16_1 = explode('|', $arr_subchapter_16_1[$i161]->content);
	echo '<tr><td>16.1.7.'.$i.'</td><td width="160">'.$arr_dt_161[$i].'</td>';
	echo '<td valign="top" width="30"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_16_1[3]=='2') echo '_checked'; echo '.jpg"> 2</td><td colspan="2" valign="top" width="30"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_16_1[3]=='3') echo '_checked'; echo '.jpg"> 3</td><td colspan="2" valign="top" width="30"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_16_1[3]=='4') echo '_checked'; echo '.jpg"> 4</td><td colspan="2" valign="top" width="30"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_16_1[3]=='5') echo '_checked'; echo '.jpg"> 5</td><td colspan="3" valign="top" width="30"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_16_1[3]=='6') echo '_checked'; echo '.jpg"> 6</td><td colspan="2" valign="top"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_16_1[3]=='7') echo '_checked'; echo '.jpg"> Other:</td><td valign="top"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_16_1[3]=='8') echo '_checked'; echo '.jpg"> N/A</td>';
	echo '</tr>';
	$i161++;
}
?>
<tr>
    <td valign="top">16.1.8</td>
    <td valign="top">Number of Duplexer</td>
    <td colspan="13" valign="top">&nbsp;</td>
  </tr>
  <?php
$i161 = 10;
$arr_dt_161 = array(1=> 'New Duplexer', 'Old Duplexer');
for($i=1; $i <= 2; $i++){
	$dt_subchapter_16_1 = explode('|', $arr_subchapter_16_1[$i161]->content);
	echo '<tr><td>16.1.8.'.$i.'</td><td width="160">'.$arr_dt_161[$i].'</td>';
	echo '<td valign="top" width="30"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_16_1[3]=='2') echo '_checked'; echo '.jpg"> 2</td><td colspan="2" valign="top" width="30"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_16_1[3]=='3') echo '_checked'; echo '.jpg"> 3</td><td colspan="2" valign="top" width="30"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_16_1[3]=='4') echo '_checked'; echo '.jpg"> 4</td><td colspan="2" valign="top" width="30"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_16_1[3]=='5') echo '_checked'; echo '.jpg"> 5</td><td colspan="3" valign="top" width="30"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_16_1[3]=='6') echo '_checked'; echo '.jpg"> 6</td><td colspan="2" valign="top"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_16_1[3]=='7') echo '_checked'; echo '.jpg"> Other:</td><td valign="top"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_16_1[3]=='8') echo '_checked'; echo '.jpg"> N/A</td>';
	echo '</tr>';
	$i161++;
}
?>  
  <tr>
    <td valign="top">16.1.9</td>
    <td valign="top">Number of Diplexer Dual Band</td>
    <td colspan="13" valign="top">&nbsp;</td>
  </tr>
  <?php
$i161 = 12;
$arr_dt_161 = array(1=> 'New Diplexer Dual Band', 'Old Diplexer Dual Band');
for($i=1; $i <= 2; $i++){
	$dt_subchapter_16_1 = explode('|', $arr_subchapter_16_1[$i161]->content);
	echo '<tr><td>16.1.9.'.$i.'</td><td width="160">'.$arr_dt_161[$i].'</td>';
	echo '<td valign="top" width="30"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_16_1[3]=='2') echo '_checked'; echo '.jpg"> 2</td><td colspan="2" valign="top" width="30"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_16_1[3]=='3') echo '_checked'; echo '.jpg"> 3</td><td colspan="2" valign="top" width="30"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_16_1[3]=='4') echo '_checked'; echo '.jpg"> 4</td><td colspan="2" valign="top" width="30"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_16_1[3]=='5') echo '_checked'; echo '.jpg"> 5</td><td colspan="3" valign="top" width="30"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_16_1[3]=='6') echo '_checked'; echo '.jpg"> 6</td><td colspan="2" valign="top"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_16_1[3]=='7') echo '_checked'; echo '.jpg"> Other:</td><td valign="top"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_16_1[3]=='8') echo '_checked'; echo '.jpg"> N/A</td>';
	echo '</tr>';
	$i161++;
}
?>  
  <tr>
    <td valign="top">16.1.10</td>
    <td valign="top">Number of Splitter Two Way</td>
    <td colspan="13" valign="top">&nbsp;</td>
  </tr>
  <?php
$i161 = 14;
$arr_dt_161 = array(1=> 'New Splitter Two Way', 'Old Splitter Two Way');
for($i=1; $i <= 2; $i++){
	$dt_subchapter_16_1 = explode('|', $arr_subchapter_16_1[$i161]->content);
	echo '<tr><td>16.1.10.'.$i.'</td><td width="160">'.$arr_dt_161[$i].'</td>';
	echo '<td valign="top" width="30"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_16_1[3]=='2') echo '_checked'; echo '.jpg"> 2</td><td colspan="2" valign="top" width="30"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_16_1[3]=='3') echo '_checked'; echo '.jpg"> 3</td><td colspan="2" valign="top" width="30"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_16_1[3]=='4') echo '_checked'; echo '.jpg"> 4</td><td colspan="2" valign="top" width="30"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_16_1[3]=='5') echo '_checked'; echo '.jpg"> 5</td><td colspan="3" valign="top" width="30"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_16_1[3]=='6') echo '_checked'; echo '.jpg"> 6</td><td colspan="2" valign="top"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_16_1[3]=='7') echo '_checked'; echo '.jpg"> Other:</td><td valign="top"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_16_1[3]=='8') echo '_checked'; echo '.jpg"> N/A</td>';
	echo '</tr>';
	$i161++;
}
?>  
  <tr>
    <td valign="top">16.1.11</td>
    <td valign="top">Number of Splitter Three Way</td>
    <td colspan="13" valign="top">&nbsp;</td>
  </tr>
  <?php
$i161 = 16;
$arr_dt_161 = array(1=> 'New Splitter Three Way', 'Old Splitter Three Way');
for($i=1; $i <= 2; $i++){
	$dt_subchapter_16_1 = explode('|', $arr_subchapter_16_1[$i161]->content);
	echo '<tr><td>16.1.11.'.$i.'</td><td width="160">'.$arr_dt_161[$i].'</td>';
	echo '<td valign="top" width="30"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_16_1[3]=='2') echo '_checked'; echo '.jpg"> 2</td><td colspan="2" valign="top" width="30"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_16_1[3]=='3') echo '_checked'; echo '.jpg"> 3</td><td colspan="2" valign="top" width="30"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_16_1[3]=='4') echo '_checked'; echo '.jpg"> 4</td><td colspan="2" valign="top" width="30"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_16_1[3]=='5') echo '_checked'; echo '.jpg"> 5</td><td colspan="3" valign="top" width="30"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_16_1[3]=='6') echo '_checked'; echo '.jpg"> 6</td><td colspan="2" valign="top"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_16_1[3]=='7') echo '_checked'; echo '.jpg"> Other:</td><td valign="top"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_16_1[3]=='8') echo '_checked'; echo '.jpg"> N/A</td>';
	echo '</tr>';
	$i161++;
}
?>  
  <tr>
    <td valign="top">16.1.12</td>
    <td valign="top">Number of Splitter Four Way</td>
    <td colspan="13" valign="top">&nbsp;</td>
  </tr>
  <?php
$i161 = 18;
$arr_dt_161 = array(1=> 'New Splitter Four Way', 'Old Splitter Four Way');
for($i=1; $i <= 2; $i++){
	$dt_subchapter_16_1 = explode('|', $arr_subchapter_16_1[$i161]->content);
	echo '<tr><td>16.1.12.'.$i.'</td><td width="160">'.$arr_dt_161[$i].'</td>';
	echo '<td valign="top" width="30"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_16_1[3]=='2') echo '_checked'; echo '.jpg"> 2</td><td colspan="2" valign="top" width="30"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_16_1[3]=='3') echo '_checked'; echo '.jpg"> 3</td><td colspan="2" valign="top" width="30"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_16_1[3]=='4') echo '_checked'; echo '.jpg"> 4</td><td colspan="2" valign="top" width="30"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_16_1[3]=='5') echo '_checked'; echo '.jpg"> 5</td><td colspan="3" valign="top" width="30"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_16_1[3]=='6') echo '_checked'; echo '.jpg"> 6</td><td colspan="2" valign="top"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_16_1[3]=='7') echo '_checked'; echo '.jpg"> Other:</td><td valign="top"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_16_1[3]=='8') echo '_checked'; echo '.jpg"> N/A</td>';
	echo '</tr>';
	$i161++;
}
?>  
  <tr>
    <td valign="top">16.1.13</td>
    <td valign="top">Number of Taper</td>
    <td colspan="13" valign="top">&nbsp;</td>
  </tr>
  <?php
$i161 = 20;
$arr_dt_161 = array(1=> 'New Taper', 'Old Filter');
for($i=1; $i <= 2; $i++){
	$dt_subchapter_16_1 = explode('|', $arr_subchapter_16_1[$i161]->content);
	echo '<tr><td>16.1.13.'.$i.'</td><td width="160">'.$arr_dt_161[$i].'</td>';
	echo '<td valign="top" width="30"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_16_1[3]=='2') echo '_checked'; echo '.jpg"> 2</td><td colspan="2" valign="top" width="30"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_16_1[3]=='3') echo '_checked'; echo '.jpg"> 3</td><td colspan="2" valign="top" width="30"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_16_1[3]=='4') echo '_checked'; echo '.jpg"> 4</td><td colspan="2" valign="top" width="30"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_16_1[3]=='5') echo '_checked'; echo '.jpg"> 5</td><td colspan="3" valign="top" width="30"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_16_1[3]=='6') echo '_checked'; echo '.jpg"> 6</td><td colspan="2" valign="top"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_16_1[3]=='7') echo '_checked'; echo '.jpg"> Other:</td><td valign="top"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_16_1[3]=='8') echo '_checked'; echo '.jpg"> N/A</td>';
	echo '</tr>';
	$i161++;
}
?>  
  <tr>
    <td valign="top">16.1.14</td>
    <td valign="top">Number of Hybrid Coupler</td>
    <td colspan="13" valign="top">&nbsp;</td>
  </tr>
  <?php
$i161 = 22;
$arr_dt_161 = array(1=> 'New Hybrid Coupler', 'Old Hybrid Coupler');
for($i=1; $i <= 2; $i++){
	$dt_subchapter_16_1 = explode('|', $arr_subchapter_16_1[$i161]->content);
	echo '<tr><td>16.1.14.'.$i.'</td><td width="160">'.$arr_dt_161[$i].'</td>';
	echo '<td valign="top" width="30"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_16_1[3]=='2') echo '_checked'; echo '.jpg"> 2</td><td colspan="2" valign="top" width="30"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_16_1[3]=='3') echo '_checked'; echo '.jpg"> 3</td><td colspan="2" valign="top" width="30"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_16_1[3]=='4') echo '_checked'; echo '.jpg"> 4</td><td colspan="2" valign="top" width="30"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_16_1[3]=='5') echo '_checked'; echo '.jpg"> 5</td><td colspan="3" valign="top" width="30"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_16_1[3]=='6') echo '_checked'; echo '.jpg"> 6</td><td colspan="2" valign="top"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_16_1[3]=='7') echo '_checked'; echo '.jpg"> Other:</td><td valign="top"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_16_1[3]=='8') echo '_checked'; echo '.jpg"> N/A</td>';
	echo '</tr>';
	$i161++;
}
?>  
  <tr>
    <td valign="top">16.1.15</td>
    <td valign="top">Number of TMA</td>
    <td colspan="13" valign="top">&nbsp;</td>
  </tr>
  <?php
$i161 = 24;
$arr_dt_161 = array(1=> 'New TMA', 'Old TMA');
for($i=1; $i <= 2; $i++){
	$dt_subchapter_16_1 = explode('|', $arr_subchapter_16_1[$i161]->content);
	echo '<tr><td>16.1.15.'.$i.'</td><td width="160">'.$arr_dt_161[$i].'</td>';
	echo '<td valign="top" width="30"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_16_1[3]=='2') echo '_checked'; echo '.jpg"> 2</td><td colspan="2" valign="top" width="30"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_16_1[3]=='3') echo '_checked'; echo '.jpg"> 3</td><td colspan="2" valign="top" width="30"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_16_1[3]=='4') echo '_checked'; echo '.jpg"> 4</td><td colspan="2" valign="top" width="30"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_16_1[3]=='5') echo '_checked'; echo '.jpg"> 5</td><td colspan="3" valign="top" width="30"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_16_1[3]=='6') echo '_checked'; echo '.jpg"> 6</td><td colspan="2" valign="top"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_16_1[3]=='7') echo '_checked'; echo '.jpg"> Other:</td><td valign="top"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_16_1[3]=='8') echo '_checked'; echo '.jpg"> N/A</td>';
	echo '</tr>';
	$i161++;
}
?>  
  <tr>
    <td valign="top">&nbsp;</td>
    <td valign="top">&nbsp;</td>
    <td colspan="13" valign="top">&nbsp;</td>
  </tr> 
  
</table><br>
<i>Note : 	EMP = Electro Magnetic Protection;  TSND = Three Sector with Non Diversity<br>TSD = Three Sector with Diversity; TMA = Tower Mounted Amplifier</i><br>

<hr />

<center><b>Table 14: Connector Type List </b></center>

<?php $Qsubchapter = $this->db->query("SELECT `content` FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `chapter`='16' AND `no_chapter`='16.2' ORDER BY `subno_chapter_order` ASC");
foreach($Qsubchapter->result_object() as $subchapter) $arr_subchapter_16_2[]=$subchapter ?>

<table class="border" cellpadding="0" cellspacing="0">
  <tr class="header">
    <td width="40">Test No</td>
    <td>Feeder Connector Type</td>
    <td>Brand</td>
    <td>QTY</td>
    <td width="30">OK</td>
    <td width="40">NOK</td>
    <td>N.A</td>
    <td>Remark</td>
  </tr>
  <?php
$arr_dt_162 = array('1/2 " N Male', '1/2 " N Female', '7/16 " DIN Male', '7/16 " DIN Female', '7/8 " Male', '7/8 " Female', '1 1/4 " Male', '1 1/4 " Female', '1 5/8 " Male', '1 5/8 " Female');
for($i=0; $i <= 9; $i++){
	$dt_subchapter_16_2 = explode('|', $arr_subchapter_16_2[$i]->content);
	echo '<tr><td>16.2.'.($i +1).'</td><td>'.$arr_dt_162[$i].'</td>';
	echo '<td>'.$this->ifunction->ifnull($dt_subchapter_16_2[4]).'</td><td>'.$this->ifunction->ifnull($dt_subchapter_16_2[5]).'</td><td align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_16_2[3]=='OK') echo '_checked'; echo '.jpg"></td><td align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_16_2[3]=='Not OK') echo '_checked'; echo '.jpg"></td><td align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_16_2[3]=='N/A') echo '_checked'; echo '.jpg"></td><td>'.$this->ifunction->ifnull($dt_subchapter_16_2[6]).'</td></tr>';
}
?>  
</table>

<center><b>Table 15: Antenna Table</b></center>

<?php $Qsubchapter = $this->db->query("SELECT `content` FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `chapter`='16' AND `no_chapter`='16.3' ORDER BY `subno_chapter_order` ASC");
foreach($Qsubchapter->result_object() as $subchapter) $arr_subchapter_16_3[]=$subchapter ?>
	
<table class="border" cellpadding="0" cellspacing="0">
  <tr class="header">
    <td width="40">Test No</td>
    <td>Connection/Sector</td>
    <td>Type</td>
    <td>Brand</td>
    <td>Serial No.</td>
    <td width="120">Electrical Tilt (deg)*</td>
    <td>Remark</td>
  </tr>
  <?php
$arr_dt_163 = array('Sector 1 TRX', 'Sector 1 RXD', 'Sector 2 TRX', 'Sector 2 RXD', 'Sector 3 TRX', 'Sector 3 RXD', '', '');
for($i=0; $i <= 7; $i++){
	$dt_subchapter_16_3 = explode('|', $arr_subchapter_16_3[$i]->content);
	echo '<tr>'; if($i==6 || $i==7) echo '<td>16.3.</td>'; else echo '<td>16.3.'.($i +1).'</td>'; echo '<td>'.$arr_dt_163[$i].'</td>';
	echo '<td>'.$this->ifunction->ifnull($dt_subchapter_16_3[3]).'</td><td>'.$this->ifunction->ifnull($dt_subchapter_16_3[4]).'</td><td>'.$this->ifunction->ifnull($dt_subchapter_16_3[5]).'</td><td>'.$this->ifunction->ifnull($dt_subchapter_16_3[6]).'</td><td>'.$this->ifunction->ifnull($dt_subchapter_16_3[7]).'</td></tr>';
}
?> 
</table>
<center><b>Table 16: Coaxial Feeder </b></center>

<?php $Qsubchapter = $this->db->query("SELECT `content` FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `chapter`='16' AND `no_chapter`='16.4' ORDER BY `subno_chapter_order` ASC");
foreach($Qsubchapter->result_object() as $subchapter) $arr_subchapter_16_4[]=$subchapter ?>

<table class="border" cellpadding="0" cellspacing="0">
  <tr class="header">
    <td width="40">Test No</td>
    <td>Connection/ Sector</td>
    <td>Type</td>
    <td>Brand</td>
    <td>Length (m)</td>
    <td width="30">OK</td>
    <td width="40">NOK</td>
    <td>N.A</td>
    <td>Remark</td>
  </tr>
  <?php
$arr_dt_164 = array('Sector 1 TRX', 'Sector 1 RXD', 'Sector 2 TRX', 'Sector 2 RXD', 'Sector 3 TRX', 'Sector 3 RXD', '', '');
for($i=0; $i <= 7; $i++){
	$dt_subchapter_16_4 = explode('|', $arr_subchapter_16_4[$i]->content);
	echo '<tr>'; if($i==6 || $i==7) echo '<td>16.4.</td>'; else echo '<td>16.4.'.($i +1).'</td>'; echo '<td>'.$arr_dt_164[$i].'</td>';
	echo '<td>'.$this->ifunction->ifnull($dt_subchapter_16_4[4]).'</td><td>'.$this->ifunction->ifnull($dt_subchapter_16_4[5]).'</td><td>'.$this->ifunction->ifnull($dt_subchapter_16_4[6]).'</td><td align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_16_4[3]=='OK') echo '_checked'; echo '.jpg"></td><td align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_16_4[3]=='Not OK') echo '_checked'; echo '.jpg"></td><td align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_16_4[3]=='N/A') echo '_checked'; echo '.jpg"></td><td>'.$this->ifunction->ifnull($dt_subchapter_16_4[7]).'</td></tr>';
}
?>  
</table>

<center><b>Table 17: Top Jumper</b></center>

<?php $Qsubchapter = $this->db->query("SELECT `content` FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `chapter`='16' AND `no_chapter`='16.5' ORDER BY `subno_chapter_order` ASC");
foreach($Qsubchapter->result_object() as $subchapter) $arr_subchapter_16_5[]=$subchapter ?>

<table class="border" cellpadding="0" cellspacing="0">
  <tr class="header">
    <td width="40">Test No</td>
    <td>Connection/ Sector</td>
    <td>Type</td>
    <td>Brand</td>
    <td>Length (m)</td>
    <td width="30">OK</td>
    <td width="40">NOK</td>
    <td>N.A</td>
    <td>Remark</td>
  </tr>
  <?php
$arr_dt_165 = array('Sector 1 TRX', 'Sector 1 RXD', 'Sector 2 TRX', 'Sector 2 RXD', 'Sector 3 TRX', 'Sector 3 RXD', '', '');
for($i=0; $i <= 7; $i++){
	$dt_subchapter_16_5 = explode('|', $arr_subchapter_16_5[$i]->content);
	echo '<tr>'; if($i==6 || $i==7) echo '<td>16.5.</td>'; else echo '<td>16.5.'.($i +1).'</td>'; echo '<td>'.$arr_dt_165[$i].'</td>';
	echo '<td>'.$this->ifunction->ifnull($dt_subchapter_16_5[4]).'</td><td>'.$this->ifunction->ifnull($dt_subchapter_16_5[5]).'</td><td>'.$this->ifunction->ifnull($dt_subchapter_16_5[6]).'</td><td align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_16_5[3]=='OK') echo '_checked'; echo '.jpg"></td><td align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_16_5[3]=='Not OK') echo '_checked'; echo '.jpg"></td><td align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_16_5[3]=='N/A') echo '_checked'; echo '.jpg"></td><td>'.$this->ifunction->ifnull($dt_subchapter_16_5[7]).'</td></tr>';
}
?> 
</table><br>

<hr />

<p align="center"><b>Table 18: Bottom Jumper</b></p>

<?php $Qsubchapter = $this->db->query("SELECT `content` FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `chapter`='16' AND `no_chapter`='16.6' ORDER BY `subno_chapter_order` ASC");
foreach($Qsubchapter->result_object() as $subchapter) $arr_subchapter_16_6[]=$subchapter ?>

<table class="border" cellpadding="0" cellspacing="0">
  <tr class="header">
    <td width="40">Test No</td>
    <td>Connection/ Sector</td>
    <td>Type</td>
    <td>Brand</td>
    <td>Length</td>
    <td width="30">OK</td>
    <td width="40">NOK</td>
    <td>N.A</td>
    <td>Remark</td>
  </tr>
  <?php
$arr_dt_166 = array('Sector 1 TRX', 'Sector 1 RXD', 'Sector 2 TRX', 'Sector 2 RXD', 'Sector 3 TRX', 'Sector 3 RXD', '', '');
for($i=0; $i <= 7; $i++){
	$dt_subchapter_16_6 = explode('|', $arr_subchapter_16_6[$i]->content);
	echo '<tr>'; if($i==6 || $i==7) echo '<td>16.6.</td>'; else echo '<td>16.6.'.($i +1).'</td>'; echo '<td>'.$arr_dt_166[$i].'</td>';
	echo '<td>'.$this->ifunction->ifnull($dt_subchapter_16_6[4]).'</td><td>'.$this->ifunction->ifnull($dt_subchapter_16_6[5]).'</td><td>'.$this->ifunction->ifnull($dt_subchapter_16_6[6]).'</td><td align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_16_6[3]=='OK') echo '_checked'; echo '.jpg"></td><td align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_16_6[3]=='Not OK') echo '_checked'; echo '.jpg"></td><td align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_16_6[3]=='N/A') echo '_checked'; echo '.jpg"></td><td>'.$this->ifunction->ifnull($dt_subchapter_16_6[7]).'</td></tr>';
}
?>
</table>
<p><i>Note: Length of Top & Bottom Jumper refer to BoQ document (Fabricated)</i></p>

<?php $Qchapter = $this->db->query("SELECT `content` FROM `it_atp_chapter` WHERE `atp_id`='$dx' AND `chapter`='17' ORDER BY `atp_chapter_id` ASC");
foreach($Qchapter->result_object() as $chapter) $arr_chapter_17[]=$chapter ?>

<table class="border" cellpadding="0" cellspacing="0">
  <tr class="header">
    <td width="40">Chapter</td>
    <td>Title work performed</td>
    <td width="30">OK</td>
    <td width="40">Not OK</td>
    <td>N/A</td>
    <td width="90">Remark</td>
  </tr>
  <tr>
    <td  valign="top"><b>17</b>&nbsp;<br />
      17.1<br />
      17.2<br />
      17.3<br />
        17.4</td>
    <td  valign="top"><b>Installation and Construction</b>&nbsp;<br />
      Installation/Execution for Antenna Outdoor <i>(see table 19)</i><br />
      Antenna System and Other    Component Labelling <i>(see table 20)</i><br />
      Orientation of Antenna <i>(see table 21)</i><br />
    Position of Antenna <i>(see table 22)</i></td>
    <td valign="top" align="center"><?php echo '<br>';
		for($i=0; $i <= 3; $i++){
			echo '<img src="'.base_url().'static/i/radio'; if($arr_chapter_17[$i]->content=='OK') echo '_checked'; echo '.jpg"><br>';
		}
		?></td>
    <td valign="top" align="center"><?php echo '<br>';
		for($i=0; $i <= 3; $i++){
			echo '<img src="'.base_url().'static/i/radio'; if($arr_chapter_17[$i]->content=='Not OK') echo '_checked'; echo '.jpg"><br>';
		}
		?></td>
    <td valign="top" align="center"><?php echo '<br>';
		for($i=0; $i <= 3; $i++){
			echo '<img src="'.base_url().'static/i/radio'; if($arr_chapter_17[$i]->content=='N/A') echo '_checked'; echo '.jpg"><br>';
		}
		?></td>
    <td valign="top" align="center"><?php echo '<br>';
		for($i=0; $i <= 3; $i++){
			echo 'Major<br>';
		}
		?></td>
  </tr>
</table><br>
<p align="center"><b>Table 19: Installation/Execution for Out Door Antenna System</b>
</p>

<?php $Qsubchapter = $this->db->query("SELECT `content` FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `chapter`='17' AND `no_chapter`='17.1' ORDER BY `subno_chapter_order` ASC");
foreach($Qsubchapter->result_object() as $subchapter) $arr_subchapter_17_1[]=$subchapter ?>

<table class="border" cellpadding="0" cellspacing="0">
  <tr class="header">
    <td width="40" valign="top">Test No</td>
    <td width="200">Test Item</td>
    <td width="30">OK</td>
    <td width="40">NOK</td>
    <td>N.A</td>
    <td>Comment</td>
  </tr> 
  <tr>
    <td width="40" valign="top">17.1.1</td>
    <td valign="top">Maintenance aspect (easy to maintain)</td>
    <?php
	$dt_subchapter_17_1 = explode('|', $arr_subchapter_17_1[0]->content);
	echo '<td align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_17_1[3]=='OK') echo '_checked'; echo '.jpg"></td><td align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_17_1[3]=='Not OK') echo '_checked'; echo '.jpg"></td><td align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_17_1[3]=='N/A') echo '_checked'; echo '.jpg"></td><td>'.$this->ifunction->ifnull($dt_subchapter_17_1[4]).'</td>';
	?>
  </tr>
  <tr>
    <td width="40" valign="top">&nbsp;</td>
    <td valign="top"><b>Antenna Support</b></td>
    <td width="30" valign="top">&nbsp;</td>
    <td width="40" valign="top">&nbsp;</td>
    <td valign="top">&nbsp;</td>
    <td valign="top">&nbsp;</td>
  </tr>
  <tr>
    <td width="40" valign="top">17.1.2</td>
    <td valign="top">Antenna mounting</td>
    <?php
	$dt_subchapter_17_1 = explode('|', $arr_subchapter_17_1[1]->content);
	echo '<td align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_17_1[3]=='OK') echo '_checked'; echo '.jpg"></td><td align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_17_1[3]=='Not OK') echo '_checked'; echo '.jpg"></td><td align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_17_1[3]=='N/A') echo '_checked'; echo '.jpg"></td><td>'.$this->ifunction->ifnull($dt_subchapter_17_1[4]).'</td>';
	?>
  </tr>
  <tr>
    <td width="40" valign="top">17.1.3</td>
    <td valign="top">Arm construction </td>
    <?php
	$dt_subchapter_17_1 = explode('|', $arr_subchapter_17_1[2]->content);
	echo '<td align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_17_1[3]=='OK') echo '_checked'; echo '.jpg"></td><td align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_17_1[3]=='Not OK') echo '_checked'; echo '.jpg"></td><td align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_17_1[3]=='N/A') echo '_checked'; echo '.jpg"></td><td>'.$this->ifunction->ifnull($dt_subchapter_17_1[4]).'</td>';
	?>
  </tr>
  <tr>
    <td width="40" valign="top">17.1.4</td>
    <td valign="top">Pylon construction</td>
    <?php
	$dt_subchapter_17_1 = explode('|', $arr_subchapter_17_1[3]->content);
	echo '<td align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_17_1[3]=='OK') echo '_checked'; echo '.jpg"></td><td align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_17_1[3]=='Not OK') echo '_checked'; echo '.jpg"></td><td align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_17_1[3]=='N/A') echo '_checked'; echo '.jpg"></td><td>'.$this->ifunction->ifnull($dt_subchapter_17_1[4]).'</td>';
	?>
  </tr>
  <tr>
    <td width="40" valign="top">17.1.5</td>
    <td valign="top">Arm length</td>
    <?php
	$dt_subchapter_17_1 = explode('|', $arr_subchapter_17_1[4]->content);
	echo '<td align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_17_1[3]=='OK') echo '_checked'; echo '.jpg"></td><td align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_17_1[3]=='Not OK') echo '_checked'; echo '.jpg"></td><td align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_17_1[3]=='N/A') echo '_checked'; echo '.jpg"></td><td>'.$this->ifunction->ifnull($dt_subchapter_17_1[4]).'</td>';
	?>
  </tr>
  <tr>
    <td width="40" valign="top">&nbsp;</td>
    <td valign="top"><b>Feeder Installation</b></td>
    <td width="30" valign="top">&nbsp;</td>
    <td width="40" valign="top">&nbsp;</td>
    <td valign="top">&nbsp;</td>
    <td valign="top">&nbsp;</td>
  </tr>
  <tr>
    <td width="40" valign="top">17.1.6</td>
    <td valign="top">Feeder Placement</td>
    <?php
	$dt_subchapter_17_1 = explode('|', $arr_subchapter_17_1[5]->content);
	echo '<td align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_17_1[3]=='OK') echo '_checked'; echo '.jpg"></td><td align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_17_1[3]=='Not OK') echo '_checked'; echo '.jpg"></td><td align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_17_1[3]=='N/A') echo '_checked'; echo '.jpg"></td><td valign="top">Not too strained. It s properly fixed </td>';
	?>    
  </tr>
  <tr>
    <td width="40" valign="top">17.1.7</td>
    <td valign="top">Feeder bending if<br />
        &bull; For 1 5/8 Inch, r &gt;    300 mm<br>
        &bull; For 7/8 Inch, r &gt;    120 mm<br>
        &bull; For 1/2 Inch , r &gt; 70 mm</td>
    <?php
	$dt_subchapter_17_1a = explode('|', $arr_subchapter_17_1[6]->content);
	$dt_subchapter_17_1b = explode('|', $arr_subchapter_17_1[7]->content);
	$dt_subchapter_17_1c = explode('|', $arr_subchapter_17_1[8]->content);
	echo '<td><font color="#FFF">.....</font><input type="radio"'; if($dt_subchapter_17_1a[3]=='OK') echo ' checked="checked"'; echo '><br><font color="#FFF">.....</font><input type="radio"'; if($dt_subchapter_17_1b[3]=='OK') echo ' checked="checked"'; echo '><br><font color="#FFF">.....</font><input type="radio"'; if($dt_subchapter_17_1c[3]=='OK') echo ' checked="checked"'; echo '></td>';
	?>
    
    <?php
	$dt_subchapter_17_1a = explode('|', $arr_subchapter_17_1[6]->content);
	$dt_subchapter_17_1b = explode('|', $arr_subchapter_17_1[7]->content);
	$dt_subchapter_17_1c = explode('|', $arr_subchapter_17_1[8]->content);
	echo '<td><font color="#FFF">.....</font><input type="radio"'; if($dt_subchapter_17_1a[3]=='Not OK') echo ' checked="checked"'; echo '><br><font color="#FFF">.....</font><input type="radio"'; if($dt_subchapter_17_1b[3]=='Not OK') echo ' checked="checked"'; echo '><br><font color="#FFF">.....</font><input type="radio"'; if($dt_subchapter_17_1c[3]=='Not OK') echo ' checked="checked"'; echo '></td>';
	?>
	
	<?php
	$dt_subchapter_17_1a = explode('|', $arr_subchapter_17_1[6]->content);
	$dt_subchapter_17_1b = explode('|', $arr_subchapter_17_1[7]->content);
	$dt_subchapter_17_1c = explode('|', $arr_subchapter_17_1[8]->content);
	echo '<td><font color="#FFF">.....</font><input type="radio"'; if($dt_subchapter_17_1a[3]=='N/A') echo ' checked="checked"'; echo '><br><font color="#FFF">.....</font><input type="radio"'; if($dt_subchapter_17_1b[3]=='N/A') echo ' checked="checked"'; echo '><br><font color="#FFF">.....</font><input type="radio"'; if($dt_subchapter_17_1c[3]=='N/A') echo ' checked="checked"'; echo '></td>';
	echo '<td>'.$this->ifunction->ifnull($dt_subchapter_17_1a[4]).'<br>'.$this->ifunction->ifnull($dt_subchapter_17_1b[4]).'<br>'.$this->ifunction->ifnull($dt_subchapter_17_1c[4]).'</td>';
	?>    
  </tr>
  <tr>
    <td width="40" valign="top">17.1.8</td>
    <td valign="top">Feeder Connector Installation</td>
    <?php
	$dt_subchapter_17_1 = explode('|', $arr_subchapter_17_1[9]->content);
	echo '<td align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_17_1[3]=='OK') echo '_checked'; echo '.jpg"></td><td align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_17_1[3]=='Not OK') echo '_checked'; echo '.jpg"></td><td align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_17_1[3]=='N/A') echo '_checked'; echo '.jpg"></td><td>'.$this->ifunction->ifnull($dt_subchapter_17_1[4]).'</td>';
	?>
  </tr>
  <tr>
    <td width="40" valign="top">17.1.9</td>
    <td valign="top">Feeder Clamp Installation </td>
    <?php
	$dt_subchapter_17_1 = explode('|', $arr_subchapter_17_1[10]->content);
	echo '<td align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_17_1[3]=='OK') echo '_checked'; echo '.jpg"></td><td align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_17_1[3]=='Not OK') echo '_checked'; echo '.jpg"></td><td align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_17_1[3]=='N/A') echo '_checked'; echo '.jpg"></td><td>'.$this->ifunction->ifnull($dt_subchapter_17_1[4]).'</td>';
	?>
  </tr>
  <tr>
    <td width="40" valign="top">17.1.10</td>
    <td valign="top">Water Leakage</td>
    <?php
	$dt_subchapter_17_1 = explode('|', $arr_subchapter_17_1[11]->content);
	echo '<td align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_17_1[3]=='OK') echo '_checked'; echo '.jpg"></td><td align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_17_1[3]=='Not OK') echo '_checked'; echo '.jpg"></td><td align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_17_1[3]=='N/A') echo '_checked'; echo '.jpg"></td><td>'.$this->ifunction->ifnull($dt_subchapter_17_1[4]).'</td>';
	?>
  </tr>
  <tr>
    <td width="40" valign="top">17.1.11</td>
    <td valign="top">Connection cable feeder    correct and tightened</td>
    <?php
	$dt_subchapter_17_1 = explode('|', $arr_subchapter_17_1[12]->content);
	echo '<td align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_17_1[3]=='OK') echo '_checked'; echo '.jpg"></td><td align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_17_1[3]=='Not OK') echo '_checked'; echo '.jpg"></td><td align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_17_1[3]=='N/A') echo '_checked'; echo '.jpg"></td><td>'.$this->ifunction->ifnull($dt_subchapter_17_1[4]).'</td>';
	?>
  </tr>
  <tr>
    <td width="40" valign="top">17.1.12</td>
    <td valign="top">Indoor Cable Tray    Installation</td>
    <?php
	$dt_subchapter_17_1 = explode('|', $arr_subchapter_17_1[13]->content);
	echo '<td align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_17_1[3]=='OK') echo '_checked'; echo '.jpg"></td><td align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_17_1[3]=='Not OK') echo '_checked'; echo '.jpg"></td><td align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_17_1[3]=='N/A') echo '_checked'; echo '.jpg"></td><td>'.$this->ifunction->ifnull($dt_subchapter_17_1[4]).'</td>';
	?>
  </tr>
  <tr>
    <td width="40" valign="top">17.1.13</td>
    <td valign="top">Feeder hole/Wall gland Installation</td>
    <?php
	$dt_subchapter_17_1 = explode('|', $arr_subchapter_17_1[14]->content);
	echo '<td align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_17_1[3]=='OK') echo '_checked'; echo '.jpg"></td><td align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_17_1[3]=='Not OK') echo '_checked'; echo '.jpg"></td><td align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_17_1[3]=='N/A') echo '_checked'; echo '.jpg"></td><td>'.$this->ifunction->ifnull($dt_subchapter_17_1[4]).'</td>';
	?>
  </tr>
  <tr>
    <td width="40" valign="top">&nbsp;</td>
    <td valign="top"><b>Grounding System (feeder)</b></td>
    <td width="30" valign="top">&nbsp;</td>
    <td width="40" valign="top">&nbsp;</td>
    <td valign="top">&nbsp;</td>
    <td valign="top">&nbsp;</td>
  </tr>
  <tr>
    <td width="40" valign="top">17.1.14</td>
    <td valign="top">Lightning Protection</td>
    <?php
	$dt_subchapter_17_1 = explode('|', $arr_subchapter_17_1[15]->content);
	echo '<td align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_17_1[3]=='OK') echo '_checked'; echo '.jpg"></td><td align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_17_1[3]=='Not OK') echo '_checked'; echo '.jpg"></td><td align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_17_1[3]=='N/A') echo '_checked'; echo '.jpg"></td><td>'.$this->ifunction->ifnull($dt_subchapter_17_1[4]).'</td>';
	?>
  </tr>
  <tr>
    <td width="40" valign="top">17.1.15</td>
    <td valign="top">Grounding Kit</td>
    <?php
	$dt_subchapter_17_1 = explode('|', $arr_subchapter_17_1[16]->content);
	echo '<td align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_17_1[3]=='OK') echo '_checked'; echo '.jpg"></td><td align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_17_1[3]=='Not OK') echo '_checked'; echo '.jpg"></td><td align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_17_1[3]=='N/A') echo '_checked'; echo '.jpg"></td><td>'.$this->ifunction->ifnull($dt_subchapter_17_1[4]).'</td>';
	?>
  </tr>  
</table><br>

<hr />

<table class="border" cellpadding="0" cellspacing="0">
<tr>
    <td width="40" valign="top">17.1.16</td>
    <td width="200" valign="top">Grounding    Bar on Bending</td>
    <?php
	$dt_subchapter_17_1 = explode('|', $arr_subchapter_17_1[17]->content);
	echo '<td width="30" align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_17_1[3]=='OK') echo '_checked'; echo '.jpg"></td><td width="40" align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_17_1[3]=='Not OK') echo '_checked'; echo '.jpg"></td><td align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_17_1[3]=='N/A') echo '_checked'; echo '.jpg"></td><td>'.$this->ifunction->ifnull($dt_subchapter_17_1[4]).'</td>';
	?>
  </tr>
  <tr>
    <td width="40" valign="top">17.1.17</td>
    <td valign="top">Grounding Bar at entering room feeder </td>
    <?php
	$dt_subchapter_17_1 = explode('|', $arr_subchapter_17_1[18]->content);
	echo '<td width="30" align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_17_1[3]=='OK') echo '_checked'; echo '.jpg"></td><td width="40" align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_17_1[3]=='Not OK') echo '_checked'; echo '.jpg"></td><td align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_17_1[3]=='N/A') echo '_checked'; echo '.jpg"></td><td>'.$this->ifunction->ifnull($dt_subchapter_17_1[4]).'</td>';
	?>
  </tr>
  <tr>
    <td width="40" valign="top">17.1.20</td>
    <td valign="top">Grounding    feeder shouldn't be connected to tower.</td>
    <?php
	$dt_subchapter_17_1 = explode('|', $arr_subchapter_17_1[19]->content);
	echo '<td width="30" align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_17_1[3]=='OK') echo '_checked'; echo '.jpg"></td><td width="40" align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_17_1[3]=='Not OK') echo '_checked'; echo '.jpg"></td><td align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_17_1[3]=='N/A') echo '_checked'; echo '.jpg"></td><td>'.$this->ifunction->ifnull($dt_subchapter_17_1[4]).'</td>';
	?>
  </tr>
  <tr>
    <td width="40" valign="top">&nbsp;</td>
    <td valign="top"><b>Transient Protection Unit (TVSS)</b></td>
    <td width="30" valign="top">&nbsp;</td>
    <td width="40" valign="top">&nbsp;</td>
    <td valign="top">&nbsp;</td>
    <td valign="top">&nbsp;</td>
  </tr>
  <tr>
    <td width="40" valign="top">17.1.21</td>
    <td valign="top">TVSS    availability</td>
    <?php
	$dt_subchapter_17_1 = explode('|', $arr_subchapter_17_1[20]->content);
	echo '<td width="30" align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_17_1[3]=='OK') echo '_checked'; echo '.jpg"></td><td width="40" align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_17_1[3]=='Not OK') echo '_checked'; echo '.jpg"></td><td align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_17_1[3]=='N/A') echo '_checked'; echo '.jpg"></td><td>'.$this->ifunction->ifnull($dt_subchapter_17_1[4]).'</td>';
	?>
  </tr>
  <tr>
    <td width="40" valign="top">17.1.22</td>
    <td valign="top">TVSS    installation &amp; connection</td>
    <?php
	$dt_subchapter_17_1 = explode('|', $arr_subchapter_17_1[21]->content);
	echo '<td width="30" align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_17_1[3]=='OK') echo '_checked'; echo '.jpg"></td><td width="40" align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_17_1[3]=='Not OK') echo '_checked'; echo '.jpg"></td><td align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_17_1[3]=='N/A') echo '_checked'; echo '.jpg"></td><td>'.$this->ifunction->ifnull($dt_subchapter_17_1[4]).'</td>';
	?>
  </tr>
  </table>

<p align="center"><b>Table 20: Labeling</b></p>

<?php $Qsubchapter = $this->db->query("SELECT `content` FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `chapter`='17' AND `no_chapter`='17.2' ORDER BY `subno_chapter_order` ASC");
foreach($Qsubchapter->result_object() as $subchapter) $arr_subchapter_17_2[]=$subchapter ?>

<table class="border" cellpadding="0" cellspacing="0">
  <tr class="header">
    <td width="40">Test No</td>
    <td>Visual check</td>
    <td width="30">OK</td>
    <td width="40">NOK</td>
    <td>N.A</td>
    <td>Remark</td>
  </tr>
  <?php
$arr_dt_172 = array('Jumper label', 'Feeder label', 'Antenna label', 'Splitter label', 'Diplexer label', 'Others label');
for($i=0; $i <= 5; $i++){
	$dt_subchapter_17_2 = explode('|', $arr_subchapter_17_2[$i]->content);
	echo '<tr><td>17.2.'.($i +1).'</td><td>'.$arr_dt_172[$i].'</td>';
	echo '<td align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_17_2[3]=='OK') echo '_checked'; echo '.jpg"></td><td align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_17_2[3]=='Not OK') echo '_checked'; echo '.jpg"></td><td align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_17_2[3]=='N/A') echo '_checked'; echo '.jpg"></td><td>'.$this->ifunction->ifnull($dt_subchapter_17_2[4]).'</td></tr>';
}
?>
</table><br>

<p align="center"><b>Table 21: Orientation of Antenna</b></p>

<?php $Qsubchapter = $this->db->query("SELECT `content` FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `chapter`='17' AND `no_chapter`='17.3' ORDER BY `subno_chapter_order` ASC");
foreach($Qsubchapter->result_object() as $subchapter) $arr_subchapter_17_3[]=$subchapter ?>

<table class="border" cellpadding="0" cellspacing="0">
  <tr class="header">
    <td width="40" rowspan="2">Test No</td>
    <td rowspan="2">Antenna Sector</td>
    <td colspan="2">Azimuth (deg)</td>
    <td colspan="2">Mechanical Tilt (deg )</td>
    <td colspan="2">Height (m)</td>
    <td rowspan="2">Remark</td>
  </tr>
  <tr class="header">
    <td>Actual</td>
    <td>Site<br />
      Doc.</td>
    <td>Actual</td>
    <td>Site<br />
      Doc</td>
    <td>Actual</td>
    <td>Site<br />
      Doc.</td>
  </tr>
  <?php
for($i=0; $i <= 7; $i++){
	$dt_subchapter_17_3 = explode('|', $arr_subchapter_17_3[$i]->content);
	echo '<tr><td>17.3.'.($i +1).'</td>';
	echo '<td>'.$this->ifunction->ifnull($dt_subchapter_17_3[3]).'</td><td>'.$this->ifunction->ifnull($dt_subchapter_17_3[4]).'</td><td>'.$this->ifunction->ifnull($dt_subchapter_17_3[5]).'</td><td>'.$this->ifunction->ifnull($dt_subchapter_17_3[6]).'</td><td>'.$this->ifunction->ifnull($dt_subchapter_17_3[7]).'</td><td>'.$this->ifunction->ifnull($dt_subchapter_17_3[8]).'</td><td>'.$this->ifunction->ifnull($dt_subchapter_17_3[9]).'</td><td>'.$this->ifunction->ifnull($dt_subchapter_17_3[10]).'</td></tr>';
}
?> 
</table><br>

<p align="center"><b>Table 22: Position</b></p>

<?php $Qsubchapter = $this->db->query("SELECT `content` FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `chapter`='17' AND `no_chapter`='17.4' ORDER BY `subno_chapter_order` ASC");
foreach($Qsubchapter->result_object() as $subchapter) $arr_subchapter_17_4[]=$subchapter ?>

<table class="border" cellpadding="0" cellspacing="0">
  <tr class="header">
    <td width="40">Test No</td>
    <td>Test Item</td>
    <td width="30">OK</td>
    <td width="40">NOK</td>
    <td>Remark</td>
  </tr>
  <?php
$arr_dt_174 = array('Placement', 'Possibility of blocking', 'Distance from other if single polar with Diversity');
for($i=0; $i <= 2; $i++){
	$dt_subchapter_17_4 = explode('|', $arr_subchapter_17_4[$i]->content);
	echo '<tr><td>17.4.'.($i +1).'</td><td>'.$arr_dt_174[$i].'</td>';
	echo '<td align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_17_4[3]=='OK') echo '_checked'; echo '.jpg"></td><td align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_17_4[3]=='Not OK') echo '_checked'; echo '.jpg"></td><td>'.$this->ifunction->ifnull($dt_subchapter_17_4[4]).'</td></tr>';
}
?>
</table>
<i>Note: Should be matched with Site Documentation</i>
<br />

<hr />

<?php $Qchapter = $this->db->query("SELECT `content` FROM `it_atp_chapter` WHERE `atp_id`='$dx' AND `chapter`='18' ORDER BY `atp_chapter_id` ASC");
foreach($Qchapter->result_object() as $chapter) $arr_chapter_18[]=$chapter ?>

<table class="border" cellpadding="0" cellspacing="0">
  <tr class="header">
    <td width="40">Chapter</td>
    <td width="200">Title work performed</td>
    <td width="30">OK</td>
    <td width="40">Not OK</td>
    <td>N/A</td>
    <td width="90">Remark</td>
  </tr>
  <tr>
    <td width="40" valign="top"><b>18</b>&nbsp;<br><br>
      18.1<br />
        18.2
      <br><br><br><br>
      18.3
      <br><br>
      18.4</td>
    <td valign="top"><b>Antenna System Measurement</b>&nbsp;<br />
      All measurement result (hardcopy and softcopy/dat    file) should be attached.<br />
      Distance to Fault with    Precision Load <i>(see table 23)</i><br />
      Cable Loss Measurement :<br>
      
        &bull; Cable loss UL and DL for GSM 900 <i>(see    table 24)</i><br>
        &bull; Cable loss UL DCS 1800 <i>(see    table 25)</i><br>
        &bull; Cable loss DL DCS 1800 <i>(see    table 26)</i><br>
      
      VSWR Measurement :<br>
        &bull; VSWR measurement UL &amp; DL GSM 900 with Antenna system Measurement <i>(see table 27)</i><br>
        &bull; VSWR measurement UL &amp; DL DCS 1800 with Antenna system Measurement<i>(see table 28)</i><br>
        &bull; Distance to Fault with Antenna <i>(see table 29)</i></td>
    <td valign="top" align="center"><?php echo '<br><br>';
		for($i=0; $i <= 6; $i++){
			echo '<img src="'.base_url().'static/i/radio'; if($arr_chapter_18[$i]->content=='OK') echo '_checked'; echo '.jpg"><br>';
			if(($i==0)||($i==3)||($i==6)) echo '<br>';
		}
		?></td>
    <td valign="top" align="center"><?php echo '<br><br>';
		for($i=0; $i <= 6; $i++){
			echo '<img src="'.base_url().'static/i/radio'; if($arr_chapter_18[$i]->content=='Not OK') echo '_checked'; echo '.jpg"><br>';
		if(($i==0)||($i==3)||($i==6)) echo '<br>';
		}
		?></td>
    <td valign="top" align="center"><?php echo '<br><br>';
		for($i=0; $i <= 6; $i++){
			echo '<img src="'.base_url().'static/i/radio'; if($arr_chapter_18[$i]->content=='N/A') echo '_checked'; echo '.jpg"><br>';
			if(($i==0)||($i==3)||($i==6)) echo '<br>';
		}
		?></td>
    <td valign="top" align="center"><?php echo '<br><br>';
		for($i=0; $i <= 6; $i++){
			echo 'Major<br>';
			if(($i==0)||($i==3)||($i==6)) echo '<br>';
		}
		?></td>
  </tr>
</table><br>
<i>Specification Measurement: DTF VSWR connector maximum 1.03 and feeder 1.01<br> 
M1 = Start point calibration/Connection to bottom jumper Marker; <br>
M2 = Bottom jumper to Feeder connection Marker; <br>
M3 = Feeder to Top jumper connection Marker; <br>
M4 = Top jumper to Dummy load connection Marker.<br><br>

Note for this chapter :<br>
1.	Chapter 18.1 and 18.2 if ZTE reuse antenna system: no need test (check on N/A), if use new feeder system, ZTE must do test for that chapter<br>
2.	Chapter 18.4: for reuse antenna system, ZTE just capture data only, if VSWR bad value (over 1.5) found, for new antenna system, VSWR value <br>should refer to the specification state in ATP Form
</i><br><br>
<p align="center"><img src="<?php echo base_url() ?>static/i/1.jpg" /></p><br><br>
<p align="center"><b>Table 23: DTF with Dummy Load Measurement</b></p><br>

<?php $Qsubchapter = $this->db->query("SELECT `content` FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `chapter`='18' AND `no_chapter`='18.1' ORDER BY `subno_chapter_order` ASC");
foreach($Qsubchapter->result_object() as $subchapter) $arr_subchapter_18_1[]=$subchapter ?>

<table class="border" cellpadding="0" cellspacing="0">
  <tr class="header">
    <td width="40" rowspan="2">Test No</td>
    <td width="94" rowspan="2">Connection</td>
    <td colspan="2">M1</td>
    <td colspan="2">M2</td>
    <td colspan="2">M3</td>
    <td colspan="2">M4</td>
    <td width="57" rowspan="2">OK</td>
    <td width="57" rowspan="2">NOK</td>
    <td width="70" rowspan="2">Remark</td>
  </tr>
  <tr align="center" b bgcolor="#CCCCCC">
    <td>S</td>
    <td>D</td>
    <td>S</td>
    <td>D</td>
    <td>S</td>
    <td>D</td>
    <td>S</td>
    <td>D</td>
  </tr>
  <?php
$arr_dt_181 = array('Sector 1 TRX', 'Sector 1 RXD', 'Sector 2 TRX', 'Sector 2 RXD', 'Sector 3 TRX', 'Sector 3 RXD');
for($i=0; $i <= 7; $i++){
	$dt_subchapter_18_1 = explode('|', $arr_subchapter_18_1[$i]->content);
	echo '<tr>'; if($i==6 || $i==7) echo '<td>18.1.</td>'; else echo '<td>18.1.'.($i +1).'</td>'; echo '<td>'.$this->ifunction->ifnull($dt_subchapter_18_1[4]).'</td><td>'.$this->ifunction->ifnull($dt_subchapter_18_1[5]).'</td><td>'.$this->ifunction->ifnull($dt_subchapter_18_1[6]).'</td><td>'.$this->ifunction->ifnull($dt_subchapter_18_1[7]).'</td><td>'.$this->ifunction->ifnull($dt_subchapter_18_1[8]).'</td><td>'.$this->ifunction->ifnull($dt_subchapter_18_1[9]).'</td><td>'.$this->ifunction->ifnull($dt_subchapter_18_1[10]).'</td><td>'.$this->ifunction->ifnull($dt_subchapter_18_1[11]).'</td><td>'.$this->ifunction->ifnull($dt_subchapter_18_1[12]).'</td><td align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_18_1[3]=='OK') echo '_checked'; echo '.jpg"></td><td align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_18_1[3]=='Not OK') echo '_checked'; echo '.jpg"></td><td>'.$this->ifunction->ifnull($dt_subchapter_18_1[13]).'</td></tr>';
}
?>
</table>
<i>Note: S = SWR value;	D = Distance (m)</i><br>

<hr />

<p align="center"><b>Table 24: Cable Loss UL & DL GSM 900</b></p>

<?php $Qsubchapter = $this->db->query("SELECT `content` FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `chapter`='18' AND `no_chapter`='18.2' ORDER BY `subno_chapter_order` ASC");
foreach($Qsubchapter->result_object() as $subchapter) $arr_subchapter_18_2[]=$subchapter ?>

<table class="border" cellpadding="0" cellspacing="0">
  <tr class="header">
    <td width="40" rowspan="2">Test No</td>
    <td rowspan="2">Connection</td>
    <td colspan="3">890 - 900 MHz</td>
    <td colspan="3">935 - 945 MHz</td>
  </tr>
  <tr class="header">
    <td>Peak</td>
    <td>Valley</td>
    <td>Average</td>
    <td>Peak</td>
    <td>Valley</td>
    <td>Average</td>
  </tr>
  <?php
$i182 = 0;
$arr_dt_182 = array(1=> 'Sector 1 TRX', 'Sector 1 RXD', 'Sector 2 TRX', 'Sector 2 RXD', 'Sector 3 TRX', 'Sector 3 RXD');
for($i=1; $i <= 6; $i++){
	$dt_subchapter_18_2 = explode('|', $arr_subchapter_18_2[$i182]->content);
	echo '<tr><td>18.2.1.'.$i.'</td><td>'.$this->ifunction->ifnull($dt_subchapter_18_2[3]).'</td>';
	echo '<td>'.$this->ifunction->ifnull($dt_subchapter_18_2[4]).'</td><td>'.$this->ifunction->ifnull($dt_subchapter_18_2[5]).'</td><td>'.$this->ifunction->ifnull($dt_subchapter_18_2[6]).'</td><td>'.$this->ifunction->ifnull($dt_subchapter_18_2[7]).'</td><td>'.$this->ifunction->ifnull($dt_subchapter_18_2[8]).'</td><td>'.$this->ifunction->ifnull($dt_subchapter_18_2[9]).'</td></tr>';
	$i182++;
}
?>
</table><br><br><br>
<p align="center"><b>Table 25: Cable Loss UL DCS 1800</b></p><br>

<?php $Qsubchapter = $this->db->query("SELECT `content` FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `chapter`='18' AND `no_chapter`='18.2' ORDER BY `subno_chapter_order` ASC");
foreach($Qsubchapter->result_object() as $subchapter) $arr_subchapter_18_2[]=$subchapter ?>

<table class="border" cellpadding="0" cellspacing="0">
  <tr class="header">
    <td width="40" rowspan="2">Test No</td>
    <td rowspan="2">Connection</td>
    <td colspan="3">1717 - 1722 MHz</td>
    <td colspan="3">1750 - 1765 MHz</td>
  </tr>
  <tr class="header">
    <td>Peak</td>
    <td>Valley</td>
    <td>Average</td>
    <td>Peak</td>
    <td>Valley</td>
    <td>Average</td>
  </tr>
  <?php
$i182 = 0;
$arr_dt_182 = array(1=> 'Sector 1 TRX', 'Sector 1 RXD', 'Sector 2 TRX', 'Sector 2 RXD', 'Sector 3 TRX', 'Sector 3 RXD');
for($i=1; $i <= 8; $i++){
	$dt_subchapter_18_2 = explode('|', $arr_subchapter_18_2[$i182]->content);
	echo '<tr>'; if($i==7 || $i==8) echo '<td>18.2.2.</td>'; else echo '<td>18.2.2.'.$i.'</td>'; echo '<td>'.$this->ifunction->ifnull($dt_subchapter_18_2[3]).'</td>';
	echo '<td>'.$this->ifunction->ifnull($dt_subchapter_18_2[4]).'</td><td>'.$this->ifunction->ifnull($dt_subchapter_18_2[5]).'</td><td>'.$this->ifunction->ifnull($dt_subchapter_18_2[6]).'</td><td>'.$this->ifunction->ifnull($dt_subchapter_18_2[7]).'</td><td>'.$this->ifunction->ifnull($dt_subchapter_18_2[8]).'</td><td>'.$this->ifunction->ifnull($dt_subchapter_18_2[9]).'</td></tr>';
	$i182++;
}
?>
</table><br>
<p align="center"><b>Table 26: Cable Loss DL DCS 1800</b></p><br>

<?php $Qsubchapter = $this->db->query("SELECT `content` FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `chapter`='18' AND `no_chapter`='18.2' ORDER BY `subno_chapter_order` ASC");
foreach($Qsubchapter->result_object() as $subchapter) $arr_subchapter_18_2[]=$subchapter ?>

<table class="border" cellpadding="0" cellspacing="0">
  <tr class="header">
    <td width="40" rowspan="2">Test No</td>
    <td rowspan="2">Connection</td>
    <td colspan="3">1812 - 1817 MHz</td>
    <td colspan="3">1845 - 1860 MHz</td>
  </tr>
  <tr class="header">
    <td>Peak</td>
    <td>Valley</td>
    <td>Average</td>
    <td>Peak</td>
    <td>Valley</td>
    <td>Average</td>
  </tr>
  <?php
$i182 = 0;
$arr_dt_182 = array(1=> 'Sector 1 TRX', 'Sector 1 RXD', 'Sector 2 TRX', 'Sector 2 RXD', 'Sector 3 TRX', 'Sector 3 RXD');
for($i=1; $i <= 8; $i++){
	$dt_subchapter_18_2 = explode('|', $arr_subchapter_18_2[$i182]->content);
	echo '<tr>'; if($i==7 || $i==8) echo '<td>18.2.3.</td>'; else echo '<td>18.2.3.'.$i.'</td>'; echo '</td><td>'.$this->ifunction->ifnull($dt_subchapter_18_2[3]).'</td><td>'.$this->ifunction->ifnull($dt_subchapter_18_2[4]).'</td><td>'.$this->ifunction->ifnull($dt_subchapter_18_2[5]).'</td><td>'.$this->ifunction->ifnull($dt_subchapter_18_2[6]).'</td><td>'.$this->ifunction->ifnull($dt_subchapter_18_2[7]).'</td><td>'.$this->ifunction->ifnull($dt_subchapter_18_2[8]).'</td><td>'.$this->ifunction->ifnull($dt_subchapter_18_2[9]).'</td></tr>';
	$i182++;
}
?>
</table>

<hr />

<p align="center"><img src="<?php echo base_url() ?>static/i/2.jpg" /></p><br>
<p align="center"><b>Table 27: VSWR UL & DL GSM 900 with Antenna system Measurement.</b></p>

<?php $Qsubchapter = $this->db->query("SELECT `content` FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `chapter`='18' AND `no_chapter`='18.3' ORDER BY `subno_chapter_order` ASC");
foreach($Qsubchapter->result_object() as $subchapter) $arr_subchapter_18_3[]=$subchapter ?>

<table class="border" cellpadding="0" cellspacing="0">
  <tr class="header">
    <td width="40" rowspan="3">Test No</td>
    <td rowspan="3">Test Item</td>
    <td colspan="4">GSM 900 (890-945) MHz peak marker</td>
    <td width="30" rowspan="3">OK</td>
    <td width="40" rowspan="3">NOK</td>
    <td rowspan="3">Remark</td>
  </tr>
  <tr class="header">
    <td colspan="2">890-901 (MHz)</td>
    <td colspan="2">934-945 (MHz)</td>
  </tr>
  <tr class="header"> 
    <td>S</td>
    <td>F</td>
    <td>S</td>
    <td>F</td>
  </tr>
  <?php
$i183 = 0;
$arr_dt_183 = array(1=> 'Sector 1 TRX', 'Sector 1 RXD', 'Sector 2 TRX', 'Sector 2 RXD', 'Sector 3 TRX', 'Sector 3 RXD');
for($i=1; $i <= 8; $i++){
	$dt_subchapter_18_3 = explode('|', $arr_subchapter_18_3[$i183]->content);
	echo '<tr>'; if($i==7 || $i==8) echo '<td>18.3.1.</td>'; else echo '<td>18.3.1.'.$i.'</td>'; echo '</td><td>'.$this->ifunction->ifnull($dt_subchapter_18_3[4]).'</td><td>'.$this->ifunction->ifnull($dt_subchapter_18_3[5]).'</td><td>'.$this->ifunction->ifnull($dt_subchapter_18_3[6]).'</td><td>'.$this->ifunction->ifnull($dt_subchapter_18_3[7]).'</td><td>'.$this->ifunction->ifnull($dt_subchapter_18_3[8]).'</td><td align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_18_3[3]=='OK') echo '_checked'; echo '.jpg"></td><td align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_18_3[3]=='Not OK') echo '_checked'; echo '.jpg"></td><td>'.$this->ifunction->ifnull($dt_subchapter_18_3[9]).'</td></tr>';
	$i183++;
}
?>
</table><br>
<i> Specification VSWR Vs Frequency Response:  1.20 (for Outdoor Coverage) dan 1.30 (for indoor coverage).<br>
Note: S = SWR value;	F = Frequency (MHz)
</i><br>

<p align="center"><b>Table 28: VSWR UL & DL DCS 1800 with Antenna system Measurement.</b></p><br>
<i>Standard VSWR Vs Frequency Response:  1.20 (for Outdoor Coverage) &  1.30 (for indoor coverage).</i><br>

<?php $Qsubchapter = $this->db->query("SELECT `content` FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `chapter`='18' AND `no_chapter`='18.5' ORDER BY `subno_chapter_order` ASC");
foreach($Qsubchapter->result_object() as $subchapter) $arr_subchapter_18_5[]=$subchapter ?>

<table class="border" cellpadding="0" cellspacing="0">
  <tr class="header">
    <td rowspan="3" width="40">Test No</td>
    <td rowspan="3">Test Item</td>
    <td colspan="4">DCS 1800<br />
      (1717-1817) MHz<br />
        peak marker</td>
    <td colspan="4">DCS 1800<br />(1750 - 1860) MHz<br />
        peak marker</td>
    <td rowspan="3">OK</td>
    <td rowspan="3">NOK</td>
  </tr>
  <tr class="header">
    <td colspan="2" valign="top">1717-1722<br />
      (MHz)</td>
    <td colspan="2" valign="top">1812-1817<br />
      (MHz)</td>
    <td colspan="2" valign="top">1750-1765 (MHz)</td>
    <td colspan="2" valign="top">1845-1860 (MHz)</td>
  </tr>
  <tr class="header">
    <td>S</td>
    <td>F</td>
    <td valign="top">S</td>
    <td valign="top">F</td>
    <td>S</td>
    <td>F</td>
    <td>S</td>
    <td>F</td>
  </tr>
  <?php
$i185 = 0;
$arr_dt_185 = array(1=> 'Sector 1 TRX', 'Sector 1 RXD', 'Sector 2 TRX', 'Sector 2 RXD', 'Sector 3 TRX', 'Sector 3 RXD');
for($i=1; $i <= 6; $i++){
	$dt_subchapter_18_5 = explode('|', $arr_subchapter_18_5[$i185]->content);
	echo '<tr><td>18.3.2.'.$i.'</td><td>'.$this->ifunction->ifnull($dt_subchapter_18_5[4]).'</td><td>'.$this->ifunction->ifnull($dt_subchapter_18_5[5]).'</td><td>'.$this->ifunction->ifnull($dt_subchapter_18_5[6]).'</td><td>'.$this->ifunction->ifnull($dt_subchapter_18_5[7]).'</td><td>'.$this->ifunction->ifnull($dt_subchapter_18_5[8]).'</td><td>'.$this->ifunction->ifnull($dt_subchapter_18_5[9]).'</td><td>'.$this->ifunction->ifnull($dt_subchapter_18_5[10]).'</td><td>'.$this->ifunction->ifnull($dt_subchapter_18_5[11]).'</td><td>'.$this->ifunction->ifnull($dt_subchapter_18_5[12]).'</td><td align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_18_5[3]=='OK') echo '_checked'; echo '.jpg"></td><td align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_18_5[3]=='Not OK') echo '_checked'; echo '.jpg"></td></tr>';
	$i185++;
}
?>
</table><br>
<i>Note: S = SWR value;F = Frequency (MHz)</i><br>

<hr />

<p align="center"><b>Table 29: DTF with Antenna Measurement </b></p>

<?php $Qsubchapter = $this->db->query("SELECT `content` FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `chapter`='18' AND `no_chapter`='18.4' ORDER BY `subno_chapter_order` ASC");
foreach($Qsubchapter->result_object() as $subchapter) $arr_subchapter_18_4[]=$subchapter ?>

<table class="border" cellpadding="0" cellspacing="0">
  <tr class="header">
    <td width="40" rowspan="2">Test No</td>
    <td rowspan="2">Connection</td>
    <td colspan="2">M1</td>
    <td colspan="2">M2</td>
    <td colspan="2">M3</td>
    <td colspan="2">M4</td>
    <td rowspan="2">Remark</td>
  </tr>
  <tr class="header">
    <td>S</td>
    <td>D</td>
    <td>S</td>
    <td>D</td>
    <td>S</td>
    <td>D</td>
    <td>S</td>
    <td>D</td>
  </tr>
  <?php
$arr_dt_184 = array('Sector 1 TRX', 'Sector 1 RXD', 'Sector 2 TRX', 'Sector 2 RXD', 'Sector 3 TRX', 'Sector 3 RXD');
for($i=0; $i <= 7; $i++){
	$dt_subchapter_18_4 = explode('|', $arr_subchapter_18_4[$i]->content);
	echo '<tr>'; if($i==6 || $i==7) echo '<td>18.4.</td>'; else echo '<td>18.4.'.($i+1).'</td>'; echo '<td>'.$this->ifunction->ifnull($dt_subchapter_18_4[3]).'</td><td>'.$this->ifunction->ifnull($dt_subchapter_18_4[4]).'</td><td>'.$this->ifunction->ifnull($dt_subchapter_18_4[5]).'</td><td>'.$this->ifunction->ifnull($dt_subchapter_18_4[6]).'</td><td>'.$this->ifunction->ifnull($dt_subchapter_18_4[7]).'</td><td>'.$this->ifunction->ifnull($dt_subchapter_18_4[8]).'</td><td>'.$this->ifunction->ifnull($dt_subchapter_18_4[9]).'</td><td>'.$this->ifunction->ifnull($dt_subchapter_18_4[10]).'</td><td>'.$this->ifunction->ifnull($dt_subchapter_18_4[11]).'</td><td>'.$this->ifunction->ifnull($dt_subchapter_18_4[12]).'</td></tr>';
}
?>
</table><br>
<i>Note: S = SWR value;	D = Distance (m)<br>
M1 = Start point calibration/Connection to bottom jumper Marker; <br>
M2 = Bottom jumper to Feeder connection Marker; <br>
M3 = Feeder to Top jumper connection Marker; <br>
M4 = Top jumper to Antenna connection Marker.
</i><br><br>

<?php $Qchapter = $this->db->query("SELECT `content` FROM `it_atp_chapter` WHERE `atp_id`='$dx' AND `chapter`='19' ORDER BY `atp_chapter_id` ASC");
foreach($Qchapter->result_object() as $chapter) $arr_chapter_19[]=$chapter ?>

<table class="border" cellpadding="0" cellspacing="0">
  <tr class="header">
    <td width="40">Chapter</td>
    <td>Title work performed</td>
    <td width="30">OK</td>
    <td width="40">Not OK</td>
    <td>N/A</td>
    <td width="90">Remark</td>
  </tr>
  <tr>
    <td valign="top"><b>19</b>&nbsp;<br />
      19.1<br /><br><br><br>
      19.2<br /><br><br><br><br><br><br>
      19.3</td>
    <td valign="top"><b>Additional Component measurement</b>&nbsp;<br />
      Filter CDMA 800 Rejection    measurement :<br />
      
        &bull;Insertion Loss GSM 900 UL path <i>(see    table 30)</i><br>
        &bull;Insertion Loss GSM DL path <i>(see    table 31)</i><br>
        &bull;VSWR measurement <i>(see table 32)</i><br>
      
      Tower Mounted Amplifier (TMA)    Measurement :<br />
      
        &bull;Gain TMA for GSM 900 UL path <i>(see    table 33)</i><br>
        &bull;Insertion Loss for GSM 900 DL path <i>(see    table 34)</i><br>
        &bull;VSWR TMA GSM 900 <i>(see table 35)</i><br>
        &bull;Gain TMA for DCS 1800 UL path <i>(see    table 36)</i><br>
        &bull;Insertion Loss for DCS 1800 DL path <i>(see table 37)</i><br>
        &bull;VSWR TMA DCS 1800 <i>(see table 38)</i><br>
      
      Arrester Measurement : <br />
      
        &bull;Arrester Loss measurement <i>(see table 39)</i><br>
        &bull;Arrester VSWR measurement <i>(see table 40)</i><br>
      </td> 
      <td valign="top" align="center"><?php echo '<br><br>';
		for($i=0; $i <= 10; $i++){
			echo '<img src="'.base_url().'static/i/radio'; if($arr_chapter_19[$i]->content=='OK') echo '_checked'; echo '.jpg"><br>';
			if(($i==2)||($i==8)) echo '<br>';
		}
		?></td>
         <td valign="top" align="center"><?php echo '<br><br>';
		for($i=0; $i <= 10; $i++){
			echo '<img src="'.base_url().'static/i/radio'; if($arr_chapter_19[$i]->content=='Not OK') echo '_checked'; echo '.jpg"><br>';
			if(($i==2)||($i==8)) echo '<br>';
		}
		?></td>
         <td valign="top" align="center"><?php echo '<br><br>';
		for($i=0; $i <= 10; $i++){
			echo '<img src="'.base_url().'static/i/radio'; if($arr_chapter_19[$i]->content=='N/A') echo '_checked'; echo '.jpg"><br>';
			if(($i==2)||($i==8)) echo '<br>';
		}
		?></td>
    <td valign="top" align="center"><?php echo '<br><br>';
		for($i=0; $i <= 10; $i++){
			echo 'Major<br>';
			if(($i==2)||($i==8)) echo '<br>';
		}
		?></td>
  </tr>
</table><br>
<i>Note : <br>
For this chapter (Additional Component Meas) should compare with BOQ. <br>
If not include just (check N/A), if include on BOQ, must do the test for that chapter
</i><br>

<hr />

<p align="center"><b>Table 30: Insertion Loss Filter at GSM 900 up Link Path</b></p>

<?php $Qsubchapter = $this->db->query("SELECT `content` FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `chapter`='19' AND `no_chapter`='19.1' ORDER BY `subno_chapter_order` ASC");
foreach($Qsubchapter->result_object() as $subchapter) $arr_subchapter_19_1[]=$subchapter ?>

<table class="border" cellpadding="0" cellspacing="0">
  <tr class="header">
    <td width="40" rowspan="2">Test No</td>
    <td rowspan="2">Connection</td>
    <td colspan="2">M1</td>
    <td colspan="2">M2</td>
    <td width="30" rowspan="2">OK</td>
    <td width="40" rowspan="2">NOK</td>
    <td rowspan="2">N.A</td>
  </tr>
  <tr class="header">
    <td valign="top">Freq (MHz)</td>
    <td>Level<br />
      (dB)</td>
    <td>Freq (MHz)</td>
    <td>Level<br />
      (dB)</td>
  </tr>
  <?php
$i191 = 0;
$arr_dt_191 = array(1=> 'Sector 1 TRX', 'Sector 1 RXD', 'Sector 2 TRX', 'Sector 2 RXD', 'Sector 3 TRX', 'Sector 3 RXD');
for($i=1; $i <= 8; $i++){
	$dt_subchapter_19_1 = explode('|', $arr_subchapter_19_1[$i191]->content);
	echo '<tr>'; if($i==7 || $i==8) echo '<td>19.1.1.</td>'; else echo '<td>19.1.1.'.$i.'</td>'; echo '<td>'.$this->ifunction->ifnull($dt_subchapter_19_1[4]).'</td><td>'.$this->ifunction->ifnull($dt_subchapter_19_1[5]).'</td><td>'.$this->ifunction->ifnull($dt_subchapter_19_1[6]).'</td><td>'.$this->ifunction->ifnull($dt_subchapter_19_1[7]).'</td><td>'.$this->ifunction->ifnull($dt_subchapter_19_1[8]).'</td><td align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_19_1[3]=='OK') echo '_checked'; echo '.jpg"></td><td align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_19_1[3]=='Not OK') echo '_checked'; echo '.jpg"></td><td align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_19_1[3]=='N/A') echo '_checked'; echo '.jpg"></td></tr>';
	$i191++;
}
?>
</table><br>
<p align="center"><b>Table 31: Insertion Loss Filter at GSM 900 down Link Path</b></p>

<?php $Qsubchapter = $this->db->query("SELECT `content` FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `chapter`='19' AND `no_chapter`='19.1' ORDER BY `subno_chapter_order` ASC");
foreach($Qsubchapter->result_object() as $subchapter) $arr_subchapter_19_1[]=$subchapter ?>

<table class="border" cellpadding="0" cellspacing="0">
  <tr class="header">
    <td width="40" rowspan="2">Test No</td>
    <td rowspan="2">Connection</td>
    <td colspan="2">M1</td>
    <td colspan="2">M2</td>
    <td width="30" rowspan="2">OK</td>
    <td width="40" rowspan="2">NOK</td>
    <td rowspan="2">N.A</td>
  </tr>
  <tr class="header">
    <td valign="top">Freq (MHz)</td>
    <td>Level<br />
      (dB)</td>
    <td>Freq (MHz)</td>
    <td>Level<br />
      (dB)</td>
  </tr>
  <?php
$i191 = 0;
$arr_dt_191 = array(1=> 'Sector 1 TRX', 'Sector 1 RXD', 'Sector 2 TRX', 'Sector 2 RXD', 'Sector 3 TRX', 'Sector 3 RXD');
for($i=1; $i <= 8; $i++){
	$dt_subchapter_19_1 = explode('|', $arr_subchapter_19_1[$i191]->content);
	echo '<tr>'; if($i==7 || $i==8) echo '<td>19.1.2.</td>'; else echo '<td>19.1.2.'.$i.'</td>'; echo '<td>'.$this->ifunction->ifnull($dt_subchapter_19_1[4]).'</td><td>'.$this->ifunction->ifnull($dt_subchapter_19_1[5]).'</td><td>'.$this->ifunction->ifnull($dt_subchapter_19_1[6]).'</td><td>'.$this->ifunction->ifnull($dt_subchapter_19_1[7]).'</td><td>'.$this->ifunction->ifnull($dt_subchapter_19_1[8]).'</td><td align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_19_1[3]=='OK') echo '_checked'; echo '.jpg"></td><td align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_19_1[3]=='Not OK') echo '_checked'; echo '.jpg"></td><td align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_19_1[3]=='N/A') echo '_checked'; echo '.jpg"></td></tr>';
	$i191++;
}
?>
</table><br>
<p align="center"><b>Table 32: VSWR Filter Measurement</b></p>
<?php $Qsubchapter = $this->db->query("SELECT `content` FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `chapter`='19' AND `no_chapter`='19.1' ORDER BY `subno_chapter_order` ASC");
foreach($Qsubchapter->result_object() as $subchapter) $arr_subchapter_19_1[]=$subchapter ?>
<table class="border" cellpadding="0" cellspacing="0">
  <tr class="header">
    <td width="40" rowspan="2">Test No</td>
    <td rowspan="2">Connection</td>
    <td colspan="2">M1 (max UL)</td>
    <td colspan="2">M2(max DL)</td>
    <td width="30" rowspan="2">OK</td>
    <td width="40" rowspan="2">NOK</td>
    <td rowspan="2">N.A</td>
  </tr>
  <tr class="header">
    <td valign="top">Freq (MHz)</td>
    <td>Level<br />
      (dB)</td>
    <td>Freq (MHz)</td>
    <td>Level<br />
      (dB)</td>
  </tr>  
  <?php
$i191 = 0;
$arr_dt_191 = array(1=> 'Sector 1 TRX', 'Sector 1 RXD', 'Sector 2 TRX', 'Sector 2 RXD', 'Sector 3 TRX', 'Sector 3 RXD');
for($i=1; $i <= 8; $i++){
	$dt_subchapter_19_1 = explode('|', $arr_subchapter_19_1[$i191]->content);
	echo '<tr>'; if($i==7 || $i==8) echo '<td>19.1.3.</td>'; else echo '<td>19.1.3.'.$i.'</td>'; echo '<td>'.$this->ifunction->ifnull($dt_subchapter_19_1[4]).'</td><td>'.$this->ifunction->ifnull($dt_subchapter_19_1[5]).'</td><td>'.$this->ifunction->ifnull($dt_subchapter_19_1[6]).'</td><td>'.$this->ifunction->ifnull($dt_subchapter_19_1[7]).'</td><td>'.$this->ifunction->ifnull($dt_subchapter_19_1[8]).'</td><td align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_19_1[3]=='OK') echo '_checked'; echo '.jpg"></td><td align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_19_1[3]=='Not OK') echo '_checked'; echo '.jpg"></td><td align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_19_1[3]=='N/A') echo '_checked'; echo '.jpg"></td></tr>';
	$i191++;
}
?>  
</table><br>

<hr />

<p align="center"><b>Table 33: Gain TMA GSM 900 (Up Link Path)</b></p>

<?php $Qsubchapter = $this->db->query("SELECT `content` FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `chapter`='19' AND `no_chapter`='19.2' ORDER BY `subno_chapter_order` ASC");
foreach($Qsubchapter->result_object() as $subchapter) $arr_subchapter_19_2[]=$subchapter ?>

<table class="border" cellpadding="0" cellspacing="0">
  <tr class="header">
    <td width="40" rowspan="2">Test No</td>
    <td rowspan="2">Connection</td>
    <td colspan="2">M1</td>
    <td colspan="2">M2</td>
    <td width="30" rowspan="2">OK</td>
    <td width="40" rowspan="2">NOK</td>
    <td rowspan="2">N.A</td>
  </tr>
  <tr class="header">
    <td valign="top">Freq (MHz)</td>
    <td>Level (dB)</td>
    <td>Freq (MHz)</td>
    <td>Level (dB)</td>
  </tr>
  <?php
$i192 = 0;
$arr_dt_192 = array(1=> 'Sector 1 TRX', 'Sector 1 RXD', 'Sector 2 TRX', 'Sector 2 RXD', 'Sector 3 TRX', 'Sector 3 RXD');
for($i=1; $i <= 6; $i++){
	$dt_subchapter_19_2 = explode('|', $arr_subchapter_19_2[$i192]->content);
	echo '<tr><td>19.2.1.'.$i.'</td><td>'.$this->ifunction->ifnull($dt_subchapter_19_2[4]).'</td><td>'.$this->ifunction->ifnull($dt_subchapter_19_2[5]).'</td><td>'.$this->ifunction->ifnull($dt_subchapter_19_2[6]).'</td><td>'.$this->ifunction->ifnull($dt_subchapter_19_2[7]).'</td><td>'.$this->ifunction->ifnull($dt_subchapter_19_2[8]).'</td><td align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_19_2[3]=='OK') echo '_checked'; echo '.jpg"></td><td align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_19_2[3]=='Not OK') echo '_checked'; echo '.jpg"></td><td align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_19_2[3]=='N/A') echo '_checked'; echo '.jpg"></td></tr>';
	$i192++;
}
?>
</table>
<p align="center"><b>Table 34: Insertion Loss TMA GSM 900 (Down Link Path)</b></p>

<?php $Qsubchapter = $this->db->query("SELECT `content` FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `chapter`='19' AND `no_chapter`='19.2' ORDER BY `subno_chapter_order` ASC");
foreach($Qsubchapter->result_object() as $subchapter) $arr_subchapter_19_2[]=$subchapter ?>

<table class="border" cellpadding="0" cellspacing="0">
  <tr class="header">
    <td width="40" rowspan="2">Test No</td>
    <td rowspan="2">Connection</td>
    <td colspan="2">M1</td>
    <td colspan="2">M2</td>
    <td width="30" rowspan="2">OK</td>
    <td width="40" rowspan="2">NOK</td>
    <td rowspan="2">N.A</td>
  </tr>
  <tr class="header">
    <td valign="top">Freq (MHz)</td>
    <td>Level (dB)</td>
    <td>Freq (MHz)</td>
    <td>Level (dB)</td>
  </tr>
  <?php
$i192 = 0;
$arr_dt_192 = array(1=> 'Sector 1 TRX', 'Sector 1 RXD', 'Sector 2 TRX', 'Sector 2 RXD', 'Sector 3 TRX', 'Sector 3 RXD');
for($i=1; $i <= 8; $i++){
	$dt_subchapter_19_2 = explode('|', $arr_subchapter_19_2[$i192]->content);
	echo '<tr>'; if($i==7 || $i==8) echo '<td>19.2.2.</td>'; else echo '<td>19.2.2.'.$i.'</td>'; echo '<td>'.$this->ifunction->ifnull($dt_subchapter_19_2[4]).'</td><td>'.$this->ifunction->ifnull($dt_subchapter_19_2[5]).'</td><td>'.$this->ifunction->ifnull($dt_subchapter_19_2[6]).'</td><td>'.$this->ifunction->ifnull($dt_subchapter_19_2[7]).'</td><td>'.$this->ifunction->ifnull($dt_subchapter_19_2[8]).'</td><td align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_19_2[3]=='OK') echo '_checked'; echo '.jpg"></td><td align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_19_2[3]=='Not OK') echo '_checked'; echo '.jpg"></td><td align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_19_2[3]=='N/A') echo '_checked'; echo '.jpg"></td></tr>';
	$i192++;
}
?>
</table>

<p align="center"><b>Table 35: VSWR TMA GSM 900</b></p>
<?php $Qsubchapter = $this->db->query("SELECT `content` FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `chapter`='19' AND `no_chapter`='19.2' ORDER BY `subno_chapter_order` ASC");
foreach($Qsubchapter->result_object() as $subchapter) $arr_subchapter_19_2[]=$subchapter ?>

<table class="border" cellpadding="0" cellspacing="0">
  <tr class="header">
    <td width="40" rowspan="2">Test No</td>
    <td rowspan="2">Connection</td>
    <td colspan="2">M1 (max UL)</td>
    <td colspan="2">M2 (max DL)</td>
    <td width="30" rowspan="2">OK</td>
    <td width="40" rowspan="2">NOK</td>
    <td rowspan="2">N.A</td>
  </tr>
  <tr class="header">
    <td valign="top">Freq (MHz)</td>
    <td>Level (dB)</td>
    <td>Freq (MHz)</td>
    <td>Level (dB)</td>
  </tr>
  <?php
$i192 = 0;
$arr_dt_192 = array(1=> 'Sector 1 TRX', 'Sector 1 RXD', 'Sector 2 TRX', 'Sector 2 RXD', 'Sector 3 TRX', 'Sector 3 RXD');
for($i=1; $i <= 8; $i++){
	$dt_subchapter_19_2 = explode('|', $arr_subchapter_19_2[$i192]->content);
	echo '<tr>'; if($i==7 || $i==8) echo '<td>19.2.3.</td>'; else echo '<td>19.2.3.'.$i.'</td>'; echo '<td>'.$this->ifunction->ifnull($dt_subchapter_19_2[4]).'</td><td>'.$this->ifunction->ifnull($dt_subchapter_19_2[5]).'</td><td>'.$this->ifunction->ifnull($dt_subchapter_19_2[6]).'</td><td>'.$this->ifunction->ifnull($dt_subchapter_19_2[7]).'</td><td>'.$this->ifunction->ifnull($dt_subchapter_19_2[8]).'</td><td align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_19_2[3]=='OK') echo '_checked'; echo '.jpg"></td><td align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_19_2[3]=='Not OK') echo '_checked'; echo '.jpg"></td><td align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_19_2[3]=='N/A') echo '_checked'; echo '.jpg"></td></tr>';
	$i192++;
}
?>
</table>

<p align="center"><b>Table 36: Gain TMA DCS 1800 (Up Link Path)</b></p>

<?php $Qsubchapter = $this->db->query("SELECT `content` FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `chapter`='19' AND `no_chapter`='19.2' ORDER BY `subno_chapter_order` ASC");
foreach($Qsubchapter->result_object() as $subchapter) $arr_subchapter_19_2[]=$subchapter ?>

<table class="border" cellpadding="0" cellspacing="0">
  <tr class="header">
    <td width="40" rowspan="2">Test No</td>
    <td rowspan="2">Connection</td>
    <td colspan="2">M1</td>
    <td colspan="2">M2</td>
    <td width="30" rowspan="2">OK</td>
    <td width="40" rowspan="2">NOK</td>
    <td rowspan="2">N.A</td>
  </tr>
  <tr class="header">
    <td valign="top">Freq (MHz)</td>
    <td>Level (dB)</td>
    <td>Freq (MHz)</td>
    <td>Level (dB)</td>
  </tr>
  <?php
$i192 = 0;
$arr_dt_192 = array(1=> 'Sector 1 TRX', 'Sector 1 RXD', 'Sector 2 TRX', 'Sector 2 RXD', 'Sector 3 TRX', 'Sector 3 RXD');
for($i=1; $i <= 3; $i++){
	$dt_subchapter_19_2 = explode('|', $arr_subchapter_19_2[$i192]->content);
	echo '<tr>'; if($i==7 || $i==8) echo '<td>19.2.4.</td>'; else echo '<td>19.2.4.'.$i.'</td>'; echo '<td>'.$this->ifunction->ifnull($dt_subchapter_19_2[4]).'</td><td>'.$this->ifunction->ifnull($dt_subchapter_19_2[5]).'</td><td>'.$this->ifunction->ifnull($dt_subchapter_19_2[6]).'</td><td>'.$this->ifunction->ifnull($dt_subchapter_19_2[7]).'</td><td>'.$this->ifunction->ifnull($dt_subchapter_19_2[8]).'</td><td align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_19_2[3]=='OK') echo '_checked'; echo '.jpg"></td><td align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_19_2[3]=='Not OK') echo '_checked'; echo '.jpg"></td><td align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_19_2[3]=='N/A') echo '_checked'; echo '.jpg"></td></tr>';
	$i192++;
}
?>
</table><br>

<hr />

<?php $Qsubchapter = $this->db->query("SELECT `content` FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `chapter`='19' AND `no_chapter`='19.2' ORDER BY `subno_chapter_order` ASC");
foreach($Qsubchapter->result_object() as $subchapter) $arr_subchapter_19_2[]=$subchapter ?>

<table class="border" cellpadding="0" cellspacing="0">
  <tr class="header">
    <td width="40" rowspan="2">Test No</td>
    <td rowspan="2">Connection</td>
    <td colspan="2">M1</td>
    <td colspan="2">M2</td>
    <td width="30" rowspan="2">OK</td>
    <td width="40" rowspan="2">NOK</td>
    <td rowspan="2">N.A</td>
  </tr>
  <tr class="header">
    <td valign="top">Freq (MHz)</td>
    <td>Level (dB)</td>
    <td>Freq (MHz)</td>
    <td>Level (dB)</td>
  </tr>
  <?php
$i192 = 0;
$arr_dt_192 = array(1=> 'Sector 1 TRX', 'Sector 1 RXD', 'Sector 2 TRX', 'Sector 2 RXD', 'Sector 3 TRX', 'Sector 3 RXD');
for($i=4; $i <= 8; $i++){
	$dt_subchapter_19_2 = explode('|', $arr_subchapter_19_2[$i192]->content);
	echo '<tr>'; if($i==7 || $i==8) echo '<td>19.2.4.</td>'; else echo '<td>19.2.4.'.$i.'</td>'; echo '<td>'.$this->ifunction->ifnull($dt_subchapter_19_2[4]).'</td><td>'.$this->ifunction->ifnull($dt_subchapter_19_2[5]).'</td><td>'.$this->ifunction->ifnull($dt_subchapter_19_2[6]).'</td><td>'.$this->ifunction->ifnull($dt_subchapter_19_2[7]).'</td><td>'.$this->ifunction->ifnull($dt_subchapter_19_2[8]).'</td><td align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_19_2[3]=='OK') echo '_checked'; echo '.jpg"></td><td align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_19_2[3]=='Not OK') echo '_checked'; echo '.jpg"></td><td align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_19_2[3]=='N/A') echo '_checked'; echo '.jpg"></td></tr>';
	$i192++;
}
?>
</table>

<p align="center"><b>Table 37: Insertion Loss TMA DCS 1800 (Down Link Path)</b></p>
<?php $Qsubchapter = $this->db->query("SELECT `content` FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `chapter`='19' AND `no_chapter`='19.2' ORDER BY `subno_chapter_order` ASC");
foreach($Qsubchapter->result_object() as $subchapter) $arr_subchapter_19_2[]=$subchapter ?>

<table class="border" cellpadding="0" cellspacing="0">
  <tr class="header">
    <td width="40" rowspan="2">Test No</td>
    <td rowspan="2">Connection</td>
    <td colspan="2">M1</td>
    <td colspan="2">M2</td>
    <td width="30" rowspan="2">OK</td>
    <td width="40" rowspan="2">NOK</td>
    <td rowspan="2">N.A</td>
  </tr>
  <tr class="header">
    <td valign="top">Freq (MHz)</td>
    <td>Level (dB)</td>
    <td>Freq (MHz)</td>
    <td>Level (dB)</td>
  </tr>
  <?php
$i192 = 0;
$arr_dt_192 = array(1=> 'Sector 1 TRX', 'Sector 1 RXD', 'Sector 2 TRX', 'Sector 2 RXD', 'Sector 3 TRX', 'Sector 3 RXD');
for($i=1; $i <= 8; $i++){
	$dt_subchapter_19_2 = explode('|', $arr_subchapter_19_2[$i192]->content);
	echo '<tr>'; if($i==7 || $i==8) echo '<td>19.2.5.</td>'; else echo '<td>19.2.5.'.$i.'</td>'; echo '<td>'.$this->ifunction->ifnull($dt_subchapter_19_2[4]).'</td><td>'.$this->ifunction->ifnull($dt_subchapter_19_2[5]).'</td><td>'.$this->ifunction->ifnull($dt_subchapter_19_2[6]).'</td><td>'.$this->ifunction->ifnull($dt_subchapter_19_2[7]).'</td><td>'.$this->ifunction->ifnull($dt_subchapter_19_2[8]).'</td><td align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_19_2[3]=='OK') echo '_checked'; echo '.jpg"></td><td align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_19_2[3]=='Not OK') echo '_checked'; echo '.jpg"></td><td align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_19_2[3]=='N/A') echo '_checked'; echo '.jpg"></td></tr>';
	$i192++;
}
?>
</table>
<p align="center"> <b>Table 38: VSWR TMA DCS 1800</b></p>
<?php $Qsubchapter = $this->db->query("SELECT `content` FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `chapter`='19' AND `no_chapter`='19.2' ORDER BY `subno_chapter_order` ASC");
foreach($Qsubchapter->result_object() as $subchapter) $arr_subchapter_19_2[]=$subchapter ?>

<table class="border" cellpadding="0" cellspacing="0">
  <tr class="header">
    <td width="40" rowspan="2">Test No</td>
    <td rowspan="2">Connection</td>
    <td colspan="2">M1 (max UL)</td>
    <td colspan="2">M2 (max DL)</td>
    <td width="30" rowspan="2">OK</td>
    <td width="40" rowspan="2">NOK</td>
    <td rowspan="2">N.A</td>
  </tr>
  <tr class="header">
    <td valign="top">Freq (MHz)</td>
    <td>Level (dB)</td>
    <td>Freq (MHz)</td>
    <td>Level (dB)</td>
  </tr>
  <?php
$i192 = 0;
$arr_dt_192 = array(1=> 'Sector 1 TRX', 'Sector 1 RXD', 'Sector 2 TRX', 'Sector 2 RXD', 'Sector 3 TRX', 'Sector 3 RXD');
for($i=1; $i <= 8; $i++){
	$dt_subchapter_19_2 = explode('|', $arr_subchapter_19_2[$i192]->content);
	echo '<tr>'; if($i==7 || $i==8) echo '<td>19.2.6.</td>'; else echo '<td>19.2.6.'.$i.'</td>'; echo '<td>'.$this->ifunction->ifnull($dt_subchapter_19_2[4]).'</td><td>'.$this->ifunction->ifnull($dt_subchapter_19_2[5]).'</td><td>'.$this->ifunction->ifnull($dt_subchapter_19_2[6]).'</td><td>'.$this->ifunction->ifnull($dt_subchapter_19_2[7]).'</td><td>'.$this->ifunction->ifnull($dt_subchapter_19_2[8]).'</td><td align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_19_2[3]=='OK') echo '_checked'; echo '.jpg"></td><td align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_19_2[3]=='Not OK') echo '_checked'; echo '.jpg"></td><td align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_19_2[3]=='N/A') echo '_checked'; echo '.jpg"></td></tr>';
	$i192++;
}
?>
</table>
<p align="center"><b>Table 39: Arrester Loss Measurement</b></p>

<?php $Qsubchapter = $this->db->query("SELECT `content` FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `chapter`='19' AND `no_chapter`='19.3' ORDER BY `subno_chapter_order` ASC");
foreach($Qsubchapter->result_object() as $subchapter) $arr_subchapter_19_3[]=$subchapter ?>

<table class="border" cellpadding="0" cellspacing="0">
  <tr class="header">
    <td width="40"><b>Test No</b></td>
    <td><b>Connection</b></td>
    <td><b>M1 (max GSM 900)</b></td>
    <td><b>M2 (max DCS 1800)</b></td>
    <td width="30"><b>OK</b></td>
    <td width="40"><b>NOK</b></td>
    <td><b>N.A</b></td>
  </tr>
  <?php
$i193 = 0;
$arr_dt_193 = array(1=> 'Sector 1 TRX', 'Sector 1 RXD', 'Sector 2 TRX', 'Sector 2 RXD', 'Sector 3 TRX', 'Sector 3 RXD');
for($i=1; $i <= 8; $i++){
	$dt_subchapter_19_3 = explode('|', $arr_subchapter_19_3[$i193]->content);
	echo '<tr>'; if($i==7 || $i==8) echo '<td>19.3.1.</td>'; else echo '<td>19.3.1.'.$i.'</td>'; echo '</td><td>'.$this->ifunction->ifnull($dt_subchapter_19_3[4]).'</td><td>'.$this->ifunction->ifnull($dt_subchapter_19_3[5]).'</td><td>'.$this->ifunction->ifnull($dt_subchapter_19_3[6]).'</td><td align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_19_3[3]=='OK') echo '_checked'; echo '.jpg"></td><td align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_19_3[3]=='Not OK') echo '_checked'; echo '.jpg"></td><td align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_19_3[3]=='N/A') echo '_checked'; echo '.jpg"></td></tr>';
	$i193++;
}
?>
</table><br>

<hr />

<p align="center"><b>Table 40: Arrester VSWR Measurement</b></p><br>

<?php $Qsubchapter = $this->db->query("SELECT `content` FROM `it_atp_subchapter` WHERE `atp_id`='$dx' AND `chapter`='19' AND `no_chapter`='19.3' ORDER BY `subno_chapter_order` ASC");
foreach($Qsubchapter->result_object() as $subchapter) $arr_subchapter_19_3[]=$subchapter ?>

<table class="border" cellpadding="0" cellspacing="0">
  <tr class="header">
    <td width="40"><b>Test No</b></td>
    <td><b>Connection</b></td>
    <td><b>M1 (max GSM 900)</b></td>
    <td><b>M2 (max DCS 1800)</b></td>
    <td width="30"><b>OK</b></td>
    <td width="40"><b>NOK</b></td>
    <td><b>N.A</b></td>
  </tr>
  <?php
$i193 = 0;
$arr_dt_193 = array(1=> 'Sector 1 TRX', 'Sector 1 RXD', 'Sector 2 TRX', 'Sector 2 RXD', 'Sector 3 TRX', 'Sector 3 RXD');
for($i=1; $i <= 8; $i++){
	$dt_subchapter_19_3 = explode('|', $arr_subchapter_19_3[$i193]->content);
	echo '<tr>'; if($i==7 || $i==8) echo '<td>19.3.2.</td>'; else echo '<td>19.3.2.'.$i.'</td>'; echo '</td><td>'.$this->ifunction->ifnull($dt_subchapter_19_3[4]).'</td><td>'.$this->ifunction->ifnull($dt_subchapter_19_3[5]).'</td><td>'.$this->ifunction->ifnull($dt_subchapter_19_3[6]).'</td><td align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_19_3[3]=='OK') echo '_checked'; echo '.jpg"></td><td align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_19_3[3]=='Not OK') echo '_checked'; echo '.jpg"></td><td align="center"><img src="'.base_url().'static/i/radio'; if($dt_subchapter_19_3[3]=='N/A') echo '_checked'; echo '.jpg"></td></tr>';
	$i193++;
}
?>
</table><br>

<hr />



<p align="center"><b>Table 12<br>Note - Comments - Fault</b></p><br>
<table class="border" cellpadding="0" cellspacing="0">
<tr class="header"><td width="20" align="center">No</td><td align="center">Problems</td><td align="center">Cleared</td></tr>
<?php for($i=1; $i <= 5; $i++) echo '<tr valign="top"><td align="center" height="50">'.$i.'</td><td>Chapter:<br />Description:</td><td>Name:<br />Date:</td></tr>' ?>
</table><br />

<hr />

<table border="1"  width="100%">
  <tr>
    <td valign="top">
    <b>Readying for network integration and finishing acceptance<br />
    <?php echo '<img src="'.base_url().'static/i/radio.jpg">' ?> OK<br />
    <?php echo '<img src="'.base_url().'static/i/radio.jpg">' ?> NOT OK</b><br /><br />
    
    Note : <br />
    This BTS can be integrated only if there is no major remark <br />
    This ATP can be accepted only if there is no remark<br /><br /><br /><br /><br />
    <center>
    <span style="margin-left:260px">(Date)..................................</span><br /><br />
    <b>ZTE Representative,</b><b><span style="margin-left:170px">Accepted and Ready</span><br />  
    <span style="margin-left:280px">Integrated  by, PT. INDOSAT</span></b><br /><br /><br /><br /><br />
    <span style="margin-left:0px">(</span><span style="margin-left:110px">)</span>    
    <span style="margin-left:160px">
    (</span><span style="margin-left:120px">)</span><br />
    <span style="margin-left:170px"><b>NIK</b></span>
    </center>
    </td>
  </tr>
</table><br />

<hr />

<p><b>ANNEX : DTF SETTING MEASUREMENT TABLE  </b></p>
<table class="border" cellpadding="0" cellspacing="0">
  <tr class="header">
    <td rowspan="2" nowrap="nowrap">No</td>
    <td colspan="3" nowrap="nowrap">Distance</td>
    <td colspan="3" nowrap="nowrap">Number    Of Points</td>
    <td colspan="3" nowrap="nowrap">Resolution    (m)</td>
    <td colspan="2" nowrap="nowrap">S331B/S332B    (MHz)</td>
    <td colspan="2" nowrap="nowrap">S331C/S332C    (MHz)</td>
    <td colspan="2" nowrap="nowrap">S331D/S332D    (MHz)</td>
  </tr>
  <tr align="center">
    <td bgcolor="#CCCCCC">D1    (m)</td>
    <td bgcolor="#CCCCCC">D2    (m)</td>
    <td bgcolor="#CCCCCC">Dcal(m)</td>
    <td bgcolor="#CCCCCC">S331B/S332B</td>
    <td bgcolor="#CCCCCC">S331C/S332C</td>
    <td bgcolor="#CCCCCC">S331D/S332D</td>
    <td bgcolor="#CCCCCC">S331B/S332B</td>
    <td bgcolor="#CCCCCC">S331C/S332C</td>
    <td bgcolor="#CCCCCC">S331D/S332D</td>
    <td bgcolor="#CCCCCC">F1</td>
    <td bgcolor="#CCCCCC">F2</td>
    <td bgcolor="#CCCCCC">F1</td>
    <td bgcolor="#CCCCCC">F2</td>
    <td bgcolor="#CCCCCC">F1</td>
    <td bgcolor="#CCCCCC">F2</td>
  </tr>
  <tr align="center">
    <td nowrap="nowrap" valign="bottom">1</td>
    <td nowrap="nowrap" valign="bottom">5</td>
    <td nowrap="nowrap" valign="bottom">10</td>
    <td nowrap="nowrap" valign="bottom">12</td>
    <td nowrap="nowrap" valign="bottom">512</td>
    <td nowrap="nowrap" valign="bottom">517</td>
    <td nowrap="nowrap" valign="bottom">517</td>
    <td nowrap="nowrap" valign="bottom">0.053</td>
    <td nowrap="nowrap" valign="bottom">0.043</td>
    <td nowrap="nowrap" valign="bottom">0.043</td>
    <td nowrap="nowrap" valign="bottom">800</td>
    <td nowrap="nowrap" valign="bottom">3298</td>
    <td nowrap="nowrap" valign="bottom">800</td>
    <td nowrap="nowrap" valign="bottom">3896</td>
    <td nowrap="nowrap" valign="bottom">800</td>
    <td nowrap="nowrap" valign="bottom">3896</td>
  </tr>
  <tr class="header">
    <td valign="bottom" nowrap="nowrap">2</td>
    <td valign="bottom" nowrap="nowrap">11</td>
    <td valign="bottom" nowrap="nowrap">15</td>
    <td valign="bottom" nowrap="nowrap">17</td>
    <td valign="bottom" nowrap="nowrap">512</td>
    <td valign="bottom" nowrap="nowrap">517</td>
    <td valign="bottom" nowrap="nowrap">517</td>
    <td valign="bottom" nowrap="nowrap">0.053</td>
    <td valign="bottom" nowrap="nowrap">0.043</td>
    <td valign="bottom" nowrap="nowrap">0.043</td>
    <td valign="bottom" nowrap="nowrap">800</td>
    <td valign="bottom" nowrap="nowrap">3298</td>
    <td valign="bottom" nowrap="nowrap">800</td>
    <td valign="bottom" nowrap="nowrap">3896</td>
    <td valign="bottom" nowrap="nowrap">800</td>
    <td valign="bottom" nowrap="nowrap">3896</td>
  </tr>
  <tr align="center">
    <td nowrap="nowrap" valign="bottom">3</td>
    <td nowrap="nowrap" valign="bottom">16</td>
    <td nowrap="nowrap" valign="bottom">20</td>
    <td nowrap="nowrap" valign="bottom">22</td>
    <td nowrap="nowrap" valign="bottom">512</td>
    <td nowrap="nowrap" valign="bottom">517</td>
    <td nowrap="nowrap" valign="bottom">517</td>
    <td nowrap="nowrap" valign="bottom">0.053</td>
    <td nowrap="nowrap" valign="bottom">0.043</td>
    <td nowrap="nowrap" valign="bottom">0.043</td>
    <td nowrap="nowrap" valign="bottom">800</td>
    <td nowrap="nowrap" valign="bottom">3298</td>
    <td nowrap="nowrap" valign="bottom">800</td>
    <td nowrap="nowrap" valign="bottom">3896</td>
    <td nowrap="nowrap" valign="bottom">800</td>
    <td nowrap="nowrap" valign="bottom">3896</td>
  </tr>
  <tr class="header">
    <td valign="bottom" nowrap="nowrap">4</td>
    <td valign="bottom" nowrap="nowrap">21</td>
    <td valign="bottom" nowrap="nowrap">25</td>
    <td valign="bottom" nowrap="nowrap">27</td>
    <td valign="bottom" nowrap="nowrap">512</td>
    <td valign="bottom" nowrap="nowrap">517</td>
    <td valign="bottom" nowrap="nowrap">517</td>
    <td valign="bottom" nowrap="nowrap">0.053</td>
    <td valign="bottom" nowrap="nowrap">0.052</td>
    <td valign="bottom" nowrap="nowrap">0.052</td>
    <td valign="bottom" nowrap="nowrap">800</td>
    <td valign="bottom" nowrap="nowrap">3298</td>
    <td valign="bottom" nowrap="nowrap">800</td>
    <td valign="bottom" nowrap="nowrap">3323</td>
    <td valign="bottom" nowrap="nowrap">800</td>
    <td valign="bottom" nowrap="nowrap">3323</td>
  </tr>
  <tr align="center">
    <td nowrap="nowrap" valign="bottom">5</td>
    <td nowrap="nowrap" valign="bottom">26</td>
    <td nowrap="nowrap" valign="bottom">30</td>
    <td nowrap="nowrap" valign="bottom">32</td>
    <td nowrap="nowrap" valign="bottom">512</td>
    <td nowrap="nowrap" valign="bottom">517</td>
    <td nowrap="nowrap" valign="bottom">517</td>
    <td nowrap="nowrap" valign="bottom">0.063</td>
    <td nowrap="nowrap" valign="bottom">0.062</td>
    <td nowrap="nowrap" valign="bottom">0.062</td>
    <td nowrap="nowrap" valign="bottom">800</td>
    <td nowrap="nowrap" valign="bottom">2908</td>
    <td nowrap="nowrap" valign="bottom">800</td>
    <td nowrap="nowrap" valign="bottom">2929</td>
    <td nowrap="nowrap" valign="bottom">800</td>
    <td nowrap="nowrap" valign="bottom">2929</td>
  </tr>
  <tr class="header">
    <td valign="bottom" nowrap="nowrap">6</td>
    <td valign="bottom" nowrap="nowrap">31</td>
    <td valign="bottom" nowrap="nowrap">35</td>
    <td valign="bottom" nowrap="nowrap">37</td>
    <td valign="bottom" nowrap="nowrap">512</td>
    <td valign="bottom" nowrap="nowrap">517</td>
    <td valign="bottom" nowrap="nowrap">517</td>
    <td valign="bottom" nowrap="nowrap">0.072</td>
    <td valign="bottom" nowrap="nowrap">0.072</td>
    <td valign="bottom" nowrap="nowrap">0.072</td>
    <td valign="bottom" nowrap="nowrap">800</td>
    <td valign="bottom" nowrap="nowrap">2623</td>
    <td valign="bottom" nowrap="nowrap">800</td>
    <td valign="bottom" nowrap="nowrap">2641</td>
    <td valign="bottom" nowrap="nowrap">800</td>
    <td valign="bottom" nowrap="nowrap">2641</td>
  </tr>
  <tr align="center">
    <td nowrap="nowrap" valign="bottom">7</td>
    <td nowrap="nowrap" valign="bottom">36</td>
    <td nowrap="nowrap" valign="bottom">40</td>
    <td nowrap="nowrap" valign="bottom">42</td>
    <td nowrap="nowrap" valign="bottom">512</td>
    <td nowrap="nowrap" valign="bottom">517</td>
    <td nowrap="nowrap" valign="bottom">517</td>
    <td nowrap="nowrap" valign="bottom">0.082</td>
    <td nowrap="nowrap" valign="bottom">0.081</td>
    <td nowrap="nowrap" valign="bottom">0.081</td>
    <td nowrap="nowrap" valign="bottom">800</td>
    <td nowrap="nowrap" valign="bottom">2406</td>
    <td nowrap="nowrap" valign="bottom">800</td>
    <td nowrap="nowrap" valign="bottom">2422</td>
    <td nowrap="nowrap" valign="bottom">800</td>
    <td nowrap="nowrap" valign="bottom">2422</td>
  </tr>
  <tr class="header">
    <td valign="bottom" nowrap="nowrap">8</td>
    <td valign="bottom" nowrap="nowrap">41</td>
    <td valign="bottom" nowrap="nowrap">45</td>
    <td valign="bottom" nowrap="nowrap">47</td>
    <td valign="bottom" nowrap="nowrap">512</td>
    <td valign="bottom" nowrap="nowrap">517</td>
    <td valign="bottom" nowrap="nowrap">517</td>
    <td valign="bottom" nowrap="nowrap">0.092</td>
    <td valign="bottom" nowrap="nowrap">0.091</td>
    <td valign="bottom" nowrap="nowrap">0.091</td>
    <td valign="bottom" nowrap="nowrap">800</td>
    <td valign="bottom" nowrap="nowrap">2235</td>
    <td valign="bottom" nowrap="nowrap">800</td>
    <td valign="bottom" nowrap="nowrap">2249</td>
    <td valign="bottom" nowrap="nowrap">800</td>
    <td valign="bottom" nowrap="nowrap">2249</td>
  </tr>
  <tr align="center">
    <td nowrap="nowrap" valign="bottom">9</td>
    <td nowrap="nowrap" valign="bottom">46</td>
    <td nowrap="nowrap" valign="bottom">50</td>
    <td nowrap="nowrap" valign="bottom">52</td>
    <td nowrap="nowrap" valign="bottom">512</td>
    <td nowrap="nowrap" valign="bottom">517</td>
    <td nowrap="nowrap" valign="bottom">517</td>
    <td nowrap="nowrap" valign="bottom">0.102</td>
    <td nowrap="nowrap" valign="bottom">0.101</td>
    <td nowrap="nowrap" valign="bottom">0.101</td>
    <td nowrap="nowrap" valign="bottom">800</td>
    <td nowrap="nowrap" valign="bottom">2097</td>
    <td nowrap="nowrap" valign="bottom">800</td>
    <td nowrap="nowrap" valign="bottom">2110</td>
    <td nowrap="nowrap" valign="bottom">800</td>
    <td nowrap="nowrap" valign="bottom">2110</td>
  </tr>
  <tr class="header">
    <td valign="bottom" nowrap="nowrap">10</td>
    <td valign="bottom" nowrap="nowrap">51</td>
    <td valign="bottom" nowrap="nowrap">55</td>
    <td valign="bottom" nowrap="nowrap">57</td>
    <td valign="bottom" nowrap="nowrap">512</td>
    <td valign="bottom" nowrap="nowrap">517</td>
    <td valign="bottom" nowrap="nowrap">517</td>
    <td valign="bottom" nowrap="nowrap">0.112</td>
    <td valign="bottom" nowrap="nowrap">0.110</td>
    <td valign="bottom" nowrap="nowrap">0.110</td>
    <td valign="bottom" nowrap="nowrap">800</td>
    <td valign="bottom" nowrap="nowrap">1983</td>
    <td valign="bottom" nowrap="nowrap">800</td>
    <td valign="bottom" nowrap="nowrap">1995</td>
    <td valign="bottom" nowrap="nowrap">800</td>
    <td valign="bottom" nowrap="nowrap">1995</td>
  </tr>
  <tr align="center">
    <td nowrap="nowrap" valign="bottom">11</td>
    <td nowrap="nowrap" valign="bottom">56</td>
    <td nowrap="nowrap" valign="bottom">60</td>
    <td nowrap="nowrap" valign="bottom">62</td>
    <td nowrap="nowrap" valign="bottom">512</td>
    <td nowrap="nowrap" valign="bottom">517</td>
    <td nowrap="nowrap" valign="bottom">517</td>
    <td nowrap="nowrap" valign="bottom">0.121</td>
    <td nowrap="nowrap" valign="bottom">0.120</td>
    <td nowrap="nowrap" valign="bottom">0.120</td>
    <td nowrap="nowrap" valign="bottom">800</td>
    <td nowrap="nowrap" valign="bottom">1888</td>
    <td nowrap="nowrap" valign="bottom">800</td>
    <td nowrap="nowrap" valign="bottom">1899</td>
    <td nowrap="nowrap" valign="bottom">800</td>
    <td nowrap="nowrap" valign="bottom">1899</td>
  </tr>
  <tr class="header">
    <td valign="bottom" nowrap="nowrap">12</td>
    <td valign="bottom" nowrap="nowrap">61</td>
    <td valign="bottom" nowrap="nowrap">65</td>
    <td valign="bottom" nowrap="nowrap">67</td>
    <td valign="bottom" nowrap="nowrap">512</td>
    <td valign="bottom" nowrap="nowrap">517</td>
    <td valign="bottom" nowrap="nowrap">517</td>
    <td valign="bottom" nowrap="nowrap">0.131</td>
    <td valign="bottom" nowrap="nowrap">0.130</td>
    <td valign="bottom" nowrap="nowrap">0.130</td>
    <td valign="bottom" nowrap="nowrap">800</td>
    <td valign="bottom" nowrap="nowrap">1807</td>
    <td valign="bottom" nowrap="nowrap">800</td>
    <td valign="bottom" nowrap="nowrap">1817</td>
    <td valign="bottom" nowrap="nowrap">800</td>
    <td valign="bottom" nowrap="nowrap">1817</td>
  </tr>
  <tr align="center">
    <td nowrap="nowrap" valign="bottom">13</td>
    <td nowrap="nowrap" valign="bottom">66</td>
    <td nowrap="nowrap" valign="bottom">70</td>
    <td nowrap="nowrap" valign="bottom">72</td>
    <td nowrap="nowrap" valign="bottom">512</td>
    <td nowrap="nowrap" valign="bottom">517</td>
    <td nowrap="nowrap" valign="bottom">517</td>
    <td nowrap="nowrap" valign="bottom">0.141</td>
    <td nowrap="nowrap" valign="bottom">0.140</td>
    <td nowrap="nowrap" valign="bottom">0.140</td>
    <td nowrap="nowrap" valign="bottom">800</td>
    <td nowrap="nowrap" valign="bottom">1737</td>
    <td nowrap="nowrap" valign="bottom">800</td>
    <td nowrap="nowrap" valign="bottom">1746</td>
    <td nowrap="nowrap" valign="bottom">800</td>
    <td nowrap="nowrap" valign="bottom">1746</td>
  </tr>
  <tr class="header">
    <td valign="bottom" nowrap="nowrap">14</td>
    <td valign="bottom" nowrap="nowrap">71</td>
    <td valign="bottom" nowrap="nowrap">75</td>
    <td valign="bottom" nowrap="nowrap">77</td>
    <td valign="bottom" nowrap="nowrap">512</td>
    <td valign="bottom" nowrap="nowrap">517</td>
    <td valign="bottom" nowrap="nowrap">517</td>
    <td valign="bottom" nowrap="nowrap">0.151</td>
    <td valign="bottom" nowrap="nowrap">0.149</td>
    <td valign="bottom" nowrap="nowrap">0.149</td>
    <td valign="bottom" nowrap="nowrap">800</td>
    <td valign="bottom" nowrap="nowrap">1676</td>
    <td valign="bottom" nowrap="nowrap">800</td>
    <td valign="bottom" nowrap="nowrap">1685</td>
    <td valign="bottom" nowrap="nowrap">800</td>
    <td valign="bottom" nowrap="nowrap">1685</td>
  </tr>
  <tr align="center">
    <td nowrap="nowrap" valign="bottom">15</td>
    <td nowrap="nowrap" valign="bottom">76</td>
    <td nowrap="nowrap" valign="bottom">80</td>
    <td nowrap="nowrap" valign="bottom">82</td>
    <td nowrap="nowrap" valign="bottom">512</td>
    <td nowrap="nowrap" valign="bottom">517</td>
    <td nowrap="nowrap" valign="bottom">517</td>
    <td nowrap="nowrap" valign="bottom">0.160</td>
    <td nowrap="nowrap" valign="bottom">0.159</td>
    <td nowrap="nowrap" valign="bottom">0.159</td>
    <td nowrap="nowrap" valign="bottom">800</td>
    <td nowrap="nowrap" valign="bottom">1623</td>
    <td nowrap="nowrap" valign="bottom">800</td>
    <td nowrap="nowrap" valign="bottom">1631</td>
    <td nowrap="nowrap" valign="bottom">800</td>
    <td nowrap="nowrap" valign="bottom">1631</td>
  </tr>
  <tr class="header">
    <td valign="bottom" nowrap="nowrap">16</td>
    <td valign="bottom" nowrap="nowrap">81</td>
    <td valign="bottom" nowrap="nowrap">85</td>
    <td valign="bottom" nowrap="nowrap">87</td>
    <td valign="bottom" nowrap="nowrap">512</td>
    <td valign="bottom" nowrap="nowrap">517</td>
    <td valign="bottom" nowrap="nowrap">517</td>
    <td valign="bottom" nowrap="nowrap">0.170</td>
    <td valign="bottom" nowrap="nowrap">0.169</td>
    <td valign="bottom" nowrap="nowrap">0.169</td>
    <td valign="bottom" nowrap="nowrap">800</td>
    <td valign="bottom" nowrap="nowrap">1575</td>
    <td valign="bottom" nowrap="nowrap">800</td>
    <td valign="bottom" nowrap="nowrap">1583</td>
    <td valign="bottom" nowrap="nowrap">800</td>
    <td valign="bottom" nowrap="nowrap">1583</td>
  </tr>
  <tr align="center">
    <td nowrap="nowrap" valign="bottom">17</td>
    <td nowrap="nowrap" valign="bottom">86</td>
    <td nowrap="nowrap" valign="bottom">90</td>
    <td nowrap="nowrap" valign="bottom">92</td>
    <td nowrap="nowrap" valign="bottom">512</td>
    <td nowrap="nowrap" valign="bottom">517</td>
    <td nowrap="nowrap" valign="bottom">517</td>
    <td nowrap="nowrap" valign="bottom">0.180</td>
    <td nowrap="nowrap" valign="bottom">0.178</td>
    <td nowrap="nowrap" valign="bottom">0.178</td>
    <td nowrap="nowrap" valign="bottom">800</td>
    <td nowrap="nowrap" valign="bottom">1533</td>
    <td nowrap="nowrap" valign="bottom">800</td>
    <td nowrap="nowrap" valign="bottom">1540</td>
    <td nowrap="nowrap" valign="bottom">800</td>
    <td nowrap="nowrap" valign="bottom">1540</td>
  </tr>
  <tr class="header">
    <td valign="bottom" nowrap="nowrap">18</td>
    <td valign="bottom" nowrap="nowrap">91</td>
    <td valign="bottom" nowrap="nowrap">95</td>
    <td valign="bottom" nowrap="nowrap">97</td>
    <td valign="bottom" nowrap="nowrap">512</td>
    <td valign="bottom" nowrap="nowrap">517</td>
    <td valign="bottom" nowrap="nowrap">517</td>
    <td valign="bottom" nowrap="nowrap">0.190</td>
    <td valign="bottom" nowrap="nowrap">0.188</td>
    <td valign="bottom" nowrap="nowrap">0.188</td>
    <td valign="bottom" nowrap="nowrap">800</td>
    <td valign="bottom" nowrap="nowrap">1495</td>
    <td valign="bottom" nowrap="nowrap">800</td>
    <td valign="bottom" nowrap="nowrap">1502</td>
    <td valign="bottom" nowrap="nowrap">800</td>
    <td valign="bottom" nowrap="nowrap">1502</td>
  </tr>
  <tr align="center">
    <td nowrap="nowrap" valign="bottom">19</td>
    <td nowrap="nowrap" valign="bottom">96</td>
    <td nowrap="nowrap" valign="bottom">100</td>
    <td nowrap="nowrap" valign="bottom">102</td>
    <td nowrap="nowrap" valign="bottom">512</td>
    <td nowrap="nowrap" valign="bottom">517</td>
    <td nowrap="nowrap" valign="bottom">517</td>
    <td nowrap="nowrap" valign="bottom">0.200</td>
    <td nowrap="nowrap" valign="bottom">0.198</td>
    <td nowrap="nowrap" valign="bottom">0.198</td>
    <td nowrap="nowrap" valign="bottom">800</td>
    <td nowrap="nowrap" valign="bottom">1461</td>
    <td nowrap="nowrap" valign="bottom">800</td>
    <td nowrap="nowrap" valign="bottom">1468</td>
    <td nowrap="nowrap" valign="bottom">800</td>
    <td nowrap="nowrap" valign="bottom">1468</td>
  </tr>
  <tr class="header">
    <td valign="bottom" nowrap="nowrap">20</td>
    <td valign="bottom" nowrap="nowrap">101</td>
    <td valign="bottom" nowrap="nowrap">105</td>
    <td valign="bottom" nowrap="nowrap">107</td>
    <td valign="bottom" nowrap="nowrap">512</td>
    <td valign="bottom" nowrap="nowrap">517</td>
    <td valign="bottom" nowrap="nowrap">517</td>
    <td valign="bottom" nowrap="nowrap">0.209</td>
    <td valign="bottom" nowrap="nowrap">0.207</td>
    <td valign="bottom" nowrap="nowrap">0.207</td>
    <td valign="bottom" nowrap="nowrap">800</td>
    <td valign="bottom" nowrap="nowrap">1430</td>
    <td valign="bottom" nowrap="nowrap">800</td>
    <td valign="bottom" nowrap="nowrap">1437</td>
    <td valign="bottom" nowrap="nowrap">800</td>
    <td valign="bottom" nowrap="nowrap">1437</td>
  </tr>
  <tr align="center">
    <td nowrap="nowrap" valign="bottom">21</td>
    <td nowrap="nowrap" valign="bottom">106</td>
    <td nowrap="nowrap" valign="bottom">110</td>
    <td nowrap="nowrap" valign="bottom">112</td>
    <td nowrap="nowrap" valign="bottom">512</td>
    <td nowrap="nowrap" valign="bottom">517</td>
    <td nowrap="nowrap" valign="bottom">517</td>
    <td nowrap="nowrap" valign="bottom">0.219</td>
    <td nowrap="nowrap" valign="bottom">0.217</td>
    <td nowrap="nowrap" valign="bottom">0.217</td>
    <td nowrap="nowrap" valign="bottom">800</td>
    <td nowrap="nowrap" valign="bottom">1402</td>
    <td nowrap="nowrap" valign="bottom">800</td>
    <td nowrap="nowrap" valign="bottom">1408</td>
    <td nowrap="nowrap" valign="bottom">800</td>
    <td nowrap="nowrap" valign="bottom">1408</td>
  </tr>
  <tr class="header">
    <td valign="bottom" nowrap="nowrap">22</td>
    <td valign="bottom" nowrap="nowrap">111</td>
    <td valign="bottom" nowrap="nowrap">115</td>
    <td valign="bottom" nowrap="nowrap">117</td>
    <td valign="bottom" nowrap="nowrap">512</td>
    <td valign="bottom" nowrap="nowrap">517</td>
    <td valign="bottom" nowrap="nowrap">517</td>
    <td valign="bottom" nowrap="nowrap">0.229</td>
    <td valign="bottom" nowrap="nowrap">0.227</td>
    <td valign="bottom" nowrap="nowrap">0.227</td>
    <td valign="bottom" nowrap="nowrap">800</td>
    <td valign="bottom" nowrap="nowrap">1377</td>
    <td valign="bottom" nowrap="nowrap">800</td>
    <td valign="bottom" nowrap="nowrap">1382</td>
    <td valign="bottom" nowrap="nowrap">800</td>
    <td valign="bottom" nowrap="nowrap">1382</td>
  </tr>
  <tr align="center">
    <td nowrap="nowrap" valign="bottom">23</td>
    <td nowrap="nowrap" valign="bottom">116</td>
    <td nowrap="nowrap" valign="bottom">120</td>
    <td nowrap="nowrap" valign="bottom">122</td>
    <td nowrap="nowrap" valign="bottom">512</td>
    <td nowrap="nowrap" valign="bottom">517</td>
    <td nowrap="nowrap" valign="bottom">517</td>
    <td nowrap="nowrap" valign="bottom">0.239</td>
    <td nowrap="nowrap" valign="bottom">0.236</td>
    <td nowrap="nowrap" valign="bottom">0.236</td>
    <td nowrap="nowrap" valign="bottom">800</td>
    <td nowrap="nowrap" valign="bottom">1353</td>
    <td nowrap="nowrap" valign="bottom">800</td>
    <td nowrap="nowrap" valign="bottom">1358</td>
    <td nowrap="nowrap" valign="bottom">800</td>
    <td nowrap="nowrap" valign="bottom">1358</td>
  </tr>
  <tr class="header">
    <td valign="bottom" nowrap="nowrap">24</td>
    <td valign="bottom" nowrap="nowrap">121</td>
    <td valign="bottom" nowrap="nowrap">125</td>
    <td valign="bottom" nowrap="nowrap">127</td>
    <td valign="bottom" nowrap="nowrap">512</td>
    <td valign="bottom" nowrap="nowrap">517</td>
    <td valign="bottom" nowrap="nowrap">517</td>
    <td valign="bottom" nowrap="nowrap">0.249</td>
    <td valign="bottom" nowrap="nowrap">0.246</td>
    <td valign="bottom" nowrap="nowrap">0.246</td>
    <td valign="bottom" nowrap="nowrap">800</td>
    <td valign="bottom" nowrap="nowrap">1331</td>
    <td valign="bottom" nowrap="nowrap">800</td>
    <td valign="bottom" nowrap="nowrap">1336</td>
    <td valign="bottom" nowrap="nowrap">800</td>
    <td valign="bottom" nowrap="nowrap">1336</td>
  </tr>
  <tr align="center">
    <td nowrap="nowrap" valign="bottom">25</td>
    <td nowrap="nowrap" valign="bottom">126</td>
    <td nowrap="nowrap" valign="bottom">130</td>
    <td nowrap="nowrap" valign="bottom">132</td>
    <td nowrap="nowrap" valign="bottom">512</td>
    <td nowrap="nowrap" valign="bottom">517</td>
    <td nowrap="nowrap" valign="bottom">517</td>
    <td nowrap="nowrap" valign="bottom">0.258</td>
    <td nowrap="nowrap" valign="bottom">0.256</td>
    <td nowrap="nowrap" valign="bottom">0.256</td>
    <td nowrap="nowrap" valign="bottom">800</td>
    <td nowrap="nowrap" valign="bottom">1311</td>
    <td nowrap="nowrap" valign="bottom">800</td>
    <td nowrap="nowrap" valign="bottom">1316</td>
    <td nowrap="nowrap" valign="bottom">800</td>
    <td nowrap="nowrap" valign="bottom">1316</td>
  </tr>
  <tr class="header">
    <td valign="bottom" nowrap="nowrap">26</td>
    <td valign="bottom" nowrap="nowrap">131</td>
    <td valign="bottom" nowrap="nowrap">135</td>
    <td valign="bottom" nowrap="nowrap">137</td>
    <td valign="bottom" nowrap="nowrap">512</td>
    <td valign="bottom" nowrap="nowrap">517</td>
    <td valign="bottom" nowrap="nowrap">517</td>
    <td valign="bottom" nowrap="nowrap">0.268</td>
    <td valign="bottom" nowrap="nowrap">0.266</td>
    <td valign="bottom" nowrap="nowrap">0.266</td>
    <td valign="bottom" nowrap="nowrap">800</td>
    <td valign="bottom" nowrap="nowrap">1292</td>
    <td valign="bottom" nowrap="nowrap">800</td>
    <td valign="bottom" nowrap="nowrap">1297</td>
    <td valign="bottom" nowrap="nowrap">800</td>
    <td valign="bottom" nowrap="nowrap">1297</td>
  </tr>
  <tr align="center">
    <td nowrap="nowrap" valign="bottom">27</td>
    <td nowrap="nowrap" valign="bottom">136</td>
    <td nowrap="nowrap" valign="bottom">140</td>
    <td nowrap="nowrap" valign="bottom">142</td>
    <td nowrap="nowrap" valign="bottom">512</td>
    <td nowrap="nowrap" valign="bottom">517</td>
    <td nowrap="nowrap" valign="bottom">517</td>
    <td nowrap="nowrap" valign="bottom">0.278</td>
    <td nowrap="nowrap" valign="bottom">0.275</td>
    <td nowrap="nowrap" valign="bottom">0.275</td>
    <td nowrap="nowrap" valign="bottom">800</td>
    <td nowrap="nowrap" valign="bottom">1275</td>
    <td nowrap="nowrap" valign="bottom">800</td>
    <td nowrap="nowrap" valign="bottom">1280</td>
    <td nowrap="nowrap" valign="bottom">800</td>
    <td nowrap="nowrap" valign="bottom">1280</td>
  </tr>
  <tr class="header">
    <td valign="bottom" nowrap="nowrap">28</td>
    <td valign="bottom" nowrap="nowrap">141</td>
    <td valign="bottom" nowrap="nowrap">145</td>
    <td valign="bottom" nowrap="nowrap">147</td>
    <td valign="bottom" nowrap="nowrap">512</td>
    <td valign="bottom" nowrap="nowrap">517</td>
    <td valign="bottom" nowrap="nowrap">517</td>
    <td valign="bottom" nowrap="nowrap">0.288</td>
    <td valign="bottom" nowrap="nowrap">0.285</td>
    <td valign="bottom" nowrap="nowrap">0.285</td>
    <td valign="bottom" nowrap="nowrap">800</td>
    <td valign="bottom" nowrap="nowrap">1259</td>
    <td valign="bottom" nowrap="nowrap">800</td>
    <td valign="bottom" nowrap="nowrap">1263</td>
    <td valign="bottom" nowrap="nowrap">800</td>
    <td valign="bottom" nowrap="nowrap">1263</td>
  </tr>
  <tr align="center">
    <td nowrap="nowrap" valign="bottom">29</td>
    <td nowrap="nowrap" valign="bottom">146</td>
    <td nowrap="nowrap" valign="bottom">150</td>
    <td nowrap="nowrap" valign="bottom">152</td>
    <td nowrap="nowrap" valign="bottom">512</td>
    <td nowrap="nowrap" valign="bottom">517</td>
    <td nowrap="nowrap" valign="bottom">517</td>
    <td nowrap="nowrap" valign="bottom">0.297</td>
    <td nowrap="nowrap" valign="bottom">0.295</td>
    <td nowrap="nowrap" valign="bottom">0.295</td>
    <td nowrap="nowrap" valign="bottom">800</td>
    <td nowrap="nowrap" valign="bottom">1244</td>
    <td nowrap="nowrap" valign="bottom">800</td>
    <td nowrap="nowrap" valign="bottom">1248</td>
    <td nowrap="nowrap" valign="bottom">800</td>
    <td nowrap="nowrap" valign="bottom">1248</td>
  </tr>
</table><br>
<table class="border" cellpadding="0" cellspacing="0">
  <tr class="header">
    <td valign="bottom" nowrap="nowrap" bgcolor="#CCCCCC">No</td>
    <td colspan="3" valign="bottom" nowrap="nowrap" bgcolor="#CCCCCC">Distance</td>
    <td width="159" colspan="3" valign="bottom" nowrap="nowrap" bgcolor="#CCCCCC">Number    Of Points</td>
    <td width="162" colspan="3" valign="bottom" nowrap="nowrap" bgcolor="#CCCCCC">Resolution    (m)</td>
    <td width="126" colspan="2" valign="bottom" nowrap="nowrap" bgcolor="#CCCCCC">S331B/S332B    (MHz)</td>
    <td width="120" colspan="2" valign="bottom" nowrap="nowrap" bgcolor="#CCCCCC">S331C/S332C    (MHz)</td>
    <td width="120" colspan="2" valign="bottom" nowrap="nowrap" bgcolor="#CCCCCC">S331D/S332D    (MHz)</td>
  </tr> <tr align="center">
    <td valign="bottom" nowrap="nowrap" bgcolor="#CCCCCC"></td>
    <td valign="bottom" nowrap="nowrap" bgcolor="#CCCCCC">D1    (m)</td>
    <td valign="bottom" nowrap="nowrap" bgcolor="#CCCCCC">D2    (m)</td>
    <td nowrap="nowrap" bgcolor="#CCCCCC">Dcal(m)</td>
    <td valign="bottom" nowrap="nowrap" bgcolor="#CCCCCC">S331B/S332B</td>
    <td valign="bottom" nowrap="nowrap" bgcolor="#CCCCCC">S331C/S332C</td>
    <td valign="bottom" nowrap="nowrap" bgcolor="#CCCCCC">S331D/S332D</td>
    <td valign="bottom" nowrap="nowrap" bgcolor="#CCCCCC">S331B/S332B</td>
    <td valign="bottom" nowrap="nowrap" bgcolor="#CCCCCC">S331C/S332C</td>
    <td valign="bottom" nowrap="nowrap" bgcolor="#CCCCCC">S331D/S332D</td>
    <td valign="bottom" nowrap="nowrap" bgcolor="#CCCCCC">F1</td>
    <td valign="bottom" nowrap="nowrap" bgcolor="#CCCCCC">F2</td>
    <td valign="bottom" nowrap="nowrap" bgcolor="#CCCCCC">F1</td>
    <td valign="bottom" nowrap="nowrap" bgcolor="#CCCCCC">F2</td>
    <td valign="bottom" nowrap="nowrap" bgcolor="#CCCCCC">F1</td>
    <td valign="bottom" nowrap="nowrap" bgcolor="#CCCCCC">F2</td>
  </tr> <tr align="center">
    <td nowrap="nowrap" valign="bottom">30</td>
    <td nowrap="nowrap" valign="bottom">151</td>
    <td nowrap="nowrap" valign="bottom">155</td>
    <td nowrap="nowrap" valign="bottom">157</td>
    <td nowrap="nowrap" valign="bottom">512</td>
    <td nowrap="nowrap" valign="bottom">517</td>
    <td nowrap="nowrap" valign="bottom">517</td>
    <td nowrap="nowrap" valign="bottom">0.307</td>
    <td nowrap="nowrap" valign="bottom">0.304</td>
    <td nowrap="nowrap" valign="bottom">0.304</td>
    <td nowrap="nowrap" valign="bottom">800</td>
    <td nowrap="nowrap" valign="bottom">1230</td>
    <td nowrap="nowrap" valign="bottom">800</td>
    <td nowrap="nowrap" valign="bottom">1234</td>
    <td nowrap="nowrap" valign="bottom">800</td>
    <td nowrap="nowrap" valign="bottom">1234</td>
  </tr> <tr align="center">
    <td nowrap="nowrap" valign="bottom">31</td>
    <td nowrap="nowrap" valign="bottom">156</td>
    <td nowrap="nowrap" valign="bottom">160</td>
    <td nowrap="nowrap" valign="bottom">162</td>
    <td nowrap="nowrap" valign="bottom">512</td>
    <td nowrap="nowrap" valign="bottom">517</td>
    <td nowrap="nowrap" valign="bottom">517</td>
    <td nowrap="nowrap" valign="bottom">0.317</td>
    <td nowrap="nowrap" valign="bottom">0.314</td>
    <td nowrap="nowrap" valign="bottom">0.314</td>
    <td nowrap="nowrap" valign="bottom">800</td>
    <td nowrap="nowrap" valign="bottom">1216</td>
    <td nowrap="nowrap" valign="bottom">800</td>
    <td nowrap="nowrap" valign="bottom">1220</td>
    <td nowrap="nowrap" valign="bottom">800</td>
    <td nowrap="nowrap" valign="bottom">1220</td>
  </tr> <tr align="center">
    <td nowrap="nowrap" valign="bottom">32</td>
    <td nowrap="nowrap" valign="bottom">161</td>
    <td nowrap="nowrap" valign="bottom">165</td>
    <td nowrap="nowrap" valign="bottom">167</td>
    <td nowrap="nowrap" valign="bottom">512</td>
    <td nowrap="nowrap" valign="bottom">517</td>
    <td nowrap="nowrap" valign="bottom">517</td>
    <td nowrap="nowrap" valign="bottom">0.327</td>
    <td nowrap="nowrap" valign="bottom">0.324</td>
    <td nowrap="nowrap" valign="bottom">0.324</td>
    <td nowrap="nowrap" valign="bottom">800</td>
    <td nowrap="nowrap" valign="bottom">1204</td>
    <td nowrap="nowrap" valign="bottom">800</td>
    <td nowrap="nowrap" valign="bottom">1208</td>
    <td nowrap="nowrap" valign="bottom">800</td>
    <td nowrap="nowrap" valign="bottom">1208</td>
  </tr> <tr align="center">
    <td nowrap="nowrap" valign="bottom">33</td>
    <td nowrap="nowrap" valign="bottom">166</td>
    <td nowrap="nowrap" valign="bottom">170</td>
    <td nowrap="nowrap" valign="bottom">172</td>
    <td nowrap="nowrap" valign="bottom">512</td>
    <td nowrap="nowrap" valign="bottom">517</td>

    <td nowrap="nowrap" valign="bottom">517</td>
    <td nowrap="nowrap" valign="bottom">0.337</td>
    <td nowrap="nowrap" valign="bottom">0.333</td>
    <td nowrap="nowrap" valign="bottom">0.333</td>
    <td nowrap="nowrap" valign="bottom">800</td>
    <td nowrap="nowrap" valign="bottom">1192</td>
    <td nowrap="nowrap" valign="bottom">800</td>
    <td nowrap="nowrap" valign="bottom">1196</td>
    <td nowrap="nowrap" valign="bottom">800</td>
    <td nowrap="nowrap" valign="bottom">1196</td>
  </tr> <tr class="header">
    <td valign="bottom" nowrap="nowrap">34</td>
    <td valign="bottom" nowrap="nowrap">171</td>
    <td valign="bottom" nowrap="nowrap">175</td>
    <td valign="bottom" nowrap="nowrap">177</td>
    <td valign="bottom" nowrap="nowrap">512</td>
    <td valign="bottom" nowrap="nowrap">517</td>
    <td valign="bottom" nowrap="nowrap">517</td>
    <td valign="bottom" nowrap="nowrap">0.346</td>
    <td valign="bottom" nowrap="nowrap">0.343</td>
    <td valign="bottom" nowrap="nowrap">0.343</td>
    <td valign="bottom" nowrap="nowrap">800</td>
    <td valign="bottom" nowrap="nowrap">1181</td>
    <td valign="bottom" nowrap="nowrap">800</td>
    <td valign="bottom" nowrap="nowrap">1185</td>
    <td valign="bottom" nowrap="nowrap">800</td>
    <td valign="bottom" nowrap="nowrap">1185</td>
  </tr> <tr align="center">
    <td nowrap="nowrap" valign="bottom">35</td>
    <td nowrap="nowrap" valign="bottom">176</td>
    <td nowrap="nowrap" valign="bottom">180</td>
    <td nowrap="nowrap" valign="bottom">182</td>
    <td nowrap="nowrap" valign="bottom">512</td>
    <td nowrap="nowrap" valign="bottom">517</td>
    <td nowrap="nowrap" valign="bottom">517</td>
    <td nowrap="nowrap" valign="bottom">0.356</td>
    <td nowrap="nowrap" valign="bottom">0.353</td>
    <td nowrap="nowrap" valign="bottom">0.353</td>
    <td nowrap="nowrap" valign="bottom">800</td>
    <td nowrap="nowrap" valign="bottom">1171</td>
    <td nowrap="nowrap" valign="bottom">800</td>
    <td nowrap="nowrap" valign="bottom">1174</td>
    <td nowrap="nowrap" valign="bottom">800</td>
    <td nowrap="nowrap" valign="bottom">1174</td>
  </tr> <tr class="header">
    <td valign="bottom" nowrap="nowrap">36</td>
    <td valign="bottom" nowrap="nowrap">181</td>
    <td valign="bottom" nowrap="nowrap">185</td>
    <td valign="bottom" nowrap="nowrap">187</td>
    <td valign="bottom" nowrap="nowrap">512</td>
    <td valign="bottom" nowrap="nowrap">517</td>
    <td valign="bottom" nowrap="nowrap">517</td>
    <td valign="bottom" nowrap="nowrap">0.366</td>
    <td valign="bottom" nowrap="nowrap">0.362</td>
    <td valign="bottom" nowrap="nowrap">0.362</td>
    <td valign="bottom" nowrap="nowrap">800</td>
    <td valign="bottom" nowrap="nowrap">1161</td>
    <td valign="bottom" nowrap="nowrap">800</td>
    <td valign="bottom" nowrap="nowrap">1164</td>
    <td valign="bottom" nowrap="nowrap">800</td>
    <td valign="bottom" nowrap="nowrap">1164</td>
  </tr> <tr align="center">
    <td nowrap="nowrap" valign="bottom">37</td>
    <td nowrap="nowrap" valign="bottom">186</td>
    <td nowrap="nowrap" valign="bottom">190</td>
    <td nowrap="nowrap" valign="bottom">192</td>
    <td nowrap="nowrap" valign="bottom">512</td>
    <td nowrap="nowrap" valign="bottom">517</td>
    <td nowrap="nowrap" valign="bottom">517</td>
    <td nowrap="nowrap" valign="bottom">0.376</td>
    <td nowrap="nowrap" valign="bottom">0.372</td>
    <td nowrap="nowrap" valign="bottom">0.372</td>
    <td nowrap="nowrap" valign="bottom">800</td>
    <td nowrap="nowrap" valign="bottom">1151</td>
    <td nowrap="nowrap" valign="bottom">800</td>
    <td nowrap="nowrap" valign="bottom">1155</td>
    <td nowrap="nowrap" valign="bottom">800</td>
    <td nowrap="nowrap" valign="bottom">1155</td>
  </tr> <tr class="header">
    <td valign="bottom" nowrap="nowrap">38</td>
    <td valign="bottom" nowrap="nowrap">191</td>
    <td valign="bottom" nowrap="nowrap">195</td>
    <td valign="bottom" nowrap="nowrap">197</td>
    <td valign="bottom" nowrap="nowrap">512</td>
    <td valign="bottom" nowrap="nowrap">517</td>
    <td valign="bottom" nowrap="nowrap">517</td>
    <td valign="bottom" nowrap="nowrap">0.386</td>
    <td valign="bottom" nowrap="nowrap">0.382</td>
    <td valign="bottom" nowrap="nowrap">0.382</td>
    <td valign="bottom" nowrap="nowrap">800</td>
    <td valign="bottom" nowrap="nowrap">1142</td>
    <td valign="bottom" nowrap="nowrap">800</td>
    <td valign="bottom" nowrap="nowrap">1146</td>
    <td valign="bottom" nowrap="nowrap">800</td>
    <td valign="bottom" nowrap="nowrap">1146</td>
  </tr> <tr align="center">
    <td nowrap="nowrap" valign="bottom">39</td>
    <td nowrap="nowrap" valign="bottom">196</td>
    <td nowrap="nowrap" valign="bottom">200</td>
    <td nowrap="nowrap" valign="bottom">202</td>
    <td nowrap="nowrap" valign="bottom">512</td>
    <td nowrap="nowrap" valign="bottom">517</td>
    <td nowrap="nowrap" valign="bottom">517</td>
    <td nowrap="nowrap" valign="bottom">0.395</td>
    <td nowrap="nowrap" valign="bottom">0.391</td>
    <td nowrap="nowrap" valign="bottom">0.391</td>
    <td nowrap="nowrap" valign="bottom">800</td>
    <td nowrap="nowrap" valign="bottom">1134</td>
    <td nowrap="nowrap" valign="bottom">800</td>
    <td nowrap="nowrap" valign="bottom">1137</td>
    <td nowrap="nowrap" valign="bottom">800</td>
    <td nowrap="nowrap" valign="bottom">1137</td>
  </tr>
</table>