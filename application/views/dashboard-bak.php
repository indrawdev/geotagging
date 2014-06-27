<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>

<script language="javascript" src="<?php echo base_url(); ?>static/js/proxy.php?f=highcharts"></script>

<div id="body">
	<div class="container">
    <h1>Dashboard</h1>
    	
        <?php
		
/*
New		0
Unfinish	1/2
Pending		1
App		33
Reject		--
*/

		if($_SESSION['isat']['guest']) $wh = " AND `owner_id`='".$_SESSION['isat']['guest']."'"; else $wh = '';
		
		// ATM
		$Qatm_pending = $this->db->query("SELECT 1 FROM `it_atm` WHERE `fl_reject` = 0 AND `fl_approve` = 0".$wh);
		$Qatm_approved = $this->db->query("SELECT 1 FROM `it_atm` WHERE `fl_reject` = 0 AND `fl_approve` > 0".$wh);
		$Qatm_reject = $this->db->query("SELECT 1 FROM `it_atm` WHERE `fl_reject` > 0".$wh);
		
		// ATP
		$Qatp_needapp = $this->db->query("SELECT 1 FROM `it_atp` WHERE fl_status=0".$wh);
		$Qatp_waitforbook = $this->db->query("
			SELECT 1 FROM `it_atp` a
			LEFT JOIN it_book b ON (b.idx=a.atp_id) AND b.table LIKE 'atp'
			WHERE a.fl_status=1 AND b.user_id IS NULL".$wh
		);
		$Qatp_waitforcheckin = $this->db->query("
			SELECT 1 FROM `it_atp` a
			JOIN it_book b ON (b.idx=a.atp_id) AND b.table LIKE 'atp'
			WHERE a.fl_status=1 AND b.fl_active=0".$wh
		);
		$Qatp_waitforsubmit = $this->db->query("
			SELECT 1 FROM `it_atp` a
			JOIN it_book b ON (b.idx=a.atp_id) AND b.table LIKE 'atp'
			WHERE a.fl_status=1 AND b.fl_active=1 AND fl_quest=0".$wh
		);
		$Qatp_pmvwait = $this->db->query("SELECT 1 FROM `it_atp` WHERE fl_quest=1 AND fl_approve=0".$wh);
		$Qatp_conswait = $this->db->query("SELECT 1 FROM `it_atp` WHERE fl_quest=1 AND (fl_approve >0 AND fl_approve < 3)".$wh);
		$Qatp_pmisatwait = $this->db->query("SELECT 1 FROM `it_atp` WHERE fl_quest=1 AND (fl_approve >2 AND fl_approve <5)".$wh);
		
		//$Qatp_pending = $this->db->query("SELECT 1 FROM `it_atp` WHERE `fl_reject` = 0 AND `fl_approve` = 0".$wh);
		//$Qatp_approved = $this->db->query("SELECT 1 FROM `it_atp` WHERE `fl_reject` = 0 AND `fl_approve` > 0".$wh);
		//$Qatp_reject = $this->db->query("SELECT 1 FROM `it_atp` WHERE `fl_reject` > 0".$wh);

		//$ar_point = array(0 => array($Qatm_pending->num_rows, $Qatm_reject->num_rows, $Qatm_approved->num_rows), 1 => array($Qatp_pending->num_rows, $Qatp_reject->num_rows, $Qatp_approved->num_rows));
		$ar_point = array(0 => array($Qatm_pending->num_rows, $Qatm_reject->num_rows, $Qatm_approved->num_rows), 1 => array($Qatp_needapp->num_rows, $Qatp_waitforbook->num_rows, $Qatp_waitforcheckin->num_rows, $Qatp_waitforsubmit->num_rows, $Qatp_pmvwait->num_rows, $Qatp_conswait->num_rows, $Qatp_pmisatwait->num_rows));
		$ar_holder = array('ATM', 'ATP');
		?>
    
		<script type="text/javascript">
		var chart; var chart2;
		$(document).ready(function(){
			
			chart = new Highcharts.Chart({
				chart: {
					renderTo: '<?php echo $ar_holder[0]; ?>',
					plotBackgroundColor: null,
					plotBorderWidth: null,
					plotShadow: false
				},
				title: {
					text: '<?php echo $ar_holder[0]; ?> Task Status'
				},
				tooltip: {
					formatter: function() {
						return '<b>'+ this.point.name +'</b><br><span style="font-weight:bold;color:'+ this.point.colors +'">'+ this.point.y +'</span>('+ Math.round(this.percentage) +') %';
					}
				},
				plotOptions: {
					pie: {
						allowPointSelect: true,
						cursor: 'pointer',
						dataLabels: {
							enabled: true,
							color: '#000',
							connectorColor: '#000',
							formatter: function() {
								return '<b>'+ this.point.name +'</b><br><span style="font-weight:bold;color:'+ this.point.colors +'">'+ this.point.y +'</span>('+ Math.round(this.percentage) +') %';
							}
						}
					}
				},
				series: [{
					type: 'pie',
					name: 'Status',
					data: [
						{
							y: <?php echo $ar_point[0][0]; ?>,
							name: 'Pending',  
							colors: '#315D8E',
							selected: true,
							sliced: true
						},
						{
							y: <?php echo $ar_point[0][1]; ?>,
							name: 'Rejected',
							colors: '#933635'
						},
						{
							y: <?php echo $ar_point[0][2]; ?>,
							name: 'Approved',
							colors: '#607238',
						}
					]
				}]
			});
			
			char2 = new Highcharts.Chart({
				chart: {
					renderTo: '<?php echo $ar_holder[1]; ?>',
					plotBackgroundColor: null,
					plotBorderWidth: null,
					plotShadow: false
				},
				title: {
					text: '<?php echo $ar_holder[1]; ?> Task Status'
				},
				tooltip: {
					formatter: function() {
						return '<b>'+ this.point.name +'</b><br><span style="font-weight:bold;color:'+ this.point.colors +'">'+ this.point.y +'</span>('+ Math.round(this.percentage) +') %';
					}
				},
				plotOptions: {
					pie: {
						allowPointSelect: true,
						cursor: 'pointer',
						dataLabels: {
							enabled: true,
							color: '#000',
							connectorColor: '#000',
							formatter: function() {
								return '<b>'+ this.point.name +'</b><br><span style="font-weight:bold;color:'+ this.point.colors +'">'+ this.point.y +'</span>('+ Math.round(this.percentage) +') %';
							}
						}
					}
				},
				series: [{
					type: 'pie',
					name: 'Status',
					data: [
						{
							y: <?php echo $ar_point[1][0]; ?>,
							name: 'Need approval to activate',  
							//colors: '#315D8E',
							selected: true,
							sliced: true
						},
						{
							y: <?php echo $ar_point[1][1]; ?>,
							name: 'Ready to book'
							//colors: '#933635'
						},
						{
							y: <?php echo $ar_point[1][2]; ?>,
							name: 'Ready to checked in'
							//colors: '#607238',
						},
						{
							y: <?php echo $ar_point[1][3]; ?>,
							name: 'Not submitted yet'
						},
						{
							y: <?php echo $ar_point[1][4]; ?>,
							name: 'Waiting for PM Vendor action'
						},
						{
							y: <?php echo $ar_point[1][5]; ?>,
							name: 'Waiting for Consultant action'
						},
						{
							y: <?php echo $ar_point[1][6]; ?>,
							name: 'Waiting for INDOSAT action'
						}
					]
				}]
			});
			
		});
		</script>
        
		<div id="ATM" style="width:100%;height:400px"></div>
		<div id="ATP" style="width:100%;height:400px;margin:20px 0"></div>
        
    </div>
</div>