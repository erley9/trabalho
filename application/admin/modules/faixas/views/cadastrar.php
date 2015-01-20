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
			<h1>Cadastro de Faixa Salarial</h1>
                        <form enctype="multipart/form-data" method="post" action="<?php echo base_url("faixas/cadastrar"); ?>">
                            <fieldset>
                            	
 
                                <div class="separar">
                                <label>Valor:</label>
                                <input type="text" name="nome" id="nome">
                            	</div>

                                <input type="submit" value="Cadastrar">
                            </fieldset>
                        </form>
			
			</section>
		</section>

	</div>
	
</body>
</html>