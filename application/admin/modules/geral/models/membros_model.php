<?php

require_once("crud_model.php");

class membros_model extends Crud_model{
   

public function __construct() {
    parent::__construct();
    $this->tabela="membros";
    $this->controller="membros";
}

public function verificaSenhaDados($usuario,$senha){
	
	$this->db->select("*");
	$this->db->from($this->tabela);
	$this->db->join("clientes","membros.clientefk = clientes.id");
	$this->db->where("usuario",$usuario);
	$this->db->where("senha",$senha);
	$this->db->limit(1);
	$query = $this->db->get();

	$quantidade = $query->num_rows();

	if($quantidade>0){
		$dados=$query->row();
		return $dados;
	}else{
		return false;
	}


}

public function buscaEmpresafk($id){
	$this->db->where("clientefk",$id);
	return $this->db->get($this->tabela);
}

    
}

?>