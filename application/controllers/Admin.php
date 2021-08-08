<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Admin extends CI_Controller {
	
 function __construct(){
   parent::__construct();
   $this->load->model('User_model','',TRUE);
   $this->load->model('Artist_model','',TRUE);
   $this->load->model('Album_model','',TRUE);
   $this->load->library('session');
   $this->load->library('form_validation');
   $this->load->helper('url');
  
 }
 
 public function index(){
	$this->logado(); 

	$session_data = $_SESSION['login'];
	

	$dataHeader['usuario'] = $session_data['username'];

	$dataHeader['usuario'] = $session_data['username'];
	$dataHeader['mensagemInicial'] = 'Admin';
	$this->load->view('header_view_adm',$dataHeader);	
	$this->load->view('admin_view');
	$this->load->view('footer_view');
 }
 

 public function listArtist(){

	$this->logado(); 
	$session_data = $_SESSION['login'];
	$dataHeader['usuario'] = $session_data['username'];
	$dataHeader['role'] = $session_data['role'];
	$data['mensagem'] = $this->session->flashdata('messagemSenha');

	
	$data['eventos'] = $this->Artist_model->list(0);
	
	$this->load->view('header_view_adm',$dataHeader);	
	$this->load->view('list_artist_view',$data);
	$this->load->view('footer_view');
 }

 public function listAlbum(){

	$this->logado(); 
	$session_data = $_SESSION['login'];
	$dataHeader['usuario'] = $session_data['username'];
	$dataHeader['role'] = $session_data['role'];
	$data['mensagem'] = $this->session->flashdata('messagemSenha');

	
	$data['eventos'] = $this->Album_model->list(0);
	
	$this->load->view('header_view_adm',$dataHeader);	
	$this->load->view('list_album_view',$data);
	$this->load->view('footer_view');
 }

  public function addChangeArtist(){
	$this->logado(); 
	$session_data = $_SESSION['login'];
	$dataHeader['usuario'] = $session_data['username'];
	$dataHeader['role'] = $session_data['role'];
	
	$name =  $this->input->post('name');		
	$codigo =  $this->input->post('codigo');		
	$op =  $this->input->post('op');		
	
	$dados = array('name' => $name);
	if($op == 1){
		$this->Artist_model->atualizar($dados,$codigo);	
		$this->session->set_flashdata('messagemSenha', "This artist was updated");
	}else{
		$this->Artist_model->add($dados);	
		$this->session->set_flashdata('messagemSenha', "This artist was added");
	}
	redirect('Admin/listArtist', 'refresh');
 }
 
   public function addChangeAlbum(){
	$this->logado(); 
	$session_data = $_SESSION['login'];
	$dataHeader['usuario'] = $session_data['username'];
	$dataHeader['role'] = $session_data['role'];
	
	$name =  $this->input->post('name');		
	$codigo =  $this->input->post('codigo');
	$codigoAlbum =  $this->input->post('codigoAlbum');
	
	
	$year =  $this->input->post('year');		
	$op =  $this->input->post('op');		
	
	$dados = array('name' => $name,'artist_id' => $codigo,'year' => $year);
	
	
	
	if($op == 1){
		$this->Album_model->atualizar($dados,$codigoAlbum);	
		$this->session->set_flashdata('messagemSenha', "This album was updated");
	}else{
		$this->Album_model->add($dados);	
		$this->session->set_flashdata('messagemSenha', "This album was added");
	}


	redirect('Admin/listAlbum', 'refresh');
 }
 
  public function editArtist(){
	$this->logado(); 
	$session_data = $_SESSION['login'];
	$dataHeader['usuario'] = $session_data['username'];
	$dataHeader['role'] = $session_data['role'];
	
	$id =  $this->input->get('id');
	
	$data['usuario'] =  $this->Artist_model->list($id);
	
	if(count($data['usuario']) == 0 ){
		$this->session->set_flashdata('messagemSenha', "This artist doesn't exist");
		redirect('Admin/listArtist', 'refresh');	
	}
	
	$this->load->view('header_view_adm',$dataHeader);	
	$this->load->view('edit_artist_view',$data);
	$this->load->view('footer_view',$dataHeader);	
 }
 
   public function editAlbum(){
	$this->logado(); 
	$session_data = $_SESSION['login'];
	$dataHeader['usuario'] = $session_data['username'];
	$dataHeader['role'] = $session_data['role'];
	
	$id =  $this->input->get('id');
	
	$data['usuario'] =  $this->Album_model->list($id);
	
	if(count($data['usuario']) == 0 ){
		$this->session->set_flashdata('messagemSenha', "This album doesn't exist");
		redirect('Admin/listAlbum', 'refresh');	
	}
	
	$data['artist'] = $this->Artist_model->list(0);
	$this->load->view('header_view_adm',$dataHeader);	
	$this->load->view('edit_album_view',$data);
	$this->load->view('footer_view',$dataHeader);	
 }
 
   public function addArtist(){
	$this->logado(); 
	$session_data = $_SESSION['login'];
	$dataHeader['usuario'] = $session_data['username'];
	$dataHeader['role'] = $session_data['role'];
	$data='';

	$this->load->view('header_view_adm',$dataHeader);	
	$this->load->view('add_artist_view',$data);
	$this->load->view('footer_view',$dataHeader);	
 }
 
   public function addAlbum(){
	$this->logado(); 
	$session_data = $_SESSION['login'];
	$dataHeader['usuario'] = $session_data['username'];
	$dataHeader['role'] = $session_data['role'];
	$data['artist'] = $this->Artist_model->list(0);
	
	$this->load->view('header_view_adm',$dataHeader);	
	$this->load->view('add_album_view',$data);
	$this->load->view('footer_view',$dataHeader);	
 }
 
 public function delArtist(){
	$this->logado(); 
	$session_data = $_SESSION['login'];
	
	$id =  $this->input->get('id');
	
	$data['usuario'] =  $this->Artist_model->list($id);
	
	if(count($data['usuario']) == 0 ){
		$this->session->set_flashdata('messagemSenha', "This artist doesn't exist");
		redirect('Admin/listArtist', 'refresh');	
	}else{
		if($session_data['role'] == 1){
			$this->Artist_model->excluir($id);				
			$this->session->set_flashdata('messagemSenha', "This artist doesn't exist");
		}else{
			$this->session->set_flashdata('messagemSenha', "You can't delete an artist");
		}
		redirect('Admin/listArtist', 'refresh');	
	}
	
	
 }
 
  public function delAlbum(){
	$this->logado(); 
	$session_data = $_SESSION['login'];
	
	$id =  $this->input->get('id');
	
	$data['usuario'] =  $this->Album_model->list($id);
	if(count($data['usuario']) == 0 ){
		$this->session->set_flashdata('messagemSenha', "This album doesn't exist");
		redirect('Admin/listAlbum', 'refresh');	
	}else{
		if($session_data['role'] == 1){
			$this->Album_model->excluir($id);				
			$this->session->set_flashdata('messagemSenha', "This album was deleted");
		}else{
			$this->session->set_flashdata('messagemSenha', "You can't delete an album");
		}
		redirect('Admin/listAlbum', 'refresh');	
	}
	
	
 }
  
 function logado(){
	 
	if(empty($_SESSION['login'])){
		redirect('login', 'refresh');		
    } 
	
 } 
 
 function logout(){
	session_destroy();
	redirect('login', 'refresh');		
    
 } 
	
}
