<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$filter = '';
if($s && ($t == 'search')){
	$Qsearch = $this->db->query("SELECT `keyword` FROM `it_search` WHERE `search_id`='$s'");
	if($Qsearch->num_rows){
		$search = $Qsearch->result_object();
		$keyword = str_replace(" ", "%", $search[0]->keyword);
		$filter = " WHERE (`title` LIKE '%$keyword%' OR `file_name` LIKE '%$keyword%')";
	}
}
?>

<div id="body">
	<div class="container">
    <h1>Customer Complain Report <span><form method="post" name="search_box" id="search-box" action="<?php echo base_url() ?>index.php/process/search/reports" onsubmit="return searchbox()"><input type="text" name="q" class="searchbox" maxlength="100" placeholder="Search.." value="<?php echo $search[0]->keyword ?>"></form> <?php if($_SESSION['isat']['role'] == 1) echo '<a rel="if_url" url="'.base_url().'index.php/form/add/reports">+ Add New</a>' ?></span></h1>
    
	<?php
	$limit=15;
	if(empty($p)){
		$position=0;
		$p=1;
	}
	else $position=($p-1) * $limit;
	
	$Qlist = $this->db->query("SELECT `report_id`, `title`, `file_name`, `path`, `time_entry` FROM `it_report` $filter ORDER BY `report_id` DESC LIMIT $position, $limit");
    if($Qlist->num_rows){
    ?>
    <table class="tables" width="100%">
    <thead>
    <tr>
        <th width="110">Action</th>
        <th width="50">ID</th>
        <th>Title</th>
        <th>Document Name</th>
        <th width="75">Created</th>
    </tr>
    </thead>
    <tbody>
		<?php foreach($Qlist->result_object() as $list){ ?>
        <tr id="list_reports_<?php echo $list->report_id ?>">
            <td align="center" id="attr_reports_<?php echo $list->report_id ?>">
            <?php if($_SESSION['isat']['role'] == 1){ ?>
            <a class="remove" id="<?php echo $list->report_id ?>" c="reports" t="Report"><img src="<?php echo base_url() ?>static/i/icon_delete.png" title="Remove"></a> &nbsp;
            <a rel="if_url" url="<?php echo base_url() ?>index.php/form/ed/reports/<?php echo $list->report_id ?>"><img src="<?php echo base_url() ?>static/i/icon_edit.png" title="Edit"></a> &nbsp;
            <a href="<?php echo base_url() ?>media/report/<?php echo $list->path ?>" target="_blank"><img src="<?php echo base_url() ?>static/i/icon_download.png" title="Download"></a>
			<?php } else echo '<a href="'.base_url().'media/report/'.$list->path.'" target="_blank">Download</a>' ?>
            </td>
            <td align="center"><?php echo $list->report_id ?></td>
            <td>&nbsp; <?php echo $list->title ?></td>
            <td>&nbsp; <?php echo $list->file_name ?></td>
            <td align="center"><?php echo date('d M y', strtotime($list->time_entry)) ?></td>
        </tr>
        <?php } ?>
    </tbody>
    </table>
    <?php
	$Qpaging = $this->db->query("SELECT `report_id` FROM `it_report`".$filter);
	$num_page = ceil($Qpaging->num_rows / $limit);
	if($Qpaging->num_rows > $limit) $this->ifunction->paging($p, base_url().'index.php/main/reports/'.$t.'/', $num_page, $Qpaging->num_rows, 'href', '/'.$s);
	}else{
		echo '<p class="info-box">No data';
		if($search[0]->keyword) echo ' for keyword: <b>'.$search[0]->keyword.'</b>';
		echo '.</p>';
	}
	?>
    </div>
</div>