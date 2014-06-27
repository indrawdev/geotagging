<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

switch($tp){

case 'add_atm': if(!in_array($_SESSION['isat']['role'], array('1', '2'), true)) die(':P') ?>

<style type="text/css">@import url("<?php echo base_url() ?>static/css/proxy.php?f=date");</style>
<script language="javascript" src="<?php echo base_url() ?>static/js/proxy.php?f=date"></script>

<div id="ifbox_body">
    <div class="iheader">Add ATM Task</div>
    <div class="ibody">
        <div id="iforms_r1" style="text-align:center"></div>
        <form action="<?php echo base_url() ?>index.php/process/add_atm" method="post" id="iforms_f1" onSubmit="return iForms_s(1)">
        <table border="0" width="100%"><tbody>
        <tr height="30"><td width="120" class="pt9">Reason (Project)</td><td width="10" class="pt9">:</td><td><input type="text" name="title" class="inputbox w330" maxlength="300"></td></tr>
        <tr height="30"><td class="pt9">Work Type</td><td class="pt9">:</td><td>
        <select name="work_type" class="inputbox w342">
        <?php
        $arr_wt = array(1 => 'Movement', 'Retirement');
        for($i=1; $i < 3; $i++) echo '<option>'.$arr_wt[$i].'</option>';
        ?>
        </select>
        </td></tr>
        <tr height="30"><td class="pt9">ATM Type</td><td class="pt9">:</td><td>
        <select name="atm_type" class="inputbox w342">
        <?php
        $arr_at = array(1 => 'Site to WH', 'Site to Site', 'WH to Site', 'WH to WH');
        for($i=1; $i < 5; $i++) echo '<option>'.$arr_at[$i].'</option>';
        ?>
        </select>
        </td></tr>
        <tr height="30"><td style="font-size:11px">Movement<br />Plan Date</td><td class="pt9">:</td><td><input type="text" name="date" class="inputbox w330 cursor-pointer" readonly autocomplete="off" maxlength="10" onClick="displayDatePicker('date')"></td></tr>
        <tr height="30"><td class="pt9">Division</td><td class="pt9">:</td><td>
        <select name="division" class="inputbox w342">
        <?php
        $arr_div = array('Program management 1 (C&TS)', 'Program management 2 (Core)', 'Program management 3 (RTAP)', 'Program management 4 (TBP)', 'Project Assurance');
        for($i=0; $i < 5; $i++) echo '<option>'.$arr_div[$i].'</option>';
        ?>
        </select>
        </td></tr>
        <tr height="30"><td class="pt9">PO Service No.</td><td class="pt9">:</td><td><input type="text" name="po_no" class="inputbox w330" maxlength="100"></td></tr>
        <tr height="30"><td colspan="3"><h2 style="border-bottom:1px solid #CCC">ORIGIN:</h2></td></tr>
        <tr height="30"><td class="pt9">Site</td><td class="pt9">:</td><td>
        <input type="text" class="inputbox w250 cursor-pointer" name="from_site" readonly onclick='targetitem = document.forms[1].from_site; targetneid = document.forms[1].neid1; targetmaps = document.forms[1].maps1; dataitem = window.open("<?php echo base_url() ?>index.php/form/get_site/1", "dataitem", "toolbar=no, resizable=no, menubar=no, scrollbars=yes, width=470, height=550"); dataitem.targetitem = targetitem; dataitem.targetneid = targetneid; dataitem.targetmaps = targetmaps'><span style="padding:0 0 0 5px"><input type="button" class="buttons" onclick='targetitem = document.forms[1].from_site; targetneid = document.forms[1].neid1; targetmaps = document.forms[1].maps1; dataitem = window.open("<?php echo base_url() ?>index.php/form/get_site/1", "dataitem", "toolbar=no, resizable=no, menubar=no, scrollbars=yes, width=470, height=550"); dataitem.targetitem = targetitem; dataitem.targetneid = targetneid; dataitem.targetmaps = targetmaps' value="Get Site"></span>
        </td></tr>
        <tr height="30"><td class="pt9">Network ID</td><td class="pt9">:</td><td><span id="ne_id1"><select class="inputbox w342" disabled="disabled"><option>Choose Site first..</option></select></span><span id="maps_1"></span></td></tr>
        <tr height="30"><td colspan="3"><h2 style="border-bottom:1px solid #CCC">DESTINATION:</h2></td></tr>
        <tr height="30"><td class="pt9">Site</td><td class="pt9">:</td><td>
        <input type="text" class="inputbox w250 cursor-pointer" name="to_site" readonly onclick='targetitem = document.forms[1].to_site; targetneid = document.forms[1].neid2; targetmaps = document.forms[1].maps2; dataitem = window.open("<?php echo base_url() ?>index.php/form/get_site/2", "dataitem", "toolbar=no, resizable=no, menubar=no, scrollbars=yes, width=470, height=550"); dataitem.targetitem = targetitem; dataitem.targetneid = targetneid; dataitem.targetmaps = targetmaps'><span style="padding:0 0 0 5px"><input type="button" class="buttons" onclick='targetitem = document.forms[1].to_site; targetneid = document.forms[1].neid2; targetmaps = document.forms[1].maps2; dataitem = window.open("<?php echo base_url() ?>index.php/form/get_site/2", "dataitem", "toolbar=no, resizable=no, menubar=no, scrollbars=yes, width=470, height=550"); dataitem.targetitem = targetitem; dataitem.targetneid = targetneid; dataitem.targetmaps = targetmaps' value="Get Site"></span>
        </td></tr>
        <tr height="30"><td class="pt9">Network ID</td><td class="pt9">:</td><td><span id="ne_id2"><select class="inputbox w342" disabled="disabled"><option>Choose Site first..</option></select></span><span id="maps_2"></span></td></tr>
        <tr height="30"><td colspan="3"><h2 style="border-bottom:1px solid #CCC">USERS:</h2></td></tr>
        <tr><td class="pt9">Vendor</td><td class="pt9">:</td><td>
        <select class="inputbox w342" name="vendor" onChange="dochange('user_vendor', this.value, 0)">
        <option value="0">-- Select Vendor:</option>
        <?php
        $Qvendor = $this->db->query("SELECT `vendor_id`, `name` FROM `it_vendor` WHERE `fl_active`=1 ORDER BY `name` ASC");
        if($_SESSION['isat']['role'] == 2){
            foreach($Qvendor->result_object() as $vendor){
                echo '<option value="'.$vendor->vendor_id.'"'; if($vendor->vendor_id == $_SESSION['isat']['vendor']) echo ' selected="selected"'; echo '>'.$vendor->name.'</option>';
            }
        }else{
            foreach($Qvendor->result_object() as $vendor) echo '<option value="'.$vendor->vendor_id.'">'.$vendor->name.'</option>';
        }
        ?>
        </select>
        </td></tr>
        <tr height="30"><td class="pt9">PIC Origin</td><td class="pt9">:</td><td><div id="user_vendor"><select class="inputbox w342" disabled="disabled"><option>Choose Vendor first..</option></select></div></td></tr>
        <tr height="30"><td class="pt9">PIC Destination</td><td class="pt9">:</td><td><div id="user_wh"></div></td></tr>
        <tr height="30"><td class="pt9">Regional / NOM</td><td class="pt9">:</td><td>
        <div id="user_nom" style="display:block"></div>
        <p><label><input type="checkbox" name="mor" value="1" onClick="iFtoggle('user_nom')"> Without Regional / NOM</label></p>
        </td></tr>
        <tr height="30"><td class="pt9">PM Vendor</td><td class="pt9">:</td><td><div id="user_spv"></div></td></tr>
        <tr height="30"><td class="pt9">Consultant</td><td class="pt9">:</td><td>
        <div id="user_consultant" style="display:block"></div>
        <p><label><input type="checkbox" name="nor" value="1" onClick="iFtoggle('user_consultant')"> Without Consultant</label></p>
        </td></tr>
        <tr height="30"><td class="pt9">PM Indosat</td><td class="pt9">:</td><td class="pt9">
        <?php
		$ic = 0;
		$Qlist = $this->db->query("SELECT `user_id`, `name` FROM  `it_user` WHERE `fl_active`=1 AND `role_id`=4 ORDER BY `name` ASC");
		foreach($Qlist->result_object() as $list){
			if($ic == 1) echo ', '; else echo '<input type="hidden" name="user_indosat" value="'.$list->user_id.'">';
			echo $list->name;
			$ic = 1;
		}
		?>
        <!--div id="user_indosat"></div-->
        </td></tr>
        <tr height="30"><td colspan="3"><h2 style="border-bottom:1px solid #CCC">FILES:</h2></td></tr>
        <!--tr><td class="pt5">TTSR</td><td class="pt5">:</td><td><input type="file" name="file_ttsr" class="inputbox"></td></tr-->
        <tr><td class="pt5">Dismantle Plan</td><td class="pt5">:</td><td><input type="file" name="file_dismantle" class="inputbox"></td></tr>
        <tr><td class="pt5">Others..</td><td class="pt5">:</td><td><input type="file" name="file_other" class="inputbox"></td></tr>
        </tbody></table>
        <script type="text/javascript">
        <?php if($_SESSION['isat']['role'] == 2){ ?>
        dochange('user_vendor', <?php echo '\''.$_SESSION['isat']['vendor'].'\', 0' ?>);
        dochange('user_spv', <?php echo '\''.$_SESSION['isat']['vendor'].'\', \''.$_SESSION['isat']['uid'].'\', 1' ?>);
        <?php }else{ ?>
        dochange('user_spv', 1, 0);
        <?php } ?>
        dochange('user_wh', 1, 0);
        dochange('user_nom', 1, 0);
        dochange('user_consultant', 1, 0);
        //dochange('user_indosat', 1, 0);
        </script>
        <a class="display-none" id="neids1" onClick="do_change('ne_id1', 'neid1');do_change('maps_1', 'maps1')">neid</a>
        <a class="display-none" id="neids2" onClick="do_change('ne_id2', 'neid2');do_change('maps_2', 'maps2')">neid</a>
        <div class="ifooter">
        <input type="hidden" id="neid1" name="neid1">
        <input type="hidden" id="maps1" name="maps1">
        <input type="hidden" id="neid2" name="neid2">
        <input type="hidden" id="maps2" name="maps2">
        <input type="hidden" id="timereload" value="2">
        <input type="submit" class="button" value="Submit"> 
        <input type="button" class="buttons ifclose" value="Close">
        </div>
        </form>
	</div>
</div>

<?php
break;

case 'ed_atm': if(!in_array($_SESSION['isat']['role'], array('1', '2'), true)) die(':P');
$Qcheck = $this->db->query("
	SELECT a.`fl_barcode`, a.`title`, a.`atf_no`, a.`work_type`, a.`atm_type`, a.`date`, a.`division`, a.`po_no`, a.`file_ttsr`, a.`file_dismantle`, a.`file_other`, a.`from_neid`, a.`to_neid`, a.`vendor_id`, a.`owner_id`, a.`user_wh`, a.`user_nom`, a.`user_vendor`, a.`user_consultant`, a.`user_indosat`, a.`fl_active`, b.`idx`, c.`site_id` AS `from_sid`, c.`id` AS `from_id`, c.`latitude` AS `from_lat`, c.`longitude` AS `from_lon`, d.`site_id` AS `to_sid`, d.`id` AS `to_id`, d.`latitude` AS `to_lat`, d.`longitude` AS `to_lon`
	FROM `it_atm` a
	LEFT JOIN `it_checkin` b ON b.`idx`=a.`atm_id` AND b.`table`='atm'
	LEFT JOIN `it_site` c ON c.`site_id`=a.`from_site`
	LEFT JOIN `it_site` d ON d.`site_id`=a.`to_site`
	WHERE a.`atm_id`='$dx'
");
if($Qcheck) $check = $Qcheck->result_object(); else exit('Forbidden!');
if($check[0]->fl_barcode == 1) $disabled = ' disabled="disabled"'; else $disabled = '' ?>

<style type="text/css">@import url("<?php echo base_url() ?>static/css/proxy.php?f=date");</style>
<script language="javascript" src="<?php echo base_url() ?>static/js/proxy.php?f=date"></script>

<div id="ifbox_body">
    <div class="iheader">Edit ATM Task</div>
    <div class="ibody">
        <div id="iforms_r1" style="text-align:center"></div>
        <?php if(!$disabled) echo '<form action="'.base_url().'index.php/process/ed_atm/'.$dx.'" method="post" id="iforms_f1" onSubmit="return iForms_s(1)">' ?>
        <table border="0" width="100%"><tbody>
        <tr height="30"><td width="120" class="pt9">Reason (Project)</td><td width="10" class="pt9">:</td><td><input type="text" name="title" class="inputbox w330" maxlength="300" value="<?php echo $check[0]->title ?>"<?php echo $disabled ?>></td></tr>
        <tr height="30"><td class="pt9">Work Type</td><td class="pt9">:</td><td>
        <select name="work_type" class="inputbox w342"<?php echo $disabled ?>>
        <?php
        $arr_wt = array(1 => 'Movement', 'Retirement');
        for($i=1; $i < 3; $i++){
            echo '<option'; if($arr_wt[$i] == $check[0]->work_type) echo ' selected="selected"'; echo '>'.$arr_wt[$i].'</option>';
        }
        ?>
        </select>
        </td></tr>
        <tr height="30"><td class="pt9">ATM Type</td><td class="pt9">:</td><td>
        <select name="atm_type" class="inputbox w342"<?php echo $disabled ?>>
        <?php
        $arr_at = array(1 => 'Site to WH', 'Site to Site', 'WH to Site', 'WH to WH');
        for($i=1; $i < 5; $i++){
            echo '<option'; if($arr_at[$i] == $check[0]->atm_type) echo ' selected="selected"'; echo '>'.$arr_at[$i].'</option>';
        }
        ?>
        </select>
        </td></tr>
        <tr height="30"><td style="font-size:11px">Movement<br />Plan Date</td><td class="pt9">:</td><td><input type="text" name="date" class="inputbox w330 cursor-pointer" readonly autocomplete="off" maxlength="10" onClick="displayDatePicker('date')" value="<?php echo $check[0]->date ?>"<?php echo $disabled ?>></td></tr>
        <tr height="30"><td class="pt9">Division</td><td class="pt9">:</td><td>
        <select name="division" class="inputbox w342"<?php echo $disabled ?>>
        <?php
        $arr_div = array('Program management 1 (C&TS)', 'Program management 2 (Core)', 'Program management 3 (RTAP)', 'Program management 4 (TBP)', 'Project Assurance');
        for($i=0; $i < 5; $i++){
            echo '<option'; if($arr_div[$i] == $check[0]->division) echo ' selected="selected"'; echo '>'.$arr_div[$i].'</option>';
        }
        ?>
        </select>
        </td></tr>
        <tr height="30"><td class="pt9">PO Service No.</td><td class="pt9">:</td><td><input type="text" name="po_no" class="inputbox w330" maxlength="100" value="<?php echo $check[0]->po_no ?>"<?php echo $disabled ?>></td></tr>
        <tr height="30"><td colspan="3"><h2 style="border-bottom:1px solid #CCC">ORIGIN:</h2></td></tr>
        <tr height="30"><td class="pt9">Site</td><td class="pt9">:</td><td>
        <?php if($disabled){ echo '<input type="text" class="inputbox w330" value="'.$check[0]->from_id.'" disabled>'; }else{ ?>
        <input type="text" class="inputbox w250 cursor-pointer" name="from_site" readonly value="<?php echo $check[0]->from_id ?>|<?php echo $check[0]->from_sid ?>" onclick='targetitem = document.forms[1].from_site; targetneid = document.forms[1].neid1; targetmaps = document.forms[1].maps1; dataitem = window.open("<?php echo base_url() ?>index.php/form/get_site/1", "dataitem", "toolbar=no, resizable=no, menubar=no, scrollbars=yes, width=470, height=550"); dataitem.targetitem = targetitem; dataitem.targetneid = targetneid; dataitem.targetmaps = targetmaps'><span style="padding:0 0 0 5px"><input type="button" class="buttons" onclick='targetitem = document.forms[1].from_site; targetneid = document.forms[1].neid1; targetmaps = document.forms[1].maps1; dataitem = window.open("<?php echo base_url() ?>index.php/form/get_site/1", "dataitem", "toolbar=no, resizable=no, menubar=no, scrollbars=yes, width=470, height=550"); dataitem.targetitem = targetitem; dataitem.targetneid = targetneid; dataitem.targetmaps = targetmaps' value="Get Site"></span>
        <?php } ?>
        </td></tr>
        <tr height="30"><td class="pt9">Network ID</td><td class="pt9">:</td><td><span id="ne_id1"><select class="inputbox w342" disabled="disabled"><option>Choose Site first..</option></select></span><span id="maps_1"></span></td></tr>
        <tr height="30"><td colspan="3"><h2 style="border-bottom:1px solid #CCC">DESTINATION:</h2></td></tr>
        <tr height="30"><td class="pt9">Site</td><td class="pt9">:</td><td>
        <?php if($disabled){ echo '<input type="text" class="inputbox w330" value="'.$check[0]->to_id.'" disabled>'; }else{ ?>
        <input type="text" class="inputbox w250 cursor-pointer" name="to_site" readonly value="<?php echo $check[0]->to_id ?>|<?php echo $check[0]->to_sid ?>" onclick='targetitem = document.forms[1].to_site; targetneid = document.forms[1].neid2; targetmaps = document.forms[1].maps2; dataitem = window.open("<?php echo base_url() ?>index.php/form/get_site/2", "dataitem", "toolbar=no, resizable=no, menubar=no, scrollbars=yes, width=470, height=550"); dataitem.targetitem = targetitem; dataitem.targetneid = targetneid; dataitem.targetmaps = targetmaps'><span style="padding:0 0 0 5px"><input type="button" class="buttons" onclick='targetitem = document.forms[1].to_site; targetneid = document.forms[1].neid2; targetmaps = document.forms[1].maps2; dataitem = window.open("<?php echo base_url() ?>index.php/form/get_site/2", "dataitem", "toolbar=no, resizable=no, menubar=no, scrollbars=yes, width=470, height=550"); dataitem.targetitem = targetitem; dataitem.targetneid = targetneid; dataitem.targetmaps = targetmaps' value="Get Site"></span>
        <?php } ?>
        </td></tr>
        <tr height="30"><td class="pt9">Network ID</td><td class="pt9">:</td><td><span id="ne_id2"><select class="inputbox w342" disabled="disabled"><option>Choose Site first..</option></select></span><span id="maps_2"></span></td></tr>
        <tr height="30"><td colspan="3"><h2 style="border-bottom:1px solid #CCC">USERS:</h2></td></tr>
        <tr><td class="pt9">Vendor</td><td class="pt9">:</td><td>
        <select class="inputbox w342" name="vendor" onChange="dochange('user_vendor', this.value, 0)"<?php echo $disabled ?>>
        <option value="0">-- Select Vendor:</option>
        <?php
        $Qvendor = $this->db->query("SELECT `vendor_id`, `name` FROM `it_vendor` WHERE `fl_active`=1 ORDER BY `name` ASC");
        foreach($Qvendor->result_object() as $vendor){
            echo '<option value="'.$vendor->vendor_id.'"'; if($vendor->vendor_id == $check[0]->vendor_id) echo ' selected="selected"'; echo '>'.$vendor->name.'</option>';
        }
        ?>
        </select>
        </td></tr>
        <tr height="30"><td class="pt9">PIC Origin</td><td class="pt9">:</td><td><div id="user_vendor"></div></td></tr>
        <tr height="30"><td class="pt9">PIC Destination</td><td class="pt9">:</td><td><div id="user_wh"></div></td></tr>
        <tr height="30"><td class="pt9">Regional / NOM</td><td class="pt9">:</td><td>
		<?php
        if($check[0]->user_nom){
            echo '<div id="user_nom" style="display:block"></div>';
            echo '<p><label><input type="checkbox" name="mor" value="1" onClick="iFtoggle(\'user_nom\')"'.$disabled.'> Without Regional / NOM</label></p>';
        }else{
            echo '<div id="user_nom" style="display:none"></div>';
            echo '<p><label><input type="checkbox" name="mor" value="1" onClick="iFtoggle(\'user_nom\')" checked="checked"'.$disabled.'> Without Regional / NOM</label></p>';
        }
        ?>
        </td></tr>
        <tr height="30"><td class="pt9">PM Vendor</td><td class="pt9">:</td><td><div id="user_spv"></div></td></tr>
        <tr height="30"><td class="pt9">Consultant</td><td class="pt9">:</td><td>
		<?php
        if($check[0]->user_consultant){
            echo '<div id="user_consultant" style="display:block"></div>';
            echo '<p><label><input type="checkbox" name="nor" value="1" onClick="iFtoggle(\'user_consultant\')"'.$disabled.'> Without Consultant</label></p>';
        }else{
            echo '<div id="user_consultant" style="display:none"></div>';
            echo '<p><label><input type="checkbox" name="nor" value="1" onClick="iFtoggle(\'user_consultant\')" checked="checked"'.$disabled.'> Without Consultant</label></p>';
        }
        ?>
        </td></tr>
        <tr height="30"><td class="pt9">PM Indosat</td><td class="pt9">:</td><td class="pt9">
        <?php
		$ic = 0;
		$Qlist = $this->db->query("SELECT `user_id`, `name` FROM  `it_user` WHERE `fl_active`=1 AND `role_id`=4 ORDER BY `name` ASC");
		foreach($Qlist->result_object() as $list){
			if($ic == 1) echo ', ';
			echo $list->name;
			$ic = 1;
		}
		echo '<input type="hidden" name="user_indosat" value="'.$check[0]->user_indosat.'">';
		?>
        <!--div id="user_indosat"></div-->
        </td></tr>
        <tr height="30"><td colspan="3"><h2 style="border-bottom:1px solid #CCC">FILES:</h2></td></tr>
        <!--tr><td class="pt5">TTSR</td><td class="pt5">:</td><td><?php if(!$disabled) echo '<input type="file" name="file_ttsr" class="inputbox">'; if($check[0]->file_ttsr) echo ' &raquo; <a href="'.base_url().'media/files/'.$check[0]->file_ttsr.'" target="_blank">View</a>' ?></td></tr-->
        <tr><td class="pt5">Dismantle Plan</td><td class="pt5">:</td><td><?php if(!$disabled) echo '<input type="file" name="file_dismantle" class="inputbox">'; if($check[0]->file_dismantle) echo ' &raquo; <a href="'.base_url().'media/files/'.$check[0]->file_dismantle.'" target="_blank">View</a>' ?></td></tr>
        <tr><td class="pt5">Others..</td><td class="pt5">:</td><td><?php if(!$disabled) echo '<input type="file" name="file_other" class="inputbox">'; if($check[0]->file_other) echo ' &raquo; <a href="'.base_url().'media/files/'.$check[0]->file_other.'" target="_blank">View</a>' ?></td></tr>
        </tbody></table>
        <script type="text/javascript">
        dochange('ne_id1', '<?php echo $check[0]->from_id."', '".$check[0]->from_neid ?>'<?php if($disabled) echo ', 1' ?>);
        dochange('maps_1', '<?php echo $check[0]->from_sid.'_'.$this->ifunction->encode($check[0]->from_lat.'|'.$check[0]->from_lon) ?>');
        dochange('ne_id2', '<?php echo $check[0]->to_id."', '".$check[0]->to_neid ?>'<?php if($disabled) echo ', 1' ?>);
        dochange('maps_2', '<?php echo $check[0]->to_sid.'_'.$this->ifunction->encode($check[0]->to_lat.'|'.$check[0]->to_lon) ?>');
        dochange('user_vendor', '<?php echo $check[0]->vendor_id."', '".$check[0]->owner_id ?>'<?php if($disabled) echo ', 1' ?>);
        dochange('user_wh', 1, '<?php echo $check[0]->user_wh ?>'<?php if($disabled) echo ', 1' ?>);
        dochange('user_nom', 1, '<?php echo $check[0]->user_nom ?>'<?php if($disabled) echo ', 1' ?>);
        dochange('user_spv', 1, '<?php echo $check[0]->user_vendor ?>'<?php if($disabled) echo ', 1' ?>);
        dochange('user_consultant', 1, '<?php echo $check[0]->user_consultant ?>'<?php if($disabled) echo ', 1' ?>);
        //dochange('user_indosat', 1, '<?php echo $check[0]->user_indosat ?>'<?php if($disabled) echo ', 1' ?>);
        </script>
        <a class="display-none" id="neids1" onClick="do_change('ne_id1', 'neid1');do_change('maps_1', 'maps1')">neid</a>
        <a class="display-none" id="neids2" onClick="do_change('ne_id2', 'neid2');do_change('maps_2', 'maps2')">neid</a>
        <div class="ifooter">
        <input type="hidden" id="neid1" name="neid1">
        <input type="hidden" id="maps1" name="maps1">
        <input type="hidden" id="neid2" name="neid2">
        <input type="hidden" id="maps2" name="maps2">
        <!--input type="hidden" name="old_ttsr" value="<?php echo $check[0]->file_ttsr ?>"-->
        <input type="hidden" name="old_dismantle" value="<?php echo $check[0]->file_dismantle ?>">
        <input type="hidden" name="old_other" value="<?php echo $check[0]->file_other ?>">
        <input type="hidden" id="timereload" value="2">
        <input type="submit" class="button" value="Save Changes"> 
        <input type="button" class="buttons ifclose" value="Close">
        </div>
        <?php echo '</form>' ?>
	</div>
</div>

<?php
break;

case 'view_atm':
$Qcheck = $this->db->query("
	SELECT a.`title`, a.`atf_no`, a.`work_type`, a.`atm_type`, a.`date`, a.`division`, a.`po_no`, a.`file_ttsr`, a.`file_dismantle`, a.`file_other`, a.`from_neid`, a.`to_neid`, a.`owner_id`, a.`user_wh`, a.`user_nom`, a.`user_vendor`, a.`user_consultant`, a.`user_indosat`, a.`fl_active`, b.`idx`, c.`site_id` AS `from_sid`, c.`id` AS `from_id`, c.`latitude` AS `from_lat`, c.`longitude` AS `from_lon`, d.`site_id` AS `to_sid`, d.`id` AS `to_id`, d.`latitude` AS `to_lat`, d.`longitude` AS `to_lon`, e.`vendor_id`, e.`name` AS `vendor_name`
	FROM `it_atm` a
	LEFT JOIN `it_checkin` b ON b.`idx`=a.`atm_id` AND b.`table`='atm'
	LEFT JOIN `it_site` c ON c.`site_id`=a.`from_site`
	LEFT JOIN `it_site` d ON d.`site_id`=a.`to_site`
	LEFT JOIN `it_vendor` e ON e.`vendor_id`=a.`vendor_id`
	WHERE a.`atm_id`='$dx'
");
if($Qcheck) $check = $Qcheck->result_object(); else exit('Forbidden!') ?>

<style type="text/css">@import url("<?php echo base_url() ?>static/css/proxy.php?f=date");</style>
<script language="javascript" src="<?php echo base_url() ?>static/js/proxy.php?f=date"></script>

<div id="ifbox_body">
    <div class="iheader">ATM Task</div>
    <div class="ibody">
        <table border="0" width="100%"><tbody>
        <tr height="30"><td width="120" class="pt9">Reason (Project)</td><td width="10" class="pt9">:</td><td><input type="text" disabled class="inputbox w330" value="<?php echo $check[0]->title ?>"></td></tr>
        <tr height="30"><td class="pt9">ATF No</td><td class="pt9">:</td><td><input type="text" disabled class="inputbox w330" value="<?php echo $check[0]->atf_no ?>"></td></tr>
        <tr height="30"><td class="pt9">Work Type</td><td class="pt9">:</td><td><select disabled class="inputbox w342"><option><?php echo $check[0]->work_type ?></option></select></td></tr>
        <tr height="30"><td class="pt9">ATM Type</td><td class="pt9">:</td><td><select disabled class="inputbox w342"><option><?php echo $check[0]->atm_type ?></option></select></td></tr>
        <tr height="30"><td class="pt9">Movement Date</td><td class="pt9">:</td><td><input type="text" disabled class="inputbox w330" value="<?php echo $check[0]->date ?>"></td></tr>
        <tr height="30"><td class="pt9">Division</td><td class="pt9">:</td><td><select disabled class="inputbox w342"><option><?php echo $check[0]->division ?></option></select></td></tr>
        <tr height="30"><td class="pt9">PO Service No.</td><td class="pt9">:</td><td><input type="text" disabled class="inputbox w330" value="<?php echo $check[0]->po_no ?>"></td></tr>
        <tr height="30"><td colspan="3"><h2 style="border-bottom:1px solid #CCC">ORIGIN:</h2></td></tr>
        <tr height="30"><td class="pt9">Site</td><td class="pt9">:</td><td><input type="text" class="inputbox w330" disabled value="<?php echo $check[0]->from_id ?>|<?php echo $check[0]->from_sid ?>"></td></tr>
        <tr height="30"><td class="pt9">Network ID</td><td class="pt9">:</td><td><span id="ne_id1"><select class="inputbox w342" disabled="disabled"><option>Choose Site first..</option></select></span><span id="maps_1"></span></td></tr>
        <tr height="30"><td colspan="3"><h2 style="border-bottom:1px solid #CCC">DESTINATION:</h2></td></tr>
        <tr height="30"><td class="pt9">Site</td><td class="pt9">:</td><td><input type="text" class="inputbox w330" disabled value="<?php echo $check[0]->to_id ?>|<?php echo $check[0]->to_sid ?>"></td></tr>
        <tr height="30"><td class="pt9">Network ID</td><td class="pt9">:</td><td><span id="ne_id2"><select class="inputbox w342" disabled="disabled"><option>Choose Site first..</option></select></span><span id="maps_2"></span></td></tr>
        <tr height="30"><td colspan="3"><h2 style="border-bottom:1px solid #CCC">USERS:</h2></td></tr>
        <tr><td class="pt9">Vendor</td><td class="pt9">:</td><td><select class="inputbox w342" disabled><option><?php echo $check[0]->vendor_name ?></option></select></td></tr>
        <tr height="30"><td class="pt9">PIC Origin</td><td class="pt9">:</td><td><div id="user_vendor"></div></td></tr>
        <tr height="30"><td class="pt9">PIC Destination</td><td class="pt9">:</td><td><div id="user_wh"></div></td></tr>
        <tr height="30"><td class="pt9">Regional / NOM</td><td class="pt9">:</td><td>
		<?php
        if($check[0]->user_nom){
            echo '<div id="user_nom" style="display:block"></div>';
			//echo '<p><label><input type="checkbox" name="mor" value="1" onClick="iFtoggle(\'user_nom\')" disabled> Without Regional / NOM</label></p>';
        }else{
            echo '<div id="user_nom" style="display:none"></div>';
            echo '<p><label><input type="checkbox" name="mor" value="1" onClick="iFtoggle(\'user_nom\')" checked="checked" disabled> Without Regional / NOM</label></p>';
        }
        ?>
        </td></tr>
        <tr height="30"><td class="pt9">PM Vendor</td><td class="pt9">:</td><td><div id="user_spv"></div></td></tr>
        <tr height="30"><td class="pt9">Consultant</td><td class="pt9">:</td><td>
		<?php
        if($check[0]->user_consultant){
            echo '<div id="user_consultant" style="display:block"></div>';
			//echo '<p><label><input type="checkbox" name="nor" value="1" onClick="iFtoggle(\'user_consultant\')" disabled> Without Consultant</label></p>';
        }else{
            echo '<div id="user_consultant" style="display:none"></div>';
            echo '<p><label><input type="checkbox" name="nor" value="1" onClick="iFtoggle(\'user_consultant\')" checked="checked" disabled> Without Consultant</label></p>';
        }
        ?>
        </td></tr>
        <tr height="30"><td class="pt9">PM Indosat</td><td class="pt9">:</td><td class="pt9">
        <?php
		$ic = 0;
		$Qlist = $this->db->query("SELECT `user_id`, `name` FROM  `it_user` WHERE `fl_active`=1 AND `role_id`=4 ORDER BY `name` ASC");
		foreach($Qlist->result_object() as $list){
			if($ic == 1) echo ', ';
			echo $list->name;
			$ic = 1;
		}
		?>
        <!--div id="user_indosat"></div-->
        </td></tr>
        <tr height="30"><td colspan="3"><h2 style="border-bottom:1px solid #CCC">FILES:</h2></td></tr>
        <!--tr><td class="pt5">TTSR</td><td class="pt5">:</td><td class="pt5"><?php if($check[0]->file_ttsr) echo ' &raquo; <a href="'.base_url().'media/files/'.$check[0]->file_ttsr.'" target="_blank">View TTSR</a>'; else echo '-' ?></td></tr-->
        <tr><td class="pt5">Dismantle Plan</td><td class="pt5">:</td><td class="pt5"><?php if($check[0]->file_dismantle) echo ' &raquo; <a href="'.base_url().'media/files/'.$check[0]->file_dismantle.'" target="_blank">View Dismantle Plan file</a>'; else echo '-' ?></td></tr>
        <tr><td class="pt5">Others..</td><td class="pt5">:</td><td class="pt5"><?php if($check[0]->file_other) echo ' &raquo; <a href="'.base_url().'media/files/'.$check[0]->file_other.'" target="_blank">View Other file</a>'; else echo '-' ?></td></tr>
        </tbody></table>
        <script type="text/javascript">
        dochange('ne_id1', '<?php echo $check[0]->from_id ?>', '<?php echo $check[0]->from_neid ?>', 1);
        dochange('maps_1', '<?php echo $check[0]->from_sid.'_'.$this->ifunction->encode($check[0]->from_lat.'|'.$check[0]->from_lon) ?>');
        dochange('ne_id2', '<?php echo $check[0]->to_id ?>', '<?php echo $check[0]->to_neid ?>', 1);
        dochange('maps_2', '<?php echo $check[0]->to_sid.'_'.$this->ifunction->encode($check[0]->to_lat.'|'.$check[0]->to_lon) ?>');
        dochange('user_vendor', '<?php echo $check[0]->vendor_id ?>', '<?php echo $check[0]->owner_id ?>', 1);
        dochange('user_wh', 1, '<?php echo $check[0]->user_wh ?>', 1);
        dochange('user_nom', 1, '<?php echo $check[0]->user_nom ?>', 1);
        dochange('user_spv', 1, '<?php echo $check[0]->user_vendor ?>', 1);
        dochange('user_consultant', 1, '<?php echo $check[0]->user_consultant ?>', 1);
        //dochange('user_indosat', 1, '<?php echo $check[0]->user_indosat ?>', 1);
        </script>
        <div class="ifooter"><input type="button" class="buttons ifclose" value="Close"></div>
	</div>
</div>

<?php
break;

case 'atm_done': ?>

<div id="ifbox_body">
    <div class="iheader">ATM Task Resume</div>
    <div class="ibody">
       <?php
		$Qtaskcheckin = $this->db->query("
			SELECT a.`latitude`, a.`longitude`, a.`timelog`, a.`imei`, b.`name`, c.`name` AS `vendor`, d.`files`, e.`atf_date`, f.`latitude` AS `latitude_b`, f.`longitude` AS `longitude_b`, h.`latitude` AS `latitude_c`, h.`longitude` AS `longitude_c`
			FROM `it_checkin` a
			JOIN `it_user` b ON b.`user_id`=a.`user_id`
			JOIN `it_vendor` c ON c.`vendor_id`=b.`vendor_id` AND c.`fl_active`=1
			LEFT JOIN `it_attachment` d ON d.`table`='atm_checkin' AND d.`user_id`=a.`user_id` AND d.`idx`=a.`idx`
			JOIN `it_atm` e ON e.`atm_id`=a.`idx`
			JOIN `it_site` f ON f.`site_id`=e.`from_site`
			JOIN `it_site` h ON h.`site_id`=e.`to_site`
			WHERE a.`table`='atm' AND a.`idx`='$dx'
		");
		$taskcheckin = $Qtaskcheckin->result_object();
		$la = $this->ifunction->DECtoDMS($taskcheckin[0]->latitude); $lo = $this->ifunction->DECtoDMS($taskcheckin[0]->longitude);
		$lat = $this->ifunction->DECtoDMS($taskcheckin[0]->latitude_b); $lon = $this->ifunction->DECtoDMS($taskcheckin[0]->longitude_b) ?>
        <h2 style="border-bottom:1px solid #CCC;margin:10px 0">CHECK-IN STATUS</h2>
        <table border="0" width="100%"><tbody>
        <tr height="30"><td width="90">Checked by</td><td width="10">:</td><td><?php echo $taskcheckin[0]->name ?></td></tr>
        <tr><td>Check-in Time</td><td>:</td><td>
        <?php echo date('d F Y - H:i', $taskcheckin[0]->timelog) ?>
        <table style="margin:5px 0 10px 0">
        <tr><td width="65">Latitude</td><td>: <?php echo $la["deg"] ?>&deg; <?php echo $la["min"] ?>' <?php echo $la["sec"] ?>" (<?php echo $taskcheckin[0]->latitude ?>)</td></tr>
        <tr><td>Longitude</td><td>: <?php echo $lo["deg"] ?>&deg; <?php echo $lo["min"] ?>' <?php echo $lo["sec"] ?>" (<?php echo $taskcheckin[0]->longitude ?>)</td></tr>
        </table>
        </td></tr>
        <tr height="30"><td>Photo</td><td>:</td><td>
		<?php if($taskcheckin[0]->files) echo '<a href="'.base_url().'media/files/'.$taskcheckin[0]->files.'" target="_blank">Engineer Checkin</a>' ?>
        </td></tr>
        <tr height="30"><td>Vendor</td><td>:</td><td><?php echo $taskcheckin[0]->vendor ?></td></tr>
        <tr height="30"><td>Device IMEI</td><td>:</td><td><?php echo $taskcheckin[0]->imei ?></td></tr>
        </tbody></table>
        <div id="atm_<?php echo $dx ?>"><a class="maps_detail" id="<?php echo $dx ?>" c="atm" dx="2" geo="<?php echo $taskcheckin[0]->latitude.':'.$taskcheckin[0]->longitude.':'.$taskcheckin[0]->latitude_b.':'.$taskcheckin[0]->longitude_b ?>"><img style="border:1px solid #D3D3D3;background:url(http://maps.google.com/maps/api/staticmap?size=450x140&markers=color:0xBC1010|<?php echo $taskcheckin[0]->latitude ?>,<?php echo $taskcheckin[0]->longitude ?>&zoom=15&sensor=false) center center;width:450px;height:90px" src="<?php echo base_url() ?>static/i/spacer.gif"></a></div>
        
        <h2 style="border-bottom:1px solid #CCC;margin:10px 0">ABOUT TASK</h2>
       <table border="0" width="100%"><tbody>
       <tr height="30"><td width="90">ATF Date</td><td width="10">:</td><td><?php echo date('d F Y - H:i', strtotime($taskcheckin[0]->atf_date)) ?></td></tr>
       </tbody></table>
       
        <p align="center" style="color:#F00;font-size:14px">ATF Report</p>
        <p align="center">
        <a class="buton" onClick="window.location.href='<?php echo base_url() ?>index.php/process/pdf/export/atm/atf/<?php echo $dx ?>'">Download</a>
        <a class="butons" onclick='window.open("<?php echo base_url() ?>index.php/process/pdf/html/atm/atf/<?php echo $dx ?>", "atf_<?php echo $dx ?>", "toolbar=no, resizable=no, menubar=no, scrollbars=yes, width=990, height=700")'>Preview</a>
        </p>
    	
		<div class="ifooter"><input type="button" class="buttons ifclose" value="Close"></div>
	</div>
</div>

<?php
break;

case 'add_atp': if(!in_array($_SESSION['isat']['role'], array('1', '2'), true)) die(':P') ?>

<style type="text/css">@import url("<?php echo base_url() ?>static/css/proxy.php?f=date");</style>
<script language="javascript" src="<?php echo base_url() ?>static/js/proxy.php?f=date"></script>

<div id="ifbox_body">
    <div class="iheader">Add ATP Task</div>
    <div class="ibody">
        <div id="iforms_r1" style="text-align:center"></div>
        <form action="<?php echo base_url() ?>index.php/process/add_atp" method="post" id="iforms_f1" onSubmit="return iForms_s(1)">
        <table border="0" width="100%"><tbody>
        <tr height="30"><td width="120" class="pt9">Task Title</td><td width="10" class="pt9">:</td><td><input type="text" maxlength="300" class="inputbox w330" name="title"></td></tr>
        <tr height="30"><td class="pt9">Doc</td><td class="pt9">:</td><td>
        <select name="brand" class="inputbox w342">
        <option value="">-- Select Doc:</option>
        <?php
        $arr_brand = array('miniMCE', 'atpFilter', 'atpPowersupply', 'ericsson2G', 'ericsson3G', 'ericssonMicrowave'/*, 'zteMicrowave', 'zte2G', 'zte3G'*/);
        $arr_brands = array('Mini CME', 'ATP Filter', 'ATP Power Supply', 'Ericsson 2G', 'Ericsson 3G', 'Microwave Ericsson'/*, 'Microwave ZTE', 'ZTE 2G', 'ZTE 3G'*/);
        for($i=0; $i < 6; $i++)  echo '<option value="'.$arr_brand[$i].'">'.$arr_brands[$i].'</option>';
        ?>
        </select>
        </td></tr>
        <tr height="30"><td class="pt9">Site</td><td class="pt9">:</td><td>
        <input type="text" class="inputbox w250 cursor-pointer" name="site" readonly onclick='targetitem = document.forms[1].site; targetneid = document.forms[1].neid1; targetmaps = document.forms[1].maps1; dataitem = window.open("<?php echo base_url() ?>index.php/form/get_site/1", "dataitem", "toolbar=no, resizable=no, menubar=no, scrollbars=yes, width=470, height=550"); dataitem.targetitem = targetitem; dataitem.targetneid = targetneid; dataitem.targetmaps = targetmaps'><span style="padding:0 0 0 5px"><input type="button" class="buttons" onclick='targetitem = document.forms[1].site; targetneid = document.forms[1].neid1; targetmaps = document.forms[1].maps1; dataitem = window.open("<?php echo base_url() ?>index.php/form/get_site/1", "dataitem", "toolbar=no, resizable=no, menubar=no, scrollbars=yes, width=470, height=550"); dataitem.targetitem = targetitem; dataitem.targetneid = targetneid; dataitem.targetmaps = targetmaps' value="Get Site"></span>
        </td></tr>
        <tr height="30"><td class="pt9">Network ID</td><td class="pt9">:</td><td><span id="ne_id1"><select class="inputbox w342" disabled="disabled"><option>Choose Site first..</option></select></span><span id="maps_1"></span></td></tr>
        <tr><td class="pt9">Vendor</td><td class="pt9">:</td><td>
        <select name="vendor" class="inputbox w342" onChange="dochange('user_vendor', this.value, 0)">
        <option value="0"></option>
        <?php
        $Qlist = $this->db->query("SELECT `vendor_id`, `name` FROM `it_vendor` WHERE `fl_active`=1 ORDER BY `name` ASC");
        if($_SESSION['isat']['role'] == 2){
            foreach($Qlist->result_object() as $list){
                echo '<option value="'.$list->vendor_id.'"'; if($list->vendor_id == $_SESSION['isat']['vendor']) echo ' selected="selected"'; echo '>'.$list->name.'</option>';
            }
        }else{
            foreach($Qlist->result_object() as $list) echo '<option value="'.$list->vendor_id.'">'.$list->name.'</option>';
        }
        ?>
        </select>
        <div id="user_vendor"></div>
        </td></tr>
        <tr height="30"><td class="pt9">Expired Date</td><td class="pt9">:</td><td><input type="text" name="time_task" class="inputbox w330 cursor-pointer" readonly autocomplete="off" maxlength="10" onClick="displayDatePicker('time_task')"></td></tr>
        <tr height="30"><td colspan="3"><h2 style="border-bottom:1px solid #CCC">USERS:</h2></td></tr>
        <tr height="30"><td class="pt9">PM Vendor</td><td class="pt9">:</td><td><div id="user_spv"></div></td></tr>
        <tr><td class="pt9">Consultant</td><td class="pt9">:</td><td>
        <div id="user_consultant" style="display:block"></div>
        <p><label><input type="checkbox" name="nor" value="1" onClick="iFtoggle('user_consultant')"> Without Consultant</label></p>
        </td></tr>
        <tr height="30"><td class="pt9">PM Indosat</td><td class="pt9">:</td><td class="pt9">
        <?php
		$ic = 0;
		$Qlist = $this->db->query("SELECT `user_id`, `name` FROM  `it_user` WHERE `fl_active`=1 AND `role_id`=4 ORDER BY `name` ASC");
		foreach($Qlist->result_object() as $list){
			if($ic == 1) echo ', '; else echo '<input type="hidden" name="user_indosat" value="'.$list->user_id.'">';
			echo $list->name;
			$ic = 1;
		}
		?>
        <!--div id="user_indosat"></div-->
        </td></tr>
        </tbody></table>
        <script type="text/javascript">
        <?php if($_SESSION['isat']['role'] == 2){ ?>
        dochange('user_spv', <?php echo '\''.$_SESSION['isat']['vendor'].'\', \''.$_SESSION['isat']['uid'].'\', 1' ?>);
        dochange('user_vendor', <?php echo '\''.$_SESSION['isat']['vendor'].'\', 0' ?>);
        <?php }else{ ?>
        dochange('user_spv', 1, 0);
        <?php } ?>
        dochange('user_consultant', 1, 0);
        //dochange('user_indosat', 1, 0);
        </script>
        <a class="display-none" id="neids1" onClick="do_change('ne_id1', 'neid1');do_change('maps_1', 'maps1')">neid</a>
        <div class="ifooter">
        <input type="hidden" id="neid1" name="neid1">
        <input type="hidden" id="maps1" name="maps1">
        <input type="hidden" id="timereload" value="2">
        <input type="submit" class="button" value="Submit"> 
        <input type="button" class="buttons ifclose" value="Close">
        </div>
        </form>
	</div>
</div>

<?php
break;

case 'ed_atp': if(!in_array($_SESSION['isat']['role'], array('1', '2'), true)) die(':P');
$Qcheck = $this->db->query("
	SELECT a.`title`, a.`fl_type`, a.`brand`, a.`neid`, a.`vendor_id`, a.`user_id`, a.`user_supervisor`, a.`user_manager`, a.`user_indosat`, a.`fl_active`, a.`time_task`, b.`idx`, c.`site_id`, c.`id`, c.`latitude`, c.`longitude`
	FROM `it_atp` a
	LEFT JOIN `it_book` b ON b.`idx`=a.`atp_id` AND b.`table`='atp'
	LEFT JOIN `it_site` c ON c.`site_id`=a.`site_id`
	WHERE a.`atp_id`='$dx'
");
if($Qcheck) $check = $Qcheck->result_object(); else exit('Forbidden!');
if($check[0]->idx) $disabled = ' disabled="disabled"'; else $disabled = '' ?>

<style type="text/css">@import url("<?php echo base_url() ?>static/css/proxy.php?f=date");</style>
<script language="javascript" src="<?php echo base_url() ?>static/js/proxy.php?f=date"></script>

<div id="ifbox_body">
    <div class="iheader">Edit ATP Task</div>
    <div class="ibody">
        <div id="iforms_r1" style="text-align:center"><?php if($check[0]->fl_active) echo '<div class="error-box"><b>ATTENTION:</b> This task has been completed.</div>'; elseif($check[0]->idx) echo '<div class="error-box"><b>ATTENTION:</b> This task has been booked by the user.</div>' ?></div>
		<?php if(!$disabled) echo '<form action="'.base_url().'index.php/process/ed_atp/'.$dx.'" method="post" id="iforms_f1" onsubmit="return iForms_s(1)">' ?>
        <table border="0" width="100%"><tbody>
        <tr height="30"><td width="120" class="pt9">Task Title</td><td width="10" class="pt9">:</td><td><input type="text" maxlength="300" class="inputbox w330" name="title" value="<?php echo $check[0]->title ?>"<?php echo $disabled ?>></td></tr>
        <tr height="30"><td class="pt9">Doc</td><td class="pt9">:</td><td>
        <select name="brand" class="inputbox w342"<?php echo $disabled ?>>
        <option value="">-- Select Doc:</option>
        <?php
        $arr_brand = array('miniMCE', 'atpFilter', 'atpPowersupply', 'ericsson2G', 'ericsson3G', 'ericssonMicrowave'/*, 'zteMicrowave', 'zte2G', 'zte3G'*/);
        $arr_brands = array('Mini CME', 'ATP Filter', 'ATP Power Supply', 'Ericsson 2G', 'Ericsson 3G', 'Microwave Ericsson'/*, 'Microwave ZTE', 'ZTE 2G', 'ZTE 3G'*/);
        for($i=0; $i < 6; $i++){
            echo '<option value="'.$arr_brand[$i].'"'; if($check[0]->brand==$arr_brand[$i]) echo ' selected="selected"'; echo '>'.$arr_brands[$i].'</option>';
        }
        ?>
        </select>
        </td></tr>
        <tr height="30"><td class="pt9">Site</td><td class="pt9">:</td><td>
        <?php if($check[0]->idx){ echo '<input type="text" class="inputbox w330" disabled="disabled" value="'.$check[0]->id.'|'.$check[0]->site_id.'">'; }else{ ?>
        <input type="text" class="inputbox w250 cursor-pointer" name="site" readonly value="<?php echo $check[0]->id ?>|<?php echo $check[0]->site_id ?>" onclick='targetitem = document.forms[1].site; targetneid = document.forms[1].neid1; targetmaps = document.forms[1].maps1; dataitem = window.open("<?php echo base_url() ?>index.php/form/get_site/1", "dataitem", "toolbar=no, resizable=no, menubar=no, scrollbars=yes, width=470, height=550"); dataitem.targetitem = targetitem; dataitem.targetneid = targetneid; dataitem.targetmaps = targetmaps'><span style="padding:0 0 0 5px"><input type="button" class="buttons" onclick='targetitem = document.forms[1].site; targetneid = document.forms[1].neid1; targetmaps = document.forms[1].maps1; dataitem = window.open("<?php echo base_url() ?>index.php/form/get_site/1", "dataitem", "toolbar=no, resizable=no, menubar=no, scrollbars=yes, width=470, height=550"); dataitem.targetitem = targetitem; dataitem.targetneid = targetneid; dataitem.targetmaps = targetmaps' value="Get Site"></span>
        <?php } ?>
        </td></tr>
        <tr height="30"><td class="pt9">Network ID</td><td class="pt9">:</td><td><span id="ne_id1"><select class="inputbox w342" disabled="disabled"><option>Choose Site first..</option></select></span><span id="maps_1"></span></td></tr>
        <?php if($check[0]->fl_type){ ?>
        <tr height="30"><td class="pt9">ATP Type</td><td class="pt9">:</td><td>
        <select name="type" class="inputbox w342"<?php echo $disabled ?>>
        <?php
        $arr_type = array(1 => 'Remote', 'On Site');
        for($i=1; $i < 3; $i++){
            echo '<option value="'.$i.'"'; if($check[0]->fl_type==$i) echo ' selected="selected"'; echo '>'.$arr_type[$i].'</option>';
        }
        ?>
        </select>
        </td></tr>
        <?php } ?>
        <tr><td class="pt9">Vendor</td><td class="pt9">:</td><td>
        <select name="vendor" class="inputbox w342" onChange="dochange('user_vendor', this.value, 0)"<?php echo $disabled ?>>
        <option value="0"></option>
        <?php
        $Qlist = $this->db->query("SELECT `vendor_id`, `name` FROM `it_vendor` WHERE `fl_active`=1 ORDER BY `name` ASC");
        foreach($Qlist->result_object() as $list){
            echo '<option value="'.$list->vendor_id.'"'; if($check[0]->vendor_id==$list->vendor_id) echo ' selected="selected"'; echo '>'.$list->name.'</option>';
        }
        ?>
        </select>
        <div id="user_vendor"></div>
        </td></tr>
        <?php if($check[0]->time_task){ $tt = explode('-', $check[0]->time_task); $time_task = $tt[2].'-'.$tt[1].'-'.$tt[0]; } ?>
        <tr height="30"><td class="pt9">Expired Date</td><td class="pt9">:</td><td><input type="text" name="time_task" class="inputbox w330 cursor-pointer" readonly autocomplete="off" maxlength="10" onClick="displayDatePicker('time_task')" value="<?php echo $time_task ?>"<?php echo $disabled ?>></td></tr>
        <tr height="30"><td colspan="3"><h2 style="border-bottom:1px solid #CCC">USERS:</h2></td></tr>
        <tr height="30"><td class="pt9">PM Vendor</td><td class="pt9">:</td><td><div id="user_spv"></div></td></tr>
        <tr><td class="pt9">Consultant</td><td class="pt9">:</td><td>
        <?php
        if($check[0]->user_manager){
            echo '<div id="user_consultant" style="display:block"></div>';
            echo '<p><label><input type="checkbox" name="nor" value="1" onClick="iFtoggle(\'user_consultant\')"'.$disabled.'> Without Consultant</label></p>';
        }else{
            echo '<div id="user_consultant" style="display:none"></div>';
            echo '<p><label><input type="checkbox" name="nor" value="1" onClick="iFtoggle(\'user_consultant\')" checked="checked"'.$disabled.'> Without Consultant</label></p>';
        }
        ?>
        </td></tr>
        <tr height="30"><td class="pt9">PM Indosat</td><td class="pt9">:</td><td class="pt9">
        <?php
		$ic = 0;
		$Qlist = $this->db->query("SELECT `user_id`, `name` FROM  `it_user` WHERE `fl_active`=1 AND `role_id`=4 ORDER BY `name` ASC");
		foreach($Qlist->result_object() as $list){
			if($ic == 1) echo ', ';
			echo $list->name;
			$ic = 1;
		}
		echo '<input type="hidden" name="user_indosat" value="'.$check[0]->user_indosat.'">';
		?>
        <!--div id="user_indosat"></div-->
        </td></tr>
        </tbody></table>
        <script type="text/javascript">
        dochange('ne_id1', '<?php echo $check[0]->id ?>', '<?php echo $check[0]->neid ?>'<?php if($disabled) echo ', 1' ?>);
        dochange('maps_1', '<?php echo $check[0]->site_id.'_'.$this->ifunction->encode($check[0]->latitude.'|'.$check[0]->longitude) ?>');
        dochange('user_vendor', '<?php echo $check[0]->vendor_id ?>', '<?php echo $check[0]->user_id ?>'<?php if($disabled) echo ', 1' ?>);
        dochange('user_spv', 1, '<?php echo $check[0]->user_supervisor ?>'<?php if($disabled) echo ', 1' ?>);
        <?php if($check[0]->user_manager){ echo "dochange('user_consultant', 1, '".$check[0]->user_manager."'"; if($disabled) echo ', 1';  echo ');'; } ?>
		//dochange('user_indosat', 1, '<?php echo $check[0]->user_indosat ?>'<?php if($disabled) echo ', 1' ?>);
        </script>
        <a class="display-none" id="neids1" onClick="do_change('ne_id1', 'neid1');do_change('maps_1', 'maps1')">neid</a>
        <div class="ifooter">
        <input type="hidden" id="neid1" name="neid1">
        <input type="hidden" id="maps1" name="maps1">
        <input type="hidden" id="timereload" value="2">
        <?php if(!$disabled) echo '<input type="submit" class="button" value="Save Changes">' ?>
        <input type="button" class="buttons ifclose" value="Close">
        </div>
        <?php if(!$disabled) echo '</form>' ?>
	</div>
</div>

<?php
break;

case 'view_atp':
$Qcheck = $this->db->query("
	SELECT a.`title`, a.`fl_type`, a.`brand`, a.`neid`, a.`user_id`, a.`user_supervisor`, a.`user_manager`, a.`user_indosat`, a.`fl_active`, a.`time_task`, b.`idx`, c.`site_id`, c.`id`, c.`name`, c.`latitude`, c.`longitude`, d.`vendor_id`, d.`name` AS `vendor_name`
	FROM `it_atp` a
	LEFT JOIN `it_book` b ON b.`idx`=a.`atp_id` AND b.`table`='atp'
	LEFT JOIN `it_site` c ON c.`site_id`=a.`site_id`
	LEFT JOIN `it_vendor` d ON d.`vendor_id`=a.`vendor_id`
	WHERE a.`atp_id`='$dx'
");
if($Qcheck) $check = $Qcheck->result_object(); else exit('Forbidden!') ?>

<style type="text/css">@import url("<?php echo base_url() ?>static/css/proxy.php?f=date");</style>
<script language="javascript" src="<?php echo base_url() ?>static/js/proxy.php?f=date"></script>

<div id="ifbox_body">
    <div class="iheader">ATP Task</div>
    <div class="ibody">
        <table border="0" width="100%"><tbody>
        <tr height="30"><td width="120" class="pt9">Task Title</td><td width="10" class="pt9">:</td><td><input type="text" class="inputbox w330" value="<?php echo $check[0]->title ?>" disabled="disabled"></td></tr>
        <tr height="30"><td class="pt9">Doc</td><td class="pt9">:</td><td>
        <select class="inputbox w342" disabled="disabled">
        <?php
        $arr_brand = array('miniMCE' => 'Mini CME', 'atpFilter' => 'ATP Filter', 'atpPowersupply' => 'ATP Power Supply', 'ericsson2G' => 'Ericsson 2G', 'ericsson3G' => 'Ericsson 3G', 'ericssonMicrowave' => 'Microwave Ericsson'/*, 'zteMicrowave' => 'Microwave ZTE', 'zte2G' => 'ZTE 2G', 'zte3G' => 'ZTE 3G'*/);
        echo '<option>'.$arr_brand[$check[0]->brand].'</option>';
        ?>
        </select>
        </td></tr>
        <tr height="30"><td class="pt9">Site</td><td class="pt9">:</td><td>
        <input type="text" class="inputbox w330" disabled="disabled" value="<?php echo $check[0]->name.' ('.$check[0]->id.')' ?>">
        </td></tr>
        <tr height="30"><td class="pt9">Network ID</td><td class="pt9">:</td><td><span id="ne_id1"><select class="inputbox w342" disabled="disabled"><option>Choose Site first..</option></select></span><span id="maps_1"></span></td></tr>
        <?php if($check[0]->fl_type){ ?>
        <tr height="30"><td class="pt9">ATP Type</td><td class="pt9">:</td><td>
        <select class="inputbox w342" disabled="disabled">
        <?php
        $arr_type = array(1 => 'Remote', 'On Site');
		echo '<option>'.$arr_type[$check[0]->fl_type].'</option>';
        ?>
        </select>
        </td></tr>
        <?php } ?>
        <tr><td class="pt9">Vendor</td><td class="pt9">:</td><td><select class="inputbox w342" disabled="disabled"><option><?php echo $check[0]->vendor_name ?></option></select><div id="user_vendor"></div>
        </td></tr>
        <?php if($check[0]->time_task){ $tt = explode('-', $check[0]->time_task); $time_task = $tt[2].'-'.$tt[1].'-'.$tt[0]; } ?>
        <tr height="30"><td class="pt9">Task Time</td><td class="pt9">:</td><td><input type="text" class="inputbox w330 cursor-pointer" value="<?php echo $time_task ?>" disabled="disabled"></td></tr>
        <tr height="30"><td colspan="3"><h2 style="border-bottom:1px solid #CCC">USERS:</h2></td></tr>
        <tr height="30"><td class="pt9">PM Vendor</td><td class="pt9">:</td><td><div id="user_spv"></div></td></tr>
        <tr height="30"><td class="pt9">Consultant</td><td class="pt9">:</td><td>
		<?php if($check[0]->user_manager) echo '<div id="user_consultant"></div>'; else echo '<p><label><input type="checkbox" checked="checked" disabled="disabled"> Without Consultant</label></p>' ?>
        </td></tr>
        <tr height="30"><td class="pt9">PM Indosat</td><td class="pt9">:</td><td class="pt9">
        <?php
		$ic = 0;
		$Qlist = $this->db->query("SELECT `user_id`, `name` FROM  `it_user` WHERE `fl_active`=1 AND `role_id`=4 ORDER BY `name` ASC");
		foreach($Qlist->result_object() as $list){
			if($ic == 1) echo ', ';
			echo $list->name;
			$ic = 1;
		}
		?>
        <!--div id="user_indosat"></div-->
        </td></tr>
        </tbody></table>
        <script type="text/javascript">
		dochange('ne_id1', '<?php echo $check[0]->id ?>', '<?php echo $check[0]->neid ?>', 1);
		dochange('maps_1', '<?php echo $check[0]->site_id.'_'.$this->ifunction->encode($check[0]->latitude.'|'.$check[0]->longitude) ?>');
        dochange('user_vendor', '<?php echo $check[0]->vendor_id ?>', '<?php echo $check[0]->user_id ?>', 1);
        dochange('user_spv', 1, '<?php echo $check[0]->user_supervisor ?>', 1);
		<?php if($check[0]->user_manager) echo "dochange('user_consultant', 1, '".$check[0]->user_manager."', 1);" ?>
        //dochange('user_indosat', 1, '<?php echo $check[0]->user_indosat ?>', 1);
        </script>
        <div class="ifooter"><input type="button" class="buttons ifclose" value="Close"></div>
	</div>
</div>

<?php
break;

case 'atp_done': ?>

<div id="ifbox_body">
    <div class="iheader">ATP Task Resume</div>
    <div class="ibody">
	    <?php
		$Qtaskbook = $this->db->query("
			SELECT a.`timelog`, b.`name`, c.`name` AS `vendor`
			FROM `it_book` a
			JOIN `it_user` b ON b.`user_id`=a.`user_id`
			JOIN `it_vendor` c ON c.`vendor_id`=b.`vendor_id` AND c.`fl_active`=1
			WHERE a.`table`='atp' AND a.`idx`='$dx'
		");
		$taskbook = $Qtaskbook->result_object();
		?>
       <h2 style="border-bottom:1px solid #CCC;margin:0 0 10px 0">BOOK STATUS</h2>
       <table border="0" width="100%"><tbody>
       <tr height="30"><td width="90">Booked by</td><td width="10">:</td><td><?php echo $taskbook[0]->name ?></td></tr>
       <tr height="30"><td>Booking Time</td><td>:</td><td><?php echo date('d F Y - H:i', $taskbook[0]->timelog) ?></td></tr>
       <tr height="30"><td>Vendor</td><td>:</td><td><?php echo $taskbook[0]->vendor ?></td></tr>
       </tbody></table>
       
       <?php
		$Qtaskcheckin = $this->db->query("
			SELECT a.`latitude`, a.`longitude`, a.`timelog`, a.`imei`, b.`name`, c.`name` AS `vendor`, d.`files`, e.`brand`, e.`cell_id`, e.`cell_ids`, e.`lac`, f.`latitude` AS `latitude_b`, f.`longitude` AS `longitude_b`, g.`files` AS `files_atsite`
			FROM `it_checkin` a
			JOIN `it_user` b ON b.`user_id`=a.`user_id`
			JOIN `it_vendor` c ON c.`vendor_id`=b.`vendor_id` AND c.`fl_active`=1
			LEFT JOIN `it_attachment` d ON d.`table`='atp_checkin' AND d.`user_id`=a.`user_id` AND d.`idx`=a.`idx`
			LEFT JOIN `it_attachment` g ON g.`table`='atp_indosat_foto' AND g.`idx`=a.`idx`
			JOIN `it_atp` e ON e.`atp_id`=a.`idx`
			JOIN `it_site` f ON f.`site_id`=e.`site_id`
			WHERE a.`table`='atp' AND a.`idx`='$dx'
		");
		$taskcheckin = $Qtaskcheckin->result_object();
		$la = $this->ifunction->DECtoDMS($taskcheckin[0]->latitude);
		$lo = $this->ifunction->DECtoDMS($taskcheckin[0]->longitude);
		?>
        <h2 style="border-bottom:1px solid #CCC;margin:10px 0">CHECK-IN STATUS</h2>
        <table border="0" width="100%"><tbody>
        <tr height="30"><td width="90">Checked by</td><td width="10">:</td><td><?php echo $taskcheckin[0]->name ?></td></tr>
        <tr><td>Check-in Time</td><td>:</td><td>
        <?php echo date('d F Y - H:i', $taskcheckin[0]->timelog) ?>
        <table style="margin:5px 0 10px 0">
        <tr><td width="65">Latitude</td><td>: <?php echo $la["deg"] ?>&deg; <?php echo $la["min"] ?>' <?php echo $la["sec"] ?>" (<?php echo $taskcheckin[0]->latitude ?>)</td></tr>
        <tr><td>Longitude</td><td>: <?php echo $lo["deg"] ?>&deg; <?php echo $lo["min"] ?>' <?php echo $lo["sec"] ?>" (<?php echo $taskcheckin[0]->longitude ?>)</td></tr>
        </table>
        </td></tr>
        <tr height="30"><td>Photo</td><td>:</td><td>
		<?php
        if($taskcheckin[0]->files) echo '<a href="'.base_url().'media/files/'.$taskcheckin[0]->files.'" target="_blank">Engineer Checkin</a>';
        if($taskcheckin[0]->files_atsite){
			if($taskcheckin[0]->files) echo '&nbsp; | &nbsp;';
			echo '<a href="'.base_url().'media/files/'.$taskcheckin[0]->files_atsite.'" target="_blank">Waspang Checkin</a>';
		}
		?>
        </td></tr>
        <tr height="30"><td>Vendor</td><td>:</td><td><?php echo $taskcheckin[0]->vendor ?></td></tr>
        <tr height="30"><td>Device IMEI</td><td>:</td><td><?php echo $taskcheckin[0]->imei ?></td></tr>
        </tbody></table>
        <div id="atp_<?php echo $dx ?>"><a class="maps_detail" id="<?php echo $dx ?>" c="atp" dx="2" geo="<?php echo $taskcheckin[0]->latitude.':'.$taskcheckin[0]->longitude.':'.$taskcheckin[0]->latitude_b.':'.$taskcheckin[0]->longitude_b ?>"><img style="border:1px solid #D3D3D3;background:url(http://maps.google.com/maps/api/staticmap?size=450x140&markers=color:0xBC1010|<?php echo $taskcheckin[0]->latitude ?>,<?php echo $taskcheckin[0]->longitude ?>&zoom=15&sensor=false) center center;width:450px;height:90px" src="<?php echo base_url() ?>static/i/spacer.gif"></a></div>
        
        <h2 style="border-bottom:1px solid #CCC;margin:10px 0">ABOUT TASK</h2>
       <table border="0" width="100%"><tbody>
       <tr height="30"><td width="90">Cell ID</td><td width="10">:</td><td><?php echo $taskcheckin[0]->cell_id; if($taskcheckin[0]->cell_ids) echo ' ('.$taskcheckin[0]->cell_ids.')' ?></td></tr>
       <tr height="30"><td>LAC</td><td>:</td><td><?php echo $taskcheckin[0]->lac ?></td></tr>
       </tbody></table>
       
        <p align="center" style="color:#F00;font-size:14px">ATP Report <i>(<?php echo $taskcheckin[0]->brand ?>)</i></p>
        <p align="center" style="padding-bottom:20px;border-bottom:1px dotted #CCC">
        <a class="buton" onClick="window.location.href='<?php echo base_url() ?>index.php/process/pdf/merge/atp/<?php echo $taskcheckin[0]->brand ?>/<?php echo $dx ?>'">Download</a>
        <a class="butons" onclick='window.open("<?php echo base_url() ?>index.php/process/pdf/html/atp/<?php echo $taskcheckin[0]->brand ?>/<?php echo $dx ?>", "atp_<?php echo $dx ?>", "toolbar=no, resizable=no, menubar=no, scrollbars=yes, width=800, height=600")'>Preview</a>
        </p>
       
        <p align="center" style="color:#090;font-size:14px">Asset Equipment &amp; Barcode</p>
        <p align="center"><a class="buton" onClick="window.location.href='<?php echo base_url() ?>index.php/process/pdf/export/atp/part/<?php echo $dx ?>'">Download</a>
        <a class="butons" onclick='window.open("<?php echo base_url() ?>index.php/process/pdf/html/atp/part/<?php echo $dx ?>", "part_<?php echo $dx ?>", "toolbar=no, resizable=no, menubar=no, scrollbars=yes, width=700, height=600")'>Preview</a>
        </p>
    	
        <h2 style="border-bottom:1px solid #CCC;margin:10px 0">VOICE CALL</h2>
		<?php
		$Qlist = $this->db->query("SELECT `attachment_id`, `files`, `note`, `desc` FROM `it_attachment` WHERE `table`='atp_voice' AND `idx`='$dx'");
		if($Qlist->num_rows){
			echo '<table border="0" width="100%" style="margin-bottom:30px">';
			echo '<thead style="background:#0F67A1;color:#FFF"><tr><th width="100" align="center">Files</th><th width="100" align="center">Cell ID</th><th align="center">Phone Number</th></tr></thead>';
			echo '<tbody>';
			foreach($Qlist->result_object() as $list) echo '<tr><td align="center"><a href="'.base_url().'media/voice/'.$list->files.'" target="_blank">Download</a></td><td align="center"><a onclick="window.location.href=\''.base_url().'index.php/process/txt/atp/voice_call/'.$list->attachment_id.'\'">Download</a></td><td align="center">'.$list->note.'</td></tr>';
			echo '</tbody></table>';
		}
		else echo '<p align="center">-  No Voice Call -</p>';
		?>
        
        <h2 style="border-bottom:1px solid #CCC;margin:10px 0">VIDEO CALL</h2>
		<?php
		$Qlist = $this->db->query("SELECT `attachment_id`, `files`, `note`, `desc` FROM `it_attachment` WHERE `table`='atp_video' AND `idx`='$dx'");
		if($Qlist->num_rows){
			echo '<table border="0" width="100%" style="margin-bottom:30px">';
			echo '<thead style="background:#0F67A1;color:#FFF"><tr><th width="100" align="center">Files</th><th width="100" align="center">Cell ID</th><th align="center">Phone Number</th></tr></thead>';
			echo '<tbody>';
			foreach($Qlist->result_object() as $list) echo '<tr><td align="center"><a href="'.base_url().'media/video/'.$list->files.'" target="_blank">Download</a></td><td align="center"><a onclick="window.location.href=\''.base_url().'index.php/process/txt/atp/video_call/'.$list->attachment_id.'\'">Download</a></td><td align="center">'.$list->note.'</td></tr>';
			echo '</tbody></table>';
		}
		else echo '<p align="center">- No Video Call -</p>';
		?>
        
        <h2 style="border-bottom:1px solid #CCC;margin:10px 0">VIDEO RECORD</h2>
		<?php
		$Qlist = $this->db->query("SELECT `files`, `note`, `desc` FROM `it_attachment` WHERE `table`='atp_video_record' AND `idx`='$dx'");
		if($Qlist->num_rows){
			echo '<ol>';
			foreach($Qlist->result_object() as $list) echo '<li><a href="'.base_url().'media/video/'.$list->files.'" target="_blank">Download Video</a></li>';
			echo '</ol>';
		}
		else echo '<p align="center">- No Video Record -</p>';
		?>
        
		<div class="ifooter"><input type="button" class="buttons ifclose" value="Close"></div>
	</div>
</div>

<?php
break;

case 'add_ss': if(!in_array($_SESSION['isat']['role'], array('1', '2'), true)) die(':P') ?>

<style type="text/css">@import url("<?php echo base_url() ?>static/css/proxy.php?f=date");</style>
<script language="javascript" src="<?php echo base_url() ?>static/js/proxy.php?f=date"></script>

<div id="ifbox_body">
    <div class="iheader">Add SS Task</div>
    <div class="ibody">
        <div id="iforms_r1" style="text-align:center"></div>
        <form action="<?php echo base_url() ?>index.php/process/add_ss" method="post" id="iforms_f1" onSubmit="return iForms_s(1)">
        <table border="0" width="100%"><tbody>
        <tr height="30"><td width="120" class="pt9">Task Title</td><td width="10" class="pt9">:</td><td><input type="text" maxlength="300" class="inputbox w330" name="title"></td></tr>
        <tr height="30"><td class="pt9">Site</td><td class="pt9">:</td><td>
        <input type="text" class="inputbox w250 cursor-pointer" name="site" readonly onclick='targetitem = document.forms[1].site; targetneid = document.forms[1].neid1; targetmaps = document.forms[1].maps1; dataitem = window.open("<?php echo base_url() ?>index.php/form/get_site/1", "dataitem", "toolbar=no, resizable=no, menubar=no, scrollbars=yes, width=470, height=550"); dataitem.targetitem = targetitem; dataitem.targetneid = targetneid; dataitem.targetmaps = targetmaps'><span style="padding:0 0 0 5px"><input type="button" class="buttons" onclick='targetitem = document.forms[1].site; targetneid = document.forms[1].neid1; targetmaps = document.forms[1].maps1; dataitem = window.open("<?php echo base_url() ?>index.php/form/get_site/1", "dataitem", "toolbar=no, resizable=no, menubar=no, scrollbars=yes, width=470, height=550"); dataitem.targetitem = targetitem; dataitem.targetneid = targetneid; dataitem.targetmaps = targetmaps' value="Get Site"></span>
        <span id="maps_1"></span>
        </td></tr>
        <tr height="30" style="display:none"><td class="pt9">Network ID</td><td class="pt9">:</td><td><span id="ne_id1"><select class="inputbox w342" disabled="disabled"><option>Choose Site first..</option></select></span></td></tr>
        <tr><td class="pt9">Vendor</td><td class="pt9">:</td><td>
        <select name="vendor" class="inputbox w342" onChange="dochange('user_vendor', this.value, 0)">
        <option value="0"></option>
        <?php
        $Qlist = $this->db->query("SELECT `vendor_id`, `name` FROM `it_vendor` WHERE `fl_active`=1 ORDER BY `name` ASC");
        if($_SESSION['isat']['role'] == 2){
            foreach($Qlist->result_object() as $list){
                echo '<option value="'.$list->vendor_id.'"'; if($list->vendor_id == $_SESSION['isat']['vendor']) echo ' selected="selected"'; echo '>'.$list->name.'</option>';
            }
        }else{
            foreach($Qlist->result_object() as $list) echo '<option value="'.$list->vendor_id.'">'.$list->name.'</option>';
        }
        ?>
        </select>
        <div id="user_vendor"></div>
        </td></tr>
        <tr height="30"><td class="pt9">Expired Date</td><td class="pt9">:</td><td><input type="text" name="time_task" class="inputbox w330 cursor-pointer" readonly autocomplete="off" maxlength="10" onClick="displayDatePicker('time_task')"></td></tr>
        <tr height="30"><td colspan="3"><h2 style="border-bottom:1px solid #CCC">USERS:</h2></td></tr>
        <tr height="30"><td class="pt9">PM Vendor</td><td class="pt9">:</td><td><div id="user_spv"></div></td></tr>
        <tr><td class="pt9">Consultant</td><td class="pt9">:</td><td>
        <div id="user_consultant" style="display:block"></div>
        <p><label><input type="checkbox" name="nor" value="1" onClick="iFtoggle('user_consultant')"> Without Consultant</label></p>
        </td></tr>
        <tr height="30"><td class="pt9">PM Indosat</td><td class="pt9">:</td><td class="pt9">
        <?php
		$ic = 0;
		$Qlist = $this->db->query("SELECT `user_id`, `name` FROM  `it_user` WHERE `fl_active`=1 AND `role_id`=4 ORDER BY `name` ASC");
		foreach($Qlist->result_object() as $list){
			if($ic == 1) echo ', '; else echo '<input type="hidden" name="user_indosat" value="'.$list->user_id.'">';
			echo $list->name;
			$ic = 1;
		}
		?>
        <!--div id="user_indosat"></div-->
        </td></tr>
        </tbody></table>
        <script type="text/javascript">
        <?php if($_SESSION['isat']['role'] == 2){ ?>
        dochange('user_spv', <?php echo '\''.$_SESSION['isat']['vendor'].'\', \''.$_SESSION['isat']['uid'].'\', 1' ?>);
        dochange('user_vendor', <?php echo '\''.$_SESSION['isat']['vendor'].'\', 0' ?>);
        <?php }else{ ?>
        dochange('user_spv', 1, 0);
        <?php } ?>
        dochange('user_consultant', 1, 0);
        //dochange('user_indosat', 1, 0);
        </script>
        <a class="display-none" id="neids1" onClick="do_change('ne_id1', 'neid1');do_change('maps_1', 'maps1')">neid</a>
        <div class="ifooter">
        <input type="hidden" id="neid1" name="neid1">
        <input type="hidden" id="maps1" name="maps1">
        <input type="hidden" id="timereload" value="2">
        <input type="submit" class="button" value="Submit"> 
        <input type="button" class="buttons ifclose" value="Close">
        </div>
        </form>
	</div>
</div>

<?php
break;

case 'ed_ss': if(!in_array($_SESSION['isat']['role'], array('1', '2'), true)) die(':P');
$Qcheck = $this->db->query("
	SELECT a.`task_title`, a.`expired`, a.`neid`, a.`vendor_id`, a.`fl_type`, a.`fl_status`, a.`user_engineer`, a.`user_pmvendor`, a.`user_consultant`, a.`user_pmisat`, b.`site_id`, b.`id`, b.`latitude`, b.`longitude`
	FROM `ss_task` a
	JOIN `it_site` b ON b.`site_id`=a.`site_id`
	WHERE a.`task_id`='$dx'
");
//JOIN `it_network` d ON d.`neid`=a.`neid`
//JOIN `it_site` b ON b.`id`=d.`id`
if($Qcheck) $check = $Qcheck->result_object(); else exit('Forbidden!');
if($check[0]->fl_status) $disabled = ' disabled="disabled"'; else $disabled = '' ?>

<style type="text/css">@import url("<?php echo base_url() ?>static/css/proxy.php?f=date");</style>
<script language="javascript" src="<?php echo base_url() ?>static/js/proxy.php?f=date"></script>

<div id="ifbox_body">
    <div class="iheader">Edit SS Task</div>
    <div class="ibody">
        <div id="iforms_r1" style="text-align:center"></div>
		<?php if(!$disabled) echo '<form action="'.base_url().'index.php/process/ed_ss/'.$dx.'" method="post" id="iforms_f1" onsubmit="return iForms_s(1)">' ?>
        <table border="0" width="100%"><tbody>
        <tr height="30"><td width="120" class="pt9">Task Title</td><td width="10" class="pt9">:</td><td><input type="text" maxlength="300" class="inputbox w330" name="title" value="<?php echo $check[0]->task_title ?>"<?php echo $disabled ?>></td></tr>
        <tr height="30"><td class="pt9">Site</td><td class="pt9">:</td><td>
        <?php if($check[0]->fl_status){ echo '<input type="text" class="inputbox w330" disabled="disabled" value="'.$check[0]->id.'|'.$check[0]->site_id.'">'; }else{ ?>
        <input type="text" class="inputbox w250 cursor-pointer" name="site" readonly value="<?php echo $check[0]->id ?>|<?php echo $check[0]->site_id ?>" onclick='targetitem = document.forms[1].site; targetneid = document.forms[1].neid1; targetmaps = document.forms[1].maps1; dataitem = window.open("<?php echo base_url() ?>index.php/form/get_site/1", "dataitem", "toolbar=no, resizable=no, menubar=no, scrollbars=yes, width=470, height=550"); dataitem.targetitem = targetitem; dataitem.targetneid = targetneid; dataitem.targetmaps = targetmaps'><span style="padding:0 0 0 5px"><input type="button" class="buttons" onclick='targetitem = document.forms[1].site; targetneid = document.forms[1].neid1; targetmaps = document.forms[1].maps1; dataitem = window.open("<?php echo base_url() ?>index.php/form/get_site/1", "dataitem", "toolbar=no, resizable=no, menubar=no, scrollbars=yes, width=470, height=550"); dataitem.targetitem = targetitem; dataitem.targetneid = targetneid; dataitem.targetmaps = targetmaps' value="Get Site"></span>
        <?php } ?>
        <span id="maps_1"></span>
        </td></tr>
        <tr height="30" style="display:none"><td class="pt9">Network ID</td><td class="pt9">:</td><td><span id="ne_id1"><select class="inputbox w342" disabled="disabled"><option>Choose Site first..</option></select></span></td></tr>
        <tr><td class="pt9">Vendor</td><td class="pt9">:</td><td>
        <select name="vendor" class="inputbox w342" onChange="dochange('user_vendor', this.value, 0)"<?php echo $disabled ?>>
        <option value="0"></option>
        <?php
        $Qlist = $this->db->query("SELECT `vendor_id`, `name` FROM `it_vendor` WHERE `fl_active`=1 ORDER BY `name` ASC");
		foreach($Qlist->result_object() as $list){
			echo '<option value="'.$list->vendor_id.'"'; if($list->vendor_id == $check[0]->vendor_id) echo ' selected="selected"'; echo '>'.$list->name.'</option>';
		}
        ?>
        </select>
        <div id="user_vendor"></div>
        </td></tr>
        <?php if($check[0]->fl_type){ ?>
        <tr height="30"><td class="pt9">SS Type</td><td class="pt9">:</td><td>
        <select name="type" class="inputbox w342"<?php echo $disabled ?>>
        <?php
        $arr_type = array(1 => 'Remote', 'On Site');
        for($i=1; $i < 3; $i++){
            echo '<option value="'.$i.'"'; if($check[0]->fl_type==$i) echo ' selected="selected"'; echo '>'.$arr_type[$i].'</option>';
        }
        ?>
        </select>
        </td></tr>
        <?php } ?>
        <tr height="30"><td class="pt9">Expired Date</td><td class="pt9">:</td><td><input type="text" name="time_task" class="inputbox w330 cursor-pointer" readonly autocomplete="off" maxlength="10" onClick="displayDatePicker('time_task')" value="<?php echo $check[0]->expired ?>"<?php echo $disabled ?>></td></tr>
        <tr height="30"><td colspan="3"><h2 style="border-bottom:1px solid #CCC">USERS:</h2></td></tr>
        <tr height="30"><td class="pt9">PM Vendor</td><td class="pt9">:</td><td><div id="user_spv"></div></td></tr>
        <tr><td class="pt9">Consultant</td><td class="pt9">:</td><td>
        <?php
        if($check[0]->user_consultant){
            echo '<div id="user_consultant" style="display:block"></div>';
            echo '<p><label><input type="checkbox" name="nor" value="1" onClick="iFtoggle(\'user_consultant\')"'.$disabled.'> Without Consultant</label></p>';
        }else{
            echo '<div id="user_consultant" style="display:none"></div>';
            echo '<p><label><input type="checkbox" name="nor" value="1" onClick="iFtoggle(\'user_consultant\')" checked="checked"'.$disabled.'> Without Consultant</label></p>';
        }
        ?>
        </td></tr>
        <tr height="30"><td class="pt9">PM Indosat</td><td class="pt9">:</td><td class="pt9">
        <?php
		$ic = 0;
		$Qlist = $this->db->query("SELECT `user_id`, `name` FROM  `it_user` WHERE `fl_active`=1 AND `role_id`=4 ORDER BY `name` ASC");
		foreach($Qlist->result_object() as $list){
			if($ic == 1) echo ', ';
			echo $list->name;
			$ic = 1;
		}
		echo '<input type="hidden" name="user_indosat" value="'.$check[0]->user_pmisat.'">';
		?>
        <!--div id="user_indosat"></div-->
        </td></tr>
        </tbody></table>
        <script type="text/javascript">
        <?php if($check[0]->neid){ echo "dochange('ne_id1', '".$check[0]->id."', '".$check[0]->neid."'"; if($disabled) echo ', 1';  echo ');'; } ?>
        dochange('maps_1', '<?php echo $check[0]->site_id.'_'.$this->ifunction->encode($check[0]->latitude.'|'.$check[0]->longitude) ?>');
        dochange('user_vendor', '<?php echo $check[0]->vendor_id ?>', '<?php echo $check[0]->user_engineer ?>'<?php if($disabled) echo ', 1' ?>);
        dochange('user_spv', 1, '<?php echo $check[0]->user_pmvendor ?>'<?php if($disabled) echo ', 1' ?>);
        <?php if($check[0]->user_consultant){ echo "dochange('user_consultant', 1, '".$check[0]->user_consultant."'"; if($disabled) echo ', 1';  echo ');'; } ?>
        //dochange('user_indosat', 1, '<?php echo $check[0]->user_pmisat ?>'<?php if($disabled) echo ', 1' ?>);
        </script>
        <a class="display-none" id="neids1" onClick="do_change('ne_id1', 'neid1');do_change('maps_1', 'maps1')">neid</a>
        <div class="ifooter">
        <input type="hidden" id="neid1" name="neid1">
        <input type="hidden" id="maps1" name="maps1">
        <input type="hidden" id="timereload" value="2">
        <?php if(!$disabled) echo '<input type="submit" class="button" value="Save Changes">' ?>
        <input type="button" class="buttons ifclose" value="Close">
        </div>
        <?php if(!$disabled) echo '</form>' ?>
	</div>
</div>

<?php
break;

case 'view_ss':
$Qcheck = $this->db->query("
	SELECT a.`task_title`, a.`expired`, a.`neid`, a.`vendor_id`, a.`fl_type`, a.`fl_status`, a.`user_engineer`, a.`user_pmvendor`, a.`user_consultant`, a.`user_pmisat`, b.`site_id`, b.`id`, b.`latitude`, b.`longitude`
	FROM `ss_task` a
	JOIN `it_site` b ON b.`site_id`=a.`site_id`
	WHERE a.`task_id`='$dx'
");
//JOIN `it_network` d ON d.`neid`=a.`neid`
//JOIN `it_site` b ON b.`id`=d.`id`
if($Qcheck) $check = $Qcheck->result_object(); else exit('Forbidden!') ?>

<style type="text/css">@import url("<?php echo base_url() ?>static/css/proxy.php?f=date");</style>
<script language="javascript" src="<?php echo base_url() ?>static/js/proxy.php?f=date"></script>

<div id="ifbox_body">
    <div class="iheader">View SS Task</div>
    <div class="ibody">
        <table border="0" width="100%"><tbody>
        <tr height="30"><td width="120" class="pt9">Task Title</td><td width="10" class="pt9">:</td><td><input type="text" class="inputbox w330" value="<?php echo $check[0]->task_title ?>" disabled="disabled"></td></tr>
        <tr height="30"><td class="pt9">Site</td><td class="pt9">:</td><td><input type="text" class="inputbox w330" value="<?php echo $check[0]->id.'|'.$check[0]->site_id ?>" disabled="disabled"><span id="maps_1"></span></td></tr>
        <tr height="30" style="display:none"><td class="pt9">Network ID</td><td class="pt9">:</td><td><span id="ne_id1"><select class="inputbox w342" disabled="disabled"><option>Choose Site first..</option></select></span></td></tr>
        <tr><td class="pt9">Vendor</td><td class="pt9">:</td><td>
        <select name="vendor" class="inputbox w342" onChange="dochange('user_vendor', this.value, 0)" disabled>
        <option value="0"></option>
        <?php
        $Qlist = $this->db->query("SELECT `vendor_id`, `name` FROM `it_vendor` WHERE `fl_active`=1 ORDER BY `name` ASC");
		foreach($Qlist->result_object() as $list){
			echo '<option value="'.$list->vendor_id.'"'; if($list->vendor_id == $check[0]->vendor_id) echo ' selected="selected"'; echo '>'.$list->name.'</option>';
		}
        ?>
        </select>
        <div id="user_vendor"></div>
        </td></tr>
        <?php if($check[0]->fl_type){ ?>
        <tr height="30"><td class="pt9">SS Type</td><td class="pt9">:</td><td>
        <select class="inputbox w342" disabled="disabled">
        <?php
        $arr_type = array(1 => 'Remote', 'On Site');
        for($i=1; $i < 3; $i++){
            echo '<option value="'.$i.'"'; if($check[0]->fl_type==$i) echo ' selected="selected"'; echo '>'.$arr_type[$i].'</option>';
        }
        ?>
        </select>
        </td></tr>
        <?php } ?>
        <tr height="30"><td class="pt9">Expired Date</td><td class="pt9">:</td><td><input type="text" class="inputbox w330" value="<?php echo $check[0]->expired ?>" disabled="disabled"></td></tr>
        <tr height="30"><td colspan="3"><h2 style="border-bottom:1px solid #CCC">USERS:</h2></td></tr>
        <tr height="30"><td class="pt9">PM Vendor</td><td class="pt9">:</td><td><div id="user_spv"></div></td></tr>
        <tr><td class="pt9">Consultant</td><td class="pt9">:</td><td>
        <?php
        if($check[0]->user_consultant){
            echo '<div id="user_consultant" style="display:block"></div>';
            echo '<p><label><input type="checkbox" name="nor" value="1" onClick="iFtoggle(\'user_consultant\')" disabled="disabled"> Without Consultant</label></p>';
        }else{
            echo '<div id="user_consultant" style="display:none"></div>';
            echo '<p><label><input type="checkbox" name="nor" value="1" onClick="iFtoggle(\'user_consultant\')" checked="checked" disabled="disabled"> Without Consultant</label></p>';
        }
        ?>
        </td></tr>
        <tr height="30"><td class="pt9">PM Indosat</td><td class="pt9">:</td><td class="pt9">
        <?php
		$ic = 0;
		$Qlist = $this->db->query("SELECT `user_id`, `name` FROM  `it_user` WHERE `fl_active`=1 AND `role_id`=4 ORDER BY `name` ASC");
		foreach($Qlist->result_object() as $list){
			if($ic == 1) echo ', ';
			echo $list->name;
			$ic = 1;
		}
		?>
        <!--div id="user_indosat"></div-->
        </td></tr>
        </tbody></table>
        <script type="text/javascript">
        <?php if($check[0]->neid){ echo "dochange('ne_id1', '".$check[0]->id."', '".$check[0]->neid."', 1);"; } ?>
        dochange('maps_1', '<?php echo $check[0]->site_id.'_'.$this->ifunction->encode($check[0]->latitude.'|'.$check[0]->longitude) ?>');
        dochange('user_vendor', '<?php echo $check[0]->vendor_id ?>', '<?php echo $check[0]->user_engineer ?>', 1);
        dochange('user_spv', 1, '<?php echo $check[0]->user_pmvendor ?>', 1);
        <?php if($check[0]->user_consultant){ echo "dochange('user_consultant', 1, '".$check[0]->user_consultant."', 1);"; } ?>
        //dochange('user_indosat', 1, '<?php echo $check[0]->user_pmisat ?>', 1);
        </script>
        <div class="ifooter"><input type="button" class="buttons ifclose" value="Close"></div>
	</div>
</div>

<?php
break;

case 'ss_done': ?>

<div id="ifbox_body">
    <div class="iheader">SS Task Resume</div>
    <div class="ibody">
	    <?php
		$Qtaskbook = $this->db->query("
			SELECT a.`timelog`, b.`name`, c.`name` AS `vendor`
			FROM `it_book` a
			JOIN `it_user` b ON b.`user_id`=a.`user_id`
			JOIN `it_vendor` c ON c.`vendor_id`=b.`vendor_id` AND c.`fl_active`=1
			WHERE a.`table`='ss' AND a.`idx`='$dx'
		");
		$taskbook = $Qtaskbook->result_object();
		?>
       <h2 style="border-bottom:1px solid #CCC;margin:0 0 10px 0">BOOK STATUS</h2>
       <table border="0" width="100%"><tbody>
       <tr height="30"><td width="90">Booked by</td><td width="10">:</td><td><?php echo $taskbook[0]->name ?></td></tr>
       <tr height="30"><td>Booking Time</td><td>:</td><td><?php echo date('d F Y - H:i', $taskbook[0]->timelog) ?></td></tr>
       <tr height="30"><td>Vendor</td><td>:</td><td><?php echo $taskbook[0]->vendor ?></td></tr>
       </tbody></table>
       
       <?php
		$Qtaskcheckin = $this->db->query("
			SELECT a.`latitude`, a.`longitude`, a.`timelog`, a.`imei`, b.`name`, c.`name` AS `vendor`, d.`files`, f.`latitude` AS `latitude_b`, f.`longitude` AS `longitude_b`, g.`files` AS `files_atsite`
			FROM `it_checkin` a
			JOIN `it_user` b ON b.`user_id`=a.`user_id`
			JOIN `it_vendor` c ON c.`vendor_id`=b.`vendor_id` AND c.`fl_active`=1
			LEFT JOIN `it_attachment` d ON d.`table`='ss_checkin' AND d.`user_id`=a.`user_id` AND d.`idx`=a.`idx`
			LEFT JOIN `it_attachment` g ON g.`table`='ss_indosat_foto' AND g.`idx`=a.`idx`
			JOIN `ss_task` e ON e.`task_id`=a.`idx`
			JOIN `it_site` f ON f.`site_id`=e.`site_id`
			WHERE a.`table`='ss' AND a.`idx`='$dx'
		");
		//JOIN `it_network` h ON h.`neid`=e.`neid`
		//JOIN `it_site` f ON f.`id`=h.`id`
		$taskcheckin = $Qtaskcheckin->result_object();
		$la = $this->ifunction->DECtoDMS($taskcheckin[0]->latitude);
		$lo = $this->ifunction->DECtoDMS($taskcheckin[0]->longitude);
		?>
        <h2 style="border-bottom:1px solid #CCC;margin:10px 0">CHECK-IN STATUS</h2>
        <table border="0" width="100%"><tbody>
        <tr height="30"><td width="90">Checked by</td><td width="10">:</td><td><?php echo $taskcheckin[0]->name ?></td></tr>
        <tr><td>Check-in Time</td><td>:</td><td>
        <?php echo date('d F Y - H:i', $taskcheckin[0]->timelog) ?>
        <table style="margin:5px 0 10px 0">
        <tr><td width="65">Latitude</td><td>: <?php echo $la["deg"] ?>&deg; <?php echo $la["min"] ?>' <?php echo $la["sec"] ?>" (<?php echo $taskcheckin[0]->latitude ?>)</td></tr>
        <tr><td>Longitude</td><td>: <?php echo $lo["deg"] ?>&deg; <?php echo $lo["min"] ?>' <?php echo $lo["sec"] ?>" (<?php echo $taskcheckin[0]->longitude ?>)</td></tr>
        </table>
        </td></tr>
        <tr height="30"><td>Photo</td><td>:</td><td>
		<?php if($taskcheckin[0]->files) echo '<a href="'.base_url().'media/ss/checkin/'.$taskcheckin[0]->files.'" target="_blank">Engineer Checkin</a>' ?>
		<?php if($taskcheckin[0]->files_atsite) echo '&nbsp; | &nbsp;<a href="'.base_url().'media/ss/checkin/'.$taskcheckin[0]->files_atsite.'" target="_blank">Waspang Checkin</a>' ?>
        </td></tr>
        <tr height="30"><td>Vendor</td><td>:</td><td><?php echo $taskcheckin[0]->vendor ?></td></tr>
        <tr height="30"><td>Device IMEI</td><td>:</td><td><?php echo $taskcheckin[0]->imei ?></td></tr>
        </tbody></table>
        <div id="ss_<?php echo $dx ?>"><a class="maps_detail" id="<?php echo $dx ?>" c="ss" dx="2" geo="<?php echo $taskcheckin[0]->latitude.':'.$taskcheckin[0]->longitude.':'.$taskcheckin[0]->latitude_b.':'.$taskcheckin[0]->longitude_b ?>"><img style="border:1px solid #D3D3D3;background:url(http://maps.google.com/maps/api/staticmap?size=450x140&markers=color:0xBC1010|<?php echo $taskcheckin[0]->latitude ?>,<?php echo $taskcheckin[0]->longitude ?>&zoom=15&sensor=false) center center;width:450px;height:90px" src="<?php echo base_url() ?>static/i/spacer.gif"></a></div>
       
        <p align="center" style="color:#F00;font-size:14px">Site Supervisory Checklist</p>
        <p align="center"><a class="buton" onClick="window.location.href='<?php echo base_url() ?>index.php/process/pdf/export/ss/report/<?php echo $dx ?>'">Download</a>
        <a class="butons" onclick='window.open("<?php echo base_url() ?>index.php/process/pdf/html/ss/report/<?php echo $dx ?>", "ss_<?php echo $dx ?>", "toolbar=no, resizable=no, menubar=no, scrollbars=yes, width=800, height=700")'>Preview</a>
        </p>
        
        <div style="margin:20px 0 0 0;padding:0 0 10px 0;border-top:1px dotted #CCC;border-bottom:1px dotted #CCC">
		<p align="center" style="color:#090;font-size:14px">Actual / Standard Photos</p>
        <p align="center"><a class="buton" onClick="window.location.href='<?php echo base_url() ?>index.php/process/pdf/export/ss/installation/<?php echo $dx ?>'">Download</a>
        <a class="butons" onclick='window.open("<?php echo base_url() ?>index.php/process/pdf/html/ss/installation/<?php echo $dx ?>", "inst_<?php echo $dx ?>", "toolbar=no, resizable=no, menubar=no, scrollbars=yes, width=650, height=700")'>Preview</a>
        </p></div>
       
        <p align="center" style="color:#990;font-size:14px">Punchlist Photos</p>
        <p align="center"><a class="buton" onClick="window.location.href='<?php echo base_url() ?>index.php/process/pdf/export/ss/punchlist/<?php echo $dx ?>'">Download</a>
        <a class="butons" onclick='window.open("<?php echo base_url() ?>index.php/process/pdf/html/ss/punchlist/<?php echo $dx ?>", "punch_<?php echo $dx ?>", "toolbar=no, resizable=no, menubar=no, scrollbars=yes, width=650, height=700")'>Preview</a>
        </p>
		<div class="ifooter"><input type="button" class="buttons ifclose" value="Close"></div>
	</div>
</div>

<?php
break;

case 'photo_atp': case 'photo_atm':

$table = explode('_', $tp);
$Qlist = $this->db->query("SELECT `files`, `note`, `desc` FROM `it_attachment` WHERE `table`='".$table[1]."_freephoto' AND `idx`='$dx' ORDER BY `idx_main_order` ASC") ?>

<div id="ifbox_body">
    <div class="iheader"><?php echo $table[1] ?> Free Photo</div>
    <div class="ibody">
		<?php if($Qlist->num_rows){ ?>
        <div style="width:100%;height:400px;overflow:auto">
        <table width="100%"><tbody>
        <tr>
        <?php
        $j=0;
        foreach($Qlist->result_object() as $list){
            if($j >= 2){ echo '</tr><tr>'; $j=0; } $j++;
            echo '<td width="50%" style="padding:5px">';
            echo '<p align="center"><a href="'.base_url().'media/files/'.$list->files.'" target="_blank"><img src="'.base_url().'media/files/'.$list->files.'" width="100%"></a></p>';
            echo $list->desc;
            if($list->note){
                $note = explode('|', $list->note);
                $la = $this->ifunction->DECtoDMS($note[0]); $lo = $this->ifunction->DECtoDMS($note[1]);
                echo '<p><b>Lat:</b> '.$la["deg"].'&deg; '.$la["min"].'\' '.$la["sec"].'" ('.$note[0].')';
                echo '<br /><b>Lon:</b> '.$lo["deg"].'&deg; '.$lo["min"].'\' '.$lo["sec"].'" ('.$note[1].')';
                echo '<br /><b>LAC:</b> '.$note[2].' <span style="padding:0 20px">&nbsp;</span> <b>Cell ID:</b> '.$note[3];
                echo '<br /><b>Taken Time:</b> '.$note[4].'</p>';
            }
            echo '</td>';
        }
        ?>
        </tr>
        </tbody></table>
        </div>
        <?php } else echo '<div class="warning-box">No photo.</div>' ?>
        <div class="ifooter"><input type="button" class="buttons ifclose" value="Close"></div>
	</div>
</div>

<?php
break;

case 'photo_site':

$Qlist = $this->db->query("
	SELECT a.`name`, a.`barcode`, a.`serial_no`, a.`files`, a.`fl_active`, a.`timelog`, a.`timelog_updated`
	FROM `it_site_part` a
	JOIN `it_site` b ON b.`id`=a.`id` AND b.`site_id`='$dx'
	ORDER BY a.`site_part_id` DESC
");
?>

<div id="ifbox_body">
    <div class="iheader">Part List</div>
    <div class="ibody">
		<?php if($Qlist->num_rows){ ?>
        <div style="width:100%;height:400px;overflow:auto">
        <table width="100%"><tbody>
        <tr>
        <?php
        $j=0;
        foreach($Qlist->result_object() as $list){
            if($j >= 2){ echo '</tr><tr>'; $j=0; } $j++;
            echo '<td width="50%" style="padding:5px">';
            echo '<p align="center"><a href="'.base_url().'media/files/'.$list->files.'" target="_blank"><img src="'.base_url().'media/files/'.$list->files.'" width="100%"></a></p>';
            echo $list->name;
			echo '<p><b>Barcode:</b> '.$list->barcode;
			echo '<br /><b>Manufactur:</b> '.$list->serial_no;
			echo '<br /><b>Taken Time:</b> '.date('d M Y - H:i:s', $list->timelog);
			echo '<br /><br /><b>Status:</b> ';
			if($list->fl_active==0){
				echo '<font color="#F00">Dismantle</font>';
				echo '<br /><b>Moving Time:</b> '.date('d M Y - H:i:s', $list->timelog_updated);
			}
			else echo '<font color="#090"><b>Active</b></font>';
            echo '</td>';
        }
        ?>
        </tr>
        </tbody></table>
        </div>
        <?php } else echo '<div class="warning-box">No data.</div>' ?>
        <div class="ifooter"><input type="button" class="buttons ifclose" value="Close"></div>
	</div>
</div>

<?php
break;

case 'view_atm_reject':
case 'view_atm_pending':
case 'view_atp_reject':
case 'view_atp_pending':
$tps = explode('_', $tp);
$Qcheck = $this->db->query("SELECT `msg_status` FROM `it_$tps[1]` WHERE `$tps[1]_id`='$dx'");
if($Qcheck) $check = $Qcheck->result_object(); else exit('Forbidden!');
$msg = explode('|', $check[0]->msg_status) ?>

<div id="ifbox_body">
    <div class="iheader">Task Status</div>
    <div class="ibody">
       <table border="0" width="100%"><tbody>
       <tr><td width="90">Action Type</td><td width="10">:</td><td style="font-weight:bold;text-transform:capitalize;color:#<?php if($tps[2] == 'reject') echo 'F00'; else echo '060' ?>"><?php echo $tps[2] ?></td></tr>
       <tr><td class="pt9">Time Action</td><td class="pt9">:</td><td class="pt9"><?php echo date('d F Y - H:i', $msg[0]) ?></td></tr>
       <tr><td class="pt9">Message</td><td class="pt9">:</td><td class="pt9"><?php echo nl2br($msg[1]) ?></td></tr>
       </tbody></table>
        <div class="ifooter"><input type="button" class="buttons ifclose" value="Close"></div>
	</div>
</div>

<?php
break;

case 'view_ss_reject':
case 'view_ss_pending':
$tps = explode('_', $tp);
$Qcheck = $this->db->query("SELECT `msg_status` FROM `ss_task` WHERE `task_id`='$dx'");
if($Qcheck) $check = $Qcheck->result_object(); else exit('Forbidden!');
$msg = explode('|', $check[0]->msg_status) ?>

<div id="ifbox_body">
    <div class="iheader">Task Status</div>
    <div class="ibody">
       <table border="0" width="100%"><tbody>
       <tr><td width="90">Action Type</td><td width="10">:</td><td style="font-weight:bold;text-transform:capitalize;color:#<?php if($tps[2] == 'reject') echo 'F00'; else echo '060' ?>"><?php echo $tps[2] ?></td></tr>
       <tr><td class="pt9">Time Action</td><td class="pt9">:</td><td class="pt9"><?php echo date('d F Y - H:i', $msg[0]) ?></td></tr>
       <tr><td class="pt9">Message</td><td class="pt9">:</td><td class="pt9"><?php echo nl2br($msg[1]) ?></td></tr>
       </tbody></table>
        <div class="ifooter"><input type="button" class="buttons ifclose" value="Close"></div>
	</div>
</div>

<?php
break;

case 'action_atp_task': case 'action_ss_task': $tps = explode('_', $tp) ?>

<div id="ifbox_body">
    <div class="iheader">Take Action</div>
    <div class="ibody">
        <div id="iforms_r1" style="text-align:center"></div>
        <form action="<?php echo base_url() ?>index.php/process/action/<?php echo $tps[1] ?>/<?php echo $dx ?>" method="post" id="iforms_f1" onSubmit="return iForms_s(1)">
        <table border="0" width="100%"><tbody>
        <tr height="30"><td width="120" class="pt9">Action Type</td><td width="10" class="pt9">:</td><td>
        <select name="action" class="inputbox w342" onChange="dochange('actions_app', this.value, 0)">
        <option value="1">Approve</option>
        <option value="2">Reject</option>
        <option value="3"><?php echo 'Pending' ?></option>
        </select>
        </td></tr>
        </tbody></table>
        <div id="actions_app"></div>
		<script type="text/javascript">dochange('actions_app', 1, 0)</script>
        <div class="ifooter">
        <input type="hidden" id="timereload" value="1">
        <input type="submit" class="button" value="Submit"> 
        <input type="button" class="buttons ifclose" value="Close">
        </div>
        </form>
	</div>
</div>

<?php
break;

case 'action_atm_task': $tps = explode('_', $tp) ?>

<div id="ifbox_body">
    <div class="iheader">Take Action</div>
    <div class="ibody">
        <div id="iforms_r1" style="text-align:center"></div>
        <form action="<?php echo base_url() ?>index.php/process/action/<?php echo $tps[1] ?>/<?php echo $dx ?>" method="post" id="iforms_f1" onSubmit="return iForms_s(1)">
        <table border="0" width="100%"><tbody>
        <tr height="30"><td width="120" class="pt9">Action Type</td><td width="10" class="pt9">:</td><td>
        <select name="action" class="inputbox w342" onChange="dochange('actions_app', this.value, 0)">
        <option value="99">Approve</option>
        <option value="2">Reject</option>
        <option value="3"><?php echo 'Postpone' ?></option>
        </select>
        </td></tr>
        </tbody></table>
        <div id="actions_app"></div>
		<script type="text/javascript">dochange('actions_app', 99, 0)</script>
        <div class="ifooter">
        <input type="hidden" id="timereload" value="1">
        <input type="submit" class="button" value="Submit"> 
        <input type="button" class="buttons ifclose" value="Close">
        </div>
        </form>
	</div>
</div>

<?php
break;

case 'atp_booked': case 'atm_booked': case 'ss_booked':
$table = explode('_', $tp);
$Qcheck = $this->db->query("
	SELECT a.`timelog`, b.`name`, c.`name` AS `vendor`
	FROM `it_book` a
	JOIN `it_user` b ON b.`user_id`=a.`user_id`
	JOIN `it_vendor` c ON c.`vendor_id`=b.`vendor_id` AND c.`fl_active`=1
	WHERE a.`table`='".$table[0]."' AND a.`idx`='$dx'
");
if($Qcheck) $check = $Qcheck->result_object(); else exit('Forbidden!');
?>

<div id="ifbox_body">
    <div class="iheader"><?php echo $table[0] ?> Book Status</div>
    <div class="ibody">
       <table border="0" width="100%"><tbody>
       <tr height="30"><td width="90">Booked by</td><td width="10">:</td><td><?php echo $check[0]->name ?></td></tr>
       <tr height="30"><td>Booking Time</td><td>:</td><td><?php echo date('d F Y - H:i', $check[0]->timelog) ?></td></tr>
       <tr height="30"><td>Vendor</td><td>:</td><td><?php echo $check[0]->vendor ?></td></tr>
       </tbody></table>
        <div class="ifooter"><input type="button" class="buttons ifclose" value="Close"></div>
	</div>
</div>

<?php
break;

case 'atp_checked': case 'atm_checked': case 'ss_checked':
$table = explode('_', $tp);
if($table[0]=='atp'){
	$tables = 'it_atp';
	$tables_id = 'atp_id';
	$st_site = 'site_id';
	$path = 'atp_checkin';
	$photo_path = 'files/';
}elseif($table[0]=='ss'){
	$tables = 'ss_task';
	$tables_id = 'task_id';
	$st_site = 'site_id';
	$path = 'ss_checkin';
	$photo_path = 'ss/checkin/';
}else{
	$tables = 'it_atm';
	$tables_id = 'atm_id';
	$st_site = 'from_site';
	$path = 'atm_checkin';
	$photo_path = 'files/';
}

$Qcheck = $this->db->query("
	SELECT a.`latitude`, a.`longitude`, a.`timelog`, b.`name`, c.`name` AS `vendor`, d.`files`, f.`latitude` AS `latitude_b`, f.`longitude` AS `longitude_b`, g.`files` AS `files_atsite`
	FROM `it_checkin` a
	JOIN `it_user` b ON b.`user_id`=a.`user_id`
	JOIN `it_vendor` c ON c.`vendor_id`=b.`vendor_id` AND c.`fl_active`=1
	LEFT JOIN `it_attachment` d ON d.`table`='$path' AND d.`user_id`=a.`user_id` AND d.`idx`=a.`idx`
	LEFT JOIN `it_attachment` g ON g.`table`='".$table[0]."_indosat_foto' AND g.`idx`=a.`idx`
	JOIN `$tables` e ON e.`$tables_id`=a.`idx`
	JOIN `it_site` f ON f.`site_id`=e.`$st_site`
	WHERE a.`table`='".$table[0]."' AND a.`idx`='$dx'
");
if($Qcheck) $check = $Qcheck->result_object(); else exit('Forbidden!');
$la = $this->ifunction->DECtoDMS($check[0]->latitude); $lo = $this->ifunction->DECtoDMS($check[0]->longitude);
?>

<div id="ifbox_body">
    <div class="iheader"><?php echo $table[0] ?> Check-In Status</div>
    <div class="ibody">
        <table border="0" width="100%"><tbody>
        <tr height="30"><td width="90">Checked by</td><td width="10">:</td><td><?php echo $check[0]->name ?></td></tr>
        <tr><td>Check-in Time</td><td>:</td><td>
        <?php echo date('d F Y - H:i', $check[0]->timelog) ?>
        <table style="margin:5px 0 10px 0">
        <tr><td width="65">Latitude</td><td>: <?php echo $la["deg"] ?>&deg; <?php echo $la["min"] ?>' <?php echo $la["sec"] ?>" (<?php echo $check[0]->latitude ?>)</td></tr>
        <tr><td>Longitude</td><td>: <?php echo $lo["deg"] ?>&deg; <?php echo $lo["min"] ?>' <?php echo $lo["sec"] ?>" (<?php echo $check[0]->longitude ?>)</td></tr>
        </table>
        </td></tr>
        <tr height="30"><td>Vendor</td><td>:</td><td><?php echo $check[0]->vendor ?></td></tr>
        </tbody></table>
        <div id="<?php echo $table[0] ?>_<?php echo $dx ?>"><a class="maps_detail" id="<?php echo $dx ?>" c="<?php echo $table[0] ?>" dx="2" geo="<?php echo $check[0]->latitude.':'.$check[0]->longitude.':'.$check[0]->latitude_b.':'.$check[0]->longitude_b ?>"><img style="border:1px solid #D3D3D3;background:url(http://maps.google.com/maps/api/staticmap?size=450x140&markers=color:0xBC1010|<?php echo $check[0]->latitude ?>,<?php echo $check[0]->longitude ?>&zoom=15&sensor=false) center center;width:450px;height:90px" src="<?php echo base_url() ?>static/i/spacer.gif"></a></div>
        
        <?php if($check[0]->files){ ?><div style="margin:5px 0;border:1px solid #D3D3D3"><a href="<?php echo base_url() ?>media/<?php echo $photo_path.$check[0]->files ?>" target="_blank"><img src="<?php echo base_url() ?>media/<?php echo $photo_path.$check[0]->files ?>" style="width:100%"></a></div><?php } ?>
        
        <?php if($check[0]->files_atsite){ ?><div style="margin:5px 0;border:1px solid #D3D3D3"><a href="<?php echo base_url() ?>media/<?php echo $photo_path.$check[0]->files_atsite ?>" target="_blank"><img src="<?php echo base_url() ?>media/<?php echo $photo_path.$check[0]->files_atsite ?>" style="width:100%"></a></div><?php } ?>
        <div class="ifooter"><input type="button" class="buttons ifclose" value="Close"></div>
	</div>
</div>

<?php
break;

case 'atm_app_wh': case 'atm_app_vendor': case 'atm_app_consultant': case 'atm_app_nom': case 'atm_app_indosat':
case 'atp_app_supervisor': case 'atp_app_manager': case 'atp_app_indosat':
case 'ss_app_supervisor': case 'ss_app_manager': case 'ss_app_indosat':

$dxx = explode('-', $dx);
$tpe = explode('_', $tp);
$Qhistory = $this->db->query("
	SELECT a.`action`, a.`note`, a.`timelog`, b.`role_id`, b.`name`, c.`name` AS `role`
	FROM `it_log_app` a
	JOIN `it_user` b ON b.`user_id`=a.`user_id`
	JOIN `it_role` c ON b.`role_id`=c.`role_id`
	WHERE a.`table`='$tpe[0]' AND a.`idx`='$dxx[0]'
	ORDER BY a.`timelog` DESC LIMIT 1
");
$history = $Qhistory->result_object();
?>

<div id="ifbox_body">
    <div class="iheader">Take Action</div>
    <div class="ibody">
    	
        <?php if($history[0]->timelog){ ?>
       <table border="0" width="100%" style="border:1px dotted #BBB;margin:0 0 10px 0"><tbody>
       <tr><td colspan="3" style="background:#EEE;border-bottom:1px dotted #BBB;padding:5px 0;text-align:center">Response from <b><?php echo $history[0]->role ?></b></td></tr>
       <tr height="25"><td width="90">&nbsp; Name</td><td width="10">:</td><td><?php echo $history[0]->name ?></td></tr>
       <tr height="25"><td>&nbsp; Time</td><td>:</td><td><?php echo date('d F Y - H:i', $history[0]->timelog) ?></td></tr>
       <tr height="25"><td>&nbsp; Status</td><td>:</td><td>[<b>
	   <?php
       if($history[0]->action == 3){
		  echo '<font color="#FF0000">';  if($history[0]->role_id == 5) echo 'Reject'; else echo 'Not OK'; echo '</font>';
	   }else{
		   echo '<font color="#006600">';  if($history[0]->role_id == 5) echo 'Approve'; else echo 'OK'; echo '</font>';
	   }
	   ?>
       </b>]</td></tr>
       <?php if($history[0]->note) echo '<tr><td>&nbsp; Message</td><td>:</td><td style="padding:0 0 5px 0">'.nl2br($history[0]->note).'</td></tr>' ?>
       </tbody></table>
       <?php } ?>
       
        <div id="iforms_r1" style="text-align:center"><div class="info-box">Select your action:</div></div>
        <form action="<?php echo base_url() ?>index.php/process/app/<?php echo $tp ?>/<?php echo $dx ?>" method="post" id="iforms_f1" onSubmit="return iForms_s(1)">
        <table border="0" width="100%"><tbody>
        <tr height="30"><td width="120" class="pt9">Action Type</td><td width="10" class="pt9">:</td><td>
        <select name="action" class="inputbox w342" onChange="dochange('action_app', this.value, '<?php echo $tpe[0] ?>')">
        <option value="1">Approve</option>
        <option value="2">Approve with Remark</option>
        <option value="3">Reject</option>
        <?php if($_SESSION['isat']['role'] <> 8) echo '<option value="4">Delegate</option>' ?>
        </select>
        </td></tr>
        </tbody></table>
        <div id="action_app"></div>
        <div class="ifooter">
        <input type="hidden" id="timereload" value="2">
        <input type="submit" class="button" value="Submit"> 
        <input type="button" class="buttons ifclose" value="Close">
        </div>
        </form>
	</div>
</div>

<?php
break;

case 'atm_delegate_vendor': case 'atm_delegate_consultant': case 'atm_delegate_nom': case 'atm_delegate_indosat':
case 'atp_delegate_supervisor': case 'atp_delegate_manager': case 'atp_delegate_indosat':
case 'ss_delegate_supervisor': case 'ss_delegate_manager': case 'ss_delegate_indosat':
$tpx = explode('_', $tp) ?>

<div id="ifbox_body">
    <div class="iheader">Take Action</div>
    <div class="ibody">
        <div id="iforms_r1" style="text-align:center"></div>
        <form action="<?php echo base_url() ?>index.php/process/delegate/<?php echo $tp ?>/<?php echo $dx ?>" method="post" id="iforms_f1" onSubmit="return iForms_s(1)">
        <table border="0" width="100%"><tbody>
        <tr height="30"><td width="120" class="pt9"> <?php if($tpx[0] == 'atm') echo 'Result'; else echo 'Action Type' ?></td><td width="10" class="pt9">:</td><td>
        <select name="action" class="inputbox w342" onChange="dochange('action_app', this.value, 0)">
        <?php if($tpx[0] == 'atm') echo '<option value="2">OK</option><option value="3">Not OK</option>'; else echo '<option value="1">Approve</option><option value="2">Approve with Remark</option><option value="3">Reject</option>' ?>
        </select>
        </td></tr>
        </tbody></table>
        <div id="action_app"><?php if($tpx[0] == 'atm') echo '<table border="0" width="100%"><tbody><tr><td width="120" class="pt5">Reason</td><td width="10" class="pt5">:</td><td><textarea name="note" class="inputbox h100 w330"></textarea></td></tr></tbody></table>' ?></div>
        <div class="ifooter">
        <input type="hidden" id="timereload" value="2">
        <input type="submit" class="button" value="Submit"> 
        <input type="button" class="buttons ifclose" value="Close">
        </div>
        </form>
	</div>
</div>

<?php
break;

case 'atm_msg_wh': case 'atm_msg_vendor': case 'atm_msg_consultant': case 'atm_msg_nom': case 'atm_msg_indosat':
case 'atp_msg_supervisor': case 'atp_msg_manager': case 'atp_msg_indosat':
case 'ss_msg_supervisor': case 'ss_msg_manager': case 'ss_msg_indosat':

$tpe = explode('_', $tp);

if($tpe[0]=='ss'){
	
	if($tpe[2] == 'supervisor') $user_id='user_pmvendor'; elseif($tpe[2] == 'manager') $user_id='user_consultant'; else $user_id='user_pmisat';
	 
	$Qcheck = $this->db->query("
		SELECT b.`user_id`, b.`name`, c.`name` AS `role`
		FROM `ss_task` a
		JOIN `it_user` b ON b.`user_id`=a.`$user_id`
		JOIN `it_role` c ON b.`role_id`=c.`role_id`
		WHERE a.`task_id`='$dx'
	");
	$check = $Qcheck->result_object();
}else{
	$table = 'it_'.$tpe[0];
	$field = $tpe[0].'_id';
	if($tpe[0]=='atp') $user_id = 'uid_'.$tpe[2]; else $user_id = 'user_'.$tpe[2];
	
	$Qcheck = $this->db->query("
		SELECT b.`user_id`, b.`name`, c.`name` AS `role`
		FROM `$table` a
		JOIN `it_user` b ON b.`user_id`=a.`$user_id`
		JOIN `it_role` c ON b.`role_id`=c.`role_id`
		WHERE a.`$field`='$dx'
	");
	$check = $Qcheck->result_object();
}

$Qhistory = $this->db->query("
	SELECT a.`action`, a.`note`, a.`timelog`, b.`name`, c.`name` AS `role`
	FROM `it_log_app` a
	JOIN `it_user` b ON b.`user_id`=a.`user_id`
	JOIN `it_role` c ON b.`role_id`=c.`role_id`
	WHERE a.`table`='$tpe[0]' AND a.`idx`='$dx'
	ORDER BY a.`timelog` DESC
");

$Qlast = $this->db->query("SELECT `action`, `note`, `timelog` FROM `it_log_app` WHERE `idx`='$dx' AND `table`='$tpe[0]' AND `user_id`='".$check[0]->user_id."' ORDER BY `timelog` DESC LIMIT 1");
$last = $Qlast->result_object();

?>

<div id="ifbox_body">
    <div class="iheader"><?php echo $tpe[0] ?> - Action History</div>
    <div class="ibody">
    	
        <?php if($last[0]->action){ ?>
        <table border="0" width="100%" style="margin:0 0 10px 0;border:1px dotted #BBB"><tbody>
        <tr><td colspan="3" style="background:#EEE;border-bottom:1px dotted #BBB;padding:5px 0;text-align:center">Last Action from <b><?php echo $check[0]->role ?></b></td></tr>
        <tr height="25"><td width="90">&nbsp; Name</td><td width="10">:</td><td><?php echo $check[0]->name ?></td></tr>
        <tr height="25"><td>&nbsp; Time</td><td>:</td><td><?php echo date('d F Y - H:i', $last[0]->timelog) ?></td></tr>
        <tr height="25"><td>&nbsp; Action</td><td>:</td><td>
        [<b><?php if($last[0]->action == 3) echo '<font color="#FF0000">Reject</font>'; else echo '<font color="#006600">Approve</font>' ?></b>]</td></tr>
        <?php if($last[0]->note){ ?><tr><td>&nbsp; Message</td><td>:</td><td style="padding:0 0 5px 0"><?php echo nl2br($last[0]->note) ?></td></tr><?php } ?>
        </tbody></table>
        <?php } ?>
        
        <?php if($Qhistory->num_rows){ if($Qhistory->num_rows > 5) echo '<div style="height:154px;overflow:auto;width:450px">' ?>
        	<table class="table" border="0" width="100%">
            <thead>
            <tr>
            	<th width="50">Action</th><th width="65">Time</th><th width="130">Name</th><th>Message</th>
            </tr>
            </thead>
            <tbody>
			<?php foreach($Qhistory->result_object() as $history){ ?>
            <tr>
            	<td align="center"><?php if($history->action == 3) echo '<font color="#FF0000">Reject</font>'; else echo '<font color="#006600">Approve</font>' ?></td>
                <td align="center"><?php echo date('d M y', $history->timelog).'<br>'.date('H:i', $history->timelog) ?></td>
                <td><?php echo '<font color="#0066FF">['.$history->role.']</font><br>'.$history->name ?></td>
                <td><?php if($history->note) echo $history->note; else echo '-' ?></td>
            </tr>
            <?php } ?>
            </tbody></table>
		<?php if($Qhistory->num_rows > 1) echo '</div>'; } ?>
        <div class="ifooter"><input type="button" class="buttons ifclose" value="Close"></div>
	</div>
</div>

<?php
break;

case 'atm_msgs_wh': case 'atm_msgs_vendor': case 'atm_msgs_consultant': case 'atm_msgs_nom': case 'atm_msgs_indosat':
case 'atp_msgs_supervisor': case 'atp_msgs_manager': case 'atp_msgs_indosat'://ss belum

$tpe = explode('_', $tp);
$table = 'it_'.$tpe[0];
$field = $tpe[0].'_id';
$user_id = 'uid_'.$tpe[2];
$msg = 'msg_'.$tpe[2];

$Qcheck = $this->db->query("
	SELECT a.`$msg`, a.`fl_reject`, b.`user_id`, b.`name`, c.`name` AS `role`
	FROM `$table` a
	JOIN `it_user` b ON b.`user_id`=a.`$user_id`
	JOIN `it_role` c ON b.`role_id`=c.`role_id`
	WHERE a.`$field`='$dx'
");
if($Qcheck) $check = $Qcheck->result_object(); else exit('Forbidden!');

$Qlast = $this->db->query("SELECT `action`, `note`, `timelog` FROM `it_log_app` WHERE `idx`='$dx' AND `table`='$tpe[0]' AND `user_id`='".$check[0]->user_id."' ORDER BY `timelog` DESC LIMIT 1"); $last = $Qlast->result_object();
				
$note = explode('|', $check[0]->$msg) ?>

<div id="ifbox_body">
    <div class="iheader"><?php echo $tpe[0] ?> - Message Action</div>
    <div class="ibody">
        <table border="0" width="100%" style="margin:0 0 10px 0;border:1px dotted #BBB"><tbody>
        <tr><td colspan="3" style="background:#EEE;border-bottom:1px dotted #BBB;padding:5px 0;text-align:center">Last Action from <b><?php echo $check[0]->role ?></b></td></tr>
        <tr height="25"><td width="90">&nbsp; Name</td><td width="10">:</td><td><?php echo $check[0]->name ?></td></tr>
        <tr height="25"><td>&nbsp; Time</td><td>:</td><td><?php echo date('d F Y - H:i', $last[0]->timelog) ?></td></tr>
        <tr height="25"><td>&nbsp; Action</td><td>:</td><td>
        [<b><?php if($last[0]->action == 3) echo '<font color="#FF0000">Reject</font>'; else echo '<font color="#006600">Approve</font>' ?></b>]</td></tr>
        <?php if($last[0]->note){ ?><tr><td>&nbsp; Message</td><td>:</td><td style="padding:0 0 5px 0"><?php echo nl2br($last[0]->note) ?></td></tr><?php } ?>
        </tbody></table>
        <div class="ifooter"><input type="button" class="buttons ifclose" value="Close"></div>
	</div>
</div>

<?php
break;
	
case 'add_site': if(!in_array($_SESSION['isat']['role'], array('1', '2', '5'), true)) die(':P') ?>

<div id="ifbox_body">
    <div class="iheader">Add Site</div>
    <div class="ibody">
        <div id="iforms_r1" style="text-align:center"></div>
        <form action="<?php echo base_url() ?>index.php/process/add_site" method="post" id="iforms_f1" onSubmit="return iForms_s(1)">
        <table border="0" width="100%"><tbody>
        <tr height="30"><td width="120">Type</td><td width="10">:</td><td>
        <label><input type="radio" name="tp" value="site" checked="checked" onClick="$('.stp').html('Site')"> Site</label>
        <span style="padding:0 10px">&nbsp; </span>
        <label><input type="radio" name="tp" value="wh" onClick="$('.stp').html('Warehouse')"> Warehouse</label>
        </td></tr>
        <tr height="30"><td class="pt9"><span class="stp">Site</span> ID</td><td class="pt9">:</td><td><input type="text" maxlength="50" class="inputbox w330" name="id"></td></tr>
        <tr height="30"><td class="pt9"><span class="stp">Site</span> Name</td><td class="pt9">:</td><td><input type="text" maxlength="150" class="inputbox w330" name="name"></td></tr>
        <tr height="30"><td class="pt9">Address</td><td class="pt9">:</td><td><input type="text" maxlength="250" class="inputbox w330" name="address"></td></tr>
        <tr height="30"><td class="pt9">City</td><td class="pt9">:</td><td><input type="text" maxlength="50" class="inputbox w330" name="city"></td></tr>
        <tr height="30"><td class="pt9">Province</td><td class="pt9">:</td><td><input type="text" maxlength="50" class="inputbox w330" name="province"></td></tr>
        <tr height="30"><td class="pt9">Geo Location</td><td class="pt9">:</td><td>
        <input type="text" class="inputbox w150" name="latitude" placeholder="Latitude:">
        <span style="padding:0 5px"></span>
        <input type="text" class="inputbox w150" name="longitude" placeholder="Longitude:">
        </td></tr>
        </tbody></table>
        <div class="ifooter">
        <input type="hidden" id="timereload" value="2">
        <input type="submit" class="button" value="Submit"> 
        <input type="button" class="buttons ifclose" value="Close">
        </div>
        </form>
	</div>
</div>

<?php
break;

case 'ed_site': if(!in_array($_SESSION['isat']['role'], array('1', '2', '3', '5'), true)) die(':P');
if(in_array($_SESSION['isat']['role'], array('2', '3'), true)) $disabled = '" disabled="disabled'; else $disabled = '';
$Qcheck = $this->db->query("SELECT CASE `type` WHEN 'site' THEN 'Site' ELSE 'Warehouse' END AS `type`, `id`, `name`, `address`, `city`, `province`, `latitude`, `longitude` FROM `it_site` WHERE `site_id`='$dx'");
if($Qcheck) $check = $Qcheck->result_object(); else exit('Forbidden!') ?>

<div id="ifbox_body">
    <div class="iheader">Edit Site</div>
    <div class="ibody">
        <div id="iforms_r1" style="text-align:center"></div>
		<?php if(!$disabled) echo '<form action="'.base_url().'index.php/process/ed_site/'.$dx.'" method="post" id="iforms_f1" onSubmit="return iForms_s(1)">' ?>
        <table border="0" width="100%"><tbody>
        <tr height="30"><td width="120">Type</td><td width="10">:</td><td>
        <label><input type="radio" name="tp" value="site" onClick="$('.stp').html('Site')"<?php if($check[0]->type=='Site') echo ' checked="checked"' ?>> Site</label>
        <span style="padding:0 10px">&nbsp; </span>
        <label><input type="radio" name="tp" value="wh" onClick="$('.stp').html('Warehouse')"<?php if($check[0]->type=='Warehouse') echo ' checked="checked"' ?>> Warehouse</label>
        </td></tr>
        <tr height="30"><td class="pt9"><span class="stp"><?php echo $check[0]->type ?></span> ID</td><td class="pt9">:</td><td><input type="text" maxlength="50" class="inputbox w330" name="id" value="<?php echo $check[0]->id.$disabled ?>"></td></tr>
        <tr height="30"><td class="pt9"><span class="stp"><?php echo $check[0]->type ?></span> Name</td><td class="pt9">:</td><td><input type="text" maxlength="150" class="inputbox w330" name="name" value="<?php echo $check[0]->name.$disabled ?>"></td></tr>
        <tr height="30"><td class="pt9">Address</td><td class="pt9">:</td><td><input type="text" maxlength="250" class="inputbox w330" name="address" value="<?php echo $check[0]->address.$disabled ?>"></td></tr>
        <tr height="30"><td class="pt9">City</td><td class="pt9">:</td><td><input type="text" maxlength="50" class="inputbox w330" name="city" value="<?php echo $check[0]->city.$disabled ?>"></td></tr>
        <tr height="30"><td class="pt9">Province</td><td class="pt9">:</td><td><input type="text" maxlength="50" class="inputbox w330" name="province" value="<?php echo $check[0]->province.$disabled ?>"></td></tr>
        <tr height="30"><td class="pt9">Geo Location</td><td class="pt9">:</td><td>
        <input type="text" class="inputbox w150" name="latitude" placeholder="Latitude:" value="<?php echo $check[0]->latitude.$disabled ?>">
        <span style="padding:0 5px"></span>
        <input type="text" class="inputbox w150" name="longitude" placeholder="Longitude:" value="<?php echo $check[0]->longitude.$disabled ?>">
        </td></tr>
        </tbody></table>
        <div class="ifooter">
        <input type="hidden" id="timereload" value="2">
        <?php if(!$disabled) echo '<input type="submit" class="button" value="Save Changes"> ' ?>
        <input type="button" class="buttons ifclose" value="Close">
        </div>
        <?php if(!$disabled) echo '</form>' ?>
	</div>
</div>

<?php
break;

case 'ed_neid': if(!in_array($_SESSION['isat']['role'], array('1', '2', '3', '5'), true)) die(':P');
$Qcheck = $this->db->query("SELECT `id`, `name` FROM `it_site` WHERE `site_id`='$dx'");
if($Qcheck) $check = $Qcheck->result_object(); else exit('Forbidden!');
$Qlist = $this->db->query("SELECT `neid` FROM `it_network` WHERE `id`='".$check[0]->id."'") ?>

<div id="ifbox_body">
    <div class="iheader">Network ID</div>
    <div class="ibody">
    	<h1 style="border-bottom:1px solid #666">Network ID (<?php echo $check[0]->name ?>)<span style="float:right;font-weight:normal"><?php echo $check[0]->id ?></span></h1>
        <?php if($Qlist->num_rows){ ?>
    	<div style="height:110px;overflow:auto;margin:0 0 15px 0">
        <ul style="list-style:none;margin:0;line-height:2">
    	<?php
		foreach($Qlist->result_object() as $list){
			echo '<li id="list_neid_'.$list->neid.'_'.$dx.'" style="border-bottom:1px dotted #CCC">';
			echo '<a class="remove" id="'.$list->neid.'_'.$dx.'" c="neid" t="Network ID"><img src="'.config_item('base_static').'i/icon_delete.png" title="Remove" style="vertical-align:middle"></a> ';
			echo '<span id="attr_neid_'.$list->neid.'_'.$dx.'">'.$list->neid.'</span>';
			echo '</li>';
		}
		?>
        </ul>
        </div>
        <?php } else echo '<div class="info-box" style="margin-top:2px">No Network ID for this site.</div>' ?>
        
        <div id="iforms_r1" style="text-align:center"></div>
        <form action="<?php echo base_url() ?>index.php/process/add_neid/<?php echo $dx.'.'.$check[0]->id ?>" method="post" id="iforms_f1" onSubmit="return iForms_s(1)">
        <table border="0" width="100%"><tbody>
        <tr><td width="75" class="pt9">Network ID</td><td width="10" class="pt9">:</td><td>
        <?php for($i = 1; $i < 4; $i++) echo $i.'. <input type="text" maxlength="25" class="inputbox w330" name="neid[]"><br />' ?>
        </td></tr>
        </tbody></table>
        <div class="ifooter">
        <input type="hidden" id="timeout" value="2">
        <input type="submit" class="button" value="Submit"> 
        <input type="button" class="buttons ifclose" value="Close">
        </div>
        </form>
	</div>
</div>

<?php
break;

case 'ed_boq_dpack':
$arr_brand = array('miniMCE', 'atpFilter', 'atpPowersupply', 'ericsson2G', 'ericsson3G', 'ericssonMicrowave'/*, 'zteMicrowave', 'zte2G', 'zte3G'*/);
$arr_brands = array('Mini CME', 'ATP Filter', 'ATP Power Supply', 'Ericsson 2G', 'Ericsson 3G', 'Microwave Ericsson'/*, 'Microwave ZTE', 'ZTE 2G', 'ZTE 3G'*/);

$Qlist = $this->db->query("SELECT `table`, `files` FROM `it_attachment` WHERE `table` IN('boq_miniMCE', 'boq_atpFilter', 'boq_atpPowersupply', 'boq_ericsson2G', 'boq_ericsson3G', 'boq_ericssonMicrowave', 'dpc_miniMCE', 'dpc_atpFilter', 'dpc_atpPowersupply', 'dpc_ericsson2G', 'dpc_ericsson3G', 'dpc_ericssonMicrowave') AND `idx`='$dx'");//, 'boq_zteMicrowave', 'boq_zte2G', 'boq_zte3G', 'dpc_zteMicrowave', 'dpc_zte2G', 'dpc_zte3G'
foreach($Qlist->result_object() as $list){
	$field = $list->table;
	$$field = $list->files;
}

if($_SESSION['isat']['role']==3) $disabled = '" disabled="disabled'; else $disabled = '';

?>

<div id="ifbox_body">
    <div class="iheader">Site BOQ / Design Pack</div>
    <div class="ibody">
        <div id="iforms_r1" style="text-align:center"></div>
		<?php if(!$disabled) echo '<form action="'.base_url().'index.php/process/boq_dpack/'.$dx.'" method="post" id="iforms_f1" enctype="multipart/form-data" onSubmit="return iForms_s(1)">' ?>
        
        <div style="height:350px;overflow:auto">
        <div style="float:left;width:310px">
        <?php for($i=0; $i < 3; $i++){ ?>
        <h1 style="margin:10px 0 0 0;border-bottom:1px solid #666"><?php echo $arr_brands[$i] ?> Document</h1>
        <p style="padding:10px 10px 25px 10px;margin:0;background:#DDD">
        BOQ file:<br><input type="file" name="boq_<?php echo $arr_brand[$i].$disabled ?>" class="inputbox">
        <?php $boq = 'boq_'.$arr_brand[$i]; if($$boq) echo ' &nbsp;&raquo; <a href="'.base_url().'media/files/'.$$boq.'" target="_blank">View</a><input type="hidden" name="old_'.$boq.'" value="'.$$boq.'">' ?><br>
        Design Pack file:<br><input type="file" name="dpc_<?php echo $arr_brand[$i].$disabled ?>" class="inputbox">
        <?php $dpc = 'dpc_'.$arr_brand[$i]; if($$dpc) echo ' &nbsp;&raquo; <a href="'.base_url().'media/files/'.$$dpc.'" target="_blank">View</a><input type="hidden" name="old_'.$dpc.'" value="'.$$dpc.'">' ?>
        </p>
        <?php } ?>
        </div>
        
        <div style="float:right;width:310px">
        <?php for($i=3; $i < 6; $i++){ ?>
        <h1 style="margin:10px 0 0 0;border-bottom:1px solid #666"><?php echo $arr_brands[$i] ?> Document</h1>
        <p style="padding:10px 10px 25px 10px;margin:0;background:#DDD">
        BOQ file:<br><input type="file" name="boq_<?php echo $arr_brand[$i].$disabled ?>" class="inputbox">
        <?php $boq = 'boq_'.$arr_brand[$i]; if($$boq) echo ' &nbsp;&raquo; <a href="'.base_url().'media/files/'.$$boq.'" target="_blank">View</a><input type="hidden" name="old_'.$boq.'" value="'.$$boq.'">' ?><br>
        Design Pack file:<br><input type="file" name="dpc_<?php echo $arr_brand[$i].$disabled ?>" class="inputbox">
        <?php $dpc = 'dpc_'.$arr_brand[$i]; if($$dpc) echo ' &nbsp;&raquo; <a href="'.base_url().'media/files/'.$$dpc.'" target="_blank">View</a><input type="hidden" name="old_'.$dpc.'" value="'.$$dpc.'">' ?>
        </p>
        <?php } ?>
        </div>
        
        <div class="clear"></div>
        </div>
        
        <div class="ifooter">
        <input type="hidden" id="timeout" value="2">
        <?php if(!$disabled) echo '<input type="submit" class="button" value="Upload"> ' ?>
        <input type="button" class="buttons ifclose" value="Close">
        </div>
        <?php if(!$disabled) echo '</form>' ?>
	</div>
</div>

<?php
break;

case 'ed_attach':

$arr_brand = array('miniMCE', 'atpFilter', 'atpPowersupply', 'ericsson2G', 'ericsson3G', 'ericssonMicrowave'/*, 'zteMicrowave', 'zte2G', 'zte3G'*/);
$arr_brands = array('Mini CME', 'ATP Filter', 'ATP Power Supply', 'Ericsson 2G', 'Ericsson 3G', 'Microwave Ericsson'/*, 'Microwave ZTE', 'ZTE 2G', 'ZTE 3G'*/);
if($_SESSION['isat']['role']==3) $disabled = ' disabled="disabled"'; else $disabled = '';

?>

<div id="ifbox_body">
    <div class="iheader">Site Attachments</div>
    <div class="ibody">
        <div id="iforms_r1" style="text-align:center"></div>
		<?php if(!$disabled) echo '<form action="'.base_url().'index.php/process/site_attachment/attach/'.$dx.'" method="post" id="iforms_f1" onSubmit="return iForms_s(1)">'; ?>
        <div style="height:350px;overflow:auto">
        
        <?php for($i=0; $i < 6; $i++){ ?>
        <div class="alist">
        <div style="float:left;width:340px">
        <h1>List of <?php echo $arr_brands[$i] ?> Attachment's</h1>
        <div style="height:140px;overflow:auto">
        <?php
        $atc = 'atc_'.$arr_brand[$i];
        
        $Qlist = $this->db->query("
            SELECT a.`attachment_id`, a.`files`, a.`timelog`, b.`user_id`, b.`name`
            FROM `it_attachment` a
            JOIN `it_user` b ON b.`user_id`=a.`user_id`
            WHERE a.`table`='$atc' AND a.`idx`='$dx'
        ");	
        if($Qlist->num_rows){
            echo '<ol style="line-height:2;margin-left:20px">';
            foreach($Qlist->result_object() as $list){
                echo '<li id="list_site_attachment_'.$list->attachment_id.'">by: <a href="'.base_url().'media/files/'.$list->files.'" target="_blank">'.$list->name.'</a> <span style="font-size:9px">('.date('d M Y', $list->timelog).')</span> ';
                if($_SESSION['isat']['uid'] == $list->user_id) echo '<a class="remove" id="'.$list->attachment_id.'" c="site_attachment" t="'.$arr_brands[$i].' Attachment" title="Delete"><img id="attr_site_attachment_'.$list->attachment_id.'" src="'.base_url().'static/i/icon_delete.png" alt="x" style="vertical-align:middle"></a></li>'; else echo '<img src="'.base_url().'static/i/icon_deletex.png" alt="x" title="Disabled" style="vertical-align:middle"></li>';
            }
            echo '</ol>';
        }
        else echo '<p class="info-box" style="margin-top:5px">No data.</p>';
        ?>
        </div>
        </div>
        
        <div style="float:right;width:270px">
        <h1>Add <?php echo $arr_brands[$i] ?> Attachment's</h1>
        <div style="height:140px;overflow:auto">
        <?php for($j=0; $j < 3; $j++) echo '<li><input type="file" name="'.$atc.'[]" class="inputbox"'.$disabled.'></li>' ?>
        </div>
        </div>
        
        <div class="clear"></div>
        </div>
        <?php } ?>
        
        </div>
        <div class="ifooter">
        <input type="hidden" id="timeout" value="2">
        <?php if(!$disabled) echo '<input type="submit" class="button" value="Upload"> ' ?>
        <input type="button" class="buttons ifclose" value="Close">
        </div>
        <?php if(!$disabled) echo '</form>' ?>
	</div>
</div>

<?php
break;

case 'part_site': if(!in_array($_SESSION['isat']['role'], array('1', '2', '3', '5'), true)) die(':P');
$Qlist = $this->db->query("SELECT `site_part_id`, `from`, `to`, `name`, `barcode`, `serial_no`, `files`, `timelog`, `fl_active` FROM `it_site_part` WHERE `id`='$dx' ORDER BY `site_part_id` ASC") ?>

<div id="ifbox_body">
    <div class="iheader">Part List</div>
    <div class="ibody">
    	<?php if($Qlist->num_rows){ ?>
        <table width="100%">
        <thead>
        <tr height="25">
            <th align="center">Name</th>
            <th <?php if($Qlist->num_rows < 15) echo 'align="center" width="160"'; else echo 'width="122"' ?>>Barcode</th>
            <th <?php if($Qlist->num_rows < 15) echo 'align="center" width="130"'; else echo 'width="125"' ?>>Serial Number</th>
        </tr>
        </thead>
        </table>
        <?php if($Qlist->num_rows > 14) echo '<div style="height:225px;overflow:auto">' ?>
        <table class="table-dashboard">
        <tbody>
    	<?php
		$i=0;
		foreach($Qlist->result_object() as $list){
			if($list->fl_active==1):
			?>
            <tr valign="top" id="list_site_part_<?php echo $list->site_part_id ?>">
                <td width="40"><?php if($_SESSION['isat']['role']==3) echo '<img src="'.base_url().'static/i/icon_deletex.png" title="Disabled">'; else echo '<a class="remove" id="'.$list->site_part_id.'" c="site_part" t="Part"><img src="'.base_url().'static/i/icon_delete.png" title="Remove"></a>' ?> <a href="<?php echo base_url() ?>media/files/<?php echo $list->files ?>" target="_blank"><img src="<?php echo base_url() ?>static/i/icon_image.png" title="Photo"></a></td>
				<td id="attr_site_part_<?php echo $list->site_part_id ?>"><?php if($list->from) echo '<a onclick="alert(\'Receive from site: '.$list->from.'\')">'.$list->name.'</a>'; else echo $list->name ?></td>
                <td align="center" width="150"><?php echo $list->barcode;?></td>
                <td align="center" width="130"><?php echo $list->serial_no ?></td>
            </tr>
            <?php
			$i++;
			else:
			?>
            <tr valign="top">
                <td width="40"><img src="<?php echo base_url() ?>static/i/icon_deletex.png" title="Disabled"> <a href="<?php echo base_url() ?>media/files/<?php echo $list->files ?>" target="_blank"><img src="<?php echo base_url() ?>static/i/icon_image.png" title="Photo"></a></td>
                <td><a onClick="alert('Moved to site: <?php echo $list->to ?>')"><?php echo $list->name ?></a></td>
                <td align="center" width="150"><?php echo $list->barcode;?></td>
                <td align="center" width="130"><?php echo $list->serial_no ?></td>
            </tr>
            <?php
			endif;
			$last=$list->timelog;
		}
		?>
        </tbody></table>
        <?php if($Qlist->num_rows > 14) echo '</div>' ?>
        <?php } else echo '<div class="warning-box">No data.</div>' ?>
		<div class="ifooter"><?php if($Qlist->num_rows) echo '<span style="float:left;color:#999">Total: <b>'.$i.'</b> active parts. &nbsp;<i>('.date('d M Y - H:i', $last).')</i></span>' ?><input type="button" class="buttons ifclose" value="Close"></div>
	</div>
</div>

<?php
break;

case 'master_barcode': if(!in_array($_SESSION['isat']['role'], array('1', '2', '3', '5'), true)) die(':P');
$Qcheck = $this->db->query("SELECT `id`, `name` FROM `it_site` WHERE `site_id`='$dx'");
if($Qcheck) $check = $Qcheck->result_object(); else exit('Forbidden!')  ?>

<div id="ifbox_body">
    <div class="iheader">Master Barcode</div>
    <div class="ibody">
        <div id="iforms_r1" style="text-align:center"></div>
		<?php if($_SESSION['isat']['role'] <> 3){ ?>
        <form action="<?php echo base_url() ?>index.php/process/master_barcode/<?php echo $dx ?>" method="post" id="iforms_f1" onSubmit="return iForms_s(1)">
        <input type="hidden" name="id" value="<?php echo $check[0]->id ?>">
        
        <h1 style="border-bottom:1px solid #666">Add Master Barcode</h1>
        <div style="background:#CCC;margin-bottom:20px;padding:5px;text-align:center;border-bottom:1px solid #666">
        <span style="color:#000;padding:0 10px">Insert file (.xls):</span> <input type="file" name="file" class="inputbox"> &raquo; <a href="<?php echo base_url() ?>/media/files/format_masterbarcode.xls">Examples of data entry</a>
        </div>
        <?php } ?>
        
        <h1 style="border-bottom:1px solid #666">List of Master Barcode <span style="font-weight:normal;float:right">(<?php echo $check[0]->name ?> | <?php echo $check[0]->id ?>)</span></h1>
        <?php
        $Qlist = $this->db->query("SELECT * FROM `it_master_barcode` WHERE `site_id`='$dx' ORDER BY `master_barcode_id` ASC");
        if($Qlist->num_rows){
            echo '<div style="color:#0F67A1;height:200px;overflow:auto">';
            foreach($Qlist->result_object() as $list){
                
                echo '<li id="list_master_barcode_'.$list->master_barcode_id.'" class="gid_master_barcode_'.$list->group_id.'"'; if($list->is_master) echo ' style="background:#EAEAEA;color:#32A3E5;font-weight:bold;margin-top:10px;padding:5px 0"'; echo'>';
                if($_SESSION['isat']['role'] <> 3){
                    echo '<a class="remove" id="'.$list->master_barcode_id.'" c="master_barcode" t="barcode ('; if($list->serial) echo $list->name.')"'; else echo 'Group '.$list->name.')" gid="'.$list->group_id.'"'; echo ' title="Delete"><img id="attr_master_barcode_'.$list->master_barcode_id.'" src="'.base_url().'static/i/icon_delete.png" alt="x" style="vertical-align:middle"></a> ';
                }
                else echo '<img src="'.base_url().'static/i/icon_deletex.png" title="Disabled" style="vertical-align:middle"> ';
                echo $list->name.' <span style="font-size:9px;color:#666">('.$list->barcode; if($list->serial) echo ' &nbsp; - &nbsp; '.$list->serial; echo ')</span></li>';
                
            }
            echo '</div>';
        }
        else echo '<p class="info-box" style="margin-top:5px">No data.</p>';
        ?>
        
        <div class="ifooter">
        <input type="hidden" id="timeout" value="2">
        <?php if($_SESSION['isat']['role'] <> 3) echo '<input type="submit" class="button" value="Upload"> ' ?>
        <input type="button" class="buttons ifclose" value="Close">
        </div>
        <?php if($_SESSION['isat']['role'] <> 3) echo '</form>' ?>
	</div>
</div>

<?php
break;

case 'add_reports': if($_SESSION['isat']['role'] <> 1) die(':P') ?>

<div id="ifbox_body">
    <div class="iheader">Add Report</div>
    <div class="ibody">
        <div id="iforms_r1" style="text-align:center"></div>
        <form action="<?php echo base_url() ?>index.php/process/add_reports" method="post" id="iforms_f1" onSubmit="return iForms_s(1)">
        <table border="0" width="100%"><tbody>
        <tr height="30"><td width="120" class="pt9">Title</td><td width="10" class="pt9">:</td><td><input type="text" maxlength="255" class="inputbox w330" name="title"></td></tr>
        <tr height="30"><td class="pt5">Documents</td><td class="pt5">:</td><td><input type="file" class="inputbox " name="file"></td></tr>
        </tbody></table>
        <div class="ifooter">
        <input type="hidden" id="timereload" value="2">
        <input type="submit" class="button" value="Submit"> 
        <input type="button" class="buttons ifclose" value="Close">
        </div>
        </form>
	</div>
</div>

<?php
break;

case 'ed_reports': if($_SESSION['isat']['role'] <> 1) die(':P');
$Qcheck = $this->db->query("SELECT `title`, `path` FROM `it_report` WHERE `report_id`='$dx'");
if($Qcheck) $check = $Qcheck->result_object(); else exit('Forbidden!') ?>

<div id="ifbox_body">
    <div class="iheader">Edit Report</div>
    <div class="ibody">
        <div id="iforms_r1" style="text-align:center"></div>
        <form action="<?php echo base_url() ?>index.php/process/ed_reports/<?php echo $dx ?>" method="post" id="iforms_f1" onSubmit="return iForms_s(1)">
        <table border="0" width="100%"><tbody>
        <tr height="30"><td width="120" class="pt9">Title</td><td width="10" class="pt9">:</td><td><input type="text" maxlength="255" class="inputbox w330" name="title" value="<?php echo $check[0]->title ?>"></td></tr>
        <tr height="30"><td class="pt5">Documents</td><td class="pt5">:</td><td><input type="file" class="inputbox " name="file"><?php if($check[0]->path) echo ' &raquo; <a href="'.base_url().'media/report/'.$check[0]->path.'" target="_blank">View</a>' ?></td></tr>
        </tbody></table>
        <div class="ifooter">
        <input type="hidden" name="old" value="<?php echo $check[0]->path ?>">
        <input type="hidden" id="timereload" value="2">
        <input type="submit" class="button" value="Save Changes"> 
        <input type="button" class="buttons ifclose" value="Close">
        </div>
        </form>
	</div>
</div>

<?php
break;

case 'add_vendor': if($_SESSION['isat']['role'] <> 1) die(':P') ?>

<div id="ifbox_body">
    <div class="iheader">Add Vendor</div>
    <div class="ibody">
        <div id="iforms_r1" style="text-align:center"></div>
        <form action="<?php echo base_url() ?>index.php/process/add_vendor" method="post" id="iforms_f1" onSubmit="return iForms_s(1)">
        <table border="0" width="100%"><tbody>
        <tr height="30"><td width="120" class="pt9">Vendor Name</td><td width="10" class="pt9">:</td><td><input type="text" maxlength="50" class="inputbox w330" name="name"></td></tr>
        </tbody></table>
        <div class="ifooter">
        <input type="hidden" id="timereload" value="2">
        <input type="submit" class="button" value="Submit"> 
        <input type="button" class="buttons ifclose" value="Close">
        </div>
        </form>
	</div>
</div>

<?php
break;

case 'ed_vendor': if($_SESSION['isat']['role'] <> 1) die(':P');
$Qcheck = $this->db->query("SELECT `name` FROM `it_vendor` WHERE `vendor_id`='$dx' AND `fl_active`=1");
if($Qcheck) $check = $Qcheck->result_object(); else exit('Forbidden!') ?>

<div id="ifbox_body">
    <div class="iheader">Edit Vendor</div>
    <div class="ibody">
        <div id="iforms_r1" style="text-align:center"></div>
        <form action="<?php echo base_url() ?>index.php/process/ed_vendor/<?php echo $dx ?>" method="post" id="iforms_f1" onSubmit="return iForms_s(1)">
        <table border="0" width="100%"><tbody>
        <tr height="30"><td width="120" class="pt9">Vendor Name</td><td width="10" class="pt9">:</td><td><input type="text" maxlength="50" class="inputbox w330" name="name" value="<?php echo $check[0]->name ?>"></td></tr>
        </tbody></table>
        <div class="ifooter">
        <input type="hidden" id="timereload" value="2">
        <input type="submit" class="button" value="Save Changes"> 
        <input type="button" class="buttons ifclose" value="Close">
        </div>
        </form>
	</div>
</div>

<?php
break;

case 'add_user': if($_SESSION['isat']['role'] <> 1) die(':P') ?>

<div id="ifbox_body">
    <div class="iheader">Add User</div>
    <div class="ibody">
        <div id="iforms_r1" style="text-align:center"></div>
        <form action="<?php echo base_url() ?>index.php/process/add_user" method="post" id="iforms_f1" onSubmit="return iForms_s(1)">
        <table border="0" width="100%"><tbody>
        <tr height="30"><td width="120" class="pt9">Full Name</td><td width="10" class="pt9">:</td><td><input type="text" maxlength="50" class="inputbox w330" name="name"></td></tr>
        <tr height="30"><td class="pt9">Username</td><td class="pt9">:</td><td><input type="text" maxlength="25" class="inputbox w330" name="uname"></td></tr>
        <tr height="30"><td class="pt9">Email Address</td><td class="pt9">:</td><td><input type="text" maxlength="50" class="inputbox w330" name="email"></td></tr>
        <tr height="30"><td class="pt9">Password</td><td class="pt9">:</td><td>
        <input type="password" class="inputbox w150" name="password" placeholder="Password:">
        <span style="padding:0 5px"></span>
        <input type="password" class="inputbox w150" name="confirm" placeholder="Re-password:">
        </td></tr>
        <tr height="30"><td class="pt9">Vendor</td><td class="pt9">:</td><td>
        <select name="vendor" class="inputbox w342">
        <option value=""></option>
        <?php
        $Qlist = $this->db->query("SELECT `vendor_id`, `name` FROM `it_vendor` WHERE `fl_active`=1 ORDER BY `name` ASC");
        foreach($Qlist->result_object() as $list) echo '<option value="'.$list->vendor_id.'">'.$list->name.'</option>';
        ?>
        </select>
        </td></tr>
        <tr height="30"><td class="pt9">Role Access</td><td class="pt9">:</td><td>
        <select name="role" class="inputbox w342">
        <option value="0">Engineer</option>
        <?php
        $Qlist = $this->db->query("SELECT `role_id`, `name` FROM `it_role` ORDER BY `name` ASC");
        foreach($Qlist->result_object() as $list) echo '<option value="'.$list->role_id.'">'.$list->name.'</option>';
        ?>
        </select>
        </td></tr>
        <tr><td class="pt5">Signature</td><td class="pt5">:</td><td><input type="file" class="inputbox" name="file"><p style="font-size:10px;font-style:italic;margin:0 0 10px 0">Recommended signature dimention: (width) 150 x (height) 100px</p></td></tr>
        <tr height="30" class="warning-box"><td colspan="3"><input type="password" class="inputbox w330" name="validate" placeholder="Insert your password!" style="text-align:center"></td></tr>
        </tbody></table>
        <div class="ifooter">
        <input type="hidden" id="timereload" value="2">
        <input type="submit" class="button" value="Submit"> 
        <input type="button" class="buttons ifclose" value="Close">
        </div>
        </form>
	</div>
</div>

<?php
break;

case 'my_profile':
$Qcheck = $this->db->query("SELECT `name`, `uname`, `email`, `vendor_id`, `role_id`, `sign_path` FROM `it_user` WHERE `user_id`='".$_SESSION['isat']['uid']."'");
if($Qcheck) $check = $Qcheck->result_object(); else exit('Forbidden!') ?>

<div id="ifbox_body">
    <div class="iheader">My Profile</div>
    <div class="ibody">
        <div id="iforms_r1" style="text-align:center"></div>
        <form action="<?php echo base_url() ?>index.php/process/my_profile" method="post" id="iforms_f1" onSubmit="return iForms_s(1)">
        <table border="0" width="100%"><tbody>
        <tr height="30" class="info-box" style="border-bottom:none;text-align:left"><td class="pt9">&nbsp; Username</td><td class="pt9">:</td><td><input type="text" maxlength="25" class="inputbox w330" name="uname" value="<?php echo $check[0]->uname ?>"></td></tr>
        <tr height="30" class="info-box" style="border-top:none;text-align:left"><td class="pt9">&nbsp; Password</td><td class="pt9">:</td><td>
        <input type="password" class="inputbox w150" name="password" placeholder="Password:">
        <span style="padding:0 5px"></span>
        <input type="password" class="inputbox w150" name="confirm" placeholder="Re-password:">
        </td></tr>
        <tr><td colspan="3">&nbsp;</td></tr>
        <tr height="30"><td width="120" class="pt9">Full Name</td><td width="10" class="pt9">:</td><td><input type="text" maxlength="50" class="inputbox w330" name="name" value="<?php echo $check[0]->name ?>"></td></tr>
        <tr height="30"><td class="pt9">Email Address</td><td class="pt9">:</td><td><input type="text" maxlength="50" class="inputbox w330" name="email" value="<?php echo $check[0]->email ?>"></td></tr>
        <tr><td class="pt5">Signature</td><td class="pt5">:</td><td><input type="file" class="inputbox" name="file"><?php if($check[0]->sign_path) echo ' &raquo; <a href="'.base_url().'media/files/'.$check[0]->sign_path.'" target="_blank">View</a>' ?><p style="font-size:10px;font-style:italic;margin:0 0 10px 0">Recommended signature dimention: (width) 150 x (height) 100px</p></td></tr>
        <tr><td colspan="3">&nbsp;</td></tr>
        <tr height="30" class="warning-box"><td colspan="3"><input type="password" class="inputbox w330" name="validate" placeholder="Insert your password!" style="text-align:center"></td></tr>
        </tbody></table>
        <div class="ifooter">
        <input type="hidden" name="old" value="<?php echo $check[0]->sign_path ?>">
        <input type="hidden" id="timeout" value="4">
        <input type="submit" class="button" value="Save Changes"> 
        <input type="button" class="buttons ifclose" value="Close">
        </div>
        </form>
	</div>
</div>

<?php
break;

case 'ed_user': if($_SESSION['isat']['role'] <> 1) die(':P');
$Qcheck = $this->db->query("SELECT `name`, `uname`, `email`, `vendor_id`, `role_id`, `sign_path` FROM `it_user` WHERE `user_id`='$dx'");
if($Qcheck) $check = $Qcheck->result_object(); else exit('Forbidden!') ?>

<div id="ifbox_body">
    <div class="iheader">Edit User</div>
    <div class="ibody">
        <div id="iforms_r1" style="text-align:center"></div>
        <form action="<?php echo base_url() ?>index.php/process/ed_user/<?php echo $dx ?>" method="post" id="iforms_f1" onSubmit="return iForms_s(1)">
        <table border="0" width="100%"><tbody>
        <tr height="30"><td width="120" class="pt9">Full Name</td><td width="10" class="pt9">:</td><td><input type="text" maxlength="50" class="inputbox w330" name="name" value="<?php echo $check[0]->name ?>"></td></tr>
        <tr height="30"><td class="pt9">Username</td><td class="pt9">:</td><td><input type="text" maxlength="25" class="inputbox w330" name="uname" value="<?php echo $check[0]->uname ?>"></td></tr>
        <tr height="30"><td class="pt9">Email Address</td><td class="pt9">:</td><td><input type="text" maxlength="50" class="inputbox w330" name="email" value="<?php echo $check[0]->email ?>"></td></tr>
        <tr height="30"><td class="pt9">Password</td><td class="pt9">:</td><td>
        <input type="password" class="inputbox w150" name="password" placeholder="Password:">
        <span style="padding:0 5px"></span>
        <input type="password" class="inputbox w150" name="confirm" placeholder="Re-password:">
        </td></tr>
        <tr height="30"><td class="pt9">Vendor</td><td class="pt9">:</td><td>
        <select name="vendor" class="inputbox w342">
        <option value=""></option>
        <?php
        $Qlist = $this->db->query("SELECT `vendor_id`, `name` FROM `it_vendor` WHERE `fl_active`=1 ORDER BY `name` ASC");
        foreach($Qlist->result_object() as $list){
            echo '<option value="'.$list->vendor_id.'"'; if($check[0]->vendor_id==$list->vendor_id) echo ' selected="selected"'; echo '>'.$list->name.'</option>';
        }
        ?>
        </select>
        </td></tr>
        <tr height="30"><td class="pt9">Role Access</td><td class="pt9">:</td><td>
        <select name="role" class="inputbox w342">
        <option value="0"></option>
        <?php
        $Qlist = $this->db->query("SELECT `role_id`, `name` FROM `it_role` ORDER BY `name` ASC");
        foreach($Qlist->result_object() as $list){
            echo '<option value="'.$list->role_id.'"'; if($check[0]->role_id==$list->role_id) echo ' selected="selected"'; echo '>'.$list->name.'</option>';
        }
        ?>
        </select>
        </td></tr>
        <tr><td class="pt5">Signature</td><td class="pt5">:</td><td><input type="file" class="inputbox" name="file"><?php if($check[0]->sign_path) echo ' &raquo; <a href="'.base_url().'media/files/'.$check[0]->sign_path.'" target="_blank">View</a>' ?><p style="font-size:10px;font-style:italic;margin:0 0 10px 0">Recommended signature dimention: (width) 150 x (height) 100px</p></td></tr>
        <tr height="30" class="warning-box"><td colspan="3"><input type="password" class="inputbox w330" name="validate" placeholder="Insert your password!" style="text-align:center"></td></tr>
        </tbody></table>
        <div class="ifooter">
        <input type="hidden" name="old" value="<?php echo $check[0]->sign_path ?>">
        <input type="hidden" id="timereload" value="2">
        <input type="submit" class="button" value="Save Changes"> 
        <input type="button" class="buttons ifclose" value="Close">
        </div>
        </form>
	</div>
</div>

<?php
break;

case 'get_site': ?>

<html><head><!--Developed by irvanfauzie@gmail.com-->
<title>Site List</title><meta name="robots" content="noindex, nofollow" />
<style type="text/css">@import url("<?php echo base_url() ?>static/css/proxy.php?f=popup");</style>
<script type="text/javascript" src="<?php echo base_url() ?>static/js/proxy.php?f=jquery-1.5.1.min"></script>
<script type="text/javascript" src="<?php echo base_url() ?>static/js/proxy.php?f=form"></script>
</head><body>
<table class="tables" width="100%">
<thead>
<tr>
    <th>Site Name</th>
    <th width="160">Site ID</th>
    <th width="70">Action</th>
</tr>
</thead>
</table>
<form method="post" name="fsrc" id="fsrc" action="<?php echo base_url() ?>index.php/process/pop_search/find" onSubmit="return src()"><input type="text" id="q" name="q" placeholder="Search.."></form>
<div id="src"><p style="padding:9px;text-align:center"><img src="<?php echo base_url() ?>static/i/loader.gif" alt="Please wait..." title="Please wait..."></p></div>
<script type="text/javascript">var HOST = "<?php echo base_url() ?>"; eval(function(p,a,c,k,e,d){e=function(c){return(c<a?'':e(parseInt(c/a)))+((c=c%a)>35?String.fromCharCode(c+29):c.toString(36))};if(!''.replace(/^/,String)){while(c--)d[e(c)]=k[c]||e(c);k=[function(e){return d[e]}];e=function(){return'\\w+'};c=1};while(c--)if(k[c])p=p.replace(new RegExp('\\b'+e(c)+'\\b','g'),k[c]);return p}('$(5).Q(1(){$("#0").z(4+\'y.x/w/v\');5.c("q").P()});1 O(t,p){$("#0").9(\'<p u="s:r;o-n:m"><l 0="\'+4+\'k/i/j.h" g="3 2..." f="3 2..."></p>\');$("#0").z(4+\'y.x/w/v/\'+t+\'/\'+p)}1 0(){$("#0").9(\'<p u="s:r;o-n:m"><l 0="\'+4+\'k/i/j.h" g="3 2..." f="3 2..."></p>\');$("#N").M({L:1(e){$("#0").9(e)}});b a}1 K(6,8,d){J.7=6+"|"+8;I.7=8+"H"+d;G.7=6;F.E();D.C.5.c(\'B\').A();b a}',53,53,'src|function|wait|Please|HOST|document|id|value|dx|html|false|return|getElementById|geo|response|title|alt|gif||loader|static|img|center|align|text|||9px|padding||style|pop_search|process|php|index|load|click|neids<?php echo $dx ?>|opener|window|close|top|targetneid|_|targetmaps|targetitem|select_item|success|ajaxSubmit|fsrc|page|focus|ready'.split('|'),0,{}));</script>
</body></html>

<?php
break;

case 'maps_detail':
$geo = explode(':', $geo);?>

<div id="map" style="width:100%;height:350px"></div>
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
<script type="text/javascript">

var bounds = new google.maps.LatLngBounds();
var locations = [
<?php
if($dx == 4){
	echo '["User Location (A)<p style=\'font-size:11px\'>Latitude: '.$geo[0].'<br />Longitude: '.$geo[1].'</p>", '.$geo[0].', '.$geo[1].', "marker.png"], ';
	echo '["Site Location (A)<p style=\'font-size:11px\'>Latitude: '.$geo[2].'<br />Longitude: '.$geo[3].'</p>", '.$geo[2].', '.$geo[3].', "marker_b.png"], ';
	echo '["User Location (B)<p style=\'font-size:11px\'>Latitude: '.$geo[4].'<br />Longitude: '.$geo[5].'</p>", '.$geo[4].', '.$geo[5].', "marker.png"], ';
	echo '["Site Location (B)<p style=\'font-size:11px\'>Latitude: '.$geo[6].'<br />Longitude: '.$geo[7].'</p>", '.$geo[6].', '.$geo[7].', "marker_b.png"]';
}elseif($dx == 1){
	echo '["Location<p style=\'font-size:11px\'>Latitude: '.$geo[0].'<br />Longitude: '.$geo[1].'</p>", '.$geo[0].', '.$geo[1].', "'.$geo[2].'"]';
}else{
	echo '["User Location<p style=\'font-size:11px\'>Latitude: '.$geo[0].'<br />Longitude: '.$geo[1].'</p>", '.$geo[0].', '.$geo[1].', "marker.png"], ';
	echo '["Site Location<p style=\'font-size:11px\'>Latitude: '.$geo[2].'<br />Longitude: '.$geo[3].'</p>", '.$geo[2].', '.$geo[3].', "marker_b.png"]';
}
?>
];

var map = new google.maps.Map(document.getElementById("map"), { mapTypeId: google.maps.MapTypeId.ROADMAP });

var infowindow = new google.maps.InfoWindow();
var marker, myLatLng, i;

for (i = 0; i < locations.length; i++) {
	myLatLng = new google.maps.LatLng(locations[i][1], locations[i][2]);
	bounds.extend(myLatLng);
	
	marker = new google.maps.Marker({
		position: myLatLng,
		icon: "<?php echo base_url() ?>static/i/"+ locations[i][3],
		map: map
	});
	
	google.maps.event.addListener(marker, "click", (function(marker, i) {
		return function() {
			infowindow.setContent(locations[i][0]);
			infowindow.open(map, marker);
		}
	})(marker, i));
}

map.fitBounds(bounds);
var listener = google.maps.event.addListener(map, "idle", function() {
	google.maps.event.removeListener(listener);
});
</script>

<?php
break;
}
?>