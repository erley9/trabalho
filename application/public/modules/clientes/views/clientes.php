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
                    <img src="img/public/facebook.png" alt="">
                </figure>

            </section>

        </section>


        <?php echo $this->load->view("geral/includes/menu"); ?>

        

    </section>



    </div>

    <div id="quemsomos-clientes" class="bgParallax muda" data-speed="2">

        <div class="centralizar">

            <h1 class="titulo">CLIENTES</h1>

            <p class="subtitulo">Alguns clientes da Betun Prime</p>


            <ul id="lista-clientes">

            <?php 

            foreach ($clientes as $cliente) {
                echo "<li><a href='#'><img src='".base_url("img/clientes/{$cliente->foto}")."'></a></li>"; 
            }

                           
            
            ?>
            </ul>

                



            



        </div>

    
     

    </div>




    



    

</main>
