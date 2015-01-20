<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Anuncio extends CI_Controller {


        private $dados=Array();

        public function __construct() {
            parent::__construct();

            if($this->session->userdata('status')!="logado"){
                $this->session->set_flashdata('status', 'Sessão Expirou');
                redirect("adm");
            }

            $this->load->model("geral/post_model","post");
            $this->load->model("geral/clientes_model","clientes");
            $this->load->model("geral/topicos_model","topicos");
            $this->load->library("geral/combo","combo");
            $this->dados["combo"] = $this->combo->montaComboCategoria2();
          
        }
        
	public function index()
	{
        $resultado = $this->post->buscaPostAnuncios();
        $dados = array('lista' => $resultado);
        $this->load->view("listar",$dados);
	}
        
        public function cadastrar(){
            //Se existir um post 
            if(isset($_POST["titulo"])){

                //Se existir uma imagem
                if(!empty($_FILES['userfile']['name'])){
                $post=$_POST;
                
                    $config['upload_path'] = '../img/anuncios';
                    $config['allowed_types'] = 'gif|jpg|png';
                    
                    

                    $this->load->library('upload', $config);


                    if (!$this->upload->do_upload()) {
                        $error = array('error' => $this->upload->display_errors());
                        $this->session->set_flashdata('status', 'Erro ao enviar o arquivo');
                        redirect("anuncio");
                    } else {

                        $data = $this->upload->data();


                        date_default_timezone_set ('America/Sao_Paulo');
                        $dataAtual = date("Y-m-d H:i:s");


                        //Envia o anuncio para todos os clientes

                        if($post["enviar"] == "todos"){



                           $listaClientes=$this->clientes->get_all()->result();

                            $dados = array('id' => null , 'titulo' => $post["titulo"],'mensagem'=> $post["anuncio"],'img' => $data["file_name"],'tipo'=>'anuncio','data'=>$dataAtual);


                           $idPost = $this->post->do_insert($dados);

                           foreach ($listaClientes as $cliente) {
                               

                              $dadosTopicos = array('id' => null, 'enviado' => $cliente->id,'recebido'=>$cliente->id,'postfk' =>$idPost);

                              $this->topicos->do_insert($dadosTopicos);
                           }


                           $this->session->set_flashdata('status', 'Anuncio Enviado com Sucesso');

                           redirect("anuncio");

                        }else{


                            //Senão envia para os clientes da categoria tal
                           if($post["enviar"] == "grupo"){
                               
                               $listaClientes=$this->clientes->buscaEmpresaCategoria($post["subcategorias"])->result();

                                $dados = array('id' => null , 'titulo' => $post["titulo"],'mensagem'=> $post["anuncio"],'img' => $data["file_name"],'tipo'=>'anuncio','data'=>$dataAtual);

                               
                               $idPost = $this->post->do_insert($dados);

                               foreach ($listaClientes as $cliente) {
                                   


                                  $dadosTopicos = array('id' => null, 'enviado' => $cliente->id,'recebido'=>$cliente->id,'postfk' =>$idPost);
                                 $this->topicos->do_insert($dadosTopicos);
                               }

                            $this->session->set_flashdata('status', 'Anuncio Enviado com Sucesso');

                           redirect("anuncio");

                           }
                        }

                        
                        
                    }
                    //Final do if
                }else{

                     $post=$_POST;

                        date_default_timezone_set ('America/Sao_Paulo');
                        $dataAtual = date("Y-m-d H:i:s");


                     //Envia o anuncio para todos os clientes

                     if($post["enviar"] == "todos"){



                        $listaClientes=$this->clientes->get_all()->result();

                        $dados = array('id' => null , 'titulo' => $post["titulo"],'mensagem'=> $post["anuncio"],'img' => null,'tipo'=>'anuncio','data'=>$dataAtual);

                        
                        $idPost = $this->post->do_insert($dados);

                        foreach ($listaClientes as $cliente) {
                            

                            $dadosTopicos = array('id' => null, 'enviado' => $cliente->id,'recebido'=>$cliente->id,'postfk' =>$idPost);
                             $this->topicos->do_insert($dadosTopicos);
                        }


                        $this->session->set_flashdata('status', 'Anuncio Enviado com Sucesso');

                        redirect("anuncio");

                     }else{


                         //Senão envia para os clientes da categoria tal
                        if($post["enviar"] == "grupo"){
                            
                            $listaClientes=$this->clientes->buscaEmpresaCategoria($post["subcategorias"])->result();

                            $dados = array('id' => null , 'titulo' => $post["titulo"],'mensagem'=> $post["anuncio"],'img' => null,'tipo'=>'anuncio','data'=>$dataAtual);

                            
                            $idPost = $this->post->do_insert($dados);


                            foreach ($listaClientes as $cliente) {
                                
                                $dadosTopicos = array('id' => null, 'enviado' => $cliente->id,'recebido'=>$cliente->id,'postfk' =>$idPost);
                                
                                 $this->topicos->do_insert($dadosTopicos);
                            }

                         $this->session->set_flashdata('status', 'Anuncio Enviado com Sucesso');

                        redirect("anuncio");

                        }
                     }

                }
               
             //senão exiba o formulario  
            }else{
                 $this->load->view("cadastrar",$this->dados);
            }
           
        }




        
        public function excluir(){
            
            $id=$this->uri->segment(3);


            $anuncioDados = $this->post->get_byID($id)->row();

            $condicao = array("id"=>$id);

            $this->post->do_delete($condicao);

            $topicos = $this->topicos->buscaTopicoPorPost($id)->result();

            foreach ($topicos as $topico) {
                $condicao = array('id' => $topico->id);
                $this->topicos->do_delete($condicao);
            }
            

            $this->session->set_flashdata("status","Anuncio Excluido com Sucesso");
            redirect("anuncio");
            
        }


        public function editar(){
            //Se não existir o post mostra o formulario de edição
            if(!isset($_POST["titulo"])){

            $id = $this->uri->segment(3);

            $anuncioDados = $this->post->get_byID($id)->row();

            $this->dados["anuncio"] = $anuncioDados;

            $this->load->view("editar", $this->dados);
            
            //Senão alterar todos os post com aquele titulo do editado
            }else{

                $post = $_POST;

                $anuncioDados = $this->post->get_byID($post["id"])->row();

                $anuncios = $this->post->BuscaAnuncioTitulo($anuncioDados->titulo);

                foreach ($anuncios->result() as $anuncio) {

                    //Se existir imagem faz o upload
                    if(!empty($_FILES['userfile']['name'])){

                        $config['upload_path'] = '../img/anuncios';
                        $config['allowed_types'] = 'gif|jpg|png';

                        $config['overwrite'] = true;

                        $this->load->library('upload', $config);


                        if (!$this->upload->do_upload()) {
                            $error = array('error' => $this->upload->display_errors());
                            print_r($error);
                            $this->session->set_flashdata('status', 'Erro ao enviar o arquivo');
                            redirect("banner");
                        } else {

                            $data = $this->upload->data();
                            $valores = array("titulo"=>$post["titulo"],"mensagem"=>$post["anuncio"],"img" => $data["file_name"]);
                            $condicao = array('id' => $anuncio->id);
                            $this->post->do_update($valores,$condicao);

                        }



                    //Senão só faz o update
                    }else{

                        $valores = array("titulo"=>$post["titulo"],"mensagem"=>$post["anuncio"]);
                        $condicao = array('id' => $anuncio->id);
                        $this->post->do_update($valores,$condicao);

                    }
                    


                }//fechamento do Foreach

                $this->session->set_flashdata('status', 'Anuncio Alterado com sucesso');
                redirect("anuncio");

            }


           

            
        }

        /*public function editar(){
            if(isset($_POST['id'])){
                if(!empty($_FILES['logo']['name'])){


                    $post=$_POST;
                
                    $config['upload_path'] = '../img/banners';
                    $config['allowed_types'] = 'gif|jpg|png';
                    $config['max_width'] = '170';
                    

                    $this->load->library('upload', $config);
                    
                    $campo = "logo";

                    if (!$this->upload->do_upload($campo)) {
                        $error = array('error' => $this->upload->display_errors());
                        print_r($error);
                        //$this->session->set_flashdata('status', 'Erro ao enviar o arquivo, o arquivo deve ser de no maximo 170px de largura e nos formato jpg/png/gif');
                        //redirect("banner");
                    } else {
                        $data = $this->upload->data();
                        $valores = array("img"=>$data["file_name"],"categoriafk"=>$post["categorias"]);
                        $condicao = array('id' => $post["id"]);
                        $this->banner->do_update($valores,$condicao);
                        $this->session->set_flashdata('status', 'Banner Alterado com sucesso');
                        redirect("banner");
                    }


                }else{  
                        $post=$_POST;
                        $valores = array("categoriafk"=>$post["categorias"]);
                        $condicao = array('id' => $post["id"]);
                        $this->banner->do_update($valores,$condicao);
                        $this->session->set_flashdata('status', 'Banner Alterado com sucesso');
                        redirect("banner");

                }
            }else{
            $id = $this->uri->segment(3);
            $resultado = $this->banner->get_byID($id);
            $dados["cliente"] = $resultado->row(); 
            $dados["combo2"] = $this->combo->montaComboCategoriaSelecionado($dados["cliente"]->categoriafk); 
            $this->load->view("editar",$dados);
        }

        }*/
        


}

