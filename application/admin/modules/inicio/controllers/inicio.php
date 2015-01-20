<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Inicio extends CI_Controller {


        private $dados=Array();

        public function __construct() {
            parent::__construct();
            if(isset($_SESSION["logado"])){
            if( $_SESSION["logado"] != true){
                $this->session->set_flashdata('status', 'Sessão Expirou');
                redirect("adm");
            }
            }
          
        }
        
	public function index()
	{
		$this->load->view("inicio");
	}
        


}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */