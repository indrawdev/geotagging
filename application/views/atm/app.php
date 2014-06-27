<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$filter = '';
if($s && ($t == 'search')){
	$Qsearch = $this->db->query("SELECT `keyword` FROM `it_search` WHERE `search_id`='$s'");
	if($Qsearch->num_rows){
		$search = $Qsearch->result_object();
		$keyword = str_replace(" ", "%", $search[0]->keyword);
		$filter = " AND (a.`title` LIKE '%$keyword%' OR a.`atf_no` LIKE '%$keyword%' OR b.`name` LIKE '%$keyword%' OR b.`id` LIKE '%$keyword%' OR c.`name` LIKE '%$keyword%' OR c.`id` LIKE '%$keyword%')";
	}
}//1
?>

<div id="body">
	<div class="container">
    <h1>Management ATM (Approval) <span><form method="post" name="search_box" id="search-box" action="<?php echo base_url() ?>index.php/process/search/atm_app" onsubmit="return searchbox()"><input type="text" name="q" class="searchbox" maxlength="100" placeholder="Search.." value="<?php echo $search[0]->keyword ?>"></form><a href="<?php echo base_url() ?>index.php/main/atm_pending">&empty; Postpone Approval</a> <a class="submit" href="<?php echo base_url() ?>index.php/main/atm">ATM Task</a></span></h1>
    
	<?php
	$limit=15;
	if(empty($p)){
		$position=0;
		$p=1;
	}
	else $position=($p-1) * $limit;
	
	if($_SESSION['isat']['role'] == 4){
		$Qlist = $this->db->query("
			SELECT a.`atm_id`, a.`title`, a.`atf_no`, a.`date`, a.`fl_status`, a.`timelog`, b.`name` AS `origin`, b.`id` AS `id_origin`, c.`name` AS `destination`, c.`id` AS `id_destination`
			FROM `it_atm` a
			JOIN `it_site` b ON b.`site_id`=a.`from_site`
			JOIN `it_site` c ON c.`site_id`=a.`to_site`
			WHERE a.`fl_status`=0 $filter
			ORDER BY a.`atm_id` DESC LIMIT $position, $limit
		");// AND a.`user_indosat`='".$_SESSION['isat']['uid']."'
	}
	else $Qlist->num_rows = 0;
	
	if($Qlist->num_rows){
    ?>
    <table class="tables" width="100%">
    <thead>
    <tr>
        <th width="85">Action</th>
        <th align="left">Reason (Project Name)</th>
        <th width="130">Origin</th>
        <th width="130">Destination</th>
        <th width="130">ATF Number</th>
        <th width="110">Movement Date</th>
        <th width="70">Created</th>
    </tr>
    </thead>
    <tbody>
		<?php foreach($Qlist->result_object() as $list){ ?>
        <tr id="list_atm_<?php echo $list->atm_id ?>">
            <td align="center" id="attr_atm_<?php echo $list->atm_id ?>">
            <a rel="if_off" url="<?php echo base_url() ?>index.php/form/view/atm/<?php echo $list->atm_id ?>"><img src="<?php echo base_url() ?>static/i/icon_edit.png" title="View" style="vertical-align:middle"></a> &nbsp;
            <a rel="if_url" url="<?php echo base_url() ?>index.php/form/action/atm_task/<?php echo $list->atm_id ?>"><img src="<?php echo base_url() ?>static/i/icon_tick.png" title="Approve" style="vertical-align:middle"></a>
            </td>
            <td>[ID: <b><?php echo $list->atm_id ?></b>] <?php echo wordwrap($list->title, 20, "<br />", true) ?></td>
            <td align="center"><a href="<?php echo base_url() ?>index.php/main/site/detail/0/<?php echo $list->from_site ?>" target="_blank"><?php echo '<span style="text-transform:lowercase">'.wordwrap($list->origin, 20, "<br />", true).'</span> ('.$list->id_origin.')' ?></a></td>
            <td align="center"><a href="<?php echo base_url() ?>index.php/main/site/detail/0/<?php echo $list->to_site ?>" target="_blank"><?php echo '<span style="text-transform:lowercase">'.wordwrap($list->destination, 20, "<br />", true).'</span> ('.$list->id_destination.')' ?></a></td>
            <td align="center"><?php echo $list->atf_no ?></td>
            <td align="center"><?php echo $list->date ?></td>
            <td align="center"><?php echo date('d M y', $list->timelog) ?></td>
        </tr>
        <?php } ?>
    </tbody>
    </table>
    <?php
	$Qpaging = $this->db->query("
		SELECT a.`atm_id`
		FROM `it_atm` a
		JOIN `it_site` b ON b.`site_id`=a.`from_site`
		JOIN `it_site` c ON c.`site_id`=a.`to_site`
		WHERE a.`fl_status`=0".$filter
	);// AND a.`user_indosat`='".$_SESSION['isat']['uid']."'
	$num_page = ceil($Qpaging->num_rows / $limit);
	if($Qpaging->num_rows > $limit) $this->ifunction->paging($p, base_url().'index.php/main/atm_app/'.$t.'/', $num_page, $Qpaging->num_rows, 'href', '/'.$s);
	}else{
		echo '<p class="info-box">No data';
		if($search[0]->keyword) echo ' for keyword: <b>'.$search[0]->keyword.'</b>';
		echo '.</p>';
	}
	?>
    </div>
</div>