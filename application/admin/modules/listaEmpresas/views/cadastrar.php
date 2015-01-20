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
		<script src="<?php  echo $this->base->base_adm("js/markinput/src/jquery.maskedinput.js"); ?> "></script>
	<script src="<?php  echo $this->base->base_adm("js/markinput/conf/mascaras.js"); ?> "></script>
	<script src="<?php echo $this->base->base_adm("js/jquery-validation-1.11.1/dist/jquery.validate.min.js"); ?>"></script>
	<script src="<?php echo $this->base->base_adm("js/jquery-validation-1.11.1/conf/conf-validation3.js"); ?>"></script>
	<input type="hidden" name="base" id="base" value="<?php echo $this->base->base_adm("inicio/verificaMailEmpresa"); ?>">
</head>
<body>

	<div id="container">

		<?php $this->load->view("geral/includes/menu-lateral"); ?>

		<section id="centro">
			<section id="container-tabela">
			<h1>Cadastro de Empresas</h1>
                        <form enctype="multipart/form-data" method="post" action="<?php echo base_url("listaEmpresas/cadastrar"); ?>" id="form-empresa">
                            <fieldset>
                            	
 
                                <div class="separar">
                                	<label>Empresa:</label>
                                	<input type="text" name="nome" id="nome">
                            	</div>

                            	<div class="separar">
                            	    <label>Cnpj:</label>
                            	    <input type="text" name="cnpj" id="cnpj" class="cnpj">
                            	</div>

                            	<div class="separar">
                            	    <label>Telefone:</label>
                            	    <input type="text" name="telefone" id="telefone" class="dddtelefone">
                            	</div>

                            	<div class="separar">
                            	    <label>E-mail:</label>
                            	    <input type="text" name="email" id="email">
                            	</div>


                            	<div class="separar">
                            	    <label>CEP:</label>
                            	    <input type="text" name="cep" id="cep" class="cep">
                            	</div>

                            	<div class="separar">
                            	    <label>Rua:</label>
                            	    <input type="text" name="rua" id="rua">
                            	</div>

                            	<div class="separar">
                            	    <label>Numero:</label>
                            	    <input type="text" name="numero" id="numero">
                            	</div>


                            	<div class="separar">
                            	    <label>Bairro:</label>
                            	    <input type="text" name="bairro" id="bairro">
                            	</div>

                            	<div class="separar">
                            	    <label>Cidade:</label>
                            	    <input type="text" name="cidade" id="cidade">
                            	</div>

                            	<div class="separar">
                            	    <label>Estado:</label>
                            	    <input type="text" name="estado" id="estado">
                            	</div>


                            	<div class="separar">
                            	    <label>Descrição:</label>
                            	    <textarea name="descricao" id="descricao"></textarea>
                            	</div>

                            	<div class="separar">
                            		<label for="">Área de Atuação</label>
                            		<?php echo $combo; ?>
                            	</div>

                            	<div class="separar">
                            		<label for="">Senha</label>
                            		<input type="password" name="senha" id="senha">
                            	</div>

                            	<div class="separar">
                            		<label for="">Status</label>
                            		<select name="status" id="status">
                            			<option value="">Selecione o Status</option>
                            			<option value="ativo">Ativado</option>
                            			<option value="desativado">Desativado</option>
                            		</select>
                            	</div>

                            	<div class="separar">
                            		<label for="">Plano</label>
                            		<select name="planos" id="planos">
                            			<option value="">Selecione o Plano</option>
                            			<option value="3">Normal</option>
                            			<option value="4">Premium</option>
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