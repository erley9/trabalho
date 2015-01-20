<?php

require_once("crud_model.php");

class galeria_model extends Crud_model{
   

public function __construct() {
    parent::__construct();
    $this->tabela="fotos";
    $this->controller="fotos";
}
    


public function buscaGaleriaFotos($modalidade){

	$this->db->where("galeriafk",$modalidade);
	return $this->db->get($this->tabela);

}


}

?>
