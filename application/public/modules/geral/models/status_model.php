<?php

require_once("crud_model.php");

class status_model extends Crud_model{
   

public function __construct() {
    parent::__construct();
    $this->tabela="status";
    $this->controller="status";
}


}

?>
