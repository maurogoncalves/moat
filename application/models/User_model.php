<?php
Class User_model extends CI_Model
{
 function login($username, $password){
   $this -> db -> select('users.codigo, users.full_name,users.role,users.username');
   $this -> db -> from('users');
   $this -> db -> where('users.username', $username);
   $this -> db -> where('users.password', $password);
 
   $query = $this -> db -> get();
	//print_r($this->db->last_query());exit;
   if($query -> num_rows() == 1){
     return $query->result();
   } else {
     return false;
   }
 }
 
 function dadosUsu($id){
   $this -> db -> select('users.id, users.email,users.nome_usuario, users.telefone,users.celular,users.whatsapp');
   $this -> db -> from('users');
   $this -> db -> where('users.id', ($id));
   $query = $this -> db -> get();

   //print_r($this->db->last_query());exit;
   if($query -> num_rows() == 1){
     return $query->result();
   }else{
     return false;
   }
 }
 
 function listarusers(){	
    $sql = "select u.nome_usuario,u.email,s.nome_setor,u.telefone,u.id,u.status from users u left join setor s on s.id = u.id_setor";
	$query = $this->db->query($sql, array());
    $array = $query->result(); 
    return($array);
 }
 
 function listarUsuarioById($id){	
    $sql = "select u.nome_usuario,u.email,s.nome_setor,u.telefone,u.id,s.id as id_setor from users u left join setor s on s.id = u.id_setor where u.id = $id";
	$query = $this->db->query($sql, array());
    $array = $query->result(); 
    return($array);
 }
 
  function listarUsuarioByNome($nome){	
    $sql = "select count(*) as total from users where nome_usuario = '$nome'";
	$query = $this->db->query($sql, array());
	
   if($query -> num_rows() <> 0){
     return $query->result();
   }else{
     return false;
   } 
 }
 
  function listarUsuarioByNomeId($nome,$id){	
    $sql = "select count(*) as total from users where nome_usuario = '$nome' and id <> $id";
	$query = $this->db->query($sql, array());
	
   if($query -> num_rows() <> 0){
     return $query->result();
   }else{
     return false;
   } 
 }
  
 function atualizar($senha,$id){
 	$dados = array('senha' => $senha);
	$this->db->where('id', $id);
	$this->db->update('users', $dados); 
	//print_r($this->db->last_query());exit;
	return true; 
 }
 
 function add($detalhes = array()){
	if($this->db->insert('users', $detalhes)) {
		return $id = $this->db->insert_id();
	}	
}
 
 
   function atualizar_dados_usuario($dados,$id){
 	$this->db->where('id', $id);
	$this->db->update('users', $dados); 
	//print_r($this->db->last_query());exit;
	return true;
 }
 function excluir($id){
	$this->db->where('id', $id);
	$this->db->delete('users'); 
	return true;
 } 
	 
}
?>