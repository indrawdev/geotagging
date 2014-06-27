<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$Qatm = $this->db->query("
	SELECT a.`atf_no`, a.`atf_date`, a.`work_type`, a.`atm_type`, a.`division`, a.`po_no`, a.`reason`, a.`msg_wh`, a.`msg_nom`, a.`msg_vendor`, a.`msg_consultant`, a.`msg_indosat`, a.`fl_approve`, b.`id` AS `from_siteId`, a.`from_neid`, k.`desc` AS `from_neid_desc`, b.`name` AS `from_siteName`, b.`province` AS `from_siteProv`, c.`id` AS `to_siteId`, a.`to_neid`, l.`desc` AS `to_neid_desc`, c.`name` AS `to_siteName`, c.`province` AS `to_siteProv`, d.`name` AS `vendor`, e.`name` AS `own_nm`, f.`name` AS `wh_nm`, g.`name` AS `nom_nm`, h.`name` AS `vendor_nm`, i.`name` AS `cons_nm`, j.`name` AS `ind_nm`, o.`name` AS `pmv_vendor`
	FROM `it_atm` a
	JOIN `it_site` b ON b.`site_id`=a.`from_site`
	JOIN `it_site` c ON c.`site_id`=a.`to_site`
	LEFT JOIN `it_vendor` d ON d.`vendor_id`=a.`vendor_id`
	LEFT JOIN `it_user` e ON e.`user_id`=a.`owner_id`
	JOIN `it_user` f ON f.`user_id`=a.`user_wh`
	LEFT JOIN `it_user` g ON g.`user_id`=a.`user_nom`
	JOIN `it_user` h ON h.`user_id`=a.`user_vendor`
	LEFT JOIN `it_vendor` o ON o.`vendor_id`=h.`vendor_id`
	LEFT JOIN `it_user` i ON i.`user_id`=a.`user_consultant`
	JOIN `it_user` j ON j.`user_id`=a.`user_indosat`
	LEFT JOIN `it_network` m ON m.`neid`=a.`from_neid`
	LEFT JOIN `it_network` n ON n.`neid`=a.`to_neid`
	LEFT JOIN `it_network_code` k ON k.`ne_code`=m.`ne_code`
	LEFT JOIN `it_network_code` l ON l.`ne_code`=n.`ne_code`
	WHERE a.`atm_id`='$dx'
");
$atm = $Qatm->result_object();
$atf_no = explode('/', $atm[0]->atf_no);
$msg_wh = explode('|', $atm[0]->msg_wh);
$msg_vendor = explode('|', $atm[0]->msg_vendor);
$msg_nom = explode('|', $atm[0]->msg_nom);
$msg_indosat = explode('|', $atm[0]->msg_indosat);
$msg_consultant = explode('|', $atm[0]->msg_consultant);

$dotted = '<br /><span style="border-bottom:1px dotted #000;padding:0 75px">&nbsp;</span><br />';
?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xml:lang="en" xmlns="http://www.w3.org/1999/xhtml" lang="en">
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
<title>ATF - Asset Transfer Form</title>
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
p{
	margin:5px 0 3px 0
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
.attach{
	border-bottom:1px solid #000;
	padding:5px 0;
	text-align:center
}
</style>
</head>
<body>

<table cellpadding="0" cellspacing="0">
    <tr><td align="right">ATF No</td><td width="5" align="center">:</td><td width="120"><font color="#0066FF"><?php echo $atm[0]->atf_no ?></font></td></tr>
    <tr><td align="right">ATF Date</td><td align="center">:</td><td width="120"><?php if($atm[0]->atf_date) echo $this->ifunction->ifnull(date('d F Y - H:i', strtotime($atm[0]->atf_date))) ?></td></tr>
</table>

<h1 style="margin:50px 0">ASSET TRANSFER FORM (ATF)</h1>

<table cellpadding="0" cellspacing="0" style="width:auto;margin-bottom:50px">
    <tr><td width="150">Task Type</td><td width="5" align="center">:</td><td><font color="#0066FF"><?php echo $atm[0]->work_type ?></font></td></tr>
    <tr><td>ATM Type</td><td align="center">:</td><td><font color="#0066FF"><?php echo $atm[0]->atm_type ?></font></td></tr>
    <tr><td>Division</td><td align="center">:</td><td><font color="#0066FF"><?php echo $atm[0]->division ?></font></td></tr>
    <tr><td>Vendor Executor</td><td align="center">:</td><td><font color="#0066FF"><?php echo $atm[0]->pmv_vendor ?></font></td></tr>
    <tr><td>PO. Number</td><td align="center">:</td><td><font color="#0066FF"><?php echo $atm[0]->po_no ?></font></td></tr>
    <tr><td>Reason (Project Name)</td><td align="center">:</td><td><font color="#0066FF"><?php echo $atm[0]->reason ?></font></td></tr>
</table>

<table class="border" cellpadding="0" cellspacing="0">
    <tr class="header"><td colspan="2" style="background:#090">Origin</td><td colspan="2" style="background:#CC0">Destination</td></tr>
    <tr><td width="100">Site ID</td><td><?php echo $this->ifunction->ifnull($atm[0]->from_siteId) ?></td><td width="100">New Site ID</td><td><?php echo $this->ifunction->ifnull($atm[0]->to_siteId) ?></td></tr>
    <tr><td>Site Name</td><td><?php echo $this->ifunction->ifnull($atm[0]->from_siteName) ?></td><td>New Site Name</td><td><?php echo $this->ifunction->ifnull($atm[0]->to_siteName) ?></td></tr>
    <tr><td>Area / City</td><td><?php echo $this->ifunction->ifnull($atm[0]->from_siteProv) ?></td><td>New Area / City</td><td><?php echo $this->ifunction->ifnull($atm[0]->to_siteProv) ?></td></tr>
    <tr><td>NE ID</td><td><?php echo $this->ifunction->ifnull($atm[0]->from_neid) ?></td><td>New NE ID</td><td><?php echo $this->ifunction->ifnull($atm[0]->to_neid) ?></td></tr>
    <tr><td>NE Desc</td><td><?php echo $this->ifunction->ifnull($atm[0]->from_neid_desc) ?></td><td>New NE Desc</td><td><?php echo $this->ifunction->ifnull($atm[0]->to_neid_desc) ?></td></tr>
</table>

<hr />

<table class="border" cellpadding="0" cellspacing="0">
    <tr class="header"><td>Material Type</td><td>Serial No. (Factory)</td><td>Barcode No. (Indosat)</td><td>Description</td><td>Original<br />Vendor/Brand</td><td width="40">Qty</td><td width="40">UoM</td><td width="40">Check</td><td>Note</td></tr>
    <?php
    $Qlist = $this->db->query("SELECT `material_type`, `serial_no`, `barcode`, `name`, `detail`, `qty`, `uom`, `note`, `files`, `timelog`, `check` FROM `it_site_part` WHERE `atm_id`='$dx'");
    foreach($Qlist->result_object() as $list){
		$note = explode('|', $list->note);
		$timelog = $list->timelog;
		echo '<tr><td>'.$this->ifunction->ifnull($list->material_type).'</td><td align="center">'.$this->ifunction->ifnull($list->serial_no).'</td><td align="center">'.$this->ifunction->ifnull($list->barcode).'</td><td>'.$this->ifunction->ifnull($list->name).'</td><td>'.$this->ifunction->ifnull($list->detail).'</td><td align="center">'.$this->ifunction->ifnull($list->qty).'</td><td align="center">'.$this->ifunction->ifnull($list->uom).'</td><td align="center">'.$this->ifunction->ifnull($list->check).'</td><td>'.$this->ifunction->ifnull($note[1]).'</td></tr>';
	}
	?>
</table>

<table cellpadding="0" cellspacing="0" style="margin:50px 0 0 0">
    <tr>
    	<td>Date: <?php if($timelog) echo '<font color="#0066FF">'.date('d M Y', $timelog).'</font>' ?></td>
        <td>Date: <?php if($atm[0]->fl_approve >= 1) echo '<font color="#0066FF">'.date('d M Y', $msg_wh[0]).'</font>' ?></td>
        <td>Date: <?php if($atm[0]->fl_approve >= 2) echo '<font color="#0066FF">'.date('d M Y', $msg_vendor[0]).'</font>' ?></td>
        <?php
        if($atm[0]->nom_nm){ echo '<td>Date: '; if($atm[0]->fl_approve >= 4) echo '<font color="#0066FF">'.date('d M Y', $msg_nom[0]).'</font>'; echo '</td>'; }
		if($atm[0]->cons_nm){ echo '<td>Date: '; if($atm[0]->fl_approve >= 3) echo '<font color="#0066FF">'.date('d M Y', $msg_consultant[0]).'</font>'; echo '</td>'; }
		?>
        <td>Date: <?php if($atm[0]->fl_approve >= 5) echo '<font color="#0066FF">'.date('d M Y', $msg_indosat[0]) ?></td>
	</tr>
    <tr>
    	<td>Prepared by:</td>
        <td>Received by:</td>
        <td>Approved by:</td>
        <?php
        if($atm[0]->nom_nm) echo '<td>Approved by:</td>';
		if($atm[0]->cons_nm) echo '<td>Approved by:</td>';
		?>
        <td>Acknowledge by:</td>
	</tr>
    <tr>
    	<td>(Engineer/PIC WH)</td>
        <td>(Warehouse/Site)</td>
        <td>(Vendor)</td>
        <?php
        if($atm[0]->nom_nm) echo '<td>(Regional / NOM)</td>';
		if($atm[0]->cons_nm) echo '<td>(Consultant)</td>';
		?>
        <td>(Project Manager)</td>
 	</tr>
    <tr>
    	<td height="50" valign="middle"><?php if($timelog) echo '<img src="'.base_url().'static/i/sign_prepared.jpg">'; else echo '&nbsp;' ?></td>
    	<td valign="middle"><?php if($atm[0]->fl_approve >= 1) echo '<img src="'.base_url().'static/i/sign_received.jpg">' ?></td>
    	<td valign="middle"><?php if($atm[0]->fl_approve >= 2) echo '<img src="'.base_url().'static/i/sign_approved.jpg">' ?></td>
    	<?php
        if($atm[0]->nom_nm){ echo '<td valign="middle">'; if($atm[0]->fl_approve >= 4) echo '<img src="'.base_url().'static/i/sign_approved.jpg">'; echo '</td>'; }
		if($atm[0]->cons_nm){ echo '<td valign="middle">'; if($atm[0]->fl_approve >= 3) echo '<img src="'.base_url().'static/i/sign_approved.jpg">'; echo '</td>'; }
		?>
    	<td valign="middle"><?php if($atm[0]->fl_approve >= 5) echo '<img src="'.base_url().'static/i/sign_acknowledge.jpg">' ?></td>
	</tr>
    <tr>
    	<td valign="top"><?php if($timelog) echo '<font color="#0066FF">'.$atf_no[0].date('YmdHis', $timelog).$dotted.$atm[0]->own_nm.'</font>'; else echo '&nbsp;'.$dotted.'Name:' ?></td>
        
        <td valign="top"><?php if($atm[0]->fl_approve >= 1) echo '<font color="#0066FF">'.$atf_no[0].date('YmdHis', $msg_wh[0]).$dotted.$atm[0]->wh_nm.'</font>'; else echo '&nbsp;'.$dotted.'Name:' ?></td>
        
        <td valign="top"><?php if($atm[0]->fl_approve >= 2) echo '<font color="#0066FF">'.$atf_no[0].date('YmdHis', $msg_vendor[0]).$dotted.$atm[0]->vendor_nm.'</font>'; else echo '&nbsp;'.$dotted.'Name:' ?><br /><?php echo $atm[0]->pmv_vendor ?></td>
        
        <?php
        if($atm[0]->nom_nm){
			echo '<td valign="top">'; if($atm[0]->fl_approve >= 4) echo '<font color="#0066FF">'.$atf_no[0].date('YmdHis', $msg_nom[0]).$dotted.$atm[0]->nom_nm.'</font>'; else echo '&nbsp;'.$dotted.'Name:'; echo '<br />PT. Indosat Tbk</td>';
		}
		
		if($atm[0]->cons_nm){
			echo '<td valign="top">'; if($atm[0]->fl_approve >= 3) echo '<font color="#0066FF">'.$atf_no[0].date('YmdHis', $msg_consultant[0]).$dotted.$atm[0]->cons_nm.'</font>'; else echo '&nbsp;'.$dotted.'Name:'; echo '</td>';
		}
		?>
        
        <td valign="top"><?php if($atm[0]->fl_approve == 5) echo '<font color="#0066FF">'.$atf_no[0].date('YmdHis', $msg_indosat[0]).$dotted.$atm[0]->ind_nm.'</font>'; else echo '&nbsp;'.$dotted.'Name:' ?><br />PT. Indosat Tbk</td>
 	</tr>
</table>

<?php
if($Qlist->num_rows):
echo '<hr /><h3>PHOTO ITEM :</h3><table border="1" cellpadding="0" cellspacing="0" width="100%"><tr>';
$i=0;
foreach($Qlist->result_object() as $list){
    if($i >= 3){ echo '</tr></table><hr /><table border="1" cellpadding="0" cellspacing="0" width="100%"><tr>'; $i=0; } $i++;
    echo '<td valign="top">';
	if(file_exists('./media/files/'.$list->files)) echo '<p class="attach"><img src="'.base_url().'media/files/'.$list->files.'" width="320" height="240"></p>';
	echo '<table cellpadding="0" cellspacing="0" border="0" width="100%" style="background:#EAEDF2">';
	echo '<tr><td width="45">SN</td><td width="5">:</td><td><font color="#0066FF">'.$list->serial_no.'</font></td></tr>';
	echo '<tr><td>Barcode</td><td>:</td><td><font color="#0066FF">'.$list->barcode.'</font></td></tr>';
	echo '<tr><td>Quantity</td><td>:</td><td><font color="#0066FF">'.$list->qty.'</font></td></tr>';
	echo '<tr><td>Description</td><td>:</td><td><font color="#0066FF">'.$list->name.'</font></td></tr>';
	echo '<tr><td>Date/Time</td><td>:</td><td><font color="#0066FF">'.date('d F Y - H:i', $list->timelog).'</font></td></tr>';
	echo '</table>';
	echo '</td>';
}
echo '</tr></table>';
endif;

//$Qpackaging = $this->db->query("SELECT `files`, `note`, `desc`, `timelog` FROM `it_attachment` WHERE `table`='atm_packaging' AND `idx`='$dx' ORDER BY `idx_main_order` ASC");
$Qpackaging = $this->db->query("SELECT `photo_title`, `comment`, `file`, `lac`, `cell_id`, `longitude`, `latitude`, `timelog` FROM `atm_pck_photo` WHERE `atm_id`='$dx' ORDER BY `timelog` ASC");
if($Qpackaging->num_rows):
$i=0; $pp=1;
echo '<hr /><h3>PACKAGING PHOTO :</h3>';
echo '<table border="1" cellpadding="0" cellspacing="0" width="100%"><tr>';
foreach($Qpackaging->result_object() as $packaging){
	$la = $this->ifunction->DECtoDMS($packaging->latitude);
	$lo = $this->ifunction->DECtoDMS($packaging->longitude);
    if($i >= 3){ echo '</tr></table><hr /><table border="1" cellpadding="0" cellspacing="0" width="100%"><tr>'; $i=0; } $i++;
    echo '<td valign="top">';
	if(file_exists('./media/files/atm/packaging/'.$packaging->file)) echo '<p class="attach"><img src="'.base_url().'media/files/atm/packaging/'.$packaging->file.'" width="320" height="240"></p>';
	echo '<table cellpadding="0" cellspacing="0" border="0" width="100%" style="background:#EAEDF2">';
	echo '<tr><td width="45">Title</td><td width="5">:</td><td><font color="#0066FF">Packaging Photo '.$pp.'</font></td></tr>'; //$packaging->photo_title
	echo '<tr><td>Latitude</td><td>:</td><td><font color="#0066FF">'.$la["deg"].'&deg; '.$la["min"].'\' '.$la["sec"].'" ('.$packaging->latitude.')</font></td></tr>';
	echo '<tr><td>Logitude</td><td>:</td><td><font color="#0066FF">'.$lo["deg"].'&deg; '.$lo["min"].'\' '.$lo["sec"].'" ('.$packaging->longitude.')</font></td></tr>';
	echo '<tr><td>LAC</td><td>:</td><td><font color="#0066FF">'.$packaging->lac.'</font></td></tr>';
	echo '<tr><td>Cell ID</td><td>:</td><td><font color="#0066FF">'.$packaging->cell_id.'</font></td></tr>';
	echo '<tr><td>Comment</td><td>:</td><td><font color="#0066FF">'.$packaging->comment.'</font></td></tr>';
	echo '<tr><td>Date/Time</td><td>:</td><td><font color="#0066FF">'.date('d F Y - H:i', $packaging->timelog).'</font></td></tr>';
	echo '</table>';
	echo '</td>';
	$pp++;
}
echo '</tr></table>';
endif;

$Qinshelter = $this->db->query("SELECT `photo_title`, `comment`, `file`, `lac`, `cell_id`, `longitude`, `latitude`, `timelog` FROM `atm_isc_photo` WHERE `atm_id`='$dx' ORDER BY `timelog` ASC");
if($Qinshelter->num_rows):
$i=0; $iscp=1;
echo '<hr /><h3>IN SHELTER CONDITION PHOTO :</h3>';
echo '<table border="1" cellpadding="0" cellspacing="0" width="100%"><tr>';
foreach($Qinshelter->result_object() as $inshelter){
	$la = $this->ifunction->DECtoDMS($inshelter->latitude);
	$lo = $this->ifunction->DECtoDMS($inshelter->longitude);
    if($i >= 3){ echo '</tr></table><hr /><table border="1" cellpadding="0" cellspacing="0" width="100%"><tr>'; $i=0; } $i++;
    echo '<td valign="top">';
	if(file_exists('./media/files/atm/in_shelter_condition/'.$inshelter->file)) echo '<p class="attach"><img src="'.base_url().'media/files/atm/in_shelter_condition/'.$inshelter->file.'" width="320" height="240"></p>';
	echo '<table cellpadding="0" cellspacing="0" border="0" width="100%" style="background:#EAEDF2">';
	echo '<tr><td width="45">Title</td><td width="5">:</td><td><font color="#0066FF">In Shelter Condition Photo '.$iscp.'</font></td></tr>'; //$inshelter->photo_title
	echo '<tr><td>Latitude</td><td>:</td><td><font color="#0066FF">'.$la["deg"].'&deg; '.$la["min"].'\' '.$la["sec"].'" ('.$inshelter->latitude.')</font></td></tr>';
	echo '<tr><td>Logitude</td><td>:</td><td><font color="#0066FF">'.$lo["deg"].'&deg; '.$lo["min"].'\' '.$lo["sec"].'" ('.$inshelter->longitude.')</font></td></tr>';
	echo '<tr><td>LAC</td><td>:</td><td><font color="#0066FF">'.$inshelter->lac.'</font></td></tr>';
	echo '<tr><td>Cell ID</td><td>:</td><td><font color="#0066FF">'.$inshelter->cell_id.'</font></td></tr>';
	echo '<tr><td>Comment</td><td>:</td><td><font color="#0066FF">'.$inshelter->comment.'</font></td></tr>';
	echo '<tr><td>Date/Time</td><td>:</td><td><font color="#0066FF">'.date('d F Y - H:i', $inshelter->timelog).'</font></td></tr>';
	echo '</table>';
	echo '</td>';
	$iscp++;
}
echo '</tr></table>';
endif;

$Qoutshelter = $this->db->query("SELECT `photo_title`, `comment`, `file`, `lac`, `cell_id`, `longitude`, `latitude`, `timelog` FROM `atm_osc_photo` WHERE `atm_id`='$dx' ORDER BY `timelog` ASC");
if($Qoutshelter->num_rows):
$i=0; $oscp=1;
echo '<hr /><h3>OUT SHELTER CONDITION PHOTO:</h3>';
echo '<table border="1" cellpadding="0" cellspacing="0" width="100%"><tr>';
foreach($Qoutshelter->result_object() as $outshelter){
	$la = $this->ifunction->DECtoDMS($outshelter->latitude);
	$lo = $this->ifunction->DECtoDMS($outshelter->longitude);
    if($i >= 3){ echo '</tr></table><hr /><table border="1" cellpadding="0" cellspacing="0" width="100%"><tr>'; $i=0; } $i++;
    echo '<td valign="top">';
	if(file_exists('./media/files/atm/out_shelter_condition/'.$outshelter->file)) echo '<p class="attach"><img src="'.base_url().'media/files/atm/out_shelter_condition/'.$outshelter->file.'" width="320" height="240"></p>';
	echo '<table cellpadding="0" cellspacing="0" border="0" width="100%" style="background:#EAEDF2">';
	echo '<tr><td width="45">Title</td><td width="5">:</td><td><font color="#0066FF">Out Shelter Condition Photo '.$oscp.'</font></td></tr>'; //$outshelter->photo_title
	echo '<tr><td>Latitude</td><td>:</td><td><font color="#0066FF">'.$la["deg"].'&deg; '.$la["min"].'\' '.$la["sec"].'" ('.$outshelter->latitude.')</font></td></tr>';
	echo '<tr><td>Logitude</td><td>:</td><td><font color="#0066FF">'.$lo["deg"].'&deg; '.$lo["min"].'\' '.$lo["sec"].'" ('.$outshelter->longitude.')</font></td></tr>';
	echo '<tr><td>LAC</td><td>:</td><td><font color="#0066FF">'.$outshelter->lac.'</font></td></tr>';
	echo '<tr><td>Cell ID</td><td>:</td><td><font color="#0066FF">'.$outshelter->cell_id.'</font></td></tr>';
	echo '<tr><td>Comment</td><td>:</td><td><font color="#0066FF">'.$outshelter->comment.'</font></td></tr>';
	echo '<tr><td>Date/Time</td><td>:</td><td><font color="#0066FF">'.date('d F Y - H:i', $outshelter->timelog).'</font></td></tr>';
	echo '</table>';
	echo '</td>';
	$oscp++;
}
echo '</tr></table>';
endif;

?>
</body>
</html>