<?php

require_once("crud_model.php");

class obras_model extends Crud_model{
   

public function __construct() {
    parent::__construct();
    $this->tabela="obras";
    $this->controller="obras";
}
    
}

?>
