<!doctype html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<title>Admin</title>
	<link rel="stylesheet" href="<?php echo $this->base->base_adm("css/area/reset.css"); ?>">
	<link rel="stylesheet" href="<?php  echo $this->base->base_adm("css/area/areabase.css");?>">
	<link rel="stylesheet" href="<?php  echo $this->base->base_adm("css/area/centro-cliente.css");?>">
	<link rel="stylesheet" href="<?php  echo $this->base->base_adm("css/area/form.css");?>">

	<script src="<?php  echo $this->base->base_adm("js/jquery-1.10.2.min.js"); ?> "></script>
	<script src="<?php echo $this->base->base_adm("js/jquery-maskmoney-master/dist/jquery.maskMoney.min.js"); ?>"></script>
	<script src="<?php echo  $this->base->base_adm("js/mudacombo.js"); ?>"></script>
	

</head>
<body>

	<div id="container">

		<?php $this->load->view("geral/includes/menu-lateral"); ?>

		<section id="centro">
			<section id="container-tabela">
			<h1>Cadastro de Cursos</h1>
                        <form enctype="multipart/form-data" method="post" action="<?php echo base_url("cursos/cadastrar"); ?>">
                            <fieldset>
                            	<input type="hidden" name="base" id="base" value="<?php echo base_url(); ?>" >
 
                                <div class="separar">
                                <label>Sigla:</label>
                                <input type="text" name="sigla" id="sigla">
                            	</div>

                            	<div class="separar">
                                <label>Curso:</label>
                                <input type="text" name="curso" id="curso">
                            	</div>

                            	<div class="separar">
                            	<label>Horas:</label>
                            	<input type="number" name="horas" id="horas" min='1' max='2000'>
                            	</div>

                            	<div class="separar">
                            	<label>Valor:</label>
                            	<input type="text" name="valor" id="valor">
                            	</div>




                            	<?php echo $combo; ?>


                            	<div class="separar">
                            		<select name="subcategorias" id="subcategorias">
                            			<option value="">Selecione uma Subcategoria</option>
                            		</select>
                            	</div>
                            
                                <input type="submit" value="Cadastrar">
                            </fieldset>
                        </form>
			
			</section>
		</section>

	</div>
	
</body>
</html>