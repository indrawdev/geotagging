<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

session_start();

class Form extends CI_Controller {

	function __construct()
	{
		parent::__construct();
        $this->load->database();
		$this->load->helper('url');
		$this->load->model('ifunction');
	}
	
	public function add($tp)
	{
		if(empty($_SESSION['isat']['log'])) exit('<p align="center">Session expired! '.anchor('process/logout', '[Logout]').'</p>');
		$this->load->view('form', array('tp' => 'add_'.$tp));
	}
	
	public function ed($tp, $dx=0)
	{
		if(empty($_SESSION['isat']['log'])) exit('<p align="center">Session expired! '.anchor('process/logout', '[Logout]').'</p>');
		$this->load->view('form', array('tp' => 'ed_'.$tp, 'dx' => $dx));
	}
	
	public function view($tp, $dx=0)
	{
		if(empty($_SESSION['isat']['log'])) exit('<p align="center">Session expired! '.anchor('process/logout', '[Logout]').'</p>');
		$this->load->view('form', array('tp' => 'view_'.$tp, 'dx' => $dx));
	}
	
	public function action($tp, $dx=0)
	{
		if(empty($_SESSION['isat']['log'])) exit('<p align="center">Session expired! '.anchor('process/logout', '[Logout]').'</p>');
		$this->load->view('form', array('tp' => 'action_'.$tp, 'dx' => $dx));
	}
	
	public function photo($tp, $dx=0)
	{
		if(empty($_SESSION['isat']['log'])) exit('<p align="center">Session expired! '.anchor('process/logout', '[Logout]').'</p>');
		$this->load->view('form', array('tp' => 'photo_'.$tp, 'dx' => $dx));
	}
	
	public function booked($tp, $dx=0)
	{
		if(empty($_SESSION['isat']['log'])) exit('<p align="center">Session expired! '.anchor('process/logout', '[Logout]').'</p>');
		$this->load->view('form', array('tp' => $tp.'_booked', 'dx' => $dx));
	}
	
	public function checked($tp, $dx=0)
	{
		if(empty($_SESSION['isat']['log'])) exit('<p align="center">Session expired! '.anchor('process/logout', '[Logout]').'</p>');
		$this->load->view('form', array('tp' => $tp.'_checked', 'dx' => $dx));
	}
	
	public function done($tp, $dx=0)
	{
		if(empty($_SESSION['isat']['log'])) exit('<p align="center">Session expired! '.anchor('process/logout', '[Logout]').'</p>');
		$this->load->view('form', array('tp' => $tp.'_done', 'dx' => $dx));
	}
	
	public function app_wh($tp, $dx=0)
	{
		if(empty($_SESSION['isat']['log'])) exit('<p align="center">Session expired! '.anchor('process/logout', '[Logout]').'</p>');
		$this->load->view('form', array('tp' => $tp.'_app_wh', 'dx' => $dx));
	}
	
	public function msg_wh($tp, $dx=0)
	{
		if(empty($_SESSION['isat']['log'])) exit('<p align="center">Session expired! '.anchor('process/logout', '[Logout]').'</p>');
		$this->load->view('form', array('tp' => $tp.'_msg_wh', 'dx' => $dx));
	}
	
	public function msgs_wh($tp, $dx=0)
	{
		if(empty($_SESSION['isat']['log'])) exit('<p align="center">Session expired! '.anchor('process/logout', '[Logout]').'</p>');
		$this->load->view('form', array('tp' => $tp.'_msgs_wh', 'dx' => $dx));
	}
	
	public function app_nom($tp, $dx=0)
	{
		if(empty($_SESSION['isat']['log'])) exit('<p align="center">Session expired! '.anchor('process/logout', '[Logout]').'</p>');
		$this->load->view('form', array('tp' => $tp.'_app_nom', 'dx' => $dx));
	}
	
	public function msg_nom($tp, $dx=0)
	{
		if(empty($_SESSION['isat']['log'])) exit('<p align="center">Session expired! '.anchor('process/logout', '[Logout]').'</p>');
		$this->load->view('form', array('tp' => $tp.'_msg_nom', 'dx' => $dx));
	}
	
	public function msgs_nom($tp, $dx=0)
	{
		if(empty($_SESSION['isat']['log'])) exit('<p align="center">Session expired! '.anchor('process/logout', '[Logout]').'</p>');
		$this->load->view('form', array('tp' => $tp.'_msgs_nom', 'dx' => $dx));
	}
	
	public function delegate_nom($tp, $dx=0)
	{
		if(empty($_SESSION['isat']['log'])) exit('<p align="center">Session expired! '.anchor('process/logout', '[Logout]').'</p>');
		$this->load->view('form', array('tp' => $tp.'_delegate_nom', 'dx' => $dx));
	}
	
	public function app_vendor($tp, $dx=0)
	{
		if(empty($_SESSION['isat']['log'])) exit('<p align="center">Session expired! '.anchor('process/logout', '[Logout]').'</p>');
		$this->load->view('form', array('tp' => $tp.'_app_vendor', 'dx' => $dx));
	}
	
	public function msg_vendor($tp, $dx=0)
	{
		if(empty($_SESSION['isat']['log'])) exit('<p align="center">Session expired! '.anchor('process/logout', '[Logout]').'</p>');
		$this->load->view('form', array('tp' => $tp.'_msg_vendor', 'dx' => $dx));
	}
	
	public function msgs_vendor($tp, $dx=0)
	{
		if(empty($_SESSION['isat']['log'])) exit('<p align="center">Session expired! '.anchor('process/logout', '[Logout]').'</p>');
		$this->load->view('form', array('tp' => $tp.'_msgs_vendor', 'dx' => $dx));
	}
	
	public function delegate_vendor($tp, $dx=0)
	{
		if(empty($_SESSION['isat']['log'])) exit('<p align="center">Session expired! '.anchor('process/logout', '[Logout]').'</p>');
		$this->load->view('form', array('tp' => $tp.'_delegate_vendor', 'dx' => $dx));
	}
	
	public function app_consultant($tp, $dx=0)
	{
		if(empty($_SESSION['isat']['log'])) exit('<p align="center">Session expired! '.anchor('process/logout', '[Logout]').'</p>');
		$this->load->view('form', array('tp' => $tp.'_app_consultant', 'dx' => $dx));
	}
	
	public function msg_consultant($tp, $dx=0)
	{
		if(empty($_SESSION['isat']['log'])) exit('<p align="center">Session expired! '.anchor('process/logout', '[Logout]').'</p>');
		$this->load->view('form', array('tp' => $tp.'_msg_consultant', 'dx' => $dx));
	}
	
	public function msgs_consultant($tp, $dx=0)
	{
		if(empty($_SESSION['isat']['log'])) exit('<p align="center">Session expired! '.anchor('process/logout', '[Logout]').'</p>');
		$this->load->view('form', array('tp' => $tp.'_msgs_consultant', 'dx' => $dx));
	}
	
	public function delegate_consultant($tp, $dx=0)
	{
		if(empty($_SESSION['isat']['log'])) exit('<p align="center">Session expired! '.anchor('process/logout', '[Logout]').'</p>');
		$this->load->view('form', array('tp' => $tp.'_delegate_consultant', 'dx' => $dx));
	}
	
	public function app_supervisor($tp, $dx=0)
	{
		if(empty($_SESSION['isat']['log'])) exit('<p align="center">Session expired! '.anchor('process/logout', '[Logout]').'</p>');
		$this->load->view('form', array('tp' => $tp.'_app_supervisor', 'dx' => $dx));
	}
	
	public function msg_supervisor($tp, $dx=0)
	{
		if(empty($_SESSION['isat']['log'])) exit('<p align="center">Session expired! '.anchor('process/logout', '[Logout]').'</p>');
		$this->load->view('form', array('tp' => $tp.'_msg_supervisor', 'dx' => $dx));
	}
	
	public function msgs_supervisor($tp, $dx=0)
	{
		if(empty($_SESSION['isat']['log'])) exit('<p align="center">Session expired! '.anchor('process/logout', '[Logout]').'</p>');
		$this->load->view('form', array('tp' => $tp.'_msgs_supervisor', 'dx' => $dx));
	}
	
	public function delegate_supervisor($tp, $dx=0)
	{
		if(empty($_SESSION['isat']['log'])) exit('<p align="center">Session expired! '.anchor('process/logout', '[Logout]').'</p>');
		$this->load->view('form', array('tp' => $tp.'_delegate_supervisor', 'dx' => $dx));
	}
	
	public function app_manager($tp, $dx=0)
	{
		if(empty($_SESSION['isat']['log'])) exit('<p align="center">Session expired! '.anchor('process/logout', '[Logout]').'</p>');
		$this->load->view('form', array('tp' => $tp.'_app_manager', 'dx' => $dx));
	}
	
	public function msg_manager($tp, $dx=0)
	{
		if(empty($_SESSION['isat']['log'])) exit('<p align="center">Session expired! '.anchor('process/logout', '[Logout]').'</p>');
		$this->load->view('form', array('tp' => $tp.'_msg_manager', 'dx' => $dx));
	}
	
	public function msgs_manager($tp, $dx=0)
	{
		if(empty($_SESSION['isat']['log'])) exit('<p align="center">Session expired! '.anchor('process/logout', '[Logout]').'</p>');
		$this->load->view('form', array('tp' => $tp.'_msgs_manager', 'dx' => $dx));
	}
	
	public function delegate_manager($tp, $dx=0)
	{
		if(empty($_SESSION['isat']['log'])) exit('<p align="center">Session expired! '.anchor('process/logout', '[Logout]').'</p>');
		$this->load->view('form', array('tp' => $tp.'_delegate_manager', 'dx' => $dx));
	}
	
	public function app_indosat($tp, $dx=0)
	{
		if(empty($_SESSION['isat']['log'])) exit('<p align="center">Session expired! '.anchor('process/logout', '[Logout]').'</p>');
		$this->load->view('form', array('tp' => $tp.'_app_indosat', 'dx' => $dx));
	}
	
	public function msg_indosat($tp, $dx=0)
	{
		if(empty($_SESSION['isat']['log'])) exit('<p align="center">Session expired! '.anchor('process/logout', '[Logout]').'</p>');
		$this->load->view('form', array('tp' => $tp.'_msg_indosat', 'dx' => $dx));
	}
	
	public function msgs_indosat($tp, $dx=0)
	{
		if(empty($_SESSION['isat']['log'])) exit('<p align="center">Session expired! '.anchor('process/logout', '[Logout]').'</p>');
		$this->load->view('form', array('tp' => $tp.'_msgs_indosat', 'dx' => $dx));
	}
	
	public function delegate_indosat($tp, $dx=0)
	{
		if(empty($_SESSION['isat']['log'])) exit('<p align="center">Session expired! '.anchor('process/logout', '[Logout]').'</p>');
		$this->load->view('form', array('tp' => $tp.'_delegate_indosat', 'dx' => $dx));
	}
	
	public function part($tp, $dx=0)
	{
		if(empty($_SESSION['isat']['log'])) exit('<p align="center">Session expired! '.anchor('process/logout', '[Logout]').'</p>');
		$this->load->view('form', array('tp' => 'part_'.$tp, 'dx' => $dx));
	}
	
	public function master($tp, $dx=0)
	{
		if(empty($_SESSION['isat']['log'])) exit('<p align="center">Session expired! '.anchor('process/logout', '[Logout]').'</p>');
		$this->load->view('form', array('tp' => 'master_'.$tp, 'dx' => $dx));
	}
	
	public function gmap($tp, $dx, $geo)
	{
		if(empty($_SESSION['isat']['log'])) exit('<p align="center">Session expired! '.anchor('process/logout', '[Logout]').'</p>');
		$data['tp'] = $tp;
		$data['dx'] = $dx;
		$data['geo'] = $geo;
		$this->load->view('form', $data);
	}
	
	public function get_site($dx)
	{
		if(empty($_SESSION['isat']['log'])) exit('<p align="center">Session expired! '.anchor('process/logout', '[Logout]').'</p>');
		$this->load->view('form', array('tp' => 'get_site', 'dx' => $dx));
	}
	
	public function my_profile()
	{
		if(empty($_SESSION['isat']['log'])) exit('<p align="center">Session expired! '.anchor('process/logout', '[Logout]').'</p>');
		$this->load->view('form', array('tp' => 'my_profile'));
	}
}