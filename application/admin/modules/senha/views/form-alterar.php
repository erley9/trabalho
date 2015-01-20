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
			<?php echo $this->session->flashdata('status');?>
			<h1>Alterar Senha</h1>
                        <form enctype="multipart/form-data" method="post" action="<?php echo base_url("senha/alterar"); ?>">
                            <fieldset>
                            	<div class="separar">
                            		<span class="error"></span>
                                	<label>Senha Antiga:</label>
                                	<input type="password" name="antiga" id="antiga">
                                </div>
                                <div class="separar">
                                	<span class="error"></span>
                                    <label>Senha Nova:</label>
                                    <input type="password" name="nova" id="nova">
                                </div>
                                <div class="separar">
                                	<span class="error"></span>
                                    <label>Confirmação:</label>
                                    <input type="password" name="confirmacao" id="confirmacao">
                                </div>

                                <input type="submit" value="Alterar">
                            </fieldset>
                        </form>
			
			</section>
		</section>

	</div>
	
</body>
</html>