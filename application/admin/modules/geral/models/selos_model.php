<?php

require_once("crud_model.php");

class selos_model extends Crud_model{
   

public function __construct() {
    parent::__construct();
    $this->tabela="selos";
    $this->controller="selos";
}
    
}

?>
