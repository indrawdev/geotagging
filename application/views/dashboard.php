<?php if(!defined('BASEPATH')) exit('No direct script access allowed') ?>
<script type="text/javascript" src="<?php echo base_url() ?>static/js/proxy.php?f=highcharts"></script>
<div id="body">
	<div class="container">
    	<h1>Dashboard</h1>
        <?php
		// ATP
		$wh_atp = array(
			" AND a.`owner_id`='".$_SESSION['isat']['uid']."'", //0
			"", //1
			" AND a.`user_supervisor`='".$_SESSION['isat']['uid']."'", //2
			" AND a.`user_manager`='".$_SESSION['isat']['uid']."'", //3
			"", //4 - AND a.`user_indosat`='".$_SESSION['isat']['uid']."'
			" AND (a.`uid_supervisor_delegate`='".$_SESSION['isat']['uid']."' OR a.`uid_manager_delegate`='".$_SESSION['isat']['uid']."' OR a.`uid_indosat_delegate`='".$_SESSION['isat']['uid']."')", //5
			"", //6
			"", //7 - AND a.`owner_id`='".$_SESSION['isat']['uid']."'
			" AND a.`owner_id`='".$_SESSION['isat']['uid']."'", //8
			" AND a.`owner_id`='".$_SESSION['isat']['uid']."'", //9
			" AND a.`owner_id`='".$_SESSION['isat']['uid']."'", //10
			" AND a.`owner_id`='".$_SESSION['isat']['uid']."'", //11
			" AND a.`owner_id`='".$_SESSION['isat']['uid']."'", //12
			" AND a.`owner_id`='".$_SESSION['isat']['uid']."'" //13
		);
		
		if($_SESSION['isat']['uid'] == '778091649200135147913950') $wh_atp[$_SESSION['isat']['role']] = '';
		
		if($_SESSION['isat']['role'] == 6){
			$Qatp_needapp = $this->db->query("SELECT 1 FROM `it_atp` WHERE `fl_status`=0");
			$Qatp_pmvwait = $this->db->query("
				SELECT a.`atp_id`
				FROM `it_atp` a
				JOIN `it_site` b ON b.`site_id`=a.`site_id`
				JOIN `it_attachment` c ON c.`idx`=a.`atp_id` AND c.`table`='atp_indosat_foto' AND c.`user_id`='".$_SESSION['isat']['uid']."'
				WHERE a.`fl_quest`=1 AND a.`fl_approve`=0
			");
			$Qatp_conswait = $this->db->query("
				SELECT a.`atp_id`
				FROM `it_atp` a
				JOIN `it_site` b ON b.`site_id`=a.`site_id`
				JOIN `it_attachment` c ON c.`idx`=a.`atp_id` AND c.`table`='atp_indosat_foto' AND c.`user_id`='".$_SESSION['isat']['uid']."'
				WHERE a.`fl_quest`=1 AND (a.`fl_approve` > 0 AND a.`fl_approve` < 3)
			");
			$Qatp_pmisatwait = $this->db->query("
				SELECT a.`atp_id`
				FROM `it_atp` a
				JOIN `it_site` b ON b.`site_id`=a.`site_id`
				JOIN `it_attachment` c ON c.`idx`=a.`atp_id` AND c.`table`='atp_indosat_foto' AND c.`user_id`='".$_SESSION['isat']['uid']."'
				WHERE a.`fl_quest`=1 AND (a.`fl_approve` > 2 AND a.`fl_approve` < 5)
			");
		}else{
			$Qatp_needapp = $this->db->query("
				SELECT a.`atp_id`
				FROM `it_atp` a
				JOIN `it_site` b ON b.`site_id`=a.`site_id`
				WHERE a.`fl_status`=0".$wh_atp[$_SESSION['isat']['role']]
			);
			$Qatp_pmvwait = $this->db->query("
				SELECT a.`atp_id`
				FROM `it_atp` a
				JOIN `it_site` b ON b.`site_id`=a.`site_id`
				WHERE a.`fl_quest`=1 AND a.`fl_approve`=0".$wh_atp[$_SESSION['isat']['role']]
			);
			$Qatp_conswait = $this->db->query("
				SELECT a.`atp_id`
				FROM `it_atp` a
				JOIN `it_site` b ON b.`site_id`=a.`site_id`
				WHERE a.`fl_quest`=1 AND (a.`fl_approve` > 0 AND a.`fl_approve` < 3)".$wh_atp[$_SESSION['isat']['role']]
			);
			$Qatp_pmisatwait = $this->db->query("
				SELECT a.`atp_id`
				FROM `it_atp` a
				JOIN `it_site` b ON b.`site_id`=a.`site_id`
				WHERE a.`fl_quest`=1 AND (a.`fl_approve` > 2 AND a.`fl_approve` < 5)".$wh_atp[$_SESSION['isat']['role']]
			);
		}
		
		// ATM
		$wh_atm = array(
			" AND a.`owner_id`='".$_SESSION['isat']['uid']."'", //0
			"", //1
			" AND a.`user_vendor`='".$_SESSION['isat']['uid']."'", //2
			" AND a.`user_consultant`='".$_SESSION['isat']['uid']."'", //3
			"", //4 - AND a.`user_indosat`='".$_SESSION['isat']['uid']."'
			" AND a.`uid_vendor_delegate`='".$_SESSION['isat']['uid']."'", //5
			" AND a.`user_wh`='".$_SESSION['isat']['uid']."'", //6
			"", //7 - AND a.`user_nom`='".$_SESSION['isat']['uid']."'
			" AND a.`user_wh`='".$_SESSION['isat']['uid']."'", //8
			" AND a.`uid_vendor_delegate`='".$_SESSION['isat']['uid']."'", //9
			" AND a.`uid_consultant_delegate`='".$_SESSION['isat']['uid']."'", //10
			" AND a.`uid_nom_delegate`='".$_SESSION['isat']['uid']."'", //11
			" AND a.`uid_indosat_delegate`='".$_SESSION['isat']['uid']."'", //12
			" AND a.`user_wh`='".$_SESSION['isat']['uid']."'" //13
		);
		
		$Qatm_needapp = $this->db->query("
			SELECT a.`atm_id`
			FROM `it_atm` a
			JOIN `it_site` b ON b.`site_id`=a.`from_site`
			JOIN `it_site` c ON c.`site_id`=a.`to_site`
			WHERE a.`fl_status`=0".$wh_atm[$_SESSION['isat']['role']]
		);
		$Qatm_pmvwait = $this->db->query("
			SELECT a.`atm_id`
			FROM `it_atm` a
			JOIN `it_site` b ON b.`site_id`=a.`from_site`
			JOIN `it_site` c ON c.`site_id`=a.`to_site`
			WHERE a.`fl_barcode`=1 AND a.`order_vendor`=3".$wh_atm[$_SESSION['isat']['role']]
		);
		$Qatm_conswait = $this->db->query("
			SELECT a.`atm_id`
			FROM `it_atm` a
			JOIN `it_site` b ON b.`site_id`=a.`from_site`
			JOIN `it_site` c ON c.`site_id`=a.`to_site`
			WHERE a.`fl_barcode`=1 AND a.`order_consultant`=3".$wh_atm[$_SESSION['isat']['role']]
		);
		$Qatm_pmisatwait = $this->db->query("
			SELECT a.`atm_id`
			FROM `it_atm` a
			JOIN `it_site` b ON b.`site_id`=a.`from_site`
			JOIN `it_site` c ON c.`site_id`=a.`to_site`
			WHERE a.`fl_barcode`=1 AND a.`order_indosat`=3".$wh_atm[$_SESSION['isat']['role']]
		);
		$Qatm_nomwait = $this->db->query("
			SELECT a.`atm_id`
			FROM `it_atm` a
			JOIN `it_site` b ON b.`site_id`=a.`from_site`
			JOIN `it_site` c ON c.`site_id`=a.`to_site`
			WHERE a.`fl_barcode`=1 AND a.`order_nom`=3".$wh_atm[$_SESSION['isat']['role']]
		);
		
		// SS
		$wh_ss = array(
			" AND a.`user_engineer`='".$_SESSION['isat']['uid']."'", //0
			"", //1
			" AND a.`user_pmvendor`='".$_SESSION['isat']['uid']."'", //2
			" AND a.`user_consultant`='".$_SESSION['isat']['uid']."'", //3
			"", //4 - AND a.`user_pmisat`='".$_SESSION['isat']['uid']."'
			" AND a.`user_delegator_pmvendor`='".$_SESSION['isat']['uid']."'", //5
			" AND a.`user_engineer`='".$_SESSION['isat']['uid']."'", //6
			"", //7 - AND a.`user_engineer`='".$_SESSION['isat']['uid']."'
			" AND a.`user_engineer`='".$_SESSION['isat']['uid']."'", //8
			" AND a.`user_delegator_pmvendor`='".$_SESSION['isat']['uid']."'", //9
			" AND a.`user_delegator_consultant`='".$_SESSION['isat']['uid']."'", //10
			" AND a.`user_engineer`='".$_SESSION['isat']['uid']."'", //11
			" AND a.`user_delegator_pmisat`='".$_SESSION['isat']['uid']."'", //12
			" AND a.`user_engineer`='".$_SESSION['isat']['uid']."'" //13
		);
		
		$Qss_needapp = $this->db->query("
			SELECT a.`task_id`
			FROM `ss_task` a
			JOIN `it_site` b ON b.`site_id`=a.`site_id`
			WHERE a.`fl_status`=0".$wh_ss[$_SESSION['isat']['role']]
		);
		$Qss_pmvwait = $this->db->query("
			SELECT a.`task_id`
			FROM `ss_task` a
			JOIN `it_site` b ON b.`site_id`=a.`site_id`
			WHERE a.`order_pmvendor`=3".$wh_ss[$_SESSION['isat']['role']]
		);
		$Qss_conswait = $this->db->query("
			SELECT a.`task_id`
			FROM `ss_task` a
			JOIN `it_site` b ON b.`site_id`=a.`site_id`
			WHERE a.`order_consultant`=3".$wh_ss[$_SESSION['isat']['role']]
		);
		$Qss_pmisatwait = $this->db->query("
			SELECT a.`task_id`
			FROM `ss_task` a
			JOIN `it_site` b ON b.`site_id`=a.`site_id`
			WHERE a.`order_pmisat`=3".$wh_ss[$_SESSION['isat']['role']]
		);
		
		$ar_holder = array('ATP', 'ATM', 'SS');
		$ar_point = array(
			0 => array($Qatp_needapp->num_rows, $Qatp_pmvwait->num_rows, $Qatp_conswait->num_rows, $Qatp_pmisatwait->num_rows, 0),
			1 => array($Qatm_needapp->num_rows, $Qatm_pmvwait->num_rows, $Qatm_conswait->num_rows, $Qatm_pmisatwait->num_rows, $Qatp_nomwait->num_rows),
			2 => array($Qss_needapp->num_rows, $Qss_pmvwait->num_rows, $Qss_conswait->num_rows, $Qss_pmisatwait->num_rows, 0)
		);
		?>
		<script type="text/javascript">
		var chart; var chart2;
		$(document).ready(function(){
			//ATP
			char2 = new Highcharts.Chart({
				chart: {
					renderTo: '<?php echo $ar_holder[0] ?>',
					plotBackgroundColor: null,
					plotBorderWidth: null,
					plotShadow: false
				},
				title: {
					text: '<?php echo $ar_holder[0] ?> Task Status'
				},
				tooltip: {
					formatter: function() {
						return '<b>'+ this.point.name +'</b><br><span style="font-weight:bold;color:'+ this.point.color +'">'+ this.point.y +'</span>('+ Math.round(this.percentage) +'%)';
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
								return '<b>'+ this.point.name +'</b><br><span style="font-weight:bold;color:'+ this.point.color +'">'+ this.point.y +'</span>('+ Math.round(this.percentage) +'%)';
							}
						}
					}
				},
				series: [{
					type: 'pie',
					name: 'Status',
					data: [
						{
							y: <?php echo $ar_point[0][0] ?>,
							name: 'Need INDOSAT approval to activate',  
							color: '#DE293D',
							selected: true,
							sliced: true
						},
						{
							y: <?php echo $ar_point[0][1] ?>,
							name: 'Waiting for PM Vendor action',
							color: '#315D8E',
						},
						{
							y: <?php echo $ar_point[0][2] ?>,
							name: 'Waiting for Consultant action',
							color: '#607238',
						},
						{
							y: <?php echo $ar_point[0][3] ?>,
							name: 'Waiting for INDOSAT action',
							color: '#FAB228',
						},
						{
							y: <?php echo $ar_point[0][4] ?>,
							name: 'Waiting for NOM action',
							color: '#59C8F6',
						}
					]
				}]
			});
			//ATM
			chart = new Highcharts.Chart({
				chart: {
					renderTo: '<?php echo $ar_holder[1] ?>',
					plotBackgroundColor: null,
					plotBorderWidth: null,
					plotShadow: false
				},
				title: {
					text: '<?php echo $ar_holder[1] ?> Task Status'
				},
				tooltip: {
					formatter: function() {
						return '<b>'+ this.point.name +'</b><br><span style="font-weight:bold;color:'+ this.point.color +'">'+ this.point.y +'</span>('+ Math.round(this.percentage) +'%)';
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
								return '<b>'+ this.point.name +'</b><br><span style="font-weight:bold;color:'+ this.point.color +'">'+ this.point.y +'</span>('+ Math.round(this.percentage) +'%)';
							}
						}
					}
				},
				series: [{
					type: 'pie',
					name: 'Status',
					data: [
						{
							y: <?php echo $ar_point[1][0] ?>,
							name: 'Need INDOSAT approval to activate',  
							color: '#DE293D',
							selected: true,
							sliced: true
						},
						{
							y: <?php echo $ar_point[1][1] ?>,
							name: 'Waiting for PM Vendor action',
							color: '#315D8E',
						},
						{
							y: <?php echo $ar_point[1][2] ?>,
							name: 'Waiting for Consultant action',
							color: '#607238',
						},
						{
							y: <?php echo $ar_point[1][3] ?>,
							name: 'Waiting for INDOSAT action',
							color: '#FAB228',
						}
					]
				}]
			});
			//SS
			char2 = new Highcharts.Chart({
				chart: {
					renderTo: '<?php echo $ar_holder[2] ?>',
					plotBackgroundColor: null,
					plotBorderWidth: null,
					plotShadow: false
				},
				title: {
					text: '<?php echo $ar_holder[2] ?> Task Status'
				},
				tooltip: {
					formatter: function() {
						return '<b>'+ this.point.name +'</b><br><span style="font-weight:bold;color:'+ this.point.color +'">'+ this.point.y +'</span>('+ Math.round(this.percentage) +'%)';
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
								return '<b>'+ this.point.name +'</b><br><span style="font-weight:bold;color:'+ this.point.color +'">'+ this.point.y +'</span>('+ Math.round(this.percentage) +'%)';
							}
						}
					}
				},
				series: [{
					type: 'pie',
					name: 'Status',
					data: [
						{
							y: <?php echo $ar_point[2][0] ?>,
							name: 'Need INDOSAT approval to activate',  
							color: '#DE293D',
							selected: true,
							sliced: true
						},
						{
							y: <?php echo $ar_point[2][1] ?>,
							name: 'Waiting for PM Vendor action',
							color: '#315D8E',
						},
						{
							y: <?php echo $ar_point[2][2] ?>,
							name: 'Waiting for Consultant action',
							color: '#607238',
						},
						{
							y: <?php echo $ar_point[2][3] ?>,
							name: 'Waiting for INDOSAT action',
							color: '#FAB228',
						}
					]
				}]
			});
		});
		</script>
		<div id="ATP" style="width:100%;height:400px"></div>
		<div id="ATM" style="width:100%;height:400px;margin:20px 0"></div>
		<div id="SS" style="width:100%;height:400px"></div>
    </div>
</div>