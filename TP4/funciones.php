<?php
function  ValidationError($info) {
    $dia = isset($info['dia']) ? $info['dia'] : '';
    $mes = isset($info['mes']) ? $info['mes'] : '';
    $ano = isset($info['ano']) ? $info['ano'] : '';

    $errores = [];

	  if(!isset($info['nombre']) || trim($info['nombre']) == "") {
	    $errores['nombre'] = "Ingrese un nombre.";
	  }

	  if(!isset($info['apellido']) || trim($info['apellido']) == "") {
	    $errores['apellido'] = "Ingrese un apellido.";
	  }

	  if(!isset($info['usuario']) || trim($info['usuario']) == "") {
	    $errores['usuario'] = "Ingrese un usuario.";
	  }

	  if(!isset($info['email']) || trim($info['email']) == "") {
	    $errores['email'] = "Ingrese un e-mail.";
	  }else {
	    if(!filter_var($info['email'],FILTER_VALIDATE_EMAIL)){
	      $errores['email'] = "Ingrese un e-mail valido.";
	    }else if($info['email'] != $info['confirm_email']){
	      $errores['email'] = "Las emails no coinciden.";
	    }
	  }
	  if(!isset($info['contrasena']) || trim($info['contrasena']) == "" && strlen($info['contrasena']) < 6){
	    $errores['contrasena'] = "La contraseña necesita 6 caracteres.";
	  } else if($info['contrasena'] != $info['confirm_contrasena']){
	    $errores['contrasena'] = "La contraseña no coinciden.";
	  }

	  if(!isset($info['sexo']) || trim($info['sexo'])){
	    $errores['sexo'] = "A caso sos trabuco? Elegi un sexo!";
	  }

	  if(!( $info['mes'] && $info['dia'] && $info['ano'] && checkdate($info['mes'], $info['dia'], $info['ano']))) {
	    $errores['fechas'] = "La fecha de nacimiento ingresada es incorrrecta";
	  }

	  if (!isset($info['bio']) || trim($info['bio'])) {
      $errores['bio'] = "Sos huerfano? No? Entonces pone una biografia.";
	  } else if (strlen($info['bio']) > 140 || strlen($info['bio']) < 20){
      $errores['bio'] = "La biografia tiene que tener un minimo de 20 y maximo 140 caracteres.";
    }

    if (!isset($info['cats'])) {
      $errores['cats'] = "Minimo selecionar dos categorias.";
    }else if(count($info['cats']) <= 2) {
	    $errores['cats'] = "Minimo selecionar dos categorias.";
	  }

    if (!isset($info['terminos']) || trim($info['terminos'])){
      $errores['terminos'] = "Tiene que aceptar los terminos y condiciones.";
	   }

	return $errores;
}
