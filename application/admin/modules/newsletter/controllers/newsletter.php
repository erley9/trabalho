<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Newsletter extends CI_Controller {


        private $dados=Array();

        public function __construct() {
            parent::__construct();

                if(isset($_SESSION["logado"])){
            if( $_SESSION["logado"] != true){
                $this->session->set_flashdata('status', 'Sessão Expirou');
                redirect("adm");
            }
            }

            $this->load->model("geral/sobre_model","empresa");
          
        }
        
	public function index()
	{
        $empresa = $this->empresa->get_byID(1)->row();

        $dados = array('empresa' => $empresa);
      
		$this->load->view("newsletter",$dados);
	}

   public function gerarPlanilha(){

    $this->load->model("geral/email_model","email");

    $dados = array('emails' => $this->email->get_all()->result());


    $this->load->view("planilhas",$dados);
   }
   


}

