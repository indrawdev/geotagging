<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$filter = '';
if($s && ($t == 'search')){
	$Qsearch = $this->db->query("SELECT `keyword` FROM `it_search` WHERE `search_id`='$s'");
	if($Qsearch->num_rows){
		$search = $Qsearch->result_object();
		$keyword = str_replace(" ", "%", $search[0]->keyword);
		$filter = " AND (a.`atp_id` LIKE '%$keyword%' OR a.`title` LIKE '%$keyword%' OR a.`brand` LIKE '%$keyword%' OR b.`name` LIKE '%$keyword%' OR b.`id` LIKE '%$keyword%')";
	}
}

$arr_url = array('atp_id', 'action', 'title', 'site', 'doc', 'book', 'checkin', 'task', 'vendor', 'consultant', 'indosat', 'created');
$arr_field = array('a.atp_id', 'a.fl_status', 'a.title', 'b.name', 'a.brand', 'c.idx', 'c.fl_active', 'a.fl_quest', 'a.order_supervisor', 'a.order_manager', 'a.order_indosat', 'a.timelog');

$sorted = explode('-', $sort);
if(!in_array($sorted[0], $arr_url, true)) $sorted[0] = 'atp_id';
if($sorted[1] == 'asc') $sorted[1] = 'asc'; else $sorted[1] = 'desc';
$sorted_0 = str_replace($arr_url, $arr_field, $sorted[0]);
?>

<div id="body">
	<div class="container">
    <h1>Management ATP <span><form method="post" name="search_box" id="search-box" action="<?php echo base_url() ?>index.php/process/search/atp" onsubmit="return searchbox()"><input type="text" name="q" class="searchbox" maxlength="100" placeholder="Search.." value="<?php echo $search[0]->keyword ?>"></form><?php if(in_array($_SESSION['isat']['role'], array('1', '2'), true)) echo ' <a rel="if_up" url="'.base_url().'index.php/form/add/atp">+ Create New</a>'; if($_SESSION['isat']['role'] == 4) echo '<a href="'.base_url().'index.php/main/atp_pending">Pending</a> <a class="submit" href="'.base_url().'index.php/main/atp_app">Approval</a>' ?></span></h1>
    
	<?php
	$limit=15;
	if(empty($p)){
		$position=0;
		$p=1;
	}
	else $position=($p-1) * $limit;
	
	/*switch($_SESSION['isat']['role']){
		case 2: $wh = ""; continue; //$wh = " AND (a.`user_supervisor`='".$_SESSION['isat']['uid']."' OR a.`user_supervisor`='0')";
		case 3: $wh = " AND (a.`user_manager`='".$_SESSION['isat']['uid']."' OR a.`user_manager`='0')"; continue;
		case 4: $wh = " AND (a.`user_indosat`='".$_SESSION['isat']['uid']."' OR a.`user_indosat`='0')"; continue;
		case 5: $wh = " AND (a.`uid_supervisor_delegate`='".$_SESSION['isat']['uid']."' OR a.`uid_manager_delegate`='".$_SESSION['isat']['uid']."' OR a.`uid_indosat_delegate`='".$_SESSION['isat']['uid']."')"; continue;
		default: if($_SESSION['isat']['guest']) $wh = " AND a.`owner_id`='".$_SESSION['isat']['guest']."'"; else $wh = ''; continue;
	}*/
	
	$wh_atp = array(
		"AND a.`owner_id`='".$_SESSION['isat']['uid']."'", //0
		"", //1
		"AND a.`user_supervisor`='".$_SESSION['isat']['uid']."'", //2
		"AND a.`user_manager`='".$_SESSION['isat']['uid']."'", //3
		"", //4 -AND a.`user_indosat`='".$_SESSION['isat']['uid']."'
		"AND (a.`uid_supervisor_delegate`='".$_SESSION['isat']['uid']."' OR a.`uid_manager_delegate`='".$_SESSION['isat']['uid']."' OR a.`uid_indosat_delegate`='".$_SESSION['isat']['uid']."')", //5
		"", //6
		"", //7 -AND a.`owner_id`='".$_SESSION['isat']['uid']."'
		"AND a.`owner_id`='".$_SESSION['isat']['uid']."'", //8
		"AND a.`owner_id`='".$_SESSION['isat']['uid']."'", //9
		"AND a.`owner_id`='".$_SESSION['isat']['uid']."'", //10
		"AND a.`owner_id`='".$_SESSION['isat']['uid']."'", //11
		"AND a.`owner_id`='".$_SESSION['isat']['uid']."'", //12
		"AND a.`owner_id`='".$_SESSION['isat']['uid']."'" //13
	);
	
	if($_SESSION['isat']['uid'] == '778091649200135147913950') $wh_atp[$_SESSION['isat']['role']] = '';
	
	if($_SESSION['isat']['role'] == 6){
		$Qlist = $this->db->query("
			SELECT a.`atp_id`, a.`user_id`, a.`site_id`, a.`title`, a.`brand`, a.`user_supervisor`, a.`user_manager`, a.`user_indosat`, a.`uid_supervisor_delegate`, a.`uid_manager_delegate`, a.`uid_indosat_delegate`, a.`msg_supervisor`, a.`msg_manager`, a.`msg_indosat`, a.`order_supervisor`, a.`order_manager`, a.`order_indosat`, a.`fl_approve`, a.`fl_active`, a.`fl_quest`, a.`fl_status`, a.`timelog`, b.`name`, b.`id`, c.`idx`,  c.`fl_active` AS `booked`
			FROM `it_atp` a
			JOIN `it_site` b ON b.`site_id`=a.`site_id`
			LEFT JOIN `it_book` c ON c.`idx`=a.`atp_id` AND c.`table`='atp'
			JOIN `it_attachment` d ON d.`idx`=a.`atp_id` AND d.`table`='atp_indosat_foto' AND d.`user_id`='".$_SESSION['isat']['uid']."'
			WHERE a.`fl_status` IN(0, 1, 2, 3) $filter
			ORDER BY $sorted_0 $sorted[1] LIMIT $position, $limit
		");
	}else{
		$Qlist = $this->db->query("
			SELECT a.`atp_id`, a.`user_id`, a.`site_id`, a.`title`, a.`brand`, a.`user_supervisor`, a.`user_manager`, a.`user_indosat`, a.`uid_supervisor_delegate`, a.`uid_manager_delegate`, a.`uid_indosat_delegate`, a.`msg_supervisor`, a.`msg_manager`, a.`msg_indosat`, a.`order_supervisor`, a.`order_manager`, a.`order_indosat`, a.`fl_approve`, a.`fl_active`, a.`fl_quest`, a.`fl_status`, a.`timelog`, b.`name`, b.`id`, c.`idx`,  c.`fl_active` AS `booked`
			FROM `it_atp` a
			JOIN `it_site` b ON b.`site_id`=a.`site_id`
			LEFT JOIN `it_book` c ON c.`idx`=a.`atp_id` AND c.`table`='atp'
			WHERE a.`fl_status` IN(0, 1, 2, 3) ".$wh_atp[$_SESSION['isat']['role']]." $filter
			ORDER BY $sorted_0 $sorted[1] LIMIT $position, $limit
		");
	}
	if($Qlist->num_rows){
	$arr_cd = array('miniMCE', 'atpFilter', 'atpPowersupply', 'ericsson2G', 'ericsson3G', 'ericssonMicrowave', 'zteMicrowave', 'zte2G', 'zte3G');
	$arr_nm = array('Mini CME', 'ATP Filter', 'ATP Power Supply', 'Ericsson 2G', 'Ericsson 3G', 'Microwave Ericsson', 'Microwave ZTE', 'ZTE 2G', 'ZTE 3G');
    ?>
    <table class="tables" width="100%">
    <thead>
    <tr>
        <th width="85"><a href="<?php echo base_url() ?>index.php/main/atp/<?php echo $t ?>/<?php echo $p ?>/<?php echo $s ?>/<?php if($sort == 'action-desc') echo 'action-asc'; else echo 'action-desc' ?>">Action</a><?php if($sorted[0] == 'action'){ echo '<span>'; if($sorted[1] == 'asc') echo ' &and;'; else echo ' &or;'; echo '</span>'; } ?></th>
        <th align="left"><a href="<?php echo base_url() ?>index.php/main/atp/<?php echo $t ?>/<?php echo $p ?>/<?php echo $s ?>/<?php if($sort == 'title-desc') echo 'title-asc'; else echo 'title-desc' ?>">Task Title</a><?php if($sorted[0] == 'title'){ echo '<span>'; if($sorted[1] == 'asc') echo ' &and;'; else echo ' &or;'; echo '</span>'; } ?></th>
        <th width="130"><a href="<?php echo base_url() ?>index.php/main/atp/<?php echo $t ?>/<?php echo $p ?>/<?php echo $s ?>/<?php if($sort == 'site-desc') echo 'site-asc'; else echo 'site-desc' ?>">Site Name</a><?php if($sorted[0] == 'site'){ echo '<span>'; if($sorted[1] == 'asc') echo ' &and;'; else echo ' &or;'; echo '</span>'; } ?></th>
        <th width="130"><a href="<?php echo base_url() ?>index.php/main/atp/<?php echo $t ?>/<?php echo $p ?>/<?php echo $s ?>/<?php if($sort == 'doc-desc') echo 'doc-asc'; else echo 'doc-desc' ?>">Doc</a><?php if($sorted[0] == 'doc'){ echo '<span>'; if($sorted[1] == 'asc') echo ' &and;'; else echo ' &or;'; echo '</span>'; } ?></th>
        <th width="45" style="font-size:11px"><a href="<?php echo base_url() ?>index.php/main/atp/<?php echo $t ?>/<?php echo $p ?>/<?php echo $s ?>/<?php if($sort == 'book-desc') echo 'book-asc'; else echo 'book-desc' ?>">Book</a><?php if($sorted[0] == 'book'){ echo '<span>'; if($sorted[1] == 'asc') echo ' &and;'; else echo ' &or;'; echo '</span>'; } ?></th>
        <th width="45" style="font-size:11px"><a href="<?php echo base_url() ?>index.php/main/atp/<?php echo $t ?>/<?php echo $p ?>/<?php echo $s ?>/<?php if($sort == 'checkin-desc') echo 'checkin-asc'; else echo 'checkin-desc' ?>">Check<br />In</a><?php if($sorted[0] == 'checkin'){ echo '<span>'; if($sorted[1] == 'asc') echo ' &and;'; else echo ' &or;'; echo '</span>'; } ?></th>
        
        <th width="45" style="font-size:11px"><a href="<?php echo base_url() ?>index.php/main/atp/<?php echo $t ?>/<?php echo $p ?>/<?php echo $s ?>/<?php if($sort == 'task-desc') echo 'task-asc'; else echo 'task-desc' ?>">Task</a><?php if($sorted[0] == 'task'){ echo '<span>'; if($sorted[1] == 'asc') echo ' &and;'; else echo ' &or;'; echo '</span>'; } ?></th>
        <th width="60" style="font-size:10px"><a href="<?php echo base_url() ?>index.php/main/atp/<?php echo $t ?>/<?php echo $p ?>/<?php echo $s ?>/<?php if($sort == 'vendor-desc') echo 'vendor-asc'; else echo 'vendor-desc' ?>">PM<br />Vendor</a><?php if($sorted[0] == 'vendor'){ echo '<span>'; if($sorted[1] == 'asc') echo ' &and;'; else echo ' &or;'; echo '</span>'; } ?></th>
        <th width="70" style="font-size:10px"><a href="<?php echo base_url() ?>index.php/main/atp/<?php echo $t ?>/<?php echo $p ?>/<?php echo $s ?>/<?php if($sort == 'consultant-desc') echo 'consultant-asc'; else echo 'consultant-desc' ?>">Consultant</a><?php if($sorted[0] == 'consultant'){ echo '<span>'; if($sorted[1] == 'asc') echo ' &and;'; else echo ' &or;'; echo '</span>'; } ?></th>
        <th width="60" style="font-size:10px"><a href="<?php echo base_url() ?>index.php/main/atp/<?php echo $t ?>/<?php echo $p ?>/<?php echo $s ?>/<?php if($sort == 'indosat-desc') echo 'indosat-asc'; else echo 'indosat-desc' ?>">PM<br />Indosat</a><?php if($sorted[0] == 'indosat'){ echo '<span>'; if($sorted[1] == 'asc') echo ' &and;'; else echo ' &or;'; echo '</span>'; } ?></th>
        <th width="70"><a href="<?php echo base_url() ?>index.php/main/atp/<?php echo $t ?>/<?php echo $p ?>/<?php echo $s ?>/<?php if($sort == 'created-desc') echo 'created-asc'; else echo 'created-desc' ?>">Created</a><?php if($sorted[0] == 'created'){ echo '<span>'; if($sorted[1] == 'asc') echo ' &and;'; else echo ' &or;'; echo '</span>'; } ?></th>
    </tr>
    </thead>
    <tbody>
		<?php foreach($Qlist->result_object() as $list){ ?>
        <tr id="list_atp_<?php echo $list->atp_id ?>">
            <td align="center" id="attr_atp_<?php echo $list->atp_id ?>">
            <?php
			if($list->user_manager) $nor = '-1'; else $nor = '';
            if($list->fl_status == 1){
				if(in_array($_SESSION['isat']['role'], array('1', '2'), true)){
					if($_SESSION['isat']['role'] == 1) echo '<a class="remove" id="'.$list->atp_id.'" c="atp" t="ATP task"><img src="'.base_url().'static/i/icon_delete.png" title="Remove"></a> &nbsp; ';
					//echo '<img src="'.base_url().'static/i/icon_deletex.png" title="Disabled"> &nbsp; ';
					echo '<a rel="if_up" url="'.base_url().'index.php/form/ed/atp/'.$list->atp_id.'"><img src="'.base_url().'static/i/icon_edit.png" title="Edit"></a> &nbsp; ';
				}
				else echo '<a rel="if_off" url="'.base_url().'index.php/form/view/atp/'.$list->atp_id.'"><img src="'.base_url().'static/i/icon_edit.png" title="View"></a> &nbsp; ';
				echo '<a rel="if-close" url="'.base_url().'index.php/form/photo/atp/'.$list->atp_id.'"><img src="'.base_url().'static/i/icon_image.png" title="Free Photo"></a>';
			}elseif($list->fl_status == 2){
				if(in_array($_SESSION['isat']['role'], array('1', '2'), true)) echo '<a class="remove" id="'.$list->atp_id.'" c="atp" t="ATP task"><img src="'.base_url().'static/i/icon_delete.png" title="Remove" style="vertical-align:middle"></a> &nbsp; ';
				echo '<a rel="if_off" url="'.base_url().'index.php/form/view/atp/'.$list->atp_id.'"><img src="'.base_url().'static/i/icon_edit.png" title="View" style="vertical-align:middle"></a> ';
				echo '<a rel="if_close" url="'.base_url().'index.php/form/view/atp_reject/'.$list->atp_id.'" style="color:#F00" title="Rejected Task">Rejected</a>';
			}elseif($list->fl_status == 3){
				if(in_array($_SESSION['isat']['role'], array('1', '2'), true)) echo '<a class="remove" id="'.$list->atp_id.'" c="atp" t="ATP task"><img src="'.base_url().'static/i/icon_delete.png" title="Remove" style="vertical-align:middle"></a> &nbsp; ';
				if($_SESSION['isat']['role'] == 4){
					if($list->user_indosat == $_SESSION['isat']['uid']){
						echo '<a href="'.base_url().'index.php/main/atp_pending" style="color:#060" title="Pending Task">Pending</a>';
					}else{
						echo '<a rel="if_off" url="'.base_url().'index.php/form/view/atp/'.$list->atp_id.'"><img src="'.base_url().'static/i/icon_edit.png" title="View" style="vertical-align:middle"></a> ';
						echo '<a rel="if_close" url="'.base_url().'index.php/form/view/atp_pending/'.$list->atp_id.'" style="color:#CCC" title="Pending Task">Pending</a>';
					}
				}else{
					echo '<a rel="if_off" url="'.base_url().'index.php/form/view/atp/'.$list->atp_id.'"><img src="'.base_url().'static/i/icon_edit.png" title="View" style="vertical-align:middle"></a> ';
					echo '<a rel="if_close" url="'.base_url().'index.php/form/view/atp_pending/'.$list->atp_id.'" style="color:#060" title="Pending Task">Pending</a>';
				}
			}else{
				if($_SESSION['isat']['role'] == 4){
					if($list->user_indosat == $_SESSION['isat']['uid']){
						echo '<a href="'.base_url().'index.php/main/atp_app">Approval</a>';
					}else{
						echo '<a rel="if_off" url="'.base_url().'index.php/form/view/atp/'.$list->atp_id.'"><img src="'.base_url().'static/i/icon_edit.png" title="View" style="vertical-align:middle"></a> ';
						echo '<font color="#CCCCCC">Approval</font>';
					}
				}
				else echo 'Approval';
			}
			?>
            <td>[ID: <b><?php echo $list->atp_id ?></b>] <?php echo wordwrap($list->title, 20, "<br />", true) ?></td>
            <td align="center"><a href="<?php echo base_url() ?>index.php/main/site/detail/0/<?php echo $list->site_id ?>" target="_blank"><?php echo '<span style="text-transform:lowercase">'.wordwrap($list->name, 20, "<br />", true).'</span> ('.$list->id.')' ?></a></td>
            <td align="center"><?php if(!$list->fl_quest && $list->user_id && (($list->brand == 'ericsson2G') || ($list->brand == 'ericsson3G'))) echo '<a onclick=\'window.open("'.base_url().'index.php/process/pdf/edit/atp/'.$list->brand.'/'.$list->atp_id.'/1", "preload'.$list->atp_id.'", "toolbar=no, resizable=no, menubar=no, scrollbars=yes, width=800, height=600")\'>'.str_replace($arr_cd, $arr_nm, $list->brand).'</a>'; else echo str_replace($arr_cd, $arr_nm, $list->brand) ?></td>
            <td align="center"><?php if($list->idx) echo '<a rel="if_close" url="'.base_url().'index.php/form/booked/atp/'.$list->atp_id.'"><img src="'.base_url().'static/i/icon_tick.png" alt="v" title="Done"></a>'; else echo '-' ?></td>
			<td align="center"><?php if($list->booked) echo '<a rel="if_off" url="'.base_url().'index.php/form/checked/atp/'.$list->atp_id.'"><img src="'.base_url().'static/i/icon_tick.png" alt="v" title="Done"></a>'; else echo '-' ?></td>
            <td align="center"><?php if($list->fl_quest) echo '<a rel="if_off" url="'.base_url().'index.php/form/done/atp/'.$list->atp_id.'"><img src="'.base_url().'static/i/icon_tick.png" alt="v" title="Done"></a>'; else echo '-' ?></td>
            
            <td align="center">
            <?php
            if($list->fl_quest){
				switch($list->order_supervisor){
					
					case 3:
					if(($_SESSION['isat']['role']==2) && ($list->user_supervisor==$_SESSION['isat']['uid'])){
						if($list->uid_supervisor_delegate) echo '<img src="'.base_url().'static/i/icon_delegated.png" alt="D" title="Delegated">'; else echo '<a rel="if_url" url="'.base_url().'index.php/form/app_supervisor/atp/'.$list->atp_id.$nor.'"><img src="'.base_url().'static/i/icon_action.png" alt="A" title="Take Action"></a>';
					}else{
						if($list->uid_supervisor_delegate==$_SESSION['isat']['uid']) echo '<a rel="if_url" url="'.base_url().'index.php/form/delegate_supervisor/atp/'.$list->atp_id.'"><img src="'.base_url().'static/i/icon_action.png" alt="A" title="Take Action"></a>'; else echo '<img src="'.base_url().'static/i/icon_progress.png" alt="P" title="In Progress..">';
					}
					continue;
					
					case 2:
					if(($_SESSION['isat']['role']==2) && ($list->user_supervisor==$_SESSION['isat']['uid'])){
						echo '<a rel="if_url" url="'.base_url().'index.php/form/app_supervisor/atp/'.$list->atp_id.$nor.'"><img src="'.base_url().'static/i/icon_actions.png" alt="As" title="Take Action"></a>';
					}else{
						echo '<a rel="if_close" url="'.base_url().'index.php/form/msg_supervisor/atp/'.$list->atp_id.'"><img src="'.base_url().'static/i/icon_tickr.png" alt="x" title="Rejected"></a>';
						if($list->msg_supervisor){
							$msg_supervisor = explode('|', $list->msg_supervisor);
							if($msg_supervisor[1]) echo ' &nbsp; <a rel="if_close" url="'.base_url().'index.php/form/msgs_supervisor/atp/'.$list->atp_id.'"><img src="'.base_url().'static/i/icon_message.png" alt="M" title="Message"></a>';
						}
					}
					continue;
					
					case 1:
					echo '<a rel="if_close" url="'.base_url().'index.php/form/msg_supervisor/atp/'.$list->atp_id.'"><img src="'.base_url().'static/i/icon_tick.png" alt="v" title="Approved"></a>';
					if($list->msg_supervisor){
						$msg_supervisor = explode('|', $list->msg_supervisor);
						if($msg_supervisor[1]) echo ' &nbsp; <a rel="if_close" url="'.base_url().'index.php/form/msgs_supervisor/atp/'.$list->atp_id.'"><img src="'.base_url().'static/i/icon_message.png" alt="M" title="Message"></a>';
					}
					continue;
					default: echo '-'; continue;
				}
            }
			else echo '-';
			?>
    		</td>
            
            <td align="center">
            <?php
            if($list->fl_quest){
				switch($list->order_manager){
					
					case 3:
					if(($_SESSION['isat']['role']==3) && ($list->user_manager==$_SESSION['isat']['uid'])){
						if($list->uid_manager_delegate) echo '<img src="'.base_url().'static/i/icon_delegated.png" alt="D" title="Delegated">'; else echo '<a rel="if_url" url="'.base_url().'index.php/form/app_manager/atp/'.$list->atp_id.'"><img src="'.base_url().'static/i/icon_action.png" alt="A" title="Take Action"></a>';
					}else{
						if($list->uid_manager_delegate==$_SESSION['isat']['uid']) echo '<a rel="if_url" url="'.base_url().'index.php/form/delegate_manager/atp/'.$list->atp_id.'"><img src="'.base_url().'static/i/icon_action.png" alt="A" title="Take Action"></a>'; else echo '<img src="'.base_url().'static/i/icon_progress.png" alt="P" title="In Progress..">';
					}
					continue;
					
					case 2:
					if(($_SESSION['isat']['role']==3) && ($list->user_manager==$_SESSION['isat']['uid']) && ($list->fl_approve > 1)){
						echo '<a rel="if_url" url="'.base_url().'index.php/form/app_manager/atp/'.$list->atp_id.'"><img src="'.base_url().'static/i/icon_actions.png" alt="As" title="Take Action"></a>';
					}else{
						echo '<a rel="if_close" url="'.base_url().'index.php/form/msg_manager/atp/'.$list->atp_id.'"><img src="'.base_url().'static/i/icon_tickr.png" alt="x" title="Rejected"></a>';
						if($list->msg_manager){
							$msg_manager = explode('|', $list->msg_manager);
							if($msg_manager[1]) echo ' &nbsp; <a rel="if_close" url="'.base_url().'index.php/form/msgs_manager/atp/'.$list->atp_id.'"><img src="'.base_url().'static/i/icon_message.png" alt="M" title="Message"></a>';
						}
					}
					continue;
					
					case 1:
					echo '<a rel="if_close" url="'.base_url().'index.php/form/msg_manager/atp/'.$list->atp_id.'"><img src="'.base_url().'static/i/icon_tick.png" alt="v" title="Approved"></a>';
					if($list->msg_manager){
						$msg_manager = explode('|', $list->msg_manager);
						if($msg_manager[1]) echo ' &nbsp; <a rel="if_close" url="'.base_url().'index.php/form/msgs_manager/atp/'.$list->atp_id.'"><img src="'.base_url().'static/i/icon_message.png" alt="M" title="Message"></a>';
					}
					continue;
					default: if($list->user_manager) echo '-'; else echo 'N/A'; continue;
				}
            }
			else echo '-';
			?>
            </td>
            
            <td align="center">
            <?php
            if($list->fl_quest){
				switch($list->order_indosat){
					
					case 3:
					if($_SESSION['isat']['role']==4){
					//if(($_SESSION['isat']['role']==4) && ($list->user_indosat==$_SESSION['isat']['uid'])){
						if($list->uid_indosat_delegate) echo '<img src="'.base_url().'static/i/icon_delegated.png" alt="D" title="Delegated">'; else echo '<a rel="if_url" url="'.base_url().'index.php/form/app_indosat/atp/'.$list->atp_id.$nor.'"><img src="'.base_url().'static/i/icon_action.png" alt="A" title="Take Action"></a>';
					}else{
						if($list->uid_indosat_delegate==$_SESSION['isat']['uid']) echo '<a rel="if_url" url="'.base_url().'index.php/form/delegate_indosat/atp/'.$list->atp_id.'"><img src="'.base_url().'static/i/icon_action.png" alt="A" title="Take Action"></a>'; else echo '<img src="'.base_url().'static/i/icon_progress.png" alt="P" title="In Progress..">';
					}
					continue;
					
					case 2:
					if(($_SESSION['isat']['role']==4) && ($list->fl_approve > 3)){
					//if(($_SESSION['isat']['role']==4) && ($list->user_indosat==$_SESSION['isat']['uid']) && ($list->fl_approve > 3)){
						echo '<a rel="if_url" url="'.base_url().'index.php/form/app_indosat/atp/'.$list->atp_id.$nor.'"><img src="'.base_url().'static/i/icon_actions.png" alt="As" title="Take Action"></a>';
					}else{
						echo '<a rel="if_close" url="'.base_url().'index.php/form/msg_indosat/atp/'.$list->atp_id.'"><img src="'.base_url().'static/i/icon_tickr.png" alt="x" title="Rejected"></a>';
						if($list->msg_indosat){
							$msg_indosat = explode('|', $list->msg_indosat);
							if($msg_indosat[1]) echo ' &nbsp; <a rel="if_close" url="'.base_url().'index.php/form/msgs_indosat/atp/'.$list->atp_id.'"><img src="'.base_url().'static/i/icon_message.png" alt="M" title="Message"></a>';
						}
					}
					continue;
					
					case 1:
					echo '<a rel="if_close" url="'.base_url().'index.php/form/msg_indosat/atp/'.$list->atp_id.'"><img src="'.base_url().'static/i/icon_tick.png" alt="v" title="Approved"></a>';
					if($list->msg_indosat){
						$msg_indosat = explode('|', $list->msg_indosat);
						if($msg_indosat[1]) echo ' &nbsp; <a rel="if_close" url="'.base_url().'index.php/form/msgs_indosat/atp/'.$list->atp_id.'"><img src="'.base_url().'static/i/icon_message.png" alt="M" title="Message"></a>';
					}
					continue;
					default: echo '-'; continue;
				}
            }
			else echo '-';
			?>
    		</td>
    
            <td align="center"><?php echo date('d M y', $list->timelog) ?></td>
        </tr>
        <?php } ?>
    </tbody>
    </table>
    <?php
	if($_SESSION['isat']['role'] == 6){
		$Qpaging = $this->db->query("
			SELECT a.`atp_id`
			FROM `it_atp` a
			JOIN `it_site` b ON b.`site_id`=a.`site_id`
			LEFT JOIN `it_book` c ON c.`idx`=a.`atp_id` AND c.`table`='atp'
			JOIN `it_attachment` d ON d.`idx`=a.`atp_id` AND d.`table`='atp_indosat_foto' AND d.`user_id`='".$_SESSION['isat']['uid']."'
			WHERE a.`fl_status` IN(0, 1, 2, 3)".$filter
		);
	}else{
		$Qpaging = $this->db->query("
			SELECT a.`atp_id`
			FROM `it_atp` a
			JOIN `it_site` b ON b.`site_id`=a.`site_id`
			LEFT JOIN `it_book` c ON c.`idx`=a.`atp_id` AND c.`table`='atp'
			WHERE a.`fl_status` IN(0, 1, 2, 3) ".$wh_atp[$_SESSION['isat']['role']].$filter
		);
	}
	$num_page = ceil($Qpaging->num_rows / $limit);
	if($Qpaging->num_rows > $limit) $this->ifunction->paging($p, base_url().'index.php/main/atp/'.$t.'/', $num_page, $Qpaging->num_rows, 'href', '/'.$s.'/'.$sort);
	}else{
		echo '<p class="info-box">No data';
		if($search[0]->keyword) echo ' for keyword: <b>'.$search[0]->keyword.'</b>';
		echo '.</p>';
	}
	?>
    </div>
</div>