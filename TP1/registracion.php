<?php

$nombre = isset($_GET['nombre']) ? $_GET['nombre'] : '';
$apellido = isset($_GET['apellido']) ? $_GET['apellido'] : '';
$usuario = isset($_GET['usuario']) ? $_GET['usuario'] : '';
$email = isset($_GET['email']) ? $_GET['email'] : '';

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Trabajo Practico 1</title>

    <!-- Bootstrap -->
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
  	<div class="conteiner">
    	<h1>Registracion</h1>
    	<form class="formulario" action="" method="GET">

	    	<input type="text" class="form-control" placeholder="Nombre" name="nombre" value="<?php echo $nombre ?>"/><br/>
			<input type="text" class="form-control" placeholder="Apellido" name="apellido" value="<?php echo $apellido ?>"><br>
			<input type="text" class="form-control" placeholder="Nombre de Usuario" name="usuario" value="<?php echo $usuario ?>"><br>
			<input type="text" class="form-control" placeholder="Correo Electronico" name="email" value="<?php echo $email ?>"><br>
		    <input type="password" class="form-control" placeholder="Contraseña" name="contrasena"><br>
		    <input type="password" class="form-control" placeholder="Confirmacion" name="confirm_contrasena"><br>
		    Sexo: <input type="radio" name="sexo" value="0"> Femenino <input type="radio" name="sexo" value="1"> Masculino<br>
		    Fecha de Nacimiento: 
	    	<select name="dia">
	    		<option value="">Dia</option>
	    		<?php
	    			for($i =1; $i <=31; $i++)
	    			{
	    				?><option value="<?php echo $i;?>">
	    				<?php echo $i; ?></option>
		        <?php } ?>

			</select>

	    	<select name="mes">
	    		<option value="">Mes</option>
	    		<?php
	    			for($i =1; $i <=12; $i++)
	    			{
	    				?><option value="<?php echo $i;?>">
	    				<?php echo $i; ?></option>
		        <?php } ?>
			</select>
	    	
	    	<select name="ano">
	    		<option value="">Año</option>
	    		<?php
	    			for($i =date('Y'); $i >= (date('Y')-100); $i--)
	    			{
	    				?><option value="<?php echo $i;?>">
	    				<?php echo $i; ?></option>
		        <?php } ?>
			</select>


    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

  </body>
</html>