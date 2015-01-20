<main>

    

    <div id="topo-empresa" class="bgParallax muda" data-speed="40">

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

    <div id="quemsomos-empresa" class="bgParallax" data-speed="2">

        <div class="centralizar">

            <h1 class="titulo">A BETUN PRIME</h1>

            <article>
                
                <h2>EMPRESA DE PINTURA INSDUSTRIAL</h2>

                <p><?php echo nl2br($empresa->sobre); ?></p>

                <h2>QUALIFICAÇÕES</h2>

                <p><?php echo nl2br($empresa->qualificacoes); ?></p>

            
                <figure>
                    <img src="<?php echo base_url("img/public/foto-empresa.jpg"); ?>" alt="">
                    
                    <article>
                        <h2>ESTRUTURA DA EMPRESA</h2>
                        <p><?php echo nl2br($empresa->estrutura); ?></p>
                    </article>

                    <article>
                        <h2>QUALIFICAÇÕES DE FUNCIONÁRIOS</h2>
                        <p><?php echo nl2br($empresa->funcionarios); ?></p>
                    </article>

                </figure>



            </article>




        </div>

    
     

    </div>



    <div id="imagem2-empresa" class="bgParallax muda"  data-speed="40">


    </div>

    <div id="quemsomos-empresa2" class="bgParallax" data-speed="2">

    <div class="centralizar">


        <article>
            
            <h2>MISSÃO</h2>

            <p><?php echo nl2br($empresa->missao); ?></p>

            <h2>VISÃO</h2>

            <p><?php echo nl2br($empresa->visao); ?></p>

        
            <figure>
                <img src="<?php echo base_url("img/public/objetivo-empresa.png"); ?>" alt="" class="objetivo">
                
                <article>

                    <h2>OBJETIVOS DE QUALIDADE</h2>

                    <p><?php echo nl2br($empresa->objetivos); ?></p>
                  

                </article>


            </figure>


            <figure>
                <img src="<?php echo base_url("img/public/visao-empresa.png"); ?>" alt="" class="politica">
                
                <article>

                    <h2>POLÍTICA AMBIENTAL</h2>

                    <p><?php echo nl2br($empresa->politica); ?></p>
            

                </article>


            </figure>

            <figure>
                <img src="<?php echo base_url("img/public/processos-icon.jpg"); ?>" alt="" class="processos">
                
                <article>

                    <h2>PROCESSOS DE POLÍTICA AMBIENTAL:</h2>

                    <p><?php echo nl2br($empresa->processos); ?></p>
            

                </article>


            </figure>







        </article>


    

    </div>


    </div>


    



    

</main>