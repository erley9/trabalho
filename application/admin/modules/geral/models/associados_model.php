<?php

require_once("crud_model.php");

class associados_model extends Crud_model{
   

public function __construct() {
    parent::__construct();
    $this->tabela="associados";
    $this->controller="associados";
}
    
}

?>
