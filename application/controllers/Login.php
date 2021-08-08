<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	
	function __construct(){
	   parent::__construct();
	   $this->load->library('session');
	   $this->load->library('form_validation');
	   $this->load->helper('url');	 
		
	}
	public function index()
	{
		//print$this->config->base_url();exit;
		
		$this->load->helper(array('form'));
		$dataHeader['mensagemInicial'] = 'RESTRITED';
		$this->load->view('header_view',$dataHeader);	
		$this->load->view('login_view');
		$this->load->view('footer_view');
		
	}
	
	function logout(){
		$_SESSION['login'] = '';
		session_destroy();
		 redirect('login', 'refresh');
	}
	

}
