<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Fotos extends CI_Controller {


        private $dados=Array();

        public function __construct() {
            parent::__construct();

        if(isset($_SESSION["logado"])){
               if( $_SESSION["logado"] != true){
                   $this->session->set_flashdata('status', 'Sessão Expirou');
                   redirect("adm");
               }
               }

            $this->load->model("geral/fotos_model","noticias");
          
        }
        
	public function index()
	{
        $resultado = $this->noticias->get_all();
        $dados = array('lista' => $resultado);
		$this->load->view("listar",$dados);
	}


    public function galeria(){
        $galeria = $this->uri->segment(3);

        $resultado = $this->noticias->buscaFotos($galeria);
        $dados = array('lista' => $resultado,"galeria" => $galeria);


        $this->load->view("listar",$dados);
    }
        
        public function cadastrar(){
            
            if(isset($_POST["titulo"])){
           
          
                
                $dados=$_POST;
                

           
                    $config['upload_path'] = '../img/fotos';
                    $config['allowed_types'] = 'gif|jpg|png';
                  
                    $this->load->library('upload', $config);
                    
                    $campo = "logo";

                    if (!$this->upload->do_upload($campo)) {
                        $error = array('error' => $this->upload->display_errors());
                        $this->session->set_flashdata('status', 'Erro ao enviar o arquivo');
                        var_dump($error);
                    } else {
                        $data = $this->upload->data();

                        $miniatura_source = "../img/fotos/miniaturas/{$data['file_name']}";

                        $config['image_library'] = 'gd2';
                        $config['source_image']   = "../img/fotos/{$data['file_name']}";
                        $config['new_image'] = $miniatura_source; 
                        $config['create_thumb'] = TRUE;
                        $config['maintain_ratio'] = TRUE;
                        $config['width']   = 300;
                        $config['height'] = 300;

                        $this->load->library('image_lib', $config); 

                        $this->image_lib->resize();

                        $miniatura = $data["raw_name"]."_thumb".$data["file_ext"];

                        $galeria = $dados["galeria"];
                        $dados = array("id"=>NULL,"titulo"=>$dados["titulo"],"miniatura"=> $miniatura,"normal"=>$data["file_name"],"galeriafk"=> $dados["galeria"]);
                        $this->noticias->do_insert($dados);
                        $this->session->set_flashdata('status', 'Foto Cadastrada com sucesso!');
                        redirect("fotos/galeria/{$galeria}");
                    }

                
            }else{


                $galeria = $this->uri->segment(3);

                $dados = array("galeria"=>$galeria);


                 $this->load->view("cadastrar",$dados);
            }
           
        }
        
        public function excluir(){
            $id=$this->uri->segment(3);
            $galeria = $this->uri->segment(4);
            $lista = $this->noticias->get_byID($id);
            $resultado = $lista->row();
            $arquivo="../img/fotos/".$resultado->logo;
            
            if(file_exists($arquivo)){
                unlink($arquivo);
            }
            $condicao = array("id"=>$id);
            $this->noticias->do_delete($condicao);
            $this->session->set_flashdata("status","Foto Excluida com Sucesso");
            redirect("fotos/galeria/{$galeria}");
            
        }

        public function editar(){
            if(isset($_POST['titulo'])){

                if(!empty($_FILES['logo']['name'])){
                    date_default_timezone_set("Brazil/East");

                    $dataatual = date("Y-m-d h:i:S");
                    

                    $dados=$_POST;

                    $galeria = $dados["galeria"];
                
                    $config['upload_path'] = '../img/fotos';
                    $config['allowed_types'] = 'gif|jpg|png';
                    

                    $this->load->library('upload', $config);
                    
                    $campo = "logo";

                    if (!$this->upload->do_upload($campo)) {
                        $error = array('error' => $this->upload->display_errors());
                        $this->session->set_flashdata('status', 'Erro ao enviar o arquivo, o arquivo deve ser de no maximo 150px de largura e nos formato jpg/png/gif');
                        
                        print_r($error);

                        //redirect("fotos/galeria/{$galeria}");
                    } else {
                        $data = $this->upload->data();

                        $miniatura_source = "../img/fotos/miniaturas/{$data['file_name']}";

                        $config['image_library'] = 'gd2';
                        $config['source_image']   = "../img/fotos/{$data['file_name']}";
                        $config['new_image'] = $miniatura_source; 
                        $config['create_thumb'] = TRUE;
                        $config['maintain_ratio'] = TRUE;
                        $config['width']   = 300;
                        $config['height'] = 300;

                        $this->load->library('image_lib', $config); 

                        $this->image_lib->resize();

                        $miniatura = $data["raw_name"]."_thumb".$data["file_ext"];


                        $valores = array("titulo"=>$dados["titulo"],"miniatura"=>$miniatura,"normal"=>$data["file_name"]);
                        $condicao = array('id' => $dados["id"]);
                        $this->noticias->do_update($valores,$condicao);
                        $this->session->set_flashdata('status', 'Foto Alterado com sucesso!');
                        redirect("fotos/galeria/{$galeria}");
                    }


                }else{
                        $dados=$_POST;
                        $valores = array("titulo"=>$dados["titulo"]);
                        $condicao = array('id' => $dados["id"]);
                        $this->noticias->do_update($valores,$condicao);
                        $this->session->set_flashdata('status', 'Foto Alterado com sucesso!');
                        redirect("fotos/galeria/{$galeria}");

                }
            }else{
            $id = $this->uri->segment(3);
            $galeria = $this->uri->segment(4);
            $resultado = $this->noticias->get_byID($id);
            $dados = array('cliente' => $resultado->row(),"galeria" => $galeria); 
            $this->load->view("editar",$dados);
        }

        }
        


}

