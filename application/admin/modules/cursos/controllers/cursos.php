<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cursos extends CI_Controller {


        private $dados=Array();

        public function __construct() {
            parent::__construct();

            if($this->session->userdata('status')!="logado"){
                $this->session->set_flashdata('status', 'Sessão Expirou');
                redirect("adm");
            }

            $this->load->model("geral/cursos_model","cursos");
            $this->load->model("geral/subcategoria_model","subcategoria");
            $this->load->library("geral/combo","combo");
            $this->dados["combo"] = $this->combo->montaComboCategoria();
          
        }
        
	public function index()
	{
        $resultado = $this->cursos->get_all();
        $dados = array('lista' => $resultado);
        $this->load->view("listar",$dados);
	}
        
        public function cadastrar(){
            
            if(isset($_POST["curso"])){

                $post = $_POST;

                $dados = array('id' =>  null , "sigla" => $post["sigla"],"curso"=>$post["curso"],"horas"=>$post["horas"],"investimento"=>$post["valor"],"subcategoriafk"=>$post["subcategorias"] );

                $this->cursos->do_insert($dados);

                $this->session->set_flashdata("status","Curso Cadastrado com Sucesso");
                redirect("cursos");
            
               
            }else{
                 $this->load->view("cadastrar",$this->dados);
            }
           
        }
        
        public function excluir(){
            $id=$this->uri->segment(3);
            $condicao = array("id"=>$id);
            $this->cursos->do_delete($condicao);
            $this->session->set_flashdata("status","Curso Excluido com Sucesso");
            redirect("cursos");
            
        }

        public function editar(){
            if(isset($_POST['id'])){

                $post = $_POST;

                $dados = array('sigla' => $post["sigla"] ,'curso'=>$post["curso"],'horas'=>$post["horas"],"investimento"=>$post["valor"],"subcategoriafk"=>$post["subcategorias"] );

                $condicao = array('id' => $post["id"] );


                $this->cursos->do_update($dados,$condicao);

                $this->session->set_flashdata("status","Curso Alterado com Sucesso");
                redirect("cursos");
               
            }else{

            $id = $this->uri->segment(3);
            $resultado = $this->cursos->get_byID($id);
            $dados["cliente"] = $resultado->row(); 
            $subcategoria = $this->subcategoria->get_byID( $dados["cliente"]->subcategoriafk)->row();
            $dados["subcategoria2"] = $this->combo->montaComboSubcategoriaSelecionado($dados["cliente"]->subcategoriafk);
            $dados["combo2"] = $this->combo->montaComboCategoriaSelecionado($subcategoria->categoriafk); 
            $this->load->view("editar",$dados);
        }


        }

        public function buscaSubcategoria(){
            $categoria = $_POST["categoria"];

            $categorias = $this->subcategoria->buscaPorCategoria($categoria)->result();

            $options = "<option value=''>Selecione uma Subcategoria</option>";

            foreach ($categorias as $item) {
            $options .= "<option value='".$item->id."'>".$item->nome."</option>";    
            }

            echo $options;

        }
        


}

