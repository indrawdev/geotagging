<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$Qattach = $this->db->query("SELECT `files`, `idx_main`, `idx_sub`, `note` FROM `it_attachment` WHERE `table` IN('atp_chapter_no', 'atp_subchapter_no') AND `idx`='$dx' ORDER BY `idx_main_order`, `idx_sub_order` ASC");
if($Qattach->num_rows):

function main_name($dx){
	switch($dx){
		case '1.1': return 'Pondasi RBS'; break;
		case '1.2': return 'Pemasangan Cable Tray / Ladder (Tray/ Ladder Vertikal)'; break;
		case '1.3': return 'Pemasangan Cable Tray / Ladder (Tray/ Ladder Horizontal)'; break;
		case '1.4': return 'Pekerjaan Elektrikal'; break;
		case '1.5': return 'Pekerjaan Lain-lain'; break;
	}
}

function sub_name($dx, $sub){
	switch($dx){
		case 1:
		switch($sub){
			case '1.1': return '1.1. Pondasi RBS'; break;
			case '1.2': return '1.2. Pemasangan Cable Tray / Ladder (Tray/ Ladder Vertikal)'; break;
			case '1.3': return '1.3. Pemasangan Cable Tray / Ladder (Tray/ Ladder Horizontal)'; break;
			case '1.4': return '1.4. Pekerjaan Elektrikal'; break;
			case '1.5': return '1.5. Pekerjaan Lain-lain'; break;
		}
		break;
		
		case 1.1:
		switch($sub){
			case 1: return 'Ukuran pondasi sesuai design'; break;
			case 2: return 'Finishing pondasi'; break;
		}
		break;
		
		case 1.2:
		switch($sub){
			case 1: return 'Ukuran dan bentuk sesuai design'; break;
			case 2: return 'Tray/ Ladder terpasang baik dan kuat'; break;
			case 3: return 'Tray/ Ladder Support terpasang dengan kuat'; break;
		}
		break;
		
		case 1.3:
		switch($sub){
			case 1: return 'Ukuran dan bentuk sesuai design'; break;
			case 2: return 'Tray/ Ladder terpasang baik dan kuat'; break;
			case 3: return 'Tray/ Ladder dicat dengan rapi'; break;
			case 4: return 'Tray/ Ladder Support terpasang dengan kuat'; break;
		}
		break;
		
		case 1.4:
		switch($sub){
			case 1: return 'Pemasangan MCB'; break;
			case 2: return 'Dimensi  Bus bar (Al / Cu)'; break;
			case 3: return 'Instalasi BCC 50 mm'; break;
			case 4: return 'Bus-Bar yang terpasang sesuai desain'; break;
			case 5: return 'Upgrade PLN'; break;
		}
		break;
		
		case 1.5:
		switch($sub){
			case 1: return 'a...'; break;
			case 2: return 'b...'; break;
			case 3: return 'c...'; break;
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