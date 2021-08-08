<?php 
Class Album_model extends CI_Model{  

 function add($detalhes = array()){ 	
		if($this->db->insert('album', $detalhes)){
			$id = $this->db->insert_id();				
				return $id;	
			}		
		return false;	
 }	
 

 
 function list($id){	
    if($id == 0){
		$sql = "select a.id,a.name,a.year,art.name as artist,art.id as id_artist from album a  join artist art on a.artist_id = art.id";
		$query = $this->db->query($sql, array());
	}else{
		$sql = "select a.id,a.name,a.year,art.name as artist,art.id as id_artist from album a  join artist art on a.artist_id = art.id where a.id = ?";
		$query = $this->db->query($sql, array($id));
	}
    
    $array = $query->result(); 
    return($array);
 }
 
 
  function excluir($id){

	$this->db->where('id', $id);
	$this->db->delete('album'); 
	//print_r($this->db->last_query());exit;
	return true;

 } 	
		
 function atualizar($dados,$id){

	$this->db->where('id', $id);
	$this->db->update('album', $dados); 
	//print_r($this->db->last_query());exit;
	return true;

 }
 	
	
}
?>