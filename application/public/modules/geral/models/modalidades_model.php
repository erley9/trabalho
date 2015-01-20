<?php

require_once("crud_model.php");

class modalidades_model extends Crud_model{
   

public function __construct() {
    parent::__construct();
    $this->tabela="produtos";
    $this->controller="produtos";
}


public function buscaProdutos($quantidade = null){

	if($quantidade != null){
		$this->db->limit($quantidade);
	}

	$this->db->order_by("id","desc");

	return $this->db->get($this->tabela);

}


}

?>
