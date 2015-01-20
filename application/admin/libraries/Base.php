<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Base {
	protected $ci;
    public function __construct()
    {
        $ci= & get_instance();
        $ci->load->helper('url');

    }

    public function base_adm($url){
        $url = base_url($url);
         $urllimpa = str_replace("admin/","",$url);
         $urlnova = str_replace("index.php","",$urllimpa);

         return $urlnova;
    }
}

?>