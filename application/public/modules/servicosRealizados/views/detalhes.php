<main>

    

    <div id="topo-servicos" class="bgParallax muda" data-speed="40">

    <section id="topo-menu">

        <h1 class="logo"></h1>

        <section id="dados-gerais">
            
            <img src="<?php echo base_url("img/public/patrocinios.png"); ?>" alt="" class="patrocinio">

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

            <h1 class="titulo">SERVIÇOS REALIZADOS</h1>




          <article style="display:table">
              <h2 class="titulo"><?php echo $servico->titulo; ?></h2>

               <img src='<?php echo base_url("img/servicosRealizados/{$servico->imagem}"); ?>' class="foto-reportagem">

              <p class="texto"><?php echo nl2br($servico->descricao);  ?></p>
          </article>


          <ul id="lista-fotos">

            <?php 

            foreach ($fotos as $foto) {
                echo "<li><a href='".base_url("img/fotos/{$foto->normal}")."' data-lightbox='roadtrip1'><img src='".base_url("img/fotos/miniaturas/{$foto->miniatura}")."'></a></li>";
            }

              
            
            ?>
          </ul>

                



            



        </div>

    
     

    </div>




    



    

</main>