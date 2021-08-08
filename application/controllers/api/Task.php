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
       public function artist_put(){
           $id = $this->uri->segment(3);

           $data = array('name' => $this->input->get('name'),
           'pass' => $this->input->get('pass'),
           'type' => $this->input->get('type')
           );

            $r = $this->Artist_model->update($id,$data);
               $this->response($r); 
       }

       public function artist_put_post(){
           $data = array('name' => $this->input->post('name'),
           'pass' => $this->input->post('pass'),
           'type' => $this->input->post('type')
           );
           $r = $this->Artist_model->insert($data);
           $this->response($r); 
       }
       public function artist_put_delete(){
           $id = $this->uri->segment(3);
           $r = $this->Artist_model->delete($id);
           $this->response($r); 
       }
}	   
	   