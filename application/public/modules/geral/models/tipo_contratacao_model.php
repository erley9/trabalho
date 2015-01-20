<?php

require_once("crud_model.php");

class tipo_contratacao_model extends Crud_model{
   

public function __construct() {
    parent::__construct();
    $this->tabela="tipo_contratacao";
    $this->controller="tipo_contratacao";
}


}

?>
