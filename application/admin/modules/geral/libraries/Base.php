<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Base {
	protected $ci;
    public function __construct()
    {
        $ci= & get_instance();
        $ci->load->helper('url');

    }

    public function base_adm($caminho){
    	$caminhoAbsoluto = str_replace("admin/", "", base_url($caminho));
    	return $caminhoAbsoluto;
    }
}

?>