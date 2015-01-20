<?php

require_once("crud_model.php");

class objetivos_model extends Crud_model{
   

public function __construct() {
    parent::__construct();
    $this->tabela="objetivo_profissional";
    $this->controller="objetivo_profissional";
}



public function buscaCursosPorCurriculo($curriculo){

	$this->db->where("curriculofk",$curriculo);
	return $this->db->get($this->tabela);
}


public function buscaCurriculoporCargo($cargo){

	$this->db->like("cargo",$cargo);
	$this->db->group_by("curriculofk");
	return $this->db->get($this->tabela);

}



}

?>
