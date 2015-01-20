<?php

require_once("crud_model.php");

class periodos_model extends Crud_model{
   

public function __construct() {
    parent::__construct();
    $this->tabela="periodos";
    $this->controller="periodos";
}


}

?>
