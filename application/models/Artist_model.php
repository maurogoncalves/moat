<?php 
Class Artist_model extends CI_Model{  

 function add($detalhes = array()){ 	
		if($this->db->insert('artist', $detalhes)){
			$id = $this->db->insert_id();				
				return $id;	
			}		
		return false;	
 }	
 

 
 function list($id){	
    if($id == 0){
		$sql = "select codigo,name from artist";
		$query = $this->db->query($sql, array());
	}else{
		$sql = "select codigo,name from artist where codigo = ?";
		$query = $this->db->query($sql, array($id));
	}
    
    $array = $query->result(); 
    return($array);
 }
 
 
  function excluir($id){

	$this->db->where('codigo', $id);
	$this->db->delete('artist'); 
	//print_r($this->db->last_query());exit;
	return true;

 } 	
		
 function atualizar($dados,$id){

	$this->db->where('codigo', $id);
	$this->db->update('artist', $dados); 
	//print_r($this->db->last_query());exit;
	return true;

 }
 	
	
}
?>