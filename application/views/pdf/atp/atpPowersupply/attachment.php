<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$Qattach = $this->db->query("SELECT `files`, `idx_main`, `idx_sub`, `note` FROM `it_attachment` WHERE `table` IN('atp_chapter_no', 'atp_subchapter_no') AND `idx`='$dx' ORDER BY `idx_main_order`, `idx_sub_order` ASC");
if($Qattach->num_rows):

function main_name($dx){
	switch($dx){
		case '1': return 'I. DATA MODULE RECTIFIER TERPASANG'; break;
		case '2': return 'II. PENGUKURAN TEGANGAN INPUT'; break;
		case '3': return 'III. PENGUKURAN RECTIFIER'; break;
		case '4': return 'IV. SETTING PARAMETER'; break;
		case '5': return 'V. TEST FUNGSI'; break;
		case '6': return 'VI. DATA LOAD/BEBAN'; break;
		case '7': return 'VII. BATERE'; break;
		case '7.1': return 'Data Batere'; break;
		case '7.2': return 'Data Pengukuran Batere Dilokasi /Open Circuit'; break;
		case '8': return 'VIII. DAFTAR ALAT UKUR YANG DIGUNAKAN.'; break;
		case '9': return 'I. RECTIFIER'; break;
		case '9.1': return 'I.1. Visual Check'; break;
		case '9.2': return 'I.2. Instalasi'; break;
		case '9.3': return 'I.3. Pengukuran'; break;
		case '9.4': return 'I.4. Test Kapasitas Modul Rectifier'; break;
		case '9.5': return 'I.5. Setting Rectifier'; break;
		case '9.6': return 'I.6. Test Fungsi'; break;
		case '10': return 'II. BATERE'; break;
		case '10.1': return 'II.1. Visual Check'; break;
		case '10.2': return 'II.2. Instalasi'; break;		
		case '11': return 'III. LAIN-LAIN'; break;
		case '12': return 'I. PENGUKURAN TEGANGAN INPUT'; break;
		case '13': return 'II. TEST KAPASITAS MODULE'; break;
		case '13.1': return 'Kapasitas Nominal Per module'; break;
		case '13.2': return 'Kapasitas module'; break;
		case '14': return 'III. TEST SHARING MODULE'; break;
		case '15': return 'IV. PERBANDINGAN ALAT UKUR INTERNAL DAN EXTERNAL.'; break;
		case '15.1': return 'Toleransi'; break;
		case '15.2': return 'Perbandingan Alat Ukur'; break;
		case '16': return 'V. SETTING PARAMETER'; break;
		case '17': return 'VI. TEST FUNGSI'; break;
		case '18': return 'VII. DAFTAR ALAT UKUR YANG DIGUNAKAN.'; break;
	}
}

function sub_name($dx, $sub){
	switch($dx){
		case 1:
		switch($sub){
			case '1.1': return 'I. DATA MODULE RECTIFIER TERPASANG'; break;
		}
		break;
		
		case 2:
		switch($sub){
			case 2.1: return 'II. PENGUKURAN TEGANGAN INPUT'; break;
		}
		break;
		
		case 3:
		switch($sub){
			case 3.1: return 'III. PENGUKURAN RECTIFIER'; break;
		}
		break;
		
		case 4:
		switch($sub){
			case 4.1: return 'IV. SETTING PARAMETER'; break;
		}
		break;
		
		case 5:
		switch($sub){
			case 5.1: return 'V. TEST FUNGSI'; break;
		}
		break;
		
		case 6:
		switch($sub){
			case 6.1: return 'VI. DATA LOAD/BEBAN'; break;
		}
		break;				
		
		case 7:
		switch($sub){
			case 7.1: return 'Data Batere'; break;
			case 7.2: return 'Data Pengukuran Batere Dilokasi /Open Circuit'; break;
		}
		break;
		
		case 8:
		switch($sub){
			case 8.1: return 'VIII. DAFTAR ALAT UKUR YANG DIGUNAKAN'; break;
		}
		break;				
		
		case 9:
		switch($sub){
			case 9.1: return 'I.1. Visual Check'; break;
			case 9.2: return 'I.2. Instalasi'; break;
			case 9.3: return 'I.3. Pengukuran'; break;
			case 9.4: return 'I.4. Test Kapasitas Modul Rectifier'; break;
			case 9.5: return 'I.5. Setting Rectifier'; break;
			case 9.6: return 'I.6. Test Fungsi'; break;
		}
		break;				
		
		case 10:
		switch($sub){
			case '10.1': return 'II.1. Visual Check'; break;
			case '10.2': return 'II.2. Instalasi'; break;
		}
		break;				
		
		case 11:
		switch($sub){
			case 11.1: return 'III. LAIN-LAIN'; break;
		}
		break;
				
		
		case 12:
		switch($sub){
			case 12.1: return 'I. PENGUKURAN TEGANGAN INPUT'; break;
		}
		break;
		
		case 13:
		switch($sub){
			case 13.1: return 'Kapasitas Nominal Per module'; break;
			case 13.2: return 'Kapasitas module'; break;
		}
		break;
		
		case 14:
		switch($sub){
			case 14.1: return 'III. TEST SHARING MODULE'; break;
		}
		break;			
		
		case 15:
		switch($sub){
			case 15.1: return 'Toleransi'; break;
			case 15.2: return 'Perbandingan Alat Ukur'; break;
		}
		break;
		
		case 16:
		switch($sub){
			case 16.1: return 'V. SETTING PARAMETER'; break;
		}
		break;
		
		case 17:
		switch($sub){
			case 17.1: return 'VI. TEST FUNGSI'; break;
		}
		break;
		
		case 18:
		switch($sub){
			case '18.1': return 'VII. DAFTAR ALAT UKUR YANG DIGUNAKAN'; break;
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