<?php

require_once("crud_model.php");

class contato_model extends Crud_model{
   

public function __construct() {
    parent::__construct();
    $this->tabela="contato";
    $this->controller="contato";
}
}

?>
