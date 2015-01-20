<?php

require_once("crud_model.php");

class produtos_model extends Crud_model{
   

public function __construct() {
    parent::__construct();
    $this->tabela="produtos";
    $this->controller="produtos";
}




?>
