<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Formatadata {
	protected $ci;
    public function __construct()
    {
        $ci= & get_instance();
        $ci->load->helper('url');

    }

   public function formataDataMySQL($data){
        $dataExplodida=explode("-", $data);
        $dia=$dataExplodida[2];
        $mes=$dataExplodida[1];
        $ano=$dataExplodida[0];
        $formatada=$dia."/".$mes."/".$ano;

        return $formatada;
   }


      public function formataDataparaMySQL($data){
        $dataExplodida=explode("/", $data);
        $dia=$dataExplodida[0];
        $mes=$dataExplodida[1];
        $ano=$dataExplodida[2];
        $formatada=$ano."-".$mes."-".$dia;

        return $formatada;
   }
}

?>