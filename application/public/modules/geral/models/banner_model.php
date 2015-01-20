<?php

require_once("crud_model.php");

class banner_model extends Crud_model{
   

public function __construct() {
    parent::__construct();
    $this->tabela="banner";
    $this->controller="banner";
}


public function buscaBannerPagina($id){

	$this->db->where("pagina",$id);

	return $this->db->get($this->tabela);



}

}

?>
