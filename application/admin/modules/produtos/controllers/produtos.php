<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Produtos extends CI_Controller {


        private $dados=Array();

        public function __construct() {
            parent::__construct();

            

     if(isset($_SESSION["logado"])){
            if( $_SESSION["logado"] != true){
                $this->session->set_flashdata('status', 'Sessão Expirou');
                redirect("adm");
            }
            }
            $this->load->model("geral/modalidades_model","parceiros");
            $this->load->model("geral/categoria_model","categoria");
            $this->load->model("geral/subcategoria_model","subcategoria");
          
        }
        
	public function index()
	{
        $resultado = $this->parceiros->get_all();
        $dados = array('lista' => $resultado);
		$this->load->view("listar",$dados);
	}
        
        public function cadastrar(){
            
            if(isset($_POST["titulo"])){
                
                $dados=$_POST;
                
                    $config['upload_path'] = '../img/produtos';
                    $config['allowed_types'] = 'gif|jpg|png';
                  
                    $this->load->library('upload', $config);
                    
                    $campo = "logo";

                    if (!$this->upload->do_upload($campo)) {
                        $error = array('error' => $this->upload->display_errors());
                        $this->session->set_flashdata('status', 'Erro ao enviar o arquivo, o arquivo deve ser de no maximo 150px de largura e nos formato jpg/png/gif');
                        
                        echo $error;
                        //redirect("produtos");
                    } else {
                        $data = $this->upload->data();
                        $dados = array("id"=>NULL,"titulo"=>$dados["titulo"],"descricao"=>$dados["descricao"],"especificacao" => $dados["especificacao"],"imagem"=>$data["file_name"],"categoriafk" => $dados["subcategoria"]);
                        $this->parceiros->do_insert($dados);
                        $this->session->set_flashdata('status', 'Produto Cadastrado com sucesso!');
                        redirect("produtos");
                    }
            }else{

                $categoria = $this->categoria->get_all()->result();

                $dados = array("categorias" => $categoria);

                 $this->load->view("cadastrar",$dados);
            }
           
        }


        public function geraSubcategorias(){
            $categoria = $_POST["categoria"];

            $subcategorias = $this->subcategoria->buscaPorCategoria($categoria)->result();

           $lista="<option value=''>Seleciona a subcategoria</option>";

           foreach ($subcategorias as $subcategoria) {
               
               $lista .= "<option value='".$subcategoria->id."'>{$subcategoria->nome}</option>";
           }


           echo $lista;



        }
        
        public function excluir(){
            $id=$this->uri->segment(3);
            $lista = $this->parceiros->get_byID($id);
            $resultado = $lista->row();
            $arquivo="../img/produtos/".$resultado->imagem;
            
            if(file_exists($arquivo)){
                unlink($arquivo);
            }
            $condicao = array("id"=>$id);
            $this->parceiros->do_delete($condicao);
            $this->session->set_flashdata("status","Produto Excluido com Sucesso");
            redirect("produtos");
            
        }

        public function editar(){
            if(isset($_POST['titulo'])){
                if(!empty($_FILES['logo']['name'])){


                    $dados=$_POST;
                
                    $config['upload_path'] = '../img/produtos';
                    $config['allowed_types'] = 'gif|jpg|png';
                    

                    $this->load->library('upload', $config);
                    
                    $campo = "logo";

                    if (!$this->upload->do_upload($campo)) {
                        $error = array('error' => $this->upload->display_errors());
                        $this->session->set_flashdata('status', 'Erro ao enviar o arquivo, o arquivo deve ser de no maximo 150px de largura e nos formato jpg/png/gif');
                        redirect("produtos");
                    } else {
                        $data = $this->upload->data();
                        $valores = array("titulo"=>$dados["titulo"],"descricao" => $dados["descricao"],"especificacao" => $dados["especificacao"],"imagem"=>$data["file_name"],"categoriafk" => $dados["subcategoria"]);
                        $condicao = array('id' => $dados["id"]);
                        $this->parceiros->do_update($valores,$condicao);
                        $this->session->set_flashdata('status', 'Produto Alterado com sucesso!');
                        redirect("produtos");
                    }


                }else{
                        $dados=$_POST;
                        $valores = array("titulo"=>$dados["titulo"],"descricao"=>$dados["descricao"],"especificacao" => $dados["especificacao"],"categoriafk" => $dados["subcategoria"]);
                        $condicao = array('id' => $dados["id"]);
                        $this->parceiros->do_update($valores,$condicao);
                        $this->session->set_flashdata('status', 'Produto Alterado com sucesso!');
                        redirect("produtos");

                }
            }else{
            $id = $this->uri->segment(3);
            $resultado = $this->parceiros->get_byID($id);

             $categoria = $this->categoria->get_all()->result();

             $subcategoria = $this->subcategoria->get_all()->result();


            $dados = array('cliente' => $resultado->row(),"categorias" => $categoria,"subcategorias"=>$subcategoria); 
            $this->load->view("editar",$dados);
        }

        }
        


}

