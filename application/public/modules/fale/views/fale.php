
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

    <div id="contato" class="bgParallax muda" data-speed="2">

        <div class="centralizar">

            <h1 class="titulo">CONTATO</h1>

            <section id="contatos">
                
                <form action="<?php echo base_url("fale/enviaMail"); ?>" class="envia-mail">
                    
                    <p>Preencha os campos abaixo que em breve entraremos em
contato.</p>        
                    <div>
                        <label for="nome">Nome:</label>
                        <input type="text" name="nome" id="nome">
                    </div>

                    <div>
                        <label for="email">E-mail:</label>
                        <input type="text" name="email" id="email">
                    </div>

                    <div>
                        <label for="telefone">Telefone:</label>
                        <input type="text" name="telefone" id="telefone">
                    </div>


                    <div>
                        <label for="mensagem">Mensagem:</label>
                        <textarea name="mensagem" id="mensagem" cols="30" rows="10"></textarea>
                    </div>

                    <div>
                        <input type="submit" value="Enviar">
                    </div>

                </form>

                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3657.1602167368883!2d-46.65511079999999!3d-23.562688599999998!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94ce59c8da0aa315%3A0xd59f9431f2c9776a!2sAv.+Paulista%2C+S%C3%A3o+Paulo+-+SP!5e0!3m2!1spt-BR!2sbr!4v1413568292779" width="488" height="356" frameborder="0" style="border:0"></iframe>


            </section>

            <section id="dados-contato">
                
                <article class="endereco">

                    <p>Al. Harvey C. Weeks, 14, Sl. 26, 2º andar</p>
                    <p>Vista Verde, São José dos Campos - SP</p>
                    <p>12223-830</p>
                    
                </article>

                <article class="contato-tel">

                    <p>E-mail:  sac@betunprime.com.br</p>
                    <p>Telefone:    (12) 3308 2532</p>
                    <p>Celular:     (12) 7820 8620</p>
                
                </article>


            </section>

    


        

                



            



        </div>

    
     

    </div>




    



    

</main>