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
	<script src="<?php  echo $this->base->base_adm("js/controlaradio.js"); ?>"></script>
	<script src="<?php  echo $this->base->base_adm("js/jquery-validation-1.11.1/conf/conf-validation.js"); ?> "></script>
	<script src="<?php  echo $this->base->base_adm("js/jpages/js/jPages.min.js"); ?> "></script>
	<script src="<?php  echo $this->base->base_adm("js/jpages/configuracao/conf.js"); ?> "></script>
	<script src="<?php  echo $this->base->base_adm("js/change.js"); ?> "></script>
	

</head>
<body>

	<div id="container">

		<?php $this->load->view("geral/includes/menu-lateral"); ?>

		<section id="centro">
			<section id="container-tabela">
			<h1>Cadastro de Anuncio</h1>
                        <form enctype="multipart/form-data" method="post" action="<?php echo base_url("anuncio/cadastrar"); ?>">
                            <fieldset>

                            	<div class="separar">
                                <label>Titulo:</label>
                                <input type="text" name="titulo">
                            	</div>

                            	<div class="separar">
                                <label>Anuncio:</label>
                                <textarea name="anuncio"></textarea>
                            	</div>

								
 
                                <div class="separar">
                                <label>Imagem:</label>
                                <input type="file" name="userfile" id="userfile">
                            	</div>


								<div class="separar">
								<label for="">Enviar:</label>
								<label for="">Todos os Clientes</label>
                            	<input type="radio" name="enviar" id="todos" value="todos" >
                            	<label for="">Enviar para Clientes da Categoria</label>
                            	<input type="radio" name="enviar" id="grupo" value="grupo">
                            	</div>
								
								<div class="separar">
                            	<?php echo $combo; ?>
                            	</div>
                            	<div class="separar">
                            		<select name="subcategorias" id="subcategorias">
                            			<option value="">Selecione uma subcategoria</option>
                            		</select>
                            	</div>
                            	<div class="separar">
                                <input type="submit" value="Cadastrar">
                            	</div>
                            </fieldset>
                        </form>
			
			</section>
		</section>

	</div>
	
</body>
</html>