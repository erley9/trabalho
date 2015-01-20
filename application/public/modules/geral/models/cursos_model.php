<?php

require_once("crud_model.php");

class cursos_model extends Crud_model{
   

public function __construct() {
    parent::__construct();
    $this->tabela="cursos";
    $this->controller="cursos";
}


public function buscaCursosPorCurriculo($curriculo){

	$this->db->where("curriculofk",$curriculo);
	return $this->db->get($this->tabela);
}



}

?>
