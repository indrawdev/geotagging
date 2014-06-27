<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$Qattach = $this->db->query("SELECT `files`, `idx_main`, `idx_sub`, `note` FROM `it_attachment` WHERE `table` IN('atp_chapter_no', 'atp_subchapter_no') AND `idx`='$dx' ORDER BY `idx_main_order`, `idx_sub_order` ASC");
if($Qattach->num_rows):

function main_name($dx){
	switch($dx){
		case '1': return 'Preliminary site checks'; break;
		case '1.1': return 'CME Site Acceptance has been approved'; break;
		case '1.2': return 'Site documentation must be available'; break;
		case '1.3': return 'Commissioning check list should be attached'; break;
		case '1.4': return 'Link Transmission Preparation already done'; break;
		case '2': return 'Checking HW configuration visually'; break;
		case '3': return 'Checking on labelling'; break;
		case '3.1': return 'Check label module (serial number, technical status)'; break;
		case '3.2': return 'Check NODE B rack label'; break;
		case '3.3': return 'Check DDF label (end to end site)'; break;
		case '3.4': return 'Check power supply label'; break;
		case '3.5': return 'Check feeder cable label (for antenna sector)'; break;
		case '3.6': return 'Check Antenna label'; break;
		case '4': return 'Checking grounding integration'; break;
		case '5': return 'Powers Measurement '; break;
		case '5.1': return 'Measurement AC Power Line (L1/L2/L3)'; break;
		case '5.2': return 'Measurement NODE B Input Power / Cabinet Voltage'; break;
		case '5.3': return 'Measurement AC/DC Power Input PDU NODE B'; break;
		case '5.4': return 'Measurement DC Power Output PDU NODE B'; break;
		case '5.5': return 'Checking NODE B Panel Circuit Breaker (AC / DC)'; break;
		case '6': return 'NODE B, RNC and Setting Parameter'; break;
		case '6.1': return 'NODE B and RNC Information Database'; break;
		case '6.2': return 'NODE B Cell Parameter'; break;
		case '7': return 'Verify NODE B Local Cell (On line Test)'; break;
		case '7.1': return 'Check NODE B Local Cell-1'; break;
		case '7.2': return 'Check NODE B Local Cell-2'; break;
		case '7.3': return 'Check NODE B Local Cell-3'; break;
		case '7.4': return 'Check NODE B Local Cell-4'; break;
		case '7.5': return 'Check NODE B Local Cell-5'; break;
		case '7.6': return 'Check NODE B Local Cell-6'; break;
		case '8': return 'Verify IP Node B Status'; break;
		case '8.1': return 'IP over ATM'; break;
		case '8.2': return 'Verify NODE B Restart'; break;
		case '8.3': return 'Operation Mode'; break;
		case '8.4': return 'Verify LED STATUS'; break;
		case '9': return 'Antenna System Inventory Check'; break;
		case '9.1': return 'Equipment quantity Check'; break;
		case '9.2': return 'Antenna Table'; break;
		case '9.3': return 'Connector Type'; break;
		case '9.4': return 'Remote Electrical Tilt'; break;
		case '9.5': return 'Feeder Cable'; break;
		case '9.6': return 'Top Jumper'; break;
		case '9.7': return 'Bottom Jumper'; break;
		case '10': return 'Installation and construction'; break;
		case '10.1': return 'Installation antenna system'; break;
		case '11': return 'Orientation and Position Antenna'; break;
		case '11.1': return 'Orientation outdoor antenna'; break;
		case '11.2': return 'Position outdoor antenna'; break;
		case '12': return 'Distance to Fault (DTF) use dummy load'; break;
		case '13': return 'Antenna system measurement'; break;
		case '13.1': return 'VSWR Measurement without TMA'; break;
		case '13.2': return 'VSWR Measurement with TMA'; break;
		case '14': return 'Checking Downloaded software status'; break;
		case '14.1': return 'Downloaded Software Status'; break;
		case '15': return 'Checking Hardware Technical Status and Configuration'; break;
		case '15.1': return 'Hardware Technical Status & Configuration'; break;
		case '16': return 'Checking status & functionality of NODE B Internal & External Alarm'; break;
		case '16.1': return 'Checking status & Functionality of NODE B Internal Alarm'; break;
		case '16.2': return 'Checking status & functionality External alarms'; break;
		case '17': return 'Mobile Originating & Terminating Test Call'; break;
		case '17.1': return 'Voice Test Call'; break;
		case '17.2': return 'Video Test Call'; break;
		case '17.3': return 'Packet Switch Test Call'; break;
		case '17.4': return 'HSDPA Test Call'; break;
		case '17.5': return 'SMS Test Call'; break;
		case '17.6': return 'MMS Test Call'; break;
		case '17.7': return 'Incoming & Outgoing softer Hand Over Test'; break;
		case '17.8': return 'Handover Test between 2G and 3G network'; break;
		case '17.9': return 'Emergency Call (118, 112)'; break;
		case '18': return 'Checking Site Condition'; break;
		case '18.1': return 'No damage at site environment'; break;
		case '18.2': return 'Site condition must be clean'; break;
		case '18.3': return 'All Infrastructures inside the NODE B must have the same condition as previous'; break;
	}
}

function sub_name($dx, $sub){
	switch($dx){
		case 1:
		switch($sub){
			case 1.1: return '1.1. CME Site Acceptance has been approved'; break;
			case 1.2: return '1.2. Site documentation must be available'; break;
			case 1.3: return '1.3. Commissioning check list should be attached'; break;
			case 1.4: return '1.4. Link Transmission Preparation already done'; break;
		}
		break;
		
		case 2:
		switch($sub){
			case 2.1: return '2.1. Compare with equipment order list attachment which is  based on  Site Documentation, NDB or Planning recommendation'; break;
		}
		break;
		
		case 3:
		switch($sub){
			case 3.1: return '3.1. Check label module (serial number, technical status)'; break;
			case 3.2: return '3.2. Check NODE B rack label'; break;
			case 3.3: return '3.3. Check DDF label (end to end site)'; break;
			case 3.4: return '3.4. Check power supply label'; break;
			case 3.5: return '3.5. Check feeder cable label (for antenna sector)'; break;
			case 3.6: return '3.6. Check Antenna label'; break;
		}
		break;
		
		case 4:
		switch($sub){
			case 4.1: return '4.1. Grounding NODE B (proper connection and integration)'; break;
		}
		break;
		
		case 5:
		switch($sub){
			case 5.1: return '5.1. Measurement AC Power Line (L1/L2/L3)'; break;
			case 5.2: return '5.2. Measurement NODE B Input Power / Cabinet Voltage'; break;
			case 5.3: return '5.3. Measurement AC/DC Power Input PDU NODE B'; break;
			case 5.4: return '5.4. Measurement DC Power Output PDU NODE B'; break;
			case 5.5: return '5.5. Checking NODE B Panel Circuit Breaker (AC / DC)'; break;
		}
		break;
		
		case 5.1:
		switch($sub){
			case 1: return 'AC Power Line'; break;
		}
		break;
		
		case 5.2:
		switch($sub){
			case 1: return 'Cabinet 1'; break;
		}
		break;
		
		case 5.3:
		switch($sub){
			case 1: return 'Input Voltage PDU'; break;
		}
		break;
		
		case 5.4:
		switch($sub){
			case 1: return 'Output Voltage PDU'; break;
		}
		break;
		
		case 5.5:
		switch($sub){
			case 1: return 'AC Main Circuit Breaker'; break;
			case 2: return 'DC Circuit Breaker'; break;
			case 3: return 'DC Main Circuit Breaker'; break;
			case 4: return 'Battery Circuit Breaker'; break;
		}
		break;
		
		case 6:
		switch($sub){
			case 6.1: return '6.1. NODE B and RNC Information Database'; break;
			case 6.2: return '6.2. NODE B Cell Parameter'; break;
		}
		break;
		
		case 6.1:
		switch($sub){
			case 1: return 'Node Name'; break;
			case 2: return 'Routing Area Code'; break;
			case 3: return 'Location Area Code'; break;
			case 4: return 'Service Area Code'; break;
			case 5: return 'O&M Link (IP Address)'; break;
			case 6: return 'E1-Board Port/SA board'; break;
			case 7: return 'Transmission Capacity'; break;
		}
		break;
		
		case 6.2:
		switch($sub){
			case 1: return 'Service area code (SAC)'; break;
			case 2: return 'CELL ID'; break;
			case 3: return 'Primary Scrambling Code (PSC)'; break;
			case 4: return 'Adjacent Cell PSC'; break;
		}
		break;
		
		case 7:
		switch($sub){
			case 7.1: return '7.1. Check NODE B Local Cell-1'; break;
			case 7.2: return '7.2. Check NODE B Local Cell-2'; break;
			case 7.3: return '7.3. Check NODE B Local Cell-3'; break;
			case 7.4: return '7.4. Check NODE B Local Cell-4'; break;
			case 7.5: return '7.5. Check NODE B Local Cell-5'; break;
			case 7.6: return '7.6. Check NODE B Local Cell-6'; break;
		}
		break;
		
		case 8:
		switch($sub){
			case 8.1: return '8.1. IP over ATM (AAL1 and AAL2)'; break;
			case 8.2: return '8.2. Verify NODE B Restart'; break;
			case 8.3: return '8.3. Operation Mode'; break;
			case 8.4: return '8.4. Verify LED STATUS'; break;
		}
		break;
		
		case 8.4:
		switch($sub){
			case 1: return 'CC'; break;
			case 2: return 'BPC'; break;
			case 3: return 'SA'; break;
			case 4: return 'FS'; break;
			case 5: return 'RSU'; break;
		}
		break;
		
		case 9:
		switch($sub){
			case 9.1: return '9.1. Equipment quantity Check'; break;
			case 9.2: return '9.2. Antenna Table'; break;
			case 9.3: return '9.3. Connector Type'; break;
			case 9.4: return '9.4. Remote Electrical Tilt'; break;
			case 9.5: return '9.5. Feeder Cable'; break;
			case 9.6: return '9.6. Top Jumper'; break;
			case 9.7: return '9.7. Bottom Jumper'; break;
		}
		break;
		
		case 9.1:
		switch($sub){
			case 1: return 'Antenna Polarization'; break;
			case 2: return 'Band  Frequency'; break;
			case 3: return 'Number of sectors'; break;
			case 4: return 'Type of Diversity'; break;
			case 5: return 'New Antenna'; break;
			case 6: return 'Old RET'; break;
			case 7: return 'New RET'; break;
			case 8: return 'Old Combiner'; break;
			case 9: return 'New Combiner'; break;
		}
		break;
		
		case 9.2:
		switch($sub){
			case 1: return 'Sector 1 A'; break;
			case 2: return 'Sector 1 B'; break;
			case 3: return 'Sector 2 A'; break;
			case 4: return 'Sector 2 B'; break;
			case 5: return 'Sector 3 A'; break;
			case 6: return 'Sector 3 B'; break;
		}
		break;
		
		case 9.3:
		switch($sub){
			case 1: return '1/2 &quot; N Male'; break;
			case 2: return '1/2 &quot; N Female'; break;
			case 3: return '7/16 &quot; DIN Male'; break;
			case 4: return '7/16 &quot; DIN Female'; break;
			case 5: return '7/8 &quot; Male'; break;
			case 6: return '7/8 &quot; Female'; break;
			case 7: return '1 1/4 &quot; Male'; break;
			case 8: return '1 1/4 &quot; Female'; break;
			case 9: return '1 5/8 &quot; Male'; break;
			case 10: return '1 5/8 &quot; Female'; break;
		}
		break;
		
		case 9.4:
		switch($sub){
			case 1: return 'Sector 1 A'; break;
			case 2: return 'Sector 1 B'; break;
			case 3: return 'Sector 2 A'; break;
			case 4: return 'Sector 2 B'; break;
			case 5: return 'Sector 3 A'; break;
			case 6: return 'Sector 3 B'; break;
		}
		break;
		
		case 9.5:
		switch($sub){
			case 1: return 'Sector 1 A'; break;
			case 2: return 'Sector 1 B'; break;
			case 3: return 'Sector 2 A'; break;
			case 4: return 'Sector 2 B'; break;
			case 5: return 'Sector 3 A'; break;
			case 6: return 'Sector 3 B'; break;
		}
		break;
		
		case 9.6:
		switch($sub){
			case 1: return 'Sector 1 A'; break;
			case 2: return 'Sector 1 B'; break;
			case 3: return 'Sector 2 A'; break;
			case 4: return 'Sector 2 B'; break;
			case 5: return 'Sector 3 A'; break;
			case 6: return 'Sector 3 B'; break;
		}
		break;
		
		case 10:
		switch($sub){
			case '10.1': return '10.1. Installation antenna system'; break;
		}
		break;
		
		case 10.1:
		switch($sub){
			case 1: return 'Maintenance aspect'; break;
			case 2: return 'Antenna mounting'; break;
			case 3: return 'Arm construction'; break;
			case 4: return 'Pylon construction (antenna support)'; break;
			case 5: return 'Feeder placement'; break;
			case 6: return 'Feeder bending'; break;
			case 7: return 'Feeder Connector Installation'; break;
			case 8: return 'Feeder Clamp Installation'; break;
			case 9: return 'Water Leakage'; break;
			case 10: return 'Connection cable feeder correct and tightened'; break;
			case 11: return 'Indoor Cable Tray Installation'; break;
			case 12: return 'Lightning Protection'; break;
			case 13: return 'Grounding in every 50 meter'; break;
			case 14: return 'Grounding Bar on Bending'; break;
			case 15: return 'Grounding Bar at entering room feeder'; break;
			case 16: return 'Grounding feeder shouldn\'t be connected to tower'; break;
			case 17: return 'TVSS availability'; break;
			case 18: return 'TVSS installation & connection'; break;
		}
		break;
		
		case 11:
		switch($sub){
			case 11.1: return '11.1. Orientation outdoor antenna'; break;
			case 11.2: return '11.2. Position outdoor antenna'; break;
		}
		break; 
		
		case 11.1:
		switch($sub){
			case 1: return 'Sector 1 A'; break;
			case 2: return 'Sector 1 B'; break;
			case 3: return 'Sector 2 A'; break;
			case 4: return 'Sector 2 B'; break;
			case 5: return 'Sector 3 A'; break;
			case 6: return 'Sector 3 B'; break;
		}
		break;
		
		case 11.2:
		switch($sub){
			case 1: return 'Placement'; break;
			case 2: return 'Possibility of blocking'; break;
			case 3: return 'Distance from other'; break;
		}
		break;
		
		case 12:
		switch($sub){
			case 12.1: return '12.1. Refer to Guideline Installation'; break;
		}
		break;
		
		case 12.1:
		switch($sub){
			case 1: return 'Sector 1 A'; break;
			case 2: return 'Sector 1 B'; break;
			case 3: return 'Sector 2 A'; break;
			case 4: return 'Sector 2 B'; break;
			case 5: return 'Sector 3 A'; break;
			case 6: return 'Sector 3 B'; break;
		}
		break;
		
		case 13:
		switch($sub){
			case 13.1: return '13.1. VSWR Measurement without TMA'; break;
			case 13.2: return '13.3. VSWR Measurement with TMA'; break;
		}
		break;
		
		case 13.1:
		switch($sub){
			case 1: return 'Sector 1 A'; break;
			case 2: return 'Sector 1 B'; break;
			case 3: return 'Sector 2 A'; break;
			case 4: return 'Sector 2 B'; break;
			case 5: return 'Sector 3 A'; break;
			case 6: return 'Sector 3 B'; break;
		}
		break;
		
		case 13.2:
		switch($sub){
			case 1: return 'Sector 1 A'; break;
			case 2: return 'Sector 1 B'; break;
			case 3: return 'Sector 2 A'; break;
			case 4: return 'Sector 2 B'; break;
			case 5: return 'Sector 3 A'; break;
			case 6: return 'Sector 3 B'; break;
		}
		break;
		
		case 14:
		switch($sub){
			case 14.1: return '14.1. Downloaded Software Status'; break;
		}
		break;
		
		case 15:
		switch($sub){
			case 15.1: return '15.1. Hardware Technical Status & Configuration'; break;
		}
		break;
		
		case 16:
		switch($sub){
			case 16.1: return 'Checking status & Functionality of NODE B Internal Alarm by doing simulation test on NODE B'; break;
			case 16.2: return 'Checking status & functionality External alarms by doing simulation test on transducer/sensor'; break;
		}
		break;
		
		case 16.1:
		switch($sub){
			case 1: return 'Loss Of Signal At Ir Interface'; break;
			case 2: return 'E1/t1 Link Loss Of Frame Alarm'; break;
			case 3: return 'Board Communication Link Is Interrupted'; break;
			case 4: return 'Application Software Monitoring Alarm'; break;
		}
		break;
		
		case 16.2:
		switch($sub){
			case 1: return 'Port No 1'; break;
			case 2: return 'Port No 2'; break;
			case 3: return 'Port No 3'; break;
			case 4: return 'Port No 4'; break;
			case 5: return 'Port No 5'; break;
			case 6: return 'Port No 6'; break;
			case 7: return 'Port No 7'; break;
			case 8: return 'Port No 8'; break;
			case 9: return 'Port No 9'; break;
			case 10: return 'Port No 10'; break;
			case 11: return 'Port No 11'; break;
			case 12: return 'Port No 12'; break;
			case 13: return 'Port No 13'; break;
			case 14: return 'Port No 14'; break;
			case 15: return 'Port No 15'; break;
			case 16: return 'Port No 16'; break;
		}
		break;
		
		case 17:
		switch($sub){
			case 17.1: return '17.1. Voice Test Call'; break;
			case 17.2: return '17.2. Video Test Call'; break;
			case 17.3: return '17.3. Packet Switch Test Call'; break;
			case 17.4: return '17.4. HSDPA Test Call (if the transmission capacity available)'; break;
			case 17.5: return '17.5. SMS Test Call'; break;
			case 17.6: return '17.6. MMS Test Call'; break;
			case 17.7: return '17.7. Incoming & Outgoing softer Hand Over Test'; break;
			case 17.8: return '17.8. Handover Test between 2G and 3G network'; break;
			case 17.9: return '17.9. Emergency Call (118, 112)'; break;
		}
		break;
		
		case 17.1:
		switch($sub){
			case 1: return 'Mobile Originating'; break;
			case 2: return 'Mobile Terminating'; break;
		}
		break;
		
		case 17.2:
		switch($sub){
			case 1: return 'Mobile Originating'; break;
			case 2: return 'Mobile Terminating'; break;
		}
		break;
		
		case 17.3:
		switch($sub){
			case 1: return 'PING'; break;
			case 2: return 'WAP'; break;
			case 3: return 'HTTP'; break;
			case 4: return 'FTP Downlink'; break;
			case 5: return 'FTP Uplink'; break;
			case 6: return 'Video Streaming'; break;
		}
		break;
		
		case 17.4:
		switch($sub){
			case 1: return 'PING'; break;
			case 2: return 'WAP'; break;
			case 3: return 'HTTP'; break;
			case 4: return 'FTP Downlink'; break;
			case 5: return 'FTP Uplink'; break;
			case 6: return 'Video Streaming'; break;
		}
		break;
		
		case 17.5:
		switch($sub){
			case 1: return 'Mobile Originating'; break;
			case 2: return 'Mobile Terminating'; break;
		}
		break;
		
		case 17.6:
		switch($sub){
			case 1: return 'Mobile Originating'; break;
			case 2: return 'Mobile Terminating'; break;
		}
		break;
		
		case 17.7:
		switch($sub){
			case 1: return 'Incoming Handover'; break;
			case 2: return 'Outgoing Handover'; break;
			case 3: return 'Incoming Handover'; break;
			case 4: return 'Outgoing Handover'; break;
			case 5: return 'Incoming Handover'; break;
			case 6: return 'Outgoing Handover'; break;
		}
		break;
		
		case 17.8:
		switch($sub){
			case 1: return 'Handover from 2G to 3G network'; break;
			case 2: return 'Handover from 3G to 2G network'; break;
			case 3: return 'Handover from 2G to 3G network'; break;
			case 4: return 'Handover from 3G to 2G network'; break;
		}
		break;
		
		case 17.9:
		switch($sub){
			case 1: return '112'; break;
			case 2: return '118'; break;
		}
		break;
		
		case 18:
		switch($sub){
			case '18.1': return '18.1. Site condition must be clean'; break;
			case '18.2': return '18.2. No damage at site environment'; break;
			case '18.3': return '18.3. All Infrastructures inside the NODE B must have the same condition as previous'; break;
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