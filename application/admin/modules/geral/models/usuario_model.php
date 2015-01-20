<?php

class usuario_model extends Crud_model{
   
public function __construct() {
    parent::__construct();
    $this->tabela="usuario";
    $this->controller="usuario";
}

public function verificaEmail($email){

	$this->db->where("email",$email);

	return $this->db->get($this->tabela);

}


public function verificaLogin($usuario,$senha){

	$this->db->where("email",$usuario);
	$this->db->where("senha",sha1($senha));
	$this->db->limit(1);

	return $this->db->get($this->tabela);
}



    
    
}

?>
