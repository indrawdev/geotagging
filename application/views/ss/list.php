<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$filter = '';
if($s && ($t == 'search')){
	$Qsearch = $this->db->query("SELECT `keyword` FROM `it_search` WHERE `search_id`='$s'");
	if($Qsearch->num_rows){
		$search = $Qsearch->result_object();
		$keyword = str_replace(" ", "%", $search[0]->keyword);
		$filter = " AND (a.`task_id` LIKE '%$keyword%' OR a.`task_title` LIKE '%$keyword%' OR a.`neid` LIKE '%$keyword%' OR b.`name` LIKE '%$keyword%' OR b.`id` LIKE '%$keyword%')";
	}
}

$arr_url = array('ss_id', 'action', 'title', 'site', 'book', 'checkin', 'done', 'vendor', 'consultant', 'indosat', 'created');
$arr_field = array('a.task_id', 'a.fl_status', 'a.task_title', 'b.name', 'c.idx', 'c.fl_active', 'a.fl_status', 'a.order_pmvendor', 'a.order_consultant', 'a.order_pmisat', 'a.date_created');

$sorted = explode('-', $sort);
if(!in_array($sorted[0], $arr_url, true)) $sorted[0] = 'ss_id';
if($sorted[1] == 'asc') $sorted[1] = 'asc'; else $sorted[1] = 'desc';
$sorted_0 = str_replace($arr_url, $arr_field, $sorted[0]);
?>

<div id="body">
	<div class="container">
    <h1>Management SS <span><form method="post" name="search_box" id="search-box" action="<?php echo base_url() ?>index.php/process/search/ss" onsubmit="return searchbox()"><input type="text" name="q" class="searchbox" maxlength="100" placeholder="Search.." value="<?php echo $search[0]->keyword ?>"></form><?php if(in_array($_SESSION['isat']['role'], array('1', '2'), true)) echo ' <a rel="if_up" url="'.base_url().'index.php/form/add/ss">+ Create New</a>'; if($_SESSION['isat']['role'] == 4) echo '<a href="'.base_url().'index.php/main/ss_pending">Pending</a> <a class="submit" href="'.base_url().'index.php/main/ss_app">Approval</a>' ?></span></h1>
    
	<?php
	$limit=15;
	if(empty($p)){
		$position=0;
		$p=1;
	}
	else $position=($p-1) * $limit;
	
	/*switch($_SESSION['isat']['role']){
		case 2: $wh = ""; continue; //$wh = " AND (a.`user_pmvendor`='".$_SESSION['isat']['uid']."')";
		case 3: $wh = " AND (a.`user_consultant`='".$_SESSION['isat']['uid']."' OR a.`user_consultant` IS NULL)"; continue;
		case 4: $wh = " AND (a.`user_pmisat`='".$_SESSION['isat']['uid']."')"; continue;
		case 5: $wh = " AND (a.`user_delegator_pmvendor`='".$_SESSION['isat']['uid']."' OR a.`user_delegator_consultant`='".$_SESSION['isat']['uid']."' OR a.`user_delegator_pmisat`='".$_SESSION['isat']['uid']."')"; continue;
		default: if($_SESSION['isat']['guest']) $wh = " AND a.`user_engineer`='".$_SESSION['isat']['guest']."'"; else $wh = ''; continue;
	}*/
	
	$wh_ss = array(
		"AND a.`user_engineer`='".$_SESSION['isat']['uid']."'", //0
		"", //1
		"AND a.`user_pmvendor`='".$_SESSION['isat']['uid']."'", //2
		"AND a.`user_consultant`='".$_SESSION['isat']['uid']."'", //3
		"", //4 -AND a.`user_pmisat`='".$_SESSION['isat']['uid']."'
		"AND a.`user_delegator_pmvendor`='".$_SESSION['isat']['uid']."'", //5
		"AND a.`user_engineer`='".$_SESSION['isat']['uid']."'", //6
		"", //7 -AND a.`user_engineer`='".$_SESSION['isat']['uid']."'
		"AND a.`user_engineer`='".$_SESSION['isat']['uid']."'", //8
		"AND a.`user_delegator_pmvendor`='".$_SESSION['isat']['uid']."'", //9
		"AND a.`user_delegator_consultant`='".$_SESSION['isat']['uid']."'", //10
		"AND a.`user_engineer`='".$_SESSION['isat']['uid']."'", //11
		"AND a.`user_delegator_pmisat`='".$_SESSION['isat']['uid']."'", //12
		"AND a.`user_engineer`='".$_SESSION['isat']['uid']."'" //13
	);
	
	$Qlist = $this->db->query("
		SELECT a.`task_id`, a.`task_title`, a.`fl_status`, a.`fl_reject`, a.`date_created`, a.`user_engineer`, a.`user_pmvendor`, a.`user_consultant`, a.`user_pmisat`, a.`user_delegator_pmvendor`, a.`user_delegator_consultant`, a.`user_delegator_pmisat`, a.`order_pmvendor`, a.`order_consultant`, a.`order_pmisat`, b.`name`, b.`id`, b.`site_id`, c.`idx`,  c.`fl_active` AS `booked`
		FROM `ss_task` a
		JOIN `it_site` b ON b.`site_id`=a.`site_id`
		LEFT JOIN `it_book` c ON c.`idx`=a.`task_id` AND c.`table`='ss'
		WHERE a.`fl_status` IN(0, 1, 2, 3) ".$wh_ss[$_SESSION['isat']['role']]." $filter
		ORDER BY $sorted_0 $sorted[1] LIMIT $position, $limit
	");
	//JOIN `it_network` d ON d.`neid`=a.`neid`
	//JOIN `it_site` b ON b.`id`=d.`id`
	if($Qlist->num_rows){
    ?>
    <table class="tables" width="100%">
    <thead>
    <tr>
        <th width="110"><a href="<?php echo base_url() ?>index.php/main/ss/<?php echo $t ?>/<?php echo $p ?>/<?php echo $s ?>/<?php if($sort == 'action-desc') echo 'action-asc'; else echo 'action-desc' ?>">Action</a><?php if($sorted[0] == 'action'){ echo '<span>'; if($sorted[1] == 'asc') echo ' &and;'; else echo ' &or;'; echo '</span>'; } ?></th>
        <th align="left"><a href="<?php echo base_url() ?>index.php/main/ss/<?php echo $t ?>/<?php echo $p ?>/<?php echo $s ?>/<?php if($sort == 'title-desc') echo 'title-asc'; else echo 'title-desc' ?>">Task Title</a><?php if($sorted[0] == 'title'){ echo '<span>'; if($sorted[1] == 'asc') echo ' &and;'; else echo ' &or;'; echo '</span>'; } ?></th>
        <th width="130"><a href="<?php echo base_url() ?>index.php/main/ss/<?php echo $t ?>/<?php echo $p ?>/<?php echo $s ?>/<?php if($sort == 'site-desc') echo 'site-asc'; else echo 'site-desc' ?>">Site Name</a><?php if($sorted[0] == 'site'){ echo '<span>'; if($sorted[1] == 'asc') echo ' &and;'; else echo ' &or;'; echo '</span>'; } ?></th>
        <th width="45" style="font-size:11px"><a href="<?php echo base_url() ?>index.php/main/ss/<?php echo $t ?>/<?php echo $p ?>/<?php echo $s ?>/<?php if($sort == 'book-desc') echo 'book-asc'; else echo 'book-desc' ?>">Book</a><?php if($sorted[0] == 'book'){ echo '<span>'; if($sorted[1] == 'asc') echo ' &and;'; else echo ' &or;'; echo '</span>'; } ?></th>
        <th width="45" style="font-size:11px"><a href="<?php echo base_url() ?>index.php/main/ss/<?php echo $t ?>/<?php echo $p ?>/<?php echo $s ?>/<?php if($sort == 'checkin-desc') echo 'checkin-asc'; else echo 'checkin-desc' ?>">Check<br />In</a><?php if($sorted[0] == 'checkin'){ echo '<span>'; if($sorted[1] == 'asc') echo ' &and;'; else echo ' &or;'; echo '</span>'; } ?></th>
        
        <th width="45" style="font-size:11px"><a href="<?php echo base_url() ?>index.php/main/ss/<?php echo $t ?>/<?php echo $p ?>/<?php echo $s ?>/<?php if($sort == 'done-desc') echo 'done-asc'; else echo 'done-desc' ?>">Task</a><?php if($sorted[0] == 'done'){ echo '<span>'; if($sorted[1] == 'asc') echo ' &and;'; else echo ' &or;'; echo '</span>'; } ?></th>
        <th width="60" style="font-size:10px"><a href="<?php echo base_url() ?>index.php/main/ss/<?php echo $t ?>/<?php echo $p ?>/<?php echo $s ?>/<?php if($sort == 'vendor-desc') echo 'vendor-asc'; else echo 'vendor-desc' ?>">PM<br />Vendor</a><?php if($sorted[0] == 'vendor'){ echo '<span>'; if($sorted[1] == 'asc') echo ' &and;'; else echo ' &or;'; echo '</span>'; } ?></th>
        <th width="70" style="font-size:10px"><a href="<?php echo base_url() ?>index.php/main/ss/<?php echo $t ?>/<?php echo $p ?>/<?php echo $s ?>/<?php if($sort == 'consultant-desc') echo 'consultant-asc'; else echo 'consultant-desc' ?>">Consultant</a><?php if($sorted[0] == 'consultant'){ echo '<span>'; if($sorted[1] == 'asc') echo ' &and;'; else echo ' &or;'; echo '</span>'; } ?></th>
        <th width="60" style="font-size:10px"><a href="<?php echo base_url() ?>index.php/main/ss/<?php echo $t ?>/<?php echo $p ?>/<?php echo $s ?>/<?php if($sort == 'indosat-desc') echo 'indosat-asc'; else echo 'indosat-desc' ?>">PM<br />Indosat</a><?php if($sorted[0] == 'indosat'){ echo '<span>'; if($sorted[1] == 'asc') echo ' &and;'; else echo ' &or;'; echo '</span>'; } ?></th>
        <th width="70"><a href="<?php echo base_url() ?>index.php/main/ss/<?php echo $t ?>/<?php echo $p ?>/<?php echo $s ?>/<?php if($sort == 'created-desc') echo 'created-asc'; else echo 'created-desc' ?>">Created</a><?php if($sorted[0] == 'created'){ echo '<span>'; if($sorted[1] == 'asc') echo ' &and;'; else echo ' &or;'; echo '</span>'; } ?></th>
    </tr>
    </thead>
    <tbody>
		<?php foreach($Qlist->result_object() as $list){ ?>
        <tr id="list_ss_<?php echo $list->task_id ?>">
            <td align="center" id="attr_ss_<?php echo $list->task_id ?>">
            <?php
			$stop = 0;
			if($list->user_consultant) $nor = '-1'; else $nor = '';
            if($list->fl_status == 1){
				
				$Qhistory = $this->db->query("
					SELECT b.`role_id`
					FROM `it_log_app` a
					JOIN `it_user` b ON b.`user_id`=a.`user_id`
					WHERE a.`table`='ss' AND a.`idx`='$list->task_id'
					ORDER BY a.`timelog` DESC LIMIT 1
				");
				if($Qhistory->num_rows){
					$history = $Qhistory->result_object();
					$role_id = $history[0]->role_id;
				}
				else $role_id = 0;
				
				if(in_array($_SESSION['isat']['role'], array('1', '2'), true)){
					if($_SESSION['isat']['role'] == 1) echo '<a class="remove" id="'.$list->task_id.'" c="ss" t="SS task"><img src="'.base_url().'static/i/icon_delete.png" title="Remove"></a> &nbsp; ';
					//echo '<img src="'.base_url().'static/i/icon_deletex.png" title="Disabled"> &nbsp; ';
					echo '<a rel="if_up" url="'.base_url().'index.php/form/ed/ss/'.$list->task_id.'"><img src="'.base_url().'static/i/icon_edit.png" title="Edit"></a> &nbsp; ';
				}
				else echo '<a rel="if_off" url="'.base_url().'index.php/form/view/ss/'.$list->task_id.'"><img src="'.base_url().'static/i/icon_edit.png" title="View"></a> ';
			}elseif($list->fl_status == 2){
				if(in_array($_SESSION['isat']['role'], array('1', '2'), true)) echo '<a class="remove" id="'.$list->task_id.'" c="ss" t="SS task"><img src="'.base_url().'static/i/icon_delete.png" title="Remove" style="vertical-align:middle"></a> &nbsp; ';
				echo '<a rel="if_off" url="'.base_url().'index.php/form/view/ss/'.$list->task_id.'"><img src="'.base_url().'static/i/icon_edit.png" title="View" style="vertical-align:middle"></a> ';
				echo '<a rel="if_close" url="'.base_url().'index.php/form/view/ss_reject/'.$list->task_id.'" style="color:#F00" title="Rejected Task">Rejected</a>';
			}elseif($list->fl_status == 3){
				if(in_array($_SESSION['isat']['role'], array('1', '2'), true)) echo '<a class="remove" id="'.$list->task_id.'" c="ss" t="SS task"><img src="'.base_url().'static/i/icon_delete.png" title="Remove" style="vertical-align:middle"></a> &nbsp; ';
				if($_SESSION['isat']['role'] == 4){
					if($list->user_pmisat == $_SESSION['isat']['uid']){
						echo '<a href="'.base_url().'index.php/main/ss_pending" style="color:#060" title="Pending Task">Pending</a>';
					}else{
						echo '<a rel="if_off" url="'.base_url().'index.php/form/view/ss/'.$list->task_id.'"><img src="'.base_url().'static/i/icon_edit.png" title="View" style="vertical-align:middle"></a> ';
						echo '<a rel="if_close" url="'.base_url().'index.php/form/view/ss_pending/'.$list->task_id.'" style="color:#CCC" title="Pending Task">Pending</a>';
					}
				}else{
					echo '<a rel="if_off" url="'.base_url().'index.php/form/view/ss/'.$list->task_id.'"><img src="'.base_url().'static/i/icon_edit.png" title="View" style="vertical-align:middle"></a> ';
					echo '<a rel="if_close" url="'.base_url().'index.php/form/view/ss_pending/'.$list->task_id.'" style="color:#060" title="Pending Task">Pending</a>';
				}
			}else{
				if($_SESSION['isat']['role'] == 4){
					if($list->user_pmisat == $_SESSION['isat']['uid']){
						echo '<a href="'.base_url().'index.php/main/ss_app">Approval</a>';
					}else{
						echo '<a rel="if_off" url="'.base_url().'index.php/form/view/ss/'.$list->task_id.'"><img src="'.base_url().'static/i/icon_edit.png" title="View" style="vertical-align:middle"></a> ';
						echo '<font color="#CCCCCC">Approval</font>';
					}
				}
				else echo 'Approval';
			}
			?>
            </td>
            <td>[ID: <b><?php echo $list->task_id ?></b>] <?php echo $list->task_title ?></td>
            <td align="center"><a href="<?php echo base_url() ?>index.php/main/site/detail/0/<?php echo $list->site_id ?>" target="_blank"><?php echo '<span style="text-transform:lowercase">'.wordwrap($list->name, 20, "<br />", true).'</span> ('.$list->id.')' ?></a></td>
            <td align="center"><?php if($list->idx) echo '<a rel="if_close" url="'.base_url().'index.php/form/booked/ss/'.$list->task_id.'"><img src="'.base_url().'static/i/icon_tick.png" alt="v" title="Done"></a>'; else echo '-' ?></td>
			<td align="center">
			<?php
            if($list->booked){
				echo '<a rel="if_off" url="'.base_url().'index.php/form/checked/ss/'.$list->task_id.'"><img src="'.base_url().'static/i/icon_tick.png" alt="v" title="Done"></a>';
			}else{
				if($role_id) echo '<span class="tickr">&radic;</span>'; else echo '-';
			}
			?>
            </td>
            <td align="center">
			<?php
            if($list->order_pmvendor <> 0){
				echo '<a rel="if_off" url="'.base_url().'index.php/form/done/ss/'.$list->task_id.'"><img src="'.base_url().'static/i/icon_tick.png" alt="v" title="Done"></a>';
			}else{
				if($role_id) echo '<span class="tickr">&radic;</span>'; else echo '-';
			}
			?>
            </td>
            
            <td align="center">
            <?php
            if($list->order_pmvendor <> 0){
				switch($list->order_pmvendor){
					
					case 3:
					if(($_SESSION['isat']['role']==2) && ($list->user_pmvendor==$_SESSION['isat']['uid'])){
						if($list->user_delegator_pmvendor) echo '<img src="'.base_url().'static/i/icon_delegated.png" alt="D" title="Delegated">'; else echo '<a rel="if_url" url="'.base_url().'index.php/form/app_supervisor/ss/'.$list->task_id.$nor.'"><img src="'.base_url().'static/i/icon_action.png" alt="A" title="Take Action"></a>';
					}else{
						if($list->user_delegator_pmvendor==$_SESSION['isat']['uid']) echo '<a rel="if_url" url="'.base_url().'index.php/form/delegate_supervisor/ss/'.$list->task_id.'"><img src="'.base_url().'static/i/icon_action.png" alt="A" title="Take Action"></a>'; else echo '<img src="'.base_url().'static/i/icon_progress.png" alt="P" title="In Progress..">';
					}
					continue;
					
					case 2:
					if(($_SESSION['isat']['role']==2) && ($list->user_pmvendor==$_SESSION['isat']['uid'])){
						echo '<a rel="if_url" url="'.base_url().'index.php/form/app_supervisor/ss/'.$list->task_id.$nor.'"><img src="'.base_url().'static/i/icon_actions.png" alt="As" title="Take Action"></a>';
					}else{
						echo '<a rel="if_close" url="'.base_url().'index.php/form/msg_supervisor/ss/'.$list->task_id.'"><img src="'.base_url().'static/i/icon_tickr.png" alt="x" title="Rejected"></a>';
						/*if($list->msg_supervisor){
							$msg_supervisor = explode('|', $list->msg_supervisor);
							if($msg_supervisor[1]) echo ' &nbsp; <a rel="if_close" url="'.base_url().'index.php/form/msgs_supervisor/ss/'.$list->task_id.'"><img src="'.base_url().'static/i/icon_message.png" alt="M" title="Message"></a>';
						}*/
					}
					continue;
					
					case 1:
					echo '<a rel="if_close" url="'.base_url().'index.php/form/msg_supervisor/ss/'.$list->task_id.'"><img src="'.base_url().'static/i/icon_tick.png" alt="v" title="Approved"></a>';
					/*if($list->msg_supervisor){
						$msg_supervisor = explode('|', $list->msg_supervisor);
						if($msg_supervisor[1]) echo ' &nbsp; <a rel="if_close" url="'.base_url().'index.php/form/msgs_supervisor/ss/'.$list->task_id.'"><img src="'.base_url().'static/i/icon_message.png" alt="M" title="Message"></a>';
					}*/
					continue;
					default: echo '-'; continue;
				}
            }else{
				if($role_id && ($stop == 0)){
					if($role_id == 2){
						$stop = 1;
						echo '<a rel="if_close" url="'.base_url().'index.php/form/msg_supervisor/ss/'.$list->task_id.'" class="tickr">&times;</a>';
					}
					else echo '<a rel="if_close" url="'.base_url().'index.php/form/msg_supervisor/ss/'.$list->task_id.'" class="tickr">&radic;</a>';
				}
				else echo '-';
			}
			?>
    		</td>
            
            <td align="center">
            <?php
			if($list->order_pmvendor <> 0){
				switch($list->order_consultant){
					
					case 3:
					if(($_SESSION['isat']['role']==3) && ($list->user_consultant==$_SESSION['isat']['uid'])){
						if($list->user_delegator_consultant) echo '<img src="'.base_url().'static/i/icon_delegated.png" alt="D" title="Delegated">'; else echo '<a rel="if_url" url="'.base_url().'index.php/form/app_manager/ss/'.$list->task_id.'"><img src="'.base_url().'static/i/icon_action.png" alt="A" title="Take Action"></a>';
					}else{
						if($list->user_delegator_consultant==$_SESSION['isat']['uid']) echo '<a rel="if_url" url="'.base_url().'index.php/form/delegate_manager/ss/'.$list->task_id.'"><img src="'.base_url().'static/i/icon_action.png" alt="A" title="Take Action"></a>'; else echo '<img src="'.base_url().'static/i/icon_progress.png" alt="P" title="In Progress..">';
					}
					continue;
					
					case 2:
					if(($_SESSION['isat']['role']==3) && ($list->user_consultant==$_SESSION['isat']['uid']) && ($list->fl_approve > 1)){
						echo '<a rel="if_url" url="'.base_url().'index.php/form/app_manager/ss/'.$list->task_id.'"><img src="'.base_url().'static/i/icon_actions.png" alt="As" title="Take Action"></a>';
					}else{
						echo '<a rel="if_close" url="'.base_url().'index.php/form/msg_manager/ss/'.$list->task_id.'"><img src="'.base_url().'static/i/icon_tickr.png" alt="x" title="Rejected"></a>';
						/*if($list->msg_manager){
							$msg_manager = explode('|', $list->msg_manager);
							if($msg_manager[1]) echo ' &nbsp; <a rel="if_close" url="'.base_url().'index.php/form/msgs_manager/ss/'.$list->task_id.'"><img src="'.base_url().'static/i/icon_message.png" alt="M" title="Message"></a>';
						}*/
					}
					continue;
					
					case 1:
					echo '<a rel="if_close" url="'.base_url().'index.php/form/msg_manager/ss/'.$list->task_id.'"><img src="'.base_url().'static/i/icon_tick.png" alt="v" title="Approved"></a>';
					/*if($list->msg_manager){
						$msg_manager = explode('|', $list->msg_manager);
						if($msg_manager[1]) echo ' &nbsp; <a rel="if_close" url="'.base_url().'index.php/form/msgs_manager/ss/'.$list->task_id.'"><img src="'.base_url().'static/i/icon_message.png" alt="M" title="Message"></a>';
					}*/
					continue;
					default: if($list->user_consultant) echo '-'; else echo 'N/A'; continue;
				}
            }else{
				if($role_id && ($stop == 0)){
					if($role_id == 3){
						$stop = 1;
						echo '<a rel="if_close" url="'.base_url().'index.php/form/msg_manager/ss/'.$list->task_id.'" class="tickr">&times;</a>';
					}
					else echo '<a rel="if_close" url="'.base_url().'index.php/form/msg_manager/ss/'.$list->task_id.'" class="tickr">&radic;</a>';
				}
				else echo '-';
			}
			?>
            </td>
            
            <td align="center">
            <?php
			if($list->order_pmvendor <> 0){
				switch($list->order_pmisat){
					
					case 3:
					if($_SESSION['isat']['role']==4){
					//if(($_SESSION['isat']['role']==4) && ($list->user_pmisat==$_SESSION['isat']['uid'])){
						if($list->user_delegator_pmisat) echo '<img src="'.base_url().'static/i/icon_delegated.png" alt="D" title="Delegated">'; else echo '<a rel="if_url" url="'.base_url().'index.php/form/app_indosat/ss/'.$list->task_id.$nor.'"><img src="'.base_url().'static/i/icon_action.png" alt="A" title="Take Action"></a>';
					}else{
						if($list->user_delegator_pmisat==$_SESSION['isat']['uid']) echo '<a rel="if_url" url="'.base_url().'index.php/form/delegate_indosat/ss/'.$list->task_id.'"><img src="'.base_url().'static/i/icon_action.png" alt="A" title="Take Action"></a>'; else echo '<img src="'.base_url().'static/i/icon_progress.png" alt="P" title="In Progress..">';
					}
					continue;
					
					case 2:
					if(($_SESSION['isat']['role']==4) && ($list->fl_approve > 3)){
					//if(($_SESSION['isat']['role']==4) && ($list->user_pmisat==$_SESSION['isat']['uid']) && ($list->fl_approve > 3)){
						echo '<a rel="if_url" url="'.base_url().'index.php/form/app_indosat/ss/'.$list->task_id.$nor.'"><img src="'.base_url().'static/i/icon_actions.png" alt="As" title="Take Action"></a>';
					}else{
						echo '<a rel="if_close" url="'.base_url().'index.php/form/msg_indosat/ss/'.$list->task_id.'"><img src="'.base_url().'static/i/icon_tickr.png" alt="x" title="Rejected"></a>';
						/*if($list->msg_indosat){
							$msg_indosat = explode('|', $list->msg_indosat);
							if($msg_indosat[1]) echo ' &nbsp; <a rel="if_close" url="'.base_url().'index.php/form/msgs_indosat/ss/'.$list->task_id.'"><img src="'.base_url().'static/i/icon_message.png" alt="M" title="Message"></a>';
						}*/
					}
					continue;
					
					case 1:
					echo '<a rel="if_close" url="'.base_url().'index.php/form/msg_indosat/ss/'.$list->task_id.'"><img src="'.base_url().'static/i/icon_tick.png" alt="v" title="Approved"></a>';
					/*if($list->msg_indosat){
						$msg_indosat = explode('|', $list->msg_indosat);
						if($msg_indosat[1]) echo ' &nbsp; <a rel="if_close" url="'.base_url().'index.php/form/msgs_indosat/ss/'.$list->task_id.'"><img src="'.base_url().'static/i/icon_message.png" alt="M" title="Message"></a>';
					}*/
					continue;
					default: echo '-'; continue;
				}
            }else{
				if($role_id && ($stop == 0)){
					if($role_id == 4){
						//$stop = 1;
						echo '<a rel="if_close" url="'.base_url().'index.php/form/msg_indosat/ss/'.$list->task_id.'" class="tickr">&times;</a>';
					}
					else echo '<a rel="if_close" url="'.base_url().'index.php/form/msg_indosat/ss/'.$list->task_id.'" class="tickr">&radic;</a>';
				}
				else echo '-';
			}
			?>
    		</td>
    
            <td align="center"><?php echo date('d M y', strtotime($list->date_created)) ?></td>
        </tr>
        <?php } ?>
    </tbody>
    </table>
    <?php
	$Qpaging = $this->db->query("
		SELECT a.`task_id`
		FROM `ss_task` a
		JOIN `it_site` b ON b.`site_id`=a.`site_id`
		WHERE a.`fl_status` IN(0, 1, 2, 3) ".$wh_ss[$_SESSION['isat']['role']].$filter
	);
	//JOIN `it_network` d ON d.`neid`=a.`neid`
	//JOIN `it_site` b ON b.`id`=d.`id`
	$num_page = ceil($Qpaging->num_rows / $limit);
	if($Qpaging->num_rows > $limit) $this->ifunction->paging($p, base_url().'index.php/main/ss/'.$t.'/', $num_page, $Qpaging->num_rows, 'href', '/'.$s.'/'.$sort);
	}else{
		echo '<p class="info-box">No data';
		if($search[0]->keyword) echo ' for keyword: <b>'.$search[0]->keyword.'</b>';
		echo '.</p>';
	}
	?>
    </div>
</div>