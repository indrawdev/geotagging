<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$filter = '';
if($s && ($t == 'search')){
	$Qsearch = $this->db->query("SELECT `keyword` FROM `it_search` WHERE `search_id`='$s'");
	if($Qsearch->num_rows){
		$search = $Qsearch->result_object();
		$keyword = str_replace(" ", "%", $search[0]->keyword);
		$filter = " AND (a.`task_title` LIKE '%$keyword%' OR a.`neid` LIKE '%$keyword%' OR b.`name` LIKE '%$keyword%' OR b.`id` LIKE '%$keyword%')";
	}
}

$arr_url = array('task_id', 'title', 'site', 'created');
$arr_field = array('a.task_id', 'a.task_title', 'b.name', 'a.date_created');

$sorted = explode('-', $sort);
if(!in_array($sorted[0], $arr_url, true)) $sorted[0] = 'task_id';
if($sorted[1] == 'asc') $sorted[1] = 'asc'; else $sorted[1] = 'desc';
$sorted_0 = str_replace($arr_url, $arr_field, $sorted[0]);
?>

<div id="body">
	<div class="container">
    <h1>Management SS (Approval) <span><form method="post" name="search_box" id="search-box" action="<?php echo base_url() ?>index.php/process/search/ss_app" onsubmit="return searchbox()"><input type="text" name="q" class="searchbox" maxlength="100" placeholder="Search.." value="<?php echo $search[0]->keyword ?>"></form><a href="<?php echo base_url() ?>index.php/main/ss_pending">&empty; Pending Approval</a> <a class="submit" href="<?php echo base_url() ?>index.php/main/ss">SS Task</a></span></h1>
    
	<?php
	$limit=15;
	if(empty($p)){
		$position=0;
		$p=1;
	}
	else $position=($p-1) * $limit;
	
	if($_SESSION['isat']['role'] == 4){
		$Qlist = $this->db->query("
			SELECT a.`task_id`, a.`task_title`, a.`date_created`, b.`name`, b.`id`, b.`site_id`
			FROM `ss_task` a
			JOIN `it_site` b ON b.`site_id`=a.`site_id`
			WHERE a.`fl_status`=0 $filter
			ORDER BY $sorted_0 $sorted[1] LIMIT $position, $limit
		");//AND a.`user_pmisat`='".$_SESSION['isat']['uid']."' 
		//JOIN `it_network` d ON d.`neid`=a.`neid`
		//JOIN `it_site` b ON b.`id`=d.`id`
	}
	else $Qlist->num_rows = 0;
	
	if($Qlist->num_rows){
    ?>
    <table class="tables" width="100%">
    <thead>
    <tr>
        <th width="110">Action</th>
        <th align="left"><a href="<?php echo base_url() ?>index.php/main/ss_app/<?php echo $t ?>/<?php echo $p ?>/<?php echo $s ?>/<?php if($sort == 'title-desc') echo 'title-asc'; else echo 'title-desc' ?>">Task Title</a><?php if($sorted[0] == 'title'){ echo '<span>'; if($sorted[1] == 'asc') echo ' &and;'; else echo ' &or;'; echo '</span>'; } ?></th>
        <th width="200"><a href="<?php echo base_url() ?>index.php/main/ss_app/<?php echo $t ?>/<?php echo $p ?>/<?php echo $s ?>/<?php if($sort == 'site-desc') echo 'site-asc'; else echo 'site-desc' ?>">Site Name</a><?php if($sorted[0] == 'site'){ echo '<span>'; if($sorted[1] == 'asc') echo ' &and;'; else echo ' &or;'; echo '</span>'; } ?></th>
        <th width="70"><a href="<?php echo base_url() ?>index.php/main/ss_app/<?php echo $t ?>/<?php echo $p ?>/<?php echo $s ?>/<?php if($sort == 'created-desc') echo 'created-asc'; else echo 'created-desc' ?>">Created</a><?php if($sorted[0] == 'created'){ echo '<span>'; if($sorted[1] == 'asc') echo ' &and;'; else echo ' &or;'; echo '</span>'; } ?></th>
    </tr>
    </thead>
    <tbody>
		<?php foreach($Qlist->result_object() as $list){ ?>
        <tr id="list_ss_<?php echo $list->task_id ?>">
            <td align="center" id="attr_ss_<?php echo $list->task_id ?>">
            <a rel="if_up" url="<?php echo base_url() ?>index.php/form/view/ss/<?php echo $list->task_id ?>"><img src="<?php echo base_url() ?>static/i/icon_edit.png" title="View" style="vertical-align:middle"></a> &nbsp;
            <a rel="if_url" url="<?php echo base_url() ?>index.php/form/action/ss_task/<?php echo $list->task_id ?>"><img src="<?php echo base_url() ?>static/i/icon_tick.png" title="Approve" style="vertical-align:middle"></a>
            </td>
            <td>[ID: <b><?php echo $list->task_id ?></b>] <?php echo $list->task_title ?></td>
            <td align="center"><a href="<?php echo base_url() ?>index.php/main/site/detail/0/<?php echo $list->site_id ?>" target="_blank"><?php echo '<span style="text-transform:lowercase">'.$list->name.'</span> ('.$list->id.')' ?></a></td>
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
		WHERE a.`fl_status`=0
	".$filter);// AND a.`user_pmisat`='".$_SESSION['isat']['uid']."'
	//JOIN `it_network` d ON d.`neid`=a.`neid`
	//JOIN `it_site` b ON b.`id`=d.`id`
	$num_page = ceil($Qpaging->num_rows / $limit);
	if($Qpaging->num_rows > $limit) $this->ifunction->paging($p, base_url().'index.php/main/ss_app/'.$t.'/'.$sort.'/', $num_page, $Qpaging->num_rows, 'href', '/'.$s);
	}else{
		echo '<p class="info-box">No data';
		if($search[0]->keyword) echo ' for keyword: <b>'.$search[0]->keyword.'</b>'; else echo ' for your account';
		echo '.</p>';
	}
	?>
    </div>
</div>