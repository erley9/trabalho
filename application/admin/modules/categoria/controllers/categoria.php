<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Categoria extends CI_Controller {


        private $dados=Array();

        public function __construct() {
            parent::__construct();

               if(isset($_SESSION["logado"])){
            if( $_SESSION["logado"] != true){
                $this->session->set_flashdata('status', 'Sessão Expirou');
                redirect("adm");
            }
            }

            $this->load->model("geral/categoria_model","categoria");
            $this->load->model("geral/subcategoria_model","subcategoria");
          
        }
        
	public function index()
	{
        $resultado = $this->categoria->get_all();
        $dados = array('lista' => $resultado);
		$this->load->view("listar",$dados);
	}
        
        public function cadastrar(){



            if(isset($_POST["nome"])){

                        $post = $_POST;
            
           
                        $dados = array('id'=>NULL,"nome"=>$post["nome"]);
                        $this->categoria->do_insert($dados);
                        $this->session->set_flashdata("status","Categoria Cadastrada com Sucesso");
                        redirect("categoria");
                       
              
            }else{
                 $this->load->view("cadastrar");
            }
           
        }
        
        public function excluir(){
            $id=$this->uri->segment(3);
            $lista = $this->categoria->get_byID($id);
            $resultado = $lista->row();
            $arquivo="../img/clientes/".$resultado->logo;
            
            if(file_exists($arquivo)){
                unlink($arquivo);
            }
            $condicao = array("id"=>$id);
            $this->categoria->do_delete($condicao);
            $this->session->set_flashdata("status","Categoria Excluida com Sucesso");
            redirect("categoria");
            
        }

        public function editar(){


                if(isset($_POST["nome"])){

                        $nome = $_POST["nome"];
                        $id = $_POST["id"];
          
                        
                        $dados = array('nome'=>$nome);
                        $condicao=array('id'=>$id);
                        $this->categoria->do_update($dados,$condicao);
                        $this->session->set_flashdata('status',"Categoria alterada com sucesso");
                        redirect("categoria");    

            }else{
            $id = $this->uri->segment(3);
            $resultado = $this->categoria->get_byID($id);
            $dados = array('lista' => $resultado->row()); 
            $this->load->view("editar",$dados);
        }

        }

        public function subcategoria(){

            $id = $this->uri->segment(3);

            $listaSub = $this->subcategoria->buscaPorCategoria($id)->result();

            $dados = array('lista' => $listaSub,"id"=>$id);

            $this->load->view("listar-subcategorias",$dados);


        }

        public function cadastrarSub(){

           

            if(isset($_POST["subcategoria"])){


                $dados = array('id' =>  null , 'nome' => $_POST["subcategoria"],'categoriafk' => $_POST["id"]);

                $this->subcategoria->do_insert($dados);


                redirect("categoria/subcategoria/{$_POST['id']}");

            }else{
                $id = $this->uri->segment(3);
                $dados = array("id" => $id);
                $this->load->view("cadastrar-sub",$dados);
            }

            
        }

        public function excluirSub(){
            $id = $this->uri->segment(3);


            $this->subcategoria->do_delete(array('id'=>$id));


            redirect("categoria/subcategoria/$id");

        }

        public function editarSub(){

            if(isset($_POST["subcategoria"])){


                $dados = array('nome' => $_POST["subcategoria"]);

                $condicao = array('id' => $_POST["id"]);

                $this->subcategoria->do_update($dados,$condicao);


                $subcategoria = $this->subcategoria->get_byID($_POST["id"])->row();

                redirect("categoria/subcategoria/{$subcategoria->categoriafk}");

            }else{

            $id = $this->uri->segment(3);


            $subcategoria = $this->subcategoria->get_byID($id)->row();

            $dados = array('subcategoria' => $subcategoria);

           $this->load->view("editar-sub",$dados);
            }
        }
        


}

