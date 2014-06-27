<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

session_start();

class Main extends CI_Controller {

	function __construct()
	{
		parent::__construct();
        $this->load->database();
		$this->load->helper(array('html', 'url'));
		$this->load->model('ifunction');
	}
	
	public function index()
	{
		$this->load->view('template/meta');
		$this->load->view('template/header');
		if(isset($_SESSION['isat']['log'])){
			$this->load->view('template/mainmenu');
			$this->load->view('dashboard');
		}
		else $this->load->view('login');
		$this->load->view('template/footer');
	}
	
	public function reports($t='page', $p=0, $s=0)
	{
		$this->load->view('template/meta');
		$this->load->view('template/header');
		if(isset($_SESSION['isat']['log'])){
			$this->load->view('template/mainmenu');
			$this->load->view('reports', array('t' => $t, 'p' => $p, 's' => $s));
		}
		else $this->load->view('login');
		$this->load->view('template/footer');
	}
	
	/*public function faq($t='page', $p=0, $s=0)
	{
		$this->load->view('template/meta');
		$this->load->view('template/header');
		if(isset($_SESSION['isat']['log'])){
			$this->load->view('template/mainmenu');
			$this->load->view('faq', array('t' => $t, 'p' => $p, 's' => $s));
		}
		else $this->load->view('login');
		$this->load->view('template/footer');
	}*/
	
	public function atm($t='page', $p=0, $s=0, $sort='atm_id-desc')
	{
		$this->load->view('template/meta');
		$this->load->view('template/header');
		if(isset($_SESSION['isat']['log'])){
			$this->load->view('template/mainmenu');
			$this->load->view('atm/list', array('t' => $t, 'p' => $p, 's' => $s, 'sort' => $sort));
		}
		else $this->load->view('login');
		$this->load->view('template/footer');
	}
	
	public function atm_app($t='page', $p=0, $s=0, $sort='atm_id-desc')
	{
		$this->load->view('template/meta');
		$this->load->view('template/header');
		if(isset($_SESSION['isat']['log'])){
			$this->load->view('template/mainmenu');
			$this->load->view('atm/app', array('t' => $t, 'p' => $p, 's' => $s, 'sort' => $sort));
		}
		else $this->load->view('login');
		$this->load->view('template/footer');
	}
	
	public function atm_pending($t='page', $p=0, $s=0, $sort='atm_id-desc')
	{
		$this->load->view('template/meta');
		$this->load->view('template/header');
		if(isset($_SESSION['isat']['log'])){
			$this->load->view('template/mainmenu');
			$this->load->view('atm/pending', array('t' => $t, 'p' => $p, 's' => $s, 'sort' => $sort));
		}
		else $this->load->view('login');
		$this->load->view('template/footer');
	}
	
	public function atp($t='page', $p=0, $s=0, $sort='atp_id-desc')
	{
		$this->load->view('template/meta');
		$this->load->view('template/header');
		if(isset($_SESSION['isat']['log'])){
			$this->load->view('template/mainmenu');
			$this->load->view('atp/list', array('t' => $t, 'p' => $p, 's' => $s, 'sort' => $sort));
		}
		else $this->load->view('login');
		$this->load->view('template/footer');
	}
	
	public function atp_app($t='page', $p=0, $s=0, $sort='atp_id-desc')
	{
		$this->load->view('template/meta');
		$this->load->view('template/header');
		if(isset($_SESSION['isat']['log'])){
			$this->load->view('template/mainmenu');
			$this->load->view('atp/app', array('t' => $t, 'p' => $p, 's' => $s, 'sort' => $sort));
		}
		else $this->load->view('login');
		$this->load->view('template/footer');
	}
	
	public function atp_pending($t='page', $p=0, $s=0, $sort='atp_id-desc')
	{
		$this->load->view('template/meta');
		$this->load->view('template/header');
		if(isset($_SESSION['isat']['log'])){
			$this->load->view('template/mainmenu');
			$this->load->view('atp/pending', array('t' => $t, 'p' => $p, 's' => $s, 'sort' => $sort));
		}
		else $this->load->view('login');
		$this->load->view('template/footer');
	}
	
	public function ss($t='page', $p=0, $s=0, $sort='ss_id-desc')
	{
		$this->load->view('template/meta');
		$this->load->view('template/header');
		if(isset($_SESSION['isat']['log'])){
			$this->load->view('template/mainmenu');
			$this->load->view('ss/list', array('t' => $t, 'p' => $p, 's' => $s, 'sort' => $sort));
		}
		else $this->load->view('login');
		$this->load->view('template/footer');
	}
	
	public function ss_app($t='page', $p=0, $s=0, $sort='ss_id-desc')
	{
		$this->load->view('template/meta');
		$this->load->view('template/header');
		if(isset($_SESSION['isat']['log'])){
			$this->load->view('template/mainmenu');
			$this->load->view('ss/app', array('t' => $t, 'p' => $p, 's' => $s, 'sort' => $sort));
		}
		else $this->load->view('login');
		$this->load->view('template/footer');
	}
	
	public function ss_pending($t='page', $p=0, $s=0, $sort='ss_id-desc')
	{
		$this->load->view('template/meta');
		$this->load->view('template/header');
		if(isset($_SESSION['isat']['log'])){
			$this->load->view('template/mainmenu');
			$this->load->view('ss/pending', array('t' => $t, 'p' => $p, 's' => $s, 'sort' => $sort));
		}
		else $this->load->view('login');
		$this->load->view('template/footer');
	}
	
	public function site($t='page', $p=0, $s=0)
	{
		$this->load->view('template/meta');
		$this->load->view('template/header');
		if(isset($_SESSION['isat']['log'])){
			$this->load->view('template/mainmenu');
			if(in_array($_SESSION['isat']['role'], array('0', '1', '3', '2', '4', '5'), true)) $this->load->view('site/list', array('t' => $t, 'p' => $p, 's' => $s));
		}
		else $this->load->view('login');
		$this->load->view('template/footer');
	}
	
	public function vendors($t='page', $p=0, $s=0, $sort='vendor_id-desc')
	{
		$this->load->view('template/meta');
		$this->load->view('template/header');
		if(isset($_SESSION['isat']['log'])){
			$this->load->view('template/mainmenu');
			if($_SESSION['isat']['role']==1) $this->load->view('vendor/list', array('t' => $t, 'p' => $p, 's' => $s, 'sort' => $sort));
		}
		else $this->load->view('login');
		$this->load->view('template/footer');
	}
	
	public function users($t='page', $p=0, $s=0, $sort='name-asc')
	{
		$this->load->view('template/meta');
		$this->load->view('template/header');
		if(isset($_SESSION['isat']['log'])){
			$this->load->view('template/mainmenu');
			if($_SESSION['isat']['role']==1) $this->load->view('user/list', array('t' => $t, 'p' => $p, 's' => $s, 'sort' => $sort));
		}
		else $this->load->view('login');
		$this->load->view('template/footer');
	}
}