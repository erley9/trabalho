<?php

require_once("crud_model.php");

class empresa_model extends Crud_model{
   

public function __construct() {
    parent::__construct();
    $this->tabela="empresa";
    $this->controller="empresa";
}


public function loginExists($login){

	$this->db->where("login",$login);

	$query = $this->db->get($this->tabela);

	$quantidade = $query->num_rows();

	if($quantidade>0){
		return true;
	}else{
		return false;
	}
}

public function empresaExists($empresa){
	$this->db->where("empresa",$empresa);

	$query = $this->db->get($this->tabela);

	$quantidade = $query->num_rows();

	if($quantidade>0){
		return true;
	}else{
		return false;
	}
}

public function verificaSenha($usuario,$senha){
	$this->db->where("login",$usuario);
	$this->db->where("senha",$senha);

	$query = $this->db->get($this->tabela);

	$quantidade = $query->num_rows();

	if($quantidade>0){
		return true;
	}else{
		return false;
	}


}


public function buscaEmpresa($busca){

	$this->db->like("nome",$busca);
	return $this->db->get($this->tabela);


}
    
}

?>
