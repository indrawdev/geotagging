<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$Qattach = $this->db->query("SELECT `files`, `idx_main`, `idx_sub`, `note` FROM `it_attachment` WHERE `table` IN('atp_chapter_no', 'atp_subchapter_no') AND `idx`='$dx' ORDER BY `idx_main_order`, `idx_sub_order` ASC");
if($Qattach->num_rows):

function main_name($dx){
	switch($dx){
		case '1': return 'Preliminary site checks'; break;
		case '1.1': return 'Site Acceptance has been approved'; break;
		case '1.2': return 'Site documentation must be available'; break;
		case '1.3': return 'Commissioning check list should be attached'; break;
		case '1.4': return 'NDB documentation (Table Engineering)'; break;
		case '1.5': return 'Link Preparation already done'; break;
		case '1.6': return 'Before starting (on arrival at the site)'; break;
		case '1.6.1': return 'Check engineer is certificate of competency level'; break;
		case '1.6.2': return 'Check tools and equipment'; break;
		case '1.6.3': return 'For swap out cases, dummy load must be available'; break;
		case '2': return 'Checking HW configuration visually'; break;
		case '3': return 'Checking on labelling'; break;
		case '3.1': return 'Check label module (serial number, technical status)'; break;
		case '3.2': return 'Check BTS rack label'; break;
		case '3.3': return 'Check DDF label (end to end site)'; break;
		case '3.4': return 'Check power supply label'; break;
		case '3.5': return 'Check feeder cable label (for antenna sector)'; break;
		case '4': return 'Checking grounding integration'; break;
		case '5': return 'Measurement BTS input power DC'; break;
		case '5.1': return 'Input DC power BTS'; break;
		case '5.2': return 'Checking BTS Rack Circuit Breaker (switch ON/OFF )'; break;
		case '5.2.1': return 'Sub rack 1'; break;
		case '5.2.2': return 'Sub rack 2'; break;
		case '5.2.3': return 'Sub rack 3'; break;
		case '5.2.4': return 'Sub rack 4'; break;
		case '5.2.5': return 'Sub rack 5'; break;
		case '6': return 'Checking Hardware Status'; break;
		case '6.1': return 'Checking Hardware Technical Status and physical'; break;
		case '6.2': return 'addresses by plug and unplug all installed TRX'; break;
		case '7': return 'Checking Radio Channel Configuration1'; break;
		case '8': return 'Checking the alarms'; break;
		case '9': return 'Downloading software'; break;
		case '10': return 'Checking VSWR, TRX output power, BCCH reconfiguration'; break;
		case '10.1': return 'TRX output power & VSWR measurement and BCCH
reconfiguration'; break;
		case '10.2': return 'Power output Insertion Loss & VSWR measurement after CDU'; break;
		case '11': return 'Checking time slot occupation'; break;
		case '12': return 'BTS Restart'; break;
		case '12.1': return 'Check all Hardware Normal Status before BTS restart'; break;
		case '12.2': return 'Check all Hardware Normal Status after BTS restart'; break;
		case '13': return 'Test Call using permanent CI number'; break;
		case '13.1': return 'From MS to MS (Matrix, Mentari & IM3)'; break;
		case '13.2': return 'From MS to PSTN'; break;
		case '13.3': return 'Send sms from MS to MS'; break;
		case '13.4': return 'HO test will be done before we leave the site.'; break;
		case '13.5': return 'GPRS functional test'; break;
		case '13.6': return 'EDGE/EGPRS functionality test'; break;
		case '14': return 'Checking Site Condition'; break;
		case '14.1': return 'Site condition must be clean'; break;
		case '14.2': return 'No damage at site environment'; break;
		case '14.3': return 'All Infrastructures inside the BTS should have the same
condition as previous'; break;
		case '15': return 'Antenna System Preliminary Check'; break;
		case '15.1': return 'Tools/Equipment for Test'; break;
		case '15.2': return 'Documentation Check'; break;
		case '16': return 'Antenna System Inventory Check'; break;
		case '16.1': return 'Equipment Quantity check'; break;
		case '16.2': return 'Connector type'; break;
		case '16.3': return 'Antenna Table Connection'; break;
		case '16.4': return 'Coaxial Feeder'; break;
		case '16.5': return 'Top Jumper'; break;
		case '16.6': return 'Bottom Jumper'; break;
		case '17': return 'Installation and Construction'; break;
		case '17.1': return 'Installation/Execution for Antenna Outdoor'; break;
		case '17.2': return 'Antenna System and Other Component Labelling'; break;
		case '17.3': return 'Orientation of Antenna'; break;
		case '17.4': return 'Position of Antenna'; break;
		case '18': return 'Antenna System Measurement'; break;
		case '18.1': return 'All measurement result'; break;
		case '18.2': return 'Distance to Fault with Precision Load'; break;
		case '18.3': return 'Cable Loss Measurement'; break;
		case '18.4': return 'VSWR Measurement'; break;
		case '19': return 'Additional Component measurement'; break;
		case '19.1': return 'Filter CDMA 800 Rejection measurement'; break;
		case '19.2': return 'Tower Mounted Amplifier (TMA) Measurement'; break;
		case '19.3': return 'Arrester Measurement'; break;
	}
}

function sub_name($dx, $sub){
	switch($dx){
		case 1:
		switch($sub){
			case 1.1: return '1.1. Site Acceptance has been approved'; break;
			case 1.2: return '1.2. Site documentation must be available'; break;
			case 1.3: return '1.3. Commissioning check list should be attached'; break;
			case 1.4: return '1.4. NDB documentation (Table Engineering)'; break;
			case 1.5: return '1.5. Link Preparation already done'; break;
			case 1.6: return '1.6. Before starting (on arrival at the site)'; break;
			case '1.6.1': return '1.6.1. Check engineer is certificate of competency level'; break;
			case '1.6.2': return '1.6.2. Check tools and equipment'; break;
			case '1.6.3': return '1.6.3. For swap out cases, dummy load must be available'; break;
		}
		break;
		
		case 2:
		switch($sub){
			case 2.1: return '2.1. Compare with equipment order list attachment which is based on NDB, Engineering Table or Planning and Project recommendation'; break;
		}
		break;
		
		case 3:
		switch($sub){
			case 3.1: return '3.1. Check label module (serial number, technical status)'; break;
			case 3.2: return '3.2. Check NODE B rack label'; break;
			case 3.3: return '3.3. Check DDF label (end to end site)'; break;
			case 3.4: return '3.4. Check power supply label'; break;
			case 3.5: return '3.5. Check feeder cable label (for antenna sector)'; break;
		}
		break;
		
		case 4:
		switch($sub){
			case 4.1: return '4.1. Grounding BTS (proper connection and integration)'; break;
		}
		break;
		
		case 5:
		switch($sub){
			case 5.1: return '5.1. Base Station is supplied by -48 V DC'; break;
		}
		break;
		
		case 5.1:
		switch($sub){
			case 1: return 'Input BTS (VDC)'; break;
		}
		break;
		
		case 5.2:
		switch($sub){
			case 1: return 'Sub rack 1'; break;
			case 2: return 'Sub rack 2'; break;
			case 3: return 'Sub rack 3'; break;
			case 4: return 'Sub rack 4'; break;
			case 5: return 'Sub rack 5'; break;
		}
		break;
		
		case 6:
		switch($sub){
			case 6.1: return '6.1. Checking Hardware Technical Status and physical'; break;
			case 6.2: return '6.2. addresses by plug and unplug all installed TRX, and make coordination with ZTE GSM-OMC'; break;
		}
		break;
		
		case 6.1:
		switch($sub){
			case 1: return 'FS'; break;
			case 2: return 'PM'; break;
			case 3: return 'CC'; break;
			case 4: return 'SA'; break;
			case 5: return 'UBPG/BPC'; break;
			case 6: return 'FA'; break;
			case 7: return 'RSU60E'; break;
			case 8: return 'RSU60E'; break;
			case 9: return 'RSU60E'; break;
			case 10: return 'RSU40'; break;
			case 11: return 'RSU40'; break;
			case 12: return 'RSU40'; break;
			case 13: return 'Fan subrack'; break;
			case 14: return 'B121 power supply'; break;
			case 15: return 'ZXSDR B8200'; break;
			case 16: return 'LPU lightning protection box'; break;
			case 17: return 'Storage battery'; break;
			case 18: return 'DCPD4E'; break;
			case 19: return 'FAN subrack'; break;
			case 20: return 'RF unit'; break;
		}
		break;
		
		case 7:
		switch($sub){
			case 7.1: return '7.1. It should be compare with data from TMS'; break;
		}
		break;
		
		case 7.1:
		switch($sub){
			case 1: return 'Sector 1'; break;
			case 2: return 'Sector 2'; break;
			case 3: return 'Sector 3'; break;
		}
		break;
		
		case 8:
		switch($sub){
			case 8.1: return '8.1. Active alarms should be cleared'; break;
		}
		break;
		
		case 8.1:
		switch($sub){
			case 1: return 'SYCK alarm'; break;
			case 2: return 'EI/T1 transmission alarm'; break;
			case 3: return 'TRX Block alarm'; break;
			case 4: return ''; break;
			case 5: return ''; break;
			case 6: return 'Low batt Alarm'; break;
			case 7: return 'High temp Alarm'; break;
			case 8: return 'Smog Alarm'; break;
			case 9: return 'Failure of air conditioner'; break;
			case 10: return 'Flooding Alarm'; break;
			case 11: return 'Door open Alarm'; break;
			case 12: return 'Power down Alarm'; break;
			case 13: return ''; break;
			case 14: return ''; break;
			case 15: return ''; break;
		}
		break;
		
		case 9:
		switch($sub){
			case 9.1: return '9.1. Successfully downloaded'; break;
		}
		break;
		
		case 10:
		switch($sub){
			case '10.1': return '10.1. TRX output power & VSWR measurement and BCCH
reconfiguration'; break;
			case '10.2': return '10.2. Power output Insertion Loss & VSWR measurement after CDU'; break;
		}
		break;
		
		case 10.1:
		switch($sub){
			case 1: return 'BS8800'; break;
			case 2: return 'BS8900'; break;
		}
		break;
		
		case 10.2:
		switch($sub){
			case 1: return 'TRX 0'; break;
			case 2: return 'TRX 1'; break;
			case 3: return 'TRX 2'; break;
			case 4: return 'TRX 3'; break;
			case 5: return 'TRX 4'; break;
			case 6: return 'TRX 5'; break;
			case 7: return 'TRX 6'; break;
			case 8: return 'TRX 7'; break;
			case 9: return 'TRX 8'; break;
			case 10: return 'TRX 9'; break;
			case 11: return 'TRX 10'; break;
			case 12: return 'TRX 11'; break;
		}
		break;
		
		case 11:
		switch($sub){
			case 11.1: return '11.1. Checking time slot occupation'; break;
		}
		break; 
		
		case 11.1:
		switch($sub){
			case 1: return 'Time slot occupation for each TRX'; break;
		}
		break;
		
		case 12:
		switch($sub){
			case 12.1: return '12.1. Check all Hardware Normal Status before BTS restart'; break;
			case 12.2: return '12.1. Check all Hardware Normal Status after BTS restart'; break;
		}
		break;
		
		case 13:
		switch($sub){
			case 13.1: return '13.1. From MS to MS (Matrix, Mentari & IM3)'; break;
			case 13.2: return '13.2. From MS to PSTN'; break;
			case 13.3: return '13.3. Send sms from MS to MS (Matrix, Mentari & IM3)'; break;
			case 13.4: return '13.4. HO test will be done before we leave the site'; break;
			case 13.5: return '13.5. GPRS functional test'; break;
			case 13.6: return '13.6. EDGE/EGPRS functionality test'; break;
		}
		break;
		
		case 13.1:
		switch($sub){
			case 1: return 'Number of Time Slot'; break;
			case 2: return 'Downlink'; break;
			case 3: return 'Uplink'; break;
		}
		break;
		
		case 13.2:
		switch($sub){
			case 1: return 'SECTOR 1 : MCC'; break;
			case 2: return 'SECTOR 1 : MNC'; break;
			case 3: return 'SECTOR 1 : LAC'; break;
			case 4: return 'SECTOR 1 : CELL ID'; break;
			case 5: return 'SECTOR 1 : ARFCN/BCCH'; break;
		}
		break;
		
		case 13.3:
		switch($sub){
			case 1: return 'PING'; break;
			case 2: return 'WAP'; break;
			case 3: return 'HTTP'; break;
			case 4: return 'FTP Downlink'; break;
			case 5: return 'FTP Uplink'; break;
			case 6: return 'Video Streaming'; break;
		}
		break;
		
		case 13.4:
		switch($sub){
			case 1: return 'SECTOR 2 : MCC'; break;
			case 2: return 'SECTOR 2 : MNC'; break;
			case 3: return 'SECTOR 2 : LAC'; break;
			case 4: return 'SECTOR 2 : CELL ID'; break;
			case 5: return 'SECTOR 2 : ARFCN/BCCH'; break;
		}
		break;
		
		case 13.5:
		switch($sub){
			case 1: return 'PING'; break;
			case 2: return 'WAP'; break;
			case 3: return 'HTTP'; break;
			case 4: return 'FTP Downlink'; break;
			case 5: return 'FTP Uplink'; break;
			case 6: return 'Video Streaming'; break;
		}
		break;
		
		case 13.6:
		switch($sub){
			case 1: return 'SECTOR 3 : MCC'; break;
			case 2: return 'SECTOR 3 : MNC'; break;
			case 3: return 'SECTOR 3 : LAC'; break;
			case 4: return 'SECTOR 3 : CELL ID'; break;
			case 5: return 'SECTOR 3 : ARFCN/BCCH'; break;
		}
		break;
		
		case 13.7:
		switch($sub){
			case 1: return 'PING'; break;
			case 2: return 'WAP'; break;
			case 3: return 'HTTP'; break;
			case 4: return 'FTP Downlink'; break;
			case 5: return 'FTP Uplink'; break;
			case 6: return 'Video Streaming'; break;
		}
		break;
		
		case 14:
		switch($sub){
			case 14.1: return '14.1. Site condition must be clean'; break;
			case 14.2: return '14.2. No damage at site environment'; break;
			case 14.3: return '14.3. All Infrastructures inside the BTS should have the same condition as previous'; break;
		}
		break;
		
		case 15:
		switch($sub){
			case 15.1: return '15.1. Tools/Equipment for Test'; break;
			case 15.2: return '15.2. Documentation Check'; break;
		}
		break;
		
		case 15.1:
		switch($sub){
			case 1: return '15.1.1. Network Analyzer'; break;
			case 2: return '15.1.2. Site Master'; break;
			case 3: return '15.1.3. Calibration kit'; break;
			case 4: return '15.1.4. Dummy load (DC-4 GHz)'; break;
			case 5: return '15.1.5. Short connector'; break;
			case 6: return '15.1.6. Flexible Cable'; break;
		}
		break;
		
		case 15.2:
		switch($sub){
			case 1: return '15.2.1. Technical room/Site documentation/lay out.'; break;
			case 2: return '15.2.2. Manufacture/Factory Test Result Antenna part from the pack.'; break;
			case 3: return '15.2.3. Specification equipment Antenna, Cable, Connector, Splitter, Coupler, arrester, filter, TMA etc.'; break;
			case 4: return '15.2.4. Inventory list (ref. BoQ)'; break;
			case 5: return '15.2.5. NDB Document'; break;
		}
		break;
		
		case 16:
		switch($sub){
			case 16.1: return 'Equipment Quantity check'; break;
			case 16.2: return 'Connector type'; break;
			case 16.3: return 'Antenna Table Connection'; break;
			case 16.4: return 'Coaxial Feeder'; break;
			case 16.5: return 'Top Jumper'; break;
			case 16.6: return 'Bottom Jumper'; break;
		}
		break;
		
		case 16.1:
		switch($sub){
			case 1: return '16.1.1. Antenna Polarization'; break;
			case 2: return '16.1.2. Band Frequency'; break;
			case 3: return '16.1.3. Number of sectors'; break;
			case 4: return '16.1.4. Type of Diversity'; break;
			case 5: return '16.1.5. Number of Installed Antenna'; break;
			case 6: return '16.1.6. Number of Installed Filter'; break;
			case 7: return '16.1.7. Number of EMP/Connector arrester'; break;
			case 8: return '16.1.8. Number of Duplexer'; break;
			case 9: return '16.1.9. Number of Diplexer Dual Band'; break;
			case 10: return '16.1.10. Number of Splitter Two Way'; break;
			case 11: return '16.1.11. Number of Splitter Three Way'; break;
			case 12: return '16.1.12. Number of Splitter Four Way'; break;
			case 13: return '16.1.13. Number of Taper'; break;
			case 14: return '16.1.14. Number of Hybrid Coupler'; break;
			case 15: return '16.1.15. Number of TMA'; break;
		}
		break;
		
		case '16.1.5':
		switch($sub){
			case 1: return '16.1.5.1. New Antenna'; break;
			case 2: return '16.1.5.2. Old Antenna'; break;
		}
		break;
		
		case '16.1.6':
		switch($sub){
			case 1: return '16.1.6.1. New Filter'; break;
			case 2: return '16.1.6.2. Old Filter'; break;
		}
		break;
		
		case '16.1.7':
		switch($sub){
			case 1: return '16.1.7.1. New EMP/Connecter arrester'; break;
			case 2: return '16.1.7.2. Old EMP/Connecter arrester'; break;
		}
		break;
		
		case '16.1.8':
		switch($sub){
			case 1: return '16.1.8.1. New Duplexer'; break;
			case 2: return '16.1.8.2. Old Duplexer'; break;
		}
		break;
		
		case '16.1.9':
		switch($sub){
			case 1: return '16.1.9.1. New Diplexer Dual Band'; break;
			case 2: return '16.1.9.2. Old Diplexer Dual Band'; break;
		}
		break;
		
		case '16.1.10':
		switch($sub){
			case 1: return '16.1.10.1. New Splitter Two Way'; break;
			case 2: return '16.1.10.2. Old Splitter Two Way'; break;
		}
		break;
		
		case '16.1.11':
		switch($sub){
			case 1: return '16.1.11.1. New Splitter Three Way'; break;
			case 2: return '16.1.11.2. Old Splitter Three Way'; break;
		}
		break;
		
		case '16.1.12':
		switch($sub){
			case 1: return '16.1.12.1. New Splitter Four Way'; break;
			case 2: return '16.1.12.2. Old Splitter Four Way'; break;
		}
		break;
		
		case '16.1.13':
		switch($sub){
			case 1: return '16.1.13.1. New Taper'; break;
			case 2: return '16.1.13.2. Old Taper'; break;
		}
		break;
		
		case '16.1.14':
		switch($sub){
			case 1: return '16.1.14.1. New Hybrid Coupler'; break;
			case 2: return '16.1.14.2. Old Hybrid Coupler'; break;
		}
		break;
		
		case '16.1.15':
		switch($sub){
			case 1: return '16.1.15.1. New TMA'; break;
			case 2: return '16.1.15.1. Old TMA'; break;
		}
		break;
		
		case 16.2:
		switch($sub){
			case 1: return '16.2.1. 1/2 " N Male'; break;
			case 2: return '16.2.2. 1/2 " N Female'; break;
			case 3: return '16.2.3. 7/16 " DIN Male'; break;
			case 4: return '16.2.4. 7/16 " DIN Female'; break;
			case 5: return '16.2.5. 7/8 " Male'; break;
			case 6: return '16.2.6. 7/8 " Female'; break;
			case 7: return '16.2.7. 1 1/4 " Male'; break;
			case 8: return '16.2.8. 1 1/4 " Female'; break;
			case 9: return '16.2.9. 1 5/8 " Male'; break;
			case 10: return '16.2.10. 1 5/8 " Female'; break;
		}
		break;
		
		case 16.3:
		switch($sub){
			case 1: return '16.3.1. Sector 1 TRX'; break;
			case 2: return '16.3.2. Sector 1 RXD'; break;
			case 3: return '16.3.3. Sector 2 TRX'; break;
			case 4: return '16.3.4. Sector 2 RXD'; break;
			case 5: return '16.3.5. Sector 3 TRX'; break;
			case 6: return '16.3.6. Sector 3 RXD'; break;
			case 7: return '16.3. '; break;
			case 8: return '16.3. '; break;
		}
		break;
		
		case 16.4:
		switch($sub){
			case 1: return '16.4.1. Sector 1 TRX'; break;
			case 2: return '16.4.2. Sector 1 RXD'; break;
			case 3: return '16.4.3. Sector 2 TRX'; break;
			case 4: return '16.4.4. Sector 2 RXD'; break;
			case 5: return '16.4.5. Sector 3 TRX'; break;
			case 6: return '16.4.6. Sector 3 RXD'; break;
			case 7: return '16.4. '; break;
			case 8: return '16.4. '; break;
		}
		break;
		
		case 16.5:
		switch($sub){
			case 1: return '16.5.1. Sector 1 TRX'; break;
			case 2: return '16.5.2. Sector 1 RXD'; break;
			case 3: return '16.5.3. Sector 2 TRX'; break;
			case 4: return '16.5.4. Sector 2 RXD'; break;
			case 5: return '16.5.5. Sector 3 TRX'; break;
			case 6: return '16.5.6. Sector 3 RXD'; break;
			case 7: return '16.5. '; break;
			case 8: return '16.5. '; break;
		}
		break;
		
		case 16.6:
		switch($sub){
			case 1: return '16.6.1. Sector 1 TRX'; break;
			case 2: return '16.6.2. Sector 1 RXD'; break;
			case 3: return '16.6.3. Sector 2 TRX'; break;
			case 4: return '16.6.4. Sector 2 RXD'; break;
			case 5: return '16.6.5. Sector 3 TRX'; break;
			case 6: return '16.6.6. Sector 3 RXD'; break;
			case 7: return '16.6. '; break;
			case 8: return '16.6. '; break;
		}
		break;
		
		case 17:
		switch($sub){
			case 17.1: return '17.1. Installation/Execution for Antenna Outdoor'; break;
			case 17.2: return '17.2. Antenna System and Other Component Labelling'; break;
			case 17.3: return '17.3. Orientation of Antenna'; break;
			case 17.4: return '17.4. Position of Antenna'; break;
		}
		break;
		
		case 17.1:
		switch($sub){
			case 1: return '17.1.1. Maintenance aspect (easy to maintain)'; break;
			case 2: return '17.1.2. Antenna mounting'; break;
			case 3: return '17.1.3. Arm construction'; break;
			case 4: return '17.1.4. Pylon construction'; break;
			case 5: return '17.1.5. Arm length'; break;
			case 6: return '17.1.6. Feeder Placement'; break;
			case 7: return '17.1.7. Feeder bending if'; break;
			case 8: return '17.1.8. Feeder Connector Installation'; break;
			case 9: return '17.1.9. Feeder Clamp Installation'; break;
			case 10: return '17.1.10. Water Leakage'; break;
			case 11: return '17.1.11. Connection cable feeder correct and tightened'; break;
			case 12: return '17.1.12. Indoor Cable Tray Installation'; break;
			case 13: return '17.1.13. Feeder hole/Wall gland Installation'; break;
			case 14: return '17.1.14. Lightning Protection'; break;
			case 15: return '17.1.15. Grounding Kit'; break;
			case 16: return '17.1.16. Grounding Bar on Bending'; break;
			case 17: return '17.1.17. Grounding Bar at entering room feeder'; break;
			case 20: return '17.1.20. Grounding feeder shouldnt be connected to tower'; break;
			case 21: return '17.1.21. TVSS availability'; break;
			case 22: return '17.1.22. TVSS installation & connection'; break;
		}
		break;
		
		case 17.2:
		switch($sub){
			case 1: return '17.2.1. Jumper label'; break;
			case 2: return '17.2.2. Feeder label'; break;
			case 3: return '17.2.3. Antenna label'; break;
			case 4: return '17.2.4. Splitter label'; break;
			case 5: return '17.2.5. Diplexer label'; break;
			case 6: return '17.2.6. Others label'; break;
		}
		break;
		
		case 17.3:
		switch($sub){
			case 1: return '17.3.1.'; break;
			case 2: return '17.3.2.'; break;
			case 3: return '17.3.3.'; break;
			case 4: return '17.3.4.'; break;
			case 5: return '17.3.5.'; break;
			case 6: return '17.3.6.'; break;
			case 7: return '17.3.7.'; break;
			case 8: return '17.3.8.'; break;
		}
		break;
		
		case 17.4:
		switch($sub){
			case 1: return '17.4.1. Placement'; break;
			case 2: return '17.4.2. Possibility of blocking'; break;
			case 3: return '17.4.3. Distance from other if single polar with Diversity'; break;
		}
		break;				
		
		case 18:
		switch($sub){
			case '18.1': return '18.1. All measurement result'; break;
			case '18.2': return '18.2. Distance to Fault with Precision Load'; break;
			case '18.3': return '18.3. Cable Loss Measurement'; break;
			case '18.3': return '18.3. VSWR Measurement'; break;
		}
		break;
		
		case 18.1:
		switch($sub){
			case 1: return '18.1.1.'; break;
			case 2: return '18.1.2.'; break;
			case 3: return '18.1.3.'; break;
			case 4: return '18.1.4.'; break;
			case 5: return '18.1.5.'; break;
			case 6: return '18.1.6.'; break;
			case 7: return '18.1.'; break;
			case 8: return '18.1.'; break;
		}
		break;
		
		case '18.2.1':
		switch($sub){
			case 1: return '18.2.1.1. Sector 1 TRX'; break;
			case 2: return '18.2.1.2. Sector 1 RXD'; break;
			case 3: return '18.2.1.3. Sector 2 TRX'; break;
			case 4: return '18.2.1.4. Sector 2 RXD'; break;
			case 5: return '18.2.1.5. Sector 3 TRX'; break;
			case 6: return '18.2.1.6. Sector 3 RXD'; break;
		}
		break;
		
		case '18.2.2':
		switch($sub){
			case 1: return '18.2.2.1. Sector 1 TRX'; break;
			case 2: return '18.2.2.2. Sector 1 RXD'; break;
			case 3: return '18.2.2.3. Sector 2 TRX'; break;
			case 4: return '18.2.2.4. Sector 2 RXD'; break;
			case 5: return '18.2.2.5. Sector 3 TRX'; break;
			case 6: return '18.2.2.6. Sector 3 RXD'; break;
			case 7: return '18.2.2.7. Sector 1 TRX'; break;
			case 8: return '18.2.2.8. Sector 1 RXD'; break;
		}
		break;
		
		case '18.2.3':
		switch($sub){
			case 1: return '18.2.3.1. Sector 1 TRX'; break;
			case 2: return '18.2.3.2. Sector 1 RXD'; break;
			case 3: return '18.2.3.3. Sector 2 TRX'; break;
			case 4: return '18.2.3.4. Sector 2 RXD'; break;
			case 5: return '18.2.3.5. Sector 3 TRX'; break;
			case 6: return '18.2.3.6. Sector 3 RXD'; break;
			case 7: return '18.2.3.7. Sector 1 TRX'; break;
			case 8: return '18.2.3.8. Sector 1 RXD'; break;
		}
		break;
		
		case '18.3.1':
		switch($sub){
			case 1: return '18.3.1.1. Sector 1 TRX'; break;
			case 2: return '18.3.1.2. Sector 1 RXD'; break;
			case 3: return '18.3.1.3. Sector 2 TRX'; break;
			case 4: return '18.3.1.4. Sector 2 RXD'; break;
			case 5: return '18.3.1.5. Sector 3 TRX'; break;
			case 6: return '18.3.1.6. Sector 3 RXD'; break;
			case 7: return '18.3.1.7. Sector 1 TRX'; break;
			case 8: return '18.3.1.8. Sector 1 RXD'; break;
		}
		break;
		
		case '18.3.2':
		switch($sub){
			case 1: return '18.3.2.1. Sector 1 TRX'; break;
			case 2: return '18.3.2.2. Sector 1 RXD'; break;
			case 3: return '18.3.2.3. Sector 2 TRX'; break;
			case 4: return '18.3.2.4. Sector 2 RXD'; break;
			case 5: return '18.3.2.5. Sector 3 TRX'; break;
			case 6: return '18.3.2.6. Sector 3 RXD'; break;
			case 7: return '18.3.2.7. Sector 1 TRX'; break;
			case 8: return '18.3.2.8. Sector 1 RXD'; break;
		}
		break;
		
		case 18.4:
		switch($sub){
			case 1: return '18.4.1. Sector 1 TRX'; break;
			case 2: return '18.4.2. Sector 1 RXD'; break;
			case 3: return '18.4.3. Sector 2 TRX'; break;
			case 4: return '18.4.4. Sector 2 RXD'; break;
			case 5: return '18.4.5. Sector 3 TRX'; break;
			case 6: return '18.4.6. Sector 3 RXD'; break;
			case 7: return '18.4.7. Sector 1 TRX'; break;
			case 8: return '18.4.8. Sector 1 RXD'; break;
		}
		break;
		
		case 19:
		switch($sub){
			case '19.1': return '19.1. Filter CDMA 800 Rejection measurement'; break;
			case '19.2': return '19.2. Tower Mounted Amplifier (TMA) Measurement'; break;
			case '19.3': return '19.3. Arrester Measurement'; break;
		}
		break;
		
		case '19.1.1':
		switch($sub){
			case 1: return '19.1.1.1. Sector 1 TRX'; break;
			case 2: return '19.1.1.2. Sector 1 RXD'; break;
			case 3: return '19.1.1.3. Sector 2 TRX'; break;
			case 4: return '19.1.1.4. Sector 2 RXD'; break;
			case 5: return '19.1.1.5. Sector 3 TRX'; break;
			case 6: return '19.1.1.6. Sector 3 RXD'; break;
			case 7: return '19.1.1.7. Sector 1 TRX'; break;
			case 8: return '19.1.1.8. Sector 1 RXD'; break;
		}
		break;
		
		case '19.1.2':
		switch($sub){
			case 1: return '19.1.2.1. Sector 1 TRX'; break;
			case 2: return '19.1.2.2. Sector 1 RXD'; break;
			case 3: return '19.1.2.3. Sector 2 TRX'; break;
			case 4: return '19.1.2.4. Sector 2 RXD'; break;
			case 5: return '19.1.2.5. Sector 3 TRX'; break;
			case 6: return '19.1.2.6. Sector 3 RXD'; break;
			case 7: return '19.1.2.7. Sector 1 TRX'; break;
			case 8: return '19.1.2.8. Sector 1 RXD'; break;
		}
		break;
		
		case '19.1.3':
		switch($sub){
			case 1: return '19.1.3.1. Sector 1 TRX'; break;
			case 2: return '19.1.3.2. Sector 1 RXD'; break;
			case 3: return '19.1.3.3. Sector 2 TRX'; break;
			case 4: return '19.1.3.4. Sector 2 RXD'; break;
			case 5: return '19.1.3.5. Sector 3 TRX'; break;
			case 6: return '19.1.3.6. Sector 3 RXD'; break;
			case 7: return '19.1.3.7. Sector 1 TRX'; break;
			case 8: return '19.1.3.8. Sector 1 RXD'; break;
		}
		break;
		
		case '19.2.1':
		switch($sub){
			case 1: return '19.2.1.1. Sector 1 TRX'; break;
			case 2: return '19.2.1.2. Sector 1 RXD'; break;
			case 3: return '19.2.1.3. Sector 2 TRX'; break;
			case 4: return '19.2.1.4. Sector 2 RXD'; break;
			case 5: return '19.2.1.5. Sector 3 TRX'; break;
			case 6: return '19.2.1.6. Sector 3 RXD'; break;
		}
		break;
		
		case '19.2.2':
		switch($sub){
			case 1: return '19.2.2.1. Sector 1 TRX'; break;
			case 2: return '19.2.2.2. Sector 1 RXD'; break;
			case 3: return '19.2.2.3. Sector 2 TRX'; break;
			case 4: return '19.2.2.4. Sector 2 RXD'; break;
			case 5: return '19.2.2.5. Sector 3 TRX'; break;
			case 6: return '19.2.2.6. Sector 3 RXD'; break;
		}
		break;
		
		case '19.2.3':
		switch($sub){
			case 1: return '19.2.3.1. Sector 1 TRX'; break;
			case 2: return '19.2.3.2. Sector 1 RXD'; break;
			case 3: return '19.2.3.3. Sector 2 TRX'; break;
			case 4: return '19.2.3.4. Sector 2 RXD'; break;
			case 5: return '19.2.3.5. Sector 3 TRX'; break;
			case 6: return '19.2.3.6. Sector 3 RXD'; break;
		}
		break;
		
		case '19.2.4':
		switch($sub){
			case 1: return '19.2.4.1. Sector 1 TRX'; break;
			case 2: return '19.2.4.2. Sector 1 RXD'; break;
			case 3: return '19.2.4.3. Sector 2 TRX'; break;
			case 4: return '19.2.4.4. Sector 2 RXD'; break;
			case 5: return '19.2.4.5. Sector 3 TRX'; break;
			case 6: return '19.2.4.6. Sector 3 RXD'; break;
		}
		break;
		
		case '19.2.5':
		switch($sub){
			case 1: return '19.2.5.1. Sector 1 TRX'; break;
			case 2: return '19.2.5.2. Sector 1 RXD'; break;
			case 3: return '19.2.5.3. Sector 2 TRX'; break;
			case 4: return '19.2.5.4. Sector 2 RXD'; break;
			case 5: return '19.2.5.5. Sector 3 TRX'; break;
			case 6: return '19.2.5.6. Sector 3 RXD'; break;
			case 7: return '19.2.5.7. Sector 1 TRX'; break;
			case 8: return '19.2.5.8. Sector 1 RXD'; break;
		}
		break;
		
		case '19.2.6':
		switch($sub){
			case 1: return '19.2.6.1. Sector 1 TRX'; break;
			case 2: return '19.2.6.2. Sector 1 RXD'; break;
			case 3: return '19.2.6.3. Sector 2 TRX'; break;
			case 4: return '19.2.6.4. Sector 2 RXD'; break;
			case 5: return '19.2.6.5. Sector 3 TRX'; break;
			case 6: return '19.2.6.6. Sector 3 RXD'; break;
			case 7: return '19.2.6.7. Sector 1 TRX'; break;
			case 8: return '19.2.6.8. Sector 1 RXD'; break;
		}
		break;
		

		case '19.3.1':
		switch($sub){
			case 1: return '19.3.1.1. Sector 1 TRX'; break;
			case 2: return '19.3.1.2. Sector 1 RXD'; break;
			case 3: return '19.3.1.3. Sector 2 TRX'; break;
			case 4: return '19.3.1.4. Sector 2 RXD'; break;
			case 5: return '19.3.1.5. Sector 3 TRX'; break;
			case 6: return '19.3.1.6. Sector 3 RXD'; break;
			case 7: return '19.3.1.7. Sector 1 TRX'; break;
			case 8: return '19.3.1.8. Sector 1 RXD'; break;
		}
		break;
		
		case '19.3.2':
		switch($sub){
			case 1: return '19.3.2.1. Sector 1 TRX'; break;
			case 2: return '19.3.2.2. Sector 1 RXD'; break;
			case 3: return '19.3.2.3. Sector 2 TRX'; break;
			case 4: return '19.3.2.4. Sector 2 RXD'; break;
			case 5: return '19.3.2.5. Sector 3 TRX'; break;
			case 6: return '19.3.2.6. Sector 3 RXD'; break;
			case 7: return '19.3.2.7. Sector 1 TRX'; break;
			case 8: return '19.3.2.8. Sector 1 RXD'; break;
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