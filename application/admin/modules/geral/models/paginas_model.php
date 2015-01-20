<?php

require_once("crud_model.php");

class paginas_model extends Crud_model{
   

public function __construct() {
    parent::__construct();
    $this->tabela="paginas";
    $this->controller="paginas";
}
    
}

?>
