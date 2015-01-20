<?php

require_once("crud_model.php");

class tipo_model extends Crud_model{
   

public function __construct() {
    parent::__construct();
    $this->tabela="tipo";
    $this->controller="tipo";
}


}

?>
