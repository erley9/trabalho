<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class ListaCandidatos extends CI_Controller {


        private $dados=Array();

        public function __construct() {
            parent::__construct();

    if(isset($_SESSION["logado"])){
            if( $_SESSION["logado"] != true){
                $this->session->set_flashdata('status', 'Sessão Expirou');
                redirect("adm");
            }
            }

            $this->load->model("geral/curriculos_model","atividades");
            $this->load->model("geral/usuario_model","usuario");
            $this->load->model("geral/area_model","areas");
            $this->load->helper("geral/select");
            
          
        }
        
	public function index()
	{
        $resultado = $this->atividades->get_all();
        $dados = array('lista' => $resultado);
        $this->load->view("listar",$dados);
	}

        public function buscar()
        {
            $busca = $_POST["busca"];
            $resultado = $this->atividades->buscaCurriculoporNome($busca);
            $dados = array('lista' => $resultado);
            $this->load->view("listar",$dados);
        }
            
        
        public function cadastrar(){
            
            if(isset($_POST["nome"])){

                $post = $_POST;

                $dataAtual = date("Y-m-d");

                $dataexpiracao = strftime("%Y-%m-%d", strtotime("+5 month"));

                $dadosusuario = array(
                    'id' => null ,
                    'email' => $post["email"],
                    'senha'=> sha1($post["senha"]),
                    'status' => 'ativo',
                    'plano' => 2,
                    'data_cadastro' => $dataAtual,
                    'data_expiracao' =>  $dataexpiracao
                    );

                $idusuario = $this->usuario->do_insert($dadosusuario);



                $dados = array(
                    "id" =>  null , 
                    "cpf" => $post["cpf"],
                    "nome" => $post["nome"],
                    "sobrenome" =>$post["sobrenome"],
                    "rua" => $post["rua"],
                    "numero" => $post["numero"],
                    "bairro" => $post["bairro"],
                    "cidade" => $post["cidade"],
                    "estado" => $post["estado"],
                    "cep" => $post["cep"],
                    "email" => $post["email"],
                    "telefone" => $post["telefone"],
                    "celular" => null,
                    "sexo" => $post["sexo"],
                    "atuacao" => $post["atuacao"],
                    "descricao" => $post["descricao"],
                    "faixa_salarial" => null,
                    "periodo" => null,
                    "foto" => null,
                    "usuariofk" => $idusuario,
                    "data" => date("Y-m-d") 
                    );

                $this->atividades->do_insert($dados);

                $this->session->set_flashdata("status","Candidato Cadastrada com Sucesso");
                redirect("listaCandidatos");
            
               
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
            $this->session->set_flashdata("status","Candidato Excluido com Sucesso");
            redirect("listaCandidatos");
            
        }

        public function editar(){
            if(isset($_POST['id'])){

                $post = $_POST;

                $usuario = $this->usuario->get_byID($post["usuarioid"])->row();

                $senha ="";

                if($empresa->senha == $post["senha"]){
                    $senha = $empresa->senha;
                }else{

                    $senha = sha1($post["senha"]);
                }

                if($post["planos"] == 2){

                       $dataexpiracao = strftime("%Y-%m-%d", strtotime("+1 month"));

                     $dadosusuario = array(
                    'email' => $post["email"],
                    'senha' => $senha,
                    'plano' => $post["planos"],
                    'data_expiracao' =>  $dataexpiracao
                     );

                }else{

                     $dadosusuario = array(
                    'email' => $post["email"],
                    'senha' => $senha,
                    'plano' => $post["planos"]
                     );

                }


               

                $condicaousuario = array('id' => $post["usuarioid"] );

                $this->usuario->do_update($dadosusuario,$condicaousuario);




                $dados = array(
                    "cpf" => $post["cpf"],
                    "nome" => $post["nome"],
                    "sobrenome" =>$post["sobrenome"],
                    "rua" => $post["rua"],
                    "numero" => $post["numero"],
                    "bairro" => $post["bairro"],
                    "cidade" => $post["cidade"],
                    "estado" => $post["estado"],
                    "cep" => $post["cep"],
                    "email" => $post["email"],
                    "telefone" => $post["telefone"],
                    "celular" => null,
                    "sexo" => $post["sexo"],
                    "atuacao" => $post["atuacao"],
                    "descricao" => $post["descricao"],
                    "faixa_salarial" => null,
                    "periodo" => null,
                    "foto" => null,
                    "data" => date("Y-m-d") 
                    );

                $condicao = array('id' => $post["id"] );


                $this->atividades->do_update($dados,$condicao);

                $this->session->set_flashdata("status","Candidato Alterado com Sucesso");
                redirect("listaCandidatos");
               
            }else{

            $id = $this->uri->segment(3);

            $areas = $this->areas->get_all()->result();

            $resultado = $this->atividades->get_byID($id);
            
            $dados["cliente"] = $resultado->row(); 

            $dados["usuario"]  = $this->usuario->get_byID($dados["cliente"]->usuariofk)->row();

            
            $dados["comboArea"] = montaSelectSelecionado2($areas,"atuacao","atuacao","Selecione sua área de atuação","nome","nome", $dados["cliente"]->atuacao,"nome");
            

            $this->load->view("editar",$dados);
        }


        }

       
        


}

