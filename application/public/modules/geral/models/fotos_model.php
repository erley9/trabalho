<?php

require_once("crud_model.php");

class fotos_model extends Crud_model{
   

public function __construct() {
    parent::__construct();
    $this->tabela="fotos";
    $this->controller="fotos";
}


public function buscaFotos($galeria){
	$this->db->where("galeriafk",$galeria);
	return $this->db->get($this->tabela);
}
    
}

?>
