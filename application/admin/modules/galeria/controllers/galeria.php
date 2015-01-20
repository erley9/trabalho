<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Galeria extends CI_Controller {


        private $dados=Array();

        public function __construct() {
            parent::__construct();

            if($this->session->userdata('status')!="logado"){
                $this->session->set_flashdata('status', 'Sessão Expirou');
                redirect("adm");
            }
            $this->load->model("geral/eventos_model","eventos");
            $this->load->model("geral/fotos_model","fotos");
          
        }
        
	public function index()
	{
        $resultado = $this->fotos->get_all();
        $dados = array('lista' => $resultado);
		$this->load->view("listar",$dados);
	}

    public function listar(){
        $id= $this->uri->segment(3);
        $resultado_galeria = $this->eventos->get_byID($id);
        $galeria = $resultado_galeria->row();
        $condicao=array("eventofk"=>$id);
        $resultado_fotos = $this->fotos->buscaPorFk($condicao);
        $dados = array("galeria"=>$galeria,"fotos"=>$resultado_fotos);
     
        $this->load->view("listar",$dados);

    }

    public function cadastrar(){
        $galeria = $this->uri->segment(3);

        $dados=array('id' => $galeria);
   
        $this->load->view("cadastrar",$dados);     
        
       

       
    }

    public function upload(){

            $id=$_POST["evento"];

            $this->load->library('upload');
       
            $image_upload_folder ='../img/eventos/';
       
  
       
            $this->upload_config = array(
                  'upload_path'   => $image_upload_folder,
                  'allowed_types' => 'png|jpg|jpeg|bmp|tiff',
                  'max_size'      => 2048,
                  'max_width' => 800,
                  'remove_space'  => TRUE,
                  'encrypt_name'  => TRUE,
            );
       
            $this->upload->initialize($this->upload_config);
       
            if (!$this->upload->do_upload()) {
                  $upload_error = $this->upload->display_errors();
                  echo json_encode($upload_error);
            } else {
                  $arquivo_info = $this->upload->data();
                  $dados = array("id"=>null,"url"=>$arquivo_info["file_name"],"eventofk"=>$id);
                  
                  $config['image_library'] = 'gd2';
                  $config['source_image']   = $arquivo_info["full_path"];
                  $config['maintain_ratio'] = TRUE;
                  $config['width']   = 800;
                  $config[ 'height'] = 800;

                  $this->load->library('image_lib', $config); 

                  $this->image_lib->resize();

                  $this->fotos->do_insert($dados);
            }

    

    }

    public function excluir(){
      $foto=$_POST["id"];
      
      $galeria=$_POST["galeria"];

      $resultado = $this->fotos->get_byID($foto)->row();

      $path_imagem = '../img/eventos/'.$resultado->url;

      if(file_exists($path_imagem)){
        unlink($path_imagem);
      }

      $condicao = array("id"=>$foto);
      
      $this->fotos->do_delete($condicao);

      $condicao2= array("eventofk"=>$galeria);

      $fotos = $this->fotos->buscaPorFk($condicao2);

      foreach ($fotos->result() as $linha) {
        echo "
        <li>
          <figure class='figura'>
            <a href='".$linha->id."' class='excluir'><img src='".$this->base->base_adm("img/excluir-icon.png")."' alt='' /></a>
            <img src='".$this->base->base_adm("img/eventos/{$linha->url}")."' alt='' class='imagem'>
          </figure>
        </li>";
      }


    }
        
       


}

