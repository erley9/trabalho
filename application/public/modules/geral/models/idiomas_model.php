<?php

require_once("crud_model.php");

class idiomas_model extends Crud_model{
   

public function __construct() {
    parent::__construct();
    $this->tabela="idiomas";
    $this->controller="idiomas";
}


public function buscaCursosPorCurriculo($curriculo){

	$this->db->where("curriculofk",$curriculo);
	return $this->db->get($this->tabela);
}



}

?>
