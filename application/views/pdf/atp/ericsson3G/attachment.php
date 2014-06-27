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
		case '1.5': return 'Link Transmission Preparation already done'; break;
		case '1.6': return 'Before starting (on arrival at the site)'; break;
		case '1.6.1': return 'Check engineer\'s certificate of competency level'; break;
		case '1.6.2': return 'Check tools and equipment'; break;
		case '1.6.3': return 'For swap out cases, dummy load must be available'; break;
		case '1.6.4': return 'Document MOP and ATP must be available'; break;
		case '2': return 'Checking HW configuration visually'; break;
		case '3': return 'Checking on labelling'; break;
		case '3.1': return 'Check label module (serial number, technical status)'; break;
		case '3.2': return 'Check RBS rack label'; break;
		case '3.3': return 'Check DDF Transmission label (end site)'; break;
		case '3.4': return 'Check power supply label'; break;
		case '3.5': return 'Check feeder cable label (for antenna sector)'; break;
		case '3.6': return 'Check Antenna label'; break;
		case '3.7': return 'Check DDF External Alarm Label'; break;
		case '4': return 'Checking grounding integration'; break;
		case '5': return 'Powers Measurement '; break;
		case '5.1': return 'Measurement AC Power Line (L1/L2/L3)'; break;
		case '5.2': return 'Measurement RBS Input Power / Cabinet Voltage'; break;
		case '5.3': return 'Measurement AC Power Input PSU RBS'; break;
		case '5.4': return 'Measurement DC Power Output PSU RBS'; break;
		case '5.5': return 'Checking RBS Panel Circuit Breaker (AC / DC)'; break;
		case '6': return 'RBS, RNC and RANAG Setting Parameter'; break;
		case '6.1': return 'RBS, RNC and RANAG Information Database'; break;
		case '6.2': return 'RBS Cell Parameter'; break;
		case '6.3': return 'VCI Allocation on VPC Terminating in End RBS'; break;
		case '6.4': return 'IP Transport Configuration'; break;
		case '6.5': return 'Mub-c configuration'; break;
		case '6.6': return 'Channel Element Capacity'; break;
		case '6.7': return 'RBS License Feature'; break;
		case '6.8': return 'Qos Configuration Settings'; break;
		case '6.9': return 'Verify RBS IMA Adaptation Parameter'; break;
		case '7': return 'RBS Local Cell (On line Test)'; break;
		case '7.1': return 'Check RBS Local Cell-1'; break;
		case '7.2': return 'Check RBS Local Cell-2'; break;
		case '7.3': return 'Check RBS Local Cell-3'; break;
		case '7.4': return 'Check RBS Local Cell-4'; break;
		case '7.5': return 'Check RBS Local Cell-5'; break;
		case '7.6': return 'Check RBS Local Cell-6'; break;
		case '7.7': return 'Check Carrier for HSDPA and HSUPA'; break;
		case '8': return 'Verify IP over ATM'; break;
		case '8.1': return 'IP over ATM'; break;
		case '8.2': return 'Verify RBS Restart (Software Version)'; break;
		case '8.3': return 'Verify LED STATUS'; break;
		case '8.4': return 'Verify LED STATUS (RBS already integrated to the system)'; break;
		case '9': return 'Antenna System Preliminary checks'; break;
		case '9.1': return 'Tools/Equipment for Test'; break;
		case '9.2': return 'Documentation check must be available'; break;
		case '10': return 'Antenna System Inventory Check'; break;
		case '10.1': return 'Equipment quantity Check'; break;
		case '10.2': return 'Connector Type'; break;
		case '10.3': return 'Antenna Table'; break;
		case '10.4': return 'Antenna System Control (ASC)'; break;
		case '10.5': return 'Remote Electrical Tilt (RET)'; break;
		case '10.6': return 'Feeder Cable'; break;
		case '10.7': return 'Top Jumper (from feeder to ASC)'; break;
		case '10.8': return 'Top Jumper (from ASC/RRU to Antenna)'; break;
		case '10.9': return 'Bottom Jumper'; break;
		case '10.10': return 'Optical Cable'; break;
		case '11': return 'Installation and construction'; break;
		case '11.1': return 'Installation antenna system'; break;
		case '12': return 'Orientation and Position Antenna'; break;
		case '12.1': return 'Orientation outdoor antenna'; break;
		case '12.2': return 'Position outdoor antenna'; break;
		case '13': return 'Distance to fault use dummy load'; break;
		case '13.1': return 'Refer to Guideline Installation'; break;
		case '14': return 'Antenna System Measurement & Setting'; break;
		case '14.1': return 'VSWR Measurement without ASC / Filter'; break;
		case '14.2': return 'VSWR Measurement with ASC / Filter'; break;
		case '14.3': return 'VSWR Measurement for RBS 3412 / 3418 / 3518'; break;
		case '14.4': return 'Antenna System Supervision Threshold Setting'; break;
		case '15': return 'Checking Downloading software (script) status'; break;
		case '15.1': return 'Downloading Software (script) Status'; break;
		case '16': return 'Checking Hardware Technical Status and Configuration'; break;
		case '16.1': return 'Hardware Technical Status & Configuration '; break;
		case '17': return 'Checking status & functionality of RBS Internal & External Alarm'; break;
		case '17.1': return 'Checking status & Functionality of RBS Internal Alarm by doing simulation test on RBS'; break;
		case '17.2': return 'Checking status & functionality External alarms by doing simulation test on transducer/sensor'; break;
		case '18': return 'Mobile Originating & Terminating Test Call'; break;
		case '18.1': return 'Iub Transport Option'; break;
		case '18.2': return 'Voice Test Call'; break;
		case '18.3': return 'Video Test Call'; break;
		case '18.4': return 'Packet switch Test Call'; break;
		case '18.5': return 'HSPA Test Call'; break;
		case '18.6': return 'Test Actual and PMR Capture Result'; break;
		case '18.7': return 'SMS Test Call'; break;
		case '18.8': return 'MMS Test Call'; break;
		case '18.9': return 'Incoming & Outgoing Hand Over Test'; break;
		case '18.10': return 'Emergency Call (118, 112)'; break;
		case '18.11': return 'IMA Bandwidth Adaptation Test'; break;
		case '18.12': return 'Sync Test for Dual Stack and Native IP configuratio'; break;
		case '18.13': return 'OAM Link ATM & IP Connectivity to OSS Test'; break;
		case '18.14': return 'IMA Bandwidth Adaptation Functionality Test'; break;
		case '19': return 'Battery Backup System (BBS) Test'; break;
		case '19.1': return 'BBS Type identification'; break;
		case '19.2': return 'BBS Material and Installation check List'; break;
		case '19.3': return 'BBS Testing'; break;
		case '19.4': return 'BBS Labelling'; break;
		case '20': return 'Checking Site Condition (Cleanliness Check)'; break;
		case '20.1': return 'Site condition must be clean'; break;
		case '20.2': return 'No damage at site environment'; break;
		case '20.3': return 'All Infrastructures inside the RBS must have the same condition as previous'; break;
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
			case '1.5': return '1.5. Link Transmission Preparation already done'; break;
			case '1.6': return '1.6. Before starting (on arrival at the site)'; break;
			case '1.6.1': return '1.6.1. Check engineer\'s certificate of competency level'; break;
			case '1.6.2': return '1.6.2. Check tools and equipment'; break;
			case '1.6.3': return '1.6.3. For swap out cases, dummy load must be available'; break;
			case '1.6.4': return '1.6.4. Document MOP and ATP must be available'; break;
		}
		break;
		
		case 2:
		switch($sub){
			case 2.1: return '2.1. Compare with equipment order list attachment which is  based on  Site Documentation, NDB/CDD or Planning recommendation'; break;
		}
		break;
		
		case 3:
		switch($sub){
			case 3.1: return '3.1. Check label module (serial number, technical status)'; break;
			case 3.2: return '3.2. Check RBS rack label'; break;
			case 3.3: return '3.3. Check DDF Transmission label (end site)'; break;
			case 3.4: return '3.4. Check power supply label'; break;
			case 3.5: return '3.5. Check feeder cable label (for antenna sector)'; break;
			case 3.6: return '3.6. Check Antenna label'; break;
			case 3.7: return '3.7. Check DDF External Alarm Label'; break;
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
			case 5.4: return '5.4. Measurement DC Power Output PSU RBS'; break;
			case 5.5: return '5.5. Checking RBS Panel Circuit Breaker (AC / DC)'; break;
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
			case 1: return 'Input Voltage PSU 1'; break;
			case 2: return 'Input Voltage PSU 2'; break;
			case 3: return 'Input Voltage PSU 3'; break;
			case 4: return 'Input Voltage PSU 4'; break;
		}
		break;
		
		case 5.4:
		switch($sub){
			case 1: return 'Output Voltage PSU 1'; break;
			case 2: return 'Output Voltage PSU 2'; break;
			case 3: return 'Output Voltage PSU 3'; break;
			case 4: return 'Output Voltage PSU 4'; break;
		}
		break;
		
		case 5.5:
		switch($sub){
			case 1: return 'AC Circuit Breaker'; break;
			case 2: return 'DC Circuit Breaker'; break;
			case 3: return 'Main Circuit Breaker'; break;
			case 4: return 'Battery Circuit Breaker'; break;
		}
		break;
		
		case 6:
		switch($sub){
			case 6.1: return '6.1. RBS, RNC and RANAG Information Database'; break;
			case 6.2: return '6.2. RBS Cell Parameter'; break;
			case 6.3: return '6.3. VCI Allocation on VPC Terminating in End RBS'; break;
			case 6.4: return '6.4. IP Transport Configuration'; break;
			case 6.5: return '6.5. Mub-c configuration'; break;
			case 6.6: return '6.6. Channel Element Capacity'; break;
			case 6.7: return '6.7. RBS License Feature'; break;
			case 6.8: return '6.8. Qos Configuration Settings'; break;
			case 6.9: return '6.9. Verify RBS IMA Adaptation Parameter'; break;
		}
		break;
		
		case 6.1:
		switch($sub){
			case 1: return 'Node Name'; break;
			case 2: return 'Aal2Sp'; break;
			case 3: return 'PLMN ID'; break;
			case 4: return 'Routing Area Code'; break;
			case 5: return 'Location Area Code'; break;
			case 6: return 'Service Area Code'; break;
			case 7: return 'O&M Link (IP Address)'; break;
			case 8: return 'ET-Board Port'; break;
			case 9: return 'VPI / VCI'; break;
			case 10: return 'Transmission Capacity'; break;
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
		
		case 6.3:
		switch($sub){
			case 1: return 'Active'; break;
			case 2: return 'Standby'; break;
		}
		break;
		
		case 6.4:
		switch($sub){
			case 1: return 'User Plane'; break;
			case 2: return 'Control Plane'; break;
			case 3: return 'IP Sync Ref 1'; break;
			case 4: return 'IP Sync Ref 2'; break;
			case 5: return 'Default Router'; break;
		}
		break;
		
		case 6.5:
		switch($sub){
			case 1: return 'nextHopIpAddr (Mub-a)'; break;
			case 2: return 'nextHopIpAddr (Mub-b)'; break;
			case 3: return 'nextHopIpAddr (Mub-c)'; break;
		}
		break;
		
		case 6.6:
		switch($sub){
			case 1: return 'Downlink'; break;
			case 2: return 'Uplink'; break;
		}
		break;
		
		case 6.7:
		switch($sub){
			case 1: return 'HSDPA CODES PER CELL'; break;
			case 2: return 'DYNHSPDSCHCODEALLOCATION'; break;
			case 3: return 'FLEXIBLESCHEDULER'; break;
			case 4: return 'ENHANCEDUPLINK'; break;
			case 5: return 'FEATURE DUAL STACK IUB'; break;
			case 6: return 'CAPACITY POWER AMPLIFIER'; break;
			case 7: return 'CAPACITY NUMBER of CARRIER'; break;
		}
		break;
		
		case 6.8:
		switch($sub){
			case 1: return 'Synchronisation'; break;
			case 2: return 'Network Control'; break;
			case 3: return 'Radio Network Control'; break;
			case 4: return 'Synch in P6'; break;
			case 5: return 'Conversational'; break;
			case 6: return 'Signaling'; break;
			case 7: return 'CS Streaming'; break;
			case 8: return 'PS Streaming (MBMS*)'; break;
			case 9: return 'PS Streaming (HS Streaming)'; break;
			case 10: return 'PS Streaming (R99 Streaming)'; break;
			case 11: return 'Signaling'; break;
			case 12: return 'HS Interactive High Priority'; break;
			case 13: return 'R99 Inter High Priority'; break;
			case 14: return 'O&M Interactive'; break;
			case 15: return 'HS Interactive Med Priority'; break;
			case 16: return 'R99 Inter High Priority'; break;
			case 17: return 'HS Interactive Low Priority'; break;
			case 18: return 'R99 Interactive Low Priority'; break;
			case 19: return 'HS Background'; break;
			case 20: return 'R99 Background'; break;
		}
		break;
		
		case 6.9:
		switch($sub){
			case 1: return 'E1 Status (Enable/Disable/NA)'; break;
			case 2: return 'IMA link Status (Enable/Disable/NA)'; break;
			case 3: return 'Available E1'; break;
			case 4: return 'activeLinks'; break;
			case 5: return 'atmTrafficDescriptor (8 E1( vp1=U3P35200M8800,Pcr=35200,Mcr=8800))'; break;
			case 6: return 'atmTrafficDescriptor (4 E1( vp1=U3P17600M8800,Pcr=17600,Mcr=8800))'; break;
			case 7: return 'requiredNumberOfLink'; break;
		}
		break;
		
		case 7:
		switch($sub){
			case 7.1: return '7.1. Check RBS Local Cell-1'; break;
			case 7.2: return '7.2. Check RBS Local Cell-2'; break;
			case 7.3: return '7.3. Check RBS Local Cell-3'; break;
			case 7.4: return '7.4. Check RBS Local Cell-4'; break;
			case 7.5: return '7.5. Check RBS Local Cell-5'; break;
			case 7.6: return '7.6. Check RBS Local Cell-6'; break;
			case 7.7: return '7.7. Check Carrier for HSDPA and HSUPA'; break;
		}
		break;
		
		case 8:
		switch($sub){
			case 8.1: return '8.1. IP over ATM'; break;
			case 8.2: return '8.2. Verify RBS Restart (Software Version)'; break;
			case 8.3: return '8.3. Verify LED STATUS'; break;
			case 8.4: return '8.4. Verify LED STATUS (RBS already integrated to the system)'; break;
		}
		break;
		
		case 8.4:
		switch($sub){
			case 1: return 'SCB'; break;
			case 2: return 'ETB/ETMC1/ETMFX'; break;
			case 3: return 'TUB'; break;
			case 4: return 'HSDPA'; break;
			case 5: return 'BBIFB'; break;
			case 6: return 'RAX 32/64/128'; break;
			case 7: return 'GPB'; break;
			case 8: return 'HS-TX 15/45/60'; break;
			case 9: return 'RFIFB'; break;
			case 10: return 'TRX sec 1'; break;
			case 11: return 'TRX sec 2'; break;
			case 12: return 'TRX sec 3'; break;
			case 13: return 'MCPA sec 1'; break;
			case 14: return 'MCPA sec 2'; break;
			case 15: return 'MCPA sec 3 '; break;
			case 16: return 'MCPA Fan'; break;
			case 17: return 'Fan Unit 1'; break;
			case 18: return 'Fan Unit 2'; break;
			case 19: return 'Fan Unit 3'; break;
			case 20: return 'PCU '; break;
			case 21: return 'BFU34'; break;
			case 22: return 'ACCU '; break;
			case 23: return 'XALM (EACU) '; break;
			case 24: return 'CBU '; break;
			case 25: return 'RUIF'; break;
			case 26: return 'CLU (climate Unit)'; break;
			case 27: return 'BB Sub Rack Fan '; break;
			case 28: return 'RF Sub Rack Fan'; break;
			case 29: return 'AIU sec 1'; break;
			case 30: return 'AIU sec 2'; break;
			case 31: return 'AIU sec 3'; break;
			case 32: return 'FU (filter unit)1'; break;
			case 33: return 'FU (filter unit)2'; break;
			case 34: return 'FU (filter unit)3'; break;
			case 35: return 'FU (filter unit)4'; break;
			case 36: return 'FU (filter unit)5'; break;
			case 37: return 'FU (filter unit)6'; break;
			case 38: return 'RU21 20/40/60 sec 1'; break;
			case 39: return 'RU21 20/40/60 sec 2'; break;
			case 40: return 'RU21 20/40/60 sec 3'; break;
			case 41: return 'RU21 20/40/60 sec 4 '; break;
			case 42: return 'RU21 20/40/60 sec 5'; break;
			case 43: return 'RU21 20/40/60 sec 6'; break;
			case 44: return 'PSU 1'; break;
			case 45: return 'PSU 2'; break;
			case 46: return 'PSU 3'; break;
			case 47: return 'PSU 4'; break;
			case 48: return 'OBIF'; break;
			case 49: return 'RRU 10/20/40 sec 1'; break;
			case 50: return 'RRU 10/20/40 sec 2'; break;
			case 51: return 'RRU 10/20/40 sec 3'; break;
			case 52: return 'RRU 10/20/40 sec 4'; break;
			case 53: return 'RRU 10/20/40 sec 5'; break;
			case 54: return 'RRU 10/20/40 sec 6'; break;
			case 55: return 'DUW'; break;
			case 56: return 'DUG'; break;
			case 57: return 'RUW 20/40/60 sec 1'; break;
			case 58: return 'RUW 20/40/60 sec 2'; break;
			case 59: return 'RUW 20/40/60 sec 3'; break;
			case 60: return 'RUW 20/40/60 sec 4'; break;
			case 61: return 'RUW 20/40/60 sec 5'; break;
			case 62: return 'RUW 20/40/60 sec 6'; break;
			case 63: return 'RRUW 10/20/40 sec 1'; break;
			case 64: return 'RRUW 10/20/40 sec 2'; break;
			case 65: return 'RRUW 10/20/40 sec 3'; break;
			case 66: return 'RRUW 10/20/40 sec 4'; break;
			case 67: return 'RRUW 10/20/40 sec 5'; break;
			case 68: return 'RRUW 10/20/40 sec 6'; break;
			case 69: return 'SCU'; break;
			case 70: return 'SAU'; break;
		}
		break;
		
		case 9:
		switch($sub){
			case 9.1: return '9.1. Tools/Equipment for Test'; break;
			case 9.2: return '9.2. Documentation check must be available'; break;
		}
		break;
		
		case 9.1:
		switch($sub){
			case 1: return 'FDR  Equipment (Site Master, Cell Master, Site Analyzer, etc)'; break;
			case 2: return 'Calibration kit'; break;
			case 3: return 'Dummy load DC -  4 GHz / 50 Ohm'; break;
			case 4: return 'Short connector'; break;
			case 5: return 'Flexible Cable'; break;
			case 6: return 'Multi Meter'; break;
			case 7: return 'TEMS'; break;
			case 8: return 'Element Manager (OMT / Terminal+Software)'; break;
			case 9: return 'Terminal + Interface/Modem (HSDPA/Fax/Data) minimum 2 user'; break;
			case 10: return 'HSDPA Measurement Tool'; break;
		}
		break;
		
		case 9.2:
		switch($sub){
			case 1: return 'Manufacture/Factory Test Result'; break;
			case 2: return 'Specification equipment'; break;
		}
		break;
		
		case 10:
		switch($sub){
			case '10.1': return '10.1. Equipment quantity Check'; break;
			case '10.2': return '10.2. Connector Type'; break;
			case '10.3': return '10.3. Antenna Table'; break;
			case '10.4': return '10.4. Antenna System Control (ASC)'; break;
			case '10.5': return '10.5. Remote Electrical Tilt (RET)'; break;
			case '10.6': return '10.6. Feeder Cable'; break;
			case '10.7': return '10.7. Top Jumper (from feeder to ASC)'; break;
			case '10.8': return '10.8. Top Jumper (from ASC/RRU to Antenna)'; break;
			case '10.9': return '10.9. Bottom Jumper'; break;
			case '10.10': return '10.10. Optical Cable'; break;
		}
		break;
		
		case 10.1:
		switch($sub){
			case 1: return 'Antenna Polarization'; break;
			case 2: return 'Band  Frequency'; break;
			case 3: return 'Number of sectors'; break;
			case 4: return 'Type of Diversity'; break;
			case 5: return 'Antenna'; break;
			case 6: return 'Filter'; break;
			case 7: return 'EMP/Connector Arrester'; break;
			case 8: return 'Duplexer'; break;
			case 9: return 'Triplexer'; break;
			case 10: return 'Splitter Two Way'; break;
			case 11: return 'Splitter Three Way'; break;
			case 12: return 'Hybrid Coupler'; break;
			case 13: return 'TMA/ASC'; break;
			case 14: return 'RET'; break;
			case 15: return 'MCM'; break;
		}
		break;
		
		case 10.2:
		switch($sub){
			case 1: return '&frac12;" N Male'; break;
			case 2: return '&frac12;" N Female'; break;
			case 3: return '7/16" DIN Male'; break;
			case 4: return '7/16" DIN Female'; break;
			case 5: return '7/8" Male'; break;
			case 6: return '7/8" Female'; break;
			case 7: return '1 &frac14;" Male'; break;
			case 8: return '1 &frac14;" Female'; break;
			case 9: return '1 5/8" Male'; break;
			case 10: return '1 5/8" Female'; break;
		}
		break;
		
		case 10.3:
		switch($sub){
			case 1: return 'Sector 1 A'; break;
			case 2: return 'Sector 1 B'; break;
			case 3: return 'Sector 2 A'; break;
			case 4: return 'Sector 2 B'; break;
			case 5: return 'Sector 3 A'; break;
			case 6: return 'Sector 3 B'; break;
			case 7: return 'Sector 4 A'; break;
			case 8: return 'Sector 4 B'; break;
			case 9: return 'Sector 5 A'; break;
			case 10: return 'Sector 5 B'; break;
			case 11: return 'Sector 6 A'; break;
			case 12: return 'Sector 6 B'; break;
		}
		break;
		
		case 10.4:
		switch($sub){
			case 1: return 'Sector 1'; break;
			case 2: return 'Sector 2'; break;
			case 3: return 'Sector 3'; break;
			case 4: return 'Sector 4'; break;
			case 5: return 'Sector 5'; break;
			case 6: return 'Sector 6'; break;
		}
		break;
		
		case 10.5:
		switch($sub){
			case 1: return 'Sector 1'; break;
			case 2: return 'Sector 2'; break;
			case 3: return 'Sector 3'; break;
			case 4: return 'Sector 4'; break;
			case 5: return 'Sector 5'; break;
			case 6: return 'Sector 6'; break;
		}
		break;
		
		case 10.6:
		switch($sub){
			case 1: return 'Sector 1 A'; break;
			case 2: return 'Sector 1 B'; break;
			case 3: return 'Sector 2 A'; break;
			case 4: return 'Sector 2 B'; break;
			case 5: return 'Sector 3 A'; break;
			case 6: return 'Sector 3 B'; break;
			case 7: return 'Sector 4 A'; break;
			case 8: return 'Sector 4 B'; break;
			case 9: return 'Sector 5 A'; break;
			case 10: return 'Sector 5 B'; break;
			case 11: return 'Sector 6 A'; break;
			case 12: return 'Sector 6 B'; break;
		}
		break;
		
		case 10.7:
		switch($sub){
			case 1: return 'Sector 1 A'; break;
			case 2: return 'Sector 1 B'; break;
			case 3: return 'Sector 2 A'; break;
			case 4: return 'Sector 2 B'; break;
			case 5: return 'Sector 3 A'; break;
			case 6: return 'Sector 3 B'; break;
			case 7: return 'Sector 4 A'; break;
			case 8: return 'Sector 4 B'; break;
			case 9: return 'Sector 5 A'; break;
			case 10: return 'Sector 5 B'; break;
			case 11: return 'Sector 6 A'; break;
			case 12: return 'Sector 6 B'; break;
		}
		break;
		
		case 10.8:
		switch($sub){
			case 1: return 'Sector 1 A'; break;
			case 2: return 'Sector 1 B'; break;
			case 3: return 'Sector 2 A'; break;
			case 4: return 'Sector 2 B'; break;
			case 5: return 'Sector 3 A'; break;
			case 6: return 'Sector 3 B'; break;
			case 7: return 'Sector 4 A'; break;
			case 8: return 'Sector 4 B'; break;
			case 9: return 'Sector 5 A'; break;
			case 10: return 'Sector 5 B'; break;
			case 11: return 'Sector 6 A'; break;
			case 12: return 'Sector 6 B'; break;
		}
		break;
		
		case 10.9:
		switch($sub){
			case 1: return 'Sector 1 A'; break;
			case 2: return 'Sector 1 B'; break;
			case 3: return 'Sector 2 A'; break;
			case 4: return 'Sector 2 B'; break;
			case 5: return 'Sector 3 A'; break;
			case 6: return 'Sector 3 B'; break;
			case 7: return 'Sector 4 A'; break;
			case 8: return 'Sector 4 B'; break;
			case 9: return 'Sector 5 A'; break;
			case 10: return 'Sector 5 B'; break;
			case 11: return 'Sector 6 A'; break;
			case 12: return 'Sector 6 B'; break;
		}
		break;
		
		case 11:
		switch($sub){
			case 11.1: return '11.1. Installation antenna system'; break;
		}
		break;
		
		case 11.1:
		switch($sub){
			case 1: return 'Maintenance aspect (easy to maintain)'; break;
			case 2: return 'Antenna mounting'; break;
			case 3: return 'Arm construction'; break;
			case 4: return 'Pylon construction'; break;
			case 5: return 'Arm length'; break;
			case 6: return 'Feeder placement'; break;
			case 7: return 'Feeder bending'; break;
			case 8: return 'Feeder Connector Installation'; break;
			case 9: return 'Feeder Clamp Installation'; break;
			case 11: return 'Water Leakage'; break;
			case 12: return 'Connection cable feeder correct and tightened'; break;
			case 13: return 'Indoor Cable Tray Installation'; break;
			case 14: return 'Lightning Protection'; break;
			case 15: return 'Grounding in every 50 meter'; break;
			case 16: return 'Grounding Bar on Bending'; break;
			case 17: return 'Grounding Bar at entering room feeder'; break;
			case 18: return 'Grounding feeder shouldn’t be connected to tower'; break;
			case 19: return 'TVSS availability'; break;
			case 20: return 'TVSS installation & connection'; break;
		}
		break;
		
		case 12:
		switch($sub){
			case 12.1: return '12.1. Orientation outdoor antenna'; break;
			case 12.2: return '12.2. Position outdoor antenna'; break;
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
			case 7: return 'Sector 4 A'; break;
			case 8: return 'Sector 4 B'; break;
			case 9: return 'Sector 5 A'; break;
			case 10: return 'Sector 5 B'; break;
			case 11: return 'Sector 6 A'; break;
			case 12: return 'Sector 6 B'; break;
		}
		break;
		
		case 12.2:
		switch($sub){
			case 1: return 'Placement'; break;
			case 2: return 'Possibility of blocking'; break;
			case 2: return 'Distance from other'; break;
		}
		break;
		
		case 13:
		switch($sub){
			case 13.1: return '13.1. Refer to Guideline Installation'; break;
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
			case 7: return 'Sector 4 A'; break;
			case 8: return 'Sector 4 B'; break;
			case 9: return 'Sector 5 A'; break;
			case 10: return 'Sector 5 B'; break;
			case 11: return 'Sector 6 A'; break;
			case 12: return 'Sector 6 B'; break;
		}
		break;
		
		case 14:
		switch($sub){
			case 14.1: return '14.1. VSWR Measurement without ASC / Filter'; break;
			case 14.2: return '14.2. VSWR Measurement with ASC / Filter'; break;
			case 14.3: return '14.3. VSWR Measurement for RBS 3412 / 3418 / 3518'; break;
			case 14.4: return '14.4. Antenna System Supervision Threshold Setting'; break;
		}
		break;
		
		case 14.1:
		switch($sub){
			case 1: return 'Sector 1 A'; break;
			case 2: return 'Sector 1 B'; break;
			case 3: return 'Sector 2 A'; break;
			case 4: return 'Sector 2 B'; break;
			case 5: return 'Sector 3 A'; break;
			case 6: return 'Sector 3 B'; break;
			case 7: return 'Sector 4 A'; break;
			case 8: return 'Sector 4 B'; break;
			case 9: return 'Sector 5 A'; break;
			case 10: return 'Sector 5 B'; break;
			case 11: return 'Sector 6 A'; break;
			case 12: return 'Sector 6 B'; break;
		}
		break;
		
		case 14.2:
		switch($sub){
			case 1: return 'Sector 1 A'; break;
			case 2: return 'Sector 1 B'; break;
			case 3: return 'Sector 2 A'; break;
			case 4: return 'Sector 2 B'; break;
			case 5: return 'Sector 3 A'; break;
			case 6: return 'Sector 3 B'; break;
			case 7: return 'Sector 4 A'; break;
			case 8: return 'Sector 4 B'; break;
			case 9: return 'Sector 5 A'; break;
			case 10: return 'Sector 5 B'; break;
			case 11: return 'Sector 6 A'; break;
			case 12: return 'Sector 6 B'; break;
		}
		break;
		
		case 14.3:
		switch($sub){
			case 1: return 'Sector 1 A'; break;
			case 2: return 'Sector 1 B'; break;
			case 3: return 'Sector 2 A'; break;
			case 4: return 'Sector 2 B'; break;
			case 5: return 'Sector 3 A'; break;
			case 6: return 'Sector 3 B'; break;
			case 7: return 'Sector 4 A'; break;
			case 8: return 'Sector 4 B'; break;
			case 9: return 'Sector 5 A'; break;
			case 10: return 'Sector 5 B'; break;
			case 11: return 'Sector 6 A'; break;
			case 12: return 'Sector 6 B'; break;
		}
		break;
		
		case 14.4:
		switch($sub){
			case 1: return 'Sector 1 A'; break;
			case 2: return 'Sector 1 B'; break;
			case 3: return 'Sector 2 A'; break;
			case 4: return 'Sector 2 B'; break;
			case 5: return 'Sector 3 A'; break;
			case 6: return 'Sector 3 B'; break;
			case 7: return 'Sector 4 A'; break;
			case 8: return 'Sector 4 B'; break;
			case 9: return 'Sector 5 A'; break;
			case 10: return 'Sector 5 B'; break;
			case 11: return 'Sector 6 A'; break;
			case 12: return 'Sector 6 B'; break;
		}
		break;
		
		case 15:
		switch($sub){
			case 15.1: return '15.1. Downloading Software (script) Status'; break;
		}
		break;
		
		case 16:
		switch($sub){
			case 16.1: return '16.1. Hardware Technical Status & Configuration'; break;
		}
		break;
		
		case 17:
		switch($sub){
			case 17.1: return '17.1. Checking status & Functionality of RBS Internal Alarm by doing simulation test on RBS'; break;
			case 17.2: return '17.2. Checking status & functionality External alarms by doing simulation test on transducer/sensor'; break;
		}
		break;
		
		case 17.1:
		switch($sub){
			case 1: return 'Fan Off'; break;
			case 2: return 'PSU 1 , 2 , 3 of 4 off (MAINS FAILURE)'; break;
			case 3: return 'Bfu_DcDistributionFailure'; break;
		}
		break;
		
		case 17.2:
		switch($sub){
			case 1: return 'Port No. 1 (Door Open)'; break;
			case 2: return 'Port No. 2 (Fire Smoke - Heat Alarm)'; break;
			case 3: return 'Port No. 3 (Temperature Alarm)'; break;
			case 4: return 'Port No. 4 (AC Power L1 fails)'; break;
			case 5: return 'Port No. 5 (AC Power L2 fails)'; break;
			case 6: return 'Port No. 6 (AC Power L3 fails)'; break;
			case 7: return 'Port No. 7 (Arrester Fails)'; break;
			case 8: return 'Port No. 8 (Rectifier Main fails)'; break;
			case 9: return 'Port No. 9 (Rectifier Module Fails)'; break;
			case 10: return 'Port No. 10 (Rectifier Battery fails)'; break;
			case 11: return 'Port No. 11 (Genset Working)'; break;
			case 12: return 'Port No. 12 (Genset fails)'; break;
			case 13: return 'Port No. 13 (Genset Routine Test)'; break;
			case 14: return 'Port No. 14 (Spare)'; break;
			case 15: return 'Port No. 15 (Spare)'; break;
			case 16: return 'Port No. 16 (Spare)'; break;
		}
		break;
		
		case 18:
		switch($sub){
			case '18.1': return '18.1. Iub Transport Option'; break;
			case '18.2': return '18.2. Voice Test Call'; break;
			case '18.3': return '18.3. Video Test Call'; break;
			case '18.4': return '18.4. Packet switch Test Call'; break;
			case '18.5': return '18.5. HSPA Test Call'; break;
			case '18.6': return '18.6. Test Actual and PMR Capture Result'; break;
			case '18.7': return '18.7. SMS Test Call'; break;
			case '18.8': return '18.8. MMS Test Call'; break;
			case '18.9': return '18.9. Incoming & Outgoing Hand Over Test'; break;
			case '18.10': return '18.10. Emergency Call (118, 112)'; break;
			case '18.11': return '18.11. IMA Bandwidth Adaptation Test'; break;
			case '18.12': return '18.12. Sync Test for Dual Stack and Native IP configuratio'; break;
			case '18.13': return '18.13. OAM Link ATM & IP Connectivity to OSS Test'; break;
			case '18.14': return '18.14. IMA Bandwidth Adaptation Functionality Test'; break;
		}
		break;
		
		case 18.1:
		switch($sub){
			case 1: return 'User Plane'; break;
			case 2: return 'Control Plane'; break;
		}
		break;
		
		case 18.2:
		switch($sub){
			case 1: return 'Mobile Originating'; break;
			case 2: return 'Mobile Terminating'; break;
		}
		break;
		
		case 18.3:
		switch($sub){
			case 1: return 'Mobile Originating'; break;
			case 2: return 'Mobile Terminating'; break;
		}
		break;
		
		case 18.4:
		switch($sub){
			case 1: return 'PING'; break;
			case 2: return 'WAP'; break;
			case 3: return 'HTTP'; break;
			case 4: return 'FTP DL'; break;
			case 5: return 'FTP UL'; break;
			case 6: return 'Streaming'; break;
		}
		break;
		
		case 18.5:
		switch($sub){
			case 1: return 'Test scenario'; break;
			case 2: return 'PING'; break;
			case 3: return 'WAP'; break;
			case 4: return 'HTTP'; break;
			case 5: return 'FTP DL'; break;
			case 6: return 'FTP UL'; break;
			case 7: return 'Streaming'; break;
			case 8: return 'Uplink'; break;
		}
		break;
		
		case 18.6:
		switch($sub){
			case 1: return 'HSDPA Throughput'; break;
		}
		break;
		
		case 18.7:
		switch($sub){
			case 1: return 'Mobile Originating'; break;
			case 2: return 'Mobile Terminating'; break;
		}
		break;
		
		case 18.8:
		switch($sub){
			case 1: return 'Mobile Originating'; break;
			case 2: return 'Mobile Terminating'; break;
		}
		break;
		
		case 18.9:
		switch($sub){
			case 1: return 'Sector 1 (Incoming HO)'; break;
			case 2: return 'Sector 1 (Outgoing HO)'; break;
			case 3: return 'Sector 2 (Incoming HO)'; break;
			case 4: return 'Sector 2 (Outgoing HO)'; break;
			case 5: return 'Sector 3 (Incoming HO)'; break;
			case 6: return 'Sector 3 (Outgoing HO)'; break;
			case 7: return 'Sector 4 (Incoming HO)'; break;
			case 8: return 'Sector 4 (Outgoing HO)'; break;
			case 9: return 'Sector 5 (Incoming HO)'; break;
			case 10: return 'Sector 5 (Outgoing HO)'; break;
			case 11: return 'Sector 6 (Incoming HO)'; break;
			case 12: return 'Sector 6 (Outgoing HO)'; break;
		}
		break;
		
		case 18.10:
		switch($sub){
			case 1: return '112'; break;
			case 2: return '118'; break;
		}
		break;
		
		case 18.11:
		switch($sub){
			case 1: return 'Synchronization State (Enable/Disable/NA)'; break;
			case 2: return 'Synchronization Priority (1-8)'; break;
			case 3: return 'Result Check (OK/NOK/NA)'; break;
			case 4: return 'Server 0 : 10.145.140.36'; break;
			case 5: return 'Server 0 : 10.145.140.38'; break;
		}
		break;
		
		case 18.12:
		switch($sub){
			case 1: return 'E1 - 1'; break;
			case 2: return 'E1 - 2'; break;
			case 3: return 'IpSyncRef:1'; break;
			case 4: return 'IpSyncRef:2'; break;
			case 5: return 'Server 0 : 10.145.140.36'; break;
			case 6: return 'Server 0 : 10.145.140.38'; break;
		}
		break;
		
		case 18.13:
		switch($sub){
			case 1: return 'Ping to OSS (10.145.140.40)'; break;
			case 2: return 'Trace Route to OSS (10.145.140.40)'; break;
		}
		break;
		
		case 18.14:
		switch($sub){
			case 1: return '1'; break;
			case 2: return '2'; break;
			case 3: return '3'; break;
			case 4: return '4'; break;
			case 5: return '5'; break;
			case 6: return '6'; break;
			case 7: return '7'; break;
			case 8: return '8'; break;
		}
		break;
		
		case 19:
		switch($sub){
			case 19.1: return '19.1. BBS Type identification'; break;
			case 19.2: return '19.2. BBS Material and Installation check List'; break;
			case 19.3: return '19.3. BBS Testing'; break;
			case 19.4: return '19.4. BBS Labelling'; break;
		}
		break;
		
		case 19.1:
		switch($sub){
			case 1: return 'BBS 9500 for RBS 3101'; break;
			case 2: return 'BBS for RBS 3206'; break;
			case 3: return 'BBS 8500 for RBS 3107'; break;
			case 4: return 'PBC 04 for RBS 3412'; break;
			case 5: return 'RBS 6201 for RBS 6201'; break;
		}
		break;
		
		case 19.2:
		switch($sub){
			case 1: return 'Power Bar'; break;
			case 2: return 'Battery cable connection'; break;
			case 3: return 'Battery 12 V'; break;
			case 4: return 'Fan unit /Cooling Fan *'; break;
			case 5: return 'Switch use for Fan *'; break;
		}
		break;
		
		case 19.3:
		switch($sub){
			case 1: return 'Back Up Time'; break;
			case 2: return 'Battery  1'; break;
			case 3: return 'Battery  2'; break;
			case 4: return 'Battery  3'; break;
			case 5: return 'Battery  4'; break;
			case 6: return 'Battery  5'; break;
			case 7: return 'Battery  6'; break;
			case 8: return 'Battery  7'; break;
			case 9: return 'Battery  8'; break;
			case 10: return 'Battery  9'; break;
			case 11: return 'Battery  10'; break;
			case 12: return 'Battery  11'; break;
			case 13: return 'Battery  12'; break;
			case 14: return 'Battery  13'; break;
			case 15: return 'Battery  14'; break;
			case 16: return 'Battery  15'; break;
			case 17: return 'Battery  16'; break;
		}
		break;
		
		case 20:
		switch($sub){
			case 20.1: return '20.1. Site condition must be clean'; break;
			case 20.2: return '20.2. No damage at site environment'; break;
			case 20.3: return '20.3. All Infrastructures inside the RBS must have the same condition as previous'; break;
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