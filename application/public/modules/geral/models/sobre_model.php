<?php

require_once("crud_model.php");

class sobre_model extends Crud_model{
   

public function __construct() {
    parent::__construct();
    $this->tabela="sobre";
    $this->controller="sobre";
}


}

?>
