<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed') ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xml:lang="en" xmlns="http://www.w3.org/1999/xhtml" lang="en">
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
<title>Site Asset</title>
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
table.border tr, table.border td{
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
	text-align:center;
	padding:5px 0
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
</style>
</head>
<body>

<?php if($print){ ?>
<div id="paging">
	<div class="page-number"></div>
</div>
<?php } ?>

<h1 style="margin-top:200px">ASSET EQUIPMENT & BARCODE</h1>

<?php
$Qsite = $this->db->query("
				SELECT a.`site_id`, b.`id`, b.`name`, b.`address`, b.`city`, b.`province`
				FROM `it_atp` a
				JOIN `it_site` b ON b.`site_id`=a.`site_id`
				WHERE a.`atp_id`='$dx'");
				$site = $Qsite->result_object() ?>
<table class="footer" cellpadding="0" cellspacing="0" style="margin-top:200px">
<tr><td width="100">Site ID</td><td width="10" align="center">:</td><td><?php echo $site[0]->id ?></td></tr>
<tr><td>Site Name</td><td align="center">:</td><td><?php echo $site[0]->name ?></td></tr>
<tr><td>Site Address</td><td align="center">:</td><td><?php echo $site[0]->address ?></td></tr>
<tr><td>Site City</td><td align="center">:</td><td><?php echo $site[0]->city ?></td></tr>
<tr><td>Site Province</td><td align="center">:</td><td><?php echo $site[0]->province ?></td></tr>
</table>

<hr />

<?php
//<table class="border" cellpadding="0" cellspacing="0">
//<tr class="header"><td>Before (Installation)</td><td>After (Verification)</td></tr>
//$Qsiteasset = $this->db->query("SELECT `site_part_id`, `id`, `name`, `barcode`, `serial_no`, `note`, `files`, `fl_active`, `timelog`, `timelog_updated` FROM `it_site_part` WHERE `id`='".$site[0]->id."' ORDER BY `site_part_id` ASC");
$Qsiteasset = $this->db->query("SELECT `site_part_id`, `id`, `name`, `barcode`, `serial_no`, `note`, `files`, `fl_active`, `timelog`, `timelog_updated` FROM `it_site_part` WHERE `atp_id`='$dx' ORDER BY `site_part_id` ASC");
if($Qsiteasset->num_rows){
	$i=0;
	echo '<table class="border" cellpadding="0" cellspacing="0"><tr>';
	foreach($Qsiteasset->result_object() as $siteasset){
		
		if($i >= 2){ echo '</tr><tr>'; $i=0; } $i++;
		echo '<td valign="top">';
		if(file_exists('./media/files/'.$siteasset->files)) echo '<p class="attach"><img src="'.base_url().'media/files/'.$siteasset->files.'" width="320" height="240"></p>';
		echo '<p><b>'.$siteasset->name.'</b>';
		echo '<br /><br /><i>Barcode: '.$siteasset->barcode;
		echo '<br />Manufactur: '.$siteasset->serial_no;
		echo '<br />Taken Time: '.date('d M Y - H:i:s', $siteasset->timelog);
		echo '<br />Note: '.$siteasset->note;
		echo '<br /><br />Status: ';
		if($siteasset->fl_active==0){
			echo '<font color="#F00"> Dismantle</font>';
			echo '<br />Moving Time: '.date('d M Y - H:i:s', $siteasset->timelog_updated);
		}
		else echo '<font color="#090"><b> Active</b></font>';
		echo '</i></p>';
		echo '</td>';
		
		/*if(file_exists('./media/files/'.$siteasset->files)) echo '<p class="attach"><img src="'.base_url().'media/files/'.$siteasset->files.'" width="320" height="240" style="border:1px solid #000;padding:1px"></p>';
		echo '<p><b>'.$siteasset->name.'</b>';
		echo '<br /><br /><i>Barcode: '.$siteasset->barcode;
		echo '<br />Manufactur: '.$siteasset->serial_no;
		echo '<br />Taken Time: '.date('d M Y - H:i:s', $siteasset->timelog);
		echo '<br />Note: '.$siteasset->note;
		echo '<br /><br />Status: ';
		if($siteasset->fl_active==0){
			echo '<font color="#F00"> Dismantle</font>';
			echo '<br />Moving Time: '.date('d M Y - H:i:s', $siteasset->timelog_updated);
		}
		else echo '<font color="#090"><b> Active</b></font>';
		echo '</i></p>';
		echo '<div style="border-bottom:1px solid #000;width:100%"></div>';*/
		
		
		/*echo '<tr>';
		echo '<td valign="top">';
		if(file_exists('./media/files/'.$siteasset->files)) echo '<p class="attach"><img src="'.base_url().'media/files/'.$siteasset->files.'" width="320" height="240"></p>';
		echo '<p><b>'.$siteasset->name.'</b>';
		echo '<br /><br /><i>Barcode: '.$siteasset->barcode;
		echo '<br />Manufactur: '.$siteasset->serial_no;
		echo '<br />Taken Time: '.date('d M Y - H:i:s', $siteasset->timelog);
		echo '<br /><br />Status: ';
		if($siteasset->fl_active==0){
			echo '<font color="#F00"> Dismantle</font>';
			echo '<br />Moving Time: '.date('d M Y - H:i:s', $siteasset->timelog_updated);
		}
		else echo '<font color="#090"><b> Active</b></font>';
		echo '</i></p></td>';
		
		echo '<td valign="top">';
		$Qlist = $this->db->query("SELECT `files`, `note`, `desc`, `timelog` FROM `it_attachment` WHERE `table`='site_scan_barcode' AND `idx`='$siteasset->id' AND `idx_main`='$siteasset->site_part_id' ORDER BY `attachment_id` DESC LIMIT 1");
		if($Qlist->num_rows){
			$list = $Qlist->result_object();
			$note = explode('|', $list[0]->note);
			if(file_exists('./media/files/'.$list[0]->files)) echo '<p class="attach"><img src="'.base_url().'media/files/'.$list[0]->files.'" width="320" height="240"></p>';
			echo '<p><b>'.$siteasset->name.'</b>';
			echo '<br /><br /><i>Barcode: <font color="#'; if($note[0]==$siteasset->barcode) echo '090'; else echo 'F00'; echo '"> '.$note[0].'</font>';
			echo '<br />Manufactur: <font color="#'; if($note[0]==$siteasset->barcode) echo '090'; else echo 'F00'; echo '"> '.$note[1].'</font>';
			echo '<br />Taken Time: '.date('d M Y - H:i:s', $list[0]->timelog).'</i></p>';
		}
		echo '</td>';
		echo '</tr>';*/
	}
	echo '</tr></table>';
}
//</table>
?>

</body>
</html>