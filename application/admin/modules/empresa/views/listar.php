<!doctype html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<title>Admin</title>
	<link rel="stylesheet" href="<?php echo $this->base->base_adm("css/area/reset.css"); ?>">
	   <link rel="stylesheet" href="<?php  echo $this->base->base_adm("css/area/areabase.css");?>">
    <link rel="stylesheet" href="<?php  echo $this->base->base_adm("css/area/centro-banner.css");?>">
	<link rel="stylesheet" href="<?php  echo $this->base->base_adm("css/area/form.css");?>"
	<link rel="stylesheet" href="<?php  echo $this->base->base_adm("js/jpages/css/jPages.css");?>">
	<script src="<?php  echo $this->base->base_adm("js/jquery-2.0.3.min.js"); ?> "></script>
	<script src="<?php  echo $this->base->base_adm("js/jpages/js/jPages.min.js"); ?> "></script>
  <script src="<?php  echo $this->base->base_adm("js/jquery-validation-1.11.1/dist/jquery.validate.min.js"); ?> "></script>
	<script src="<?php  echo $this->base->base_adm("js/jpages/configuracao/conf.js"); ?> "></script>
	<script src="<?php  echo $this->base->base_adm("js/buscaCEP.js"); ?> "></script>
  <script src="<?php  echo $this->base->base_adm("js/jquery-validation-1.11.1/conf/conf-validation.js"); ?> "></script>



</head>
<body>

	<div id="container">

		<?php $this->load->view("geral/includes/menu-lateral"); ?>

		<section id="centro">
			<section id="container-tabela">
			   <?php echo $this->session->flashdata('status'); ?>
			<h1>Alterar Dados Empresa</h1>
                        <form enctype="multipart/form-data" id="form-cadastro" method="post" action="<?php echo base_url("empresa/alterar"); ?>">
                            <fieldset>


                         
                            	<div class="separar2">
                                	<label>Sobre a Empresa:</label>
                                	<textarea name="sobre" id="sobre" cols="30" rows="10"><?php echo $empresa->sobre; ?></textarea>
                                </div>

                                <div class="separar2">
                                	<label>Qualificações:</label>
                                	<textarea name="qualificacoes" id="qualificacoes" cols="30" rows="10"><?php echo $empresa->qualificacoes; ?></textarea>
                                </div>

                                <div class="separar2">
                                	<label>Estrutura da Empresa:</label>
                                	<textarea name="estrutura" id="estrutura" cols="30" rows="10"><?php echo $empresa->estrutura; ?></textarea>
                                </div>


                                <div class="separar2">
                                	<label>Qualificações dos Funcionários:</label>
                                	<textarea name="funcionarios" id="funcionarios" cols="30" rows="10"><?php echo $empresa->funcionarios; ?></textarea>
                                </div>

                                <div class="separar2">
                                	<label>Missão:</label>
                                	<textarea name="missao" id="missao" cols="30" rows="10"><?php echo $empresa->missao; ?></textarea>
                                </div>

                                <div class="separar2">
                                	<label>Visão:</label>
                                	<textarea name="visao" id="visao" cols="30" rows="10"><?php echo $empresa->visao; ?></textarea>
                                </div>

                                <div class="separar2">
                                	<label>Objetivos de Qualidade:</label>
                                	<textarea name="objetivos" id="objetivos" cols="30" rows="10"><?php echo $empresa->objetivos; ?></textarea>
                                </div>

                                <div class="separar2">
                                	<label>Politica Ambiental:</label>
                                	<textarea name="politica" id="politica" cols="30" rows="10"><?php echo $empresa->politica; ?></textarea>
                                </div>


                                <div class="separar2">
                                	<label>Processo Politica Ambiental:</label>
                                	<textarea name="processos" id="processos" cols="30" rows="10"><?php echo $empresa->processos; ?></textarea>
                                </div>



                         

							<div class="separar botao">
                                <input type="submit" value="Alterar">
                            </div>
                            </fieldset>
                        </form>
			
			</section>
		</section>

	</div>
	
</body>
</html>