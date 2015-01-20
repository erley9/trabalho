<?php

require_once("crud_model.php");

class download_model extends Crud_model{
   

public function __construct() {
    parent::__construct();
    $this->tabela="download";
    $this->controller="download";
}


}

?>
