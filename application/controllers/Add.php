<?php 
	   parent::__construct();
	   $this->load->library('session');
	   $this->load->library('form_validation');
	   $this->load->helper('url');	 
		
	}
		//query the database		
		$dadosUsuario =$this->User_model->login($username, $password);
	}
	

}