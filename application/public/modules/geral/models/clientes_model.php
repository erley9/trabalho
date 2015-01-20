<?php

require_once("crud_model.php");

class clientes_model extends Crud_model{
   

public function __construct() {
    parent::__construct();
    $this->tabela="clientes";
    $this->controller="clientes";
}

public function buscaClientes($quantidade){
	$this->db->limit($quantidade);
	$this->db->order_by("id","desc");
	return $this->db->get($this->tabela);
}

public function buscaClientesRandom(){

	$this->db->order_by("id",'RANDOM');
	$this->db->limit(5);
	return $this->db->get($this->tabela);
}


    
}

?>
