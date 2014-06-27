<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$filter = '';
if($s && ($t == 'search')){
	$Qsearch = $this->db->query("SELECT `keyword` FROM `it_search` WHERE `search_id`='$s'");
	if($Qsearch->num_rows){
		$search = $Qsearch->result_object();
		$keyword = str_replace(" ", "%", $search[0]->keyword);
		$filter = " AND (`name` LIKE '%$keyword%')";
	}
}

$arr_url = array('vendor_id', 'title');
$arr_field = array('vendor_id', 'name');

$sorted = explode('-', $sort);
if(!in_array($sorted[0], $arr_url, true)) $sorted[0] = 'vendor_id';
if($sorted[1] == 'asc') $sorted[1] = 'asc'; else $sorted[1] = 'desc';
$sorted_0 = str_replace($arr_url, $arr_field, $sorted[0]);
?>

<div id="body">
	<div class="container">
    <h1>Management Vendors <span><form method="post" name="search_box" id="search-box" action="<?php echo base_url() ?>index.php/process/search/vendors" onsubmit="return searchbox()"><input type="text" name="q" class="searchbox" maxlength="100" placeholder="Search.." value="<?php echo $search[0]->keyword ?>"></form> <a rel="if_url" url="<?php echo base_url() ?>index.php/form/add/vendor">+ Create New</a></span></h1>
    
	<?php
	$limit=15;
	if(empty($p)){
		$position=0;
		$p=1;
	}
	else $position=($p-1) * $limit;
	
	$Qlist = $this->db->query("SELECT `vendor_id`, `name` FROM `it_vendor` WHERE `fl_active`=1 $filter ORDER BY $sorted_0 $sorted[1] LIMIT $position, $limit");
    if($Qlist->num_rows){
    ?>
    <table class="tables" width="100%">
    <thead>
    <tr>
        <th width="85">Action</th>
        <th><a href="<?php echo base_url() ?>index.php/main/vendors/<?php echo $t ?>/<?php echo $p ?>/<?php echo $s ?>/<?php if($sort == 'title-desc') echo 'title-asc'; else echo 'title-desc' ?>">Vendor Name</a><?php if($sorted[0] == 'title'){ echo '<span>'; if($sorted[1] == 'asc') echo ' &and;'; else echo ' &or;'; echo '</span>'; } ?></th>
    </tr>
    </thead>
    <tbody>
		<?php foreach($Qlist->result_object() as $list){ ?>
        <tr id="list_vendor_<?php echo $list->vendor_id ?>">
            <td align="center" id="attr_vendor_<?php echo $list->vendor_id ?>">
            <a class="remove" id="<?php echo $list->vendor_id ?>" c="vendor" t="Vendor"><img src="<?php echo base_url() ?>static/i/icon_delete.png" title="Remove"></a> &nbsp;
            <a rel="if_url" url="<?php echo base_url() ?>index.php/form/ed/vendor/<?php echo $list->vendor_id ?>"><img src="<?php echo base_url() ?>static/i/icon_edit.png" title="Edit"></a>
            </td>
            <td> &nbsp; <?php echo $list->name ?></td>
        </tr>
        <?php } ?>
    </tbody>
    </table>
    <?php
	$Qpaging = $this->db->query("SELECT `vendor_id` FROM `it_vendor` WHERE `fl_active`=1".$filter);
	$num_page = ceil($Qpaging->num_rows / $limit);
	if($Qpaging->num_rows > $limit) $this->ifunction->paging($p, base_url().'index.php/main/vendors/'.$t.'/', $num_page, $Qpaging->num_rows, 'href', '/'.$s);
	}else{
		echo '<p class="info-box">No data';
		if($search[0]->keyword) echo ' for keyword: <b>'.$search[0]->keyword.'</b>';
		echo '.</p>';
	}
	?>
    </div>
</div>