<main>

    

    <div id="topo" class="bgParallax muda" data-speed="40">

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

    <div id="quemsomos" class="bgParallax" data-speed="20">

        <div class="centralizar">

            <h1 class="titulo">A BETUN PRIME</h1>

            <article>
                
                <h2>EMPRESA DE PINTURA INSDUSTRIAL</h2>

                <p><?php echo nl2br($empresa->sobre); ?></p>

                <h2>QUALIFICAÇÕES</h2>

                <p><?php echo nl2br($empresa->qualificacoes); ?></p>

            </article>


        </div>

    
     

    </div>



    <div id="imagem2" class="bgParallax muda"  data-speed="2">


    </div>

    <div id="servicos" class="bgParallax" data-speed="5">

    <div class="centralizar">

        <h1 class="titulo">SERVIÇOS</h1>

        <p>Oferecemos serviços de pinturas industriais e especializadas, bem como:</p>

       <?php echo $listaServicos; ?>

    </div>


    </div>


    <div id="informacao" class="bgParallax muda"  data-speed="8">

        <div class="centralizar">
            
            <img src="<?php echo base_url("img/public/textos.png"); ?>" alt="">
        </div>



    </div>


    <div id="clientes" class="bgParallax " >

        <div class="centralizar">


        <h1 class="titulo">CLIENTES</h1>


          <?php echo  $listaClientes; ?>


        </div>

    </div>





    

</main>