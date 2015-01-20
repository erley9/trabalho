<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Banner extends CI_Controller {


        private $dados=Array();

        public function __construct() {
            parent::__construct();


            

            $this->load->model("geral/banner_model","banner");
          
      
          
        }
        
	public function index()
	{
        $resultado = $this->banner->get_all();
        $dados = array('lista' => $resultado);
        $this->load->view("listar",$dados);
	}
        
        public function cadastrar(){
            
            if(isset($_POST["url"])){
                $dados=$_POST;
                
                    $config['upload_path'] = '../img/banners';
                    $config['allowed_types'] = 'gif|jpg|png';
            
                    

                    $this->load->library('upload', $config);
                    
                    $campo = "logo";

                    if (!$this->upload->do_upload($campo)) {
                        $error = array('error' => $this->upload->display_errors());
                        $this->session->set_flashdata('status', 'Erro ao enviar o arquivo, o arquivo deve ser de no maximo 170px de largura e nos formato jpg/png/gif');
                        redirect("banner");
                    } else {
                        $data = $this->upload->data();
                        $dados = array("id"=>NULL,"titulo"=>$dados["titulo"],"img"=>$data["file_name"],"url"=>$dados["url"]);
                        $this->banner->do_insert($dados);
                        $this->session->set_flashdata('status', 'Banner Cadastrado com sucesso!');
                        redirect("banner");
                    }
               
            }else{

            
                 $this->load->view("cadastrar",$this->dados);
            }
           
        }
        
        public function excluir(){
            $id=$this->uri->segment(3);
            $lista = $this->banner->get_byID($id);
            $resultado = $lista->row();
            $arquivo="../img/banners/".$resultado->img;
            
            if(file_exists($arquivo)){
                unlink($arquivo);
            }
            $condicao = array("id"=>$id);
            $this->banner->do_delete($condicao);
            $this->session->set_flashdata("status","Banner Excluido com Sucesso");
            redirect("banner");
            
        }

        public function editar(){
            if(isset($_POST['url'])){
                if(!empty($_FILES['logo']['name'])){


                    $post=$_POST;
                
                    $config['upload_path'] = '../img/banners';
                    $config['allowed_types'] = 'gif|jpg|png';
                 

                    $this->load->library('upload', $config);
                    
                    $campo = "logo";

                    if (!$this->upload->do_upload($campo)) {
                        $error = array('error' => $this->upload->display_errors());
                        print_r($error);
                        //$this->session->set_flashdata('status', 'Erro ao enviar o arquivo, o arquivo deve ser de no maximo 170px de largura e nos formato jpg/png/gif');
                        //redirect("banner");
                    } else {
                        $data = $this->upload->data();
                        $valores = array("titulo"=>$post["titulo"],"img"=>$data["file_name"],"url"=>$post["url"]);
                        $condicao = array('id' => $post["id"]);
                        $this->banner->do_update($valores,$condicao);
                        $this->session->set_flashdata('status', 'Banner Alterado com sucesso');
                        redirect("banner");
                    }


                }else{  
                        $post=$_POST;
                        $valores = array("titulo"=>$post["titulo"],"url"=>$post["url"]);
                        $condicao = array('id' => $post["id"]);
                        $this->banner->do_update($valores,$condicao);
                        $this->session->set_flashdata('status', 'Banner Alterado com sucesso');
                        redirect("banner");

                }
            }else{
            $id = $this->uri->segment(3);
            $resultado = $this->banner->get_byID($id);
            $dados["cliente"] = $resultado->row(); 
           
            $this->load->view("editar",$dados);
        }

        }
        


}

