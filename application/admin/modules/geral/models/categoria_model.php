<?php

require_once("crud_model.php");

class categoria_model extends Crud_model{
   

public function __construct() {
    parent::__construct();
    $this->tabela="categoria";
    $this->controller="categoria";
}

public function verificaCategoria($categoria){
	$resultado=$this->db->get_where($this->tabela,array("categoria"=>$categoria));
	if($resultado->num_rows()>0){
		return true;
	}else{
		return false;
	}

}



    
}

?>
