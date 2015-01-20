<?php

require_once("crud_model.php");

class cursos_model extends Crud_model{
   

public function __construct() {
    parent::__construct();
    $this->tabela="curso";
    $this->controller="curso";
}
    
}

?>
