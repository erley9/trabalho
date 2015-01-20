<?php

require_once("crud_model.php");

class area_model extends Crud_model{
   

public function __construct() {
    parent::__construct();
    $this->tabela="area_atuacao";
    $this->controller="area_atuacao";
}

public function get_all(){
	$this->db->order_by("nome","ASC");
	return $this->db->get($this->tabela);
}
}

?>
