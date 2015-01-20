<?php

require_once("crud_model.php");

class servicos_model extends Crud_model{
   

public function __construct() {
    parent::__construct();
    $this->tabela="servicos";
    $this->controller="servicos";
}
    
}

?>
