<?php

require_once("crud_model.php");

class servicosrealizados_model extends Crud_model{
   

public function __construct() {
    parent::__construct();
    $this->tabela="servicosrealizados";
    $this->controller="servicosrealizados";
}
    
}

?>
