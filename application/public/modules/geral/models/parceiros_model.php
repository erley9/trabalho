<?php

require_once("crud_model.php");

class parceiros_model extends Crud_model{
   

public function __construct() {
    parent::__construct();
    $this->tabela="parceiros";
    $this->controller="parceiros";
}
    
}

?>
