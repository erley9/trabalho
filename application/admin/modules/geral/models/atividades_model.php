<?php

require_once("crud_model.php");

class atividades_model extends Crud_model{
   

public function __construct() {
    parent::__construct();
    $this->tabela="atividades";
    $this->controller="atividades";
}
    
}

?>
