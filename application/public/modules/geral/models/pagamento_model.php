<?php

require_once("crud_model.php");

class pagamento_model extends Crud_model{
   

public function __construct() {
    parent::__construct();
    $this->tabela="pagamento";
    $this->controller="pagamento";
}


public function buscaPorCodigo($codigo){

	$this->db->where("codigo_pagseguro",$codigo);

	return $this->db->get($this->tabela);
}


}

?>
