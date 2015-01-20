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
	<script src="<?php  echo $this->base->base_adm("js/jquery-1.10.2.min.js"); ?> "></script>
	<script src="<?php  echo $this->base->base_adm("js/jpages/js/jPages.min.js"); ?> "></script>
	<script src="<?php  echo $this->base->base_adm("js/jpages/configuracao/conf.js"); ?> "></script>
	<script src="<?php  echo $this->base->base_adm("js/muda-combo.js"); ?> "></script>

</head>
<body>

	<div id="container">

		<?php $this->load->view("geral/includes/menu-lateral"); ?>

		<section id="centro">
			<section id="container-tabela">
			<h1>Cadastro de Produtos</h1>
                        <form enctype="multipart/form-data" method="post" action="<?php echo base_url("produtos/cadastrar"); ?>">
                            <fieldset>
                            		<div class="separar">
                                <label>Titulo:</label>
                                <input type="text" name="titulo" id="titulo" >
                                </div>

                                <div class="separar">
                                    <label for="">Descrição</label>
                                    <textarea name="descricao" id="descricao" cols="30" rows="10"></textarea>
                                </div>

                                <div class="separar">
                                    <label for="">Especificação</label>
                                    <textarea name="especificacao" id="especificacao" cols="30" rows="10"></textarea>
                                </div>


                             
                                <div class="separar">
                                    <label for="">Imagem</label>
                                    <input type="file" name="logo" id="logo">
                                </div>

                                <select name="categoria" id="categoria" data-url='<?php echo base_url("produtos/geraSubcategorias"); ?>'>

                                	<option value="">Selecione a categoria</option>

                                	<?php

                                	foreach ($categorias as $categoria) {

                                		echo "<option value='".$categoria->id."'>".$categoria->nome."</option>";

                                	}
                                	

                                	?>
                                	

                                </select>


                                <select name="subcategoria" id="subcategoria">
                                	<option value="">Seleciona a subcategoria</option>

                                </select>


                                <input type="submit" value="Cadastrar">
                            </fieldset>
                        </form>
			
			</section>
		</section>

	</div>
	
</body>
</html>