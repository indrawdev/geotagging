<?php
require_once('koneksi_db.php');
extract($_GET);
//echo "<pre>";print_r($_GET);die();
$prefix = "";

if($asdesc==1){
	if($sort=="DESC"){
		$order = "ASC"; 
	}
	else $order = "DESC";
}
else $order = "DESC";

if($search_text){
	$search_text = str_replace(array("'", '"'), array("", ""), $search_text);
	$prefix = " WHERE it_imei.imei_id LIKE '%$search_text%' OR it_user.name LIKE '%$search_text%' OR it_imei.imei_id LIKE '%$search_text%' OR it_imei.login_last LIKE '%$search_text%' OR it_imei.time_entry LIKE '%$search_text%' "; 
}

$limit=25;
if(empty($p)){
	$position=0;
	$p=1;
}
else $position=($p-1) * $limit;

//echo "SELECT it_imei.imei_id, it_user.name, it_imei.login_last, it_imei.time_entry FROM it_imei LEFT OUTER JOIN it_user ON (it_imei.user_id=it_user.user_id) $prefix ORDER BY $orderby $order LIMIT $position, $limit"; die();
?>


<table width="800" align="center" border="0" cellpadding="0" style="border-collapse:collapse; border:0px none; border-radius:10px" class="t1">
	<thead style="font-family:century gothic; font-size:14px; color:#FFFFFF">
    	<tr align="center">
            <th width="200"><div class="t2" style="border-top-left-radius:10px;" onclick="fx('<?php echo $search_text; ?>', 'it_imei.imei_id', 1, 1)">IMEI Device</div></th>
            <th><div class="t2" onclick="fx('<?php echo $search_text; ?>', 'it_user.name', 1,  1)">Name</div></th>
            <th width="170"><div class="t2" onclick="fx('<?php echo $search_text; ?>', 'it_imei.login_last', 1,  1)">Last Login</div></th>
            <th width="170"><div class="t2" style="border-top-right-radius:10px;" onclick="fx('<?php echo $search_text; ?>', 'it_imei.time_entry', 1, 1)">Time Entry</div></th>
        </tr>
    </thead>
    <tbody style="font-family:'century gothic'; font-size:12px;">
<?php
	$i=1; $res = mysql_query("SELECT it_imei.imei_id, it_user.name, it_imei.login_last, it_imei.time_entry FROM it_imei LEFT OUTER JOIN it_user ON (it_imei.user_id=it_user.user_id) $prefix ORDER BY $orderby $order LIMIT $position, $limit", $link);
		if(mysql_num_rows($res)){
		while($data = mysql_fetch_array($res)){?>
    	<tr bgcolor="<?php if($i%2==0) echo "#DAEAFC"; else echo "#FFFFFF"; ?>" align="center">
			<td style="padding:5px;"><?php echo $data[0]?></td>
            <td align="left"><a rel="if_close" url="detail.php?dx=2345"><?php echo $data[1]?></a></td>
            <td><?php echo $data[2]?></td>
            <td><?php echo $data[3]?></td>
		</tr>
<?php $i++; }
		} else echo '<tr bgcolor="#DBDBDB"><td colspan="10" align="center" height="50">No records found</td></tr>';
?>
	</tbody>
    <tfoot>
    	<tr><td colspan="10"><div style="height:20px; background:url(table_header.png) repeat-x; border-bottom-left-radius:10px; border-bottom-right-radius:10px;">&nbsp;</div></td></tr>
	</tfoot>
</table>

<?php
//echo "SELECT it_imei.imei_id, it_user.name, it_imei.login_last, it_imei.time_entry FROM it_imei LEFT OUTER JOIN it_user ON (it_imei.user_id=it_user.user_id) $prefix ORDER BY $orderby $order LIMIT $position, $limit AND asdesc = $asdesc AND order = $order";
function paging($p=1, $page, $num_page, $num_record, $click='href', $extra='')
{
	$pnumber = '';
	echo '<div class="box_paging">';
	if($p>1){
		$previous=$p-1;
		echo '<a '.$click.'="'.$page.$previous.$extra.'">&laquo;</a> ';
	}
	if($p>3) echo '<a '.$click.'="'.$page.'1'.$extra.'">1</a> ';
	for($i=$p-2;$i<$p;$i++){
	  if($i<1) continue;
	  $pnumber .= '<a '.$click.'="'.$page.$i.$extra.'">'.$i.'</a> ';
	}
	$pnumber .= ' <a class="active" id="active">'.$p.'</a> ';
	for($i=$p+1;$i<($p+3);$i++){
	  if($i>$num_page) break;
	  $pnumber .= '<a '.$click.'="'.$page.$i.$extra.'">'.$i.'</a> ';
	}
	$pnumber .= ($p+2<$num_page ? ' <a '.$click.'="'.$page.$num_page.$extra.'">'.$num_page.'</a> ' : " ");
	echo $pnumber;
	if($p<$num_page){
		$next=$p+1;
		echo '<a '.$click.'="'.$page.$next.$extra.'">&raquo;</a>';
	}
	echo '<span>Total: <b>'.$num_record.'</b> Records</span>';
	echo '</div>';
}

$Qpaging = mysql_query("SELECT 1 FROM it_imei LEFT OUTER JOIN it_user ON (it_imei.user_id = it_user.user_id)".$prefix, $link);
$num_page = ceil(mysql_num_rows($Qpaging) / $limit);

if(mysql_num_rows($Qpaging) > $limit){ paging($p, 'fx(\''.$search_text.'\', \''.$orderby.'\', 0, ', $num_page, mysql_num_rows($Qpaging), 'onclick', ');'); }
elseif(mysql_num_rows($Qpaging)>0){ echo '<div class="box_paging">'; echo '<span>Total: <b>'.mysql_num_rows($Qpaging).'</b> Records</span>'; echo '</div>'; }
?>