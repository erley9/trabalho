<?php

require_once("crud_model.php");

class email_model extends Crud_model{
   

public function __construct() {
    parent::__construct();
    $this->tabela="email";
    $this->controller="email";
}


}

?>
