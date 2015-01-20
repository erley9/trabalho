<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Adm extends CI_Controller {


        private $dados=Array();

        public function __construct() {
            parent::__construct();
            session_start("admincriativa");
            $this->load->model('geral/crud_model');
            $this->load->model('geral/usuario_model',"usuario");
        }
        
	public function index()
	{
		$this->load->view('login',$this->dados);
	}
        
        public function login(){
           
           $dados=$_POST;
            $resultado = $this->usuario->verificalogin($dados["login"],$dados["senha"])->num_rows();
            
            if($resultado>0){

                $_SESSION["logado"] == "true";

               redirect("inicio");

            }else{
            	$this->session->set_flashdata('status', 'Usuário ou Senha Incorretos');
                redirect("adm");
            }
        
        }

        public function logout(){
            $this->session->sess_destroy();
            $this->session->set_flashdata('status','Sessão Encerrada!');
            redirect("adm");
        }

        public function inicio(){
            $this->load->view("inicio");
        }


}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */