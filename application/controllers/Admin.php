<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Admin extends CI_Controller {
	
 function __construct(){
   parent::__construct();
   $this->load->model('User_model','',TRUE);
   $this->load->model('Artist_model','',TRUE);
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
 
 public function cadastro(){
	$this->logado(); 
	$session_data = $_SESSION['login'];
	$dataHeader['usuario'] = $session_data['username'];

	$dataHeader['mensagemInicial'] = 'Todos Cadastros';
	
	
	$this->load->view('header_view_notificacao_adm',$dataHeader);	
	$this->load->view('cadastro_view');
	$this->load->view('footer_view_adm');
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
		$this->session->set_flashdata('messagemSenha', "This artist was recored");
	}
	redirect('Admin/listArtist', 'refresh');
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
 
 
  public function alterarDescricaoEvento(){
	
 }
 
   public function alterarDescricaoDano(){
	$this->logado(); 	   
	$nomeEvento =  $this->input->post('nomeEvento');		
	$idEvento =  $this->input->post('idEvento');		
	$dados = array('descricao_dano' => $nomeEvento);
	$this->Dano_model->atualizarDescricao($dados,$idEvento);	
	redirect('Admin/danos', 'refresh');	
 }
 
 
  public function alterarDescricaoIncidente(){
	$this->logado(); 	   
	$nomeEvento =  $this->input->post('nomeEvento');		
	$idEvento =  $this->input->post('idEvento');		
	$dados = array('descricao_incidente' => $nomeEvento);
	$this->Incidente_model->atualizarDescricao($dados,$idEvento);	
	redirect('Admin/incidentes', 'refresh');	
 }
 
  
  public function excluirSetor(){
	$this->logado(); 	   
	$idEvento =  $this->input->get('id');	
	$dados = array('status' => 1);	
	$this->Setores_model->atualizar($dados,$idEvento);	
	redirect('Admin/Setores', 'refresh');	
 }
 
 public function ativarSetor(){
	$this->logado(); 	   
	$idEvento =  $this->input->get('id');	
	$dados = array('status' => 0);	
	$this->Setores_model->atualizar($dados,$idEvento);	
	redirect('Admin/Setores', 'refresh');	
 }
 
 public function excluirUsuario(){
	$this->logado(); 	   
	$idEvento =  $this->input->get('id');	
	$dados = array('status' => 1);		
	$this->User_model->atualizar_dados_usuario($dados,$idEvento);	
	redirect('Admin/Usuarios', 'refresh');	
 }
 
  public function ativarUsuario(){
	$this->logado(); 	   
	$idEvento =  $this->input->get('id');	
	$dados = array('status' => 0);		
	$this->User_model->atualizar_dados_usuario($dados,$idEvento);	
	redirect('Admin/Usuarios', 'refresh');	
 }
 
    public function excluirDano(){
	$this->logado(); 	   
	$idEvento =  $this->input->get('id');	
	$dados = array('status' => 1);
	$this->Dano_model->atualizarDescricao($dados,$idEvento);	
	
	
	redirect('Admin/danos', 'refresh');	
 }
 
 public function ativarDano(){
	$this->logado(); 	   
	$idEvento =  $this->input->get('id');	
	$dados = array('status' => 0);
	$this->Dano_model->atualizarDescricao($dados,$idEvento);	
	
	
	redirect('Admin/danos', 'refresh');	
 }
 
   public function excluirIncidente(){
	$this->logado(); 	   
	$idEvento =  $this->input->get('id');	

	$dados = array('status' => 1);
	$this->Incidente_model->atualizarDescricao($dados,$idEvento);	
	
	redirect('Admin/incidentes', 'refresh');	
 }
 
  public function ativarIncidente(){
	$this->logado(); 	   
	$idEvento =  $this->input->get('id');	

	$dados = array('status' => 0);
	$this->Incidente_model->atualizarDescricao($dados,$idEvento);	
	
	redirect('Admin/incidentes', 'refresh');	
 }
 
   public function excluirEvento(){
	$this->logado(); 	   
	$idEvento =  $this->input->get('id');	
	$dados = array('status' => 1);	
	$this->Artist_model->atualizarDescricaoEvento($dados,$idEvento);	
	redirect('Admin/eventos', 'refresh');	
 }
 
  public function ativarEvento(){
	$this->logado(); 	   
	$idEvento =  $this->input->get('id');	
	$dados = array('status' => 0);	
	$this->Artist_model->atualizarDescricaoEvento($dados,$idEvento);	
	redirect('Admin/eventos', 'refresh');	
 }
 
 
 
   public function gravarSetor(){
	$this->logado(); 
	   
	$nomeSetor =  $this->input->post('nomeSetor');
	$respSetor =  $this->input->post('respSetor');
	$telSetor =  $this->input->post('telSetor');
	
	
	$dados = array('nome_setor' => $nomeSetor,
					'responsavel' => $respSetor,
					'telefone' => $telSetor
	);
	$this->Setores_model->add($dados);
	
	redirect('Admin/setores', 'refresh');
	
 }
  public function alterarEvento(){
	$this->logado(); 
	   
	$nomeSetor =  $this->input->post('nomeSetor');
	$respSetor =  $this->input->post('respSetor');
	$telSetor =  $this->input->post('telSetor');
	$idSetor =  $this->input->post('idSetor');
	
	
	$dados = array('nome_setor' => $nomeSetor,
					'responsavel' => $respSetor,
					'telefone' => $telSetor
	);
	$this->Setores_model->atualizar($dados,$idSetor);
	
	redirect('Admin/setores', 'refresh');
	
 }
 
 
 public function gravarUsuario(){
	$this->logado(); 
	   
	$nomeUsuario =  $this->input->post('nomeUsuario');
	$senhaUsuario =  $this->input->post('senhaUsuario');
	$emailUsuario =  $this->input->post('emailUsuario');
	$telUsuario =  $this->input->post('telUsuario');
	$setor =  $this->input->post('setor');
	$password = hash('sha256',$senhaUsuario);
		
	
	$dados = array('email' => $emailUsuario,
					'nome_usuario' => $nomeUsuario,
					'telefone' => $telUsuario,
					'id_setor' => $setor,
					'senha' => $password
	);
	$this->User_model->add($dados);
	
	redirect('Admin/usuarios', 'refresh');
	
 }
 
 public function alterarUsuario(){
	$this->logado(); 
	   
	$nomeUsuario =  $this->input->post('nomeUsuario');
	$senhaUsuario =  $this->input->post('senhaUsuario');
	$emailUsuario =  $this->input->post('emailUsuario');
	$telUsuario =  $this->input->post('telUsuario');
	$setor =  $this->input->post('setor');
	$idUsuario =  $this->input->post('idUsuario');
	$password = hash('sha256',$senhaUsuario);
		
	
	$dados = array('email' => $emailUsuario,
					'nome_usuario' => $nomeUsuario,
					'telefone' => $telUsuario,
					'id_setor' => $setor,
					'senha' => $password
	);
	$this->User_model->atualizar_dados_usuario($dados,$idUsuario);
	
	redirect('Admin/usuarios', 'refresh');
	
 }
 
 function logado(){
	 
	if(empty($_SESSION['login'])){
		redirect('login', 'refresh');		
    } 
	
 } 
	
}
