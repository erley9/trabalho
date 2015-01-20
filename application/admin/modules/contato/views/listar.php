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
                        <form enctype="multipart/form-data" id="form-cadastro" method="post" action="<?php echo base_url("contato/alterar"); ?>">
                            <fieldset>



                                <div class="separar2">
                                    <label>Endereço:</label>
                                     <input type="text" name="endereco" id="endereco" value="<?php echo $empresa->endereco; ?>">
                                </div>

                                <div class="separar2">
                                    <label>Endereço2:</label>
                                     <input type="text" name="endereco2" id="endereco2" value="<?php echo $empresa->endereco2; ?>">
                                </div>


                                <div class="separar2">
                                    <label>Telefone:</label>
                                    <input type="text" name="telefone" id="telefone" value="<?php echo $empresa->telefone; ?>">
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