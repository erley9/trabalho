<?php

require_once("crud_model.php");

class banner_model extends Crud_model{
   

public function __construct() {
    parent::__construct();
    $this->tabela="banner";
    $this->controller="banner";
}
    
}

?>
