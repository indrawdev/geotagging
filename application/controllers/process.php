<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

session_start();

class Process extends CI_Controller {

	function __construct()
	{
		parent::__construct();
        $this->load->database();
		$this->load->helper(array('url'));
		$this->load->model('ifunction');
	}
	
	public function login()
	{
		$uname = strip_tags($_POST['uname']);
		$password = strip_tags($_POST['password']);
		if($uname && $password){
			
			$Qcheck = $this->db->query("SELECT `user_id`, `role_id`, `name`, `vendor_id`, `login_last` FROM `it_user` WHERE `fl_active`=1 AND `uname`='$uname' AND `pswd`='".$this->ifunction->get_pswd($password)."'");
			if($Qcheck->num_rows){
				$check = $Qcheck->result_object();
				
				/*if($check[0]->role_id == 8){
					if($check[0]->vendor_id <> '413073206300136558345184') die($this->ifunction->slidedown_response('iforms_f5', 'error-box', 'Sorry, operation not permitted.'));
				}*/
				
				$_SESSION['isat']['log'] = true;
				$_SESSION['isat']['uid'] = $check[0]->user_id;
				$_SESSION['isat']['name'] = $check[0]->name;
				$_SESSION['isat']['role'] = $check[0]->role_id;
				$_SESSION['isat']['vendor'] = $check[0]->vendor_id;
				if(!$check[0]->role_id) $_SESSION['isat']['guest'] = $check[0]->user_id;
				
				$this->db->update('it_user', array('login_time' => $check[0]->login_last, 'login_last' => date('Y-m-d H:i:s')), array('user_id' => $check[0]->user_id));
				echo $this->ifunction->action_response(2, 'iforms_f5', 'warning-box', 'Login success, redirecting..');
			}
			else echo $this->ifunction->slidedown_response('iforms_f5', 'error-box', 'Invalid login combination.');
		}
		else echo $this->ifunction->slidedown_response('iforms_f5', 'error-box', 'Please complete the form below.');
	}
	
	public function logout()
	{
		unset($_SESSION['isat']);
		header('location:'.base_url());
	}
	
	public function remove()
	{
		if(empty($_SESSION['isat']['log'])) exit('Session expired!');
		$idx = strip_tags($_POST['idx']);
		switch($_POST['c']){
			case 'atm':
			if(!in_array($_SESSION['isat']['role'], array('1', '2'), true)) die();
			$Qlist = $this->db->query("SELECT `files` FROM `it_attachment` WHERE `table` IN('atm_checkin', 'atm_freephoto', 'atm_packaging', 'atm_inshelter', 'atm_outshelter') AND `idx`='$idx'");
			foreach($Qlist->result_object() as $list){
				if($list->files) $this->ifunction->un_link('./media/files/'.$list->files);
			}
			
			$this->db->delete('it_atm', array('atm_id' => $idx));
			$this->db->delete('it_checkin', array('table' => 'atm', 'idx' => $idx));
			$this->db->query("DELETE FROM `it_attachment` WHERE `table` IN('atm_checkin', 'atm_freephoto', 'atm_packaging', 'atm_inshelter', 'atm_outshelter') AND `idx`='$idx'");
			break;
			
			case 'atp':
			if(!in_array($_SESSION['isat']['role'], array('1', '2'), true)) die();
			$Qlist = $this->db->query("SELECT `files` FROM `it_attachment` WHERE `table` IN('atp_checkin', 'atp_freephoto', 'atp_chapter_no', 'atp_subchapter_no') AND `idx`='$idx'");
			foreach($Qlist->result_object() as $list){
				if($list->files) $this->ifunction->un_link('./media/files/'.$list->files);
			}
			
			$this->db->delete('it_atp', array('atp_id' => $idx));
			$this->db->delete('it_atp_chapter', array('atp_id' => $idx));
			$this->db->delete('it_atp_form', array('atp_id' => $idx));
			$this->db->delete('it_atp_subchapter', array('atp_id' => $idx));
			
			$this->db->delete('it_book', array('table' => 'atp', 'idx' => $idx));
			$this->db->delete('it_checkin', array('table' => 'atp', 'idx' => $idx));
			
			$this->db->query("DELETE FROM `it_attachment` WHERE `table` IN('atp_checkin', 'atp_freephoto', 'atp_chapter_no', 'atp_subchapter_no') AND `idx`='$idx'");
			break;
			
			case 'ss':
			if(!in_array($_SESSION['isat']['role'], array('1', '2'), true)) die();
			$Qlist = $this->db->query("SELECT `file` FROM `ss_task_photo` WHERE `task_id`='$idx'");
			foreach($Qlist->result_object() as $list){
				if($list->file) $this->ifunction->un_link('./media/ss/installation/'.$list->file);
			}
			
			$Qlist = $this->db->query("SELECT `file` FROM `ss_task_punchlist_photo` WHERE `task_id`='$idx'");
			foreach($Qlist->result_object() as $list){
				if($list->file) $this->ifunction->un_link('./media/ss/punchlist/'.$list->file);
			}
			
			$this->db->delete('ss_task', array('task_id' => $idx));
			$this->db->delete('it_book', array('table' => 'ss', 'idx' => $idx));
			$this->db->delete('it_checkin', array('table' => 'ss', 'idx' => $idx));
			$this->db->delete('it_attachment', array('table' => 'ss_indosat_foto', 'idx' => $idx));
			$this->db->delete('ss_task_punchlist_photo', array('task_id' => $idx));
			$this->db->delete('ss_task_photo', array('task_id' => $idx));
			break;
			
			case 'site':
			if(!in_array($_SESSION['isat']['role'], array('1', '2', '5'), true)) die();
			$Qcheck = $this->db->query("SELECT `id` FROM `it_site` WHERE `site_id`='$idx'");
			if($Qcheck->num_rows){
				$check = $Qcheck->result_object();
				
				$Qlist = $this->db->query("SELECT `files` FROM `it_site_part` WHERE `id`='".$check[0]->id."'");
				foreach($Qlist->result_object() as $list){
					if($list->files) $this->ifunction->un_link('./media/files/'.$list->files);
				}
				
				$this->db->delete('it_site', array('site_id' => $idx));
				$this->db->delete('it_site_part', array('id' => $check[0]->id));
				$this->db->delete('it_master_barcode', array('site_id' => $idx));
			}
			break;
			
			case 'site_part':
			if(!in_array($_SESSION['isat']['role'], array('1', '2', '5'), true)) die();
			$Qcheck = $this->db->query("SELECT `files` FROM `it_site_part` WHERE `site_part_id`='$idx'");
			if($Qcheck->num_rows){
				$check = $Qcheck->result_object();
				if($check[0]->files) $this->ifunction->un_link('./media/files/'.$check[0]->files);
				$this->db->delete('it_site_part', array('site_part_id' => $idx));
			}
			break;
			
			case 'site_attachment':
			$Qcheck = $this->db->query("SELECT `files` FROM `it_attachment` WHERE `attachment_id`='$idx' AND `user_id`='".$_SESSION['isat']['uid']."'");
			if($Qcheck->num_rows){
				$check = $Qcheck->result_object();
				if($check[0]->files) $this->ifunction->un_link('./media/files/'.$check[0]->files);
				$this->db->delete('it_attachment', array('attachment_id' => $idx));
			}
			break;
			
			case 'master_barcode':
			if(!in_array($_SESSION['isat']['role'], array('1', '2', '5'), true)) die();
			$gid = strip_tags($_POST['gid']);
			if($gid) $this->db->delete('it_master_barcode', array('group_id' => $gid)); else $this->db->delete('it_master_barcode', array('master_barcode_id' => $idx));
			break;
			
			case 'user':
			if($_SESSION['isat']['role'] <> 1) die(':P');
			$this->db->update('it_user', array('fl_active' => 0), array('user_id' => $idx));
			break;
			
			case 'reports':
			if($_SESSION['isat']['role'] <> 1) die(':P');
			$Qcheck = $this->db->query("SELECT `path` FROM `it_report` WHERE `report_id`='$idx'");
			if($Qcheck->num_rows){
				$check = $Qcheck->result_object();
				if($check[0]->path) $this->ifunction->un_link('./media/report/'.$check[0]->path);
				$this->db->delete('it_report', array('report_id' => $idx));
			}
			break;
			
			case 'vendor':
			if($_SESSION['isat']['role'] <> 1) die(':P');
			$this->db->update('it_vendor', array('fl_active' => 0), array('vendor_id' => $idx));
			break;
			
			case 'neid':
			if(!in_array($_SESSION['isat']['log'], array('1', '2', '5'), true)) die();
			$id = explode('_', $idx);
			$this->db->delete('network', array('neid' => $id[0], 'site_id' => $id[1]));
			break;
		}
	}
	
	public function action($tp, $idx)
	{
		if(empty($_SESSION['isat']['log'])) exit('Session expired! '.anchor('process/logout', '[Logout]'));
		if($_SESSION['isat']['role'] <> 4) die(':P');
		if(($_POST['action'] != 1) && ($_POST['action'] != 99)){
			if(!$_POST['note']) die($this->ifunction->slidedown_response('iforms_f1', 'error-box', 'Please complete the form below.'));
		}
		
		if(isset($_POST['note'])) $note = time().'|'.htmlentities($_POST['note']); else $note = time();
		
		switch($tp){
			case 'atm':
			
			if($_POST['action'] == 1 || $_POST['action'] == 99){
				
				if(!$_POST['task_type']) die($this->ifunction->slidedown_response('iforms_f1', 'error-box', 'Please complete the form below.'));
				$this->db->update('it_atm', array('fl_type' => $_POST['task_type']), array('atm_id' => $idx));
				
				$Qcheck = $this->db->query("
					SELECT a.`atf_no`, b.`name` AS `indosat_name`, c.`name` AS `vendor_name`, c.`email` AS `vendor_email`, d.`name` AS `cons_name`, d.`email` AS `cons_email`, e.`name` AS `nom_name`, e.`email` AS `nom_email`, f.`name` AS `wh_name`, f.`email` AS `wh_email`, g.`name` AS `own_name`, g.`email` AS `own_email`
					FROM `it_atm` a
					JOIN `it_user` b ON b.`user_id`=a.`user_indosat`
					JOIN `it_user` c ON c.`user_id`=a.`user_vendor`
					JOIN `it_user` d ON d.`user_id`=a.`user_consultant`
					JOIN `it_user` e ON e.`user_id`=a.`user_nom`
					JOIN `it_user` f ON f.`user_id`=a.`user_wh`
					JOIN `it_user` g ON g.`user_id`=a.`owner_id`
					WHERE a.`atm_id`='$idx'
				");
				if($Qcheck->num_rows):
				$check = $Qcheck->result_object();
				
				$subject = 'New ATM Task (Approved by PM Indosat)';
				$body = 'Notified that the "Asset Transfer Form" (ATF) no. <b>'.$check[0]->atf_no.'</b> acknowledged and approved by the PM Indosat ('.$check[0]->indosat_name.') to do Asset Transfer Mechanism.';
				
				if($check[0]->vendor_email){
					$message = $this->ifunction->template_mail(array('subject' => $subject, 'name' => $check[0]->vendor_name, 'body' => $body));
					$this->db->insert('logs_email', array('type' => 'app_atm', 'table' => 'atm', 'idx' => $idx, 'subject' => $subject, 'message' => $message, 'to_email' => $check[0]->vendor_email, 'to_name' => $check[0]->vendor_name));
				}
				
				if($check[0]->cons_email){
					$message = $this->ifunction->template_mail(array('subject' => $subject, 'name' => $check[0]->cons_name, 'body' => $body));
					$this->db->insert('logs_email', array('type' => 'app_atm', 'table' => 'atm', 'idx' => $idx, 'subject' => $subject, 'message' => $message, 'to_email' => $check[0]->cons_email, 'to_name' => $check[0]->cons_name));
				}
				
				if($check[0]->nom_email){
					$message = $this->ifunction->template_mail(array('subject' => $subject, 'name' => $check[0]->nom_name, 'body' => $body));
					$this->db->insert('logs_email', array('type' => 'app_atm', 'table' => 'atm', 'idx' => $idx, 'subject' => $subject, 'message' => $message, 'to_email' => $check[0]->nom_email, 'to_name' => $check[0]->nom_name));
				}
				
				if($check[0]->wh_email){
					$message = $this->ifunction->template_mail(array('subject' => $subject, 'name' => $check[0]->wh_name, 'body' => $body));
					$this->db->insert('logs_email', array('type' => 'app_atm', 'table' => 'atm', 'idx' => $idx, 'subject' => $subject, 'message' => $message, 'to_email' => $check[0]->wh_email, 'to_name' => $check[0]->wh_name));
				}
				
				if($check[0]->own_email){
					$message = $this->ifunction->template_mail(array('subject' => $subject, 'name' => $check[0]->own_name, 'body' => $body));
					$this->db->insert('logs_email', array('type' => 'app_atm', 'table' => 'atm', 'idx' => $idx, 'subject' => $subject, 'message' => $message, 'to_email' => $check[0]->own_email, 'to_name' => $check[0]->own_name));
				}
				endif;
			}elseif($_POST['action'] == 2){
				$Qcheck = $this->db->query("
					SELECT a.`atf_no`, b.`name` AS `indosat_name`, c.`name` AS `vendor_name`, c.`email` AS `vendor_email`, d.`name` AS `cons_name`, d.`email` AS `cons_email`
					FROM `it_atm` a
					JOIN `it_user` b ON b.`user_id`=a.`user_indosat`
					JOIN `it_user` c ON c.`user_id`=a.`user_vendor`
					JOIN `it_user` d ON d.`user_id`=a.`user_consultant`
					WHERE a.`atm_id`='$idx'
				");
				if($Qcheck->num_rows):
				$check = $Qcheck->result_object();
				
				$subject = 'New ATM Task (Rejected by PM Indosat)';
				$body = 'Notified that the "Asset Transfer Form" (ATF) no. <b>'.$check[0]->atf_no.'</b> rejected by the PM Indosat ('.$check[0]->indosat_name.') to do Asset Transfer Mechanism.';
				
				if($check[0]->vendor_email){
					$message = $this->ifunction->template_mail(array('subject' => $subject, 'name' => $check[0]->vendor_name, 'body' => $body));
					$this->db->insert('logs_email', array('type' => 'reject_atm', 'table' => 'atm', 'idx' => $idx, 'subject' => $subject, 'message' => $message, 'to_email' => $check[0]->vendor_email, 'to_name' => $check[0]->vendor_name));
				}
				
				if($check[0]->cons_email){
					$message = $this->ifunction->template_mail(array('subject' => $subject, 'name' => $check[0]->cons_name, 'body' => $body));
					$this->db->insert('logs_email', array('type' => 'reject_atm', 'table' => 'atm', 'idx' => $idx, 'subject' => $subject, 'message' => $message, 'to_email' => $check[0]->cons_email, 'to_name' => $check[0]->cons_name));
				}
				endif;
			}
			
			if(($_POST['action'] == 99)){
				$this->db->update('it_atm', array('fl_status' => 1, 'msg_status' => $note), array('atm_id' => $idx));
			}else{
				$this->db->update('it_atm', array('fl_status' => $_POST['action'], 'msg_status' => $note), array('atm_id' => $idx));
			}
			echo $this->ifunction->action_response(2, 'iforms_f1', 'warning-box', 'Action submitted, please wait..');
			break;
			
			case 'atp':
			
			if($_POST['action'] == 1){
				
				if(!$_POST['task_type']) die($this->ifunction->slidedown_response('iforms_f1', 'error-box', 'Please complete the form below.'));
				$this->db->update('it_atp', array('fl_type' => $_POST['task_type']), array('atp_id' => $idx));
				
				$Qcheck = $this->db->query("
					SELECT a.`title`, a.`brand`, b.`name` AS `indosat_name`, c.`name` AS `vendor_name`, c.`email` AS `vendor_email`, d.`name` AS `cons_name`, d.`email` AS `cons_email`, e.`name` AS `own_name`, e.`email` AS `own_email`
					FROM `it_atp` a
					JOIN `it_user` b ON b.`user_id`=a.`user_indosat`
					LEFT JOIN `it_user` c ON c.`user_id`=a.`user_supervisor`
					JOIN `it_user` d ON d.`user_id`=a.`user_manager`
					LEFT JOIN `it_user` e ON e.`user_id`=a.`owner_id`
					WHERE a.`atp_id`='$idx'
				");
				if($Qcheck->num_rows):
				$check = $Qcheck->result_object();
				
				$subject = 'New ATP Task (Approved by PM Indosat)';
				$body = 'Notified that the "Acceptance Test Procedure" (ATP) <b>'.$check[0]->title.'</b> (<b>'.$check[0]->brand.'</b>) acknowledged and approved by the PM Indosat ('.$check[0]->indosat_name.').';
				
				if($check[0]->vendor_email){
					$message = $this->ifunction->template_mail(array('subject' => $subject, 'name' => $check[0]->vendor_name, 'body' => $body));
					$this->db->insert('logs_email', array('type' => 'app_atp', 'table' => 'atp', 'idx' => $idx, 'subject' => $subject, 'message' => $message, 'to_email' => $check[0]->vendor_email, 'to_name' => $check[0]->vendor_name));
				}
				
				if($check[0]->cons_email){
					$message = $this->ifunction->template_mail(array('subject' => $subject, 'name' => $check[0]->cons_name, 'body' => $body));
					$this->db->insert('logs_email', array('type' => 'app_atp', 'table' => 'atp', 'idx' => $idx, 'subject' => $subject, 'message' => $message, 'to_email' => $check[0]->cons_email, 'to_name' => $check[0]->cons_name));
				}
				
				if($check[0]->own_email){
					$message = $this->ifunction->template_mail(array('subject' => $subject, 'name' => $check[0]->own_name, 'body' => $body));
					$this->db->insert('logs_email', array('type' => 'app_atp', 'table' => 'atp', 'idx' => $idx, 'subject' => $subject, 'message' => $message, 'to_email' => $check[0]->own_email, 'to_name' => $check[0]->own_name));
				}
				endif;
			}elseif($_POST['action'] == 2){
				$Qcheck = $this->db->query("
					SELECT a.`title`, a.`brand`, b.`name` AS `indosat_name`, c.`name` AS `vendor_name`, c.`email` AS `vendor_email`, d.`name` AS `cons_name`, d.`email` AS `cons_email`
					FROM `it_atp` a
					JOIN `it_user` b ON b.`user_id`=a.`user_indosat`
					LEFT JOIN `it_user` c ON c.`user_id`=a.`user_supervisor`
					JOIN `it_user` d ON d.`user_id`=a.`user_manager`
					WHERE a.`atp_id`='$idx'
				");
				if($Qcheck->num_rows):
				$check = $Qcheck->result_object();
				
				$subject = 'New ATP Task (Rejected by PM Indosat)';
				$body = 'Notified that the "Acceptance Test Procedure" (ATP) <b>'.$check[0]->title.'</b> (<b>'.$check[0]->brand.'</b>) rejected by the PM Indosat ('.$check[0]->indosat_name.').';
				
				if($check[0]->vendor_email){
					$message = $this->ifunction->template_mail(array('subject' => $subject, 'name' => $check[0]->vendor_name, 'body' => $body));
					$this->db->insert('logs_email', array('type' => 'reject_atp', 'table' => 'atp', 'idx' => $idx, 'subject' => $subject, 'message' => $message, 'to_email' => $check[0]->vendor_email, 'to_name' => $check[0]->vendor_name));
				}
				
				if($check[0]->cons_email){
					$message = $this->ifunction->template_mail(array('subject' => $subject, 'name' => $check[0]->cons_name, 'body' => $body));
					$this->db->insert('logs_email', array('type' => 'reject_atp', 'table' => 'atp', 'idx' => $idx, 'subject' => $subject, 'message' => $message, 'to_email' => $check[0]->cons_email, 'to_name' => $check[0]->cons_name));
				}
				endif;
			}
			
			$this->db->update('it_atp', array('fl_status' => $_POST['action'], 'msg_status' => $note), array('atp_id' => $idx));
			echo $this->ifunction->action_response(2, 'iforms_f1', 'warning-box', 'Action submitted, please wait..');
			break;
			
			case 'ss':
			
			if($_POST['action'] == 1){
				
				if(!$_POST['task_type']) die($this->ifunction->slidedown_response('iforms_f1', 'error-box', 'Please complete the form below.'));
				$this->db->update('ss_task', array('fl_type' => $_POST['task_type']), array('task_id' => $idx));
				
				$Qcheck = $this->db->query("
					SELECT a.`task_title`, b.`name` AS `indosat_name`, c.`name` AS `vendor_name`, c.`email` AS `vendor_email`, d.`name` AS `cons_name`, d.`email` AS `cons_email`, e.`name` AS `own_name`, e.`email` AS `own_email`
					FROM `ss_task` a
					JOIN `it_user` b ON b.`user_id`=a.`user_pmisat`
					JOIN `it_user` c ON c.`user_id`=a.`user_pmvendor`
					LEFT JOIN `it_user` d ON d.`user_id`=a.`user_consultant`
					LEFT JOIN `it_user` e ON e.`user_id`=a.`user_engineer`
					WHERE a.`task_id`='$idx'
				");
				if($Qcheck->num_rows):
				$check = $Qcheck->result_object();
				
				$subject = 'New SS Task (Approved by PM Indosat)';
				$body = 'Notified that the "Site Supervisory" (SS) <b>'.$check[0]->task_title.'</b> acknowledged and approved by the PM Indosat ('.$check[0]->indosat_name.').';
				
				if($check[0]->vendor_email){
					$message = $this->ifunction->template_mail(array('subject' => $subject, 'name' => $check[0]->vendor_name, 'body' => $body));
					$this->db->insert('logs_email', array('type' => 'app_ss', 'table' => 'ss', 'idx' => $idx, 'subject' => $subject, 'message' => $message, 'to_email' => $check[0]->vendor_email, 'to_name' => $check[0]->vendor_name));
				}
				
				if($check[0]->cons_email){
					$message = $this->ifunction->template_mail(array('subject' => $subject, 'name' => $check[0]->cons_name, 'body' => $body));
					$this->db->insert('logs_email', array('type' => 'app_ss', 'table' => 'ss', 'idx' => $idx, 'subject' => $subject, 'message' => $message, 'to_email' => $check[0]->cons_email, 'to_name' => $check[0]->cons_name));
				}
				
				if($check[0]->own_email){
					$message = $this->ifunction->template_mail(array('subject' => $subject, 'name' => $check[0]->own_name, 'body' => $body));
					$this->db->insert('logs_email', array('type' => 'app_ss', 'table' => 'ss', 'idx' => $idx, 'subject' => $subject, 'message' => $message, 'to_email' => $check[0]->own_email, 'to_name' => $check[0]->own_name));
				}
				endif;
			}elseif($_POST['action'] == 2){
				$Qcheck = $this->db->query("
					SELECT a.`task_title`, b.`name` AS `indosat_name`, c.`name` AS `vendor_name`, c.`email` AS `vendor_email`, d.`name` AS `cons_name`, d.`email` AS `cons_email`
					FROM `ss_task` a
					JOIN `it_user` b ON b.`user_id`=a.`user_pmisat`
					JOIN `it_user` c ON c.`user_id`=a.`user_pmvendor`
					LEFT JOIN `it_user` d ON d.`user_id`=a.`user_consultant`
					WHERE a.`task_id`='$idx'
				");
				if($Qcheck->num_rows):
				$check = $Qcheck->result_object();
				
				$subject = 'New SS Task (Rejected by PM Indosat)';
				$body = 'Notified that the "Site Supervisory" (SS) <b>'.$check[0]->task_title.'</b> rejected by the PM Indosat ('.$check[0]->indosat_name.').';
				
				if($check[0]->vendor_email){
					$message = $this->ifunction->template_mail(array('subject' => $subject, 'name' => $check[0]->vendor_name, 'body' => $body));
					$this->db->insert('logs_email', array('type' => 'reject_ss', 'table' => 'ss', 'idx' => $idx, 'subject' => $subject, 'message' => $message, 'to_email' => $check[0]->vendor_email, 'to_name' => $check[0]->vendor_name));
				}
				
				if($check[0]->cons_email){
					$message = $this->ifunction->template_mail(array('subject' => $subject, 'name' => $check[0]->cons_name, 'body' => $body));
					$this->db->insert('logs_email', array('type' => 'reject_ss', 'table' => 'ss', 'idx' => $idx, 'subject' => $subject, 'message' => $message, 'to_email' => $check[0]->cons_email, 'to_name' => $check[0]->cons_name));
				}
				endif;
			}
			
			$this->db->update('ss_task', array('fl_status' => $_POST['action'], 'msg_status' => $note), array('task_id' => $idx));
			echo $this->ifunction->action_response(2, 'iforms_f1', 'warning-box', 'Action submitted, please wait..');
			break;
		}
	}
	
	public function add_atm()
	{
		if(empty($_SESSION['isat']['log'])) exit('Session expired! '.anchor('process/logout', '[Logout]'));
		if(!in_array($_SESSION['isat']['role'], array('1', '2'), true)) die(':P');
		extract($_POST);
		
		if($title && $po_no && $from_site && $to_site){
			
			if($_SESSION['isat']['role'] == 2) $user_spv = $_SESSION['isat']['uid'];
			if(empty($network) || empty($network2) || !$user_wh || !$user_spv || !$user_indosat) die($this->ifunction->slidedown_response('iforms_f1', 'error-box', 'Please complete the form below.'));
			
			if(empty($mor)){
				if(!$user_nom) die($this->ifunction->slidedown_response('iforms_f1', 'error-box', 'Please complete the form below.'));
			}
			else $user_nom = 0;
			
			if(empty($nor)){
				if(!$user_consultant) die($this->ifunction->slidedown_response('iforms_f1', 'error-box', 'Please complete the form below.'));
			}
			else $user_consultant = 0;
			
			if($network == '---') $network = NULL;
			if($network2 == '---') $network2 = NULL;
			
			$from_sites = explode('|', $from_site);
			$to_sites = explode('|', $to_site);
			
			$file_allowed = array('xls', '.xlsx', 'pdf');
			/*if(isset($_FILES['file_ttsr']['name']) && $_FILES['file_ttsr']['tmp_name']){
				$fileext = explode('.', $_FILES['file_ttsr']['name']);
				$file_ext = strtolower(end($fileext));
				if(in_array($file_ext, $file_allowed, true)){
					$file_ttsr = date("YmdHms").'_'.rand(100, 999).'.'.$file_ext;
					move_uploaded_file($_FILES['file_ttsr']['tmp_name'], './media/files/'.$file_ttsr);
				}
				else die($this->ifunction->slidedown_response('iforms_f1', 'error-box', 'TTSR file format is not supported.'));
			}
			else $file_ttsr = NULL;*/
			
			if(isset($_FILES['file_dismantle']['name']) && $_FILES['file_dismantle']['tmp_name']){
				$fileext = explode('.', $_FILES['file_dismantle']['name']);
				$file_ext = strtolower(end($fileext));
				if(in_array($file_ext, $file_allowed, true)){
					$file_dismantle = date("YmdHms").'_'.rand(100, 999).'.'.$file_ext;
					move_uploaded_file($_FILES['file_dismantle']['tmp_name'], './media/files/'.$file_dismantle);
				}
				else die($this->ifunction->slidedown_response('iforms_f1', 'error-box', 'Dismantle file format is not supported. ('.$_FILES['file_dismantle']['type'].')'));
			}
			else $file_dismantle = NULL;
			
			if(isset($_FILES['file_other']['name']) && $_FILES['file_other']['tmp_name']){
				$fileext = explode('.', $_FILES['file_other']['name']);
				$file_ext = strtolower(end($fileext));
				if(in_array($file_ext, $file_allowed, true)){
					$file_other = date("YmdHms").'_'.rand(100, 999).'.'.$file_ext;
					move_uploaded_file($_FILES['file_other']['tmp_name'], './media/files/'.$file_other);
				}
				else die($this->ifunction->slidedown_response('iforms_f1', 'error-box', 'Other file format is not supported. ('.$_FILES['file_other']['type'].')'));
			}
			else $file_other = NULL;
			
			$fields=array(
				'title' => $title,
				'reason' => $title,
				'work_type' => $work_type,
				'atm_type' => $atm_type,
				'date' => $date,
				'division' => $division,
				'po_no' => $po_no,
				//'file_ttsr' => $file_ttsr,
				'file_dismantle' => $file_dismantle,
				'file_other' => $file_other,
				'from_site' => $from_sites[1],
				'from_neid' => $network,
				'to_site' => $to_sites[1],
				'to_neid' => $network2,
				'vendor_id' => $vendor,
				'owner_id' => $user,
				'user_wh' => $user_wh,
				'user_nom' => $user_nom,
				'user_vendor' => $user_spv,
				'user_consultant' => $user_consultant,
				'user_indosat' => $user_indosat,
				'timelog' => time()
			);
			$this->db->insert('it_atm', $fields);
			$atm_id = $this->db->insert_id();
			
			$zero = '';
			$str_zero = 5 - strlen($atm_id);
			if($str_zero > 0){
				for($i=0; $i < $str_zero; $i++) $zero .= 0;
			}
			
			$atf_no = '1'.$zero.$atm_id.'/ATF/'.date('m').'/'.date('Y');
			$this->db->update('it_atm', array('atf_no' => $atf_no), array('atm_id' => $atm_id));
			
			$Qcheck = $this->db->query("
				SELECT a.`name`, a.`email`, b.`name` AS `from_name`, c.`name` AS `role_name`
				FROM `it_user` a
				JOIN `it_user` b ON b.`user_id`='".$_SESSION['isat']['uid']."'
				JOIN `it_role` c ON c.`role_id`=b.`role_id`
				WHERE a.`user_id`='$user_indosat'
			");
			if($Qcheck->num_rows){
				$check = $Qcheck->result_object();
				if($check[0]->email){
					
					$Qdt = $this->db->query("
						SELECT a.`name` AS `vendor_name`, b.`id` AS `from_sid`, b.`name` AS `from_name`, b.`city` AS `from_city`, c.`id` AS `to_sid`, c.`name` AS `to_name`, c.`city` AS `to_city`
						FROM `it_vendor` a
						JOIN `it_site` b ON b.`site_id`='$from_sites[1]'
						JOIN `it_site` c ON c.`site_id`='$to_sites[1]'
						WHERE a.`vendor_id`='$vendor'
					");
					$dt = $Qdt->result_object();
					
					$subject = 'New ATM Task';
					$body = 'Notified that the "Asset Transfer Form" (ATF) <table border="0" style="margin:15px 0"><tr><td>ATF Number</td><td width="10">:</td><td><b>'.$atf_no.'</b></td></tr><tr><td>Project Name</td><td>:</td><td>'.$title.'</td></tr><tr><td>Vendor Executor</td><td>:</td><td>'.$dt[0]->vendor_name.'</td></tr><tr><td>Task Type</td><td>:</td><td>'.$atm_type.'</td></tr><tr><td>City (origin)</td><td>:</td><td>'.$dt[0]->from_city.'</td></tr><tr><td>Site ID (origin)</td><td>:</td><td>'.$dt[0]->from_sid.'</td></tr><tr><td>Site Name (origin)</td><td>:</td><td>'.$dt[0]->from_name.'</td></tr><tr><td>City (destination)</td><td>:</td><td>'.$dt[0]->to_city.'</td></tr><tr><td>Site ID (destination)</td><td>:</td><td>'.$dt[0]->to_sid.'</td></tr><tr><td>Site Name (destination)</td><td>:</td><td>'.$dt[0]->to_name.'</td></tr></table> was created by '.$check[0]->role_name.' ('.$check[0]->from_name.') and <b>need your approval</b>.<br /><br />Please login to <a href="'.base_url().'index.php/main/atm_app" style="color:#0079C0;text-decoration:none">Manage ATM (Approval)</a>.';
					
					$message = $this->ifunction->template_mail(array('subject' => $subject, 'name' => $check[0]->name, 'body' => $body));
					$this->db->insert('logs_email', array('type' => 'add_atm', 'table' => 'atm', 'idx' => $atm_id, 'subject' => $subject, 'message' => $message, 'to_email' => $check[0]->email, 'to_name' => $check[0]->name));
				}
			}
			echo $this->ifunction->action_response(2, 'iforms_f1', 'warning-box', 'Add Task successful, please wait..');
		}
		else echo $this->ifunction->slidedown_response('iforms_f1', 'error-box', 'Please complete the form below.');
	}
	
	public function ed_atm($dx)
	{
		if(empty($_SESSION['isat']['log'])) exit('Session expired! '.anchor('process/logout', '[Logout]'));
		if(!in_array($_SESSION['isat']['role'], array('1', '2'), true)) die(':P');
		extract($_POST);
		
		if($title && $po_no && $from_site && $to_site){
			
			if(empty($network) || empty($network2) || !$user_wh  || !$user_spv || !$user_indosat) die($this->ifunction->slidedown_response('iforms_f1', 'error-box', 'Please complete the form below.'));
			
			if(empty($mor)){
				if(!$user_nom) die($this->ifunction->slidedown_response('iforms_f1', 'error-box', 'Please complete the form below.'));
			}
			else $user_nom = 0;
			
			if(empty($nor)){
				if(!$user_consultant) die($this->ifunction->slidedown_response('iforms_f1', 'error-box', 'Please complete the form below.'));
			}
			else $user_consultant = 0;
			
			if($network == '---') $network = NULL;
			if($network2 == '---') $network2 = NULL;
			
			$from_sites = explode('|', $from_site);
			$to_sites = explode('|', $to_site);
			
			$file_allowed = array('xls', '.xlsx', 'pdf');
			/*if(isset($_FILES['file_ttsr']['name']) && $_FILES['file_ttsr']['tmp_name']){
				$fileext = explode('.', $_FILES['file_ttsr']['name']);
				$file_ext = strtolower(end($fileext));
				if(in_array($file_ext, $file_allowed, true)){
					$file_ttsr = date("YmdHms").'_'.rand(100, 999).'.'.$file_ext;
					move_uploaded_file($_FILES['file_ttsr']['tmp_name'], './media/files/'.$file_ttsr);
					if($old_ttsr) $this->ifunction->un_link('./media/files/'.$old_ttsr);
				}
				else die($this->ifunction->slidedown_response('iforms_f1', 'error-box', 'TTSR file format is not supported.'));
			}else{
				if($old_ttsr) $file_ttsr = $old_ttsr; else $file_ttsr = NULL;
			}*/
			
			if(isset($_FILES['file_dismantle']['name']) && $_FILES['file_dismantle']['tmp_name']){
				$fileext = explode('.', $_FILES['file_dismantle']['name']);
				$file_ext = strtolower(end($fileext));
				if(in_array($file_ext, $file_allowed, true)){
					$file_dismantle = date("YmdHms").'_'.rand(100, 999).'.'.$file_ext;
					move_uploaded_file($_FILES['file_dismantle']['tmp_name'], './media/files/'.$file_dismantle);
					if($old_dismantle) $this->ifunction->un_link('./media/files/'.$old_dismantle);
				}
				else die($this->ifunction->slidedown_response('iforms_f1', 'error-box', 'Dismantle file format is not supported. ('.$_FILES['file_dismantle']['type'].')'));
			}else{
				if($old_dismantle) $file_dismantle = $old_dismantle; else $file_dismantle = NULL;
			}
			
			if(isset($_FILES['file_other']['name']) && $_FILES['file_other']['tmp_name']){
				$fileext = explode('.', $_FILES['file_other']['name']);
				$file_ext = strtolower(end($fileext));
				if(in_array($file_ext, $file_allowed, true)){
					$file_other = date("YmdHms").'_'.rand(100, 999).'.'.$file_ext;
					move_uploaded_file($_FILES['file_other']['tmp_name'], './media/files/'.$file_other);
					if($old_other) $this->ifunction->un_link('./media/files/'.$old_other);
				}
				else die($this->ifunction->slidedown_response('iforms_f1', 'error-box', 'Other file format is not supported. ('.$_FILES['file_other']['type'].')'));
			}else{
				if($old_other) $file_other = $old_other; else $file_other = NULL;
			}
			
			$fields=array(
				'title' => $title,
				'reason' => $title,
				'work_type' => $work_type,
				'atm_type' => $atm_type,
				'date' => $date,
				'division' => $division,
				'po_no' => $po_no,
				//'file_ttsr' => $file_ttsr,
				'file_dismantle' => $file_dismantle,
				'file_other' => $file_other,
				'from_site' => $from_sites[1],
				'from_neid' => $network,
				'to_site' => $to_sites[1],
				'to_neid' => $network2,
				'vendor_id' => $vendor,
				'owner_id' => $user,
				'user_wh' => $user_wh,
				'user_nom' => $user_nom,
				'user_vendor' => $user_spv,
				'user_consultant' => $user_consultant,
				'user_indosat' => $user_indosat
			);
			$this->db->update('it_atm', $fields, array('atm_id' => $dx));
			
			echo $this->ifunction->action_response(2, 'iforms_f1', 'warning-box', 'Edit Task successful, please wait..');
		}
		else echo $this->ifunction->slidedown_response('iforms_f1', 'error-box', 'Please complete the form below.');
	}
	
	public function add_atp()
	{
		if(empty($_SESSION['isat']['log'])) exit('Session expired! '.anchor('process/logout', '[Logout]'));
		if(!in_array($_SESSION['isat']['role'], array('1', '2'), true)) die(':P');
		extract($_POST);
		
		if($title && $site && $brand){
			
			if($_SESSION['isat']['role'] == 2) $user_spv = $_SESSION['isat']['uid'];
			if(empty($network) || !$user_spv || !$user_indosat || !$time_task) die($this->ifunction->slidedown_response('iforms_f1', 'error-box', 'Please complete the form below.'));
			
			if(empty($nor)){
				if(!$user_consultant) die($this->ifunction->slidedown_response('iforms_f1', 'error-box', 'Please complete the form below.'));
			}
			else $user_consultant = 0;
			
			if($network == '---') $network = NULL;
			if($user) $user = $user; else $user = 0;
			
			$sites = explode('|', $site);
			if(isset($site_b)) $sites_b = explode('|', $site_b); else $sites_b[1] = 0;
			
			//if($time_task){
				$timetask = explode('-', $time_task);
				$time_task = $timetask[2].'-'.$timetask[1].'-'.$timetask[0];
			//}
			//else $time_task = '';
			
			$fields=array(
				'title' => $title,
				'site_id' => $sites[1],
				'site_b' => $sites_b[1],
				'neid' => $network,
				'brand' => $brand,
				'fl_type' => $type,
				'vendor_id' => $vendor,
				'user_id' => $user,
				'owner_id' => $user,
				'user_supervisor' => $user_spv,
				'user_manager' => $user_consultant,
				'user_indosat' => $user_indosat,
				'time_task' => $time_task,
				'timelog' => time()
			);
			$this->db->insert('it_atp', $fields);
			$atp_id = $this->db->insert_id();
			
			$Qcheck = $this->db->query("
				SELECT a.`name`, a.`email`, b.`name` AS `from_name`, c.`name` AS `role_name`
				FROM `it_user` a
				JOIN `it_user` b ON b.`user_id`='".$_SESSION['isat']['uid']."'
				JOIN `it_role` c ON c.`role_id`=b.`role_id`
				WHERE a.`role_id`='4'
			");//WHERE a.`user_id`='$user_indosat'
			if($Qcheck->num_rows){
				$check = $Qcheck->result_object();
				if($check[0]->email){
					$subject = 'New ATP Task';
					$body = 'Notified that the "Acceptance Test Procedure" (ATP) <b>'.$title.'</b> (<b>'.$brand.'</b>) was created by '.$check[0]->role_name.' ('.$check[0]->from_name.') and need your approval.<br /><br />Please login to <a href="'.base_url().'index.php/main/atp_app" style="color:#0079C0;text-decoration:none">Manage ATP (Approval)</a>.';
					
					$message = $this->ifunction->template_mail(array('subject' => $subject, 'name' => $check[0]->name, 'body' => $body));
					$this->db->insert('logs_email', array('type' => 'add_atp', 'table' => 'atp', 'idx' => $atp_id, 'subject' => $subject, 'message' => $message, 'to_email' => $check[0]->email, 'to_name' => $check[0]->name));
				}
			}
			
			echo $this->ifunction->action_response(2, 'iforms_f1', 'warning-box', 'Add Task successful, please wait..');
		}
		else echo $this->ifunction->slidedown_response('iforms_f1', 'error-box', 'Please complete the form below.');
	}
	
	public function ed_atp($dx)
	{
		if(empty($_SESSION['isat']['log'])) exit('Session expired! '.anchor('process/logout', '[Logout]'));
		if(!in_array($_SESSION['isat']['role'], array('1', '2'), true)) die(':P');
		extract($_POST);
		
		if($title && $site && $brand){
			
			if(empty($network)) die($this->ifunction->slidedown_response('iforms_f1', 'error-box', 'Please complete the form below.'));
			if(!$user_spv || !$user_indosat || !$time_task) die($this->ifunction->slidedown_response('iforms_f1', 'error-box', 'Please complete the form below.'));
			
			if(empty($nor)){
				if(!$user_consultant) die($this->ifunction->slidedown_response('iforms_f1', 'error-box', 'Please complete the form below.'));
			}
			else $user_consultant = 0;
			
			if($network == '---') $network = NULL;
			if($user) $user = $user; else $user = 0;
			
			$sites = explode('|', $site);
			if(isset($site_b)) $sites_b = explode('|', $site_b); else $sites_b[1] = 0;
			
			//if($time_task){
				$timetask = explode('-', $time_task);
				$time_task = $timetask[2].'-'.$timetask[1].'-'.$timetask[0];
			//}
			//else $time_task = '';
			
			$fields=array(
				'title' => $title,
				'site_id' => $sites[1],
				'site_b' => $sites_b[1],
				'neid' => $network,
				'brand' => $brand,
				'fl_type' => $type,
				'vendor_id' => $vendor,
				'user_id' => $user,
				'user_supervisor' => $user_spv,
				'user_manager' => $user_consultant,
				'user_indosat' => $user_indosat,
				'time_task' => $time_task
			);
			$this->db->update('it_atp', $fields, array('atp_id' => $dx));
			
			echo $this->ifunction->action_response(2, 'iforms_f1', 'warning-box', 'Edit Task successful, please wait..');
		}
		else echo $this->ifunction->slidedown_response('iforms_f1', 'error-box', 'Please complete the form below.');
	}
	
	public function add_ss()
	{
		if(empty($_SESSION['isat']['log'])) exit('Session expired! '.anchor('process/logout', '[Logout]'));
		if(!in_array($_SESSION['isat']['role'], array('1', '2'), true)) die(':P');
		extract($_POST);
		if($title && $time_task && $site && $vendor){
			
			if($_SESSION['isat']['role'] == 2) $user_spv = $_SESSION['isat']['uid'];
			if(!$user_spv || !$user_indosat) die($this->ifunction->slidedown_response('iforms_f1', 'error-box', 'Please complete the form below.'));
			
			if(empty($network)) $network = '';
			if($network == '---') $network = ''; //die($this->ifunction->slidedown_response('iforms_f1', 'error-box', 'Please complete the form below.'));
			$sites = explode('|', $site);
			
			if(empty($nor)){
				if(!$user_consultant) die($this->ifunction->slidedown_response('iforms_f1', 'error-box', 'Please complete the form below.'));
			}
			else $user_consultant = NULL;
			
			if($user) $user = $user; else $user = 0;
			
			$fields=array(
				'site_id' => $sites[1],
				'task_title' => $title,
				'neid' => $network,
				'vendor_id' => $vendor,
				'user_engineer' => $user,
				'user_pmvendor' => $user_spv,
				'user_consultant' => $user_consultant,
				'user_pmisat' => $user_indosat,
				'expired' => $time_task
			);
			$this->db->insert('ss_task', $fields);
			$ss_id = $this->db->insert_id();
			
			$Qcheck = $this->db->query("
				SELECT a.`name`, a.`email`, b.`name` AS `from_name`, c.`name` AS `role_name`
				FROM `it_user` a
				JOIN `it_user` b ON b.`user_id`='".$_SESSION['isat']['uid']."'
				JOIN `it_role` c ON c.`role_id`=b.`role_id`
				WHERE a.`user_id`='$user_indosat'
			");
			if($Qcheck->num_rows){
				$check = $Qcheck->result_object();
				if($check[0]->email){
					$subject = 'New SS Task';
					$body = 'Notified that the "Site Supervisory" (SS) <b>'.$title.'</b> was created by '.$check[0]->role_name.' ('.$check[0]->from_name.') and need your approval.<br /><br />Please login to <a href="'.base_url().'index.php/main/atp_ss" style="color:#0079C0;text-decoration:none">Manage SS (Approval)</a>.';
					
					$message = $this->ifunction->template_mail(array('subject' => $subject, 'name' => $check[0]->name, 'body' => $body));
					$this->db->insert('logs_email', array('type' => 'add_ss', 'table' => 'ss', 'idx' => $ss_id, 'subject' => $subject, 'message' => $message, 'to_email' => $check[0]->email, 'to_name' => $check[0]->name));
				}
			}
			
			echo $this->ifunction->action_response(2, 'iforms_f1', 'warning-box', 'Add Task successful, please wait..');
		}
		else echo $this->ifunction->slidedown_response('iforms_f1', 'error-box', 'Please complete the form below.');
	}
	
	public function ed_ss($dx)
	{
		if(empty($_SESSION['isat']['log'])) exit('Session expired! '.anchor('process/logout', '[Logout]'));
		if(!in_array($_SESSION['isat']['role'], array('1', '2'), true)) die(':P');
		extract($_POST);
		if($title && $time_task && $site && $vendor){
			
			if($_SESSION['isat']['role'] == 2) $user_spv = $_SESSION['isat']['uid'];
			if(!$user_spv || !$user_indosat) die($this->ifunction->slidedown_response('iforms_f1', 'error-box', 'Please complete the form below.'));
			
			if(empty($network)) $network = '';
			if($network == '---') $network = ''; //die($this->ifunction->slidedown_response('iforms_f1', 'error-box', 'Please complete the form below.'));
			$sites = explode('|', $site);
			
			if(empty($nor)){
				if(!$user_consultant) die($this->ifunction->slidedown_response('iforms_f1', 'error-box', 'Please complete the form below.'));
			}
			else $user_consultant = NULL;
			
			if($user) $user = $user; else $user = 0;
			
			$fields=array(
				'site_id' => $sites[1],
				'task_title' => $title,
				'neid' => $network,
				'vendor_id' => $vendor,
				'user_engineer' => $user,
				'user_pmvendor' => $user_spv,
				'user_consultant' => $user_consultant,
				'user_pmisat' => $user_indosat,
				'expired' => $time_task
			);
			$this->db->update('ss_task', $fields, array('task_id' => $dx));
			
			echo $this->ifunction->action_response(2, 'iforms_f1', 'warning-box', 'Edit Task successful, please wait..');
		}
		else echo $this->ifunction->slidedown_response('iforms_f1', 'error-box', 'Please complete the form below.');
	}
	
	public function preload($atp_id, $brand)
	{
		$_POST['dx'] = $atp_id;
		$data = $_POST;
		$this->load->view('pdf/atp/'.$brand.'/edit/process', $data);
		//$this->load->file('./application/views/pdf/atp/'.$brand.'/edit/process.php', $data);
	}
	
	public function app($tp, $dx)
	{
		if(empty($_SESSION['isat']['log'])) exit('Session expired! '.anchor('process/logout', '[Logout]'));
		extract($_POST);
		
		$dxx = explode('-', $dx);
		$tpe = explode('_', $tp);
		$table = 'it_'.$tpe[0];
		$field = $tpe[0].'_id';
		if($tpe[0] == 'atp') $owner = 'uid_'.$tpe[2]; else $owner = 'user_'.$tpe[2];
		$msg = 'msg_'.$tpe[2];
		$delegated = 'uid_'.$tpe[2].'_delegate';
		$msg_delegated = 'msg_'.$tpe[2].'_delegate';
		
		if(!$user){
			if($action==4) die($this->ifunction->slidedown_response('iforms_f1', 'error-box', 'Please complete the form below.')); else $user = '';
		}
		if(!$note) $notes = time(); else $notes = time().'|'.$note;
		
		//0 = Fresh, 1 = Approve, 2 = Reject, 3 = Action
		
		switch($tpe[2]){
			case 'wh':
			//$table
			if($action==3){
				$act = 1;
				$actions=0;
				
				$r_val = $dxx[0];
				$r_msg_down = $field;
				//$this->db->update('it_atm', array('order_wh' => 2), array('atm_id' => $dxx[0]));
				$this->db->update('it_atm', array('atf_date' => NULL, 'msg_wh' => NULL, 'msg_nom' => NULL, 'msg_vendor' => NULL, 'msg_consultant' => NULL, 'msg_indosat' => NULL, 'order_wh' => 0, 'order_nom' => 0, 'order_vendor' => 0, 'order_consultant' => 0, 'order_indosat' => 0, 'fl_barcode' => 0, 'fl_checkin' => 0, 'fl_approve' => 0), array('atm_id' => $dxx[0]));
				$this->db->delete('it_checkin', array('table' => 'atm', 'idx' => $dxx[0]));
				
				//email atm
			}else{
				$act = 0;
				$actions=1;
				
				if($action <> 4):
				$this->db->update('it_atm', array('order_wh' => 1, 'order_vendor' => 3), array('atm_id' => $dxx[0]));
				
				//email atm
				endif;
			}
			continue;
			
			case 'vendor':
			if($action==3){
				$act = 1;
				$actions=1;
				
				$r_val = '';
				$r_msg_down = 'msg_wh';
				//$this->db->update('it_atm', array('order_vendor' => 2, 'order_wh' => 3), array('atm_id' => $dxx[0]));
				$this->db->update('it_atm', array('atf_date' => NULL, 'msg_wh' => NULL, 'msg_nom' => NULL, 'msg_vendor' => NULL, 'msg_consultant' => NULL, 'msg_indosat' => NULL, 'order_wh' => 0, 'order_nom' => 0, 'order_vendor' => 0, 'order_consultant' => 0, 'order_indosat' => 0, 'fl_barcode' => 0, 'fl_checkin' => 0, 'fl_approve' => 0), array('atm_id' => $dxx[0]));
				$this->db->delete('it_checkin', array('table' => 'atm', 'idx' => $dxx[0]));
				
				//email atm
			}else{
				$act = 0;
				$actions=2;
				
				if($action <> 4):
				if($dxx[1]){
					$this->db->update('it_atm', array('order_vendor' => 1, 'order_nom' => 3), array('atm_id' => $dxx[0]));
					//$mngr = 'user_nom';
				}else{
					if($dxx[2]){
						$this->db->update('it_atm', array('order_vendor' => 1, 'order_consultant' => 3), array('atm_id' => $dxx[0]));
						//$mngr = 'user_consultant';
					}else{
						$this->db->update('it_atm', array('order_vendor' => 1, 'order_indosat' => 3), array('atm_id' => $dxx[0]));
						//$mngr = 'user_indosat';
					}
				}
				
				//email atm
				endif;
			}
			continue;
			
			case 'nom':
			if($action==3){
				$act = 1;
				$actions=2;
				
				$r_val = '';
				$r_msg_down = 'msg_vendor';
				//$this->db->update('it_atm', array('order_consultant' => 2, 'order_vendor' => 3), array('atm_id' => $dxx[0]));
				$this->db->update('it_atm', array('atf_date' => NULL, 'msg_wh' => NULL, 'msg_nom' => NULL, 'msg_vendor' => NULL, 'msg_consultant' => NULL, 'msg_indosat' => NULL, 'order_wh' => 0, 'order_nom' => 0, 'order_vendor' => 0, 'order_consultant' => 0, 'order_indosat' => 0, 'fl_barcode' => 0, 'fl_checkin' => 0, 'fl_approve' => 0), array('atm_id' => $dxx[0]));
				$this->db->delete('it_checkin', array('table' => 'atm', 'idx' => $dxx[0]));
				
				//email atm
			}else{
				$act = 0;
				$actions=3;
				
				if($action <> 4):
				if($dxx[2]){
					$this->db->update('it_atm', array('order_nom' => 1, 'order_consultant' => 3), array('atm_id' => $dxx[0]));
					//$mngr = 'user_consultant';
				}else{
					$this->db->update('it_atm', array('order_nom' => 1, 'order_indosat' => 3), array('atm_id' => $dxx[0]));
					//$mngr = 'user_indosat';
				}
				
				//email atm
				endif;
			}
			continue;
			
			case 'consultant':
			if($action==3){
				$act = 1;
				$actions=3;
				
				$r_val = '';
				$r_msg_down = 'msg_consultant';
				//$this->db->update('it_atm', array('order_nom' => 2, 'order_consultant' => 3), array('atm_id' => $dxx[0]));
				$this->db->update('it_atm', array('atf_date' => NULL, 'msg_wh' => NULL, 'msg_nom' => NULL, 'msg_vendor' => NULL, 'msg_consultant' => NULL, 'msg_indosat' => NULL, 'order_wh' => 0, 'order_nom' => 0, 'order_vendor' => 0, 'order_consultant' => 0, 'order_indosat' => 0, 'fl_barcode' => 0, 'fl_checkin' => 0, 'fl_approve' => 0), array('atm_id' => $dxx[0]));
				$this->db->delete('it_checkin', array('table' => 'atm', 'idx' => $dxx[0]));
				
				//email atm
			}else{
				$act = 0;
				$actions=4;
				
				if($action <> 4):
				$this->db->update('it_atm', array('order_consultant' => 1, 'order_indosat' => 3), array('atm_id' => $dxx[0]));
				
				//email atm
				endif;
			}
			continue;
			
			case 'supervisor':
			if($tpe[0] == 'ss'){
				if($action==3){
					$this->db->update('ss_task', array('order_pmvendor' => 0, 'order_consultant' => 0, 'order_pmisat' => 0, 'user_delegator_pmvendor' => NULL, 'user_delegator_consultant' => NULL, 'user_delegator_pmisat' => NULL, 'fl_reject' => 1), array('task_id' => $dxx[0]));
					$this->db->delete('it_checkin', array('table' => 'ss', 'idx' => $dxx[0]));
				}elseif($action==4){
					$this->db->update('ss_task', array('user_delegator_pmvendor' => $user), array('task_id' => $dxx[0]));
				}else{
					if($dxx[1]){
						$this->db->update('ss_task', array('order_pmvendor' => 1, 'order_consultant' => 3), array('task_id' => $dxx[0]));
					}else{
						$this->db->update('ss_task', array('order_pmvendor' => 1, 'order_pmisat' => 3), array('task_id' => $dxx[0]));
					}
				}
				
				if($action <> 4) $this->db->insert('it_log_app', array('table' => 'ss', 'idx' => $dxx[0], 'user_id' => $_SESSION['isat']['uid'], 'action' => $action, 'note' => $note, 'timelog'  => time()));
				die($this->ifunction->action_response(2, 'iforms_f1', 'warning-box', 'Task action submitted, please wait..'));
			}else{
				if($action==3){
					$act = 1;
					$actions=0;
					
					$r_val = $dxx[0];
					$r_uid_down = $field;
					$r_msg_down = $field;
					$r_uid_delegate = $field;
					$r_msg_delegate = $field;
					
					$this->db->query("UPDATE `$table` SET `order_supervisor`=2 WHERE `$field`=$dxx[0]");
					
					$Qcheck = $this->db->query("
						SELECT a.`title`, a.`brand`, b.`name` AS `me_name`, c.`name` AS `me_role`, d.`name` AS `own_name`, d.`email` AS `own_email`
						FROM `$table` a
						JOIN `it_user` b ON b.`user_id`='".$_SESSION['isat']['uid']."'
						JOIN `it_role` c ON c.`role_id`=b.`role_id`
						LEFT JOIN `it_user` d ON d.`user_id`=a.`owner_id`
						WHERE a.`$field`='$dxx[0]'
					");
					if($Qcheck->num_rows){
						$check = $Qcheck->result_object();
						if($check[0]->own_email){
							if($note) $noted = '<br /><br />This is reject message from him:<br />"<font color="#C88B21">'.$note.'</font>"'; else $noted = '';
							$subject = 'ATP Task (Rejected by '.$check[0]->me_role.')';
							$body = 'Notified that the "Acceptance Test Procedure" (ATP) <b>'.$check[0]->title.'</b> (<b>'.$check[0]->brand.'</b>) rejected by '.$check[0]->me_role.' ('.$check[0]->me_name.').'.$noted;
							
							$message = $this->ifunction->template_mail(array('subject' => $subject, 'name' => $check[0]->own_name, 'body' => $body));
							$this->db->insert('logs_email', array('type' => 'app', 'table' => $tpe[0], 'idx' => $dxx[0], 'subject' => $subject, 'message' => $message, 'to_email' => $check[0]->own_email, 'to_name' => $check[0]->own_name));
						}
					}
				}else{
					$act = 0;
					if($dxx[1]) $actions=2; else $actions=4;
					
					if($action <> 4):
					
					$this->db->query("UPDATE `$table` SET `order_supervisor`=1 WHERE `$field`=$dxx[0]");
					if($dxx[1]){
						$this->db->query("UPDATE `$table` SET `order_manager`=3 WHERE `$field`=$dxx[0]");
						$mngr = 'user_manager';
					}else{
						$this->db->query("UPDATE `$table` SET `order_indosat`=3 WHERE `$field`=$dxx[0]");
						$mngr = 'user_indosat';
					}
					
					$Qcheck = $this->db->query("
						SELECT a.`title`, a.`brand`, b.`name` AS `me_name`, c.`name` AS `me_role`, d.`name` AS `mngr_name`, d.`email` AS `mngr_email`
						FROM `$table` a
						JOIN `it_user` b ON b.`user_id`='".$_SESSION['isat']['uid']."'
						JOIN `it_role` c ON c.`role_id`=b.`role_id`
						LEFT JOIN `it_user` d ON d.`user_id`=a.`$mngr`
						WHERE a.`$field`='$dxx[0]'
					");
					if($Qcheck->num_rows){
						$check = $Qcheck->result_object();
						if($check[0]->mngr_email){
							if($note) $noted = '<br /><br />This is some message from him:<br />"<font color="#C88B21">'.$note.'</font>"'; else $noted = '';
							$subject = 'ATP Task (Approved by '.$check[0]->me_role.')';
							$body = 'Notified that the "Acceptance Test Procedure" (ATP) <b>'.$check[0]->title.'</b> (<b>'.$check[0]->brand.'</b>) approved by '.$check[0]->me_role.' ('.$check[0]->me_name.').'.$noted.'<br /><br />Please login to <a href="'.base_url().'index.php/main/atp" style="color:#0079C0;text-decoration:none">Manage ATP</a> for more info.';
							
							$message = $this->ifunction->template_mail(array('subject' => $subject, 'name' => $check[0]->mngr_name, 'body' => $body));
							$this->db->insert('logs_email', array('type' => 'app', 'table' => $tpe[0], 'idx' => $dxx[0], 'subject' => $subject, 'message' => $message, 'to_email' => $check[0]->mngr_email, 'to_name' => $check[0]->mngr_name));
						}
					}
					endif;
				}
			}
			continue;
			
			case 'manager':
			if($tpe[0] == 'ss'){
				if($action==3){
					$this->db->update('ss_task', array('order_pmvendor' => 0, 'order_consultant' => 0, 'order_pmisat' => 0, 'user_delegator_pmvendor' => NULL, 'user_delegator_consultant' => NULL, 'user_delegator_pmisat' => NULL, 'fl_reject' => 1), array('task_id' => $dxx[0]));
					$this->db->delete('it_checkin', array('table' => 'ss', 'idx' => $dxx[0]));
				}elseif($action==4){
					$this->db->update('ss_task', array('user_delegator_consultant' => $user), array('task_id' => $dxx[0]));
				}else{
					$this->db->update('ss_task', array('order_consultant' => 1, 'order_pmisat' => 3), array('task_id' => $dxx[0]));
				}
				
				if($action <> 4) $this->db->insert('it_log_app', array('table' => 'ss', 'idx' => $dxx[0], 'user_id' => $_SESSION['isat']['uid'], 'action' => $action, 'note' => $note, 'timelog'  => time()));
				die($this->ifunction->action_response(2, 'iforms_f1', 'warning-box', 'Task action submitted, please wait..'));
			}else{
				if($action==3){
					$act = 1;
					$actions=0;
					
					$r_val = '';
					$r_uid_down = 'uid_supervisor';
					$r_msg_down = 'msg_supervisor';
					$r_uid_delegate = 'uid_supervisor_delegate';
					$r_msg_delegate = 'msg_supervisor_delegate';
					
					$this->db->query("UPDATE `$table` SET `order_manager`=2 WHERE `$field`=$dxx[0]");
					$this->db->query("UPDATE `$table` SET `order_supervisor`=3 WHERE `$field`=$dxx[0]");
					
					$Qcheck = $this->db->query("
						SELECT a.`title`, a.`brand`, b.`name` AS `me_name`, c.`name` AS `me_role`, d.`name` AS `spv_name`, d.`email` AS `spv_email`
						FROM `$table` a
						JOIN `it_user` b ON b.`user_id`='".$_SESSION['isat']['uid']."'
						JOIN `it_role` c ON c.`role_id`=b.`role_id`
						LEFT JOIN `it_user` d ON d.`user_id`=a.`user_supervisor`
						WHERE a.`$field`='$dxx[0]'
					");
					if($Qcheck->num_rows){
						$check = $Qcheck->result_object();
						if($check[0]->spv_email){
							if($note) $noted = '<br /><br />This is reject message from him:<br />"<font color="#C88B21">'.$note.'</font>"'; else $noted = '';
							$subject = 'ATP Task (Rejected by '.$check[0]->me_role.')';
							$body = 'Notified that the "Acceptance Test Procedure" (ATP) <b>'.$check[0]->title.'</b> (<b>'.$check[0]->brand.'</b>) rejected by '.$check[0]->me_role.' ('.$check[0]->me_name.').'.$noted.'<br /><br />Please login to <a href="'.base_url().'index.php/main/atp" style="color:#0079C0;text-decoration:none">Manage ATP</a> for more info.';
							
							$message = $this->ifunction->template_mail(array('subject' => $subject, 'name' => $check[0]->spv_name, 'body' => $body));
							$this->db->insert('logs_email', array('type' => 'app', 'table' => $tpe[0], 'idx' => $dxx[0], 'subject' => $subject, 'message' => $message, 'to_email' => $check[0]->spv_email, 'to_name' => $check[0]->spv_name));
						}
					}
				}else{
					$act = 0;
					$actions=4;
					
					if($action <> 4):
					
					$this->db->query("UPDATE `$table` SET `order_manager`=1 WHERE `$field`=$dxx[0]");
					$this->db->query("UPDATE `$table` SET `order_indosat`=3 WHERE `$field`=$dxx[0]");
					
					$Qcheck = $this->db->query("
						SELECT a.`title`, a.`brand`, b.`name` AS `me_name`, c.`name` AS `me_role`, d.`name` AS `isat_name`, d.`email` AS `isat_email`
						FROM `$table` a
						JOIN `it_user` b ON b.`user_id`='".$_SESSION['isat']['uid']."'
						JOIN `it_role` c ON c.`role_id`=b.`role_id`
						LEFT JOIN `it_user` d ON d.`user_id`=a.`user_indosat`
						WHERE a.`$field`='$dxx[0]'
					");
					if($Qcheck->num_rows){
						$check = $Qcheck->result_object();
						if($check[0]->isat_email){
							if($note) $noted = '<br /><br />This is some message from him:<br />"<font color="#C88B21">'.$note.'</font>"'; else $noted = '';
							$subject = 'ATP Task (Approved by '.$check[0]->me_role.')';
							$body = 'Notified that the "Acceptance Test Procedure" (ATP) <b>'.$check[0]->title.'</b> (<b>'.$check[0]->brand.'</b>) approved by '.$check[0]->me_role.' ('.$check[0]->me_name.').'.$noted.'<br /><br />Please login to <a href="'.base_url().'index.php/main/atp" style="color:#0079C0;text-decoration:none">Manage ATP</a> for more info.';
							
							$message = $this->ifunction->template_mail(array('subject' => $subject, 'name' => $check[0]->isat_name, 'body' => $body));
							$this->db->insert('logs_email', array('type' => 'app', 'table' => $tpe[0], 'idx' => $dxx[0], 'subject' => $subject, 'message' => $message, 'to_email' => $check[0]->isat_email, 'to_name' => $check[0]->isat_name));
						}
					}
					endif;
				}
			}
			continue;
			
			case 'indosat':
			if($tpe[0] == 'ss'){
				if($action==3){
					$this->db->update('ss_task', array('order_pmvendor' => 0, 'order_consultant' => 0, 'order_pmisat' => 0, 'user_delegator_pmvendor' => NULL, 'user_delegator_consultant' => NULL, 'user_delegator_pmisat' => NULL, 'fl_reject' => 1), array('task_id' => $dxx[0]));
					$this->db->delete('it_checkin', array('table' => 'ss', 'idx' => $dxx[0]));
				}elseif($action==4){
					$this->db->update('ss_task', array('user_delegator_pmisat' => $user), array('task_id' => $dxx[0]));
				}else{
					$this->db->update('ss_task', array('order_pmisat' => 1), array('task_id' => $dxx[0]));
				}
				
				if($action <> 4) $this->db->insert('it_log_app', array('table' => 'ss', 'idx' => $dxx[0], 'user_id' => $_SESSION['isat']['uid'], 'action' => $action, 'note' => $note, 'timelog'  => time()));
				die($this->ifunction->action_response(2, 'iforms_f1', 'warning-box', 'Task action submitted, please wait..'));
			}else{
				if($action==3){
					$act = 1;
					if($tpe[0] == 'atp'){
						if($dxx[1]) $actions=2; else $actions=0;
					}
					else $actions=4;
					
					$r_val = '';
					if($tpe[0] == 'atp'){
						
						if($dxx[1]){
							$r_uid_down = 'uid_manager';
							$r_msg_down = 'msg_manager';
							$r_uid_delegate = 'uid_manager_delegate';
							$r_msg_delegate = 'msg_manager_delegate';
							$this->db->query("UPDATE `$table` SET `order_manager`=3 WHERE `$field`=$dxx[0]");
							$mngr = 'user_manager';
						}else{
							$r_uid_down = 'uid_supervisor';
							$r_msg_down = 'msg_supervisor';
							$r_uid_delegate = 'uid_supervisor_delegate';
							$r_msg_delegate = 'msg_supervisor_delegate';
							$this->db->query("UPDATE `$table` SET `order_supervisor`=3 WHERE `$field`=$dxx[0]");
							$mngr = 'user_supervisor';
						}
						
						$this->db->query("UPDATE `$table` SET `order_indosat`=2 WHERE `$field`=$dxx[0]");
						
						$Qcheck = $this->db->query("
							SELECT a.`title`, a.`brand`, b.`name` AS `me_name`, c.`name` AS `me_role`, d.`name` AS `mngr_name`, d.`email` AS `mngr_email`
							FROM `$table` a
							JOIN `it_user` b ON b.`user_id`='".$_SESSION['isat']['uid']."'
							JOIN `it_role` c ON c.`role_id`=b.`role_id`
							LEFT JOIN `it_user` d ON d.`user_id`=a.`$mngr`
							WHERE a.`$field`='$dxx[0]'
						");
						if($Qcheck->num_rows){
							$check = $Qcheck->result_object();
							if($check[0]->mngr_email){
								if($note) $noted = '<br /><br />This is reject message from him:<br />"<font color="#C88B21">'.$note.'</font>"'; else $noted = '';
								$subject = 'ATP Task (Rejected by '.$check[0]->me_role.')';
								$body = 'Notified that the "Acceptance Test Procedure" (ATP) <b>'.$check[0]->title.'</b> (<b>'.$check[0]->brand.'</b>) rejected by '.$check[0]->me_role.' ('.$check[0]->me_name.').'.$noted.'<br /><br />Please login to <a href="'.base_url().'index.php/main/atp" style="color:#0079C0;text-decoration:none">Manage ATP</a> for more info.';
								
								$message = $this->ifunction->template_mail(array('subject' => $subject, 'name' => $check[0]->mngr_name, 'body' => $body));
								$this->db->insert('logs_email', array('type' => 'app', 'table' => $tpe[0], 'idx' => $dxx[0], 'subject' => $subject, 'message' => $message, 'to_email' => $check[0]->mngr_email, 'to_name' => $check[0]->mngr_name));
							}
						}
					}else{
						$r_msg_down = 'msg_nom';
						//$this->db->update('it_atm', array('order_indosat' => 2, 'order_nom' => 3), array('atm_id' => $dxx[0]));
						$this->db->update('it_atm', array('atf_date' => NULL, 'msg_wh' => NULL, 'msg_nom' => NULL, 'msg_vendor' => NULL, 'msg_consultant' => NULL, 'msg_indosat' => NULL, 'order_wh' => 0, 'order_nom' => 0, 'order_vendor' => 0, 'order_consultant' => 0, 'order_indosat' => 0, 'fl_barcode' => 0, 'fl_checkin' => 0, 'fl_approve' => 0), array('atm_id' => $dxx[0]));
						$this->db->delete('it_checkin', array('table' => 'atm', 'idx' => $dxx[0]));
						
						//email atm
					}
				}else{
					$act = 0;
					if($tpe[0] == 'atp') $actions=6; else $actions=5;
					
					if($action <> 4):
					$this->db->query("UPDATE `$table` SET `order_indosat`=1 WHERE `$field`=$dxx[0]");
					
					if($tpe[0] == 'atp'){
						$Qcheck = $this->db->query("
							SELECT a.`title`, a.`brand`, b.`name` AS `me_name`, c.`name` AS `me_role`, d.`name` AS `own_name`, d.`email` AS `own_email`, e.`name` AS `spv_name`, e.`email` AS `spv_email`, f.`name` AS `mngr_name`, f.`email` AS `mngr_email`
							FROM `$table` a
							JOIN `it_user` b ON b.`user_id`='".$_SESSION['isat']['uid']."'
							JOIN `it_role` c ON c.`role_id`=b.`role_id`
							LEFT JOIN `it_user` d ON d.`user_id`=a.`owner_id`
							LEFT JOIN `it_user` e ON e.`user_id`=a.`user_supervisor`
							LEFT JOIN `it_user` f ON f.`user_id`=a.`user_manager`
							WHERE a.`$field`='$dxx[0]'
						");
						if($Qcheck->num_rows){
							$check = $Qcheck->result_object();
							if($note) $noted = '<br /><br />This is some message from him:<br />"<font color="#C88B21">'.$note.'</font>"'; else $noted = '';
							$subject = 'ATP Task (Approved by '.$check[0]->me_role.')';
							$body = 'Notified that the "Acceptance Test Procedure" (ATP) <b>'.$check[0]->title.'</b> (<b>'.$check[0]->brand.'</b>) approved by '.$check[0]->me_role.' ('.$check[0]->me_name.').'.$noted.'<br /><br />Please login to <a href="'.base_url().'index.php/main/atp" style="color:#0079C0;text-decoration:none">Manage ATP</a> for more info.';
							
							if($check[0]->own_email){
								$message = $this->ifunction->template_mail(array('subject' => $subject, 'name' => $check[0]->own_name, 'body' => $body));
								$this->db->insert('logs_email', array('type' => 'app', 'table' => $tpe[0], 'idx' => $dxx[0], 'subject' => $subject, 'message' => $message, 'to_email' => $check[0]->own_email, 'to_name' => $check[0]->own_name));
							}
							
							if($check[0]->spv_email){
								$message = $this->ifunction->template_mail(array('subject' => $subject, 'name' => $check[0]->spv_name, 'body' => $body));
								$this->db->insert('logs_email', array('type' => 'app', 'table' => $tpe[0], 'idx' => $dxx[0], 'subject' => $subject, 'message' => $message, 'to_email' => $check[0]->spv_email, 'to_name' => $check[0]->spv_name));
							}
							
							if($check[0]->mngr_email){
								$message = $this->ifunction->template_mail(array('subject' => $subject, 'name' => $check[0]->mngr_name, 'body' => $body));
								$this->db->insert('logs_email', array('type' => 'app', 'table' => $tpe[0], 'idx' => $dxx[0], 'subject' => $subject, 'message' => $message, 'to_email' => $check[0]->mngr_email, 'to_name' => $check[0]->mngr_name));
							}
						}
					}else{
						$this->db->update('it_atm', array('order_indosat' => 1), array('atm_id' => $dxx[0]));
						
						//email atm
					}
					endif;
				}
			}
			continue;
		}
		
		$r_uid_delegate_now = 'uid_'.$tpe[2].'_delegate';
		$r_msg_delegate_now = 'msg_'.$tpe[2].'_delegate';
		
		if($action==4){
			if($tpe[0] == 'atp') $fields=array($delegated => $user, $owner => $_SESSION['isat']['uid']); else $fields=array($delegated => $user);
		}
		elseif($action==3){
			if($tpe[0] == 'atp')
			$fields=array(
				'fl_reject' => $act,
				'fl_approve' => $actions,
				$r_uid_down => $r_val,
				$r_msg_down => $r_val,
				$r_uid_delegate => $r_val,
				$r_msg_delegate => $r_val,
				$r_uid_delegate_now => '',
				$r_msg_delegate_now => '',
				$owner => $_SESSION['isat']['uid'],
				$msg => $notes
			);
			else
			$fields=array(
				'atf_date' => NULL,
				'uid_nom_delegate' => NULL,
				'uid_vendor_delegate' => NULL,
				'uid_consultant_delegate' => NULL,
				'uid_indosat_delegate' => NULL,
				'msg_wh' => NULL,
				'msg_nom' => NULL,
				'msg_vendor' => NULL,
				'msg_consultant' => NULL,
				'msg_indosat' => NULL,
				'order_wh' => 0,
				'order_nom' => 0,
				'order_vendor' => 0,
				'order_consultant' => 0,
				'order_indosat' => 0,
				'fl_barcode' => 0,
				'fl_checkin' => 0,
				'fl_approve' => 0,
				'fl_reject' => 1
			);
			/*$fields=array(
				'fl_reject' => $act,
				'fl_approve' => $actions,
				$r_msg_down => $r_val,
				$msg => $notes
			);*/
		}
		else
		$fields=array(
			'fl_reject' => $act,
			'fl_approve' => $actions,
			$owner => $_SESSION['isat']['uid'],
			$msg => $notes
		);
		
		$this->db->update($table, $fields, array($field => $dxx[0]));
		if($action <> 4) $this->db->insert('it_log_app', array('table' => $tpe[0], 'idx' => $dxx[0], 'user_id' => $_SESSION['isat']['uid'], 'action' => $action, 'note' => $note, 'timelog'  => time()));
		
		echo $this->ifunction->action_response(2, 'iforms_f1', 'warning-box', 'Task action submitted, please wait..');
	}
	
	public function delegate($tp, $dx)
	{
		if(empty($_SESSION['isat']['log'])) exit('Session expired! '.anchor('process/logout', '[Logout]'));
		extract($_POST);
		
		$tpe = explode('_', $tp);
		$table = 'it_'.$tpe[0];
		$field = $tpe[0].'_id';
		
		if($tpe[0] == 'atp'):
		switch($tpe[2]){
			case 'supervisor':
			if($action==3){
				$act = 1;
				$actions=0;
				
				$Qlist = $this->db->query("
					SELECT a.`title`, b.`name`, b.`email`, c.`name` AS `from_name`
					FROM `$table` a
					JOIN `it_user` b ON b.`user_id`=a.`uid_supervisor`
					JOIN `it_user` c ON c.`user_id`='".$_SESSION['isat']['uid']."'
					WHERE a.`$field`='$dx'
				");
				foreach($Qlist->result_object() as $list){
					$message='<p>Kepada '.$list->name.',<br>ATP Task (<i>'.$list->title.'</i>) telah di <b>Reject</b> oleh: '.$list->from_name.' (Delegator).</p><p>Silakan login ke <a href="'.base_url().'index.php/main/atp" style="color:#0079C0;text-decoration:none">Manage ATP</a>.</p>';
					if($list->email) $this->db->insert('logs_email', array('type' => 'delegate', 'table' => $tpe[0], 'idx' => $dx, 'subject' => 'ATP Task (Rejected - Delegator)', 'message' => $message, 'to_email' => $list->email, 'to_name' => $list->name));
				}
			}else{
				$act = 0;
				$actions=1;
				
				$Qlist = $this->db->query("
					SELECT a.`title`, b.`name`, b.`email`, c.`name` AS `from_name`
					FROM `$table` a
					JOIN `it_user` b ON b.`user_id`=a.`uid_supervisor`
					JOIN `it_user` c ON c.`user_id`='".$_SESSION['isat']['uid']."'
					WHERE a.`$field`='$dx'
				");
				foreach($Qlist->result_object() as $list){
					$message='<p>Kepada '.$list->name.',<br>ATP Task (<i>'.$list->title.'</i>) telah di <b>Approve</b> oleh: '.$list->from_name.' (Delegator).</p><p>Silakan login ke <a href="'.base_url().'index.php/main/atp" style="color:#0079C0;text-decoration:none">Manage ATP</a>.</p>';
					if($list->email) $this->db->insert('logs_email', array('type' => 'delegate', 'table' => $tpe[0], 'idx' => $dx, 'subject' => 'ATP Task (Approved - Delegator)', 'message' => $message, 'to_email' => $list->email, 'to_name' => $list->name));
				}
			}
			continue;
			
			case 'manager':
			if($action==3){
				$act = 1;
				$actions=2;
				
				$Qlist = $this->db->query("
					SELECT a.`title`, b.`name`, b.`email`, c.`name` AS `from_name`
					FROM `$table` a
					JOIN `it_user` b ON b.`user_id`=a.`uid_manager`
					JOIN `it_user` c ON c.`user_id`='".$_SESSION['isat']['uid']."'
					WHERE a.`$field`='$dx'
				");
				foreach($Qlist->result_object() as $list){
					$message='<p>Kepada '.$list->name.',<br>ATP Task (<i>'.$list->title.'</i>) telah di <b>Reject</b> oleh: '.$list->from_name.' (Delegator).</p><p>Silakan login ke <a href="'.base_url().'index.php/main/atp" style="color:#0079C0;text-decoration:none">Manage ATP</a>.</p>';
					if($list->email) $this->db->insert('logs_email', array('type' => 'delegate', 'table' => $tpe[0], 'idx' => $dx, 'subject' => 'ATP Task (Rejected - Delegator)', 'message' => $message, 'to_email' => $list->email, 'to_name' => $list->name));
				}
			}else{
				$act = 0;
				$actions=3;
				
				$Qlist = $this->db->query("
					SELECT a.`title`, b.`name`, b.`email`, c.`name` AS `from_name`
					FROM `$table` a
					JOIN `it_user` b ON b.`user_id`=a.`uid_manager`
					JOIN `it_user` c ON c.`user_id`='".$_SESSION['isat']['uid']."'
					WHERE a.`$field`='$dx'
				");
				foreach($Qlist->result_object() as $list){
					$message='<p>Kepada '.$list->name.',<br>ATP Task (<i>'.$list->title.'</i>) telah di <b>Approve</b> oleh: '.$list->from_name.' (Delegator).</p><p>Silakan login ke <a href="'.base_url().'index.php/main/atp" style="color:#0079C0;text-decoration:none">Manage ATP</a>.</p>';
					if($list->email) $this->db->insert('logs_email', array('type' => 'delegate', 'table' => $tpe[0], 'idx' => $dx, 'subject' => 'ATP Task (Approved - Delegator)', 'message' => $message, 'to_email' => $list->email, 'to_name' => $list->name));
				}
			}
			continue;
			
			case 'indosat':
			if($action==3){
				$act = 1;
				$actions=4;
				
				$Qlist = $this->db->query("
					SELECT a.`title`, b.`name`, b.`email`, c.`name` AS `from_name`
					FROM `$table` a
					JOIN `it_user` b ON b.`user_id`=a.`uid_indosat`
					JOIN `it_user` c ON c.`user_id`='".$_SESSION['isat']['uid']."'
					WHERE a.`$field`='$dx'
				");
				foreach($Qlist->result_object() as $list){
					$message='<p>Kepada '.$list->name.',<br>ATP Task (<i>'.$list->title.'</i>) telah di <b>Reject</b> oleh: '.$list->from_name.' (Delegator).</p><p>Silakan login ke <a href="'.base_url().'index.php/main/atp" style="color:#0079C0;text-decoration:none">Manage ATP</a>.</p>';
					if($list->email) $this->db->insert('logs_email', array('type' => 'delegate', 'table' => $tpe[0], 'idx' => $dx, 'subject' => 'ATP Task (Rejected - Delegator)', 'message' => $message, 'to_email' => $list->email, 'to_name' => $list->name));
				}
			}else{
				$act = 0;
				$actions=5;
				
				$Qlist = $this->db->query("
					SELECT a.`title`, b.`name`, b.`email`, c.`name` AS `from_name`
					FROM `$table` a
					JOIN `it_user` b ON b.`user_id`=a.`uid_indosat`
					JOIN `it_user` c ON c.`user_id`='".$_SESSION['isat']['uid']."'
					WHERE a.`$field`='$dx'
				");
				foreach($Qlist->result_object() as $list){
					$message='<p>Kepada '.$list->name.',<br>ATP Task (<i>'.$list->title.'</i>) telah di <b>Approve</b> oleh: '.$list->from_name.' (Delegator).</p><p>Silakan login ke <a href="'.base_url().'index.php/main/atp" style="color:#0079C0;text-decoration:none">Manage ATP</a>.</p>';
					if($list->email) $this->db->insert('logs_email', array('type' => 'delegate', 'table' => $tpe[0], 'idx' => $dx, 'subject' => 'ATP Task (Approved - Delegator)', 'message' => $message, 'to_email' => $list->email, 'to_name' => $list->name));
				}
			}
			continue;
		}
		
		$uid = 'uid_'.$tpe[2].'_delegate';
		$msg = 'msg_'.$tpe[2].'_delegate';
		
		$fields=array(
			'fl_reject' => $act,
			'fl_approve' => $actions,
			$uid => '',
			$msg => ''
		);
		$this->db->update('it_atp', $fields, array('atp_id' => $dx));
		
		elseif($tpe[0] == 'atm'):
		$uid = 'uid_'.$tpe[2].'_delegate';
		$this->db->update('it_atm', array($uid => NULL), array('atm_id' => $dx));
		
		//email delegate to 
		else: 
		switch($tpe[2]){
			case 'supervisor':
			$this->db->update('ss_task', array('user_delegator_pmvendor' => NULL), array('task_id' => $dx));
			break;
			
			case 'manager':
			$this->db->update('ss_task', array('user_delegator_consultant' => NULL), array('task_id' => $dx));
			break;
			
			case 'indosat':
			$this->db->update('ss_task', array('user_delegator_pmisat' => NULL), array('task_id' => $dx));
			break;
		}
		endif;
		
		if(empty($note)) $note = NULL;
		$this->db->insert('it_log_app', array('table' => $tpe[0], 'idx' => $dx, 'user_id' => $_SESSION['isat']['uid'], 'action' => $action, 'note' => $note, 'timelog'  => time()));
		echo $this->ifunction->action_response(2, 'iforms_f1', 'warning-box', 'Task action submitted, please wait..');
	}
	
	public function add_site()
	{
		if(empty($_SESSION['isat']['log'])) exit('Session expired! '.anchor('process/logout', '[Logout]'));
		if(!in_array($_SESSION['isat']['role'], array('1', '2', '5'), true)) die(':P');
		
		extract($_POST);
		if($id && $name && $latitude && $longitude){
			
			if($tp == 'site') $tps = 'Site'; else $tps = 'Warehouse';
			$Qcheck = $this->db->query("SELECT 1 FROM `it_site` WHERE `id`='$id'");
			if($Qcheck->num_rows) die($this->ifunction->slidedown_response('iforms_f1', 'error-box', $tps.' ID already exist.'));
			
			$fields=array(
				'type' => $tp,
				'id' => $id,
				'name' => $name,
				'address' => $address,
				'city' => $city,
				'province' => $province,
				'latitude' => $latitude,
				'longitude' => $longitude
			);
			$this->db->insert('it_site', $fields);
			
			echo $this->ifunction->action_response(2, 'iforms_f1', 'warning-box', 'Add '.$tp.' successful, please wait..');
		}
		else echo $this->ifunction->slidedown_response('iforms_f1', 'error-box', 'Please complete the form below.');
	}
	
	public function ed_site($dx)
	{
		if(empty($_SESSION['isat']['log'])) exit('Session expired! '.anchor('process/logout', '[Logout]'));
		if(!in_array($_SESSION['isat']['role'], array('1', '5'), true)) die(':P');
		
		extract($_POST);
		if($id && $name && $latitude && $longitude){
			
			if($tp == 'site') $tps = 'Site'; else $tps = 'Warehouse';
			//$Qcheck = $this->db->query("SELECT 1 FROM `it_site` WHERE `id`='$id' AND `site_id` <> '$dx'");
			//if($Qcheck->num_rows) die($this->ifunction->slidedown_response('iforms_f1', 'error-box', $tps.' ID already exist.'));
			
			$fields=array(
				'type' => $tp,
				'id' => $id,
				'name' => $name,
				'address' => $address,
				'city' => $city,
				'province' => $province,
				'latitude' => $latitude,
				'longitude' => $longitude
			);
			$this->db->update('it_site', $fields, array('site_id' => $dx));
			
			echo $this->ifunction->action_response(2, 'iforms_f1', 'warning-box', 'Changes saved, please wait..');
		}
		else echo $this->ifunction->slidedown_response('iforms_f1', 'error-box', 'Please complete the form below.');
	}
	
	public function add_neid($dx)
	{
		if(empty($_SESSION['isat']['log'])) exit('Session expired! '.anchor('process/logout', '[Logout]'));
		if(!in_array($_SESSION['isat']['role'], array('1', '2', '5'), true)) die(':P');
		extract($_POST);
		
		if($neid[0] || $neid[1] || $neid[2]){
			
			$idx = explode('.', $dx);
			for($i = 0; $i < 3; $i++){
				if($neid[$i]):
				$Qcheck = $this->db->query("SELECT 1 FROM `it_network` WHERE `neid`='".$neid[$i]."' AND `id`='".$idx[0]."'");
				if(!$Qcheck->num_rows) $this->db->insert('it_network', array('neid' => $neid[$i], 'id' => $idx[1]));
				endif;
			}
			
			echo $this->ifunction->action_response(1, 'iforms_f1', 'warning-box', 'Add Network ID successful, please wait..');
		}
		else echo $this->ifunction->slidedown_response('iforms_f1', 'error-box', 'Please complete the form below.');
	}
	
	public function boq_dpack($dx)
	{
		if(empty($_SESSION['isat']['log'])) exit('Session expired! '.anchor('process/logout', '[Logout]'));
		
		/*if($_SESSION['isat']['uid'] == '736513538700133117492103'){
			print_r($_FILES);
			die();
		}*/
		
		$arr_brand = array('miniMCE', 'atpFilter', 'atpPowersupply', 'ericsson2G', 'ericsson3G', 'ericssonMicrowave', 'zteMicrowave', 'zte2G', 'zte3G'/*, 'startupPowersupply', 'testPowersupply'*/);
		$file_allowed = array('image/gif', 'image/png', 'image/x-png', 'image/jpg', 'image/jpeg', 'image/pjpeg', 'application/pdf');		
		
		for($i=0; $i < 9; $i++){
			
			$boq = 'boq_'.$arr_brand[$i];
			$old_boq = 'old_'.$boq;
			$dpc = 'dpc_'.$arr_brand[$i];
			$old_dpc = 'old_'.$dpc;
			
			if(isset($_FILES[$boq]['name']) && $_FILES[$boq]['tmp_name']){
				if(in_array($_FILES[$boq]['type'], $file_allowed, true)):
		
				$fileext = explode('.', $_FILES[$boq]['name']);
				$file_ext = strtolower(end($fileext));
				
				$new_name = date("YmdHms").'_'.rand(100, 999);
				$new_file_name = $new_name.'.'.$file_ext;
				
				$file_path = './media/files/'.$new_file_name;
				move_uploaded_file($_FILES[$boq]['tmp_name'], $file_path);
				
				if($_FILES[$boq]['type'] <> 'application/pdf'){
					
					list($wd, $ht) = getimagesize($file_path);
					if($wd):
				
					if(($file_ext == 'gif')||($file_ext == 'png')){
						$this->ifunction->convert_to_jpg($file_path, './media/files/'.$new_name.'.jpg', $file_ext);
						$new_file_name = $new_name.'.jpg';
						$this->ifunction->un_link($file_path);
					}
					
					list($width, $height) = getimagesize('./media/files/'.$new_file_name);
					if($width > 700) $this->ifunction->resize_jpg('./media/files/'.$new_file_name, './media/files/'.$new_file_name, 700);
					
					file_put_contents('./media/files/'.$new_name.'.pdf', $this->ifunction->curl(base_url().'index.php/process/pdf/export/core/'.$_SESSION['isat']['uid'].'/'.$dx.'/1/'.$new_file_name));
					$this->ifunction->un_link('./media/files/'.$new_file_name);
					
					else: $this->ifunction->un_link($file_path); endif;
				}
				
				if(file_exists('./media/files/'.$new_name.'.pdf')){
					if(isset($old_boq)){
						$this->ifunction->un_link('./media/files/'.$_POST[$old_boq]);
						$this->db->delete("it_attachment", array('idx' => $dx, 'table' => $boq));
					}
					
					$this->db->insert("it_attachment", array('idx' => $dx, 'table' => $boq, 'files' => $new_name.'.pdf', 'user_id' => $_SESSION['isat']['uid'], 'timelog' => time()));
					
					$valid = 1;
				}
				endif;
				$have = 1;
			}
			
			//
			
			if(isset($_FILES[$dpc]['name']) && $_FILES[$dpc]['tmp_name']){
				if(in_array($_FILES[$dpc]['type'], $file_allowed, true)):
		
				$fileext = explode('.', $_FILES[$dpc]['name']);
				$file_ext = strtolower(end($fileext));
				
				$new_name = date("YmdHms").'_'.rand(100, 999);
				$new_file_name = $new_name.'.'.$file_ext;
				
				$file_path = './media/files/'.$new_file_name;
				move_uploaded_file($_FILES[$dpc]['tmp_name'], $file_path);
				
				if($_FILES[$dpc]['type'] <> 'application/pdf'){
					
					list($wd, $ht) = getimagesize($file_path);
					if($wd):
				
					if(($file_ext == 'gif')||($file_ext == 'png')){
						$this->ifunction->convert_to_jpg($file_path, './media/files/'.$new_name.'.jpg', $file_ext);
						$new_file_name = $new_name.'.jpg';
						$this->ifunction->un_link($file_path);
					}
					
					list($width, $height) = getimagesize('./media/files/'.$new_file_name);
					if($width > 700) $this->ifunction->resize_jpg('./media/files/'.$new_file_name, './media/files/'.$new_file_name, 700);
					
					file_put_contents('./media/files/'.$new_name.'.pdf', $this->ifunction->curl(base_url().'index.php/process/pdf/export/core/'.$_SESSION['isat']['uid'].'/'.$dx.'/1/'.$new_file_name));
					$this->ifunction->un_link('./media/files/'.$new_file_name);
					
					else: $this->ifunction->un_link($file_path); endif;
				}
				
				if(file_exists('./media/files/'.$new_name.'.pdf')){
					if(isset($old_dpc)){
						$this->ifunction->un_link('./media/files/'.$_POST[$old_dpc]);
						$this->db->delete("it_attachment", array('idx' => $dx, 'table' => $dpc));
					}
					
					$this->db->insert("it_attachment", array('idx' => $dx, 'table' => $dpc, 'files' => $new_name.'.pdf', 'user_id' => $_SESSION['isat']['uid'], 'timelog' => time()));
					
					$valid = 1;
				}
				endif;
				$have = 1;
			}
		}
		
		if(isset($have)){
			if(isset($valid)) echo $this->ifunction->action_response(1, 'iforms_f1', 'warning-box', 'Upload file(s) successful,.'); else echo $this->ifunction->slidedown_response('iforms_f1', 'error-box', 'File(s) format is not supported.');
		}
		else echo $this->ifunction->slidedown_response('iforms_f1', 'error-box', 'Please complete the form below.');
	}
	
	public function site_attachment($tp, $dx)
	{
		if(empty($_SESSION['isat']['log'])) exit('Session expired! '.anchor('process/logout', '[Logout]'));
		
		$arr_brand = array('miniMCE', 'atpFilter', 'atpPowersupply', 'ericsson2G', 'ericsson3G', 'ericssonMicrowave', 'zteMicrowave', 'zte2G', 'zte3G'/*, 'startupPowersupply', 'testPowersupply'*/);
		$file_allowed = array('image/gif', 'image/png', 'image/x-png', 'image/jpg', 'image/jpeg', 'image/pjpeg', 'application/pdf');
		
		for($i=0; $i < 9; $i++){
			
			$atc = 'atc_'.$arr_brand[$i];
			for($j=0; $j < 3; $j++){
				
				if(isset($_FILES[$atc]['name'][$j]) && $_FILES[$atc]['tmp_name'][$j]){
					if(in_array($_FILES[$atc]['type'][$j], $file_allowed, true)):
			
					$fileext = explode('.', $_FILES[$atc]['name'][$j]);
					$file_ext = strtolower(end($fileext));
					
					$new_name = date("YmdHms").'_'.rand(100, 999);
					$new_file_name = $new_name.'.'.$file_ext;
					
					$file_path = './media/files/'.$new_file_name;
					move_uploaded_file($_FILES[$atc]['tmp_name'][$j], $file_path);
					
					if($_FILES[$atc]['type'][$j] <> 'application/pdf'){
						
						list($wd, $ht) = getimagesize($file_path);
						if($wd):
					
						if(($file_ext == 'gif')||($file_ext == 'png')){
							$this->ifunction->convert_to_jpg($file_path, './media/files/'.$new_name.'.jpg', $file_ext);
							$new_file_name = $new_name.'.jpg';
							$this->ifunction->un_link($file_path);
						}
						
						list($width, $height) = getimagesize('./media/files/'.$new_file_name);
						if($width > 700) $this->ifunction->resize_jpg('./media/files/'.$new_file_name, './media/files/'.$new_file_name, 700);
						
						file_put_contents('./media/files/'.$new_name.'.pdf', $this->ifunction->curl(base_url().'index.php/process/pdf/export/core/'.$_SESSION['isat']['uid'].'/'.$dx.'/1/'.$new_file_name));
						$this->ifunction->un_link('./media/files/'.$new_file_name);
						
						else: $this->ifunction->un_link($file_path); endif;
					}
					
					if(file_exists('./media/files/'.$new_name.'.pdf')){
						$this->db->insert("it_attachment", array('idx' => $dx, 'table' => $atc, 'files' => $new_name.'.pdf', 'user_id' => $_SESSION['isat']['uid'], 'timelog' => time()));
						
						$valid = 1;
					}
					endif;
					$have = 1;
				}
				
			}
		}
		
		if(isset($have)){
			if(isset($valid)) echo $this->ifunction->action_response(1, 'iforms_f1', 'warning-box', 'Upload file(s) successful,.'); else echo $this->ifunction->slidedown_response('iforms_f1', 'error-box', 'File(s) format is not supported.');
		}
		else echo $this->ifunction->slidedown_response('iforms_f1', 'error-box', 'Please complete the form below.');
	}
	
	public function master_barcode($dx)
	{
		if(empty($_SESSION['isat']['log'])) exit('Session expired! '.anchor('process/logout', '[Logout]'));
		if(!in_array($_SESSION['isat']['role'], array('1', '2', '5'), true)) die(':P');
		
		if(isset($_FILES['file']['name'])){
			
			if(($_FILES['file']['type']=='application/x-msexcel') || ($_FILES['file']['type']=='application/vnd.ms-excel')){
				
				$gid = 0;
				
				$this->load->library('spreadsheet_excel_reader');
				$data_exc=new Spreadsheet_Excel_Reader($_FILES['file']['tmp_name']);
				$row_exc=$data_exc->rowcount($sheet_index=0);
				
				for($i=1; $i <= $row_exc; $i++){
					
					if($data_exc->val($i, 1)){
						$fields=array(
							'group_id' => $gid,
							'site_id' => $dx,
							'id' => $_POST['id'],
							'name' => $data_exc->val($i, 1),
							'barcode' => $data_exc->val($i, 2),
							'serial' => $data_exc->val($i, 3)
						);
						$this->db->insert('it_master_barcode', $fields);
						
						if(!$data_exc->val($i, 3) && $ms){
							$master_barcode_id = $this->db->insert_id();
							$this->db->update('it_master_barcode', array('group_id' => $master[0]->master_barcode_id, 'is_master' => 1), array('master_barcode_id' => $master_barcode_id));
							$gid = $master_barcode_id;
							$ms = 0;
						}
					}
					else $ms = 1;
					
				}
				
				echo $this->ifunction->action_response(1, 'iforms_f1', 'warning-box', 'Add Master Barcode successful,.');
			}
			else echo $this->ifunction->slidedown_response('iforms_f1', 'error-box', 'Invalid file template.');
		}
		else echo $this->ifunction->slidedown_response('iforms_f1', 'error-box', 'Please complete the form below.');
	}
	
	public function add_reports()
	{
		if(empty($_SESSION['isat']['log'])) exit('Session expired! '.anchor('process/logout', '[Logout]'));
		if($_SESSION['isat']['role'] <> 1) die(':P');
		if(isset($_FILES['file']['name']) && $_POST['title']){
			if($_FILES['file']['type'] == 'application/x-httpd-php') die($this->ifunction->slidedown_response('iforms_f1', 'error-box', 'Not allowed file!'));
			
			$fileext = explode('.', $_FILES['file']['name']);
			$file_ext = strtolower(end($fileext));
			
			$new_name = date("YmdHms").'_'.rand(100, 999);
			$new_file_name = $new_name.'.'.$file_ext;
			
			$file_path = './media/report/'.$new_file_name;
			move_uploaded_file($_FILES['file']['tmp_name'], $file_path);
			
			$this->db->insert('it_report', array('title' => $_POST['title'], 'file_name' => $_FILES['file']['name'], 'path' => $new_file_name));
			echo $this->ifunction->action_response(2, 'iforms_f1', 'warning-box', 'Add Report successful, please wait..');
		}
		else echo $this->ifunction->slidedown_response('iforms_f1', 'error-box', 'Please complete the form below.');
	}
	
	public function ed_reports($dx)
	{
		if(empty($_SESSION['isat']['log'])) exit('Session expired! '.anchor('process/logout', '[Logout]'));
		if($_SESSION['isat']['role'] <> 1) die(':P');
		if($_POST['title'] && $dx){
			if(isset($_FILES['file']['name'])){
				if($_FILES['file']['type'] == 'application/x-httpd-php') die($this->ifunction->slidedown_response('iforms_f1', 'error-box', 'Not allowed file!'));
				
				$fileext = explode('.', $_FILES['file']['name']);
				$file_ext = strtolower(end($fileext));
				
				$new_name = date("YmdHms").'_'.rand(100, 999);
				$new_file_name = $new_name.'.'.$file_ext;
				
				$file_path = './media/report/'.$new_file_name;
				move_uploaded_file($_FILES['file']['tmp_name'], $file_path);
				
				if($_POST['old']) $this->ifunction->un_link('./media/report/'.$_POST['old']);
				
				$this->db->update('it_report', array('title' => $_POST['title'], 'file_name' => $_FILES['file']['name'], 'path' => $new_file_name), array('report_id' => $dx));
			}
			else $this->db->update('it_report', array('title' => $_POST['title']), array('report_id' => $dx));
			echo $this->ifunction->action_response(2, 'iforms_f1', 'warning-box', 'Changes saved, please wait..');
		}
		else echo $this->ifunction->slidedown_response('iforms_f1', 'error-box', 'Please complete the form below.');
	}
	
	public function add_vendor()
	{
		if(empty($_SESSION['isat']['log'])) exit('Session expired! '.anchor('process/logout', '[Logout]'));
		if($_SESSION['isat']['role'] <> 1) die(':P');
		extract($_POST);
		if($name){
			$this->db->insert('it_vendor', array('vendor_id' => $this->ifunction->uid(), 'name' => $name));
			echo $this->ifunction->action_response(2, 'iforms_f1', 'warning-box', 'Add Vendor successful, please wait..');
		}
		else echo $this->ifunction->slidedown_response('iforms_f1', 'error-box', 'Please complete the form below.');
	}
	
	public function ed_vendor($dx)
	{
		if(empty($_SESSION['isat']['log'])) exit('Session expired! '.anchor('process/logout', '[Logout]'));
		if($_SESSION['isat']['role'] <> 1) die(':P');
		extract($_POST);
		if($name){
			$this->db->update('it_vendor', array('name' => $name), array('vendor_id' => $dx));
			echo $this->ifunction->action_response(2, 'iforms_f1', 'warning-box', 'Edit Vendor successful, please wait..');
		}
		else echo $this->ifunction->slidedown_response('iforms_f1', 'error-box', 'Please complete the form below.');
	}
	
	public function my_profile()
	{
		if(empty($_SESSION['isat']['uid'])) exit('Session expired! '.anchor('process/logout', '[Logout]'));
		extract($_POST);
		
		if($validate && $uname && $email && $name){
			
			if(!preg_match("/^[_\.0-9a-zA-Z-]+@([0-9a-zA-Z][0-9a-zA-Z-]+\.)+[a-zA-Z]{2,6}$/i", $email)) die($this->ifunction->slidedown_response('iforms_f1', 'error-box', 'Please enter a valid email address.'));
			
			if($password <> $confirm) die($this->ifunction->slidedown_response('iforms_f1', 'error-box', 'Confirmation password does not match.'));
			
			$Qcheck = $this->db->query("SELECT `user_id` FROM `it_user` WHERE `uname`='$uname' AND `user_id` <> '".$_SESSION['isat']['uid']."'");
			if($Qcheck->num_rows) die($this->ifunction->slidedown_response('iforms_f1', 'error-box', 'Username already taken.'));
			
			$Qvalidate = $this->db->query("SELECT `user_id` FROM `it_user` WHERE `user_id`='".$_SESSION['isat']['uid']."' AND `pswd`='".$this->ifunction->get_pswd($validate)."'");
			if(!$Qvalidate->num_rows) die($this->ifunction->slidedown_response('iforms_f1', 'error-box', 'Your password does not match.'));
			
			if(isset($_FILES['file']['name']) && $_FILES['file']['tmp_name']){
				
				$file_allowed = array('image/gif', 'image/png', 'image/x-png', 'image/jpg', 'image/jpeg', 'image/pjpeg');
				if(!in_array($_FILES['file']['type'], $file_allowed, true)) die($this->ifunction->slidedown_response('iforms_f1', 'error-box', 'Invalid signature file.'));
				
				$fileext = explode('.', $_FILES['file']['name']);
				$file_ext = strtolower(end($fileext));
				
				$new_name = date("YmdHms").'_'.rand(100, 999);
				$new_file_name = $new_name.'.'.$file_ext;
				
				$file_path = './media/files/'.$new_file_name;
				move_uploaded_file($_FILES['file']['tmp_name'], $file_path);
				
				list($wd, $ht) = getimagesize($file_path);
				if(!$wd){
					$this->ifunction->un_link($file_path);
					die($this->ifunction->slidedown_response('iforms_f1', 'error-box', 'Invalid signature file.'));
				}
				
				if(($file_ext == 'gif')||($file_ext == 'png')){
					$this->ifunction->convert_to_jpg($file_path, './media/files/'.$new_name.'.jpg', $file_ext);
					$new_file_name = $new_name.'.jpg';
					$this->ifunction->un_link($file_path);
				}
				
				$this->ifunction->resize_jpg('./media/files/'.$new_file_name, './media/files/'.$new_file_name, 150);
				$this->ifunction->un_link('./media/files/'.$old);
				
			}
			else $new_file_name = $old;
			
			if($password)
			$fields=array(
				'uname' => $uname,
				'pswd' => $this->ifunction->get_pswd($password),
				'name' => $name,
				'email' => $email,
				'sign_path' => $new_file_name
			);
			else
			$fields=array(
				'uname' => $uname,
				'name' => $name,
				'email' => $email,
				'sign_path' => $new_file_name
			);
			
			$_SESSION['isat']['name'] = $name;
			$this->db->update('it_user', $fields, array('user_id' => $_SESSION['isat']['uid']));
			
			echo $this->ifunction->action_response(1, 'iforms_f1', 'warning-box', 'Edit Profile successful, please wait..');
		}
		else echo $this->ifunction->slidedown_response('iforms_f1', 'error-box', 'Please complete the form below.');
	}
	
	public function add_user()
	{
		if(empty($_SESSION['isat']['log'])) exit('Session expired! '.anchor('process/logout', '[Logout]'));
		if($_SESSION['isat']['role'] <> 1) die(':P');
		extract($_POST);
		
		if($validate && $uname && $name && $email && $password && $confirm && $vendor){
			
			if($email) if(!preg_match("/^[_\.0-9a-zA-Z-]+@([0-9a-zA-Z][0-9a-zA-Z-]+\.)+[a-zA-Z]{2,6}$/i", $email)) die($this->ifunction->slidedown_response('iforms_f1', 'error-box', 'Please enter a valid email address.'));
			
			if($password <> $confirm) die($this->ifunction->slidedown_response('iforms_f1', 'error-box', 'Confirmation password does not match.'));
			
			$Qcheck = $this->db->query("SELECT `user_id` FROM `it_user` WHERE `uname`='$uname'");
			if($Qcheck->num_rows) die($this->ifunction->slidedown_response('iforms_f1', 'error-box', 'Username already taken.'));
			
			$Qvalidate = $this->db->query("SELECT `user_id` FROM `it_user` WHERE `user_id`='".$_SESSION['isat']['uid']."' AND `pswd`='".$this->ifunction->get_pswd($validate)."'");
			if(!$Qvalidate->num_rows) die($this->ifunction->slidedown_response('iforms_f1', 'error-box', 'Your password does not match.'));
			
			if(isset($_FILES['file']['name']) && $_FILES['file']['tmp_name']){
				
				$file_allowed = array('image/gif', 'image/png', 'image/x-png', 'image/jpg', 'image/jpeg', 'image/pjpeg');
				if(!in_array($_FILES['file']['type'], $file_allowed, true)) die($this->ifunction->slidedown_response('iforms_f1', 'error-box', 'Invalid signature file.'));
				
				$fileext = explode('.', $_FILES['file']['name']);
				$file_ext = strtolower(end($fileext));
				
				$new_name = date("YmdHms").'_'.rand(100, 999);
				$new_file_name = $new_name.'.'.$file_ext;
				
				$file_path = './media/files/'.$new_file_name;
				move_uploaded_file($_FILES['file']['tmp_name'], $file_path);
				
				list($wd, $ht) = getimagesize($file_path);
				if(!$wd){
					$this->ifunction->un_link($file_path);
					die($this->ifunction->slidedown_response('iforms_f1', 'error-box', 'Invalid signature file.'));
				}
				
				if(($file_ext == 'gif')||($file_ext == 'png')){
					$this->ifunction->convert_to_jpg($file_path, './media/files/'.$new_name.'.jpg', $file_ext);
					$new_file_name = $new_name.'.jpg';
					$this->ifunction->un_link($file_path);
				}
				
				$this->ifunction->resize_jpg('./media/files/'.$new_file_name, './media/files/'.$new_file_name, 150);
			}
			else $new_file_name = '';
			
			$fields=array(
				'user_id' => $this->ifunction->uid(),
				'uname' => $uname,
				'pswd' => $this->ifunction->get_pswd($password),
				'name' => $name,
				'email' => $email,
				'vendor_id' => $vendor,
				'role_id' => $role,
				'sign_path' => $new_file_name
			);
			$this->db->insert('it_user', $fields);
			
			echo $this->ifunction->action_response(2, 'iforms_f1', 'warning-box', 'Add User successful, please wait..');
		}
		else echo $this->ifunction->slidedown_response('iforms_f1', 'error-box', 'Please complete the form below.');
	}
	
	public function ed_user($dx)
	{
		if(empty($_SESSION['isat']['log'])) exit('Session expired! '.anchor('process/logout', '[Logout]'));
		if($_SESSION['isat']['role'] <> 1) die(':P');
		extract($_POST);
		
		if($validate && $uname && $email && $name && $vendor){
			
			if($email) if(!preg_match("/^[_\.0-9a-zA-Z-]+@([0-9a-zA-Z][0-9a-zA-Z-]+\.)+[a-zA-Z]{2,6}$/i", $email)) die($this->ifunction->slidedown_response('iforms_f1', 'error-box', 'Please enter a valid email address.'));
			
			if($password <> $confirm) die($this->ifunction->slidedown_response('iforms_f1', 'error-box', 'Confirmation password does not match.'));
			
			$Qcheck = $this->db->query("SELECT `user_id` FROM `it_user` WHERE `uname`='$uname' AND `user_id` <> '$dx'");
			if($Qcheck->num_rows) die($this->ifunction->slidedown_response('iforms_f1', 'error-box', 'Username already taken.'));
			
			$Qvalidate = $this->db->query("SELECT `user_id` FROM `it_user` WHERE `user_id`='".$_SESSION['isat']['uid']."' AND `pswd`='".$this->ifunction->get_pswd(strip_tags($validate))."'");
			if(!$Qvalidate->num_rows) die($this->ifunction->slidedown_response('iforms_f1', 'error-box', 'Your password does not match.'));
			
			if(isset($_FILES['file']['name']) && $_FILES['file']['tmp_name']){
				
				$file_allowed = array('image/gif', 'image/png', 'image/x-png', 'image/jpg', 'image/jpeg', 'image/pjpeg');
				if(!in_array($_FILES['file']['type'], $file_allowed, true)) die($this->ifunction->slidedown_response('iforms_f1', 'error-box', 'Invalid signature file.'));
				
				$fileext = explode('.', $_FILES['file']['name']);
				$file_ext = strtolower(end($fileext));
				
				$new_name = date("YmdHms").'_'.rand(100, 999);
				$new_file_name = $new_name.'.'.$file_ext;
				
				$file_path = './media/files/'.$new_file_name;
				move_uploaded_file($_FILES['file']['tmp_name'], $file_path);
				
				list($wd, $ht) = getimagesize($file_path);
				if(!$wd){
					$this->ifunction->un_link($file_path);
					die($this->ifunction->slidedown_response('iforms_f1', 'error-box', 'Invalid signature file.'));
				}
				
				if(($file_ext == 'gif')||($file_ext == 'png')){
					$this->ifunction->convert_to_jpg($file_path, './media/files/'.$new_name.'.jpg', $file_ext);
					$new_file_name = $new_name.'.jpg';
					$this->ifunction->un_link($file_path);
				}
				
				$this->ifunction->resize_jpg('./media/files/'.$new_file_name, './media/files/'.$new_file_name, 150);
				$this->ifunction->un_link('./media/files/'.$old);
				
			}
			else $new_file_name = $old;
			
			if($password)
			$fields=array(
				'uname' => $uname,
				'pswd' => $this->ifunction->get_pswd(strip_tags($password)),
				'name' => $name,
				'email' => $email,
				'vendor_id' => $vendor,
				'role_id' => $role,
				'sign_path' => $new_file_name
			);
			else
			$fields=array(
				'uname' => $uname,
				'name' => $name,
				'email' => $email,
				'vendor_id' => $vendor,
				'role_id' => $role,
				'sign_path' => $new_file_name
			);
			
			$_SESSION['isat']['vendor'] = $vendor;
			$this->db->update('it_user', $fields, array('user_id' => $dx));
			
			echo $this->ifunction->action_response(2, 'iforms_f1', 'warning-box', 'Edit User successful, please wait..');
		}
		else echo $this->ifunction->slidedown_response('iforms_f1', 'error-box', 'Please complete the form below.');
	}
	
	public function pdf($tp, $t, $id, $dx, $print=0, $cover=0)
	{
		if($tp == 'export'){
			
			ini_set('memory_limit', '-1');
			require_once "application/libraries/pdf/dompdf_config.inc.php";
			global $_dompdf_show_warnings, $_dompdf_debug, $_DOMPDF_DEBUG_TYPES;
			
			$sapi = php_sapi_name();
			$options = array();
				
			switch ( $sapi){
				
				case "cli":
				$opts = $this->ifunction->getoptions();
				
				if(isset($opts["h"]) || (!isset($opts["filename"]) && !isset($opts["l"]))) exit($this->ifunction->dompdf_usage());
				
				if(isset($opts["l"])){
					echo "\nUnderstood paper sizes:\n";
					foreach (array_keys(CPDF_Adapter::$PAPER_SIZES) as $size)
					echo "  " . mb_strtoupper($size) . "\n";
					exit;
				}
				
				$file = $opts["filename"];
				if(isset($opts["p"])) $paper = $opts["p"]; else $paper = DOMPDF_DEFAULT_PAPER_SIZE;
				if(isset($opts["o"])) $orientation = $opts["o"]; else $orientation = "portrait";
				if(isset($opts["b"])) $base_path = $opts["b"];
				
				if(isset($opts["f"])) $outfile = $opts["f"];
				else {
					if($file === "-") $outfile = "dompdf_out.pdf"; else $outfile = str_ireplace(array(".html", ".htm", ".php"), "", $file) . ".pdf";
				}
				
				if(isset($opts["v"])) $_dompdf_show_warnings = true;
				
				if(isset($opts["d"])){
					$_dompdf_show_warnings = true;
					$_dompdf_debug = true;
				}
				
				if(isset($opts['t'])){
					$arr = split(',',$opts['t']);
					$types = array();
					foreach ($arr as $type) $types[ trim($type) ] = 1;
					$_DOMPDF_DEBUG_TYPES = $types;
				}
			  
				$save_file = true;
				break;
				
				default:
				$file = rawurldecode(base_url().'index.php/process/pdf/html/'.$t.'/'.$id.'/'.$dx.'/1/'.$cover);
				
				$paper = DOMPDF_DEFAULT_PAPER_SIZE;
				if($id == 'atf') $orientation = "landscape"; else $orientation = "portrait";
				
				$file_parts = explode_url($file);
				
				if(($file_parts['protocol'] == '' || $file_parts['protocol'] === 'file://')){
					$file = realpath($file);
					if(strpos($file, DOMPDF_CHROOT) !== 0) throw new DOMPDF_Exception("Permission denied on $file.");
				}
			  
				$outfile = $t.'_'.$id.'_'.$dx.'.pdf';
				$save_file = false;
				break;
			}
			
			$dompdf = new DOMPDF();
			
			if($file === "-"){
				$str = "";
				while( !feof(STDIN)) $str .= fread(STDIN, 4096);
				$dompdf->load_html($str);
			}
			else $dompdf->load_html_file($file);
			
			if(isset($base_path)) $dompdf->set_base_path($base_path);
			
			$dompdf->set_paper($paper, $orientation);
			$dompdf->render();
			
			if($_dompdf_show_warnings){
				global $_dompdf_warnings;
				foreach ($_dompdf_warnings as $msg) echo $msg . "\n";
				echo $dompdf->get_canvas()->get_cpdf()->messages;
				flush();
			}
			
			if($save_file){
				if(strtolower(DOMPDF_PDF_BACKEND) === "gd") $outfile = str_replace(".pdf", ".png", $outfile);
				list($proto, $host, $path, $file) = explode_url($outfile);
				if($proto <> "") $outfile = $file;
				$outfile = realpath(dirname($outfile)) . DIRECTORY_SEPARATOR . basename($outfile);
				if(strpos($outfile, DOMPDF_CHROOT) !== 0) throw new DOMPDF_Exception("Permission denied.");
				file_put_contents($outfile, $dompdf->output( array("compress" => 0)));
				exit(0);
			}
			
			if(!headers_sent()) $dompdf->stream($outfile, $options);
			
		}elseif($tp == 'merge'){
			
			$Qsite = $this->db->query("
				SELECT a.`site_id`, b.`attachment_id` AS `boq_id`, b.`files` AS `boq_file`, b.`desc` AS `boq_comment`, c.`attachment_id` AS `designpack_id`, c.`files` AS `designpack_file`, c.`desc` AS `designpack_comment`
				FROM `it_atp` a
				LEFT JOIN `it_attachment` b ON b.`idx`=a.`site_id` AND b.`table`='boq_$id' 	
				LEFT JOIN `it_attachment` c ON c.`idx`=a.`site_id` AND c.`table`='dpc_$id' 	
				WHERE a.`atp_id`='$dx'
			");
			$site = $Qsite->result_object();
			
			$Qattach = $this->db->query("SELECT `files` FROM `it_attachment` WHERE `table`='atc_$id' AND `idx`='".$site[0]->site_id."' ORDER BY `attachment_id` ASC");
			
			if($site[0]->boq_file || $site[0]->designpack_file || $Qattach->num_rows){
				$name = $this->ifunction->uid();
				$tname = time().rand();
				
				file_put_contents('./media/temp/cover_'.$name.'.pdf', $this->ifunction->curl(base_url().'index.php/process/pdf/export/'.$t.'/'.$id.'/'.$dx.'/1/1'));
				file_put_contents('./media/temp/body_'.$name.'.pdf', $this->ifunction->curl(base_url().'index.php/process/pdf/export/'.$t.'/'.$id.'/'.$dx.'/1/2'));
				
				if($site[0]->boq_comment) file_put_contents('./media/temp/comment_boq'.$tname.'.pdf', $this->ifunction->curl(base_url().'index.php/process/pdf/export/core/comment/'.$site[0]->boq_id.'/1/BOQ'));
				if($site[0]->designpack_comment) file_put_contents('./media/temp/comment_designpack'.$tname.'.pdf', $this->ifunction->curl(base_url().'index.php/process/pdf/export/core/comment/'.$site[0]->designpack_id.'/1/Designpack'));
				
				require_once "application/libraries/pdf/PDFMerger.php";
				
				$pdf = new PDFMerger;
				
				if(file_exists('./media/temp/cover_'.$name.'.pdf')) $pdf->addPDF('./media/temp/cover_'.$name.'.pdf', '1');
				if($site[0]->boq_file){
					if(file_exists('./media/files/'.$site[0]->boq_file)) $pdf->addPDF('./media/files/'.$site[0]->boq_file, 'all');
					if($site[0]->boq_comment){
						if(file_exists('./media/temp/comment_boq'.$tname.'.pdf')) $pdf->addPDF('./media/temp/comment_boq'.$tname.'.pdf', '1');
					}
				}
				if(file_exists('./media/temp/body_'.$name.'.pdf')) $pdf->addPDF('./media/temp/body_'.$name.'.pdf', 'all');
				if($site[0]->designpack_file){
					if(file_exists('./media/files/'.$site[0]->designpack_file)) $pdf->addPDF('./media/files/'.$site[0]->designpack_file, 'all');
					if($site[0]->designpack_comment){
						if(file_exists('./media/temp/comment_designpack'.$tname.'.pdf')) $pdf->addPDF('./media/temp/comment_designpack'.$tname.'.pdf', '1');
					}
				}
				if($Qattach->num_rows){
					foreach($Qattach->result_object() as $attach){
						if(file_exists('./media/files/'.$attach->files)) $pdf->addPDF('./media/files/'.$attach->files, 'all');
					}
				}
				$pdf->merge('download', $t.'_'.$id.'_'.$dx.'.pdf');
				
			}
			else header('location:'.base_url().'index.php/process/pdf/export/'.$t.'/'.$id.'/'.$dx);
		
		}elseif($tp == 'edit'){
			
			switch($t){
				
				/*case 'atm':
				$data = array('dx' => $dx, 'print' => $print);
				if($id == 'atf'){
					$this->load->view('pdf/atm/atf', $data);
				}
				break;*/
				
				case 'atp':
				$this->load->view('pdf/atp/'.$id.'/edit/'.$print, array('dx' => $dx));
				break;
			}
			
		}else{
			
			switch($t){
				
				case 'ss':
				$data = array('dx' => $dx, 'print' => $print);
				if(($id == 'report') || ($id == 'installation') || ($id == 'punchlist')){
					$this->load->view('pdf/ss/'.$id, $data);
				}
				break;
				
				case 'atm':
				$data = array('dx' => $dx, 'print' => $print);
				if($id == 'atf'){
					$this->load->view('pdf/atm/atf', $data);
				}
				break;
				
				case 'atp':
				
				$data = array(
						'dx' => $dx,
						'print' => $print,
						'cover' => $cover
				);
				
				if($id == 'part'){
					$this->load->view('pdf/atp/'.$id.'/asset', $data);
				}else{
					$this->load->view('pdf/atp/'.$id.'/report', $data);
					$this->load->view('pdf/atp/'.$id.'/attachment', $data);
				}
				break;
				
				case 'core':
				
				if($id == 'comment'){
					
					$Qcheck = $this->db->query("
						SELECT a.`note`, b.`name`
						FROM `it_attachment` a
						JOIN `it_user` b ON b.`user_id`=a.`desc`
						WHERE a.`attachment_id`='$dx'
					");
					$check = $Qcheck->result_object();
					
					$msg = explode('|', $check[0]->note);
					
					echo '<html><body style="font:12px sans-serif"><h1 style="text-transform:capitalize">Comment '.$cover.'</h1><b>From:</b> '.$check[0]->name.'<p><b>Message:</b> '.$msg[1].'</p><b>Time:</b> '.date('d F Y - H:i', $msg[0]).'</body></html>';
				}else{
					$Quser = $this->db->query("SELECT `name` FROM `it_user` WHERE `user_id`='$id'"); $user = $Quser->result_object();
					echo '<html><body><p align="center"><img src="'.base_url().'/media/files/'.$cover.'"></p><p align="center" style="font:12px sans-serif">(Uploaded By: <b>'.$user[0]->name.'</b>)<br />'.date('d F Y - H:i').'</p></body></html>';
				}
				break;
			}
		}
	}
	
	public function txt($t, $tp, $dx)
	{
		if($t == 'atp'):
		header('Content-type: application/txt');
		header('Content-Disposition: attachment; filename="cell_id_'.$tp.'_'.$dx.'.txt"');
		
		$Qlist = $this->db->query("SELECT `desc` FROM `it_attachment` WHERE `attachment_id`='$dx'");
		$list = $Qlist->result_object();
		$lists = explode('|', $list[0]->desc);
		
		echo "Time\t";
		echo "Cell ID\t";
		echo "\r\n";
		echo "-----\t";
		echo "-----\t";
		echo "\r\n";
		$d = 0;
		for($i=0; $i < count($lists); $i++){
			echo $d."\t";
			echo $lists[$i]."\t";
			echo "\r\n";
			$d = $d + 2;
		}
		endif;
	}
	
	public function chart($tp)
	{
		switch($tp){
			case 'export':
			ini_set('magic_quotes_gpc', 'off');
			
			$type = $_POST['type'];
			$svg = (string) $_POST['svg'];
			$filename = (string) $_POST['filename'];
			$tempName = md5(rand());
			
			if(!$filename) $filename = 'chart';
			if(get_magic_quotes_gpc()) $svg = stripslashes($svg);	
			
			switch($type){
				case 'image/png':
				$typeString = '-m image/png';
				$ext = 'png';
				continue;
				
				case 'image/jpeg':
				$typeString = '-m image/jpeg';
				$ext = 'jpg';
				continue;
				
				case 'image/svg+xml':
				$ext = 'svg';	
				continue;
				
				case 'application/pdf':
				$typeString = '-m application/pdf';
				$ext = 'pdf';
				continue;
			}
			
			$outfile = "./media/temp/$tempName.$ext";
			
			if(isset($typeString)){
				
				if($_POST['width']){
					$width = (int)$_POST['width'];
					if($width) $width = "-w $width";
				}
				
				if(!file_put_contents("./media/temp/$tempName.svg", $svg)) die("Couldn't create temporary file. Check that the directory permissions for the /temp directory are set to 777.");
				
				$output = shell_exec("java -jar ./application/libraries/batik/batik-rasterizer.jar $typeString -d $outfile $width ./media/temp/$tempName.svg");
				
				if(!is_file($outfile) || filesize($outfile) < 10){
					die("<pre>$output</pre>Error while converting SVG");
				}else{
					header("Content-Disposition: attachment; filename=$filename.$ext");
					header("Content-Type: $type");
					echo file_get_contents($outfile);
				}
				
				$this->ifunction->un_link("./media/temp/$tempName.svg");
				$this->ifunction->un_link($outfile);
				
			}elseif($ext == 'svg'){
				header("Content-Disposition: attachment; filename=$filename.$ext");
				header("Content-Type: $type");
				echo $svg;
				
			}
			else echo "Invalid type";
			break;
		}
	}
	
	public function pop_search($t='ifpage', $p=1)
	{
		$filter = '';
		if($t <> 'ifpage'){
			
			if($_POST['q']) $q = $_POST['q']; else $q = $t;
			
			$key = str_replace(array("'", '"'), array("\'", '\"'), $q);
			$keywd = str_replace(" ", "%", $key);
			$t = urlencode($key);
			
			$filter = "AND (`id` LIKE '%$keywd%' OR `name` LIKE '%$keywd%')";
		}
		
		$limit=14;
		$position=($p-1) * $limit;
		
		$Qlist = $this->db->query("SELECT `site_id`, `id`, `name`, `latitude`, `longitude` FROM `it_site` WHERE `latitude` <> 0 $filter ORDER BY `name` ASC LIMIT $position, $limit");
		if($Qlist->num_rows){
			
			echo '<table class="tables" width="100%">';
			echo '<tbody>';
			foreach($Qlist->result_object() as $list){
				echo '<tr>';
				echo '<td><a href="'.base_url().'index.php/main/site/detail/0/'.$list->site_id.'" target="_blank" style="color:#0F67A1">'.$list->name.'</a></td>';
				echo '<td width="150">'.$list->id.'</td>';
				echo '<td align="center" width="55"><a class="choose" onclick="select_item(\''.$list->id.'\', \''.$list->site_id.'\', \''.$this->ifunction->encode($list->latitude.'|'.$list->longitude).'\')">Choose</a></td>';
				echo '</tr>';
			}
			echo '</tbody>';
			echo '</table>';
			
			$Qpaging = $this->db->query("SELECT `site_id` FROM `it_site` WHERE `latitude` <> 0 ".$filter);
			$num_page = ceil($Qpaging->num_rows / $limit);
			if($Qpaging->num_rows > $limit) $this->ifunction->paging($p, 'page(\''.$t.'\', ', $num_page, $Qpaging->num_rows, 'onclick', ')');
        }
		else echo '<p class="info-box">No data.</p>';
	}
	
	public function search($t)
	{
		if(empty($_POST['q'])) die('<script>window.top.location.href="'.base_url().'"</script>');
		
		$date = date('Y-m-d');
		$uid = md5(microtime().rand());
		$query = str_replace(array('"', "'"), '', $_POST['q']);
		
		$fields = array(
			'search_id' => $uid,
			'keyword' => $query,
			'time_entry' => $date
		);
		$this->db->insert('it_search', $fields);
		$this->db->query("DELETE FROM `it_search` WHERE `time_entry` <> '$date'");
		echo '<script>window.top.location.href="'.base_url().'index.php/main/'.$t.'/search/1/'.$uid.'"</script>';
	}
	
	public function autocomplete($id, $val, $selected, $disabled=0)
	{
		header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
		header("Last-Modified: ".gmdate("D, d M Y H:i:s")." GMT");
		header("Cache-Control: no-cache, must-revalidate");
		header("Pragma: no-cache");
		header("content-type: application/x-javascript; charset=tis-620");
		
		if($disabled == 1) $disabled = ' disabled="disabled"'; elseif($disabled == 2) $disabled = ' readonly="readonly"'; else $disabled = '';
		
		if($id=='user_vendor'){
			if($val):
			echo '<select name="user" class="inputbox w342"'.$disabled.'>';
			echo '<option value="0">-- Select User:</option>';
			$Qlist = $this->db->query("SELECT `user_id`, `name` FROM  `it_user` WHERE `fl_active`=1 AND `vendor_id`='$val' AND `role_id`='0' ORDER BY `name` ASC");
			if($selected){
				foreach($Qlist->result_object() as $list){
					echo '<option value="'.$list->user_id.'"'; if($list->user_id == $selected) echo ' selected="selected"'; echo '>'.$list->name.'</option>';
				}
			}
			else foreach($Qlist->result_object() as $list) echo '<option value="'.$list->user_id.'">'.$list->name.'</option>';
			echo '</select>';
			endif;
		}
		
		elseif($id=='user_wh'){
			if($val):
			echo '<select name="user_wh" class="inputbox w342"'.$disabled.'>';
			echo '<option value="0">-- Select User:</option>';
			$Qlist = $this->db->query("SELECT `user_id`, `name` FROM  `it_user` WHERE `fl_active`=1 AND `role_id`=8 ORDER BY `name` ASC");
			if($selected){
				foreach($Qlist->result_object() as $list){
					echo '<option value="'.$list->user_id.'"'; if($list->user_id == $selected) echo ' selected="selected"'; echo '>'.$list->name.'</option>';
				}
			}
			else foreach($Qlist->result_object() as $list) echo '<option value="'.$list->user_id.'">'.$list->name.'</option>';
			echo '</select>';
			endif;
		}
		
		elseif($id=='user_nom'){
			if($val):
			echo '<select name="user_nom" class="inputbox w342"'.$disabled.'>';
			echo '<option value="0">-- Select User:</option>';
			$Qlist = $this->db->query("SELECT `user_id`, `name` FROM  `it_user` WHERE `fl_active`=1 AND `role_id`=7 ORDER BY `name` ASC");
			if($selected){
				foreach($Qlist->result_object() as $list){
					echo '<option value="'.$list->user_id.'"'; if($list->user_id == $selected) echo ' selected="selected"'; echo '>'.$list->name.'</option>';
				}
			}
			else foreach($Qlist->result_object() as $list) echo '<option value="'.$list->user_id.'">'.$list->name.'</option>';
			echo '</select>';
			endif;
		}
		
		elseif($id=='user_spv'){
			if($val):
			echo '<select name="user_spv" class="inputbox w342"'.$disabled.'>';
			echo '<option value="0">-- Select User:</option>';
			$Qlist = $this->db->query("SELECT `user_id`, `name` FROM  `it_user` WHERE `fl_active`=1 AND `role_id`=2 ORDER BY `name` ASC");
			if($selected){
				foreach($Qlist->result_object() as $list){
					echo '<option value="'.$list->user_id.'"'; if($list->user_id == $selected) echo ' selected="selected"'; echo '>'.$list->name.'</option>';
				}
			}
			else foreach($Qlist->result_object() as $list) echo '<option value="'.$list->user_id.'">'.$list->name.'</option>';
			echo '</select>';
			endif;
		}
		
		elseif($id=='user_consultant'){
			if($val):
			echo '<select name="user_consultant" class="inputbox w342"'.$disabled.'>';
			echo '<option value="0">-- Select User:</option>';
			$Qlist = $this->db->query("SELECT `user_id`, `name` FROM  `it_user` WHERE `fl_active`=1 AND `role_id`=3 ORDER BY `name` ASC");
			if($selected){
				foreach($Qlist->result_object() as $list){
					echo '<option value="'.$list->user_id.'"'; if($list->user_id == $selected) echo ' selected="selected"'; echo '>'.$list->name.'</option>';
				}
			}
			else foreach($Qlist->result_object() as $list) echo '<option value="'.$list->user_id.'">'.$list->name.'</option>';
			echo '</select>';
			endif;
		}
		
		elseif($id=='user_indosat'){
			if($val):
			echo '<select name="user_indosat" class="inputbox w342"'.$disabled.'>';
			echo '<option value="0">-- Select User:</option>';
			$Qlist = $this->db->query("SELECT `user_id`, `name` FROM  `it_user` WHERE `fl_active`=1 AND `role_id`=4 ORDER BY `name` ASC");
			if($selected){
				foreach($Qlist->result_object() as $list){
					echo '<option value="'.$list->user_id.'"'; if($list->user_id == $selected) echo ' selected="selected"'; echo '>'.$list->name.'</option>';
				}
			}
			else foreach($Qlist->result_object() as $list) echo '<option value="'.$list->user_id.'">'.$list->name.'</option>';
			echo '</select>';
			endif;
		}
		
		elseif($id=='action_app'){
			switch($val){
				case 2: case 3:
				echo '<table border="0" width="100%"><tbody><tr><td width="120" class="pt5">Reason</td><td width="10" class="pt5">:</td><td><textarea name="note" class="inputbox h100 w330"></textarea></td></tr></tbody></table>';
				break;
				
				case 4:
				if($selected == 'atm'){
					$arr_role = array(2 => 9, 3 => 10, 7 => 11, 4 => 12);
					$role_id = $arr_role[$_SESSION['isat']['role']];
				}
				else $role_id = 5;
				echo '<table border="0" width="100%"><tbody>';
				echo '<tr><td width="120" class="pt9">User Delegator</td><td width="10" class="pt9">:</td><td>';
				echo '<select name="user" class="inputbox w342">';
				$Qlist = $this->db->query("SELECT `user_id`, `name` FROM  `it_user` WHERE `fl_active`=1 AND `role_id`=$role_id AND `vendor_id`='".$_SESSION['isat']['vendor']."' ORDER BY `name` ASC");
				foreach($Qlist->result_object() as $list) echo '<option value="'.$list->user_id.'">'.$list->name.'</option>';
				echo '</select>';
				echo '</td></tr>';
				echo '</tbody></table>';
				break;
			}
		}
		
		elseif($id=='actions_app'){
			switch($val){
				case 1:
				if(!$selected) $selected = 1;
				$arr_type = array(1 => 'Remote', 'On Site');
				echo '<table border="0" width="100%"><tbody><tr height="30"><td width="100" class="pt9">Task Type</td><td width="10" class="pt9">:</td><td class="pt9">';
				for($i=1; $i < 3; $i++){
					echo '<label><input type="radio" name="task_type" value="'.$i.'"'; if($i == $selected) echo ' checked="checked"'; echo '> '.$arr_type[$i].'</label> &nbsp; &nbsp; ';
				}
				echo '</td></tr></tbody></table>';
				/*$arr_type = array(1 => 'Remote', 'On Site');
				echo '<table border="0" width="100%"><tbody><tr height="30"><td width="120" class="pt9">Task Type</td><td width="10" class="pt9">:</td><td><select name="task_type" class="inputbox w342">';
				if($selected){
					for($i=1; $i < 3; $i++){
						echo '<option value="'.$i.'"'; if($i == $selected) echo ' selected="selected"'; echo '>'.$arr_type[$i].'</option>';
					}
				}
				else for($i=1; $i < 3; $i++) echo '<option value="'.$i.'">'.$arr_type[$i].'</option>';
				echo '</select></td></tr></tbody></table>';*/
				break;
				
				case 99:
				if(!$selected) $selected = 1;
				$arr_type = array(1 => 'Via Web & Device', 'Must Via Device');
				echo '<table border="0" width="100%"><tbody><tr height="30"><td width="100" class="pt9">PIC Destination Supervision</td><td width="10" class="pt9">:</td><td class="pt9">';
				for($i=1; $i < 3; $i++){
					echo '<label><input type="radio" name="task_type" value="'.$i.'"'; if($i == $selected) echo ' checked="checked"'; echo '> '.$arr_type[$i].'</label> &nbsp; &nbsp; ';
				}
				echo '</td></tr></tbody></table>';
				/*$arr_type = array(1 => 'Via Web & Device', 'Must Via Device');
				echo '<table border="0" width="100%"><tbody><tr height="30"><td width="120" class="pt9">PIC Destination Supervision</td><td width="10" class="pt9">:</td><td><select name="task_type" class="inputbox w342">';
				if($selected){
					for($i=1; $i < 3; $i++){
						echo '<option value="'.$i.'"'; if($i == $selected) echo ' selected="selected"'; echo '>'.$arr_type[$i].'</option>';
					}
				}
				else for($i=1; $i < 3; $i++) echo '<option value="'.$i.'">'.$arr_type[$i].'</option>';
				echo '</select></td></tr></tbody></table>';*/
				break;
				
				default:
				echo '<table border="0" width="100%"><tbody><tr><td width="120" class="pt5">Reason</td><td width="10" class="pt5">:</td><td><textarea name="note" class="inputbox h100 w330"></textarea></td></tr></tbody></table>';
				break;
			}
		}
		
		elseif($id=='ne_id1'){
			if($val):
			$Qtp = $this->db->query("SELECT `type` FROM `it_site` WHERE `id`='$val'"); $tp = $Qtp->result_object();
			echo '<select name="network" class="inputbox w342"'.$disabled.'>';
			if($tp[0]->type == 'site'){
				echo '<option value="0">-- Select Network ID:</option>';
				$Qlist = $this->db->query("
					SELECT a.`neid`, b.`desc`
					FROM `it_network` a
					LEFT JOIN `it_network_code` b ON b.`ne_code`=a.`ne_code`
					WHERE a.`id`='$val'
				");
				if($selected){
					foreach($Qlist->result_object() as $list){
						echo '<option value="'.$list->neid.'"'; if($selected == $list->neid) echo ' selected="selected"'; echo '>'.$list->neid; if($list->desc) echo ' ('.$list->desc.')'; echo '</option>';
					}
				}else{
					foreach($Qlist->result_object() as $list){
						echo '<option value="'.$list->neid.'">'.$list->neid; if($list->desc) echo ' ('.$list->desc.')'; echo '</option>';
					}
				}
			}
			else echo '<option>---</option>';
			echo '</select>';
			endif;
		}
		
		elseif($id=='ne_id2'){
			if($val):
			$Qtp = $this->db->query("SELECT `type` FROM `it_site` WHERE `id`='$val'"); $tp = $Qtp->result_object();
			echo '<select name="network2" class="inputbox w342"'.$disabled.'>';
			if($tp[0]->type == 'site'){
				echo '<option value="0">-- Select Network ID:</option>';
				$Qlist = $this->db->query("
					SELECT a.`neid`, b.`desc`
					FROM `it_network` a
					LEFT JOIN `it_network_code` b ON b.`ne_code`=a.`ne_code`
					WHERE a.`id`='$val'
				");
				if($selected){
					foreach($Qlist->result_object() as $list){
						echo '<option value="'.$list->neid.'"'; if($selected == $list->neid) echo ' selected="selected"'; echo '>'.$list->neid; if($list->desc) echo ' ('.$list->desc.')'; echo '</option>';
					}
				}else{
					foreach($Qlist->result_object() as $list){
						echo '<option value="'.$list->neid.'">'.$list->neid; if($list->desc) echo ' ('.$list->desc.')'; echo '</option>';
					}
				}
			}
			else echo '<option>---</option>';
			echo '</select>';
			endif;
		}
		
		elseif($id=='maps_1'){
			$vals = explode('_', $val);
			$geo = explode('|', $this->ifunction->decode($vals[1]));
			
			$Qsite = $this->db->query("SELECT `id`, `name`, `address`, `city`, `province`, `latitude`, `longitude` FROM `it_site` WHERE `site_id`='$vals[0]'");
			$site = $Qsite->result_object();
			$la = $this->ifunction->DECtoDMS($site[0]->latitude);
			$lo = $this->ifunction->DECtoDMS($site[0]->longitude);
			if($site[0]->address) $address = "\n\nAddress: ".strtolower($site[0]->address);
			if($site[0]->city) $city = "\nCity: ".strtolower($site[0]->city);
			if($site[0]->province) $province = "\nProvince: ".strtolower($site[0]->province);
			echo "<textarea class='inputbox w330 h100' disabled='disabled'>Site ID: ".$site[0]->id."\nSite Name: ".$site[0]->name.$address.$city.$province."\n\nLatitude: $la[deg]&deg; $la[min]' $la[sec]\" (".$site[0]->latitude.")\nLongitude: $lo[deg]&deg; $lo[min]' $lo[sec]\" (".$site[0]->longitude.")</textarea>";
			
			if($geo[0] <> 1) echo '<div id="md_1"><a class="maps_detail" id="1" c="md" dx="1" geo="'.$geo[0].':'.$geo[1].':marker.png"><img style="border:1px solid #D3D3D3;background:url(http://maps.google.com/maps/api/staticmap?size=340x140&markers=color:0xBC1010|'.$geo[0].','.$geo[1].'&zoom=15&sensor=false) center center;width:340px;height:90px" src="'.base_url().'static/i/spacer.gif"></a></div>';
		}
		
		elseif($id=='maps_2'){
			$vals = explode('_', $val);
			$geo = explode('|', $this->ifunction->decode($vals[1]));
			
			$Qsite = $this->db->query("SELECT `id`, `name`, `address`, `city`, `province`, `latitude`, `longitude` FROM `it_site` WHERE `site_id`='$vals[0]'");
			$site = $Qsite->result_object();
			$la = $this->ifunction->DECtoDMS($site[0]->latitude);
			$lo = $this->ifunction->DECtoDMS($site[0]->longitude);
			if($site[0]->address) $address = "\n\nAddress: ".strtolower($site[0]->address);
			if($site[0]->city) $city = "\nCity: ".strtolower($site[0]->city);
			if($site[0]->province) $province = "\nProvince: ".strtolower($site[0]->province);
			echo "<textarea class='inputbox w330 h100' disabled='disabled'>Site ID: ".$site[0]->id."\nSite Name: ".$site[0]->name.$address.$city.$province."\n\nLatitude: $la[deg]&deg; $la[min]' $la[sec]\" (".$site[0]->latitude.")\nLongitude: $lo[deg]&deg; $lo[min]' $lo[sec]\" (".$site[0]->longitude.")</textarea>";
			
			if($geo[0] <> 1) echo '<div id="md_2"><a class="maps_detail" id="2" c="md" dx="1" geo="'.$geo[0].':'.$geo[1].':marker_b.png"><img style="border:1px solid #D3D3D3;background:url(http://maps.google.com/maps/api/staticmap?size=340x140&markers=color:0x1E67F7|'.$geo[0].','.$geo[1].'&zoom=15&sensor=false) center center;width:340px;height:90px" src="'.base_url().'static/i/spacer.gif"></a></div>';
		}
	}
	
	public function task_status($tp)
	{
		header("Pragma: public");
		header("Expires: 0");
		header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
		header("Content-Type: application/force-download");
		header("Content-Type: application/octet-stream");
		header("Content-Type: application/download");
		header("Content-type: application/x-msexcel");
		header("Content-Disposition: attachment; filename=task_status.xls");
		header("Content-Transfer-Encoding: binary");
		
		$this->ifunction->xlsBOF();
		$this->ifunction->xlsWriteLabel(0, 0, 'No Task');
		$this->ifunction->xlsWriteLabel(0, 1, 'Vendor Name');
		$this->ifunction->xlsWriteLabel(0, 2, 'Project Name');
		$this->ifunction->xlsWriteLabel(0, 3, 'Document Name');
		$this->ifunction->xlsWriteLabel(0, 4, 'Site ID');
		$this->ifunction->xlsWriteLabel(0, 5, 'Site Name');
		$this->ifunction->xlsWriteLabel(0, 6, 'City / Area');
		$this->ifunction->xlsWriteLabel(0, 7, 'SN Factory');
		$this->ifunction->xlsWriteLabel(0, 8, 'Barcode Indosat');
		$this->ifunction->xlsWriteLabel(0, 9, 'Material Description');
		$this->ifunction->xlsWriteLabel(0, 10, 'Qty');
		$this->ifunction->xlsWriteLabel(0, 11, 'UOM');
		$this->ifunction->xlsWriteLabel(0, 12, 'Status');
		
		if($tp == 1) $join = "JOIN"; else $join = "LEFT JOIN";
		
		$i = 1;
		/*$Qlist = $this->db->query("
			SELECT a.`atp_id`, a.`title`, a.`brand`, a.`fl_quest`, a.`fl_approve`, b.`name` AS `vendor`, c.`id` AS `site_id`, c.`name` AS `site_name`, c.`city`, d.`serial_no`, d.`barcode`, d.`name` AS `part`, d.`qty`, d.`uom`
			FROM  `it_atp` a
			LEFT JOIN `it_vendor` b ON b.`vendor_id`=a.`vendor_id`
			JOIN `it_site` c ON c.`site_id`=a.`site_id`
			$join `it_site_part` d ON d.`atp_id`=a.`atp_id`
			ORDER BY a.`atp_id` DESC
		");*/
		$Qlist = $this->db->query("
			SELECT d.atp_id, a.`atp_id`, a.`title`, a.`brand`, a.`fl_quest`, a.`fl_approve`, b.`name` AS `vendor`, c.`id` AS `site_id`, c.`name` AS `site_name`, c.`city`, d.`serial_no`, d.`barcode`, d.`name` AS `part`, d.`qty`, d.`uom`
			FROM  `it_atp` a
			JOIN `it_site` c ON c.`site_id`=a.`site_id`
			JOIN `it_site_part` d ON d.`atp_id`=a.`atp_id`
			JOIN it_book e ON (e.idx=a.atp_id) AND (e.table='atp')
			JOIN it_user f ON (e.user_id=f.user_id)
			JOIN it_vendor b ON (f.vendor_id=b.vendor_id)
			WHERE d.serial_no <> '' GROUP BY d.serial_no ORDER BY a.`atp_id` DESC
		");
		foreach($Qlist->result_object() as $list){
			$this->ifunction->xlsWriteLabel($i, 0, $list->atp_id);
			$this->ifunction->xlsWriteLabel($i, 1, $list->vendor);
			$this->ifunction->xlsWriteLabel($i, 2, $list->title);
			$this->ifunction->xlsWriteLabel($i, 3, $list->brand);
			$this->ifunction->xlsWriteLabel($i, 4, $list->site_id);
			$this->ifunction->xlsWriteLabel($i, 5, $list->site_name);
			$this->ifunction->xlsWriteLabel($i, 6, $list->city);
			$this->ifunction->xlsWriteLabel($i, 7, $list->serial_no);
			$this->ifunction->xlsWriteLabel($i, 8, $list->barcode);
			$this->ifunction->xlsWriteLabel($i, 9, $list->part);
			$this->ifunction->xlsWriteLabel($i, 10, $list->qty);
			$this->ifunction->xlsWriteLabel($i, 11, $list->uom);
			if($list->fl_quest){
				switch($list->fl_approve){
					case 0: case 1: $this->ifunction->xlsWriteLabel($i, 12, 'Pending Aproval Vendor'); continue;
					case 2: case 3: $this->ifunction->xlsWriteLabel($i, 12, 'Pending Aproval Consultant'); continue;
					case 4: case 5: $this->ifunction->xlsWriteLabel($i, 12, 'Pending Aproval Indosat'); continue;
					default: $this->ifunction->xlsWriteLabel($i, 12, 'Approve Indosat (done)'); continue;
				}
			}
			else $this->ifunction->xlsWriteLabel($i, 12, 'Pending Task');
			$i++;
		}
		$this->ifunction->xlsEOF();
	}
	
	public function ne_id()
	{
		header("Pragma: public");
		header("Expires: 0");
		header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
		header("Content-Type: application/force-download");
		header("Content-Type: application/octet-stream");
		header("Content-Type: application/download");
		header("Content-type: application/x-msexcel");
		header("Content-Disposition: attachment; filename=NE_ID.xls");
		header("Content-Transfer-Encoding: binary");
		
		$this->ifunction->xlsBOF();
		$this->ifunction->xlsWriteLabel(0, 0, 'Site ID');
		$this->ifunction->xlsWriteLabel(0, 1, 'Site Name');
		$this->ifunction->xlsWriteLabel(0, 2, 'NE ID');
		
		if($tp == 1) $join = "JOIN"; else $join = "LEFT JOIN";
		
		$i = 1;
		$Qlist = $this->db->query("
			SELECT a.`id`, a.`name`, b.`neid`
			FROM `it_site` a
			JOIN `it_network` b ON (b.`id`=a.`id`) LIMIT 500000
		");
		foreach($Qlist->result_object() as $list){
			$this->ifunction->xlsWriteLabel($i, 0, $list->id);
			$this->ifunction->xlsWriteLabel($i, 1, $list->name);
			$this->ifunction->xlsWriteLabel($i, 2, $list->neid);
			$i++;
		}
		$this->ifunction->xlsEOF();
	}
	
	public function atmx()
	{
		header("Pragma: public");
		header("Expires: 0");
		header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
		header("Content-Type: application/force-download");
		header("Content-Type: application/octet-stream");
		header("Content-Type: application/download");
		header("Content-type: application/x-msexcel");
		header("Content-Disposition: attachment; filename=ATM_all.xls");
		header("Content-Transfer-Encoding: binary");
		
		$this->ifunction->xlsBOF();
		$this->ifunction->xlsWriteLabel(0, 0, 'No ATF');
		$this->ifunction->xlsWriteLabel(0, 1, 'Vendor Name');
		$this->ifunction->xlsWriteLabel(0, 2, 'Project Name');
		$this->ifunction->xlsWriteLabel(0, 3, 'Document Name/Task Type');
		$this->ifunction->xlsWriteLabel(0, 4, 'Site ID (Destination)');
		$this->ifunction->xlsWriteLabel(0, 5, 'Site Name (Destination)');
		$this->ifunction->xlsWriteLabel(0, 6, 'City (Destination)');
		$this->ifunction->xlsWriteLabel(0, 7, 'NE ID (Destination)');
		$this->ifunction->xlsWriteLabel(0, 8, 'SN Factory');
		$this->ifunction->xlsWriteLabel(0, 9, 'Barcode Indosat');
		$this->ifunction->xlsWriteLabel(0, 10, 'Material Description');
		$this->ifunction->xlsWriteLabel(0, 11, 'Qty');
		$this->ifunction->xlsWriteLabel(0, 12, 'UoM');
		$this->ifunction->xlsWriteLabel(0, 13, 'Material Type');
		$this->ifunction->xlsWriteLabel(0, 14, 'Status Approval');
		$this->ifunction->xlsWriteLabel(0, 15, 'Status SAP');
		$this->ifunction->xlsWriteLabel(0, 16, 'Site ID (Origin)');
		$this->ifunction->xlsWriteLabel(0, 17, 'Site Name (Origin)');
		$this->ifunction->xlsWriteLabel(0, 18, 'City (Origin)');
		$this->ifunction->xlsWriteLabel(0, 19, 'NE ID (Origin)');
		
		$i = 1;
		$Qlist = $this->db->query("
			SELECT a.`atm_id`,
a.`atf_no` AS 'a', f.`name` AS 'b',  a.`title` AS 'c', a.`atm_type` AS 'd', e.`id` AS `e`, e.`name` AS `f`,  e.`city` AS 'g',  a.`to_neid` AS 'h', g.`serial_no` AS 'i', g.`barcode` AS 'j', g.`name` AS 'k', g.`qty` AS 'l', g.`uom` AS 'm', g.`material_type` AS 'n', IF(a.`fl_status`=0, 'Need Indosat Approval To Activate', IF(a.`order_wh`=3, 'Pending Approval PIC Desination', IF(a.`order_vendor`=3, 'Pending Approval PM Vendor', IF(a.`order_nom`=3, 'Need Approval NOM / Regional', IF(a.`order_consultant`=3, 'Need Approval Consultant', IF(a.`order_indosat`=3, 'Need Approval PM Indosat', IF(a.`order_indosat`=1, 'Final Approved by PM Indosat', ''))))))) AS 'o','Transfer' AS 'p',d.`id` AS 'q', d.`name` AS 'r', d.`city` AS 's', a.`from_neid` AS 't'
FROM `it_atm` a
LEFT JOIN `it_checkin` b ON b.`idx`=a.`atm_id` AND b.`table`='atm'
LEFT JOIN `it_book` c ON c.`idx`=a.`atm_id` AND c.`table`='atm'
JOIN `it_site` d ON d.`site_id`=a.`from_site`
JOIN `it_site` e ON e.`site_id`=a.`to_site`
LEFT JOIN `it_vendor` f ON (a.`vendor_id` = f.`vendor_id`)
JOIN `it_site_part` g ON (g.`atm_id` = a.`atm_id`) 
WHERE a.`fl_status` IN(0, 1, 2, 3)
ORDER BY a.`atm_id` DESC
		");
		foreach($Qlist->result_object() as $list){
			$this->ifunction->xlsWriteLabel($i, 0, $list->a);
			$this->ifunction->xlsWriteLabel($i, 1, $list->b);
			$this->ifunction->xlsWriteLabel($i, 2, $list->c);
			$this->ifunction->xlsWriteLabel($i, 3, $list->d);
			$this->ifunction->xlsWriteLabel($i, 4, $list->e);
			$this->ifunction->xlsWriteLabel($i, 5, $list->f);
			$this->ifunction->xlsWriteLabel($i, 6, $list->g);
			$this->ifunction->xlsWriteLabel($i, 7, $list->h);
			$this->ifunction->xlsWriteLabel($i, 8, $list->i);
			$this->ifunction->xlsWriteLabel($i, 9, $list->j);
			$this->ifunction->xlsWriteLabel($i, 10, $list->k);
			$this->ifunction->xlsWriteLabel($i, 11, $list->l);
			$this->ifunction->xlsWriteLabel($i, 12, $list->m);
			$this->ifunction->xlsWriteLabel($i, 13, $list->n);
			$this->ifunction->xlsWriteLabel($i, 14, $list->o);
			$this->ifunction->xlsWriteLabel($i, 15, $list->p);
			$this->ifunction->xlsWriteLabel($i, 16, $list->q);
			$this->ifunction->xlsWriteLabel($i, 17, $list->r);
			$this->ifunction->xlsWriteLabel($i, 18, $list->s);
			$this->ifunction->xlsWriteLabel($i, 19, $list->t);
			$i++;
		}
		$this->ifunction->xlsEOF();
	}
	
	public function atpx()
	{
		header("Pragma: public");
		header("Expires: 0");
		header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
		header("Content-Type: application/force-download");
		header("Content-Type: application/octet-stream");
		header("Content-Type: application/download");
		header("Content-type: application/x-msexcel");
		header("Content-Disposition: attachment; filename=ATP_all.xls");
		header("Content-Transfer-Encoding: binary");
		
		$this->ifunction->xlsBOF();
		$this->ifunction->xlsWriteLabel(0, 0, 'Vendor Name');
		$this->ifunction->xlsWriteLabel(0, 1, 'Project Name');
		$this->ifunction->xlsWriteLabel(0, 2, 'Document Name/Task Type');
		$this->ifunction->xlsWriteLabel(0, 3, 'Site ID');
		$this->ifunction->xlsWriteLabel(0, 4, 'Site Name');
		$this->ifunction->xlsWriteLabel(0, 5, 'City');
		$this->ifunction->xlsWriteLabel(0, 6, 'NE ID');
		$this->ifunction->xlsWriteLabel(0, 7, 'SN Factory');
		$this->ifunction->xlsWriteLabel(0, 8, 'Barcode Indosat');
		$this->ifunction->xlsWriteLabel(0, 9, 'Material Description');
		$this->ifunction->xlsWriteLabel(0, 10, 'Qty');
		$this->ifunction->xlsWriteLabel(0, 11, 'UoM');
		$this->ifunction->xlsWriteLabel(0, 12, 'Status Approval');
		$this->ifunction->xlsWriteLabel(0, 13, 'Status SAP');
		
		$i = 1;
		$Qlist = $this->db->query("
			SELECT a.`atp_id`,
d.`name` AS 'a', a.`title` AS 'b', a.`brand` AS 'c',  b.`id` AS 'd', b.`name` AS 'e', b.`city` AS 'f', a.`neid` AS 'g', e.`serial_no` AS 'h', e.`barcode` AS 'i', e.`note` AS 'j', e.`qty` AS 'k', e.`uom` AS 'l', IF(a.`fl_status`=0, 'Need Indosat Approval To Active', IF(a.`order_supervisor`=3, 'Pending Approval PM Vendor', IF(a.`order_manager`=3, 'Pending Approval Consultant', IF(a.`order_indosat`=3, 'Pending Approval PM Indosat', IF(a.`order_indosat`=1, 'Final Approved by PM Indosat', ''))))) AS 'm', 'Creation' AS 'n'
FROM `it_atp` a
JOIN `it_site` b ON b.`site_id`=a.`site_id`
LEFT JOIN `it_book` c ON c.`idx`=a.`atp_id` AND c.`table`='atp'
LEFT JOIN `it_vendor` d ON (a.`vendor_id` = d.`vendor_id`)
JOIN `it_site_part` e ON (e.`atp_id` = a.`atp_id`)
WHERE a.`fl_status` IN(0, 1, 2, 3)
ORDER BY a.`atp_id` DESC
		");
		foreach($Qlist->result_object() as $list){
			$this->ifunction->xlsWriteLabel($i, 0, $list->a);
			$this->ifunction->xlsWriteLabel($i, 1, $list->b);
			$this->ifunction->xlsWriteLabel($i, 2, $list->c);
			$this->ifunction->xlsWriteLabel($i, 3, $list->d);
			$this->ifunction->xlsWriteLabel($i, 4, $list->e);
			$this->ifunction->xlsWriteLabel($i, 5, $list->f);
			$this->ifunction->xlsWriteLabel($i, 6, $list->g);
			$this->ifunction->xlsWriteLabel($i, 7, $list->h);
			$this->ifunction->xlsWriteLabel($i, 8, $list->i);
			$this->ifunction->xlsWriteLabel($i, 9, $list->j);
			$this->ifunction->xlsWriteLabel($i, 10, $list->k);
			$this->ifunction->xlsWriteLabel($i, 11, $list->l);
			$this->ifunction->xlsWriteLabel($i, 12, $list->m);
			$this->ifunction->xlsWriteLabel($i, 13, $list->n);
			$i++;
		}
		$this->ifunction->xlsEOF();
	}
}