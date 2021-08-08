<?php
Class User_model extends CI_Model
{
 function login($username, $password){
   $this -> db -> select('users.id, users.full_name,users.role,users.username');
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
 

 
 function add($detalhes = array()){
	if($this->db->insert('users', $detalhes)) {
		return $id = $this->db->insert_id();
	}	
}
 
 
}
?>