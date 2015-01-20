<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="<?php echo $this->base->base_adm("css/area/login.css"); ?>">
</head>
<body>

	<div id="container">    
    <form action="<?php echo base_url("adm/login"); ?>" method="post">
        <img src="<?php echo $this->base->base_adm("img/adm/logo.png");  ?>">
        <fieldset>
        	<span class="error"><?php echo $this->session->flashdata('status'); ?></span>
            <label for="login">Login:</label>
            <input type="text" name="login" id="login">
            <label for="senha">Senha:</label>
            <input type="password" name="senha" id="senha">
            <input type="submit" value="Logar">
        </fieldset>
    </form>
    </div>
	
</body>
</html>