<?php

require_once("crud_model.php");

class instrutores_model extends Crud_model{
   

public function __construct() {
    parent::__construct();
    $this->tabela="instrutores";
    $this->controller="instrutores";
}
    
}

?>
