<?php

require_once("crud_model.php");

class palavra_model extends Crud_model{
   

public function __construct() {
    parent::__construct();
    $this->tabela="palavras";
    $this->controller="palavras";
}


public function buscaCategoriaFk($categoria){

	$this->db->where("categoriafk",$categoria);
	return $this->db->get($this->tabela);

}
    
}

?>
