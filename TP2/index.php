<?php

$nombre = isset($_GET['nombre']) ? $_GET['nombre'] : '';
$apellido = isset($_GET['apellido']) ? $_GET['apellido'] : '';
$usuario = isset($_GET['usuario']) ? $_GET['usuario'] : '';
$email = isset($_GET['email']) ? $_GET['email'] : '';
$confirm_email = isset($_GET['confirm_email']) ? $_GET['confirm_email'] : '';
$contrasena = isset($_GET['contrasena']) ? $_GET['contrasena'] : '';
$confirm_contrasena = isset($_GET['confirm_contrasena']) ? $_GET['confirm_contrasena'] : '';
$sexo = isset($_GET['sexo']) ? $_GET['sexo'] : '';
$dia = isset($_GET['dia']) ? $_GET['dia'] : '';
$mes = isset($_GET['mes']) ? $_GET['mes'] : '';
$ano = isset($_GET['ano']) ? $_GET['ano'] : '';
$bio = isset($_GET['ano']) ? $_GET['bio'] : '';
$cats = isset($_GET['cats']) ? $_GET['cats'] : array();
$terminos = isset($_GET['terminos']) ? $_GET['terminos'] : '';
$errores = [];

if ($_GET) {
  if(empty($nombre)) {
    $errores['nombre'] = "Ingrese un nombre.";
  }
  if(empty($apellido)) {
    $errores['apellido'] = "Ingrese un apellido.";
  }
  if(empty($usuario)) {
    $errores['usuario'] = "Ingrese un usuario.";
  }
  if(empty($email)) {
    $errores['email'] = "Ingrese un e-mail.";
  }else {
    if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
      $errores['email'] = "Ingrese un e-mail valido.";
    }else if($email != $confirm_email){
      $errores['email'] = "Las contrasñas no coinciden.";
    }
  }
  if(strlen($contrasena) < 6){
    $errores['contrasena'] = "La contraseña necesita 6 caracteres.";
  } else if($contrasena == $confirm_contrasena){
    $errores['contrasena'] = "La contraseña no coinciden.";
  }

  if(empty($sexo)){
    $errores['sexo'] = "A caso sos trabuco? Elegi un sexo!";
  }

  $fechas = checkdate($mes, $dia, $ano);
  if(!$fechas)
  {
    $errores['fechas'] = "La fecha de nacimiento ingresada es incorrrecta";
  }

  if (strlen($bio) > 140 || strlen($bio) < 20) {
    $errores['bio'] = "La biografia tiene que tener un minimo de 20 y maximo 140 caracteres.";
  }

  if(count($cats) <= 2)
  {
    $errores['cats'] = "Minimo selecionar dos categorias.";
  }

}

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
  	<div class="container">
    	<h1>Registracion</h1>

      <?php if(count($errores) > 0){?>
        <div class="alert alert-danger" role="alert">
          <?php foreach($errores as $error)
          {
            echo $error . "<br/>";
          }?>
        </div>
      <?php }?>

    	<form class="formulario" action="index.php" method="GET">

	    	<input type="text" class="form-control" placeholder="Nombre" name="nombre" value="<?php echo $nombre ?>" /><br/>
			  <input type="text" class="form-control" placeholder="Apellido" name="apellido" value="<?php echo $apellido ?>" /><br/>
			  <input type="text" class="form-control" placeholder="Nombre de Usuario" name="usuario" value="<?php echo $usuario ?>"/><br/>
			  <input type="text" class="form-control" placeholder="Correo Electronico" name="email" value="<?php echo $email ?>"/><br/>
        <input type="text" class="form-control" placeholder="Corfirmacion Correo Electronico" name="confirm_email" value="<?php echo $confirm_email ?>"/><br/>
		    <input type="password" class="form-control" placeholder="Contraseña" name="contrasena" value="<?php echo $contrasena ?>" /><br/>
		    <input type="password" class="form-control" placeholder="Confirmacion" name="confirm_contrasena" value="<?php echo $confirm_contrasena ?>"/><br/>
		    Sexo: <input type="radio" name="sexo" value="Femenino" <?php if($sexo == "Femenino"){?> checked="checked" <?php } ?>/>Femenino <input type="radio" name="sexo" value="Masculino" <?php if($sexo == "Masculino"){?> checked="checked" <?php } ?> /> Masculino<br/>

        <div>
          Fecha de Nacimiento:
	    	<select name="dia">
	    		<option value="">Dia</option>
	    		<?php
	    			for($i =1; $i <=31; $i++)
	    			{
	    				if ($dia == $i){?>
	    				<option value="<?php echo $i;?>" selected="selected"><?php echo $i;?></option>
	    				<?php }else { ?>
	    				<option value="<?php echo $i;?>"><?php echo $i;?></option>
		        <?php }
		        } ?>

			</select>

	    	<select name="mes">
	    		<option value="">Mes</option>
	    		<?php
	    			for($i =1; $i <=12; $i++)
	    			{
	    				if ($mes == $i){?>
	    				<option value="<?php echo $i;?>" selected="selected"><?php echo $i;?></option>
	    				<?php }else { ?>
	    				<option value="<?php echo $i;?>"><?php echo $i;?></option>
		        <?php }
		        } ?>
			</select>

	    	<select name="ano">
	    		<option value="">Año</option>
          <option value="">Año</option>
				<?php for($i = date('Y'); $i >= (date('Y') - 100); $i--) {
          if ($ano == $i){?>
          <option value="<?php echo $i;?>" selected="selected"><?php echo $i;?></option>
          <?php }else { ?>

					<option value="<?php echo $i;?>"><?php echo $i;?></option>
          <?php }
          } ?>
			</select>
    </div>

			<textarea name="bio" class="form-ontrol" rows="5" cols="20"><?php echo $bio;?></textarea>

			<div>
        <div class="checkbox">
          <label>
            <input type="checkbox" name="cats[]" value="1" <?php if (in_array(1, $cats)) { ?> checked="checked" <?php } ?> />Categoria 1
          </label>
        </div>
        <div class="checkbox">
          <label>
            <input type="checkbox" name="cats[]" value="2" <?php if (in_array(2, $cats)) { ?> checked="checked" <?php } ?> />Categoria 2
          </label>
        </div>
        <div class="checkbox">
          <label>
            <input type="checkbox" name="cats[]" value="3" <?php if (in_array(3, $cats)) { ?> checked="checked" <?php } ?> />Categoria 3
          </label>
        </div>
        <div class="checkbox">
          <label>
            <input type="checkbox" name="cats[]" value="4" <?php if (in_array(4, $cats)) { ?> checked="checked" <?php } ?> />Categoria 4
          </label>
        </div>
			</div>

      <div>
        <div class="checkbox">
          <label>
  				      <input type="checkbox" name="terminos" value="1" <?php if ($terminos==1) echo "checked"; ?> />Terminos y condiciones
          </label>
        </div>
      </div>

      <center>
        <input type="submit" class="btn btn-default" value="Enviar">
      </center>
    </form>
    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

  </body>
</html>
