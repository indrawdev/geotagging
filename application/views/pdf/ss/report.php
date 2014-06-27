<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed') ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xml:lang="en" xmlns="http://www.w3.org/1999/xhtml" lang="en">
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
<title>Site Supervisory Checklist</title>
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
	font-size:10px;
	border:1px solid #EEE;
}
table.border_none td{
	vertical-align:top;
	font-size:10px;
	border:none;
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

<?php if($print){ ?>
<div id="paging">
  <div class="page-number"></div>
</div>
<?php } ?>

<?php
$Qsite = $this->db->query("
	SELECT b.`id`, b.`name`, b.`latitude`, b.`longitude`, a.`date`, a.`arrival_time`, a.`departure_time`, a.`ran_vendor`, a.`ran_vendor_team_lead`, a.`mobile_no`, a.`sub_contractor`, a.`sub_contractor_team_lead`, a.`order_pmvendor`, a.`agreed_date`, a.`order_consultant`, a.`order_pmisat`, c.`name` AS `name_vendor`, c.`sign_path` AS `sign_vendor`, d.`name` AS `name_cons`, d.`sign_path` AS `sign_cons`, e.`name` AS `name_indosat`, e.`sign_path` AS `sign_indosat`, f.`date` AS `date_vendor`, g.`date` AS `date_cons`, h.`date` AS `date_indosat`
	FROM `ss_task` a
	JOIN `it_site` b ON b.`site_id`=a.`site_id`
	
	JOIN `it_user` c ON c.`user_id`=a.`user_pmvendor`
	LEFT JOIN `it_user` d ON d.`user_id`=a.`user_consultant`
	JOIN `it_user` e ON e.`user_id`=a.`user_pmisat`
	
	LEFT JOIN (
		SELECT `user_id`, MAX(`timelog`) AS `date` FROM `it_log_app` WHERE `table`='ss' AND `idx`='$dx' GROUP BY `user_id`
	) f ON f.`user_id`=a.`user_pmvendor`
	
	LEFT JOIN (
		SELECT `user_id`, MAX(`timelog`) AS `date` FROM `it_log_app` WHERE `table`='ss' AND `idx`='$dx' GROUP BY `user_id`
	) g ON g.`user_id`=a.`user_consultant`
	
	LEFT JOIN (
		SELECT `user_id`, MAX(`timelog`) AS `date` FROM `it_log_app` WHERE `table`='ss' AND `idx`='$dx' GROUP BY `user_id`
	) h ON h.`user_id`=a.`user_pmisat`
	WHERE a.`task_id`='$dx'
");
$site = $Qsite->result_object();
$la = $this->ifunction->DECtoDMS($site[0]->latitude);
$lo = $this->ifunction->DECtoDMS($site[0]->longitude);
?>
<table class="border" cellpadding="0" cellspacing="0">
<tr>
	<td colspan="2" style="background:#413C7E;color:#FFF;font-size:16px">&nbsp; Supervision Site</td>
    <td width="118" align="center"><img src="<?php echo base_url() ?>static/i/indosat.jpg" height="35" /></td>
</tr>
<tr><td colspan="3" bgcolor="#B3E7FC">SITE</td></tr>
<tr>
	<td width="110">Site ID:</td>
	<td colspan="2"><?php echo $site[0]->id ?></td>
</tr>
<tr>
	<td>Site Name:</td>
	<td colspan="2"><?php echo $site[0]->name ?></td>
</tr>
<tr>
	<td>Site Location (Lat, Long):</td>
	<td colspan="2">
	<?php echo $la["deg"] ?>&deg; <?php echo $la["min"] ?>' <?php echo $la["sec"] ?>" (<?php echo $site[0]->latitude ?>), &nbsp;
    <?php echo $lo["deg"] ?>&deg; <?php echo $lo["min"] ?>' <?php echo $lo["sec"] ?>" (<?php echo $site[0]->longitude ?>)
    </td>
</tr>
<tr><td colspan="3">&nbsp;</td></tr>
<tr>
	<td>Date:</td>
	<td colspan="2"><?php echo $site[0]->date; $agreed_date = $site[0]->agreed_date; ?></td>
</tr>
<tr>
	<td>Arrival Time:</td>
	<td colspan="2"><?php echo $site[0]->arrival_time ?></td>
</tr>
<tr>
	<td>Departure Time:</td>
	<td colspan="2"><?php echo $site[0]->departure_time ?></td>
</tr>
<tr><td colspan="3">&nbsp;</td></tr>
<tr>
	<td>RAN Vendor:</td>
	<td colspan="2"><?php echo $site[0]->ran_vendor ?></td>
</tr>
<tr>
	<td>RAN Vendor team lead:</td>
	<td colspan="2"><?php echo $site[0]->ran_vendor_team_lead ?></td>
</tr>
<tr>
	<td>Mobile no:</td>
	<td colspan="2"><?php echo $site[0]->mobile_no ?></td>
</tr>
<tr><td colspan="3">&nbsp;</td></tr>
<tr>
	<td>Sub-contractor:</td>
	<td colspan="2"><?php echo $site[0]->sub_contractor ?></td>
</tr>
<tr>
	<td>Sub-contractor team lead:</td>
	<td colspan="2"><?php echo $site[0]->sub_contractor_team_lead ?></td>
</tr>
<tr><td colspan="3" bgcolor="#B3E7FC">INSPECTION RESULT</td></tr>
<tr><td colspan="3"><b>The work specified in the Purchase Order has be carried out accord to the Site Information Document</b></td></tr>
<tr bgcolor="#CCCCCC">
	<td colspan="2">Overall Quality Score</td>
    <td align="center">
    <?php
    $Qscore = $this->db->query("SELECT COALESCE( ROUND( (
        (
            SELECT SUM( `Done` )
            FROM (
                SELECT IF( (`result` = 'OK') OR (`result` = 'N/A'), b.`score` , 0 ) AS 'Done'
                FROM `ss_task_item` a
                JOIN `ss_items` b ON ( a.`item_id` = b.`item_id` )
                WHERE `task_id` ='$dx' ) AS `ss` ) / (
                SELECT SUM( `score` )
                FROM `ss_items` )
                ) *100
            ), 0
        ) AS `scores`
    ");
    $score = $Qscore->result_object();
    echo '<b>'.$score[0]->scores.'%</b>';
    ?>
    </td>
</tr>
<tr>
    <td colspan="3">
    <p><b>The site is Accepted, Accepted with Punch List  or Rejected</b></p>
    <table class="border_none" bgcolor="#CCCCCC" cellpadding="0" cellspacing="0">
    <tr style="color:#FFF">
        <td align="center" bgcolor="#413C7E">Scope</td>
        <td align="center" width="55" bgcolor="#413C7E">Applicable</td>
        <td align="center" width="55" bgcolor="#413C7E">Result</td>
    </tr>
    <?php
    $arr_rcolor = array('ACCEPT' => '0F9', 'ACCEPT WITH REMARK' => '9C0', 'REJECT' => 'FF7A7A', 'N/A' => 'FFF', 'NA' => 'FFF');
    $Qscopes = $this->db->query("
        SELECT a.`name`, b.`scope_id`
        FROM `ss_scope` a
        LEFT JOIN `ss_task_scope` b ON b.`scope_id`=a.`scope_id` AND b.`task_id`='$dx'
    ");
    foreach($Qscopes->result_object() as $scopes){
        echo '<tr><td>'.$scopes->name.'</td>';
        echo '<td align="center"><img src="'.base_url().'static/i/checkbox'; if($scopes->scope_id) echo '_checked'; echo '.jpg"></td>';
        if($scopes->scope_id){
            $Qresults = $this->db->query("
                SELECT IF( (
                    SELECT COUNT( 1 )
                    FROM `ss_task_item` a
                    JOIN `ss_scope_item` b ON ( a.`item_id` = b.`item_id` )
                    WHERE a.`task_id` ='$dx'
                    AND b.`scope_id` ='$scopes->scope_id'
                    AND b.`level_of_duty` = 'MAJOR'
                    AND (a.`result` = 'OK' OR a.`result` = 'N/A') ) = (
                    SELECT COUNT( 1 )
                    FROM `ss_scope_item`
                    WHERE `scope_id` ='$scopes->scope_id'
                    AND `level_of_duty` = 'MAJOR' ) , (
                        SELECT IF( (
                            SELECT COUNT( 1 )
                            FROM `ss_task_item` a
                            JOIN `ss_scope_item` b ON ( a.`item_id` = b.`item_id` )
                            WHERE a.`task_id` ='$dx'
                            AND b.`scope_id` ='$scopes->scope_id'
                            AND b.`level_of_duty` = 'minor'
                            AND (a.`result` = 'OK' OR a.`result` = 'N/A') ) = (
                            SELECT COUNT( 1 )
                            FROM `ss_scope_item`
                            WHERE `scope_id` ='$scopes->scope_id'
                            AND `level_of_duty` = 'minor' ) , 'ACCEPT', 'ACCEPT WITH REMARK'
                        )
                    ), 'REJECT'
                ) AS `result`
            ");
            $results = $Qresults->result_object();
            echo '<td style="text-align:center;background:#'.$arr_rcolor[$results[0]->result].'">'.$results[0]->result.'</td>';
        }
        else echo '<td></td>';
        echo '</tr>';
    }
    ?>
    </table>
    </td>
</tr>
<tr bgcolor="#CCCCCC">
	<td colspan="2">Overall Punch List items</td>
    <td align="center">
    <?php
    $Qpunch = $this->db->query("SELECT COUNT(1) AS `overall` FROM `ss_task_punchlist_photo` WHERE `task_id`='$dx'");
    $punch = $Qpunch->result_object();
    echo '<b>'.$punch[0]->overall.'</b>';
    ?>
    </td>
</tr>
<tr><td colspan="3">&nbsp;</td></tr>
<tr><td colspan="3"><b>A deficiency list has been created.  Site will be reviewed when deficiencies are clear</b></td></tr>
<tr bgcolor="#CCCCCC">
	<td colspan="2">Agreed date for Rectification / Re-inspection</td>
    <td align="center"><?php echo $agreed_date; ?></td>
</tr>
<tr><td colspan="3">&nbsp;</td></tr>
<tr><td colspan="3" bgcolor="#B3E7FC">Signed</td></tr>
<tr>
	<td colspan="3">
    <table class="border_none" cellpadding="0" cellspacing="0">
    <tr><td colspan="4"><b>Vendor / sub-contrator:</b></td></tr>
    <tr><td align="right" width="70">Name:</td><td colspan="3"><?php if($site[0]->order_pmvendor == 1) echo $site[0]->name_vendor ?></td></tr>
    <tr><td align="right">Date:</td><td colspan="3"><?php if($site[0]->order_pmvendor == 1) echo date('d M Y', $site[0]->date_vendor) ?></td></tr>
    <tr><td align="right" height="80">Signature:</td><td colspan="3"><?php if($site[0]->order_pmvendor == 1){ if($site[0]->sign_vendor) echo '<img src="'.base_url().'media/files/'.$site[0]->sign_vendor.'">'; } ?></td></tr>
    
    <tr><td colspan="2"><b>For Indosat:</b></td><td colspan="2"><b>For Indosat:</b></td></tr>
    <tr><td align="right">Name:</td><td><?php if($site[0]->order_consultant == 1) echo $site[0]->name_cons ?></td><td align="right" width="70">Name:</td><td><?php if($site[0]->order_pmisat == 1) echo $site[0]->name_indosat ?></td></tr>
    <tr><td align="right">Date:</td><td><?php if($site[0]->order_consultant == 1) echo date('d M Y', $site[0]->date_cons) ?></td><td align="right">Date:</td><td><?php if($site[0]->order_pmisat == 1) echo date('d M Y', $site[0]->date_indosat) ?></td></tr>
    <tr><td align="right" height="80">Signature:</td><td><?php if($site[0]->order_consultant == 1){ if($site[0]->sign_cons) echo '<img src="'.base_url().'media/files/'.$site[0]->sign_cons.'">'; } ?></td><td align="right">Signature:</td><td><?php if($site[0]->order_pmisat == 1){ if($site[0]->sign_indosat) echo '<img src="'.base_url().'media/files/'.$site[0]->sign_indosat.'">'; } ?></td></tr>
    
    </table>
	</td>
</tr>
</table>

<hr />

<table border="0" style="margin-bottom:50px">
<tr>
    <td rowspan="6"><img src="<?php echo base_url() ?>static/i/indosat.jpg" /></td>
    <td align="center" width="90" bgcolor="#CCCCCC">Scope</td>
    <td align="center" width="50" bgcolor="#CCCCCC">Applicable</td>
    <td align="center" width="50" bgcolor="#CCCCCC">Result</td>
</tr>
<?php
$arr_rcolor = array('ACCEPT' => '0F9', 'ACCEPT WITH REMARK' => '9C0', 'REJECT' => 'FF7A7A', 'N/A' => 'FFF', 'NA' => 'FFF');
$Qscopes = $this->db->query("
    SELECT a.`name`, b.`scope_id`
    FROM `ss_scope` a
    LEFT JOIN `ss_task_scope` b ON b.`scope_id`=a.`scope_id` AND b.`task_id`='$dx'
");
foreach($Qscopes->result_object() as $scopes){
    echo '<tr><td>'.$scopes->name.'</td>';
    echo '<td align="center"><img src="'.base_url().'static/i/checkbox'; if($scopes->scope_id) echo '_checked'; echo '.jpg"></td>';
    if($scopes->scope_id){
        $Qresults = $this->db->query("
            SELECT IF( (
                SELECT COUNT( 1 )
                FROM `ss_task_item` a
                JOIN `ss_scope_item` b ON ( a.`item_id` = b.`item_id` )
                WHERE a.`task_id` ='$dx'
                AND b.`scope_id` ='$scopes->scope_id'
                AND b.`level_of_duty` = 'MAJOR'
                AND (a.`result` = 'OK' OR a.`result` = 'N/A') ) = (
                SELECT COUNT( 1 )
                FROM `ss_scope_item`
                WHERE `scope_id` ='$scopes->scope_id'
                AND `level_of_duty` = 'MAJOR' ) , (
                    SELECT IF( (
                        SELECT COUNT( 1 )
                        FROM `ss_task_item` a
                        JOIN `ss_scope_item` b ON ( a.`item_id` = b.`item_id` )
                        WHERE a.`task_id` ='$dx'
                        AND b.`scope_id` ='$scopes->scope_id'
                        AND b.`level_of_duty` = 'minor'
                        AND (a.`result` = 'OK' OR a.`result` = 'N/A') ) = (
                        SELECT COUNT( 1 )
                        FROM `ss_scope_item`
                        WHERE `scope_id` ='$scopes->scope_id'
                        AND `level_of_duty` = 'minor' ) , 'ACCEPT', 'ACCEPT WITH REMARK'
                    )
                ), 'REJECT'
            ) AS `result`
        ");
        $results = $Qresults->result_object();
        echo '<td style="text-align:center;background:#'.$arr_rcolor[$results[0]->result].'">'.$results[0]->result.'</td>';
    }
    else echo '<td></td>';
    echo '</tr>';
}
?>
</table>

<table border="0">
<tr>
    <td><em><strong>* Inspectors must check  all MAJOR and minor items. For Info. Items are optional.</strong></em></td>
    <td align="right">
    <?php
    $Qscore = $this->db->query("SELECT COALESCE( ROUND( (
        (
            SELECT SUM( `Done` )
            FROM (
                SELECT IF( (`result` = 'OK') OR (`result` = 'N/A'), b.`score` , 0 ) AS 'Done'
                FROM `ss_task_item` a
                JOIN `ss_items` b ON ( a.`item_id` = b.`item_id` )
                WHERE `task_id` ='$dx' ) AS `ss` ) / (
                SELECT SUM( `score` )
                FROM `ss_items` )
                ) *100
            ), 0
        ) AS `scores`
    ");
    $score = $Qscore->result_object();
    echo 'Score: <b>'.$score[0]->scores.'%</b>';
    ?>
    </td>
</tr>
</table>

<?php
$arr_scolor = array('minor' => 'FF7A7A', 'MAJOR' => 'FF7A7A', 'N/A' => 'BBB', 'For Info.' => 'BBB');
$arr_icategory = array(1 => 'Site', 'Documentation', 'Service Cabinet', 'Sectors', 'Microwave Transmission');
for($i=1; $i < 6; $i++){
	echo '<h3>'.$i.') '.$arr_icategory[$i].'</h3>';
	echo '<table class="border" cellpadding="0" cellspacing="0">';
	$Qlist = $this->db->query("
		SELECT d.`level_of_duty` AS 'cme', e.`level_of_duty` AS 'mini_cme', f.`level_of_duty` AS 'transmission', g.`level_of_duty` AS 'ran_atp', h.`level_of_duty` AS 'ant_ver', a.`name`, c.`planned`, b.`item_subcategory_id`, b.`name` AS `sub`, c.`actual`, c.`result`, IF(a.`free_text`=0, NULL, 1) AS 'is_freetext'
		FROM `ss_items` a
		JOIN `ss_item_subcategory` b ON b.`item_subcategory_id`=a.`item_subcategory_id` AND b.`item_category_id`=$i
		LEFT JOIN `ss_task_item` c ON c.`item_id`=a.`item_id` AND c.`task_id`=$dx
		JOIN `ss_scope_item` d ON (d.`item_id` = a.`item_id`) AND d.`scope_id`=1
		JOIN `ss_scope_item` e ON (e.`item_id` = a.`item_id`) AND e.`scope_id`=2
		JOIN `ss_scope_item` f ON (f.`item_id` = a.`item_id`) AND f.`scope_id`=3
		JOIN `ss_scope_item` g ON (g.`item_id` = a.`item_id`) AND g.`scope_id`=4
		JOIN `ss_scope_item` h ON (h.`item_id` = a.`item_id`) AND h.`scope_id`=5
		ORDER BY a.`item_id` ASC
	");
	$sid=0; $i_sid = 0;
	foreach($Qlist->result_object() as $list){
		if($sid <> $list->item_subcategory_id){
			$sid = $list->item_subcategory_id;
			$i_sid++;
			$i_id = 1;
			echo '<tr bgcolor="#CCCCCC">';
			echo '<td align="center" width="30">Power<br />Supply</td><td align="center" width="30">Mini<br />CME</td><td align="center" width="30">Trans<br />mission</td><td align="center" width="30">RAN<br />ATP</td><td align="center" width="30">Antenna<br />Ver</td>';
			if($list->is_freetext) echo '<td colspan="2"><b>'.$i.'.'.$i_sid.') '.$list->sub.'</b><td align="center" width="50">Planned</td><td align="center" width="50">Actual</td><td></td>'; else echo '<td colspan="5"><b>'.$i.'.'.$i_sid.') '.$list->sub.'</b></td>';
			echo '</tr>';
		}
		echo '<tr>'; //if($list->result=="NOK"){ echo '<tr bgcolor="FFDBDB">'; }else{ echo '<tr>'; }
		echo '<td style="text-align:center;color:#'.$arr_scolor[$list->cme].'">'.$list->cme.'</td><td style="text-align:center;color:#'.$arr_scolor[$list->mini_cme].'">'.$list->mini_cme.'</td><td style="text-align:center;color:#'.$arr_scolor[$list->transmission].'">'.$list->transmission.'</td><td style="text-align:center;color:#'.$arr_scolor[$list->ran_atp].'">'.$list->ran_atp.'</td>'.'</td><td style="text-align:center;color:#'.$arr_scolor[$list->ant_ver].'">'.$list->ant_ver.'</td>';
		echo '<td width="30">'.$i.'.'.$i_sid.'.'.$i_id.'</td>';
		if($list->is_freetext){
			echo '<td style="'; if($list->result) echo 'color:#06F;'; if($list->result=="NOK") echo 'background:#FFDBDB'; echo '">'.$list->name.'</td>';
			echo '<td align="center" style="background:#FFFFCC">'.$list->planned.'</td>';
			echo '<td align="center" style="background:#D1FFCC">'.$list->actual.'</td>';
		}else{
			echo '<td colspan="3" style="'; if($list->result) echo 'color:#06F;'; if($list->result=="NOK") echo 'background:#FFDBDB'; echo '">'.$list->name.'</td>';
		}
		if($list->result=="NOK") echo '<td width="35" align="center" style="background:#FFDBDB">'.$list->result.'&nbsp;</td>'; else echo '<td width="35" align="center">'.$list->result.'&nbsp;</td>';
		echo '</tr>';
		$i_id++;
	}
	echo '</table>';
}
echo '</body></html>';