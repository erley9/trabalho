<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Periodos extends CI_Controller {


        private $dados=Array();

        public function __construct() {
            parent::__construct();
    if(isset($_SESSION["logado"])){
            if( $_SESSION["logado"] != true){
                $this->session->set_flashdata('status', 'Sessão Expirou');
                redirect("adm");
            }
            }

            $this->load->model("geral/periodos_model","atividades");
            
          
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

                $dados = array('id' =>  null , "periodo" => $post["nome"],"texto" => ucfirst($post["nome"]));

                $this->atividades->do_insert($dados);

                $this->session->set_flashdata("status","Período Cadastrada com Sucesso");
                redirect("periodos");
            
               
            }else{
                 $this->load->view("cadastrar",$this->dados);
            }
           
        }
        
        public function excluir(){
            $id=$this->uri->segment(3);
            $condicao = array("id"=>$id);
            $this->atividades->do_delete($condicao);
            $this->session->set_flashdata("status","Período Excluido com Sucesso");
            redirect("periodos");
            
        }

        public function editar(){
            if(isset($_POST['id'])){

                $post = $_POST;

                $dados = array('periodo' => $post["nome"],'texto'=> ucfirst($post["nome"]));

                $condicao = array('id' => $post["id"] );


                $this->atividades->do_update($dados,$condicao);

                $this->session->set_flashdata("status","Período Alterado com Sucesso");
                redirect("periodos");
               
            }else{

            $id = $this->uri->segment(3);
            $resultado = $this->atividades->get_byID($id);
            $dados["cliente"] = $resultado->row(); 
            $this->load->view("editar",$dados);
        }


        }

       
        


}

