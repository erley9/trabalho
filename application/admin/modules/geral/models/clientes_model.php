<?php

require_once("crud_model.php");

class clientes_model extends Crud_model{
   

public function __construct() {
    parent::__construct();
    $this->tabela="clientes";
    $this->controller="clientes";
}


    
}

?>
