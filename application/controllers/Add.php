<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');class Add extends CI_Controller {		function __construct(){
	   parent::__construct();	   $this->load->model('User_model','',TRUE);
	   $this->load->library('session');
	   $this->load->library('form_validation');
	   $this->load->helper('url');	 
		
	}		public function index(){		$password = $this->input->post('password');			$username = $this->input->post('username');		$fullname = $this->input->post('fullname');		$role = $this->input->post('role');				$password = hash('sha256', $password);
		//query the database						$data = array('username' => $username,'full_name' => $fullname,'password' => $password,'role'=>$role);        
		$dadosUsuario =$this->User_model->login($username, $password);					   		if($dadosUsuario){			$this->session->set_flashdata('mensagem',"Sorry, we find an account with this username. <br> Please choose other username and try again");			redirect('/Register', 'refresh');			}else{			$id =$this->User_model->add($data);			 $sess_array = array(				 'codigo' => $id,				 'username' => $username,				 'role' => $role,			   );			$_SESSION['login'] = $sess_array;					redirect('admin', 'refresh');				}
	}
	

}
