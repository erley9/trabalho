<?php

require_once("crud_model.php");

class certificados_model extends Crud_model{
   

public function __construct() {
    parent::__construct();
    $this->tabela="certificados";
    $this->controller="certificados";
}
    
}

?>
