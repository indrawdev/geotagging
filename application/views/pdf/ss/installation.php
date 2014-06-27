<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed') ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xml:lang="en" xmlns="http://www.w3.org/1999/xhtml" lang="en">
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
<title>Actual / Standard Photos</title>
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
	border:none
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
	margin:none;
	padding:0;
	border:none
}
table td{
	padding:3px;
}
.phd{
	background:#DDD;
	text-align:center;
	padding:5px
}
.attach{
	text-align:center;
	margin:5px 0;
	padding:5px 0;
	height:240px;
	border-bottom:1px solid #000
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

<h1 style="margin:20px auto">ACTUAL / STANDARD PHOTOS</h1>

<?php
$arr_pcategory = array(1 => 'Site', 'ACPDB Box', 'Service Cabinet', 'Hybrid Cable', 'Sector I', 'Sector II', 'Sector III', 'MW Transmission');
for($i=1; $i < 9; $i++){
	if($i > 1) echo '<hr />';
	echo '<h3>'.$i.'. '.$arr_pcategory[$i].'</h3>';
	$Qlist = $this->db->query("
		SELECT a.`photo_id`, a.`name`, b.`comment`, b.`lac`, b.`cell_id`, b.`latitude`, b.`longitude`, b.`file`, b.`time_entry`
		FROM `ss_photos` a
		LEFT JOIN `ss_task_photo` b ON b.`photo_id`=a.`photo_id` AND `task_id`='$dx'
		WHERE a.`photo_category_id`='$i'
		ORDER BY a.`photo_id`
	");
	
	$tr = 0; $p = 5;
	echo '<table border="1" cellpadding="0" cellspacing="0"><tr>';
	foreach($Qlist->result_object() as $list){
		
		if($p == 1){
			echo '<hr /><table border="1" cellpadding="0" cellspacing="0"><tr>';
			$tr = 0;
		}
		
		if($tr == 2){
			echo '</tr><tr>';
			$tr = 0;
		}
		$tr++;
		
		if($list->photo_id == 14) echo '<td valign="top" colspan="2">'; else echo '<td valign="top" width="50%">';
		echo '<div class="phd">'.$list->name.'</div>';
		echo '<div class="attach">';
		if($list->file){
			if(file_exists('./media/ss/installation/'.$list->file)) echo '<img src="'.base_url().'media/ss/installation/'.$list->file.'" width="320" height="240">';
		}
		echo '</div>';
		if($list->latitude) $la = $this->ifunction->DECtoDMS($list->latitude);
		if($list->longitude) $lo = $this->ifunction->DECtoDMS($list->longitude);
		echo '<b>Lat:</b> '; if($list->latitude) echo $la["deg"].'&deg; '.$la["min"].'\' '.$la["sec"].'" ('.$list->latitude.')';
		echo '<br /><b>Lon:</b> '; if($list->longitude) echo $lo["deg"].'&deg; '.$lo["min"].'\' '.$lo["sec"].'" ('.$list->longitude.')';
		echo '<br /><b>LAC:</b> '; if($list->lac) echo $list->lac;
		echo '<br /><b>Cell ID:</b> '; if($list->cell_id) echo $list->cell_id;
		echo '<br /><b>Taken Time:</b> '; if($list->time_entry) echo $list->time_entry;
		echo '<br /><b>Comment:</b> '; if($list->comment) echo nl2br($list->comment);
		echo '</td>';
		
		if(in_array($p, array(4, 8), true)){
			echo '</tr></table>';
			$p = 1;
		}
		else $p++;
	}
	if($p <> 1) echo '</tr></table>';
}
?>

</body>
</html>