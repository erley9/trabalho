<?php

require_once("crud_model.php");

class eventos_model extends Crud_model{
   

public function __construct() {
    parent::__construct();
    $this->tabela="eventos";
    $this->controller="eventos";
}
    
}

?>
