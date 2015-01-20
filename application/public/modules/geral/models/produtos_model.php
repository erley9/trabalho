<?php

require_once("crud_model.php");

class produtos_model extends Crud_model{
   

public function __construct() {
    parent::__construct();
    $this->tabela="produtos";
    $this->controller="produtos";
}


public function buscaProdutoPorSub($subcategoria){

	$this->db->where("categoriafk",$subcategoria);

	return $this->db->get($this->tabela);

}


public function buscaProdutoTexto($texto){

	$this->db->like("titulo",$texto);
	
	$this->db->or_like("descricao",$texto);

	return $this->db->get($this->tabela);

}

}



?>
