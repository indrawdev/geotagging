<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

$filter = '';
if($s && ($t == 'search')){
	$Qsearch = $this->db->query("SELECT `keyword` FROM `it_search` WHERE `search_id`='$s'");
	if($Qsearch->num_rows){
		$search = $Qsearch->result_object();
		$keyword = str_replace(" ", "%", $search[0]->keyword);
		$filter = " AND (a.`title` LIKE '%$keyword%' OR a.`atf_no` LIKE '%$keyword%' OR d.`name` LIKE '%$keyword%' OR d.`id` LIKE '%$keyword%' OR e.`name` LIKE '%$keyword%' OR e.`id` LIKE '%$keyword%')";
	}
}

$arr_url = array('atm_id', 'action', 'title', 'origin', 'destination', 'atf', 'book', 'checkin', 'task', 'pic', 'vendor', 'nom', 'consultant', 'indosat', 'created');
$arr_field = array('a.atm_id', 'a.fl_status', 'a.title', 'd.name', 'e.name', 'a.atf_no', 'c.idx', 'c.fl_active', 'a.fl_barcode', 'a.order_wh', 'a.order_vendor', 'a.order_nom', 'a.order_consultant', 'a.order_indosat', 'a.timelog');

$sorted = explode('-', $sort);
if(!in_array($sorted[0], $arr_url, true)) $sorted[0] = 'atm_id';
if($sorted[1] == 'asc') $sorted[1] = 'asc'; else $sorted[1] = 'desc';
$sorted_0 = str_replace($arr_url, $arr_field, $sorted[0]);
?>

<div id="body">
	<div class="container" style="width:1200px">
    <h1>Management ATM <span><form method="post" name="search_box" id="search-box" action="<?php echo base_url() ?>index.php/process/search/atm" onsubmit="return searchbox()"><input type="text" name="q" class="searchbox" maxlength="100" placeholder="Search.." value="<?php echo $search[0]->keyword ?>"></form><?php if(in_array($_SESSION['isat']['role'], array('1', '2'), true)) echo ' <a rel="if_up" url="'.base_url().'index.php/form/add/atm">+ Create New</a>'; if($_SESSION['isat']['role'] == 4) echo '<a href="'.base_url().'index.php/main/atm_pending">Postponed</a> <a class="submit" href="'.base_url().'index.php/main/atm_app">Approval</a>' ?></span></h1>
    
	<?php
	$limit=15;
	if(empty($p)){
		$position=0;
		$p=1;
	}
	else $position=($p-1) * $limit;

	/*if($_SESSION['isat']['guest']) $wh = " AND a.`owner_id`='".$_SESSION['isat']['guest']."'"; else $wh = '';
	if($_SESSION['isat']['role'] == 8) $wh = " AND a.`user_wh`='".$_SESSION['isat']['uid']."' AND a.`fl_type`=1";*/
	
	$wh_atm = array(
		"AND a.`owner_id`='".$_SESSION['isat']['uid']."'", //0
		"", //1
		"AND a.`user_vendor`='".$_SESSION['isat']['uid']."'", //2
		"AND a.`user_consultant`='".$_SESSION['isat']['uid']."'", //3
		"", //4 -AND a.`user_indosat`='".$_SESSION['isat']['uid']."'
		"AND a.`uid_vendor_delegate`='".$_SESSION['isat']['uid']."'", //5
		"AND a.`user_wh`='".$_SESSION['isat']['uid']."'", //6
		"", //7 -AND a.`user_nom`='".$_SESSION['isat']['uid']."'
		"AND a.`user_wh`='".$_SESSION['isat']['uid']."' AND a.`fl_type`=1", //8
		"AND a.`uid_vendor_delegate`='".$_SESSION['isat']['uid']."'", //9
		"AND a.`uid_consultant_delegate`='".$_SESSION['isat']['uid']."'", //10
		"AND a.`uid_nom_delegate`='".$_SESSION['isat']['uid']."'", //11
		"AND a.`uid_indosat_delegate`='".$_SESSION['isat']['uid']."'", //12
		"AND a.`user_wh`='".$_SESSION['isat']['uid']."'" //13
	);
	
	$Qlist = $this->db->query("
		SELECT a.`atm_id`, a.`title`, a.`from_site`, a.`to_site`, a.`atf_no`, a.`user_wh`, a.`user_nom`, a.`uid_nom_delegate`, a.`user_vendor`, a.`uid_vendor_delegate`, a.`user_consultant`, a.`uid_consultant_delegate`, a.`user_indosat`, a.`uid_indosat_delegate`, a. `order_wh`, a.`order_nom`, a.`order_vendor`, a.`order_consultant`, a.`order_indosat`, a.`fl_approve`, a.`fl_reject` +0 AS `reject`, a.`fl_checkin` +0 AS `checked`, a.`fl_barcode` +0 AS `barcode`, a.`fl_status`, a.`fl_active` +0 AS `active`, a.`timelog`, b.`idx`, c.`idx`,  c.`fl_active` AS `booked`, d.`name` AS `origin`, d.`id` AS `id_origin`, e.`name` AS `destination`, e.`id` AS `id_destination`
		FROM `it_atm` a
		LEFT JOIN `it_checkin` b ON b.`idx`=a.`atm_id` AND b.`table`='atm'
		LEFT JOIN `it_book` c ON c.`idx`=a.`atm_id` AND c.`table`='atm'
		JOIN `it_site` d ON d.`site_id`=a.`from_site`
		JOIN `it_site` e ON e.`site_id`=a.`to_site`
		WHERE a.`fl_status` IN(0, 1, 2, 3) ".$wh_atm[$_SESSION['isat']['role']]." $filter
		ORDER BY $sorted_0 $sorted[1] LIMIT $position, $limit
	");
	if($Qlist->num_rows){
    ?>
    <table class="tables" width="100%">
    <thead>
    <tr>
        <th width="85"><a href="<?php echo base_url() ?>index.php/main/atm/<?php echo $t ?>/<?php echo $p ?>/<?php echo $s ?>/<?php if($sort == 'action-desc') echo 'action-asc'; else echo 'action-desc' ?>">Action</a><?php if($sorted[0] == 'action'){ echo '<span>'; if($sorted[1] == 'asc') echo ' &and;'; else echo ' &or;'; echo '</span>'; } ?></th>
        <th align="left"><a href="<?php echo base_url() ?>index.php/main/atm/<?php echo $t ?>/<?php echo $p ?>/<?php echo $s ?>/<?php if($sort == 'title-desc') echo 'title-asc'; else echo 'title-desc' ?>">Reason (Project Name)</a><?php if($sorted[0] == 'title'){ echo '<span>'; if($sorted[1] == 'asc') echo ' &and;'; else echo ' &or;'; echo '</span>'; } ?></th>
        <th width="130"><a href="<?php echo base_url() ?>index.php/main/atm/<?php echo $t ?>/<?php echo $p ?>/<?php echo $s ?>/<?php if($sort == 'origin-desc') echo 'origin-asc'; else echo 'origin-desc' ?>">Origin</a><?php if($sorted[0] == 'origin'){ echo '<span>'; if($sorted[1] == 'asc') echo ' &and;'; else echo ' &or;'; echo '</span>'; } ?></th>
        <th width="130"><a href="<?php echo base_url() ?>index.php/main/atm/<?php echo $t ?>/<?php echo $p ?>/<?php echo $s ?>/<?php if($sort == 'destination-desc') echo 'destination-asc'; else echo 'destination-desc' ?>">Destination</a><?php if($sorted[0] == 'destination'){ echo '<span>'; if($sorted[1] == 'asc') echo ' &and;'; else echo ' &or;'; echo '</span>'; } ?></th>
        <th width="130"><a href="<?php echo base_url() ?>index.php/main/atm/<?php echo $t ?>/<?php echo $p ?>/<?php echo $s ?>/<?php if($sort == 'atf-desc') echo 'atf-asc'; else echo 'atf-desc' ?>">ATF Number</a><?php if($sorted[0] == 'atf'){ echo '<span>'; if($sorted[1] == 'asc') echo ' &and;'; else echo ' &or;'; echo '</span>'; } ?></th>
        <th width="45" style="font-size:11px"><a href="<?php echo base_url() ?>index.php/main/atm/<?php echo $t ?>/<?php echo $p ?>/<?php echo $s ?>/<?php if($sort == 'book-desc') echo 'book-asc'; else echo 'book-desc' ?>">Book</a><?php if($sorted[0] == 'book'){ echo '<span>'; if($sorted[1] == 'asc') echo ' &and;'; else echo ' &or;'; echo '</span>'; } ?></th>
        <th width="45" style="font-size:11px"><a href="<?php echo base_url() ?>index.php/main/atm/<?php echo $t ?>/<?php echo $p ?>/<?php echo $s ?>/<?php if($sort == 'checkin-desc') echo 'checkin-asc'; else echo 'checkin-desc' ?>">Check<br />In</a><?php if($sorted[0] == 'checkin'){ echo '<span>'; if($sorted[1] == 'asc') echo ' &and;'; else echo ' &or;'; echo '</span>'; } ?></th>
        <th width="45" style="font-size:11px"><a href="<?php echo base_url() ?>index.php/main/atm/<?php echo $t ?>/<?php echo $p ?>/<?php echo $s ?>/<?php if($sort == 'task-desc') echo 'task-asc'; else echo 'task-desc' ?>">Task</a><?php if($sorted[0] == 'task'){ echo '<span>'; if($sorted[1] == 'asc') echo ' &and;'; else echo ' &or;'; echo '</span>'; } ?></th>
        <th width="70" style="font-size:10px"><a href="<?php echo base_url() ?>index.php/main/atm/<?php echo $t ?>/<?php echo $p ?>/<?php echo $s ?>/<?php if($sort == 'pic-desc') echo 'pic-asc'; else echo 'pic-desc' ?>">PIC<br />Destination</a><?php if($sorted[0] == 'pic'){ echo '<span>'; if($sorted[1] == 'asc') echo ' &and;'; else echo ' &or;'; echo '</span>'; } ?></th>
        <th width="70" style="font-size:10px"><a href="<?php echo base_url() ?>index.php/main/atm/<?php echo $t ?>/<?php echo $p ?>/<?php echo $s ?>/<?php if($sort == 'vendor-desc') echo 'vendor-asc'; else echo 'vendor-desc' ?>">PM<br />Vendor</a><?php if($sorted[0] == 'vendor'){ echo '<span>'; if($sorted[1] == 'asc') echo ' &and;'; else echo ' &or;'; echo '</span>'; } ?></th>
        <th width="70" style="font-size:10px"><a href="<?php echo base_url() ?>index.php/main/atm/<?php echo $t ?>/<?php echo $p ?>/<?php echo $s ?>/<?php if($sort == 'nom-desc') echo 'nom-asc'; else echo 'nom-desc' ?>">NOM /<br />Regional</a><?php if($sorted[0] == 'nom'){ echo '<span>'; if($sorted[1] == 'asc') echo ' &and;'; else echo ' &or;'; echo '</span>'; } ?></th>
        <th width="70" style="font-size:10px"><a href="<?php echo base_url() ?>index.php/main/atm/<?php echo $t ?>/<?php echo $p ?>/<?php echo $s ?>/<?php if($sort == 'consultant-desc') echo 'consultant-asc'; else echo 'consultant-desc' ?>">Consultan</a><?php if($sorted[0] == 'consultant'){ echo '<span>'; if($sorted[1] == 'asc') echo ' &and;'; else echo ' &or;'; echo '</span>'; } ?></th>
        <th width="70" style="font-size:10px"><a href="<?php echo base_url() ?>index.php/main/atm/<?php echo $t ?>/<?php echo $p ?>/<?php echo $s ?>/<?php if($sort == 'indosat-desc') echo 'indosat-asc'; else echo 'indosat-desc' ?>">PM<br />Indosat</a><?php if($sorted[0] == 'indosat'){ echo '<span>'; if($sorted[1] == 'asc') echo ' &and;'; else echo ' &or;'; echo '</span>'; } ?></th>
        <th width="70"><a href="<?php echo base_url() ?>index.php/main/atm/<?php echo $t ?>/<?php echo $p ?>/<?php echo $s ?>/<?php if($sort == 'created-desc') echo 'created-asc'; else echo 'created-desc' ?>">Created</a><?php if($sorted[0] == 'created'){ echo '<span>'; if($sorted[1] == 'asc') echo ' &and;'; else echo ' &or;'; echo '</span>'; } ?></th>
    </tr>
    </thead>
    <tbody>
		<?php foreach($Qlist->result_object() as $list){ ?>
        <tr id="list_atm_<?php echo $list->atm_id ?>">
            <td align="center" id="attr_atm_<?php echo $list->atm_id ?>">
            <?php
			$stop = 0;
			if($list->barcode == 0){
				$Qhistory = $this->db->query("
					SELECT b.`role_id`
					FROM `it_log_app` a
					JOIN `it_user` b ON b.`user_id`=a.`user_id`
					WHERE a.`table`='atm' AND a.`idx`='$list->atm_id'
					ORDER BY a.`timelog` DESC LIMIT 1
				");
				if($Qhistory->num_rows){
					$history = $Qhistory->result_object();
					$role_id = $history[0]->role_id;
				}
				else $role_id = 0;
			}
			
            if($list->fl_status == 1){
				if(in_array($_SESSION['isat']['role'], array('1', '2'), true)){
					if($_SESSION['isat']['role'] == 1) echo '<a class="remove" id="'.$list->atm_id.'" c="atm" t="ATM task"><img src="'.base_url().'static/i/icon_delete.png" title="Remove"></a> &nbsp; ';
					//echo '<img src="'.base_url().'static/i/icon_deletex.png" title="Disabled"> &nbsp; ';
					echo '<a rel="if_up" url="'.base_url().'index.php/form/ed/atm/'.$list->atm_id.'"><img src="'.base_url().'static/i/icon_edit.png" title="Edit"></a> &nbsp; ';
				}
				else echo '<a rel="if_off" url="'.base_url().'index.php/form/view/atm/'.$list->atm_id.'"><img src="'.base_url().'static/i/icon_edit.png" title="View"></a> &nbsp; ';
				echo '<a rel="if-close" url="'.base_url().'index.php/form/photo/atm/'.$list->atm_id.'"><img src="'.base_url().'static/i/icon_image.png" title="Free Photo"></a>';
			}elseif($list->fl_status == 2){
				if(in_array($_SESSION['isat']['role'], array('1', '2'), true)) echo '<a class="remove" id="'.$list->atm_id.'" c="atm" t="ATM task"><img src="'.base_url().'static/i/icon_delete.png" title="Remove" style="vertical-align:middle"></a> &nbsp; ';
				echo '<a rel="if_off" url="'.base_url().'index.php/form/view/atm/'.$list->atm_id.'"><img src="'.base_url().'static/i/icon_edit.png" title="View" style="vertical-align:middle"></a> ';
				echo '<a rel="if_close" url="'.base_url().'index.php/form/view/atm_reject/'.$list->atm_id.'" style="color:#F00" title="Rejected Task">Rejected</a>';
			}elseif($list->fl_status == 3){
				if(in_array($_SESSION['isat']['role'], array('1', '2'), true)) echo '<a class="remove" id="'.$list->atm_id.'" c="atm" t="ATM task"><img src="'.base_url().'static/i/icon_delete.png" title="Remove" style="vertical-align:middle"></a> &nbsp; ';
				if($_SESSION['isat']['role'] == 4){
					if($list->user_indosat == $_SESSION['isat']['uid']){
						echo '<a href="'.base_url().'index.php/main/atm_pending" style="color:#060" title="Postponed Task">Postponed</a>';
					}else{
						echo '<a rel="if_off" url="'.base_url().'index.php/form/view/atm/'.$list->atm_id.'"><img src="'.base_url().'static/i/icon_edit.png" title="View" style="vertical-align:middle"></a> ';
						echo '<a rel="if_close" url="'.base_url().'index.php/form/view/atm_pending/'.$list->atm_id.'" style="color:#CCC" title="Postponed Task">Postponed</a>';
					}
				}else{
					echo '<a rel="if_off" url="'.base_url().'index.php/form/view/atm/'.$list->atm_id.'"><img src="'.base_url().'static/i/icon_edit.png" title="View" style="vertical-align:middle"></a> ';
					echo '<a rel="if_close" url="'.base_url().'index.php/form/view/atm_pending/'.$list->atm_id.'" style="color:#060" title="Postponed Task">Postponed</a>';
				}
			}else{
				if($_SESSION['isat']['role'] == 4){
					if($list->user_indosat == $_SESSION['isat']['uid']){
						echo '<a href="'.base_url().'index.php/main/atm_app">Approval</a>';
					}else{
						echo '<a rel="if_off" url="'.base_url().'index.php/form/view/atm/'.$list->atm_id.'"><img src="'.base_url().'static/i/icon_edit.png" title="View" style="vertical-align:middle"></a> ';
						echo '<font color="#CCCCCC">Approval</font>';
					}
				}
				else echo 'Approval';
			}
			?>
            </td>
            <td><?php echo wordwrap($list->title, 20, "<br />", true) ?></td>
            <td align="center"><a href="<?php echo base_url() ?>index.php/main/site/detail/0/<?php echo $list->from_site ?>" target="_blank"><?php echo '<span style="text-transform:lowercase">'.wordwrap($list->origin, 20, "<br />", true).'</span> ('.$list->id_origin.')' ?></a></td>
            <td align="center"><a href="<?php echo base_url() ?>index.php/main/site/detail/0/<?php echo $list->to_site ?>" target="_blank"><?php echo '<span style="text-transform:lowercase">'.wordwrap($list->destination, 20, "<br />", true).'</span> ('.$list->id_destination.')' ?></a></td>
            <td align="center"><?php echo $list->atf_no ?></td>
            <td align="center"><?php if($list->idx) echo '<a rel="if_close" url="'.base_url().'index.php/form/booked/atm/'.$list->atm_id.'"><img src="'.base_url().'static/i/icon_tick.png" alt="v" title="Done"></a>'; else echo '-' ?></td>
            <td align="center">
			<?php
            if($list->checked){
				echo '<a rel="if_off" url="'.base_url().'index.php/form/checked/atm/'.$list->atm_id.'"><img src="'.base_url().'static/i/icon_tick.png" alt="v" title="Done"></a>';
			}else{
				if($role_id) echo '<span class="tickr">&radic;</span>'; else echo '-';
			}
			?>
            </td>
            <td align="center">
			<?php
            if($list->barcode){
				echo '<a rel="if_off" url="'.base_url().'index.php/form/done/atm/'.$list->atm_id.'"><img src="'.base_url().'static/i/icon_tick.png" alt="v" title="Done"></a>';
            }else{
				if($role_id) echo '<span class="tickr">&radic;</span>'; else echo '-';
			}
			?>
            </td>
            
            <td align="center">
            <?php
            if($list->barcode){
				switch($list->order_wh){
					
					case 3:
					if(($_SESSION['isat']['role']==8) && ($list->user_wh==$_SESSION['isat']['uid'])) echo '<a rel="if_url" url="'.base_url().'index.php/form/app_wh/atm/'.$list->atm_id.'"><img src="'.base_url().'static/i/icon_action.png" alt="A" title="Take Action"></a>'; else echo '<img src="'.base_url().'static/i/icon_progress.png" alt="P" title="In Progress..">';
					continue;
					
					case 2:
					if(($_SESSION['isat']['role']==8) && ($list->user_wh==$_SESSION['isat']['uid'])){
						echo '<a rel="if_url" url="'.base_url().'index.php/form/app_wh/atm/'.$list->atm_id.'"><img src="'.base_url().'static/i/icon_actions.png" alt="As" title="Take Action"></a>';
					}else{
						echo '<a rel="if_close" url="'.base_url().'index.php/form/msg_wh/atm/'.$list->atm_id.'"><img src="'.base_url().'static/i/icon_tickr.png" alt="x" title="Rejected"></a>';
						if($list->msg_wh){
							$msg_wh = explode('|', $list->msg_wh);
							if($msg_wh[1]) echo ' &nbsp; <a rel="if_close" url="'.base_url().'index.php/form/msgs_wh/atm/'.$list->atm_id.'"><img src="'.base_url().'static/i/icon_message.png" alt="M" title="Message"></a>';
						}
					}
					continue;
					
					case 1:
					echo '<a rel="if_close" url="'.base_url().'index.php/form/msg_wh/atm/'.$list->atm_id.'"><img src="'.base_url().'static/i/icon_tick.png" alt="v" title="Approved"></a>';
					if($list->msg_wh){
						$msg_wh = explode('|', $list->msg_wh);
						if($msg_wh[1]) echo ' &nbsp; <a rel="if_close" url="'.base_url().'index.php/form/msgs_wh/atm/'.$list->atm_id.'"><img src="'.base_url().'static/i/icon_message.png" alt="M" title="Message"></a>';
					}
					continue;
					default: echo '-'; continue;
				}
            }else{
				if($role_id){
					if($role_id == 8){
						$stop = 1;
						echo '<a rel="if_close" url="'.base_url().'index.php/form/msg_wh/atm/'.$list->atm_id.'" class="tickr">&times;</a>';
					}
					else echo '<a rel="if_close" url="'.base_url().'index.php/form/msg_wh/atm/'.$list->atm_id.'" class="tickr">&radic;</a>';
				}
				else echo '-';
			}
			?>
    		</td>
            
            <td align="center">
            <?php
            if($list->barcode){
				
				if($list->user_nom) $mor = '-1'; else $mor = '';
				if($list->user_consultant) $nor = '-1'; else $nor = '-0';
				
				switch($list->order_vendor){
					case 3:
					if($list->uid_vendor_delegate){
						if($list->uid_vendor_delegate==$_SESSION['isat']['uid']) echo '<a rel="if_url" url="'.base_url().'index.php/form/delegate_vendor/atm/'.$list->atm_id.'"><img src="'.base_url().'static/i/icon_action.png" alt="A" title="Take Action"></a>'; else echo '<img src="'.base_url().'static/i/icon_delegated.png" alt="D" title="Delegated">';
					}else{
						if(($_SESSION['isat']['role']==2) && ($list->user_vendor==$_SESSION['isat']['uid'])) echo '<a rel="if_url" url="'.base_url().'index.php/form/app_vendor/atm/'.$list->atm_id.$mor.$nor.'"><img src="'.base_url().'static/i/icon_action.png" alt="A" title="Take Action"></a>'; else echo '<img src="'.base_url().'static/i/icon_progress.png" alt="P" title="In Progress..">';
					}
					continue;
					
					case 2:
					if(($_SESSION['isat']['role']==2) && ($list->user_vendor==$_SESSION['isat']['uid']) && ($list->fl_approve==1)){
						echo '<a rel="if_url" url="'.base_url().'index.php/form/app_vendor/atm/'.$list->atm_id.$mor.$nor.'"><img src="'.base_url().'static/i/icon_actions.png" alt="As" title="Take Action"></a>';
					}else{
						echo '<a rel="if_close" url="'.base_url().'index.php/form/msg_vendor/atm/'.$list->atm_id.'"><img src="'.base_url().'static/i/icon_tickr.png" alt="x" title="Rejected"></a>';
						if($list->msg_vendor){
							$msg_vendor = explode('|', $list->msg_vendor);
							if($msg_vendor[1]) echo ' &nbsp; <a rel="if_close" url="'.base_url().'index.php/form/msgs_vendor/atm/'.$list->atm_id.'"><img src="'.base_url().'static/i/icon_message.png" alt="M" title="Message"></a>';
						}
					}
					continue;
					
					case 1:
					echo '<a rel="if_close" url="'.base_url().'index.php/form/msg_vendor/atm/'.$list->atm_id.'"><img src="'.base_url().'static/i/icon_tick.png" alt="v" title="Approved"></a>';
					if($list->msg_vendor){
						$msg_vendor = explode('|', $list->msg_vendor);
						if($msg_vendor[1]) echo ' &nbsp; <a rel="if_close" url="'.base_url().'index.php/form/msgs_vendor/atm/'.$list->atm_id.'"><img src="'.base_url().'static/i/icon_message.png" alt="M" title="Message"></a>';
					}
					continue;
					default: echo '-'; continue;
				}
            }else{
				if($role_id && ($stop == 0)){
					if($role_id == 2){
						$stop = 1;
						echo '<a rel="if_close" url="'.base_url().'index.php/form/msg_vendor/atm/'.$list->atm_id.'" class="tickr">&times;</a>';
					}
					else echo '<a rel="if_close" url="'.base_url().'index.php/form/msg_vendor/atm/'.$list->atm_id.'" class="tickr">&radic;</a>';
				}
				else echo '-';
			}
			?>
    		</td>
            
            <td align="center">
            <?php
            if($list->barcode){
				switch($list->order_nom){
					
					case 3:
					if($list->uid_nom_delegate){
						if($list->uid_nom_delegate==$_SESSION['isat']['uid']) echo '<a rel="if_url" url="'.base_url().'index.php/form/delegate_nom/atm/'.$list->atm_id.'"><img src="'.base_url().'static/i/icon_action.png" alt="A" title="Take Action"></a>'; else echo '<img src="'.base_url().'static/i/icon_delegated.png" alt="D" title="Delegated">';
					}else{
						if(($_SESSION['isat']['role']==7) && ($list->user_nom==$_SESSION['isat']['uid'])) echo '<a rel="if_url" url="'.base_url().'index.php/form/app_nom/atm/'.$list->atm_id.'"><img src="'.base_url().'static/i/icon_action.png" alt="A" title="Take Action"></a>'; else echo '<img src="'.base_url().'static/i/icon_progress.png" alt="P" title="In Progress..">';
					}
					continue;
					
					case 2:
					if(($_SESSION['isat']['role']==7) && ($list->user_nom==$_SESSION['isat']['uid']) && ($list->fl_approve==2)){
						echo '<a rel="if_url" url="'.base_url().'index.php/form/app_nom/atm/'.$list->atm_id.'"><img src="'.base_url().'static/i/icon_actions.png" alt="As" title="Take Action"></a>';
					}else{
						echo '<a rel="if_close" url="'.base_url().'index.php/form/msg_nom/atm/'.$list->atm_id.'"><img src="'.base_url().'static/i/icon_tickr.png" alt="x" title="Rejected"></a>';
						if($list->msg_nom){
							$msg_nom = explode('|', $list->msg_nom);
							if($msg_nom[1]) echo ' &nbsp; <a rel="if_close" url="'.base_url().'index.php/form/msgs_nom/atm/'.$list->atm_id.'"><img src="'.base_url().'static/i/icon_message.png" alt="M" title="Message"></a>';
						}
					}
					continue;
					
					case 1:
					echo '<a rel="if_close" url="'.base_url().'index.php/form/msg_nom/atm/'.$list->atm_id.'"><img src="'.base_url().'static/i/icon_tick.png" alt="v" title="Approved"></a>';
					if($list->msg_nom){
						$msg_nom = explode('|', $list->msg_nom);
						if($msg_nom[1]) echo ' &nbsp; <a rel="if_close" url="'.base_url().'index.php/form/msgs_nom/atm/'.$list->atm_id.'"><img src="'.base_url().'static/i/icon_message.png" alt="M" title="Message"></a>';
					}
					continue;
					default: if($list->order_nom) echo '-'; else echo 'N/A'; continue;
				}
            }else{
				if($role_id && ($stop == 0)){
					if($role_id == 7){
						$stop = 1;
						echo '<a rel="if_close" url="'.base_url().'index.php/form/msg_nom/atm/'.$list->atm_id.'" class="tickr">&times;</a>';
					}
					else echo '<a rel="if_close" url="'.base_url().'index.php/form/msg_nom/atm/'.$list->atm_id.'" class="tickr">&radic;</a>';
				}
				else echo '-';
			}
			?>
    		</td>
            
            <td align="center">
            <?php
            if($list->barcode){
				switch($list->order_consultant){
					case 3:
					if($list->uid_consultant_delegate){
						if($list->uid_consultant_delegate==$_SESSION['isat']['uid']) echo '<a rel="if_url" url="'.base_url().'index.php/form/delegate_consultant/atm/'.$list->atm_id.'"><img src="'.base_url().'static/i/icon_action.png" alt="A" title="Take Action"></a>'; else echo '<img src="'.base_url().'static/i/icon_delegated.png" alt="D" title="Delegated">';
					}else{
						if(($_SESSION['isat']['role']==3) && ($list->user_consultant==$_SESSION['isat']['uid'])) echo '<a rel="if_url" url="'.base_url().'index.php/form/app_consultant/atm/'.$list->atm_id.$mor.$nor.'"><img src="'.base_url().'static/i/icon_action.png" alt="A" title="Take Action"></a>'; else echo '<img src="'.base_url().'static/i/icon_progress.png" alt="P" title="In Progress..">';
					}
					continue;
					
					case 2:
					if(($_SESSION['isat']['role']==3) && ($list->user_consultant==$_SESSION['isat']['uid']) && ($list->fl_approve==3)){
						echo '<a rel="if_url" url="'.base_url().'index.php/form/app_consultant/atm/'.$list->atm_id.$mor.$nor.'"><img src="'.base_url().'static/i/icon_actions.png" alt="As" title="Take Action"></a>';
					}else{
						echo '<a rel="if_close" url="'.base_url().'index.php/form/msg_consultant/atm/'.$list->atm_id.'"><img src="'.base_url().'static/i/icon_tickr.png" alt="x" title="Rejected"></a>';
						if($list->msg_consultant){
							$msg_consultant = explode('|', $list->msg_consultant);
							if($msg_consultant[1]) echo ' &nbsp; <a rel="if_close" url="'.base_url().'index.php/form/msgs_consultant/atm/'.$list->atm_id.'"><img src="'.base_url().'static/i/icon_message.png" alt="M" title="Message"></a>';
						}
					}
					continue;
					
					case 1:
					echo '<a rel="if_close" url="'.base_url().'index.php/form/msg_consultant/atm/'.$list->atm_id.'"><img src="'.base_url().'static/i/icon_tick.png" alt="v" title="Approved"></a>';
					if($list->msg_consultant){
						$msg_consultant = explode('|', $list->msg_consultant);
						if($msg_consultant[1]) echo ' &nbsp; <a rel="if_close" url="'.base_url().'index.php/form/msgs_consultant/atm/'.$list->atm_id.'"><img src="'.base_url().'static/i/icon_message.png" alt="M" title="Message"></a>';
					}
					continue;
					default: if($list->order_consultant) echo '-'; else echo 'N/A'; continue;
				}
            }else{
				if($role_id && ($stop == 0)){
					if($role_id == 3){
						$stop = 1;
						echo '<a rel="if_close" url="'.base_url().'index.php/form/msg_consultant/atm/'.$list->atm_id.'" class="tickr">&times;</a>';
					}
					else echo '<a rel="if_close" url="'.base_url().'index.php/form/msg_consultant/atm/'.$list->atm_id.'" class="tickr">&radic;</a>';
				}
				else echo '-';
			}
			?>
    		</td>
            
            <td align="center">
            <?php
            if($list->barcode){
				switch($list->order_indosat){
					
					case 3:
					if($list->uid_indosat_delegate){
						if($list->uid_indosat_delegate==$_SESSION['isat']['uid']) echo '<a rel="if_url" url="'.base_url().'index.php/form/delegate_indosat/atm/'.$list->atm_id.'"><img src="'.base_url().'static/i/icon_action.png" alt="A" title="Take Action"></a>'; else echo '<img src="'.base_url().'static/i/icon_delegated.png" alt="D" title="Delegated">';
					}else{
						//if(($_SESSION['isat']['role']==4) && ($list->user_indosat==$_SESSION['isat']['uid'])) 
						if($_SESSION['isat']['role']==4) echo '<a rel="if_url" url="'.base_url().'index.php/form/app_indosat/atm/'.$list->atm_id.'"><img src="'.base_url().'static/i/icon_action.png" alt="A" title="Take Action"></a>'; else echo '<img src="'.base_url().'static/i/icon_progress.png" alt="P" title="In Progress..">';
					}
					continue;
					
					case 2:
					if(($_SESSION['isat']['role']==4) && ($list->fl_approve==4)){
					//if(($_SESSION['isat']['role']==4) && ($list->user_indosat==$_SESSION['isat']['uid']) && ($list->fl_approve==4)){
						echo '<a rel="if_url" url="'.base_url().'index.php/form/app_indosat/atm/'.$list->atm_id.'"><img src="'.base_url().'static/i/icon_actions.png" alt="As" title="Take Action"></a>';
					}else{
						echo '<a rel="if_close" url="'.base_url().'index.php/form/msg_indosat/atm/'.$list->atm_id.'"><img src="'.base_url().'static/i/icon_tickr.png" alt="x" title="Rejected"></a>';
						if($list->msg_indosat){
							$msg_indosat = explode('|', $list->msg_indosat);
							if($msg_indosat[1]) echo ' &nbsp; <a rel="if_close" url="'.base_url().'index.php/form/msgs_indosat/atm/'.$list->atm_id.'"><img src="'.base_url().'static/i/icon_message.png" alt="M" title="Message"></a>';
						}
					}
					continue;
					
					case 1:
					echo '<a rel="if_close" url="'.base_url().'index.php/form/msg_indosat/atm/'.$list->atm_id.'"><img src="'.base_url().'static/i/icon_tick.png" alt="v" title="Approved"></a>';
					if($list->msg_indosat){
						$msg_indosat = explode('|', $list->msg_indosat);
						if($msg_indosat[1]) echo ' &nbsp; <a rel="if_close" url="'.base_url().'index.php/form/msgs_indosat/atm/'.$list->atm_id.'"><img src="'.base_url().'static/i/icon_message.png" alt="M" title="Message"></a>';
					}
					continue;
					default: echo '-'; continue;
				}
            }else{
				if($role_id && ($stop == 0)){
					if($role_id == 4){
						//$stop = 1;
						echo '<a rel="if_close" url="'.base_url().'index.php/form/msg_indosat/atm/'.$list->atm_id.'" class="tickr">&times;</a>';
					}
					else echo '<a rel="if_close" url="'.base_url().'index.php/form/msg_indosat/atm/'.$list->atm_id.'" class="tickr">&radic;</a>';
				}
				else echo '-';
			}
			?>
    		</td>
            
            <td align="center"><?php echo date('d M y', $list->timelog) ?></td>
        </tr>
        <?php } ?>
    </tbody>
    </table>
    <?php
	$Qpaging = $this->db->query("
		SELECT a.`atm_id`
		FROM `it_atm` a
		LEFT JOIN `it_checkin` b ON b.`idx`=a.`atm_id` AND b.`table`='atm'
		LEFT JOIN `it_book` c ON c.`idx`=a.`atm_id` AND c.`table`='atm'
		JOIN `it_site` d ON d.`site_id`=a.`from_site`
		JOIN `it_site` e ON e.`site_id`=a.`to_site`
		WHERE a.`fl_status` IN(0, 1, 2, 3) ".$wh_atm[$_SESSION['isat']['role']]." $filter
	");
	$num_page = ceil($Qpaging->num_rows / $limit);
	if($Qpaging->num_rows > $limit) $this->ifunction->paging($p, base_url().'index.php/main/atm/'.$t.'/', $num_page, $Qpaging->num_rows, 'href', '/'.$s.'/'.$sort);
	}else{
		echo '<p class="info-box">No data';
		if($search[0]->keyword) echo ' for keyword: <b>'.$search[0]->keyword.'</b>';
		echo '.</p>';
	}
	?>
    </div>
</div>