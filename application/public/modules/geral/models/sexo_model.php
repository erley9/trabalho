<?php

require_once("crud_model.php");

class sexo_model extends Crud_model{
   

public function __construct() {
    parent::__construct();
    $this->tabela="sexo";
    $this->controller="sexo";
}


}

?>
