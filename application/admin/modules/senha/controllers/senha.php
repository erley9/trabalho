<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Senha extends CI_Controller {


        private $dados=Array();

        public function __construct() {
            parent::__construct();
    if(isset($_SESSION["logado"])){
            if( $_SESSION["logado"] != true){
                $this->session->set_flashdata('status', 'Sessão Expirou');
                redirect("adm");
            }
            }
            $this->load->model("geral/crud_model");
            $this->load->model("geral/usuario_model","usuario");
          
        }
        
	public function index()
	{
		$this->load->view("form-alterar");
	}

    public function alterar(){
        $input=$_POST;

        $verificaSenhaAntiga=$this->usuario->verificaSenhaAntiga($input["antiga"]);
        echo $verificaSenhaAntiga;

        if($verificaSenhaAntiga==true){
            if($input["nova"]===$input["confirmacao"]){
                $dados=array('senha' => sha1($input["nova"]));
                $condicao=array('id' => 1);
                $this->usuario->do_update($dados,$condicao);
                $this->session->set_flashdata("status","Senha alterada com sucesso");
                redirect("senha");

            }else{
                $this->session->set_flashdata("status","Senha nova diferente da confirmação");
                redirect("senha");
            }

        }else{
            $this->session->set_flashdata("status","Senha Antiga Invalida!");
            redirect("senha");
        }
    }
        
       
        


}

