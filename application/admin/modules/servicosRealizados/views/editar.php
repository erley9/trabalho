<!doctype html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<title>Admin</title>
	<link rel="stylesheet" href="<?php echo $this->base->base_adm("css/area/reset.css"); ?>">
	<link rel="stylesheet" href="<?php  echo $this->base->base_adm("css/area/areabase.css");?>">
	<link rel="stylesheet" href="<?php  echo $this->base->base_adm("css/area/centro-cliente.css");?>">
	<link rel="stylesheet" href="<?php  echo $this->base->base_adm("css/area/form.css");?>"
	<link rel="stylesheet" href="<?php  echo $this->base->base_adm("js/jpages/css/jPages.css");?>">
	<script src="<?php  echo $this->base->base_adm("js/jquery-2.0.3.min.js"); ?> "></script>
	<script src="<?php  echo $this->base->base_adm("js/jpages/js/jPages.min.js"); ?> "></script>
	<script src="<?php  echo $this->base->base_adm("js/jpages/configuracao/conf.js"); ?> "></script>

</head>
<body>

	<div id="container">

		<?php $this->load->view("geral/includes/menu-lateral"); ?>

		<section id="centro">
			<section id="container-tabela">
			<h1>Editar Serviço</h1>
                        <form enctype="multipart/form-data" method="post" action="<?php echo base_url("servicosRealizados/editar"); ?>">
                            <fieldset>
                            	<input type="hidden" name="id" id="id" value="<?php echo $cliente->id; ?>">
                            	
                                <div class="separar">
                                    <label>Titulo:</label>
                                    <input type="text" name="titulo" id="titulo" value="<?php echo $cliente->titulo; ?>">
                                </div>

                                <div class="separar">
                                    <label>Descrição:</label>
                                   <textarea name="descricao" id="descricao" cols="30" rows="10"><?php echo $cliente->descricao; ?></textarea>
                                </div>

                                <div class="separar">
                                    <figure>
                                        <img src="<?php echo $this->base->base_adm("img/servicos/{$cliente->imagem}") ?>"  alt="" style="margin-bottom:10px">
                                    </figure>
                                    <label>Imagem:</label>
                                    <input type="file" name="logo" id="arquivo">
                                </div>

                                <input type="submit" value="Alterar">
                            </fieldset>
                        </form>
			
			</section>
		</section>

	</div>
	
</body>
</html>