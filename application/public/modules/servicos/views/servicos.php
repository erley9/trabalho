<main>

    

    <div id="topo-servicos" class="bgParallax muda" data-speed="40">

    <section id="topo-menu">

        <h1 class="logo"></h1>

        <section id="dados-gerais">
            
            <img src="img/public/patrocinios.png" alt="" class="patrocinio">

            <section id="atendimentos">

                <article>
                    <h1>Atendimento</h1>
                    <p><em>(12)</em> 3308-2532</p>
                </article>

                <figure>
                    <img src="<?php echo base_url("img/public/facebook.png"); ?>" alt="">
                </figure>

            </section>

        </section>


       <?php echo $this->load->view("geral/includes/menu"); ?>

        

    </section>



    </div>

    <div id="quemsomos-servicos" class="bgParallax muda" data-speed="2">

        <div class="centralizar">

            <h1 class="titulo">SOLUÇÕES</h1>

            <p class="subtitulo">Oferecemos serviços de pinturas industriais e especializadas, bem como:</p>


            <ul id="lista-servicos">


            <?php 
              
              foreach ($servicos as $servico) {


                
            echo "

                <li>
                    <a href=''>
                        <figure>
                            <img src='".base_url("img/servicos/{$servico->imagem}")."'>
                        
                        </figure>

                        <article>
                            <h1>{$servico->titulo}</h1>
                            <p>".nl2br($servico->descricao)."</p>                         
                        </article>
                    </a>
                </li>
                ";

            }


            ?>

    



            </ul>

                



            



        </div>

    
     

    </div>




    



    

</main>