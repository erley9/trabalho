<?php

require_once("crud_model.php");

class estados_model extends Crud_model{
   

public function __construct() {
    parent::__construct();
    $this->tabela="estados";
    $this->controller="estados";
}


}

?>
