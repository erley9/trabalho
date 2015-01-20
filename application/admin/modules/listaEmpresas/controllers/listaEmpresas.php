<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ListaEmpresas extends CI_Controller {


        private $dados=Array();

        public function __construct() {
            parent::__construct();
    if(isset($_SESSION["logado"])){
            if( $_SESSION["logado"] != true){
                $this->session->set_flashdata('status', 'Sessão Expirou');
                redirect("adm");
            }
            }

            $this->load->model("geral/empresa_model","atividades");
            $this->load->model("geral/area_model","areas");
            $this->load->helper("geral/select");
            
          
        }
        
	public function index()
	{
        $resultado = $this->atividades->get_all();
        $dados = array('lista' => $resultado);
        $this->load->view("listar",$dados);
	}

    public function buscar(){

        $busca = $_POST["busca"];

        $resultado = $this->atividades->buscaEmpresa($busca);
        $dados = array('lista' => $resultado);
        $this->load->view("listar",$dados);

    }

        
        public function cadastrar(){
            
            if(isset($_POST["nome"])){

                $post = $_POST;

                $dados = array(
                    "id" =>  null , 
                    "nome" => $post["nome"],
                    "cnpj" => $post["cnpj"],
                    "telefone" => $post["telefone"],
                    "email" => $post["email"],
                    "rua" => $post["rua"],
                    "numero" => $post["numero"],
                    "bairro" => $post["bairro"],
                    "cidade" => $post["cidade"],
                    "estado" => $post["estado"],
                    "cep" => $post["cep"],
                    "senha" => sha1($post["senha"]),
                    "status" => $post["status"],
                    "descricao" => $post["descricao"],
                    "area" => $post["atuacao"],
                    "plano" => $post["planos"],
                    "foto" => null,
                    "data_cadastro" => date("Y-m-d") 
                    );

                $this->atividades->do_insert($dados);

                $this->session->set_flashdata("status","Empresa Cadastrada com Sucesso");
                redirect("listaEmpresas");
            
               
            }else{

                $areas = $this->areas->get_all()->result();

                $this->dados["combo"] = montaSelect($areas,"atuacao","atuacao","Selecione sua área de atuação","nome","nome");

                $this->load->view("cadastrar",$this->dados);
            }
           
        }
        
        public function excluir(){
            $id=$this->uri->segment(3);
            $condicao = array("id"=>$id);
            $this->atividades->do_delete($condicao);
            $this->session->set_flashdata("status","Empresa Excluida com Sucesso");
            redirect("listaEmpresas");
            
        }

        public function editar(){
            if(isset($_POST['id'])){

                $post = $_POST;

                $empresa = $this->atividades->get_byID($post["id"])->row();

                $senha ="";

                if($empresa->senha == $post["senha"]){
                    $senha = $empresa->senha;
                }else{

                    $senha = sha1($post["senha"]);
                }




                $dados = array(
                    "nome" => $post["nome"],
                    "cnpj" => $post["cnpj"],
                    "telefone" => $post["telefone"],
                    "email" => $post["email"],
                    "rua" => $post["rua"],
                    "numero" => $post["numero"],
                    "bairro" => $post["bairro"],
                    "cidade" => $post["cidade"],
                    "estado" => $post["estado"],
                    "cep" => $post["cep"],
                    "senha" => $senha,
                    "status" => $post["status"],
                    "descricao" => $post["descricao"],
                    "area" => $post["atuacao"],
                    "plano" => $post["planos"],
                    "foto" => null,
                    "data_cadastro" => date("Y-m-d") 
                    );

                $condicao = array('id' => $post["id"] );


                $this->atividades->do_update($dados,$condicao);

                $this->session->set_flashdata("status","Empresa Alterada com Sucesso");
                redirect("listaEmpresas");
               
            }else{

            $id = $this->uri->segment(3);

            $areas = $this->areas->get_all()->result();

            $resultado = $this->atividades->get_byID($id);
            
            $dados["cliente"] = $resultado->row(); 

            
            $dados["comboArea"] = montaSelectSelecionado($areas,"atuacao","atuacao","Selecione sua área de atuação","nome","nome", $dados["cliente"]->area);
            

            $this->load->view("editar",$dados);
        }


        }

       
        


}

