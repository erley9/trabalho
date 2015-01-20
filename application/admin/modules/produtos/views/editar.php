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
    <script src="<?php  echo $this->base->base_adm("js/muda-combo.js"); ?> "></script>

</head>
<body>

	<div id="container">

		<?php $this->load->view("geral/includes/menu-lateral"); ?>

		<section id="centro">
			<section id="container-tabela">
			<h1>Editar Modalidades</h1>
                        <form enctype="multipart/form-data" method="post" action="<?php echo base_url("produtos/editar"); ?>">
                            <fieldset>
                            	<input type="hidden" name="id" id="id" value="<?php echo $cliente->id; ?>">
                            	<div class="separar">
                                <label>Titulo:</label>
                                <input type="text" name="titulo" id="titulo" value="<?php echo $cliente->titulo; ?>">
                                </div>

                                <div class="separar">
                                    <label for="">Descrição</label>
                                    <textarea name="descricao" id="descricao" cols="30" rows="10"><?php echo $cliente->descricao; ?></textarea>
                                </div>

                                <div class="separar">
                                    <label for="">Especificação</label>
                                    <textarea name="especificacao" id="especificacao" cols="30" rows="10"><?php echo $cliente->especificacao; ?></textarea>
                                </div>

                                <figure>
                                    <img src="<?php echo $this->base->base_adm("img/produtos/{$cliente->imagem}");  ?>" alt="">
                                </figure>
                                <div class="separar">
                                    <label for="">Imagem</label>
                                    <input type="file" name="logo" id="logo">
                                </div>

                                <select name="categoria" id="categoria" data-url='<?php echo base_url("produtos/geraSubcategorias"); ?>'>

                                    <option value="">Selecione a categoria</option>

                                    <?php

                                    foreach ($categorias as $categoria) {

                                        $item = $this->subcategoria->get_byID($cliente->categoriafk)->row();


                                        if($item->categoriafk == $categoria->id){


                                        echo "<option value='".$categoria->id."' selected>".$categoria->nome."</option>";

                                        }else{


                                        echo "<option value='".$categoria->id."'>".$categoria->nome."</option>";

                                        }

                                    }
                                    

                                    ?>
                                    

                                </select>


                                <select name="subcategoria" id="subcategoria">
                                    <option value="">Seleciona a subcategoria</option>
                                    
                                    <?php

                                    foreach ($subcategorias as $subcategoria) {

                                        if($cliente->categoriafk == $subcategoria->id){

                                        echo "<option value='".$subcategoria->id."' selected>".$subcategoria->nome."</option>";

                                        }else{

                                         echo "<option value='".$subcategoria->id."'>".$subcategoria->nome."</option>";

                                        }

                                    }
                                    

                                    ?>


                                </select>

                            
                                <input type="submit" value="Alterar">
                            </fieldset>
                        </form>
			
			</section>
		</section>

	</div>
	
</body>
</html>