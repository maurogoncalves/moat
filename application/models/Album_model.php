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
		$sql = "select a.codigo,a.name,a.year,art.name as artist,art.codigo as id_artist from album a  join artist art on a.artist_id = art.codigo";
		$query = $this->db->query($sql, array());
	}else{
		$sql = "select a.codigo,a.name,a.year,art.name as artist,art.codigo as id_artist from album a  join artist art on a.artist_id = art.codigo where a.codigo = ?";
		$query = $this->db->query($sql, array($id));
	}
    
    $array = $query->result(); 
    return($array);
 }
 
 
  function excluir($id){

	$this->db->where('codigo', $id);
	$this->db->delete('album'); 
	//print_r($this->db->last_query());exit;
	return true;

 } 	
		
 function atualizar($dados,$id){

	$this->db->where('codigo', $id);
	$this->db->update('album', $dados); 
	//print_r($this->db->last_query());exit;
	return true;

 }
 	
	
}
?>