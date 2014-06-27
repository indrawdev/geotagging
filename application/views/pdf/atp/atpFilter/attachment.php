<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$Qattach = $this->db->query("SELECT `files`, `idx_main`, `idx_sub`, `note` FROM `it_attachment` WHERE `table` IN('atp_chapter_no', 'atp_subchapter_no') AND `idx`='$dx' ORDER BY `idx_main_order`, `idx_sub_order` ASC");
if($Qattach->num_rows):

function main_name($dx){
	switch($dx){
		case '1': return 'Acceptance Documentation'; break;
		case '1.1': return 'Additional equipment/module information'; break;
		case '1.2': return 'Configuration Captured from INOC (RBS Log before & after)'; break;
		case '1.3': return 'RBS Alarm print out (before & after)'; break;
		case '1.4': return 'Inventory list (capture from RBS/moshell)'; break;
		case '1.5': return 'Photograph of new equipment/module installation'; break;
		case '1.6': return 'BoQ'; break;
	}
}

function sub_name($dx, $sub){
	switch($dx){
		case 1:
		switch($sub){
			case '1.1': return '1.1. Additional equipment/module information'; break;
			case '1.2': return '1.2. Configuration Captured from INOC (RBS Log before & after)'; break;
			case '1.3': return '1.3. RBS Alarm print out (before & after)'; break;
			case '1.4': return '1.4. Inventory list (capture from RBS/moshell)'; break;
			case '1.5': return '1.5. Photograph of new equipment/module installation'; break;
			case '1.6': return '1.6. BoQ'; break;
		}
		break;
		
		case 1.1:
		switch($sub){
			case 1: return 'Additional Module Information'; break;
		}
		break;
		
		case 1.2:
		switch($sub){
			case 1: return '1.2.1 Filter Equipment Identification'; break;
			case 2: return '1.2.2 Filter Equipment Installation'; break;
		}
		break;	
		
		case '1.2.1':
		switch($sub){
			case 1: return '1.2.1.1 KAELUS DDF0052F1V2-1'; break;
			case 2: return '1.2.1.2 KAELUS DDF0059F1V1 '; break;
		}
		break;	
		
		case '1.2.2':
		switch($sub){
			case 1: return '1.2.2.1 Confirm that filter is installed on each sector'; break;
			case 2: return '1.2.2.2 Confirm that only approved supplier is used'; break;
			case 3: return '1.2.2.3 Confirm that RF connections are correctly waterproofed'; break;
		}
		break;				
	}
}

$i=0;
echo '<hr /><h3>LAMPIRAN:</h3>';
echo '<table class="border" cellpadding="0" cellspacing="0"><tr>';
foreach($Qattach->result_object() as $attach){
    if($i >= 2){ echo '</tr><tr>'; $i=0; } $i++;
    echo '<td valign="top">';
	if(file_exists('./media/files/'.$attach->files)) echo '<p class="attach"><img src="'.base_url().'media/files/'.$attach->files.'" width="320" height="240"></p>';
	echo '<p><b>'.$attach->idx_main.'. '.main_name($attach->idx_main).'</b>';
	echo '<br /><i>'.sub_name($attach->idx_main, $attach->idx_sub).'</i>';
	if($attach->note){
		$note = explode('|', $attach->note);
		$la = $this->ifunction->DECtoDMS($note[0]); $lo = $this->ifunction->DECtoDMS($note[1]);
		echo '<br /><br />Lat: '.$la["deg"].'&deg; '.$la["min"].'\' '.$la["sec"].'" ('.$note[0].')';
		echo '<br />Lon: '.$lo["deg"].'&deg; '.$lo["min"].'\' '.$lo["sec"].'" ('.$note[1].')';
		echo '<br />LAC: '.$note[2];
		echo '<br />Cell ID: '.$note[3];
		echo '<br />Taken Time: '.$note[4];
	}
	echo '</p></td>';
}
echo '</tr></table>';
endif;

$Qfreeattach = $this->db->query("SELECT `files`, `note`, `desc` FROM `it_attachment` WHERE `table`='atp_freephoto' AND `idx`='$dx' ORDER BY `idx_main_order` ASC");
if($Qfreeattach->num_rows):
$i=0;
echo '<hr /><h3 style="text-align:center">PHOTO:</h3>';
echo '<table class="border" cellpadding="0" cellspacing="0"><tr>';
foreach($Qfreeattach->result_object() as $freeattach){
    if($i >= 2){ echo '</tr><tr>'; $i=0; } $i++;
    echo '<td valign="top">';
	if(file_exists('./media/files/'.$freeattach->files)) echo '<p class="attach"><img src="'.base_url().'media/files/'.$freeattach->files.'" width="320" height="240"></p>';
	echo '<p><b>'.$freeattach->desc.'</b>';
	if($freeattach->note){
		$note = explode('|', $freeattach->note);
		$la = $this->ifunction->DECtoDMS($note[0]); $lo = $this->ifunction->DECtoDMS($note[1]);
		echo '<i><br /><br />Lat: '.$la["deg"].'&deg; '.$la["min"].'\' '.$la["sec"].'" ('.$note[0].')';
		echo '<br />Lon: '.$lo["deg"].'&deg; '.$lo["min"].'\' '.$lo["sec"].'" ('.$note[1].')';
		echo '<br />LAC: '.$note[2];
		echo '<br />Cell ID: '.$note[3];
		echo '<br />Taken Time: '.$note[4].'</i>';
	}
	echo '</p></td>';
}
echo '</tr></table>';
endif;

echo '</body></html>';