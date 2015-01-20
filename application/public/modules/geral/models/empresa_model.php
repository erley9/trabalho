<?php

require_once("crud_model.php");

class empresa_model extends Crud_model{
   

public function __construct() {
    parent::__construct();
    $this->tabela="sobre";
    $this->controller="sobre";
}


public function verificaLogin($usuario,$senha){

	$this->db->where("email",$usuario);
	$this->db->where("senha",sha1($senha));
	$this->db->limit(1);

	return $this->db->get($this->tabela);
}

public function verificaEmail($email){

	$this->db->where("email",$email);

	return $this->db->get($this->tabela);

}


    
}

?>
