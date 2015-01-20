<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MontaOrcamento {
    protected $ci;
    public function __construct()
    {
        $this->ci= & get_instance();
        $this->ci->load->model("geral/topicos_model");
        $this->ci->load->model("geral/post_model");
        $this->ci->load->model("geral/clientes_model");
        
    }


        public function montaOrcamento($topico){


            $enviado = $this->ci->clientes_model->get_byID($topico->enviado)->row();

            $lista.="


            <div class='topico'>
            <!--mensagem recebida-->
            <a href='".base_url("cliente/empresa/{$enviado->id}")."'>
            <figure>
            <img src='".base_url("img/logos/{$enviado->logo}")."' alt='logo' class='logo'>
            </figure>
            </a>

            <section class='geral'>
            <h1>".$enviado->empresa_nome."</h1>
            <h2>Enviado <em>".formataData($post->data)."</em></h2>

            <p>".nl2br($post->mensagem)."</p>
            </section>
            <!--mensagem enviada-->


            <!--Inicia a Sessão de respostas
            <!-- Respostas -->
            <section class='respostas'>

            <!--listas de respostas -->
            <ul class='lista-respostas' id='post-".$post->id."' data-id='".$post->id."' data-url='".base_url("cliente/atualizaComentarios")."'>";



            $mensagens = $this->mensagem->pegaMensagensOrcamento($post->id);


            foreach ($mensagens->result() as $mensagem) {


                if($mensagem->vendedorfk != null){

                    $cliente = $this->clientes->get_byID($mensagem->clientefk)->row();
                    $vendedor = $this->vendedor->get_byID($mensagem->vendedorfk)->row();

                    $lista .="      
                    <li>";



                    if($mensagem->vendedorfk == $vendedor->id){
                        $lista .= "<a href='".base_url("cliente/removeComentario")."' data-id='".$mensagem->id."' class='ApagaResposta'><img src='".base_url("img/area-cliente/lixo.png")."' alt='Apagar' class='apagarResposta'></a>";
                    }

                    $lista .=" 
                    <a href='".base_url("cliente/empresa/{$enviado->id}")."'> 
                    <figure>
                    <img src='".base_url("img/logos/{$cliente->logo}")."' alt='logo'>
                    </figure>
                    </a>  

                    <section class='geral'>

                    <h1>".$vendedor->nome."</h1>
                    <h2>Enviado <em>".formataData($mensagem->data)."</em></h2>";

                    if($mensagem->img != null){

                        $lista .= "<figure class='imagem-comentario'><img src='".base_url("img/comentarios/{$mensagem->img}")."' alt='' /></figure>";

                    }
                    $lista .= "<p>".nl2br($mensagem->mensagem)."</p>

                    </section>


                    </li>";



                }else{
                    $cliente = $this->clientes->get_byID($mensagem->clientefk)->row();

                    $lista .="      
                    <li>";


                    if($mensagem->clientefk == $this->dados['meusDados']->id){
                        $lista .= "<a href='".base_url("cliente/removeComentario")."' data-id='".$mensagem->id."' class='ApagaResposta'><img src='".base_url("img/area-cliente/lixo.png")."' alt='Apagar' ></a>";
                    }

                    $lista .= "
                    <a href='".base_url("cliente/empresa/{$enviado->id}")."'> 
                    <figure>
                    <img src='".base_url("img/logos/{$cliente->logo}")."' alt='logo'>
                    </figure>
                    </a>

                    <section class='geral'>

                    <h1>".$cliente->empresa_nome."</h1>
                    <h2>Enviado <em>".formataData($mensagem->data)."</em></h2>";

                    if($mensagem->img != null){

                        $lista .= "<figure class='imagem-comentario'><img src='".base_url("img/comentarios/{$mensagem->img}")."' alt='' /></figure>";

                    }
                    $lista .= "<p>".nl2br($mensagem->mensagem)."</p>

                    </section>
                    <ul>

                    <li>                    <a href='http://192.168.0.1:81/workbook2/cliente/removeComentario' data-id='24' class='ApagaResposta'><img src='http://192.168.0.1:81/workbook2/img/area-cliente/lixo.png' alt='Apagar'></a>
                    <a href='http://192.168.0.1:81/workbook2/cliente/empresa/47'> 
                    <figure>
                    <img src='http://192.168.0.1:81/workbook2/img/logos/logo_aqui.jpg' alt='logo'>
                    </figure>
                    </a>

                    <section class='geral'>

                    <h1>Erley S/A</h1>
                    <h2>Enviado <em>16/12/2013</em></h2><p>teste</p>

                    </section>

                    </li>

                    </ul>

                    <a href=''>Reponder</a>
                    <form action='".base_url("cliente/cadastraComentario")."' class='resposta' method='post'>
                    <figure><img src='".base_url("img/logos/{$this->dados["meusDados"]->logo}")."' alt=''></figure>
                    <label for=''>
                    <input type='hidden' id='post' name='post' value='".$post->id."' >
                    <input type='text' name='comentario' id='comentario' class='comentarios' placeholder='Escreva um comentário...'>
                    <input type='file' name='userfile' id='userfile'>
                    </label>

                    </form>

                    </li>";
                }
            }



            $lista .= "      
            </ul>
            <!--fim da listas de respostas -->
            ";

            if($mensagens->num_rows()==0){


            $lista.="

            <form action='".base_url("cliente/cadastraComentario")."' class='resposta' method='post'>
            <figure><img src='".base_url("img/logos/{$this->dados["meusDados"]->logo}")."' alt=''></figure>
            <label for=''>
            <input type='hidden' id='post' name='post' value='".$post->id."' >
            <input type='text' name='comentario' id='comentario' class='comentarios' placeholder='Escreva um comentário...'>
            <input type='file' name='userfile' id='userfile'>
            </label>

            </form>
            ";

            };



            $lista.="

            </section>
            </div>
            <!-- fim  Respostas -->
            ";

            return $lista;




        }


}

?>