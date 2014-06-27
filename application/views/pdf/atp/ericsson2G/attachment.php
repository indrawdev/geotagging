<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$Qattach = $this->db->query("SELECT `files`, `idx_main`, `idx_sub`, `note` FROM `it_attachment` WHERE `table` IN('atp_chapter_no', 'atp_subchapter_no') AND `idx`='$dx' ORDER BY `idx_main_order`, `idx_sub_order` ASC");
if($Qattach->num_rows):

function main_name($dx){
	switch($dx){
		case '1': return 'Preliminary site checks'; break;
		case '1.1': return 'CME Site Acceptance has been approved'; break;
		case '1.2': return 'Site documentation must be available'; break;
		case '1.3': return 'Commissioning check list should be attached'; break;
		case '1.4': return 'NIB (Network implementation binder) / Installation Binder'; break;
		case '1.5': return 'Link (E1) Preparation already done'; break;
		case '1.6': return 'Before starting (on arrival at the site)'; break;
		case '1.6.1': return 'Check engineer\'s certificate of competency level'; break;
		case '1.6.2': return 'Check tools and equipment'; break;
		case '1.6.3': return 'For swap out cases, dummy load must be available'; break;
		case '1.6.4': return 'Document MOP and ATP must be available'; break;
		case '1.7': return 'BOQ fill with feature information activation'; break;
		case '2': return 'Checking HW configuration visually'; break;
		case '3': return 'Checking on labelling'; break;
		case '3.1': return 'Check label module (serial number, technical status)'; break;
		case '3.2': return 'Check RBS rack label'; break;
		case '3.3': return 'Check DDF label (end to end site)'; break;
		case '3.4': return 'Check power supply label'; break;
		case '3.5': return 'Check feeder cable label (for antenna sector)'; break;
		case '3.6': return 'Check Antenna label'; break;
		case '4': return 'Checking grounding integration'; break;
		case '5': return 'Powers Measurement '; break;
		case '5.1': return 'Measurement AC Power Line (L1/L2/L3)'; break;
		case '5.2': return 'Measurement RBS Input Power / Cabinet Voltage'; break;
		case '5.3': return 'Measurement AC Power Input PSU RBS'; break;
		case '5.4': return 'Measurement DC Power Output PSU RBS'; break;
		case '6': return 'Checking RBS Rack Circuit Breaker (switch ON/OFF )'; break;
		case '6.1': return 'Sub rack 1 /RBS 1'; break;
		case '6.2': return 'Sub rack 2/ RBS 2'; break;
		case '6.3': return 'Sub rack 3/ RBS 3'; break;
		case '7': return 'Checking Climate System Installation'; break;
		case '7.1': return 'Check Climate system Model (Should be Extended)*'; break;
		case '7.2': return 'Check Functionality of each Fan'; break;
		case '7.3': return 'Check cabinet temperature'; break;
		case '7.4': return 'Check completeness climate system installation'; break;
		case '8': return 'Software and database Used'; break;
		case '8.1': return 'BTS Software'; break;
		case '8.2': return 'OMT Software version'; break;
		case '9': return 'RBS Restart'; break;
		case '9.1': return 'Check all Hardware Technical Status before RBS restart'; break;
		case '9.2': return 'Check all Hardware Technical Status after RBS restart'; break;
		case '10': return 'Checking Downloading software status'; break;
		case '10.1': return 'Downloading Software Status'; break;
		case '11': return 'Checking Hardware Technical Status and Configuration'; break;
		case '11.1': return 'Against actual site configuration.'; break;
		case '12': return 'Checking Cell Identification & Radio Channel Configuration'; break;
		case '12.1': return 'Cell Identification & Radio Channel Configuration'; break;
		case '13': return 'Checking RBS Internal alarm status & functionality of RBS'; break;
		case '13.1': return 'Checking status & Functionality of RBS Internal Alarm'; break;
		case '13.2': return 'Checking status & functionality External alarms'; break;
		case '14': return 'RBS Internal Alarm'; break;
		case '15': return 'Abis Path / PCM Port Connection status using OMT'; break;
		case '15.1': return 'RBS1 / RBS2 PCM-A Port Connection'; break;
		case '15.2': return 'RBS1 / RBS2 PCM-B Port Connection'; break;
		case '15.3': return 'RBS1 / RBS2 PCM-C Port Connection'; break;
		case '15.4': return 'RBS1 / RBS2 PCM-D Port Connection'; break;
		case '16': return 'Checking the transmission parameter of RBS1 /RBS2'; break;
		case '16.1': return 'RBLT allocation On BSC'; break;
		case '16.2': return 'Type of LAPD (Link Access Protocol on D channel)'; break;
		case '16.3': return 'Network Topology'; break;
		case '16.4': return 'Synchronize source'; break;
		case '17': return 'Checking time slot occupation'; break;
		case '17.1': return 'Time Slot Occupation GSM 900'; break;
		case '17.2': return 'Time Slot Occupation DCS 1800'; break;
		case '18': return 'Checking sector mapping in Remote Inventory'; break;
		case '18.1': return 'Sector Mapping RBS1 / RBS2'; break;
		case '19': return 'Setting VSWR Limit Alarm using OMT'; break;
		case '19.1': return 'VSWR Limit Alarm Monitoring GSM 900'; break;
		case '19.2': return 'VSWR Limit Alarm Monitoring DCS 1800'; break;
		case '20': return 'Test Call (successful)'; break;
		case '20.1': return 'From MS to MS GSM900 / DCS1800'; break;
		case '20.2': return 'From MS to PSTN GSM900 / DCS1800'; break;
		case '20.3': return 'Call to Specific/Emergency Numbers'; break;
		case '20.4': return 'HO test (500 m or after HO)'; break;
		case '20.5': return 'GPRS functionality test'; break;
		case '20.6': return 'EDGE / EGPRS Functionality Test Call'; break;
		case '21': return 'Antenna system measurement Antenna Diversity Test'; break;
		case '21.1': return 'GSM 900 Antenna Diversity Test'; break;
		case '21.2': return 'DCS 1800 Antenna Diversity Test'; break;
		case '22': return 'RUG / RUS Output power & VSWR'; break;
		case '22.1': return 'DRU / RUG /RUS Output power & VSWR Test use OMT - GSM
900'; break;
		case '22.2': return 'DRU / RUG / RUS Output power & VSWR Test use OMT - DCS
1800'; break;
		case '23': return 'Checking License of MCPA/IPM feature in RUS'; break;
		case '23.1': return 'Checking MCPA/IPM license activation'; break;
		case '23.2': return 'Checking MCPA/IPM license capacity'; break;
		case '24': return 'Antenna system measurement'; break;
		case '24.1': return 'Distance to fault use dummy load'; break;
		case '24.2': return 'VSWR Measurement'; break;
		case '24.2.1': return 'VSWR Measurement UL & DL GSM 900'; break;
		case '24.2.2': return 'VSWR Measurement UL & DL DCS 1800'; break;
		case '25': return 'Battery Backup System (BBS) Test'; break;
		case '25.1': return 'BBS Type Identification'; break;
		case '26': return 'Checking Site Condition (Cleanliness Check)'; break;
		case '26.1': return 'Site condition must be clean'; break;
		case '26.2': return 'No damage at site environment'; break;
		case '26.3': return 'All Infrastructures inside the RBS must have the same condition as previous'; break;

	}
}

function sub_name($dx, $sub){
	switch($dx){
		case 1:
		switch($sub){
			case '1.1': return '1.1. CME Site Acceptance has been approved'; break;
			case '1.2': return '1.2. Site documentation must be available'; break;
			case '1.3': return '1.3. Commissioning check list should be attached'; break;
			case '1.4': return '1.4. NIB (Network implementation binder) / Installation Binder'; break;
			case '1.5': return '1.5. Link (E1) Preparation already done'; break;
			case '1.6': return '1.6. Before starting (on arrival at the site)'; break;
			case '1.6.1': return '1.6.1. Check engineer\'s certificate of competency level'; break;
			case '1.6.2': return '1.6.2. Check tools and equipment'; break;
			case '1.6.3': return '1.6.3. For swap out cases, dummy load must be available'; break;
			case '1.6.4': return '1.6.4. Document MOP and ATP must be available'; break;
			case '1.7': return '1.7. BOQ fill with feature information activation'; break;
		}
		break;
		
		case 2:
		switch($sub){
			case 2.1: return '2.1. Compare with equipment order list attachment which is based on Site Documentation, NIB or Planning recommendation'; break;
		}
		break;
		
		case 3:
		switch($sub){
			case 3.1: return '3.1. Check label module (serial number, technical status)'; break;
			case 3.2: return '3.2. Check RBS rack label'; break;
			case 3.3: return '3.3. Check DDF label (end to end site)'; break;
			case 3.4: return '3.4. Check power supply label'; break;
			case 3.5: return '3.5. Check feeder cable label (for antenna sector)'; break;
			case 3.6: return '3.6. Check Antenna label'; break;
		}
		break;
		
		case 4:
		switch($sub){
			case 4.1: return '4.1. Grounding RBS (proper connection and integration)'; break;
		}
		break;
		
		case 5:
		switch($sub){
			case 5.1: return '5.1. Measurement AC Power Line (L1/L2/L3)'; break;
			case 5.2: return '5.2. Measurement RBS Input Power / Cabinet Voltage'; break;
			case 5.3: return '5.3. Measurement AC Power Input PSU RBS'; break;
			case 5.4: return '5.4. Measurement DC Power Output PSU RBS'; break; break;
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
			case 2: return 'Cabinet 2'; break;
			case 3: return 'Cabinet 3'; break;
		}
		break;
		
		case 6:
		switch($sub){
			case 6.1: return '6.1. Sub rack 1 /RBS 1'; break;
			case 6.2: return '6.2. Sub rack 2/ RBS 2'; break;
			case 6.3: return '6.3. Sub rack 3/ RBS 3'; break;
		}
		break;				
		
		case 7:
		switch($sub){
			case 7.1: return '7.1. Check Climate system Model (Should be Extended)*'; break;
			case 7.2: return '7.2. Check Functionality of each Fan'; break;
			case 7.3: return '7.3. Check cabinet temperature'; break;
			case 7.4: return '7.4. Check completeness climate system installation'; break;
		}
		break;
		
		case 8:
		switch($sub){
			case 8.1: return '8.1. BTS Software'; break;
			case 8.2: return '8.2. OMT Software version'; break;
		}
		break;				
		
		case 9:
		switch($sub){
			case 9.1: return '9.1. Check all Hardware Technical Status before RBS restart'; break;
			case 9.2: return '9.2. Check all Hardware Technical Status after RBS restart'; break;
		}
		break;				
		
		case 10:
		switch($sub){
			case '10.1': return '10.1. Downloading Software Status'; break;
		}
		break;				
		
		case 11:
		switch($sub){
			case 11.1: return '11.1. Against actual site configuration.'; break;
		}
		break;
				
		
		case 12:
		switch($sub){
			case 12.1: return '12.1. Cell Identification & Radio Channel Configuration'; break;
		}
		break;
		
		case 12.1:
		switch($sub){
			case 1: return '12.1.1. Sector 1'; break;
			case 2: return '12.1.2. Sector 2'; break;
			case 3: return '12.1.3. Sector 3'; break;
			case 4: return '12.1.4. Sector 1'; break;
			case 5: return '12.1.5. Sector 2'; break;
			case 6: return '12.1.6. Sector 3'; break;
		}
		break;
		
		case 13:
		switch($sub){
			case 13.1: return '13.1. Checking status & Functionality of RBS Internal Alarm by doing simulation test on RBS'; break;
			case 13.2: return '13.2. Checking status & functionality External alarms by doing simulation test on transducer/sensor'; break;
		}
		break;
		
		case 14:
		switch($sub){
			case 14.1: return '14.1. Checking status & Functionality of RBS Internal'; break;
		}
		break;
		
		case 14.1:
		switch($sub){
			case 1: return '14.1.1. Power com loop'; break;
			case 2: return '14.1.2. Internal power capacity reduced'; break;
			case 3: return '14.1.3. Battery backup cap reduced'; break;
			case 4: return '14.1.4. Climate capacity reduced'; break;
			case 5: return '14.1.5. Climate sensor fault'; break;
		}
		break;
		
		case 14.2:
		switch($sub){
			case 1: return '14.2.1. Door Open'; break;
			case 2: return '14.2.2. AC Power L1 fails'; break;
			case 3: return '14.2.3. AC Power L2 fails'; break;
			case 4: return '14.2.4. AC Power L3 fails'; break;
			case 5: return '14.2.5. Fire (Smoke Detector)'; break;
			case 6: return '14.2.6. Fire (Heat Detector)'; break;
			case 7: return '14.2.7. Indoor Temp. High'; break;
			case 8: return '14.2.8. Arrester PDB Alarm'; break;
			case 9: return '14.2.9. *Genset - Accu Low **Rectifier - Mains Fails'; break;
			case 10: return '14.2.10. *Genset - Solar Low ** Rectifier Battery Fuse'; break;
			case 11: return '14.2.11. *Genset - Working **Rectifier - Load Fuse'; break;
			case 12: return '14.2.12. *Genset - Warming up **Rectifier - Low Voltage'; break;
			case 13: return '14.2.13. ** Rectifier - Module Alarm *** Rectifier - Mains Fails'; break;
			case 14: return '14.2.14. *** Rectifier - Battery Fuse'; break;
			case 15: return '14.2.15. *** Rectifier - Module Alarm'; break;
			case 16: return '14.2.16. Arrester (OVP) Alarm'; break;
		}
		break;				
		
		case 15:
		switch($sub){
			case 15.1: return '15.1. RBS1 / RBS2 PCM-A Port Connection'; break;
			case 15.2: return '15.2. RBS1 / RBS2 PCM-B Port Connection'; break;
			case 15.3: return '15.3. RBS1 / RBS2 PCM-C Port Connection'; break;
			case 15.4: return '15.4. RBS1 / RBS2 PCM-D Port Connection'; break;
		}
		break;
		
		case 16:
		switch($sub){
			case 16.1: return '16.1. RBLT allocation On BSC'; break;
			case 16.2: return '16.2. Type of LAPD (Link Access Protocol on D channel)'; break;
			case 16.3: return '16.3. Network Topology'; break;
			case 16.4: return '16.4. Synchronize source'; break;
		}
		break;
		
		case 17:
		switch($sub){
			case 17.1: return '17.1. Time Slot Occupation GSM 900'; break;
			case 17.2: return '17.2. Time Slot Occupation DCS 1800'; break;
		}
		break;
		
		case 17.1:
		switch($sub){
			case 1: return 'Time Slot Occupation GSM 900'; break;
		}
		break;
		
		case 17.2:
		switch($sub){
			case 1: return 'Time Slot Occupation DCS 1800'; break;
		}
		break;
		
		case 18:
		switch($sub){
			case '18.1': return '18.1. Sector Mapping RBS1 / RBS2'; break;
		}
		break;				
		
		case 19:
		switch($sub){
			case 19.1: return '19.1. VSWR Limit Alarm Monitoring GSM 900'; break;
			case 19.2: return '19.2. VSWR Limit Alarm Monitoring DCS 1800'; break;
		}
		break;
		
		case 19.1:
		switch($sub){
			case 1: return '19.1.1. Antenna 0'; break;
			case 2: return '19.1.2. Antenna 1'; break;
			case 3: return '19.1.3. Antenna 2'; break;
			case 4: return '19.1.4. Antenna 3'; break;
			case 5: return '19.1.5. Antenna 4'; break;
			case 5: return '19.1.6. Antenna 5'; break;
		}
		break;
		
		case 19.2:
		switch($sub){
			case 1: return '19.2.1. Antenna 0'; break;
			case 2: return '19.2.2. Antenna 1'; break;
			case 3: return '19.2.3. Antenna 2'; break;
			case 4: return '19.2.4. Antenna 3'; break;
			case 5: return '19.2.5. Antenna 4'; break;
			case 5: return '19.2.6. Antenna 5'; break;
			case 5: return '19.2.7. Antenna 6'; break;
			case 5: return '19.2.8. Antenna 7'; break;
			case 5: return '19.2.9. Antenna 8'; break;
		}
		break;	
		
		case 19.6:
		switch($sub){
			case 1: return 'Number of Time Slot'; break;
			case 2: return 'Downlink'; break;
			case 3: return 'Uplink'; break;
		}
		break;
		
		case 19.7:
		switch($sub){
			case 1: return 'SECTOR A : MCC'; break;
			case 2: return 'SECTOR A : MNC'; break;
			case 3: return 'SECTOR A : LAC'; break;
			case 4: return 'SECTOR A : CELL ID'; break;
			case 5: return 'SECTOR A : ARFCN/BCCH'; break;
		}
		break;	
		
		case 19.8:
		switch($sub){
			case 1: return 'PING'; break;
			case 2: return 'WAP'; break;
			case 3: return 'HTTP'; break;
			case 4: return 'FTP Downlink'; break;
			case 5: return 'FTP Uplink'; break;
			case 6: return 'Video Streaming'; break;
		}
		break;	
		
		case 19.9:
		switch($sub){
			case 1: return 'SECTOR B : MCC'; break;
			case 2: return 'SECTOR B : MNC'; break;
			case 3: return 'SECTOR B : LAC'; break;
			case 4: return 'SECTOR B : CELL ID'; break;
			case 5: return 'SECTOR B : ARFCN/BCCH'; break;
		}
		break;	
		
		case 19.10:
		switch($sub){
			case 1: return 'PING'; break;
			case 2: return 'WAP'; break;
			case 3: return 'HTTP'; break;
			case 4: return 'FTP Downlink'; break;
			case 5: return 'FTP Uplink'; break;
			case 6: return 'Video Streaming'; break;
		}
		break;	
		
		case 19.11:
		switch($sub){
			case 1: return 'SECTOR C : MCC'; break;
			case 2: return 'SECTOR C : MNC'; break;
			case 3: return 'SECTOR C : LAC'; break;
			case 4: return 'SECTOR C : CELL ID'; break;
			case 5: return 'SECTOR C : ARFCN/BCCH'; break;
		}
		break;	
		
		case 19.12:
		switch($sub){
			case 1: return 'PING'; break;
			case 2: return 'WAP'; break;
			case 3: return 'HTTP'; break;
			case 4: return 'FTP Downlink'; break;
			case 5: return 'FTP Uplink'; break;
			case 6: return 'Video Streaming'; break;
		}
		break;			
								
		case 20:
		switch($sub){
			case 20.1: return '20.1. From MS to MS GSM900 / DCS1800'; break;
			case 20.2: return '20.2. From MS to PSTN GSM900 / DCS1800'; break;
			case 20.3: return '20.3. Call to Specific/Emergency Numbers (108, 112) GSM900 / DCS1800'; break;
			case 20.4: return '20.4. HO test (500 m or after HO)'; break;
			case 20.5: return '20.5. GPRS functionality test (access to Web) GSM900 / DCS1800'; break;
			case 20.6: return '20.6. EDGE / EGPRS Functionality Test Call'; break;
		}
		break;
		
		case 21:
		switch($sub){
			case 21.1: return '21.1. GSM 900 Antenna Diversity Test'; break;
			case 21.2: return '21.2. DCS 1800 Antenna Diversity Test'; break;
		}
		break;
		
		case 21.1:
		switch($sub){
			case 1: return '21.1.1. TRX - 1'; break;
			case 2: return '21.1.2. TRX - 2'; break;
			case 3: return '21.1.3. TRX - 3'; break;
			case 4: return '21.1.4. TRX - 4'; break;
			case 5: return '21.1.5. TRX - 5'; break;
			case 6: return '21.1.6. TRX - 6'; break;
			case 7: return '21.1.7. TRX - 7'; break;
			case 8: return '21.1.8. TRX - 8'; break;
			case 9: return '21.1.9. TRX - 9'; break;
			case 10: return '21.1.10. TRX - 10'; break;
			case 11: return '21.1.11. TRX - 11'; break;
			case 12: return '21.1.12. TRX - 12'; break;
			case 13: return '21.1.13. TRX - 13'; break;
			case 14: return '21.1.14. TRX - 14'; break;
			case 15: return '21.1.15. TRX - 15'; break;
			case 16: return '21.1.16. TRX - 16'; break;
		}
		break;
		
		case 21.2:
		switch($sub){
			case 1: return '21.2.1. TRX - 1'; break;
			case 2: return '21.2.2. TRX - 2'; break;
			case 3: return '21.2.3. TRX - 3'; break;
			case 4: return '21.2.4. TRX - 4'; break;
			case 5: return '21.2.5. TRX - 5'; break;
			case 6: return '21.2.6. TRX - 6'; break;
			case 7: return '21.2.7. TRX - 7'; break;
			case 8: return '21.2.8. TRX - 8'; break;
			case 9: return '21.2.9. TRX - 9'; break;
			case 10: return '21.2.10. TRX - 10'; break;
			case 11: return '21.2.11. TRX - 11'; break;
			case 12: return '21.2.12. TRX - 12'; break;
			case 13: return '21.2.13. TRX - 13'; break;
			case 14: return '21.2.14. TRX - 14'; break;
			case 15: return '21.2.15. TRX - 15'; break;
			case 16: return '21.2.16. TRX - 16'; break;
			case 17: return '21.2.17. TRX - 17'; break;
			case 18: return '21.2.18. TRX - 18'; break;
			case 19: return '21.2.19. TRX - 19'; break;
			case 20: return '21.2.20. TRX - 20'; break;
			case 21: return '21.2.21. TRX - 21'; break;
			case 22: return '21.2.22. TRX - 22'; break;
			case 23: return '21.2.23. TRX - 23'; break;
			case 24: return '21.2.24. TRX - 24'; break;
		}
		break;
		
		case 22:
		switch($sub){
			case 22.1: return '22.1. DRU / RUG /RUS Output power & VSWR Test use OMT - GSM 900'; break;
			case 22.2: return '22.2. DRU / RUG / RUS Output power & VSWR Test use OMT - DCS 1800'; break;
		}
		break;
		
		case 22.1:
		switch($sub){
			case 1: return '22.1.1. TRX - 0'; break;
			case 2: return '22.1.2. TRX - 1'; break;
			case 3: return '22.1.3. TRX - 2'; break;
			case 4: return '22.1.4. TRX - 3'; break;
			case 5: return '22.1.5. TRX - 4'; break;
			case 6: return '22.1.6. TRX - 5'; break;
			case 7: return '22.1.7. TRX - 6'; break;
			case 8: return '22.1.8. TRX - 7'; break;
			case 9: return '22.1.9. TRX - 8'; break;
			case 10: return '22.1.10. TRX - 9'; break;
			case 11: return '22.1.11. TRX - 10'; break;
			case 12: return '22.1.12. TRX - 11'; break;
		}
		break;
		
		case 22.2:
		switch($sub){
			case 1: return '22.2.1. TRX - 0'; break;
			case 2: return '22.2.2. TRX - 1'; break;
			case 3: return '22.2.3. TRX - 2'; break;
			case 4: return '22.2.4. TRX - 3'; break;
			case 5: return '22.2.5. TRX - 4'; break;
			case 6: return '22.2.6. TRX - 5'; break;
			case 7: return '22.2.7. TRX - 6'; break;
			case 8: return '22.2.8. TRX - 7'; break;
			case 9: return '22.2.9. TRX - 8'; break;
			case 10: return '22.2.10. TRX - 9'; break;
			case 11: return '22.2.11. TRX - 10'; break;
			case 12: return '22.2.12. TRX - 11'; break;
		}
		break;
		
		case 23:
		switch($sub){
			case 23.1: return '23.1. Checking MCPA/IPM license activation'; break;
			case 23.2: return '23.2. Checking MCPA/IPM license capacity'; break;
		}
		break;
		
		case 23.1:
		switch($sub){
			case 1: return 'MCPA license Activation'; break;
		}
		break;
		
		case 24:
		switch($sub){
			case 24.1: return '24.1. Distance to fault use dummy load'; break;
			case 24.2: return '24.2. VSWR Measurement'; break;
			case '24.2.1': return '24.2.1. VSWR Measurement UL & DL GSM 900'; break;
			case '24.2.2': return '24.2.2. VSWR Measurement UL & DL DCS 1800'; break;
		}
		break;
		
		case 24.1:
		switch($sub){
			case 1: return 'Cell A DX1'; break;
			case 2: return 'Cell A DX2'; break;
			case 3: return 'Cell A DX3'; break;
			case 4: return 'Cell A DX4'; break;
			case 5: return 'Cell B DX1'; break;
			case 6: return 'Cell B DX2'; break;
			case 7: return 'Cell B DX3'; break;
			case 8: return 'Cell B DX4'; break;
			case 9: return 'Cell C DX1'; break;
			case 10: return 'Cell C DX2'; break;
			case 11: return 'Cell C DX3'; break;
			case 12: return 'Cell C DX4'; break;
		}
		break;
		
		case 24.2:
		switch($sub){
			case 1: return 'Cell A DX1'; break;
			case 2: return 'Cell A DX2'; break;
			case 3: return 'Cell A DX3'; break;
			case 4: return 'Cell A DX4'; break;
			case 5: return 'Cell B DX1'; break;
			case 6: return 'Cell B DX2'; break;
			case 7: return 'Cell B DX3'; break;
			case 8: return 'Cell B DX4'; break;
			case 9: return 'Cell C DX1'; break;
			case 10: return 'Cell C DX2'; break;
			case 11: return 'Cell C DX3'; break;
			case 12: return 'Cell C DX4'; break;
		}
		break;
		
		case 24.3:
		switch($sub){
			case 1: return 'Cell A DX1'; break;
			case 2: return 'Cell A DX2'; break;
			case 3: return 'Cell A DX3'; break;
			case 4: return 'Cell A DX4'; break;
			case 5: return 'Cell B DX1'; break;
			case 6: return 'Cell B DX2'; break;
			case 7: return 'Cell B DX3'; break;
			case 8: return 'Cell B DX4'; break;
			case 9: return 'Cell C DX1'; break;
			case 10: return 'Cell C DX2'; break;
			case 11: return 'Cell C DX3'; break;
			case 12: return 'Cell C DX4'; break;
		}
		break;
		
		case 25:
		switch($sub){
			case 25.1: return '25.1. BBS Type Identification'; break;
		}
		break;
		
		case 25.1:
		switch($sub){
			case 1: return '25.1.1. BBS 6201 for RBS 6201'; break;
			case 2: return '25.1.2. BBS for RBS 6102'; break;
			case 3: return '25.1.3. BBS for 6601'; break;
			case 4: return '25.1.4. Temperature sensor'; break;
			case 5: return '25.1.5. Internal BBS alarm functionality'; break;
		}
		break;
		
		case 25.2:
		switch($sub){
			case 1: return '25.2.1. Power Bar'; break;
			case 2: return '25.2.2. Battery cable connection'; break;
			case 3: return '25.2.3. Battery 12 V'; break;
			case 4: return '25.2.4. Fan unit /Cooling Fan *'; break;
			case 5: return '25.2.5. Switch use for Fan *'; break;
			case 6: return '25.2.6. FUSE Battery'; break;
		}
		break;
		
		case 25.2:
		switch($sub){
			case 1: return '25.3.1. Battery 1'; break;
			case 2: return '25.3.2. Battery 2'; break;
			case 3: return '25.3.3. Battery 3'; break;
			case 4: return '25.3.4. Battery 4'; break;
			case 5: return '25.3.5. Battery 5'; break;
			case 6: return '25.3.6. Battery 6'; break;
			case 7: return '25.3.7. Battery 7'; break;
			case 8: return '25.3.8. Battery 8'; break;
			case 9: return '25.3.9. Battery 9'; break;
			case 10: return '25.3.10. Battery 10'; break;
			case 11: return '25.3.11. Battery 11'; break;
			case 12: return '25.3.12. Battery 12'; break;
			case 13: return '25.3.13. Battery 13'; break;
			case 14: return '25.3.14. Battery 14'; break;
			case 15: return '25.3.15. Battery 15'; break;
		}
		break;
		
		case 26:
		switch($sub){
			case 26.1: return '26.1. Site condition must be clean'; break;
			case 26.2: return '26.2. No damage at site environment'; break;
			case 26.3: return '26.3. All Infrastructures inside the RBS must have the same condition as previous'; break;
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