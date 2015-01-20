<?php

require_once("crud_model.php");

class faixa_model extends Crud_model{
   

public function __construct() {
    parent::__construct();
    $this->tabela="faixa";
    $this->controller="faixa";
}


}

?>
