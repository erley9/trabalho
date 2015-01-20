<?php

require_once("crud_model.php");

class subcategoria_model extends Crud_model{
   

public function __construct() {
    parent::__construct();
    $this->tabela="subcategoria";
    $this->controller="subcategoria";
}


public function buscaPorCategoria($id){

	$this->db->where("categoriafk",$id);

	return $this->db->get($this->tabela);
}
    
}

?>
