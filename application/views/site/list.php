<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$filter = '';
if($s):
if($t == 'search'){
	$Qsearch = $this->db->query("SELECT `keyword` FROM `it_search` WHERE `search_id`='$s'");
	if($Qsearch->num_rows){
		$search = $Qsearch->result_object();
		$keyword = str_replace(" ", "%", $search[0]->keyword);
		$filter = " WHERE (`id` LIKE '%$keyword%' OR `name` LIKE '%$keyword%' OR `address` LIKE '%$keyword%' OR `city` LIKE '%$keyword%' OR `province` LIKE '%$keyword%')";
	}
}elseif($t == 'detail'){
	$filter = " WHERE `site_id`='$s'";
}
endif;
?>

<div id="body">
	<div class="container">
    <h1>Management Site <span><form method="post" name="search_box" id="search-box" action="<?php echo base_url() ?>index.php/process/search/site" onsubmit="return searchbox()"><input type="text" name="q" class="searchbox" maxlength="100" placeholder="Search.." value="<?php echo $search[0]->keyword ?>"></form><?php if(in_array($_SESSION['isat']['role'], array('1', '2', '5'), true)) echo ' <a rel="if_url" url="'.base_url().'index.php/form/add/site">+ Create New</a>' ?></span></h1>
    
	<?php
	$limit=15;
	if(empty($p)){
		$position=0;
		$p=1;
	}
	else $position=($p-1) * $limit;
	
	$Qlist = $this->db->query("SELECT `site_id`, `id`, `name`, `latitude`, `longitude` FROM `it_site` $filter ORDER BY `site_id` DESC LIMIT $position, $limit");
    if($Qlist->num_rows){
    ?>
    <table class="tables" width="100%">
    <thead>
    <tr>
    	<?php if(in_array($_SESSION['isat']['role'], array('1', '2', '3', '4', '5'), true)){ ?>
        <th width="210">Action</th>
        <th>Name</th>
        <th width="200">Site ID</th>
        <?php }else{ ?>
        <th width="200">Action</th>
        <th>Name</th>
        <th width="190">Site ID</th>
        <?php } ?>
        <th width="170">Latitude</th>
        <th width="170">Longitude</th>
    </tr>
    </thead>
    <tbody>
		<?php foreach($Qlist->result_object() as $list){ ?>
        <tr id="list_site_<?php echo $list->site_id ?>">
            <td align="center" id="attr_site_<?php echo $list->site_id ?>">
            <?php if(in_array($_SESSION['isat']['role'], array('1', '2', '3', '4', '5'), true)){ ?>
            <?php if($_SESSION['isat']['role']==3) echo '<img src="'.base_url().'static/i/icon_deletex.png" title="Disabled">&nbsp;'; else echo '<a class="remove" id="'.$list->site_id.'" c="site" t="Site"><img src="'.base_url().'static/i/icon_delete.png" title="Remove"></a>&nbsp;' ?>
            <a rel="if_url" url="<?php echo base_url() ?>index.php/form/ed/site/<?php echo $list->site_id ?>"><img src="<?php echo base_url() ?>static/i/icon_edit.png" title="Edit"></a>&nbsp;
            <a rel="if_url" url="<?php echo base_url() ?>index.php/form/ed/neid/<?php echo $list->site_id ?>"><img src="<?php echo base_url() ?>static/i/icon_reply.png" title="Network ID"></a>&nbsp;
            <a rel="if_close" url="<?php echo base_url() ?>index.php/form/part/site/<?php echo $list->id ?>"><img src="<?php echo base_url() ?>static/i/icon_list.png" title="Part List"></a>&nbsp;
            <a rel="if-close" url="<?php echo base_url() ?>index.php/form/photo/site/<?php echo $list->site_id ?>"><img src="<?php echo base_url() ?>static/i/icon_image.png" title="Part Photo"></a>&nbsp;
            <a rel="if-url" url="<?php echo base_url() ?>index.php/form/master/barcode/<?php echo $list->site_id ?>"><img src="<?php echo base_url() ?>static/i/icon_barcode.png" title="Master Barcode"></a>&nbsp;
            <a rel="if-url" url="<?php echo base_url() ?>index.php/form/ed/boq_dpack/<?php echo $list->site_id ?>"><img src="<?php echo base_url() ?>static/i/icon_pdf.png" title="Edit BOQ / Design Pack"></a>&nbsp;
            <a rel="if-url" url="<?php echo base_url() ?>index.php/form/ed/attach/<?php echo $list->site_id ?>"><img src="<?php echo base_url() ?>static/i/icon_attach.gif" title="Edit Attachment"></a>
            <?php }else{ ?>
            <a class="buton" rel="if-url" url="<?php echo base_url() ?>index.php/form/ed/boq_dpack/<?php echo $list->site_id ?>" style="font-size:9px">BOQ/Design Pack</a>
            <a class="butons" rel="if-url" url="<?php echo base_url() ?>index.php/form/ed/attach/<?php echo $list->site_id ?>" style="font-size:9px">Attachment</a>
            <?php } ?>
            </td>
            <td> &nbsp; <?php echo $list->name ?></td>
            <td align="center"><?php echo $list->id ?></td>
            <td align="center"><?php echo $list->latitude ?></td>
            <td align="center"><?php echo $list->longitude ?></td>
        </tr>
        <?php } ?>
    </tbody>
    </table>
    <?php
	$Qpaging = $this->db->query("SELECT `site_id` FROM `it_site`".$filter);
	$num_page = ceil($Qpaging->num_rows / $limit);
	if($Qpaging->num_rows > $limit) $this->ifunction->paging($p, base_url().'index.php/main/site/'.$t.'/', $num_page, $Qpaging->num_rows, 'href', '/'.$s);
	}else{
		echo '<p class="info-box">No data';
		if($search[0]->keyword) echo ' for keyword: <b>'.$search[0]->keyword.'</b>';
		echo '.</p>';
	}
	?>
    </div>
</div>