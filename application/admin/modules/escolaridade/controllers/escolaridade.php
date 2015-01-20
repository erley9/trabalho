<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Escolaridade extends CI_Controller {


        private $dados=Array();

        public function __construct() {
            parent::__construct();

        if(isset($_SESSION["logado"])){
            if( $_SESSION["logado"] != true){
                $this->session->set_flashdata('status', 'Sessão Expirou');
                redirect("adm");
            }
            }
            $this->load->model("geral/tipo_model","atividades");
            
          
        }
        
	public function index()
	{
        $resultado = $this->atividades->get_all();
        $dados = array('lista' => $resultado);
        $this->load->view("listar",$dados);
	}
        
        public function cadastrar(){
            
            if(isset($_POST["nome"])){

                $post = $_POST;

                $dados = array('id' =>  null , "tipo" => $post["nome"],"texto" => $post["nome"]);

                $this->atividades->do_insert($dados);

                $this->session->set_flashdata("status","Escolaridade Cadastrada com Sucesso");
                redirect("escolaridade");
            
               
            }else{
                 $this->load->view("cadastrar",$this->dados);
            }
           
        }
        
        public function excluir(){
            $id=$this->uri->segment(3);
            $condicao = array("id"=>$id);
            $this->atividades->do_delete($condicao);
            $this->session->set_flashdata("status","Escolaridade Excluido com Sucesso");
            redirect("escolaridade");
            
        }

        public function editar(){
            if(isset($_POST['id'])){

                $post = $_POST;

                $dados = array('tipo' => $post["nome"],'texto'=> $post["nome"]);

                $condicao = array('id' => $post["id"] );


                $this->atividades->do_update($dados,$condicao);

                $this->session->set_flashdata("status","Escolaridade Alterada com Sucesso");
                redirect("escolaridade");
               
            }else{

            $id = $this->uri->segment(3);
            $resultado = $this->atividades->get_byID($id);
            $dados["cliente"] = $resultado->row(); 
            $this->load->view("editar",$dados);
        }


        }

       
        


}

