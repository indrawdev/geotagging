<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

$filter = '';
if($s && ($t == 'search')){
	$Qsearch = $this->db->query("SELECT `keyword` FROM `it_search` WHERE `search_id`='$s'");
	if($Qsearch->num_rows){
		$search = $Qsearch->result_object();
		$keyword = str_replace(" ", "%", $search[0]->keyword);
		$filter = " AND (a.`uname` LIKE '%$keyword%' OR a.`name` LIKE '%$keyword%' OR a.`email` LIKE '%$keyword%' OR b.`name` LIKE '%$keyword%' OR c.`name` LIKE '%$keyword%' )";
	}
}


$arr_url = array('name', 'usern', 'vendor', 'role');
$arr_field = array('a.name', 'a.uname', 'b.name', 'c.name');

$sorted = explode('-', $sort);
if(!in_array($sorted[0], $arr_url, true)) $sorted[0] = 'a.name';
if($sorted[1] == 'asc') $sorted[1] = 'asc'; else $sorted[1] = 'desc';
$sorted_0 = str_replace($arr_url, $arr_field, $sorted[0]);
?>

<div id="body">
	<div class="container">
    <h1>Management Users <span><form method="post" name="search_box" id="search-box" action="<?php echo base_url() ?>index.php/process/search/users" onsubmit="return searchbox()"><input type="text" name="q" class="searchbox" maxlength="100" placeholder="Search.." value="<?php echo $search[0]->keyword ?>"></form> <a rel="if_url" url="<?php echo base_url() ?>index.php/form/add/user">+ Create New</a></span></h1>
    
	<?php
	$limit=15;
	if(empty($p)){
		$position=0;
		$p=1;
	}
	else $position=($p-1) * $limit;
	
	$Qlist = $this->db->query("
		SELECT a.`user_id`, a.`uname`, a.`name`, a.`role_id`, b.`name` AS `vendor`, c.`name` AS `role`
		FROM `it_user` a
		LEFT JOIN `it_vendor` b ON b.`vendor_id`=a.`vendor_id`
		LEFT JOIN `it_role` c ON c.`role_id`=a.`role_id`
		WHERE a.`fl_active`=1 $filter
		ORDER BY $sorted_0 $sorted[1] LIMIT $position, $limit
	");
    if($Qlist->num_rows){
    ?>
    <table class="tables" width="100%">
    <thead>
    <tr>
        <th width="85">Action</th>
        <th><a href="<?php echo base_url() ?>index.php/main/users/<?php echo $t ?>/<?php echo $p ?>/<?php echo $s ?>/<?php if($sort == 'name-desc') echo 'name-asc'; else echo 'name-desc' ?>">Full Name</a><?php if($sorted[0] == 'name'){ echo '<span>'; if($sorted[1] == 'asc') echo ' &and;'; else echo ' &or;'; echo '</span>'; } ?></th>
        <th width="200"><a href="<?php echo base_url() ?>index.php/main/users/<?php echo $t ?>/<?php echo $p ?>/<?php echo $s ?>/<?php if($sort == 'usern-desc') echo 'usern-asc'; else echo 'usern-desc' ?>">Username</a><?php if($sorted[0] == 'usern'){ echo '<span>'; if($sorted[1] == 'asc') echo ' &and;'; else echo ' &or;'; echo '</span>'; } ?></th>
        <th width="200"><a href="<?php echo base_url() ?>index.php/main/users/<?php echo $t ?>/<?php echo $p ?>/<?php echo $s ?>/<?php if($sort == 'vendor-desc') echo 'vendor-asc'; else echo 'vendor-desc' ?>">Vendor</a><?php if($sorted[0] == 'vendor'){ echo '<span>'; if($sorted[1] == 'asc') echo ' &and;'; else echo ' &or;'; echo '</span>'; } ?></th>
        <th width="200"><a href="<?php echo base_url() ?>index.php/main/users/<?php echo $t ?>/<?php echo $p ?>/<?php echo $s ?>/<?php if($sort == 'role-desc') echo 'role-asc'; else echo 'role-desc' ?>">Role Access</a><?php if($sorted[0] == 'role'){ echo '<span>'; if($sorted[1] == 'asc') echo ' &and;'; else echo ' &or;'; echo '</span>'; } ?></th>
    </tr>
    </thead>
    <tbody>
		<?php foreach($Qlist->result_object() as $list){ ?>
        <tr id="list_user_<?php echo $list->user_id ?>">
            <td align="center" id="attr_user_<?php echo $list->user_id ?>">
            <?php if($_SESSION['isat']['uid']==$list->user_id || $list->user_id=="818086881900137206524637"){ ?><img src="<?php echo base_url() ?>static/i/icon_deletex.png" title="Disabled"> &nbsp;<?php }else{ ?>
            <a class="remove" id="<?php echo $list->user_id ?>" c="user" t="User"><img src="<?php echo base_url() ?>static/i/icon_delete.png" title="Remove"></a> &nbsp;<?php } ?>
            <?php if($list->user_id!="818086881900137206524637"){ ?><a rel="if_url" url="<?php echo base_url() ?>index.php/form/ed/user/<?php echo $list->user_id ?>"><img src="<?php echo base_url() ?>static/i/icon_edit.png" title="Edit"></a><?php } ?>
            </td>
            <td> &nbsp; <?php echo $list->name ?></td>
            <td align="center"><?php echo $list->uname ?></td>
            <td align="center"><?php echo $list->vendor ?></td>
            <td align="center" class="borderleft-<?php echo $list->role_id ?>"><?php if($list->role) { if($list->user_id=="818086881900137206524637") echo 'Programmer'; else echo $list->role; } else echo 'Engineer' ?></td>
        </tr>
        <?php } ?>
    </tbody>
    </table>
    <?php
	$Qpaging = $this->db->query("
		SELECT a.`user_id`
		FROM `it_user` a
		LEFT JOIN `it_vendor` b ON b.`vendor_id`=a.`vendor_id`
		LEFT JOIN `it_role` c ON c.`role_id`=a.`role_id`
		WHERE a.`fl_active`=1 $filter
	");
	$num_page = ceil($Qpaging->num_rows / $limit);
	if($Qpaging->num_rows > $limit) $this->ifunction->paging($p, base_url().'index.php/main/users/'.$t.'/', $num_page, $Qpaging->num_rows, 'href', '/'.$s.'/'.$sort);
	}else{
		echo '<p class="info-box">No data';
		if($search[0]->keyword) echo ' for keyword: <b>'.$search[0]->keyword.'</b>';
		echo '.</p>';
	}
	?>
    </div>
</div>