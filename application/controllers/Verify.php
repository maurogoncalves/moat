<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');class Verify extends CI_Controller {		function __construct(){
	   parent::__construct();	   $this->load->model('User_model','',TRUE);
	   $this->load->library('session');
	   $this->load->library('form_validation');
	   $this->load->helper('url');	 
		
	}		public function index(){		$password = $this->input->post('password');			$username = $this->input->post('username');		$password = hash('sha256', $password);
		//query the database		
		$dadosUsuario =$this->User_model->login($username, $password);				   		if($dadosUsuario){			 $sess_array = array(				 'codigo' => $dadosUsuario[0]->codigo,				 'username' => $dadosUsuario[0]->username,				 'role' => $dadosUsuario[0]->role,			   );				$_SESSION['login'] = $sess_array;						redirect('admin/listArtist', 'refresh');		}else{			$this->session->set_flashdata('mensagem',"Sorry, we couldn't find an account with this username. <br> Please check you're using the right username and try again");			redirect('/Login', 'refresh');							}
	}
	

}
