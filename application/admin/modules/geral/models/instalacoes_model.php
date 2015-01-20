<?php

require_once("crud_model.php");

class instalacoes_model extends Crud_model{
   

public function __construct() {
    parent::__construct();
    $this->tabela="instalacoes";
    $this->controller="instalacoes";
}
    
}

?>
