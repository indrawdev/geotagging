<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$Qattach = $this->db->query("SELECT `files`, `idx_main`, `idx_sub`, `note` FROM `it_attachment` WHERE `table` IN('atp_chapter_no', 'atp_subchapter_no') AND `idx`='$dx' ORDER BY `idx_main_order`, `idx_sub_order` ASC");
if($Qattach->num_rows):

function main_name($dx){
	switch($dx){
		case '1': return 'Preliminary site checks'; break;
		case '1.1': return 'Site Installation Document (SID) / Binder'; break;
		case '2': return 'Installation Checking Result'; break;
		case '3': return 'VDC input MW Specification'; break;
		case '3.1': return 'Input DC power'; break;
		case '3.2': return 'Power redundancy test (if applicable)'; break;
		case '4': return 'Terminal inventory'; break;
		case '4.1': return 'EQUIPMENTS CHECKING'; break;
		case '4.2': return 'ANTENNA CHECKING'; break;
		case '5': return 'NE to NMS Integration'; break;
		case '5.1': return 'Network Element Integration to NMS Server'; break;
		case '5.2': return 'Name of Network Element'; break;
		case '6': return 'Configuration check'; break;
		case '7': return 'Local Test Performance'; break;
		case '7.1': return 'Transmit Power (dBm)'; break;
		case '7.2': return 'Receive Power (dBm)'; break;
		case '7.3': return 'Transmit Frequency (kHz)'; break;
		case '7.4': return 'Receive Frequency (kHz)'; break;
		case '7.5': return 'PRx Interference (dBm) / Far-end Tx-Off'; break;
		case '7.6': return 'Switching 1+1*'; break;
		case '7.7': return 'Fan (FAU) Alarm Test'; break;
		case '7.8': return 'Threshold (dBm)'; break;
		case '8': return 'Ethernet Performance'; break;
		case '8.1': return 'Measurement will be check for appropriate frame size 1'; break;
		case '8.2': return 'Measurement will be check for appropriate frame size 2'; break;
		case '8.3': return 'QOS test'; break;
		case '9': return 'Alarm Check'; break;
		case '10': return 'Quality Test (BER *)'; break;
		case '11': return 'Environment Check'; break;
		case '12': return 'Attachment Checking'; break;
		case '12.1': return 'Bill Of Quantity (BOQ) as Equipment Inv.'; break;
		case '12.2': return 'Save Report and configuration'; break;
		case '12.3': return 'Module Inventory capture **)'; break;
		case '12.4': return 'Link Calculation (Link Budget)'; break;
		case '12.5': return 'BER Test Result *)'; break;
		case '12.6': return 'Engineering Table'; break;
		case '12.7': return 'Installation Check'; break;
		case '12.8': return 'Scan Frequency***)'; break;
	}
}

function sub_name($dx, $sub){
	switch($dx){
		case 1:
		switch($sub){
			case '1.1': return 'Site Installation Document (SID) / Binder'; break;
		}
		break;
		
		case 2:
		switch($sub){
			case 2.1: return 'Installation Checking Result'; break;
		}
		break;
		
		case 3:
		switch($sub){
			case 3.1: return 'Input DC power'; break;
			case 3.2: return 'Power redundancy test (if applicable)'; break;
		}
		break;
		
		case 4:
		switch($sub){
			case 4.1: return 'EQUIPMENTS CHECKING'; break;
			case 4.2: return 'ANTENNA CHECKING'; break;
		}
		break;
		
		case 5:
		switch($sub){
			case 5.1: return 'Network Element Integration to NMS Server'; break;
			case 5.2: return 'Name of Network Element'; break;
		}
		break;
		
		case 6:
		switch($sub){
			case 6.1: return 'Configuration'; break;
		}
		break;
		
		case 7:
		switch($sub){
			case 7.1: return 'Transmit Power (dBm)'; break;
			case 7.2: return 'Receive Power (dBm)'; break;
			case 7.3: return 'Transmit Frequency (kHz)'; break;
			case 7.4: return 'Receive Frequency (kHz)'; break;
			case 7.5: return 'PRx Interference (dBm) / Far-end Tx-Off'; break;
			case 7.6: return 'Switching 1+1*'; break;
			case 7.7: return 'Fan (FAU) Alarm Test'; break;
			case 7.8: return 'Threshold (dBm)'; break;
		}
		break;
		
		case 8:
		switch($sub){
			case 8.1: return 'Measurement will be check for appropriate frame size 1'; break;
			case 8.2: return 'Measurement will be check for appropriate frame size 2'; break;
			case 8.3: return 'QOS test'; break;
		}
		break;
		
		case 8.1:
		switch($sub){
			case 1: return 'Frame Size 64'; break;
			case 2: return 'Frame Size 512'; break;
			case 3: return 'Frame Size 1518'; break;
		}
		break;
		
		case 8.2:
		switch($sub){
			case 1: return 'Frame Size 64'; break;
			case 2: return 'Frame Size 512'; break;
			case 3: return 'Frame Size 1518'; break;
		}
		break;
		
		case 8.3:
		switch($sub){
			case 1: return 'Perform test with the following load'; break;
			case 2: return 'Perform test with the following load'; break;
			case 3: return 'Perform test with the following load'; break;
			case 4: return 'Perform test with the following load'; break;
			case 5: return 'Perform test with the following load'; break;
			case 6: return 'Perform test with the following load'; break;
			case 7: return 'Perform test with the following load'; break;
		}
		break;
		
		case 9:
		switch($sub){
			case 9.1: return 'Clear Alarm'; break;
		}
		break;
		
		case 10:
		switch($sub){
			case '10.1': return 'BER *)'; break;
		}
		break;
		
		case 11:
		switch($sub){
			case 11.1: return 'Clean Up Shelter Environment Check (Ex Material)'; break;
		}
		break;
		
		case 12:
		switch($sub){
			case 12.1: return 'Bill Of Quantity (BOQ) as Equipment Inv.'; break;
			case 12.2: return 'Save Report and configuration'; break;
			case 12.3: return 'Module Inventory capture **)'; break;
			case 12.4: return 'Link Calculation (Link Budget)'; break;
			case 12.5: return 'BER Test Result *)'; break;
			case 12.6: return 'Engineering Table'; break;
			case 12.7: return 'Installation Check'; break;
			case 12.8: return 'Scan Frequency***)'; break;
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