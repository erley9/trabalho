<?php

require_once("crud_model.php");

class experiencia_model extends Crud_model{
   

public function __construct() {
    parent::__construct();
    $this->tabela="experiencia";
    $this->controller="experiencia";
}


public function buscaFormacoesPorCurriculo($curriculo){

	$this->db->where("curriculofk",$curriculo);
	return $this->db->get($this->tabela);
}


}

?>
