<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$filter = '';
if($s && ($t == 'search')){
	$Qsearch = $this->db->query("SELECT `keyword` FROM `it_search` WHERE `search_id`='$s'");
	if($Qsearch->num_rows){
		$search = $Qsearch->result_object();
		$keyword = str_replace(" ", "%", $search[0]->keyword);
		$filter = " AND (a.`title` LIKE '%$keyword%' OR a.`brand` LIKE '%$keyword%' OR b.`name` LIKE '%$keyword%' OR b.`id` LIKE '%$keyword%')";
	}
}

$arr_url = array('atp_id', 'title', 'site', 'doc', 'created');
$arr_field = array('a.atp_id', 'a.title', 'b.name', 'a.brand', 'a.timelog');

$sorted = explode('-', $sort);
if(!in_array($sorted[0], $arr_url, true)) $sorted[0] = 'atp_id';
if($sorted[1] == 'asc') $sorted[1] = 'asc'; else $sorted[1] = 'desc';
$sorted_0 = str_replace($arr_url, $arr_field, $sorted[0]);
?>

<div id="body">
	<div class="container">
    <h1>Management ATP (Pending) <span><form method="post" name="search_box" id="search-box" action="<?php echo base_url() ?>index.php/process/search/atp_pending" onsubmit="return searchbox()"><input type="text" name="q" class="searchbox" maxlength="100" placeholder="Search.." value="<?php echo $search[0]->keyword ?>"></form><a href="<?php echo base_url() ?>index.php/main/atp_app">&radic; Approval</a> <a class="submit" href="<?php echo base_url() ?>index.php/main/atp">ATP Task</a></span></h1>
    
	<?php
	$limit=15;
	if(empty($p)){
		$position=0;
		$p=1;
	}
	else $position=($p-1) * $limit;
	
	if($_SESSION['isat']['role'] == 4){
		$Qlist = $this->db->query("
			SELECT a.`atp_id`, a.`title`, a.`site_id`, a.`brand`, a.`uid_supervisor_delegate`, a.`uid_manager_delegate`, a.`uid_indosat_delegate`, a.`msg_supervisor`, a.`msg_manager`, a.`msg_indosat`, a.`fl_approve`, a.`fl_reject`, a.`fl_active`, a.`fl_quest`, a.`fl_status`, a.`timelog`, b.`name`, b.`id`, c.`idx`,  c.`fl_active` AS `booked`
			FROM `it_atp` a
			JOIN `it_site` b ON b.`site_id`=a.`site_id`
			LEFT JOIN `it_book` c ON c.`idx`=a.`atp_id` AND c.`table`='atp'
			WHERE a.`fl_status`=3 $filter
			ORDER BY  $sorted_0 $sorted[1] LIMIT $position, $limit
		");//AND a.`user_indosat`='".$_SESSION['isat']['uid']."' 
	}
	else $Qlist->num_rows = 0; 
	
	if($Qlist->num_rows){
	$arr_cd = array('miniMCE', 'atpFilter', 'atpPowersupply', 'ericsson2G', 'ericsson3G', 'ericssonMicrowave', 'zteMicrowave', 'zte2G', 'zte3G');
	$arr_nm = array('Mini CME', 'ATP Filter', 'ATP Power Supply', 'Ericsson 2G', 'Ericsson 3G', 'Microwave Ericsson', 'Microwave ZTE', 'ZTE 2G', 'ZTE 3G');
    ?>
    <table class="tables" width="100%">
    <thead>
    <tr>
        <th width="85">Action</th>
        <th align="left"><a href="<?php echo base_url() ?>index.php/main/atp_pending/<?php echo $t ?>/<?php echo $p ?>/<?php echo $s ?>/<?php if($sort == 'title-desc') echo 'title-asc'; else echo 'title-desc' ?>">Task Title</a><?php if($sorted[0] == 'title'){ echo '<span>'; if($sorted[1] == 'asc') echo ' &and;'; else echo ' &or;'; echo '</span>'; } ?></th>
        <th width="200"><a href="<?php echo base_url() ?>index.php/main/atp_pending/<?php echo $t ?>/<?php echo $p ?>/<?php echo $s ?>/<?php if($sort == 'site-desc') echo 'site-asc'; else echo 'site-desc' ?>">Site Name</a><?php if($sorted[0] == 'site'){ echo '<span>'; if($sorted[1] == 'asc') echo ' &and;'; else echo ' &or;'; echo '</span>'; } ?></th>
        <th width="150"><a href="<?php echo base_url() ?>index.php/main/atp_pending/<?php echo $t ?>/<?php echo $p ?>/<?php echo $s ?>/<?php if($sort == 'doc-desc') echo 'doc-asc'; else echo 'doc-desc' ?>">Doc</a><?php if($sorted[0] == 'doc'){ echo '<span>'; if($sorted[1] == 'asc') echo ' &and;'; else echo ' &or;'; echo '</span>'; } ?></th>
        <th width="70"><a href="<?php echo base_url() ?>index.php/main/atp_pending/<?php echo $t ?>/<?php echo $p ?>/<?php echo $s ?>/<?php if($sort == 'created-desc') echo 'created-asc'; else echo 'created-desc' ?>">Created</a><?php if($sorted[0] == 'created'){ echo '<span>'; if($sorted[1] == 'asc') echo ' &and;'; else echo ' &or;'; echo '</span>'; } ?></th>
    </tr>
    </thead>
    <tbody>
		<?php foreach($Qlist->result_object() as $list){ ?>
        <tr id="list_atp_<?php echo $list->atp_id ?>">
            <td align="center" id="attr_atp_<?php echo $list->atp_id ?>">
            <a rel="if_up" url="<?php echo base_url() ?>index.php/form/view/atp/<?php echo $list->atp_id ?>"><img src="<?php echo base_url() ?>static/i/icon_edit.png" title="View" style="vertical-align:middle"></a> &nbsp;
            <a rel="if_url" url="<?php echo base_url() ?>index.php/form/action/atp_task/<?php echo $list->atp_id ?>"><img src="<?php echo base_url() ?>static/i/icon_tickr.png" title="Approve" style="vertical-align:middle"></a> &nbsp;
            <a rel="if_close" url="<?php echo base_url() ?>index.php/form/view/atp_pending/<?php echo $list->atp_id ?>"><img src="<?php echo base_url() ?>static/i/icon_message.png" title="Message" style="vertical-align:middle"></a>
            </td>
            <td>[ID: <b><?php echo $list->atp_id ?></b>] <?php echo $list->title ?></td>
            <td align="center"><a href="<?php echo base_url() ?>index.php/main/site/detail/0/<?php echo $list->site_id ?>" target="_blank"><?php echo '<span style="text-transform:lowercase">'.$list->name.'</span> ('.$list->id.')' ?></a></td>
            <td align="center"><?php echo str_replace($arr_cd, $arr_nm, $list->brand) ?></td>
            <td align="center"><?php echo date('d M y', $list->timelog) ?></td>
        </tr>
        <?php } ?>
    </tbody>
    </table>
    <?php
	$Qpaging = $this->db->query("SELECT a.`atp_id` FROM `it_atp` a JOIN `it_site` b ON b.`site_id`=a.`site_id` WHERE a.`fl_status`=3".$filter);// AND a.`user_indosat`='".$_SESSION['isat']['uid']."'
	$num_page = ceil($Qpaging->num_rows / $limit);
	if($Qpaging->num_rows > $limit) $this->ifunction->paging($p, base_url().'index.php/main/atp_pending/'.$t.'/', $num_page, $Qpaging->num_rows, 'href', '/'.$s.'/'.$sort);
	}else{
		echo '<p class="info-box">No data';
		if($search[0]->keyword) echo ' for keyword: <b>'.$search[0]->keyword.'</b>'; else echo ' for your account';
		echo '.</p>';
	}
	?>
    </div>
</div>