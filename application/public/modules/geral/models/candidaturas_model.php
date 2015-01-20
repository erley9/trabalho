<?php

require_once("crud_model.php");

class candidaturas_model extends Crud_model{
   

public function __construct() {
    parent::__construct();
    $this->tabela="candidaturas";
    $this->controller="candidaturas";
}

public function buscaCandidatosdaVaga($vaga){

	$this->db->where("vagafk",$vaga);
	$this->db->where("status","participando");
	return $this->db->get($this->tabela);

}

public function buscaCandidatosdaVaga2($vaga){

	$this->db->where("vagafk",$vaga);
	return $this->db->get($this->tabela);

}

public function buscaVagasCandidato($curriculo){
	$this->db->where("curriculofk",$curriculo);
	return $this->db->get($this->tabela);
}



}