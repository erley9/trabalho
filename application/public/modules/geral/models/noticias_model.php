<?php

require_once("crud_model.php");

class noticias_model extends Crud_model{
   

public function __construct() {
    parent::__construct();
    $this->tabela="noticias";
    $this->controller="noticias";
}


    
}

?>
