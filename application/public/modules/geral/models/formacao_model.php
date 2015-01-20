<?php

require_once("crud_model.php");

class formacao_model extends Crud_model{
   

public function __construct() {
    parent::__construct();
    $this->tabela="formacao";
    $this->controller="formacao";
}


public function buscaFormacoesPorCurriculo($curriculo){

	$this->db->where("curriculofk",$curriculo);
	return $this->db->get($this->tabela);
}


}

?>
