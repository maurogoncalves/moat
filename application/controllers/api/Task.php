<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require(APPPATH.'/libraries/REST_Controller.php');
class Task extends REST_Controller
{

       public function __construct() {
               parent::__construct();
               $this->load->model('Artist_model');

       }    
       public function index_get($id = 0){
		   if($id){
			 $r = $this->Artist_model->list($id);  
		   }else{
			 $r = $this->Artist_model->list(0);  
		   }
           
           $this->response($r); 
       }
       
}	   
	   